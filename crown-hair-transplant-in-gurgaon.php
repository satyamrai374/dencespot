<?php
/**
 * /crown-hair-transplant-in-gurgaon
 *
 * Surgical spoke off /hair-transplant-in-gurgaon. Owns the crown/vertex, which
 * is a genuinely different clinical problem from the hairline and deserves its
 * own page rather than a section on the hub.
 *
 * The argument the page is built around: the crown is the worst value per graft
 * on the scalp. It is a circular whorl, so coverage is fought for in every
 * direction at once; the area expands as loss progresses, so today's edge is
 * not tomorrow's; and it is the region most likely to need a second procedure.
 * That is why we ration it, and why "crown first" is usually the wrong plan for
 * a young patient.
 *
 * Cannibalisation split: /hairline-transplant-in-gurgaon owns the front, the
 * technique pages own FUE/DHI, the cost hub owns pricing. Nothing quantified
 * here that the clinic cannot evidence — no graft-per-cm2 figures, no coverage
 * percentages, no survival rates.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'What is a crown hair transplant?',
     'a' => 'A transplant that restores the vertex — the circular area at the back and top of the head where the hair spirals out from a central whorl. The extraction is the same as any other transplant; the difference is in how the grafts are angled and directed to rebuild a whorl rather than a forward-growing sheet of hair.'],
    ['q' => 'Why is the crown harder to treat than the hairline?',
     'a' => 'Three reasons. Hair there radiates outward from a whorl, so there is no single direction to follow and coverage has to be built in every direction at once. The bald area is roughly circular, and a circle needs far more grafts to fill than a strip of the same width. And the crown usually keeps expanding, so an edge that looks finished today can have a gap around it in a few years.'],
    ['q' => 'Does the crown need more grafts than the front?',
     'a' => 'For the same visible improvement, generally yes. A hairline is a band; a crown is an area, and the graft requirement rises quickly as the diameter grows. This is the main reason crown work is planned carefully rather than simply added on.'],
    ['q' => 'Should I treat the crown or the hairline first?',
     'a' => 'For most people with limited donor supply, the front comes first. It frames the face, it is what people see when they talk to you, and it needs fewer grafts for the visible return. The crown is generally addressed once the front is settled and there is donor hair to spare. If the crown is your only area of loss, that changes the calculation.'],
    ['q' => 'Will one session be enough for my crown?',
     'a' => 'Sometimes, and often not. Crown work is staged more frequently than frontal work, because the area can continue to expand and because building meaningful density across a circle can exceed what one safe session should take from the donor. Where a second stage is likely, we say so before you start rather than after.'],
    ['q' => 'What is a whorl and why does it matter?',
     'a' => 'The whorl is the spiral point the crown hair grows out of. Recreating it is what makes crown work look natural, because grafts placed on a uniform angle across a whorl produce a flat, brushed-looking patch that reads as artificial. The direction of every site changes as it moves around the spiral.'],
    ['q' => 'Am I too young for a crown transplant?',
     'a' => 'Early crown loss in a young patient is one of the situations where we most often advise waiting. Crown loss that begins early tends to keep going, and grafting the middle of an area that will keep widening leaves an island of transplanted hair with a ring of baldness around it. Medical treatment first is usually the better plan.'],
    ['q' => 'Can medication treat crown thinning instead?',
     'a' => 'Medical treatment is well established for the vertex and is often tried first, particularly where the thinning is diffuse rather than bald. Whether it is appropriate for you depends on your assessment. It also matters after surgery, because it works on the native hair the transplant does not replace.'],
    ['q' => 'Will PRP help my crown?',
     'a' => 'It is used to support thinning hair rather than to regrow a bald crown, and it is often run alongside medical treatment. It does not substitute for grafting where the follicles are gone. See <a href="/hair-prp-treatment-in-gurgaon">hair PRP treatment</a> for what it can and cannot do.'],
    ['q' => 'How long does crown regrowth take?',
     'a' => 'The same timeline as anywhere else. Transplanted hairs commonly shed within the first weeks, growth generally starts around three to four months, and the fuller picture comes at roughly ten to twelve months. Crowns often look thinner for longer than the front, simply because there is more area to fill.'],
    ['q' => 'Will my crown look completely full again?',
     'a' => 'Usually the honest answer is improved coverage rather than the density you had at twenty. A crown can be given convincing coverage from normal viewing angles with a sensible graft number; chasing photographic fullness under overhead light usually costs more donor hair than it is worth. What is realistic for your case is discussed at assessment.'],
    ['q' => 'Is scalp micropigmentation an alternative for the crown?',
     'a' => 'It can be, either instead of surgery or alongside it. Pigment adds the appearance of density without spending donor hair, which is a real advantage in a region that consumes grafts quickly. It adds no actual hair. See <a href="/scalp-micropigmentation-in-gurgaon">scalp micropigmentation</a>.'],
    ['q' => 'Does a crown transplant hurt?',
     'a' => 'The local anaesthetic injections are the uncomfortable part. The procedure itself is not typically painful, though it is long. Soreness for a few days afterwards is normal and managed with prescribed medication.'],
    ['q' => 'How much does a crown hair transplant cost in Gurgaon?',
     'a' => 'It follows the graft number, which follows the mapped area and your donor supply, so it is quoted after assessment. Because the crown is graft-hungry, it is worth asking any clinic how the number was reached. Our <a href="/hair-transplant-cost-in-gurgaon">cost guide</a> explains what moves it.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair transplant', 'url' => '/hair-transplant-in-gurgaon'],
    ['name' => 'Crown hair transplant in Gurgaon'],
];

$page = [
    'title'       => 'Crown Hair Transplant in Gurgaon | DenceSpot Clinic',
    'description' => 'Crown hair transplant in Gurgaon. Whorl direction rebuilt graft by graft, with honest advice on staging and whether the crown should be treated first at all.',
    'url'         => '/crown-hair-transplant-in-gurgaon',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/crown-hair-transplant-in-gurgaon', [
            'name'          => 'Crown Hair Transplant',
            'alternateName' => ['Vertex hair transplant', 'Crown hair restoration', 'Vertex hair restoration'],
            'procedureType' => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'  => 'Vertex of the scalp',
            'howPerformed'  => 'Follicular units are extracted from the donor area of the scalp and sorted under magnification. Recipient sites are made across the vertex following the radial pattern of the natural whorl, with the angle and direction of each site changing as it moves around the spiral, and grafts are placed to build coverage outward from the whorl point. Performed as a day case under local anaesthetic and sometimes staged across more than one session.',
            'preparation'   => 'Clinical assessment of hair-loss pattern and likely progression of the vertex, donor density measurement, review of medication, photographic mapping of the area to be covered, and a plan agreed with the patient covering whether the crown is treated first or after the frontal region.',
            'followup'      => 'Wash instruction and review in the first week, then scheduled photographic reviews as the transplanted hair sheds and regrows, alongside ongoing medical treatment for the surrounding native hair.',
            'expectedPrognosis' => 'Transplanted hairs commonly shed within the first weeks; new growth typically begins around three to four months with a fuller result at approximately ten to twelve months. The vertex may continue to expand with age and a further session is sometimes required. Outcomes vary between patients and are not guaranteed.',
        ]),
        schema_faq('/crown-hair-transplant-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Crown hair transplant in Gurgaon</span>
        <h1 class="h1 mt-3">Crown Hair Transplant in Gurgaon, Planned Around What It Costs You</h1>
        <p class="lead mt-3 measure">The crown is the most expensive real estate on your scalp. It is circular, so it swallows grafts in every direction. It keeps expanding, so today's edge is not final. And it is where a clinic chasing a big graft number can spend your donor supply fastest. It is treatable, and it is worth planning properly.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Whorl direction rebuilt site by site',
            'Told honestly if the front should come first',
            'Staging discussed before you start, not after',
            NAP_LOCALITY . ' · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow"><img src="/assets/img/clinic-equipment.jpg" alt="Magnification and graft-placement instruments used for vertex work at DenceSpot Clinic, Gurugram" width="800" height="1000" loading="eager"></div>
        <div class="hero__badge-card">
          <p class="eyebrow">Performed &amp; reviewed by</p>
          <p class="h4 mt-2"><?= e(doctor_name()) ?></p>
          <p class="body-s mt-1"><?= e(doctor_credit()) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="trust">
  <div class="wrap">
    <div class="grid grid--5">
      <div class="card"><?= icon('settings', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Whorl rebuilt, not filled</p><p class="body-s mt-2">Direction changes around the spiral, site by site.</p></div>
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Area mapped first</p><p class="body-s mt-2">Coverage measured before a number is quoted.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Donor rationed</p><p class="body-s mt-2">The crown never gets grafts the front will need.</p></div>
      <div class="card"><?= icon('list', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Staging declared upfront</p><p class="body-s mt-2">If a second session is likely, you hear it first.</p></div>
      <div class="card"><?= icon('info', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Told if it is too early</p><p class="body-s mt-2">An expanding crown in a young patient waits.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="what-is">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">The basics, plainly</p>
        <h2 class="h2 mt-2">What Makes the Crown Different</h2>
        <p class="body-l mt-3 measure">The crown, or vertex, is the area at the back and top of the head where hair grows out from a central spiral called a whorl. Everywhere else on the scalp, hair broadly agrees on a direction. At the crown it does not — it radiates, and the direction of growth changes continuously as you move around the spiral.</p>
        <p class="body-l mt-3 measure">That has a direct surgical consequence. Every recipient site has to be made at its own angle and its own direction, following the spiral. Grafts placed on one uniform angle across a crown produce a flat, brushed-down patch that catches the light wrongly and reads as artificial even to people who cannot name the problem.</p>
        <p class="body-l mt-3 measure">The second difference is geometry. A receding hairline is a band, and a band of a given width takes a predictable number of grafts. A crown is a disc, and the graft requirement grows sharply as its diameter grows. Two patients whose crowns look similarly thin in a mirror can need very different numbers.</p>
        <p class="body-l mt-3 measure">The third is that the crown moves. Vertex loss commonly keeps expanding for years. Whatever is grafted sits inside a boundary that is still travelling outwards, and a plan that ignores that produces an island of hair with a ring of scalp around it.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow">The blunt version</p>
        <h3 class="h3 mt-2">Why we ration crown work</h3>
        <p class="body mt-3">Your donor area is finite and it has to last your lifetime. Every graft placed in the crown is a graft unavailable to the front later.</p>
        <p class="body mt-3">The front is what people see across a table. The crown is seen from above and behind, in overhead light, by fewer people, less often.</p>
        <p class="body mt-3">That is not an argument against treating it. It is an argument for treating it in the right order, with a number that leaves you something in reserve.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="order">
  <div class="wrap">
    <p class="eyebrow">Planning</p>
    <h2 class="h2 mt-2">Crown First, or Front First?</h2>
    <p class="body-l mt-3 measure">This is the question most crown consultations actually turn on, and the answer is not the same for everyone.</p>
    <div class="grid grid--2 mt-5">
      <div class="card card--pad-lg">
        <p class="h4">The front usually comes first when</p>
        <?= ticks([
            'You have loss at both the front and the crown',
            'Donor supply is limited relative to the loss',
            'The pattern is still progressing',
            'You are young and the crown is opening up',
        ], false) ?>
        <p class="body-s mt-4">The frontal region frames the face and returns more visible benefit per graft. Securing it first is the conservative plan, and it keeps options open.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">The crown is treated first when</p>
        <?= ticks([
            'The crown is genuinely your only area of loss',
            'The frontal hairline is intact and stable',
            'Donor supply is good and loss has settled',
            'The crown is what actually bothers you',
        ], false) ?>
        <p class="body-s mt-4">If the front is secure and the donor can support it, there is no reason to make you wait. The point is that it should be a decision, not a default.</p>
      </div>
    </div>
    <div class="card card--pad-lg mt-6">
      <p class="eyebrow">A pattern worth recognising</p>
      <h3 class="h3 mt-2">The young patient with an opening crown</h3>
      <p class="body mt-3 measure">Crown loss that starts early tends to keep going, often for decades. Grafting the centre of an area that is still widening produces the worst available outcome: a patch of transplanted hair with a ring of new baldness around it, and a donor area already spent. Medical treatment to slow the process comes first, with surgery reconsidered once the pattern has declared itself.</p>
      <p class="body mt-3 measure">If that is your situation, you will be told so. It is a less profitable answer and a better one.</p>
    </div>
  </div>
</section>

<section class="section section--canvas" id="alternatives">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Other routes</p>
        <h2 class="h2 mt-2">Options That Do Not Spend Donor Hair</h2>
        <p class="body-l mt-3 measure">Surgery is not the only way to improve how a crown looks, and for some people it is not the first thing to try.</p>
        <p class="body-l mt-3 measure"><strong>Medical treatment</strong> is well established for vertex thinning and is often the first step where hair is thinning rather than gone. It also matters after surgery, because it acts on the native hair a transplant does not replace.</p>
        <p class="body-l mt-3 measure"><strong>Scalp micropigmentation</strong> adds the appearance of density using pigment rather than follicles. In a region that consumes grafts this quickly, that is a genuine advantage — it can make a thinning crown read as fuller, or blend the edge of a grafted area, without touching your donor supply.</p>
        <p class="body-l mt-3 measure"><strong>Supportive treatments</strong> such as PRP are used alongside medical therapy to support existing hair. They do not regrow a bald crown, and any clinic suggesting otherwise is overselling them.</p>
      </div>
      <div>
        <div class="card card--pad-lg">
          <p class="h4">Worth reading</p>
          <p class="body-s mt-2"><a href="/hair-fall-treatment-in-gurgaon">Hair fall treatment</a> — the medical route, and what it can hold onto.</p>
          <p class="body-s mt-3"><a href="/scalp-micropigmentation-in-gurgaon">Scalp micropigmentation</a> — density without grafts, and its limits.</p>
          <p class="body-s mt-3"><a href="/hair-prp-treatment-in-gurgaon">Hair PRP treatment</a> — what it supports and what it does not do.</p>
          <p class="body-s mt-3"><a href="/hairline-transplant-in-gurgaon">Hairline transplant</a> — if the front is the priority.</p>
        </div>
        <div class="card card--pad-lg mt-4">
          <p class="h4">A combination is common</p>
          <p class="body-s mt-2">Grafting the crown, pigment to blend the perimeter, and medical treatment to hold the surrounding native hair is a frequent plan. It uses less donor supply than surgery alone and ages better.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--ink" id="journey">
  <div class="wrap">
    <p class="eyebrow" style="color:var(--accent)">The process</p>
    <h2 class="h2 mt-2" style="color:#fff">From Consultation to Regrown Crown</h2>
    <div class="grid grid--4 mt-6">
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 01</p><p class="h4 mt-2" style="color:#fff">Assessment</p><p class="body-s mt-2">Vertex mapped and measured, donor density checked, progression considered, and the order of treatment decided with you.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 02</p><p class="h4 mt-2" style="color:#fff">Plan and staging</p><p class="body-s mt-2">Graft number from the mapped area, whorl position identified, and any likely second stage stated in writing before you commit.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 03</p><p class="h4 mt-2" style="color:#fff">Procedure day</p><p class="body-s mt-2">Extraction, sorting under magnification, then radial site-making around the whorl and placement. Day case under local anaesthetic.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 04</p><p class="h4 mt-2" style="color:#fff">Growth and review</p><p class="body-s mt-2">Shedding, regrowth from around three to four months, photographic review to roughly twelve months, with medical treatment continuing.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="recovery">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Recovery and timeline</p>
        <h2 class="h2 mt-2">What to Expect Afterwards</h2>
        <p class="body-l mt-3 measure">Small crusts form around each graft and are visible for several days. The crown has one practical advantage over frontal work here: it is harder to see from the front, so the visible healing phase is less exposed for most people.</p>
        <p class="body-l mt-3 measure">The transplanted hairs usually shed within the first few weeks while the follicles stay in place. Growth generally starts around three to four months and fills in through to roughly ten to twelve months.</p>
        <p class="body-l mt-3 measure">Crowns often look sparser for longer than the front, because the same number of new hairs is spread across more area. That is not a sign of failure and it is worth being ready for.</p>
        <p class="body mt-3 measure">Detailed guidance is in our <a href="/hair-transplant-aftercare">recovery and aftercare guide</a>, and you get your own instructions in writing.</p>
      </div>
      <div>
        <div class="card card--pad-lg">
          <p class="h4">Plan for</p>
          <?= ticks([
              'Crusting across the crown for several days',
              'Shedding of the new hair within weeks',
              'Slower-looking fill than the front',
              'No verdict before ten to twelve months',
          ], false) ?>
        </div>
        <div class="card card--pad-lg mt-4">
          <p class="h4">Protect the result</p>
          <?= ticks([
              'Keep the crown out of direct sun',
              'No caps or helmets until cleared',
              'Sleep as instructed in the first nights',
              'Continue medical treatment as prescribed',
          ], false) ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Why the crown is where over-treatment does the most damage: it is the easiest region to sell a very large graft number for, because the area genuinely is large and the patient can see it is thin. The problem is that those grafts come out of a donor supply that has to cover the front for the next thirty years. Mapping the area, staging honestly, and sometimes recommending medical treatment instead is not caution for its own sake — it is what stops a good twelve-month photograph turning into a bad decade.'
) ?>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">Crown Hair Transplant Cost in Gurgaon</h2>
        <p class="body mt-3 measure">Crown cost tracks the graft number, and the graft number tracks the mapped area and your donor supply. Because the crown consumes grafts faster than the front, this is the region where an inflated count costs the most — in money and in donor hair.</p>
        <div class="grid grid--2 mt-5">
          <div class="card"><p class="h4">Size of the bald area</p><p class="body-s mt-2">Measured, not eyeballed from a photo</p></div>
          <div class="card"><p class="h4">Density being aimed for</p><p class="body-s mt-2">Coverage versus photographic fullness</p></div>
          <div class="card"><p class="h4">Donor density</p><p class="body-s mt-2">What can safely be taken, and what is reserved</p></div>
          <div class="card"><p class="h4">One session or staged</p><p class="body-s mt-2">Crown cases are staged more often than frontal ones</p></div>
          <div class="card"><p class="h4">Hair characteristics</p><p class="body-s mt-2">Calibre, curl and colour contrast all affect coverage</p></div>
          <div class="card"><p class="h4">Supporting treatment</p><p class="body-s mt-2">Medical therapy or pigment running alongside</p></div>
        </div>
        <p class="body-s mt-4 measure">If a quote for your crown is much larger than you expected, ask how the area was measured and what is being left in the donor for the front. Those two answers tell you most of what you need to know.</p>
        <p class="body mt-3 measure">See the full <a href="/hair-transplant-cost-in-gurgaon">hair transplant cost breakdown</a> and <a href="/cost-and-emi-options">payment and EMI options</a>.</p>
      </div>
      <div class="card card--ink card--pad-lg">
        <h3 class="h3">Get a Personalized Treatment Estimate</h3>
        <p class="body mt-3">Send a photo taken from directly above the crown in good light, plus one from the front and one of the donor area, on WhatsApp. You will get an assessment appointment, not a sales pitch.</p>
        <a class="btn btn--block btn--accent mt-5" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Send photos on WhatsApp</a>
        <a class="btn btn--block btn--ghost mt-3" href="/book-consultation" data-track="book">Request an estimate by form</a>
        <p class="body-s mt-4">Your details are used only to arrange your consultation.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Crown Hair Transplant FAQs</h2>
        <p class="body-s mt-3">Answers are general patient education. What your own crown needs, and whether it should be treated first, is answered at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= before_after_slider_section() ?>

<?= awards_certificates_section() ?>

<?= local_block(
    'Crown Restoration at Our Gurgaon Clinic',
    'Assessment, mapping, surgery and every follow-up happen at our Sector 39 clinic in Gurugram, with the same doctor throughout. Patients travel to us from across Gurugram and neighbouring parts of South Delhi.'
) ?>

<?= cta_band(
    'Find Out What Your Crown Actually Needs',
    'Come in and have the area measured rather than estimated. You will get an honest view of whether the crown should be treated now or after the front, what your donor can support, and a written plan that says clearly whether a second stage is likely.',
    'crown-hair-transplant',
    ['Crown hair transplant', 'Crown and hairline together', 'Crown — thinning rather than bald', 'Not sure — please advise']
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
