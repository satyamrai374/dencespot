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

// "FUE vs FUT at a glance" reference table: [what differs, FUT, FUE].
// General medical knowledge only — no figures beyond those already on the page.
$futVsFueRows = [
    ['How grafts are taken', 'A strip of skin is removed and split into grafts under microscopes', 'Grafts are punched out one at a time'],
    ['Donor scar', 'One fine line, permanent', 'Many small dots spread across the donor'],
    ['Hair length at the back', 'Long enough to cover the line, often around a grade two or three', 'Can be shorter; dots may show if shaved to the skin'],
    ['Grafts in one session', 'Generally more', 'Generally fewer, set by donor density and the length of the day'],
    ['Donor left for later', 'Hair above and below the strip stays untouched', 'Thinned a little across a wide area'],
    ['First two weeks', 'Tightness, often numbness; sutures out at about ten to fourteen days', 'Pinpoint scabs across the donor; no sutures to remove'],
    ['Activity limits', 'Stricter and longer, to protect the scar', 'Shorter'],
    ['Usually suits', 'Extensive loss, a modest donor, hair worn longer at the back', 'Most pattern hair loss, and short hairstyles'],
    ['Usually avoided with', 'A shaved head, keloid scarring or a tight scalp', 'A donor too sparse to spread extraction across'],
];

$faqs = [
    ['q' => 'What is an FUT hair transplant?',
     'a' => 'A procedure in which a narrow strip of hair-bearing skin is removed from the back of the scalp, the edges are closed, and the strip is dissected under microscopes into individual follicular unit grafts. Those grafts are placed into the thinning areas exactly as they are in <a href="/fue-hair-transplant-in-gurgaon">FUE</a>. It is also called the strip technique.'],
    ['q' => 'Does FUT leave a visible scar?',
     'a' => 'It leaves a permanent linear scar at the back of the scalp. With trichophytic closure and low closure tension it is usually a fine line that hair grows through and that surrounding hair covers, but it is not invisible and it cannot be removed. If you shave your head to the skin, it will show.'],
    ['q' => 'Can I shave my head after FUT?',
     'a' => 'Not to the skin, in most cases. You will need to keep the hair at the back long enough to cover the line — often around a grade two or three, judged individually. This is a lifelong commitment and the most common regret among people who chose a strip without considering it.'],
    ['q' => 'Is FUT outdated?',
     'a' => 'No, though it is unfashionable. FUE suits most patients and is the more commonly performed technique today. FUT generally gives a higher graft yield per session than FUE and preserves the surrounding donor area, which makes it the better operation for a specific group — extensive loss, limited donor density, and patients who wear their hair long.'],
    ['q' => 'Which gives more grafts, FUT or FUE?',
     'a' => 'From a single session, FUT generally yields more, because every follicular unit in the strip is recovered and nothing is left behind. Over a lifetime the comparison is more interesting: a strip first, with FUE afterwards from the untouched donor above and below, can produce more total grafts than FUE alone.'],
    ['q' => 'Is FUT more painful than FUE?',
     'a' => 'The procedure itself is done under local anaesthetic and is not typically painful. Afterwards, the donor is different — tightness and soreness along the closure are usual, activity restrictions are stricter, and numbness behind the line is common for some weeks. Recipient-area recovery is much the same as FUE.'],
    ['q' => 'How long does FUT recovery take?',
     'a' => 'Sutures or staples come out at around ten to fourteen days. Most people return to desk work within a few days but avoid gym, heavy lifting and stretching the neck backwards for considerably longer than after FUE, because closure tension affects how wide the scar heals.'],
    ['q' => 'Can I have FUE after FUT?',
     'a' => 'Usually yes, and this order is deliberate in a lifetime plan. The donor above and below the strip is untouched and remains available for FUE later. Going the other way — wide FUE first, then a strip — works less well, because laxity and density are already reduced.'],
    ['q' => 'FUE or FUT: how do I choose?',
     'a' => 'Mainly on two things. First, how you wear the hair at the back of your head now and expect to in future: if you keep it very short or shave it, a linear scar will show and FUE is usually the answer. Second, how much donor hair and scalp laxity you have against the loss still to come: extensive loss with a modest donor, in someone who wears the back longer, is where a strip earns its scar. Both are measured at the consultation, and <a href="/blog/fue-vs-fut-hair-transplant">FUE vs FUT explained</a> sets out the trade-off in more depth.'],
    ['q' => 'Can a second strip be taken later?',
     'a' => 'Sometimes. Where scalp laxity allows, a later strip is usually planned to take in the earlier scar, so you are still left with a single line. Laxity tends to be lower after each strip, so it is measured again before any repeat, and FUE from the donor above and below the line is often the alternative.'],
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
    'title'       => 'FUT Hair Transplant in Gurgaon: Strip Method | DenceSpot',
    'description' => 'FUT (strip) hair transplant in Gurgaon for selected cases: FUE vs FUT side by side, graft yield per session, recovery, and the permanent linear scar.',
    'url'         => '/fut-hair-transplant-in-gurgaon',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-followup-768.webp',
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
            'expectedPrognosis' => 'Transplanted hairs commonly shed within the first weeks; new growth typically begins around three to four months with a fuller result at approximately ten to twelve months. A permanent linear donor scar remains. Outcomes and scar width vary between patients and cannot be promised.',
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
        <h1 class="h1 mt-3">FUT Hair Transplant in Gurgaon for Extensive Loss and Limited Donor</h1>
        <p class="lead mt-3 measure">FUT removes a strip of skin from the back of the scalp, which is dissected under microscopes into individual grafts. It leaves a linear scar, and it is unfashionable for that reason. It can also yield more grafts in a single session than FUE, which is why it remains an option for a specific group of patients.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-treatment="Hair transplant" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Often a higher graft yield per session than FUE',
            'Donor hair above and below the strip preserved',
            'Leaves one linear scar — explained before you decide',
            NAP_LOCALITY . ' · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-followup-768.webp" srcset="/assets/img/services/svc-followup-512.webp 512w, /assets/img/services/svc-followup-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a desk calendar with review dates circled in green, beside a small potted plant" width="768" height="960" loading="eager" fetchpriority="high">
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
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">High yield per session</p><p class="body-s mt-2">Where large coverage in one day is the priority.</p></div>
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Microscopic dissection</p><p class="body-s mt-2">Grafts separated under magnification, not by eye.</p></div>
      <div class="card"><?= icon('shield', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Donor preserved above and below</p><p class="body-s mt-2">FUE territory left intact for future sessions.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Scar discussed before you decide</p><p class="body-s mt-2">Width, position and what it needs to stay hidden.</p></div>
      <div class="card"><?= icon('info', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Selected cases only</p><p class="body-s mt-2">Not offered where FUE would serve you better.</p></div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'intro-donor',
    'alt'     => 'a mannequin head seen from behind, with the donor area at the back and sides marked',
    'eyebrow' => 'The basics, plainly',
    'title'   => 'What Is an FUT Hair Transplant?',
    'id'      => 'what-is',
    'tone'    => 'white',
    'html'    => '<p>FUT stands for follicular unit transplantation, usually called the strip technique. A narrow band of hair-bearing skin is taken from the back of the scalp, where hair is most resistant to pattern loss, and the edges are closed with sutures or staples, leaving a single line.</p>'
               . '<p>The strip is dissected under microscopes into individual follicular units. Because every unit in it is accounted for and nothing is left behind in the scalp, the yield from a given area of donor skin is high and transection in experienced hands is low. The grafts are then placed exactly as in <a href="/fue-hair-transplant-in-gurgaon">FUE</a>.</p>'
               . '<p>The unavoidable trade-off is the scar: a line, not dots. Trichophytic closure keeps it narrow and lets hair grow through it, and it sits low at the back where surrounding hair covers it, but it is permanent and needs a certain hair length above it to stay hidden. If you shave your head to the skin, FUT is the wrong operation for you.</p>'
               . '<p>FUT has not disappeared because of arithmetic. FUE harvests across a wide donor area and thins it slightly everywhere; FUT takes from one band and leaves the surrounding donor untouched, so for extensive loss a strip first and FUE afterwards can yield more total grafts across a lifetime than FUE alone.</p>',
    'points'  => [
        'FUT trades a visible line for graft yield and donor preservation',
        'Whether that trade suits you depends on how you wear your hair and how much loss is still ahead',
    ],
    'link'    => ['url' => '#scar', 'label' => 'About the scar'],
]) ?>

<section class="section section--canvas" id="candidacy">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Suitability</p>
      <h2 class="h2 mt-2">Who FUT Suits — and Who It Does Not</h2>
      <p class="body mt-3">FUT is offered here for selected cases rather than as a default. These are the situations where it is genuinely the better operation, and the situations where it is not.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card"><?= icon('chart', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Extensive loss needing volume</h3><p class="body-s mt-2">Where a large area needs covering and total graft yield in one session is the deciding factor rather than donor appearance.</p></div>
      <div class="card"><?= icon('list', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Limited donor for FUE</h3><p class="body-s mt-2">Where donor density will not support wide FUE harvesting without visible thinning, a strip can yield more without spreading the loss.</p></div>
      <div class="card"><?= icon('user', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">You keep your hair long</h3><p class="body-s mt-2">If the hair at the back of your head is worn long enough to cover a line, the scar is a non-issue in daily life.</p></div>
      <div class="card"><?= icon('doc', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Planning for more than one session</h3><p class="body-s mt-2">Taking a strip first preserves the surrounding donor for FUE later — the reverse order does not work as well.</p></div>
      <div class="card"><?= icon('info', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Not for shaved heads</h3><p class="body-s mt-2">If you shave to the skin or expect to, a linear scar will show. FUE is the right technique for you, and we will say so.</p></div>
      <div class="card"><?= icon('heart', 24, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Not for poor healers</h3><p class="body-s mt-2">Keloid or hypertrophic scarring history, very tight scalp laxity or conditions affecting wound healing all count against a strip.</p></div>
    </div>

    <div class="measure mt-6">
      <h3 class="h3" id="fue-vs-fut">FUE vs FUT at a Glance</h3>
      <p class="body mt-3">Both techniques place grafts the same way. What differs is how the grafts are harvested, and that decides the scar, the hair length you can wear and how much donor is left for later.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data data--fit">
          <caption class="sr-only">FUT and FUE compared: how grafts are taken, the donor scar, hair length, graft yield, recovery and who each usually suits — a general guide, not a recommendation</caption>
          <thead><tr><th scope="col">What differs</th><th scope="col">FUT (strip)</th><th scope="col">FUE</th></tr></thead>
          <tbody>
            <?php foreach ($futVsFueRows as $r): ?>
            <tr><th scope="row" style="white-space:normal;width:28%"><?= e($r[0]) ?></th><td><?= e($r[1]) ?></td><td><?= e($r[2]) ?></td></tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">Many long-term plans use both: a strip first, then FUE from the untouched donor above and below it. <a href="/blog/fue-vs-fut-hair-transplant">FUE vs FUT in more depth</a> works through the trade-off, and <a href="/fue-hair-transplant-in-gurgaon">FUE hair transplant in Gurgaon</a> covers the other technique.</p>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-follicle',
    'alt'     => 'a sculpted cross-section of scalp skin showing hair follicles and their roots',
    'eyebrow' => 'The trade-off',
    'title'   => 'The Scar, Honestly',
    'id'      => 'scar',
    'reverse' => true,
    'tone'    => 'white',
    'html'    => '<p><b>It is permanent.</b> A linear scar can be made narrower, revised, or camouflaged later with FUE grafts or scalp micropigmentation, but it does not go away. Anyone who says it leaves nothing to see is not describing FUT.</p>'
               . '<p><b>Its width is not fully predictable.</b> Scalp laxity, strip width, closure tension, your healing biology and whether you follow the activity restrictions all play a part. A fine line is the aim and the usual outcome, a wider one a recognised possibility; trichophytic closure improves the odds but cannot promise an invisible line.</p>'
               . '<p><b>It sets a minimum hair length</b> at the back, for most people a grade two or three, judged individually. That is a commitment for life, and the most common regret among people who chose a strip without thinking about it. Before agreeing to a strip, ask:</p>',
    'points'  => [
        '“Why not FUE in my case?” There should be a specific reason based on your donor and your goals',
        '“How wide is the strip going to be?” Strip width and scalp laxity drive closure tension, which drives scar width',
        '“What hair length will hide it?” Get a specific answer before the procedure, not after',
        '“What if it heals wide?” Revision, FUE camouflage and micropigmentation are the options; know them beforehand',
    ],
]) ?>

<?= lp_highlights([
    'eyebrow' => 'Our approach',
    'title'   => 'How FUT Is Planned at DenceSpot',
    'intro'   => 'Offered, not pushed: FUT is recommended only where it beats FUE for your donor and your goals. If FUE serves you better, that is what you are offered, even though a strip is quicker for us.',
    'tone'    => 'canvas',
    'items'   => [
        ['icon' => 'layers',   'title' => 'Laxity measured before planning', 'text' => 'Scalp laxity and strip width are assessed together, because closure tension is the main thing you can control that affects how the scar heals.'],
        ['icon' => 'eye',      'title' => 'Microscopic dissection',          'text' => 'Grafts are separated under magnification rather than by eye, which is what keeps transection low and yield high in a strip case.'],
        ['icon' => 'shield',   'title' => 'Trichophytic closure',            'text' => 'The wound edge is prepared so hair grows through the line rather than stopping at it, giving the scar a better chance of blending into the surrounding hair.'],
        ['icon' => 'calendar', 'title' => 'Lifetime donor planning',         'text' => 'The strip is placed so FUE territory above and below stays usable, and follow-up photographs cover the donor line as well as the recipient area.'],
    ],
]) ?>

<?= lp_steps([
    'eyebrow' => 'Start to finish',
    'title'   => 'How an FUT Procedure Works',
    'id'      => 'procedure',
    'intro'   => 'A day case under local anaesthetic. The dissection stage runs in parallel while placement begins.',
    'tone'    => 'white',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                    'title' => 'Consultation and donor exam', 'text' => 'History, medication review, and how you wear your hair and expect to. Density, calibre and scalp laxity are measured, and the scar conversation happens here.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned hairline', 'title' => 'Technique decision and plan', 'text' => 'An explicit comparison of what FUT and FUE would each give you, then a written plan: strip dimensions, expected yield, timeline, cost and scar expectations.'],
        ['img' => 'step-procedure',    'alt' => 'sterile hair-restoration instruments laid out on a tray',  'title' => 'Procedure day',               'text' => 'The hairline and strip position are marked and agreed with you. The strip is removed and closed with trichophytic technique at the lowest tension the plan allows, then dissected under microscopes while sites are made and grafts placed.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with review dates circled',               'title' => 'Suture removal and reviews',  'text' => 'Home the same day with written aftercare and the activity restrictions explained. Sutures or staples come out at around ten to fourteen days; growth and donor-line healing are tracked photographically to twelve months.'],
    ],
]) ?>

<?= doctor_block(
    'Consultations and procedures are carried out by registered medical practitioners at the clinic. A patient with extensive loss and a modest donor can be better served by a single strip that leaves the surrounding donor intact than by wide FUE harvesting; which technique suits you is decided at the examination.'
) ?>

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
    <div class="grid grid--2 mt-5">
      <div class="note"><p class="h4">Specific to a strip</p><div class="mt-2"><?= ticks([
          'Sleeping position matters — you will be told exactly how.',
          'No heavy lifting or gym for longer than after FUE.',
          'Avoid stretching the neck backwards while healing.',
          'Return at 10–14 days for suture or staple removal.',
          'Numbness behind the line for some weeks is common.',
      ], false) ?></div></div>
      <div class="note">
        <p class="body-s">Individual recovery, scar width and growth vary. Scalp laxity, closure tension, healing biology and adherence to activity restrictions all affect how the donor line settles. Timelines here are general patient education and not a promise of results; no clinic can promise a particular scar width or a specific density.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="cost">
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
        <p class="body mt-3 measure">Working through the numbers first? See our full <a href="/hair-transplant-cost-in-gurgaon">breakdown of hair transplant cost in Gurgaon</a>. The <a href="/hair-transplant-graft-calculator">hair transplant graft calculator</a> gives a rough range for your pattern of loss; it cannot measure donor density or scalp laxity, which are what decide between a strip and FUE.</p>
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
    'Consultations, procedures, suture removal and follow-up reviews are carried out by registered medical practitioners at our Sector 39 clinic in Gurugram. Donor-line healing is reviewed alongside growth at each appointment.'
) ?>

<?= lp_cta([
    'eyebrow'   => 'Sector 39, Gurugram',
    'title'     => 'Find Out Whether a Strip Is Right for Your Donor',
    'text'      => 'Bring your questions and your medication list. You will get a donor and laxity assessment, an explicit comparison of what FUT and FUE would each give you now and in fifteen years, and a straight account of the scar before you decide anything.',
    'treatment' => 'Hair transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
