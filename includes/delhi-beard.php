<?php
/**
 * Shared sections of the Delhi beard transplant pages: the
 * /beard-transplant-in-delhi pillar and its area pages,
 * /beard-transplant-in-<area> (laid out by includes/delhi-beard-area-page.php).
 *
 * Built 27 Oct 2026 at the client's request, on the hair transplant pillar and
 * area pages: the same areas (DELHI_SERVICE_AREAS), the same design, the same
 * Rohini rules (the Rohini clinic only, never the Gurugram clinic, no AI
 * images) and the same linking — the pillar's "Serving Patients Across Delhi"
 * block is the only place the area pages are linked from, and they link up
 * to the pillar.
 *
 * No consented beard before-and-after photographs are on record, so these
 * pages have no results row and never borrow the scalp cases; the zone card
 * takes the photo pair's place. Add a results section when the clinic
 * supplies consented beard photographs.
 */

declare(strict_types=1);

require_once __DIR__ . '/delhi-localities.php';

/**
 * General graft ranges by beard zone, the patient-education bands used on
 * /beard-transplant-in-rohini and /beard-transplant-cost-in-rohini. Not a quote.
 */
const DELHI_BEARD_ZONES = [
    ['Patchy cheeks',          '500 – 1,000'],
    ['Cheek line and jawline', '800 – 1,500'],
    ['Moustache',              '300 – 700'],
    ['Goatee and chin',        '500 – 1,000'],
    ['Sideburns',              '200 – 400 a side'],
    ['Full beard',             '1,500 – 3,000+'],
];

/** The treatment options of the beard consultation form. */
const DELHI_BEARD_FORM = [
    'Beard transplant (cheeks / jawline)',
    'Moustache transplant',
    'Goatee or sideburn transplant',
    'Beard scar transplant',
    'Eyebrow transplant',
    'Not sure — please advise',
];

/** The beard zones and their graft ranges, in the slot the scalp photo pair has on the hair pages. */
function delhi_beard_zones_card(): string
{
    ob_start(); ?>
<div class="card band-card">
  <div class="band-card__head">
    <h3 class="h4">Grafts by Beard Zone</h3>
    <p>General patient-education ranges, not a quote.</p>
  </div>
  <div class="table-scroll">
    <table class="data data--fit">
      <caption class="sr-only">General beard transplant graft ranges by zone — patient education, not a quote</caption>
      <thead>
        <tr><th scope="col">Zone</th><th scope="col">Grafts</th></tr>
      </thead>
      <tbody>
        <?php foreach (DELHI_BEARD_ZONES as [$zone, $grafts]): ?>
        <tr>
          <th scope="row" style="color:var(--ink);font-size:14px;font-weight:700;text-transform:none;letter-spacing:0"><?= e($zone) ?></th>
          <td style="font-weight:700;color:var(--tone-mint);white-space:nowrap"><?= e($grafts) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <p class="meta" style="padding:12px 22px 18px">Zones share borders and existing growth lowers each figure, so a combined plan is usually less than the ranges added up.</p>
</div>
<?php
    return (string) ob_get_clean();
}

/** The five beard procedure steps, with icons in the circles. */
function delhi_beard_steps(): string
{
    ob_start(); ?>
<section class="section ht-sec section--canvas ht-process" id="process">
  <div class="wrap">
    <p class="eyebrow">Procedure</p>
    <h2 class="h2 mt-2">The Beard Transplant Procedure</h2>
    <p class="body mt-2">Five stages at the Rohini clinic, from the first visit to the twelve-month review.</p>

    <ol class="ht-steps">
      <?php foreach ([
          ['search',   'Consultation &amp; Beard Assessment', 'Facial hair mapped zone by zone, the skin checked and the scalp donor area measured.'],
          ['pencil',   'Beard Design',                        'Borders drawn on your face while you sit upright, checked in a mirror and agreed; the estimate follows in writing.'],
          ['list',     'Graft Extraction',                    'Follicles taken one at a time from the back and sides of the scalp, under local anaesthetic.'],
          ['beard',    'Graft Placement',                     'Each graft set flat to the skin in the direction of its zone, with single hairs along the visible borders.'],
          ['calendar', 'Recovery &amp; Follow-up',            'Written aftercare for washing, trimming and shaving, and photographed reviews through the first year.'],
      ] as $i => [$ic, $title, $text]): ?>
      <li class="ht-step">
        <span class="ht-step__img ht-step__img--icon"><?= icon($ic, 40, 'currentColor', 1.6) ?></span>
        <span class="ht-step__num"><?= sprintf('%02d', $i + 1) ?></span>
        <h3 class="ht-step__title"><?= $title ?></h3>
        <p class="ht-step__text"><?= e($text) ?></p>
      </li>
      <?php endforeach; ?>
    </ol>

    <p class="ht-steps__note">Recovery is covered week by week in the <a href="/blog/beard-transplant-recovery-timeline">beard transplant recovery timeline</a> and <a href="/blog/beard-transplant-what-to-expect">what to expect from a beard transplant</a>.</p>
    <div class="ht-center mt-5">
      <a class="btn btn--ink" href="#consultation"><?= icon('calendar', 17) ?> Book a Consultation</a>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/** Techniques and related treatments for an area page; the depth is on the pillar. */
function delhi_beard_techniques_brief(): string
{
    ob_start(); ?>
<section class="section ht-sec section--white" id="techniques">
  <div class="wrap">
    <div style="max-width:68ch">
      <p class="eyebrow">Techniques</p>
      <h2 class="h2 mt-2">FUE and DHI Beard Transplant at the Rohini Clinic</h2>
      <p class="body mt-3">Grafts come from the scalp the same way in both. FUE places them into sites made beforehand and is often used across the cheeks; DHI sets each graft with an implanter pen and is often used along the moustache and borders. Many beard plans use both. <a href="<?= e(DELHI_BEARD_HUB) ?>#techniques">Both techniques for the beard compared</a>.</p>
    </div>
    <ul class="ht-patterns mt-4">
      <?php foreach ([
          '/beard-transplant-in-rohini'          => 'Beard transplant at the Rohini clinic',
          '/beard-transplant-cost-in-rohini'     => 'Beard transplant cost',
          '/eyebrow-transplant-in-rohini'        => 'Eyebrow transplant',
          '/alopecia-areata-treatment-in-rohini' => 'Alopecia areata (not surgery)',
      ] as $href => $anchor): ?>
      <li><a href="<?= e($href) ?>"><?= e($anchor) ?> <?= icon('arrow', 14) ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/** Cost in brief for an area page, with the factors and where to read more. */
function delhi_beard_cost_brief(): string
{
    ob_start(); ?>
<section class="section ht-sec section--white" id="cost">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Cost</p>
        <h2 class="h2 mt-2">How a Beard Transplant Is Priced</h2>
        <p class="body mt-3 measure">There is no fixed price. The graft count follows the zones in your design and the hair already growing there, and the estimate follows the graft count, the technique and what it covers. It is itemised and given in writing after your examination, before any date is booked.</p>
        <ul class="ht-patterns mt-4">
          <li><a href="/beard-transplant-cost-in-rohini">Rohini beard cost guide <?= icon('arrow', 14) ?></a></li>
          <li><a href="/cost-and-emi-options">EMI and payment <?= icon('arrow', 14) ?></a></li>
        </ul>
      </div>
      <div class="factor-list">
        <div class="factor tone--mint"><span class="icon-dot"><?= icon('chart', 20) ?></span><div><b>Zones and grafts</b><span>The cheeks, jaw, moustache, chin or sideburns in your design.</span></div></div>
        <div class="factor tone--violet"><span class="icon-dot"><?= icon('beard', 20) ?></span><div><b>Existing growth</b><span>Filling gaps takes fewer grafts than building from bare skin.</span></div></div>
        <div class="factor tone--sky"><span class="icon-dot"><?= icon('scale', 20) ?></span><div><b>Complexity</b><span>Scar tissue, slow lip-border work or a planned second session.</span></div></div>
      </div>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}
