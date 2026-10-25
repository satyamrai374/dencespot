<?php
/**
 * /crown-hair-transplant-in-rohini — crown (vertex) spoke for the Rohini clinic.
 *
 * October 2026 (batch 2). The agency confirmed on 13 Oct 2026 that every
 * DenceSpot service is carried out at the Rohini clinic. Medical facts follow
 * the existing crown page; the wording is new. Client rule (14 Oct 2026):
 * Rohini pages do not mention or link the other location.
 *
 * Cannibalisation split: /hairline-transplant-in-rohini owns the front and the
 * FUE/DHI spokes own technique. This page owns why the crown consumes grafts,
 * budgeting donor hair against the front, staging, waiting with an opening
 * crown, and medical treatment alongside. No graft-per-area figures, coverage
 * percentages or survival rates — the clinic has evidenced none.
 *
 * Not yet reviewed by the clinic's doctor: doctor_block(..., false), no review
 * byline, not in MEDICAL_PAGES, and no named performer in the schema.
 *
 * SEO round 3 (14 Oct 2026, COMPETITOR-SEO §4 #6, §5): title "<Service> in
 * Rohini, Delhi: <modifier>", an options table (transplant, medicines, PRP,
 * scalp pigment — facts already on this page), a "Recovering in Delhi"
 * lp_split, the cost H2 linking /hair-transplant-cost-in-rohini, and 15 FAQs.
 * Scalp pigment stays a general option: it is not on record as offered at
 * Rohini, so it is neither claimed nor linked. lp_steps moved to the white
 * tone so backgrounds still alternate.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/**
 * Crown options side by side. Every cell restates a fact already on this page
 * (or, for pigment fading, the Rohini repair page); it compares, not ranks.
 */
$optionRows = [
    ['option' => 'A transplant',
     'does'   => 'Moves your own follicles into the crown, each site set to follow the whorl. Often staged across two sessions.',
     'limit'  => 'Does nothing for the native hair around it. A crown that keeps widening can leave the grafts as an island.',
     'donor'  => 'Yes — grafts the front cannot have later'],
    ['option' => 'Medicines',
     'does'   => 'Well established for the vertex. Often tried first where hair is thinning rather than gone, and usually continued after surgery.',
     'limit'  => 'Cannot bring back hair where the follicles are gone, and the gain fades if treatment stops.',
     'donor'  => 'No'],
    ['option' => 'PRP',
     'does'   => 'Used alongside medicines to support thinning hair.',
     'limit'  => 'Does not regrow a bald crown, and its evidence is more limited.',
     'donor'  => 'No'],
    ['option' => 'Scalp pigment',
     'does'   => 'Gives the look of density, instead of surgery or alongside it.',
     'limit'  => 'Adds no actual hair; it fades over the years and needs touch-ups.',
     'donor'  => 'No'],
];

$faqs = [
    ['q' => 'Is a crown transplant carried out at the Rohini clinic?',
     'a' => 'Yes. Crown hair transplants are carried out at the Rohini clinic in North-West Delhi by registered medical practitioners, and the mapping, the procedure and the follow-up reviews all take place there.'],
    ['q' => 'Should the crown or the hairline be treated first?',
     'a' => 'Where both areas are thinning and donor hair is limited, the front is usually treated first, because it is what people see when they talk to you and it returns more visible change per graft. When thinning is confined to the vertex and the hairline is holding steady, the crown can reasonably go first.'],
    ['q' => 'Will my crown need more than one session?',
     'a' => 'Quite possibly. Crowns are staged more often than hairlines, partly because the vertex can keep widening and partly because worthwhile coverage across a circle can need more grafts than one session should take. If a second stage looks likely, it is written into your plan before you start.'],
    ['q' => 'Can medicines treat crown thinning instead of surgery?',
     'a' => 'Medicines have a well-established role at the vertex, and where the hair is thinning rather than gone they are often the first step. Whether they suit you is decided at the assessment. They also usually continue after a transplant, for the native hair the grafts do not replace.'],
    ['q' => 'Will my crown look as thick as it did at twenty?',
     'a' => 'Usually the realistic aim is better coverage at ordinary viewing distances, not the density you once had. Chasing fullness under overhead light tends to cost more donor hair than it returns. What is realistic for your crown is discussed at the assessment.'],
    ['q' => 'Why does the crown look thin for so long afterwards?',
     'a' => 'The growth timeline is the usual one — shedding in the first weeks, new hair from around three to four months, a result judged at about ten to twelve months. A crown tends to look patchy for longer than a hairline because the same number of new hairs is spread over a bigger area. On the plus side, healing at the vertex is mostly out of sight when people face you. The <a href="/blog/hair-transplant-growth-timeline-month-by-month">month-by-month growth timeline</a> shows what to expect.'],
    ['q' => 'Will PRP help my crown?',
     'a' => 'It is used to support thinning hair rather than to regrow a bald crown, usually alongside medicines, and its evidence is more limited. It does not replace grafting where the follicles are gone. See <a href="/hair-prp-treatment-in-rohini">hair PRP treatment in Rohini</a> for what it can and cannot do.'],
    ['q' => 'Is scalp pigment an alternative to a crown transplant?',
     'a' => 'It can be considered, instead of surgery or alongside it. Pigment in the skin gives the look of density without spending donor hair, which matters in an area that uses grafts quickly. It adds no actual hair, and it fades over the years and needs touch-ups.'],
    ['q' => 'Does a crown transplant hurt?',
     'a' => 'The local anaesthetic injections are the uncomfortable part; after that the area is numb, though you may feel pressure, and a crown session can be long. Soreness for a few days afterwards is usual and managed with prescribed medication.'],
    ['q' => 'How long does the procedure take, and do I go home the same day?',
     'a' => 'It scales with the graft count. Smaller sessions take a few hours; larger ones, which crowns often are, run through most of the day with breaks for food and rest. It is a day case under local anaesthetic, so you go home the same day. Eat beforehand, bring your medicines list, and do not stop a prescribed medicine on your own.'],
    ['q' => 'When can I go back to work, wear a helmet or go to the gym?',
     'a' => 'Most people return to desk work within a few days, and healing at the vertex is mostly out of sight when people face you. Helmets and tight caps wait until a review clears them, and then only loose-fitting ones. Full gym training usually resumes at around three to four weeks and swimming at around four, and the crown is shaded from strong sun for the first few weeks.'],
    ['q' => 'How much does a crown transplant cost in Rohini?',
     'a' => 'There is no fixed price. Cost follows the measured size of the area, the coverage aimed for, what your donor can spare and whether the work is staged, and it is quoted itemised and in writing after the assessment. <a href="/hair-transplant-cost-in-rohini">Hair transplant cost in Rohini</a> shows how a graft count becomes a figure. Instalment options through third-party lenders may be available — ask at the consultation, and see <a href="/cost-and-emi-options">cost and EMI options</a>.'],
    ['q' => 'Which side effects should I report straight away?',
     'a' => 'Swelling, crusting, numbness and temporary shedding are expected. Call the clinic rather than waiting if you have a fever, spreading redness or warmth, pus or discharge, pain that gets worse after the first few days, or bleeding that does not stop with ten minutes of gentle pressure.'],
    ['q' => 'Can I send photographs on WhatsApp before booking?',
     'a' => 'Yes. A photograph of the crown from above, plus your hairline and the back of your head, sent on WhatsApp to ' . LOC_DELHI_PHONE_DISPLAY . ', helps the appointment start from the right questions. The graft number comes only once the area has been measured in person. The clinic is open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . ').'],
    ['q' => 'Where is the Rohini clinic, and which areas is it near?',
     'a' => 'It is in North-West Delhi near the Outer Ring Road, within reach of North and North-West Delhi localities such as Rohini, Pitampura, Shalimar Bagh and Prashant Vihar. The clinic page has the hours and a Google Maps link.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Crown Hair Transplant in Rohini'],
];

$page = [
    'title'         => 'Crown Hair Transplant in Rohini, Delhi: Staging & Cost',
    'description'   => 'Crown hair transplant in Rohini, Delhi: why the vertex uses so many grafts, sharing donor hair with the front, staging, the options compared and cost factors.',
    'url'           => '/crown-hair-transplant-in-rohini',
    'crumbs'        => $crumbs,
    'preload_image' => '/assets/img/services/svc-crown-768.webp',
    'schema'        => [
        schema_delhi_clinic(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/crown-hair-transplant-in-rohini', [
            'name'          => 'Crown Hair Transplant',
            'alternateName' => ['Vertex hair transplant', 'Crown hair restoration', 'Crown hair transplant in Rohini, Delhi'],
            'procedureType' => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'  => 'Vertex of the scalp',
            'howPerformed'  => 'Follicular units are extracted from the donor scalp and sorted under magnification. Recipient sites are made across the vertex following the spiral of the whorl, with the angle and direction of each site changing around it, and grafts are placed to build coverage outward from the whorl. A day case under local anaesthetic at the Rohini, Delhi clinic, sometimes staged across more than one session.',
            'preparation'   => 'Examination and measurement of the area to be covered, assessment of how the vertex is likely to progress, donor density measurement, review of medicines, and an agreed order of treatment between the crown and the front of the scalp.',
            'followup'      => 'Washing taught and a review in the first week, then photographic reviews at the Rohini clinic as the transplanted hair sheds and regrows, with medical treatment for the surrounding native hair where advised.',
            'expectedPrognosis' => 'Transplanted hairs commonly shed within the first weeks; new growth usually begins at around three to four months and the result is judged at about ten to twelve months. The vertex may keep widening with age and a further session is sometimes needed. Outcomes vary between patients and cannot be promised.',
            'location'      => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
        ]),
        schema_faq('/crown-hair-transplant-in-rohini', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Rohini · North-West Delhi</span>
        <h1 class="h1 mt-3">Crown Hair Transplant in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">Thinning at the crown, the vertex at the back of the top of the head, can be treated with a transplant at our Rohini clinic. It is also the area that uses grafts fastest and keeps widening longest, so your plan weighs it against what the front of your scalp may need later, and says before you start whether a second session is likely.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/delhi-clinic#book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Hair transplant" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp the Rohini Clinic</a>
        </div>

        <?= ticks([
            'Crown area mapped and measured',
            'Donor hair budgeted against the front',
            'Staging stated before you start',
            'Carried out at the Rohini clinic',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-crown-768.webp" srcset="/assets/img/services/svc-crown-512.webp 512w, /assets/img/services/svc-crown-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a white mannequin head seen from above, with green felt hair and a bald patch at the crown, on a cream background" width="768" height="960" loading="eager" fetchpriority="high">
          <?= hp_ai_chip('AI-generated illustration') ?>
        </div>
        <div class="hero__badge-card">
          <p class="eyebrow">Rohini clinic</p>
          <p class="h4 mt-1"><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></p>
          <p class="meta"><?= e(HOURS_DISPLAY) ?><span style="display:block"><?= e(HOURS_NOTE) ?></span></p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= lead_strip() ?>

<section class="section section--white" id="why-grafts">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">The vertex</p>
      <h2 class="h2 mt-2">Why the Crown Uses So Many Grafts</h2>
      <p class="body mt-3">Three features of the crown, taken together, explain why it is planned differently from the hairline.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card"><?= icon('settings', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">A spiral, not a slope</h3><p class="body-s mt-2">Crown hair grows out from a whorl, so its direction changes all the way round. Each site is made at its own angle; one uniform angle gives a flat, brushed-down patch.</p></div>
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">A disc, not a band</h3><p class="body-s mt-2">A receding hairline is a strip. A crown is a circle, and the grafts it needs rise sharply as its diameter grows.</p></div>
      <div class="card"><?= icon('clock', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">An edge that moves</h3><p class="body-s mt-2">Vertex loss commonly keeps widening for years, so today’s boundary may not be the final one.</p></div>
    </div>
    <div class="note mt-4">
      <p class="body-s"><b>Measured, not guessed.</b> Two crowns that seem similar in the bathroom mirror may call for quite different graft counts, so the area is measured at the examination. For the overall process, see <a href="/hair-transplant-in-rohini">hair transplant in Rohini</a>.</p>
    </div>
  </div>
</section>

<section class="section section--canvas" id="donor-budget">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Donor budgeting</p>
      <h2 class="h2 mt-2">Sharing Donor Hair Between the Crown and the Front</h2>
      <p class="body mt-3">Your donor area gives a limited number of grafts over a lifetime, and extracted follicles do not grow back. Every graft spent on the crown is one the front cannot have later.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="card card--pad-lg">
        <h3 class="h3">The front usually comes first when</h3>
        <div class="mt-3"><?= ticks([
            'Thinning at the hairline as well as the vertex',
            'A donor area that cannot cover both',
            'Loss that has not yet settled',
            'A crown opening up at a young age',
        ], false) ?></div>
      </div>
      <div class="card card--pad-lg">
        <h3 class="h3">The crown can come first when</h3>
        <div class="mt-3"><?= ticks([
            'Thinning confined to the vertex',
            'A hairline that is holding steady',
            'Plenty of donor hair, and loss that has stopped moving',
            'The vertex is the part that bothers you most',
        ], false) ?></div>
      </div>
    </div>
    <p class="body-s mt-5 measure">The front tends to win because it is what people see when they face you; the vertex is mostly noticed from above or behind. Keeping a reserve leaves room for a <a href="/hairline-transplant-in-rohini">hairline transplant in Rohini</a> later. More in <a href="/blog/donor-area-limits-hair-transplant">what a donor area can and cannot cover</a>.</p>
  </div>
</section>

<?= lp_split([
    'img'     => 'intro-donor',
    'alt'     => 'a mannequin head seen from behind, with the donor area at the back and sides marked',
    'eyebrow' => 'Staging',
    'title'   => 'One Session or Two?',
    'html'    => '<p>Crown work is staged more often than frontal work, because useful coverage across a circle can need more grafts than one session should take from the donor area.</p>'
               . '<p>A second stage is usually considered once the first has grown and the crown has been reassessed, so the decision rests on what has actually happened. Where one is likely, it is written into your plan before you commit.</p>'
               . '<p>Crown grafts are usually placed into pre-made sites, which is efficient over a larger area — see <a href="/fue-hair-transplant-in-rohini">FUE hair transplant in Rohini</a>.</p>',
    'points'  => [
        'Any likely second stage stated in writing first',
        'Aim: better coverage at ordinary viewing distances',
        'Not the thickness you had in your early twenties',
    ],
]) ?>

<?= lp_split([
    'img'     => 'stage-extensive',
    'alt'     => 'a mannequin head seen from above, with green felt hair left only at the sides and back',
    'eyebrow' => 'When to wait',
    'title'   => 'Crown Loss in Your Twenties: Why Surgery Often Waits',
    'reverse' => true,
    'tone'    => 'canvas',
    'html'    => '<p>When the vertex starts thinning early, it usually carries on for years. Grafts placed in the centre of a patch that is still spreading end up as an island, with fresh thinning forming a ring around them and donor hair already used.</p>'
               . '<p>Medical treatment to slow the loss comes first, with a fresh look at surgery once the pattern has become clear. The medical route is set out on <a href="/hair-fall-treatment-in-rohini">hair fall treatment in Rohini</a>. If waiting is the advice for you, you will hear it at the assessment.</p>',
    'points'  => [
        'An opening crown in a young patient',
        'Loss that is still visibly progressing',
        'Thinning rather than bald, where medicines may help',
        'An untreated cause, such as low iron',
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-hair-transplant',
    'alt'     => 'a sculpted model of a follicular unit with three hairs, on a cream background',
    'eyebrow' => 'Alongside surgery',
    'title'   => 'Medical Treatment and Other Support for the Crown',
    'html'    => '<p>A transplant moves hair into the crown; it does nothing for the native hair around it. That is why most crown plans include treatment for the surrounding hair.</p>'
               . '<p><b>Medicines</b> are well established for the vertex, often tried first and usually continued after surgery; <a href="/blog/minoxidil-and-finasteride-in-india">minoxidil and finasteride in India</a> covers the common options. <b>PRP</b> is used alongside them to support thinning hair, but it does not regrow a bald crown — see <a href="/hair-prp-treatment-in-rohini">hair PRP treatment in Rohini</a>.</p>'
               . '<p><b>Scalp pigment</b> can give the look of density without spending donor hair. It adds no actual hair.</p>',
]) ?>

<section class="section section--canvas" id="options-compared">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Options compared</p>
      <h2 class="h2 mt-2">Crown Thinning: Transplant, Medicines, PRP or Pigment</h2>
      <p class="body mt-3">The four are often combined rather than chosen between, and which mix suits you is decided at the assessment. The table is a general guide to what each can and cannot do.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data" style="min-width:720px">
          <caption class="sr-only">Options for crown thinning compared: what each does, what it cannot do, and whether it uses donor hair — a general guide, not a recommendation</caption>
          <thead>
            <tr><th scope="col">Option</th><th scope="col">What it does</th><th scope="col">What it cannot do</th><th scope="col">Uses donor hair?</th></tr>
          </thead>
          <tbody>
            <?php foreach ($optionRows as $r): ?>
            <tr>
              <th scope="row" style="white-space:normal"><?= e($r['option']) ?></th>
              <td><?= e($r['does']) ?></td>
              <td><?= e($r['limit']) ?></td>
              <td><?= e($r['donor']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">Not sure whether your crown is thinning or bald? The six-question <a href="/hair-loss-assessment">hair loss self-assessment</a> helps you describe it before you book, and <a href="/hair-fall-treatment-in-rohini">hair fall treatment in Rohini</a> covers the medical route.</p>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'At the Rohini clinic',
    'title'   => 'What Happens at Rohini, Step by Step',
    'intro'   => 'Consultations, procedures and reviews take place at the Rohini clinic and are carried out by registered medical practitioners. Swelling, crusting, numbness and temporary shedding are expected; infection and poor growth are uncommon; results vary.',
    'tone'    => 'white',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a wooden desk', 'title' => 'Mapping and planning', 'text' => 'The crown is measured and photographed from above and donor density checked. Order, graft number and any likely second stage go into a written plan.'],
        ['img' => 'hero', 'alt' => 'a sculpted cross-section of scalp skin with hair follicles and their roots', 'title' => 'Procedure day', 'text' => 'Extraction and sorting under magnification, then sites made around the whorl, each following the spiral. A day case under local anaesthetic.'],
        ['img' => 'step-followup', 'alt' => 'a desk calendar with review dates circled', 'title' => 'Healing and reviews', 'text' => 'Sleep as instructed, shade the crown from strong sun, no caps or helmets until cleared. Reviews to about twelve months.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-hair-fall',
    'alt'     => 'a wooden comb resting on a stack of folded towels',
    'eyebrow' => 'Local practicalities',
    'title'   => 'Recovering in Delhi: Sun, Sweat, Smog and Helmets',
    'id'      => 'recovering-in-delhi',
    'reverse' => true,
    'tone'    => 'canvas',
    'html'    => '<p>The crown faces the sky and sits right under a helmet, so Delhi’s weather and roads matter more here than at the front. None of this changes the medical plan, and your written aftercare comes first.</p>'
               . '<p>Season by season, <a href="/blog/hair-transplant-recovery-in-delhi">hair transplant recovery in Delhi</a> covers the detail, from the summer heat to the smog season and the journey home.</p>',
    'points'  => [
        'Sun: shade the crown from direct sun for the first few weeks, with a loose hat only once you are cleared',
        'Summer heat: sweat softens crusts and makes the scalp itch, so keep the hottest hours indoors and let sweat dry',
        'The smog season: keep outdoor time short on poor-air days; a mask with ear loops keeps straps off the donor area',
        'Helmets press directly on the crown: plan cabs, riding pillion included, until a review clears a loose one',
    ],
]) ?>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Cost guidance</p>
      <h2 class="h2 mt-2">Crown Hair Transplant Cost in Rohini: What Decides It</h2>
      <p class="body mt-3">There is no fixed price. The graft number follows the measured area and your donor supply, and the estimate is itemised and in writing after your assessment.</p>
    </div>
    <div class="grid grid--3 mt-5">
      <div class="card"><p class="h4">Size of the area</p><p class="meta mt-1">Measured, not judged from a photo</p></div>
      <div class="card"><p class="h4">Coverage aimed for</p><p class="meta mt-1">Ordinary viewing, not overhead light</p></div>
      <div class="card"><p class="h4">Donor density</p><p class="meta mt-1">What can be taken, and what is kept back</p></div>
      <div class="card"><p class="h4">Sessions</p><p class="meta mt-1">One sitting, or staged across two</p></div>
      <div class="card"><p class="h4">Hair type</p><p class="meta mt-1">Calibre, curl and colour contrast</p></div>
      <div class="card"><p class="h4">Supporting treatment</p><p class="meta mt-1">Medicines or PRP alongside</p></div>
    </div>
    <p class="body-s mt-4 measure">Two questions for any crown quote: how was the area measured, and what will be left in the donor area for the front? The <a href="/hair-transplant-graft-calculator">graft calculator</a> gives a starting range. Instalment options through third-party lenders may be available — ask at the consultation, and see <a href="/cost-and-emi-options">payment and EMI options</a>. Assessments take place at the Rohini clinic; the clinic page has <a href="/delhi-clinic">directions to the Rohini clinic</a>. No clinic can promise a particular density.</p>
    <p class="mt-4"><a class="hp-link" href="/hair-transplant-cost-in-rohini">Hair transplant cost in Rohini, worked through <?= hp_icon('arrow', 15, 2) ?></a></p>
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
        <h2 class="h2 mt-2">Crown Transplant in Rohini: Questions Answered</h2>
        <p class="body-s mt-3">General patient education. How many grafts your crown needs, and when it should be done, is worked out at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= latest_posts_strip('hair-transplant', 3, 'Further Reading') ?>

<?= local_block(
    'Visit Our Rohini Clinic',
    'Crown assessments, procedures and the reviews that follow take place at the Rohini clinic in North-West Delhi, near the Outer Ring Road.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= lp_cta([
    'eyebrow'   => 'Rohini, Delhi',
    'title'     => 'Have Your Crown Measured in Rohini',
    'text'      => 'Bring your questions and a list of your medicines. The area is measured rather than estimated, and you get an honest view of whether the crown should come now or after the front, what your donor can support, and whether a second stage is likely — in writing.',
    'treatment' => 'Hair transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
