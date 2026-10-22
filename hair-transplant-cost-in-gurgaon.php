<?php
/**
 * /hair-transplant-cost-in-gurgaon — page #3, strategy §1.1.
 *
 * Flagged in the strategy as the single biggest missed keyword on the site:
 * the highest-intent non-brand query in this market, currently existing only
 * as an <h2> inside another page.
 *
 * ⚠ RATES STILL AWAITING SIGN-OFF. $rates below holds null in every 'rate'
 * slot, so the Rate column is not rendered at all and the page explains how
 * quoting works instead. Fill in the real figures and the column returns by
 * itself. Nothing here is invented, and no placeholder reaches a patient.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/**
 * Per-graft rates. Set 'rate' to the clinic's real figure (e.g. '₹35–45 per
 * graft') and the Rate column appears automatically, on the page and nowhere
 * else. Leave them null and the table renders technique and suitability only.
 *
 * Same rule as the AggregateRating gate on /patient-reviews: publish a number
 * or publish nothing — never publish a placeholder where a number belongs.
 */
$rates = [
    ['technique' => 'FUE',        'rate' => null, 'best_for' => 'Larger areas — crown, mid-scalp, broad coverage'],
    ['technique' => 'DHI',        'rate' => null, 'best_for' => 'Hairline and detail zones needing precise angle control'],
    ['technique' => 'FUT',        'rate' => null, 'best_for' => 'High graft numbers in a single session, where suitable'],
    ['technique' => 'Combination','rate' => null, 'best_for' => 'Different techniques across different zones'],
];

/** True once any real rate is filled in above. */
$hasRates = array_filter(array_column($rates, 'rate')) !== [];

/**
 * General clinical guidance on graft bands by Norwood stage. These are widely
 * published ranges for patient education, not a quote — the number for any
 * individual comes from the mapped plan.
 */
$bands = [
    ['stage' => 'Norwood II',      'zone' => 'Early recession at the temples',        'grafts' => '800 – 1,500'],
    ['stage' => 'Norwood III',     'zone' => 'Defined recession, hairline rebuild',   'grafts' => '1,200 – 2,000'],
    ['stage' => 'Norwood III–IV',  'zone' => 'Hairline plus early crown',             'grafts' => '1,800 – 2,600'],
    ['stage' => 'Norwood V',       'zone' => 'Front, mid-scalp and crown',            'grafts' => '2,500 – 3,500'],
    ['stage' => 'Norwood VI–VII',  'zone' => 'Extensive loss, usually staged',        'grafts' => '3,000 – 4,500+, often across sessions'],
];

$faqs = [
    [
        'q' => 'How much does a hair transplant cost in Gurgaon?',
        'a' => 'Cost is graft count multiplied by a per-graft rate, plus anaesthesia, medication and follow-up. Because graft count is set by the area being covered and what the donor area can safely give, the same photograph can produce very different plans for two people. We quote after examination and give the figure in writing, itemised, before you book a date.',
    ],
    [
        'q' => 'Why do you not publish a starting price?',
        'a' => 'Because a headline "starting from" figure is almost never what anyone pays. A low per-graft rate applied to an inflated graft count costs more than an honest quote at a higher rate. Publishing the arithmetic instead lets you compare clinics on the number that actually decides the bill.',
    ],
    [
        'q' => 'What is included in the estimate?',
        'a' => 'The procedure itself, local anaesthesia, the medication prescribed for recovery, post-procedure instructions and your scheduled follow-up reviews. Anything that is not included is named in the estimate rather than discovered later.',
    ],
    [
        'q' => 'How many grafts will I need?',
        'a' => 'It depends on the area to be covered, the density being aimed for and what the donor area can safely give — mapped zone by zone at the assessment. The bands on this page are general patient education. Any figure offered before an examination is a guess, not a plan.',
    ],
    [
        'q' => 'Is a cheaper clinic a false economy?',
        'a' => 'Not automatically — but ask three questions before deciding. Who physically performs the extraction and placement, and are they a doctor? How was the graft number arrived at? And what does the price include? A repair procedure costs considerably more than getting it right once.',
    ],
    [
        'q' => 'Do you offer EMI or payment in instalments?',
        'a' => 'Instalment options are available through third-party finance providers. Terms, eligibility and any interest are set by the provider, not by the clinic, and are explained before you commit to anything. See <a href="/cost-and-emi-options">cost, EMI and payment options</a>.',
    ],
    [
        'q' => 'Does insurance cover a hair transplant?',
        'a' => 'Not usually. Hair transplantation for pattern hair loss is treated as a cosmetic procedure by Indian health insurers, so it is generally paid for privately. Reconstruction after burns, trauma or surgery is occasionally assessed differently — check directly with your insurer.',
    ],
    [
        'q' => 'Will I need more than one session?',
        'a' => 'Sometimes. Extensive loss is often staged deliberately so donor supply is spent carefully rather than exhausted in one sitting, and some patients choose a second session later for added density. Where staging is likely, it is said at the consultation and reflected in the plan — not raised afterwards.',
    ],
    [
        'q' => 'How does Gurgaon compare with Delhi or overseas?',
        'a' => 'Rates across Delhi NCR sit in a broadly similar band, and clinic reputation, who performs the procedure and what is included vary more than geography does. Treatment abroad can look cheaper on the headline figure before travel, accommodation and — the part that matters most — the practical difficulty of attending follow-up reviews for a year.',
    ],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair transplant', 'url' => '/hair-transplant-in-gurgaon'],
    ['name' => 'Cost in Gurgaon'],
];

$page = [
    'title'       => 'Hair Transplant Cost in Gurgaon | DenceSpot Clinic',
    'description' => 'What a hair transplant costs in Gurgaon and why: graft count, technique, donor supply, and what an estimate should include. Written quotes after assessment.',
    'url'         => '/hair-transplant-cost-in-gurgaon',
    'nav_active'  => '/hair-transplant-in-gurgaon',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_faq('/hair-transplant-cost-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Cost guidance</span>
        <h1 class="h1 mt-3">Hair Transplant Cost in Gurgaon</h1>

        <p class="lead mt-3 measure">A hair transplant is priced as <b>graft count × per-graft rate</b>, plus anaesthesia, medication and follow-up. Graft count is the variable that moves the bill, and it is set by the area being covered and what your donor area can safely give — which is why the same photograph produces very different plans for two different people.</p>
        <?= medical_review_line() ?>

        <p class="body mt-3 measure">This page explains every factor that moves that number, what an estimate should include, and the pricing tactics worth recognising before you compare quotes. We quote after examining you, in writing, itemised.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation"><?= icon('calendar', 18) ?> Get a Written Estimate</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Send Photos on WhatsApp</a>
        </div>

        <?= ticks([
            'Itemised estimate in writing before you book',
            'Graft count mapped, not estimated',
            'Nothing added on the day of the procedure',
            'Follow-up reviews included in the plan',
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
      <p class="eyebrow">The arithmetic</p>
      <h2 id="how-a-hair-transplant-is-priced" class="h2 mt-2">How a Hair Transplant Is Priced</h2>
      <p class="body mt-3">Nearly every clinic in Gurgaon prices the same way. Understanding the formula is what lets you compare two quotes that look nothing alike.</p>
    </div>

    <div class="grid grid--3 mt-6">
      <div class="card card--pad-lg">
        <span class="step-num">1</span>
        <p class="h3 mt-3">Graft count</p>
        <p class="body-s mt-2">The dominant variable. Counted from the mapped plan — zone by zone across the areas being covered — and capped by what the donor area can give without thinning it visibly.</p>
      </div>
      <div class="card card--pad-lg">
        <span class="step-num">2</span>
        <p class="h3 mt-3">Per-graft rate</p>
        <p class="body-s mt-2">Set by technique and complexity. DHI generally carries a higher rate than FUE because placement is slower and more controlled, not because it is universally better.</p>
      </div>
      <div class="card card--pad-lg">
        <span class="step-num">3</span>
        <p class="h3 mt-3">Everything else</p>
        <p class="body-s mt-2">Anaesthesia, medication, post-procedure care and follow-up reviews. Where a clinic quotes only the per-graft rate, this is where the difference reappears.</p>
      </div>
    </div>

    <div class="note mt-5">
      <p class="body-s"><b>The tactic worth recognising.</b> A low per-graft rate applied to an inflated graft count costs more than an honest quote at a higher rate. ₹30 × 3,500 grafts is more expensive than ₹45 × 2,200 grafts — and the second plan may be the clinically correct one. Ask any clinic how the graft number was arrived at, and ask to see the donor area mapped.</p>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="wrap">
    <div style="max-width:62ch">
      <?php /* The heading followed $hasRates nowhere, so a page that shows no rates was
               headed "Per-Graft Rates at DenceSpot" — a promise the table does not keep. */ ?>
      <p class="eyebrow">Rates by technique</p>
      <h2 id="techniques-and-what-they-suit" class="h2 mt-2"><?= $hasRates ? 'Per-Graft Rates at DenceSpot' : 'Which Technique Suits Which Case' ?></h2>
      <p class="body mt-3"><?= $hasRates
          ? 'Your rate is confirmed in writing after the assessment, once the technique and zones are decided.'
          : 'We do not publish a per-graft rate, because the rate on its own decides nothing — graft count moves the bill far more than the rate does. What this table gives you is which technique suits which case; your own rate is confirmed in writing after the assessment, once the technique and zones are decided.' ?></p>
    </div>

    <div class="card card--pad-lg mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data">
          <caption class="sr-only"><?= $hasRates ? 'Per-graft rates by hair transplant technique at DenceSpot Clinic, Gurgaon' : 'Hair transplant techniques at DenceSpot Clinic, Gurgaon, and which cases each suits' ?></caption>
          <thead>
            <tr><th scope="col">Technique</th><?php if ($hasRates): ?><th scope="col">Rate</th><?php endif; ?><th scope="col">Typically suited to</th></tr>
          </thead>
          <tbody>
            <?php foreach ($rates as $row): ?>
            <tr>
              <th scope="row" style="color:var(--ink);font-size:15px;font-weight:700;text-transform:none;letter-spacing:0"><?= e($row['technique']) ?></th>
              <?php if ($hasRates): ?><td style="font-weight:600;color:var(--ink)"><?= e($row['rate'] ?? 'Quoted per plan') ?></td><?php endif; ?>
              <td><?= e($row['best_for']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <?php if (!$hasRates): ?>
    <div class="card mt-4">
      <p class="h4">Why there is no price list here</p>
      <p class="body-s mt-2">A per-graft rate on its own tells you very little: a low rate applied to an inflated graft count costs more than an honest quote on a lower one. Your figure comes from the mapped plan — graft count, technique and zones — and is given to you in writing after the assessment, before any date is booked. Nothing is added afterwards.</p>
      <div class="btn-row mt-4">
        <a class="btn btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 17) ?> Ask for an estimate</a>
        <a class="btn btn--outline" href="/book-consultation">Book an assessment</a>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>

<section class="section section--canvas">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Graft guidance</p>
      <h2 id="how-many-grafts-might-i-need" class="h2 mt-2">How Many Grafts Might I Need?</h2>
      <p class="body mt-3">Broad bands used in patient education, staged on the <a href="/blog/norwood-scale-explained">Norwood scale</a>. They are a starting point for a conversation, not a quote — two people at the same Norwood stage can need very different numbers depending on donor density, hair calibre, and how much native hair is still in place.</p>
    </div>

    <div class="card card--pad-lg mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data">
          <caption class="sr-only">General graft count guidance by Norwood stage</caption>
          <thead>
            <tr><th scope="col">Stage</th><th scope="col">Area typically covered</th><th scope="col">General graft range</th></tr>
          </thead>
          <tbody>
            <?php foreach ($bands as $row): ?>
            <tr>
              <th scope="row" style="color:var(--ink);font-size:15px;font-weight:700;text-transform:none;letter-spacing:0"><?= e($row['stage']) ?></th>
              <td><?= e($row['zone']) ?></td>
              <td style="font-weight:600;color:var(--ink)"><?= e($row['grafts']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="note note--tint mt-4" style="background:#fff">
      <p class="body-s"><b>Donor supply is the real ceiling.</b> The donor area is finite and does not regenerate. A plan that spends it all on the hairline at thirty leaves nothing for the crown at forty-five. Where loss is extensive, staging across sessions is a clinical decision, not an upsell.</p>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">What you pay for</p>
        <h2 id="what-the-estimate-includes" class="h2 mt-2">What the Estimate Includes</h2>
        <p class="body mt-3 measure">Every DenceSpot estimate is itemised. Anything not covered is named in the document rather than discovered on the day.</p>

        <div class="grid grid--2 mt-5">
          <div class="card"><?= icon('check', 20, 'var(--accent-deep)', 2.2) ?><p class="h4 mt-2">The procedure</p><p class="meta mt-1">Extraction, site creation and placement by the treating doctor.</p></div>
          <div class="card"><?= icon('check', 20, 'var(--accent-deep)', 2.2) ?><p class="h4 mt-2">Local anaesthesia</p><p class="meta mt-1">Administered and monitored through the session.</p></div>
          <div class="card"><?= icon('check', 20, 'var(--accent-deep)', 2.2) ?><p class="h4 mt-2">Post-procedure medication</p><p class="meta mt-1">What is prescribed for the recovery period.</p></div>
          <div class="card"><?= icon('check', 20, 'var(--accent-deep)', 2.2) ?><p class="h4 mt-2">Aftercare instructions</p><p class="meta mt-1">Written guidance on washing, activity and sun exposure.</p></div>
          <div class="card"><?= icon('check', 20, 'var(--accent-deep)', 2.2) ?><p class="h4 mt-2">Follow-up reviews</p><p class="meta mt-1">Scheduled from the start, through the first year.</p></div>
          <div class="card"><?= icon('check', 20, 'var(--accent-deep)', 2.2) ?><p class="h4 mt-2">Progress photography</p><p class="meta mt-1">Same angle and lighting at each review, kept on your record.</p></div>
        </div>
      </div>

      <div>
        <div class="card card--pad-lg">
          <p class="eyebrow" style="color:var(--ink-muted)">Quoted separately, where needed</p>
          <ul class="stack-sm mt-3">
            <li class="body-s">Pre-procedure blood tests</li>
            <li class="body-s">Supporting medical therapy — minoxidil, oral treatment</li>
            <li class="body-s">PRP or GFC sessions planned alongside</li>
            <li class="body-s">A second staged session, where the plan calls for one</li>
          </ul>
          <p class="meta mt-4">Named in your estimate if they apply to your plan, so the total you are looking at is the total.</p>
        </div>

        <div class="card card--pad-lg mt-4" style="background:var(--canvas);box-shadow:none">
          <?= icon('rupee', 24, 'var(--accent-deep)') ?>
          <p class="h3 mt-2">Paying in instalments</p>
          <p class="body-s mt-2">Instalment options are available through third-party finance providers. Terms and eligibility are set by the provider, not the clinic, and are explained in full before you commit.</p>
          <a class="btn btn--outline btn--sm mt-3" href="/cost-and-emi-options">Cost, EMI &amp; payment options</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--ink">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Comparing quotes</p>
      <h2 id="five-things-to-check-before-you-compare-prices" class="h2 mt-2">Five Things to Check Before You Compare Prices</h2>
      <p class="body-l mt-3">Two quotes for "2,000 grafts" can describe completely different procedures. These are the differences that do not appear on a price list.</p>
    </div>
    <div class="grid grid--5 mt-6">
      <div class="card card--ink"><span class="journey__num">01</span><p class="h4 mt-2" style="color:#fff">Who operates</p><p class="meta mt-2">Whether a doctor performs the extraction and placement, or only the consultation.</p></div>
      <div class="card card--ink"><span class="journey__num">02</span><p class="h4 mt-2" style="color:#fff">How grafts were counted</p><p class="meta mt-2">Mapped against the donor area, or a round number attached to a photograph.</p></div>
      <div class="card card--ink"><span class="journey__num">03</span><p class="h4 mt-2" style="color:#fff">What is included</p><p class="meta mt-2">Medication, anaesthesia and follow-up inside the price, or billed later.</p></div>
      <div class="card card--ink"><span class="journey__num">04</span><p class="h4 mt-2" style="color:#fff">Session load</p><p class="meta mt-2">How many patients the clinic runs in a day, and who is placing your grafts while that happens.</p></div>
      <div class="card card--ink"><span class="journey__num">05</span><p class="h4 mt-2" style="color:#fff">The twelve-month plan</p><p class="meta mt-2">What the clinic does at the year review if density is uneven — in writing, before you pay.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 id="cost-questions-answered" class="h2 mt-2">Cost Questions, Answered</h2>
        <p class="body-s mt-3">General patient education. Anything specific to your case is answered at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= cta_band(
    'Get a Written, Itemised Estimate',
    'Send photos of the front, crown and donor area on WhatsApp, or book an assessment. You get a clinical opinion and a figure in writing — not a sales pitch.',
    'hair-transplant-cost',
    ['Hair transplant', 'Beard transplant', 'Hair PRP / GFC therapy', 'Not sure — please advise']
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
