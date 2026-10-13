<?php
/**
 * /dhi-hair-transplant-in-rohini — DHI technique spoke for the Rohini clinic.
 *
 * October 2026 (agency confirmed 13 Oct 2026 that DHI is carried out at
 * Rohini). Facts follow /dhi-hair-transplant-in-gurgaon; the text is new.
 *
 * Cannibalisation split: /fue-hair-transplant-in-rohini owns extraction,
 * dot scars and donor limits; this page owns placement — implanter pens, when
 * DHI is and is not worth the premium, unshaven options and hairline work.
 * No rupee figures here (the Gurugram page carries the market table).
 *
 * Not yet reviewed by the clinic's doctor: doctor_block(..., false), no review
 * byline, not in MEDICAL_PAGES, and no named performer in the schema.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'Is DHI carried out at the Rohini clinic?',
     'a' => 'Yes. DHI hair transplants are carried out at the Rohini clinic by registered medical practitioners, as they are at our Sector 39, Gurugram clinic. Whether DHI, FUE or a mix of the two suits you is decided at the consultation.'],
    ['q' => 'Is DHI better than FUE?',
     'a' => 'Not universally. DHI gives finer control of angle and depth, which matters in hairlines, temples and between existing hair. Over a large crown, FUE placement generally gives the same coverage in less time and for less money.'],
    ['q' => 'Can DHI be done without shaving?',
     'a' => 'Often in part. The thinning area can sometimes be left unshaven, but the donor area still needs trimming for extraction, and unshaven work is slower, so it suits smaller graft numbers. What is realistic for you is agreed at the consultation.'],
    ['q' => 'Does DHI heal faster or give better graft survival?',
     'a' => 'It does not heal faster: the donor, the biology and the growth timeline are the same as FUE. Shorter time out of the body is a reasonable argument for survival, but the evidence does not show DHI reliably ahead of well-executed FUE, and no clinic can verify a survival figure for your scalp beforehand.'],
    ['q' => 'Why does DHI usually cost more?',
     'a' => 'Chair time and consumables: each graft is loaded and placed individually, and implanter tips are single-use. The premium buys precision, which is worth paying for at a hairline and often not across a crown. Your estimate is itemised in writing after the assessment.'],
    ['q' => 'How do I book a DHI consultation in Rohini?',
     'a' => 'Call or WhatsApp the Rohini clinic on ' . LOC_DELHI_PHONE_DISPLAY . ', or use the form on this page and choose Delhi (Rohini). Sending photographs of your hairline, crown and donor area beforehand helps the appointment start from the right questions.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'DHI Hair Transplant in Rohini'],
];

$page = [
    'title'         => 'DHI Hair Transplant in Rohini, Delhi | DenceSpot Clinic',
    'description'   => 'DHI hair transplant in Rohini, Delhi: how implanter pens place each graft, when DHI is worth the extra cost and when it is not, unshaven options and hairlines.',
    'url'           => '/dhi-hair-transplant-in-rohini',
    'crumbs'        => $crumbs,
    'preload_image' => '/assets/img/services/svc-hair-transplant-768.webp',
    'schema'        => [
        schema_delhi_clinic(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/dhi-hair-transplant-in-rohini', [
            'name'          => 'DHI Hair Transplant',
            'alternateName' => ['Direct hair implantation', 'Implanter pen hair transplant', 'DHI hair transplant in Rohini, Delhi'],
            'procedureType' => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'Follicular units are extracted from the donor scalp as in FUE, then each graft is loaded into a hollow implanter and placed in a single action that makes the site and sets depth, angle and direction together. A day case under local anaesthetic at the Rohini, Delhi clinic.',
            'preparation'   => 'Examination of the hair-loss pattern and donor density, review of medicines including blood-thinning agents, and a hairline design and shaving plan agreed with the patient before the procedure.',
            'followup'      => 'A wash and review in the first week, then photographic reviews at the Rohini clinic through the shedding and regrowth phases.',
            'expectedPrognosis' => 'Transplanted hairs commonly shed within the first weeks; new growth usually begins at around three to four months and the result is judged at about ten to twelve months. Outcomes vary between patients and cannot be promised.',
            'location'      => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
            'performer'     => null,
        ]),
        schema_faq('/dhi-hair-transplant-in-rohini', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Clinic 2 · Rohini, Delhi</span>
        <h1 class="h1 mt-3">DHI Hair Transplant in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">DHI — direct hair implantation — uses the same extraction as FUE, then sets each graft with a hollow implanter pen that makes the opening and places the hair in one movement. It is carried out at our Rohini clinic by registered medical practitioners. Its value is precision along the hairline and temples; across a large crown it usually adds cost without adding coverage.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Hair transplant" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp the Rohini Clinic</a>
        </div>

        <?= ticks([
            'Carried out at the Rohini clinic',
            'Each graft set at a controlled angle and depth',
            'Suited to hairlines and temples',
            'Same recovery as FUE',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-hair-transplant-768.webp" srcset="/assets/img/services/svc-hair-transplant-512.webp 512w, /assets/img/services/svc-hair-transplant-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a model of a single follicular unit with three dark hair shafts, on a cream background" width="768" height="960" loading="eager" fetchpriority="high">
          <?= hp_ai_chip('AI-generated illustration') ?>
        </div>
        <div class="hero__badge-card">
          <p class="eyebrow">Clinic 2 · Rohini</p>
          <p class="h4 mt-1"><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></p>
          <p class="meta"><?= e(HOURS_DISPLAY) ?><span style="display:block"><?= e(HOURS_NOTE) ?></span></p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="implanter">
  <div class="wrap">
    <div class="split split--wide-left">
      <div>
        <p class="eyebrow">The instrument</p>
        <h2 class="h2 mt-2">What an Implanter Pen Does</h2>
        <div class="stack mt-4 measure">
          <p class="body-l">An implanter is a pen-shaped instrument with a hollow needle tip. After extraction, each graft is loaded into an implanter on its own, and the doctor makes the opening in the scalp and delivers the graft in the same movement. Depth, angle and direction are set for that one graft at that moment.</p>
          <p class="body-l">Needle sizes are matched to the graft — finer for single-hair units in the front rows, slightly larger for multi-hair units behind. With no separate step of making sites, grafts spend little time out of the body between extraction and placement.</p>
          <p class="body">Extraction itself is identical to FUE; how it works, and the dot scars it leaves, are covered on <a href="/fue-hair-transplant-in-rohini">FUE hair transplant in Rohini</a>.</p>
        </div>
      </div>
      <div class="stack">
        <div class="card card--tint">
          <p class="eyebrow" style="color:var(--ink-muted)">In one line</p>
          <p class="body mt-2">DHI is a way of placing grafts, not a separate operation. The control it gives is what you pay for.</p>
        </div>
      </div>
    </div>
    <h3 class="h3 mt-6">Three ways grafts are placed</h3>
    <div class="grid grid--3 mt-4">
      <div class="card"><p class="h4">Sharp implanters</p><p class="body-s mt-2">Make the opening and place the graft in one movement. This is DHI in the classic sense.</p></div>
      <div class="card"><p class="h4">Blunt implanters into pre-made sites</p><p class="body-s mt-2">Openings are made first with a blade or needle, then grafts are pushed in with a blunt implanter — a hybrid sometimes sold as DHI.</p></div>
      <div class="card"><p class="h4">Forceps placement</p><p class="body-s mt-2">Conventional FUE: grafts held with fine forceps and set into pre-made sites. Efficient over large areas.</p></div>
    </div>
    <div class="note mt-4">
      <p class="body-s"><b>None of the three is wrong.</b> The instrument matters less than the hands holding it, so ask which method is planned for each zone, and who will be holding it.</p>
    </div>
  </div>
</section>

<section class="section section--canvas" id="hairline">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Hairlines and detail zones</p>
      <h2 class="h2 mt-2">Hairline Work: Where DHI Earns Its Place</h2>
      <p class="body mt-3">In the first rows of a hairline, hairs emerge at very shallow angles and in no neat order. A ruled edge, or hairs all pointing the same way, reads as artificial. Setting angle and depth graft by graft is the real advantage of an implanter, and it shows most here.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="card"><?= icon('hairline', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Designed before you lie down</h3><p class="body-s mt-2">The line is drawn while you sit upright, checked in a mirror and agreed. Precision cannot rescue a badly designed line — see <a href="/blog/natural-hairline-design-explained">what makes a hairline look natural</a>.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Temples</h3><p class="body-s mt-2">Very fine hair at acute angles, where a wrong direction is noticed at once. Small graft numbers, high precision.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Between existing hair</h3><p class="body-s mt-2">Adding grafts among hair that still grows, where pre-made sites risk damaging it. Women with frontal or parting loss often fit here, once medical causes have been investigated.</p></div>
      <div class="card"><?= icon('pencil', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Correcting a hairline done elsewhere</h3><p class="body-s mt-2">Softening a line placed too straight or too low, working between earlier grafts. Sometimes grafts need removing too, assessed separately — see <a href="/hair-transplant-repair-in-gurgaon">hair transplant repair</a>.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="worth-it">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Value, honestly</p>
      <h2 class="h2 mt-2">When DHI Is Worth It — and When It Is Not</h2>
      <p class="body mt-3">DHI is slower than placing grafts into pre-made sites, because each implanter is loaded one graft at a time, and it usually costs more per graft for the extra chair time and single-use tips. Whether that premium buys anything depends on the zone.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="card card--pad-lg">
        <h3 class="h3">Usually worth it</h3>
        <div class="mt-3"><?= ticks([
            'Hairline and temple work',
            'Adding density between existing hair',
            'Frontal work with minimal trimming',
            'Small, defined sessions',
            'Softening an earlier hairline',
        ], false) ?></div>
      </div>
      <div class="card card--pad-lg card--dashed">
        <h3 class="h3">Usually not</h3>
        <ul class="stack-sm mt-3" style="padding-left:1.1em;list-style:disc">
          <li class="body-s">A large crown, which needs coverage more than angle control</li>
          <li class="body-s">Very large sessions across several zones</li>
          <li class="body-s">Hoping for faster healing — it is the same as FUE</li>
          <li class="body-s">Hoping for higher graft survival — not reliably shown</li>
        </ul>
      </div>
    </div>
    <div class="note mt-4">
      <p class="body-s"><b>Often the answer is both.</b> For many people with moderate loss, DHI at the front and FUE behind puts the precision where it shows and places the rest more quickly. Cost then follows graft count, zones, technique mix, shaving approach and sessions, set out in writing after your assessment — see <a href="/hair-transplant-cost-in-gurgaon">how hair transplant cost is worked out</a>.</p>
    </div>
  </div>
</section>

<section class="section section--canvas" id="unshaven">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">Shaving</p>
        <h2 class="h2 mt-2">Unshaven and Partially Shaved Options</h2>
        <p class="body mt-3">Because an implanter can place grafts between existing hairs, DHI makes it easier to work without shaving the thinning area — which is why it is often advertised as “no-shave”. The practical limits are worth knowing first.</p>
      </div>
      <div class="grid grid--2">
        <div class="card"><h3 class="h4">The donor still needs trimming</h3><p class="body-s mt-2">Extraction needs short hair so the punch can follow each follicle, whatever the placement method.</p></div>
        <div class="card"><h3 class="h4">Slower, so smaller</h3><p class="body-s mt-2">Working between long hairs takes more time, so unshaven work is realistic only for smaller graft numbers.</p></div>
        <div class="card"><h3 class="h4">Agreed beforehand</h3><p class="body-s mt-2">How much is trimmed, and where, is decided at the consultation and confirmed before the day, so there are no surprises.</p></div>
        <div class="card"><h3 class="h4">Not for every plan</h3><p class="body-s mt-2">Large sessions are usually easier and more accurate with trimming. More on <a href="/unshaven-hair-transplant-in-gurgaon">unshaven hair transplants</a>.</p></div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="day">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">On the day</p>
      <h2 class="h2 mt-2">A DHI Day at the Rohini Clinic</h2>
      <p class="body mt-3">DHI sessions run long by nature. Your own timings are given beforehand; this is the usual shape of the day.</p>
    </div>
    <div class="split split--wide-left mt-6" style="align-items:start">
      <div class="stack-sm">
        <div class="step"><span class="step-num">1</span><div><h3 class="h3">Marking</h3><p class="body-s mt-2">Consent, photographs, and the hairline marked and checked with you sitting upright.</p></div></div>
        <div class="step"><span class="step-num">2</span><div><h3 class="h3">Trim and anaesthetic</h3><p class="body-s mt-2">The donor is trimmed and numbed with local anaesthetic; the injections are the uncomfortable part.</p></div></div>
        <div class="step"><span class="step-num">3</span><div><h3 class="h3">Extraction</h3><p class="body-s mt-2">Follicular units removed one at a time and spread across the donor, exactly as in FUE.</p></div></div>
        <div class="step"><span class="step-num">4</span><div><h3 class="h3">Loading and placement</h3><p class="body-s mt-2">Grafts sorted by hair count, loaded into implanters and placed one by one — usually the longest stretch, after a break to eat.</p></div></div>
        <div class="step"><span class="step-num">5</span><div><h3 class="h3">Home</h3><p class="body-s mt-2">Dressing, medication where prescribed, washing explained, and your first review at Rohini booked.</p></div></div>
      </div>
      <div class="stack">
        <div class="card card--tint">
          <p class="eyebrow">Recovery is the same as FUE</p>
          <p class="body-s mt-2">Crusts in the first week or two, shedding within the first month, new growth from about three to four months, and the result judged at ten to twelve. DHI does not shorten any of these, and results vary between patients.</p>
          <p class="body-s mt-3">Candidacy and aftercare are covered on <a href="/hair-transplant-in-rohini">hair transplant in Rohini</a>; for more depth, see the <a href="/dhi-hair-transplant-in-gurgaon">DHI page for our Gurugram clinic</a>.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Treatment at the Rohini clinic is carried out by registered medical practitioners. Every doctor at DenceSpot is listed below with qualifications and registration details.',
    '',
    false
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">DHI in Rohini: Questions Answered</h2>
        <p class="body-s mt-3">General patient education. Anything specific to your hairline or medical history is answered at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'Visit Our Rohini Clinic',
    'DHI consultations, procedures and reviews take place at the Rohini clinic in North-West Delhi. DHI is also carried out at our Sector 39, Gurugram clinic.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= cta_band(
    'Ask Whether DHI Is Worth It for Your Hairline',
    'Bring your questions and a list of your medicines. The doctor examines your donor area, draws a hairline on your face and tells you plainly whether DHI, FUE or a mix suits your zones, and what each would mean for the cost.',
    'rohini-dhi-hair-transplant',
    ['DHI hair transplant', 'DHI — hairline', 'DHI — temples', 'DHI or FUE — please advise'],
    'Delhi (Rohini)'
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
