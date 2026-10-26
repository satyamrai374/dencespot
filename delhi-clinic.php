<?php
/**
 * /delhi-clinic — DenceSpot Clinic Location 2: Delhi (Rohini)
 *
 * Dedicated clinic location page for patients in North-West Delhi, Rohini,
 * Pitampura, Shalimar Bagh, Paschim Vihar, and the wider Delhi NCR.
 *
 * October 2026 redesign: rebuilt on the site.css classes and the homepage's
 * clinic card (.hp-clinic), with no inline colours or emoji.
 *
 * 13 Oct 2026: the agency confirmed that ALL services are carried out at the
 * Rohini clinic, not only consultations. The page now says so, and its
 * treatments grid links to every Rohini service page (ROHINI_SERVICES in
 * config.php). Still deliberately NOT stated: the Delhi street address
 * (LOC_DELHI_ADDRESS holds only "Delhi (Rohini)"; the map pin is the exact
 * location until config.php has the address), and which doctor treats
 * patients at Rohini.
 *
 * 14 Oct 2026: per the client, a Rohini page never mentions the Gurugram
 * clinic, so the "either clinic" FAQ answers and the Gurugram clinic card are
 * gone. Landing-page layout: AI hero image, lp_split, the grouped treatments
 * grid, lp_steps, directions, form and FAQs (lp_* in home-components.php).
 *
 * 14 Oct 2026 (SEO round 2): retitled for "skin clinic in Rohini" searches;
 * call-back strip after the hero (the fuller enquiry form further down stays);
 * cost-guide links to the three Rohini cost pages; 14 FAQs. Metro wording kept
 * deliberately cautious (no nearest-station or travel-time claim), and still
 * no street address until config.php has the verified one.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

// /contact is the Gurugram clinic's page, so it is not this page's parent
// (location rule, 14 Oct 2026).
$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Delhi Clinic (Rohini)'],
];

/*
 * 14 Oct 2026 (SEO round 2): 14 questions, mostly logistics (hours, booking,
 * what to bring, photos first, EMI). Answers use only facts the site already
 * states; hours and phone come from config.php so they change in one place.
 */
$faqs = [
    [
        'q' => 'Where is the DenceSpot clinic in Rohini, Delhi?',
        'a' => 'The clinic is in Rohini, North-West Delhi, near the Outer Ring Road, and serves Pitampura, Shalimar Bagh and adjoining areas. The Google Maps pin and a directions link are on this page.'
    ],
    [
        'q' => 'What are the opening hours of the Rohini clinic?',
        'a' => 'The clinic is open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . '). Calls, WhatsApp messages and call-back requests are answered during those hours.'
    ],
    [
        'q' => 'How do I book an appointment at the Rohini clinic?',
        'a' => 'Use the Book a Consultation button on this page, call or WhatsApp the clinic on ' . LOC_DELHI_PHONE_DISPLAY . ', or leave your name and number in the call-back form, and the clinic will call you during opening hours to arrange a time.'
    ],
    [
        'q' => 'Can I send photos on WhatsApp before I visit?',
        'a' => 'Yes. Clear photos of your front hairline and crown, or of the skin concern, can be sent to the Rohini clinic on WhatsApp for a preliminary review. They help decide which appointment to book, but they do not replace an examination: a treatment plan and fees are given only after you have been seen in person.'
    ],
    [
        'q' => 'Which treatments are carried out at the Rohini clinic?',
        'a' => 'All of DenceSpot’s treatments are carried out at the Rohini clinic: hair transplant (including FUE and DHI), beard and eyebrow transplant, PRP, GFC and other non-surgical hair treatments, hair fall, alopecia areata and dandruff treatment, laser hair removal, skin treatment and face PRP. Hair consultations include a trichoscopy scalp evaluation, and every treatment is planned after an examination.'
    ],
    [
        'q' => 'Are procedures carried out in Rohini, or only consultations?',
        'a' => 'Procedures are carried out in Rohini. Consultations, procedures and follow-up reviews all take place at the Rohini clinic.'
    ],
    [
        'q' => 'Who will conduct my consultation and treatment at the Rohini clinic?',
        'a' => 'Consultations and treatments at the Rohini clinic are carried out by registered medical practitioners. The names and qualifications of the clinic’s doctors are listed on our <a href="/medical-disclaimer#doctors">doctors and registration</a> page.'
    ],
    [
        'q' => 'What should I bring to my first appointment?',
        'a' => 'A list of the medicines and supplements you take, earlier prescriptions and blood test reports, and details of any treatment you have already tried. For a skin or laser appointment, bring the products you use or photos of their labels, and come without makeup if you can. For a hair appointment, come with clean, dry hair and no oil, gel or hair fibres, so the scalp can be examined.'
    ],
    [
        'q' => 'How long should I allow for a first consultation?',
        'a' => 'There is no fixed length. A hair consultation covers your history, a trichoscopy examination, donor measurement and time for your questions, so plan an unhurried visit rather than a quick stop. The clinic can give you a rough idea of timing when it confirms your appointment.'
    ],
    [
        'q' => 'What happens if a treatment is not suitable for me?',
        'a' => 'You are told so at the consultation, with the reason, and no treatment is booked. Sometimes a test, a medical treatment or a different approach is suggested first; sometimes the honest advice is to wait.'
    ],
    [
        'q' => 'How are fees worked out at the Rohini clinic?',
        'a' => 'There is an examination before any plan. For a hair transplant, the written estimate is based on your measured donor availability and the graft coverage you need. Your own fees are confirmed in writing after your assessment, before you book a treatment date. The <a href="/hair-transplant-cost-in-rohini">hair transplant cost guide for Rohini</a> explains how an estimate is worked out.'
    ],
    [
        'q' => 'Is EMI available at the Rohini clinic?',
        'a' => 'Instalment options through third-party lenders may be available — ask at the consultation. How medical EMI works, and what to check before signing an instalment agreement, is explained on the <a href="/cost-and-emi-options">cost and EMI options</a> page.'
    ],
    [
        'q' => 'What is the phone number for the Rohini clinic?',
        'a' => 'Call the Rohini clinic on ' . LOC_DELHI_PHONE_DISPLAY . ', or message the same number on WhatsApp, to book an appointment, ask a question or send photos for a preliminary review.'
    ],
    [
        'q' => 'How can I reach the Rohini clinic by Delhi Metro?',
        'a' => 'The Red Line runs through Rohini and Pitampura, and stations such as Rohini West and Pitampura are options, with an auto or cab for the last stretch. Check the route from your own station with the Google Maps link on this page before you travel.'
    ],
];

$page = [
    'title'       => 'Skin & Hair Clinic in Rohini, Delhi | DenceSpot Clinic',
    'description' => 'DenceSpot skin and hair clinic in Rohini, North-West Delhi: hair transplant, PRP, hair fall, laser hair removal and skin treatment. Timings, map and booking.',
    'url'           => '/delhi-clinic',
    'crumbs'        => $crumbs,
    'preload_image' => '/assets/img/services/svc-consultation-768.webp',
    'schema'        => [
        schema_delhi_clinic(),
        /* Oct 2026: Dr. Rahul's node removed — his recognised qualification is
           unverified and config still gives him the "Hair Restoration Surgeon"
           title (IMC r.1.4.2, 7.20). Re-add once DOCTORS['dr-rahul'] is verified. */
        schema_physician('dr-nyra'),
        schema_breadcrumbs($crumbs),
        schema_faq('/delhi-clinic', $faqs),
        [
            '@type' => 'ContactPage',
            '@id'   => abs_url('/delhi-clinic') . '#page',
            'name'  => 'DenceSpot Clinic — Delhi (Rohini)',
            'about' => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
        ],
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Rohini, Delhi</span>
        <h1 class="h1 mt-3">DenceSpot Skin, Hair and Laser Clinic, Rohini</h1>
        <p class="lead mt-3 measure">A doctor-led skin and hair clinic in Rohini, serving North-West Delhi, Pitampura and Delhi NCR. Hair transplant, beard and eyebrow transplant, PRP and GFC, hair fall treatment, laser hair removal and skin treatment for acne, pigmentation and melasma are all carried out here by registered medical practitioners, each planned case by case after an examination.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="#book-consultation" data-book data-clinic="Delhi (Rohini)" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp the Rohini Clinic</a>
        </div>

        <?= ticks([
            'Consultations and treatments by registered medical practitioners',
            'Trichoscopy and donor-area assessment',
            'Hair transplant, PRP/GFC, laser and skin treatments',
            'Rohini, Delhi · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-consultation-768.webp" srcset="/assets/img/services/svc-consultation-512.webp 512w, /assets/img/services/svc-consultation-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a dermatoscope and a notepad with a pencil on a wooden desk beside a potted fern" width="768" height="960" loading="eager" fetchpriority="high">
          <?= hp_ai_chip('AI-generated illustration') ?>
        </div>
        <div class="hero__badge-card">
          <p class="eyebrow">Rohini Clinic</p>
          <p class="h4 mt-1"><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></p>
          <p class="meta"><?= e(HOURS_DISPLAY) ?><span style="display:block"><?= e(HOURS_NOTE) ?></span></p>
          <p class="meta mt-1"><a href="#directions">Map and directions</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= lead_strip() ?>

<?= lp_split([
    'img'     => 'svc-hair-transplant',
    'alt'     => 'a sculpted model of a follicular unit with three hairs, on a cream background',
    'eyebrow' => 'How the Rohini clinic works',
    'title'   => 'Doctor-Led Care, Planned After an Examination',
    'html'    => '<p>Consultations and treatments at the Rohini clinic are carried out by registered medical practitioners. Each treatment is planned case by case after an examination of your scalp or skin.</p>'
               . '<p>For hair, the scalp and donor area are measured before any treatment decision, and the plan and its cost are given to you in writing. No outcome is promised.</p>',
    'points'  => [
        'Trichoscopy first: scalp and follicle density measured before any treatment decision',
        'Donor supply treated as finite and planned with future loss in mind',
        'Plan and cost given in writing, before you book a treatment date',
    ],
]) ?>

<section class="section section--canvas" id="treatments">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Treatments in Rohini</p>
      <h2 class="h2 mt-2">Skin, Hair and Laser Treatments at the Rohini Clinic</h2>
      <p class="body-l mt-3">Every DenceSpot treatment is carried out at the Rohini clinic by registered medical practitioners. Each is planned case by case after an examination; each has its own page below.</p>
    </div>

    <?php
    /*
     * One card per Rohini service page, from ROHINI_SERVICES (config.php), so
     * a page added there appears here too. $svcDetail keeps the fuller
     * descriptions this page already carried; anything without an entry falls
     * back to the service's short note.
     */
    $svcDetail = [
        '/hair-transplant-delhi/'     => ['hairline', 'FUE and DHI, planned around a measured donor area, with the hairline drawn on your face and follow-up reviews in Rohini.'],
        '/fue-hair-transplant-in-rohini' => ['list',     'Individual follicle extraction using motorised micro-punches (0.75–0.9 mm). Leaves small dot scars spread across the donor area rather than a linear scar.'],
        '/dhi-hair-transplant-in-rohini' => ['settings', 'Simultaneous incision and placement with implanter pens, allowing control over follicular angle, depth and hair exit direction.'],
        '/beard-transplant-in-rohini'    => ['beard',    'Filling patchy facial areas or defining moustache and beard lines with single-hair donor grafts positioned at flat skin angles.'],
        '/eyebrow-transplant-in-rohini'  => ['pencil',   null],
        '/hair-prp-treatment-in-rohini'  => ['heart',    'Autologous growth factor treatments used to support thinning hair where follicles are still present. Response varies between patients.'],
        '/hair-fall-treatment-in-rohini' => ['chart',    null],
        '/laser-hair-removal-in-rohini'  => ['clock',    null],
        '/skin-treatment-in-rohini'      => ['user',     null],
    ];
    ?>
    <?php foreach (ROHINI_GROUPS as $gKey => $gLabel): ?>
      <h3 class="h3 mt-6"><?= e($gLabel) ?></h3>
      <div class="grid grid--3 mt-3 svc-grid">
        <?php foreach (ROHINI_SERVICES as $svc):
            if ($svc['group'] !== $gKey) { continue; }
            [$svcIcon, $svcText] = $svcDetail[$svc['url']] ?? ['check', null]; ?>
          <div class="card card--pad-lg svc-card">
            <?= icon($svcIcon, 24, 'var(--accent-deep)') ?>
            <h4 class="h4 mt-3"><?= e($svc['label']) ?></h4>
            <p class="body-s mt-2"><?= e($svcText ?? $svc['note']) ?></p>
            <p class="mt-4"><a class="hp-link" href="<?= e($svc['url']) ?>"><?= e($svc['anchor'] ?? $svc['label'] . ' in Rohini') ?> <?= hp_icon('arrow', 15, 2) ?></a></p>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>

    <div class="grid grid--2 mt-4">
      <div class="note">
        <p class="h4">Trichoscopy assessment</p>
        <p class="body-s mt-2">Polarised magnification to assess follicular unit density, the proportion of multi-hair grafts, scalp sebum and early miniaturisation. See the <a href="/hair-loss-assessment">hair loss assessment</a>.</p>
      </div>
      <div class="note">
        <p class="h4">Corrective and repair cases</p>
        <p class="body-s mt-2">Revision of pluggy front hairlines, removal of misdirected grafts, and donor planning after a previous transplant. See <a href="/hair-transplant-repair-in-rohini">hair transplant repair in Rohini</a>.</p>
      </div>
    </div>

    <?php /* 14 Oct 2026: links to the Rohini cost pages. They explain how fees are worked out; no prices are stated here. */ ?>
    <h3 class="h3 mt-6" id="cost-guides">Cost guides for the Rohini clinic</h3>
    <p class="body-s mt-2 measure">How fees are worked out for the treatments people ask about most. Your own fees are confirmed in writing after an examination, before you book a treatment date.</p>
    <div class="grid grid--3 mt-3 svc-grid">
      <div class="card card--pad-lg svc-card">
        <?= icon('chart', 24, 'var(--accent-deep)') ?>
        <h4 class="h4 mt-3">Hair transplant cost</h4>
        <p class="body-s mt-2">How an estimate follows from the graft count, and what a written estimate should include.</p>
        <p class="mt-4"><a class="hp-link" href="/hair-transplant-cost-in-rohini">Hair transplant cost in Rohini <?= hp_icon('arrow', 15, 2) ?></a></p>
      </div>
      <div class="card card--pad-lg svc-card">
        <?= icon('heart', 24, 'var(--accent-deep)') ?>
        <h4 class="h4 mt-3">PRP hair treatment cost</h4>
        <p class="body-s mt-2">How the number of sessions and what each session includes shape the cost of a PRP course.</p>
        <p class="mt-4"><a class="hp-link" href="/prp-hair-treatment-cost-in-rohini">PRP hair treatment cost in Rohini <?= hp_icon('arrow', 15, 2) ?></a></p>
      </div>
      <div class="card card--pad-lg svc-card">
        <?= icon('beard', 24, 'var(--accent-deep)') ?>
        <h4 class="h4 mt-3">Beard transplant cost</h4>
        <p class="body-s mt-2">How the zones to be filled and the graft count shape a beard transplant estimate.</p>
        <p class="mt-4"><a class="hp-link" href="/beard-transplant-cost-in-rohini">Beard transplant cost in Rohini <?= hp_icon('arrow', 15, 2) ?></a></p>
      </div>
    </div>
    <p class="body-s mt-4 measure">Paying in instalments? See <a href="/cost-and-emi-options">cost and EMI options</a>. For a rough graft count before your visit, try the <a href="/hair-transplant-graft-calculator">hair transplant graft calculator</a>.</p>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'Your appointment',
    'title'   => 'What Happens at the Rohini Clinic',
    'intro'   => 'Consultations, procedures and follow-up reviews all take place at the Rohini clinic, carried out by registered medical practitioners.',
    'tone'    => 'white',
    'steps'   => [
        ['img' => 'hero',           'alt' => 'a sculpted cross-section of the scalp showing hair follicles beneath the skin', 'title' => 'Consultation and examination', 'text' => 'An in-person examination: trichoscopy and donor measurement for hair, or the area to be treated for laser and skin.'],
        ['img' => 'step-plan',      'alt' => 'a tablet showing a head diagram on a desk',                                     'title' => 'A written plan',               'text' => 'Realistic medical recommendations and, if treatment suits you, a plan with your fees confirmed in writing before you book a date.'],
        ['img' => 'step-procedure', 'alt' => 'sterile instruments laid out on a tray',                                        'title' => 'Treatment in Rohini',          'text' => 'Carried out at the Rohini clinic by registered medical practitioners, on a date you choose.'],
        ['img' => 'step-followup',  'alt' => 'a desk calendar with review dates circled',                                     'title' => 'Follow-up reviews',            'text' => 'Reviews take place at the Rohini clinic too, with progress judged against your starting point.'],
    ],
]) ?>

<section class="section section--canvas" id="directions">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Visit the Delhi clinic</p>
        <h2 class="h2 mt-2">Address, Timings and Metro Directions</h2>
        <p class="lead mt-3 measure">In North-West Delhi near the Outer Ring Road, serving Rohini, Pitampura, Shalimar Bagh, Paschim Vihar, Punjabi Bagh and nearby areas of Delhi NCR.</p>

        <dl class="dl">
          <div>
            <dt>Location</dt>
            <dd><?= e(LOC_DELHI_ADDRESS) ?><span class="meta" style="display:block;font-weight:500"><?= e(LOC_DELHI_LANDMARK) ?></span></dd>
          </div>
          <div>
            <dt>By metro</dt>
            <dd>The Red Line runs through Rohini and Pitampura; stations such as Rohini West and Pitampura are options, then an auto or cab. Check the route from your station on the map.</dd>
          </div>
          <div>
            <dt>Phone</dt>
            <dd><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></dd>
          </div>
          <div>
            <dt>Hours</dt>
            <dd><?= e(HOURS_DISPLAY) ?><span class="meta" style="display:block;font-weight:500"><?= e(HOURS_NOTE) ?></span></dd>
          </div>
        </dl>

        <div class="btn-row mt-5">
          <a class="btn btn--outline" href="<?= e(LOC_DELHI_MAPS_URL) ?>" target="_blank" rel="noopener"><?= icon('pin', 17) ?> Open in Google Maps<span class="sr-only"> (opens in a new tab)</span></a>
        </div>
      </div>

      <div>
        <div class="media ratio-4-3 media--shadow">
          <iframe title="Google Map showing DenceSpot Clinic, Rohini, Delhi" src="<?= e(LOC_DELHI_MAP_EMBED) ?>" width="100%" height="100%" style="display:block;border:0;width:100%;height:100%" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
        </div>
        <p class="meta mt-3">The pin marks DenceSpot Clinic in Rohini. Open the map for driving or public-transport directions.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="book-consultation">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Appointments</p>
        <h2 class="h2 mt-2">Book a Consultation at Rohini, Delhi</h2>
        <p class="body-l mt-3 measure">Every hair loss appointment includes an in-person trichoscopic scalp examination, a review of your family history of hair loss, measurement of your donor hair and realistic medical recommendations. Laser and skin appointments start with an examination of the area to be treated.</p>

        <div class="note mt-5">
          <p class="body-s"><b>Prefer WhatsApp?</b> You can send photos of your front hairline and crown to <a href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a> for a preliminary clinical review.</p>
        </div>

      </div>

      <div>
        <div class="cta-band" style="display:block">
          <h3 class="h3">Send an enquiry</h3>
          <p class="body-s mt-1">We respond during opening hours (<?= e(HOURS_DISPLAY) ?>).</p>
          <div class="mt-4">
            <?= enquiry_form('delhi-clinic', [
                'FUE hair transplant',
                'DHI hair transplant',
                'Beard transplant',
                'Eyebrow transplant',
                'PRP / GFC therapy',
                'Hair fall treatment',
                'Laser hair removal',
                'Skin treatment',
                'Scalp trichoscopy assessment',
                'Other enquiry',
            ], true, 'Delhi (Rohini)') ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="faqs">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Frequently asked questions</p>
      <h2 class="h2 mt-2">Common Questions About Our Delhi (Rohini) Clinic</h2>
    </div>

    <div class="mt-5" style="max-width:80ch">
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
