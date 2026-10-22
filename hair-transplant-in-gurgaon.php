<?php
/**
 * /hair-transplant-in-gurgaon — page #16, the primary money hub.
 *
 * Ported from the design build (hair-transplant-in-gurgaon.html), which was
 * desktop-only and carried no structured data. Copy is unchanged where it was
 * already right; the layout is now mobile-first and the page carries a full
 * schema graph.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';
require_once __DIR__ . '/includes/gallery-manifest.php';

/**
 * The second results slot is drawn from the manifest rather than hard-coded, so
 * withholding a file there removes it from this page too. A literal path here
 * was a fail-open hole in exactly the guarantee the manifest exists to make.
 */
$secondCase = gallery_images(CAT_RESULT)[1] ?? null;

$faqs = [
    ['q' => 'What is a hair transplant?',
     'a' => 'A procedure that moves your own follicles from a donor area — usually the back and sides of the scalp — into thinning or bald areas, at the angle and direction the surrounding hair grows. It redistributes existing hair rather than creating new hair.'],
    ['q' => 'Who is a good candidate?',
     'a' => 'Typically someone with a stable, defined pattern of loss, adequate donor density and realistic expectations. Active or rapidly progressing loss, certain scalp conditions and some medical histories mean medical treatment comes first, or that surgery is deferred. Candidacy is decided after examination.'],
    ['q' => 'Is a hair transplant painful?',
     'a' => 'The local anaesthetic injections are the uncomfortable part; the procedure itself is not typically painful. Mild soreness, tightness or swelling for a few days afterwards is normal and managed with prescribed medication. Pain tolerance varies between patients.'],
    ['q' => 'How long does the procedure take?',
     'a' => 'It scales with graft numbers. Smaller sessions take a few hours; larger ones run through most of the day with breaks. It is a day-case procedure — you go home the same day.'],
    ['q' => 'How long does recovery take?',
     'a' => 'Most people return to desk work within a few days, following instructions on washing, sun exposure, sleeping position and exercise. Crusting settles over the first week or two; strenuous activity is restricted for longer.'],
    ['q' => 'When does transplanted hair start growing?',
     'a' => 'Transplanted hairs commonly shed within the first weeks while the follicles remain in place. New growth usually begins around three to four months, with a fuller picture at roughly ten to twelve months. Growth is uneven early on.'],
    ['q' => 'Is a hair transplant permanent?',
     'a' => 'Transplanted follicles keep the characteristics of the donor area and generally persist. However, surrounding non-transplanted hair can continue to thin with age, which is why a long-term plan and ongoing medical treatment matter. No clinic can guarantee a specific density or a permanent outcome.'],
    ['q' => 'How many grafts might I need?',
     'a' => 'It depends on the area to be covered, the density being aimed for and what the donor area can safely give — mapped zone by zone at the assessment. Any figure offered before an examination is a guess, not a plan. See our <a href="/hair-transplant-cost-in-gurgaon">graft and cost guidance</a>.'],
    ['q' => 'What is the difference between FUE and DHI?',
     'a' => 'Extraction is essentially the same. The difference is placement: in DHI each graft is set with a fine implanter in a single action, giving close control of depth and angle — useful in hairlines and detail zones. FUE placement into pre-made sites is efficient over larger areas. Neither is universally better. Compare them in detail on the <a href="/fue-hair-transplant-in-gurgaon">FUE</a> and <a href="/dhi-hair-transplant-in-gurgaon">DHI</a> pages.'],
    ['q' => 'How much does a hair transplant cost in Gurgaon?',
     'a' => 'Cost depends on graft numbers, technique, complexity and any supporting treatment, so we quote after the assessment rather than publishing a headline price. You receive an itemised written estimate before booking a date. Full breakdown on our <a href="/hair-transplant-cost-in-gurgaon">cost page</a>.'],
    ['q' => 'Can women undergo hair transplantation?',
     'a' => 'Sometimes. Female hair loss is more often diffuse, and hormonal, thyroid, iron or post-partum causes need investigating and treating first. Many women do better with medical treatment; surgery is considered selectively, for suitable patterns such as a receding frontal line. See <a href="/hair-fall-treatment-in-gurgaon">hair transplant for women</a>.'],
    ['q' => 'Can beard hair be transplanted?',
     'a' => 'Beard areas can be restored using scalp grafts placed at the correct angle and density for the face — see <a href="/beard-transplant-gurgaon">beard transplant in Gurgaon</a>. The reverse, using beard hair as a donor source for the scalp, is considered only in selected cases and is assessed individually.'],
    ['q' => 'What happens during the consultation?',
     'a' => 'History and medication review, scalp and donor examination, pattern staging, photographs for your record, and a written plan covering technique, approximate graft number, timeline and cost factors. Bring your medical history and a list of current medicines.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair transplant in Gurgaon'],
];

$page = [
    'title'       => 'Hair Transplant in Gurgaon | DenceSpot Clinic',
    'description' => 'Doctor-led hair transplant in Gurgaon. FUE and DHI planned around your donor area and hairline, with written estimates and scheduled follow-up.',
    'url'         => '/hair-transplant-in-gurgaon',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/hair-transplant-in-gurgaon', [
            'name'          => 'Hair Transplant',
            'alternateName' => ['FUE hair transplant', 'DHI hair transplant', 'Hair restoration surgery'],
            'procedureType' => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'Follicular units are harvested from the occipital and temporal donor scalp and placed into thinning or bald recipient areas at the angle and direction of the surrounding hair. Performed as a day case under local anaesthetic by FUE, DHI or FUT according to the assessment.',
            'preparation'   => 'Clinical assessment of hair loss pattern and donor density, review of medical history and medication, hairline designed and agreed with the patient before surgery.',
            'followup'      => 'Written aftercare instructions covering washing, sun exposure, sleeping position and activity, with photographic progress reviews through the first twelve months.',
            'expectedPrognosis' => 'Transplanted hairs commonly shed within the first weeks; new growth typically begins around three to four months with a fuller result at approximately ten to twelve months. Outcomes vary between patients and are not guaranteed.',
        ]),
        schema_faq('/hair-transplant-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Hair transplant in Gurgaon</span>
        <h1 class="h1 mt-3">Hair Transplant in Gurgaon for Natural-Looking Hair Restoration</h1>
        <p class="lead mt-3 measure">Every case starts with a clinical assessment of your hair loss and donor area. From there the hairline is planned on your own face, the technique is chosen to fit your scalp — not the other way round — and the doctor who plans your case is the doctor who performs it. Aftercare and follow-up reviews are part of the plan, not an afterthought.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Doctor-led consultation and planning',
            'Donor area assessed before any plan',
            'FUE and DHI performed at the clinic',
            NAP_LOCALITY . ' · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow"><img src="/assets/img/case-shukri-europe.jpg" alt="Micro-FUE hair transplant at DenceSpot Clinic, Gurugram — hairline design and 2,800 grafts photographed on the day of surgery" width="800" height="1000" loading="eager"></div>
        <div class="hero__badge-card">
          <p class="eyebrow">Performed &amp; reviewed by</p>
          <p class="h4 mt-1"><?= doctor_name() ?></p>
          <p class="meta"><?= doctor_credit() ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="trust">
  <div class="wrap">
    <?php
    /**
     * The figures, before the adjectives.
     *
     * Every tile is either a fact this page already states in prose or a
     * clinic-supplied figure that renders only once it exists — see
     * clinic_stat_strip() and the STAT_* constants. There is deliberately no
     * patient count and no success rate here today, because neither is
     * evidenced; both appear by themselves the moment they are.
     */
    ?>
    <?= clinic_stat_strip() ?>

    <div class="grid grid--5 mt-6">
      <div class="card"><?= icon('shield', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Doctor-led consultation</p><p class="meta mt-1">Assessed and planned by the treating doctor.</p></div>
      <div class="card"><?= icon('list', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Personalized plan</p><p class="meta mt-1">Graft count and technique follow your scalp.</p></div>
      <div class="card"><?= icon('hairline', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Natural hairline planning</p><p class="meta mt-1">Drawn to your face proportions and age.</p></div>
      <div class="card"><?= icon('settings', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Technique to suit you</p><p class="meta mt-1">FUE, DHI or FUT — chosen, not defaulted.</p></div>
      <div class="card"><?= icon('chat', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Written plan &amp; follow-ups</p><p class="meta mt-1">Itemised estimate, reviews already scheduled.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="what-is">
  <div class="wrap">
    <div class="split split--wide-left">
      <div>
        <p class="eyebrow">The basics, plainly</p>
        <h2 class="h2 mt-2">What Is a Hair Transplant?</h2>
        <div class="stack mt-4 measure">
          <p class="body-l">A hair transplant moves hair you already have into the areas where it has thinned. Follicles are taken from the back and sides of the scalp — the donor area — because that hair is generally resistant to the hormonal process behind pattern hair loss.</p>
          <p class="body-l">Those follicles are separated under magnification and placed individually into the thinning or bald zones, at the angle and direction the surrounding hair already grows. Once healed, they behave like the donor hair they came from: they are washed, cut and styled normally.</p>
          <p class="body-l">Two things decide whether the result looks natural. The first is hairline design — position, shape and irregularity, judged against your face and your age rather than a template. The second is honest arithmetic: the donor area is a finite supply, so coverage has to be prioritised over your lifetime, not spent in one session.</p>
          <p class="body-l">That is why nothing is quoted before an examination. Two people with the same photograph can need very different plans.</p>
        </div>
        <div class="btn-row mt-4">
          <a class="btn btn--outline btn--sm" href="/hair-transplant-cost-in-gurgaon">Cost &amp; graft guidance</a>
          <a class="btn btn--outline btn--sm" href="#faqs">Read the FAQs</a>
        </div>
      </div>
      <div class="stack">
        <div class="media ratio-4-3 media--shadow"><img src="/assets/img/clinic-equipment.jpg" alt="Motorised follicular-unit extraction handpiece and trolley unit at DenceSpot Clinic, Gurugram" width="800" height="600" loading="lazy"></div>
        <div class="card">
          <p class="eyebrow" style="color:var(--ink-muted)">In one line</p>
          <p class="body mt-2">It redistributes your own permanent hair. It does not create new hair — which is why donor supply, not marketing, sets the limit on what is achievable.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="candidacy">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">Suitability</p>
        <h2 class="h2 mt-2">Who May Consider a Hair Transplant?</h2>
        <p class="body mt-3">Suitability is decided after examination, not from a photograph. These are the patterns most often assessed at the clinic.</p>
        <a class="btn btn--ink mt-4" href="/book-consultation">Book an assessment</a>
      </div>
      <div class="grid grid--2">
        <div class="card"><?= icon('hairline', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Receding hairline</h3><p class="body-s mt-2">A temple recession that has settled into a defined shape, where rebuilding the frontal line restores the frame of the face. Covered in depth on our hairline restoration page.</p></div>
        <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Pattern hair loss</h3><p class="body-s mt-2">Male or female pattern loss that has stabilised, with donor density adequate for the area to be covered.</p></div>
        <div class="card"><?= icon('settings', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Crown thinning</h3><p class="body-s mt-2">Vertex thinning, where planning matters most — the crown consumes grafts quickly and can keep expanding with age. See crown restoration.</p></div>
        <div class="card"><?= icon('list', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Reduced hair density</h3><p class="body-s mt-2">Diffuse thinning where the pattern is stable and adding density between existing hairs is achievable without damaging them.</p></div>
        <div class="card"><?= icon('pencil', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Repair and revision</h3><p class="body-s mt-2">Correcting a previous procedure — a hairline placed too low or too straight, visible plugs, or a depleted donor area. See repair work.</p></div>
        <div class="card"><?= icon('beard', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Beard and eyebrow restoration</h3><p class="body-s mt-2">Facial restoration using scalp grafts placed at the flatter angle facial hair grows at. See <a href="/beard-transplant-gurgaon">beard transplant</a> and eyebrow transplant.</p></div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="techniques">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Techniques</p>
      <h2 class="h2 mt-2">Hair Transplant Techniques</h2>
      <p class="body mt-3">All three move your own follicles. They differ in how grafts are taken and placed — and the right answer depends on your scalp, your donor area and how much coverage is needed.</p>
    </div>

    <div class="grid grid--3 mt-6">
      <div class="card" style="padding:0;overflow:hidden">
        <div class="media ratio-16-10 media--shadow"><img src="/assets/img/case-uttam-gurgaon.jpg" alt="Before and after a hair transplant at DenceSpot Clinic, Sector 39 Gurugram — hairline and temple restoration, 2,400 grafts by FUE" width="800" height="500" loading="lazy"></div>
        <div style="padding:26px">
          <h3 class="h3">FUE Hair Transplant</h3>
          <p class="body-s mt-2">Follicular units are removed individually with a small punch, leaving dot-sized marks rather than a linear scar. Recipient sites are made first, then grafts placed into them — efficient across larger areas.</p>
          <a class="btn btn--outline btn--sm mt-3" href="/fue-hair-transplant-in-gurgaon">About FUE</a>
        </div>
      </div>
      <div class="card" style="padding:0;overflow:hidden">
        <div class="media ratio-16-10 media--shadow"><img src="/assets/img/case-shukri-europe.jpg" alt="Micro-FUE hair transplant at DenceSpot Clinic, Gurugram — hairline design and 2,800 grafts photographed on the day of surgery" width="800" height="500" loading="lazy"></div>
        <div style="padding:26px">
          <h3 class="h3">DHI Hair Transplant</h3>
          <p class="body-s mt-2">Extraction is the same; placement is not. Each graft is set with a fine implanter in one action, fixing depth and angle at the moment of placement — valuable in hairlines and detail zones.</p>
          <a class="btn btn--outline btn--sm mt-3" href="/dhi-hair-transplant-in-gurgaon">About DHI</a>
        </div>
      </div>
      <div class="card" style="padding:0;overflow:hidden">
        <div class="media ratio-16-10 media--shadow"><img src="/assets/img/dr-nayra.webp" alt="Dr. Nyra, MBBS, MD (Dermatology), hair restoration doctor at DenceSpot Clinic, Sector 39 Gurugram" width="800" height="500" loading="lazy"></div>
        <div style="padding:26px">
          <h3 class="h3">FUT Hair Transplant</h3>
          <p class="body-s mt-2">A strip of donor scalp is removed and dissected into grafts, leaving a fine linear scar. It can yield high graft numbers in one session and remains appropriate for selected cases.</p>
          <a class="btn btn--outline btn--sm mt-3" href="/fut-hair-transplant-in-gurgaon">About FUT</a>
        </div>
      </div>
    </div>

    <?php
    /**
     * Side by side. Every cell condenses a claim from the technique's own page
     * — nothing in the table is asserted here for the first time. See the
     * source list above technique_comparison_table() in components.php.
     */
    ?>
    <h3 class="h3 mt-6">FUE vs DHI vs FUT, Compared</h3>
    <?= technique_comparison_table() ?>

    <div class="note mt-5">
      <p class="body-s"><b>Neither FUE nor DHI is universally better.</b> A clinic that sells one technique as the answer for every scalp is selling equipment, not a plan. The table above compares them; it does not rank them, because the ranking only exists once someone has examined your donor area. The reasoning behind your recommendation is explained at the consultation and written into the estimate — compare them yourself in our <a href="/blog/fue-vs-dhi-hair-transplant">FUE vs DHI</a> and <a href="/blog/fue-vs-fut-hair-transplant">FUE vs FUT</a> guides.</p>
    </div>
  </div>
</section>

<section class="section section--ink" id="journey">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Step by step</p>
      <h2 class="h2 mt-2">Your Hair Transplant Journey</h2>
      <p class="body-l mt-3">From the first appointment to the review at a year. Every stage happens at the <?= e(NAP_LOCALITY) ?> clinic with the same doctor.</p>
    </div>
    <div class="journey mt-6">
      <div class="card card--ink"><span class="journey__num">01</span><p class="h4 mt-1" style="color:#fff">Consultation</p><p class="meta mt-2">What you want, and what is realistic.</p></div>
      <div class="card card--ink"><span class="journey__num">02</span><p class="h4 mt-1" style="color:#fff">Hair &amp; scalp assessment</p><p class="meta mt-2">Pattern staged; scalp condition checked.</p></div>
      <div class="card card--ink"><span class="journey__num">03</span><p class="h4 mt-1" style="color:#fff">Donor evaluation</p><p class="meta mt-2">What can safely be harvested, now and later.</p></div>
      <div class="card card--ink"><span class="journey__num">04</span><p class="h4 mt-1" style="color:#fff">Hairline &amp; graft planning</p><p class="meta mt-2">Drawn on your head; you approve it in a mirror.</p></div>
      <div class="card card--ink"><span class="journey__num">05</span><p class="h4 mt-1" style="color:#fff">Procedure</p><p class="meta mt-2">Day case under local anaesthetic.</p></div>
      <div class="card card--ink"><span class="journey__num">06</span><p class="h4 mt-1" style="color:#fff">Recovery &amp; aftercare</p><p class="meta mt-2">Written instructions; <a href="/hair-transplant-aftercare">aftercare guide</a>.</p></div>
      <div class="card card--ink"><span class="journey__num">07</span><p class="h4 mt-1" style="color:#fff">Progress reviews</p><p class="meta mt-2">Photographed at set intervals through the year.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="procedure">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">On the day</p>
      <h2 class="h2 mt-2">How Does a Hair Transplant Work?</h2>
      <p class="body mt-3">A hair transplant moves your own follicles from the permanent donor area at the back and sides of the scalp into the thinning or bald areas at the front and crown. It is a day-case procedure under local anaesthetic: the hairline is designed and agreed, the donor area is harvested follicular unit by follicular unit, recipient sites are made at the angle and direction the surrounding hair grows, and the grafts are placed into them. It redistributes the hair you already have rather than creating new hair, which is why donor supply sets the ceiling on what is possible.</p>
    </div>
    <div class="split split--wide-left mt-6" style="align-items:start">
      <div class="stack-sm">
        <div class="step"><span class="step-num">1</span><div><h3 class="h3">Consultation</h3><p class="body-s mt-2">History, medication review and examination of the scalp and donor area under magnification. Photographs are taken for your record.</p></div></div>
        <div class="step"><span class="step-num">2</span><div><h3 class="h3">Planning</h3><p class="body-s mt-2">The hairline is drawn on your head and checked with you sitting upright. Graft numbers are mapped zone by zone against what the donor can give.</p></div></div>
        <div class="step"><span class="step-num">3</span><div><h3 class="h3">Preparation</h3><p class="body-s mt-2">The donor area is trimmed and both donor and recipient zones are anaesthetised locally. The injections are the uncomfortable part; after that the area is numb.</p></div></div>
        <div class="step"><span class="step-num">4</span><div><h3 class="h3">Extraction</h3><p class="body-s mt-2">Follicular units are removed individually and sorted under magnification — singles reserved for the hairline, larger units for interior density.</p></div></div>
        <div class="step"><span class="step-num">5</span><div><h3 class="h3">Implantation</h3><p class="body-s mt-2">Grafts are placed at the angle and direction of the surrounding hair, in a deliberately irregular pattern. A ruled edge is what makes a transplant obvious.</p></div></div>
        <div class="step"><span class="step-num">6</span><div><h3 class="h3">Recovery</h3><p class="body-s mt-2">You go home the same day with written instructions, medication where prescribed, and your first review already booked.</p></div></div>
      </div>
      <div class="stack">
        <div class="media ratio-4-3 media--shadow"><img src="/assets/img/clinic-facade.jpg" alt="DenceSpot Clinic shopfront on Sector 39 Road, Jharsa, Gurugram, showing the hair transplant and PRP treatment signage" width="800" height="600" loading="lazy"></div>
        <div class="media ratio-4-3 media--shadow"><img src="/assets/img/clinic-equipment.jpg" alt="Motorised follicular-unit extraction handpiece and trolley unit at DenceSpot Clinic, Gurugram" width="800" height="600" loading="lazy"></div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="results">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">Results</p>
        <h2 class="h2 mt-2">Hair Transplant Results</h2>
        <p class="body mt-3">Photographs are published with written consent, and the hair in them is never digitally altered. They are the clinic's own composites, so they carry our watermark, our BEFORE and AFTER labels and, on some cases, a bar across the eyes for the patient's privacy — that framing is added, the result is not. Where a pair was shot at a matched angle and lighting we say so; where it was taken in ordinary clinic conditions, you are looking at exactly that, because a claim about the photography is as easy to check as the result itself. Outcomes vary between patients — these show what happened for these patients, not what will happen for you.</p>
        <a class="btn btn--ink mt-4" href="/hair-transplant-results-gurgaon">See the full gallery</a>
      </div>
      <div class="stack">
        <div class="card" style="padding:0;overflow:hidden">
          <?php /* Two different consented patients, one composite each. The same file used to
                   fill both slots, captioned "before and after" and "after 12 months" — which
                   was the identical picture printed twice. */ ?>
          <div class="grid grid--2" style="gap:0">
            <div class="media ratio-1-1 media--shadow"><img src="/assets/img/case-uttam-gurgaon.jpg" alt="Before and after a hair transplant at DenceSpot Clinic, Sector 39 Gurugram — hairline and temple restoration, 2,400 grafts by FUE" width="600" height="600" loading="lazy"></div>
            <?php if ($secondCase !== null): ?><div class="media ratio-1-1 media--shadow"><img src="<?= e($secondCase['url']) ?>" alt="<?= e($secondCase['alt']) ?>" width="<?= (int) $secondCase['w'] ?>" height="<?= (int) $secondCase['h'] ?>" loading="lazy"></div><?php endif; ?>
          </div>
          <div style="padding:24px">
            <h3 class="h3">Hairline restoration</h3>
            <p class="body-s mt-2">Two consented cases. Each photograph carries that patient's own before and after side by side.</p>
          </div>
        </div>
        <div class="grid grid--2">
          <div class="card" style="padding:0;overflow:hidden">
            <?php /* Frontal zone, not crown, and photographed on the operating day rather than
                     at a review — both were wrong in the previous caption. */ ?>
            <div class="media ratio-4-3 media--shadow"><img src="/assets/img/case-shukri-europe.jpg" alt="Micro-FUE hair transplant at DenceSpot Clinic, Gurugram — hairline design and 2,800 grafts photographed on the day of surgery" width="800" height="600" loading="lazy"></div>
            <div style="padding:20px"><h3 class="h4">Frontal zone, procedure day</h3><p class="meta mt-1">2,800 grafts, photographed before any growth.</p></div>
          </div>
          <div class="card" style="padding:0;overflow:hidden">
            <div class="media ratio-4-3 media--shadow"><img src="/assets/img/clinic-equipment.jpg" alt="Motorised follicular-unit extraction handpiece and trolley unit at DenceSpot Clinic, Gurugram" width="800" height="600" loading="lazy"></div>
            <div style="padding:20px"><h3 class="h4">Micro-FUE Equipment</h3><p class="meta mt-1">Doctor-led procedure console.</p></div>
          </div>
        </div>
        <div class="card card--dashed">
          <p class="h4">Why this gallery is not full yet</p>
          <p class="body-s mt-2">Only consented, unedited, same-conditions photographs go here. Stock images and borrowed results are a Google policy problem and a medical-advertising problem, and patients spot them anyway.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= doctor_block('Why the medical evaluation matters: hair loss can have reversible causes, some scalp conditions rule surgery out until treated, and donor supply is finite. Skipping the examination is how patients end up with a hairline that cannot be maintained ten years later.') ?>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">Hair Transplant Cost in Gurgaon</h2>

        <?php
        /**
         * The orientation figure, then the safeguard — in that order, because
         * a reader who has to scroll past three paragraphs to find any number
         * leaves for a clinic that printed one.
         *
         * cost_band_line() emits the rupee band and renders nothing until both
         * ends are set in config; it is empty today, because
         * /hair-transplant-cost-in-gurgaon publishes no rupee figure to source
         * it from. The graft band below is real and already published: it is
         * the Norwood table on that page, condensed to its outer bounds.
         *
         * ⚠ The safeguard paragraph that follows must stay immediately after
         * whichever of these renders. A range without it is a price list.
         */
        ?>
        <?= cost_band_line() ?>
        <p class="body mt-3 measure"><b>The number that moves the bill is graft count.</b> Across the Norwood stages, plans generally run from around 800 grafts for early temple recession to 4,500 or more for extensive loss, usually staged across sessions — the <a href="/hair-transplant-cost-in-gurgaon">full band-by-band breakdown is on the cost page</a>. Two people at the same stage can still need very different numbers, because donor density and hair calibre differ.</p>

        <p class="body mt-3 measure">There is no single price for a hair transplant, in Gurgaon or anywhere else. Cost follows the plan, and the plan follows the assessment. We publish the factors instead of a headline figure, and you receive an itemised estimate in writing with nothing added afterwards.</p>
        <div class="grid grid--2 mt-5">
          <div class="card"><p class="h4">Number of grafts</p><p class="meta mt-1">Counted from the mapped plan, not estimated</p></div>
          <div class="card"><p class="h4">Hair-loss stage</p><p class="meta mt-1">How much area needs coverage</p></div>
          <div class="card"><p class="h4">Donor density</p><p class="meta mt-1">What can safely be harvested</p></div>
          <div class="card"><p class="h4">Technique</p><p class="meta mt-1">FUE, DHI or FUT, or a combination</p></div>
          <div class="card"><p class="h4">Treatment complexity</p><p class="meta mt-1">Scarring, repair work, sessions needed</p></div>
          <div class="card"><p class="h4">Individual plan</p><p class="meta mt-1">Supporting medical therapy or PRP alongside</p></div>
        </div>
        <p class="meta mt-4 measure">A word of caution about “per graft, starting from” pricing: a low rate applied to an inflated graft count costs more than an honest quote. Ask any clinic how the graft number was arrived at.</p>
        <a class="btn btn--ink mt-4" href="/hair-transplant-cost-in-gurgaon"><?= icon('rupee', 18) ?> Full cost breakdown</a>
      </div>
      <div class="cta-band" style="display:block">
        <h3 class="h3" style="color:#fff">Get a Personalized Treatment Estimate</h3>
        <p class="body-s mt-2" style="color:rgba(255,255,255,.7)">Send photos of the front, crown and donor area on WhatsApp, or request a call back. You will get an assessment appointment — not a sales pitch.</p>
        <div class="stack-sm mt-4">
          <a class="btn btn--block btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Send photos on WhatsApp</a>
          <a class="btn btn--block btn--ghost" href="/book-consultation">Request an estimate by form</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="recovery">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Recovery &amp; results</p>
      <h2 class="h2 mt-2">What Generally Happens After Treatment</h2>
      <p class="body mt-3">A general guide to the phases most patients describe. Your own timeline is set by your doctor at your reviews — the full detail is in our <a href="/hair-transplant-aftercare">aftercare guide</a>.</p>
    </div>
    <div class="grid grid--5 mt-6">
      <div class="card"><span class="pill">Phase 1</span><h3 class="h4 mt-3">Initial recovery</h3><p class="body-s mt-2">Tenderness, mild swelling and small crusts in the treated areas. Washing starts as instructed, and desk work usually resumes within a few days.</p></div>
      <div class="card"><span class="pill">Phase 2</span><h3 class="h4 mt-3">Early shedding</h3><p class="body-s mt-2">Transplanted hairs commonly shed while the follicles stay in place. This is expected, not a failed procedure — it is the single most misunderstood phase.</p></div>
      <div class="card"><span class="pill">Phase 3</span><h3 class="h4 mt-3">New growth</h3><p class="body-s mt-2">Fine new hairs typically appear from around three to four months, unevenly at first. Texture improves as they mature.</p></div>
      <div class="card"><span class="pill">Phase 4</span><h3 class="h4 mt-3">Progressive density</h3><p class="body-s mt-2">Coverage continues to build through the middle months. Progress is documented photographically at each review.</p></div>
      <div class="card"><span class="pill pill--ink">Phase 5</span><h3 class="h4 mt-3">Longer-term result</h3><p class="body-s mt-2">A fuller picture around ten to twelve months. Non-transplanted hair can keep thinning, so medical treatment often continues alongside.</p></div>
    </div>
    <div class="note mt-4" style="display:flex;gap:16px;align-items:flex-start">
      <?= icon('info', 20, 'var(--accent-deep)', 1.8) ?>
      <p class="body-s">Individual recovery and hair-growth outcomes vary. Your doctor will provide personalized guidance based on your treatment, and timelines here are general patient education rather than a promise of results. Risks and side effects are set out on our risks page.</p>
    </div>
  </div>
</section>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Frequently Asked Questions</h2>
        <p class="body-s mt-3">Answers are general patient education. Anything specific to your case is answered at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= before_after_slider_section() ?>

<?php
/**
 * Returns '' — the accreditation is withheld until it can be evidenced. See
 * the note above awards_certificates_section() in components.php. Left in
 * place so the section reappears everywhere at once when it is.
 */
?>
<?= awards_certificates_section() ?>

<?php
/**
 * Live from the Google Business Profile, not typed in. A rating pasted into a
 * template is stale the next day, and — the reason that matters more — a
 * rating this site cannot evidence is precisely what /patient-reviews refuses
 * to print. It is NOT marked up: see the note in google_reviews_block().
 */
?>
<?= google_reviews_block() ?>

<?php
/**
 * Reads the BLOG_POSTS registry, newest first, narrowed to the hair-transplant
 * hub. Adding a post re-sorts this strip with no edit here.
 */
?>
<?= latest_posts_strip('hair-transplant', 3) ?>

<?= local_block(
    'Hair Transplant Clinic Serving Gurgaon',
    'Consultations and procedures both take place at our Sector 39 clinic in Gurugram, which keeps the whole journey — assessment, procedure day and every follow-up — with the same doctor and the same team. Patients travel to us from across Gurugram and neighbouring parts of South Delhi.'
) ?>

<?= cta_band(
    'Take the First Step Toward Hair Restoration',
    'Bring your questions and your concerns. You will get a clinical assessment, an honest view of whether a hair transplant is appropriate for you, and a written plan if it is — with no pressure to book a date on the day.',
    'hair-transplant-hub',
    ['Hair transplant (FUE)', 'Hair transplant (DHI)', 'Hair transplant (FUT)', 'Beard transplant', 'Not sure — please advise']
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
