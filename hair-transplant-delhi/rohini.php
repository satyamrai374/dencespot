<?php
/**
 * /hair-transplant-delhi/rohini — hair transplant for patients living in
 * Rohini, where DenceSpot's Delhi clinic is. Replaces /hair-transplant-in-rohini
 * (301 in legacy-redirects.php); that page's full treatment content now lives
 * on the parent, /hair-transplant-delhi/. Rules and the doorway guard are in
 * includes/delhi-localities.php.
 *
 * Locality facts and sources (checked 25 Oct 2026, recorded in
 * the Delhi URL inventory, kept outside the site folder in
 * Desktop/Dencespot SEO Reports/delhi-hair-transplant/):
 *  - North West Delhi district; built as the Delhi Development Authority's
 *    sub-city project, started in the 1980s; three Red Line stations and the
 *    Yellow Line's Rohini Sector 18, 19 (en.wikipedia.org/wiki/Rohini,_Delhi).
 *  - Rithala: western terminus of the Red Line, Sector 5, within walking
 *    distance of Metro Walk and Adventure Island
 *    (en.wikipedia.org/wiki/Rithala_metro_station).
 *  - Rohini West renamed Dr. Baba Saheb Ambedkar Hospital and Rohini East
 *    renamed Rohini (Delhi State Names Authority, May 2026: Business
 *    Standard, Metro Rail News, 28 May 2026). Rohini West: Sectors 6 and 10,
 *    in front of Unity One Mall (en.wikipedia.org/wiki/Rohini_West_metro_station).
 *    Rohini East: Sectors 8 and 14, Bhagwan Mahavir Marg
 *    (en.wikipedia.org/wiki/Rohini_East_metro_station).
 * Rohini has several PIN codes by sector, none verified here, so none is shown.
 * The clinic's street address and nearest station are not on record, so the
 * page gives no distance, journey time or station-to-clinic route.
 */

declare(strict_types=1);

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/schema.php';
require_once __DIR__ . '/../includes/gallery-manifest.php';
require_once __DIR__ . '/../includes/delhi-areas.php';

$slug   = 'rohini';
$url    = delhi_locality_url($slug);
$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair Transplant in Delhi', 'url' => DELHI_HT_HUB],
    ['name' => 'Rohini'],
];

$faqs = [
    [
        'q' => 'Where is the DenceSpot clinic in Rohini?',
        'a' => 'In Rohini, North-West Delhi. The Directions button opens its exact location on Google Maps, which can plan the route from your sector; you can also ask the clinic on WhatsApp before your first visit.',
    ],
    [
        'q' => 'Which metro station is closest to the clinic?',
        'a' => 'Rohini has three Red Line stations — Rithala, Dr. Baba Saheb Ambedkar Hospital (earlier called Rohini West) and Rohini (earlier Rohini East) — and the Yellow Line stops at Rohini Sector 18, 19. Which one is closest depends on your sector, so let Google Maps plan the route from where you start.',
    ],
    [
        'q' => 'Are FUE and DHI both done at the Rohini clinic?',
        'a' => 'Yes. FUE and DHI are the techniques on record at the Rohini clinic, and many plans combine them: DHI along the hairline, FUE across the mid-scalp and crown. Ask the clinic about FUT, where a strip of scalp is removed, if you have been told it may suit you.',
    ],
    [
        'q' => 'Can the follow-up reviews fit around work?',
        'a' => 'The reviews through the first year are photographed check-ups, and the clinic is open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . '), so for most people in Rohini they fit into an evening or a Saturday. The dates are set out in your written plan.',
    ],
    [
        'q' => 'The clinic is close by. Can I walk or ride home after the procedure?',
        'a' => 'Even for a short trip, go home by car or cab. Riding a two-wheeler means a helmet, and tight helmets usually wait three to four weeks; the midday sun and heavy sweating are also avoided for the first two weeks. Sleep with your head raised for a few nights.',
    ],
    [
        'q' => 'Does living in Rohini change the cost?',
        'a' => 'No. The estimate depends on your plan — the number of grafts, the technique and what the estimate covers — not on where you live. It is itemised and given in writing after your examination. The <a href="/hair-transplant-cost-in-rohini">Rohini cost guide</a> shows how it is worked out.',
    ],
    [
        'q' => 'Should I start with hair fall treatment instead?',
        'a' => 'Sometimes. Fast-changing or diffuse thinning, low iron, a thyroid disorder or active alopecia areata are usually treated first, and early thinning may respond to medical treatment. <a href="/hair-fall-treatment-in-rohini">Hair fall treatment</a> and <a href="/hair-prp-treatment-in-rohini">PRP</a> are offered at the same clinic, and the doctor advises which comes first after examining your scalp.',
    ],
];

$page = [
    'title'       => 'Hair Transplant in Rohini, Delhi: FUE & DHI | DenceSpot',
    'description' => 'Hair transplant in Rohini at DenceSpot’s Delhi clinic: FUE and DHI after a doctor’s examination, metro stations, visits, cost factors and local FAQs.',
    'url'         => $url,
    'body_class'  => 'tx-rich',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_delhi_clinic(),
        schema_breadcrumbs($crumbs),
        schema_faq($url, $faqs),
    ],
];

require __DIR__ . '/../includes/header.php';
?>

<?= delhi_hero([
    'pill'  => 'Rohini · North West Delhi',
    'title' => 'Hair Transplant in Rohini',
    'lead'  => 'DenceSpot’s Delhi clinic is in Rohini. FUE and DHI hair transplants here are planned and carried out by registered medical practitioners after an examination of your scalp and donor area, with the estimate in writing before any date is booked.',
    'feats' => [
        ['pin', 'Clinic in Rohini'],
        ['settings', 'FUE & DHI'],
        ['pencil', 'Hairline drawn on your face'],
        ['doc', 'Written estimate first'],
    ],
]) ?>

<!-- 1. Living in Rohini -->
<section class="section ht-sec ht-overview-sec" id="getting-there">
  <div class="wrap">
    <div class="ht-overview">
      <div class="ht-overview__text">
        <p class="eyebrow">Living in Rohini</p>
        <h2 class="h2 mt-2">Hair Transplant for Rohini Residents</h2>
        <p class="body mt-3">Rohini is a residential sub-city in the North West Delhi district, built by the Delhi Development Authority from the 1980s and laid out in numbered sectors. With the clinic in Rohini itself, the consultation, the procedure day and the reviews through the year can be planned around ordinary days at home or work.</p>
        <h3 class="h4 mt-4">By Metro</h3>
        <p class="body mt-2">The Red Line has three stations in Rohini: Rithala in Sector 5, its western terminus; Dr. Baba Saheb Ambedkar Hospital, earlier called Rohini West, in front of Unity One Mall; and Rohini, earlier Rohini East, on Bhagwan Mahavir Marg. On the Yellow Line, the station is Rohini Sector 18, 19. Open the clinic on Google Maps for the route from your sector.</p>
        <h3 class="h4 mt-4">Before Your First Visit</h3>
        <p class="body mt-2">You can send photographs of your hairline, crown and the back of your head on WhatsApp and ask whether a consultation makes sense. A graft estimate and a plan are only given after an examination in person.</p>
      </div>

      <?= delhi_case_pair() ?>

      <?= delhi_glance([
          ['pin', 'mint', 'Rohini', 'North West Delhi'],
          ['list', 'violet', 'Red Line', 'Rithala, Dr. Baba Saheb Ambedkar Hospital, Rohini'],
          ['list', 'sky', 'Yellow Line', 'Rohini Sector 18, 19'],
          ['clock', 'amber', 'Open', HOURS_DISPLAY . ' · ' . HOURS_NOTE],
      ], 'Rohini and the clinic at a glance') ?>
    </div>
  </div>
</section>

<!-- 2. Planning your visits, beside the clinic's map -->
<?= delhi_band([
    'id'      => 'visits',
    'eyebrow' => 'Planning your visits',
    'heading' => 'Planning Your Visits in Rohini',
    'intro'   => 'Three kinds of visit: the consultation, the procedure as a day case, and photographed reviews through the first year. Because the clinic is local, most reviews fit into an evening or a Saturday.',
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
<?= delhi_faqs('Questions From Rohini', $faqs, 4) ?>

<!-- 9. Rohini's sector pages, then related pages -->
<?= delhi_children_section($slug, 'Within Rohini', 'Hair Transplant Pages for Rohini Sectors') ?>

<?= delhi_nearby($slug) ?>

<!-- 10. Consultation -->
<?= delhi_consult(
    'Book a Hair Transplant Consultation in Rohini',
    'Book the first visit for a day that suits you — the clinic is open ' . HOURS_DISPLAY . '. The doctor examines your scalp and donor area, draws a proposed hairline on your face and gives you an itemised written estimate; nothing is booked on the day unless you choose to.',
    'hair-transplant-delhi-rohini'
) ?>

<?php require __DIR__ . '/../includes/footer.php'; ?>
