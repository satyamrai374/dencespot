<?php
/**
 * Same-city treatment links, rendered just above the footer.
 *
 * WHY THIS EXISTS. Every city treatment page (…-in-gurgaon, …-in-rohini) is a
 * location page competing for "<treatment> in <city>". Each one should pass
 * equity to, and receive it from, the other pages for the same city and the
 * same kind of treatment, with the target keyword as the anchor. The old
 * clusters.php grid did this for Gurgaon only, and the 22 Oct design restore
 * stopped rendering it, so most location pages were reachable only through the
 * menus.
 *
 * Rules (client, 25 Oct 2026):
 *   • A page links only to its own city's pages. Gurgaon pages never link to
 *     Rohini and Rohini pages never link to Gurgaon (location rule, 14 Oct).
 *   • A page links only to its own treatment family: hair pages to hair pages,
 *     skin pages to skin pages. A page in neither family (the Rohini clinic
 *     page, the noindex FUT page) lists every family for its city.
 *   • The page's own group comes first; the page itself is left out.
 *   • Each group is a closed dropdown until clicked (client, 25 Oct 2026).
 *   • Indexable pages only, so FUT is absent until its noindex is lifted. It
 *     still shows its family's block, through 'unlisted'.
 *   • Anchors follow the strict wording rule, so /best-hair-transplant-clinic-…
 *     is linked as "Choosing a Hair Transplant Clinic in Gurgaon".
 *
 * Adding a location page is one line here.
 */

declare(strict_types=1);

const LOCATION_LINKS = [
    'gurgaon' => [
        'label'    => 'Gurgaon',
        'eyebrow'  => 'DenceSpot Clinic · Sector 39, Gurugram',
        'hub'      => null,
        'unlisted' => ['/fut-hair-transplant-in-gurgaon' => 'hair'],
        'families' => [
            'hair' => [
                'title'  => 'Hair Treatments in Gurgaon',
                'groups' => [
                    'Hair Transplant' => [
                        '/hair-transplant-in-gurgaon'             => 'Hair Transplant in Gurgaon',
                        '/fue-hair-transplant-in-gurgaon'         => 'FUE Hair Transplant in Gurgaon',
                        '/dhi-hair-transplant-in-gurgaon'         => 'DHI Hair Transplant in Gurgaon',
                        '/unshaven-hair-transplant-in-gurgaon'    => 'Unshaven Hair Transplant in Gurgaon',
                        '/hairline-transplant-in-gurgaon'         => 'Hairline Transplant in Gurgaon',
                        '/crown-hair-transplant-in-gurgaon'       => 'Crown Hair Transplant in Gurgaon',
                        '/hair-transplant-for-women-in-gurgaon'   => 'Hair Transplant for Women in Gurgaon',
                        '/hair-transplant-repair-in-gurgaon'      => 'Hair Transplant Repair in Gurgaon',
                        '/hair-transplant-cost-in-gurgaon'        => 'Hair Transplant Cost in Gurgaon',
                        '/hair-transplant-results-gurgaon'        => 'Hair Transplant Results in Gurgaon',
                        '/best-hair-transplant-clinic-in-gurgaon' => 'Choosing a Hair Transplant Clinic in Gurgaon',
                    ],
                    'Beard & Eyebrow Transplant' => [
                        '/beard-transplant-gurgaon'      => 'Beard Transplant in Gurgaon',
                        '/beard-transplant-cost-gurgaon' => 'Beard Transplant Cost in Gurgaon',
                        '/eyebrow-transplant-in-gurgaon' => 'Eyebrow Transplant in Gurgaon',
                    ],
                    'PRP & Non-Surgical Hair Treatment' => [
                        '/hair-prp-treatment-in-gurgaon'      => 'Hair PRP Treatment in Gurgaon',
                        '/prp-hair-treatment-cost-in-gurgaon' => 'PRP Hair Treatment Cost in Gurgaon',
                        '/gfc-treatment-in-gurgaon'           => 'GFC Treatment in Gurgaon',
                        '/hair-mesotherapy-in-gurgaon'        => 'Hair Mesotherapy in Gurgaon',
                        '/hair-microneedling-in-gurgaon'      => 'Hair Microneedling in Gurgaon',
                        '/hair-led-therapy-in-gurgaon'        => 'Hair LED Therapy in Gurgaon',
                    ],
                    'Hair Fall & Scalp' => [
                        '/hair-fall-treatment-in-gurgaon'        => 'Hair Fall Treatment in Gurgaon',
                        '/womens-hair-loss-treatment-in-gurgaon' => "Women's Hair Loss Treatment in Gurgaon",
                        '/alopecia-areata-treatment-in-gurgaon'  => 'Alopecia Areata Treatment in Gurgaon',
                        '/dandruff-treatment-in-gurgaon'         => 'Dandruff Treatment in Gurgaon',
                        '/scalp-micropigmentation-in-gurgaon'    => 'Scalp Micropigmentation in Gurgaon',
                    ],
                ],
            ],
            'skin' => [
                'title'  => 'Skin & Laser Treatments in Gurgaon',
                'groups' => [
                    'Skin & Laser' => [
                        '/skin-treatment-in-gurgaon'     => 'Skin Treatment in Gurgaon',
                        '/laser-hair-removal-in-gurgaon' => 'Laser Hair Removal in Gurgaon',
                        '/face-prp-treatment-in-gurgaon' => 'Face PRP Treatment in Gurgaon',
                    ],
                ],
            ],
        ],
    ],

    'rohini' => [
        'label'    => 'Rohini, Delhi',
        'eyebrow'  => 'DenceSpot Clinic · Rohini, Delhi',
        'hub'      => ['url' => '/delhi-clinic', 'anchor' => 'Hair & Skin Clinic in Rohini, Delhi'],
        // Delhi locality pages (includes/delhi-localities.php) show the hair
        // block but are not listed in it: the parent and their neighbours link
        // to them, so 25 Rohini pages do not each link to every locality.
        // Rohini itself is listed below, as the clinic's own area.
        'unlisted' => [
            '/hair-transplant-delhi/pitampura' => 'hair',
        ],
        'families' => [
            'hair' => [
                'title'  => 'Hair Treatments in Rohini, Delhi',
                'groups' => [
                    'Hair Transplant' => [
                        '/hair-transplant-delhi/'              => 'Hair Transplant in Delhi',
                        '/hair-transplant-delhi/rohini'        => 'Hair Transplant in Rohini',
                        '/fue-hair-transplant-in-rohini'       => 'FUE Hair Transplant in Rohini',
                        '/dhi-hair-transplant-in-rohini'       => 'DHI Hair Transplant in Rohini',
                        '/unshaven-hair-transplant-in-rohini'  => 'Unshaven Hair Transplant in Rohini',
                        '/hairline-transplant-in-rohini'       => 'Hairline Transplant in Rohini',
                        '/crown-hair-transplant-in-rohini'     => 'Crown Hair Transplant in Rohini',
                        '/hair-transplant-for-women-in-rohini' => 'Hair Transplant for Women in Rohini',
                        '/hair-transplant-repair-in-rohini'    => 'Hair Transplant Repair in Rohini',
                        '/hair-transplant-cost-in-rohini'      => 'Hair Transplant Cost in Rohini',
                    ],
                    'Beard & Eyebrow Transplant' => [
                        '/beard-transplant-in-rohini'      => 'Beard Transplant in Rohini, Delhi',
                        '/beard-transplant-cost-in-rohini' => 'Beard Transplant Cost in Rohini',
                        '/eyebrow-transplant-in-rohini'    => 'Eyebrow Transplant in Rohini',
                    ],
                    'PRP & Non-Surgical Hair Treatment' => [
                        '/hair-prp-treatment-in-rohini'      => 'Hair PRP Treatment in Rohini, Delhi',
                        '/prp-hair-treatment-cost-in-rohini' => 'PRP Hair Treatment Cost in Rohini',
                        '/gfc-treatment-in-rohini'           => 'GFC Treatment in Rohini',
                        '/hair-mesotherapy-in-rohini'        => 'Hair Mesotherapy in Rohini',
                        '/hair-microneedling-in-rohini'      => 'Hair Microneedling in Rohini',
                        '/hair-led-therapy-in-rohini'        => 'Hair LED Therapy in Rohini',
                    ],
                    'Hair Fall & Scalp' => [
                        '/hair-fall-treatment-in-rohini'        => 'Hair Fall Treatment in Rohini, Delhi',
                        '/womens-hair-loss-treatment-in-rohini' => "Women's Hair Loss Treatment in Rohini",
                        '/alopecia-areata-treatment-in-rohini'  => 'Alopecia Areata Treatment in Rohini',
                        '/dandruff-treatment-in-rohini'         => 'Dandruff Treatment in Rohini',
                    ],
                ],
            ],
            'skin' => [
                'title'  => 'Skin & Laser Treatments in Rohini, Delhi',
                'groups' => [
                    'Skin & Laser' => [
                        '/skin-treatment-in-rohini'     => 'Skin Treatment in Rohini, Delhi',
                        '/laser-hair-removal-in-rohini' => 'Laser Hair Removal in Rohini',
                        '/face-prp-treatment-in-rohini' => 'Face PRP Treatment in Rohini',
                    ],
                ],
            ],
        ],
    ],
];

/** The [family, group] a URL belongs to in $city, or null. */
function location_links_find(string $city, string $url): ?array
{
    // Every Delhi area page (/hair-transplant-delhi/<slug>) is a hair page.
    if ($city === 'rohini' && str_starts_with($url, '/hair-transplant-delhi/')) {
        return ['hair', ''];
    }
    // $url comes without a trailing slash; a folder page (/hair-transplant-delhi/)
    // is listed with one.
    foreach ([$url, $url . '/'] as $key) {
        if (isset(LOCATION_LINKS[$city]['unlisted'][$key])) {
            return [LOCATION_LINKS[$city]['unlisted'][$key], ''];
        }
        foreach (LOCATION_LINKS[$city]['families'] as $family => $def) {
            foreach ($def['groups'] as $group => $links) {
                if (isset($links[$key])) {
                    return [$family, $group];
                }
            }
        }
    }
    return null;
}

/** The link block for the page being rendered; '' outside the two cities. */
function location_links_section(): string
{
    $city = hp_page_location();
    if (!isset(LOCATION_LINKS[$city])) {
        return '';
    }
    $cfg  = LOCATION_LINKS[$city];
    $here = rtrim((string) ($GLOBALS['page']['url'] ?? ''), '/');
    $own  = location_links_find($city, $here);

    $families = $own === null ? $cfg['families'] : [$own[0] => $cfg['families'][$own[0]]];
    $title    = $own === null ? 'Treatments in ' . $cfg['label'] : $cfg['families'][$own[0]]['title'];

    $groups = [];
    foreach ($families as $def) {
        foreach ($def['groups'] as $group => $links) {
            unset($links[$here], $links[$here . '/']);
            if ($links !== []) {
                $groups[$group] = $links;
            }
        }
    }
    if ($own !== null && isset($groups[$own[1]])) {
        $groups = [$own[1] => $groups[$own[1]]] + $groups;
    }
    if ($groups === []) {
        return '';
    }

    $hub = $cfg['hub'];
    if ($hub !== null && rtrim($hub['url'], '/') === $here) {
        $hub = null;
    }

    ob_start(); ?>
<section class="section section--white loc-links" aria-labelledby="loc-links-title">
  <div class="wrap">
    <p class="eyebrow"><?= e($cfg['eyebrow']) ?></p>
    <h2 class="h3 mt-1" id="loc-links-title"><?= e($title) ?></h2>
    <?php /* Each group is a closed dropdown that opens on click (client,
             25 Oct 2026). Native <details>: no script, keyboard-operable, and
             the links stay in the HTML for crawlers. The shared name lets only
             one group be open at a time where browsers support it. */ ?>
    <div class="loc-links__groups<?= count($groups) === 1 ? ' loc-links__groups--single' : '' ?> mt-4">
      <?php foreach ($groups as $group => $links): ?>
      <details class="loc-links__drop" name="loc-links">
        <summary>
          <span><?= e($group) ?></span>
          <span class="loc-links__count"><?= count($links) ?></span>
          <?= hp_icon('chevron', 18, 2) ?>
        </summary>
        <ul class="loc-links__list">
          <?php foreach ($links as $url => $anchor): ?>
          <li><a href="<?= e($url) ?>"><?= e($anchor) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </details>
      <?php endforeach; ?>
    </div>
    <?php if ($hub !== null): ?>
    <p class="body-s mt-4">Address, timings and every treatment at the clinic: <a href="<?= e($hub['url']) ?>"><?= e($hub['anchor']) ?></a></p>
    <?php endif; ?>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}
