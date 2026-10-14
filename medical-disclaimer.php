<?php
/**
 * /medical-disclaimer — Disclaimer.
 *
 * Rewritten October 2026 (see includes/legal.php for the instruments relied
 * on). Changes from the previous version, and why:
 *
 *  - It cited the NMC's 2023 conduct regulations, which are in abeyance; it now
 *    cites the IMC Regulations 2002 and the NMC Guidelines of 06.10.2026.
 *  - It said every photograph on the site was an unedited photograph of a
 *    consenting patient. Some images are AI-generated, and two gallery files
 *    carry a beauty-filter app's name, so that statement could not stand.
 *  - It now carries the AI-image policy the clinic asked for, the doctors'
 *    registration particulars (NMC Explanation IV) and the emergency notice.
 *  - "Full compliance" claims and promotional phrasing ("advanced
 *    micro-surgical techniques maximize graft survival") are gone.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';
require_once __DIR__ . '/includes/legal.php';

$crumbs = [['name' => 'Home', 'url' => '/'], ['name' => 'Disclaimer']];

$page = [
    'title'       => 'Medical Disclaimer & AI Image Policy | ' . SITE_NAME,
    'description' => 'DenceSpot Clinic disclaimer: general health information only, outcomes vary, how AI-generated images are used, emergencies and doctors’ registration.',
    'url'         => '/medical-disclaimer',
    'crumbs'      => $crumbs,
    'schema'      => [schema_clinic(), schema_breadcrumbs($crumbs)],
];

require __DIR__ . '/includes/header.php';
?>

<section class="section section--canvas">
  <div class="wrap">
    <div class="measure">
      <span class="pill pill--dot">Legal</span>
      <h1 class="h1 mt-3">Disclaimer</h1>
      <p class="lead mt-3">Please read this before relying on anything on this website.</p>
      <?= legal_updated() ?>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="wrap">
    <div class="prose measure">

      <h2 class="h3" style="margin-top:0">1. General health information, not medical advice</h2>
      <p class="body mt-2">The content on <?= e(parse_url(SITE_ORIGIN, PHP_URL_HOST) ?: SITE_ORIGIN) ?> — treatment pages, articles, FAQs, cost information and tools such as the graft calculator — is general health information. It is not a diagnosis, a prescription or a treatment plan for you, and reading it does not create a doctor–patient relationship.</p>
      <p class="body mt-2">Whether a treatment is suitable for you, and how it would be planned, can only be decided after a registered medical practitioner has examined you and reviewed your medical history.</p>

      <h2 class="h3 mt-6">2. Outcomes differ from person to person</h2>
      <p class="body mt-2">Hair loss and its treatment vary between people. What can be achieved depends on your pattern of hair loss, donor area, hair characteristics, general health, medicines and aftercare. No outcome, density, hairline, timeline or cure is promised on this website or by the clinic.</p>
      <p class="body mt-2">Every medical and surgical procedure carries risks. Your doctor will explain the risks, benefits and alternatives that apply to you before you decide, and treatment proceeds only with your informed written consent at the clinic.</p>

      <h2 class="h3 mt-6">3. Not for emergencies</h2>
      <p class="body mt-2">This website, its forms, email and WhatsApp are not monitored for emergencies. If you have severe pain, heavy bleeding, signs of infection, an allergic reaction or any other urgent problem — including after a procedure — call <strong>112</strong> or go to the nearest hospital emergency department.</p>

      <h2 class="h3 mt-6">4. Messages, photographs and remote opinions</h2>
      <p class="body mt-2">If you contact the clinic by form, phone, email or WhatsApp, your details are used to respond to you and to arrange a consultation. If you send photographs, a registered medical practitioner may tell you whether an in-person consultation is likely to be useful. That is a teleconsultation under the Telemedicine Practice Guidelines, 2020: it is limited by what photographs can show, it is not clearance for surgery, and the messages and photographs are kept as part of your clinical record. How they are handled is explained in our <a href="/privacy-policy">Privacy Policy</a>.</p>

      <h2 class="h3 mt-6">5. Medicines and products</h2>
      <p class="body mt-2">Medicines mentioned on this website, such as minoxidil or finasteride, are prescription medicines. Do not start, stop or change any medicine without a prescription and advice from a registered medical practitioner. Nothing on this website endorses any medicine, product, device or brand.</p>

      <h2 class="h3 mt-6" id="images">6. Images on this website, including AI-generated images</h2>
      <p class="body mt-2"><strong>Some images on this website may be AI-generated.</strong> These are illustrations only — for example diagrams of hair follicles or hair-loss patterns, still-life photographs of instruments, and decorative images.</p>
      <ul class="ticks mt-3">
        <li class="tick"><span>Clause 7.2 of the National Medical Commission’s Guidelines on Ethical Advertising and Public Communication (06.10.2026) prohibits AI-generated promotional campaigns and requires any AI-generated content to carry a mark stating that it is AI-generated. Every AI-generated image on the homepage is marked <strong>“AI-generated”</strong> where it appears, and we are applying the same review to every other page.</span></li>
        <li class="tick"><span>AI-generated images are used only as illustrations. They are not used to show actual patients, doctors, our premises or any treatment outcome, and we do not put patients’ photographs or information into AI tools. Any older image that does not meet this standard is being replaced as each page is reviewed.</span></li>
        <li class="tick"><span>Under the same Guidelines, before-and-after photographs and patient testimonials may not be used to promote treatment, even with the patient’s consent. We are reviewing every page of this website against the Guidelines, starting with the homepage.</span></li>
      </ul>
      <p class="body mt-3">If you see an image you believe is AI-generated but not marked, or content you believe does not follow these rules, please tell us at <a href="mailto:<?= e(EMAIL) ?>"><?= e(EMAIL) ?></a> and we will review it.</p>

      <h2 class="h3 mt-6" id="doctors">7. Our doctors and their registration</h2>
      <p class="body mt-2">Consultations and procedures at the clinic are carried out by registered medical practitioners. Their particulars are:</p>
      <?= legal_doctor_list() ?>

      <h2 class="h3 mt-6">8. Fees and estimates</h2>
      <p class="body mt-2">Cost information on this website is general. Your charges are confirmed in an itemised written estimate after your assessment and before any treatment begins.</p>

      <h2 class="h3 mt-6">9. Links to other websites</h2>
      <p class="body mt-2">Links to other websites — for example Google Maps, WhatsApp or the National Medical Commission’s register — are provided for convenience. We do not control those websites and are not responsible for their content or their privacy practices.</p>

      <h2 class="h3 mt-6">10. Accuracy and updates</h2>
      <p class="body mt-2">We review the content of this website from time to time, but medical knowledge changes and a page may not reflect the latest evidence on the day you read it. If you notice an error, please let us know.</p>

      <h2 class="h3 mt-6">11. Rules we are applying to this website</h2>
      <p class="body mt-2">We are reviewing this website against the Indian Medical Council (Professional Conduct, Etiquette and Ethics) Regulations, 2002; the National Medical Commission’s Guidelines on Ethical Advertising and Public Communication by Hospitals/Medical Institutions and Registered Medical Practitioners (Public Notice No. R-13014/01/2024-Ethics, 06.10.2026); the Telemedicine Practice Guidelines, 2020; and the Consumer Protection Act, 2019. Every page of the website was reviewed against them in October 2026, and pages are checked again whenever they change. See also our <a href="/terms">Terms &amp; Conditions</a> and <a href="/privacy-policy">Privacy Policy</a>.</p>

      <h2 class="h3 mt-6">12. Contact</h2>
      <?= legal_contact() ?>

    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
