<?php
/**
 * /hair-transplant-delhi/ — the Delhi hair transplant page, parent of every
 * Delhi locality page (/hair-transplant-delhi/rohini, /…/pitampura).
 *
 * Built 25 Oct 2026 on the /hair-transplant-in-gurgaon design (client request)
 * from the content of the old /hair-transplant-in-rohini, which now 301s to
 * /hair-transplant-delhi/rohini. Section order follows the Gurgaon page:
 *
 *  1. Treatment overview: copy, the recorded before/after case, at a glance
 *  2. Why DenceSpot, beside the clinic's FUE handpiece
 *  3. Areas we serve: the locality pages (includes/delhi-localities.php)
 *  4. Before and after: consented composites
 *  5. The doctors: the homepage's three tiles, worded for Rohini
 *  6. Techniques: FUE and DHI at the clinic; FUT for comparison only
 *  7. Procedure: five steps, icons instead of the Gurgaon page's AI images
 *  8. Cost: factors, Norwood graft bands (as /hair-transplant-cost-in-rohini)
 *  9. FAQs (the same array drives the JSON-LD; six shown, the rest behind
 *     "View more")
 * 10. Consultation: the Rohini clinic's details and form
 *
 * Left out on purpose: the Gurgaon page's AI images (no AI images on Rohini
 * pages), its patient videos (filmed for the Gurugram clinic) and its Google
 * reviews widget (the Gurugram listing). Who treats patients at Rohini is not
 * on record, so no doctor is named as performer.
 */

declare(strict_types=1);

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/schema.php';
require_once __DIR__ . '/../includes/gallery-manifest.php';
require_once __DIR__ . '/../includes/delhi-areas.php';

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair Transplant in Delhi'],
];

/** General patient-education bands, not a quote. Same as the Rohini cost guide. */
$bands = [
    ['stage' => 'Norwood II',              'grafts' => '800 – 1,500',    'focus' => 'Medical treatment first; a small hairline session once stable'],
    ['stage' => 'Norwood III',             'grafts' => '1,200 – 2,000',  'focus' => 'Hairline and temples'],
    ['stage' => 'Norwood III vertex – IV', 'grafts' => '1,800 – 2,600',  'focus' => 'The front first; the crown as the donor allows'],
    ['stage' => 'Norwood V',               'grafts' => '2,500 – 3,500',  'focus' => 'Front priority, sometimes staged'],
    ['stage' => 'Norwood VI – VII',        'grafts' => '3,000 – 4,500+', 'focus' => 'Staged sessions for coverage, not full density'],
];

$areaLinks = [];
foreach (delhi_localities_live() as $slug => $loc) {
    $areaLinks[] = '<a href="' . e(delhi_locality_url($slug)) . '">' . e($loc['name']) . '</a>';
}

$faqs = [
    [
        'q' => 'How long do transplanted hairs last?',
        'a' => 'Grafts are taken from the back and sides of the scalp, where hair generally resists the hormonal process behind pattern hair loss, and they usually keep that character after the move. The hair around them that was not transplanted can keep thinning with age, so medicines or a later session may be part of a long-term plan. No clinic can promise a particular density.',
    ],
    [
        'q' => 'How many grafts might I need?',
        'a' => 'That depends on the area to be covered and on what your donor area can safely give, which is measured at the examination. As general bands, early temple recession (Norwood II) may need around 800–1,500 grafts, a receding hairline (Norwood III) around 1,200–2,000, and Norwood V around 2,500–3,500, sometimes over two sessions. The <a href="/hair-transplant-graft-calculator">graft calculator</a> gives a starting range; the examination gives your own number.',
    ],
    [
        'q' => 'Does the procedure hurt?',
        'a' => 'The local anaesthetic injections at the start are the uncomfortable part. After that the treated areas are numb, though you may feel pressure or pulling. Soreness, tightness or swelling for a few days afterwards is common and is managed with the medication prescribed for you.',
    ],
    [
        'q' => 'How long does recovery take?',
        'a' => 'Most visible healing happens in the first two weeks: swelling settles within about a week, and the small crusts around the grafts loosen and wash off by around day ten to fourteen. Gym, swimming and tight helmets usually wait three to four weeks. Growth takes longer — new hair appears from about three to four months, and the result is judged at ten to twelve months.',
    ],
    [
        'q' => 'What are the possible risks?',
        'a' => 'Common, short-lived effects are swelling of the forehead, soreness, numbness and itching, and small pimples as new hairs come through. Less often there can be infection, bleeding, temporary shedding of existing hair around the grafts (shock loss), cysts, or weaker growth of some grafts. Taking too many grafts can leave the donor area visibly thin, which is why it is budgeted. Contact the clinic promptly for bleeding that does not stop after 10–15 minutes of steady pressure, spreading redness or pus, fever, or pain that gets worse after the first few days. <a href="/blog/hair-transplant-side-effects-and-risks">Hair transplant side effects and risks</a> covers each one.',
    ],
    [
        'q' => 'Can everyone undergo a hair transplant?',
        'a' => 'No. A transplant needs enough donor hair and a cause of hair loss that surgery can address. It is usually postponed or not advised with fast-changing loss, a thin donor area, diffuse thinning across the whole scalp, active alopecia areata, an untreated cause such as low iron or a thyroid disorder, or a medical condition that makes surgery unsafe. Then <a href="/hair-fall-treatment-in-rohini">hair fall treatment</a> or <a href="/hair-prp-treatment-in-rohini">PRP</a> may come first, and the question is revisited later.',
    ],
    [
        'q' => 'When can I return to work?',
        'a' => 'Many people return to desk work within a few days, once the swelling has settled. Work involving heavy lifting, heat, dust or a helmet usually needs longer. The doctor advises on your own job at the consultation and again at your first review.',
    ],
    [
        'q' => 'Will the donor area show a scar?',
        'a' => 'FUE and DHI take grafts one at a time, which leaves small dot scars spread across the back and sides rather than a line. Hair of a usual length covers them; a very short clipper cut can show them, and some people heal with more visible marks than others. Your donor density is measured first so the area is not over-harvested.',
    ],
    [
        'q' => 'What is the difference between FUE and DHI?',
        'a' => 'Grafts are taken the same way in both. In FUE the openings are made first and the grafts placed into them, which is efficient over larger areas such as the crown. In DHI an implanter pen makes the opening and sets the graft in one movement, which gives close control along the hairline but is slower per graft. Many plans use both: see <a href="/fue-hair-transplant-in-rohini">FUE</a> and <a href="/dhi-hair-transplant-in-rohini">DHI</a> at the Rohini clinic.',
    ],
    [
        'q' => 'Is FUT done at the Rohini clinic?',
        'a' => 'FUT, where a thin strip of scalp is removed and divided into grafts, is described on this page for comparison. Ask the Rohini clinic whether it is offered and whether it would suit you; FUE and DHI are the techniques on record there.',
    ],
    [
        'q' => 'Where in Delhi is the clinic, and which areas do you have pages for?',
        'a' => 'DenceSpot’s Delhi clinic is in Rohini, North-West Delhi. Pages for patients coming from nearby areas cover local metro and road details: ' . implode(', ', $areaLinks) . '. The Directions button opens the clinic on Google Maps.',
    ],
    [
        'q' => 'What should I bring to the consultation?',
        'a' => 'A list of the medicines and supplements you take, any blood test reports from the last few months, and details of earlier hair treatment or surgery. Photographs of your hair from a few years ago can help show how the pattern has changed.',
    ],
];

$page = [
    'title'       => 'Hair Transplant in Delhi: FUE, DHI & Cost | DenceSpot Rohini',
    'description' => 'Hair transplant in Delhi at DenceSpot’s Rohini clinic: FUE and DHI by registered doctors, before-and-after photos, cost factors, recovery and FAQs.',
    'url'         => DELHI_HT_HUB,
    'body_class'  => 'tx-rich',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_delhi_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_procedure(DELHI_HT_HUB, [
            'name'              => 'Hair Transplant',
            'description'       => 'A hair transplant moves hair you already have from the back and sides of the scalp into thinned areas, by FUE or DHI, under local anaesthetic as a day case at the Rohini clinic in Delhi.',
            'alternateName'     => ['Hair Transplant in Delhi', 'FUE Hair Transplant in Delhi', 'DHI Hair Transplant in Delhi'],
            'procedureType'     => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'      => 'Scalp',
            'howPerformed'      => 'Follicular units are taken one at a time from the donor scalp at the back and sides of the head with a fine punch, and placed into thinning areas at the angle of the surrounding hair, by FUE placement into pre-made sites or with DHI implanter pens. A day case under local anaesthetic at the Rohini, Delhi clinic.',
            'preparation'       => 'Magnified examination of the hair-loss pattern and donor density, review of medical history and medicines, and a hairline drawn and agreed with the patient before treatment.',
            'followup'          => 'Written aftercare instructions, a wash demonstration, and photographed follow-up reviews at the Rohini clinic through the first twelve months.',
            'expectedPrognosis' => 'Transplanted hairs commonly shed in weeks two to six while the follicles stay in place; new growth usually begins at around three to four months and the result is judged at ten to twelve months. Outcomes vary between patients and cannot be promised.',
            'location'          => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
            'performer'         => null,
        ]),
        schema_faq(DELHI_HT_HUB, $faqs),
    ],
];

require __DIR__ . '/../includes/header.php';
?>

<?= delhi_hero([
    'pill'  => 'Rohini, North-West Delhi',
    'title' => 'Hair Transplant in Delhi',
    'lead'  => 'FUE and DHI hair transplant at our Rohini clinic, planned around your donor area after an examination by a doctor — with the estimate in writing before any date is booked.',
    'feats' => [
        ['user', 'Doctor-led planning'],
        ['settings', 'FUE & DHI at the clinic'],
        ['pencil', 'Hairline drawn on your face'],
        ['doc', 'Written estimate first'],
    ],
]) ?>

<!-- 1. Treatment overview -->
<section class="section ht-sec ht-overview-sec" id="about">
  <div class="wrap">
    <div class="ht-overview">
      <div class="ht-overview__text">
        <p class="eyebrow">About the treatment</p>
        <h2 class="h2 mt-2">What Is a Hair Transplant?</h2>
        <p class="body mt-3">A hair transplant is a minor surgical procedure done under local anaesthetic. Follicles are taken from the back and sides of the scalp — the donor area, where hair generally resists pattern hair loss — and placed into thinning areas at the angle the surrounding hair grows. It moves hair you already have; it does not create new follicles, so the plan is made against the loss you may have in years to come, not only today’s.</p>
        <p class="body mt-3">In Delhi, DenceSpot’s FUE and DHI hair transplants are planned and carried out at the Rohini clinic by registered medical practitioners.</p>
        <div class="btn-row mt-4">
          <a class="btn btn--ink" href="/hair-loss-assessment">Check If You May Be a Candidate <?= icon('arrow', 16) ?></a>
        </div>
      </div>

      <?= delhi_case_pair() ?>

      <?= delhi_glance([
          ['shield', 'mint', 'Local anaesthetic', 'You are awake throughout'],
          ['calendar', 'violet', 'Day case', 'You go home the same day'],
          ['clock', 'sky', 'Back to desk work', 'Usually within a few days'],
          ['chart', 'amber', 'New growth', 'From about 3–4 months; judged at 10–12'],
      ], 'Hair transplant at a glance') ?>
    </div>
  </div>
</section>

<!-- 2. Why DenceSpot -->
<?= delhi_band([
    'id'      => 'why',
    'eyebrow' => 'Why DenceSpot',
    'heading' => 'Why Choose DenceSpot for a Hair Transplant in Delhi?',
    'intro'   => 'How each case is handled at the Rohini clinic, from the first examination to the written estimate.',
    'icons'   => [
        ['user', 'Doctor-Led Planning'],
        ['search', 'Magnified Scalp Examination'],
        ['doc', 'Personalised Written Plan'],
        ['pin', 'Rohini Clinic, North-West Delhi'],
        ['pencil', 'Hairline Drawn on Your Face'],
        ['rupee', 'Itemised Written Estimate'],
    ],
    'media'   => 'equipment',
]) ?>

<!-- 3. Areas we serve -->
<?= delhi_areas_section() ?>

<!-- 4. Before-and-after results -->
<?= delhi_results() ?>

<!-- 5. The doctors -->
<?= delhi_doctors() ?>

<!-- 6. Techniques -->
<section class="section ht-sec section--white" id="techniques">
  <div class="wrap">
    <div style="max-width:68ch">
      <p class="eyebrow">Techniques</p>
      <h2 class="h2 mt-2">FUE and DHI Hair Transplant Techniques</h2>
      <p class="body mt-3">The techniques differ in how grafts are taken from the donor area and how they are placed. None suits every case, and many plans combine two of them.</p>
    </div>

    <div class="ht-tech">
      <div class="card card--pad-lg tech-card tone--mint">
        <span class="icon-dot"><?= icon('list', 24) ?></span>
        <h3 class="h3">FUE Hair Transplant</h3>
        <p class="body-s mt-2">Follicular units are removed one at a time with a fine punch, leaving small dot scars rather than a line. Recipient sites are made first — efficient over larger areas such as the crown and mid-scalp.</p>
        <?= ticks([
            'Small dot scars spread across the donor area',
            'Often used for the crown and mid-scalp',
            'Crusts settle in one to two weeks',
        ], false) ?>
        <a class="btn btn--outline btn--sm mt-4" href="/fue-hair-transplant-in-rohini">FUE hair transplant in Rohini <?= icon('arrow', 14) ?></a>
      </div>

      <div class="card card--pad-lg tech-card tone--violet">
        <span class="icon-dot"><?= icon('pencil', 24) ?></span>
        <h3 class="h3">DHI Hair Transplant</h3>
        <p class="body-s mt-2">Grafts are taken as in FUE, then each is set with an implanter pen that makes the opening and places it in one movement — useful along hairlines and temples, and slower per graft.</p>
        <?= ticks([
            'Opening and placement in one step',
            'Often used for the hairline and temples',
            'Crusts settle in one to two weeks',
        ], false) ?>
        <a class="btn btn--outline btn--sm mt-4" href="/dhi-hair-transplant-in-rohini">DHI hair transplant in Rohini <?= icon('arrow', 14) ?></a>
      </div>

      <div class="tint-card tone--sky ht-tech__choose">
        <h3 class="h4">How the Doctor Chooses the Approach</h3>
        <div class="mt-3"><?= ticks([
            'The area to be covered and how many grafts it needs',
            'Your donor density, and the thickness and curl of your hair',
            'How short you wear the hair at the back and sides',
            'Whether the thinning area needs to stay unshaven',
            'A common plan: DHI along the hairline, FUE across the mid-scalp and crown',
        ], false) ?></div>
        <p class="body-s mt-4">FUT, where a strip of scalp is removed, is not on record at the Rohini clinic: ask whether it would suit you.</p>
      </div>
    </div>

    <h3 class="h4 mt-6">Hair Transplant by Area and Need</h3>
    <ul class="ht-patterns">
      <?php foreach ([
          '/hairline-transplant-in-rohini'       => 'Hairline transplant',
          '/crown-hair-transplant-in-rohini'     => 'Crown hair transplant',
          '/hair-transplant-for-women-in-rohini' => 'Hair transplant for women',
          '/hair-transplant-repair-in-rohini'    => 'Hair transplant repair',
          '/unshaven-hair-transplant-in-rohini'  => 'Unshaven hair transplant',
      ] as $url => $anchor): ?>
      <li><a href="<?= e($url) ?>"><?= e($anchor) ?> <?= icon('arrow', 14) ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- 7. The procedure -->
<?= delhi_steps() ?>

<!-- 8. Cost -->
<section class="section ht-sec section--white" id="cost">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Cost</p>
        <h2 class="h2 mt-2">Hair Transplant Cost in Delhi</h2>
        <p class="body mt-3 measure">There is no fixed price, because no two plans move the same number of grafts. The estimate is the graft count multiplied by a per-graft rate for the technique, plus what the estimate covers — given to you itemised and in writing after your examination.</p>
        <?= cost_band_line() ?>

        <div class="factor-list">
          <div class="factor tone--mint"><span class="icon-dot"><?= icon('chart', 20) ?></span><div><b>Graft requirement</b><span>The area to be covered and what your donor area can give.</span></div></div>
          <div class="factor tone--violet"><span class="icon-dot"><?= icon('settings', 20) ?></span><div><b>Technique</b><span>DHI placement is slower per graft than FUE placement.</span></div></div>
          <div class="factor tone--sky"><span class="icon-dot"><?= icon('scale', 20) ?></span><div><b>Complexity</b><span>Unshaven work, repair of earlier surgery or tightly curled hair take longer.</span></div></div>
          <div class="factor tone--amber"><span class="icon-dot"><?= icon('calendar', 20) ?></span><div><b>Sessions</b><span>Extensive loss may be planned over two sessions.</span></div></div>
        </div>

        <div class="btn-row mt-5">
          <a class="btn btn--ink" href="#consultation"><?= icon('calendar', 17) ?> Get Your Written Estimate</a>
        </div>
        <ul class="ht-patterns mt-3">
          <li><a href="/hair-transplant-cost-in-rohini">Rohini cost guide <?= icon('arrow', 14) ?></a></li>
          <li><a href="/hair-transplant-graft-calculator">Graft calculator <?= icon('arrow', 14) ?></a></li>
          <li><a href="/cost-and-emi-options">EMI and payment <?= icon('arrow', 14) ?></a></li>
        </ul>
      </div>

      <div>
        <div class="card band-card">
          <div class="band-card__head">
            <h3 class="h4">Graft Requirements by Stage</h3>
            <p>General patient-education bands, not a quote.</p>
          </div>
          <div class="table-scroll">
            <table class="data data--fit">
              <caption class="sr-only">General hair transplant graft bands by Norwood stage — patient education, not a quote</caption>
              <thead>
                <tr><th scope="col">Stage</th><th scope="col">Grafts</th><th scope="col">Usual focus</th></tr>
              </thead>
              <tbody>
                <?php foreach ($bands as $b): ?>
                <tr>
                  <th scope="row" style="color:var(--ink);font-size:14px;font-weight:700;text-transform:none;letter-spacing:0"><?= e($b['stage']) ?></th>
                  <td style="font-weight:700;color:var(--tone-mint);white-space:nowrap"><?= e($b['grafts']) ?></td>
                  <td><?= e($b['focus']) ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="tint-card tone--mint mt-4">
          <h3 class="h4">What Your Written Estimate Sets Out</h3>
          <div class="mt-3"><?= ticks([
              'Technique and graft range',
              'Procedure and local anaesthesia',
              'Medication for recovery',
              'Aftercare and reviews for a year',
              'The total payable, including tax',
              'Anything excluded, as a separate line',
          ]) ?></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 9. FAQs -->
<?= delhi_faqs('Hair Transplant in Delhi: FAQs', $faqs, 6) ?>

<!-- 10. Consultation -->
<?= delhi_consult(
    'Book a Hair Transplant Consultation in Delhi',
    'Meet the doctor at the Rohini clinic for a scalp and donor examination, a hairline drawn on your own face and an itemised written estimate. You are not asked to book a procedure on the day.',
    'hair-transplant-delhi'
) ?>

<?php require __DIR__ . '/../includes/footer.php'; ?>
