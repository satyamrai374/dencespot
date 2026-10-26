<?php
/**
 * Local Router for PHP Built-in Web Server (php -S)
 * Handles extensionless URLs like /gallery, /about-us, /contact, /blog/
 */

$uri = rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$file = __DIR__ . $uri;

// 1. Static file exists? Return false to let PHP server serve it.
if ($uri !== '/' && file_exists($file) && !is_dir($file)) {
    return false;
}

// 1b. /sitemap.xml is served by sitemap.php.
//     Apache does this in production (.htaccess:45). Without it, the sitemap URL
//     that robots.txt advertises 404s locally, so a broken sitemap would not
//     surface until after deploy.
if ($uri === '/sitemap.xml') {
    require __DIR__ . '/sitemap.php';
    exit;
}

// 1c. Comparison URLs that 301 to the article covering them.
//     Mirrors .htaccess §1b. Without this the redirects only exist in
//     production, so a local click-through 404s and the mismatch is not found
//     until after deploy — the same reason /sitemap.xml is handled above.
const COMPARISON_REDIRECTS = [
    '/fue-vs-dhi-hair-transplant'            => '/blog/fue-vs-dhi-hair-transplant',
    '/fue-vs-fut-hair-transplant'            => '/blog/fue-vs-fut-hair-transplant',
    '/prp-vs-hair-transplant'                => '/blog/prp-or-hair-transplant',
    '/prp-vs-gfc-treatment'                  => '/blog/prp-vs-gfc-vs-exosomes',
    '/hair-transplant-risks-and-side-effects' => '/blog/hair-transplant-side-effects-and-risks',
    '/blog/hair-transplant-guarantees-and-success-rates' => '/blog/hair-transplant-promises-and-success-rates',
];

$trimmed = rtrim($uri, '/');
if ($trimmed !== '' && isset(COMPARISON_REDIRECTS[$trimmed])) {
    header('Location: ' . COMPARISON_REDIRECTS[$trimmed], true, 301);
    exit;
}

// 1e. Trailing slash on a page URL -> 301 to the slashless URL. Mirrors the
//     .htaccess rule (§6), so /about-us/ behaves locally as it does live.
if ($trimmed !== '' && $trimmed !== $uri && !is_dir($file) && file_exists(__DIR__ . $trimmed . '.php')) {
    header('Location: ' . $trimmed, true, 301);
    exit;
}

// 2. Directory with index.php exists? (e.g. /blog/)
if (is_dir($file)) {
    $dirIndex = rtrim($file, '/') . '/index.php';
    if (file_exists($dirIndex)) {
        require $dirIndex;
        exit;
    }
}

// 3. Extensionless PHP file exists? Require it.
$phpFile = __DIR__ . $uri . '.php';
if (file_exists($phpFile)) {
    require $phpFile;
    exit;
}

// 3b. Delhi hair transplant area pages without a file of their own share one
//     template, which 404s an unknown slug. Mirrors .htaccess §7b.
if (preg_match('#^/hair-transplant-delhi/([a-z0-9-]+)$#', $uri, $m)) {
    $_GET['slug'] = $m[1];
    require __DIR__ . '/hair-transplant-delhi/area.php';
    exit;
}

// 4. Nothing matched: 404.php, at the requested address.
http_response_code(404);
require __DIR__ . '/404.php';
