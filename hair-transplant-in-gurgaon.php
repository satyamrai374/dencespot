<?php
/**
 * /hair-transplant-in-gurgaon — the Gurugram clinic's main hair transplant page.
 *
 * Rebuilt on 25 Oct 2026 to the client's reference layout, in the site's own
 * colours and type (ht-* classes in site.css). The hero is the homepage's
 * full-width .hero-x band with the procedure image. Section order, as the
 * brief sets it:
 *
 *  1. Treatment overview: copy, a recorded before/after case, at a glance
 *  2. Why DenceSpot: six on-record reasons beside the clinic's FUE equipment
 *  3. Before and after: consented composites (GALLERY_MANIFEST, CAT_RESULT)
 *     in a swipeable row; their own BEFORE/AFTER labels are printed on them
 *  4. The doctors: the homepage's three doctor tiles (doctors_grid_section)
 *  5. Techniques: FUE and DHI only — FUT is not confirmed at the clinic, so
 *     /fut-hair-transplant-in-gurgaon stays noindex and gets no card
 *  6. Procedure: five illustrated steps (AI-generated, marked)
 *  7. Cost: factors, Norwood graft bands, what the estimate covers; no prices
 *  8. Patient reviews: the live Google widget, never typed-in testimonials
 *  9. FAQs (the same array drives the JSON-LD; six shown, the rest behind
 *     "View more")
 * 10. Consultation: address, phone, WhatsApp and the enquiry form
 *
 * Reference elements left out on purpose: "permanent", "natural-looking",
 * "expert", "advanced", "free consultation", a founding year, patient counts
 * and a success rate — none is on record, and the strict-wording rule bars the
 * words themselves. Composite timings ("after 6 months") are not recorded, so
 * none is shown; only the featured case has a recorded interval.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';
require_once __DIR__ . '/includes/gallery-manifest.php';

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair transplant in Gurgaon'],
];

$doc = DOCTORS['dr-nyra'];

/**
 * The clinic's own Instagram reels (@dencespotclinic, @dencespot), supplied by
 * the client on 25 Oct 2026 and played from this site's own files in
 * assets/video/reels/ (<shortcode>.mp4 + .jpg poster), with no Instagram
 * interface around them (client request). Re-encoded for the web; C9hbIl0v2rA
 * is cut at 36.3 s, before an end card offering a "free consultation".
 * Left out because of what the video shows that this site does not publish:
 * DAX687MSPd8 ("★★★★★ Rating"), C4uY9DZstTs ("free consultation"),
 * C2u3K4vxqqY and C1T3piOsv-L ("Starting Price at 24,999/-" throughout),
 * CyQVNO0hCVC ("no pain"), C--LUVuycjf (a wall poster reading "…And No
 * Bleeding" and "Hair Transplant Surgeon Dr. Rahul MBBS MD"). C9aLIqjPdU0 is
 * PRP, not a transplant — it belongs on the PRP page.
 */
$reels = [
    'DG-eHuYptp3', 'DCOpv3syAQe', 'DBQ55WmSIpl', 'DAqRKQISvuY', 'C_0OxBfyZ9C', 'C_xmpWwyzGk',
    'C_vC--cSjeh', 'C9hbIl0v2rA', 'C7erIE9Pp-b', 'C7B8ag2v7Ed', 'CyQT10ShMX8',
];

/** Patient-education bands, the same as the table on /hair-transplant-cost-in-gurgaon. */
$bands = [
    ['stage' => 'Norwood II',     'zone' => 'Early recession at the temples',      'grafts' => '800 – 1,500'],
    ['stage' => 'Norwood III',    'zone' => 'Defined recession, hairline rebuild', 'grafts' => '1,200 – 2,000'],
    ['stage' => 'Norwood III–IV', 'zone' => 'Hairline plus early crown',           'grafts' => '1,800 – 2,600'],
    ['stage' => 'Norwood V',      'zone' => 'Front, mid-scalp and crown',          'grafts' => '2,500 – 3,500'],
    ['stage' => 'Norwood VI–VII', 'zone' => 'Extensive loss, usually staged',      'grafts' => '3,000 – 4,500+'],
];

/** Consented DenceSpot patient composites (GALLERY_MANIFEST, CAT_RESULT). */
$resultFiles = ['2023-05-17 (5).jpg', '2023-05-17.jpg', '2023-05-10.jpg', '2023-05-17 (9).jpg', '2023-05-17 (1).jpg', '2023-05-17 (8).jpg'];
$published   = array_column(gallery_images(CAT_RESULT), null, 'file');
$results     = array_values(array_filter(array_map(static fn (string $f): ?array => $published[$f] ?? null, $resultFiles)));
$featured    = NAMED_CASES[0];   // FUE, 2,400 grafts, 12 months — the case with recorded details

/* The brief's topics first (suitability, grafts, recovery, scarring, results,
   cost); the rest sit behind "View more". */
$faqs = [
    ['q' => 'Who is suitable for a hair transplant?',
     'a' => 'Usually someone whose pattern of loss has settled, who has enough donor density for the area to be covered, and who understands what one session can and cannot achieve. Rapidly progressing loss, some scalp conditions and certain medical histories mean medical treatment comes first, or that surgery is deferred. Suitability is decided after your scalp and donor area are examined.'],
    ['q' => 'How many grafts might I need?',
     'a' => 'It depends on the area to be covered, the density aimed for and what the donor area can safely give, mapped zone by zone at the assessment. Any figure offered before an examination is a guess, not a plan. The <a href="/hair-transplant-cost-in-gurgaon">Gurgaon cost guide</a> sets out the general bands by stage.'],
    ['q' => 'How long does recovery take?',
     'a' => 'Most people return to desk work within a few days, following the clinic’s instructions on washing, sun exposure, sleeping position and exercise. Crusting settles over the first week or two; the gym, swimming and helmets wait three to four weeks. The <a href="/hair-transplant-aftercare">aftercare guide</a> goes through it stage by stage.'],
    ['q' => 'Will a hair transplant leave a scar?',
     'a' => 'FUE and DHI take follicles one at a time with a punch under a millimetre across, leaving tiny dot-like marks spread over the donor area. They are usually hidden by the surrounding hair, but can show if the back and sides are clipped very short, and some people heal with more visible marks than others. The donor area is examined beforehand so it is not over-harvested.'],
    ['q' => 'When does transplanted hair start growing?',
     'a' => 'Transplanted hairs commonly shed in the first weeks while the follicles stay in place. New growth usually begins at around three to four months, and the result is assessed at roughly ten to twelve months. Growth is uneven early on, and the crown can take longer.'],
    ['q' => 'How much does a hair transplant cost in Gurgaon?',
     'a' => 'Cost depends on graft numbers, technique, complexity and any supporting treatment, so it is quoted after the assessment rather than as a headline price. You receive an itemised written estimate before any date is booked. The <a href="/hair-transplant-cost-in-gurgaon">cost guide</a> explains each factor.'],
    ['q' => 'Is a hair transplant painful?',
     'a' => 'The local anaesthetic injections at the start are the uncomfortable part; after that the area is numb, although you may feel pressure. Mild soreness, tightness or swelling for a few days afterwards is normal and is managed with prescribed medication. Pain tolerance varies between patients.'],
    ['q' => 'How long does the procedure take?',
     'a' => 'It scales with the number of grafts. Smaller sessions take a few hours; larger ones run through most of the day, with breaks. It is a day case, so you go home the same day.'],
    ['q' => 'How long do transplanted hairs last?',
     'a' => 'Transplanted follicles keep the character of the donor area they came from and generally continue to grow for the long term. The hair around them that was not transplanted can keep thinning with age, which is why the plan looks years ahead and why medical treatment often continues alongside. The density you reach depends on your donor supply, so it is discussed as a range at the consultation, not promised.'],
    ['q' => 'What is the difference between FUE and DHI?',
     'a' => 'Harvesting is the same. The difference is placement: in DHI each graft is set with an implanter pen in a single movement, giving close control of depth and angle, which helps along the hairline. FUE placement into sites made beforehand is efficient over larger areas. Neither is better for every scalp; the <a href="/fue-hair-transplant-in-gurgaon">FUE</a> and <a href="/dhi-hair-transplant-in-gurgaon">DHI</a> pages cover each in detail.'],
    ['q' => 'Can women have a hair transplant?',
     'a' => 'Sometimes. Hair loss in women is more often diffuse, and hormonal, thyroid, iron or post-partum causes are investigated and treated first. Many women do better with medical treatment; surgery is considered for suitable patterns such as a high or receding frontal line. The <a href="/hair-transplant-for-women-in-gurgaon">hair transplant for women</a> page explains the assessment.'],
    ['q' => 'What are the risks of a hair transplant?',
     'a' => 'Swelling of the forehead, soreness, numbness and itching are common and short-lived. Less often there can be infection, bleeding, temporary shedding of existing hair around the grafts (shock loss), small cysts, or weaker growth of some grafts. Call the clinic if bleeding continues after 10–15 minutes of firm pressure, or if you notice spreading redness, pus, a fever or pain that increases after the first few days. Each risk is covered in the guide to <a href="/blog/hair-transplant-side-effects-and-risks">hair transplant side effects and risks</a>.'],
    ['q' => 'What happens at the consultation?',
     'a' => 'A review of your history and medicines, an examination of the scalp and donor area under magnification, staging of the pattern, photographs for your record, and a written plan covering technique, approximate graft numbers, timing and cost. Bring a list of your current medicines.'],
];

$page = [
    'title'       => 'Hair Transplant in Gurgaon: FUE, DHI & Cost | DenceSpot',
    'description' => 'Hair transplant in Gurgaon at DenceSpot, Sector 39: FUE and DHI planned and performed by Dr. Nyra, before-and-after photos, cost, recovery and FAQs.',
    'url'         => '/hair-transplant-in-gurgaon',
    'body_class'  => 'tx-rich',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/hair-transplant-in-gurgaon', [
            'name'              => 'Hair Transplant',
            'description'       => 'A hair transplant moves hair you already have from the back and sides of the scalp into thinned areas, by FUE or DHI, under local anaesthetic as a day case at the Sector 39 clinic in Gurugram.',
            'alternateName'     => ['Hair Transplant in Gurgaon', 'FUE Hair Transplant in Gurgaon', 'DHI Hair Transplant in Gurgaon'],
            'procedureType'     => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'      => 'Scalp',
            'howPerformed'      => 'Follicular units are taken one at a time from the donor scalp at the back and sides of the head and placed into thinning or bald areas at the angle and direction of the surrounding hair, by FUE placement into pre-made sites or with DHI implanter pens. A day case under local anaesthetic at the Sector 39 clinic in Gurugram.',
            'preparation'       => 'Magnified examination of the hair-loss pattern and donor density, review of medical history and medicines, and a hairline drawn and agreed with the patient before surgery.',
            'followup'          => 'Written aftercare instructions covering washing, sun exposure, sleeping position and activity, with photographed review appointments through the first twelve months.',
            'expectedPrognosis' => 'Transplanted hairs commonly shed within the first weeks while the follicles stay in place; new growth typically begins at around three to four months and the result is assessed at about ten to twelve months. Outcomes vary between patients and cannot be promised.',
        ]),
        schema_faq('/hair-transplant-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<?php /* Full-width hero as in the client's reference (25 Oct 2026): a tinted
           band with the procedure image pinned right and fading into it, the
           copy on the left, nothing laid over the photo. Built on the
           homepage's .hero-x; on phones the image comes first. */ ?>
<section class="hero-x hero-x--page">
  <div class="hero-x__media">
    <img src="/assets/img/home/hero-ht-gurgaon-960.webp"
         srcset="/assets/img/home/hero-ht-gurgaon-720.webp 720w, /assets/img/home/hero-ht-gurgaon-960.webp 960w"
         sizes="(min-width: 1024px) and (min-aspect-ratio: 1/1) 960px, 100vw"
         alt="AI-generated image: a doctor placing hair grafts along a patient’s hairline with an implanter pen"
         width="960" height="720" loading="eager" fetchpriority="high" decoding="async">
  </div>
  <p class="hero-x__note hero-x__note--photo">AI-generated image</p>

  <div class="wrap hero-x__body">
    <div class="hero-x__text">
      <span class="pill pill--dot">Sector 39, Gurugram</span>
      <h1 class="hero-x__title">Hair Transplant in Gurgaon</h1>
      <p class="hero-x__lead">FUE and DHI hair transplant at our Sector 39 clinic, planned around your donor area — and performed by the doctor who examines you.</p>

      <ul class="hero-x__feats">
        <li><span><?= icon('user', 19, 'currentColor', 1.9) ?></span>Doctor-led planning</li>
        <li><span><?= icon('settings', 19, 'currentColor', 1.9) ?></span>FUE &amp; DHI at the clinic</li>
        <li><span><?= icon('pencil', 19, 'currentColor', 1.9) ?></span>Hairline drawn on your face</li>
        <li><span><?= icon('doc', 19, 'currentColor', 1.9) ?></span>Written estimate first</li>
      </ul>

      <div class="btn-row hero-x__ctas">
        <a class="btn btn--lg btn--ink" href="/book-consultation"><?= icon('calendar', 18) ?> Book a Consultation</a>
        <a class="btn btn--lg btn--outline" href="tel:<?= e(PHONE_E164) ?>" data-track="call"><?= icon('phone', 18) ?> Call <?= e(PHONE_DISPLAY) ?></a>
      </div>
      <p class="hero-x__note hero-x__note--copy">Image: AI-generated</p>
    </div>
  </div>
</section>

<!-- 1. Treatment overview -->
<section class="section ht-sec ht-overview-sec" id="about">
  <div class="wrap">
    <div class="ht-overview">
      <div class="ht-overview__text">
        <p class="eyebrow">About the treatment</p>
        <h2 class="h2 mt-2">What Is a Hair Transplant?</h2>
        <p class="body mt-3">A hair transplant moves hair you already have from the back and sides of the scalp — the donor area — into the areas that have thinned, placing each graft at the angle the neighbouring hair grows. At the Sector 39 clinic in Gurugram, FUE and DHI are performed under local anaesthetic as a day case.</p>
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
        <li><span class="icon-dot tone--amber"><?= icon('chart', 21) ?></span><span><b>New growth</b>From about 3–4 months; assessed at 10–12</span></li>
      </ul>
    </div>
  </div>
</section>

<!-- 2. Why DenceSpot -->
<section class="section ht-sec ht-why" id="why">
  <div class="wrap">
    <div class="ht-why__body">
      <p class="eyebrow">Why DenceSpot</p>
      <h2 class="h2 mt-2">Why Choose DenceSpot Clinic for Hair Transplant in Gurgaon?</h2>
      <p class="body mt-2">How each case is handled here, from the first examination to the written estimate.</p>

      <ul class="ht-why__icons">
        <?php foreach ([
            ['user',     'Doctor-Led, Start to Finish'],
            ['search',   'Magnified Scalp Examination'],
            ['doc',      'Personalised Written Plan'],
            ['pin',      'Sector 39 Clinic, Gurugram'],
            ['pencil',   'Hairline Drawn on Your Face'],
            ['rupee',    'Itemised Written Estimate'],
        ] as [$ic, $label]): ?>
        <li><span class="ht-why__ring"><?= icon($ic, 26, 'currentColor', 1.7) ?></span><span class="ht-why__label"><?= $label ?></span></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <?php /* Stock photo (Pexels, free licence: "Treatment Room in a Private
           Clinic", photo 16571735). It is not the DenceSpot clinic, so it is
           labelled as representative. */ ?>
  <figure class="ht-why__media">
    <img src="/assets/img/stock-treatment-room-1200.webp"
         srcset="/assets/img/stock-treatment-room-720.webp 720w, /assets/img/stock-treatment-room-1200.webp 1200w"
         sizes="(min-width: 1080px) 42vw, calc(100vw - 40px)"
         alt="Representative image of a modern clinic treatment room with a treatment couch, lamp and equipment"
         width="1200" height="900" loading="lazy" decoding="async">
    <ul class="ht-why__checks">
      <li><?= icon('check', 16, 'currentColor', 2.4) ?> FUE &amp; DHI at the clinic</li>
      <li><?= icon('check', 16, 'currentColor', 2.4) ?> Consented patient photographs</li>
      <li><?= icon('check', 16, 'currentColor', 2.4) ?> Reviews through the first year</li>
    </ul>
    <figcaption class="ht-why__tag">Representative image</figcaption>
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
          <?= photo_img($r['url'], 'Hair transplant before and after, photo ' . ($i + 1) . ' — consented DenceSpot Clinic patient, Gurugram', '(min-width: 1080px) 380px, (min-width: 700px) 46vw, 80vw', $r['w'], $r['h']) ?>
        </a>
        <?php endforeach; ?>
      </div>
      <button type="button" class="ht-gallery__nav ht-gallery__nav--next" data-ht-scroll="1" aria-controls="ht-results" aria-label="Next photographs" hidden><?= icon('arrow', 18, 'currentColor', 2) ?></button>
    </div>
    <p class="ht-center meta mt-3">Before and after as marked on each photo. Technique, graft count and the time between photographs are not recorded on these images.</p>
    <?php endif; ?>

    <?php if ($reels !== []): ?>
    <div class="ht-videos-head">
      <h3 class="h3">Patient Videos</h3>
      <p class="body-s mt-1">From our Instagram. Tap a video to play it here; it shows that patient’s experience, not what will happen for you.</p>
    </div>
    <div class="ht-gallery ht-gallery--videos">
      <button type="button" class="ht-gallery__nav ht-gallery__nav--prev" data-ht-scroll="-1" aria-controls="ht-videos" aria-label="Previous videos" hidden><?= icon('arrow', 18, 'currentColor', 2) ?></button>
      <div class="ht-videos" id="ht-videos" role="region" aria-label="Patient videos" tabindex="0">
        <?php foreach ($reels as $i => $code): ?>
        <?php
        $base  = '/assets/video/reels/' . $code;
        $label = 'DenceSpot Clinic patient video ' . ($i + 1) . ' of ' . count($reels);
        if (!is_file(__DIR__ . $base . '.mp4')) { continue; }
        ?>
        <?php /* Native controls by default, so the video plays without
                 script; the script swaps them for the round play button and
                 sets the poster only when the row is near the screen. */ ?>
        <div class="ht-video">
          <video controls preload="none" playsinline controlslist="nodownload" data-poster="<?= e($base . '.jpg') ?>" aria-label="<?= e($label) ?>" width="720" height="1280">
            <source src="<?= e($base . '.mp4') ?>" type="video/mp4">
          </video>
          <button type="button" class="ht-video__play" aria-label="Play <?= e($label) ?>" hidden><svg width="22" height="22" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M7 4.5v15a1 1 0 0 0 1.5.86l12.4-7.5a1 1 0 0 0 0-1.72L8.5 3.64A1 1 0 0 0 7 4.5z" fill="currentColor"/></svg></button>
        </div>
        <?php endforeach; ?>
      </div>
      <button type="button" class="ht-gallery__nav ht-gallery__nav--next" data-ht-scroll="1" aria-controls="ht-videos" aria-label="Next videos" hidden><?= icon('arrow', 18, 'currentColor', 2) ?></button>
    </div>
    <?php endif; ?>

    <div class="ht-center mt-5">
      <a class="btn btn--ink" href="/hair-transplant-results-gurgaon">View More Before &amp; After Results <?= icon('arrow', 16) ?></a>
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

  var row = document.getElementById('ht-videos');
  if (!row) { return; }
  var videos = row.querySelectorAll('video');

  // A round play button over each poster; native controls once playing, and
  // only one video plays at a time.
  videos.forEach(function (video) {
    var button = video.parentNode.querySelector('.ht-video__play');
    if (!button) { return; }
    video.controls = false;
    button.hidden = false;
    button.addEventListener('click', function () {
      video.controls = true;
      button.hidden = true;
      video.play();
    });
    video.addEventListener('play', function () {
      videos.forEach(function (other) { if (other !== video) { other.pause(); } });
    });
  });

  // Posters load only when the row comes near the screen.
  var showPosters = function () {
    videos.forEach(function (video) {
      if (video.dataset.poster) { video.poster = video.dataset.poster; video.removeAttribute('data-poster'); }
    });
  };
  if (!('IntersectionObserver' in window)) { showPosters(); return; }
  var near = new IntersectionObserver(function (entries) {
    if (entries[0].isIntersecting) { near.disconnect(); showPosters(); }
  }, { rootMargin: '400px 0px' });
  near.observe(row);
}());
</script>

<!-- 4. The doctors: the same three tiles as the homepage -->
<?= doctors_grid_section(
    'Our doctors',
    'Meet the Doctors at DenceSpot',
    'Every case starts with an examination by a doctor. At the Sector 39 clinic, ' . $doc['name'] . ' plans and performs each hair transplant herself.',
    'section--canvas ht-sec',
    page_review_signed_off()
) ?>

<!-- 5. Techniques -->
<section class="section ht-sec section--white" id="techniques">
  <div class="wrap">
    <div style="max-width:68ch">
      <p class="eyebrow">Techniques</p>
      <h2 class="h2 mt-2">FUE and DHI Hair Transplant Techniques</h2>
      <p class="body mt-3">Both move your own follicles and harvest them the same way. They differ in how the grafts are placed, and many plans combine the two. The technique follows your scalp, not the other way round.</p>
    </div>

    <div class="ht-tech">
      <div class="card card--pad-lg tech-card tone--mint">
        <span class="icon-dot"><?= icon('list', 24) ?></span>
        <h3 class="h3">FUE Hair Transplant</h3>
        <p class="body-s mt-2">Follicular units are taken one at a time with a fine punch. Sites are made first and the grafts placed into them — efficient across the crown and mid-scalp and for larger sessions.</p>
        <?= ticks([
            'Tiny dot-like marks spread across the donor area',
            'Often chosen for the crown and mid-scalp',
            'Crusts usually clear in about 7–14 days',
        ], false) ?>
        <a class="btn btn--outline btn--sm mt-4" href="/fue-hair-transplant-in-gurgaon">FUE hair transplant in Gurgaon <?= icon('arrow', 14) ?></a>
      </div>

      <div class="card card--pad-lg tech-card tone--violet">
        <span class="icon-dot"><?= icon('pencil', 24) ?></span>
        <h3 class="h3">DHI Hair Transplant</h3>
        <p class="body-s mt-2">Harvesting is the same as FUE. Each graft is then loaded into an implanter pen that opens the site and sets it in one movement, giving close control of angle and depth.</p>
        <?= ticks([
            'Placement and site-making in a single step',
            'Often chosen for the hairline and temples',
            'Crusts usually clear in about 7–14 days',
        ], false) ?>
        <a class="btn btn--outline btn--sm mt-4" href="/dhi-hair-transplant-in-gurgaon">DHI hair transplant in Gurgaon <?= icon('arrow', 14) ?></a>
      </div>

      <div class="tint-card tone--sky ht-tech__choose">
        <h3 class="h4">How Dr. Nyra Chooses the Technique</h3>
        <div class="mt-3"><?= ticks([
            'How many grafts the plan needs, and in which zones',
            'Donor density, and the thickness and curl of your hair',
            'How short you keep the back and sides',
            'Whether the thinning area has to stay unshaven',
            'A frequent combination: DHI along the hairline, FUE behind it',
        ], false) ?></div>
        <p class="body-s mt-4">More in the <a href="/blog/fue-vs-dhi-hair-transplant">FUE vs DHI guide</a>.</p>
      </div>
    </div>

    <h3 class="h4 mt-6">Hair Transplant by Area and Need</h3>
    <ul class="ht-patterns">
      <?php foreach ([
          '/hairline-transplant-in-gurgaon'       => 'Hairline transplant',
          '/crown-hair-transplant-in-gurgaon'     => 'Crown hair transplant',
          '/hair-transplant-for-women-in-gurgaon' => 'Hair transplant for women',
          '/hair-transplant-repair-in-gurgaon'    => 'Hair transplant repair',
          '/unshaven-hair-transplant-in-gurgaon'  => 'Unshaven hair transplant',
      ] as $url => $anchor): ?>
      <li><a href="<?= e($url) ?>"><?= e($anchor) ?> <?= icon('arrow', 14) ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- 6. The procedure -->
<section class="section ht-sec section--canvas ht-process" id="process">
  <div class="wrap">
    <p class="eyebrow">Procedure</p>
    <h2 class="h2 mt-2">Our Hair Transplant Procedure</h2>
    <p class="body mt-2">Five stages, from the first visit to the twelve-month review.</p>

    <ol class="ht-steps">
      <?php foreach ([
          ['svc-consultation', 'AI-generated illustration: a dermatoscope and a notepad with a pencil on a wooden desk',
           'Consultation &amp; Scalp Analysis', 'Scalp and donor area examined under magnification; history and medicines reviewed.'],
          ['svc-hairline', 'AI-generated illustration: a mannequin head seen from above, with hair receding at both temples',
           'Treatment Planning &amp; Hairline Design', 'Graft zones mapped and the hairline drawn on your face and agreed.'],
          ['svc-follicle', 'AI-generated illustration: a cross-section of scalp skin showing hair follicles and hair shafts',
           'Graft Extraction', 'Follicles taken one at a time from the back and sides, under local anaesthetic.'],
          ['svc-procedure', 'AI-generated illustration: fine tweezers, small punch tips and an instrument handle in a steel tray',
           'Graft Implantation', 'Placed into pre-made sites (FUE) or with an implanter pen (DHI), at the angle of the surrounding hair.'],
          ['svc-followup', 'AI-generated illustration: a desk calendar with several days circled in green, beside a pen',
           'Recovery &amp; Follow-up', 'Written aftercare and photographed reviews through the first twelve months.'],
      ] as $i => [$img, $alt, $title, $text]): ?>
      <li class="ht-step">
        <span class="ht-step__img"><?= hp_img($img, $alt, '(min-width: 900px) 120px, 80px') ?></span>
        <span class="ht-step__num"><?= sprintf('%02d', $i + 1) ?></span>
        <h3 class="ht-step__title"><?= $title ?></h3>
        <p class="ht-step__text"><?= e($text) ?></p>
      </li>
      <?php endforeach; ?>
    </ol>

    <p class="ht-steps__note">Step illustrations are AI-generated. Recovery is covered stage by stage in the <a href="/hair-transplant-aftercare">aftercare guide</a> and <a href="/blog/first-14-days-after-a-hair-transplant">the first 14 days after a hair transplant</a>.</p>
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
        <h2 class="h2 mt-2">Hair Transplant Cost in Gurgaon</h2>
        <p class="body mt-3 measure">There is no single price for a hair transplant, because no two plans move the same number of grafts. Your estimate is built from the mapped plan — graft count, technique and what is included — and given to you itemised and in writing after the examination, with nothing added later.</p>
        <?= cost_band_line() ?>

        <div class="factor-list">
          <div class="factor tone--mint"><span class="icon-dot"><?= icon('chart', 20) ?></span><div><b>Number of grafts</b><span>Counted from the zone-by-zone plan, not guessed from a photograph.</span></div></div>
          <div class="factor tone--violet"><span class="icon-dot"><?= icon('user', 20) ?></span><div><b>Hair-loss stage</b><span>How much area needs coverage now, and what may follow.</span></div></div>
          <div class="factor tone--sky"><span class="icon-dot"><?= icon('search', 20) ?></span><div><b>Donor density</b><span>What can be harvested without thinning the back of the head.</span></div></div>
          <div class="factor tone--amber"><span class="icon-dot"><?= icon('settings', 20) ?></span><div><b>Technique</b><span>DHI placement takes longer per graft than FUE placement.</span></div></div>
          <div class="factor tone--rose"><span class="icon-dot"><?= icon('scale', 20) ?></span><div><b>Complexity</b><span>Repair work, scarring, unshaven sessions or tightly curled hair.</span></div></div>
        </div>

        <p class="meta mt-4 measure">On “per graft, starting from” prices: a low rate applied to an inflated graft count costs more than a careful estimate. Ask any clinic how its graft number was worked out.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--ink" href="#consultation"><?= icon('calendar', 17) ?> Get Your Written Estimate</a>
        </div>
        <ul class="ht-patterns mt-3">
          <li><a href="/hair-transplant-cost-in-gurgaon">Gurgaon cost guide <?= icon('arrow', 14) ?></a></li>
          <li><a href="/hair-transplant-graft-calculator">Graft calculator <?= icon('arrow', 14) ?></a></li>
          <li><a href="/cost-and-emi-options">EMI and payment <?= icon('arrow', 14) ?></a></li>
        </ul>
      </div>

      <div>
        <div class="card band-card">
          <div class="band-card__head">
            <h3 class="h4">Graft Requirements by Norwood Stage</h3>
            <p>General patient-education bands from the cost guide, not a quote.</p>
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
          <h3 class="h4">What Your Written Estimate Covers</h3>
          <div class="mt-3"><?= ticks([
              'The procedure by the treating doctor',
              'Local anaesthesia',
              'Medication for the recovery period',
              'Written aftercare instructions',
              'Reviews through the first year',
              'Progress photographs at each review',
          ]) ?></div>
          <p class="body-s mt-4">Blood tests, supporting medical therapy, PRP or a second session are named separately if your plan needs them.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php /* 8. Patient reviews: the live Google listing, never typed-in quotes. */ ?>
<?= google_reviews_block('What Our Patients Say on Google', 'ht-sec') ?>

<!-- 9. FAQs -->
<section class="section ht-sec section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Hair Transplant in Gurgaon: FAQs</h2>
        <p class="body-s mt-3">General patient education. Anything specific to your scalp, health or budget is answered at the consultation.</p>
        <div class="btn-row mt-4">
          <a class="btn btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
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
        <h2 class="h2 mt-2">Book a Hair Transplant Consultation in Gurgaon</h2>
        <p class="body-l mt-3 measure">Meet <?= e($doc['name']) ?> at the Sector 39 clinic for a scalp and donor examination, a hairline drawn on your own face and an itemised written estimate. Nothing is booked on the day unless you choose to.</p>

        <dl class="dl mt-4">
          <div><dt>Address</dt><dd><?= e(NAP_STREET) ?>, <?= e(NAP_LOCALITY) ?>, <?= e(NAP_REGION) ?> <?= e(NAP_POSTCODE) ?><span class="meta" style="display:block;font-weight:500"><?= e(NAP_LANDMARK) ?></span></dd></div>
          <div><dt>Phone</dt><dd><a href="tel:<?= e(PHONE_E164) ?>" data-track="call"><?= e(PHONE_DISPLAY) ?></a></dd></div>
          <div><dt>Hours</dt><dd><?= e(HOURS_DISPLAY) ?><span class="meta" style="display:block;font-weight:500"><?= e(HOURS_NOTE) ?></span></dd></div>
        </dl>

        <div class="btn-row mt-5">
          <a class="btn btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> WhatsApp</a>
          <a class="btn btn--outline" href="tel:<?= e(PHONE_E164) ?>" data-track="call"><?= icon('phone', 17) ?> Call the Clinic</a>
          <a class="btn btn--outline" href="<?= e(MAPS_URL) ?>" target="_blank" rel="noopener"><?= icon('pin', 17) ?> Directions<span class="sr-only"> (opens in a new tab)</span></a>
        </div>
      </div>

      <div class="consult__form">
        <h3 class="h3">Book Your Consultation</h3>
        <p class="body-s mt-1">The clinic replies during opening hours (<?= e(HOURS_DISPLAY) ?>).</p>
        <div class="mt-4">
          <?= enquiry_form('hair-transplant-hub', [
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
