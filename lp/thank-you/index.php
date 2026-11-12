<?php
/**
 * /lp/thank-you/ — the landing page's own thank-you page (client, 6 Nov 2026:
 * "keep the LP thank-you page, not the main website thank-you page").
 *
 * lp.js sends an LP enquiry to /enquire.php in the background (the same log,
 * email and WhatsApp alert as every site form) and opens this page when the
 * lead is stored. Its page view is the LP's conversion: the ad tags from
 * lp/lp-config.php load here, and generate_lead / Lead fire below. Without
 * JavaScript an LP form posts normally and lands on the website's /thank-you
 * instead, so no lead is lost.
 *
 * Standalone like /lp/: no site menu or footer, the LP's number only.
 * noindex, and not in the sitemap (sitemap.php lists root and /blog/ pages).
 */

declare(strict_types=1);

require_once dirname(__DIR__) . '/lp-config.php';

$telHref = 'tel:' . LP_PHONE_E164;
?>
<!DOCTYPE html>
<html lang="en-IN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank You | DenceSpot Clinic</title>
  <meta name="description" content="Thank you for your enquiry. DenceSpot Clinic will call you to arrange your consultation.">
  <meta name="robots" content="noindex, nofollow">
  <meta name="author" content="<?= e(SITE_NAME) ?>">
  <meta name="publisher" content="<?= e(SITE_NAME) ?>">
  <link rel="icon" href="/favicon.ico">
  <meta name="theme-color" content="#da061a">

  <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
  <link rel="stylesheet" href="<?= e(lp_asset('lp.css')) ?>">
<?= lp_icon_css() ?>

<?= lp_head_tags() ?>
</head>

<body>
<?= lp_body_tags() ?>

  <header>
    <div class="main-header">
      <div class="containerFull">
        <a class="logo" href="<?= e(LP_URL) ?>" aria-label="<?= e(SITE_NAME) ?>: back to the page">
          <img src="<?= e(LOGO_WEB) ?>" alt="<?= e(LOGO_ALT) ?>" width="<?= LOGO_WEB_W ?>" height="<?= LOGO_WEB_H ?>">
        </a>
        <div class="header-cta">
          <a href="<?= e($telHref) ?>" class="btn-call" data-track="call" aria-label="Call <?= e(LP_PHONE_DISPLAY) ?>">
            <i class="fa-solid fa-phone"></i> <span class="btn-label">Call Now</span>
          </a>
        </div>
      </div>
    </div>
  </header>

  <main class="ty-section">
    <div class="container">
      <div class="ty-card">
        <div class="ty-check" aria-hidden="true"><i class="fas fa-check"></i></div>
        <span class="ty-pill">Enquiry received</span>
        <h1 class="ty-title">Thank You! We Have Your Details</h1>
        <p class="ty-lead">Someone from <?= e(SITE_NAME) ?> will call you on the number you gave us to arrange your consultation.</p>

        <div class="ty-hurry">
          <p><b>In a hurry?</b> Message us on WhatsApp for a quicker reply. You can send photos of your hair at the same time.</p>
          <div class="cta-group">
            <a href="<?= e(LP_WHATSAPP_URL) ?>" class="btn-primary" rel="noopener" data-track="whatsapp"><i class="fa-brands fa-whatsapp"></i> Message on WhatsApp</a>
            <a href="<?= e($telHref) ?>" class="btn-call" data-track="call"><i class="fa-solid fa-phone"></i> <?= e(LP_PHONE_DISPLAY) ?></a>
          </div>
        </div>

        <a class="ty-back" href="<?= e(LP_URL) ?>"><i class="fas fa-arrow-left"></i> Back to the page</a>
      </div>
    </div>
  </main>

  <footer class="ty-footer">
    <div class="container">
      <div class="footer-bottom">
        <p>&copy; <?= date('Y') ?> <?= e(SITE_NAME) ?>. All Rights Reserved. · <a href="/privacy-policy">Privacy Policy</a> · <a href="/terms">Terms</a> · <a href="/medical-disclaimer">Medical Disclaimer</a></p>
      </div>
    </div>
  </footer>

  <!-- Conversion: this page opens only after /enquire.php has stored the lead. -->
  <script>
    (function () {
      window.dataLayer = window.dataLayer || [];
      window.dataLayer.push({ event: 'generate_lead', lead_source: 'lp' });
      if (typeof window.gtag === 'function') {
        window.gtag('event', 'generate_lead', { page_path: '<?= e(LP_THANK_YOU_URL) ?>' });
      }
      if (typeof window.fbq === 'function') {
        window.fbq('track', 'Lead');
      }
    }());
  </script>
  <script src="<?= e(lp_asset('lp.js')) ?>" defer></script>
</body>
</html>
