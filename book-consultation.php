<?php
/**
 * /book-consultation — page #2, strategy §1.1.
 *
 * One destination for every CTA on the site. Its only job is to convert, so
 * it deliberately carries no cross-sell, no treatment browsing and no
 * competing calls to action. Previously every CTA pointed at an on-page
 * anchor, which cannot be measured or targeted in Ads.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$page = [
    'title'       => 'Book a Consultation | DenceSpot Clinic, Gurgaon',
    'description' => 'Book a doctor-led hair or beard restoration consultation at DenceSpot Clinic in Sector 39, Gurugram or Rohini, Delhi. Examination, written plan, no pressure to book on the day.',
    'url'         => '/book-consultation',
    'crumbs'      => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Book a consultation'],
    ],
    'schema' => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs([
            ['name' => 'Home', 'url' => '/'],
            ['name' => 'Book a consultation'],
        ]),
        [
            '@type' => 'ContactPage',
            '@id'   => abs_url('/book-consultation') . '#page',
            'name'  => 'Book a Consultation',
            'about' => ['@id' => SITE_ORIGIN . '/#clinic'],
        ],
    ],
];

require __DIR__ . '/includes/header.php';

$hasError = isset($_GET['error']);
$errors   = $hasError ? explode(',', (string) $_GET['error']) : [];
?>

<section class="section section--canvas">
  <div class="wrap">
    <div class="split">

      <div>
        <span class="pill pill--dot">Consultation booking</span>
        <h1 class="h1 mt-3">Book a Hair Transplant Consultation in Gurgaon</h1>
        <p class="lead mt-3 measure">An examination by a registered medical practitioner at our clinic in Sector 39, Gurugram or Rohini, Delhi. You get an honest view of whether treatment is appropriate for you, and a written plan if it is — with no pressure to book a date on the day.</p>

        <div class="card card--pad-lg mt-5">
          <h2 id="what-the-consultation-covers" class="h3">What the consultation covers</h2>
          <ul class="stack-sm mt-3">
            <li class="tick"><?= icon('check', 18, 'var(--accent)', 2.2) ?><span class="body-s">Medical history and current medication reviewed</span></li>
            <li class="tick"><?= icon('check', 18, 'var(--accent)', 2.2) ?><span class="body-s">Scalp, hair and donor area examined under magnification</span></li>
            <li class="tick"><?= icon('check', 18, 'var(--accent)', 2.2) ?><span class="body-s">Your pattern staged, and the plan drawn on your own head or face</span></li>
            <li class="tick"><?= icon('check', 18, 'var(--accent)', 2.2) ?><span class="body-s">Photographs taken for your record</span></li>
            <li class="tick"><?= icon('check', 18, 'var(--accent)', 2.2) ?><span class="body-s">A written plan: technique, approximate graft number, timeline and cost</span></li>
          </ul>
          <p class="meta mt-4">Bring your medical history and a list of any medicines you take. If you have had a previous procedure elsewhere, bring whatever records you have.</p>
        </div>

        <div class="grid grid--2 mt-4">
          <div class="card">
            <?= icon('clock', 22, 'var(--accent-deep)') ?>
            <p class="h4 mt-2">Hours at both clinics</p>
            <p class="meta mt-1"><?= e(HOURS_DISPLAY) ?><br><?= e(HOURS_NOTE) ?></p>
          </div>
          <div class="card">
            <?= icon('pin', 22, 'var(--accent-deep)') ?>
            <p class="h4 mt-2">Two clinics</p>
            <p class="meta mt-1"><a href="/contact">Sector 39, Gurugram</a> (<?= e(NAP_LANDMARK) ?>) and <a href="/delhi-clinic">Rohini, Delhi</a>. Choose one in the form.</p>
          </div>
        </div>

        <div class="note mt-4">
          <p class="body-s"><b>Not ready for an appointment?</b> Send photos of the front, crown and donor area on WhatsApp and the clinic will tell you whether a consultation is worth your time.</p>
        </div>
      </div>

      <div>
        <div class="cta-band" style="display:block;position:sticky;top:100px">
          <p class="eyebrow">Request an appointment</p>
          <h2 id="tell-us-how-to-reach-you" class="h3 mt-2">Tell us how to reach you</h2>

          <?php if ($hasError): ?>
            <p class="form-error mt-2" role="alert">
              <?php if (in_array('phone', $errors, true)): ?>
                Please enter a valid phone number so the clinic can call you back.
              <?php elseif (in_array('consent', $errors, true)): ?>
                Please tick the consent box so the clinic may use your details to contact you about your enquiry.
              <?php else: ?>
                Please check the highlighted fields and try again.
              <?php endif; ?>
            </p>
          <?php endif; ?>

          <div class="mt-3">
            <?= enquiry_form('book-consultation', [
                'Hair transplant',
                'Beard transplant',
                'Hair PRP / GFC therapy',
                'Hair fall treatment',
                'Women’s hair loss',
                'Second opinion on a previous procedure',
                'Not sure — please advise',
            ]) ?>
          </div>

          <p class="fine mt-4" style="text-align:center">or reach the clinic directly</p>

          <div class="grid grid--2 mt-3" style="gap:10px">
            <a class="btn btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> WhatsApp</a>
            <a class="btn btn--ghost" href="tel:<?= e(PHONE_E164) ?>" data-track="call"><?= icon('phone', 17) ?> Call</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="section section--white">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Before you come in</p>
      <h2 id="questions-worth-asking-any-clinic" class="h2 mt-2">Questions worth asking any clinic</h2>
      <p class="body mt-3">Bring these to us, and to anyone else you are considering. The answers tell you more than a price list does.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card">
        <p class="h4">Who actually performs the procedure?</p>
        <p class="body-s mt-2">Not who consults you — who holds the punch and places the grafts, and whether that is a doctor.</p>
      </div>
      <div class="card">
        <p class="h4">How was the graft number arrived at?</p>
        <p class="body-s mt-2">A number quoted before an examination is a guess. Ask to see the donor area mapped.</p>
      </div>
      <div class="card">
        <p class="h4">What does the estimate include?</p>
        <p class="body-s mt-2">Anaesthesia, medication, follow-up reviews. A low per-graft rate with extras added later is not cheaper.</p>
      </div>
      <div class="card">
        <p class="h4">What happens if the result falls short?</p>
        <p class="body-s mt-2">Ask what the clinic does at the twelve-month review if density is uneven, and get it in writing.</p>
      </div>
      <div class="card">
        <p class="h4">How will my progress be measured?</p>
        <p class="body-s mt-2">Baseline photographs at a fixed angle and lighting, repeated at each review. Without them, growth is judged from memory.</p>
      </div>
      <div class="card">
        <p class="h4">What will my donor area look like at forty-five?</p>
        <p class="body-s mt-2">Donor supply is finite. A clinic that has not thought past this procedure is not planning, it is selling.</p>
      </div>
    </div>
  </div>
</section>

<?= local_block(
    'Visiting the Clinic',
    'Consultations are available at both clinics, Sector 39, Gurugram and Rohini, Delhi, with registered medical practitioners. Choose the one that suits you in the form above.'
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
