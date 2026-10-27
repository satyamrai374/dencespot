<?php
/**
 * /hairline-transplant-in-rohini — hairline design spoke for the Rohini clinic.
 *
 * October 2026 (batch 2). The agency confirmed on 13 Oct 2026 that every
 * DenceSpot service is carried out at the Rohini clinic. Medical facts follow
 * the existing hairline page and /blog/natural-hairline-design-explained; the
 * wording is new. Client rule (14 Oct 2026): Rohini pages do not mention or
 * link the other location.
 *
 * Cannibalisation split: technique belongs to the FUE/DHI Rohini spokes and
 * the broad query to /hair-transplant-in-rohini. This page owns design: an
 * age-appropriate position, the single-hair front edge, temples, planning for
 * loss still to come, and when to wait. Wording note: "front edge" only.
 *
 * Not yet reviewed by the clinic's doctor: doctor_block(..., false), no review
 * byline, not in MEDICAL_PAGES, and no named performer in the schema.
 *
 * SEO round 3 (14 Oct 2026, COMPETITOR-SEO §4 #6, §5): title "<Service> in
 * Rohini, Delhi: <modifier>", a "who it suits / when it waits" table, a cost
 * section linking /hair-transplant-cost-in-rohini (no prices) with a
 * "Recovering in Delhi" card, and 15 FAQs. lp_steps moved to the canvas tone
 * so section backgrounds still alternate around the new table.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/**
 * Who a hairline transplant suits. Each row restates a fact already on this
 * page, the Rohini pillar or the women's page; a general guide, not a verdict.
 */
$suitRows = [
    ['situation' => 'Temple recession that has settled into a clear shape', 'fit' => 'Usually suits',           'why' => 'The line can be drawn against loss that has stopped moving, with donor hair kept in reserve.'],
    ['situation' => 'Loss still moving fast, or thinning that began only recently', 'fit' => 'Not yet',           'why' => 'It is treated medically first, and the hairline is reassessed once the pattern has settled.'],
    ['situation' => 'A wish for the hairline you had as a teenager',         'fit' => 'Not as asked',            'why' => 'A mature position is drawn instead. It can be lowered later if loss stays settled; a line placed too low cannot simply be raised.'],
    ['situation' => 'Plenty of donor hair, with loss that may reach the crown', 'fit' => 'Usually suits, with a reserve', 'why' => 'Part of the donor is held back so the vertex is not left without grafts later.'],
    ['situation' => 'A small donor area with extensive loss expected',        'fit' => 'Usually does not',        'why' => 'Spending the donor on the front could leave nothing for loss still to come.'],
    ['situation' => 'Recessed temples on their own',                          'fit' => 'Discuss first',           'why' => 'Temple hair is fine and lies at sharp angles, and temple work uses grafts the front may need. While loss is moving, leaving the temples is often the advice.'],
    ['situation' => 'A woman with a naturally high hairline',                 'fit' => 'Considered selectively',  'why' => 'After a medical workup, if the front of the scalp is stable and the donor can spare the hair. A female line is drawn lower and rounder.'],
    ['situation' => 'An earlier hairline that looks too low, harsh or tufted', 'fit' => 'Assessed as a repair',   'why' => 'Softening with single hairs, or removing misplaced grafts, depends on what the donor can still give.'],
    ['situation' => 'Active alopecia areata, or an untreated cause such as low iron', 'fit' => 'Not yet',          'why' => 'The cause is investigated and treated first.'],
];

$faqs = [
    ['q' => 'Is the hairline procedure carried out at the Rohini clinic?',
     'a' => 'Yes. Hairline transplants are carried out at the Rohini clinic in North-West Delhi by registered medical practitioners. The design consultation, the drawing on the day, the procedure and the follow-up reviews all take place there.'],
    ['q' => 'Can my hairline go back to where it was in my teens?',
     'a' => 'Rarely. An adolescent line can look ordinary at twenty-five and out of place at forty-five, once the hair behind it has thinned. A mature position is drawn instead; it can be brought lower in a later session if your loss stays settled and your donor area allows, whereas a line placed too low cannot simply be raised.'],
    ['q' => 'I am in my twenties. Should I have a hairline transplant now?',
     'a' => 'Age alone does not decide it; whether the loss is still moving does. Early loss that is still progressing is usually treated medically first, because a line placed while the hair behind it is receding leaves a strip of transplanted hair with a gap opening up behind it. The hairline is reassessed once the pattern has settled.'],
    ['q' => 'Should my temples be rebuilt as well?',
     'a' => 'Sometimes. The temples matter to how a face reads, but the hair there is fine and lies at very sharp angles, and the work uses grafts the front of the scalp may need. Where loss is still progressing, leaving the temples recessed is often the advice.'],
    ['q' => 'How many grafts will my hairline take?',
     'a' => 'That depends on the agreed drawing. A frontal line alone needs far fewer grafts than a line plus temples plus density built further back. The number is counted from your mapped plan, not quoted from a photograph; the <a href="/hair-transplant-graft-calculator">graft calculator</a> gives a rough starting range.'],
    ['q' => 'FUE or DHI for a hairline?',
     'a' => 'Both are used, and the choice matters less than the design. Implanter placement gives fine control at sharp angles, which is why it is often used at the front edge and temples; FUE placement into pre-made sites is efficient over larger areas. See <a href="/dhi-hair-transplant-in-rohini">DHI in Rohini</a> and <a href="/fue-hair-transplant-in-rohini">FUE in Rohini</a>.'],
    ['q' => 'Will people be able to tell I have had it done?',
     'a' => 'That depends mainly on the design, and no outcome can be promised. Angle, direction, irregularity and restraint at the front decide it far more than the technique or the graft count. Work that gets noticed was usually placed too low, too straight or too densely at the very edge.'],
    ['q' => 'Will the new hairline last?',
     'a' => 'Transplanted follicles keep the character of the donor hair and generally persist. The hair behind them can keep thinning with age, which is why the design allows for future loss and medical treatment usually continues. No clinic can promise a particular density.'],
    ['q' => 'How long does the procedure take, and do I go home the same day?',
     'a' => 'It scales with the graft count. Smaller sessions take a few hours; larger ones run through most of the day, with breaks for food and rest. It is a day case under local anaesthetic, so you go home the same day. Eat beforehand, bring your medicines list, and arrange a lift or a cab rather than a two-wheeler.'],
    ['q' => 'When can I go back to work, wear a cap or ride with a helmet?',
     'a' => 'Most people return to desk work within a few days, though crusts at the front and some forehead swelling show for the first week or so. Caps and helmets wait until a review clears them, and then only loose-fitting ones. Full gym training usually resumes at around three to four weeks, and the new hairline is kept out of direct sun for the first few weeks.'],
    ['q' => 'When will my hairline look like itself?',
     'a' => 'Transplanted hairs commonly shed in weeks two to four while the follicles stay in place. Fine new hair appears from around three to four months, uneven at first, and the hairline is judged at about ten to twelve months against your review photographs. Results vary between patients.'],
    ['q' => 'Can a hairline done elsewhere be corrected?',
     'a' => 'Sometimes. It may be possible to soften a harsh edge with single hairs placed in front of it, and occasionally to remove grafts that sit in the wrong place. Correction is slower and more limited than getting the design right the first time, and it depends on what the donor area can still give. See <a href="/hair-transplant-repair-in-rohini">hair transplant repair in Rohini</a>.'],
    ['q' => 'What does a hairline transplant cost in Rohini?',
     'a' => 'There is no set fee. Cost follows the agreed drawing: the front line alone or line and temples, how far back density is built, what your donor area can give, the technique and the number of sessions. The estimate is itemised and in writing after your assessment; <a href="/hair-transplant-cost-in-rohini">hair transplant cost in Rohini</a> shows how a graft count becomes a figure. Instalment options through third-party lenders may be available — ask at the consultation, and see <a href="/cost-and-emi-options">payment and EMI options</a>.'],
    ['q' => 'Can I send photographs on WhatsApp before booking?',
     'a' => 'Yes. Front-on and side photographs of your hairline and temples, plus one of the back of your head, sent on WhatsApp to ' . LOC_DELHI_PHONE_DISPLAY . ', help the appointment start from the right questions. The line itself is drawn only in person, on your forehead. The clinic is open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . ').'],
    ['q' => 'Is the Rohini clinic convenient for me?',
     'a' => 'The clinic is in North-West Delhi near the Outer Ring Road, which makes it convenient for North and North-West Delhi — Rohini, Pitampura, Shalimar Bagh and Prashant Vihar among them. Hours and a map link are on the clinic page.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Hairline Transplant in Rohini'],
];

$page = [
    'title'         => 'Hairline Transplant in Rohini, Delhi: Design, Temples & Cost',
    'description'   => 'Hairline transplant in Rohini, Delhi: a line drawn for your age and agreed in a mirror, single hairs at the front edge, temples, suitability and cost.',
    'url'           => '/hairline-transplant-in-rohini',
    'crumbs'        => $crumbs,
    'preload_image' => '/assets/img/services/svc-hairline-768.webp',
    'schema'        => [
        schema_delhi_clinic(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/hairline-transplant-in-rohini', [
            'name'          => 'Hairline Transplant',
            'alternateName' => ['Hairline restoration', 'Frontal hairline hair transplant', 'Hairline transplant in Rohini, Delhi'],
            'procedureType' => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'  => 'Frontal scalp and temples',
            'howPerformed'  => 'A hairline position and shape are drawn on the patient and agreed in a mirror before surgery. Follicular units are extracted from the donor scalp and sorted under magnification; single-hair grafts are placed irregularly along the front edge, with multi-hair grafts behind them to build density, each at the acute forward angle of frontal hair. A day case under local anaesthetic at the Rohini, Delhi clinic.',
            'preparation'   => 'Examination of the hair-loss pattern and its likely progression, donor density measurement, review of medicines, and a hairline drawn while the patient sits upright and agreed before consent.',
            'followup'      => 'Washing taught and a review in the first week, then photographic reviews at the Rohini clinic as the transplanted hair sheds and regrows, with medical treatment for the hair behind the line where advised.',
            'expectedPrognosis' => 'Transplanted hairs commonly shed within the first weeks; new growth usually begins at around three to four months and the hairline is judged at about ten to twelve months. Untreated hair behind the line may keep thinning with age. Outcomes vary between patients and cannot be promised.',
            'location'      => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
        ]),
        schema_faq('/hairline-transplant-in-rohini', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Rohini · North-West Delhi</span>
        <h1 class="h1 mt-3">Hairline Transplant in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">A hairline transplant rebuilds the front of the scalp, and the temples where that makes sense, with hair from your own donor area. At our Rohini clinic your proposed line is marked on your forehead and you approve it, looking in a mirror, before a single graft is removed. It is drawn for the face you will have in twenty years rather than the one you had at eighteen.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/delhi-clinic#book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Hair transplant" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp the Rohini Clinic</a>
        </div>

        <?= ticks([
            'Line drawn and agreed in a mirror',
            'Single hairs along the front edge',
            'Planned around loss still to come',
            'Carried out at the Rohini clinic',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-hairline-768.webp" srcset="/assets/img/services/svc-hairline-512.webp 512w, /assets/img/services/svc-hairline-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a mannequin head seen from above, with hair receding at both temples" width="768" height="960" loading="eager" fetchpriority="high">
          <?= hp_ai_chip('AI-generated illustration') ?>
        </div>
        <div class="hero__badge-card">
          <p class="eyebrow">Rohini clinic</p>
          <p class="h4 mt-1"><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></p>
          <p class="meta"><?= e(HOURS_DISPLAY) ?><span style="display:block"><?= e(HOURS_NOTE) ?></span></p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= lead_strip() ?>

<?= lp_split([
    'img'     => 'intro-recipient',
    'alt'     => 'a mannequin head from the front, with a planned hairline drawn in pencil',
    'eyebrow' => 'Design first',
    'title'   => 'Why the Line Matters More Than the Graft Count',
    'html'    => '<p>The extraction in a hairline case is the same as in any transplant. What sets it apart is that the front is seen face on, in daylight, by everyone you talk to.</p>'
               . '<p>Graft numbers can be added to later. A line placed too low cannot simply be raised: the only remedy is removing hairs one at a time, which is slow and does not always leave the skin as it was.</p>'
               . '<p>The whole process is set out on <a href="/hair-transplant-in-rohini">hair transplant in Rohini</a>, and the clinic page has hours and <a href="/delhi-clinic">directions to the Rohini clinic</a>.</p>',
    'points'  => [
        'Drawn on your forehead and agreed in a mirror',
        'A slightly higher line can be lowered later',
        'A line that starts too low has no such option',
    ],
]) ?>

<section class="section section--canvas" id="position">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Position</p>
      <h2 class="h2 mt-2">Choosing an Age-Appropriate Position</h2>
      <p class="body mt-3">Most men’s hairlines move back a little during their twenties and then settle. That settled, mature line is an ordinary adult feature, not the start of pattern loss, and it is what the drawing aims for.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Judged on your face</h3><p class="body-s mt-2">Reference points such as where the forehead turns from vertical to horizontal guide the drawing. They are a starting point, not a formula.</p></div>
      <div class="card"><?= icon('pencil', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Drawn sitting upright</h3><p class="body-s mt-2">With your eyebrows relaxed and a mirror in front of you. A line drawn while you lie back sits differently once you stand.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Asymmetry allowed for</h3><p class="body-s mt-2">Few faces are symmetrical, and a geometrically even line often looks subtly wrong on a face that is not.</p></div>
    </div>
    <div class="note mt-4">
      <p class="body-s"><b>Why a low line is a common regret:</b> it can look fine at twenty-five. At forty-five the hair behind it has thinned while the line has stayed put, leaving a dense strip in front of sparse scalp.</p>
    </div>
  </div>
</section>

<section class="section section--white" id="front-edge">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">The front edge</p>
      <h2 class="h2 mt-2">Single Hairs, Irregular Spacing, the Right Angle</h2>
      <p class="body mt-3">Whether a transplanted hairline reads as your own is decided mostly in its first few millimetres.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="card card--tint"><h3 class="h4">Single-hair grafts in front</h3><p class="body-s mt-2">Follicular units hold one to four hairs. Only single-hair units go along the front edge, two-hair units behind them, larger units further back. Two hairs from one point at the edge read as a tuft.</p></div>
      <div class="card card--tint"><h3 class="h4">A soft transition</h3><p class="body-s mt-2">Density builds over roughly a centimetre, with a few isolated hairs just ahead of the line, rather than starting at full density in a single row.</p></div>
      <div class="card card--tint"><h3 class="h4">Irregular on purpose</h3><p class="body-s mt-2">Small mounds and shallow bays across the width, and two sides that do not mirror each other exactly. A smooth arc from temple to temple looks constructed.</p></div>
      <div class="card card--tint"><h3 class="h4">Angle and direction</h3><p class="body-s mt-2">Frontal hair lies forward, close to the skin. The angle is fixed as each site is made; hair set too steeply stands up, and no styling fixes it.</p></div>
    </div>
    <p class="body-s mt-5 measure">Dark, coarse hair against brown skin shows each hair individually, which argues for a wider transition zone and more single-hair grafts at the edge. Our article on <a href="/blog/natural-hairline-design-explained">how a transplanted hairline is designed</a> goes into this in depth.</p>
  </div>
</section>

<section class="section section--canvas" id="temples">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Temples</p>
      <h2 class="h2 mt-2">Rebuilding the Temples, or Leaving Them</h2>
      <p class="body mt-3">The temple points frame the face, and their loss is part of what makes a hairline look older. Rebuilding them is among the most demanding parts of the work.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="card card--pad-lg">
        <h3 class="h3">Why temples are difficult</h3>
        <div class="mt-3"><?= ticks([
            'The hair there is fine',
            'It lies at very sharp angles',
            'Growth runs backwards and downwards',
            'Any error shows clearly in profile',
        ], false) ?></div>
      </div>
      <div class="card card--pad-lg">
        <h3 class="h3">Why some people leave them</h3>
        <p class="body-s mt-3">Temple work spends donor hair that could add density across the front third, where it does more for how you look face on. Where loss is still moving, keeping the temples recessed is often the wiser choice.</p>
        <p class="body-s mt-3">Implanter placement gives fine control at sharp angles, which is why it is often used here: see <a href="/dhi-hair-transplant-in-rohini">DHI hair transplant in Rohini</a>.</p>
      </div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'stage-extensive',
    'alt'     => 'a mannequin head from above, with hair left only at the sides and back',
    'eyebrow' => 'Planning ahead',
    'title'   => 'Planning for Loss That Has Not Happened Yet',
    'reverse' => true,
    'html'    => '<p>Transplanted follicles generally keep the character of the donor hair. The hair behind them does not, and it can keep thinning with age.</p>'
               . '<p>If the front is rebuilt while the hair just behind it is still thinning, the result is a strip of transplanted hair with a growing gap at its back. Donor hair is a one-off supply, and using all of it on the front leaves nothing if loss later reaches the vertex — see <a href="/crown-hair-transplant-in-rohini">crown hair transplant in Rohini</a>.</p>'
               . '<p>Medicines are usually continued for the hair behind the line; <a href="/blog/minoxidil-and-finasteride-in-india">minoxidil and finasteride in India</a> explains the common options.</p>',
    'points'  => [
        'Expected: swelling, crusting, numbness, temporary shedding',
        'Uncommon: infection and poor growth',
        'Lasting: a badly placed line. Results vary.',
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-hair-transplant',
    'alt'     => 'a sculpted model of a follicular unit with three hairs',
    'eyebrow' => 'Timing',
    'title'   => 'When It Is Better to Wait',
    'tone'    => 'canvas',
    'html'    => '<p>Age alone does not decide it; whether the loss is still moving does. Where it is, the loss is treated medically first, through <a href="/hair-fall-treatment-in-rohini">hair fall treatment in Rohini</a>, and the hairline is reassessed once the pattern has settled.</p>'
               . '<p>Knowing where you sit on the <a href="/blog/norwood-scale-explained">Norwood scale of male hair loss</a> helps frame that conversation.</p>',
    'points'  => [
        'Fast loss not yet brought under control',
        'Thinning that began only recently, in your early twenties',
        'A small donor area with extensive loss expected',
        'A firm wish for an adolescent hairline',
    ],
]) ?>

<section class="section section--white" id="who-it-suits">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Candidacy</p>
      <h2 class="h2 mt-2">Who a Hairline Transplant Suits — and When It Waits</h2>
      <p class="body mt-3">A general guide only: suitability is decided once your hairline, the hair behind it and your donor area have been examined at the Rohini clinic. The six-question <a href="/hair-loss-assessment">hair loss self-assessment</a> can help you describe your pattern before you book.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data data--fit">
          <caption class="sr-only">Situations in which a hairline transplant usually suits, may suit or should wait, with the reason for each — a general guide, not a diagnosis</caption>
          <thead>
            <tr><th scope="col">Your situation</th><th scope="col">Hairline transplant, and why</th></tr>
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
    <p class="body-s mt-4 measure">An earlier hairline that needs correcting is covered on <a href="/hair-transplant-repair-in-rohini">hair transplant repair in Rohini</a>, and a woman’s hairline on <a href="/hair-transplant-for-women-in-rohini">hair transplant for women in Rohini</a>.</p>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'At the Rohini clinic',
    'title'   => 'From Drawing to a Settled Hairline at Rohini',
    'intro'   => 'Consultations, procedures and reviews take place at the Rohini clinic and are carried out by registered medical practitioners.',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a wooden desk', 'title' => 'Assessment and drawing', 'text' => 'History, donor density and medicines first. Then the line is drawn on your forehead, checked in a mirror and adjusted until you both agree; photograph it and look again a week later.'],
        ['img' => 'hero', 'alt' => 'a cross-section of scalp skin with hair follicles and their roots', 'title' => 'Procedure day', 'text' => 'Extraction and sorting under magnification, then single hairs along the edge and larger units behind. A day case under local anaesthetic.'],
        ['img' => 'step-followup', 'alt' => 'a desk calendar with review dates circled', 'title' => 'Healing and reviews', 'text' => 'Crusts and forehead swelling early on; no caps or helmets until cleared. New growth from three to four months, settled at about ten to twelve.'],
    ],
]) ?>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split split--wide-left">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">Hairline Transplant Cost in Rohini: What Decides It</h2>
        <p class="body mt-3 measure">There is no set fee, because the cost follows the line agreed in the mirror. A frontal line alone needs far fewer grafts than a line with temples and density built further back. You receive an itemised written estimate after your assessment, before any date is booked.</p>
        <div class="grid grid--2 mt-5">
          <div class="card"><p class="h4">The drawing</p><p class="meta mt-1">The front line alone, or line and temples</p></div>
          <div class="card"><p class="h4">Density behind it</p><p class="meta mt-1">How far back the line is built up</p></div>
          <div class="card"><p class="h4">Your donor area</p><p class="meta mt-1">What it can give, and what is kept back</p></div>
          <div class="card"><p class="h4">Technique and sessions</p><p class="meta mt-1">FUE, DHI or both; one sitting or two</p></div>
        </div>
        <p class="body-s mt-4 measure">Ask whether any quote is in grafts or hairs, and how the number was reached. The <a href="/hair-transplant-graft-calculator">graft calculator</a> gives a starting range. Instalment options through third-party lenders may be available — ask at the consultation, and read <a href="/cost-and-emi-options">how medical EMI works</a> first.</p>
        <p class="mt-4"><a class="hp-link" href="/hair-transplant-cost-in-rohini">Hair transplant cost in Rohini, worked through <?= hp_icon('arrow', 15, 2) ?></a></p>
      </div>
      <div class="card card--tint card--pad-lg" id="recovering-in-delhi">
        <p class="eyebrow">Choosing your dates</p>
        <h3 class="h3 mt-2">Recovering in Delhi</h3>
        <p class="body-s mt-2">A new hairline faces the city head-on for the first fortnight. General practicalities; your written aftercare comes first.</p>
        <div class="mt-3"><?= ticks([
            'Sun: the front catches it first, so shade the hairline for the first few weeks',
            'Summer sweat: let it dry rather than wiping across the grafts',
            'The smog season: an ear-loop mask, kept from riding up towards the hairline',
            'Helmets drag over the front as they go on, so plan cabs until a review clears one',
        ], false) ?></div>
        <p class="body-s mt-3">More in <a href="/blog/hair-transplant-recovery-in-delhi">hair transplant recovery in Delhi</a>.</p>
      </div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Treatment at the Rohini clinic is carried out by registered medical practitioners. Every doctor at DenceSpot is listed below with their qualifications.',
    '',
    false
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Hairline Transplant in Rohini: Questions Answered</h2>
        <p class="body-s mt-3">General patient education. The right position for your own line is worked out in person, with a pen and a mirror.</p>
        <a class="btn btn--accent mt-4" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= latest_posts_strip('hair-transplant', 3, 'Further Reading') ?>

<?= local_block(
    'Visit Our Rohini Clinic',
    'Hairline consultations, the drawing, the procedure and every follow-up review take place at the Rohini clinic in North-West Delhi, seven days a week.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= lp_cta([
    'eyebrow'   => 'Rohini, Delhi',
    'title'     => 'See Your Hairline Drawn Before You Decide',
    'text'      => 'Come in and have the line marked on your own forehead. You get an honest view of where it belongs at your age, what your donor area can support and whether now is the time, plus a written plan — with no pressure to book a date on the day.',
    'treatment' => 'Hair transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
