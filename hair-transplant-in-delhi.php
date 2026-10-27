<?php
/**
 * /hair-transplant-in-delhi — the Delhi hair transplant pillar page, for the
 * Rohini clinic.
 *
 * Built 27 Oct 2026 at the client's request to replace /hair-transplant-delhi/
 * (which now 301s here), section for section on /hair-transplant-in-gurgaon:
 *
 *  1. Treatment overview: copy, the recorded before/after case, at a glance
 *  2. Why DenceSpot, beside the clinic's FUE handpiece
 *  3. Before and after: consented composites in a swipeable row
 *  4. The doctors: the homepage's three tiles, worded for Rohini
 *  5. Techniques: FUE and DHI; FUT is not on record at Rohini
 *  6. Procedure: five steps, with icons in place of the Gurgaon page's AI images
 *  7. Cost: factors, Norwood graft bands, what the estimate covers; no prices
 *  8. Patient reviews: a link to the Rohini clinic's Google profile
 *  9. FAQs (the same array drives the JSON-LD; six shown, the rest behind
 *     "View more")
 * 10. Consultation: the Rohini clinic's details and form
 *
 * Just above the footer, "Serving Patients Across Delhi" links every Delhi area
 * page (includes/delhi-service-areas.php), in place of the treatment links.
 *
 * Differences from the Gurgaon page, by the location rule and the Rohini no-AI
 * rule: the hero is the licensed stock photo labelled representative, there
 * are no patient videos (filmed for the Gurugram clinic), and the reviews
 * section links to the Rohini listing instead of embedding the Gurugram
 * widget. Who treats patients at Rohini is not on record, so no doctor is
 * named as performer.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';
require_once __DIR__ . '/includes/gallery-manifest.php';

$url = '/hair-transplant-in-delhi';

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair Transplant in Delhi'],
];

/** Patient-education bands, the same as the table on /hair-transplant-cost-in-rohini. */
$bands = [
    ['stage' => 'Norwood II',              'zone' => 'Early recession at the temples',            'grafts' => '800 – 1,500'],
    ['stage' => 'Norwood III',             'zone' => 'Hairline and temples',                      'grafts' => '1,200 – 2,000'],
    ['stage' => 'Norwood III vertex – IV', 'zone' => 'The front first; the crown as donor allows', 'grafts' => '1,800 – 2,600'],
    ['stage' => 'Norwood V',               'zone' => 'Front, mid-scalp and crown',                'grafts' => '2,500 – 3,500'],
    ['stage' => 'Norwood VI – VII',        'zone' => 'Extensive loss, usually staged',            'grafts' => '3,000 – 4,500+'],
];

/** Consented DenceSpot patient composites (GALLERY_MANIFEST, CAT_RESULT), never labelled as Delhi cases. */
$resultFiles = ['2023-05-17 (5).jpg', '2023-05-17.jpg', '2023-05-10.jpg', '2023-05-17 (9).jpg', '2023-05-17 (1).jpg', '2023-05-17 (8).jpg'];
$published   = array_column(gallery_images(CAT_RESULT), null, 'file');
$results     = array_values(array_filter(array_map(static fn (string $f): ?array => $published[$f] ?? null, $resultFiles)));
$featured    = NAMED_CASES[0];   // FUE, 2,400 grafts, 12 months — the case with recorded details

/* Suitability, grafts, recovery, scarring, growth and cost first; the rest
   sit behind "View more". */
$faqs = [
    ['q' => 'Who is suitable for a hair transplant?',
     'a' => 'A transplant needs enough donor hair at the back and sides, and a cause of hair loss that surgery can address. It is usually postponed or not advised with fast-changing loss, a thin donor area, diffuse thinning across the whole scalp, active alopecia areata, an untreated cause such as low iron or a thyroid disorder, or a medical condition that makes surgery unsafe. Then <a href="/hair-fall-treatment-in-rohini">hair fall treatment</a> or <a href="/hair-prp-treatment-in-rohini">PRP</a> may come first, and the question is looked at again later.'],
    ['q' => 'How many grafts might I need?',
     'a' => 'That depends on the area to be covered and on what your donor area can safely give, which is measured at the examination. As general bands, early temple recession (Norwood II) may need around 800–1,500 grafts, a receding hairline (Norwood III) around 1,200–2,000, and Norwood V around 2,500–3,500, sometimes over two sessions. The <a href="/hair-transplant-graft-calculator">graft calculator</a> gives a starting range; the examination gives your own number.'],
    ['q' => 'How long does recovery take?',
     'a' => 'Most visible healing happens in the first two weeks: swelling settles within about a week, and the small crusts around the grafts loosen and wash off by around day ten to fourteen. Many people return to desk work within a few days; gym, swimming and tight helmets usually wait three to four weeks. The <a href="/hair-transplant-aftercare">aftercare guide</a> goes through each stage.'],
    ['q' => 'Will the donor area show a scar?',
     'a' => 'FUE and DHI take grafts one at a time, which leaves small dot scars spread across the back and sides rather than a line. Hair of a usual length covers them; a very short clipper cut can show them, and some people heal with more visible marks than others. Your donor density is measured first so the area is not over-harvested.'],
    ['q' => 'When does the new hair start growing?',
     'a' => 'Transplanted hairs commonly shed in weeks two to six while the follicles stay in place under the skin. New hair appears from about three to four months, often unevenly at first, and the result is judged at ten to twelve months; the crown can take longer than the hairline.'],
    ['q' => 'How much does a hair transplant cost in Delhi?',
     'a' => 'There is no fixed price, because the cost follows the number of grafts your plan needs, the technique, how complex the work is and what the estimate includes. At the Rohini clinic it is given to you itemised and in writing after your examination, before any date is booked. The <a href="/hair-transplant-cost-in-rohini">Rohini cost guide</a> explains each factor.'],
    ['q' => 'Does the procedure hurt?',
     'a' => 'The local anaesthetic injections at the start are the uncomfortable part. After that the treated areas are numb, though you may feel pressure or pulling. Soreness, tightness or swelling for a few days afterwards is common and is managed with the medication prescribed for you.'],
    ['q' => 'How long does the procedure take?',
     'a' => 'It depends on the number of grafts. A small hairline session may take a few hours; a large session can take most of the day, with breaks for meals. It is a day case, so you go home the same evening, ideally with someone to accompany you.'],
    ['q' => 'How long do transplanted hairs last?',
     'a' => 'Grafts are taken from the back and sides of the scalp, where hair generally resists the hormonal process behind pattern hair loss, and they usually keep that character after the move. The hair around them that was not transplanted can keep thinning with age, so medicines or a later session may be part of a long-term plan. No clinic can promise a particular density.'],
    ['q' => 'What is the difference between FUE and DHI?',
     'a' => 'Grafts are taken the same way in both. In FUE the openings are made first and the grafts placed into them, which is efficient over larger areas such as the crown. In DHI an implanter pen makes the opening and sets the graft in one movement, which gives close control along the hairline but is slower per graft. Many plans use both: see <a href="/fue-hair-transplant-in-rohini">FUE</a> and <a href="/dhi-hair-transplant-in-rohini">DHI</a> at the Rohini clinic.'],
    ['q' => 'Is FUT done at the Rohini clinic?',
     'a' => 'FUT, where a thin strip of scalp is removed and divided into grafts, leaves a linear scar at the back of the head. FUE and DHI are the techniques on record at the Rohini clinic; ask at your consultation whether FUT is offered and whether it would suit you.'],
    ['q' => 'Can women have a hair transplant?',
     'a' => 'Sometimes. Hair loss in women is more often diffuse and can reach the donor area, so hormonal, thyroid, iron and post-partum causes are checked and treated first. Surgery is considered for suitable patterns, such as a high or receding front hairline, traction loss that has stopped, or a stable scar. See <a href="/hair-transplant-for-women-in-rohini">hair transplant for women in Rohini</a>.'],
    ['q' => 'What are the possible risks?',
     'a' => 'Common, short-lived effects are swelling of the forehead, soreness, numbness and itching, and small pimples as new hairs come through. Less often there can be infection, bleeding, temporary shedding of existing hair around the grafts (shock loss), cysts, or weaker growth of some grafts. Contact the clinic promptly for bleeding that does not stop after 10–15 minutes of steady pressure, spreading redness or pus, fever, or pain that gets worse after the first few days. <a href="/blog/hair-transplant-side-effects-and-risks">Hair transplant side effects and risks</a> covers each one.'],
    ['q' => 'Which parts of Delhi do you see patients from?',
     'a' => 'DenceSpot has one clinic in Delhi, in Rohini, North-West Delhi. Consultations, procedures and follow-up reviews all take place there, so patients from other parts of the city travel to Rohini for each visit. The areas we serve are listed at the foot of this page, and the Directions button below opens the clinic on Google Maps.'],
    ['q' => 'What should I bring to the consultation?',
     'a' => 'A list of the medicines and supplements you take, any blood test reports from the last few months, and details of earlier hair treatment or surgery. Photographs of your hair from a few years ago can help show how the pattern has changed.'],
];

$page = [
    'title'         => 'Hair Transplant in Delhi: FUE, DHI & Cost | DenceSpot Rohini',
    'description'   => 'Hair transplant in Delhi at DenceSpot’s Rohini clinic: FUE and DHI planned by doctors, before-and-after photos, cost factors, recovery and FAQs.',
    'url'           => $url,
    'body_class'    => 'tx-rich',
    'crumbs'        => $crumbs,
    'location'      => 'rohini',
    'service_areas' => true,
    'schema'        => [
        schema_delhi_clinic(),
        schema_breadcrumbs($crumbs),
        schema_procedure($url, [
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
        schema_faq($url, $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<?php /* The Gurgaon page's full-width hero, with the licensed stock photo
           (Pexels 16571735) in place of its AI image: no AI images on Rohini
           pages. It is not the Rohini clinic, so it is labelled. */ ?>
<section class="hero-x hero-x--page">
  <div class="hero-x__media">
    <img src="/assets/img/stock-treatment-room-1200.webp"
         srcset="/assets/img/stock-treatment-room-720.webp 720w, /assets/img/stock-treatment-room-1200.webp 1200w"
         sizes="(min-width: 1024px) and (min-aspect-ratio: 1/1) 960px, 100vw"
         alt="Representative image of a clinic treatment room with a treatment couch, lamp and equipment"
         width="1200" height="900" loading="eager" fetchpriority="high" decoding="async">
  </div>
  <p class="hero-x__note hero-x__note--photo">Representative image</p>

  <div class="wrap hero-x__body">
    <div class="hero-x__text">
      <span class="pill pill--dot">Rohini, North-West Delhi</span>
      <h1 class="hero-x__title">Hair Transplant in Delhi</h1>
      <p class="hero-x__lead">FUE and DHI hair transplant at our Rohini clinic, planned around your donor area after an examination by a doctor — with the estimate in writing before any date is booked.</p>

      <ul class="hero-x__feats">
        <li><span><?= icon('user', 19, 'currentColor', 1.9) ?></span>Doctor-led planning</li>
        <li><span><?= icon('settings', 19, 'currentColor', 1.9) ?></span>FUE &amp; DHI at the clinic</li>
        <li><span><?= icon('pencil', 19, 'currentColor', 1.9) ?></span>Hairline drawn on your face</li>
        <li><span><?= icon('doc', 19, 'currentColor', 1.9) ?></span>Written estimate first</li>
      </ul>

      <div class="btn-row hero-x__ctas">
        <a class="btn btn--lg btn--ink" href="<?= e(book_url()) ?>" data-book data-clinic="Delhi (Rohini)" data-treatment="Hair transplant" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
        <a class="btn btn--lg btn--outline" href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= icon('phone', 18) ?> Call <?= e(LOC_DELHI_PHONE_DISPLAY) ?></a>
      </div>
      <p class="hero-x__note hero-x__note--copy">Image: representative, not the Rohini clinic</p>
    </div>
  </div>
</section>

<!-- 1. Treatment overview -->
<section class="section ht-sec ht-overview-sec" id="about">
  <div class="wrap">
    <div class="ht-overview">
      <div class="ht-overview__text">
        <p class="eyebrow">About the treatment</p>
        <h2 class="h2 mt-2">How a Hair Transplant Works</h2>
        <p class="body mt-3">A hair transplant is a minor surgical procedure done under local anaesthetic. Follicles are taken from the back and sides of the scalp — the donor area, where hair generally resists pattern hair loss — and placed into thinning areas at the angle the surrounding hair grows. It moves hair you already have; it does not create new follicles, so the plan is made against the loss you may have in years to come, not only today’s.</p>
        <p class="body mt-3">In Delhi, DenceSpot’s FUE and DHI hair transplants are planned and carried out at the Rohini clinic by registered medical practitioners.</p>
        <div class="btn-row mt-4">
          <a class="btn btn--ink" href="/hair-loss-assessment">Check If You May Be a Candidate <?= icon('arrow', 16) ?></a>
        </div>
      </div>

      <?php /* The recorded case (NAMED_CASES[0]) split into its two halves:
               left is the before, right the after at 12 months. */ ?>
      <figure class="ht-pair">
        <a class="ht-pair__photos" href="<?= e($featured['image']) ?>" data-lightbox data-title="<?= e($featured['technique'] . ' · ' . $featured['grafts'] . ' · before and ' . $featured['interval'] . ' after') ?>">
          <span class="ht-pair__img">
            <img src="/assets/img/case-uttam-before-480.webp" alt="Before: a DenceSpot patient’s scalp with the planned hairline drawn before an FUE hair transplant" width="480" height="600" loading="lazy" decoding="async">
            <span class="ht-pair__tag">Before</span>
          </span>
          <span class="ht-pair__arrow" aria-hidden="true"><?= icon('arrow', 18, 'currentColor', 2.2) ?></span>
          <span class="ht-pair__img">
            <img src="/assets/img/case-uttam-after-480.webp" alt="After: the same patient <?= e($featured['interval']) ?> after a <?= e($featured['grafts']) ?> FUE hair transplant" width="480" height="600" loading="lazy" decoding="async">
            <span class="ht-pair__tag ht-pair__tag--after">After <?= e($featured['interval']) ?></span>
          </span>
        </a>
        <figcaption><?= e($featured['technique']) ?> · <?= e($featured['grafts']) ?> · consented DenceSpot patient. Results vary.</figcaption>
      </figure>

      <ul class="ht-glance" aria-label="Hair transplant at a glance">
        <li><span class="icon-dot tone--mint"><?= icon('shield', 21) ?></span><span><b>Local anaesthetic</b>You are awake throughout</span></li>
        <li><span class="icon-dot tone--violet"><?= icon('calendar', 21) ?></span><span><b>Day case</b>You go home the same day</span></li>
        <li><span class="icon-dot tone--sky"><?= icon('clock', 21) ?></span><span><b>Back to desk work</b>Usually within a few days</span></li>
        <li><span class="icon-dot tone--amber"><?= icon('chart', 21) ?></span><span><b>New growth</b>From about 3–4 months; judged at 10–12</span></li>
      </ul>
    </div>
  </div>
</section>

<!-- 2. Why DenceSpot -->
<section class="section ht-sec ht-why" id="why">
  <div class="wrap">
    <div class="ht-why__body">
      <p class="eyebrow">Why DenceSpot</p>
      <h2 class="h2 mt-2">Why Choose DenceSpot for a Hair Transplant in Delhi?</h2>
      <p class="body mt-2">How each case is handled at the Rohini clinic, from the first examination to the written estimate.</p>

      <ul class="ht-why__icons">
        <?php foreach ([
            ['user',     'Doctor-Led Planning'],
            ['search',   'Magnified Scalp Examination'],
            ['doc',      'Personalised Written Plan'],
            ['pin',      'Rohini Clinic, North-West Delhi'],
            ['pencil',   'Hairline Drawn on Your Face'],
            ['rupee',    'Itemised Written Estimate'],
        ] as [$ic, $label]): ?>
        <li><span class="ht-why__ring"><?= icon($ic, 26, 'currentColor', 1.7) ?></span><span class="ht-why__label"><?= e($label) ?></span></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <figure class="ht-why__media">
    <img src="/assets/img/clinic-equipment.jpg" alt="Motorised FUE handpiece used at DenceSpot Clinic to take follicular units one at a time" width="492" height="855" loading="lazy" decoding="async">
    <ul class="ht-why__checks">
      <li><?= icon('check', 16, 'currentColor', 2.4) ?> FUE &amp; DHI at the Rohini clinic</li>
      <li><?= icon('check', 16, 'currentColor', 2.4) ?> Consented patient photographs</li>
      <li><?= icon('check', 16, 'currentColor', 2.4) ?> Reviews through the first year</li>
    </ul>
    <figcaption class="ht-why__tag">DenceSpot’s FUE handpiece</figcaption>
  </figure>
</section>

<!-- 3. Before-and-after results -->
<section class="section ht-sec section--white" id="results">
  <div class="wrap">
    <p class="eyebrow">Results</p>
    <h2 class="h2 mt-2">Hair Transplant Before and After Results</h2>
    <p class="body mt-2">Consented photographs of DenceSpot patients, not digitally altered. They show what happened for these patients, not what will happen for you.</p>

    <?php if ($results !== []): ?>
    <div class="ht-gallery">
      <?php /* The arrows stay hidden until the script below runs; without it the row still scrolls. */ ?>
      <button type="button" class="ht-gallery__nav ht-gallery__nav--prev" data-ht-scroll="-1" aria-controls="ht-results" aria-label="Previous photographs" hidden><?= icon('arrow', 18, 'currentColor', 2) ?></button>
      <div class="ht-results" id="ht-results" role="region" aria-label="Before and after photographs" tabindex="0">
        <?php foreach ($results as $i => $r): ?>
        <a class="ba-link ht-result" href="<?= e($r['url']) ?>" data-lightbox data-title="Hair transplant before and after — DenceSpot patient">
          <?= photo_img($r['url'], 'Hair transplant before and after, photo ' . ($i + 1) . ' — consented DenceSpot Clinic patient', '(min-width: 1080px) 380px, (min-width: 700px) 46vw, 80vw', $r['w'], $r['h']) ?>
        </a>
        <?php endforeach; ?>
      </div>
      <button type="button" class="ht-gallery__nav ht-gallery__nav--next" data-ht-scroll="1" aria-controls="ht-results" aria-label="Next photographs" hidden><?= icon('arrow', 18, 'currentColor', 2) ?></button>
    </div>
    <p class="ht-center meta mt-3">Before and after as marked on each photo. Technique, graft count and the time between photographs are not recorded on these images.</p>
    <?php endif; ?>

    <div class="ht-center mt-5">
      <a class="btn btn--ink" href="/gallery">View More Before &amp; After Results <?= icon('arrow', 16) ?></a>
    </div>
  </div>
</section>
<script>
(function () {
  // Each arrow scrolls the row it controls (aria-controls) and is disabled
  // at that end of the row.
  document.querySelectorAll('[data-ht-scroll]').forEach(function (button) {
    var track = document.getElementById(button.getAttribute('aria-controls'));
    if (!track) { return; }
    var dir = Number(button.getAttribute('data-ht-scroll'));
    var sync = function () {
      var max = track.scrollWidth - track.clientWidth - 4;
      button.disabled = dir < 0 ? track.scrollLeft < 4 : track.scrollLeft > max;
    };
    button.hidden = false;
    button.addEventListener('click', function () {
      track.scrollBy({ left: dir * track.clientWidth * 0.9, behavior: 'smooth' });
    });
    track.addEventListener('scroll', sync, { passive: true });
    window.addEventListener('resize', sync);
    sync();
  });
}());
</script>

<!-- 4. The doctors: the same three tiles as the homepage -->
<?= doctors_grid_section(
    'Our doctors',
    'Meet the Doctors at DenceSpot',
    'Every case starts with an examination by a doctor. The doctor who will treat you at the Rohini clinic is named at your consultation, and you can ask for their qualifications, registration and experience with the technique planned for you.',
    'section--canvas ht-sec',
    page_review_signed_off()
) ?>

<!-- 5. Techniques -->
<section class="section ht-sec section--white" id="techniques">
  <div class="wrap">
    <div style="max-width:68ch">
      <p class="eyebrow">Techniques</p>
      <h2 class="h2 mt-2">FUE and DHI Hair Transplant Techniques</h2>
      <p class="body mt-3">Both use your own follicles, taken from the donor area in the same way. They differ in how the grafts are placed, none suits every case, and many plans combine the two.</p>
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
      ] as $href => $anchor): ?>
      <li><a href="<?= e($href) ?>"><?= e($anchor) ?> <?= icon('arrow', 14) ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- 6. The procedure -->
<section class="section ht-sec section--canvas ht-process" id="process">
  <div class="wrap">
    <p class="eyebrow">Procedure</p>
    <h2 class="h2 mt-2">Our Hair Transplant Procedure</h2>
    <p class="body mt-2">Five stages at the Rohini clinic, from the first visit to the twelve-month review.</p>

    <ol class="ht-steps">
      <?php foreach ([
          ['search',   'Consultation &amp; Scalp Analysis',       'Scalp and donor area examined under magnification; history and medicines reviewed.'],
          ['pencil',   'Treatment Planning &amp; Hairline Design', 'Graft zones mapped, the hairline drawn on your face and the estimate given in writing.'],
          ['list',     'Graft Extraction',                        'Follicles taken one at a time from the back and sides, under local anaesthetic.'],
          ['settings', 'Graft Implantation',                      'Placed into pre-made sites (FUE) or with an implanter pen (DHI), at the angle of the surrounding hair.'],
          ['calendar', 'Recovery &amp; Follow-up',                'Written aftercare and photographed reviews through the first twelve months.'],
      ] as $i => [$ic, $title, $text]): ?>
      <li class="ht-step">
        <span class="ht-step__img ht-step__img--icon"><?= icon($ic, 40, 'currentColor', 1.6) ?></span>
        <span class="ht-step__num"><?= sprintf('%02d', $i + 1) ?></span>
        <h3 class="ht-step__title"><?= $title ?></h3>
        <p class="ht-step__text"><?= e($text) ?></p>
      </li>
      <?php endforeach; ?>
    </ol>

    <p class="ht-steps__note">Recovery is covered stage by stage in the <a href="/hair-transplant-aftercare">aftercare guide</a> and <a href="/blog/first-14-days-after-a-hair-transplant">the first 14 days after a hair transplant</a>.</p>
    <div class="ht-center mt-5">
      <a class="btn btn--ink" href="#consultation"><?= icon('calendar', 17) ?> Book a Consultation</a>
    </div>
  </div>
</section>

<!-- 7. Cost -->
<section class="section ht-sec section--white" id="cost">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Cost</p>
        <h2 class="h2 mt-2">Hair Transplant Cost in Delhi</h2>
        <p class="body mt-3 measure">There is no fixed price, because no two plans move the same number of grafts. The estimate is the graft count multiplied by a per-graft rate for the technique, plus what the estimate covers — given to you itemised and in writing after your examination at the Rohini clinic.</p>
        <?= cost_band_line() ?>

        <div class="factor-list">
          <div class="factor tone--mint"><span class="icon-dot"><?= icon('chart', 20) ?></span><div><b>Number of grafts</b><span>Mapped zone by zone from the area to be covered.</span></div></div>
          <div class="factor tone--violet"><span class="icon-dot"><?= icon('user', 20) ?></span><div><b>Hair-loss stage</b><span>How much needs covering now, and what may thin later.</span></div></div>
          <div class="factor tone--sky"><span class="icon-dot"><?= icon('search', 20) ?></span><div><b>Donor density</b><span>What the back and sides can give without visibly thinning.</span></div></div>
          <div class="factor tone--amber"><span class="icon-dot"><?= icon('settings', 20) ?></span><div><b>Technique</b><span>DHI placement is slower per graft than FUE placement.</span></div></div>
          <div class="factor tone--rose"><span class="icon-dot"><?= icon('scale', 20) ?></span><div><b>Complexity</b><span>Unshaven work, repair of earlier surgery or tightly curled hair.</span></div></div>
        </div>

        <p class="meta mt-4 measure">On “per graft, starting from” prices: a low rate applied to an inflated graft count costs more than a careful estimate. Ask any clinic how its graft number was worked out.</p>

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
            <h3 class="h4">Graft Requirements by Norwood Stage</h3>
            <p>General patient-education bands, not a quote.</p>
          </div>
          <div class="table-scroll">
            <table class="data data--fit">
              <caption class="sr-only">General hair transplant graft bands by Norwood stage — patient education, not a quote</caption>
              <thead>
                <tr><th scope="col">Stage</th><th scope="col">Area</th><th scope="col">Grafts</th></tr>
              </thead>
              <tbody>
                <?php foreach ($bands as $b): ?>
                <tr>
                  <th scope="row" style="color:var(--ink);font-size:14px;font-weight:700;text-transform:none;letter-spacing:0"><?= e($b['stage']) ?></th>
                  <td><?= e($b['zone']) ?></td>
                  <td style="font-weight:700;color:var(--tone-mint);white-space:nowrap"><?= e($b['grafts']) ?></td>
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
          <p class="body-s mt-4">Blood tests, supporting medical therapy, PRP or a second session are named separately if your plan needs them.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php /* 8. Patient reviews. The site's review widget shows the Gurugram
           listing, which a Rohini page does not carry (location rule), so
           this links to the Rohini clinic's own Google profile instead. */ ?>
<section class="section section--canvas ht-sec" id="reviews">
  <div class="wrap">
    <div class="measure" style="text-align:center;margin-inline:auto">
      <span class="pill pill--dot">Patient reviews</span>
      <h2 class="h2 mt-2">Reviews of Our Rohini Clinic on Google</h2>
      <p class="body mt-3">Reviews of DenceSpot’s Rohini clinic are on its Google Business Profile, unedited and in each reviewer’s own words. This page does not reproduce testimonials.</p>
    </div>
    <div class="btn-row mt-5" style="justify-content:center">
      <a class="btn btn--ink" href="<?= e(LOC_DELHI_MAPS_URL) ?>" target="_blank" rel="noopener"><?= icon('star', 18) ?> Read Rohini Clinic Reviews on Google<span class="sr-only"> (opens in a new tab)</span></a>
      <a class="btn btn--outline" href="/patient-reviews">How we collect reviews</a>
    </div>
  </div>
</section>

<!-- 9. FAQs -->
<section class="section ht-sec section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Hair Transplant in Delhi: FAQs</h2>
        <p class="body-s mt-3">General patient education. Anything specific to your scalp, health or budget is answered at the consultation.</p>
        <div class="btn-row mt-4">
          <a class="btn btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
        </div>
      </div>

      <?= faq_list($faqs, 1, 6) ?>
    </div>
  </div>
</section>

<!-- 10. Consultation -->
<section class="section ht-sec consult" id="consultation">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Book a consultation</p>
        <h2 class="h2 mt-2">Book a Hair Transplant Consultation in Delhi</h2>
        <p class="body-l mt-3 measure">Meet the doctor at the Rohini clinic for a scalp and donor examination, a hairline drawn on your own face and an itemised written estimate. You are not asked to book a procedure on the day.</p>

        <dl class="dl mt-4">
          <div><dt>Address</dt><dd><?= e(LOC_DELHI_ADDRESS) ?><span class="meta" style="display:block;font-weight:500"><?= e(LOC_DELHI_LANDMARK) ?></span></dd></div>
          <div><dt>Phone</dt><dd><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></dd></div>
          <div><dt>Hours</dt><dd><?= e(HOURS_DISPLAY) ?><span class="meta" style="display:block;font-weight:500"><?= e(HOURS_NOTE) ?></span></dd></div>
        </dl>

        <div class="btn-row mt-5">
          <a class="btn btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> WhatsApp</a>
          <a class="btn btn--outline" href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= icon('phone', 17) ?> Call the Clinic</a>
          <a class="btn btn--outline" href="<?= e(LOC_DELHI_MAPS_URL) ?>" target="_blank" rel="noopener"><?= icon('pin', 17) ?> Directions<span class="sr-only"> (opens in a new tab)</span></a>
        </div>
      </div>

      <div class="consult__form">
        <h3 class="h3">Book Your Consultation</h3>
        <p class="body-s mt-1">The Rohini clinic replies during opening hours (<?= e(HOURS_DISPLAY) ?>).</p>
        <div class="mt-4">
          <?= enquiry_form('hair-transplant-delhi', [
              'Hair transplant (FUE / DHI)',
              'Hairline transplant',
              'Crown hair transplant',
              'Hair transplant for women',
              'Hair transplant repair',
              'Beard or eyebrow transplant',
              'Not sure — please advise',
          ], false) ?>
        </div>
        <p class="fine mt-4">Suitability is decided after clinical assessment. This page is patient education and is not medical advice.</p>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
