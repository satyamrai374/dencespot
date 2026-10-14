<?php
/**
 * /contact — page #13.
 *
 * Distinct from /book-consultation by design: that page's only job is to
 * convert, this one answers "where are you, when are you open, how do I get
 * there". Splitting them keeps the conversion page free of distractions and
 * gives the local-intent queries somewhere sensible to land.
 *
 * 14 Oct 2026 — landing-page layout: "Practical Notes" is an lp_split and the
 * closing call to action an lp_cta (AI illustrations, each with its visible
 * AI label). The hero keeps the two clinic cards; the page presents both clinics.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Contact'],
];

$page = [
    'title'       => 'Contact DenceSpot Clinic | Gurugram & Delhi Locations',
    'description' => 'Contact DenceSpot Clinic in Sector 39, Gurugram and Rohini, Delhi: addresses, maps, directions, phone and WhatsApp. Open ' . HOURS_DISPLAY . '.',
    'url'         => '/contact',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        [
            '@type' => 'ContactPage',
            '@id'   => abs_url('/contact') . '#page',
            'name'  => 'Contact DenceSpot Clinic',
            'about' => ['@id' => SITE_ORIGIN . '/#clinic'],
        ],
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="measure">
      <span class="pill pill--dot">Contact · Two clinics</span>
      <h1 class="h1 mt-3">Contact DenceSpot Clinic in Gurugram and Delhi</h1>
      <p class="lead mt-3">Two clinics: Sector 39, Gurugram (<?= e(NAP_LANDMARK) ?>) and Rohini, Delhi. Consultations and treatment are available at both, with registered medical practitioners. Choose whichever is closer — the address, phone number, hours and map for each are below.</p>
      <div class="btn-row mt-5">
        <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
        <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Message on WhatsApp</a>
      </div>
    </div>
    <h2 class="sr-only">Our two clinics</h2>
    <div class="mt-6"><?= hp_clinic_cards() ?></div>
  </div>
</section>

<section class="section section--canvas" id="gurugram">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Clinic 1 · Gurugram</p>
        <h2 class="h2 mt-2">DenceSpot Clinic, Sector 39 Gurugram</h2>
        <p class="body-l mt-3 measure">Our main clinic, in Sector 39, Gurugram (<?= e(NAP_LANDMARK) ?>). Consultations, hair transplant procedures and PRP/GFC therapy are carried out here.</p>

        <?= nap_block() ?>
      </div>

      <div>
        <div class="media ratio-4-3 media--shadow">
          <iframe title="Google Map showing DenceSpot Clinic at <?= e(nap_address_line()) ?>" src="<?= e(LOC_GURGAON_MAP_EMBED) ?>" width="100%" height="100%" style="display:block;border:0;width:100%;height:100%" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
        </div>
        <?php /* Oct 2026: the two shopfront photographs were removed — the window signage carries "No Pain | No Scar" and "Permanent" claims the NMC Guidelines of 06.10.2026 prohibit. Restore a photograph only after the signage changes. */ ?>
        <a class="btn btn--outline btn--block mt-3" href="<?= e(LOC_GURGAON_MAPS_URL) ?>" target="_blank" rel="noopener"><?= icon('pin', 17) ?> Open in Google Maps<span class="sr-only"> (Gurugram clinic, opens in a new tab)</span></a>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="delhi-location">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Clinic 2 · Delhi</p>
        <h2 class="h2 mt-2">DenceSpot Clinic, Rohini, Delhi</h2>
        <p class="body-l mt-3 measure">Serving North-West Delhi, Rohini, Pitampura and the Delhi NCR region. Consultations, trichoscopy and treatment are carried out here, including hair transplant, PRP, hair-fall, laser and skin treatment. See <a href="/delhi-clinic">the Rohini clinic page</a> for each treatment.</p>

        <dl class="dl">
          <div>
            <dt>Location</dt>
            <dd><?= e(LOC_DELHI_ADDRESS) ?><span class="meta" style="display:block;font-weight:500"><?= e(LOC_DELHI_LANDMARK) ?></span></dd>
          </div>
          <div>
            <dt>Phone</dt>
            <dd><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></dd>
          </div>
          <div>
            <dt>WhatsApp</dt>
            <dd><a href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp">Message <?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></dd>
          </div>
          <div>
            <dt>Hours</dt>
            <dd><?= e(HOURS_DISPLAY) ?><span class="meta" style="display:block;font-weight:500"><?= e(HOURS_NOTE) ?></span></dd>
          </div>
        </dl>

        <p class="mt-4"><a class="hp-link" href="/delhi-clinic">Delhi clinic details and directions <?= hp_icon('arrow', 15, 2) ?></a></p>
      </div>

      <div>
        <div class="media ratio-4-3 media--shadow">
          <iframe title="Google Map showing DenceSpot Clinic, Rohini, Delhi" src="<?= e(LOC_DELHI_MAP_EMBED) ?>" width="100%" height="100%" style="display:block;border:0;width:100%;height:100%" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
        </div>
        <a class="btn btn--outline btn--block mt-3" href="<?= e(LOC_DELHI_MAPS_URL) ?>" target="_blank" rel="noopener"><?= icon('pin', 17) ?> Open in Google Maps<span class="sr-only"> (Delhi clinic, opens in a new tab)</span></a>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="directions">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Getting here</p>
      <h2 id="finding-the-clinic" class="h2 mt-2">Finding the Gurugram Clinic</h2>
      <p class="body mt-3">The Gurugram clinic is in Sector 39, <?= e(NAP_LANDMARK) ?>. For the Rohini clinic, use the <a href="#delhi-location">Delhi map above</a> or the <a href="/delhi-clinic#directions">Delhi clinic directions</a>.</p>
    </div>
    <?php
    // Each card renders only when DIRECTIONS holds a real answer. An unknown
    // one disappears rather than telling a patient we cannot find ourselves.
    $directionCards = [
        'road'    => ['icon' => 'pin',      'heading' => 'By road'],
        'metro'   => ['icon' => 'arrow',    'heading' => 'Nearest metro'],
        'parking' => ['icon' => 'settings', 'heading' => 'Parking'],
    ];
    $known = array_filter($directionCards, fn($k) => DIRECTIONS[$k] !== null, ARRAY_FILTER_USE_KEY);
    ?>
    <?php if ($known !== []): ?>
    <div class="grid grid--3 mt-6">
      <?php foreach ($known as $key => $card): ?>
      <div class="card">
        <?= icon($card['icon'], 22, 'var(--accent-deep)') ?>
        <h3 class="h4 mt-2"><?= e($card['heading']) ?></h3>
        <p class="body-s mt-2"><?= e(DIRECTIONS[$key]) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <p class="fine mt-4">If anything here is unclear on the day, call or send a WhatsApp message to the clinic you are visiting and someone will guide you in.</p>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-consultation',
    'alt'     => 'a dermatoscope and a notepad with a pencil on a wooden desk beside a fern',
    'id'      => 'practical-notes',
    'eyebrow' => 'Before you travel',
    'title'   => 'Practical Notes',
    'html'    => '<p><b>Opening hours.</b> Both clinics: ' . e(HOURS_DISPLAY) . '. ' . e(HOURS_NOTE) . '. Enquiries sent overnight are answered the next working morning.</p>'
               . '<p><b>Travelling from further away?</b> Send photos on <a href="' . e(WHATSAPP_URL) . '" rel="noopener" data-track="whatsapp">WhatsApp</a> first. The clinic will tell you whether a consultation is worth the journey before you make it.</p>',
    'points'  => [
        'What to bring: your medical history and a list of any current medicines.',
        'If you have had a previous procedure elsewhere, bring whatever records you have.',
        'Your privacy: details you send are used only to arrange your consultation.',
        'Photographs are kept on your clinical record, are not used in advertising, and are not shared without your written consent.',
    ],
]) ?>

<?= lp_cta([
    'eyebrow' => 'Gurugram and Delhi',
    'title'   => 'Book Your Consultation',
    'text'    => 'Tell us how to reach you and the clinic will call you back during opening hours to arrange a time.',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
