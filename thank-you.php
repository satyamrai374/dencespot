<?php
/**
 * /thank-you — conversion confirmation.
 *
 * Deliberately noindex: this page exists to fire a conversion event, not to
 * rank. Keep the URL stable; GA4 and Google Ads goals point at it.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

$page = [
    'title'       => 'Thank you — DenceSpot Clinic',
    'description' => 'Your enquiry has reached DenceSpot Clinic, Sector 39 Gurugram. We will call you back to arrange a consultation with Dr. Nyra, usually the same working day.',
    'url'         => '/thank-you',
    'crumbs'      => [],
    'schema'      => [],
    'noindex'     => true,
];

require __DIR__ . '/includes/header.php';

$ref = isset($_GET['ref']) ? preg_replace('/[^a-z0-9\- ]/i', '', (string) $_GET['ref']) : '';
?>

<!-- Conversion marker. GA4/Ads goal: pageview of /thank-you. -->
<script>
  if (typeof window.gtag === 'function') {
    window.gtag('event', 'generate_lead', { page_path: '/thank-you' });
  }
</script>

<section class="section section--canvas">
  <div class="wrap" style="max-width:760px">

    <span class="pill"><?= icon('check', 14, 'currentColor', 2.4) ?> Enquiry received</span>

    <h1 class="h1 mt-3">Thank you — we have your details</h1>

    <p class="lead mt-3">Someone from the clinic will call you on the number you gave us to arrange your consultation. If you sent us a message, the doctor sees it before your appointment.</p>

    <div class="card card--pad-lg mt-5">
      <h2 class="h3">What happens next</h2>
      <ul class="stack-sm mt-3">
        <li class="tick"><?= icon('check', 18, 'var(--accent)', 2.2) ?><span class="body-s"><b>We call you back</b> during clinic hours — <?= e(HOURS_DISPLAY) ?>. Enquiries sent overnight are answered the next working morning.</span></li>
        <li class="tick"><?= icon('check', 18, 'var(--accent)', 2.2) ?><span class="body-s"><b>We agree a time</b> that works, and tell you what to bring — your medical history and a list of any current medicines.</span></li>
        <li class="tick"><?= icon('check', 18, 'var(--accent)', 2.2) ?><span class="body-s"><b>You see the doctor</b> for an examination and a written plan. There is no obligation to book a date on the day.</span></li>
      </ul>
    </div>

    <div class="note mt-4">
      <p class="body-s"><b>In a hurry?</b> Message us on WhatsApp and you will usually get a faster reply than a call-back — you can send photos at the same time.</p>
      <div class="btn-row mt-3">
        <a class="btn btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Message the clinic</a>
        <a class="btn btn--outline" href="tel:<?= e(PHONE_E164) ?>" data-track="call"><?= icon('phone', 17) ?> <?= e(PHONE_DISPLAY) ?></a>
      </div>
    </div>

    <div class="mt-6">
      <h2 class="h3">While you wait</h2>
      <div class="grid grid--3 mt-3">
        <a class="card" href="/hair-transplant-cost-in-gurgaon" style="color:inherit;text-decoration:none">
          <?= icon('rupee', 22, 'var(--accent-deep)') ?>
          <p class="h4 mt-2">What it costs</p>
          <p class="meta mt-1">The factors that move the number, and what a written estimate covers.</p>
        </a>
        <a class="card" href="/hair-transplant-results-gurgaon" style="color:inherit;text-decoration:none">
          <?= icon('chart', 22, 'var(--accent-deep)') ?>
          <p class="h4 mt-2">Real results</p>
          <p class="meta mt-1">Consented before and after photographs, shot at the same angle and lighting.</p>
        </a>
        <a class="card" href="/faqs" style="color:inherit;text-decoration:none">
          <?= icon('chat', 22, 'var(--accent-deep)') ?>
          <p class="h4 mt-2">Common questions</p>
          <p class="meta mt-1">Recovery, shedding, graft counts and the things patients worry about most.</p>
        </a>
      </div>
    </div>

    <?php if ($ref !== ''): ?>
      <p class="fine mt-5">Enquiry reference: <?= e($ref) ?></p>
    <?php endif; ?>

  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
