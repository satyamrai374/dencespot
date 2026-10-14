<?php
/**
 * /hair-prp-treatment-in-gurgaon — page #29, PRP pillar.
 *
 * Ported from the design build. The two design exports disagreed on the
 * doctor's qualifications; that was resolved with the clinic and the answer
 * now lives in config.php alone. No page restates a credential.
 *
 * Sep 2026 — rebuilt against the live SERP (competitor research, 13 Sep 2026:
 * Paras, DHI India, AK Clinics, Cult Aesthetics, Pristyn, Uncover). The
 * "prp treatment in gurgaon" SERP mixes hair and face intent, so the page now
 * signposts face PRP explicitly. Gaps no ranking page fills, now covered: who
 * PRP will not help and which tests come first; a session plan with an explicit
 * stop rule; a results timeline; PRP with medication and after a transplant;
 * cited evidence; dated market price context (never presented as ours).
 * The PRP cluster navigation is appended by footer.php.
 *
 * 14 Oct 2026: landing-page layout (lp_split / lp_steps / lp_cta); the
 * comparison, timeline and market tables stay. Every image is an AI
 * illustration with its visible label. Per the client, this Gurugram page
 * never mentions the Rohini clinic.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';
// $faqs quotes market constants, which header.php would otherwise load too late.
require_once __DIR__ . '/includes/market-prices.php';

$comparison = [
    ['name' => 'Hair PRP', 'what' => 'Your own platelet-rich plasma, spun from your blood on the day.', 'for' => 'Early to moderate pattern loss, diffuse thinning, support around a transplant.', 'note' => 'Autologous, so no donor material. Results depend heavily on the preparation protocol and need maintenance.'],
    ['name' => 'GFC', 'what' => 'Growth factor concentrate — platelets are broken down so the growth factors are released, then the cells are removed.', 'for' => 'The same indications as PRP; marketed as a more refined version of it.', 'note' => 'Also made from your blood, using a kit. The published evidence base is smaller and newer than for PRP.'],
    ['name' => 'Exosomes', 'what' => 'Cell-derived vesicles, usually a manufactured product rather than something made from your own blood.', 'for' => 'Marketed for thinning hair, often as the newest upgrade.', 'note' => 'Evidence in hair loss is early, and products differ widely in source and quality. Ask exactly what the product is.'],
    ['name' => 'Mesotherapy', 'what' => 'A manufactured cocktail of vitamins, peptides or medication — not made from your blood.', 'for' => 'Scalp nourishment protocols, often sold bundled with other treatments.', 'note' => 'Formulations vary widely between clinics, so ask exactly what is in the syringe.'],
    ['name' => 'Medical therapy', 'what' => 'Prescribed topical or oral hair-loss medication, taken daily at home.', 'for' => 'The usual first-line treatment for pattern hair loss, prescribed after assessment.', 'note' => 'The most studied option here, but not a cure: benefit lasts only while it is taken. PRP usually runs alongside it rather than instead of it.'],
    ['name' => 'Hair transplant', 'what' => 'Your own follicles, moved surgically from the donor area into thinning zones.', 'for' => 'Areas where follicles are already lost and no injection can bring them back.', 'note' => 'A different category of treatment entirely.'],
];

/** The course, as it is actually run and reviewed. */
$timeline = [
    ['when' => 'Before session one', 'what' => 'Examination, blood tests where indicated, baseline photographs at fixed settings.', 'decision' => 'Is PRP the right treatment at all, or does a reversible cause come first?'],
    ['when' => 'Sessions 1–3 or 4', 'what' => 'One session about every four weeks, same preparation protocol each time.', 'decision' => 'Nothing meaningful can be judged yet; do not stop or extend on impressions.'],
    ['when' => 'Around 6–10 weeks', 'what' => 'Reduced shedding is usually the first change people notice.', 'decision' => 'Useful early signal, not yet a result.'],
    ['when' => 'Review at 3–6 months', 'what' => 'Photographs compared against baseline: density, texture, visible scalp.', 'decision' => 'Responding → plan maintenance. No change → stop and change the plan.'],
    ['when' => 'Maintenance', 'what' => 'Commonly every three to six months, alongside medical treatment.', 'decision' => 'Re-reviewed at intervals; continued only while the photographs justify it.'],
];

$faqs = [
    ['q' => 'What is hair PRP treatment?',
     'a' => 'A treatment in which a small volume of your own blood is spun in a centrifuge to concentrate the platelets, and that platelet-rich plasma is injected into the thinning areas of your scalp. The aim is to support follicles that are miniaturising, using growth factors your own platelets carry.'],
    ['q' => 'Does PRP actually work for hair loss?',
     'a' => 'For the right case — early to moderate pattern loss with follicles still present — published trials suggest PRP can reduce shedding and improve density in some patients. Most of those trials are small and short, protocols differ so much between clinics that results are not uniform, and a proportion of patients do not respond — which is why the <a href="https://www.nhs.uk/conditions/hair-loss/" rel="noopener nofollow" target="_blank">NHS guidance on hair loss</a> is worth reading alongside anything a clinic tells you. PRP does not cure or reverse pattern hair loss. It is used as part of a plan alongside medical treatment, not as a substitute for one. More in <a href="/blog/does-prp-work-for-hair-loss">does PRP actually work for hair loss</a>.'],
    ['q' => 'Is hair PRP the same as a PRP facial?',
     'a' => 'The principle is the same — your own platelet-rich plasma — but it is a different treatment with a different aim, technique and review. Hair PRP is injected at follicle depth across the thinning scalp; face PRP targets skin texture and is often combined with microneedling. See <a href="/face-prp-treatment-in-gurgaon">face PRP treatment in Gurgaon</a>.'],
    ['q' => 'How many PRP sessions will I need?',
     'a' => 'Most initial courses are planned as three or four sessions about four weeks apart, sometimes more where a larger area is being treated. Maintenance sessions are then commonly spaced every three to six months. Your own number is set after the assessment and confirmed in writing before the first session.'],
    ['q' => 'Is PRP painful?',
     'a' => 'It is uncomfortable rather than painful for most people. The blood draw feels like any blood test; the scalp injections sting briefly, and topical anaesthetic or cooling is used to reduce that. The scalp usually feels tender for a day or so afterwards. Pain tolerance varies.'],
    ['q' => 'How long does one session take?',
     'a' => 'Roughly 30 to 60 minutes from arrival to leaving. Most of that is the blood draw, the spin and preparing the scalp; the injections themselves usually take ten to fifteen minutes. It is a walk-in, walk-out appointment.'],
    ['q' => 'When will I see results from PRP?',
     'a' => 'Reduced shedding is usually the first change people notice, often around six to ten weeks. Changes in texture and density, where they occur, are generally assessed from three to six months against your baseline photographs. Nothing meaningful can be judged after a single session.'],
    ['q' => 'How do I know whether PRP is working for me?',
     'a' => 'Not from the mirror, which mostly measures lighting. Progress is judged against baseline photographs taken at fixed angles and settings, compared at a scheduled review, alongside how much hair you are shedding. That comparison — not how you feel about it on a given day — decides whether to continue.'],
    ['q' => 'When should PRP be stopped?',
     'a' => 'When the review after the initial course shows no meaningful change against your baseline photographs. A proportion of people do not respond, and continuing past that point spends money without a reason. That is why we do not sell large prepaid packages: you should be free to stop when the evidence says so.'],
    ['q' => 'Is PRP permanent, or do I need to keep going?',
     'a' => 'It is not permanent. PRP does not stop the underlying process causing pattern hair loss, so a result is held with maintenance sessions and, in most cases, ongoing medical treatment. If you stop everything, thinning resumes from where it had reached.'],
    ['q' => 'What is the difference between PRP and GFC?',
     'a' => 'Both start from your own blood. PRP injects the platelet-rich plasma itself. GFC breaks the platelets down first so the growth factors are released, then removes the cells, leaving an acellular concentrate. GFC is marketed as a refinement of PRP; its published evidence base is smaller and newer. Neither is automatically the better choice for a given scalp. See <a href="/gfc-treatment-in-gurgaon">GFC treatment in Gurgaon</a> and our <a href="/blog/prp-vs-gfc-vs-exosomes">PRP vs GFC vs exosomes comparison</a>.'],
    ['q' => 'Can PRP be combined with minoxidil or finasteride?',
     'a' => 'Commonly, yes. Prescribed medical therapy acts on the process driving pattern hair loss; PRP is a supportive treatment, so the two are usually run together rather than chosen between. Neither medicine is a cure: any benefit lasts only while it is taken, and not everyone responds. Medication is prescribed only after assessment and is not started or stopped on the strength of a PRP course. See <a href="/blog/minoxidil-and-finasteride-in-india">minoxidil and finasteride in India</a>.'],
    ['q' => 'Can PRP regrow hair on a completely bald area?',
     'a' => 'No. PRP acts on follicles that still exist. Where the scalp is fully bald and smooth, or scarred, the follicles are gone and there is nothing for the treatment to support. Those areas are a <a href="/hair-transplant-in-gurgaon">hair transplant</a> question, not a PRP question.'],
    ['q' => 'Is PRP safe? What are the side effects?',
     'a' => 'Because the injected material is made from your own blood, a reaction to the material itself is not expected. The usual effects come from the needles: tenderness, redness, pinpoint marks, mild swelling, occasional headache and bruising at the arm. Infection at an injection site is uncommon but possible, which is why sterile technique and aftercare instructions matter.'],
    ['q' => 'Who should not have PRP?',
     'a' => 'Treatment is usually not offered, or is deferred, with active infection or dermatitis over the injection area, low platelet counts or bleeding disorders, ongoing anticoagulant treatment until reviewed, blood cancers and some other active malignancies, poorly controlled systemic illness, and in pregnancy and breastfeeding. This is not a complete list — suitability is decided at the consultation.'],
    ['q' => 'Can PRP be done after a hair transplant?',
     'a' => 'It is commonly used to support the native hair around a transplanted area, which keeps thinning on its own timetable after surgery. Timing relative to the procedure is decided by the treating doctor, since the scalp needs to have healed first.'],
    ['q' => 'Can women have PRP for hair loss?',
     'a' => 'Yes, and female pattern thinning is one of the more common reasons patients come for it. The order matters, though: thyroid function, iron stores, vitamin D and hormonal causes are checked and treated first, because a proportion of female shedding improves once those are corrected without any injections at all. See <a href="/womens-hair-loss-treatment-in-gurgaon">women’s hair loss treatment</a>.'],
    ['q' => 'Do I need to stop my hair-loss medication during PRP?',
     'a' => 'Usually not — prescribed medical therapy generally continues alongside a PRP course, because the two do different jobs. What does need reviewing before a session is anything affecting clotting, including blood thinners and regular anti-inflammatory painkillers. Bring your full medication list.'],
    ['q' => 'How much does hair PRP treatment cost in Gurgaon?',
     'a' => 'Gurgaon clinics we reviewed in ' . MARKET_PRICES_AS_OF . ' mostly advertised PRP at ' . rupees(MARKET_PRP_SESSION_LOW) . '–' . rupees(MARKET_PRP_SESSION_HIGH) . ' per session, with prepaid courses of ₹20,000–₹60,000. A session is not a standard unit — volume, preparation and area all differ — so compare the course, not the session, and ask what happens if you do not respond. Ours is quoted in writing after assessment; see the <a href="/prp-hair-treatment-cost-in-gurgaon">PRP hair treatment cost guide</a>.'],
    ['q' => 'Where is DenceSpot’s PRP clinic in Gurgaon?',
     'a' => 'At ' . nap_address_line() . ', ' . NAP_LANDMARK . '. Consultations and sessions are carried out by registered medical practitioners at the clinic. Hours are ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . ').'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair PRP treatment in Gurgaon'],
];

$page = [
    'title'       => 'PRP Hair Treatment in Gurgaon: Sessions & Cost | DenceSpot',
    'description' => 'PRP treatment for hair in Gurgaon, Sector 39 near Medanta. Who it may help, its evidence limits, a session plan with a stop rule, timeline and typical costs.',
    'url'         => '/hair-prp-treatment-in-gurgaon',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-prp-768.webp',
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_therapy('/hair-prp-treatment-in-gurgaon', [
            'name'          => 'Hair PRP Treatment',
            'alternateName' => ['Platelet-rich plasma therapy for hair', 'PRP hair treatment', 'PRP treatment for hair loss in Gurugram'],
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'A small volume of the patient\'s blood is drawn and centrifuged to concentrate the platelet fraction. The resulting platelet-rich plasma is injected into the scalp at follicular depth across the thinning areas, typically as a course of three to four sessions about four weeks apart.',
            'preparation'   => 'Clinical assessment and scalp examination, review of medical history and medication including anticoagulants, and blood investigations where indicated to identify reversible causes of hair loss before treatment begins.',
            'followup'      => 'Baseline and interval photography, review of response at three to six months, and maintenance sessions where appropriate alongside ongoing medical therapy.',
            'expectedPrognosis' => 'Reduced shedding is commonly the first observed change, often around six to ten weeks. Density and texture changes, where they occur, are assessed from three to six months. PRP does not halt the underlying process of pattern hair loss and results require maintenance. Published trials are mostly small and short, preparation methods vary, and a proportion of patients do not respond.',
        ]),
        schema_faq('/hair-prp-treatment-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Hair PRP in Gurgaon</span>
        <h1 class="h1 mt-3">PRP Treatment for Hair in Gurgaon for Early Thinning and Increased Shedding</h1>
        <p class="lead mt-3 measure">PRP concentrates the platelets from your own blood and injects them into thinning areas of the scalp, to support follicles that are shrinking but still alive. It is one part of a plan, not the whole plan — which is why the cause of your hair loss is investigated before a single session is booked, at our Gurugram clinic in Sector 39, <?= e(NAP_LANDMARK) ?>.</p>
        <?= medical_review_line() ?>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-treatment="Hair PRP / GFC" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Cause investigated before the first session',
            'One consistent preparation protocol',
            'The whole course quoted, not per session',
            'Carried out by registered medical practitioners',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-prp-768.webp" srcset="/assets/img/services/svc-prp-512.webp 512w, /assets/img/services/svc-prp-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a capped tube of golden plasma standing on a white tray beside a syringe" width="768" height="960" loading="eager" fetchpriority="high">
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
    <div class="grid grid--5">
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Diagnosis first</p><p class="meta mt-1">Reversible causes ruled out before injections.</p></div>
      <div class="card"><?= icon('settings', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">One protocol</p><p class="meta mt-1">Same spin, same volume, every session.</p></div>
      <div class="card"><?= icon('doc', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Course quoted upfront</p><p class="meta mt-1">You know the full cost before session one.</p></div>
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Photographs, not impressions</p><p class="meta mt-1">Baseline and interval images at fixed settings.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Registered doctors</p><p class="meta mt-1">Treatment by registered medical practitioners.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="at-a-glance">
  <div class="wrap">
    <div class="split split--top" style="align-items:start">
      <div>
        <p class="eyebrow">The short answer</p>
        <h2 class="h2 mt-2">PRP Hair Treatment at a Glance</h2>
        <p class="body-l mt-3 measure">Hair PRP injects a concentrate of your own platelets into thinning areas of the scalp to support follicles that are still alive. It suits early to moderate thinning, runs as a course of about three or four monthly sessions, and is judged against photographs at three to six months. It does not regrow hair on bald skin, and it needs maintenance.</p>
        <div class="note mt-4">
          <p class="h4">Looking for PRP for your face or skin?</p>
          <p class="body-s mt-2">That is a different treatment with a different aim and technique. See <a href="/face-prp-treatment-in-gurgaon">face PRP treatment in Gurgaon</a>. Everything on this page is about PRP for hair.</p>
        </div>
      </div>
      <div class="grid grid--2">
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Carried out by</p><p class="h4 mt-1">Registered medical practitioners</p></div>
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Usually considered for</p><p class="h4 mt-1">Early to moderate thinning</p></div>
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Initial course</p><p class="h4 mt-1">3–4 sessions, ~4 weeks apart</p></div>
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Each session</p><p class="h4 mt-1">30–60 minutes, walk in, walk out</p></div>
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">First change</p><p class="h4 mt-1">Less shedding, ~6–10 weeks</p></div>
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Judged at</p><p class="h4 mt-1">3–6 months, on photographs</p></div>
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Advertised in Gurgaon</p><p class="h4 mt-1"><?= e(rupees(MARKET_PRP_SESSION_LOW)) ?> – <?= e(rupees(MARKET_PRP_SESSION_HIGH)) ?> per session</p></div>
        <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Where</p><p class="h4 mt-1">Sector 39, <?= e(NAP_LANDMARK) ?></p></div>
      </div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-hair-transplant',
    'alt'     => 'a sculpted model of a follicular unit with three hairs, on a cream background',
    'eyebrow' => 'The basics, plainly',
    'title'   => 'What Is Hair PRP Treatment?',
    'id'      => 'what-is',
    'tone'    => 'canvas',
    'html'    => '<p>PRP stands for platelet-rich plasma. A small volume of blood is drawn from your arm, exactly as for a routine blood test, and spun in a centrifuge; the plasma fraction in which the platelets are concentrated is kept and injected into the scalp at the depth where follicles sit, across the thinning areas.</p>'
               . '<p>Platelets carry growth factors — signalling proteins the body normally uses for repair. The working principle is that delivering them around miniaturising follicles helps hold those follicles in their growth phase for longer and improves the blood supply feeding them.</p>'
               . '<p>The published evidence for PRP in pattern hair loss is supportive but uneven, largely because protocols differ between clinics: how the blood is spun, how concentrated the result is, how much is injected and how often. We treat PRP as one part of a plan, not the whole plan.</p>',
    'points'  => [
        'It acts on follicles that are still alive but shrinking',
        'Where a follicle is gone — a fully bald, shiny scalp, or scarred skin — there is nothing left for it to act on',
        'It does not switch off the process driving the hair loss, so a result is maintained rather than banked',
    ],
    'link'    => ['url' => '/blog/prp-or-hair-transplant', 'label' => 'PRP or a hair transplant: where the line falls'],
]) ?>

<section class="section section--white" id="candidacy">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">Suitability</p>
        <h2 class="h2 mt-2">Who May Consider Hair PRP?</h2>
        <p class="body mt-3">PRP suits scalps where follicles are still present and struggling. Suitability, and whether anything else should be treated first, is decided after examination.</p>
        <a class="btn btn--ink mt-4" href="/book-consultation" data-book data-treatment="Hair PRP / GFC" data-track="book">Book an assessment</a>
      </div>
      <div class="grid grid--2">
        <div class="card"><?= icon('hairline', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Early pattern hair loss</h3><p class="body-s mt-2">Thinning that has started but where follicles are still visibly present — the stage at which supporting them is most likely to be worth doing.</p></div>
        <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Diffuse thinning in women</h3><p class="body-s mt-2">A widening parting or overall loss of volume, once thyroid, iron, vitamin D and hormonal causes have been checked and treated — see <a href="/blog/female-pattern-hair-loss-in-women">female pattern hair loss</a>.</p></div>
        <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Increased shedding</h3><p class="body-s mt-2">Noticeably more hair coming out than usual, where the cause has been identified and shedding needs settling.</p></div>
        <div class="card"><?= icon('settings', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Alongside a transplant</h3><p class="body-s mt-2">Supporting the native hair around a grafted area, which continues thinning on its own timetable after surgery.</p></div>
        <div class="card"><?= icon('shield', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">When medication is not an option</h3><p class="body-s mt-2">Where standard medical therapy is not tolerated, is contraindicated, or is being avoided for a specific reason.</p></div>
        <div class="card"><?= icon('clock', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Not ready for surgery</h3><p class="body-s mt-2">Where a transplant may eventually make sense but the pattern has not settled, or you would rather hold what you have for now.</p></div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="wont-help">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Before you pay for a course</p>
      <h2 class="h2 mt-2">When PRP Will Not Help — and the Tests That Come First</h2>
      <p class="body mt-3">PRP often fails because the wrong problem is being injected. These are the situations where the honest recommendation is something else.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--tint"><h3 class="h4">Bald, smooth scalp</h3><p class="body-s mt-2">No follicles, nothing to support. That is a <a href="/hair-transplant-in-gurgaon">transplant</a> or cosmetic question, however the PRP is prepared.</p></div>
      <div class="card card--tint"><h3 class="h4">An untreated medical cause</h3><p class="body-s mt-2">Low iron, thyroid disease or vitamin deficiency drive shedding that injections do nothing for. Correcting them is cheaper and works better.</p></div>
      <div class="card card--tint"><h3 class="h4">Telogen effluvium</h3><p class="body-s mt-2">Heavy shedding after illness, surgery, childbirth or stress usually settles once the trigger passes. See <a href="/blog/telogen-effluvium-vs-pattern-hair-loss">telogen effluvium vs pattern loss</a>.</p></div>
      <div class="card card--tint"><h3 class="h4">Active alopecia areata</h3><p class="body-s mt-2">An autoimmune condition with its own treatment. See <a href="/alopecia-areata-treatment-in-gurgaon">alopecia areata treatment</a>.</p></div>
      <div class="card card--tint"><h3 class="h4">Scarring alopecia</h3><p class="body-s mt-2">Follicles destroyed and replaced by scar tissue. The aim is to stop progression, not to inject.</p></div>
      <div class="card card--tint"><h3 class="h4">Extensive pattern loss alone</h3><p class="body-s mt-2">Where only a thin fringe of miniaturised hair remains, the realistic benefit is small. You are told that before paying.</p></div>
    </div>
    <div class="card card--pad-lg mt-5">
      <p class="h4">Tests commonly checked first, where the history points to them</p>
      <p class="body-s mt-2">Complete blood count, ferritin and iron studies, thyroid function (TSH), vitamin D and vitamin B12 — and hormonal tests in selected women. Not a fixed panel for everyone: which tests matter is decided from your history. See <a href="/blog/blood-tests-for-hair-fall">which blood tests actually matter for hair fall</a>.</p>
    </div>
  </div>
</section>

<section class="section section--white" id="compare">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Straight comparison</p>
      <h2 class="h2 mt-2">PRP, GFC, Exosomes, Mesotherapy and Medication — What Is Actually Different</h2>
      <p class="body mt-3">These get sold interchangeably, and they are not interchangeable. This is what is in each syringe and what each is realistically for.</p>
    </div>

    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data" style="min-width:840px">
          <caption class="sr-only">Comparison of hair PRP, GFC, exosomes, mesotherapy, medical therapy and hair transplant</caption>
          <thead>
            <tr><th scope="col">Treatment</th><th scope="col">What is injected or used</th><th scope="col">Typically used for</th><th scope="col">Worth knowing</th></tr>
          </thead>
          <tbody>
            <?php foreach ($comparison as $row): ?>
            <tr>
              <th scope="row" style="color:var(--ink);font-size:15px;font-weight:700;text-transform:none;letter-spacing:0"><?= e($row['name']) ?></th>
              <td><?= e($row['what']) ?></td>
              <td><?= e($row['for']) ?></td>
              <td><?= e($row['note']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="grid grid--2 mt-4">
      <div class="note"><p class="h4">Compare the course, not the session</p><p class="body-s mt-2">A cheap single session inside an expensive course is not a saving. Ask how many sessions the plan calls for, what each includes, and what happens if you do not respond — the questions in <a href="/blog/what-to-ask-before-prp-in-gurgaon">what to ask before paying for PRP in Gurgaon</a>.</p></div>
      <div class="note"><p class="h4">Ask what is in the syringe</p><p class="body-s mt-2">“Mesotherapy” describes a route of delivery, not a formulation, and “exosomes” covers products of very different origin. Two clinics using the same word can be injecting entirely different things. See <a href="/hair-mesotherapy-in-gurgaon">hair mesotherapy</a>.</p></div>
    </div>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'Step by step',
    'title'   => 'Your PRP Journey',
    'id'      => 'journey',
    'intro'   => 'In this order: the investigations come before the injections, not after them.',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                 'title' => 'Consultation and examination',     'text' => 'History, medication and what has already been tried, then pattern, density and miniaturisation assessed under magnification.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned line', 'title' => 'Investigations and a written plan', 'text' => 'Thyroid, iron, vitamin D and platelet count where indicated, then session count, intervals and the full course cost in writing.'],
        ['img' => 'step-procedure',    'alt' => 'sterile instruments laid out on a tray',              'title' => 'Session series',                   'text' => 'The agreed course, at the agreed intervals, with the same protocol each time.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with review dates circled',           'title' => 'Review and maintenance',           'text' => 'Response judged against baseline photographs before anything is repeated.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-skin',
    'alt'     => 'a sculpted cross-section of skin layers with a single hair follicle, set against a pale circle',
    'eyebrow' => 'On the day',
    'title'   => 'How Does a PRP Session Work?',
    'id'      => 'procedure',
    'reverse' => true,
    'html'    => '<p>A walk-in, walk-out appointment, usually 30 to 60 minutes from arrival to leaving. Anything that has changed since the last session — medication, illness, how the scalp responded — is noted first, then a small volume of blood is drawn from the arm and spun with the same settings every time, because consistency is the point.</p>'
               . '<p>Commonly reported afterwards: scalp tenderness for a day or so, redness, pinpoint marks, mild swelling, occasional headache and bruising where the blood was drawn. Infection at an injection site is uncommon but possible, which is why the aftercare instructions matter.</p>'
               . '<p><b>Worth asking any clinic about its protocol:</b> who draws, prepares and injects, by name; whether the preparation is the same at every session; how much area is treated and how it is mapped; whether baseline photographs are taken before session one; and when the review is, and what happens if nothing changed.</p>',
    'points'  => [
        'The treatment area is cleaned, with topical anaesthetic or cooling to reduce the sting',
        'The concentrate is injected at follicular depth across the mapped thinning areas, usually in ten to fifteen minutes',
        'Washing and activity instructions, and your next session booked before you leave',
    ],
]) ?>

<section class="section section--canvas" id="results">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Timeline and the stop rule</p>
      <h2 class="h2 mt-2">How Many Sessions, When Results Show, and When to Stop</h2>
      <p class="body mt-3">General guidance. Your own course is set after the assessment and reviewed against your baseline photographs rather than against a schedule. The last column — the decision at each point — matters most.</p>
    </div>

    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data" style="min-width:760px">
          <caption class="sr-only">Hair PRP course timeline: when each stage happens, what to expect and the decision made at each point</caption>
          <thead><tr><th scope="col">When</th><th scope="col">What happens</th><th scope="col">The decision at this point</th></tr></thead>
          <tbody>
            <?php foreach ($timeline as $t): ?>
            <tr>
              <th scope="row" style="color:var(--ink);font-size:15px;font-weight:700;text-transform:none;letter-spacing:0;white-space:nowrap"><?= e($t['when']) ?></th>
              <td><?= e($t['what']) ?></td>
              <td style="font-weight:600;color:var(--ink)"><?= e($t['decision']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="note mt-4">
      <p class="body-s"><b>The stop rule.</b> If the review after the initial course shows no meaningful change against your baseline photographs, we stop and change the plan rather than sell you more sessions. That is only possible because we do not sell large prepaid packages — see why on the <a href="/prp-hair-treatment-cost-in-gurgaon">PRP cost page</a>.</p>
    </div>

    <div class="split split--sidebar mt-6">
      <div>
        <h3 class="h3">When PRP is not offered, or is deferred</h3>
        <p class="body-s mt-2">Not a complete list — suitability is decided at the consultation.</p>
      </div>
      <div class="grid grid--2">
        <div class="card card--tint"><p class="body-s">Active infection or dermatitis over the injection area</p></div>
        <div class="card card--tint"><p class="body-s">Low platelet counts or a bleeding disorder</p></div>
        <div class="card card--tint"><p class="body-s">Ongoing anticoagulant treatment, until reviewed</p></div>
        <div class="card card--tint"><p class="body-s">Blood cancers and some other active malignancies</p></div>
        <div class="card card--tint"><p class="body-s">Poorly controlled systemic illness</p></div>
        <div class="card card--tint"><p class="body-s">Pregnancy and breastfeeding</p></div>
      </div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'intro-recipient',
    'alt'     => 'a mannequin head seen from the front, with short hair and a planned hairline drawn in pencil',
    'eyebrow' => 'PRP is rarely the whole plan',
    'title'   => 'PRP With Medication, and PRP After a Hair Transplant',
    'id'      => 'combinations',
    'html'    => '<p><b>Alongside minoxidil or finasteride.</b> Prescribed medical therapy acts on the process that drives pattern hair loss and is the most studied option available, though it is not a cure: benefit lasts only while it is taken, and not everyone responds. PRP is supportive, so the two are usually run together, not chosen between — and a PRP course is never a reason to start or stop medication without the prescribing doctor. Both medicines have side-effect profiles worth discussing first; see <a href="/blog/minoxidil-and-finasteride-in-india">minoxidil and finasteride in India</a>.</p>'
               . '<p><b>After a hair transplant.</b> Transplanted follicles keep their donor characteristics; the native hair around them does not, and keeps thinning on its own timetable. PRP is commonly used to support that surrounding hair, with timing decided by the treating doctor once the scalp has healed. Ask which hair a post-transplant course is meant to help, and how that will be measured over the first year — see <a href="/blog/is-a-hair-transplant-permanent">is a hair transplant permanent</a>.</p>',
]) ?>

<?= doctor_block('Consultations and procedures are carried out by registered medical practitioners at the clinic.') ?>

<section class="section section--white" id="evidence">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">What the research says</p>
        <h2 class="h2 mt-2">The Evidence for PRP, Stated Plainly</h2>
        <p class="meta mt-3">Reviewed by <?= e(REVIEWED_BY) ?> · <?= e(REVIEWED_DATE) ?></p>
      </div>
      <div class="stack">
        <p class="body">Reviews of PRP in androgenetic alopecia generally report improvement in hair density or count against baseline or placebo, and consistently flag the same limitations: small trials, short follow-up, and no standard way of preparing PRP. A widely cited <a href="https://pmc.ncbi.nlm.nih.gov/articles/PMC6374694/" rel="noopener nofollow" target="_blank">review of PRP for hair loss</a> describes exactly that — promising results, with preparation methods, activation and session schedules varying from study to study.</p>
        <p class="body">Reference sources place PRP alongside, not above, the established medical treatments: <a href="https://dermnetnz.org/topics/male-pattern-hair-loss" rel="noopener nofollow" target="_blank">DermNet’s overview of male pattern hair loss</a> and the <a href="https://www.nhs.uk/conditions/hair-loss/" rel="noopener nofollow" target="_blank">NHS hair loss guidance</a> are neutral summaries worth reading before any clinic’s brochure.</p>
        <p class="body">What that means in practice: PRP may be considered as an adjunct for the right scalp, it does not cure pattern hair loss, a proportion of people do not respond, and the only reliable way to know which group you are in is to measure. Our longer read, <a href="/blog/does-prp-work-for-hair-loss">does PRP actually work for hair loss</a>, goes through it in detail.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">Hair PRP Treatment Cost in Gurgaon</h2>
        <p class="body mt-3 measure">Advertised prices range widely because a PRP session is not a standard unit. The volume drawn, the preparation method, the area treated and how many sessions are included all differ between clinics — so a per-session price tells you almost nothing on its own.</p>
        <p class="body mt-3 measure">At the typical advertised rate of <?= e(rupees(MARKET_PRP_SESSION_LOW)) ?>–<?= e(rupees(MARKET_PRP_SESSION_HIGH)) ?> a session, a four-session course comes to <?= e(rupees(4 * MARKET_PRP_SESSION_LOW)) ?>–<?= e(rupees(4 * MARKET_PRP_SESSION_HIGH)) ?> before any maintenance. We quote your own course in writing after the assessment.</p>
        <div class="grid grid--2 mt-5">
          <div class="card"><p class="h4">Sessions in the course</p><p class="meta mt-1">Quoted as a course, not drip-fed per visit</p></div>
          <div class="card"><p class="h4">Area treated</p><p class="meta mt-1">A crown patch and a whole scalp are not the same</p></div>
          <div class="card"><p class="h4">Preparation method</p><p class="meta mt-1">Spin protocol and resulting concentration</p></div>
          <div class="card"><p class="h4">Supporting therapy</p><p class="meta mt-1">Medical treatment planned alongside</p></div>
        </div>
        <a class="btn btn--ink mt-4" href="/prp-hair-treatment-cost-in-gurgaon"><?= icon('rupee', 18) ?> PRP cost breakdown</a>
      </div>
      <div class="cta-band" style="display:block">
        <h3 class="h3">Get a Personalised Treatment Estimate</h3>
        <p class="body-s mt-2">Send photos of the parting, crown and hairline on WhatsApp, or request a call back. You will get an assessment — not a package sale.</p>
        <div class="stack-sm mt-4">
          <a class="btn btn--block btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Send photos on WhatsApp</a>
          <a class="btn btn--block btn--ghost" href="/book-consultation" data-book data-treatment="Hair PRP / GFC" data-track="book">Request a call back</a>
        </div>
      </div>
    </div>

    <div class="mt-6" style="max-width:62ch">
      <h3 class="h3">What Gurgaon Clinics Advertise</h3>
      <p class="body-s mt-2">Orientation only — and a reminder to compare what each figure includes.</p>
    </div>
    <?= market_price_table('PRP and related hair treatment prices advertised in Gurgaon, ' . MARKET_PRICES_AS_OF, market_rows('prp'), MARKET_PRICES_AS_OF) ?>
  </div>
</section>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">PRP Treatment in Gurgaon: FAQs</h2>
        <p class="body-s mt-3">General patient education. Anything specific to your scalp or medical history is answered at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= before_after_slider_section() ?>

<?= awards_certificates_section() ?>

<?= local_block(
    'Hair PRP Clinic Near Medanta, Sector 39 Gurugram',
    'Sessions take place at our Sector 39 clinic in Gurugram, ' . NAP_LANDMARK . ', and are carried out by registered medical practitioners. Because a PRP course runs over months, each review compares your photographs against the same baseline.'
) ?>

<?= lp_cta([
    'eyebrow'   => 'Sector 39, Gurugram',
    'title'     => 'Find Out Whether PRP Is Worth Doing for You',
    'text'      => 'You will get a scalp examination, the investigations that matter, and an honest answer about whether PRP is likely to help — including when the answer is that something else should come first.',
    'treatment' => 'Hair PRP / GFC',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
