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
 * Rohini counterpart of the other-city laser page. This page takes its own
 * angle — a course close to home, the first visit, session by session, area
 * notes, aftercare between sessions and limits. Keep the two from
 * converging: reuse facts, not sentences.
 *
 * Client rule (14 Oct 2026): a Rohini page does not mention the other clinic
 * or link to any URL containing its city name. Landing-page layout:
 * lp_split / lp_steps / lp_cta (includes/home-components.php).
 *
 * Not yet reviewed by the clinic's doctor: doctor_block(..., false), no
 * "medically reviewed" line, not in MEDICAL_PAGES. NMC Guidelines of
 * 06.10.2026 apply. The hero image is an AI-generated illustration and is
 * labelled as one (cl. 7.2).
 *
 * 14 Oct 2026 (SEO round 2): retitled "Sessions & Areas"; new H2 sections for
 * the patch test, sessions by area (the area table now carries general gap
 * and session ranges) and laser on Indian skin types (wavelength explained
 * generally, no device named); Delhi-seasons notes; questions worth asking
 * any clinic; 15 FAQs.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/**
 * General notes by area — patient education, not this clinic's protocol.
 * 'gap' and 'sessions' restate the page's general ranges (face every four to
 * six weeks, body six to eight weeks or more, usually six or more visits, more
 * for facial, hormone-driven or finer hair); they are not a fixed schedule.
 */
$areaNotes = [
    ['area' => 'Upper lip and chin',  'gap' => '4–6 weeks',          'sessions' => 'Often more than six, with later top-ups', 'note' => 'Often hormone-related, so more sessions and later top-ups are common. Stop threading well before the course begins.'],
    ['area' => 'Jawline and neck',    'gap' => '4–6 weeks',          'sessions' => 'Often more than six where growth is hormonal', 'note' => 'Sometimes chosen by men troubled by ingrown hairs after shaving, as well as by women with hormonal hair. Rare paradoxical growth is reported more often on the face and neck.'],
    ['area' => 'Underarms',           'gap' => '6–8 weeks',          'sessions' => 'Usually six or more', 'note' => 'Dense, dark hair that tends to respond well. Skip deodorant on the day of a session.'],
    ['area' => 'Arms',                'gap' => '6–8 weeks or more',  'sessions' => 'Six or more; finer hair may need more', 'note' => 'Forearm hair is often finer, and less predictable, than coarse hair elsewhere on the body.'],
    ['area' => 'Legs',                'gap' => '6–8 weeks or more',  'sessions' => 'Usually six or more', 'note' => 'Large, so each session runs longer. Lower legs get more sun than most areas, so tanning is the main thing to manage between visits.'],
    ['area' => 'Back and shoulders',  'gap' => '6–8 weeks or more',  'sessions' => 'Usually six or more', 'note' => 'Broad areas of coarse hair, mostly in men. Sessions take longer, and someone at home may need to shave the parts you cannot reach.'],
    ['area' => 'Chest and abdomen',   'gap' => '6–8 weeks or more',  'sessions' => 'Six or more; more if growth is hormonal', 'note' => 'Treated in men and women. In women, new hair here is worth mentioning at the consultation, as it can point to a hormonal cause.'],
    ['area' => 'Bikini line',         'gap' => '6–8 weeks or more',  'sessions' => 'Usually six or more', 'note' => 'Skin here is often darker than elsewhere and more tender, so the settings are kept cautious.'],
];

$faqs = [
    ['q' => 'Is laser hair removal done at the Rohini clinic?',
     'a' => 'Yes. It is carried out at the Rohini clinic itself, from the first assessment to each session in the course.'],
    ['q' => 'Which parts of Delhi is the Rohini clinic convenient for?',
     'a' => 'The clinic is in Rohini, North-West Delhi, near the Outer Ring Road, which makes it convenient for North and North-West Delhi, including Rohini, Pitampura, Shalimar Bagh and Prashant Vihar. It is open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . '), and the Directions link on this page opens it in Google Maps.'],
    ['q' => 'Is a patch test needed before laser hair removal?',
     'a' => 'Usually, yes. A small spot is treated at the planned settings and looked at again a few days later, before a whole area is treated. On darker skin the wait is especially worthwhile, because a reaction can take time to show. <a href="/blog/laser-hair-removal-patch-test">What the patch test checks on Indian skin</a> explains it in more detail.'],
    ['q' => 'Can laser hair removal be done on Indian skin?',
     'a' => 'Often, yes, as long as the wavelength and settings match the skin. On darker skin the risk of burns and of darker or lighter patches is higher, so settings are kept cautious and a patch test usually comes first. Grey, white, red and blonde hair responds poorly whatever the skin colour.'],
    ['q' => 'How should I prepare for a session?',
     'a' => 'Shave the area a day or so before, and arrive without cream, deodorant or make-up on it. Stop waxing, threading and plucking for the whole course, avoid tanning, and tell the clinic about any new medicine, recent sun exposure or a pregnancy.'],
    ['q' => 'How often will I need to come in?',
     'a' => 'Facial areas are often treated every four to six weeks and body areas at gaps of six to eight weeks or more, usually over six or more visits. These are general ranges; the gap for each of your areas is set at your assessment.'],
    ['q' => 'Can I shave between sessions?',
     'a' => 'Yes. Shaving leaves the root in place, which the laser needs. Waxing, threading, plucking and epilating remove the root and should be stopped for the whole course.'],
    ['q' => 'What does a session feel like?',
     'a' => 'Expect a quick, hot sting with each pulse rather than constant pain. Cooling takes the edge off, thin-skinned spots like the upper lip sting more, and the skin may stay warm and pink for a few hours.'],
    ['q' => 'What if I miss a session or get a tan?',
     'a' => 'A short delay is rarely a problem, though long gaps slow progress. Tanned skin burns more easily, so after time in the sun let the clinic know before your next session; it may need to wait until the tan fades.'],
    ['q' => 'Can I go back to work, the gym or the sun after a session?',
     'a' => 'Work and most daily activities can carry on the same day. Skip hot baths, steam, saunas and hard workouts for a day or two while redness settles, and keep treated skin out of the sun, with sunscreen where it is exposed.'],
    ['q' => 'When will I see a difference?',
     'a' => 'Treated hairs shed over one to three weeks after a session, which can look like regrowth at first. Many people notice patchy thinning by the second or third visit. The overall result is judged towards the end of the course, and some hair usually returns over the following months or years.'],
    ['q' => 'Which side effects should I report?',
     'a' => 'Blistering, crusting, redness that spreads, or skin that turns darker or lighter. Call the Rohini clinic on ' . LOC_DELHI_PHONE_DISPLAY . ' if any of these appear. Redness and small bumps around the follicles for a day or two are expected.'],
    ['q' => 'Can I have laser hair removal while pregnant?',
     'a' => 'It is usually postponed during pregnancy as a precaution, and hair growth often changes in pregnancy anyway. Tell the clinic if you are pregnant or planning a pregnancy, so the course can be timed around it.'],
    ['q' => 'How much does a course cost at the Rohini clinic?',
     'a' => 'It depends on which areas are treated, how large they are and how many sessions you are likely to need. The cost is explained after your assessment, with the factors behind it set out in your plan, rather than as a fixed headline price.'],
    ['q' => 'Is EMI available for a laser course?',
     'a' => 'Instalment options through third-party lenders may be available — ask at the consultation. How medical EMI works is explained on the <a href="/cost-and-emi-options">cost and EMI options</a> page.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Laser hair removal in Rohini'],
];

$page = [
    'title'         => 'Laser Hair Removal in Rohini, Delhi: Sessions & Areas',
    'description'   => 'Laser hair removal in Rohini, North-West Delhi: the patch test, sessions by area, laser on Indian skin types, aftercare through the year and its limits.',
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
        <span class="pill pill--dot">Rohini, Delhi</span>
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
          <p class="eyebrow">Rohini Clinic</p>
          <p class="h4 mt-1">North-West Delhi, near the Outer Ring Road</p>
          <p class="meta mt-1"><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></p>
          <p class="meta"><?= e(HOURS_DISPLAY) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= lead_strip() ?>

<?= lp_split([
    'img'     => 'svc-follicle',
    'alt'     => 'a sculpted cross-section of skin showing hair follicles beneath the surface',
    'eyebrow' => 'Close to home',
    'title'   => 'Why a Nearby Clinic Helps With Laser',
    'tone'    => 'canvas',
    'html'    => '<p>Laser hair removal is not a single appointment. The light affects only follicles that are actively growing a hair at the time, and because hairs grow in staggered cycles, each visit reaches a share of them. A course therefore stretches over several months, with a return visit every four to eight weeks depending on the area.</p>'
               . '<p>Keeping to that rhythm is part of what makes a course work: long gaps let follicles cycle back unnoticed, and visits squeezed too close together meet hairs that have not yet regrown. For anyone living in Rohini, Pitampura, Shalimar Bagh, Prashant Vihar or nearby parts of North and North-West Delhi, a clinic close by makes the schedule easier to keep.</p>',
    'points'  => [
        'Laser reduces hair over a course of visits rather than removing it in one',
        'Plan for several months and keep the gaps steady',
        'Expect occasional top-up sessions later',
    ],
    'link'    => ['url' => '#limits', 'label' => 'Limits worth knowing before you book'],
]) ?>

<?= lp_steps([
    'eyebrow' => 'Your first visit',
    'title'   => 'What Happens at Your First Visit in Rohini',
    'intro'   => 'Nothing is treated until your skin and hair have been looked at. Bring a list of the medicines you take, including acne treatment, antibiotics and supplements: some make skin more sensitive to light and change when treatment can start.',
    'tone'    => 'white',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                 'title' => 'Talking it through, then a close look', 'text' => 'Which areas bother you, how you remove the hair now (shaving, threading, waxing or creams), and any hormonal problems, irregular periods, skin conditions or cold sores. Then the colour and thickness of the hair, your skin type, and any tan, pigmentation, moles or tattoos, which show whether laser is likely to help and how cautiously to set it.'],
        ['img' => 'step-procedure',    'alt' => 'sterile instruments laid out on a tray',              'title' => 'A patch test',                          'text' => 'A small spot is usually treated first and looked at again a few days later. On darker skin the wait is especially worthwhile, because a reaction can take time to show.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned line', 'title' => 'A plan in writing',                     'text' => 'The areas, an approximate number of sessions as a range, the gap between visits, how to prepare and what affects the cost. You can take it away and decide in your own time.'],
    ],
]) ?>

<?= lp_highlights([
    'eyebrow' => 'Before the first full session',
    'title'   => 'Patch Test Before Your First Session',
    'intro'   => 'A small test spot shows how your skin reacts to the settings chosen for it before a whole area is treated. It is usually done before the first full session, and it matters most on darker or recently tanned skin.',
    'tone'    => 'canvas',
    'items'   => [
        ['icon' => 'eye',   'title' => 'What is tested',   'text' => 'A small, discreet spot in or near the area to be treated, at the settings planned for your skin type and hair colour.'],
        ['icon' => 'clock', 'title' => 'How long to wait', 'text' => 'The spot is looked at again a few days later. On darker skin the wait matters more, because a reaction can take time to show.'],
        ['icon' => 'info',  'title' => 'What it can show', 'text' => 'Blistering, crusting, spreading redness or a darker or lighter patch. Any of these changes the settings, or whether laser goes ahead at all.'],
    ],
]) ?>

<?= lp_steps([
    'eyebrow' => 'Session by session',
    'title'   => 'How a Course of Sessions Usually Runs',
    'intro'   => 'Every course is different, but most follow a similar shape. The timings here are general information, not this clinic’s fixed protocol; your own gaps and number of visits are set at assessment.',
    'tone'    => 'white',
    'steps'   => [
        ['img' => 'svc-hair-transplant', 'alt' => 'a sculpted model of a follicular unit with three hairs, on a cream background', 'title' => 'On the day', 'text' => 'Arrive with the area shaved and free of cream, deodorant or make-up. The skin is cleaned, everyone puts on eye protection, and the laser is passed over the area in overlapping pulses with cooling. An upper lip takes minutes; a back or both legs take considerably longer.'],
        ['img' => 'svc-hair-fall', 'alt' => 'a wooden comb resting on folded linen towels by a window',             'title' => 'Through the course',          'text' => 'Treated hairs loosen and shed over one to three weeks, which can look like regrowth at first. By the second or third visit many people notice patchy thinning, as follicles are caught at different stages. Later, regrowth slows and comes back finer, and settings may be adjusted to how your skin reacted and how much hair remains.'],
        ['img' => 'svc-followup',  'alt' => 'a desk calendar with dates circled, beside a small plant',           'title' => 'The final sessions, and after', 'text' => 'Remaining hairs tend to be sparse and lighter. Some people need more sessions than first estimated, particularly on the face or where hormones drive growth. Some hair usually returns over the following months or years; an occasional maintenance session keeps it down, how often depending on your hair and any hormonal cause.'],
    ],
]) ?>

<section class="section section--canvas" id="areas">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Area by area</p>
      <h2 class="h2 mt-2">Sessions by Area</h2>
      <p class="body mt-3">Facial areas are often treated at shorter gaps than the body, and each area reacts a little differently. The gaps and session numbers below are general ranges, not this clinic’s fixed protocol; yours are set at the assessment.</p>
    </div>
    <div class="card mt-6" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data data--wide">
          <caption class="sr-only">Laser hair removal by treatment area: usual gap between sessions, usual number of sessions and notes. General ranges for patient education, not this clinic’s protocol.</caption>
          <thead>
            <tr><th scope="col">Area</th><th scope="col">Usual gap</th><th scope="col">Sessions (general range)</th><th scope="col">Worth knowing</th></tr>
          </thead>
          <tbody>
            <?php foreach ($areaNotes as $a): ?>
            <tr>
              <th scope="row" style="font-size:15px;font-weight:700;white-space:normal;min-width:130px"><?= e($a['area']) ?></th>
              <td style="white-space:nowrap"><?= e($a['gap']) ?></td>
              <td style="min-width:150px"><?= e($a['sessions']) ?></td>
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

<?= lp_split([
    'img'     => 'svc-skin',
    'alt'     => 'a sculpted cross-section of skin layers with a single hair follicle and a coiled gland',
    'eyebrow' => 'Skin type',
    'title'   => 'Laser on Indian Skin Types',
    'id'      => 'skin-types',
    'tone'    => 'white',
    'reverse' => true,
    'html'    => '<p>Laser works because the dark pigment in a hair absorbs its light. Skin carries pigment too, and Indian skin covers a wide range of tones, so the skin around each hair competes for that light. The darker the skin, the more carefully the settings are chosen, to heat the follicle without burning or marking the skin around it.</p>'
               . '<p>Lasers differ in wavelength. Longer wavelengths pass the pigment at the skin’s surface more readily, so they are generally considered for darker skin types. Your settings are chosen for your skin and hair at the assessment and checked with a patch test.</p>',
    'points'  => [
        'Dark, coarse hair on lighter-brown skin tends to respond most predictably',
        'Darker skin can be treated, more cautiously, with a patch test first',
        'A tan raises the risk of burns and pigment change, so a session may wait until it fades',
        'Darker or lighter patches are more likely on darker skin; they usually fade, but can rarely last',
        'Grey, white, red and blonde hair has too little pigment to respond',
    ],
]) ?>

<section class="section section--canvas" id="aftercare">
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

    <div class="note mt-5" style="display:flex;gap:16px;align-items:flex-start">
      <span style="flex:0 0 auto;display:inline-flex;margin-top:1px"><?= icon('phone', 20, 'var(--accent-deep)', 1.8) ?></span>
      <p class="body-s">After a session, call the Rohini clinic on <a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a> if the skin blisters, crusts, reddens over a widening area or develops darker or lighter patches.</p>
    </div>
  </div>
</section>

<?= lp_highlights([
    'eyebrow' => 'Laser in Delhi',
    'title'   => 'Planning a Course Around the Delhi Year',
    'intro'   => 'Sun, heat and the daily commute all affect a course. These are general points; your own plan is set at the assessment.',
    'tone'    => 'white',
    'items'   => [
        ['icon' => 'shield',   'title' => 'Summer sun',                 'text' => 'A tan raises the risk of burns and pigment change. Cover treated skin, use sunscreen and avoid deliberate tanning; a tanned area may have to wait.'],
        ['icon' => 'calendar', 'title' => 'Choosing when to start',     'text' => 'Some people prefer to start body areas in the cooler months, when less skin is in the sun. Whenever you start, keep the gaps between sessions steady.'],
        ['icon' => 'pin',      'title' => 'Riding and commuting',       'text' => 'Helmet straps, scarves and collars rub on the jaw and neck. Keep heat and friction off freshly treated skin for a day or two, and cover it from the sun on the road.'],
        ['icon' => 'layers',   'title' => 'Winter and the smog season', 'text' => 'Dry air can leave treated skin tight and itchy. A plain moisturiser helps; leave scrubs, peels and very hot showers off treated areas for a few days.'],
    ],
]) ?>

<section class="section section--canvas" id="questions">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Before you commit</p>
      <h2 class="h2 mt-2">Questions Worth Asking Any Laser Clinic</h2>
      <p class="body mt-3">Whichever clinic you choose, these questions help you understand a course before you pay for it. A clear answer to each is a reasonable thing to expect, here or anywhere else.</p>
    </div>
    <div class="card card--pad-lg mt-5">
      <?= ticks([
          'Who carries out each session, and who supervises it?',
          'Is a patch test done, and how long is the wait before the first full session?',
          'How are the settings chosen for my skin type and hair colour?',
          'How many sessions, as a range, and how far apart?',
          'What happens if I get a burn or a darker or lighter patch?',
          'Is eye protection provided for everyone in the room?',
          'What will the whole course cost, including likely top-ups?',
          'Could my hair growth have a hormonal cause that needs checking first?',
      ]) ?>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-consultation',
    'alt'     => 'a dermatoscope and notepad on a wooden desk beside a fern',
    'eyebrow' => 'Before you book',
    'title'   => 'Limits Worth Knowing Before You Book',
    'id'      => 'limits',
    'tone'    => 'white',
    'html'    => '<p>Weigh these before starting a course. How they apply to your own skin and hair is part of the assessment. Our guide explains <a href="/blog/is-laser-hair-removal-permanent">why laser reduces hair rather than removing it for good</a>.</p>',
    'points'  => [
        'Laser reduces hair; it does not clear every hair for good, and results vary.',
        'White, grey, red and blonde hair respond poorly or not at all.',
        'Darker or lighter patches of skin can follow, more often on darker or tanned skin.',
        'Burns and blisters can occur when settings do not suit the skin; rarely, they scar.',
        'In rare cases, skin near a treated area starts growing thicker hair.',
        'Facial hair from PCOS or another hormonal cause needs medical assessment too.',
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
    'Our Rohini clinic is in North-West Delhi, near the Outer Ring Road, and is open Monday to Saturday. Every laser session in your course takes place there.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= lp_cta([
    'eyebrow'   => 'Rohini, Delhi',
    'title'     => 'Plan a Laser Course at Our Rohini Clinic',
    'text'      => 'Tell us which areas you would like treated and how you remove the hair now. You will get an assessment of your skin and hair, a patch test where appropriate, and a written plan for the course if laser suits you — with no pressure to book on the day.',
    'treatment' => 'Laser hair removal',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
