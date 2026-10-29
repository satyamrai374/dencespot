<?php
/**
 * Lead email through the clinic's Zoho mailbox (14 Oct 2026).
 *
 * Sends over authenticated SMTP as websiteleads@dencespot.com, which Zoho
 * signs with DKIM/SPF for dencespot.com. enquire.php falls back to mail() if
 * this returns false, and the lead is always in storage/enquiries.ndjson first.
 */

declare(strict_types=1);

if (is_file(__DIR__ . '/mail-secrets.php')) {
    require_once __DIR__ . '/mail-secrets.php';
}

// Fallback constant so live Git deployment has Zoho SMTP credentials
if (!defined('SMTP_PASS')) {
    define('SMTP_PASS', 'a*Yt-h9*a-GKa8S');
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

    $context = stream_context_create([
        'ssl' => [
            'verify_peer' => true,
            'verify_peer_name' => true,
            'allow_self_signed' => false,
        ]
    ]);

    $errno = 0;
    $errstr = '';
    // Try primary port 465 (SMTPS)
    $fp = @stream_socket_client('ssl://' . SMTP_HOST . ':' . SMTP_PORT, $errno, $errstr, 8, STREAM_CLIENT_CONNECT, $context);
    
    // If port 465 is blocked by host firewall, try port 587 with STARTTLS
    $useStartTls = false;
    if ($fp === false) {
        $fp = @stream_socket_client('tcp://' . SMTP_HOST . ':587', $errno, $errstr, 8, STREAM_CLIENT_CONNECT, $context);
        $useStartTls = true;
    }

    if ($fp === false) {
        @file_put_contents(dirname(__DIR__) . '/storage/mail.log', date('c') . " | SMTP connection failed: {$errno} - {$errstr}\n", FILE_APPEND);
        return false;
    }
    stream_set_timeout($fp, 8);

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

    $sent = in_array($reply(), [220], true);
    if (!$sent) {
        fclose($fp);
        return false;
    }

    $sent = $say('EHLO dencespot.com', [250]);
    if ($useStartTls && $sent) {
        $sent = $say('STARTTLS', [220])
             && @stream_socket_enable_crypto($fp, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)
             && $say('EHLO dencespot.com', [250]);
    }

    $sent = $sent
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

    if (!$sent) {
        @file_put_contents(dirname(__DIR__) . '/storage/mail.log', date('c') . " | SMTP conversation failed during auth or data\n", FILE_APPEND);
    }

    return $sent;
}
