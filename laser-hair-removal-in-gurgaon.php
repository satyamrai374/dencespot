<?php
/**
 * /laser-hair-removal-in-gurgaon — laser hair removal at the Gurugram
 * (Sector 39) clinic. New page, October 2026; the homepage treatment card and
 * the nav already link here.
 *
 * Written from general, conservative medical knowledge: there was no earlier
 * clinic page to take facts from. Clinic-specific facts that are not on record
 * are NOT stated — in particular the laser device and wavelength (marked with
 * missing_fact() in #how-it-works) and any price. Session numbers and
 * intervals are general ranges, never presented as this clinic's protocol.
 *
 * Not yet reviewed by the clinic's doctor: doctor_block(..., false), no
 * "medically reviewed" line, not in MEDICAL_PAGES. NMC Guidelines of
 * 06.10.2026 apply — no outcome promises, no before/after images, no prices
 * used as inducements. The hero image is an AI-generated illustration and is
 * labelled as one (cl. 7.2).
 *
 * Twin page: /laser-hair-removal-in-rohini (different emphasis — keep the two
 * from converging). Not linked from here: a Gurugram page does not mention
 * the Rohini clinic (client rule, 14 Oct 2026).
 * Landing-page layout: lp_split / lp_steps / lp_cta (includes/home-components.php).
 *
 * 14 Oct 2026 (SEO round 4): retitled "Sessions, Cost & Patch Test"; the six
 * area cards in #areas became one area table (what changes the number of
 * sessions, usual spacing), keeping every card's facts; a "laser vs waxing,
 * threading and shaving" table in #expectations; Gurugram sun, heat and smog
 * aftercare; "questions worth asking any laser clinic"; 16 FAQs. Spacing is
 * the same general range as before (face about four to six weeks, body six
 * to eight or more), not this clinic's protocol. Written separately from the
 * twin page: reuse facts, not sentences.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/**
 * Area → what changes the number of sessions → usual spacing. Patient
 * education, not this clinic's protocol. Carries every fact from the six area
 * cards this table replaced (Oct 2026); spacing restates the page's general
 * range of four to eight weeks, shorter for the face.
 */
$areaRows = [
    ['Upper lip and chin',
     'Often driven by hormones, with fine and coarse hairs mixed together, so more than six sessions and later maintenance are common. Years of threading or plucking leave hairs at uneven stages to begin with.',
     'About 4–6 weeks'],
    ['Jawline and sides of the face',
     'In women, usually hormonal growth, which needs more sessions. In men, often chosen for ingrown hairs and razor bumps along the beard line. The rare thickening of nearby hair is reported mostly on the face and neck, so it is watched for.',
     'About 4–6 weeks'],
    ['Underarms',
     'Dense, dark hair that usually responds well, so progress tends to be steady. Come without deodorant on treatment days.',
     'About 6–8 weeks'],
    ['Arms',
     'Coarse upper-arm hair tends to respond better than finer forearm hair, which can need extra sessions. Forearms tan easily, even on a daily drive.',
     '6–8 weeks or more'],
    ['Legs',
     'A large area, so each session takes longer. Lower legs catch the sun, and a tan can push a session back.',
     '6–8 weeks or more'],
    ['Back and chest',
     'Often requested by men with coarse, dark hair over a broad area, which tends to respond. New chest hair in women is worth raising, as it can have a hormonal cause.',
     '6–8 weeks or more'],
    ['Bikini line',
     'Dense hair that responds, but the skin is sensitive and often darker, so settings are chosen with particular care and progress can be slower.',
     '6–8 weeks or more'],
];

/** Hair-removal methods compared with laser: what each does, and its place during a course. */
$methodRows = [
    ['Shaving or trimming',
     'Cuts the hair at the surface and leaves the root in place, so stubble returns within days.',
     'Allowed throughout. A shave shortly before each session is the usual preparation.'],
    ['Waxing, threading, plucking or epilating',
     'Pulls the hair out by the root; regrowth takes a few weeks.',
     'Stopped for the whole course and for some weeks beforehand, because the laser needs the root in place.'],
    ['Hair removal creams',
     'Dissolve the hair at the skin’s surface while the root stays. They can sting or irritate sensitive skin.',
     'Ask before using them during a course, and keep them off freshly treated skin.'],
    ['Bleaching',
     'Lightens the hair so it shows less, without removing it.',
     'Stopped beforehand, as advised: laser needs dark pigment in the hair to absorb its light.'],
    ['Electrolysis',
     'Treats follicles one at a time with a fine probe and electrical energy, whatever the hair colour; slow for large areas.',
     'An alternative for white, grey, red or blonde hair, which laser cannot target.'],
    ['Laser hair removal',
     'Light absorbed by the hair’s pigment heats the follicle and reduces its ability to regrow, over a course of sessions.',
     'Long-term reduction rather than removal of every hair; occasional top-up sessions are common.'],
];

$faqs = [
    ['q' => 'Is laser hair removal permanent?',
     'a' => 'It gives long-term reduction rather than clearing every hair for good. Regrowth is often finer and lighter, but some hair usually returns, especially where hormones drive growth, and occasional maintenance sessions are common. No clinic can promise a hair-free result.'],
    ['q' => 'How many sessions will I need?',
     'a' => 'Often six or more, spaced several weeks apart, because laser only reaches follicles that are actively growing. Facial, hormone-related and finer hair usually needs more. Your own number is set after assessment. The face is usually treated more often than the body, about every four to six weeks against six to eight or more; a week or two either way rarely matters, but long gaps slow progress.'],
    ['q' => 'Is a patch test needed before the first session?',
     'a' => 'Usually. A test patch of skin gets the settings planned for you and is checked after a few days, before a whole area is done. This is especially worthwhile on darker skin or skin with a recent tan, where a reaction can be slow to appear. Our <a href="/blog/laser-hair-removal-patch-test">laser patch test guide</a> goes into more detail.'],
    ['q' => 'What should I bring to my first appointment?',
     'a' => 'A list of your medicines and supplements, especially acne treatment, antibiotics and anything taken for hormones, plus any hormone test reports you already have. If you have had laser elsewhere, note when, on which areas and how your skin reacted. Avoid waxing or threading the areas in the weeks before, since laser needs the root in place.'],
    ['q' => 'How long does each visit take?',
     'a' => 'It depends on the area. Once the skin is prepared, a small area such as the upper lip or chin is a matter of minutes, while full legs or the back need a much longer slot. The first visit runs longer, because the assessment and usually a patch test come before any full session.'],
    ['q' => 'Does laser hair removal hurt?',
     'a' => 'Each pulse feels like a sharp snap or sting followed by warmth, and most people find it manageable with cooling. Sensitive areas such as the upper lip feel sharper.'],
    ['q' => 'Is laser hair removal suitable for Indian skin?',
     'a' => 'For many people, yes, provided the wavelength and settings suit the skin type. Darker skin carries a higher risk of burns and pigment change, so treatment is more cautious and a patch test is usually done first.'],
    ['q' => 'Can I keep threading or waxing between sessions?',
     'a' => 'Not on the areas being treated. Threading, waxing, plucking and epilating pull out the root the laser needs to find, so switch to shaving or trimming for the length of the course. Threading your eyebrows can carry on, since the eyebrows themselves are not treated.'],
    ['q' => 'Can I go to the gym or out in the sun after a session?',
     'a' => 'Give it a day or two. Heat, sweat and friction irritate freshly treated skin, so skip workouts, steam, saunas and long spells outdoors in the Gurugram heat until the redness settles. Treated skin that sees daylight needs sunscreen for the whole course, and a fresh tan can mean postponing the next session.'],
    ['q' => 'Can laser help with facial hair caused by PCOS?',
     'a' => 'It can reduce the hair, but it does not treat PCOS. Hormone-driven hair often needs more sessions and maintenance, and the cause should be assessed and treated medically alongside laser.'],
    ['q' => 'Does laser work on grey, white, blonde or red hair?',
     'a' => 'Usually not. These hairs have too little dark pigment to absorb the light, so they respond poorly or not at all.'],
    ['q' => 'Which side effects should I report?',
     'a' => 'Blisters, crusting, redness that spreads or worsens after the first day, or patches of skin that turn darker or lighter. Call the Gurugram clinic on ' . PHONE_DISPLAY . ' if you notice any of these. Some redness and small bumps around the follicles are normal and settle within a day or two.'],
    ['q' => 'What happens if laser does not suit my skin or hair?',
     'a' => 'You are told so at the assessment rather than booked into a course. White, grey, red or blonde hair has too little pigment for laser, and electrolysis, which does not rely on pigment, may be more suitable. If a patch test reacts, the settings are changed or laser is not used. Where the pattern of hair growth points to a hormonal cause, that is assessed alongside.'],
    ['q' => 'Can I send photos on WhatsApp before I book?',
     'a' => 'Yes, of areas you are comfortable photographing, such as the face, arms or legs. Daylight photos show the colour and density of the hair and help the clinic suggest a suitable appointment; send them on WhatsApp to ' . PHONE_DISPLAY . '. Please do not send intimate photos: describe the area instead. Skin type and suitability are confirmed in person.'],
    ['q' => 'How much does laser hair removal cost in Gurgaon?',
     'a' => 'It depends on the areas treated and how many sessions you need, and is explained after your assessment rather than quoted as a single headline price. Paying in instalments through a third-party lender may be possible; ask about it at the consultation, and see <a href="/cost-and-emi-options">how medical EMI works</a>.'],
    ['q' => 'When is the Gurugram clinic open?',
     'a' => 'The clinic in Sector 39, ' . NAP_LANDMARK . ', is open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . '). Sessions are booked within those hours, and the map link and directions are on the <a href="/contact">contact page</a>.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Laser hair removal'],
];

$page = [
    'title'         => 'Laser Hair Removal in Gurgaon: Sessions, Cost & Patch Test',
    'description'   => 'Laser hair removal in Gurgaon, Sector 39: sessions and spacing by area, the patch test, Indian skin types, PCOS facial hair, cost factors, EMI and aftercare.',
    'url'           => '/laser-hair-removal-in-gurgaon',
    'crumbs'        => $crumbs,
    'preload_image' => '/assets/img/services/svc-laser-768.webp',
    'schema'        => [
        schema_clinic(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/laser-hair-removal-in-gurgaon', [
            'name'          => 'Laser Hair Removal',
            'alternateName' => ['Laser hair reduction', 'Laser hair removal in Gurugram'],
            'procedureType' => 'https://schema.org/NoninvasiveProcedure',
            'bodyLocation'  => 'Face and body: upper lip, chin, jawline, underarms, arms, legs, back, chest, bikini line',
            'howPerformed'  => 'Pulses of laser light are absorbed by melanin in the hair shaft and follicle, and the resulting heat damages the follicle\'s ability to regrow hair. Delivered as a course of sessions spaced several weeks apart, because only follicles in the active growth phase respond. Wavelength and settings are chosen for the patient\'s skin type and hair colour.',
            'preparation'   => 'Assessment of skin type, hair colour, medical history and medication, usually with a patch test. The area is shaved before each session; waxing, threading, plucking and sun tanning are avoided beforehand.',
            'followup'      => 'Sun protection and avoidance of heat and friction for a day or two after each session, further sessions at intervals of several weeks, and maintenance sessions where regrowth occurs.',
            'expectedPrognosis' => 'Laser treatment reduces hair rather than removing it entirely. Many patients see a marked reduction after a full course, often six or more sessions, with finer and lighter regrowth; some hair commonly returns and maintenance sessions are often needed. White, grey, red and blonde hair respond poorly. Results vary between patients and cannot be promised.',
            'performer'     => null,
        ]),
        schema_faq('/laser-hair-removal-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Laser hair removal · Sector 39, Gurugram</span>
        <h1 class="h1 mt-3">Laser Hair Removal in Gurgaon</h1>
        <p class="lead mt-3 measure">Laser hair removal uses pulses of light to reduce unwanted hair on the face and body. It works over a course of sessions, thins hair rather than clearing every hair for good, and depends on your hair colour and skin type. At our Sector 39 clinic in Gurugram, a registered medical practitioner assesses your skin and hair before any session is planned.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-treatment="Laser hair removal" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Reduces hair; some regrowth is expected',
            'A course of sessions, spaced weeks apart',
            'Skin type and hair colour assessed first',
            'At our clinic in Sector 39, Gurugram',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-laser-768.webp" srcset="/assets/img/services/svc-laser-512.webp 512w, /assets/img/services/svc-laser-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" width="768" height="960" alt="AI-generated illustration: a white handheld device on a white tray beside a folded sage-green towel" loading="eager" fetchpriority="high">
          <?php /* Chip moved to the top edge: on phones the badge card below overlaps the bottom of the image. */ ?>
          <?= str_replace('class="hp-ai-chip"', 'class="hp-ai-chip" style="top:12px;bottom:auto"', hp_ai_chip('AI-generated illustration')) ?>
        </div>
        <div class="hero__badge-card">
          <p class="eyebrow">Our clinic · Gurugram</p>
          <p class="h4 mt-1">Sector 39, <?= e(NAP_LANDMARK) ?></p>
          <p class="meta mt-1"><a href="tel:<?= e(PHONE_E164) ?>" data-track="call"><?= e(PHONE_DISPLAY) ?></a></p>
          <p class="meta"><?= e(HOURS_DISPLAY) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= lead_strip() ?>

<?= lp_split([
    'img'     => 'svc-skin',
    'alt'     => 'a sculpted cross-section of skin with a single hair follicle',
    'eyebrow' => 'The basics, plainly',
    'title'   => 'How Laser Hair Removal Works',
    'id'      => 'how-it-works',
    'html'    => '<p>Each pulse of laser light is absorbed by melanin, the pigment that colours hair, in the hair shaft and the root. There it turns into heat, which damages the follicle’s ability to grow a new hair while the surrounding skin absorbs as little as possible.</p>'
               . '<p>That is why contrast matters. Dark hair on lighter skin gives the laser a clear target. Darker skin holds more melanin of its own, which competes for the energy and raises the risk of burns or colour change if the settings do not suit it.</p>'
               . '<p>Hair also grows in cycles, and only follicles in the active growth phase respond well. One session reaches only part of the hair in an area, so treatment is planned as a course with gaps of several weeks between visits.</p>'
               . '<p><b>Matching the laser to the skin.</b> Lasers differ in wavelength. Longer wavelengths pass the pigment at the skin’s surface more readily, so they are generally considered more suitable for darker Indian skin types. The device and settings are chosen for your skin and hair.</p>'
               . '<p class="meta">Device and wavelength used at our clinic: ' . missing_fact('laser device and wavelength used at the clinic') . '</p>',
]) ?>

<section class="section section--canvas" id="expectations">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Realistic expectations</p>
      <h2 class="h2 mt-2">Reduction, Not Removal</h2>
      <p class="body mt-3">Laser hair removal is better described as long-term hair reduction. Many people see far less hair after a full course, and regrowth is often finer and lighter, but some hair usually returns and the response varies.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--pad-lg"><span class="pill">Sessions</span><h3 class="h3 mt-3">A course, not a one-off</h3><p class="body-s mt-2">Often six or more sessions, commonly four to eight weeks apart depending on the area; facial and hormone-driven hair often needs more. General ranges only — your plan follows your assessment.</p></div>
      <div class="card card--pad-lg"><span class="pill">Progress</span><h3 class="h3 mt-3">Gradual change</h3><p class="body-s mt-2">Treated hairs usually shed over one to three weeks. Each session thins the area a little more, so the change builds across the course rather than after one visit.</p></div>
      <div class="card card--pad-lg"><span class="pill">Later on</span><h3 class="h3 mt-3">Maintenance</h3><p class="body-s mt-2">Some follicles recover and others become active over time, especially with hormonal change, so occasional maintenance sessions are often needed.</p></div>
    </div>

    <div class="measure mt-6">
      <h3 class="h3" id="methods">Laser vs Waxing, Threading and Shaving</h3>
      <p class="body-s mt-2">Most people start a course after years of waxing, threading or shaving. This is how those methods differ from laser, and which of them can carry on once a course begins.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data data--fit">
          <caption class="sr-only">Hair removal methods compared with laser: what each does to the hair, and whether it can be used during a laser course. General patient education.</caption>
          <thead><tr><th scope="col">Method</th><th scope="col">What it does to the hair</th><th scope="col">During a laser course</th></tr></thead>
          <tbody>
            <?php foreach ($methodRows as $r): ?>
            <tr><th scope="row" style="white-space:normal;width:24%"><?= e($r[0]) ?></th><td><?= e($r[1]) ?></td><td><?= e($r[2]) ?></td></tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="note mt-5 measure"><p class="h4">What affects the cost</p><p class="body-s mt-2">The size and number of areas, and how many sessions you need. There is no headline price; the likely cost is explained after your assessment. How paying in instalments works is covered under <a href="/cost-and-emi-options">cost and EMI options</a>.</p></div>
  </div>
</section>

<section class="section section--white" id="suitability">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">Suitability</p>
        <h2 class="h2 mt-2">Does Laser Suit Your Skin and Hair?</h2>
        <p class="body mt-3">Two things decide how well laser works: the colour of the hair and of the skin around it. Indian skin covers a wide range of tones, and treatment is planned around yours after examination.</p>
      </div>
      <div class="grid grid--2">
        <div class="card"><h3 class="h4">Dark, coarse hair</h3><p class="body-s mt-2">Responds most reliably, because the hair holds plenty of pigment to target. This describes most unwanted hair in Indian patients.</p></div>
        <div class="card"><h3 class="h4">Darker skin types</h3><p class="body-s mt-2">Can be treated, more cautiously: a wavelength suited to darker skin, conservative settings, a patch test first and strict sun avoidance. See <a href="/blog/laser-hair-removal-patch-test">what the patch test checks on Indian skin</a>.</p></div>
        <div class="card"><h3 class="h4">White, grey, red or blonde hair</h3><p class="body-s mt-2">Responds poorly or not at all, as there is too little pigment to absorb the light. Electrolysis, which does not depend on pigment, is an alternative.</p></div>
        <div class="card"><h3 class="h4">Fine, soft hair</h3><p class="body-s mt-2">Light, downy hair responds unpredictably, and on the face carries a small risk of stimulating thicker growth (see side effects).</p></div>
        <div class="card card--dashed" style="grid-column:1 / -1">
          <h3 class="h4">When it is better to wait</h3>
          <p class="body-s mt-2">Pregnancy (usually put off until after the birth); an infection, cold sore or broken skin in the area; a recent tan or sunburn; light-sensitising medicines or recent isotretinoin — check with the doctor; keloid scarring; and tattoos or moles in the area.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="areas">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Where it is used</p>
      <h2 class="h2 mt-2">Areas Treated: How Many Sessions, How Far Apart</h2>
      <p class="body mt-3">Laser can be used wherever unwanted dark hair grows, apart from around the eyes. Larger areas take longer; smaller ones are often more sensitive. Most areas need six or more sessions, but what pushes that number up, and how long to leave between visits, differs from one area to the next.</p>
    </div>
    <div class="card mt-6" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data data--fit">
          <caption class="sr-only">Laser hair removal by area: what tends to change the number of sessions, and the usual spacing between them. General ranges for patient education, not a diagnosis or this clinic’s fixed protocol.</caption>
          <thead><tr><th scope="col">Area</th><th scope="col">What changes the number of sessions</th><th scope="col">Usual spacing</th></tr></thead>
          <tbody>
            <?php foreach ($areaRows as $r): ?>
            <tr><th scope="row" style="white-space:normal;width:24%"><?= e($r[0]) ?></th><td><?= e($r[1]) ?></td><td style="width:22%"><?= e($r[2]) ?></td></tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">The spacing shown is a general range, not this clinic’s fixed schedule. Your own gaps and likely number of sessions are set at the assessment, and adjusted as the course goes on.</p>
    <div class="note mt-4" style="display:flex;gap:16px;align-items:flex-start">
      <span style="flex:0 0 auto;display:inline-flex;margin-top:1px"><?= icon('info', 20, 'var(--accent-deep)', 1.8) ?></span>
      <p class="body-s">The eyebrows and the skin around the eyes are not treated, because laser light can injure the eye. Everyone in the room wears eye protection while the laser is in use.</p>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-hair-fall',
    'alt'     => 'a wooden comb resting on folded towels',
    'eyebrow' => 'Hormonal hair in women',
    'title'   => 'Facial Hair and PCOS',
    'id'      => 'pcos',
    'reverse' => true,
    'html'    => '<p>Excess dark hair on the upper lip, chin, jaw, neck or chest in women — called hirsutism — is often linked to polycystic ovary syndrome (PCOS) or another hormonal cause. Laser can reduce this hair and make it easier to manage, but it does not treat the hormones behind it.</p><p>Acne or pigmentation alongside the hair is assessed at a <a href="/skin-treatment-in-gurgaon">skin treatment consultation</a>.</p>'
               . '<p>Because the hormonal drive continues, this hair often needs more sessions and regular maintenance. The cause needs its own medical assessment, which may include blood tests and treatment from your doctor or gynaecologist; laser works alongside that care, not in place of it.</p>'
               . '<p><b>Have the cause checked first if</b> hair growth appears suddenly or worsens quickly, or comes with irregular periods, new acne or scalp thinning. See <a href="/womens-hair-loss-treatment-in-gurgaon">women’s hair loss treatment</a> and <a href="/blog/blood-tests-for-hair-fall">blood tests for hair fall</a>.</p>',
    'points'  => [
        'Laser reduces the hair; it does not treat the hormones',
        'More sessions and regular maintenance are common',
        'The cause gets its own medical assessment',
    ],
]) ?>

<?= lp_steps([
    'eyebrow' => 'Before and during',
    'title'   => 'Preparing for a Session',
    'id'      => 'preparation',
    'intro'   => 'Most people describe each pulse as a sharp snap or sting, like a rubber band flicked against the skin, followed by brief warmth; cooling helps. The upper lip, underarms and bikini line tend to feel sharper than the legs or back, and the skin may feel like mild sunburn for a few hours afterwards.',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',             'title' => 'Assessment and patch test',          'text' => 'Skin type, hair, medical history and medicines are reviewed, and a small test area is usually treated and checked after a few days before a full session.'],
        ['img' => 'step-procedure',    'alt' => 'sterile instruments laid out on a tray',           'title' => 'Shave — do not wax, thread or pluck', 'text' => 'Laser needs the root in place. Stop waxing, threading, plucking, epilating and bleaching for some weeks beforehand, as advised. Shaving is fine, usually a day or so before each session.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with dates circled',               'title' => 'Keep out of the sun',                'text' => 'Avoid sun tanning, sunbeds and fake tan before and between sessions, and use sunscreen. Tanned skin absorbs more of the laser and burns more easily.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram beside a notepad', 'title' => 'Mention every medicine',             'text' => 'Some antibiotics, acne treatments and herbal supplements make skin more sensitive to light. Tell the doctor what you take; do not stop a prescribed medicine without advice.'],
    ],
]) ?>

<section class="section section--white" id="risks">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Side effects and risks</p>
      <h2 class="h2 mt-2">Side Effects and Risks</h2>
      <p class="body mt-3">Most side effects are mild and short-lived; a few are less common but matter more, particularly on darker or tanned skin.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="card card--tint"><h3 class="h4">Redness and swelling</h3><p class="body-s mt-2">Redness and small bumps around each follicle are expected and usually settle within a day or two.</p></div>
      <div class="card card--tint"><h3 class="h4">Temporary pigment change</h3><p class="body-s mt-2">Darker or lighter patches can appear, more often on darker or tanned skin. They usually fade over weeks to months, occasionally longer.</p></div>
      <div class="card card--tint"><h3 class="h4">Burns and blistering</h3><p class="body-s mt-2">Possible when settings do not suit the skin type or the skin is tanned. They usually heal, but can rarely leave a scar or lasting colour change.</p></div>
      <div class="card card--tint"><h3 class="h4">Paradoxical hair growth</h3><p class="body-s mt-2">Rarely, hair near a treated area grows thicker or darker instead. Reported mainly on the face and neck, more often in darker skin and hormonal conditions.</p></div>
      <div class="card card--tint"><h3 class="h4">Eye injury</h3><p class="body-s mt-2">Laser light can damage the eye, so eye protection is worn throughout and the eye area is not treated.</p></div>
      <div class="card card--tint"><h3 class="h4">Flare-ups and irritation</h3><p class="body-s mt-2">Acne flares, inflamed follicles and, in people prone to them, cold sores can follow facial treatment.</p></div>
    </div>
    <div class="note mt-5" style="display:flex;gap:16px;align-items:flex-start">
      <span style="flex:0 0 auto;display:inline-flex;margin-top:1px"><?= icon('info', 20, 'var(--accent-deep)', 1.8) ?></span>
      <p class="body-s">Contact the clinic promptly about blistering, crusting, spreading redness or patches of changed skin colour after a session. Results vary, and none can be promised. A darker patch that is slow to fade is assessed like any other pigmentation; see <a href="/skin-treatment-in-gurgaon#by-concern">skin treatment for dark spots and pigmentation</a>.</p>
    </div>
  </div>
</section>

<?= lp_highlights([
    'eyebrow' => 'Laser in Gurugram',
    'title'   => 'Laser Aftercare in Gurugram’s Sun, Heat and Smog',
    'intro'   => 'The weather here affects a laser course more than most people expect. These are general points; the aftercare for your skin is explained after each session.',
    'tone'    => 'canvas',
    'items'   => [
        ['icon' => 'shield',   'title' => 'Strong sun',               'text' => 'A tan makes burns and colour change more likely and can mean a session is postponed. Put sunscreen on treated skin that sees daylight, such as the face, forearms and lower legs, and cover up where you can.'],
        ['icon' => 'clock',    'title' => 'Summer heat and sweat',    'text' => 'For a day or two after a session, skip the gym, hot yoga, steam and long spells outdoors, and wear loose clothes over treated underarms or the bikini line.'],
        ['icon' => 'layers',   'title' => 'Dust and the smog season', 'text' => 'Rinse treated skin with plain water and a mild cleanser, leave scrubs and peels for a few days, and use a plain moisturiser if dry winter air leaves it tight.'],
        ['icon' => 'calendar', 'title' => 'Holidays and events',      'text' => 'A beach holiday mid-course can mean waiting for a tan to fade. Avoid a session in the days just before a wedding or an event, as redness and bumps can last a day or two.'],
    ],
]) ?>

<section class="section section--white" id="questions">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">Before you pay for a course</p>
        <h2 class="h2 mt-2">Questions Worth Asking Any Laser Hair Removal Clinic</h2>
        <p class="body mt-3">A laser course runs for several months. These questions apply wherever you go, this clinic included, and any clinic should be able to answer each one plainly before you start.</p>
      </div>
      <div class="card card--pad-lg">
        <?= ticks([
            'Will a doctor examine my skin and hair before the first session?',
            'Who operates the laser at each session, and who is responsible if something goes wrong?',
            'What type of laser is used, and why does it suit my skin tone?',
            'Will a test spot be done first, and how long will you wait before treating the whole area?',
            'Roughly how many sessions will each area need, and at what intervals?',
            'Does everyone in the room wear eye protection?',
            'What is the plan if I get a burn, a blister or a patch of changed skin colour?',
            'Is the cost set out in writing, including any later top-up sessions?',
            'Should the cause of my hair growth be checked first?',
        ], false) ?>
      </div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Consultations and laser sessions at the Gurugram clinic are carried out by registered medical practitioners. Every doctor at DenceSpot is listed below with their qualifications.',
    '',
    false
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Laser Hair Removal in Gurgaon: FAQs</h2>
        <p class="body-s mt-3">General patient education; anything specific to you is answered at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'Laser Hair Removal at Our Gurugram Clinic',
    'Our Gurugram clinic is in Sector 39, ' . NAP_LANDMARK . '.'
) ?>

<?= lp_cta([
    'eyebrow'   => 'Sector 39, Gurugram',
    'title'     => 'Talk to a Doctor About Laser Hair Removal',
    'text'      => 'Bring your questions about the areas you want treated, your skin and hair, and any hormonal history. You will get an assessment, an honest view of how well laser is likely to work for you, and a plan if it is appropriate — with no pressure to book a course on the day.',
    'treatment' => 'Laser hair removal',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
