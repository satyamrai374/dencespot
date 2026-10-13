<?php
/**
 * /eyebrow-transplant-in-rohini — eyebrow transplant at the Delhi (Rohini) clinic.
 *
 * Built 13 Oct 2026. The agency confirmed that every service, eyebrow
 * transplant included, is carried out at the Rohini clinic, so this page says
 * the procedure happens there (not only the consultation).
 *
 * Twin of /eyebrow-transplant-in-gurgaon, which owns the technique depth.
 * Same medical facts (single-hair grafts, flat angle, three-way change of
 * direction, lifelong trimming, active alopecia areata as a stop, medical
 * causes first), new sentences — near-duplicate city pages read as doorway
 * pages. No density figures, success rates or prices.
 *
 * Not reviewed by the clinic's doctor yet: doctor_block(..., false), no
 * medical_review_line(), no "reviewed by" badge, not in MEDICAL_PAGES.
 * Who performs the procedure at Rohini is not on record, so the procedure
 * schema node has no performer.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'Is the eyebrow transplant done at the Rohini clinic or in Gurugram?',
     'a' => 'At the Rohini clinic, where the assessment, brow design, procedure and reviews all take place. You can choose our Sector 39, Gurugram clinic instead if it suits you better.'],
    ['q' => 'Which parts of Delhi is the Rohini clinic convenient for?',
     'a' => 'It lies near the Outer Ring Road, which makes it the closer clinic for anyone in North or North-West Delhi: Rohini, Pitampura, Shalimar Bagh, Prashant Vihar and the areas around them.'],
    ['q' => 'How often will the new brow hairs need trimming?',
     'a' => 'Usually every week or two, for good. Transplanted hairs keep the long growth cycle of scalp hair, so they do not stop at brow length the way your own brow hair does.'],
    ['q' => 'Can I have an eyebrow transplant if I have alopecia areata?',
     'a' => 'Not while it is active. The condition can attack grafted follicles as readily as the original ones, so it is treated first and must stay stable for a long stretch before grafting is considered.'],
    ['q' => 'When will the new brows grow in?',
     'a' => 'The transplanted hairs usually shed within a few weeks. Regrowth tends to begin at around three to four months and is uneven at first, and the shape settles over roughly eight to twelve months.'],
    ['q' => 'How is a transplant different from microblading?',
     'a' => 'Microblading places pigment in the skin to imitate hairs; nothing grows, and it fades over time and has to be repeated. A transplant moves living follicles that produce hair, with a long timeline and lifelong trimming. Both address sparse brows, by very different means.'],
    ['q' => 'How much does an eyebrow transplant cost at the Rohini clinic?',
     'a' => 'The figure follows the number of grafts in your agreed design, so it is worked out after your assessment rather than listed beforehand. You receive an itemised written estimate before booking a date; our <a href="/hair-transplant-cost-in-gurgaon">hair transplant cost guide</a> explains what moves the number.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Eyebrow transplant in Rohini'],
];

$page = [
    'title'         => 'Eyebrow Transplant in Rohini, Delhi | DenceSpot Clinic',
    'description'   => 'Eyebrow transplant at our Rohini clinic in North-West Delhi: single-hair grafts for thin, over-plucked or scarred brows, when to wait, and lifelong trimming.',
    'url'           => '/eyebrow-transplant-in-rohini',
    'crumbs'        => $crumbs,
    'preload_image' => '/assets/img/services/svc-eyebrow-768.webp',
    'schema'        => [
        schema_delhi_clinic(),
        schema_procedure('/eyebrow-transplant-in-rohini', [
            'name'          => 'Eyebrow Transplant',
            'alternateName' => ['Eyebrow hair transplant', 'Eyebrow hair restoration'],
            'procedureType' => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'  => 'Eyebrow',
            'howPerformed'  => 'Hair is taken from the donor zone at the back of the scalp and divided under magnification into grafts of one hair each. Each graft is set into the brow at a shallow angle, following the upward, outward and downward direction of brow hair along its length. Carried out as a day case under local anaesthetic at the Rohini clinic.',
            'preparation'   => 'Assessment of why the brow hair is missing, exclusion of active alopecia areata and other active skin disease, review of medicines, and a brow shape drawn and agreed with the patient before the procedure.',
            'followup'      => 'Written aftercare for the first days, then review visits with photographs through shedding and regrowth, and trimming advice once the hairs are growing.',
            'expectedPrognosis' => 'Transplanted hairs usually shed within the first weeks; regrowth tends to begin at around three to four months and the shape settles over roughly eight to twelve months. The hairs keep scalp growth characteristics and need regular trimming indefinitely. Outcomes vary between patients and cannot be promised.',
            'location'      => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
            'performer'     => null,
        ]),
        schema_breadcrumbs($crumbs),
        schema_faq('/eyebrow-transplant-in-rohini', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Clinic 2 · Rohini, Delhi</span>
        <h1 class="h1 mt-3">Eyebrow Transplant in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">Single hairs taken from the back of your scalp and placed one by one into brows that are thin, over-plucked or scarred. Registered medical practitioners carry out the assessment, brow design, procedure and follow-up visits at our clinic in Rohini, North-West Delhi. One thing to know first: the new hairs keep growing, so they need trimming for life.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Eyebrow transplant" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp the Rohini Clinic</a>
        </div>

        <?= ticks([
            'Procedure carried out at the Rohini clinic',
            'Brow shape drawn and agreed before any graft is taken',
            'One hair per graft, placed individually',
            'Day case under local anaesthetic',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-eyebrow-768.webp"
               srcset="/assets/img/services/svc-eyebrow-512.webp 512w, /assets/img/services/svc-eyebrow-768.webp 768w"
               sizes="(min-width: 1080px) 520px, 100vw"
               alt="AI-generated illustration: an eyebrow drawn in fine individual hairs on a pale, rounded cream surface"
               width="768" height="960" loading="eager" fetchpriority="high">
          <?php /* Wrapper pins the chip to the top edge: on phones the badge card overlaps the image's bottom edge. */ ?>
          <span style="position:absolute;top:0;left:0;right:0;height:50px"><?= hp_ai_chip('AI-generated illustration') ?></span>
        </div>
        <div class="hero__badge-card">
          <p class="eyebrow">Clinic 2 · Rohini</p>
          <p class="h4 mt-1"><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></p>
          <p class="meta"><?= e(HOURS_DISPLAY) ?> · <?= e(HOURS_NOTE) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="what-is">
  <div class="wrap">
    <div class="split split--wide-left">
      <div>
        <p class="eyebrow">In brief</p>
        <h2 class="h2 mt-2">How an Eyebrow Transplant Works</h2>
        <div class="stack mt-4 measure">
          <p class="body-l">Donor hair comes from the back of the scalp, the zone used for a scalp transplant, because it is the only nearby source in useful quantity. After extraction, each follicular unit is divided under magnification so every graft carries one hair. A graft holding two or three hairs would sit in a brow as a small tuft.</p>
          <p class="body-l">Placement is where brow work differs most. Brow hair lies almost along the skin, so each site is made at a shallow angle, and its direction shifts: hairs near the nose rise, those in the middle run outward, and those at the tail turn down. Each graft is set to match its part of the brow.</p>
          <p class="body">The technique is described in more depth on our <a href="/eyebrow-transplant-in-gurgaon">Gurugram eyebrow transplant page</a>.</p>
        </div>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow">Read this first</p>
        <h3 class="h3 mt-2">Trimming is for life</h3>
        <p class="body mt-3">Your own brow hair grows for only a short time before stopping at brow length. Hair moved from the scalp keeps the scalp's longer cycle and carries on growing.</p>
        <p class="body mt-3">Most people trim the transplanted hairs every week or two, indefinitely. That is how the hair behaves, not a side effect, and no design avoids it. If that sounds unworkable, tell us: it would make this the wrong procedure for you.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="suits">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Who it can help</p>
      <h2 class="h2 mt-2">Thin, Over-Plucked or Scarred Brows</h2>
      <p class="body mt-3">Why a brow is sparse matters more than how sparse it is. These are the situations where grafting is usually worth discussing.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="card card--tint card--pad-lg"><h3 class="h3">Years of plucking or threading</h3><p class="body-s mt-2">Repeated plucking can damage follicles for good. Hair that has stayed away for a long time is unlikely to return, and this is one of the more straightforward reasons to consider grafting, provided the skin is healthy.</p></div>
      <div class="card card--tint card--pad-lg"><h3 class="h3">Brows that were always sparse</h3><p class="body-s mt-2">Some people have simply never had much brow hair. There is no disease to treat, and grafting adds hair that was never there.</p></div>
      <div class="card card--tint card--pad-lg"><h3 class="h3">Scars from injury or surgery</h3><p class="body-s mt-2">A mature scar can be grafted, but blood supply in scar tissue is weaker, so fewer grafts tend to survive. The work is kept conservative and is sometimes split into two sessions.</p></div>
      <div class="card card--tint card--pad-lg"><h3 class="h3">Burns</h3><p class="body-s mt-2">Judged individually. How deep the burn went and how settled the scar is decide whether grafting is feasible, and sometimes it is not.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="not-advised">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">When it is not advised</p>
      <h2 class="h2 mt-2">When Surgery Should Wait, or Not Happen</h2>
      <p class="body mt-3">Some brow loss has a medical cause that needs attention before any graft is placed. In these situations you will be advised to treat or wait first.</p>
    </div>
    <div class="card card--pad-lg mt-6">
      <p class="eyebrow">A firm stop</p>
      <h3 class="h3 mt-2">Active alopecia areata</h3>
      <p class="body mt-3 measure">This autoimmune condition attacks hair follicles and can attack transplanted ones just as readily. Grafting while it is active can mean losing the grafts and wasting donor hair. It is treated first and has to stay quiet for a long stretch before surgery is considered; see <a href="/alopecia-areata-treatment-in-gurgaon">alopecia areata treatment</a>.</p>
    </div>
    <div class="grid grid--2 mt-4">
      <div class="card"><h3 class="h4">Thyroid disease</h3><p class="body-s mt-2">Thinning of the outer third of the brow is a classic thyroid sign. The thyroid is checked and treated first, because brow hair often recovers once it is.</p></div>
      <div class="card"><h3 class="h4">After chemotherapy</h3><p class="body-s mt-2">Brow hair very often grows back by itself. Grafting waits until treatment is well behind you and regrowth has had time.</p></div>
      <div class="card"><h3 class="h4">Inflamed or unsettled skin</h3><p class="body-s mt-2">Any active inflammatory skin condition around the brow is brought under control before grafting is discussed.</p></div>
      <div class="card card--dashed"><h3 class="h4">Not wanting to trim</h3><p class="body-s mt-2">If lifelong trimming is not acceptable, a transplant is the wrong choice, however suitable your skin and donor area.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="design">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Design</p>
        <h2 class="h2 mt-2">The Brow Is Designed Before Anything Is Taken</h2>
        <p class="body-l mt-3 measure">A brow changes how a whole face reads, so its shape is decided with you rather than improvised on the day. It is drawn on, viewed in a mirror, adjusted and agreed before consent, and the graft count is worked out from the agreed drawing.</p>
        <p class="body-l mt-3 measure">Two principles guide it. Faces are not symmetrical, so the aim is a pair that suits your face, not two mirror images, which tend to look artificial. And restraint: a real brow is fuller through its body, thinner towards the tail and softly irregular at the edges. Packing it solid is what makes work look done.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Decided in the drawing</p>
        <div class="mt-3"><?= ticks([
            'Where each brow starts near the nose',
            'Height and position of the arch',
            'Thickness through the body of the brow',
            'How the tail tapers away',
            'Hair direction in each part of the brow',
            'How the two brows balance each other',
        ], false) ?></div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="at-rohini">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">At the Rohini clinic</p>
      <h2 class="h2 mt-2">Your Visits to the Rohini Clinic</h2>
      <p class="body mt-3">Every step below happens at the Rohini clinic. Any visit can be moved to our Sector 39, Gurugram clinic if that is easier for you.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="step"><span class="step-num">1</span><div><h3 class="h4">Assessment</h3><p class="body-s mt-2">Why the brow hair is missing, the state of the skin, and how much your donor area can spare. Anything needing medical treatment first is picked up here.</p></div></div>
      <div class="step"><span class="step-num">2</span><div><h3 class="h4">Brow design</h3><p class="body-s mt-2">Shape drawn on, viewed in a mirror and adjusted until you agree it. The number of grafts, and your written estimate, come from this drawing.</p></div></div>
      <div class="step"><span class="step-num">3</span><div><h3 class="h4">Procedure</h3><p class="body-s mt-2">Local anaesthetic, extraction, hairs split singly under magnification, then placed. It takes a few hours, and you leave the same day.</p></div></div>
      <div class="step"><span class="step-num">4</span><div><h3 class="h4">Reviews</h3><p class="body-s mt-2">Visits at the Rohini clinic through shedding and regrowth, with photographs to track the shape and trimming advice once the hairs are growing.</p></div></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="recovery">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Recovery</p>
        <h2 class="h2 mt-2">Recovery and the First Year</h2>
        <p class="body mt-3 measure">Each graft forms a tiny crust that lasts several days, and the skin around the eyes often swells for the first few days before settling. Most people feel comfortable being seen in public after about a week.</p>
        <p class="body mt-3 measure">Within the first few weeks the transplanted hairs usually fall out. The follicles stay in the skin, so this shedding is expected rather than a sign of failure.</p>
        <p class="body mt-3 measure">New hairs generally appear from around three to four months, patchy at first. The shape settles over roughly eight to twelve months, so judging it earlier is premature. Your aftercare is given in writing, and our <a href="/hair-transplant-aftercare">aftercare guide</a> covers the general principles.</p>
      </div>
      <div>
        <div class="card card--pad-lg">
          <p class="h4">In the first days</p>
          <div class="mt-3"><?= ticks([
              'Crusts around each graft are normal',
              'Swelling near the eyes is common',
              'No rubbing, scratching or picking',
              'Follow the sleeping position you are given',
          ], false) ?></div>
        </div>
        <div class="card card--pad-lg mt-4">
          <p class="h4">Avoid until you are cleared</p>
          <div class="mt-3"><?= ticks([
              'Brow pencil, powder or other make-up',
              'Threading, plucking or waxing nearby',
              'Swimming, saunas and hard workouts',
              'Anything pressing on the brows',
          ], false) ?></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="limits-cost">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Limits and cost</p>
        <h2 class="h2 mt-2">Risks, Limits and What Affects the Cost</h2>
        <p class="body mt-3 measure">Results vary from person to person, and no particular look can be promised. The main limits to weigh up:</p>
        <div class="mt-4"><?= ticks([
            'Not every graft survives, and survival is lower in scar tissue',
            'Some brows need a smaller follow-up session to refine shape or add density',
            'Crusting and swelling around the eyes in the first days',
            'Small dot marks at the back of the scalp where hair was taken, usually hidden by surrounding hair',
            'Uneven early growth that can take most of a year to settle',
        ], false) ?></div>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">What moves the cost</p>
        <p class="body-s mt-2">There is no fixed price. The estimate follows your agreed design and is given itemised, in writing, before any date is booked.</p>
        <div class="mt-3"><?= ticks([
            'Number of grafts in the agreed design',
            'One brow or both; a partial fill or a full rebuild',
            'Scarred or burned skin, which is slower work',
            'Whether a second session is planned',
        ], false) ?></div>
        <p class="body-s mt-3">Brow grafts hold one hair each, so comparing them per graft with a scalp quote is misleading. See the <a href="/hair-transplant-cost-in-gurgaon">hair transplant cost guide</a>.</p>
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
        <h2 class="h2 mt-2">Eyebrow Transplant in Rohini: Questions</h2>
        <p class="body-s mt-3">General information only. Questions about your own brows or medical history are answered at your assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask the Rohini clinic</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'Visit Our Rohini Clinic',
    'Our Rohini clinic is in North-West Delhi, and your brow assessment, design, procedure and reviews can all be arranged there. The same treatment is available at our Gurugram clinic in Sector 39.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= cta_band(
    'See Your New Brow Shape Drawn First',
    'Book an assessment at the Rohini clinic. You will learn whether grafting suits the reason your brows are sparse, see a proposed shape on your own face, and have the lifelong trimming explained before you decide anything.',
    'rohini-eyebrow-transplant',
    ['Eyebrow transplant', 'Eyebrow transplant — after over-plucking', 'Eyebrow transplant — scar or burn', 'Not sure — please advise'],
    'Delhi (Rohini)'
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
