<?php
/**
 * /hair-prp-treatment-in-gurgaon — page #29, PRP hub.
 *
 * Ported from the design build. The two design exports disagreed on the
 * doctor's qualifications; that was resolved with the clinic and the answer
 * now lives in config.php alone. No page restates a credential.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$comparison = [
    ['name' => 'Hair PRP', 'what' => 'Your own platelet-rich plasma, spun from your blood on the day.', 'for' => 'Early to moderate pattern loss, diffuse thinning, support around a transplant.', 'note' => 'Autologous, so no donor material. Results depend heavily on the preparation protocol and need maintenance.'],
    ['name' => 'GFC', 'what' => 'Growth factor concentrate — platelets are broken down so the growth factors are released, then the cells are removed.', 'for' => 'The same indications as PRP; marketed as a more refined version of it.', 'note' => 'Also made from your blood, using a kit. The published evidence base is smaller and newer than for PRP.'],
    ['name' => 'Mesotherapy', 'what' => 'A manufactured cocktail of vitamins, peptides or medication — not made from your blood.', 'for' => 'Scalp nourishment protocols, often sold bundled with other treatments.', 'note' => 'Formulations vary widely between clinics, so ask exactly what is in the syringe.'],
    ['name' => 'Medical therapy', 'what' => 'Prescribed topical or oral hair-loss medication, taken daily at home.', 'for' => 'The long-term backbone of treating pattern hair loss at any stage.', 'note' => 'Best-established evidence of the four. PRP usually runs alongside it rather than instead of it.'],
    ['name' => 'Hair transplant', 'what' => 'Your own follicles, moved surgically from the donor area into thinning zones.', 'for' => 'Areas where follicles are already lost and no injection can bring them back.', 'note' => 'A different category of treatment entirely.'],
];

$faqs = [
    ['q' => 'What is hair PRP treatment?',
     'a' => 'A treatment in which a small volume of your own blood is spun in a centrifuge to concentrate the platelets, and that platelet-rich plasma is injected into the thinning areas of your scalp. The aim is to support follicles that are miniaturising, using growth factors your own platelets carry.'],
    ['q' => 'Does PRP actually work for hair loss?',
     'a' => 'For the right case — early to moderate pattern loss with follicles still present — there is reasonable evidence that PRP can reduce shedding and improve density. The evidence is not uniform, because protocols differ so much between clinics, and a proportion of patients do not respond — which is why the <a href="https://www.nhs.uk/symptoms/hair-loss/" rel="noopener nofollow" target="_blank">NHS guidance on hair loss treatments</a> is worth reading alongside anything a clinic tells you. It works best as part of a plan alongside medical treatment, not as a substitute for one.'],
    ['q' => 'How many PRP sessions will I need?',
     'a' => 'Most initial courses are planned as three or four sessions about four weeks apart, sometimes more where a larger area is being treated. Maintenance sessions are then commonly spaced every three to six months. Your own number is set after the assessment and confirmed in writing before the first session.'],
    ['q' => 'Is PRP painful?',
     'a' => 'It is uncomfortable rather than painful for most people. The blood draw feels like any blood test; the scalp injections sting briefly, and topical anaesthetic or cooling is used to reduce that. The scalp usually feels tender for a day or so afterwards. Pain tolerance varies.'],
    ['q' => 'How long does one session take?',
     'a' => 'Roughly 30 to 60 minutes from arrival to leaving. Most of that is the blood draw, the spin and preparing the scalp; the injections themselves usually take ten to fifteen minutes. It is a walk-in, walk-out appointment.'],
    ['q' => 'When will I see results from PRP?',
     'a' => 'Reduced shedding is usually the first change people notice, often around six to ten weeks. Changes in texture and density, where they occur, are generally assessed from three to six months against your baseline photographs. Nothing meaningful can be judged after a single session.'],
    ['q' => 'Is PRP permanent, or do I need to keep going?',
     'a' => 'It is not permanent. PRP does not stop the underlying process causing pattern hair loss, so a result is held with maintenance sessions and, in most cases, ongoing medical treatment. If you stop everything, thinning resumes from where it had reached.'],
    ['q' => 'What is the difference between PRP and GFC?',
     'a' => 'Both start from your own blood. PRP injects the platelet-rich plasma itself. GFC breaks the platelets down first so the growth factors are released, then removes the cells, leaving an acellular concentrate. GFC is marketed as a refinement of PRP; its published evidence base is smaller and newer. Neither is automatically the better choice for a given scalp. See our PRP vs GFC comparison.'],
    ['q' => 'Can PRP regrow hair on a completely bald area?',
     'a' => 'No. PRP acts on follicles that still exist. Where the scalp is fully bald and smooth, or scarred, the follicles are gone and there is nothing for the treatment to support. Those areas are a <a href="/hair-transplant-in-gurgaon">hair transplant</a> question, not a PRP question.'],
    ['q' => 'Is PRP safe? What are the side effects?',
     'a' => 'Because the injected material is made from your own blood, a reaction to the material itself is not expected. The usual effects come from the needles: tenderness, redness, pinpoint marks, mild swelling, occasional headache and bruising at the arm. Infection at an injection site is uncommon but possible, which is why sterile technique and aftercare instructions matter.'],
    ['q' => 'Who should not have PRP?',
     'a' => 'Treatment is usually not offered, or is deferred, with active infection or dermatitis over the injection area, low platelet counts or bleeding disorders, ongoing anticoagulant treatment until reviewed, blood cancers and some other active malignancies, poorly controlled systemic illness, and in pregnancy and breastfeeding. This is not a complete list — suitability is decided at the consultation.'],
    ['q' => 'Can PRP be done after a hair transplant?',
     'a' => 'It is commonly used to support the native hair around a transplanted area, which keeps thinning on its own timetable after surgery. Timing relative to the procedure is decided by the treating doctor, since the scalp needs to have healed first.'],
    ['q' => 'Can women have PRP for hair loss?',
     'a' => 'Yes, and female pattern thinning is one of the more common reasons patients come for it. The order matters, though: thyroid function, iron stores, vitamin D and hormonal causes are checked and treated first, because a proportion of female shedding improves once those are corrected without any injections at all. See <a href="/hair-fall-treatment-in-gurgaon">women’s hair loss treatment</a>.'],
    ['q' => 'Do I need to stop my hair-loss medication during PRP?',
     'a' => 'Usually not — prescribed medical therapy generally continues alongside a PRP course, because the two do different jobs. What does need reviewing before a session is anything affecting clotting, including blood thinners and regular anti-inflammatory painkillers. Bring your full medication list.'],
    ['q' => 'How much does hair PRP treatment cost in Gurgaon?',
     'a' => 'Advertised prices in Gurgaon range widely, because a session is not a standard unit — the volume drawn, the preparation method, the area treated and the number of sessions included all differ. Compare on the course, not the session, and ask what happens if you do not respond. Our pricing is confirmed in writing after the assessment, and our <a href="/hair-transplant-cost-in-gurgaon">guide to how treatment is priced</a> explains what moves the number.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Treatments', 'url' => '/hair-transplant-in-gurgaon'],
    ['name' => 'Hair PRP treatment in Gurgaon'],
];

$page = [
    'title'       => 'Hair PRP Treatment in Gurgaon | DenceSpot Clinic',
    'description' => 'Hair PRP treatment in Gurgaon by Dr. Nyra. A planned course of sessions for early thinning, or alongside a transplant. Sector 39, Gurugram.',
    'url'         => '/hair-prp-treatment-in-gurgaon',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_therapy('/hair-prp-treatment-in-gurgaon', [
            'name'          => 'Hair PRP Treatment',
            'alternateName' => ['Platelet-rich plasma therapy for hair', 'PRP hair treatment'],
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'A small volume of the patient\'s blood is drawn and centrifuged to concentrate the platelet fraction. The resulting platelet-rich plasma is injected into the scalp at follicular depth across the thinning areas, typically as a course of three to four sessions about four weeks apart.',
            'preparation'   => 'Clinical assessment and scalp examination, review of medical history and medication including anticoagulants, and blood investigations where indicated to identify reversible causes of hair loss before treatment begins.',
            'followup'      => 'Baseline and interval photography, review of response at three to six months, and maintenance sessions where appropriate alongside ongoing medical therapy.',
            'expectedPrognosis' => 'Reduced shedding is commonly the first observed change, often around six to ten weeks. Density and texture changes, where they occur, are assessed from three to six months. PRP does not halt the underlying process of pattern hair loss and results require maintenance. A proportion of patients do not respond.',
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
        <h1 class="h1 mt-3">Hair PRP Treatment in Gurgaon for Early Thinning and Increased Shedding</h1>
        <p class="lead mt-3 measure">PRP concentrates the platelets from your own blood and injects them into thinning areas of the scalp, to support follicles that are shrinking but still alive. It is one part of a plan, not the whole plan — which is why the cause of your hair loss is investigated before a single session is booked.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Cause investigated before the first session',
            'One consistent preparation protocol',
            'The whole course quoted, not per session',
            'Performed by the doctor, not delegated',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow"><img src="/assets/img/clinic-equipment.jpg" alt="Motorised follicular-unit extraction handpiece and trolley unit at DenceSpot Clinic, Gurugram" width="800" height="1000" loading="eager"></div>
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
    <div class="grid grid--5">
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Diagnosis first</p><p class="meta mt-1">Reversible causes ruled out before injections.</p></div>
      <div class="card"><?= icon('settings', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">One protocol</p><p class="meta mt-1">Same spin, same volume, every session.</p></div>
      <div class="card"><?= icon('doc', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Course quoted upfront</p><p class="meta mt-1">You know the full cost before session one.</p></div>
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Photographs, not impressions</p><p class="meta mt-1">Baseline and interval images at fixed settings.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Doctor-performed</p><p class="meta mt-1">Not handed to a technician after consultation.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="what-is">
  <div class="wrap">
    <div class="split split--wide-left">
      <div>
        <p class="eyebrow">The basics, plainly</p>
        <h2 class="h2 mt-2">What Is Hair PRP Treatment?</h2>
        <div class="stack mt-4 measure">
          <p class="body-l">PRP stands for platelet-rich plasma. A small volume of blood is drawn from your arm, exactly as it would be for a routine blood test, and spun in a centrifuge. Spinning separates the blood into layers, and we keep the plasma fraction in which the platelets are concentrated.</p>
          <p class="body-l">That concentrate is injected into the scalp at the depth where hair follicles sit, across the areas that are thinning. Platelets carry growth factors — signalling proteins the body normally uses for repair. The working principle in hair loss is that delivering them around miniaturising follicles helps hold those follicles in their growth phase for longer and improves the blood supply feeding them.</p>
          <p class="body-l">Two things follow from that, and both matter more than any marketing claim. First, PRP acts on follicles that are still alive but shrinking; where a follicle is gone — a fully bald, shiny scalp, or scarred skin — there is nothing left for it to act on. Second, it does not switch off the process driving the hair loss, so a result is maintained rather than banked.</p>
          <p class="body-l">It is also honest to say that the published evidence for PRP in pattern hair loss is supportive but uneven, largely because protocols differ so much between clinics: how the blood is spun, how concentrated the result is, how much is injected and how often. We treat PRP as one part of a plan, not the whole plan.</p>
        </div>
      </div>
      <div class="stack">
        <div class="media ratio-4-3 media--shadow"><img src="/assets/img/dr-nayra.webp" alt="Dr. Nyra, MBBS, MD (Dermatology), hair restoration doctor at DenceSpot Clinic, Sector 39 Gurugram" width="800" height="600" loading="lazy"></div>
        <div class="card">
          <p class="eyebrow" style="color:var(--ink-muted)">In one line</p>
          <p class="body mt-2">PRP supports follicles that are thinning but still alive. It does not create follicles where they no longer exist — which is the line between a PRP case and a transplant case.</p>
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
        <h2 class="h2 mt-2">Who May Consider Hair PRP?</h2>
        <p class="body mt-3">PRP suits scalps where follicles are still present and struggling. Suitability, and whether anything else should be treated first, is decided after examination.</p>
        <a class="btn btn--ink mt-4" href="/book-consultation">Book an assessment</a>
      </div>
      <div class="grid grid--2">
        <div class="card"><?= icon('hairline', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Early pattern hair loss</h3><p class="body-s mt-2">Thinning that has started but where follicles are still visibly present — the stage at which supporting them is most likely to be worth doing.</p></div>
        <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Diffuse thinning in women</h3><p class="body-s mt-2">A widening parting or overall loss of volume, once thyroid, iron, vitamin D and hormonal causes have been checked and treated.</p></div>
        <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Increased shedding</h3><p class="body-s mt-2">Noticeably more hair coming out than usual, where the cause has been identified and shedding needs settling.</p></div>
        <div class="card"><?= icon('settings', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Alongside a transplant</h3><p class="body-s mt-2">Supporting the native hair around a grafted area, which continues thinning on its own timetable after surgery.</p></div>
        <div class="card"><?= icon('shield', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">When medication is not an option</h3><p class="body-s mt-2">Where standard medical therapy is not tolerated, is contraindicated, or is being avoided for a specific reason.</p></div>
        <div class="card"><?= icon('clock', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Not ready for surgery</h3><p class="body-s mt-2">Where a transplant may eventually make sense but the pattern has not settled, or you would rather hold what you have for now.</p></div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="compare">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Straight comparison</p>
      <h2 class="h2 mt-2">PRP, GFC, Mesotherapy and Medication — What Is Actually Different</h2>
      <p class="body mt-3">These four get sold interchangeably, and they are not interchangeable. This is what is in each syringe and what each is realistically for.</p>
    </div>

    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data" style="min-width:840px">
          <caption class="sr-only">Comparison of PRP, GFC, mesotherapy, medical therapy and hair transplant</caption>
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
      <div class="note"><p class="h4">Compare the course, not the session</p><p class="body-s mt-2">A cheap single session inside an expensive course is not a saving. Ask how many sessions the plan calls for, what each includes, and what happens if you do not respond.</p></div>
      <div class="note"><p class="h4">Ask what is in the syringe</p><p class="body-s mt-2">“Mesotherapy” describes a route of delivery, not a formulation. Two clinics using the word can be injecting entirely different things.</p></div>
    </div>
  </div>
</section>

<section class="section section--ink" id="journey">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Step by step</p>
      <h2 class="h2 mt-2">Your PRP Journey</h2>
      <p class="body-l mt-3">Six stages, in this order. The investigations come before the injections, not after them.</p>
    </div>
    <div class="journey mt-6" style="grid-template-columns:repeat(auto-fit,minmax(180px,1fr))">
      <div class="card card--ink"><span class="journey__num">01</span><p class="h4 mt-1" style="color:#fff">Consultation</p><p class="meta mt-2">History, medication, and what has already been tried.</p></div>
      <div class="card card--ink"><span class="journey__num">02</span><p class="h4 mt-1" style="color:#fff">Scalp examination</p><p class="meta mt-2">Pattern, density and miniaturisation assessed under magnification.</p></div>
      <div class="card card--ink"><span class="journey__num">03</span><p class="h4 mt-1" style="color:#fff">Blood investigations</p><p class="meta mt-2">Thyroid, iron, vitamin D and platelet count where indicated.</p></div>
      <div class="card card--ink"><span class="journey__num">04</span><p class="h4 mt-1" style="color:#fff">Plan and consent</p><p class="meta mt-2">Session count, intervals and full course cost, in writing.</p></div>
      <div class="card card--ink"><span class="journey__num">05</span><p class="h4 mt-1" style="color:#fff">Session series</p><p class="meta mt-2">The agreed course, at the agreed intervals, same protocol each time.</p></div>
      <div class="card card--ink"><span class="journey__num">06</span><p class="h4 mt-1" style="color:#fff">Review and maintenance</p><p class="meta mt-2">Response judged against baseline photographs before anything is repeated.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="procedure">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">On the day</p>
      <h2 class="h2 mt-2">How Does a PRP Session Work?</h2>
      <p class="body mt-3">A walk-in, walk-out appointment, usually 30 to 60 minutes from arrival to leaving.</p>
    </div>
    <div class="split split--wide-left mt-6" style="align-items:start">
      <div class="stack-sm">
        <div class="step"><span class="step-num">1</span><div><h3 class="h3">Check-in and review</h3><p class="body-s mt-2">Anything that has changed since the last session is noted — medication, illness, how the scalp responded.</p></div></div>
        <div class="step"><span class="step-num">2</span><div><h3 class="h3">Blood draw</h3><p class="body-s mt-2">A small volume from the arm, exactly as for a routine blood test.</p></div></div>
        <div class="step"><span class="step-num">3</span><div><h3 class="h3">Centrifugation</h3><p class="body-s mt-2">The sample is spun to separate the layers and the platelet-rich fraction is drawn off. Same spin settings every time — consistency is the point.</p></div></div>
        <div class="step"><span class="step-num">4</span><div><h3 class="h3">Scalp preparation</h3><p class="body-s mt-2">The treatment area is cleaned and topical anaesthetic or cooling applied to reduce the sting.</p></div></div>
        <div class="step"><span class="step-num">5</span><div><h3 class="h3">Injection</h3><p class="body-s mt-2">The concentrate is injected at follicular depth across the mapped thinning areas — usually ten to fifteen minutes.</p></div></div>
        <div class="step"><span class="step-num">6</span><div><h3 class="h3">Aftercare and next date</h3><p class="body-s mt-2">Washing and activity instructions, and your next session booked before you leave.</p></div></div>
      </div>
      <div class="stack">
        <div class="media ratio-4-3 media--shadow"><img src="/assets/img/clinic-facade.jpg" alt="DenceSpot Clinic shopfront on Sector 39 Road, Jharsa, Gurugram, showing the hair transplant and PRP treatment signage" width="800" height="600" loading="lazy"></div>
        <div class="card">
          <p class="eyebrow" style="color:var(--ink-muted)">Commonly reported afterwards</p>
          <p class="body-s mt-2">Scalp tenderness for a day or so, redness, pinpoint marks, mild swelling, occasional headache, and bruising where the blood was drawn. Infection at an injection site is uncommon but possible — which is why the aftercare instructions matter.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="results">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Timeline</p>
      <h2 class="h2 mt-2">How Many Sessions, and When Results Show</h2>
      <p class="body mt-3">General guidance. Your own course is set after the assessment and reviewed against your baseline photographs rather than against a schedule.</p>
    </div>
    <div class="grid grid--4 mt-6">
      <div class="card"><span class="pill">Stage 1</span><h3 class="h4 mt-3">The initial course</h3><p class="body-s mt-2">Commonly three or four sessions about four weeks apart, sometimes more where a larger area is treated.</p></div>
      <div class="card"><span class="pill">Stage 2</span><h3 class="h4 mt-3">Shedding settles first</h3><p class="body-s mt-2">Reduced shedding is usually the first change noticed, often around six to ten weeks. Nothing meaningful can be judged after one session.</p></div>
      <div class="card"><span class="pill">Stage 3</span><h3 class="h4 mt-3">Texture and density</h3><p class="body-s mt-2">Where they change, these are assessed from three to six months against baseline photographs — not from memory.</p></div>
      <div class="card"><span class="pill pill--ink">Stage 4</span><h3 class="h4 mt-3">Maintenance</h3><p class="body-s mt-2">Commonly every three to six months. PRP does not stop the underlying process, so a result is held rather than banked.</p></div>
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

<?= doctor_block('Why the investigation comes first: a proportion of shedding — particularly in women — improves once thyroid function, iron stores or vitamin D are corrected, with no injections at all. A clinic that books a PRP course before checking those is selling sessions, not treating hair loss.') ?>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">Hair PRP Treatment Cost in Gurgaon</h2>
        <p class="body mt-3 measure">Advertised prices range widely because a PRP session is not a standard unit. The volume drawn, the preparation method, the area treated and how many sessions are included all differ between clinics — so a per-session price tells you almost nothing on its own.</p>
        <div class="grid grid--2 mt-5">
          <div class="card"><p class="h4">Sessions in the course</p><p class="meta mt-1">Quoted as a course, not drip-fed per visit</p></div>
          <div class="card"><p class="h4">Area treated</p><p class="meta mt-1">A crown patch and a whole scalp are not the same</p></div>
          <div class="card"><p class="h4">Preparation method</p><p class="meta mt-1">Spin protocol and resulting concentration</p></div>
          <div class="card"><p class="h4">Supporting therapy</p><p class="meta mt-1">Medical treatment planned alongside</p></div>
        </div>
        <a class="btn btn--ink mt-4" href="/hair-transplant-cost-in-gurgaon"><?= icon('rupee', 18) ?> How our pricing works</a>
      </div>
      <div class="cta-band" style="display:block">
        <h3 class="h3" style="color:#fff">Get a Personalized Treatment Estimate</h3>
        <p class="body-s mt-2" style="color:rgba(255,255,255,.7)">Send photos of the parting, crown and hairline on WhatsApp, or request a call back. You will get an assessment — not a package sale.</p>
        <div class="stack-sm mt-4">
          <a class="btn btn--block btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Send photos on WhatsApp</a>
          <a class="btn btn--block btn--ghost" href="/book-consultation">Request an estimate by form</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Hair PRP FAQs</h2>
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
    'Hair PRP Clinic Serving Gurgaon',
    'Sessions take place at our Sector 39 clinic in Gurugram, performed by the doctor who assessed you. Because a PRP course runs over months, keeping every session and review with the same clinician is what makes the response readable at all.'
) ?>

<?= cta_band(
    'Find Out Whether PRP Is Worth Doing for You',
    'You will get a scalp examination, the investigations that matter, and an honest answer about whether PRP is likely to help — including when the answer is that something else should come first.',
    'hair-prp-hub',
    ['Hair PRP treatment', 'GFC therapy', 'Women’s hair loss', 'Hair fall treatment', 'Not sure — please advise']
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
