<?php
/**
 * /fut-hair-transplant-in-gurgaon — page #19.
 *
 * Technique spoke off /hair-transplant-in-gurgaon. Content ported from the
 * design build.
 *
 * ⚠ LAUNCH BLOCKER — see $page['noindex'] below and BUILD-PROGRESS.md.
 * The hub badges FUT as "Selected cases" and the clinic has not yet confirmed
 * in writing that strip surgery is performed here, by whom, and with what
 * dissection setup. This page markets a surgical procedure, so it ships
 * noindex until that confirmation exists. If FUT is NOT offered, do not
 * publish it: convert the content to /fue-vs-fut-hair-transplant instead and
 * say plainly that strip work is not done at this clinic.
 *
 * Cannibalisation split: FUE owns donor supply, DHI owns placement. This page
 * owns the scar and the lifetime donor arithmetic — the two questions the
 * other two techniques cannot answer.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'What is an FUT hair transplant?',
     'a' => 'A procedure in which a narrow strip of hair-bearing skin is removed from the back of the scalp, the edges are closed, and the strip is dissected under microscopes into individual follicular unit grafts. Those grafts are placed into the thinning areas exactly as they are in <a href="/fue-hair-transplant-in-gurgaon">FUE</a>. It is also called the strip technique.'],
    ['q' => 'Does FUT leave a visible scar?',
     'a' => 'It leaves a permanent linear scar at the back of the scalp. With trichophytic closure and low closure tension it is usually a fine line that hair grows through and that surrounding hair covers, but it is not invisible and it cannot be removed. If you shave your head to the skin, it will show.'],
    ['q' => 'Can I shave my head after FUT?',
     'a' => 'Not to the skin, in most cases. You will need to keep the hair at the back long enough to cover the line — often around a grade two or three, judged individually. This is a lifelong commitment and the most common regret among people who chose a strip without considering it.'],
    ['q' => 'Is FUT outdated?',
     'a' => 'No, though it is unfashionable. FUE is better for most patients and is what most clinics now do by default. FUT still gives the highest graft yield per session and preserves the surrounding donor area, which makes it the better operation for a specific group — advanced loss, limited donor density, and patients who wear their hair long.'],
    ['q' => 'Which gives more grafts, FUT or FUE?',
     'a' => 'From a single session, FUT generally yields more, because every follicular unit in the strip is recovered and nothing is left behind. Over a lifetime the comparison is more interesting: a strip first, with FUE afterwards from the untouched donor above and below, can produce more total grafts than FUE alone.'],
    ['q' => 'Is FUT more painful than FUE?',
     'a' => 'The procedure itself is done under local anaesthetic and is not typically painful. Afterwards, the donor is different — tightness and soreness along the closure are usual, activity restrictions are stricter, and numbness behind the line is common for some weeks. Recipient-area recovery is much the same as FUE.'],
    ['q' => 'How long does FUT recovery take?',
     'a' => 'Sutures or staples come out at around ten to fourteen days. Most people return to desk work within a few days but avoid gym, heavy lifting and stretching the neck backwards for considerably longer than after FUE, because closure tension affects how wide the scar heals.'],
    ['q' => 'Can I have FUE after FUT?',
     'a' => 'Usually yes, and this order is deliberate in a lifetime plan. The donor above and below the strip is untouched and remains available for FUE later. Going the other way — wide FUE first, then a strip — works less well, because laxity and density are already reduced.'],
    ['q' => 'Can the FUT scar be improved later?',
     'a' => 'Yes, to a degree. Options include surgical revision of a wide scar, placing FUE grafts into the scar tissue to grow hair through it, and scalp micropigmentation to reduce the contrast. None of them removes it. Any of them is a separate procedure with its own assessment.'],
    ['q' => 'Who should not have FUT?',
     'a' => 'Anyone who shaves or expects to shave their head, anyone with a history of keloid or hypertrophic scarring, very tight scalp laxity, or conditions affecting wound healing. Also anyone whose donor and goals are well served by FUE — a scar you did not need is not a good trade.'],
    ['q' => 'When will hair grow after FUT?',
     'a' => 'The same timeline as any transplant: shedding within the first weeks while the follicles stay in place, new growth from around three to four months, and a fair assessment at roughly ten to twelve months. The donor line settles on its own schedule alongside.'],
    ['q' => 'How much does FUT cost in Gurgaon?',
     'a' => 'It depends on graft yield, strip dimensions, dissection time and any supporting treatment. FUT is often priced below FUE per graft, but choosing a technique on price rather than on your donor is a false economy. Our <a href="/hair-transplant-cost-in-gurgaon">hair transplant cost guide</a> explains what moves the number, and we quote after assessment, in writing.'],
    ['q' => 'What happens at the FUT consultation?',
     'a' => 'History and medication review, donor examination with density and scalp laxity measurement, pattern staging, photographs, and a written plan. The scar conversation happens here rather than on the day — position, expected width, the hair length needed to cover it and what the options are if it heals wide.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair transplant', 'url' => '/hair-transplant-in-gurgaon'],
    ['name' => 'FUT hair transplant in Gurgaon'],
];

$page = [
    'title'       => 'FUT Hair Transplant in Gurgaon | DenceSpot Clinic',
    'description' => 'FUT (strip) hair transplant in Gurgaon for selected cases. Highest graft yield in one session, with a linear donor scar explained honestly before you decide.',
    'url'         => '/fut-hair-transplant-in-gurgaon',
    'crumbs'      => $crumbs,
    // Held back from the index until the clinic confirms FUT is offered here.
    'noindex'     => true,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/fut-hair-transplant-in-gurgaon', [
            'name'          => 'FUT Hair Transplant',
            'alternateName' => ['Follicular unit transplantation', 'Strip hair transplant'],
            'procedureType' => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'A strip of hair-bearing skin is removed from the back of the scalp under local anaesthetic and the donor edges are closed, using trichophytic closure where appropriate. The strip is dissected under microscopes into individual follicular unit grafts, which are placed into recipient sites prepared across the thinning areas.',
            'preparation'   => 'Clinical assessment of hair-loss pattern, donor density and scalp laxity, review of medication and blood-thinning agents, blood investigations, and an explicit discussion of scar expectations and hair-length requirements before the procedure date.',
            'followup'      => 'Wound review and suture or staple removal at around ten to fourteen days, then scheduled photographic reviews of both growth and donor-line healing.',
            'expectedPrognosis' => 'Transplanted hairs commonly shed within the first weeks; new growth typically begins around three to four months with a fuller result at approximately ten to twelve months. A permanent linear donor scar remains. Outcomes and scar width vary between patients and are not guaranteed.',
        ]),
        schema_faq('/fut-hair-transplant-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">FUT hair transplant in Gurgaon</span>
        <h1 class="h1 mt-3">FUT Hair Transplant in Gurgaon for Advanced Loss and Limited Donor</h1>
        <p class="lead mt-3 measure">FUT removes a strip of skin from the back of the scalp, which is dissected under microscopes into individual grafts. It leaves a linear scar, and it is unfashionable for that reason. It also still produces the highest graft yield per session of any technique, which is why it remains the right answer for a specific group of patients.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Highest graft yield from a single session',
            'Donor hair above and below the strip preserved',
            'Leaves one linear scar — explained before you decide',
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
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Highest yield per session</p><p class="body-s mt-2">Where large coverage in one day is the priority.</p></div>
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Microscopic dissection</p><p class="body-s mt-2">Grafts separated under magnification, not by eye.</p></div>
      <div class="card"><?= icon('shield', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Donor preserved above and below</p><p class="body-s mt-2">FUE territory left intact for future sessions.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Scar discussed before you decide</p><p class="body-s mt-2">Width, position and what it needs to stay hidden.</p></div>
      <div class="card"><?= icon('info', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Selected cases only</p><p class="body-s mt-2">Not offered where FUE would serve you better.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="what-is">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">The basics, plainly</p>
        <h2 class="h2 mt-2">What Is an FUT Hair Transplant?</h2>
        <p class="body-l mt-3 measure">FUT stands for follicular unit transplantation, and it is usually called the strip technique. A narrow band of hair-bearing skin is taken from the back of the scalp — the area where hair is most resistant to pattern loss — and the edges are closed with sutures or staples, leaving a single line.</p>
        <p class="body-l mt-3 measure">That strip is then handed to a team who dissect it under microscopes into individual follicular units. Because every unit in the strip is accounted for and nothing is left behind in the scalp, the yield from a given area of donor skin is high, and transection rates in experienced hands are low. Those grafts are placed into recipient sites exactly as they are in FUE.</p>
        <p class="body-l mt-3 measure">The unavoidable trade-off is the scar. It is a line, not dots, and while modern closure techniques keep it narrow — trichophytic closure encourages hair to grow through the scar rather than beside it — it is permanent. It sits low at the back where surrounding hair covers it, but it needs a certain hair length above it to stay hidden. If you shave your head to the skin, FUT is the wrong operation for you.</p>
        <p class="body-l mt-3 measure">The reason FUT has not disappeared is arithmetic. FUE harvests across a wide donor area and thins it slightly everywhere; FUT takes from one band and leaves the surrounding donor untouched. For a patient facing advanced loss who will likely need more surgery later, a strip first and FUE afterwards can yield more total grafts across a lifetime than FUE alone.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--ghost" href="/fue-hair-transplant-in-gurgaon">How FUE differs</a>
          <a class="btn btn--ghost" href="#scar">About the scar</a>
        </div>
      </div>
      <div>
        <div class="media ratio-4-3 media--shadow"><img src="/assets/img/clinic-facade.jpg" alt="DenceSpot Clinic shopfront on Sector 39 Road, Jharsa, Gurugram, showing the hair transplant and PRP treatment signage" width="800" height="600" loading="lazy"></div>
        <div class="card card--tint mt-4">
          <p class="eyebrow">In one line</p>
          <p class="body mt-2">FUT trades a visible line for graft yield and donor preservation. Whether that trade is right for you depends on how you wear your hair and how much loss is still ahead.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="candidacy">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Suitability</p>
      <h2 class="h2 mt-2">Who FUT Suits — and Who It Does Not</h2>
      <p class="body mt-3">FUT is offered here for selected cases rather than as a default. These are the situations where it is genuinely the better operation, and the situations where it is not.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card"><?= icon('chart', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Advanced loss needing volume</h3><p class="body-s mt-2">Where a large area needs covering and total graft yield in one session is the deciding factor rather than donor appearance.</p></div>
      <div class="card"><?= icon('list', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Limited donor for FUE</h3><p class="body-s mt-2">Where donor density will not support wide FUE harvesting without visible thinning, a strip can yield more without spreading the loss.</p></div>
      <div class="card"><?= icon('user', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">You keep your hair long</h3><p class="body-s mt-2">If the hair at the back of your head is worn long enough to cover a line, the scar is a non-issue in daily life.</p></div>
      <div class="card"><?= icon('doc', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Planning for more than one session</h3><p class="body-s mt-2">Taking a strip first preserves the surrounding donor for FUE later — the reverse order does not work as well.</p></div>
      <div class="card"><?= icon('info', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Not for shaved heads</h3><p class="body-s mt-2">If you shave to the skin or expect to, a linear scar will show. FUE is the right technique for you, and we will say so.</p></div>
      <div class="card"><?= icon('heart', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Not for poor healers</h3><p class="body-s mt-2">Keloid or hypertrophic scarring history, very tight scalp laxity or conditions affecting wound healing all count against a strip.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="scar">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">The part most pages skip</p>
      <h2 class="h2 mt-2">The Scar, Honestly</h2>
      <p class="body mt-3">You cannot make an informed choice about FUT without a straight account of the one thing it leaves behind. Nothing below is softened.</p>
    </div>
    <div class="split split--sidebar mt-6">
      <div class="stack-sm">
        <div class="card"><h3 class="h3">It is permanent</h3><p class="body mt-2">A linear scar cannot be removed. It can be made narrower, revised, or camouflaged later with FUE grafts or scalp micropigmentation, but it does not go away. Anyone describing it as scarless is not describing FUT.</p></div>
        <div class="card"><h3 class="h3">Width is not fully predictable</h3><p class="body mt-2">Closure technique matters, but so do scalp laxity, strip width, tension, your healing biology and whether you follow the activity restrictions. A fine line is the aim and the usual outcome; a wider one is a recognised possibility, not a complication that only happens to other people.</p></div>
        <div class="card"><h3 class="h3">Trichophytic closure helps</h3><p class="body mt-2">The wound edge is trimmed so hair grows up through the scar line rather than stopping at it, which breaks up the appearance considerably. It improves the odds; it does not guarantee an invisible line.</p></div>
        <div class="card"><h3 class="h3">It sets a minimum hair length</h3><p class="body mt-2">You will need to keep the hair at the back long enough to cover it — for most people a grade two or three, but this is judged individually. That is a commitment for life, and it is the single most common regret among people who chose a strip without thinking about it.</p></div>
      </div>
      <div class="card card--ink card--pad-lg">
        <h3 class="h3">Ask us these before agreeing to a strip</h3>
        <div class="stack-sm mt-5">
          <div><p class="h4">&ldquo;Why not FUE in my case?&rdquo;</p><p class="body-s mt-2">There should be a specific reason based on your donor and your goals — not a preference for the technique.</p></div>
          <div><p class="h4">&ldquo;How wide is the strip going to be?&rdquo;</p><p class="body-s mt-2">Strip width and scalp laxity together drive closure tension, which drives scar width.</p></div>
          <div><p class="h4">&ldquo;What hair length will hide it?&rdquo;</p><p class="body-s mt-2">Get a specific answer before the procedure, not after.</p></div>
          <div><p class="h4">&ldquo;What if it heals wide?&rdquo;</p><p class="body-s mt-2">Revision, FUE camouflage and micropigmentation are the options. Know them in advance.</p></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="why">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Why here</p>
      <h2 class="h2 mt-2">Why Have FUT Done Here?</h2>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--tint"><?= icon('info', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Offered, not pushed</h3><p class="body-s mt-2">FUT is recommended only where it genuinely beats FUE for your donor and your goals. If FUE serves you better, that is what you are offered — even though a strip is quicker for us.</p></div>
      <div class="card card--tint"><?= icon('scale', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Laxity measured before planning</h3><p class="body-s mt-2">Scalp laxity and strip width are assessed together, because closure tension is the main thing you can control that affects how the scar heals.</p></div>
      <div class="card card--tint"><?= icon('search', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Microscopic dissection</h3><p class="body-s mt-2">Grafts are separated under magnification rather than by eye, which is what keeps transection low and yield high in a strip case.</p></div>
      <div class="card card--tint"><?= icon('shield', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Trichophytic closure</h3><p class="body-s mt-2">The wound edge is prepared so hair grows through the line rather than stopping at it, giving the scar the best chance of disappearing into the surrounding hair.</p></div>
      <div class="card card--tint"><?= icon('doc', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Lifetime donor planning</h3><p class="body-s mt-2">The strip is placed with future sessions in mind, so FUE territory above and below stays usable as the loss progresses.</p></div>
      <div class="card card--tint"><?= icon('star', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Donor reviewed too</h3><p class="body-s mt-2">Follow-up photographs cover the donor line as well as the recipient area, so scar healing is tracked rather than assumed.</p></div>
    </div>
  </div>
</section>

<section class="section section--ink" id="journey">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Start to finish</p>
      <h2 class="h2 mt-2">Your FUT Journey</h2>
      <p class="body mt-3">Seven stages, in the order you will experience them.</p>
    </div>
    <div class="journey mt-6">
      <div class="card card--ink"><span class="journey__num">1</span><h3 class="h4 mt-2">Consultation</h3><p class="body-s mt-2">History, medication review, how you wear your hair and how you expect to.</p></div>
      <div class="card card--ink"><span class="journey__num">2</span><h3 class="h4 mt-2">Donor &amp; laxity exam</h3><p class="body-s mt-2">Density, calibre and scalp laxity measured; the scar conversation happens here.</p></div>
      <div class="card card--ink"><span class="journey__num">3</span><h3 class="h4 mt-2">Technique decision</h3><p class="body-s mt-2">An explicit comparison of what FUT and FUE would each give you.</p></div>
      <div class="card card--ink"><span class="journey__num">4</span><h3 class="h4 mt-2">Written plan</h3><p class="body-s mt-2">Strip dimensions, expected yield, timeline, cost and scar expectations.</p></div>
      <div class="card card--ink"><span class="journey__num">5</span><h3 class="h4 mt-2">Procedure day</h3><p class="body-s mt-2">Strip harvest, closure, microscopic dissection and placement.</p></div>
      <div class="card card--ink"><span class="journey__num">6</span><h3 class="h4 mt-2">Suture removal</h3><p class="body-s mt-2">Wound review and suture or staple removal at around ten to fourteen days.</p></div>
      <div class="card card--ink"><span class="journey__num">7</span><h3 class="h4 mt-2">Reviews to 12 months</h3><p class="body-s mt-2">Growth and donor-line healing both tracked photographically.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="procedure">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">On the day</p>
      <h2 class="h2 mt-2">How an FUT Procedure Works</h2>
      <p class="body mt-3">A day case under local anaesthetic. The dissection stage runs in parallel while placement begins.</p>
    </div>
    <div class="split split--sidebar mt-6">
      <div class="stack-sm">
        <div class="step"><span class="step-num">1</span><div><h3 class="h3">Design and consent</h3><p class="body-s mt-2">Hairline drawn and agreed while you sit upright, and the donor strip position and expected scar marked and shown to you before anything begins.</p></div></div>
        <div class="step"><span class="step-num">2</span><div><h3 class="h3">Strip harvest</h3><p class="body-s mt-2">The donor area is anaesthetised and a narrow band of hair-bearing skin is removed from the back of the scalp, sized to your laxity and the graft number planned.</p></div></div>
        <div class="step"><span class="step-num">3</span><div><h3 class="h3">Closure</h3><p class="body-s mt-2">The edges are closed with sutures or staples, using trichophytic technique so hair can grow up through the line. Tension is kept as low as the plan allows.</p></div></div>
        <div class="step"><span class="step-num">4</span><div><h3 class="h3">Microscopic dissection</h3><p class="body-s mt-2">The strip is divided under microscopes into individual follicular units, sorted by hair count and held in solution. This runs while the recipient area is prepared.</p></div></div>
        <div class="step"><span class="step-num">5</span><div><h3 class="h3">Sites and placement</h3><p class="body-s mt-2">Recipient sites are made at the angle and direction of the surrounding hair, and grafts are placed — single-hair units at the front, multi-hair units behind for density.</p></div></div>
        <div class="step"><span class="step-num">6</span><div><h3 class="h3">Aftercare and discharge</h3><p class="body-s mt-2">Donor dressed, medication and written aftercare issued, activity restrictions explained in detail, and the suture-removal appointment booked before you leave.</p></div></div>
      </div>
      <div>
        <div class="media ratio-4-3 media--shadow"><img src="/assets/img/case-uttam-gurgaon.jpg" alt="Before and after a hair transplant at DenceSpot Clinic, Sector 39 Gurugram — hairline and temple restoration, 2,400 grafts by FUE" width="800" height="600" loading="lazy"></div>
        <div class="card card--tint mt-4">
          <p class="eyebrow">Specific to a strip</p>
          <?= ticks([
              'Sleeping position matters — you will be told exactly how.',
              'No heavy lifting or gym for longer than after FUE.',
              'Avoid stretching the neck backwards while healing.',
              'Return at 10–14 days for suture or staple removal.',
              'Numbness behind the line for some weeks is common.',
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
      <h2 class="h2 mt-2">What Happens After FUT</h2>
      <p class="body mt-3">Recipient-area growth follows the same course as FUE. The donor is where FUT recovery genuinely differs, so it is described separately here.</p>
    </div>
    <div class="grid grid--5 mt-6">
      <div class="card"><span class="pill">Days 1–14</span><h3 class="h4 mt-3">The donor line</h3><p class="body-s mt-2">Tightness, soreness and often numbness behind the closure. Sutures or staples come out at around ten to fourteen days. Activity restrictions are stricter than after FUE and they matter for scar width.</p></div>
      <div class="card"><span class="pill">Weeks 2–4</span><h3 class="h4 mt-3">Shedding</h3><p class="body-s mt-2">Transplanted hairs commonly fall while follicles stay in place. The donor line is healing but still pink and at its most conspicuous.</p></div>
      <div class="card"><span class="pill">Months 2–4</span><h3 class="h4 mt-3">Line settles, growth starts</h3><p class="body-s mt-2">The scar fades from pink towards skin tone and hair begins growing through it. New transplanted hairs start appearing, unevenly at first.</p></div>
      <div class="card"><span class="pill">Months 5–9</span><h3 class="h4 mt-3">Density builds</h3><p class="body-s mt-2">Coverage thickens and hair coarsens. Numbness behind the donor line usually resolves through this period, though it can take longer.</p></div>
      <div class="card"><span class="pill">Months 10–12</span><h3 class="h4 mt-3">Final assessment</h3><p class="body-s mt-2">A fair judgement of both the result and the scar. This is when a decision about camouflage, if any is wanted, is properly made.</p></div>
    </div>
    <div class="note mt-5">
      <p class="body">Individual recovery, scar width and growth vary. Scalp laxity, closure tension, healing biology and adherence to activity restrictions all affect how the donor line settles. Timelines here are general patient education and not a promise of results; no clinic can guarantee scar width or a specific density.</p>
    </div>
  </div>
</section>

<?= doctor_block(
    'Why FUT is still on the menu here: FUE is easier to sell, because “no scar” is a simpler promise than a conversation about donor arithmetic. But a patient with advanced loss and a modest donor can be worse served by wide FUE harvesting than by a single strip that leaves the surrounding donor intact. The right question is not which technique sounds more modern — it is which one leaves you with more usable hair in fifteen years.'
) ?>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">FUT Hair Transplant Cost in Gurgaon</h2>
        <p class="body mt-3 measure">FUT is often priced below FUE per graft, because harvesting a strip takes less surgeon time than extracting units one at a time. That difference should never be the reason you choose it — a technique picked on price rather than on your donor is a false economy with permanent consequences.</p>
        <div class="grid grid--2 mt-5">
          <div class="card"><p class="h4">Number of grafts</p><p class="body-s mt-2">Yield from the strip, counted after dissection</p></div>
          <div class="card"><p class="h4">Strip dimensions</p><p class="body-s mt-2">Set by your laxity and the graft number planned</p></div>
          <div class="card"><p class="h4">Dissection time</p><p class="body-s mt-2">Microscopic separation is labour-intensive</p></div>
          <div class="card"><p class="h4">Hair-loss stage</p><p class="body-s mt-2">How much area needs coverage</p></div>
          <div class="card"><p class="h4">Closure technique</p><p class="body-s mt-2">Trichophytic closure adds time at the donor</p></div>
          <div class="card"><p class="h4">Supporting treatment</p><p class="body-s mt-2">Medical therapy or PRP running alongside</p></div>
        </div>
        <p class="body-s mt-4 measure">The honest comparison is not FUT against FUE on price today. It is what each leaves you with over a lifetime of continuing hair loss — total grafts available, donor appearance, and what a second or third session will still be able to draw on. We will go through that arithmetic with you rather than quoting a rate.</p>
        <p class="body mt-3 measure">Working through the numbers first? See our full <a href="/hair-transplant-cost-in-gurgaon">breakdown of hair transplant cost in Gurgaon</a>.</p>
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
        <h2 class="h2 mt-2">FUT Hair Transplant FAQs</h2>
        <p class="body-s mt-3">Answers are general patient education. Anything specific to your donor area, your scalp laxity or your medical history is answered at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= before_after_slider_section() ?>

<?= awards_certificates_section() ?>

<?= local_block(
    'FUT Hair Transplant at Our Gurgaon Clinic',
    'Consultation, procedure, suture removal and every follow-up happen at our Sector 39 clinic in Gurugram, with the same doctor throughout. Donor-line healing is reviewed alongside growth at each appointment.'
) ?>

<?= cta_band(
    'Find Out Whether a Strip Is Right for Your Donor',
    'Bring your questions and your medication list. You will get a donor and laxity assessment, an explicit comparison of what FUT and FUE would each give you now and in fifteen years, and a straight account of the scar before you decide anything.',
    'fut-hair-transplant',
    ['FUT (strip) hair transplant', 'FUT — advanced hair loss', 'FUT or FUE — please advise', 'FUT scar revision or camouflage', 'Not sure — please advise']
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
