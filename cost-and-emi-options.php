<?php
/**
 * /cost-and-emi-options — Phase 1, COMPETITOR-STRATEGY §4.
 *
 * Linked from the footer of every page on the site, so while it 404s all 29
 * pages link into a dead end. Clearing it is the single highest-leverage
 * internal-link fix available.
 *
 * Positioning note: DHI and several Gurgaon competitors lead with "50% off"
 * and "pay ₹1000 at clinic" promotions. The differentiator here is the
 * opposite — explain how medical EMI actually works, including the parts a
 * clinic normally leaves the finance provider to disclose. Transparency is
 * the wedge; see COMPETITOR-STRATEGY §3.
 *
 * ⚠ NOTHING FINANCIAL IS INVENTED. Provider names, tenures, interest rates,
 * processing fees and the deposit policy are all still unsigned-off. Until the clinic
 * supplies them. Publishing a wrong finance term is not an SEO problem, it is
 * a consumer-protection one.
 *
 * 14 Oct 2026 — landing-page layout: AI-illustrated hero, "figure in writing
 * first" as lp_steps, the lender and card-EMI sections as lp_split and an
 * lp_cta close, each image with its visible AI label. Presents both clinics.
 *
 * SEO round 4 (14 Oct 2026): 14 FAQs (how third-party EMI works, documents,
 * credit checks, the loan agreement, a declined application, paying in
 * parts), a "How third-party EMI generally works" section, a "Questions to
 * ask before signing an EMI plan" list and links to all six cost guides. No
 * lender names, rates, fees or deposit terms: none has been supplied. The
 * literal "no-cost"/"0% EMI"/"50% off" wording is gone; the education stays.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/** ⚠ Replace with the payment methods the clinic actually accepts. */
$methods = [
    ['method' => 'UPI',                     'note' => 'Accepted at the clinic',                       'status' => 'confirm'],
    ['method' => 'Debit / credit card',     'note' => 'Accepted at the clinic',                       'status' => 'confirm'],
    ['method' => 'Bank transfer / NEFT',    'note' => 'Accepted at the clinic',                       'status' => 'confirm'],
    ['method' => 'Cash',                    'note' => 'Subject to statutory limits',                  'status' => 'confirm'],
    ['method' => 'Card EMI',                'note' => 'Through your own bank, on an eligible card',   'status' => 'confirm'],
    ['method' => 'Third-party medical loan','note' => 'Through a finance provider, subject to approval','status' => 'confirm'],
];

/** What a patient should establish before signing any instalment agreement. */
$checks = [
    [
        'q'    => 'Is any interest built into the price?',
        'why'  => 'A plan presented as costing nothing extra may be funded by a higher headline price, or by a sum the clinic gives up to the lender. Ask what the total payable is on EMI versus paying outright. If the two numbers differ, the difference is the cost of the finance.',
    ],
    [
        'q'    => 'What is the processing fee?',
        'why'  => 'Most medical finance carries a one-time processing fee, and it is frequently quoted separately from the interest rate. It is part of what you pay. Ask for the figure in rupees, not as a percentage.',
    ],
    [
        'q'    => 'Who is the lender, and what happens if I miss a payment?',
        'why'  => 'The agreement is with the finance provider, not with the clinic. Late payment affects your credit record, and the clinic cannot waive a lender\'s charge. Read whose name is on the document.',
    ],
    [
        'q'    => 'Does approval depend on a credit check?',
        'why'  => 'Usually yes, and a hard enquiry is recorded. If you are applying for a home or vehicle loan in the near future, it is worth knowing that before you apply rather than after.',
    ],
    [
        'q'    => 'What is the total payable over the full tenure?',
        'why'  => 'The only number that matters. A low monthly instalment over a long tenure can cost considerably more overall than a higher instalment over a short one. Ask for the total, in writing, before you sign.',
    ],
    [
        'q'    => 'Can I prepay or foreclose, and is there a charge?',
        'why'  => 'Some agreements allow early settlement without penalty; others charge for it. If there is any chance you will clear the balance early, establish this at the outset.',
    ],
];

/** The usual sequence of a third-party medical loan, stated generally. No lender is named. */
$emiSteps = [
    ['title' => 'You apply to the lender',         'text' => 'A bank or finance company, not the clinic. The application commonly needs the clinic’s itemised estimate, proof of identity and address, and proof of income such as salary slips or bank statements.'],
    ['title' => 'The lender checks your credit',   'text' => 'Your credit report is usually checked and the enquiry is recorded on it. Approval, the amount and the tenure are the lender’s decisions.'],
    ['title' => 'You sign; the lender pays the clinic', 'text' => 'You sign the loan agreement with the lender, who then pays the clinic. From that point your contract for the money is with the lender.'],
    ['title' => 'You repay in monthly instalments', 'text' => 'Usually by auto-debit from your bank account, until the tenure ends or you close the loan early on the terms in your agreement.'],
];

/** What to establish from the loan document itself before signing. */
$signQuestions = [
    'Is the interest charged on a flat or a reducing balance, and what is the annual percentage rate?',
    'What is the processing fee in rupees, and has anything else, such as an insurance cover, been added to the loan?',
    'When is the first instalment due, how is each one collected, and what is charged if one bounces?',
    'Can I prepay or close the loan early, and what does that cost?',
    'What happens to the loan if my treatment is postponed or cancelled?',
    'May I have the key facts statement and a signed copy of the agreement?',
];

$faqs = [
    [
        'q' => 'Do you offer EMI for a hair transplant?',
        'a' => 'Instalment options are available through third-party finance providers, subject to their approval. The clinic does not lend money itself and does not set the terms — interest, tenure, eligibility and any fees are decided by the provider. What we do is explain the options clearly and give you the total figure in writing before you commit to anything.',
    ],
    [
        'q' => 'How does EMI through a third-party lender work?',
        'a' => 'You apply to a bank or finance company, commonly with the clinic’s itemised estimate attached. If the lender approves you, it pays the clinic, and you repay the lender in fixed monthly instalments over the agreed tenure. Your contract for the money is with the lender, not the clinic. Card EMI is different: your own bank converts a payment made on your credit card into instalments, on terms your bank sets.',
    ],
    [
        'q' => 'Does paying by EMI cost more than paying outright?',
        'a' => 'Sometimes, and sometimes not — it depends entirely on the provider and the plan. Where a plan is presented as costing nothing extra, ask what the total payable is on EMI compared with paying outright. If those two numbers differ, the difference is the cost of the finance, wherever it has been placed. That is a fair question to ask any clinic, including this one.',
    ],
    [
        'q' => 'What documents does a lender usually ask for?',
        'a' => 'The lender decides, but the usual list is proof of identity (such as PAN and Aadhaar), proof of address, and proof of income, such as recent salary slips and bank statements, or income tax returns if you are self-employed. Many lenders also set up an auto-debit mandate on your bank account for the instalments. Ask the lender for its exact list before you apply; the clinic provides the itemised estimate.',
    ],
    [
        'q' => 'Will applying for EMI affect my credit score?',
        'a' => 'A lender usually checks your credit report before approving a loan, and the enquiry is recorded on it. One enquiry rarely matters much, but several applications close together can weigh on your score, so apply where you intend to borrow rather than to several lenders at once. Once the loan is running, paying on time builds your record and missed payments damage it. Card EMI on an existing card often needs no fresh loan application, but confirm that with your bank.',
    ],
    [
        'q' => 'What should I read in the loan agreement before signing?',
        'a' => 'Six things: the interest rate, and whether it is charged on a flat or a reducing balance (a flat rate costs more than the same figure on a reducing balance); the processing fee in rupees; the tenure and the total you will repay; the charges for a late or bounced instalment; whether you can prepay or close the loan early, and at what charge; and the lender’s name, because the agreement is with the lender, not the clinic. Ask for the key facts statement, which sets out the annual percentage rate, fees and total payable in one place, and keep a signed copy of the agreement.',
    ],
    [
        'q' => 'What if my EMI application is declined?',
        'a' => 'The decision, and the reasons for it, belong to the lender, and the clinic cannot overturn it. You can still pay outright, ask your own bank whether a card payment can be converted into instalments, or, where treatment is planned across sessions, pay session by session. Avoid making several fresh applications in quick succession, since each one can be recorded on your credit report.',
    ],
    [
        'q' => 'What payment methods do you accept?',
        'a' => 'UPI, cards, bank transfer and cash are the usual routes, and card EMI is available through your own bank on an eligible card. Confirm the current list with the clinic when you book. Whatever you pay by, you get a receipt and an itemised estimate — the amount on the estimate is the amount payable.',
    ],
    [
        'q' => 'Can I pay in parts without taking a loan?',
        'a' => 'Ask at the consultation. Any deposit to hold a date, when the balance falls due and what is refundable are confirmed by the clinic in writing with your estimate, before you pay anything. Where treatment is planned across sessions, each session is quoted and paid for separately, and card EMI through your own bank spreads a single payment without a separate loan.',
    ],
    [
        'q' => 'Can I pay in stages if my treatment is staged?',
        'a' => 'Where extensive loss is planned across more than one session, the sessions are separated by months and are quoted and paid for separately. You are not asked to pay for a second session before it has been assessed and agreed — and whether a second session is needed is a clinical judgement made at your review, not a commitment made beforehand.',
    ],
    [
        'q' => 'Are there any costs added on the day of the procedure?',
        'a' => 'No. The estimate is itemised before you book a date, and anything not included in it is named in the document rather than discovered afterwards. If your plan changes clinically between the assessment and the procedure, that is discussed and re-quoted before anything proceeds.',
    ],
    [
        'q' => 'Will my health insurance cover a hair transplant?',
        'a' => 'Generally no. Indian health insurers treat hair transplantation for pattern hair loss as a cosmetic procedure, so it is normally paid privately. Reconstruction following burns, trauma, surgery or certain medical conditions is occasionally assessed differently — that is a question for your insurer directly, and worth asking in writing before you assume either answer.',
    ],
    [
        'q' => 'Is a cheaper quote worth taking?',
        'a' => 'Possibly — but compare the right things. Ask who physically performs the extraction and placement and whether they are a doctor, how the graft number was arrived at, and what the price includes. A low per-graft rate applied to a higher graft count can cost more in total than a higher rate on a smaller one. How a quote is built is explained in <a href="/hair-transplant-cost-in-gurgaon">hair transplant cost in Gurgaon</a> and <a href="/hair-transplant-cost-in-rohini">hair transplant cost in Rohini</a>.',
    ],
    [
        'q' => 'What if I want to cancel?',
        'a' => 'Tell the clinic as early as you can and the booked date is released. Ask for the cancellation and refund terms in writing at the point you pay anything - they belong with your estimate, not recited afterwards. If you have already entered a finance agreement, note that the agreement is with the lender and cancelling treatment does not automatically cancel the loan; that has to be handled with the provider.',
    ],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair transplant cost', 'url' => '/hair-transplant-cost-in-gurgaon'],
    ['name' => 'Cost, EMI & payment'],
];

$page = [
    'title'       => 'Hair Transplant on EMI in Gurgaon & Delhi | DenceSpot',
    'description' => 'Hair transplant on EMI: how card EMI and third-party medical loans work, documents, credit checks, what to read in the agreement, and paying in parts.',
    'url'         => '/cost-and-emi-options',
    'nav_active'  => '/hair-transplant-in-gurgaon',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-hair-transplant-768.webp',
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_faq('/cost-and-emi-options', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Payment</span>
        <h1 class="h1 mt-3">Hair Transplant EMI &amp; Payment Options in Gurgaon and Delhi</h1>

        <p class="lead mt-3 measure">Instalment options are available through third-party finance providers. The clinic does not lend money and does not set the terms — so the useful thing this page can do is explain how medical EMI actually works, including the parts that are normally left to the finance provider to disclose.</p>
        <?= medical_review_line() ?>

        <p class="body mt-3 measure">What a procedure costs, and why, is covered separately on <a href="/hair-transplant-cost-in-gurgaon">hair transplant cost in Gurgaon</a> and <a href="/hair-transplant-cost-in-rohini">hair transplant cost in Rohini</a>. This page is about how it is paid for.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-track="book"><?= icon('calendar', 18) ?> Get a Written Estimate</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Ask About Payment</a>
        </div>

        <?= ticks([
            'Itemised estimate before you book a date',
            'Nothing added on the day of the procedure',
            'Finance terms explained before you commit',
            'The total payable, in writing, not just the monthly figure',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-hair-transplant-768.webp" srcset="/assets/img/services/svc-hair-transplant-512.webp 512w, /assets/img/services/svc-hair-transplant-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a sculpted model of a follicular unit with three hairs, on a cream background" width="768" height="960" loading="eager" fetchpriority="high">
          <?= hp_ai_chip('AI-generated illustration') ?>
        </div>
        <?= hero_review_badge() ?>
      </div>
    </div>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'Before anything is paid',
    'title'   => 'You Get the Figure in Writing First',
    'id'      => 'you-get-the-figure-in-writing-first',
    'intro'   => 'No payment discussion happens before there is an estimate to discuss, and the number on that document is the number payable. Consultations are available at both our clinics, in Sector 39, Gurugram and Rohini, Delhi.',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                    'title' => 'Assessment',        'text' => 'Donor area mapped, graft count established zone by zone, technique decided. Nothing is quoted from a photograph alone.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned hairline', 'title' => 'Itemised estimate', 'text' => 'Procedure, anaesthesia, medication, aftercare and follow-up reviews listed individually — plus anything quoted separately, named rather than omitted.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with dates circled',                      'title' => 'Then payment',      'text' => 'Outright or by instalment. If you choose finance, the total payable over the full tenure is put in front of you, not just the monthly figure.'],
    ],
]) ?>

<section class="section section--white">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Accepted methods</p>
      <h2 id="how-you-can-pay" class="h2 mt-2">How You Can Pay</h2>
      <p class="body mt-3">Every payment is receipted against your itemised estimate.</p>
    </div>

    <div class="card card--pad-lg mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data">
          <caption class="sr-only">Payment methods accepted at DenceSpot Clinic</caption>
          <thead>
            <tr><th scope="col">Method</th><th scope="col">Notes</th></tr>
          </thead>
          <tbody>
            <?php foreach ($methods as $row): ?>
            <tr>
              <th scope="row" style="color:var(--ink);font-size:15px;font-weight:700;text-transform:none;letter-spacing:0"><?= e($row['method']) ?></th>
              <td><?= e($row['note']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="card mt-4">
      <p class="body-s">Finance terms change, and the ones that apply to you are the ones set by your provider on the day. Ask the clinic to confirm the current accepted methods, any deposit, and the cancellation terms in writing before you pay anything.</p>
    </div>
  </div>
</section>

<section class="section section--canvas" id="how-third-party-emi-works">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Step by step</p>
      <h2 id="how-third-party-emi-generally-works" class="h2 mt-2">How Third-Party EMI Generally Works</h2>
      <p class="body mt-3">The details belong to the lender, but the sequence is much the same everywhere. Knowing it before the paperwork arrives makes each document easier to read.</p>
    </div>

    <div class="grid grid--2 mt-5">
      <?php foreach ($emiSteps as $i => $st): ?>
      <div class="card card--pad-lg">
        <span class="journey__num"><?= sprintf('%02d', $i + 1) ?></span>
        <h3 class="h4 mt-2"><?= e($st['title']) ?></h3>
        <p class="body-s mt-2"><?= e($st['text']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="note mt-4">
      <p class="body-s"><b>Card EMI skips most of this.</b> Your own bank converts a payment made on an eligible credit card into instalments, within your card limit and on the bank’s terms. Ask your bank for the interest, any processing fee and the total before you convert.</p>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-procedure',
    'alt'     => 'sterile hair-restoration instruments laid out on a green cloth',
    'id'      => 'the-agreement-is-with-the-lender-not-the-clinic',
    'eyebrow' => 'How medical EMI works',
    'title'   => 'The Agreement Is With the Lender, Not the Clinic',
    'html'    => '<p>This is the part most often misunderstood. When you take an instalment plan for a medical procedure, the clinic is paid in full by a finance provider, and you then repay the provider. Your contract is with them.</p>'
               . '<p>That matters in three practical ways. None of them is a reason to avoid EMI; each is a reason to read whose name is on the document before signing it.</p>',
    'points'  => [
        'Interest, tenure and eligibility are set by the provider and cannot be waived by the clinic.',
        'Missed payments affect your credit record, not your treatment.',
        'Cancelling treatment does not automatically cancel the loan — that has to be resolved with the provider separately.',
    ],
    'link'    => ['url' => '/book-consultation', 'label' => 'Discuss payment options at a consultation'],
]) ?>

<?= lp_split([
    'img'     => 'svc-consultation',
    'alt'     => 'a dermatoscope and a notepad on a wooden desk beside a potted fern',
    'id'      => 'questions-to-ask-before-signing-an-emi-plan',
    'eyebrow' => 'Reading the agreement',
    'title'   => 'Questions to Ask Before Signing an EMI Plan',
    'reverse' => true,
    'tone'    => 'canvas',
    'html'    => '<p>Read the loan agreement itself, not only the summary you are shown when you apply. These questions are about the document; put them to the lender, and keep the answers in writing with your estimate.</p>',
    'points'  => $signQuestions,
]) ?>

<?= lp_split([
    'img'     => 'svc-follicle',
    'alt'     => 'a sculpted cross-section of scalp skin showing hair follicles beneath the surface',
    'id'      => 'card-emi-vs-medical-loan',
    'eyebrow' => 'Two kinds of instalment',
    'title'   => 'Card EMI vs Medical Loan',
    'html'    => '<p><b>Card EMI</b> converts the payment on your existing credit card into instalments through your own bank. Approval is usually immediate, tenure is typically short, and the terms come from your bank.</p>'
               . '<p><b>A medical loan</b> is a separate facility from a finance provider, generally allowing longer tenures and larger amounts. It normally involves a credit check and a processing fee. Which is available to you depends on your own eligibility, not on the clinic.</p>'
               . '<p><b>On percentage-off promotions.</b> A percentage off says little unless you know the figure it was taken from and the graft count it applies to. Compare the total payable, not the percentage removed from a number you were never shown.</p>',
]) ?>

<section class="section section--ink">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Before you sign</p>
      <h2 id="six-questions-worth-asking-any-provider" class="h2 mt-2">Six Questions Worth Asking Any Provider</h2>
      <p class="body-l mt-3">Ask these of whichever clinic and whichever lender you end up using — including this one. A provider that answers all six plainly is one worth dealing with.</p>
    </div>

    <div class="grid grid--3 mt-6">
      <?php foreach ($checks as $i => $c): ?>
      <div class="card card--ink">
        <span class="journey__num"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
        <p class="h4 mt-2"><?= e($c['q']) ?></p>
        <p class="meta mt-2"><?= e($c['why']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Insurance</p>
        <h2 id="what-insurance-does-and-does-not-cover" class="h2 mt-2">What Insurance Does and Does Not Cover</h2>
        <p class="body mt-3 measure">Indian health insurers generally treat hair transplantation for pattern hair loss as a cosmetic procedure, which means it is normally paid for privately. That is the answer for the large majority of patients.</p>
        <p class="body mt-3 measure">Restoration following burns, trauma, surgical scarring or certain medical conditions is occasionally assessed differently. If your case falls into that category it is worth asking your insurer directly, in writing, before assuming either answer — and the clinic can provide clinical documentation to support an enquiry.</p>
      </div>

      <div>
        <div class="card card--pad-lg">
          <?= icon('doc', 24, 'var(--accent-deep)') ?>
          <p class="h3 mt-2">What you receive</p>
          <ul class="stack-sm mt-3">
            <li class="body-s">An itemised written estimate before booking</li>
            <li class="body-s">A receipt for every payment made</li>
            <li class="body-s">Clinical documentation on request</li>
            <li class="body-s">Anything quoted separately, named in the estimate</li>
          </ul>
          <a class="btn btn--outline btn--sm mt-4" href="/hair-transplant-cost-in-gurgaon">How pricing is calculated</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="cost-guides">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Cost guides</p>
      <h2 id="cost-guides-by-treatment-and-clinic" class="h2 mt-2">Cost Guides by Treatment and Clinic</h2>
      <p class="body mt-3">What a treatment costs, and why, is explained treatment by treatment. Each guide sets out how an estimate is built at that clinic and what it should list.</p>
    </div>

    <div class="grid grid--2 mt-5">
      <div class="card card--pad-lg">
        <?= icon('pin', 22, 'var(--accent-deep)') ?>
        <h3 class="h4 mt-3">Gurugram clinic, Sector 39</h3>
        <ul class="stack-sm mt-3">
          <li class="body-s"><a href="/hair-transplant-cost-in-gurgaon">Hair transplant cost in Gurgaon</a></li>
          <li class="body-s"><a href="/prp-hair-treatment-cost-in-gurgaon">PRP hair treatment cost in Gurgaon</a></li>
          <li class="body-s"><a href="/beard-transplant-cost-gurgaon">Beard transplant cost in Gurgaon</a></li>
        </ul>
      </div>
      <div class="card card--pad-lg">
        <?= icon('pin', 22, 'var(--accent-deep)') ?>
        <h3 class="h4 mt-3">Rohini clinic, Delhi</h3>
        <ul class="stack-sm mt-3">
          <li class="body-s"><a href="/hair-transplant-cost-in-rohini">Hair transplant cost in Rohini</a></li>
          <li class="body-s"><a href="/prp-hair-treatment-cost-in-rohini">PRP hair treatment cost in Rohini</a></li>
          <li class="body-s"><a href="/beard-transplant-cost-in-rohini">Beard transplant cost in Rohini</a></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 id="payment-questions-answered" class="h2 mt-2">Payment Questions, Answered</h2>
        <p class="body-s mt-3">Finance terms are set by the provider. Anything specific to your plan is confirmed in writing before you commit.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= lp_cta([
    'eyebrow'   => 'Gurugram and Delhi',
    'title'     => 'Get an Itemised Estimate First',
    'text'      => 'Payment options are worth discussing once there is a real figure to discuss. Book an assessment and you leave with a written, itemised estimate — then decide how you want to pay it.',
    'treatment' => 'Hair transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
