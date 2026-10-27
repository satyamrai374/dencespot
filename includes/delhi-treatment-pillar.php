<?php
/**
 * The Delhi pillar of a treatment in DELHI_TREATMENTS, /<key>-in-delhi. The
 * root file sets $treatment and requires this. Laid out as the
 * /hair-transplant-in-delhi pillar; "Serving Patients Across Delhi" just above
 * the footer links every area page of the treatment (footer.php).
 *
 * COPY SCHEMA — includes/delhi-treatments/<key>.php returns this array. Plain
 * strings are escaped; keys ending in _html / html / paras and FAQ answers
 * are HTML (links allowed: Rohini, neutral or blog URLs only, never a
 * Gurgaon URL). Limits: H1/H2 ≤70 characters, meta description ≤155, the
 * title must pass title_fits() (≤60 characters, ≤561px) and never equal the
 * H1, no word from the strict-wording list. {area} in 'area' copy is replaced
 * by the area name, {hub} by the pillar URL.
 *
 *   'title'       => [candidate, …]   first that fits wins
 *   'description' => string
 *   'keywords'    => [string, …]      lowercase; SITE_NAME is added
 *   'form_treatment' => string        booking preset, e.g. 'Hair PRP'
 *   'form'        => [option, …]      enquiry form options, last 'Not sure — please advise'
 *   'hero'        => ['lead' => string, 'feats' => [[icon, label] ×4]]
 *   'about'       => ['heading', 'paras' => [string, string], 'cta' => [href, label], 'glance' => [[icon, tone, bold, text] ×4]]
 *   'middle'      => 'case' (the recorded FUE case; hair transplant only) or
 *                    ['heading', 'sub', 'cols' => [a, b], 'rows' => [[a, b], …], 'note']
 *   'results'     => bool             consented scalp before/after row (hair transplant only)
 *   'why'         => ['heading' (optional), 'intro', 'icons' => [[icon, label] ×6], 'media' => 'map'|'equipment', 'checks' => [×3]]
 *   'suit'        => ['heading', 'intro', 'yes' => ['heading', 'items' ×5], 'wait' => ['heading', 'items' ×5], 'note' => ['heading', 'paras' => [html, …]]]
 *   'options'     => ['eyebrow', 'heading', 'intro', 'cards' => [[icon, tone, title, text, [tick ×3]] ×2],
 *                     'choose' => ['heading', 'items' ×5], 'related_heading', 'related' => [url => anchor]]
 *   'steps'       => ['eyebrow', 'heading', 'intro', 'items' => [[icon, title, text] ×5], 'note_html']
 *   'aftercare'   => optional ['eyebrow', 'heading', 'intro', 'timeline' => [string ×4], 'tips_heading', 'tips' => [[icon, tone, bold, text] ×4]]
 *   'cost'        => ['heading', 'intro', 'factors' => [[icon, tone, bold, text] ×4], 'meta', 'links' => [url => anchor],
 *                     'estimate' => ['heading', 'items' => [×5], 'note']]
 *   'faqs'        => [['q', 'a' (html)] ×12–15]   six shown, the rest behind "View more"
 *   'faq_about'   => string           "Anything specific to your … is answered at the consultation"
 *   'consult'     => ['heading', 'intro']
 *   'schema_type' => 'procedure' (surgical: schema_procedure) or 'therapy' (non-surgical: schema_therapy)
 *   'schema'      => the node's fields: name, description, alternateName, bodyLocation, howPerformed,
 *                    preparation, followup, expectedPrognosis (+ procedureType for a procedure)
 *   'area'        => the area page copy (includes/delhi-treatment-area-page.php):
 *                    ['lead', 'feats' => [[icon, label] ×3], 'heading', 'visits_line', 'day_heading', 'day',
 *                     'visits_intro', 'visit_icons' => [[icon, label] ×4], 'options_heading', 'options_html',
 *                     'cost_heading', 'cost_intro', 'faqs' => [['q', 'a'] ×7], 'consult_intro',
 *                     'descriptions' => [string ×3]]
 *
 * Icons: check calendar shield info hairline beard list settings heart chat
 * doc user pencil chart pin clock rupee scale star search plus camera alert.
 * Tones: mint violet sky amber rose.
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/schema.php';
require_once __DIR__ . '/gallery-manifest.php';
require_once __DIR__ . '/delhi-treatment-sections.php';

$key  = $treatment ?? '';
$meta = DELHI_TREATMENTS[$key] ?? null;
if ($meta === null) {
    require __DIR__ . '/../404.php';
    exit;
}
$c    = delhi_treatment_copy($key);
$name = $meta['name'];
$url  = delhi_treatment_hub($key);

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => $name . ' in Delhi'],
];

$page = [
    'title'         => fit_title(...$c['title']),
    'description'   => $c['description'],
    'url'           => $url,
    'body_class'    => 'tx-rich',
    'crumbs'        => $crumbs,
    'location'      => 'rohini',
    'service_areas' => $key,
    'keywords'      => [...$c['keywords'], SITE_NAME],
    'schema'        => [
        schema_delhi_clinic(),
        schema_breadcrumbs($crumbs),
        (($c['schema_type'] ?? 'procedure') === 'therapy' ? 'schema_therapy' : 'schema_procedure')($url, $c['schema'] + [
            'location'  => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
            'performer' => null,
        ]),
        schema_faq($url, $c['faqs']),
    ],
];

require __DIR__ . '/header.php';
?>

<?= delhi_hero([
    'pill'      => 'Rohini, North-West Delhi',
    'title'     => $name . ' in Delhi',
    'lead'      => $c['hero']['lead'],
    'feats'     => $c['hero']['feats'],
    'treatment' => $c['form_treatment'],
]) ?>

<!-- 1. Treatment overview -->
<section class="section ht-sec ht-overview-sec" id="about">
  <div class="wrap">
    <div class="ht-overview">
      <div class="ht-overview__text">
        <p class="eyebrow">About the treatment</p>
        <h2 class="h2 mt-2"><?= e($c['about']['heading']) ?></h2>
        <?php foreach ($c['about']['paras'] as $para): ?>
        <p class="body mt-3"><?= e($para) ?></p>
        <?php endforeach; ?>
        <div class="btn-row mt-4">
          <a class="btn btn--ink" href="<?= e($c['about']['cta'][0]) ?>"><?= e($c['about']['cta'][1]) ?> <?= icon('arrow', 16) ?></a>
        </div>
      </div>

      <?= dt_middle($c['middle']) ?>

      <?= delhi_glance($c['about']['glance'], $name . ' at a glance') ?>
    </div>
  </div>
</section>

<!-- 2. Why DenceSpot -->
<?= delhi_band([
    'id'      => 'why',
    'eyebrow' => 'Why DenceSpot',
    'heading' => $c['why']['heading'] ?? 'Why Choose DenceSpot for ' . $name . ' in Delhi?',
    'intro'   => $c['why']['intro'],
    'icons'   => $c['why']['icons'],
    'media'   => $c['why']['media'],
] + (isset($c['why']['checks']) ? ['checks' => $c['why']['checks']] : [])) ?>

<?php if (!empty($c['results'])): ?>
<!-- Before-and-after results -->
<?= delhi_results() ?>
<?php endif; ?>

<!-- 3. Suitability -->
<?= dt_suit($c['suit']) ?>

<!-- 4. The doctors -->
<?= delhi_doctors() ?>

<!-- 5. Options or techniques -->
<?= dt_options($c['options'], dt_sibling_pillars($key), 'Other ' . DELHI_TREATMENTS[$key]['group'] . ' Pages for Delhi') ?>

<!-- 6. How it works -->
<?= dt_steps($c['steps']) ?>

<?php if (isset($c['aftercare'])): ?>
<!-- 7. Aftercare -->
<?= dt_aftercare($c['aftercare']) ?>
<?php endif; ?>

<!-- 8. Cost -->
<?= dt_cost($c['cost']) ?>

<!-- 9. Patient reviews -->
<?= dt_reviews() ?>

<!-- 10. FAQs -->
<?= delhi_faqs($name . ' in Delhi: FAQs', $c['faqs'], 6, $c['faq_about']) ?>

<!-- 11. Consultation -->
<?= delhi_consult($c['consult']['heading'], $c['consult']['intro'], $key . '-delhi', $c['form']) ?>

<?php require __DIR__ . '/footer.php'; ?>
