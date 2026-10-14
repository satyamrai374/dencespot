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
 *
 * Landing-page layout (14 Oct 2026): lp_steps / lp_split / lp_cta from
 * includes/home-components.php around the two tables and the estimate card,
 * AI illustrations only, each with its label. A Gurugram page: no mention
 * of, or link to, the Rohini clinic, and no "Delhi" (say Gurugram or the NCR).
 *
 * SEO round 4 (14 Oct 2026): 16 FAQs, a cost-factor table, a "How to read a
 * hair transplant quote" checklist, "Questions worth asking any clinic about
 * cost", a graft-calculator callout and FUE vs DHI cost in relative terms.
 * Still no rupee figure of our own: the only ₹ amounts are the existing
 * ₹30 / ₹45 arithmetic illustration. One missing_fact(): whether the
 * consultation is charged.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/**
 * Per-graft rates. Set 'rate' to the clinic's real figure (e.g. '₹35–45 per
 * graft') and the Rate column appears automatically, on the page and nowhere
 * else. Leave them null and the table renders technique and suitability only.
 *
 * Rule: publish a number or publish nothing — never publish a placeholder
 * where a number belongs. (The reviews page this once pointed to was withdrawn
 * in Oct 2026 under the NMC Guidelines of 06.10.2026.)
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

/** Which way each factor pushes an estimate. Education, not a quote; no prices. */
$factors = [
    ['Area to be covered',          'The largest driver. More area (hairline, mid-scalp, crown) means more grafts, and the graft count multiplies everything else.'],
    ['Donor supply',                'Sets the ceiling. A limited donor area leads to a smaller plan, or one staged over two sessions, rather than a bigger bill in one sitting.'],
    ['Density aimed for',           'Packing a zone more densely uses more grafts there. A sound plan weighs density at the front against what the donor must keep for later.'],
    ['Hair calibre and curl',       'Thick or curly hair covers more scalp per graft, so a zone may need fewer grafts; fine, straight hair can need more for similar coverage.'],
    ['Technique',                   'DHI generally carries a higher per-graft rate than FUE. A plan that combines the two carries two rates, one for each zone.'],
    ['Shaven or unshaven',          'Unshaven work is slower, so the same graft count usually costs more, and fewer grafts fit into one day.'],
    ['One session or two',          'Each session of a staged plan is quoted separately. The combined total can be higher, in exchange for donor hair kept in reserve.'],
    ['Supporting treatment',        'Longer-term medication, PRP or GFC planned alongside are separate lines, named on the estimate if your plan includes them.'],
    ['Earlier surgery or scarring', 'Repairing earlier work, or grafting into scar tissue, is slower and less predictable, so it is planned conservatively and costed after examination.'],
    ['Tax',                         'Whether a figure is stated before or after any applicable tax changes how two quotes compare. Compare on the total payable.'],
];

/** The lines a written quote should carry — a checklist for any clinic's estimate. */
$quoteLines = [
    ['title' => 'The unit: grafts, not hairs',         'text' => 'A graft is a follicular unit of one to four hairs, so a figure counted in hairs looks roughly twice as large for the same operation. Check the unit before anything else.'],
    ['title' => 'A graft count for each zone',         'text' => 'Hairline, mid-scalp and crown listed separately, with a note of how the total fits what your donor area can give. One round number for the whole head is a guess, not a plan.'],
    ['title' => 'The technique, and the rate for each part', 'text' => 'FUE, DHI or both, and which zones each one covers. A plan that combines techniques should show two counts and two rates.'],
    ['title' => 'Who performs each step',              'text' => 'Who extracts the grafts, who makes the recipient sites and who places the grafts, by name and qualification.'],
    ['title' => 'What sits inside the figure',         'text' => 'Anaesthesia, the recovery medication, dressings, written aftercare and the follow-up reviews through the first year.'],
    ['title' => 'What sits outside it, by name',       'text' => 'Blood tests, longer-term medication, PRP or GFC, and any second session, each listed if it applies to you, so nothing arrives later on a separate bill.'],
    ['title' => 'Sessions and timing',                 'text' => 'One sitting or staged. If staged, roughly when the second session would fall, and confirmation that it is quoted separately.'],
    ['title' => 'The total payable, and how it is paid', 'text' => 'One figure including any applicable tax, then the deposit and refund terms and, if you choose EMI, the total repaid over the full tenure.'],
];

/** Neutral consumer questions about cost, for any clinic. No comparison claims. */
$costQuestions = [
    ['q' => 'What is the total payable, all in?',         'why' => 'One figure, including any applicable tax, in writing. Not a per-graft rate, not a monthly instalment and not a “starting from” price.'],
    ['q' => 'What if the count on the day is different?', 'why' => 'Estimates are made before extraction begins. Ask how the bill changes if more or fewer grafts are placed, and get the answer on paper.'],
    ['q' => 'Is anything billed after the procedure?',    'why' => 'Medication, dressings, reviews or blood tests: ask which items, if any, appear on a later bill, and what they come to.'],
    ['q' => 'How would a second session be priced?',      'why' => 'If staging is likely, ask when it would fall and how it would be priced, before you commit to the first session.'],
    ['q' => 'If I pay by EMI, what do I repay in total?', 'why' => 'The full amount over the tenure, the processing fee in rupees, and the name of the lender, who is not the clinic.'],
    ['q' => 'What are the deposit and refund terms?',     'why' => 'What is refundable if you withdraw, how long the estimate stays valid, and whether you can take it away to compare.'],
];

$faqs = [
    [
        'q' => 'How much does a hair transplant cost in Gurgaon?',
        'a' => 'Cost is graft count multiplied by a per-graft rate, plus anaesthesia, medication and follow-up. Because graft count is set by the area being covered and what the donor area can safely give, the same photograph can produce very different plans for two people. We quote after examination and give the figure in writing, itemised, before you book a date.',
    ],
    [
        'q' => 'Why do hair transplant quotes differ so much between clinics?',
        'a' => 'Usually because they are not quoting for the same operation. One quote may count hairs and another grafts; one may follow a measured donor area and another a round number attached to a photograph; one total may include anaesthesia, medication and reviews while another leaves them to be billed later. Technique, who performs each step and whether the plan is staged all move the figure too. Lay two quotes side by side, line by line, before comparing totals.',
    ],
    [
        'q' => 'Why do you not publish a starting price?',
        'a' => 'Because a headline "starting from" figure is rarely what anyone pays. A low per-graft rate applied to a higher graft count can cost more in total than a higher rate on a smaller count. Publishing the arithmetic instead lets you compare quotes on the number that actually decides the bill.',
    ],
    [
        'q' => 'What does a per-graft price leave out?',
        'a' => 'Most of what decides the bill. A rate says nothing about how many grafts you will be charged for, which moves the total far more than the rate does. It may also leave out anaesthesia, the recovery medication, dressings, blood tests, follow-up reviews, any PRP or medical treatment alongside, tax, and a second session if your plan is staged. Nor does it say who performs the extraction and placement. Ask for an itemised total rather than a rate.',
    ],
    [
        'q' => 'What is included in the estimate?',
        'a' => 'The procedure itself, local anaesthesia, the medication prescribed for recovery, post-procedure instructions and your scheduled follow-up reviews. Anything that is not included is named in the estimate rather than discovered later.',
    ],
    [
        'q' => 'How many grafts will I need?',
        'a' => 'It depends on the area to be covered, the density being aimed for and what the donor area can safely give — mapped zone by zone at the assessment. The bands on this page are general patient education. Any figure offered before an examination is a guess, not a plan. For a starting range before your visit, try the <a href="/hair-transplant-graft-calculator">hair transplant graft calculator</a>.',
    ],
    [
        'q' => 'Is DHI more expensive than FUE?',
        'a' => 'Per graft, DHI generally carries a higher rate than FUE, because each graft is loaded into an implanter and set in one movement, which is slower and more controlled work. Extraction from the donor area is the same in both. Many plans use DHI only along the hairline and FUE behind it, so only part of the count carries the higher rate, and the higher rate does not make DHI the right choice for everyone. See <a href="/fue-hair-transplant-in-gurgaon">FUE hair transplant in Gurgaon</a> and <a href="/dhi-hair-transplant-in-gurgaon">DHI hair transplant in Gurgaon</a>.',
    ],
    [
        'q' => 'Are medicines and PRP sessions included in the cost?',
        'a' => 'The medication prescribed for the recovery period is included. Longer-term treatment to protect the hair around the grafts, such as minoxidil or an oral medicine, and any PRP or GFC sessions planned alongside are quoted separately and named in your estimate if your plan includes them. Whether you need them at all is a clinical decision. <a href="/prp-hair-treatment-cost-in-gurgaon">PRP hair treatment cost in Gurgaon</a> explains how a PRP course is priced.',
    ],
    [
        'q' => 'Are follow-up visits charged separately?',
        'a' => 'No. Follow-up reviews, scheduled from the start through the first year, are part of every estimate, with progress photographs taken at the same angle and lighting at each one. If a review leads to further treatment, such as medication or a second session, that is a separate decision and is quoted separately before anything is done.',
    ],
    [
        'q' => 'Will I need more than one session, and how is a second one priced?',
        'a' => 'Sometimes. Extensive loss is often staged deliberately so donor supply is spent carefully rather than exhausted in one sitting, and some patients choose a second session later for added density. Where staging is likely, it is said at the consultation and reflected in the plan — not raised afterwards. A second session is quoted separately from the first, and you are not asked to pay for it before it has been assessed and agreed at a review.',
    ],
    [
        'q' => 'Do you offer EMI or payment in instalments?',
        'a' => 'Instalment options are available through third-party finance providers. Terms, eligibility and any interest are set by the provider, not by the clinic, and are explained before you commit to anything. Compare the total payable on EMI with the figure for paying outright. See <a href="/cost-and-emi-options">cost, EMI and payment options</a>.',
    ],
    [
        'q' => 'Is GST included in a hair transplant quote, and will I get a receipt?',
        'a' => 'Clinics differ in whether a figure is stated before or after any applicable tax, and that alone can make two comparable quotes look different, so ask each one for the total payable, in writing, including tax. At DenceSpot every payment is receipted against your itemised estimate, so what you pay can always be matched to what was quoted.',
    ],
    [
        'q' => 'Does insurance cover a hair transplant?',
        'a' => 'Not usually. Hair transplantation for pattern hair loss is treated as a cosmetic procedure by Indian health insurers, so it is generally paid for privately. Reconstruction after burns, trauma or surgery is occasionally assessed differently — check directly with your insurer.',
    ],
    [
        'q' => 'Is a cheaper clinic a false economy?',
        'a' => 'Not automatically — but ask three questions before deciding. Who physically performs the extraction and placement, and are they a doctor? How was the graft number arrived at? And what does the price include? Price on its own says little about quality either way.',
    ],
    [
        'q' => 'How much does a beard or eyebrow transplant cost in Gurgaon?',
        'a' => 'The same arithmetic applies — graft count multiplied by a per-graft rate, plus what the estimate covers — but the counts and the pace of work differ. Many beard plans need fewer grafts than a large scalp case, although a full beard with sideburns can approach a substantial scalp session, and facial placement is slower per graft. An eyebrow is built from single-hair grafts set almost flat to the skin, so the count is small but each graft takes time. See <a href="/beard-transplant-cost-gurgaon">beard transplant cost in Gurgaon</a> and <a href="/eyebrow-transplant-in-gurgaon">eyebrow transplant in Gurgaon</a>.',
    ],
    [
        'q' => 'Is a hair transplant cheaper in another city or abroad?',
        'a' => 'Rates across the NCR sit in a broadly similar band, and clinic reputation, who performs the procedure and what is included vary more than geography does. Treatment abroad can look cheaper on the headline figure before travel, accommodation and — the part that matters most — the practical difficulty of attending follow-up reviews for a year.',
    ],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair transplant', 'url' => '/hair-transplant-in-gurgaon'],
    ['name' => 'Cost in Gurgaon'],
];

$page = [
    'title'       => 'Hair Transplant Cost in Gurgaon (2026): Per-Graft Guide',
    'description' => 'Hair transplant cost in Gurgaon explained: graft count × per-graft rate, FUE vs DHI cost, what a written quote should list, questions to ask, and EMI.',
    'url'         => '/hair-transplant-cost-in-gurgaon',
    'nav_active'  => '/hair-transplant-in-gurgaon',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-follicle-768.webp',
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

        <p class="body mt-3 measure">This page explains every factor that moves that number, what an estimate should include, and the pricing tactics worth recognising before you compare quotes. We quote after examining you, in writing, itemised. Consultations take place at our clinic in Sector 39, Gurugram. What the procedure itself involves is covered on <a href="/hair-transplant-in-gurgaon">hair transplant in Gurgaon</a>.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-track="book"><?= icon('calendar', 18) ?> Get a Written Estimate</a>
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
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-follicle-768.webp" srcset="/assets/img/services/svc-follicle-512.webp 512w, /assets/img/services/svc-follicle-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a sculpted cross-section of scalp showing hair follicles beneath the skin" width="768" height="960" loading="eager" fetchpriority="high">
          <?= hp_ai_chip('AI-generated illustration') ?>
        </div>
        <?= hero_review_badge() ?>
      </div>
    </div>
  </div>
</section>

<?= lead_strip() ?>

<?= lp_steps([
    'eyebrow' => 'The arithmetic',
    'title'   => 'How a Hair Transplant Is Priced',
    'id'      => 'how-a-hair-transplant-is-priced',
    'intro'   => 'Nearly every clinic in Gurgaon prices the same way. Understanding the formula is what lets you compare two quotes that look nothing alike.',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-plan',      'alt' => 'a tablet showing a head diagram with a mapped area',       'title' => 'Graft count',     'text' => 'The dominant variable. Counted from the mapped plan — zone by zone across the areas being covered — and capped by what the donor area can give without thinning it visibly.'],
        ['img' => 'step-procedure', 'alt' => 'sterile hair-restoration instruments laid out on a tray',  'title' => 'Per-graft rate',  'text' => 'Set by technique and complexity. DHI generally carries a higher rate than FUE because placement is slower and more controlled, not because it is universally better.'],
        ['img' => 'step-followup',  'alt' => 'a desk calendar with review dates circled',                'title' => 'Everything else', 'text' => 'Anaesthesia, medication, post-procedure care and follow-up reviews. Where a clinic quotes only the per-graft rate, this is where the difference reappears.'],
    ],
]) ?>

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

    <h3 id="fue-vs-dhi-cost" class="h3 mt-6">FUE vs DHI Cost: Where the Rate Differs</h3>
    <p class="body mt-2 measure">Extraction is the same in both techniques; what differs is how each graft goes in. DHI loads every graft into an implanter and sets it in one movement, which is slower, so its per-graft rate is generally higher than FUE’s. Many plans use DHI only along the hairline and FUE behind it, which keeps the higher rate to the zone where precise angle control matters most, and means your estimate may carry two rates. How each technique works is covered on <a href="/fue-hair-transplant-in-gurgaon">FUE hair transplant in Gurgaon</a> and <a href="/dhi-hair-transplant-in-gurgaon">DHI hair transplant in Gurgaon</a>.</p>

    <?php if (!$hasRates): ?>
    <div class="card mt-4">
      <p class="h4">Why there is no price list here</p>
      <p class="body-s mt-2">A per-graft rate on its own tells you very little: a low rate applied to a higher graft count can cost more in total than a higher rate on a smaller one. Your figure comes from the mapped plan — graft count, technique and zones — and is given to you in writing after the assessment, before any date is booked. Nothing is added afterwards.</p>
      <div class="btn-row mt-4">
        <a class="btn btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 17) ?> Ask for an estimate</a>
        <a class="btn btn--outline" href="/book-consultation" data-book data-track="book">Book an assessment</a>
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

    <div class="note mt-4">
      <p class="body-s"><b>Donor supply is the real ceiling.</b> The donor area is finite and does not regenerate. A plan that spends it all on the hairline at thirty leaves nothing for the crown at forty-five. Where loss is extensive, staging across sessions is a clinical decision, not an upsell.</p>
    </div>

    <div class="card card--pad-lg mt-5" id="graft-calculator">
      <div class="split split--wide-left">
        <div>
          <p class="eyebrow">Before you compare estimates</p>
          <h3 class="h3 mt-2">Check a Graft Figure With the Calculator</h3>
          <p class="body-s mt-2">The graft calculator gives a starting graft range from your pattern of hair loss. Multiply the ends of that range by any per-graft rate you have been quoted and you can see how far a total could move, before anyone has examined you. It is a range, not your number: your donor area still has to be measured.</p>
        </div>
        <div class="btn-row">
          <a class="btn btn--ink" href="/hair-transplant-graft-calculator"><?= icon('chart', 17) ?> Open the hair transplant graft calculator</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="cost-factors">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Cost factors</p>
      <h2 id="what-affects-hair-transplant-cost" class="h2 mt-2">What Affects Hair Transplant Cost? Factor by Factor</h2>
      <p class="body mt-3">Every estimate is assembled from the same handful of factors. Some change the graft count, some change the rate, and some decide what sits inside the total. The table shows which way each one pushes.</p>
    </div>

    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data data--fit">
          <caption class="sr-only">Hair transplant cost factors and how each one changes an estimate — a general guide, not a quote</caption>
          <thead><tr><th scope="col">Cost factor</th><th scope="col">How it changes the estimate</th></tr></thead>
          <tbody>
            <?php foreach ($factors as $r): ?>
            <tr><th scope="row" style="white-space:normal;width:38%"><?= e($r[0]) ?></th><td><?= e($r[1]) ?></td></tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <p class="body-s mt-4 measure">Two of these have their own pages: <a href="/unshaven-hair-transplant-in-gurgaon">unshaven hair transplant in Gurgaon</a> explains why working between long hairs is slower, and <a href="/hair-transplant-repair-in-gurgaon">hair transplant repair in Gurgaon</a> covers correcting earlier work.</p>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-hair-transplant',
    'alt'     => 'a sculpted model of a follicular unit with three hairs, on a cream background',
    'eyebrow' => 'What you pay for',
    'title'   => 'What the Estimate Includes',
    'id'      => 'what-the-estimate-includes',
    'tone'    => 'canvas',
    'html'    => '<p>Every DenceSpot estimate is itemised. Anything not covered is named in the document rather than discovered on the day.</p>'
               . '<p><b>Quoted separately, where needed:</b> pre-procedure blood tests, supporting medical therapy such as minoxidil or oral treatment, PRP or GFC sessions planned alongside, and a second staged session where the plan calls for one. They are named in your estimate if they apply to your plan, so the total you are looking at is the total.</p>'
               . '<p><b>The consultation:</b> ' . missing_fact('whether the consultation at the Gurugram clinic is charged, and the fee') . '</p>'
               . '<p><b>Paying in instalments.</b> Instalment options are available through third-party finance providers. Terms and eligibility are set by the provider, not the clinic, and are explained in full before you commit.</p>'
               . '<p><b>Included in every estimate:</b></p>',
    'points'  => [
        'The procedure: extraction, site creation and graft placement',
        'Local anaesthesia, administered and monitored through the session',
        'Post-procedure medication prescribed for the recovery period',
        'Written aftercare guidance on washing, activity and sun exposure',
        'Follow-up reviews, scheduled from the start through the first year',
        'Progress photography at the same angle and lighting at each review',
    ],
    'link'    => ['url' => '/cost-and-emi-options', 'label' => 'Cost, EMI and payment options'],
]) ?>

<section class="section section--white" id="read-a-quote">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Checklist</p>
      <h2 id="how-to-read-a-hair-transplant-quote" class="h2 mt-2">How to Read a Hair Transplant Quote</h2>
      <p class="body mt-3">Take any written quote, from any clinic in Gurugram including this one, and go through it line by line. Where one of the lines below is missing, ask for it to be added before you compare totals.</p>
    </div>

    <div class="grid grid--2 mt-5">
      <?php foreach ($quoteLines as $i => $line): ?>
      <div class="card">
        <p class="eyebrow">Line <?= sprintf('%02d', $i + 1) ?></p>
        <h3 class="h4 mt-2"><?= e($line['title']) ?></h3>
        <p class="body-s mt-2"><?= e($line['text']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>

    <p class="body mt-5 measure">Who may legally perform each step is set out in <a href="/blog/who-can-legally-perform-a-hair-transplant-in-india">who can legally perform a hair transplant in India</a>, and <a href="/blog/how-many-grafts-do-you-need">how many grafts you actually need</a> explains how a count is reached.</p>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-consultation',
    'alt'     => 'a dermatoscope and a notepad on a wooden desk beside a potted fern',
    'eyebrow' => 'Comparing quotes',
    'title'   => 'Five Things to Check Before You Compare Prices',
    'id'      => 'five-things-to-check-before-you-compare-prices',
    'reverse' => true,
    'tone'    => 'canvas',
    'html'    => '<p><b>The arithmetic worth checking.</b> A low per-graft rate applied to a higher graft count can cost more in total than a higher rate on a smaller one. ₹30 × 3,500 grafts is more expensive than ₹45 × 2,200 grafts — and the second plan may be the clinically correct one.</p>'
               . '<p>Two quotes for “2,000 grafts” can describe completely different procedures. Ask any clinic how the graft number was arrived at, and ask to see the donor area mapped. These are the differences that do not appear on a price list:</p>',
    'points'  => [
        'Who operates: whether a doctor performs the extraction and placement, or only the consultation',
        'How grafts were counted: mapped against the donor area, or a round number attached to a photograph',
        'What is included: medication, anaesthesia and follow-up inside the price, or billed later',
        'Session load: how many patients the clinic runs in a day, and who is placing your grafts while that happens',
        'The twelve-month plan: what the clinic does at the year review if density is uneven, in writing, before you pay',
    ],
]) ?>

<section class="section section--ink" id="questions-to-ask">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Before you pay</p>
      <h2 id="questions-worth-asking-any-clinic-about-cost" class="h2 mt-2">Questions Worth Asking Any Clinic About Cost</h2>
      <p class="body-l mt-3">Neutral questions to put to any clinic, this one included. Plain answers, in writing, are what make two estimates comparable.</p>
    </div>

    <div class="grid grid--3 mt-6">
      <?php foreach ($costQuestions as $i => $c): ?>
      <div class="card card--ink">
        <span class="journey__num"><?= sprintf('%02d', $i + 1) ?></span>
        <h3 class="h4 mt-2"><?= e($c['q']) ?></h3>
        <p class="meta mt-2"><?= e($c['why']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>

    <p class="body mt-5" style="max-width:62ch">Going further: <a href="/blog/why-hair-transplant-quotes-vary">why hair transplant quotes vary</a>, <a href="/blog/questions-to-ask-hair-transplant-consultation">questions to ask at a hair transplant consultation</a>, and <a href="/cost-and-emi-options">what to check in an EMI plan</a>.</p>
  </div>
</section>

<section class="section section--white" id="faqs">
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

<?= lp_cta([
    'eyebrow'   => 'Sector 39, Gurugram',
    'title'     => 'Get a Written, Itemised Estimate',
    'text'      => 'Send photos of the front, crown and donor area on WhatsApp, or book an assessment. You get a clinical opinion and a figure in writing — not a sales pitch.',
    'treatment' => 'Hair transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
