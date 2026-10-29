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
 * the same log, email and WhatsApp alert and the visitor lands on /thank-you.
 */

declare(strict_types=1);

require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/schema.php';
require_once dirname(__DIR__) . '/includes/components.php';

/**
 * Ad-platform tags for this page only. Leave a value '' and its tag is not
 * printed. The site itself loads none of these.
 */
const LP_GTM_ID   = '';   // e.g. 'GTM-XXXXXXX'
const LP_GA4_ID   = '';   // e.g. 'G-XXXXXXXXXX'
const LP_PIXEL_ID = '';   // Meta Pixel id, digits only

const LP_URL    = '/lp/';
const LP_SOURCE = 'lp-hair-transplant';

/**
 * One number on the whole page (client, 26 Oct 2026), for calls and WhatsApp.
 * The clinic entities in the JSON-LD keep their own numbers, which must match
 * each clinic's Google Business Profile.
 */
const LP_PHONE_E164    = LOC_DELHI_PHONE_E164;
const LP_PHONE_DISPLAY = LOC_DELHI_PHONE_DISPLAY;
const LP_WHATSAPP_URL  = LOC_DELHI_WHATSAPP_URL;

$title       = 'Hair Transplant in Gurgaon & Delhi | DenceSpot Clinic';
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
 * Before/after composites in lp/img/ (ba-NN-480/640/1080.webp, all square;
 * ba-10/11 added 27 Oct 2026). The hero takes three whose photo panels fill
 * the card to the bottom, so the cards line up (client, 27 Oct 2026: ba-02
 * left white space under its centre card); the other eight fill the 4 × 2
 * results grid. No photo appears twice. No technique, graft count or interval
 * is on record for them, so none is printed.
 */
$heroPhotos = [
    'ba-01' => 'Before and after a hair transplant at DenceSpot Clinic: a fully shaved scalp with the new hairline drawn, and the grown-in result',
    'ba-04' => 'Before and after a hair transplant at DenceSpot Clinic: a receding hairline from the front, and the rebuilt hairline',
    'ba-03' => 'Before and after a hair transplant at DenceSpot Clinic: thinning across the top of the head, and the result from the front',
];
$resultPhotos = [
    'ba-10' => 'Before and after a hair transplant at DenceSpot Clinic: a receding hairline and thin front, and the result from the front',
    'ba-02' => 'Before and after a hair transplant at DenceSpot Clinic: a bald front and top marked for surgery, and the same patient with the area covered',
    'ba-05' => 'Before and after a hair transplant at DenceSpot Clinic: the frontal hairline marked out, and the result',
    'ba-11' => 'Three photos of one DenceSpot Clinic patient: the hairline marked before surgery, the grafted area on the day of the procedure, and the result',
    'ba-06' => 'Before and after a hair transplant at DenceSpot Clinic: thinning front and temples seen from above, and the result',
    'ba-07' => 'Before and after a hair transplant at DenceSpot Clinic: receded temples marked for grafting, and the restored temples',
    'ba-08' => 'Before and after a hair transplant at DenceSpot Clinic: the hairline drawn on curly hair, and the result',
    'ba-09' => 'Four photos of one DenceSpot Clinic patient: before treatment, then at three later stages',
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

/** Team cards: facts from DOCTORS; a missing fact is left out. */
$team = [
    ['dr-nyra',  'doctor-nyra',  DOCTORS['dr-nyra']['quals'] . ' · Owner & Chief Consultant', [DOCTORS['dr-nyra']['experience'] . ' of experience', DOCTORS['dr-nyra']['abroad']]],
    ['dr-rahul', 'doctor-rahul', DOCTORS['dr-rahul']['position'],                              [DOCTORS['dr-rahul']['experience'] . ' of experience']],
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
$asset   = static fn (string $file): string => LP_URL . $file . '?v=' . (int) @filemtime(__DIR__ . '/' . $file);

/** One enquiry form, shared by the three popups. $id keeps label/for pairs unique. */
function lp_form(string $id, string $formType, string $icon, string $submit): string
{
    ob_start(); ?>
<form action="/enquire.php" method="POST" class="popup-form">
  <input type="hidden" name="treatment" value="Hair transplant">
  <input type="hidden" name="source" value="<?= e(LP_SOURCE . '-' . $id) ?>">
  <input type="hidden" name="message" value="">
  <input type="hidden" name="form_type" value="<?= e($formType) ?>">
  <div class="hp-field" aria-hidden="true"><label for="<?= e($id) ?>-website">Website</label><input type="text" id="<?= e($id) ?>-website" name="website" tabindex="-1" autocomplete="off"></div>
  <div class="enhanced-form-group">
    <label for="<?= e($id) ?>-name"><i class="fas fa-user"></i> Full Name</label>
    <input type="text" id="<?= e($id) ?>-name" name="name" class="enhanced-input" placeholder="Enter your full name" autocomplete="name" maxlength="120" required>
  </div>
  <div class="enhanced-form-group">
    <label for="<?= e($id) ?>-phone"><i class="fas fa-phone"></i> Phone Number</label>
    <input type="tel" id="<?= e($id) ?>-phone" name="phone" class="enhanced-input" placeholder="Enter your phone number" autocomplete="tel" inputmode="tel" minlength="10" maxlength="16" required>
  </div>
  <div class="enhanced-form-group">
    <label for="<?= e($id) ?>-clinic"><i class="fas fa-location-dot"></i> Preferred Clinic</label>
    <?php /* Values must match ENQUIRY_CLINICS in enquire.php, or the choice is dropped. */ ?>
    <select id="<?= e($id) ?>-clinic" name="clinic" class="enhanced-input">
      <option value="">Choose a clinic...</option>
      <option value="Gurugram (Sector 39)">Gurugram (Sector 39)</option>
      <option value="Delhi (Rohini)">Delhi (Rohini)</option>
      <option value="Either clinic">Either clinic</option>
    </select>
  </div>
  <div class="enhanced-form-group">
    <label for="<?= e($id) ?>-visit"><i class="fas fa-clipboard-list"></i> When do you plan to visit?</label>
    <select id="<?= e($id) ?>-visit" name="visit" class="enhanced-input">
      <option value="">Choose an option...</option>
      <option value="Within a week">Within a week</option>
      <option value="Within a month">Within a month</option>
      <option value="Next 2-3 months">Next 2–3 months</option>
      <option value="Not sure">Not sure</option>
    </select>
  </div>
  <label class="form-consent" for="<?= e($id) ?>-consent">
    <input type="checkbox" id="<?= e($id) ?>-consent" name="dpdp_consent" value="1" required>
    <span>I agree that <?= e(SITE_NAME) ?> may use these details to contact me about this enquiry (<a href="/privacy-policy" target="_blank" rel="noopener">Privacy Policy</a>). Kept for 12 months; you can withdraw consent at any time.</span>
  </label>
  <button type="submit" class="enhanced-submit-btn"><i class="fas <?= e($icon) ?>"></i> <?= e($submit) ?></button>
</form>
<?php
    return (string) ob_get_clean();
}

/** One popup: image side with overlay, form side. */

function lp_modal(string $id, string $badge, string $image, string $imageAlt, string $heading, string $text, array $benefits, string $formIcon, string $formTitle, string $formText, string $form): string
{
    ob_start(); ?>
<dialog class="enhanced-modal" id="<?= e($id) ?>" aria-labelledby="<?= e($id) ?>-title">
  <button type="button" class="modal-close-btn" data-close aria-label="Close"><i class="fas fa-times"></i></button>
  <div class="modal-body">
    <div class="modal-split">
      <div class="modal-image-side">
        <div class="modal-badge"><?= e($badge) ?></div>
        <?= hp_img($image, $imageAlt, '(min-width: 769px) 405px, 95vw') ?>
        <div class="modal-image-overlay">
          <p class="modal-overlay-title"><?= e($heading) ?></p>
          <p><?= e($text) ?></p>
          <div class="form-benefits">
            <?php foreach ($benefits as $b): ?>
            <div class="benefit-item"><i class="fas fa-check-circle"></i><span><?= e($b) ?></span></div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="modal-form-side">
        <div class="modal-form-header">
          <div class="icon-badge"><i class="fas <?= e($formIcon) ?>"></i></div>
          <p class="modal-form-title" id="<?= e($id) ?>-title"><?= e($formTitle) ?></p>
          <p><?= e($formText) ?></p>
        </div>
        <?= $form ?>
      </div>
    </div>
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
  <link rel="stylesheet" href="<?= e($asset('lp.css')) ?>">

  <!-- Icons load without blocking the first paint, as on the reference -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" media="print" onload="this.media='all'">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/solid.min.css" media="print" onload="this.media='all'">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" media="print" onload="this.media='all'">
  <noscript>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/solid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css">
  </noscript>

  <?= schema_render($schema) ?>

<?php if (LP_GTM_ID !== ''): ?>
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','<?= e(LP_GTM_ID) ?>');</script>
<?php endif; ?>
<?php if (LP_GA4_ID !== ''): ?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?= e(LP_GA4_ID) ?>"></script>
  <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','<?= e(LP_GA4_ID) ?>');</script>
<?php endif; ?>
<?php if (LP_PIXEL_ID !== ''): ?>
  <script>!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');fbq('init','<?= e(LP_PIXEL_ID) ?>');fbq('track','PageView');</script>
<?php endif; ?>
</head>

<body>
<?php if (LP_GTM_ID !== ''): ?>
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= e(LP_GTM_ID) ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<?php endif; ?>

  <!-- Popup 1: shown 4.5 s after load -->
  <?= lp_modal(
      'welcomeModal', '📅 CONSULTATION', 'doctor-nyra', DOCTORS['dr-nyra']['name'] . ', ' . DOCTORS['dr-nyra']['quals'] . ', at ' . SITE_NAME,
      'Plan Your Hair Transplant',
      'A doctor checks your scalp and donor area at our Gurugram or Rohini clinic',
      ['Scalp examined by a doctor', 'Graft estimate explained', 'No obligation to book a date'],
      'fa-user-doctor', 'Book a Hair Consultation', 'We call you back during clinic hours',
      lp_form('welcome', 'Welcome popup', 'fa-calendar-check', 'Request a Call Back')
  ) ?>

  <!-- Popup 2: shown 10 s after popup 1 is closed -->
  <?= lp_modal(
      'estimateModal', '🧾 COST ESTIMATE', 'doctor-3', DOCTORS['dr-akash']['name'] . ' at ' . SITE_NAME,
      'Know the Cost Before You Decide',
      'An itemised, written estimate after your scalp assessment',
      ['Grafts and technique explained', 'Card EMI on eligible cards', 'Follow-up reviews included'],
      'fa-file-invoice', 'Get a Written Estimate', 'Shared at your consultation',
      lp_form('estimate', 'Estimate popup', 'fa-file-invoice', 'Request My Estimate')
  ) ?>

  <!-- Popup 3: every "Book" button -->
  <?= lp_modal(
      'appointmentModal', '📅 BOOK NOW', 'doctor-rahul', DOCTORS['dr-rahul']['name'] . ' at ' . SITE_NAME,
      'Book Your Visit',
      'Consultation with a doctor at Sector 39, Gurugram or Rohini, Delhi',
      ['Call-back to confirm a time', 'Open 7 days a week', 'Two clinics to choose from'],
      'fa-calendar-check', 'Book Appointment', 'We call you to confirm the time',
      lp_form('booking', 'Appointment popup', 'fa-calendar-check', 'Book My Appointment')
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
          <h1>Hair Transplant in Gurgaon &amp; Delhi</h1>
          <div class="hb-ribbon-row">
            <span class="hb-mobile-only"><i class="fas fa-credit-card"></i> Card EMI</span>
            <span class="hb-badge">Doctor<br>Led</span>
            <span class="hb-mobile-only"><i class="fas fa-file-signature"></i> Written Estimate</span>
          </div>
        </div>

        <div class="hb-cards">
          <?php foreach (array_keys($heroPhotos) as $i => $slug): ?>
          <?php $card = ['a', 'b', 'c'][$i]; ?>
          <figure class="hb-card hb-card--<?= $card ?>">
            <?= lp_photo($slug, $heroPhotos[$slug], $card === 'b' ? '(min-width: 1025px) 360px, (min-width: 768px) 30vw, 52vw' : '(min-width: 1025px) 360px, (min-width: 768px) 30vw, 45vw', ['loading' => 'eager', 'fetchpriority' => $card === 'b' ? 'high' : '', 'class' => 'hb-photo']) ?>
            <?php if ($card !== 'a'): /* card A carries the label */ ?><figcaption class="hb-note">Results vary</figcaption><?php endif; ?>
          </figure>
          <?php endforeach; ?>
          <div class="hb-label">
            <p class="hb-label__top">Hair Transplant</p>
            <p class="hb-label__big">FUE &amp; DHI</p>
          </div>
        </div>
      </div>

      <div class="hb-strip">
        <div class="hb-strip__inner">
          <span class="hb-item">FUE <span class="hb-sep">|</span> DHI</span>
          <span class="hb-item hb-desktop-only"><i class="fas fa-credit-card"></i> Card EMI Options</span>
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
      <button type="button" class="cta-button book-appointment-btn"><i class="fas fa-calendar-check"></i> Book Your Consultation</button>
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
      <p class="stats-note">Figures from clinic records, <?= e(STAT_FIGURES_AS_OF) ?>.</p>
    </div>
  </section>

  <!-- Results Section -->
  <section class="results">
    <div class="container">
      <?php /* Visible heading, subtitle and clinic boxes removed (client, 26 Oct
               2026); the heading stays for screen readers and the outline. */ ?>
      <h2 class="sr-only">Hair Transplant Before &amp; After Photos</h2>
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
        <button type="button" class="btn-primary book-appointment-btn"><i class="fas fa-calendar-check me-2"></i>Book Your Consultation</button>
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
          <div class="team-image">
            <?= hp_img($img, DOCTORS[$key]['name'] . ' at ' . SITE_NAME, '200px') ?>
          </div>
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
          <h2 class="footer-heading">Book Your Consultation</h2>
          <p>Take the first step towards treating your hair loss. Our doctors examine your scalp and explain your options.</p>
          <div class="cta-group">
            <button type="button" class="btn-primary book-appointment-btn"><i class="fas fa-calendar-check me-2"></i>Book Consultation</button>
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
            <li>✓ Card EMI on eligible cards</li>
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

  <script src="<?= e($asset('lp.js')) ?>" defer></script>
</body>
</html>
