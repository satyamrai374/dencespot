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
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Our Clinics', 'url' => '/contact'],
    ['name' => 'Delhi Clinic (Rohini)'],
];

$faqs = [
    [
        'q' => 'Where is the DenceSpot Delhi clinic located?',
        'a' => 'The Delhi clinic is in Rohini, North-West Delhi, near the Outer Ring Road, and is reached from Pitampura, Shalimar Bagh and adjoining areas. The Google Maps pin and a directions link are on this page.'
    ],
    [
        'q' => 'How can I reach the Rohini clinic by Delhi Metro?',
        'a' => 'The clinic can be reached via the Delhi Metro: from Red Line stations such as Pitampura, Rohini West or Netaji Subhash Place, or from Yellow Line stations, followed by a short auto or cab ride. The Google Maps link on this page gives directions from your station.'
    ],
    [
        'q' => 'Who will conduct my consultation and treatment at the Delhi clinic?',
        'a' => 'Consultations and treatments at the Delhi clinic are carried out by registered medical practitioners. The names, qualifications and registration details of the clinic’s doctors are listed on our <a href="/medical-disclaimer#doctors">doctors and registration</a> page.'
    ],
    [
        'q' => 'What treatments are offered at the Delhi (Rohini) location?',
        'a' => 'All of DenceSpot’s treatments are carried out at the Rohini clinic: FUE and DHI hair transplant, beard and eyebrow transplant, PRP and GFC therapy, hair fall treatment, laser hair removal and skin treatment. Hair consultations include a trichoscopy scalp evaluation, and every treatment is planned after an examination.'
    ],
    [
        'q' => 'Is the procedure carried out in Rohini, or do I have to go to Gurugram?',
        'a' => 'It is carried out in Rohini. Consultations, procedures and follow-up reviews all take place at the Rohini clinic. If our Sector 39, Gurugram clinic is more convenient for you, the same treatments are carried out there too.'
    ],
    [
        'q' => 'What is the contact number for DenceSpot Delhi (Rohini)?',
        'a' => 'You can call our Delhi clinic directly at +91 95406 99152 or connect with us on WhatsApp at the same number for appointment bookings and preliminary photo evaluations.'
    ],
    [
        'q' => 'Are fees and protocols the same at the Gurugram and Delhi clinics?',
        'a' => 'Both clinics follow the same approach: an examination before any plan, and a written estimate based on your measured donor availability and the graft coverage you need. Your own fees are confirmed in writing after your assessment, before you book a treatment date.'
    ],
];

$page = [
    'title'       => 'DenceSpot Clinic Delhi (Rohini) | Hair, Skin & Laser Care',
    'description' => 'DenceSpot Clinic in Rohini, Delhi: FUE and DHI hair transplant, beard and eyebrow transplant, PRP/GFC, hair fall, laser and skin treatment. Map, hours, phone.',
    'url'         => '/delhi-clinic',
    'crumbs'      => $crumbs,
    'schema'      => [
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
        <span class="pill pill--dot">Clinic 2 · Rohini, Delhi</span>
        <h1 class="h1 mt-3">DenceSpot Hair &amp; Skin Clinic, Delhi (Rohini)</h1>
        <p class="lead mt-3 measure">A doctor-led clinic serving North-West Delhi, Rohini, Pitampura and Delhi NCR. Hair transplant, beard and eyebrow transplant, PRP and GFC, hair fall treatment, laser hair removal and skin treatment are all carried out here by registered medical practitioners, each planned case by case after an examination.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-clinic="Delhi (Rohini)" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp the Rohini Clinic</a>
        </div>

        <?= ticks([
            'Consultations and treatments by registered medical practitioners',
            'Trichoscopy and donor-area assessment',
            'Hair transplant, PRP/GFC, laser and skin treatments',
            'Rohini, Delhi · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div>
        <div class="hp-clinic">
          <p class="hp-clinic__num">Clinic 2</p>
          <h2 class="hp-clinic__city">Delhi <span>Rohini</span></h2>
          <ul class="hp-clinic__facts" role="list">
            <li><?= hp_icon('pin', 18) ?><span><?= e(LOC_DELHI_ADDRESS) ?><small><?= e(LOC_DELHI_LANDMARK) ?></small></span></li>
            <li><?= hp_icon('clock', 18) ?><span><?= e(HOURS_DISPLAY) ?><small><?= e(HOURS_NOTE) ?></small></span></li>
            <li><?= hp_icon('phone', 18) ?><span><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a><small>Calls and WhatsApp</small></span></li>
          </ul>
          <div class="hp-clinic__actions">
            <a class="hp-btn hp-btn--outline hp-btn--sm" href="<?= e(LOC_DELHI_MAPS_URL) ?>" rel="noopener" target="_blank"><?= hp_icon('pin', 16) ?> Directions<span class="hp-sr"> to the Delhi clinic (opens in a new tab)</span></a>
            <a class="hp-link" href="#directions">Map and getting here <?= hp_icon('arrow', 15, 2) ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="trust">
  <div class="wrap">
    <div class="grid grid--4">
      <div class="card">
        <?= icon('user', 22, 'var(--accent-deep)') ?>
        <p class="h4 mt-2">Doctor-led care</p>
        <p class="meta mt-1">Consultations and treatments by registered medical practitioners.</p>
      </div>
      <div class="card">
        <?= icon('search', 22, 'var(--accent-deep)') ?>
        <p class="h4 mt-2">Trichoscopy first</p>
        <p class="meta mt-1">Scalp and follicle density measured before any treatment decision.</p>
      </div>
      <div class="card">
        <?= icon('shield', 22, 'var(--accent-deep)') ?>
        <p class="h4 mt-2">Donor preservation</p>
        <p class="meta mt-1">Donor supply treated as finite and planned with future loss in mind.</p>
      </div>
      <div class="card">
        <?= icon('doc', 22, 'var(--accent-deep)') ?>
        <p class="h4 mt-2">Written estimates</p>
        <p class="meta mt-1">Plan and cost given in writing. No outcome is promised.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="treatments">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Treatments in Rohini</p>
      <h2 class="h2 mt-2">Treatments Carried Out at the Rohini Clinic</h2>
      <p class="body-l mt-3">Every DenceSpot treatment is carried out at the Rohini clinic by registered medical practitioners, as it is at our Sector 39, Gurugram clinic. Each is planned case by case after an examination; each has its own page below.</p>
    </div>

    <?php
    /*
     * One card per Rohini service page, from ROHINI_SERVICES (config.php), so
     * a page added there appears here too. $svcDetail keeps the fuller
     * descriptions this page already carried; anything without an entry falls
     * back to the service's short note.
     */
    $svcDetail = [
        '/hair-transplant-in-rohini'     => ['hairline', 'FUE and DHI, planned around a measured donor area, with the hairline drawn on your face and follow-up reviews in Rohini.'],
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
    <div class="grid grid--3 mt-5">
      <?php foreach (ROHINI_SERVICES as $svc):
          [$svcIcon, $svcText] = $svcDetail[$svc['url']] ?? ['check', null]; ?>
        <div class="card card--pad-lg">
          <?= icon($svcIcon, 24, 'var(--accent-deep)') ?>
          <h3 class="h4 mt-3"><?= e($svc['label']) ?></h3>
          <p class="body-s mt-2"><?= e($svcText ?? $svc['note']) ?></p>
          <p class="mt-4"><a class="hp-link" href="<?= e($svc['url']) ?>"><?= e($svc['label']) ?> in Rohini <?= hp_icon('arrow', 15, 2) ?></a></p>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="grid grid--2 mt-4">
      <div class="note">
        <p class="h4">Trichoscopy assessment</p>
        <p class="body-s mt-2">Polarised magnification to assess follicular unit density, the proportion of multi-hair grafts, scalp sebum and early miniaturisation. See the <a href="/hair-loss-assessment">hair loss assessment</a>.</p>
      </div>
      <div class="note">
        <p class="h4">Corrective and repair cases</p>
        <p class="body-s mt-2">Revision of pluggy front hairlines, removal of misdirected grafts, and donor planning after a previous transplant. See <a href="/hair-transplant-repair-in-gurgaon">repair procedures</a>.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="directions">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Visit the Delhi clinic</p>
        <h2 class="h2 mt-2">Directions to DenceSpot Delhi (Rohini)</h2>
        <p class="lead mt-3 measure">In North-West Delhi near the Outer Ring Road, serving Rohini, Pitampura, Shalimar Bagh, Paschim Vihar, Punjabi Bagh and nearby areas of Delhi NCR.</p>

        <dl class="dl">
          <div>
            <dt>Location</dt>
            <dd><?= e(LOC_DELHI_ADDRESS) ?><span class="meta" style="display:block;font-weight:500"><?= e(LOC_DELHI_LANDMARK) ?></span></dd>
          </div>
          <div>
            <dt>By metro</dt>
            <dd>Red Line stations such as Pitampura, Rohini West or Netaji Subhash Place, then a short auto or cab ride</dd>
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

        <div class="card card--tint mt-4">
          <p class="eyebrow">Our Gurugram clinic</p>
          <p class="body-s mt-2">If Sector 39, Gurugram (<?= e(NAP_LANDMARK) ?>) is closer to your home or workplace, see the <a href="/contact">Gurugram clinic page</a> for its address, map and phone number.</p>
        </div>
      </div>

      <div>
        <div class="cta-band" style="display:block">
          <h3 class="h3">Request a call back</h3>
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
