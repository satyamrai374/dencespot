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
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'How much does PRP hair treatment cost in Gurgaon?',
     'a' => 'It is priced per session, and what actually matters is the course your diagnosis calls for rather than a single-session figure. Because the course is planned from your assessment, we quote afterwards and give it to you in writing. A per-session price on its own tells you very little about what you will end up spending.'],
    ['q' => 'Why does the per-session price vary so much between clinics?',
     'a' => 'Partly the preparation method and equipment used, partly who performs it, and partly how many sessions a clinic expects to sell. A low per-session rate attached to a large mandatory package is not cheaper than a higher rate on a course you can stop.'],
    ['q' => 'How many sessions will I need?',
     'a' => 'It depends on your diagnosis and how you respond, and it should be reviewed rather than fixed at the start. A clinic that can tell you the exact number before examining you is describing a package, not a plan.'],
    ['q' => 'Should I buy a prepaid package of sessions?',
     'a' => 'We would advise against committing to a large block upfront, and this is the most important thing on this page. PRP does not work for everyone. Prepaying for a fixed number of sessions removes your ability to stop when the photographs show nothing is changing, and it removes the clinic\'s incentive to tell you.'],
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
     'a' => 'They are not alternatives, so the comparison is less useful than it looks. A transplant is a one-off surgical cost that moves permanent hair. PRP is an ongoing supportive cost that maintains hair you still have. Someone with established baldness will not save money by choosing PRP; they will spend money on the wrong treatment.'],
    ['q' => 'Is maintenance an extra cost?',
     'a' => 'Yes, and it should be planned for rather than discovered. PRP does not alter the underlying process of pattern hair loss, so benefit is maintained rather than banked. Ask any clinic what happens after the initial course before you compare their price to anyone else\'s.'],
    ['q' => 'How does GFC pricing compare?',
     'a' => 'GFC is often priced above PRP on the basis that it is a newer preparation. The evidence does not currently establish that it outperforms PRP, so a premium is being charged for a claim rather than a demonstrated advantage. See <a href="/gfc-treatment-in-gurgaon">GFC treatment</a> for the honest comparison.'],
    ['q' => 'Are EMI or payment plans available?',
     'a' => 'Payment options are set out on our <a href="/cost-and-emi-options">cost and EMI options</a> page, and what applies to you is confirmed at consultation.'],
    ['q' => 'What is the cheapest sensible starting point?',
     'a' => 'A consultation. If your hair loss turns out to be driven by iron deficiency or a thyroid problem, treating that is far cheaper than any course of injections and considerably more likely to work. Paying for a diagnosis first is the best value available in this whole category.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair PRP treatment', 'url' => '/hair-prp-treatment-in-gurgaon'],
    ['name' => 'PRP hair treatment cost in Gurgaon'],
];

$page = [
    'title'       => 'PRP Hair Treatment Cost in Gurgaon | DenceSpot',
    'description' => 'What PRP hair treatment costs in Gurgaon and why the per-session price misleads. How to read a quote, and why we advise against large prepaid session packages.',
    'url'         => '/prp-hair-treatment-cost-in-gurgaon',
    'crumbs'      => $crumbs,
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
        <p class="lead mt-3 measure">PRP is sold in this market as blocks of sessions paid for upfront. That is the part worth thinking about before you compare any two prices, because a proportion of patients do not respond, and a prepaid package removes your ability to stop when the photographs say so.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-track="book"><?= icon('calendar', 18) ?> Get a Written Estimate</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Ask on WhatsApp</a>
        </div>

        <?= ticks([
            'Course planned from a diagnosis, not sold as a block',
            'Response photographed, so you can judge it',
            'Stoppable if the images show nothing is changing',
            NAP_LOCALITY . ' · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow"><img src="/assets/img/clinic-equipment.jpg" alt="Centrifuge and preparation equipment used for platelet-rich plasma treatment at DenceSpot Clinic, Gurugram" width="800" height="1000" loading="eager"></div>
        <div class="hero__badge-card">
          <p class="eyebrow">Assessed &amp; performed by</p>
          <p class="h4 mt-2"><?= e(doctor_name()) ?></p>
          <p class="body-s mt-1"><?= e(doctor_credit()) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

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

<section class="section section--canvas" id="packages">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">The main thing to understand</p>
        <h2 class="h2 mt-2">Why Prepaid Session Packages Are the Problem</h2>
        <p class="body-l mt-3 measure">The standard commercial model for PRP is a discounted block of sessions paid for in advance. It looks like value, and for the clinic it is excellent business, because the revenue is banked before anyone knows whether the treatment is working.</p>
        <p class="body-l mt-3 measure">Here is why that matters more for PRP than for most treatments. A proportion of patients do not respond. That is not a criticism of PRP, it is simply true of it, and any honest clinic will tell you so before you start. The correct response to a non-response is to stop and change the plan.</p>
        <p class="body-l mt-3 measure">A prepaid block makes stopping irrational. You have already paid, so you complete the sessions, and the money is spent on a treatment your own photographs suggest is doing nothing. It also removes the clinic's incentive to raise the subject, because there is no further revenue attached to continuing honestly.</p>
        <p class="body-l mt-3 measure">So the useful question when comparing PRP prices is not what a session costs. It is what happens at review if the images show no change, and whether you are financially free to act on that answer.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow">Ask this before paying anything</p>
        <h3 class="h3 mt-2">Four questions</h3>
        <?= ticks([
            'Will you take baseline photographs before we start?',
            'At what point will we review whether it is working?',
            'What happens if the photographs show no change?',
            'Am I committed to sessions I have not yet had?',
        ], false) ?>
        <p class="body-s mt-4">The answers to these tell you considerably more about a clinic than its per-session rate does.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="drivers">
  <div class="wrap">
    <p class="eyebrow">Cost drivers</p>
    <h2 class="h2 mt-2">What Actually Moves the Number</h2>
    <div class="grid grid--3 mt-5">
      <div class="card"><p class="h4">Sessions in the course</p><p class="body-s mt-2">The largest factor by far, and the one that should be planned from your diagnosis and adjusted by your response rather than fixed in advance.</p></div>
      <div class="card"><p class="h4">Area being treated</p><p class="body-s mt-2">A defined thinning patch is a different job from the whole top of the scalp, and the preparation volume differs accordingly.</p></div>
      <div class="card"><p class="h4">Preparation method</p><p class="body-s mt-2">Systems and equipment differ between clinics. It contributes to price, though less than the number of sessions does.</p></div>
      <div class="card"><p class="h4">Who performs it</p><p class="body-s mt-2">Whether you are assessed and treated by a doctor. This is a fair question to ask directly, and the answer should be immediate.</p></div>
      <div class="card"><p class="h4">Review and photography</p><p class="body-s mt-2">Should be included. If they are not, you are buying injections without the means to judge them.</p></div>
      <div class="card"><p class="h4">Maintenance afterwards</p><p class="body-s mt-2">PRP does not stop pattern hair loss, so any benefit needs maintaining. This is a real ongoing cost and belongs in the comparison.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="not-included">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">What the PRP price does not cover</p>
        <h2 class="h2 mt-2">The Separate Costs People Miss</h2>
        <p class="body-l mt-3 measure">PRP is a supportive treatment. In most plans it sits alongside the treatment that actually addresses the diagnosis, and that is a separate line on the estimate rather than something folded into the session price.</p>
        <p class="body-l mt-3 measure">If your assessment identifies a reversible cause — low iron, a thyroid problem, a hormonal condition — treating that is its own cost, and usually a modest one. It is also the single highest-value thing in the whole plan, because correcting an actual cause outperforms supporting a scalp around it.</p>
        <p class="body-l mt-3 measure">And if the assessment shows established baldness rather than thinning, the honest conversation is about <a href="/hair-transplant-in-gurgaon">surgery</a> and its cost, not about a course of injections that will not do what you are hoping.</p>
        <p class="body mt-3 measure">All of this is why the consultation is quoted separately and honestly. It is the appointment that determines whether the rest of the spending makes any sense.</p>
      </div>
      <div>
        <div class="card card--pad-lg">
          <p class="h4">Usually separate</p>
          <?= ticks([
              'Medical treatment for the diagnosis',
              'Investigations, where indicated',
              'Treatment of a reversible cause',
              'Maintenance sessions after the course',
          ], false) ?>
        </div>
        <div class="card card--pad-lg mt-4">
          <p class="h4">Should be included</p>
          <?= ticks([
              'Preparation and the session itself',
              'Baseline and interval photography',
              'The review where response is assessed',
          ], false) ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--ink" id="compare">
  <div class="wrap">
    <p class="eyebrow" style="color:var(--accent)">Comparing clinics</p>
    <h2 class="h2 mt-2" style="color:#fff">Reading a PRP Quote Properly</h2>
    <p class="body-l mt-3" style="color:rgba(255,255,255,.72);max-width:60ch">Two quotes with the same per-session figure can represent completely different arrangements.</p>
    <div class="grid grid--3 mt-6">
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">01</p><p class="h4 mt-2" style="color:#fff">Was a diagnosis made first?</p><p class="body-s mt-2">If nobody established why your hair is falling, you are buying a procedure rather than a treatment, at any price.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">02</p><p class="h4 mt-2" style="color:#fff">Is the course fixed or reviewed?</p><p class="body-s mt-2">A plan adjusts with response. A package does not. This is the difference that decides what you actually spend.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">03</p><p class="h4 mt-2" style="color:#fff">Is photography included?</p><p class="body-s mt-2">Without a baseline you cannot tell whether it worked, and neither can they. It is not an optional extra.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">04</p><p class="h4 mt-2" style="color:#fff">Who performs it?</p><p class="body-s mt-2">Ask by name and qualification who assesses you and who injects. A reasonable question with a quick answer.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">05</p><p class="h4 mt-2" style="color:#fff">What happens after the course?</p><p class="body-s mt-2">Maintenance is an ongoing cost. A quote that ends at session six is not the full picture.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">06</p><p class="h4 mt-2" style="color:#fff">Is GFC being upsold?</p><p class="body-s mt-2">If a premium is being charged on the basis that it outperforms PRP, ask what that claim is based on. See <a href="/gfc-treatment-in-gurgaon" style="color:var(--accent)">GFC treatment</a>.</p></div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Why we will not sell a block of ten sessions upfront: a meaningful proportion of people do not respond to PRP, and the only way to know is to photograph properly and look at month three or four. A patient who has already paid for ten sessions has no reason to stop at four, and the clinic has no financial reason to suggest it. Charging as you go is worse business and it is the only arrangement in which the review conversation can be honest.'
) ?>

<section class="section section--canvas" id="better-value">
  <div class="wrap">
    <p class="eyebrow">Value</p>
    <h2 class="h2 mt-2">The Cheapest Useful Thing You Can Buy</h2>
    <p class="body-l mt-3 measure">A diagnosis. It is worth stating plainly on a cost page, because it is the least glamorous item on any estimate and reliably the highest value.</p>
    <div class="grid grid--3 mt-5">
      <div class="card"><p class="h4">It may point somewhere cheaper</p><p class="body-s mt-2">Hair loss driven by iron deficiency or thyroid disease is treated by correcting that, at a fraction of the cost of any injectable course, and with a considerably better chance of working.</p></div>
      <div class="card"><p class="h4">It may point somewhere else entirely</p><p class="body-s mt-2">Established baldness is not a PRP problem. Spending on injections when the pattern calls for surgery is money spent on the wrong treatment, however competitive the rate.</p></div>
      <div class="card"><p class="h4">It makes the rest measurable</p><p class="body-s mt-2">Baseline photographs and a known diagnosis are what let you judge whether anything you subsequently pay for is doing something. Without them you are buying on faith.</p></div>
    </div>
    <p class="body mt-5 measure">For what PRP actually is and who it suits, see <a href="/hair-prp-treatment-in-gurgaon">hair PRP treatment</a>. For how the diagnosis is reached, see <a href="/hair-fall-treatment-in-gurgaon">hair fall treatment</a> or <a href="/womens-hair-loss-treatment-in-gurgaon">women's hair loss treatment</a>.</p>
  </div>
</section>

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
    'Assessment, treatment and every review happen at our Sector 39 clinic in Gurugram, with the same doctor throughout. Patients travel to us from across Gurugram and neighbouring parts of South Delhi.'
) ?>

<?= cta_band(
    'Get a Diagnosis Before You Get a Quote',
    'Come in and have the cause of your hair loss established first. You may leave with a recommendation that costs considerably less than a course of PRP, and works better. If PRP is right for you, you will get a plan you can stop.',
    'prp-cost',
    ['PRP for hair', 'Comparing PRP quotes', 'Hair loss — not yet diagnosed', 'Not sure — please advise']
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
