<?php
/**
 * /beard-transplant-in-rohini — beard transplant at the Delhi (Rohini) clinic.
 *
 * Built 13 Oct 2026. The agency confirmed that every service, beard
 * transplant included, is carried out at the Rohini clinic, so this page says
 * the procedure happens there (not only the consultation).
 *
 * Twin of /beard-transplant-gurgaon, which owns the technique depth (FUE vs
 * DHI on the face, donor options, graft ranges by zone, repair). This page
 * reuses its medical facts but not its sentences — near-duplicate city pages
 * read as doorway pages — and links to it for detail. Prices live on
 * /beard-transplant-cost-gurgaon only; no figure here.
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
    ['q' => 'Is the beard transplant done at the Rohini clinic or in Gurugram?',
     'a' => 'At the Rohini clinic: the consultation, beard design, procedure and follow-up visits all take place there. If our Sector 39, Gurugram clinic is easier for you, you can choose it instead.'],
    ['q' => 'Which parts of Delhi is the Rohini clinic convenient for?',
     'a' => 'It is in North-West Delhi near the Outer Ring Road, so it is the nearer of our two clinics for North and North-West Delhi, including Rohini, Pitampura, Shalimar Bagh and Prashant Vihar.'],
    ['q' => 'How long will the transplant be visible on my face?',
     'a' => 'Small crusts and redness usually last about a week, and swelling of the cheeks or upper lip settles over the first few days. A cap cannot hide any of it, so plan that week accordingly.'],
    ['q' => 'When can I trim or shave again?',
     'a' => 'Trimming is normally allowed before a razor. Your doctor clears each at a review, depending on how the grafts have settled, rather than on a fixed date. Shaving too soon can dislodge grafts.'],
    ['q' => 'Will I need more than one session?',
     'a' => 'Often not, for a moustache, goatee or patch. A second session is more likely for a full beard built from little growth, for scar tissue, or to top up one zone once the first result matures at around a year. If it looks likely, you are told beforehand.'],
    ['q' => 'Does a beard transplant use hair I might need for my scalp later?',
     'a' => 'Yes. Beard grafts come from the same donor area as a scalp transplant, and extracted hair does not grow back. Any scalp thinning, or a family history of it, is weighed before the beard is planned.'],
    ['q' => 'How much does a beard transplant cost at the Rohini clinic?',
     'a' => 'It depends on the zones, graft count and complexity, so it is quoted after your examination, as an itemised written estimate before any date is booked. Our <a href="/beard-transplant-cost-gurgaon">beard transplant cost guide</a> explains graft ranges by zone.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Beard transplant in Rohini'],
];

$page = [
    'title'         => 'Beard Transplant in Rohini, Delhi | DenceSpot Clinic',
    'description'   => 'Beard transplant at our Rohini clinic in North-West Delhi: patchy cheeks, jawline, moustache, sideburns and scars. Suitability, recovery, risks and cost.',
    'url'           => '/beard-transplant-in-rohini',
    'crumbs'        => $crumbs,
    'preload_image' => '/assets/img/services/svc-beard-768.webp',
    'schema'        => [
        schema_delhi_clinic(),
        schema_procedure('/beard-transplant-in-rohini', [
            'name'          => 'Beard Transplant',
            'alternateName' => ['Beard hair transplant', 'Facial hair transplant', 'Moustache transplant'],
            'procedureType' => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'  => 'Face (cheeks, jawline, chin, moustache, sideburns)',
            'howPerformed'  => 'Follicles are taken one at a time from the back and sides of the scalp and set into the beard area at the flat angle and changing direction of facial hair, with single-hair grafts along visible borders. Carried out as a day case under local anaesthetic at the Rohini clinic.',
            'preparation'   => 'Examination of existing facial hair zone by zone and of the scalp donor area, review of medical history and medicines, and a beard design drawn on the face and agreed with the patient before the procedure.',
            'followup'      => 'Written aftercare covering washing, trimming and shaving, and review visits with photographs as the grafts heal, shed and regrow over about a year.',
            'expectedPrognosis' => 'Transplanted hairs commonly shed in the first weeks; new growth usually starts at around three to four months, with a fuller picture at roughly ten to twelve months. Outcomes vary between patients and cannot be promised.',
            'location'      => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
            'performer'     => null,
        ]),
        schema_breadcrumbs($crumbs),
        schema_faq('/beard-transplant-in-rohini', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Clinic 2 · Rohini, Delhi</span>
        <h1 class="h1 mt-3">Beard Transplant in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">Your own scalp follicles, moved into patchy cheeks, a weak jawline, a thin moustache, short sideburns or a scar where hair will not grow. The examination, beard design, procedure and follow-up visits are all carried out at our Rohini clinic in North-West Delhi by registered medical practitioners.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Beard transplant" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp the Rohini Clinic</a>
        </div>

        <?= ticks([
            'Procedure carried out at the Rohini clinic',
            'Beard borders drawn on your face and agreed first',
            'Day case under local anaesthetic',
            'Itemised written estimate before a date is set',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-beard-768.webp"
               srcset="/assets/img/services/svc-beard-512.webp 512w, /assets/img/services/svc-beard-768.webp 768w"
               sizes="(min-width: 1080px) 520px, 100vw"
               alt="AI-generated illustration: a wooden comb and a wooden beard brush lying on a folded green cloth"
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
        <h2 class="h2 mt-2">What a Beard Transplant Involves</h2>
        <div class="stack mt-4 measure">
          <p class="body-l">Hair at the back and sides of the scalp is generally resistant to pattern hair loss, so it serves as the donor supply. Follicles are lifted from there one at a time and set where facial growth is missing or weak. Nothing new is created; your own hair is moved.</p>
          <p class="body-l">Two decisions shape how it reads afterwards. Angle: facial hair lies close to the skin and changes direction from cheek to jaw to lip, so each graft is set to its zone. And the edge: beard borders are single hairs, so only single-hair grafts go there.</p>
          <p class="body">How FUE and DHI placement differ on the face, and where else donor hair can come from, is covered on our <a href="/beard-transplant-gurgaon">Gurugram beard transplant page</a>.</p>
        </div>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow">Worth knowing first</p>
        <h3 class="h3 mt-2">It behaves like scalp hair</h3>
        <p class="body mt-3">Once healed, transplanted hairs keep growing and are trimmed, shaved and shaped with the rest of the beard.</p>
        <p class="body mt-3">They are often a little finer or straighter than native beard hair. For most people that blends once trimmed; for some it stays noticeable.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="areas">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Where it is used</p>
      <h2 class="h2 mt-2">Beard Areas That Can Be Treated</h2>
      <p class="body mt-3">Most requests involve one or two zones rather than a whole beard, each with its own hair direction.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--tint card--pad-lg"><h3 class="h3">Patchy cheeks</h3><p class="body-s mt-2">Bare islands high on the cheek, often above a moustache and chin that grow well. The aim is to blend the gap into the hair around it.</p></div>
      <div class="card card--tint card--pad-lg"><h3 class="h3">Jawline and cheek line</h3><p class="body-s mt-2">A broken border along the jaw, or a cheek line that sits too low. These edges are noticed first, so their position is drawn and agreed beforehand.</p></div>
      <div class="card card--tint card--pad-lg"><h3 class="h3">Moustache and goatee</h3><p class="body-s mt-2">Thin upper-lip growth, or a gap between moustache and chin. Lip hair points steeply downward on skin that moves as you talk, so it is detailed work.</p></div>
      <div class="card card--tint card--pad-lg"><h3 class="h3">Sideburns</h3><p class="body-s mt-2">Short, sparse or uneven sideburns, including ones left out of proportion with the temple by an earlier scalp procedure.</p></div>
      <div class="card card--tint card--pad-lg"><h3 class="h3">Scars</h3><p class="body-s mt-2">Mature surgical, injury, burn or cleft-lip scars can take grafts. Their weaker blood supply means fewer grafts may survive, and a second session is commoner.</p></div>
      <div class="card card--dashed card--pad-lg"><h3 class="h3">A full beard</h3><p class="body-s mt-2">Possible in selected cases. It makes the heaviest demand on the donor area and is often split across sessions.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="suitability">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Suitability</p>
      <h2 class="h2 mt-2">Who It Suits, and When We Advise Waiting</h2>
      <p class="body mt-3">Two checks decide most cases: whether your facial hair has stopped changing, and whether your scalp can spare the grafts. Both are examined in person at the Rohini clinic, not judged from a photograph.</p>
    </div>
    <div class="grid grid--2 mt-5">
      <div class="card card--pad-lg">
        <p class="h4">Usually a reasonable candidate</p>
        <div class="mt-3"><?= ticks([
            'Facial hair that has stopped changing from year to year',
            'Enough donor hair at the back and sides of the scalp',
            'Healthy skin in the beard area',
            'Expecting beard density, not scalp density',
        ], false) ?></div>
      </div>
      <div class="card card--dashed card--pad-lg">
        <p class="h4">Usually a reason to wait or treat first</p>
        <div class="mt-3"><?= ticks([
            'A beard still filling in, which is common into the mid-twenties',
            'Active alopecia areata patches',
            'A scar that has not yet matured',
            'Keloid-prone skin or an unsettled skin condition',
            'A donor area that cannot spare the grafts',
        ], false) ?></div>
      </div>
    </div>
    <p class="body mt-5 measure">Smooth, round bare patches can be <a href="/alopecia-areata-treatment-in-gurgaon">alopecia areata</a>, which may regrow with medical treatment; grafts placed while it is active can be lost. Grafts used on the face are also no longer available for the scalp: see <a href="/blog/donor-area-limits-hair-transplant">why donor hair is a one-time budget</a>.</p>
  </div>
</section>

<section class="section section--canvas" id="at-rohini">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">At the Rohini clinic</p>
      <h2 class="h2 mt-2">What Happens at the Rohini Clinic, Step by Step</h2>
      <p class="body mt-3">Each stage below takes place at the Rohini clinic. If our Sector 39, Gurugram clinic suits you better for any visit, you can book there instead.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="step"><span class="step-num">1</span><div><h3 class="h4">Consultation and examination</h3><p class="body-s mt-2">History and medicines reviewed, existing growth mapped zone by zone, and the skin checked for anything to treat first.</p></div></div>
      <div class="step"><span class="step-num">2</span><div><h3 class="h4">Donor assessment</h3><p class="body-s mt-2">The back and sides of the scalp are examined to judge how many grafts can be spared while keeping a reserve.</p></div></div>
      <div class="step"><span class="step-num">3</span><div><h3 class="h4">Beard design</h3><p class="body-s mt-2">Borders drawn on your face with you sitting upright, checked in a mirror and agreed. The graft count and written estimate follow from it.</p></div></div>
      <div class="step"><span class="step-num">4</span><div><h3 class="h4">Procedure day</h3><p class="body-s mt-2">Local anaesthetic, extraction, then placement of each graft at the angle of its zone. You go home the same day; arrange for someone else to drive.</p></div></div>
      <div class="step"><span class="step-num">5</span><div><h3 class="h4">Follow-up visits</h3><p class="body-s mt-2">Reviews at the Rohini clinic as the grafts heal, shed and regrow, with photographs compared each time.</p></div></div>
      <div class="note"><p class="h4">Bring to the first visit</p><p class="body-s mt-2">Your medicines list and any records of earlier procedures. Mention diabetes, thyroid disease, bleeding disorders, blood thinners, isotretinoin or keloids.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="recovery">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Recovery</p>
      <h2 class="h2 mt-2">Recovery Shows on Your Face, So Plan for It</h2>
      <p class="body mt-3">A scalp procedure can be hidden under a cap; a beard procedure cannot. Most people are fit for desk work within a few days, but the face looks treated for about a week, so many keep that week free of meetings and events.</p>
    </div>
    <div class="grid grid--4 mt-6">
      <div class="card"><span class="pill">First week</span><p class="body-s mt-3">Small crusts, redness, and swelling of the cheeks or upper lip that settles over a few days. No picking, rubbing or shaving.</p></div>
      <div class="card"><span class="pill">Following weeks</span><p class="body-s mt-3">Crusts clear, and the transplanted hairs often drop out; the follicles remain in the skin. This shedding is expected.</p></div>
      <div class="card"><span class="pill">Three to four months</span><p class="body-s mt-3">Fine new hairs usually start to appear, unevenly at first and often softer than the surrounding beard.</p></div>
      <div class="card"><span class="pill">Ten to twelve months</span><p class="body-s mt-3">A fuller picture of density and texture. If a zone needs topping up, a smaller second session is planned from here.</p></div>
    </div>
    <p class="body-s mt-5 measure">These timings are general. Your own instructions, including when to wash, trim and shave, are given in writing and adjusted at reviews. The <a href="/blog/beard-transplant-recovery-timeline">beard transplant recovery timeline</a> has more detail.</p>
  </div>
</section>

<section class="section section--canvas" id="risks">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Risks and limits</p>
      <h2 class="h2 mt-2">Risks and Limitations to Weigh Up</h2>
      <p class="body mt-3">This is minor surgery on your face, the part of you people see first. These points are discussed again before consent, and no density or appearance can be promised.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card"><h3 class="h4">Folliculitis and ingrown hairs</h3><p class="body-s mt-2">Inflamed spots around new hairs are more frequent in the beard than on the scalp; they usually clear quickly, occasionally with medication.</p></div>
      <div class="card"><h3 class="h4">Numbness or tingling</h3><p class="body-s mt-2">Altered feeling in the beard or donor area is common and usually fades over weeks to months.</p></div>
      <div class="card"><h3 class="h4">Donor-area marks</h3><p class="body-s mt-2">Small dot scars at the back of the scalp, usually hidden by hair but visible with a very short clipper cut.</p></div>
      <div class="card"><h3 class="h4">Uneven take and shock loss</h3><p class="body-s mt-2">Not every graft survives, and nearby beard hair can shed for a while. Some beards need a top-up session.</p></div>
      <div class="card"><h3 class="h4">Texture and colour</h3><p class="body-s mt-2">Scalp hair can be finer or a slightly different shade from native beard hair, and the difference does not always disappear.</p></div>
      <div class="card"><h3 class="h4">Angle errors are hard to undo</h3><p class="body-s mt-2">Grafts set too steeply bristle, and correcting that means more surgery, which is why the design is settled beforehand.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split split--wide-left">
      <div>
        <p class="eyebrow">Cost</p>
        <h2 class="h2 mt-2">What Decides the Cost</h2>
        <p class="body mt-3 measure">Filling in a thin moustache and building a full beard are different jobs, so there is no single price. The figure follows the graft count, which follows the zones and the design agreed at your consultation. You receive an itemised written estimate before any date is booked.</p>
        <div class="grid grid--2 mt-5">
          <div class="card"><p class="h4">Zones treated</p><p class="meta mt-1">Cheeks, jaw, moustache, chin, sideburns</p></div>
          <div class="card"><p class="h4">Existing growth</p><p class="meta mt-1">How much hair already grows there</p></div>
          <div class="card"><p class="h4">Technique</p><p class="meta mt-1">FUE, DHI, or both in different zones</p></div>
          <div class="card"><p class="h4">Scars or staging</p><p class="meta mt-1">Scar tissue and planned second sessions</p></div>
        </div>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow">Before comparing quotes</p>
        <p class="body mt-3">A per-graft rate means little until you know the graft count it is multiplied by and what it leaves out. Ask how the number was reached.</p>
        <p class="body mt-3">Graft ranges by zone and what a quote should include are explained in our <a href="/beard-transplant-cost-gurgaon">beard transplant cost guide</a>. Third-party instalment options are on the <a href="/cost-and-emi-options">cost and EMI page</a>.</p>
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
        <h2 class="h2 mt-2">Beard Transplant in Rohini: Questions</h2>
        <p class="body-s mt-3">General patient information. Questions about your own beard, donor area or health are answered at the examination.</p>
        <a class="btn btn--accent mt-4" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask the Rohini clinic</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'Visit Our Rohini Clinic',
    'The Rohini clinic serves North and North-West Delhi, and your examination, beard design, procedure and reviews can all be arranged there. Our Sector 39, Gurugram clinic offers the same treatment if that is closer.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= cta_band(
    'Have Your Beard Mapped at the Rohini Clinic',
    'Come in for an examination of your beard and donor area. You will see a design drawn on your own face, hear honestly whether a transplant makes sense for you, and leave with a written plan if it does.',
    'rohini-beard-transplant',
    ['Beard transplant', 'Moustache or goatee', 'Sideburns', 'Scar in the beard area', 'Not sure — please advise'],
    'Delhi (Rohini)'
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
