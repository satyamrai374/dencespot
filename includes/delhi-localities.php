<?php
/**
 * Shared sections of the Delhi hair transplant area pages, /hair-transplant-in-
 * <area> (laid out by includes/delhi-area-page.php; the areas, their facts and
 * the rules are in includes/delhi-service-areas.php). They follow the
 * /hair-transplant-in-gurgaon design, as the /hair-transplant-in-delhi pillar
 * does, and link up to the pillar for depth.
 *
 * Every area page is a Rohini page under the location rule: it books, calls
 * and messages the Rohini clinic and never mentions the Gurugram clinic, and
 * it has no AI images (Rohini rule, 25 Oct 2026) — the hero is the licensed
 * stock photo labelled representative, and the step circles hold icons.
 *
 * History: from 25 to 27 Oct 2026 these sections served /hair-transplant-delhi/
 * and its locality pages; on 27 Oct the client replaced that folder with the
 * pillar and its own list of areas (legacy-redirects.php 301s the old URLs).
 */

declare(strict_types=1);

require_once __DIR__ . '/delhi-service-areas.php';

/**
 * The clinic a section speaks for: 'rohini' (every Delhi page) or 'gurgaon'
 * (the Gurugram area pages, includes/gurgaon-treatment-area-page.php, since
 * 28 Oct 2026). Each page names only its own clinic (location rule).
 */
function locality_clinic(string $clinic = 'rohini'): array
{
    if ($clinic === 'gurgaon') {
        return [
            'name'     => 'Gurugram clinic',
            'book'     => 'Gurugram (Sector 39)',
            'tel'      => PHONE_E164,
            'phone'    => PHONE_DISPLAY,
            'wa'       => WHATSAPP_URL,
            'maps'     => MAPS_URL,
            'embed'    => MAP_EMBED,
            'map'      => 'Google Map showing DenceSpot Clinic, Sector 39, Gurugram',
            'address'  => NAP_STREET . ', ' . NAP_LOCALITY . ', ' . NAP_REGION . ' ' . NAP_POSTCODE,
            'landmark' => ucfirst(NAP_LANDMARK),
        ];
    }
    return [
        'name'     => 'Rohini clinic',
        'book'     => 'Delhi (Rohini)',
        'tel'      => LOC_DELHI_PHONE_E164,
        'phone'    => LOC_DELHI_PHONE_DISPLAY,
        'wa'       => LOC_DELHI_WHATSAPP_URL,
        'maps'     => LOC_DELHI_MAPS_URL,
        'embed'    => LOC_DELHI_MAP_EMBED,
        'map'      => 'Google Map showing DenceSpot Clinic, Rohini, Delhi',
        'address'  => LOC_DELHI_ADDRESS,
        'landmark' => LOC_DELHI_LANDMARK,
    ];
}

/**
 * The full-width hero of /hair-transplant-in-gurgaon, with the licensed stock
 * photo in place of its AI image. $o: pill, title, lead, feats [[icon, label]],
 * and optionally treatment (the booking form's preset; hair transplant) and
 * clinic (locality_clinic(); Rohini).
 */
function delhi_hero(array $o): string
{
    $o += ['treatment' => 'Hair transplant', 'clinic' => 'rohini'];
    $cl = locality_clinic($o['clinic']);
    ob_start(); ?>
<section class="hero-x hero-x--page">
  <div class="hero-x__media">
    <img src="/assets/img/stock-treatment-room-1200.webp"
         srcset="/assets/img/stock-treatment-room-720.webp 720w, /assets/img/stock-treatment-room-1200.webp 1200w"
         sizes="(min-width: 1024px) and (min-aspect-ratio: 1/1) 960px, 100vw"
         alt="Representative image of a clinic treatment room with a treatment couch, lamp and equipment"
         width="1200" height="900" loading="eager" fetchpriority="high" decoding="async">
  </div>
  <p class="hero-x__note hero-x__note--photo">Representative image</p>

  <div class="wrap hero-x__body">
    <div class="hero-x__text">
      <span class="pill pill--dot"><?= e($o['pill']) ?></span>
      <h1 class="hero-x__title"><?= e($o['title']) ?></h1>
      <p class="hero-x__lead"><?= e($o['lead']) ?></p>

      <ul class="hero-x__feats">
        <?php foreach ($o['feats'] as [$ic, $label]): ?>
        <li><span><?= icon($ic, 19, 'currentColor', 1.9) ?></span><?= e($label) ?></li>
        <?php endforeach; ?>
      </ul>

      <div class="btn-row hero-x__ctas">
        <a class="btn btn--lg btn--ink" href="<?= e(book_url()) ?>" data-book data-clinic="<?= e($cl['book']) ?>" data-treatment="<?= e($o['treatment']) ?>" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
        <a class="btn btn--lg btn--outline" href="tel:<?= e($cl['tel']) ?>" data-track="call"><?= icon('phone', 18) ?> Call <?= e($cl['phone']) ?></a>
      </div>
      <p class="hero-x__note hero-x__note--copy">Image: representative, not the <?= e($cl['name']) ?></p>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/** The recorded before/after case (NAMED_CASES[0]) as a before | after pair. */
function delhi_case_pair(): string
{
    $c = NAMED_CASES[0];
    ob_start(); ?>
<figure class="ht-pair">
  <a class="ht-pair__photos" href="<?= e($c['image']) ?>" data-lightbox data-title="<?= e($c['technique'] . ' · ' . $c['grafts'] . ' · before and ' . $c['interval'] . ' after') ?>">
    <span class="ht-pair__img">
      <img src="/assets/img/case-uttam-before-480.webp" alt="Before: a DenceSpot patient’s scalp with the planned hairline drawn before an FUE hair transplant" width="480" height="600" loading="lazy" decoding="async">
      <span class="ht-pair__tag">Before</span>
    </span>
    <span class="ht-pair__arrow" aria-hidden="true"><?= icon('arrow', 18, 'currentColor', 2.2) ?></span>
    <span class="ht-pair__img">
      <img src="/assets/img/case-uttam-after-480.webp" alt="After: the same patient <?= e($c['interval']) ?> after a <?= e($c['grafts']) ?> FUE hair transplant" width="480" height="600" loading="lazy" decoding="async">
      <span class="ht-pair__tag ht-pair__tag--after">After <?= e($c['interval']) ?></span>
    </span>
  </a>
  <figcaption><?= e($c['technique']) ?> · <?= e($c['grafts']) ?> · consented DenceSpot patient. Results vary.</figcaption>
</figure>
<?php
    return (string) ob_get_clean();
}

/** At-a-glance facts. $rows: [[icon, tone, label, text]]. */
function delhi_glance(array $rows, string $label): string
{
    ob_start(); ?>
<ul class="ht-glance" aria-label="<?= e($label) ?>">
  <?php foreach ($rows as [$ic, $tone, $b, $txt]): ?>
  <li><span class="icon-dot tone--<?= e($tone) ?>"><?= icon($ic, 21) ?></span><span><b><?= e($b) ?></b><?= e($txt) ?></span></li>
  <?php endforeach; ?>
</ul>
<?php
    return (string) ob_get_clean();
}

/**
 * The "why" band: a row of round icons, and beside it either a photo or the
 * Rohini clinic's map. $o: id, eyebrow, heading, intro, icons [[icon, label]],
 * media 'map' | 'equipment', and optionally checks (the photo's checklist) and
 * clinic (whose map; Rohini).
 */
function delhi_band(array $o): string
{
    $o += ['checks' => ['FUE & DHI at the Rohini clinic', 'Consented patient photographs', 'Reviews through the first year'], 'clinic' => 'rohini'];
    $cl = locality_clinic($o['clinic']);
    ob_start(); ?>
<section class="section ht-sec ht-why" id="<?= e($o['id']) ?>">
  <div class="wrap">
    <div class="ht-why__body">
      <p class="eyebrow"><?= e($o['eyebrow']) ?></p>
      <h2 class="h2 mt-2"><?= e($o['heading']) ?></h2>
      <p class="body mt-2"><?= e($o['intro']) ?></p>
      <ul class="ht-why__icons">
        <?php foreach ($o['icons'] as [$ic, $label]): ?>
        <li><span class="ht-why__ring"><?= icon($ic, 26, 'currentColor', 1.7) ?></span><span class="ht-why__label"><?= e($label) ?></span></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <?php if ($o['media'] === 'map'): ?>
  <div class="ht-why__media ht-why__media--map">
    <iframe title="<?= e($cl['map']) ?>" src="<?= e($cl['embed']) ?>" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
  </div>
  <?php else: ?>
  <figure class="ht-why__media">
    <img src="/assets/img/clinic-equipment.jpg" alt="Motorised FUE handpiece used at DenceSpot Clinic to take follicular units one at a time" width="492" height="855" loading="lazy" decoding="async">
    <ul class="ht-why__checks">
      <?php foreach ($o['checks'] as $check): ?>
      <li><?= icon('check', 16, 'currentColor', 2.4) ?> <?= e($check) ?></li>
      <?php endforeach; ?>
    </ul>
    <figcaption class="ht-why__tag">DenceSpot’s FUE handpiece</figcaption>
  </figure>
  <?php endif; ?>
</section>
<?php
    return (string) ob_get_clean();
}

/**
 * Consented before-and-after composites in a swipeable row, as on the Gurgaon
 * page (no patient videos: they were filmed for the Gurugram clinic). The
 * patients are DenceSpot patients, never labelled as Delhi or Rohini cases.
 */
function delhi_results(string $more = '/gallery'): string
{
    $files     = ['2023-05-17 (5).jpg', '2023-05-17.jpg', '2023-05-10.jpg', '2023-05-17 (9).jpg', '2023-05-17 (1).jpg', '2023-05-17 (8).jpg'];
    $published = array_column(gallery_images(CAT_RESULT), null, 'file');
    $results   = array_values(array_filter(array_map(static fn (string $f): ?array => $published[$f] ?? null, $files)));
    if ($results === []) {
        return '';
    }

    ob_start(); ?>
<section class="section ht-sec section--white" id="results">
  <div class="wrap">
    <p class="eyebrow">Results</p>
    <h2 class="h2 mt-2">Hair Transplant Before and After Results</h2>
    <p class="body mt-2">Consented photographs of DenceSpot patients, not digitally altered. They show what happened for these patients, not what will happen for you.</p>

    <div class="ht-gallery">
      <button type="button" class="ht-gallery__nav ht-gallery__nav--prev" data-ht-scroll="-1" aria-controls="ht-results" aria-label="Previous photographs" hidden><?= icon('arrow', 18, 'currentColor', 2) ?></button>
      <div class="ht-results" id="ht-results" role="region" aria-label="Before and after photographs" tabindex="0">
        <?php foreach ($results as $i => $r): ?>
        <a class="ba-link ht-result" href="<?= e($r['url']) ?>" data-lightbox data-title="Hair transplant before and after — DenceSpot patient">
          <?= photo_img($r['url'], 'Hair transplant before and after, photo ' . ($i + 1) . ' — consented DenceSpot Clinic patient', '(min-width: 1080px) 380px, (min-width: 700px) 46vw, 80vw', $r['w'], $r['h']) ?>
        </a>
        <?php endforeach; ?>
      </div>
      <button type="button" class="ht-gallery__nav ht-gallery__nav--next" data-ht-scroll="1" aria-controls="ht-results" aria-label="Next photographs" hidden><?= icon('arrow', 18, 'currentColor', 2) ?></button>
    </div>
    <p class="ht-center meta mt-3">Before and after as marked on each photo. Technique, graft count and the time between photographs are not recorded on these images.</p>
    <div class="ht-center mt-5">
      <a class="btn btn--ink" href="<?= e($more) ?>">View More Before &amp; After Results <?= icon('arrow', 16) ?></a>
    </div>
  </div>
</section>
<script>
(function () {
  // Each arrow scrolls the row it controls and is disabled at that end.
  document.querySelectorAll('[data-ht-scroll]').forEach(function (button) {
    var track = document.getElementById(button.getAttribute('aria-controls'));
    if (!track) { return; }
    var dir = Number(button.getAttribute('data-ht-scroll'));
    var sync = function () {
      var max = track.scrollWidth - track.clientWidth - 4;
      button.disabled = dir < 0 ? track.scrollLeft < 4 : track.scrollLeft > max;
    };
    button.hidden = false;
    button.addEventListener('click', function () {
      track.scrollBy({ left: dir * track.clientWidth * 0.9, behavior: 'smooth' });
    });
    track.addEventListener('scroll', sync, { passive: true });
    window.addEventListener('resize', sync);
    sync();
  });
}());
</script>
<?php
    return (string) ob_get_clean();
}

/** The homepage's three doctor tiles, worded for the page's clinic (Rohini by default). */
function delhi_doctors(string $clinic = 'rohini'): string
{
    return doctors_grid_section(
        'Our doctors',
        'Meet the Doctors at DenceSpot',
        'Every case starts with an examination by a doctor. The doctor who will treat you at the ' . locality_clinic($clinic)['name'] . ' is named at your consultation, and you can ask for their qualifications, registration and experience with the technique planned for you.',
        'section--canvas ht-sec',
        page_review_signed_off()
    );
}

/** The five procedure steps, with icons in the circles instead of AI images. */
function delhi_steps(): string
{
    ob_start(); ?>
<section class="section ht-sec section--canvas ht-process" id="process">
  <div class="wrap">
    <p class="eyebrow">Procedure</p>
    <h2 class="h2 mt-2">The Hair Transplant Procedure</h2>
    <p class="body mt-2">Five stages at the Rohini clinic, from the first visit to the twelve-month review.</p>

    <ol class="ht-steps">
      <?php foreach ([
          ['search',   'Consultation &amp; Scalp Analysis',          'Scalp and donor area examined under magnification; history and medicines reviewed.'],
          ['pencil',   'Planning &amp; Hairline Design',             'Graft zones mapped, the hairline drawn on your face and the estimate given in writing.'],
          ['list',     'Graft Extraction',                           'Follicles taken one at a time from the back and sides, under local anaesthetic.'],
          ['settings', 'Graft Implantation',                         'Placed into pre-made sites (FUE) or with an implanter pen (DHI), at the angle of the surrounding hair.'],
          ['calendar', 'Recovery &amp; Follow-up',                   'Written aftercare and photographed reviews through the first twelve months.'],
      ] as $i => [$ic, $title, $text]): ?>
      <li class="ht-step">
        <span class="ht-step__img ht-step__img--icon"><?= icon($ic, 40, 'currentColor', 1.6) ?></span>
        <span class="ht-step__num"><?= sprintf('%02d', $i + 1) ?></span>
        <h3 class="ht-step__title"><?= $title ?></h3>
        <p class="ht-step__text"><?= e($text) ?></p>
      </li>
      <?php endforeach; ?>
    </ol>

    <p class="ht-steps__note">Recovery is covered stage by stage in the <a href="/hair-transplant-aftercare">aftercare guide</a> and <a href="/blog/first-14-days-after-a-hair-transplant">the first 14 days after a hair transplant</a>.</p>
    <div class="ht-center mt-5">
      <a class="btn btn--ink" href="#consultation"><?= icon('calendar', 17) ?> Book a Consultation</a>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/** Technique and treatment links for a locality page; the depth is on the parent. */
function delhi_techniques_brief(): string
{
    ob_start(); ?>
<section class="section ht-sec section--white" id="techniques">
  <div class="wrap">
    <div style="max-width:68ch">
      <p class="eyebrow">Techniques</p>
      <h2 class="h2 mt-2">FUE and DHI at the Rohini Clinic</h2>
      <p class="body mt-3">FUE places grafts into sites made beforehand and suits larger areas such as the crown; DHI sets each graft with an implanter pen and is often used along the hairline. Many plans combine the two. <a href="<?= e(DELHI_HT_HUB) ?>#techniques">Both techniques compared</a>.</p>
    </div>
    <ul class="ht-patterns mt-4">
      <?php foreach (ROHINI_SERVICES as $svc): ?>
        <?php if ($svc['group'] !== 'transplant' || $svc['url'] === DELHI_HT_HUB) { continue; } ?>
      <li><a href="<?= e($svc['url']) ?>"><?= e($svc['label']) ?> <?= icon('arrow', 14) ?></a></li>
      <?php endforeach; ?>
      <li><a href="/hair-prp-treatment-in-rohini">Hair PRP (not surgery) <?= icon('arrow', 14) ?></a></li>
    </ul>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/** Cost in brief for a locality page, with the factors and where to read more. */
function delhi_cost_brief(): string
{
    ob_start(); ?>
<section class="section ht-sec section--white" id="cost">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Cost</p>
        <h2 class="h2 mt-2">How the Cost Is Worked Out</h2>
        <p class="body mt-3 measure">There is no fixed price. The estimate is the number of grafts your plan needs, multiplied by a per-graft rate for the technique, plus what the estimate covers. It is itemised and given in writing after your examination, before any date is booked.</p>
        <?= cost_band_line() ?>
        <ul class="ht-patterns mt-4">
          <li><a href="/hair-transplant-cost-in-rohini">Rohini cost guide <?= icon('arrow', 14) ?></a></li>
          <li><a href="/hair-transplant-graft-calculator">Graft calculator <?= icon('arrow', 14) ?></a></li>
          <li><a href="/cost-and-emi-options">EMI and payment <?= icon('arrow', 14) ?></a></li>
        </ul>
      </div>
      <div class="factor-list">
        <div class="factor tone--mint"><span class="icon-dot"><?= icon('chart', 20) ?></span><div><b>Number of grafts</b><span>The area to be covered and what your donor area can give.</span></div></div>
        <div class="factor tone--violet"><span class="icon-dot"><?= icon('settings', 20) ?></span><div><b>Technique</b><span>DHI placement takes longer per graft than FUE placement.</span></div></div>
        <div class="factor tone--sky"><span class="icon-dot"><?= icon('scale', 20) ?></span><div><b>Complexity</b><span>Repair work, scarring, unshaven sessions or tightly curled hair.</span></div></div>
      </div>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/**
 * The closing consultation band, with the Rohini clinic's details and form.
 * $treatments: the form's treatment options; the hair transplant list when empty.
 */
function delhi_consult(string $heading, string $intro, string $source, array $treatments = [], string $clinic = 'rohini'): string
{
    $cl = locality_clinic($clinic);
    $treatments = $treatments ?: [
        'Hair transplant (FUE / DHI)',
        'Hairline transplant',
        'Crown hair transplant',
        'Hair transplant for women',
        'Hair transplant repair',
        'Not sure — please advise',
    ];
    ob_start(); ?>
<section class="section ht-sec consult" id="consultation">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Book a consultation</p>
        <h2 class="h2 mt-2"><?= e($heading) ?></h2>
        <p class="body-l mt-3 measure"><?= e($intro) ?></p>

        <dl class="dl mt-4">
          <div><dt>Address</dt><dd><?= e($cl['address']) ?><span class="meta" style="display:block;font-weight:500"><?= e($cl['landmark']) ?></span></dd></div>
          <div><dt>Phone</dt><dd><a href="tel:<?= e($cl['tel']) ?>" data-track="call"><?= e($cl['phone']) ?></a></dd></div>
          <div><dt>Hours</dt><dd><?= e(HOURS_DISPLAY) ?><span class="meta" style="display:block;font-weight:500"><?= e(HOURS_NOTE) ?></span></dd></div>
        </dl>

        <div class="btn-row mt-5">
          <a class="btn btn--accent" href="<?= e($cl['wa']) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> WhatsApp</a>
          <a class="btn btn--outline" href="tel:<?= e($cl['tel']) ?>" data-track="call"><?= icon('phone', 17) ?> Call the Clinic</a>
          <a class="btn btn--outline" href="<?= e($cl['maps']) ?>" target="_blank" rel="noopener"><?= icon('pin', 17) ?> Directions<span class="sr-only"> (opens in a new tab)</span></a>
        </div>
      </div>

      <div class="consult__form">
        <h3 class="h3">Book Your Consultation</h3>
        <p class="body-s mt-1">The <?= e($cl['name']) ?> replies during opening hours (<?= e(HOURS_DISPLAY) ?>).</p>
        <div class="mt-4">
          <?= enquiry_form($source, $treatments, false) ?>
        </div>
        <p class="fine mt-4">Suitability is decided after clinical assessment. This page is patient education and is not medical advice.</p>
      </div>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/** The FAQ section in the Gurgaon layout. $about: what the consultation answers (the laser pages: skin and hair). */
function delhi_faqs(string $heading, array $faqs, int $visible, string $about = 'scalp, health or budget', string $clinic = 'rohini'): string
{
    $cl = locality_clinic($clinic);
    ob_start(); ?>
<section class="section ht-sec section--canvas" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2"><?= e($heading) ?></h2>
        <p class="body-s mt-3">General patient education. Anything specific to your <?= e($about) ?> is answered at the consultation.</p>
        <div class="btn-row mt-4">
          <a class="btn btn--accent" href="<?= e($cl['wa']) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
        </div>
      </div>

      <?= faq_list($faqs, 1, $visible) ?>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}
