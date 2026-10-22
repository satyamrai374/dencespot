<?php
/**
 * /about-us — page #10. Rebuilt from about-clinic.html.
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
    'description' => 'Doctor-led hair restoration in Sector 39, Gurugram. One clinic, one address, and the doctor who assesses you is the doctor who performs your procedure.',
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
    <div class="split">
      <div>
        <span class="pill pill--dot">About the clinic</span>
        <h1 class="h1 mt-3">A Hair Restoration Clinic in Gurgaon, Built Around the Doctor</h1>
        <p class="lead mt-3 measure">DenceSpot is a single clinic in Sector 39, Gurugram. Every consultation, procedure and follow-up review happens here, with the doctor who planned your case. There is no consultation team, no counsellor between you and the person operating, and no second branch where your review gets handed to someone else.</p>
        <?= medical_review_line() ?>
        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--outline" href="/dr-nyra">Meet Dr. Nyra</a>
        </div>
      </div>
      <div class="media ratio-4-5 media--shadow"><img src="/assets/img/clinic-facade.jpg" alt="DenceSpot Clinic shopfront on Sector 39 Road, Jharsa, Gurugram, showing the hair transplant and PRP treatment signage" width="800" height="1000" loading="eager"></div>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">How we work</p>
      <h2 id="six-commitments" class="h2 mt-2">Six Commitments</h2>
      <p class="body mt-3">These are not aspirations. They are the things a patient can check, and the things we would want checked if we were the patient.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--pad-lg"><?= icon('user', 24, 'var(--accent-deep)') ?><h3 class="h3 mt-3">One doctor, start to finish</h3><p class="body-s mt-2">The doctor who assesses you designs the plan and performs the procedure. You are not handed on after the consultation.</p></div>
      <div class="card card--pad-lg"><?= icon('search', 24, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Diagnosis before treatment</h3><p class="body-s mt-2">Reversible causes are investigated and treated first. Some patients leave with a prescription and no procedure at all.</p></div>
      <div class="card card--pad-lg"><?= icon('doc', 24, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Everything in writing</h3><p class="body-s mt-2">Technique, graft number, timeline and an itemised cost. Nothing is added on the day of the procedure.</p></div>
      <div class="card card--pad-lg"><?= icon('scale', 24, 'var(--accent-deep)') ?><h3 class="h3 mt-3">No pressure to book</h3><p class="body-s mt-2">You leave the consultation with a plan, not a deadline. If the honest answer is to wait, that is the answer you get.</p></div>
      <div class="card card--pad-lg"><?= icon('chart', 24, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Progress documented</h3><p class="body-s mt-2">Baseline and interval photographs at fixed angle and lighting, kept on your record and reviewed with you.</p></div>
      <div class="card card--pad-lg"><?= icon('info', 24, 'var(--accent-deep)') ?><h3 class="h3 mt-3">No guarantees we cannot keep</h3><p class="body-s mt-2">No promised densities, no success-rate percentages, and no borrowed before-and-after photographs.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">The clinic</p>
        <h2 id="our-facility" class="h2 mt-2">Our Facility</h2>
        <p class="body mt-3">A dedicated procedure room, a separate consultation room and a recovery area, at one address in Sector 39.</p>
        <a class="btn btn--outline mt-4" href="/contact"><?= icon('pin', 17) ?> Directions and hours</a>
      </div>
      <div class="grid grid--2">
        <div class="media ratio-4-3 media--sm media--shadow"><img src="/assets/img/clinic-front-board.jpg" alt="DenceSpot Clinic shopfront on Sector 39 Road, Jharsa, Gurugram, showing the hair transplant and PRP treatment signage" width="800" height="600" loading="lazy"></div>
        <div class="media ratio-4-3 media--sm media--shadow"><img src="/assets/img/clinic-facade.jpg" alt="DenceSpot Clinic shopfront on Sector 39 Road, Jharsa, Gurugram, showing the hair transplant and PRP treatment signage" width="800" height="600" loading="lazy"></div>
        <div class="media ratio-4-3 media--sm media--shadow"><img src="/assets/img/dr-nayra.webp" alt="Dr. Nyra, MBBS, MD (Dermatology), hair restoration doctor at DenceSpot Clinic, Sector 39 Gurugram" width="800" height="600" loading="lazy"></div>
        <div class="media ratio-4-3 media--sm media--shadow"><img src="/assets/img/clinic-equipment.jpg" alt="Motorised follicular-unit extraction handpiece and trolley unit at DenceSpot Clinic, Gurugram" width="800" height="600" loading="lazy"></div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="wrap">
    <div class="split split--wide-right">
      <div class="media ratio-4-5 media--shadow"><img src="/assets/img/dr-nayra.webp" alt="Dr. Nyra, MBBS, MD (Dermatology), hair restoration doctor at DenceSpot Clinic, Sector 39 Gurugram" width="800" height="1000" loading="lazy" decoding="async"></div>
      <div>
        <p class="eyebrow">Who treats you</p>
        <h2 class="h2 mt-2"><?= doctor_full() ?></h2>
        <p class="body-l mt-2" style="font-weight:600">Owner &amp; Chief Consultant</p>
        <p class="body mt-3 measure">Qualified MBBS from Dr. D. Y. Patil Medical College, and holds an MD in Dermatology. Three years of clinical work in Germany followed — two at Bio Hair Clinic and one at St. Georg Klinikum Eisenach — before establishing DenceSpot in Gurugram.</p>
        <p class="body mt-3 measure">Her clinical interest is in the unglamorous half of hair restoration: donor management, staging treatment across a patient's lifetime, and recognising the cases where surgery is the wrong answer.</p>
        <a class="btn btn--ink mt-4" href="/dr-nyra">Full profile and credentials</a>
      </div>
    </div>
  </div>
</section>

<section class="section section--ink">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Treatments</p>
      <h2 id="what-we-treat" class="h2 mt-2">What We Treat</h2>
      <p class="body-l mt-3">Surgical and non-surgical, with the least invasive option considered first.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <a class="card card--ink" href="/hair-transplant-in-gurgaon" style="text-decoration:none"><h3 class="h4" style="color:#fff">Hair transplant</h3><p class="meta mt-2">FUE, DHI and FUT, planned around your donor area.</p></a>
      <a class="card card--ink" href="/beard-transplant-gurgaon" style="text-decoration:none"><h3 class="h4" style="color:#fff">Beard transplant</h3><p class="meta mt-2">Patchy cheeks, jawline, moustache, sideburns and scars.</p></a>
      <a class="card card--ink" href="/hair-prp-treatment-in-gurgaon" style="text-decoration:none"><h3 class="h4" style="color:#fff">Hair PRP</h3><p class="meta mt-2">Support for follicles that are thinning but still present.</p></a>
      <a class="card card--ink" href="/hair-fall-treatment-in-gurgaon" style="text-decoration:none"><h3 class="h4" style="color:#fff">Hair fall treatment</h3><p class="meta mt-2">Cause investigated before any treatment is started.</p></a>
      <a class="card card--ink" href="/hair-fall-treatment-in-gurgaon" style="text-decoration:none"><h3 class="h4" style="color:#fff">Women's hair loss</h3><p class="meta mt-2">Broader investigation, because the cause more often is treatable.</p></a>
      <a class="card card--ink" href="/hair-prp-treatment-in-gurgaon" style="text-decoration:none"><h3 class="h4" style="color:#fff">GFC therapy</h3><p class="meta mt-2">Growth factor concentrate, where it is the right choice.</p></a>
    </div>
  </div>
</section>

<?= local_block(
    'Where to Find Us',
    'One clinic, one address, one team. Patients travel to us from across Gurugram and neighbouring parts of South Delhi.'
) ?>

<?= cta_band(
    'Come and Talk to the Doctor',
    'An examination, an honest opinion, and a written plan if treatment is appropriate. No obligation to book anything on the day.',
    'about-us'
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
