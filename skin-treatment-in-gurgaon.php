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
 * Twin page: /skin-treatment-in-rohini. Not linked from here: a Gurugram page
 * does not mention the Rohini clinic (client rule, 14 Oct 2026).
 * Landing-page layout: lp_split / lp_steps / lp_cta (includes/home-components.php).
 *
 * 14 Oct 2026 (SEO round 4): retitled for acne / melasma / pigmentation
 * searches; a concern-by-concern table (what is checked, options that may be
 * discussed) inside #options, listing only treatments this page already names;
 * a Gurugram sun, heat, dust and smog section; "questions worth asking any
 * skin clinic" as its own section (the five questions that sat beside the
 * FAQs are folded into it); 16 FAQs. Written separately from the twin page:
 * reuse facts, not sentences.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/**
 * Concern → what is checked → options that may be discussed. Patient
 * education, not a diagnosis. Only treatments already named on this page:
 * prescription creams, oral medicines, sun protection, routine advice, an
 * in-clinic procedure where suitable (list still a missing_fact), face PRP,
 * laser hair removal.
 */
$concernRows = [
    ['Active acne',
     'Which kinds of spots you have (blackheads, inflamed spots or deep, painful lumps), where they are, whether they are scarring, and in women, periods and any excess hair growth',
     'Prescription creams or gels; where acne is moderate, severe or scarring, a limited course of antibiotics, hormonal treatment for some women, or an oral retinoid; a simpler routine'],
    ['Acne marks (flat, brown or red)',
     'Flat marks or pitted ones, whether new spots are still appearing, and how much sun the skin gets',
     'Getting the acne under control, daily sunscreen and, where suitable, a pigment-reducing cream; after that, mostly time'],
    ['Acne scars (pitted or raised)',
     'What kind of scars they are and how deep, whether acne is still active, and how readily your skin darkens after any injury',
     'Controlling active acne first; an in-clinic procedure may be discussed once it has settled, where suitable'],
    ['Melasma',
     'The pattern on the face, time spent in sun and heat, pregnancy, the contraceptive pill or other hormonal factors, and any steroid or “fairness” cream used',
     'Daily broad-spectrum sunscreen (a tinted one helps), prescription pigment-reducing creams in courses, then a maintenance routine'],
    ['Dark spots and other pigmentation',
     'Whether the patches followed sun, friction, a rash, a cream or a medicine; velvety darkening of the neck or skin folds may lead to blood tests',
     'Removing or managing the trigger, sunscreen every day, and a pigment-reducing cream if suitable'],
    ['Dull or uneven skin',
     'Sun habits, how many products and active ingredients are in use, dryness or irritation, and old marks',
     'A pared-back routine of cleanser, moisturiser and sunscreen, and treatment of any marks; face PRP may be discussed for texture, given its limited evidence'],
    ['Dry, sensitive or red skin',
     'Whether it looks like eczema, rosacea or an allergy to a product, or a skin barrier worn down by too many active ingredients',
     'Stopping whatever irritates, a plain moisturiser, and treatment for the condition found'],
    ['Ingrown hairs and razor bumps',
     'How the hair is removed (shaving, waxing or threading), inflammation around the hairs and the dark marks left behind',
     'Changing how the hair is removed, calming the inflammation and treating the marks; laser hair removal may be discussed'],
];

$faqs = [
    ['q' => 'What do I need to bring to a first skin appointment?',
     'a' => 'Every face wash, moisturiser, sunscreen, serum and cream you use, or photos of their labels, including anything bought over the counter or online. Add earlier prescriptions, test reports and the names of any medicines or supplements you are on, and come bare-faced if possible, since the pattern of spots or patches is part of the diagnosis. Bring any steroid cream along rather than abandoning it the evening before: coming off one abruptly can cause a flare, so the doctor plans how to reduce it.'],
    ['q' => 'How long does a skin consultation take?',
     'a' => 'It depends on the concern. A first consultation covers your history, an examination of the skin and a written plan, and runs longer if photographs are taken or tests are arranged. Review visits are usually shorter. Ask for a rough idea of timing when you book.'],
    ['q' => 'Can I WhatsApp photos of my skin first?',
     'a' => 'Yes. Photos taken in daylight, without makeup or filters, can be sent to the clinic on WhatsApp at ' . PHONE_DISPLAY . '. They help the clinic suggest the right kind of appointment, but they cannot replace an examination: a diagnosis and any prescription need the skin to be seen in person.'],
    ['q' => 'Do I need blood tests for a skin problem?',
     'a' => 'Usually not. Tests are suggested when the result could change the plan: acne with irregular periods or excess facial hair, which can point to a hormonal cause such as PCOS; before some oral acne medicines; or patches of darkening that could have an internal cause. Hormonal causes often affect the scalp too, which is covered under <a href="/womens-hair-loss-treatment-in-gurgaon">women’s hair loss treatment in Gurgaon</a>.'],
    ['q' => 'How long before I see a difference?',
     'a' => 'Weeks to months. Most acne treatments need two to three months of regular use before they can be judged fairly, and pigmentation usually fades more slowly. Skin often feels drier in the first weeks of a new prescription, which is one reason a review is planned from the start.'],
    ['q' => 'How many review visits will I need?',
     'a' => 'At least one. An early review a few weeks in checks how the skin is coping, so an irritating cream can be changed before you give up on it. Acne is judged properly at two to three months and pigmentation later, after which ongoing problems like acne and melasma move to a lighter maintenance plan with occasional reviews.'],
    ['q' => 'Will my acne scars go away completely?',
     'a' => 'Usually not. Pitted or raised acne scars are a change in the structure of the skin; treatment aims to make them less noticeable, not to remove them. Flat brown or red marks left after spots are not true scars, and many fade over months once acne is controlled and the skin is protected from the sun.'],
    ['q' => 'Can melasma be cured?',
     'a' => 'Melasma can usually be lightened and kept under control, but it tends to come back, particularly with sun, heat and hormonal change. Treatment is a long-term plan: daily sun protection, prescription treatment in courses, and a gentler maintenance routine once the patches have faded.'],
    ['q' => 'Will I need a patch test?',
     'a' => 'Not for most prescription creams, which are usually introduced gradually instead, for example on alternate nights at first. A small test area may be suggested before some procedures, particularly on darker or easily irritated skin. Before laser hair removal for ingrown hairs a patch test is usual; <a href="/blog/laser-hair-removal-patch-test">what a laser patch test checks</a> explains why.'],
    ['q' => 'How do I look after my skin in the Gurugram sun and heat during treatment?',
     'a' => 'Many acne and pigmentation treatments make the skin more sensitive to sunlight, so sunscreen goes on every morning and again after a couple of hours outdoors or a sweaty spell, with shade or a hat where you can. After the gym or a hot commute, wash off the sweat and change out of damp clothes. In the dusty months and the winter smog season, wash the day’s grime off gently each evening rather than scrubbing.'],
    ['q' => 'Which reactions mean I should call the clinic?',
     'a' => 'Blistering, swelling, a rash that spreads, or skin that turns noticeably darker or lighter after a cream or procedure. Call the clinic on ' . PHONE_DISPLAY . ' rather than waiting for your review. A new cream often dries, peels or stings for the first few weeks, and applying it less often usually settles that.'],
    ['q' => 'What happens if a treatment does not suit my skin?',
     'a' => 'It is changed rather than simply continued. A cream that irritates can be used less often, at a lower strength or swapped for another, and a medicine with side effects you cannot tolerate is stopped or replaced. If a procedure is not suitable for your skin type or the current state of your skin, it is not done and the medical plan carries on. Where the cause needs another doctor, for example a gynaecologist for suspected PCOS, you are told so.'],
    ['q' => 'I am pregnant or breastfeeding. Can I still be treated?',
     'a' => 'Some skin treatments are unsuitable in pregnancy or while breastfeeding, including certain oral acne medicines, some creams and some pigmentation treatments. Others are considered acceptable. Tell the doctor if you are pregnant, trying to conceive or breastfeeding, and the plan is built around it.'],
    ['q' => 'How much does skin treatment cost?',
     'a' => 'It depends on the diagnosis and the plan; a prescription-based plan and one that includes an in-clinic procedure are costed differently, and any procedure is quoted in writing before it is booked. See <a href="/cost-and-emi-options">cost and payment options</a>.'],
    ['q' => 'Can I pay for skin treatment in instalments (EMI)?',
     'a' => 'Paying in instalments through a third-party lender may be possible; ask about it at the consultation. The <a href="/cost-and-emi-options">guide to costs and EMI</a> explains how medical EMI generally works and what to check before signing up.'],
    ['q' => 'When is the Gurugram clinic open?',
     'a' => 'The Sector 39 clinic, ' . NAP_LANDMARK . ', is open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . '). Consultations and review visits both take place there, and the map link and directions are on the <a href="/contact">contact page</a>.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Skin treatment'],
];

$page = [
    'title'         => 'Skin Treatment in Gurgaon: Acne, Melasma & Pigmentation',
    'description'   => 'Skin treatment in Gurgaon, Sector 39: acne, acne marks, melasma, dark spots and dull skin. What the consultation checks, options by concern and the limits.',
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
            'At our clinic in Sector 39, Gurugram',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-skin-768.webp" srcset="/assets/img/services/svc-skin-512.webp 512w, /assets/img/services/svc-skin-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a cross-section of skin layers with a hair follicle and a coiled gland" width="768" height="960" loading="eager" fetchpriority="high">
          <?= /* top of the image: at the bottom it sits under the badge card on phones */ str_replace('class="hp-ai-chip"', 'class="hp-ai-chip" style="top:12px;bottom:auto"', hp_ai_chip('AI-generated illustration')) ?>
        </div>
        <div class="hero__badge-card">
          <p class="eyebrow">Our clinic · Gurugram</p>
          <p class="h4 mt-1"><a href="tel:<?= e(PHONE_E164) ?>" data-track="call"><?= e(PHONE_DISPLAY) ?></a></p>
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

<?= lp_steps([
    'eyebrow' => 'At the consultation',
    'title'   => 'What Happens at a Skin Consultation',
    'id'      => 'assessment',
    'intro'   => 'The aim is a diagnosis and a plan you can actually follow, not a bag of products. It usually runs in this order.',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',             'title' => 'History and examination',       'text' => 'How long the problem has been there, what makes it worse, everything already used — including creams bought online — and your medicines, periods, pregnancy plans or breastfeeding where relevant. The skin is then examined in good light, sometimes under magnification, to identify the type of acne, the likely depth of pigmentation or the pattern of a rash.'],
        ['img' => 'step-procedure',    'alt' => 'sterile instruments laid out on a tray',           'title' => 'Tests, only where needed',      'text' => 'Most skin concerns need none. Blood tests may be advised for acne with irregular periods or excess hair growth, before certain oral medicines, or when dark patches suggest an underlying cause.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram beside a notepad', 'title' => 'Photographs and a written plan', 'text' => 'Photographs, with your consent, in the same position and light each time, so progress is judged against a record. Then a written plan: what to apply and when, what to stop, which side effects to expect in the first weeks, and when to come back.'],
    ],
]) ?>

<section class="section section--white" id="options">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Treatment options</p>
      <h2 class="h2 mt-2">What a Dermatologist May Recommend</h2>
      <p class="body mt-3">Treatment is matched to the diagnosis, and most plans combine more than one of the following. Not everyone needs all of them, and some people need little more than a simpler routine.</p>
    </div>

    <div class="measure mt-6">
      <h3 class="h3" id="by-concern">Which Treatment for Acne, Melasma or Dull Skin?</h3>
      <p class="body-s mt-2">Find your concern on the left. The middle column is what the doctor looks at before deciding anything; the right-hand column is what may then be discussed. It is a general guide, not a diagnosis: two people with the same concern can leave with quite different plans.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data data--wide">
          <caption class="sr-only">Common skin concerns, what is checked at the consultation and the options that may be discussed. A general guide, not a diagnosis.</caption>
          <thead><tr><th scope="col">Concern</th><th scope="col">What is checked</th><th scope="col">Options that may be discussed</th></tr></thead>
          <tbody>
            <?php foreach ($concernRows as $r): ?>
            <tr><th scope="row" style="white-space:normal;width:20%;min-width:130px"><?= e($r[0]) ?></th><td><?= e($r[1]) ?></td><td><?= e($r[2]) ?></td></tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">Each option is described below. Face PRP has its own page, <a href="/face-prp-treatment-in-gurgaon">face PRP treatment in Gurgaon</a>, and so does <a href="/laser-hair-removal-in-gurgaon">laser hair removal in Gurgaon</a>, which some people with repeated ingrown hairs consider.</p>

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

<?= lp_split([
    'img'     => 'svc-followup',
    'alt'     => 'a desk calendar with dates circled',
    'eyebrow' => 'Before you start',
    'title'   => 'What Skin Treatment Can and Cannot Do',
    'id'      => 'limits',
    'tone'    => 'canvas',
    'html'    => '<p>Skin treatment helps many people, but slowly and within limits, and knowing them beforehand saves money and disappointment. No skin outcome can be promised: the same treatment can help one person a great deal and another only modestly.</p>'
               . '<p><b>Results take weeks to months.</b> Most treatments are judged over two to three months, pigmentation often longer. Switching products every fortnight is one of the commonest reasons a treatment seems not to work.</p>'
               . '<p><b>Melasma comes back.</b> It can be lightened and controlled, but sun, heat, hormonal change and pregnancy can bring it back, so maintenance and sun protection continue after the patches fade. Over-aggressive treatment can make pigmentation in brown skin worse.</p>'
               . '<p><b>Acne scars improve rather than disappear.</b> The realistic goal is scars that are less noticeable in ordinary light, reached over a course of treatment and only once active acne is controlled.</p>'
               . '<p><b>Unsuitable in pregnancy.</b> Some oral acne medicines, some retinoid creams, certain antibiotics and some pigmentation treatments should not be used in pregnancy or while trying to conceive, and some are avoided while breastfeeding. Tell the doctor at the start.</p>'
               . '<p><b>Side effects exist:</b></p>',
    'points'  => [
        'Dryness, peeling and stinging with many creams',
        'Greater sensitivity to the sun',
        'Effects specific to each oral medicine, explained before you start',
        'Redness, darkening or lightening after some procedures, more likely in brown skin',
        'Uncommonly, infection or an allergic reaction',
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-follicle',
    'alt'     => 'a cross-section of skin with several hair follicles beneath the surface',
    'eyebrow' => 'Skin in Gurugram',
    'title'   => 'Caring for Your Skin in Gurugram’s Sun, Heat and Smog',
    'id'      => 'gurugram-skin',
    'reverse' => true,
    'html'    => '<p>The local climate works against several common skin plans. Strong sun for much of the year darkens melasma and acne marks, summer heat and sweat feed acne on the forehead, back and chest, and the dust and winter smog leave a film of grime that tempts people to scrub. None of this changes the diagnosis, but it shapes the routine that goes with it.</p>'
               . '<p>Sunscreen sits at the centre of almost every plan here. A broad-spectrum one that you are happy to wear every day matters more than any particular brand, and for melasma a tinted sunscreen adds protection from visible light. These are general points; your own routine is set at the consultation.</p>',
    'points'  => [
        'Sunscreen every morning, smoggy and cloudy days included, and again after a couple of hours outdoors or a sweaty spell',
        'Window glass lets some of the sun’s rays through, so a long daily drive or a desk by a window still counts for melasma',
        'After a workout or a hot commute, wash off the sweat and change out of damp clothes; trapped sweat aggravates acne on the back and chest',
        'Through the dusty months and the smog season, one gentle wash in the evening is enough; scrubs and harsh face washes irritate, and can darken brown skin',
        'Long hours in air-conditioning and dry winter air both dry the skin, and a plain moisturiser often helps more than another active ingredient',
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-hair-fall',
    'alt'     => 'a wooden comb resting on folded towels',
    'eyebrow' => 'Skin, hair and face PRP',
    'title'   => 'Where Skin and Hair Concerns Overlap',
    'id'      => 'skin-and-hair',
    'tone'    => 'canvas',
    'html'    => '<p>DenceSpot treats hair loss as well as skin, and the two often meet. A flaky, itchy scalp may be seborrhoeic dermatitis, psoriasis or a reaction to a hair product, and ingrown hairs in the beard area or after waxing can leave dark marks that outlast the bumps. Each is treated as a skin problem first.</p><p>Unwanted facial or body hair is a separate question, covered on our <a href="/laser-hair-removal-in-gurgaon">laser hair removal</a> page.</p>'
               . '<p><b>Scalp flaking and itch.</b> Dandruff, seborrhoeic dermatitis and their look-alikes, and why washing harder rarely helps. See <a href="/dandruff-treatment-in-gurgaon">dandruff treatment</a>. Hard water and dust get blamed for a great deal locally; <a href="/blog/hard-water-pollution-and-hair-fall-in-gurgaon">what hard water and pollution really do to hair</a> separates the two.</p>'
               . '<p><b>Hair fall.</b> If shedding is part of the concern, its cause is investigated in its own right. See <a href="/hair-fall-treatment-in-gurgaon">hair fall treatment</a>.</p>'
               . '<p><b>Round bald patches.</b> Smooth, coin-shaped patches are usually alopecia areata, an immune condition with its own treatment. See <a href="/alopecia-areata-treatment-in-gurgaon">alopecia areata treatment</a>.</p>'
               . '<p><b>Face PRP.</b> Your own platelets, used for skin texture and quality. Limited evidence, not for active acne or lost volume. See <a href="/face-prp-treatment-in-gurgaon">face PRP</a>.</p>',
]) ?>

<section class="section section--white" id="questions">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Before you commit to a plan</p>
      <h2 class="h2 mt-2">Questions Worth Asking Any Skin Clinic or Dermatologist</h2>
      <p class="body mt-3">A skin plan is easier to judge when you know what to ask. These questions apply to any doctor who suggests one, at this clinic or elsewhere, and a plain answer to each is a fair thing to expect.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--pad-lg">
        <h3 class="h4">About the diagnosis</h3>
        <?= ticks([
            'What is the diagnosis, in plain words, and what else could it be?',
            'Could something I already use be making it worse?',
            'Do I need any tests, and what would the results change?',
        ], false) ?>
      </div>
      <div class="card card--pad-lg">
        <h3 class="h4">About the plan</h3>
        <?= ticks([
            'How long before we judge whether this is working?',
            'Which side effects are expected, and which mean I should stop?',
            'Is any of this unsuitable if I become pregnant or am breastfeeding?',
            'Will I need maintenance once the course ends?',
        ], false) ?>
      </div>
      <div class="card card--pad-lg">
        <h3 class="h4">About procedures and cost</h3>
        <?= ticks([
            'Why a procedure now, rather than once the acne or irritation has settled?',
            'Who carries it out, and how likely are darker or lighter patches on my skin tone?',
            'What is the total cost of the plan, with reviews and products included?',
        ], false) ?>
      </div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Skin consultations and treatment are carried out by registered medical practitioners. DenceSpot is led by a dermatologist, and every doctor at the clinic is listed below with their qualifications.',
    '',
    false
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Skin Treatment in Gurgaon: FAQs</h2>
        <p class="body-s mt-3">General patient education. What suits your skin is decided at the consultation.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'Skin Treatment at Our Gurugram Clinic',
    'Skin consultations and treatment take place at our Sector 39 clinic in Gurugram, ' . NAP_LANDMARK . '. The clinic is open seven days a week.'
) ?>

<?= lp_cta([
    'eyebrow'   => 'Sector 39, Gurugram',
    'title'     => 'Get a Diagnosis Before You Buy Another Product',
    'text'      => 'Bring your skin, your current products and your questions, and leave with a working diagnosis, a plan you can follow, a realistic timeline and a clear idea of what treatment cannot do.',
    'treatment' => 'Skin care',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
