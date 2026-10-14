<?php
/**
 * /skin-treatment-in-rohini — October 2026.
 *
 * Rohini (Delhi) skin treatment page. The agency confirmed on 13 Oct 2026
 * that skin treatment is carried out at the Rohini clinic. This page takes
 * its own angle so it does not duplicate the other-city page: what to bring,
 * what the Rohini consultation involves, short condition-by-condition notes,
 * and follow-up visits close to home.
 *
 * Client rule (14 Oct 2026): a Rohini page does not mention the other clinic
 * or link to any URL containing its city name. Landing-page layout:
 * lp_split / lp_steps / lp_cta (includes/home-components.php).
 *
 * Not on record, so NOT stated: which doctor consults at Rohini, which skin
 * procedures are offered (a marked missing_fact() below), the street address,
 * prices, devices or brands, travel times. Not yet reviewed by the clinic's
 * doctor: doctor_block(..., false), no "medically reviewed" line, not in
 * MEDICAL_PAGES.
 *
 * 14 Oct 2026 (SEO round 2): retitled for acne / pigmentation / melasma
 * searches; H2 sections for acne and acne marks, and for pigmentation and
 * melasma (each with its limits); a "what is checked" column in the table;
 * Delhi-seasons notes; questions worth asking any clinic; 15 FAQs.
 * "Dermatologist" is used only generically: no dermatologist is on record as
 * consulting at Rohini.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'Is skin treatment done at the Rohini clinic, or only the consultation?',
     'a' => 'Both. Skin consultations and treatment are carried out at the Rohini clinic, and review visits can be booked there too.'],
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
    ['q' => 'How long does acne treatment take to work?',
     'a' => 'Acne treatment is usually first judged at about two to three months, because creams and tablets take weeks to change how the skin behaves, and some people notice dryness or a brief flare early on. Stopping everything as soon as the skin clears is a common reason for relapse, so a lighter maintenance routine usually follows.'],
    ['q' => 'Can acne marks be treated?',
     'a' => 'Flat red or brown marks usually fade over months once the acne is controlled, helped by daily sunscreen and pigment-reducing creams. Pitted or raised scars are a separate problem: they are assessed once the acne has settled, and they improve rather than disappear.'],
    ['q' => 'Why does melasma keep coming back?',
     'a' => 'Melasma is driven by sun, heat and hormones, and those triggers are still there when the patches fade. That is why it tends to recur, and why daily sunscreen and a maintenance plan continue after the first course. Lightening is judged over months, not weeks.'],
    ['q' => 'Do I need blood tests for acne or pigmentation?',
     'a' => 'Most people need none. Tests are advised for a reason, for example acne with irregular periods, before some oral medicines, or darkening of the skin that hints at an internal cause.'],
    ['q' => 'Can I send photos on WhatsApp before I visit?',
     'a' => 'Yes. Clear daylight photos of the affected skin, without makeup, can be sent to the Rohini clinic on WhatsApp on ' . LOC_DELHI_PHONE_DISPLAY . '. They help decide what kind of appointment to book, but a diagnosis and a prescription need an examination in person.'],
    ['q' => 'Which side effects should I report straight away?',
     'a' => 'Marked redness, swelling, blistering, a spreading rash, or new darker or lighter patches after a cream or procedure. Contact the Rohini clinic on ' . LOC_DELHI_PHONE_DISPLAY . ' rather than waiting for your review. Mild dryness and stinging in the first weeks of a cream are common, and how it is used can usually be adjusted.'],
    ['q' => 'What are the Rohini clinic’s opening hours?',
     'a' => 'The Rohini clinic is open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . '). Review visits are booked at the same clinic.'],
    ['q' => 'How much does skin treatment cost in Rohini?',
     'a' => 'It depends on the diagnosis and on what the plan includes, so it is explained after the consultation, and any procedure is quoted in writing before it is booked. See <a href="/cost-and-emi-options">cost and payment options</a>.'],
    ['q' => 'Is EMI available for skin treatment?',
     'a' => 'Instalment options through third-party lenders may be available — ask at the consultation. How medical EMI works is explained on the <a href="/cost-and-emi-options">cost and EMI options</a> page.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Skin treatment in Rohini'],
];

$page = [
    'title'         => 'Skin Treatment in Rohini: Acne, Pigmentation & Melasma',
    'description'   => 'Skin treatment in Rohini, North-West Delhi, for acne, acne marks, pigmentation and melasma: what is checked, what treatment involves and its honest limits.',
    'url'           => '/skin-treatment-in-rohini',
    'crumbs'        => $crumbs,
    'preload_image' => '/assets/img/services/svc-skin-768.webp',
    'schema'        => [
        schema_delhi_clinic(),
        schema_breadcrumbs($crumbs),
        schema_therapy('/skin-treatment-in-rohini', [
            'name'              => 'Skin Treatment',
            'alternateName'     => ['Dermatology consultation for skin concerns', 'Skin treatment in Rohini, Delhi', 'Acne, pigmentation and melasma treatment'],
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
        <span class="pill pill--dot">Rohini, Delhi</span>
        <h1 class="h1 mt-3">Skin Treatment in Rohini for Acne, Pigmentation and Melasma</h1>
        <p class="lead mt-3 measure">Skin treatment is carried out at our Rohini clinic in North-West Delhi. It starts with a consultation with a registered medical practitioner about the concern you came in with, whether acne, the marks it leaves, pigmentation, melasma, dry or sensitive skin, or a problem linked to hair, and it continues with review visits you can attend without crossing the city.</p>

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
          <p class="eyebrow">Rohini Clinic</p>
          <p class="h4 mt-1"><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></p>
          <p class="meta"><?= e(HOURS_DISPLAY) ?> · <?= e(HOURS_NOTE) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= lead_strip() ?>

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

<?= lp_split([
    'img'     => 'svc-follicle',
    'alt'     => 'a sculpted cross-section of skin showing hair follicles beneath the surface',
    'eyebrow' => 'Acne',
    'title'   => 'Acne and Acne Marks',
    'id'      => 'acne',
    'tone'    => 'white',
    'html'    => '<h3 class="h4">Active acne</h3>'
               . '<p>Acne starts in the hair follicle and its oil gland, which is why it clusters on the face, chest and back. The type of spots, where they sit and whether they are scarring decide the treatment: prescription creams for milder acne, with tablets added for moderate, severe or scarring acne. Acne with irregular periods may need blood tests to look for a hormonal cause.</p>'
               . '<h3 class="h4">Acne marks and scars</h3>'
               . '<p>Flat red or brown marks are not scars. They fade over months once the acne is controlled and the skin is protected from the sun. <a href="/blog/acne-scars-treatment-options">Pitted or raised scars</a> are different: they are assessed once the acne has settled, and procedures are considered only where suitable.</p>',
    'points'  => [
        'Acne treatment is first judged at about two to three months, not in the first fortnight',
        'Creams often cause dryness and irritation at first; tell the clinic rather than stopping',
        'A lighter maintenance routine usually follows the first course',
        'Scars improve rather than disappear, and picking spots makes marks more likely',
    ],
]) ?>

<?= lp_split([
    'img'     => 'step-followup',
    'alt'     => 'a desk calendar with dates circled beside a small succulent and a pen',
    'eyebrow' => 'Pigmentation',
    'title'   => 'Pigmentation and Melasma',
    'id'      => 'pigmentation',
    'tone'    => 'canvas',
    'reverse' => true,
    'html'    => '<h3 class="h4">Pigmentation</h3>'
               . '<p>Darker patches have many causes: marks left by acne or eczema, sun damage, friction, a reaction to a cream or medicine, and occasionally an internal cause. The pattern, the history and a close look at the skin usually show which one it is, and treating the cause matters as much as treating the colour.</p>'
               . '<h3 class="h4">Melasma</h3>'
               . '<p>Melasma is a symmetrical brown patchiness on the cheeks, forehead, nose or upper lip, <a href="/blog/melasma-causes-and-treatment">linked with sun, heat and hormones</a>, including pregnancy and some contraceptive pills. Treatment means sunscreen every day, prescription creams in courses and then maintenance. It can be lightened and kept under control, but it tends to return.</p>',
    'points'  => [
        'Pigmentation is judged over weeks to months, later than acne',
        'Melasma recurs: sun protection and maintenance continue after it fades',
        'Daily sunscreen, reapplied outdoors, is part of every plan',
        'Creams bought without a prescription, including some “fairness” creams, can contain strong steroids that harm the skin over time',
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-hair-fall',
    'alt'     => 'a wooden comb resting on folded linen towels by a window',
    'eyebrow' => 'Before your visit',
    'title'   => 'What to Bring to Your Rohini Skin Consultation',
    'tone'    => 'white',
    'html'    => '<p>A skin consultation is most useful when the doctor can see what your skin has been exposed to. Come with bare skin if you can: makeup hides the pattern of acne and pigmentation, which is often what points to the diagnosis.</p>'
               . '<p>If you have been using a strong steroid cream, mention it rather than stopping it suddenly the night before; some skin conditions flare when a steroid is withdrawn abruptly, and the doctor can plan how to come off it. Say if you are pregnant, planning a pregnancy or breastfeeding, as several skin medicines are avoided at those times.</p>',
    'points'  => [
        'Every product you use on your skin, or clear photos of the labels, including soap and sunscreen',
        'Any cream bought from a chemist or online, especially “pimple” or “fairness” creams',
        'Earlier prescriptions and test reports from previous skin treatment',
        'A list of the medicines and supplements you take',
        'Photos of a flare, if the problem comes and goes',
    ],
]) ?>

<?= lp_steps([
    'eyebrow' => 'At the Rohini clinic',
    'title'   => 'What to Expect at the Consultation',
    'intro'   => 'No treatment is decided until the skin has been looked at properly. A first consultation usually covers four things.',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                            'title' => 'Your concern, in your words',          'text' => 'What bothers you most, how long it has been there, what has been tried, and what made it better or worse. The diagnosis often starts here.'],
        ['img' => 'hero',              'alt' => 'a sculpted cross-section of skin showing hair follicles beneath the surface', 'title' => 'A close look at the skin',  'text' => 'Examination of the affected areas, including the chest and back for acne, or the scalp where flaking or itching is part of the picture.'],
        ['img' => 'step-procedure',    'alt' => 'sterile instruments laid out on a tray',                         'title' => 'Tests, if they would change the plan', 'text' => 'Most people need none. Blood tests are advised for a reason, for example acne with irregular periods, before some oral medicines, or darkening of the skin that hints at an internal cause.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned line',            'title' => 'A written plan and a review date',     'text' => 'What to apply and in what order, which side effects are expected, and when to come back to the Rohini clinic to check progress.'],
    ],
]) ?>

<section class="section section--white" id="conditions">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Condition by condition</p>
      <h2 class="h2 mt-2">Skin Concerns at a Glance</h2>
      <p class="body mt-3">What is checked at the consultation, what treatment usually involves and what to expect, for the concerns people most often bring to a skin clinic.</p>
    </div>
    <div class="card mt-6" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data" style="min-width:760px">
          <caption class="sr-only">Common skin concerns: what is checked, what treatment usually involves and what to expect. General patient education, not a treatment plan.</caption>
          <thead>
            <tr><th scope="col">Concern</th><th scope="col">What is checked</th><th scope="col">What treatment usually involves</th><th scope="col">What to expect</th></tr>
          </thead>
          <tbody>
            <tr><th scope="row" style="white-space:normal;min-width:120px">Active acne</th><td>Type of spots, where they are, any scarring, periods, medicines and products used</td><td>Prescription creams; tablets for moderate, severe or scarring acne; a simple routine</td><td>First judged at about two to three months. Picking spots raises the risk of marks.</td></tr>
            <tr><th scope="row" style="white-space:normal;min-width:120px">Marks after acne</th><td>Whether the marks are flat or pitted, and whether acne is still active</td><td>Controlling the acne, daily sunscreen, pigment-reducing creams</td><td>Flat marks fade gradually over months; sun and picking slow them down.</td></tr>
            <tr><th scope="row" style="white-space:normal;min-width:120px">Acne scars</th><td>The type and depth of the scars, once acne is under control</td><td>Assessed once acne is under control; procedures where suitable</td><td>Pitted or raised scars improve rather than disappear.</td></tr>
            <tr><th scope="row" style="white-space:normal;min-width:120px">Pigmentation</th><td>The pattern of the patches, sun exposure, friction, creams and medicines used</td><td>Treating the cause, daily sunscreen and, where suitable, pigment-reducing creams</td><td>Fades over weeks to months; the cause needs managing too.</td></tr>
            <tr><th scope="row" style="white-space:normal;min-width:120px">Melasma</th><td>The pattern on the face, sun exposure, hormones, pregnancy plans and creams used</td><td>Sunscreen every day, prescription creams in courses, then maintenance</td><td>Lightens over months but tends to return with sun, heat and hormones.</td></tr>
            <tr><th scope="row" style="white-space:normal;min-width:120px">Dry or sensitive skin</th><td>Products used, and signs of eczema, rosacea or a product allergy</td><td>Finding the cause and repairing the skin barrier</td><td>Often settles over weeks; fewer products is usually part of the answer.</td></tr>
            <tr><th scope="row" style="white-space:normal;min-width:120px">Ingrown hairs and razor bumps</th><td>How hair is removed, inflammation and the marks left</td><td>Changes to how hair is removed, treatment of the inflammation and of the marks left</td><td>Common in the beard area and after waxing; marks take months to fade.</td></tr>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">These are general notes, not a plan. Two people with the same diagnosis can need quite different treatment, and what suits you is decided at the consultation.</p>
    <div class="note mt-5">
      <p class="h4">If a procedure is mentioned</p>
      <p class="body-s mt-2">A procedure is discussed only after the diagnosis, and only alongside medical treatment, not instead of it.</p>
      <p class="body-s mt-2">Skin procedures offered at the clinic: <?= missing_fact('list of skin procedures offered at the clinic') ?></p>
      <p class="body-s mt-2">Face PRP is one of the clinic’s skin treatments. How it works, and what it will not do, is explained on the <a href="/face-prp-treatment-in-rohini">face PRP page</a>.</p>
    </div>
  </div>
</section>

<?= lp_highlights([
    'eyebrow' => 'Skin in Delhi',
    'title'   => 'Looking After Your Skin Through the Delhi Year',
    'intro'   => 'Delhi’s seasons change what the skin needs. These are general points; your own plan is adjusted at the consultation.',
    'tone'    => 'canvas',
    'items'   => [
        ['icon' => 'shield',   'title' => 'Summer sun and heat',        'text' => 'Strong sun and heat darken melasma and acne marks. Use sunscreen daily and reapply it outdoors; shade and a hat help as much as any cream.'],
        ['icon' => 'calendar', 'title' => 'Humid monsoon months',       'text' => 'Sweat rashes and fungal infections in skin folds are more common. Keep those areas dry, and have a new rash checked before treating it yourself.'],
        ['icon' => 'pin',      'title' => 'Riding and commuting',       'text' => 'Sweat trapped under a helmet, mask or tight collar can aggravate acne on the forehead, jaw and chin. Wash after a hot commute and keep helmet padding clean.'],
        ['icon' => 'layers',   'title' => 'Winter and the smog season', 'text' => 'Dry air and hot showers leave many people with drier, more irritable skin. Cleanse gently at the end of the day, use a plain moisturiser and leave scrubs alone.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-followup',
    'alt'     => 'a desk calendar with dates circled, beside a small plant',
    'eyebrow' => 'After the first visit',
    'title'   => 'Follow-Up Visits Close to Home',
    'tone'    => 'white',
    'reverse' => true,
    'html'    => '<p>Skin treatment is rarely one appointment. Creams are adjusted when they irritate, oral medicines are monitored, and melasma needs a maintenance plan once it has faded. With the clinic in Rohini, those reviews are close to home, which makes the schedule easier to keep.</p>'
               . '<p><b>Between visits:</b> if a treatment causes marked redness, swelling, blistering or a rash, contact the Rohini clinic on <a href="tel:' . e(LOC_DELHI_PHONE_E164) . '" data-track="call">' . e(LOC_DELHI_PHONE_DISPLAY) . '</a> rather than waiting for your review.</p>',
    'points'  => [
        'An early check a few weeks in looks at how the skin is tolerating treatment, so a cream that stings can be adjusted rather than abandoned',
        'Acne treatment is usually judged at two to three months, pigmentation later, against photographs from the first visit taken with your consent',
        'Acne and melasma often need a lighter, ongoing routine after the first course; stopping everything as soon as the skin looks better is a common reason for relapse',
    ],
]) ?>

<section class="section section--canvas" id="questions">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Before you start</p>
      <h2 class="h2 mt-2">Questions Worth Asking Any Skin Clinic</h2>
      <p class="body mt-3">Whether you see a dermatologist or another doctor, these questions help you understand a plan before you commit to it. A clear answer to each is a reasonable thing to expect, here or anywhere else.</p>
    </div>
    <div class="card card--pad-lg mt-5">
      <?= ticks([
          'What is my diagnosis, and what else could it be?',
          'What does each product do, and in what order do I use it?',
          'Which side effects are expected, and which should I report?',
          'When will we judge whether it is working?',
          'Is any of this unsuitable in pregnancy or while breastfeeding?',
          'If a procedure is suggested, why now, and what is the risk of darkening on my skin?',
          'What will the whole plan cost, including reviews and products?',
          'What happens when the course ends: is there a maintenance plan?',
      ]) ?>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-consultation',
    'alt'     => 'a dermatoscope and notepad on a wooden desk beside a fern',
    'eyebrow' => 'Honest limits',
    'title'   => 'What to Keep in Mind Before Starting',
    'tone'    => 'white',
    'html'    => '<p>Skin treatment is slow and works within limits. These are the ones that matter most when deciding whether to begin.</p>',
    'points'  => [
        'Results vary from person to person, and no particular result can be promised',
        'Melasma recurs; sun protection and maintenance continue after it fades',
        'Acne scars improve rather than disappear',
        'Several oral and topical treatments are unsuitable in pregnancy',
        'Dryness, irritation and sun sensitivity are common with creams; tablets and procedures carry their own side effects',
        'Procedures on brown skin can cause temporary darkening or lightening, so they are planned cautiously',
    ],
]) ?>

<?= doctor_block(
    'Treatment at the Rohini clinic is carried out by registered medical practitioners. Every doctor at DenceSpot is listed below with their qualifications.',
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
    'Skin consultations, treatment and review visits take place at our clinic in Rohini, North-West Delhi, near the Outer Ring Road.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= lp_cta([
    'eyebrow'   => 'Rohini, Delhi',
    'title'     => 'Book a Skin Consultation in Rohini',
    'text'      => 'Bring your products and your questions. The consultation is for working out what the skin problem is, what is worth trying, how long it should take and what treatment cannot do.',
    'treatment' => 'Skin care',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
