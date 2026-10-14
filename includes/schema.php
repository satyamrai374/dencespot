<?php
/**
 * JSON-LD builders.
 *
 * Every page assembles an @graph from these. Two rules that are not
 * negotiable, both from SEO-STRATEGY-dencespot.md §7.5:
 *
 *   1. MedicalClinic, never generic LocalBusiness.
 *   2. Never mark up a rating, review or price that is not visible on the
 *      page. Google treats that as a structured-data violation.
 */

declare(strict_types=1);

/**
 * Enumeration values are written as schema.org URLs (Oct 2026 validation
 * pass): "Monday" and "Dermatology" as bare text are range violations for
 * dayOfWeek (DayOfWeek) and medicalSpecialty (MedicalSpecialty).
 *
 * @param list<string> $days
 * @return list<string>
 */
function schema_days(array $days): array
{
    return array_map(static fn (string $d): string => 'https://schema.org/' . $d, $days);
}

/** A MedicalSpecialty enumeration URL, or null for a value schema.org does not list. */
function schema_specialty(?string $specialty): ?string
{
    $members = ['Dermatology', 'PlasticSurgery', 'Surgery', 'Endocrine', 'PrimaryCare'];
    return ($specialty !== null && in_array($specialty, $members, true)) ? 'https://schema.org/' . $specialty : null;
}

/** The clinic entity. Referenced by @id from every other node. */
function schema_clinic(): array
{
    $node = [
        '@type'     => 'MedicalClinic',
        '@id'       => SITE_ORIGIN . '/#clinic',
        'name'      => SITE_NAME,
        'url'       => SITE_ORIGIN . '/',
        'telephone' => PHONE_SCHEMA,
        'email'     => EMAIL,
        'address'   => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => NAP_STREET,
            'addressLocality' => NAP_LOCALITY,
            'addressRegion'   => NAP_REGION,
            'postalCode'      => NAP_POSTCODE,
            'addressCountry'  => NAP_COUNTRY,
        ],
        'medicalSpecialty' => schema_specialty('Dermatology'),
        'openingHoursSpecification' => [[
            '@type'     => 'OpeningHoursSpecification',
            'dayOfWeek' => schema_days(HOURS_DAYS),
            'opens'     => HOURS_OPEN,
            'closes'    => HOURS_CLOSE,
        ]],
    ];

    // Omit geo entirely rather than ship a guessed coordinate.
    if (GEO_LAT !== null && GEO_LNG !== null) {
        $node['geo'] = [
            '@type'     => 'GeoCoordinates',
            'latitude'  => GEO_LAT,
            'longitude' => GEO_LNG,
        ];
    }

    $node['hasMap'] = MAPS_URL;
    // Only a real photograph of the premises may stand for the clinic — see
    // CLINIC_IMAGE in config.php for why there is none at the moment.
    if (CLINIC_IMAGE !== null) {
        $node['image'] = abs_url(CLINIC_IMAGE);
    }

    // No priceRange: the clinic publishes no charges (quotes are written after
    // assessment), and a fee indication must be factual (NMC Guidelines
    // 06.10.2026, cl. 8.1(x)).

    /**
     * ⚠ NO hasCredential node. The three NABH certificate images could not be
     * evidenced — see the note above awards_certificates_section() in
     * components.php. Schema must never assert what the page cannot show.
     * Add it here only when genuine certificates are published and verifiable
     * in NABH's public directory.
     */

    if (CLINIC_SAME_AS !== []) {
        $node['sameAs'] = CLINIC_SAME_AS;
    }

    foreach (AREA_SERVED as $area) {
        // The National Capital Region is a metropolitan region, not a city.
        $type = str_contains($area, 'Region') ? 'AdministrativeArea' : 'City';
        $node['areaServed'][] = ['@type' => $type, 'name' => $area];
    }

    return $node;
}

/** The Delhi (Rohini) clinic entity. */
function schema_delhi_clinic(): array
{
    return [
        '@type'     => 'MedicalClinic',
        '@id'       => SITE_ORIGIN . '/delhi-clinic#clinic',
        'name'      => LOC_DELHI_NAME,
        'url'       => SITE_ORIGIN . '/delhi-clinic',
        'telephone' => LOC_DELHI_PHONE_E164,
        'email'     => EMAIL,
        'address'   => array_filter([
            '@type'           => 'PostalAddress',
            // LOC_DELHI_ADDRESS still holds a label, not a street address; it
            // is only marked up once config has the real one.
            'streetAddress'   => LOC_DELHI_ADDRESS !== 'Dencespot Clinic, Delhi (Rohini)' ? LOC_DELHI_ADDRESS : null,
            'addressLocality' => 'Rohini, Delhi',
            'addressRegion'   => 'Delhi',
            'postalCode'      => '110085',
            'addressCountry'  => 'IN',
        ], static fn ($v): bool => $v !== null),
        'medicalSpecialty' => schema_specialty('Dermatology'),
        'openingHoursSpecification' => [[
            '@type'     => 'OpeningHoursSpecification',
            'dayOfWeek' => schema_days(HOURS_DAYS),
            'opens'     => HOURS_OPEN,
            'closes'    => HOURS_CLOSE,
        ]],
        'geo' => [
            '@type'     => 'GeoCoordinates',
            'latitude'  => 28.7111119,
            'longitude' => 77.107037,
        ],
        'hasMap'     => LOC_DELHI_MAPS_URL,
        'areaServed' => [
            ['@type' => 'City', 'name' => 'Delhi'],
            ['@type' => 'AdministrativeArea', 'name' => 'North-West Delhi'],
            ['@type' => 'AdministrativeArea', 'name' => 'Rohini'],
            ['@type' => 'AdministrativeArea', 'name' => 'Pitampura'],
            ['@type' => 'AdministrativeArea', 'name' => 'Delhi NCR'],
        ],
    ];
}

/** A treating doctor. */
function schema_physician(string $key = 'dr-nyra'): ?array
{
    $doc = DOCTORS[$key] ?? null;
    if ($doc === null) {
        return null;
    }

    $node = [
        // schema.org's Physician is an Organization type, on which jobTitle,
        // worksFor and alumniOf are invalid; the person is typed as both.
        '@type'    => ['Person', 'IndividualPhysician'],
        '@id'      => abs_url($doc['url']) . '#physician',
        'name'     => $doc['name'],
        'url'      => abs_url($doc['url']),
        'worksFor' => ['@id' => SITE_ORIGIN . '/#clinic'],
    ];

    if (!empty($doc['role'])) {
        $node['jobTitle'] = $doc['role'];
    }
    // No default: a specialty is only marked up when config records one that
    // schema.org lists.
    $specialty = schema_specialty($doc['specialty'] ?? null);
    if ($specialty !== null) {
        $node['medicalSpecialty'] = $specialty;
    }

    // Where the doctor practises, from config 'clinics' ("Gurugram", "Delhi"…).
    // IndividualPhysician is a LocalBusiness, so it also carries that clinic's
    // address.
    $clinics = (string) ($doc['clinics'] ?? '');
    $at = [];
    if (stripos($clinics, 'Gurugram') !== false || stripos($clinics, 'Gurgaon') !== false) {
        $at[] = ['@id' => SITE_ORIGIN . '/#clinic'];
        $node['address'] = [
            '@type'           => 'PostalAddress',
            'streetAddress'   => NAP_STREET,
            'addressLocality' => NAP_LOCALITY,
            'addressRegion'   => NAP_REGION,
            'postalCode'      => NAP_POSTCODE,
            'addressCountry'  => NAP_COUNTRY,
        ];
    }
    if (stripos($clinics, 'Delhi') !== false || stripos($clinics, 'Rohini') !== false) {
        $at[] = ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'];
    }
    if ($at !== []) {
        $node['practicesAt'] = $at;
    }
    // No image: a doctor's photograph used as publicity is barred (NMC Guidelines
    // 06.10.2026, cl. 9.2), and the portrait on file may be AI-edited.

    // Range is EducationalOrganization, not Text — a bare string is a range violation.
    if (!empty($doc['alumni'])) {
        $node['alumniOf'] = ['@type' => 'CollegeOrUniversity', 'name' => $doc['alumni']];
    }

    /**
     * The qualifications are printed on every page of this site under the
     * doctor byline, so they are evidenced on-page and may be marked up.
     * Contrast the accreditation, which is not — see schema_clinic().
     */
    if (!empty($doc['quals'])) {
        $node['hasCredential'] = array_map(
            static fn (string $q): array => [
                '@type'              => 'EducationalOccupationalCredential',
                'credentialCategory' => 'degree',
                'name'               => trim($q),
            ],
            explode(',', $doc['quals'])
        );
    }
    if (!empty($doc['same_as'])) { $node['sameAs']   = $doc['same_as']; }

    // The verifiable credential for an Indian clinician — India has no board
    // certification, so the council registration is what substitutes for it.
    // Omitted entirely while unknown; never published as "to be confirmed".
    if (!empty($doc['reg_number'])) {
        $node['identifier'] = [
            '@type' => 'PropertyValue',
            'name'  => 'Medical Council Registration',
            'value' => $doc['reg_number'],
        ];
    }

    return $node;
}

/**
 * A procedure offered at the clinic.
 *
 * $fields accepts: name, alternateName, procedureType, bodyLocation,
 * howPerformed, preparation, followup, expectedPrognosis.
 */
function schema_procedure(string $pageUrl, array $fields): array
{
    $node = array_merge([
        '@type'    => 'MedicalProcedure',
        '@id'      => abs_url($pageUrl) . '#procedure',
        'location' => ['@id' => SITE_ORIGIN . '/#clinic'],
    ], $fields);

    // "SurgicalProcedure" is a schema.org type (a MedicalProcedure subclass),
    // not a MedicalProcedureType value, so it becomes the node's type.
    if (($node['procedureType'] ?? null) === 'https://schema.org/SurgicalProcedure') {
        $node['@type'] = 'SurgicalProcedure';
        unset($node['procedureType']);
    }

    return schema_fix_prognosis(schema_service_links($node));
}

/**
 * `expectedPrognosis` is a property of MedicalCondition on schema.org, not of
 * MedicalProcedure or MedicalTherapy — six pages were emitting it on the wrong
 * type, which a parser is entitled to ignore. The prose is worth keeping, so it
 * moves to `description`, which every MedicalEntity accepts.
 */
function schema_fix_prognosis(array $node): array
{
    if (!isset($node['expectedPrognosis'])) {
        return $node;
    }

    $prognosis = $node['expectedPrognosis'];
    unset($node['expectedPrognosis']);

    $node['description'] = isset($node['description'])
        ? $node['description'] . ' ' . $prognosis
        : $prognosis;

    return $node;
}

/** Non-surgical therapy — PRP, GFC, mesotherapy, LLLT. */
function schema_therapy(string $pageUrl, array $fields): array
{
    return schema_fix_prognosis(schema_service_links(array_merge([
        '@type'     => 'MedicalTherapy',
        '@id'       => abs_url($pageUrl) . '#therapy',
        'location'  => ['@id' => SITE_ORIGIN . '/#clinic'],
    ], $fields)));
}

/**
 * Breadcrumbs. $trail is [['name' => …, 'url' => …], …]; the final item
 * omits its url because it is the current page.
 */
function schema_breadcrumbs(array $trail): array
{
    $items = [];
    $last  = count($trail) - 1;

    foreach ($trail as $i => $crumb) {
        $item = [
            '@type'    => 'ListItem',
            'position' => $i + 1,
            'name'     => $crumb['name'],
        ];
        /**
         * Every non-final crumb MUST carry an item — Google's BreadcrumbList
         * spec allows omitting it only on the last element. An earlier fix
         * dropped item for fragment URLs like '/#treatments', which traded a
         * bad target for an invalid list. Fragments are resolved to the page
         * they belong to instead, so the crumb is always both valid and real.
         */
        if ($i !== $last) {
            $target = $crumb['url'] ?? '';
            if ($target === '' || str_starts_with($target, '#')) {
                $target = '/';
            } elseif (str_contains($target, '#')) {
                $target = strtok($target, '#') ?: '/';
            }
            $item['item'] = abs_url($target);
        }
        $items[] = $item;
    }

    return ['@type' => 'BreadcrumbList', 'itemListElement' => $items];
}

/**
 * FAQ entities.
 *
 * Note: Google restricted FAQ rich results to government and health-authority
 * sites in 2023, so this earns no SERP snippet for a clinic. It stays because
 * AI Overviews, ChatGPT and Perplexity parse it for answer extraction.
 *
 * $faqs must be the SAME array the page renders, so markup and visible text
 * can never drift apart.
 */
function schema_faq(string $pageUrl, array $faqs): ?array
{
    if ($faqs === []) {
        return null;
    }

    $entities = [];
    foreach ($faqs as $faq) {
        $entities[] = [
            '@type'          => 'Question',
            'name'           => $faq['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                // Answers may carry inline links; schema wants plain text.
                'text'  => trim(strip_tags($faq['a'])),
            ],
        ];
    }

    return [
        '@type'      => 'FAQPage',
        '@id'        => abs_url($pageUrl) . '#faq',
        'mainEntity' => $entities,
    ];
}

/** A blog post. */
function schema_article(string $pageUrl, array $fields): array
{
    return array_merge([
        '@type'            => 'BlogPosting',
        '@id'              => abs_url($pageUrl) . '#article',
        'publisher'        => ['@id' => SITE_ORIGIN . '/#clinic'],
        'mainEntityOfPage' => abs_url($pageUrl),
        'image'            => abs_url(OG_IMAGE),
    ], $fields);
}

/**
 * MedicalWebPage — the page-level "who reviewed this, and when" node.
 *
 * Google documents `reviewedBy` and `lastReviewed` for health content, and for
 * a YMYL clinic they are the structured-data form of the single most important
 * question a rater asks. Emitted only for pages listed in MEDICAL_PAGES below,
 * every one of which renders a visible, dated byline — the same rule as the
 * rating gate: never mark up what the page does not show.
 *
 * @return array<string,mixed>|null
 */
function schema_medical_webpage(string $pageUrl, string $title): ?array
{
    if (!in_array(rtrim($pageUrl, '/'), MEDICAL_PAGES, true)) {
        return null;
    }

    $node = [
        '@type'        => 'MedicalWebPage',
        '@id'          => abs_url($pageUrl) . '#webpage',
        'name'         => $title,
        'url'          => abs_url($pageUrl),
        'about'        => ['@id' => SITE_ORIGIN . '/#clinic'],
    ];
    // Only pages the doctor has signed off since the October rewrite carry the
    // review (REVIEW_SIGNED_OFF in config.php).
    if (in_array(rtrim($pageUrl, '/'), REVIEW_SIGNED_OFF, true)) {
        $node['reviewedBy']   = ['@id' => abs_url(DOCTORS['dr-nyra']['url']) . '#physician'];
        $node['lastReviewed'] = REVIEWED_DATE_ISO;
    }

    /**
     * Cluster relationships, from the same map footer.php renders visibly —
     * every URL here is a link on the page. A cluster page declares its pillar
     * as isPartOf; every cluster member lists the rest as relatedLink.
     */
    if (function_exists('cluster_for')) {
        $related = cluster_related_urls($pageUrl);
        if ($related !== []) {
            $node['relatedLink'] = $related;
        }
        $found = cluster_for($pageUrl);
        if ($found !== null && $found[1] === 'spoke') {
            $node['isPartOf'] = ['@id' => abs_url(CLUSTERS[$found[0]]['pillar']['url']) . '#webpage'];
        }
    }

    return $node;
}

/**
 * Pages that render a visible, dated "medically reviewed by" byline and may
 * therefore carry MedicalWebPage. Legal, utility and conversion pages are
 * excluded: the footer attributes them, but they carry no dated byline.
 */
const MEDICAL_PAGES = [
    '',
    '/about-us',
    // NOT '/dr-nyra': it renders no dated byline, and reviewedBy would name the
    // Physician the page is about — the doctor marked up as the independent
    // reviewer of her own profile. It carries ProfilePage instead.
    '/hair-transplant-in-gurgaon',
    '/fue-hair-transplant-in-gurgaon',
    '/dhi-hair-transplant-in-gurgaon',
    '/fut-hair-transplant-in-gurgaon',
    '/beard-transplant-gurgaon',
    '/hair-prp-treatment-in-gurgaon',
    '/hair-fall-treatment-in-gurgaon',
    '/hair-transplant-cost-in-gurgaon',
    '/cost-and-emi-options',
    '/hair-transplant-aftercare',
    '/faqs',

    /*
     * Sep 2026 — the URL-plan build out. Every page below renders the dated
     * byline through doctor_block(), so by the rule above each one earns a
     * MedicalWebPage node. They shipped without one: the pages were written and
     * this list was not updated, which left 22 pages asserting a review date in
     * visible text that the structured data did not corroborate. On a YMYL
     * medical site that is the wrong half to leave out.
     *
     * Adding a page that calls doctor_block()? Add its URL here in the same
     * commit.
     */
    '/eyebrow-transplant-in-gurgaon',
    '/hairline-transplant-in-gurgaon',
    '/crown-hair-transplant-in-gurgaon',
    '/hair-transplant-for-women-in-gurgaon',
    '/hair-transplant-repair-in-gurgaon',
    '/unshaven-hair-transplant-in-gurgaon',
    '/beard-transplant-cost-gurgaon',
    '/gfc-treatment-in-gurgaon',
    '/hair-mesotherapy-in-gurgaon',
    '/face-prp-treatment-in-gurgaon',
    '/womens-hair-loss-treatment-in-gurgaon',
    '/alopecia-areata-treatment-in-gurgaon',
    '/scalp-micropigmentation-in-gurgaon',
    '/dandruff-treatment-in-gurgaon',
    '/hair-microneedling-in-gurgaon',
    '/hair-led-therapy-in-gurgaon',
    '/prp-hair-treatment-cost-in-gurgaon',
    '/how-to-choose-hair-transplant-clinic',
    '/hair-transplant-graft-calculator',
    '/hair-loss-assessment',
];

/** Site-level entity, homepage only. */
function schema_website(): array
{
    return [
        '@type'     => 'WebSite',
        '@id'       => SITE_ORIGIN . '/#website',
        'name'      => SITE_NAME,
        'url'       => SITE_ORIGIN . '/',
        'publisher' => ['@id' => SITE_ORIGIN . '/#clinic'],
    ];
}

/**
 * MedicalProcedure and MedicalTherapy have no 'location' or 'performer'
 * property (schema.org domains: Event/Action/Organization) — 34 pages emitted
 * both until the October 2026 validation pass. The clinic is linked the valid
 * way round instead: MedicalClinic.availableService → the procedure. Callers
 * still pass 'location' (the clinic's @id); it is parked here and resolved in
 * schema_render(). 'performer' is dropped: who performs a procedure at each
 * clinic is not on record, and the doctor directory carries the doctors.
 */
function schema_service_links(array $node): array
{
    $clinic = $node['location']['@id'] ?? null;
    unset($node['location'], $node['performer']);
    if ($clinic !== null) {
        $node['_availableAt'] = $clinic;
    }
    return array_filter($node, static fn ($v): bool => $v !== null);
}

/** Render an @graph as a JSON-LD script tag. */
function schema_render(array $nodes): string
{
    $nodes = array_values(array_filter($nodes));
    if ($nodes === []) {
        return '';
    }

    // A location page names only its own clinic, in markup as in text (client
    // rule, 14 Oct 2026). The page's location is only known now, at render
    // time, so a doctor node built earlier is trimmed here: on a Rohini page
    // it loses the Gurugram address and practicesAt; on a Gurugram page, the
    // Rohini practicesAt.
    $loc = function_exists('hp_page_location') ? hp_page_location() : 'both';
    if ($loc !== 'both') {
        $drop = $loc === 'rohini' ? SITE_ORIGIN . '/#clinic' : SITE_ORIGIN . '/delhi-clinic#clinic';
        foreach ($nodes as $i => $node) {
            $types = (array) ($node['@type'] ?? []);
            if (!in_array('IndividualPhysician', $types, true)) {
                continue;
            }
            if ($loc === 'rohini' && ($node['address']['addressLocality'] ?? null) === NAP_LOCALITY) {
                unset($nodes[$i]['address']);
            }
            if (isset($node['practicesAt'])) {
                $kept = array_values(array_filter($node['practicesAt'], static fn (array $r): bool => ($r['@id'] ?? '') !== $drop));
                if ($kept === []) {
                    unset($nodes[$i]['practicesAt']);
                } else {
                    $nodes[$i]['practicesAt'] = $kept;
                }
            }
        }
    }

    // Resolve schema_service_links(): add each service to its clinic's
    // availableService, when that clinic node is in this graph.
    foreach ($nodes as $i => $node) {
        if (!isset($node['_availableAt'])) {
            continue;
        }
        $clinicId = $node['_availableAt'];
        unset($nodes[$i]['_availableAt']);
        foreach ($nodes as $j => $other) {
            if (($other['@id'] ?? null) === $clinicId) {
                $nodes[$j]['availableService'][] = ['@id' => $node['@id']];
            }
        }
    }

    $json = json_encode(
        ['@context' => 'https://schema.org', '@graph' => $nodes],
        JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
    );

    return '<script type="application/ld+json">' . "\n" . $json . "\n" . '</script>';
}
