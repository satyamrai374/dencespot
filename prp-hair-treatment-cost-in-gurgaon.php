<?php
/**
 * /prp-hair-treatment-cost-in-gurgaon
 *
 * Cost spoke for PRP, mirroring /beard-transplant-cost-gurgaon.
 *
 * Cannibalisation split:
 *   - /hair-prp-treatment-in-gurgaon owns the treatment itself: what PRP is,
 *     candidacy, the course, what it can and cannot do.
 *   - /cost-and-emi-options owns payment mechanics across the clinic.
 *   - THIS page owns the PRP cost question specifically, and its real editorial
 *     job is the prepaid-package problem. PRP is sold in this market as blocks
 *     of six or ten sessions paid upfront, which removes the patient's ability
 *     to stop a treatment that is not working. That is the single most useful
 *     thing to tell someone comparing PRP prices.
 *
 * No prices published, consistent with every other page on the site.
 *
 * 14 Oct 2026: landing-page layout (lp_split / lp_steps / lp_cta). The steps
 * restate how this page already says a course is planned (diagnosis, written
 * course, review with a stop rule) — no new claims. Per the client, this
 * Gurugram page never mentions the Rohini clinic.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'How much does PRP hair treatment cost in Gurgaon?',
     'a' => 'It is priced per session, and what actually matters is the course your diagnosis calls for rather than a single-session figure. Because the course is planned from your assessment, we quote afterwards and give it to you in writing. A per-session price on its own tells you very little about what you will end up spending.'],
    ['q' => 'Why does the per-session price vary so much between clinics?',
     'a' => 'Partly the preparation method and equipment used, partly who performs it, and partly whether the figure is for a single session or part of a package. A low per-session rate attached to a large mandatory package can cost more in total than a higher rate on a course you can stop.'],
    ['q' => 'How many sessions will I need?',
     'a' => 'It depends on your diagnosis and how you respond, and it should be reviewed rather than fixed at the start. A clinic that can tell you the exact number before examining you is describing a package, not a plan.'],
    ['q' => 'Should I buy a prepaid package of sessions?',
     'a' => 'We would advise against committing to a large block upfront, and this is the most important thing on this page. PRP does not work for everyone. Prepaying for a fixed number of sessions removes your ability to stop when the photographs show nothing is changing.'],
    ['q' => 'But packages are cheaper per session. Is that not better value?',
     'a' => 'Only if you would have had all the sessions anyway and they were working. A discounted block that you complete out of obligation rather than response is more expensive than a smaller number of sessions at a higher rate. The discount is real; whether it is value depends on the outcome.'],
    ['q' => 'What should be included in the price?',
     'a' => 'The consultation and assessment that establishes the diagnosis, the preparation and the session itself, baseline and interval photography, and the review where response is actually assessed. Ask specifically whether photography and review are included, because they are the parts that tell you if it is working.'],
    ['q' => 'Is more expensive PRP better?',
     'a' => 'Not reliably. Preparation systems differ and so do the people performing it, but price is a weak proxy for either. What matters more is whether you were properly diagnosed first, whether the person treating you is qualified, and whether the response is being measured against a baseline.'],
    ['q' => 'Does the cost include the treatment for my actual diagnosis?',
     'a' => 'No, and this catches people out. PRP is generally a supportive treatment used alongside the main treatment for pattern hair loss. Medical treatment is a separate cost and is stated separately on your estimate.'],
    ['q' => 'What if it does not work for me?',
     'a' => 'A proportion of patients do not respond, and that is stated before treatment starts rather than after. If interval photographs against your baseline show no change, the plan changes. That is only possible if you have not prepaid for a fixed block.'],
    ['q' => 'How does PRP cost compare with a hair transplant?',
     'a' => 'They are not alternatives, so the comparison is less useful than it looks. A transplant is a surgical cost that relocates follicles which generally persist. PRP is an ongoing supportive cost that maintains hair you still have. Someone with established baldness will not save money by choosing PRP; they will spend money on the wrong treatment.'],
    ['q' => 'Is maintenance an extra cost?',
     'a' => 'Yes, and it should be planned for rather than discovered. PRP does not alter the underlying process of pattern hair loss, so benefit is maintained rather than banked. Ask any clinic what happens after the initial course before you compare their price to anyone else\'s.'],
    ['q' => 'How does GFC pricing compare?',
     'a' => 'GFC is often priced above PRP on the basis that it is a newer preparation. The evidence does not currently establish that it outperforms PRP, so a higher price reflects a claim rather than a demonstrated advantage. See <a href="/gfc-treatment-in-gurgaon">GFC treatment</a> for the comparison.'],
    ['q' => 'Are EMI or payment plans available?',
     'a' => 'Payment options are set out on our <a href="/cost-and-emi-options">cost and EMI options</a> page, and what applies to you is confirmed at consultation.'],
    ['q' => 'What is the sensible starting point?',
     'a' => 'A diagnosis. If your hair loss turns out to be driven by iron deficiency or a thyroid problem, treating that usually costs far less than a course of injections and addresses the cause directly. Establishing the cause first is what makes any later spending make sense.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair PRP treatment', 'url' => '/hair-prp-treatment-in-gurgaon'],
    ['name' => 'PRP hair treatment cost in Gurgaon'],
];

$page = [
    'title'       => 'PRP Hair Treatment Cost in Gurgaon: Per Session & Course',
    'description' => 'PRP hair treatment cost in Gurgaon: what changes the estimate per session and per course, adding GFC or microneedling, maintenance and prepaid packages.',
    'url'         => '/prp-hair-treatment-cost-in-gurgaon',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-prp-768.webp',
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_faq('/prp-hair-treatment-cost-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">PRP hair treatment cost in Gurgaon</span>
        <h1 class="h1 mt-3">What PRP Costs, and Why the Per-Session Price Misleads</h1>
        <p class="lead mt-3 measure">PRP is often sold as blocks of sessions paid for upfront. That is the part worth thinking about before you compare any two prices, because a proportion of patients do not respond, and a prepaid package removes your ability to stop when the photographs say so.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-treatment="Hair PRP / GFC" data-track="book"><?= icon('calendar', 18) ?> Get a Written Estimate</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Ask on WhatsApp</a>
        </div>

        <?= ticks([
            'Course planned from a diagnosis, not sold as a block',
            'Response photographed, so you can judge it',
            'Stoppable if the images show nothing is changing',
            'Consultations at our Sector 39, Gurugram clinic',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-prp-768.webp" srcset="/assets/img/services/svc-prp-512.webp 512w, /assets/img/services/svc-prp-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a capped tube of golden plasma standing on a white tray beside a syringe" width="768" height="960" loading="eager" fetchpriority="high">
          <?= hp_ai_chip('AI-generated illustration') ?>
        </div>
        <?= hero_review_badge() ?>
      </div>
    </div>
  </div>
</section>

<?= lead_strip() ?>

<section class="trust">
  <div class="wrap">
    <div class="grid grid--5">
      <div class="card"><?= icon('doc', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Diagnosis before quoting</p><p class="body-s mt-2">Sometimes the answer is a cheaper treatment.</p></div>
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Photography included</p><p class="body-s mt-2">You can see whether it is working.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">No large prepaid blocks</p><p class="body-s mt-2">A course you can stop is worth more than a discount.</p></div>
      <div class="card"><?= icon('rupee', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Itemised in writing</p><p class="body-s mt-2">Including what is not included.</p></div>
      <div class="card"><?= icon('info', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Maintenance stated upfront</p><p class="body-s mt-2">The cost after the course, not a surprise.</p></div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-followup',
    'alt'     => 'a desk calendar with several days circled in green, beside a small potted succulent and a pen on a wooden desk',
    'eyebrow' => 'The main thing to understand',
    'title'   => 'Why Prepaid Session Packages Are the Problem',
    'id'      => 'packages',
    'html'    => '<p>A common way PRP is sold is a discounted block of sessions paid for upfront. It can look like value, but the money is committed before anyone knows whether the treatment is working for you.</p>'
               . '<p>That matters more for PRP than for most treatments, because a proportion of patients do not respond — not a criticism of PRP, simply true of it, and you should be told so before you start. The correct response to a non-response is to stop and change the plan; a prepaid block makes stopping harder, so the money is spent on sessions your own photographs suggest are doing nothing.</p>'
               . '<p>So the useful question is not what a session costs, but what happens at review if the images show no change, and whether you are financially free to act on the answer. Ask these four before paying anything — the answers tell you considerably more about a clinic than its per-session rate does:</p>',
    'points'  => [
        'Will you take baseline photographs before we start?',
        'At what point will we review whether it is working?',
        'What happens if the photographs show no change?',
        'Am I committed to sessions I have not yet had?',
    ],
]) ?>

<?= lp_steps([
    'eyebrow' => 'How a course is planned',
    'title'   => 'From Diagnosis to a Course You Can Stop',
    'id'      => 'course-steps',
    'intro'   => 'A plan adjusts with your response; a package does not.',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                 'title' => 'Diagnosis first',                    'text' => 'The cause of your hair loss is established before anything is quoted. Sometimes the answer is a cheaper treatment, such as correcting low iron or a thyroid problem.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned line', 'title' => 'A course quoted in writing',         'text' => 'Sessions planned from your diagnosis, itemised — including what is not included — with maintenance stated upfront.'],
        ['img' => 'step-procedure',    'alt' => 'sterile instruments laid out on a tray',              'title' => 'Sessions, photographed and reviewed', 'text' => 'Response is judged against baseline photographs. If nothing is changing, the course is adjusted or stopped, with no large prepaid block in the way.'],
    ],
]) ?>

<section class="section section--white" id="drivers">
  <div class="wrap">
    <p class="eyebrow">Cost drivers</p>
    <h2 class="h2 mt-2">What Actually Moves the Number</h2>
    <div class="grid grid--3 mt-5">
      <div class="card"><p class="h4">Sessions in the course</p><p class="body-s mt-2">The largest factor by far, and the one that should be planned from your diagnosis and adjusted by your response rather than fixed at the start.</p></div>
      <div class="card"><p class="h4">Area being treated</p><p class="body-s mt-2">A defined thinning patch is a different job from the whole top of the scalp, and the preparation volume differs accordingly.</p></div>
      <div class="card"><p class="h4">Preparation method</p><p class="body-s mt-2">Systems and equipment differ between clinics. It contributes to price, though less than the number of sessions does.</p></div>
      <div class="card"><p class="h4">Who performs it</p><p class="body-s mt-2">Whether you are assessed and treated by a doctor. This is a fair question to ask directly, and the answer should be immediate.</p></div>
      <div class="card"><p class="h4">Review and photography</p><p class="body-s mt-2">Should be included. If they are not, you are buying injections without the means to judge them.</p></div>
      <div class="card"><p class="h4">Maintenance afterwards</p><p class="body-s mt-2">PRP does not stop pattern hair loss, so any benefit needs maintaining. This is a real ongoing cost and belongs in the comparison.</p></div>
    </div>
  </div>
</section>

<?php
$costFactors = [
    ['Sessions in the first course', 'Usually the largest part. The estimate grows with each planned session, so a course reviewed after the first few sessions can be shortened or stopped if nothing is changing.'],
    ['A prepaid block of sessions', 'Lowers the figure per session, but commits the whole total before anyone knows whether PRP is working for you.'],
    ['Switching to GFC, or adding it', 'GFC is often priced above PRP as a newer preparation, which raises the per-session figure. The evidence does not show that it does more.'],
    ['Adding microneedling', 'Where PRP is applied to the scalp straight after microneedling, the needling is an extra step and is costed with the session.'],
    ['Medical treatment alongside', 'A separate line. Treatment for the diagnosis itself is not part of the session price.'],
    ['Investigations', 'Separate, and only where your history calls for them. They can lower the total by pointing to a cheaper treatment for a reversible cause.'],
    ['Review and photography', 'Should be part of the course. If a quote lists them as extras, add them in before comparing totals.'],
    ['Maintenance after the course', 'An ongoing cost, because PRP does not stop pattern hair loss. Ask what maintenance would cost over a year before comparing any two quotes.'],
];
?>
<section class="section section--canvas" id="estimate">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Factor by factor</p>
      <h2 class="h2 mt-2">PRP Hair Treatment Cost: What Raises or Lowers the Estimate</h2>
      <p class="body mt-3">No figure is published here, because your estimate follows the assessment and is given in writing. What can be shown is how each choice moves the total, so that you can read any quote, ours included.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data data--fit">
          <caption class="sr-only">How each factor changes the estimate for a course of PRP hair treatment: sessions, prepaid blocks, adding GFC or microneedling, medical treatment, investigations, review and maintenance. General guidance, not a quote.</caption>
          <thead><tr><th scope="col">Cost factor</th><th scope="col">How it changes the estimate</th></tr></thead>
          <tbody>
            <?php foreach ($costFactors as $r): ?>
            <tr><th scope="row" style="white-space:normal;width:38%"><?= e($r[0]) ?></th><td><?= e($r[1]) ?></td></tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">The add-ons are explained on their own pages: <a href="/hair-microneedling-in-gurgaon">hair microneedling in Gurgaon</a> and <a href="/gfc-treatment-in-gurgaon">GFC treatment in Gurgaon</a>. Before paying for any course, read <a href="/blog/what-to-ask-before-prp-in-gurgaon">the questions to ask before paying for PRP in Gurgaon</a>. If the cause of your thinning is not yet known, the <a href="/hair-loss-assessment">six-question hair loss self-assessment</a> suggests a next step.</p>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-hair-fall',
    'alt'     => 'a wooden comb with a few shed hairs resting on folded linen towels by a window',
    'eyebrow' => 'What the PRP price does not cover',
    'title'   => 'The Separate Costs People Miss',
    'id'      => 'not-included',
    'tone'    => 'white',
    'reverse' => true,
    'html'    => '<p>PRP is a supportive treatment. In most plans it sits alongside the treatment that actually addresses the diagnosis, and that is a separate line on the estimate rather than something folded into the session price.</p>'
               . '<p>If your assessment identifies a reversible cause — low iron, a thyroid problem, a hormonal condition — treating it is its own cost, usually a modest one, and often the most important part of the plan. If it shows established baldness rather than thinning, the honest conversation is about <a href="/hair-transplant-in-gurgaon">surgery</a> and its cost, not a course of injections that will not do what you are hoping.</p>'
               . '<p>That is why the consultation is quoted separately: it determines whether the rest of the spending makes sense. A PRP price should include the preparation and the session itself, baseline and interval photography, and the review where response is assessed. Usually separate:</p>',
    'points'  => [
        'Medical treatment for the diagnosis',
        'Investigations, where indicated',
        'Treatment of a reversible cause',
        'Maintenance sessions after the course',
    ],
]) ?>

<section class="section section--ink" id="compare">
  <div class="wrap">
    <p class="eyebrow">Comparing clinics</p>
    <h2 class="h2 mt-2">Reading a PRP Quote Properly</h2>
    <p class="body-l mt-3" style="max-width:60ch">Two quotes with the same per-session figure can represent completely different arrangements.</p>
    <div class="grid grid--3 mt-6">
      <div class="card card--ink"><p class="eyebrow">01</p><p class="h4 mt-2">Was a diagnosis made first?</p><p class="body-s mt-2">If nobody established why your hair is falling, you are buying a procedure rather than a treatment, at any price.</p></div>
      <div class="card card--ink"><p class="eyebrow">02</p><p class="h4 mt-2">Is the course fixed or reviewed?</p><p class="body-s mt-2">A plan adjusts with response. A package does not. This is the difference that decides what you actually spend.</p></div>
      <div class="card card--ink"><p class="eyebrow">03</p><p class="h4 mt-2">Is photography included?</p><p class="body-s mt-2">Without a baseline you cannot tell whether it worked, and neither can they. It is not an optional extra.</p></div>
      <div class="card card--ink"><p class="eyebrow">04</p><p class="h4 mt-2">Who performs it?</p><p class="body-s mt-2">Ask by name and qualification who assesses you and who injects. A reasonable question with a quick answer.</p></div>
      <div class="card card--ink"><p class="eyebrow">05</p><p class="h4 mt-2">What happens after the course?</p><p class="body-s mt-2">Maintenance is an ongoing cost. A quote that ends at session six is not the full picture.</p></div>
      <div class="card card--ink"><p class="eyebrow">06</p><p class="h4 mt-2">Is GFC priced higher?</p><p class="body-s mt-2">If a premium is being charged on the basis that it outperforms PRP, ask what that claim is based on. See <a href="/gfc-treatment-in-gurgaon" style="color:var(--accent-on-dark)">GFC treatment</a>.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="better-value">
  <div class="wrap">
    <p class="eyebrow">Value</p>
    <h2 class="h2 mt-2">Why a Diagnosis Comes Before Any Course</h2>
    <p class="body-l mt-3 measure">It is worth stating plainly on a cost page: the diagnosis is the least glamorous item on any estimate, and often the one that decides whether anything else is worth paying for.</p>
    <div class="grid grid--3 mt-5">
      <div class="card"><p class="h4">It may point somewhere cheaper</p><p class="body-s mt-2">Hair loss driven by iron deficiency or thyroid disease is treated by correcting that, usually at a fraction of the cost of an injectable course, and in a way that addresses the cause.</p></div>
      <div class="card"><p class="h4">It may point somewhere else entirely</p><p class="body-s mt-2">Established baldness is not a PRP problem. Spending on injections when the pattern calls for surgery is money spent on the wrong treatment, however competitive the rate.</p></div>
      <div class="card"><p class="h4">It makes the rest measurable</p><p class="body-s mt-2">Baseline photographs and a known diagnosis are what let you judge whether anything you subsequently pay for is doing something. Without them you are buying on faith.</p></div>
    </div>
    <p class="body mt-5 measure">For what PRP actually is and who it suits, see <a href="/hair-prp-treatment-in-gurgaon">hair PRP treatment</a>. For how the diagnosis is reached, see <a href="/hair-fall-treatment-in-gurgaon">hair fall treatment</a> or <a href="/womens-hair-loss-treatment-in-gurgaon">women's hair loss treatment</a>.</p>
  </div>
</section>

<?= doctor_block(
    'Consultations and procedures are carried out by registered medical practitioners at the clinic. Response to PRP is reviewed against baseline photographs, and the course is adjusted or stopped where there is no change.'
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">PRP Cost FAQs</h2>
        <p class="body-s mt-3">Answers are general guidance. Your own course and estimate come from your assessment and are given to you in writing.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'PRP Assessment and Estimates at Our Gurgaon Clinic',
    'Our Gurugram clinic is in Sector 39, ' . NAP_LANDMARK . '. Consultations and procedures are carried out by registered medical practitioners at the clinic, and PRP estimates are given in writing after assessment.'
) ?>

<?= lp_cta([
    'eyebrow'   => 'Sector 39, Gurugram',
    'title'     => 'Get a Diagnosis Before You Get a Quote',
    'text'      => 'Come in and have the cause of your hair loss established first. The right recommendation may cost less than a course of PRP. If PRP is appropriate for you, the course is planned so that it can be stopped.',
    'treatment' => 'Hair PRP / GFC',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
