<?php
/**
 * /book-consultation — page #2, strategy §1.1.
 *
 * One destination for every CTA on the site. Its only job is to convert, so
 * it deliberately carries no cross-sell, no treatment browsing and no
 * competing calls to action. Previously every CTA pointed at an on-page
 * anchor, which cannot be measured or targeted in Ads.
 *
 * 14 Oct 2026 — landing-page layout: an illustrated lp_steps ("what happens
 * after you send the form") and the questions as an lp_split, each image with
 * its visible AI label. The enquiry form is unchanged and there is no closing
 * lp_cta — this is the booking page. Presents both clinics.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$page = [
    'title'       => 'Book a Consultation | DenceSpot Clinic, Gurgaon',
    'description' => 'Book a doctor-led consultation at DenceSpot Clinic in Sector 39, Gurugram or Rohini, Delhi: an examination, a written plan and no pressure to book on the day.',
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

<section class="hero">
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

<?= lp_steps([
    'eyebrow' => 'Step by step',
    'title'   => 'What Happens After You Send the Form',
    'intro'   => 'Consultations are available at both clinics, Sector 39, Gurugram and Rohini, Delhi, with registered medical practitioners.',
    'steps'   => [
        ['img' => 'step-followup',     'alt' => 'a desk calendar with dates circled',                      'title' => 'A call back',                   'text' => 'The clinic calls you back during opening hours to agree a time at the clinic you chose.'],
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                    'title' => 'Consultation and examination',  'text' => 'Your medical history and medicines are reviewed, and your scalp, hair and donor area examined under magnification and photographed for your record.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned hairline', 'title' => 'A written plan',                'text' => 'Your pattern is staged and the plan drawn on your own head or face, then technique, approximate graft number, timeline and cost in writing — with no pressure to book a date on the day.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'intro-donor',
    'alt'     => 'a mannequin head seen from behind, with the donor area at the back and sides marked',
    'id'      => 'questions-worth-asking-any-clinic',
    'eyebrow' => 'Before you come in',
    'title'   => 'Questions worth asking any clinic',
    'html'    => '<p>Bring these to us, and to anyone else you are considering. The answers tell you more than a price list does.</p>',
    'points'  => [
        'Who actually performs the procedure? Not who consults you — who holds the punch and places the grafts, and whether that is a doctor.',
        'How was the graft number arrived at? A number quoted before an examination is a guess. Ask to see the donor area mapped.',
        'What does the estimate include? Anaesthesia, medication, follow-up reviews. A low per-graft rate with extras added later is not cheaper.',
        'What happens if the result falls short? Ask what the clinic does at the twelve-month review if density is uneven, and get it in writing.',
        'How will my progress be measured? Baseline photographs at a fixed angle and lighting, repeated at each review.',
        'What will my donor area look like at forty-five? Donor supply is finite. A clinic that has not thought past this procedure is not planning, it is selling.',
    ],
]) ?>

<?= local_block(
    'Visiting the Clinic',
    'Consultations are available at both clinics, Sector 39, Gurugram and Rohini, Delhi, with registered medical practitioners. Choose the one that suits you in the form above.'
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
