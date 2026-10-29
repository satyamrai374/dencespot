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
     'tel' => PHONE_E164, 'phone' => PHONE_DISPLAY, 'wa' => WHATSAPP_URL, 'maps' => MAPS_URL, 'embed' => MAP_EMBED,
     'hours' => HOURS_DISPLAY, 'hours_note' => HOURS_NOTE],
    ['name' => LOC_DELHI_NAME,
     'addr' => LOC_DELHI_ADDRESS, 'landmark' => LOC_DELHI_LANDMARK,
     'tel' => LOC_DELHI_PHONE_E164, 'phone' => LOC_DELHI_PHONE_DISPLAY, 'wa' => LOC_DELHI_WHATSAPP_URL, 'maps' => LOC_DELHI_MAPS_URL, 'embed' => LOC_DELHI_MAP_EMBED,
     'hours' => LOC_DELHI_HOURS_DISPLAY, 'hours_note' => LOC_DELHI_HOURS_NOTE],
];

// Just above the footer: the same-city treatment links, except on a Delhi
// pillar, which asks with $page['service_areas'] for its "Serving Patients
// Across Delhi" block instead (true for hair transplant, or a key of
// DELHI_AREA_ANCHORS such as 'beard'), and the Delhi area pages, which set
// $page['location_links'] => false and show neither (client, 27 Oct 2026:
// the area pages link only to their pillar).
if (!empty($page['service_areas'])) {
    require_once __DIR__ . '/delhi-service-areas.php';
    $aboveFooter = delhi_service_areas_section(is_string($page['service_areas']) ? $page['service_areas'] : 'hair');
} elseif (($page['location_links'] ?? true) === false) {
    $aboveFooter = '';
} else {
    $aboveFooter = location_links_section();
    // A Gurgaon treatment page is the parent of its Gurugram area pages
    // (includes/gurgaon-service-areas.php, 28 Oct 2026): their list sits just
    // above the footer, below the same-city treatment links, which the
    // Gurgaon pages keep so no treatment page loses its links.
    require_once __DIR__ . '/gurgaon-service-areas.php';
    $gurgaonKey = gurgaon_treatment_for_parent((string) ($page['url'] ?? ''));
    if ($gurgaonKey !== null) {
        $aboveFooter .= gurgaon_service_areas_section($gurgaonKey);
    }
}
?>
<?= $aboveFooter ?>
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
            <?= icon('mail', 15, 'var(--accent-light)') ?> <?= e(EMAIL) ?>
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
            <p class="site-footer__clinic-line"><?= icon('pin', 15, 'var(--accent-light)') ?><span><?= e($c['addr']) ?><br><small><?= e($c['landmark']) ?></small></span></p>
            <p class="site-footer__clinic-line"><?= icon('clock', 15, 'var(--accent-light)') ?><span><?= e($c['hours']) ?> (<?= e($c['hours_note']) ?>)</span></p>
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
  <a class="btn btn--accent" href="<?= e($footWa) ?>" data-wa-trigger data-clinic="<?= e($footRohini ? 'Delhi (Rohini)' : 'Gurugram (Sector 39)') ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 17) ?> WhatsApp</a>
</div>

<!-- Floating WhatsApp Button -->
<div class="wa-float" id="waFloatBtn" onclick="openWaModal('<?= e($footRohini ? 'Delhi (Rohini)' : 'Gurugram (Sector 39)') ?>')" role="button" tabindex="0" aria-label="Open WhatsApp Chat with Clinic">
  <div class="wa-float__btn">
    <?= icon('whatsapp', 32) ?>
    <span class="wa-float__pulse"></span>
  </div>
  <span class="wa-float__label">Chat on WhatsApp</span>
</div>

<!-- WhatsApp Lead Collector Modal -->
<div id="wa-lead-modal" class="wa-modal" style="display:none;" aria-hidden="true">
  <div class="wa-modal__backdrop" onclick="closeWaModal()"></div>
  <div class="wa-modal__dialog" role="dialog" aria-labelledby="wa-modal-title" aria-modal="true">
    <div class="wa-modal__header">
      <div class="wa-modal__brand">
        <div class="wa-modal__icon">
          <?= icon('whatsapp', 24) ?>
        </div>
        <div>
          <h3 id="wa-modal-title" class="wa-modal__title">Chat on WhatsApp</h3>
          <p class="wa-modal__subtitle">Doctor-led guidance · Direct WhatsApp response</p>
        </div>
      </div>
      <button type="button" class="wa-modal__close" onclick="closeWaModal()" aria-label="Close dialog">&times;</button>
    </div>
    <div class="wa-modal__body">
      <p class="wa-modal__desc">Enter your details below to connect directly with the clinic on WhatsApp. You can send daylight photographs and receive an honest clinical view.</p>
      
      <form class="wa-modal__form" action="/enquire.php" method="post" id="waLeadForm">
        <input type="hidden" name="source" value="whatsapp-modal:<?= e($page['url'] ?? '') ?>">
        <input type="hidden" name="redirect_to" value="whatsapp">
        <p class="sr-only"><label>Leave empty <input type="text" name="website" tabindex="-1" autocomplete="off"></label></p>
        
        <div class="wa-field">
          <label for="wa-name">Your Full Name</label>
          <input class="input" type="text" id="wa-name" name="name" placeholder="e.g. Rahul Sharma" required autocomplete="name" maxlength="120">
        </div>
        
        <div class="wa-field">
          <label for="wa-phone">Phone / WhatsApp Number</label>
          <input class="input" type="tel" id="wa-phone" name="phone" placeholder="10-digit mobile number" required inputmode="tel" autocomplete="tel" pattern="[\s\(\)+\-]*(?:[0-9][\s\(\)+\-]*){10,15}" title="Please enter a valid 10-digit phone number">
        </div>
        
        <div class="wa-field">
          <label for="wa-treatment">Treatment of Interest</label>
          <select class="select" id="wa-treatment" name="treatment">
            <option value="Hair transplant">Hair Transplant (FUE / DHI)</option>
            <option value="Beard transplant">Beard Transplant</option>
            <option value="Hair PRP / GFC">Hair PRP / GFC Treatment</option>
            <option value="Hair fall treatment">Hair Fall & Scalp Assessment</option>
            <option value="Laser hair removal">Laser Hair Removal</option>
            <option value="Skin care">Skin & Facial Aesthetic Care</option>
            <option value="Not sure — please advise">Not sure — please advise</option>
          </select>
        </div>
        
        <div class="wa-field">
          <label for="wa-clinic">Preferred Clinic</label>
          <select class="select" id="wa-clinic" name="clinic">
            <option value="Delhi (Rohini)"<?= $footRohini ? ' selected' : '' ?>>Delhi (Rohini) Clinic</option>
            <option value="Gurugram (Sector 39)"<?= !$footRohini ? ' selected' : '' ?>>Gurugram (Sector 39) Clinic</option>
            <option value="Either clinic">Either Clinic (Online Assessment)</option>
          </select>
        </div>
        
        <button type="submit" class="wa-submit-btn" id="waSubmitBtn">
          <?= icon('whatsapp', 20) ?> <span>Start WhatsApp Chat &rarr;</span>
        </button>
        
        <div class="wa-modal__footer mt-3">
          <p class="fine" style="text-align:center;margin:0 0 6px">
            Prefer direct chat? <a href="<?= e($footWa) ?>" target="_blank" rel="noopener" class="wa-direct-link">Click here to open WhatsApp directly</a>
          </p>
          <p class="fine" style="text-align:center;color:var(--ink-muted);font-size:11px;margin:0">
            🔒 Your details are kept confidential and used only to assist your consultation.
          </p>
        </div>
      </form>
    </div>
  </div>
</div>

<?php if (function_exists('hp_booking_dialog')): ?>
<?= hp_booking_dialog('dialog:' . (string) ($page['url'] ?? '')) ?>
<?php endif; ?>

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

  // In-page filters: blog topics and results by procedure. These were
  // ?topic= / ?type= links, and every one of those URLs canonicalised back to
  // the page itself, so crawlers reported each as a canonicalised duplicate.
  // Without JavaScript the buttons stay hidden and every item shows. An old
  // ?topic= / ?type= link still opens on its filter.
  document.querySelectorAll('[data-filter-nav]').forEach(function (nav) {
    var scope   = nav.closest('[data-filter-scope]') || document;
    var items   = scope.querySelectorAll('[data-filter-key]');
    var empty   = scope.querySelector('[data-filter-empty]');
    var buttons = Array.prototype.slice.call(nav.querySelectorAll('[data-filter]'));
    var find = function (key) {
      return buttons.filter(function (b) { return b.getAttribute('data-filter') === key; })[0];
    };
    var apply = function (key) {
      var shown = 0;
      items.forEach(function (item) {
        item.hidden = key !== '' && item.getAttribute('data-filter-key') !== key;
        if (!item.hidden) { shown++; }
      });
      buttons.forEach(function (b) {
        var on = b.getAttribute('data-filter') === key;
        b.setAttribute('aria-pressed', on ? 'true' : 'false');
        b.classList.toggle('btn--ink', on);
        b.classList.toggle('btn--outline', !on);
      });
      if (empty) {
        empty.hidden = shown > 0;
        var label = empty.querySelector('[data-filter-label]');
        var name  = find(key).getAttribute('data-filter-name') || '';
        if (label) { label.textContent = name ? name + ' ' : ''; }
      }
    };
    nav.addEventListener('click', function (event) {
      var b = event.target.closest('[data-filter]');
      if (b) { apply(b.getAttribute('data-filter')); }
    });
    var start = new URLSearchParams(window.location.search).get(nav.getAttribute('data-filter-param') || '');
    if (start && find(start)) { apply(start); }
    nav.hidden = false;
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

  // WhatsApp Lead Collector Modal handlers
  window.openWaModal = function (clinic, treatment) {
    var modal = document.getElementById('wa-lead-modal');
    if (!modal) return;
    modal.style.display = 'flex';
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
    if (clinic) {
      var cSel = document.getElementById('wa-clinic');
      if (cSel) cSel.value = clinic;
    }
    if (treatment) {
      var tSel = document.getElementById('wa-treatment');
      if (tSel) tSel.value = treatment;
    }
    var nInput = document.getElementById('wa-name');
    if (nInput) setTimeout(function () { nInput.focus(); }, 80);
  };

  window.closeWaModal = function () {
    var modal = document.getElementById('wa-lead-modal');
    if (!modal) return;
    modal.style.display = 'none';
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  };

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      window.closeWaModal();
    }
  });

  document.addEventListener('click', function (e) {
    var trigger = e.target.closest('[data-wa-trigger]');
    if (trigger) {
      if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
      e.preventDefault();
      var c = trigger.getAttribute('data-clinic') || '';
      var t = trigger.getAttribute('data-treatment') || '';
      window.openWaModal(c, t);
    }
  });

  var waForm = document.getElementById('waLeadForm');
  if (waForm) {
    waForm.addEventListener('submit', function (e) {
      var btn = document.getElementById('waSubmitBtn');
      var nameVal = (document.getElementById('wa-name').value || '').trim();
      var phoneVal = (document.getElementById('wa-phone').value || '').trim();
      var clinicVal = document.getElementById('wa-clinic').value;
      var treatVal = document.getElementById('wa-treatment').value;

      if (!nameVal || phoneVal.replace(/\D/g, '').length < 10) {
        return;
      }

      e.preventDefault();
      if (btn) {
        btn.disabled = true;
        btn.innerHTML = '<span>Connecting to WhatsApp...</span>';
      }

      var waPhone = (clinicVal === 'Gurugram (Sector 39)') ? '918178330800' : '919540699152';
      var clinicNote = clinicVal ? ' at ' + clinicVal : '';
      var waMsg = 'Hi DenceSpot Clinic, my name is ' + nameVal + '. I would like consultation details about ' + treatVal + clinicNote + '.';
      var fallbackUrl = 'https://api.whatsapp.com/send/?phone=' + waPhone + '&text=' + encodeURIComponent(waMsg);

      var formData = new FormData(waForm);
      var redirected = false;
      var doRedirect = function (targetUrl) {
        if (redirected) return;
        redirected = true;
        window.location.href = targetUrl || fallbackUrl;
      };

      var timeout = setTimeout(function () {
        doRedirect(fallbackUrl);
      }, 1800);

      fetch('/enquire.php', {
        method: 'POST',
        headers: { 'Accept': 'application/json' },
        body: formData
      })
      .then(function (res) { return res.json(); })
      .then(function (data) {
        clearTimeout(timeout);
        if (data && data.redirect) {
          doRedirect(data.redirect);
        } else {
          doRedirect(fallbackUrl);
        }
      })
      .catch(function () {
        clearTimeout(timeout);
        doRedirect(fallbackUrl);
      });
    });
  }
}());
</script>

</body>
</html>
