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
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

header('Content-Type: application/xml; charset=utf-8');
// Never cached at the CDN: a stale sitemap hides new pages from search
// engines (see the ExpiresByType note in .htaccess).
header('Cache-Control: public, max-age=0, must-revalidate');

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
/**
 * 'dr-rahul' ships `noindex` until his recognised qualification and
 * registration are confirmed (see the note in config.php). Remove it here when
 * the noindex comes off.
 */
const SITEMAP_EXCLUDE = ['dr-rahul', 'thank-you', 'enquire', 'sitemap', '404', 'router', 'fut-hair-transplant-in-gurgaon', 'new-designe', 'build_sitemap'];

/** Priority and change frequency by page role. Money pages rank highest. */
function sitemap_weight(string $slug): array
{
    if ($slug === '') {
        return ['1.0', 'weekly'];
    }
    $money = [
        'hair-transplant-in-gurgaon', 'beard-transplant-gurgaon',
        'hair-prp-treatment-in-gurgaon', 'hair-fall-treatment-in-gurgaon',
        'hair-transplant-cost-in-gurgaon',
    ];
    if (in_array($slug, $money, true)) {
        return ['0.9', 'weekly'];
    }
    if (str_starts_with($slug, 'blog/')) {
        return ['0.5', 'monthly'];
    }
    if (in_array($slug, ['contact', 'book-consultation', 'about-us', 'gallery', 'dr-nyra', 'dr-rahul', 'delhi-clinic'], true)) {
        return ['0.8', 'weekly'];
    }
    return ['0.7', 'monthly'];
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
        if (in_array($slug, SITEMAP_EXCLUDE, true)) {
            continue;
        }
        $out[$slug] = filemtime($file);
    }

    foreach (glob($root . '/blog/*.php') ?: [] as $file) {
        $name = basename($file, '.php');
        $slug = $name === 'index' ? 'blog/' : 'blog/' . $name;
        $out[$slug] = filemtime($file);
    }

    /**
     * Directory-based sections, which the two globs above cannot see: they only
     * look at the site root and /blog. /patient-stories/ used to be the one such
     * section; it was withdrawn in Oct 2026 (NMC Guidelines, cl. 8.1(v)) and
     * now redirects to /blog/.
     *
     * Add a line here for any future section that lives in its own directory.
     */
    foreach ([] as $dir) {
        $index = $root . '/' . $dir . '/index.php';
        if (file_exists($index)) {
            $out[$dir . '/'] = filemtime($index);
        }
    }

    ksort($out);
    return $out;
}

$pages = sitemap_pages();

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($pages as $slug => $mtime):
    [$priority, $freq] = sitemap_weight((string) $slug);
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
