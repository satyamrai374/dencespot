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
 *
 * 14 Oct 2026 — landing-page layout (lp_split / lp_cta, includes/home-components.php):
 * AI-illustrated hero and sections, each image with its visible AI label. The
 * "Our Facility" photograph stays: it is a factual photo of the equipment.
 * This page presents both clinics.
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
    'description' => 'About DenceSpot Clinic: doctor-led hair, skin and laser care in Sector 39, Gurugram and Rohini, Delhi — how the clinic works and the treatments offered.',
    'url'         => '/about-us',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-consultation-768.webp',
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

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">About the clinic</span>
        <h1 class="h1 mt-3">A Doctor-Led Hair Restoration Clinic in Gurgaon and Delhi</h1>
        <p class="lead mt-3 measure">DenceSpot Clinic has two clinics: Sector 39, Gurugram, and Rohini, Delhi. Consultations and treatment are available at both, with registered medical practitioners, and every treatment plan starts with an examination of your scalp and a review of your medical history.</p>
        <?= medical_review_line() ?>
        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--outline" href="#doctor">Doctors and registration</a>
        </div>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-consultation-768.webp" srcset="/assets/img/services/svc-consultation-512.webp 512w, /assets/img/services/svc-consultation-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a dermatoscope and a notepad with a pencil on a wooden desk beside a fern" width="768" height="960" loading="eager" fetchpriority="high">
          <?= hp_ai_chip('AI-generated illustration') ?>
        </div>
        <div class="hero__badge-card">
          <p class="eyebrow">Two clinics</p>
          <p class="h4 mt-1">Sector 39, Gurugram · Rohini, Delhi</p>
          <p class="meta"><?= e(HOURS_DISPLAY) ?><span style="display:block"><?= e(HOURS_NOTE) ?></span></p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-followup',
    'alt'     => 'a desk calendar with several dates circled, beside a pen and a small plant',
    'id'      => 'six-commitments',
    'eyebrow' => 'How we work',
    'title'   => 'Six Commitments',
    'tone'    => 'canvas',
    'html'    => '<p>These are not aspirations. They are the things a patient can check, and the things we would want checked if we were the patient.</p>',
    'points'  => [
        'Doctor-led care: consultations and procedures are carried out by registered medical practitioners, and your plan is drawn up after a doctor has examined you.',
        'Diagnosis before treatment: reversible causes are investigated and treated first, and some patients leave with a prescription and no procedure at all.',
        'Everything in writing: technique, graft number, timeline and an itemised cost, with nothing added on the day of the procedure.',
        'No pressure to book: you leave with a plan, not a deadline. If the honest answer is to wait, that is the answer you get.',
        'Progress documented: baseline and interval photographs at a fixed angle and lighting, kept on your record and reviewed with you.',
        'No promised outcomes: no promised densities, no success-rate percentages, and no before-and-after photographs used to advertise treatment.',
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-hair-transplant',
    'alt'     => 'a sculpted model of a follicular unit with three hairs, on a cream background',
    'id'      => 'what-we-treat',
    'eyebrow' => 'Treatments',
    'title'   => 'What We Treat',
    'reverse' => true,
    'html'    => '<p>Surgical and non-surgical, with the least invasive option considered first.</p>'
               . '<ul class="rohini-group__list">'
               . '<li><a href="/hair-transplant-in-gurgaon"><span>Hair transplant<span class="meta" style="display:block;font-weight:400;margin-top:2px">FUE, DHI and FUT, planned around your donor area.</span></span></a></li>'
               . '<li><a href="/beard-transplant-gurgaon"><span>Beard transplant<span class="meta" style="display:block;font-weight:400;margin-top:2px">Patchy cheeks, jawline, moustache, sideburns and scars.</span></span></a></li>'
               . '<li><a href="/hair-prp-treatment-in-gurgaon"><span>Hair PRP<span class="meta" style="display:block;font-weight:400;margin-top:2px">Support for follicles that are thinning but still present.</span></span></a></li>'
               . '<li><a href="/hair-fall-treatment-in-gurgaon"><span>Hair fall treatment<span class="meta" style="display:block;font-weight:400;margin-top:2px">Cause investigated before any treatment is started.</span></span></a></li>'
               . '<li><a href="/womens-hair-loss-treatment-in-gurgaon"><span>Women’s hair loss<span class="meta" style="display:block;font-weight:400;margin-top:2px">Broader investigation, because the cause more often is treatable.</span></span></a></li>'
               . '<li><a href="/gfc-treatment-in-gurgaon"><span>GFC therapy<span class="meta" style="display:block;font-weight:400;margin-top:2px">Growth factor concentrate, where it is the right choice.</span></span></a></li>'
               . '</ul>',
]) ?>

<?= doctor_block(
    'Consultations and procedures are carried out by registered medical practitioners. Each doctor’s recognised qualification is listed below.'
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

<?= local_block(
    'Where to Find Us',
    'Consultations and treatment are available at both clinics: Sector 39, Gurugram, and Rohini, Delhi. Directions, phone numbers and maps for each are on the contact page.'
) ?>

<?= lp_cta([
    'eyebrow' => 'Gurugram and Delhi',
    'title'   => 'Come and Talk to the Doctor',
    'text'    => 'An examination, an honest opinion, and a written plan if treatment is appropriate. No obligation to book anything on the day.',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
