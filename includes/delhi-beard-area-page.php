<?php
/**
 * The Delhi beard transplant area pages, one PHP file per area in the site
 * root (beard-transplant-in-pitampura.php …), each setting $slug and requiring
 * this file. Areas and their facts: includes/delhi-service-areas.php; beard
 * sections: includes/delhi-beard.php. Laid out as the hair transplant area
 * pages (includes/delhi-area-page.php), with the beard zone card in place of
 * the scalp photos and no results row (no consented beard photographs on
 * record). Area pages do not link to each other: only the
 * /beard-transplant-in-delhi pillar links them (as the client asked for the
 * hair transplant pages, 27 Oct 2026). Rohini has no page here; its beard page
 * is /beard-transplant-in-rohini.
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/schema.php';
require_once __DIR__ . '/delhi-beard.php';

$area = ($slug ?? 'rohini') === 'rohini' ? null : (DELHI_SERVICE_AREAS[$slug] ?? null);
if ($area === null) {
    require __DIR__ . '/../404.php';
    exit;
}
if (!$area['live']) {
    header('Location: ' . DELHI_BEARD_HUB, true, 301);
    exit;
}

$name    = $area['name'];
$url     = delhi_beard_url($slug);
$metro   = $area['metro'];
$pins    = $area['pins'];
$where   = $area['district'] ?? DELHI_SERVICE_ZONES[$area['zone']];
$crumbs  = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Beard Transplant in Delhi', 'url' => DELHI_BEARD_HUB],
    ['name' => $name],
];

$stations = array_map(
    static fn (array $m): string => $m[0] . ' (' . $m[1] . (isset($m[2]) ? '; ' . $m[2] : '') . ')',
    $metro
);
$stationList = count($stations) > 1
    ? implode(', ', array_slice($stations, 0, -1)) . ' and ' . end($stations)
    : ($stations[0] ?? '');

$faqs = [
    ['q' => 'Is there a DenceSpot clinic in ' . $name . '?',
     'a' => 'No. DenceSpot’s one clinic in Delhi is in Rohini, North-West Delhi, and the examination, beard design, procedure and reviews for patients from ' . $name . ' all take place there. The Directions button opens its exact location on Google Maps.'],
    ['q' => 'How do I get to the Rohini clinic from ' . $name . '?',
     'a' => $area['route'] . ' Google Maps or the DMRC journey planner gives the quickest route from your door, and the clinic can help on WhatsApp.'],
    ['q' => 'How many trips to Rohini will a beard transplant need?',
     'a' => 'Usually three kinds of visit: a consultation where your beard is examined and designed, the procedure day itself, and photographed reviews at set intervals through the first year. A full beard or scar work is sometimes planned over two sessions. Your written plan lists the visits, so you can plan the journeys from ' . $name . ' around them.'],
    ['q' => 'Does living in ' . $name . ' change the cost?',
     'a' => 'No. The estimate depends on your plan — the zones, the number of grafts, the technique and what it covers — not on where you live. It is itemised and given in writing after your examination. The <a href="/beard-transplant-cost-in-rohini">Rohini beard cost guide</a> explains how it is worked out.'],
    ['q' => 'How should I get home to ' . $name . ' after the procedure?',
     'a' => 'By car or cab, ideally with someone to accompany you. A two-wheeler means a helmet, whose cheek pads and chin strap press on fresh grafts, so riding waits until a review clears it. Your face will look treated for about a week, with small crusts and some swelling, so plan that week’s work and travel around it.'],
    ['q' => 'Is a beard transplant right for me?',
     'a' => 'Not always. It needs facial hair that has stopped changing, enough donor hair at the back and sides of the scalp and healthy skin in the beard area. A beard still filling in, or round bare patches that may be <a href="/alopecia-areata-treatment-in-rohini">alopecia areata</a>, usually mean waiting or medical treatment first. Suitability is decided at an examination.'],
    ['q' => 'Can I send photos before travelling to Rohini?',
     'a' => 'Yes. Send clear daylight photographs of your cheeks, jawline, moustache and chin, from the front and both sides, to the clinic on WhatsApp and ask whether a consultation makes sense for you. A graft estimate and a design are only given after an examination in person.'],
];

/* Title and description: the longest form that fits (title_fits(): 60
   characters, 561px; descriptions 155 characters). The title is never the
   bare H1, which crawlers report as a duplicate. */
$title = fit_title(
    'Beard Transplant in ' . $name . ', Delhi | DenceSpot Rohini',
    'Beard Transplant in ' . $name . ', Delhi | DenceSpot',
    'Beard Transplant in ' . $name . ' | DenceSpot',
    'Beard Transplant in ' . $name . ', Delhi',
);
$descriptions = [
    'Beard transplant for patients from ' . $name . ' at DenceSpot’s clinic in Rohini, Delhi: cheeks, jawline and moustache, the metro route, visits, cost and FAQs.',
    'Beard transplant for ' . $name . ' at DenceSpot’s Rohini clinic, Delhi: cheeks, jawline, moustache, the metro route, cost and FAQs.',
    'Beard transplant for ' . $name . ' at DenceSpot’s Rohini clinic: grafts by zone, cost and FAQs.',
];
foreach ($descriptions as $description) {
    if (mb_strlen($description) <= 155) {
        break;
    }
}

$page = [
    'title'          => $title,
    'description'    => $description,
    'url'            => $url,
    'body_class'     => 'tx-rich',
    'crumbs'         => $crumbs,
    'location'       => 'rohini',
    'location_links' => false,
    'keywords'       => ['beard transplant in ' . $name, 'beard transplant ' . $name . ' delhi', 'beard transplant near ' . $name, 'moustache transplant ' . $name, 'beard transplant cost ' . $name, SITE_NAME],
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
    'pill'      => $name . ' · Clinic in Rohini, Delhi',
    'title'     => 'Beard Transplant in ' . $name,
    'lead'      => 'DenceSpot does not have a clinic in ' . $name . ': patients from ' . $name . ' are seen at our clinic in Rohini, North-West Delhi. A beard transplant there starts with an examination of your face and donor area and a design drawn on your face, with the estimate in writing before any date is booked.',
    'feats'     => [
        ['pin', 'Clinic in Rohini, Delhi'],
        ['beard', 'Cheeks, jawline & moustache'],
        ['pencil', 'Beard drawn on your face'],
        ['doc', 'Written estimate first'],
    ],
    'treatment' => 'Beard transplant',
]) ?>

<!-- 1. Coming from the area -->
<section class="section ht-sec ht-overview-sec" id="getting-there">
  <div class="wrap">
    <div class="ht-overview">
      <div class="ht-overview__text">
        <p class="eyebrow"><?= e('Coming from ' . $name) ?></p>
        <h2 class="h2 mt-2">Beard Transplant for <?= e($name) ?> Residents</h2>
        <p class="body mt-3"><?= e($area['about']) ?> The consultation, the beard design, the procedure and every review take place at the Rohini clinic.</p>
        <h3 class="h4 mt-4">Getting to the Rohini Clinic</h3>
        <p class="body mt-2"><?= e($area['route']) ?> Open the clinic on Google Maps for the route from your door.</p>
        <h3 class="h4 mt-4">On the Procedure Day</h3>
        <p class="body mt-2">Plan a car or cab home to <?= e($name) ?> rather than a two-wheeler: a helmet’s cheek pads and chin strap press on fresh grafts. Expect your face to look treated for about a week, and keep the first review date in your written plan.</p>
        <?php if ($metro !== []): ?>
        <p class="meta mt-4">Area and metro names from OpenStreetMap (© OpenStreetMap contributors, ODbL) and Wikidata. Several Delhi Metro stations were renamed in 2025–26.</p>
        <?php endif; ?>
      </div>

      <?= delhi_beard_zones_card() ?>

      <?= delhi_glance(array_values(array_filter([
          ['pin', 'mint', $name, $where . ($pins !== [] ? ' · PIN ' . implode(', ', $pins) : '')],
          $metro !== [] ? ['list', 'violet', 'Metro nearby', implode(', ', array_map(static fn (array $m): string => $m[0], $metro))] : null,
          ['shield', 'sky', 'Clinic', 'Rohini, North-West Delhi'],
          ['clock', 'amber', 'Clinic hours', LOC_DELHI_HOURS_DISPLAY . ' · ' . LOC_DELHI_HOURS_NOTE],
      ])), $name . ' and the Rohini clinic at a glance') ?>
    </div>
  </div>
</section>

<!-- 2. Planning your visits, beside the clinic's map -->
<?= delhi_band([
    'id'      => 'visits',
    'eyebrow' => 'Planning your visits',
    'heading' => 'Planning Your Visits From ' . $name,
    'intro'   => 'A consultation with the beard design, the procedure as a day case, and photographed reviews through the first year — all at the Rohini clinic.' . ($stationList !== '' ? ' Metro stations near ' . $name . ': ' . $stationList . '.' : ''),
    'icons'   => [
        ['search', 'Consultation & Beard Design'],
        ['calendar', 'Procedure as a Day Case'],
        ['shield', 'Car or Cab Home on the Day'],
        ['camera', 'Photographed Reviews for a Year'],
        ['clock', $hours],
        ['whatsapp', 'Send Photos on WhatsApp'],
    ],
    'media'   => 'map',
]) ?>

<!-- 3. The doctors -->
<?= delhi_doctors() ?>

<!-- 4. Techniques -->
<?= delhi_beard_techniques_brief() ?>

<!-- 5. The procedure -->
<?= delhi_beard_steps() ?>

<!-- 6. Cost -->
<?= delhi_beard_cost_brief() ?>

<!-- 7. FAQs -->
<?= delhi_faqs('Beard Transplant Questions From ' . $name, $faqs, 4, 'beard, donor area, health or budget') ?>

<!-- 8. Consultation -->
<?php /* Headings over 70 characters are reported by crawlers; long names take the short form. */ ?>
<?= delhi_consult(
    mb_strlen('Book a Beard Transplant Consultation From ' . $name) <= 70
        ? 'Book a Beard Transplant Consultation From ' . $name
        : 'Book a Consultation From ' . $name,
    'Book a first visit at the Rohini clinic for a day that suits you — it is open ' . HOURS_DISPLAY . '. The doctor examines your beard and donor area, draws a design on your face and gives you an itemised written estimate; nothing is booked on the day unless you choose to.',
    'beard-transplant-in-' . $slug,
    DELHI_BEARD_FORM
) ?>

<?php require __DIR__ . '/footer.php'; ?>
