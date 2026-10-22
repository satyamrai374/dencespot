<?php
/**
 * /patient-stories/ — case study hub.
 *
 * EDITORIAL CONSTRAINT, and the reason this page is short on cases:
 * every case shown here is one the clinic has actually treated and has consent
 * to publish. Nothing is invented, no composite "typical patient" is presented
 * as a person, and no outcome is described that the photographs do not show.
 * A case-study page padded with fabricated stories would be the single most
 * damaging thing this site could publish, so the library starts small and
 * grows as patients consent.
 *
 * $cases below currently mirrors the two consented cases already rendered by
 * before_after_slider_section() in includes/components.php. That duplication is
 * deliberate for now and should be resolved by lifting the array into a shared
 * include — see BUILD-PROGRESS.md. Do not add an entry here that is not also
 * consented and verifiable.
 *
 * Note the 'result' flag. The Shukri case is photographed on the day of
 * surgery and is NOT an outcome. components.php carries a long comment about
 * why it must never be badged as a before-and-after; the same rule is enforced
 * here through $case['result'], which drives both the badge and the wording.
 */

declare(strict_types=1);

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/schema.php';

/**
 * Consented cases only.
 *
 * result => true  : a matured outcome, photographed at a stated interval
 * result => false : work in progress or procedure-day documentation
 */
$cases = [
    [
        'id'       => 'uttam-gurgaon',
        'name'     => 'Uttam',
        'title'    => 'Hairline and Temple Restoration',
        'category' => 'FUE hair transplant',
        'place'    => 'Gurugram',
        'img'      => '/assets/img/case-uttam-gurgaon.jpg',
        'result'   => true,
        'interval' => 'Reviewed at 12 months',
        'summary'  => 'A receding hairline with temple recession, restored with an age-appropriate hairline design and graft placement across the frontal zone.',
        'detail'   => 'The frontal hairline and temples were rebuilt using follicular unit extraction. The line was designed to suit the face at a mature position rather than restored to an adolescent hairline, and photographed at twelve months, which is the point at which a transplant can fairly be judged.',
        'link'     => '/fue-hair-transplant-in-gurgaon',
        'linkText' => 'About FUE hair transplant',
    ],
    [
        'id'       => 'shukri-europe',
        'name'     => 'Shukri',
        'title'    => 'Frontal Zone, Photographed on the Day of Surgery',
        'category' => 'Micro-FUE, 2,800 grafts',
        'place'    => 'International patient',
        'img'      => '/assets/img/case-shukri-europe.jpg',
        'result'   => false,
        'interval' => 'Photographed on the day of surgery',
        'summary'  => 'Hairline design and 2,800 grafts, photographed minutes after placement. Nothing has grown yet, so this documents the work rather than the outcome.',
        'detail'   => 'This is included deliberately as an example of what a procedure-day photograph actually shows. The grafts are in place and the design is visible, but growth begins months later. Clinics that present images like this as before-and-after results are showing you surgery, not an outcome.',
        'link'     => '/hairline-transplant-in-gurgaon',
        'linkText' => 'How a hairline is designed',
    ],
];

$faqs = [
    ['q' => 'Why are there so few cases here?',
     'a' => 'Because every case published is one we have treated and have written consent to show. Patients are entitled to privacy and many decline, which is their right. A larger gallery would be easy to produce and would not be honest, so the library grows slowly as consent is given.'],
    ['q' => 'Are the photographs edited?',
     'a' => 'The hair is never digitally altered. Photographs are taken at the clinic and published as they were captured. Where an image has been cropped for layout, that is all that has been done to it.'],
    ['q' => 'When are result photographs taken?',
     'a' => 'A hair transplant is judged at roughly ten to twelve months, and that is when a case is photographed as a result. Images taken earlier show a procedure part-way through its timeline, which is why one case here is labelled as the day of surgery rather than as an outcome.'],
    ['q' => 'Why include a case that is not a result?',
     'a' => 'Because it demonstrates something useful. Procedure-day photographs look impressive and are widely presented as results, and knowing what one actually shows makes you a harder person to mislead. Labelling it honestly is the point of including it.'],
    ['q' => 'Will I get the same result?',
     'a' => 'No case here predicts your outcome. Results depend on your donor supply, your pattern and stage of loss, your hair characteristics and how you heal, and those vary substantially. Photographs show what was achieved for one person, not what is available to everyone.'],
    ['q' => 'How should I read before-and-after photographs generally?',
     'a' => 'Check that lighting, angle, hair length and styling are consistent between the two images, and that the interval is stated. Ask whether the case was performed by the person who would perform yours. Our guide on <a href="/blog/how-to-read-before-and-after-photos">reading before-and-after photographs</a> covers the details.'],
    ['q' => 'Can I speak to a previous patient?',
     'a' => 'We will not pass on patient contact details, because consent to publish a photograph is not consent to be contacted by strangers. What you can do is read our <a href="/patient-reviews">patient reviews</a> and ask us directly at consultation about cases similar to yours.'],
    ['q' => 'Do you pay patients to appear here?',
     'a' => 'No. Cases are published with consent and without payment or discount in exchange. A paid testimonial is advertising, and it should be labelled as such wherever you encounter it.'],
    ['q' => 'How do I know these are your own patients?',
     'a' => 'Ask at your consultation. Stock photography and purchased case libraries are common in this industry, and the reasonable check is to ask any clinic directly whether the cases shown were performed by the person who will perform yours, and to note how readily they answer.'],
    ['q' => 'Can I have my own case published?',
     'a' => 'Only if you want it. You will be asked, you can decline without it affecting your care in any way, and you can withdraw consent later. Photographs are taken as part of routine clinical records regardless, because that is how progress is assessed.'],
    ['q' => 'Where can I see more photographs?',
     'a' => 'Our <a href="/gallery">photo gallery</a> and <a href="/hair-transplant-results-gurgaon">results page</a> carry further images, with the same standards applied to intervals and to labelling.'],
    ['q' => 'What should I look for in my own case?',
     'a' => 'Shedding within the first weeks, growth from around three to four months, and a fuller picture at roughly ten to twelve months. Progress is assessed against your own baseline photographs at review, not against someone else\'s case.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Patient stories'],
];

$page = [
    'title'       => 'Patient Stories & Case Studies | DenceSpot Clinic',
    'description' => 'Consented hair transplant case studies from our Gurgaon clinic, photographed at a stated interval with the hair never digitally altered.',
    'url'         => '/patient-stories/',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_faq('/patient-stories/', $faqs),
    ],
];

require __DIR__ . '/../includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Patient stories</span>
        <h1 class="h1 mt-3">Case Studies, With the Interval Stated Every Time</h1>
        <p class="lead mt-3 measure">Every case here is a patient treated at this clinic who gave written consent to be shown. The hair is never digitally altered, the interval is always stated, and one case is deliberately labelled as procedure-day documentation rather than a result. There are not many, and that is the honest position.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="#cases" data-track="cases"><?= icon('list', 18) ?> See the Cases</a>
          <a class="btn btn--lg btn--accent" href="/book-consultation" data-track="book"><?= icon('calendar', 19) ?> Book a Consultation</a>
        </div>

        <?= ticks([
            'Written consent for every case shown',
            'Hair never digitally altered',
            'The interval stated on every image',
            NAP_LOCALITY . ' · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow"><img src="/assets/img/clinic-front.webp" alt="DenceSpot Clinic, Sector 39, Gurugram" width="800" height="1000" loading="eager"></div>
        <div class="hero__badge-card">
          <p class="eyebrow">Every case treated by</p>
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
      <div class="card"><?= icon('doc', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Consent in writing</p><p class="body-s mt-2">Given freely, and withdrawable at any time.</p></div>
      <div class="card"><?= icon('clock', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Interval always stated</p><p class="body-s mt-2">You know how long after surgery each image is.</p></div>
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">No retouching</p><p class="body-s mt-2">Hair is never digitally added or thickened.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Our own patients</p><p class="body-s mt-2">Treated here, by the doctor who would treat you.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Nobody is paid</p><p class="body-s mt-2">No discounts or fees in exchange for appearing.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="cases">
  <div class="wrap">
    <p class="eyebrow">The cases</p>
    <h2 class="h2 mt-2">Documented Cases From Our Gurgaon Clinic</h2>
    <p class="body mt-3 measure">Results vary between patients. No case here predicts what is achievable for you, which depends on your own donor supply, pattern of loss and hair characteristics.</p>

    <div class="grid grid--2 mt-6" style="gap:24px">
      <?php foreach ($cases as $case): ?>
        <article class="card card--pad-lg" style="display:flex;flex-direction:column">
          <div class="media ratio-16-10 media--shadow" style="border:1px solid var(--line);border-radius:var(--r-md);overflow:hidden">
            <img src="<?= e($case['img']) ?>" alt="<?= e($case['name'] . ' — ' . $case['title'] . ', ' . $case['category']) ?>" width="800" height="500" loading="lazy" style="width:100%;height:100%;object-fit:cover">
          </div>

          <p class="eyebrow mt-4" style="color:<?= $case['result'] ? 'var(--accent-deep)' : 'inherit' ?>">
            <?= $case['result'] ? 'Before &amp; after result' : 'On the day of surgery — not a result' ?>
          </p>
          <h3 class="h3 mt-2"><?= e($case['name']) ?> — <?= e($case['title']) ?></h3>
          <p class="body-s mt-2" style="opacity:.75"><?= e($case['category']) ?> · <?= e($case['place']) ?></p>

          <p class="body mt-3 measure"><?= e($case['summary']) ?></p>
          <p class="body-s mt-3 measure"><?= e($case['detail']) ?></p>

          <div class="note note--tint mt-4">
            <p class="body-s"><strong><?= e($case['interval']) ?></strong></p>
          </div>

          <p class="body-s mt-4"><a href="<?= e($case['link']) ?>"><?= e($case['linkText']) ?> &rsaquo;</a></p>
        </article>
      <?php endforeach; ?>
    </div>

    <div class="card card--pad-lg mt-6">
      <p class="eyebrow">Why this page is short</p>
      <h3 class="h3 mt-2">A small library is the honest kind</h3>
      <p class="body mt-3 measure">Publishing a case requires a patient who is happy to be shown, photographed properly at a stated interval, and willing to sign consent. Many people decline, which is entirely their right, and hair loss is a private matter for a lot of patients.</p>
      <p class="body mt-3 measure">We could fill this page tomorrow with purchased case libraries or stock photography, as is common in this industry. It would look considerably more impressive and it would tell you nothing about us. This grows as patients consent.</p>
      <p class="body mt-3 measure">If you would like to see more images, our <a href="/gallery">photo gallery</a> and <a href="/hair-transplant-results-gurgaon">results page</a> carry further material under the same standards, and our <a href="/patient-reviews">patient reviews</a> are what people have said in their own words.</p>
    </div>
  </div>
</section>

<section class="section section--white" id="standards">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Our standards</p>
        <h2 class="h2 mt-2">The Rules We Apply to Our Own Photographs</h2>
        <p class="body-l mt-3 measure">Elsewhere on this site we tell you how to read a clinic's before-and-after images sceptically. It would be inconsistent not to state what we hold ourselves to.</p>
        <p class="body-l mt-3 measure"><strong>The interval is always stated.</strong> A hair transplant is judged at roughly ten to twelve months. An image without a stated interval could be from any point in that timeline, and the difference is enormous.</p>
        <p class="body-l mt-3 measure"><strong>Procedure-day photographs are labelled as such.</strong> Freshly placed grafts look dense and dramatic, and nothing has grown. One case on this page exists specifically to show what that looks like and to name it accurately.</p>
        <p class="body-l mt-3 measure"><strong>The hair is not digitally altered.</strong> No thickening, no filling in, no adjustment of density. Cropping for layout is the only editing applied.</p>
        <p class="body-l mt-3 measure"><strong>Consent is real and withdrawable.</strong> Patients are asked, may decline without any effect on their care, and can withdraw later.</p>
      </div>
      <div>
        <div class="card card--pad-lg">
          <p class="h4">Apply these anywhere</p>
          <?= ticks([
              'Is the interval since surgery stated?',
              'Do lighting and angle match between images?',
              'Is hair length and styling consistent?',
              'Was the case done by the person treating you?',
              'Is it labelled if it is procedure-day?',
          ], false) ?>
        </div>
        <div class="card card--pad-lg mt-4">
          <p class="h4">Read more</p>
          <p class="body-s mt-2"><a href="/blog/how-to-read-before-and-after-photos">How to read before-and-after photographs</a></p>
          <p class="body-s mt-3"><a href="/blog/hair-transplant-growth-timeline-month-by-month">The month-by-month growth timeline</a></p>
          <p class="body-s mt-3"><a href="/how-to-choose-hair-transplant-clinic">How to choose a clinic</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Why one of the two cases on this page is labelled as not being a result: procedure-day photographs are the most persuasive images in hair restoration and the least informative. The grafts are visible, the design is visible, the scalp looks transformed, and none of it has grown. Publishing one with an honest label does more for a prospective patient than another twelve-month comparison would, because it teaches them what to ask about every image they are shown elsewhere.'
) ?>

<section class="section section--canvas" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">About These Case Studies</h2>
        <p class="body-s mt-3">Results vary between patients. What is achievable in your case is established at assessment, against your own donor supply and pattern of loss.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'Where These Cases Were Treated',
    'Every case shown was treated at our Sector 39 clinic in Gurugram by the same doctor who would assess you. Patients travel to us from across Gurugram and neighbouring parts of South Delhi.'
) ?>

<?= cta_band(
    'Ask What Is Realistic for Your Own Case',
    'Bring photographs of your own hair and we will tell you what your donor area can actually support. You will get an assessment, an honest view of what is achievable, and a written plan — not a promise based on someone else\'s result.',
    'patient-stories',
    ['Hair transplant assessment', 'Second opinion', 'Beard transplant', 'Hair loss — not yet diagnosed', 'Not sure — please advise']
) ?>

<?php require __DIR__ . '/../includes/footer.php'; ?>
