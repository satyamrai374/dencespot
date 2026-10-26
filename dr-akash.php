<?php
/**
 * /dr-akash — doctor directory profile (client request, 25 Oct 2026).
 *
 * Built on /dr-rahul: a directory entry under the NMC Guidelines on Ethical
 * Advertising and Public Communication (Public Notice R-13014/01/2024-Ethics,
 * 06.10.2026), listing only what the clinic has supplied — training,
 * fellowship and experience, from DOCTORS['dr-akash'].
 *
 * Dr. Akash's recognised medical degree is not yet on record
 * (DOCTORS['dr-akash']['quals'] is null). IMC Regulations 2002 r.1.4.2 allow
 * only recognised degrees after a doctor's name and r.7.20 bars claiming to be
 * a specialist without a qualification in that branch, so the page does not
 * use either title. Unlike /dr-rahul it shows no bracketed
 * placeholders (client, 25 Oct 2026): a missing fact is simply left out, and
 * each row below appears once its config value is filled in.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$doc = DOCTORS['dr-akash'];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'About', 'url' => '/about-us'],
    ['name' => $doc['name']],
];

/*
 * Physician node without jobTitle or medicalSpecialty: role is not on record,
 * and schema_physician() fills medicalSpecialty from Dr. Nyra's degree.
 */
$physician = schema_physician('dr-akash');
if ($physician !== null) {
    unset($physician['jobTitle'], $physician['medicalSpecialty']);
}

$page = [
    'title'       => $doc['name'] . ' | DenceSpot Clinic',
    'description' => 'Directory profile of ' . $doc['name'] . ' at DenceSpot Clinic: training, fellowship and experience, and how to book a consultation.',
    'url'         => '/dr-akash',
    'preload_image' => $doc['image'],
    'nav_active'  => '/about-us',
    'crumbs'      => $crumbs,
    /*
     * Stays noindex until Dr. Akash's recognised medical degree is entered in
     * DOCTORS['dr-akash']['quals']: a doctor's public profile without the
     * qualification the NMC directory format puts first should not be offered
     * to search engines. Remove this line, and 'dr-akash' from SITEMAP_EXCLUDE
     * in sitemap.php, together once it is.
     */
    'noindex'     => true,
    'schema'      => [
        schema_clinic(),
        $physician,
        schema_breadcrumbs($crumbs),
        [
            '@type'     => 'ProfilePage',
            '@id'       => abs_url('/dr-akash') . '#page',
            'mainEntity'=> ['@id' => abs_url('/dr-akash') . '#physician'],
        ],
    ],
];

/* Particulars, in the NMC directory order; a row with no value on record is
   left out rather than shown as a placeholder. */
$particulars = array_filter([
    'Name'           => $doc['name'],
    'Qualifications' => $doc['quals'] ?? null,
    'Trained at'     => $doc['alumni'] ?? null,
    'Fellowship'     => $doc['fellowship'] ?? null,
    'Experience'     => $doc['experience'] ?? null,
    'Consults at'    => !empty($doc['clinics']) ? SITE_NAME . ', ' . $doc['clinics'] : null,
]);

require __DIR__ . '/includes/header.php';
?>

<section class="section section--canvas">
  <div class="wrap">
    <div class="split split--wide-right" style="align-items:start">
      <div class="media ratio-1-1 media--shadow" style="max-width:380px">
        <img src="<?= e($doc['image']) ?>" alt="<?= e($doc['name']) ?> at <?= e(SITE_NAME) ?>" width="380" height="380" loading="eager" fetchpriority="high" decoding="async">
      </div>
      <div>
        <span class="pill pill--dot">Doctor profile</span>
        <h1 class="h1 mt-3"><?= e($doc['name']) ?></h1>
        <p class="lead mt-3 measure"><?= e($doc['name']) ?> is one of the doctors at <?= e(SITE_NAME) ?>. Training, fellowship and experience are listed below; every plan starts with an examination in person.</p>
        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Ask a Question</a>
        </div>
      </div>
    </div>

    <div class="card card--pad-lg mt-6" style="max-width:760px">
      <h2 id="particulars" class="h3">Particulars</h2>
      <dl class="dl">
        <?php foreach ($particulars as $label => $value): ?>
        <div>
          <dt><?= e($label) ?></dt>
          <dd><?= e($value) ?></dd>
        </div>
        <?php endforeach; ?>
        <?php if (($reg = doctor_registration($doc)) !== ''): ?>
        <div>
          <dt>Registration</dt>
          <dd><?= $reg ?></dd>
        </div>
        <?php endif; ?>
      </dl>
      <?php if (doctor_registration($doc) !== ''): ?>
      <p class="meta mt-4">Registration can be verified on the National Medical Commission’s <a href="https://www.nmc.org.in/information-desk/indian-medical-register/" rel="noopener" target="_blank">Indian Medical Register</a> or the <a href="https://nmr-nmc.abdm.gov.in/" rel="noopener" target="_blank">National Medical Register</a>.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<?= cta_band(
    'Book a Consultation',
    'An examination, an honest opinion on whether treatment is appropriate for you, and a written plan if it is — with no pressure to book a date on the day.',
    'dr-akash'
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
