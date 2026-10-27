<?php
/**
 * /laser-hair-removal-in-delhi — the Delhi laser hair removal pillar page,
 * for the Rohini clinic.
 *
 * Built 27 Oct 2026 at the client's request ("same like hair transplant delhi
 * type"), section for section on /hair-transplant-in-delhi:
 *
 *  1. Treatment overview: copy, the usual gaps by area, at a glance
 *  2. Why DenceSpot, beside the Rohini clinic's map
 *  3. Treatment areas: the area table, in place of the before/after row (no
 *     consented laser photographs are on record)
 *  4. The doctors: the homepage's three tiles, worded for laser at Rohini
 *  5. Skin types: laser on Indian skin, the patch test, how settings are chosen
 *  6. The course: five stages, with icons
 *  7. Cost: factors, laser compared with other methods, what the plan covers;
 *     no prices
 *  8. Patient reviews: a link to the Rohini clinic's Google profile
 *  9. FAQs (the same array drives the JSON-LD; six shown, the rest behind
 *     "View more")
 * 10. Consultation: the Rohini clinic's details and form
 *
 * Just above the footer, "Serving Patients Across Delhi" links every Delhi
 * laser area page ($page['service_areas'] => 'laser'), in place of the
 * treatment links; Rohini's entry is the clinic's own /laser-hair-removal-in-
 * rohini.
 *
 * Facts and limits as on /laser-hair-removal-in-rohini: the device,
 * wavelength, who runs each session and prices are not on record, so none is
 * stated, and session ranges are general, never this clinic's protocol. The
 * hero is the licensed stock photo labelled representative (no AI images on
 * Rohini pages). Not yet reviewed by the clinic's doctor.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';
require_once __DIR__ . '/includes/delhi-laser.php';

$url = DELHI_LASER_HUB;

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Laser Hair Removal in Delhi'],
];

/** Laser beside the usual home methods: general patient education. */
$methods = [
    ['method' => 'Shaving',              'lasts' => 'A day or two',            'note' => 'Cuts the hair at the surface; fine between laser sessions.'],
    ['method' => 'Threading and waxing', 'lasts' => 'A few weeks',             'note' => 'Pull out the root, so they stop for a laser course.'],
    ['method' => 'Hair removal creams',  'lasts' => 'A few days',              'note' => 'Dissolve the hair at the surface; can irritate skin.'],
    ['method' => 'Laser',                'lasts' => 'Months, with top-ups',    'note' => 'Reduces regrowth over a course; it does not clear every hair.'],
];

/* Suitability, sessions, skin type, the patch test, pain and cost first; the
   rest sit behind "View more". */
$faqs = [
    ['q' => 'Who is suitable for laser hair removal?',
     'a' => 'Dark, coarse hair tends to respond most predictably, because the laser needs pigment in the hair to absorb its light. Grey, white, red and blonde hair responds poorly or not at all. Darker skin can often be treated, more cautiously and after a patch test, and new or increasing facial hair in women is worth checking for a hormonal cause such as PCOS first. Suitability is decided at an assessment of your skin and hair.'],
    ['q' => 'How many sessions will I need?',
     'a' => 'Often six or more, because only follicles that are actively growing a hair respond to each session. Facial areas are usually treated every four to six weeks and body areas every six to eight weeks or more. Facial, finer or hormone-driven hair often needs more sessions, and some hair usually returns later, so occasional top-ups are common. These are general ranges; yours are set at the assessment.'],
    ['q' => 'Can laser hair removal be done on Indian skin?',
     'a' => 'Often, yes, as long as the wavelength and settings suit the skin. Indian skin covers a wide range of tones, and the darker the skin, the higher the risk of burns and of darker or lighter patches, so settings are kept cautious and a patch test usually comes first. Ask which laser and wavelength is planned for your skin type.'],
    ['q' => 'Is a patch test needed?',
     'a' => 'Usually, yes. A small spot is treated at the planned settings and looked at again a few days later, before a whole area is treated. On darker or recently tanned skin the wait matters more, because a reaction can take time to show. <a href="/blog/laser-hair-removal-patch-test">What the patch test checks on Indian skin</a> explains it in more detail.'],
    ['q' => 'Does laser hair removal hurt?',
     'a' => 'Most people describe a quick, hot sting with each pulse rather than constant pain. Cooling takes the edge off, thin-skinned areas such as the upper lip sting more, and the skin may stay warm and pink for a few hours.'],
    ['q' => 'How much does laser hair removal cost in Delhi?',
     'a' => 'There is no fixed headline price, because the cost follows which areas are treated, how large they are and how many sessions your skin and hair are likely to need. At the Rohini clinic it is explained after your assessment, with the factors set out in your plan, before you commit to a course. Instalment options through third-party lenders may be available; see <a href="/cost-and-emi-options">cost and EMI options</a>.'],
    ['q' => 'Will the hair stay away for good?',
     'a' => 'Laser reduces hair rather than removing every hair for good. Regrowth after a course is usually finer, lighter and slower, and some hair often returns over the following months or years, more so where hormones drive growth. <a href="/blog/is-laser-hair-removal-permanent">Why laser reduces hair rather than removing it for good</a> explains why.'],
    ['q' => 'How should I prepare for a session?',
     'a' => 'Shave the area a day or so before, and arrive without cream, deodorant or make-up on it. Stop waxing, threading, plucking and epilating for the whole course, avoid tanning, and tell the clinic about any new medicine, recent sun exposure or a pregnancy.'],
    ['q' => 'Can I shave between sessions?',
     'a' => 'Yes. Shaving leaves the root in place, which the laser needs. Waxing, threading, plucking and epilating remove the root and should stop for the whole course.'],
    ['q' => 'What are the possible side effects?',
     'a' => 'Redness and small bumps around the follicles for a day or two are expected. Less often there can be blistering, crusting, burns or darker or lighter patches of skin, more often on darker or tanned skin; these usually fade but can rarely last or scar. In rare cases, skin near a treated area starts growing thicker hair. Contact the Rohini clinic on ' . LOC_DELHI_PHONE_DISPLAY . ' if the skin blisters, crusts or reddens over a widening area.'],
    ['q' => 'Which areas can be treated?',
     'a' => 'The upper lip, chin, jawline and neck, underarms, arms, legs, back and shoulders, chest and abdomen, and the bikini line. The eyebrows and anywhere close to the eyes are not treated, because of the risk to sight; tattoos are avoided and moles are usually covered.'],
    ['q' => 'Can men have laser hair removal?',
     'a' => 'Yes. Men often ask about the back, shoulders and chest, and about the beard line and neck where shaving causes ingrown hairs and razor bumps. Coarse, dark hair on these areas tends to respond well, though large areas take longer per session.'],
    ['q' => 'Does the time of year matter for starting a course?',
     'a' => 'There is no single right time, but a tan raises the risk of burns and pigment change, so some people start body areas in Delhi’s cooler months, when less skin is in the sun. Whenever you start, keep treated skin covered, use sunscreen and keep the gaps between sessions steady.'],
    ['q' => 'Can I have laser hair removal while pregnant?',
     'a' => 'It is usually postponed during pregnancy as a precaution, and hair growth often changes in pregnancy anyway. Tell the clinic if you are pregnant or planning a pregnancy, so the course can be timed around it.'],
    ['q' => 'Which parts of Delhi do you see patients from?',
     'a' => 'DenceSpot has one clinic in Delhi, in Rohini, North-West Delhi. The assessment, the patch test and every session take place there, so patients from other parts of the city travel to Rohini for each visit of the course. The areas we serve are listed at the foot of this page, and the Directions button below opens the clinic on Google Maps.'],
];

$page = [
    'title'         => 'Laser Hair Removal in Delhi: Sessions & Cost | DenceSpot',
    'description'   => 'Laser hair removal in Delhi at DenceSpot’s Rohini clinic: the patch test, sessions by area, laser on Indian skin, cost factors, aftercare and FAQs.',
    'url'           => $url,
    'body_class'    => 'tx-rich',
    'crumbs'        => $crumbs,
    'location'      => 'rohini',
    'service_areas' => 'laser',
    'keywords'      => ['laser hair removal in delhi', 'laser hair removal delhi', 'laser hair reduction in delhi', 'laser hair removal cost in delhi', 'laser hair removal for indian skin', 'laser hair removal clinic in rohini delhi', SITE_NAME],
    'schema'        => [
        schema_delhi_clinic(),
        schema_breadcrumbs($crumbs),
        schema_procedure($url, [
            'name'              => 'Laser Hair Removal',
            'description'       => 'Laser hair removal reduces unwanted hair over a course of sessions, with laser light absorbed by pigment in the hair follicle, at the Rohini clinic in Delhi.',
            'alternateName'     => ['Laser hair reduction', 'Laser Hair Removal in Delhi'],
            'procedureType'     => 'https://schema.org/NoninvasiveProcedure',
            'bodyLocation'      => 'Face and body: upper lip, chin, jawline, neck, underarms, arms, legs, back, chest, abdomen, bikini line',
            'howPerformed'      => 'Laser light absorbed by pigment in the hair follicle heats it and reduces its ability to regrow hair. Given as a course of sessions several weeks apart, since only actively growing follicles respond; facial areas are usually treated at shorter intervals than body areas. Settings are chosen for the patient\'s skin type and hair colour, at the Rohini, Delhi clinic.',
            'preparation'       => 'Consultation covering medical history, medication and current hair-removal habits; examination of skin type and hair colour; a patch test is usually done before the first full session. The area is shaved rather than waxed, threaded or plucked, and sun tanning is avoided.',
            'followup'          => 'Cool compresses and avoidance of heat, friction and sun after each session; shaving only between sessions; maintenance sessions where hair returns.',
            'expectedPrognosis' => 'Hair is reduced rather than removed entirely. A course often runs to six or more sessions, regrowth is commonly finer and lighter, and occasional maintenance is often needed. Results vary between patients and cannot be promised.',
            'location'          => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
            'performer'         => null,
        ]),
        schema_faq($url, $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<?= delhi_hero([
    'pill'      => 'Rohini, North-West Delhi',
    'title'     => 'Laser Hair Removal in Delhi',
    'lead'      => 'Laser hair removal for the face and body at our Rohini clinic, planned around your skin type and hair colour after an assessment by a doctor — with a patch test before the first full session.',
    'feats'     => [
        ['user', 'Skin & hair assessed first'],
        ['shield', 'Patch test before a session'],
        ['list', 'Face & body areas'],
        ['doc', 'Written course plan'],
    ],
    'treatment' => 'Laser hair removal',
]) ?>

<!-- 1. Treatment overview -->
<section class="section ht-sec ht-overview-sec" id="about">
  <div class="wrap">
    <div class="ht-overview">
      <div class="ht-overview__text">
        <p class="eyebrow">About the treatment</p>
        <h2 class="h2 mt-2">How Laser Hair Removal Works</h2>
        <p class="body mt-3">Laser light is absorbed by the dark pigment in a hair, and the heat it makes travels down to the follicle and reduces its ability to grow a new hair. Only follicles that are actively growing a hair respond, and hairs grow in staggered cycles, so a course of sessions several weeks apart is needed. Laser reduces hair rather than removing every hair for good: regrowth is usually finer and lighter, and occasional top-ups are common.</p>
        <p class="body mt-3">In Delhi, DenceSpot’s laser hair removal is carried out at the Rohini clinic, after your skin and hair have been assessed by a registered medical practitioner.</p>
        <div class="btn-row mt-4">
          <a class="btn btn--ink" href="/laser-hair-removal-in-rohini">Laser Hair Removal at the Rohini Clinic <?= icon('arrow', 16) ?></a>
        </div>
      </div>

      <?= delhi_laser_areas_card() ?>

      <?= delhi_glance([
          ['shield', 'mint', 'Patch test first', 'Usually before the first full session'],
          ['calendar', 'violet', 'A course of sessions', 'Often six or more'],
          ['clock', 'sky', 'Back to work', 'Usually the same day'],
          ['chart', 'amber', 'Regrowth', 'Finer and lighter; top-ups later'],
      ], 'Laser hair removal at a glance') ?>
    </div>
  </div>
</section>

<!-- 2. Why DenceSpot, beside the clinic's map -->
<?= delhi_band([
    'id'      => 'why',
    'eyebrow' => 'Why DenceSpot',
    'heading' => 'Why Choose DenceSpot for Laser Hair Removal in Delhi?',
    'intro'   => 'How each course is handled at the Rohini clinic, from the first assessment to the written plan.',
    'icons'   => [
        ['user', 'Doctor-Assessed Skin & Hair'],
        ['shield', 'Patch Test Before a Full Session'],
        ['doc', 'Written Course Plan'],
        ['pin', 'Rohini Clinic, North-West Delhi'],
        ['clock', 'Open ' . str_replace(' · ', ', ', HOURS_DISPLAY)],
        ['rupee', 'Cost Explained Before You Start'],
    ],
    'media'   => 'map',
]) ?>

<!-- 3. Treatment areas -->
<section class="section ht-sec section--white" id="areas">
  <div class="wrap">
    <div style="max-width:68ch">
      <p class="eyebrow">Area by area</p>
      <h2 class="h2 mt-2">Laser Hair Removal by Area</h2>
      <p class="body mt-3">Facial areas are usually treated at shorter gaps than the body, and each area responds a little differently. The gaps and session numbers below are general ranges, not this clinic’s fixed protocol; yours are set at the assessment.</p>
    </div>
    <div class="card mt-6" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data data--wide">
          <caption class="sr-only">Laser hair removal by treatment area: usual gap between sessions, usual number of sessions and notes. General ranges for patient education, not this clinic’s protocol.</caption>
          <thead>
            <tr><th scope="col">Area</th><th scope="col">Usual gap</th><th scope="col">Sessions (general range)</th><th scope="col">Worth knowing</th></tr>
          </thead>
          <tbody>
            <?php foreach (DELHI_LASER_AREAS as [$area, $gap, $sessions, $note]): ?>
            <tr>
              <th scope="row" style="font-size:15px;font-weight:700;white-space:normal;min-width:130px"><?= e($area) ?></th>
              <td style="white-space:nowrap"><?= e($gap) ?></td>
              <td style="min-width:150px"><?= e($sessions) ?></td>
              <td><?= e($note) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="note mt-4" style="display:flex;gap:16px;align-items:flex-start">
      <span style="flex:0 0 auto;display:inline-flex;margin-top:1px"><?= icon('info', 20, 'var(--accent-deep)', 1.8) ?></span>
      <p class="body-s">Not treated: the eyebrows or anywhere close to the eyes, because of the risk to sight. Tattoos are avoided, and moles are usually covered.</p>
    </div>
  </div>
</section>

<!-- 4. The doctors: the same three tiles as the homepage -->
<?= doctors_grid_section(
    'Our doctors',
    'Meet the Doctors at DenceSpot',
    'Every laser course starts with an assessment of your skin and hair by a doctor. The doctor who will see you at the Rohini clinic is named at your consultation, and you can ask about their qualifications, registration and experience with laser on your skin type.',
    'section--canvas ht-sec',
    page_review_signed_off()
) ?>

<!-- 5. Skin types -->
<section class="section ht-sec section--white" id="skin-types">
  <div class="wrap">
    <div style="max-width:68ch">
      <p class="eyebrow">Skin type</p>
      <h2 class="h2 mt-2">Laser on Indian Skin Types</h2>
      <p class="body mt-3">Laser works because the dark pigment in a hair absorbs its light. Skin carries pigment too, and Indian skin covers a wide range of tones, so the darker the skin, the more carefully the settings are chosen to heat the follicle without marking the skin around it.</p>
    </div>

    <div class="ht-tech">
      <div class="card card--pad-lg tech-card tone--mint">
        <span class="icon-dot"><?= icon('user', 24) ?></span>
        <h3 class="h3">Skin Type and Hair Colour</h3>
        <p class="body-s mt-2">The contrast between hair and skin matters most. Longer wavelengths pass the pigment at the skin’s surface more readily, so they are generally considered for darker skin types.</p>
        <?= ticks([
            'Dark, coarse hair on lighter-brown skin responds most predictably',
            'Darker skin can be treated, more cautiously',
            'Grey, white, red and blonde hair responds poorly',
        ], false) ?>
        <a class="btn btn--outline btn--sm mt-4" href="/laser-hair-removal-in-rohini#skin-types">Laser on Indian skin in Rohini <?= icon('arrow', 14) ?></a>
      </div>

      <div class="card card--pad-lg tech-card tone--violet">
        <span class="icon-dot"><?= icon('shield', 24) ?></span>
        <h3 class="h3">The Patch Test</h3>
        <p class="body-s mt-2">A small spot is treated at the planned settings and looked at again a few days later, before a whole area is treated. It matters most on darker or recently tanned skin.</p>
        <?= ticks([
            'A discreet spot in or near the area to be treated',
            'Checked again after a few days',
            'Any reaction changes the settings, or the plan',
        ], false) ?>
        <a class="btn btn--outline btn--sm mt-4" href="/blog/laser-hair-removal-patch-test">The patch test on Indian skin <?= icon('arrow', 14) ?></a>
      </div>

      <div class="tint-card tone--sky ht-tech__choose">
        <h3 class="h4">How the Settings Are Chosen</h3>
        <div class="mt-3"><?= ticks([
            'Your skin type, and any tan or pigmentation',
            'The colour and thickness of the hair',
            'The area, and how thin its skin is',
            'Medicines that make skin more sensitive to light',
            'How your skin reacted to the patch test and the last session',
        ], false) ?></div>
        <p class="body-s mt-4">Ask which laser and wavelength is planned for your skin type at the consultation. Facial hair from PCOS or another hormonal cause needs medical assessment too: see <a href="/blog/laser-hair-removal-for-pcos-facial-hair">laser for PCOS facial hair</a>.</p>
      </div>
    </div>
  </div>
</section>

<!-- 6. The course -->
<?= delhi_laser_steps() ?>

<!-- 7. Cost -->
<section class="section ht-sec section--white" id="cost">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Cost</p>
        <h2 class="h2 mt-2">Laser Hair Removal Cost in Delhi</h2>
        <p class="body mt-3 measure">There is no fixed headline price, because no two courses treat the same areas over the same number of sessions. The cost is explained after your assessment at the Rohini clinic, with the factors behind it set out in your plan, before you commit to a course.</p>

        <div class="factor-list">
          <div class="factor tone--mint"><span class="icon-dot"><?= icon('list', 20) ?></span><div><b>Areas treated</b><span>Which areas, and how many in one session.</span></div></div>
          <div class="factor tone--violet"><span class="icon-dot"><?= icon('scale', 20) ?></span><div><b>Size of each area</b><span>An upper lip takes minutes; both legs or a back far longer.</span></div></div>
          <div class="factor tone--sky"><span class="icon-dot"><?= icon('calendar', 20) ?></span><div><b>Number of sessions</b><span>Finer, lighter or hormone-driven hair usually needs more.</span></div></div>
          <div class="factor tone--amber"><span class="icon-dot"><?= icon('user', 20) ?></span><div><b>Skin and hair</b><span>Darker skin is treated more cautiously, which can add sessions.</span></div></div>
          <div class="factor tone--rose"><span class="icon-dot"><?= icon('clock', 20) ?></span><div><b>Top-ups later</b><span>Some hair usually returns; maintenance is priced separately.</span></div></div>
        </div>

        <p class="meta mt-4 measure">On “per session” prices: the number of sessions your hair needs matters as much as the rate. Ask any clinic for the likely range of sessions and what a top-up costs.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--ink" href="#consultation"><?= icon('calendar', 17) ?> Plan Your Laser Course</a>
        </div>
        <ul class="ht-patterns mt-3">
          <li><a href="/laser-hair-removal-in-rohini">Laser at the Rohini clinic <?= icon('arrow', 14) ?></a></li>
          <li><a href="/cost-and-emi-options">EMI and payment <?= icon('arrow', 14) ?></a></li>
        </ul>
      </div>

      <div>
        <div class="card band-card">
          <div class="band-card__head">
            <h3 class="h4">Laser Compared With Other Methods</h3>
            <p>General patient education.</p>
          </div>
          <div class="table-scroll">
            <table class="data data--fit">
              <caption class="sr-only">Laser hair removal compared with shaving, threading, waxing and creams — general patient education</caption>
              <thead>
                <tr><th scope="col">Method</th><th scope="col">Lasts</th><th scope="col">Worth knowing</th></tr>
              </thead>
              <tbody>
                <?php foreach ($methods as $m): ?>
                <tr>
                  <th scope="row" style="color:var(--ink);font-size:14px;font-weight:700;text-transform:none;letter-spacing:0"><?= e($m['method']) ?></th>
                  <td style="font-weight:700;color:var(--tone-mint)"><?= e($m['lasts']) ?></td>
                  <td><?= e($m['note']) ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="tint-card tone--mint mt-4">
          <h3 class="h4">What Your Written Plan Sets Out</h3>
          <div class="mt-3"><?= ticks([
              'The areas to be treated',
              'A likely range of sessions',
              'The gap between visits for each area',
              'How to prepare before each session',
              'What affects the cost of the course',
              'When a top-up may be needed',
          ]) ?></div>
          <p class="body-s mt-4">A medical check for a hormonal cause, or skin treatment for pigmentation, is named separately if your plan needs it.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php /* 8. Patient reviews. The site's review widget shows the Gurugram
           listing, which a Rohini page does not carry (location rule), so
           this links to the Rohini clinic's own Google profile instead. */ ?>
<section class="section section--canvas ht-sec" id="reviews">
  <div class="wrap">
    <div class="measure" style="text-align:center;margin-inline:auto">
      <span class="pill pill--dot">Patient reviews</span>
      <h2 class="h2 mt-2">Reviews of Our Rohini Clinic on Google</h2>
      <p class="body mt-3">Reviews of DenceSpot’s Rohini clinic are on its Google Business Profile, unedited and in each reviewer’s own words. This page does not reproduce testimonials.</p>
    </div>
    <div class="btn-row mt-5" style="justify-content:center">
      <a class="btn btn--ink" href="<?= e(LOC_DELHI_MAPS_URL) ?>" target="_blank" rel="noopener"><?= icon('star', 18) ?> Read Rohini Clinic Reviews on Google<span class="sr-only"> (opens in a new tab)</span></a>
      <a class="btn btn--outline" href="/patient-reviews">How we collect reviews</a>
    </div>
  </div>
</section>

<!-- 9. FAQs -->
<section class="section ht-sec section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Laser Hair Removal in Delhi: FAQs</h2>
        <p class="body-s mt-3">General patient education. Anything specific to your skin, hair, health or budget is answered at the consultation.</p>
        <div class="btn-row mt-4">
          <a class="btn btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
        </div>
      </div>

      <?= faq_list($faqs, 1, 6) ?>
    </div>
  </div>
</section>

<!-- 10. Consultation -->
<?= delhi_consult(
    'Book a Laser Hair Removal Consultation in Delhi',
    'Meet the doctor at the Rohini clinic for an assessment of your skin and hair, a patch test where appropriate and a written plan for the course. You are not asked to book a course on the day.',
    'laser-hair-removal-delhi',
    DELHI_LASER_FORM
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
