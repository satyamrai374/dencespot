<?php
/**
 * /dr-rahul — doctor directory profile.
 *
 * Oct 2026 — rewritten as a directory entry under the NMC Guidelines on
 * Ethical Advertising and Public Communication (Public Notice
 * R-13014/01/2024-Ethics, 06.10.2026): name, recognised qualification,
 * specialty, registration details and availability only (cl. 9.1,
 * Explanation IV). Removed: the portrait and its preload (cl. 9.2), the
 * "Hair Restoration Surgeon" title and the "Expertise & Approach" /
 * "Standards Followed in Every Case" promotion (cl. 8.1(iii), 8.3(ii)).
 *
 * Dr. Rahul's recognised medical qualification is not yet verified
 * (DOCTORS['dr-rahul']['quals'] is null). IMC Regulations 2002 r.1.4.2 allow
 * only recognised degrees after a doctor's name and r.7.20 bars claiming to be
 * a specialist without a qualification in that branch, so this page does not
 * call him a surgeon or a specialist and shows visible placeholders instead.
 * The 'role' and 'specialty' values in config ("Hair Restoration Surgeon",
 * "Hair Restoration Surgery") are deliberately not used, on the page or in
 * schema, for the same reason.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$doc = DOCTORS['dr-rahul'];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'About', 'url' => '/about-us'],
    ['name' => $doc['name']],
];

/*
 * Physician node without jobTitle or medicalSpecialty: both come from config
 * values that are a job description, not a recognised qualification (see
 * above). schema_physician() already omits any image.
 */
$physician = schema_physician('dr-rahul');
if ($physician !== null) {
    unset($physician['jobTitle'], $physician['medicalSpecialty']);
}

$page = [
    'title'       => $doc['name'] . ' | DenceSpot Clinic',
    'description' => 'Directory profile of ' . $doc['name'] . ' at DenceSpot Clinic: recognised qualification, the clinic where he consults, and how to book a consultation.',
    'url'         => '/dr-rahul',
    'nav_active'  => '/about-us',
    'crumbs'      => $crumbs,
    /*
     * Stays noindex until Dr. Rahul's recognised medical degree and his State
     * Medical Council registration are verified and entered in
     * DOCTORS['dr-rahul'] (quals, reg_number, reg_council, reg_status). A
     * public profile with placeholders where the qualification belongs should
     * not be offered to search engines. Remove this line only once those
     * fields are filled in — listed_doctors() will then also add him to the
     * sitewide directory automatically.
     */
    'noindex'     => true,
    'schema'      => [
        schema_clinic(),
        $physician,
        schema_breadcrumbs($crumbs),
        [
            '@type'     => 'ProfilePage',
            '@id'       => abs_url('/dr-rahul') . '#page',
            'mainEntity'=> ['@id' => abs_url('/dr-rahul') . '#physician'],
        ],
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="section section--canvas">
  <div class="wrap">
    <div class="measure">
      <span class="pill pill--dot">Doctor profile</span>
      <h1 class="h1 mt-3"><?= e($doc['name']) ?></h1>
      <p class="lead mt-3 measure"><?= e($doc['name']) ?> works with the hair restoration team at <?= e(SITE_NAME) ?>. The particulars below are listed in the form the National Medical Commission requires; items shown in brackets are awaiting verification.</p>
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
          <dd><?= !empty($doc['quals']) ? e($doc['quals']) : missing_fact('recognised medical qualification') ?></dd>
        </div>
        <div>
          <dt>Specialty</dt>
          <dd><?= missing_fact('specialty, as per recognised qualification') ?></dd>
        </div>
        <?php if (($reg = doctor_registration($doc)) !== ''): ?>
        <div>
          <dt>Registration</dt>
          <dd><?= $reg ?></dd>
        </div>
        <?php endif; ?>
        <div>
          <dt>Consults at</dt>
          <dd><?= !empty($doc['clinics']) ? e(SITE_NAME . ', ' . $doc['clinics']) : missing_fact('clinic(s) where he consults') ?></dd>
        </div>
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
    'dr-rahul'
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
