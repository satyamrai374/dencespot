<?php
/**
 * /hair-prp-treatment-in-rohini — Hair PRP and GFC at the Rohini (Delhi) clinic.
 *
 * October 2026. The agency confirmed (13 Oct 2026) that every service,
 * PRP/GFC included, is carried out at the Rohini clinic. Medical facts come
 * from the Gurugram pages (/hair-prp-treatment-in-gurgaon,
 * /gfc-treatment-in-gurgaon, /prp-hair-treatment-cost-in-gurgaon); the copy
 * is written fresh so the two cities do not read as doorway duplicates.
 *
 * Per the client (14 Oct 2026) the page never mentions the Gurugram clinic
 * and never links to a Gurugram URL; depth comes from /gfc-treatment-in-rohini
 * and neutral blog posts. Landing-page layout: lp_split / lp_steps / lp_cta
 * (includes/home-components.php).
 *
 * Not yet reviewed by the clinic's doctor: no medical_review_line(), no
 * "reviewed by" badge, doctor_block(..., false), and not in MEDICAL_PAGES.
 * No prices, no named devices or kits, no Rohini doctor named.
 *
 * SEO round 2 (14 Oct 2026): title per the competitor research, PRP vs GFC
 * table with "questions worth asking any clinic", a "Recovering in Delhi"
 * row, cost H2 "PRP Cost Factors in Rohini" linking the Rohini PRP cost page,
 * and 15 FAQs. Every fact restates what the PRP/GFC pages already say.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'Are PRP and GFC sessions carried out at the Rohini clinic?',
     'a' => 'Yes. The assessment, each session and the reviews can all take place at the Rohini clinic in North-West Delhi.'],
    ['q' => 'Which parts of Delhi is the Rohini clinic convenient for?',
     'a' => 'The clinic is in North-West Delhi near the Outer Ring Road, convenient for people in North and North-West Delhi, including Rohini, Pitampura, Shalimar Bagh and Prashant Vihar. The Directions link in the clinic card below opens it in Google Maps.'],
    ['q' => 'Will PRP or GFC work for me?',
     'a' => 'Nobody can tell beforehand, and some people do not respond at all. Published trials, mostly small and short, indicate that PRP may cut shedding and add some density for people whose follicles are still present; GFC’s evidence is smaller and newer. Neither cures pattern hair loss, so your response is measured against photographs. See <a href="/blog/does-prp-work-for-hair-loss">does PRP work for hair loss</a>.'],
    ['q' => 'How many sessions are usually needed?',
     'a' => 'An initial course is commonly three or four sessions, sometimes more where a larger area is treated, followed by maintenance if there has been a response. How many you are advised to have is decided at the assessment, written into your plan and reviewed as you go. A course should stop if the photographs show no change.'],
    ['q' => 'How far apart are the sessions?',
     'a' => 'Sessions in the initial course are usually about four weeks apart. If there has been a response, maintenance sessions are then commonly spaced every three to six months. Sessions kept to their planned intervals make the review a fairer test, so it helps to plan the dates around travel and family events when the course starts.'],
    ['q' => 'Does it hurt, and what are the side effects?',
     'a' => 'The blood draw feels like a routine blood test, and the scalp injections sting briefly; cooling or a numbing cream reduces that, though tolerance varies. Tenderness, redness or slight swelling for a day or so is common. Infection at an injection site is uncommon but possible.'],
    ['q' => 'How long does a session take, and can I go back to work?',
     'a' => 'Usually 30 to 60 minutes from arrival to leaving; most of that is the blood draw and preparation, and the injections themselves take a small part of it. Most people return to work the same day. The scalp may feel tender for a day or so.'],
    ['q' => 'Should I eat beforehand, and what should I tell the clinic?',
     'a' => 'Eat and drink as usual, since blood is taken. Bring a list of every medicine and supplement, and mention aspirin, anti-inflammatory painkillers or blood thinners well before the day. Do not stop a prescribed medicine on your own; any change is the doctor’s decision.'],
    ['q' => 'When will I know whether it is working?',
     'a' => 'Less shedding is usually the first change people notice, often around six to ten weeks. Density is judged at about three to six months by setting your photographs beside the baseline ones; nothing meaningful can be judged after a single session. If that review shows no change, the course stops.'],
    ['q' => 'Who should not have PRP or GFC?',
     'a' => 'Treatment is postponed or not offered with an infection or dermatitis on the scalp, a low platelet count or a bleeding disorder, blood-thinning medicine that has not yet been reviewed, blood cancers and some other active cancers, poorly controlled illness, and in pregnancy or breastfeeding. It will not help a bald, smooth or scarred scalp. This is not a complete list; suitability is decided at the consultation.'],
    ['q' => 'Which side effects should I report straight away?',
     'a' => 'Spreading redness, heat or swelling, a fever after a session, or pain that worsens rather than settles. These are uncommon, but tell the Rohini clinic promptly by phone or WhatsApp if any of them appear.'],
    ['q' => 'Can PRP be combined with minoxidil or finasteride?',
     'a' => 'Usually, yes. Medication acts on the process behind pattern hair loss, while PRP is a supporting treatment, so the two normally run together rather than one replacing the other. Neither medicine is a cure, and both have side effects to discuss before starting. Medication is not started or stopped because of a PRP course. See <a href="/blog/minoxidil-and-finasteride-in-india">minoxidil and finasteride in India</a>.'],
    ['q' => 'Is the result permanent?',
     'a' => 'No. PRP and GFC do not switch off pattern hair loss, so any benefit has to be maintained, usually with medication as well. If treatment stops, thinning generally carries on from where it had reached.'],
    ['q' => 'Is EMI available for a PRP course?',
     'a' => 'Instalment options through third-party lenders may be available; ask at the consultation. The lender, not the clinic, sets the terms, so compare the total payable with the cost of paying outright. See <a href="/cost-and-emi-options">cost and EMI options</a>, and <a href="/prp-hair-treatment-cost-in-rohini">PRP hair treatment cost in Rohini</a> for what decides the price of a course.'],
    ['q' => 'Can I send photos on WhatsApp before booking?',
     'a' => 'Yes. Clear daylight photographs of the thinning areas help the Rohini clinic answer a first question, but whether PRP or GFC suits you is decided only after your scalp has been examined in person. The clinic is open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . ').'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Hair PRP and GFC treatment in Rohini'],
];

$page = [
    'title'       => 'PRP Hair Treatment in Rohini, Delhi: Sessions & Cost',
    'description' => 'PRP hair treatment at our Rohini clinic, North-West Delhi: who it may suit, sessions and intervals, PRP vs GFC, side effects and what decides the cost.',
    'url'         => '/hair-prp-treatment-in-rohini',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_delhi_clinic(),
        schema_therapy('/hair-prp-treatment-in-rohini', [
            'name'          => 'Hair PRP and GFC Treatment',
            'alternateName' => ['Platelet-rich plasma therapy for hair', 'Growth factor concentrate therapy for hair', 'PRP hair treatment in Rohini, Delhi'],
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'A small volume of the patient\'s blood is drawn and processed. For PRP it is centrifuged and the platelet-rich plasma is injected into the scalp at follicular depth across the thinning areas; for GFC the growth factors are released from the platelets during preparation and the cells removed before injection. Given as a course of sessions spaced some weeks apart.',
            'preparation'   => 'Clinical history and scalp examination under magnification, review of medication including anticoagulants, blood investigations where indicated to identify reversible causes of hair loss, and baseline photography.',
            'followup'      => 'Response reviewed against baseline photographs at three to six months; the course is stopped where there is no meaningful change, or continued with maintenance sessions alongside medical therapy where there is.',
            'expectedPrognosis' => 'Reduced shedding is commonly the first observed change. Density changes, where they occur, are assessed over months. Neither PRP nor GFC halts pattern hair loss, results need maintenance, published trials are mostly small and short, GFC has a smaller and newer evidence base than PRP, and a proportion of patients do not respond.',
            'location'      => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
            'performer'     => null,
        ]),
        schema_breadcrumbs($crumbs),
        schema_faq('/hair-prp-treatment-in-rohini', $faqs),
    ],
    'preload_image' => '/assets/img/services/svc-prp-768.webp',
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Rohini, Delhi</span>
        <h1 class="h1 mt-3">Hair PRP and GFC Treatment in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">PRP and GFC are prepared from a small sample of your own blood and injected where the scalp is thinning, with the aim of supporting follicles that have weakened but not yet disappeared. Neither is a cure, and neither suits every kind of hair loss, so the cause is checked first. A course runs over several months, and the assessment, every session and each review take place at our Rohini clinic in North-West Delhi.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Hair PRP / GFC" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp the Rohini Clinic</a>
        </div>

        <?= ticks([
            'Cause of the thinning checked before any session',
            'Sessions and reviews at the Rohini clinic',
            'Progress judged on baseline photographs',
            'Whole course quoted in writing after assessment',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-prp-768.webp" srcset="/assets/img/services/svc-prp-512.webp 512w, /assets/img/services/svc-prp-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a capped tube of golden plasma standing on a white tray beside a syringe" width="768" height="960" loading="eager" fetchpriority="high">
          <?= hp_ai_chip('AI-generated illustration') ?>
        </div>
        <div class="hero__badge-card">
          <p class="eyebrow">Rohini Clinic</p>
          <p class="h4 mt-1">North-West Delhi</p>
          <p class="meta"><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></p>
          <p class="meta"><?= e(HOURS_DISPLAY) ?><br><?= e(HOURS_NOTE) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= lead_strip() ?>

<section class="trust">
  <div class="wrap">
    <div class="grid grid--4">
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Diagnosis first</p><p class="meta mt-1">Treatable causes looked for before injecting.</p></div>
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Response measured</p><p class="meta mt-1">Photographs at fixed angles and lighting.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">A course you can stop</p><p class="meta mt-1">No change at review means the plan changes.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Registered doctors</p><p class="meta mt-1">Treatment by registered medical practitioners.</p></div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-follicle',
    'alt'     => 'a sculpted cross-section of the scalp showing hair follicles beneath the skin',
    'eyebrow' => 'Two treatments, one family',
    'title'   => 'What PRP and GFC Actually Are',
    'html'    => '<p>Both begin with a small blood sample from your arm, processed in the clinic. Platelets carry growth factors, the signalling proteins the body uses for repair, and the thinking is that placing them around weakening follicles helps keep those follicles in their growth phase for longer.</p>'
               . '<p>For PRP the blood is spun so the platelet-rich plasma separates, and that plasma is injected; the platelets release their growth factors gradually in the scalp. For GFC the platelets are broken down during preparation, freeing their growth factors, and the cells are filtered out so only the concentrate is injected.</p>'
               . '<p>That is a real difference in what goes into the syringe, but it has not been shown to give a better result. GFC’s evidence is smaller and newer than PRP’s, and PRP’s own trials are mostly small and short, with preparation varying between clinics. More on <a href="/gfc-treatment-in-rohini">GFC treatment in Rohini</a> and in <a href="/blog/does-prp-work-for-hair-loss">does PRP work for hair loss</a>.</p>',
    'points'  => [
        'PRP: plasma with concentrated platelets, injected at follicle depth; the more studied of the two',
        'GFC: growth factors released before injection and the cells removed; not shown to outperform PRP',
        'Neither creates new follicles: on a bald, smooth scalp there is nothing left for them to support',
    ],
    'link'    => ['url' => '/blog/prp-vs-gfc-vs-exosomes', 'label' => 'Compare PRP, GFC and exosomes'],
]) ?>

<section class="section section--canvas" id="prp-vs-gfc">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Side by side</p>
      <h2 class="h2 mt-2">PRP vs GFC: How the Two Compare</h2>
      <p class="body mt-3">Both are made from your own blood on the day and used for the same kinds of thinning. The differences are in preparation, evidence and price, not in a proven difference in hair.</p>
    </div>
    <div class="card mt-6" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data" style="min-width:680px">
          <caption class="sr-only">PRP and GFC for hair compared: preparation, evidence, course, side effects and price</caption>
          <thead>
            <tr><th scope="col">&nbsp;</th><th scope="col">PRP</th><th scope="col">GFC</th></tr>
          </thead>
          <tbody>
            <tr><th scope="row">What is injected</th><td>Plasma with concentrated platelets, which release their growth factors gradually in the scalp</td><td>Growth factors already released from the platelets during preparation, with the cells filtered out</td></tr>
            <tr><th scope="row">Published evidence</th><td>The more studied of the two, though trials are mostly small and short and preparation varies between clinics</td><td>Smaller and newer; few studies compare it directly with well-prepared PRP</td></tr>
            <tr><th scope="row">Usual course</th><td>Commonly three or four sessions about four weeks apart, then maintenance every three to six months if responding</td><td>A course of sessions spaced some weeks apart; it has not been shown to need fewer sessions than PRP</td></tr>
            <tr><th scope="row">Each session</th><td>Blood draw, preparation and injection, usually 30 to 60 minutes</td><td>Much the same, usually under an hour</td></tr>
            <tr><th scope="row">Side effects</th><td>Tenderness, redness, pinpoint marks or mild swelling for a day or so</td><td>Reported side effects resemble those of PRP</td></tr>
            <tr><th scope="row">Lasting benefit</th><td>Only with maintenance, usually alongside medication</td><td>The same; not shown to last longer than PRP</td></tr>
            <tr><th scope="row">Price</th><td>Often the lower-priced of the two</td><td>Often priced higher; the evidence does not show it does more</td></tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="grid grid--2 mt-4">
      <div class="card card--pad-lg">
        <h3 class="h4">Questions worth asking any clinic about a PRP or GFC course</h3>
        <div class="mt-3"><?= ticks([
            'Has my scalp been examined, and iron, thyroid and other causes checked first?',
            'Who draws, prepares and injects? A doctor should give the injections.',
            'Is the preparation the same at every session?',
            'How many sessions, how far apart, and what does the whole course cost?',
            'When is the response reviewed, and against which photographs?',
            'What happens to the plan if the review shows no change?',
        ], false) ?></div>
      </div>
      <div class="note">
        <p class="h4">One preparation at a time</p>
        <p class="body-s mt-2">Mix PRP, GFC or other injections in one course and nobody can tell which did anything. One preparation, judged on standardised photographs, tells you more. These questions apply to any clinic, including this one; more on <a href="/gfc-treatment-in-rohini">GFC treatment in Rohini</a>.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="suitability">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Suitability</p>
      <h2 class="h2 mt-2">PRP for Hair Fall: Who It May Suit, and When It Will Not Help</h2>
      <p class="body mt-3">These treatments act on follicles that are still alive. That decides most of the question; the examination decides the rest. If you are not yet sure what kind of hair loss you have, the <a href="/hair-loss-assessment">six-question hair loss self-assessment</a> is a starting point, though not a diagnosis, and <a href="/hair-fall-treatment-in-rohini">hair fall treatment at the Rohini clinic</a> covers how the cause is found.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="card card--pad-lg">
        <h3 class="h3">May be considered for</h3>
        <div class="mt-3"><?= ticks([
            'Early to moderate pattern thinning with follicles still present',
            'Diffuse thinning in women, after thyroid, iron, vitamin D and hormone problems are ruled out or treated',
            'Holding on to the existing hair around an earlier transplant',
            'People who cannot take, or would rather avoid, hair-loss medication',
        ], false) ?></div>
      </div>
      <div class="card card--pad-lg">
        <h3 class="h3">Unlikely to help</h3>
        <div class="mt-3"><?= ticks([
            'A bald, smooth or scarred scalp',
            'Shedding from untreated low iron, thyroid disease or a vitamin deficiency',
            'Telogen effluvium, which usually settles once its trigger has passed',
            'Active alopecia areata, which needs its own treatment',
        ], false) ?></div>
      </div>
    </div>
    <div class="note mt-4">
      <p class="h4">When treatment is postponed or not offered</p>
      <p class="body-s mt-2">An infection or dermatitis on the scalp, a low platelet count or a bleeding disorder, blood-thinning medicine that has not yet been reviewed, blood cancers and some other active cancers, poorly controlled illness, and pregnancy or breastfeeding. This is not a complete list, so bring every medicine you take to the consultation.</p>
      <p class="body-s mt-2">Blood tests, where your history points to them, cover iron stores, thyroid function, vitamin levels and a platelet count, with hormonal tests for some women. See <a href="/blog/blood-tests-for-hair-fall">which blood tests matter for hair fall</a>.</p>
    </div>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'Step by step',
    'title'   => 'What Happens at the Rohini Clinic',
    'intro'   => 'The first visit is an assessment, not an injection, and sessions start only once the reason for the thinning is clear. A typical initial course is three or four sessions about four weeks apart, then maintenance every three to six months if it is working.',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                    'title' => 'Consultation and examination',  'text' => 'When the thinning began, how quickly it is changing, family history, your medicines and what you have tried. Magnification (trichoscopy) then separates pattern thinning from shedding, patchy loss or a scalp condition.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram on a desk',               'title' => 'Tests, photographs and a plan', 'text' => 'Blood tests if your history points to them, baseline photographs at fixed angles and lighting, and a written plan naming PRP or GFC, the number of sessions and the cost of the whole course.'],
        ['img' => 'step-procedure',    'alt' => 'sterile instruments laid out on a tray',                  'title' => 'Each session',                  'text' => 'Blood is drawn and processed, the scalp is cleaned and cooled or numbed, and the preparation is injected across the thinning areas. Usually 30 to 60 minutes; most people return to work the same day.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with review dates circled',               'title' => 'Review',                        'text' => 'At three to six months your photographs are set beside the baseline before anything is repeated.'],
    ],
]) ?>

<section class="section section--white" id="results">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Results, review and risks</p>
      <h2 class="h2 mt-2">What to Expect Over the Months</h2>
      <p class="body mt-3">A general picture, not a promise: hair changes slowly, results vary between people, and your own course is judged against your baseline photographs.</p>
    </div>
    <div class="grid grid--4 mt-6">
      <div class="card"><span class="pill">6–10 weeks</span><h3 class="h4 mt-3">Less shedding</h3><p class="body-s mt-2">Usually the first change people notice. An early signal, not yet a result.</p></div>
      <div class="card"><span class="pill">3–6 months</span><h3 class="h4 mt-3">Review</h3><p class="body-s mt-2">Density and visible scalp compared with the baseline photographs.</p></div>
      <div class="card"><span class="pill">No change</span><h3 class="h4 mt-3">Stop</h3><p class="body-s mt-2">The course ends and the plan changes, rather than more sessions being added.</p></div>
      <div class="card"><span class="pill pill--ink">Responding</span><h3 class="h4 mt-3">Maintain</h3><p class="body-s mt-2">Sessions commonly every three to six months, usually alongside medication.</p></div>
    </div>
    <div class="grid grid--3 mt-4">
      <div class="card card--pad-lg">
        <h3 class="h4">Side effects</h3>
        <p class="body-s mt-2">Tenderness, redness, pinpoint marks or mild swelling for a day or so, an occasional headache and a bruise where the blood was taken. Because the material comes from your own blood, a reaction to it is not expected, but infection at an injection site is uncommon rather than impossible.</p>
      </div>
      <div class="card card--pad-lg">
        <h3 class="h4">Limits worth hearing first</h3>
        <p class="body-s mt-2">Neither treatment cures or halts pattern hair loss, any benefit lasts only with maintenance, and a proportion of people do not respond. PRP or GFC is normally added to medical treatment rather than used instead of it. Minoxidil, and finasteride in men, are better studied, but neither is a cure and both have side effects to discuss before starting; see <a href="/blog/minoxidil-and-finasteride-in-india">minoxidil and finasteride</a>.</p>
      </div>
      <div class="card card--pad-lg">
        <h3 class="h4">After a session</h3>
        <p class="body-s mt-2">Leave the scalp alone for the rest of the day. For a short time, avoid heavy exercise, saunas, steam rooms and swimming pools, and hold off colouring or chemical treatments. Your written aftercare sheet gives the details.</p>
      </div>
    </div>
  </div>
</section>

<?= lp_highlights([
    'eyebrow' => 'Recovering in Delhi',
    'title'   => 'After a Session in Delhi: Heat, Smog and Helmets',
    'intro'   => 'General practicalities for the day or two after a session. Your written aftercare sheet comes first wherever it differs.',
    'tone'    => 'canvas',
    'items'   => [
        ['icon' => 'clock',    'title' => 'Summer heat and sweat', 'text' => 'Heavy sweating is one of the things to avoid briefly. In the hotter months, plan the rest of the day somewhere cool and leave the gym or outdoor sport until your aftercare sheet allows.'],
        ['icon' => 'shield',   'title' => 'Smog and dust',         'text' => 'Winter smog and roadside dust do not change the treatment, but a tender scalp should be kept clean. Wash when your sheet allows, and avoid rubbing or scratching it.'],
        ['icon' => 'cap',      'title' => 'Two-wheeler helmets',   'text' => 'The scalp can be tender for a day or so, so a helmet may feel sore. Keep the liner clean, and mention at the session if you ride every day.'],
        ['icon' => 'calendar', 'title' => 'Planning the course',   'text' => 'Sessions about four weeks apart make the review a fair test. Book them around travel, weddings and festivals so the intervals hold.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-hair-fall',
    'alt'     => 'a wooden comb resting on folded white towels',
    'eyebrow' => 'Cost guidance',
    'title'   => 'PRP Cost Factors in Rohini',
    'id'      => 'cost',
    'reverse' => true,
    'html'    => '<p>A single-session price tells you little on its own, so we do not publish one. Your course is quoted in writing after the assessment.</p>'
               . '<p>When comparing quotes from any clinic, compare the whole course: how many sessions, what each includes, and what happens if the review shows no change. Read the <a href="/blog/prp-vs-gfc-vs-exosomes#questions-before-buying-a-package">questions to ask before buying a multi-session package</a> before you pay for one.</p>'
               . '<p>Instalment options through third-party lenders may be available; ask at the consultation, and read <a href="/cost-and-emi-options">cost and EMI options</a> before signing anything.</p>',
    'points'  => [
        'PRP or GFC: GFC is often priced higher, and its evidence does not show an advantage',
        'Sessions in the course: planned from the diagnosis and adjusted by response',
        'Area treated: a small crown area needs less than a broad thinning zone',
        'Medication and maintenance: separate lines on the estimate, stated at the start',
    ],
    'link'    => ['url' => '/prp-hair-treatment-cost-in-rohini', 'label' => 'PRP hair treatment cost in Rohini, explained'],
]) ?>

<?= doctor_block(
    'Treatment at the Rohini clinic is carried out by registered medical practitioners. Every doctor at DenceSpot is listed below with their qualifications.',
    '',
    false
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Hair PRP and GFC in Rohini: Questions</h2>
        <p class="body-s mt-3">General patient education. Whether either treatment suits your scalp is answered at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask the Rohini Clinic</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'Visit Our Rohini Clinic',
    'PRP and GFC sessions take place at our Rohini clinic in North-West Delhi, near the Outer Ring Road. An initial course and its maintenance can add up to six or more visits over a year, and sessions kept to their planned intervals make the review a fairer test.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= lp_cta([
    'eyebrow'   => 'Rohini, Delhi',
    'title'     => 'Find Out Whether PRP or GFC Is Worth Starting',
    'text'      => 'Book an assessment at the Rohini clinic. You will have your scalp examined, the tests your history calls for, and a straight answer on whether an injection course makes sense for you, or whether something else should come first.',
    'treatment' => 'Hair PRP / GFC',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
