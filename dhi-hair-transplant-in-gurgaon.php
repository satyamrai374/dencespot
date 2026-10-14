<?php
/**
 * /dhi-hair-transplant-in-gurgaon — page #18.
 *
 * Technique spoke off /hair-transplant-in-gurgaon. Content ported from the
 * design build.
 *
 * Cannibalisation split: /fue-hair-transplant-in-gurgaon owns extraction and
 * donor supply; this page owns placement — implanter control, hairline design
 * and the unshaven question. The FUE/DHI comparison table lives here because
 * DHI is the term people search when they are trying to choose.
 *
 * Deliberate position: the cost section argues AGAINST whole-case DHI. It is
 * the honest recommendation and the opposite of what competitor pages do.
 *
 * Sep 2026 — rebuilt against the live SERP (competitor research, 13 Sep 2026:
 * DHI India, DHI International, Cult Aesthetics, Kibo, QHT). Gaps no ranking
 * page fills, now covered here: implanter types; a Norwood-by-technique plan;
 * the rupee arithmetic of when DHI is not worth it; a typical procedure day;
 * days 0–14; what actually decides graft survival (without a percentage); and
 * the Sector 39 / Medanta location, which none of 22 competitor pages mention.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';
// $faqs quotes market constants, which header.php would otherwise load too late.
require_once __DIR__ . '/includes/market-prices.php';

/** Where DHI earns its premium, stage by stage. Graft bands match the pillar. */
$plans = [
    ['case' => 'Norwood II',              'dhi' => 'Often a good fit — temples and a soft front edge.',             'fue' => 'Equally reasonable for a small, stable recession.',      'plan' => 'Small session, 800–1,500 grafts, once the pattern is stable.'],
    ['case' => 'Norwood III',             'dhi' => 'The front rows, where angle control shows most.',                 'fue' => 'Behind the hairline, where density matters more than angle.', 'plan' => 'DHI at the front, DHI or FUE behind; 1,200–2,000 grafts.'],
    ['case' => 'Norwood III vertex–IV',   'dhi' => 'Hairline and temples only.',                                      'fue' => 'The crown, which needs coverage rather than precision.',  'plan' => 'Combined plan; 1,800–2,600 grafts.'],
    ['case' => 'Norwood V',               'dhi' => 'The front edge at most.',                                       'fue' => 'Most of the case.',                                     'plan' => 'Mainly FUE placement, often staged; 2,500–3,500 grafts.'],
    ['case' => 'Norwood VI–VII',          'dhi' => 'Little beyond refining the hairline.',                            'fue' => 'The whole case, across sessions.',                      'plan' => 'Staged FUE to build coverage; 3,000–4,500+ grafts.'],
    ['case' => 'Women, frontal or parting','dhi' => 'Often preferred — work between existing hair with minimal trimming.', 'fue' => 'Where larger areas need filling.',                   'plan' => 'After the medical workup; graft numbers set by the zone.'],
    ['case' => 'Repairing a hairline',    'dhi' => 'Softening a harsh line and placing between existing grafts.',     'fue' => 'Adding density behind the corrected line.',            'plan' => 'Assessed individually; sometimes grafts are removed first.'],
];

/**
 * A hypothetical DHI premium over FUE, for the worked example only. Not a
 * DenceSpot rate and not a market average — a round number chosen so the
 * arithmetic is easy to follow. The copy says so.
 */
$examplePremium   = 30;
$exampleWhole     = 2500;
$exampleHairline  = 800;

$faqs = [
    ['q' => 'What is a DHI hair transplant?',
     'a' => 'A hair transplant in which each extracted follicular unit is loaded into a fine implanter and placed into the scalp in a single action that creates the site and sets the graft together. Extraction is the same as <a href="/fue-hair-transplant-in-gurgaon">FUE</a>; DHI describes the placement stage.'],
    ['q' => 'What is the real difference between DHI and FUE?',
     'a' => 'Extraction is essentially identical. In FUE all the recipient sites are made first and grafts are then placed into them; in DHI the implanter makes each site and delivers the graft in one motion, setting depth, angle and direction per graft. DHI gives finer control and is slower; FUE placement is more efficient over large areas.'],
    ['q' => 'Is DHI better than FUE?',
     'a' => 'Not universally. DHI has a genuine advantage in hairlines, temples and work between existing hairs. For covering a large crown, conventional FUE placement generally gives the same coverage in less time and at lower cost. Our <a href="/blog/fue-vs-dhi-hair-transplant">FUE vs DHI guide</a> sets out the full comparison.'],
    ['q' => 'What implanter is used for DHI?',
     'a' => 'DHI uses hollow implanter pens — often called Choi-type implanters — fitted with fine needles sized to the graft. Sharp implanters make the site and place the graft in one action. Some clinics use blunt implanters into pre-made sites, a hybrid that is also sold as DHI. Ask which is being used, and who is holding it.'],
    ['q' => 'Does DHI mean I do not have to shave my head?',
     'a' => 'It makes unshaven or partially shaved work easier, which is why it is advertised that way. The donor area still needs trimming so grafts can be extracted accurately, and unshaven work is slower and realistic only for smaller graft numbers. What is possible in your case is decided at consultation — see <a href="/unshaven-hair-transplant-in-gurgaon">unshaven hair transplant</a>.'],
    ['q' => 'What is a “DHT hair transplant”?',
     'a' => 'A mistake, or a brand name borrowing a hormone’s initials. DHT is dihydrotestosterone, the hormone involved in pattern hair loss — not a surgical technique. Pages advertising a DHT transplant usually mean implanter placement, which is DHI.'],
    ['q' => 'Does DHI give better graft survival?',
     'a' => 'It is often claimed, on the basis that grafts spend less time outside the body and are handled less. It is a reasonable argument, but the published evidence does not establish DHI as reliably better than well-executed FUE on survival. Surgeon skill and graft handling matter more than the instrument, and no clinic can verify a survival percentage for your head before surgery.'],
    ['q' => 'How many grafts can be done with DHI in one day?',
     'a' => 'Fewer than with conventional FUE placement, because loading implanters one graft at a time is slower. DHI suits defined areas rather than very large multi-zone sessions. Where a big area needs covering, a combined plan is usually the better answer.'],
    ['q' => 'How long does a DHI procedure take?',
     'a' => 'Most sessions take the better part of a day, longer than an FUE of the same size, because every graft is loaded into an implanter individually. A small hairline or temple session can finish sooner. It is a day case under local anaesthetic and you go home the same evening.'],
    ['q' => 'Is DHI painful?',
     'a' => 'The local anaesthetic injections are the uncomfortable part, as with any hair transplant. The placement itself is not typically painful. Soreness and some swelling for a few days afterwards are normal and managed with prescribed medication.'],
    ['q' => 'Does DHI recover faster than FUE?',
     'a' => 'No. The donor is treated the same way, the biology is the same, and the shedding and regrowth phases follow the same course — crusting in the first week or two, shedding within a month, new growth from around three to four months, a fair assessment at ten to twelve.'],
    ['q' => 'Why is DHI more expensive?',
     'a' => 'Chair time and consumables. Each graft is handled and loaded individually, which takes longer, and implanter tips are single-use. You are paying for placement precision, which is worth it in a hairline and often is not across a crown. Our <a href="/hair-transplant-cost-in-gurgaon">hair transplant cost guide</a> sets out what moves the number.'],
    ['q' => 'How much does a DHI hair transplant cost in Gurgaon?',
     'a' => 'Gurgaon clinics we reviewed in ' . MARKET_PRICES_AS_OF . ' advertised DHI at roughly ₹40–₹200 per graft, usually above their own FUE rate, and the few that publish a total put 2,000–2,500 grafts at ₹80,000–₹2,25,000. Your cost depends on graft numbers, zones, whether the whole case is DHI and the shaving approach. We quote in writing after assessment.'],
    ['q' => 'Is DHI worth the extra cost for the crown?',
     'a' => 'Usually not. The crown needs graft numbers and coverage far more than hairline-level angle control, so conventional FUE placement generally gives the same result in less time and for less money. A combined plan — DHI at the front, FUE behind — keeps the premium where it actually buys something.'],
    ['q' => 'What is the success rate of DHI?',
     'a' => 'No clinic can reliably give you one for your own head before surgery. Survival figures quoted in marketing are rarely measured the same way twice, and they are not a promise about your scalp. What can be judged is the result at ten to twelve months against standardised photographs. See <a href="/blog/hair-transplant-promises-and-success-rates">what success-rate claims actually mean</a>.'],
    ['q' => 'Can DHI fix a hairline that was done badly elsewhere?',
     'a' => 'Often it can help. Softening a line that was placed too straight or too low, and adding single hairs at the correct angles between existing grafts, is exactly the situation implanter control suits. Sometimes grafts also need removing, which is assessed separately — see <a href="/hair-transplant-repair-in-gurgaon">hair transplant repair</a>.'],
    ['q' => 'Can women have DHI?',
     'a' => 'Yes, and it is frequently the better choice for women, because the work is usually concentrated along a frontal line or parting and can often be done with minimal trimming. Hormonal, thyroid, iron and post-partum causes are investigated and treated before any surgery is planned. See <a href="/hair-transplant-for-women-in-gurgaon">hair transplant for women</a>.'],
    ['q' => 'When can I wash my hair after DHI?',
     'a' => 'On the schedule in your written aftercare, which is explained before you leave. The first washes are gentle and specific, because grafts are not yet secure in the first days. Our day-by-day account of <a href="/blog/first-14-days-after-a-hair-transplant">the first 14 days after a hair transplant</a> describes what each stage usually looks like.'],
    ['q' => 'Where is DenceSpot’s DHI clinic in Gurgaon?',
     'a' => 'At ' . nap_address_line() . ', ' . NAP_LANDMARK . '. Consultations and procedures are carried out by registered medical practitioners at the clinic.'],
    ['q' => 'What happens at the DHI consultation?',
     'a' => 'History and medication review, scalp and donor examination, pattern staging, photographs for your record, and a written plan — including an honest recommendation on whether DHI, FUE or a combination fits your case, with the cost difference explained.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair transplant', 'url' => '/hair-transplant-in-gurgaon'],
    ['name' => 'DHI hair transplant in Gurgaon'],
];

$page = [
    'title'       => 'DHI Hair Transplant in Gurgaon: Cost & Candidacy | DenceSpot',
    'description' => 'DHI hair transplant in Gurgaon near Medanta: how implanter placement works, where DHI suits a case better than FUE, and advertised ₹40–₹200 per graft rates.',
    'url'         => '/dhi-hair-transplant-in-gurgaon',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-follicle-768.webp',
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/dhi-hair-transplant-in-gurgaon', [
            'name'          => 'DHI Hair Transplant',
            'alternateName' => ['Direct hair implantation', 'DHI hair restoration', 'Implanter pen hair transplant'],
            'procedureType' => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'Follicular units are extracted from the donor area as in FUE, then each graft is loaded into a hollow implanter and placed directly into the recipient area in a single action, which creates the site and sets the graft at a controlled depth, angle and direction simultaneously. Performed as a day case under local anaesthetic.',
            'preparation'   => 'Clinical assessment of hair-loss pattern and donor density, review of medication and blood-thinning agents, blood investigations, and a hairline design agreed with the patient before the procedure date.',
            'followup'      => 'Wash instruction and review in the first week, then scheduled photographic reviews through the shedding and regrowth phases.',
            'expectedPrognosis' => 'Transplanted hairs commonly shed within the first weeks; new growth typically begins around three to four months with a fuller result at approximately ten to twelve months. Outcomes vary between patients and cannot be promised.',
        ]),
        schema_faq('/dhi-hair-transplant-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">DHI hair transplant in Gurgaon</span>
        <h1 class="h1 mt-3">DHI Hair Transplant in Gurgaon for Hairlines and Detail Zones</h1>
        <p class="lead mt-3 measure">DHI is not a different way of taking hair out — extraction is the same as FUE. What changes is placement: each graft is loaded into a fine implanter and set in one action, giving close control of depth, angle and spacing. That control is worth most exactly where it is hardest to fake, along the hairline. At our Gurugram clinic in Sector 39, <?= e(NAP_LANDMARK) ?>, consultations and procedures are carried out by registered medical practitioners.</p>
        <?= medical_review_line() ?>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-treatment="Hair transplant" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Each graft set at a controlled angle and depth',
            'No pre-made incisions in the recipient area',
            'Suited to hairlines, temples and detail work',
            NAP_LOCALITY . ' · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-follicle-768.webp" srcset="/assets/img/services/svc-follicle-512.webp 512w, /assets/img/services/svc-follicle-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a sculpted cross-section of scalp skin showing hair follicles and their roots" width="768" height="960" loading="eager" fetchpriority="high">
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
      <div class="card"><?= icon('pencil', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Implanter placement</p><p class="body-s mt-2">Depth, angle and direction set in one action.</p></div>
      <div class="card"><?= icon('hairline', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Built for hairlines</p><p class="body-s mt-2">Where irregularity and angle decide the result.</p></div>
      <div class="card"><?= icon('clock', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Short time out of body</p><p class="body-s mt-2">Grafts go from extraction to placement quickly.</p></div>
      <div class="card"><?= icon('shield', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">No linear scar</p><p class="body-s mt-2">Same donor healing as FUE — dots, not a line.</p></div>
      <div class="card"><?= icon('info', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Told when FUE is better</p><p class="body-s mt-2">Large crowns are usually not a DHI job.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="at-a-glance">
  <div class="wrap">
    <div class="split split--top" style="align-items:start">
      <div>
        <p class="eyebrow">The short answer</p>
        <h2 class="h2 mt-2">DHI Hair Transplant at a Glance</h2>
        <p class="body-l mt-3 measure">DHI — direct hair implantation — is FUE extraction followed by implanter-pen placement, one graft at a time. It gives finer control of angle and depth than placing grafts into pre-made sites, which matters most in the hairline and temples, and it is slower and usually dearer per graft. For large crowns, conventional FUE placement generally delivers the same coverage for less.</p>
        <p class="body mt-3 measure">So the useful question is not whether DHI is better. It is which zones of your scalp need its precision — and whether you are being quoted DHI for the zones that do not.</p>
      </div>
      <div class="grid grid--2">
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Carried out by</p><p class="h4 mt-1">Registered medical practitioners</p></div>
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Typically suited to</p><p class="h4 mt-1">Hairline, temples, detail work</p></div>
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Less suited to</p><p class="h4 mt-1">Large crowns, very big sessions</p></div>
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Procedure</p><p class="h4 mt-1">Day case, local anaesthetic</p></div>
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Recovery vs FUE</p><p class="h4 mt-1">The same — not faster</p></div>
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Result judged at</p><p class="h4 mt-1">10 – 12 months</p></div>
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Advertised in Gurgaon</p><p class="h4 mt-1">₹40 – ₹200 per graft</p></div>
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Where</p><p class="h4 mt-1">Sector 39, <?= e(NAP_LANDMARK) ?></p></div>
      </div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'intro-recipient',
    'alt'     => 'a mannequin head seen from the front, with short hair and a planned hairline drawn in pencil',
    'eyebrow' => 'The basics, plainly',
    'title'   => 'What Is a DHI Hair Transplant?',
    'id'      => 'what-is',
    'tone'    => 'canvas',
    'html'    => '<p>DHI stands for direct hair implantation, and it describes the placement stage of a hair transplant, not the whole procedure. Follicular units are extracted exactly as in FUE — individually, with a fine punch, leaving dot healing rather than a line.</p>'
               . '<p>The difference comes next. In conventional FUE, recipient sites are made first and grafts are then placed into them. In DHI each graft is loaded into a hollow implanter with a fine needle tip, and the site is made and the graft delivered in one motion, so depth, angle, direction and spacing are set graft by graft.</p>'
               . '<p>Control is finer, which matters most in the first rows of a hairline, where hairs emerge at very shallow angles and any uniformity reads as artificial — see <a href="/blog/natural-hairline-design-explained">what makes a hairline look natural</a>. Each graft also spends less time outside the body.</p>'
               . '<p>The trade-off is throughput. Loading implanters one graft at a time is slower, so DHI suits defined areas rather than very large sessions and usually costs more per graft; across a whole crown, <a href="/fue-hair-transplant-in-gurgaon">conventional FUE placement</a> is often the better use of time and money.</p>',
    'points'  => [
        'A placement method, not a separate operation',
        'Extraction, healing and growth timelines are the same as FUE',
        'The control over angle and depth is what you are paying for',
    ],
    'link'    => ['url' => '/hair-transplant-in-gurgaon', 'label' => 'Hair transplant overview'],
]) ?>

<section class="section section--white" id="candidacy">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Suitability</p>
      <h2 class="h2 mt-2">Who DHI Suits</h2>
      <p class="body mt-3">DHI earns its extra time and cost in some cases and not others. Being told which one you are is more useful than being sold the newer-sounding option.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card"><?= icon('hairline', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Hairline design</h3><p class="body-s mt-2">The frontal rows, where single-hair grafts must sit at shallow angles with deliberate irregularity. This is where implanter control shows most clearly — see <a href="/hairline-transplant-in-gurgaon">hairline restoration</a>.</p></div>
      <div class="card"><?= icon('scale', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Temples and temporal points</h3><p class="body-s mt-2">Very fine, acutely angled hair where getting the direction wrong is immediately visible. Small graft numbers, high precision.</p></div>
      <div class="card"><?= icon('user', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Refining existing density</h3><p class="body-s mt-2">Adding grafts between hairs that are already there, where pre-made sites risk damaging what still grows.</p></div>
      <div class="card"><?= icon('heart', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Women&rsquo;s frontal restoration</h3><p class="body-s mt-2">Where shaving is unacceptable and the work is concentrated along a parting or frontal line, DHI can often be done with minimal trimming.</p></div>
      <div class="card"><?= icon('list', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Small, defined sessions</h3><p class="body-s mt-2">A few hundred to a couple of thousand grafts in one region, where precision matters more than raw coverage speed.</p></div>
      <div class="card"><?= icon('pencil', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Correcting an artificial hairline</h3><p class="body-s mt-2">Softening a line placed too straight or too low elsewhere, working around existing grafts without disturbing them.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="by-stage">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">DHI or FUE, zone by zone</p>
      <h2 class="h2 mt-2">Which Technique Fits Your Stage of Hair Loss?</h2>
      <p class="body mt-3">Most real plans are not “a DHI” or “an FUE”. They put implanter precision where it shows and faster placement where coverage matters. This is how that usually divides by <a href="/blog/norwood-scale-explained">Norwood stage</a> — general guidance, confirmed only after your donor area is examined.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data" style="min-width:860px">
          <caption class="sr-only">Where DHI and FUE placement each fit, by Norwood stage and case type, with the usual plan and graft band</caption>
          <thead>
            <tr><th scope="col">Case</th><th scope="col">Where DHI helps</th><th scope="col">Where FUE placement fits</th><th scope="col">Usual plan</th></tr>
          </thead>
          <tbody>
            <?php foreach ($plans as $p): ?>
            <tr>
              <th scope="row" style="color:var(--ink);font-size:15px;font-weight:700;text-transform:none;letter-spacing:0;white-space:nowrap"><?= e($p['case']) ?></th>
              <td><?= e($p['dhi']) ?></td>
              <td><?= e($p['fue']) ?></td>
              <td style="font-weight:600;color:var(--ink)"><?= e($p['plan']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">Graft bands are the same patient-education ranges used across this site. Your own number comes from a zone-by-zone map of your scalp; the <a href="/hair-transplant-graft-calculator">graft calculator</a> gives a starting range.</p>
  </div>
</section>

<section class="section section--white" id="implanter">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">What you are actually paying for</p>
      <h2 class="h2 mt-2">What the Implanter Changes, and What It Does Not</h2>
      <p class="body mt-3">DHI is marketed hard in Gurgaon, often as though it were a categorically better operation. It is a placement technique with real advantages in specific places. Here is the honest split.</p>
    </div>

    <div class="card mt-6" style="padding:0;overflow:hidden">
      <div class="table-scroll">
      <table class="data" style="min-width:840px">
          <caption class="sr-only">How conventional FUE and DHI differ at each stage of a hair transplant</caption>
        <thead>
          <tr><th scope="col">Stage</th><th scope="col">Conventional FUE</th><th scope="col">DHI</th></tr>
        </thead>
        <tbody>
          <tr><th scope="row">Extraction</th><td>Fine punch, one follicular unit at a time.</td><td>Identical. This is where the &ldquo;DHI is a different operation&rdquo; claim falls down.</td></tr>
          <tr><th scope="row">Recipient sites</th><td>All made first, then grafts placed into them.</td><td>No separate step — the implanter makes the site and delivers the graft together.</td></tr>
          <tr><th scope="row">Angle and depth control</th><td>Set when the site is made; good in skilled hands.</td><td>Set per graft at the moment of placement. The genuine advantage, and it is worth most in the front rows.</td></tr>
          <tr><th scope="row">Speed and session size</th><td>Faster placement; better suited to large multi-zone coverage.</td><td>Slower per graft. Large crowns become a long and expensive way to get the same coverage.</td></tr>
          <tr><th scope="row">Donor scar, healing, growth</th><td>Dot healing; shedding then regrowth from three to four months.</td><td>The same. DHI does not shorten recovery or speed up growth, whatever the advertising says.</td></tr>
        </tbody>
      </table>
      </div>
    </div>

    <h3 class="h3 mt-6">Implanter Types, Explained</h3>
    <p class="body mt-3 measure">“DHI” is used loosely, so it is worth knowing what can sit behind the label. The instrument matters less than the hands holding it, but the differences are real.</p>
    <div class="grid grid--3 mt-4">
      <div class="card"><p class="h4">Sharp implanters (Choi-type)</p><p class="body-s mt-2">A hollow needle that makes the site and delivers the graft in one movement. This is classic DHI. Needle sizes are matched to the graft — finer for single-hair units at the hairline, slightly larger for multi-hair units behind.</p></div>
      <div class="card"><p class="h4">Blunt implanters into pre-made sites</p><p class="body-s mt-2">Sites are made first with a blade or needle, then grafts are pushed in with a blunt implanter. A hybrid of FUE and DHI that is sometimes sold under the DHI name. Neither is wrong; you should know which you are buying.</p></div>
      <div class="card"><p class="h4">Forceps placement</p><p class="body-s mt-2">Conventional FUE: grafts are held with fine forceps and placed into pre-made sites. Efficient across large areas, and the technique that suits most crowns.</p></div>
    </div>

    <div class="grid grid--2 mt-5">
      <div class="note"><p class="h4">A note on &ldquo;DHT hair transplant&rdquo;</p><p class="body-s mt-2">Some clinic pages advertise a &ldquo;DHT hair transplant&rdquo;. DHT is dihydrotestosterone — the hormone involved in pattern hair loss, not a surgical technique. The technique usually meant is DHI, direct hair implantation.</p></div>
      <div class="note"><p class="h4">On &ldquo;unshaven DHI&rdquo;</p><p class="body-s mt-2">DHI does make it easier to work without shaving the recipient area, which is why it is often advertised that way. The donor still needs trimming for extraction, though, and unshaven work is slower and practical only for smaller graft numbers. What is realistic in your case is decided at the consultation — more on <a href="/unshaven-hair-transplant-in-gurgaon">unshaven hair transplants</a>.</p></div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-skin',
    'alt'     => 'a sculpted cross-section of skin layers with a single hair follicle',
    'eyebrow' => 'No percentages',
    'title'   => 'What Actually Decides Whether Grafts Survive',
    'id'      => 'survival',
    'reverse' => true,
    'tone'    => 'canvas',
    'html'    => '<p>Pages in this market quote graft-survival percentages, often in the high nineties. None of those numbers can be verified for your head before surgery, and they are rarely measured the same way twice.</p>'
               . '<p>What can be said is which factors move survival, and every one of them is about handling, not branding. Grafts are living tissue: the shorter and better-controlled the time between extraction and placement, the better, which is the legitimate argument for implanter placement.</p>',
    'points'  => [
        'Hydration and temperature: waiting grafts are kept in a holding solution, because a graft that dries out on a tray does not recover',
        'Transection: a follicle cut during extraction may not grow, so punch size and depth are matched to your hair calibre, in DHI as in FUE',
        'Handling and depth: crushing a graft or placing it too deep or too shallow costs growth; implanters reduce handling, skill decides depth',
        'Density per session: packing grafts too tightly can compromise their blood supply, so planned density is a clinical decision, not a sales one',
        'Your own aftercare: smoking, knocks to the grafts in the first days and ignoring wash instructions all affect the outcome',
    ],
    'link'    => ['url' => '/blog/hair-transplant-promises-and-success-rates', 'label' => 'What success-rate claims mean'],
]) ?>

<?= lp_highlights([
    'eyebrow' => 'Why here',
    'title'   => 'Why Have DHI Done Here?',
    'intro'   => 'Consultations and procedures are carried out by registered medical practitioners at the clinic. Their names, qualifications and registration details are listed on this page.',
    'tone'    => 'white',
    'items'   => [
        ['icon' => 'info',  'title' => 'Told when not to have it',           'text' => 'If your case is a large crown, conventional FUE placement gives the same coverage for less time and less money. DHI is recommended where it earns its cost.'],
        ['icon' => 'eye',   'title' => 'Hairline drawn before you lie down', 'text' => 'Position, shape and irregularity agreed with you sitting upright with a mirror. Implanter precision is worthless behind a badly designed line.'],
        ['icon' => 'clock', 'title' => 'Graft handling timed',               'text' => 'Extraction and placement are run so grafts spend as little time out of the body as practical, with consistent holding conditions through the session.'],
        ['icon' => 'doc',   'title' => 'Priced in writing, reviewed on photographs', 'text' => 'The graft number and the per-graft difference against FUE are given in writing before you book a date; reviews follow at fixed points with standardised photographs.'],
    ],
]) ?>

<?= lp_steps([
    'eyebrow' => 'Start to finish',
    'title'   => 'How a DHI Procedure Works',
    'id'      => 'procedure',
    'intro'   => 'The first half of the day is identical to FUE. The difference is in how the grafts go in.',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                    'title' => 'Consultation and donor exam', 'text' => 'History, medication review and what you want the hairline to do. Density and calibre are measured, the pattern staged and baseline photographs taken.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned hairline', 'title' => 'Technique, hairline and plan', 'text' => 'Whether DHI, FUE placement or a combination fits your zones. The hairline is drawn while you sit upright and approved in a mirror; graft number, technique per zone, timeline and itemised cost go in writing.'],
        ['img' => 'step-procedure',    'alt' => 'sterile hair-restoration instruments laid out on a tray',  'title' => 'Procedure day',                'text' => 'The donor is trimmed and numbed and units are extracted as in FUE. Grafts are sorted, loaded into implanters one at a time and placed in one action that sets site, depth, angle and direction, the front rows at shallow angles.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with review dates circled',               'title' => 'Aftercare and reviews',        'text' => 'Dressing, medication and washing explained, and your first review booked before you go home the same day. Shedding, regrowth and hairline density are tracked photographically to twelve months.'],
    ],
]) ?>

<section class="section section--white" id="dhi-day">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">On the day</p>
      <h2 class="h2 mt-2">A Typical DHI Day</h2>
      <p class="body mt-3">For a mid-sized session. Your own timings are given to you beforehand, and how much of the recipient area is trimmed depends on the plan agreed with you.</p>
    </div>
    <div class="grid grid--2 mt-5">
      <div class="card card--pad-lg">
        <ul class="stack-sm">
          <li class="body-s"><b>Morning —</b> arrival, consent, photographs, hairline marked and checked upright.</li>
          <li class="body-s"><b>Then —</b> donor trim and local anaesthetic.</li>
          <li class="body-s"><b>Late morning —</b> extraction, spread across the donor.</li>
          <li class="body-s"><b>Midday —</b> a proper break to eat and stretch.</li>
          <li class="body-s"><b>Afternoon —</b> sorting, loading and implanter placement, the longest stretch of the day.</li>
          <li class="body-s"><b>Evening —</b> dressing, medication, aftercare explained, first review booked, home.</li>
        </ul>
      </div>
      <div class="note">
        <p class="h4">Before the day</p>
        <div class="mt-2"><?= ticks([
            'Bring your full medication list, including supplements.',
            'Stop alcohol and avoid blood thinners as instructed.',
            'Confirm the shaving plan beforehand so there are no surprises.',
            'Eat properly — DHI sessions run long by nature.',
            'Wear a shirt that buttons rather than a pullover.',
        ], false) ?></div>
      </div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Consultations and procedures are carried out by registered medical practitioners at the clinic.'
) ?>

<section class="section section--white" id="recovery">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Recovery &amp; results</p>
      <h2 class="h2 mt-2">What Happens After DHI</h2>
      <p class="body mt-3">Recovery after DHI follows the same course as FUE, because the donor and the biology are the same. A general guide to the phases most patients describe.</p>
    </div>

    <h3 class="h3 mt-6">The First Fourteen Days</h3>
    <div class="card mt-3" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data" style="min-width:680px">
          <caption class="sr-only">What usually happens in the first fourteen days after a DHI hair transplant</caption>
          <thead><tr><th scope="col">When</th><th scope="col">What is usual</th><th scope="col">What to do</th></tr></thead>
          <tbody>
            <tr><th scope="row">Day of surgery</th><td>Numbness wearing off, tenderness, tiny spots of blood at the grafts.</td><td>Rest, take prescribed medication, sleep in the position your instructions give, do not touch the grafts.</td></tr>
            <tr><th scope="row">Days 2–4</th><td>Swelling can track down to the forehead and around the eyes before settling.</td><td>Expected. Follow the instructions; call if anything worries you.</td></tr>
            <tr><th scope="row">First washes</th><td>Gentle and specific, because grafts are not yet secure.</td><td>Exactly as taught — technique matters more than frequency.</td></tr>
            <tr><th scope="row">Days 5–10</th><td>Small crusts around each graft loosen with washing.</td><td>Let them come away with washing, never by picking.</td></tr>
            <tr><th scope="row">Days 10–14</th><td>Most crusts gone; donor dots healing; grafts far more secure.</td><td>Activity widens as your doctor clears it. Shedding may follow in the weeks after.</td></tr>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-3 measure">More detail in <a href="/blog/first-14-days-after-a-hair-transplant">the first 14 days after a hair transplant, day by day</a>, and in our <a href="/hair-transplant-aftercare">aftercare guide</a>.</p>

    <div class="grid grid--5 mt-6">
      <div class="card"><span class="pill">Week 1</span><h3 class="h4 mt-3">Crusting settles</h3><p class="body-s mt-2">Small crusts around each placed graft and pinpoint healing in the donor. Washing starts as instructed; most people are back at desk work within a few days.</p></div>
      <div class="card"><span class="pill">Weeks 2–4</span><h3 class="h4 mt-3">Shedding</h3><p class="body-s mt-2">Placed hairs commonly fall while the follicles stay in place. Expected. DHI does not avoid this phase, whatever you may have read — see <a href="/blog/shedding-and-shock-loss-after-hair-transplant">shedding and shock loss</a>.</p></div>
      <div class="card"><span class="pill">Months 3–4</span><h3 class="h4 mt-3">New growth</h3><p class="body-s mt-2">Fine hairs begin to appear along the treated zones, unevenly at first. A new hairline looks patchy at this stage and is not yet judgeable.</p></div>
      <div class="card"><span class="pill">Months 5–9</span><h3 class="h4 mt-3">The line fills in</h3><p class="body-s mt-2">Density builds and hairs coarsen. Irregularity that looked odd early on usually becomes less noticeable as the hairs mature.</p></div>
      <div class="card"><span class="pill">Months 10–12</span><h3 class="h4 mt-3">The real result</h3><p class="body-s mt-2">A fair assessment of the hairline and its density. Non-transplanted hair behind it keeps thinning on its own schedule.</p></div>
    </div>
    <div class="note mt-5">
      <p class="body">Individual recovery and growth vary. DHI does not shorten recovery, ensure higher graft survival or produce faster growth than well-executed FUE — claims to the contrary are marketing. Timelines here are general patient education, not a promise of results.</p>
    </div>
  </div>
</section>

<section class="section section--canvas" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">DHI Hair Transplant Cost in Gurgaon</h2>
        <p class="body mt-3 measure">DHI usually carries a higher per-graft rate than conventional FUE, because loading and placing each graft individually takes more chair time and more instruments. Whether that premium is worth paying depends on which zones you are treating — which is a clinical question, not a sales one.</p>
        <div class="grid grid--2 mt-5">
          <div class="card"><p class="h4">Number of grafts</p><p class="body-s mt-2">Counted from the mapped plan, not estimated</p></div>
          <div class="card"><p class="h4">Zones treated</p><p class="body-s mt-2">Hairline and temples versus broad crown coverage</p></div>
          <div class="card"><p class="h4">Technique mix</p><p class="body-s mt-2">Whole-case DHI or DHI at the front with FUE behind</p></div>
          <div class="card"><p class="h4">Shaving approach</p><p class="body-s mt-2">Unshaven and partial-shave work takes longer</p></div>
          <div class="card"><p class="h4">Session structure</p><p class="body-s mt-2">One session or staged, and how long each runs</p></div>
          <div class="card"><p class="h4">Supporting treatment</p><p class="body-s mt-2">Medical therapy or PRP running alongside</p></div>
        </div>
        <p class="body-s mt-4 measure">Be careful with clinics that price DHI as a premium product and then recommend it for everything. If DHI is the answer to every case regardless of where the loss is, the recommendation is about the price list rather than your scalp.</p>
        <p class="body mt-3 measure">Working through the numbers first? See our full <a href="/hair-transplant-cost-in-gurgaon">breakdown of hair transplant cost in Gurgaon</a>, including what changes the per-graft rate.</p>
      </div>
      <div class="cta-band" style="display:block">
        <h3 class="h3">Get a Personalized Treatment Estimate</h3>
        <p class="body mt-3">Send photos of the front, crown and donor area on WhatsApp, or request a call back. You will get an assessment appointment — not a sales pitch.</p>
        <a class="btn btn--block btn--accent mt-5" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Send photos on WhatsApp</a>
        <a class="btn btn--block btn--ghost mt-3" href="/book-consultation" data-book data-treatment="Hair transplant" data-track="book">Request an estimate by form</a>
        <p class="body-s mt-4">Your details are used only to arrange your consultation.</p>
      </div>
    </div>

    <div class="mt-6" style="max-width:62ch">
      <h3 class="h3" id="not-worth-it">When DHI Is Not Worth the Premium: the Arithmetic</h3>
      <p class="body mt-3">Take a hypothetical case of <?= e(number_format($exampleWhole)) ?> grafts, at a clinic that quotes DHI <?= e(rupees($examplePremium)) ?> per graft above its FUE rate. The figure is illustrative — not our rate, and not a market average — but the shape of the sum holds at any premium.</p>
    </div>
    <div class="grid grid--2 mt-4">
      <div class="card card--pad-lg">
        <p class="eyebrow" style="color:var(--ink-muted)">Whole case in DHI</p>
        <p class="h3 mt-2"><?= e(rupees($exampleWhole * $examplePremium)) ?> premium</p>
        <p class="body-s mt-2"><?= e(number_format($exampleWhole)) ?> grafts × <?= e(rupees($examplePremium)) ?>. Much of that buys implanter precision in the crown, where coverage — not angle control — decides the result.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow" style="color:var(--ink-muted)">DHI at the hairline, FUE behind</p>
        <p class="h3 mt-2"><?= e(rupees($exampleHairline * $examplePremium)) ?> premium</p>
        <p class="body-s mt-2"><?= e(number_format($exampleHairline)) ?> hairline grafts × <?= e(rupees($examplePremium)) ?>. The precision goes where it shows, and the remaining <?= e(number_format($exampleWhole - $exampleHairline)) ?> grafts are placed by FUE.</p>
      </div>
    </div>
    <p class="body-s mt-4 measure">The combined plan is not a compromise. For most Norwood III–V cases it is the clinically sensible design, and it is usually cheaper than either technique sold whole.</p>

    <div class="mt-6" style="max-width:62ch">
      <h3 class="h3">What Gurgaon Clinics Advertise for DHI</h3>
      <p class="body-s mt-2">For orientation only. At advertised DHI rates, a 2,000-graft session spans <?= e(rupees(2000 * MARKET_DHI_RATE_LOW)) ?> to <?= e(rupees(2000 * MARKET_DHI_RATE_HIGH)) ?> — a spread that says more about branding than about technique.</p>
    </div>
    <?= market_price_table('DHI hair transplant prices advertised in Gurgaon, ' . MARKET_PRICES_AS_OF, market_rows('dhi'), MARKET_PRICES_AS_OF, 'Gurgaon clinic websites') ?>
  </div>
</section>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">DHI Hair Transplant FAQs</h2>
        <p class="body-s mt-3">Answers are general patient education. Anything specific to your hairline or your medical history is answered at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= before_after_slider_section() ?>

<?= awards_certificates_section() ?>

<?= local_block(
    'DHI Hair Transplant Near Medanta, Sector 39 Gurugram',
    'Our Gurugram clinic is in Sector 39, ' . NAP_LANDMARK . ', where consultations and procedures are carried out by registered medical practitioners.'
) ?>

<?= lp_cta([
    'eyebrow'   => 'Sector 39, Gurugram',
    'title'     => 'Get an Honest Answer on Whether DHI Is Worth It for You',
    'text'      => 'Bring your questions and your medication list. You will get a donor assessment, a hairline drawn on your own face, and a straight recommendation on whether DHI, FUE or a combination fits your case — including what the difference actually costs.',
    'treatment' => 'Hair transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
