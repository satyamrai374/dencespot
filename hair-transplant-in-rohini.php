<?php
/**
 * /hair-transplant-in-rohini — Rohini (Delhi) location landing page for Hair Transplant.
 *
 * Fully redesigned landing page structure:
 * - High-converting hero with trust indicators and direct appointment CTAs
 * - 4-point clinic advantages & trust metrics strip
 * - Real clinical case result spotlight
 * - FUE vs DHI comparison cards (clean visual grid)
 * - 4-step clear patient journey (Consultation -> Hairline -> Procedure -> Aftercare)
 * - Norwood stage graft estimation & transparent cost guidance
 * - Delhi recovery practicalities (heat, dust, smog & helmet guidelines)
 * - Curated FAQ accordion matching JSON-LD Schema
 * - Rohini location map, directions, and closing CTA
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Hair Transplant in Rohini'],
];

$stages = [
    [
        'stage'  => 'Norwood II – III',
        'area'   => 'Receding Hairline & Temples',
        'grafts' => '1,200 – 2,000 Grafts',
        'focus'  => 'Rebuilding a sharp, natural frontal frame with dense single-hair placement along the transition zone.',
    ],
    [
        'stage'  => 'Norwood III Vertex – IV',
        'area'   => 'Hairline + Mid-Scalp Thinning',
        'grafts' => '2,000 – 2,800 Grafts',
        'focus'  => 'Restoring the frontal third and blending density into the mid-scalp while conserving donor hair.',
    ],
    [
        'stage'  => 'Norwood V – VI',
        'area'   => 'Extensive Frontal & Crown Loss',
        'grafts' => '2,800 – 3,800 Grafts',
        'focus'  => 'Frontal priority coverage in session one; crown restoration staged according to donor capacity.',
    ],
    [
        'stage'  => 'Norwood VII / Repair',
        'area'   => 'Advanced Loss or Corrective Work',
        'grafts' => '3,500 – 4,500+ Grafts',
        'focus'  => 'Multi-session strategic restoration, soft mature hairline design, and body hair donor supplementation if needed.',
    ],
];

$faqs = [
    [
        'q' => 'Is the hair transplant carried out at the Rohini clinic?',
        'a' => 'Yes. Consultations, hairline design, FUE and DHI hair transplant procedures, and all 12-month follow-up reviews take place at our Rohini clinic in North-West Delhi by registered medical practitioners.',
    ],
    [
        'q' => 'What is the difference between FUE and DHI?',
        'a' => 'Both methods use gentle micro-punch extraction leaving only tiny dot marks that heal rapidly. The difference is in placement: in FUE, recipient incisions are prepared first, which is ideal for covering larger bald areas efficiently. In DHI, each follicle is placed using a specialized implanter pen that controls depth, angle, and direction in one motion — ideal for high-density hairlines and temple peaks.',
    ],
    [
        'q' => 'How much does a hair transplant cost in Rohini?',
        'a' => 'Pricing depends on the number of grafts required, the chosen technique (FUE, DHI, or a hybrid plan), and whether the session is standard or unshaven. You receive a fully transparent, itemized written estimate after your trichoscopy examination with zero hidden theatre or disposable fees. Read our full <a href="/hair-transplant-cost-in-rohini">Rohini hair transplant cost guide</a> for details.',
    ],
    [
        'q' => 'Is 0% EMI available for hair transplant treatments?',
        'a' => 'Yes. Flexible instalment options through trusted third-party healthcare financing partners are available. You can split payments into manageable monthly instalments. Details and tenure options are explained clearly during your consultation.',
    ],
    [
        'q' => 'How many grafts will I need?',
        'a' => 'Graft requirements depend on your bald surface area and your donor area density. For example, early hairline recession (Norwood 2–3) typically needs 1,200–2,000 grafts, while advanced thinning (Norwood 5) may require 2,800–3,500 grafts. You can also test our free <a href="/hair-transplant-graft-calculator">graft calculator</a> for a quick estimate.',
    ],
    [
        'q' => 'Is a hair transplant procedure painful?',
        'a' => 'The procedure is performed under local anaesthesia. You may feel a slight prick during the initial numbing injections; after that, the scalp is completely numb and the procedure is virtually painless. Patients comfortably watch videos, listen to music, or take naps during the day.',
    ],
    [
        'q' => 'How soon can I return to work and daily routine?',
        'a' => 'Most patients resume desk work and light non-strenuous routines within 3 to 4 days. Tiny crusts fall off naturally during the guided wash routine around day 7 to 10. Heavy gym workouts, swimming, and tight helmets should be avoided for 3 to 4 weeks.',
    ],
    [
        'q' => 'Are hair transplant results permanent?',
        'a' => 'Yes. Grafts are harvested from the permanent donor zone (back and sides of the head), which is genetically resistant to DHT (the hormone causing male pattern baldness). These transplanted follicles continue to grow naturally for a lifetime.',
    ],
];

$page = [
    'title'         => 'Hair Transplant in Rohini Delhi: Doctor-Led FUE, DHI & Cost | DenceSpot',
    'description'   => 'Doctor-led hair transplant in Rohini, North-West Delhi. Advanced Micro-FUE & DHI techniques, artistic natural hairlines, transparent graft pricing & EMI.',
    'url'           => '/hair-transplant-in-rohini',
    'crumbs'        => $crumbs,
    'preload_image' => '/assets/img/clinic-front.webp',
    'schema'        => [
        schema_delhi_clinic(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/hair-transplant-in-rohini', [
            'name'              => 'Hair Transplant',
            'alternateName'     => ['FUE Hair Transplant Rohini', 'DHI Hair Transplant Rohini', 'Hair Restoration Delhi'],
            'procedureType'     => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'      => 'Scalp',
            'howPerformed'      => 'Follicular units are individually harvested from the permanent donor scalp with micro-punches (<0.8mm) and artistically implanted into thinning areas using Micro-FUE or DHI implanter pens at natural growth angles. Day-case under local anaesthesia at the Rohini, Delhi clinic.',
            'preparation'       => 'Dermatoscopic evaluation of hair loss pattern and donor density, review of medical history, and personalized hairline marking agreed with the patient before treatment.',
            'followup'          => 'Written aftercare instructions, post-procedure wash kit, and scheduled photographic follow-up reviews at 1, 3, 6, and 12 months at the Rohini clinic.',
            'expectedPrognosis' => 'Transplanted hairs shed temporarily in weeks 2-4 while follicles anchor; healthy new growth begins at 3-4 months with full mature density evaluated at 10-12 months.',
            'location'          => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
            'performer'         => null,
        ]),
        schema_faq('/hair-transplant-in-rohini', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<!-- 1. Hero Section -->
<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Rohini · North-West Delhi</span>
        <h1 class="h1 mt-3">Hair Transplant in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">
          Restore natural density and a youthful hairline with doctor-led Micro-FUE and DHI hair restoration. At our North-West Delhi clinic, every case begins with high-magnification trichoscopy and conservative donor budgeting — no guesswork from photographs and no technician-only surgery.
        </p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Hair transplant" data-track="book">
            <?= icon('calendar', 18) ?> Book Free Consultation
          </a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp">
            <?= icon('whatsapp', 19) ?> WhatsApp Rohini Clinic
          </a>
        </div>

        <div class="mt-5">
          <?= ticks([
              'Micro-FUE & DHI carried out in Rohini',
              'Microscopic donor capacity assessed first',
              'Painless day procedure under local anaesthesia',
              'Complete 12-month review protocol included',
          ]) ?>
        </div>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/clinic-front.webp" alt="DenceSpot Clinic exterior facade in Rohini, Delhi" width="800" height="1000" loading="eager" fetchpriority="high">
        </div>
        <div class="hero__badge-card">
          <p class="eyebrow">Rohini Clinic Contact</p>
          <p class="h4 mt-1"><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></p>
          <p class="meta mt-1"><?= e(HOURS_DISPLAY) ?><span style="display:block"><?= e(HOURS_NOTE) ?></span></p>
          <p class="fine mt-2" style="color:var(--accent-deep);font-weight:600">✓ North-West Delhi (Near Outer Ring Rd)</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 2. Trust Stats & Highlights Strip -->
<section class="trust">
  <div class="wrap">
    <div class="grid grid--4 mt-2">
      <div class="card">
        <?= icon('shield', 24, 'var(--accent-deep)') ?>
        <h3 class="h4 mt-2">Doctor-Led Care</h3>
        <p class="meta mt-1">Consultation, hairline planning and critical surgery steps performed by registered medical doctors.</p>
      </div>
      <div class="card">
        <?= icon('hairline', 24, 'var(--accent-deep)') ?>
        <h3 class="h4 mt-2">Natural Hairline Art</h3>
        <p class="meta mt-1">Single-hair micro-feathering at correct facial angles so nobody can tell you had a transplant.</p>
      </div>
      <div class="card">
        <?= icon('chart', 24, 'var(--accent-deep)') ?>
        <h3 class="h4 mt-2">Donor Preservation</h3>
        <p class="meta mt-1">Safe donor extraction ratio strictly calculated to preserve density for the next 20+ years.</p>
      </div>
      <div class="card">
        <?= icon('check', 24, 'var(--accent-deep)') ?>
        <h3 class="h4 mt-2">Transparent Pricing</h3>
        <p class="meta mt-1">Exact per-graft written estimate with zero hidden theatre fees, plus easy 0% EMI options.</p>
      </div>
    </div>
  </div>
</section>

<!-- 3. Real Patient Results Spotlight -->
<section class="section section--white" id="results">
  <div class="wrap">
    <div class="split split--wide-left">
      <div>
        <p class="eyebrow">Clinical Excellence</p>
        <h2 class="h2 mt-2">Authentic Results, Natural Angles</h2>
        <p class="body mt-3 measure">
          True hair restoration is defined by hairline subtlety: natural irregularity, proper exit angles, and age-appropriate design. Here is a verified transformation demonstrating natural temple alignment and dense frontal coverage.
        </p>

        <div class="note mt-4">
          <h3 class="h4">What Makes DenceSpot Hairlines Undetectable?</h3>
          <p class="body-s mt-2">
            We exclusively place delicate single-hair follicular units along the immediate frontline, followed by robust 2–3 hair units behind it. This recreates the natural visual gradient of non-balding hair.
          </p>
        </div>

        <div class="btn-row mt-4">
          <a class="btn btn--outline" href="/gallery"><?= icon('eye', 17) ?> View Gallery &amp; Transformations</a>
          <a class="btn btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Send Photos on WhatsApp</a>
        </div>
      </div>

      <div>
        <div class="media ratio-1-1 media--shadow">
          <img src="/assets/img/gallery/20210119_153851.jpg" alt="Consented patient before and after hair restoration showing hairline design and dense growth" width="800" height="800" loading="lazy">
        </div>
        <p class="meta mt-2" style="text-align:center">Verified patient transformation · Natural hairline design &amp; dense permanent growth</p>
      </div>
    </div>
  </div>
</section>

<!-- 4. Advanced Techniques: FUE vs DHI -->
<section class="section section--canvas" id="techniques">
  <div class="wrap">
    <div style="max-width:68ch">
      <p class="eyebrow">Advanced Techniques</p>
      <h2 class="h2 mt-2">FUE and DHI Hair Restoration in Rohini</h2>
      <p class="body mt-3">
        Both techniques harvest follicles individually without scalpel incisions or linear stitches. The primary distinction lies in how grafts are placed into the recipient area.
      </p>
    </div>

    <div class="grid grid--2 mt-5">
      <!-- FUE Card -->
      <div class="card card--pad-lg">
        <span class="pill">Proven &amp; Versatile</span>
        <h3 class="h3 mt-3">Micro-FUE (Follicular Unit Extraction)</h3>
        <p class="body-s mt-2">
          Follicular units are gently removed with precision micro-punches (<0.8mm). Microscopic recipient slits are pre-made, and grafts are systematically positioned.
        </p>
        <ul class="ticks mt-4">
          <li class="tick"><?= icon('check', 17) ?><span>Ideal for large areas (2,500 – 4,000+ grafts)</span></li>
          <li class="tick"><?= icon('check', 17) ?><span>Highly cost-effective per graft coverage</span></li>
          <li class="tick"><?= icon('check', 17) ?><span>Pin-point dot healing without linear scars</span></li>
          <li class="tick"><?= icon('check', 17) ?><span>Rapid scalp healing within 5 to 7 days</span></li>
        </ul>
        <div class="mt-4">
          <a class="btn btn--outline btn--sm" href="/fue-hair-transplant-in-rohini">Explore FUE in Rohini <?= icon('arrow', 14) ?></a>
        </div>
      </div>

      <!-- DHI Card -->
      <div class="card card--pad-lg">
        <span class="pill pill--ink">High Precision Implantation</span>
        <h3 class="h3 mt-3">DHI (Direct Hair Implantation)</h3>
        <p class="body-s mt-2">
          Follicles are loaded into specialized implanter pens that pierce the recipient site and insert the graft in a single fluid movement, perfectly controlling angle and depth.
        </p>
        <ul class="ticks mt-4">
          <li class="tick"><?= icon('check', 17) ?><span>Maximum packing density for hairlines &amp; temples</span></li>
          <li class="tick"><?= icon('check', 17) ?><span>Zero prior channel incisions needed</span></li>
          <li class="tick"><?= icon('check', 17) ?><span>Unshaven recipient options for thinning zones</span></li>
          <li class="tick"><?= icon('check', 17) ?><span>Reduced graft handling out of the body</span></li>
        </ul>
        <div class="mt-4">
          <a class="btn btn--outline btn--sm" href="/dhi-hair-transplant-in-rohini">Explore DHI in Rohini <?= icon('arrow', 14) ?></a>
        </div>
      </div>
    </div>

    <!-- Hybrid Note -->
    <div class="note note--tint mt-4">
      <div class="split split--wide-left" style="align-items:center">
        <div>
          <h3 class="h4">The DenceSpot Hybrid Protocol</h3>
          <p class="body-s mt-1">
            Many patients achieve the ultimate result with our combination strategy: DHI precision for the critical front transition zone, paired with efficient FUE placement across the mid-scalp and crown.
          </p>
        </div>
        <div style="text-align:right">
          <a class="btn btn--ink btn--sm" href="/book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Hair transplant">Get Custom Plan</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 5. Step-by-Step Patient Journey -->
<section class="section section--white" id="journey">
  <div class="wrap">
    <div style="max-width:64ch">
      <p class="eyebrow">Your Treatment Path</p>
      <h2 class="h2 mt-2">What to Expect: Step-by-Step Journey</h2>
      <p class="body mt-3">
        From your first diagnostic trichoscopy to the 12-month final review, every stage is structured for comfort, safety, and guaranteed clinical transparency.
      </p>
    </div>

    <div class="grid grid--4 mt-6">
      <div class="card">
        <div class="step-num">01</div>
        <h3 class="h4 mt-3">Scalp Trichoscopy</h3>
        <p class="body-s mt-2">Magnified digital analysis of donor hair thickness, miniaturization rate, and safe lifetime graft reserves.</p>
      </div>

      <div class="card">
        <div class="step-num">02</div>
        <h3 class="h4 mt-3">Hairline Design</h3>
        <p class="body-s mt-2">Drawn directly on your face and adjusted until you approve the shape, temple positions, and natural curvature.</p>
      </div>

      <div class="card">
        <div class="step-num">03</div>
        <h3 class="h4 mt-3">Day-Case Procedure</h3>
        <p class="body-s mt-2">Painless local anaesthetic, gentle micro-punch extraction, and artistic implantation with comfortable rest intervals.</p>
      </div>

      <div class="card">
        <div class="step-num">04</div>
        <h3 class="h4 mt-3">12-Month Reviews</h3>
        <p class="body-s mt-2">Detailed post-op wash kit, first clinical wash support, and photographic follow-ups at 1, 3, 6, and 12 months.</p>
      </div>
    </div>
  </div>
</section>

<!-- 6. Norwood Scale & Graft Estimation -->
<section class="section section--canvas" id="stages">
  <div class="wrap">
    <div class="split split--wide-left">
      <div>
        <p class="eyebrow">Graft Estimation Guide</p>
        <h2 class="h2 mt-2">How Many Grafts Do You Need?</h2>
        <p class="body mt-3 measure">
          Hair restoration is calculated in follicular unit grafts, not individual hairs. The required count depends on your balding surface area and donor density. Below are realistic clinical benchmarks.
        </p>
        <p class="body-s mt-3 measure">
          Need an instant calculation? Use our interactive tool or speak with a doctor.
        </p>
        <div class="btn-row mt-4">
          <a class="btn btn--outline btn--sm" href="/hair-transplant-graft-calculator">Try Online Graft Calculator</a>
          <a class="btn btn--outline btn--sm" href="/hair-transplant-cost-in-rohini">Rohini Cost Breakdown</a>
        </div>
      </div>

      <div class="grid grid--2">
        <?php foreach ($stages as $st): ?>
          <div class="card">
            <span class="pill"><?= e($st['grafts']) ?></span>
            <h3 class="h4 mt-3"><?= e($st['stage']) ?></h3>
            <p class="meta mt-1" style="font-weight:600;color:var(--ink)"><?= e($st['area']) ?></p>
            <p class="body-s mt-2"><?= e($st['focus']) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- 7. Recovery & Delhi Practicalities -->
<section class="section section--white" id="recovery">
  <div class="wrap">
    <div style="max-width:64ch">
      <p class="eyebrow">Aftercare Protocol</p>
      <h2 class="h2 mt-2">Recovery &amp; Practical Care in Delhi</h2>
      <p class="body mt-3">
        Grafts firmly anchor within the first 10 days. Follow these practical post-op recommendations tailored for Delhi’s climate and lifestyle.
      </p>
    </div>

    <div class="grid grid--4 mt-6">
      <div class="card">
        <h3 class="h4">Days 1 – 7: Saline &amp; Wash</h3>
        <p class="body-s mt-2">Spritz with medical saline spray. Perform gentle cup-washes as demonstrated at the clinic. Do not rub or pick at crusts.</p>
      </div>

      <div class="card">
        <h3 class="h4">Delhi Sun &amp; Heat</h3>
        <p class="body-s mt-2">Avoid heavy sweating and direct peak sunlight during the first two weeks. Wear loose-fitting, breathable caps once cleared.</p>
      </div>

      <div class="card">
        <h3 class="h4">Two-Wheelers &amp; Helmets</h3>
        <p class="body-s mt-2">Travel home by cab or car on procedure day. Avoid tight motorcycle helmets for 3 to 4 weeks to prevent graft friction.</p>
      </div>

      <div class="card">
        <h3 class="h4">Office &amp; Exercise</h3>
        <p class="body-s mt-2">Resume office desk duties within 3 to 4 days. Light cardio at 2 weeks; full gym workouts and swimming after 4 weeks.</p>
      </div>
    </div>
  </div>
</section>

<!-- 8. Curated FAQs Accordion -->
<section class="section section--canvas" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">Frequently Asked Questions</p>
        <h2 class="h2 mt-2">Everything You Need to Know</h2>
        <p class="body-s mt-3">
          Have specific questions about your hairline, medical history, or budget? Message our medical team directly.
        </p>
        <div class="mt-4">
          <a class="btn btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp">
            <?= icon('whatsapp', 18) ?> Ask on WhatsApp
          </a>
        </div>
      </div>

      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<!-- 9. Rohini Clinic Location & Embedded Map -->
<?= local_block(
    'Our Hair Transplant Clinic in Rohini',
    'Consultations, trichoscopy diagnostics, surgical procedures, and follow-up reviews all take place at our Rohini clinic in North-West Delhi.'
) ?>

<!-- 10. Other Rohini Treatments -->
<?= rohini_services_block($page['url']) ?>

<!-- 11. Final High-Converting CTA Banner -->
<?= lp_cta([
    'eyebrow'   => 'Rohini, Delhi',
    'title'     => 'Book Your Hair Transplant Consultation in Rohini',
    'text'      => 'Meet our medical doctors in person. Receive a comprehensive donor evaluation, personalized hairline drawing, and an honest written estimate with zero obligation to book surgery on the day.',
    'treatment' => 'Hair transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
