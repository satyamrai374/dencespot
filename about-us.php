<?php
/**
 * /about-us — page #10. Rebuilt from about-clinic.html.
 *
 * Oct 2026 — NMC Guidelines on Ethical Advertising (Public Notice
 * R-13014/01/2024-Ethics, 06.10.2026). Removed: both doctor portraits and the
 * two shopfront photographs (cl. 9.2; the signage carries "No Pain | No Scar"
 * and "Permanent" claims), the German-training CV and the "Hair Restoration
 * Surgeon" title for Dr. Rahul (cl. 8.1(iii), 8.3(ii); his recognised degree is
 * unverified), and the "one clinic, one address / same doctor throughout"
 * claims, which are untrue now that there is a Rohini clinic. The doctors now
 * appear only as the directory particulars rendered by doctor_block()
 * (cl. 9.1, Explanation IV).
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'About the clinic'],
];

$page = [
    'title'       => 'About DenceSpot Clinic | Hair Restoration in Gurugram',
    'description' => 'About DenceSpot Clinic: doctor-led hair restoration in Sector 39, Gurugram and Rohini, Delhi — how the clinic works, the treatments offered and the doctors’ registration details.',
    'url'         => '/about-us',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        [
            '@type'      => 'AboutPage',
            '@id'        => abs_url('/about-us') . '#page',
            'mainEntity' => ['@id' => SITE_ORIGIN . '/#clinic'],
        ],
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="section section--canvas">
  <div class="wrap">
    <div class="measure">
      <span class="pill pill--dot">About the clinic</span>
      <h1 class="h1 mt-3">A Doctor-Led Hair Restoration Clinic in Gurgaon and Delhi</h1>
      <p class="lead mt-3 measure">DenceSpot Clinic has two clinics: Sector 39, Gurugram, and Rohini, Delhi. Consultations and treatment are available at both, with registered medical practitioners, and every treatment plan starts with an examination of your scalp and a review of your medical history.</p>
      <?= medical_review_line() ?>
      <div class="btn-row mt-5">
        <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
        <a class="btn btn--lg btn--outline" href="#doctor">Doctors and registration</a>
      </div>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">How we work</p>
      <h2 id="six-commitments" class="h2 mt-2">Six Commitments</h2>
      <p class="body mt-3">These are not aspirations. They are the things a patient can check, and the things we would want checked if we were the patient.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--pad-lg"><?= icon('user', 24, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Doctor-led care</h3><p class="body-s mt-2">Consultations and procedures are carried out by registered medical practitioners. Your plan is drawn up after a doctor has examined you.</p></div>
      <div class="card card--pad-lg"><?= icon('search', 24, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Diagnosis before treatment</h3><p class="body-s mt-2">Reversible causes are investigated and treated first. Some patients leave with a prescription and no procedure at all.</p></div>
      <div class="card card--pad-lg"><?= icon('doc', 24, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Everything in writing</h3><p class="body-s mt-2">Technique, graft number, timeline and an itemised cost. Nothing is added on the day of the procedure.</p></div>
      <div class="card card--pad-lg"><?= icon('scale', 24, 'var(--accent-deep)') ?><h3 class="h3 mt-3">No pressure to book</h3><p class="body-s mt-2">You leave the consultation with a plan, not a deadline. If the honest answer is to wait, that is the answer you get.</p></div>
      <div class="card card--pad-lg"><?= icon('chart', 24, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Progress documented</h3><p class="body-s mt-2">Baseline and interval photographs at fixed angle and lighting, kept on your record and reviewed with you.</p></div>
      <div class="card card--pad-lg"><?= icon('info', 24, 'var(--accent-deep)') ?><h3 class="h3 mt-3">No promised outcomes</h3><p class="body-s mt-2">No promised densities, no success-rate percentages, and no before-and-after photographs used to advertise treatment.</p></div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Consultations and procedures are carried out by registered medical practitioners. Each doctor’s recognised qualification and medical council registration are listed below.'
) ?>

<section class="section section--white">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">The clinic</p>
        <h2 id="our-facility" class="h2 mt-2">Our Facility</h2>
        <p class="body mt-3">A dedicated procedure room, a separate consultation room and a recovery area at the Sector 39, Gurugram clinic. Our clinic in Rohini, Delhi offers the same treatments.</p>
        <a class="btn btn--outline mt-4" href="/contact"><?= icon('pin', 17) ?> Both clinics: directions and hours</a>
      </div>
      <div class="media ratio-4-3 media--shadow"><img src="/assets/img/clinic-equipment.jpg" alt="Motorised follicular-unit extraction handpiece and trolley unit at DenceSpot Clinic, Gurugram" width="800" height="600" loading="lazy"></div>
    </div>
  </div>
</section>

<section class="section section--ink">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Treatments</p>
      <h2 id="what-we-treat" class="h2 mt-2">What We Treat</h2>
      <p class="body-l mt-3">Surgical and non-surgical, with the least invasive option considered first.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <a class="card card--ink" href="/hair-transplant-in-gurgaon" style="text-decoration:none"><h3 class="h4">Hair transplant</h3><p class="meta mt-2">FUE, DHI and FUT, planned around your donor area.</p></a>
      <a class="card card--ink" href="/beard-transplant-gurgaon" style="text-decoration:none"><h3 class="h4">Beard transplant</h3><p class="meta mt-2">Patchy cheeks, jawline, moustache, sideburns and scars.</p></a>
      <a class="card card--ink" href="/hair-prp-treatment-in-gurgaon" style="text-decoration:none"><h3 class="h4">Hair PRP</h3><p class="meta mt-2">Support for follicles that are thinning but still present.</p></a>
      <a class="card card--ink" href="/hair-fall-treatment-in-gurgaon" style="text-decoration:none"><h3 class="h4">Hair fall treatment</h3><p class="meta mt-2">Cause investigated before any treatment is started.</p></a>
      <a class="card card--ink" href="/womens-hair-loss-treatment-in-gurgaon" style="text-decoration:none"><h3 class="h4">Women's hair loss</h3><p class="meta mt-2">Broader investigation, because the cause more often is treatable.</p></a>
      <a class="card card--ink" href="/gfc-treatment-in-gurgaon" style="text-decoration:none"><h3 class="h4">GFC therapy</h3><p class="meta mt-2">Growth factor concentrate, where it is the right choice.</p></a>
    </div>
  </div>
</section>

<?= local_block(
    'Where to Find Us',
    'Consultations and treatment are available at both clinics: Sector 39, Gurugram, and Rohini, Delhi. Directions, phone numbers and maps for each are on the contact page.'
) ?>

<?= cta_band(
    'Come and Talk to the Doctor',
    'An examination, an honest opinion, and a written plan if treatment is appropriate. No obligation to book anything on the day.',
    'about-us'
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
