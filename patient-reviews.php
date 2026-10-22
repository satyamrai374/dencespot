<?php
/**
 * /patient-reviews — page #5.
 *
 * ⚠ The strategy lists this page as carrying AggregateRating schema. It does
 * not, yet, and it must not until real reviews are displayed on the page.
 * Google requires marked-up ratings to be visible to the user on the same
 * page; emitting a rating that is not shown is a structured-data violation
 * and risks a manual action on the whole site.
 *
 * To switch it on: populate $reviews with genuine reviews, set $rating and
 * $reviewCount to the real Google figures, and the schema below activates
 * automatically. Do not set them by hand from an old screenshot.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/** Genuine reviews only, quoted as given. Empty until they are collected. */
$reviews = [];

/** Real Google figures only. Leave null and no rating schema is emitted. */
$rating      = null;
$reviewCount = null;

$hasRating = $rating !== null && $reviewCount !== null && $reviews !== [];

$graph = [
    schema_clinic(),
    schema_physician(),
    schema_breadcrumbs([
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Patient reviews'],
    ]),
];

if ($hasRating) {
    $graph[] = [
        '@type'           => 'AggregateRating',
        '@id'             => abs_url('/patient-reviews') . '#rating',
        'itemReviewed'    => ['@id' => SITE_ORIGIN . '/#clinic'],
        'ratingValue'     => $rating,
        'reviewCount'     => $reviewCount,
        'bestRating'      => 5,
        'worstRating'     => 1,
    ];
}

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Patient reviews'],
];

$page = [
    'title'       => 'Patient Reviews | DenceSpot Clinic, Gurugram',
    'description' => 'What patients say about hair transplant and PRP at DenceSpot Clinic, Sector 39 Gurugram — and how we collect reviews: every patient asked, nobody pre-screened.',
    'url'         => '/patient-reviews',
    'crumbs'      => $crumbs,
    'schema'      => $graph,
];

require __DIR__ . '/includes/header.php';
?>

<section class="section section--canvas">
  <div class="wrap">
    <div style="max-width:64ch">
      <span class="pill pill--dot">Patient reviews</span>
      <h1 class="h1 mt-3">What Patients Say About DenceSpot Clinic, Gurgaon</h1>
      <p class="lead mt-3">Reviews left by real patients on public platforms, shown as written. We do not edit them, we do not select which patients get asked, and we do not remove the unflattering ones.</p>
    </div>

    <?php if ($hasRating): ?>
      <div class="card card--pad-lg mt-6" style="display:flex;gap:20px;align-items:center;flex-wrap:wrap">
        <div>
          <p class="h1" style="font-size:48px;line-height:1"><?= e((string) $rating) ?></p>
          <p class="meta">out of 5</p>
        </div>
        <div>
          <p class="h4">Based on <?= (int) $reviewCount ?> Google reviews</p>
          <p class="meta mt-1">Updated from the live Google Business Profile.</p>
        </div>
      </div>

      <div class="grid grid--3 mt-6">
        <?php foreach ($reviews as $r): ?>
          <blockquote class="card">
            <p class="body-s"><?= e($r['text']) ?></p>
            <footer class="meta mt-3">— <?= e($r['name']) ?>, <?= e($r['date']) ?></footer>
          </blockquote>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="card card--dashed card--pad-lg mt-6">
        <?= icon('info', 24, 'var(--ink-muted)') ?>
        <h2 id="no-reviews-are-shown-here-yet" class="h3 mt-3">No reviews are shown here yet</h2>
        <p class="body mt-3 measure">This page is built and deliberately empty. Rather than write testimonials, paste anonymous quotes, or display a star rating we cannot evidence, it stays blank until genuine reviews are collected and can be shown in full with the reviewer's own words.</p>
        <p class="body mt-3 measure">There is a structured-data reason too: a star rating marked up for search results has to be visible on the page it is marked up on. Publishing a rating that is not really there risks a manual penalty across the whole site — and it is exactly the shortcut that makes clinic ratings worthless to patients in the first place.</p>
        <p class="body mt-3 measure">In the meantime, the honest place to look is the public listing, where reviews sit outside our control:</p>
        <div class="btn-row mt-5">
          <a class="btn btn--ink" href="<?= e(MAPS_URL) ?>" rel="noopener"><?= icon('star', 18) ?> Read reviews on Google</a>
          <a class="btn btn--outline" href="/book-consultation">Book a consultation</a>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>

<section class="section section--white">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">How we collect them</p>
        <h2 id="our-review-policy" class="h2 mt-2">Our Review Policy</h2>
        <p class="body mt-3">Worth stating plainly, because the alternative is widespread in this sector and patients have no way of telling from the outside.</p>
      </div>
      <div class="grid grid--2">
        <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-2">Every patient is asked</h3><p class="body-s mt-2">At the ten-day post-procedure follow-up, and only once. Not just the ones who look pleased.</p></div>
        <div class="card"><?= icon('shield', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-2">Nobody is pre-screened</h3><p class="body-s mt-2">We never ask how satisfied you are first and then route only the happy answers to Google. That practice — review gating — is prohibited by Google policy and by consumer-protection regulators, and it makes a rating meaningless.</p></div>
        <div class="card"><?= icon('chat', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-2">Nothing is offered in exchange</h3><p class="body-s mt-2">No discount, no free session, no entry into a draw. An incentivised review is an advertisement.</p></div>
        <div class="card"><?= icon('doc', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-2">We reply to all of them</h3><p class="body-s mt-2">Within two working days, including the critical ones. Replies stay general — we will never confirm or deny that a reviewer is a patient, because that would breach their confidentiality.</p></div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Reading reviews well</p>
      <h2 id="what-actually-tells-you-something" class="h2 mt-2">What Actually Tells You Something</h2>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--pad-lg"><h3 class="h4">Recency beats volume</h3><p class="body-s mt-2">A clinic with 400 reviews, none in the last year, is telling you about a clinic that no longer exists in that form. Staff change, and so does the experience.</p></div>
      <div class="card card--pad-lg"><h3 class="h4">Specific beats glowing</h3><p class="body-s mt-2">"Dr. explained why I wasn't a candidate yet" tells you more than "best clinic ever". Generic five-star reviews arriving in clusters are the classic signature of a purchased batch.</p></div>
      <div class="card card--pad-lg"><h3 class="h4">Read the critical ones first</h3><p class="body-s mt-2">Not for the complaint, but for the reply. How a clinic answers someone unhappy is the most reliable signal on the page.</p></div>
      <div class="card card--pad-lg"><h3 class="h4">Look for the twelve-month reviews</h3><p class="body-s mt-2">A review written the week after surgery describes the reception and the coffee. Hair restoration is judged at ten to twelve months.</p></div>
      <div class="card card--pad-lg"><h3 class="h4">Check more than one platform</h3><p class="body-s mt-2">Google, Practo and Justdial are gamed independently. A picture that only holds up on one of them is not a picture.</p></div>
      <div class="card card--pad-lg"><h3 class="h4">A perfect 5.0 is a warning</h3><p class="body-s mt-2">Any clinic seeing real patient volume has some dissatisfied ones. A flawless record usually means filtering, not perfection.</p></div>
    </div>
  </div>
</section>

<?= cta_band(
    'Judge Us in Person',
    'Book a consultation and see how the clinic handles the questions above. If the honest answer to your case is that treatment can wait, that is the answer you will get.',
    'patient-reviews'
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
