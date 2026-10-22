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
     'a' => 'Transplanted follicles keep the characteristics of the donor area and generally persist. Surrounding non-transplanted hair can continue to thin with age, however, which is why a long-term plan and ongoing medical treatment matter. No clinic can guarantee a specific density or a permanent outcome.'],
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
    'title'       => 'FUE Hair Transplant in Gurgaon | DenceSpot Clinic',
    'description' => 'Doctor-performed FUE hair transplant in Gurgaon. Units extracted one at a time, no linear scar, and the donor area mapped before any graft count is quoted.',
    'url'         => '/fue-hair-transplant-in-gurgaon',
    'crumbs'      => $crumbs,
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
            'expectedPrognosis' => 'Transplanted hairs commonly shed within the first weeks; new growth typically begins around three to four months with a fuller result at approximately ten to twelve months. Outcomes vary between patients and are not guaranteed.',
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
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
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
        <div class="media ratio-4-5 media--shadow"><img src="/assets/img/clinic-equipment.jpg" alt="Motorised follicular-unit extraction handpiece and trolley unit at DenceSpot Clinic, Gurugram" width="800" height="1000" loading="eager"></div>
        <div class="hero__badge-card">
          <p class="eyebrow">Performed &amp; reviewed by</p>
          <p class="h4 mt-2"><?= e(doctor_name()) ?></p>
          <p class="body-s mt-1"><?= e(doctor_credit()) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

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

<section class="section section--canvas" id="what-is">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">The basics, plainly</p>
        <h2 class="h2 mt-2">What Is an FUE Hair Transplant?</h2>
        <p class="body-l mt-3 measure">FUE stands for follicular unit extraction. Hair does not grow as single strands but in natural groupings of one to four hairs, called follicular units. In FUE, each of those units is removed from the donor area individually, using a punch typically well under a millimetre across, and every unit leaves a tiny round opening that heals as a pale dot rather than a line.</p>
        <p class="body-l mt-3 measure">Those units are then sorted under magnification, kept in a holding solution, and placed into recipient sites made across the thinning area in the direction and angle the surrounding hair already grows. Once healed they behave exactly like the hair they came from — washed, cut and styled normally.</p>
        <p class="body-l mt-3 measure">The donor area is the whole story. Hair at the back and sides of the scalp is generally resistant to the hormonal process behind pattern loss, which is why it is used, but it is a finite supply that has to last your lifetime. Take too much and the donor thins visibly, which cannot be undone. A responsible plan spends that supply across the areas that matter most to you, in the order that makes sense as the loss progresses.</p>
        <p class="body-l mt-3 measure">This is why nothing sensible can be quoted from a photograph. Two people with identical-looking recession can have completely different donor density, and the plans that follow are not comparable.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--ghost" href="/hair-transplant-in-gurgaon">Hair transplant overview</a>
          <a class="btn btn--ghost" href="/dhi-hair-transplant-in-gurgaon">How DHI differs</a>
        </div>
      </div>
      <div>
        <div class="media ratio-4-3 media--shadow"><img src="/assets/img/clinic-equipment.jpg" alt="Motorised follicular-unit extraction handpiece and trolley unit at DenceSpot Clinic, Gurugram" width="800" height="600" loading="lazy"></div>
        <div class="card card--tint mt-4">
          <p class="eyebrow">In one line</p>
          <p class="body mt-2">FUE moves your own permanent hair; it does not create new hair. Donor supply, not technique, sets the ceiling on what is achievable.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="candidacy">
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
  </div>
</section>

<section class="section section--canvas" id="grafts">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Read this before comparing quotes</p>
      <h2 class="h2 mt-2">A Graft Is Not a Hair — and That Is Where Quotes Go Wrong</h2>
      <p class="body mt-3">This one distinction explains most of the price confusion in the Gurgaon market. It is worth two minutes.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="card card--pad-lg">
        <h3 class="h3">Graft</h3>
        <p class="body mt-3">One follicular unit — a natural grouping that contains anywhere from one to four hairs. It is what gets extracted and what gets placed. It is also the unit almost every clinic prices in.</p>
      </div>
      <div class="card card--pad-lg">
        <h3 class="h3">Hair</h3>
        <p class="body mt-3">A single strand. Two thousand grafts might carry anywhere from roughly 4,000 to 5,000 hairs depending on the donor — which is why some clinics quote hair counts instead. The number looks bigger. The transplant is the same size.</p>
      </div>
    </div>
    <div class="card card--ink mt-4">
      <h3 class="h3">Three questions that make quotes comparable</h3>
      <div class="grid grid--3 mt-4">
        <div>
          <p class="h4">&ldquo;Grafts or hairs?&rdquo;</p>
          <p class="body-s mt-2">If one clinic quotes 4,500 and another 2,000, they may be describing the same procedure. Always ask which unit the number is in.</p>
        </div>
        <div>
          <p class="h4">&ldquo;How was that count arrived at?&rdquo;</p>
          <p class="body-s mt-2">A count should come from a zone-by-zone map of your scalp. A round number offered over the phone is a sales figure, not a plan.</p>
        </div>
        <div>
          <p class="h4">&ldquo;What is left for later?&rdquo;</p>
          <p class="body-s mt-2">Pattern loss continues. A plan that empties the donor now leaves nothing for the recession you will have in ten years.</p>
        </div>
      </div>
    </div>
    <p class="body-s mt-4 measure">The cheapest per-graft rate applied to an inflated graft count is more expensive than an honest quote, and it costs donor hair you cannot get back. This is the single most useful thing to understand before you speak to any clinic — including this one.</p>
  </div>
</section>

<section class="section section--white" id="why">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Why here</p>
      <h2 class="h2 mt-2">Why Have FUE Done Here?</h2>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--tint"><?= icon('chart', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Donor budget, not a sales figure</h3><p class="body-s mt-2">Your donor is measured and mapped, and the graft number follows from it. If what you want is not supportable by what you have, you are told at the consultation, not on the day.</p></div>
      <div class="card card--tint"><?= icon('hairline', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Hairline drawn on your face</h3><p class="body-s mt-2">Position, shape and deliberate irregularity judged against your features, your forehead and your age — not a template traced onto everyone.</p></div>
      <div class="card card--tint"><?= icon('search', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Extraction judged graft by graft</h3><p class="body-s mt-2">Punch size and depth adapted to your hair calibre and skin as the session goes on, to keep transection down and the donor looking even.</p></div>
      <div class="card card--tint"><?= icon('shield', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Doctor-performed, not delegated</h3><p class="body-s mt-2">The doctor who assessed you does the extraction and site creation. You are told in advance exactly who does what.</p></div>
      <div class="card card--tint"><?= icon('list', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Written, itemised estimate</h3><p class="body-s mt-2">The graft number, the technique, what is included and what is not — in writing, before you book a date. Nothing is added afterwards.</p></div>
      <div class="card card--tint"><?= icon('star', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Reviews that are scheduled</h3><p class="body-s mt-2">Follow-up at fixed points with standardised photographs, so growth is judged against a record rather than memory.</p></div>
    </div>
  </div>
</section>

<section class="section section--ink" id="journey">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Start to finish</p>
      <h2 class="h2 mt-2">Your FUE Journey</h2>
      <p class="body mt-3">Seven stages, in the order you will experience them.</p>
    </div>
    <div class="journey mt-6">
      <div class="card card--ink"><span class="journey__num">1</span><h3 class="h4 mt-2">Consultation</h3><p class="body-s mt-2">History, medication review, and what you actually want the result to do.</p></div>
      <div class="card card--ink"><span class="journey__num">2</span><h3 class="h4 mt-2">Scalp &amp; donor exam</h3><p class="body-s mt-2">Density, calibre and laxity measured; pattern staged; baseline photographs.</p></div>
      <div class="card card--ink"><span class="journey__num">3</span><h3 class="h4 mt-2">Graft mapping</h3><p class="body-s mt-2">Zone-by-zone count and a hairline drawn on your face for you to approve.</p></div>
      <div class="card card--ink"><span class="journey__num">4</span><h3 class="h4 mt-2">Written plan</h3><p class="body-s mt-2">Technique, graft number, timeline, cost and what is left in reserve.</p></div>
      <div class="card card--ink"><span class="journey__num">5</span><h3 class="h4 mt-2">Procedure day</h3><p class="body-s mt-2">Local anaesthetic, extraction, site creation and placement, with breaks.</p></div>
      <div class="card card--ink"><span class="journey__num">6</span><h3 class="h4 mt-2">First-week care</h3><p class="body-s mt-2">Washing taught in person, crusting settles, review before normal life resumes.</p></div>
      <div class="card card--ink"><span class="journey__num">7</span><h3 class="h4 mt-2">Growth reviews</h3><p class="body-s mt-2">Shedding, regrowth and density tracked photographically to twelve months.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="procedure">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">On the day</p>
      <h2 class="h2 mt-2">How an FUE Procedure Works</h2>
      <p class="body mt-3">A day case, start to finish. Larger sessions run through most of the day with proper breaks.</p>
    </div>
    <div class="split split--sidebar mt-6">
      <div class="stack-sm">
        <div class="step"><span class="step-num">1</span><div><h3 class="h3">Design and consent</h3><p class="body-s mt-2">The hairline is drawn while you are sitting upright, checked in a mirror, and agreed before anything else happens. Nothing is redrawn once you are lying down.</p></div></div>
        <div class="step"><span class="step-num">2</span><div><h3 class="h3">Donor preparation</h3><p class="body-s mt-2">The donor area is trimmed to a uniform short length so the punch can follow each follicle accurately, then anaesthetised locally.</p></div></div>
        <div class="step"><span class="step-num">3</span><div><h3 class="h3">Extraction</h3><p class="body-s mt-2">Follicular units are removed one at a time with a fine punch. Punch size is matched to your hair, and the harvest is spread across the donor so density stays even rather than patchy.</p></div></div>
        <div class="step"><span class="step-num">4</span><div><h3 class="h3">Sorting under magnification</h3><p class="body-s mt-2">Grafts are separated by how many hairs each carries and held in solution. Single-hair units are set aside for the hairline; multi-hair units go behind, where density reads.</p></div></div>
        <div class="step"><span class="step-num">5</span><div><h3 class="h3">Recipient sites</h3><p class="body-s mt-2">Sites are made at the angle, direction and depth the surrounding hair grows. This step, more than extraction, is what makes a result look grown rather than planted.</p></div></div>
        <div class="step"><span class="step-num">6</span><div><h3 class="h3">Placement and discharge</h3><p class="body-s mt-2">Grafts are placed into the prepared sites, the donor is dressed, medication and written aftercare are issued, and you go home the same day.</p></div></div>
      </div>
      <div>
        <div class="media ratio-4-3 media--shadow"><img src="/assets/img/case-uttam-gurgaon.jpg" alt="Before and after a hair transplant at DenceSpot Clinic, Sector 39 Gurugram — hairline and temple restoration, 2,400 grafts by FUE" width="800" height="600" loading="lazy"></div>
        <div class="card card--tint mt-4">
          <p class="eyebrow">Before the day</p>
          <?= ticks([
              'Bring your full medication list, including supplements.',
              'Stop alcohol and avoid blood thinners as instructed.',
              'Eat a proper breakfast — it is a long day.',
              'Wear a shirt that buttons, not something pulled over the head.',
              'Arrange a lift home if you would rather not drive.',
          ], false) ?>
        </div>
      </div>
    </div>
  </div>
</section>

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
    <div class="note mt-5">
      <?= icon('info', 20, 'var(--accent-deep)') ?>
      <p class="body">Individual recovery and growth vary. Transection, healing, donor characteristics and how closely aftercare is followed all affect the outcome. Timelines here are general patient education, not a promise of results, and no clinic can guarantee a specific density.</p>
    </div>
  </div>
</section>

<?= doctor_block(
    'Why the donor assessment matters more than the technique: FUE is often sold on the fact that it leaves no linear scar, which is true and largely beside the point. What determines whether you are happy in ten years is whether the donor was read correctly and spent sensibly. Over-harvesting is the one complication that cannot be revised.'
) ?>

<section class="section section--white" id="cost">
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
        <p class="body mt-3 measure">Working through the numbers first? See our full <a href="/hair-transplant-cost-in-gurgaon">breakdown of hair transplant cost in Gurgaon</a>, including what changes the per-graft rate.</p>
      </div>
      <div class="card card--ink card--pad-lg">
        <h3 class="h3">Get a Personalized Treatment Estimate</h3>
        <p class="body mt-3">Send photos of the front, crown and donor area on WhatsApp, or request a call back. You will get an assessment appointment — not a sales pitch.</p>
        <a class="btn btn--block btn--accent mt-5" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Send photos on WhatsApp</a>
        <a class="btn btn--block btn--ghost mt-3" href="/book-consultation" data-track="book">Request an estimate by form</a>
        <p class="body-s mt-4">Your details are used only to arrange your consultation.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="faqs">
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
    'Consultation, procedure and every follow-up happen at our Sector 39 clinic in Gurugram, with the same doctor throughout. Patients travel to us from across Gurugram and neighbouring parts of South Delhi.'
) ?>

<?= cta_band(
    'Find Out What Your Donor Area Can Actually Support',
    'Bring your questions and your medication list. You will get a donor assessment, an honest view of whether FUE is right for your pattern of loss, and a written plan with a mapped graft number if it is — with no pressure to book a date on the day.',
    'fue-hair-transplant',
    ['FUE hair transplant', 'FUE — crown', 'FUE — hairline', 'Repair of an earlier procedure', 'Not sure — please advise']
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
