<?php
/**
 * /contact — page #13.
 *
 * Distinct from /book-consultation by design: answers "where are you,
 * when are you open, how do I get there" for both clinic locations:
 * - Delhi (Rohini): 6, Dividing Road, near DDA Market, Pocket 3, Sector 5, Rohini, New Delhi, Delhi 110085 (GBP CID 4556839065399332243)
 * - Gurugram: 1123, Sector 39 Road, Jharsa, Sector 39, Gurugram, Haryana 122003
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Contact'],
];

$page = [
    'title'       => 'Contact DenceSpot Clinic | Delhi (Rohini) & Gurugram (Sector 39)',
    'description' => 'Visit DenceSpot Clinic in Delhi (Rohini) and Sector 39 (Gurugram). Addresses, opening hours, directions, phone and WhatsApp. Doctor-led consultations.',
    'url'         => '/contact',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_delhi_clinic(),
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        [
            '@type' => 'ContactPage',
            '@id'   => abs_url('/contact') . '#page',
            'name'  => 'Contact DenceSpot Clinic',
            'about' => [
                ['@id' => SITE_ORIGIN . '/#delhi-clinic'],
                ['@id' => SITE_ORIGIN . '/#clinic'],
            ],
        ],
    ],
];

$hasError = isset($_GET['error']);
$errors   = $hasError ? explode(',', (string) $_GET['error']) : [];

require __DIR__ . '/includes/header.php';
?>

<section class="section section--canvas">
  <div class="wrap">
    <div>
      <span class="pill pill--dot">Our Locations</span>
      <h1 class="h1 mt-3">Contact DenceSpot Clinic — Delhi (Rohini) & Gurugram</h1>
      <p class="lead mt-3 measure" style="max-width:72ch">Two doctor-led clinics across Delhi NCR. Consultations, procedures, and every follow-up review are conducted with the same medical doctors and clinical care standards.</p>
    </div>

    <?php if ($hasError): ?>
      <div class="card mt-4" style="border-left:4px solid var(--accent);background:#fff0f1;padding:16px 20px;">
        <p class="body-s" style="color:var(--accent-dark);font-weight:600;">
          <?php if (in_array('phone', $errors, true)): ?>
            Please enter a valid 10-digit mobile number so the clinic can reach you.
          <?php else: ?>
            Please review the required fields and submit again.
          <?php endif; ?>
        </p>
      </div>
    <?php endif; ?>

    <!-- Two Clinics Grid -->
    <div class="grid grid--2 mt-6" style="gap:28px;align-items:stretch;">

      <!-- Delhi Rohini Clinic (Google Business Profile Verified) -->
      <div class="card card--pad-lg" style="display:flex;flex-direction:column;justify-content:space-between;border-top:4px solid var(--ink)">
        <div>
          <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:8px;">
            <span class="pill pill--dot" style="font-size:12px">Delhi Location · GBP Verified</span>
            <span class="fine" style="color:var(--ink-muted)">CID: <?= e(LOC_DELHI_GBP_CID) ?></span>
          </div>
          <h2 class="h3 mt-3">Delhi (Rohini) Clinic</h2>
          <p class="body-s mt-1" style="color:var(--ink-soft)">Serving patients across North, West, and Central Delhi.</p>

          <dl class="nap mt-4">
            <div>
              <dt>Address</dt>
              <dd>
                <?= e(LOC_DELHI_ADDRESS) ?><br>
                <small style="color:var(--ink-muted)"><?= e(LOC_DELHI_LANDMARK) ?></small>
              </dd>
            </div>
            <div>
              <dt>Hours</dt>
              <dd>
                <strong><?= e(LOC_DELHI_HOURS_DISPLAY) ?></strong><br>
                <small style="color:var(--ink-muted)"><?= e(LOC_DELHI_HOURS_NOTE) ?></small>
              </dd>
            </div>
            <div>
              <dt>Phone</dt>
              <dd><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><strong><?= e(LOC_DELHI_PHONE_DISPLAY) ?></strong></a></dd>
            </div>
            <div>
              <dt>WhatsApp</dt>
              <dd><a href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" data-wa-trigger data-clinic="Delhi (Rohini)" rel="noopener" data-track="whatsapp">Message on WhatsApp</a></dd>
            </div>
          </dl>

          <div class="media ratio-16-10 mt-4" style="border-radius:var(--r-md);overflow:hidden;box-shadow:var(--shadow-sm)">
            <iframe title="Google Map showing DenceSpot Clinic at <?= e(LOC_DELHI_ADDRESS) ?>" src="<?= e(LOC_DELHI_MAP_EMBED) ?>" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
          </div>
        </div>

        <div class="mt-5">
          <div class="btn-row">
            <a class="btn btn--block btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" data-wa-trigger data-clinic="Delhi (Rohini)" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> WhatsApp Rohini</a>
            <a class="btn btn--block btn--outline" href="<?= e(LOC_DELHI_MAPS_URL) ?>" target="_blank" rel="noopener"><?= icon('pin', 17) ?> Open in Google Maps</a>
          </div>
        </div>
      </div>

      <!-- Gurugram Sector 39 Clinic -->
      <div class="card card--pad-lg" style="display:flex;flex-direction:column;justify-content:space-between;border-top:4px solid var(--accent)">
        <div>
          <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:8px;">
            <span class="pill pill--dot" style="font-size:12px">Gurugram Location</span>
            <span class="fine" style="color:var(--ink-muted)">Sector 39 Jharsa</span>
          </div>
          <h2 class="h3 mt-3">Gurugram (Sector 39) Clinic</h2>
          <p class="body-s mt-1" style="color:var(--ink-soft)">Serving patients across Gurugram, DLF, Sohna Road, and South Delhi.</p>

          <dl class="nap mt-4">
            <div>
              <dt>Address</dt>
              <dd>
                <?= e(nap_address_line()) ?><br>
                <small style="color:var(--ink-muted)"><?= e(NAP_LANDMARK) ?></small>
              </dd>
            </div>
            <div>
              <dt>Hours</dt>
              <dd>
                <strong><?= e(HOURS_DISPLAY) ?></strong><br>
                <small style="color:var(--ink-muted)"><?= e(HOURS_NOTE) ?></small>
              </dd>
            </div>
            <div>
              <dt>Phone</dt>
              <dd><a href="tel:<?= e(PHONE_E164) ?>" data-track="call"><strong><?= e(PHONE_DISPLAY) ?></strong></a></dd>
            </div>
            <div>
              <dt>WhatsApp</dt>
              <dd><a href="<?= e(WHATSAPP_URL) ?>" data-wa-trigger data-clinic="Gurugram (Sector 39)" rel="noopener" data-track="whatsapp">Message on WhatsApp</a></dd>
            </div>
          </dl>

          <div class="media ratio-16-10 mt-4" style="border-radius:var(--r-md);overflow:hidden;box-shadow:var(--shadow-sm)">
            <iframe title="Google Map showing DenceSpot Clinic at <?= e(nap_address_line()) ?>" src="<?= e(MAP_EMBED) ?>" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
          </div>
        </div>

        <div class="mt-5">
          <div class="btn-row">
            <a class="btn btn--block btn--accent" href="<?= e(WHATSAPP_URL) ?>" data-wa-trigger data-clinic="Gurugram (Sector 39)" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> WhatsApp Gurugram</a>
            <a class="btn btn--block btn--outline" href="<?= e(MAPS_URL) ?>" target="_blank" rel="noopener"><?= icon('pin', 17) ?> Open in Google Maps</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Direct Contact / Enquiry Form -->
<section class="section section--white" id="contact-form">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Direct message</p>
        <h2 class="h2 mt-2">Send a Message to the Medical Team</h2>
        <p class="body mt-3 measure">Have a clinical question or want to schedule an in-person assessment? Leave your details below. A doctor or clinical coordinator will contact you during clinic hours.</p>

        <div class="card card--pad-lg mt-5">
          <p class="h4">What you can expect</p>
          <ul class="stack-sm mt-3">
            <li class="tick"><?= icon('check', 18, 'var(--accent)', 2.2) ?><span class="body-s">Prompt response from our in-house medical staff</span></li>
            <li class="tick"><?= icon('check', 18, 'var(--accent)', 2.2) ?><span class="body-s">Clear answers regarding procedures, graft estimates, and timings</span></li>
            <li class="tick"><?= icon('check', 18, 'var(--accent)', 2.2) ?><span class="body-s">No aggressive sales tactics — clinical honesty first</span></li>
          </ul>
        </div>

        <div class="note mt-4">
          <p class="body-s"><b>Need immediate directions or advice?</b> Call or message on WhatsApp at <a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a> (Delhi) or <a href="tel:<?= e(PHONE_E164) ?>"><?= e(PHONE_DISPLAY) ?></a> (Gurugram).</p>
        </div>
      </div>

      <div>
        <div class="card card--ink card--pad-lg" style="box-shadow:var(--shadow-lg)">
          <p class="h3" style="color:#fff">Enquire / Book an Appointment</p>
          <p class="body-s mt-1" style="color:rgba(255,255,255,.75)">We usually respond within 30 minutes during opening hours.</p>
          <div class="mt-4">
            <?= enquiry_form('contact-page', [
                'Hair transplant (FUE / DHI)',
                'Beard transplant',
                'Eyebrow transplant',
                'Hair PRP / GFC therapy',
                'Hair fall & scalp check',
                'Laser hair removal',
                'Skin treatment',
                'Not sure — please advise',
            ], true, 'Either clinic') ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Getting Here & Practical Notes for Both Clinics -->
<section class="section section--canvas" id="directions">
  <div class="wrap">
    <div>
      <p class="eyebrow">Getting to the clinic</p>
      <h2 class="h2 mt-2">Directions & Practical Information</h2>
      <p class="body mt-3 measure">Step-by-step guidance for arriving by road, metro, or car at our clinics.</p>
    </div>

    <div class="grid grid--2 mt-6" style="gap:24px">
      <!-- Rohini Directions -->
      <div class="card card--pad-lg">
        <h3 class="h4" style="color:var(--ink)"><?= icon('pin', 18, 'var(--accent)') ?> Getting to Delhi (Rohini) Clinic</h3>
        <p class="meta mt-1"><strong>Address:</strong> <?= e(LOC_DELHI_ADDRESS) ?></p>
        <ul class="stack-sm mt-3">
          <li class="body-s"><strong>By Metro:</strong> Rithala Metro Station (Red Line) or Rohini West Metro Station. 5 to 7 minutes by e-rickshaw or auto to Sector 5 Dividing Road near DDA Market.</li>
          <li class="body-s"><strong>By Road:</strong> Conveniently accessible via Outer Ring Road and Bhagwan Mahavir Marg. Landmark: near DDA Market, Pocket 3, Sector 5.</li>
          <li class="body-s"><strong>Parking:</strong> Dedicated parking space available right in front of the clinic and surrounding market area.</li>
        </ul>
      </div>

      <!-- Gurugram Directions -->
      <div class="card card--pad-lg">
        <h3 class="h4" style="color:var(--ink)"><?= icon('pin', 18, 'var(--accent)') ?> Getting to Gurugram (Sector 39) Clinic</h3>
        <p class="meta mt-1"><strong>Address:</strong> <?= e(nap_address_line()) ?></p>
        <ul class="stack-sm mt-3">
          <li class="body-s"><strong>By Metro:</strong> Millennium City Centre Metro Station (Yellow Line). Approx 10 minutes by auto or cab via Sector 39 Road.</li>
          <li class="body-s"><strong>By Road:</strong> Easily accessible from NH-48 / Rajiv Chowk and Subhash Chowk. Landmark: <?= e(NAP_LANDMARK) ?>.</li>
          <li class="body-s"><strong>Parking:</strong> On-premises patient parking available directly outside the clinic facility.</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<?= cta_band(
    'Book Your Clinical Examination',
    'Select your nearest clinic in Delhi or Gurugram. Written plans, donor area mapping, and honest clinical assessments.',
    'contact-bottom'
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
