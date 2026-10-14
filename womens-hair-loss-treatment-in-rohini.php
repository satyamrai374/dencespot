<?php
/**
 * /womens-hair-loss-treatment-in-rohini — assessment and treatment of hair
 * loss in women at the Rohini (Delhi) clinic.
 *
 * October 2026 (batch 2). Every service is carried out at the Rohini clinic
 * (agency, 13 Oct 2026). Client rule (14 Oct 2026): Rohini pages do not name
 * the other location or link to its pages, so depth comes from other Rohini
 * pages and neutral blog posts instead.
 *
 * Goes deeper than /hair-fall-treatment-in-rohini, which only summarises
 * hair loss in women: the patterns (Ludwig grades), the hormonal, thyroid,
 * iron and postpartum causes, the workup, medication with its side effects
 * and pregnancy cautions, and where PRP or a transplant fits.
 *
 * Landing-page layout: lp_highlights / lp_split / lp_steps / lp_cta
 * (includes/home-components.php); every image is a labelled AI illustration
 * and each is used once.
 *
 * Not yet reviewed by the clinic's doctor: no medical_review_line(), no
 * "reviewed by" badge, doctor_block(..., false), not in MEDICAL_PAGES.
 * No prices, no doses, no Rohini doctor named.
 *
 * SEO round 3 (14 Oct 2026): title per the competitor research; the cause
 * cards became a "cause → how it shows → what is checked" table (same facts
 * and links); a Delhi seasons row; a cost-factors section with "questions
 * worth asking any clinic" (cost moved out of the progress split); links to
 * the self-assessment, the PRP cost page and the hair fall blog posts;
 * 15 FAQs.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => "Is women's hair loss treatment carried out at the Rohini clinic itself?",
     'a' => 'Yes. The assessment, the review of any blood tests, treatment, in-clinic sessions such as PRP if your plan includes them, and follow-up visits all take place at the Rohini clinic in North-West Delhi.'],
    ['q' => 'Which parts of Delhi is the Rohini clinic convenient for?',
     'a' => 'It sits near the Outer Ring Road, so it is closest for North and North-West Delhi, including Rohini, Pitampura, Shalimar Bagh and Prashant Vihar. The clinic card further down links to its location on Google Maps.'],
    ['q' => 'What should I bring to the first appointment?',
     'a' => 'A list of every medicine and supplement you take, including the contraceptive pill or any hormone therapy, blood reports from the last few months, older photographs of your hair, and a short timeline: when the shedding or thinning began, and whether a delivery, illness, operation, crash diet or stressful spell came in the months before it.'],
    ['q' => 'Which blood tests will I need?',
     'a' => 'Only those your history and examination point to; there is no fixed panel. A blood count, ferritin (iron stores) and thyroid function are the commonest, with vitamin D and B12 for some women, and hormone tests where irregular periods, acne or extra facial hair suggest raised androgens. See <a href="/blog/blood-tests-for-hair-fall">which blood tests matter for hair fall</a>.'],
    ['q' => 'Am I shedding or thinning, and does the difference matter?',
     'a' => 'It matters, because the causes differ. Shedding is more hair than usual coming out, on the pillow, in the shower or in the brush, often for a defined spell. Thinning is the remaining hair becoming finer and sparser, so the parting widens or the ponytail shrinks. Many women have some of both, and telling them apart is one of the first things the examination does.'],
    ['q' => 'Can I have treatment while pregnant, breastfeeding or trying to conceive?',
     'a' => 'Some, but several options are unsuitable. Anti-androgen tablets and finasteride must not be used if pregnancy is possible, and minoxidil is generally avoided during pregnancy and breastfeeding. Correcting low iron or a thyroid problem is often still possible, in step with your obstetrician.'],
    ['q' => 'Will my hair grow back after having a baby?',
     'a' => 'Usually. Shedding tends to start a few months after the birth and settles over the months that follow. If it carries on well beyond six to nine months, or your parting stays wider, have your scalp examined: low iron or pattern thinning may be involved.'],
    ['q' => 'Is my hair loss caused by PCOS?',
     'a' => 'Possibly, if the thinning comes with irregular periods, acne or extra facial hair. Many women with pattern thinning have normal hormone results, though. History, examination and targeted blood tests answer the question, and PCOS is then treated as a condition in its own right.'],
    ['q' => 'Should I start a hair supplement?',
     'a' => 'Only for a deficiency a blood test has found; without one they seldom help, and some are harmful in excess. Biotin can distort some blood results, thyroid tests among them, so mention it before blood is drawn.'],
    ['q' => 'How soon will I see a difference?',
     'a' => 'Hair changes over months. Once a cause such as low iron is corrected, or a medicine is started, less shedding is usually the first sign, commonly within two to three months. Thickness is compared with your baseline photographs from about six months, and the plan is fully reviewed at twelve. Minoxidil can briefly increase shedding when it is first started.'],
    ['q' => 'Will I need treatment for the rest of my life?',
     'a' => 'Not if the cause is reversible: once low iron, a thyroid problem or a passing trigger has been dealt with, treatment has an end point. Female pattern hair loss is different. Treatment slows it rather than curing it and helps only while it continues, so stopping generally means the thinning resumes. The assessment tells you which situation applies.'],
    ['q' => 'Would a hair transplant help me?',
     'a' => 'Most women who ask do not need one. Female thinning is often spread across the scalp and can reach the donor area at the back, which surgery depends on. It can suit permanent traction loss, a high hairline or a stable, defined area once scarring conditions have been ruled out. See <a href="/hair-transplant-for-women-in-rohini">hair transplant for women in Rohini</a>.'],
    ['q' => 'Does Delhi’s water or pollution cause hair loss?',
     'a' => 'Hard water mainly leaves hair dry and rough, so it snaps more easily; that can look like hair fall but is breakage. Smog, dust and sweat make the scalp dirtier and can aggravate dandruff, but the evidence linking air pollution to hair loss is limited. If your parting is widening, the cause is worth finding before blaming the tap or the air.'],
    ['q' => 'What does treatment cost, and is EMI available?',
     'a' => 'Prices are not published; your plan and its cost come in writing after the assessment. Most plans are a consultation, the tests your history calls for and medication. For in-clinic courses such as PRP, instalment options through third-party lenders may be available; ask at the consultation, and see <a href="/cost-and-emi-options">cost and EMI options</a>.'],
    ['q' => 'Can I send photos on WhatsApp or try a self-check first?',
     'a' => 'Yes. Clear daylight photographs of your parting from above and of your hairline help the Rohini clinic answer a first question, and the <a href="/hair-loss-assessment">six-question hair loss self-assessment</a> can suggest a next step. Neither replaces a scalp examination. The clinic is open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . ').'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => "Women's hair loss treatment in Rohini"],
];

$page = [
    'title'       => "Women's Hair Loss Treatment in Rohini, Delhi: Causes & Tests",
    'description' => "Women's hair loss treatment in Rohini, North-West Delhi: iron, thyroid, PCOS and postpartum causes checked first, then a written plan with pregnancy in mind.",
    'url'         => '/womens-hair-loss-treatment-in-rohini',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_delhi_clinic(),
        schema_therapy('/womens-hair-loss-treatment-in-rohini', [
            'name'          => "Women's Hair Loss Treatment",
            'alternateName' => ['Female hair loss treatment', 'Female pattern hair loss management', "Women's hair loss treatment in Rohini, Delhi"],
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'Assessment by a history covering onset, menstrual pattern, pregnancy and breastfeeding, contraception or hormone therapy, diet, weight change, illness, medication, supplements, styling practices and family history; examination of the parting, hairline, eyebrows and donor density; trichoscopy; and blood tests chosen from the history, such as a blood count, ferritin, thyroid function, vitamin D and B12, with hormonal tests where androgen excess is suspected. A scalp biopsy is reserved for suspected scarring alopecia. Treatment follows the diagnosis: correction of deficiency, management of thyroid or hormonal conditions, observation for postpartum shedding and telogen effluvium, prescribed medical therapy for female pattern hair loss with attention to pregnancy and breastfeeding, reduction of traction, and in selected cases PRP or hair restoration surgery.',
            'preparation'   => 'Timeline of the hair loss and the months before it, menstrual and pregnancy history, current and planned pregnancy, a list of all medicines and supplements including biotin, recent blood reports and baseline photography.',
            'followup'      => 'Review of blood results, then comparison with baseline photographs at around six months and a fuller review at twelve months, with the plan continued, adjusted or stopped.',
            'expectedPrognosis' => 'Depends on the cause. Shedding from iron deficiency, thyroid disease, childbirth or another passing trigger commonly recovers once the cause is treated or has passed. Female pattern hair loss is progressive and is managed rather than cured; medical treatment helps only while it continues and not every woman responds. Outcomes vary between patients.',
            'location'      => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
        ]),
        schema_breadcrumbs($crumbs),
        schema_faq('/womens-hair-loss-treatment-in-rohini', $faqs),
    ],
    'preload_image' => '/assets/img/services/svc-women-768.webp',
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Rohini, Delhi</span>
        <h1 class="h1 mt-3">Women's Hair Loss Treatment in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">A widening parting, a thinner ponytail or handfuls of hair after a baby can each have a different cause, and in women two or three often overlap. At our Rohini clinic in North-West Delhi, a doctor checks for reversible causes such as low iron, thyroid disease or hormones, and confirms whether pattern thinning is involved, before anything is prescribed.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Hair fall treatment" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp the Rohini Clinic</a>
        </div>

        <?= ticks([
            'History covering periods, pregnancy and contraception',
            'Blood tests chosen from your history, not a fixed panel',
            'Pregnancy plans discussed before any medicine',
            'Assessment, treatment and reviews in Rohini',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-women-768.webp" srcset="/assets/img/services/svc-women-512.webp 512w, /assets/img/services/svc-women-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a cream mannequin head seen from above, covered in green felt hair with a widening central parting" width="768" height="960" loading="eager" fetchpriority="high">
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
    'eyebrow' => 'What you may be noticing',
    'title'   => 'Shedding, a Wider Parting or a Thinning Edge',
    'intro'   => 'How the hair is going is the first clue to why. Most women notice one of three patterns; some have two at once.',
    'tone'    => 'white',
    'items'   => [
        ['icon' => 'layers',   'title' => 'More hair coming out',            'text' => 'Hair on the pillow and in the brush, from all over the scalp, often a few months after a delivery, an illness, an operation or a crash diet.'],
        ['icon' => 'eye',      'title' => 'A wider parting',                 'text' => 'Little extra shedding, but finer regrowth. The centre parting widens towards the front and the ponytail feels smaller.'],
        ['icon' => 'follicle', 'title' => 'Loss at the hairline or temples', 'text' => 'Usually tension from hairstyles, less often a scarring condition. Smooth, round bald patches point to something else again.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-follicle',
    'alt'     => 'a sculpted cross-section of scalp skin with hair follicles',
    'eyebrow' => 'Female pattern hair loss',
    'title'   => 'The Widening Parting and the Ludwig Scale',
    'id'      => 'pattern',
    'tone'    => 'canvas',
    'html'    => '<p>Follicles shrink over successive growth cycles and make finer, shorter hairs, while the front hairline usually stays in place. Genes play a large part, and most women with this pattern have normal hormone levels when tested.</p>'
               . '<p>It is progressive, more common around and after menopause, and rarely causes complete baldness. Doctors often grade it on the Ludwig scale. Read more on <a href="/blog/female-pattern-hair-loss-in-women">female pattern hair loss and the conditions that mimic it</a>. Smooth round patches are a different condition: see <a href="/alopecia-areata-treatment-in-rohini">alopecia areata treatment in Rohini</a>.</p>',
    'points'  => [
        'Grade I: thinning seen mainly along the parting',
        'Grade II: a clearly wider parting and less volume on top',
        'Grade III: thinning across most of the top of the scalp',
    ],
]) ?>

<section class="section section--white" id="causes">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Causes checked first</p>
      <h2 class="h2 mt-2">Causes of Hair Loss in Women, and What Is Checked</h2>
      <p class="body mt-3">Hormones, iron, pregnancy and thyroid problems are common in women, often reversible, and frequently found alongside pattern thinning. Two or three can run together, so blood tests are chosen from your history rather than from a fixed panel.</p>
    </div>
    <div class="card mt-6" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data" style="min-width:760px">
          <caption class="sr-only">Common causes of hair loss in women, how each usually shows, and what is checked at the assessment</caption>
          <thead>
            <tr><th scope="col">Cause</th><th scope="col">How it usually shows</th><th scope="col">What is checked</th></tr>
          </thead>
          <tbody>
            <tr><th scope="row">Female pattern hair loss</th><td>A widening parting and less volume on top while the front hairline stays. Gradual, and more common around and after menopause; see <a href="#pattern">the Ludwig scale</a> above.</td><td>Family history, the parting photographed from above, and trichoscopy for hairs of uneven thickness; blood tests if something else may be adding to it.</td></tr>
            <tr><th scope="row">Telogen effluvium</th><td>Many hairs shed together two to three months after an illness, operation, crash diet or stressful spell, then settle. A longer-running form can pass for pattern loss; see <a href="/blog/telogen-effluvium-vs-pattern-hair-loss">telogen effluvium versus pattern hair loss</a>.</td><td>The months before the shedding began, and a gentle pull test, which shows hairs loosening all over.</td></tr>
            <tr><th scope="row">Shedding after pregnancy</th><td>Common a few months after delivery and usually temporary. It can reveal pattern thinning that was already developing.</td><td>The delivery date and whether you are breastfeeding; ferritin, because low iron often runs alongside it.</td></tr>
            <tr><th scope="row">Low iron</th><td>Diffuse shedding after heavy periods, a pregnancy or a low-iron diet. Easy to correct, and the hair often follows over months.</td><td>Ferritin, which measures iron stores, and a blood count.</td></tr>
            <tr><th scope="row">Thyroid disease</th><td>Diffuse thinning from an underactive or overactive thyroid, usually with changes in energy, weight or periods. Hair frequently improves once the thyroid is treated.</td><td>Thyroid function. Mention biotin before blood is drawn, because it can distort thyroid results.</td></tr>
            <tr><th scope="row">PCOS and other hormonal causes</th><td>Thinning on top with acne, irregular periods or extra facial hair, which suggests raised androgens, most often from PCOS.</td><td>Menstrual history and hormone tests where indicated. It is managed as a condition, sometimes with a gynaecologist or endocrinologist.</td></tr>
            <tr><th scope="row">Traction and styling</th><td>Loss at the temples and hairline from tight buns, braids or extensions. Early traction loss can recover once the pulling stops; years of it can become permanent.</td><td>Your hairstyle history and the pattern along the hairline.</td></tr>
            <tr><th scope="row">Scarring conditions</th><td>Less common but important not to miss. Frontal fibrosing alopecia, for example, gives a receding front hairline, thinning eyebrows, redness or scale around hairs, and itching or tenderness. Follicles are destroyed for good.</td><td>Trichoscopy for missing follicle openings; a scalp biopsy is reserved for suspected scarring.</td></tr>
            <tr><th scope="row">Medicines and supplements</th><td>Shedding after starting a new medicine, or from taking too much vitamin A or selenium.</td><td>Every tablet and supplement you use, reviewed as part of the history.</td></tr>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">Causes that affect anyone are covered under <a href="/hair-fall-treatment-in-rohini">hair fall treatment in Rohini</a>, and a flaking or itchy scalp under <a href="/dandruff-treatment-in-rohini">dandruff treatment in Rohini</a>. Not sure where to start? The <a href="/hair-loss-assessment">six-question hair loss self-assessment</a> suggests a next step, and <a href="/blog/who-should-assess-hair-fall">dermatologist, trichologist or salon</a> explains who can diagnose hair fall and prescribe for it.</p>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'At the Rohini clinic',
    'title'   => 'What Happens at Your First Appointment',
    'id'      => 'first-visit',
    'intro'   => 'The first visit is for reaching a diagnosis. Some women leave with tests to do before treatment is decided.',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk', 'title' => 'History and examination',  'text' => 'Onset, periods, pregnancies, contraception, diet, medicines, styling and family history; then the parting, hairline and brows, with trichoscopy as your baseline.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram',      'title' => 'Tests and a written plan', 'text' => 'Often a blood count, ferritin and thyroid function, with hormone tests if indicated. Then the diagnosis, the plan and the cost in writing.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with review dates circled', 'title' => 'Reviews over months', 'text' => 'Results discussed, then your parting photographed at each visit and compared with the baseline at six and twelve months.'],
    ],
]) ?>

<section class="section section--white" id="treatment">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Treatment</p>
      <h2 class="h2 mt-2">Treatment Options and What Each Involves</h2>
      <p class="body mt-3">The plan follows the diagnosis, and medicines are prescribed individually, so no doses are given here. None cures pattern loss: the benefit lasts only while treatment continues, and some women do not respond.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="card card--pad-lg"><h3 class="h4">Correcting the cause</h3><p class="body-s mt-2">Iron replaced and rechecked, thyroid disease treated, PCOS managed, tension taken off the hairline. Where one of these drove the shedding, this alone can make a clear difference.</p></div>
      <div class="card card--pad-lg"><h3 class="h4">Waiting, with a review date</h3><p class="body-s mt-2">Shedding after pregnancy and most telogen effluvium recover by themselves. The work is ruling out anything else and checking progress, not starting long-term medicine.</p></div>
      <div class="card card--pad-lg"><h3 class="h4">Minoxidil on the scalp</h3><p class="body-s mt-2">The most established first treatment for pattern loss, taking months to work. Possible side effects: scalp irritation, extra facial hair and a brief rise in shedding at the start. Generally avoided in pregnancy and while breastfeeding.</p></div>
      <div class="card card--pad-lg"><h3 class="h4">Prescribed tablets</h3><p class="body-s mt-2">Some women are offered low-dose oral minoxidil or an anti-androgen, off-label and with monitoring. Anti-androgens must not be taken if pregnancy is possible. Finasteride is not a standard treatment for women. See <a href="/blog/minoxidil-and-finasteride-in-india">minoxidil and finasteride side effects</a>.</p></div>
    </div>
    <div class="note mt-4">
      <p class="h4">Planning a pregnancy?</p>
      <p class="body-s mt-2">Say so at the first visit, even if it is a year or two away. It decides which of these treatments are suitable at all.</p>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-prp',
    'alt'     => 'a vial of golden plasma and a syringe on a tray',
    'eyebrow' => 'PRP and surgery',
    'title'   => 'When PRP or a Hair Transplant Might Be Discussed',
    'id'      => 'prp-and-surgery',
    'tone'    => 'canvas',
    'reverse' => true,
    'html'    => '<p>Neither is a first step for women. Both are carried out at the Rohini clinic, after a diagnosis and a period of medical treatment.</p>'
               . '<p><b>PRP or GFC</b> may be suggested for pattern thinning where follicles are still present, alongside medicine rather than instead of it. The evidence is modest, some women do not respond and maintenance is needed. More on <a href="/hair-prp-treatment-in-rohini">hair PRP and GFC at the Rohini clinic</a>.</p>'
               . '<p><b>A transplant</b> suits few women, because female thinning is often diffuse and can reach the donor area. It is more often an option for permanent traction loss, a high hairline or a stable scar, and grafts do not stop surrounding hair thinning. See <a href="/hair-transplant-for-women-in-rohini">hair transplant for women in Rohini</a> for when it can suit, and <a href="/hair-transplant-in-rohini">how a hair transplant is planned</a>. Surgery is usually considered only when:</p>',
    'points'  => [
        'Scarring alopecia has been ruled out',
        'Thinning is stable on medical treatment',
        'The donor area is dense and not thinning',
        'There is a defined area, such as the front of the parting',
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-hair-fall',
    'alt'     => 'a wooden comb with a few loose hairs resting on folded linen towels',
    'eyebrow' => 'Expectations',
    'title'   => 'How Progress Is Judged Over Months',
    'id'      => 'progress',
    'tone'    => 'white',
    'html'    => '<p>Plans are judged at six to twelve months against your baseline photographs. For many women, the thinning no longer getting worse is the main result. Pattern-loss treatment is long term, so a routine you can keep up matters most.</p>'
               . '<p>Review visits take place at the Rohini clinic; see <a href="/delhi-clinic">directions to the Rohini clinic</a>. What decides the cost is set out in <a href="#cost">the cost guidance below</a>.</p>',
    'points'  => [
        'Shedding eases before thickness changes',
        'Holding steady counts as progress',
        'Reversible causes often recover',
        'Pattern loss needs treatment that continues',
    ],
]) ?>

<?= lp_highlights([
    'eyebrow' => 'Living in Delhi',
    'title'   => 'Delhi’s Seasons, Water and Smog: What Matters for Your Hair',
    'intro'   => 'The weather rarely causes hair loss by itself, but it changes how hair and scalp behave. General points only; your own plan comes from the examination.',
    'tone'    => 'canvas',
    'items'   => [
        ['icon' => 'clock',    'title' => 'Summer heat and tight buns', 'text' => 'Tying hair up tightly against the heat pulls at the temples and hairline. Looser styles, and moving where the bun sits, take the tension off.'],
        ['icon' => 'calendar', 'title' => 'Monsoon humidity',           'text' => 'Sweat and damp can aggravate dandruff and fungal scalp infections, and hair tied up wet tangles and breaks more easily.'],
        ['icon' => 'shield',   'title' => 'Hard water',                 'text' => 'Leaves hair dry and rough, so it snaps. Short broken pieces are breakage; a full-length hair with a tiny bulb at the root has been shed.'],
        ['icon' => 'info',     'title' => 'Winter smog and dust',       'text' => 'They make the scalp dirtier and more irritable, but the evidence linking air pollution to hair loss is limited. A widening parting still needs its cause found.'],
    ],
]) ?>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">Women’s Hair Loss Treatment Cost: What Decides It</h2>
        <p class="body mt-3 measure">The cost follows the diagnosis. If low iron, a thyroid problem or a passing trigger is behind the shedding, you mainly pay for the consultation, the tests your history calls for and the medicine that condition needs. Female pattern hair loss costs more over time because treatment continues, and in-clinic courses such as PRP add sessions and maintenance.</p>
        <p class="body mt-3 measure">Prices are not published; your plan and its cost come in writing after the assessment. For in-clinic courses, instalment options through third-party lenders may be available; ask at the consultation. See <a href="/cost-and-emi-options">cost and EMI options</a>, and <a href="/prp-hair-treatment-cost-in-rohini">PRP hair treatment cost in Rohini</a> for what decides the price of a PRP course.</p>
      </div>
      <div class="grid grid--2">
        <div class="card"><p class="h4">Consultation</p><p class="meta mt-1">Where the diagnosis is made and the plan written.</p></div>
        <div class="card"><p class="h4">Blood tests</p><p class="meta mt-1">Only the ones your history points to.</p></div>
        <div class="card"><p class="h4">Medication</p><p class="meta mt-1">Short-term for a reversible cause; ongoing for pattern loss.</p></div>
        <div class="card"><p class="h4">In-clinic courses</p><p class="meta mt-1">PRP or GFC only if they add something, with maintenance.</p></div>
      </div>
    </div>
    <div class="card card--pad-lg mt-6">
      <h3 class="h4">Questions worth asking any clinic about hair loss in women</h3>
      <p class="body-s mt-2">They apply wherever you are seen, including here.</p>
      <div class="mt-3"><?= ticks([
          'Which blood tests are being ordered, and why these ones?',
          'Is this medicine suitable if I am pregnant, breastfeeding or planning a pregnancy?',
          'What is the diagnosis, and can I have it in writing?',
          'What will treatment cost over a year, not just the first month?',
          'When will progress be reviewed, and against which photographs?',
          'Is anything being suggested that the diagnosis does not call for?',
      ]) ?></div>
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
        <h2 class="h2 mt-2">Women's Hair Loss in Rohini: Questions</h2>
        <p class="body-s mt-3">General information only. Your own diagnosis and treatment are decided at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask the Rohini Clinic</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= latest_posts_strip('hair-fall', 3, 'Further Reading') ?>

<?= local_block(
    'Visit Our Rohini Clinic',
    "Assessments, treatment and review visits for women's hair loss take place at our Rohini clinic in North-West Delhi, close to the Outer Ring Road."
) ?>

<?= rohini_services_block($page['url']) ?>

<?= lp_cta([
    'eyebrow'   => 'Rohini, Delhi',
    'title'     => 'Find the Cause Before You Treat It',
    'text'      => 'Book an assessment at the Rohini clinic. A doctor takes your history, examines your scalp, arranges only the tests your case needs and gives you a written plan, including when waiting is the right answer.',
    'treatment' => 'Hair fall treatment',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
