<?php
/**
 * /medical-disclaimer
 *
 * YMYL requirement. Every clinical page on this site carries the shared
 * MEDICAL_DISCLAIMER string; this page is where that promise is set out in
 * full and linked from the footer sitewide.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$crumbs = [['name' => 'Home', 'url' => '/'], ['name' => 'Medical disclaimer']];

$page = [
    'title'       => 'Medical Disclaimer | ' . SITE_NAME,
    'description' => 'How to read the medical information on this website, who reviews it, and why no hair restoration outcome can be guaranteed.',
    'url'         => '/medical-disclaimer',
    'crumbs'      => $crumbs,
    'schema'      => [schema_clinic(), schema_physician(), schema_breadcrumbs($crumbs)],
];

require __DIR__ . '/includes/header.php';
?>

<section class="section section--canvas">
  <div class="wrap">
    <div class="measure">
      <span class="pill pill--dot">Medical disclaimer</span>
      <h1 class="h1 mt-3">How to Read the Medical Information Here</h1>
      <p class="lead mt-3">Last reviewed <?= e(REVIEWED_DATE) ?> by <?= e(REVIEWED_BY) ?>.</p>
    </div>

    <div class="prose measure mt-6">
      <h2 class="h3">This is education, not a consultation</h2>
      <p class="body mt-2">Everything written on this website is general patient education. It describes how treatments work, what they typically involve and what usually happens afterwards. It cannot tell you what <em>you</em> need, because that requires examining your scalp under magnification and measuring your donor density. Nothing here replaces a consultation with a qualified doctor.</p>

      <h2 class="h3 mt-6">Who writes and reviews it</h2>
      <p class="body mt-2">All clinical content on this site is written or reviewed by <a href="/dr-nyra"><?= e(DOCTORS['dr-nyra']['name']) ?></a>, <?= e(DOCTORS['dr-nyra']['quals']) ?>, <?= e(DOCTORS['dr-nyra']['role']) ?>. Pages carry the date they were last reviewed.</p>

      <h2 class="h3 mt-6">No outcome is guaranteed</h2>
      <p class="body mt-2">Results vary between patients, and they vary for reasons that are not fully controllable: donor characteristics, healing, the underlying condition and how hair loss progresses afterwards. Not every graft survives. Hair that was not transplanted can keep thinning. We do not guarantee a density, a graft survival percentage, a timeline or a final appearance, and we would be cautious of any clinic that does.</p>

      <h2 class="h3 mt-6">Figures, ranges and timelines</h2>
      <p class="body mt-2">Where this site gives graft ranges, cost ranges or recovery timings, they are planning guides drawn from typical cases, not quotations and not promises. Your own numbers come from the assessment and are given to you in writing.</p>

      <h2 class="h3 mt-6">Before and after photographs</h2>
      <p class="body mt-2">Any patient photographs shown are published with consent and are of real patients treated at this clinic. They show what was achieved for that individual with that donor supply and that pattern of loss. They are not a prediction of what will be achieved for you.</p>

      <h2 class="h3 mt-6">Medicines</h2>
      <p class="body mt-2">Where medical treatment is described, it is described generally. Prescription medicines have side effects, interactions and contraindications, and some are not suitable in pregnancy or while planning a pregnancy. Do not start, stop or change any medicine based on something you read here, including anything bought without a prescription.</p>

      <h2 class="h3 mt-6">If something is wrong</h2>
      <p class="body mt-2">If you are a patient and something is not healing as expected, or you are worried, contact the clinic on <a href="tel:<?= e(PHONE_E164) ?>"><?= e(PHONE_DISPLAY) ?></a> rather than waiting for your next review. If you have symptoms of a medical emergency, seek urgent care. Do not use this website or WhatsApp for anything urgent.</p>

      <p class="note note--tint mt-6"><?= e(MEDICAL_DISCLAIMER) ?></p>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
