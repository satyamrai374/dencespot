<?php
/**
 * /skin-treatment-in-gurgaon — October 2026.
 *
 * The homepage's "Skin & Hair Care" card and the booking option 'Skin care'
 * point here. The clinic is led by a dermatologist (DOCTORS['dr-nyra']), but
 * which skin procedures it offers is NOT on record, apart from face PRP, which
 * has its own page. So this page is framed around a dermatology consultation
 * for common skin concerns and the general categories of treatment, and the
 * procedure list is a marked missing_fact() until the clinic supplies it. Do
 * not name a procedure as offered here without that confirmation.
 *
 * Not yet reviewed by the clinic's doctor: doctor_block(..., false), no
 * "medically reviewed" line, not in MEDICAL_PAGES. No prices, no product or
 * brand names, no before/after images (NMC Guidelines 06.10.2026, cl. 8.1).
 *
 * Twin page: /skin-treatment-in-rohini (Rohini, Delhi clinic).
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'Will my acne scars go away completely?',
     'a' => 'Usually not. Pitted or raised acne scars are a change in the structure of the skin; treatment aims to make them less noticeable, not to remove them. Flat brown or red marks left after spots are not true scars, and many fade over months once acne is controlled and the skin is protected from the sun.'],
    ['q' => 'Can melasma be cured?',
     'a' => 'Melasma can usually be lightened and kept under control, but it tends to come back, particularly with sun, heat and hormonal change. Treatment is a long-term plan: daily sun protection, prescription treatment in courses, and a gentler maintenance routine once the patches have faded.'],
    ['q' => 'How long before I see a difference?',
     'a' => 'Weeks to months. Most acne treatments need two to three months of regular use before they can be judged fairly, and pigmentation usually fades more slowly. Skin often feels drier in the first weeks of a new prescription, which is one reason a review is planned from the start.'],
    ['q' => 'I am pregnant or breastfeeding. Can I still be treated?',
     'a' => 'Some skin treatments are unsuitable in pregnancy or while breastfeeding, including certain oral acne medicines, some creams and some pigmentation treatments. Others are considered acceptable. Tell the doctor if you are pregnant, trying to conceive or breastfeeding, and the plan is built around it.'],
    ['q' => 'How much does skin treatment cost?',
     'a' => 'It depends on the diagnosis and the plan; a prescription-based plan and one that includes an in-clinic procedure are costed differently, and any procedure is quoted in writing before it is booked. See <a href="/cost-and-emi-options">cost and payment options</a>.'],
    ['q' => 'Is skin treatment also available at the Rohini clinic?',
     'a' => 'Yes. Skin consultations and treatment are carried out at both clinics, in Sector 39, Gurugram and in Rohini, Delhi. See <a href="/skin-treatment-in-rohini">skin treatment in Rohini</a>.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Skin treatment'],
];

$page = [
    'title'         => 'Skin Treatment in Gurgaon (Gurugram) | DenceSpot Clinic',
    'description'   => 'Skin treatment in Gurgaon that starts with a dermatology consultation: acne and acne scars, pigmentation, melasma, dry or sensitive skin, timelines and limits.',
    'url'           => '/skin-treatment-in-gurgaon',
    'crumbs'        => $crumbs,
    'preload_image' => '/assets/img/services/svc-skin-768.webp',
    'schema'        => [
        schema_clinic(),
        schema_breadcrumbs($crumbs),
        schema_therapy('/skin-treatment-in-gurgaon', [
            'name'              => 'Skin Treatment',
            'alternateName'     => ['Dermatology consultation for skin concerns', 'Acne treatment', 'Pigmentation and melasma treatment'],
            'relevantSpecialty' => 'https://schema.org/Dermatology',
            'bodyLocation'      => 'Skin',
            'howPerformed'      => 'A consultation with a registered medical practitioner covering history, examination and investigations where indicated, followed by a written plan that may include prescription topical or oral medicines, sun protection, skincare routine advice and, where suitable, an in-clinic procedure.',
            'preparation'       => 'Review of the skin concern, products and medicines in use, pregnancy and breastfeeding status, and relevant medical history.',
            'followup'          => 'Review visits to assess response and side effects, with treatment adjusted and a maintenance plan where needed, for example for melasma.',
            'expectedPrognosis' => 'Response is judged over weeks to months. Melasma tends to recur and needs maintenance and sun protection; acne scars improve rather than disappear. Some treatments are unsuitable in pregnancy, and side effects can occur. Outcomes vary between patients and cannot be promised.',
            'performer'         => null,
        ]),
        schema_faq('/skin-treatment-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Skin treatment · Sector 39, Gurugram</span>
        <h1 class="h1 mt-3">Skin Treatment in Gurgaon, Starting With a Dermatology Consultation</h1>
        <p class="lead mt-3 measure">Acne, acne marks, pigmentation, melasma, uneven tone, dryness and sensitivity each have more than one cause, and the right treatment depends on which one you have. At our Sector 39 clinic in Gurugram, <?= e(NAP_LANDMARK) ?>, skin treatment begins with a consultation: your skin is examined, what you have already tried is reviewed, and you leave with a plan.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-treatment="Skin care" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Examined by a registered medical practitioner',
            'Diagnosis before any prescription or procedure',
            'A written plan with a review date',
            'Also available at our Rohini, Delhi clinic',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-skin-768.webp" srcset="/assets/img/services/svc-skin-512.webp 512w, /assets/img/services/svc-skin-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a sculpted cross-section of skin layers with a single hair follicle and a coiled gland, on a pale circular background" width="768" height="960" loading="eager" fetchpriority="high">
          <?= /* top of the image: at the bottom it sits under the badge card on phones */ str_replace('class="hp-ai-chip"', 'class="hp-ai-chip" style="top:12px;bottom:auto"', hp_ai_chip('AI-generated illustration')) ?>
        </div>
        <div class="hero__badge-card">
          <p class="eyebrow">Clinic 1 · Gurugram</p>
          <p class="h4 mt-1"><a href="tel:<?= e(PHONE_E164) ?>" data-track="call"><?= e(PHONE_DISPLAY) ?></a></p>
          <p class="meta"><?= e(HOURS_DISPLAY) ?> · <?= e(HOURS_NOTE) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="trust">
  <div class="wrap">
    <div class="grid grid--4">
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Diagnosis first</p><p class="meta mt-1">The cause is identified before anything is prescribed.</p></div>
      <div class="card"><?= icon('doc', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Plan in writing</p><p class="meta mt-1">What to use, what to stop, when to come back.</p></div>
      <div class="card"><?= icon('clock', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Realistic timelines</p><p class="meta mt-1">Most skin treatment is judged in months, not days.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Registered doctors</p><p class="meta mt-1">Consultations by registered medical practitioners.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="concerns">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">What a consultation covers</p>
      <h2 class="h2 mt-2">Common Skin Concerns We Assess</h2>
      <p class="body mt-3">Many people book with one concern and turn out to have two: acne with the marks it leaves, or pigmentation made worse by the creams used on it. These are the concerns seen most often.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--tint card--pad-lg"><h3 class="h3">Acne</h3><p class="body-s mt-2">Blackheads, whiteheads, inflamed spots and deeper, painful lumps on the face, chest or back. In adult women, acne along the jaw sometimes comes with irregular periods, which changes the plan. Treatment depends on the type, the severity and whether it is scarring.</p></div>
      <div class="card card--tint card--pad-lg"><h3 class="h3">Acne marks and scars</h3><p class="body-s mt-2">Flat brown or red marks left after spots are not scars, and many fade over months once acne is controlled. Pitted or raised scars change the skin’s texture: treatment can make them less noticeable, not erase them.</p></div>
      <div class="card card--tint card--pad-lg"><h3 class="h3">Pigmentation and melasma</h3><p class="body-s mt-2">Melasma shows as brown patches on the cheeks, forehead or upper lip, driven by sunlight, heat and hormones; it can be lightened and controlled but tends to return. Velvety darkening on the neck can point to a medical cause worth checking.</p></div>
      <div class="card card--tint card--pad-lg"><h3 class="h3">Uneven tone and dull skin</h3><p class="body-s mt-2">Often the sum of sun exposure, old marks and a dry, irritated surface rather than one condition. Sometimes the most useful advice is to stop several products and use sunscreen properly.</p></div>
      <div class="card card--tint card--pad-lg"><h3 class="h3">Dry and sensitive skin</h3><p class="body-s mt-2">Stinging, redness and flaking can come from eczema, rosacea, a product allergy, or a skin barrier worn down by too many active ingredients. The cause decides the treatment.</p></div>
      <div class="card card--tint card--pad-lg"><h3 class="h3">Skin concerns linked to hair</h3><p class="body-s mt-2">An itchy or flaky scalp, inflamed hair follicles, and ingrown hairs or razor bumps after shaving or waxing, which often leave dark marks. See <a href="/dandruff-treatment-in-gurgaon">dandruff treatment in Gurgaon</a>.</p></div>
    </div>
    <div class="note mt-6">
      <p class="h4">Using a cream bought from a chemist or online?</p>
      <p class="body-s mt-2">Bring it to the consultation. Some “pimple” and “fairness” creams contain strong steroids, which, used without supervision, can thin the skin, trigger acne-like spots and make pigmentation worse.</p>
    </div>
  </div>
</section>

<section class="section section--canvas" id="assessment">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">At the consultation</p>
      <h2 class="h2 mt-2">What Happens at a Skin Consultation</h2>
      <p class="body mt-3">The aim is a diagnosis and a plan you can actually follow, not a bag of products. It usually runs in this order.</p>
    </div>
    <div class="split split--wide-left mt-6" style="align-items:start">
      <div class="stack-sm">
        <div class="step"><span class="step-num">1</span><div><h3 class="h3">History</h3><p class="body-s mt-2">How long the problem has been there, what makes it worse, and everything already used, including home remedies and creams bought online. Your medicines and, where relevant, periods, pregnancy plans or breastfeeding.</p></div></div>
        <div class="step"><span class="step-num">2</span><div><h3 class="h3">Examination</h3><p class="body-s mt-2">The skin is examined in good light, sometimes under magnification, to identify the type of acne, the likely depth of pigmentation or the pattern of a rash.</p></div></div>
        <div class="step"><span class="step-num">3</span><div><h3 class="h3">Tests, only where needed</h3><p class="body-s mt-2">Most skin concerns need none. Blood tests may be advised for acne with irregular periods or excess hair growth, before certain oral medicines, or when dark patches suggest an underlying cause.</p></div></div>
        <div class="step"><span class="step-num">4</span><div><h3 class="h3">Photographs, with your consent</h3><p class="body-s mt-2">Taken in the same position and light each time, so progress is judged against a record rather than the bathroom mirror.</p></div></div>
        <div class="step"><span class="step-num">5</span><div><h3 class="h3">A written plan</h3><p class="body-s mt-2">What to apply and when, what to stop, which side effects to expect in the first weeks, and when to come back for review.</p></div></div>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow" style="color:var(--ink-muted)">Worth asking at any skin consultation</p>
        <div class="mt-3"><?= ticks([
            'What is the diagnosis, in plain words?',
            'How long before we judge whether this is working?',
            'Which side effects are expected, and which mean I should stop?',
            'Is any of this unsuitable if I become pregnant?',
            'Will I need maintenance once the course ends?',
        ], false) ?></div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="options">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Treatment options</p>
      <h2 class="h2 mt-2">What a Dermatologist May Recommend</h2>
      <p class="body mt-3">Treatment is matched to the diagnosis, and most plans combine more than one of the following. Not everyone needs all of them, and some people need little more than a simpler routine.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="card card--pad-lg"><h3 class="h3">Prescription creams and gels</h3><p class="body-s mt-2">The first step for most acne and pigmentation: retinoids, antibacterial and anti-inflammatory agents for acne, and pigment-reducing agents for melasma, each used for a defined period and reviewed. Early dryness and irritation are common and usually manageable.</p></div>
      <div class="card card--pad-lg"><h3 class="h3">Medicines taken by mouth</h3><p class="body-s mt-2">Considered for moderate or severe acne, scarring acne, or acne that has not responded to creams: a limited course of antibiotics, hormonal treatment for some women, or an oral retinoid, which needs blood tests and must not be taken in pregnancy. Side effects are explained before you start.</p></div>
      <div class="card card--pad-lg"><h3 class="h3">Sun protection</h3><p class="body-s mt-2">Not an optional extra: without it, pigmentation treatment tends not to hold. A broad-spectrum sunscreen every day, reapplied outdoors, plus shade and covering. For melasma, a tinted sunscreen can help, because visible light also darkens it.</p></div>
      <div class="card card--pad-lg"><h3 class="h3">Skincare routine advice</h3><p class="body-s mt-2">Often fewer products, not more: a gentle cleanser, a suitable moisturiser and a sunscreen, with any active ingredient added one at a time. Stopping what irritates the skin can do as much as anything prescribed.</p></div>
    </div>
    <div class="card card--tint card--pad-lg mt-4">
      <h3 class="h3">In-clinic procedures, where suitable</h3>
      <p class="body-s mt-2">For some concerns a procedure may be added to medical treatment, never in place of it, and usually once active acne or irritation is under control.</p>
      <p class="body-s mt-2">Skin procedures offered at the clinic: <?= missing_fact('list of skin procedures offered at the clinic') ?></p>
      <p class="body-s mt-2">Face PRP, used for skin texture and quality, is offered and has its own page, including what it does not do: <a href="/face-prp-treatment-in-gurgaon">face PRP treatment in Gurgaon</a>.</p>
    </div>
  </div>
</section>

<section class="section section--canvas" id="limits">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Before you start</p>
      <h2 class="h2 mt-2">What Skin Treatment Can and Cannot Do</h2>
      <p class="body mt-3">Skin treatment helps many people, but slowly and within limits. Knowing them beforehand saves money and disappointment.</p>
    </div>
    <div class="split mt-6" style="align-items:start">
      <div class="stack">
        <div>
          <h3 class="h3">Results take weeks to months</h3>
          <p class="body mt-2">Most treatments are judged over two to three months, pigmentation often longer. Switching products every fortnight is one of the commonest reasons a treatment seems not to work.</p>
        </div>
        <div>
          <h3 class="h3">Melasma comes back</h3>
          <p class="body mt-2">It can be lightened and controlled, but sun, heat, hormonal change and pregnancy can bring it back, so maintenance and sun protection continue after the patches fade. Over-aggressive treatment can make pigmentation in brown skin worse.</p>
        </div>
        <div>
          <h3 class="h3">Acne scars improve rather than disappear</h3>
          <p class="body mt-2">The realistic goal is scars that are less noticeable in ordinary light, reached over a course of treatment and only once active acne is controlled.</p>
        </div>
      </div>
      <div class="stack">
        <div class="card card--pad-lg">
          <p class="h4">Unsuitable in pregnancy</p>
          <p class="body-s mt-2">Some oral acne medicines, some retinoid creams, certain antibiotics and some pigmentation treatments should not be used in pregnancy or while trying to conceive, and some are avoided while breastfeeding. Tell the doctor at the start.</p>
        </div>
        <div class="card card--pad-lg">
          <p class="h4">Side effects exist</p>
          <div class="mt-3"><?= ticks([
              'Dryness, peeling and stinging with many creams',
              'Greater sensitivity to the sun',
              'Effects specific to each oral medicine, explained before you start',
              'Redness, darkening or lightening after some procedures, more likely in brown skin',
              'Uncommonly, infection or an allergic reaction',
          ], false) ?></div>
        </div>
      </div>
    </div>
    <p class="body-s mt-5 measure">No skin outcome can be promised. The same treatment can help one person a great deal and another only modestly.</p>
  </div>
</section>

<section class="section section--white" id="skin-and-hair">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Skin, hair and face PRP</p>
      <h2 class="h2 mt-2">Where Skin and Hair Concerns Overlap</h2>
      <p class="body mt-3">DenceSpot treats hair loss as well as skin, and the two often meet. A flaky, itchy scalp may be seborrhoeic dermatitis, psoriasis or a reaction to a hair product, and ingrown hairs in the beard area or after waxing can leave dark marks that outlast the bumps. Each is treated as a skin problem first.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card"><h3 class="h4">Scalp flaking and itch</h3><p class="body-s mt-2">Dandruff, seborrhoeic dermatitis and their look-alikes, and why washing harder rarely helps. See <a href="/dandruff-treatment-in-gurgaon">dandruff treatment</a>.</p></div>
      <div class="card"><h3 class="h4">Hair fall</h3><p class="body-s mt-2">If shedding is part of the concern, its cause is investigated in its own right. See <a href="/hair-fall-treatment-in-gurgaon">hair fall treatment</a>.</p></div>
      <div class="card"><h3 class="h4">Face PRP</h3><p class="body-s mt-2">Your own platelets, used for skin texture and quality. Limited evidence, not for active acne or lost volume. See <a href="/face-prp-treatment-in-gurgaon">face PRP</a>.</p></div>
    </div>
    <p class="body mt-6 measure">If North or North-West Delhi is closer, skin consultations and treatment are also carried out at our second clinic: see <a href="/skin-treatment-in-rohini">skin treatment in Rohini, Delhi</a>.</p>
  </div>
</section>

<?= doctor_block(
    'Skin consultations and treatment are carried out by registered medical practitioners. DenceSpot is led by a dermatologist, and every doctor at the clinic is listed below with qualifications and registration details.',
    '',
    false
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Skin Treatment FAQs</h2>
        <p class="body-s mt-3">General patient education. What suits your skin is decided at the consultation.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'Skin Treatment at Our Two Clinics',
    'Skin consultations and treatment take place at our Sector 39 clinic in Gurugram, ' . NAP_LANDMARK . ', and at our clinic in Rohini, Delhi. Choose whichever is easier to reach; both are open Monday to Saturday.'
) ?>

<?= cta_band(
    'Get a Diagnosis Before You Buy Another Product',
    'Bring your skin, your current products and your questions, and leave with a working diagnosis, a plan you can follow, a realistic timeline and a clear idea of what treatment cannot do.',
    'skin-treatment',
    ['Skin care', 'Acne or acne marks', 'Pigmentation or melasma', 'Face PRP', 'Not sure — please advise']
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
