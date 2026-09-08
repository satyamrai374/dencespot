<?php
/**
 * /face-prp-treatment-in-gurgaon
 *
 * Non-surgical therapy spoke — and the only page on this site that is not about
 * hair. It sits slightly outside the clinic's core positioning, which is worth
 * noting: DenceSpot is a hair restoration clinic run by a dermatologist, so
 * facial PRP is a legitimate dermatological offering rather than a stretch, but
 * the page should not pretend the clinic is an aesthetics centre.
 *
 * Editorial position: facial PRP is reasonable, autologous, and routinely
 * oversold with before/after photography that owes as much to lighting as to
 * platelets. So the page is specific about what it plausibly addresses — skin
 * texture, fine lines, overall quality — and explicit that it does not replace
 * a facelift, does not fill volume, and is not a treatment for active acne.
 *
 * Cannibalisation split: /hair-prp-treatment-in-gurgaon owns scalp PRP. Shared
 * mechanism, entirely different indication, so the overlap is acceptable as
 * long as this page does not re-explain hair loss.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'What is face PRP treatment?',
     'a' => 'A small volume of your own blood is drawn and spun in a centrifuge to concentrate the platelet fraction. That platelet-rich plasma is then injected into the skin of the face, or applied after microneedling, across the areas being treated. It is autologous, meaning it comes from you.'],
    ['q' => 'What does it actually improve?',
     'a' => 'It is used for skin quality — texture, fine lines, dullness and overall firmness — rather than for any single dramatic change. The realistic description is a gradual improvement in how the skin looks and feels, assessed over months. It is not a facelift and it does not restore lost volume.'],
    ['q' => 'What will it not do?',
     'a' => 'It will not lift sagging skin, fill hollows, remove deep folds, or replace surgery. It is not a treatment for active acne, and it does not remove pigmentation on its own. If any of those are what you want addressed, PRP is the wrong treatment and you should be told so rather than sold a course.'],
    ['q' => 'Is it the same as the treatment for hair?',
     'a' => 'The preparation is the same and the principle is the same. The indication, the injection technique and the expected outcome are entirely different. See <a href="/hair-prp-treatment-in-gurgaon">hair PRP treatment</a> if the scalp is what concerns you.'],
    ['q' => 'How many sessions will I need?',
     'a' => 'It is given as a course rather than a single treatment, with sessions spaced some weeks apart, and maintenance considered afterwards. The number depends on your skin and what you are treating, and it is planned at assessment rather than sold as a fixed package beforehand.'],
    ['q' => 'When will I see a difference?',
     'a' => 'Not immediately, and anyone promising an instant result is describing swelling. Changes in texture and quality develop gradually over weeks to months as the course progresses. Standardised photographs at the start are the only reliable way to judge it, because everyday mirror comparisons are dominated by lighting.'],
    ['q' => 'Does it hurt?',
     'a' => 'The injections are uncomfortable rather than painful for most people, and a numbing preparation is generally used. The blood draw is like any blood test.'],
    ['q' => 'What is the downtime?',
     'a' => 'Redness and mild swelling for a day or two is usual, and pinpoint bruising at injection sites is common and settles. Most people plan the treatment a few days ahead of anything socially significant rather than the night before.'],
    ['q' => 'Is it safe?',
     'a' => 'Because the material is your own blood, allergic reaction to it is not a concern, which is the main safety advantage of autologous treatments. The general risks of any injection apply — bruising, swelling, and uncommonly infection. Your medical history and medication are reviewed before treatment.'],
    ['q' => 'Who should not have facial PRP?',
     'a' => 'It is not appropriate where there is active skin infection or inflammation in the treatment area, in certain blood, platelet and clotting disorders, in some cancers, and where medication affecting clotting has not been reviewed. Pregnancy and breastfeeding are assessed individually.'],
    ['q' => 'Can it be combined with microneedling?',
     'a' => 'The two are commonly used together, with PRP applied to skin that has just been microneedled. Whether that combination suits you is decided at assessment. See <a href="/hair-microneedling-in-gurgaon">microneedling</a> for how the technique itself works.'],
    ['q' => 'How long do the results last?',
     'a' => 'Not permanently. Skin continues to age, so any improvement is maintained rather than fixed, and maintenance sessions are usually part of a realistic plan. Anyone describing a permanent result from PRP is overstating it.'],
    ['q' => 'Is it better than fillers or other treatments?',
     'a' => 'It is a different treatment addressing a different problem. Fillers add volume; PRP does not. Comparing them is comparing tools rather than ranking them, and the right question is what you actually want changed. That is settled at assessment.'],
    ['q' => 'How much does face PRP cost in Gurgaon?',
     'a' => 'It is priced per session, with the course planned from your assessment, so it is quoted afterwards and given in writing. See our <a href="/cost-and-emi-options">cost and payment options</a>.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Treatments', 'url' => '/hair-prp-treatment-in-gurgaon'],
    ['name' => 'Face PRP treatment in Gurgaon'],
];

$page = [
    'title'       => 'Face PRP Treatment in Gurgaon | DenceSpot Clinic',
    'description' => 'Facial PRP in Gurgaon by a dermatologist. Autologous platelet-rich plasma for skin texture and quality, with an honest account of what it will not do.',
    'url'         => '/face-prp-treatment-in-gurgaon',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_therapy('/face-prp-treatment-in-gurgaon', [
            'name'          => 'Face PRP Treatment',
            'alternateName' => ['Facial platelet-rich plasma therapy', 'PRP for skin', 'Facial PRP'],
            'bodyLocation'  => 'Face',
            'howPerformed'  => 'A small volume of the patient\'s own blood is drawn and centrifuged to concentrate the platelet fraction. The resulting platelet-rich plasma is injected into the dermis across the treatment areas of the face, or applied topically to skin immediately after microneedling, as a planned course of sessions spaced some weeks apart.',
            'preparation'   => 'Clinical assessment of the skin, review of medical history and medication including anticoagulants and agents affecting platelet function, exclusion of active infection or inflammation in the treatment area, and standardised baseline photography.',
            'followup'      => 'Interval photography against the baseline, review of response over the course of treatment, and maintenance sessions where appropriate.',
            'expectedPrognosis' => 'Changes in skin texture and quality develop gradually over weeks to months rather than immediately. Facial PRP does not lift sagging skin, restore lost volume or replace surgical treatment, and it is not a treatment for active acne. Results are not permanent and require maintenance. Outcomes vary between patients and are not guaranteed.',
        ]),
        schema_faq('/face-prp-treatment-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Face PRP treatment in Gurgaon</span>
        <h1 class="h1 mt-3">Face PRP, With a Clear Account of What It Does Not Do</h1>
        <p class="lead mt-3 measure">Facial PRP uses your own blood to support skin quality — texture, fine lines, the general look of the skin. It is a reasonable treatment and a modest one. It is not a facelift, it does not fill volume, and the transformations in the photographs you have seen usually owe a good deal to the lighting.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-track="book"><?= icon('calendar', 18) ?> Book an Assessment</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Prepared from your own blood',
            'Assessed and performed by a dermatologist',
            'Standardised photographs, not mirror comparisons',
            NAP_LOCALITY . ' · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow"><img src="/assets/img/clinic-equipment.jpg" alt="Centrifuge and preparation equipment used for platelet-rich plasma treatments at DenceSpot Clinic, Gurugram" width="800" height="1000" loading="eager"></div>
        <div class="hero__badge-card">
          <p class="eyebrow">Assessed &amp; performed by</p>
          <p class="h4 mt-2"><?= e(doctor_name()) ?></p>
          <p class="body-s mt-1"><?= e(doctor_credit()) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="trust">
  <div class="wrap">
    <div class="grid grid--5">
      <div class="card"><?= icon('heart', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Autologous</p><p class="body-s mt-2">Your own blood, so no reaction to the material.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Doctor-performed</p><p class="body-s mt-2">Assessed and treated by a dermatologist.</p></div>
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Measured properly</p><p class="body-s mt-2">Standardised images, consistent lighting.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Modest claims</p><p class="body-s mt-2">Skin quality, not a surgical result.</p></div>
      <div class="card"><?= icon('info', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Told when it is wrong</p><p class="body-s mt-2">Volume loss and sagging need something else.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="what-is">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">The basics, plainly</p>
        <h2 class="h2 mt-2">What Facial PRP Involves</h2>
        <p class="body-l mt-3 measure">A small volume of blood is drawn, exactly as it would be for a routine blood test. It is spun in a centrifuge, which separates the components and allows the platelet-rich fraction to be taken off.</p>
        <p class="body-l mt-3 measure">Platelets carry growth factors involved in tissue repair. Concentrating them and delivering them into the skin is the whole idea behind the treatment. The plasma is either injected into the dermis across the areas being treated, or applied to skin immediately after microneedling so that it reaches the tissue through the channels created.</p>
        <p class="body-l mt-3 measure">Because the material is yours, there is no question of an allergic reaction to it. That is the principal safety advantage of autologous treatments and it is a genuine one.</p>
        <p class="body-l mt-3 measure">It is given as a course, not a single session, with sessions spaced some weeks apart. Any benefit builds gradually rather than appearing after the first appointment.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow">Set expectations here</p>
        <h3 class="h3 mt-2">A modest treatment, honestly described</h3>
        <p class="body mt-3">What it plausibly addresses: skin texture, fine lines, dullness, and the general quality and firmness of the skin.</p>
        <p class="body mt-3">What it does not address: sagging, lost volume, deep folds, active acne, or anything that needs a surgical or volumising solution.</p>
        <p class="body mt-3">If what bothers you is in the second list, this is the wrong treatment, and that is what you will be told at assessment.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="expectations">
  <div class="wrap">
    <p class="eyebrow">Expectations</p>
    <h2 class="h2 mt-2">Reading Before-and-After Photographs Sceptically</h2>
    <p class="body-l mt-3 measure">Facial treatments are sold on images, and images of skin are unusually easy to influence without touching the skin at all.</p>
    <div class="grid grid--3 mt-5">
      <div class="card"><p class="h4">Lighting does most of the work</p><p class="body-s mt-2">Softer, more frontal light on the second photograph flattens texture and shadow. The same face can look substantially different with no treatment whatsoever.</p></div>
      <div class="card"><p class="h4">Makeup and preparation</p><p class="body-s mt-2">A bare, tired "before" against a groomed, made-up "after" is comparing two situations, not two states of skin.</p></div>
      <div class="card"><p class="h4">Angle and expression</p><p class="body-s mt-2">Small changes in head position and expression alter how folds and fine lines read. Standardised photography exists precisely to remove these variables.</p></div>
    </div>
    <div class="card card--pad-lg mt-6">
      <p class="eyebrow">How we handle it</p>
      <h3 class="h3 mt-2">Baseline photographs, taken the same way each time</h3>
      <p class="body mt-3 measure">Standardised images at the start, and interval images taken in the same position under the same lighting. It is the only honest way to know whether a slow treatment is doing anything, and it protects you from paying for a course that is not working.</p>
      <p class="body mt-3 measure">It also protects against the opposite error — dismissing a real but gradual improvement because day-to-day mirror comparisons are dominated by sleep, hydration and the bathroom light.</p>
    </div>
  </div>
</section>

<section class="section section--canvas" id="candidacy">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Suitability</p>
        <h2 class="h2 mt-2">Who It Suits</h2>
        <p class="body-l mt-3 measure">It suits people who want an improvement in skin quality, are comfortable with a gradual result, and prefer an autologous treatment. It sits well alongside a sensible skincare routine and sun protection, which do more for skin over a lifetime than any course of injections.</p>
        <p class="body-l mt-3 measure">It does not suit people looking for a lift, for volume, or for a single dramatic change. Nor does it suit anyone with active infection or inflammation in the area, and it is assessed carefully where there are blood, platelet or clotting conditions, or medication affecting clotting.</p>
        <p class="body-l mt-3 measure">If your main concern is active acne, PRP is not the treatment for it, and the right step is having the acne itself assessed and treated.</p>
      </div>
      <div>
        <div class="card card--pad-lg">
          <p class="h4">Reasonable to consider</p>
          <?= ticks([
              'Skin texture and fine lines',
              'Dull or tired-looking skin',
              'A preference for autologous treatment',
              'Comfortable with a gradual, modest change',
          ], false) ?>
        </div>
        <div class="card card--pad-lg mt-4">
          <p class="h4">Not appropriate</p>
          <?= ticks([
              'Sagging skin or lost facial volume',
              'Active skin infection or inflammation',
              'Active acne as the primary concern',
              'Certain blood, platelet and clotting disorders',
          ], false) ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--ink" id="journey">
  <div class="wrap">
    <p class="eyebrow" style="color:var(--accent)">The process</p>
    <h2 class="h2 mt-2" style="color:#fff">How a Course Runs</h2>
    <div class="grid grid--4 mt-6">
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 01</p><p class="h4 mt-2" style="color:#fff">Assessment</p><p class="body-s mt-2">Your skin examined, your concerns established, medical history and medication reviewed, and an honest answer on whether PRP addresses what is bothering you.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 02</p><p class="h4 mt-2" style="color:#fff">Baseline photographs</p><p class="body-s mt-2">Standardised images before anything begins, so the result can be judged against something other than memory.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 03</p><p class="h4 mt-2" style="color:#fff">Sessions</p><p class="body-s mt-2">Blood drawn, spun, and the plasma delivered into the skin. A session is short, with redness for a day or two afterwards.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 04</p><p class="h4 mt-2" style="color:#fff">Review</p><p class="body-s mt-2">Compared against the baseline under the same conditions, with maintenance discussed only if there is something worth maintaining.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="aftercare">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Downtime and aftercare</p>
        <h2 class="h2 mt-2">What the Days After Look Like</h2>
        <p class="body-l mt-3 measure">Redness across the treated area is usual for a day or two, and mild swelling is common. Pinpoint bruising at injection sites happens frequently and settles on its own.</p>
        <p class="body-l mt-3 measure">This is worth planning around. Book the treatment several days before anything socially significant rather than the evening before, because the first day or two is the least flattering part of the process.</p>
        <p class="body-l mt-3 measure">You will be given specific aftercare. In general the skin is left alone for the rest of the day, sun exposure and heat are avoided briefly, and active skincare products are paused for a short period before being reintroduced.</p>
        <p class="body mt-3 measure">Anything unusual — spreading redness, increasing pain, fever — should be reported promptly rather than waited out.</p>
      </div>
      <div>
        <div class="card card--pad-lg">
          <p class="h4">Usual and expected</p>
          <?= ticks([
              'Redness for a day or two',
              'Mild swelling',
              'Pinpoint bruising at injection sites',
              'Tenderness that settles quickly',
          ], false) ?>
        </div>
        <div class="card card--pad-lg mt-4">
          <p class="h4">Briefly avoid</p>
          <?= ticks([
              'Direct sun and sunbeds',
              'Saunas, steam and heavy sweating',
              'Active skincare acids and retinoids',
              'Makeup on the day, as instructed',
          ], false) ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Why the expectation-setting matters more than the technique here: facial PRP is a modest, reasonable treatment that gets sold with immodest photography. Almost every disappointed patient in this category was disappointed because they were expecting a lift or a volume change that no injection of their own plasma was ever going to produce. Establishing what actually bothers someone, saying plainly when PRP is not the answer, and photographing properly so the result can be judged, is most of the clinical work.',
    'Dr. Nyra — professional portrait'
) ?>

<section class="section section--canvas" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">Face PRP Cost in Gurgaon</h2>
        <p class="body mt-3 measure">Priced per session, with the course planned at assessment and quoted afterwards in writing.</p>
        <div class="grid grid--2 mt-5">
          <div class="card"><p class="h4">Sessions in the course</p><p class="body-s mt-2">Planned from your skin and your goals</p></div>
          <div class="card"><p class="h4">Areas treated</p><p class="body-s mt-2">Full face, or specific regions</p></div>
          <div class="card"><p class="h4">Combined with microneedling</p><p class="body-s mt-2">Often used together, and costed accordingly</p></div>
          <div class="card"><p class="h4">Maintenance</p><p class="body-s mt-2">Considered only where there is a result to maintain</p></div>
        </div>
        <p class="body-s mt-4 measure">Prepaid packages sold before an assessment are worth avoiding. A course should be reviewable, and it should be possible to stop it if the photographs show nothing is changing.</p>
        <p class="body mt-3 measure">See <a href="/cost-and-emi-options">cost and payment options</a>.</p>
      </div>
      <div class="card card--ink card--pad-lg">
        <h3 class="h3">Ask Before You Book</h3>
        <p class="body mt-3">Tell us what specifically bothers you about your skin. If PRP is not the right treatment for it, you will be told that before an appointment rather than after a course.</p>
        <a class="btn btn--block btn--accent mt-5" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
        <a class="btn btn--block btn--ghost mt-3" href="/book-consultation" data-track="book">Book an assessment</a>
        <p class="body-s mt-4">Your details are used only to arrange your consultation.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Face PRP FAQs</h2>
        <p class="body-s mt-3">Answers are general patient education. What suits your skin and your particular concern is decided at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'Facial PRP at Our Gurgaon Clinic',
    'Assessment, treatment and every review happen at our Sector 39 clinic in Gurugram, with the same doctor throughout. Patients travel to us from across Gurugram and neighbouring parts of South Delhi.'
) ?>

<?= cta_band(
    'Find Out Whether PRP Addresses What Is Actually Bothering You',
    'Come in and have your skin assessed properly. You will get a straight answer on whether platelet-rich plasma is the right treatment for your concern, and a recommendation for something else if it is not.',
    'face-prp',
    ['Face PRP', 'PRP with microneedling', 'Skin texture and fine lines', 'Not sure — please advise']
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
