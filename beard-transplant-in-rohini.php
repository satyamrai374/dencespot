<?php
/**
 * /beard-transplant-in-rohini — beard transplant at the Delhi (Rohini) clinic.
 *
 * Built 13 Oct 2026. The agency confirmed that every service, beard
 * transplant included, is carried out at the Rohini clinic, so this page says
 * the procedure happens there (not only the consultation).
 *
 * Shares its medical facts with the Gurugram beard page but not its
 * sentences — near-duplicate city pages read as doorway pages. No prices here.
 *
 * Per the client (14 Oct 2026) the page never mentions the Gurugram clinic
 * and never links to a Gurugram URL; depth comes from neutral blog posts.
 * Landing-page layout: lp_split / lp_steps / lp_cta (home-components.php).
 *
 * Not reviewed by the clinic's doctor yet: doctor_block(..., false), no
 * medical_review_line(), no "reviewed by" badge, not in MEDICAL_PAGES.
 * Who performs the procedure at Rohini is not on record, so the procedure
 * schema node has no performer.
 *
 * SEO round 2 (14 Oct 2026): title per the competitor research, the zone
 * cards became a zone table with the site's general graft ranges (the same
 * patient-education figures the other beard pages use), a "Recovering in
 * Delhi" row, "questions worth asking any clinic", cost H2 "Beard Transplant
 * Cost in Rohini" linking the Rohini beard cost page, and 15 FAQs.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'Is the beard transplant done at the Rohini clinic?',
     'a' => 'Yes. The consultation, beard design, procedure and follow-up visits all take place at the Rohini clinic in North-West Delhi.'],
    ['q' => 'Which parts of Delhi is the Rohini clinic convenient for?',
     'a' => 'It is in North-West Delhi near the Outer Ring Road, convenient for North and North-West Delhi, including Rohini, Pitampura, Shalimar Bagh and Prashant Vihar.'],
    ['q' => 'How many grafts will my beard need?',
     'a' => 'It depends on the zones, the growth already there and the density aimed for. As general ranges, a moustache is often 300–700 grafts, a goatee 500–1,000, sideburns 200–400 per side and a full beard 1,500–3,000 or more, often staged. These are patient-education ranges, not a quote; your own count is mapped zone by zone at the consultation.'],
    ['q' => 'Does a beard transplant hurt?',
     'a' => 'The local anaesthetic injections are usually the most uncomfortable part. Once the area is numb you may still feel pressure, and tolerance varies between people. Mild soreness, tightness and facial swelling for a few days afterwards are common and managed with prescribed medication.'],
    ['q' => 'How long does the procedure take, and what should I bring?',
     'a' => 'It scales with the graft count: a limited patch takes a few hours, while a larger beard runs through most of the day with breaks. It is a day case, so you go home the same day; arrange for someone else to drive. Bring your medicines list and any records of earlier procedures, and mention diabetes, thyroid disease, bleeding disorders, blood thinners, isotretinoin or keloids beforehand. Do not stop a prescribed medicine on your own.'],
    ['q' => 'How long will the transplant be visible on my face?',
     'a' => 'Small crusts and redness usually last about a week, and swelling of the cheeks or upper lip settles over the first few days. A cap cannot hide any of it, so plan that week accordingly.'],
    ['q' => 'When can I go back to work, the gym or riding a two-wheeler?',
     'a' => 'Most people are fit for desk work within a few days, though the face looks treated for about a week. Heavy sweating, contact sport and anything involving a helmet or face guard are deferred for longer, and the timing is set at your review according to how the grafts have healed.'],
    ['q' => 'When can I trim or shave again?',
     'a' => 'Trimming is normally allowed before a razor. Your doctor clears each at a review, depending on how the grafts have settled, rather than on a fixed date. Shaving too soon can dislodge grafts.'],
    ['q' => 'When will I see the result?',
     'a' => 'Transplanted hairs commonly shed in the first weeks. New growth usually starts at around three to four months, unevenly at first, with a fuller picture of density and texture at roughly ten to twelve months. Outcomes vary between people and cannot be promised.'],
    ['q' => 'Will I need more than one session?',
     'a' => 'Often not, for a moustache, goatee or patch. A second session is more likely for a full beard built from little growth, for scar tissue, or to top up one zone once the first result matures at around a year. If it looks likely, you are told beforehand.'],
    ['q' => 'Does a beard transplant use hair I might need for my scalp later?',
     'a' => 'Yes. Beard grafts come from the same donor area as a scalp transplant, and extracted hair does not grow back. Any scalp thinning, or a family history of it, is weighed before the beard is planned.'],
    ['q' => 'What happens if a beard transplant is not suitable for me?',
     'a' => 'You are told why at the examination. A beard still filling in, active <a href="/alopecia-areata-treatment-in-rohini">alopecia areata</a>, a scar that has not matured or a donor area that cannot spare the grafts are common reasons to wait or treat something first. Some men try topical minoxidil on the beard; the evidence is modest and it should be started only with medical advice.'],
    ['q' => 'How much does a beard transplant cost at the Rohini clinic?',
     'a' => 'It depends on the zones, graft count and complexity, so it is quoted after your examination, as an itemised written estimate before any date is booked. <a href="/beard-transplant-cost-in-rohini">Beard transplant cost in Rohini</a> sets out how the figure is reached, and <a href="/blog/why-hair-transplant-quotes-vary">why hair transplant quotes vary</a> explains what moves the number.'],
    ['q' => 'Is EMI available for a beard transplant?',
     'a' => 'Instalment options through third-party lenders may be available; ask at the consultation. The lender, not the clinic, sets the terms, so compare the total payable with the cost of paying outright. See <a href="/cost-and-emi-options">cost and EMI options</a>.'],
    ['q' => 'Can I send photos on WhatsApp before booking?',
     'a' => 'Yes. Clear daylight photographs of your cheeks, jawline and chin help the Rohini clinic answer a first question, but the beard design, graft count and estimate come only from an examination in person. The clinic is open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . ').'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Beard transplant in Rohini'],
];

$page = [
    'title'         => 'Beard Transplant in Rohini, Delhi: Grafts & Cost',
    'description'   => 'Beard transplant at our Rohini clinic, North-West Delhi: grafts by zone for cheeks, jawline, moustache and sideburns, recovery, risks and what decides cost.',
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
        <span class="pill pill--dot">Rohini, Delhi</span>
        <h1 class="h1 mt-3">Beard Transplant in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">Your own scalp follicles, moved into patchy cheeks, a weak jawline, a thin moustache, short sideburns or a scar where hair will not grow. The examination, beard design, procedure and follow-up visits are all carried out at our Rohini clinic in North-West Delhi by registered medical practitioners.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/delhi-clinic#book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Beard transplant" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
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
          <img src="/assets/img/services/svc-beard-768.webp" srcset="/assets/img/services/svc-beard-512.webp 512w, /assets/img/services/svc-beard-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a wooden comb and a wooden beard brush lying on a folded green cloth" width="768" height="960" loading="eager" fetchpriority="high">
          <?= hp_ai_chip('AI-generated illustration') ?>
        </div>
        <div class="hero__badge-card">
          <p class="eyebrow">Rohini Clinic</p>
          <p class="h4 mt-1"><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></p>
          <p class="meta"><?= e(HOURS_DISPLAY) ?> · <?= e(HOURS_NOTE) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= lead_strip() ?>

<?= lp_split([
    'img'     => 'intro-donor',
    'alt'     => 'a mannequin head seen from behind, with the donor area at the back and sides marked',
    'eyebrow' => 'In brief',
    'title'   => 'What a Beard Transplant Involves',
    'html'    => '<p>Hair at the back and sides of the scalp is generally resistant to pattern hair loss, so it serves as the donor supply. Follicles are lifted from there one at a time and set where facial growth is missing or weak. Nothing new is created; your own hair is moved.</p>'
               . '<p>Two decisions shape how it reads afterwards. Angle: facial hair lies close to the skin and changes direction from cheek to jaw to lip, so each graft is set to its zone. And the edge: beard borders are single hairs, so only single-hair grafts go there.</p>'
               . '<p>How placement methods differ on the face, and how scalp hair behaves as beard hair, is covered in <a href="/blog/beard-transplant-what-to-expect">what to expect from a beard transplant</a>.</p>',
    'points'  => [
        'Once healed, the hairs keep growing and are trimmed, shaved and shaped with the rest of the beard',
        'They are often a little finer or straighter than native beard hair; for most people that blends once trimmed, for some it stays noticeable',
    ],
]) ?>

<section class="section section--canvas" id="areas">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Where it is used</p>
      <h2 class="h2 mt-2">Beard Areas and Grafts by Zone</h2>
      <p class="body mt-3">Most requests involve one or two zones rather than a whole beard, each with its own hair direction. The graft ranges are general patient-education figures, not a quote: your own count comes from a design drawn on your face and checked against what your donor area can spare.</p>
    </div>
    <div class="card mt-6" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data" style="min-width:720px">
          <caption class="sr-only">Beard transplant zones: what each involves and a general graft range (patient education, not a quote)</caption>
          <thead>
            <tr><th scope="col">Zone</th><th scope="col">What is involved</th><th scope="col">General graft range</th></tr>
          </thead>
          <tbody>
            <tr><th scope="row">Patchy cheeks</th><td>Bare islands high on the cheek, often above a moustache and chin that grow well. Grafts blend the gap into the hair around it, so existing growth lowers the count.</td><td style="white-space:nowrap">500 – 1,000</td></tr>
            <tr><th scope="row">Cheek line and jawline</th><td>A broken border along the jaw, or a cheek line that sits too low. These edges are noticed first, so their position is drawn and agreed beforehand. Sharpening an edge with growth behind it needs fewer grafts than building one.</td><td style="white-space:nowrap">800 – 1,500</td></tr>
            <tr><th scope="row">Moustache</th><td>Thin upper-lip growth. Lip hair points steeply downward on skin that moves as you talk, and the lip border is built from single-hair grafts, so it is detailed work.</td><td style="white-space:nowrap">300 – 700</td></tr>
            <tr><th scope="row">Goatee and chin</th><td>Often planned with the moustache, to close the gap between the two.</td><td style="white-space:nowrap">500 – 1,000</td></tr>
            <tr><th scope="row">Sideburns</th><td>Short, sparse or uneven sideburns, including ones left out of proportion with the temple by an earlier scalp procedure. Usually for symmetry, or to connect scalp and beard.</td><td style="white-space:nowrap">200 – 400 per side</td></tr>
            <tr><th scope="row">Scars</th><td>Mature surgical, injury, burn or cleft-lip scars can take grafts. Their weaker blood supply means fewer grafts may survive, and a second session is commoner.</td><td>Set by the scar’s size, after examination</td></tr>
            <tr><th scope="row">A full beard</th><td>Possible in selected cases. It makes the heaviest demand on the donor area and is often split across sessions.</td><td style="white-space:nowrap">1,500 – 3,000+</td></tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="grid grid--2 mt-4">
      <div class="note"><p class="h4">Ranges do not simply add up</p><p class="body-s mt-2">Zones share borders, so combined plans usually need fewer grafts than the ranges added together, and existing growth lowers every figure.</p></div>
      <div class="note"><p class="h4">Grafts drive the cost</p><p class="body-s mt-2">Beard work uses more single-hair grafts than scalp work. How a graft count becomes a quote is set out in <a href="/beard-transplant-cost-in-rohini">beard transplant cost in Rohini</a>.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="suitability">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Suitability</p>
      <h2 class="h2 mt-2">Who It Suits, and When We Advise Waiting</h2>
      <p class="body mt-3">Two checks decide most cases: <a href="/blog/when-does-a-beard-fully-grow">whether your facial hair has stopped changing</a>, and whether your scalp can spare the grafts. Both are examined in person at the Rohini clinic, not judged from a photograph.</p>
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
    <p class="body mt-5 measure">Smooth, round bare patches can be <a href="/alopecia-areata-treatment-in-rohini">alopecia areata</a>, which may regrow with medical treatment; grafts placed while it is active can be lost. Grafts used on the face are also no longer available for the scalp: see <a href="/blog/donor-area-limits-hair-transplant">why donor hair is a one-time budget</a>.</p>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'At the Rohini clinic',
    'title'   => 'What Happens at the Rohini Clinic, Step by Step',
    'intro'   => 'Each stage below takes place at the Rohini clinic. Bring your medicines list and any records of earlier procedures, and mention diabetes, thyroid disease, bleeding disorders, blood thinners, isotretinoin or keloids.',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                    'title' => 'Consultation and donor assessment', 'text' => 'History and medicines reviewed, existing growth mapped zone by zone and the skin checked. The back and sides of the scalp are examined to judge how many grafts can be spared while keeping a reserve.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned outline',  'title' => 'Beard design',                      'text' => 'Borders drawn on your face with you sitting upright, checked in a mirror and agreed. The graft count and written estimate follow from it.'],
        ['img' => 'step-procedure',    'alt' => 'sterile hair-restoration instruments laid out on a tray', 'title' => 'Procedure day',                     'text' => 'Local anaesthetic, extraction, then placement of each graft at the angle of its zone. You go home the same day; arrange for someone else to drive.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with review dates circled',               'title' => 'Follow-up visits',                  'text' => 'Reviews at the Rohini clinic as the grafts heal, shed and regrow, with photographs compared each time.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-skin',
    'alt'     => 'a sculpted cross-section of skin with a single hair follicle',
    'eyebrow' => 'Recovery',
    'title'   => 'Recovery Shows on Your Face, So Plan for It',
    'reverse' => true,
    'html'    => '<p>A scalp procedure can be hidden under a cap; a beard procedure cannot. Most people are fit for desk work within a few days, but the face looks treated for about a week, so many keep that week free of meetings and events.</p>'
               . '<p>These timings are general. Your own instructions, including when to wash, trim and shave, are given in writing and adjusted at reviews; the <a href="/blog/beard-transplant-recovery-timeline">beard transplant recovery timeline</a> has more detail.</p>',
    'points'  => [
        'First week: small crusts, redness, and swelling of the cheeks or upper lip that settles over a few days; no picking, rubbing or shaving',
        'Following weeks: crusts clear and the transplanted hairs often drop out while the follicles remain, which is expected',
        'Three to four months: fine new hairs usually start to appear, unevenly at first and often softer than the surrounding beard',
        'Ten to twelve months: a fuller picture of density and texture; if a zone needs topping up, a smaller second session is planned from here',
    ],
]) ?>

<?= lp_highlights([
    'eyebrow' => 'Recovering in Delhi',
    'title'   => 'Healing Through Delhi Heat, Helmets and Smog',
    'intro'   => 'Nothing sits between a healing beard and the city, so these matter more than after a scalp procedure. They are general practicalities; your written aftercare and your reviews set the actual timings.',
    'tone'    => 'canvas',
    'items'   => [
        ['icon' => 'cap',      'title' => 'Two-wheeler helmets',   'text' => 'A full-face helmet’s cheek pads press on grafted cheeks and jaw, and the chin strap crosses the lower beard. Riding without one is not the answer: plan cabs or a lift for the first stretch, and ask at review when a helmet is reasonable.'],
        ['icon' => 'clock',    'title' => 'Summer heat and sweat', 'text' => 'Heavy sweating is deferred for a while. In the hotter months, plan the first days somewhere cool, and keep the gym and outdoor sport for when you are cleared.'],
        ['icon' => 'shield',   'title' => 'Smog season and masks', 'text' => 'A pollution mask or cloth tied over the moustache and cheeks traps heat and rubs across fresh grafts. On heavy smog days early on, staying indoors is gentler than masking a fresh graft.'],
        ['icon' => 'calendar', 'title' => 'Dust and a clean face', 'text' => 'Roadside and building dust settles on a healing face. Wash exactly as your written instructions say, with no rubbing, picking or scrubbing of the crusts, and choose a date with a quiet first week.'],
    ],
]) ?>

<section class="section section--white" id="risks">
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

<section class="section section--canvas" id="questions">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Before you decide</p>
      <h2 class="h2 mt-2">Questions Worth Asking Any Clinic</h2>
      <p class="body mt-3">They apply wherever you have a beard transplant, including here. Clear, written answers tell you more than any description of a technique.</p>
    </div>
    <div class="card card--pad-lg mt-6">
      <?= ticks([
          'Who designs the beard, and who extracts and places the grafts?',
          'How many grafts are planned for each zone, and how was that reached?',
          'Are single-hair grafts used along the borders and the lip?',
          'How much donor hair will be left if my scalp thins later?',
          'What does the estimate include: medicines, reviews, a top-up session?',
          'When will I be cleared to trim, shave, ride with a helmet and exercise?',
      ]) ?>
    </div>
    <p class="body mt-4 measure">If your beard is still filling in, read <a href="/blog/patchy-beard-wait-or-transplant">patchy beard: wait, treat or transplant?</a> before booking anything.</p>
  </div>
</section>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split split--wide-left">
      <div>
        <p class="eyebrow">Cost</p>
        <h2 class="h2 mt-2">Beard Transplant Cost in Rohini</h2>
        <p class="body mt-3 measure">Filling in a thin moustache and building a full beard are different jobs, so there is no single price. The figure follows the graft count, which follows the zones and the design agreed at your consultation. You receive an itemised written estimate before any date is booked.</p>
        <p class="body mt-3 measure">How a graft count becomes a quote, and what an estimate should include, is explained on <a href="/beard-transplant-cost-in-rohini">beard transplant cost in Rohini</a>.</p>
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
        <p class="body mt-3">What moves a quote, and what it should include, is explained in <a href="/blog/why-hair-transplant-quotes-vary">why hair transplant quotes vary</a>. Instalment options through third-party lenders may be available; ask at the consultation, and see the <a href="/cost-and-emi-options">cost and EMI page</a>.</p>
      </div>
    </div>
  </div>
</section>

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
    'The Rohini clinic serves North and North-West Delhi, and your examination, beard design, procedure and reviews can all be arranged there.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= lp_cta([
    'eyebrow'   => 'Rohini, Delhi',
    'title'     => 'Have Your Beard Mapped at the Rohini Clinic',
    'text'      => 'Come in for an examination of your beard and donor area. You will see a design drawn on your own face, hear honestly whether a transplant makes sense for you, and leave with a written plan if it does.',
    'treatment' => 'Beard transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
