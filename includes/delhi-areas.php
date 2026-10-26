<?php
/**
 * Data-driven Delhi area pages: every district, area, sector, mini-area and
 * PIN code in Delhi gets /hair-transplant-delhi/<slug>, served by one template
 * (hair-transplant-delhi/area.php) from includes/delhi-areas-data.php.
 *
 * WHY. On 25 Oct 2026 the client asked for a page for every sector, PIN code
 * and mini-area in Delhi (Dwarka Sector 1, Palam Mor, Rampal Chowk…), and
 * chose that over area pages with sub-areas inside after being told Google
 * treats near-identical location pages as doorways and may demote the whole
 * domain. The risk is the client's informed choice; keep each page as factual
 * and distinct as the data allows:
 *   • every fact on a page comes from the data file, which records its source
 *     (OpenStreetMap for places, sectors and metro stations; India Post for
 *     PIN codes and post offices). Nothing is guessed: a missing fact is left
 *     out, never filled in;
 *   • no page says or implies a clinic in the area — DenceSpot's one Delhi
 *     clinic is in Rohini, and every page says so;
 *   • no distances or journey times: the clinic's street address is not on
 *     record.
 *
 * Hand-written pages (rohini.php, pitampura.php) keep their own files and are
 * listed in the data with 'file' => true, so links and the sitemap treat all
 * pages alike. The data file is generated: rebuild it, don't hand-edit it.
 */

declare(strict_types=1);

require_once __DIR__ . '/delhi-localities.php';

/** Every Delhi area page, slug => entry (generated data, cached per request). */
function delhi_areas(): array
{
    static $areas = null;
    return $areas ??= require __DIR__ . '/delhi-areas-data.php';
}

function delhi_area(string $slug): ?array
{
    return delhi_areas()[$slug] ?? null;
}

function delhi_area_url(string $slug): string
{
    return DELHI_HT_HUB . $slug;
}

/** "Dwarka Sector 1", or "PIN 110075" for a PIN page. */
function delhi_area_label(array $a): string
{
    return $a['type'] === 'pin' ? 'PIN ' . $a['name'] : $a['name'];
}

/** Breadcrumb trail from Home down to $slug, following 'parent'. */
function delhi_area_crumbs(string $slug): array
{
    $chain = [];
    for ($s = $slug, $guard = 0; $s !== null && $guard < 6; $guard++) {
        $a = delhi_area($s);
        if ($a === null) {
            break;
        }
        array_unshift($chain, $s);
        $s = $a['parent'] ?? null;
    }
    $crumbs = [['name' => 'Home', 'url' => '/'], ['name' => 'Hair Transplant in Delhi', 'url' => DELHI_HT_HUB]];
    foreach ($chain as $i => $s) {
        $a = delhi_area($s);
        $crumbs[] = $i === count($chain) - 1
            ? ['name' => delhi_area_label($a)]
            : ['name' => delhi_area_label($a), 'url' => delhi_area_url($s)];
    }
    return $crumbs;
}

/**
 * The pages under $slug (a district's areas and PIN codes, a sub-city's
 * sectors, a PIN code's areas), grouped and named plainly: the keyword stays
 * in the heading, not in each of a district's two hundred links.
 */
function delhi_children_section(string $slug, string $eyebrow, string $heading, string $intro = ''): string
{
    $groups = ['PIN codes' => [], 'Areas and sectors' => [], 'Chowks and mors' => []];
    foreach (delhi_area($slug)['children'] ?? [] as $c) {
        if (($ca = delhi_area($c)) === null) {
            continue;
        }
        $g = match ($ca['type']) { 'pin' => 'PIN codes', 'mini' => 'Chowks and mors', default => 'Areas and sectors' };
        $groups[$g][delhi_area_url($c)] = delhi_area_label($ca);
    }
    $groups = array_filter($groups);
    if ($groups === [] && $intro === '') {
        return '';
    }

    ob_start(); ?>
<section class="section ht-sec section--white" id="areas">
  <div class="wrap">
    <p class="eyebrow"><?= e($eyebrow) ?></p>
    <h2 class="h3 mt-1"><?= e($heading) ?></h2>
    <?php if ($intro !== ''): ?><p class="body mt-2"><?= e($intro) ?></p><?php endif; ?>
    <?php foreach ($groups as $gName => $gLinks): ?>
    <h3 class="h4 mt-5"><?= e($gName) ?> <span class="meta" style="font-weight:500">(<?= count($gLinks) ?>)</span></h3>
    <ul class="ht-patterns mt-3">
      <?php foreach ($gLinks as $cUrl => $cLabel): ?>
      <li><a href="<?= e($cUrl) ?>"><?= e($cLabel) ?></a></li>
      <?php endforeach; ?>
    </ul>
    <?php endforeach; ?>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/** Links to the given slugs that exist, as [url => label]. */
function delhi_area_links(array $slugs): array
{
    $out = [];
    foreach ($slugs as $s) {
        if (($a = delhi_area($s)) !== null) {
            $out[delhi_area_url($s)] = delhi_area_label($a);
        }
    }
    return $out;
}
