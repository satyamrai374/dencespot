<?php
/**
 * /hair-fall-treatment-in-gurgaon — page #34.
 *
 * The most consequential page in the consolidation: strategy §5.2 makes this
 * the single 301 target for the ~122 `hair-fall-treatment-in-{locality}`
 * doorway pages. It therefore has to earn the traffic those pages were
 * splitting — hence the "areas we serve" block, which absorbs the one honest
 * job those pages were doing.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/**
 * The consolidated service area. This replaces ~122 locality pages: one
 * clinic, one address, one page. Per the §5.3 quality gate the recommended
 * number of new locality pages is zero.
 */
$areas = [
    'Sector 39', 'Sushant Lok', 'DLF Phases 1–5', 'Golf Course Road', 'Sohna Road',
    'MG Road', 'Cyber City', 'Sector 56', 'South City', 'Palam Vihar',
    'Manesar', 'South Delhi',
];

$causes = [
    ['title' => 'Male pattern hair loss', 'body' => 'Androgenetic loss following a recognisable pattern — temples, then crown. Genetic and progressive, which is why the plan matters more than any single treatment.', 'icon' => 'hairline'],
    ['title' => 'Female pattern hair loss', 'body' => 'Usually diffuse thinning and a widening parting rather than a receding line. Frequently has a treatable contributor sitting behind it.', 'icon' => 'user'],
    ['title' => 'Telogen effluvium', 'body' => 'Sudden, heavy shedding two to three months after a trigger — illness, surgery, childbirth, crash dieting, severe stress. Usually self-limiting once the trigger is addressed (<a href="https://dermnetnz.org/topics/telogen-effluvium" rel="noopener nofollow" target="_blank">DermNet: telogen effluvium</a>).', 'icon' => 'chart'],
    ['title' => 'Nutritional and thyroid causes', 'body' => 'Low iron or ferritin, vitamin D deficiency, and under- or over-active thyroid all show up as hair loss. All are correctable, and all are missed if nobody tests.', 'icon' => 'search'],
    ['title' => 'Alopecia areata', 'body' => 'Well-defined round patches of loss, on the scalp or in the beard. An autoimmune condition that is treated medically — not with surgery while it is active.', 'icon' => 'shield'],
    ['title' => 'Scalp conditions', 'body' => 'Seborrhoeic dermatitis, psoriasis and fungal infection cause shedding and inflammation. The scalp is treated first; hair generally follows.', 'icon' => 'settings'],
    ['title' => 'Traction and styling damage', 'body' => 'Tight styles, chemical treatment and heat, causing loss along the hairline and parting. Reversible early; permanent once the follicle scars.', 'icon' => 'scale'],
    ['title' => 'Medication and medical treatment', 'body' => 'Some prescriptions and treatments cause shedding. Bring your full medication list — this is one of the fastest things to identify and often the easiest to work around.', 'icon' => 'doc'],
];

$faqs = [
    ['q' => 'How much hair fall is normal?',
     'a' => 'Shedding somewhere in the region of 50 to 100 hairs a day is generally considered normal, and it varies with washing frequency, season and hair length. What matters clinically is not the count but the trend: hair that is coming out faster than it is being replaced, a parting that is widening, or a scalp that is becoming visible. Those are worth examining.'],
    ['q' => 'When should I see a doctor about hair fall?',
     'a' => 'When shedding has been heavier than usual for more than about six to eight weeks, when the pattern is changing, when patches appear, or when the scalp is itchy, flaking or sore. Earlier is better — treatment holds what you still have far more reliably than it recovers what has gone.'],
    ['q' => 'What tests are done for hair fall?',
     'a' => 'Examination and scalp magnification first, then blood investigations where indicated — commonly thyroid function, iron studies including ferritin, vitamin D, and a full blood count. In some cases hormonal tests are added. The point is to identify anything reversible before committing you to long-term treatment.'],
    ['q' => 'Can hair fall be reversed?',
     'a' => 'It depends entirely on the cause. Shedding from a nutritional deficiency, a thyroid problem or telogen effluvium commonly recovers once the cause is corrected. Pattern hair loss is progressive: treatment slows it and can thicken miniaturising hairs, but follicles that are already gone do not come back without surgery. Background on the condition from <a href="https://dermnetnz.org/topics/male-pattern-hair-loss" rel="noopener nofollow" target="_blank">DermNet</a> and the <a href="https://www.nhs.uk/symptoms/hair-loss/" rel="noopener nofollow" target="_blank">NHS</a>.'],
    ['q' => 'Does stress cause hair fall?',
     'a' => 'Significant physical or emotional stress can trigger telogen effluvium, where a large proportion of follicles shift into the shedding phase at once. The shedding typically appears two to three months after the event and usually settles once the trigger has passed — the pattern <a href="https://dermnetnz.org/topics/telogen-effluvium" rel="noopener nofollow" target="_blank">DermNet describes for telogen effluvium</a>. Persistent stress can also worsen an existing pattern.'],
    ['q' => 'What is the difference between hair fall and hair loss?',
     'a' => 'Hair fall usually describes visible shedding — hair on the pillow, in the shower, on the comb. Hair loss describes the net result: less hair than there was. You can shed heavily and keep your density if regrowth keeps pace, and you can lose density with barely any visible shedding. Both are assessed differently.'],
    ['q' => 'Do hair fall shampoos and supplements work?',
     'a' => 'A medicated shampoo genuinely helps a scalp condition such as dandruff or seborrhoeic dermatitis, and correcting a proven deficiency helps. Supplements taken without a deficiency generally do not, and no shampoo treats androgenetic hair loss — the process happens at the follicle, not on the surface.'],
    ['q' => 'Will PRP stop my hair fall?',
     'a' => 'For the right case it can reduce shedding and support thinning follicles, but it does not stop the underlying process and it does nothing where follicles are already gone. It works best alongside medical therapy rather than instead of it. See <a href="/hair-prp-treatment-in-gurgaon">hair PRP treatment</a>.'],
    ['q' => 'When is a hair transplant the answer instead?',
     'a' => 'When follicles in the affected area are already lost, the pattern has stabilised, and the donor area can supply what the plan needs. Where follicles are still present but shrinking, medical treatment and PRP come first — surgery is not a substitute for them. See <a href="/hair-transplant-in-gurgaon">hair transplant in Gurgaon</a>.'],
    ['q' => 'Do I have to take treatment forever?',
     'a' => 'For pattern hair loss, largely yes — treatment holds ground rather than curing the condition, and stopping generally means resuming the loss from where it had reached. For a reversible cause such as iron deficiency or telogen effluvium, treatment is finite. Which situation you are in is exactly what the assessment establishes.'],
    ['q' => 'Is hair fall treatment different for women?',
     'a' => 'The investigation is broader. Female shedding more often has a treatable contributor — thyroid, iron, post-partum change, polycystic ovary syndrome — so those are checked and corrected before anything long-term is started. See women’s hair loss treatment.'],
    ['q' => 'How soon will I see results?',
     'a' => 'Hair grows slowly, and every treatment for hair loss is judged in months rather than weeks. Reduced shedding is usually the first change, commonly within two to three months. Visible density change is assessed against baseline photographs from around six months. Anyone promising faster is describing marketing, not biology.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Treatments', 'url' => '/hair-transplant-in-gurgaon'],
    ['name' => 'Hair fall treatment in Gurgaon'],
];

$page = [
    'title'       => 'Hair Fall Treatment in Gurgaon | DenceSpot Clinic',
    'description' => 'Hair fall treatment in Gurgaon. The cause is found first, thyroid, iron, stress or pattern loss, then treated. Doctor-led, Sector 39 Gurugram.',
    'url'         => '/hair-fall-treatment-in-gurgaon',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        [
            '@type' => 'MedicalCondition',
            '@id'   => abs_url('/hair-fall-treatment-in-gurgaon') . '#condition',
            'name'  => 'Hair loss',
            'alternateName' => ['Hair fall', 'Alopecia'],
            'possibleTreatment' => [
                ['@id' => abs_url('/hair-prp-treatment-in-gurgaon') . '#therapy'],
                ['@id' => abs_url('/hair-transplant-in-gurgaon') . '#procedure'],
            ],
        ],
        schema_faq('/hair-fall-treatment-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Hair fall treatment in Gurgaon</span>
        <h1 class="h1 mt-3">Hair Fall Treatment in Gurgaon, Starting With the Cause</h1>
        <p class="lead mt-3 measure">Hair fall is a symptom, not a diagnosis. Thyroid problems, low iron, a scalp condition, a recent illness and genetic pattern loss all present as hair coming out — and they need completely different treatment. We find out which one you have before recommending anything, because treating the wrong thing costs you months you cannot get back.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Cause investigated before treatment starts',
            'Blood work where it is clinically indicated',
            'Medical treatment before surgery is discussed',
            NAP_LOCALITY . ' · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow"><img src="/assets/img/dr-nayra.webp" alt="Dr. Nyra, MBBS, MD (Dermatology), hair restoration doctor at DenceSpot Clinic, Sector 39 Gurugram" width="800" height="1000" loading="eager"></div>
        <div class="hero__badge-card">
          <p class="eyebrow">Assessed &amp; reviewed by</p>
          <p class="h4 mt-1"><?= doctor_name() ?></p>
          <p class="meta"><?= doctor_credit() ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="trust">
  <div class="wrap">
    <div class="grid grid--4">
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Diagnosis first</p><p class="meta mt-1">Examination and blood work before a plan.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Least invasive first</p><p class="meta mt-1">Medical treatment before injections or surgery.</p></div>
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Measured, not guessed</p><p class="meta mt-1">Baseline photographs at fixed settings.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Doctor-led</p><p class="meta mt-1">Assessed by the doctor, not a counsellor.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="causes">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Why hair falls</p>
      <h2 class="h2 mt-2">The Common Causes of Hair Fall</h2>
      <p class="body mt-3">The common causes of hair fall are androgenetic alopecia (male and female pattern loss), telogen effluvium after illness, surgery, childbirth or acute stress, thyroid disorder, iron deficiency measured as low ferritin, alopecia areata, and scalp conditions such as seborrhoeic dermatitis. Several can run at once — pattern loss underneath, a thyroid problem on top of it, a scalp condition making both look worse. That is exactly why the examination comes before the prescription.</p>
    </div>
    <div class="grid grid--4 mt-6">
      <?php foreach ($causes as $c): ?>
      <div class="card">
        <?= icon($c['icon'], 22, 'var(--accent-deep)') ?>
        <h3 class="h4 mt-2"><?= e($c['title']) ?></h3>
        <p class="body-s mt-2"><?= e($c['body']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section--white" id="when">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">Timing</p>
        <h2 class="h2 mt-2">When Hair Fall Is Worth Getting Looked At</h2>
        <p class="body mt-3">Treatment holds what you still have far more reliably than it recovers what has gone. That single fact is why waiting is the most expensive decision in hair loss.</p>
        <a class="btn btn--ink mt-4" href="/book-consultation">Book an assessment</a>
      </div>
      <div class="grid grid--2">
        <div class="card card--tint"><h3 class="h4">Shedding for more than 6–8 weeks</h3><p class="body-s mt-2">Persistently heavier than your normal, rather than a bad week.</p></div>
        <div class="card card--tint"><h3 class="h4">A widening parting</h3><p class="body-s mt-2">Scalp becoming visible where it was not before — the earliest reliable sign in women.</p></div>
        <div class="card card--tint"><h3 class="h4">A receding or thinning hairline</h3><p class="body-s mt-2">Temples moving back, or the frontal line losing definition.</p></div>
        <div class="card card--tint"><h3 class="h4">Distinct patches</h3><p class="body-s mt-2">Round, well-defined bare areas on the scalp or in the beard. Get these seen promptly.</p></div>
        <div class="card card--tint"><h3 class="h4">An itchy, flaking or sore scalp</h3><p class="body-s mt-2">Inflammation drives shedding and is treatable in its own right.</p></div>
        <div class="card card--tint"><h3 class="h4">Shedding after an illness or childbirth</h3><p class="body-s mt-2">Often self-limiting, but worth confirming rather than assuming.</p></div>
      </div>
    </div>
  </div>
</section>

<section class="section section--ink" id="journey">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Step by step</p>
      <h2 class="h2 mt-2">How Your Hair Fall Is Assessed</h2>
      <p class="body-l mt-3">In this order. Nothing long-term is started before the investigations come back.</p>
    </div>
    <div class="journey mt-6" style="grid-template-columns:repeat(auto-fit,minmax(180px,1fr))">
      <div class="card card--ink"><span class="journey__num">01</span><p class="h4 mt-1" style="color:#fff">History</p><p class="meta mt-2">When it started, how it changed, family history, medication, recent illness.</p></div>
      <div class="card card--ink"><span class="journey__num">02</span><p class="h4 mt-1" style="color:#fff">Scalp examination</p><p class="meta mt-2">Pattern staged and miniaturisation assessed under magnification.</p></div>
      <div class="card card--ink"><span class="journey__num">03</span><p class="h4 mt-1" style="color:#fff">Investigations</p><p class="meta mt-2">Thyroid, ferritin, vitamin D, blood count where indicated.</p></div>
      <div class="card card--ink"><span class="journey__num">04</span><p class="h4 mt-1" style="color:#fff">Baseline photographs</p><p class="meta mt-2">Fixed angle and lighting, so progress is measurable rather than remembered.</p></div>
      <div class="card card--ink"><span class="journey__num">05</span><p class="h4 mt-1" style="color:#fff">Diagnosis and plan</p><p class="meta mt-2">What you have, what will help, and what it will cost — in writing.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="treatments">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Treatment ladder</p>
      <h2 class="h2 mt-2">Treatment Options, Least Invasive First</h2>
      <p class="body mt-3">A plan usually combines more than one of these. What it should never do is start at the bottom of this list because that is where the margin is.</p>
    </div>

    <div class="stack mt-6">
      <div class="card card--pad-lg">
        <div class="split split--top" style="gap:24px;align-items:start">
          <div>
            <span class="pill">Step 1</span>
            <h3 class="h3 mt-2">Correct what is correctable</h3>
          </div>
          <p class="body-s">Thyroid dysfunction, iron and vitamin D deficiency, a scalp condition, a medication effect, or a trigger causing telogen effluvium. A meaningful proportion of hair fall improves here alone — which is why this step is not optional, and why any clinic that skips it should worry you.</p>
        </div>
      </div>
      <div class="card card--pad-lg">
        <div class="split split--top" style="gap:24px;align-items:start">
          <div>
            <span class="pill">Step 2</span>
            <h3 class="h3 mt-2">Medical therapy</h3>
          </div>
          <p class="body-s">Prescribed topical or oral treatment for pattern hair loss, taken daily. It has the best-established evidence of anything available and it is the backbone of holding density long-term. It is also the step patients most often want to skip, and the one that most reliably decides how much hair they still have in ten years.</p>
        </div>
      </div>
      <div class="card card--pad-lg">
        <div class="split split--top" style="gap:24px;align-items:start">
          <div>
            <span class="pill">Step 3</span>
            <h3 class="h3 mt-2">In-clinic therapy</h3>
          </div>
          <p class="body-s"><a href="/hair-prp-treatment-in-gurgaon">PRP</a> or <a href="/hair-prp-treatment-in-gurgaon">GFC</a> to support follicles that are thinning but still present, generally alongside medical therapy rather than instead of it. Useful in the right case; useless where the follicles have already gone.</p>
        </div>
      </div>
      <div class="card card--pad-lg">
        <div class="split split--top" style="gap:24px;align-items:start">
          <div>
            <span class="pill pill--ink">Step 4</span>
            <h3 class="h3 mt-2">Surgery</h3>
          </div>
          <p class="body-s">A <a href="/hair-transplant-in-gurgaon">hair transplant</a>, once the pattern has stabilised and where follicles in the affected area are already lost. It redistributes hair rather than creating it, so it is planned against a finite donor supply and it does not remove the need for medical treatment afterwards.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= doctor_block('Why the diagnosis comes first: hair fall from a thyroid problem, an iron deficiency or a recent illness commonly recovers once the cause is corrected. Starting someone on a long-term treatment plan without checking for those is how a reversible problem becomes an expensive one.') ?>

<section class="section section--white" id="areas">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">Where our patients come from</p>
        <h2 class="h2 mt-2">Serving Gurugram and South Delhi</h2>
        <p class="body mt-3">One clinic, one address, one team. Patients travel to us from across Gurugram and neighbouring parts of South Delhi — and because hair-loss treatment is judged over months, keeping every review with the same doctor is what makes the response readable at all.</p>
        <div class="btn-row mt-4">
          <a class="btn btn--outline" href="<?= e(MAPS_URL) ?>" rel="noopener"><?= icon('pin', 17) ?> Directions</a>
          <a class="btn btn--outline" href="/contact">Clinic details</a>
        </div>
      </div>
      <div>
        <div class="card card--pad-lg">
          <p class="body-s">Areas we regularly see patients from:</p>
          <div style="display:flex;flex-wrap:wrap;gap:8px;margin-top:16px">
            <?php foreach ($areas as $area): ?>
              <span class="pill" style="text-transform:none;letter-spacing:0;font-size:13px;font-weight:600"><?= e($area) ?></span>
            <?php endforeach; ?>
          </div>
          <p class="meta mt-4">We deliberately do not run a separate page for each of these. One clinic with one address does not have twelve locations, and pages that differ only by the name of a sector help nobody — least of all a patient trying to work out where to go.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Hair Fall Questions, Answered</h2>
        <p class="body-s mt-3">General patient education. Anything specific to your case is answered at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= before_after_slider_section() ?>

<?= awards_certificates_section() ?>

<?= cta_band(
    'Find Out What Is Actually Causing It',
    'An examination, the investigations that matter, and a straight answer about what will help — including when the answer is that nothing invasive is needed yet.',
    'hair-fall-hub',
    ['Hair fall — cause unknown', 'Women’s hair loss', 'Patchy hair loss', 'Dandruff or scalp condition', 'Hair PRP / GFC', 'Not sure — please advise']
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
