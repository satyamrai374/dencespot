<?php
/**
 * /lp/ — hair transplant landing page (Gurgaon & Delhi).
 *
 * Built 26 Oct 2026 on the layout, section order, palette, type and spacing of
 * the reference page the client supplied (ryanclinicindia.com), with
 * DenceSpot's own content, photos and contact details. Standalone on purpose:
 * no site header, menu or footer, so the only exits are call, WhatsApp and the
 * booking forms. lp.css carries the reference styles; the hero banner, a
 * single flattened image there, is rebuilt in HTML so the H1 is real text.
 *
 * Compliance (NMC advertising guidelines 06.10.2026 and the site's
 * strict-wording rule): the reference's "#1", "₹1", written-guarantee,
 * discount and "98%" claims are gone; the figures come from includes/config.php
 * (clinic-supplied, with an as-of date). Change a clinic fact there, not here.
 * The before/after photos in lp/img/ were supplied by the client on 26 Oct 2026
 * for this page only; they are not in GALLERY_MANIFEST, so /gallery does not
 * show them. Written patient consent for each must be on file. No AI images.
 *
 * Every form posts to /enquire.php, like the rest of the site, so leads reach
 * the same log, email and WhatsApp alert. lp.js sends it in the background
 * and then opens the LP's own thank-you page, LP_THANK_YOU_URL (client,
 * 6 Nov 2026); without JavaScript the form posts normally and lands on the
 * website's /thank-you, so no lead is lost. The forms ask for name and phone
 * only: no consent tick box (client, 6 Nov 2026), so /enquire.php logs these
 * leads as "no consent box on this form". No captcha (client).
 *
 * Phone number, tag IDs and the thank-you URL: lp/lp-config.php.
 */

declare(strict_types=1);

require_once __DIR__ . '/lp-config.php';
require_once dirname(__DIR__) . '/includes/schema.php';
require_once dirname(__DIR__) . '/includes/components.php';

$title       = 'Best Hair Transplant Clinic in Delhi and Gurgaon | DenceSpot Clinic';
$description = 'FUE and DHI hair transplant at DenceSpot Clinic, Sector 39 Gurugram and Rohini, Delhi. Doctor-led consultation, itemised written estimate and card EMI.';

/** "Why choose" cards: icon tone, Font Awesome icon, title, text. */
$features = [
    ['red',      'fa-user-doctor',         'Doctor-Led Care',      'Every hair transplant starts with an examination by a doctor, who explains whether a transplant suits your hair loss before anything is planned.'],
    ['navy',     'fa-microscope',          'Scalp Assessment',     'Hair density, the pattern of loss and the donor area at the back of the head are examined to work out how many grafts can be moved safely.'],
    ['charcoal', 'fa-pen-ruler',           'Hairline Design',      'Your hairline is drawn to suit your face, your age and how your hair loss may progress, and agreed with you before the procedure begins.'],
    ['red',      'fa-bolt',                'Recovery Time',        'A day-case procedure under local anaesthetic. You go home the same day, and most people return to desk work within a few days.'],
    ['navy',     'fa-dna',                 'Technique Used',       'FUE and DHI. The technique is chosen after your donor assessment: FUE for larger areas, DHI implanter pens where close control of angle and depth matters.'],
    ['charcoal', 'fa-indian-rupee-sign',   'Pricing',              'Cost depends on the number of grafts and the technique. You get an itemised written estimate after assessment, and card EMI through your bank on eligible cards.'],
    ['red',      'fa-calendar-check',      'Follow-Up Reviews',    'Written aftercare and photographed follow-up reviews through the first twelve months, so growth is judged against a record. Follow-up is part of your estimate.'],
    ['navy',     'fa-screwdriver-wrench',  'Tools Used',           'Fine punches remove follicles one at a time from the donor area. For DHI, an implanter pen sets each graft’s depth and angle in a single movement.'],
    ['charcoal', 'fa-hospital',            'Hygiene Standards',    'Sterilised instruments, single-use implanter tips and a procedure room prepared for each patient, with registered medical practitioners carrying out every procedure.'],
];

/** "The DenceSpot Approach" cards. */
$approach = [
    ['fa-microscope', 'FUE & DHI Techniques',      'The technique is chosen after your donor-area check, not before it'],
    ['fa-star',       'A Planned Hairline',        'Drawn to suit your face and agreed with you on the day'],
    ['fa-shield-alt', 'Written Estimate',          'Grafts, technique and follow-up itemised before you book a date'],
    ['fa-headset',    'Phone & WhatsApp Support',  'Questions answered before and after your procedure'],
];

/**
 * Stats band: the clinic's own figures (config.php, client 26 Oct 2026). The
 * client's "happy clients" reads as a satisfaction claim, which the NMC
 * guidelines treat like a testimonial, so the label is "Patients Treated".
 */
$stats = [
    ['fa-certificate',  STAT_CLINIC_YEARS . '+',            'Years of Experience'],
    ['fa-user-doctor',  number_format(STAT_SURGERIES),     'Surgeries Performed'],
    ['fa-users',        number_format(STAT_CASES_TREATED), 'Patients Treated'],
    ['fa-location-dot', '2',                               'Clinic Locations'],
];

/**
 * Photos in lp/img/ (NAME-480/640/1080.webp, all square 1:1, under 100 kB).
 *
 * Since 3 Nov 2026 the before/afters are ba-12..ba-20: composites in one
 * "Before | After" template that the client supplied to replace all the older
 * ones (ba-01..ba-11, no longer shown). Two are in the hero; the results grid
 * has two rows of four (the second row added the same day: ba-18, ba-12,
 * ba-19, ba-20). ba-12 is in the grid as well as the hero because the
 * client's second-row set included the same file. The hero cards and result
 * cards are square, like the photos, so no photo is cropped, and nothing is
 * laid over them except
 * the small "Results vary" note (client: no photo cut at the top or bottom).
 * No technique, graft count or interval is on record for them, so none is
 * printed.
 *
 * procedure-01 is a procedure photo, not a before/after (client, 3 Nov 2026),
 * so it gets no "Results vary" note. It is card B: the centre card on desktop
 * and the large top card on mobile.
 */
$heroPhotos = [
    'ba-12' => 'DenceSpot Clinic hair transplant before and after: thin front seen from above, then the front view',
    'procedure-01' => 'A hair transplant procedure in progress at DenceSpot Clinic',
    'ba-13' => 'DenceSpot Clinic hair transplant before and after: a receding hairline, then fuller front hair',
];
$resultPhotos = [
    'ba-14' => 'DenceSpot Clinic hair transplant before and after: thin on top seen from above, then the front',
    'ba-15' => 'DenceSpot Clinic hair transplant before and after: receded temples from the side, then the front',
    'ba-16' => 'DenceSpot Clinic hair transplant before and after: a bald front and top, then the regrown front',
    'ba-17' => 'DenceSpot Clinic hair transplant before and after: new hairline marked on a bald front, the result',
    // Second row (client, 3 Nov 2026).
    'ba-18' => 'DenceSpot Clinic hair transplant before and after: thinning on top from above, then short regrowth',
    'ba-12' => 'DenceSpot Clinic hair transplant before and after: thin front seen from above, then the front view',
    'ba-19' => 'DenceSpot Clinic hair transplant before and after: a bare front and top, then fuller front hair',
    'ba-20' => 'DenceSpot Clinic hair transplant before and after: the area marked on the scalp, then the front view',
];

/** A before/after composite with its WebP sizes. $attrs: loading, fetchpriority, class. */
function lp_photo(string $slug, string $alt, string $sizes, array $attrs = []): string
{
    $set = implode(', ', array_map(
        static fn (int $w): string => LP_URL . 'img/' . $slug . '-' . $w . '.webp ' . $w . 'w',
        [480, 640, 1080]
    ));
    $loading = $attrs['loading'] ?? 'lazy';
    return '<img src="' . e(LP_URL . 'img/' . $slug . '-640.webp') . '" srcset="' . e($set) . '" sizes="' . e($sizes) . '"'
         . ' width="1080" height="1080" alt="' . e($alt) . '"'
         . ' loading="' . e($loading) . '" decoding="' . ($loading === 'eager' ? 'sync' : 'async') . '"'
         . (!empty($attrs['fetchpriority']) ? ' fetchpriority="' . e($attrs['fetchpriority']) . '"' : '')
         . (!empty($attrs['class']) ? ' class="' . e($attrs['class']) . '"' : '')
         . '>';
}

/**
 * Team cards: facts from DOCTORS; a missing fact is left out.
 */
$team = [
    ['dr-nyra',  'doctor-nyra',  DOCTORS['dr-nyra']['quals'] . ' · Owner & Chief Consultant', [DOCTORS['dr-nyra']['experience'] . ' of experience', DOCTORS['dr-nyra']['abroad']]],
    ['dr-akash', 'doctor-3',     'Fellowship in hair restoration, D. Y. Patil',                [DOCTORS['dr-akash']['experience'] . ' of experience', 'Trained at UMCH Hamburg']],
];

$schema = [
    [
        '@type'       => 'MedicalWebPage',
        '@id'         => abs_url(LP_URL) . '#webpage',
        'url'         => abs_url(LP_URL),
        'name'        => $title,
        'description' => $description,
        'inLanguage'  => 'en-IN',
        'isPartOf'    => ['@id' => SITE_ORIGIN . '/#website'],
        'about'       => ['@id' => abs_url(LP_URL) . '#procedure'],
        'publisher'   => ['@id' => SITE_ORIGIN . '/#clinic'],
    ],
    schema_procedure(LP_URL, [
        'name'          => 'Hair transplant (FUE and DHI)',
        'procedureType' => 'https://schema.org/SurgicalProcedure',
        'bodyLocation'  => 'Scalp',
        'howPerformed'  => 'Follicular units are taken one at a time from the donor scalp at the back and sides of the head and placed into thinning or bald areas, by FUE placement into pre-made sites or with DHI implanter pens, under local anaesthetic as a day case.',
        'location'      => [['@id' => SITE_ORIGIN . '/#clinic'], ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic']],
    ]),
    schema_clinic(),
    schema_delhi_clinic(),
    schema_website(),
];

$telHref = 'tel:' . LP_PHONE_E164;

/** One enquiry form, shared by the three popups. $id keeps label/for pairs unique. */
function lp_form(string $id, string $formType, string $icon, string $submit): string
{
    ob_start(); ?>
<form action="/enquire.php" method="POST" class="popup-form" data-thanks="<?= e(LP_THANK_YOU_URL) ?>">
  <input type="hidden" name="treatment" value="Hair transplant">
  <input type="hidden" name="source" value="<?= e(LP_SOURCE . '-' . $id) ?>">
  <input type="hidden" name="message" value="">
  <input type="hidden" name="form_type" value="<?= e($formType) ?>">
  <div class="hp-field" style="display:none !important;" aria-hidden="true"><label for="<?= e($id) ?>-website">Website</label><input type="text" id="<?= e($id) ?>-website" name="website" tabindex="-1" autocomplete="new-password"></div>
  <div class="popup-offer-tag">
    <i class="fas fa-gift"></i> Free Hair Analysis Available Worth at 4999 (1st time Visit)
  </div>
  <div class="enhanced-form-group">
    <label for="<?= e($id) ?>-name"><i class="fas fa-user"></i> Full Name</label>
    <input type="text" id="<?= e($id) ?>-name" name="name" class="enhanced-input" placeholder="Enter your full name" autocomplete="name" maxlength="120" required>
  </div>
  <div class="enhanced-form-group">
    <label for="<?= e($id) ?>-phone"><i class="fas fa-phone"></i> Phone Number</label>
    <input type="tel" id="<?= e($id) ?>-phone" name="phone" class="enhanced-input" placeholder="Enter your phone number" autocomplete="tel" inputmode="tel" minlength="10" maxlength="16" required>
  </div>
  <?php /* Name and phone only: the clinic and visit-timing questions went on
           3 Nov 2026, the consent tick box on 6 Nov 2026 (client). */ ?>
  <p class="form-error" role="alert" hidden></p>
  <button type="submit" class="enhanced-submit-btn"><i class="fas <?= e($icon) ?>"></i> <?= e($submit) ?></button>
</form>
<?php
    return (string) ob_get_clean();
}

/** Clean, focused popup modal (no doctor images, client request). */
function lp_modal(string $id, string $badge, string $title, string $subtitle, string $form): string
{
    ob_start(); ?>
<dialog class="enhanced-modal" id="<?= e($id) ?>" aria-labelledby="<?= e($id) ?>-title">
  <button type="button" class="modal-close-btn" data-close aria-label="Close"><i class="fas fa-times"></i></button>
  <div class="modal-body">
    <div class="modal-form-header">
      <div class="modal-badge-inline"><?= e($badge) ?></div>
      <h3 class="modal-form-title" id="<?= e($id) ?>-title"><?= e($title) ?></h3>
      <p class="modal-form-subtitle"><?= e($subtitle) ?></p>
    </div>
    <?= $form ?>
  </div>
</dialog>
<?php
    return (string) ob_get_clean();
}
?>
<!DOCTYPE html>
<html lang="en-IN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($title) ?></title>
  <meta name="description" content="<?= e($description) ?>">
  <meta name="keywords" content="hair transplant in gurgaon, hair transplant in delhi, fue hair transplant, dhi hair transplant, hair transplant cost, dencespot clinic">
  <meta name="author" content="<?= e(SITE_NAME) ?>">
  <meta name="publisher" content="<?= e(SITE_NAME) ?>">
  <meta name="robots" content="<?= SITE_STAGING ? 'noindex, nofollow' : 'index, follow, max-image-preview:large' ?>">
  <link rel="canonical" href="<?= e(abs_url(LP_URL)) ?>">
  <link rel="icon" href="/favicon.ico">
  <meta name="theme-color" content="#da061a">

  <meta property="og:type" content="website">
  <meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
  <meta property="og:title" content="<?= e($title) ?>">
  <meta property="og:description" content="<?= e($description) ?>">
  <meta property="og:url" content="<?= e(abs_url(LP_URL)) ?>">
  <meta property="og:image" content="<?= e(abs_url(OG_IMAGE)) ?>">
  <meta property="og:locale" content="en_IN">
  <meta name="twitter:card" content="summary_large_image">

  <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
  <link rel="stylesheet" href="<?= e(lp_asset('lp.css')) ?>">

  <!-- Icons load without blocking the first paint, as on the reference -->
<?= lp_icon_css() ?>

  <?= schema_render($schema) ?>

<?= lp_head_tags() ?>
</head>

<body>
<?= lp_body_tags() ?>

  <!-- Popup 1: shown 4.5 s after load -->
  <?= lp_modal(
      'welcomeModal',
      'FREE HAIR ANALYSIS',
      'Book Free Consultation',
      'Doctor-led scalp check at our Gurugram or Rohini clinic',
      lp_form('welcome', 'Welcome popup', 'fa-calendar-check', 'Book Free Consultation')
  ) ?>

  <!-- Popup 2: shown 10 s after popup 1 is closed -->
  <?= lp_modal(
      'estimateModal',
      'WRITTEN ESTIMATE',
      'Get a Written Estimate',
      'An itemised written estimate after your scalp assessment',
      lp_form('estimate', 'Estimate popup', 'fa-file-invoice', 'Book Free Consultation')
  ) ?>

  <!-- Popup 3: every "Book" button -->
  <?= lp_modal(
      'appointmentModal',
      '1ST VISIT OFFER',
      'Book Free Consultation',
      'Consultation with a doctor at Sector 39, Gurugram or Rohini, Delhi',
      lp_form('booking', 'Appointment popup', 'fa-calendar-check', 'Book Free Consultation')
  ) ?>

  <div class="top-bar">
    <div class="container">
      <p>Hair transplant clinic in Gurugram &amp; Delhi</p>
    </div>
  </div>

  <!-- Header -->
  <header>
    <div class="main-header">
      <div class="containerFull">
        <div class="logo">
          <img src="<?= e(LOGO_WEB) ?>" alt="<?= e(LOGO_ALT) ?>" width="<?= LOGO_WEB_W ?>" height="<?= LOGO_WEB_H ?>">
        </div>
        <div class="header-cta">
          <a href="<?= e($telHref) ?>" class="btn-call" data-track="call" aria-label="Call <?= e(LP_PHONE_DISPLAY) ?>">
            <i class="fa-solid fa-phone"></i> <span class="btn-label">Call Now</span>
          </a>
          <button type="button" class="btn-primary book-appointment-btn" aria-label="Book consultation">
            <i class="fas fa-calendar-check"></i> <span class="btn-label">Book Consultation</span>
          </button>
        </div>
      </div>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-banner">
      <div class="hb-inner">
        <div class="hb-ribbon">
          <h1>Best Hair Transplant Clinic in Delhi and Gurgaon</h1>
          <div class="hb-ribbon-row">
            <span class="hb-mobile-only"><i class="fas fa-credit-card"></i> EMI Available</span>
            <span class="hb-badge">Doctor<br>Led</span>
            <span class="hb-mobile-only"><i class="fas fa-file-signature"></i> Written Estimate</span>
          </div>
        </div>

        <div class="hb-cards">
          <?php foreach (array_keys($heroPhotos) as $i => $slug): ?>
          <?php $card = ['a', 'b', 'c'][$i]; ?>
          <figure class="hb-card hb-card--<?= $card ?>">
            <?= lp_photo($slug, $heroPhotos[$slug], $card === 'b' ? '(min-width: 1025px) 360px, (min-width: 768px) 30vw, 52vw' : '(min-width: 1025px) 360px, (min-width: 768px) 30vw, 45vw', ['loading' => 'eager', 'fetchpriority' => $card === 'b' ? 'high' : '', 'class' => 'hb-photo']) ?>
            <?php if (strpos($slug, 'ba-') === 0): /* before/after photos only */ ?><figcaption class="hb-note">Results vary</figcaption><?php endif; ?>
          </figure>
          <?php endforeach; ?>
          <div class="hb-label">
            <p class="hb-label__top">Free Hair Analysis Available</p>
            <p class="hb-label__big">Worth at ₹4,999</p>
            <p class="hb-label__sub">(1st time Visit)</p>
          </div>
        </div>
      </div>

      <div class="hb-strip">
        <div class="hb-strip__inner">
          <span class="hb-item">FUE <span class="hb-sep">|</span> DHI</span>
          <span class="hb-item hb-desktop-only"><i class="fas fa-credit-card"></i> EMI Available</span>
          <span class="hb-item hb-desktop-only"><i class="fas fa-file-signature"></i> Written Estimate</span>
          <a class="hb-item" href="<?= e($telHref) ?>" data-track="call"><i class="fas fa-phone"></i> <?= e(preg_replace('/^\+91\s*/', '', LP_PHONE_DISPLAY)) ?></a>
        </div>
      </div>
    </div>
  </section>

  <section class="features-section">
    <div class="container px-md-5">

      <div class="section-header">
        <h2 class="section-title">Why Choose DenceSpot Clinic?</h2>
        <p class="section-subtitle">Doctor-led FUE and DHI hair transplant in Gurgaon (Sector 39) and Rohini, Delhi, planned around your scalp, your hairline and a written cost estimate.</p>
      </div>

      <div class="row g-4 g-md-5">
        <?php foreach ($features as [$tone, $icon, $name, $text]): ?>
        <div class="col-lg-4 col-md-6">
          <div class="feature-card">
            <div class="feature-icon icon-<?= e($tone) ?>"><i class="fas <?= e($icon) ?>"></i></div>
            <h3 class="feature-title"><?= e($name) ?></h3>
            <p class="feature-description"><?= e($text) ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- Highlight Box -->
      <div class="highlight-box">
        <div class="highlight-title"><i class="fas fa-star"></i> Before You Decide</div>
        <div class="highlight-content">
          Not everyone needs a transplant straight away. If medicine, PRP or waiting is the better first step for your hair loss, the doctor will tell you, and you leave with a <strong>written graft and cost estimate</strong> and no obligation to book a date.
        </div>
        <?php /* A call button since 27 Oct 2026 (client review comment: "consult now par call ka button lga do"). */ ?>
        <a href="<?= e($telHref) ?>" class="btn-call highlight-call" data-track="call"><i class="fa-solid fa-phone"></i> Consult Now: <?= e(LP_PHONE_DISPLAY) ?></a>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="cta-section">
    <div class="container">
      <div class="cta-title">Clear Advice. Clear Costs. Choose DENCESPOT CLINIC.</div>
      <div class="cta-subtitle">Hair transplant consultations at Sector 39, Gurugram and Rohini, Delhi.</div>
      <button type="button" class="cta-button book-appointment-btn"><i class="fas fa-calendar-check"></i> Book Your Free Consultation</button>
    </div>
  </section>

  <!-- Why Choose Us -->
  <section class="why-choose">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">The DenceSpot Approach</h2>
        <p class="section-subtitle">How a hair transplant is planned and carried out at our Gurugram and Rohini clinics</p>
      </div>
      <div class="why-choose-content">
        <div class="why-choose-grid">
          <?php foreach ($approach as [$icon, $name, $text]): ?>
          <div class="why-card">
            <div class="why-card-icon"><i class="fas <?= e($icon) ?>"></i></div>
            <h3><?= e($name) ?></h3>
            <p><?= e($text) ?></p>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="why-image">
          <?= hp_img('doctor-3', DOCTORS['dr-akash']['name'] . ', ' . DOCTORS['dr-akash']['fellowship'] . ', at ' . SITE_NAME, '(min-width: 769px) 500px, 90vw', ['class' => 'doctor-image']) ?>
        </div>
      </div>
      <div class="cta-group">
        <button type="button" class="btn-primary book-appointment-btn"><i class="fas fa-calendar-check me-2"></i>Book Your Appointment Now</button>
        <a href="<?= e($telHref) ?>" class="btn-call" data-track="call"><i class="fa-solid fa-phone"></i> Speak to Our Team</a>
      </div>
    </div>
  </section>

  <!-- Stats -->
  <section class="stats">
    <div class="container">
      <div class="stats-grid">
        <?php foreach ($stats as [$icon, $num, $label]): ?>
        <div class="stat-item">
          <i class="fas <?= e($icon) ?>"></i>
          <div class="stat-number"><?= e($num) ?></div>
          <div class="stat-label"><?= e($label) ?></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Results Section -->
  <section class="results">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Our Happy Clients</h2>
      </div>
      <div class="results-grid">
        <?php foreach ($resultPhotos as $slug => $alt): ?>
        <div class="result-card">
          <?= lp_photo($slug, $alt, '(min-width: 1025px) 380px, (min-width: 769px) 33vw, 50vw') ?>
        </div>
        <?php endforeach; ?>
      </div>
      <p class="results-note">Photos of DenceSpot patients. Individual results vary.</p>
      <div class="cta-group">
        <a href="<?= e(LP_WHATSAPP_URL) ?>" class="btn-primary" rel="noopener" data-track="whatsapp"><i class="fa-brands fa-whatsapp"></i> Ask About Your Case on WhatsApp</a>
        <a href="<?= e($telHref) ?>" class="btn-call" data-track="call"><i class="fa-solid fa-phone"></i> Talk to Our Team Now</a>
      </div>
    </div>
  </section>

  <!-- CTA Section 1 -->
  <section class="cta-section">
    <div class="container">
      <h2>Not Sure How Many Grafts You Need?</h2>
      <p>A doctor checks your donor area and gives you a written graft and cost estimate at your consultation.</p>
      <div class="cta-group">
        <button type="button" class="btn-primary book-appointment-btn"><i class="fas fa-calendar-check me-2"></i>Book Your Free Consultation</button>
        <a href="<?= e($telHref) ?>" class="btn-call" data-track="call"><i class="fa-solid fa-phone"></i> Call Now: <?= e(LP_PHONE_DISPLAY) ?></a>
      </div>
    </div>
  </section>

  <!-- Team Section -->
  <section class="team">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Meet Our Doctors</h2>
        <p class="section-subtitle section-subtitle--tight">The doctors who examine, plan and carry out hair treatment at DenceSpot Clinic</p>
        <?php /* The clinic's years (client, 27 Oct 2026), not any one doctor's:
                 each card keeps that doctor's own figure from DOCTORS. */ ?>
        <span class="stats-badge team-badge"><i class="fas fa-certificate"></i> DenceSpot Clinic · <?= (int) STAT_CLINIC_YEARS ?>+ Years of Experience</span>
      </div>
      <div class="team-grid">
        <?php foreach ($team as [$key, $img, $role, $facts]): ?>
        <div class="team-member">
          <?php if ($img === null): ?>
          <div class="team-image team-image--icon" aria-hidden="true"><i class="fas fa-user-doctor"></i></div>
          <?php else: ?>
          <div class="team-image">
            <?= hp_img($img, DOCTORS[$key]['name'] . ' at ' . SITE_NAME, '200px') ?>
          </div>
          <?php endif; ?>
          <h3><?= e(DOCTORS[$key]['name']) ?></h3>
          <p class="team-role"><?= e($role) ?></p>
          <p class="team-facts"><?= e(implode(' | ', array_filter($facts))) ?></p>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="cta-group">
        <button type="button" class="btn-primary book-appointment-btn"><i class="fas fa-calendar-check me-2"></i>Meet Our Doctors - Book Consultation</button>
        <a href="<?= e($telHref) ?>" class="btn-call" data-track="call"><i class="fa-solid fa-phone"></i> Schedule Your Visit</a>
      </div>
    </div>
  </section>

  <!-- Final CTA Section -->
  <section class="cta-section">
    <div class="container">
      <h2>Ready to Plan Your Hair Transplant?</h2>
      <p>Book a consultation at our Gurugram or Rohini clinic and get a written estimate before you decide.</p>
      <div class="cta-group">
        <a href="<?= e(LP_WHATSAPP_URL) ?>" class="btn-primary" rel="noopener" data-track="whatsapp"><i class="fa-brands fa-whatsapp"></i> Chat With Our Team Now</a>
        <a href="<?= e($telHref) ?>" class="btn-call" data-track="call"><i class="fa-solid fa-phone"></i> Call <?= e(LP_PHONE_DISPLAY) ?></a>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="footer-content">
        <div class="footer-section">
          <h2 class="footer-heading">Contact Us</h2>
          <div class="footer-contact-item">
            <i class="fa-solid fa-phone"></i>
            <div>
              <div><strong>Call Now:</strong></div>
              <div><a href="<?= e($telHref) ?>" data-track="call"><?= e(LP_PHONE_DISPLAY) ?></a></div>
            </div>
          </div>
          <div class="footer-contact-item">
            <i class="fas fa-map-marker-alt"></i>
            <div>
              <p class="footer-subhead">Visit Us:</p>
              <ul class="mt-1">
                <li class="mt-2"><strong>Gurugram : </strong><?= e(nap_address_line()) ?> (<?= e(NAP_LANDMARK) ?>) · <a href="<?= e(MAPS_URL) ?>" target="_blank" rel="noopener">Map</a></li>
                <li class="mt-2"><strong>Delhi (Rohini) : </strong><?= e(LOC_DELHI_ADDRESS) ?> · <a href="<?= e(LOC_DELHI_MAPS_URL) ?>" target="_blank" rel="noopener">Map</a></li>
              </ul>
            </div>
          </div>
          <div class="footer-contact-item">
            <i class="fas fa-clock"></i>
            <div>
              <div><strong>Delhi (Rohini):</strong> <?= e(LOC_DELHI_HOURS_DISPLAY) ?> (<?= e(LOC_DELHI_HOURS_NOTE) ?>)</div>
              <div class="mt-1"><strong>Gurugram:</strong> <?= e(HOURS_DISPLAY) ?> (<?= e(HOURS_NOTE) ?>)</div>
            </div>
          </div>
        </div>

        <div class="footer-section footer-cta">
          <h2 class="footer-heading">Book Your Free Consultation</h2>
          <p>Take the first step towards treating your hair loss. Our doctors examine your scalp and explain your options.</p>
          <div class="cta-group">
            <button type="button" class="btn-primary book-appointment-btn"><i class="fas fa-calendar-check me-2"></i>Book your Free Consultation</button>
            <a href="<?= e($telHref) ?>" class="btn-call btn-call--block" data-track="call"><i class="fa-solid fa-phone"></i> Call Now</a>
          </div>
        </div>

        <div class="footer-section">
          <h2 class="footer-heading">Why Choose Us?</h2>
          <ul class="footer-ticks">
            <li>✓ Doctor-led consultations</li>
            <li>✓ FUE &amp; DHI techniques</li>
            <li>✓ Hairline agreed with you</li>
            <li>✓ Itemised written estimate</li>
            <li>✓ EMI Available on eligible cards</li>
            <li>✓ 12 months of follow-up reviews</li>
            <li>✓ Clinics in Gurugram &amp; Rohini</li>
            <li>✓ Open 7 days a week</li>
          </ul>
        </div>
      </div>

      <div class="footer-bottom">
        <p>&copy; <?= date('Y') ?> <?= e(SITE_NAME) ?>. All Rights Reserved. · <a href="/privacy-policy">Privacy Policy</a> · <a href="/terms">Terms</a> · <a href="/medical-disclaimer">Medical Disclaimer</a></p>
        <p class="footer-disclaimer">Disclaimer: <?= e(MEDICAL_DISCLAIMER) ?></p>
      </div>
    </div>
  </footer>

  <!-- Floating CTA Button -->
  <div class="floating-cta">
    <a href="<?= e(LP_WHATSAPP_URL) ?>" rel="noopener" aria-label="WhatsApp" data-track="whatsapp"><i class="fa-brands fa-whatsapp"></i></a>
    <a href="<?= e($telHref) ?>" aria-label="Call Now" data-track="call"><i class="fa-solid fa-phone"></i></a>
  </div>

  <script src="<?= e(lp_asset('lp.js')) ?>" defer></script>
</body>
</html>
