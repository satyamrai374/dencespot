<?php
/**
 * /sitemap.xml — generated from the pages that actually exist on disk.
 *
 * Built dynamically on purpose. A hand-maintained sitemap drifts the moment
 * someone adds a page, and the old dencespot.com sitemap is exactly what that
 * drift looks like: one flat file of 802 URLs, ~172 of them near-identical
 * locality doorway pages (strategy §5). This lists real, indexable pages only.
 *
 * Serve at /sitemap.xml via the rewrite in .htaccess.
 *
 * Since 28 Oct 2026 (client request) /sitemap.xml is a sitemap index of four
 * child sitemaps, /sitemap-<section>.xml (SITEMAP_SECTIONS), served by this
 * file with ?type=<section>: Delhi, Gurgaon, the blog, and every other page.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/delhi-service-areas.php';
require_once __DIR__ . '/includes/gurgaon-service-areas.php';

header('Content-Type: application/xml; charset=utf-8');

/**
 * Pages excluded from the sitemap.
 * - thank-you  : noindex conversion page
 * - enquire    : POST handler, not a page
 * - book-consultation stays in: it is a real landing page people search for
 */
/**
 * fut-hair-transplant-in-gurgaon is excluded because that page currently ships
 * `'noindex' => true` pending written confirmation that the clinic performs
 * strip surgery. Listing a noindex URL in the sitemap sends Google two
 * contradictory signals. Remove BOTH the noindex flag and this entry together
 * once FUT is confirmed — see BUILD-PROGRESS.md.
 */
/**
 * 'router' is the dispatcher for PHP's built-in dev server, not a page. It is a
 * .php file in the site root, so the glob below picked it up and published
 * https://dencespot.com/router as an indexable URL.
 */
/**
 * 'new-designe' is a noindex build of a homepage design comp. The root glob
 * would otherwise publish it as an indexable URL competing with / for the
 * brand query — and list a noindex page, which is a contradictory signal.
 */
/** The doctor profiles are indexable since 27 Oct 2026 (client request). */
const SITEMAP_EXCLUDE = ['thank-you', 'enquire', 'sitemap', '404', 'router', 'fut-hair-transplant-in-gurgaon', 'new-designe'];

/** Priority and change frequency by page role. Money pages rank highest. */
function sitemap_weight(string $slug): array
{
    if ($slug === '') {
        return ['1.0', 'weekly'];
    }
    $money = [
        'hair-transplant-in-gurgaon', 'hair-transplant-in-delhi', 'beard-transplant-gurgaon', 'beard-transplant-in-delhi',
        'laser-hair-removal-in-delhi',
        'hair-prp-treatment-in-gurgaon', 'hair-fall-treatment-in-gurgaon',
        'hair-transplant-cost-in-gurgaon',
    ];
    if (in_array($slug, $money, true)) {
        return ['0.9', 'weekly'];
    }
    // The other Delhi treatment pillars (includes/delhi-treatments.php).
    if (str_ends_with($slug, '-in-delhi') && !str_contains($slug, '/')) {
        return ['0.8', 'weekly'];
    }
    if (str_starts_with($slug, 'blog/')) {
        return ['0.5', 'monthly'];
    }
    if (in_array($slug, ['contact', 'book-consultation', 'about-us', 'dr-nyra', 'dr-rahul', 'dr-akash'], true)) {
        return ['0.8', 'monthly'];
    }
    return ['0.7', 'monthly'];
}

/**
 * A page file that only 301s elsewhere (an old URL kept as a stub, such as
 * blog/hair-transplant-guarantees-and-success-rates.php). A redirect has no
 * place in a sitemap; its target is listed instead.
 */
function sitemap_is_redirect(string $file): bool
{
    return filesize($file) < 1024 && preg_match("/header\\(\\s*'Location:/", (string) file_get_contents($file)) === 1;
}

/** Every .php page in the site root and /blog, as URL slugs. */
function sitemap_pages(): array
{
    $root = __DIR__;
    $out  = [];

    foreach (glob($root . '/*.php') ?: [] as $file) {
        $slug = basename($file, '.php');
        if ($slug === 'index') {
            $slug = '';
        }
        if (in_array($slug, SITEMAP_EXCLUDE, true) || sitemap_is_redirect($file)) {
            continue;
        }
        $out[$slug] = filemtime($file);
    }

    foreach (glob($root . '/blog/*.php') ?: [] as $file) {
        if (sitemap_is_redirect($file)) {
            continue;
        }
        $name = basename($file, '.php');
        $slug = $name === 'index' ? 'blog/' : 'blog/' . $name;
        $out[$slug] = filemtime($file);
    }

    /**
     * Directory-based sections, which the two globs above cannot see: they only
     * look at the site root and /blog. /patient-stories/ is a real indexable
     * page served from patient-stories/index.php, and without this it would be
     * the one published page missing from the sitemap.
     *
     * Add a line here for any future section that lives in its own directory.
     */
    foreach (['patient-stories'] as $dir) {
        $index = $root . '/' . $dir . '/index.php';
        if (file_exists($index)) {
            $out[$dir . '/'] = filemtime($index);
        }
    }

    /**
     * The Delhi area pages (hair-transplant-in-pitampura.php …) are in the root
     * glob above. Their content lives in includes/delhi-service-areas.php and
     * includes/delhi-area-page.php, so they carry the newest of the three
     * dates; an area switched off ('live' => false) 301s and is left out.
     */
    require_once $root . '/includes/delhi-service-areas.php';
    $areaDate = max(filemtime($root . '/includes/delhi-service-areas.php'), filemtime($root . '/includes/delhi-area-page.php'));
    foreach (DELHI_SERVICE_AREAS as $a) {
        $slug = ltrim($a['url'], '/');
        if (!$a['live']) {
            unset($out[$slug]);
        } elseif (isset($out[$slug])) {
            $out[$slug] = max($out[$slug], $areaDate);
        }
    }

    // The Delhi beard transplant area pages (beard-transplant-in-pitampura.php
    // …), the same way. Rohini's beard page is a page of its own.
    $beardDate = max($areaDate, filemtime($root . '/includes/delhi-beard.php'), filemtime($root . '/includes/delhi-beard-area-page.php'));
    foreach (DELHI_SERVICE_AREAS as $areaSlug => $a) {
        if ($areaSlug === 'rohini') {
            continue;
        }
        $slug = ltrim(delhi_beard_url($areaSlug), '/');
        if (!$a['live']) {
            unset($out[$slug]);
        } elseif (isset($out[$slug])) {
            $out[$slug] = max($out[$slug], $beardDate);
        }
    }

    // The Delhi laser hair removal area pages (laser-hair-removal-in-pitampura.php
    // …), the same way. Rohini's laser page is a page of its own.
    $laserDate = max(filemtime($root . '/includes/delhi-service-areas.php'), filemtime($root . '/includes/delhi-laser.php'), filemtime($root . '/includes/delhi-laser-area-page.php'));
    foreach (DELHI_SERVICE_AREAS as $areaSlug => $a) {
        if ($areaSlug === 'rohini') {
            continue;
        }
        $slug = ltrim(delhi_laser_url($areaSlug), '/');
        if (!$a['live']) {
            unset($out[$slug]);
        } elseif (isset($out[$slug])) {
            $out[$slug] = max($out[$slug], $laserDate);
        }
    }

    // Every other Delhi treatment (includes/delhi-treatments.php): its pillar
    // and area pages carry the newest of its copy file and the shared layouts.
    $layoutDate = max(
        filemtime($root . '/includes/delhi-service-areas.php'),
        filemtime($root . '/includes/delhi-treatment-sections.php'),
        filemtime($root . '/includes/delhi-treatment-pillar.php'),
        filemtime($root . '/includes/delhi-treatment-area-page.php')
    );
    foreach (array_keys(DELHI_TREATMENTS) as $key) {
        $copy = $root . '/includes/delhi-treatments/' . $key . '.php';
        if (!is_file($copy)) {
            continue;
        }
        $date = max($layoutDate, filemtime($copy));
        $hub  = ltrim(delhi_treatment_hub($key), '/');
        if (isset($out[$hub])) {
            $out[$hub] = max($out[$hub], $date);
        }
        foreach (DELHI_SERVICE_AREAS as $areaSlug => $a) {
            if ($areaSlug === 'rohini') {
                continue;
            }
            $slug = ltrim(delhi_treatment_url($key, $areaSlug), '/');
            if (!$a['live']) {
                unset($out[$slug]);
            } elseif (isset($out[$slug])) {
                $out[$slug] = max($out[$slug], $date);
            }
        }
    }

    // The Gurugram area pages (includes/gurgaon-service-areas.php): the newest
    // of the treatment's copy file and the layouts; an area switched off is
    // left out.
    $gurgaonLayout = max(
        filemtime($root . '/includes/gurgaon-service-areas.php'),
        filemtime($root . '/includes/gurgaon-treatment-area-page.php'),
        filemtime($root . '/includes/delhi-treatment-sections.php'),
        filemtime($root . '/includes/delhi-localities.php')
    );
    foreach (array_keys(GURGAON_TREATMENTS) as $key) {
        if (!gurgaon_areas_built($key)) {
            continue;
        }
        $date = max($gurgaonLayout, filemtime($root . '/includes/gurgaon-treatments/' . $key . '.php'));
        foreach (GURGAON_SERVICE_AREAS as $areaSlug => $a) {
            $slug = ltrim(gurgaon_treatment_url($key, $areaSlug), '/');
            if (!$a['live']) {
                unset($out[$slug]);
            } elseif (isset($out[$slug])) {
                $out[$slug] = max($out[$slug], $date);
            }
        }
    }

    ksort($out);
    return $out;
}

/** The child sitemaps of /sitemap.xml, each at /sitemap-<key>.xml. */
const SITEMAP_SECTIONS = [
    'delhi'   => 'Delhi: the Rohini clinic, its treatments and every Delhi area page',
    'gurgaon' => 'Gurgaon: the Gurugram clinic’s treatment pages and every Gurugram area page',
    'blog'    => 'Blog posts',
    'pages'   => 'Everything else: home, clinic, doctors, guides, tools and policies',
];

/**
 * Delhi area pages whose URL names neither Delhi nor Rohini
 * (/fue-hair-transplant-in-pitampura …), as slugs: every area page of every
 * Delhi cluster.
 */
function sitemap_delhi_area_slugs(): array
{
    $out = [];
    foreach (array_keys(DELHI_SERVICE_AREAS) as $area) {
        foreach (['hair', 'beard', 'laser', ...array_keys(DELHI_TREATMENTS)] as $treatment) {
            $out[ltrim(delhi_area_url($treatment, $area), '/')] = true;
        }
    }
    return $out;
}

/** Gurugram area pages (/hair-prp-treatment-in-dlf-phase-1 …), as slugs. */
function sitemap_gurgaon_area_slugs(): array
{
    $out = [];
    foreach (array_keys(GURGAON_TREATMENTS) as $key) {
        foreach (array_keys(GURGAON_SERVICE_AREAS) as $area) {
            $out[ltrim(gurgaon_treatment_url($key, $area), '/')] = true;
        }
    }
    return $out;
}

/** The section of SITEMAP_SECTIONS a slug belongs to. */
function sitemap_section(string $slug, array $delhiAreas, array $gurgaonAreas = []): string
{
    if (str_starts_with($slug, 'blog/')) {
        return 'blog';
    }
    if (preg_match('/gurgaon|gurugram/', $slug) || isset($gurgaonAreas[$slug])) {
        return 'gurgaon';
    }
    if (preg_match('/delhi|rohini/', $slug) || isset($delhiAreas[$slug])) {
        return 'delhi';
    }
    return 'pages';
}

$type       = (string) ($_GET['type'] ?? '');
$delhiAreas   = sitemap_delhi_area_slugs();
$gurgaonAreas = sitemap_gurgaon_area_slugs();
$sections     = array_fill_keys(array_keys(SITEMAP_SECTIONS), []);
foreach (sitemap_pages() as $slug => $mtime) {
    $sections[sitemap_section((string) $slug, $delhiAreas, $gurgaonAreas)][(string) $slug] = $mtime;
}

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";

if (!isset(SITEMAP_SECTIONS[$type])):
?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($sections as $key => $pages): ?>
<?php if ($pages === []) { continue; } ?>
  <!-- <?= e(SITEMAP_SECTIONS[$key]) ?>: <?= count($pages) ?> URLs -->
  <sitemap>
    <loc><?= e(SITE_ORIGIN . '/sitemap-' . $key . '.xml') ?></loc>
    <lastmod><?= gmdate('Y-m-d', max($pages)) ?></lastmod>
  </sitemap>
<?php endforeach; ?>
</sitemapindex>
<?php else: ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($sections[$type] as $slug => $mtime):
    [$priority, $freq] = sitemap_weight($slug);
    $loc = SITE_ORIGIN . '/' . $slug;
    ?>
  <url>
    <loc><?= e($loc) ?></loc>
    <lastmod><?= gmdate('Y-m-d', $mtime) ?></lastmod>
    <changefreq><?= $freq ?></changefreq>
    <priority><?= $priority ?></priority>
  </url>
<?php endforeach; ?>
</urlset>
<?php endif; ?>
