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
     'a' => 'It is used for skin quality — texture, fine lines, dullness and overall firmness — rather than for any single dramatic change. The published evidence is limited: studies are mostly small, use differing preparations and rely largely on photographic or subjective scoring. Where it helps, the change is gradual and assessed over months, and some people see little difference. It is not a facelift and it does not restore lost volume.'],
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
     'a' => 'Because the material is your own blood, a reaction to the material itself is not expected. The general risks of any injection apply — bruising, swelling, and uncommonly infection. Your medical history and medication are reviewed before treatment.'],
    ['q' => 'Who should not have facial PRP?',
     'a' => 'It is not appropriate where there is active skin infection or inflammation in the treatment area, in certain blood, platelet and clotting disorders, in some cancers, and where medication affecting clotting has not been reviewed. Pregnancy and breastfeeding are assessed individually.'],
    ['q' => 'Can it be combined with microneedling?',
     'a' => 'The two are commonly used together, with PRP applied to skin that has just been microneedled. Whether that combination suits you is decided at assessment. See <a href="/hair-microneedling-in-gurgaon">microneedling</a> for how the technique itself works.'],
    ['q' => 'How long do the results last?',
     'a' => 'Not permanently. Skin continues to age, so any improvement is maintained rather than fixed, and maintenance sessions are usually part of a realistic plan. Anyone saying the effect of PRP lasts indefinitely is overstating it.'],
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
    'title'       => 'Face PRP Treatment in Gurgaon: Sessions, Downtime & Cost',
    'description' => 'Face PRP treatment in Gurgaon: what your own plasma can and cannot do for skin, how it compares with microneedling and prescription creams, downtime and cost.',
    'url'         => '/face-prp-treatment-in-gurgaon',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-skin-768.webp',
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
            'expectedPrognosis' => 'Published evidence is limited to mostly small studies with differing preparation methods. Where changes in skin texture and quality occur, they develop gradually over weeks to months rather than immediately. Facial PRP does not lift sagging skin, restore lost volume or replace surgical treatment, and it is not a treatment for active acne. Results are not permanent and require maintenance. Outcomes vary between patients and cannot be promised.',
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
        <p class="lead mt-3 measure">Facial PRP uses your own blood with the aim of supporting skin quality — texture, fine lines, the general look of the skin. It is a modest treatment with limited published evidence. It is not a facelift, it does not fill volume, and the transformations in the photographs you have seen usually owe a good deal to the lighting.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-treatment="Skin care" data-track="book"><?= icon('calendar', 18) ?> Book an Assessment</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Prepared from your own blood',
            'Carried out by registered medical practitioners',
            'Standardised photographs, not mirror comparisons',
            'At our clinic in Sector 39, Gurugram',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-skin-768.webp" srcset="/assets/img/services/svc-skin-512.webp 512w, /assets/img/services/svc-skin-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a sculpted block of skin cut away to show its layers, one hair growing from its follicle and a coiled gland beside it" width="768" height="960" loading="eager" fetchpriority="high">
          <?= hp_ai_chip('AI-generated illustration') ?>
        </div>
        <?= hero_review_badge() ?>
      </div>
    </div>
  </div>
</section>

<?= lead_strip() ?>

<section class="trust">
  <div class="wrap">
    <div class="grid grid--5">
      <div class="card"><?= icon('heart', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Autologous</p><p class="meta mt-1">Your own blood, so a reaction to the material itself is not expected.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Registered doctors</p><p class="meta mt-1">Assessed and treated by registered medical practitioners.</p></div>
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Measured properly</p><p class="meta mt-1">Standardised images, consistent lighting.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Modest claims</p><p class="meta mt-1">Skin quality, not a surgical result.</p></div>
      <div class="card"><?= icon('info', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Told when it is wrong</p><p class="meta mt-1">Volume loss and sagging need something else.</p></div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-prp',
    'alt'     => 'a capped tube of golden plasma standing on a white tray beside a syringe',
    'eyebrow' => 'The basics, plainly',
    'title'   => 'What Facial PRP Involves',
    'id'      => 'what-is',
    'html'    => '<p>A small volume of blood is drawn, exactly as for a routine blood test, and spun in a centrifuge so the platelet-rich fraction can be taken off. Platelets carry growth factors involved in tissue repair; concentrating them and delivering them into the skin is the whole idea behind the treatment.</p><p>Face PRP is one of the options weighed at a <a href="/skin-treatment-in-gurgaon">skin treatment consultation</a>, alongside prescription treatment and sun protection.</p>'
               . '<p>The plasma is either injected into the dermis across the areas being treated, or applied to skin immediately after microneedling so that it reaches the tissue through the channels created. Because the material is yours, a reaction to it is not expected; the usual side effects come from the injections — redness, swelling and bruising.</p>'
               . '<p>The published evidence for facial PRP is limited. Studies are mostly small, use differing preparations, and judge results largely from photographs or patient scoring, so the size of any benefit is uncertain. It is given as a course of sessions spaced some weeks apart, and any benefit builds gradually.</p>'
               . '<p><b>What it does not address:</b> sagging, lost volume, deep folds, active acne, or anything that needs a surgical or volumising solution. If that is what bothers you, this is the wrong treatment, and that is what you will be told at assessment.</p>'
               . '<p><b>What it plausibly addresses:</b></p>',
    'points'  => [
        'Skin texture and fine lines',
        'Dullness',
        'The general quality and firmness of the skin',
    ],
]) ?>

<section class="section section--canvas" id="expectations">
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

<section class="section section--white" id="candidacy">
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
          <div class="mt-3"><?= ticks([
              'Skin texture and fine lines',
              'Dull or tired-looking skin',
              'A preference for autologous treatment',
              'Comfortable with a gradual, modest change',
          ], false) ?></div>
        </div>
        <div class="card card--pad-lg mt-4">
          <p class="h4">Not appropriate</p>
          <div class="mt-3"><?= ticks([
              'Sagging skin or lost facial volume',
              'Active skin infection or inflammation',
              'Active acne as the primary concern',
              'Certain blood, platelet and clotting disorders',
          ], false) ?></div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
$faceCompare = [
    ['What it involves', 'Your own blood is drawn and spun; the plasma is injected into the skin or applied straight after microneedling', 'Fine needles make tiny controlled channels in the skin; nothing is injected', 'Creams or gels used at home, such as retinoids or pigment-reducing agents, with a broad-spectrum sunscreen every day'],
    ['Mainly used for', 'Skin texture, fine lines, dullness and overall skin quality', 'Skin texture, and as a way to help PRP or a topical reach into the skin', 'Acne and pigmentation, including melasma, as the usual first step'],
    ['What it does not do', 'Lift sagging skin, add volume as fillers do, or treat active acne', 'Treat active acne or inflamed skin, where it should not be used', 'Lift sagging skin or restore lost volume'],
    ['How it is given', 'A course of sessions spaced some weeks apart, then maintenance if worthwhile', 'A course of sessions spaced to let the skin recover in between', 'Daily use for a defined period, reviewed by the doctor'],
    ['Usual after-effects', 'Redness and mild swelling for a day or two; pinpoint bruising', 'Redness and tenderness for a day or so', 'Early dryness and irritation, usually manageable'],
    ['Evidence', 'Limited: mostly small studies with differing preparations', 'Varies with the concern; studies differ in needle depth and method', 'The established starting point for acne and pigmentation'],
];
?>
<section class="section section--canvas" id="compare">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Side by side</p>
      <h2 class="h2 mt-2">Face PRP vs Microneedling vs Prescription Creams</h2>
      <p class="body mt-3">Three approaches people often weigh up for the skin of the face. They do different jobs, and for acne and pigmentation the usual first step is a prescription and a sunscreen rather than a procedure. This is general information; what suits your skin is decided at the assessment.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data data--wide">
          <caption class="sr-only">Face PRP, microneedling and prescription creams with sunscreen compared: what each involves, what it is mainly used for, what it does not do, how it is given, usual after-effects and the evidence. General information, not a treatment plan or a list of treatments offered at the clinic.</caption>
          <thead><tr><th scope="col">&nbsp;</th><th scope="col">Face PRP</th><th scope="col">Microneedling</th><th scope="col">Prescription creams and sunscreen</th></tr></thead>
          <tbody>
            <?php foreach ($faceCompare as $r): ?>
            <tr><th scope="row" style="white-space:normal;width:18%"><?= e($r[0]) ?></th><td><?= e($r[1]) ?></td><td><?= e($r[2]) ?></td><td><?= e($r[3]) ?></td></tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">Acne and pigmentation are assessed under <a href="/skin-treatment-in-gurgaon">skin treatment in Gurgaon</a>, and the needling technique itself is described on the <a href="/hair-microneedling-in-gurgaon">hair microneedling</a> page.</p>
  </div>
</section>

<section class="section section--white" id="questions">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Before you pay</p>
      <h2 class="h2 mt-2">Questions Worth Asking Any Clinic About Face PRP</h2>
      <p class="body mt-3">They apply wherever you have it done, including here, and the answers take a few minutes to get.</p>
    </div>
    <div class="card card--pad-lg mt-5">
      <?= ticks([
          'Which concern is this meant to improve, and is PRP the right tool for it?',
          'How is the plasma prepared, and is the method the same each session?',
          'Who draws the blood and gives the injections?',
          'Will standardised photographs be taken before the first session?',
          'How many sessions are planned, and what happens if nothing changes?',
          'What does maintenance involve once the course ends?',
      ]) ?>
    </div>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'The process',
    'title'   => 'How a Course Runs',
    'id'      => 'journey',
    'intro'   => 'Planned at assessment rather than sold as a fixed package beforehand.',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk', 'title' => 'Assessment and baseline photographs', 'text' => 'Your skin examined, medical history and medication reviewed, and an honest answer on whether PRP addresses what is bothering you. Standardised images are taken before anything begins.'],
        ['img' => 'step-procedure', 'alt' => 'sterile instruments laid out on a tray', 'title' => 'Sessions', 'text' => 'Blood drawn, spun, and the plasma delivered into the skin. A session is short, with redness for a day or two afterwards.'],
        ['img' => 'step-plan', 'alt' => 'a tablet on a desk showing a head diagram', 'title' => 'Review', 'text' => 'Compared against the baseline under the same conditions, with maintenance discussed only if there is something worth maintaining.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-followup',
    'alt'     => 'a desk calendar with several days circled in green, beside a small potted succulent and a pen on a wooden desk',
    'eyebrow' => 'Downtime and aftercare',
    'title'   => 'What the Days After Look Like',
    'id'      => 'aftercare',
    'reverse' => true,
    'html'    => '<p>Redness across the treated area is usual for a day or two, mild swelling is common, and pinpoint bruising at injection sites happens frequently and settles on its own. Book the treatment several days before anything socially significant rather than the evening before, because the first day or two is the least flattering part of the process.</p>'
               . '<p>You will be given specific aftercare. In general the skin is left alone for the rest of the day, sun exposure and heat are avoided briefly, and active skincare products are paused for a short period. Anything unusual — spreading redness, increasing pain, fever — should be reported promptly rather than waited out.</p>'
               . '<p><b>Briefly avoid:</b> direct sun and sunbeds; saunas, steam and heavy sweating; active skincare acids and retinoids; makeup on the day, as instructed.</p>'
               . '<p><b>Usual and expected:</b></p>',
    'points'  => [
        'Redness for a day or two',
        'Mild swelling',
        'Pinpoint bruising at injection sites',
        'Tenderness that settles quickly',
    ],
]) ?>

<?= doctor_block(
    'Consultations and procedures are carried out by registered medical practitioners at the clinic.'
) ?>

<section class="section section--white" id="cost">
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
      <div class="cta-band" style="display:block">
        <h3 class="h3">Ask Before You Book</h3>
        <p class="body mt-3">Tell us what specifically bothers you about your skin. If PRP is not the right treatment for it, you will be told that before an appointment rather than after a course.</p>
        <a class="btn btn--block btn--accent mt-5" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
        <a class="btn btn--block btn--ghost mt-3" href="/book-consultation" data-book data-treatment="Skin care" data-track="book">Book an assessment</a>
        <p class="body-s mt-4">Your details are used only to arrange your consultation.</p>
      </div>
    </div>
  </div>
</section>

<?= local_block(
    'Facial PRP at Our Gurgaon Clinic',
    'Assessment, treatment and reviews take place at our Sector 39 clinic in Gurugram. Consultations and procedures are carried out by registered medical practitioners at the clinic.'
) ?>

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

<?= lp_cta([
    'eyebrow'   => 'Sector 39, Gurugram',
    'title'     => 'Find Out Whether PRP Addresses What Is Actually Bothering You',
    'text'      => 'Come in and have your skin assessed properly. You will get a straight answer on whether platelet-rich plasma is the right treatment for your concern, and a recommendation for something else if it is not.',
    'treatment' => 'Skin care',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
