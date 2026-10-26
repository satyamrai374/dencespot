/**
 * /lp/ — popups, booking buttons and enquiry forms.
 *
 * Same behaviour as the reference page: a popup 4.5 s after load, a second
 * one 10 s after the first is closed, and every .book-appointment-btn opens
 * the booking popup. Added: the timed pair shows once per browser session,
 * never on top of another open popup, and forms submit normally to
 * /enquire.php, which redirects to /thank-you (the conversion URL).
 */
(function () {
  'use strict';

  var welcome = document.getElementById('welcomeModal');
  var estimate = document.getElementById('estimateModal');
  var booking = document.getElementById('appointmentModal');
  var SEEN_KEY = 'lp_popups_seen';

  function openModal(dialog) {
    if (!dialog || dialog.open || typeof dialog.showModal !== 'function') { return false; }
    if (document.querySelector('dialog[open]')) { return false; }
    dialog.showModal();
    return true;
  }

  function seen() {
    try { return window.sessionStorage.getItem(SEEN_KEY) === '1'; } catch (e) { return false; }
  }

  function markSeen() {
    try { window.sessionStorage.setItem(SEEN_KEY, '1'); } catch (e) { /* storage blocked: popups may repeat */ }
  }

  // Close: the X button, or a click on the backdrop.
  document.querySelectorAll('dialog.enhanced-modal').forEach(function (dialog) {
    dialog.querySelector('[data-close]').addEventListener('click', function () { dialog.close(); });
    dialog.addEventListener('click', function (e) {
      if (e.target === dialog) { dialog.close(); }
    });
  });

  // Timed popups.
  if (!seen()) {
    setTimeout(function () {
      if (!openModal(welcome)) { return; }
      markSeen();
      welcome.addEventListener('close', function () {
        setTimeout(function () { openModal(estimate); }, 10000);
      }, { once: true });
    }, 4500);
  }

  // Booking buttons.
  document.querySelectorAll('.book-appointment-btn').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      openModal(booking);
    });
  });

  // Phone fields: digits and + only, as on the reference.
  document.querySelectorAll('input[type="tel"]').forEach(function (input) {
    input.addEventListener('input', function () {
      this.value = this.value.replace(/[^0-9+]/g, '');
    });
  });

  // /enquire.php stores the clinic and consent fields itself; the visit
  // timing and the popup name travel in the message.
  document.querySelectorAll('.popup-form').forEach(function (form) {
    form.addEventListener('submit', function () {
      var parts = [];
      var visit = form.elements.visit.value;
      if (visit) { parts.push('Plans to visit: ' + visit); }
      parts.push('Form: ' + form.elements.form_type.value + ' (landing page)');
      form.elements.message.value = parts.join(' | ');

      var btn = form.querySelector('.enhanced-submit-btn');
      btn.dataset.label = btn.dataset.label || btn.innerHTML;
      btn.classList.add('btn-loading');
      btn.textContent = 'Submitting...';

      if (typeof window.gtag === 'function') {
        window.gtag('event', 'generate_lead', { form_type: form.elements.form_type.value });
      }
      if (typeof window.fbq === 'function') {
        window.fbq('track', 'Lead');
      }
    });
  });

  // Back from /thank-you restores the page from cache: re-enable the buttons.
  window.addEventListener('pageshow', function () {
    document.querySelectorAll('.enhanced-submit-btn.btn-loading').forEach(function (btn) {
      btn.classList.remove('btn-loading');
      btn.innerHTML = btn.dataset.label;
    });
  });

  // Call and WhatsApp clicks, named like the site's own events (footer.php).
  document.addEventListener('click', function (e) {
    var el = e.target.closest ? e.target.closest('[data-track]') : null;
    if (!el || typeof window.gtag !== 'function') { return; }
    window.gtag('event', 'lead_' + el.getAttribute('data-track'), { link_url: el.getAttribute('href') || '' });
  });
}());
