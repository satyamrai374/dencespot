<?php
/**
 * /hair-transplant-graft-calculator
 *
 * Interactive tool.
 *
 * EDITORIAL PROBLEM THIS PAGE HAD TO SOLVE: the rest of the site refuses to
 * quote graft numbers without measuring the donor, and says so repeatedly. A
 * calculator that emits a confident number would contradict every service page
 * and would be exactly the "estimated from a photograph" behaviour we warn
 * against.
 *
 * So the tool is built to teach the opposite lesson. It returns a deliberately
 * wide range drawn from commonly cited published figures for each Norwood
 * stage, and its output panel leads with what the number cannot account for —
 * donor density above all. The result is framed as "what this pattern typically
 * needs", never "what you need".
 *
 * Ranges are standard patient-education figures for Norwood stages, adjusted by
 * treatment zone and hair characteristics. They are not clinic data and are not
 * presented as such.
 *
 * No dependencies. Vanilla JS, progressive enhancement: the form is inert
 * without script but the page still reads as an explainer.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'How accurate is a graft calculator?',
     'a' => 'It gives you an order of magnitude, not a plan. It works from the pattern of loss alone, and the single most important variable in a real graft number is your donor density, which cannot be estimated online. Treat the output as a range to help you budget and sanity-check a quote, not as a figure to hold anyone to.'],
    ['q' => 'Why can it not just tell me my number?',
     'a' => 'Because two people with visually identical recession can have very different donor supplies, and the safe graft count follows from what the donor can spare rather than from what the bald area would like. Any figure produced without that measurement is arithmetic, not a plan.'],
    ['q' => 'What is the Norwood scale?',
     'a' => 'A standard classification of male pattern hair loss, running from minimal recession through to extensive loss with only a band of hair remaining at the sides and back. It gives clinicians a shared vocabulary for describing a pattern. Our guide to <a href="/blog/norwood-scale-explained">the Norwood scale</a> explains each stage.'],
    ['q' => 'Does this work for women?',
     'a' => 'Not well. The Norwood scale describes male pattern loss, and female hair loss is usually diffuse rather than following those stages. More importantly, women frequently have a treatable underlying cause and are often not surgical candidates at all. Start at <a href="/womens-hair-loss-treatment-in-gurgaon">women\'s hair loss treatment</a> instead.'],
    ['q' => 'What is a graft, and is it the same as a hair?',
     'a' => 'No, and this distinction matters when comparing quotes. A graft is a follicular unit, the natural grouping in which hair grows, and it contains anywhere from one to four hairs. Two quotes for the same graft number can therefore deliver noticeably different amounts of hair.'],
    ['q' => 'Why does hair calibre change the number?',
     'a' => 'Because coarser hair covers more scalp per hair. Someone with thick, coarse hair achieves the appearance of density with fewer grafts than someone with fine hair, for the same area. Curl helps too, and a low contrast between hair colour and skin tone helps considerably.'],
    ['q' => 'The calculator gave a number higher than my quote. What does that mean?',
     'a' => 'It could mean your donor cannot support the full number and the clinic is planning sensibly, or that the plan covers a smaller area than you assumed, or that it is staged. Ask them to explain the basis. A lower number is not automatically a worse plan.'],
    ['q' => 'The calculator gave a number lower than my quote. Should I be worried?',
     'a' => 'It is worth asking about. Ask specifically how the graft number was calculated and what donor density was measured. An inflated count costs money and spends donor hair you cannot replace, so a clear explanation matters more than the number itself.'],
    ['q' => 'Can I have as many grafts as I want?',
     'a' => 'No. The limit is what your donor area can safely give across your lifetime, not what the recipient area could accept. Taking more than the donor can spare thins it visibly and permanently, and there is no way to reverse it.'],
    ['q' => 'Should the whole number be done in one session?',
     'a' => 'Not always. Larger plans are frequently staged across two procedures, which protects the donor and often produces a better long-term result. Whether staging suits you is a decision made at assessment.'],
    ['q' => 'Does the calculator account for future hair loss?',
     'a' => 'It cannot, and this is one of its more significant limitations. A sensible surgical plan reserves donor supply for loss that has not happened yet. A number based on today\'s pattern alone can be an overestimate of what should be spent now.'],
    ['q' => 'How do I get an actual number?',
     'a' => 'By being examined. Donor density is measured directly, the recipient area is mapped, your pattern is staged and its likely progression considered, and the number comes out of that. You then receive it in writing as part of an itemised estimate.'],
    ['q' => 'Does a bigger graft number mean a better result?',
     'a' => 'No, and assuming so is how people are sold inflated counts. The right number is the one your donor can support, placed well, in the area that matters most. More grafts placed badly, or taken from a donor that could not spare them, is a worse outcome.'],
    ['q' => 'How much will that many grafts cost?',
     'a' => 'Cost follows the graft number, but we do not publish a per-graft rate, because a rate multiplied by an unexamined count is exactly the arithmetic this page is warning you about. See our <a href="/hair-transplant-cost-in-gurgaon">cost guide</a> for how pricing actually works.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair transplant', 'url' => '/hair-transplant-in-gurgaon'],
    ['name' => 'Graft calculator'],
];

$page = [
    'title'       => 'Hair Transplant Graft Calculator | DenceSpot',
    'description' => 'Estimate a graft range from your pattern of hair loss, and understand why the number that actually matters cannot be worked out without measuring your donor area.',
    'url'         => '/hair-transplant-graft-calculator',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_faq('/hair-transplant-graft-calculator', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<style>
/* Scoped to the calculator. Uses site tokens so it inherits the palette. */
.calc { display: grid; gap: 28px; }
@media (min-width: 900px) { .calc { grid-template-columns: 1.1fr .9fr; align-items: start; } }
.calc fieldset { border: 0; padding: 0; margin: 0 0 26px; }
.calc legend { padding: 0; font-weight: 700; font-size: 15px; margin-bottom: 4px; }
.calc__hint { font-size: 13px; opacity: .72; margin: 0 0 12px; }
.calc__opts { display: grid; gap: 8px; }
.calc__opts--2 { grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); }
.calc__opt { display: flex; gap: 10px; align-items: flex-start; padding: 11px 13px;
  border: 1px solid rgba(0,0,0,.14); border-radius: 10px; cursor: pointer; background: #fff; }
.calc__opt:hover { border-color: rgba(0,0,0,.3); }
.calc__opt input { margin: 2px 0 0; flex: none; }
.calc__opt b { display: block; font-size: 14px; font-weight: 650; }
.calc__opt span { display: block; font-size: 12.5px; opacity: .7; margin-top: 2px; line-height: 1.45; }
.calc__opt:has(input:checked) { border-color: var(--accent-deep, #059669); box-shadow: 0 0 0 1px var(--accent-deep, #059669) inset; }
.calc__out { position: sticky; top: 20px; }
.calc__num { font-size: clamp(30px, 6vw, 44px); font-weight: 800; line-height: 1.1; letter-spacing: -.02em; }
.calc__bar { height: 8px; border-radius: 99px; background: rgba(255,255,255,.18); overflow: hidden; margin-top: 14px; }
.calc__bar i { display: block; height: 100%; background: var(--accent, #10B981); border-radius: 99px; transition: width .35s ease, margin-left .35s ease; }
.calc__cav { margin-top: 20px; padding-top: 18px; border-top: 1px solid rgba(255,255,255,.16); }
.calc__cav li { font-size: 13px; line-height: 1.55; margin-bottom: 9px; opacity: .82; }
.calc__noscript { padding: 16px; border: 1px dashed rgba(0,0,0,.25); border-radius: 10px; font-size: 14px; }
</style>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Graft calculator</span>
        <h1 class="h1 mt-3">A Graft Range, and Why It Is Not Your Graft Number</h1>
        <p class="lead mt-3 measure">This tool gives you a ballpark from your pattern of loss, which is useful for budgeting and for sanity-checking a quote. It cannot give you your actual number, because that depends on your donor density — and no calculator can measure that. Here is the honest version of both.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="#calculator" data-track="calculator"><?= icon('chart', 18) ?> Use the Calculator</a>
          <a class="btn btn--lg btn--accent" href="/book-consultation" data-track="book"><?= icon('calendar', 19) ?> Get a Measured Number</a>
        </div>

        <?= ticks([
            'A range, not a false-precision figure',
            'Adjusts for treatment area and hair type',
            'States plainly what it cannot account for',
            'No details required to use it',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow"><img src="/assets/img/clinic-equipment.jpg" alt="Densitometry and mapping equipment used to measure donor density at DenceSpot Clinic, Gurugram" width="800" height="1000" loading="eager"></div>
        <div class="hero__badge-card">
          <p class="eyebrow">Reviewed by</p>
          <p class="h4 mt-2"><?= e(doctor_name()) ?></p>
          <p class="body-s mt-1"><?= e(doctor_credit()) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="calculator">
  <div class="wrap">
    <p class="eyebrow">The tool</p>
    <h2 class="h2 mt-2">Estimate a Graft Range</h2>
    <p class="body mt-3 measure">Four questions. Nothing is stored, nothing is sent anywhere, and you do not need to give us any details to use it.</p>

    <form class="calc mt-6" id="graftCalc" novalidate>
      <div>
        <fieldset>
          <legend>1. Which pattern is closest to yours?</legend>
          <p class="calc__hint">Male pattern stages. If your loss is diffuse rather than patterned, this tool will not describe it well.</p>
          <div class="calc__opts" role="radiogroup" aria-label="Pattern of hair loss">
            <label class="calc__opt"><input type="radio" name="pattern" value="nw2" checked><span><b>Slight recession at the temples</b><span>The hairline has moved back a little at the corners. The rest is intact.</span></span></label>
            <label class="calc__opt"><input type="radio" name="pattern" value="nw3"><span><b>Clear recession at the temples</b><span>Deeper recession forming an M shape. The crown is not yet involved.</span></span></label>
            <label class="calc__opt"><input type="radio" name="pattern" value="nw3v"><span><b>Recession plus early crown thinning</b><span>Temple recession together with a thinning patch at the crown.</span></span></label>
            <label class="calc__opt"><input type="radio" name="pattern" value="nw4"><span><b>Significant recession and a bald crown</b><span>Two distinct areas, still separated by a band of hair across the middle.</span></span></label>
            <label class="calc__opt"><input type="radio" name="pattern" value="nw5"><span><b>The separating band is thinning</b><span>The bridge between front and crown is narrowing and becoming sparse.</span></span></label>
            <label class="calc__opt"><input type="radio" name="pattern" value="nw6"><span><b>Front and crown have joined</b><span>The band has gone. One continuous area of loss across the top.</span></span></label>
            <label class="calc__opt"><input type="radio" name="pattern" value="nw7"><span><b>Extensive loss</b><span>Only a band of hair remains around the sides and back.</span></span></label>
          </div>
        </fieldset>

        <fieldset>
          <legend>2. Which areas would you want treated?</legend>
          <p class="calc__hint">Treating less costs fewer grafts, and the front usually returns more visible benefit per graft than the crown.</p>
          <div class="calc__opts" role="radiogroup" aria-label="Areas to treat">
            <label class="calc__opt"><input type="radio" name="zone" value="front" checked><span><b>Hairline and temples only</b><span>The front, framing the face.</span></span></label>
            <label class="calc__opt"><input type="radio" name="zone" value="frontmid"><span><b>Hairline plus the mid-scalp</b><span>The front and the area behind it, not the crown.</span></span></label>
            <label class="calc__opt"><input type="radio" name="zone" value="crown"><span><b>Crown only</b><span>The vertex, leaving the front as it is.</span></span></label>
            <label class="calc__opt"><input type="radio" name="zone" value="all"><span><b>Everything affected</b><span>The full area of loss, which may need staging.</span></span></label>
          </div>
        </fieldset>

        <fieldset>
          <legend>3. How would you describe your hair?</legend>
          <p class="calc__hint">Coarser hair covers more scalp per hair, so it needs fewer grafts for the same visual density.</p>
          <div class="calc__opts calc__opts--2" role="radiogroup" aria-label="Hair calibre">
            <label class="calc__opt"><input type="radio" name="calibre" value="coarse"><span><b>Thick or coarse</b></span></label>
            <label class="calc__opt"><input type="radio" name="calibre" value="medium" checked><span><b>Average</b></span></label>
            <label class="calc__opt"><input type="radio" name="calibre" value="fine"><span><b>Fine</b></span></label>
          </div>
        </fieldset>

        <fieldset>
          <legend>4. How much does your hair contrast with your scalp?</legend>
          <p class="calc__hint">Dark hair on pale skin shows scalp more readily, so it needs more grafts to look dense.</p>
          <div class="calc__opts calc__opts--2" role="radiogroup" aria-label="Colour contrast">
            <label class="calc__opt"><input type="radio" name="contrast" value="low"><span><b>Low contrast</b><span>Hair and skin tone are close.</span></span></label>
            <label class="calc__opt"><input type="radio" name="contrast" value="medium" checked><span><b>Moderate</b></span></label>
            <label class="calc__opt"><input type="radio" name="contrast" value="high"><span><b>High contrast</b><span>Dark hair, notably lighter scalp.</span></span></label>
          </div>
        </fieldset>
      </div>

      <div class="calc__out">
        <div class="card card--ink card--pad-lg">
          <p class="eyebrow" style="color:var(--accent)">Typical range for this pattern</p>
          <p class="calc__num mt-2" id="calcResult" aria-live="polite" aria-atomic="true">—</p>
          <p class="body-s mt-2" style="opacity:.8" id="calcUnit">grafts, as a broad guide</p>
          <div class="calc__bar" aria-hidden="true"><i id="calcBar" style="width:0"></i></div>

          <div class="calc__cav">
            <p class="h4" style="color:#fff">What this number does not know</p>
            <ul class="mt-3" style="list-style:disc;padding-left:18px">
              <li><strong>Your donor density.</strong> The most important variable, and the one that decides whether the range above is even available to you.</li>
              <li><strong>Your future loss.</strong> A sensible plan holds grafts back for loss that has not happened yet.</li>
              <li><strong>Your scalp laxity and health.</strong> Both affect what can safely be harvested and placed.</li>
              <li><strong>Whether surgery suits you at all.</strong> Unstable loss and active scalp conditions are treated first.</li>
            </ul>
            <a class="btn btn--block btn--accent mt-4" href="/book-consultation" data-track="book"><?= icon('calendar', 18) ?> Get a measured number</a>
            <a class="btn btn--block btn--ghost mt-3" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask about your case</a>
          </div>
        </div>
        <noscript><p class="calc__noscript mt-4">This calculator needs JavaScript. The rest of the page explains how graft numbers are actually worked out, and you can <a href="/book-consultation">book an assessment</a> for a measured figure.</p></noscript>
      </div>
    </form>
  </div>
</section>

<section class="section section--white" id="what-decides">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">The real calculation</p>
        <h2 class="h2 mt-2">How a Graft Number Is Actually Reached</h2>
        <p class="body-l mt-3 measure">The calculator above works forwards, from the size of the problem. A clinic works backwards, from what your donor area can safely give — and that is the direction that produces a usable plan.</p>
        <p class="body-l mt-3 measure">Donor density is measured directly, not estimated. It varies substantially between people, and two men with visually identical recession can have donor areas that support very different numbers. This is the single reason no honest figure can be produced from a photograph, and it is the reason this page keeps saying so.</p>
        <p class="body-l mt-3 measure">The recipient area is then mapped rather than eyeballed, so the number reflects a measured surface rather than an impression. The pattern is staged, and its likely progression is considered — because grafts spent today are not available for the crown that opens up in ten years.</p>
        <p class="body-l mt-3 measure">Only then does a number appear, and it is frequently lower than the calculator's range. That is usually the plan being sensible about your donor rather than being ungenerous.</p>
      </div>
      <div>
        <div class="card card--pad-lg">
          <p class="h4">What gets measured</p>
          <?= ticks([
              'Donor density at the back and sides',
              'The recipient area, mapped',
              'Scalp laxity and skin condition',
              'Hair calibre, curl and colour contrast',
              'Pattern stage and likely progression',
          ], false) ?>
        </div>
        <div class="card card--pad-lg mt-4">
          <p class="h4">And the constraint</p>
          <p class="body-s mt-2">Your donor has to last your lifetime. The safe number is what it can spare with something held in reserve, not what the bald area could absorb.</p>
          <p class="body-s mt-3">Taking more than that thins the donor visibly and permanently. See <a href="/blog/donor-area-limits-hair-transplant">donor area limits</a>.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="grafts-vs-hairs">
  <div class="wrap">
    <p class="eyebrow">A distinction worth knowing</p>
    <h2 class="h2 mt-2">Grafts Are Not Hairs</h2>
    <p class="body-l mt-3 measure">This trips people up constantly when comparing quotes, and it is worth getting straight before you compare anything.</p>
    <div class="grid grid--3 mt-5">
      <div class="card"><p class="h4">A graft is a follicular unit</p><p class="body-s mt-2">Hair does not grow as separate strands. It grows in natural groupings of one to four hairs, and a graft is one of those groupings moved intact.</p></div>
      <div class="card"><p class="h4">So graft counts are not comparable</p><p class="body-s mt-2">Two thousand grafts averaging two hairs each is a very different amount of hair from two thousand averaging three. Ask what average hairs per graft a quote assumes.</p></div>
      <div class="card"><p class="h4">And single-hair work counts differently again</p><p class="body-s mt-2">Hairlines and <a href="/eyebrow-transplant-in-gurgaon">eyebrow work</a> use single-hair grafts deliberately. Comparing those counts against a scalp quote is comparing different units.</p></div>
    </div>
    <div class="card card--pad-lg mt-6">
      <p class="eyebrow">The practical use of this page</p>
      <h3 class="h3 mt-2">Sanity-checking a quote you already have</h3>
      <p class="body mt-3 measure">If a quote sits far above the range here, ask how the number was calculated and what donor density was measured. An inflated count costs money and spends hair you cannot replace.</p>
      <p class="body mt-3 measure">If it sits well below, that is often a clinic being appropriately careful with your donor, or covering a smaller area than you assumed, or planning to stage the work. Ask, rather than assuming it is a worse plan.</p>
      <p class="body mt-3 measure">Either way the useful move is the same: ask for the basis. Our guide to <a href="/blog/why-hair-transplant-quotes-vary">why quotes vary</a> goes through the mechanics.</p>
    </div>
  </div>
</section>

<?= doctor_block(
    'Why a clinic publishes a calculator and then spends the page undermining it: patients arrive with numbers from online tools and from clinics that produced them without an examination, and those numbers anchor expectations before anyone has measured anything. A range is genuinely useful for budgeting and for spotting a quote that is wildly out of line. It becomes harmful the moment it is mistaken for a plan, because the variable it cannot see — how much the donor can safely give — is the one that decides everything.'
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Graft Number FAQs</h2>
        <p class="body-s mt-3">General patient education. Your own number comes from measurement at an assessment, not from this page.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'Get Your Donor Area Measured in Gurgaon',
    'Assessment, mapping and surgery all happen at our Sector 39 clinic in Gurugram, with the same doctor throughout. Patients travel to us from across Gurugram and neighbouring parts of South Delhi.'
) ?>

<?= cta_band(
    'Swap the Estimate for a Measured Number',
    'Come in and have your donor density measured and the recipient area mapped. You will leave with a graft number that reflects what your scalp can actually support, in writing, with no pressure to book a date on the day.',
    'graft-calculator',
    ['Hair transplant assessment', 'Second opinion on a graft number', 'Hairline only', 'Crown only', 'Not sure — please advise']
) ?>

<script>
(function () {
  'use strict';
  var form = document.getElementById('graftCalc');
  if (!form) { return; }

  var out  = document.getElementById('calcResult');
  var unit = document.getElementById('calcUnit');
  var bar  = document.getElementById('calcBar');

  /* Commonly cited patient-education ranges per pattern stage, in grafts.
     Deliberately broad. These are not clinic figures and are not a quote. */
  var BASE = {
    nw2:  [800,  1500],
    nw3:  [1200, 2200],
    nw3v: [1600, 2800],
    nw4:  [2000, 3200],
    nw5:  [2800, 4200],
    nw6:  [3500, 5500],
    nw7:  [4500, 7000]
  };

  /* Proportion of the affected area each selection covers. */
  var ZONE     = { front: 0.45, frontmid: 0.75, crown: 0.40, all: 1.00 };
  /* Coarser hair covers more scalp per hair, so needs fewer grafts. */
  var CALIBRE  = { coarse: 0.85, medium: 1.00, fine: 1.15 };
  /* Higher hair-to-scalp contrast shows scalp more, so needs more grafts. */
  var CONTRAST = { low: 0.90, medium: 1.00, high: 1.10 };

  var MAX = 7000; /* for the bar scale only */

  function pick(name) {
    var el = form.querySelector('input[name="' + name + '"]:checked');
    return el ? el.value : null;
  }

  function roundTo(n, step) {
    return Math.max(step, Math.round(n / step) * step);
  }

  function update() {
    var base = BASE[pick('pattern')] || BASE.nw3;
    var f = (ZONE[pick('zone')] || 1) * (CALIBRE[pick('calibre')] || 1) * (CONTRAST[pick('contrast')] || 1);

    /* Widen slightly in both directions so the output never reads as precise. */
    var lo = roundTo(base[0] * f * 0.92, 100);
    var hi = roundTo(base[1] * f * 1.08, 100);
    if (hi <= lo) { hi = lo + 200; }

    out.textContent = lo.toLocaleString('en-IN') + '–' + hi.toLocaleString('en-IN');
    unit.textContent = 'grafts, as a broad guide only';

    var left  = Math.min(100, (lo / MAX) * 100);
    var width = Math.max(4, Math.min(100 - left, ((hi - lo) / MAX) * 100));
    bar.style.marginLeft = left + '%';
    bar.style.width = width + '%';
  }

  form.addEventListener('change', update);
  form.addEventListener('submit', function (ev) { ev.preventDefault(); update(); });
  update();
}());
</script>

<?php require __DIR__ . '/includes/footer.php'; ?>
