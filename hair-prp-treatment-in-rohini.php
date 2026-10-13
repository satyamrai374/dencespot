<?php
/**
 * /hair-prp-treatment-in-rohini — Hair PRP and GFC at the Rohini (Delhi) clinic.
 *
 * October 2026. The agency confirmed (13 Oct 2026) that every service,
 * PRP/GFC included, is carried out at the Rohini clinic. Medical facts come
 * from the Gurugram pages (/hair-prp-treatment-in-gurgaon,
 * /gfc-treatment-in-gurgaon, /prp-hair-treatment-cost-in-gurgaon); the copy
 * is written fresh so the two cities do not read as doorway duplicates, and
 * it links to the Gurugram pages for technique and research depth.
 *
 * Not yet reviewed by the clinic's doctor: no medical_review_line(), no
 * "reviewed by" badge, doctor_block(..., false), and not in MEDICAL_PAGES.
 * No prices, no named devices or kits, no Rohini doctor named.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'Are PRP and GFC sessions carried out at the Rohini clinic?',
     'a' => 'Yes. The assessment, each session and the reviews can all take place at the Rohini clinic in North-West Delhi. If our Sector 39 clinic in Gurugram is easier for you to reach, you can choose it instead when you book.'],
    ['q' => 'Which parts of Delhi is the Rohini clinic convenient for?',
     'a' => 'The clinic is in North-West Delhi near the Outer Ring Road, so it is closest for people in North and North-West Delhi, including Rohini, Pitampura, Shalimar Bagh and Prashant Vihar. The Directions link in the clinic card below opens it in Google Maps.'],
    ['q' => 'Will PRP or GFC work for me?',
     'a' => 'Nobody can tell beforehand, and some people do not respond at all. Published trials, mostly small and short, indicate that PRP may cut shedding and add some density for people whose follicles are still present; GFC’s evidence is smaller and newer. Neither cures pattern hair loss, so your response is measured against photographs. See <a href="/blog/does-prp-work-for-hair-loss">does PRP work for hair loss</a>.'],
    ['q' => 'How many sessions are usually needed?',
     'a' => 'An initial course is commonly three or four sessions about four weeks apart, followed by maintenance every three to six months if there has been a response. How many you are advised to have is decided at the assessment, written into your plan and reviewed as you go. A course should stop if the photographs show no change.'],
    ['q' => 'Does it hurt, and what are the side effects?',
     'a' => 'The blood draw feels like a routine blood test, and the scalp injections sting briefly; cooling or a numbing cream reduces that, though tolerance varies. Tenderness, redness or slight swelling for a day or so is common. Infection at an injection site is uncommon but possible.'],
    ['q' => 'Is the result permanent?',
     'a' => 'No. PRP and GFC do not switch off pattern hair loss, so any benefit has to be maintained, usually with medication as well. If treatment stops, thinning generally carries on from where it had reached.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Hair PRP and GFC treatment in Rohini'],
];

$page = [
    'title'       => 'Hair PRP and GFC Treatment in Rohini, Delhi | DenceSpot',
    'description' => 'Hair PRP and GFC treatment at our Rohini clinic in North-West Delhi: who it may help, the limits of the evidence, what a session involves, risks and reviews.',
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
        <span class="pill pill--dot">Clinic 2 · Rohini, Delhi</span>
        <h1 class="h1 mt-3">Hair PRP and GFC Treatment in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">PRP and GFC are prepared from a small sample of your own blood and injected where the scalp is thinning, with the aim of supporting follicles that have weakened but not yet disappeared. Neither is a cure, and neither suits every kind of hair loss, so the cause is checked first. A course runs over several months, and at our Rohini clinic in North-West Delhi the assessment, every session and each review can happen without a trip to Gurugram.</p>

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
          <p class="eyebrow">Clinic 2 · Rohini</p>
          <p class="h4 mt-1">North-West Delhi</p>
          <p class="meta"><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></p>
          <p class="meta"><?= e(HOURS_DISPLAY) ?><br><?= e(HOURS_NOTE) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

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

<section class="section section--white" id="what-is">
  <div class="wrap">
    <div class="split split--wide-left">
      <div>
        <p class="eyebrow">Two treatments, one family</p>
        <h2 class="h2 mt-2">What PRP and GFC Actually Are</h2>
        <div class="stack mt-4 measure">
          <p class="body-l">Both begin with a small blood sample from your arm, processed in the clinic. Platelets carry growth factors, the signalling proteins the body uses for repair, and the thinking behind both treatments is that placing those factors around weakening follicles helps keep them in their growth phase for longer.</p>
          <p class="body-l">The processing is where they differ. For PRP the blood is spun so that the platelet-rich plasma separates, and that plasma is injected; the platelets then release their growth factors gradually in the scalp. For GFC the platelets are broken down while the sample is being prepared, which frees their growth factors, and the cells are then filtered out so only the concentrate is injected.</p>
          <p class="body">That is a real difference in what goes into the syringe, but it has not been shown to give a better result. GFC’s evidence is smaller and newer than PRP’s, and PRP’s own trials are mostly small and short, with preparation varying between clinics. Our Gurugram pages on <a href="/hair-prp-treatment-in-gurgaon">hair PRP</a> and <a href="/gfc-treatment-in-gurgaon">GFC</a> cover the technique and the research in depth.</p>
        </div>
      </div>
      <div class="stack">
        <div class="card card--tint">
          <span class="pill">PRP</span>
          <h3 class="h4 mt-3">Platelet-rich plasma</h3>
          <p class="body-s mt-2">Plasma with concentrated platelets, injected at follicle depth. The more studied of the two.</p>
        </div>
        <div class="card card--tint">
          <span class="pill">GFC</span>
          <h3 class="h4 mt-3">Growth factor concentrate</h3>
          <p class="body-s mt-2">Growth factors released before injection, cells removed. A smaller evidence base, and not shown to outperform PRP.</p>
        </div>
        <div class="note">
          <p class="body-s">Neither creates new follicles. On a bald, smooth scalp there is nothing left for them to support. Compare the options in <a href="/blog/prp-vs-gfc-vs-exosomes">PRP vs GFC vs exosomes</a>.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="suitability">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Suitability</p>
      <h2 class="h2 mt-2">Who It May Suit, and When It Will Not Help</h2>
      <p class="body mt-3">These treatments act on follicles that are still alive. That decides most of the question; the examination decides the rest.</p>
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
    </div>
  </div>
</section>

<section class="section section--white" id="at-rohini">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Step by step</p>
      <h2 class="h2 mt-2">What Happens at the Rohini Clinic</h2>
      <p class="body mt-3">The first visit is an assessment, not an injection. Sessions start only once the reason for the thinning is clear.</p>
    </div>
    <div class="split split--wide-left mt-6" style="align-items:start">
      <div class="stack-sm">
        <div class="step"><span class="step-num">1</span><div><h3 class="h3">Consultation</h3><p class="body-s mt-2">When the thinning began, how quickly it is changing, family history, your medicines and supplements, and anything you have already tried.</p></div></div>
        <div class="step"><span class="step-num">2</span><div><h3 class="h3">Scalp examination</h3><p class="body-s mt-2">Magnification (trichoscopy) shows whether hairs are miniaturising, which separates pattern thinning from shedding, patchy loss or a scalp condition.</p></div></div>
        <div class="step"><span class="step-num">3</span><div><h3 class="h3">Blood tests if your history points to them</h3><p class="body-s mt-2">Iron stores, thyroid function, vitamin levels and a platelet count, with hormonal tests for some women. See <a href="/blog/blood-tests-for-hair-fall">which blood tests matter for hair fall</a>.</p></div></div>
        <div class="step"><span class="step-num">4</span><div><h3 class="h3">Baseline photographs and a written plan</h3><p class="body-s mt-2">Taken at fixed angles and lighting so later reviews compare like with like. The plan names PRP or GFC, the number of sessions and the cost of the whole course.</p></div></div>
        <div class="step"><span class="step-num">5</span><div><h3 class="h3">Each session</h3><p class="body-s mt-2">Blood is drawn and processed, the scalp is cleaned and cooled or numbed, and the preparation is injected across the thinning areas. Usually 30 to 60 minutes in all, and most people return to work the same day.</p></div></div>
        <div class="step"><span class="step-num">6</span><div><h3 class="h3">Review</h3><p class="body-s mt-2">At three to six months your photographs are set beside the baseline before anything is repeated.</p></div></div>
      </div>
      <div class="stack">
        <div class="card card--pad-lg">
          <p class="eyebrow" style="color:var(--ink-muted)">Why location matters for a course</p>
          <p class="body-s mt-2">A typical initial course is three or four sessions about four weeks apart, then maintenance every three to six months if it is working. Over a year that can add up to six or more visits. If you live in North or North-West Delhi, having them in Rohini means you do not have to travel to Gurugram for each one, and sessions kept to their planned intervals make the review a fairer test.</p>
        </div>
        <div class="card card--pad-lg">
          <p class="eyebrow" style="color:var(--ink-muted)">After a session</p>
          <p class="body-s mt-2">Leave the scalp alone for the rest of the day. For a short time, avoid heavy exercise, saunas, steam rooms and swimming pools, and hold off colouring or chemical treatments. Your written aftercare sheet gives the details.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="results">
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
    <div class="grid grid--2 mt-4">
      <div class="card card--pad-lg">
        <h3 class="h4">Side effects</h3>
        <p class="body-s mt-2">Tenderness, redness, pinpoint marks or mild swelling for a day or so, an occasional headache and a bruise where the blood was taken. Because the material comes from your own blood, a reaction to it is not expected, but infection at an injection site is uncommon rather than impossible.</p>
      </div>
      <div class="card card--pad-lg">
        <h3 class="h4">Limits worth hearing first</h3>
        <p class="body-s mt-2">Neither treatment cures or halts pattern hair loss, any benefit lasts only with maintenance, and a proportion of people do not respond. PRP or GFC is normally added to medical treatment rather than used instead of it. Minoxidil, and finasteride in men, are better studied, but neither is a cure and both have side effects to discuss before starting; see <a href="/blog/minoxidil-and-finasteride-in-india">minoxidil and finasteride</a>.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">What Decides the Cost of a Course</h2>
        <p class="body mt-3 measure">A single-session price tells you little on its own, so we do not publish one. Your course is quoted in writing after the assessment. When comparing quotes from any clinic, compare the whole course: how many sessions, what each includes, and what happens if the review shows no change.</p>
        <p class="body mt-3 measure">The <a href="/prp-hair-treatment-cost-in-gurgaon">PRP cost guide</a> explains why a large prepaid package of sessions is worth avoiding.</p>
      </div>
      <div class="grid grid--2">
        <div class="card"><p class="h4">PRP or GFC</p><p class="meta mt-1">GFC is often priced higher; its evidence does not show an advantage.</p></div>
        <div class="card"><p class="h4">Sessions in the course</p><p class="meta mt-1">Planned from the diagnosis and adjusted by response.</p></div>
        <div class="card"><p class="h4">Area treated</p><p class="meta mt-1">A small crown area needs less than a broad thinning zone.</p></div>
        <div class="card"><p class="h4">Medication and maintenance</p><p class="meta mt-1">Separate lines on the estimate, stated at the start.</p></div>
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
    'PRP and GFC sessions take place at our Rohini clinic in North-West Delhi, near the Outer Ring Road, and are also available at our Sector 39 clinic in Gurugram. Choose whichever you can reach more easily for the length of a course.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= cta_band(
    'Find Out Whether PRP or GFC Is Worth Starting',
    'Book an assessment at the Rohini clinic. You will have your scalp examined, the tests your history calls for, and a straight answer on whether an injection course makes sense for you, or whether something else should come first.',
    'rohini-prp',
    ['Hair PRP / GFC', 'PRP or GFC — please advise', 'Hair fall treatment', 'Not sure — please advise'],
    'Delhi (Rohini)'
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
