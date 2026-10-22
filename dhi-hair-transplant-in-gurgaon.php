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
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'What is a DHI hair transplant?',
     'a' => 'A hair transplant in which each extracted follicular unit is loaded into a fine implanter and placed into the scalp in a single action that creates the site and sets the graft together. Extraction is the same as <a href="/fue-hair-transplant-in-gurgaon">FUE</a>; DHI describes the placement stage.'],
    ['q' => 'What is the real difference between DHI and FUE?',
     'a' => 'Extraction is essentially identical. In FUE all the recipient sites are made first and grafts are then placed into them; in DHI the implanter makes each site and delivers the graft in one motion, setting depth, angle and direction per graft. DHI gives finer control and is slower; FUE placement is more efficient over large areas.'],
    ['q' => 'Is DHI better than FUE?',
     'a' => 'Not universally, and any clinic saying otherwise is selling rather than assessing. DHI has a genuine advantage in hairlines, temples and work between existing hairs. For covering a large crown, conventional FUE placement generally gives the same coverage in less time and at lower cost.'],
    ['q' => 'Does DHI mean I do not have to shave my head?',
     'a' => 'It makes unshaven or partially shaved work easier, which is why it is advertised that way. The donor area still needs trimming so grafts can be extracted accurately, and unshaven work is slower and realistic only for smaller graft numbers. What is possible in your case is decided at consultation.'],
    ['q' => 'What is a &ldquo;DHT hair transplant&rdquo;?',
     'a' => 'A mistake. DHT is dihydrotestosterone, the hormone involved in pattern hair loss — not a surgical technique. Pages advertising a DHT transplant mean DHI, direct hair implantation.'],
    ['q' => 'Does DHI give better graft survival?',
     'a' => 'It is often claimed, on the basis that grafts spend less time outside the body and are handled less. It is a reasonable argument, but the published evidence does not establish DHI as reliably superior to well-executed FUE on survival. Surgeon skill and graft handling matter more than the instrument.'],
    ['q' => 'How many grafts can be done with DHI in one day?',
     'a' => 'Fewer than with conventional FUE placement, because loading implanters one graft at a time is slower. DHI suits defined areas rather than very large multi-zone sessions. Where a big area needs covering, a combined plan is usually the better answer.'],
    ['q' => 'Is DHI painful?',
     'a' => 'The local anaesthetic injections are the uncomfortable part, as with any hair transplant. The placement itself is not typically painful. Soreness and some swelling for a few days afterwards are normal and managed with prescribed medication.'],
    ['q' => 'Does DHI recover faster than FUE?',
     'a' => 'No. The donor is treated the same way, the biology is the same, and the shedding and regrowth phases follow the same course — crusting in the first week or two, shedding within a month, new growth from around three to four months, a fair assessment at ten to twelve.'],
    ['q' => 'Why is DHI more expensive?',
     'a' => 'Chair time and consumables. Each graft is handled and loaded individually, which takes longer, and implanter tips are single-use. You are paying for placement precision, which is worth it in a hairline and often is not across a crown. Our <a href="/hair-transplant-cost-in-gurgaon">hair transplant cost guide</a> sets out what moves the number.'],
    ['q' => 'Can DHI fix a hairline that was done badly elsewhere?',
     'a' => 'Often it can help. Softening a line that was placed too straight or too low, and adding single hairs at the correct angles between existing grafts, is exactly the situation implanter control suits. Sometimes grafts also need removing, which is assessed separately.'],
    ['q' => 'Can women have DHI?',
     'a' => 'Yes, and it is frequently the better choice for women, because the work is usually concentrated along a frontal line or parting and can often be done with minimal trimming. Hormonal, thyroid, iron and post-partum causes are investigated and treated before any surgery is planned.'],
    ['q' => 'How much does DHI cost in Gurgaon?',
     'a' => 'It depends on graft numbers, which zones are treated, whether the whole case is DHI or combined with FUE placement, and the shaving approach. We quote after assessment rather than publishing a headline price, and you get an itemised written estimate before booking.'],
    ['q' => 'What happens at the DHI consultation?',
     'a' => 'History and medication review, scalp and donor examination, pattern staging, photographs for your record, and a written plan — including an honest recommendation on whether DHI, FUE or a combination fits your case, with the cost difference explained.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair transplant', 'url' => '/hair-transplant-in-gurgaon'],
    ['name' => 'DHI hair transplant in Gurgaon'],
];

$page = [
    'title'       => 'DHI Hair Transplant in Gurgaon | DenceSpot Clinic',
    'description' => 'Doctor-performed DHI hair transplant in Gurgaon. Each graft placed with an implanter for close control of angle and depth, for hairlines and detail zones.',
    'url'         => '/dhi-hair-transplant-in-gurgaon',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/dhi-hair-transplant-in-gurgaon', [
            'name'          => 'DHI Hair Transplant',
            'alternateName' => ['Direct hair implantation', 'DHI hair restoration'],
            'procedureType' => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'Follicular units are extracted from the donor area as in FUE, then each graft is loaded into a hollow implanter and placed directly into the recipient area in a single action, which creates the site and sets the graft at a controlled depth, angle and direction simultaneously. Performed as a day case under local anaesthetic.',
            'preparation'   => 'Clinical assessment of hair-loss pattern and donor density, review of medication and blood-thinning agents, blood investigations, and a hairline design agreed with the patient before the procedure date.',
            'followup'      => 'Wash instruction and review in the first week, then scheduled photographic reviews through the shedding and regrowth phases.',
            'expectedPrognosis' => 'Transplanted hairs commonly shed within the first weeks; new growth typically begins around three to four months with a fuller result at approximately ten to twelve months. Outcomes vary between patients and are not guaranteed.',
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
        <p class="lead mt-3 measure">DHI is not a different way of taking hair out — extraction is the same as FUE. What changes is placement: each graft is loaded into a fine implanter and set in one action, giving close control of depth, angle and spacing. That control is worth most exactly where it is hardest to fake, along the hairline.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
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
        <div class="media ratio-4-5 media--shadow"><img src="/assets/img/case-uttam-gurgaon.jpg" alt="Before and after a hair transplant at DenceSpot Clinic, Sector 39 Gurugram — hairline and temple restoration, 2,400 grafts by FUE" width="800" height="1000" loading="eager"></div>
        <div class="hero__badge-card">
          <p class="eyebrow">Performed &amp; reviewed by</p>
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
      <div class="card"><?= icon('pencil', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Implanter placement</p><p class="body-s mt-2">Depth, angle and direction set in one action.</p></div>
      <div class="card"><?= icon('hairline', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Built for hairlines</p><p class="body-s mt-2">Where irregularity and angle decide the result.</p></div>
      <div class="card"><?= icon('clock', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Short time out of body</p><p class="body-s mt-2">Grafts go from extraction to placement quickly.</p></div>
      <div class="card"><?= icon('shield', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">No linear scar</p><p class="body-s mt-2">Same donor healing as FUE — dots, not a line.</p></div>
      <div class="card"><?= icon('info', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Told when FUE is better</p><p class="body-s mt-2">Large crowns are usually not a DHI job.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="what-is">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">The basics, plainly</p>
        <h2 class="h2 mt-2">What Is a DHI Hair Transplant?</h2>
        <p class="body-l mt-3 measure">DHI stands for direct hair implantation. It describes the placement stage of a hair transplant, not the whole procedure. Follicular units are extracted from the donor area exactly as they are in FUE — individually, with a fine punch, leaving dot healing rather than a line.</p>
        <p class="body-l mt-3 measure">The difference comes next. In a conventional FUE, recipient sites are made first across the whole area, and grafts are then placed into those waiting sites. In DHI, each graft is loaded into a hollow implanter — a pen-like instrument with a fine needle tip — and the surgeon makes the site and delivers the graft in one motion. Depth, angle, direction and spacing are all set at that moment, graft by graft.</p>
        <p class="body-l mt-3 measure">Two practical consequences follow. Control is finer, which matters most in the first few rows of a hairline where hairs emerge at very shallow angles and any uniformity reads as artificial. And each graft spends less time outside the body between extraction and placement.</p>
        <p class="body-l mt-3 measure">The trade-off is throughput. Loading implanters one graft at a time is slower than placing into pre-made sites, so DHI generally suits defined areas rather than very large sessions, and it usually costs more per graft. Where a whole crown needs covering, conventional FUE placement is often the better use of both time and money.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--ghost" href="/fue-hair-transplant-in-gurgaon">How FUE differs</a>
          <a class="btn btn--ghost" href="/hair-transplant-in-gurgaon">Hair transplant overview</a>
        </div>
      </div>
      <div>
        <div class="media ratio-4-3 media--shadow"><img src="/assets/img/case-shukri-europe.jpg" alt="Micro-FUE hair transplant at DenceSpot Clinic, Gurugram — hairline design and 2,800 grafts photographed on the day of surgery" width="800" height="600" loading="lazy"></div>
        <div class="card card--tint mt-4">
          <p class="eyebrow">In one line</p>
          <p class="body mt-2">DHI is a placement method, not a separate operation. Extraction, healing and growth timelines are the same as FUE — the control over angle and depth is what you are paying for.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="candidacy">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Suitability</p>
      <h2 class="h2 mt-2">Who DHI Suits</h2>
      <p class="body mt-3">DHI earns its extra time and cost in some cases and not others. Being told which one you are is more useful than being sold the newer-sounding option.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card"><?= icon('hairline', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Hairline design</h3><p class="body-s mt-2">The frontal rows, where single-hair grafts must sit at shallow angles with deliberate irregularity. This is where implanter control shows most clearly.</p></div>
      <div class="card"><?= icon('scale', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Temples and temporal points</h3><p class="body-s mt-2">Very fine, acutely angled hair where getting the direction wrong is immediately visible. Small graft numbers, high precision.</p></div>
      <div class="card"><?= icon('user', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Refining existing density</h3><p class="body-s mt-2">Adding grafts between hairs that are already there, where pre-made sites risk damaging what still grows.</p></div>
      <div class="card"><?= icon('heart', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Women&rsquo;s frontal restoration</h3><p class="body-s mt-2">Where shaving is unacceptable and the work is concentrated along a parting or frontal line, DHI can often be done with minimal trimming.</p></div>
      <div class="card"><?= icon('list', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Small, defined sessions</h3><p class="body-s mt-2">A few hundred to a couple of thousand grafts in one region, where precision matters more than raw coverage speed.</p></div>
      <div class="card"><?= icon('pencil', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Correcting an artificial hairline</h3><p class="body-s mt-2">Softening a line placed too straight or too low elsewhere, working around existing grafts without disturbing them.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="implanter">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">What you are actually paying for</p>
      <h2 class="h2 mt-2">What the Implanter Changes, and What It Does Not</h2>
      <p class="body mt-3">DHI is marketed hard in Gurgaon, often as though it were a categorically better operation. It is a placement technique with real advantages in specific places. Here is the honest split.</p>
    </div>

    <div class="table-scroll mt-6">
      <table class="data" style="min-width:840px">
          <caption class="sr-only">How conventional FUE and DHI differ at each stage of a hair transplant</caption>
        <thead>
          <tr><th>Stage</th><th>Conventional FUE</th><th>DHI</th></tr>
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

    <div class="grid grid--2 mt-5">
      <div class="note"><p class="h4">A note on &ldquo;DHT hair transplant&rdquo;</p><p class="body-s mt-2">Some clinic pages advertise a &ldquo;DHT hair transplant&rdquo;. DHT is dihydrotestosterone — the hormone involved in pattern hair loss, not a surgical technique. The technique meant is DHI, direct hair implantation. If a page selling you surgery cannot keep the two apart, that tells you something.</p></div>
      <div class="note"><p class="h4">On &ldquo;unshaven DHI&rdquo;</p><p class="body-s mt-2">DHI does make it easier to work without shaving the recipient area, which is why it is often advertised that way. The donor still needs trimming for extraction, though, and unshaven work is slower and practical only for smaller graft numbers. What is realistic in your case is decided at the consultation, not promised in advance.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="why">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Why here</p>
      <h2 class="h2 mt-2">Why Have DHI Done Here?</h2>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--tint"><?= icon('info', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">You are told when not to have it</h3><p class="body-s mt-2">If your case is a large crown, we will say conventional FUE placement gives you the same coverage for less time and less money. DHI is recommended where it earns its cost.</p></div>
      <div class="card card--tint"><?= icon('hairline', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Hairline drawn before you lie down</h3><p class="body-s mt-2">Position, shape and irregularity agreed with you sitting upright with a mirror. Implanter precision is worthless behind a badly designed line.</p></div>
      <div class="card card--tint"><?= icon('pencil', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">The doctor holds the implanter</h3><p class="body-s mt-2">Placement is the stage that decides how natural the result looks. It is not handed to a technician while the doctor moves on.</p></div>
      <div class="card card--tint"><?= icon('clock', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Graft handling timed</h3><p class="body-s mt-2">Extraction and placement are run so grafts spend as little time out of the body as practical, and holding conditions are consistent through the session.</p></div>
      <div class="card card--tint"><?= icon('list', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Priced per plan, in writing</h3><p class="body-s mt-2">You are told the graft number, the per-graft difference against FUE and what it buys you, before you book a date.</p></div>
      <div class="card card--tint"><?= icon('star', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Reviewed on photographs</h3><p class="body-s mt-2">Standardised angles and lighting at fixed review points, so hairline density is assessed against a record.</p></div>
    </div>
  </div>
</section>

<section class="section section--ink" id="journey">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Start to finish</p>
      <h2 class="h2 mt-2">Your DHI Journey</h2>
      <p class="body mt-3">Seven stages, in the order you will experience them.</p>
    </div>
    <div class="journey mt-6">
      <div class="card card--ink"><span class="journey__num">1</span><h3 class="h4 mt-2">Consultation</h3><p class="body-s mt-2">History, medication review, and what you want the hairline to do.</p></div>
      <div class="card card--ink"><span class="journey__num">2</span><h3 class="h4 mt-2">Scalp &amp; donor exam</h3><p class="body-s mt-2">Density and calibre measured, pattern staged, baseline photographs.</p></div>
      <div class="card card--ink"><span class="journey__num">3</span><h3 class="h4 mt-2">Technique decision</h3><p class="body-s mt-2">Whether DHI, FUE placement or a combination fits your zones and budget.</p></div>
      <div class="card card--ink"><span class="journey__num">4</span><h3 class="h4 mt-2">Hairline design</h3><p class="body-s mt-2">Drawn on your face, sitting upright, checked in a mirror and approved.</p></div>
      <div class="card card--ink"><span class="journey__num">5</span><h3 class="h4 mt-2">Written plan</h3><p class="body-s mt-2">Graft number, technique per zone, timeline and itemised cost.</p></div>
      <div class="card card--ink"><span class="journey__num">6</span><h3 class="h4 mt-2">Procedure day</h3><p class="body-s mt-2">Extraction, loading and implanter placement under local anaesthetic.</p></div>
      <div class="card card--ink"><span class="journey__num">7</span><h3 class="h4 mt-2">Reviews to 12 months</h3><p class="body-s mt-2">Shedding, regrowth and hairline density tracked photographically.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="procedure">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">On the day</p>
      <h2 class="h2 mt-2">How a DHI Procedure Works</h2>
      <p class="body mt-3">The first half of the day is identical to FUE. The difference is in how the grafts go in.</p>
    </div>
    <div class="split split--sidebar mt-6">
      <div class="stack-sm">
        <div class="step"><span class="step-num">1</span><div><h3 class="h3">Design and consent</h3><p class="body-s mt-2">The hairline is drawn while you sit upright and checked in a mirror before anything begins. With DHI the line is executed graft by graft, so agreeing it first matters more, not less.</p></div></div>
        <div class="step"><span class="step-num">2</span><div><h3 class="h3">Donor trim and anaesthesia</h3><p class="body-s mt-2">The donor area is trimmed so the punch can follow each follicle, then anaesthetised locally. How much of the recipient area is trimmed depends on the plan agreed with you.</p></div></div>
        <div class="step"><span class="step-num">3</span><div><h3 class="h3">Extraction</h3><p class="body-s mt-2">Follicular units are removed one at a time with a fine punch, spread across the donor so density stays even. Identical to FUE.</p></div></div>
        <div class="step"><span class="step-num">4</span><div><h3 class="h3">Sorting and loading</h3><p class="body-s mt-2">Grafts are sorted by hair count under magnification, then loaded individually into implanters — single-hair units for the front rows, multi-hair units for behind.</p></div></div>
        <div class="step"><span class="step-num">5</span><div><h3 class="h3">Implanter placement</h3><p class="body-s mt-2">Each graft is placed in one action that sets site, depth, angle and direction together. The front rows go in at shallow angles with deliberate irregularity so the line does not read as a row.</p></div></div>
        <div class="step"><span class="step-num">6</span><div><h3 class="h3">Aftercare and discharge</h3><p class="body-s mt-2">The donor is dressed, medication and written aftercare issued, washing explained, and the first review booked. You go home the same day.</p></div></div>
      </div>
      <div>
        <div class="media ratio-4-3 media--shadow"><img src="/assets/img/case-uttam-gurgaon.jpg" alt="Before and after a hair transplant at DenceSpot Clinic, Sector 39 Gurugram — hairline and temple restoration, 2,400 grafts by FUE" width="800" height="600" loading="lazy"></div>
        <div class="card card--tint mt-4">
          <p class="eyebrow">Before the day</p>
          <?= ticks([
              'Bring your full medication list, including supplements.',
              'Stop alcohol and avoid blood thinners as instructed.',
              'Confirm the shaving plan in advance so there are no surprises.',
              'Eat properly — DHI sessions run long by nature.',
              'Wear a shirt that buttons rather than a pullover.',
          ], false) ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="recovery">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Recovery &amp; results</p>
      <h2 class="h2 mt-2">What Happens After DHI</h2>
      <p class="body mt-3">Recovery after DHI follows the same course as FUE, because the donor and the biology are the same. A general guide to the phases most patients describe.</p>
    </div>
    <div class="grid grid--5 mt-6">
      <div class="card"><span class="pill">Week 1</span><h3 class="h4 mt-3">Crusting settles</h3><p class="body-s mt-2">Small crusts around each placed graft and pinpoint healing in the donor. Washing starts as instructed; most people are back at desk work within a few days.</p></div>
      <div class="card"><span class="pill">Weeks 2–4</span><h3 class="h4 mt-3">Shedding</h3><p class="body-s mt-2">Placed hairs commonly fall while the follicles stay in place. Expected. DHI does not avoid this phase, whatever you may have read.</p></div>
      <div class="card"><span class="pill">Months 3–4</span><h3 class="h4 mt-3">New growth</h3><p class="body-s mt-2">Fine hairs begin to appear along the treated zones, unevenly at first. A new hairline looks patchy at this stage and is not yet judgeable.</p></div>
      <div class="card"><span class="pill">Months 5–9</span><h3 class="h4 mt-3">The line fills in</h3><p class="body-s mt-2">Density builds and hairs coarsen. Irregularity that looked odd early on starts reading as natural as surrounding hairs mature.</p></div>
      <div class="card"><span class="pill">Months 10–12</span><h3 class="h4 mt-3">The real result</h3><p class="body-s mt-2">A fair assessment of the hairline and its density. Non-transplanted hair behind it keeps thinning on its own schedule.</p></div>
    </div>
    <div class="note mt-5">
      <p class="body">Individual recovery and growth vary. DHI does not shorten recovery, guarantee higher graft survival or produce faster growth than well-executed FUE — claims to the contrary are marketing. Timelines here are general patient education, not a promise of results.</p>
    </div>
  </div>
</section>

<?= doctor_block(
    'Why the design matters more than the instrument: an implanter gives you control over the angle of every graft, which is genuinely valuable — and completely wasted behind a hairline drawn in the wrong place. The commonest reason a transplant looks obviously done is not the tool used to place the grafts. It is a line set too low or too straight for the face it sits on, which no amount of precision can rescue later.'
) ?>

<section class="section section--white" id="cost">
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
        <p class="body-s mt-4 measure">Be careful with clinics that price DHI as a premium product and then recommend it for everything. If DHI is the answer to every case regardless of where the loss is, the recommendation is about the price list rather than your scalp. A combined plan — DHI at the front, FUE placement behind — is often the sensible answer and is usually cheaper than either sold whole.</p>
        <p class="body mt-3 measure">Working through the numbers first? See our full <a href="/hair-transplant-cost-in-gurgaon">breakdown of hair transplant cost in Gurgaon</a>, including what changes the per-graft rate.</p>
      </div>
      <div class="card card--ink card--pad-lg">
        <h3 class="h3">Get a Personalized Treatment Estimate</h3>
        <p class="body mt-3">Send photos of the front, crown and donor area on WhatsApp, or request a call back. You will get an assessment appointment — not a sales pitch.</p>
        <a class="btn btn--block btn--accent mt-5" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Send photos on WhatsApp</a>
        <a class="btn btn--block btn--ghost mt-3" href="/book-consultation" data-track="book">Request an estimate by form</a>
        <p class="body-s mt-4">Your details are used only to arrange your consultation.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="faqs">
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
    'DHI Hair Transplant at Our Gurgaon Clinic',
    'Consultation, procedure and every follow-up happen at our Sector 39 clinic in Gurugram, with the same doctor placing the grafts as designed the hairline. Patients travel to us from across Gurugram and neighbouring parts of South Delhi.'
) ?>

<?= cta_band(
    'Get an Honest Answer on Whether DHI Is Worth It for You',
    'Bring your questions and your medication list. You will get a donor assessment, a hairline drawn on your own face, and a straight recommendation on whether DHI, FUE or a combination fits your case — including what the difference actually costs.',
    'dhi-hair-transplant',
    ['DHI hair transplant', 'DHI — hairline', 'DHI — temples', 'Correcting an earlier hairline', 'DHI or FUE — please advise']
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
