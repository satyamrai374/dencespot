<?php
/**
 * /hair-transplant-in-gurgaon — page #16, the primary money hub (pillar).
 *
 * Ported from the design build (hair-transplant-in-gurgaon.html), which was
 * desktop-only and carried no structured data. Copy is unchanged where it was
 * already right; the layout is now mobile-first and the page carries a full
 * schema graph.
 *
 * Sep 2026 — rebuilt against the live SERP (competitor research, 13 Sep 2026:
 * Eugenix, DHI India, QHT, AK Clinics, Satya, Medlinks, Evolved, Cult). Every
 * page in the top ten is a claim page; this one is built as a decision page.
 * Added, each answering a gap no ranking page covers well:
 *   • an at-a-glance answer box (AI Overview and featured-snippet shape);
 *   • Norwood stage → plan → graft band, condensed from the cost page;
 *   • who performs each step (only QHT hints at this, without names);
 *   • when surgery is advised against;
 *   • dated market price context — never presented as this clinic's price;
 *   • Gurgaon-specific recovery (heat, dust, hard water, helmets);
 *   • "near Medanta, Sector 39" — a SERP currently owned only by directories;
 *   • questions to ask any clinic, and FAQs 13 → 23.
 * The cluster navigation (every spoke and supporting article) is appended by
 * footer.php from includes/clusters.php.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';
// $faqs below quotes MARKET_PRICES_AS_OF, which is otherwise only loaded by
// header.php — after $faqs has already been built.
require_once __DIR__ . '/includes/market-prices.php';

/*
 * Oct 2026: the results slots ($secondCase from the gallery manifest, and the
 * case photographs) are gone. The NMC Guidelines of 06.10.2026 bar displaying
 * before-and-after photographs and publishing cases for promotion
 * (cl. 8.1(v), 6.2). Do not reinstate them.
 */

/**
 * General patient-education bands. The graft figures are the cost page's
 * $bands table verbatim — change one, change both.
 */
$stages = [
    ['stage' => 'Norwood I',            'looks' => 'No meaningful recession',               'plan' => 'Not a surgical case. Monitor, and treat medically if thinning starts.',              'grafts' => '—'],
    ['stage' => 'Norwood II',           'looks' => 'Early recession at the temples',        'plan' => 'Often medical treatment first; a small hairline session once the pattern is stable.', 'grafts' => '800 – 1,500'],
    ['stage' => 'Norwood III',          'looks' => 'Defined recession, hairline rebuild',   'plan' => 'Hairline and temple restoration by FUE or DHI.',                                     'grafts' => '1,200 – 2,000'],
    ['stage' => 'Norwood III vertex–IV','looks' => 'Recession plus early crown thinning',   'plan' => 'Frontal zone first; the crown planned against what the donor can spare.',              'grafts' => '1,800 – 2,600'],
    ['stage' => 'Norwood V',            'looks' => 'Front, mid-scalp and crown',            'plan' => 'A larger FUE session with frontal priority, sometimes staged.',                        'grafts' => '2,500 – 3,500'],
    ['stage' => 'Norwood VI–VII',       'looks' => 'Extensive loss',                        'plan' => 'Staged sessions aimed at coverage, not full density.',                          'grafts' => '3,000 – 4,500+'],
];

/**
 * Who does what on the day.
 *
 * Oct 2026: every "Dr. Nyra" cell is replaced by the role. "Dr. Nyra performs
 * every case herself" cannot be evidenced now that the clinic has two doctors
 * and a second clinic (Rohini, Delhi), and naming her as the operator of every
 * step was promotional portrayal of one doctor (NMC Guidelines 06.10.2026,
 * cl. 8.3(ii)). The doctors themselves are listed by doctor_block().
 * ⚠ Clinic to confirm who performs extraction and placement at each clinic.
 */
$roles = [
    ['step' => 'Consultation and diagnosis',          'who' => 'Registered medical practitioner',           'why' => 'Reversible causes, and cases where surgery is the wrong answer, are caught here.'],
    ['step' => 'Hairline design',                     'who' => 'Registered medical practitioner, agreed with you upright in a mirror', 'why' => 'The line decides whether the result still looks right at fifty.'],
    ['step' => 'Graft plan and donor budget',         'who' => 'Registered medical practitioner',           'why' => 'Keeps donor hair in reserve for the loss that is still to come.'],
    ['step' => 'Extraction',                          'who' => 'Registered medical practitioner',           'why' => 'Transection and how even the donor looks afterwards are decided here.'],
    ['step' => 'Graft sorting and holding',           'who' => 'Clinic team, supervised by the operating doctor', 'why' => 'Single-hair grafts are set aside for the hairline; grafts are kept hydrated.'],
    ['step' => 'Recipient sites and implanter placement', 'who' => 'Registered medical practitioner',       'why' => 'Angle, direction and density — what makes hair look grown, not planted.'],
    ['step' => 'Aftercare and reviews to 12 months',  'who' => 'Registered medical practitioner',           'why' => 'Growth is judged against standardised photographs, not memory.'],
];

$faqs = [
    ['q' => 'What is a hair transplant?',
     'a' => 'A procedure that moves your own follicles from a donor area — usually the back and sides of the scalp — into thinning or bald areas, at the angle and direction the surrounding hair grows. It redistributes existing hair rather than creating new hair.'],
    ['q' => 'Who is a good candidate?',
     'a' => 'Typically someone with a stable, defined pattern of loss, adequate donor density and realistic expectations. Active or rapidly progressing loss, certain scalp conditions and some medical histories mean medical treatment comes first, or that surgery is deferred. Candidacy is decided after examination.'],
    ['q' => 'Who performs the hair transplant at DenceSpot Clinic?',
     'a' => 'Consultations and procedures are carried out by registered medical practitioners at the clinic, supported by the clinic’s trained team. The doctors’ names and qualifications are listed on this page under “Doctors at DenceSpot Clinic”. Whichever clinic you are considering, ask who physically performs the extraction and placement, and whether they are a doctor.'],
    ['q' => 'Is a hair transplant painful?',
     'a' => 'The local anaesthetic injections are the uncomfortable part; the procedure itself is not typically painful. Mild soreness, tightness or swelling for a few days afterwards is normal and managed with prescribed medication. Pain tolerance varies between patients.'],
    ['q' => 'How long does the procedure take?',
     'a' => 'It scales with graft numbers. Smaller sessions take a few hours; larger ones run through most of the day with breaks. It is a day-case procedure — you go home the same day.'],
    ['q' => 'How long does recovery take?',
     'a' => 'Most people return to desk work within a few days, following instructions on washing, sun exposure, sleeping position and exercise. Crusting settles over the first week or two; strenuous activity is restricted for longer.'],
    ['q' => 'When does transplanted hair start growing?',
     'a' => 'Transplanted hairs commonly shed within the first weeks while the follicles remain in place. New growth usually begins around three to four months, with a fuller picture at roughly ten to twelve months. Growth is uneven early on.'],
    ['q' => 'Is a hair transplant permanent?',
     'a' => 'Transplanted follicles keep the characteristics of the donor area and generally persist. However, surrounding non-transplanted hair can continue to thin with age, which is why a long-term plan and ongoing medical treatment matter. No clinic can promise a specific density or a permanent outcome.'],
    ['q' => 'How many grafts might I need?',
     'a' => 'It depends on the area to be covered, the density being aimed for and what the donor area can safely give — mapped zone by zone at the assessment. Any figure offered before an examination is a guess, not a plan. See our <a href="/hair-transplant-cost-in-gurgaon">graft and cost guidance</a>.'],
    ['q' => 'How many grafts are needed for Norwood 3, 4 or 5?',
     'a' => 'As general patient-education bands, Norwood III often needs around 1,200–2,000 grafts, Norwood III vertex to IV around 1,800–2,600, and Norwood V around 2,500–3,500, sometimes across two sessions. Donor density and hair calibre move these numbers, so your own figure comes from a mapped plan. The <a href="/hair-transplant-graft-calculator">graft calculator</a> gives a starting range.'],
    ['q' => 'What is the difference between FUE and DHI?',
     'a' => 'Extraction is essentially the same. The difference is placement: in DHI each graft is set with a fine implanter in a single action, giving close control of depth and angle — useful in hairlines and detail zones. FUE placement into pre-made sites is efficient over larger areas. Neither is universally better. Compare them in detail on the <a href="/fue-hair-transplant-in-gurgaon">FUE</a> and <a href="/dhi-hair-transplant-in-gurgaon">DHI</a> pages.'],
    ['q' => 'How much does a hair transplant cost in Gurgaon?',
     'a' => 'Cost is graft count multiplied by a per-graft rate, plus what the estimate includes. Gurgaon clinics we reviewed in ' . MARKET_PRICES_AS_OF . ' advertised FUE at roughly ₹35–₹100 per graft, which puts a 2,000-graft plan anywhere from ₹70,000 to ₹2,00,000. We quote after the assessment, itemised and in writing, before you book a date. Full breakdown on our <a href="/hair-transplant-cost-in-gurgaon">cost page</a>.'],
    ['q' => 'What is the cost per graft in Gurgaon?',
     'a' => 'Advertised rates in ' . MARKET_PRICES_AS_OF . ' ran from about ₹35 to ₹100 per graft for FUE, and ₹40 to ₹200 for DHI or other implanter placement. A rate means little without the graft count behind it: a low rate on an inflated count costs more than an honest quote. See <a href="/blog/why-hair-transplant-quotes-vary">why two quotes can differ so much</a>.'],
    ['q' => 'Are EMI or instalment options available?',
     'a' => 'Instalment options are available through third-party finance providers. Terms, eligibility and any interest are set by the provider rather than the clinic, and are explained before you commit to anything. See <a href="/cost-and-emi-options">cost, EMI and payment options</a>.'],
    ['q' => 'Is there a right age for a hair transplant?',
     'a' => 'There is no single cut-off, but age changes the plan. In younger patients whose loss is still progressing, the eventual pattern is unknown, so medical treatment usually comes first and any hairline is designed conservatively for how it will look decades later. The real question is whether your loss has stabilised and your donor can cover what is likely to come.'],
    ['q' => 'Is a hair transplant safe?',
     'a' => 'Performed by a qualified doctor in a proper clinical setting under local anaesthetic, it has a generally favourable safety profile. Swelling, crusting, numbness and temporary shedding are expected; infection and poor growth are uncommon; an over-harvested donor or a badly placed hairline are permanent. Our <a href="/blog/hair-transplant-side-effects-and-risks">side effects and risks guide</a> separates the three.'],
    ['q' => 'Is summer or the monsoon a bad time for a hair transplant in Gurgaon?',
     'a' => 'Neither rules it out, but both change the first fortnight: heat and sweat make the scalp harder to keep clean, and humidity and dust add to the aftercare. Many patients prefer the cooler months. See <a href="/blog/hair-transplant-recovery-in-gurgaon">recovering from a hair transplant in Gurgaon</a> for heat, helmets, commuting and timing.'],
    ['q' => 'Can women undergo hair transplantation?',
     'a' => 'Sometimes. Female hair loss is more often diffuse, and hormonal, thyroid, iron or post-partum causes need investigating and treating first. Many women do better with medical treatment; surgery is considered selectively, for suitable patterns such as a receding frontal line. See <a href="/hair-transplant-for-women-in-gurgaon">hair transplant for women</a> and <a href="/womens-hair-loss-treatment-in-gurgaon">medical treatment for women’s hair loss</a>.'],
    ['q' => 'Can beard hair be transplanted?',
     'a' => 'Beard areas can be restored using scalp grafts placed at the correct angle and density for the face — see <a href="/beard-transplant-gurgaon">beard transplant in Gurgaon</a>. The reverse, using beard hair as a donor source for the scalp, is considered only in selected cases and is assessed individually.'],
    ['q' => 'Where is DenceSpot Clinic in Gurgaon?',
     'a' => 'At ' . nap_address_line() . ', ' . NAP_LANDMARK . '. Consultations, procedures and follow-up reviews take place at the clinic itself rather than at a separate surgical centre. Opening hours are ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . ').'],
    ['q' => 'Can I travel back to another city after the procedure?',
     'a' => 'Usually, with planning. Patients travelling from outside Delhi NCR generally stay nearby for at least the first night. Whether you can travel before your first wash and review, and how to protect the grafts on the way, is agreed at the consultation and written into your aftercare plan.'],
    ['q' => 'What happens during the consultation?',
     'a' => 'History and medication review, scalp and donor examination, pattern staging, photographs for your record, and a written plan covering technique, approximate graft number, timeline and cost factors. Bring your medical history and a list of current medicines.'],
    ['q' => 'What should I ask any clinic before booking?',
     'a' => 'Who physically performs the extraction and placement, and are they a doctor; how the graft count was arrived at; what is left in the donor for later; exactly what the price includes; and what happens at the twelve-month review if density is uneven. A clinic that promises a density or a graft-survival percentage is answering a question nobody can. See <a href="/blog/questions-to-ask-hair-transplant-consultation">twelve questions worth asking</a>.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair transplant in Gurgaon'],
];

$page = [
    'title'       => 'Hair Transplant in Gurgaon: FUE, DHI & Cost | DenceSpot',
    'description' => 'Hair transplant in Gurgaon (Gurugram), Sector 39, opposite Medanta. FUE and DHI explained, grafts by Norwood stage, local market prices, recovery and aftercare.',
    'url'         => '/hair-transplant-in-gurgaon',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-hair-transplant-768.webp',
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/hair-transplant-in-gurgaon', [
            'name'          => 'Hair Transplant',
            'alternateName' => ['FUE hair transplant', 'DHI hair transplant', 'Hair restoration surgery', 'Hair transplant in Gurugram'],
            'procedureType' => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'Follicular units are harvested from the occipital and temporal donor scalp and placed into thinning or bald recipient areas at the angle and direction of the surrounding hair. Performed as a day case under local anaesthetic by FUE or DHI according to the assessment.',
            'preparation'   => 'Clinical assessment of hair loss pattern and donor density, review of medical history and medication, hairline designed and agreed with the patient before surgery.',
            'followup'      => 'Written aftercare instructions covering washing, sun exposure, sleeping position and activity, with photographic progress reviews through the first twelve months.',
            'expectedPrognosis' => 'Transplanted hairs commonly shed within the first weeks; new growth typically begins around three to four months with a fuller result at approximately ten to twelve months. Outcomes vary between patients and cannot be promised.',
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
        <h1 class="h1 mt-3">Hair Transplant in Gurgaon (Gurugram), Planned After a Clinical Assessment</h1>
        <p class="lead mt-3 measure">Every case starts with a clinical assessment of your hair loss and donor area. From there the hairline is planned on your own face, the technique is chosen to fit your scalp — not the other way round — and consultations and procedures are carried out by registered medical practitioners at the clinic in Sector 39, <?= e(NAP_LANDMARK) ?>. Aftercare and follow-up reviews are part of the plan, not an afterthought.</p>
        <?= medical_review_line() ?>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-treatment="Hair transplant" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
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
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-hair-transplant-768.webp" srcset="/assets/img/services/svc-hair-transplant-512.webp 512w, /assets/img/services/svc-hair-transplant-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a sculpted model of a follicular unit with three hairs, on a cream background" width="768" height="960" loading="eager" fetchpriority="high">
          <?= hp_ai_chip('AI-generated illustration') ?>
        </div>
        <?= hero_review_badge() ?>
      </div>
    </div>
  </div>
</section>

<?= lead_strip() ?>

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
      <div class="card"><?= icon('hairline', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Hairline planning</p><p class="meta mt-1">Drawn to your face proportions and age.</p></div>
      <div class="card"><?= icon('settings', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Technique to suit you</p><p class="meta mt-1">FUE or DHI — chosen, not defaulted.</p></div>
      <div class="card"><?= icon('chat', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Written plan &amp; follow-ups</p><p class="meta mt-1">Itemised estimate, reviews already scheduled.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="at-a-glance">
  <div class="wrap">
    <div class="split split--top" style="align-items:start">
      <div>
        <p class="eyebrow">The short answer</p>
        <h2 class="h2 mt-2">Hair Transplant in Gurgaon at a Glance</h2>
        <p class="body-l mt-3 measure">A hair transplant in Gurgaon moves your own follicles from the back and sides of the scalp into thinning areas, as a day case under local anaesthetic. At DenceSpot, in Sector 39 <?= e(NAP_LANDMARK) ?>, consultations and procedures are carried out by registered medical practitioners at the clinic. Most plans fall between about 800 and 4,500 grafts; new growth shows from three to four months and the result is judged at ten to twelve.</p>
        <p class="body mt-3 measure">The rest of this page takes each of those numbers apart: which stage of loss needs how many grafts, who does what on the day, what the market charges, and when the honest answer is not to operate yet.</p>
        <div class="btn-row mt-4">
          <a class="btn btn--outline btn--sm" href="#stages">Grafts by stage</a>
          <a class="btn btn--outline btn--sm" href="#cost">Cost in Gurgaon</a>
          <a class="btn btn--outline btn--sm" href="#not-yet">When not to operate</a>
        </div>
      </div>
      <div class="grid grid--2">
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Performed by</p><p class="h4 mt-1">Registered medical practitioners</p></div>
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Techniques</p><p class="h4 mt-1">FUE and DHI, chosen per zone</p></div>
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Typical graft range</p><p class="h4 mt-1">800 – 4,500+, by stage</p></div>
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Procedure</p><p class="h4 mt-1">Day case, local anaesthetic</p></div>
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Back to desk work</p><p class="h4 mt-1">Usually within a few days</p></div>
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Result judged at</p><p class="h4 mt-1">10 – 12 months</p></div>
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">How it is priced</p><p class="h4 mt-1">Grafts × rate, quoted in writing</p></div>
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Where</p><p class="h4 mt-1">Sector 39, <?= e(NAP_LANDMARK) ?></p></div>
      </div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'intro-donor',
    'alt'     => 'a mannequin head seen from behind, with the donor area at the back and sides marked',
    'eyebrow' => 'The basics, plainly',
    'title'   => 'What Is a Hair Transplant?',
    'id'      => 'what-is',
    'tone'    => 'canvas',
    'html'    => '<p>A hair transplant moves hair you already have into the areas where it has thinned. Follicles are taken from the back and sides of the scalp — the donor area — because that hair is generally resistant to the hormonal process behind pattern hair loss. They are separated under magnification and placed one by one at the angle and direction the surrounding hair grows; once healed, they are washed, cut and styled normally.</p>'
               . '<p>Two things decide how the result looks. The first is hairline design, judged against your face and your age rather than a template — see <a href="/blog/natural-hairline-design-explained">what makes a hairline look natural</a>. The second is honest arithmetic: the donor area is a finite supply, so coverage is prioritised over your lifetime, not spent in one session. Our guide to <a href="/blog/donor-area-limits-hair-transplant">what a donor area can and cannot cover</a> works through it.</p>'
               . '<p>That is why nothing is quoted before an examination: two people with the same photograph can need very different plans. See our <a href="/hair-transplant-cost-in-gurgaon">cost and graft guidance</a>.</p>',
    'points'  => [
        'It redistributes your own donor hair; it does not create new hair',
        'Donor supply, not marketing, sets the limit on what is achievable',
        'The hairline is drawn on your face and agreed first',
    ],
    'link'    => ['url' => '#faqs', 'label' => 'Read the FAQs'],
]) ?>

<section class="section section--white" id="candidacy">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">Suitability</p>
        <h2 class="h2 mt-2">Who May Consider a Hair Transplant?</h2>
        <p class="body mt-3">Suitability is decided after examination, not from a photograph. These are the patterns most often assessed at the clinic.</p>
        <a class="btn btn--ink mt-4" href="/book-consultation" data-book data-treatment="Hair transplant" data-track="book">Book an assessment</a>
        <a class="btn btn--outline mt-3" href="/hair-loss-assessment">Take the 2-minute self-assessment</a>
      </div>
      <div class="grid grid--2">
        <div class="card"><?= icon('hairline', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Receding hairline</h3><p class="body-s mt-2">A temple recession that has settled into a defined shape, where rebuilding the frontal line restores the frame of the face. Covered in depth on our <a href="/hairline-transplant-in-gurgaon">hairline restoration page</a>.</p></div>
        <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Pattern hair loss</h3><p class="body-s mt-2">Male or female pattern loss that has stabilised, with donor density adequate for the area to be covered.</p></div>
        <div class="card"><?= icon('settings', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Crown thinning</h3><p class="body-s mt-2">Vertex thinning, where planning matters most — the crown consumes grafts quickly and can keep expanding with age. See <a href="/crown-hair-transplant-in-gurgaon">crown hair transplant</a>.</p></div>
        <div class="card"><?= icon('list', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Reduced hair density</h3><p class="body-s mt-2">Diffuse thinning where the pattern is stable and adding density between existing hairs is achievable without damaging them.</p></div>
        <div class="card"><?= icon('pencil', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Repair and revision</h3><p class="body-s mt-2">Correcting a previous procedure — a hairline placed too low or too straight, visible plugs, or a depleted donor area. See <a href="/hair-transplant-repair-in-gurgaon">hair transplant repair</a>.</p></div>
        <div class="card"><?= icon('beard', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Beard and eyebrow restoration</h3><p class="body-s mt-2">Facial restoration using scalp grafts placed at the flatter angle facial hair grows at. See <a href="/beard-transplant-gurgaon">beard transplant</a> and <a href="/eyebrow-transplant-in-gurgaon">eyebrow transplant</a>.</p></div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="stages">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Grafts by stage</p>
      <h2 class="h2 mt-2">Which Plan Fits Your Stage of Hair Loss?</h2>
      <p class="body mt-3">Male pattern loss is staged on the <a href="/blog/norwood-scale-explained">Norwood scale</a>. The bands below are general patient education — a place to start the conversation, not a quote. Two people at the same stage can need very different numbers because donor density, hair calibre and the amount of native hair still in place all differ.</p>
    </div>

    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data" style="min-width:760px">
          <caption class="sr-only">Hair transplant planning by Norwood stage: what each stage looks like, the usual approach and the general graft band</caption>
          <thead>
            <tr><th scope="col">Stage</th><th scope="col">What it looks like</th><th scope="col">Usual approach</th><th scope="col">General graft band</th></tr>
          </thead>
          <tbody>
            <?php foreach ($stages as $s): ?>
            <tr>
              <th scope="row" style="color:var(--ink);font-size:15px;font-weight:700;text-transform:none;letter-spacing:0;white-space:nowrap"><?= e($s['stage']) ?></th>
              <td><?= e($s['looks']) ?></td>
              <td><?= e($s['plan']) ?></td>
              <td style="font-weight:600;color:var(--ink);white-space:nowrap"><?= e($s['grafts']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="grid grid--2 mt-4">
      <div class="note"><p class="h4">Donor supply is the real ceiling</p><p class="body-s mt-2">A healthy donor area can give a finite number of grafts over a lifetime. A plan that spends it all on the hairline at thirty leaves nothing for the crown at forty-five, which is why extensive loss is staged and why coverage — not full density — is the honest goal at Norwood VI–VII.</p></div>
      <div class="note"><p class="h4">Work out your own range</p><p class="body-s mt-2">The <a href="/hair-transplant-graft-calculator">graft calculator</a> gives a deliberately wide range by stage and zone, and our article on <a href="/blog/how-many-grafts-do-you-need">how many grafts you actually need</a> explains what an examination measures that a photograph cannot.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="not-yet">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">When surgery waits</p>
      <h2 class="h2 mt-2">When We Advise Against a Hair Transplant — or Say Not Yet</h2>
      <p class="body mt-3">A transplant spends donor hair that cannot be replaced, so the wrong operation is worse than none. These are the situations in which the recommendation is medical treatment, time, or a different procedure altogether. More on each in <a href="/blog/who-should-not-have-a-hair-transplant">when a hair transplant is the wrong answer</a>.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--tint"><?= icon('chart', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Loss still moving quickly</h3><p class="body-s mt-2">Grafts placed ahead of an unstable pattern are left stranded as the hair behind them recedes. Medical treatment first, then a conservative plan once the pattern settles.</p></div>
      <div class="card card--tint"><?= icon('user', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Diffuse thinning everywhere</h3><p class="body-s mt-2">When the donor area is thinning too, there is no stable supply to move. That is a <a href="/hair-fall-treatment-in-gurgaon">hair fall treatment</a> question before it is a surgical one.</p></div>
      <div class="card card--tint"><?= icon('scale', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">A donor that cannot cover the goal</h3><p class="body-s mt-2">If what you want exceeds what the donor can safely give, you are told at the consultation — along with what a realistic result would look like instead.</p></div>
      <div class="card card--tint"><?= icon('shield', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Active alopecia areata or scarring</h3><p class="body-s mt-2">Grafts placed into active disease can be lost. <a href="/alopecia-areata-treatment-in-gurgaon">Alopecia areata</a> and scarring alopecias are treated and observed first.</p></div>
      <div class="card card--tint"><?= icon('search', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">An untreated medical cause</h3><p class="body-s mt-2">Thyroid disease, low iron and some medications drive shedding that surgery does nothing for. See <a href="/blog/blood-tests-for-hair-fall">which blood tests matter</a>.</p></div>
      <div class="card card--tint"><?= icon('info', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Follicles still present and savable</h3><p class="body-s mt-2">Early thinning with miniaturising but living follicles is often better served by medication or <a href="/hair-prp-treatment-in-gurgaon">PRP</a>. See <a href="/blog/prp-or-hair-transplant">PRP or a hair transplant</a>.</p></div>
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
        <div style="padding:26px">
          <h3 class="h3">FUE Hair Transplant</h3>
          <p class="body-s mt-2">Follicular units are removed individually with a small punch, leaving dot-sized marks rather than a linear scar. Recipient sites are made first, then grafts placed into them — efficient across larger areas.</p>
          <a class="btn btn--outline btn--sm mt-3" href="/fue-hair-transplant-in-gurgaon">About FUE</a>
        </div>
      </div>
      <div class="card" style="padding:0;overflow:hidden">
        <div style="padding:26px">
          <h3 class="h3">DHI Hair Transplant</h3>
          <p class="body-s mt-2">Extraction is the same; placement is not. Each graft is set with a fine implanter in one action, fixing depth and angle at the moment of placement — valuable in hairlines and detail zones.</p>
          <a class="btn btn--outline btn--sm mt-3" href="/dhi-hair-transplant-in-gurgaon">About DHI</a>
        </div>
      </div>
      <div class="card" style="padding:0;overflow:hidden">
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
      <p class="body-s"><b>Neither FUE nor DHI is universally better.</b> The table above compares them; it does not rank them, because the ranking only exists once someone has examined your donor area. The reasoning behind your recommendation is explained at the consultation and written into the estimate — compare them yourself in our <a href="/blog/fue-vs-dhi-hair-transplant">FUE vs DHI</a> and <a href="/blog/fue-vs-fut-hair-transplant">FUE vs FUT</a> guides, or read about <a href="/unshaven-hair-transplant-in-gurgaon">no-shave hair transplants</a>.</p>
    </div>
  </div>
</section>

<section class="section section--white" id="who-does-what">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Who holds the instruments</p>
      <h2 class="h2 mt-2">Who Performs Each Step of Your Hair Transplant</h2>
      <p class="body mt-3">India's regulator is clear about <a href="/blog/who-can-legally-perform-a-hair-transplant-in-india">who may legally perform a hair transplant</a>, yet who actually carries out each step is the question patients least often ask. Here is how the steps are divided at this clinic.</p>
    </div>

    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data" style="min-width:720px">
          <caption class="sr-only">Who performs each step of a hair transplant at DenceSpot Clinic, Gurgaon</caption>
          <thead>
            <tr><th scope="col">Step</th><th scope="col">Who is responsible</th><th scope="col">Why it matters</th></tr>
          </thead>
          <tbody>
            <?php foreach ($roles as $r): ?>
            <tr>
              <th scope="row" style="color:var(--ink);font-size:15px;font-weight:700;text-transform:none;letter-spacing:0"><?= e($r['step']) ?></th>
              <td style="font-weight:600;color:var(--ink)"><?= e($r['who']) ?></td>
              <td><?= e($r['why']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="note mt-4">
      <p class="body-s"><b>Ask every clinic on your shortlist, including this one, who performs each of these steps</b> — by name and qualification. <a href="/how-to-choose-hair-transplant-clinic">How to choose a hair transplant clinic</a> covers the other answers worth hearing before you pay.</p>
    </div>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'Step by step',
    'title'   => 'How Does a Hair Transplant Work?',
    'id'      => 'procedure',
    'intro'   => 'A day case under local anaesthetic that moves your own follicles from the donor area at the back and sides of the scalp into the thinning or bald areas. It redistributes the hair you already have rather than creating new hair, which is why donor supply sets the ceiling. Consultations, the procedure and follow-up reviews are carried out by registered medical practitioners at the ' . NAP_LOCALITY . ' clinic.',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                    'title' => 'Consultation and assessment', 'text' => 'What you want and what is realistic. History and medication review, then the scalp and donor area examined under magnification, the pattern staged and photographs taken for your record.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned hairline', 'title' => 'Donor and hairline plan',     'text' => 'What the donor can safely give, now and later, is measured. The hairline is drawn on your head and approved by you sitting upright in a mirror, and grafts are mapped zone by zone.'],
        ['img' => 'step-procedure',    'alt' => 'sterile hair-restoration instruments laid out on a tray',  'title' => 'Procedure day',               'text' => 'The donor is trimmed and numbed; the injections are the uncomfortable part. Follicular units are extracted and sorted, singles kept for the hairline, then placed at the angle of the surrounding hair in a deliberately irregular pattern.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with review dates circled',               'title' => 'Recovery and reviews',        'text' => 'Home the same day with written aftercare, medication where prescribed and your first review already booked. Progress is photographed at set intervals through the year.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'intro-recipient',
    'alt'     => 'a mannequin head seen from the front, with short hair and a planned hairline drawn in pencil',
    'eyebrow' => 'Results',
    'title'   => 'Hair Transplant Results: How They Are Judged',
    'id'      => 'results',
    'reverse' => true,
    'tone'    => 'white',
    'html'    => '<p>This page does not show before-and-after photographs or patient cases. India’s medical regulator does not permit doctors and clinics to advertise surgical results or display before-and-after photographs for promotion (National Medical Commission guidelines, October 2026), and another person’s photograph cannot tell you what your own donor area and pattern of loss will allow.</p>'
               . '<p>If you are shown photographs elsewhere, lighting, angle, hair length, styling and the time since the procedure all change what they seem to show. Our guide to <a href="/blog/how-to-read-before-and-after-photos">reading before-and-after photos</a> explains what to look for.</p>',
    'points'  => [
        'Your progress is recorded in standardised photographs taken at your own reviews',
        'The result is judged at around ten to twelve months',
        'Outcomes vary between patients',
    ],
    'link'    => ['url' => '/blog/hair-transplant-growth-timeline-month-by-month', 'label' => 'Read the month-by-month growth timeline'],
]) ?>

<?= doctor_block('Consultations and procedures are carried out by registered medical practitioners at the clinic. Every plan starts with a medical examination, because hair loss can have reversible causes and donor supply is finite.') ?>

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
          <div class="card"><p class="h4">Technique</p><p class="meta mt-1">FUE, DHI or a combination across zones</p></div>
          <div class="card"><p class="h4">Treatment complexity</p><p class="meta mt-1">Scarring, repair work, sessions needed</p></div>
          <div class="card"><p class="h4">Individual plan</p><p class="meta mt-1">Supporting medical therapy or PRP alongside</p></div>
        </div>
        <p class="meta mt-4 measure">A word of caution about “per graft, starting from” pricing: a low rate applied to an inflated graft count costs more than an honest quote. Ask any clinic how the graft number was arrived at.</p>
        <a class="btn btn--ink mt-4" href="/hair-transplant-cost-in-gurgaon"><?= icon('rupee', 18) ?> Full cost breakdown</a>
      </div>
      <div class="cta-band" style="display:block">
        <h3 class="h3">Get a Personalized Treatment Estimate</h3>
        <p class="body-s mt-2">Send photos of the front, crown and donor area on WhatsApp, or request a call back. You will get an assessment appointment — not a sales pitch.</p>
        <div class="stack-sm mt-4">
          <a class="btn btn--block btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Send photos on WhatsApp</a>
          <a class="btn btn--block btn--ghost" href="/book-consultation" data-book data-treatment="Hair transplant" data-track="book">Request an estimate by form</a>
        </div>
      </div>
    </div>

    <div class="mt-6" style="max-width:62ch">
      <h3 class="h3">What Gurgaon Clinics Advertise</h3>
      <p class="body-s mt-2">Most patients arrive having seen other clinics' figures, so here is the market as it was advertised in <?= e(MARKET_PRICES_AS_OF) ?>. At those FUE rates, a 2,000-graft plan works out anywhere between ₹<?= e(number_format(2000 * MARKET_FUE_RATE_LOW)) ?> and ₹<?= e(number_format(2000 * MARKET_FUE_RATE_HIGH)) ?> — which is exactly why the graft count matters more than the rate.</p>
    </div>
    <?= market_price_table('Hair transplant prices advertised by Gurgaon clinics, ' . MARKET_PRICES_AS_OF, MARKET_PRICES['hair-transplant'], MARKET_PRICES_AS_OF, 'Gurgaon clinic and directory websites') ?>
  </div>
</section>

<section class="section section--canvas" id="recovery">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Recovery &amp; results</p>
      <h2 class="h2 mt-2">What Generally Happens After Treatment</h2>
      <p class="body mt-3">A general guide to the phases most patients describe. Your own timeline is set by your doctor at your reviews — the full detail is in our <a href="/hair-transplant-aftercare">aftercare guide</a> and the <a href="/blog/hair-transplant-growth-timeline-month-by-month">month-by-month growth timeline</a>.</p>
    </div>
    <div class="grid grid--5 mt-6">
      <div class="card"><span class="pill">Phase 1</span><h3 class="h4 mt-3">Initial recovery</h3><p class="body-s mt-2">Tenderness, mild swelling and small crusts in the treated areas. Washing starts as instructed, and desk work usually resumes within a few days.</p></div>
      <div class="card"><span class="pill">Phase 2</span><h3 class="h4 mt-3">Early shedding</h3><p class="body-s mt-2">Transplanted hairs commonly shed while the follicles stay in place. This is expected, not a failed procedure — it is the single most misunderstood phase. See <a href="/blog/shedding-and-shock-loss-after-hair-transplant">shedding and shock loss</a>.</p></div>
      <div class="card"><span class="pill">Phase 3</span><h3 class="h4 mt-3">New growth</h3><p class="body-s mt-2">Fine new hairs typically appear from around three to four months, unevenly at first. Texture improves as they mature.</p></div>
      <div class="card"><span class="pill">Phase 4</span><h3 class="h4 mt-3">Progressive density</h3><p class="body-s mt-2">Coverage continues to build through the middle months. Progress is documented photographically at each review.</p></div>
      <div class="card"><span class="pill pill--ink">Phase 5</span><h3 class="h4 mt-3">Longer-term result</h3><p class="body-s mt-2">A fuller picture around ten to twelve months. Non-transplanted hair can keep thinning, so medical treatment often continues alongside.</p></div>
    </div>
    <div class="note mt-4" style="display:flex;gap:16px;align-items:flex-start">
      <?= icon('info', 20, 'var(--accent-deep)', 1.8) ?>
      <p class="body-s">Individual recovery and hair-growth outcomes vary. Your doctor will provide personalized guidance based on your treatment, and timelines here are general patient education rather than a promise of results. Risks and side effects are set out in our <a href="/blog/hair-transplant-side-effects-and-risks">guide to hair transplant side effects and risks</a>.</p>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-hair-fall',
    'alt'     => 'a wooden comb resting on folded linen towels by a window',
    'eyebrow' => 'Local conditions',
    'title'   => 'Recovering in Gurgaon: Heat, Dust, Hard Water and the Commute',
    'id'      => 'gurgaon-recovery',
    'tone'    => 'white',
    'html'    => '<p>Standard aftercare sheets assume mild weather and a car. The first fortnight in Gurgaon rarely looks like that, so a few local realities are worth planning around before you pick a date. The detail is in <a href="/blog/hair-transplant-recovery-in-gurgaon">recovering from a hair transplant in Gurgaon</a>.</p>'
               . '<p>Borewell water is hard on hair shafts, not on follicles, and the first washes follow your written instructions exactly. The <a href="/blog/hard-water-pollution-and-hair-fall-in-gurgaon">hard water myth</a> is covered separately.</p>',
    'points'  => [
        'Summer heat and sweat make the scalp harder to keep clean while crusts form: many patients book the cooler months, and those who cannot plan indoor days for the first week',
        'Construction dust and winter smog do not damage grafts directly but complicate keeping the area clean; when a loose covering is appropriate is set by your doctor, not the weather',
        'Helmets and anything that presses on the grafts wait until your doctor clears them, so if you ride to work, arrange other transport before the procedure date',
    ],
]) ?>

<section class="section section--ink" id="questions">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Before you book anywhere</p>
      <h2 class="h2 mt-2">Questions to Ask Any Hair Transplant Clinic in Gurgaon</h2>
      <p class="body-l mt-3">Including this one. A straight clinic answers each in a sentence.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--ink"><span class="journey__num">01</span><p class="h4 mt-2">Who performs extraction and placement — by name?</p><p class="meta mt-2">Not who consults. Who holds the punch and the implanter.</p></div>
      <div class="card card--ink"><span class="journey__num">02</span><p class="h4 mt-2">How was my graft number arrived at?</p><p class="meta mt-2">A zone-by-zone map of your scalp, or a round number from a photograph?</p></div>
      <div class="card card--ink"><span class="journey__num">03</span><p class="h4 mt-2">What is left in my donor for later?</p><p class="meta mt-2">Pattern loss continues. A plan that empties the donor now leaves nothing at forty-five.</p></div>
      <div class="card card--ink"><span class="journey__num">04</span><p class="h4 mt-2">What exactly does the price include?</p><p class="meta mt-2">Anaesthesia, medication, PRP, blood tests, reviews — in writing, before you pay.</p></div>
      <div class="card card--ink"><span class="journey__num">05</span><p class="h4 mt-2">What happens at twelve months if density is uneven?</p><p class="meta mt-2">The answer should exist before the operation, not after it.</p></div>
      <div class="card card--ink"><span class="journey__num">06</span><p class="h4 mt-2">Can any result be promised?</p><p class="meta mt-2">The honest answer is no. A promised density or a quoted graft-survival percentage is marketing.</p></div>
    </div>
    <div class="btn-row mt-6">
      <a class="btn btn--accent" href="/blog/questions-to-ask-hair-transplant-consultation">Twelve questions, with good and bad answers</a>
      <a class="btn btn--ghost" href="/blog/hair-transplant-promises-and-success-rates">What success-rate claims really mean</a>
    </div>
  </div>
</section>

<section class="section section--canvas" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Hair Transplant in Gurgaon: Frequently Asked Questions</h2>
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
 * Returns '' since Oct 2026 — patient reviews may not be shared for promotion
 * (NMC Guidelines 06.10.2026, Explanation V). See google_reviews_block().
 */
?>
<?= google_reviews_block() ?>

<section class="section section--white" id="near-medanta">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">Finding us</p>
        <h2 class="h2 mt-2">Hair Transplant Clinic Near Medanta, Sector 39 Gurugram</h2>
        <p class="body mt-3">DenceSpot is on Sector 39 Road in Jharsa, <?= e(NAP_LANDMARK) ?>. Any driver or ride-hail app can use the Medanta gate as the landmark, and the clinic is on the main road.</p>
        <p class="body mt-3">Consultations, procedures and follow-up reviews take place at the clinic itself rather than at a separate surgical centre.</p>
      </div>
      <div class="stack">
        <div class="card card--pad-lg">
          <p class="h4">Nearby areas</p>
          <p class="body-s mt-2">Sector 39 is reachable by road from across Gurugram and South Delhi, including:</p>
          <div style="display:flex;flex-wrap:wrap;gap:8px;margin-top:14px">
            <?php foreach (['Sector 38', 'Sector 39', 'Sector 40', 'Jharsa', 'Sushant Lok', 'South City', 'Sohna Road', 'Golf Course Road', 'DLF Phases 1–5', 'Cyber City', 'MG Road', 'Palam Vihar', 'Manesar', 'South Delhi'] as $area): ?>
              <span class="pill" style="text-transform:none;letter-spacing:0;font-size:13px;font-weight:600"><?= e($area) ?></span>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="card card--pad-lg">
          <p class="h4">Coming from outside Delhi NCR</p>
          <p class="body-s mt-2">Start by sending photographs of the front, crown and donor area on WhatsApp, so you only travel once a consultation is likely to be worthwhile. For the procedure itself, plan to stay nearby for at least the first night; when you can travel home, and how to protect the grafts on the journey, is agreed at your consultation.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= local_block(
    'Visit Our Clinic in Sector 39, Gurugram',
    'Consultations and procedures are carried out by registered medical practitioners at our Sector 39 clinic in Gurugram, where the assessment, procedure day and follow-up reviews all take place.'
) ?>

<?= lp_cta([
    'eyebrow'   => 'Sector 39, Gurugram',
    'title'     => 'Take the First Step Toward Hair Restoration',
    'text'      => 'Bring your questions and your concerns. You will get a clinical assessment, an honest view of whether a hair transplant is appropriate for you, and a written plan if it is — with no pressure to book a date on the day.',
    'treatment' => 'Hair transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
