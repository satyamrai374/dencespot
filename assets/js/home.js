/*
 * DenceSpot Clinic — homepage behaviour (October 2026 redesign).
 *
 * Progressive enhancement only: every control here works as a plain link or
 * a native element without this file. The booking links go to
 * /book-consultation, the carousel scrolls by touch or trackpad, and the
 * mobile menu falls back to the footer navigation.
 */
(function () {
  'use strict';

  var doc = document;
  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* Sticky header: a hairline and shadow once the page has scrolled. */
  var header = doc.querySelector('[data-hp-header]');
  if (header) {
    var markScrolled = function () { header.classList.toggle('is-scrolled', window.scrollY > 8); };
    markScrolled();
    window.addEventListener('scroll', markScrolled, { passive: true });
  }

  /* Mobile menu. */
  var burger = doc.querySelector('[data-hp-burger]');
  var mobileNav = doc.getElementById('hp-mnav');
  var setMobileNav = function (open) {
    if (!burger || !mobileNav) { return; }
    burger.setAttribute('aria-expanded', open ? 'true' : 'false');
    burger.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    mobileNav.hidden = !open;
  };
  if (burger && mobileNav) {
    burger.addEventListener('click', function () {
      setMobileNav(burger.getAttribute('aria-expanded') !== 'true');
    });
    mobileNav.addEventListener('click', function (event) {
      if (event.target.closest('a')) { setMobileNav(false); }
    });
    doc.addEventListener('keydown', function (event) {
      if (event.key === 'Escape' && burger.getAttribute('aria-expanded') === 'true') {
        setMobileNav(false);
        burger.focus();
      }
    });
    var desktop = window.matchMedia('(min-width: 1024px)');
    var closeOnDesktop = function (mq) { if (mq.matches) { setMobileNav(false); } };
    if (desktop.addEventListener) { desktop.addEventListener('change', closeOnDesktop); }
  }

  /* Desktop dropdown: a disclosure button. Hover opens it via CSS; click and
     keyboard set aria-expanded, which CSS also honours. */
  Array.prototype.forEach.call(doc.querySelectorAll('[data-hp-menu]'), function (item) {
    var toggle = item.querySelector('.hp-nav__toggle');
    if (!toggle) { return; }
    var close = function () { toggle.setAttribute('aria-expanded', 'false'); };
    toggle.addEventListener('click', function () {
      item.classList.remove('is-dismissed');
      toggle.setAttribute('aria-expanded', toggle.getAttribute('aria-expanded') === 'true' ? 'false' : 'true');
    });
    item.addEventListener('keydown', function (event) {
      if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
        close();
        toggle.focus();
      }
    });
    // Escape also hides a menu opened by hover, wherever focus is (WCAG 1.4.13);
    // it stays hidden until the pointer leaves and comes back.
    doc.addEventListener('keydown', function (event) {
      if (event.key === 'Escape' && item.matches(':hover')) {
        item.classList.add('is-dismissed');
        close();
      }
    });
    item.addEventListener('mouseleave', function () { item.classList.remove('is-dismissed'); });
    item.addEventListener('focusout', function (event) {
      if (!item.contains(event.relatedTarget)) { close(); }
    });
    doc.addEventListener('click', function (event) {
      if (!item.contains(event.target)) { close(); }
    });
  });

  /* Booking dialog. Any [data-book] link opens it, preselecting the
     treatment named in data-treatment. Modified clicks (new tab) and
     browsers without <dialog> keep the plain link to /book-consultation. */
  var dialog = doc.getElementById('hp-book');
  if (dialog && typeof dialog.showModal === 'function') {
    var treatmentSelect = dialog.querySelector('select[name="treatment"]');
    var clinicSelect = dialog.querySelector('select[name="clinic"]');
    var nameInput = dialog.querySelector('input[name="name"]');

    var openedFromMenu = false;

    doc.addEventListener('click', function (event) {
      var trigger = event.target.closest('[data-book]');
      if (!trigger || event.defaultPrevented || event.button !== 0 ||
          event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) {
        return;
      }
      event.preventDefault();
      // Every opening starts from the trigger's treatment, or "Not sure", so a
      // choice made for one card never carries over to the next booking.
      if (treatmentSelect) {
        treatmentSelect.value = trigger.getAttribute('data-treatment') || 'Not sure — please advise';
        if (treatmentSelect.selectedIndex < 0) { treatmentSelect.selectedIndex = treatmentSelect.length - 1; }
      }
      // Likewise the clinic: a trigger may name one (data-clinic, e.g. on the
      // Delhi page); otherwise "Either clinic".
      if (clinicSelect) {
        clinicSelect.value = trigger.getAttribute('data-clinic') || 'Either clinic';
        if (clinicSelect.selectedIndex < 0) { clinicSelect.selectedIndex = clinicSelect.length - 1; }
      }
      openedFromMenu = !!(mobileNav && mobileNav.contains(trigger));
      setMobileNav(false);
      dialog.showModal();
      if (nameInput) { nameInput.focus(); }
    });

    // The trigger inside the mobile menu is hidden by now, so focus would fall
    // to <body>; send it to the menu button instead.
    dialog.addEventListener('close', function () {
      if (openedFromMenu && burger) { burger.focus(); }
      openedFromMenu = false;
    });

    // A click on the dialog element itself is a click on the backdrop — but
    // only close if the press started there too, so dragging a text selection
    // out of a field does not throw the form away.
    var pressedOnBackdrop = false;
    dialog.addEventListener('pointerdown', function (event) { pressedOnBackdrop = event.target === dialog; });
    dialog.addEventListener('click', function (event) {
      if (event.target === dialog && pressedOnBackdrop) { dialog.close(); }
      pressedOnBackdrop = false;
    });
  }

  /* Carousel: arrow buttons and dots for a native scroll-snap track. */
  Array.prototype.forEach.call(doc.querySelectorAll('[data-hp-carousel]'), function (root) {
    var track = root.querySelector('[data-hp-track]');
    if (!track) { return; }
    var slides = Array.prototype.slice.call(track.children);
    var prev = root.querySelector('[data-dir="-1"]');
    var next = root.querySelector('[data-dir="1"]');
    var dots = root.parentNode.querySelector('[data-hp-dots]');
    var dotCount = 0;

    var stride = function () {
      if (slides.length < 2) { return track.clientWidth; }
      return slides[1].offsetLeft - slides[0].offsetLeft;
    };
    var pages = function () {
      var visible = Math.max(1, Math.round(track.clientWidth / stride()));
      return Math.max(1, slides.length - visible + 1);
    };
    var go = function (index) {
      track.scrollTo({ left: index * stride(), behavior: reduceMotion ? 'auto' : 'smooth' });
    };

    var renderDots = function (count) {
      if (!dots || count === dotCount) { return; }
      dotCount = count;
      dots.innerHTML = '';
      for (var i = 0; i < count; i++) {
        var button = doc.createElement('button');
        button.type = 'button';
        button.setAttribute('aria-label', 'Show pattern ' + (i + 1) + ' of ' + count);
        button.addEventListener('click', go.bind(null, i));
        dots.appendChild(button);
      }
    };

    var update = function () {
      var count = pages();
      var max = track.scrollWidth - track.clientWidth;
      var current = Math.min(count - 1, Math.round(track.scrollLeft / stride()));
      renderDots(count);
      if (dots) {
        dots.hidden = count < 2;
        Array.prototype.forEach.call(dots.children, function (dot, i) {
          dot.setAttribute('aria-current', i === current ? 'true' : 'false');
        });
      }
      if (prev) { prev.hidden = count < 2; prev.disabled = track.scrollLeft <= 8; }
      if (next) { next.hidden = count < 2; next.disabled = track.scrollLeft >= max - 8; }
    };

    if (prev) { prev.addEventListener('click', function () { track.scrollBy({ left: -stride(), behavior: reduceMotion ? 'auto' : 'smooth' }); }); }
    if (next) { next.addEventListener('click', function () { track.scrollBy({ left: stride(), behavior: reduceMotion ? 'auto' : 'smooth' }); }); }

    var queued = false;
    var schedule = function () {
      if (queued) { return; }
      queued = true;
      window.requestAnimationFrame(function () { queued = false; update(); });
    };
    track.addEventListener('scroll', schedule, { passive: true });
    window.addEventListener('resize', schedule);
    update();
  });

  /* Conversion events: call, WhatsApp and booking clicks, when analytics is
     present. Nothing is sent when it is not. */
  doc.addEventListener('click', function (event) {
    var el = event.target.closest('[data-track]');
    if (!el || typeof window.gtag !== 'function') { return; }
    window.gtag('event', 'lead_' + el.getAttribute('data-track'), { page_path: window.location.pathname });
  });
}());
