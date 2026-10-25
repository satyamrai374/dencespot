<?php
/**
 * /hair-transplant-in-rohini — the Rohini (Delhi) clinic's main hair transplant page.
 *
 * Section order (25 Oct 2026 client brief):
 *  1. Hero: H1, short introduction, consultation / call / WhatsApp, a photo
 *  2. About hair transplant: what it is, candidates, causes, outcomes and limits
 *  3. Techniques: FUE, DHI, FUT, comparison table, how the approach is chosen
 *  4. Conditions treated
 *  5. Treatment process (five steps)
 *  6. Cost: factors, graft bands, what the written estimate sets out
 *  7. Before-and-after results
 *  8. Recovery and aftercare, with warning signs
 *  9. Doctor and clinic information
 * 10. FAQs (the same array drives the JSON-LD; four shown, the rest behind
 *     "View more")
 * 11. Final consultation: form, phone, WhatsApp, address (both clinic maps
 *     are in the common footer directly below)
 *
 * Later the same day the client asked for original media, before-and-after
 * photos and more colour. Photos used: consented patient composites that
 * GALLERY_MANIFEST already publishes (CAT_RESULT) and the named case with a
 * recorded technique, graft count and interval (NAMED_CASES), the clinic's
 * FUE equipment and Dr. Nyra's portrait. They are DenceSpot patients, not
 * labelled as Rohini patients. No AI images.
 *
 * FUT is described for comparison only: the Rohini clinic is on record for FUE
 * and DHI. Who treats patients at Rohini is not on record, so no doctor is
 * named as performer. Graft bands match /hair-transplant-cost-in-rohini.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';
require_once __DIR__ . '/includes/gallery-manifest.php';

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Hair Transplant in Delhi'],
];

/** General patient-education bands, not a quote. Same as the Rohini cost guide. */
$stages = [
    ['stage' => 'Norwood II',              'grafts' => '800 – 1,500',    'focus' => 'Medical treatment first; a small hairline session once stable'],
    ['stage' => 'Norwood III',             'grafts' => '1,200 – 2,000',  'focus' => 'Hairline and temples'],
    ['stage' => 'Norwood III vertex – IV', 'grafts' => '1,800 – 2,600',  'focus' => 'The front first; the crown as the donor allows'],
    ['stage' => 'Norwood V',               'grafts' => '2,500 – 3,500',  'focus' => 'Front priority, sometimes staged'],
    ['stage' => 'Norwood VI – VII',        'grafts' => '3,000 – 4,500+', 'focus' => 'Staged sessions for coverage, not full density'],
];

/** The comparison table: one row per aspect, one column per technique. */
$techRows = [
    ['aspect' => 'How grafts are taken',  'fue' => 'One follicular unit at a time, with a punch under a millimetre across.', 'dhi' => 'The same as FUE.', 'fut' => 'A thin strip of scalp is removed and divided into grafts under microscopes.'],
    ['aspect' => 'How grafts are placed', 'fue' => 'Recipient sites are made first, then grafts are placed into them.', 'dhi' => 'An implanter pen makes the opening and sets each graft in one movement.', 'fut' => 'Recipient sites are made first, then grafts are placed into them.'],
    ['aspect' => 'Donor scar',            'fue' => 'Small dot scars spread across the donor area.', 'dhi' => 'The same as FUE.', 'fut' => 'One fine linear scar, hidden by hair worn longer.'],
    ['aspect' => 'Often used for',        'fue' => 'Larger areas such as the crown and mid-scalp.', 'dhi' => 'The front rows of a hairline and the temples.', 'fut' => 'Many grafts in one session, where hair at the back is kept longer.'],
    ['aspect' => 'Early recovery',        'fue' => 'Crusts settle in one to two weeks.', 'dhi' => 'The same as FUE.', 'fut' => 'Stitches out at about ten to fourteen days.'],
];

/** Consented DenceSpot patient composites (GALLERY_MANIFEST, CAT_RESULT). */
$resultFiles = ['2023-05-10.jpg', '2023-05-17 (1).jpg', '2023-05-17 (9).jpg', '2023-05-17.jpg', '2023-05-17 (8).jpg'];
$published   = array_column(gallery_images(CAT_RESULT), null, 'file');
$results     = array_values(array_filter(array_map(static fn (string $f): ?array => $published[$f] ?? null, $resultFiles)));
$heroResult  = $published['2023-05-17 (5).jpg'] ?? null;
$featured    = NAMED_CASES[0];   // FUE, 2,400 grafts, 12 months — the case with recorded details

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
        'q' => 'When can I return to work?',
        'a' => 'Many people return to desk work within a few days, once the swelling has settled. Work involving heavy lifting, heat, dust or a helmet usually needs longer. The doctor advises on your own job at the consultation and again at your first review.',
    ],
    [
        'q' => 'What are the possible risks?',
        'a' => 'Common, short-lived effects are swelling of the forehead, soreness, numbness and itching, and small pimples as new hairs come through. Less often there can be infection, bleeding, temporary shedding of existing hair around the grafts (shock loss), cysts, or weaker growth of some grafts. Taking too many grafts can leave the donor area visibly thin, which is why it is budgeted. FUE leaves small dot scars and FUT a linear scar. <a href="/blog/hair-transplant-side-effects-and-risks">Hair transplant side effects and risks</a> covers each one.',
    ],
    [
        'q' => 'Can everyone undergo a hair transplant?',
        'a' => 'No. A transplant needs enough donor hair and a cause of hair loss that surgery can address. It is usually postponed or not advised with fast-changing loss, a thin donor area, diffuse thinning across the whole scalp, active alopecia areata, an untreated cause such as low iron or a thyroid disorder, or a medical condition that makes surgery unsafe. Then <a href="/hair-fall-treatment-in-rohini">hair fall treatment</a> or <a href="/hair-prp-treatment-in-rohini">PRP</a> may come first, and the question is revisited later.',
    ],
];

$page = [
    'title'       => 'Hair Transplant in Delhi (Rohini): FUE, DHI & Cost | DenceSpot',
    'description' => 'Hair transplant in Delhi at DenceSpot’s Rohini clinic: FUE and DHI by registered doctors, before-and-after photos, cost factors, recovery and FAQs.',
    'url'         => '/hair-transplant-in-rohini',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_delhi_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/hair-transplant-in-rohini', [
            'name'              => 'Hair Transplant',
            'alternateName'     => ['Hair Transplant in Delhi', 'FUE Hair Transplant Rohini', 'DHI Hair Transplant Rohini'],
            'procedureType'     => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'      => 'Scalp',
            'howPerformed'      => 'Follicular units are taken one at a time from the donor scalp at the back and sides of the head with a fine punch, and placed into thinning areas at the angle of the surrounding hair, by FUE placement into pre-made sites or with DHI implanter pens. A day case under local anaesthetic at the Rohini, Delhi clinic.',
            'preparation'       => 'Magnified examination of the hair-loss pattern and donor density, review of medical history and medicines, and a hairline drawn and agreed with the patient before treatment.',
            'followup'          => 'Written aftercare instructions, a wash demonstration, and photographed follow-up reviews at the Rohini clinic through the first twelve months.',
            'expectedPrognosis' => 'Transplanted hairs commonly shed in weeks two to six while the follicles stay in place; new growth usually begins at around three to four months and the result is judged at ten to twelve months. Outcomes vary between patients and cannot be promised.',
            'location'          => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
            'performer'         => null,
        ]),
        schema_faq('/hair-transplant-in-rohini', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<!-- 1. Hero -->
<section class="hero hero--rich">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Rohini · North-West Delhi</span>
        <h1 class="h1 mt-3">Hair Transplant in Delhi <span class="h1__sub">at Our Rohini Clinic</span></h1>
        <p class="lead mt-3 measure">
          Looking for a hair transplant in Delhi? At DenceSpot’s Rohini clinic, FUE and DHI hair transplants are planned and carried out by registered medical practitioners. Every plan starts with an examination of your scalp and donor area, and you receive an itemised written estimate before any date is booked.
        </p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="<?= e(book_url()) ?>" data-book data-clinic="Delhi (Rohini)" data-treatment="Hair transplant" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp</a>
          <a class="btn btn--lg btn--outline" href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call" aria-label="Call the Rohini clinic on <?= e(LOC_DELHI_PHONE_DISPLAY) ?>"><?= icon('phone', 17) ?> Call</a>
        </div>

        <div class="chip-row">
          <span class="chip"><?= icon('check', 16, 'currentColor', 2.2) ?> FUE &amp; DHI in Rohini</span>
          <span class="chip"><?= icon('check', 16, 'currentColor', 2.2) ?> Hairline drawn on your face</span>
          <span class="chip"><?= icon('check', 16, 'currentColor', 2.2) ?> Written estimate first</span>
          <span class="chip"><?= icon('check', 16, 'currentColor', 2.2) ?> Reviews for 12 months</span>
        </div>
      </div>

      <div class="hero__figure hero-photo">
        <?php if ($heroResult !== null): ?>
        <div class="media ratio-1-1 media--shadow">
          <?= photo_img($heroResult['url'], 'Hair transplant before and after: a consented DenceSpot Clinic patient, with the planned hairline marked before surgery and the grown-in result after', '(min-width: 1080px) 540px, (min-width: 560px) 460px, 92vw', $heroResult['w'], $heroResult['h'], ['loading' => 'eager', 'fetchpriority' => 'high']) ?>
          <span class="photo-tag">Consented photo · results vary</span>
        </div>
        <?php endif; ?>
        <?= hero_review_badge() ?>
      </div>
    </div>
  </div>
</section>

<!-- 2. About hair transplant -->
<section class="section section--white" id="about">
  <div class="wrap">
    <div class="split split--wide-left split--top">
      <div>
        <p class="eyebrow">About hair transplant</p>
        <h2 class="h2 mt-2">What Is a Hair Transplant?</h2>
        <p class="body-l mt-3 measure">A hair transplant is a minor surgical procedure done under local anaesthetic. Hair follicles are taken from the back and sides of the scalp — the donor area, where hair generally resists the hormonal process behind pattern hair loss — and placed into thinning or bald areas at the angle the surrounding hair grows.</p>
        <p class="body-l mt-3 measure">It moves follicles you already have; it does not create new ones. Every graft placed at the front is one fewer at the back, so the plan is made against the loss you may have in years to come, not only today’s.</p>

        <div class="tint-card tone--mint mt-5">
          <h3 class="h4">Who May Be a Suitable Candidate</h3>
          <div class="mt-3"><?= ticks([
              'Pattern hair loss that has settled into a recognisable shape',
              'Enough donor hair to cover the area and keep a reserve',
              'A cause of hair loss that has been identified and, where needed, treated',
              'General health and medicines reviewed beforehand',
          ]) ?></div>
          <p class="body-s mt-4">Not sure? The <a href="/hair-loss-assessment">hair loss self-assessment</a> suggests a next step; suitability is decided at an examination.</p>
        </div>
      </div>

      <figure class="photo-card">
        <div class="media ratio-4-5 media--shadow"><img src="/assets/img/clinic-equipment.jpg" alt="Motorised FUE handpiece used in hair transplant to take follicular units one at a time, at DenceSpot Clinic" width="492" height="855" loading="lazy" decoding="async"></div>
        <figcaption>The motorised FUE handpiece used to take follicular units one at a time.</figcaption>
      </figure>
    </div>

    <div class="grid grid--2 mt-6">
      <div class="tint-card tone--violet">
        <h3 class="h4">Common Causes of Hair Loss</h3>
        <div class="mt-3"><?= ticks([
            'Male and female pattern hair loss — the cause a transplant most often addresses',
            'Shedding after illness, fever, surgery, childbirth or a crash diet',
            'Thyroid disorders, low iron or vitamin deficiencies',
            'Patchy hair loss from alopecia areata',
            'Traction from tight hairstyles, and scarring after injury or burns',
        ], false) ?></div>
        <p class="body-s mt-4">Several of these are treated medically — see <a href="/hair-fall-treatment-in-rohini">hair fall treatment in Rohini</a>.</p>
      </div>

      <div class="card card--pad-lg">
        <h3 class="h4">Expected Outcomes and Limitations</h3>
        <p class="meta mt-3" style="font-weight:700;color:var(--tone-mint)">What it can do</p>
        <div class="mt-2"><?= ticks([
            'Add hair to thinning areas using follicles that usually keep their resistance to pattern loss',
            'Rebuild a hairline drawn to suit your face and age',
        ], false) ?></div>
        <p class="meta mt-4" style="font-weight:700;color:var(--tone-rose)">What it cannot do</p>
        <ul class="ticks ticks--x mt-2">
          <?php foreach ([
              'Add more hair than the donor area can give',
              'Stop thinning of the hair around the grafts',
              'Restore full density in extensive loss, where the aim is coverage',
          ] as $limit): ?>
            <li class="tick"><?= icon('close', 18, 'currentColor', 2.2) ?><span><?= e($limit) ?></span></li>
          <?php endforeach; ?>
        </ul>
        <p class="body-s mt-4">Results differ between patients, and no particular result is promised.</p>
      </div>
    </div>
  </div>
</section>

<!-- 3. Techniques -->
<section class="section section--canvas" id="techniques">
  <div class="wrap">
    <div style="max-width:68ch">
      <p class="eyebrow">Hair transplant techniques</p>
      <h2 class="h2 mt-2">FUE, DHI and FUT Hair Transplant Techniques</h2>
      <p class="body mt-3">The techniques differ in how grafts are taken from the donor area and how they are placed. None suits every case, and many plans combine two of them.</p>
    </div>

    <div class="grid grid--3 mt-5">
      <div class="card card--pad-lg tech-card tone--mint">
        <span class="icon-dot"><?= icon('list', 24) ?></span>
        <span class="pill">At the Rohini clinic</span>
        <h3 class="h3 mt-3">FUE Hair Transplant</h3>
        <p class="body-s mt-2">Follicular units are removed one at a time with a fine punch, leaving small dot scars rather than a line. Recipient sites are made first — efficient over larger areas such as the crown and mid-scalp.</p>
        <a class="btn btn--outline btn--sm mt-4" href="/fue-hair-transplant-in-rohini">FUE in Rohini <?= icon('arrow', 14) ?></a>
      </div>

      <div class="card card--pad-lg tech-card tone--violet">
        <span class="icon-dot"><?= icon('pencil', 24) ?></span>
        <span class="pill">At the Rohini clinic</span>
        <h3 class="h3 mt-3">DHI Hair Transplant</h3>
        <p class="body-s mt-2">Grafts are taken as in FUE, then each is set with an implanter pen that makes the opening and places it in one movement — useful along hairlines and temples, and slower per graft.</p>
        <a class="btn btn--outline btn--sm mt-4" href="/dhi-hair-transplant-in-rohini">DHI in Rohini <?= icon('arrow', 14) ?></a>
      </div>

      <div class="card card--pad-lg tech-card tone--amber">
        <span class="icon-dot"><?= icon('info', 24) ?></span>
        <span class="pill">Ask the clinic</span>
        <h3 class="h3 mt-3">FUT Hair Transplant</h3>
        <p class="body-s mt-2">A thin strip of scalp is removed and divided into grafts under microscopes. It can move many grafts in one session but leaves a fine linear scar. Described here for comparison — ask the Rohini clinic whether it suits you.</p>
      </div>
    </div>

    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data data--tech">
          <caption class="sr-only">FUE, DHI and FUT hair transplant compared by how grafts are taken and placed, donor scar, typical use and early recovery</caption>
          <thead>
            <tr><th scope="col">Comparison</th><th scope="col">FUE</th><th scope="col">DHI</th><th scope="col">FUT</th></tr>
          </thead>
          <tbody>
            <?php foreach ($techRows as $r): ?>
            <tr>
              <th scope="row"><?= e($r['aspect']) ?></th>
              <td><?= e($r['fue']) ?></td>
              <td><?= e($r['dhi']) ?></td>
              <td><?= e($r['fut']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="tint-card tone--sky mt-4">
      <h3 class="h4">How the Doctor Chooses the Approach</h3>
      <div class="mt-3"><?= ticks([
          'The area to be covered and how many grafts it needs',
          'Your donor density, and the thickness and curl of your hair',
          'How short you wear the hair at the back and sides',
          'Whether the thinning area needs to stay unshaven',
          'Earlier surgery or scarring in the donor or recipient area',
          'A common plan: DHI along the hairline, FUE across the mid-scalp and crown',
      ]) ?></div>
    </div>
  </div>
</section>

<!-- 4. Conditions treated -->
<section class="section section--white" id="conditions">
  <div class="wrap">
    <div style="max-width:68ch">
      <p class="eyebrow">Conditions treated</p>
      <h2 class="h2 mt-2">Hair Loss Conditions a Transplant Can Treat</h2>
      <p class="body mt-3">A transplant is considered for these patterns after an examination at the Rohini clinic.</p>
    </div>

    <div class="grid grid--5 mt-5">
      <div class="tile tone--mint"><span class="icon-dot"><?= icon('user', 24) ?></span><h3 class="h4">Male Pattern Hair Loss</h3><p class="body-s mt-2">Thinning at the hairline, temples and crown. In extensive loss the front comes first and the crown is staged.</p></div>
      <div class="tile tone--violet"><span class="icon-dot"><?= icon('hairline', 24) ?></span><h3 class="h4">Receding Hairline</h3><p class="body-s mt-2">Rebuilt with single-hair grafts along the front edge. See <a href="/hairline-transplant-in-rohini">hairline transplant</a>.</p></div>
      <div class="tile tone--sky"><span class="icon-dot"><?= icon('settings', 24) ?></span><h3 class="h4">Crown Thinning</h3><p class="body-s mt-2">Uses grafts quickly and can keep widening, so it is planned after the front. See <a href="/crown-hair-transplant-in-rohini">crown transplant</a>.</p></div>
      <div class="tile tone--rose"><span class="icon-dot"><?= icon('heart', 24) ?></span><h3 class="h4">Selected Female Hair Loss</h3><p class="body-s mt-2">After hormonal, thyroid and iron causes are checked. See <a href="/hair-transplant-for-women-in-rohini">transplant for women</a>.</p></div>
      <div class="tile tone--amber"><span class="icon-dot"><?= icon('shield', 24) ?></span><h3 class="h4">Hair Loss From Scars</h3><p class="body-s mt-2">A stable, fully healed scar that can support grafts. Earlier surgery: see <a href="/hair-transplant-repair-in-rohini">transplant repair</a>.</p></div>
    </div>
  </div>
</section>

<!-- 5. Treatment process -->
<section class="section section--ink" id="process">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Treatment process</p>
      <h2 class="h2 mt-2">Hair Transplant Procedure: Step by Step</h2>
      <p class="body mt-3">Five stages, from the first appointment to the twelve-month review, all at the Rohini clinic.</p>
    </div>
    <ol class="timeline mt-6">
      <li class="timeline__step"><span class="timeline__num">1</span><h3 class="h4">Initial Consultation</h3><p>Your history, medicines, family pattern of hair loss and what you hope for, with a registered medical practitioner.</p></li>
      <li class="timeline__step"><span class="timeline__num">2</span><h3 class="h4">Scalp and Donor Assessment</h3><p>The thinning area and donor density are examined under magnification to see how many grafts can be taken safely.</p></li>
      <li class="timeline__step"><span class="timeline__num">3</span><h3 class="h4">Treatment Planning</h3><p>The hairline is drawn on your face, the technique and graft range are agreed, and the estimate is given in writing.</p></li>
      <li class="timeline__step"><span class="timeline__num">4</span><h3 class="h4">Procedure and Recovery</h3><p>A day case under local anaesthetic, with breaks. You go home the same day with written aftercare.</p></li>
      <li class="timeline__step"><span class="timeline__num">5</span><h3 class="h4">Follow-Up Appointments</h3><p>Photographed reviews through the first year, so progress is judged against your starting point.</p></li>
    </ol>
  </div>
</section>

<!-- 6. Cost -->
<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Cost of hair transplant</p>
        <h2 class="h2 mt-2">Hair Transplant Cost in Delhi (Rohini)</h2>
        <p class="body mt-3 measure">There is no fixed price, because no two plans move the same number of grafts. The estimate is the graft count multiplied by a per-graft rate for the technique, plus what the estimate covers — given to you itemised and in writing after your examination.</p>
        <?= cost_band_line() ?>

        <div class="factor-list">
          <div class="factor tone--mint"><span class="icon-dot"><?= icon('chart', 20) ?></span><div><b>Graft requirement</b><span>The area to be covered and what your donor area can give.</span></div></div>
          <div class="factor tone--violet"><span class="icon-dot"><?= icon('settings', 20) ?></span><div><b>Technique</b><span>DHI placement is slower per graft than FUE placement.</span></div></div>
          <div class="factor tone--sky"><span class="icon-dot"><?= icon('scale', 20) ?></span><div><b>Complexity</b><span>Unshaven work, repair of earlier surgery or tightly curled hair take longer.</span></div></div>
          <div class="factor tone--amber"><span class="icon-dot"><?= icon('calendar', 20) ?></span><div><b>Sessions</b><span>Extensive loss may be planned over two sessions.</span></div></div>
        </div>

        <div class="btn-row mt-5">
          <a class="btn btn--ink btn--sm" href="/hair-transplant-cost-in-rohini"><?= icon('rupee', 16) ?> Rohini Cost Guide</a>
          <a class="btn btn--outline btn--sm" href="/hair-transplant-graft-calculator">Graft Calculator</a>
          <a class="btn btn--outline btn--sm" href="/cost-and-emi-options">EMI and Payment</a>
        </div>
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
                <?php foreach ($stages as $s): ?>
                <tr>
                  <th scope="row" style="color:var(--ink);font-size:14px;font-weight:700;text-transform:none;letter-spacing:0"><?= e($s['stage']) ?></th>
                  <td style="font-weight:700;color:var(--tone-mint);white-space:nowrap"><?= e($s['grafts']) ?></td>
                  <td><?= e($s['focus']) ?></td>
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

<!-- 7. Before-and-after results -->
<section class="section section--canvas" id="results">
  <div class="wrap">
    <div style="max-width:68ch">
      <p class="eyebrow">Before-and-after results</p>
      <h2 class="h2 mt-2">Hair Transplant Before and After Results</h2>
      <p class="body mt-3">Photographs of DenceSpot patients, shown with their written consent and not digitally altered. Each case is different: they show what happened for these patients, not what will happen for you.</p>
    </div>

    <div class="ba-feature mt-6">
      <a class="ba-link" href="<?= e($featured['image']) ?>" data-lightbox data-title="<?= e($featured['technique'] . ' · ' . $featured['grafts'] . ' · before and ' . $featured['interval'] . ' after') ?>">
        <?= photo_img($featured['image'], 'Hair transplant before and after: ' . $featured['technique'] . ', ' . $featured['grafts'] . ', hairline and temples photographed before and ' . $featured['interval'] . ' after — DenceSpot Clinic patient', '(min-width: 900px) 560px, 92vw', 1024, 1024) ?>
        <span class="photo-tag">Consented patient photo</span>
      </a>
      <div>
        <p class="eyebrow">Featured case</p>
        <h3 class="h3 mt-2">Hairline and Temple Restoration</h3>
        <div class="detail-chips">
          <span class="detail-chip tone--mint"><?= icon('settings', 14, 'currentColor', 2) ?> <?= e($featured['technique']) ?></span>
          <span class="detail-chip tone--violet"><?= icon('list', 14, 'currentColor', 2) ?> <?= e($featured['grafts']) ?></span>
          <span class="detail-chip tone--sky"><?= icon('clock', 14, 'currentColor', 2) ?> Before and <?= e($featured['interval']) ?> after</span>
        </div>
        <p class="body mt-4 measure">The hairline was drawn and agreed before surgery (left); the right-hand photograph was taken at the twelve-month review. Your own scalp is photographed the same way before treatment and at each review, so progress is judged against your starting point.</p>
        <div class="note mt-4">
          <p class="body-s"><b>Results differ between patients.</b> No photograph, of any patient, shows the result you will get. Ask at your consultation for cases similar to your own pattern of hair loss.</p>
        </div>
      </div>
    </div>

    <?php if ($results !== []): ?>
    <div class="ba-grid">
      <?php foreach ($results as $i => $r): ?>
        <a class="ba-link" href="<?= e($r['url']) ?>" data-lightbox data-title="Hair transplant before and after — DenceSpot patient">
          <?= photo_img($r['url'], 'Hair transplant before and after photo ' . ($i + 1) . ' — consented DenceSpot Clinic patient', '(min-width: 1080px) 230px, (min-width: 700px) 30vw, 46vw', $r['w'], $r['h']) ?>
        </a>
      <?php endforeach; ?>
    </div>
    <p class="meta mt-3">Composites from DenceSpot patients, shown with written consent. The technique, graft count and time between photographs are not recorded on these images.</p>
    <?php endif; ?>

    <div class="btn-row mt-5">
      <a class="btn btn--ink" href="/gallery"><?= icon('camera', 18) ?> View More Results</a>
      <a class="btn btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Send Your Photos on WhatsApp</a>
    </div>
  </div>
</section>

<!-- 8. Recovery and aftercare -->
<section class="section section--white" id="recovery">
  <div class="wrap">
    <div style="max-width:64ch">
      <p class="eyebrow">Recovery and aftercare</p>
      <h2 class="h2 mt-2">Recovery After a Hair Transplant</h2>
      <p class="body mt-3">General guidance on what to expect. Your written aftercare instructions always come first.</p>
    </div>

    <div class="grid grid--4 mt-6">
      <div class="card phase tone--mint">
        <p class="eyebrow">Days 1 – 2</p>
        <h3 class="h4 mt-1">First 24–48 Hours</h3>
        <div class="mt-3"><?= ticks([
            'Travel home by car or cab, not a two-wheeler',
            'Sleep with your head raised for a few nights',
            'Do not touch, scratch or rub the grafts',
            'Forehead swelling may appear and settles within a week',
        ], false) ?></div>
      </div>
      <div class="card phase tone--sky">
        <p class="eyebrow">Days 3 – 14</p>
        <h3 class="h4 mt-1">First Two Weeks</h3>
        <div class="mt-3"><?= ticks([
            'Wash gently, exactly as demonstrated at the clinic',
            'Crusts loosen by around day ten to fourteen',
            'Avoid heavy sweating, midday sun, swimming and the gym',
            'Tight helmets wait three to four weeks',
        ], false) ?></div>
      </div>
      <div class="card phase tone--violet">
        <p class="eyebrow">Weeks 2 – 6</p>
        <h3 class="h4 mt-1">Temporary Shedding</h3>
        <p class="body-s mt-3">Most transplanted hairs fall out while the follicle stays in place and starts a new hair later. Some people also shed hair around the grafts (shock loss), which usually grows back. <a href="/blog/shedding-and-shock-loss-after-hair-transplant">Shedding explained</a>.</p>
      </div>
      <div class="card phase tone--amber">
        <p class="eyebrow">Months 3 – 12</p>
        <h3 class="h4 mt-1">Hair Growth Timeline</h3>
        <div class="mt-3"><?= ticks([
            'Months 3–4: fine new hairs appear',
            'Months 6–8: hairs thicken and lengthen',
            'Months 10–12: the result is judged',
            'The crown can take up to 12–18 months',
        ], false) ?></div>
      </div>
    </div>

    <div class="grid grid--2 mt-4">
      <div class="warn-card">
        <h3 class="h4">Warning Signs: Contact the Clinic Promptly</h3>
        <ul class="ticks mt-3">
          <?php foreach ([
              'Bleeding that does not stop after 10–15 minutes of steady, gentle pressure',
              'Spreading redness, heat or swelling, or pus around the grafts or donor area',
              'Fever or chills',
              'Pain that gets worse rather than better after the first few days',
          ] as $sign): ?>
            <li class="tick"><?= icon('alert', 17) ?><span><?= e($sign) ?></span></li>
          <?php endforeach; ?>
        </ul>
        <p class="body-s mt-4">Call <a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a>. If symptoms are severe and you cannot reach the clinic, go to the nearest hospital emergency department.</p>
      </div>
      <div class="card card--pad-lg">
        <h3 class="h4">Follow-Up Appointments</h3>
        <p class="body-s mt-2">Reviews are booked at set intervals through the first year at the Rohini clinic, and your scalp is photographed at each one. More detail is in the <a href="/hair-transplant-aftercare">hair transplant aftercare guide</a> and <a href="/blog/first-14-days-after-a-hair-transplant">the first 14 days after a hair transplant</a>.</p>
      </div>
    </div>
  </div>
</section>

<!-- 9. Doctor and clinic information -->
<?= doctor_block('Every plan at the Rohini clinic is made and carried out by registered medical practitioners. The doctor who will treat you is named at your consultation, and you can ask for their qualifications, registration and experience with the technique planned for you.') ?>

<section class="section section--white" id="clinic">
  <div class="wrap">
    <div style="max-width:68ch">
      <p class="eyebrow">The Rohini clinic</p>
      <h2 class="h2 mt-2">Our Hair Transplant Clinic in Rohini</h2>
    </div>
    <div class="grid grid--3 mt-5">
      <div class="tile tone--mint">
        <span class="icon-dot"><?= icon('search', 24) ?></span>
        <h3 class="h4">Facilities</h3>
        <p class="body-s mt-2">Consultation rooms with magnified (trichoscopic) scalp examination, day-case hair transplant procedures under local anaesthetic, and photographed review appointments.</p>
      </div>
      <div class="tile tone--violet">
        <span class="icon-dot"><?= icon('pin', 24) ?></span>
        <h3 class="h4">Location</h3>
        <p class="body-s mt-2">North-West Delhi near the Outer Ring Road, convenient for Rohini, Pitampura, Shalimar Bagh and Prashant Vihar. By metro, the Red Line runs through Rohini and Pitampura.</p>
      </div>
      <div class="tile tone--sky">
        <span class="icon-dot"><?= icon('clock', 24) ?></span>
        <h3 class="h4">Hours</h3>
        <p class="body-s mt-2"><?= e(HOURS_DISPLAY) ?> (<?= e(HOURS_NOTE) ?>). <a href="/delhi-clinic">Rohini clinic details and directions</a>.</p>
      </div>
    </div>
  </div>
</section>

<!-- 10. FAQs -->
<section class="section section--canvas" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Hair Transplant FAQs</h2>
        <p class="body-s mt-3">A question about your hairline, medical history or budget? Message the Rohini clinic directly.</p>
        <div class="btn-row mt-4">
          <a class="btn btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
        </div>
      </div>

      <?= faq_list($faqs, 1, 4) ?>
    </div>
  </div>
</section>

<!-- 11. Final consultation -->
<section class="section consult" id="consultation">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Book a consultation</p>
        <h2 class="h2 mt-2">Book a Hair Transplant Consultation in Rohini, Delhi</h2>
        <p class="body-l mt-3 measure">Meet the doctor at the Rohini clinic for a scalp and donor examination, a hairline drawn on your own face and an itemised written estimate. You are not asked to book a procedure on the day.</p>

        <dl class="dl mt-4">
          <div><dt>Address</dt><dd><?= e(LOC_DELHI_ADDRESS) ?><span class="meta" style="display:block;font-weight:500"><?= e(LOC_DELHI_LANDMARK) ?></span></dd></div>
          <div><dt>Phone</dt><dd><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></dd></div>
          <div><dt>WhatsApp</dt><dd><a href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp">Message <?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></dd></div>
          <div><dt>Hours</dt><dd><?= e(HOURS_DISPLAY) ?><span class="meta" style="display:block;font-weight:500"><?= e(HOURS_NOTE) ?></span></dd></div>
        </dl>

        <div class="btn-row mt-5">
          <a class="btn btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> WhatsApp</a>
          <a class="btn btn--outline" href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= icon('phone', 17) ?> Call the Clinic</a>
          <a class="btn btn--outline" href="<?= e(LOC_DELHI_MAPS_URL) ?>" target="_blank" rel="noopener"><?= icon('pin', 17) ?> Directions<span class="sr-only"> (opens in a new tab)</span></a>
        </div>
      </div>

      <div class="consult__form">
        <h3 class="h3">Request an Appointment</h3>
        <p class="body-s mt-1">The clinic replies during opening hours (<?= e(HOURS_DISPLAY) ?>).</p>
        <div class="mt-4">
          <?= enquiry_form('hair-transplant-in-rohini', [
              'Hair transplant (FUE / DHI)',
              'Hairline transplant',
              'Crown hair transplant',
              'Hair transplant for women',
              'Hair transplant repair',
              'Not sure — please advise',
          ], false) ?>
        </div>
        <p class="fine mt-4">Suitability is decided after clinical assessment. This page is patient education and is not medical advice.</p>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
