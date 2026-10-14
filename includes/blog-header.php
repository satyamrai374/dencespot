<?php
/**
 * Blog post layout — top half. Mirrors header.php/footer.php.
 *
 * A post file sets $postSlug and $postDescription, optionally $postFaqs, then:
 *
 *   require __DIR__ . '/../includes/blog-header.php';
 *   ... article body ...
 *   require __DIR__ . '/../includes/blog-footer.php';
 *
 * $postFaqs is [['q' => …, 'a' => …], …]. It drives BOTH the FAQPage schema
 * emitted here and the visible accordion the post renders with faq_list(),
 * from the one array — the same rule schema.php enforces everywhere else:
 * markup and visible text can never drift apart.
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/schema.php';
require_once __DIR__ . '/blog.php';

$post = blog_post($postSlug ?? '');

if ($post === null) {
    http_response_code(404);
    exit('Post not found.');
}

$hub      = BLOG_HUBS[$post['hub']] ?? null;
$url      = blog_url($post['slug']);
$doctor   = DOCTORS['dr-nyra'];
// A post the clinic's doctor has not reviewed yet makes no review claim — in
// the byline or in the markup ('reviewed' => false in BLOG_POSTS).
$reviewed = (bool) ($post['reviewed'] ?? true);
// The treatment page a post points to: its own 'related' entry if set (the
// Delhi posts point to Rohini pages), otherwise its hub's page.
$relatedPage = $post['related'] ?? ($hub !== null ? ['label' => $hub['label'] . ' in Gurgaon', 'url' => $hub['url']] : null);

$crumbs = [
    ['name' => 'Home',  'url' => '/'],
    ['name' => 'Blog',  'url' => '/blog/'],
    ['name' => $post['title']],
];

$page = [
    // Short brand suffix: seo_title runs to ~50 characters, and " | DenceSpot
    // Clinic" pushed 13 post titles past the ~60-character SERP truncation point.
    'title'       => ($post['seo_title'] ?? $post['title']) . ' | DenceSpot',
    'description' => $postDescription ?? $post['excerpt'],
    'url'         => $url,
    'og_type'     => 'article',
    'nav_active'  => null,
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_article($url, [
            'headline'      => $post['title'],
            'description'   => $post['excerpt'],
            'datePublished' => $post['published'],
            'dateModified'  => $post['updated'] ?? $post['published'],
            // Attributed to the reviewing doctor: on a YMYL page an
            // unattributed byline is the pattern raters distrust.
            'author'        => $reviewed ? ['@id' => abs_url($doctor['url']) . '#physician'] : ['@id' => SITE_ORIGIN . '/#clinic'],
            // The article is ABOUT hair loss, not about the clinic. Pointing
            // `about` at the business entity told parsers every post was a page
            // about DenceSpot, which is what `publisher` already says.
            'about'         => $post['about'] ?? ['@type' => 'MedicalCondition', 'name' => 'Hair loss'],
        ]),
        /*
         * reviewedBy / lastReviewed are WebPage properties, not Article ones —
         * on the Article they were invalid on all 31 posts. They sit on the
         * page node, whose mainEntity is the article.
         */
        array_filter([
            '@type'        => 'MedicalWebPage',
            '@id'          => abs_url($url) . '#webpage',
            'url'          => abs_url($url),
            'name'         => $post['title'],
            'mainEntity'   => ['@id' => abs_url($url) . '#article'],
            'isPartOf'     => ['@id' => abs_url('/blog/') . '#blog'],
            'reviewedBy'   => $reviewed ? ['@id' => abs_url($doctor['url']) . '#physician'] : null,
            'lastReviewed' => $reviewed ? REVIEWED_DATE_ISO : null,
        ], static fn ($v): bool => $v !== null),
    ],
];

/**
 * FAQPage, from the same array the post renders visibly further down.
 *
 * Google restricted FAQ rich results to government and health-authority sites
 * in 2023, so this earns no SERP snippet for a clinic. It stays because AI
 * Overviews, ChatGPT and Perplexity parse it for answer extraction, and because
 * a question-and-answer block is the most citable shape a passage can take.
 */
if (!empty($postFaqs)) {
    $page['schema'][] = schema_faq($url, $postFaqs);
}

require __DIR__ . '/header.php';
?>

<article class="section section--canvas">
  <div class="wrap" style="max-width:820px">

    <?php if ($hub !== null): ?>
      <a class="pill" href="/blog/?topic=<?= e($post['hub']) ?>" style="text-decoration:none"><?= e($hub['label']) ?></a>
    <?php endif; ?>

    <h1 class="h1 mt-3"><?= e($post['title']) ?></h1>

    <p class="lead mt-3"><?= e($post['excerpt']) ?></p>

    <div class="card mt-5" style="display:flex;gap:16px;align-items:center;flex-wrap:wrap">
      <span class="brand__mark" style="background:var(--accent-tint)"><?= icon('user', 19, 'var(--accent-deep)') ?></span>
      <div style="flex:1 1 220px">
        <p class="body-s" style="font-weight:600;color:var(--ink)">
          <?php if ($reviewed): ?>
          Written and medically reviewed by <a href="<?= e($doctor['url']) ?>"><?= e($doctor['name']) ?>, <?= e($doctor['quals']) ?></a>
          <?php else: ?>
          Written by the <?= e(SITE_NAME) ?> team
          <?php endif; ?>
        </p>
        <p class="meta mt-1">
          Published <time datetime="<?= e($post['published']) ?>"><?= e(blog_date($post['published'])) ?></time>
          <?php if (!empty($post['updated'])): ?>
            · Updated <time datetime="<?= e($post['updated']) ?>"><?= e(blog_date($post['updated'])) ?></time>
          <?php endif; ?>
          · <?= (int) $post['minutes'] ?> min read
        </p>
      </div>
    </div>

    <?php
      // A labelled AI illustration under every post title (blog_post_art()).
      [$artKey, $artAlt] = blog_post_art($post);
    ?>
    <?= lp_figure($artKey, $artAlt, '(min-width: 860px) 780px, 100vw', 'blog-hero mt-5') ?>

    <div class="prose mt-6">
