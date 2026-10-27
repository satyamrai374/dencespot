<?php
/**
 * Sections shared by the generic Delhi treatment pillar
 * (includes/delhi-treatment-pillar.php) and area pages
 * (includes/delhi-treatment-area-page.php). They are the hair transplant
 * Delhi sections (includes/delhi-localities.php) with the treatment's own copy
 * from includes/delhi-treatments/<key>.php ($c below). Every page is a Rohini
 * page: Rohini clinic only, no Gurugram clinic, no AI images.
 */

declare(strict_types=1);

require_once __DIR__ . '/delhi-localities.php';

/** The treatment's copy, includes/delhi-treatments/<key>.php. */
function delhi_treatment_copy(string $key): array
{
    static $cache = [];
    return $cache[$key] ??= require __DIR__ . '/delhi-treatments/' . $key . '.php';
}

/** Replace {area}, {name}, {hub} in copy. */
function dt_fill(string $text, array $vars): string
{
    return strtr($text, $vars);
}

/** The middle slot of the overview: the recorded scalp case ('case') or a two-column card. */
function dt_middle(array|string $middle): string
{
    if ($middle === 'case') {
        return delhi_case_pair();
    }
    ob_start(); ?>
<div class="card band-card">
  <div class="band-card__head">
    <h3 class="h4"><?= e($middle['heading']) ?></h3>
    <p><?= e($middle['sub']) ?></p>
  </div>
  <div class="table-scroll">
    <table class="data data--fit">
      <caption class="sr-only"><?= e($middle['heading'] . ' — ' . $middle['sub']) ?></caption>
      <thead>
        <tr><th scope="col"><?= e($middle['cols'][0]) ?></th><th scope="col"><?= e($middle['cols'][1]) ?></th></tr>
      </thead>
      <tbody>
        <?php foreach ($middle['rows'] as [$a, $b]): ?>
        <tr>
          <th scope="row" style="color:var(--ink);font-size:14px;font-weight:700;text-transform:none;letter-spacing:0"><?= e($a) ?></th>
          <td style="font-weight:700;color:var(--tone-mint)"><?= e($b) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php if (($middle['note'] ?? '') !== ''): ?>
  <p class="meta" style="padding:12px 22px 18px"><?= e($middle['note']) ?></p>
  <?php endif; ?>
</div>
<?php
    return (string) ob_get_clean();
}

/** Factor rows: [[icon, tone, bold, text]]. */
function dt_factors(array $rows): string
{
    $out = '<div class="factor-list">';
    foreach ($rows as [$ic, $tone, $b, $txt]) {
        $out .= '<div class="factor tone--' . e($tone) . '"><span class="icon-dot">' . icon($ic, 20) . '</span><div><b>' . e($b) . '</b><span>' . e($txt) . '</span></div></div>';
    }
    return $out . '</div>';
}

/** Pill links: [url => anchor]. */
function dt_links(array $links, string $class = 'ht-patterns'): string
{
    $out = '<ul class="' . $class . '">';
    foreach ($links as $href => $anchor) {
        $out .= '<li><a href="' . e($href) . '">' . e($anchor) . ' ' . icon('arrow', 14) . '</a></li>';
    }
    return $out . '</ul>';
}

/** Suitability: who it may suit, when to wait, and a note. */
function dt_suit(array $s): string
{
    ob_start(); ?>
<section class="section ht-sec section--white" id="suitability">
  <div class="wrap">
    <div style="max-width:68ch">
      <p class="eyebrow">Suitability</p>
      <h2 class="h2 mt-2"><?= e($s['heading']) ?></h2>
      <p class="body mt-3"><?= e($s['intro']) ?></p>
    </div>

    <div class="ht-tech">
      <div class="card card--pad-lg tech-card tone--mint">
        <span class="icon-dot"><?= icon('check', 24) ?></span>
        <h3 class="h3"><?= e($s['yes']['heading']) ?></h3>
        <?= ticks($s['yes']['items'], false) ?>
      </div>

      <div class="card card--pad-lg tech-card tone--amber">
        <span class="icon-dot"><?= icon('alert', 24) ?></span>
        <h3 class="h3"><?= e($s['wait']['heading']) ?></h3>
        <?= ticks($s['wait']['items'], false) ?>
      </div>

      <div class="tint-card tone--sky ht-tech__choose">
        <h3 class="h4"><?= e($s['note']['heading']) ?></h3>
        <?php foreach ($s['note']['paras'] as $html): ?>
        <p class="body-s mt-3"><?= $html ?></p>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/**
 * The other Delhi pillars in a treatment's LOCATION_LINKS group, so each
 * pillar links its siblings (the hand-built hair transplant, beard and laser
 * pillars included). Only pillars whose page exists.
 */
function dt_sibling_pillars(string $key): array
{
    $group = DELHI_TREATMENTS[$key]['group'];
    $links = match ($group) {
        'Hair Transplant'            => [DELHI_HT_HUB => 'Hair Transplant in Delhi'],
        'Beard & Eyebrow Transplant' => [DELHI_BEARD_HUB => 'Beard Transplant in Delhi'],
        'Skin & Laser'               => [DELHI_LASER_HUB => 'Laser Hair Removal in Delhi'],
        default                      => [],
    };
    foreach (DELHI_TREATMENTS as $other => $t) {
        if ($other !== $key && $t['group'] === $group) {
            $links[delhi_treatment_hub($other)] = $t['name'] . ' in Delhi';
        }
    }
    $root = dirname(__DIR__);
    return array_filter($links, static fn (string $a, string $url): bool => is_file($root . $url . '.php'), ARRAY_FILTER_USE_BOTH);
}

/** Options or techniques: two cards, how the doctor chooses, related links, sibling pillars. */
function dt_options(array $o, array $siblings = [], string $siblingsHeading = ''): string
{
    ob_start(); ?>
<section class="section ht-sec section--white" id="options">
  <div class="wrap">
    <div style="max-width:68ch">
      <p class="eyebrow"><?= e($o['eyebrow']) ?></p>
      <h2 class="h2 mt-2"><?= e($o['heading']) ?></h2>
      <p class="body mt-3"><?= e($o['intro']) ?></p>
    </div>

    <div class="ht-tech">
      <?php foreach ($o['cards'] as [$ic, $tone, $title, $text, $items]): ?>
      <div class="card card--pad-lg tech-card tone--<?= e($tone) ?>">
        <span class="icon-dot"><?= icon($ic, 24) ?></span>
        <h3 class="h3"><?= e($title) ?></h3>
        <p class="body-s mt-2"><?= e($text) ?></p>
        <?= ticks($items, false) ?>
      </div>
      <?php endforeach; ?>

      <div class="tint-card tone--sky ht-tech__choose">
        <h3 class="h4"><?= e($o['choose']['heading']) ?></h3>
        <div class="mt-3"><?= ticks($o['choose']['items'], false) ?></div>
      </div>
    </div>

    <h3 class="h4 mt-6"><?= e($o['related_heading']) ?></h3>
    <?= dt_links($o['related']) ?>
    <?php if ($siblings !== []): ?>
    <h3 class="h4 mt-5"><?= e($siblingsHeading) ?></h3>
    <?= dt_links($siblings) ?>
    <?php endif; ?>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/** Options in brief, for an area page; the depth is on the pillar. */
function dt_options_brief(string $heading, string $html, array $links): string
{
    ob_start(); ?>
<section class="section ht-sec section--white" id="options">
  <div class="wrap">
    <div style="max-width:68ch">
      <p class="eyebrow">Treatment</p>
      <h2 class="h2 mt-2"><?= e($heading) ?></h2>
      <p class="body mt-3"><?= $html ?></p>
    </div>
    <?= dt_links($links, 'ht-patterns mt-4') ?>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/** The five steps, with icons in the circles. */
function dt_steps(array $s): string
{
    ob_start(); ?>
<section class="section ht-sec section--canvas ht-process" id="process">
  <div class="wrap">
    <p class="eyebrow"><?= e($s['eyebrow'] ?? 'How it works') ?></p>
    <h2 class="h2 mt-2"><?= e($s['heading']) ?></h2>
    <p class="body mt-2"><?= e($s['intro']) ?></p>

    <ol class="ht-steps">
      <?php foreach ($s['items'] as $i => [$ic, $title, $text]): ?>
      <li class="ht-step">
        <span class="ht-step__img ht-step__img--icon"><?= icon($ic, 40, 'currentColor', 1.6) ?></span>
        <span class="ht-step__num"><?= sprintf('%02d', $i + 1) ?></span>
        <h3 class="ht-step__title"><?= e($title) ?></h3>
        <p class="ht-step__text"><?= e($text) ?></p>
      </li>
      <?php endforeach; ?>
    </ol>

    <?php if (($s['note_html'] ?? '') !== ''): ?>
    <p class="ht-steps__note"><?= $s['note_html'] ?></p>
    <?php endif; ?>
    <div class="ht-center mt-5">
      <a class="btn btn--ink" href="#consultation"><?= icon('calendar', 17) ?> Book a Consultation</a>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/** Aftercare: a timeline beside practical points for Delhi. */
function dt_aftercare(array $a): string
{
    ob_start(); ?>
<section class="section ht-sec section--white" id="aftercare">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow"><?= e($a['eyebrow']) ?></p>
        <h2 class="h2 mt-2"><?= e($a['heading']) ?></h2>
        <p class="body mt-3 measure"><?= e($a['intro']) ?></p>
        <div class="mt-4"><?= ticks($a['timeline'], false) ?></div>
      </div>
      <div>
        <h3 class="h4"><?= e($a['tips_heading']) ?></h3>
        <?= dt_factors($a['tips']) ?>
      </div>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/** Cost on the pillar: factors, what the estimate sets out, where to read more. */
function dt_cost(array $c): string
{
    ob_start(); ?>
<section class="section ht-sec section--canvas" id="cost">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Cost</p>
        <h2 class="h2 mt-2"><?= e($c['heading']) ?></h2>
        <p class="body mt-3 measure"><?= e($c['intro']) ?></p>
        <?= dt_factors($c['factors']) ?>
        <?php if (($c['meta'] ?? '') !== ''): ?>
        <p class="meta mt-4 measure"><?= e($c['meta']) ?></p>
        <?php endif; ?>
        <div class="btn-row mt-5">
          <a class="btn btn--ink" href="#consultation"><?= icon('calendar', 17) ?> Get Your Written Estimate</a>
        </div>
        <?= dt_links($c['links'], 'ht-patterns mt-3') ?>
      </div>

      <div>
        <div class="tint-card tone--mint">
          <h3 class="h4"><?= e($c['estimate']['heading']) ?></h3>
          <div class="mt-3"><?= ticks($c['estimate']['items'], false) ?></div>
          <?php if (($c['estimate']['note'] ?? '') !== ''): ?>
          <p class="body-s mt-4"><?= e($c['estimate']['note']) ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/** Cost in brief, for an area page. */
function dt_cost_brief(string $heading, string $intro, array $factors, array $links): string
{
    ob_start(); ?>
<section class="section ht-sec section--white" id="cost">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Cost</p>
        <h2 class="h2 mt-2"><?= e($heading) ?></h2>
        <p class="body mt-3 measure"><?= e($intro) ?></p>
        <?= dt_links($links, 'ht-patterns mt-4') ?>
      </div>
      <?= dt_factors($factors) ?>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/** Reviews: the Rohini clinic's own Google profile (location rule). */
function dt_reviews(): string
{
    ob_start(); ?>
<section class="section section--white ht-sec" id="reviews">
  <div class="wrap">
    <div class="measure" style="text-align:center;margin-inline:auto">
      <span class="pill pill--dot">Patient reviews</span>
      <h2 class="h2 mt-2">Reviews of Our Rohini Clinic on Google</h2>
      <p class="body mt-3">Reviews of DenceSpot’s Rohini clinic are on its Google Business Profile, unedited and in each reviewer’s own words. This page does not reproduce testimonials.</p>
    </div>
    <div class="btn-row mt-5" style="justify-content:center">
      <a class="btn btn--ink" href="<?= e(LOC_DELHI_MAPS_URL) ?>" target="_blank" rel="noopener"><?= icon('star', 18) ?> Read Rohini Clinic Reviews on Google<span class="sr-only"> (opens in a new tab)</span></a>
      <a class="btn btn--outline" href="/patient-reviews">How we collect reviews</a>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}
