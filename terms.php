<?php
/**
 * /terms — website terms of use.
 *
 * Deliberately narrow: this covers using the website. It does not attempt to
 * set treatment terms, which belong in the consent process at the clinic.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$crumbs = [['name' => 'Home', 'url' => '/'], ['name' => 'Terms']];

$page = [
    'title'       => 'Terms of Use | ' . SITE_NAME,
    'description' => 'The terms that apply to using the DenceSpot Clinic website, making an enquiry, and how appointments and written estimates work.',
    'url'         => '/terms',
    'crumbs'      => $crumbs,
    'schema'      => [schema_clinic(), schema_breadcrumbs($crumbs)],
];

require __DIR__ . '/includes/header.php';
?>

<section class="section section--canvas">
  <div class="wrap">
    <div class="measure">
      <span class="pill pill--dot">Terms</span>
      <h1 class="h1 mt-3">Terms of Use</h1>
      <p class="lead mt-3">These cover using this website. Treatment itself is governed by the consent you give at the clinic. Last reviewed <?= e(REVIEWED_DATE) ?>.</p>
    </div>

    <div class="prose measure mt-6">
      <h2 class="h3">Using this site</h2>
      <p class="body mt-2">You may read, print and share these pages for your own use. Please do not republish the content as your own or scrape it at scale.</p>

      <h2 class="h3 mt-6">Making an enquiry</h2>
      <p class="body mt-2">Submitting the enquiry form asks the clinic to call you back. It is not an appointment and does not reserve a date. Nothing is charged for enquiring, and you are under no obligation to book. Please give accurate contact details, because a wrong number is the most common reason an enquiry goes unanswered.</p>

      <h2 class="h3 mt-6">Appointments</h2>
      <p class="body mt-2">A consultation time is confirmed by the clinic directly, not by the website. If you cannot attend, tell us as early as you reasonably can so the slot can go to another patient.</p>

      <h2 class="h3 mt-6">Estimates and pricing</h2>
      <p class="body mt-2">Any range shown on this site is a planning guide, not a quotation. A binding figure is the written, itemised estimate issued after your assessment. That estimate names what it includes and what it excludes, and it is not changed retrospectively.</p>

      <h2 class="h3 mt-6">Accuracy</h2>
      <p class="body mt-2">Clinical content is reviewed and dated, and we correct errors when we find them. Medicine moves, though, and a page can be out of date between reviews. Where something matters to a decision you are making, ask at the consultation rather than relying on the page.</p>

      <h2 class="h3 mt-6">Links to other sites</h2>
      <p class="body mt-2">Where we link to another site, we do not control it and are not responsible for its content or its handling of your data.</p>

      <h2 class="h3 mt-6">Liability</h2>
      <p class="body mt-2">This website is provided as it is. We are not liable for loss arising from relying on general information here in place of a consultation. Nothing in these terms limits liability that cannot lawfully be limited, including for clinical negligence.</p>

      <h2 class="h3 mt-6">Governing law</h2>
      <p class="body mt-2">These terms are governed by the laws of India, and the courts at <?= e(NAP_LOCALITY) ?>, <?= e(NAP_REGION) ?> have jurisdiction.</p>

      <p class="note note--tint mt-6">See also the <a href="/privacy-policy">privacy policy</a> and the <a href="/medical-disclaimer">medical disclaimer</a>.</p>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
