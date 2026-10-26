<?php
/**
 * Delhi hair transplant pages: the parent /hair-transplant-delhi/ and one page
 * per locality under it (/hair-transplant-delhi/rohini, /…/pitampura).
 *
 * WHY THESE EXIST. On 25 Oct 2026 the client chose to build hyperlocal Delhi
 * hair transplant pages, overriding SEO-STRATEGY §5.3 ("no new locality
 * pages") after the doorway risk was explained, and asked for them in a
 * folder: one Hair Transplant Delhi page with every location under it, all on
 * the /hair-transplant-in-gurgaon design. /hair-transplant-in-rohini moved to
 * /hair-transplant-delhi/rohini (legacy-redirects.php has the 301).
 *
 * DenceSpot has one Delhi clinic, in Rohini, so every locality page is a
 * service-area page for that clinic:
 *   • it never says or implies a clinic in the locality;
 *   • it books, calls and messages the Rohini clinic and is a Rohini page under
 *     the location rule (hp_page_location() matches the folder), so it never
 *     mentions the Gurugram clinic;
 *   • no AI images (Rohini rule, 25 Oct 2026): the hero is the licensed stock
 *     photo the Gurgaon page also uses, labelled representative, and the step
 *     circles hold icons instead of the Gurgaon page's AI illustrations.
 *
 * DOORWAY GUARD. Each locality file holds its own hand-written copy (getting
 * there, landmarks, visits, FAQs) built from facts with a recorded source in
 * its docblock and in the Delhi URL inventory, which is kept outside the site
 * folder (Desktop/Dencespot SEO Reports/delhi-hair-transplant/, with the QA
 * report and qa-tools/; no reports in the site folder). The shared sections below are
 * images or short text that link up to the parent for depth, so most of each
 * page's words are about its own area. Never make a page by swapping a name
 * into another page's copy: if the swap still reads correctly, it is a doorway.
 *
 * Adding a page: write hair-transplant-delhi/<slug>.php, set 'live' => true
 * here, add its URL to the Rohini 'unlisted' entries in LOCATION_LINKS, run
 * the checks in that QA report, then update the inventory.
 */

declare(strict_types=1);

/** The Delhi parent page. A folder index keeps its slash, as /blog/ does. */
const DELHI_HT_HUB = '/hair-transplant-delhi/';

/**
 * Locality registry, in the order the parent lists them. 'live' pages are
 * linked from the parent and their neighbours; the rest stay unlinked.
 * 'near' lists areas a cited source places next to this one; 'card' is the
 * one-line summary on the parent page.
 */
const DELHI_LOCALITIES = [
    'rohini' => [
        'name'   => 'Rohini',
        'anchor' => 'Hair Transplant in Rohini',
        'live'   => true,
        'near'   => ['pitampura'],
        'card'   => 'The clinic’s own area. Red Line at Rithala, Dr. Baba Saheb Ambedkar Hospital and Rohini; Yellow Line at Rohini Sector 18, 19.',
    ],
    'pitampura' => [
        'name'   => 'Pitampura',
        'anchor' => 'Hair Transplant Near Pitampura',
        'live'   => true,
        'near'   => ['rohini', 'shalimar-bagh', 'ashok-vihar', 'model-town', 'punjabi-bagh'],
        'card'   => 'Next to Rohini. Red Line at Madhuban Chowk, Kohat Enclave and Netaji Subhash Place.',
    ],
];

/** A locality page's URL. */
function delhi_locality_url(string $slug): string
{
    return DELHI_HT_HUB . $slug;
}

/** Live locality pages, in registry order, as slug => entry. */
function delhi_localities_live(): array
{
    return array_filter(DELHI_LOCALITIES, static fn (array $l): bool => $l['live']);
}

/**
 * The full-width hero of /hair-transplant-in-gurgaon, with the licensed stock
 * photo in place of its AI image. $o: pill, title, lead, feats [[icon, label]].
 */
function delhi_hero(array $o): string
{
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
        <a class="btn btn--lg btn--ink" href="<?= e(book_url()) ?>" data-book data-clinic="Delhi (Rohini)" data-treatment="Hair transplant" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
        <a class="btn btn--lg btn--outline" href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= icon('phone', 18) ?> Call <?= e(LOC_DELHI_PHONE_DISPLAY) ?></a>
      </div>
      <p class="hero-x__note hero-x__note--copy">Image: representative, not the Rohini clinic</p>
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
 * media 'map' | 'equipment'.
 */
function delhi_band(array $o): string
{
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
    <iframe title="Google Map showing DenceSpot Clinic, Rohini, Delhi" src="<?= e(LOC_DELHI_MAP_EMBED) ?>" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
  </div>
  <?php else: ?>
  <figure class="ht-why__media">
    <img src="/assets/img/clinic-equipment.jpg" alt="Motorised FUE handpiece used at DenceSpot Clinic to take follicular units one at a time" width="492" height="855" loading="lazy" decoding="async">
    <ul class="ht-why__checks">
      <li><?= icon('check', 16, 'currentColor', 2.4) ?> FUE &amp; DHI at the Rohini clinic</li>
      <li><?= icon('check', 16, 'currentColor', 2.4) ?> Consented patient photographs</li>
      <li><?= icon('check', 16, 'currentColor', 2.4) ?> Reviews through the first year</li>
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

/** The homepage's three doctor tiles, worded for the Rohini clinic. */
function delhi_doctors(): string
{
    return doctors_grid_section(
        'Our doctors',
        'Meet the Doctors at DenceSpot',
        'Every case starts with an examination by a doctor. The doctor who will treat you at the Rohini clinic is named at your consultation, and you can ask for their qualifications, registration and experience with the technique planned for you.',
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
 * Links up to the parent and across to live neighbouring localities. Only the
 * registry's 'near' areas, so the locality pages do not all link to each other.
 */
function delhi_nearby(string $slug): string
{
    $links = [DELHI_HT_HUB => 'Hair Transplant in Delhi'];
    // The page's district, then its listed neighbours that have a page
    // (includes/delhi-areas.php, when loaded).
    $self = function_exists('delhi_area') ? delhi_area($slug) : null;
    if ($self !== null && ($d = delhi_area($self['district'] ?? '')) !== null) {
        $links[delhi_area_url($self['district'])] = 'Hair Transplant Near ' . $d['name'];
    }
    foreach (DELHI_LOCALITIES[$slug]['near'] ?? [] as $n) {
        if (isset(DELHI_LOCALITIES[$n]) && DELHI_LOCALITIES[$n]['live']) {
            $links[delhi_locality_url($n)] = DELHI_LOCALITIES[$n]['anchor'];
        } elseif (function_exists('delhi_area') && ($a = delhi_area($n)) !== null) {
            $links[delhi_area_url($n)] = 'Hair Transplant Near ' . delhi_area_label($a);
        }
    }
    $links['/delhi-clinic'] = 'Rohini Clinic Details';

    ob_start(); ?>
<section class="section ht-sec section--white" id="nearby">
  <div class="wrap">
    <p class="eyebrow">North-West Delhi</p>
    <h2 class="h3 mt-1">Hair Transplant in Delhi: Related Pages</h2>
    <ul class="ht-patterns mt-3">
      <?php foreach ($links as $url => $anchor): ?>
      <li><a href="<?= e($url) ?>"><?= icon('pin', 14) ?> <?= e($anchor) ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/**
 * The parent's directory: the hand-written locality pages, then one card per
 * Delhi district (each district page lists its areas, sectors and PIN codes).
 */
function delhi_areas_section(): string
{
    $live      = delhi_localities_live();
    $districts = function_exists('delhi_areas')
        ? array_filter(delhi_areas(), static fn (array $a): bool => $a['type'] === 'district')
        : [];
    if ($live === [] && $districts === []) {
        return '';
    }

    ob_start(); ?>
<section class="section ht-sec section--white" id="areas">
  <div class="wrap">
    <div style="max-width:68ch">
      <p class="eyebrow">Areas we serve</p>
      <h2 class="h2 mt-2">Hair Transplant Across Delhi</h2>
      <p class="body mt-3">DenceSpot has one clinic in Delhi, in Rohini. These pages cover getting there from each district, area, sector and PIN code, with the local metro stations and questions people from that area ask.</p>
    </div>
    <div class="dl-areas">
      <?php foreach ($live as $slug => $loc): ?>
      <a class="dl-area" href="<?= e(delhi_locality_url($slug)) ?>">
        <span class="icon-dot tone--mint"><?= icon('pin', 20) ?></span>
        <span>
          <b><?= e($loc['anchor']) ?></b>
          <span><?= e($loc['card']) ?></span>
        </span>
      </a>
      <?php endforeach; ?>
      <?php foreach ($districts as $slug => $d): ?>
      <a class="dl-area" href="<?= e(delhi_area_url($slug)) ?>">
        <span class="icon-dot tone--sky"><?= icon('list', 20) ?></span>
        <span>
          <b>Hair Transplant Near <?= e($d['name']) ?></b>
          <span><?= count($d['children'] ?? []) ?> area and PIN code pages in this district.</span>
        </span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/** The closing consultation band, with the Rohini clinic's details and form. */
function delhi_consult(string $heading, string $intro, string $source): string
{
    ob_start(); ?>
<section class="section ht-sec consult" id="consultation">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Book a consultation</p>
        <h2 class="h2 mt-2"><?= e($heading) ?></h2>
        <p class="body-l mt-3 measure"><?= e($intro) ?></p>

        <dl class="dl mt-4">
          <div><dt>Address</dt><dd><?= e(LOC_DELHI_ADDRESS) ?><span class="meta" style="display:block;font-weight:500"><?= e(LOC_DELHI_LANDMARK) ?></span></dd></div>
          <div><dt>Phone</dt><dd><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></dd></div>
          <div><dt>Hours</dt><dd><?= e(HOURS_DISPLAY) ?><span class="meta" style="display:block;font-weight:500"><?= e(HOURS_NOTE) ?></span></dd></div>
        </dl>

        <div class="btn-row mt-5">
          <a class="btn btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> WhatsApp</a>
          <a class="btn btn--outline" href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= icon('phone', 17) ?> Call the Clinic</a>
          <a class="btn btn--outline" href="<?= e(LOC_DELHI_MAPS_URL) ?>" target="_blank" rel="noopener"><?= icon('pin', 17) ?> Directions<span class="sr-only"> (opens in a new tab)</span></a>
        </div>
      </div>

      <div class="consult__form">
        <h3 class="h3">Book Your Consultation</h3>
        <p class="body-s mt-1">The Rohini clinic replies during opening hours (<?= e(HOURS_DISPLAY) ?>).</p>
        <div class="mt-4">
          <?= enquiry_form($source, [
              'Hair transplant (FUE / DHI)',
              'Hairline transplant',
              'Crown hair transplant',
              'Hair transplant for women',
              'Hair transplant repair',
              'Not sure — please advise',
          ], false) ?>
        </div>
        <p class="fine mt-4">Suitability is decided after clinical assessment. This page is patient education and is not medical advice.</p>
      </div>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/** The FAQ section in the Gurgaon layout. */
function delhi_faqs(string $heading, array $faqs, int $visible): string
{
    ob_start(); ?>
<section class="section ht-sec section--canvas" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2"><?= e($heading) ?></h2>
        <p class="body-s mt-3">General patient education. Anything specific to your scalp, health or budget is answered at the consultation.</p>
        <div class="btn-row mt-4">
          <a class="btn btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
        </div>
      </div>

      <?= faq_list($faqs, 1, $visible) ?>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}
