<?php
/**
 * /hair-transplant-aftercare — Phase 1, COMPETITOR-STRATEGY §4.
 *
 * Two reasons this page exists ahead of the rest of the roadmap:
 *
 * 1. It is linked from the footer on every page of the site, so while it 404s
 *    all 29 pages link twice into a dead end.
 * 2. Recovery, washing and shedding are high-volume informational queries that
 *    none of the six competitors analysed cover in any depth. Uncontested.
 *
 * Clinical content is deliberately conservative: standard post-operative
 * patient education, no clinic-specific claim that has not been signed off.
 * Anything set by the clinic's own protocol is deferred to the written
 * discharge instructions rather than asserted here.
 *
 * 14 Oct 2026 — landing-page layout: AI-illustrated hero, two lp_split
 * sections, the timeline summarised as lp_steps (the phase table stays) and an
 * lp_cta close, each image with its visible AI label. Presents both clinics.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/**
 * Recovery phases. General patient education — the timeline any individual
 * follows is the one given in their own discharge instructions.
 */
$phases = [
    [
        'when'  => 'Day 0 – 2',
        'title' => 'The critical window',
        'what'  => 'Grafts are held only by early clot formation and are genuinely dislodgeable. Swelling of the forehead is common and peaks around day three. Sleep propped up.',
        'do'    => 'Sleep at 45°, saline spray as instructed, take prescribed medication',
        'avoid' => 'Touching or scratching the recipient area, bending, any exertion',
    ],
    [
        'when'  => 'Day 3 – 5',
        'title' => 'First wash',
        'what'  => 'Crusting forms around each graft. The first wash is usually done at the clinic or demonstrated to you, because technique matters more here than at any other point in recovery.',
        'do'    => 'Wash exactly as demonstrated, keep swelling elevated',
        'avoid' => 'Direct shower pressure on the recipient area, rubbing, picking crusts',
    ],
    [
        'when'  => 'Day 6 – 10',
        'title' => 'Crusts clear',
        'what'  => 'Crusting lifts gradually with gentle washing. Most people are comfortable returning to desk work within this window. The donor area is typically settling by now.',
        'do'    => 'Continue daily gentle washing, resume light routine',
        'avoid' => 'Gym, swimming, hats that grip, sun on the recipient area',
    ],
    [
        'when'  => 'Week 2 – 4',
        'title' => 'Shedding phase',
        'what'  => 'Transplanted shafts shed. This is expected and is not graft loss — the follicle stays and re-enters a growth cycle. It is the point at which most patients worry, and the point at which nothing has gone wrong.',
        'do'    => 'Keep to the follow-up schedule, photograph progress',
        'avoid' => 'Judging the result, starting anything not agreed with the doctor',
    ],
    [
        'when'  => 'Month 2 – 4',
        'title' => 'The quiet months',
        'what'  => 'Little visible change. Follicles are in a resting phase before regrowth. Some patients see temporary thinning of surrounding native hair, which recovers.',
        'do'    => 'Continue any prescribed supporting therapy',
        'avoid' => 'Comparing yourself to other people\'s month-three photographs',
    ],
    [
        'when'  => 'Month 4 – 8',
        'title' => 'Growth becomes visible',
        'what'  => 'New hair emerges, initially fine and often lighter in colour. It thickens and takes on normal texture over the following months. Density builds unevenly at first.',
        'do'    => 'Attend reviews, normal grooming and styling',
        'avoid' => 'Assessing final density — it is not there yet',
    ],
    [
        'when'  => 'Month 9 – 15',
        'title' => 'Final result',
        'what'  => 'Density and calibre mature. The crown typically lags the hairline by several months. Where a second staged session was planned, it is assessed around this point.',
        'do'    => 'Twelve-month review with same-angle photography',
        'avoid' => '—',
    ],
];

/** Restrictions with realistic timings. Confirm against the clinic's own protocol. */
$restrictions = [
    ['item' => 'Touching the recipient area',     'when' => 'Until told otherwise, typically ~10 days'],
    ['item' => 'Hair washing',                    'when' => 'First wash as directed, usually day 3 – 5'],
    ['item' => 'Desk work / return to office',    'when' => 'Commonly 5 – 10 days, depending on visibility'],
    ['item' => 'Driving',                         'when' => 'Once off any sedating medication'],
    ['item' => 'Gym, running, heavy lifting',     'when' => 'Usually around 3 – 4 weeks'],
    ['item' => 'Swimming — pool or sea',          'when' => 'Usually around 4 weeks'],
    ['item' => 'Alcohol',                         'when' => 'Avoid for the first several days'],
    ['item' => 'Smoking',                         'when' => 'Avoid — it impairs healing and graft perfusion'],
    ['item' => 'Direct sun on the recipient area','when' => 'Cover or shade for the first few weeks'],
    ['item' => 'Hats and helmets',                'when' => 'Only loose-fitting, and only once cleared'],
    ['item' => 'Hair colour, chemical treatment', 'when' => 'Typically deferred around 4 weeks or more'],
    ['item' => 'Clippers or razor on the recipient area', 'when' => 'Scissors only until cleared; discuss at review'],
];

$warnings = [
    'Fever, or spreading redness and warmth around the grafts',
    'Pus, or discharge with an odour, from either area',
    'Pain that increases after the first few days rather than settling',
    'Bleeding that does not stop with ten minutes of gentle pressure',
    'Swelling that spreads or does not begin to settle after about day four',
    'A graft that has visibly come away',
];

$faqs = [
    [
        'q' => 'How long does recovery from a hair transplant take?',
        'a' => 'There are two separate timelines and confusing them causes most of the anxiety. <b>Social recovery</b> — looking unremarkable to other people — is generally around 10 to 14 days once crusting has cleared. <b>Cosmetic result</b> takes far longer: visible growth from roughly month four, and mature density between nine and fifteen months, with the crown usually the last area to fill in.',
    ],
    [
        'q' => 'When can I wash my hair after a hair transplant?',
        'a' => 'The first wash is normally around day three to five, and it is either done at the clinic or demonstrated to you first. It is not a normal shower. Water is poured or gently cupped over the recipient area rather than sprayed at it, shampoo is applied diluted and by dabbing rather than rubbing, and nothing is scrubbed. Follow the instructions you were given rather than a video from a different clinic — protocols legitimately differ.',
    ],
    [
        'q' => 'Why is my transplanted hair falling out?',
        'a' => 'Because it is supposed to. Between roughly week two and week six, the transplanted shafts shed while the follicle remains in place and enters a resting phase before regrowth. This is called shedding or effluvium and it is an expected part of the process, not a failed transplant. It is one of the commonest reasons patients contact the clinic, and at this stage it is usually part of normal recovery.',
    ],
    [
        'q' => 'What is shock loss?',
        'a' => 'Temporary shedding of existing native hair around the treated area, caused by the trauma of surgery. It typically recovers over the following months. It is more noticeable in patients who still had significant native hair in the recipient zone, and it is worth expecting rather than being surprised by. Discuss it before the procedure if the recipient area still has meaningful coverage.',
    ],
    [
        'q' => 'When can I go back to the gym?',
        'a' => 'Usually around three to four weeks for full training, with light walking much earlier. The concern is raised blood pressure and sweating over healing grafts, plus anything that risks knocking the recipient area. Contact sport and anything involving a helmet needs specific clearance. Your own timeline is set at your follow-up, not by a general guide.',
    ],
    [
        'q' => 'How should I sleep after a hair transplant?',
        'a' => 'Propped up at roughly 45 degrees for the first few nights, using extra pillows or a recliner. This reduces forehead swelling, which is the most common visible after-effect and peaks around day three. Sleep on your back and keep the recipient area off the pillow. Many patients use a travel pillow to stop themselves rolling over.',
    ],
    [
        'q' => 'When will I see results?',
        'a' => 'Expect very little for the first three months — that is normal and not a sign of failure. New growth generally becomes visible from around month four, arrives fine and often lighter in colour, and thickens over the following months. Most of the change happens between months six and twelve, and the crown typically trails the hairline by several months.',
    ],
    [
        'q' => 'Will there be scars?',
        'a' => 'Every surgical technique leaves some mark. FUE and DHI leave small punctate marks across the donor area that are generally not visible at normal hair length, though they can show if the head is shaved very short. FUT leaves a linear scar along the donor strip, concealed at moderate hair length. Healing varies between individuals, and anyone with a history of keloid or hypertrophic scarring should raise it before booking.',
    ],
    [
        'q' => 'Can I wear a hat after a hair transplant?',
        'a' => 'Not immediately, and not a tight one. Anything that grips, rubs or is pulled on and off over the recipient area risks dislodging grafts in the early period. Once cleared — commonly around ten days, though confirm with the clinic — a loose hat that sits without contact on the grafts is generally acceptable, and is a reasonable way to manage sun exposure.',
    ],
    [
        'q' => 'When can I cut my hair?',
        'a' => 'Scissors over the recipient area are usually acceptable once healing is complete, but clippers and razors need clearance because of the risk to grafts that are still settling. The donor area is generally more forgiving and can often be trimmed sooner. Ask at your follow-up rather than assuming — it depends on how your healing has progressed.',
    ],
    [
        'q' => 'Do I need to take medication after the procedure?',
        'a' => 'Most patients are prescribed a short course covering pain relief, swelling and infection risk, plus specific washing instructions. Some are also advised on longer-term supporting therapy — such as topical or oral treatment — to protect the native hair that was <i>not</i> transplanted. That is a separate clinical decision, discussed on its own merits, and it is not compulsory.',
    ],
    [
        'q' => 'What if the result looks uneven?',
        'a' => 'Density genuinely does arrive unevenly, and an area that looks patchy at month six frequently fills by month twelve. That is why assessment happens at the twelve-month review with same-angle, same-lighting photography rather than in a bathroom mirror at month five. If density is still short of plan at that review, what happens next should already be written into your original plan.',
    ],
    [
        'q' => 'When should I contact the clinic urgently?',
        'a' => 'Fever, spreading redness or warmth, pus or discharge with an odour, pain that worsens after the first few days instead of settling, bleeding that will not stop with ten minutes of gentle pressure, or swelling that spreads rather than settling after around day four. These are uncommon, but none of them should be waited out. Call rather than message.',
    ],
    [
        'q' => 'How many follow-ups will I have?',
        'a' => 'Reviews are scheduled from the start and run through the first year, because that is the period over which the result actually forms. Progress photography is taken at the same angle and lighting each time so change is measured rather than guessed at. Follow-up is included in your estimate — see <a href="/hair-transplant-cost-in-gurgaon">hair transplant cost in Gurgaon</a>.',
    ],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair transplant', 'url' => '/hair-transplant-in-gurgaon'],
    ['name' => 'Recovery & aftercare'],
];

$page = [
    'title'       => 'Hair Transplant Aftercare in Gurgaon | DenceSpot Clinic',
    'description' => 'Day-by-day hair transplant recovery: first wash, sleeping position, the shedding phase, what to avoid and for how long, and when results appear.',
    'url'         => '/hair-transplant-aftercare',
    'nav_active'  => '/hair-transplant-in-gurgaon',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-followup-768.webp',
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_faq('/hair-transplant-aftercare', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Recovery guidance</span>
        <h1 class="h1 mt-3">Hair Transplant Aftercare &amp; Recovery in Gurgaon</h1>

        <p class="lead mt-3 measure">Two timelines run at once after a hair transplant, and confusing them is what causes most of the worry. <b>Looking normal again</b> takes about ten to fourteen days. <b>Seeing the result</b> takes nine to fifteen months. Almost everything patients panic about happens in the gap between the two.</p>

        <p class="body mt-3 measure">This page sets out what happens week by week, how the first wash is done, why transplanted hair falls out around week three, what to avoid and for how long, and the specific signs that mean you should call the clinic rather than wait.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="#the-recovery-timeline"><?= icon('clock', 18) ?> See the Timeline</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Ask a Recovery Question</a>
        </div>

        <?= ticks([
            'Written aftercare instructions before you leave',
            'First wash demonstrated, not just described',
            'Follow-up reviews scheduled through the first year',
            'A number to call if something concerns you',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-followup-768.webp" srcset="/assets/img/services/svc-followup-512.webp 512w, /assets/img/services/svc-followup-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a desk calendar with several dates circled, beside a pen and a small plant" width="768" height="960" loading="eager" fetchpriority="high">
          <?= hp_ai_chip('AI-generated illustration') ?>
        </div>
        <?= hero_review_badge() ?>
      </div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'intro-recipient',
    'alt'     => 'a mannequin head seen from the front, with short hair and a planned hairline drawn in pencil',
    'id'      => 'the-only-part-that-is-genuinely-fragile',
    'eyebrow' => 'The first 48 hours',
    'title'   => 'The Only Part That Is Genuinely Fragile',
    'html'    => '<p>For the first two days, grafts are held in place by nothing more than early clot formation, and a pillow, a towel, a hat pulled off carelessly or scratching in your sleep can dislodge them. After roughly ten days they are secure. Everything restrictive about early aftercare exists to cover that first window.</p>'
               . '<p><b>Swelling is not a complication.</b> Forehead and occasionally around-the-eye swelling is common from about day two, peaks near day three and settles over the following few days. Sleeping elevated and cold compresses <i>on the forehead — never on the grafts</i> are the usual measures. Swelling that spreads or is still worsening after around day four is different, and warrants a call.</p>',
    'points'  => [
        'Sleep propped up at roughly 45 degrees, on your back, for the first few nights — the most effective way to limit forehead swelling.',
        'Do not touch: no scratching, rubbing or checking with your fingertips. Itching is managed with the saline spray you are given.',
        'Keep it boring: no exertion, no bending at the waist, no alcohol, no smoking. Raised blood pressure over fresh grafts is the thing to avoid.',
    ],
]) ?>

<?= lp_steps([
    'eyebrow' => 'Week by week',
    'title'   => 'The Recovery Timeline',
    'id'      => 'the-recovery-timeline',
    'intro'   => 'Hair transplant recovery runs over roughly twelve months. Looking normal again takes about ten to fourteen days; the result is judged at ten to twelve months.',
    'steps'   => [
        ['img' => 'step-procedure',    'alt' => 'sterile hair-restoration instruments laid out on a tray',              'title' => 'Days 0–14: protect the grafts', 'text' => 'The grafts are fragile for the first two to five days. The first wash comes around day three to five, and crusting settles across the first one to two weeks.'],
        ['img' => 'hero',              'alt' => 'a sculpted cross-section of scalp skin with hair follicles and their roots', 'title' => 'Weeks 2–6: shedding',          'text' => 'The transplanted hairs shed. This is expected and not a failure: the follicle stays in place and rests before it regrows.'],
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                                  'title' => 'Months 2–6: quiet, then growth', 'text' => 'Little visible change between months two and four. New growth becomes obvious from months four to six, fine at first and thickening over the following months.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned hairline',               'title' => 'Months 10–12: judging the result', 'text' => 'The result is judged at ten to twelve months, at a review with same-angle photography. The crown typically lags the hairline by several months.'],
    ],
]) ?>

<section class="section section--white" id="timeline">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Phase by phase</p>
      <h2 id="what-happens-in-each-phase" class="h2 mt-2">What Happens in Each Phase, and What to Avoid</h2>
      <p class="body mt-3">The detail for each phase is below. Most desk workers are back at work within three to five days. General patient education: your own instructions take priority over anything on this page — protocols legitimately differ between clinics, and yours is written for your procedure.</p>
    </div>

    <div class="card card--pad-lg mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data">
          <caption class="sr-only">Hair transplant recovery timeline by phase, with what happens and what to avoid</caption>
          <thead>
            <tr>
              <th scope="col">When</th>
              <th scope="col">Phase</th>
              <th scope="col">What is happening</th>
              <th scope="col">Avoid</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($phases as $row): ?>
            <tr>
              <th scope="row"><?= e($row['when']) ?></th>
              <td style="font-weight:600;color:var(--ink)"><?= e($row['title']) ?></td>
              <td><?= e($row['what']) ?></td>
              <td><?= e($row['avoid']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="note note--tint mt-4">
      <p class="body-s"><b>Month three is where people give up hope.</b> There is genuinely almost nothing to see between roughly month two and month four — the follicles are resting before they regrow. This is the window in which patients most often worry that the procedure has failed, and little visible growth is expected yet. Judge the result at twelve months, from photographs, not in a mirror at week fourteen. The <a href="/blog/hair-transplant-growth-timeline-month-by-month">month-by-month growth timeline</a> sets out what is typical at each stage.</p>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-hair-fall',
    'alt'     => 'a wooden comb resting on folded white towels',
    'id'      => 'how-to-wash-your-hair-after-a-hair-transplant',
    'eyebrow' => 'The first wash',
    'title'   => 'How to Wash Your Hair After a Hair Transplant',
    'tone'    => 'canvas',
    'reverse' => true,
    'html'    => '<p>The first wash is usually around day three to five, and at DenceSpot it is either done at the clinic or demonstrated to you before you attempt it yourself. It is the step most often got wrong at home, because the instinct is to treat it like a normal shower.</p>'
               . '<p><b>Why technique matters.</b> Between day three and day ten the graft is anchored but not yet secure. Mechanical force — shower pressure, fingertip friction, a picked crust, a towel rubbed across the recipient area — is the realistic way a graft is lost at this stage; infection is rare. The cost of getting it wrong is measured in grafts you have <a href="/hair-transplant-cost-in-gurgaon">already paid for</a>.</p>'
               . '<p><b>Your own instructions come first.</b> Your first-wash day, shampoo and spray schedule are set by the clinic’s post-operative protocol and given to you in writing at discharge. Where they differ from this page, follow them, and call the clinic if anything is unclear.</p>',
    'points'  => [
        'Pour, do not spray: water cupped or poured gently over the recipient area, never direct shower pressure.',
        'Dilute the shampoo in a cup and apply it by dabbing with the flat of the hand, not worked in with fingertips.',
        'No rubbing, no circles: downward dabbing only. The donor area can be handled slightly more normally.',
        'Pat dry or air dry: no rubbing, and no hairdryer heat on the grafts.',
        'Wash gently every day once started — it is what lifts crusting safely.',
        'Let crusts go on their own, generally by day ten. Picking one can take the graft with it.',
    ],
]) ?>

<section class="section section--white">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Restrictions</p>
      <h2 id="what-to-avoid-and-for-how-long" class="h2 mt-2">What to Avoid, and For How Long</h2>
      <p class="body mt-3">Realistic timings for the questions patients actually ask. These are general ranges — your own clearance comes at your follow-up reviews, and depends on how your healing has gone.</p>
    </div>

    <div class="card card--pad-lg mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data">
          <caption class="sr-only">Post-operative restrictions after a hair transplant and typical timings</caption>
          <thead>
            <tr><th scope="col">Activity</th><th scope="col">Typical timing</th></tr>
          </thead>
          <tbody>
            <?php foreach ($restrictions as $row): ?>
            <tr>
              <th scope="row" style="white-space:normal"><?= e($row['item']) ?></th>
              <td><?= e($row['when']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="note mt-4">
      <p class="body-s"><b>Smoking is the one worth singling out.</b> It constricts the small vessels that perfuse a newly placed graft, at precisely the point that perfusion decides whether the graft survives. It is the modifiable factor with the clearest bearing on your result, and it is worth stopping well before the procedure rather than only after it.</p>
    </div>
  </div>
</section>

<section class="section section--ink">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Shedding</p>
      <h2 id="why-your-transplanted-hair-falls-out" class="h2 mt-2">Why Your Transplanted Hair Falls Out</h2>
      <p class="body-l mt-3">Somewhere between week two and week six, the hair that was transplanted sheds. Nearly every patient finds this alarming. It is an expected stage of recovery, not a sign of failure.</p>
    </div>

    <div class="grid grid--3 mt-6">
      <div class="card card--ink">
        <span class="journey__num">01</span>
        <p class="h4 mt-2">The shaft goes, the follicle stays</p>
        <p class="meta mt-2">What sheds is the visible hair shaft. The follicle that was transplanted remains in place and enters a resting phase before producing new hair.</p>
      </div>
      <div class="card card--ink">
        <span class="journey__num">02</span>
        <p class="h4 mt-2">It is expected, not a failure</p>
        <p class="meta mt-2">This is a normal part of the transplant cycle and happens to the overwhelming majority of patients. Its absence is not better; its presence is not worse.</p>
      </div>
      <div class="card card--ink">
        <span class="journey__num">03</span>
        <p class="h4 mt-2">Shock loss is separate</p>
        <p class="meta mt-2">Surrounding native hair can also shed temporarily from the trauma of surgery. It typically recovers over the following months, and is more noticeable where native coverage was still good.</p>
      </div>
    </div>

    <p class="body mt-6 measure">If you are in week three, looking at hair on your pillow and wondering whether you have wasted your money: this is the expected part. The useful thing to do is photograph it at the same angle each month and bring the photographs to your review. The <a href="/blog/hair-transplant-growth-timeline-month-by-month">month-by-month growth timeline</a> explains what usually follows.</p>
  </div>
</section>

<section class="section section--canvas">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Warning signs</p>
        <h2 id="when-to-call-the-clinic" class="h2 mt-2">When to Call the Clinic</h2>
        <p class="body mt-3 measure">Complications after a hair transplant are uncommon. These are the specific signs that should not be waited out — if any of them appear, telephone the clinic rather than sending a message and waiting for a reply.</p>

        <ul class="stack-sm mt-5">
          <?php foreach ($warnings as $w): ?>
          <li class="card"><?= icon('shield', 20, 'var(--accent-deep)', 2.2) ?><p class="body-s mt-2"><?= e($w) ?></p></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div>
        <div class="card card--pad-lg">
          <?= icon('phone', 24, 'var(--accent-deep)') ?>
          <p class="h3 mt-2">Reach the clinic</p>
          <p class="body-s mt-3">For anything on this list, call. For routine questions during recovery — itching, a crust, whether you can wear a hat — WhatsApp is usually the fastest route.</p>
          <div class="btn-row mt-4">
            <a class="btn btn--ink" href="tel:<?= e(PHONE_E164) ?>" data-track="call"><?= icon('phone', 17) ?> <?= e(PHONE_DISPLAY) ?></a>
          </div>
          <a class="btn btn--outline btn--sm mt-3" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 17) ?> WhatsApp the clinic</a>
          <p class="meta mt-4"><?= e(HOURS_DISPLAY) ?><br><?= e(HOURS_NOTE) ?></p>
          <p class="meta mt-2">Our Rohini, Delhi clinic can also be reached on <a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a>.</p>
        </div>

        <div class="card card--tint card--pad-lg mt-4">
          <?= icon('calendar', 24, 'var(--accent-deep)') ?>
          <p class="h3 mt-2">Your follow-up schedule</p>
          <p class="body-s mt-2">Reviews are scheduled from the start and run through the first year, because that is the period over which the result forms. Progress photography is taken at the same angle and lighting each time, so change is measured rather than guessed at.</p>
          <a class="btn btn--outline btn--sm mt-3" href="/hair-transplant-in-gurgaon">The full treatment journey</a>
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
        <h2 id="recovery-questions-answered" class="h2 mt-2">Recovery Questions, Answered</h2>
        <p class="body-s mt-3">General patient education. Your own post-operative instructions take priority over anything here.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= doctor_block(
    'Consultations, procedures and follow-up reviews are carried out by registered medical practitioners at the clinic. Aftercare instructions are given in writing, and the first wash is demonstrated rather than described.'
) ?>

<?= lp_cta([
    'eyebrow'   => 'Gurugram and Delhi',
    'title'     => 'Questions About Your Recovery?',
    'text'      => 'Whether you are three days post-procedure or three months in and worried nothing is happening, send a photo on WhatsApp or call the clinic. Recovery questions are answered by a doctor at the clinic.',
    'treatment' => 'Hair transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
