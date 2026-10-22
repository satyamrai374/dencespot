<?php
/**
 * /beard-transplant-cost-gurgaon
 *
 * Cost spoke. Sits between /beard-transplant-gurgaon (the procedure page) and
 * /hair-transplant-cost-in-gurgaon (the pricing hub).
 *
 * Cannibalisation split, which matters because all three could easily collide:
 *   - the procedure page owns "beard transplant in Gurgaon" — what it is,
 *     candidacy, technique, recovery. Its cost section is a short summary that
 *     links here.
 *   - the cost hub owns how the clinic prices work generally, EMI, and what an
 *     estimate includes across every procedure.
 *   - THIS page owns the beard-specific cost question: why beard grafts are
 *     counted differently from scalp grafts, zone-by-zone graft drivers, and
 *     how to read a competing beard quote.
 *
 * No prices are published. The clinic quotes after assessment, and inventing a
 * range here would contradict every other page and mislead on a YMYL topic.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'How much does a beard transplant cost in Gurgaon?',
     'a' => 'There is no single figure, because a beard transplant is not a single procedure. Filling two patchy cheeks and reconstructing a full beard from almost no growth differ by a large multiple in graft numbers. Cost follows the graft count in your mapped design, so we quote after assessment and give it to you itemised in writing.'],
    ['q' => 'Why will not you publish a starting price?',
     'a' => 'Because a starting price is only ever true for the smallest possible case, and it sets an expectation that has to be corrected later. The number that matters is your number, and it comes from the zones being treated and the design agreed with you. We would rather have that conversation before you visit than after.'],
    ['q' => 'What decides the cost of a beard transplant?',
     'a' => 'Mainly the graft count, which follows from which zones are being treated and how much native growth is already there. After that: whether one technique or two are used across different zones, whether there is scar tissue involved, whether the plan is staged, and any supporting treatment.'],
    ['q' => 'Which beard zones cost the most?',
     'a' => 'It scales with area and with how much has to be built from nothing. Cheeks are typically the largest area and the most graft-hungry when there is little existing growth. A moustache or a chin patch is a smaller, more contained job. Sideburns and jawline definition vary widely depending on what is already there.'],
    ['q' => 'Is a beard transplant more expensive than a scalp transplant?',
     'a' => 'Per graft the rate is broadly comparable, but the counts are not, so the totals are not either. Beard work is also slower per graft, because placement has to follow facial hair angles that are more acute and more variable than scalp angles. Comparing the two on headline totals is not meaningful.'],
    ['q' => 'Can I compare beard quotes on price per graft?',
     'a' => 'Only if the graft numbers were arrived at the same way, which they usually are not. A low per-graft rate applied to an inflated count costs more than an honest quote, and you pay for it twice — once in money and once in donor hair, which is finite. Ask how the number was reached before comparing rates.'],
    ['q' => 'What should be included in a beard transplant estimate?',
     'a' => 'The graft count and the zones it covers, the technique, anaesthesia, medication, dressings, and the scheduled follow-up reviews. Ask specifically what is excluded, because that is where quotes diverge. Ours is given itemised in writing before any date is booked.'],
    ['q' => 'Will I need a second session, and does that cost more?',
     'a' => 'Some beard plans are deliberately staged, particularly where a large area is being built from very little growth or where scar tissue is involved. Where a second stage is likely, you are told before the first one and it is costed then rather than raised afterwards.'],
    ['q' => 'Are EMI or payment plans available?',
     'a' => 'Payment options are set out on our <a href="/cost-and-emi-options">cost and EMI options</a> page. What is available to you is confirmed at consultation along with the written estimate.'],
    ['q' => 'Does a cheaper beard transplant mean a worse result?',
     'a' => 'Not automatically, and price alone is a poor proxy for quality. What matters is who performs the procedure, how the graft number was decided, whether the donor was measured, and what the follow-up looks like. A low price attached to an unexamined graft count is the combination to be careful of.'],
    ['q' => 'Does the cost include the consultation?',
     'a' => 'What is included is set out in your written estimate. Bring your questions to the consultation itself, since that is where the plan and the number are actually established.'],
    ['q' => 'Does the price change if I want a different beard shape?',
     'a' => 'Shape changes the graft count, and the graft count changes the price. A denser, more defined beard needs more grafts than a light filling-in of patches. The design is agreed with you before the number is finalised, so the two move together.'],
    ['q' => 'Is a beard transplant permanent, and does that justify the cost?',
     'a' => 'Transplanted follicles keep donor characteristics and generally persist, and beard hair from the scalp keeps growing, so it needs trimming and shaping like the rest of your beard. Whether that justifies the cost is your judgement. What we can do is make sure the number reflects a plan rather than a package.'],
    ['q' => 'What happens at the consultation?',
     'a' => 'Assessment of your existing growth and the zones you want treated, examination of the donor area with density measurement, a design agreed with you, and then a graft count and an itemised written estimate. See the <a href="/beard-transplant-gurgaon">beard transplant page</a> for what the procedure involves.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Beard transplant', 'url' => '/beard-transplant-gurgaon'],
    ['name' => 'Beard transplant cost in Gurgaon'],
];

$page = [
    'title'       => 'Beard Transplant Cost in Gurgaon | DenceSpot',
    'description' => 'What actually decides beard transplant cost in Gurgaon: zones treated, graft count and existing growth. How to read a quote, and why we price after assessment.',
    'url'         => '/beard-transplant-cost-gurgaon',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_faq('/beard-transplant-cost-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Beard transplant cost in Gurgaon</span>
        <h1 class="h1 mt-3">What Actually Decides the Cost of a Beard Transplant</h1>
        <p class="lead mt-3 measure">We do not publish a starting price, and this page explains why that is the useful answer rather than an evasive one. What we do publish is every factor that moves your number, and how to tell an honest beard quote from a cheap one that costs more.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-track="book"><?= icon('calendar', 18) ?> Get a Written Estimate</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Send Photos on WhatsApp</a>
        </div>

        <?= ticks([
            'Itemised estimate in writing before booking',
            'Graft count from a mapped design, not a package',
            'Staging costed upfront, not raised later',
            NAP_LOCALITY . ' · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow"><img src="/assets/img/clinic-equipment.jpg" alt="Consultation and assessment setup where beard transplant estimates are prepared at DenceSpot Clinic, Gurugram" width="800" height="1000" loading="eager"></div>
        <div class="hero__badge-card">
          <p class="eyebrow">Assessed &amp; performed by</p>
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
      <div class="card"><?= icon('rupee', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Priced after assessment</p><p class="body-s mt-2">A number that reflects your face, not an average.</p></div>
      <div class="card"><?= icon('doc', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Itemised in writing</p><p class="body-s mt-2">You see what is included before you decide.</p></div>
      <div class="card"><?= icon('pencil', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Design first, count second</p><p class="body-s mt-2">The graft number follows the shape you agreed.</p></div>
      <div class="card"><?= icon('list', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Staging declared upfront</p><p class="body-s mt-2">A likely second session is costed at the start.</p></div>
      <div class="card"><?= icon('shield', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">No inflated counts</p><p class="body-s mt-2">Donor supply is finite and is not padded to bill.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="why-no-price">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">The starting point</p>
        <h2 class="h2 mt-2">Why There Is No Single Beard Transplant Price</h2>
        <p class="body-l mt-3 measure">A beard transplant is not one procedure. Filling two patchy areas on the cheeks of a man who already has reasonable growth, and building a full beard for someone with almost none, are separated by a large multiple in graft numbers. Publishing one price for both would be meaningless.</p>
        <p class="body-l mt-3 measure">The variable that actually drives cost is the graft count, and the graft count comes out of two things: which zones you want treated, and how much native hair is already growing in them. Both of those are established by looking at your face, which is why the estimate follows the consultation rather than preceding it.</p>
        <p class="body-l mt-3 measure">A published starting price is only ever true for the smallest case a clinic will accept. It brings people in expecting a number that does not apply to them, and the correction happens after they have committed time and hope to the visit. We would rather set the expectation properly here.</p>
        <p class="body mt-3 measure">For what the procedure itself involves, see the <a href="/beard-transplant-gurgaon">beard transplant page</a>. For how pricing works across all our procedures, see the <a href="/hair-transplant-cost-in-gurgaon">hair transplant cost guide</a>.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow">What you get instead</p>
        <h3 class="h3 mt-2">An itemised written estimate</h3>
        <p class="body mt-3">After assessment, you receive a written estimate that states the zones being treated, the graft count for each, the technique, and what the figure covers.</p>
        <p class="body mt-3">If a second stage is likely, that is stated and costed at the same time rather than introduced once you are already committed.</p>
        <p class="body mt-3">You take it away. There is no expectation that you book on the day.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="drivers">
  <div class="wrap">
    <p class="eyebrow">Cost drivers</p>
    <h2 class="h2 mt-2">The Six Things That Move Your Number</h2>
    <p class="body-l mt-3 measure">In rough order of how much they matter.</p>
    <div class="grid grid--3 mt-5">
      <div class="card"><p class="h4">Zones treated</p><p class="body-s mt-2">Cheeks, jawline, moustache, chin and sideburns are separate areas with separate graft requirements. Treating one is a different job from treating all five.</p></div>
      <div class="card"><p class="h4">Existing growth</p><p class="body-s mt-2">Thickening a beard that already grows patchily needs far fewer grafts than building density where almost nothing grows. This is often the largest single difference between two quotes.</p></div>
      <div class="card"><p class="h4">Density you want</p><p class="body-s mt-2">A light, natural filling-in and a full, dense beard are different graft counts for the same area. This is agreed as part of the design.</p></div>
      <div class="card"><p class="h4">Technique used</p><p class="body-s mt-2">Some plans use one method throughout, others use different placement approaches across different zones. It affects the time the procedure takes.</p></div>
      <div class="card"><p class="h4">Complexity</p><p class="body-s mt-2">Scar tissue from injury, acne scarring, cleft repair or previous work makes placement slower and less predictable, and sometimes requires staging.</p></div>
      <div class="card"><p class="h4">Supporting treatment</p><p class="body-s mt-2">Any medical treatment planned alongside the surgery is costed separately and stated on the estimate.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="zones">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Zone by zone</p>
        <h2 class="h2 mt-2">Where the Grafts Actually Go</h2>
        <p class="body-l mt-3 measure">Graft requirements scale with area and with how much has to be built from nothing. These are the relative demands rather than fixed numbers, because your existing growth changes all of them.</p>
        <p class="body-l mt-3 measure"><strong>Cheeks</strong> are usually the largest area and the most graft-hungry, particularly where growth is sparse or absent. This is where most of a full beard plan is spent.</p>
        <p class="body-l mt-3 measure"><strong>Jawline and beard line definition</strong> vary widely. Sharpening a line that already has growth behind it is modest work; creating one is not.</p>
        <p class="body-l mt-3 measure"><strong>Moustache</strong> is a smaller, contained area, but placement is demanding because the angles are acute and the hair direction changes across the upper lip.</p>
        <p class="body-l mt-3 measure"><strong>Chin and soul patch</strong> are contained areas, frequently combined with cheek work rather than treated alone.</p>
        <p class="body-l mt-3 measure"><strong>Sideburns</strong> are often addressed for symmetry or after loss from traction or scarring, and are usually a smaller component.</p>
      </div>
      <div>
        <div class="card card--pad-lg">
          <p class="h4">Why beard grafts take longer</p>
          <p class="body-s mt-2">Facial hair sits at a much more acute angle than scalp hair, and the direction changes across every zone — downward on the cheeks, outward along the jaw, and shifting across the upper lip.</p>
          <p class="body-s mt-3">Every site has to be made to match. That is slower per graft than scalp work, and time is the main cost in this procedure.</p>
        </div>
        <div class="card card--pad-lg mt-4">
          <p class="h4">The donor is the same donor</p>
          <p class="body-s mt-2">Beard grafts come from the same finite scalp donor area a hair transplant would use. Grafts spent on your beard are not available for your scalp later.</p>
          <p class="body-s mt-3">That is worth weighing if you have any degree of scalp hair loss, and it is discussed at assessment.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--ink" id="compare">
  <div class="wrap">
    <p class="eyebrow" style="color:var(--accent)">Comparing quotes</p>
    <h2 class="h2 mt-2" style="color:#fff">Five Questions to Ask Any Clinic</h2>
    <p class="body-l mt-3" style="color:rgba(255,255,255,.72);max-width:60ch">A beard quote is only comparable to another beard quote if you know how each number was reached. These five questions surface that.</p>
    <div class="grid grid--3 mt-6">
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">01</p><p class="h4 mt-2" style="color:#fff">How was the graft number decided?</p><p class="body-s mt-2">From an examination and a mapped design, or from a photograph and a package tier? This single answer explains most price differences.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">02</p><p class="h4 mt-2" style="color:#fff">Was the donor area measured?</p><p class="body-s mt-2">Grafts come from a finite supply. A quote made without measuring what that supply can spare is a quote made without the key fact.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">03</p><p class="h4 mt-2" style="color:#fff">What is excluded?</p><p class="body-s mt-2">Anaesthesia, medication, dressings and follow-up reviews. Quotes diverge most in what they leave out, not in the per-graft rate.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">04</p><p class="h4 mt-2" style="color:#fff">Who performs the procedure?</p><p class="body-s mt-2">Ask who makes the sites and who places the grafts, by name and qualification. It is a fair question and the answer should be immediate.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">05</p><p class="h4 mt-2" style="color:#fff">Is a second session likely?</p><p class="body-s mt-2">If staging is probable, it should appear in the first estimate. A quote that becomes two quotes after surgery was never the cheaper one.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">The pattern</p><p class="h4 mt-2" style="color:#fff">Cheap rate, inflated count</p><p class="body-s mt-2">A low per-graft price applied to a graft number nobody justified is the most common way a beard quote ends up costing more — in money, and in donor hair you cannot get back.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="included">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">What the estimate covers</p>
        <h2 class="h2 mt-2">Reading Your Written Estimate</h2>
        <p class="body-l mt-3 measure">Your estimate is itemised so that you can see what drives the total rather than being handed a single figure. It states the zones being treated and the graft count allocated to each, the technique planned, and the scheduled follow-up reviews.</p>
        <p class="body-l mt-3 measure">It also states anything that is not included, and whether a second stage is anticipated. If your plan involves supporting medical treatment, that is listed and costed separately so you can see it clearly.</p>
        <p class="body-l mt-3 measure">You take the estimate away with you. There is no discount for booking on the day, because a price that expires is a pressure tactic rather than a price.</p>
        <p class="body mt-3 measure">Payment and instalment options are set out on our <a href="/cost-and-emi-options">cost and EMI options</a> page, and what applies to you is confirmed at consultation.</p>
      </div>
      <div>
        <div class="card card--pad-lg">
          <p class="h4">Typically itemised</p>
          <?= ticks([
              'Zones treated and grafts allocated to each',
              'Technique used across each zone',
              'Anaesthesia and procedure-day medication',
              'Dressings and post-procedure supplies',
              'Scheduled follow-up reviews',
          ], false) ?>
        </div>
        <div class="card card--pad-lg mt-4">
          <p class="h4">Stated separately</p>
          <?= ticks([
              'Any anticipated second stage',
              'Supporting medical treatment',
              'Anything excluded from the figure',
          ], false) ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Why the graft number is the part of a beard quote worth interrogating: the per-graft rate is the number patients compare, and it is the least informative one. Grafts come out of a donor area that is finite and shared with the scalp, so an inflated count is not merely an overcharge — it spends hair that cannot be replaced. Mapping the design first and deriving the count from it is slower to sell and is the only way the figure means anything.'
) ?>

<section class="section section--canvas" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Beard Transplant Cost FAQs</h2>
        <p class="body-s mt-3">Answers are general guidance. Your own figure comes from your assessment and is given to you itemised in writing.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'Beard Transplant Estimates at Our Gurgaon Clinic',
    'Assessment, design, surgery and every follow-up happen at our Sector 39 clinic in Gurugram, with the same doctor throughout. Patients travel to us from across Gurugram and neighbouring parts of South Delhi.'
) ?>

<?= cta_band(
    'Get a Beard Transplant Estimate Based on Your Face',
    'Send photos of your cheeks, jawline and chin in daylight, or come in and have the zones mapped properly. You will leave with an itemised written estimate and a graft count you can actually interrogate.',
    'beard-transplant-cost',
    ['Beard transplant — cheeks', 'Beard transplant — full beard', 'Moustache or chin only', 'Sideburns', 'Not sure — please advise']
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
