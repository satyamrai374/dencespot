<?php
/**
 * /dr-nyra — doctor directory profile.
 *
 * Oct 2026 — rewritten as a directory entry under the NMC Guidelines on
 * Ethical Advertising and Public Communication (Public Notice
 * R-13014/01/2024-Ethics, 06.10.2026). A clinic website may carry a directory
 * of its doctors giving name, recognised qualifications, specialty,
 * registration details and availability (cl. 9.1, Explanation IV); it may not
 * use a doctor's photograph as publicity (cl. 9.2), advertise personal
 * achievements (cl. 8.1(iii)) or portray an individual doctor promotionally
 * (cl. 8.3(ii)). So this page no longer shows the portrait, the German-training
 * CV, the "How she works" selling points or the "performs every case
 * personally" claim — only the particulars below, read from DOCTORS in
 * config.php.
 *
 * ⚠ Still required in config.php → DOCTORS['dr-nyra']: reg_number,
 * reg_council and reg_status. Until they are filled in, doctor_registration()
 * prints a visible placeholder here.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$doc = DOCTORS['dr-nyra'];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'About', 'url' => '/about-us'],
    ['name' => $doc['name']],
];

$page = [
    'title'       => $doc['name'] . ', ' . $doc['quals'] . ' | DenceSpot Clinic',
    'description' => $doc['name'] . ', ' . $doc['quals'] . ': specialty, medical council registration and the clinic where she consults — DenceSpot Clinic, Sector 39, Gurugram.',
    'url'         => '/dr-nyra',
    'nav_active'  => '/about-us',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician('dr-nyra'),   // no image: see schema_physician() and cl. 9.2
        schema_breadcrumbs($crumbs),
        [
            '@type'     => 'ProfilePage',
            '@id'       => abs_url('/dr-nyra') . '#page',
            'mainEntity'=> ['@id' => abs_url('/dr-nyra') . '#physician'],
        ],
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="section section--canvas">
  <div class="wrap">
    <div class="measure">
      <span class="pill pill--dot">Doctor profile</span>
      <h1 class="h1 mt-3"><?= doctor_full('dr-nyra') ?></h1>
      <p class="lead mt-3 measure"><?= e($doc['name']) ?> consults on hair loss and scalp conditions at <?= e(SITE_NAME) ?>, Gurugram, and carries out hair restoration procedures there. Treatment is planned only after an examination.</p>
      <div class="btn-row mt-5">
        <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
        <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Ask a Question</a>
      </div>
    </div>

    <div class="card card--pad-lg mt-6" style="max-width:760px">
      <h2 id="particulars" class="h3">Particulars</h2>
      <dl class="dl">
        <div>
          <dt>Name</dt>
          <dd><?= e($doc['name']) ?></dd>
        </div>
        <div>
          <dt>Qualifications</dt>
          <dd><?= e($doc['quals']) ?><?php if (!empty($doc['alumni'])): ?><span class="meta" style="display:block;font-weight:500">MBBS: <?= e($doc['alumni']) ?></span><?php endif; ?></dd>
        </div>
        <div>
          <dt>Specialty</dt>
          <dd><?= e($doc['specialty']) ?></dd>
        </div>
        <div>
          <dt>Registration</dt>
          <dd><?= doctor_registration($doc) ?></dd>
        </div>
        <div>
          <dt>Role</dt>
          <dd><?= e($doc['role']) ?></dd>
        </div>
        <div>
          <dt>Consults at</dt>
          <dd><?= e(SITE_NAME) ?>, <?= e($doc['clinics']) ?><span class="meta" style="display:block;font-weight:500"><?= e(nap_address_line()) ?></span></dd>
        </div>
      </dl>
      <p class="meta mt-4">Registration can be verified on the National Medical Commission’s <a href="https://www.nmc.org.in/information-desk/indian-medical-register/" rel="noopener" target="_blank">Indian Medical Register</a> or the <a href="https://nmr-nmc.abdm.gov.in/" rel="noopener" target="_blank">National Medical Register</a>.</p>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">At the clinic</p>
        <h2 id="at-the-clinic" class="h2 mt-2">Consultations and Content Review</h2>
      </div>
      <div class="stack measure">
        <p class="body">Treatments offered at the clinic are described on their own pages: <a href="/hair-transplant-in-gurgaon">hair transplant</a>, <a href="/beard-transplant-gurgaon">beard transplant</a>, <a href="/hair-prp-treatment-in-gurgaon">hair PRP</a> and <a href="/hair-fall-treatment-in-gurgaon">hair fall treatment</a>. Whether any of them suits you is decided only after an examination.</p>
        <p class="body">Pages on this website that carry a “medically reviewed by” line were reviewed by <?= e($doc['name']) ?> on the date shown on the page.</p>
        <p class="body"><?= e(SITE_NAME) ?> has two clinics, in Sector 39, Gurugram and Rohini, Delhi. Addresses, hours and maps for both are on the <a href="/contact">contact page</a>.</p>
        <p class="meta">Last site-wide clinical review: <?= e(REVIEWED_DATE) ?>.</p>
      </div>
    </div>
  </div>
</section>

<?= cta_band(
    'Book a Consultation',
    'An examination, an honest opinion on whether treatment is appropriate for you, and a written plan if it is — with no pressure to book a date on the day.',
    'dr-nyra'
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
