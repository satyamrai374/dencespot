<?php
/**
 * /fue-hair-transplant-in-gurgaon — page #17.
 *
 * Technique spoke off /hair-transplant-in-gurgaon. Content ported from the
 * design build.
 *
 * Cannibalisation split: the hub owns "hair transplant in Gurgaon"; this page
 * owns "FUE hair transplant in Gurgaon" and the donor-supply questions that
 * come with it. Cost detail stays on /hair-transplant-cost-in-gurgaon — the
 * section here explains what moves the number and links across.
 *
 * The page is built around donor arithmetic and the graft-versus-hair
 * distinction, which is where quotes in this market become incomparable.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

// "Is FUE right for you?" reference table: [situation, usual answer, reason].
// General patient education only; the examination decides.
$fueFitRows = [
    ['Recession at the front or temples that has slowed down', 'Often suits', 'The line can be planned against a pattern that is no longer changing quickly, with grafts held back for later loss.'],
    ['Loss that is still speeding up, often in the early twenties', 'Usually not yet', 'Medical treatment is tried first, so grafts are not placed in front of loss that is still moving.'],
    ['Dense hair at the back and sides', 'Often suits', 'There is room to cover the area that matters most to you and still keep a reserve.'],
    ['Sparse hair at the back and sides', 'Often unsuitable', 'Each extra graft thins the donor further and makes the extraction dots easier to see; donor hair spent cannot be replaced.'],
    ['Thinning spread across the whole scalp, donor included', 'Usually unsuitable', 'Hair taken from a thinning donor tends to keep thinning after it is moved, so the cause is looked for first.'],
    ['Hair at the back worn short or clipped', 'Often suits', 'Dot scars spread evenly are hard to pick out at short lengths, where a strip line would show.'],
    ['The back shaved down to the skin', 'Discuss first', 'Pale dots can show on bare skin; how noticeable they are depends on how many grafts are taken and how widely they are spread.'],
    ['Crown and mid-scalp as well as the front', 'Possible, often staged', 'FUE places grafts efficiently over large areas, but the donor sets the ceiling, so two procedures are common.'],
    ['A strip scar from an earlier FUT procedure', 'Often possible', 'The donor around the line is examined, and grafts can sometimes be set into the scar itself to soften it.'],
    ['Patchy loss from alopecia areata, or a cause such as low iron not yet treated', 'Not yet', 'The cause is diagnosed and treated first, and surgery is reconsidered once things have settled.'],
];

$faqs = [
    ['q' => 'What is an FUE hair transplant?',
     'a' => 'A procedure in which follicular units — natural groupings of one to four hairs — are extracted individually from the donor area with a fine punch and placed into thinning or bald areas at the angle and direction the surrounding hair grows. No strip of skin is removed, so there is no linear scar.'],
    ['q' => 'Does FUE leave scars?',
     'a' => 'It leaves many tiny round scars rather than one line — typically pale dots under a millimetre across, spread across the donor area. Spread properly they are difficult to see even at short hair lengths. Clustered extraction, or too many grafts taken from too small an area, is what makes them visible.'],
    ['q' => 'Do I have to shave my whole head for FUE?',
     'a' => 'The donor area is trimmed short so the punch can follow each follicle accurately. Whether the recipient area is trimmed depends on the case and is discussed at consultation. Unshaven and partially shaved approaches exist but suit smaller sessions; they are slower and not appropriate for every plan.'],
    ['q' => 'How many grafts can be done in one FUE session?',
     'a' => 'It depends on your donor supply, scalp laxity and how you tolerate a long day, not on a headline number. Large sessions are possible where the donor genuinely supports them; where it does not, staging across two procedures protects the donor and generally gives a better long-term result.'],
    ['q' => 'Is FUE painful?',
     'a' => 'The local anaesthetic injections are the uncomfortable part. The procedure itself is not typically painful, though it is long. Soreness, tightness or some swelling for a few days afterwards is normal and managed with prescribed medication.'],
    ['q' => 'How long does an FUE procedure take?',
     'a' => 'It scales with graft numbers. Smaller sessions take a few hours; larger ones run through most of the day with breaks for food and rest. It is a day-case procedure and you go home the same day.'],
    ['q' => 'When will transplanted hair start growing?',
     'a' => 'Transplanted hairs commonly shed within the first weeks while the follicles remain in place. New growth usually begins around three to four months, with a fuller picture at roughly ten to twelve months. Growth is uneven early on, which is normal.'],
    ['q' => 'Is FUE permanent?',
     'a' => 'Transplanted follicles keep the characteristics of the donor area and generally persist. Surrounding non-transplanted hair can continue to thin with age, however, which is why a long-term plan and ongoing medical treatment matter. No clinic can promise a specific density or a permanent outcome.'],
    ['q' => 'What is over-harvesting, and why does it matter?',
     'a' => 'Taking more grafts from the donor than it can spare, or taking them from too concentrated an area. The donor thins visibly, extraction dots become obvious, and there is no way to reverse it — you cannot put donor hair back. It is the reason a graft number should never be inflated to win a quote.'],
    ['q' => 'FUE or DHI — which is better?',
     'a' => 'Neither is universally better; extraction is essentially the same and the difference is in placement. DHI sets each graft with an implanter in a single action, which suits hairlines and detail zones. FUE placement into pre-made sites is more efficient across large areas. Read more about <a href="/dhi-hair-transplant-in-gurgaon">DHI hair transplant</a>.'],
    ['q' => 'Can I have FUE if I had a strip procedure before?',
     'a' => 'Often yes. An existing <a href="/fut-hair-transplant-in-gurgaon">FUT</a> scar does not rule out FUE, though scalp laxity and the state of the donor need assessing, and grafts can sometimes be taken to camouflage the old scar itself. This is decided on examination.'],
    ['q' => 'Can women have FUE?',
     'a' => 'Sometimes. Female hair loss is more often diffuse, and hormonal, thyroid, iron or post-partum causes need investigating and treating first. Many women do better on medical treatment; surgery is considered selectively, for suitable patterns such as a receding frontal line.'],
    ['q' => 'How much does FUE cost in Gurgaon?',
     'a' => 'Cost depends on graft numbers, donor characteristics, session structure and any supporting treatment, so we quote after assessment rather than publishing a headline price. Our <a href="/hair-transplant-cost-in-gurgaon">hair transplant cost guide</a> explains what moves the number, and you receive an itemised written estimate before booking a date.'],
    ['q' => 'What happens at the FUE consultation?',
     'a' => 'History and medication review, scalp and donor examination with density measurement, pattern staging, photographs for your record, and a written plan covering technique, graft number, timeline and cost factors. Bring your medical history and a list of current medicines.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair transplant', 'url' => '/hair-transplant-in-gurgaon'],
    ['name' => 'FUE hair transplant in Gurgaon'],
];

$page = [
    'title'       => 'FUE Hair Transplant in Gurgaon: Process, Recovery & Cost',
    'description' => 'FUE hair transplant in Gurgaon: who it suits, how grafts are taken one at a time, recovery from week one to month twelve, and what moves the cost.',
    'url'         => '/fue-hair-transplant-in-gurgaon',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-procedure-768.webp',
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/fue-hair-transplant-in-gurgaon', [
            'name'          => 'FUE Hair Transplant',
            'alternateName' => ['Follicular unit extraction', 'FUE hair restoration'],
            'procedureType' => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'Individual follicular units are extracted from the donor area of the scalp with a fine punch, sorted and trimmed under magnification, and placed into recipient sites prepared in the planned direction, angle and density across the thinning zones. Performed as a day case under local anaesthetic.',
            'preparation'   => 'Clinical assessment of hair-loss pattern and donor density, review of medication and blood-thinning agents, blood investigations, photographic mapping and a hairline design agreed with the patient before the procedure date.',
            'followup'      => 'Wash instruction and review in the first week, then scheduled photographic reviews as the transplanted hair sheds and regrows.',
            'expectedPrognosis' => 'Transplanted hairs commonly shed within the first weeks; new growth typically begins around three to four months with a fuller result at approximately ten to twelve months. Outcomes vary between patients and cannot be promised.',
        ]),
        schema_faq('/fue-hair-transplant-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">FUE hair transplant in Gurgaon</span>
        <h1 class="h1 mt-3">FUE Hair Transplant in Gurgaon Without a Linear Donor Scar</h1>
        <p class="lead mt-3 measure">FUE takes follicular units out of the donor area one at a time with a fine punch, so there is no strip and no linear scar. It is the technique most pattern hair loss is treated with. What decides whether it works for you is not the technique — it is how much your donor area can safely give.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-treatment="Hair transplant" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'No linear scar — dot healing across the donor',
            'Day-case procedure under local anaesthetic',
            'Donor area mapped before any number is quoted',
            NAP_LOCALITY . ' · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-procedure-768.webp" srcset="/assets/img/services/svc-procedure-512.webp 512w, /assets/img/services/svc-procedure-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: sterile hair-restoration instruments, fine forceps and punch tips, laid out on a green surgical tray" width="768" height="960" loading="eager" fetchpriority="high">
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
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Punch under magnification</p><p class="body-s mt-2">Extraction judged graft by graft, not on autopilot.</p></div>
      <div class="card"><?= icon('shield', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">No linear scar</p><p class="body-s mt-2">Dot healing spread across the donor area.</p></div>
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Donor mapped first</p><p class="body-s mt-2">What can safely be taken is measured, not guessed.</p></div>
      <div class="card"><?= icon('clock', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Home the same day</p><p class="body-s mt-2">Local anaesthetic, day-case, you walk out.</p></div>
      <div class="card"><?= icon('info', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Told if it is too early</p><p class="body-s mt-2">Unstable loss is treated medically before surgery.</p></div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'intro-donor',
    'alt'     => 'a mannequin head seen from behind, with the donor area at the back and sides marked',
    'eyebrow' => 'The basics, plainly',
    'title'   => 'What Is an FUE Hair Transplant?',
    'id'      => 'what-is',
    'tone'    => 'white',
    'html'    => '<p>FUE stands for follicular unit extraction. Hair grows in natural groupings of one to four hairs, called follicular units, and in FUE each unit is removed from the donor area individually with a punch typically well under a millimetre across. Every unit leaves a tiny round opening that heals as a pale dot rather than a line.</p>'
               . '<p>The units are sorted under magnification, kept in a holding solution and placed into recipient sites made in the direction and angle the surrounding hair already grows. Once healed they behave like the hair they came from — washed, cut and styled normally. See <a href="/dhi-hair-transplant-in-gurgaon">how DHI differs</a>.</p>'
               . '<p>The donor area is the whole story. Hair at the back and sides generally resists the hormonal process behind pattern loss, but it is a finite supply that has to last your lifetime, and taking too much thins the donor visibly in a way that cannot be undone. Two people with identical-looking recession can have very different donor density, so nothing sensible can be quoted from a photograph.</p>',
    'points'  => [
        'FUE moves your own donor hair; it does not create new hair',
        'Donor supply, not technique, sets the ceiling on what is achievable',
        'The supply is spent on the areas that matter most to you, in the order the loss progresses',
    ],
    'link'    => ['url' => '/hair-transplant-in-gurgaon', 'label' => 'Hair transplant overview'],
]) ?>

<section class="section section--canvas" id="candidacy">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Suitability</p>
      <h2 class="h2 mt-2">Who FUE Suits</h2>
      <p class="body mt-3">FUE covers the broadest range of cases of the three techniques. These are the presentations it is most often the right answer for — confirmed only after examining your donor area.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card"><?= icon('hairline', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Receding hairline</h3><p class="body-s mt-2">A defined, stable recession with enough donor behind it to rebuild the frontal third and keep something in reserve.</p></div>
      <div class="card"><?= icon('user', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Crown thinning</h3><p class="body-s mt-2">The crown swallows grafts because of the way hair whorls there. It is treatable, but it needs an honest conversation about donor budget first.</p></div>
      <div class="card"><?= icon('list', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Broad coverage in one session</h3><p class="body-s mt-2">Where several zones need work, FUE places grafts efficiently over a large area in a single day.</p></div>
      <div class="card"><?= icon('scale', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Short hairstyles</h3><p class="body-s mt-2">If you wear your hair very short or shave the sides, dot healing conceals far better than a linear scar would.</p></div>
      <div class="card"><?= icon('pencil', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Repair and refinement</h3><p class="body-s mt-2">Softening a hairline that was placed too straight or too low elsewhere, or filling gaps left by an earlier procedure.</p></div>
      <div class="card"><?= icon('doc', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Stable, staged pattern loss</h3><p class="body-s mt-2">Loss that has settled into a recognisable pattern, in someone who understands that surrounding hair keeps thinning.</p></div>
    </div>

    <div class="measure mt-6">
      <h3 class="h3" id="is-fue-right">Is FUE Right for You? Situation by Situation</h3>
      <p class="body mt-3">Most people fit one of a handful of situations. Find the one closest to yours as a starting point; the answer at your assessment can differ once your donor area has been measured.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data data--fit">
          <caption class="sr-only">Common situations and whether FUE usually suits each one, with the reason — a general guide, not a diagnosis</caption>
          <thead><tr><th scope="col">Your situation</th><th scope="col">FUE: the usual answer</th></tr></thead>
          <tbody>
            <?php foreach ($fueFitRows as $r): ?>
            <tr><th scope="row" style="white-space:normal;width:38%"><?= e($r[0]) ?></th><td><b style="color:var(--ink)"><?= e($r[1]) ?>.</b> <?= e($r[2]) ?></td></tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">If the answer is “not yet”, <a href="/hair-fall-treatment-in-gurgaon">hair fall treatment in Gurgaon</a> is usually the place to start, and <a href="/blog/who-should-not-have-a-hair-transplant">who should not have a hair transplant</a> explains the reasoning in more detail.</p>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-follicle',
    'alt'     => 'a sculpted cross-section of scalp skin showing hair follicles and their roots',
    'eyebrow' => 'Read this before comparing quotes',
    'title'   => 'A Graft Is Not a Hair — and That Is Where Quotes Go Wrong',
    'id'      => 'grafts',
    'reverse' => true,
    'tone'    => 'white',
    'html'    => '<p>A <b>graft</b> is one follicular unit, a natural grouping of one to four hairs. It is what gets extracted, what gets placed, and the unit almost every clinic prices in. A <b>hair</b> is a single strand.</p>'
               . '<p>Two thousand grafts might carry roughly 4,000 to 5,000 hairs depending on the donor, which is why some clinics quote hair counts instead. The number looks bigger; the transplant is the same size. This one distinction explains most of the price confusion in the Gurgaon market.</p>'
               . '<p>The cheapest per-graft rate applied to an inflated graft count is more expensive than an honest quote, and it costs donor hair you cannot get back. Three questions make quotes comparable, at any clinic, including this one:</p>',
    'points'  => [
        '“Grafts or hairs?” If one clinic quotes 4,500 and another 2,000, they may be describing the same procedure',
        '“How was that count arrived at?” It should come from a zone-by-zone map of your scalp; a round number offered over the phone is a sales figure, not a plan',
        '“What is left for later?” Pattern loss continues, and a plan that empties the donor now leaves nothing for the recession you will have in ten years',
    ],
]) ?>

<?= lp_highlights([
    'eyebrow' => 'Our approach',
    'title'   => 'How FUE Is Planned at DenceSpot',
    'intro'   => 'Consultations and procedures are carried out by registered medical practitioners at the clinic, and you are told beforehand exactly who does what.',
    'tone'    => 'canvas',
    'items'   => [
        ['icon' => 'layers',   'title' => 'Donor budget, not a sales figure',   'text' => 'Your donor is measured and mapped, and the graft number follows from it. If what you want is not supportable, you are told at the consultation, not on the day.'],
        ['icon' => 'eye',      'title' => 'Hairline drawn on your face',        'text' => 'Position, shape and deliberate irregularity judged against your features, your forehead and your age, not a template traced onto everyone.'],
        ['icon' => 'follicle', 'title' => 'Extraction judged graft by graft',   'text' => 'Punch size and depth adapted to your hair calibre and skin as the session goes on, to keep transection down and the donor looking even.'],
        ['icon' => 'doc',      'title' => 'Written estimate, scheduled reviews', 'text' => 'Graft number, technique and what is included, in writing before you book a date, with nothing added afterwards. Reviews follow at fixed points with standardised photographs.'],
    ],
]) ?>

<?= lp_steps([
    'eyebrow' => 'Start to finish',
    'title'   => 'How an FUE Procedure Works',
    'id'      => 'procedure',
    'intro'   => 'A day case, start to finish. Larger sessions run through most of the day with proper breaks.',
    'tone'    => 'white',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                    'title' => 'Consultation and donor exam', 'text' => 'History, medication review and what you want the result to do. Density, calibre and laxity are measured, the pattern staged and baseline photographs taken.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned hairline', 'title' => 'Graft map and written plan',  'text' => 'A zone-by-zone graft count and a hairline drawn on your face while you sit upright, for you to approve. The written plan covers technique, timeline, cost and what is left in reserve.'],
        ['img' => 'step-procedure',    'alt' => 'sterile hair-restoration instruments laid out on a tray',  'title' => 'Procedure day',               'text' => 'The donor is trimmed short and numbed. Units are extracted one at a time with a punch matched to your hair, spread across the donor, sorted under magnification and placed into sites made at the angle of the surrounding hair.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with review dates circled',               'title' => 'First week and growth reviews', 'text' => 'Home the same day with medication and written aftercare. Washing is taught in person, crusting settles, and shedding, regrowth and density are tracked photographically to twelve months.'],
    ],
]) ?>

<?= doctor_block(
    'Consultations and procedures are carried out by registered medical practitioners at the clinic. The donor assessment matters more than the technique: over-harvesting is the one complication that cannot be revised.'
) ?>

<section class="section section--white" id="recovery">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Recovery &amp; results</p>
      <h2 class="h2 mt-2">What Happens After FUE</h2>
      <p class="body mt-3">A general guide to the phases most patients describe after FUE. Your own timeline is set by your doctor at your reviews.</p>
    </div>
    <div class="grid grid--5 mt-6">
      <div class="card"><span class="pill">Week 1</span><h3 class="h4 mt-3">Crusts and dot healing</h3><p class="body-s mt-2">Small crusts around each graft and pinpoint scabbing across the donor. Washing starts as instructed. Most people return to desk work within a few days.</p></div>
      <div class="card"><span class="pill">Weeks 2–4</span><h3 class="h4 mt-3">Shedding</h3><p class="body-s mt-2">Transplanted hairs commonly fall while the follicles stay put. Expected, and the most misunderstood phase — it is not a failed procedure.</p></div>
      <div class="card"><span class="pill">Months 3–4</span><h3 class="h4 mt-3">New growth</h3><p class="body-s mt-2">Fine new hairs start to appear, unevenly at first and often finer than the final texture. Donor dots have usually faded by now.</p></div>
      <div class="card"><span class="pill">Months 5–9</span><h3 class="h4 mt-3">Density builds</h3><p class="body-s mt-2">Coverage thickens and hair coarsens. This is the stretch where progress is easiest to see between photographs and hardest to judge in the mirror.</p></div>
      <div class="card"><span class="pill">Months 10–12</span><h3 class="h4 mt-3">The real result</h3><p class="body-s mt-2">A fair assessment of what the procedure achieved. Non-transplanted hair keeps thinning on its own schedule, so medical treatment often continues alongside.</p></div>
    </div>
    <div class="grid grid--2 mt-5">
      <div class="note"><p class="h4">Before the day</p><div class="mt-2"><?= ticks([
          'Bring your full medication list, including supplements.',
          'Stop alcohol and avoid blood thinners as instructed.',
          'Eat a proper breakfast — it is a long day.',
          'Wear a shirt that buttons, not something pulled over the head.',
          'Arrange a lift home if you would rather not drive.',
      ], false) ?></div></div>
      <div class="note" style="display:flex;gap:16px;align-items:flex-start">
        <?= icon('info', 20, 'var(--accent-deep)', 1.8) ?>
        <p class="body-s">Individual recovery and growth vary. Transection, healing, donor characteristics and how closely aftercare is followed all affect the outcome. Timelines here are general patient education, not a promise of results, and no clinic can promise a specific density.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">FUE Hair Transplant Cost in Gurgaon</h2>
        <p class="body mt-3 measure">There is no single price for FUE, in Gurgaon or anywhere else. Cost follows the plan and the plan follows the assessment, so we publish the factors rather than a headline figure and give you an itemised estimate in writing.</p>
        <div class="grid grid--2 mt-5">
          <div class="card"><p class="h4">Number of grafts</p><p class="body-s mt-2">Counted from the mapped plan, not estimated</p></div>
          <div class="card"><p class="h4">Hair-loss stage</p><p class="body-s mt-2">How much area needs coverage</p></div>
          <div class="card"><p class="h4">Donor density</p><p class="body-s mt-2">What can safely be harvested</p></div>
          <div class="card"><p class="h4">Session structure</p><p class="body-s mt-2">One session or staged across two</p></div>
          <div class="card"><p class="h4">Hair characteristics</p><p class="body-s mt-2">Calibre, curl and colour contrast all affect coverage</p></div>
          <div class="card"><p class="h4">Supporting treatment</p><p class="body-s mt-2">Medical therapy or PRP running alongside</p></div>
        </div>
        <p class="body-s mt-4 measure">A word of caution about &ldquo;per graft, starting from&rdquo; pricing: a low rate applied to an inflated graft count costs more than an honest quote, and the currency you overspend is donor hair. Ask any clinic how the graft number was arrived at, and what the price includes.</p>
        <p class="body mt-3 measure">Working through the numbers first? See our full <a href="/hair-transplant-cost-in-gurgaon">breakdown of hair transplant cost in Gurgaon</a>, including what changes the per-graft rate. The <a href="/hair-transplant-graft-calculator">hair transplant graft calculator</a> gives a rough range for your pattern of loss; it cannot measure your donor, which is what sets the real number.</p>
      </div>
      <div class="cta-band" style="display:block">
        <h3 class="h3">Get a Personalized Treatment Estimate</h3>
        <p class="body mt-3">Send photos of the front, crown and donor area on WhatsApp, or request a call back. You will get an assessment appointment — not a sales pitch.</p>
        <a class="btn btn--block btn--accent mt-5" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Send photos on WhatsApp</a>
        <a class="btn btn--block btn--ghost mt-3" href="/book-consultation" data-book data-treatment="Hair transplant" data-track="book">Request an estimate by form</a>
        <p class="body-s mt-4">Your details are used only to arrange your consultation.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">FUE Hair Transplant FAQs</h2>
        <p class="body-s mt-3">Answers are general patient education. Anything specific to your donor area or your medical history is answered at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= before_after_slider_section() ?>

<?= awards_certificates_section() ?>

<?= local_block(
    'FUE Hair Transplant at Our Gurgaon Clinic',
    'Consultations, procedures and follow-up reviews are carried out by registered medical practitioners at our Sector 39 clinic in Gurugram.'
) ?>

<?= lp_cta([
    'eyebrow'   => 'Sector 39, Gurugram',
    'title'     => 'Find Out What Your Donor Area Can Actually Support',
    'text'      => 'Bring your questions and your medication list. You will get a donor assessment, an honest view of whether FUE is right for your pattern of loss, and a written plan with a mapped graft number if it is — with no pressure to book a date on the day.',
    'treatment' => 'Hair transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
