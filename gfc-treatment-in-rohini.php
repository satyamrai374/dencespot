<?php
/**
 * /gfc-treatment-in-rohini — GFC (growth factor concentrate) for hair at the
 * Rohini (Delhi) clinic.
 *
 * October 2026 (batch 2). The agency confirmed (13 Oct 2026) that every
 * service, PRP/GFC included, is carried out at the Rohini clinic. Medical
 * facts come from the existing GFC page and /blog/prp-vs-gfc-vs-exosomes; the
 * copy is new. /hair-prp-treatment-in-rohini already covers PRP and GFC
 * together, so this page goes deeper on GFC alone: how it is prepared, what
 * the evidence does and does not show, how a course is judged and stopped.
 *
 * Client rule (14 Oct 2026): a Rohini page names no other location and links
 * to no page of the other clinic. Landing-page layout: lp_split / lp_steps /
 * lp_cta (includes/home-components.php); every image is a labelled AI
 * illustration, each used once.
 *
 * Not yet reviewed by the clinic's doctor: no medical_review_line(), no
 * "reviewed by" badge, doctor_block(..., false), and not in MEDICAL_PAGES.
 * No prices, no kit or device names, no concentration multiples, no Rohini
 * doctor named.
 *
 * SEO round 3 (14 Oct 2026): title per the competitor research; a GFC vs PRP
 * vs mesotherapy table (facts from the PRP, GFC and mesotherapy pages); a
 * "Recovering in Delhi" row; cost H2 "GFC Cost Factors in Rohini" linking the
 * Rohini PRP cost page; 15 FAQs. Section tones re-alternated after the
 * insertions. Every fact restates what the site already says.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'Is GFC carried out at the Rohini clinic?',
     'a' => 'Yes. The assessment, the blood draw and preparation, each injection session and every review take place at the Rohini clinic in North-West Delhi, so a whole course can be completed there.'],
    ['q' => 'Which parts of Delhi is the Rohini clinic convenient for?',
     'a' => 'It sits in North-West Delhi near the Outer Ring Road, which makes it closest for North and North-West Delhi, for example Rohini, Pitampura, Shalimar Bagh and Prashant Vihar.'],
    ['q' => 'Is GFC better than PRP?',
     'a' => 'It has not been shown to be. GFC is prepared differently, and a GFC tube may hold more free growth factor, but more in the tube has not been shown to mean more hair. Its studies are fewer and newer than those behind PRP, and few compare the two directly.'],
    ['q' => 'How many GFC sessions will I need?',
     'a' => 'GFC is given as a course of sessions spaced some weeks apart. How many you are advised to have depends on your diagnosis, is written into your plan before you start and is revisited at review. If the photographs show no change, the course stops rather than being extended.'],
    ['q' => 'What should I bring to the first appointment, and should I eat beforehand?',
     'a' => 'Bring a list of every medicine and supplement you take, any recent blood reports and, if you have them, older photographs of your hair. Nothing is injected at the first visit, which is an assessment. On session days, eat and drink as usual, since blood is taken, and mention aspirin, anti-inflammatory painkillers or blood thinners well before the day. Do not stop a prescribed medicine on your own; any change is the doctor’s decision.'],
    ['q' => 'How long does a session take, and can I go back to work?',
     'a' => 'Usually under an hour in total, covering the blood draw, the preparation and the injections. Most people return to work and normal activity the same day. The scalp may feel tender for a day or so.'],
    ['q' => 'Does it hurt, and what are the side effects?',
     'a' => 'The blood draw feels like any blood test. The injections sting briefly, more so near the hairline, and cooling or a numbing cream helps. Tenderness and redness for a day or so are common, sometimes with mild forehead swelling. Infection at an injection site is uncommon but possible.'],
    ['q' => 'Can I wear a helmet, go to the gym or wash my hair afterwards?',
     'a' => 'For a short time, avoid heavy exercise and heavy sweating, saunas, steam rooms and pools, and colouring or chemical scalp treatments. A helmet can feel sore on a tender scalp for a day or so, so keep its liner clean. Your written aftercare sheet says when you can wash your hair.'],
    ['q' => 'When will I know whether GFC is working?',
     'a' => 'Less shedding is usually the first change people notice. Density is judged at around three to six months by setting your photographs beside the baseline ones; nothing meaningful can be judged after a single session. If that review shows no change, the course stops.'],
    ['q' => 'Who should not have GFC, and what happens if it does not suit me?',
     'a' => 'It is postponed or not offered with scalp infection or inflammation, a bleeding, clotting or platelet disorder, unreviewed blood thinners, some cancers and active chemotherapy, poorly controlled illness, significant anaemia, and in pregnancy or breastfeeding. It will not help a smooth, bald scalp. If it does not suit you, you are told why and what may help instead, such as treating low iron or a thyroid problem, medication, or a transplant discussion; see <a href="/hair-fall-treatment-in-rohini">hair fall treatment in Rohini</a>.'],
    ['q' => 'Which side effects should I report straight away?',
     'a' => 'Spreading redness, heat or swelling, a fever after a session, or pain that worsens rather than settles. These are uncommon, but tell the Rohini clinic promptly by phone or WhatsApp if any of them appear.'],
    ['q' => 'Can GFC be used after a hair transplant?',
     'a' => 'Sometimes, to support the native hair around the transplanted area rather than the grafts themselves. Timing matters, because a healing recipient area should not be injected too early. Surgery itself is covered on the <a href="/hair-transplant-in-rohini">hair transplant at the Rohini clinic</a> page.'],
    ['q' => 'Will the benefit last if I stop?',
     'a' => 'No. GFC does not alter the process behind pattern hair loss. Any benefit depends on continued maintenance, usually alongside medication, and once sessions stop, thinning generally carries on from where it had reached.'],
    ['q' => 'Is EMI available for a GFC course?',
     'a' => 'Instalment options through third-party lenders may be available; ask at the consultation. The lender, not the clinic, sets the terms, so compare the total payable with paying outright. See <a href="/cost-and-emi-options">cost and EMI options</a>, and <a href="/prp-hair-treatment-cost-in-rohini">PRP hair treatment cost in Rohini</a> for what decides the price of a PRP or GFC course.'],
    ['q' => 'Can I send photos on WhatsApp before booking?',
     'a' => 'Yes. Clear daylight photographs of the thinning areas help the Rohini clinic answer a first question, but whether GFC suits you is decided only after your scalp has been examined in person. The clinic is open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . ').'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'GFC treatment for hair in Rohini'],
];

$page = [
    'title'       => 'GFC Hair Treatment in Rohini, Delhi: GFC vs PRP & Cost',
    'description' => 'GFC hair treatment at our Rohini clinic, North-West Delhi: how it differs from PRP and mesotherapy, its limited evidence, sessions, side effects and cost.',
    'url'         => '/gfc-treatment-in-rohini',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_delhi_clinic(),
        schema_therapy('/gfc-treatment-in-rohini', [
            'name'          => 'GFC Treatment for Hair',
            'alternateName' => ['Growth factor concentrate therapy for hair', 'GFC hair treatment in Rohini, Delhi'],
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'A small sample of the patient\'s own blood is drawn and centrifuged. The platelets are activated during preparation so that their growth factors are released into the plasma, and the platelets and other cells are then separated out. The largely cell-free concentrate is injected into the scalp at follicular depth across the thinning areas, as a planned course of sessions spaced some weeks apart.',
            'preparation'   => 'Clinical history and scalp examination under magnification, review of medication including anticoagulants and agents affecting platelet function, blood investigations where indicated to identify reversible causes of hair loss, and baseline photography.',
            'followup'      => 'Response reviewed against baseline photographs at around three to six months; the course is stopped where there is no meaningful change, or continued with maintenance sessions alongside medical therapy where there is.',
            'expectedPrognosis' => 'Reduced shedding is commonly the earliest observed change, and density changes, where they occur, are assessed over months. The published evidence for growth factor concentrate is smaller and newer than for platelet-rich plasma, and it has not been shown to outperform it. GFC does not halt pattern hair loss, any benefit requires maintenance, and a proportion of patients do not respond.',
            'location'      => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
        ]),
        schema_breadcrumbs($crumbs),
        schema_faq('/gfc-treatment-in-rohini', $faqs),
    ],
    'preload_image' => '/assets/img/services/svc-follicle-768.webp',
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Rohini, Delhi</span>
        <h1 class="h1 mt-3">GFC Treatment for Hair in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">Growth factor concentrate (GFC) is made from a small sample of your own blood, taken one processing step further than PRP. That step changes what is injected; it has not been shown to change the result. At our Rohini clinic in North-West Delhi, a GFC course starts only once the cause of your thinning is known, is measured against baseline photographs, and stops if nothing changes.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Hair PRP / GFC" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp the Rohini Clinic</a>
        </div>

        <?= ticks([
            'Prepared in the clinic from your own blood',
            'Cause of the thinning checked first',
            'Response judged on baseline photographs',
            'A course that stops if there is no response',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-follicle-768.webp" srcset="/assets/img/services/svc-follicle-512.webp 512w, /assets/img/services/svc-follicle-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a sculpted cross-section of scalp skin showing hair follicles beneath the surface and hair shafts rising from it" width="768" height="960" loading="eager" fetchpriority="high">
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
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Follicles checked</p><p class="meta mt-1">Magnified scalp examination before any blood is drawn.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Evidence stated</p><p class="meta mt-1">Smaller and newer than the research behind PRP.</p></div>
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Photographs, not memory</p><p class="meta mt-1">Same angles and lighting at every review.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Registered doctors</p><p class="meta mt-1">Treatment by registered medical practitioners.</p></div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-prp',
    'alt'     => 'a capped tube of golden plasma standing on a white tray beside a syringe',
    'eyebrow' => 'How it is made',
    'title'   => 'What Growth Factor Concentrate Is',
    'tone'    => 'white',
    'html'    => '<p>Platelets carry growth factors, signalling proteins the body uses for repair. GFC aims to deliver those proteins, without the platelets themselves, to follicles that are weakening but still present.</p>'
               . '<p>With PRP the platelets are injected and release their growth factors gradually in the scalp; with GFC that release happens in the tube. The case made for this (less cell debris, a more predictable release) rests on the method, not on hair-growth results. Our page on <a href="/hair-prp-treatment-in-rohini">hair PRP and GFC treatment in Rohini</a> sets the two side by side.</p>'
               . '<p>Both are made from your own blood, so a reaction to the material itself is not expected. Neither creates new follicles.</p>',
    'points'  => [
        'Blood drawn from your arm, as for a routine test',
        'Spun so the plasma and platelet layer separates',
        'Platelets activated, releasing growth factors in the tube',
        'Cells removed, leaving a largely cell-free concentrate',
    ],
]) ?>

<section class="section section--canvas" id="evidence">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">The evidence</p>
      <h2 class="h2 mt-2">What GFC Has and Has Not Been Shown to Do</h2>
      <p class="body mt-3">GFC is often sold as the newer, stronger form of PRP. The research does not support that description yet.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="card card--pad-lg">
        <h3 class="h3">What the research supports</h3>
        <div class="mt-3"><?= ticks([
            'It is prepared differently from PRP',
            'It comes from your own blood, as PRP does',
            'It is used for the same kinds of thinning',
            'Reported side effects resemble those of PRP',
        ], false) ?></div>
      </div>
      <div class="card card--pad-lg">
        <h3 class="h3">What has not been shown</h3>
        <div class="mt-3"><?= ticks([
            'That it outperforms PRP',
            'That it works where PRP did not',
            'That fewer sessions are needed',
            'That any benefit lasts longer',
        ], false) ?></div>
      </div>
    </div>
    <div class="card card--pad-lg mt-4">
      <h3 class="h4">A concentration figure is not a result</h3>
      <p class="body-s mt-2 measure">Some clinics quote how many times more growth factor a GFC tube holds. That number describes the tube, not your scalp. The studies behind GFC are fewer, mostly recent and often from a single centre, and few compare it directly with well-prepared PRP in the same patients. PRP’s own trials are mostly small and short. Our article on <a href="/blog/prp-vs-gfc-vs-exosomes">PRP, GFC and exosomes compared</a> walks through the research.</p>
    </div>
  </div>
</section>

<section class="section section--white" id="gfc-vs-prp">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Side by side</p>
      <h2 class="h2 mt-2">GFC vs PRP vs Mesotherapy: How They Compare</h2>
      <p class="body mt-3">Three scalp injection treatments that are often offered as alternatives. They differ in what goes into the syringe, where it comes from and how much research stands behind it, not in a proven difference in hair.</p>
    </div>
    <div class="card mt-6" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data" style="min-width:760px">
          <caption class="sr-only">GFC, PRP and mesotherapy for hair compared: what each is made from, what is injected, evidence, usual course, after-effects, place in a plan and price</caption>
          <thead>
            <tr><th scope="col">&nbsp;</th><th scope="col">GFC</th><th scope="col">PRP</th><th scope="col">Mesotherapy</th></tr>
          </thead>
          <tbody>
            <tr><th scope="row">Made from</th><td>Your own blood</td><td>Your own blood</td><td>A prepared mixture, usually of vitamins, minerals, amino acids and other agents, with no standard formulation</td></tr>
            <tr><th scope="row">What is injected</th><td>Growth factors released from the platelets during preparation, with the cells filtered out</td><td>Plasma with concentrated platelets, which release their growth factors gradually in the scalp</td><td>Small amounts of the mixture, placed in the superficial layers of the scalp</td></tr>
            <tr><th scope="row">Published evidence</th><td>Smaller and newer than for PRP; not shown to outperform it</td><td>The more studied of the three, though trials are mostly small and short</td><td>Limited; its effectiveness in hair loss has not been established</td></tr>
            <tr><th scope="row">Usual course</th><td>Sessions spaced some weeks apart; not shown to need fewer than PRP</td><td>Commonly three or four sessions about four weeks apart, then maintenance every three to six months if responding</td><td>A course of sessions spaced some weeks apart</td></tr>
            <tr><th scope="row">Usual after-effects</th><td>Tenderness, redness and pinpoint marks for a day or so; similar to PRP</td><td>Tenderness, redness, pinpoint marks or mild swelling for a day or so</td><td>Tenderness, redness, small bumps and occasional bruising; a reaction to a component is possible</td></tr>
            <tr><th scope="row">Place in a plan</th><td>Usually alongside medication; any benefit needs maintenance</td><td>Usually alongside medication; any benefit needs maintenance</td><td>At most an optional addition to better-evidenced treatment, never the main one</td></tr>
            <tr><th scope="row">Price</th><td>Often priced above PRP; the evidence does not show it does more</td><td>Often priced below GFC</td><td>Priced per session; quoted after the assessment</td></tr>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">None of the three creates new follicles, and none cures pattern hair loss. More on each in <a href="/hair-prp-treatment-in-rohini">hair PRP treatment in Rohini</a> and <a href="/hair-mesotherapy-in-rohini">hair mesotherapy in Rohini</a>.</p>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-women',
    'alt'     => 'a mannequin head with green felt hair and a widening central parting, seen from above',
    'eyebrow' => 'Suitability',
    'title'   => 'Who GFC May Suit, and Who It Will Not Help',
    'tone'    => 'canvas',
    'reverse' => true,
    'html'    => '<p>GFC can only support follicles that are still alive, so the scalp examination settles most of this before any blood is drawn.</p>'
               . '<p><b>Unlikely to help:</b> a smooth, bald scalp; shedding from untreated iron, thyroid or hormonal problems; recent diffuse shedding that may settle on its own (see <a href="/blog/telogen-effluvium-vs-pattern-hair-loss">telogen effluvium compared with pattern hair loss</a>); or established baldness, where surgery is the real question.</p>'
               . '<p><b>Postponed or not offered:</b> scalp infection or inflammation, a bleeding, clotting or platelet disorder, unreviewed blood thinners, some cancers and active chemotherapy, poorly controlled illness, pregnancy or breastfeeding, and significant anaemia. If the cause is unclear, start with <a href="/hair-fall-treatment-in-rohini">hair fall treatment at the Rohini clinic</a>.</p>'
               . '<p><b>May be considered for:</b></p>',
    'points'  => [
        'Early to moderate pattern thinning with follicles still present',
        'Thinning already being treated with medication',
        'Native hair around an earlier transplant',
        'People who prefer a preparation made from their own blood',
    ],
]) ?>

<?= lp_steps([
    'eyebrow' => 'Step by step',
    'title'   => 'How a GFC Course Runs in Rohini',
    'intro'   => 'Nothing is injected at the first visit. The aim is to find out whether GFC has anything to work on.',
    'tone'    => 'white',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a wooden desk beside a potted fern',             'title' => 'Assessment and tests',                    'text' => 'Your history, medicines and a magnified look at the scalp, with blood tests if your history points to iron, thyroid or other causes. Anything treatable is dealt with first.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram beside a sheet of paper on a wooden desk',    'title' => 'Baseline photographs and a written plan', 'text' => 'Fixed angles and lighting. The plan names the preparation, the number of sessions, the review date and the cost of the whole course.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with several dates circled, beside a small plant and a pen',  'title' => 'Sessions, then review',                   'text' => 'Blood drawn and prepared, scalp cooled or numbed, concentrate injected at follicle depth in under an hour. At around three to six months the photographs are compared; no change means the course stops.'],
    ],
]) ?>

<section class="section section--canvas" id="after">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">After a session</p>
      <h2 class="h2 mt-2">Side Effects, Maintenance and Limits</h2>
      <p class="body mt-3">A general picture rather than a promise. Results vary, and some people do not respond at all.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="card">
        <h3 class="h4">Before a session</h3>
        <p class="body-s mt-3">Eat and drink as usual, since blood is taken. Mention aspirin, anti-inflammatory painkillers or blood thinners well before the day. Opening hours and <a href="/delhi-clinic">directions to the Rohini clinic</a> are on the clinic page.</p>
      </div>
      <div class="card">
        <h3 class="h4">Usual for a day or so</h3>
        <div class="mt-3"><?= ticks([
            'Tenderness, redness and pinpoint marks',
            'Occasional mild forehead swelling next morning',
            'A bruise where blood was taken',
        ], false) ?></div>
      </div>
      <div class="card">
        <h3 class="h4">Briefly avoid</h3>
        <div class="mt-3"><?= ticks([
            'Heavy exercise and heavy sweating',
            'Saunas, steam rooms and pools',
            'Colouring or chemical scalp treatments',
        ], false) ?></div>
      </div>
      <div class="card">
        <h3 class="h4">Tell the clinic promptly about</h3>
        <div class="mt-3"><?= ticks([
            'Spreading redness, heat or swelling',
            'A fever after a session',
            'Pain that worsens rather than settles',
        ], false) ?></div>
      </div>
    </div>
    <div class="card card--pad-lg mt-4">
      <h3 class="h4">Maintenance, not a cure</h3>
      <p class="body-s mt-2 measure">GFC does not switch off pattern hair loss. If it helps, the benefit lasts only while maintenance continues, usually alongside medication: minoxidil, and finasteride in men, have a deeper evidence base, though neither is a cure (see <a href="/blog/minoxidil-and-finasteride-in-india">minoxidil and finasteride in India</a>). Once sessions stop, thinning generally resumes from wherever it had reached.</p>
    </div>
  </div>
</section>

<?= lp_highlights([
    'eyebrow' => 'Recovering in Delhi',
    'title'   => 'After a GFC Session: Delhi Heat, Dust and Helmets',
    'intro'   => 'General practicalities for the day or two after a session. Where your written aftercare sheet says something different, follow the sheet.',
    'tone'    => 'white',
    'items'   => [
        ['icon' => 'clock',    'title' => 'Hot months',            'text' => 'Heavy sweating is one of the things to avoid for a short time. On a hot day, plan a cool, quiet rest of the day, and leave the gym or outdoor sport until your sheet allows.'],
        ['icon' => 'shield',   'title' => 'Smog season and dust',  'text' => 'Winter smog and roadside dust do not change the treatment, but a tender scalp should be kept clean. Wash gently when your sheet allows, and avoid scratching the injection sites.'],
        ['icon' => 'cap',      'title' => 'Two-wheeler helmets',   'text' => 'A helmet can press on a tender scalp for a day or so. A clean liner helps, and if you ride every day, say so at the session.'],
        ['icon' => 'calendar', 'title' => 'Keeping the intervals', 'text' => 'Sessions spaced some weeks apart make the review a fair test. Plan the dates around festivals, weddings and travel so the gaps hold.'],
    ],
]) ?>

<section class="section section--canvas" id="questions">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Before you pay</p>
      <h2 class="h2 mt-2">Questions Worth Asking About Any GFC Course</h2>
      <p class="body mt-3">They apply wherever you have GFC, including here. Clear answers tell you more than any claim about which preparation is newest.</p>
    </div>
    <div class="card card--pad-lg mt-6">
      <?= ticks([
          'How is the concentrate prepared, and is it the same every session?',
          'Who gives the injections? A doctor should.',
          'When is the response reviewed, and against which photographs?',
          'What happens to the plan if the review shows no change?',
          'What will maintenance cost once the first course ends?',
          'Has anyone examined my scalp and checked iron and thyroid?',
      ]) ?>
    </div>
    <div class="note mt-4">
      <p class="body-s"><b>One preparation at a time.</b> Mix GFC, PRP or other injections in one course and nobody can tell which did anything. One preparation, judged on standardised photographs, tells you more.</p>
    </div>
  </div>
</section>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">GFC Cost Factors in Rohini</h2>
        <p class="body mt-3 measure">We do not publish a single-session price, because it says little about the course you would need. Yours is quoted in writing after the assessment, with the sessions, the review point and maintenance shown separately.</p>
        <p class="body mt-3 measure">Be wary of a large prepaid package sold before an examination; you want to be able to stop after review. How a PRP or GFC course is priced, and what a written estimate should include, is set out in <a href="/prp-hair-treatment-cost-in-rohini">PRP hair treatment cost in Rohini</a>.</p>
        <p class="body mt-3 measure">Instalment options through third-party lenders may be available; ask at the consultation, and read <a href="/cost-and-emi-options">cost and EMI options</a> before signing anything.</p>
      </div>
      <div class="grid grid--2">
        <div class="card"><p class="h4">Sessions planned</p><p class="meta mt-1">From your diagnosis, adjusted at review.</p></div>
        <div class="card"><p class="h4">Area treated</p><p class="meta mt-1">A crown patch needs less than a wide thinning zone.</p></div>
        <div class="card"><p class="h4">The preparation</p><p class="meta mt-1">GFC is often priced above PRP; the evidence does not show it does more.</p></div>
        <div class="card"><p class="h4">Maintenance and medication</p><p class="meta mt-1">Shown as separate lines from the start.</p></div>
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
        <h2 class="h2 mt-2">GFC Treatment in Rohini: Questions</h2>
        <p class="body-s mt-3">General patient education. Whether GFC suits your scalp is answered at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask the Rohini Clinic</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= latest_posts_strip('prp', 3, 'Further Reading') ?>

<?= local_block(
    'Visit Our Rohini Clinic',
    'A GFC course, from the first assessment to the last review, can be completed at our Rohini clinic in North-West Delhi, near the Outer Ring Road.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= lp_cta([
    'eyebrow'   => 'Rohini, Delhi',
    'title'     => 'Find Out Whether GFC Has Anything to Work On',
    'text'      => 'Book an assessment at the Rohini clinic. Your scalp is examined under magnification, the tests your history calls for are arranged, and you get a plain answer on whether a GFC course makes sense or whether something else should come first.',
    'treatment' => 'Hair PRP / GFC',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
