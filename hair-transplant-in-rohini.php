<?php
/**
 * /hair-transplant-in-rohini — Rohini (Delhi) pillar for hair transplant.
 *
 * October 2026. The agency confirmed on 13 Oct 2026 that every DenceSpot
 * service, hair transplant included, is carried out at the Rohini clinic.
 * Medical facts follow /hair-transplant-in-gurgaon; the wording is new, so the
 * two city pages are not near-duplicates. Technique depth lives on the two
 * Rohini spokes (/fue-hair-transplant-in-rohini, /dhi-hair-transplant-in-rohini)
 * and on the Gurugram pillar.
 *
 * Not yet reviewed by the clinic's doctor: doctor_block() is called with
 * $reviewed = false, there is no review byline and the page is not in
 * MEDICAL_PAGES. Who treats patients at Rohini is not on record, so no doctor
 * is named as performer (schema 'performer' => null).
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/** General patient-education bands — the same graft figures as the Gurugram pillar. */
$stages = [
    ['stage' => 'Norwood II',              'focus' => 'Medical treatment first; a small hairline session once stable', 'grafts' => '800 – 1,500'],
    ['stage' => 'Norwood III',             'focus' => 'Hairline and temples',                                          'grafts' => '1,200 – 2,000'],
    ['stage' => 'Norwood III vertex – IV', 'focus' => 'The front first; the crown as the donor allows',                'grafts' => '1,800 – 2,600'],
    ['stage' => 'Norwood V',               'focus' => 'Front priority, sometimes staged',                              'grafts' => '2,500 – 3,500'],
    ['stage' => 'Norwood VI – VII',        'focus' => 'Staged sessions for coverage, not full density',                'grafts' => '3,000 – 4,500+'],
];

$faqs = [
    ['q' => 'Is the hair transplant done at the Rohini clinic or in Gurugram?',
     'a' => 'At the Rohini clinic. FUE and DHI hair transplants are carried out in Rohini by registered medical practitioners, as they are at our Sector 39, Gurugram clinic. You can choose whichever clinic is easier to reach.'],
    ['q' => 'Which parts of Delhi is the Rohini clinic convenient for?',
     'a' => 'It is in North-West Delhi near the Outer Ring Road, convenient for North and North-West Delhi — Rohini, Pitampura, Shalimar Bagh and Prashant Vihar, for example. The directions link on this page opens the clinic’s Google Maps listing.'],
    ['q' => 'How many grafts will I need?',
     'a' => 'That depends on the area to be covered and what your donor area can safely give, measured at the examination. As general bands, Norwood III often needs around 1,200–2,000 grafts and Norwood V around 2,500–3,500, sometimes over two sessions.'],
    ['q' => 'Is a hair transplant painful?',
     'a' => 'The local anaesthetic injections are the uncomfortable part; after that the areas are numb, though you may feel pressure. Soreness or swelling for a few days afterwards is usual and managed with prescribed medication.'],
    ['q' => 'How soon can I go back to work?',
     'a' => 'Most people return to desk work within a few days. Crusts settle over the first week or two. Strenuous exercise, helmets and anything that presses on the grafts wait until your doctor clears them at a review.'],
    ['q' => 'Will the transplanted hair last?',
     'a' => 'Transplanted follicles keep the character of the donor hair and generally persist, but untreated hair around them can keep thinning with age, so a long-term plan matters. No clinic can promise a particular density.'],
    ['q' => 'How much does a hair transplant cost in Rohini?',
     'a' => 'There is no fixed price. Cost follows the graft count, technique mix and sessions, and is quoted itemised and in writing after the assessment. Our <a href="/hair-transplant-cost-in-gurgaon">hair transplant cost guide</a> explains per-graft pricing.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Hair Transplant in Rohini'],
];

$page = [
    'title'         => 'Hair Transplant in Rohini, Delhi | DenceSpot Clinic',
    'description'   => 'Hair transplant in Rohini, Delhi: FUE and DHI carried out at our North-West Delhi clinic. Who it suits, procedure day, recovery, follow-ups and cost factors.',
    'url'           => '/hair-transplant-in-rohini',
    'crumbs'        => $crumbs,
    'preload_image' => '/assets/img/services/svc-hair-transplant-768.webp',
    'schema'        => [
        schema_delhi_clinic(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/hair-transplant-in-rohini', [
            'name'          => 'Hair Transplant',
            'alternateName' => ['FUE hair transplant', 'DHI hair transplant', 'Hair transplant in Rohini, Delhi'],
            'procedureType' => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'Follicular units are taken one at a time from the donor scalp at the back and sides of the head and placed into thinning or bald areas at the angle and direction of the surrounding hair, by FUE placement into pre-made sites or DHI implanter placement, according to the assessment. A day case under local anaesthetic at the Rohini, Delhi clinic.',
            'preparation'   => 'Examination of the hair-loss pattern and donor density, review of medical history and medicines, and a hairline drawn and agreed with the patient before the procedure.',
            'followup'      => 'Written aftercare instructions and follow-up reviews at the Rohini clinic, with standardised photographs through the first twelve months.',
            'expectedPrognosis' => 'Transplanted hairs commonly shed within the first weeks; new growth usually begins at around three to four months and the result is judged at about ten to twelve months. Outcomes vary between patients and cannot be promised.',
            'location'      => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
            'performer'     => null,
        ]),
        schema_faq('/hair-transplant-in-rohini', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Clinic 2 · Rohini, Delhi</span>
        <h1 class="h1 mt-3">Hair Transplant in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">FUE and DHI hair transplants are carried out at our Rohini clinic in North-West Delhi by registered medical practitioners. Nothing is booked from a photograph: your hair loss and donor area are examined first, the hairline is drawn on your own face, and you leave with a written plan setting out the technique, the graft count and what the cost depends on.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Hair transplant" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp the Rohini Clinic</a>
        </div>

        <?= ticks([
            'FUE and DHI carried out in Rohini',
            'Donor area examined before any graft count',
            'Day case under local anaesthetic',
            'Follow-up reviews at the Rohini clinic',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-hair-transplant-768.webp" srcset="/assets/img/services/svc-hair-transplant-512.webp 512w, /assets/img/services/svc-hair-transplant-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a sculpted model of a follicular unit with three hairs, on a cream background" width="768" height="960" loading="eager" fetchpriority="high">
          <?= hp_ai_chip('AI-generated illustration') ?>
        </div>
        <div class="hero__badge-card">
          <p class="eyebrow">Clinic 2 · Rohini</p>
          <p class="h4 mt-1"><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></p>
          <p class="meta"><?= e(HOURS_DISPLAY) ?><span style="display:block"><?= e(HOURS_NOTE) ?></span></p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="what-is">
  <div class="wrap">
    <div class="split split--wide-left">
      <div>
        <p class="eyebrow">The basics, plainly</p>
        <h2 class="h2 mt-2">What a Hair Transplant Does — and What It Cannot</h2>
        <div class="stack mt-4 measure">
          <p class="body-l">A hair transplant relocates follicles you already have. They are taken from the back and sides of the scalp, where hair generally resists the hormonal process behind pattern loss, and set into thinning zones at the angle the neighbouring hair grows. Once healed, they are cut and washed like any other hair.</p>
          <p class="body-l">It does not add follicles. Every graft placed at the front is one fewer at the back, and that supply is limited for life. So the hairline and the share of grafts each zone receives are planned against the loss you may have in twenty years, not only today’s.</p>
          <p class="body">The fuller technique detail is on the <a href="/hair-transplant-in-gurgaon">hair transplant page for our Sector 39, Gurugram clinic</a>; the medical approach is the same at both clinics.</p>
        </div>
      </div>
      <div class="stack">
        <div class="card card--tint">
          <p class="eyebrow" style="color:var(--ink-muted)">In one line</p>
          <p class="body mt-2">Your own donor hair, moved and rationed to last. The surgery takes a day; the planning behind it is what you are choosing.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="candidacy">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">Suitability</p>
        <h2 class="h2 mt-2">Who May Be Suited — and When Surgery Should Wait</h2>
        <p class="body mt-3">Suitability is decided after an examination at the clinic, not from photographs. These are the situations most often assessed.</p>
      </div>
      <div class="grid grid--2">
        <div class="card"><?= icon('hairline', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">A receding hairline</h3><p class="body-s mt-2">Temple recession that has settled into a recognisable shape, with enough donor hair to rebuild the front and keep a reserve.</p></div>
        <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Crown thinning</h3><p class="body-s mt-2">Treatable, but the crown uses grafts quickly and can keep widening, so it is planned after the front, not instead of it.</p></div>
        <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Stable pattern loss</h3><p class="body-s mt-2">Loss that has slowed into a clear pattern, accepting that untreated hair around the grafts may keep thinning.</p></div>
        <div class="card"><?= icon('heart', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Women with a frontal pattern</h3><p class="body-s mt-2">Considered selectively, after hormonal, thyroid, iron and post-partum causes are checked. Many women do better with medical treatment.</p></div>
        <div class="card"><?= icon('pencil', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Earlier work to correct</h3><p class="body-s mt-2">A hairline placed too low or too straight elsewhere, assessed against what the donor can still give.</p></div>
        <div class="card card--dashed"><?= icon('info', 22, 'var(--ink-muted)') ?><h3 class="h4 mt-3">When the answer is “not yet”</h3><p class="body-s mt-2">Fast-moving loss, a thinning donor area, active alopecia areata or an untreated cause such as low iron. Then <a href="/hair-fall-treatment-in-rohini">hair fall treatment</a>, <a href="/hair-prp-treatment-in-rohini">PRP</a> or time comes first.</p></div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="techniques">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Techniques at Rohini</p>
      <h2 class="h2 mt-2">FUE and DHI: The Same Extraction, Different Placement</h2>
      <p class="body mt-3">Both techniques remove follicular units one at a time with a fine punch, leaving small dot scars rather than a line. They differ in how each graft goes in, and many plans use both.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="card card--tint card--pad-lg">
        <h3 class="h3">FUE placement</h3>
        <p class="body-s mt-2">Recipient sites are made first, then grafts are placed into them. Efficient over larger zones such as the mid-scalp and crown.</p>
        <p class="mt-4"><a class="hp-link" href="/fue-hair-transplant-in-rohini">FUE hair transplant in Rohini <?= hp_icon('arrow', 15, 2) ?></a></p>
      </div>
      <div class="card card--tint card--pad-lg">
        <h3 class="h3">DHI placement</h3>
        <p class="body-s mt-2">Each graft is set with a fine implanter pen in one movement that fixes depth, angle and direction together. Slower and usually dearer per graft, but useful along hairlines and temples.</p>
        <p class="mt-4"><a class="hp-link" href="/dhi-hair-transplant-in-rohini">DHI hair transplant in Rohini <?= hp_icon('arrow', 15, 2) ?></a></p>
      </div>
    </div>
    <div class="note mt-4">
      <p class="body-s"><b>Neither is universally better.</b> A common design for moderate loss puts DHI along the front rows and FUE behind them. Recovery is the same either way, and the reasoning for your plan is written into the estimate.</p>
    </div>
  </div>
</section>

<section class="section section--canvas" id="donor">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Donor planning</p>
      <h2 class="h2 mt-2">Planning Around a Donor Supply That Does Not Grow Back</h2>
      <p class="body mt-3">A healthy donor area can give a limited number of grafts over a lifetime. Taking too many, or from too small a patch, thins the back of the head and makes extraction dots visible, and neither can be reversed. So the graft count follows a measurement of your donor density.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data">
          <caption class="sr-only">General hair transplant graft bands by Norwood stage — patient education, not a quote</caption>
          <thead>
            <tr><th scope="col">Stage of loss</th><th scope="col">General graft band</th><th scope="col">Usual priority</th></tr>
          </thead>
          <tbody>
            <?php foreach ($stages as $s): ?>
            <tr>
              <th scope="row" style="color:var(--ink);font-size:15px;font-weight:700;text-transform:none;letter-spacing:0;white-space:nowrap"><?= e($s['stage']) ?></th>
              <td style="font-weight:600;color:var(--ink);white-space:nowrap"><?= e($s['grafts']) ?></td>
              <td><?= e($s['focus']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">Patient education, not a quote: donor density and hair thickness move these numbers. The <a href="/hair-transplant-graft-calculator">graft calculator</a> gives a starting range, and <a href="/blog/donor-area-limits-hair-transplant">why donor supply is a one-time budget</a> works through the arithmetic.</p>
  </div>
</section>

<section class="section section--white" id="the-day">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">At the Rohini clinic</p>
      <h2 class="h2 mt-2">What Happens, Step by Step</h2>
      <p class="body mt-3">Consultations and procedures at the Rohini clinic are carried out by registered medical practitioners.</p>
    </div>
    <div class="split split--wide-left mt-6" style="align-items:start">
      <div class="stack-sm">
        <div class="step"><span class="step-num">1</span><div><h3 class="h3">Consultation and examination</h3><p class="body-s mt-2">Medical history and medicines, then the scalp and donor area examined under magnification, the pattern staged and photographs taken.</p></div></div>
        <div class="step"><span class="step-num">2</span><div><h3 class="h3">A written plan</h3><p class="body-s mt-2">Technique, mapped graft count, timeline and cost factors, in writing. You are not asked to book a date on the day.</p></div></div>
        <div class="step"><span class="step-num">3</span><div><h3 class="h3">Hairline design</h3><p class="body-s mt-2">On the day, the line is drawn while you sit upright and checked with you in a mirror before anything begins.</p></div></div>
        <div class="step"><span class="step-num">4</span><div><h3 class="h3">Anaesthesia and extraction</h3><p class="body-s mt-2">The donor area is trimmed and numbed; the injections are the uncomfortable part. Follicular units are removed one by one and sorted, single hairs kept for the front.</p></div></div>
        <div class="step"><span class="step-num">5</span><div><h3 class="h3">Placement</h3><p class="body-s mt-2">Grafts go in at the angle of the surrounding hair, by FUE, DHI or both, in a deliberately irregular pattern.</p></div></div>
        <div class="step"><span class="step-num">6</span><div><h3 class="h3">Home the same day</h3><p class="body-s mt-2">Written aftercare, medication where prescribed, and your first review at Rohini booked. Larger sessions take most of the day.</p></div></div>
      </div>
      <div class="stack">
        <div class="card card--tint">
          <p class="eyebrow">Before the day</p>
          <div class="mt-3"><?= ticks([
              'Bring a list of every medicine and supplement you take.',
              'Follow your instructions on alcohol and blood thinners.',
              'Eat a proper meal beforehand.',
              'Arrange a lift home rather than riding a two-wheeler.',
          ], false) ?></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="recovery">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Recovery and follow-up</p>
      <h2 class="h2 mt-2">Recovery, Aftercare and Follow-up Visits at Rohini</h2>
      <p class="body mt-3">A general guide; your own timeline is set at your reviews, which take place at the Rohini clinic. More in our <a href="/hair-transplant-aftercare">aftercare guide</a> and the <a href="/blog/hair-transplant-growth-timeline-month-by-month">month-by-month growth timeline</a>.</p>
    </div>
    <div class="grid grid--4 mt-6">
      <div class="card"><span class="pill">First week</span><h3 class="h4 mt-3">Crusts and tenderness</h3><p class="body-s mt-2">Some swelling and small crusts. Washing begins as shown at the clinic; most people are back at desk work within a few days.</p></div>
      <div class="card"><span class="pill">Weeks 2–4</span><h3 class="h4 mt-3">Shedding</h3><p class="body-s mt-2">Transplanted hairs commonly fall out while the follicles stay in place. Expected, not a failure.</p></div>
      <div class="card"><span class="pill">Months 3–9</span><h3 class="h4 mt-3">New growth</h3><p class="body-s mt-2">Fine hairs from around three to four months, patchy at first, then thickening.</p></div>
      <div class="card"><span class="pill pill--ink">Months 10–12</span><h3 class="h4 mt-3">Judging the result</h3><p class="body-s mt-2">Against standardised photographs from your reviews. Untreated hair may keep thinning.</p></div>
    </div>

    <div class="grid grid--2 mt-5">
      <div class="note"><p class="h4">Healing in North-West Delhi</p><p class="body-s mt-2">Summer sweat, winter smog and road dust make the scalp harder to keep clean in the first fortnight, so many people choose cooler months. Helmets and anything that presses on the grafts wait until you are cleared at a review.</p></div>
      <div class="note"><p class="h4">Risks, in their real categories</p><p class="body-s mt-2">Swelling, crusting, numbness and temporary shedding are expected; infection and poor growth are uncommon; an over-harvested donor or a badly placed hairline are lasting. Results vary. See <a href="/blog/hair-transplant-side-effects-and-risks">side effects and risks</a>.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Cost guidance</p>
      <h2 class="h2 mt-2">What Decides the Cost of a Hair Transplant in Rohini</h2>
      <p class="body mt-3">There is no fixed price, because no two plans use the same number of grafts. Cost is broadly the graft count multiplied by a per-graft rate, plus what the estimate includes, and it is given to you itemised and in writing after your assessment.</p>
    </div>
    <div class="grid grid--3 mt-5">
      <div class="card"><p class="h4">Graft count</p><p class="meta mt-1">Mapped from your scalp, zone by zone</p></div>
      <div class="card"><p class="h4">Technique mix</p><p class="meta mt-1">FUE, DHI, or DHI at the front only</p></div>
      <div class="card"><p class="h4">Donor density</p><p class="meta mt-1">What can safely be taken, now and later</p></div>
      <div class="card"><p class="h4">Sessions</p><p class="meta mt-1">One sitting or staged across two</p></div>
      <div class="card"><p class="h4">Shaving approach</p><p class="meta mt-1">Unshaven work takes longer</p></div>
      <div class="card"><p class="h4">Supporting treatment</p><p class="meta mt-1">Medication or PRP alongside</p></div>
    </div>
    <p class="body-s mt-4 measure">Comparing quotes? Ask whether a figure is in grafts or hairs and how it was arrived at. Our <a href="/hair-transplant-cost-in-gurgaon">hair transplant cost guide</a> explains per-graft pricing.</p>
  </div>
</section>

<?= doctor_block(
    'Treatment at the Rohini clinic is carried out by registered medical practitioners. Every doctor at DenceSpot is listed below with qualifications and registration details.',
    '',
    false
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Hair Transplant in Rohini: Questions Answered</h2>
        <p class="body-s mt-3">General patient education. Anything specific to your scalp or your medical history is answered at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'Visit Our Rohini Clinic',
    'Consultations, hair transplants and follow-up reviews all take place at the Rohini clinic in North-West Delhi. If Sector 39, Gurugram is easier for you to reach, the same treatment is carried out there too.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= cta_band(
    'Book a Hair Transplant Consultation in Rohini',
    'Bring your questions and a list of your medicines. You will get an examination, an honest view of whether a transplant suits you now, and a written plan if it does — with no pressure to book a date on the day.',
    'rohini-hair-transplant',
    ['Hair transplant (FUE)', 'Hair transplant (DHI)', 'Beard transplant', 'Not sure — please advise'],
    'Delhi (Rohini)'
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
