<?php
/**
 * /face-prp-treatment-in-rohini — facial platelet-rich plasma at the Rohini
 * (Delhi) clinic.
 *
 * October 2026 (batch 2). The agency confirmed (13 Oct 2026) that skin
 * treatment, face PRP included, is carried out at the Rohini clinic. Medical
 * facts follow the existing face PRP page; the copy is new and takes its own
 * angle: what the research does and does not show, who it may suit and who
 * should not have it, how a course runs at Rohini, and side effects.
 *
 * Client rule (14 Oct 2026): a Rohini page does not mention the other clinic
 * or link to any URL containing its city name. Landing-page layout:
 * lp_split / lp_steps / lp_cta (includes/home-components.php). The hero shows
 * the skin illustration; the plasma illustration sits in the "How it works"
 * steps.
 *
 * Not yet reviewed by the clinic's doctor: no medical_review_line(), no
 * "reviewed by" badge, doctor_block(..., false), not in MEDICAL_PAGES.
 * No before/after images, no session counts, no devices or brands, no prices,
 * no Rohini doctor named.
 *
 * SEO round 3 (14 Oct 2026): title per the competitor research; a "face PRP
 * vs other skin options" table by concern (facts from this page and
 * /skin-treatment-in-rohini); a Delhi seasons row; "questions worth asking
 * any clinic"; cost H2 "Face PRP Cost Factors in Rohini" linking
 * /skin-treatment-in-rohini; 15 FAQs. Section tones re-alternated.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'Is face PRP done at the Rohini clinic?',
     'a' => 'Yes. The skin assessment, the baseline photographs, each session and the review visits all take place at our Rohini clinic in North-West Delhi.'],
    ['q' => 'Which parts of Delhi is the Rohini clinic convenient for?',
     'a' => 'The clinic is in North-West Delhi, near the Outer Ring Road, so it is close to Rohini, Pitampura, Shalimar Bagh, Prashant Vihar and neighbouring parts of North and North-West Delhi. The directions link on the clinic card opens its location in Google Maps.'],
    ['q' => 'What can face PRP improve, and what will it not do?',
     'a' => 'It is used for skin quality, such as texture, fine lines and dullness, rather than for any single dramatic change, and the published evidence for it is limited. It will not lift sagging skin, fill hollows or remove deep folds, it is not a treatment for active acne, and it does not remove pigmentation on its own. If one of those is your main concern, you will be told so; see <a href="/skin-treatment-in-rohini">skin treatment in Rohini</a>.'],
    ['q' => 'Is face PRP better than fillers?',
     'a' => 'It is a different treatment for a different problem. Fillers add volume; PRP does not. Comparing them is comparing tools rather than ranking them, and the useful question is what you actually want changed, which is settled at the assessment.'],
    ['q' => 'How many sessions will I need?',
     'a' => 'Face PRP is given as a course, with sessions some weeks apart. How many depends on your skin and what you want changed, so the number is planned at the assessment rather than sold as a fixed package beforehand.'],
    ['q' => 'What should I bring to the first appointment?',
     'a' => 'A list of every medicine you take, including blood thinners or anything else that affects clotting, and the skincare products you use, or clear photos of their labels. Do not stop a prescribed medicine on your own; any change is the doctor’s decision. The first appointment is an assessment with baseline photographs.'],
    ['q' => 'How long does a session take, and what is the downtime?',
     'a' => 'Allow time for the numbing preparation as well as the blood draw, the preparation of the plasma and the treatment itself; the clinic tells you how long to set aside when you book. Afterwards, redness and mild swelling for a day or two are usual, and pinpoint bruises where the needle went in are common and settle. Nothing about it stops you working, but book a few days before an important event, not the evening before.'],
    ['q' => 'Does it hurt?',
     'a' => 'Most people find the injections uncomfortable rather than painful, and a numbing preparation is generally applied first. The blood draw feels like any routine blood test.'],
    ['q' => 'When will I see a difference, and how long does it last?',
     'a' => 'Not straight away; any fullness in the first days is swelling. Where PRP helps, texture and quality change gradually over weeks to months. The effect is not permanent, because skin keeps ageing, so maintenance sessions are usually part of a realistic plan.'],
    ['q' => 'Can I go in the sun, exercise or wear makeup afterwards?',
     'a' => 'For a short time afterwards, avoid direct sun and sunbeds, saunas, steam and heavy exercise, and skincare acids and retinoids. Wear makeup on the day only as advised. Daily sunscreen remains part of any skin plan, with or without PRP.'],
    ['q' => 'Who should not have face PRP?',
     'a' => 'It is not advised with active infection or inflammation in the treatment area, certain blood, platelet or clotting disorders, some cancers, or blood thinners not yet reviewed by the doctor. Pregnancy and breastfeeding are assessed case by case. If PRP is not suitable, you will hear what might help instead.'],
    ['q' => 'Which side effects should I report straight away?',
     'a' => 'Spreading redness, increasing pain, warmth or a fever after a session. Infection is uncommon, as with any injection, but report these to the Rohini clinic the same day by phone or WhatsApp rather than waiting.'],
    ['q' => 'Can face PRP be combined with microneedling?',
     'a' => 'Often, yes. PRP can be applied to the skin straight after microneedling instead of being injected. Whether that combination suits your skin is decided at the assessment.'],
    ['q' => 'How much does face PRP cost in Rohini, and is EMI available?',
     'a' => 'It is priced per session, and the course is planned at the assessment and quoted in writing before you agree to anything. A prepaid package bought before an assessment is worth avoiding, because a course should be possible to stop if the photographs show no change. Instalment options through third-party lenders may be available; ask at the consultation. See <a href="/cost-and-emi-options">cost and EMI options</a>.'],
    ['q' => 'Can I send photos on WhatsApp before booking?',
     'a' => 'Yes. Clear daylight photographs of the areas that bother you, without filters, help the Rohini clinic answer a first question, but whether PRP suits your skin is decided only after an examination in person. The clinic is open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . ').'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Face PRP treatment in Rohini'],
];

$page = [
    'title'         => 'Face PRP Treatment in Rohini, Delhi: Sessions & Downtime',
    'description'   => 'Face PRP treatment at our Rohini clinic, North-West Delhi: what it can and cannot do for skin, limited evidence, sessions, downtime, side effects and cost.',
    'url'           => '/face-prp-treatment-in-rohini',
    'crumbs'        => $crumbs,
    'preload_image' => '/assets/img/services/svc-skin-768.webp',
    'schema'        => [
        schema_delhi_clinic(),
        schema_therapy('/face-prp-treatment-in-rohini', [
            'name'              => 'Face PRP Treatment',
            'alternateName'     => ['Facial platelet-rich plasma therapy', 'PRP for skin', 'Face PRP treatment in Rohini, Delhi'],
            'procedureType'     => 'https://schema.org/PercutaneousProcedure',
            'relevantSpecialty' => 'https://schema.org/Dermatology',
            'bodyLocation'      => 'Face',
            'howPerformed'      => 'A small volume of the patient\'s own blood is drawn and centrifuged to concentrate the platelet fraction. The platelet-rich plasma is injected into the dermis across the treatment areas of the face after a numbing preparation, or applied to the skin immediately after microneedling, as a course of sessions spaced some weeks apart.',
            'preparation'       => 'Assessment of the skin and of what the patient wants changed; review of medical history and medicines, including anticoagulants and drugs affecting platelet function; exclusion of active infection or inflammation in the treatment area; standardised baseline photographs.',
            'followup'          => 'Photographs taken under the same conditions as the baseline, review of response at the Rohini clinic during the course, and maintenance sessions only where there is a change worth maintaining.',
            'expectedPrognosis' => 'Published evidence is limited to mostly small studies using differing preparation methods and largely photographic or subjective scoring. Where changes in texture and skin quality occur, they are modest and develop over weeks to months. Face PRP does not lift sagging skin, restore lost volume or treat active acne. Results are not permanent without maintenance. Bruising, swelling and redness are common; infection is uncommon. Outcomes vary between patients and cannot be promised.',
            'location'          => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
        ]),
        schema_breadcrumbs($crumbs),
        schema_faq('/face-prp-treatment-in-rohini', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Rohini, Delhi</span>
        <h1 class="h1 mt-3">Face PRP Treatment in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">Face PRP uses platelet-rich plasma prepared from your own blood, with the aim of improving skin texture, fine lines and dullness. The evidence for it is limited, and any change is modest and gradual. At our Rohini clinic in North-West Delhi, a doctor first checks whether it suits what you want changed, and says so if something else would serve you better.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Skin care" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp the Rohini Clinic</a>
        </div>

        <?= ticks([
            'Prepared from your own blood',
            'Suitability checked before any session',
            'Progress judged on standard photographs',
            'Assessment, sessions and reviews in Rohini',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-skin-768.webp" srcset="/assets/img/services/svc-skin-512.webp 512w, /assets/img/services/svc-skin-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a sculpted cross-section of skin layers with a single hair follicle and a coiled gland, on a pale circular background" width="768" height="960" loading="eager" fetchpriority="high">
          <?= /* top of the image: at the bottom it sits under the badge card on phones */ str_replace('class="hp-ai-chip"', 'class="hp-ai-chip" style="top:12px;bottom:auto"', hp_ai_chip('AI-generated illustration')) ?>
        </div>
        <div class="hero__badge-card">
          <p class="eyebrow">Rohini Clinic</p>
          <p class="h4 mt-1">North-West Delhi</p>
          <p class="meta"><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></p>
          <p class="meta"><?= e(HOURS_DISPLAY) ?><br><?= e(HOURS_NOTE) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= lead_strip() ?>

<section class="trust">
  <div class="wrap">
    <div class="grid grid--4">
      <div class="card"><?= icon('heart', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Your own blood</p><p class="meta mt-1">No reaction to the material itself is expected.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Modest claims</p><p class="meta mt-1">Skin quality, not a lift or volume.</p></div>
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Measured fairly</p><p class="meta mt-1">Same angle, same light, every time.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Registered doctors</p><p class="meta mt-1">Carried out by registered medical practitioners.</p></div>
    </div>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'How it works',
    'title'   => 'What Face PRP Is',
    'intro'   => 'Platelets carry growth factors involved in tissue repair. Face PRP concentrates them from your blood and delivers them into the skin of the face.',
    'tone'    => 'white',
    'steps'   => [
        ['img' => 'svc-procedure', 'alt' => 'sterile instruments laid out on a green tray',                          'title' => 'A small blood sample',     'text' => 'Drawn from the arm in the same way as a routine blood test.'],
        ['img' => 'svc-prp',       'alt' => 'a capped tube of golden-yellow plasma beside a syringe on a white tray', 'title' => 'Spun to separate it',      'text' => 'A centrifuge separates the blood so the platelet-rich layer of plasma can be drawn off.'],
        ['img' => 'svc-follicle',  'alt' => 'a sculpted cross-section of skin showing hair follicles beneath the surface', 'title' => 'Delivered into the skin', 'text' => 'Injected into the skin across the areas being treated, or applied straight after microneedling so it enters through the tiny channels made.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-consultation',
    'alt'     => 'a dermatoscope and notepad on a wooden desk beside a fern',
    'eyebrow' => 'The evidence',
    'title'   => 'What the Research Does and Does Not Show',
    'tone'    => 'canvas',
    'html'    => '<p>Face PRP is widely offered, but the published evidence behind it is thin. Most trials include few people, so the size of any benefit is uncertain; studies prepare and deliver the plasma in different ways, which makes their results hard to compare; and results are judged mainly from photographs or from how patients rate their own skin.</p>'
               . '<p>Hair PRP uses plasma prepared the same way, but the purpose, the injection technique and what can be expected are different: see <a href="/hair-prp-treatment-in-rohini">hair PRP and GFC in Rohini</a>. Our article on <a href="/blog/does-prp-work-for-hair-loss">whether PRP works for hair loss</a> shows how that evidence is weighed.</p>'
               . '<p><b>What that means for you:</b></p>',
    'points'  => [
        'Any change is modest: skin texture and quality, not a new face',
        'It builds over weeks to months, not after the first session',
        'Some people see little or no difference',
        'Without maintenance the effect fades, because skin keeps ageing',
    ],
    'link'    => ['url' => '/blog/how-to-read-before-and-after-photos', 'label' => 'How to read before-and-after photos'],
]) ?>

<section class="section section--white" id="suitability">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Suitability</p>
      <h2 class="h2 mt-2">Who It May Suit, and Who Should Not Have It</h2>
      <p class="body mt-3">The question at the assessment is whether PRP addresses what actually bothers you about your skin.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--pad-lg">
        <h3 class="h4">May be reasonable</h3>
        <div class="mt-3"><?= ticks([
            'Uneven texture or fine lines',
            'Dull, tired-looking skin',
            'You prefer a treatment made from your own blood',
            'You are happy with a slow, modest change',
        ], false) ?></div>
      </div>
      <div class="card card--pad-lg">
        <h3 class="h4">The wrong tool</h3>
        <div class="mt-3"><?= ticks([
            'Sagging skin or deep folds',
            'Lost volume or hollows',
            'Active acne as the main concern',
            'Pigmentation on its own',
        ], false) ?></div>
      </div>
      <div class="card card--pad-lg">
        <h3 class="h4">Not advised, or needs care</h3>
        <div class="mt-3"><?= ticks([
            'Active infection or inflammation in the area',
            'Certain blood, platelet or clotting disorders',
            'Some cancers',
            'Blood thinners not yet reviewed by the doctor',
            'Pregnancy or breastfeeding: assessed case by case',
        ], false) ?></div>
      </div>
    </div>
    <div class="note mt-5">
      <p class="h4">Where it fits with other skin care</p>
      <p class="body-s mt-2">Daily sunscreen and a simple routine do more for skin over the years than any course of injections; PRP sits alongside them, not in their place. Fillers add volume and PRP does not, so they answer different problems. If acne, marks or melasma are the main concern, those are treated first: see <a href="/skin-treatment-in-rohini">skin treatment in Rohini</a>.</p>
    </div>
  </div>
</section>

<section class="section section--canvas" id="compare">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Concern by concern</p>
      <h2 class="h2 mt-2">Face PRP vs Other Skin Options</h2>
      <p class="body mt-3">PRP answers some skin concerns and not others. The table sets out, for the concerns people most often bring, whether face PRP plays a part and what usually addresses the concern instead or alongside it.</p>
    </div>
    <div class="card mt-6" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data" style="min-width:680px">
          <caption class="sr-only">Common skin concerns: whether face PRP plays a part, and what usually addresses each concern. General patient education, not a treatment plan.</caption>
          <thead>
            <tr><th scope="col">Concern</th><th scope="col">Can face PRP help?</th><th scope="col">What usually addresses it</th></tr>
          </thead>
          <tbody>
            <tr><th scope="row" style="white-space:normal;min-width:120px">Uneven texture, fine lines, dullness</th><td>May be considered; any change is modest and builds over weeks to months</td><td>Daily sunscreen and a simple routine, which do more over the years; PRP sits alongside them, not in their place</td></tr>
            <tr><th scope="row" style="white-space:normal;min-width:120px">Lost volume or hollows</th><td>No; PRP does not add volume</td><td>Fillers add volume, so they answer a different problem</td></tr>
            <tr><th scope="row" style="white-space:normal;min-width:120px">Sagging skin or deep folds</th><td>No; it does not lift sagging skin or remove deep folds</td><td>Not a PRP question; the realistic options are discussed at the assessment</td></tr>
            <tr><th scope="row">Active acne</th><td>No; it is not a treatment for active acne</td><td>Prescription creams, tablets for moderate, severe or scarring acne, and a simple routine</td></tr>
            <tr><th scope="row">Pigmentation</th><td>Not on its own</td><td>Treating the cause, daily sunscreen and, where suitable, pigment-reducing creams</td></tr>
            <tr><th scope="row">Melasma</th><td>Not on its own</td><td>Sunscreen every day, prescription creams in courses, then maintenance; it tends to return with sun, heat and hormones</td></tr>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">These are general notes, not a plan; what suits your skin is decided at the consultation. Acne, marks, pigmentation and melasma are covered in more depth on <a href="/skin-treatment-in-rohini">skin treatment at the Rohini clinic</a>.</p>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'At the Rohini clinic',
    'title'   => 'How a Course Runs',
    'intro'   => 'Every step happens at the same clinic in North-West Delhi, and change is judged against your own photographs rather than anyone else’s.',
    'tone'    => 'white',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                  'title' => 'Assessment',           'text' => 'Your skin examined, your medicines and history reviewed, and a straight answer on whether PRP fits your concern.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned line',   'title' => 'Baseline photographs', 'text' => 'Taken in a fixed position and light before anything starts, so change is judged against a record, not memory. Lighting, makeup, angle and expression can change how skin looks without any treatment, which is why there are no before-and-after photos here.'],
        ['img' => 'step-procedure',    'alt' => 'sterile instruments laid out on a tray',                'title' => 'Sessions',             'text' => 'A numbing preparation, then the blood draw, preparation and treatment. Sessions are spaced some weeks apart.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with review dates circled',             'title' => 'Review',               'text' => 'New photographs under the same conditions. Maintenance is discussed only if there is a change worth keeping, and the course can stop if there is none.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'hero',
    'alt'     => 'a sculpted cross-section of skin with three hairs and their follicles, on a cream background',
    'eyebrow' => 'Side effects and aftercare',
    'title'   => 'The Days After a Session',
    'tone'    => 'canvas',
    'reverse' => true,
    'html'    => '<p>The first day or two is the least flattering part, so book a session a few days before any important event, not the evening before. Redness for a day or two, mild swelling, pinpoint bruises where the needle went in and tenderness that settles quickly are common and expected.</p>'
               . '<p><b>Uncommon:</b> infection, as with any injection. Because the plasma comes from you, a reaction to the material itself is not expected; the side effects come from the injections. Bruising can be more noticeable in people taking medicines that affect clotting, which is why every medicine is reviewed first.</p>'
               . '<p><b>Call rather than wait:</b> spreading redness, increasing pain, warmth or a fever after a session should be reported to the Rohini clinic on <a href="tel:' . e(LOC_DELHI_PHONE_E164) . '" data-track="call">' . e(LOC_DELHI_PHONE_DISPLAY) . '</a> the same day.</p>'
               . '<p><b>For a short time afterwards, avoid:</b></p>',
    'points'  => [
        'Direct sun and sunbeds',
        'Saunas, steam and heavy exercise',
        'Skincare acids and retinoids',
        'Makeup on the day, as advised',
    ],
]) ?>

<?= lp_highlights([
    'eyebrow' => 'Recovering in Delhi',
    'title'   => 'After Face PRP in Delhi: Sun, Smog and Wedding Season',
    'intro'   => 'General practicalities for the days after a session. Your aftercare advice comes first wherever it differs.',
    'tone'    => 'white',
    'items'   => [
        ['icon' => 'clock',    'title' => 'Summer sun',             'text' => 'Direct sun is avoided for a short time after a session, and strong sun darkens marks and melasma in any case. Daily sunscreen, reapplied outdoors, belongs in every skin plan.'],
        ['icon' => 'shield',   'title' => 'Smog and dust',          'text' => 'Winter smog and roadside dust settle on the skin. When your aftercare allows, cleanse gently at the end of the day and leave scrubs alone.'],
        ['icon' => 'cap',      'title' => 'Helmets and masks',      'text' => 'Sweat trapped under a helmet, mask or tight collar can aggravate acne on the forehead, jaw and chin. Keep helmet padding clean, and avoid pressing on tender skin.'],
        ['icon' => 'calendar', 'title' => 'Wedding and festival season', 'text' => 'Sessions are spaced some weeks apart, and the day or two after each is the least flattering. Count back from the event so the last session lands a few days before it.'],
    ],
]) ?>

<section class="section section--canvas" id="questions">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Before you pay</p>
      <h2 class="h2 mt-2">Questions Worth Asking Any Clinic About Face PRP</h2>
      <p class="body mt-3">They apply wherever you have face PRP, including here. Clear answers tell you more than any photograph of someone else’s skin.</p>
    </div>
    <div class="card card--pad-lg mt-6">
      <?= ticks([
          'Does PRP address what actually bothers me about my skin?',
          'Who draws the blood and who gives the injections?',
          'How many sessions, how far apart, and what does the whole course cost?',
          'Will baseline photographs be taken in a fixed position and light?',
          'What happens to the plan if the review shows no change?',
          'What downtime should I expect, and which side effects should I report?',
      ]) ?>
    </div>
  </div>
</section>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">Face PRP Cost Factors in Rohini</h2>
        <p class="body mt-3 measure">Face PRP is priced per session. No price is published here: the course is planned at the assessment and quoted in writing before you agree to anything.</p>
        <p class="body mt-3 measure">A prepaid package bought before an assessment is worth avoiding, because a course should be possible to stop if the photographs show no change. If acne, marks, pigmentation or melasma are the main concern, those are usually treated first with creams and daily sunscreen; see <a href="/skin-treatment-in-rohini">skin treatment in Rohini</a> for how that is planned.</p>
        <p class="body mt-3 measure">Instalment options through third-party lenders may be available; ask at the consultation, and see <a href="/cost-and-emi-options">cost and EMI options</a>.</p>
      </div>
      <div class="grid grid--2">
        <div class="card"><p class="h4">Sessions in the course</p><p class="meta mt-1">Planned from your skin and what you want changed.</p></div>
        <div class="card"><p class="h4">Areas treated</p><p class="meta mt-1">Set at the assessment and named in the plan.</p></div>
        <div class="card"><p class="h4">Maintenance</p><p class="meta mt-1">Discussed only if there is a change worth keeping.</p></div>
        <div class="card"><p class="h4">Other skin care</p><p class="meta mt-1">Creams or other treatment shown as separate lines.</p></div>
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
        <h2 class="h2 mt-2">Face PRP in Rohini: FAQs</h2>
        <p class="body-s mt-3">General information only. Whether PRP suits your skin and your concern is decided at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask the Rohini Clinic</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= latest_posts_strip('prp', 3, 'Further Reading') ?>

<?= local_block(
    'Visit Our Rohini Clinic',
    'Face PRP assessments, sessions and review visits take place at our clinic in Rohini, North-West Delhi, near the Outer Ring Road.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= lp_cta([
    'eyebrow'   => 'Rohini, Delhi',
    'title'     => 'Ask Whether Face PRP Suits Your Skin',
    'text'      => 'Tell the doctor what bothers you about your skin. If PRP is unlikely to help with it, you will hear that at the assessment, along with what might help instead.',
    'treatment' => 'Skin care',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
