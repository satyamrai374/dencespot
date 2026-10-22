<?php
/**
 * /gallery — Photo & Transformation Gallery Page
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';
require_once __DIR__ . '/includes/gallery-manifest.php';

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Gallery'],
];

/**
 * Photos come from includes/gallery-manifest.php, never from scandir().
 *
 * The previous version read the directory and inferred the category from the
 * filename, defaulting anything it did not recognise to "BEFORE & AFTER
 * RESULT". That default published three certificate images and twelve
 * marketing creatives belonging to an unrelated hair-patch brand as DenceSpot
 * patient results. A filename is not a consent record — see the manifest header.
 */
$photos = [];
$idx = 0;

foreach (gallery_images(CAT_RESULT) as $img) {
    $idx++;
    $photos[] = [
        'id'       => 'photo-' . $idx,
        'url'      => $img['url'],
        'title'    => 'Hair transplant case ' . $idx,
        'category' => 'results',
        'badge'    => 'BEFORE & AFTER',
        'alt'      => $img['alt'],
        'w'        => $img['w'],
        'h'        => $img['h'],
    ];
}

foreach (gallery_images(CAT_CLINIC) as $img) {
    $idx++;
    $photos[] = [
        'id'       => 'photo-' . $idx,
        'url'      => $img['url'],
        'title'    => 'DenceSpot Clinic, Sector 39 Gurugram',
        'category' => 'clinic',
        'badge'    => 'CLINIC & FACILITY',
        'alt'      => $img['alt'],
        'w'        => $img['w'],
        'h'        => $img['h'],
    ];
}

$resultCount = count(gallery_images(CAT_RESULT));
$clinicCount = count(gallery_images(CAT_CLINIC));

$page = [
    'title'       => 'Clinic Photos & Patient Gallery | DenceSpot, Gurgaon',
    'description' => 'Photographs of DenceSpot Clinic in Sector 39 Gurugram — the premises, the equipment, and the full consented patient photo library from Dr. Nyra.',
    'url'         => '/gallery',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        [
            '@type' => 'CollectionPage',
            '@id'   => abs_url('/gallery') . '#page',
            'name'  => 'Photo & Results Gallery',
            'about' => ['@id' => SITE_ORIGIN . '/#clinic'],
        ],
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero" style="padding-bottom:2rem;">
  <div class="wrap">
    <div class="measure" style="text-align: center; margin-inline: auto;">
      <span class="pill pill--dot">Photo library</span>
      <h1 class="h1 mt-3">Inside DenceSpot Clinic, Sector 39 Gurugram</h1>
      <p class="lead mt-3">Before-and-after photographs from patients treated personally by Dr. Nyra at our Sector 39 Gurugram clinic, published with written consent and never digitally altered, alongside photographs of the clinic itself. The <a href="/hair-transplant-results-gurgaon">results page</a> sets the same cases out case by case with the technique and graft count where we have them. Results vary between patients; these show what happened for these patients, not what will happen for you.</p>
      <?= medical_review_line() ?>
    </div>

    <!-- Filter Buttons -->
    <div class="btn-row mt-5" style="justify-content:center; gap:10px;">
      <button type="button" class="btn btn--sm btn--ink gallery-filter-btn active" data-filter="all">All Photos (<?= count($photos) ?>)</button>
      <button type="button" class="btn btn--sm btn--outline gallery-filter-btn" data-filter="results">Patient Results (<?= $resultCount ?>)</button>
      <button type="button" class="btn btn--sm btn--outline gallery-filter-btn" data-filter="clinic">Clinic &amp; Facility (<?= $clinicCount ?>)</button>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="wrap">
    <div class="grid grid--3" id="gallery-grid" style="gap:24px;">
      <?php foreach ($photos as $p): ?>
        <div class="card gallery-item-card" data-category="<?= e($p['category']) ?>" style="display:flex; flex-direction:column; justify-content:space-between; transition:transform 0.3s ease, box-shadow 0.3s ease;">
          <div>
            <div class="media ratio-4-3 media--shadow" style="border:1px solid var(--line); position:relative; overflow:hidden; border-radius:var(--r-md); background:#1e183a; cursor:pointer;" onclick="openCertModal('<?= e($p['url']) ?>', '<?= e($p['title']) ?>')">
              <img src="<?= e($p['url']) ?>" alt="<?= e($p['alt']) ?>" width="<?= (int) $p['w'] ?>" height="<?= (int) $p['h'] ?>" loading="lazy" style="width:100%; height:100%; object-fit:cover; transition:transform 0.3s ease;">
            </div>
            <div style="margin-top:14px;">
              <span class="pill pill--dot" style="font-size:10px"><?= e($p['badge']) ?></span>
              <h3 class="h4 mt-2"><?= e($p['title']) ?></h3>
            </div>
          </div>
          <div style="margin-top:14px; padding-top:10px; border-top:1px solid var(--line); text-align:right;">
            <button type="button" class="btn btn--sm btn--outline" onclick="openCertModal('<?= e($p['url']) ?>', '<?= e($p['title']) ?>')">
              🔍 Click to Enlarge
            </button>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="btn-row mt-7" style="justify-content:center">
      <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
      <a class="btn btn--lg btn--ink" href="/book-consultation"><?= icon('calendar', 18) ?> Book Consultation</a>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
  var btns = document.querySelectorAll('.gallery-filter-btn');
  var items = document.querySelectorAll('.gallery-item-card');

  btns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var filter = btn.getAttribute('data-filter');
      btns.forEach(function (b) {
        b.classList.remove('active', 'btn--ink');
        b.classList.add('btn--outline');
      });
      btn.classList.add('active', 'btn--ink');
      btn.classList.remove('btn--outline');

      items.forEach(function (item) {
        var cat = item.getAttribute('data-category');
        if (filter === 'all' || cat === filter) {
          item.style.display = 'flex';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });
});
</script>

<?php require __DIR__ . '/includes/footer.php'; ?>
