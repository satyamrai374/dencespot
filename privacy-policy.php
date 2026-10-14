<?php
/**
 * /privacy-policy — Privacy Policy.
 *
 * Rewritten October 2026 against the site's actual data flows (see
 * includes/legal.php for the instruments relied on). Statements from the
 * previous version that were not true of the code, and are gone:
 *
 *  - consent "indicated by ticking the consent checkbox" — the box was
 *    pre-ticked and enquire.php logged consent regardless (both fixed);
 *  - enquiries "automatically purged within 90 days" — no purge existed.
 *    enquire.php now deletes log entries older than ENQUIRY_RETENTION_DAYS
 *    (365), which is the period stated here;
 *  - IP addresses "collected exclusively for automated rate limiting" — there
 *    is no rate limiting; the IP is stored with the enquiry;
 *  - "encrypted communication logs" — the log is plain JSON, kept outside
 *    public web access (.htaccess) but not encrypted;
 *  - "never shared with third parties" — every enquiry is emailed to the
 *    clinic's Gmail inbox and sent to the clinic's WhatsApp via a gateway;
 *  - DPDP rights described as enforceable now — the Act's main duties
 *    commence about 13 May 2027; the SPDI Rules 2011 apply until then.
 *
 * Keep this page in step with enquire.php, the enquiry forms and any
 * third-party script or embed added to the site.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';
require_once __DIR__ . '/includes/legal.php';

$crumbs = [['name' => 'Home', 'url' => '/'], ['name' => 'Privacy Policy']];

$page = [
    'title'       => 'Privacy Policy | ' . SITE_NAME,
    'description' => 'How DenceSpot Clinic collects, uses, shares, keeps and protects personal and health information, who receives it, and how to exercise your rights.',
    'url'         => '/privacy-policy',
    'crumbs'      => $crumbs,
    'schema'      => [schema_clinic(), schema_breadcrumbs($crumbs)],
];

require __DIR__ . '/includes/header.php';
?>

<section class="section section--canvas">
  <div class="wrap">
    <div class="measure">
      <span class="pill pill--dot">Legal</span>
      <h1 class="h1 mt-3">Privacy Policy</h1>
      <p class="lead mt-3">How <?= e(SITE_NAME) ?> collects, uses, shares, keeps and protects your personal information — including health information — and how you can exercise your rights.</p>
      <?= legal_updated() ?>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="wrap">
    <div class="prose measure">

      <div class="note note--tint">
        <p class="body"><strong>In brief.</strong> We use your details to respond to your enquiry and to care for you if you become a patient. We do not sell your data or use it for advertising. Website enquiries are kept for 12 months and then deleted; clinical records are kept for at least 3 years. Enquiries reach the clinic by email (Google) and WhatsApp (Meta). You can ask to see, correct or delete your information, or withdraw your consent, at any time.</p>
      </div>

      <h2 class="h3 mt-6">1. Who we are</h2>
      <p class="body mt-2">This policy is issued by <?= legal_value(LEGAL_ENTITY_NAME, 'legal name of the entity that runs the clinic') ?>, which runs <?= e(SITE_NAME) ?> at <?= e(nap_address_line()) ?> and the clinic in <?= e(LOC_DELHI_LANDMARK) ?> (“we”, “us”). It covers this website, our enquiry forms, and our phone, email and WhatsApp communications with you, as well as the clinical records we keep if you become a patient.</p>

      <h2 class="h3 mt-6">2. The law that applies</h2>
      <p class="body mt-2">Today, personal data is protected by section 43A of the Information Technology Act, 2000 and the Information Technology (Reasonable Security Practices and Procedures and Sensitive Personal Data or Information) Rules, 2011. Under those Rules, health conditions and medical records are <em>sensitive personal data</em>. Medical confidentiality is also governed by the Indian Medical Council (Professional Conduct, Etiquette and Ethics) Regulations, 2002, and use of patient information in advertising by the National Medical Commission’s Guidelines on Ethical Advertising and Public Communication (06.10.2026).</p>
      <p class="body mt-2">The Digital Personal Data Protection Act, 2023 and the Digital Personal Data Protection Rules, 2025 were notified on 13 November 2025. Most of their obligations relevant to us — including your rights under the Act and complaints to the Data Protection Board of India — come into force on or about <strong><?= e(DPDP_MAIN_DATE) ?></strong>. We have written this policy to meet that standard now, and we will update it if the commencement dates change.</p>

      <h2 class="h3 mt-6">3. What we collect</h2>
      <p class="body mt-2"><strong>When you send an enquiry form:</strong> your full name, phone number, the treatment you are interested in, a preferred clinic and date (optional), anything you choose to write in the message box (optional — it may include health information), and your consent. With each enquiry our website also records the date and time, the page you used, and your IP address.</p>
      <p class="body mt-2"><strong>When you contact us by phone, email or WhatsApp:</strong> your number or email address, your messages, and any photographs you choose to send — for example of your scalp. Photographs and health details are sensitive personal data.</p>
      <p class="body mt-2"><strong>If you become a patient:</strong> your medical history, examination findings, clinical photographs taken for your record, prescriptions, consent forms and billing details.</p>
      <p class="body mt-2"><strong>When you browse this website:</strong> we do not set cookies or use analytics or advertising trackers. Our hosting provider keeps standard server logs (such as IP address, time, page requested and browser type) to operate and secure the website. Some third-party services on certain pages receive technical data — see section 10.</p>
      <p class="body mt-2">You do not have to give us any information. If you do not, we may not be able to respond to your enquiry or provide care.</p>

      <h2 class="h3 mt-6">4. How we use it</h2>
      <ul class="ticks mt-3">
        <li class="tick"><span>To respond to your enquiry, call or message you back, and arrange a consultation.</span></li>
        <li class="tick"><span>If you send photographs, to tell you whether an in-person consultation is likely to be useful.</span></li>
        <li class="tick"><span>If you become a patient, to provide care, keep your clinical record, and issue prescriptions, estimates and bills.</span></li>
        <li class="tick"><span>To meet our legal obligations, including keeping medical records and responding to lawful requests.</span></li>
        <li class="tick"><span>To keep the website secure and filter out spam.</span></li>
      </ul>
      <p class="body mt-3"><strong>What we do not do.</strong> We do not sell, rent or trade your personal data. We do not use enquiry details for marketing; if we ever wish to send you reminders or other messages beyond your enquiry, we will ask for your separate consent first. We do not put patients’ photographs or information into AI tools. Under the National Medical Commission’s Guidelines of 06.10.2026, patients’ photographs, records and stories may not be used to promote treatment, even with consent; we are removing such material from older pages of this website, and we will not add new material of this kind.</p>

      <h2 class="h3 mt-6">5. Consent</h2>
      <p class="body mt-2">Our enquiry forms ask for your consent with a box that is <strong>never</strong> pre-ticked; a form cannot be sent unless you tick it yourself. When you call, email or message us on WhatsApp, we use the details you give us to reply to you.</p>
      <p class="body mt-2">You can withdraw your consent at any time, as easily as you gave it — for example by sending “withdraw consent” or “delete my enquiry” to <a href="mailto:<?= e(EMAIL) ?>"><?= e(EMAIL) ?></a> or to our WhatsApp number. Withdrawal does not affect what we lawfully did before it. After withdrawal we will stop contacting you about your enquiry, but we must keep clinical records for the period the law requires (section 8).</p>

      <h2 class="h3 mt-6">6. Who can see your information</h2>
      <ul class="ticks mt-3">
        <li class="tick"><span><strong>Our doctors and authorised clinic staff</strong>, only as far as they need it to respond to you or care for you.</span></li>
        <li class="tick"><span><strong>Our website host</strong> (Hostinger), which stores this website and the enquiry record.</span></li>
        <li class="tick"><span><strong>Zoho and Google</strong>, which provide the email services (Zoho Mail, Gmail) that send and receive enquiries. Each enquiry is emailed to the clinic and to the agency that runs this website.</span></li>
        <li class="tick"><span><strong>WhatsApp (Meta Platforms)</strong>, which carries our WhatsApp conversations with you. A website enquiry may also be sent as a WhatsApp notification to the clinic’s own number through a messaging gateway.</span></li>
        <li class="tick"><span><strong>The agency that runs this website for us</strong>, which maintains it and receives a copy of each website enquiry so that it reaches the clinic. It uses your details only for that purpose, on the clinic’s instructions.</span></li>
        <li class="tick"><span><strong>Laboratories, pharmacies or other healthcare providers</strong>, when needed for your care.</span></li>
        <li class="tick"><span><strong>Authorities</strong>, when the law requires it — for example under a court order — or where disclosure is permitted by the Indian Medical Council Regulations to protect a person from a serious and identified risk.</span></li>
      </ul>
      <p class="body mt-3">We do not share your information with advertisers or data brokers.</p>

      <h2 class="h3 mt-6">7. Transfers outside India</h2>
      <p class="body mt-2">Some of the service providers above — including Google, Meta and our hosting provider — may store or process data outside India. We use them only where needed to provide the service you asked for or with your consent, and only providers that maintain a comparable level of data protection.</p>

      <h2 class="h3 mt-6">8. How long we keep it</h2>
      <ul class="ticks mt-3">
        <li class="tick"><span><strong>Website enquiries:</strong> 12 months from the date of the enquiry. Our website deletes enquiry records once they are more than 12 months old (the deletion runs each time a new enquiry is received), and the clinic deletes the copies in its email and WhatsApp on the same schedule — unless you have become a patient.</span></li>
        <li class="tick"><span><strong>Clinical records</strong> — including clinical photographs, and the messages and photographs from any consultation held over WhatsApp or another remote channel: at least 3 years from the start of treatment (the period the Indian Medical Council Regulations set for in-patient records, which we apply to all patients), and longer where needed to deal with a legal claim or where another law requires it.</span></li>
        <li class="tick"><span><strong>Server logs</strong> kept by our hosting provider: for the period its policies and Indian law require for security purposes.</span></li>
      </ul>

      <h2 class="h3 mt-6">9. How we protect it</h2>
      <ul class="ticks mt-3">
        <li class="tick"><span>All pages of this website are served over HTTPS, so information you send through the website is encrypted in transit.</span></li>
        <li class="tick"><span>The enquiry record is stored on our server where it cannot be reached through the website.</span></li>
        <li class="tick"><span>Access to the clinic’s email, WhatsApp and records is limited to authorised staff.</span></li>
      </ul>
      <p class="body mt-3">No system is completely secure. If a security incident affects personal data, we will report it as the law requires — including to CERT-In — and, once the DPDP Rules are in force, we will inform you and the Data Protection Board of India.</p>

      <h2 class="h3 mt-6">10. Cookies and third-party services</h2>
      <p class="body mt-2">This website does not set its own cookies and does not use analytics or advertising trackers. Some third-party services used on the site receive technical information, such as your IP address, when a page loads:</p>
      <ul class="ticks mt-3">
        <li class="tick"><span><strong>Google Fonts</strong> (fonts used on every page).</span></li>
        <li class="tick"><span><strong>Google Maps</strong> (map embeds on some pages), which may set its own cookies.</span></li>
        <li class="tick"><span><strong>WhatsApp</strong>, when you click a WhatsApp link.</span></li>
      </ul>
      <p class="body mt-3">Each service handles that information under its own privacy policy. If we add analytics or advertising tools in future, we will update this policy first and ask for your consent where the law requires.</p>

      <h2 class="h3 mt-6">11. Your rights</h2>
      <p class="body mt-2">You can ask us to:</p>
      <ul class="ticks mt-3">
        <li class="tick"><span>show you the information we hold about you, and tell you who we have shared it with;</span></li>
        <li class="tick"><span>correct, complete or update it;</span></li>
        <li class="tick"><span>delete it, except where we must keep it by law;</span></li>
        <li class="tick"><span>stop using it, by withdrawing your consent;</span></li>
        <li class="tick"><span>record a nominee who may exercise these rights for you in the event of your death or incapacity.</span></li>
      </ul>
      <p class="body mt-3">Reviewing and correcting your information and withdrawing consent are rights under the SPDI Rules today. The full set of rights above becomes legally enforceable under the DPDP Act on or about <?= e(DPDP_MAIN_DATE) ?>; we already honour them.</p>
      <p class="body mt-2"><strong>How to make a request:</strong> email <a href="mailto:<?= e(EMAIL) ?>"><?= e(EMAIL) ?></a>, send a WhatsApp message, call us, or ask at the clinic. Tell us the phone number you used to contact us (or your patient file number) so we can find your information; we may ask you to confirm your identity. We reply within one month. If you are a patient, copies of your medical records are provided within 72 hours of your request.</p>

      <h2 class="h3 mt-6">12. Children</h2>
      <p class="body mt-2">Our enquiry forms and WhatsApp opinions are for adults aged 18 or over. An enquiry about a person under 18 should come from their parent or guardian, and minors are seen with a parent or guardian present. We do not track children or direct advertising at them.</p>

      <h2 class="h3 mt-6" id="grievance-officer">13. Grievance Officer</h2>
      <p class="body mt-2">For any question or complaint about how we handle personal data, contact our Grievance Officer:</p>
      <div class="card card--pad-lg mt-3">
        <p class="h4"><?= legal_value(DPDP_OFFICER_NAME, 'name of the Grievance Officer') ?></p>
        <p class="meta mt-1"><?= e(DPDP_OFFICER_TITLE) ?>, <?= e(SITE_NAME) ?></p>
        <ul class="stack-sm mt-3" style="list-style:none;padding:0">
          <li><strong>Email:</strong> <a href="mailto:<?= e(DPDP_OFFICER_EMAIL) ?>"><?= e(DPDP_OFFICER_EMAIL) ?></a></li>
          <li><strong>Phone:</strong> <a href="tel:<?= e(PHONE_E164) ?>"><?= e(DPDP_OFFICER_PHONE) ?></a></li>
          <li><strong>Address:</strong> <?= e(DPDP_OFFICER_ADDRESS) ?></li>
        </ul>
      </div>
      <p class="body mt-3">We resolve grievances within one month of receiving them. Once the DPDP Act’s provisions on complaints are in force (on or about <?= e(DPDP_MAIN_DATE) ?>), if you are not satisfied with our response, you may complain to the Data Protection Board of India under the DPDP Act.</p>

      <h2 class="h3 mt-6">14. Changes to this policy</h2>
      <p class="body mt-2">We will update this policy when our practices or the law change — including as the DPDP Rules come into force. The date at the top of this page shows the latest version.</p>

      <h2 class="h3 mt-6">15. Contact</h2>
      <?= legal_contact() ?>

    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
