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

$hubCounts = [];
foreach (BLOG_HUBS as $key => $hub) {
    $hubCounts[$key] = count(blog_posts($key));
}
$allCount = count(blog_posts());
?>

<style>
/* Scoped to the blog index: topic filter pills and treatment-page links. */
.blog-topics { display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; }
.blog-topic {
  display: inline-flex; align-items: center; gap: 8px; min-height: 42px; padding: 8px 18px;
  border: 1px solid var(--line); border-radius: 999px; background: #fff;
  color: var(--hp-green-800); font-size: 14px; font-weight: 600; line-height: 1.2; text-decoration: none;
  transition: background-color .2s var(--hp-ease), border-color .2s var(--hp-ease), color .2s var(--hp-ease);
}
.blog-topic:hover { border-color: var(--hp-teal-500); background: var(--hp-teal-50); color: var(--hp-green-800); text-decoration: none; }
.blog-topic__n {
  min-width: 22px; padding: 1px 7px; border-radius: 999px; background: var(--accent-tint);
  color: var(--hp-teal-600); font-size: 12px; font-weight: 700; text-align: center;
}
.blog-topic[aria-current="page"] { background: var(--hp-green-800); border-color: var(--hp-green-800); color: #fff; }
.blog-topic[aria-current="page"] .blog-topic__n { background: rgba(255, 255, 255, .16); color: #fff; }
.blog-hubs { display: grid; gap: 16px; grid-template-columns: 1fr; }
@media (min-width: 640px)  { .blog-hubs { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
@media (min-width: 1080px) { .blog-hubs { grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 20px; } }
.blog-hub {
  display: flex; align-items: center; gap: 16px; text-decoration: none; color: inherit;
  transition: border-color .2s var(--hp-ease), transform .2s var(--hp-ease);
}
.blog-hub:hover { border-color: var(--hp-teal-500); transform: translateY(-2px); text-decoration: none; color: inherit; }
.blog-hub__icon {
  flex: 0 0 auto; width: 48px; height: 48px; border-radius: 50%;
  display: grid; place-items: center; background: var(--accent-tint); color: var(--hp-green-800);
}
</style>

<section class="section section--canvas">
  <div class="wrap">
    <div class="hp-head hp-head--center">
      <p class="eyebrow">Patient education</p>
      <h1 class="h1" style="margin-top:10px">Hair Loss, Explained Properly</h1>
      <p class="lead mt-3">Articles on hair loss, transplants, PRP and beard restoration — written for patients, medically reviewed before publication, and clear about what treatment can and cannot do, including its risks and limits.</p>
    </div>

    <nav class="blog-topics" aria-label="Filter articles by topic">
      <a class="blog-topic" href="/blog/"<?= $activeHub === null ? ' aria-current="page"' : '' ?>>All topics <span class="blog-topic__n"><?= $allCount ?></span></a>
      <?php foreach (BLOG_HUBS as $key => $hub): ?>
        <a class="blog-topic" href="/blog/?topic=<?= e($key) ?>"<?= $activeHub === $key ? ' aria-current="page"' : '' ?>><?= e($hub['label']) ?> <span class="blog-topic__n"><?= $hubCounts[$key] ?></span></a>
      <?php endforeach; ?>
    </nav>

    <?php if ($posts === []): ?>
      <div class="card card--pad-lg mt-6" style="max-width:640px;margin-inline:auto;text-align:center">
        <h2 class="h3">Nothing here yet under this topic</h2>
        <p class="body-s mt-2">Try <a href="/blog/">all topics</a>, or go straight to the treatment pages — they carry the detail most people are looking for.</p>
      </div>
    <?php else: ?>
      <p class="meta mt-4" style="text-align:center">
        <?= count($posts) ?> article<?= count($posts) === 1 ? '' : 's' ?><?= $activeHub !== null ? ' on ' . e(strtolower(BLOG_HUBS[$activeHub]['label'])) : '' ?> · newest first
      </p>
      <div class="grid grid--3 mt-5">
        <?php foreach ($posts as $post): ?>
          <?= blog_card($post) ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <div class="note mt-6" style="max-width:860px;margin-inline:auto">
      <p class="h4">About these articles</p>
      <p class="body-s mt-1">Each article answers one common question in plain language. It is general information, not advice for your own case: that comes from an examination by a doctor at one of our clinics in Gurugram or Delhi.</p>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="wrap">
    <div class="hp-head hp-head--center">
      <p class="eyebrow">Start here instead</p>
      <h2 class="h2" style="margin-top:10px">If You Want the Practical Detail</h2>
      <p class="body mt-3">The treatment pages carry the procedure detail, recovery timelines, risks and costs. The blog is for the background reading around them.</p>
    </div>
    <div class="blog-hubs">
      <?php foreach (BLOG_HUBS as $hub): ?>
        <a class="card blog-hub" href="<?= e($hub['url']) ?>">
          <span class="blog-hub__icon"><?= icon('arrow', 20) ?></span>
          <div>
            <h3 class="h4"><?= e($hub['label']) ?></h3>
            <p class="meta" style="margin-top:4px">Treatment detail, recovery and cost.</p>
          </div>
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
