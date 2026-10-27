<?php
/**
 * /beard-transplant-in-delhi — the Delhi beard transplant pillar page, for the
 * Rohini clinic.
 *
 * Built 27 Oct 2026 at the client's request, on the /hair-transplant-in-delhi
 * pillar (its design, its Rohini rules and its area pages):
 *
 *  1. Treatment overview: copy, the beard zone card, at a glance
 *  2. Why DenceSpot, beside the clinic's FUE handpiece
 *  3. Suitability: who it may suit, and when the clinic advises waiting
 *  4. The doctors: the homepage's three tiles, worded for Rohini
 *  5. Techniques: FUE and DHI on the face
 *  6. Procedure: five steps, with icons
 *  7. Recovery, with what a Delhi first week involves
 *  8. Cost: factors and what the estimate covers; no prices
 *  9. Patient reviews: a link to the Rohini clinic's Google profile
 * 10. FAQs (the same array drives the JSON-LD; six shown, the rest behind
 *     "View more")
 * 11. Consultation: the Rohini clinic's details and form
 *
 * Just above the footer, "Serving Patients Across Delhi" links every Delhi
 * beard area page (includes/delhi-service-areas.php), in place of the
 * treatment links. There is no before-and-after section: no consented beard
 * photographs are on record (includes/delhi-beard.php). Who treats patients
 * at Rohini is not on record, so no doctor is named as performer.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';
require_once __DIR__ . '/includes/delhi-beard.php';

$url = DELHI_BEARD_HUB;

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Beard Transplant in Delhi'],
];

/* Suitability, grafts, recovery, shaving, growth and cost first; the rest
   sit behind "View more". */
$faqs = [
    ['q' => 'Who is a beard transplant suitable for?',
     'a' => 'Usually someone whose facial hair has stopped changing from year to year, who has enough donor hair at the back and sides of the scalp, and whose skin in the beard area is healthy. It is usually put off while a beard is still filling in, which is common into the mid-twenties, while <a href="/alopecia-areata-treatment-in-rohini">alopecia areata</a> is active, before a scar has matured, or when the donor area cannot spare the grafts. Suitability is decided at an examination, not from a photograph.'],
    ['q' => 'How many grafts will my beard need?',
     'a' => 'That follows the zones in your design and the hair already growing there. As general ranges, a moustache often takes around 300–700 grafts, a goatee and chin 500–1,000, a cheek line or jawline 800–1,500, sideburns 200–400 a side and a full beard 1,500–3,000 or more, often over two sessions. Zones share borders, so a combined plan is usually less than the ranges added up.'],
    ['q' => 'How long does recovery take?',
     'a' => 'Small crusts and redness usually last about a week, and swelling of the cheeks or upper lip settles over the first few days. Many people are back at desk work within a few days, but the face looks treated for that first week and a cap cannot hide it. Heavy sweating, contact sport and helmets wait longer; the <a href="/blog/beard-transplant-recovery-timeline">beard transplant recovery timeline</a> goes week by week.'],
    ['q' => 'When can I trim or shave again?',
     'a' => 'A trimmer or scissors is usually allowed before a razor. Each is cleared at a review once the grafts have settled, not on a fixed date, because a razor used too soon can dislodge grafts.'],
    ['q' => 'When will the new beard hair grow?',
     'a' => 'Transplanted hairs commonly fall out in the first few weeks while the follicles stay under the skin. New hairs usually appear from about three to four months, unevenly at first, and density and texture are judged at around ten to twelve months. Outcomes vary between people and cannot be promised.'],
    ['q' => 'How much does a beard transplant cost in Delhi?',
     'a' => 'There is no fixed price: the cost follows the number of grafts your design needs, the technique, any scar work and what the estimate covers. At the Rohini clinic it is given to you itemised and in writing after your examination, before any date is booked. The <a href="/beard-transplant-cost-in-rohini">Rohini beard cost guide</a> explains each factor.'],
    ['q' => 'Does a beard transplant hurt?',
     'a' => 'The local anaesthetic injections at the start are usually the uncomfortable part. Once the face and donor area are numb you may still feel pressure or pulling, and tolerance varies; tell the team if anything hurts, as more anaesthetic can be given. Soreness, tightness and swelling for a few days afterwards are common and managed with the medication prescribed for you.'],
    ['q' => 'How long does the procedure take?',
     'a' => 'It depends on the graft count. A moustache or a few patches may take a few hours; a full beard can take most of the day, with breaks. It is a day case, so you go home the same evening, ideally with someone to accompany you.'],
    ['q' => 'Will the transplanted hair match my beard?',
     'a' => 'Once healed, the hairs keep growing and are trimmed and shaped with the rest of your beard. Scalp hair is often a little finer, straighter or a slightly different shade from beard hair; for most people that blends once trimmed, for some it stays noticeable. Ask at the examination how your own scalp and beard hair compare.'],
    ['q' => 'Does a beard transplant use hair I may need for my scalp later?',
     'a' => 'Yes. Beard grafts come from the same donor area as a scalp transplant, and extracted hair does not grow back. Any thinning on the scalp, or a family history of it, is weighed before the beard is planned; see <a href="/blog/donor-area-limits-hair-transplant">why donor hair is a one-time budget</a>.'],
    ['q' => 'Can scars in the beard area be treated?',
     'a' => 'Often, once they have matured. Surgical, injury, burn and cleft-lip scars can take grafts, but their weaker blood supply means fewer grafts may survive, and a second session is more common. The scar is examined before anything is planned.'],
    ['q' => 'Will I need a second session?',
     'a' => 'For a moustache, goatee or a few patches, often not. It is more likely for a full beard built from little growth, for scar tissue, or to top up one zone after the first result matures at about a year. If it looks likely, you are told before the first session.'],
    ['q' => 'What are the possible risks?',
     'a' => 'Common, short-lived effects are swelling, redness, crusting, numbness, and spots around the new hairs (folliculitis), which is more frequent in the beard than on the scalp. Less often there can be infection, temporary shedding of nearby beard hair, cysts, ingrown hairs, weaker growth in some grafts, or grafts set at an angle that later needs correcting. Contact the clinic promptly for bleeding that does not stop with steady pressure, spreading redness or pus, fever, or pain that gets worse after the first few days.'],
    ['q' => 'Which parts of Delhi do you see patients from?',
     'a' => 'DenceSpot has one clinic in Delhi, in Rohini, North-West Delhi. The examination, beard design, procedure and reviews all take place there, so patients from other parts of the city travel to Rohini for each visit. The areas we serve are listed at the foot of this page, and the Directions button below opens the clinic on Google Maps.'],
    ['q' => 'Can I send photos on WhatsApp first?',
     'a' => 'Yes. Clear daylight photographs of your cheeks, jawline, moustache and chin, from the front and both sides, help the clinic tell you whether an examination is worthwhile. The design, graft count and estimate come only from an examination in person.'],
];

$page = [
    'title'         => fit_title(
        'Beard Transplant in Delhi: Grafts, Cost & FAQs | DenceSpot',
        'Beard Transplant in Delhi: Grafts & Cost | DenceSpot',
        'Beard Transplant in Delhi | DenceSpot Rohini',
    ),
    'description'   => 'Beard transplant in Delhi at DenceSpot’s Rohini clinic: cheeks, jawline, moustache and sideburns, grafts by zone, recovery, cost factors and FAQs.',
    'url'           => $url,
    'body_class'    => 'tx-rich',
    'crumbs'        => $crumbs,
    'location'      => 'rohini',
    'service_areas' => 'beard',
    'keywords'      => ['beard transplant in delhi', 'beard transplant delhi', 'moustache transplant in delhi', 'beard transplant cost in delhi', 'fue beard transplant delhi', 'beard transplant clinic in rohini delhi', SITE_NAME],
    'schema'        => [
        schema_delhi_clinic(),
        schema_breadcrumbs($crumbs),
        schema_procedure($url, [
            'name'              => 'Beard Transplant',
            'description'       => 'A beard transplant moves hair from the back and sides of the scalp into the cheeks, jawline, moustache, chin or sideburns, by FUE or DHI, under local anaesthetic as a day case at the Rohini clinic in Delhi.',
            'alternateName'     => ['Beard Transplant in Delhi', 'Facial Hair Transplant in Delhi', 'Moustache Transplant in Delhi'],
            'procedureType'     => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'      => 'Face (cheeks, jawline, chin, moustache, sideburns)',
            'howPerformed'      => 'Follicular units are taken one at a time from the donor scalp at the back and sides of the head and set into the beard area flat to the skin, in the direction each zone grows, with single-hair grafts along visible borders, by FUE placement into pre-made sites or with DHI implanter pens. A day case under local anaesthetic at the Rohini, Delhi clinic.',
            'preparation'       => 'Examination of existing facial hair zone by zone and of the scalp donor area, review of medical history and medicines, and a beard design drawn on the face and agreed with the patient before treatment.',
            'followup'          => 'Written aftercare covering washing, trimming and shaving, and photographed follow-up reviews at the Rohini clinic through the first twelve months.',
            'expectedPrognosis' => 'Transplanted hairs commonly shed in the first weeks; new growth usually begins at around three to four months and the result is judged at ten to twelve months. Outcomes vary between patients and cannot be promised.',
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
    'title'     => 'Beard Transplant in Delhi',
    'lead'      => 'Beard transplant at our Rohini clinic for patchy cheeks, a broken jawline, a thin moustache or a scar — planned zone by zone after a doctor examines your face and donor area, with the estimate in writing before any date is booked.',
    'feats'     => [
        ['user', 'Doctor-led planning'],
        ['pencil', 'Beard drawn on your face'],
        ['settings', 'FUE & DHI at the clinic'],
        ['doc', 'Written estimate first'],
    ],
    'treatment' => 'Beard transplant',
]) ?>

<!-- 1. Treatment overview -->
<section class="section ht-sec ht-overview-sec" id="about">
  <div class="wrap">
    <div class="ht-overview">
      <div class="ht-overview__text">
        <p class="eyebrow">About the treatment</p>
        <h2 class="h2 mt-2">How a Beard Transplant Works</h2>
        <p class="body mt-3">A beard transplant is minor surgery under local anaesthetic. Follicles are taken from the back and sides of the scalp, where hair generally holds up against pattern hair loss, and set one by one into the cheeks, jawline, moustache, chin or sideburns. Nothing new is created: hair you already have is moved, and once it takes it grows, and is trimmed and shaved, with the rest of your beard.</p>
        <p class="body mt-3">Facial hair lies flat to the skin and changes direction from cheek to jaw to lip, so each graft is angled to its zone and the visible borders are built from single-hair grafts. In Delhi, DenceSpot’s beard transplants are planned and carried out at the Rohini clinic by registered medical practitioners.</p>
        <div class="btn-row mt-4">
          <a class="btn btn--ink" href="#suitability">Check Whether It May Suit You <?= icon('arrow', 16) ?></a>
        </div>
      </div>

      <?= delhi_beard_zones_card() ?>

      <?= delhi_glance([
          ['shield', 'mint', 'Local anaesthetic', 'You are awake throughout'],
          ['calendar', 'violet', 'Day case', 'You go home the same day'],
          ['clock', 'sky', 'Visible healing', 'Crusts and redness for about a week'],
          ['chart', 'amber', 'New growth', 'From about 3–4 months; judged at 10–12'],
      ], 'Beard transplant at a glance') ?>
    </div>
  </div>
</section>

<!-- 2. Why DenceSpot -->
<?= delhi_band([
    'id'      => 'why',
    'eyebrow' => 'Why DenceSpot',
    'heading' => 'Why Choose DenceSpot for a Beard Transplant in Delhi?',
    'intro'   => 'How each beard case is handled at the Rohini clinic, from the first examination to the written estimate.',
    'icons'   => [
        ['user', 'Doctor-Led Planning'],
        ['search', 'Zone-by-Zone Examination'],
        ['pencil', 'Beard Drawn on Your Face'],
        ['beard', 'Single-Hair Grafts on Borders'],
        ['pin', 'Rohini Clinic, North-West Delhi'],
        ['rupee', 'Itemised Written Estimate'],
    ],
    'media'   => 'equipment',
    'checks'  => ['FUE & DHI at the Rohini clinic', 'Beard design agreed before the day', 'Reviews through the first year'],
]) ?>

<!-- 3. Suitability -->
<section class="section ht-sec section--white" id="suitability">
  <div class="wrap">
    <div style="max-width:68ch">
      <p class="eyebrow">Suitability</p>
      <h2 class="h2 mt-2">Who a Beard Transplant May Suit</h2>
      <p class="body mt-3">Two questions decide most cases: whether your facial hair has stopped changing, and whether your scalp can spare the grafts. Both are answered at an examination at the Rohini clinic.</p>
    </div>

    <div class="ht-tech">
      <div class="card card--pad-lg tech-card tone--mint">
        <span class="icon-dot"><?= icon('check', 24) ?></span>
        <h3 class="h3">Often a Reasonable Candidate</h3>
        <?= ticks([
            'Facial hair that has stopped changing from year to year',
            'Enough donor hair at the back and sides of the scalp',
            'Healthy skin across the beard area',
            'A mature scar where hair does not grow',
            'Expecting beard density, not scalp density',
        ], false) ?>
      </div>

      <div class="card card--pad-lg tech-card tone--amber">
        <span class="icon-dot"><?= icon('alert', 24) ?></span>
        <h3 class="h3">Usually a Reason to Wait</h3>
        <?= ticks([
            'A beard still filling in, common into the mid-twenties',
            'Active alopecia areata patches in the beard',
            'A scar that is still red or changing',
            'Keloid-prone skin or an untreated skin condition',
            'Scalp thinning that may need the donor hair later',
        ], false) ?>
      </div>

      <div class="tint-card tone--sky ht-tech__choose">
        <h3 class="h4">Before You Book Anything</h3>
        <p class="body-s mt-3">Smooth, round bare patches in the beard can be <a href="/alopecia-areata-treatment-in-rohini">alopecia areata</a>, which may regrow with medical treatment; grafts placed while it is active can be lost.</p>
        <p class="body-s mt-3">If your beard may still be filling in, read <a href="/blog/patchy-beard-wait-or-transplant">patchy beard: wait, treat or transplant?</a> and <a href="/blog/when-does-a-beard-fully-grow">when a beard fully grows</a>.</p>
      </div>
    </div>
  </div>
</section>

<!-- 4. The doctors -->
<?= delhi_doctors() ?>

<!-- 5. Techniques -->
<section class="section ht-sec section--white" id="techniques">
  <div class="wrap">
    <div style="max-width:68ch">
      <p class="eyebrow">Techniques</p>
      <h2 class="h2 mt-2">FUE and DHI for a Beard Transplant</h2>
      <p class="body mt-3">Both use follicles from your own scalp, taken from the donor area in the same way. They differ in how the grafts are placed on the face, and many beard plans use the two in different zones.</p>
    </div>

    <div class="ht-tech">
      <div class="card card--pad-lg tech-card tone--mint">
        <span class="icon-dot"><?= icon('list', 24) ?></span>
        <h3 class="h3">FUE Beard Transplant</h3>
        <p class="body-s mt-2">Follicular units are taken one at a time and placed into tiny sites made beforehand, each set flat to the skin in the direction its zone grows. Efficient over larger areas such as the cheeks.</p>
        <?= ticks([
            'Small dot scars spread across the donor area',
            'Often used across the cheeks and jaw',
            'Crusts usually settle within about a week',
        ], false) ?>
      </div>

      <div class="card card--pad-lg tech-card tone--violet">
        <span class="icon-dot"><?= icon('pencil', 24) ?></span>
        <h3 class="h3">DHI Beard Transplant</h3>
        <p class="body-s mt-2">Grafts are taken as in FUE, then each is set with an implanter pen that makes the opening and places it in one movement — useful where angle and spacing need close control, and slower per graft.</p>
        <?= ticks([
            'Opening and placement in one step',
            'Often used along the moustache and borders',
            'Crusts usually settle within about a week',
        ], false) ?>
      </div>

      <div class="tint-card tone--sky ht-tech__choose">
        <h3 class="h4">How the Doctor Plans Your Beard</h3>
        <div class="mt-3"><?= ticks([
            'Which zones you want filled, and where the borders sit',
            'How much hair already grows in each zone',
            'What your donor area can spare, with a reserve for the scalp',
            'Your scalp hair’s thickness, curl and colour against your beard',
            'One possible plan: DHI for the moustache, FUE across the cheeks',
        ], false) ?></div>
      </div>
    </div>

    <h3 class="h4 mt-6">Related Treatments at the Rohini Clinic</h3>
    <ul class="ht-patterns">
      <?php foreach ([
          '/beard-transplant-in-rohini'          => 'Beard transplant in Rohini',
          '/eyebrow-transplant-in-delhi'         => 'Eyebrow transplant in Delhi',
          '/alopecia-areata-treatment-in-rohini' => 'Alopecia areata treatment',
          DELHI_HT_HUB                           => 'Hair transplant in Delhi',
      ] as $href => $anchor): ?>
      <li><a href="<?= e($href) ?>"><?= e($anchor) ?> <?= icon('arrow', 14) ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- 6. The procedure -->
<?= delhi_beard_steps() ?>

<!-- 7. Recovery -->
<section class="section ht-sec section--white" id="recovery">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Recovery</p>
        <h2 class="h2 mt-2">Recovering From a Beard Transplant in Delhi</h2>
        <p class="body mt-3 measure">A scalp transplant can hide under a cap; a beard cannot, so many people keep the first week free of meetings and events. These timings are general: your written aftercare and your reviews set your own.</p>
        <div class="mt-4"><?= ticks([
            'Days 1–7: small crusts, redness and some swelling of the cheeks or upper lip; no picking, rubbing or shaving',
            'Weeks 2–6: the crusts clear and the transplanted hairs often fall out while the follicles stay, which is expected',
            'Months 3–4: fine new hairs usually start to appear, unevenly at first',
            'Months 10–12: density and texture are judged, and a smaller top-up is planned from here if a zone needs one',
        ], false) ?></div>
      </div>

      <div>
        <h3 class="h4">A First Week in Delhi</h3>
        <div class="factor-list">
          <div class="factor tone--mint"><span class="icon-dot"><?= icon('shield', 20) ?></span><div><b>Two-wheeler helmets</b><span>Cheek pads and chin straps press on fresh grafts. Plan cabs or a lift at first, and ask at review when a helmet is fine again.</span></div></div>
          <div class="factor tone--violet"><span class="icon-dot"><?= icon('clock', 20) ?></span><div><b>Summer heat</b><span>Heavy sweating waits until you are cleared, so plan the first days somewhere cool.</span></div></div>
          <div class="factor tone--sky"><span class="icon-dot"><?= icon('alert', 20) ?></span><div><b>Smog-season masks</b><span>A mask rubs across a fresh moustache and cheeks; on bad air days early on, staying indoors is gentler.</span></div></div>
          <div class="factor tone--amber"><span class="icon-dot"><?= icon('heart', 20) ?></span><div><b>Road dust</b><span>Wash exactly as your written aftercare says, without scrubbing the crusts.</span></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 8. Cost -->
<section class="section ht-sec section--canvas" id="cost">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Cost</p>
        <h2 class="h2 mt-2">Beard Transplant Cost in Delhi</h2>
        <p class="body mt-3 measure">There is no fixed price, because filling a thin moustache and building a full beard are different jobs. The graft count follows the zones in your design and the hair already there; the estimate follows the graft count, the technique and what it covers — given to you itemised and in writing after your examination at the Rohini clinic.</p>

        <div class="factor-list">
          <div class="factor tone--mint"><span class="icon-dot"><?= icon('chart', 20) ?></span><div><b>Zones and grafts</b><span>Mapped zone by zone from the design drawn on your face.</span></div></div>
          <div class="factor tone--violet"><span class="icon-dot"><?= icon('beard', 20) ?></span><div><b>Existing growth</b><span>Filling gaps takes fewer grafts than building from bare skin.</span></div></div>
          <div class="factor tone--sky"><span class="icon-dot"><?= icon('settings', 20) ?></span><div><b>Technique</b><span>DHI placement is slower per graft than FUE placement.</span></div></div>
          <div class="factor tone--amber"><span class="icon-dot"><?= icon('scale', 20) ?></span><div><b>Scars and staging</b><span>Scar tissue, slow lip-border work or a planned second session.</span></div></div>
        </div>

        <p class="meta mt-4 measure">A per-graft rate means little until you know the graft count it is multiplied by and what it leaves out. Ask any clinic how its number was reached.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--ink" href="#consultation"><?= icon('calendar', 17) ?> Get Your Written Estimate</a>
        </div>
        <ul class="ht-patterns mt-3">
          <li><a href="/beard-transplant-cost-in-rohini">Rohini beard cost guide <?= icon('arrow', 14) ?></a></li>
          <li><a href="/blog/hair-transplant-cost-delhi-quotes">Comparing Delhi quotes <?= icon('arrow', 14) ?></a></li>
          <li><a href="/cost-and-emi-options">EMI and payment <?= icon('arrow', 14) ?></a></li>
        </ul>
      </div>

      <div>
        <div class="tint-card tone--mint">
          <h3 class="h4">What Your Written Estimate Sets Out</h3>
          <div class="mt-3"><?= ticks([
              'The zones treated and the grafts for each',
              'Technique and local anaesthesia',
              'Procedure-day and take-home medication',
              'Dressings and follow-up reviews',
              'Anything excluded, as a separate line',
          ], false) ?></div>
          <p class="body-s mt-4">If a second session looks likely, it is stated with the first estimate, not added later.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php /* 9. Patient reviews: the Rohini clinic's own Google profile (location
           rule), as on the hair transplant pillar. */ ?>
<section class="section section--white ht-sec" id="reviews">
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

<!-- 10. FAQs -->
<?= delhi_faqs('Beard Transplant in Delhi: FAQs', $faqs, 6, 'beard, donor area, health or budget') ?>

<!-- 11. Consultation -->
<?= delhi_consult(
    'Book a Beard Transplant Consultation in Delhi',
    'Meet the doctor at the Rohini clinic for an examination of your beard and donor area, a design drawn on your own face and an itemised written estimate. You are not asked to book a procedure on the day.',
    'beard-transplant-delhi',
    DELHI_BEARD_FORM
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
