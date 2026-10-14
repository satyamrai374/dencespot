<?php
/**
 * /hair-transplant-in-rohini — Rohini (Delhi) pillar for hair transplant.
 *
 * October 2026. The agency confirmed on 13 Oct 2026 that every DenceSpot
 * service, hair transplant included, is carried out at the Rohini clinic.
 * Medical facts follow /hair-transplant-in-gurgaon; the wording is new, so the
 * two city pages are not near-duplicates. Technique depth lives on the two
 * Rohini spokes (/fue-hair-transplant-in-rohini, /dhi-hair-transplant-in-rohini).
 * Per the client (14 Oct 2026) the page never mentions the Gurugram clinic.
 * Landing-page layout: lp_split / lp_steps / lp_cta (includes/home-components.php).
 *
 * Not yet reviewed by the clinic's doctor: doctor_block() is called with
 * $reviewed = false, there is no review byline and the page is not in
 * MEDICAL_PAGES. Who treats patients at Rohini is not on record, so no doctor
 * is named as performer (schema 'performer' => null).
 *
 * SEO round 2 (14 Oct 2026, COMPETITOR-SEO §4 #6, §5): FUE vs DHI table,
 * "Recovering in Delhi", "Questions worth asking any clinic", 16 FAQs, the
 * cost H2 linking /hair-transplant-cost-in-rohini, and tool links. The title
 * drops the comma after "Rohini" to stay within 60 characters.
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

/**
 * FUE and DHI side by side. Every cell condenses a fact already on the two
 * Rohini technique pages; nothing here is asserted for the first time, and
 * the table compares rather than ranks.
 */
$techRows = [
    ['aspect' => 'Extraction',
     'fue'    => 'Follicular units removed one at a time with a fine punch, leaving small dot scars rather than a line.',
     'dhi'    => 'The same as FUE. DHI differs only in how each graft is placed.'],
    ['aspect' => 'Placement',
     'fue'    => 'Recipient sites are made first, then grafts are set into them.',
     'dhi'    => 'Each graft is loaded into an implanter pen that makes the opening and places it in one movement, setting depth, angle and direction.'],
    ['aspect' => 'Shaving',
     'fue'    => 'The donor area is trimmed short; whether the thinning area is trimmed depends on the plan.',
     'dhi'    => 'The donor is still trimmed. The thinning area can sometimes stay unshaven, which is slower and suits smaller sessions.'],
    ['aspect' => 'Where it fits',
     'fue'    => 'The crown and mid-scalp, larger graft numbers and several zones in one session.',
     'dhi'    => 'The first rows of a hairline, the temples, and adding grafts between existing hair.'],
    ['aspect' => 'Session length',
     'fue'    => 'Smaller sessions take a few hours; larger ones run through most of the day, with breaks.',
     'dhi'    => 'Slower for the same graft count, because each implanter is loaded one graft at a time. Your timings are given beforehand.'],
    ['aspect' => 'Cost factor',
     'fue'    => 'Graft count, sessions and shaving approach.',
     'dhi'    => 'The same factors, and usually more per graft for the extra chair time and single-use implanter tips.'],
];

$faqs = [
    ['q' => 'Is the hair transplant carried out at the Rohini clinic?',
     'a' => 'Yes. FUE and DHI hair transplants are carried out at the Rohini clinic in North-West Delhi by registered medical practitioners, and the consultation and follow-up reviews take place there too.'],
    ['q' => 'Which parts of Delhi is the Rohini clinic convenient for?',
     'a' => 'It is in North-West Delhi near the Outer Ring Road, convenient for North and North-West Delhi — Rohini, Pitampura, Shalimar Bagh and Prashant Vihar, for example. The directions link on this page opens the clinic’s Google Maps listing.'],
    ['q' => 'How much does a hair transplant cost in Rohini?',
     'a' => 'There is no fixed price. Cost follows the graft count, technique mix and sessions, and is quoted itemised and in writing after the assessment. <a href="/hair-transplant-cost-in-rohini">Hair transplant cost in Rohini</a> sets out how the figure is worked out, and <a href="/blog/why-hair-transplant-quotes-vary">why hair transplant quotes vary</a> explains what moves the number.'],
    ['q' => 'Is EMI available for a hair transplant?',
     'a' => 'Instalment options through third-party lenders may be available — ask at the consultation. The lender, not the clinic, sets the interest, tenure and eligibility, so ask for the total payable in writing before you sign. <a href="/cost-and-emi-options">Cost, EMI and payment options</a> explains how medical EMI works.'],
    ['q' => 'How many grafts will I need?',
     'a' => 'That depends on the area to be covered and what your donor area can safely give, measured at the examination. As general bands, Norwood III often needs around 1,200–2,000 grafts and Norwood V around 2,500–3,500, sometimes over two sessions. The <a href="/hair-transplant-graft-calculator">graft calculator</a> gives a starting range.'],
    ['q' => 'Can I send photographs on WhatsApp before booking?',
     'a' => 'Yes. Photographs of your hairline, crown and donor area sent to the Rohini clinic on WhatsApp (' . LOC_DELHI_PHONE_DISPLAY . ') help the appointment start from the right questions. They cannot replace the examination: no graft count or plan is given from a photograph. The clinic is open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . ').'],
    ['q' => 'What should I bring to the consultation?',
     'a' => 'A list of every medicine and supplement you take, any recent blood test reports, and details of earlier hair treatment or surgery. Your scalp and donor area are photographed at the clinic, so you do not need photographs of your own, though they help if you send them beforehand.'],
    ['q' => 'Should I eat, or stop any medicines, beforehand?',
     'a' => 'Eat a proper meal before you arrive; the procedure is done under local anaesthetic. Do not stop a prescribed medicine on your own: blood thinners, supplements and alcohol are reviewed at the consultation, and you are told what to pause and when. Smoking slows healing, so stopping well before the procedure helps.'],
    ['q' => 'How long does the procedure day take, and do I go home the same day?',
     'a' => 'It scales with the graft count. Smaller sessions take a few hours; larger ones run through most of the day, with breaks for food and rest. It is a day case under local anaesthetic, so you go home the same day with written aftercare. Arrange a lift or a cab rather than riding a two-wheeler.'],
    ['q' => 'Is a hair transplant painful?',
     'a' => 'The local anaesthetic injections are the uncomfortable part; after that the areas are numb, though you may feel pressure. Soreness or swelling for a few days afterwards is usual and managed with prescribed medication.'],
    ['q' => 'How soon can I go back to work?',
     'a' => 'Most people return to desk work within a few days. Crusts settle over the first week or two. Strenuous exercise, helmets and anything that presses on the grafts wait until your doctor clears them at a review.'],
    ['q' => 'When can I wear a helmet, go to the gym or be out in the sun?',
     'a' => 'Helmets and tight caps wait until a review clears them, and then only loose-fitting ones. Full gym training usually resumes at around three to four weeks and swimming at around four. Cover or shade the recipient area from direct sun for the first few weeks. Your own timings are set at your reviews; the <a href="/hair-transplant-aftercare">aftercare guide</a> has the detail.'],
    ['q' => 'Which side effects should I report straight away?',
     'a' => 'Swelling, crusting, numbness and temporary shedding are expected. Call the clinic rather than waiting if you have a fever, spreading redness or warmth, pus or discharge, pain that gets worse after the first few days, or bleeding that does not stop with ten minutes of gentle pressure.'],
    ['q' => 'When can I judge the result?',
     'a' => 'Transplanted hairs commonly shed in weeks two to four while the follicles stay in place. Fine new hair appears from around three to four months, and the result is judged at about ten to twelve months against standardised photographs from your reviews. Results vary between patients.'],
    ['q' => 'Will the transplanted hair last?',
     'a' => 'Transplanted follicles keep the character of the donor hair and generally persist, but untreated hair around them can keep thinning with age, so a long-term plan matters. No clinic can promise a particular density.'],
    ['q' => 'What happens if a transplant is not suitable for me?',
     'a' => 'You are told plainly, and why. Fast-moving loss, a thinning donor area, active alopecia areata or an untreated cause such as low iron usually mean <a href="/hair-fall-treatment-in-rohini">hair fall treatment</a>, <a href="/hair-prp-treatment-in-rohini">PRP</a> or time comes first, and the question is revisited later.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Hair Transplant in Rohini'],
];

$page = [
    'title'         => 'Hair Transplant in Rohini Delhi: FUE, DHI & Cost | DenceSpot',
    'description'   => 'Hair transplant in Rohini, Delhi: FUE and DHI at our North-West Delhi clinic. Grafts by Norwood stage, FUE vs DHI compared, cost factors, recovery and FAQs.',
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
        <span class="pill pill--dot">Rohini, Delhi</span>
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
          <p class="eyebrow">Rohini Clinic</p>
          <p class="h4 mt-1"><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></p>
          <p class="meta"><?= e(HOURS_DISPLAY) ?><span style="display:block"><?= e(HOURS_NOTE) ?></span></p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= lead_strip() ?>

<?= lp_split([
    'img'     => 'intro-donor',
    'alt'     => 'a mannequin head seen from behind, with the donor area at the back and sides marked',
    'eyebrow' => 'The basics, plainly',
    'title'   => 'What a Hair Transplant Does — and What It Cannot',
    'html'    => '<p>A hair transplant relocates follicles you already have. They are taken from the back and sides of the scalp, where hair generally resists the hormonal process behind pattern loss, and set into thinning zones at the angle the neighbouring hair grows.</p>'
               . '<p>It does not add follicles. Every graft placed at the front is one fewer at the back, so the hairline and the share each zone receives are planned against the loss you may have in twenty years, not only today’s.</p>',
    'points'  => [
        'Your own hair, moved from the back and sides',
        'The hairline drawn on your face and agreed first',
        'A day case under local anaesthetic',
    ],
]) ?>

<section class="section section--canvas" id="candidacy">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">Suitability</p>
        <h2 class="h2 mt-2">Who May Be Suited — and When Surgery Should Wait</h2>
        <p class="body mt-3">Suitability is decided after an examination at the clinic, not from photographs. These are the situations most often assessed.</p>
        <p class="body-s mt-3">Unsure where you stand? The six-question <a href="/hair-loss-assessment">hair loss self-assessment</a> points to a sensible next step before you book. It is not a diagnosis.</p>
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

<?= lp_split([
    'img'     => 'intro-recipient',
    'alt'     => 'a mannequin head seen from the front, with short hair and a planned hairline drawn in pencil',
    'eyebrow' => 'Techniques at Rohini',
    'title'   => 'FUE and DHI: The Same Extraction, Different Placement',
    'reverse' => true,
    'html'    => '<p>Both remove follicular units one at a time with a fine punch, leaving small dot scars rather than a line. They differ in how each graft goes in, and many plans use both.</p>'
               . '<p><b>FUE placement:</b> recipient sites are made first and grafts placed into them — efficient over larger zones such as the mid-scalp and crown. See <a href="/fue-hair-transplant-in-rohini">FUE hair transplant in Rohini</a>.</p>'
               . '<p><b>DHI placement:</b> each graft is set with a fine implanter pen that fixes depth, angle and direction in one movement — slower, but useful along hairlines and temples. See <a href="/dhi-hair-transplant-in-rohini">DHI hair transplant in Rohini</a>.</p>',
    'points'  => [
        'Neither technique is better for everyone',
        'A common plan: DHI along the front rows, FUE behind',
        'Recovery is the same either way',
    ],
]) ?>

<section class="section section--canvas" id="fue-vs-dhi">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Side by side</p>
      <h2 class="h2 mt-2">FUE vs DHI in Rohini, Compared</h2>
      <p class="body mt-3">Both techniques are carried out at the Rohini clinic. The table sets out how they differ; it does not rank them, because which fits depends on your zones and your donor area, and many plans use both.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data">
          <caption class="sr-only">FUE and DHI hair transplant compared by extraction, placement, shaving, the areas each fits, session length and cost factors</caption>
          <thead>
            <tr><th scope="col">Aspect</th><th scope="col">FUE</th><th scope="col">DHI</th></tr>
          </thead>
          <tbody>
            <?php foreach ($techRows as $r): ?>
            <tr>
              <th scope="row"><?= e($r['aspect']) ?></th>
              <td><?= e($r['fue']) ?></td>
              <td><?= e($r['dhi']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">Recovery, donor healing and the growth timeline are the same for both. More detail on <a href="/fue-hair-transplant-in-rohini">FUE in Rohini</a> and <a href="/dhi-hair-transplant-in-rohini">DHI in Rohini</a>, or read <a href="/blog/fue-vs-dhi-hair-transplant">FUE vs DHI explained</a>.</p>
  </div>
</section>

<section class="section section--white" id="donor">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Donor planning</p>
      <h2 class="h2 mt-2">Grafts by Norwood Stage, Planned Around Your Donor Supply</h2>
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

<?= lp_steps([
    'eyebrow' => 'At the Rohini clinic',
    'title'   => 'What Happens, Step by Step',
    'intro'   => 'Consultations and procedures at the Rohini clinic are carried out by registered medical practitioners.',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                       'title' => 'Consultation and examination', 'text' => 'Medical history and medicines, then the scalp and donor area examined under magnification and photographed.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned hairline',    'title' => 'A written plan',               'text' => 'Technique, mapped graft count, timeline and cost factors in writing. You are not asked to book a date on the day.'],
        ['img' => 'step-procedure',    'alt' => 'sterile hair-restoration instruments laid out on a tray',     'title' => 'Procedure day',                'text' => 'The hairline is drawn and checked with you, the donor area is numbed, and grafts are extracted and placed by FUE, DHI or both.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with review dates circled',                  'title' => 'Aftercare and reviews',        'text' => 'Home the same day with written aftercare, and follow-up reviews at the Rohini clinic through the first year.'],
    ],
]) ?>

<section class="section section--white" id="recovery">
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

    <div class="grid grid--3 mt-5">
      <div class="note"><p class="h4">Before the day</p><div class="mt-2"><?= ticks([
          'Bring a list of every medicine and supplement you take.',
          'Follow your instructions on alcohol and blood thinners.',
          'Eat a proper meal beforehand.',
          'Arrange a lift home rather than riding a two-wheeler.',
      ], false) ?></div></div>
      <div class="note"><p class="h4">Risks, in their real categories</p><p class="body-s mt-2">Swelling, crusting, numbness and temporary shedding are expected; infection and poor growth are uncommon; an over-harvested donor or a badly placed hairline are lasting. Results vary. See <a href="/blog/hair-transplant-side-effects-and-risks">side effects and risks</a>.</p></div>
      <div class="note"><p class="h4">When to call the clinic</p><p class="body-s mt-2">Fever, spreading redness or warmth, pus or discharge, pain that worsens after the first few days, or bleeding that does not stop with ten minutes of gentle pressure. These are uncommon; call rather than wait.</p></div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-hair-fall',
    'alt'     => 'a wooden comb resting on a stack of folded towels',
    'eyebrow' => 'Local practicalities',
    'title'   => 'Recovering in Delhi: Heat, Smog, Dust and Helmets',
    'id'      => 'recovering-in-delhi',
    'tone'    => 'canvas',
    'html'    => '<p>Grafts are held only lightly for roughly the first ten days, and Delhi’s weather and roads make parts of that window harder. None of this changes the medical plan; it changes the arrangements around it, and your written aftercare instructions always come first.</p>'
               . '<p>Many people choose the cooler months for these reasons, but any season can work with the right arrangements. Timings are in the <a href="/hair-transplant-aftercare">hair transplant aftercare guide</a>, and <a href="/blog/first-14-days-after-a-hair-transplant">the first 14 days after a hair transplant</a> shows what to expect day by day.</p>',
    'points'  => [
        'Summer heat: sweat over fresh grafts is the problem, so keep to the shade, avoid exertion and wash only as shown at the clinic',
        'Direct sun: cover or shade the recipient area for the first few weeks, with a loose hat only once you are cleared',
        'The winter smog season: keep outdoor time short on high-pollution days and keep the scalp clean with the routine you are given',
        'Dust and two-wheelers: travel home by car or cab, and leave the helmet until a review clears it, then wear only a loose one',
    ],
]) ?>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Cost guidance</p>
      <h2 class="h2 mt-2">Hair Transplant Cost in Rohini</h2>
      <p class="body mt-3">There is no fixed price, because no two plans use the same number of grafts. Cost is broadly the graft count multiplied by a per-graft rate, plus what the estimate includes, and it is given to you itemised and in writing after your assessment. These are the factors that decide it.</p>
    </div>
    <div class="grid grid--3 mt-5">
      <div class="card"><p class="h4">Graft count</p><p class="meta mt-1">Mapped from your scalp, zone by zone</p></div>
      <div class="card"><p class="h4">Technique mix</p><p class="meta mt-1">FUE, DHI, or DHI at the front only</p></div>
      <div class="card"><p class="h4">Donor density</p><p class="meta mt-1">What can safely be taken, now and later</p></div>
      <div class="card"><p class="h4">Sessions</p><p class="meta mt-1">One sitting or staged across two</p></div>
      <div class="card"><p class="h4">Shaving approach</p><p class="meta mt-1">Unshaven work takes longer</p></div>
      <div class="card"><p class="h4">Supporting treatment</p><p class="meta mt-1">Medication or PRP alongside</p></div>
    </div>
    <p class="body-s mt-4 measure">Comparing quotes? Ask whether a figure is in grafts or hairs and how it was arrived at. <a href="/blog/why-hair-transplant-quotes-vary">Why hair transplant quotes vary</a> explains what moves the number, and the <a href="/hair-transplant-graft-calculator">graft calculator</a> gives a starting range.</p>
    <p class="body-s mt-3 measure">Instalment options through third-party lenders may be available — ask at the consultation, and read <a href="/cost-and-emi-options">how medical EMI works</a> before signing anything.</p>
    <p class="mt-4"><a class="hp-link" href="/hair-transplant-cost-in-rohini">Hair transplant cost in Rohini, worked through <?= hp_icon('arrow', 15, 2) ?></a></p>
  </div>
</section>

<?= doctor_block(
    'Treatment at the Rohini clinic is carried out by registered medical practitioners. Every doctor at DenceSpot is listed below with qualifications and registration details.',
    '',
    false
) ?>

<section class="section section--white" id="questions-to-ask">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Before you choose</p>
      <h2 class="h2 mt-2">Questions Worth Asking Any Clinic</h2>
      <p class="body mt-3">Six questions that make any two hair transplant consultations in Delhi easier to compare, ours included. Each has a plain answer, and it is reasonable to ask for the answers in writing.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card"><h3 class="h4">Who will do each step?</h3><p class="body-s mt-2">Who draws the hairline, extracts the grafts, makes the sites and places them, and whether each is a registered medical practitioner. See <a href="/blog/who-can-legally-perform-a-hair-transplant-in-india">who can legally perform a hair transplant in India</a>.</p></div>
      <div class="card"><h3 class="h4">Is the number in grafts or hairs?</h3><p class="body-s mt-2">A graft carries one to four hairs, so 2,000 grafts and 2,000 hairs are very different plans. Ask which unit the quote uses and how the number was reached.</p></div>
      <div class="card"><h3 class="h4">What will be left in my donor area?</h3><p class="body-s mt-2">How your donor density was measured, and how many grafts the plan keeps in reserve for thinning that may come later. See <a href="/blog/donor-area-limits-hair-transplant">what a donor area can and cannot cover</a>.</p></div>
      <div class="card"><h3 class="h4">Why this technique for each zone?</h3><p class="body-s mt-2">FUE, DHI or both, with the reasoning for each zone written into the estimate rather than one label applied to the whole plan.</p></div>
      <div class="card"><h3 class="h4">What does the estimate include?</h3><p class="body-s mt-2">Medicines, aftercare products, review visits and any second session: what is included, what is not, and the whole figure itemised in writing.</p></div>
      <div class="card"><h3 class="h4">When would you advise against surgery?</h3><p class="body-s mt-2">A clinic should be able to say what would make it delay or decline, such as fast-moving loss or a thin donor. See <a href="/blog/who-should-not-have-a-hair-transplant">who should not have a hair transplant</a>.</p></div>
    </div>
    <p class="body-s mt-4 measure">A longer checklist is in <a href="/how-to-choose-hair-transplant-clinic">how to choose a hair transplant clinic</a>.</p>
  </div>
</section>

<section class="section section--canvas" id="faqs">
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

<?= latest_posts_strip('hair-transplant', 3, 'Further Reading') ?>

<?= local_block(
    'Our Hair Transplant Clinic in Rohini',
    'Consultations, hair transplants and follow-up reviews all take place at the Rohini clinic in North-West Delhi, near the Outer Ring Road.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= lp_cta([
    'eyebrow'   => 'Rohini, Delhi',
    'title'     => 'Book a Hair Transplant Consultation in Rohini',
    'text'      => 'Bring your questions and a list of your medicines. You get an examination, an honest view of whether a transplant suits you now, and a written plan if it does, with no pressure to book a date on the day.',
    'treatment' => 'Hair transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
