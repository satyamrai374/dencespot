<?php
/**
 * /terms — Terms & Conditions.
 *
 * Rewritten October 2026 (see includes/legal.php for the instruments relied
 * on). Changes from the previous "Terms of Use", and why:
 *
 *  - It said "By submitting your personal data, you provide consent" — consent
 *    bundled into terms. Consent is now asked for separately on each form, by
 *    an unticked box, and these terms say so.
 *  - It claimed patient before-and-after photographs as the clinic's
 *    intellectual property. Patients' images are their personal data, and the
 *    NMC Guidelines of 06.10.2026 bar using them for promotion.
 *  - It named no legal entity; a visible placeholder now asks for one.
 *  - Consumer-law rights and the State Medical Council route are stated, so the
 *    jurisdiction clause cannot be read as taking them away.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';
require_once __DIR__ . '/includes/legal.php';

$crumbs = [['name' => 'Home', 'url' => '/'], ['name' => 'Terms & Conditions']];

$page = [
    'title'       => 'Terms & Conditions | ' . SITE_NAME,
    'description' => 'Terms & Conditions for using the DenceSpot Clinic website, making enquiries and appointment requests, fees and estimates, and your rights.',
    'url'         => '/terms',
    'crumbs'      => $crumbs,
    'schema'      => [schema_clinic(), schema_breadcrumbs($crumbs)],
];

require __DIR__ . '/includes/header.php';
?>

<section class="section section--canvas">
  <div class="wrap">
    <div class="measure">
      <span class="pill pill--dot">Legal</span>
      <h1 class="h1 mt-3">Terms &amp; Conditions</h1>
      <p class="lead mt-3">The terms for using this website and for making enquiries and appointment requests.</p>
      <?= legal_updated() ?>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="wrap">
    <div class="prose measure">

      <h2 class="h3" style="margin-top:0">1. About these terms</h2>
      <p class="body mt-2">This website, <?= e(SITE_ORIGIN) ?>, is operated by <?= legal_value(LEGAL_ENTITY_NAME, 'legal name of the entity that runs the clinic') ?> (“<?= e(SITE_NAME) ?>”, “we”, “us”), which runs the clinic at <?= e(nap_address_line()) ?> and the clinic in <?= e(LOC_DELHI_LANDMARK) ?>.</p>
      <p class="body mt-2">By using this website you agree to these terms. If you do not agree, please do not use the website. These terms should be read with our <a href="/medical-disclaimer">Disclaimer</a> and <a href="/privacy-policy">Privacy Policy</a>.</p>

      <h2 class="h3 mt-6">2. Using this website</h2>
      <p class="body mt-2">The website provides general information about the clinic and the treatments it offers. It is not medical advice and does not replace a consultation with a registered medical practitioner. Enquiry forms are for adults aged 18 or over; an enquiry about a person under 18 should be made by their parent or guardian.</p>

      <h2 class="h3 mt-6">3. Enquiries and appointment requests</h2>
      <ul class="ticks mt-3">
        <li class="tick"><span>A form, phone call, email or WhatsApp message is a request for information or for an appointment. An appointment is confirmed only when the clinic confirms it to you.</span></li>
        <li class="tick"><span>Making an enquiry places you under no obligation to book a consultation or to have any treatment.</span></li>
        <li class="tick"><span>Please give accurate contact details so the clinic can reach you.</span></li>
        <li class="tick"><span>Enquiry channels are not monitored for emergencies. In an emergency call <strong>112</strong> or go to the nearest hospital emergency department.</span></li>
      </ul>

      <h2 class="h3 mt-6">4. Consultations and treatment</h2>
      <p class="body mt-2">Treatment is offered only after an in-person examination by a registered medical practitioner, and is carried out only with your informed written consent given at the clinic. The advice you receive at your consultation and the consent documents you sign — not this website — set out the specific risks, benefits, alternatives and aftercare for your treatment. No outcome is promised.</p>

      <h2 class="h3 mt-6">5. Fees, estimates and payment</h2>
      <p class="body mt-2">Any cost information on this website is general. Your fees, and any payment options available to you, are confirmed in an itemised written estimate after your assessment and before treatment begins. Cancellation, rescheduling and refund terms, where they apply, are the ones given to you in writing when you book.</p>

      <h2 class="h3 mt-6">6. Your responsibilities</h2>
      <p class="body mt-2">When using this website you agree not to:</p>
      <ul class="ticks mt-3">
        <li class="tick"><span>submit false information or enquire in someone else’s name without their permission;</span></li>
        <li class="tick"><span>interfere with the website’s operation or security, or try to gain unauthorised access to it;</span></li>
        <li class="tick"><span>copy or republish the website’s content except as allowed in section 7.</span></li>
      </ul>

      <h2 class="h3 mt-6">7. Content and intellectual property</h2>
      <p class="body mt-2">The text, design, logos and illustrations on this website belong to <?= e(SITE_NAME) ?> or are used with permission. You may view and print pages for your own personal, non-commercial use. Any other copying or republication needs our written permission.</p>
      <p class="body mt-2">Some images on this website are AI-generated illustrations; they are marked “AI-generated” where they appear, as explained in our <a href="/medical-disclaimer#images">Disclaimer</a>. Patients’ photographs and information are their personal data, handled as described in the Privacy Policy. Under the National Medical Commission’s Guidelines of 06.10.2026 they may not be used to promote treatment, and we are removing such material from older pages of this website.</p>

      <h2 class="h3 mt-6">8. Third-party services</h2>
      <p class="body mt-2">The website links to or uses services run by other companies — for example WhatsApp, Google Maps, Google Fonts and social media pages. Your use of those services is governed by their own terms and privacy policies, and we cannot control their content or availability.</p>

      <h2 class="h3 mt-6">9. Privacy and consent</h2>
      <p class="body mt-2">Accepting these terms does not mean you consent to us using your personal data. Where we rely on consent, we ask for it separately — for example with an unticked consent box on each enquiry form — and you can withdraw it at any time, as explained in our <a href="/privacy-policy">Privacy Policy</a>.</p>

      <h2 class="h3 mt-6">10. Availability and accuracy</h2>
      <p class="body mt-2">We aim to keep the website available and its information accurate, but pages may occasionally be unavailable or contain errors. We may update, change or remove any part of the website at any time.</p>

      <h2 class="h3 mt-6">11. Limitation of liability</h2>
      <p class="body mt-2">To the extent the law allows, <?= e(SITE_NAME) ?> is not liable for any loss arising from relying on general information on this website without a consultation, or from the website being unavailable. Nothing in these terms excludes or limits any liability that cannot be excluded or limited under Indian law — including liability for negligence in the medical care we provide — or your rights as a consumer under the Consumer Protection Act, 2019.</p>

      <h2 class="h3 mt-6">12. Complaints</h2>
      <p class="body mt-2">If you are unhappy with any aspect of our service or this website, please contact us using the details below so that we can try to resolve it. Concerns about personal data go to our Grievance Officer, named in the <a href="/privacy-policy#grievance-officer">Privacy Policy</a>. You may also raise a concern about a doctor’s professional conduct with the State Medical Council with which the doctor is registered.</p>

      <h2 class="h3 mt-6">13. Governing law and jurisdiction</h2>
      <p class="body mt-2">These terms are governed by the laws of India. Subject to your right to approach a Consumer Commission under the Consumer Protection Act, 2019, the courts at Gurugram, Haryana have jurisdiction over any dispute arising from the use of this website.</p>

      <h2 class="h3 mt-6">14. Changes to these terms</h2>
      <p class="body mt-2">We may update these terms. The date at the top of this page shows when they last changed, and the version published here applies from that date.</p>

      <h2 class="h3 mt-6">15. Contact</h2>
      <?= legal_contact() ?>

    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
