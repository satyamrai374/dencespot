<?php
/**
 * A Gurugram area page, /<treatment>-in-<area> (client, 28 Oct 2026: the
 * Delhi strategy for Gurgaon). The root stub sets $treatment (a key of
 * GURGAON_TREATMENTS) and $slug (a key of GURGAON_SERVICE_AREAS) and requires
 * this. Laid out as the Delhi area pages (includes/delhi-treatment-area-page.php)
 * for the Gurugram clinic: it books, calls and messages that clinic, names
 * only it, and links up to the treatment's Gurgaon page (the parent) and never
 * to another area page.
 *
 * COPY SCHEMA — includes/gurgaon-treatments/<key>.php returns this array.
 * Plain strings are escaped; *_html, 'note_html' and FAQ answers are HTML
 * (links only to Gurgaon pages, neutral pages or /blog/ posts; never a Rohini
 * or Delhi page). {area} is the area's name, {route} the way to the clinic
 * from it, {parent} the treatment's Gurgaon page. Limits: H2 ≤70 characters
 * for every area, descriptions ≤155 (the first that fits wins), no word from
 * the strict-wording list.
 *
 *   'form_treatment' => booking preset, e.g. 'Hair PRP / GFC'
 *   'form'           => enquiry form options, last 'Not sure — please advise'
 *   'faq_about'      => "Anything specific to your … is answered at the consultation"
 *   'middle'         => 'case' (the recorded FUE case; hair transplant only) or
 *                       ['heading', 'sub', 'cols' => [a, b], 'rows' => [[a, b], …], 'note']
 *   'results'        => bool, the consented scalp before/after row (hair transplant only)
 *   'steps'          => ['eyebrow', 'heading', 'intro', 'items' => [[icon, title, text] ×5], 'note_html']
 *   'cost'           => ['factors' => [[icon, tone, bold, text] ×3], 'links' => [url => anchor]]
 *   'related'        => [url => anchor]   the treatment's Gurgaon page first
 *   'area'           => ['lead', 'feats' => [[icon, label] ×3], 'heading', 'visits_line', 'day_heading',
 *                        'day', 'visits_intro', 'visit_icons' => [[icon, label] ×4], 'options_heading',
 *                        'options_html', 'cost_heading', 'cost_intro', 'faqs' => [['q', 'a'] ×7],
 *                        'consult_intro', 'descriptions' => [string ×3]]
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/schema.php';
require_once __DIR__ . '/gallery-manifest.php';
require_once __DIR__ . '/delhi-treatment-sections.php';
require_once __DIR__ . '/gurgaon-service-areas.php';

$key  = $treatment ?? '';
$meta = GURGAON_TREATMENTS[$key] ?? null;
$area = $meta === null ? null : (GURGAON_SERVICE_AREAS[$slug ?? ''] ?? null);
if ($area === null) {
    require __DIR__ . '/../404.php';
    exit;
}
$parent = $meta['parent'];
if (!$area['live'] || !gurgaon_areas_built($key)) {
    header('Location: ' . $parent, true, 301);
    exit;
}

$c     = require __DIR__ . '/gurgaon-treatments/' . $key . '.php';
$a     = $c['area'];
$name  = $meta['name'];
$place = $area['name'];
$full  = $area['full'] ?? $place;            // "Sector 14, Gurgaon": sectors and MG Road name the city
$prep  = $area['prep'] ?? 'in';              // "on Golf Course Road"
$metro = $area['metro'];
$where = GURGAON_SERVICE_ZONES[$area['zone']];
$url   = gurgaon_treatment_url($key, $slug);
$h1    = $name . ' in ' . $full;
$route = 'Most people from ' . $place . ' come by car, cab or auto. The clinic is on Sector 39 Road in Jharsa, ' . NAP_LANDMARK
       . ', so the Medanta gate is the landmark to give a driver.';
$vars  = ['{area}' => $place, '{parent}' => $parent, '{hub}' => $parent, '{name}' => $name, '{route}' => $route];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => $name . ' in Gurgaon', 'url' => $parent],
    ['name' => $place],
];

$stations = array_map(static fn (array $m): string => $m[0] . ' (' . $m[1] . ')', $metro);
$stationList = count($stations) > 1
    ? implode(', ', array_slice($stations, 0, -1)) . ' and ' . end($stations)
    : ($stations[0] ?? '');

$faqs = array_map(static fn (array $f): array => [
    'q' => dt_fill($f['q'], $vars),
    'a' => dt_fill($f['a'], $vars),
], $a['faqs']);

/* Title and description: the longest form that fits (title_fits(): 60
   characters, 561px; descriptions 155 characters). The title is never the
   bare H1, which crawlers report as a duplicate. */
$cityInH1 = isset($area['full']);
$short    = ($meta['short'] ?? preg_replace('/ Treatment$/', '', $name)) . ' in ' . $full;   // long names shorten last
$title = fit_title(...array_values(array_filter([
    $cityInH1 ? null : $h1 . ', Gurgaon | DenceSpot',
    $h1 . ' | DenceSpot Gurugram',
    $h1 . ' | DenceSpot',
    $cityInH1 ? null : $h1 . ', Gurgaon',
    $h1 . ' | Gurugram',
    $cityInH1 ? null : $short . ', Gurgaon',
    $short . ' | DenceSpot',
    $short !== $h1 ? $short : null,
])));
foreach ($a['descriptions'] as $description) {
    $description = dt_fill($description, ['{area}' => $full] + $vars);
    if (mb_strlen($description) <= 155) {
        break;
    }
}

$lname  = strtolower($name);
$lplace = strtolower($place);
$page   = [
    'title'          => $title,
    'description'    => $description,
    'url'            => $url,
    'body_class'     => 'tx-rich',
    'crumbs'         => $crumbs,
    'location'       => 'gurgaon',
    'location_links' => false,
    'keywords'       => [$lname . ' in ' . $lplace, $lname . ' ' . $lplace . ' gurgaon', $lname . ' near ' . $lplace, $lname . ' clinic near ' . $lplace, $lname . ' in gurgaon', SITE_NAME],
    'schema'         => [
        schema_clinic(),
        schema_breadcrumbs($crumbs),
        schema_faq($url, $faqs),
    ],
];

$hours = 'Open ' . str_replace(' · ', ', ', HOURS_DISPLAY);

require __DIR__ . '/header.php';
?>

<?= delhi_hero([
    'pill'      => $place . ' · Clinic in Sector 39, Gurugram',
    'title'     => $h1,
    'lead'      => 'DenceSpot does not have a clinic ' . $prep . ' ' . $place . ': patients from ' . $place . ' are seen at our clinic in Sector 39, Gurugram, ' . NAP_LANDMARK . '. ' . dt_fill($a['lead'], $vars),
    'feats'     => [['pin', 'Clinic in Sector 39, Gurugram'], ...$a['feats']],
    'treatment' => $c['form_treatment'],
    'clinic'    => 'gurgaon',
]) ?>

<!-- 1. Coming from the area -->
<section class="section ht-sec ht-overview-sec" id="getting-there">
  <div class="wrap">
    <div class="ht-overview">
      <div class="ht-overview__text">
        <p class="eyebrow"><?= e('Coming from ' . $place) ?></p>
        <h2 class="h2 mt-2"><?= e(dt_fill($a['heading'], $vars)) ?></h2>
        <p class="body mt-3"><?= e($area['about'] . ' ' . dt_fill($a['visits_line'], $vars)) ?></p>
        <h3 class="h4 mt-4">Getting to the Gurugram Clinic</h3>
        <p class="body mt-2"><?= e($route) ?> Open the clinic on Google Maps for the route from your door.</p>
        <h3 class="h4 mt-4"><?= e($a['day_heading']) ?></h3>
        <p class="body mt-2"><?= e(dt_fill($a['day'], $vars)) ?></p>
      </div>

      <?= dt_middle($c['middle']) ?>

      <?= delhi_glance(array_values(array_filter([
          ['pin', 'mint', $place, $where],
          $metro !== [] ? ['list', 'violet', 'Metro in ' . $place, implode(', ', array_map(static fn (array $m): string => $m[0], $metro))] : null,
          ['shield', 'sky', 'Clinic', 'Sector 39, Gurugram · ' . ucfirst(NAP_LANDMARK)],
          ['clock', 'amber', 'Clinic hours', HOURS_DISPLAY . ' · ' . HOURS_NOTE],
      ])), $place . ' and the Gurugram clinic at a glance') ?>
    </div>
  </div>
</section>

<!-- 2. Planning your visits, beside the clinic's map -->
<?= delhi_band([
    'id'      => 'visits',
    'eyebrow' => 'Planning your visits',
    'heading' => 'Planning Your Visits From ' . $place,
    'intro'   => dt_fill($a['visits_intro'], $vars) . ($stationList !== '' ? ' Metro stations in ' . $place . ': ' . $stationList . '.' : ''),
    'icons'   => [...$a['visit_icons'], ['clock', $hours], ['whatsapp', 'Send Photos on WhatsApp']],
    'media'   => 'map',
    'clinic'  => 'gurgaon',
]) ?>

<?php if (!empty($c['results'])): ?>
<!-- Before-and-after results -->
<?= delhi_results() ?>
<?php endif; ?>

<!-- 3. The doctors -->
<?= delhi_doctors('gurgaon') ?>

<!-- 4. The treatment, in brief -->
<?= dt_options_brief(dt_fill($a['options_heading'], $vars), dt_fill($a['options_html'], $vars), $c['related']) ?>

<!-- 5. How it works -->
<?= dt_steps($c['steps']) ?>

<!-- 6. Cost -->
<?= dt_cost_brief(dt_fill($a['cost_heading'], $vars), dt_fill($a['cost_intro'], $vars), $c['cost']['factors'], $c['cost']['links']) ?>

<!-- 7. FAQs -->
<?php /* Headings over 70 characters are reported by crawlers; long ones take a short form. */ ?>
<?= delhi_faqs(
    mb_strlen($name . ': Questions From ' . $place) <= 70 ? $name . ': Questions From ' . $place : 'Questions From ' . $place,
    $faqs,
    4,
    $c['faq_about'],
    'gurgaon'
) ?>

<!-- 8. Consultation -->
<?= delhi_consult(
    mb_strlen('Book a ' . $name . ' Consultation From ' . $place) <= 70
        ? 'Book a ' . $name . ' Consultation From ' . $place
        : 'Book a Consultation From ' . $place,
    dt_fill($a['consult_intro'], $vars),
    $key . '-in-' . $slug,
    $c['form'],
    'gurgaon'
) ?>

<?php require __DIR__ . '/footer.php'; ?>
