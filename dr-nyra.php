<?php
/**
 * /dr-nyra — page #11. The site's primary E-E-A-T asset.
 *
 * On a YMYL medical site this page is what "Who created it?" resolves to, so
 * every clinical page links here and carries a "medically reviewed by" line
 * pointing at it.
 *
 * ⚠ Two fields are deliberately unfilled: medical registration number and
 * sameAs profile URLs (config.php → DOCTORS). Both are required before
 * launch — a doctor page with no verifiable registration is exactly the
 * pattern quality raters are told to distrust.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$doc = DOCTORS['dr-nyra'];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'About', 'url' => '/about-us'],
    ['name' => 'Dr. Nyra'],
];

$page = [
    'title'       => 'Dr. Nyra, MBBS, MD (Dermatology) | DenceSpot Clinic',
    'description' => DOCTORS['dr-nyra']['name'] . ', ' . DOCTORS['dr-nyra']['quals'] . ', Chief Consultant at DenceSpot Clinic, Gurugram. She assesses, plans and performs every hair restoration case herself.',
    'url'         => '/dr-nyra',
    'preload_image' => '/assets/img/dr-nayra.webp',
    'nav_active'  => '/about-us',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        [
            '@type'     => 'ProfilePage',
            '@id'       => abs_url('/dr-nyra') . '#page',
            'mainEntity'=> ['@id' => abs_url('/dr-nyra') . '#physician'],
        ],
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="section section--canvas">
  <div class="wrap">
    <div class="split split--wide-right">
      <div class="media ratio-4-5 media--shadow"><img src="/assets/img/dr-nayra.webp" alt="Dr. Nyra, MBBS, MD (Dermatology), hair restoration doctor at DenceSpot Clinic, Sector 39 Gurugram" width="800" height="1000" loading="eager" fetchpriority="high" decoding="async"></div>
      <div>
        <span class="pill pill--dot">Owner &amp; Chief Consultant</span>
        <h1 class="h1 mt-3"><?= doctor_full() ?></h1>
        <p class="lead mt-3 measure">Dr. Nyra founded DenceSpot Clinic in Gurugram after training in India and three years of clinical work in Germany. She assesses, plans and performs every hair restoration case at the clinic personally — the doctor who examines you is the doctor who operates on you.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Ask a Question</a>
        </div>

        <div class="grid grid--2 mt-5" style="max-width:640px">
          <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Qualification</p><p class="h4 mt-1"><?= e($doc['quals']) ?></p><p class="meta mt-1"><?= e($doc['alumni']) ?></p></div>
          <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">International training</p><p class="h4 mt-1">3 years, Germany</p><p class="meta mt-1">Bio Hair Clinic · St. Georg Klinikum Eisenach</p></div>
          <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Specialization</p><p class="h4 mt-1">Dermatology</p><p class="meta mt-1">Consults on and performs every case</p></div>
          <?php if (!empty($doc['reg_number'])): ?>
          <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Medical registration</p><p class="h4 mt-1"><?= e($doc['reg_number']) ?></p><p class="meta mt-1">State Medical Council</p></div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">Background</p>
        <h2 id="training-and-practice" class="h2 mt-2">Training and Practice</h2>
      </div>
      <div class="stack measure">
        <p class="body-l"><?= doctor_name() ?> qualified MBBS from <?= e($doc['alumni']) ?> and went on to take an MD in Dermatology. She then spent three years working clinically in Germany — two at Bio Hair Clinic, where hair restoration surgery was her daily work, and one at St. Georg Klinikum Eisenach.</p>
        <p class="body-l">She returned to India and established DenceSpot in Gurugram, structuring it around a principle that sounds obvious and is surprisingly rare: the doctor who assesses a case designs it and performs it. Patients are not consulted by one person, sold to by another and operated on by a technician they meet on the day.</p>
        <p class="body-l">Her clinical interest is in the part of hair restoration that does not photograph well — donor management, staging over a patient's lifetime, and recognising the cases where surgery is the wrong answer. A hairline that looks excellent at thirty and cannot be maintained at forty-five is a planning failure, not a surgical one.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">How she works</p>
      <h2 id="what-this-means-for-your-case" class="h2 mt-2">What This Means for Your Case</h2>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--pad-lg">
        <?= icon('search', 24, 'var(--accent-deep)') ?>
        <h3 class="h3 mt-3">Diagnosis before treatment</h3>
        <p class="body-s mt-2">Hair loss with a reversible cause — thyroid, iron, a scalp condition, a recent illness — is identified and treated first. A meaningful proportion of patients need no procedure at all.</p>
      </div>
      <div class="card card--pad-lg">
        <?= icon('scale', 24, 'var(--accent-deep)') ?>
        <h3 class="h3 mt-3">Donor supply treated as finite</h3>
        <p class="body-s mt-2">Grafts taken today are not available in fifteen years. Where taking them now would cost you later, you are told before you book rather than afterwards.</p>
      </div>
      <div class="card card--pad-lg">
        <?= icon('doc', 24, 'var(--accent-deep)') ?>
        <h3 class="h3 mt-3">Written plans, no pressure</h3>
        <p class="body-s mt-2">You leave the consultation with a plan and a figure in writing. Nobody asks you to commit on the day, and nothing is added to the price afterwards.</p>
      </div>
      <div class="card card--pad-lg">
        <?= icon('user', 24, 'var(--accent-deep)') ?>
        <h3 class="h3 mt-3">Doctor-performed, throughout</h3>
        <p class="body-s mt-2">Extraction, site creation and placement are performed by the doctor. Ask any clinic this question — the answer varies far more than patients expect.</p>
      </div>
      <div class="card card--pad-lg">
        <?= icon('chart', 24, 'var(--accent-deep)') ?>
        <h3 class="h3 mt-3">Progress measured, not remembered</h3>
        <p class="body-s mt-2">Baseline and interval photographs at fixed angle and lighting. Judging hair growth from memory is how both patients and clinics fool themselves.</p>
      </div>
      <div class="card card--pad-lg">
        <?= icon('info', 24, 'var(--accent-deep)') ?>
        <h3 class="h3 mt-3">Honest about limits</h3>
        <p class="body-s mt-2">No guaranteed densities, no promised timelines, and a clear answer when the honest recommendation is to wait, treat medically, or do nothing yet.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">Clinical review</p>
        <h2 id="content-on-this-site" class="h2 mt-2">Content on This Site</h2>
      </div>
      <div class="stack measure">
        <p class="body">Every treatment page on this site is written as patient education and reviewed by Dr. Nyra before publication. Pages carry the review date so you can see how current they are.</p>
        <p class="body">What you will not find here: guaranteed success rates, procedure counts we cannot evidence, before-and-after photographs that are not our own patients', or reviews we did not receive. Those are all common in this sector and all of them are a reason to be more careful, not less.</p>
        <p class="meta">Last site-wide clinical review: <?= e(REVIEWED_DATE) ?>.</p>
      </div>
    </div>
  </div>
</section>

<?= cta_band(
    'Book a Consultation With Dr. Nyra',
    'An examination, an honest opinion on whether treatment is appropriate for you, and a written plan if it is — with no pressure to book a date on the day.',
    'dr-nyra'
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
