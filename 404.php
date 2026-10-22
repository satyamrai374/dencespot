<?php
/**
 * 404 — recovery page.
 *
 * A dead end on a clinic site is a lost lead, and this site currently links to
 * a number of pages that are still being written. Rather than a bare error,
 * this routes the visitor to the treatment they were probably looking for and
 * keeps the two lead paths (WhatsApp, call-back) one tap away.
 *
 * Wired via ErrorDocument in .htaccess.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

http_response_code(404);

$page = [
    'title'       => 'Page Not Found | ' . SITE_NAME,
    'description' => 'That page could not be found. Browse hair transplant, PRP and hair fall treatment at DenceSpot Clinic, Gurugram, or book a consultation.',
    'url'         => '/404',
    'noindex'     => true,
    'crumbs'      => [],
    'schema'      => [schema_clinic()],
];

require __DIR__ . '/includes/header.php';
?>

<section class="section section--canvas">
  <div class="wrap">
    <div class="measure">
      <span class="pill pill--dot">404</span>
      <h1 class="h1 mt-3">That Page Isn't Here</h1>
      <p class="lead mt-3">The link may be out of date, or the page may still be in progress. Everything the clinic treats is listed below — or send your case straight to the doctor and skip the browsing.</p>
      <div class="btn-row mt-5">
        <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        <a class="btn btn--lg btn--ink" href="/book-consultation"><?= icon('calendar', 18) ?> Book a Consultation</a>
      </div>
    </div>

    <div class="grid grid--3 mt-6">
      <a class="card card--pad-lg" href="/hair-transplant-in-gurgaon" style="text-decoration:none;color:inherit">
        <h2 class="h4">Hair Transplant in Gurgaon</h2>
        <p class="meta mt-1">FUE, DHI and FUT — graft counts, cost and recovery.</p>
      </a>
      <a class="card card--pad-lg" href="/beard-transplant-gurgaon" style="text-decoration:none;color:inherit">
        <h2 class="h4">Beard Transplant</h2>
        <p class="meta mt-1">Filling patchy beard zones, sideburns and scarred areas.</p>
      </a>
      <a class="card card--pad-lg" href="/hair-prp-treatment-in-gurgaon" style="text-decoration:none;color:inherit">
        <h2 class="h4">Hair PRP Treatment</h2>
        <p class="meta mt-1">Planned course of sessions for early thinning.</p>
      </a>
      <a class="card card--pad-lg" href="/hair-fall-treatment-in-gurgaon" style="text-decoration:none;color:inherit">
        <h2 class="h4">Hair Fall Treatment</h2>
        <p class="meta mt-1">Finding the cause before treating the symptom.</p>
      </a>
      <a class="card card--pad-lg" href="/hair-transplant-cost-in-gurgaon" style="text-decoration:none;color:inherit">
        <h2 class="h4">What It Costs</h2>
        <p class="meta mt-1">How graft count and per-graft rate actually combine.</p>
      </a>
      <a class="card card--pad-lg" href="/contact" style="text-decoration:none;color:inherit">
        <h2 class="h4">Visit the Clinic</h2>
        <p class="meta mt-1"><?= e(NAP_LOCALITY) ?> · <?= e(HOURS_DISPLAY) ?></p>
      </a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
