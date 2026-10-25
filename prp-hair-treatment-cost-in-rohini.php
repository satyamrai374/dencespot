<?php
/**
 * /prp-hair-treatment-cost-in-rohini — PRP cost guide for the Rohini (Delhi) clinic.
 *
 * Built 14 Oct 2026 (SEO round 2, COMPETITOR-SEO.md §6.2). Owns the PRP cost
 * question for Rohini; /hair-prp-treatment-in-rohini owns the treatment
 * itself, /cost-and-emi-options the payment mechanics.
 *
 * No prices, no device or kit names, no market table: the clinic has not
 * supplied a fee schedule and no Delhi market survey has been done. Course
 * facts (three or four sessions about four weeks apart, maintenance every
 * three to six months if responding, review at three to six months, 30–60
 * minutes per session) are the ones already on /hair-prp-treatment-in-rohini.
 *
 * Rohini page: never mentions the Gurugram clinic and never links a URL
 * containing "gurgaon" (client rule, 14 Oct 2026). Not reviewed by the
 * clinic's doctor: doctor_block(..., false), no review byline, not in
 * MEDICAL_PAGES. Landing-page layout from includes/home-components.php.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/** How a course reaches the estimate, phase by phase — general guidance, no money. */
$phases = [
    ['phase' => 'Assessment',     'what' => 'History, scalp examination under magnification, and blood tests if your history points to them', 'cost' => 'Listed on the estimate, with any tests named'],
    ['phase' => 'Initial course', 'what' => 'Commonly three or four sessions, about four weeks apart',                                       'cost' => 'Number of sessions × the per-session price'],
    ['phase' => 'Review',         'what' => 'Photographs compared with your baseline at three to six months',                                'cost' => 'Should sit inside the course price — ask'],
    ['phase' => 'Maintenance',    'what' => 'Commonly every three to six months, and only if there has been a response',                     'cost' => 'A later, ongoing cost, stated at the start'],
    ['phase' => 'Medication',     'what' => 'Often used alongside PRP for pattern hair loss',                                                 'cost' => 'A separate line on the estimate'],
];

$faqs = [
    ['q' => 'How much does PRP hair treatment cost in Rohini?',
     'a' => 'PRP is priced per session, but what you spend depends on the course your diagnosis calls for, whether maintenance follows, and what is charged separately. The course is planned at an assessment at the Rohini clinic and quoted afterwards, itemised and in writing.'],
    ['q' => 'Should I compare the price of one session or of the whole course?',
     'a' => 'The whole course. A single-session figure is the number most often advertised and the least useful on its own. Ask any clinic for both, in writing: the price of one session and the cost of the course it recommends, including what happens at the review.'],
    ['q' => 'How many PRP sessions will I need?',
     'a' => 'An initial course is commonly three or four sessions about four weeks apart, followed by maintenance every three to six months only if there has been a response. Your own number is set at the assessment, written into your plan and reviewed as you go, so it is not fixed at the start.'],
    ['q' => 'Why do PRP prices differ so much between clinics?',
     'a' => 'Partly the preparation method, partly who performs it, and partly whether the figure is a single session or part of a package. A lower per-session price attached to a large prepaid block can cost more in total than a higher price on a course you can stop.'],
    ['q' => 'Should I buy a prepaid package of sessions?',
     'a' => 'Be cautious about committing to a large block upfront. A proportion of people do not respond to PRP, and nobody can say beforehand who they will be. Paying for sessions you have not yet had makes it harder to stop when the review photographs show no change.'],
    ['q' => 'Does GFC cost more than PRP?',
     'a' => 'GFC is often priced higher. It is prepared differently — the growth factors are released before injection and the cells removed — but its evidence is smaller and newer than PRP’s, and it has not been shown to give a better result. A higher price reflects the preparation, not a demonstrated advantage. See <a href="/gfc-treatment-in-rohini">GFC treatment in Rohini</a>.'],
    ['q' => 'What should the price of a PRP course include?',
     'a' => 'The preparation and each session, baseline photographs before the first session, interval photographs at the same angles and lighting, and the review where your response is judged. Ask specifically about photography and review, because they are what tell you whether the treatment is working.'],
    ['q' => 'What is usually charged separately?',
     'a' => 'Medical treatment for the underlying diagnosis, blood tests where your history points to them, treatment of a reversible cause such as low iron or a thyroid problem, and maintenance sessions after the initial course. Each should be a named line on the estimate.'],
    ['q' => 'Will I need blood tests first?',
     'a' => 'Only if your history points to them. They usually cover iron stores, thyroid function, vitamin levels and a platelet count, with hormonal tests for some women. Correcting a cause they find can matter more than any injection. See <a href="/blog/blood-tests-for-hair-fall">which blood tests matter for hair fall</a>.'],
    ['q' => 'What happens if PRP does not work for me?',
     'a' => 'If the review photographs show no change against your baseline, the course stops and the plan changes, rather than more sessions being added. That is only straightforward if you have not prepaid for sessions you have not yet had.'],
    ['q' => 'Is maintenance an extra cost?',
     'a' => 'Yes, and it belongs in the comparison from the start. PRP does not switch off pattern hair loss, so any benefit has to be maintained, usually with medication as well. Ask any clinic what happens after the initial course before comparing prices.'],
    ['q' => 'Is PRP a cheaper alternative to a hair transplant?',
     'a' => 'They do different jobs, so the comparison misleads. PRP may support follicles that are still present; a transplant moves follicles into areas where they have gone. On a bald, smooth scalp, PRP has nothing to support. See <a href="/blog/prp-or-hair-transplant">PRP or a hair transplant</a> and <a href="/hair-transplant-cost-in-rohini">hair transplant cost in Rohini</a>.'],
    ['q' => 'Is EMI available for PRP treatment?',
     'a' => 'Instalment options through third-party lenders may be available — ask at the consultation. The lender sets the interest, tenure and eligibility, not the clinic, so ask for the total payable compared with paying as you go. <a href="/cost-and-emi-options">Cost, EMI and payment options</a> explains what to check.'],
    ['q' => 'How long does a session take, and is it done in Rohini?',
     'a' => 'Usually 30 to 60 minutes, and most people return to work the same day. The assessment, every session and each review take place at the Rohini clinic in North-West Delhi, open ' . e(HOURS_DISPLAY) . ' (' . e(HOURS_NOTE) . '). See <a href="/delhi-clinic">directions to the Rohini clinic</a>.'],
    ['q' => 'Can I send photographs on WhatsApp before booking?',
     'a' => 'Yes, to ask whether an assessment is worth booking. Telling pattern thinning from shedding or a scalp condition needs an examination under magnification, so the course and the written estimate follow the visit.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'PRP Hair Treatment Cost in Rohini'],
];

$page = [
    'title'         => 'PRP Hair Treatment Cost in Rohini, Delhi (2026) | DenceSpot',
    'description'   => 'PRP hair treatment cost in Rohini, Delhi: course vs single-session price, sessions, PRP vs GFC, prepaid packages and what a written estimate should include.',
    'url'           => '/prp-hair-treatment-cost-in-rohini',
    'crumbs'        => $crumbs,
    'preload_image' => '/assets/img/services/svc-prp-768.webp',
    'schema'        => [
        schema_delhi_clinic(),
        schema_breadcrumbs($crumbs),
        schema_faq('/prp-hair-treatment-cost-in-rohini', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Cost guide · Rohini, Delhi</span>
        <h1 class="h1 mt-3">PRP Hair Treatment Cost in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">PRP is priced by the session, but what you spend is decided by the course: how many sessions your diagnosis calls for, whether you can stop when the photographs show no change, and what sits outside the session price. This guide takes each in turn, for a course assessed and carried out at our Rohini clinic in North-West Delhi.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/delhi-clinic#book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Hair PRP / GFC" data-track="book"><?= icon('calendar', 18) ?> Get a Written Estimate</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp the Rohini Clinic</a>
        </div>

        <?= ticks([
            'Cause of the thinning established before a quote',
            'The whole course quoted in writing',
            'Response judged against baseline photographs',
            'Assessment, sessions and reviews in Rohini',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-prp-768.webp" srcset="/assets/img/services/svc-prp-512.webp 512w, /assets/img/services/svc-prp-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a capped tube of golden plasma standing on a white tray beside a syringe" width="768" height="960" loading="eager" fetchpriority="high">
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
    'alt'     => 'a sculpted cross-section of scalp skin showing hair follicles beneath the surface',
    'eyebrow' => 'Session or course',
    'title'   => 'Single Session or Whole Course: Which Number Matters',
    'id'      => 'course-vs-session',
    'html'    => '<p>A single-session price is the figure most often advertised and the least informative on its own. The number that decides your spend is the course: the sessions in the initial phase, any maintenance afterwards, and the items quoted separately.</p>'
               . '<p>As general guidance, an initial course is commonly three or four sessions about four weeks apart, with maintenance every three to six months only where there has been a response. Your own number is set at the assessment and reviewed as you go. What PRP is, and who it may help, is covered on <a href="/hair-prp-treatment-in-rohini">hair PRP and GFC treatment in Rohini</a>.</p>',
    'points'  => [
        'Initial course: sessions × the per-session price',
        'Maintenance: only if the review shows a response',
        'Separate lines: medication, tests where needed, any reversible cause',
    ],
]) ?>

<section class="section section--canvas" id="cost-factors">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Cost factors</p>
      <h2 class="h2 mt-2">What Changes the Cost of a PRP Course</h2>
      <p class="body mt-3">A course reaches the estimate in stages. The table follows one through; the cards below cover what makes one clinic’s figure differ from another’s.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data">
          <caption class="sr-only">How a PRP hair treatment course reaches the estimate, phase by phase — general guidance, not a quote</caption>
          <thead>
            <tr><th scope="col">Phase</th><th scope="col">What it involves</th><th scope="col">How it reaches the estimate</th></tr>
          </thead>
          <tbody>
            <?php foreach ($phases as $p): ?>
            <tr>
              <th scope="row" style="color:var(--ink);font-size:15px;font-weight:700;text-transform:none;letter-spacing:0"><?= e($p['phase']) ?></th>
              <td><?= e($p['what']) ?></td>
              <td style="font-weight:600;color:var(--ink)"><?= e($p['cost']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="grid grid--4 mt-5">
      <div class="card"><?= icon('list', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Sessions in the course</h3><p class="body-s mt-2">The largest factor by far, planned from your diagnosis and adjusted by your response.</p></div>
      <div class="card"><?= icon('settings', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Preparation method</h3><p class="body-s mt-2">How the blood is processed varies between clinics. It affects price, though less than the number of sessions does.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Area treated</h3><p class="body-s mt-2">A small crown area needs less preparation than a broad thinning zone across the top of the scalp.</p></div>
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Who performs it</h3><p class="body-s mt-2">Whether a doctor assesses and treats you. A fair question for any clinic, with a quick answer.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="prp-vs-gfc">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">PRP or GFC</p>
      <h2 class="h2 mt-2">PRP vs GFC: How the Choice Affects the Price</h2>
      <p class="body mt-3">Both start with a small blood sample taken at the clinic. What differs is the preparation and what goes into the syringe — and, often, the price.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data">
          <caption class="sr-only">PRP and GFC hair treatment compared on preparation, evidence and price</caption>
          <thead>
            <tr><th scope="col">Factor</th><th scope="col">PRP</th><th scope="col">GFC</th></tr>
          </thead>
          <tbody>
            <tr><th scope="row" style="color:var(--ink);text-transform:none;letter-spacing:0;white-space:normal">Preparation</th><td>Blood is spun so the platelet-rich plasma separates</td><td>Growth factors are released from the platelets and the cells filtered out</td></tr>
            <tr><th scope="row" style="color:var(--ink);text-transform:none;letter-spacing:0;white-space:normal">What is injected</th><td>Plasma with concentrated platelets</td><td>The growth-factor concentrate only</td></tr>
            <tr><th scope="row" style="color:var(--ink);text-transform:none;letter-spacing:0;white-space:normal">Evidence</th><td>The more studied; trials mostly small and short</td><td>Smaller and newer</td></tr>
            <tr><th scope="row" style="color:var(--ink);text-transform:none;letter-spacing:0;white-space:normal">Price</th><td>The usual reference point</td><td>Often priced higher, without evidence of a better result</td></tr>
            <tr><th scope="row" style="color:var(--ink);text-transform:none;letter-spacing:0;white-space:normal">Review</th><td>Judged against baseline photographs</td><td>The same review applies</td></tr>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">If a higher price is being asked on the basis that one preparation works better, ask what that is based on. More on <a href="/gfc-treatment-in-rohini">GFC treatment in Rohini</a> and in <a href="/blog/prp-vs-gfc-vs-exosomes">PRP vs GFC vs exosomes</a>.</p>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'At the Rohini clinic',
    'title'   => 'How a PRP Course Is Planned and Priced',
    'id'      => 'course-steps',
    'intro'   => 'The quote follows a diagnosis, and the course follows your response.',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',             'title' => 'Find the cause first',           'text' => 'Magnification separates pattern thinning from shedding, patchy loss or a scalp condition. Some causes are treated more simply another way.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram on a desk',        'title' => 'Baseline and a written course',  'text' => 'Photographs at fixed angles and lighting, then a written plan naming PRP or GFC, the sessions and the cost of the whole course.'],
        ['img' => 'step-procedure',    'alt' => 'sterile instruments laid out on a tray',           'title' => 'Sessions at planned intervals',  'text' => 'Usually 30 to 60 minutes each. Keeping to the planned spacing makes the review a fairer test.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with review dates circled',        'title' => 'Review, then continue or stop',  'text' => 'At three to six months the photographs are set beside the baseline before any further session is paid for.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-hair-fall',
    'alt'     => 'a wooden comb resting on folded white towels',
    'eyebrow' => 'Packages',
    'title'   => 'Prepaid Packages, and Why a Course You Can Stop Matters',
    'id'      => 'packages',
    'reverse' => true,
    'html'    => '<p>PRP is often sold as a block of sessions paid for upfront, at a lower price per session than paying as you go. That arithmetic only works if every session turns out to be needed and the treatment is working.</p>'
               . '<p>A proportion of people do not respond, and nobody can tell beforehand who they will be. When the review photographs show no change, the sensible step is to stop or change the plan. A prepaid block makes that harder: the money is spent, and the remaining sessions tend to be used out of obligation rather than response.</p>'
               . '<p>Before paying for more than the next session or two, ask:</p>',
    'points'  => [
        'When will the first review against baseline photographs be?',
        'What happens to the plan if the photographs show no change?',
        'Am I paying now for sessions I have not yet had?',
        'Is any unused balance refundable, and on what terms?',
    ],
    'link'    => ['url' => '/blog/prp-vs-gfc-vs-exosomes#questions-before-buying-a-package', 'label' => 'Questions to ask before buying a package'],
]) ?>

<section class="section section--canvas" id="estimate">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">What you pay for</p>
      <h2 class="h2 mt-2">What a PRP Estimate Should Include</h2>
      <p class="body mt-3">PRP is a supportive treatment. In most plans it sits beside the treatment for the diagnosis itself, which is why a clear estimate separates the two.</p>
    </div>
    <div class="grid grid--2 mt-5">
      <div class="card card--pad-lg">
        <h3 class="h4">Should be inside the course price</h3>
        <div class="mt-3"><?= ticks([
            'The preparation and each injection session',
            'Baseline photographs before the first session',
            'Interval photographs at the same angles and lighting',
            'The review where your response is judged',
        ], false) ?></div>
      </div>
      <div class="card card--dashed card--pad-lg">
        <h3 class="h4">Usually listed separately</h3>
        <div class="mt-3"><?= ticks([
            'Medical treatment for the underlying diagnosis',
            'Blood tests, where your history points to them',
            'Treatment of a reversible cause, such as low iron',
            'Maintenance sessions after the initial course',
        ], false) ?></div>
      </div>
    </div>
    <div class="grid grid--2 mt-4">
      <div class="note"><p class="h4">Medication alongside</p><p class="body-s mt-2">Minoxidil, and finasteride in men, are better studied than PRP but neither is a cure, and both have side effects to discuss first. They are a separate, ongoing cost; see <a href="/blog/minoxidil-and-finasteride-in-india">minoxidil and finasteride</a>.</p></div>
      <div class="note"><p class="h4">Paying in instalments</p><p class="body-s mt-2">Instalment options through third-party lenders may be available — ask at the consultation. The lender sets the terms, so ask for the total payable. See <a href="/cost-and-emi-options">cost, EMI and payment options</a>.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="review">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Review against baseline photographs</p>
      <h2 class="h2 mt-2">What the Review Means for What You Spend</h2>
      <p class="body mt-3">Without baseline photographs, neither you nor the clinic can tell whether the money is doing anything. That is why photography belongs inside the price. A general picture, not a promise: results vary between people.</p>
    </div>
    <div class="grid grid--4 mt-5">
      <div class="card"><span class="pill">6–10 weeks</span><h3 class="h4 mt-3">Perhaps less shedding</h3><p class="body-s mt-2">Often the first change noticed, and too early to decide whether to continue.</p></div>
      <div class="card"><span class="pill">3–6 months</span><h3 class="h4 mt-3">The review</h3><p class="body-s mt-2">Density and visible scalp set beside the baseline, under the same angles and lighting.</p></div>
      <div class="card"><span class="pill">No change</span><h3 class="h4 mt-3">Stop spending</h3><p class="body-s mt-2">The course ends and the plan changes; further sessions are not bought.</p></div>
      <div class="card"><span class="pill pill--ink">Responding</span><h3 class="h4 mt-3">Budget for maintenance</h3><p class="body-s mt-2">Sessions commonly every three to six months, usually with medication alongside.</p></div>
    </div>
    <p class="body mt-5 measure">For what the trials do and do not show, see <a href="/blog/does-prp-work-for-hair-loss">does PRP work for hair loss</a>. If the assessment points to shedding or a nutritional cause rather than pattern thinning, <a href="/hair-fall-treatment-in-rohini">hair fall treatment in Rohini</a> or <a href="/womens-hair-loss-treatment-in-rohini">women’s hair loss treatment in Rohini</a> may be the place to start, and the <a href="/hair-loss-assessment">hair loss self-assessment</a> helps you describe the pattern before a visit.</p>
  </div>
</section>

<?= doctor_block(
    'Assessments and PRP sessions at the Rohini clinic are carried out by registered medical practitioners. Every doctor at DenceSpot is listed below with their qualifications.',
    '',
    false
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">PRP Cost in Rohini: Questions Answered</h2>
        <p class="body-s mt-3">General guidance. Your own course and estimate come from your assessment and are given to you in writing.</p>
        <a class="btn btn--accent mt-4" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask the Rohini Clinic</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= latest_posts_strip('prp', 3, 'Further Reading') ?>

<?= local_block(
    'Visit Our Rohini Clinic',
    'PRP and GFC assessments, sessions and reviews take place at the Rohini clinic in North-West Delhi, near the Outer Ring Road. A course and its maintenance can mean several visits over a year, so a clinic within easy reach makes the planned intervals easier to keep.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= lp_cta([
    'eyebrow'   => 'Rohini, Delhi',
    'title'     => 'Get a Diagnosis and a Written PRP Estimate',
    'text'      => 'Book an assessment at the Rohini clinic. The cause of your thinning is checked first, and if PRP or GFC suits you, the whole course is quoted in writing and planned so that it can be stopped at review.',
    'treatment' => 'Hair PRP / GFC',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
