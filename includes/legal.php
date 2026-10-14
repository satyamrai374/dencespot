<?php
/**
 * Shared pieces for the three legal pages: /medical-disclaimer (Disclaimer),
 * /terms (Terms & Conditions) and /privacy-policy.
 *
 * Rewritten October 2026 against what the site's code actually does and
 * against the instruments in force on that date:
 *
 *  - IMC (Professional Conduct, Etiquette and Ethics) Regulations, 2002 — the
 *    operative code; the NMC's own 2023 conduct regulations are in abeyance.
 *  - NMC Guidelines on Ethical Advertising and Public Communication, Public
 *    Notice R-13014/01/2024-Ethics, 06.10.2026 (in force immediately).
 *  - Telemedicine Practice Guidelines, 2020 (Appendix 5 to the 2002 Code).
 *  - IT Act 2000 s.43A and the SPDI Rules 2011 — the privacy law in force now.
 *  - DPDP Act 2023 and DPDP Rules 2025 (notified 13.11.2025) — main duties
 *    from about 13.05.2027, so the pages never call them "enforceable" today.
 *  - Consumer Protection Act, 2019.
 *
 * Every statement about practice (retention, recipients, security) must stay
 * true of the code: if enquire.php, the form or a third-party embed changes,
 * these pages change with it.
 */

declare(strict_types=1);

/**
 * A fact the clinic has not supplied yet, marked so it cannot be missed on
 * review. Fill the matching constant in config.php to replace it.
 */
function legal_ph(string $what): string
{
    return '<span style="display:inline-block;padding:0 6px;border:1px dashed #C98A12;border-radius:4px;background:#FFF6E0;color:#7A4E00;font-weight:600">['
         . e($what) . ']</span>';
}

/** The value if configured, otherwise a visible placeholder. */
function legal_value(?string $value, string $placeholder): string
{
    return ($value !== null && $value !== '') ? e($value) : legal_ph($placeholder);
}

/** "Last updated" line. */
function legal_updated(): string
{
    return '<p class="meta mt-2">Last updated: ' . e(LEGAL_UPDATED) . '</p>';
}

/**
 * Doctors at the clinic with the registration particulars NMC Explanation IV
 * requires (name, qualifications, registration status, SMR/NMR number).
 */
function legal_doctor_list(): string
{
    ob_start(); ?>
<ul class="ticks mt-3">
  <?php foreach (listed_doctors() as $doc): ?>
    <li class="tick"><span>
      <strong><?= e($doc['name']) ?></strong> —
      <?= legal_value($doc['quals'] ?? null, 'recognised medical qualification') ?>.
      <?php if (($reg = doctor_registration($doc)) !== ''): ?><?= $reg ?>.<?php endif; ?>
      <?php if (!empty($doc['clinics'])): ?>Consults at: <?= e($doc['clinics']) ?>.<?php endif; ?>
    </span></li>
  <?php endforeach; ?>
</ul>
<?php if (doctors_have_registration(listed_doctors())): ?>
<p class="body mt-3">You can check a doctor's registration on the National Medical Commission's <a href="https://www.nmc.org.in/information-desk/indian-medical-register/" rel="noopener" target="_blank">Indian Medical Register</a> or the <a href="https://nmr-nmc.abdm.gov.in/" rel="noopener" target="_blank">National Medical Register</a>.</p>
<?php endif; ?>
<?php
    return (string) ob_get_clean();
}

/** Contact block used at the foot of all three pages. */
function legal_contact(): string
{
    ob_start(); ?>
<div class="card card--pad-lg mt-3" style="background:#fff;border:1px solid var(--line)">
  <p class="h4"><?= e(SITE_NAME) ?></p>
  <ul class="stack-sm mt-3" style="list-style:none;padding:0">
    <li><strong>Gurugram:</strong> <?= e(nap_address_line()) ?> · <a href="tel:<?= e(PHONE_E164) ?>"><?= e(PHONE_DISPLAY) ?></a></li>
    <li><strong>Delhi:</strong> <?= e(LOC_DELHI_LANDMARK) ?> · <a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></li>
    <li><strong>Email:</strong> <a href="mailto:<?= e(EMAIL) ?>"><?= e(EMAIL) ?></a></li>
    <li><strong>Hours:</strong> <?= e(HOURS_DISPLAY) ?> (<?= e(HOURS_NOTE) ?>)</li>
  </ul>
</div>
<?php
    return (string) ob_get_clean();
}
