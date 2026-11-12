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

    // Added 3 Nov 2026 (client: "many Gurgaon locations have no treatment
    // pages"). The clinic's own area (Sector 39, Jharsa, Sector 38 and
    // Medanta) is left out on purpose: its page would say there is no clinic
    // there.
    'iffco-chowk' => [
        'name' => 'IFFCO Chowk', 'prep' => 'at', 'zone' => 'dlf', 'live' => true,
        'metro' => [['IFFCO Chowk', 'Yellow Line']],
        'about' => 'IFFCO Chowk is a busy junction where MG Road meets NH-48, with the IFFCO Chowk station of the Yellow Line.',
    ],
    'ambience-island' => [
        'name' => 'Ambience Island', 'prep' => 'on', 'zone' => 'dlf', 'live' => true,
        'metro' => [],
        'about' => 'Ambience Island is a residential and shopping complex on NH-48 near the Delhi border, home to Ambience Mall.',
    ],
    'sector-42-gurgaon' => [
        'name' => 'Sector 42', 'full' => 'Sector 42, Gurgaon', 'zone' => 'golf', 'live' => true,
        'metro' => [['Sector 42-43', 'Rapid Metro']],
        'about' => 'Sector 42 is a residential sector along Golf Course Road, served by the Rapid Metro.',
    ],
    'sector-53-gurgaon' => [
        'name' => 'Sector 53', 'full' => 'Sector 53, Gurgaon', 'zone' => 'golf', 'live' => true,
        'metro' => [['Sector 53-54', 'Rapid Metro']],
        'about' => 'Sector 53 is a residential sector along Golf Course Road, with the Rapid Metro running beside it.',
    ],
    'sector-54-gurgaon' => [
        'name' => 'Sector 54', 'full' => 'Sector 54, Gurgaon', 'zone' => 'golf', 'live' => true,
        'metro' => [['Sector 53-54', 'Rapid Metro'], ['Sector 54 Chowk', 'Rapid Metro']],
        'about' => 'Sector 54 is a residential sector on Golf Course Road, around Sector 54 Chowk.',
    ],
    'sector-55-gurgaon' => [
        'name' => 'Sector 55', 'full' => 'Sector 55, Gurgaon', 'zone' => 'golf', 'live' => true,
        'metro' => [['Sector 55-56', 'Rapid Metro']],
        'about' => 'Sector 55 is a residential sector at the Golf Course Road end of the Rapid Metro, by its Sector 55-56 terminus.',
    ],
    'sector-57-gurgaon' => [
        'name' => 'Sector 57', 'full' => 'Sector 57, Gurgaon', 'zone' => 'golf', 'live' => true,
        'metro' => [],
        'about' => 'Sector 57 is a residential sector between Golf Course Road and Golf Course Extension Road.',
    ],
    'sector-65-gurgaon' => [
        'name' => 'Sector 65', 'full' => 'Sector 65, Gurgaon', 'zone' => 'golf', 'live' => true,
        'metro' => [],
        'about' => 'Sector 65 is on Golf Course Extension Road, among newer high-rise residential and office projects.',
    ],
    'huda-city-centre' => [
        'name' => 'HUDA City Centre', 'prep' => 'at', 'zone' => 'central', 'live' => true,
        'metro' => [['Millennium City Centre Gurugram', 'Yellow Line']],
        'about' => 'HUDA City Centre is the area around the southern end of the Yellow Line, whose station is now called Millennium City Centre Gurugram.',
    ],
    'rajiv-chowk-gurgaon' => [
        'name' => 'Rajiv Chowk', 'full' => 'Rajiv Chowk, Gurgaon', 'prep' => 'at', 'zone' => 'central', 'live' => true,
        'metro' => [],
        'about' => 'Rajiv Chowk is a major junction on NH-48, where Sohna Road begins.',
    ],
    'sector-4-gurgaon' => [
        'name' => 'Sector 4', 'full' => 'Sector 4, Gurgaon', 'zone' => 'central', 'live' => true,
        'metro' => [],
        'about' => 'Sector 4 is one of the older residential sectors of Old Gurgaon.',
    ],
    'sector-7-gurgaon' => [
        'name' => 'Sector 7', 'full' => 'Sector 7, Gurgaon', 'zone' => 'central', 'live' => true,
        'metro' => [],
        'about' => 'Sector 7 is an older residential sector on the Old Gurgaon side of the city.',
    ],
    'sector-9-gurgaon' => [
        'name' => 'Sector 9', 'full' => 'Sector 9, Gurgaon', 'zone' => 'central', 'live' => true,
        'metro' => [],
        'about' => 'Sector 9 is an older residential sector of Gurugram, close to Old Gurgaon.',
    ],
    'sector-40-gurgaon' => [
        'name' => 'Sector 40', 'full' => 'Sector 40, Gurgaon', 'zone' => 'central', 'live' => true,
        'metro' => [],
        'about' => 'Sector 40 is a residential sector in central Gurugram.',
    ],
    'sector-45-gurgaon' => [
        'name' => 'Sector 45', 'full' => 'Sector 45, Gurgaon', 'zone' => 'central', 'live' => true,
        'metro' => [],
        'about' => 'Sector 45 is a residential sector in central Gurugram, close to HUDA City Centre.',
    ],
    'sector-46-gurgaon' => [
        'name' => 'Sector 46', 'full' => 'Sector 46, Gurgaon', 'zone' => 'central', 'live' => true,
        'metro' => [],
        'about' => 'Sector 46 is a residential sector in central Gurugram, beside Sector 45.',
    ],
    'laxman-vihar' => [
        'name' => 'Laxman Vihar', 'full' => 'Laxman Vihar, Gurgaon', 'zone' => 'central', 'live' => true,
        'metro' => [],
        'about' => 'Laxman Vihar is a residential colony in Old Gurgaon.',
    ],
    'shivaji-nagar-gurgaon' => [
        'name' => 'Shivaji Nagar', 'full' => 'Shivaji Nagar, Gurgaon', 'zone' => 'central', 'live' => true,
        'metro' => [],
        'about' => 'Shivaji Nagar is a residential colony in Old Gurgaon.',
    ],
    'jacobpura' => [
        'name' => 'Jacobpura', 'full' => 'Jacobpura, Gurgaon', 'zone' => 'central', 'live' => true,
        'metro' => [],
        'about' => 'Jacobpura is one of the old residential and market areas of Old Gurgaon.',
    ],
    'new-colony-gurgaon' => [
        'name' => 'New Colony', 'full' => 'New Colony, Gurgaon', 'zone' => 'central', 'live' => true,
        'metro' => [],
        'about' => 'New Colony is an established residential area of Old Gurgaon.',
    ],
    'sector-48-gurgaon' => [
        'name' => 'Sector 48', 'full' => 'Sector 48, Gurgaon', 'zone' => 'sohna', 'live' => true,
        'metro' => [],
        'about' => 'Sector 48 is a residential sector along Sohna Road.',
    ],
    'sector-49-gurgaon' => [
        'name' => 'Sector 49', 'full' => 'Sector 49, Gurgaon', 'zone' => 'sohna', 'live' => true,
        'metro' => [],
        'about' => 'Sector 49 is a residential sector along Sohna Road, home to the Uppal Southend township.',
    ],
    'sector-51-gurgaon' => [
        'name' => 'Sector 51', 'full' => 'Sector 51, Gurgaon', 'zone' => 'sohna', 'live' => true,
        'metro' => [],
        'about' => 'Sector 51 is a residential sector off Sohna Road, home to the Mayfield Garden colony.',
    ],
    'bhondsi' => [
        'name' => 'Bhondsi', 'zone' => 'sohna', 'live' => true,
        'metro' => [],
        'about' => 'Bhondsi is a village on Sohna Road, between Badshahpur and Sohna.',
    ],
    'sector-18-gurgaon' => [
        'name' => 'Sector 18', 'full' => 'Sector 18, Gurgaon', 'zone' => 'new', 'live' => true,
        'metro' => [],
        'about' => 'Sector 18 is an industrial and office sector along NH-48, beside Udyog Vihar.',
    ],
    'sector-22-gurgaon' => [
        'name' => 'Sector 22', 'full' => 'Sector 22, Gurgaon', 'zone' => 'new', 'live' => true,
        'metro' => [],
        'about' => 'Sector 22 is a residential sector in north-west Gurugram, near Palam Vihar.',
    ],
    'sector-23-gurgaon' => [
        'name' => 'Sector 23', 'full' => 'Sector 23, Gurgaon', 'zone' => 'new', 'live' => true,
        'metro' => [],
        'about' => 'Sector 23 is a residential sector in north-west Gurugram, beside Sector 22.',
    ],
    'sector-82-gurgaon' => [
        'name' => 'Sector 82', 'full' => 'Sector 82, Gurgaon', 'zone' => 'new', 'live' => true,
        'metro' => [],
        'about' => 'Sector 82 is one of the New Gurgaon sectors, off NH-48 on the way to Manesar.',
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
        'huda-city-center' => 'huda-city-centre', 'millennium-city-centre' => 'huda-city-centre',
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

/**
 * Hyper-local Driving Route & Real Distance, Transit / Metro Advice, and Parking Advice for Gurugram areas.
 * DenceSpot Gurugram Clinic: 1123, Sector 39 Road, Jharsa, C Block, Sector 39, Gurugram (opposite Medanta - The Medicity).
 *
 * @return array{driving: string, metro: string, parking: string}
 */
function gurgaon_area_transit_details(string $slug, array $area): array
{
    static $transit = [
        'dlf-phase-1' => [
            'driving' => 'From DLF Phase 1: Take Golf Course Road or MG Road via IFFCO Chowk onto NH-48, ~15 mins (7.5 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Take Rapid Metro from Phase 1 station or Yellow Line from Sikanderpur to Millennium City Centre Gurugram, then ~7 mins by cab or auto to Sector 39.',
            'parking' => 'Dedicated ground-level patient parking is available directly in front of the clinic with step-free entry.',
        ],
        'dlf-phase-2' => [
            'driving' => 'From DLF Phase 2: Take NH-48 via IFFCO Chowk and Rajiv Chowk, ~13 mins (6.8 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Board the Yellow Line at MG Road or Sikanderpur towards Millennium City Centre (HUDA City Centre), then a quick 7-min auto or cab directly to Sector 39.',
            'parking' => 'Dedicated on-site ground-level parking right in front of the clinic entrance ensures comfortable, step-free access.',
        ],
        'dlf-phase-3' => [
            'driving' => 'From DLF Phase 3: Take NH-48 straight through Shankar Chowk and Rajiv Chowk, ~16 mins (8.2 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Take Rapid Metro to Sikanderpur, interchange to the Yellow Line to Millennium City Centre Gurugram, then ~7 mins by cab or auto.',
            'parking' => 'Reserved patient parking at ground level directly outside the clinic with step-free entrance.',
        ],
        'dlf-phase-4' => [
            'driving' => 'From DLF Phase 4 (Galleria Market area): Take Hamilton Court Road and Netaji Subhash Marg, ~12 mins (5.8 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Direct access via Millennium City Centre (HUDA City Centre) on the Yellow Line, followed by a short 7-minute auto or cab ride to Sector 39.',
            'parking' => 'Convenient on-site ground-level parking directly in front of the clinic, with step-free access.',
        ],
        'dlf-phase-5' => [
            'driving' => 'From DLF Phase 5: Take Golf Course Road via St. Thomas Marg and Netaji Subhash Marg, ~15 mins (7.2 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Board the Rapid Metro at Sector 42-43 or 53-54, switch at Sikanderpur to the Yellow Line for Millennium City Centre, then take a 7-min auto.',
            'parking' => 'Dedicated ground-level parking directly at the clinic doorstep, allowing easy step-free entry.',
        ],
        'dlf-cyber-city' => [
            'driving' => 'From DLF Cyber City: Take NH-48 via Rajiv Chowk, ~12 mins (6.4 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Take Rapid Metro to Sikanderpur, interchange to the Yellow Line for Millennium City Centre (HUDA City Centre), then ~7 mins by cab or auto.',
            'parking' => 'Dedicated ground-level patient parking directly in front of the clinic with step-free ground-floor access.',
        ],
        'mg-road-gurgaon' => [
            'driving' => 'From MG Road: Take Mehrauli-Gurgaon Road to IFFCO Chowk, then NH-48 to Rajiv Chowk, ~12 mins (6.0 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Take the Yellow Line from MG Road or Sikanderpur straight to Millennium City Centre (HUDA City Centre), then a 7-min auto to Sector 39.',
            'parking' => 'Dedicated ground-level parking directly in front of the clinic, providing comfortable step-free access.',
        ],
        'sikanderpur' => [
            'driving' => 'From Sikanderpur: Take MG Road to NH-48 via IFFCO Chowk, ~15 mins (7.2 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Direct Yellow Line from Sikanderpur to Millennium City Centre Gurugram (3 stops), followed by a 7-minute cab or auto ride.',
            'parking' => 'Reserved on-site patient parking at ground level with step-free entry.',
        ],
        'golf-course-road' => [
            'driving' => 'From Golf Course Road: Take Golf Course Road onto St Thomas Marg and Netaji Subhash Marg, ~14 mins (6.5 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Rapid Metro along Golf Course Road to Sikanderpur, then Yellow Line to Millennium City Centre, followed by a short 7-min auto to Sector 39.',
            'parking' => 'Dedicated ground-level patient parking directly in front of the clinic with step-free access.',
        ],
        'golf-course-extension-road' => [
            'driving' => 'From Golf Course Extension Road: Take Vikas Marg or Rajesh Pilot Gurjar Road to Netaji Subhash Marg, ~14 mins (6.5 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Take an auto or cab to Sector 55-56 Rapid Metro or direct to Millennium City Centre Yellow Line station (~8 mins).',
            'parking' => 'Step-free ground-level patient parking located right outside the clinic entrance.',
        ],
        'sector-56-gurgaon' => [
            'driving' => 'From Sector 56: Take Golf Course Extension Road via Vikas Marg or Artemis Hospital road, ~18 mins (8.5 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Board the Rapid Metro at Sector 55-56 terminus, or take a direct 10-minute auto or cab to Millennium City Centre Yellow Line station.',
            'parking' => 'Dedicated on-site parking at ground level with step-free entrance for patient comfort.',
        ],
        'sushant-lok' => [
            'driving' => 'From Sushant Lok: Take Netaji Subhash Marg and CH Bakhtawar Singh Road, ~10 mins (4.8 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Convenient access via Millennium City Centre or IFFCO Chowk Yellow Line stations, then ~6-8 mins by cab or auto.',
            'parking' => 'Reserved ground-level patient parking right at the clinic doorstep with step-free accessibility.',
        ],
        'sohna-road' => [
            'driving' => 'From Sohna Road: Drive north via Subhash Chowk and take Sector 39 Road, ~8 mins (3.5 km) to our clinic directly opposite Medanta.',
            'metro'   => 'From Sohna Road, take a quick 7-minute cab or auto to Millennium City Centre Yellow Line, or direct cab to Sector 39.',
            'parking' => 'Dedicated ground-level parking right in front of the clinic with smooth, step-free access.',
        ],
        'south-city-1' => [
            'driving' => 'From South City 1: Take CH Bakhtawar Singh Road or NH-48 service road, ~8 mins (3.2 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Millennium City Centre (HUDA City Centre) is just 5 mins away, followed by an easy connection to Sector 39.',
            'parking' => 'Dedicated ground-level parking in front of the clinic entrance with step-free access.',
        ],
        'south-city-2' => [
            'driving' => 'From South City 2: Take Sohna Road via Subhash Chowk onto Sector 39 Road, ~10 mins (4.2 km) to our clinic opposite Medanta.',
            'metro'   => 'Direct 8-min auto or cab ride to Millennium City Centre Yellow Line or direct to Sector 39.',
            'parking' => 'Convenient ground-level parking available directly outside the clinic premises.',
        ],
        'nirvana-country' => [
            'driving' => 'From Nirvana Country (Sector 50): Take Mayfield Garden Road and Vikas Marg via Subhash Chowk, ~10 mins (4.5 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'A short 8-10 minute cab or auto connects you to Millennium City Centre Yellow Line station.',
            'parking' => 'Dedicated on-site ground-level parking directly in front of the clinic with step-free entrance.',
        ],
        'malibu-town' => [
            'driving' => 'From Malibu Town (Sector 47): Head out to Sohna Road, cross Subhash Chowk into Sector 39 Road, ~7 mins (3.0 km) to our clinic opposite Medanta.',
            'metro'   => 'Millennium City Centre Yellow Line station is only ~7 mins away by cab or auto.',
            'parking' => 'Reserved ground-level patient parking right in front of the clinic with step-free accessibility.',
        ],
        'ardee-city' => [
            'driving' => 'From Ardee City (Sector 52): Take Netaji Subhash Marg and Sector 39 Road, ~10 mins (4.5 km) to our clinic opposite Medanta.',
            'metro'   => 'Millennium City Centre (HUDA City Centre) Yellow Line station is just 6 mins away.',
            'parking' => 'Dedicated ground-level parking in front of the clinic with step-free access.',
        ],
        'badshahpur' => [
            'driving' => 'From Badshahpur: Drive north on Sohna Road (NH-248A) via Subhash Chowk, ~16 mins (7.5 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Take a direct cab or auto straight along Sohna Road to Sector 39 (~15-18 mins).',
            'parking' => 'Ground-level on-site parking directly outside the clinic with step-free entry.',
        ],
        'sohna' => [
            'driving' => 'From Sohna: Take the Sohna Elevated Corridor (NH-248A) straight to Subhash Chowk, ~28 mins (20 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'The Sohna Elevated highway provides a fast, direct driving route; the nearest metro is Millennium City Centre.',
            'parking' => 'Dedicated ground-level patient parking right outside the clinic with easy step-free entry.',
        ],
        'old-gurgaon' => [
            'driving' => 'From Old Gurgaon: Take Old Railway Road and Jharsa Road via Mor Chowk to Sector 39, ~12 mins (4.5 km) to our clinic opposite Medanta.',
            'metro'   => 'Take an auto or e-rickshaw via Civil Lines / Rajiv Chowk directly to Sector 39.',
            'parking' => 'Ground-level on-site parking directly in front of the clinic with step-free access.',
        ],
        'sector-14-gurgaon' => [
            'driving' => 'From Sector 14: Take Old Delhi Road to Atul Kataria Chowk and join NH-48 towards Rajiv Chowk, ~14 mins (5.5 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'IFFCO Chowk or MG Road Yellow Line stations are ~10 mins away, or take a direct 12-14 min cab/auto to Sector 39.',
            'parking' => 'Dedicated ground-level parking directly at the clinic doorstep with step-free entry.',
        ],
        'sector-15-gurgaon' => [
            'driving' => 'From Sector 15: Take Jharsa Road or NH-48 service road via Rajiv Chowk, ~9 mins (3.8 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'A short 7-8 min auto or cab connects you directly to Millennium City Centre or IFFCO Chowk metro stations.',
            'parking' => 'Reserved ground-level patient parking directly in front of the clinic with step-free access.',
        ],
        'sector-29-gurgaon' => [
            'driving' => 'From Sector 29: Take Leisure Valley Road and join NH-48 or CH Bakhtawar Singh Road, ~9 mins (4.0 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Millennium City Centre (HUDA City Centre) or IFFCO Chowk on the Yellow Line are within 5-7 mins.',
            'parking' => 'Dedicated on-site ground-level parking directly outside the clinic entrance.',
        ],
        'udyog-vihar' => [
            'driving' => 'From Udyog Vihar: Take NH-48 expressway straight through IFFCO Chowk to Rajiv Chowk, ~15 mins (8.0 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Take Rapid Metro to Sikanderpur, switch to Yellow Line for Millennium City Centre, then a quick auto ride.',
            'parking' => 'Dedicated ground-level parking directly in front of the clinic with step-free access.',
        ],
        'palam-vihar' => [
            'driving' => 'From Palam Vihar: Take Rezang La Marg to Old Delhi Road, then NH-48 via Rajiv Chowk, ~24 mins (11.5 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Take a direct cab or auto via Atul Kataria Chowk to Sector 39.',
            'parking' => 'Ground-level patient parking directly outside the clinic with step-free accessibility.',
        ],
        'dwarka-expressway' => [
            'driving' => 'From Dwarka Expressway: Take CPR / Cloverleaf onto NH-48 towards Rajiv Chowk, ~22 mins (12.0 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'The expressway connects directly to NH-48 for a smooth drive; nearest Yellow Line station is Millennium City Centre.',
            'parking' => 'Dedicated ground-level on-site parking directly in front of the clinic with step-free entry.',
        ],
        'new-gurgaon' => [
            'driving' => 'From New Gurgaon: Take NH-48 expressway through Kherki Daula toll towards Rajiv Chowk, ~18 mins (13.5 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Direct drive via NH-48; nearest metro terminus is Millennium City Centre Gurugram.',
            'parking' => 'Reserved patient parking at ground level right at the clinic entrance with step-free access.',
        ],
        'manesar' => [
            'driving' => 'From Manesar / IMT: Take NH-48 expressway straight towards Rajiv Chowk, ~25 mins (18.5 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'NH-48 expressway offers the fastest route; Millennium City Centre is the closest metro hub.',
            'parking' => 'Dedicated ground-level parking directly in front of the clinic premises with step-free entry.',
        ],
        'iffco-chowk' => [
            'driving' => 'From IFFCO Chowk: Take NH-48 straight south towards Rajiv Chowk, ~9 mins (4.2 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'IFFCO Chowk Yellow Line station is 2 stops from Millennium City Centre, followed by a short auto ride.',
            'parking' => 'Dedicated ground-level parking right outside the clinic with step-free access.',
        ],
        'ambience-island' => [
            'driving' => 'From Ambience Island: Take NH-48 expressway south through IFFCO Chowk & Rajiv Chowk, ~16 mins (9.2 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Take Rapid Metro (Moulsari Avenue / Cyber City) to Sikanderpur, then Yellow Line to Millennium City Centre.',
            'parking' => 'Dedicated ground-level patient parking right at the clinic entrance with step-free accessibility.',
        ],
        'sector-42-gurgaon' => [
            'driving' => 'From Sector 42: Take Golf Course Road onto Netaji Subhash Marg, ~13 mins (6.0 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Rapid Metro at Sector 42-43 to Sikanderpur, then Yellow Line to Millennium City Centre Gurugram.',
            'parking' => 'Reserved ground-level parking directly in front of the clinic with step-free entry.',
        ],
        'sector-53-gurgaon' => [
            'driving' => 'From Sector 53: Take Golf Course Road via St. Thomas Marg and Vikas Marg, ~15 mins (7.0 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Rapid Metro at Sector 53-54 to Sikanderpur, then Yellow Line to Millennium City Centre.',
            'parking' => 'Dedicated on-site ground-level parking in front of the clinic with step-free access.',
        ],
        'sector-54-gurgaon' => [
            'driving' => 'From Sector 54: Take Golf Course Road and Vikas Marg to Netaji Subhash Marg, ~17 mins (8.2 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Rapid Metro at Sector 54 Chowk to Sikanderpur, then Yellow Line to Millennium City Centre.',
            'parking' => 'Ground-level patient parking directly outside the clinic with step-free access.',
        ],
        'sector-55-gurgaon' => [
            'driving' => 'From Sector 55: Take Golf Course Extension Road via Vikas Marg, ~17 mins (8.0 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Rapid Metro from Sector 55-56 terminus to Sikanderpur, or a direct 10-min cab to Millennium City Centre.',
            'parking' => 'Dedicated ground-level parking right in front of the clinic with step-free entrance.',
        ],
        'sector-57-gurgaon' => [
            'driving' => 'From Sector 57: Take Vikas Marg or Artemis Hospital road towards Netaji Subhash Marg, ~15 mins (6.8 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Millennium City Centre (HUDA City Centre) Yellow Line station is ~10 mins away by cab or auto.',
            'parking' => 'Reserved on-site parking at ground level directly outside the clinic with step-free access.',
        ],
        'sector-65-gurgaon' => [
            'driving' => 'From Sector 65: Take Golf Course Extension Road to Vikas Marg / Netaji Subhash Marg, ~16 mins (7.8 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Sector 55-56 Rapid Metro or Millennium City Centre Yellow Line are ~10-12 mins away by cab.',
            'parking' => 'Dedicated ground-level patient parking directly in front of the clinic with step-free accessibility.',
        ],
        'huda-city-centre' => [
            'driving' => 'From HUDA City Centre (Millennium City Centre): Take CH Bakhtawar Singh Road, ~7 mins (2.8 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Millennium City Centre Gurugram on the Yellow Line is the closest metro hub—just 7 mins by auto or cab.',
            'parking' => 'Dedicated on-site ground-level parking right at the clinic entrance with step-free access.',
        ],
        'rajiv-chowk-gurgaon' => [
            'driving' => 'From Rajiv Chowk: Take Medanta Hospital Road / Jharsa Road, ~4 mins (1.8 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Rajiv Chowk junction is just 4 minutes away; Millennium City Centre Yellow Line is ~7 mins away.',
            'parking' => 'Dedicated ground-level patient parking directly outside the clinic entrance with step-free accessibility.',
        ],
        'sector-4-gurgaon' => [
            'driving' => 'From Sector 4: Take Old Railway Road and Jharsa Road via Mor Chowk, ~15 mins (6.0 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Direct 12-15 min auto or cab via Civil Lines to Sector 39.',
            'parking' => 'Dedicated ground-level parking in front of the clinic with step-free access.',
        ],
        'sector-7-gurgaon' => [
            'driving' => 'From Sector 7: Take Old Railway Road to Mor Chowk, then Jharsa Road, ~14 mins (5.8 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Quick auto or cab via Civil Lines directly to Sector 39 opposite Medanta.',
            'parking' => 'On-site ground-level patient parking directly outside the clinic with step-free entry.',
        ],
        'sector-9-gurgaon' => [
            'driving' => 'From Sector 9: Take Basai Road to Rajiv Chowk and join Sector 39 Road, ~16 mins (6.5 km) to our clinic opposite Medanta.',
            'metro'   => 'Direct cab or auto via Rajiv Chowk straight to Sector 39.',
            'parking' => 'Reserved ground-level patient parking right in front of the clinic with step-free access.',
        ],
        'sector-40-gurgaon' => [
            'driving' => 'From Sector 40: Take Netaji Subhash Marg and Sector 39 Road, ~5 mins (2.2 km) to our clinic directly opposite Medanta.',
            'metro'   => 'Millennium City Centre (HUDA City Centre) Yellow Line station is just 5 mins away.',
            'parking' => 'Dedicated ground-level parking in front of the clinic with step-free access.',
        ],
        'sector-45-gurgaon' => [
            'driving' => 'From Sector 45: Take Netaji Subhash Marg into Sector 39 Road, ~8 mins (3.5 km) to our clinic opposite Medanta.',
            'metro'   => 'Millennium City Centre Yellow Line station is only ~6 mins away by auto or cab.',
            'parking' => 'Dedicated ground-level patient parking directly in front of the clinic with step-free accessibility.',
        ],
        'sector-46-gurgaon' => [
            'driving' => 'From Sector 46: Take Jalvayu Vihar Road and Sector 39 Road, ~7 mins (3.0 km) to our clinic directly opposite Medanta.',
            'metro'   => 'Millennium City Centre Yellow Line is ~7 mins away by cab or auto.',
            'parking' => 'Reserved on-site parking at ground level directly outside the clinic.',
        ],
        'laxman-vihar' => [
            'driving' => 'From Laxman Vihar: Take Railway Station Road through Old Gurgaon to Rajiv Chowk, ~18 mins (7.0 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Direct auto or cab via Old Railway Road to Sector 39.',
            'parking' => 'Dedicated ground-level patient parking in front of the clinic with step-free access.',
        ],
        'shivaji-nagar-gurgaon' => [
            'driving' => 'From Shivaji Nagar: Take Jharsa Road straight towards Medanta, ~9 mins (3.5 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Direct auto or e-rickshaw via Jharsa Road (~8-10 mins).',
            'parking' => 'Dedicated ground-level parking right outside the clinic with step-free entrance.',
        ],
        'jacobpura' => [
            'driving' => 'From Jacobpura: Take Sadar Bazaar Road to Jharsa Road, ~11 mins (4.2 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Direct auto or cab through Civil Lines to Sector 39.',
            'parking' => 'On-site ground-level patient parking directly in front of the clinic with step-free access.',
        ],
        'new-colony-gurgaon' => [
            'driving' => 'From New Colony: Take Geeta Bhawan Road to Rajiv Chowk, ~13 mins (5.0 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Direct cab or auto via Rajiv Chowk straight to Sector 39.',
            'parking' => 'Reserved ground-level patient parking right in front of the clinic entrance.',
        ],
        'sector-48-gurgaon' => [
            'driving' => 'From Sector 48: Take Sohna Road north via Subhash Chowk into Sector 39 Road, ~9 mins (3.8 km) to our clinic opposite Medanta.',
            'metro'   => 'Direct 8-minute cab or auto to Millennium City Centre Yellow Line or direct to Sector 39.',
            'parking' => 'Dedicated ground-level parking directly in front of the clinic with step-free access.',
        ],
        'sector-49-gurgaon' => [
            'driving' => 'From Sector 49: Take Sohna Road via Subhash Chowk to Sector 39 Road, ~10 mins (4.2 km) to our clinic opposite Medanta.',
            'metro'   => 'Direct 8-10 min cab or auto to Millennium City Centre Yellow Line or direct to Sector 39.',
            'parking' => 'Dedicated ground-level patient parking directly in front of the clinic with step-free entrance.',
        ],
        'sector-51-gurgaon' => [
            'driving' => 'From Sector 51: Take Samaspur Road and Netaji Subhash Marg, ~12 mins (5.0 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Millennium City Centre (HUDA City Centre) Yellow Line station is ~8 mins away.',
            'parking' => 'On-site ground-level parking directly in front of the clinic with step-free accessibility.',
        ],
        'bhondsi' => [
            'driving' => 'From Bhondsi: Take Sohna-Gurgaon Road (NH-248A) past Badshahpur and Subhash Chowk, ~22 mins (13.5 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Direct cab or auto along Sohna Road; nearest metro hub is Millennium City Centre.',
            'parking' => 'Dedicated ground-level parking right outside the clinic entrance with step-free entry.',
        ],
        'sector-18-gurgaon' => [
            'driving' => 'From Sector 18: Take NH-48 via IFFCO Chowk towards Rajiv Chowk, ~14 mins (7.5 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Yellow Line at IFFCO Chowk or MG Road to Millennium City Centre, then a quick auto ride.',
            'parking' => 'Dedicated ground-level parking directly in front of the clinic with step-free access.',
        ],
        'sector-22-gurgaon' => [
            'driving' => 'From Sector 22: Take Old Delhi Road to Atul Kataria Chowk and join NH-48, ~20 mins (9.5 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Direct cab or auto via NH-48 / Rajiv Chowk to Sector 39.',
            'parking' => 'Reserved ground-level patient parking directly outside the clinic with step-free entry.',
        ],
        'sector-23-gurgaon' => [
            'driving' => 'From Sector 23: Take Old Delhi Road to NH-48 via Rajiv Chowk, ~22 mins (10.0 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Direct cab or auto via NH-48 or Old Delhi Road straight to Sector 39.',
            'parking' => 'Dedicated on-site ground-level parking right in front of the clinic with step-free access.',
        ],
        'sector-82-gurgaon' => [
            'driving' => 'From Sector 82: Take NH-48 expressway past Kherki Daula toll to Rajiv Chowk, ~18 mins (13.5 km) to our Sector 39 clinic opposite Medanta.',
            'metro'   => 'Fast highway access via NH-48; nearest metro station is Millennium City Centre Gurugram.',
            'parking' => 'Dedicated ground-level patient parking directly in front of the clinic with step-free accessibility.',
        ],
    ];

    if (isset($transit[$slug])) {
        return $transit[$slug];
    }

    $place = $area['name'] ?? 'your location';
    return [
        'driving' => 'From ' . $place . ': Take the nearest arterial corridor to NH-48 / Rajiv Chowk and turn onto Sector 39 Road opposite Medanta – The Medicity.',
        'metro'   => 'The closest metro connection is Millennium City Centre Gurugram (Yellow Line), approximately 7-8 minutes away by cab or auto.',
        'parking' => 'Dedicated ground-level patient parking is available directly in front of the clinic with step-free access.',
    ];
}

