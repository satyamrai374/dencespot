<?php
/**
 * The Delhi hair transplant area pages, one PHP file per area in the site root
 * (hair-transplant-in-pitampura.php …), each setting $slug and requiring this
 * file. Areas, facts and rules: includes/delhi-service-areas.php. The section
 * order follows the /hair-transplant-in-delhi pillar (itself the Gurgaon
 * page's order), with the area's own route, landmarks and questions in place
 * of the pillar's depth, which it links to. Area pages do not link to each
 * other: only the pillar links them (client, 27 Oct 2026).
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/schema.php';
require_once __DIR__ . '/gallery-manifest.php';
require_once __DIR__ . '/delhi-localities.php';

$area = DELHI_SERVICE_AREAS[$slug ?? ''] ?? null;
if ($area === null) {
    require __DIR__ . '/../404.php';
    exit;
}
if (!$area['live']) {
    header('Location: ' . DELHI_HT_HUB, true, 301);
    exit;
}

$name    = $area['name'];
$url     = $area['url'];
$isHome  = $slug === 'rohini';   // the clinic's own area
$metro   = $area['metro'];
$pins    = $area['pins'];
$where   = $area['district'] ?? DELHI_SERVICE_ZONES[$area['zone']];
$crumbs  = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair Transplant in Delhi', 'url' => DELHI_HT_HUB],
    ['name' => $name],
];

$stations = array_map(
    static fn (array $m): string => $m[0] . ' (' . $m[1] . (isset($m[2]) ? '; ' . $m[2] : '') . ')',
    $metro
);
$stationList = count($stations) > 1
    ? implode(', ', array_slice($stations, 0, -1)) . ' and ' . end($stations)
    : ($stations[0] ?? '');

$faqs = [];
$faqs[] = $isHome
    ? ['q' => 'Where is the DenceSpot clinic in Rohini?',
       'a' => 'In Rohini, North-West Delhi. The Directions button opens its exact location on Google Maps, which can plan the route from your sector; you can also ask the clinic on WhatsApp before your first visit.']
    : ['q' => 'Is there a DenceSpot clinic in ' . $name . '?',
       'a' => 'No. DenceSpot’s one clinic in Delhi is in Rohini, North-West Delhi, and consultations, procedures and follow-up reviews for patients from ' . $name . ' all take place there. The Directions button opens its exact location on Google Maps.'];
$faqs[] = ['q' => $isHome ? 'Which metro station is closest to the clinic?' : 'How do I get to the Rohini clinic from ' . $name . '?',
           'a' => $area['route'] . ($isHome ? ' Which one is closest depends on your sector, so let Google Maps plan the route from where you start.' : ' Google Maps or the DMRC journey planner gives the quickest route from your door, and the clinic can help on WhatsApp.')];
$faqs[] = ['q' => $isHome ? 'Can the follow-up reviews fit around work?' : 'How many trips to Rohini will I need?',
           'a' => $isHome
               ? 'The reviews through the first year are photographed check-ups, and the clinic is open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . '), so for most people in Rohini they fit into an evening or a weekend. The dates are set out in your written plan.'
               : 'Usually three kinds of visit: a consultation and examination, the procedure day itself, and photographed reviews at set intervals through the first year. Extensive hair loss is sometimes planned over two sessions. Your written plan lists the visits your own treatment needs, so you can plan the journeys from ' . $name . ' around them.'];
$faqs[] = ['q' => 'Does living in ' . $name . ' change the cost?',
           'a' => 'No. The estimate depends on your plan — the number of grafts, the technique and what the estimate covers — not on where you live. It is itemised and given in writing after your examination. The <a href="/hair-transplant-cost-in-rohini">Rohini cost guide</a> explains how it is worked out.'];
$faqs[] = ['q' => $isHome ? 'The clinic is close by. Can I ride home after the procedure?' : 'How should I get home to ' . $name . ' after the procedure?',
           'a' => 'By car or cab, ideally with someone to accompany you. Riding a two-wheeler means a helmet, and tight helmets usually wait three to four weeks; crowded trains and buses should be avoided for a few days too. Sleep with your head raised for a few nights. Many people return to desk work within a few days.'];
$faqs[] = ['q' => 'Is a hair transplant right for me?',
           'a' => 'Not always. It needs enough donor hair at the back and sides of the scalp and a cause of hair loss that surgery can address. Fast-changing or diffuse thinning, low iron, a thyroid disorder or active alopecia areata usually mean medical treatment first — <a href="/hair-fall-treatment-in-rohini">hair fall treatment</a> or <a href="/hair-prp-treatment-in-rohini">PRP</a> at the same clinic. Suitability is decided at an examination.'];
$faqs[] = ['q' => $isHome ? 'Can I send photos before my first visit?' : 'Can I send photos before travelling to Rohini?',
           'a' => 'Yes. Send photographs of your hairline, crown and the back of your head to the clinic on WhatsApp and ask whether a consultation makes sense for you. A graft estimate and a plan are only given after an examination in person.'];

/* Title and description: the longest form that fits (title_fits(): 60
   characters, 561px; descriptions 155 characters). The title is never the
   bare H1, which crawlers report as a duplicate. */
$title = $isHome
    ? fit_title('Hair Transplant in Rohini, Delhi: FUE & DHI | DenceSpot', 'Hair Transplant in Rohini, Delhi | DenceSpot')
    : fit_title(
        'Hair Transplant in ' . $name . ', Delhi | DenceSpot Rohini',
        'Hair Transplant in ' . $name . ', Delhi | DenceSpot',
        'Hair Transplant in ' . $name . ' | DenceSpot',
        'Hair Transplant in ' . $name . ', Delhi',
    );
$descriptions = $isHome
    ? ['Hair transplant in Rohini at DenceSpot’s Delhi clinic: FUE and DHI planned by doctors, metro stations, visits, before-and-after photos, cost and FAQs.']
    : [
        'Hair transplant for patients from ' . $name . ' at DenceSpot’s clinic in Rohini, Delhi: FUE and DHI, the metro route, visits, cost and FAQs.',
        'Hair transplant for ' . $name . ' at DenceSpot’s Rohini clinic, Delhi: FUE and DHI, the metro route, cost and FAQs.',
        'Hair transplant for ' . $name . ' at DenceSpot’s Rohini clinic: FUE, DHI, cost and FAQs.',
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
    'keywords'       => $isHome
        ? ['hair transplant in rohini', 'hair transplant rohini delhi', 'fue hair transplant in rohini', 'dhi hair transplant in rohini', 'hair transplant clinic in rohini', 'hair transplant cost in rohini', SITE_NAME]
        : ['hair transplant in ' . $name, 'hair transplant ' . $name . ' delhi', 'fue hair transplant ' . $name, 'dhi hair transplant ' . $name, 'hair transplant near ' . $name, 'hair transplant cost ' . $name, SITE_NAME],
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
    'pill'  => $isHome ? 'Rohini · North West Delhi' : $name . ' · Clinic in Rohini, Delhi',
    'title' => 'Hair Transplant in ' . $name,
    'lead'  => $isHome
        ? 'DenceSpot’s Delhi clinic is in Rohini. FUE and DHI hair transplants here are planned and carried out by registered medical practitioners after an examination of your scalp and donor area, with the estimate in writing before any date is booked.'
        : 'DenceSpot does not have a clinic in ' . $name . ': patients from ' . $name . ' are seen at our clinic in Rohini, North-West Delhi. FUE and DHI hair transplants there start with an examination of your scalp and donor area, with the estimate in writing before any date is booked.',
    'feats' => [
        ['pin', $isHome ? 'Clinic in Rohini' : 'Clinic in Rohini, Delhi'],
        ['settings', 'FUE & DHI'],
        ['pencil', 'Hairline drawn on your face'],
        ['doc', 'Written estimate first'],
    ],
]) ?>

<!-- 1. Coming from the area -->
<section class="section ht-sec ht-overview-sec" id="getting-there">
  <div class="wrap">
    <div class="ht-overview">
      <div class="ht-overview__text">
        <p class="eyebrow"><?= e($isHome ? 'Rohini, North-West Delhi' : 'Coming from ' . $name) ?></p>
        <h2 class="h2 mt-2">Hair Transplant for <?= e($name) ?> Residents</h2>
        <p class="body mt-3"><?= e($area['about']) ?><?php if (!$isHome): ?> The consultation, the procedure and every review take place at the Rohini clinic.<?php endif; ?></p>
        <h3 class="h4 mt-4"><?= $isHome ? 'By Metro' : 'Getting to the Rohini Clinic' ?></h3>
        <p class="body mt-2"><?= e($area['route']) ?> Open the clinic on Google Maps for the route from your door.</p>
        <h3 class="h4 mt-4">On the Procedure Day</h3>
        <p class="body mt-2">Plan a car or cab home<?= $isHome ? '' : ' to ' . e($name) ?> rather than a two-wheeler: helmets usually wait three to four weeks. Sleep with your head raised for a few nights, and keep the first review date in your written plan.</p>
        <?php if (!$isHome && $metro !== []): ?>
        <p class="meta mt-4">Area and metro names from OpenStreetMap (© OpenStreetMap contributors, ODbL) and Wikidata. Several Delhi Metro stations were renamed in 2025–26.</p>
        <?php endif; ?>
      </div>

      <?= delhi_case_pair() ?>

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
    'heading' => $isHome ? 'Planning Your Visits in Rohini' : 'Planning Your Visits From ' . $name,
    'intro'   => $isHome
        ? 'Three kinds of visit: the consultation, the procedure as a day case, and photographed reviews through the first year. Because the clinic is local, most reviews fit into an evening or a weekend.'
        : 'A consultation, the procedure as a day case, and photographed reviews through the first year — all at the Rohini clinic.' . ($stationList !== '' ? ' Metro stations near ' . $name . ': ' . $stationList . '.' : ''),
    'icons'   => [
        ['search', 'Consultation & Examination'],
        ['calendar', 'Procedure as a Day Case'],
        ['shield', 'Car or Cab Home on the Day'],
        ['camera', 'Photographed Reviews for a Year'],
        ['clock', $hours],
        ['whatsapp', 'Send Photos on WhatsApp'],
    ],
    'media'   => 'map',
]) ?>

<!-- 3. Before-and-after results -->
<?= delhi_results() ?>

<!-- 4. The doctors -->
<?= delhi_doctors() ?>

<!-- 5. Techniques -->
<?= delhi_techniques_brief() ?>

<!-- 6. The procedure -->
<?= delhi_steps() ?>

<!-- 7. Cost -->
<?= delhi_cost_brief() ?>

<!-- 8. FAQs -->
<?= delhi_faqs($isHome ? 'Hair Transplant in Rohini: FAQs' : 'Questions From ' . $name, $faqs, 4) ?>

<!-- 9. Consultation -->
<?php /* Headings over 70 characters are reported by crawlers; long names take the short form. */ ?>
<?= delhi_consult(
    mb_strlen('Book a Hair Transplant Consultation From ' . $name) <= 70 && !$isHome
        ? 'Book a Hair Transplant Consultation From ' . $name
        : ($isHome ? 'Book a Hair Transplant Consultation in Rohini' : 'Book a Consultation From ' . $name),
    'Book a first visit at the Rohini clinic for a day that suits you — it is open ' . HOURS_DISPLAY . '. The doctor examines your scalp and donor area, proposes a hairline and gives you an itemised written estimate; nothing is booked on the day unless you choose to.',
    'hair-transplant-in-' . $slug
) ?>

<?php require __DIR__ . '/footer.php'; ?>
