<?php
/**
 * /hairline-transplant-in-gurgaon
 *
 * Surgical spoke off /hair-transplant-in-gurgaon. This page owns hairline
 * DESIGN, which is the decision that dates a transplant for life and is the
 * one thing a patient cannot undo by paying more later.
 *
 * Cannibalisation split: FUE and DHI own technique. This page deliberately
 * says almost nothing about extraction method and everything about placement,
 * position and age — the frontier line, temporal recession, the irregular
 * single-hair transition zone, and why a low straight line is the classic
 * regret. The existing blog post on natural hairline design is the deeper
 * educational read; this is the commercial page and links to it.
 *
 * Nothing quantified that the clinic cannot evidence: no "degrees of angle"
 * numbers, no density figures, no rule-of-thirds arithmetic presented as if it
 * decided the outcome.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'What is a hairline transplant?',
     'a' => 'A procedure that restores the front hairline and the temples using your own follicles, taken from the donor area at the back and sides of the scalp. The extraction is the same as any other transplant. What makes it a hairline case is the design — where the line sits, what shape it takes, and how softly it begins.'],
    ['q' => 'How is the hairline position decided?',
     'a' => 'From your facial proportions, your age, your pattern of loss and how that pattern is likely to progress — then drawn on and agreed with you in a mirror before consent. It is a judgement made on your head, not a formula applied from a diagram, and it is the single most consequential decision in the whole procedure.'],
    ['q' => 'Can I have the hairline I had at eighteen?',
     'a' => 'Almost always no, and any clinic that agrees without hesitation should worry you. A hairline placed at an adolescent position looks unremarkable at twenty-five and conspicuous at forty-five, when the hair behind it has thinned and the line has not moved. It also spends donor hair on the least defensible part of the scalp. We will show you where a mature hairline sits and explain why.'],
    ['q' => 'Why does a straight hairline look artificial?',
     'a' => 'Because no natural hairline is straight. A real one is irregular, slightly broken, and has a soft transition rather than a hard edge. A ruler-straight line reads as constructed even to people who could not say why. The irregularity is designed in deliberately.'],
    ['q' => 'What is the transition zone?',
     'a' => 'The first few millimetres of the hairline, built entirely from single-hair grafts placed irregularly so the line begins softly rather than starting abruptly at full density. Behind it, grafts with more hairs each build up the density. Skipping this zone, or putting multi-hair grafts at the very front, produces the tufted look people recognise as a transplant.'],
    ['q' => 'Will a hairline transplant fix my receding temples?',
     'a' => 'Temporal recession is usually part of the same design and often matters more to how a face reads than the central line does. Rebuilding temples needs care: the hair there is fine, lies at a steep backward angle, and looks wrong if it is treated like frontal hair.'],
    ['q' => 'How many grafts does a hairline need?',
     'a' => 'It follows the drawn design and the area being covered, and it is counted from the mapped plan rather than quoted from a photograph. A frontal hairline restoration needs far fewer than a case that also rebuilds temples and the area behind the line.'],
    ['q' => 'I am in my twenties. Should I have this done now?',
     'a' => 'Often the honest answer is not yet. Early loss that is still actively progressing is usually treated medically first, because a hairline placed while the hair behind it is still receding leaves an island of transplanted hair with a gap opening up behind it. Stabilising the loss first is what protects the long-term result.'],
    ['q' => 'Is the hairline permanent?',
     'a' => 'The transplanted follicles keep donor characteristics and generally persist. The native hair behind them can carry on thinning with age, which is why the design has to anticipate future loss and why medical treatment usually continues alongside. No clinic can guarantee a specific density or a permanent outcome.'],
    ['q' => 'Will anyone be able to tell?',
     'a' => 'That is what the design is for. Angle, direction, irregularity and restraint at the front are what decide it — far more than the technique used or the number of grafts. Work that is noticed is usually noticed because the line was placed too low, too straight, or too densely at the very edge.'],
    ['q' => 'How long before the hairline looks right?',
     'a' => 'Transplanted hairs commonly shed in the first weeks. New growth generally starts around three to four months, and the hairline usually looks like itself at roughly ten to twelve months. Early growth is uneven and thin, which is normal.'],
    ['q' => 'Can a badly placed hairline from another clinic be corrected?',
     'a' => 'Sometimes, and it is one of the more common reasons people come to us. Options depend on what was done — softening a hard edge, adding single hairs at the front, and occasionally removing misplaced grafts. It is more constrained and more expensive than getting it right the first time. See our page on <a href="/hair-transplant-repair-in-gurgaon">hair transplant repair</a>.'],
    ['q' => 'FUE or DHI for a hairline?',
     'a' => 'Both are used, and the choice matters less than the design. <a href="/dhi-hair-transplant-in-gurgaon">DHI</a> places each graft with an implanter in one action, which suits fine control at the front. <a href="/fue-hair-transplant-in-gurgaon">FUE</a> into pre-made sites is efficient across larger areas. A well-designed hairline can be built either way; a badly designed one fails with both.'],
    ['q' => 'How much does a hairline transplant cost in Gurgaon?',
     'a' => 'It follows the graft number from your mapped design, so we quote after assessment rather than publishing a headline price. Our <a href="/hair-transplant-cost-in-gurgaon">hair transplant cost guide</a> explains what moves the number, and you get an itemised written estimate before booking a date.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair transplant', 'url' => '/hair-transplant-in-gurgaon'],
    ['name' => 'Hairline transplant in Gurgaon'],
];

$page = [
    'title'       => 'Hairline Transplant in Gurgaon | DenceSpot Clinic',
    'description' => 'Hairline transplant in Gurgaon designed for the face you will have at fifty, not eighteen. Line drawn and agreed with you in a mirror before any graft is taken.',
    'url'         => '/hairline-transplant-in-gurgaon',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/hairline-transplant-in-gurgaon', [
            'name'          => 'Hairline Transplant',
            'alternateName' => ['Hairline restoration', 'Frontal hairline hair transplant', 'Hairline lowering by grafting'],
            'procedureType' => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'  => 'Frontal scalp and temporal region',
            'howPerformed'  => 'A hairline position and shape are designed and agreed with the patient before surgery. Follicular units are extracted from the donor area of the scalp and sorted under magnification. Single-hair grafts are placed irregularly across a transition zone at the leading edge, with multi-hair grafts placed behind them to build density, each at the acute angle and forward direction of natural frontal hair. Performed as a day case under local anaesthetic.',
            'preparation'   => 'Clinical assessment of hair-loss pattern and likely progression, donor density measurement, review of medication, photographic mapping, and a hairline drawn on the patient and agreed in a mirror before consent.',
            'followup'      => 'Wash instruction and review in the first week, then scheduled photographic reviews as the transplanted hair sheds and regrows, alongside any ongoing medical treatment for the native hair behind the line.',
            'expectedPrognosis' => 'Transplanted hairs commonly shed within the first weeks; new growth typically begins around three to four months with a settled hairline at approximately ten to twelve months. Native hair behind the transplanted line may continue to thin with age. Outcomes vary between patients and are not guaranteed.',
        ]),
        schema_faq('/hairline-transplant-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Hairline transplant in Gurgaon</span>
        <h1 class="h1 mt-3">A Hairline Designed for the Face You Will Have at Fifty</h1>
        <p class="lead mt-3 measure">Every other decision in a hair transplant can be revisited. The hairline cannot. Put it in the wrong place and you carry that line for the rest of your life, through every stage of loss that follows. This page is about how the line is decided, and why we will sometimes tell you no.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Line drawn on you and agreed in a mirror',
            'Single-hair transition zone at the leading edge',
            'Designed around future loss, not just today',
            NAP_LOCALITY . ' · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow"><img src="/assets/img/clinic-equipment.jpg" alt="Hairline design and mapping instruments at DenceSpot Clinic, Gurugram" width="800" height="1000" loading="eager"></div>
        <div class="hero__badge-card">
          <p class="eyebrow">Designed &amp; performed by</p>
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
      <div class="card"><?= icon('pencil', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Drawn before consent</p><p class="body-s mt-2">You see the line on your own face and approve it.</p></div>
      <div class="card"><?= icon('hairline', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Irregular by design</p><p class="body-s mt-2">No straight edges. Natural hairlines are broken.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Age-appropriate position</p><p class="body-s mt-2">A mature line, not an adolescent one.</p></div>
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Planned for progression</p><p class="body-s mt-2">Designed around the loss still to come.</p></div>
      <div class="card"><?= icon('info', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Told if it is too early</p><p class="body-s mt-2">Unstable loss is treated medically first.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="what-is">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">The basics, plainly</p>
        <h2 class="h2 mt-2">What a Hairline Transplant Actually Involves</h2>
        <p class="body-l mt-3 measure">Mechanically, it is the same operation as any other transplant. Follicular units are taken from the permanent donor zone at the back and sides of the scalp, sorted under magnification, and placed into sites made across the frontal area. Whether that is done as <a href="/fue-hair-transplant-in-gurgaon">FUE</a> or <a href="/dhi-hair-transplant-in-gurgaon">DHI</a> is a secondary question.</p>
        <p class="body-l mt-3 measure">What separates a hairline case from the rest of the scalp is that it is looked at. Nobody examines your crown at conversational distance. Everybody sees your hairline, in daylight, from a metre away, for the rest of your life. That is why the design carries almost all of the risk and almost all of the reward.</p>
        <p class="body-l mt-3 measure">The frontal hair also behaves differently. It grows at a sharp forward angle, close to the skin, fanning slightly. Grafts placed at the wrong angle stick up and refuse to sit with the rest of the hair no matter how it is styled. Angle is set site by site as the sites are made, and it cannot be corrected afterwards.</p>
        <p class="body-l mt-3 measure">If you want the deeper explanation of how a natural line is constructed, our article on <a href="/blog/natural-hairline-design-explained">natural hairline design</a> goes through it properly.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow">The one irreversible decision</p>
        <h3 class="h3 mt-2">Why we labour this point</h3>
        <p class="body mt-3">Graft numbers can be added to in a second session. Density can be built up later. Medical treatment can be started at any time.</p>
        <p class="body mt-3">A hairline that was placed two centimetres too low cannot be raised. The grafts are living hair in permanent positions, and the only remedies are slow, partial and expensive.</p>
        <p class="body mt-3">So the line gets more consultation time than anything else, and it is drawn on your forehead and looked at in a mirror before you sign anything.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="design">
  <div class="wrap">
    <p class="eyebrow">Design</p>
    <h2 class="h2 mt-2">The Four Decisions Behind Every Hairline</h2>
    <p class="body-l mt-3 measure">A hairline is not one line. It is a set of judgements that have to agree with each other and with your face.</p>
    <div class="grid grid--2 mt-5">
      <div class="card card--pad-lg">
        <p class="eyebrow">Decision 01</p>
        <p class="h4 mt-2">Where the line sits</p>
        <p class="body-s mt-2">Height on the forehead, judged against your facial proportions and your age. This is the decision people most want to push and the one we push back on hardest. A line that flatters at twenty-eight can look conspicuous at forty-eight, when everything behind it has thinned.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow">Decision 02</p>
        <p class="h4 mt-2">What shape it takes</p>
        <p class="body-s mt-2">Straight across, gently rounded, or with the temporal recession most adult men keep. Shape has to suit the face and the pattern of loss. Erasing natural temporal recession entirely is a common way to make a face look wrong without anyone identifying why.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow">Decision 03</p>
        <p class="h4 mt-2">How softly it begins</p>
        <p class="body-s mt-2">The leading edge is built from single hairs, placed irregularly, with sentinel hairs scattered slightly ahead of the line. Behind that, grafts with more hairs build density. This transition is the difference between a hairline and a hedge.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow">Decision 04</p>
        <p class="h4 mt-2">Angle and direction</p>
        <p class="body-s mt-2">Frontal hair runs forward at an acute angle, and direction shifts across the temples where it sweeps backwards. Angle is fixed when the site is made. There is no styling fix for grafts placed at the wrong angle.</p>
      </div>
    </div>

    <div class="card card--pad-lg mt-6">
      <p class="eyebrow">The classic regret</p>
      <h3 class="h3 mt-2">A low, straight, densely packed line</h3>
      <p class="body mt-3 measure">It is what people ask for and what a clinic competing on volume will happily deliver. It looks impressive in a photograph taken at twelve months. It ages badly, spends donor hair on the least defensible part of the scalp, and leaves nothing in reserve for the crown when the loss reaches it. Every element of it is permanent.</p>
      <p class="body mt-3 measure">We would rather have the awkward conversation at consultation than build something you resent in fifteen years.</p>
    </div>
  </div>
</section>

<section class="section section--canvas" id="candidacy">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Suitability</p>
        <h2 class="h2 mt-2">When a Hairline Transplant Makes Sense</h2>
        <p class="body-l mt-3 measure">The best candidate has a pattern of loss that has settled, a donor area that can support the plan with something left over, and expectations that match what surgery can actually deliver.</p>
        <p class="body-l mt-3 measure">Age matters, though not on its own. What matters is whether the loss is still moving. A hairline built while the hair behind it is still receding produces an island: a transplanted front row with a widening gap opening up behind it, and no good options left. Where loss is active, medical treatment comes first and surgery waits.</p>
        <p class="body-l mt-3 measure">Donor supply is the other constraint. The frontal hairline is expensive in grafts and the donor is finite. Spending it all at the front, then needing the crown covered a decade later, is a trade people make without realising they are making it.</p>
      </div>
      <div>
        <div class="card card--pad-lg">
          <p class="h4">Generally a good candidate</p>
          <?= ticks([
              'Loss that has been stable for some time',
              'Clear frontal recession with a healthy donor',
              'Realistic about a mature hairline position',
              'Willing to continue medical treatment',
          ], false) ?>
        </div>
        <div class="card card--pad-lg mt-4">
          <p class="h4">Reasons we will ask you to wait</p>
          <?= ticks([
              'Rapid loss that has not been stabilised',
              'Very early loss in the early twenties',
              'Limited donor with extensive loss expected',
              'A fixed demand for an adolescent hairline',
          ], false) ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--ink" id="journey">
  <div class="wrap">
    <p class="eyebrow" style="color:var(--accent)">The process</p>
    <h2 class="h2 mt-2" style="color:#fff">From First Consultation to a Settled Hairline</h2>
    <div class="grid grid--4 mt-6">
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 01</p><p class="h4 mt-2" style="color:#fff">Assessment</p><p class="body-s mt-2">Pattern staged, donor density measured, family history and progression considered, medication reviewed. Whether now is the right time is settled here.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 02</p><p class="h4 mt-2" style="color:#fff">The line is drawn</p><p class="body-s mt-2">Marked on your forehead, reviewed in a mirror, argued about if necessary, adjusted and agreed. The graft count follows from the agreed design.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 03</p><p class="h4 mt-2" style="color:#fff">Procedure day</p><p class="body-s mt-2">Extraction, sorting under magnification, then placement — single hairs across the transition zone, denser grafts behind. Day case, local anaesthetic.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 04</p><p class="h4 mt-2" style="color:#fff">Growth and review</p><p class="body-s mt-2">Shedding, regrowth from around three to four months, photographic reviews to roughly twelve months, with medical treatment continuing for the native hair.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="recovery">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Recovery and timeline</p>
        <h2 class="h2 mt-2">What Happens After a Hairline Procedure</h2>
        <p class="body-l mt-3 measure">Small crusts form around each graft along the new line and are visible for several days. Forehead swelling is common in the first few days after frontal work and settles on its own. The line is conspicuous during this period, which is worth planning around.</p>
        <p class="body-l mt-3 measure">Then the transplanted hairs shed, usually within the first few weeks, and the hairline you could see disappears. The follicles remain. This phase is the one people find hardest, and it is entirely expected.</p>
        <p class="body-l mt-3 measure">Regrowth generally begins around three to four months and comes through fine and uneven before it thickens. A hairline usually looks like itself at roughly ten to twelve months. Judging the edge at six months is judging it half-built.</p>
        <p class="body mt-3 measure">Full instructions are in our <a href="/hair-transplant-aftercare">recovery and aftercare guide</a>, and you are given your own in writing.</p>
      </div>
      <div>
        <div class="card card--pad-lg">
          <p class="h4">Plan for</p>
          <?= ticks([
              'Visible crusting along the line for days',
              'Forehead swelling in the first few days',
              'Shedding of the new hair within weeks',
              'No real verdict before ten to twelve months',
          ], false) ?>
        </div>
        <div class="card card--pad-lg mt-4">
          <p class="h4">Protect the result</p>
          <?= ticks([
              'Follow the washing instructions exactly',
              'Keep the new line out of direct sun',
              'No caps or helmets until cleared',
              'Continue medical treatment as prescribed',
          ], false) ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Why the hairline is the part of this job worth being stubborn about: the technique is teachable and the extraction is routine. Judging where a line belongs on a particular face, at a particular age, with a particular pattern of loss still to come, is not. It is also the only part of the procedure a patient cannot buy their way out of later, which is why the line is drawn, discussed and agreed before consent rather than decided on the table.'
) ?>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">Hairline Transplant Cost in Gurgaon</h2>
        <p class="body mt-3 measure">The price follows the graft number, and the graft number follows the agreed design. Since the design is made on your head, a figure quoted before assessment is a guess. We publish the factors and give you an itemised estimate in writing.</p>
        <div class="grid grid--2 mt-5">
          <div class="card"><p class="h4">Area being restored</p><p class="body-s mt-2">Frontal line alone, or line plus temples</p></div>
          <div class="card"><p class="h4">Depth behind the line</p><p class="body-s mt-2">How far back density is being built</p></div>
          <div class="card"><p class="h4">Donor density</p><p class="body-s mt-2">What can be taken without compromising the donor</p></div>
          <div class="card"><p class="h4">Technique</p><p class="body-s mt-2">Placement method chosen for the case</p></div>
          <div class="card"><p class="h4">Session structure</p><p class="body-s mt-2">One session, or staged with the crown later</p></div>
          <div class="card"><p class="h4">Supporting treatment</p><p class="body-s mt-2">Medical therapy for the native hair behind the line</p></div>
        </div>
        <p class="body-s mt-4 measure">Be careful with quotes that get cheaper as the graft number rises. A hairline needs the right number of grafts placed well, not the largest number a donor can be pushed to give.</p>
        <p class="body mt-3 measure">See the full <a href="/hair-transplant-cost-in-gurgaon">hair transplant cost breakdown</a> and <a href="/cost-and-emi-options">payment and EMI options</a>.</p>
      </div>
      <div class="card card--ink card--pad-lg">
        <h3 class="h3">Get a Personalized Treatment Estimate</h3>
        <p class="body mt-3">Send photos of your hairline from the front, from above and from each side on WhatsApp, or request a call back. You will get an assessment appointment, not a sales pitch.</p>
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
        <h2 class="h2 mt-2">Hairline Transplant FAQs</h2>
        <p class="body-s mt-3">Answers are general patient education. Where your own hairline should sit is answered at the assessment, on your face, in a mirror.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= before_after_slider_section() ?>

<?= awards_certificates_section() ?>

<?= local_block(
    'Hairline Design and Surgery at Our Gurgaon Clinic',
    'The consultation, the design, the procedure and every follow-up happen at our Sector 39 clinic in Gurugram, with the same doctor throughout. Patients travel to us from across Gurugram and neighbouring parts of South Delhi.'
) ?>

<?= cta_band(
    'See Your Hairline Drawn Before You Commit to It',
    'Come in and have the line marked on your own forehead. You will get an honest view of where it belongs at your age and pattern of loss, what your donor can support, and a written plan — with no pressure to book a date on the day.',
    'hairline-transplant',
    ['Hairline transplant', 'Hairline plus temples', 'Correcting an earlier hairline', 'Not sure — please advise']
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
