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
        'q'    => 'Is it genuinely no-cost, or is the interest built into the price?',
        'why'  => 'A "0% EMI" is often funded by a discount the clinic gives up, or by a higher headline price. Ask what the total payable is on EMI versus paying outright. If the two numbers differ, the difference is the cost of the finance.',
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

$faqs = [
    [
        'q' => 'Do you offer EMI for a hair transplant?',
        'a' => 'Instalment options are available through third-party finance providers, subject to their approval. The clinic does not lend money itself and does not set the terms — interest, tenure, eligibility and any fees are decided by the provider. What we do is explain the options clearly and give you the total figure in writing before you commit to anything.',
    ],
    [
        'q' => 'Is the EMI genuinely interest-free?',
        'a' => 'Sometimes, and sometimes not — it depends entirely on the provider and the plan. Where a plan is described as no-cost, ask what the total payable is on EMI compared with paying outright. If those two numbers differ, the difference is the cost of the finance, wherever it has been placed. That is a fair question to ask any clinic, including this one.',
    ],
    [
        'q' => 'What payment methods do you accept?',
        'a' => 'UPI, cards, bank transfer and cash are the usual routes, and card EMI is available through your own bank on an eligible card. Confirm the current list with the clinic when you book. Whatever you pay by, you get a receipt and an itemised estimate — the amount on the estimate is the amount payable.',
    ],
    [
        'q' => 'Will my health insurance cover a hair transplant?',
        'a' => 'Generally no. Indian health insurers treat hair transplantation for pattern hair loss as a cosmetic procedure, so it is normally paid privately. Reconstruction following burns, trauma, surgery or certain medical conditions is occasionally assessed differently — that is a question for your insurer directly, and worth asking in writing before you assume either answer.',
    ],
    [
        'q' => 'Can I pay in stages if my treatment is staged?',
        'a' => 'Where extensive loss is planned across more than one session, the sessions are separated by months and are quoted and paid for separately. You are not asked to pay for a second session before it has been assessed and agreed — and whether a second session is needed is a clinical judgement made at your review, not a commitment made in advance.',
    ],
    [
        'q' => 'Are there any costs added on the day of the procedure?',
        'a' => 'No. The estimate is itemised before you book a date, and anything not included in it is named in the document rather than discovered afterwards. If your plan changes clinically between the assessment and the procedure, that is discussed and re-quoted before anything proceeds.',
    ],
    [
        'q' => 'Is a cheaper quote elsewhere worth taking?',
        'a' => 'Possibly — but compare the right things. Ask who physically performs the extraction and placement and whether they are a doctor, how the graft number was arrived at, and what the price includes. A low per-graft rate applied to an inflated graft count costs more than an honest quote at a higher rate. See <a href="/hair-transplant-cost-in-gurgaon">how a hair transplant is priced</a>.',
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
    'title'       => 'Cost, EMI & Payment Options | DenceSpot Clinic Gurgaon',
    'description' => 'How treatment at DenceSpot is paid for: accepted payment methods, how third-party EMI works, and what to check before signing a finance agreement.',
    'url'         => '/cost-and-emi-options',
    'nav_active'  => '/hair-transplant-in-gurgaon',
    'crumbs'      => $crumbs,
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
        <h1 class="h1 mt-3">Hair Transplant EMI &amp; Payment Options in Gurgaon</h1>

        <p class="lead mt-3 measure">Instalment options are available through third-party finance providers. The clinic does not lend money and does not set the terms — so the useful thing this page can do is explain how medical EMI actually works, including the parts that are normally left to the finance provider to disclose.</p>
        <?= medical_review_line() ?>

        <p class="body mt-3 measure">What a procedure costs, and why, is covered separately on <a href="/hair-transplant-cost-in-gurgaon">hair transplant cost in Gurgaon</a>. This page is about how it is paid for.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation"><?= icon('calendar', 18) ?> Get a Written Estimate</a>
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
        <div class="media ratio-4-5 media--shadow"><img src="/assets/img/dr-nayra.webp" alt="Dr. Nyra, MBBS, MD (Dermatology), hair restoration doctor at DenceSpot Clinic, Sector 39 Gurugram" width="800" height="1000" loading="eager"></div>
        <div class="hero__badge-card">
          <p class="eyebrow">Quoted &amp; reviewed by</p>
          <p class="h4 mt-1"><?= doctor_name() ?></p>
          <p class="meta"><?= doctor_credit() ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Before anything is paid</p>
      <h2 id="you-get-the-figure-in-writing-first" class="h2 mt-2">You Get the Figure in Writing First</h2>
      <p class="body mt-3">No payment discussion happens before there is an estimate to discuss. The estimate is produced after clinical assessment, it is itemised, and it names anything that falls outside it. The number on that document is the number payable.</p>
    </div>

    <div class="grid grid--3 mt-6">
      <div class="card card--pad-lg">
        <span class="step-num">1</span>
        <p class="h3 mt-3">Assessment</p>
        <p class="body-s mt-2">Donor area mapped, graft count established zone by zone, technique decided. Nothing is quoted from a photograph alone.</p>
      </div>
      <div class="card card--pad-lg">
        <span class="step-num">2</span>
        <p class="h3 mt-3">Itemised estimate</p>
        <p class="body-s mt-2">Procedure, anaesthesia, medication, aftercare and follow-up reviews listed individually — plus anything quoted separately, named rather than omitted.</p>
      </div>
      <div class="card card--pad-lg">
        <span class="step-num">3</span>
        <p class="h3 mt-3">Then payment</p>
        <p class="body-s mt-2">Outright or by instalment. If you choose finance, the total payable over the full tenure is put in front of you, not just the monthly figure.</p>
      </div>
    </div>
  </div>
</section>

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

<section class="section section--canvas">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">How medical EMI works</p>
        <h2 id="the-agreement-is-with-the-lender-not-the-clinic" class="h2 mt-2">The Agreement Is With the Lender, Not the Clinic</h2>
        <p class="body mt-3 measure">This is the part most often misunderstood. When you take an instalment plan for a medical procedure, the clinic is paid in full by a finance provider, and you then repay the provider. Your contract is with them.</p>
        <p class="body mt-3 measure">That matters in three practical ways. Interest, tenure and eligibility are set by the provider and cannot be waived by the clinic. Missed payments affect your credit record, not your treatment. And cancelling treatment does not automatically cancel the loan — that has to be resolved with the provider separately.</p>
        <p class="body mt-3 measure">None of this is a reason to avoid EMI. It is a reason to read whose name is on the document before signing it.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--ink" href="/book-consultation"><?= icon('calendar', 17) ?> Discuss Options at Consultation</a>
        </div>
      </div>

      <div>
        <div class="card card--pad-lg">
          <?= icon('rupee', 24, 'var(--accent-deep)') ?>
          <p class="h3 mt-2">Card EMI vs medical loan</p>
          <p class="body-s mt-3"><b>Card EMI</b> converts the payment on your existing credit card into instalments through your own bank. Approval is usually immediate, tenure is typically short, and the terms come from your bank.</p>
          <p class="body-s mt-3"><b>A medical loan</b> is a separate facility from a finance provider, generally allowing longer tenures and larger amounts. It normally involves a credit check and a processing fee.</p>
          <p class="meta mt-4">Which is available to you depends on your own eligibility, not on the clinic.</p>
        </div>

        <div class="card card--pad-lg mt-4" style="background:var(--canvas);box-shadow:none">
          <?= icon('info', 24, 'var(--accent-deep)') ?>
          <p class="h3 mt-2">On "50% off" offers</p>
          <p class="body-s mt-2">Discount-led promotion is common in this market. A procedure priced to be halved was not priced honestly to begin with, and a per-graft rate discounted against an inflated graft count is not a saving. Compare the total payable, not the percentage removed from a number you were never shown.</p>
        </div>
      </div>
    </div>
  </div>
</section>

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
        <p class="h4 mt-2" style="color:#fff"><?= e($c['q']) ?></p>
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

<section class="section section--canvas" id="faqs">
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

<?= cta_band(
    'Get an Itemised Estimate First',
    'Payment options are worth discussing once there is a real figure to discuss. Book an assessment and you leave with a written, itemised estimate — then decide how you want to pay it.',
    'cost-and-emi-options',
    ['Hair transplant', 'Beard transplant', 'Hair PRP / GFC therapy', 'Not sure — please advise']
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
