<?php
/**
 * /hair-transplant-repair-in-gurgaon
 *
 * Surgical spoke off /hair-transplant-in-gurgaon. Owns corrective work on a
 * transplant done elsewhere.
 *
 * Editorial position: this page has to be honest that repair is constrained.
 * The visitor arrives already burned, often already told by someone that it can
 * be "fixed completely". It usually cannot. What repair does is improve — and
 * how much depends almost entirely on how much donor hair the first clinic
 * left behind. Saying that plainly is the differentiator here.
 *
 * Deliberately avoided: any competitor naming, any implication about named
 * clinics, and any before/after claim. Also avoided is the temptation to
 * promise graft excision as a routine option; it is real but limited.
 *
 * Landing-page layout (14 Oct 2026): lp_split / lp_steps / lp_cta from
 * includes/home-components.php, AI illustrations only, each with its label.
 * A Gurugram page: no mention of, or link to, the Rohini clinic.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

// "Can a bad transplant be fixed?" reference table:
// [problem found, what may be possible, the limit]. A general guide, not a promise.
$repairRows = [
    ['Pluggy or tufted grafts at the front', 'Remove them and re-use the hair further back; add single hairs ahead to soften the edge', 'Each removal leaves a tiny mark, and some removed follicles do not survive re-implantation'],
    ['A hard, straight edge', 'Single hairs placed irregularly in front of and between the existing line', 'Needs donor grafts, however few'],
    ['A hairline placed too low', 'Selected grafts removed, sometimes over more than one session, to soften or lift the line', 'Slow and partial: hair is taken away, not moved up'],
    ['Hair at the wrong angle or direction', 'The worst grafts removed and re-placed; new grafts around them can disguise the rest', 'A graft’s angle cannot be changed once it has grown in'],
    ['Thin coverage or poor growth', 'More grafts added once the first result has had about twelve months to mature', 'Only as far as the remaining donor allows'],
    ['An over-harvested donor', 'Pigment to reduce the contrast, careful use of what remains, medical treatment for the rest', 'Donor hair already taken cannot be replaced'],
    ['A wide strip scar', 'Grafts set into the scar, pigment, or both', 'Grafts survive less well in scar tissue, and the line itself stays'],
];

$faqs = [
    ['q' => 'What is hair transplant repair?',
     'a' => 'Corrective surgery on a transplant performed elsewhere that has left a result you are unhappy with. It covers softening a hard or badly placed hairline, camouflaging visible donor scarring, adding density where growth was poor, redirecting or removing misplaced grafts, and rescuing an over-harvested donor area as far as is possible.'],
    ['q' => 'Can a bad hair transplant be completely fixed?',
     'a' => 'Usually improved, rarely erased. Repair is limited by one thing above all others: how much donor hair the first procedure left you. A poor result that used a modest number of grafts is far more correctable than one that spent most of a donor area to produce it. We will tell you which of those you are before you commit to anything.'],
    ['q' => 'What are the most common problems that need repair?',
     'a' => 'A hairline placed too low or too straight; multi-hair grafts placed at the front edge producing a tufted, pluggy look; grafts placed at the wrong angle so the hair will not lie down; poor growth from a session where too much was attempted; visible dot scarring or thinning from an over-harvested donor; and a wide linear scar from a strip procedure.'],
    ['q' => 'My hairline is too low. Can it be raised?',
     'a' => 'Not simply. Transplanted grafts are living hair in permanent positions, so raising a line means removing hair rather than moving it. Selected grafts can sometimes be excised, and occasionally the hair removed can be re-implanted elsewhere, but this is slow, partial work. It is a genuine constraint and it is why hairline position gets so much attention before a first procedure.'],
    ['q' => 'Can pluggy or tufted grafts be corrected?',
     'a' => 'Often, and this is one of the more rewarding repairs. Multi-hair grafts sitting at the front can be excised and the hair redistributed, and single hairs are added ahead of and between them to break up the line and soften the transition. How much it improves depends on the grafts involved and the donor supply remaining.'],
    ['q' => 'Can you fix a visible donor scar?',
     'a' => 'Sometimes. A linear strip scar can often be improved by grafting hair into the scar itself, by pigment applied to reduce the contrast, or by both. Dot scarring from over-aggressive extraction is harder because the problem is thinning across an area rather than one line, and pigment often does more for it than grafts do.'],
    ['q' => 'What if my donor area was over-harvested?',
     'a' => 'This is the hardest situation in the field and it needs saying plainly: donor hair that has been taken cannot be put back. Where the donor has been thinned too far, the options are camouflage rather than replacement — pigment to reduce the contrast between hair and scalp, careful use of whatever donor remains, and medical treatment to protect what is left. Be wary of any promise to restore an over-harvested donor.'],
    ['q' => 'How long do I have to wait before repair surgery?',
     'a' => 'Generally at least a year from the previous procedure, so the result has fully matured and the scalp has settled. Judging a transplant before around twelve months risks operating on a result that was still going to improve, and operating into recently traumatised scalp is not sensible. There are exceptions, decided case by case.'],
    ['q' => 'Will I need more than one repair session?',
     'a' => 'Frequently, yes. Repair is often staged deliberately — excision and redistribution in one stage, density added in another — because doing everything at once risks the blood supply of an area that has already been operated on. Where staging is likely, you will be told before you start.'],
    ['q' => 'Is repair more expensive than a first transplant?',
     'a' => 'Per graft it is often comparable, but repair takes longer for the same number of grafts because the work is more delicate and the field is scarred. Excision work adds time on top. The honest summary is that correcting a transplant generally costs more than getting it right the first time.'],
    ['q' => 'What can scalp micropigmentation do for a bad transplant?',
     'a' => 'It can help in several ways. Pigment reduces the contrast between hair and scalp, which softens the look of thin coverage, disguises donor scarring and blends a hard hairline. Crucially it spends no donor hair, which matters enormously when the donor is the limiting factor. See <a href="/scalp-micropigmentation-in-gurgaon">scalp micropigmentation</a>.'],
    ['q' => 'Do you criticise the previous clinic?',
     'a' => 'No. You will get a factual account of what appears to have been done, what the current constraints are, and what can realistically be improved. Assigning blame does not change your donor supply and it is not what you came for.'],
    ['q' => 'What should I bring to a repair consultation?',
     'a' => 'Whatever documentation you have from the original procedure — the operative note, the graft number, the technique used, and any photographs from before it. Photographs of how your hair looked before the first surgery are especially useful. Bring your medication list as well.'],
    ['q' => 'How much does hair transplant repair cost in Gurgaon?',
     'a' => 'It depends on what is being corrected and how much of it, so it is quoted only after examination. Repair plans are more variable than first-time plans because the constraints differ so much between cases. Our <a href="/hair-transplant-cost-in-gurgaon">cost guide</a> explains the general factors.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair transplant', 'url' => '/hair-transplant-in-gurgaon'],
    ['name' => 'Hair transplant repair in Gurgaon'],
];

$page = [
    'title'       => 'Hair Transplant Repair in Gurgaon: What Can Be Fixed',
    'description' => 'Hair transplant repair in Gurgaon for pluggy grafts, low or straight hairlines, wrong angles and over-harvested donors: what may be possible, and the limits.',
    'url'         => '/hair-transplant-repair-in-gurgaon',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-consultation-768.webp',
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/hair-transplant-repair-in-gurgaon', [
            'name'          => 'Hair Transplant Repair',
            'alternateName' => ['Corrective hair transplant surgery', 'Hair transplant revision', 'Bad hair transplant correction'],
            'procedureType' => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'The existing result and remaining donor supply are assessed first. Correction may involve excision of misplaced or multi-hair grafts from the front of the hairline, redistribution of the excised hair, placement of single-hair grafts to soften a hard transition, grafting into linear or dot donor scarring, and camouflage with scalp pigmentation. Work is frequently staged across more than one session to protect the blood supply of previously operated tissue. Performed as a day case under local anaesthetic.',
            'preparation'   => 'Review of the previous operative record, graft number and technique where available; examination of the transplanted area, the hairline design and the donor region including any over-harvesting or scarring; measurement of remaining donor density; and a minimum interval of approximately twelve months from the previous procedure so the earlier result has fully matured.',
            'followup'      => 'Wash instruction and review in the first week, then scheduled photographic reviews as transplanted hair sheds and regrows, with planning of any further staged session.',
            'expectedPrognosis' => 'Correction generally improves rather than fully reverses an unsatisfactory result, and the degree of improvement is limited by the donor supply remaining after the previous procedure. Donor hair already harvested cannot be replaced. Staged treatment is often required. Outcomes vary between patients and cannot be promised.',
        ]),
        schema_faq('/hair-transplant-repair-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Hair transplant repair in Gurgaon</span>
        <h1 class="h1 mt-3">Hair Transplant Repair, With an Honest Account of the Limits</h1>
        <p class="lead mt-3 measure">A transplant you regret can usually be improved. It can rarely be erased. What decides the difference is not skill or technique — it is how much donor hair the first clinic left you. You will be told which situation you are in before you are asked to commit to anything.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-treatment="Hair transplant" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Remaining donor supply measured first',
            'Realistic ceiling stated before you commit',
            'Staging planned rather than improvised',
            NAP_LOCALITY . ' · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-consultation-768.webp" srcset="/assets/img/services/svc-consultation-512.webp 512w, /assets/img/services/svc-consultation-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a dermatoscope and a notepad on a wooden desk beside a potted fern" width="768" height="960" loading="eager" fetchpriority="high">
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
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Donor measured, not assumed</p><p class="body-s mt-2">What remains decides what is possible.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">A stated ceiling</p><p class="body-s mt-2">You hear the most that can realistically be achieved, in writing.</p></div>
      <div class="card"><?= icon('list', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Staged deliberately</p><p class="body-s mt-2">Operated tissue is not pushed all at once.</p></div>
      <div class="card"><?= icon('shield', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Donor-sparing options first</p><p class="body-s mt-2">Pigment can do what grafts cannot afford to.</p></div>
      <div class="card"><?= icon('info', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">No blame, no theatre</p><p class="body-s mt-2">A factual account of where you stand.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="what-went-wrong">
  <div class="wrap">
    <p class="eyebrow">Diagnosis</p>
    <h2 class="h2 mt-2">What Usually Goes Wrong</h2>
    <p class="body-l mt-3 measure">Unsatisfactory transplants tend to fail in a small number of recognisable ways. Identifying which one applies to you determines what correction is even possible.</p>
    <div class="grid grid--3 mt-5">
      <div class="card"><p class="h4">A hairline placed too low</p><p class="body-s mt-2">Common, and the hardest to undo. Grafts are permanent hair in permanent positions, so raising a line means removing hair, not repositioning it.</p></div>
      <div class="card"><p class="h4">A hard, straight edge</p><p class="body-s mt-2">No transition zone, no irregularity. Correctable by adding single hairs ahead of and between the existing line to break it up and soften it.</p></div>
      <div class="card"><p class="h4">Pluggy or tufted grafts</p><p class="body-s mt-2">Multi-hair grafts placed at the front edge where single hairs belong. Often excised and the hair redistributed. One of the more rewarding repairs.</p></div>
      <div class="card"><p class="h4">Wrong angle or direction</p><p class="body-s mt-2">Hair that stands up or points the wrong way and cannot be styled down. Angle is fixed when the site is made, so correction means removing and re-placing.</p></div>
      <div class="card"><p class="h4">Poor growth</p><p class="body-s mt-2">A session where too much was attempted, or grafts were handled badly. Sometimes correctable by adding density, if the donor can still fund it.</p></div>
      <div class="card"><p class="h4">Donor damage</p><p class="body-s mt-2">A wide strip scar, visible dot scarring, or a donor thinned by over-harvesting. This is the constraint that governs everything else.</p></div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'intro-donor',
    'alt'     => 'a mannequin head seen from behind, with the donor area at the back and sides marked',
    'eyebrow' => 'The governing constraint',
    'title'   => 'Everything Depends on What Donor Hair Is Left',
    'id'      => 'donor',
    'tone'    => 'canvas',
    'html'    => '<p>Repair surgery has no independent supply of hair. Every correction that adds density, softens a hairline or camouflages a scar spends grafts from a donor area that has already been drawn on once, so the first measurement at a repair consultation is of the donor, not the problem.</p>'
               . '<p>If the first procedure used a modest number of grafts and the donor is still healthy, there is real room to work and the improvement can be substantial. If the donor has been heavily harvested, the ceiling drops sharply, and correction becomes about camouflage and redistribution rather than adding volume.</p>'
               . '<p>Donor hair that has been taken out cannot be put back, and no procedure regenerates it. Where a donor has been thinned too far, the honest plan is to reduce the visible contrast, protect what remains with medical treatment, and use the remaining grafts where they buy the most.</p>'
               . '<p><b>Signs the ceiling is lower:</b> a very large graft number already used, visible thinning or patchiness in the donor, extraction clustered in one part of it, or multiple previous procedures. <b>Good signs at assessment:</b></p>',
    'points'  => [
        'A modest graft number used the first time',
        'Donor density still measures well',
        'Extraction spread evenly across the donor',
        'The problem is design rather than volume',
    ],
]) ?>

<section class="section section--white" id="options">
  <div class="wrap">
    <p class="eyebrow">What repair involves</p>
    <h2 class="h2 mt-2">The Tools Available for Correction</h2>
    <p class="body-l mt-3 measure">Most repair plans combine several of these rather than relying on one.</p>
    <div class="grid grid--2 mt-5">
      <div class="card card--pad-lg">
        <p class="h4">Excision and redistribution</p>
        <p class="body-s mt-2">Misplaced or multi-hair grafts are removed from where they do damage — typically the front edge of the hairline. The hair taken out can sometimes be re-implanted elsewhere, so it is not always lost. This is precise, slow work and it is what makes a pluggy hairline correctable.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Softening with single hairs</p>
        <p class="body-s mt-2">Single-hair grafts placed ahead of and between an existing hard line, irregularly, to build the transition zone the first procedure skipped. Frequently the highest-value part of a repair for the graft count it uses.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Grafting into scar tissue</p>
        <p class="body-s mt-2">Hair placed into a linear strip scar or into scarred recipient areas. Survival is lower than in healthy skin because the blood supply is poorer, so it is approached conservatively and often staged.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Adding density</p>
        <p class="body-s mt-2">Where growth from the first procedure was poor and the donor can fund it, further grafts are added into the existing area. Governed entirely by what the donor measurement allows.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Scalp micropigmentation</p>
        <p class="body-s mt-2">Pigment to reduce the contrast between hair and scalp. It disguises donor scarring, makes thin coverage read as denser, and blends a hard hairline — and it costs no donor hair at all, which is why it belongs in most repair plans.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Medical treatment</p>
        <p class="body-s mt-2">Protecting the native hair that remains, including in the donor. It does not correct the previous surgery, but it stops the surrounding picture getting worse while the correction is carried out.</p>
      </div>
    </div>

    <div class="measure mt-6">
      <h3 class="h3" id="problem-by-problem">Can a Bad Hair Transplant Be Fixed? Problem by Problem</h3>
      <p class="body mt-3">Repair is judged one problem at a time, and most cases involve more than one. This is what correction can usually offer for each, and what holds it back.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data data--fit">
          <caption class="sr-only">Common problems after a hair transplant, what repair may be able to do for each, and the limit on it — a general guide, not a promise of any result</caption>
          <thead><tr><th scope="col">Problem found</th><th scope="col">What may be possible</th><th scope="col">The limit</th></tr></thead>
          <tbody>
            <?php foreach ($repairRows as $r): ?>
            <tr><th scope="row" style="white-space:normal;width:28%"><?= e($r[0]) ?></th><td><?= e($r[1]) ?></td><td><?= e($r[2]) ?></td></tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure"><a href="/blog/hair-transplant-repair-options">Hair transplant repair options</a> goes through each approach in more detail, and <a href="/scalp-micropigmentation-in-gurgaon">scalp micropigmentation in Gurgaon</a> explains what pigment can and cannot hide.</p>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'The process',
    'title'   => 'How a Repair Case Is Handled',
    'id'      => 'journey',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-plan',      'alt' => 'a tablet showing a head diagram beside a sheet of paper',  'title' => 'Assessment and a stated ceiling', 'text' => 'The previous record where you have it, examination of the transplanted area and the donor, and direct measurement of the donor density that remains. Then what can realistically be achieved, written down along with what cannot — if the honest answer is limited improvement, that is what you are told.'],
        ['img' => 'step-followup',  'alt' => 'a desk calendar with dates circled',                       'title' => 'A staged plan',                   'text' => 'Usually more than one session, sequenced so previously operated tissue is not pushed too hard at once. The stages are agreed before the first one.'],
        ['img' => 'step-procedure', 'alt' => 'sterile hair-restoration instruments laid out on a tray',  'title' => 'Correction and review',           'text' => 'Surgery, then the usual shedding and regrowth timeline, with photographic review before any further stage is confirmed.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-follicle',
    'alt'     => 'a sculpted cross-section of scalp showing hair follicles beneath the skin',
    'eyebrow' => 'Timing',
    'title'   => 'Why We Usually Ask You to Wait a Year',
    'id'      => 'timing',
    'reverse' => true,
    'html'    => '<p>People often arrive for repair consultations at six months, convinced the result is final. Often it is not: a transplant is not mature until roughly twelve months, and hair that looks thin and patchy at six months can be substantially better at twelve.</p>'
               . '<p>Operating early risks correcting a result that was still improving, and working into scalp that has not fully recovered from the first procedure. Grossly misplaced grafts or an obviously wrong hairline position do not improve with time and are assessed on their own terms; where the complaint is density or patchiness, waiting is usually the correct clinical advice.</p>'
               . '<p>If you are inside that window, come in anyway: an assessment tells you whether you are looking at a genuine problem or an incomplete result. Worth reading first: <a href="/blog/hair-transplant-growth-timeline-month-by-month">the month-by-month growth timeline</a> and <a href="/hairline-transplant-in-gurgaon">why hairline position and transition matter</a>.</p>'
               . '<p><b>Bring with you:</b></p>',
    'points'  => [
        'The operative note from the first procedure',
        'The graft number and technique used',
        'Photographs from before the first surgery',
        'Your current medication list',
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
        <h2 class="h2 mt-2">Hair Transplant Repair Cost in Gurgaon</h2>
        <p class="body mt-3 measure">Repair is quoted only after examination, and repair estimates vary more between patients than first-time ones do, because the constraints differ so much from case to case.</p>
        <div class="grid grid--2 mt-5">
          <div class="card"><p class="h4">What is being corrected</p><p class="body-s mt-2">Softening a line differs greatly from rebuilding density</p></div>
          <div class="card"><p class="h4">Excision work required</p><p class="body-s mt-2">Removing and redistributing grafts is slow, precise work</p></div>
          <div class="card"><p class="h4">Grafts available</p><p class="body-s mt-2">Governed by the donor left after the first procedure</p></div>
          <div class="card"><p class="h4">Number of stages</p><p class="body-s mt-2">Repair is staged more often than a first transplant</p></div>
          <div class="card"><p class="h4">Scarred tissue involved</p><p class="body-s mt-2">Grafting into scar is slower and less predictable</p></div>
          <div class="card"><p class="h4">Pigmentation alongside</p><p class="body-s mt-2">Often part of the plan, and priced separately</p></div>
        </div>
        <p class="body-s mt-4 measure">Correcting a transplant generally costs more than getting it right the first time, because the same number of grafts takes longer to place well in a field that has already been operated on.</p>
        <p class="body mt-3 measure">See the <a href="/hair-transplant-cost-in-gurgaon">general cost guide</a> and <a href="/cost-and-emi-options">payment and EMI options</a>. If you know how many grafts the first procedure used, the <a href="/hair-transplant-graft-calculator">hair transplant graft calculator</a> shows the range commonly cited for your pattern, which helps frame the question of what is left.</p>
        <div class="card card--pad-lg mt-5">
          <h3 class="h4">Questions worth asking any clinic about a repair</h3>
          <p class="body-s mt-2">They apply wherever you go, including here.</p>
          <div class="mt-3"><?= ticks([
              'How much donor hair do I have left, and how was it measured?',
              'What is the most this plan can realistically achieve, in writing?',
              'How many stages are planned, and how far apart?',
              'Will any grafts be removed, and can that hair be re-used?',
              'Would pigment do more for me than further grafts?',
          ], false) ?></div>
        </div>
      </div>
      <div class="cta-band" style="display:block">
        <h3 class="h3">Send Photos for an Initial View</h3>
        <p class="body mt-3">Photograph the hairline in daylight from the front and from each side, the top of the head, and the donor area at the back with the hair lifted. Add your operative note if you have it.</p>
        <a class="btn btn--block btn--accent mt-5" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Send photos on WhatsApp</a>
        <a class="btn btn--block btn--ghost mt-3" href="/book-consultation" data-book data-treatment="Hair transplant" data-track="book">Book a repair consultation</a>
        <p class="body-s mt-4">Your details are used only to arrange your consultation.</p>
      </div>
    </div>
  </div>
</section>

<?= local_block(
    'Corrective Hair Restoration at Our Gurgaon Clinic',
    'Our Gurugram clinic is in Sector 39, ' . NAP_LANDMARK . ', where consultations and procedures are carried out by registered medical practitioners.'
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Hair Transplant Repair FAQs</h2>
        <p class="body-s mt-3">Answers are general patient education. What is achievable in your case depends on your remaining donor supply and is answered only after examination.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= awards_certificates_section() ?>

<?= lp_cta([
    'eyebrow'   => 'Sector 39, Gurugram',
    'title'     => 'Find Out What Can Realistically Be Improved',
    'text'      => 'Bring your operative note and any photographs from before the first procedure. You will get your remaining donor supply measured, a factual account of what went wrong, and a written plan with a realistic ceiling rather than a promise.',
    'treatment' => 'Hair transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
