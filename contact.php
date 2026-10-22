<?php
/**
 * /contact — page #13.
 *
 * Distinct from /book-consultation by design: that page's only job is to
 * convert, this one answers "where are you, when are you open, how do I get
 * there". Splitting them keeps the conversion page free of distractions and
 * gives the local-intent queries somewhere sensible to land.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Contact'],
];

$page = [
    'title'       => 'Contact DenceSpot Clinic | Sector 39, Gurugram',
    'description' => 'Visit DenceSpot Clinic in Sector 39, Gurugram. Address, directions, opening hours, phone and WhatsApp. ' . HOURS_DISPLAY . '.',
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

<section class="section section--canvas">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <span class="pill pill--dot">Visit the clinic</span>
        <h1 class="h1 mt-3">Contact DenceSpot Clinic, Sector 39 Gurugram</h1>
        <p class="lead mt-3 measure">One clinic, in Sector 39, Gurugram. Consultations, procedures and every follow-up review happen here, with the same doctor and the same team.</p>

        <?= nap_block() ?>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Message on WhatsApp</a>
          <a class="btn btn--lg btn--outline" href="tel:<?= e(PHONE_E164) ?>" data-track="call"><?= icon('phone', 18) ?> <?= e(PHONE_DISPLAY) ?></a>
        </div>

        <div class="note mt-5">
          <p class="body-s"><b>Booking an appointment?</b> Use the <a href="/book-consultation">consultation booking page</a> — it takes your details straight to the clinic and you get a call back during opening hours.</p>
        </div>
      </div>

      <div>
        <div class="media ratio-16-10">
          <iframe title="Google Map showing DenceSpot Clinic at 1123, Sector 39 Road, Jharsa, Sector 39, Gurugram, Haryana 122003" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3508.3229126883884!2d77.0438613!3d28.439680699999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5e4f6f45491%3A0x9dc43165216a74e6!2sDencespot%20Clinic!5e0!3m2!1sen!2sus!4v1787587082143!5m2!1sen!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
        </div>
        <div class="grid grid--2 mt-3">
          <div class="media ratio-4-3 media--sm media--shadow"><img src="/assets/img/clinic-front-board.jpg" alt="DenceSpot Clinic shopfront on Sector 39 Road, Jharsa, Gurugram, showing the hair transplant and PRP treatment signage" width="800" height="600" loading="lazy"></div>
          <div class="media ratio-4-3 media--sm media--shadow"><img src="/assets/img/clinic-facade.jpg" alt="DenceSpot Clinic shopfront on Sector 39 Road, Jharsa, Gurugram, showing the hair transplant and PRP treatment signage" width="800" height="600" loading="lazy"></div>
        </div>
        <a class="btn btn--outline btn--block mt-3" href="<?= e(MAPS_URL) ?>" rel="noopener"><?= icon('pin', 17) ?> Open in Google Maps</a>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="directions">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Getting here</p>
      <h2 id="finding-the-clinic" class="h2 mt-2">Finding the Clinic</h2>
      <p class="body mt-3">We are in Sector 39, <?= e(NAP_LANDMARK) ?>.</p>
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
    <p class="fine mt-4">If anything here is unclear on the day, call or send a WhatsApp message and someone will guide you in.</p>
  </div>
</section>

<section class="section section--canvas">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">Before you travel</p>
        <h2 id="practical-notes" class="h2 mt-2">Practical Notes</h2>
      </div>
      <div class="grid grid--2">
        <div class="card"><?= icon('clock', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-2">Opening hours</h3><p class="body-s mt-2"><?= e(HOURS_DISPLAY) ?>. <?= e(HOURS_NOTE) ?>. Enquiries sent overnight are answered the next working morning.</p></div>
        <div class="card"><?= icon('doc', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-2">What to bring</h3><p class="body-s mt-2">Your medical history and a list of any current medicines. If you have had a previous procedure elsewhere, bring whatever records you have.</p></div>
        <div class="card"><?= icon('chat', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-2">Travelling from outside Gurugram</h3><p class="body-s mt-2">Send photos on WhatsApp first. The clinic will tell you whether a consultation is worth the journey before you make it.</p></div>
        <div class="card"><?= icon('shield', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-2">Your privacy</h3><p class="body-s mt-2">Details you send are used only to arrange your consultation. Photographs are kept on your clinical record and are never published without your written consent.</p></div>
      </div>
    </div>
  </div>
</section>

<?= cta_band(
    'Book Your Consultation',
    'Tell us how to reach you and the clinic will call you back during opening hours to arrange a time.',
    'contact'
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
