<?php
/**
 * /hair-transplant-results-gurgaon — page #4.
 *
 * Proof is the #1 objection in this vertical, so this page has to exist. It
 * also has to be honest.
 *
 * ⚠ ImageObject is emitted ONLY for images classified CAT_RESULT in
 * includes/gallery-manifest.php, and NO AggregateRating appears anywhere on
 * this page. Marking up results or ratings that are not really there is a
 * structured-data violation and, for a medical advertiser in India, a
 * regulatory one.
 *
 * To publish a case: add the file to the manifest under CAT_RESULT, or add a
 * fully-described entry to NAMED_CASES. Never scan the directory.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';
require_once __DIR__ . '/includes/gallery-manifest.php';

/**
 * Cases come from includes/gallery-manifest.php, never from a directory scan.
 *
 * The manifest exists because this page used to glob() the gallery folder and
 * label whatever it found "Patient Transformation Case #N" — which published
 * NABH certificates and another company's marketing creatives as consented
 * patient results, ImageObject schema and all. Read the header of that file
 * before changing anything here.
 *
 * Each case is ONE composite image containing both panels, with the clinic's
 * own BEFORE / AFTER labels burnt in. 'technique', 'grafts' and 'interval' are
 * nullable: an unknown field is omitted from the card and from the schema
 * caption rather than padded with filler.
 */
$cases = [];

foreach (NAMED_CASES as $c) {
    // Real pixels off disk so width/height never contradict the file.
    $named = @getimagesize(__DIR__ . $c['image']) ?: [1024, 1024];
    $cases[] = [
        'id'        => $c['id'],
        'kind'      => $c['kind'],
        'procedure' => $c['procedure'],
        'title'     => $c['title'],
        'technique' => $c['technique'],
        'grafts'    => $c['grafts'],
        'interval'  => $c['interval'],
        'image'     => $c['image'],
        'alt'       => $c['alt'],
        'w'         => $named[0],
        'h'         => $named[1],
    ];
}

foreach (gallery_images(CAT_RESULT) as $i => $img) {
    $cases[] = [
        'id'        => 'case-' . ($i + 1),
        'kind'      => 'result',
        'procedure' => 'hair-transplant',
        'title'     => 'Hair transplant case ' . ($i + 1),
        'technique' => null,
        'grafts'    => null,
        'interval'  => null,
        'image'     => $img['url'],
        'alt'       => $img['alt'],
        'w'         => $img['w'],
        'h'         => $img['h'],
    ];
}

$filters = [
    'all'               => 'All results',
    'hair-transplant'   => 'Hair transplant',
    'beard-transplant'  => 'Beard transplant',
    'prp'               => 'Hair PRP',
    'womens'            => 'Women’s hair loss',
];

$activeFilter = isset($_GET['type']) && isset($filters[$_GET['type']]) ? (string) $_GET['type'] : 'all';
$visible = $activeFilter === 'all'
    ? $cases
    : array_values(array_filter($cases, static fn (array $c): bool => $c['procedure'] === $activeFilter));

/**
 * Only consented patient photographs earn schema, and only the fields we
 * actually know go into the caption.
 *
 * The procedure-day case is excluded deliberately: it shows grafts on the day
 * they were placed, so marking it up as a result would assert an outcome the
 * photograph does not show.
 */
$published = array_values(array_filter(
    // $visible, not $cases: a ?type= view that displays no cases must not still
    // assert 21 patient photographs in its structured data.
    $visible,
    static fn (array $c): bool => $c['image'] !== null && $c['kind'] === 'result'
));

$imageNodes = array_map(static function (array $c): array {
    $facts = array_filter([$c['grafts'], $c['technique']]);
    $caption = $c['title'] . ' — DenceSpot Clinic, Sector 39 Gurugram';

    if ($facts !== []) {
        $caption .= '. ' . implode(', ', $facts);
        if ($c['interval'] !== null) {
            $caption .= ', photographed at ' . $c['interval'];
        }
        $caption .= '.';
    }

    return [
        '@type'      => 'ImageObject',
        '@id'        => abs_url('/hair-transplant-results-gurgaon') . '#' . $c['id'],
        'contentUrl' => abs_url($c['image']),
        'caption'    => $caption,
        'creator'    => ['@id' => SITE_ORIGIN . '/#clinic'],
        'copyrightNotice' => SITE_NAME,
    ];
}, $published);

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Results'],
];

$page = [
    'title'       => 'Hair Transplant Results in Gurgaon | DenceSpot Clinic',
    'description' => 'Consented before and after photographs from hair transplant patients treated by Dr. Nyra at DenceSpot Clinic, Sector 39 Gurugram. The hair is never digitally altered.',
    'url'         => '/hair-transplant-results-gurgaon',
    'crumbs'      => $crumbs,
    'schema'      => array_merge([
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
    ], $imageNodes),
];

require __DIR__ . '/includes/header.php';
?>

<section class="section section--canvas">
  <div class="wrap">
    <div style="max-width:64ch">
      <span class="pill pill--dot">Results</span>
      <h1 class="h1 mt-3">Hair Transplant Results in Gurgaon</h1>
      <p class="lead mt-3">Before and after photographs from patients treated at this clinic in Sector 39, Gurugram — published with written consent, with the hair never digitally altered. Where the operation note gives us the technique, graft count and interval, they are printed on the case; where it does not, the case is shown without them rather than with a number nobody can stand behind.</p>
      <p class="body mt-3 measure">Results vary between patients. What these show is what happened for these patients, with their donor supply and their pattern of loss. They are not a prediction of what will happen for you.</p>
      <?= medical_review_line() ?>
    </div>

    <nav class="btn-row mt-6" aria-label="Filter results by procedure">
      <?php foreach ($filters as $key => $label): ?>
        <a class="btn btn--sm <?= $activeFilter === $key ? 'btn--ink' : 'btn--outline' ?>"
           href="/hair-transplant-results-gurgaon<?= $key === 'all' ? '' : '?type=' . e($key) ?>"><?= e($label) ?></a>
      <?php endforeach; ?>
    </nav>

    <?php if ($visible === []): ?>
      <div class="card card--dashed card--pad-lg mt-6">
        <?= icon('info', 24, 'var(--ink-muted)') ?>
        <h2 class="h3 mt-3"><?= $activeFilter === 'all' ? 'No cases are published yet' : 'No ' . e(strtolower($filters[$activeFilter])) . ' cases are published yet' ?></h2>
        <p class="body mt-3 measure">This space stays empty until a real, consented case fills it. Nothing here is stock imagery, a licensed photo library, or a result from another clinic.</p>
        <p class="body mt-3 measure">That is not modesty. Publishing borrowed before-and-afters breaches Google's policies on misleading content, breaches medical-advertising rules, and — the part that actually matters — misleads someone making a decision about surgery on their own body. Patients notice, too: the same handful of stock result photos circulate across dozens of clinic websites.</p>
        <p class="body mt-3 measure">Cases appear here as consented patients reach their review points, with the graft count and interval printed on each one so you can judge them properly.</p>
        <div class="btn-row mt-5">
          <a class="btn btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask to see cases like yours</a>
          <a class="btn btn--outline" href="/book-consultation">Book a consultation</a>
        </div>
        <p class="meta mt-4">At a consultation the doctor can show you consented cases relevant to your own pattern and donor supply, which is far more useful than a public gallery in any event.</p>
      </div>
    <?php endif; ?>

    <div class="grid grid--3 mt-6">
      <?php foreach ($visible as $case): ?>
        <article class="card" style="padding:0;overflow:hidden">
          <?php if ($case['image'] !== null): ?>
            <?php /* One composite per case: the clinic's own image already carries both panels
                     and its BEFORE / AFTER labels, so splitting it would cut through them. */ ?>
            <img src="<?= e($case['image']) ?>" alt="<?= e($case['alt']) ?>" width="<?= (int) $case['w'] ?>" height="<?= (int) $case['h'] ?>" loading="lazy" decoding="async">
          <?php else: ?>
            <div class="media ratio-1-1"><div class="slot"><span>BEFORE — <?= e($case['alt']) ?></span></div></div>
          <?php endif; ?>
          <div style="padding:22px">
            <h2 class="h4"><?= e($case['title']) ?></h2>
            <?php
              // Print only what is actually known. A missing interval used to
              // render as "reviewed at Consented Case", which said nothing.
              $facts = array_filter([$case['grafts'], $case['technique']]);
              if ($case['interval'] !== null) {
                  $facts[] = $case['kind'] === 'procedure'
                      ? 'photographed at ' . $case['interval']
                      : 'reviewed at ' . $case['interval'];
              } elseif ($case['kind'] === 'procedure') {
                  $facts[] = 'photographed on the day of surgery, before any growth';
              }
            ?>
            <?php if ($facts !== []): ?>
              <p class="meta mt-2"><?= e(implode(' · ', $facts)) ?></p>
            <?php else: ?>
              <p class="meta mt-2" style="color:var(--placeholder)">Graft count and review interval to be added from the operation note.</p>
            <?php endif; ?>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">How to read any clinic's gallery</p>
      <h2 id="six-checks-before-you-believe-a-result" class="h2 mt-2">Six Checks Before You Believe a Result</h2>
      <p class="body mt-3">Apply these to ours as readily as to anyone else's. Most published result photography fails at least two. The <a href="/gallery">clinic photo gallery</a> carries the same consented cases alongside photographs of the premises, and what happens between surgery and the twelve-month photograph is set out in <a href="/hair-transplant-aftercare">recovery and aftercare</a>.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--tint card--pad-lg"><span class="step-num">1</span><h3 class="h3 mt-3">Same angle and distance</h3><p class="body-s mt-2">A camera moved a few inches closer, or tilted down, changes apparent density dramatically. If the head is at a different angle in the two shots, the pair proves nothing.</p></div>
      <div class="card card--tint card--pad-lg"><span class="step-num">2</span><h3 class="h3 mt-3">Same lighting</h3><p class="body-s mt-2">Harsh overhead light makes a scalp show through; diffuse front light hides it. This is the single easiest way to fake an improvement.</p></div>
      <div class="card card--tint card--pad-lg"><span class="step-num">3</span><h3 class="h3 mt-3">Same hair length and styling</h3><p class="body-s mt-2">Wet, flattened hair in the "before" and dry, styled hair in the "after" is a haircut, not a result.</p></div>
      <div class="card card--tint card--pad-lg"><span class="step-num">4</span><h3 class="h3 mt-3">A stated interval</h3><p class="body-s mt-2">"After" means nothing without a date. Hair restoration is judged at ten to twelve months; an image at four months is mid-growth and not a final result.</p></div>
      <div class="card card--tint card--pad-lg"><span class="step-num">5</span><h3 class="h3 mt-3">A stated graft count</h3><p class="body-s mt-2">Without it you cannot tell whether the coverage was efficient or whether the donor area was emptied to achieve it.</p></div>
      <div class="card card--tint card--pad-lg"><span class="step-num">6</span><h3 class="h3 mt-3">Reverse image search</h3><p class="body-s mt-2">Takes ten seconds and settles the question. A surprising number of clinic galleries return results from other clinics, other countries, or stock libraries.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">How we photograph</p>
        <h2 id="our-documentation-protocol" class="h2 mt-2">Our Documentation Protocol</h2>
        <p class="body mt-3">Progress is measured, not remembered. Every patient is photographed the same way at every visit, which is what makes a change readable at all.</p>
      </div>
      <div class="grid grid--2">
        <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-2">Baseline at consultation</h3><p class="body-s mt-2">Before anything is prescribed or scheduled, so there is a fixed point to compare against.</p></div>
        <div class="card"><?= icon('settings', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-2">Fixed setup</h3><p class="body-s mt-2">Same position, distance, lighting and camera settings at every visit. Standard views: frontal, top-down, both temples, crown, donor.</p></div>
        <div class="card"><?= icon('clock', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-2">Set review points</h3><p class="body-s mt-2">Photographed at each scheduled review through the first twelve months, including the months when nothing appears to be happening.</p></div>
        <div class="card"><?= icon('shield', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-2">Consent, separately</h3><p class="body-s mt-2">Clinical photography is part of your record. Publishing any image requires separate written consent, and that consent can be withdrawn.</p></div>
      </div>
    </div>
  </div>
</section>

<?= cta_band(
    'See Cases Relevant to Your Own Pattern',
    'At a consultation the doctor can show you consented cases with a similar pattern and donor supply to yours — which tells you far more than any public gallery can.',
    'results'
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
