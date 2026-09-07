<?php
/**
 * Page head, masthead, breadcrumbs.
 *
 * Every page defines $page before including this file:
 *
 *   $page = [
 *     'title'       => 'Beard Transplant in Gurgaon | DenceSpot Clinic',
 *     'description' => 'One sentence, 150–160 chars, written for a human.',
 *     'url'         => '/beard-transplant-gurgaon',
 *     'crumbs'      => [['name' => 'Home', 'url' => '/'], ['name' => 'Beard transplant']],
 *     'schema'      => [schema_clinic(), schema_procedure(...)],
 *     'og_image'    => '/assets/img/og/beard.jpg',   // optional
 *     'nav_active'  => '/beard-transplant-gurgaon',  // optional, defaults to url
 *   ];
 *   require __DIR__ . '/includes/header.php';
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/schema.php';
require_once __DIR__ . '/components.php';

$page = array_merge([
    'title'       => SITE_NAME,
    'description' => '',
    'url'         => '/',
    'crumbs'      => [],
    'schema'      => [],
    'og_type'     => 'website',
    'og_image'    => OG_IMAGE,   // per-page override allowed; never empty
    'nav_active'  => null,
    'body_class'  => '',
    'noindex'     => false,
    'preload_image' => '',   // above-the-fold LCP image, if the page has one
], $page ?? []);

$canonical  = abs_url($page['url']);
$navActive  = $page['nav_active'] ?? $page['url'];
$ogImage    = $page['og_image'] !== '' ? abs_url($page['og_image']) : '';
// Append the page-level medical review node where the page earns one.
$medicalNode = schema_medical_webpage($page['url'] ?? '', $page['title'] ?? SITE_NAME);
$schemaHtml  = schema_render($medicalNode === null ? $page['schema'] : array_merge($page['schema'], [$medicalNode]));
?>
<!DOCTYPE html>
<html lang="en-IN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?= e($page['title']) ?></title>
<?php if ($page['description'] !== ''): ?>
<meta name="description" content="<?= e($page['description']) ?>">
<?php endif; ?>
<link rel="canonical" href="<?= e($canonical) ?>">
<?php if (SITE_STAGING): ?>
<meta name="robots" content="noindex, nofollow">
<?php elseif ($page['noindex']): ?>
<meta name="robots" content="noindex, follow">
<?php else: ?>
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<?php endif; ?>

<?php /* Articles must declare og:type=article, or the blog unfurls as a site homepage. */ ?>
<meta property="og:type" content="<?= e($page['og_type'] ?? 'website') ?>">
<meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
<meta property="og:title" content="<?= e($page['title']) ?>">
<meta property="og:description" content="<?= e($page['description']) ?>">
<meta property="og:url" content="<?= e($canonical) ?>">
<meta property="og:locale" content="en_IN">
<?php if ($ogImage !== ''): ?>
<meta property="og:image" content="<?= e($ogImage) ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="<?= e(SITE_NAME) ?> — <?= e(SITE_TAGLINE) ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="<?= e($ogImage) ?>">
<?php else: ?>
<meta name="twitter:card" content="summary">
<?php endif; ?>
<meta name="twitter:title" content="<?= e($page['title']) ?>">
<meta name="twitter:description" content="<?= e($page['description']) ?>">

<meta name="theme-color" content="#F5F4F7">
<link rel="icon" href="/assets/img/favicon.svg" type="image/svg+xml">
<meta name="google-site-verification" content="lY4q2j4iJeavvMLFbV79PMyxrUoZwh-sV1bhIt4CNSU" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap">
<link rel="stylesheet" href="/assets/css/site.css">
<?php if ($page['preload_image'] !== ''): ?>
<link rel="preload" as="image" href="<?= e($page['preload_image']) ?>" fetchpriority="high">
<?php endif; ?>

<?= $schemaHtml ?>
</head>
<body<?= $page['body_class'] !== '' ? ' class="' . e($page['body_class']) . '"' : '' ?>>

<a class="skip-link" href="#main">Skip to content</a>

<header class="site-header">
  <div class="site-header__bar">

    <a class="brand" href="/">
      <span class="brand__mark"><?= icon('logo', 19, '#10B981', 1.7) ?></span>
      <span class="brand__name">
        <b>DenceSpot</b>
        <span>Hair Restoration Clinic</span>
      </span>
    </a>

    <nav class="nav" aria-label="Primary">
      <?php foreach (NAV_PRIMARY as $item): ?>
        <?php if (isset($item['children'])): ?>
          <div class="nav-dropdown">
            <span class="nav-dropdown-toggle"><?= e($item['label']) ?> &#9662;</span>
            <div class="nav-dropdown-menu">
              <?php foreach ($item['children'] as $child): ?>
                <a href="<?= e($child['url']) ?>"<?= $child['url'] === $navActive ? ' aria-current="page"' : '' ?>><?= e($child['label']) ?></a>
              <?php endforeach; ?>
            </div>
          </div>
        <?php else: ?>
          <a href="<?= e($item['url']) ?>"<?= $item['url'] === $navActive ? ' aria-current="page"' : '' ?>><?= e($item['label']) ?></a>
        <?php endif; ?>
      <?php endforeach; ?>
    </nav>

    <div class="header-ctas">
      <a class="btn btn--accent btn--wa" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp">
        <?= icon('whatsapp', 15) ?> WhatsApp
      </a>
      <a class="btn btn--ink btn--book" href="/book-consultation">Book Consultation</a>
    </div>

    <div class="header-actions">
      <a class="icon-btn" href="tel:<?= e(PHONE_E164) ?>" aria-label="Call the clinic on <?= e(PHONE_DISPLAY) ?>" data-track="call">
        <?= icon('phone', 16) ?>
      </a>
      <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="mobile-nav" aria-label="Open menu">
        <?= icon('menu', 20) ?>
      </button>
    </div>

  </div>

  <div class="mobile-nav" id="mobile-nav" data-open="false">
    <ul>
      <?php foreach (NAV_PRIMARY as $item): ?>
        <?php if (isset($item['children'])): ?>
          <li class="mobile-nav-heading" style="padding: 10px 0; font-weight: 700; color: var(--ink);"><?= e($item['label']) ?></li>
          <?php foreach ($item['children'] as $child): ?>
            <li><a href="<?= e($child['url']) ?>"<?= $child['url'] === $navActive ? ' aria-current="page"' : '' ?> style="padding-left: 16px;"><?= e($child['label']) ?></a></li>
          <?php endforeach; ?>
        <?php else: ?>
          <li><a href="<?= e($item['url']) ?>"<?= $item['url'] === $navActive ? ' aria-current="page"' : '' ?>><?= e($item['label']) ?></a></li>
        <?php endif; ?>
      <?php endforeach; ?>
      <li><a href="/book-consultation">Book a consultation</a></li>
    </ul>
  </div>
</header>

<?php if (count($page['crumbs']) > 1): ?>
<nav class="crumbs" aria-label="Breadcrumb">
  <ol>
    <?php $lastCrumb = count($page['crumbs']) - 1; ?>
    <?php foreach ($page['crumbs'] as $i => $crumb): ?>
      <li>
        <?php if ($i === $lastCrumb || empty($crumb['url'])): ?>
          <span aria-current="page"><?= e($crumb['name']) ?></span>
        <?php else: ?>
          <a href="<?= e($crumb['url']) ?>"><?= e($crumb['name']) ?></a>
        <?php endif; ?>
      </li>
      <?php if ($i !== $lastCrumb): ?><li aria-hidden="true">&rsaquo;</li><?php endif; ?>
    <?php endforeach; ?>
  </ol>
</nav>
<?php endif; ?>

<main id="main">
