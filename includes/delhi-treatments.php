<?php
/**
 * The Delhi treatment clusters built from one layout (client, 27 Oct 2026:
 * "like the Delhi hair transplant pages, for every service"). Each treatment
 * here has:
 *
 *  - a pillar, /<key>-in-delhi (root file <key>-in-delhi.php, layout
 *    includes/delhi-treatment-pillar.php), with "Serving Patients Across
 *    Delhi" just above the footer linking every area page;
 *  - an area page for every live area in DELHI_SERVICE_AREAS except Rohini,
 *    /<key>-in-<slug> (root stubs, layout includes/delhi-treatment-area-page.php),
 *    which links up to its pillar only;
 *  - Rohini's entry in the list pointing at the clinic's own Rohini page.
 *
 * The copy for each treatment is in includes/delhi-treatments/<key>.php (the
 * schema is documented in includes/delhi-treatment-pillar.php). Hair
 * transplant, beard transplant and laser hair removal have their own
 * hand-built layouts and are not listed here.
 *
 * 'name' is the keyword anchor and H1 prefix ("<name> in <Area>"); 'rohini'
 * is the clinic's own page for the treatment; 'group' is its group in
 * LOCATION_LINKS and 'family' its family there.
 */

declare(strict_types=1);

const DELHI_TREATMENTS = [
    // Hair transplant techniques and needs
    'fue-hair-transplant'       => ['name' => 'FUE Hair Transplant',         'rohini' => '/fue-hair-transplant-in-rohini',        'family' => 'hair', 'group' => 'Hair Transplant'],
    'dhi-hair-transplant'       => ['name' => 'DHI Hair Transplant',         'rohini' => '/dhi-hair-transplant-in-rohini',        'family' => 'hair', 'group' => 'Hair Transplant'],
    'unshaven-hair-transplant'  => ['name' => 'Unshaven Hair Transplant',    'rohini' => '/unshaven-hair-transplant-in-rohini',   'family' => 'hair', 'group' => 'Hair Transplant'],
    'hairline-transplant'       => ['name' => 'Hairline Transplant',         'rohini' => '/hairline-transplant-in-rohini',        'family' => 'hair', 'group' => 'Hair Transplant'],
    'crown-hair-transplant'     => ['name' => 'Crown Hair Transplant',       'rohini' => '/crown-hair-transplant-in-rohini',      'family' => 'hair', 'group' => 'Hair Transplant'],
    'hair-transplant-for-women' => ['name' => 'Hair Transplant for Women',   'rohini' => '/hair-transplant-for-women-in-rohini',  'family' => 'hair', 'group' => 'Hair Transplant'],
    'hair-transplant-repair'    => ['name' => 'Hair Transplant Repair',      'rohini' => '/hair-transplant-repair-in-rohini',     'family' => 'hair', 'group' => 'Hair Transplant'],
    // PRP and non-surgical
    'hair-prp-treatment'        => ['name' => 'Hair PRP Treatment',          'rohini' => '/hair-prp-treatment-in-rohini',         'family' => 'hair', 'group' => 'PRP & Non-Surgical Hair Treatment'],
    'gfc-treatment'             => ['name' => 'GFC Treatment',               'rohini' => '/gfc-treatment-in-rohini',              'family' => 'hair', 'group' => 'PRP & Non-Surgical Hair Treatment'],
    'hair-mesotherapy'          => ['name' => 'Hair Mesotherapy',            'rohini' => '/hair-mesotherapy-in-rohini',           'family' => 'hair', 'group' => 'PRP & Non-Surgical Hair Treatment'],
    'hair-microneedling'        => ['name' => 'Hair Microneedling',          'rohini' => '/hair-microneedling-in-rohini',         'family' => 'hair', 'group' => 'PRP & Non-Surgical Hair Treatment'],
    'hair-led-therapy'          => ['name' => 'Hair LED Therapy',            'rohini' => '/hair-led-therapy-in-rohini',           'family' => 'hair', 'group' => 'PRP & Non-Surgical Hair Treatment'],
    // Hair fall and scalp
    'hair-fall-treatment'       => ['name' => 'Hair Fall Treatment',         'rohini' => '/hair-fall-treatment-in-rohini',        'family' => 'hair', 'group' => 'Hair Fall & Scalp'],
    'womens-hair-loss-treatment' => ['name' => "Women's Hair Loss Treatment", 'rohini' => '/womens-hair-loss-treatment-in-rohini', 'family' => 'hair', 'group' => 'Hair Fall & Scalp'],
    'alopecia-areata-treatment' => ['name' => 'Alopecia Areata Treatment',   'rohini' => '/alopecia-areata-treatment-in-rohini',  'family' => 'hair', 'group' => 'Hair Fall & Scalp'],
    'dandruff-treatment'        => ['name' => 'Dandruff Treatment',          'rohini' => '/dandruff-treatment-in-rohini',         'family' => 'hair', 'group' => 'Hair Fall & Scalp'],
    // Beard and eyebrow
    'eyebrow-transplant'        => ['name' => 'Eyebrow Transplant',          'rohini' => '/eyebrow-transplant-in-rohini',         'family' => 'hair', 'group' => 'Beard & Eyebrow Transplant'],
    // Skin
    'skin-treatment'            => ['name' => 'Skin Treatment',              'rohini' => '/skin-treatment-in-rohini',             'family' => 'skin', 'group' => 'Skin & Laser'],
    'face-prp-treatment'        => ['name' => 'Face PRP Treatment',          'rohini' => '/face-prp-treatment-in-rohini',         'family' => 'skin', 'group' => 'Skin & Laser'],
];

/** A treatment's Delhi pillar. */
function delhi_treatment_hub(string $key): string
{
    return '/' . $key . '-in-delhi';
}

/** A treatment's page for an area; Rohini's is the clinic's own page. */
function delhi_treatment_url(string $key, string $slug): string
{
    return $slug === 'rohini' ? DELHI_TREATMENTS[$key]['rohini'] : '/' . $key . '-in-' . $slug;
}

/** The treatment key whose pillar or area page is at $path, with the area slug ('' for the pillar), or null. */
function delhi_treatment_for_path(string $path): ?array
{
    $path = trim($path, '/');
    foreach (array_keys(DELHI_TREATMENTS) as $key) {
        if (str_starts_with($path, $key . '-in-')) {
            $rest = substr($path, strlen($key) + 4);
            return [$key, $rest === 'delhi' ? '' : $rest];
        }
    }
    return null;
}
