<?php
/**
 * /hair-transplant-repair-in-rohini — Rohini (Delhi) spoke: corrective work on
 * an earlier hair transplant.
 *
 * October 2026 (batch 2). The agency confirmed on 13 Oct 2026 that every
 * DenceSpot service, hair transplant included, is carried out at the Rohini
 * clinic. Medical facts follow the existing repair page and
 * /blog/hair-transplant-repair-options; the wording is new. Client rule
 * (14 Oct 2026): a Rohini page does not mention the other location and links
 * only to Rohini pages, /delhi-clinic and neutral blog posts and tools.
 *
 * Editorial position: repair improves more often than it erases, and the
 * ceiling is set by the donor hair that remains. No other clinic is named,
 * criticised or implied to be at fault; "front edge", never the banned phrase.
 * Scalp micropigmentation is mentioned as a general option only — whether it
 * is offered at Rohini is not on record, so it is not claimed or linked.
 *
 * Landing layout (14 Oct 2026): lp_split, lp_steps and lp_cta from the visual kit.
 *
 * Not yet reviewed by the clinic's doctor: doctor_block() is called with
 * $reviewed = false, there is no review byline and the page is not in
 * MEDICAL_PAGES. No doctor is named as performer.
 *
 * SEO round 3 (14 Oct 2026, COMPETITOR-SEO §4 #6, §5): title "<Service> in
 * Rohini, Delhi: <modifier>", the "often improvable / not reversible" lists
 * became a table by problem (same facts), a "Recovering in Delhi" note, the
 * cost section links /hair-transplant-cost-in-rohini as the graft-pricing
 * explainer, and 15 FAQs. Pigment stays a general option (see above).
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/**
 * Problem by problem: what repair can usually do and where it stops. Every
 * cell restates a fact already on this page; a general guide, not a promise.
 */
$repairRows = [
    ['problem' => 'Tufted grafts along the front',  'can' => 'Removed one at a time, with their hair re-used further back.',                     'cannot' => 'Not every follicle survives to be re-used, and each removal leaves a tiny mark.'],
    ['problem' => 'A hard, straight edge',          'can' => 'Softened with scattered single-hair grafts placed ahead of and among it.',          'cannot' => 'Needs grafts the remaining donor can spare.'],
    ['problem' => 'A hairline set too low',         'can' => 'Raised partly, by removing grafts in stages and re-implanting those that survive.', 'cannot' => 'Rarely reset completely, and the work is slow.'],
    ['problem' => 'Grafts at the wrong angle',      'can' => 'Taken out and re-placed at the angle of the surrounding hair.',                     'cannot' => 'The angle cannot be changed with the graft left in place.'],
    ['problem' => 'Thin or patchy growth',          'can' => 'Given more density.',                                                                'cannot' => 'Only as far as the donor allows, and not the density you had before hair loss.'],
    ['problem' => 'A strip scar',                   'can' => 'Made less visible with grafts into the scar, pigment, or both.',                     'cannot' => 'Softened, but rarely erased.'],
    ['problem' => 'An over-harvested donor',        'can' => 'Camouflaged, for example with pigment, with medical treatment to protect what is left.', 'cannot' => 'Donor hair already taken cannot be put back.'],
];

$faqs = [
    ['q' => 'Is hair transplant repair carried out at the Rohini clinic?',
     'a' => 'Yes. Repair consultations, corrective procedures and the reviews between stages all take place at the Rohini clinic, carried out by registered medical practitioners.'],
    ['q' => 'Which areas is the Rohini clinic practical for?',
     'a' => 'The clinic is in North-West Delhi near the Outer Ring Road, closest to North and North-West Delhi — Rohini, Pitampura, Shalimar Bagh and Prashant Vihar, for instance.'],
    ['q' => 'My transplant is six months old and looks patchy. Is it too early to judge?',
     'a' => 'Usually, yes. Growth is often uneven at six months and keeps improving until about twelve. You can still book a review now: the examination shows whether the result is simply unfinished or whether there is a fault, such as a hairline in the wrong position, that waiting will not change.'],
    ['q' => 'How long should I wait after my first transplant before repair surgery?',
     'a' => 'Generally around a year, so the result has matured and the scalp has settled; operating on a result that was still improving, or into recently operated skin, is not sensible. Faults that waiting will not change, such as a hairline in the wrong position, can be assessed earlier, and exceptions are decided case by case.'],
    ['q' => 'What should I bring to a repair consultation?',
     'a' => 'Whatever you have from the first procedure: the operative note, the graft count and the technique used. Photographs of how your hair looked before that surgery are especially useful. Bring a list of every medicine and supplement you take as well.'],
    ['q' => 'Can pluggy or tufted grafts be corrected?',
     'a' => 'Often, and they are among the more correctable problems. The tufted grafts are removed one at a time, their hair can be re-used further back, and single-hair grafts take their place at the front. Not every follicle survives removal, and each one leaves a tiny mark.'],
    ['q' => 'Can a hairline that was set too low be moved back?',
     'a' => 'Only partly. Grafted hair keeps growing where it was put, so the line can only be raised by taking grafts out one at a time and, where a follicle survives, re-implanting it elsewhere. It is slow, often staged, and every extraction site leaves a tiny mark.'],
    ['q' => 'Will the doctor criticise the clinic that did my first procedure?',
     'a' => 'No. You get a factual description of what the examination shows and what can realistically change. Commenting on another clinic is not part of the consultation; your operative record, if you have one, is used only to plan the correction.'],
    ['q' => 'How many sessions does a repair usually need?',
     'a' => 'Often two or more. Removing grafts, adding density and grafting into scar are usually spread across separate sessions so that operated skin is not overloaded. The likely number of stages is set out in your written plan before the first one.'],
    ['q' => 'Can a visible donor scar be improved?',
     'a' => 'Sometimes. A strip scar can often be made less visible by grafting hair into it, by pigment that reduces the contrast with the scalp, or by both. Dot scarring from heavy extraction is harder, because the problem is thinning across an area rather than one line, and pigment often does more for it than grafts.'],
    ['q' => 'What if my donor area was over-harvested?',
     'a' => 'Donor hair that has been taken cannot be put back. Where the donor has been thinned too far, the options are camouflage rather than replacement: pigment to reduce the contrast between hair and scalp, careful use of whatever donor remains, and medical treatment to protect what is left.'],
    ['q' => 'How long is a repair procedure, and do I go home the same day?',
     'a' => 'Each stage is a day case under local anaesthetic, and you go home the same day. Working in previously operated skin is slower, graft for graft, so your timings are given beforehand. Eat a proper meal before you arrive, bring your medicines list, do not stop a prescribed medicine on your own, and arrange a lift or a cab rather than a two-wheeler.'],
    ['q' => 'Which side effects should I report straight away?',
     'a' => 'Swelling, crusting, numbness and temporary shedding are expected, and nearby hair can shed for a while after a further procedure. Call the clinic rather than waiting if you have a fever, spreading redness or warmth, pus or discharge, pain that gets worse after the first few days, or bleeding that does not stop with ten minutes of gentle pressure.'],
    ['q' => 'How much does hair transplant repair cost in Rohini?',
     'a' => 'There is no standard figure, because repair cases differ more than first procedures do. The written estimate after examination depends on what is being corrected, the removal work involved, the grafts the donor can still supply and the number of stages. <a href="/hair-transplant-cost-in-rohini">Hair transplant cost in Rohini</a> explains how graft-based pricing works. Instalment options through third-party lenders may be available — ask at the consultation, and see <a href="/cost-and-emi-options">cost and EMI options</a>.'],
    ['q' => 'Can I send photographs on WhatsApp before booking?',
     'a' => 'Yes. Photographs of the transplanted area, your hairline and the back of your head, sent on WhatsApp to ' . LOC_DELHI_PHONE_DISPLAY . ', help the appointment start from the right questions. What can change is decided only once the remaining donor hair has been measured in person. The clinic is open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . ').'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Hair Transplant Repair in Rohini'],
];

$page = [
    'title'         => 'Hair Transplant Repair in Rohini, Delhi: Options & Limits',
    'description'   => 'Hair transplant repair in Rohini, Delhi: tufted grafts, a low or hard hairline and donor damage assessed at 12 months, what can change, what cannot, and cost.',
    'url'           => '/hair-transplant-repair-in-rohini',
    'crumbs'        => $crumbs,
    'preload_image' => '/assets/img/services/svc-procedure-768.webp',
    'schema'        => [
        schema_delhi_clinic(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/hair-transplant-repair-in-rohini', [
            'name'          => 'Hair Transplant Repair',
            'alternateName' => ['Corrective hair transplant', 'Hair transplant revision', 'Hair transplant repair in Rohini, Delhi'],
            'procedureType' => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'Once the earlier result has matured, usually at around twelve months, the transplanted area and the remaining donor supply are assessed. Correction may combine removal of tufted or misangled grafts, with re-implantation where the follicles survive, single-hair grafts to soften a hard hairline, added density where the donor allows, and grafting into scar tissue, usually staged across sessions. Day cases under local anaesthetic at the Rohini, Delhi clinic.',
            'preparation'   => 'Review of the earlier operative record where available; examination and photographs of the hairline, the recipient area and the donor region; and measurement of the donor density that remains.',
            'followup'      => 'Reviews at the Rohini clinic with standardised photographs through shedding and regrowth, before any further stage is confirmed.',
            'expectedPrognosis' => 'Repair usually improves rather than fully reverses an unsatisfactory result, and the improvement is limited by the donor hair that remains. Donor hair already taken cannot be replaced. Outcomes vary between patients and cannot be promised.',
            'location'      => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
        ]),
        schema_faq('/hair-transplant-repair-in-rohini', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Rohini, Delhi</span>
        <h1 class="h1 mt-3">Hair Transplant Repair in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">If you are disappointed with how an earlier hair transplant turned out, the Rohini clinic can assess what is realistically correctable. Much can often be improved; little can be fully undone. The deciding factors are whether the result is finished and how much donor hair remains.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Hair transplant" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp the Rohini Clinic</a>
        </div>

        <?= ticks([
            'Result judged at around twelve months',
            'Remaining donor hair measured first',
            'Staged corrective work at the Rohini clinic',
            'A factual account, with no blame attached',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-procedure-768.webp" srcset="/assets/img/services/svc-procedure-512.webp 512w, /assets/img/services/svc-procedure-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: two pairs of tweezers, six punch tips and a slim steel handle laid out on a green surgical cloth" width="768" height="960" loading="eager" fetchpriority="high">
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

<?= lp_split([
    'img'     => 'svc-follicle',
    'alt'     => 'a sculpted cross-section of scalp skin with hair follicles and hair shafts, on a cream background',
    'eyebrow' => 'Timing',
    'title'   => 'Judge the Result at Twelve Months, Not Six',
    'html'    => '<p>Many people seek a repair opinion before their first transplant has finished growing. Hair returns in stages, and a result that looks thin at six months can still be on course.</p>'
               . '<p>Some faults do not change with waiting: a hairline in the wrong position, grafts aimed the wrong way or clumped grafts at the front. Those can be assessed early, although any surgery still waits until the scalp has settled. Compare your progress with <a href="/blog/hair-transplant-growth-timeline-month-by-month">the month-by-month growth timeline</a>.</p>',
    'points'  => [
        'Weeks 2–4: transplanted hairs usually shed; the follicles stay',
        'Months 3–4: fine, uneven regrowth begins',
        'Month 6: patchy and thin can still be on course',
        'Month 12: the usual point to plan any correction',
    ],
]) ?>

<section class="section section--canvas" id="problems">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">What gets corrected</p>
      <h2 class="h2 mt-2">Common Problems a Repair Addresses</h2>
      <p class="body mt-3">Disappointing results tend to fall into a few recognisable groups, and most repair plans deal with more than one. The surgery uses the same methods as a first <a href="/hair-transplant-in-rohini">hair transplant in Rohini</a>, applied with more caution; if the hairline is your main concern, <a href="/hairline-transplant-in-rohini">hairline transplant in Rohini</a> explains how a front edge is designed and agreed.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card"><?= icon('hairline', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Pluggy or tufted grafts</h3><p class="body-s mt-2">Grafts carrying three or four hairs along the front row, where one-hair grafts belong, give a clumped look. Often among the more correctable problems.</p></div>
      <div class="card"><?= icon('pencil', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">A hard, straight edge</h3><p class="body-s mt-2">A line with no soft transition. Scattered one-hair grafts placed ahead of and among the existing ones usually break it up.</p></div>
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">A hairline set too low</h3><p class="body-s mt-2">The hardest design fault to undo, because raising the line means taking hair out, not moving it.</p></div>
      <div class="card"><?= icon('settings', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Wrong angle or direction</h3><p class="body-s mt-2">Hairs that stick up or run against their neighbours. The angle cannot be changed in place, so the graft is removed and re-placed.</p></div>
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Thin or patchy growth</h3><p class="body-s mt-2">More grafts can be added into the area, but only if the donor can still supply them.</p></div>
      <div class="card"><?= icon('shield', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">An over-harvested donor</h3><p class="body-s mt-2">A back of the head thinned by heavy extraction, or a wide scar from strip surgery. This limits everything else.</p></div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'intro-donor',
    'alt'     => 'a mannequin head seen from behind, with a band across the back and sides of the head shaded green',
    'eyebrow' => 'The limiting factor',
    'title'   => 'The Donor Hair You Have Left Sets the Ceiling',
    'reverse' => true,
    'html'    => '<p>Repair has no fresh supply of hair. Whether a graft softens a line, fills a thin patch or covers a scar, it comes from the donor region the first procedure has already drawn on. That is why the donor is measured before anything else.</p>'
               . '<p>The ceiling is lower when a large number of grafts has already been taken, the back shows thin or moth-eaten patches, extraction was concentrated in one zone, or there has been more than one previous procedure. <a href="/blog/donor-area-limits-hair-transplant">Why donor hair is a one-time budget</a> explains the arithmetic.</p>'
               . '<p><b>Signs of more room to work:</b></p>',
    'points'  => [
        'Fewer grafts were used the first time',
        'The back and sides still measure as dense',
        'Earlier extraction is evenly spread',
        'The fault lies in placement, not quantity',
    ],
]) ?>

<section class="section section--canvas" id="limits">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Realistic limits</p>
      <h2 class="h2 mt-2">What Repair Can Improve, and What It Cannot</h2>
      <p class="body mt-3">Every repair plan includes a written ceiling, so you know what will and will not change before you agree to anything. As a general guide, problem by problem:</p>
    </div>
    <div class="card mt-6" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data" style="min-width:680px">
          <caption class="sr-only">Common hair transplant repair problems: what repair can usually do and what it cannot change — a general guide, not a promise</caption>
          <thead>
            <tr><th scope="col">The problem</th><th scope="col">What repair can usually do</th><th scope="col">What it cannot change</th></tr>
          </thead>
          <tbody>
            <?php foreach ($repairRows as $r): ?>
            <tr>
              <th scope="row" style="white-space:normal;width:24%"><?= e($r['problem']) ?></th>
              <td><?= e($r['can']) ?></td>
              <td><?= e($r['cannot']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="grid grid--2 mt-5">
      <div class="note"><p class="h4">Removing grafts</p><p class="body-s mt-2">Grafts come out one at a time. Not every follicle survives to be re-used, every extraction site leaves a tiny mark, and a follicle that is not fully removed can occasionally regrow. For hairs that only need to go, <a href="/laser-hair-removal-in-rohini">laser hair removal</a> may suit selected cases, depending on hair colour and skin type.</p></div>
      <div class="note"><p class="h4">Pigment instead of grafts</p><p class="body-s mt-2">Scalp micropigmentation places pigment in the skin to reduce the contrast between hair and scalp. It adds no hair and spends no donor, but it fades over the years and needs touch-ups. If it would help more than further surgery, the doctor will say so.</p></div>
    </div>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'At the Rohini clinic',
    'title'   => 'How a Repair Is Planned and Staged',
    'intro'   => 'Consultations and corrective procedures at Rohini are carried out by registered medical practitioners, with more time spent on assessment than for a first transplant.',
    'tone'    => 'white',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope beside a notepad and a potted fern on a wooden desk',               'title' => 'Records and examination', 'text' => 'Bring the operative note, graft count and technique if you have them. The transplanted area, the hairline and the donor are examined and photographed.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing an outline drawing of a head, beside a blank sheet of paper',    'title' => 'A written ceiling',       'text' => 'What can improve, what cannot, the likely number of stages and the cost factors for each, set down before anything is booked.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with several dates circled in green',                             'title' => 'Staged correction',       'text' => 'Often removal and redistribution first, as a day case under local anaesthetic; then regrowth and a review at Rohini before density, softening or scar work.'],
    ],
]) ?>

<section class="section section--canvas" id="recovery">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Recovery and risks</p>
      <h2 class="h2 mt-2">Recovery and Reviews at the Rohini Clinic</h2>
      <p class="body mt-3">Recovery after corrective work closely follows a first transplant. Reviews between stages take place at the Rohini clinic; <a href="/delhi-clinic">directions to the Rohini clinic</a> and its hours are on the clinic page.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card"><span class="pill">First fortnight</span><h3 class="h4 mt-3">Healing skin</h3><p class="body-s mt-2">Swelling and crusting usually settle within one to two weeks. Wash as you were shown on the day.</p></div>
      <div class="card"><span class="pill">First weeks</span><h3 class="h4 mt-3">Temporary shedding</h3><p class="body-s mt-2">Transplanted hair, and some of the hair around it, can shed after a further procedure. It usually regrows.</p></div>
      <div class="card"><span class="pill pill--ink">Ongoing</span><h3 class="h4 mt-3">Protecting native hair</h3><p class="body-s mt-2">Medication does not change the grafts, but it helps protect the hair around them. See <a href="/hair-fall-treatment-in-rohini">hair fall treatment in Rohini</a>.</p></div>
    </div>
    <div class="grid grid--2 mt-5">
      <div class="note"><p class="h4">Why a second operation is harder</p><div class="mt-2"><?= ticks([
          'Scarred skin is firmer and harder to work in',
          'It carries less blood, so grafts take less reliably',
          'Existing hair has to be worked around',
          'Part of the donor has already been used',
      ], false) ?></div></div>
      <div class="note"><p class="h4">Risks, plainly</p><p class="body-s mt-2">Lower graft survival in scar tissue, small marks where grafts are removed, temporary shedding of nearby hair, and the general surgical risks of infection and poor growth. Results vary, and no repair outcome can be promised. The <a href="/blog/hair-transplant-repair-options">guide to hair transplant repair options</a> covers these in more depth.</p></div>
    </div>
    <div class="card card--tint card--pad-lg mt-5" id="recovering-in-delhi">
      <h3 class="h3">Recovering in Delhi, Stage by Stage</h3>
      <p class="body-s mt-2 measure">A staged repair means more than one healing fortnight, so it is worth planning each around Delhi’s seasons. These are general practicalities; your written aftercare comes first.</p>
      <div class="mt-3"><?= ticks([
          'Summer heat: sweat softens crusts and makes the scalp itch, so keep exertion low and the hottest hours indoors',
          'The smog season: limit time outdoors on poor-air days, and choose a mask with ear loops so no strap crosses the donor area',
          'Dust: keep the scalp clean with the washing routine you were shown, without scrubbing the crusts',
          'Helmets: plan cabs to and from each stage, riding pillion included, until a review clears one',
      ], false) ?></div>
      <p class="body-s mt-3">More in <a href="/blog/hair-transplant-recovery-in-delhi">hair transplant recovery in Delhi</a>.</p>
    </div>
  </div>
</section>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Cost guidance</p>
      <h2 class="h2 mt-2">Hair Transplant Repair Cost in Rohini: What Shapes It</h2>
      <p class="body mt-3">Repair is quoted only after examination, and estimates vary more than for a first transplant. Working in previously operated skin is slower, graft for graft, so correction usually costs more than a first procedure of similar size.</p>
    </div>
    <div class="grid grid--3 mt-5">
      <div class="card"><p class="h4">The fault being corrected</p><p class="meta mt-1">A softened edge is smaller work than added density</p></div>
      <div class="card"><p class="h4">Removal work</p><p class="meta mt-1">Taking grafts out is slow and precise</p></div>
      <div class="card"><p class="h4">Grafts available</p><p class="meta mt-1">Limited by the donor that remains</p></div>
      <div class="card"><p class="h4">Number of stages</p><p class="meta mt-1">Two or more is common</p></div>
      <div class="card"><p class="h4">Scar tissue</p><p class="meta mt-1">Slower, less predictable work</p></div>
      <div class="card"><p class="h4">Treatment alongside</p><p class="meta mt-1">Medication or pigment, where part of the plan</p></div>
    </div>
    <p class="body-s mt-4 measure">The estimate is itemised and in writing, with the cost factors set out for each stage. Where grafts are added, the pricing works as it does for a first transplant: graft count multiplied by a per-graft rate, plus what the estimate includes. Instalment options through third-party lenders may be available — ask at the consultation, and see <a href="/cost-and-emi-options">cost and EMI options</a>.</p>
    <p class="mt-4"><a class="hp-link" href="/hair-transplant-cost-in-rohini">How graft-based pricing works: hair transplant cost in Rohini <?= hp_icon('arrow', 15, 2) ?></a></p>
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
        <h2 class="h2 mt-2">Hair Transplant Repair in Rohini: Common Questions</h2>
        <p class="body-s mt-3">General patient education. How much your own result can change depends on your remaining donor hair, which has to be examined first.</p>
        <a class="btn btn--accent mt-4" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= latest_posts_strip('hair-transplant', 3, 'Further Reading') ?>

<?= local_block(
    'Visit Our Rohini Clinic',
    'Repair consultations, staged corrective work and the reviews between stages all take place at our clinic in North-West Delhi. The clinic card below has the phone number, hours and a map link.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= lp_cta([
    'eyebrow'   => 'Rohini, Delhi',
    'title'     => 'Book a Repair Consultation in Rohini',
    'text'      => 'Bring your operative note and any photographs from before the first procedure. The result is examined, your remaining donor hair is measured, and you leave with a written ceiling for what can change, not a promise.',
    'treatment' => 'Hair transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
