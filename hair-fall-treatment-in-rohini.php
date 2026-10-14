<?php
/**
 * /hair-fall-treatment-in-rohini — hair fall assessment and treatment at the
 * Rohini (Delhi) clinic.
 *
 * October 2026. The agency confirmed (13 Oct 2026) that every service is
 * carried out at the Rohini clinic. Medical facts follow the other-city hair
 * fall, women's hair loss, alopecia areata and dandruff pages; the copy is new
 * so the two cities do not read as doorway duplicates.
 *
 * Client rule (14 Oct 2026): a Rohini page does not mention the other clinic
 * or link to any URL containing its city name; links go to Rohini pages and
 * the blog. Landing-page layout: lp_split / lp_steps / lp_cta
 * (includes/home-components.php).
 *
 * Not yet reviewed by the clinic's doctor: no medical_review_line(), no
 * "reviewed by" badge, doctor_block(..., false), and not in MEDICAL_PAGES.
 * No prices, no doses, no Rohini doctor named.
 *
 * SEO round 2 (14 Oct 2026): title per the competitor research; the cause
 * cards became a "cause → what is checked" table (same facts and links); a
 * "Women's hair fall" section linking the Rohini women's page; a Delhi
 * seasons row; "questions worth asking any clinic" in the cost section; the
 * self-assessment tool linked; 15 FAQs.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'Is hair fall treatment done at the Rohini clinic?',
     'a' => 'Yes. Your assessment, any treatment and your follow-up reviews can all take place at the Rohini clinic in North-West Delhi.'],
    ['q' => 'Which parts of Delhi is the Rohini clinic convenient for?',
     'a' => 'Being close to the Outer Ring Road, it is nearest for North and North-West Delhi: Rohini and neighbouring areas such as Pitampura, Shalimar Bagh and Prashant Vihar. The Directions button on the clinic card below shows the exact spot on Google Maps.'],
    ['q' => 'How much hair fall is normal?',
     'a' => 'Most people lose roughly 50 to 100 hairs a day, more on wash days, and a bad week is not a diagnosis. Shedding above your usual level that lasts more than six to eight weeks, a parting that keeps widening, round bare patches or an itchy, flaking scalp deserve an examination.'],
    ['q' => 'At what point is hair fall worth getting checked?',
     'a' => 'If the extra shedding has gone on for a couple of months, if your parting looks wider or your hairline is moving back, if smooth round patches appear, or if the scalp itches, scales or hurts. Going sooner is sensible: holding on to hair is easier than getting it back.'],
    ['q' => 'What should I bring to the first appointment?',
     'a' => 'A list of every medicine and supplement you take, any recent blood reports, older photographs of your hair, and a note of when the fall started and what happened in the months before. If you take biotin, say so before any blood is drawn, because it can interfere with some lab results, thyroid tests among them.'],
    ['q' => 'Which blood tests will I need?',
     'a' => 'Only those your history and examination point to. Typical requests are a full blood count, ferritin, a thyroid test, vitamin D and vitamin B12, and hormone tests for some women, for instance with irregular periods. Mention any biotin supplement beforehand, because it can throw some results off. More in <a href="/blog/blood-tests-for-hair-fall">blood tests for hair fall</a>.'],
    ['q' => 'Can hair fall be stopped completely?',
     'a' => 'That turns on the cause. Hair lost to low iron, thyroid disease or a passing trigger often grows back once that is corrected. Pattern hair loss is progressive: medication can slow it and thicken miniaturising hairs, but it is not a cure, it works only while it is taken, and follicles that are already gone come back only with surgery.'],
    ['q' => 'How soon will I see a difference?',
     'a' => 'Hair is judged in months rather than weeks. Reduced shedding is usually the first change, commonly within two to three months. Thickness is compared against your baseline photographs from around six months, and the plan is fully reviewed at twelve. Minoxidil can briefly increase shedding when it is started.'],
    ['q' => 'Do I have to take treatment forever?',
     'a' => 'For pattern hair loss, largely yes: treatment holds ground rather than curing the condition, and stopping generally means the loss resumes from where it had reached. For a reversible cause such as low iron or telogen effluvium, treatment has an end point. Which situation you are in is what the assessment establishes.'],
    ['q' => 'Is treatment different for women?',
     'a' => 'More is usually checked, because thyroid problems, low iron, PCOS and shedding after pregnancy are common contributors and are corrected first. Some hair-loss medicines are unsuitable in pregnancy or when trying to conceive. See <a href="/womens-hair-loss-treatment-in-rohini">women’s hair loss treatment in Rohini</a>.'],
    ['q' => 'Do shampoos, oils or supplements stop hair fall?',
     'a' => 'Shampoos and oils work on the hair shaft and the skin surface, not on the follicle, although a medicated shampoo helps a scalp condition such as dandruff. Supplements help when a test has confirmed a deficiency; without one they seldom do, and excess vitamin A or selenium can cause hair loss in its own right.'],
    ['q' => 'Does Delhi’s pollution or water cause hair fall?',
     'a' => 'Dust, sweat and smog make the scalp dirtier and can aggravate dandruff, but the evidence linking air pollution to hair loss in people is limited, and hard water mainly makes hair dry and more likely to break. If your hair is genuinely thinning rather than breaking, the cause is worth finding before blaming the air or the tap.'],
    ['q' => 'Will I need PRP or a hair transplant?',
     'a' => 'Most people with hair fall need neither at first. PRP or GFC may be discussed for thinning where follicles are still present, usually alongside medication, and a transplant only where follicles are already lost and the pattern has settled. Both are available at the Rohini clinic when they are appropriate.'],
    ['q' => 'Is EMI available for longer treatment?',
     'a' => 'Most hair fall plans are a consultation, the tests your history calls for and medication. For in-clinic courses such as PRP, instalment options through third-party lenders may be available; ask at the consultation, and see <a href="/cost-and-emi-options">cost and EMI options</a>.'],
    ['q' => 'Can I send photos on WhatsApp or try a self-check first?',
     'a' => 'Yes. Clear daylight photographs of your parting, hairline or patches help the Rohini clinic answer a first question, and the <a href="/hair-loss-assessment">six-question hair loss self-assessment</a> can point you to a next step. Neither replaces a scalp examination. The clinic is open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . ').'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Hair fall treatment in Rohini'],
];

$page = [
    'title'       => 'Hair Fall Treatment in Rohini, Delhi: Diagnosis First',
    'description' => 'Hair fall treatment at our Rohini clinic, North-West Delhi: the cause is found first by scalp examination and blood tests where indicated, for men and women.',
    'url'         => '/hair-fall-treatment-in-rohini',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_delhi_clinic(),
        schema_therapy('/hair-fall-treatment-in-rohini', [
            'name'          => 'Hair Fall Treatment',
            'alternateName' => ['Hair loss treatment', 'Hair fall treatment in Rohini, Delhi'],
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'Assessment by history, scalp examination under magnification (trichoscopy) and a hair pull test, with blood investigations chosen from the history, such as a blood count, ferritin, thyroid function, vitamin D and B12, and hormonal tests in selected women. Treatment is directed at the diagnosis: correction of reversible causes, treatment of scalp conditions, prescribed medical therapy for pattern hair loss, and in selected cases in-clinic therapy or hair restoration surgery.',
            'preparation'   => 'Full medical, medication and family history including recent illness, pregnancy, diet and weight change; review of supplements, including biotin before blood tests; baseline photography.',
            'followup'      => 'Review against baseline photographs at around six months and a full review at twelve months, with the plan continued, adjusted or stopped accordingly.',
            'expectedPrognosis' => 'Depends on the cause. Hair fall from a deficiency, thyroid disease or telogen effluvium commonly recovers once the cause is treated. Pattern hair loss is progressive and is managed rather than cured; medical treatment works only while it is continued and not everyone responds. Outcomes vary between patients.',
            'location'      => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
            'performer'     => null,
        ]),
        schema_breadcrumbs($crumbs),
        schema_faq('/hair-fall-treatment-in-rohini', $faqs),
    ],
    'preload_image' => '/assets/img/services/svc-hair-fall-768.webp',
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Rohini, Delhi</span>
        <h1 class="h1 mt-3">Hair Fall Treatment in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">Hair coming out faster than usual is a symptom with many possible causes: low iron, a thyroid problem, PCOS, a recent illness, a scalp condition, alopecia areata or inherited pattern loss. Each is treated differently. At our Rohini clinic in North-West Delhi, a doctor works out which one you have before recommending anything, so the treatment follows the cause.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Hair fall treatment" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp the Rohini Clinic</a>
        </div>

        <?= ticks([
            'History and scalp examination under magnification',
            'Blood tests only where your history points to them',
            'Least invasive treatment considered first',
            'Assessment, treatment and reviews in Rohini',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-hair-fall-768.webp" srcset="/assets/img/services/svc-hair-fall-512.webp 512w, /assets/img/services/svc-hair-fall-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a wooden comb with a few loose hairs resting on folded linen towels by a window" width="768" height="960" loading="eager" fetchpriority="high">
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
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Cause first</p><p class="meta mt-1">Examination and tests before a plan.</p></div>
      <div class="card"><?= icon('doc', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Plan in writing</p><p class="meta mt-1">Diagnosis, treatment and cost set out for you.</p></div>
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Baseline photographs</p><p class="meta mt-1">Progress measured, not remembered.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Registered doctors</p><p class="meta mt-1">Assessment by registered medical practitioners.</p></div>
    </div>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'The first appointment',
    'title'   => 'How the Cause of Your Hair Fall Is Found',
    'intro'   => 'Nothing long-term is started until these steps are done.',
    'tone'    => 'white',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                           'title' => 'History',                         'text' => 'When it began, sudden shedding or slow thinning, family history, periods, pregnancy and contraception where relevant, diet and weight change, recent illness or stress, and every tablet and supplement you use.'],
        ['img' => 'stage-female',      'alt' => 'a mannequin head seen from above, with a widening central parting', 'title' => 'Scalp examination and pull test', 'text' => 'Trichoscopy looks under magnification for hairs of uneven thickness, the “exclamation-mark” hairs of alopecia areata, scaling or inflammation, and missing follicle openings that suggest scarring. A gentle tug on small bunches of hair shows whether hairs are loosening now, and where.'],
        ['img' => 'step-procedure',    'alt' => 'sterile instruments laid out on a tray',                        'title' => 'Blood tests, where indicated',    'text' => 'A blood count, ferritin (iron stores), thyroid function, vitamin D and B12 are the usual ones, with hormonal tests for some women. Which you need depends on your history; there is no standard bundle.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned line',           'title' => 'Photographs and a plan',          'text' => 'Baseline images under fixed angles and lighting, then the diagnosis, proposed treatment and cost written down for you. A scalp biopsy is rarely needed, mainly if scarring is suspected.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-followup',
    'alt'     => 'a desk calendar with dates circled, beside a small plant',
    'eyebrow' => 'Before you come',
    'title'   => 'What to Bring to the First Appointment',
    'tone'    => 'canvas',
    'html'    => '<p>A little preparation makes the first appointment more useful. Bring these with you.</p>'
               . '<p><b>Taking biotin?</b> Say so before any blood is drawn, because it can interfere with some lab measurements, thyroid results among them. More in <a href="/blog/blood-tests-for-hair-fall">our guide to blood tests for hair fall</a>.</p>',
    'points'  => [
        'A list of every medicine and supplement',
        'Any recent blood reports',
        'Older photographs of your hair',
        'When the fall started, and what happened in the months before',
    ],
    'link'    => ['url' => '/hair-loss-assessment', 'label' => 'Try the six-question hair loss self-assessment'],
]) ?>

<section class="section section--white" id="causes">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Common causes</p>
      <h2 class="h2 mt-2">Causes and Blood Tests: What Is Checked</h2>
      <p class="body mt-3">Shedding, thinning and patches are different problems. How hair is being lost usually points to the cause, two causes can run together, and blood tests are chosen from your history rather than from a standard bundle.</p>
    </div>
    <div class="card mt-6" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data" style="min-width:760px">
          <caption class="sr-only">Common causes of hair fall, how each usually shows, and what is checked at the assessment</caption>
          <thead>
            <tr><th scope="col">Cause</th><th scope="col">How it usually shows</th><th scope="col">What is checked</th></tr>
          </thead>
          <tbody>
            <tr><th scope="row">Telogen effluvium</th><td>Sudden, all-over shedding two to three months after a fever, illness, surgery, childbirth, a crash diet or a stressful spell. It generally calms down by itself once the trigger is over. See <a href="/blog/telogen-effluvium-vs-pattern-hair-loss">telogen effluvium vs pattern hair loss</a>.</td><td>The months before the shedding began; a pull test, which shows hairs loosening all over; blood tests if the history suggests a deficiency or thyroid problem as well.</td></tr>
            <tr><th scope="row">Iron, thyroid or vitamins</th><td>Diffuse shedding or thinning, often overlapping with another cause. Hair commonly recovers once the problem is corrected.</td><td>Where your history points to them: a full blood count, ferritin (iron stores), thyroid function, vitamin D and B12. Mention biotin before any blood is drawn.</td></tr>
            <tr><th scope="row">PCOS and hormones</th><td>Thinning over the top of the scalp in women, often with irregular periods.</td><td>Menstrual and pregnancy history, and hormone tests in some women.</td></tr>
            <tr><th scope="row">Pattern hair loss</th><td>Gradual, inherited thinning: temples and crown in men, a widening parting in women. It progresses over years and is managed rather than cured.</td><td>Family history and trichoscopy, which shows hairs of uneven thickness; blood tests only if something else may be adding to it.</td></tr>
            <tr><th scope="row">Alopecia areata</th><td>Smooth, round patches that appear quickly on the scalp, beard or eyebrows. The immune system is involved, so it is treated with medicine. More on <a href="/alopecia-areata-treatment-in-rohini">alopecia areata treatment in Rohini</a>.</td><td>The pattern of the patches, and trichoscopy for the “exclamation-mark” hairs typical of it.</td></tr>
            <tr><th scope="row">Scalp conditions</th><td>Flaking, redness or itch from seborrhoeic dermatitis, psoriasis or a fungal infection, which can push up shedding until the skin is calm. More on <a href="/dandruff-treatment-in-rohini">dandruff and other scalp problems</a>.</td><td>Scalp examination under magnification for scaling and inflammation.</td></tr>
            <tr><th scope="row">Traction and styling</th><td>Thinning along the hairline from tight braids, buns or extensions. Hair can recover if the tension stops early; years of it can scar follicles for good.</td><td>Your hairstyle history and the pattern along the hairline.</td></tr>
            <tr><th scope="row">Scarring hair loss</th><td>Areas where the follicle openings are missing, so lost hair may not regrow there.</td><td>Trichoscopy; a scalp biopsy is rarely needed, mainly if scarring is suspected.</td></tr>
            <tr><th scope="row">Medicines and supplements</th><td>Shedding after starting a new medicine, or from taking too much vitamin A or selenium.</td><td>Every tablet and supplement you use, reviewed at the history.</td></tr>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">Which tests matter, and why biotin can throw some results off, is explained in <a href="/blog/blood-tests-for-hair-fall">blood tests for hair fall</a>.</p>
  </div>
</section>

<section class="section section--canvas" id="women">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Women’s hair fall</p>
        <h2 class="h2 mt-2">Women’s Hair Fall: Why More Is Checked</h2>
        <p class="body mt-3 measure">In women, iron deficiency, thyroid disease, PCOS, shedding after pregnancy and female pattern thinning are common and often overlap. Because several of these are treatable, they are checked and corrected before anything long-term is started, and a good share of shedding improves at that stage.</p>
        <p class="body mt-3 measure">The assessment, treatment and reviews take place at the Rohini clinic. Read more on <a href="/womens-hair-loss-treatment-in-rohini">women’s hair loss treatment in Rohini</a> and <a href="/blog/female-pattern-hair-loss-in-women">female pattern hair loss</a>.</p>
      </div>
      <div class="grid grid--2">
        <div class="card"><h3 class="h4">Iron and thyroid</h3><p class="body-s mt-2">Low iron stores and <a href="/blog/thyroid-and-hair-loss">thyroid disease</a> are among the commonest contributors, and both are found by blood tests rather than guessed.</p></div>
        <div class="card"><h3 class="h4">PCOS and hormones</h3><p class="body-s mt-2">Hormone tests for some women, for instance with irregular periods. Some women with high androgen levels are offered anti-androgen medicine.</p></div>
        <div class="card"><h3 class="h4">After pregnancy</h3><p class="body-s mt-2">Shedding a few months after childbirth is a form of telogen effluvium and usually settles once the trigger is over.</p></div>
        <div class="card"><h3 class="h4">Pregnancy plans</h3><p class="body-s mt-2">Some hair-loss medicines are unsuitable in pregnancy or when trying to conceive, so tell the doctor if either applies.</p></div>
      </div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-follicle',
    'alt'     => 'a sculpted cross-section of scalp showing hair follicles beneath the surface',
    'eyebrow' => 'Treatment',
    'title'   => 'Treatment Options, From Least to Most Invasive',
    'tone'    => 'white',
    'reverse' => true,
    'html'    => '<p>Most plans begin with the first two steps. Which medicine, and at what strength, is decided at the consultation.</p>'
               . '<p><b>1. Treat the cause.</b> Correcting low iron, a thyroid problem, <a href="/blog/vitamin-deficiency-and-hair-loss">a vitamin deficiency</a> or PCOS, settling an inflamed scalp, removing tension from hairstyles, or waiting out telogen effluvium once nothing else is found. A good share of hair fall improves at this stage without long-term hair-loss medicine.</p>'
               . '<p><b>2. Medication for pattern loss.</b> Minoxidil on the scalp is the usual first step; tablets are prescribed for some, with monitoring; finasteride is for men only; some women with high androgen levels are offered anti-androgen medicine. They have the most research behind them, but:</p>',
    'points'  => [
        'None is a cure: the effect fades when you stop',
        'Some people see no benefit',
        'Side effects, such as scalp irritation, extra facial hair or a brief rise in shedding when minoxidil starts, are explained first',
    ],
    'link'    => ['url' => '/blog/minoxidil-and-finasteride-in-india', 'label' => 'Minoxidil and finasteride, explained'],
]) ?>

<?= lp_split([
    'img'     => 'svc-prp',
    'alt'     => 'a capped tube of golden-yellow plasma beside a syringe on a white tray',
    'eyebrow' => 'If more is needed',
    'title'   => 'Where PRP, GFC or a Hair Transplant Fits',
    'tone'    => 'canvas',
    'html'    => '<p><b>3. PRP or GFC.</b> May be discussed for early to moderate thinning where follicles are still present, usually alongside medication. The evidence is weaker, some people do not respond and maintenance is needed. Sessions are available at this clinic; see <a href="/hair-prp-treatment-in-rohini">hair PRP and GFC in Rohini</a>.</p>'
               . '<p><b>4. Hair transplant.</b> Only where follicles in an area are already gone, the pattern has settled and the donor area can supply the grafts. Surgery moves hair rather than creating it, and medical treatment usually continues afterwards. See <a href="/hair-transplant-in-rohini">how a hair transplant is planned</a>.</p>'
               . '<p><b>Shampoos, oils and supplements.</b> Shampoos and oils work on the hair shaft and skin surface, not on the follicle, although a medicated shampoo is useful for a scalp condition. Supplements are worth taking for a deficiency a test has confirmed; without one they seldom help, and excess vitamin A or selenium is a cause of hair loss in its own right.</p>',
]) ?>

<section class="section section--white" id="progress">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">What to expect</p>
        <h2 class="h2 mt-2">What Is Normal, and How Progress Is Judged</h2>
        <p class="body mt-3">Most people lose roughly 50 to 100 hairs a day, more on wash days. A bad week is not a diagnosis. What deserves an examination is shedding above your normal level that lasts more than six to eight weeks, a parting that keeps widening, round bare patches, or an itchy, flaking scalp.</p>
        <p class="body mt-3">Hair responds over months, and the follow-up visits take place at the Rohini clinic.</p>
      </div>
      <div class="grid grid--2">
        <div class="card"><span class="pill">First 2 months</span><h3 class="h4 mt-3">Cause treated</h3><p class="body-s mt-2">Results reviewed and any deficiency or scalp problem treated. Minoxidil can briefly increase shedding at first.</p></div>
        <div class="card"><span class="pill">2–3 months</span><h3 class="h4 mt-3">Shedding eases</h3><p class="body-s mt-2">Normally the earliest sign of progress; too soon to judge thickness.</p></div>
        <div class="card"><span class="pill">6 months</span><h3 class="h4 mt-3">First fair comparison</h3><p class="body-s mt-2">Photographs set beside the baseline to see whether the plan is working.</p></div>
        <div class="card"><span class="pill pill--ink">12 months</span><h3 class="h4 mt-3">Full review</h3><p class="body-s mt-2">Continue, adjust or step up. Reversible causes are often resolved well before this.</p></div>
      </div>
    </div>
  </div>
</section>

<?= lp_highlights([
    'eyebrow' => 'Living in Delhi',
    'title'   => 'Hair and Scalp Care Through Delhi’s Seasons',
    'intro'   => 'The weather and the air rarely cause hair loss on their own, but they change how the scalp behaves. General points; your own plan comes from the examination.',
    'tone'    => 'canvas',
    'items'   => [
        ['icon' => 'clock',    'title' => 'Summer heat and sweat',   'text' => 'Sweat and oil build up on the scalp and can aggravate dandruff. Regular washing helps rather than harms: the hairs seen on wash days had already been shed.'],
        ['icon' => 'calendar', 'title' => 'Monsoon humidity',        'text' => 'Damp months can aggravate dandruff and fungal scalp infections, and hair left wet tangles and breaks more easily. Shedding beyond six to eight weeks deserves an examination.'],
        ['icon' => 'shield',   'title' => 'Winter smog and dust',    'text' => 'Smog and dust make the scalp dirtier and more irritable, but the evidence linking air pollution to hair loss in people is limited. Real thinning still needs its cause found.'],
        ['icon' => 'cap',      'title' => 'Helmets and tight styles', 'text' => 'A helmet over a sweaty, damp scalp can aggravate dandruff and folliculitis, so a clean liner and a dry scalp help. Tight braids, buns and extensions pull along the hairline.'],
    ],
]) ?>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">Hair Fall Treatment Cost Depends on the Cause</h2>
        <p class="body mt-3 measure">If the hair fall comes from a deficiency, a thyroid disorder or a temporary trigger, you mainly pay for the consultation, the necessary tests and whatever medicine the cause itself needs. Pattern hair loss costs more over time because treatment continues, and in-clinic options such as PRP run as courses with maintenance.</p>
        <p class="body mt-3 measure">Prices are not published; your plan and its cost come in writing after the assessment. For in-clinic courses, instalment options through third-party lenders may be available; ask at the consultation. See <a href="/cost-and-emi-options">cost and payment options</a>, and <a href="/prp-hair-treatment-cost-in-rohini">PRP hair treatment cost in Rohini</a> for what decides the cost of a PRP course.</p>
      </div>
      <div class="grid grid--2">
        <div class="card"><p class="h4">Consultation</p><p class="meta mt-1">Where the diagnosis is made.</p></div>
        <div class="card"><p class="h4">Blood tests</p><p class="meta mt-1">Only those your history calls for.</p></div>
        <div class="card"><p class="h4">Medication</p><p class="meta mt-1">Depends entirely on the diagnosis.</p></div>
        <div class="card"><p class="h4">In-clinic courses</p><p class="meta mt-1">Only if they add something to the plan.</p></div>
      </div>
    </div>
    <div class="card card--pad-lg mt-6">
      <h3 class="h4">Questions worth asking any clinic about hair fall</h3>
      <p class="body-s mt-2">They apply wherever you are seen, including here.</p>
      <div class="mt-3"><?= ticks([
          'Has my scalp been examined under magnification?',
          'Which blood tests are being ordered, and why these ones?',
          'What is the diagnosis, and can I have it in writing?',
          'What will the plan cost over a year, not just this month?',
          'When will progress be reviewed, and against which photographs?',
          'Is anything being sold that the diagnosis does not call for?',
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
        <h2 class="h2 mt-2">Hair Fall Treatment in Rohini: Questions</h2>
        <p class="body-s mt-3">These answers are general information. Questions about your own hair and health are answered in person at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask the Rohini Clinic</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'Visit Our Rohini Clinic',
    'Hair fall assessments, treatment and reviews take place at our Rohini clinic in North-West Delhi, near the Outer Ring Road.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= lp_cta([
    'eyebrow'   => 'Rohini, Delhi',
    'title'     => 'Find Out What Is Behind Your Hair Fall',
    'text'      => 'Book an assessment at the Rohini clinic. You will get a history, a scalp examination, only the tests your case needs, and a plan aimed at the cause, including when the honest answer is that nothing invasive is needed.',
    'treatment' => 'Hair fall treatment',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
