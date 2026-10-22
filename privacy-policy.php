<?php
/**
 * /privacy-policy
 *
 * Not optional. The site collects a name, a phone number and free-text health
 * context through /enquire.php, which under India's DPDP Act 2023 is personal
 * data and arguably sensitive. Google Ads also refuses healthcare advertisers
 * without a reachable privacy policy, so a missing page here blocks paid
 * acquisition as well as failing compliance.
 *
 * ⚠ Reviewed for completeness, not signed off as legal advice. Have the
 * clinic's advisor confirm the grievance-officer details before launch.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Privacy policy'],
];

$page = [
    'title'       => 'Privacy Policy | ' . SITE_NAME,
    'description' => 'How DenceSpot Clinic collects, uses, stores and protects the personal information you provide when you enquire about a consultation in Gurugram.',
    'url'         => '/privacy-policy',
    'crumbs'      => $crumbs,
    'schema'      => [schema_clinic(), schema_breadcrumbs($crumbs)],
];

require __DIR__ . '/includes/header.php';
?>

<section class="section section--canvas">
  <div class="wrap">
    <div class="measure">
      <span class="pill pill--dot">Privacy</span>
      <h1 class="h1 mt-3">Privacy Policy</h1>
      <p class="lead mt-3">How we handle the information you give us. Last reviewed <?= e(REVIEWED_DATE) ?>.</p>
    </div>

    <div class="prose measure mt-6">
      <h2 class="h3">Who we are</h2>
      <p class="body mt-2"><?= e(SITE_NAME) ?> operates a single clinic at <?= e(nap_address_line()) ?>. For anything in this policy you can reach us on <a href="tel:<?= e(PHONE_E164) ?>"><?= e(PHONE_DISPLAY) ?></a> or at <a href="mailto:<?= e(EMAIL) ?>"><?= e(EMAIL) ?></a>.</p>

      <h2 class="h3 mt-6">What we collect</h2>
      <p class="body mt-2">Through the enquiry form on this website we collect only what is needed to call you back and arrange an assessment:</p>
      <ul class="ticks mt-3">
        <li class="tick">Your name</li>
        <li class="tick">Your phone number</li>
        <li class="tick">The treatment you are enquiring about</li>
        <li class="tick">Anything you choose to write in the message field</li>
        <li class="tick">The page you enquired from, and your IP address, recorded for spam prevention</li>
      </ul>
      <p class="body mt-3">The message field is free text. Please do not enter medical details you would not want held in an email — clinical history is taken properly at the consultation, not through a web form.</p>

      <h2 class="h3 mt-6">Why we collect it</h2>
      <p class="body mt-2">Solely to respond to your enquiry and arrange your consultation. We do not sell your details, we do not share them with other clinics or marketing companies, and we do not add you to a mailing list because you enquired.</p>

      <h2 class="h3 mt-6">How long we keep it</h2>
      <p class="body mt-2">Enquiries that do not become appointments are deleted once they are no longer needed to answer you. If you become a patient, your clinical record is kept separately from this website under the retention periods that apply to medical records.</p>

      <h2 class="h3 mt-6">Where it goes</h2>
      <p class="body mt-2">An enquiry is written to a file on the website's own server and emailed to the clinic's inbox. It is not passed to any third-party CRM or advertising platform.</p>

      <h2 class="h3 mt-6">Analytics and cookies</h2>
      <p class="body mt-2">We use analytics to understand which pages people find useful and which lead to enquiries. That measurement records page views and whether a lead path was used — a call button, a WhatsApp tap, or a completed form. It is not linked to your name or phone number. Your browser can block these at any time without affecting your ability to contact us or use the site.</p>

      <h2 class="h3 mt-6">WhatsApp</h2>
      <p class="body mt-2">Messaging us on WhatsApp means your message and phone number are also handled by WhatsApp under its own privacy terms, which we do not control. If you would rather not use it, call the clinic or use the enquiry form instead.</p>

      <h2 class="h3 mt-6">Your rights</h2>
      <p class="body mt-2">You can ask us what we hold about you, ask us to correct it, or ask us to delete it. Write to <a href="mailto:<?= e(EMAIL) ?>"><?= e(EMAIL) ?></a> and we will respond within a reasonable period. Deleting an enquiry does not affect any clinical record if you have been treated.</p>

      <h2 class="h3 mt-6">Grievances</h2>
      <p class="body mt-2">If you are unhappy with how your information has been handled, contact the clinic at <a href="mailto:<?= e(EMAIL) ?>"><?= e(EMAIL) ?></a> or <a href="tel:<?= e(PHONE_E164) ?>"><?= e(PHONE_DISPLAY) ?></a>, marking your message for the attention of the grievance officer.</p>

      <h2 class="h3 mt-6">Changes</h2>
      <p class="body mt-2">If this policy changes materially, the revised date at the top of this page changes with it.</p>

      <p class="note note--tint mt-6">This page describes how the website handles your data. It is not medical advice and does not replace the consent process that happens at the clinic before any treatment.</p>
    </div>
  </div>
</section>

<?= cta_band(
    'Ready to Talk to the Doctor?',
    'Leave a name and a phone number and the clinic will call you back. Your details are used only to arrange your consultation.',
    'privacy-policy'
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
