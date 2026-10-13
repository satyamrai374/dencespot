<?php
/**
 * / — homepage (October 2026 redesign).
 *
 * Rebuilt from the supplied design reference: sticky masthead, hero, treatment
 * circles, hair-transplant introduction, how-we-work, patterns carousel,
 * process, patient questions, facts and doctor directory, closing call to
 * action and footer, plus a section introducing the two clinics (Gurugram and
 * Delhi). The same chrome (includes/home-components.php, assets/css/home.css,
 * assets/js/home.js) now runs on every page through header.php/footer.php.
 *
 * WHAT WAS ADAPTED FROM THE REFERENCE, AND WHY
 *
 * The reference was a marketing comp. The NMC Guidelines on Ethical
 * Advertising and Public Communication (Public Notice R-13014/01/2024-Ethics,
 * 06.10.2026) and the IMC Regulations 2002 rule several of its elements out,
 * so the layout is kept and the content changed:
 *
 *  - "Natural & Permanent Results", "Expert", "Advanced", "No Visible Scars",
 *    "Quick Recovery", "Free Consultation", "Trusted Partner" → plain,
 *    verifiable descriptions of the process. No outcome is promised (8.1(iii),
 *    (vi), (ix), (x)).
 *  - Before/after split image → donor- and recipient-area diagrams.
 *  - Before/after results carousel → the same carousel showing common
 *    hair-loss patterns as diagrams (8.1(v): no before/after, consent or not).
 *  - Patient testimonials → questions patients ask, as general information.
 *    No reviews are quoted, embedded or linked for promotion (Explanation V).
 *  - "1000+ Happy Patients", "4.9/5", "8+ Years" → institutional facts, plus
 *    the doctor directory with registration details (Explanation IV, 9.1).
 *  - Doctor portrait → none (9.2). "As Featured In" logos → removed.
 *  - Model and clinic-scene photography → AI illustrations with no people,
 *    doctors, procedures on patients or premises, each with its own visible
 *    "AI-generated" mark (7.2).
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';
require_once __DIR__ . '/includes/home-components.php';

/*
 * ⚠ Medical review sign-off. This copy was written in October 2026 and has
 * not yet been reviewed by the clinic's doctor, so no "reviewed by" byline or
 * MedicalWebPage reviewedBy schema is published — claiming a review that has
 * not happened would itself be misleading, and under the NMC Guidelines
 * (cl. 4.4) the doctor answers for content an agency publishes. Once Dr. Nyra
 * has approved this page, set this to true and update REVIEWED_DATE /
 * REVIEWED_DATE_ISO in config.php.
 */
const HOME_MEDICALLY_REVIEWED = false;

/* ---------- Content ---------- */

$heroFeatures = [
    ['icon' => 'stethoscope', 'text' => 'Doctor-led<br>assessment'],
    ['icon' => 'follicle',    'text' => 'FUE, DHI<br>&amp; FUT'],
    ['icon' => 'doc',         'text' => 'Written<br>treatment plan'],
    ['icon' => 'cal-check',   'text' => 'Scheduled<br>follow-up'],
];

$treatments = [
    ['img' => 'tx-hair-transplant', 'label' => 'Hair Transplant', 'note' => '(FUE / DHI / FUT)', 'url' => '/hair-transplant-in-gurgaon'],
    ['img' => 'tx-beard',           'label' => 'Beard Transplant',    'url' => '/beard-transplant-gurgaon'],
    ['img' => 'tx-eyebrow',         'label' => 'Eyebrow Transplant',  'url' => '/eyebrow-transplant-in-gurgaon'],
    ['img' => 'tx-prp',             'label' => 'Hair PRP Treatment',  'url' => '/hair-prp-treatment-in-gurgaon'],
    ['img' => 'tx-hair-fall',       'label' => 'Hair Fall Treatment', 'url' => '/hair-fall-treatment-in-gurgaon'],
    ['img' => 'tx-laser',           'label' => 'Laser Hair Removal',  'url' => '/laser-hair-removal-in-gurgaon'],
    ['img' => 'tx-skin',            'label' => 'Skin & Hair Care',    'url' => '/skin-treatment-in-gurgaon'],
];

$introPoints = [
    'Hairline planned with you, considering age and donor supply',
    'FUE, DHI or FUT, chosen after examination',
    'Procedure under local anaesthesia',
    'Written aftercare and recovery guidance',
    'Scheduled follow-up reviews',
];

$expect = [
    ['icon' => 'user-md',   'title' => 'Doctor-Led Care',          'text' => 'Your scalp is examined and your treatment is planned by a doctor at the clinic.'],
    ['icon' => 'layers',    'title' => 'Technique Chosen for You', 'text' => 'FUE, DHI or FUT is selected after examining your donor area and pattern of hair loss.'],
    ['icon' => 'clipboard', 'title' => 'A Written Plan',           'text' => 'Approximate graft numbers, timeline and costs are explained in writing before you decide.'],
    ['icon' => 'eye',       'title' => 'Clear Expectations',       'text' => 'Risks, recovery and the limits of each treatment are discussed openly, with follow-up afterwards.'],
];

$patterns = [
    ['img' => 'stage-temples',   'tag' => 'Norwood 2–3',      'title' => 'Receding Temples',
     'text' => 'Early recession at the hairline. Medical treatment is often considered first; a hairline transplant may be discussed once the pattern is stable.',
     'url' => '/blog/norwood-scale-explained', 'link' => 'The Norwood scale explained'],
    ['img' => 'stage-crown',     'tag' => 'Crown (vertex)',   'title' => 'Crown Thinning',
     'text' => 'Thinning at the top of the head. Medical therapy and graft planning are usually considered together.',
     'url' => '/hair-fall-treatment-in-gurgaon', 'link' => 'Causes and treatment options'],
    ['img' => 'stage-extensive', 'tag' => 'Norwood 5–6',      'title' => 'Extensive Hair Loss',
     'text' => 'Front and crown thinning have joined. What can be planned depends on the donor supply measured at assessment.',
     'url' => '/blog/donor-area-limits-hair-transplant', 'link' => 'Why donor supply matters'],
    ['img' => 'stage-female',    'tag' => 'Widening parting', 'title' => 'Thinning in Women',
     'text' => 'Diffuse thinning along the parting. Hormonal, thyroid and nutritional causes are checked first.',
     'url' => '/blog/female-pattern-hair-loss-in-women', 'link' => 'Hair loss in women'],
];

$steps = [
    ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',
     'title' => 'Consultation & Scalp Analysis', 'text' => 'Your scalp, pattern of hair loss and donor area are examined, and your medical history is reviewed.'],
    ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned hairline',
     'title' => 'Personalised Treatment Plan',   'text' => 'Technique, approximate graft numbers, timeline and an itemised estimate, explained in writing.'],
    ['img' => 'step-procedure',    'alt' => 'sterile hair-restoration instruments on a tray',
     'title' => 'Procedure (FUE / DHI / FUT)',   'text' => 'Carried out under local anaesthesia at the clinic, on a date agreed with your doctor.'],
    ['img' => 'step-followup',     'alt' => 'a desk calendar with review dates circled',
     'title' => 'Aftercare & Follow-up',         'text' => 'Written aftercare instructions and scheduled reviews through the first year.'],
];

/* Rendered as cards and as FAQPage schema from the same array, so the markup
   and the visible text cannot drift apart. General information, deliberately
   not attributed to a doctor until the clinic's doctor has reviewed it. */
$questions = [
    ['q' => 'Do I need a hair transplant, or will medicine work?',
     'a' => 'It depends on your pattern of hair loss and how stable it is. Many people start with medical treatment; surgery is considered when the pattern is stable and the donor area allows it. The doctor explains your options after examining your scalp.'],
    ['q' => 'Will my outcome be the same as someone else’s?',
     'a' => 'No. Outcomes vary with donor density, hair characteristics, general health, medicines and aftercare, so no density or timeline can be promised before your assessment. Your doctor will tell you what is realistic in your case.'],
    ['q' => 'How much will treatment cost?',
     'a' => 'Cost depends on your plan: graft count, technique and any supporting therapy. You receive an itemised written estimate after your assessment, before you decide anything.'],
];

$firstDay = substr(HOURS_DAYS[0], 0, 3);
$lastDay  = substr(HOURS_DAYS[count(HOURS_DAYS) - 1], 0, 3);
$facts = [
    ['icon' => 'doc',      'value' => 'Written Estimates',        'label' => 'Itemised, given after your assessment'],
    ['icon' => 'follicle', 'value' => 'FUE · DHI · FUT',          'label' => 'Hair transplant techniques offered'],
    ['icon' => 'pin',      'value' => '2 Clinics',                'label' => 'Sector 39, Gurugram · Rohini, Delhi'],
    ['icon' => 'clock',    'value' => $firstDay . '–' . $lastDay, 'label' => HOURS_OPEN . ' – ' . HOURS_CLOSE . ' · ' . HOURS_NOTE],
];

/* ---------- Head ---------- */

$meta = [
    'title'       => 'Hair Transplant & Hair Loss Clinic in Gurgaon and Delhi | DenceSpot',
    'description' => 'Hair transplant (FUE, DHI, FUT), PRP, hair-fall treatment, laser hair removal and skin care at two DenceSpot clinics: Sector 39, Gurugram and Rohini, Delhi.',
    'canonical'   => abs_url('/'),
    'og_image'    => abs_url('/assets/img/home/og-home.jpg'),
];

/*
 * Schema images are withheld on this page. CLINIC_IMAGE is an AI-generated
 * render of a building; the real shopfront photographs show signage reading
 * "No Pain | No Scar | No Stitch" and "Permanent Hair Loss Solution" (NMC
 * cl. 8.1(iii), (vi)); the doctor portrait may be AI-composited and would be
 * an unmarked AI image of a doctor (cl. 7.2(b), 9.2). ⚠ Add an image back only
 * once there is a real, compliant photograph. priceRange "₹₹" is dropped too:
 * charges must be factual (cl. 8.1(x)), and the page states none.
 */
$clinicNode = schema_clinic();
unset($clinicNode['image'], $clinicNode['priceRange']);
// The Delhi clinic node is withheld here until LOC_DELHI_ADDRESS holds a real
// street address — it currently reads "Dencespot Clinic, Delhi (Rohini)".
$physicianNode = schema_physician('dr-nyra');
unset($physicianNode['image']);

$schemaHtml = schema_render([
    schema_website(),
    $clinicNode,
    $physicianNode,
    schema_faq('/', $questions),
    HOME_MEDICALLY_REVIEWED ? schema_medical_webpage('/', $meta['title']) : null,
]);

$fonts      = 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap';
$scriptFont = 'https://fonts.googleapis.com/css2?family=Caveat:wght@600&display=swap&text=' . rawurlencode('Diagnosis first, treatment next');
$asset = static fn (string $path): string => $path . '?v=' . (string) @filemtime(__DIR__ . $path);
?>
<!DOCTYPE html>
<html lang="en-IN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($meta['title']) ?></title>
<meta name="description" content="<?= e($meta['description']) ?>">
<link rel="canonical" href="<?= e($meta['canonical']) ?>">
<?php if (SITE_STAGING): ?>
<meta name="robots" content="noindex, nofollow">
<?php else: ?>
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<?php endif; ?>

<meta property="og:type" content="website">
<meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
<meta property="og:title" content="<?= e($meta['title']) ?>">
<meta property="og:description" content="<?= e($meta['description']) ?>">
<meta property="og:url" content="<?= e($meta['canonical']) ?>">
<meta property="og:locale" content="en_IN">
<meta property="og:image" content="<?= e($meta['og_image']) ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="<?= e(SITE_NAME) ?>, hair, skin and laser clinics in Gurugram and Delhi. AI-generated illustration of hair follicles.">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= e($meta['title']) ?>">
<meta name="twitter:description" content="<?= e($meta['description']) ?>">
<meta name="twitter:image" content="<?= e($meta['og_image']) ?>">
<meta name="twitter:image:alt" content="<?= e(SITE_NAME) ?>, hair, skin and laser clinics in Gurugram and Delhi. AI-generated illustration of hair follicles.">

<meta name="theme-color" content="#0F3B2F">
<link rel="icon" href="/assets/img/favicon.svg" type="image/svg+xml">
<meta name="google-site-verification" content="lY4q2j4iJeavvMLFbV79PMyxrUoZwh-sV1bhIt4CNSU">
<meta name="facebook-domain-verification" content="nzfopa7vm2op027gpg0uqu4j7zwuak">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preload" as="image" href="<?= e(hp_img_url('hero', 1200)) ?>" imagesrcset="<?= e(hp_srcset('hero')) ?>" imagesizes="(min-width: 1621px) 57vw, (min-width: 1024px) 924px, (min-width: 560px) 100vw, 120vw" fetchpriority="high">
<link rel="stylesheet" href="<?= e($asset('/assets/css/home.css')) ?>">
<link rel="stylesheet" href="<?= e($fonts) ?>" media="print" onload="this.media='all'">
<link rel="stylesheet" href="<?= e($scriptFont) ?>" media="print" onload="this.media='all'">
<noscript><link rel="stylesheet" href="<?= e($fonts) ?>"></noscript>

<?= $schemaHtml ?>
</head>
<body class="hp">
<a class="hp-skip" href="#main">Skip to content</a>

<?= hp_header('/') ?>

<main id="main">

  <!-- ============ HERO ============ -->
  <section class="hp-hero" aria-labelledby="hp-hero-title">
    <div class="hp-wrap hp-hero__inner">
      <div class="hp-hero__content">
        <p class="hp-eyebrow">Hair · Skin · Laser Clinics in Gurugram &amp; Delhi</p>
        <h1 class="hp-h1" id="hp-hero-title">Hair Transplant &amp; Hair Loss Care in Gurgaon and Delhi</h1>
        <p class="hp-hero__lead">Doctor-led <strong>hair transplant, PRP and hair-fall treatment</strong> at our two clinics, in <strong>Sector 39, Gurugram</strong> and <strong>Rohini, Delhi</strong>. Every plan starts with an examination of your scalp.</p>

        <ul class="hp-features" aria-label="How care works at <?= e(SITE_NAME) ?>">
          <?php foreach ($heroFeatures as $f): ?>
            <li class="hp-feature"><?= hp_icon($f['icon'], 28, 1.5) ?><span><?= $f['text'] ?></span></li>
          <?php endforeach; ?>
        </ul>

        <div class="hp-hero__actions">
          <?= hp_book_link('Book a Consultation') ?>
          <?= hp_phone_link() ?>
        </div>
      </div>

      <p class="hp-hero__note" aria-hidden="true">
        <span>Diagnosis first,<br>treatment next</span>
        <svg width="74" height="52" viewBox="0 0 74 52" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 8c18-2 36 4 52 30"/><path d="M45 34l11 5 2-12"/></svg>
      </p>
    </div>

    <div class="hp-hero__media">
      <?= hp_img('hero', 'AI-generated illustration: cross-section of scalp skin showing hair follicles and roots', '(min-width: 1621px) 57vw, (min-width: 1024px) 924px, (min-width: 560px) 100vw, 120vw', ['loading' => 'eager', 'fetchpriority' => 'high', 'class' => 'hp-hero__img']) ?>
      <?= hp_ai_chip('AI-generated illustration') ?>
    </div>
  </section>

  <!-- ============ TREATMENT CATEGORIES ============ -->
  <section class="hp-tx" aria-labelledby="hp-tx-title">
    <div class="hp-wrap">
      <h2 class="hp-sr" id="hp-tx-title">Treatments at <?= e(SITE_NAME) ?></h2>
      <ul class="hp-tx__list" role="list">
        <?php foreach ($treatments as $t): ?>
          <li class="hp-tx__item">
            <?php if (isset($t['book'])): ?>
              <a class="hp-tx__link" href="/book-consultation" data-book data-treatment="<?= e($t['book']) ?>" data-track="book">
            <?php else: ?>
              <a class="hp-tx__link" href="<?= e($t['url']) ?>">
            <?php endif; ?>
                <span class="hp-tx__img"><?= hp_img($t['img'], 'AI-generated illustration', '124px') ?><span class="hp-tx__ai" aria-hidden="true">AI-generated</span></span>
                <span class="hp-tx__label"><?= e($t['label']) ?><?php if (!empty($t['note'])): ?> <small><?= e($t['note']) ?></small><?php endif; ?></span>
              </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </section>

  <!-- ============ OUR TWO CLINICS ============ -->
  <section class="hp-clinics" aria-labelledby="hp-clinics-title">
    <div class="hp-wrap">
      <?= hp_section_head('hp-clinics-title', 'Our clinics', 'Two Clinics: Gurugram and Delhi', 'Consultations and treatment are available at both clinics, so you can choose whichever is closer. Both are open ' . HOURS_DISPLAY . '.') ?>
      <?= hp_clinic_cards() ?>
    </div>
  </section>

  <!-- ============ HAIR TRANSPLANT INTRODUCTION ============ -->
  <section class="hp-intro" aria-labelledby="hp-intro-title">
    <div class="hp-wrap hp-intro__grid">
      <figure class="hp-split">
        <div class="hp-split__pane">
          <?= hp_img('intro-donor', 'AI-generated illustration: mannequin head from behind with the donor area at the back and sides highlighted', '(min-width: 1024px) 372px, 57vw') ?>
          <?= hp_ai_chip('AI-generated') ?>
          <span class="hp-split__label">Donor area</span>
        </div>
        <div class="hp-split__pane">
          <?= hp_img('intro-recipient', 'AI-generated illustration: mannequin head from the front with a planned hairline marked', '(min-width: 1024px) 372px, 57vw') ?>
          <?= hp_ai_chip('AI-generated') ?>
          <span class="hp-split__label">Recipient area</span>
        </div>
        <figcaption class="hp-sr">AI-generated diagrams of the donor area, where follicles are taken from, and the recipient area, where they are placed.</figcaption>
      </figure>

      <div class="hp-intro__content">
        <p class="hp-eyebrow">Hair transplant at <?= e(SITE_NAME) ?></p>
        <h2 class="hp-h2" id="hp-intro-title">Hair Transplant, Planned Around Your Scalp</h2>
        <p class="hp-text">A hair transplant moves your own hair follicles from a donor area, usually the back of the scalp, to areas that are thinning. A doctor first examines your scalp, measures donor density and explains whether surgery, medical treatment or both suit your stage of hair loss.</p>

        <div class="hp-intro__row">
          <ul class="hp-checks">
            <?php foreach ($introPoints as $point): ?>
              <li><span class="hp-check"><?= hp_icon('check', 14, 2.6) ?></span><?= e($point) ?></li>
            <?php endforeach; ?>
          </ul>
          <div class="hp-stat-card">
            <?= hp_icon('cal-check', 32, 1.5) ?>
            <p class="hp-stat-card__value">12 months</p>
            <p class="hp-stat-card__label">of scheduled<br>follow-up reviews</p>
          </div>
        </div>

        <div class="hp-intro__cta">
          <a class="hp-btn hp-btn--outline" href="/hair-transplant-in-gurgaon">Learn About Hair Transplant <?= hp_icon('arrow', 17, 2) ?></a>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ WHAT TO EXPECT ============ -->
  <section class="hp-why" aria-labelledby="hp-why-title">
    <div class="hp-wrap">
      <?= hp_section_head('hp-why-title', 'How we work', 'What You Can Expect at ' . SITE_NAME) ?>
      <ul class="hp-why__grid" role="list">
        <?php foreach ($expect as $item): ?>
          <li class="hp-why__item">
            <span class="hp-why__icon"><?= hp_icon($item['icon'], 30, 1.5) ?></span>
            <h3 class="hp-h3"><?= e($item['title']) ?></h3>
            <p><?= e($item['text']) ?></p>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </section>

  <!-- ============ HAIR-LOSS PATTERNS ============ -->
  <section class="hp-stages" aria-labelledby="hp-stages-title">
    <div class="hp-wrap">
      <?= hp_section_head('hp-stages-title', 'Understand your hair loss', 'Which Pattern Looks Like Yours?') ?>

      <div class="hp-carousel" data-hp-carousel>
        <button class="hp-carousel__btn hp-carousel__btn--prev" type="button" data-dir="-1" aria-controls="hp-stage-track" aria-label="Previous pattern" hidden><?= hp_icon('arrow-left', 18, 2) ?></button>
        <ul class="hp-carousel__track" id="hp-stage-track" data-hp-track role="list" tabindex="0" aria-label="Common hair-loss patterns">
          <?php foreach ($patterns as $p): ?>
            <li class="hp-stage">
              <article class="hp-stage__card">
                <div class="hp-stage__media">
                  <?= hp_img($p['img'], 'AI-generated diagram of ' . strtolower($p['title']) . ': a mannequin head seen from above', '(min-width: 1024px) 380px, (min-width: 640px) 50vw, 86vw') ?>
                  <span class="hp-stage__tag"><?= e($p['tag']) ?></span>
                  <?= hp_ai_chip('AI-generated') ?>
                </div>
                <div class="hp-stage__body">
                  <h3 class="hp-h3"><?= e($p['title']) ?></h3>
                  <p><?= e($p['text']) ?></p>
                  <a class="hp-link" href="<?= e($p['url']) ?>"><?= e($p['link']) ?> <?= hp_icon('arrow', 15, 2) ?></a>
                </div>
              </article>
            </li>
          <?php endforeach; ?>
        </ul>
        <button class="hp-carousel__btn hp-carousel__btn--next" type="button" data-dir="1" aria-controls="hp-stage-track" aria-label="Next pattern" hidden><?= hp_icon('arrow', 18, 2) ?></button>
      </div>
      <div class="hp-dots" data-hp-dots hidden></div>

      <p class="hp-note hp-note--center">The diagrams are AI-generated illustrations of common patterns, not photographs of patients. This page does not show before-and-after photographs: outcomes differ from person to person, and your doctor will explain what is realistic for you.</p>
    </div>
  </section>

  <!-- ============ PROCESS ============ -->
  <section class="hp-process" aria-labelledby="hp-process-title">
    <div class="hp-wrap">
      <?= hp_section_head('hp-process-title', 'Our hair transplant process', 'What Happens, Step by Step') ?>
      <ol class="hp-steps" role="list">
        <?php foreach ($steps as $i => $s): ?>
          <li class="hp-step">
            <div class="hp-step__media">
              <?= hp_img($s['img'], 'AI-generated image: ' . $s['alt'], '(min-width: 1024px) 260px, (min-width: 560px) 50vw, 100vw') ?>
              <?= hp_ai_chip('AI-generated') ?>
            </div>
            <p class="hp-step__num">Step <?= sprintf('%02d', $i + 1) ?></p>
            <h3 class="hp-h3"><?= e($s['title']) ?></h3>
            <p class="hp-step__text"><?= e($s['text']) ?></p>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>
  </section>

  <!-- ============ QUESTIONS PATIENTS ASK ============ -->
  <section class="hp-qa" aria-labelledby="hp-qa-title">
    <div class="hp-wrap">
      <?= hp_section_head('hp-qa-title', 'Common questions', 'Questions Patients Ask First') ?>
      <div class="hp-qa__grid">
        <?php foreach ($questions as $item): ?>
          <article class="hp-qa__card">
            <h3 class="hp-qa__q"><?= e($item['q']) ?></h3>
            <p class="hp-qa__a"><?= e($item['a']) ?></p>
            <div class="hp-qa__by">
              <span class="hp-qa__icon"><?= hp_icon('info', 20, 1.7) ?></span>
              <span><strong>General information</strong>Your own options are decided at examination.</span>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
      <p class="hp-qa__more"><a class="hp-link" href="/faqs">More questions answered <?= hp_icon('arrow', 15, 2) ?></a></p>
    </div>
  </section>

  <!-- ============ FACTS & DOCTOR DIRECTORY ============ -->
  <section class="hp-band" aria-labelledby="hp-band-title">
    <div class="hp-wrap">
      <h2 class="hp-sr" id="hp-band-title">Clinic facts and doctors</h2>
      <ul class="hp-band__facts" role="list">
        <?php foreach ($facts as $f): ?>
          <li class="hp-fact">
            <?= hp_icon($f['icon'], 38, 1.3) ?>
            <div>
              <p class="hp-fact__value"><?= e($f['value']) ?></p>
              <p class="hp-fact__label"><?= e($f['label']) ?></p>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>

      <?= hp_doctor_directory() ?>

      <?php if (HOME_MEDICALLY_REVIEWED): ?>
        <p class="hp-band__review">Medical content on this page reviewed by <?= e(REVIEWED_BY) ?> · Last reviewed <?= e(REVIEWED_DATE) ?></p>
      <?php endif; ?>
    </div>
  </section>

  <!-- ============ CLOSING CALL TO ACTION ============ -->
  <section class="hp-cta" aria-labelledby="hp-cta-title">
    <div class="hp-cta__content">
      <p class="hp-eyebrow">Appointments</p>
      <h2 class="hp-h2" id="hp-cta-title">Start With a Doctor’s Assessment</h2>
      <p class="hp-text">Book a consultation to understand the cause and stage of your hair loss. If treatment is suitable, you receive a written plan and estimate, and you decide in your own time.</p>
      <div class="hp-cta__actions">
        <?= hp_book_link('Book a Consultation') ?>
        <?= hp_phone_link() ?>
      </div>
    </div>
    <div class="hp-cta__media">
      <?= hp_img('ambient', 'AI-generated image: sunlight and leaf shadows on an ivory wall with a potted plant', '(min-width: 1024px) 50vw, 100vw') ?>
      <?= hp_ai_chip('AI-generated image') ?>
    </div>
  </section>

</main>

<?= hp_footer() ?>
<?= hp_booking_dialog('homepage') ?>
<?= hp_mobile_bar() ?>

<script src="<?= e($asset('/assets/js/home.js')) ?>" defer></script>
</body>
</html>
