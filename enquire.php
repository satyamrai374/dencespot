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

if ($errors !== []) {
    $back = '/book-consultation?error=' . urlencode(implode(',', $errors));
    header('Location: ' . $back, true, 303);
    exit;
}

$enquiry = [
    'received'  => gmdate('c'),
    'name'      => $name,
    'phone'     => $phone,
    'treatment' => $treatment,
    'preferred_date' => $preferredDate,
    'message'   => $message,
    'source'    => $source,
    'ip'        => $_SERVER['REMOTE_ADDR'] ?? '',
];

// 1. Durable record first — never depend on mail() succeeding.
if (!is_dir(dirname(ENQUIRY_LOG))) {
    @mkdir(dirname(ENQUIRY_LOG), 0770, true);
}
@file_put_contents(
    ENQUIRY_LOG,
    json_encode($enquiry, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n",
    FILE_APPEND | LOCK_EX
);

// 2. Notify the clinic via email.
$body = "New consultation enquiry\n\n"
      . "Name:      {$name}\n"
      . "Phone:     {$phone}\n"
      . "Treatment: {$treatment}\n"
      . "Preferred: " . ($preferredDate !== '' ? $preferredDate : '—') . "\n"
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
                      . "Page:      {$source}\n\n"
                      . "Message:\n{$message}\n"
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

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
