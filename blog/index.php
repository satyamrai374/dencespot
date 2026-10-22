<?php
/**
 * /blog/ — index.
 *
 * Deliberately starting from one post rather than importing the ~370 live
 * articles. Strategy §6: audit before you write. Those posts get bucketed
 * keep / merge / prune against 12 months of GSC data first, and roughly
 * 40–60% are expected to merge or prune. Migrating them wholesale would
 * carry the index bloat straight into the new build.
 */

declare(strict_types=1);

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/schema.php';
require_once __DIR__ . '/../includes/blog.php';

$activeHub = isset($_GET['topic']) && isset(BLOG_HUBS[$_GET['topic']]) ? (string) $_GET['topic'] : null;
$posts     = blog_posts($activeHub);

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Blog'],
];

$page = [
    'title'       => 'Hair Loss Blog | DenceSpot Clinic, Gurugram',
    'description' => 'Patient education on hair loss, transplants, PRP and beard restoration — written and medically reviewed by Dr. Nyra at DenceSpot Clinic, Gurugram.',
    'url'         => '/blog/',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        [
            '@type'       => 'Blog',
            '@id'         => abs_url('/blog/') . '#blog',
            'name'        => 'DenceSpot Clinic — hair loss blog',
            'description' => 'Patient education on hair loss, hair transplant, PRP and beard restoration.',
            'publisher'   => ['@id' => SITE_ORIGIN . '/#clinic'],
            'blogPost'    => array_map(
                static fn (array $p): array => [
                    '@type'         => 'BlogPosting',
                    '@id'           => abs_url(blog_url($p['slug'])) . '#article',
                    'headline'      => $p['title'],
                    'datePublished' => $p['published'],
                    'url'           => abs_url(blog_url($p['slug'])),
                ],
                blog_posts()
            ),
        ],
    ],
];

require __DIR__ . '/../includes/header.php';
?>

<section class="section section--canvas">
  <div class="wrap">
    <div style="max-width:62ch">
      <span class="pill pill--dot">Patient education</span>
      <h1 class="h1 mt-3">Hair Loss, Explained Properly</h1>
      <p class="lead mt-3">Articles on hair loss, transplants, PRP and beard restoration — written for patients, medically reviewed before publication, and honest about what treatment can and cannot do. No miracle cures, no guaranteed results, no borrowed photographs.</p>
    </div>

    <nav class="btn-row mt-6" aria-label="Filter by topic">
      <a class="btn btn--sm <?= $activeHub === null ? 'btn--ink' : 'btn--outline' ?>" href="/blog/">All topics</a>
      <?php foreach (BLOG_HUBS as $key => $hub): ?>
        <a class="btn btn--sm <?= $activeHub === $key ? 'btn--ink' : 'btn--outline' ?>" href="/blog/?topic=<?= e($key) ?>"><?= e($hub['label']) ?></a>
      <?php endforeach; ?>
    </nav>

    <?php if ($posts === []): ?>
      <div class="card card--pad-lg mt-6">
        <h2 class="h3">Nothing here yet under this topic</h2>
        <p class="body-s mt-2">Try <a href="/blog/">all topics</a>, or go straight to the treatment pages — they carry the detail most people are looking for.</p>
      </div>
    <?php else: ?>
      <div class="grid grid--3 mt-6">
        <?php foreach ($posts as $post): ?>
          <?= blog_card($post) ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <div class="card card--dashed mt-6">
      <p class="h4">Why this blog starts small</p>
      <p class="body-s mt-2">There are around 370 articles on the old site. Rather than carry them across untouched, each one is being checked against twelve months of Search Console data and bucketed: keep and refresh, merge into a stronger article, or remove. Roughly half of any large blog estate typically merges or prunes — and a smaller set of genuinely useful articles outperforms a large set of thin ones. New posts appear here as that audit completes.</p>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Start here instead</p>
      <h2 class="h2 mt-2">If You Want the Practical Detail</h2>
      <p class="body mt-3">The treatment pages carry the procedure detail, recovery timelines, risks and costs. The blog is for the background reading around them.</p>
    </div>
    <div class="grid grid--4 mt-6">
      <?php foreach (BLOG_HUBS as $hub): ?>
        <a class="card" href="<?= e($hub['url']) ?>" style="text-decoration:none;color:inherit">
          <?= icon('arrow', 22, 'var(--accent-deep)') ?>
          <h3 class="h4 mt-2"><?= e($hub['label']) ?></h3>
          <p class="meta mt-1">Treatment detail, recovery and cost.</p>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?= cta_band(
    'Reading Only Gets You So Far',
    'An examination tells you what you actually have, whether it is reversible, and whether anything needs treating at all.',
    'blog-index'
) ?>

<?php require __DIR__ . '/../includes/footer.php'; ?>
