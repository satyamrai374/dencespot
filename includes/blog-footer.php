<?php
/**
 * Blog post layout — bottom half. Closes what blog-header.php opened.
 */

declare(strict_types=1);

$related = blog_posts($post['hub'], $post['slug']);
?>
    </div><!-- /.prose -->

    <div class="note mt-6">
      <p class="body-s"><b>Medical disclaimer.</b> <?= e(MEDICAL_DISCLAIMER) ?></p>
    </div>

    <?php if ($hub !== null): ?>
    <div class="card card--pad-lg mt-4" style="background:var(--card)">
      <p class="eyebrow" style="color:var(--ink-muted)">Related treatment</p>
      <h2 class="h3 mt-2">Considering <?= e(strtolower($hub['label'])) ?> treatment?</h2>
      <p class="body-s mt-2">This article is patient education. What applies to your own case is decided after an examination — the treatment page sets out how that works, what it costs and what to expect.</p>
      <div class="btn-row mt-4">
        <a class="btn btn--ink" href="<?= e($hub['url']) ?>"><?= e($hub['label']) ?> in Gurgaon</a>
        <a class="btn btn--outline" href="/book-consultation">Book a consultation</a>
      </div>
    </div>
    <?php endif; ?>

  </div>
</article>

<?php if ($related !== []): ?>
<section class="section section--white">
  <div class="wrap">
    <h2 class="h2">More on <?= e(strtolower($hub['label'] ?? 'hair restoration')) ?></h2>
    <div class="grid grid--3 mt-5">
      <?php foreach (array_slice($related, 0, 3) as $r): ?>
        <?= blog_card($r) ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?= cta_band(
    'Have a Question About Your Own Hair Loss?',
    'Reading about it only gets you so far. An examination tells you what you actually have, and whether anything needs treating at all.',
    'blog-' . $post['slug']
) ?>

<?php require __DIR__ . '/footer.php'; ?>
