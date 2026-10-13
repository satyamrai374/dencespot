<?php
/**
 * /skin-treatment-in-rohini — October 2026.
 *
 * Rohini (Delhi) twin of /skin-treatment-in-gurgaon. The agency confirmed on
 * 13 Oct 2026 that skin treatment is carried out at the Rohini clinic. This
 * page takes a different angle from the Gurugram page so the two are not
 * near-duplicates: what to bring, what the Rohini consultation involves,
 * short condition-by-condition notes, and follow-up visits close to home. The
 * Gurugram page carries the depth on treatment options and limits.
 *
 * Not on record, so NOT stated: which doctor consults at Rohini, which skin
 * procedures are offered (a marked missing_fact() below), the street address,
 * prices, devices or brands, travel times. Not yet reviewed by the clinic's
 * doctor: doctor_block(..., false), no "medically reviewed" line, not in
 * MEDICAL_PAGES.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'Is skin treatment done at the Rohini clinic, or only the consultation?',
     'a' => 'Both. Skin consultations and treatment are carried out at the Rohini clinic, and review visits can be booked there too. If our Sector 39 clinic in Gurugram suits you better, you can choose that instead.'],
    ['q' => 'Which parts of Delhi is the Rohini clinic convenient for?',
     'a' => 'The clinic is in North-West Delhi, near the Outer Ring Road, so it is close to Rohini, Pitampura, Shalimar Bagh, Prashant Vihar and neighbouring parts of North and North-West Delhi. The directions link on this page opens the clinic’s location in Google Maps.'],
    ['q' => 'What should I bring to my first skin consultation?',
     'a' => 'The products you use on your skin, or photos of their labels, any cream bought without a prescription, earlier prescriptions and test reports, and a list of your medicines. Come without makeup if you can, so the skin can be seen as it is.'],
    ['q' => 'How many visits will I need?',
     'a' => 'It depends on the concern. Most plans include the first consultation and at least one review to see how the skin is responding. Long-running conditions such as acne and melasma usually need further reviews and a maintenance plan, and you are told what to expect at the first visit.'],
    ['q' => 'Will melasma or acne scars go away completely?',
     'a' => 'Usually not. Melasma can be lightened and controlled but tends to return, so sun protection and maintenance carry on after it fades. Acne scars can be made less noticeable, but they rarely disappear. Any plan is built around those limits rather than around a promise.'],
    ['q' => 'Can I have skin treatment while pregnant or breastfeeding?',
     'a' => 'Some treatments are avoided in pregnancy and while breastfeeding, including certain oral acne medicines, some creams and some pigmentation treatments. Others can be considered. Tell the doctor at the start, including if you are planning a pregnancy, so the plan can take it into account.'],
    ['q' => 'How much does skin treatment cost in Rohini?',
     'a' => 'It depends on the diagnosis and on what the plan includes, so it is explained after the consultation, and any procedure is quoted in writing before it is booked. See <a href="/cost-and-emi-options">cost and payment options</a>.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Skin treatment in Rohini'],
];

$page = [
    'title'         => 'Skin Treatment in Rohini, Delhi | DenceSpot Clinic',
    'description'   => 'Skin treatment at our Rohini clinic in North-West Delhi: what to bring, what the consultation involves, notes on acne, melasma and pigmentation, and follow-ups.',
    'url'           => '/skin-treatment-in-rohini',
    'crumbs'        => $crumbs,
    'preload_image' => '/assets/img/services/svc-skin-768.webp',
    'schema'        => [
        schema_delhi_clinic(),
        schema_breadcrumbs($crumbs),
        schema_therapy('/skin-treatment-in-rohini', [
            'name'              => 'Skin Treatment',
            'alternateName'     => ['Dermatology consultation for skin concerns', 'Skin treatment in Rohini, Delhi'],
            'relevantSpecialty' => 'https://schema.org/Dermatology',
            'bodyLocation'      => 'Skin',
            'howPerformed'      => 'A consultation with a registered medical practitioner at the Rohini, Delhi clinic: history, examination of the affected skin and investigations only where they would change the plan, followed by a written plan that may include prescription topical or oral medicines, sun protection, skincare routine advice and, where suitable, an in-clinic procedure.',
            'preparation'       => 'The patient brings current skincare products or photographs of their labels, any non-prescription creams, earlier prescriptions and reports, and a list of medicines, and reports pregnancy, plans for pregnancy or breastfeeding.',
            'followup'          => 'Review visits at the Rohini clinic to check tolerance and response, with treatment adjusted and a maintenance plan for long-running conditions such as acne and melasma.',
            'expectedPrognosis' => 'Response is judged over weeks to months. Melasma tends to recur and needs maintenance and sun protection; acne scars improve rather than disappear. Some treatments are unsuitable in pregnancy, and side effects can occur. Outcomes vary between patients and cannot be promised.',
            'location'          => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
            'performer'         => null,
        ]),
        schema_faq('/skin-treatment-in-rohini', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Clinic 2 · Rohini, Delhi</span>
        <h1 class="h1 mt-3">Skin Treatment in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">Skin treatment is carried out at our Rohini clinic in North-West Delhi as well as in Gurugram. It starts with a consultation with a registered medical practitioner about the concern you came in with, whether acne, the marks it leaves, pigmentation, melasma, dry or sensitive skin, or a problem linked to hair, and it continues with review visits you can attend without crossing the city.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Skin care" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp the Rohini Clinic</a>
        </div>

        <?= ticks([
            'Consultation and treatment at the Rohini clinic',
            'Diagnosis before any prescription',
            'Review visits close to home',
            'Rohini, Delhi · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-skin-768.webp" srcset="/assets/img/services/svc-skin-512.webp 512w, /assets/img/services/svc-skin-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a sculpted cross-section of skin layers with a single hair follicle and a coiled gland, on a pale circular background" width="768" height="960" loading="eager" fetchpriority="high">
          <?= /* top of the image: at the bottom it sits under the badge card on phones */ str_replace('class="hp-ai-chip"', 'class="hp-ai-chip" style="top:12px;bottom:auto"', hp_ai_chip('AI-generated illustration')) ?>
        </div>
        <div class="hero__badge-card">
          <p class="eyebrow">Clinic 2 · Rohini</p>
          <p class="h4 mt-1"><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></p>
          <p class="meta"><?= e(HOURS_DISPLAY) ?> · <?= e(HOURS_NOTE) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="trust">
  <div class="wrap">
    <div class="grid grid--4">
      <div class="card"><?= icon('pin', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">In Rohini</p><p class="meta mt-1">Consultation and treatment in North-West Delhi.</p></div>
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Cause first</p><p class="meta mt-1">The skin is examined before anything is prescribed.</p></div>
      <div class="card"><?= icon('calendar', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Reviews nearby</p><p class="meta mt-1">Follow-up visits at the same clinic.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Registered doctors</p><p class="meta mt-1">Carried out by registered medical practitioners.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="prepare">
  <div class="wrap">
    <div class="split" style="align-items:start">
      <div>
        <p class="eyebrow">Before your visit</p>
        <h2 class="h2 mt-2">What to Bring to Your Rohini Skin Consultation</h2>
        <p class="body-l mt-3 measure">A skin consultation is most useful when the doctor can see what your skin has been exposed to. Five minutes of preparation makes the first visit count.</p>
        <div class="mt-4"><?= ticks([
            'Every product you use on your skin, or clear photos of the labels, including soap and sunscreen',
            'Any cream bought from a chemist or online, especially “pimple” or “fairness” creams',
            'Earlier prescriptions and test reports from previous skin treatment',
            'A list of the medicines and supplements you take',
            'Photos of a flare, if the problem comes and goes',
        ], false) ?></div>
      </div>
      <div class="stack">
        <div class="card card--pad-lg">
          <p class="eyebrow" style="color:var(--ink-muted)">Good to know</p>
          <p class="body mt-2">Come with bare skin if you can. Makeup hides the pattern of acne and pigmentation, which is often what points to the diagnosis.</p>
          <p class="body mt-3">If you have been using a strong steroid cream, mention it rather than stopping it suddenly the night before. Some skin conditions flare when a steroid is withdrawn abruptly, and the doctor can plan how to come off it.</p>
          <p class="body mt-3">Say if you are pregnant, planning a pregnancy or breastfeeding. Several skin medicines are avoided at those times.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="visit">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">At the Rohini clinic</p>
      <h2 class="h2 mt-2">What to Expect at the Consultation</h2>
      <p class="body mt-3">No treatment is decided until the skin has been looked at properly. A first consultation usually covers four things.</p>
    </div>
    <div class="split split--wide-left mt-6" style="align-items:start">
      <div class="stack-sm">
        <div class="step"><span class="step-num">1</span><div><h3 class="h3">Your concern, in your words</h3><p class="body-s mt-2">What bothers you most, how long it has been there, what has been tried, and what made it better or worse. The diagnosis often starts here.</p></div></div>
        <div class="step"><span class="step-num">2</span><div><h3 class="h3">A close look at the skin</h3><p class="body-s mt-2">Examination of the affected areas, including the chest and back for acne, or the scalp where flaking or itching is part of the picture.</p></div></div>
        <div class="step"><span class="step-num">3</span><div><h3 class="h3">Tests, if they would change the plan</h3><p class="body-s mt-2">Most people need none. Blood tests are advised for a reason, for example acne with irregular periods, before some oral medicines, or darkening of the skin that hints at an internal cause.</p></div></div>
        <div class="step"><span class="step-num">4</span><div><h3 class="h3">A written plan and a review date</h3><p class="body-s mt-2">What to apply and in what order, which side effects are expected, and when to come back to the Rohini clinic to check progress.</p></div></div>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow" style="color:var(--ink-muted)">If a procedure is mentioned</p>
        <p class="body-s mt-2">A procedure is discussed only after the diagnosis, and only alongside medical treatment, not instead of it.</p>
        <p class="body-s mt-2">Skin procedures offered at the clinic: <?= missing_fact('list of skin procedures offered at the clinic') ?></p>
        <p class="body-s mt-2">Face PRP is one of the clinic’s skin treatments. How it works, and what it will not do, is explained on the <a href="/face-prp-treatment-in-gurgaon">face PRP page</a>.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="conditions">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Condition by condition</p>
      <h2 class="h2 mt-2">Notes on the Commonest Skin Concerns</h2>
      <p class="body mt-3">Short, practical notes on what treatment usually involves and what to expect. The treatment options a dermatologist may consider are set out in more depth in our <a href="/skin-treatment-in-gurgaon">skin treatment guide</a>.</p>
    </div>
    <div class="card mt-6" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data">
          <caption class="sr-only">Common skin concerns: what treatment usually involves and what to expect. General patient education, not a treatment plan.</caption>
          <thead>
            <tr><th scope="col">Concern</th><th scope="col">What treatment usually involves</th><th scope="col">What to expect</th></tr>
          </thead>
          <tbody>
            <tr><th scope="row">Active acne</th><td>Prescription creams; tablets for moderate, severe or scarring acne; a simple routine</td><td>First judged at about two to three months. Picking spots raises the risk of marks.</td></tr>
            <tr><th scope="row">Marks after acne</th><td>Controlling the acne, daily sunscreen, pigment-reducing creams</td><td>Flat marks fade gradually over months; sun and picking slow them down.</td></tr>
            <tr><th scope="row">Acne scars</th><td>Assessed once acne is under control; procedures where suitable</td><td>Pitted or raised scars improve rather than disappear.</td></tr>
            <tr><th scope="row">Melasma</th><td>Sunscreen every day, prescription creams in courses, then maintenance</td><td>Lightens over months but tends to return with sun, heat and hormones.</td></tr>
            <tr><th scope="row">Dry or sensitive skin</th><td>Finding the cause, such as eczema, rosacea or a product allergy, and repairing the skin barrier</td><td>Often settles over weeks; fewer products is usually part of the answer.</td></tr>
            <tr><th scope="row">Ingrown hairs and razor bumps</th><td>Changes to how hair is removed, treatment of the inflammation and of the marks left</td><td>Common in the beard area and after waxing; marks take months to fade.</td></tr>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">These are general notes, not a plan. Two people with the same diagnosis can need quite different treatment, and what suits you is decided at the consultation.</p>
  </div>
</section>

<section class="section section--canvas" id="follow-up">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">After the first visit</p>
      <h2 class="h2 mt-2">Follow-Up Visits Close to Home</h2>
      <p class="body mt-3">Skin treatment is rarely one appointment. Creams are adjusted when they irritate, oral medicines are monitored, and melasma needs a maintenance plan once it has faded. With the clinic in Rohini, those reviews do not depend on a trip to Gurugram, which makes the schedule easier to keep.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--pad-lg"><h3 class="h3">An early check</h3><p class="body-s mt-2">A review a few weeks in is common. It looks at how the skin is tolerating treatment, so a cream that stings can be adjusted rather than abandoned.</p></div>
      <div class="card card--pad-lg"><h3 class="h3">Judging the result</h3><p class="body-s mt-2">Acne treatment is usually judged at two to three months, pigmentation later. Photographs from the first visit, taken with your consent, keep the comparison fair.</p></div>
      <div class="card card--pad-lg"><h3 class="h3">Maintenance</h3><p class="body-s mt-2">Acne and melasma often need a lighter, ongoing routine after the first course. Stopping everything as soon as the skin looks better is a common reason for relapse.</p></div>
    </div>
    <div class="note mt-5">
      <p class="h4">Between visits</p>
      <p class="body-s mt-2">If a treatment causes marked redness, swelling, blistering or a rash, contact the Rohini clinic on <a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a> rather than waiting for your review.</p>
    </div>
  </div>
</section>

<section class="section section--white" id="limits">
  <div class="wrap">
    <div class="split" style="align-items:start">
      <div>
        <p class="eyebrow">Honest limits</p>
        <h2 class="h2 mt-2">What to Keep in Mind Before Starting</h2>
        <p class="body-l mt-3 measure">Skin treatment is slow and works within limits. These are the ones that matter most when deciding whether to begin.</p>
        <p class="body mt-3 measure">Each is explained in more detail in the Gurugram guide’s section on <a href="/skin-treatment-in-gurgaon#limits">what skin treatment can and cannot do</a>.</p>
      </div>
      <div class="card card--pad-lg">
        <?= ticks([
            'Results vary from person to person, and no particular result can be promised',
            'Melasma recurs; sun protection and maintenance continue after it fades',
            'Acne scars improve rather than disappear',
            'Several oral and topical treatments are unsuitable in pregnancy',
            'Dryness, irritation and sun sensitivity are common with creams; tablets and procedures carry their own side effects',
            'Procedures on brown skin can cause temporary darkening or lightening, so they are planned cautiously',
        ], false) ?>
      </div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Treatment at the Rohini clinic is carried out by registered medical practitioners. Every doctor at DenceSpot is listed below with qualifications and registration details.',
    '',
    false
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Skin Treatment in Rohini: FAQs</h2>
        <p class="body-s mt-3">General patient education. What suits your skin is decided at the consultation.</p>
        <a class="btn btn--accent mt-4" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask the Rohini Clinic</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'Visit Our Rohini Clinic',
    'Skin consultations, treatment and review visits take place at our clinic in Rohini, North-West Delhi. Skin treatment is also available at our Sector 39 clinic in Gurugram, ' . NAP_LANDMARK . '.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= cta_band(
    'Book a Skin Consultation in Rohini',
    'Bring your products and your questions. The consultation is for working out what the skin problem is, what is worth trying, how long it should take and what treatment cannot do.',
    'rohini-skin',
    ['Skin care', 'Acne or acne marks', 'Pigmentation or melasma', 'Face PRP', 'Not sure — please advise'],
    'Delhi (Rohini)'
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
