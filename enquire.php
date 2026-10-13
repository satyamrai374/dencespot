<?php
/**
 * Enquiry handler.
 *
 * Validates, stores, notifies, then redirects to /thank-you — the redirect is
 * the point. Without a distinct thank-you URL there is no conversion event to
 * fire in GA4 or Google Ads, which is why "which page produces leads" is
 * currently unanswerable for this site (strategy §9).
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

/** Where enquiries are emailed. Change to the clinic's monitored inbox. */
const ENQUIRY_INBOX = EMAIL;

/** Newline-delimited JSON fallback, so a mail failure never loses a lead. */
const ENQUIRY_LOG = __DIR__ . '/storage/enquiries.ndjson';

/**
 * How long a website enquiry is kept in the log: 12 months, the period the
 * privacy policy publishes. Not less, because the DPDP Rules 2025 (r. 8(3),
 * in force from May 2027) require processing records to be kept for a minimum
 * of one year — hence a calendar year plus a day's margin rather than 365 days,
 * which falls a day short across 29 February. Someone who becomes a patient is
 * covered by the clinical record instead, kept separately and for longer.
 */
const ENQUIRY_RETENTION = '-1 year -1 day';

/** JSON flags for anything written from form input: invalid UTF-8 is replaced, never fatal. */
const ENQUIRY_JSON = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE;

/**
 * Append one enquiry and, in the same locked operation, drop entries older
 * than ENQUIRY_RETENTION — so the retention period in the privacy policy is
 * something this code does, not something it promises. Deletion runs each
 * time an enquiry arrives.
 *
 * The pruned log is written to a temporary file and renamed into place, so a
 * crash or a full disk mid-write leaves the old log intact instead of an
 * empty one. If locking, writing or renaming fails, the new entry is still
 * appended the plain way: a lead is never dropped to keep the log tidy. A line
 * that cannot be parsed or dated is kept, not destroyed.
 */
function enquiry_log_append(array $entry): void
{
    $line = json_encode($entry, ENQUIRY_JSON);
    if ($line === false) {
        return;
    }
    $append = static function () use ($line): void {
        @file_put_contents(ENQUIRY_LOG, $line . "\n", FILE_APPEND | LOCK_EX);
    };

    $lock = @fopen(ENQUIRY_LOG . '.lock', 'c');
    if ($lock === false || !flock($lock, LOCK_EX)) {
        $append();
        return;
    }

    $cutoff = strtotime(ENQUIRY_RETENTION);
    $kept   = [];
    foreach (preg_split('/\R/', (string) @file_get_contents(ENQUIRY_LOG)) ?: [] as $old) {
        if (trim($old) === '') {
            continue;
        }
        $row  = json_decode($old, true);
        $when = is_array($row) && isset($row['received']) ? strtotime((string) $row['received']) : false;
        if ($when === false || $when >= $cutoff) {
            $kept[] = $old;
        }
    }
    $kept[] = $line;

    $tmp     = ENQUIRY_LOG . '.tmp';
    $content = implode("\n", $kept) . "\n";
    if (@file_put_contents($tmp, $content) !== strlen($content) || !@rename($tmp, ENQUIRY_LOG)) {
        @unlink($tmp);
        $append();
    }

    flock($lock, LOCK_UN);
    fclose($lock);
}

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    header('Location: /book-consultation', true, 303);
    exit;
}

$field = static fn (string $key): string => trim((string) ($_POST[$key] ?? ''));

$name      = $field('name');
$phone     = $field('phone');
$treatment = $field('treatment');
$message   = $field('message');
$source    = $field('source');

/**
 * Optional preferred appointment date (/new-designe form). Accepted only as a
 * real calendar date in Y-m-d, so free text can never reach the log, the
 * email or the WhatsApp notification through this field. Anything else is
 * dropped rather than rejected: it is a request, not a required field.
 */
$preferredDate = $field('preferred_date');
$dateCheck     = DateTimeImmutable::createFromFormat('!Y-m-d', $preferredDate);
if ($dateCheck === false || $dateCheck->format('Y-m-d') !== $preferredDate) {
    $preferredDate = '';
}

/**
 * Optional preferred clinic. Only the listed values are kept, for the same
 * reason as the date above: nothing free-typed reaches the notifications.
 */
const ENQUIRY_CLINICS = ['Gurugram (Sector 39)', 'Delhi (Rohini)', 'Either clinic'];
$clinic = $field('clinic');
if (!in_array($clinic, ENQUIRY_CLINICS, true)) {
    $clinic = '';
}

// Honeypot: real people leave this empty. Accept silently so bots learn nothing.
if ($field('website') !== '') {
    header('Location: /thank-you', true, 303);
    exit;
}

$errors = [];

if ($name === '' || mb_strlen($name) > 120) {
    $errors[] = 'name';
}

$digits = preg_replace('/\D+/', '', $phone) ?? '';
if (strlen($digits) < 10 || strlen($digits) > 15) {
    $errors[] = 'phone';
}

if (mb_strlen($message) > 2000) {
    $message = mb_substr($message, 0, 2000);
}

/**
 * Consent is checked here, not only in the browser. Every form posts with
 * novalidate, so the checkbox's `required` attribute never stopped an
 * unticked submission — and this handler used to log 'dpdp_consent' => true
 * for every enquiry regardless. A record asserting consent nobody gave is
 * worse than no record. Consent must be a clear affirmative act (IT Act SPDI
 * Rules 2011 r.5; DPDP Act 2023 s.6 once in force), so no tick, no enquiry.
 */
$consent = $field('dpdp_consent') === '1';
if (!$consent) {
    $errors[] = 'consent';
}

if ($errors !== []) {
    $back = '/book-consultation?error=' . urlencode(implode(',', $errors));
    header('Location: ' . $back, true, 303);
    exit;
}

$enquiry = [
    'received'       => gmdate('c'),
    'name'           => $name,
    'phone'          => $phone,
    'treatment'      => $treatment,
    'preferred_date' => $preferredDate,
    'clinic'         => $clinic,
    'message'        => $message,
    'source'         => $source,
    'consent'        => $consent,
    'consent_text'   => 'Ticked: agree to be contacted about this enquiry as described in /privacy-policy',
    'policy_version' => LEGAL_UPDATED,
    'ip'             => $_SERVER['REMOTE_ADDR'] ?? '',
];

// 1. Durable record first — never depend on mail() succeeding.
if (!is_dir(dirname(ENQUIRY_LOG))) {
    @mkdir(dirname(ENQUIRY_LOG), 0770, true);
}
enquiry_log_append($enquiry);

// 2. Notify the clinic via email.
$body = "New consultation enquiry\n\n"
      . "Name:      {$name}\n"
      . "Phone:     {$phone}\n"
      . "Treatment: {$treatment}\n"
      . "Preferred: " . ($preferredDate !== '' ? $preferredDate : '—') . "\n"
      . "Clinic:    " . ($clinic !== '' ? $clinic : '—') . "\n"
      . "Page:      {$source}\n\n"
      . "Message:\n{$message}\n";

@mail(
    ENQUIRY_INBOX,
    'Consultation enquiry — ' . $name,
    $body,
    "From: website@dencespot.com\r\nReply-To: " . ENQUIRY_INBOX . "\r\nContent-Type: text/plain; charset=UTF-8"
);

// 2b. Notify the clinic via WhatsApp using OpenWA Gateway.
if (defined('OPENWA_API_URL') && OPENWA_API_URL !== '') {
    $wa_recipient = preg_replace('/\D+/', '', OPENWA_NOTIFY_NUM); // strip everything except digits
    if ($wa_recipient !== '') {
        $wa_url = rtrim(OPENWA_API_URL, '/') . '/api/sessions/' . OPENWA_SESSION_ID . '/messages/send-text';
        $wa_payload = json_encode([
            'chatId' => $wa_recipient . '@c.us',
            'text'   => "New consultation enquiry 🚀\n\n"
                      . "Name:      {$name}\n"
                      . "Phone:     {$phone}\n"
                      . "Treatment: {$treatment}\n"
                      . "Preferred: " . ($preferredDate !== '' ? $preferredDate : '—') . "\n"
                      . "Clinic:    " . ($clinic !== '' ? $clinic : '—') . "\n"
                      . "Page:      {$source}\n\n"
                      . "Message:\n{$message}\n"
        ], ENQUIRY_JSON);

        $options = [
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-Type: application/json\r\n" .
                             "X-API-Key: " . OPENWA_API_KEY . "\r\n",
                'content' => $wa_payload,
                'timeout' => 5, // 5-second timeout to avoid blocking page transition
                'ignore_errors' => true
            ]
        ];
        $context = stream_context_create($options);
        @file_get_contents($wa_url, false, $context);
    }
}

// 3. Redirect so the conversion is measurable and a refresh cannot resubmit.
header('Location: /thank-you?ref=' . urlencode($source), true, 303);
exit;
