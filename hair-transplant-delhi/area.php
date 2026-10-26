<?php
/**
 * /hair-transplant-delhi/<slug> for every Delhi district, area, sector,
 * mini-area and PIN code without a hand-written file. One template, filled
 * from includes/delhi-areas-data.php; rules in includes/delhi-areas.php.
 *
 * Routed by .htaccess §7b and router.php (?slug=). An unknown slug, or a
 * request for this file itself, is a real 404.
 */

declare(strict_types=1);

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/schema.php';
require_once __DIR__ . '/../includes/gallery-manifest.php';
require_once __DIR__ . '/../includes/delhi-areas.php';

$slug = (string) ($_GET['slug'] ?? '');
$area = preg_match('/^[a-z0-9-]{1,80}$/', $slug) === 1 ? delhi_area($slug) : null;
if ($area === null || !empty($area['file'])) {
    require __DIR__ . '/../404.php';
    exit;
}

$name     = $area['name'];
$label    = delhi_area_label($area);
$type     = $area['type'];
$url      = delhi_area_url($slug);
$district = isset($area['district']) ? delhi_area($area['district']) : null;
$parent   = isset($area['parent']) ? delhi_area($area['parent']) : null;
$pins     = $area['pins'] ?? [];
$metro    = $area['metro'] ?? [];
$crumbs   = delhi_area_crumbs($slug);

/* ---------------------------------------------------------------------
 * Sentences built from this area's own facts. Each is left out when its
 * fact is missing from the data — nothing is filled in.
 * ------------------------------------------------------------------- */
$where = match ($type) {
    'district' => $name . ' is one of Delhi’s districts.',
    'pin'      => 'PIN code ' . $name . ' covers ' . (($area['offices'] ?? []) !== [] ? 'post offices including ' . implode(', ', array_slice($area['offices'], 0, 6)) : 'part of Delhi') . ($district ? ', in the ' . $district['name'] . ' district' : '') . '.',
    default    => $name . ($parent && $parent['type'] !== 'district' ? ', part of ' . delhi_area_label($parent) . ',' : '') . ($district ? ' is in the ' . $district['name'] . ' district of Delhi.' : ' is in Delhi.'),
};
$pinLine = $type !== 'pin' && $pins !== []
    ? (count($pins) === 1 ? 'Its PIN code is ' . $pins[0] . '.' : 'Its PIN codes include ' . implode(', ', $pins) . '.')
    : '';
$stationNames = array_map(static fn (array $m): string => $m[0] . ($m[1] !== '' ? ' (' . $m[1] . ')' : ''), $metro);
$metroLine = $metro !== []
    ? (count($stationNames) > 1
        ? 'Delhi Metro stations near ' . $label . ' include ' . implode(', ', array_slice($stationNames, 0, -1)) . ' and ' . end($stationNames) . '.'
        : 'The Delhi Metro station near ' . $label . ' is ' . $stationNames[0] . '.')
    : '';

$faqs = [
    [
        'q' => 'Is there a DenceSpot clinic in ' . $label . '?',
        'a' => 'No. DenceSpot’s one clinic in Delhi is in Rohini, North-West Delhi, and consultations, procedures and follow-up reviews for patients from ' . $label . ' all take place there. The Directions button opens its exact location on Google Maps.',
    ],
];
if ($metro !== []) {
    $faqs[] = [
        'q' => 'Which metro stations are near ' . $label . '?',
        'a' => $metroLine . ' The Red Line runs through Rohini; Google Maps or the DMRC journey planner gives the route and any change of line from your station.',
    ];
}
$faqs[] = [
    'q' => 'How many visits does a hair transplant involve?',
    'a' => 'Usually three kinds: a consultation and examination, the procedure day itself, and photographed reviews at set intervals through the first year. Extensive hair loss is sometimes planned over two sessions. Your written plan lists the visits your own treatment needs.',
];
$faqs[] = [
    'q' => 'Does where I live change the cost?',
    'a' => 'No. The estimate depends on your plan — the number of grafts, the technique and what the estimate covers — not on where you live. It is itemised and given in writing after your examination. The <a href="/hair-transplant-cost-in-rohini">Rohini cost guide</a> explains how it is worked out.',
];
$faqs[] = [
    'q' => 'Is a hair transplant right for me?',
    'a' => 'Not always. It needs enough donor hair at the back and sides of the scalp and a cause of hair loss that surgery can address. Fast-changing or diffuse thinning, low iron, a thyroid disorder or active alopecia areata usually mean medical treatment first — <a href="/hair-fall-treatment-in-rohini">hair fall treatment</a> or <a href="/hair-prp-treatment-in-rohini">PRP</a> at the same clinic. Suitability is decided at an examination.',
];
$faqs[] = [
    'q' => 'Can I send photos before travelling to the clinic?',
    'a' => 'Yes. Send photographs of your hairline, crown and the back of your head to the clinic on WhatsApp and ask whether a consultation makes sense for you. A graft estimate and a plan are only given after an examination in person.',
];

/* Title: keep the full form when it fits in ~60 characters. */
foreach ([
    'Hair Transplant Near ' . $label . (str_contains($label, 'Delhi') ? '' : ', Delhi') . ' | DenceSpot',
    'Hair Transplant Near ' . $label . ' | DenceSpot',
    'Hair Transplant Near ' . $label,
] as $title) {
    if (mb_strlen($title) <= 62) {
        break;
    }
}
$descCore = 'Hair transplant near ' . $label . ($district && $type !== 'district' ? ' (' . $district['name'] . ')' : '') . ' at DenceSpot’s Delhi clinic in Rohini: FUE and DHI';
$description = $descCore . ($metro !== [] ? ', nearest metro stations, cost and FAQs.' : ', visits, cost factors and FAQs.');
if (mb_strlen($description) > 160) {
    $description = $descCore . ', cost and FAQs.';
}

$page = [
    'title'       => $title,
    'description' => $description,
    'url'         => $url,
    'body_class'  => 'tx-rich',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_delhi_clinic(),
        schema_breadcrumbs($crumbs),
        schema_faq($url, $faqs),
    ],
];

/* Related links, by page type. */
$near     = delhi_area_links($area['near'] ?? []);
$up       = $parent ? [delhi_area_url($area['parent']) => delhi_area_label($parent)] : [];
$pinLinks = delhi_area_links(array_map(static fn (string $p): string => 'pin-' . $p, $pins));

require __DIR__ . '/../includes/header.php';
?>

<?= delhi_hero([
    'pill'  => $type === 'pin' ? 'PIN ' . $name . ($district ? ' · ' . $district['name'] : '') : ($district && $type !== 'district' ? $district['name'] . ' · Delhi' : 'Delhi'),
    'title' => 'Hair Transplant Near ' . $label,
    'lead'  => 'For ' . $label . ', DenceSpot’s Delhi clinic is in Rohini, North-West Delhi. FUE and DHI hair transplants there start with an examination of your scalp and donor area, and the estimate is given in writing before any date is booked.',
    'feats' => [
        ['pin', 'Clinic in Rohini, Delhi'],
        ['settings', 'FUE & DHI'],
        ['pencil', 'Hairline drawn on your face'],
        ['doc', 'Written estimate first'],
    ],
]) ?>

<!-- 1. The area -->
<section class="section ht-sec ht-overview-sec" id="getting-there">
  <div class="wrap">
    <div class="ht-overview">
      <div class="ht-overview__text">
        <p class="eyebrow"><?= e($type === 'pin' ? 'PIN code ' . $name : 'Coming from ' . $name) ?></p>
        <h2 class="h2 mt-2">Hair Transplant for <?= e($label) ?> Residents</h2>
        <p class="body mt-3"><?= e(trim($where . ' ' . $pinLine)) ?> DenceSpot does not have a clinic here: its Delhi clinic is in Rohini, where the consultation, the procedure and every review take place.</p>
        <?php if ($metroLine !== ''): ?>
        <h3 class="h4 mt-4">By Metro</h3>
        <p class="body mt-2"><?= e($metroLine) ?> The Red Line runs through Rohini; open the clinic on Google Maps for the route and any change of line from your station.</p>
        <?php endif; ?>
        <h3 class="h4 mt-4">On the Procedure Day</h3>
        <p class="body mt-2">Plan a car or cab home to <?= e($label) ?> rather than a two-wheeler: helmets usually wait three to four weeks. Sleep with your head raised for a few nights.</p>
      </div>

      <?= delhi_case_pair() ?>

      <?= delhi_glance(array_values(array_filter([
          ['pin', 'mint', $label, $district && $type !== 'district' ? $district['name'] : 'Delhi'],
          $type !== 'pin' && $pins !== [] ? ['doc', 'violet', count($pins) === 1 ? 'PIN code' : 'PIN codes', implode(', ', $pins)] : null,
          $metro !== [] ? ['list', 'sky', 'Metro nearby', implode(', ', array_map(static fn (array $m): string => $m[0], array_slice($metro, 0, 3)))] : null,
          ['clock', 'amber', 'Rohini clinic hours', HOURS_DISPLAY . ' · ' . HOURS_NOTE],
      ])), $label . ' at a glance') ?>
    </div>
  </div>
</section>

<!-- 2. Pages under this one -->
<?= delhi_children_section(
    $slug,
    $type === 'pin' ? 'Within PIN ' . $name : 'Within ' . $name,
    'Hair Transplant Pages for ' . ($type === 'district' ? 'Areas in ' . $name : ($type === 'pin' ? 'Areas Under PIN ' . $name : 'Sectors and Areas in ' . $name)),
    $type === 'pin' && ($area['offices'] ?? []) !== [] ? 'Post offices with this PIN code (India Post): ' . implode(', ', $area['offices']) . '.' : ''
) ?>

<!-- 3. Planning your visits, beside the clinic's map -->
<?= delhi_band([
    'id'      => 'visits',
    'eyebrow' => 'Planning your visits',
    'heading' => 'Planning Your Visits From ' . $label,
    'intro'   => 'A consultation, the procedure as a day case, and photographed reviews through the first year — all at the Rohini clinic.',
    'icons'   => [
        ['search', 'Consultation & Examination'],
        ['calendar', 'Procedure as a Day Case'],
        ['shield', 'Car or Cab Home on the Day'],
        ['camera', 'Photographed Reviews for a Year'],
        ['clock', 'Open Mon–Sat, 10:00–20:00'],
        ['whatsapp', 'Send Photos on WhatsApp'],
    ],
    'media'   => 'map',
]) ?>

<?= delhi_results() ?>

<?= delhi_doctors() ?>

<?= delhi_techniques_brief() ?>

<?= delhi_steps() ?>

<?= delhi_cost_brief() ?>

<?= delhi_faqs('Questions From ' . $label, $faqs, 4) ?>

<!-- Related pages -->
<section class="section ht-sec section--white" id="nearby">
  <div class="wrap">
    <p class="eyebrow">Hair transplant in Delhi</p>
    <h2 class="h3 mt-1">Related Pages</h2>
    <ul class="ht-patterns mt-3">
      <li><a href="<?= e(DELHI_HT_HUB) ?>"><?= icon('pin', 14) ?> Hair Transplant in Delhi</a></li>
      <?php foreach ($up + $pinLinks + $near as $rUrl => $rLabel): ?>
      <li><a href="<?= e($rUrl) ?>"><?= icon('pin', 14) ?> Hair Transplant Near <?= e($rLabel) ?></a></li>
      <?php endforeach; ?>
      <li><a href="/delhi-clinic"><?= icon('pin', 14) ?> Rohini Clinic Details</a></li>
    </ul>
    <p class="meta mt-4">Area, sector and metro station names from OpenStreetMap (© OpenStreetMap contributors, ODbL); PIN codes and post offices from India Post. Some Delhi Metro stations were renamed in 2025–26.</p>
  </div>
</section>

<?= delhi_consult(
    'Book a Hair Transplant Consultation Near ' . $label,
    'Book a first visit at the Rohini clinic for a day that suits you — it is open ' . HOURS_DISPLAY . '. The doctor examines your scalp and donor area, proposes a hairline and gives you an itemised written estimate; nothing is booked on the day unless you choose to.',
    'hair-transplant-delhi-' . $slug
) ?>

<?php require __DIR__ . '/../includes/footer.php'; ?>
