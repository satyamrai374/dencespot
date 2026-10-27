<?php
/**
 * The Delhi laser hair removal area pages, one PHP file per area in the site
 * root (laser-hair-removal-in-pitampura.php …), each setting $slug and
 * requiring this file. Areas and facts: includes/delhi-service-areas.php;
 * shared sections: includes/delhi-laser.php. The section order follows the
 * /laser-hair-removal-in-delhi pillar, with the area's own route, landmarks
 * and questions in place of the pillar's depth, which it links to. Area pages
 * do not link to each other: only the pillar links them (client, 27 Oct 2026).
 *
 * Rohini has no page here: /laser-hair-removal-in-rohini is the clinic's own
 * laser page, and $slug 'rohini' redirects there.
 *
 * A course of laser means six or more visits, so each page says plainly that
 * every session is at the Rohini clinic and that the journey from the area
 * is part of the decision.
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/schema.php';
require_once __DIR__ . '/delhi-laser.php';

$area = DELHI_SERVICE_AREAS[$slug ?? ''] ?? null;
if ($area === null) {
    require __DIR__ . '/../404.php';
    exit;
}
if ($slug === 'rohini') {
    header('Location: ' . delhi_laser_url('rohini'), true, 301);
    exit;
}
if (!$area['live']) {
    header('Location: ' . DELHI_LASER_HUB, true, 301);
    exit;
}

$name   = $area['name'];
$url    = delhi_laser_url($slug);
$metro  = $area['metro'];
$pins   = $area['pins'];
$where  = $area['district'] ?? DELHI_SERVICE_ZONES[$area['zone']];
$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Laser Hair Removal in Delhi', 'url' => DELHI_LASER_HUB],
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
     'a' => 'No. DenceSpot’s one clinic in Delhi is in Rohini, North-West Delhi, and the assessment, the patch test and every laser session for patients from ' . $name . ' take place there. The Directions button opens its exact location on Google Maps.'],
    ['q' => 'How do I get to the Rohini clinic from ' . $name . '?',
     'a' => $area['route'] . ' Google Maps or the DMRC journey planner gives the quickest route from your door, and the clinic can help on WhatsApp.'],
    ['q' => 'How many trips to Rohini will a course need?',
     'a' => 'A first visit for the assessment and usually a patch test, then the sessions themselves: often six or more, every four to six weeks for the face and six to eight weeks or more for the body, so a course runs over several months. Some people come back later for an occasional top-up. Because the journey from ' . $name . ' repeats with each session, it is worth weighing before you start; your written plan gives the likely number of visits.'],
    ['q' => 'Does living in ' . $name . ' change the cost?',
     'a' => 'No. The cost follows the areas treated, their size and the number of sessions your skin and hair are likely to need, not where you live. It is explained after your assessment, with the factors set out in your plan.'],
    ['q' => 'Can I go back to work after a session?',
     'a' => 'Usually the same day. Skip hot baths, steam and hard workouts for a day or two, and keep treated skin out of the sun on the way home to ' . $name . ': cover it, and use sunscreen where it is exposed. Helmet straps and collars rubbing on the jaw or neck are worth avoiding for a day or so.'],
    ['q' => 'Is laser hair removal right for me?',
     'a' => 'Dark, coarse hair tends to respond most predictably. Grey, white, red and blonde hair responds poorly whatever the skin colour, darker skin is treated more cautiously after a patch test, and facial hair from PCOS or another hormonal cause needs medical assessment too. <a href="/blog/laser-hair-removal-for-pcos-facial-hair">Laser for PCOS facial hair</a> explains why. Suitability is decided at the assessment.'],
    ['q' => 'Can I send photos before travelling to Rohini?',
     'a' => 'Yes. Send photographs of the areas you would like treated to the clinic on WhatsApp and ask whether an assessment makes sense for you. Settings, a session range and a plan are only given after your skin and hair have been seen in person.'],
];

/* Title and description: the longest form that fits (title_fits(): 60
   characters, 561px; descriptions 155 characters). The title is never the
   bare H1, which crawlers report as a duplicate. */
$title = fit_title(
    'Laser Hair Removal in ' . $name . ', Delhi | DenceSpot',
    'Laser Hair Removal in ' . $name . ' | DenceSpot',
    'Laser Hair Removal in ' . $name . ', Delhi',
);
$descriptions = [
    'Laser hair removal for patients from ' . $name . ' at DenceSpot’s clinic in Rohini, Delhi: the patch test, sessions by area, the metro route, cost and FAQs.',
    'Laser hair removal for ' . $name . ' at DenceSpot’s Rohini clinic, Delhi: the patch test, sessions, the metro route, cost and FAQs.',
    'Laser hair removal for ' . $name . ' at DenceSpot’s Rohini clinic: patch test, sessions, cost and FAQs.',
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
    'keywords'       => ['laser hair removal in ' . $name, 'laser hair removal ' . $name . ' delhi', 'laser hair reduction ' . $name, 'laser hair removal near ' . $name, 'laser hair removal cost ' . $name, 'underarm laser hair removal ' . $name, SITE_NAME],
    'schema'         => [
        schema_delhi_clinic(),
        schema_breadcrumbs($crumbs),
        schema_faq($url, $faqs),
    ],
];

$hours = 'Open ' . str_replace(' · ', ', ', HOURS_DISPLAY);

require __DIR__ . '/header.php';
?>

<?= delhi_hero([
    'pill'      => $name . ' · Clinic in Rohini, Delhi',
    'title'     => 'Laser Hair Removal in ' . $name,
    'lead'      => 'DenceSpot does not have a clinic in ' . $name . ': patients from ' . $name . ' are seen at our clinic in Rohini, North-West Delhi. Laser hair removal there starts with an assessment of your skin and hair by a doctor and, usually, a patch test before the first full session.',
    'feats'     => [
        ['pin', 'Clinic in Rohini, Delhi'],
        ['user', 'Skin & hair assessed first'],
        ['shield', 'Patch test before a session'],
        ['doc', 'Written course plan'],
    ],
    'treatment' => 'Laser hair removal',
]) ?>

<!-- 1. Coming from the area -->
<section class="section ht-sec ht-overview-sec" id="getting-there">
  <div class="wrap">
    <div class="ht-overview">
      <div class="ht-overview__text">
        <p class="eyebrow"><?= e('Coming from ' . $name) ?></p>
        <h2 class="h2 mt-2">Laser Hair Removal for <?= e($name) ?> Residents</h2>
        <p class="body mt-3"><?= e($area['about']) ?> The assessment, the patch test and every session of the course take place at the Rohini clinic.</p>
        <h3 class="h4 mt-4">Getting to the Rohini Clinic</h3>
        <p class="body mt-2"><?= e($area['route']) ?> Open the clinic on Google Maps for the route from your door.</p>
        <h3 class="h4 mt-4">On Session Days</h3>
        <p class="body mt-2">Arrive with the area shaved and free of cream, deodorant or make-up. On the way back to <?= e($name) ?>, keep treated skin covered from the sun, and leave the gym, steam and hot baths for a day or two.</p>
        <?php if ($metro !== []): ?>
        <p class="meta mt-4">Area and metro names from OpenStreetMap (© OpenStreetMap contributors, ODbL) and Wikidata. Several Delhi Metro stations were renamed in 2025–26.</p>
        <?php endif; ?>
      </div>

      <?= delhi_laser_areas_card() ?>

      <?= delhi_glance(array_values(array_filter([
          ['pin', 'mint', $name, $where . ($pins !== [] ? ' · PIN ' . implode(', ', $pins) : '')],
          $metro !== [] ? ['list', 'violet', 'Metro nearby', implode(', ', array_map(static fn (array $m): string => $m[0], $metro))] : null,
          ['shield', 'sky', 'Clinic', 'Rohini, North-West Delhi'],
          ['clock', 'amber', 'Clinic hours', HOURS_DISPLAY . ' · ' . HOURS_NOTE],
      ])), $name . ' and the Rohini clinic at a glance') ?>
    </div>
  </div>
</section>

<!-- 2. Planning your visits, beside the clinic's map -->
<?= delhi_band([
    'id'      => 'visits',
    'eyebrow' => 'Planning your visits',
    'heading' => 'Planning a Laser Course From ' . $name,
    'intro'   => 'An assessment and patch test, then a session every four to eight weeks over several months — all at the Rohini clinic.' . ($stationList !== '' ? ' Metro stations near ' . $name . ': ' . $stationList . '.' : ''),
    'icons'   => [
        ['search', 'Skin & Hair Assessment'],
        ['shield', 'Patch Test First'],
        ['calendar', 'A Session Every 4–8 Weeks'],
        ['user', 'Back to Work the Same Day'],
        ['clock', $hours],
        ['whatsapp', 'Send Photos on WhatsApp'],
    ],
    'media'   => 'map',
]) ?>

<!-- 3. The doctors -->
<?= doctors_grid_section(
    'Our doctors',
    'Meet the Doctors at DenceSpot',
    'Every laser course starts with an assessment of your skin and hair by a doctor. The doctor who will see you at the Rohini clinic is named at your consultation, and you can ask about their qualifications, registration and experience with laser on your skin type.',
    'section--canvas ht-sec',
    page_review_signed_off()
) ?>

<!-- 4. Skin type -->
<?= delhi_laser_skin_brief() ?>

<!-- 5. The course -->
<?= delhi_laser_steps() ?>

<!-- 6. Cost -->
<?= delhi_laser_cost_brief() ?>

<!-- 7. FAQs -->
<?= delhi_faqs('Questions From ' . $name, $faqs, 4, 'skin, hair, health or budget') ?>

<!-- 8. Consultation -->
<?php /* Headings over 70 characters are reported by crawlers; long names take the short form. */ ?>
<?= delhi_consult(
    mb_strlen('Book a Laser Hair Removal Consultation From ' . $name) <= 70
        ? 'Book a Laser Hair Removal Consultation From ' . $name
        : 'Book a Consultation From ' . $name,
    'Book a first visit at the Rohini clinic for a day that suits you — it is open ' . HOURS_DISPLAY . '. The doctor looks at your skin and hair, usually arranges a patch test and gives you a written plan for the course; nothing is booked on the day unless you choose to.',
    'laser-hair-removal-in-' . $slug,
    DELHI_LASER_FORM
) ?>

<?php require __DIR__ . '/footer.php'; ?>
