<?php
/**
 * /hairline-transplant-in-gurgaon
 *
 * Surgical spoke off /hair-transplant-in-gurgaon. This page owns hairline
 * DESIGN, which is the decision that dates a transplant for life and is the
 * one thing a patient cannot undo by paying more later.
 *
 * Cannibalisation split: FUE and DHI own technique. This page deliberately
 * says almost nothing about extraction method and everything about placement,
 * position and age — the frontier line, temporal recession, the irregular
 * single-hair transition zone, and why a low straight line is the classic
 * regret. The existing blog post on natural hairline design is the deeper
 * educational read; this is the commercial page and links to it.
 *
 * Nothing quantified that the clinic cannot evidence: no "degrees of angle"
 * numbers, no density figures, no rule-of-thirds arithmetic presented as if it
 * decided the outcome.
 *
 * Landing-page layout (14 Oct 2026): lp_split / lp_steps / lp_cta from
 * includes/home-components.php, AI illustrations only, each with its label.
 * A Gurugram page: no mention of, or link to, the Rohini clinic.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

// "How is a hairline designed?" reference table: [factor, what the plan considers].
// Design principles only — no angles, densities or graft figures.
$designRows = [
    ['Your age now', 'A mature position that will still suit you in twenty years, rather than the line you had as a teenager.'],
    ['Face shape and proportions', 'A height and outline that balance your forehead and features, judged on your face rather than taken from a template.'],
    ['How fast the loss is moving', 'Whether it has settled. Loss that is still active is usually treated medically before any line is drawn.'],
    ['Family pattern and likely future loss', 'Room for the crown and mid-scalp later, so the new front does not end up as an island with thinning behind it.'],
    ['Donor supply', 'How many grafts the front can use while a reserve is kept for areas that may thin later.'],
    ['The temples', 'Whether to keep some natural temple recession; filling it in completely can look wrong on an adult face.'],
    ['Hair calibre, colour and curl', 'Fine or light hair needs more grafts for the same look; coarse or curly hair, or low contrast with the skin, covers more with fewer.'],
    ['Male or female pattern', 'A woman’s hairline is usually rounder and lower, without the temple recession of a mature male line.'],
];

$faqs = [
    ['q' => 'What is a hairline transplant?',
     'a' => 'A procedure that restores the front hairline and the temples using your own follicles, taken from the donor area at the back and sides of the scalp. The extraction is the same as any other transplant. What makes it a hairline case is the design — where the line sits, what shape it takes, and how softly it begins.'],
    ['q' => 'How is the hairline position decided?',
     'a' => 'From your facial proportions, your age, your pattern of loss and how that pattern is likely to progress — then drawn on and agreed with you in a mirror before consent. It is a judgement made on your head, not a formula applied from a diagram, and it is the single most consequential decision in the whole procedure.'],
    ['q' => 'Can I have the hairline I had at eighteen?',
     'a' => 'Almost always no. A hairline placed at an adolescent position looks unremarkable at twenty-five and conspicuous at forty-five, when the hair behind it has thinned and the line has not moved. It also spends donor hair on the least defensible part of the scalp. We will show you where a mature hairline sits and explain why.'],
    ['q' => 'Why does a straight hairline look artificial?',
     'a' => 'Because no natural hairline is straight. A real one is irregular, slightly broken, and has a soft transition rather than a hard edge. A ruler-straight line reads as constructed even to people who could not say why. The irregularity is designed in deliberately.'],
    ['q' => 'What is the transition zone?',
     'a' => 'The first few millimetres of the hairline, built entirely from single-hair grafts placed irregularly so the line begins softly rather than starting abruptly at full density. Behind it, grafts with more hairs each build up the density. Skipping this zone, or putting multi-hair grafts at the very front, produces the tufted look people recognise as a transplant.'],
    ['q' => 'Will a hairline transplant fix my receding temples?',
     'a' => 'Temporal recession is usually part of the same design and often matters more to how a face reads than the central line does. Rebuilding temples needs care: the hair there is fine, lies at a steep backward angle, and looks wrong if it is treated like frontal hair.'],
    ['q' => 'How many grafts does a hairline need?',
     'a' => 'It follows the drawn design and the area being covered, and it is counted from the mapped plan rather than quoted from a photograph. A frontal hairline restoration needs far fewer than a case that also rebuilds temples and the area behind the line.'],
    ['q' => 'I am in my twenties. Should I have this done now?',
     'a' => 'Often the honest answer is not yet. Early loss that is still actively progressing is usually treated medically first, because a hairline placed while the hair behind it is still receding leaves an island of transplanted hair with a gap opening up behind it. Stabilising the loss first is what protects the long-term result.'],
    ['q' => 'Is the hairline permanent?',
     'a' => 'The transplanted follicles keep donor characteristics and generally persist. The native hair behind them can carry on thinning with age, which is why the design has to anticipate future loss and why medical treatment usually continues alongside. No clinic can promise a specific density or a permanent outcome.'],
    ['q' => 'Will anyone be able to tell?',
     'a' => 'That depends mainly on the design, and no outcome can be promised. Angle, direction, irregularity and restraint at the front are what decide it — far more than the technique used or the number of grafts. Work that is noticed is usually noticed because the line was placed too low, too straight, or too densely at the very edge.'],
    ['q' => 'How long before the hairline looks right?',
     'a' => 'Transplanted hairs commonly shed in the first weeks. New growth generally starts around three to four months, and the hairline usually looks like itself at roughly ten to twelve months. Early growth is uneven and thin, which is normal.'],
    ['q' => 'Can a badly placed hairline from another clinic be corrected?',
     'a' => 'Sometimes. Options depend on what was done — softening a hard edge, adding single hairs at the front, and occasionally removing misplaced grafts. It is more constrained and more expensive than getting it right the first time. See our page on <a href="/hair-transplant-repair-in-gurgaon">hair transplant repair</a>.'],
    ['q' => 'FUE or DHI for a hairline?',
     'a' => 'Both are used, and the choice matters less than the design. <a href="/dhi-hair-transplant-in-gurgaon">DHI</a> places each graft with an implanter in one action, which suits fine control at the front. <a href="/fue-hair-transplant-in-gurgaon">FUE</a> into pre-made sites is efficient across larger areas. A well-designed hairline can be built either way; a badly designed one fails with both.'],
    ['q' => 'How much does a hairline transplant cost in Gurgaon?',
     'a' => 'It follows the graft number from your mapped design, so we quote after assessment rather than publishing a headline price. Our <a href="/hair-transplant-cost-in-gurgaon">hair transplant cost guide</a> explains what moves the number, and you get an itemised written estimate before booking a date.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair transplant', 'url' => '/hair-transplant-in-gurgaon'],
    ['name' => 'Hairline transplant in Gurgaon'],
];

$page = [
    'title'       => 'Hairline Transplant in Gurgaon: Design & Cost | DenceSpot',
    'description' => 'Hairline transplant in Gurgaon: how the line is designed for your age, face and future loss, agreed with you in a mirror, plus grafts, recovery and cost.',
    'url'         => '/hairline-transplant-in-gurgaon',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-hairline-768.webp',
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/hairline-transplant-in-gurgaon', [
            'name'          => 'Hairline Transplant',
            'alternateName' => ['Hairline restoration', 'Frontal hairline hair transplant', 'Hairline lowering by grafting'],
            'procedureType' => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'  => 'Frontal scalp and temporal region',
            'howPerformed'  => 'A hairline position and shape are designed and agreed with the patient before surgery. Follicular units are extracted from the donor area of the scalp and sorted under magnification. Single-hair grafts are placed irregularly across a transition zone at the front edge, with multi-hair grafts placed behind them to build density, each at the acute angle and forward direction of natural frontal hair. Performed as a day case under local anaesthetic.',
            'preparation'   => 'Clinical assessment of hair-loss pattern and likely progression, donor density measurement, review of medication, photographic mapping, and a hairline drawn on the patient and agreed in a mirror before consent.',
            'followup'      => 'Wash instruction and review in the first week, then scheduled photographic reviews as the transplanted hair sheds and regrows, alongside any ongoing medical treatment for the native hair behind the line.',
            'expectedPrognosis' => 'Transplanted hairs commonly shed within the first weeks; new growth typically begins around three to four months with a settled hairline at approximately ten to twelve months. Native hair behind the transplanted line may continue to thin with age. Outcomes vary between patients and cannot be promised.',
        ]),
        schema_faq('/hairline-transplant-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Hairline transplant in Gurgaon</span>
        <h1 class="h1 mt-3">A Hairline Designed for the Face You Will Have at Fifty</h1>
        <p class="lead mt-3 measure">Every other decision in a hair transplant can be revisited. The hairline cannot. Put it in the wrong place and you carry that line for the rest of your life, through every stage of loss that follows. This page is about how the line is decided, and why we will sometimes tell you no.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-treatment="Hair transplant" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Line drawn on you and agreed in a mirror',
            'Single-hair transition zone at the front edge',
            'Designed around future loss, not just today',
            NAP_LOCALITY . ' · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-hairline-768.webp" srcset="/assets/img/services/svc-hairline-512.webp 512w, /assets/img/services/svc-hairline-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a mannequin head seen from above, with the hair receding at the temples" width="768" height="960" loading="eager" fetchpriority="high">
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
      <div class="card"><?= icon('pencil', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Drawn before consent</p><p class="body-s mt-2">You see the line on your own face and approve it.</p></div>
      <div class="card"><?= icon('hairline', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Irregular by design</p><p class="body-s mt-2">No straight edges. Natural hairlines are broken.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Age-appropriate position</p><p class="body-s mt-2">A mature line, not an adolescent one.</p></div>
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Planned for progression</p><p class="body-s mt-2">Designed around the loss still to come.</p></div>
      <div class="card"><?= icon('info', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Told if it is too early</p><p class="body-s mt-2">Unstable loss is treated medically first.</p></div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'intro-recipient',
    'alt'     => 'a mannequin head seen from the front, with short hair and a planned hairline drawn in pencil',
    'eyebrow' => 'The basics, plainly',
    'title'   => 'What a Hairline Transplant Actually Involves',
    'id'      => 'what-is',
    'html'    => '<p>Mechanically, it is the same operation as any other transplant. Follicular units are taken from the permanent donor zone at the back and sides of the scalp, sorted under magnification and placed into sites made across the frontal area. Whether that is done as <a href="/fue-hair-transplant-in-gurgaon">FUE</a> or <a href="/dhi-hair-transplant-in-gurgaon">DHI</a> is a secondary question.</p>'
               . '<p>What separates a hairline case is that it is looked at — in daylight, from a metre away, for the rest of your life. Frontal hair grows at a sharp forward angle, close to the skin, and grafts placed at the wrong angle stick up however they are styled. Angle is set site by site as the sites are made, and it cannot be corrected afterwards.</p>'
               . '<p>Graft numbers can be added to in a second session, and medical treatment can be started at any time. A hairline placed two centimetres too low cannot be raised. Our article on <a href="/blog/natural-hairline-design-explained">natural hairline design</a> goes through how a line is constructed.</p>',
    'points'  => [
        'The design carries almost all of the risk and the reward',
        'Grafts are living hair in permanent positions; remedies are slow, partial and expensive',
        'The line is drawn on your forehead and checked in a mirror before you sign',
    ],
]) ?>

<section class="section section--canvas" id="design">
  <div class="wrap">
    <p class="eyebrow">Design</p>
    <h2 class="h2 mt-2">The Four Decisions Behind Every Hairline</h2>
    <p class="body-l mt-3 measure">A hairline is not one line. It is a set of judgements that have to agree with each other and with your face.</p>
    <div class="grid grid--2 mt-5">
      <div class="card card--pad-lg">
        <p class="eyebrow">Decision 01</p>
        <p class="h4 mt-2">Where the line sits</p>
        <p class="body-s mt-2">Height on the forehead, judged against your facial proportions and your age. This is the decision people most want to push and the one we push back on hardest. A line that flatters at twenty-eight can look conspicuous at forty-eight, when everything behind it has thinned.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow">Decision 02</p>
        <p class="h4 mt-2">What shape it takes</p>
        <p class="body-s mt-2">Straight across, gently rounded, or with the temporal recession most adult men keep. Shape has to suit the face and the pattern of loss. Erasing natural temporal recession entirely is a common way to make a face look wrong without anyone identifying why.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow">Decision 03</p>
        <p class="h4 mt-2">How softly it begins</p>
        <p class="body-s mt-2">The front edge is built from single hairs, placed irregularly, with sentinel hairs scattered slightly ahead of the line. Behind that, grafts with more hairs build density. This transition is the difference between a hairline and a hedge.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow">Decision 04</p>
        <p class="h4 mt-2">Angle and direction</p>
        <p class="body-s mt-2">Frontal hair runs forward at an acute angle, and direction shifts across the temples where it sweeps backwards. Angle is fixed when the site is made. There is no styling fix for grafts placed at the wrong angle.</p>
      </div>
    </div>

    <div class="measure mt-6">
      <h3 class="h3" id="design-factors">How Is a Hairline Designed for Your Age and Face?</h3>
      <p class="body mt-3">Those four decisions rest on a handful of facts about you. These are the ones the plan weighs up before the line is drawn.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data data--fit">
          <caption class="sr-only">Hairline design factors and what a hairline plan considers for each — a general guide, not a design for any individual</caption>
          <thead><tr><th scope="col">Factor</th><th scope="col">What the plan considers</th></tr></thead>
          <tbody>
            <?php foreach ($designRows as $r): ?>
            <tr><th scope="row" style="white-space:normal;width:38%"><?= e($r[0]) ?></th><td><?= e($r[1]) ?></td></tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="card card--pad-lg mt-6">
      <p class="eyebrow">The classic regret</p>
      <h3 class="h3 mt-2">A low, straight, densely packed line</h3>
      <p class="body mt-3 measure">It is what people often ask for. It looks impressive in a photograph taken at twelve months. It ages badly, spends donor hair on the least defensible part of the scalp, and leaves nothing in reserve for the crown when the loss reaches it. Every element of it is permanent.</p>
      <p class="body mt-3 measure">We would rather have the awkward conversation at consultation than build something you resent in fifteen years.</p>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'intro-donor',
    'alt'     => 'a mannequin head seen from behind, with the donor area at the back and sides marked',
    'eyebrow' => 'Suitability',
    'title'   => 'When a Hairline Transplant Makes Sense',
    'id'      => 'candidacy',
    'reverse' => true,
    'html'    => '<p>A good candidate has a pattern of loss that has settled, a donor area that can support the plan with something left over, and expectations that match what surgery can deliver. Age matters, though not on its own: what matters is whether the loss is still moving.</p>'
               . '<p>A hairline built while the hair behind it is still receding produces an island — a transplanted front row with a widening gap opening up behind it. Where loss is active, medical treatment comes first and surgery waits. The donor is finite too: spending it all at the front can leave nothing for the crown a decade later.</p>'
               . '<p><b>We will ask you to wait</b> where loss is rapid and has not been stabilised, where it is very early loss in the early twenties, where the donor is limited and extensive loss is expected, or where only an adolescent hairline will do.</p>'
               . '<p><b>Generally a good candidate:</b></p>',
    'points'  => [
        'Loss that has been stable for some time',
        'Clear frontal recession with a healthy donor',
        'Realistic about a mature hairline position',
        'Willing to continue medical treatment',
    ],
]) ?>

<?= lp_steps([
    'eyebrow' => 'The process',
    'title'   => 'From First Consultation to a Settled Hairline',
    'id'      => 'journey',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                    'title' => 'Assessment',        'text' => 'Pattern staged, donor density measured, family history and progression considered, medication reviewed. Whether now is the right time is settled here.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned hairline', 'title' => 'The line is drawn', 'text' => 'Marked on your forehead, reviewed in a mirror, argued about if necessary, adjusted and agreed. The graft count follows from the agreed design.'],
        ['img' => 'step-procedure',    'alt' => 'sterile hair-restoration instruments laid out on a tray',  'title' => 'Procedure day',     'text' => 'Extraction, sorting under magnification, then placement — single hairs across the transition zone, denser grafts behind. Day case, local anaesthetic.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with review dates circled',               'title' => 'Growth and review', 'text' => 'Shedding, regrowth from around three to four months, photographic reviews to roughly twelve months, with medical treatment continuing for the native hair.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-follicle',
    'alt'     => 'a sculpted cross-section of scalp showing hair follicles beneath the skin',
    'eyebrow' => 'Recovery and timeline',
    'title'   => 'What Happens After a Hairline Procedure',
    'id'      => 'recovery',
    'html'    => '<p>Small crusts form around each graft along the new line and are visible for several days, and forehead swelling is common in the first few days after frontal work; it settles on its own. The line is conspicuous during this period, which is worth planning around.</p>'
               . '<p>The transplanted hairs then usually shed within the first few weeks while the follicles remain — the phase people find hardest, and an entirely expected one. Regrowth generally begins at around three to four months, fine and uneven before it thickens. A hairline usually looks like itself at roughly ten to twelve months; judging the edge at six months is judging it half-built.</p>'
               . '<p>Full instructions are in our <a href="/hair-transplant-aftercare">recovery and aftercare guide</a>, and you are given your own in writing. To protect the result:</p>',
    'points'  => [
        'Follow the washing instructions exactly',
        'Keep the new line out of direct sun',
        'No caps or helmets until cleared',
        'Continue medical treatment as prescribed',
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
        <h2 class="h2 mt-2">Hairline Transplant Cost in Gurgaon</h2>
        <p class="body mt-3 measure">The price follows the graft number, and the graft number follows the agreed design. Since the design is made on your head, a figure quoted before assessment is a guess. We publish the factors and give you an itemised estimate in writing.</p>
        <div class="grid grid--2 mt-5">
          <div class="card"><p class="h4">Area being restored</p><p class="body-s mt-2">Frontal line alone, or line plus temples</p></div>
          <div class="card"><p class="h4">Depth behind the line</p><p class="body-s mt-2">How far back density is being built</p></div>
          <div class="card"><p class="h4">Donor density</p><p class="body-s mt-2">What can be taken without compromising the donor</p></div>
          <div class="card"><p class="h4">Technique</p><p class="body-s mt-2">Placement method chosen for the case</p></div>
          <div class="card"><p class="h4">Session structure</p><p class="body-s mt-2">One session, or staged with the crown later</p></div>
          <div class="card"><p class="h4">Supporting treatment</p><p class="body-s mt-2">Medical therapy for the native hair behind the line</p></div>
        </div>
        <p class="body-s mt-4 measure">Be careful with quotes that get cheaper as the graft number rises. A hairline needs the right number of grafts placed well, not the largest number a donor can be pushed to give.</p>
        <p class="body mt-3 measure">See the full <a href="/hair-transplant-cost-in-gurgaon">hair transplant cost breakdown</a> and <a href="/cost-and-emi-options">payment and EMI options</a>. The <a href="/hair-transplant-graft-calculator">hair transplant graft calculator</a> gives a rough range for your pattern of loss before you come in.</p>
        <div class="card card--pad-lg mt-5">
          <h3 class="h4">Questions worth asking any clinic about a hairline</h3>
          <p class="body-s mt-2">They apply wherever you go, including here.</p>
          <div class="mt-3"><?= ticks([
              'Will the line be drawn on my forehead and checked in a mirror before I agree to it?',
              'Where will that line sit if my hair keeps thinning for another ten years?',
              'How many grafts are kept in reserve for the crown?',
              'Are single-hair grafts used along the front edge?',
              'Is the number quoted in grafts or hairs, and who places them?',
          ], false) ?></div>
        </div>
      </div>
      <div class="cta-band" style="display:block">
        <h3 class="h3">Get a Personalized Treatment Estimate</h3>
        <p class="body mt-3">Send photos of your hairline from the front, from above and from each side on WhatsApp, or request a call back. You will get an assessment appointment, not a sales pitch.</p>
        <a class="btn btn--block btn--accent mt-5" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Send photos on WhatsApp</a>
        <a class="btn btn--block btn--ghost mt-3" href="/book-consultation" data-book data-treatment="Hair transplant" data-track="book">Request an estimate by form</a>
        <p class="body-s mt-4">Your details are used only to arrange your consultation.</p>
      </div>
    </div>
  </div>
</section>

<?= local_block(
    'Hairline Design and Surgery at Our Gurgaon Clinic',
    'Our Gurugram clinic is in Sector 39, ' . NAP_LANDMARK . ', where consultations and procedures are carried out by registered medical practitioners.'
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Hairline Transplant FAQs</h2>
        <p class="body-s mt-3">Answers are general patient education. Where your own hairline should sit is answered at the assessment, on your face, in a mirror.</p>
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
    'title'     => 'See Your Hairline Drawn Before You Commit to It',
    'text'      => 'Come in and have the line marked on your own forehead. You will get an honest view of where it belongs at your age and pattern of loss, what your donor can support, and a written plan — with no pressure to book a date on the day.',
    'treatment' => 'Hair transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
