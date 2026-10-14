<?php
/**
 * /beard-transplant-cost-gurgaon
 *
 * Cost spoke. Sits between /beard-transplant-gurgaon (the procedure page) and
 * /hair-transplant-cost-in-gurgaon (the pricing hub).
 *
 * Cannibalisation split, which matters because all three could easily collide:
 *   - the procedure page owns "beard transplant in Gurgaon" — what it is,
 *     candidacy, technique, recovery. Its cost section is a short summary that
 *     links here.
 *   - the cost hub owns how the clinic prices work generally, EMI, and what an
 *     estimate includes across every procedure.
 *   - THIS page owns the beard-specific cost question: graft ranges by zone,
 *     what Gurgaon clinics advertise per graft and per zone, why beard grafts
 *     are counted differently from scalp grafts, and how to read a quote.
 *
 * DenceSpot's own price is still not published: the clinic quotes after
 * assessment, and COST_BAND_* in config.php is unset. What IS published, since
 * Sept 2026, is dated market context through market_price_table() — ranges
 * other Gurgaon clinics advertised, never attributed to this clinic. Google's
 * index had shown an old "per graft price" title for this URL, so the page now
 * has to answer that question honestly rather than decline it.
 *
 * ⚠ No Offer / AggregateOffer / price schema for the market ranges. They are
 * not this clinic's prices, and schema.php's rule is that no price appears in
 * structured data unless it is. Refresh $marketAsOf and $marketRows together.
 *
 * 14 Oct 2026: landing-page layout (lp_split / lp_steps / lp_cta); the graft
 * and market tables stay as they were. Per the client, this Gurugram page
 * never mentions the Rohini clinic.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/** Month the advertised ranges below were observed. */
$marketAsOf = 'September 2026';

/** Advertised by other Gurgaon clinics — market context, not DenceSpot's price. */
$marketRows = [
    ['item' => 'Per graft (FUE)',                                'range' => '₹35 – ₹100',            'note' => 'DHI-branded placement is often priced higher. Meaningless without a graft count you can check.'],
    ['item' => 'Moustache (300–400 grafts)',                     'range' => '₹21,000 – ₹40,000',     'note' => 'Priced for a set graft band; a wider or denser moustache needs more.'],
    ['item' => 'Goatee / chin (600–800 grafts)',                 'range' => '₹42,000 – ₹80,000',     'note' => 'Often combined with moustache work, which changes the band.'],
    ['item' => 'Patchy-area or partial beard',                   'range' => '₹30,000 – ₹80,000',     'note' => 'Usually a package figure; ask how many grafts it covers.'],
    ['item' => 'Full beard with sideburns (2,500–3,500 grafts)', 'range' => '₹1,75,000 – ₹3,50,000', 'note' => 'May be staged; ask whether the figure covers every session.'],
    ['item' => 'Pre-procedure blood tests',                      'range' => '₹100 – ₹400 per test',  'note' => 'Often listed separately from the procedure price.'],
];

/**
 * General graft ranges by zone — patient education, not a quote. Mirrored in
 * beard-transplant-gurgaon.php; keep the two arrays in step.
 */
$graftZones = [
    ['zone' => 'Moustache',                       'range' => '300 – 700',          'note' => 'Single hairs along the lip border; a small area with demanding angles.'],
    ['zone' => 'Goatee / chin',                   'range' => '500 – 1,000',        'note' => 'Often planned with the moustache, to close the gap between the two.'],
    ['zone' => 'Patchy cheeks (fill)',            'range' => '500 – 1,000',        'note' => 'Lower where native hair surrounds the patches; higher where it does not.'],
    ['zone' => 'Sideburns',                       'range' => '200 – 400 per side', 'note' => 'Usually for symmetry, or to connect scalp and beard.'],
    ['zone' => 'Cheek line / jawline definition', 'range' => '800 – 1,500',        'note' => 'Sharpening an edge with growth behind it sits lower; building one sits higher.'],
    ['zone' => 'Full beard',                      'range' => '1,500 – 3,000+',     'note' => 'The largest ask on the donor area, and often staged across sessions.'],
];

$faqs = [
    ['q' => 'How much does a beard transplant cost in Gurgaon?',
     'a' => 'It depends on the zones and the graft count. As market context, Gurgaon clinic websites we reviewed in ' . e($marketAsOf) . ' advertised around ₹21,000–₹40,000 for a moustache, ₹42,000–₹80,000 for a goatee and ₹1,75,000–₹3,50,000 for a full beard with sideburns. Those are other clinics’ figures, not ours: DenceSpot quotes after assessment, itemised in writing, before any date is booked.'],
    ['q' => 'How much does a beard transplant cost per graft in Gurgaon?',
     'a' => 'Gurgaon clinic websites we reviewed in ' . e($marketAsOf) . ' advertised roughly ₹35 to ₹100 per graft for FUE, with DHI-branded placement often priced higher. Those are other clinics’ advertised rates, not DenceSpot’s. A per-graft rate only means something alongside a graft count you can check, which is why we quote an itemised total in writing after assessment rather than a rate.'],
    ['q' => 'Why do you not publish your own starting price?',
     'a' => 'Because a starting price is only ever true for the smallest possible case, and it sets an expectation that has to be corrected later. We show what other Gurgaon clinics advertise, clearly dated, so you have a frame of reference. Your own figure comes from the zones being treated and the design agreed with you, and it is given to you in writing.'],
    ['q' => 'What decides the cost of a beard transplant?',
     'a' => 'Mainly the graft count, which follows from which zones are being treated and how much native growth is already there. After that: whether one technique or two are used across different zones, whether there is scar tissue involved, whether the plan is staged, and any supporting treatment.'],
    ['q' => 'Which beard zones cost the most?',
     'a' => 'It scales with area and with how much has to be built from nothing. As general ranges, a full beard is often 1,500–3,000 grafts or more and cheek line or jawline definition 800–1,500, against 300–700 for a moustache and 200–400 per side for sideburns. Existing growth moves every one of those figures, so they are a guide rather than a quote.'],
    ['q' => 'Is a beard transplant cheaper than a scalp transplant?',
     'a' => 'Often the total is lower, because many beard plans need fewer grafts than a large scalp case, but not always: a full beard with sideburns can approach the graft count of a substantial scalp session. Beard placement is also slower per graft, because facial hair angles are more acute and change across the face. Compare graft counts, zones and inclusions rather than headline totals.'],
    ['q' => 'Can I compare beard quotes on price per graft?',
     'a' => 'Only if the graft numbers were arrived at the same way, which they often are not. A low per-graft rate applied to a higher graft count can cost more in total, and extra grafts are paid for twice — once in money and once in donor hair, which is finite. Ask how the number was reached before comparing rates.'],
    ['q' => 'Why are some beard transplant quotes so cheap?',
     'a' => 'Usually because the figure is a per-graft rate or a “starting from” price for the smallest case, not a total. It may leave out anaesthesia, medication, blood tests or follow-up reviews, or sit alongside a graft count nobody explained. Ask for the total, the graft count by zone, what is excluded, and who makes the sites and places the grafts.'],
    ['q' => 'What should be included in a beard transplant estimate?',
     'a' => 'The graft count and the zones it covers, the technique, anaesthesia, medication, dressings, and the scheduled follow-up reviews. Ask specifically what is excluded, such as pre-procedure blood tests, because that is where quotes diverge. Ours is given itemised in writing before any date is booked.'],
    ['q' => 'Are pre-procedure tests included?',
     'a' => 'Routine blood tests are commonly requested before a transplant, and whether a clinic includes them varies. Gurgaon clinics advertised them at around ₹100 to ₹400 per test when we reviewed their websites, often listed separately from the procedure price. Which tests you need depends on your history and medication, and your written estimate states whether they are included.'],
    ['q' => 'Will I need a second session, and does that cost more?',
     'a' => 'Some beard plans are deliberately staged, particularly where a large area is being built from very little growth or where scar tissue is involved. Where a second stage is likely, you are told before the first one and it is costed then rather than raised afterwards.'],
    ['q' => 'Are EMI or payment plans available?',
     'a' => 'Instalment options are available through third-party finance providers, subject to their approval; the clinic does not lend money or set the terms. How it works, and what to check before signing, is set out on our <a href="/cost-and-emi-options">cost and EMI options</a> page. Ask what the total payable is on EMI compared with paying outright.'],
    ['q' => 'Does a cheaper beard transplant mean a worse result?',
     'a' => 'Not automatically, and price alone is a poor proxy for quality. What matters is who performs the procedure, how the graft number was decided, whether the donor was measured, and what the follow-up looks like. A low price attached to an unexamined graft count is the combination to be careful of.'],
    ['q' => 'Does the cost include the consultation?',
     'a' => 'What is included is set out in your written estimate. Bring your questions to the consultation itself, since that is where the plan and the number are actually established.'],
    ['q' => 'Does the price change if I want a different beard shape?',
     'a' => 'Shape changes the graft count, and the graft count changes the price. A denser, more defined beard needs more grafts than a light filling-in of patches. The design is agreed with you before the number is finalised, so the two move together.'],
    ['q' => 'Is a beard transplant permanent, and does that justify the cost?',
     'a' => 'Transplanted follicles keep donor characteristics and generally persist, and beard hair from the scalp keeps growing, so it needs trimming and shaping like the rest of your beard. Native beard hair can still change with age, and no density or permanent outcome can be promised. Whether that justifies the cost is your judgement. What we can do is make sure the number reflects a plan rather than a package.'],
    ['q' => 'What happens at the consultation?',
     'a' => 'Assessment of your existing growth and the zones you want treated, examination of the donor area with density measurement, a design agreed with you, and then a graft count and an itemised written estimate. See the <a href="/beard-transplant-gurgaon">beard transplant page</a> for what the procedure involves.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Beard transplant', 'url' => '/beard-transplant-gurgaon'],
    ['name' => 'Beard transplant cost in Gurgaon'],
];

$page = [
    'title'       => 'Beard Transplant Cost in Gurgaon (2026) | DenceSpot',
    'description' => 'Beard transplant cost in Gurgaon, 2026: grafts by zone, what other clinics advertise (₹35–₹100 per graft; moustache to full beard) and what a quote should include.',
    'url'         => '/beard-transplant-cost-gurgaon',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-beard-768.webp',
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_faq('/beard-transplant-cost-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Beard transplant cost · Gurgaon, <?= e($marketAsOf) ?></span>
        <h1 class="h1 mt-3">Beard Transplant Cost in Gurgaon: Grafts, Prices and What Decides Yours</h1>
        <p class="lead mt-3 measure">How many grafts each beard zone typically needs, what clinics in Gurgaon and Gurugram advertised in <?= e($marketAsOf) ?> — per graft and by zone — and why a per-graft rate on its own can mislead. DenceSpot’s own figure is quoted in writing after assessment; we do not publish a starting price, and the reasons are set out below.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-treatment="Beard transplant" data-track="book"><?= icon('calendar', 18) ?> Get a Written Estimate</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Send Photos on WhatsApp</a>
        </div>

        <?= ticks([
            'Itemised estimate in writing before booking',
            'Graft count from a mapped design, not a package',
            'Staging costed upfront, not raised later',
            'Consultations at our Sector 39, Gurugram clinic',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-beard-768.webp" srcset="/assets/img/services/svc-beard-512.webp 512w, /assets/img/services/svc-beard-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a wooden comb and a wooden beard brush lying on a folded green cloth" width="768" height="960" loading="eager" fetchpriority="high">
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
      <div class="card"><?= icon('rupee', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Priced after assessment</p><p class="body-s mt-2">A number that reflects your face, not an average.</p></div>
      <div class="card"><?= icon('doc', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Itemised in writing</p><p class="body-s mt-2">You see what is included before you decide.</p></div>
      <div class="card"><?= icon('pencil', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Design first, count second</p><p class="body-s mt-2">The graft number follows the shape you agreed.</p></div>
      <div class="card"><?= icon('list', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Staging declared upfront</p><p class="body-s mt-2">A likely second session is costed at the start.</p></div>
      <div class="card"><?= icon('shield', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Count shown by zone</p><p class="body-s mt-2">Donor supply is finite, so you can check every graft.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="zones">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Zone by zone</p>
      <h2 class="h2 mt-2">How Many Grafts Each Beard Zone Needs</h2>
      <p class="body-l mt-3">Graft count is the main driver of beard transplant cost, and it follows the zones treated and how much native growth is already there. These are general patient-education ranges, not a quote — your own count comes from a design mapped on your face.</p>
    </div>
    <div class="card mt-6" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data" style="min-width:720px">
          <caption class="sr-only">General beard transplant graft ranges by zone — patient education, not a quote</caption>
          <thead>
            <tr><th scope="col">Zone</th><th scope="col">General graft range</th><th scope="col">What moves it</th></tr>
          </thead>
          <tbody>
            <?php foreach ($graftZones as $z): ?>
            <tr>
              <th scope="row" style="color:var(--ink);font-size:15px;font-weight:700;text-transform:none;letter-spacing:0"><?= e($z['zone']) ?></th>
              <td style="font-weight:600;color:var(--ink);white-space:nowrap"><?= e($z['range']) ?></td>
              <td><?= e($z['note']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="fine mt-3" style="max-width:78ch"><b>General ranges, not a quote.</b> Zones share borders, so combined plans usually need fewer grafts than the ranges added together, and existing growth lowers every figure.</p>
    <div class="grid grid--3 mt-5">
      <div class="card card--pad-lg">
        <p class="h4">Why beard grafts take longer</p>
        <p class="body-s mt-2">Facial hair sits at a much more acute angle than scalp hair, and the direction changes across every zone — downward on the cheeks, outward along the jaw, and shifting across the upper lip.</p>
        <p class="body-s mt-3">Every site has to be made to match. That is slower per graft than scalp work, and time is the main cost in this procedure.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">The donor is the same donor</p>
        <p class="body-s mt-2">Beard grafts come from the same finite scalp donor area a hair transplant would use. Grafts spent on your beard are not available for your scalp later.</p>
        <p class="body-s mt-3">That is worth weighing if you have any degree of scalp hair loss; <a href="/blog/donor-area-limits-hair-transplant">why donor supply is a one-time budget</a> explains the arithmetic.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">A graft count is not a result</p>
        <p class="body-s mt-2">The number tells you the size of the job, not how it will look. Angle, single-hair borders and density decide that — see <a href="/blog/beard-transplant-what-to-expect">what to expect from a beard transplant</a>.</p>
        <p class="body-s mt-3">The smallest and most detailed zone has its own section: <a href="/beard-transplant-gurgaon#moustache">moustache transplant</a>.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="market-prices">
  <div class="wrap">
    <div style="max-width:66ch">
      <p class="eyebrow">Market context · <?= e($marketAsOf) ?></p>
      <h2 class="h2 mt-2">What Gurgaon Clinics Advertise for a Beard Transplant</h2>
      <p class="body-l mt-3">Most people searching for beard transplant cost want a number, so here is what clinics in Gurgaon and Gurugram publicly advertised on their websites in <?= e($marketAsOf) ?>, per graft and by zone. It is a frame of reference, not our price list.</p>
    </div>
    <?= market_price_table('Advertised beard transplant prices in Gurgaon, ' . $marketAsOf, $marketRows, $marketAsOf) ?>

    <h3 class="h3 mt-6">How to Read an Advertised Beard Transplant Price</h3>
    <div class="grid grid--2 mt-4">
      <div class="card"><p class="h4">A per-graft rate is half a sum</p><p class="body-s mt-2">Rate × graft count is the total, and the count is the half that is easy to inflate. For example, ₹40 a graft on 2,500 grafts costs more than ₹70 a graft on 1,200 — and the extra grafts come out of a donor area that does not refill. Ask how the count was reached before comparing rates.</p></div>
      <div class="card"><p class="h4">“Starting from” is the smallest case</p><p class="body-s mt-2">A starting price is usually true only for the least work a clinic will accept — a small patch or a thin moustache. If your plan involves cheeks, jawline or a full beard, the starting figure does not describe you.</p></div>
      <div class="card"><p class="h4">Check what is included</p><p class="body-s mt-2">Local anaesthesia, procedure-day and take-home medication, dressings, pre-procedure blood tests and follow-up reviews can each sit inside or outside an advertised figure. Quotes differ more in what they leave out than in their rate.</p></div>
      <div class="card"><p class="h4">Paying in instalments</p><p class="body-s mt-2">EMI can spread the cost, but it does not change the number worth scrutinising. How third-party finance works is on our <a href="/cost-and-emi-options">cost and EMI options</a> page, and what applies to you is confirmed with your written estimate.</p></div>
    </div>
    <p class="body mt-5 measure">Why quotes for the same procedure can differ so widely is covered in more depth in <a href="/blog/why-hair-transplant-quotes-vary">why hair transplant quotes vary</a>.</p>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-follicle',
    'alt'     => 'a sculpted cross-section of scalp skin showing hair follicles beneath the surface',
    'eyebrow' => 'The starting point',
    'title'   => 'Why There Is No Single Beard Transplant Price',
    'id'      => 'why-no-price',
    'html'    => '<p>A beard transplant is not one procedure. Filling two patchy areas on the cheeks of a man who already has reasonable growth, and building a full beard for someone with almost none, are separated by a large multiple in graft numbers, so one price for both would be meaningless.</p>'
               . '<p>The graft count drives cost, and it comes from two things: which zones you want treated, and how much native hair already grows in them. Both are established by looking at your face, which is why the estimate follows the consultation rather than preceding it.</p>'
               . '<p>The advertised ranges above are a realistic frame of reference before you walk into any clinic, including this one. They are other clinics’ figures, not ours, and not a promise that your case falls inside them. For the procedure itself — technique, recovery, the right age and donor options — see <a href="/beard-transplant-gurgaon">beard transplant in Gurgaon</a>; for pricing across all our procedures, the <a href="/hair-transplant-cost-in-gurgaon">hair transplant cost guide</a>.</p>',
    'points'  => [
        'An itemised written estimate after assessment instead of a price list',
        'Zones treated, grafts for each, the technique and what the figure covers',
        'A likely second stage stated and costed at the same time, not once you are committed',
    ],
]) ?>

<?= lp_steps([
    'eyebrow' => 'How your figure is reached',
    'title'   => 'From Assessment to a Written Estimate',
    'id'      => 'estimate-steps',
    'intro'   => 'The number follows the plan, and the plan follows an examination of your face and your donor area.',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                 'title' => 'Assessment',             'text' => 'Your existing growth and the zones you want treated are assessed, and the donor area is examined with density measurement.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned line', 'title' => 'Design and graft count', 'text' => 'A design is agreed with you, then grafts are allocated zone by zone. Shape changes the count, so the two move together.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with review dates circled',           'title' => 'Your written estimate',  'text' => 'Itemised by zone, with anything excluded stated. You take it away; there is no expectation that you book on the day.'],
    ],
]) ?>

<section class="section section--white" id="drivers">
  <div class="wrap">
    <p class="eyebrow">Cost drivers</p>
    <h2 class="h2 mt-2">The Six Things That Move Your Number</h2>
    <p class="body-l mt-3 measure">In rough order of how much they matter.</p>
    <div class="grid grid--3 mt-5">
      <div class="card"><p class="h4">Zones treated</p><p class="body-s mt-2">Cheeks, jawline, moustache, chin and sideburns are separate areas with separate graft requirements. Treating one is a different job from treating all five.</p></div>
      <div class="card"><p class="h4">Existing growth</p><p class="body-s mt-2">Thickening a beard that already grows patchily needs far fewer grafts than building density where almost nothing grows. This is often the largest single difference between two quotes.</p></div>
      <div class="card"><p class="h4">Density aimed for</p><p class="body-s mt-2">A light filling-in and a denser, more defined beard are different graft counts for the same area. The target is agreed as part of the design.</p></div>
      <div class="card"><p class="h4">Technique used</p><p class="body-s mt-2">Some plans use one method throughout, others use different placement approaches across different zones. It affects the time the procedure takes.</p></div>
      <div class="card"><p class="h4">Complexity</p><p class="body-s mt-2">Scar tissue from injury, acne scarring, cleft repair or previous work makes placement slower and less predictable, and sometimes requires staging.</p></div>
      <div class="card"><p class="h4">Supporting treatment</p><p class="body-s mt-2">Any medical treatment planned alongside the surgery is costed separately and stated on the estimate.</p></div>
    </div>
  </div>
</section>

<section class="section section--ink" id="compare">
  <div class="wrap">
    <p class="eyebrow">Comparing quotes</p>
    <h2 class="h2 mt-2">Five Questions to Ask Any Clinic</h2>
    <p class="body-l mt-3" style="max-width:60ch">A beard quote is only comparable to another beard quote if you know how each number was reached. These five questions surface that.</p>
    <div class="grid grid--3 mt-6">
      <div class="card card--ink"><p class="eyebrow">01</p><p class="h4 mt-2">How was the graft number decided?</p><p class="body-s mt-2">From an examination and a mapped design, or from a photograph and a package tier? This single answer explains most price differences.</p></div>
      <div class="card card--ink"><p class="eyebrow">02</p><p class="h4 mt-2">Was the donor area measured?</p><p class="body-s mt-2">Grafts come from a finite supply. A quote made without measuring what that supply can spare is a quote made without the key fact.</p></div>
      <div class="card card--ink"><p class="eyebrow">03</p><p class="h4 mt-2">What is excluded?</p><p class="body-s mt-2">Anaesthesia, medication, dressings, blood tests and follow-up reviews. Quotes diverge most in what they leave out, not in the per-graft rate.</p></div>
      <div class="card card--ink"><p class="eyebrow">04</p><p class="h4 mt-2">Who performs the procedure?</p><p class="body-s mt-2">Ask who makes the sites and who places the grafts, by name and qualification. It is a fair question and the answer should be immediate.</p></div>
      <div class="card card--ink"><p class="eyebrow">05</p><p class="h4 mt-2">Is a second session likely?</p><p class="body-s mt-2">If staging is probable, it should appear in the first estimate. A quote that becomes two quotes after surgery was never the cheaper one.</p></div>
      <div class="card card--ink"><p class="eyebrow">The pattern</p><p class="h4 mt-2">Cheap rate, inflated count</p><p class="body-s mt-2">A low per-graft price applied to a graft number nobody justified is a common way a beard quote ends up costing more — in money, and in donor hair you cannot get back.</p></div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-procedure',
    'alt'     => 'two pairs of tweezers, six punch tips and a slim steel handle laid out on a green surgical cloth',
    'eyebrow' => 'What the estimate covers',
    'title'   => 'Reading Your Written Estimate',
    'id'      => 'included',
    'reverse' => true,
    'html'    => '<p>Your estimate is itemised so that you can see what drives the total rather than being handed a single figure. It also states anything that is not included and whether a second stage is anticipated, and any supporting medical treatment is listed and costed separately.</p>'
               . '<p>You take the estimate away with you. There is no discount for booking on the day, because a price that expires is a pressure tactic rather than a price. Payment and instalment options are set out on our <a href="/cost-and-emi-options">cost and EMI options</a> page, and what applies to you is confirmed at consultation.</p>',
    'points'  => [
        'Itemised: zones treated and the grafts allocated to each',
        'Itemised: the technique used across each zone',
        'Itemised: anaesthesia, procedure-day medication, dressings and post-procedure supplies',
        'Itemised: scheduled follow-up reviews',
        'Stated separately: any anticipated second stage and supporting medical treatment',
        'Stated separately: whether pre-procedure blood tests are included, and anything excluded',
    ],
]) ?>

<?= doctor_block(
    'Consultations and procedures are carried out by registered medical practitioners at the clinic. The graft count in a beard estimate is set after the beard zones and the scalp donor area have been examined.'
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Beard Transplant Cost FAQs</h2>
        <p class="body-s mt-3">Answers are general guidance. Advertised figures are other clinics’ published ranges, not ours. Your own figure comes from your assessment and is given to you itemised in writing.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'Beard Transplant Estimates at Our Gurugram Clinic',
    'Our Gurugram clinic is in Sector 39, ' . NAP_LANDMARK . '. Consultations and procedures are carried out by registered medical practitioners at the clinic, and beard transplant estimates are given in writing after assessment.'
) ?>

<?= lp_cta([
    'eyebrow'   => 'Sector 39, Gurugram',
    'title'     => 'Get a Beard Transplant Estimate Based on Your Face',
    'text'      => 'Send photos of your cheeks, jawline and chin in daylight, or come in and have the zones mapped properly. You will leave with an itemised written estimate and a graft count you can actually interrogate.',
    'treatment' => 'Beard transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
