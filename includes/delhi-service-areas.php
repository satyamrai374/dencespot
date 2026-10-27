<?php
/**
 * Delhi hair transplant area pages, /hair-transplant-in-<area>, and the
 * "Serving Patients Across Delhi" block that links them all from the pillar.
 *
 * The client's list of Delhi areas (27 Oct 2026), each with the URL and
 * priority it asked for. DenceSpot has one clinic in Delhi, in Rohini, so an
 * area page is a page for patients travelling from that area, never a clinic
 * there: every page says where the clinic is, books, calls and messages the
 * Rohini clinic, and is a Rohini page under the location rule (no Gurugram
 * clinic, no AI images). Each has its own file in the site root,
 * hair-transplant-in-<slug>.php, which sets $slug and requires
 * includes/delhi-area-page.php (client, 27 Oct 2026: PHP pages, no folder).
 *
 * Facts per area:
 *  - district, pins, metro: the generated Delhi area data of 25 Oct 2026
 *    (districts and places from OpenStreetMap, ODbL; metro stations and lines
 *    from Wikidata, CC0, including the 2025–26 station renames; PIN codes from
 *    India Post). Where that data had no entry (Prashant Vihar, Wazirpur,
 *    Keshav Puram, Mukherjee Nagar, Burari, Budh Vihar, Nehru Place, Rajendra
 *    Place, Daryaganj, Krishna Nagar), the district is left out and only
 *    stations and PIN codes in common knowledge are given.
 *  - about: one or two sentences of widely documented local landmarks.
 *  - route: one metro route to the Red Line, which runs through Rohini, by
 *    the interchanges on the Delhi Metro map (Netaji Subhash Place for the
 *    Pink Line, Kashmere Gate for the Yellow and Violet Lines, Welcome for the
 *    Pink Line from the east, Inderlok for the Green Line). The clinic's street
 *    address and nearest station are not on record, so no page gives a
 *    distance, a journey time or a station-to-door route.
 *
 * 'live' => false turns a page off: the URL then 301s to the pillar and the
 * pillar stops linking it.
 *
 * Beard transplant (client, 27 Oct 2026): the same areas have a second set of
 * pages, /beard-transplant-in-<slug> (beard-transplant-in-<slug>.php, layout
 * includes/delhi-beard-area-page.php), under the /beard-transplant-in-delhi
 * pillar. Rohini has no beard area page: /beard-transplant-in-rohini is the
 * clinic's own beard page, and the beard area list links that. 'live' turns
 * off both pages of an area.
 *
 * Laser hair removal (client, 27 Oct 2026): a third set, /laser-hair-removal-
 * in-<slug> (laser-hair-removal-in-<slug>.php, layout
 * includes/delhi-laser-area-page.php), under the /laser-hair-removal-in-delhi
 * pillar. As with beard, Rohini has no laser area page: the laser area list
 * links the clinic's own /laser-hair-removal-in-rohini. 'live' turns off all
 * three pages of an area.
 *
 * Every other service (client, 27 Oct 2026): the same pattern from one
 * layout, for each treatment in DELHI_TREATMENTS (includes/delhi-treatments.php).
 * 'live' turns off an area's page for every treatment.
 */

declare(strict_types=1);

require_once __DIR__ . '/delhi-treatments.php';

/** The Delhi pillar page. */
const DELHI_HT_HUB = '/hair-transplant-in-delhi';

/** The Delhi beard transplant pillar page. */
const DELHI_BEARD_HUB = '/beard-transplant-in-delhi';

/** The Delhi laser hair removal pillar page. */
const DELHI_LASER_HUB = '/laser-hair-removal-in-delhi';

/** Parts of the city, named on an area page whose district is not on record. */
const DELHI_SERVICE_ZONES = [
    'north'   => 'North & North-West Delhi',
    'west'    => 'West & South-West Delhi',
    'south'   => 'South Delhi',
    'central' => 'Central Delhi',
    'east'    => 'East & North-East Delhi',
];

/** slug => the area. In the client's order. */
const DELHI_SERVICE_AREAS = [
    'rohini' => [
        'name' => 'Rohini', 'url' => '/hair-transplant-in-rohini', 'priority' => 'High', 'zone' => 'north', 'live' => true,
        'district' => 'North West Delhi', 'pins' => [],
        'metro' => [['Rithala', 'Red Line'], ['Dr. Baba Saheb Ambedkar Hospital', 'Red Line', 'formerly Rohini West'], ['Rohini', 'Red Line', 'formerly Rohini East'], ['Rohini Sector 18, 19', 'Yellow Line']],
        'about' => 'Rohini is a residential sub-city in North-West Delhi, built by the Delhi Development Authority from the 1980s and laid out in numbered sectors. DenceSpot’s Delhi clinic is here, so the consultation, the procedure day and the reviews through the year can be planned around ordinary days at home or work.',
        'route' => 'The Red Line has three stations in Rohini: Rithala in Sector 5, its western terminus; Dr. Baba Saheb Ambedkar Hospital, earlier called Rohini West, in front of Unity One Mall; and Rohini, earlier Rohini East, on Bhagwan Mahavir Marg. On the Yellow Line, the station is Rohini Sector 18, 19.',
    ],
    'pitampura' => [
        'name' => 'Pitampura', 'url' => '/hair-transplant-in-pitampura', 'priority' => 'High', 'zone' => 'north', 'live' => true,
        'district' => 'Central North Delhi', 'pins' => ['110034'],
        'metro' => [['Madhuban Chowk', 'Red Line', 'formerly Pitampura'], ['Kohat Enclave', 'Red Line'], ['Netaji Subhash Place', 'Red and Pink Lines']],
        'about' => 'Pitampura borders Rohini across the Outer Ring Road. It is home to the Pitampura TV Tower and Dilli Haat Pitampura, with the Netaji Subhash Place business district on its southern side.',
        'route' => 'Madhuban Chowk, Kohat Enclave and Netaji Subhash Place are all on the Red Line, so the ride into Rohini is direct, towards Rithala, without changing lines.',
    ],
    'prashant-vihar' => [
        'name' => 'Prashant Vihar', 'url' => '/hair-transplant-in-prashant-vihar', 'priority' => 'High', 'zone' => 'north', 'live' => true,
        'district' => null, 'pins' => ['110085'],
        'metro' => [],
        'about' => 'Prashant Vihar is a residential area of North-West Delhi on the edge of Rohini, sharing its PIN code with the neighbouring Rohini sectors.',
        'route' => 'With Rohini next door, most people come by car, cab or auto. For the metro, the nearest Red Line stations are in Rohini and Pitampura.',
    ],
    'nsp-delhi' => [
        'name' => 'Netaji Subhash Place', 'aka' => 'NSP', 'url' => '/hair-transplant-in-nsp-delhi', 'priority' => 'High', 'zone' => 'north', 'live' => true,
        'district' => 'Central North Delhi', 'pins' => ['110034'],
        'metro' => [['Netaji Subhash Place', 'Red and Pink Lines'], ['Shakurpur', 'Pink Line'], ['Kohat Enclave', 'Red Line']],
        'about' => 'Netaji Subhash Place is a business district of office towers, malls and showrooms between Pitampura, Shalimar Bagh and Wazirpur.',
        'route' => 'Netaji Subhash Place station is on the Red Line, so it is a direct ride towards Rithala into Rohini. It is also the interchange where Pink Line riders from across the city change to the Red Line.',
    ],
    'shalimar-bagh' => [
        'name' => 'Shalimar Bagh', 'url' => '/hair-transplant-in-shalimar-bagh', 'priority' => 'High', 'zone' => 'north', 'live' => true,
        'district' => 'Central North Delhi', 'pins' => ['110088'],
        'metro' => [['Shalimar Bagh', 'Pink Line'], ['Netaji Subhash Place', 'Red and Pink Lines'], ['Adarsh Nagar', 'Yellow Line']],
        'about' => 'Shalimar Bagh is a residential area of North-West Delhi named after the Mughal-era Shalimar Bagh garden, between Pitampura and Azadpur.',
        'route' => 'Take the Pink Line one stop to Netaji Subhash Place, then the Red Line towards Rithala into Rohini.',
    ],
    'paschim-vihar' => [
        'name' => 'Paschim Vihar', 'url' => '/hair-transplant-in-paschim-vihar', 'priority' => 'High', 'zone' => 'west', 'live' => true,
        'district' => 'Central North Delhi', 'pins' => ['110063'],
        'metro' => [['Paschim Vihar West', 'Green Line'], ['Paschim Vihar East', 'Green Line'], ['Peeragarhi', 'Green Line']],
        'about' => 'Paschim Vihar is a residential area of West Delhi along Rohtak Road, with the Green Line running overhead and the Outer Ring Road meeting it at Peeragarhi.',
        'route' => 'Take the Green Line to Inderlok, then the Red Line towards Rithala into Rohini. By road, the Outer Ring Road runs north from Peeragarhi to Rohini.',
    ],
    'punjabi-bagh' => [
        'name' => 'Punjabi Bagh', 'url' => '/hair-transplant-in-punjabi-bagh', 'priority' => 'High', 'zone' => 'west', 'live' => true,
        'district' => 'Central Delhi', 'pins' => ['110026'],
        'metro' => [['Punjabi Bagh West', 'Green and Pink Lines'], ['Punjabi Bagh', 'Green Line'], ['Shivaji Park', 'Green Line']],
        'about' => 'Punjabi Bagh, on Rohtak Road, is one of West Delhi’s older planned residential colonies, divided into East and West.',
        'route' => 'From Punjabi Bagh West, take the Pink Line to Netaji Subhash Place (Shakurpur is the only stop between), then the Red Line towards Rithala.',
    ],
    'rajouri-garden' => [
        'name' => 'Rajouri Garden', 'url' => '/hair-transplant-in-rajouri-garden', 'priority' => 'High', 'zone' => 'west', 'live' => true,
        'district' => 'West Delhi', 'pins' => ['110027'],
        'metro' => [['Rajouri Garden', 'Blue and Pink Lines'], ['Mayapuri', 'Pink Line'], ['Tagore Garden', 'Blue Line']],
        'about' => 'Rajouri Garden in West Delhi is known for its main market and the malls along Najafgarh Road.',
        'route' => 'Rajouri Garden is an interchange: take the Pink Line to Netaji Subhash Place, then the Red Line towards Rithala into Rohini.',
    ],
    'janakpuri' => [
        'name' => 'Janakpuri', 'url' => '/hair-transplant-in-janakpuri', 'priority' => 'High', 'zone' => 'west', 'live' => true,
        'district' => 'West Delhi', 'pins' => ['110058'],
        'metro' => [['Janakpuri East', 'Blue Line'], ['Janakpuri West', 'Blue and Magenta Lines'], ['Dabri Mor – Janakpuri South', 'Magenta Line']],
        'about' => 'Janakpuri is a large planned residential area of West Delhi, built by the Delhi Development Authority, with the Janakpuri District Centre at its heart.',
        'route' => 'Take the Blue Line to Rajouri Garden, the Pink Line to Netaji Subhash Place, then the Red Line towards Rithala.',
    ],
    'dwarka' => [
        'name' => 'Dwarka', 'url' => '/hair-transplant-in-dwarka', 'priority' => 'High', 'zone' => 'west', 'live' => true,
        'district' => 'South West Delhi', 'pins' => ['110075', '110077', '110078'],
        'metro' => [['Dwarka Sector 12', 'Blue Line'], ['Dwarka Sector 13', 'Blue Line'], ['Dwarka Sector 14', 'Blue Line']],
        'about' => 'Dwarka is a planned sub-city in South-West Delhi, laid out in numbered sectors near the airport, with the Blue Line running through it.',
        'route' => 'Take the Blue Line to Rajouri Garden, the Pink Line to Netaji Subhash Place, then the Red Line towards Rithala. Dwarka and Rohini are on opposite sides of the city, so allow for a long journey either way.',
    ],
    'uttam-nagar' => [
        'name' => 'Uttam Nagar', 'url' => '/hair-transplant-in-uttam-nagar', 'priority' => 'High', 'zone' => 'west', 'live' => true,
        'district' => 'West Delhi', 'pins' => ['110059'],
        'metro' => [['Uttam Nagar West', 'Blue Line'], ['Uttam Nagar East', 'Blue Line'], ['Nawada', 'Blue Line']],
        'about' => 'Uttam Nagar is a busy residential and market area of West Delhi along Najafgarh Road, between Janakpuri and Dwarka.',
        'route' => 'Take the Blue Line to Rajouri Garden, the Pink Line to Netaji Subhash Place, then the Red Line towards Rithala.',
    ],
    'vikaspuri' => [
        'name' => 'Vikaspuri', 'url' => '/hair-transplant-in-vikaspuri', 'priority' => 'High', 'zone' => 'west', 'live' => true,
        'district' => 'West Delhi', 'pins' => ['110018'],
        'metro' => [['Janakpuri West', 'Blue and Magenta Lines'], ['Janakpuri East', 'Blue Line'], ['Krishna Park Extension', 'Magenta Line']],
        'about' => 'Vikaspuri is a planned residential area of West Delhi on the Outer Ring Road, next to Janakpuri.',
        'route' => 'From Janakpuri, take the Blue Line to Rajouri Garden, the Pink Line to Netaji Subhash Place, then the Red Line towards Rithala. By road, the Outer Ring Road runs north from Vikaspuri past Peeragarhi to Rohini.',
    ],
    'tilak-nagar' => [
        'name' => 'Tilak Nagar', 'url' => '/hair-transplant-in-tilak-nagar', 'priority' => 'Medium', 'zone' => 'west', 'live' => true,
        'district' => 'West Delhi', 'pins' => ['110018'],
        'metro' => [['Tilak Nagar', 'Blue Line'], ['Janakpuri East', 'Blue Line'], ['Krishna Park Extension', 'Magenta Line']],
        'about' => 'Tilak Nagar is a West Delhi neighbourhood on Najafgarh Road, known for its busy market.',
        'route' => 'Take the Blue Line three stops to Rajouri Garden, the Pink Line to Netaji Subhash Place, then the Red Line towards Rithala.',
    ],
    'kirti-nagar' => [
        'name' => 'Kirti Nagar', 'url' => '/hair-transplant-in-kirti-nagar', 'priority' => 'Medium', 'zone' => 'west', 'live' => true,
        'district' => 'Central Delhi', 'pins' => ['110015'],
        'metro' => [['Kirti Nagar', 'Blue and Green Lines'], ['Moti Nagar', 'Blue Line'], ['Ramesh Nagar', 'Blue Line']],
        'about' => 'Kirti Nagar in West Delhi is known for its large furniture market and its industrial area.',
        'route' => 'Take the Blue Line west to Rajouri Garden, the Pink Line to Netaji Subhash Place, then the Red Line towards Rithala.',
    ],
    'moti-nagar' => [
        'name' => 'Moti Nagar', 'url' => '/hair-transplant-in-moti-nagar', 'priority' => 'Medium', 'zone' => 'west', 'live' => true,
        'district' => 'Central Delhi', 'pins' => ['110015'],
        'metro' => [['Moti Nagar', 'Blue Line'], ['Punjabi Bagh West', 'Green and Pink Lines'], ['ESI – Basaidarapur', 'Pink Line']],
        'about' => 'Moti Nagar is a residential and industrial area of West Delhi on Najafgarh Road, between Kirti Nagar and Ramesh Nagar.',
        'route' => 'Take the Blue Line two stops west to Rajouri Garden, the Pink Line to Netaji Subhash Place, then the Red Line towards Rithala.',
    ],
    'subhash-nagar' => [
        'name' => 'Subhash Nagar', 'url' => '/hair-transplant-in-subhash-nagar', 'priority' => 'Medium', 'zone' => 'west', 'live' => true,
        'district' => 'West Delhi', 'pins' => ['110027'],
        'metro' => [['Subhash Nagar', 'Blue Line'], ['Tagore Garden', 'Blue Line'], ['Mayapuri', 'Pink Line']],
        'about' => 'Subhash Nagar is a residential area of West Delhi between Rajouri Garden and Tilak Nagar, on Najafgarh Road.',
        'route' => 'Take the Blue Line two stops to Rajouri Garden, the Pink Line to Netaji Subhash Place, then the Red Line towards Rithala.',
    ],
    'model-town' => [
        'name' => 'Model Town', 'url' => '/hair-transplant-in-model-town', 'priority' => 'High', 'zone' => 'north', 'live' => true,
        'district' => 'Central North Delhi', 'pins' => ['110009'],
        'metro' => [['Model Town', 'Yellow Line'], ['Azadpur', 'Yellow and Pink Lines'], ['Majlis Park', 'Pink and Magenta Lines']],
        'about' => 'Model Town is a residential area of North Delhi known for Naini Lake and its tree-lined lanes, between Azadpur and Mukherjee Nagar.',
        'route' => 'Take the Yellow Line one stop to Azadpur, the Pink Line two stops to Netaji Subhash Place, then the Red Line towards Rithala.',
    ],
    'ashok-vihar' => [
        'name' => 'Ashok Vihar', 'url' => '/hair-transplant-in-ashok-vihar', 'priority' => 'High', 'zone' => 'north', 'live' => true,
        'district' => 'Central North Delhi', 'pins' => ['110052'],
        'metro' => [['Keshav Puram', 'Red Line'], ['Kanhaiya Nagar', 'Red Line'], ['Shalimar Bagh', 'Pink Line']],
        'about' => 'Ashok Vihar is a residential area of North-West Delhi built in phases, beside Wazirpur and close to Netaji Subhash Place.',
        'route' => 'Keshav Puram and Kanhaiya Nagar are on the Red Line, so the ride into Rohini is direct, towards Rithala.',
    ],
    'adarsh-nagar' => [
        'name' => 'Adarsh Nagar', 'url' => '/hair-transplant-in-adarsh-nagar', 'priority' => 'Medium', 'zone' => 'north', 'live' => true,
        'district' => 'North Delhi', 'pins' => ['110033'],
        'metro' => [['Adarsh Nagar', 'Yellow Line'], ['Majlis Park', 'Pink and Magenta Lines'], ['Jahangirpuri', 'Yellow Line']],
        'about' => 'Adarsh Nagar is a residential area of North Delhi between Azadpur and Jahangirpuri.',
        'route' => 'Take the Yellow Line one stop to Azadpur, the Pink Line two stops to Netaji Subhash Place, then the Red Line towards Rithala. The Yellow Line also runs north to Rohini Sector 18, 19, which may suit depending on where you are going.',
    ],
    'azadpur' => [
        'name' => 'Azadpur', 'url' => '/hair-transplant-in-azadpur', 'priority' => 'Medium', 'zone' => 'north', 'live' => true,
        'district' => 'North Delhi', 'pins' => ['110033'],
        'metro' => [['Azadpur', 'Yellow and Pink Lines'], ['Adarsh Nagar', 'Yellow Line'], ['Shalimar Bagh', 'Pink Line']],
        'about' => 'Azadpur is home to Azadpur Mandi, Delhi’s large wholesale fruit and vegetable market, beside Adarsh Nagar and Model Town.',
        'route' => 'Take the Pink Line two stops to Netaji Subhash Place, then the Red Line towards Rithala into Rohini.',
    ],
    'wazirpur' => [
        'name' => 'Wazirpur', 'url' => '/hair-transplant-in-wazirpur', 'priority' => 'Medium', 'zone' => 'north', 'live' => true,
        'district' => null, 'pins' => ['110052'],
        'metro' => [['Netaji Subhash Place', 'Red and Pink Lines'], ['Keshav Puram', 'Red Line']],
        'about' => 'Wazirpur is known for the Wazirpur Industrial Area, between Ashok Vihar and Netaji Subhash Place.',
        'route' => 'Netaji Subhash Place and Keshav Puram are on the Red Line, so the ride into Rohini is direct, towards Rithala.',
    ],
    'keshav-puram' => [
        'name' => 'Keshav Puram', 'url' => '/hair-transplant-in-keshav-puram', 'priority' => 'Medium', 'zone' => 'north', 'live' => true,
        'district' => null, 'pins' => ['110035'],
        'metro' => [['Keshav Puram', 'Red Line']],
        'about' => 'Keshav Puram is a residential area of North-West Delhi along the Red Line, between Netaji Subhash Place and Kanhaiya Nagar.',
        'route' => 'Keshav Puram station is on the Red Line, so the ride into Rohini is direct, towards Rithala.',
    ],
    'mukherjee-nagar' => [
        'name' => 'Mukherjee Nagar', 'url' => '/hair-transplant-in-mukherjee-nagar', 'priority' => 'Medium', 'zone' => 'north', 'live' => true,
        'district' => null, 'pins' => ['110009'],
        'metro' => [['GTB Nagar', 'Yellow Line']],
        'about' => 'Mukherjee Nagar, near Delhi University’s North Campus, is known for its coaching institutes for civil services aspirants and its student housing.',
        'route' => 'From GTB Nagar, take the Yellow Line two stops to Azadpur, the Pink Line to Netaji Subhash Place, then the Red Line towards Rithala.',
    ],
    'civil-lines' => [
        'name' => 'Civil Lines', 'url' => '/hair-transplant-in-civil-lines', 'priority' => 'Medium', 'zone' => 'north', 'live' => true,
        'district' => 'Old Delhi', 'pins' => ['110054'],
        'metro' => [['Civil Lines', 'Yellow Line'], ['Vidhan Sabha', 'Yellow Line'], ['Kashmere Gate', 'Red, Yellow and Violet Lines']],
        'about' => 'Civil Lines, north of Old Delhi, is one of the city’s oldest residential areas and home to the Delhi Legislative Assembly.',
        'route' => 'Take the Yellow Line one stop to Kashmere Gate, then the Red Line towards Rithala into Rohini.',
    ],
    'kamla-nagar' => [
        'name' => 'Kamla Nagar', 'url' => '/hair-transplant-in-kamla-nagar', 'priority' => 'Medium', 'zone' => 'north', 'live' => true,
        'district' => 'Central North Delhi', 'pins' => ['110007'],
        'metro' => [['Vishwavidyalaya', 'Yellow Line'], ['Pul Bangash', 'Red Line'], ['Pratap Nagar', 'Red Line']],
        'about' => 'Kamla Nagar, beside Delhi University’s North Campus, is known for its market and its student crowd.',
        'route' => 'Pul Bangash and Pratap Nagar are on the Red Line, so the ride into Rohini is direct, towards Rithala.',
    ],
    'burari' => [
        'name' => 'Burari', 'url' => '/hair-transplant-in-burari', 'priority' => 'Medium', 'zone' => 'north', 'live' => true,
        'district' => null, 'pins' => ['110084'],
        'metro' => [],
        'about' => 'Burari is a large residential area of North Delhi, close to the Yamuna.',
        'route' => 'Most people come by road, west along the Outer Ring Road towards Rohini. Google Maps or the DMRC journey planner shows the metro options from your part of Burari.',
    ],
    'narela' => [
        'name' => 'Narela', 'url' => '/hair-transplant-in-narela', 'priority' => 'Medium', 'zone' => 'north', 'live' => true,
        'district' => 'Outer North Delhi', 'pins' => ['110040'],
        'metro' => [],
        'about' => 'Narela is a sub-city on Delhi’s northern edge, near the Haryana border.',
        'route' => 'Narela has no metro station of its own yet, so most people come to Rohini by road.',
    ],
    'bawana' => [
        'name' => 'Bawana', 'url' => '/hair-transplant-in-bawana', 'priority' => 'Low', 'zone' => 'north', 'live' => true,
        'district' => 'Outer North Delhi', 'pins' => ['110039'],
        'metro' => [],
        'about' => 'Bawana, in Outer North Delhi, is known for the Bawana Industrial Area.',
        'route' => 'Bawana has no metro station, so most people come to Rohini by road.',
    ],
    'nangloi' => [
        'name' => 'Nangloi', 'url' => '/hair-transplant-in-nangloi', 'priority' => 'Medium', 'zone' => 'west', 'live' => true,
        'district' => 'North West Delhi', 'pins' => ['110041'],
        'metro' => [['Nangloi', 'Green Line'], ['Nangloi Railway Station', 'Green Line'], ['Maharaja Surajmal Stadium', 'Green Line']],
        'about' => 'Nangloi is a busy area of West Delhi on Rohtak Road, with the Green Line running overhead.',
        'route' => 'Take the Green Line to Inderlok, then the Red Line towards Rithala into Rohini. By road, Rohini lies to the north, past Sultanpuri.',
    ],
    'sultanpuri' => [
        'name' => 'Sultanpuri', 'url' => '/hair-transplant-in-sultanpuri', 'priority' => 'Low', 'zone' => 'north', 'live' => true,
        'district' => 'North West Delhi', 'pins' => ['110086'],
        'metro' => [['Nangloi', 'Green Line'], ['Maharaja Surajmal Stadium', 'Green Line']],
        'about' => 'Sultanpuri is a residential area of North-West Delhi between Nangloi and Rohini.',
        'route' => 'Rohini is a short trip by road. By metro, take the Green Line from Nangloi to Inderlok, then the Red Line towards Rithala.',
    ],
    'budh-vihar' => [
        'name' => 'Budh Vihar', 'url' => '/hair-transplant-in-budh-vihar', 'priority' => 'Medium', 'zone' => 'north', 'live' => true,
        'district' => null, 'pins' => ['110086'],
        'metro' => [['Rithala', 'Red Line']],
        'about' => 'Budh Vihar is a residential area of North-West Delhi next to Rohini.',
        'route' => 'Rohini is next door, so most people come by car, cab or auto. Rithala, the Red Line’s terminus in Rohini, is the nearest metro station.',
    ],
    'greater-kailash' => [
        'name' => 'Greater Kailash', 'url' => '/hair-transplant-in-greater-kailash', 'priority' => 'High', 'zone' => 'south', 'live' => true,
        'district' => 'South Delhi', 'pins' => ['110048'],
        'metro' => [['Kailash Colony', 'Violet Line'], ['Nehru Place', 'Violet Line'], ['Greater Kailash', 'Magenta Line']],
        'about' => 'Greater Kailash, in two parts, GK I and GK II, is a South Delhi residential area known for its M Block and N Block markets.',
        'route' => 'Take the Violet Line from Kailash Colony to Kashmere Gate, then the Red Line towards Rithala into Rohini.',
    ],
    'green-park' => [
        'name' => 'Green Park', 'url' => '/hair-transplant-in-green-park', 'priority' => 'High', 'zone' => 'south', 'live' => true,
        'district' => 'South Delhi', 'pins' => ['110016'],
        'metro' => [['Green Park', 'Yellow Line'], ['AIIMS', 'Yellow Line'], ['IIT Delhi', 'Magenta Line']],
        'about' => 'Green Park is a South Delhi residential area on Aurobindo Marg, between AIIMS and Hauz Khas.',
        'route' => 'Take the Yellow Line from Green Park to Kashmere Gate, then the Red Line towards Rithala into Rohini.',
    ],
    'hauz-khas' => [
        'name' => 'Hauz Khas', 'url' => '/hair-transplant-in-hauz-khas', 'priority' => 'High', 'zone' => 'south', 'live' => true,
        'district' => 'South Delhi', 'pins' => ['110016'],
        'metro' => [['Hauz Khas', 'Yellow and Magenta Lines'], ['Green Park', 'Yellow Line'], ['IIT Delhi', 'Magenta Line']],
        'about' => 'Hauz Khas is known for Hauz Khas Village, the medieval reservoir it is named after and the Deer Park beside it.',
        'route' => 'Take the Yellow Line from Hauz Khas to Kashmere Gate, then the Red Line towards Rithala into Rohini.',
    ],
    'saket' => [
        'name' => 'Saket', 'url' => '/hair-transplant-in-saket', 'priority' => 'High', 'zone' => 'south', 'live' => true,
        'district' => 'South Delhi', 'pins' => ['110017'],
        'metro' => [['Saket', 'Yellow Line'], ['Malviya Nagar', 'Yellow Line'], ['Panchsheel Park', 'Magenta Line']],
        'about' => 'Saket is a South Delhi residential area known for the Saket District Centre and its malls.',
        'route' => 'Take the Yellow Line from Saket to Kashmere Gate, then the Red Line towards Rithala. It is a long cross-city ride, so give yourself time.',
    ],
    'malviya-nagar' => [
        'name' => 'Malviya Nagar', 'url' => '/hair-transplant-in-malviya-nagar', 'priority' => 'High', 'zone' => 'south', 'live' => true,
        'district' => 'South Delhi', 'pins' => ['110017'],
        'metro' => [['Malviya Nagar', 'Yellow Line'], ['Hauz Khas', 'Yellow and Magenta Lines'], ['Panchsheel Park', 'Magenta Line']],
        'about' => 'Malviya Nagar is a South Delhi residential area with a busy main market, between Saket and Hauz Khas.',
        'route' => 'Take the Yellow Line from Malviya Nagar to Kashmere Gate, then the Red Line towards Rithala into Rohini.',
    ],
    'vasant-kunj' => [
        'name' => 'Vasant Kunj', 'url' => '/hair-transplant-in-vasant-kunj', 'priority' => 'High', 'zone' => 'south', 'live' => true,
        'district' => 'South Delhi', 'pins' => ['110070'],
        'metro' => [['Chhatarpur', 'Yellow Line']],
        'about' => 'Vasant Kunj is a large planned residential area of South-West Delhi near the airport, with malls along Nelson Mandela Marg.',
        'route' => 'Chhatarpur on the Yellow Line is the nearest station; take the Yellow Line to Kashmere Gate, then the Red Line towards Rithala. It is a long cross-city trip either way.',
    ],
    'vasant-vihar' => [
        'name' => 'Vasant Vihar', 'url' => '/hair-transplant-in-vasant-vihar', 'priority' => 'Medium', 'zone' => 'south', 'live' => true,
        'district' => 'South Delhi', 'pins' => ['110057'],
        'metro' => [['Vasant Vihar', 'Magenta Line'], ['Munirka', 'Magenta Line'], ['Shankar Vihar', 'Magenta Line']],
        'about' => 'Vasant Vihar is a residential area of South Delhi near Munirka and the diplomatic missions around it.',
        'route' => 'Take the Magenta Line to Hauz Khas, the Yellow Line to Kashmere Gate, then the Red Line towards Rithala.',
    ],
    'lajpat-nagar' => [
        'name' => 'Lajpat Nagar', 'url' => '/hair-transplant-in-lajpat-nagar', 'priority' => 'High', 'zone' => 'south', 'live' => true,
        'district' => 'South East Delhi', 'pins' => ['110024'],
        'metro' => [['Lajpat Nagar', 'Violet and Pink Lines'], ['Vinobapuri', 'Pink Line'], ['Moolchand', 'Violet Line']],
        'about' => 'Lajpat Nagar is known for its Central Market, one of South Delhi’s busiest shopping streets.',
        'route' => 'Take the Violet Line from Lajpat Nagar to Kashmere Gate, then the Red Line towards Rithala into Rohini.',
    ],
    'south-extension' => [
        'name' => 'South Extension', 'url' => '/hair-transplant-in-south-extension', 'priority' => 'High', 'zone' => 'south', 'live' => true,
        'district' => 'South East Delhi', 'pins' => ['110049'],
        'metro' => [['South Extension', 'Pink Line'], ['Moolchand', 'Violet Line'], ['AIIMS', 'Yellow Line']],
        'about' => 'South Extension, on Ring Road, is known for its two markets, South Ex Part I and Part II.',
        'route' => 'Take the Pink Line from South Extension to Netaji Subhash Place, then the Red Line towards Rithala into Rohini.',
    ],
    'defence-colony' => [
        'name' => 'Defence Colony', 'url' => '/hair-transplant-in-defence-colony', 'priority' => 'Medium', 'zone' => 'south', 'live' => true,
        'district' => 'South East Delhi', 'pins' => ['110024'],
        'metro' => [['Lajpat Nagar', 'Violet and Pink Lines'], ['Moolchand', 'Violet Line'], ['South Extension', 'Pink Line']],
        'about' => 'Defence Colony is a South Delhi residential area beside Lajpat Nagar, with its own well-known market.',
        'route' => 'Take the Violet Line from Lajpat Nagar or Moolchand to Kashmere Gate, then the Red Line towards Rithala.',
    ],
    'panchsheel-park' => [
        'name' => 'Panchsheel Park', 'url' => '/hair-transplant-in-panchsheel-park', 'priority' => 'Medium', 'zone' => 'south', 'live' => true,
        'district' => 'South Delhi', 'pins' => ['110017'],
        'metro' => [['Panchsheel Park', 'Magenta Line'], ['Hauz Khas', 'Yellow and Magenta Lines'], ['Chirag Delhi', 'Magenta Line']],
        'about' => 'Panchsheel Park is a South Delhi residential colony beside the Outer Ring Road, near Malviya Nagar.',
        'route' => 'Take the Magenta Line one stop to Hauz Khas, the Yellow Line to Kashmere Gate, then the Red Line towards Rithala.',
    ],
    'nehru-place' => [
        'name' => 'Nehru Place', 'url' => '/hair-transplant-in-nehru-place', 'priority' => 'High', 'zone' => 'south', 'live' => true,
        'district' => null, 'pins' => ['110019'],
        'metro' => [['Nehru Place', 'Violet Line'], ['Kalkaji Mandir', 'Violet and Magenta Lines'], ['Nehru Enclave', 'Magenta Line']],
        'about' => 'Nehru Place is a commercial hub of South Delhi, known for its computer and electronics market and office blocks.',
        'route' => 'Take the Violet Line from Nehru Place to Kashmere Gate, then the Red Line towards Rithala into Rohini.',
    ],
    'kalkaji' => [
        'name' => 'Kalkaji', 'url' => '/hair-transplant-in-kalkaji', 'priority' => 'Medium', 'zone' => 'south', 'live' => true,
        'district' => 'South East Delhi', 'pins' => ['110019'],
        'metro' => [['Kalkaji Mandir', 'Violet and Magenta Lines'], ['Govind Puri', 'Violet Line'], ['Nehru Enclave', 'Magenta Line']],
        'about' => 'Kalkaji is a South Delhi residential area named after the Kalkaji Mandir, with the Lotus Temple nearby.',
        'route' => 'Take the Violet Line from Kalkaji Mandir to Kashmere Gate, then the Red Line towards Rithala into Rohini.',
    ],
    'chhatarpur' => [
        'name' => 'Chhatarpur', 'url' => '/hair-transplant-in-chhatarpur', 'priority' => 'Medium', 'zone' => 'south', 'live' => true,
        'district' => 'South Delhi', 'pins' => ['110074'],
        'metro' => [['Chhatarpur', 'Yellow Line'], ['Qutab Minar', 'Yellow Line'], ['Sultanpur', 'Yellow Line']],
        'about' => 'Chhatarpur, in South Delhi, is known for the Chhatarpur temple complex and the farmhouses around it.',
        'route' => 'Take the Yellow Line from Chhatarpur to Kashmere Gate, then the Red Line towards Rithala. It is a long cross-city ride, so give yourself time.',
    ],
    'mehrauli' => [
        'name' => 'Mehrauli', 'url' => '/hair-transplant-in-mehrauli', 'priority' => 'Medium', 'zone' => 'south', 'live' => true,
        'district' => 'South Delhi', 'pins' => ['110030'],
        'metro' => [['Qutab Minar', 'Yellow Line'], ['Chhatarpur', 'Yellow Line'], ['Saket', 'Yellow Line']],
        'about' => 'Mehrauli is one of Delhi’s oldest areas, around the Qutub Minar and the Mehrauli Archaeological Park.',
        'route' => 'Take the Yellow Line from Qutab Minar to Kashmere Gate, then the Red Line towards Rithala into Rohini.',
    ],
    'munirka' => [
        'name' => 'Munirka', 'url' => '/hair-transplant-in-munirka', 'priority' => 'Medium', 'zone' => 'south', 'live' => true,
        'district' => 'South Delhi', 'pins' => ['110067'],
        'metro' => [['Munirka', 'Magenta Line'], ['Vasant Vihar', 'Magenta Line'], ['R. K. Puram', 'Magenta Line']],
        'about' => 'Munirka is an urban village and market area of South Delhi next to JNU, popular with students.',
        'route' => 'Take the Magenta Line to Hauz Khas, the Yellow Line to Kashmere Gate, then the Red Line towards Rithala.',
    ],
    'safdarjung-enclave' => [
        'name' => 'Safdarjung Enclave', 'url' => '/hair-transplant-in-safdarjung-enclave', 'priority' => 'High', 'zone' => 'south', 'live' => true,
        'district' => 'South Delhi', 'pins' => ['110029'],
        'metro' => [['Bhikaji Cama Place', 'Pink Line'], ['Green Park', 'Yellow Line'], ['AIIMS', 'Yellow Line']],
        'about' => 'Safdarjung Enclave is a South Delhi residential area near AIIMS, Safdarjung Hospital and Bhikaji Cama Place.',
        'route' => 'Take the Pink Line from Bhikaji Cama Place to Netaji Subhash Place, then the Red Line towards Rithala into Rohini.',
    ],
    'connaught-place' => [
        'name' => 'Connaught Place', 'url' => '/hair-transplant-in-connaught-place', 'priority' => 'Medium', 'zone' => 'central', 'live' => true,
        'district' => 'New Delhi', 'pins' => ['110001'],
        'metro' => [['Rajiv Chowk', 'Yellow and Blue Lines'], ['Barakhamba Road', 'Blue Line'], ['Janpath', 'Violet Line']],
        'about' => 'Connaught Place, with its circles of colonnaded blocks, is the commercial heart of New Delhi.',
        'route' => 'Take the Yellow Line from Rajiv Chowk four stops to Kashmere Gate, then the Red Line towards Rithala into Rohini.',
    ],
    'karol-bagh' => [
        'name' => 'Karol Bagh', 'url' => '/hair-transplant-in-karol-bagh', 'priority' => 'High', 'zone' => 'central', 'live' => true,
        'district' => 'Central Delhi', 'pins' => ['110005'],
        'metro' => [['Karol Bagh', 'Blue Line'], ['Jhandewalan', 'Blue Line'], ['Rajendra Place', 'Blue Line']],
        'about' => 'Karol Bagh is known for its markets around Ajmal Khan Road and Gaffar Market.',
        'route' => 'Take the Blue Line to Rajiv Chowk, the Yellow Line to Kashmere Gate, then the Red Line towards Rithala.',
    ],
    'patel-nagar' => [
        'name' => 'Patel Nagar', 'url' => '/hair-transplant-in-patel-nagar', 'priority' => 'Medium', 'zone' => 'central', 'live' => true,
        'district' => 'Central Delhi', 'pins' => ['110008'],
        'metro' => [['Patel Nagar', 'Blue Line'], ['Shadipur', 'Blue Line'], ['Kirti Nagar', 'Blue and Green Lines']],
        'about' => 'Patel Nagar is a residential area of Central Delhi along the Blue Line, in East, West and South parts, between Rajendra Place and Shadipur.',
        'route' => 'Take the Blue Line west to Rajouri Garden, the Pink Line to Netaji Subhash Place, then the Red Line towards Rithala.',
    ],
    'rajendra-place' => [
        'name' => 'Rajendra Place', 'url' => '/hair-transplant-in-rajendra-place', 'priority' => 'Medium', 'zone' => 'central', 'live' => true,
        'district' => null, 'pins' => ['110008'],
        'metro' => [['Rajendra Place', 'Blue Line']],
        'about' => 'Rajendra Place is a commercial district of office towers and banks in Central Delhi, beside Rajendra Nagar and Karol Bagh.',
        'route' => 'Take the Blue Line to Rajiv Chowk, the Yellow Line to Kashmere Gate, then the Red Line towards Rithala.',
    ],
    'paharganj' => [
        'name' => 'Paharganj', 'url' => '/hair-transplant-in-paharganj', 'priority' => 'Low', 'zone' => 'central', 'live' => true,
        'district' => 'Central Delhi', 'pins' => ['110055'],
        'metro' => [['Ramakrishna Ashram Marg', 'Blue Line'], ['New Delhi', 'Yellow Line and Airport Express'], ['Rajiv Chowk', 'Yellow and Blue Lines']],
        'about' => 'Paharganj, opposite New Delhi Railway Station, is known for its Main Bazaar and budget hotels.',
        'route' => 'Take the Yellow Line from New Delhi three stops to Kashmere Gate, then the Red Line towards Rithala into Rohini.',
    ],
    'chandni-chowk' => [
        'name' => 'Chandni Chowk', 'url' => '/hair-transplant-in-chandni-chowk', 'priority' => 'Low', 'zone' => 'central', 'live' => true,
        'district' => 'Old Delhi', 'pins' => ['110006'],
        'metro' => [['Chandni Chowk', 'Yellow Line'], ['Lal Qila', 'Violet Line'], ['Jama Masjid', 'Violet Line']],
        'about' => 'Chandni Chowk, in Old Delhi, runs west from the Red Fort and is one of the city’s oldest markets.',
        'route' => 'Take the Yellow Line one stop to Kashmere Gate, then the Red Line towards Rithala into Rohini.',
    ],
    'daryaganj' => [
        'name' => 'Daryaganj', 'url' => '/hair-transplant-in-daryaganj', 'priority' => 'Low', 'zone' => 'central', 'live' => true,
        'district' => null, 'pins' => ['110002'],
        'metro' => [['Delhi Gate', 'Violet Line'], ['Jama Masjid', 'Violet Line']],
        'about' => 'Daryaganj, just south of the Red Fort in Old Delhi, is known for its book trade and publishing houses.',
        'route' => 'Take the Violet Line from Delhi Gate or Jama Masjid to Kashmere Gate, then the Red Line towards Rithala.',
    ],
    'laxmi-nagar' => [
        'name' => 'Laxmi Nagar', 'url' => '/hair-transplant-in-laxmi-nagar', 'priority' => 'High', 'zone' => 'east', 'live' => true,
        'district' => 'East Delhi', 'pins' => ['110092'],
        'metro' => [['Laxmi Nagar', 'Blue Line'], ['Nirman Vihar', 'Blue Line'], ['Yamuna Bank', 'Blue Line']],
        'about' => 'Laxmi Nagar is a busy residential and commercial area of East Delhi along Vikas Marg, known for its coaching institutes.',
        'route' => 'Take the Blue Line to Karkarduma, the Pink Line to Welcome, then the Red Line towards Rithala, which crosses the city to Rohini.',
    ],
    'preet-vihar' => [
        'name' => 'Preet Vihar', 'url' => '/hair-transplant-in-preet-vihar', 'priority' => 'High', 'zone' => 'east', 'live' => true,
        'district' => 'East Delhi', 'pins' => ['110092'],
        'metro' => [['Preet Vihar', 'Blue Line'], ['Nirman Vihar', 'Blue Line'], ['Laxmi Nagar', 'Blue Line']],
        'about' => 'Preet Vihar is a residential area of East Delhi on Vikas Marg, between Laxmi Nagar and Karkardooma.',
        'route' => 'Take the Blue Line one stop to Karkarduma, the Pink Line to Welcome, then the Red Line towards Rithala.',
    ],
    'mayur-vihar' => [
        'name' => 'Mayur Vihar', 'url' => '/hair-transplant-in-mayur-vihar', 'priority' => 'High', 'zone' => 'east', 'live' => true,
        'district' => 'East Delhi', 'pins' => ['110091', '110096'],
        'metro' => [['Mayur Vihar-I', 'Blue and Pink Lines'], ['Shree Ram Mandir Mayur Vihar', 'Pink Line'], ['Akshardham', 'Blue Line']],
        'about' => 'Mayur Vihar is a large residential area of East Delhi in three phases, near the Akshardham temple.',
        'route' => 'From Mayur Vihar-I, take the Pink Line to Welcome, then the Red Line towards Rithala, which crosses the city to Rohini.',
    ],
    'patparganj' => [
        'name' => 'Patparganj', 'url' => '/hair-transplant-in-patparganj', 'priority' => 'Medium', 'zone' => 'east', 'live' => true,
        'district' => 'East Delhi', 'pins' => ['110091'],
        'metro' => [['Mayur Vihar-I', 'Blue and Pink Lines'], ['IP Extension', 'Pink Line'], ['Shree Ram Mandir Mayur Vihar', 'Pink Line']],
        'about' => 'Patparganj in East Delhi is known for its group housing societies and its industrial area, beside Mayur Vihar and I.P. Extension.',
        'route' => 'From Mayur Vihar-I or IP Extension, take the Pink Line to Welcome, then the Red Line towards Rithala.',
    ],
    'ip-extension' => [
        'name' => 'IP Extension', 'url' => '/hair-transplant-in-ip-extension', 'priority' => 'Medium', 'zone' => 'east', 'live' => true,
        'district' => 'East Delhi', 'pins' => ['110092'],
        'metro' => [['IP Extension', 'Pink Line'], ['Vinod Nagar', 'Pink Line'], ['Vinod Nagar East', 'Pink Line']],
        'about' => 'I.P. Extension is an East Delhi area of cooperative group housing societies, next to Patparganj.',
        'route' => 'Take the Pink Line from IP Extension to Welcome, then the Red Line towards Rithala into Rohini.',
    ],
    'anand-vihar' => [
        'name' => 'Anand Vihar', 'url' => '/hair-transplant-in-anand-vihar', 'priority' => 'High', 'zone' => 'east', 'live' => true,
        'district' => 'East Delhi', 'pins' => ['110092'],
        'metro' => [['Anand Vihar', 'Blue and Pink Lines'], ['IP Extension', 'Pink Line'], ['Karkarduma', 'Blue and Pink Lines']],
        'about' => 'Anand Vihar, on Delhi’s eastern edge, is home to the Anand Vihar railway terminal and inter-state bus terminal.',
        'route' => 'Take the Pink Line from Anand Vihar to Welcome, then the Red Line towards Rithala into Rohini.',
    ],
    'karkardooma' => [
        'name' => 'Karkardooma', 'url' => '/hair-transplant-in-karkardooma', 'priority' => 'Medium', 'zone' => 'east', 'live' => true,
        'district' => 'East Delhi', 'pins' => ['110092'],
        'metro' => [['Karkarduma', 'Blue and Pink Lines'], ['Karkarduma Court', 'Pink Line'], ['Krishna Nagar', 'Pink Line']],
        'about' => 'Karkardooma in East Delhi is known for the Karkardooma Courts complex.',
        'route' => 'Take the Pink Line from Karkarduma to Welcome, then the Red Line towards Rithala into Rohini.',
    ],
    'shahdara' => [
        'name' => 'Shahdara', 'url' => '/hair-transplant-in-shahdara', 'priority' => 'Medium', 'zone' => 'east', 'live' => true,
        'district' => 'North East Delhi', 'pins' => ['110032'],
        'metro' => [['Shahdara', 'Red Line'], ['Mansarovar Park', 'Red Line'], ['Welcome', 'Red and Pink Lines']],
        'about' => 'Shahdara is one of the oldest settlements on the east bank of the Yamuna.',
        'route' => 'Shahdara is on the Red Line itself, so the ride is direct, towards Rithala, across the city to Rohini.',
    ],
    'krishna-nagar' => [
        'name' => 'Krishna Nagar', 'url' => '/hair-transplant-in-krishna-nagar', 'priority' => 'Medium', 'zone' => 'east', 'live' => true,
        'district' => null, 'pins' => ['110051'],
        'metro' => [['Krishna Nagar', 'Pink Line']],
        'about' => 'Krishna Nagar is a busy residential and market area of East Delhi, near Gandhi Nagar and Geeta Colony.',
        'route' => 'Take the Pink Line two stops to Welcome, then the Red Line towards Rithala into Rohini.',
    ],
    'dilshad-garden' => [
        'name' => 'Dilshad Garden', 'url' => '/hair-transplant-in-dilshad-garden', 'priority' => 'Medium', 'zone' => 'east', 'live' => true,
        'district' => 'North East Delhi', 'pins' => ['110095'],
        'metro' => [['Dilshad Garden', 'Red Line'], ['Jhilmil', 'Red Line'], ['Mansarovar Park', 'Red Line']],
        'about' => 'Dilshad Garden is a residential area of East Delhi near the Uttar Pradesh border, home to GTB Hospital.',
        'route' => 'Dilshad Garden is on the Red Line itself, so the ride is direct, towards Rithala, across the city to Rohini.',
    ],
    'vivek-vihar' => [
        'name' => 'Vivek Vihar', 'url' => '/hair-transplant-in-vivek-vihar', 'priority' => 'Medium', 'zone' => 'east', 'live' => true,
        'district' => 'North East Delhi', 'pins' => ['110095'],
        'metro' => [['Jhilmil', 'Red Line'], ['Dilshad Garden', 'Red Line'], ['Mansarovar Park', 'Red Line']],
        'about' => 'Vivek Vihar is a residential area of East Delhi between Jhilmil and Dilshad Garden.',
        'route' => 'Jhilmil and Dilshad Garden are on the Red Line, so the ride is direct, towards Rithala, across the city to Rohini.',
    ],
    'yamuna-vihar' => [
        'name' => 'Yamuna Vihar', 'url' => '/hair-transplant-in-yamuna-vihar', 'priority' => 'Medium', 'zone' => 'east', 'live' => true,
        'district' => 'North East Delhi', 'pins' => ['110053'],
        'metro' => [['Yamuna Vihar', 'Pink Line'], ['Bhajanpura', 'Pink Line'], ['Maujpur – Babarpur', 'Pink Line']],
        'about' => 'Yamuna Vihar is a residential area of North-East Delhi, beside Bhajanpura.',
        'route' => 'Take the Pink Line to Welcome, then the Red Line towards Rithala into Rohini.',
    ],
    'bhajanpura' => [
        'name' => 'Bhajanpura', 'url' => '/hair-transplant-in-bhajanpura', 'priority' => 'Low', 'zone' => 'east', 'live' => true,
        'district' => 'North East Delhi', 'pins' => ['110053'],
        'metro' => [['Bhajanpura', 'Pink Line'], ['Khajuri Khas', 'Pink Line'], ['Yamuna Vihar', 'Pink Line']],
        'about' => 'Bhajanpura is an area of North-East Delhi on Wazirabad Road.',
        'route' => 'Take the Pink Line to Welcome, then the Red Line towards Rithala into Rohini.',
    ],
    'gandhi-nagar-delhi' => [
        'name' => 'Gandhi Nagar', 'url' => '/hair-transplant-in-gandhi-nagar-delhi', 'priority' => 'Low', 'zone' => 'east', 'live' => true,
        'district' => 'East Delhi', 'pins' => ['110031'],
        'metro' => [['Seelampur', 'Red Line'], ['Welcome', 'Red and Pink Lines'], ['East Azad Nagar', 'Pink Line']],
        'about' => 'Gandhi Nagar, east of the Yamuna, is known for its large wholesale garment market.',
        'route' => 'Seelampur and Welcome are on the Red Line, so the ride is direct, towards Rithala, across the city to Rohini.',
    ],
];

/** The area whose page is at $path (with or without the slash), or null. */
function delhi_service_area_slug(string $path): ?string
{
    $path = rtrim($path, '/');
    foreach (DELHI_SERVICE_AREAS as $slug => $a) {
        if ($a['url'] === $path) {
            return $slug;
        }
    }
    return null;
}

/** An area's beard transplant page; Rohini's is the clinic's own beard page. */
function delhi_beard_url(string $slug): string
{
    return $slug === 'rohini' ? '/beard-transplant-in-rohini' : '/beard-transplant-in-' . $slug;
}

/** An area's laser hair removal page; Rohini's is the clinic's own laser page. */
function delhi_laser_url(string $slug): string
{
    return $slug === 'rohini' ? '/laser-hair-removal-in-rohini' : '/laser-hair-removal-in-' . $slug;
}

/** Treatment => the anchor's opening words in "Serving Patients Across Delhi". */
const DELHI_AREA_ANCHORS = [
    'hair'  => 'Hair Transplant',
    'beard' => 'Beard Transplant',
    'laser' => 'Laser Hair Removal',
];

/** The anchor's opening words for a treatment: DELHI_AREA_ANCHORS, else its DELHI_TREATMENTS name. */
function delhi_area_anchor(string $treatment): ?string
{
    return DELHI_AREA_ANCHORS[$treatment] ?? DELHI_TREATMENTS[$treatment]['name'] ?? null;
}

/** An area's page for a treatment in DELHI_AREA_ANCHORS or DELHI_TREATMENTS. */
function delhi_area_url(string $treatment, string $slug): string
{
    return match ($treatment) {
        'beard' => delhi_beard_url($slug),
        'laser' => delhi_laser_url($slug),
        default => isset(DELHI_TREATMENTS[$treatment]) ? delhi_treatment_url($treatment, $slug) : DELHI_SERVICE_AREAS[$slug]['url'],
    };
}

/**
 * "Serving Patients Across Delhi": every live area page, linked with its
 * keyword anchor, on the pillar only (client, 27 Oct 2026, after a reference
 * site's "Serving Patients Across India" block). It sits just above the
 * footer, in place of the Rohini treatment links (client: only the hair
 * transplant location pages there). Open by default, so the links are in the
 * page without script; the button folds the list away. $treatment is a key of
 * DELHI_AREA_ANCHORS ('beard' lists the beard transplant pages, for the beard
 * pillar) or of DELHI_TREATMENTS.
 */
function delhi_service_areas_section(string $treatment = 'hair'): string
{
    $treatment = delhi_area_anchor($treatment) !== null ? $treatment : 'hair';
    $anchor    = delhi_area_anchor($treatment);
    ob_start(); ?>
<section class="serving-areas" aria-labelledby="serving-areas-title">
  <div class="wrap">
  <div class="serving-areas__head">
    <h2 class="serving-areas__heading" id="serving-areas-title"><?= icon('pin', 26, 'currentColor', 2) ?> Serving Patients Across Delhi</h2>
    <button type="button" class="serving-areas__toggle" aria-expanded="true" aria-controls="serving-areas" hidden><span>Hide Locations</span> <?= hp_icon('chevron', 18, 2) ?></button>
  </div>
  <ul class="serving-areas__list" id="serving-areas">
    <?php foreach (DELHI_SERVICE_AREAS as $slug => $a): ?>
      <?php if (!$a['live']) { continue; } ?>
    <li><a href="<?= e(delhi_area_url($treatment, $slug)) ?>"><?= icon('pin', 16, 'currentColor', 2) ?><span><?= e($anchor) ?> in <?= e($a['name']) ?></span></a></li>
    <?php endforeach; ?>
  </ul>
  </div>
</section>
<script>
(function () {
  var button = document.querySelector('.serving-areas__toggle');
  var list = document.getElementById('serving-areas');
  if (!button || !list) { return; }
  button.hidden = false;
  button.addEventListener('click', function () {
    var open = button.getAttribute('aria-expanded') === 'true';
    button.setAttribute('aria-expanded', open ? 'false' : 'true');
    button.querySelector('span').textContent = open ? 'Show Locations' : 'Hide Locations';
    list.hidden = open;
  });
}());
</script>
<?php
    return (string) ob_get_clean();
}
