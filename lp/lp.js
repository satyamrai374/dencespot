/**
 * /lp/ — popups, booking buttons and enquiry forms.
 *
 * Same behaviour as the reference page: a popup 4.5 s after load, a second
 * one 10 s after the first is closed, and every .book-appointment-btn opens
 * the booking popup. Added: the timed pair shows once per browser session,
 * never on top of another open popup. Forms go to /enquire.php in the
 * background and then open the LP's own thank-you page (the form's
 * data-thanks, /lp/thank-you/), whose page view is the conversion (client,
 * 6 Nov 2026: not the website's /thank-you). If the background request
 * fails, the form is posted the normal way instead, so a lead is never lost.
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
    dialog.querySelectorAll('[data-close]').forEach(function (btn) {
      btn.addEventListener('click', function (e) {
        e.stopPropagation();
        dialog.close();
      });
    });
    dialog.addEventListener('click', function (e) {
      var rect = dialog.getBoundingClientRect();
      var isInDialog = (
        rect.top <= e.clientY && e.clientY <= rect.top + rect.height &&
        rect.left <= e.clientX && e.clientX <= rect.left + rect.width
      );
      if (!isInDialog || e.target === dialog) {
        dialog.close();
      }
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

  // The popup name travels in the message. The forms ask for name and phone
  // only (clinic and visit questions removed 3 Nov 2026, consent box 6 Nov).
  var ERRORS = {
    name: 'Please enter your name.',
    phone: 'Please enter a phone number with at least 10 digits.'
  };

  function resetButton(btn) {
    btn.classList.remove('btn-loading');
    btn.disabled = false;
    if (btn.dataset.label) { btn.innerHTML = btn.dataset.label; }
  }

  document.querySelectorAll('.popup-form').forEach(function (form) {
    var errorBox = form.querySelector('.form-error');

    form.addEventListener('submit', function (e) {
      form.elements.message.value = 'Form: ' + form.elements.form_type.value + ' (landing page)';

      var btn = form.querySelector('.enhanced-submit-btn');
      btn.dataset.label = btn.dataset.label || btn.innerHTML;
      btn.classList.add('btn-loading');
      btn.textContent = 'Submitting...';

      // No fetch (very old browser): post the normal way.
      if (typeof window.fetch !== 'function' || typeof window.FormData !== 'function') { return; }

      e.preventDefault();
      btn.disabled = true;
      if (errorBox) { errorBox.hidden = true; }

      var thanks = form.getAttribute('data-thanks') || '/lp/thank-you/';
      window.fetch(form.action, {
        method: 'POST',
        body: new FormData(form),
        credentials: 'same-origin',
        headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
      }).then(function (res) {
        return res.json().then(function (data) {
          return { status: res.status, data: data };
        }, function () {
          // Not JSON. A 2xx means /enquire.php handled the post another way
          // (its spam filter answers with a redirect page); anything else is a
          // server fault, so post the normal way (data: null) to save the lead.
          return { status: res.status, data: res.ok ? { ok: true } : null };
        });
      }).then(function (r) {
        if (r.data === null) {
          HTMLFormElement.prototype.submit.call(form);
          return;
        }
        if (r.data.ok) {
          window.location.href = thanks;
          return;
        }
        // 422: the name or the phone number needs correcting.
        var list = r.data.errors || [];
        var text = list.map(function (k) { return ERRORS[k] || ''; }).filter(Boolean).join(' ')
          || 'Please check your name and phone number and try again.';
        if (errorBox) { errorBox.textContent = text; errorBox.hidden = false; }
        resetButton(btn);
      }).catch(function () {
        // Network trouble: post the normal way, so the lead still arrives.
        HTMLFormElement.prototype.submit.call(form);
      });
    });
  });

  // Back from the thank-you page restores this page from cache: re-enable the buttons.
  window.addEventListener('pageshow', function () {
    document.querySelectorAll('.enhanced-submit-btn.btn-loading').forEach(resetButton);
  });

  // Call and WhatsApp clicks, named like the site's own events (footer.php).
  document.addEventListener('click', function (e) {
    var el = e.target.closest ? e.target.closest('[data-track]') : null;
    if (!el || typeof window.gtag !== 'function') { return; }
    window.gtag('event', 'lead_' + el.getAttribute('data-track'), { link_url: el.getAttribute('href') || '' });
  });
}());
