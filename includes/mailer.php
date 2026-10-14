<?php
/**
 * Lead email through the clinic's Zoho mailbox (14 Oct 2026).
 *
 * PHP's mail() hands the message to the web host with no authentication, so
 * Gmail often files it as spam or drops it — and enquire.php never learns.
 * This sends over authenticated SMTP as websiteleads@dencespot.com instead,
 * which Zoho signs for dencespot.com. enquire.php falls back to mail() if this
 * returns false, and the lead is always in storage/enquiries.ndjson first.
 *
 * The password is NOT in this file. It lives in includes/mail-secrets.php,
 * which .gitignore excludes because the repository is public. Upload that one
 * file to the server by hand (Hostinger File Manager → public_html/includes/):
 *
 *     <?php
 *     const SMTP_PASS = '…';
 *
 * Without it, smtp_send() returns false and the mail() fallback is used.
 */

declare(strict_types=1);

if (is_file(__DIR__ . '/mail-secrets.php')) {
    require_once __DIR__ . '/mail-secrets.php';
}

const SMTP_HOST      = 'smtp.zoho.in';   // dencespot.com's MX is Zoho India (mx.zoho.in)
const SMTP_PORT      = 465;              // implicit TLS
const SMTP_USER      = 'websiteleads@dencespot.com';
const SMTP_FROM_NAME = 'DenceSpot Website Leads';

/**
 * Send a plain-text email over SMTP. Returns true only when the server has
 * accepted the message for every recipient.
 *
 * @param list<string> $to
 */
function smtp_send(array $to, string $subject, string $body, string $replyTo = ''): bool
{
    if (!defined('SMTP_PASS') || SMTP_PASS === '' || $to === []) {
        return false;
    }

    $fp = @stream_socket_client(
        'ssl://' . SMTP_HOST . ':' . SMTP_PORT,
        $errno,
        $errstr,
        10,
        STREAM_CLIENT_CONNECT,
        stream_context_create(['ssl' => ['verify_peer' => true, 'verify_peer_name' => true]])
    );
    if ($fp === false) {
        return false;
    }
    stream_set_timeout($fp, 10);

    // One reply, including multi-line ones ("250-…" … "250 …").
    $reply = static function () use ($fp): int {
        $code = 0;
        while (($line = fgets($fp, 1024)) !== false) {
            $code = (int) substr($line, 0, 3);
            if (!isset($line[3]) || $line[3] !== '-') {
                break;
            }
        }
        return $code;
    };
    $say = static function (string $line, array $ok) use ($fp, $reply): bool {
        fwrite($fp, $line . "\r\n");
        return in_array($reply(), $ok, true);
    };

    $sent = in_array($reply(), [220], true)
        && $say('EHLO dencespot.com', [250])
        && $say('AUTH LOGIN', [334])
        && $say(base64_encode(SMTP_USER), [334])
        && $say(base64_encode((string) SMTP_PASS), [235])
        && $say('MAIL FROM:<' . SMTP_USER . '>', [250]);
    foreach ($to as $rcpt) {
        $sent = $sent && $say('RCPT TO:<' . $rcpt . '>', [250, 251]);
    }
    $sent = $sent && $say('DATA', [354]);

    if ($sent) {
        // Subject and body are base64-encoded, so nothing a visitor types
        // (name, message) can inject a header or end the DATA block early.
        $headers = [
            'Date: ' . date('r'),
            'From: ' . SMTP_FROM_NAME . ' <' . SMTP_USER . '>',
            'To: ' . implode(', ', $to),
            'Subject: =?UTF-8?B?' . base64_encode($subject) . '?=',
            'Message-ID: <' . bin2hex(random_bytes(12)) . '@dencespot.com>',
            'MIME-Version: 1.0',
            'Content-Type: text/plain; charset=UTF-8',
            'Content-Transfer-Encoding: base64',
        ];
        if ($replyTo !== '') {
            $headers[] = 'Reply-To: ' . $replyTo;
        }
        $message = implode("\r\n", $headers) . "\r\n\r\n" . rtrim(chunk_split(base64_encode($body), 76, "\r\n"));
        $sent = $say($message . "\r\n.", [250]);
    }

    @fwrite($fp, "QUIT\r\n");
    fclose($fp);
    return $sent;
}
