<?php
/**
 * /alopecia-areata-treatment-in-rohini — diagnosis and management of
 * alopecia areata at the Rohini (Delhi) clinic.
 *
 * October 2026 (batch 2). Every service is carried out at the Rohini clinic
 * (agency, 13 Oct 2026). Client rule (14 Oct 2026): Rohini pages do not name
 * the other location or link to its pages.
 *
 * Medical position (same as the existing alopecia areata page): an
 * autoimmune condition; limited patches often regrow on their own; treatment
 * is chosen by extent, duration, age and health, and some options need close
 * medical supervision with monitoring; extensive disease may need onward
 * referral; PRP is not an established treatment; no hair transplant while
 * the condition is active. No medicine names, regimens or doses are given.
 *
 * Landing-page layout: lp_highlights / lp_split / lp_steps / lp_cta
 * (includes/home-components.php); every image is a labelled AI illustration
 * and each is used once.
 *
 * Not yet reviewed by the clinic's doctor: no medical_review_line(), no
 * "reviewed by" badge, doctor_block(..., false), not in MEDICAL_PAGES.
 *
 * SEO round 3 (14 Oct 2026): title per the competitor research; a "looks
 * like → how it differs" table of patchy hair loss lookalikes; a Delhi
 * seasons row; a cost-factors section with "questions worth asking any
 * clinic" (cost moved out of the outlook split); links to the
 * self-assessment and hair fall blog posts; 15 FAQs. The PRP cost page is
 * deliberately not linked: PRP is not an established treatment here.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'Is alopecia areata treated at the Rohini clinic itself?',
     'a' => 'Yes. Diagnosis, treatment of the patches and follow-up reviews take place at the Rohini clinic in North-West Delhi. If your case would be better managed by another team, the doctor will explain why and discuss a referral with you.'],
    ['q' => 'Which parts of Delhi is the Rohini clinic convenient for?',
     'a' => 'Its position near the Outer Ring Road makes it practical for North and North-West Delhi: Rohini itself, Pitampura, Shalimar Bagh, Prashant Vihar and the areas around them. Use the Directions link on the clinic card to plan your route.'],
    ['q' => 'Will my hair grow back?',
     'a' => 'Often, especially with one or a few small patches, which frequently regrow without treatment. Widespread loss, loss that has lasted a long time, or loss of eyebrows, lashes and body hair is harder to predict. Hair can also fall out again in a later episode.'],
    ['q' => 'Is it contagious, or caused by something I did?',
     'a' => 'Neither. It cannot pass to anyone else, and it is not caused by shampoo, oil, diet or washing habits. It is an autoimmune condition with an inherited tendency, and usually no single trigger is found.'],
    ['q' => 'Is alopecia areata caused by stress?',
     'a' => 'Many people report a stressful spell around the time the patches appeared, but the link is not proven. It is an autoimmune condition, not the result of failing to stay calm, and being told to relax rarely helps. If the hair loss is affecting your mood or sleep, say so at the appointment.'],
    ['q' => 'Can it affect the eyebrows, eyelashes or beard?',
     'a' => 'Yes. A bare patch in the beard, a gap in an eyebrow or patchy lashes can be the first sign, or the only one, which is why the brows, lashes and beard are examined as well as the scalp. The same caution about surgery applies there: no eyebrow or beard transplant while the condition is active.'],
    ['q' => 'What should I bring to the first appointment?',
     'a' => 'Photographs from when the patches first appeared, the dates of any earlier episodes, a list of your medicines, any recent blood reports, and a note of thyroid disease or other autoimmune conditions in you or your family. Daylight photos taken on a phone are enough.'],
    ['q' => 'Will I need blood tests?',
     'a' => 'Sometimes. Because alopecia areata is linked with thyroid disease and other autoimmune conditions, a thyroid test or other screening may be suggested, depending on your history and examination. See <a href="/blog/blood-tests-for-hair-fall">which blood tests matter for hair loss</a>.'],
    ['q' => 'Is it ever right to wait rather than treat?',
     'a' => 'Sometimes. One or a few small patches often regrow without treatment, so waiting with photographs and a review date is a reasonable choice, not a refusal to treat. Whether it suits you depends on how many patches there are, how long they have been there and how much they are affecting you.'],
    ['q' => 'How soon will I know whether treatment is working?',
     'a' => 'Regrowth is judged over months, not weeks. The first new hairs in a patch are often fine and white, and usually darken later. Each patch is photographed at the first visit and compared at every review, so change is measured rather than guessed.'],
    ['q' => 'Are there side effects?',
     'a' => 'Every option has some, and they are explained before you agree to it. Injections into a patch can leave a temporary dip in the skin where they were given. Treatments used under close medical supervision for extensive disease need monitoring, which can include blood tests. Tell the Rohini clinic about anything new or worrying between reviews.'],
    ['q' => 'Can I have a hair transplant for my patches?',
     'a' => 'Not while the condition is active. Moved follicles can be attacked in the same way, and donor hair cannot be replaced. After a long stable period surgery may be reconsidered with caution, but it is never a reason to delay treating the condition.'],
    ['q' => 'Does PRP help alopecia areata?',
     'a' => 'PRP is not an established treatment for alopecia areata and does not act on the immune process behind it. It is used mainly as a supportive treatment for pattern thinning.'],
    ['q' => 'What does treatment cost, and is EMI available?',
     'a' => 'Prices are not published; the written plan you are given includes the cost. A few small patches mostly mean the consultation and reviews, while extensive disease needing supervised treatment and monitoring costs more. Where a plan runs over several months, instalment options through third-party lenders may be available; ask at the consultation, and see <a href="/cost-and-emi-options">cost and EMI options</a>.'],
    ['q' => 'Can I send photos on WhatsApp or try a self-check first?',
     'a' => 'Yes. Clear daylight photographs of the patches help the Rohini clinic answer a first question, and the <a href="/hair-loss-assessment">six-question hair loss self-assessment</a> can suggest a next step. Neither replaces an examination, which is how lookalike conditions are ruled out. The clinic is open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . ').'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Alopecia areata treatment in Rohini'],
];

$page = [
    'title'       => 'Alopecia Areata Treatment in Rohini, Delhi: Patchy Hair Loss',
    'description' => 'Alopecia areata treatment in Rohini, North-West Delhi: patchy hair loss told apart from lookalikes, options matched to extent, and why a transplant waits.',
    'url'         => '/alopecia-areata-treatment-in-rohini',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_delhi_clinic(),
        schema_therapy('/alopecia-areata-treatment-in-rohini', [
            'name'          => 'Alopecia Areata Treatment',
            'alternateName' => ['Patchy hair loss treatment', 'Autoimmune hair loss treatment', 'Alopecia areata treatment in Rohini, Delhi'],
            'bodyLocation'  => 'Scalp, eyebrows, eyelashes, beard and body hair',
            'howPerformed'  => 'Diagnosis on history and examination of the scalp, eyebrows, eyelashes, beard and nails, with trichoscopy of affected patches to distinguish alopecia areata from fungal infection, traction, hair-pulling and scarring alopecias. Screening for associated autoimmune conditions, including thyroid function, where indicated; biopsy only where the diagnosis is unclear. Management follows the extent and duration of disease and the patient\'s age and health: observation with review for limited patchy disease, topical or locally injected treatment for limited patches, and therapies requiring close medical supervision and monitoring for extensive disease, with onward referral where appropriate. Hair restoration surgery is not undertaken while the condition is active.',
            'preparation'   => 'History of onset, order of patches, earlier episodes, personal and family history of autoimmune disease and current medication; photographs from earlier in the episode; baseline photography of affected areas.',
            'followup'      => 'Review against baseline photographs, monitoring of any treatment that requires surveillance, and reassessment of the plan over months.',
            'expectedPrognosis' => 'Variable. Limited patchy disease often regrows, sometimes without treatment; extensive or long-standing disease, or involvement of eyebrows, eyelashes and body hair, has a less predictable course. Relapse after regrowth is recognised. Outcomes vary between patients.',
            'location'      => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
        ]),
        schema_breadcrumbs($crumbs),
        schema_faq('/alopecia-areata-treatment-in-rohini', $faqs),
    ],
    'preload_image' => '/assets/img/services/svc-consultation-768.webp',
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Rohini, Delhi</span>
        <h1 class="h1 mt-3">Alopecia Areata Treatment in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">Alopecia areata causes smooth, round patches of hair loss on the scalp, beard or eyebrows, often within a few weeks. The immune system is turning on the hair follicles. At our Rohini clinic in North-West Delhi, a doctor confirms the diagnosis, explains how likely the patches are to regrow and agrees a plan that fits how much hair is affected.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Hair fall treatment" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp the Rohini Clinic</a>
        </div>

        <?= ticks([
            'Scalp, brows, beard and nails examined',
            'Blood tests only where your history suggests them',
            'No hair transplant while the condition is active',
            'Assessment, treatment and reviews in Rohini',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-consultation-768.webp" srcset="/assets/img/services/svc-consultation-512.webp 512w, /assets/img/services/svc-consultation-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a dermatoscope and a notepad with a pencil on a wooden desk beside a potted fern" width="768" height="960" loading="eager" fetchpriority="high">
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

<?= lp_highlights([
    'eyebrow' => 'In brief',
    'title'   => 'Alopecia Areata at a Glance',
    'tone'    => 'white',
    'items'   => [
        ['icon' => 'info',        'title' => 'Not your fault',       'text' => 'Not contagious, and not caused by hair care, diet or anything you did.'],
        ['icon' => 'follicle',    'title' => 'Regrowth is common',   'text' => 'One or a few small patches often recover without treatment.'],
        ['icon' => 'stethoscope', 'title' => 'Monitored treatment',  'text' => 'Stronger options are used only under close medical supervision.'],
        ['icon' => 'people',      'title' => 'Referral when needed', 'text' => 'Extensive disease may be better managed by another team.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-follicle',
    'alt'     => 'a sculpted cross-section of scalp skin with hair follicles',
    'eyebrow' => 'The condition',
    'title'   => 'What Alopecia Areata Is, and What It Is Not',
    'id'      => 'condition',
    'tone'    => 'canvas',
    'html'    => '<p>The immune system mistakes hair follicles for a target and switches them off. The follicles are not destroyed, which is why hair can grow back, and why the condition can come and go.</p>'
               . '<p>It has an inherited tendency and is more frequent alongside thyroid disease or other autoimmune conditions. It can affect the scalp, beard, eyebrows, lashes, body hair and nails.</p>'
               . '<p>Loss of all scalp hair is called <b>alopecia totalis</b>, and loss across the body <b>alopecia universalis</b>. Both are harder to predict than separate patches.</p>',
    'points'  => [
        'Not contagious',
        'Not caused by shampoo, oil, diet or washing habits',
        'Not a fungal or bacterial infection',
        'Not treated by products sold for ordinary hair fall',
    ],
]) ?>

<section class="section section--white" id="signs">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Recognising it</p>
      <h2 class="h2 mt-2">Signs That Point to Alopecia Areata</h2>
      <p class="body mt-3">The pattern is usually distinctive, but other conditions cause patchy loss too, and they are treated differently.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-2">Smooth round patches</h3><p class="body-s mt-2">Coin-sized or larger areas of complete hair loss on normal-looking skin, appearing over days or weeks and rarely sore.</p></div>
      <div class="card"><?= icon('pencil', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-2">Short broken hairs at the edge</h3><p class="body-s mt-2">Under magnification, short hairs that narrow towards the scalp are often seen at the margin of an active patch.</p></div>
      <div class="card"><?= icon('beard', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-2">Beard, brows and lashes</h3><p class="body-s mt-2">A bare patch in the beard or a gap in an eyebrow can be the first sign, or the only one.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-2">Nail changes</h3><p class="body-s mt-2">Small pits or ridges on the nails sometimes go with it, so the nails are checked too.</p></div>
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-2">Pale regrowth</h3><p class="body-s mt-2">New hair in a recovering patch is often fine and white at first, and usually darkens over time.</p></div>
      <div class="card"><?= icon('list', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-2">Lookalikes ruled out</h3><p class="body-s mt-2">Scalp ringworm, hair pulled out by habit, traction from tight styles and scarring conditions can all look similar. The table below shows how they differ.</p></div>
    </div>

    <h3 class="h3 mt-6">Patchy Hair Loss: Alopecia Areata or Something Else?</h3>
    <p class="body-s mt-2 measure">How the patch looks, and what the skin and hairs show under magnification, usually separate these. Each is treated differently, so the diagnosis comes first.</p>
    <div class="card mt-4" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data" style="min-width:760px">
          <caption class="sr-only">Conditions that can look like alopecia areata, what each looks like, and how it is told apart at the examination</caption>
          <thead>
            <tr><th scope="col">Condition</th><th scope="col">What it looks like</th><th scope="col">How it differs, and what is checked</th></tr>
          </thead>
          <tbody>
            <tr><th scope="row">Alopecia areata</th><td>Smooth, round patches of complete hair loss on normal-looking skin, appearing over days or weeks, on the scalp, beard, brows or lashes.</td><td>Short hairs that narrow towards the scalp at the edge of an active patch, seen under magnification; the nails are checked for small pits or ridges.</td></tr>
            <tr><th scope="row">Scalp ringworm (tinea capitis)</th><td>Scaly patches with broken hairs, sometimes itchy or inflamed; seen more often in children.</td><td>Scaling and broken stubble rather than smooth skin. A scraping or a few hairs may be checked for fungus, and it needs antifungal medicine. More under <a href="/dandruff-treatment-in-rohini">scaly scalp conditions</a>.</td></tr>
            <tr><th scope="row">Hair pulled out by habit</th><td>Irregular patches in which the remaining hairs are snapped off at different lengths.</td><td>The shape of the patch and the uneven breakage, with normal skin beneath; the history is taken without judgement.</td></tr>
            <tr><th scope="row">Traction from hairstyles</th><td>Gradual thinning along the hairline and temples from tight buns, braids or extensions.</td><td>Your hairstyle history and the pattern along the hairline. See <a href="/womens-hair-loss-treatment-in-rohini">women’s hair loss treatment</a>.</td></tr>
            <tr><th scope="row">Scarring hair loss</th><td>Patches where the skin may look shiny, red or scaly, sometimes itchy or tender.</td><td>Trichoscopy for missing follicle openings, since hair lost to scarring may not regrow; a biopsy only where the diagnosis is unclear.</td></tr>
            <tr><th scope="row">Diffuse shedding (telogen effluvium)</th><td>Thinning all over rather than in defined patches, two to three months after an illness, operation or stressful spell.</td><td>The months before the shedding and a pull test. See <a href="/blog/telogen-effluvium-vs-pattern-hair-loss">telogen effluvium versus pattern hair loss</a>.</td></tr>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">Patchy hair loss needs a doctor’s examination rather than a salon treatment; <a href="/blog/who-should-assess-hair-fall">dermatologist, trichologist or salon</a> explains who can diagnose it and prescribe. The <a href="/hair-loss-assessment">six-question hair loss self-assessment</a> can suggest a next step before you book.</p>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'At the Rohini clinic',
    'title'   => 'How Your Assessment Works',
    'id'      => 'assessment',
    'intro'   => 'The diagnosis is usually made on examination. Bring photos from when the patches first appeared, dates of earlier episodes, your medicines and any recent blood reports.',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'stage-crown',   'alt' => 'a mannequin head seen from above with a bald patch at the crown',  'title' => 'History and examination', 'text' => 'When each patch appeared, earlier episodes and family history, then the scalp, beard, brows, lashes and nails, with trichoscopy to rule out lookalikes.'],
        ['img' => 'step-plan',     'alt' => 'a tablet showing a head diagram',                                  'title' => 'Tests and a plan',        'text' => 'Screening bloods only where indicated; a biopsy is rare. Then the options with their likely benefit, side effects and review schedule, including waiting.'],
        ['img' => 'step-followup', 'alt' => 'a desk calendar with review dates circled',                        'title' => 'Photographs and reviews', 'text' => 'Each patch photographed at the first visit, then compared at every review so change is measured, not guessed.'],
    ],
]) ?>

<section class="section section--white" id="treatment">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Treatment</p>
      <h2 class="h2 mt-2">Treatment Is Matched to How Much Hair Is Affected</h2>
      <p class="body mt-3">The choice depends on the number and size of patches, how long they have been there, your age and your health. Medicines and doses are decided at the consultation, not listed here, because some need close medical supervision.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="card card--pad-lg"><span class="pill">Limited patches</span><h3 class="h4 mt-3">Watchful waiting</h3><p class="body-s mt-2">For one or a few small patches, regrowth without treatment is common, though it can take months. Waiting with photographs and a review date is a reasonable choice, not a refusal to treat.</p></div>
      <div class="card card--pad-lg"><span class="pill">Limited patches</span><h3 class="h4 mt-3">Treatment on or into the patches</h3><p class="body-s mt-2">Applications to the skin, or injections into a patch at intervals. Side effects, such as a temporary dip in the skin where an injection was given, are explained beforehand.</p></div>
      <div class="card card--pad-lg"><span class="pill pill--ink">Extensive disease</span><h3 class="h4 mt-3">Supervised treatment</h3><p class="body-s mt-2">Widespread or long-standing loss may call for tablets or other treatment under close medical supervision, with monitoring that can include blood tests. If another team is better placed, onward referral is discussed openly.</p></div>
      <div class="card card--pad-lg"><span class="pill">Alongside any plan</span><h3 class="h4 mt-3">Related conditions and camouflage</h3><p class="body-s mt-2">A thyroid problem found on screening is treated in its own right; see <a href="/blog/blood-tests-for-hair-fall">which blood tests matter for hair loss</a>. Hair fibres, brow pencil, scarves and wigs do not treat the condition, but help many people through it.</p></div>
    </div>
    <div class="note mt-4">
      <p class="h4">Not treatments for alopecia areata</p>
      <p class="body-s mt-2">PRP is not an established treatment for this condition, and a transplant does not touch the immune process. If your hair loss is diffuse rather than patchy, see <a href="/hair-fall-treatment-in-rohini">hair fall treatment in Rohini</a>; for women, <a href="/womens-hair-loss-treatment-in-rohini">women's hair loss treatment in Rohini</a>.</p>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'intro-donor',
    'alt'     => 'a mannequin head seen from behind, with the donor area at the back and sides marked in green',
    'eyebrow' => 'Surgery',
    'title'   => 'Why a Hair Transplant Is Not Used for Active Alopecia Areata',
    'id'      => 'no-transplant',
    'tone'    => 'canvas',
    'reverse' => true,
    'html'    => '<p>Hair, beard and eyebrow transplants are carried out at the Rohini clinic, but not into active alopecia areata.</p>'
               . '<p>Surgery is not ruled out for life. Once the condition has been diagnosed, treated and stable for a sustained period, it can be reconsidered cautiously. The same applies to an <a href="/eyebrow-transplant-in-rohini">eyebrow transplant in Rohini</a> or a <a href="/beard-transplant-in-rohini">beard transplant in Rohini</a>. More in <a href="/blog/who-should-not-have-a-hair-transplant">who should not have a hair transplant</a>.</p>',
    'points'  => [
        'Grafts are follicles too, and can be attacked like the original hair',
        'Donor hair taken from the back of the scalp cannot be replaced',
        'Patches can regrow or return by themselves, so surgery adds risk without treating the cause',
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-hair-fall',
    'alt'     => 'a wooden comb with a few loose hairs resting on folded linen towels',
    'eyebrow' => 'Living with it',
    'title'   => 'The Outlook and the Emotional Side',
    'id'      => 'outlook',
    'tone'    => 'white',
    'html'    => '<p>Nobody can say for certain how your own case will behave. Sudden hair loss can be upsetting, especially when it shows on the eyebrows or beard.</p>'
               . '<p>Stress is often reported around the time patches appear, but the link is not proven, and being told to relax rarely helps. Say how it is affecting you; if low mood or anxiety is getting in the way of daily life, the doctor can suggest where to find support.</p>'
               . '<p>Reviews take place at the Rohini clinic; see <a href="/delhi-clinic">directions to the Rohini clinic</a>.</p>',
    'points'  => [
        'Limited patches: most likely to regrow, with or without treatment',
        'Extensive or long-standing loss: harder to predict',
        'New patches after regrowth are the condition, not a failed treatment',
    ],
]) ?>

<?= lp_highlights([
    'eyebrow' => 'Day to day in Delhi',
    'title'   => 'Living With Patches Through Delhi’s Seasons',
    'intro'   => 'Weather, water and air do not cause alopecia areata, which is autoimmune, but they change a few practical things. General points; your own plan comes from the examination.',
    'tone'    => 'canvas',
    'items'   => [
        ['icon' => 'clock',    'title' => 'Summer sun on bare skin',   'text' => 'Skin in a bare patch has lost its cover and can burn. A cap, a scarf or sunscreen on the patch helps on bright days.'],
        ['icon' => 'cap',      'title' => 'Caps, scarves and helmets', 'text' => 'Covering the patches does not make them worse. Keep linings clean, and let a sweaty scalp dry afterwards.'],
        ['icon' => 'calendar', 'title' => 'Monsoon humidity',          'text' => 'Damp months can aggravate fungal scalp infections. A scaly patch with broken hairs may be ringworm rather than alopecia areata, so show it to the doctor.'],
        ['icon' => 'shield',   'title' => 'Hard water and smog',       'text' => 'They can leave hair dry or the scalp irritable, but they do not cause the patches. New patches are the condition, not your water supply.'],
    ],
]) ?>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">Alopecia Areata Treatment Cost: What Decides It</h2>
        <p class="body mt-3 measure">The cost follows the extent of the condition. One or a few small patches mostly mean the consultation and review visits, with treatment on or into the patches if you choose it. Extensive or long-standing disease needing supervised treatment and monitoring costs more, and runs for longer.</p>
        <p class="body mt-3 measure">Prices are not published; the written plan you are given includes the cost. Where a plan runs over several months, instalment options through third-party lenders may be available; ask at the consultation, and see <a href="/cost-and-emi-options">cost and EMI options</a>. PRP is not an established treatment for alopecia areata, so it is not part of a plan for it.</p>
      </div>
      <div class="grid grid--2">
        <div class="card"><p class="h4">Extent of the patches</p><p class="meta mt-1">How many, how large and how long they have been there.</p></div>
        <div class="card"><p class="h4">Review visits</p><p class="meta mt-1">Photographs compared at each one.</p></div>
        <div class="card"><p class="h4">Treatment into patches</p><p class="meta mt-1">Given at intervals, so the number of visits matters.</p></div>
        <div class="card"><p class="h4">Supervised treatment</p><p class="meta mt-1">Monitoring, which can include blood tests.</p></div>
      </div>
    </div>
    <div class="card card--pad-lg mt-6">
      <h3 class="h4">Questions worth asking any clinic about patchy hair loss</h3>
      <p class="body-s mt-2">They apply wherever you are seen, including here.</p>
      <div class="mt-3"><?= ticks([
          'Has the diagnosis been confirmed on examination, and lookalikes ruled out?',
          'Is waiting with a review date reasonable for my patches?',
          'What side effects does this treatment have, and what monitoring does it need?',
          'If a transplant or PRP is suggested, what would it do about the immune process?',
          'At what point would referral to another team be discussed?',
          'What will the plan cost over the months it runs?',
      ]) ?></div>
    </div>
  </div>
</section>

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
        <h2 class="h2 mt-2">Alopecia Areata in Rohini: Questions</h2>
        <p class="body-s mt-3">General information about a medical condition. Your diagnosis and plan are settled at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask the Rohini Clinic</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= latest_posts_strip('hair-fall', 3, 'Further Reading') ?>

<?= local_block(
    'Visit Our Rohini Clinic',
    'Alopecia areata is diagnosed, treated and reviewed at our Rohini clinic in North-West Delhi, a short way from the Outer Ring Road.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= lp_cta([
    'eyebrow'   => 'Rohini, Delhi',
    'title'     => 'Have the Patches Examined',
    'text'      => 'Book an assessment at the Rohini clinic. You will get a diagnosis, screening only if your history calls for it, a plan matched to how much hair is affected, and a clear answer on surgery.',
    'treatment' => 'Hair fall treatment',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
