<?php
/**
 * Site footer, sticky mobile CTA, and the small amount of JS the site needs.
 * Closes <main> opened in header.php.
 */

declare(strict_types=1);

require_once __DIR__ . '/location-links.php';

// The footer is the same on every page, both clinics and both maps (client,
// 25 Oct 2026). Only the sticky mobile bar follows the page: a Rohini page
// calls and messages the Rohini clinic.
$footRohini = hp_is_rohini_page();
$footWa     = $footRohini ? LOC_DELHI_WHATSAPP_URL : WHATSAPP_URL;
$footTel    = $footRohini ? LOC_DELHI_PHONE_E164 : PHONE_E164;

// Both clinics sit in the main footer as one compact row, a small map beside
// each clinic's details (client, 25 Oct 2026: the full-width map block above
// the links made the footer too tall).
$footClinics = [
    ['name' => 'DenceSpot Clinic — Gurugram',
     'addr' => NAP_STREET . ', ' . NAP_LOCALITY . ', ' . NAP_REGION . ' ' . NAP_POSTCODE, 'landmark' => NAP_LANDMARK,
     'tel' => PHONE_E164, 'phone' => PHONE_DISPLAY, 'wa' => WHATSAPP_URL, 'maps' => MAPS_URL, 'embed' => MAP_EMBED],
    ['name' => LOC_DELHI_NAME,
     'addr' => LOC_DELHI_ADDRESS, 'landmark' => LOC_DELHI_LANDMARK,
     'tel' => LOC_DELHI_PHONE_E164, 'phone' => LOC_DELHI_PHONE_DISPLAY, 'wa' => LOC_DELHI_WHATSAPP_URL, 'maps' => LOC_DELHI_MAPS_URL, 'embed' => LOC_DELHI_MAP_EMBED],
];
?>
<?= location_links_section() ?>
</main>

<footer class="site-footer">
  <div class="wrap">

    <!-- Aligned Footer Navigation Links -->
    <div class="site-footer__nav-row">
      <div class="site-footer__brand-col">
        <a class="brand brand--plate" href="/" aria-label="<?= e(SITE_NAME) ?> — home">
          <?= site_logo('lazy') ?>
        </a>
        <p class="site-footer__brand-desc">
          Doctor-led hair restoration in Gurugram &amp; Delhi NCR. Micro-FUE, DHI, beard transplants, PRP therapy, and medical hair-loss solutions planned personally by MD dermatologists.
        </p>
        <div class="site-footer__brand-contact">
          <a href="mailto:<?= e(EMAIL) ?>" style="color:rgba(255,255,255,.75);display:inline-flex;align-items:center;gap:8px;font-size:13.5px;">
            <?= icon('mail', 15, '#10B981') ?> <?= e(EMAIL) ?>
          </a>
        </div>
      </div>

      <div class="site-footer__cols">
        <?php foreach (NAV_FOOTER as $heading => $links): ?>
        <div class="site-footer__col">
          <h2 class="site-footer__heading"><?= e($heading) ?></h2>
          <ul class="site-footer__list">
            <?php foreach ($links as $link): ?>
              <li><a href="<?= e($link['url']) ?>"><?= e($link['label']) ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="site-footer__clinics">
      <h2 class="site-footer__heading">Our clinics</h2>
      <div class="site-footer__clinic-grid">
        <?php foreach ($footClinics as $c): ?>
        <div class="site-footer__clinic">
          <div class="site-footer__clinic-map">
            <iframe title="<?= e($c['name']) ?> on Google Maps" src="<?= e($c['embed']) ?>" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
          </div>
          <div class="site-footer__clinic-body">
            <h3 class="site-footer__clinic-name"><?= e($c['name']) ?></h3>
            <p class="site-footer__clinic-line"><?= icon('pin', 15, '#10B981') ?><span><?= e($c['addr']) ?><br><small><?= e($c['landmark']) ?></small></span></p>
            <p class="site-footer__clinic-line"><?= icon('clock', 15, '#10B981') ?><span><?= e(HOURS_DISPLAY) ?> (<?= e(HOURS_NOTE) ?>)</span></p>
            <p class="site-footer__clinic-links">
              <a href="tel:<?= e($c['tel']) ?>" data-track="call"><?= icon('phone', 14) ?> <?= e($c['phone']) ?></a>
              <a href="<?= e($c['wa']) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 14) ?> WhatsApp</a>
              <a href="<?= e($c['maps']) ?>" target="_blank" rel="noopener">Directions &rarr;</a>
            </p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <p class="disclaimer"><b>Medical disclaimer:</b> <?= e(MEDICAL_DISCLAIMER) ?><?php if (!$footRohini || page_review_signed_off()): ?> <b>Medically reviewed by Dr. Nyra.</b><?php endif; ?></p>

    <div class="colophon">
      <p>&copy; <?= date('Y') ?> <?= e(SITE_NAME) ?>. All rights reserved.</p>
      <div>
        <a href="/privacy-policy">Privacy policy</a>
        <a href="/terms">Terms</a>
        <a href="/medical-disclaimer">Medical disclaimer</a>
        <a href="/sitemap.xml">Sitemap</a>
      </div>
    </div>

  </div>
</footer>

<!--
  Image lightbox.

  This markup used to live inside awards_certificates_section() in
  components.php. When that section was withheld it took the modal with it,
  leaving 44 dead openCertModal() handlers on every page — and /gallery, which
  never called that section, had never had a working lightbox at all. It lives
  here now because the JS that drives it is in this file: the two cannot be
  separated again by withholding a section.
-->
<div id="cert-modal" style="display:none; position:fixed; inset:0; z-index:9999; background:rgba(0,0,0,0.85); backdrop-filter:blur(8px); align-items:center; justify-content:center; padding:20px;" onclick="closeCertModal(event)">
  <div style="position:relative; max-width:900px; max-height:90vh; width:100%; background:#fff; border-radius:16px; overflow:hidden; box-shadow:0 25px 50px -12px rgba(0,0,0,0.5); display:flex; flex-direction:column;">
    <div style="display:flex; align-items:center; justify-content:space-between; padding:16px 24px; border-bottom:1px solid var(--line); background:#fff;">
      <h3 id="cert-modal-title" class="h4" style="margin:0;">DenceSpot Clinic</h3>
      <button type="button" onclick="closeCertModalForce()" style="background:none; border:none; font-size:24px; cursor:pointer; color:var(--ink);" aria-label="Close image">&times;</button>
    </div>
    <div style="padding:20px; text-align:center; overflow-y:auto; flex:1; background:#f9f9fb;">
      <img id="cert-modal-img" src="" alt="" style="max-width:100%; max-height:75vh; height:auto; object-fit:contain; border-radius:8px; box-shadow:0 8px 24px rgba(0,0,0,0.15);">
    </div>
  </div>
</div>
<div class="sticky-cta">
  <a class="btn btn--outline" href="tel:<?= e($footTel) ?>" data-track="call"><?= icon('phone', 17) ?> Call</a>
  <a class="btn btn--accent" href="<?= e($footWa) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 17) ?> WhatsApp</a>
</div>

<script>
(function () {
  'use strict';

  // Mobile navigation
  var toggle = document.querySelector('.nav-toggle');
  var panel  = document.getElementById('mobile-nav');

  if (toggle && panel) {
    toggle.addEventListener('click', function () {
      var open = panel.getAttribute('data-open') === 'true';
      panel.setAttribute('data-open', open ? 'false' : 'true');
      toggle.setAttribute('aria-expanded', open ? 'false' : 'true');
      toggle.setAttribute('aria-label', open ? 'Open menu' : 'Close menu');
    });
  }

  // Result photos open in the lightbox below; without JavaScript the link
  // simply opens the full-size image.
  document.addEventListener('click', function (event) {
    var link = event.target.closest('a[data-lightbox]');
    if (!link || typeof window.openCertModal !== 'function') { return; }
    event.preventDefault();
    window.openCertModal(link.getAttribute('href'), link.getAttribute('data-title') || '');
  });

  // "View more FAQs" (faq_list() with $visible). The extra questions are in
  // the page and the FAQ schema; the button only reveals them.
  document.querySelectorAll('.faq__toggle').forEach(function (btn) {
    var more = document.getElementById(btn.getAttribute('aria-controls'));
    if (!more) { return; }
    btn.hidden = false;
    btn.addEventListener('click', function () {
      var open = btn.getAttribute('aria-expanded') === 'true';
      more.hidden = open;
      btn.setAttribute('aria-expanded', open ? 'false' : 'true');
      btn.querySelector('span').textContent = open ? btn.getAttribute('data-more') : btn.getAttribute('data-less');
      if (!open) {
        var first = more.querySelector('summary');
        if (first) { first.focus(); }
      }
    });
  });

  // Conversion events. Every lead path on this site is measurable:
  // tel: clicks, WhatsApp clicks, and form submits landing on /thank-you.
  document.addEventListener('click', function (event) {
    var el = event.target.closest('[data-track]');
    if (!el || typeof window.gtag !== 'function') { return; }
    window.gtag('event', 'lead_' + el.getAttribute('data-track'), {
      page_path: window.location.pathname
    });
  });

  // Before & After Interactive Slider Logic
  document.querySelectorAll('.ba-slider').forEach(function (slider) {
    var range = slider.querySelector('.ba-slider__range');
    var after = slider.querySelector('.ba-slider__after');
    var handle = slider.querySelector('.ba-slider__handle');

    if (!range || !after || !handle) return;

    var updateSlider = function (val) {
      after.style.width = val + '%';
      handle.style.left = val + '%';
    };

    range.addEventListener('input', function (e) {
      updateSlider(e.target.value);
    });

    range.addEventListener('change', function (e) {
      updateSlider(e.target.value);
    });
  });

  // Before & After Case Tabs Switching
  document.querySelectorAll('.ba-tab-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var targetId = btn.getAttribute('data-target');

      document.querySelectorAll('.ba-tab-btn').forEach(function (b) { b.classList.remove('active'); });
      document.querySelectorAll('.ba-case-info').forEach(function (info) { info.classList.remove('active'); });
      document.querySelectorAll('.ba-slider-card').forEach(function (card) { card.classList.remove('active'); });

      btn.classList.add('active');
      var targetInfo = document.getElementById('info-' + targetId);
      var targetCard = document.getElementById('card-' + targetId);

      if (targetInfo) targetInfo.classList.add('active');
      if (targetCard) targetCard.classList.add('active');
    });
  });

  // Certificate Lightbox Modal Logic
  window.openCertModal = function (imgUrl, title) {
    var modal = document.getElementById('cert-modal');
    var modalImg = document.getElementById('cert-modal-img');
    var modalTitle = document.getElementById('cert-modal-title');
    if (!modal || !modalImg) return;
    modalImg.src = imgUrl;
    // The enlarged image is the whole point of the dialog, so it must carry a
    // description. The markup ships alt="" because the src is not known until
    // this runs; leaving it empty would announce the enlarged patient
    // photograph as decorative.
    modalImg.alt = title || 'DenceSpot Clinic';
    if (modalTitle) modalTitle.textContent = title || 'DenceSpot Clinic';
    modal.style.display = 'flex';
  };

  window.closeCertModal = function (e) {
    if (e.target.id === 'cert-modal') {
      document.getElementById('cert-modal').style.display = 'none';
    }
  };

  window.closeCertModalForce = function () {
    var modal = document.getElementById('cert-modal');
    if (modal) modal.style.display = 'none';
  };

  // Video Lightbox Modal Logic
  //
  // The modal markup only ships on a page that has a video case to open, so
  // this exits quietly everywhere else rather than throwing.
  //
  // There is no default src. It used to fall back to a hard-coded YouTube id
  // when videoUrl was empty — and that id was the Rick Astley video, so a case
  // added without a URL would have opened a music video inside a frame
  // captioned "Patient Video Testimonial" on a medical clinic's page. A
  // missing URL now opens nothing at all.
  window.openVideoModal = function (videoUrl, title) {
    var modal = document.getElementById('video-modal');
    var iframe = document.getElementById('video-modal-iframe');
    var modalTitle = document.getElementById('video-modal-title');
    if (!modal || !iframe || !videoUrl) return;
    iframe.src = videoUrl;
    if (modalTitle) modalTitle.textContent = title || 'Patient Video Testimonial';
    modal.style.display = 'flex';
  };

  window.closeVideoModal = function (e) {
    if (e.target.id === 'video-modal') {
      var iframe = document.getElementById('video-modal-iframe');
      if (iframe) iframe.src = '';
      document.getElementById('video-modal').style.display = 'none';
    }
  };

  window.closeVideoModalForce = function () {
    var modal = document.getElementById('video-modal');
    var iframe = document.getElementById('video-modal-iframe');
    if (iframe) iframe.src = '';
    if (modal) modal.style.display = 'none';
  };
}());
</script>

</body>
</html>
