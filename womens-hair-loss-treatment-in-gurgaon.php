<?php
/**
 * /womens-hair-loss-treatment-in-gurgaon
 *
 * Medical (non-surgical) hub for female hair loss. Deliberately the larger and
 * more important of the two women's pages.
 *
 * Cannibalisation split, stated because these two pages are the easiest pair on
 * the site to collide:
 *   - THIS page owns diagnosis: the differential, the workup, the bloods, and
 *     medical treatment. It is the page a woman who does not yet know why her
 *     hair is falling should land on.
 *   - /hair-transplant-for-women-in-gurgaon owns surgical candidacy only, and
 *     sends the majority of its traffic here.
 *   - /hair-fall-treatment-in-gurgaon remains the general (largely male-default)
 *     medical page; this one is specifically the female differential.
 *
 * No drug names, doses or brand names: prescribing is individual, several of the
 * relevant agents are contraindicated in pregnancy, and publishing a regimen on
 * a public YMYL page invites self-medication. Treatment is described by category
 * and deferred to consultation throughout.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'Why is my hair falling out?',
     'a' => 'In women there is a genuinely wide list of causes, and they are treated very differently. The common ones are iron deficiency, thyroid disease, hormonal conditions including PCOS, the shedding that follows pregnancy, significant illness, surgery, rapid weight loss or severe stress, certain medications, and female pattern hair loss. Several of these are often reversible once identified, which is why diagnosis comes before treatment.'],
    ['q' => 'What is the difference between shedding and thinning?',
     'a' => 'Shedding is losing noticeably more hair than usual — on the pillow, in the shower, in a brush — usually over a defined period. Thinning is a reduction in the density and calibre of the hair that remains, so a parting widens or a ponytail feels smaller. They have different causes and the distinction is one of the first things established at examination.'],
    ['q' => 'What is telogen effluvium?',
     'a' => 'A temporary disturbance of the hair cycle in which an unusually large number of hairs shift into the shedding phase at once. It classically follows childbirth, serious illness, surgery, a crash diet or a period of severe stress, and it typically appears some months after the trigger. It usually recovers on its own once the cause is addressed, which is why treating it patiently is more useful than treating it aggressively.'],
    ['q' => 'What tests will I need?',
     'a' => 'It depends on your history and examination. Investigation of iron stores and thyroid function comes up frequently. Hormonal tests are ordered where the history points that way, and other bloods are added where indicated. The purpose is to find anything reversible, because treating that is far more effective than working around it.'],
    ['q' => 'Can iron deficiency really cause hair loss?',
     'a' => 'Low iron stores are a recognised contributor to hair shedding in women and are common, particularly with heavy periods, restricted diets or pregnancy. It is one of the most worthwhile things to check, because correcting it is straightforward and the hair often follows. It should be assessed properly rather than self-treated with supplements.'],
    ['q' => 'Is my hair loss because of PCOS?',
     'a' => 'Polycystic ovary syndrome can be associated with hair thinning in a pattern distribution, often alongside other features. If your history suggests it, that is investigated and managed as a condition in its own right, because treating the hair while the underlying picture is uncontrolled is treating a symptom.'],
    ['q' => 'Will my hair grow back after pregnancy?',
     'a' => 'Post-partum shedding is common and usually temporary, typically starting some months after delivery and recovering over the following months. The most useful things during that period are patience, checking for anything else contributing such as low iron or thyroid change, and avoiding aggressive treatment for something that is resolving on its own.'],
    ['q' => 'What treatments are available?',
     'a' => 'Depending on the diagnosis: correcting a deficiency, treating a thyroid or hormonal condition, topical treatment, prescribed medication where appropriate, supportive treatments such as PRP, and adjusting hair practices where traction is a factor. What suits you is decided after the diagnosis, not before it.'],
    ['q' => 'Why will not you name the medications on this page?',
     'a' => 'Because prescribing is individual, some of the relevant medicines are not safe in pregnancy or when trying to conceive, and publishing a regimen invites people to self-medicate without a diagnosis. What you should be taking, if anything, is decided in consultation where your history can actually be taken into account.'],
    ['q' => 'How long before treatment shows a result?',
     'a' => 'Hair is slow. Reduced shedding is usually the earliest sign and can take some weeks to months. Visible improvement in density is assessed over several months against baseline photographs. Judging progress in a mirror week to week mostly measures the lighting in your bathroom.'],
    ['q' => 'Do I need a hair transplant?',
     'a' => 'Most women who ask this question do not. Surgery relies on a stable donor area, and female thinning is frequently diffuse and often involves the donor too. Where it genuinely fits — traction alopecia, a high or receding hairline, scarring, or localised loss with a stable donor — it can be an option, with its own risks and limits. See <a href="/hair-transplant-for-women-in-gurgaon">hair transplant for women</a>.'],
    ['q' => 'Can tight hairstyles cause permanent hair loss?',
     'a' => 'Yes. Sustained tension from tight braids, extensions, weaves or tightly pulled styles can permanently destroy follicles, typically along the hairline and temples. Caught early it can improve once the tension stops. Left long enough it does not come back, and grafting becomes the only option.'],
    ['q' => 'Do hair supplements work?',
     'a' => 'They correct a deficiency if you have one, and do very little if you do not. Taking supplements without knowing your iron, thyroid or vitamin status is guessing, and some things are harmful in excess. Test first.'],
    ['q' => 'What should I bring to my appointment?',
     'a' => 'A list of every medicine and supplement you take, any recent blood results, photographs showing how your hair looked before, and the dates — when the loss started and what else was happening around then. That timeline is often the most diagnostically useful thing you bring.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Treatments', 'url' => '/hair-fall-treatment-in-gurgaon'],
    ['name' => "Women's hair loss treatment in Gurgaon"],
];

$page = [
    'title'       => "Women's Hair Loss Treatment in Gurgaon: Thyroid, Iron & PCOS",
    'description' => "Women's hair loss treatment in Gurgaon: shedding after childbirth or illness, pattern thinning, PCOS, iron and thyroid causes, and what is checked first.",
    'url'         => '/womens-hair-loss-treatment-in-gurgaon',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-women-768.webp',
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_therapy('/womens-hair-loss-treatment-in-gurgaon', [
            'name'          => "Women's Hair Loss Treatment",
            'alternateName' => ['Female hair loss treatment', 'Female pattern hair loss management', 'Hair fall treatment for women'],
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'Assessment begins with a full medical, medication, menstrual and hormonal history and direct scalp examination to establish whether loss is diffuse or localised and to measure donor density. Investigation of reversible causes, commonly including iron status and thyroid function and hormonal testing where indicated, is undertaken before treatment. Management is then directed at the diagnosis and may include correction of deficiency, treatment of an underlying endocrine or hormonal condition, topical or prescribed medical therapy, supportive treatments, and modification of hair practices where traction is contributing.',
            'preparation'   => 'Full history including timing of onset and any preceding pregnancy, illness, surgery, weight change or stressor; review of all medication and supplements; scalp and donor examination; and standardised baseline photography.',
            'followup'      => 'Interval photography against the baseline, review of investigation results, and reassessment of the treatment plan over several months.',
            'expectedPrognosis' => 'Prognosis depends entirely on the underlying cause. Hair loss due to iron deficiency, thyroid disease, post-partum shedding or another reversible trigger commonly improves once that cause is treated. Female pattern hair loss is a progressive condition that is managed rather than cured and requires ongoing treatment. Response is assessed over months rather than weeks, and outcomes vary between patients.',
        ]),
        schema_faq('/womens-hair-loss-treatment-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Women's hair loss treatment in Gurgaon</span>
        <h1 class="h1 mt-3">Women's Hair Loss Is Diagnosed Before It Is Treated</h1>
        <p class="lead mt-3 measure">Iron, thyroid, hormones, pregnancy, illness, medication, tension from hairstyles, and genuine pattern loss all cause hair to fall — and they are treated completely differently. Being handed a treatment before anyone has established which one you have is the most common thing that goes wrong here.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-treatment="Hair fall treatment" data-track="book"><?= icon('calendar', 18) ?> Book an Assessment</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Reversible causes investigated first',
            'Examined by a registered medical practitioner',
            'Baseline photographs, so progress is measurable',
            'At our clinic in Sector 39, Gurugram',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-women-768.webp" srcset="/assets/img/services/svc-women-512.webp 512w, /assets/img/services/svc-women-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a mannequin head seen from above with a widening parting" width="768" height="960" loading="eager" fetchpriority="high">
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
    <div class="grid grid--5">
      <div class="card"><?= icon('doc', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Investigated, not guessed</p><p class="meta mt-1">Bloods where indicated, before treatment starts.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">A doctor examines you</p><p class="meta mt-1">Scalp and donor assessed directly.</p></div>
      <div class="card"><?= icon('clock', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Timeline taken seriously</p><p class="meta mt-1">When it started is often the key clue.</p></div>
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Progress photographed</p><p class="meta mt-1">Measured against a baseline, not a memory.</p></div>
      <div class="card"><?= icon('info', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Told when to wait</p><p class="meta mt-1">Some shedding recovers without treatment.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="causes">
  <div class="wrap">
    <p class="eyebrow">The differential</p>
    <h2 class="h2 mt-2">What Actually Causes Hair Loss in Women</h2>
    <p class="body-l mt-3 measure">This list is the reason a diagnosis matters. Several of these often settle once identified and corrected, and none of them respond to a treatment aimed at a different one.</p>
    <div class="grid grid--3 mt-5">
      <div class="card"><p class="h4">Iron deficiency</p><p class="body-s mt-2">Low iron stores are a recognised contributor to shedding and are common with heavy periods, restricted diets or pregnancy. Straightforward to check and to correct.</p></div>
      <div class="card"><p class="h4">Thyroid disease</p><p class="body-s mt-2">Both underactive and overactive thyroid affect hair. The hair frequently improves once the thyroid is properly managed, which makes testing worthwhile.</p></div>
      <div class="card"><p class="h4">Post-partum shedding</p><p class="body-s mt-2">Common, usually beginning some months after delivery, and usually temporary. Patience and checking for anything else contributing beat aggressive treatment.</p></div>
      <div class="card"><p class="h4">Telogen effluvium</p><p class="body-s mt-2">A temporary cycle disturbance after illness, surgery, rapid weight loss or severe stress. It typically appears months after the trigger and usually recovers.</p></div>
      <div class="card"><p class="h4">Hormonal conditions</p><p class="body-s mt-2">PCOS and other hormonal states can drive thinning in a pattern distribution. Managed as conditions in their own right, not as a hair problem alone. Where PCOS also brings unwanted facial hair, <a href="/laser-hair-removal-in-gurgaon">laser hair removal</a> can be planned alongside medical treatment.</p></div>
      <div class="card"><p class="h4">Female pattern hair loss</p><p class="body-s mt-2">Genuine pattern loss, usually a widening parting and diffuse thinning over the top with the frontal line often preserved. Progressive, and managed rather than cured.</p></div>
      <div class="card"><p class="h4">Traction alopecia</p><p class="body-s mt-2">From sustained tension — tight braids, extensions, weaves, tightly pulled styles. Reversible early, permanent if left long enough.</p></div>
      <div class="card"><p class="h4">Medication</p><p class="body-s mt-2">A number of medicines can contribute. This is why the full medication and supplement list matters and why you should bring it.</p></div>
      <div class="card"><p class="h4">Scalp conditions</p><p class="body-s mt-2">Inflammatory and autoimmune conditions of the scalp, including alopecia areata and the scarring alopecias, need identifying because their treatment is entirely different.</p></div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-follicle',
    'alt'     => 'a sculpted cross-section of the scalp showing hair follicles',
    'eyebrow' => 'The assessment',
    'title'   => 'How a Diagnosis Is Actually Reached',
    'id'      => 'assessment',
    'tone'    => 'canvas',
    'html'    => '<p>The first appointment is about working out what you have. It is not a treatment-selection meeting, and it should not be.</p>'
               . '<p>It starts with history, and the timeline usually carries more information than anything else. Did a birth, an illness, surgery, a significant weight change, a period of real stress or a new medication come a few months before the loss? Telogen effluvium declares itself through that gap, and it is missed when nobody asks.</p>'
               . '<p>Then your menstrual, hormonal and family history, everything you take including supplements, and what you have already tried. Examination checks whether the thinning is diffuse or localised, whether the parting has widened and the condition of the scalp, and measures density at the back and sides — which also decides whether surgery could ever be an option.</p>'
               . '<p>Investigations follow where the history and examination point: iron and thyroid often, hormonal and other bloods where indicated. <b>Bring with you</b> every medicine and supplement you take, any recent blood results, photographs of your hair before the loss, and the dates — and what else was happening then.</p>'
               . '<p><b>You leave with:</b></p>',
    'points'  => [
        'A working diagnosis, or the tests to reach one',
        'Baseline photographs on record',
        'A treatment plan matched to the cause',
        'An honest view on surgery, if you asked',
    ],
]) ?>

<?php
$lossChecks = [
    ['Heavy shedding all over, a few months after an illness, operation, crash diet or stressful time', 'Telogen effluvium', 'The months before the shedding began, recent medicines, iron stores and thyroid function'],
    ['Shedding that starts some months after childbirth', 'Post-partum shedding, usually temporary', 'Iron stores and thyroid function, and whether you are breastfeeding before any medicine is suggested'],
    ['A widening parting and less volume on top, with the front hairline kept', 'Female pattern hair loss', 'Family history, density on examination and baseline photographs; blood tests if something else may be adding to it'],
    ['Thinning with irregular periods, acne or extra facial hair', 'PCOS or another hormonal cause', 'Menstrual history, and hormonal blood tests where indicated'],
    ['Diffuse shedding with heavy periods or a restricted diet', 'Low iron stores', 'Iron stores, with a blood count where indicated'],
    ['Shedding with tiredness, weight change, or feeling unusually cold or hot', 'Thyroid disease', 'Thyroid function'],
    ['Loss along the hairline and temples', 'Traction from tight styles, braids or extensions', 'Hairstyle history and a close look at the hairline'],
    ['Round, smooth bald patches', 'Alopecia areata', 'The patches, eyebrows and nails, with thyroid function where indicated'],
    ['Redness, scaling, itch or soreness where hair is thinning', 'A scalp condition, occasionally a scarring one', 'A close examination of the scalp, because some conditions need prompt treatment to protect the follicles'],
    ['Shedding after starting a new medicine or supplement', 'A medicine or supplement', 'Every medicine and supplement you take, reviewed as part of the history'],
];
?>
<section class="section section--white" id="checks">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Tests and checks</p>
      <h2 class="h2 mt-2">Women's Hair Loss: What Is Usually Checked, by Type of Loss</h2>
      <p class="body mt-3">What you have noticed, and when, decides which tests are worth doing. These are the usual starting points; the assessment adds or drops tests according to your own history rather than running a fixed panel.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data data--fit">
          <caption class="sr-only">Types of hair loss in women, what each can point to, and what is usually checked at the assessment. A general guide, not a diagnosis.</caption>
          <thead><tr><th scope="col">What you notice</th><th scope="col">What it can point to</th><th scope="col">What is usually checked</th></tr></thead>
          <tbody>
            <?php foreach ($lossChecks as $r): ?>
            <tr><th scope="row" style="white-space:normal;width:36%"><?= e($r[0]) ?></th><td><?= e($r[1]) ?></td><td><?= e($r[2]) ?></td></tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">Patchy loss is covered under <a href="/alopecia-areata-treatment-in-gurgaon">alopecia areata treatment</a> and a flaking or itchy scalp under <a href="/dandruff-treatment-in-gurgaon">dandruff treatment</a>. Our guide to <a href="/blog/blood-tests-for-hair-fall">which blood tests matter for hair fall</a> explains the common tests in more detail.</p>
  </div>
</section>

<section class="section section--canvas" id="questions">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Before you pay</p>
      <h2 class="h2 mt-2">Questions Worth Asking Any Clinic About Women's Hair Loss</h2>
      <p class="body mt-3">Useful wherever you are seen, including here. Clear answers show whether you are being treated for a diagnosis or sold a package.</p>
    </div>
    <div class="card card--pad-lg mt-5">
      <?= ticks([
          'Is my hair loss shedding, thinning, or both?',
          'Which blood tests are you suggesting, and why in my case?',
          'Could something a few months ago, such as childbirth, an illness or a new medicine, explain the timing?',
          'Is any medicine suggested safe if I am pregnant, breastfeeding or trying to conceive?',
          'How will progress be measured, and when is the review?',
          'If a package of sessions is offered, which diagnosis is it treating?',
      ]) ?>
    </div>
    <div class="note mt-4">
      <p class="body-s"><b>Not sure where to start?</b> The <a href="/hair-loss-assessment">six-question hair loss self-assessment</a> suggests a next step before you book. It is not a diagnosis, and nothing you enter is stored.</p>
    </div>
  </div>
</section>

<section class="section section--white" id="treatment">
  <div class="wrap">
    <p class="eyebrow">Treatment</p>
    <h2 class="h2 mt-2">What Treatment Looks Like, by Cause</h2>
    <p class="body-l mt-3 measure">Because the diagnosis determines the treatment, there is no single protocol. These are the broad routes.</p>
    <div class="grid grid--2 mt-5">
      <div class="card card--pad-lg">
        <p class="h4">Correcting a deficiency</p>
        <p class="body-s mt-2">Where investigation shows low iron or another deficiency, correcting it properly and rechecking is the treatment. The hair often follows over months. This is done on the basis of a result, not on the basis of a guess.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Treating an underlying condition</p>
        <p class="body-s mt-2">Thyroid disease and hormonal conditions are managed as conditions, with the hair reassessed once they are controlled. Treating the hair alone while the condition runs is treating a symptom.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Waiting, deliberately</p>
        <p class="body-s mt-2">For post-partum shedding and much telogen effluvium, recovery is the expected course. The active work is excluding anything else contributing and reviewing rather than intervening.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Medical treatment for pattern loss</p>
        <p class="body-s mt-2">Where female pattern hair loss is the diagnosis, topical and prescribed treatment options exist and are discussed individually. None is a cure, any benefit lasts only while treatment continues, and not everyone responds. Several are not appropriate in pregnancy or when trying to conceive, which is one reason they are prescribed rather than published.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Supportive treatments</p>
        <p class="body-s mt-2">Treatments such as <a href="/hair-prp-treatment-in-gurgaon">PRP</a> may be used to support existing hair alongside the main treatment. Their evidence is more limited and some people do not respond; they do not replace a diagnosis or a better-evidenced therapy.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Changing what pulls on your hair</p>
        <p class="body-s mt-2">Where traction is contributing, removing the tension is the single most important intervention, and it works far better early than late. Practical advice on styles, extensions and tension is part of the consultation.</p>
      </div>
    </div>
    <div class="card card--pad-lg mt-6">
      <p class="eyebrow">On supplements</p>
      <h3 class="h3 mt-2">Test before you take</h3>
      <p class="body mt-3 measure">Hair supplements correct a deficiency if you have one and achieve very little if you do not. Taking them without knowing your iron, thyroid or vitamin status is guessing at a problem that can be measured, and some things are genuinely harmful in excess. The cheap, useful step is testing first.</p>
    </div>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'The process',
    'title'   => 'From First Appointment to Review',
    'id'      => 'journey',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',             'title' => 'History and examination',  'text' => 'The timeline, your medication list, your hormonal history, and a direct look at your scalp and donor density.'],
        ['img' => 'step-procedure',    'alt' => 'sterile instruments laid out on a tray',           'title' => 'Investigation',            'text' => 'Bloods where the history and examination point, to find anything reversible before treatment is chosen.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram beside a notepad', 'title' => 'A plan for your diagnosis', 'text' => 'Treatment directed at the cause, with baseline photographs taken so the effect can actually be judged later.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with review dates circled',        'title' => 'Review over months',       'text' => 'Reassessed against the baseline images and repeat bloods where relevant, with the plan adjusted on evidence rather than impression.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-hair-fall',
    'alt'     => 'a wooden comb resting on folded towels',
    'eyebrow' => 'Expectations',
    'title'   => 'How Long This Takes, Honestly',
    'id'      => 'expectations',
    'reverse' => true,
    'html'    => '<p>Hair is slow, and that is the hardest part of treating it. A follicle responds over months, not weeks, so any treatment plan needs a horizon measured the same way.</p>'
               . '<p>Reduced shedding is usually the first thing to change and the first thing you will notice. Improvement in density comes later and is far harder to perceive day to day, which is exactly why baseline photographs matter: comparing your hair in the mirror with your memory of last year is not a measurement.</p>'
               . '<p>Where the cause is reversible, the outlook is genuinely good and the hair frequently recovers once the underlying problem is corrected. Female pattern hair loss is a progressive condition that is managed rather than cured, and treatment continues rather than finishing.</p>'
               . '<p><b>Treat with suspicion</b> a treatment sold before a diagnosis, promises of results within weeks, large prepaid packages of sessions, and supplements recommended without testing.</p>'
               . '<p><b>Reasonable to expect:</b></p>',
    'points'  => [
        'Shedding to settle before density changes',
        'Progress measured in months',
        'Recovery where the cause is reversible',
        'Ongoing treatment where it is pattern loss',
    ],
]) ?>

<?= doctor_block(
    'Consultations and procedures are carried out by registered medical practitioners at the clinic.'
) ?>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">What Treatment Costs</h2>
        <p class="body mt-3 measure">Because treatment follows diagnosis, cost varies widely — and for many women the answer is considerably less than they expected, because the treatment is correcting a deficiency rather than a course of procedures.</p>
        <div class="grid grid--2 mt-5">
          <div class="card"><p class="h4">Consultation and examination</p><p class="body-s mt-2">Where the diagnosis is actually made</p></div>
          <div class="card"><p class="h4">Investigations</p><p class="body-s mt-2">Bloods where the history indicates them</p></div>
          <div class="card"><p class="h4">Medical treatment</p><p class="body-s mt-2">Depends entirely on the diagnosis</p></div>
          <div class="card"><p class="h4">Supportive treatments</p><p class="body-s mt-2">Only where they add something to the plan</p></div>
        </div>
        <p class="body-s mt-4 measure">If a clinic sells you a package of sessions before establishing why your hair is falling, you are buying a procedure rather than a treatment. The diagnosis is the part worth paying for.</p>
        <p class="body mt-3 measure">See <a href="/cost-and-emi-options">cost and payment options</a>.</p>
      </div>
      <div class="cta-band" style="display:block">
        <h3 class="h3">Start With an Assessment</h3>
        <p class="body mt-3">Send photos of your parting from above, your hairline, and the back of your head, with a note of when the loss started and anything that happened a few months before.</p>
        <a class="btn btn--block btn--accent mt-5" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Send photos on WhatsApp</a>
        <a class="btn btn--block btn--ghost mt-3" href="/book-consultation" data-book data-treatment="Hair fall treatment" data-track="book">Book an assessment</a>
        <p class="body-s mt-4">Your details are used only to arrange your consultation.</p>
      </div>
    </div>
  </div>
</section>

<?= local_block(
    "Women's Hair Loss Care at Our Gurgaon Clinic",
    'Assessment, investigation, treatment and reviews take place at our Sector 39 clinic in Gurugram. Consultations and procedures are carried out by registered medical practitioners at the clinic.'
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Women's Hair Loss FAQs</h2>
        <p class="body-s mt-3">Answers are general patient education. Your own diagnosis and treatment are established at the assessment, after examination and any investigation.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= lp_cta([
    'eyebrow'   => 'Sector 39, Gurugram',
    'title'     => 'Find Out Why, Before You Treat Anything',
    'text'      => 'Come in and have it properly investigated. You will get a history, an examination, the tests your case actually calls for, and a treatment plan matched to the diagnosis rather than to a package.',
    'treatment' => 'Hair fall treatment',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
