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
 * FUE-or-DHI choice, and links up to the Rohini pillar.
 *
 * Per the client (14 Oct 2026) the page never mentions the Gurugram clinic
 * and never links to a Gurugram URL. Landing-page layout: lp_split /
 * lp_steps / lp_cta (includes/home-components.php).
 *
 * Not yet reviewed by the clinic's doctor: doctor_block(..., false), no review
 * byline, not in MEDICAL_PAGES, and no named performer in the schema.
 *
 * SEO round 2 (14 Oct 2026, COMPETITOR-SEO §4 #6, §5): "who it suits / who it
 * does not" table, a cost-factors section linking
 * /hair-transplant-cost-in-rohini (no prices), and 14 FAQs.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/**
 * Who FUE suits. Each row restates a fact already on this page or the Rohini
 * pillar's candidacy section; it is a general guide, not a verdict.
 */
$suitRows = [
    ['situation' => 'Pattern loss that has slowed into a clear shape',  'fit' => 'Usually suits',     'why' => 'The plan can be drawn against loss that has settled, accepting that surrounding hair may keep thinning.'],
    ['situation' => 'Fast-moving loss that is still changing',          'fit' => 'Not yet',           'why' => 'Medical treatment comes first, so grafts are not placed ahead of loss that has not settled.'],
    ['situation' => 'A donor area with density to spare',               'fit' => 'Usually suits',     'why' => 'The graft count can cover the priority zone and keep a reserve for later.'],
    ['situation' => 'A thin or thinning donor area',                    'fit' => 'Usually does not',  'why' => 'Taking more would thin the back of the head and make the dots visible, and that cannot be undone.'],
    ['situation' => 'The crown, mid-scalp or several zones',            'fit' => 'Usually suits',     'why' => 'FUE placement is efficient over larger areas and larger graft numbers.'],
    ['situation' => 'Only the front rows or the temples',               'fit' => 'Often DHI, or both', 'why' => 'Graft-by-graft control of angle and depth matters most there.'],
    ['situation' => 'Hair kept short at the sides',                     'fit' => 'Usually suits',     'why' => 'Spread evenly, dot scars hide better than a line at most hair lengths.'],
    ['situation' => 'The back kept shaved to the skin',                 'fit' => 'Discuss first',     'why' => 'The dots can show as faint speckling, so say so at the consultation.'],
    ['situation' => 'An earlier strip (FUT) scar',                      'fit' => 'Often suits',       'why' => 'Assessed on examination; grafts can sometimes be placed into the old scar to soften it.'],
    ['situation' => 'Active alopecia areata, or an untreated cause such as low iron', 'fit' => 'Not yet', 'why' => 'The cause is investigated and treated first.'],
];

$faqs = [
    ['q' => 'Is FUE carried out at the Rohini clinic?',
     'a' => 'Yes. FUE hair transplants are carried out at the Rohini clinic in North-West Delhi by registered medical practitioners. The consultation, the procedure and the follow-up reviews can all be at Rohini.'],
    ['q' => 'How much does FUE cost in Rohini?',
     'a' => 'There is no fixed price. Cost follows the graft count, how the sessions are structured, your hair characteristics and any supporting treatment, and it is quoted itemised and in writing after the donor assessment. <a href="/hair-transplant-cost-in-rohini">Hair transplant cost in Rohini</a> works through the arithmetic.'],
    ['q' => 'Is EMI available for FUE?',
     'a' => 'Instalment options through third-party lenders may be available — ask at the consultation. Interest, tenure and eligibility are set by the lender, so compare the total payable with the amount on your estimate before signing. See <a href="/cost-and-emi-options">cost, EMI and payment options</a>.'],
    ['q' => 'Does FUE leave scars?',
     'a' => 'Yes, but as many tiny round dots rather than one line — usually pale and under a millimetre across, spread through the donor area. Spread evenly, they are hard to see at most hair lengths. Clustered or excessive extraction is what makes them visible.'],
    ['q' => 'Do I have to shave my head for FUE?',
     'a' => 'The donor area is trimmed short so each follicle can be extracted accurately. Whether the thinning area is trimmed depends on your plan. Unshaven and partially shaved approaches exist for smaller sessions, but they are slower and do not suit every case.'],
    ['q' => 'How many grafts can one FUE session take?',
     'a' => 'As many as your donor supply, scalp laxity and stamina for a long day allow — not a headline figure. Where the donor cannot support one large session, splitting the work over two protects it.'],
    ['q' => 'How long does an FUE procedure take?',
     'a' => 'It scales with the graft count. Smaller sessions take a few hours; larger ones run through most of the day, with breaks for food and rest. FUE is a day case under local anaesthetic, and you go home the same day.'],
    ['q' => 'Should I eat, or stop any medicines, before FUE?',
     'a' => 'Eat a proper meal beforehand. Bring a list of every medicine and supplement you take, and do not stop a prescribed medicine on your own: blood thinners and alcohol are reviewed at the consultation, and you are told what to pause and when. Stopping smoking well before the procedure helps healing.'],
    ['q' => 'Can I have FUE if I had a strip (FUT) procedure before?',
     'a' => 'Often, yes. An old strip scar does not by itself rule out FUE, though scalp laxity and the state of the donor need assessing, and grafts can sometimes be placed into the old scar to soften it. This is decided on examination.'],
    ['q' => 'When can I go back to work after FUE?',
     'a' => 'Most people return to desk work within a few days. The donor area has pinpoint scabs and the recipient area small crusts for the first week or two. Work that is strenuous or involves a helmet waits until a review clears it.'],
    ['q' => 'When can I wear a helmet, exercise or go out in the sun?',
     'a' => 'Helmets and tight caps wait until a review clears them, and then only loose-fitting ones, so travel home by car or cab rather than on a two-wheeler. Full gym training usually resumes at around three to four weeks and swimming at around four, and the recipient area is kept out of direct sun for the first few weeks.'],
    ['q' => 'When will I see the result of FUE?',
     'a' => 'Transplanted hairs commonly shed in weeks two to four while the follicles stay in place. Fine new hair appears from around three to four months, and the result is judged at about ten to twelve months against standardised photographs. Results vary between patients.'],
    ['q' => 'How often will I need to come back to Rohini?',
     'a' => 'There is a wash and review in the first week, then reviews with standardised photographs as the transplanted hair sheds and regrows, up to about twelve months. These take place at the Rohini clinic.'],
    ['q' => 'Can I send photographs on WhatsApp before booking?',
     'a' => 'Yes. Photographs of your hairline, crown and the back of your head, sent on WhatsApp to ' . LOC_DELHI_PHONE_DISPLAY . ', help the appointment start from the right questions. A graft count is given only once your donor area has been examined. The Rohini clinic is open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . ').'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'FUE Hair Transplant in Rohini'],
];

$page = [
    'title'         => 'FUE Hair Transplant in Rohini, Delhi: Process & Cost',
    'description'   => 'FUE hair transplant in Rohini, Delhi: how follicles are extracted, the dot scars FUE leaves, who it suits and who it does not, recovery and what decides cost.',
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
        <span class="pill pill--dot">Rohini, Delhi</span>
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
    'img'     => 'svc-follicle',
    'alt'     => 'a sculpted cross-section of the scalp showing hair follicles beneath the skin',
    'eyebrow' => 'The technique',
    'title'   => 'How FUE Extraction Works',
    'html'    => '<p>Hair grows in natural groups of one to four hairs, called follicular units. In FUE each unit is freed with a fine circular punch and lifted out whole. Punch size and depth are matched to your hair and the angle it leaves the skin, because a follicle cut during extraction may not grow.</p>'
               . '<p>The units are sorted under magnification, then set into recipient sites made at the angle and direction of the surrounding hair. In DHI the extraction is the same and only this last step differs: see <a href="/dhi-hair-transplant-in-rohini">DHI hair transplant in Rohini</a>, or the wider picture on <a href="/hair-transplant-in-rohini">hair transplant in Rohini</a>.</p>'
               . '<p><b>Graft or hair?</b> A graft is one follicular unit; a hair is one strand. Two thousand grafts may carry roughly 4,000 to 5,000 hairs, so always ask which unit a quote is in.</p>',
    'points'  => [
        'The harvest is spread across the back and sides, so the donor stays even',
        'Units are kept in a holding solution until they are placed',
        'Single hairs for the hairline, larger units behind it',
    ],
]) ?>

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
      <div class="card card--tint"><p class="h4">Unshaven options</p><p class="body-s mt-2">Possible for smaller sessions, but slower and not right for every plan. See <a href="/unshaven-hair-transplant-in-rohini">unshaven hair transplant in Rohini</a>.</p></div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'intro-donor',
    'alt'     => 'a mannequin head seen from behind, with the donor area at the back and sides marked',
    'eyebrow' => 'The ceiling on FUE',
    'title'   => 'Donor Limits and Over-harvesting',
    'reverse' => true,
    'html'    => '<p>Hair at the back and sides is generally resistant to pattern loss, which is why it is used. But there is only so much of it, and extracted follicles do not grow back.</p>'
               . '<p><b>Three questions for any FUE quote:</b> is the number in grafts or hairs, how was it arrived at, and what will be left in the donor afterwards? More in <a href="/blog/donor-area-limits-hair-transplant">what a donor area can and cannot cover</a>.</p>'
               . '<p>The same numbers drive the cost, which is quoted in writing after the assessment: see <a href="#cost">FUE cost in Rohini</a> below.</p>',
    'points'  => [
        'Over-harvesting, too many grafts or from too concentrated an area, leaves the donor visibly thin with obvious dots, and donor hair cannot be put back',
        'Session size is set by donor supply, scalp laxity and how you manage a long day; where one large session is too much, staging protects the donor',
        'Pattern loss usually continues, so part of the donor is held back rather than all spent on the hairline now',
    ],
]) ?>

<section class="section section--canvas" id="who-it-suits">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Candidacy</p>
      <h2 class="h2 mt-2">Who FUE Suits — and Who It Does Not</h2>
      <p class="body mt-3">A general guide only: suitability is decided once your scalp and donor area have been examined at the Rohini clinic. The six-question <a href="/hair-loss-assessment">hair loss self-assessment</a> can help you describe your pattern before you book.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data data--fit">
          <caption class="sr-only">Situations in which FUE hair transplant usually suits, may suit or does not yet suit, with the reason for each — a general guide, not a diagnosis</caption>
          <thead>
            <tr><th scope="col">Your situation</th><th scope="col">FUE, and why</th></tr>
          </thead>
          <tbody>
            <?php foreach ($suitRows as $r): ?>
            <tr>
              <th scope="row" style="white-space:normal;width:38%"><?= e($r['situation']) ?></th>
              <td><b style="color:var(--ink)"><?= e($r['fit']) ?>.</b> <?= e($r['why']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">If FUE is not right for you yet, <a href="/hair-fall-treatment-in-rohini">hair fall treatment in Rohini</a> or <a href="/hair-prp-treatment-in-rohini">PRP in Rohini</a> may come first, and the question can be revisited once the loss has settled.</p>
  </div>
</section>

<section class="section section--white" id="fue-or-dhi">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Choosing a technique</p>
      <h2 class="h2 mt-2">FUE or DHI: Which Placement Fits Where</h2>
      <p class="body mt-3">Extraction is the same in both, so the choice is about placement. Many plans combine them, and the reasoning for yours is written into the estimate. <a href="/blog/fue-vs-dhi-hair-transplant">FUE vs DHI</a> compares the two in more depth.</p>
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

<?= lp_steps([
    'eyebrow' => 'Day and follow-up',
    'title'   => 'FUE at the Rohini Clinic',
    'intro'   => 'FUE is a day case under local anaesthetic, and every stage below takes place at the Rohini clinic. Results vary between patients, and no clinic can promise a particular density.',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                    'title' => 'Donor assessment',    'text' => 'Your pattern of loss is examined and your donor density measured before any graft count is given.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned hairline', 'title' => 'A written plan',      'text' => 'A mapped graft count, the reasoning for FUE, DHI or both, and the cost in writing. You are not asked to book a date on the day.'],
        ['img' => 'step-procedure',    'alt' => 'sterile hair-restoration instruments laid out on a tray',  'title' => 'Procedure day',       'text' => 'Smaller sessions take a few hours; larger ones run through most of the day, with breaks. You go home the same day.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with review dates circled',               'title' => 'Healing and reviews', 'text' => 'Crusts and pinpoint donor scabs in week one, when washing is taught and the first review is at Rohini. Shedding in weeks 2–4, new growth from months 3–4, and the result judged at 10–12 months against standardised photographs.'],
    ],
]) ?>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Cost guidance</p>
      <h2 class="h2 mt-2">FUE Cost in Rohini: What Decides It</h2>
      <p class="body mt-3">There is no fixed price for FUE, because no two plans use the same number of grafts. Cost is broadly the graft count multiplied by a per-graft rate, plus what the estimate includes, and it is given to you itemised and in writing after the donor assessment.</p>
    </div>
    <div class="grid grid--4 mt-5">
      <div class="card"><p class="h4">Graft count</p><p class="meta mt-1">Mapped from your scalp, zone by zone</p></div>
      <div class="card"><p class="h4">Sessions</p><p class="meta mt-1">One sitting, or staged to protect the donor</p></div>
      <div class="card"><p class="h4">Your hair</p><p class="meta mt-1">Donor density and hair thickness</p></div>
      <div class="card"><p class="h4">Supporting treatment</p><p class="meta mt-1">Medication or PRP alongside</p></div>
    </div>
    <p class="body-s mt-4 measure">Ask whether any FUE quote is in grafts or hairs, and how the number was reached; <a href="/blog/why-hair-transplant-quotes-vary">why hair transplant quotes vary</a> explains the difference it makes. The <a href="/hair-transplant-graft-calculator">graft calculator</a> gives a starting range. Instalment options through third-party lenders may be available — ask at the consultation, and read <a href="/cost-and-emi-options">how medical EMI works</a> first.</p>
    <p class="mt-4"><a class="hp-link" href="/hair-transplant-cost-in-rohini">Hair transplant cost in Rohini, worked through <?= hp_icon('arrow', 15, 2) ?></a></p>
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
    'FUE consultations, procedures and follow-up reviews take place at the Rohini clinic in North-West Delhi, six days a week.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= lp_cta([
    'eyebrow'   => 'Rohini, Delhi',
    'title'     => 'Book an FUE Assessment in Rohini',
    'text'      => 'Bring your questions and your medication list. Your donor area is measured, you get a straight view of whether FUE suits your pattern of loss, and a written plan with a mapped graft count if it does — with no pressure to book a date on the day.',
    'treatment' => 'Hair transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
