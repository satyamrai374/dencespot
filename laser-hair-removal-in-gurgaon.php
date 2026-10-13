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
 * from converging; link rather than copy).
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'Is laser hair removal permanent?',
     'a' => 'It gives long-term reduction rather than clearing every hair for good. Regrowth is often finer and lighter, but some hair usually returns, especially where hormones drive growth, and occasional maintenance sessions are common. No clinic can promise a hair-free result.'],
    ['q' => 'How many sessions will I need?',
     'a' => 'Often six or more, spaced several weeks apart, because laser only reaches follicles that are actively growing. Facial, hormone-related and finer hair usually needs more. Your own number is set after assessment.'],
    ['q' => 'Does laser hair removal hurt?',
     'a' => 'Each pulse feels like a sharp snap or sting followed by warmth, and most people find it manageable with cooling. Sensitive areas such as the upper lip feel sharper.'],
    ['q' => 'Is laser hair removal suitable for Indian skin?',
     'a' => 'For many people, yes, provided the wavelength and settings suit the skin type. Darker skin carries a higher risk of burns and pigment change, so treatment is more cautious and a patch test is usually done first.'],
    ['q' => 'Can laser help with facial hair caused by PCOS?',
     'a' => 'It can reduce the hair, but it does not treat PCOS. Hormone-driven hair often needs more sessions and maintenance, and the cause should be assessed and treated medically alongside laser.'],
    ['q' => 'Does laser work on grey, white, blonde or red hair?',
     'a' => 'Usually not. These hairs have too little dark pigment to absorb the light, so they respond poorly or not at all.'],
    ['q' => 'How much does laser hair removal cost in Gurgaon?',
     'a' => 'It depends on the areas treated and how many sessions you need, and is explained after your assessment rather than quoted as a single headline price.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Laser hair removal'],
];

$page = [
    'title'         => 'Laser Hair Removal in Gurgaon (Gurugram) | ' . SITE_NAME,
    'description'   => 'Laser hair removal in Gurgaon (Gurugram), Sector 39: how it works, how many sessions, Indian skin types, PCOS facial hair, preparation and side effects.',
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
            'Also available at our Rohini, Delhi clinic',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-laser-768.webp" srcset="/assets/img/services/svc-laser-512.webp 512w, /assets/img/services/svc-laser-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" width="768" height="960" alt="AI-generated illustration: a white handheld device on a white tray beside a folded sage-green towel" loading="eager" fetchpriority="high">
          <?php /* Chip moved to the top edge: on phones the badge card below overlaps the bottom of the image. */ ?>
          <?= str_replace('class="hp-ai-chip"', 'class="hp-ai-chip" style="top:12px;bottom:auto"', hp_ai_chip('AI-generated illustration')) ?>
        </div>
        <div class="hero__badge-card">
          <p class="eyebrow">Clinic 1 · Gurugram</p>
          <p class="h4 mt-1">Sector 39, <?= e(NAP_LANDMARK) ?></p>
          <p class="meta mt-1"><a href="tel:<?= e(PHONE_E164) ?>" data-track="call"><?= e(PHONE_DISPLAY) ?></a></p>
          <p class="meta"><?= e(HOURS_DISPLAY) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="how-it-works">
  <div class="wrap">
    <div class="split split--wide-left split--top">
      <div>
        <p class="eyebrow">The basics, plainly</p>
        <h2 class="h2 mt-2">How Laser Hair Removal Works</h2>
        <div class="stack mt-4 measure">
          <p class="body-l">Each pulse of laser light is absorbed by melanin, the pigment that colours hair, in the hair shaft and the root. There it turns into heat, which damages the follicle’s ability to grow a new hair while the surrounding skin absorbs as little as possible.</p>
          <p class="body-l">That is why contrast matters. Dark hair on lighter skin gives the laser a clear target. Darker skin holds more melanin of its own, which competes for the energy and raises the risk of burns or colour change if the settings do not suit it.</p>
          <p class="body-l">Hair also grows in cycles, and only follicles in the active growth phase respond well. One session reaches only part of the hair in an area, so treatment is planned as a course with gaps of several weeks between visits.</p>
        </div>
      </div>
      <div class="stack">
        <div class="card card--pad-lg">
          <p class="eyebrow" style="color:var(--ink-muted)">Equipment</p>
          <h3 class="h4 mt-2">Matching the laser to the skin</h3>
          <p class="body-s mt-2">Lasers differ in wavelength. Longer wavelengths pass the pigment at the skin’s surface more readily, so they are generally considered more suitable for darker Indian skin types. The device and settings are chosen for your skin and hair.</p>
          <p class="meta mt-3">Device and wavelength used at our clinic: <?= missing_fact('laser device and wavelength used at the clinic') ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

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
    <div class="grid grid--2 mt-4">
      <div class="note"><p class="h4">What affects the cost</p><p class="body-s mt-2">The size and number of areas, and how many sessions you need. There is no headline price; the likely cost is explained after your assessment.</p></div>
      <div class="note"><p class="h4">Closer to North-West Delhi?</p><p class="body-s mt-2">A course means several visits over some months. The same treatment is carried out at our Rohini clinic: see <a href="/laser-hair-removal-in-rohini">laser hair removal in Rohini</a>.</p></div>
    </div>
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
        <div class="card"><h3 class="h4">Darker skin types</h3><p class="body-s mt-2">Can be treated, more cautiously: a wavelength suited to darker skin, conservative settings, a patch test first and strict sun avoidance.</p></div>
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
      <h2 class="h2 mt-2">Areas Commonly Treated</h2>
      <p class="body mt-3">Laser can be used wherever unwanted dark hair grows, apart from around the eyes. Larger areas take longer; smaller ones are often more sensitive.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card"><h3 class="h4">Face</h3><p class="body-s mt-2">Upper lip, chin, jawline and sides of the face. Often hormone-driven, so more sessions and maintenance are common.</p></div>
      <div class="card"><h3 class="h4">Underarms</h3><p class="body-s mt-2">Dense, dark hair that usually responds well. Leave off deodorant on the day.</p></div>
      <div class="card"><h3 class="h4">Arms</h3><p class="body-s mt-2">Coarse upper-arm hair tends to respond better than finer forearm hair.</p></div>
      <div class="card"><h3 class="h4">Legs</h3><p class="body-s mt-2">A large area and a longer session. Lower legs catch the sun, so avoid a tan.</p></div>
      <div class="card"><h3 class="h4">Back and chest</h3><p class="body-s mt-2">Often requested by men with coarse, dark hair over a broad area.</p></div>
      <div class="card"><h3 class="h4">Bikini line</h3><p class="body-s mt-2">Sensitive, and the skin is often darker, so settings are chosen with particular care.</p></div>
    </div>
    <div class="note mt-4" style="display:flex;gap:16px;align-items:flex-start">
      <span style="flex:0 0 auto;display:inline-flex;margin-top:1px"><?= icon('info', 20, 'var(--accent-deep)', 1.8) ?></span>
      <p class="body-s">The eyebrows and the skin around the eyes are not treated, because laser light can injure the eye. Everyone in the room wears eye protection while the laser is in use.</p>
    </div>
  </div>
</section>

<section class="section section--white" id="pcos">
  <div class="wrap">
    <div class="split split--wide-left split--top">
      <div>
        <p class="eyebrow">Hormonal hair in women</p>
        <h2 class="h2 mt-2">Facial Hair and PCOS</h2>
        <div class="stack mt-4 measure">
          <p class="body-l">Excess dark hair on the upper lip, chin, jaw, neck or chest in women — called hirsutism — is often linked to polycystic ovary syndrome (PCOS) or another hormonal cause. Laser can reduce this hair and make it easier to manage, but it does not treat the hormones behind it.</p>
          <p class="body-l">Because the hormonal drive continues, this hair often needs more sessions and regular maintenance. The cause needs its own medical assessment, which may include blood tests and treatment from your doctor or gynaecologist; laser works alongside that care, not in place of it.</p>
        </div>
      </div>
      <div class="stack">
        <div class="note">
          <p class="h4">Have the cause checked first if…</p>
          <p class="body-s mt-2">Hair growth appears suddenly or worsens quickly, or comes with irregular periods, new acne or scalp thinning. See <a href="/womens-hair-loss-treatment-in-gurgaon">women’s hair loss treatment</a> and <a href="/blog/blood-tests-for-hair-fall">blood tests for hair fall</a>.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="preparation">
  <div class="wrap">
    <div class="split split--wide-left split--top">
      <div>
        <p class="eyebrow">Before and during</p>
        <h2 class="h2 mt-2">Preparing for a Session</h2>
        <div class="stack mt-5">
          <div class="step"><span class="step-num">1</span><div><h3 class="h4">Assessment and patch test</h3><p class="body-s mt-2">Skin type, hair, medical history and medicines are reviewed, and a small test area is usually treated and checked after a few days before a full session.</p></div></div>
          <div class="step"><span class="step-num">2</span><div><h3 class="h4">Shave — do not wax, thread or pluck</h3><p class="body-s mt-2">Laser needs the root in place. Stop waxing, threading, plucking, epilating and bleaching for some weeks beforehand, as advised. Shaving is fine, usually a day or so before each session.</p></div></div>
          <div class="step"><span class="step-num">3</span><div><h3 class="h4">Keep out of the sun</h3><p class="body-s mt-2">Avoid sun tanning, sunbeds and fake tan before and between sessions, and use sunscreen. Tanned skin absorbs more of the laser and burns more easily.</p></div></div>
          <div class="step"><span class="step-num">4</span><div><h3 class="h4">Mention every medicine</h3><p class="body-s mt-2">Some antibiotics, acne treatments and herbal supplements make skin more sensitive to light. Tell the doctor what you take; do not stop a prescribed medicine without advice.</p></div></div>
        </div>
      </div>
      <div class="stack">
        <div class="card card--pad-lg">
          <p class="eyebrow" style="color:var(--ink-muted)">What it feels like</p>
          <p class="body-s mt-2">Most people describe each pulse as a sharp snap or sting, like a rubber band flicked against the skin, followed by brief warmth. Cooling helps.</p>
          <p class="body-s mt-2">The upper lip, underarms and bikini line tend to feel sharper than the legs or back, and the skin may feel like mild sunburn for a few hours afterwards.</p>
        </div>
      </div>
    </div>
  </div>
</section>

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
      <p class="body-s">Contact the clinic promptly about blistering, crusting, spreading redness or patches of changed skin colour after a session. Results vary, and none can be promised.</p>
    </div>
  </div>
</section>

<?= doctor_block(
    'Consultations and laser sessions at the Gurugram clinic are carried out by registered medical practitioners. Every doctor at DenceSpot is listed below with qualifications and registration details.',
    '',
    false
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Laser Hair Removal FAQs</h2>
        <p class="body-s mt-3">General patient education; anything specific to you is answered at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'Laser Hair Removal at Our Gurugram Clinic',
    'Our Gurugram clinic is in Sector 39, ' . NAP_LANDMARK . '. Laser hair removal is also carried out at our Rohini clinic in North-West Delhi, so you can choose whichever is easier to reach for a course of visits.'
) ?>

<?= cta_band(
    'Talk to a Doctor About Laser Hair Removal',
    'Bring your questions about the areas you want treated, your skin and hair, and any hormonal history. You will get an assessment, an honest view of how well laser is likely to work for you, and a plan if it is appropriate — with no pressure to book a course on the day.',
    'laser-hair-removal-gurgaon',
    ['Laser hair removal — face', 'Laser hair removal — underarms', 'Laser hair removal — arms or legs', 'Laser hair removal — back or chest', 'Laser hair removal — bikini line', 'Facial hair with PCOS', 'Not sure — please advise']
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
