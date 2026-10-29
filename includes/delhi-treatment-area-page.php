<?php
/**
 * The Delhi area page of a treatment in DELHI_TREATMENTS, /<key>-in-<area>.
 * The root stub sets $treatment and $slug and requires this. Laid out as the
 * hair transplant area pages (includes/delhi-area-page.php): the area's own
 * route, landmarks and questions, with the treatment's copy from
 * includes/delhi-treatments/<key>.php ('area', plus the pillar's steps, cost
 * factors and links). Area pages link up to their pillar and never to each
 * other (client, 27 Oct 2026). Rohini has no page here: the treatment's own
 * Rohini page stands for it.
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/schema.php';
require_once __DIR__ . '/gallery-manifest.php';
require_once __DIR__ . '/delhi-treatment-sections.php';

$key  = $treatment ?? '';
$meta = DELHI_TREATMENTS[$key] ?? null;
$area = $meta === null || ($slug ?? 'rohini') === 'rohini' ? null : (DELHI_SERVICE_AREAS[$slug] ?? null);
if ($area === null) {
    require __DIR__ . '/../404.php';
    exit;
}
$hub = delhi_treatment_hub($key);
if (!$area['live']) {
    header('Location: ' . $hub, true, 301);
    exit;
}

$c     = delhi_treatment_copy($key);
$a     = $c['area'];
$name  = $meta['name'];
$place = $area['name'];
$vars  = ['{area}' => $place, '{hub}' => $hub, '{name}' => $name];
$url   = delhi_treatment_url($key, $slug);
$metro = $area['metro'];
$pins  = $area['pins'];
$where = $area['district'] ?? DELHI_SERVICE_ZONES[$area['zone']];
$h1    = $name . ' in ' . $place;

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => $name . ' in Delhi', 'url' => $hub],
    ['name' => $place],
];

$stations = array_map(
    static fn (array $m): string => $m[0] . ' (' . $m[1] . (isset($m[2]) ? '; ' . $m[2] : '') . ')',
    $metro
);
$stationList = count($stations) > 1
    ? implode(', ', array_slice($stations, 0, -1)) . ' and ' . end($stations)
    : ($stations[0] ?? '');

$faqs = array_map(static fn (array $f): array => [
    'q' => dt_fill($f['q'], $vars),
    'a' => dt_fill(strtr($f['a'], ['{route}' => $area['route']]), $vars),
], $a['faqs']);

/* Title and description: the longest form that fits (title_fits(): 60
   characters, 561px; descriptions 155 characters). The title is never the
   bare H1, which crawlers report as a duplicate. */
$title = fit_title(
    $h1 . ', Delhi | DenceSpot Rohini',
    $h1 . ', Delhi | DenceSpot',
    $h1 . ' | DenceSpot',
    $h1 . ', Delhi',
    $h1 . ' | Rohini',
);
foreach ($a['descriptions'] as $description) {
    $description = dt_fill($description, $vars);
    if (mb_strlen($description) <= 155) {
        break;
    }
}

$lname = strtolower($name);
$page  = [
    'title'          => $title,
    'description'    => $description,
    'url'            => $url,
    'body_class'     => 'tx-rich',
    'crumbs'         => $crumbs,
    'location'       => 'rohini',
    'location_links' => false,
    'keywords'       => [$lname . ' in ' . $place, $lname . ' ' . $place . ' delhi', $lname . ' near ' . $place, $lname . ' clinic near ' . $place, $lname . ' in delhi', SITE_NAME],
    'schema'         => [
        schema_delhi_clinic(),
        schema_breadcrumbs($crumbs),
        schema_faq($url, $faqs),
    ],
];

$hours = 'Open ' . str_replace(' · ', ', ', LOC_DELHI_HOURS_DISPLAY);

require __DIR__ . '/header.php';
?>

<?= delhi_hero([
    'pill'      => $place . ' · Clinic in Rohini, Delhi',
    'title'     => $h1,
    'lead'      => 'DenceSpot does not have a clinic in ' . $place . ': patients from ' . $place . ' are seen at our clinic in Rohini, North-West Delhi. ' . dt_fill($a['lead'], $vars),
    'feats'     => [['pin', 'Clinic in Rohini, Delhi'], ...$a['feats']],
    'treatment' => $c['form_treatment'],
]) ?>

<!-- 1. Coming from the area -->
<section class="section ht-sec ht-overview-sec" id="getting-there">
  <div class="wrap">
    <div class="ht-overview">
      <div class="ht-overview__text">
        <p class="eyebrow"><?= e('Coming from ' . $place) ?></p>
        <h2 class="h2 mt-2"><?= e(dt_fill($a['heading'], $vars)) ?></h2>
        <p class="body mt-3"><?= e($area['about'] . ' ' . dt_fill($a['visits_line'], $vars)) ?></p>
        <h3 class="h4 mt-4">Getting to the Rohini Clinic</h3>
        <p class="body mt-2"><?= e($area['route']) ?> Open the clinic on Google Maps for the route from your door.</p>
        <h3 class="h4 mt-4"><?= e($a['day_heading']) ?></h3>
        <p class="body mt-2"><?= e(dt_fill($a['day'], $vars)) ?></p>
        <?php if ($metro !== []): ?>
        <p class="meta mt-4">Area and metro names from OpenStreetMap (© OpenStreetMap contributors, ODbL) and Wikidata. Several Delhi Metro stations were renamed in 2025–26.</p>
        <?php endif; ?>
      </div>

      <?= dt_middle($c['middle']) ?>

      <?= delhi_glance(array_values(array_filter([
          ['pin', 'mint', $place, $where . ($pins !== [] ? ' · PIN ' . implode(', ', $pins) : '')],
          $metro !== [] ? ['list', 'violet', 'Metro nearby', implode(', ', array_map(static fn (array $m): string => $m[0], $metro))] : null,
          ['shield', 'sky', 'Clinic', 'Rohini, North-West Delhi'],
          ['clock', 'amber', 'Clinic hours', LOC_DELHI_HOURS_DISPLAY . ' · ' . LOC_DELHI_HOURS_NOTE],
      ])), $place . ' and the Rohini clinic at a glance') ?>
    </div>
  </div>
</section>

<!-- 2. Planning your visits, beside the clinic's map -->
<?= delhi_band([
    'id'      => 'visits',
    'eyebrow' => 'Planning your visits',
    'heading' => 'Planning Your Visits From ' . $place,
    'intro'   => dt_fill($a['visits_intro'], $vars) . ($stationList !== '' ? ' Metro stations near ' . $place . ': ' . $stationList . '.' : ''),
    'icons'   => [...$a['visit_icons'], ['clock', $hours], ['whatsapp', 'Send Photos on WhatsApp']],
    'media'   => 'map',
]) ?>

<?php if (!empty($c['results'])): ?>
<!-- Before-and-after results -->
<?= delhi_results() ?>
<?php endif; ?>

<!-- 3. The doctors -->
<?= delhi_doctors() ?>

<!-- 4. The treatment, in brief -->
<?= dt_options_brief(dt_fill($a['options_heading'], $vars), dt_fill($a['options_html'], $vars), $c['options']['related']) ?>

<!-- 5. How it works -->
<?= dt_steps($c['steps']) ?>

<!-- 6. Cost -->
<?= dt_cost_brief(dt_fill($a['cost_heading'], $vars), dt_fill($a['cost_intro'], $vars), array_slice($c['cost']['factors'], 0, 3), $c['cost']['links']) ?>

<!-- 7. FAQs -->
<?php /* Headings over 70 characters are reported by crawlers; long ones take a short form. */ ?>
<?= delhi_faqs(
    mb_strlen($name . ': Questions From ' . $place) <= 70 ? $name . ': Questions From ' . $place : 'Questions From ' . $place,
    $faqs,
    4,
    $c['faq_about']
) ?>

<!-- 8. Consultation -->
<?= delhi_consult(
    mb_strlen('Book a ' . $name . ' Consultation From ' . $place) <= 70
        ? 'Book a ' . $name . ' Consultation From ' . $place
        : 'Book a Consultation From ' . $place,
    dt_fill($a['consult_intro'], $vars),
    $key . '-in-' . $slug,
    $c['form']
) ?>

<?php require __DIR__ . '/footer.php'; ?>
