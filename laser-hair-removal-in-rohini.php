<?php
/**
 * /laser-hair-removal-in-rohini — laser hair removal at the Rohini (Delhi)
 * clinic. New page, October 2026.
 *
 * The agency confirmed on 13 Oct 2026 that every service, laser hair removal
 * included, is carried out at the Rohini clinic. Not stated because not on
 * record: the Rohini street address, which doctor works there, the laser
 * device and wavelength, prices, and any session protocol as this clinic's
 * own (intervals and session counts below are general ranges).
 *
 * Twin of /laser-hair-removal-in-gurgaon, which carries the full explanation
 * (how laser works, suitability, PCOS, side effects). This page takes a
 * different angle — a course close to home, the first visit, session by
 * session, area notes, aftercare between sessions — and links there for
 * depth. Keep the two from converging: reuse facts, not sentences.
 *
 * Not yet reviewed by the clinic's doctor: doctor_block(..., false), no
 * "medically reviewed" line, not in MEDICAL_PAGES. NMC Guidelines of
 * 06.10.2026 apply. The hero image is an AI-generated illustration and is
 * labelled as one (cl. 7.2).
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/** General notes by area — patient education, not this clinic's protocol. */
$areaNotes = [
    ['area' => 'Upper lip and chin',  'note' => 'Often hormone-related, so more sessions and later top-ups are common. Stop threading well before the course begins.'],
    ['area' => 'Jawline and neck',    'note' => 'Sometimes chosen by men troubled by ingrown hairs after shaving, as well as by women with hormonal hair. Rare paradoxical growth is reported more often on the face and neck.'],
    ['area' => 'Underarms',           'note' => 'Dense, dark hair that tends to respond well. Skip deodorant on the day of a session.'],
    ['area' => 'Arms',                'note' => 'Forearm hair is often finer, and less predictable, than coarse hair elsewhere on the body.'],
    ['area' => 'Legs',                'note' => 'Large, so each session runs longer. Lower legs get more sun than most areas, so tanning is the main thing to manage between visits.'],
    ['area' => 'Back and shoulders',  'note' => 'Broad areas of coarse hair, mostly in men. Sessions take longer, and someone at home may need to shave the parts you cannot reach.'],
    ['area' => 'Chest and abdomen',   'note' => 'Treated in men and women. In women, new hair here is worth mentioning at the consultation, as it can point to a hormonal cause.'],
    ['area' => 'Bikini line',         'note' => 'Skin here is often darker than elsewhere and more tender, so the settings are kept cautious.'],
];

$faqs = [
    ['q' => 'Is laser hair removal done at the Rohini clinic or in Gurugram?',
     'a' => 'It is carried out at the Rohini clinic itself, from the first assessment to each session in the course. The same treatment is also available at our Sector 39 clinic in Gurugram, and you can choose either clinic when you book.'],
    ['q' => 'Which parts of Delhi is the Rohini clinic convenient for?',
     'a' => 'The clinic is in Rohini, North-West Delhi, near the Outer Ring Road, which makes it convenient for North and North-West Delhi, including Rohini, Pitampura, Shalimar Bagh and Prashant Vihar. The Directions link on this page opens it in Google Maps.'],
    ['q' => 'How often will I need to come in?',
     'a' => 'Facial areas are often treated every four to six weeks and body areas at gaps of six to eight weeks or more, usually over six or more visits. These are general ranges; the gap for each of your areas is set at your assessment.'],
    ['q' => 'Can I shave between sessions?',
     'a' => 'Yes. Shaving leaves the root in place, which the laser needs. Waxing, threading, plucking and epilating remove the root and should be stopped for the whole course.'],
    ['q' => 'What does a session feel like?',
     'a' => 'Expect a quick, hot sting with each pulse rather than constant pain. Cooling takes the edge off, thin-skinned spots like the upper lip sting more, and the skin may stay warm and pink for a few hours.'],
    ['q' => 'What if I miss a session or get a tan?',
     'a' => 'A short delay is rarely a problem, though long gaps slow progress. Tanned skin burns more easily, so after time in the sun let the clinic know before your next session; it may need to wait until the tan fades.'],
    ['q' => 'How much does a course cost at the Rohini clinic?',
     'a' => 'It depends on which areas are treated, how large they are and how many sessions you are likely to need. The cost is explained after your assessment, with the factors behind it set out in your plan, rather than as a fixed headline price.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Laser hair removal in Rohini'],
];

$page = [
    'title'         => 'Laser Hair Removal in Rohini, Delhi | ' . SITE_NAME,
    'description'   => 'Laser hair removal at our Rohini clinic, North-West Delhi: the first visit and patch test, how a course runs session by session, area notes and aftercare.',
    'url'           => '/laser-hair-removal-in-rohini',
    'crumbs'        => $crumbs,
    'preload_image' => '/assets/img/services/svc-laser-768.webp',
    'schema'        => [
        schema_delhi_clinic(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/laser-hair-removal-in-rohini', [
            'name'          => 'Laser Hair Removal',
            'alternateName' => ['Laser hair reduction', 'Laser hair removal in Rohini, Delhi'],
            'procedureType' => 'https://schema.org/NoninvasiveProcedure',
            'bodyLocation'  => 'Face and body: upper lip, chin, jawline, neck, underarms, arms, legs, back, chest, abdomen, bikini line',
            'howPerformed'  => 'Laser light absorbed by pigment in the hair follicle heats it and damages its ability to regrow hair. Given as a course of sessions several weeks apart, since only actively growing follicles respond; facial areas are usually treated at shorter intervals than body areas. Settings are chosen for the patient\'s skin type and hair colour.',
            'preparation'   => 'Consultation covering medical history, medication and current hair-removal habits; examination of skin type and hair colour; a patch test is usually done before the first full session. The area is shaved rather than waxed, threaded or plucked, and sun tanning is avoided.',
            'followup'      => 'Cool compresses and avoidance of heat, friction and sun after each session; shaving only between sessions; maintenance sessions where hair returns.',
            'expectedPrognosis' => 'Hair is reduced rather than removed entirely. A course often runs to six or more sessions, regrowth is commonly finer and lighter, and occasional maintenance is often needed. Results vary between patients and cannot be promised.',
            'location'      => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
            'performer'     => null,
        ]),
        schema_faq('/laser-hair-removal-in-rohini', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Clinic 2 · Rohini, Delhi</span>
        <h1 class="h1 mt-3">Laser Hair Removal in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">A course of laser hair removal means returning every few weeks for several months, so it helps to have the clinic nearby. Our Rohini clinic in North-West Delhi carries out laser hair removal for the face and body. Your skin and hair are examined by a registered medical practitioner before the first session, and the course is planned around what that shows.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Laser hair removal" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Sessions carried out at the Rohini clinic',
            'Skin and hair assessed before any session',
            'A course planned visit by visit',
            'Open ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-laser-768.webp" srcset="/assets/img/services/svc-laser-512.webp 512w, /assets/img/services/svc-laser-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" width="768" height="960" alt="AI-generated illustration: a white handheld device on a white tray beside a folded sage-green towel" loading="eager" fetchpriority="high">
          <?php /* Chip moved to the top edge: on phones the badge card below overlaps the bottom of the image. */ ?>
          <?= str_replace('class="hp-ai-chip"', 'class="hp-ai-chip" style="top:12px;bottom:auto"', hp_ai_chip('AI-generated illustration')) ?>
        </div>
        <div class="hero__badge-card">
          <p class="eyebrow">Clinic 2 · Rohini</p>
          <p class="h4 mt-1">North-West Delhi, near the Outer Ring Road</p>
          <p class="meta mt-1"><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></p>
          <p class="meta"><?= e(HOURS_DISPLAY) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="overview">
  <div class="wrap">
    <div class="split split--wide-left split--top">
      <div>
        <p class="eyebrow">Close to home</p>
        <h2 class="h2 mt-2">Why a Nearby Clinic Helps With Laser</h2>
        <div class="stack mt-4 measure">
          <p class="body-l">Laser hair removal is not a single appointment. The light affects only follicles that are actively growing a hair at the time, and because hairs grow in staggered cycles, each visit reaches a share of them. A course therefore stretches over several months, with a return visit every four to eight weeks depending on the area.</p>
          <p class="body-l">Keeping to that rhythm is part of what makes a course work. Long gaps let follicles cycle back unnoticed; visits squeezed too close together meet hairs that have not yet regrown. For anyone living in Rohini, Pitampura, Shalimar Bagh, Prashant Vihar or nearby parts of North and North-West Delhi, a clinic close by makes the schedule easier to keep.</p>
          <p class="body">How laser works, which skin and hair types suit it, PCOS-related facial hair and the full list of side effects are explained on our main <a href="/laser-hair-removal-in-gurgaon">laser hair removal page</a>. Laser hair removal is also offered at our Sector 39 clinic in Gurugram. This page covers how a course runs in practice in Rohini.</p>
        </div>
      </div>
      <div class="stack">
        <div class="card card--pad-lg">
          <p class="eyebrow" style="color:var(--ink-muted)">In short</p>
          <p class="body mt-2">Laser reduces hair over a course of visits rather than removing it in one. Plan for several months, keep the gaps steady, and expect occasional top-up sessions later.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="first-visit">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Your first visit</p>
      <h2 class="h2 mt-2">What Happens at Your First Visit in Rohini</h2>
      <p class="body mt-3">Nothing is treated until your skin and hair have been looked at. The first visit is mostly questions, an examination and, usually, a small test.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="step"><span class="step-num">1</span><div><h3 class="h4">Talking it through</h3><p class="body-s mt-2">Which areas bother you, how you remove the hair now — shaving, threading, waxing or creams — and any history of hormonal problems, irregular periods, skin conditions or cold sores.</p></div></div>
      <div class="step"><span class="step-num">2</span><div><h3 class="h4">Looking at skin and hair</h3><p class="body-s mt-2">The colour and thickness of the hair, your skin type, and any tan, pigmentation, moles or tattoos in the area. This shows whether laser is likely to help and how cautiously to set it.</p></div></div>
      <div class="step"><span class="step-num">3</span><div><h3 class="h4">A patch test</h3><p class="body-s mt-2">A small spot is usually treated first and looked at again a few days later. On darker skin the wait is especially worthwhile, because a reaction can take time to show.</p></div></div>
      <div class="step"><span class="step-num">4</span><div><h3 class="h4">A plan in writing</h3><p class="body-s mt-2">The areas, an approximate number of sessions as a range, the gap between visits, how to prepare and what affects the cost. You can take it away and decide in your own time.</p></div></div>
    </div>
    <div class="note mt-4" style="display:flex;gap:16px;align-items:flex-start">
      <span style="flex:0 0 auto;display:inline-flex;margin-top:1px"><?= icon('info', 20, 'var(--accent-deep)', 1.8) ?></span>
      <p class="body-s">Bring a list of the medicines you take, including acne treatment, antibiotics and supplements. Some make skin more sensitive to light and change when treatment can start.</p>
    </div>
  </div>
</section>

<section class="section section--white" id="course">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">Session by session</p>
        <h2 class="h2 mt-2">How a Course of Sessions Usually Runs</h2>
        <p class="body mt-3">Every course is different, but most follow a similar shape. The timings here are general information, not this clinic’s fixed protocol; your own gaps and number of visits are set at assessment.</p>
      </div>
      <div class="stack">
        <div class="step"><span class="step-num">1</span><div><h3 class="h4">On the day</h3><p class="body-s mt-2">Arrive with the area shaved and free of cream, deodorant or make-up. The skin is cleaned, everyone puts on eye protection, and the laser is passed over the area in overlapping pulses with cooling. An upper lip takes minutes; a back or both legs take considerably longer.</p></div></div>
        <div class="step"><span class="step-num">2</span><div><h3 class="h4">Sessions one to three</h3><p class="body-s mt-2">Treated hairs loosen and shed over one to three weeks, which can look like regrowth at first. By the second or third visit many people notice patchy thinning, as follicles are caught at different stages.</p></div></div>
        <div class="step"><span class="step-num">3</span><div><h3 class="h4">The middle of the course</h3><p class="body-s mt-2">Regrowth slows and comes back finer. Settings may be adjusted at each visit according to how your skin reacted last time and how much hair remains.</p></div></div>
        <div class="step"><span class="step-num">4</span><div><h3 class="h4">The final sessions</h3><p class="body-s mt-2">Remaining hairs tend to be sparse and lighter. Some people need more sessions than first estimated, particularly on the face or where hormones drive growth.</p></div></div>
        <div class="step"><span class="step-num">5</span><div><h3 class="h4">After the course</h3><p class="body-s mt-2">Some hair usually returns over the following months or years. An occasional maintenance session keeps it down; how often depends on your hair and any hormonal cause.</p></div></div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="areas">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Area by area</p>
      <h2 class="h2 mt-2">Notes for Each Treatment Area</h2>
      <p class="body mt-3">Facial areas are often treated at shorter gaps than the body, and each area reacts a little differently. These general notes help when deciding where to start.</p>
    </div>
    <div class="card mt-6" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data data--fit">
          <caption class="sr-only">General notes by treatment area — patient education, not this clinic’s protocol</caption>
          <thead>
            <tr><th scope="col">Area</th><th scope="col">Worth knowing</th></tr>
          </thead>
          <tbody>
            <?php foreach ($areaNotes as $a): ?>
            <tr>
              <th scope="row" style="font-size:15px;font-weight:700;white-space:normal;width:32%"><?= e($a['area']) ?></th>
              <td><?= e($a['note']) ?></td>
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

<section class="section section--white" id="aftercare">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Between sessions</p>
      <h2 class="h2 mt-2">Aftercare Between Sessions</h2>
      <p class="body mt-3">Most of a course happens between appointments. How you treat the skin in those weeks affects both comfort and how safely the next session can go ahead.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--pad-lg"><span class="pill">Day one and two</span><h3 class="h4 mt-3">Let the skin settle</h3><p class="body-s mt-2">Redness and small bumps around the follicles are normal and usually fade within a day or two. A cool compress or a plain soothing gel helps. Skip hot baths, steam, saunas and hard workouts for this time.</p></div>
      <div class="card card--pad-lg"><span class="pill">The weeks between</span><h3 class="h4 mt-3">Shave only, and cover up</h3><p class="body-s mt-2">Shave if you like, but do not wax, thread, pluck or epilate. Wear sunscreen on treated skin that is exposed, avoid deliberate tanning, and let shedding hairs fall out on their own.</p></div>
      <div class="card card--pad-lg"><span class="pill">Before the next visit</span><h3 class="h4 mt-3">Shave and tell us</h3><p class="body-s mt-2">Shave the area a day or so before. Mention any reaction after the last session, a new medicine, recent sun exposure or a pregnancy, as each can change the plan.</p></div>
    </div>

    <div class="split split--sidebar mt-6">
      <div>
        <h3 class="h3">Limits Worth Knowing Before You Book</h3>
        <p class="body-s mt-2">The full list of side effects is on our <a href="/laser-hair-removal-in-gurgaon#risks">main laser hair removal page</a>.</p>
      </div>
      <div>
        <?= ticks([
            'Laser reduces hair; it does not clear every hair for good, and results vary.',
            'White, grey, red and blonde hair respond poorly or not at all.',
            'Darker or lighter patches of skin can follow, more often on darker or tanned skin.',
            'Burns and blisters can occur when settings do not suit the skin; rarely, they scar.',
            'In rare cases, skin near a treated area starts growing thicker hair.',
            'Facial hair from PCOS or another hormonal cause needs medical assessment too.',
        ]) ?>
      </div>
    </div>
    <div class="note mt-5" style="display:flex;gap:16px;align-items:flex-start">
      <span style="flex:0 0 auto;display:inline-flex;margin-top:1px"><?= icon('phone', 20, 'var(--accent-deep)', 1.8) ?></span>
      <p class="body-s">After a session, call the Rohini clinic on <a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a> if the skin blisters, crusts, reddens over a widening area or develops darker or lighter patches.</p>
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
        <h2 class="h2 mt-2">Laser Hair Removal in Rohini: FAQs</h2>
        <p class="body-s mt-3">Practical questions about a course at the Rohini clinic. Anything about your own skin and hair is covered at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'Visit Our Rohini Clinic',
    'Our Rohini clinic is in North-West Delhi, near the Outer Ring Road, and is open Monday to Saturday. Laser hair removal is also carried out at our Sector 39 clinic in Gurugram if that is easier to reach.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= cta_band(
    'Plan a Laser Course at Our Rohini Clinic',
    'Tell us which areas you would like treated and how you remove the hair now. You will get an assessment of your skin and hair, a patch test where appropriate, and a written plan for the course if laser suits you — with no pressure to book on the day.',
    'rohini-laser-hair-removal',
    ['Laser hair removal — face', 'Laser hair removal — underarms', 'Laser hair removal — arms or legs', 'Laser hair removal — back or chest', 'Laser hair removal — bikini line', 'Facial hair with PCOS', 'Not sure — please advise'],
    'Delhi (Rohini)'
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
