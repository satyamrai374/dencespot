<?php
/**
 * /fue-hair-transplant-in-rohini — FUE technique spoke for the Rohini clinic.
 *
 * October 2026 (agency confirmed 13 Oct 2026 that FUE is carried out at
 * Rohini). Facts follow /fue-hair-transplant-in-gurgaon; the text is new.
 *
 * Cannibalisation split: /hair-transplant-in-rohini owns the broad Rohini
 * query (candidacy, the day, recovery, cost). This page owns how FUE
 * extraction works, the dot scars it leaves, shaving, donor limits and the
 * FUE-or-DHI choice, and links up to the Rohini pillar and across to the
 * Gurugram FUE page for depth.
 *
 * Not yet reviewed by the clinic's doctor: doctor_block(..., false), no review
 * byline, not in MEDICAL_PAGES, and no named performer in the schema.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'Is FUE carried out at the Rohini clinic?',
     'a' => 'Yes. FUE hair transplants are carried out at the Rohini clinic in North-West Delhi by registered medical practitioners, as they are at our Sector 39, Gurugram clinic. The consultation, the procedure and the follow-up reviews can all be at Rohini.'],
    ['q' => 'Does FUE leave scars?',
     'a' => 'Yes, but as many tiny round dots rather than one line — usually pale and under a millimetre across, spread through the donor area. Spread evenly, they are hard to see at most hair lengths. Clustered or excessive extraction is what makes them visible.'],
    ['q' => 'Do I have to shave my head for FUE?',
     'a' => 'The donor area is trimmed short so each follicle can be extracted accurately. Whether the thinning area is trimmed depends on your plan. Unshaven and partially shaved approaches exist for smaller sessions, but they are slower and do not suit every case.'],
    ['q' => 'How many grafts can one FUE session take?',
     'a' => 'As many as your donor supply, scalp laxity and stamina for a long day allow — not a headline figure. Where the donor cannot support one large session, splitting the work over two protects it.'],
    ['q' => 'Can I have FUE if I had a strip (FUT) procedure before?',
     'a' => 'Often, yes. An old strip scar does not by itself rule out FUE, though scalp laxity and the state of the donor need assessing, and grafts can sometimes be placed into the old scar to soften it. This is decided on examination.'],
    ['q' => 'How often will I need to come back to Rohini?',
     'a' => 'There is a wash and review in the first week, then reviews with standardised photographs as the transplanted hair sheds and regrows, up to about twelve months. These take place at the Rohini clinic.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'FUE Hair Transplant in Rohini'],
];

$page = [
    'title'         => 'FUE Hair Transplant in Rohini, Delhi | DenceSpot Clinic',
    'description'   => 'FUE hair transplant in Rohini, Delhi: how follicles are extracted one by one, the dot scars FUE leaves, shaving, donor limits and when DHI fits better.',
    'url'           => '/fue-hair-transplant-in-rohini',
    'crumbs'        => $crumbs,
    'preload_image' => '/assets/img/services/svc-hair-transplant-768.webp',
    'schema'        => [
        schema_delhi_clinic(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/fue-hair-transplant-in-rohini', [
            'name'          => 'FUE Hair Transplant',
            'alternateName' => ['Follicular unit extraction', 'FUE hair transplant in Rohini, Delhi'],
            'procedureType' => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'Individual follicular units are extracted from the donor scalp with a fine punch, sorted under magnification and kept in a holding solution, then placed into recipient sites made at the angle, direction and depth of the surrounding hair. A day case under local anaesthetic at the Rohini, Delhi clinic.',
            'preparation'   => 'Examination of the hair-loss pattern and donor density, review of medicines including blood-thinning agents, and a hairline design agreed with the patient before the procedure.',
            'followup'      => 'A wash and review in the first week, then photographic reviews at the Rohini clinic as the transplanted hair sheds and regrows.',
            'expectedPrognosis' => 'Transplanted hairs commonly shed within the first weeks; new growth usually begins at around three to four months and the result is judged at about ten to twelve months. Outcomes vary between patients and cannot be promised.',
            'location'      => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
            'performer'     => null,
        ]),
        schema_faq('/fue-hair-transplant-in-rohini', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Clinic 2 · Rohini, Delhi</span>
        <h1 class="h1 mt-3">FUE Hair Transplant in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">FUE — follicular unit extraction — takes hair from the donor area one small group at a time, with a punch well under a millimetre across. It is carried out at our Rohini clinic by registered medical practitioners. Whether it suits you depends less on the technique than on how much your donor area can spare, and that is measured before any graft count is given.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Hair transplant" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp the Rohini Clinic</a>
        </div>

        <?= ticks([
            'Carried out at the Rohini clinic',
            'Dot scars rather than a linear scar',
            'Donor density measured first',
            'Home the same day',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-hair-transplant-768.webp" srcset="/assets/img/services/svc-hair-transplant-512.webp 512w, /assets/img/services/svc-hair-transplant-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a sculpted follicular unit model with three hair shafts, on a pale background" width="768" height="960" loading="eager" fetchpriority="high">
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

<section class="section section--white" id="extraction">
  <div class="wrap">
    <div class="split split--wide-left">
      <div>
        <p class="eyebrow">The technique</p>
        <h2 class="h2 mt-2">How FUE Extraction Works</h2>
        <div class="stack mt-4 measure">
          <p class="body-l">Hair grows in natural groups of one to four hairs, called follicular units. In FUE each unit is freed with a fine circular punch and lifted out whole. Punch size and depth are matched to the thickness of your hair and the angle it leaves the skin, because a follicle cut during extraction may not grow.</p>
          <p class="body-l">The harvest is spread across the back and sides of the head rather than taken from one patch, so the donor area stays even. The units are then sorted under magnification and kept in a holding solution: single hairs for the hairline, larger units behind it, where density shows.</p>
          <p class="body">Finally, recipient sites are made across the thinning area at the angle and direction of the surrounding hair, and the grafts are set into them. In DHI the extraction is the same and only this last step differs — see <a href="/dhi-hair-transplant-in-rohini">DHI hair transplant in Rohini</a>. For the wider picture, read <a href="/hair-transplant-in-rohini">hair transplant in Rohini</a>.</p>
        </div>
      </div>
      <div class="stack">
        <div class="card card--tint">
          <p class="eyebrow" style="color:var(--ink-muted)">Graft or hair?</p>
          <p class="body mt-2">A graft is one follicular unit; a hair is one strand. Two thousand grafts may carry roughly 4,000 to 5,000 hairs, so always ask which unit a quote is in.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="scars-and-shaving">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">The donor area, accurately</p>
      <h2 class="h2 mt-2">Dot Scars and Shaving: What FUE Leaves Behind</h2>
      <p class="body mt-3">FUE does leave scars — many small ones instead of one line. Each extraction heals as a pale round dot, usually under a millimetre across, scattered through the donor area.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card"><h3 class="h4">At most hair lengths</h3><p class="body-s mt-2">Spread evenly, the dots sit among the remaining hair and are hard to see, even when it is fairly short. They have usually faded by three to four months.</p></div>
      <div class="card"><h3 class="h4">Shaved to the skin</h3><p class="body-s mt-2">The dots can show as faint speckling. If you keep a skin fade or a shaved head, say so at the consultation so it is part of the plan.</p></div>
      <div class="card card--dashed"><h3 class="h4">What makes them obvious</h3><p class="body-s mt-2">Clustered extraction, or too many grafts from too small an area. That is a planning failure rather than a feature of FUE, and it cannot be undone.</p></div>
    </div>
    <h3 class="h3 mt-6">What is trimmed, and why</h3>
    <div class="grid grid--3 mt-4">
      <div class="card card--tint"><p class="h4">The donor area</p><p class="body-s mt-2">Trimmed to a short, even length so the punch can follow each follicle beneath the skin. This is needed in every FUE.</p></div>
      <div class="card card--tint"><p class="h4">The thinning area</p><p class="body-s mt-2">Whether it is trimmed depends on your case, and is agreed at the consultation rather than on the day.</p></div>
      <div class="card card--tint"><p class="h4">Unshaven options</p><p class="body-s mt-2">Possible for smaller sessions, but slower and not right for every plan. See <a href="/unshaven-hair-transplant-in-gurgaon">how unshaven transplants work</a>.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="donor-limits">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">The ceiling on FUE</p>
      <h2 class="h2 mt-2">Donor Limits and Over-harvesting</h2>
      <p class="body mt-3">Hair at the back and sides is generally resistant to pattern loss, which is why it is used. But there is only so much of it, and extracted follicles do not grow back.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card"><?= icon('shield', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Over-harvesting</h3><p class="body-s mt-2">Taking more than the donor can spare, or from too concentrated an area, leaves it visibly thin with obvious dots. Donor hair cannot be put back.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Session size</h3><p class="body-s mt-2">Set by donor supply, scalp laxity and how you manage a long day. Where the donor cannot support one large session, staging protects it.</p></div>
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Keeping a reserve</h3><p class="body-s mt-2">Pattern loss usually continues. Spending the whole donor on the hairline now may leave nothing for the crown later, so part is held back.</p></div>
    </div>
    <div class="note mt-4">
      <p class="body-s"><b>Three questions for any FUE quote:</b> is the number in grafts or hairs, how was it arrived at, and what will be left in the donor afterwards? More in <a href="/blog/donor-area-limits-hair-transplant">what a donor area can and cannot cover</a>.</p>
    </div>
  </div>
</section>

<section class="section section--canvas" id="fue-or-dhi">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Choosing a technique</p>
      <h2 class="h2 mt-2">Who FUE Suits — and When DHI Fits Better</h2>
      <p class="body mt-3">Extraction is the same in both, so the choice is about placement. Many plans combine them, and the reasoning for yours is written into the estimate.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="card card--pad-lg">
        <h3 class="h3">FUE placement usually fits</h3>
        <div class="mt-3"><?= ticks([
            'Several zones covered in one session',
            'The crown and mid-scalp, where coverage matters more than angle',
            'Larger graft numbers',
            'Short hair at the sides — dots hide better than a line',
            'Filling gaps left by an earlier procedure',
        ], false) ?></div>
      </div>
      <div class="card card--pad-lg">
        <h3 class="h3">DHI placement may fit better</h3>
        <div class="mt-3"><?= ticks([
            'The first rows of a hairline',
            'Temples, where hair lies at sharp angles',
            'Adding grafts between existing hair',
            'Small sessions with minimal trimming',
        ], false) ?></div>
        <p class="mt-4"><a class="hp-link" href="/dhi-hair-transplant-in-rohini">DHI hair transplant in Rohini <?= hp_icon('arrow', 15, 2) ?></a></p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="at-rohini">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Day and follow-up</p>
      <h2 class="h2 mt-2">FUE at the Rohini Clinic</h2>
      <p class="body mt-3">FUE is a day case under local anaesthetic. Smaller sessions take a few hours; larger ones run through most of the day, with breaks. The full sequence, from consultation to discharge, is on the <a href="/hair-transplant-in-rohini">hair transplant in Rohini</a> page.</p>
    </div>
    <div class="grid grid--4 mt-6">
      <div class="card"><span class="pill">Week 1</span><p class="body-s mt-3">Small crusts at the grafts and pinpoint scabs across the donor. Washing is taught, and the first review is at Rohini.</p></div>
      <div class="card"><span class="pill">Weeks 2–4</span><p class="body-s mt-3">Transplanted hairs commonly shed while the follicles stay in place. Expected.</p></div>
      <div class="card"><span class="pill">Months 3–4</span><p class="body-s mt-3">New growth begins, uneven and fine at first. Donor dots have usually faded.</p></div>
      <div class="card"><span class="pill pill--ink">Months 10–12</span><p class="body-s mt-3">The result is judged against standardised photographs from your reviews.</p></div>
    </div>
    <p class="body-s mt-5 measure">Cost depends on the graft count, session structure, hair characteristics and any supporting treatment, so it is quoted in writing after the assessment — see <a href="/hair-transplant-cost-in-gurgaon">how hair transplant cost is worked out</a>. For the technique in more depth, read the <a href="/fue-hair-transplant-in-gurgaon">FUE page for our Gurugram clinic</a>. Results vary between patients, and no clinic can promise a particular density.</p>
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
        <h2 class="h2 mt-2">FUE in Rohini: Questions Answered</h2>
        <p class="body-s mt-3">General patient education. Anything specific to your donor area or medical history is answered at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'Visit Our Rohini Clinic',
    'FUE consultations, procedures and follow-up reviews take place at the Rohini clinic in North-West Delhi, six days a week. Our Sector 39, Gurugram clinic carries out FUE as well, if it is closer for you.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= cta_band(
    'Book an FUE Assessment in Rohini',
    'Bring your questions and your medication list. Your donor area is measured, you get a straight view of whether FUE suits your pattern of loss, and a written plan with a mapped graft count if it does — with no pressure to book a date on the day.',
    'rohini-fue-hair-transplant',
    ['FUE hair transplant', 'FUE — hairline', 'FUE — crown', 'FUE or DHI — please advise'],
    'Delhi (Rohini)'
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
