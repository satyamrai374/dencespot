<?php
/**
 * /hair-transplant-delhi/pitampura — hair transplant for patients from
 * Pitampura, at the Rohini clinic next door. A service-area page: there is no
 * DenceSpot clinic in Pitampura, and the page says so. Rules and the doorway
 * guard are in includes/delhi-localities.php.
 *
 * Locality facts and sources (checked 25 Oct 2026, recorded in
 * the Delhi URL inventory, kept outside the site folder in
 * Desktop/Dencespot SEO Reports/delhi-hair-transplant/):
 *  - North West Delhi district, PIN 110034, adjacent to Rohini, between the
 *    Outer and Inner Ring Roads; TV Tower, Dilli Haat Pitampura and Netaji
 *    Subhash Place (en.wikipedia.org/wiki/Pitam_Pura).
 *  - Red Line stations Madhuban Chowk (formerly Pitampura), Kohat Enclave and
 *    Netaji Subhash Place; NSP is a Pink Line interchange; Madhuban Chowk is on
 *    the Outer Ring Road and serves Pitampura and Rohini Sector 8
 *    (en.wikipedia.org/wiki/Madhuban_Chowk_metro_station,
 *    en.wikipedia.org/wiki/Kohat_Enclave_metro_station).
 * The clinic's street address and nearest station are not on record, so the
 * page gives no distance, journey time or station-to-clinic route.
 */

declare(strict_types=1);

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/schema.php';
require_once __DIR__ . '/../includes/gallery-manifest.php';
require_once __DIR__ . '/../includes/delhi-areas.php';

$slug   = 'pitampura';
$url    = delhi_locality_url($slug);
$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair Transplant in Delhi', 'url' => DELHI_HT_HUB],
    ['name' => 'Pitampura'],
];

$faqs = [
    [
        'q' => 'Is there a DenceSpot clinic in Pitampura?',
        'a' => 'No. The nearest DenceSpot clinic to Pitampura is in neighbouring Rohini, North-West Delhi. Consultations, procedures and follow-up reviews for patients from Pitampura all take place there. The Directions button opens its exact location on Google Maps.',
    ],
    [
        'q' => 'Which metro station should I use from Pitampura?',
        'a' => 'Pitampura has three Red Line stations: Madhuban Chowk (called Pitampura until it was renamed), Kohat Enclave and Netaji Subhash Place, and the same line runs on through Rohini. Which station suits you depends on where in Pitampura you start, so open the clinic on Google Maps for a route from your door, or ask the clinic on WhatsApp.',
    ],
    [
        'q' => 'How many visits does a hair transplant involve?',
        'a' => 'Usually three kinds: a consultation and examination, the procedure day itself, and photographed reviews at set intervals through the first year. Extensive hair loss is sometimes planned over two sessions. Your written plan lists the visits your own treatment needs.',
    ],
    [
        'q' => 'Does the cost change because I am coming from Pitampura?',
        'a' => 'No. The estimate depends on your plan — the number of grafts, the technique and what the estimate covers — not on where you live. It is itemised and given to you in writing after your examination. The <a href="/hair-transplant-cost-in-rohini">Rohini cost guide</a> explains how it is worked out.',
    ],
    [
        'q' => 'When can I go back to work after the procedure?',
        'a' => 'Many people return to desk work within a few days, once the swelling has settled. Work involving heavy lifting, heat, dust or a helmet usually needs longer. If you ride a two-wheeler, ask the doctor when you can wear a helmet again: tight helmets usually wait three to four weeks.',
    ],
    [
        'q' => 'Is a hair transplant right for me?',
        'a' => 'Not always. It needs enough donor hair at the back and sides of the scalp, and a cause of hair loss that surgery can address. Fast-changing or diffuse thinning, an untreated cause such as low iron or a thyroid disorder, or active alopecia areata usually mean medical treatment first — <a href="/hair-fall-treatment-in-rohini">hair fall treatment</a> or <a href="/hair-prp-treatment-in-rohini">PRP</a> at the same clinic. Suitability is decided at an examination.',
    ],
    [
        'q' => 'Can I send photos before I visit?',
        'a' => 'Yes. You can send photographs of your hairline, crown and the back of your head to the clinic on WhatsApp and ask whether a consultation makes sense for you. A graft estimate and a plan are only given after an examination in person.',
    ],
];

$page = [
    'title'       => 'Hair Transplant Near Pitampura, Delhi | DenceSpot Rohini',
    'description' => 'Hair transplant near Pitampura at DenceSpot’s clinic in neighbouring Rohini: FUE and DHI, metro and road access, the visits involved, cost and FAQs.',
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
    'pill'  => 'Pitampura · North West Delhi',
    'title' => 'Hair Transplant Near Pitampura',
    'lead'  => 'For Pitampura, DenceSpot’s nearest clinic is next door in Rohini. FUE and DHI hair transplants there start with an examination of your scalp and donor area, and the estimate is given in writing before any date is booked.',
    'feats' => [
        ['pin', 'Clinic in neighbouring Rohini'],
        ['settings', 'FUE & DHI'],
        ['pencil', 'Hairline drawn on your face'],
        ['doc', 'Written estimate first'],
    ],
]) ?>

<!-- 1. Coming from Pitampura -->
<section class="section ht-sec ht-overview-sec" id="getting-there">
  <div class="wrap">
    <div class="ht-overview">
      <div class="ht-overview__text">
        <p class="eyebrow">Coming from Pitampura</p>
        <h2 class="h2 mt-2">Hair Transplant for Pitampura Residents</h2>
        <p class="body mt-3">Pitampura sits right beside Rohini in the North West Delhi district, between the Outer and Inner Ring Roads. Whether you live near the TV Tower, Dilli Haat or Netaji Subhash Place, the Rohini clinic is the nearest DenceSpot clinic, so each visit is a trip within your own part of the city.</p>
        <h3 class="h4 mt-4">By Metro</h3>
        <p class="body mt-2">Three Red Line stations serve Pitampura: Madhuban Chowk, which was called Pitampura station until it was renamed, Kohat Enclave, and Netaji Subhash Place, where the Pink Line also stops. The same line runs on towards Rithala through Rohini. For the walk from the station to the door, open the clinic on Google Maps.</p>
        <h3 class="h4 mt-4">By Road</h3>
        <p class="body mt-2">The Outer Ring Road runs between Pitampura and Rohini past Madhuban Chowk, so a car or cab is a simple option — and the one to plan for on the day of the procedure.</p>
      </div>

      <?= delhi_case_pair() ?>

      <?= delhi_glance([
          ['pin', 'mint', 'Pitampura', 'North West Delhi · PIN 110034'],
          ['list', 'violet', 'Red Line', 'Madhuban Chowk, Kohat Enclave, Netaji Subhash Place'],
          ['shield', 'sky', 'Clinic', LOC_DELHI_LANDMARK],
          ['clock', 'amber', 'Open', HOURS_DISPLAY . ' · ' . HOURS_NOTE],
      ], 'Pitampura and the Rohini clinic at a glance') ?>
    </div>
  </div>
</section>

<!-- 2. Planning your visits, beside the clinic's map -->
<?= delhi_band([
    'id'      => 'visits',
    'eyebrow' => 'Planning your visits',
    'heading' => 'Planning Your Visits From Pitampura',
    'intro'   => 'A consultation, the procedure day and reviews through the year. On the procedure day, arrange a car or cab home to Pitampura rather than a two-wheeler, and sleep with your head raised for a few nights.',
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
<?= delhi_faqs('Questions From Pitampura', $faqs, 4) ?>

<!-- 9. Related pages -->
<?= delhi_nearby($slug) ?>

<!-- 10. Consultation -->
<?= delhi_consult(
    'Book a Hair Transplant Consultation Near Pitampura',
    'Pick a time that fits around your day in Pitampura — the clinic is open ' . HOURS_DISPLAY . '. You leave the first visit with your scalp and donor area examined, a proposed hairline and an itemised estimate to take home and think over.',
    'hair-transplant-delhi-pitampura'
) ?>

<?php require __DIR__ . '/../includes/footer.php'; ?>
