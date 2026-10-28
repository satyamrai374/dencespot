<?php
/**
 * Gurugram area pages, /<treatment>-in-<area>, and the "Serving Patients Across
 * Gurugram" block that links them from each Gurgaon treatment page (client,
 * 28 Oct 2026: "the same Delhi strategy for Gurgaon"). DenceSpot's Gurugram
 * clinic is on Sector 39 Road in Jharsa, opposite Medanta – The Medicity; an
 * area page is a page for patients from that area, never a clinic there. Each
 * books, calls and messages the Gurugram clinic and never mentions the Rohini
 * clinic (location rule).
 *
 * Unlike Delhi, the parents already exist: each treatment's Gurgaon page
 * (GURGAON_TREATMENTS 'parent') is the pillar. footer.php adds the area block
 * above its same-city treatment links; the area pages link up to the parent
 * only ($page['location_links'] => false).
 *
 * Facts per area are deliberately few: the area's own landmarks ('about') and
 * the metro stations in it, where it has any (Yellow Line and Rapid Metro
 * Gurgaon). PIN codes are not on record here, and the clinic's nearest station
 * is not either (DIRECTIONS['metro'] in config.php), so no page gives a PIN,
 * a distance, a journey time or a metro route to the clinic.
 *
 * Each page is a root file, <treatment>-in-<slug>.php, that sets $treatment and
 * $slug and requires includes/gurgaon-treatment-area-page.php. 'live' => false
 * 301s an area's pages to their parents and drops them from the sitemap.
 * Sector slugs end in -gurgaon, as Delhi has sectors too.
 */

declare(strict_types=1);

require_once __DIR__ . '/delhi-service-areas.php';   // serving_areas_block()

/** Parts of the city, shown on each area page. */
const GURGAON_SERVICE_ZONES = [
    'dlf'     => 'DLF City & MG Road, Gurugram',
    'golf'    => 'Golf Course Road, Gurugram',
    'sohna'   => 'Sohna Road, Gurugram',
    'central' => 'Central & Old Gurugram',
    'new'     => 'New Gurugram & NH-48',
];

/** slug => the area. */
const GURGAON_SERVICE_AREAS = [
    'dlf-phase-1' => [
        'name' => 'DLF Phase 1', 'zone' => 'dlf', 'live' => true,
        'metro' => [['Phase 1', 'Rapid Metro'], ['Sikanderpur', 'Yellow Line and Rapid Metro']],
        'about' => 'DLF Phase 1 is a residential area of DLF City, next to Sikanderpur and MG Road.',
    ],
    'dlf-phase-2' => [
        'name' => 'DLF Phase 2', 'zone' => 'dlf', 'live' => true,
        'metro' => [['Phase 2', 'Rapid Metro'], ['Belvedere Towers', 'Rapid Metro'], ['MG Road', 'Yellow Line']],
        'about' => 'DLF Phase 2 is home to DLF Cyber City and CyberHub, between MG Road and NH-48.',
    ],
    'dlf-phase-3' => [
        'name' => 'DLF Phase 3', 'zone' => 'dlf', 'live' => true,
        'metro' => [['Phase 3', 'Rapid Metro'], ['Moulsari Avenue', 'Rapid Metro']],
        'about' => 'DLF Phase 3 is a residential area beside DLF Cyber City, close to NH-48.',
    ],
    'dlf-phase-4' => [
        'name' => 'DLF Phase 4', 'zone' => 'dlf', 'live' => true,
        'metro' => [],
        'about' => 'DLF Phase 4 is a residential area of DLF City, known for the Galleria Market.',
    ],
    'dlf-phase-5' => [
        'name' => 'DLF Phase 5', 'zone' => 'golf', 'live' => true,
        'metro' => [['Sector 42-43', 'Rapid Metro'], ['Sector 53-54', 'Rapid Metro']],
        'about' => 'DLF Phase 5 runs along Golf Course Road and is home to the DLF Golf and Country Club and several high-rise residential complexes.',
    ],
    'dlf-cyber-city' => [
        'name' => 'DLF Cyber City', 'zone' => 'dlf', 'live' => true,
        'metro' => [['Cyber City', 'Rapid Metro'], ['Moulsari Avenue', 'Rapid Metro'], ['Belvedere Towers', 'Rapid Metro']],
        'about' => 'DLF Cyber City is one of Gurugram’s main office districts, with the CyberHub food and entertainment area beside it.',
    ],
    'mg-road-gurgaon' => [
        'name' => 'MG Road', 'full' => 'MG Road, Gurgaon', 'prep' => 'on', 'zone' => 'dlf', 'live' => true,
        'metro' => [['MG Road', 'Yellow Line'], ['Sikanderpur', 'Yellow Line and Rapid Metro'], ['Guru Dronacharya', 'Yellow Line']],
        'about' => 'MG Road, the Mehrauli–Gurgaon Road, is lined with malls and offices and carries the Yellow Line overhead.',
    ],
    'sikanderpur' => [
        'name' => 'Sikanderpur', 'zone' => 'dlf', 'live' => true,
        'metro' => [['Sikanderpur', 'Yellow Line and Rapid Metro']],
        'about' => 'Sikanderpur, on MG Road beside DLF Phase 1, is where the Yellow Line meets the Rapid Metro.',
    ],
    'golf-course-road' => [
        'name' => 'Golf Course Road', 'prep' => 'on', 'zone' => 'golf', 'live' => true,
        'metro' => [['Sector 42-43', 'Rapid Metro'], ['Sector 53-54', 'Rapid Metro'], ['Sector 54 Chowk', 'Rapid Metro'], ['Sector 55-56', 'Rapid Metro']],
        'about' => 'Golf Course Road is a corridor of high-rise homes and office towers, with the Rapid Metro running alongside it.',
    ],
    'golf-course-extension-road' => [
        'name' => 'Golf Course Extension Road', 'prep' => 'on', 'zone' => 'golf', 'live' => true,
        'metro' => [],
        'about' => 'Golf Course Extension Road carries on from Golf Course Road through newer sectors of high-rise residential projects.',
    ],
    'sector-56-gurgaon' => [
        'name' => 'Sector 56', 'full' => 'Sector 56, Gurgaon', 'zone' => 'golf', 'live' => true,
        'metro' => [['Sector 55-56', 'Rapid Metro']],
        'about' => 'Sector 56 is a residential sector by the Sector 55-56 terminus of the Rapid Metro, at the Golf Course Road end of the line.',
    ],
    'sushant-lok' => [
        'name' => 'Sushant Lok', 'zone' => 'golf', 'live' => true,
        'metro' => [],
        'about' => 'Sushant Lok is a residential area built in phases, with Sushant Lok 1 in Sector 43.',
    ],
    'sohna-road' => [
        'name' => 'Sohna Road', 'prep' => 'on', 'zone' => 'sohna', 'live' => true,
        'metro' => [],
        'about' => 'Sohna Road runs south from the city towards Sohna and is lined with residential towers, offices and malls.',
    ],
    'south-city-1' => [
        'name' => 'South City 1', 'zone' => 'central', 'live' => true,
        'metro' => [],
        'about' => 'South City 1 is a residential township built by Unitech in central Gurugram.',
    ],
    'south-city-2' => [
        'name' => 'South City 2', 'zone' => 'sohna', 'live' => true,
        'metro' => [],
        'about' => 'South City 2 is a Unitech residential township along Sohna Road.',
    ],
    'nirvana-country' => [
        'name' => 'Nirvana Country', 'zone' => 'sohna', 'live' => true,
        'metro' => [],
        'about' => 'Nirvana Country is a gated Unitech township in Sector 50.',
    ],
    'malibu-town' => [
        'name' => 'Malibu Town', 'zone' => 'sohna', 'live' => true,
        'metro' => [],
        'about' => 'Malibu Town is a gated residential colony in Sector 47, close to Sohna Road.',
    ],
    'ardee-city' => [
        'name' => 'Ardee City', 'zone' => 'sohna', 'live' => true,
        'metro' => [],
        'about' => 'Ardee City is a residential township in Sector 52.',
    ],
    'badshahpur' => [
        'name' => 'Badshahpur', 'zone' => 'sohna', 'live' => true,
        'metro' => [],
        'about' => 'Badshahpur is an older settlement on Sohna Road, surrounded by newer residential sectors.',
    ],
    'sohna' => [
        'name' => 'Sohna', 'zone' => 'sohna', 'live' => true,
        'metro' => [],
        'about' => 'Sohna is a town on the southern edge of Gurugram district, known for its hot springs.',
    ],
    'old-gurgaon' => [
        'name' => 'Old Gurgaon', 'zone' => 'central', 'live' => true,
        'metro' => [],
        'about' => 'Old Gurgaon is the original town, around Sadar Bazaar and the Gurgaon railway station.',
    ],
    'sector-14-gurgaon' => [
        'name' => 'Sector 14', 'full' => 'Sector 14, Gurgaon', 'zone' => 'central', 'live' => true,
        'metro' => [],
        'about' => 'Sector 14 is one of Gurugram’s older residential sectors, with a well-known market.',
    ],
    'sector-15-gurgaon' => [
        'name' => 'Sector 15', 'full' => 'Sector 15, Gurgaon', 'zone' => 'central', 'live' => true,
        'metro' => [],
        'about' => 'Sector 15 is an older residential sector of Gurugram, in two parts, beside Sector 14.',
    ],
    'sector-29-gurgaon' => [
        'name' => 'Sector 29', 'full' => 'Sector 29, Gurgaon', 'zone' => 'central', 'live' => true,
        'metro' => [],
        'about' => 'Sector 29 is known for Leisure Valley Park and the restaurants and bars around it.',
    ],
    'udyog-vihar' => [
        'name' => 'Udyog Vihar', 'zone' => 'new', 'live' => true,
        'metro' => [],
        'about' => 'Udyog Vihar is an industrial and office area, built in phases along NH-48 near the Delhi border.',
    ],
    'palam-vihar' => [
        'name' => 'Palam Vihar', 'zone' => 'new', 'live' => true,
        'metro' => [],
        'about' => 'Palam Vihar is a residential township in north-west Gurugram, near the Dwarka border of Delhi.',
    ],
    'dwarka-expressway' => [
        'name' => 'Dwarka Expressway', 'prep' => 'on', 'zone' => 'new', 'live' => true,
        'metro' => [],
        'about' => 'The Dwarka Expressway links Dwarka in Delhi with Gurugram, through newer residential sectors.',
    ],
    'new-gurgaon' => [
        'name' => 'New Gurgaon', 'zone' => 'new', 'live' => true,
        'metro' => [],
        'about' => 'New Gurgaon is the name commonly used for the newer sectors along NH-48 towards Manesar.',
    ],
    'manesar' => [
        'name' => 'Manesar', 'zone' => 'new', 'live' => true,
        'metro' => [],
        'about' => 'Manesar is an industrial township along NH-48, home to IMT Manesar.',
    ],
];

/**
 * key => the treatment: the URL prefix of its area pages, its Gurgaon page
 * ('parent', the pillar), its anchor/H1 name, its LOCATION_LINKS family, and
 * optionally 'short' (the name in a title that is otherwise too long) and
 * 'live' => false (area pages withheld: not generated, linked or listed).
 */
const GURGAON_TREATMENTS = [
    'hair-transplant'            => ['name' => 'Hair Transplant',             'parent' => '/hair-transplant-in-gurgaon',            'family' => 'hair'],
    'fue-hair-transplant'        => ['name' => 'FUE Hair Transplant',         'parent' => '/fue-hair-transplant-in-gurgaon',        'family' => 'hair'],
    'dhi-hair-transplant'        => ['name' => 'DHI Hair Transplant',         'parent' => '/dhi-hair-transplant-in-gurgaon',        'family' => 'hair'],
    'unshaven-hair-transplant'   => ['name' => 'Unshaven Hair Transplant',    'parent' => '/unshaven-hair-transplant-in-gurgaon',   'family' => 'hair', 'short' => 'Unshaven Transplant'],
    'hairline-transplant'        => ['name' => 'Hairline Transplant',         'parent' => '/hairline-transplant-in-gurgaon',        'family' => 'hair'],
    'crown-hair-transplant'      => ['name' => 'Crown Hair Transplant',       'parent' => '/crown-hair-transplant-in-gurgaon',      'family' => 'hair', 'short' => 'Crown Transplant'],
    'hair-transplant-for-women'  => ['name' => 'Hair Transplant for Women',   'parent' => '/hair-transplant-for-women-in-gurgaon',  'family' => 'hair', 'short' => "Women's Hair Transplant"],
    'hair-transplant-repair'     => ['name' => 'Hair Transplant Repair',      'parent' => '/hair-transplant-repair-in-gurgaon',     'family' => 'hair', 'short' => 'Transplant Repair'],
    'beard-transplant'           => ['name' => 'Beard Transplant',            'parent' => '/beard-transplant-gurgaon',              'family' => 'hair'],
    'eyebrow-transplant'         => ['name' => 'Eyebrow Transplant',          'parent' => '/eyebrow-transplant-in-gurgaon',         'family' => 'hair'],
    'hair-prp-treatment'         => ['name' => 'Hair PRP Treatment',          'parent' => '/hair-prp-treatment-in-gurgaon',         'family' => 'hair'],
    'gfc-treatment'              => ['name' => 'GFC Treatment',               'parent' => '/gfc-treatment-in-gurgaon',              'family' => 'hair'],
    'hair-mesotherapy'           => ['name' => 'Hair Mesotherapy',            'parent' => '/hair-mesotherapy-in-gurgaon',           'family' => 'hair'],
    'hair-microneedling'         => ['name' => 'Hair Microneedling',          'parent' => '/hair-microneedling-in-gurgaon',         'family' => 'hair'],
    'hair-led-therapy'           => ['name' => 'Hair LED Therapy',            'parent' => '/hair-led-therapy-in-gurgaon',           'family' => 'hair'],
    'hair-fall-treatment'        => ['name' => 'Hair Fall Treatment',         'parent' => '/hair-fall-treatment-in-gurgaon',        'family' => 'hair'],
    'womens-hair-loss-treatment' => ['name' => "Women's Hair Loss Treatment", 'parent' => '/womens-hair-loss-treatment-in-gurgaon', 'family' => 'hair'],
    'alopecia-areata-treatment'  => ['name' => 'Alopecia Areata Treatment',   'parent' => '/alopecia-areata-treatment-in-gurgaon',  'family' => 'hair'],
    'dandruff-treatment'         => ['name' => 'Dandruff Treatment',          'parent' => '/dandruff-treatment-in-gurgaon',         'family' => 'hair'],
    // Not live until the clinic confirms it offers SMP in-house (the Gurgaon
    // SMP page's own note, 28 Oct 2026); the copy is written.
    'scalp-micropigmentation'    => ['name' => 'Scalp Micropigmentation',     'parent' => '/scalp-micropigmentation-in-gurgaon',    'family' => 'hair', 'short' => 'SMP', 'live' => false],
    'skin-treatment'             => ['name' => 'Skin Treatment',              'parent' => '/skin-treatment-in-gurgaon',             'family' => 'skin'],
    'laser-hair-removal'         => ['name' => 'Laser Hair Removal',          'parent' => '/laser-hair-removal-in-gurgaon',         'family' => 'skin'],
    'face-prp-treatment'         => ['name' => 'Face PRP Treatment',          'parent' => '/face-prp-treatment-in-gurgaon',         'family' => 'skin'],
];

/** A treatment's area page in Gurugram. */
function gurgaon_treatment_url(string $key, string $slug): string
{
    return '/' . $key . '-in-' . $slug;
}

/** The treatment whose Gurgaon page (the parent) is at $path, or null. */
function gurgaon_treatment_for_parent(string $path): ?string
{
    $path = rtrim($path, '/');
    foreach (GURGAON_TREATMENTS as $key => $t) {
        if ($t['parent'] === $path) {
            return $key;
        }
    }
    return null;
}

/** Whether a treatment's Gurugram area pages are live: not withheld, and its copy file written. */
function gurgaon_areas_built(string $key): bool
{
    return (GURGAON_TREATMENTS[$key]['live'] ?? true) && is_file(__DIR__ . '/gurgaon-treatments/' . $key . '.php');
}

/**
 * The live Gurugram area for an old or variant area slug, or null: exact, with
 * or without a -gurgaon / -gurugram suffix, or a known alias. Deliberately
 * strict (no prefix matching), so a Delhi slug is never captured.
 */
function gurgaon_area_slug(string $slug): ?string
{
    $aliases = [
        'cyber-city' => 'dlf-cyber-city', 'cybercity' => 'dlf-cyber-city', 'mg-road' => 'mg-road-gurgaon',
        'golf-course-extension' => 'golf-course-extension-road', 'south-city-i' => 'south-city-1',
        'south-city-ii' => 'south-city-2', 'sushant-lok-1' => 'sushant-lok', 'sushant-lok-phase-1' => 'sushant-lok',
    ];
    $base = (string) preg_replace('/-(gurgaon|gurugram)$/', '', $slug);
    foreach ([$slug, $base, $base . '-gurgaon', $aliases[$base] ?? ''] as $candidate) {
        if ($candidate !== '' && (GURGAON_SERVICE_AREAS[$candidate]['live'] ?? false)) {
            return $candidate;
        }
    }
    return null;
}

/** "Serving Patients Across Gurugram": every live area page of the treatment. */
function gurgaon_service_areas_section(string $key): string
{
    if (!gurgaon_areas_built($key)) {
        return '';
    }
    $name  = GURGAON_TREATMENTS[$key]['name'];
    $links = [];
    foreach (GURGAON_SERVICE_AREAS as $slug => $a) {
        if ($a['live']) {
            $links[gurgaon_treatment_url($key, $slug)] = $name . ' in ' . $a['name'];
        }
    }
    return serving_areas_block('Serving Patients Across Gurugram', $links);
}
