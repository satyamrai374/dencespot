<?php
/**
 * /hair-fall-treatment-in-gurgaon — page #34, hair fall & scalp pillar.
 *
 * The most consequential page in the consolidation: strategy §5.2 makes this
 * the single 301 target for the ~122 `hair-fall-treatment-in-{locality}`
 * doorway pages. It therefore has to earn the traffic those pages were
 * splitting — hence the "areas we serve" block, which absorbs the one honest
 * job those pages were doing.
 *
 * Sep 2026 rework (competitor gap analysis): named diagnostics and blood
 * panel, named medicines (no dosing), a treatment comparison with honest
 * evidence grading, dated market price context (never our price, never in
 * structured data), Gurgaon-specific factors framed to the evidence, and a
 * myth-busting block. The cluster grid is rendered by footer.php, so links to
 * spokes here are contextual, in prose, and not repeated more than needed.
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
    ['title' => 'Male pattern hair loss', 'body' => 'Androgenetic loss following a recognisable pattern — temples, then crown, staged on the <a href="/blog/norwood-scale-explained">Norwood scale</a>. Genetic and progressive, which is why the plan matters more than any single treatment.', 'icon' => 'hairline'],
    ['title' => 'Female pattern hair loss', 'body' => 'Diffuse thinning and a widening parting, with the frontal hairline usually kept. Genetic, sometimes with a hormonal contributor — see <a href="/blog/female-pattern-hair-loss-in-women">female pattern hair loss explained</a>.', 'icon' => 'user'],
    ['title' => 'Telogen effluvium', 'body' => 'Heavy, diffuse shedding two to three months after a trigger — fever, illness, surgery, severe stress or a change in medication. Usually settles once the trigger passes (<a href="https://dermnetnz.org/topics/telogen-effluvium" rel="noopener nofollow" target="_blank">DermNet: telogen effluvium</a>).', 'icon' => 'chart'],
    ['title' => 'Post-partum shedding', 'body' => 'Hair held in the growth phase through pregnancy sheds together two to four months after delivery, usually settling within the first year. Iron and thyroid are still worth checking.', 'icon' => 'heart'],
    ['title' => 'PCOS and hormonal causes', 'body' => 'Raised androgens in polycystic ovary syndrome drive pattern-type thinning, often with irregular periods, acne or facial hair. Menopause and stopping hormonal contraception can also trigger shedding. See <a href="/womens-hair-loss-treatment-in-gurgaon">women’s hair loss treatment</a>.', 'icon' => 'doc'],
    ['title' => 'Thyroid, iron and vitamins', 'body' => 'An under- or over-active thyroid, low iron stores (ferritin), and vitamin D or B12 deficiency all show up as hair loss. All are correctable, and all are missed if nobody tests.', 'icon' => 'search'],
    ['title' => 'Crash dieting and low protein', 'body' => 'Rapid weight loss, very low-calorie diets and too little protein can trigger shedding two to three months later. Correcting intake settles it; supplements alone rarely do.', 'icon' => 'scale'],
    ['title' => 'Alopecia areata', 'body' => 'Well-defined round patches of loss, on the scalp or in the beard. An autoimmune condition that is treated medically — not with surgery while it is active. See <a href="/alopecia-areata-treatment-in-gurgaon">alopecia areata treatment</a>.', 'icon' => 'shield'],
    ['title' => 'Scalp conditions', 'body' => 'Seborrhoeic dermatitis, psoriasis and fungal infection cause shedding and inflammation. The scalp is treated first; hair generally follows. See <a href="/dandruff-treatment-in-gurgaon">dandruff and scalp treatment</a>.', 'icon' => 'settings'],
    ['title' => 'Traction and styling damage', 'body' => 'Tight ponytails, buns, braids and extensions, plus chemical treatment and heat, cause loss along the hairline and parting. Reversible early; permanent once the follicle scars.', 'icon' => 'list'],
    ['title' => 'Trichotillomania', 'body' => 'A compulsive urge to pull out hair, leaving irregular patches of broken hairs. Helped by behavioural support rather than hair products, and discussed without judgement.', 'icon' => 'chat'],
    ['title' => 'Scarring alopecias', 'body' => 'Rare conditions such as lichen planopilaris and frontal fibrosing alopecia replace follicles with scar tissue. That hair does not regrow, so the aim is early recognition to stop progression.', 'icon' => 'info'],
];

/** Blood investigations, chosen from the history — not a fixed panel for everyone. */
$bloodTests = [
    ['test' => 'Complete blood count (CBC)',      'why' => 'Anaemia and other blood changes that affect hair.'],
    ['test' => 'Ferritin and iron studies',       'why' => 'Low iron stores, which can be present without anaemia.'],
    ['test' => 'TSH (thyroid function)',          'why' => 'An under- or over-active thyroid.'],
    ['test' => 'Vitamin D',                       'why' => 'Deficiency, corrected if found.'],
    ['test' => 'Vitamin B12',                     'why' => 'Deficiency, more common with vegetarian diets.'],
    ['test' => 'Hormonal tests (selected women)', 'why' => 'PCOS or raised androgens, when periods, acne or facial hair point to it.'],
];

/**
 * Every evidence cell condenses the position already taken on the therapy's
 * own page (PRP, GFC, mesotherapy, LED). Nothing here ranks higher than those
 * pages do.
 */
$comparison = [
    ['name' => 'Medication', 'what' => 'Prescribed topical or oral medicine — minoxidil, and finasteride in men — used daily at home.', 'course' => 'Daily and ongoing. Response judged at six to twelve months.', 'evidence' => 'Strongest of these: the most studied treatments for pattern hair loss. Not a cure — benefit lasts only while taken, and not everyone responds.', 'for' => 'Pattern hair loss at almost any stage, where suitable after assessment.'],
    ['name' => 'PRP', 'what' => 'Platelet-rich plasma from your own blood, injected into thinning areas.', 'course' => 'An initial series of sessions about a month apart, then maintenance every few months.', 'evidence' => 'Moderate. Supportive overall, but trials are small, results vary because protocols differ between clinics, and some people do not respond.', 'for' => 'Early to moderate thinning with follicles still present, usually alongside medication.'],
    ['name' => 'GFC', 'what' => 'Growth factor concentrate: your own blood processed a step further, with the cells removed.', 'course' => 'A series of sessions spaced some weeks apart, then maintenance.', 'evidence' => 'Smaller and newer. Not established as better than PRP.', 'for' => 'The same cases as PRP — weighed against its usually higher price.'],
    ['name' => 'Mesotherapy', 'what' => 'Injections of a manufactured solution of vitamins, peptides or medicines.', 'course' => 'A longer series of short sessions spaced weeks apart.', 'evidence' => 'Limited, and hard to read: formulations vary, so one study says little about another clinic’s mix.', 'for' => 'An add-on to established treatment, never the primary one.'],
    ['name' => 'LLLT / LED', 'what' => 'Low-level red light, in clinic or from a home cap, comb or helmet.', 'course' => 'Regular sessions sustained over many months.', 'evidence' => 'Limited to modest. Trials report a small effect with consistent use; devices and trial quality vary.', 'for' => 'A non-drug addition for people who can commit to the schedule.'],
];

/**
 * Market context only — what other Gurgaon clinics advertise, as observed in
 * the September 2026 competitor review. Never DenceSpot's price, and never
 * placed in structured data (see market_price_table() and schema.php).
 */
$marketPrices = [
    ['item' => 'Consultation',              'range' => '₹1,000 – ₹1,500',  'note' => 'Ask whether follow-up reviews are included.'],
    ['item' => 'PRP (per session)',         'range' => '₹4,500 – ₹12,000', 'note' => '4–6 sessions commonly advised, then maintenance.'],
    ['item' => 'GFC (per session)',         'range' => '₹8,000 – ₹15,000', 'note' => '3–4 sessions commonly advised.'],
    ['item' => 'Mesotherapy (per session)', 'range' => '₹3,000 – ₹6,000',  'note' => '6–8 sessions commonly advised; ask what is in the formulation.'],
    ['item' => 'Laser comb / LLLT (per session)', 'range' => '₹2,000 – ₹3,500', 'note' => 'Weekly or fortnightly, sustained over months.'],
];

$faqs = [
    ['q' => 'How much hair fall is normal?',
     'a' => 'Losing roughly 50 to 100 hairs a day is generally considered normal, with more on wash days. The trend matters more than the count: shedding heavier than usual for over six to eight weeks, a widening parting, or a scalp becoming visible are the changes worth having examined.'],
    ['q' => 'When should I see a doctor about hair fall?',
     'a' => 'When shedding has been heavier than usual for more than about six to eight weeks, when the pattern is changing, when patches appear, or when the scalp is itchy, flaking or sore. Earlier is better — treatment holds what you still have far more reliably than it recovers what has gone.'],
    ['q' => 'What tests are done for hair fall?',
     'a' => 'A history, a scalp examination under magnification (trichoscopy) and a hair pull test come first. Blood tests follow where indicated — commonly a blood count, ferritin, thyroid function, vitamin D and B12, plus hormonal tests for some women. A scalp biopsy is rarely needed, mainly for suspected scarring alopecia. See <a href="/blog/blood-tests-for-hair-fall">blood tests for hair fall</a>.'],
    ['q' => 'Can hair fall be reversed?',
     'a' => 'It depends entirely on the cause. Shedding from a nutritional deficiency, a thyroid problem or telogen effluvium commonly recovers once the cause is corrected. Pattern hair loss is progressive: treatment slows it and can thicken miniaturising hairs, but follicles that are already gone do not come back without surgery. Background on the condition from <a href="https://dermnetnz.org/topics/male-pattern-hair-loss" rel="noopener nofollow" target="_blank">DermNet</a> and the <a href="https://www.nhs.uk/symptoms/hair-loss/" rel="noopener nofollow" target="_blank">NHS</a>.'],
    ['q' => 'Does stress cause hair fall?',
     'a' => 'Significant physical or emotional stress can trigger telogen effluvium, where a large proportion of follicles shift into the shedding phase at once. The shedding typically appears two to three months after the event and usually settles once the trigger has passed — the pattern <a href="https://dermnetnz.org/topics/telogen-effluvium" rel="noopener nofollow" target="_blank">DermNet describes for telogen effluvium</a>. Persistent stress can also worsen an existing pattern.'],
    ['q' => 'What is the difference between hair fall and hair loss?',
     'a' => 'Hair fall usually describes visible shedding — hair on the pillow, in the shower, on the comb. Hair loss describes the net result: less hair than there was. You can shed heavily and keep your density if regrowth keeps pace, and you can lose density with barely any visible shedding. Both are assessed differently.'],
    ['q' => 'Do hair fall shampoos and supplements work?',
     'a' => 'A medicated shampoo genuinely helps a scalp condition such as dandruff or seborrhoeic dermatitis, and correcting a proven deficiency helps. Supplements taken without a deficiency generally do not, and no shampoo treats androgenetic hair loss — the process happens at the follicle, not on the surface.'],
    ['q' => 'Will PRP stop my hair fall?',
     'a' => 'For the right case it can reduce shedding and support thinning follicles in some people, but the evidence comes mostly from small trials, some people do not respond, it does not stop the underlying process and it does nothing where follicles are already gone. It is used alongside medical therapy rather than instead of it. See <a href="/hair-prp-treatment-in-gurgaon">hair PRP treatment</a>.'],
    ['q' => 'When is a hair transplant the answer instead?',
     'a' => 'When follicles in the affected area are already lost, the pattern has stabilised, and the donor area can supply what the plan needs. Where follicles are still present but shrinking, medical treatment and PRP come first — surgery is not a substitute for them. See <a href="/hair-transplant-in-gurgaon">hair transplant in Gurgaon</a>.'],
    ['q' => 'Do I have to take treatment forever?',
     'a' => 'For pattern hair loss, largely yes — treatment holds ground rather than curing the condition, and stopping generally means resuming the loss from where it had reached. For a reversible cause such as iron deficiency or telogen effluvium, treatment is finite. Which situation you are in is exactly what the assessment establishes.'],
    ['q' => 'Is hair fall treatment different for women?',
     'a' => 'The investigation is broader. Female shedding more often has a treatable contributor — thyroid, iron, post-partum change, polycystic ovary syndrome — so those are checked and corrected before anything long-term is started. See <a href="/womens-hair-loss-treatment-in-gurgaon">women’s hair loss treatment</a>.'],
    ['q' => 'How soon will I see results?',
     'a' => 'Every treatment for hair loss is judged in months rather than weeks. Reduced shedding is usually the first change, commonly within two to three months. Density is judged against baseline photographs from around six months, and the plan is formally reviewed at twelve. Anyone promising faster is describing marketing, not biology.'],
    ['q' => 'Which doctor should I see for hair fall — a dermatologist or a trichologist?',
     'a' => 'A dermatologist — a doctor trained in diseases of the skin, hair and scalp, who can examine the scalp, order and interpret blood tests, prescribe medicine and arrange a biopsy if needed. “Trichologist” is not a specialty recognised by the National Medical Commission, and the title is used by people with very different training, not all of them doctors. Check for a medical qualification.'],
    ['q' => 'What is the cost of hair fall treatment in Gurgaon?',
     'a' => 'It depends on the cause. For a deficiency, a thyroid problem or telogen effluvium it is usually a consultation, blood tests and medication. PRP, GFC and mesotherapy are advertised per session but run as courses, so compare course totals rather than session prices. Advertised Gurgaon ranges are in the <a href="#cost">cost section</a> above; DenceSpot quotes the whole course in writing after assessment.'],
    ['q' => 'Can dandruff cause hair loss?',
     'a' => 'Not usually permanently, but the inflammation of seborrhoeic dermatitis and the scratching that comes with it increase shedding, and flaking makes thinning look worse. A fungal scalp infection is different and can cause patchy loss that needs prompt treatment. Settling the scalp generally settles the shedding. See <a href="/dandruff-treatment-in-gurgaon">dandruff and scalp treatment in Gurgaon</a>.'],
    ['q' => 'Why does hair fall increase in the monsoon?',
     'a' => 'Seasonal changes in shedding are recognised. During the monsoon, humidity and sweat aggravate dandruff and fungal scalp infections, and hair that stays damp tangles and breaks more easily. Monsoon shedding is usually temporary. If it lasts beyond six to eight weeks, or comes with patches or a widening parting, have it examined rather than waiting for the weather to change.'],
    ['q' => 'Does Gurgaon’s hard water cause hair loss?',
     'a' => 'Hard or borewell water can make hair dry, rough and more likely to break, but there is no good evidence that it damages follicles or causes pattern baldness. Breakage and true shedding look different under magnification, so it is worth being examined before blaming the water. More in <a href="/blog/hard-water-pollution-and-hair-fall-in-gurgaon">our hard water and pollution guide</a>.'],
    ['q' => 'Is minoxidil safe to use long-term?',
     'a' => 'Topical minoxidil has been in use for decades and long-term use is generally considered acceptable for most people, but it does not suit everyone and it is not a cure. The commonest problems are scalp irritation, unwanted facial hair and a temporary increase in shedding in the first weeks. Any benefit lasts only while it is used, and it is avoided in pregnancy and breastfeeding. Oral minoxidil is a doctor’s prescribing decision, with monitoring. See <a href="/blog/minoxidil-and-finasteride-in-india">minoxidil and finasteride explained</a>.'],
    ['q' => 'Do onion juice or hair oils stop hair fall?',
     'a' => 'There is no good evidence that they do. Onion juice rests largely on one small, old study in alopecia areata and can irritate the scalp. Oils condition the hair shaft and reduce breakage but do not act on the follicle, and heavy oiling can worsen dandruff. In moderation they are unlikely to harm; the real cost is delaying treatment of the actual cause.'],
    ['q' => 'Is hair loss from PCOS reversible?',
     'a' => 'Often partly. PCOS drives thinning through raised androgens, so treating the condition itself — weight and metabolic management, hormonal treatment, or anti-androgen therapy where appropriate — can reduce shedding and help some density return. Follicles miniaturised for years may not fully recover, so earlier is better. Care is often shared with a gynaecologist or endocrinologist. See <a href="/blog/female-pattern-hair-loss-in-women">female pattern hair loss in women</a>.'],
    ['q' => 'Can teenagers be treated for hair fall?',
     'a' => 'Yes, and it is worth investigating. Teenage hair fall is commonly shedding after illness, exam stress or dieting, low iron, a thyroid problem, a scalp condition or tight hairstyles — mostly treatable. Early pattern hair loss can begin in the late teens. Finasteride is not generally used under 18, hair transplants are not appropriate at this age, and a parent or guardian should attend.'],
    ['q' => 'Can hair fall be treated without medication?',
     'a' => 'Sometimes. Where the cause is reversible — telogen effluvium that settles, a deficiency corrected, a scalp condition treated, traction from hairstyles stopped — long-term hair-loss medicine may not be needed. Pattern hair loss is different: PRP, low-level light and microneedling may help some people, but their evidence is weaker than medication’s, none is a cure, and they are generally used alongside it.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair fall treatment in Gurgaon'],
];

$page = [
    'title'       => 'Hair Fall & Hair Loss Treatment in Gurgaon | DenceSpot',
    'description' => 'Hair fall and hair loss treatment in Gurgaon. The cause comes first: trichoscopy, a pull test and blood tests where indicated. Sector 39, Gurugram.',
    'url'         => '/hair-fall-treatment-in-gurgaon',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-hair-fall-768.webp',
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        [
            '@type' => 'MedicalCondition',
            '@id'   => abs_url('/hair-fall-treatment-in-gurgaon') . '#condition',
            'name'  => 'Hair loss',
            'alternateName' => ['Hair fall', 'Alopecia'],
            // Each one is a visible sign in the #normal section.
            'signOrSymptom' => [
                ['@type' => 'MedicalSignOrSymptom', 'name' => 'Increased hair shedding'],
                ['@type' => 'MedicalSignOrSymptom', 'name' => 'Widening parting'],
                ['@type' => 'MedicalSignOrSymptom', 'name' => 'Receding hairline'],
                ['@type' => 'MedicalSignOrSymptom', 'name' => 'Patchy hair loss'],
            ],
            // Only @ids that exist: each target page emits schema_therapy() or
            // schema_procedure() with this fragment.
            'possibleTreatment' => [
                ['@id' => abs_url('/hair-prp-treatment-in-gurgaon') . '#therapy'],
                ['@id' => abs_url('/gfc-treatment-in-gurgaon') . '#therapy'],
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
        <span class="pill pill--dot">Hair fall &amp; hair loss treatment</span>
        <h1 class="h1 mt-3">Hair Fall and Hair Loss Treatment in Gurgaon, Starting With the Cause</h1>
        <p class="lead mt-3 measure">Hair fall is a symptom, not a diagnosis. Thyroid problems, low iron, PCOS, a scalp condition, a recent illness and genetic pattern loss all present as hair coming out — and they need completely different treatment. At our Sector 39 clinic in Gurugram, the cause is identified before anything is recommended, because treating the wrong cause delays the right treatment.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-treatment="Hair fall treatment" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Scalp examined under magnification',
            'Blood tests where clinically indicated',
            'Medical treatment before injections or surgery',
            'At our clinic in Sector 39, Gurugram',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-hair-fall-768.webp" srcset="/assets/img/services/svc-hair-fall-512.webp 512w, /assets/img/services/svc-hair-fall-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a wooden comb resting on folded towels" width="768" height="960" loading="eager" fetchpriority="high">
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
    <div class="grid grid--4">
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Diagnosis first</p><p class="meta mt-1">Examination and blood work before a plan.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Least invasive first</p><p class="meta mt-1">Medical treatment before injections or surgery.</p></div>
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Measured, not guessed</p><p class="meta mt-1">Baseline photographs at fixed settings.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Registered doctors</p><p class="meta mt-1">Assessed by a registered medical practitioner.</p></div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-follicle',
    'alt'     => 'a sculpted cross-section of the scalp showing hair follicles',
    'eyebrow' => 'Normal or not',
    'title'   => 'How Much Hair Fall Is Normal?',
    'id'      => 'normal',
    'html'    => '<p>Most people shed somewhere between 50 and 100 hairs a day — the normal hair cycle releasing old hairs as new ones start. You will see more on wash days, more if you wash less often, and more with long hair.</p>'
               . '<p>The number matters less than the trend. Shedding heavier than your normal for more than six to eight weeks, or density visibly falling even without much shedding, is worth an examination.</p>'
               . '<p><b>The hair pull test</b> is done at the assessment: around 50 to 60 hairs are gathered between the fingers and pulled gently, in several areas of the scalp. More than about six coming away from one pull suggests active shedding. It is most reliable if you have not washed for a day beforehand, and it is a pointer, not a diagnosis.</p>'
               . '<p><b>Signs that are not normal:</b></p>',
    'points'  => [
        'Shedding heavier than your normal for more than 6–8 weeks',
        'A widening parting — the earliest reliable sign in women',
        'A receding or thinning hairline',
        'Distinct round patches on the scalp or in the beard — get these seen promptly',
        'An itchy, flaking or sore scalp, which is treatable in its own right',
        'Shedding after an illness or childbirth — often self-limiting, but worth confirming',
    ],
]) ?>

<section class="section section--canvas" id="causes">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Why hair falls</p>
      <h2 class="h2 mt-2">The Common Causes of Hair Fall and Hair Loss</h2>
      <p class="body mt-3">The common causes of hair fall and hair loss are androgenetic alopecia (pattern loss), telogen effluvium after illness, childbirth, crash dieting or stress, thyroid disorder, low ferritin, PCOS, alopecia areata, and scalp conditions such as seborrhoeic dermatitis. Several often run at once, which is exactly why the examination comes before the prescription.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <?php foreach ($causes as $c): ?>
      <div class="card">
        <?= icon($c['icon'], 22, 'var(--accent-deep)') ?>
        <h3 class="h4 mt-2"><?= e($c['title']) ?></h3>
        <?php /* Raw, not e(): $causes is static copy in this file and several bodies
                 carry links. Escaping printed the DermNet anchor as visible markup. */ ?>
        <p class="body-s mt-2"><?= $c['body'] ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'Step by step',
    'title'   => 'How Your Hair Loss Is Diagnosed',
    'id'      => 'diagnosis',
    'intro'   => 'In this order, and nothing long-term starts before it is done.',
    'tone'    => 'white',
    'steps'   => [
        ['img' => 'step-followup',     'alt' => 'a desk calendar with dates circled',              'title' => 'History',                         'text' => 'Onset, shedding or thinning, family history, periods and pregnancy where relevant, diet and weight change, recent illness or stress, and every medicine and supplement you take.'],
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',             'title' => 'Trichoscopy and a pull test',     'text' => 'Magnification shows miniaturisation, the exclamation-mark hairs of alopecia areata, inflammation around follicles and lost follicle openings that point to scarring. A gentle pull test shows whether shedding is active now, and where.'],
        ['img' => 'step-procedure',    'alt' => 'sterile instruments laid out on a tray',           'title' => 'Blood tests, where indicated',    'text' => 'Chosen from your history rather than run as a fixed panel for everyone. A scalp biopsy is considered only when a scarring alopecia is suspected or the diagnosis stays unclear; most patients never need one.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram beside a notepad', 'title' => 'Baseline photographs and a plan', 'text' => 'Fixed angle and lighting, so progress is measured, not remembered — then the diagnosis, the plan and its cost, in writing.'],
    ],
]) ?>

<section class="section section--canvas" id="blood-tests">
  <div class="wrap">
    <div class="split split--sidebar" style="align-items:start">
      <div>
        <p class="eyebrow">Investigations</p>
        <h2 class="h2 mt-2">Blood Tests, Chosen From Your History</h2>
        <p class="body mt-3">Not a fixed panel for everyone. For more depth, read <a href="/blog/blood-tests-for-hair-fall">which blood tests matter for hair fall</a> and <a href="/blog/telogen-effluvium-vs-pattern-hair-loss">how telogen effluvium differs from pattern hair loss</a>.</p>
        <div class="note mt-4">
          <p class="h4">Taking biotin?</p>
          <p class="body-s mt-2">Tell the doctor before any blood test. Biotin supplements can distort some laboratory results, including thyroid tests, and may need pausing beforehand.</p>
        </div>
      </div>
      <div class="card" style="padding:0;overflow:hidden">
        <div class="table-scroll">
          <table class="data" style="min-width:0">
            <caption class="sr-only">Blood tests commonly considered in hair fall and what each one looks for</caption>
            <thead>
              <tr><th scope="col">Blood test</th><th scope="col">What it looks for</th></tr>
            </thead>
            <tbody>
              <?php foreach ($bloodTests as $t): ?>
              <tr>
                <th scope="row" style="color:var(--ink);font-size:15px;font-weight:700;text-transform:none;letter-spacing:0;white-space:normal"><?= e($t['test']) ?></th>
                <td><?= e($t['why']) ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-hairline',
    'alt'     => 'a mannequin head seen from above with receding temples',
    'eyebrow' => 'Treatment ladder',
    'title'   => 'Hair Loss Treatment Options, Least Invasive First',
    'id'      => 'treatments',
    'html'    => '<p>A plan usually combines more than one option, and should not start with the most invasive. Which medicine, at what strength and in what combination, is decided at the consultation — never from a web page.</p>'
               . '<p><b>Step 1 — correct what is correctable.</b> Thyroid dysfunction, iron, vitamin D or B12 deficiency, low protein intake, PCOS, a scalp condition, a medication effect, or a trigger causing telogen effluvium. A meaningful proportion of hair fall improves here alone, which is why this step is not optional. Ask any clinic what it has checked before treatment starts.</p>'
               . '<p><b>Step 2 — medical therapy.</b> The most studied option for pattern hair loss. It slows loss rather than curing it, works only while it is used, and not everyone responds. Side effects are discussed first — see <a href="/blog/minoxidil-and-finasteride-in-india">minoxidil and finasteride in India</a>.</p>',
    'points'  => [
        'Topical minoxidil: the usual starting point for men and women',
        'Oral minoxidil: prescribed for some patients by a doctor, with monitoring',
        'Finasteride: for men — not for women who are or could become pregnant',
        'Anti-androgen therapy: for selected women, particularly with PCOS or raised androgens, under medical supervision',
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-prp',
    'alt'     => 'a vial of golden plasma and a syringe on a tray',
    'eyebrow' => 'Steps 3 and 4',
    'title'   => 'In-Clinic Therapy, Then Surgery Where Follicles Are Lost',
    'reverse' => true,
    'tone'    => 'canvas',
    'html'    => '<p><b>Step 3 — in-clinic therapy.</b> For follicles that are thinning but still present, generally alongside medical therapy rather than instead of it: <a href="/hair-prp-treatment-in-gurgaon">PRP</a> from your own blood, <a href="/gfc-treatment-in-gurgaon">GFC</a>, <a href="/hair-mesotherapy-in-gurgaon">mesotherapy</a>, <a href="/hair-microneedling-in-gurgaon">scalp microneedling</a> to support topical treatment, and <a href="/hair-led-therapy-in-gurgaon">LED and low-level laser therapy</a>.</p>'
               . '<p><b>Step 4 — surgery.</b> A <a href="/hair-transplant-in-gurgaon">hair transplant</a>, once the pattern has stabilised and where follicles in the affected area are already lost. It redistributes hair rather than creating it, so it is planned against a finite donor supply.</p>',
    'points'  => [
        'In-clinic evidence is weaker than medication’s, and varies by treatment',
        'None is a cure, and none helps where the follicles have already gone',
        'A transplant does not remove the need for medical treatment afterwards',
    ],
]) ?>

<section class="section section--white" id="compare">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Straight comparison</p>
      <h2 class="h2 mt-2">Medication, PRP, GFC, Mesotherapy and LLLT Compared</h2>
      <p class="body mt-3">Sold interchangeably, but not interchangeable — so read the evidence column first.</p>
    </div>

    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data" style="min-width:900px">
          <caption class="sr-only">Hair loss treatments compared: medication, PRP, GFC, mesotherapy and low-level light therapy, by what each is, typical course, strength of evidence and who it suits</caption>
          <thead>
            <tr><th scope="col">Treatment</th><th scope="col">What it is</th><th scope="col">Typical course</th><th scope="col">Evidence strength</th><th scope="col">Typically considered for</th></tr>
          </thead>
          <tbody>
            <?php foreach ($comparison as $row): ?>
            <tr>
              <th scope="row" style="color:var(--ink);font-size:15px;font-weight:700;text-transform:none;letter-spacing:0"><?= e($row['name']) ?></th>
              <td><?= e($row['what']) ?></td>
              <td><?= e($row['course']) ?></td>
              <td><?= e($row['evidence']) ?></td>
              <td><?= e($row['for']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="grid grid--2 mt-4">
      <div class="note"><p class="h4">Where is microneedling?</p><p class="body-s mt-2">Its better evidence is as an aid to topical treatment, so it sits alongside medication rather than in a row of its own.</p></div>
      <div class="note"><p class="h4">No injection replaces the basics</p><p class="body-s mt-2">Every in-clinic option is supportive, none switches off pattern hair loss, and each needs maintenance.</p></div>
    </div>
  </div>
</section>

<?= doctor_block('Consultations and procedures are carried out by registered medical practitioners at the clinic.') ?>

<section class="section section--ink" id="timeline">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Timeline</p>
      <h2 class="h2 mt-2">What to Expect, Month by Month</h2>
      <p class="body-l mt-3">General guidance for medical treatment of shedding and pattern loss. Your own plan is reviewed against your baseline photographs, not against this schedule.</p>
    </div>
    <div class="journey mt-6" style="grid-template-columns:repeat(auto-fit,minmax(200px,1fr))">
      <div class="card card--ink"><span class="journey__num">0–8 wks</span><p class="h4 mt-1">Cause treated, plan started</p><p class="meta mt-2">Results back, anything reversible corrected. A temporary rise in shedding in the first weeks of minoxidil is common and not a sign of failure.</p></div>
      <div class="card card--ink"><span class="journey__num">2–3 mo</span><p class="h4 mt-1">Shedding settles first</p><p class="meta mt-2">Reduced shedding is usually the first change. Density cannot be judged yet.</p></div>
      <div class="card card--ink"><span class="journey__num">6 mo</span><p class="h4 mt-1">Density judged</p><p class="meta mt-2">The first fair point to compare against baseline photographs and decide whether the plan is working.</p></div>
      <div class="card card--ink"><span class="journey__num">12 mo</span><p class="h4 mt-1">Full review</p><p class="meta mt-2">The plan is continued, adjusted or stepped up, and maintenance agreed. Reversible causes are often finished well before this.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div style="max-width:68ch">
      <p class="eyebrow">Cost guidance</p>
      <h2 class="h2 mt-2">Hair Fall Treatment Cost in Gurgaon</h2>
      <p class="body mt-3">The total depends on the diagnosis far more than on the clinic. Where a deficiency, a thyroid problem or telogen effluvium is behind the hair fall, the cost is usually a consultation, the blood tests actually needed and medication.</p>
      <p class="body mt-3">In-clinic treatments are advertised per session but run as courses with maintenance, so compare totals: the session price multiplied by the sessions advised, plus consultation, blood tests and the medication that runs alongside. DenceSpot quotes the whole course in writing after the assessment, and our <a href="/prp-hair-treatment-cost-in-gurgaon">PRP hair treatment cost guide</a> explains what moves the number.</p>
    </div>

    <?= market_price_table('Advertised hair fall treatment prices in Gurgaon, September 2026', $marketPrices, 'September 2026') ?>

    <div class="btn-row mt-5">
      <a class="btn btn--ink" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask about your own plan</a>
      <a class="btn btn--outline" href="/cost-and-emi-options"><?= icon('rupee', 18) ?> Payment and EMI options</a>
    </div>
  </div>
</section>

<section class="section section--canvas" id="gurgaon-factors">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Local factors</p>
      <h2 class="h2 mt-2">Gurgaon-Specific Factors: Hard Water, Pollution and Monsoon Shedding</h2>
      <p class="body mt-3">Patients in Gurugram often ask whether the city itself is causing their hair fall. Local conditions can damage hair and aggravate the scalp, but they do not cause pattern baldness. More detail in <a href="/blog/hard-water-pollution-and-hair-fall-in-gurgaon">hard water, pollution and hair fall in Gurgaon</a>.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="card"><?= icon('settings', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-2">Hard and borewell water</h3><p class="body-s mt-2">Mineral-rich water leaves deposits on the shaft, so hair feels dry and rough and breaks more easily. That is shaft damage, not follicle loss — a broken hair has no root — and hard water does not cause pattern baldness. Conditioner or a shower filter may improve how hair feels; neither treats hair loss.</p></div>
      <div class="card"><?= icon('info', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-2">Air pollution</h3><p class="body-s mt-2">Laboratory studies suggest particulate pollution can stress scalp cells, but evidence that city air causes hair loss in people is limited. Regular washing is sensible; paying for “anti-pollution” hair treatments is not.</p></div>
      <div class="card"><?= icon('calendar', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-2">Monsoon and seasonal shedding</h3><p class="body-s mt-2">Seasonal variation in shedding is recognised, and many people notice more hair fall during and after the monsoon. It is usually temporary; shedding beyond six to eight weeks, or with patches or thinning, deserves an examination.</p></div>
      <div class="card"><?= icon('heart', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-2">Heat, humidity and sweat</h3><p class="body-s mt-2">Heat and sweat aggravate seborrhoeic dermatitis and fungal scalp infections, both of which increase shedding. Washing after heavy sweating and treating the condition help more than switching products.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="home-remedies">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">What works, what does not</p>
      <h2 class="h2 mt-2">Shampoos, Oils, Supplements and Home Remedies</h2>
      <p class="body mt-3">Most products sold for hair fall act on the hair shaft, not the follicle where hair loss happens. Few are harmful; the real cost is months lost while the cause goes untreated.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card"><h3 class="h4">“Anti-hair fall” shampoos</h3><p class="body-s mt-2">A shampoo sits on the scalp for a minute and is rinsed away. It can make hair less prone to breakage, but no shampoo treats pattern hair loss.</p></div>
      <div class="card"><h3 class="h4">Medicated shampoos</h3><p class="body-s mt-2">These do help, for the right problem. Where there is dandruff, seborrhoeic dermatitis or a fungal infection, an antifungal shampoo such as ketoconazole can settle the scalp, and the shedding often follows.</p></div>
      <div class="card"><h3 class="h4">Hair oils</h3><p class="body-s mt-2">Oils condition the shaft and reduce breakage but do not change the follicle. Rosemary oil has only small studies behind it, and heavy oiling can worsen dandruff.</p></div>
      <div class="card"><h3 class="h4">Onion juice and kitchen remedies</h3><p class="body-s mt-2">Onion juice rests largely on one small, old study in alopecia areata, with no good evidence for shedding or pattern loss, and it can irritate the scalp.</p></div>
      <div class="card"><h3 class="h4">Biotin</h3><p class="body-s mt-2">Helps hair only in genuine deficiency, which is uncommon. It can also distort some blood tests, including thyroid tests — mention it before any investigation.</p></div>
      <div class="card"><h3 class="h4">Iron, vitamin D and multivitamins</h3><p class="body-s mt-2">Worth taking when a test shows you are low. Taken blind they rarely help, and too much vitamin A or selenium can itself cause hair loss.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="areas">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">Service area</p>
        <h2 class="h2 mt-2">Serving Gurugram and South Delhi</h2>
        <p class="body mt-3">The Gurugram clinic is on Sector 39 Road, <?= e(NAP_LANDMARK) ?>. Because hair-loss treatment is judged over months, each review compares your photographs against the same baseline.</p>
        <div class="btn-row mt-4">
          <a class="btn btn--outline" href="<?= e(MAPS_URL) ?>" rel="noopener"><?= icon('pin', 17) ?> Gurugram directions</a>
        </div>
      </div>
      <div>
        <div class="card card--pad-lg">
          <p class="body-s">Nearby areas served from the Sector 39 clinic:</p>
          <div style="display:flex;flex-wrap:wrap;gap:8px;margin-top:16px">
            <?php foreach ($areas as $area): ?>
              <span class="pill" style="text-transform:none;letter-spacing:0;font-size:13px;font-weight:600"><?= e($area) ?></span>
            <?php endforeach; ?>
          </div>
          <p class="meta mt-4">We deliberately do not run a separate page for each of these. There is no branch in each of these areas, and pages that differ only by the name of a sector help nobody — least of all a patient trying to work out where to go.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Hair Fall and Hair Loss Questions, Answered</h2>
        <p class="body-s mt-3">General patient education. Anything specific to your case is answered at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= before_after_slider_section() ?>

<?= awards_certificates_section() ?>

<?= lp_cta([
    'eyebrow'   => 'Sector 39, Gurugram',
    'title'     => 'Find Out What Is Actually Causing It',
    'text'      => 'An examination, the investigations that matter, and a straight answer about what will help — including when the answer is that nothing invasive is needed yet.',
    'treatment' => 'Hair fall treatment',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
