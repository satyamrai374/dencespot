<?php
/**
 * /hair-transplant-cost-in-rohini — cost guide for the Rohini (Delhi) clinic.
 *
 * Built 14 Oct 2026 (SEO round 2, COMPETITOR-SEO.md §6.1). Every city-folder
 * competitor has a cost page per city; Rohini had none.
 *
 * No prices: the clinic has not supplied a fee schedule, and no Delhi market
 * survey has been done, so there is no rate, no rupee figure and no
 * market-price table. The page explains the arithmetic instead (graft count ×
 * per-graft rate + what the estimate covers), using the same general Norwood
 * graft bands as /hair-transplant-in-rohini. Worked examples use graft counts
 * only, never money.
 *
 * Rohini page: never mentions the Gurugram clinic and never links a URL
 * containing "gurgaon" (client rule, 14 Oct 2026). Not reviewed by the
 * clinic's doctor: doctor_block(..., false), no review byline, not in
 * MEDICAL_PAGES. Landing-page layout from includes/home-components.php.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/** General patient-education bands — the same figures as /hair-transplant-in-rohini. */
$stages = [
    ['stage' => 'Norwood II',              'grafts' => '800 – 1,500',    'focus' => 'Medical treatment first; a small hairline session once stable'],
    ['stage' => 'Norwood III',             'grafts' => '1,200 – 2,000',  'focus' => 'Hairline and temples'],
    ['stage' => 'Norwood III vertex – IV', 'grafts' => '1,800 – 2,600',  'focus' => 'The front first; the crown as the donor allows'],
    ['stage' => 'Norwood V',               'grafts' => '2,500 – 3,500',  'focus' => 'Front priority, sometimes staged'],
    ['stage' => 'Norwood VI – VII',        'grafts' => '3,000 – 4,500+', 'focus' => 'Staged sessions for coverage, not full density'],
];

/** How the arithmetic is assembled — illustrations of method, never quotes or money. */
$examples = [
    ['plan' => '1,500 grafts, FUE throughout',               'sum' => '1,500 × the FUE rate',                                   'check' => 'Whether medication and reviews sit inside the figure'],
    ['plan' => '2,000 grafts: 600 by DHI at the front, 1,400 by FUE behind', 'sum' => '(600 × the DHI rate) + (1,400 × the FUE rate)', 'check' => 'That both counts and both rates are written down'],
    ['plan' => '3,200 grafts over two stages',                'sum' => 'Each stage: its grafts × its rate, both on the first estimate', 'check' => 'When the second stage would fall, and whether its figure is fixed now'],
    ['plan' => '1,000 grafts, unshaven',                      'sum' => '1,000 × a rate that reflects slower unshaven work',      'check' => 'Whether the count fits into one unshaven day'],
];

$faqs = [
    ['q' => 'How much does a hair transplant cost in Rohini, Delhi?',
     'a' => 'There is no fixed price. The figure is the graft count multiplied by the per-graft rate for the technique used, plus what the estimate covers. The graft count depends on the area to be covered and on what your donor area can safely give, so it is quoted after an examination at the Rohini clinic, itemised and in writing, before any date is booked.'],
    ['q' => 'How much do 2,000 grafts cost?',
     'a' => 'Work it as 2,000 multiplied by the per-graft rate for the technique in your plan, then add anything the estimate lists outside the rate, such as blood tests or supporting treatment. If the front rows are placed by DHI and the rest by FUE, each part is multiplied by its own rate. The rate comes from your assessment, and the first question is whether 2,000 is the right number for your scalp at all.'],
    ['q' => 'Why is there no price list on this page?',
     'a' => 'Because a rate or a starting price on its own decides very little. A lower per-graft rate on a larger graft count can total more than a higher rate on a smaller one, and a starting figure usually describes the smallest case a clinic will take. Setting out the arithmetic lets you compare quotes on the numbers that actually make up the bill.'],
    ['q' => 'Can I get an estimate from photographs sent on WhatsApp?',
     'a' => 'Photographs of your front, crown and donor area are a useful start, and the clinic can tell you whether an assessment is worth booking. A graft count and a written estimate follow an examination, because donor density and hair calibre cannot be measured from a photograph.'],
    ['q' => 'Is DHI more expensive than FUE?',
     'a' => 'Per graft it is commonly priced higher, because loading each graft into an implanter pen and setting it is slower work. Extraction and recovery are the same in both. Many plans use DHI only along the hairline and FUE behind it, which keeps the higher rate to the zone where it is most useful.'],
    ['q' => 'Does an unshaven hair transplant cost more?',
     'a' => 'Usually, for the same graft count. Working between long hairs is slower, and procedure time is much of what the fee pays for. Fewer grafts also fit into one unshaven day, so a larger plan may need a partial shave or two stages instead.'],
    ['q' => 'What does the written estimate include?',
     'a' => 'It sets out the procedure, local anaesthesia, the medication prescribed for recovery, aftercare instructions and the follow-up reviews. Anything not included, such as blood tests or supporting treatment, is named on the estimate rather than left to be discovered later.'],
    ['q' => 'Are blood tests included in the cost?',
     'a' => 'Routine blood tests are commonly requested before a transplant, and clinics differ on whether the price includes them. Which tests you need depends on your history and your medicines, and your written estimate states whether they are included.'],
    ['q' => 'Will I need more than one session, and is the second one costed now?',
     'a' => 'Extensive loss is often staged on purpose, so the donor supply is not spent in one sitting and some is kept for later loss. Where a second stage is likely, you are told at the consultation and it appears in the plan, rather than being raised after the first session.'],
    ['q' => 'Is EMI available for a hair transplant in Rohini?',
     'a' => 'Instalment options through third-party lenders may be available — ask at the consultation. The lender sets the interest, tenure and eligibility, not the clinic, so ask for the total payable on EMI compared with paying outright. <a href="/cost-and-emi-options">Cost, EMI and payment options</a> explains what to check before signing.'],
    ['q' => 'Does health insurance cover a hair transplant?',
     'a' => 'Not usually. Indian health insurers generally treat a transplant for pattern hair loss as cosmetic, so it is paid for privately. Reconstruction after burns, injury or surgery is occasionally assessed differently, so ask your insurer in writing about your own policy.'],
    ['q' => 'Is a lower quote a false economy?',
     'a' => 'Not automatically, and price alone says little either way. Ask who performs the extraction and placement, how the graft number was reached, whether the figure is in grafts or hairs, and what is left out. A low rate attached to a graft count nobody has explained is the combination to question.'],
    ['q' => 'Do I have to decide on the day of the consultation?',
     'a' => 'No. The estimate is yours to take away and compare, and you are not asked to book a date on the day. Hair loss changes slowly, and a sound plan will still be sound after a few weeks of thought.'],
    ['q' => 'Is the estimate given, and the procedure done, at the Rohini clinic?',
     'a' => 'Yes. The examination, the written estimate, the procedure and the follow-up reviews all take place at the Rohini clinic in North-West Delhi, near the Outer Ring Road, open ' . e(HOURS_DISPLAY) . ' (' . e(HOURS_NOTE) . '). The clinic page has <a href="/delhi-clinic">directions to the Rohini clinic</a>.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Hair Transplant Cost in Rohini'],
];

$page = [
    'title'         => 'Hair Transplant Cost in Rohini, Delhi (2026) | DenceSpot',
    'description'   => 'Hair transplant cost in Rohini, Delhi: how a quote is built from graft count and per-graft rate, FUE vs DHI, what a written estimate should list, and EMI.',
    'url'           => '/hair-transplant-cost-in-rohini',
    'crumbs'        => $crumbs,
    'preload_image' => '/assets/img/services/svc-follicle-768.webp',
    'schema'        => [
        schema_delhi_clinic(),
        schema_breadcrumbs($crumbs),
        schema_faq('/hair-transplant-cost-in-rohini', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Cost guide · Rohini, Delhi</span>
        <h1 class="h1 mt-3">Hair Transplant Cost in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">No two plans move the same number of grafts, so there is no fixed price. This guide shows how a quote is put together — the graft count multiplied by a per-graft rate, plus what the estimate covers — what changes each part, and what a written estimate should list before you pay anything. Assessments, estimates and procedures take place at our Rohini clinic in North-West Delhi.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Hair transplant" data-track="book"><?= icon('calendar', 18) ?> Get a Written Estimate</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Send Photos on WhatsApp</a>
        </div>

        <?= ticks([
            'Itemised written estimate after an examination',
            'Graft count mapped from your scalp and donor area',
            'A likely second stage stated at the start',
            'Estimate and procedure at the Rohini clinic',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-follicle-768.webp" srcset="/assets/img/services/svc-follicle-512.webp 512w, /assets/img/services/svc-follicle-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a sculpted cross-section of scalp skin showing hair follicles beneath the surface" width="768" height="960" loading="eager" fetchpriority="high">
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
    'img'     => 'intro-donor',
    'alt'     => 'a mannequin head seen from behind, with the donor area at the back and sides marked',
    'eyebrow' => 'The formula',
    'title'   => 'How a Hair Transplant Quote Is Built',
    'id'      => 'how-a-quote-is-built',
    'html'    => '<p>Almost every quote follows the same arithmetic: <b>the graft count × a per-graft rate</b>, plus the items the estimate covers or lists separately. The rate is the part people compare, yet the graft count moves the total far more, and it cannot be known until your scalp has been examined.</p>'
               . '<p>The count is mapped zone by zone from the area to be covered, then capped by what the donor area at the back and sides can give without visibly thinning. That ceiling is personal: two people at the same stage of loss can have very different donor supplies. What the procedure itself involves is explained on <a href="/hair-transplant-in-rohini">hair transplant in Rohini</a>.</p>',
    'points'  => [
        'Graft count: mapped from your scalp, capped by your donor area',
        'Per-graft rate: set by the technique and how long the work takes',
        'Everything else: what the estimate covers, and what it lists separately',
    ],
    'link'    => ['url' => '/hair-transplant-graft-calculator', 'label' => 'Get a starting range from the graft calculator'],
]) ?>

<section class="section section--canvas" id="grafts">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Graft guidance</p>
      <h2 class="h2 mt-2">Grafts by Norwood Stage: The Number That Moves the Bill</h2>
      <p class="body mt-3">General bands used in patient education, staged on the <a href="/blog/norwood-scale-explained">Norwood scale</a>. They are a starting point for a conversation, not a quote: donor density, hair calibre and how much native hair remains all move the number for an individual.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data">
          <caption class="sr-only">General hair transplant graft bands by Norwood stage — patient education, not a quote</caption>
          <thead>
            <tr><th scope="col">Stage of loss</th><th scope="col">General graft band</th><th scope="col">Usual priority</th></tr>
          </thead>
          <tbody>
            <?php foreach ($stages as $s): ?>
            <tr>
              <th scope="row" style="color:var(--ink);font-size:15px;font-weight:700;text-transform:none;letter-spacing:0;white-space:nowrap"><?= e($s['stage']) ?></th>
              <td style="font-weight:600;color:var(--ink);white-space:nowrap"><?= e($s['grafts']) ?></td>
              <td><?= e($s['focus']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <h3 class="h3 mt-6">Turning a Graft Count into a Figure</h3>
    <p class="body mt-2 measure">The same arithmetic, applied to four kinds of plan. These show how an estimate is assembled; they are not graft recommendations, and no rate is implied.</p>
    <div class="card mt-4" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data">
          <caption class="sr-only">How the cost arithmetic is assembled for different kinds of hair transplant plan — illustrations, not quotes</caption>
          <thead>
            <tr><th scope="col">Example plan</th><th scope="col">How the procedure line is worked out</th><th scope="col">Check on the estimate</th></tr>
          </thead>
          <tbody>
            <?php foreach ($examples as $x): ?>
            <tr>
              <th scope="row" style="color:var(--ink);font-size:15px;font-weight:700;text-transform:none;letter-spacing:0;white-space:normal;min-width:180px"><?= e($x['plan']) ?></th>
              <td style="font-weight:600;color:var(--ink)"><?= e($x['sum']) ?></td>
              <td><?= e($x['check']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="note mt-4">
      <p class="body-s"><b>Grafts, not hairs.</b> A graft is a follicular unit holding one to four hairs, so a figure counted in hairs can be about double the graft figure for the same operation. Check which unit a quote uses before comparing anything else. <a href="/blog/how-many-grafts-do-you-need">How many grafts you actually need</a> explains how a count is reached, and <a href="/blog/donor-area-limits-hair-transplant">why donor supply is a one-time budget</a> covers the ceiling.</p>
    </div>
  </div>
</section>

<section class="section section--white" id="technique">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Technique, shaving and sessions</p>
      <h2 class="h2 mt-2">FUE vs DHI Cost, Unshaven Work and Staged Sessions</h2>
      <p class="body mt-3">Extraction is the same in both techniques: follicular units are taken one at a time from the donor area. What differs is how each graft goes in, and that changes the time the work takes, which is what a per-graft rate mostly pays for.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data">
          <caption class="sr-only">FUE and DHI placement compared on the factors that affect cost</caption>
          <thead>
            <tr><th scope="col">Cost factor</th><th scope="col">FUE placement</th><th scope="col">DHI placement</th></tr>
          </thead>
          <tbody>
            <tr><th scope="row" style="color:var(--ink);text-transform:none;letter-spacing:0;white-space:normal">How grafts go in</th><td>Into recipient sites made beforehand</td><td>Loaded into an implanter pen and set in one movement</td></tr>
            <tr><th scope="row" style="color:var(--ink);text-transform:none;letter-spacing:0;white-space:normal">Pace</th><td>Quicker across broad areas</td><td>Slower per graft</td></tr>
            <tr><th scope="row" style="color:var(--ink);text-transform:none;letter-spacing:0;white-space:normal">Often used for</th><td>Mid-scalp, crown and wider coverage</td><td>Hairline, temples and other detail zones</td></tr>
            <tr><th scope="row" style="color:var(--ink);text-transform:none;letter-spacing:0;white-space:normal">Per-graft rate</th><td>Usually the lower of the two</td><td>Commonly priced higher, for the extra time</td></tr>
            <tr><th scope="row" style="color:var(--ink);text-transform:none;letter-spacing:0;white-space:normal">Extraction and recovery</th><td>The same in both</td><td>The same in both</td></tr>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">Neither technique suits everyone, and many plans use DHI for the front rows and FUE behind, so the estimate carries two rates. Read more on <a href="/fue-hair-transplant-in-rohini">FUE hair transplant in Rohini</a> and <a href="/dhi-hair-transplant-in-rohini">DHI hair transplant in Rohini</a>.</p>

    <div class="grid grid--3 mt-5">
      <div class="card card--pad-lg">
        <?= icon('clock', 22, 'var(--accent-deep)') ?>
        <h3 class="h4 mt-3">Unshaven work</h3>
        <p class="body-s mt-2">Working between long hairs is slower, so the same graft count takes longer and usually costs more, and fewer grafts fit into one day. If your plan needs more, a partial shave, two stages or a shaven session is offered. See <a href="/unshaven-hair-transplant-in-rohini">unshaven hair transplant in Rohini</a>.</p>
      </div>
      <div class="card card--pad-lg">
        <?= icon('calendar', 22, 'var(--accent-deep)') ?>
        <h3 class="h4 mt-3">One sitting or two</h3>
        <p class="body-s mt-2">Extensive loss is often staged deliberately, so donor hair is kept back for loss that has not happened yet. A smaller first stage can mean a higher combined total and a sounder ten-year plan. Where staging is likely, both stages belong on the first estimate.</p>
      </div>
      <div class="card card--pad-lg">
        <?= icon('list', 22, 'var(--accent-deep)') ?>
        <h3 class="h4 mt-3">Supporting treatment</h3>
        <p class="body-s mt-2">Untreated hair around the grafts can keep thinning, so medication, or PRP alongside surgery, is often part of the long-term plan and a separate line on the estimate. <a href="/prp-hair-treatment-cost-in-rohini">PRP hair treatment cost in Rohini</a> covers how a course is priced.</p>
      </div>
    </div>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'At the Rohini clinic',
    'title'   => 'From Assessment to a Written Estimate',
    'id'      => 'estimate-steps',
    'intro'   => 'The figure follows the plan, and the plan follows an examination at the Rohini clinic by a registered medical practitioner.',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                     'title' => 'History and examination',        'text' => 'Your medicines and health history first, then the thinning area and the donor zone examined under magnification and photographed.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned hairline',  'title' => 'Grafts mapped zone by zone',     'text' => 'The hairline is drawn and agreed with you, and grafts are allocated to each zone within what the donor area can spare.'],
        ['img' => 'step-procedure',    'alt' => 'sterile hair-restoration instruments laid out on a tray',  'title' => 'Technique and sessions decided', 'text' => 'FUE, DHI or both; shaven or unshaven; one sitting or two. Each choice is explained, because each one changes the figure.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with review dates circled',                'title' => 'A written estimate to take away', 'text' => 'Itemised, with anything excluded named. You are not asked to book a date on the day.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-hair-transplant',
    'alt'     => 'a sculpted model of a follicular unit with three hairs, on a cream background',
    'eyebrow' => 'Before any deposit',
    'title'   => 'What a Written Estimate Should Itemise',
    'id'      => 'estimate',
    'reverse' => true,
    'html'    => '<p>Ask any clinic, this one included, for a single document before you pay anything. None of the lines below is unusual; the point is that all of them are in writing, so two estimates can be laid side by side.</p>'
               . '<p><b>Paying in instalments.</b> Instalment options through third-party lenders may be available — ask at the consultation. The lender, not the clinic, sets the interest, tenure and eligibility, so compare the total payable on EMI with the figure for paying outright.</p>',
    'points'  => [
        'Who performs each step: extraction, site-making and placement',
        'The technique planned and the zones being treated',
        'The graft count, stated in grafts rather than hairs',
        'One session or staged, and when a second would fall',
        'What happens if the number placed on the day differs from the estimate',
        'What is included: anaesthesia, medication, dressings, aftercare and reviews',
        'What is excluded, such as blood tests or supporting treatment, named one by one',
        'The total payable including tax, the deposit and the refund terms',
    ],
    'link'    => ['url' => '/cost-and-emi-options', 'label' => 'Cost, EMI and payment options'],
]) ?>

<section class="section section--canvas" id="compare">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Comparing quotes</p>
      <h2 class="h2 mt-2">Why Quotes Differ, and How to Compare Them</h2>
      <p class="body mt-3">Two quotes for the same head can be far apart without either being dishonest. Before comparing totals, check that both describe the same operation.</p>
    </div>
    <div class="grid grid--3 mt-5">
      <div class="card"><h3 class="h4">The unit</h3><p class="body-s mt-2">Grafts or hairs. A quote of around 4,500 hairs and one of 2,200 grafts can describe the same procedure, and the hair figure looks like twice the work.</p></div>
      <div class="card"><h3 class="h4">The plan behind the count</h3><p class="body-s mt-2">How much area is covered, at what density, and where the hairline sits. A line drawn lower needs many more grafts, and often ages less well.</p></div>
      <div class="card"><h3 class="h4">Who does the work</h3><p class="body-s mt-2">A procedure is mostly skilled time. Ask who extracts and who places the grafts, by name and qualification; <a href="/blog/who-can-legally-perform-a-hair-transplant-in-india">who can legally perform a hair transplant in India</a> sets out the rule.</p></div>
      <div class="card"><h3 class="h4">What sits inside the figure</h3><p class="body-s mt-2">Blood tests, medication, dressings, reviews and any PRP. One total can look lower simply because it leaves items to be billed later.</p></div>
      <div class="card"><h3 class="h4">Tax</h3><p class="body-s mt-2">Whether a figure is stated before or after tax can make two comparable offers look different. Ask for the total payable, in writing.</p></div>
      <div class="card card--tint"><h3 class="h4">The rate trap</h3><p class="body-s mt-2">A lower rate on 3,500 grafts can total more than a higher rate on 2,200 — and the smaller plan may be the sounder one, keeping donor hair in reserve.</p></div>
    </div>
    <p class="body mt-5 measure"><a href="/blog/why-hair-transplant-quotes-vary">Why hair transplant quotes vary</a> works through each of these in detail. To check a graft figure you have been given, the <a href="/hair-transplant-graft-calculator">hair transplant graft calculator</a> gives a starting range, and the <a href="/hair-loss-assessment">hair loss self-assessment</a> helps you describe your pattern before a visit.</p>
  </div>
</section>

<section class="section section--ink" id="questions">
  <div class="wrap">
    <p class="eyebrow">Questions worth asking any clinic</p>
    <h2 class="h2 mt-2">Questions to Ask Before You Pay</h2>
    <p class="body-l mt-3" style="max-width:60ch">Neutral questions for any clinic in Delhi, including this one. Plain answers to all six are what make two quotes comparable.</p>
    <div class="grid grid--3 mt-6">
      <div class="card card--ink"><p class="eyebrow">01</p><h3 class="h4 mt-2">Who will I see on the day?</h3><p class="body-s mt-2">Who examines you, who extracts, who makes the sites and who places the grafts — by name and qualification.</p></div>
      <div class="card card--ink"><p class="eyebrow">02</p><h3 class="h4 mt-2">How was my graft count reached?</h3><p class="body-s mt-2">From a donor measurement and a mapped plan, or from a photograph? That answer explains most gaps between quotes.</p></div>
      <div class="card card--ink"><p class="eyebrow">03</p><h3 class="h4 mt-2">What if fewer grafts are placed?</h3><p class="body-s mt-2">A count is an estimate. Ask how the bill changes if the number on the day is lower, and get the answer in writing.</p></div>
      <div class="card card--ink"><p class="eyebrow">04</p><h3 class="h4 mt-2">Is a second stage priced now?</h3><p class="body-s mt-2">If staging is likely, its timing and its cost belong on the first estimate, not on a second one after surgery.</p></div>
      <div class="card card--ink"><p class="eyebrow">05</p><h3 class="h4 mt-2">What do the reviews include?</h3><p class="body-s mt-2">How many follow-up visits, at which months, and whether photographs are taken at each one through the first year.</p></div>
      <div class="card card--ink"><p class="eyebrow">06</p><h3 class="h4 mt-2">What are the deposit and refund terms?</h3><p class="body-s mt-2">What is refundable if you withdraw, and how long the estimate stays open, before any money changes hands.</p></div>
    </div>
    <p class="body mt-5" style="max-width:62ch">More in <a href="/blog/questions-to-ask-hair-transplant-consultation">questions to ask at a hair transplant consultation</a>.</p>
  </div>
</section>

<?= doctor_block(
    'Assessments, estimates and procedures at the Rohini clinic are carried out by registered medical practitioners. Every doctor at DenceSpot is listed below with their qualifications.',
    '',
    false
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Hair Transplant Cost in Rohini: Questions Answered</h2>
        <p class="body-s mt-3">General patient education. Your own graft count and figure come from your assessment and are given to you in writing.</p>
        <a class="btn btn--accent mt-4" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask the Rohini Clinic</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= latest_posts_strip('hair-transplant', 3, 'Further Reading') ?>

<?= local_block(
    'Visit Our Rohini Clinic',
    'Assessments, written estimates, hair transplants and follow-up reviews all take place at the Rohini clinic in North-West Delhi, near the Outer Ring Road.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= lp_cta([
    'eyebrow'   => 'Rohini, Delhi',
    'title'     => 'Get a Written Hair Transplant Estimate in Rohini',
    'text'      => 'Book an assessment at the Rohini clinic, or send photographs of your front, crown and donor area on WhatsApp to start. You get an examination, a graft count you can question and an itemised estimate to take away, with no pressure to book a date on the day.',
    'treatment' => 'Hair transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
