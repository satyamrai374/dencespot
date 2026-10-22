<?php
/**
 * /hair-loss-assessment
 *
 * Interactive triage tool.
 *
 * CLINICAL SAFETY DESIGN — the reason this is built the way it is:
 * a self-assessment tool on a YMYL medical page must not output a diagnosis.
 * So this one outputs a ROUTE: which category of problem the answers point
 * towards, what to do next, and which page to read. It never names a condition
 * as the user's condition, and every result ends at a clinical assessment.
 *
 * It is also built to surface the answers that should stop someone booking
 * surgery: patchy loss, scalp symptoms, sudden onset with a preceding trigger,
 * post-partum shedding, and rapidly progressing loss in a young patient. Those
 * override the pattern-loss route entirely, because they are the presentations
 * where a hair clinic selling a procedure does actual harm.
 *
 * Nothing is transmitted. All logic is client-side and no answers leave the
 * browser, which is stated on the page because people are reasonably wary of
 * entering health information into a form.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'Is this a diagnosis?',
     'a' => 'No, and it is not designed to be. It points you towards the kind of problem your answers suggest and tells you what to do next. Hair loss is diagnosed by examining a scalp, taking a history and sometimes running blood tests, none of which a webpage can do.'],
    ['q' => 'Are my answers stored or sent anywhere?',
     'a' => 'No. Everything happens in your browser. Nothing is transmitted to us, nothing is saved, and you do not need to enter any personal details to use it. Closing the page discards it.'],
    ['q' => 'Why does it ask when the loss started?',
     'a' => 'Because timing is often the most useful diagnostic clue available. Shedding that began a few months after a birth, an illness, surgery, a crash diet or a period of severe stress points somewhere quite different from a hairline that has receded gradually over five years.'],
    ['q' => 'Why does it ask about patches?',
     'a' => 'Because well-defined patches of complete hair loss suggest something other than pattern baldness, and the distinction changes everything that follows. It is also the presentation where being sold a hair transplant does real harm.'],
    ['q' => 'It told me to get blood tests. Which ones?',
     'a' => 'That depends on your history and examination, which is why the tool does not list them. Iron studies and thyroid function come up frequently, with hormonal and other tests where indicated. What is worth checking in your case is decided at the consultation.'],
    ['q' => 'It suggested my hair loss might recover on its own. Should I do nothing?',
     'a' => 'Not nothing — get it assessed. Some shedding does recover, particularly after pregnancy, illness or a major stressor. But it is worth confirming that is what is happening and checking for anything else contributing, rather than assuming and losing months.'],
    ['q' => 'I got a result pointing to pattern hair loss. What now?',
     'a' => 'Get it confirmed by examination, because other things can look similar, and start treatment early if that is the diagnosis. Pattern hair loss is progressive, and the hair you keep is easier to hold onto than the hair you have already lost is to get back.'],
    ['q' => 'Does this work for women?',
     'a' => 'Yes, and the routing differs, because female hair loss has a wider differential and more frequently has a treatable cause. If you are a woman, the follow-on reading is <a href="/womens-hair-loss-treatment-in-gurgaon">women\'s hair loss treatment</a> rather than the general pages.'],
    ['q' => 'How much hair loss is normal?',
     'a' => 'Shedding some hair daily is normal and varies between people. What matters more than counting is change — noticeably more than usual for you, over a defined period, or a visible change in your parting, hairline or density.'],
    ['q' => 'Should I take supplements while I wait for an appointment?',
     'a' => 'Test before you take. Supplements correct a deficiency if you have one and do very little if you do not, and some things are harmful in excess. Taking them before testing can also make a deficiency harder to interpret later.'],
    ['q' => 'The tool says to see someone urgently. Why?',
     'a' => 'Certain combinations — a painful, inflamed or scarring scalp, or sudden extensive loss — warrant prompt assessment rather than a booking in a few months. Some scalp conditions permanently destroy follicles if left, and time matters with those.'],
    ['q' => 'Can I use this instead of a consultation?',
     'a' => 'No. It is a way of arriving at a consultation better prepared, with a clearer sense of what to ask and what information to bring. It replaces guesswork, not examination.'],
    ['q' => 'What should I bring to my appointment?',
     'a' => 'A list of every medicine and supplement you take, any recent blood results, photographs showing how your hair looked before, and the dates — when it started and what else was happening around then.'],
    ['q' => 'What if my answers do not fit any of the options?',
     'a' => 'Then the tool is not describing your situation, which is a limitation of any questionnaire rather than a sign that nothing is wrong. Book an assessment and describe it in your own words.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair loss assessment'],
];

$page = [
    'title'       => 'Hair Loss Self-Assessment Tool | DenceSpot Clinic',
    'description' => 'Answer six questions about your hair loss and get pointed to the right next step. Not a diagnosis. Nothing is stored, and no personal details are required.',
    'url'         => '/hair-loss-assessment',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_faq('/hair-loss-assessment', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<style>
/* Scoped to the assessment tool. */
.hla { display: grid; gap: 28px; }
@media (min-width: 900px) { .hla { grid-template-columns: 1.1fr .9fr; align-items: start; } }
.hla fieldset { border: 0; padding: 0; margin: 0 0 24px; }
.hla legend { padding: 0; font-weight: 700; font-size: 15px; margin-bottom: 10px; }
.hla__opts { display: grid; gap: 8px; }
.hla__opts--2 { grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); }
.hla__opt { display: flex; gap: 10px; align-items: flex-start; padding: 11px 13px;
  border: 1px solid rgba(0,0,0,.14); border-radius: 10px; cursor: pointer; background: #fff; }
.hla__opt:hover { border-color: rgba(0,0,0,.3); }
.hla__opt input { margin: 2px 0 0; flex: none; }
.hla__opt b { display: block; font-size: 14px; font-weight: 650; }
.hla__opt span span { display: block; font-size: 12.5px; opacity: .7; margin-top: 2px; line-height: 1.45; }
.hla__opt:has(input:checked) { border-color: var(--accent-deep, #059669); box-shadow: 0 0 0 1px var(--accent-deep, #059669) inset; }
.hla__out { position: sticky; top: 20px; }
.hla__flag { display: inline-block; font-size: 12px; font-weight: 700; letter-spacing: .04em;
  text-transform: uppercase; padding: 5px 10px; border-radius: 99px; background: var(--accent, #10B981); color: #06281c; }
.hla__flag[data-tone="urgent"] { background: #FBBF24; color: #3b2600; }
.hla__list { margin-top: 16px; padding-left: 18px; list-style: disc; }
.hla__list li { font-size: 13.5px; line-height: 1.6; margin-bottom: 9px; opacity: .85; }
.hla__links { margin-top: 18px; padding-top: 16px; border-top: 1px solid rgba(255,255,255,.16); }
.hla__links a { display: block; font-size: 13.5px; margin-bottom: 9px; color: var(--accent, #10B981); }
.hla__noscript { padding: 16px; border: 1px dashed rgba(0,0,0,.25); border-radius: 10px; font-size: 14px; }
</style>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Hair loss self-assessment</span>
        <h1 class="h1 mt-3">Six Questions to Work Out What to Do Next</h1>
        <p class="lead mt-3 measure">This will not tell you what you have. It will tell you which kind of problem your answers point towards, what to do about it, and what to bring to an appointment. Several routes it can give you end in "do not book surgery yet", which is rather the point of building it.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="#assessment" data-track="assessment"><?= icon('list', 18) ?> Start the Assessment</a>
          <a class="btn btn--lg btn--accent" href="/book-consultation" data-track="book"><?= icon('calendar', 19) ?> Book a Consultation</a>
        </div>

        <?= ticks([
            'Nothing stored, nothing sent, no details needed',
            'Points to a next step, not a diagnosis',
            'Flags the answers that should delay surgery',
            'Takes about a minute',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow"><img src="/assets/img/clinic-equipment.jpg" alt="Scalp examination setup used for hair loss assessment at DenceSpot Clinic, Gurugram" width="800" height="1000" loading="eager"></div>
        <div class="hero__badge-card">
          <p class="eyebrow">Reviewed by</p>
          <p class="h4 mt-2"><?= e(doctor_name()) ?></p>
          <p class="body-s mt-1"><?= e(doctor_credit()) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="assessment">
  <div class="wrap">
    <p class="eyebrow">The tool</p>
    <h2 class="h2 mt-2">Answer Six Questions</h2>
    <p class="body mt-3 measure">Everything runs in your browser. Nothing is transmitted to us and nothing is saved.</p>

    <form class="hla mt-6" id="hlaForm" novalidate>
      <div>
        <fieldset>
          <legend>1. Are you male or female?</legend>
          <div class="hla__opts hla__opts--2" role="radiogroup" aria-label="Sex">
            <label class="hla__opt"><input type="radio" name="sex" value="m" checked><span><b>Male</b></span></label>
            <label class="hla__opt"><input type="radio" name="sex" value="f"><span><b>Female</b></span></label>
          </div>
        </fieldset>

        <fieldset>
          <legend>2. What does the loss actually look like?</legend>
          <div class="hla__opts" role="radiogroup" aria-label="Pattern">
            <label class="hla__opt"><input type="radio" name="pattern" value="receding" checked><span><b>A receding hairline or thinning crown</b><span>Loss concentrated in a recognisable pattern.</span></span></label>
            <label class="hla__opt"><input type="radio" name="pattern" value="parting"><span><b>A widening parting or general thinning on top</b><span>Spread across the top rather than a defined bald area.</span></span></label>
            <label class="hla__opt"><input type="radio" name="pattern" value="diffuse"><span><b>Shedding all over, without an obvious bald area</b><span>More hair coming out everywhere, density fairly even.</span></span></label>
            <label class="hla__opt"><input type="radio" name="pattern" value="patches"><span><b>Distinct patches of complete hair loss</b><span>Smooth, well-defined round or oval bare areas.</span></span></label>
            <label class="hla__opt"><input type="radio" name="pattern" value="edges"><span><b>Loss along the hairline and temples</b><span>Particularly where hair is often worn pulled back or tightly styled.</span></span></label>
          </div>
        </fieldset>

        <fieldset>
          <legend>3. How long has it been going on?</legend>
          <div class="hla__opts" role="radiogroup" aria-label="Duration">
            <label class="hla__opt"><input type="radio" name="dur" value="weeks"><span><b>A few weeks to three months</b></span></label>
            <label class="hla__opt"><input type="radio" name="dur" value="months" checked><span><b>Three months to a year</b></span></label>
            <label class="hla__opt"><input type="radio" name="dur" value="years"><span><b>More than a year, gradually</b></span></label>
          </div>
        </fieldset>

        <fieldset>
          <legend>4. Did anything happen in the few months before it started?</legend>
          <div class="hla__opts" role="radiogroup" aria-label="Trigger">
            <label class="hla__opt"><input type="radio" name="trigger" value="none" checked><span><b>Nothing I can think of</b></span></label>
            <label class="hla__opt"><input type="radio" name="trigger" value="partum"><span><b>I gave birth</b></span></label>
            <label class="hla__opt"><input type="radio" name="trigger" value="illness"><span><b>Serious illness, surgery or a high fever</b></span></label>
            <label class="hla__opt"><input type="radio" name="trigger" value="weight"><span><b>Rapid weight loss or a restrictive diet</b></span></label>
            <label class="hla__opt"><input type="radio" name="trigger" value="stress"><span><b>A period of severe stress</b></span></label>
            <label class="hla__opt"><input type="radio" name="trigger" value="med"><span><b>I started a new medicine</b></span></label>
          </div>
        </fieldset>

        <fieldset>
          <legend>5. How is your scalp itself?</legend>
          <div class="hla__opts" role="radiogroup" aria-label="Scalp symptoms">
            <label class="hla__opt"><input type="radio" name="scalp" value="fine" checked><span><b>Normal</b><span>No itching, flaking, redness or soreness.</span></span></label>
            <label class="hla__opt"><input type="radio" name="scalp" value="flaky"><span><b>Itchy or flaky</b><span>Dandruff-type flaking, some irritation.</span></span></label>
            <label class="hla__opt"><input type="radio" name="scalp" value="sore"><span><b>Red, sore, painful or scarring</b><span>Tenderness, burning, or skin that looks smooth and shiny where hair has gone.</span></span></label>
          </div>
        </fieldset>

        <fieldset>
          <legend>6. Is anyone else in your family affected?</legend>
          <div class="hla__opts hla__opts--2" role="radiogroup" aria-label="Family history">
            <label class="hla__opt"><input type="radio" name="fam" value="yes" checked><span><b>Yes</b></span></label>
            <label class="hla__opt"><input type="radio" name="fam" value="no"><span><b>No</b></span></label>
            <label class="hla__opt"><input type="radio" name="fam" value="unknown"><span><b>Not sure</b></span></label>
          </div>
        </fieldset>
      </div>

      <div class="hla__out">
        <div class="card card--ink card--pad-lg">
          <span class="hla__flag" id="hlaFlag">Your next step</span>
          <h3 class="h3 mt-3" style="color:#fff" id="hlaTitle" aria-live="polite">—</h3>
          <p class="body-s mt-3" style="opacity:.85" id="hlaBody"></p>
          <ul class="hla__list" id="hlaSteps"></ul>
          <div class="hla__links" id="hlaLinks"></div>
          <a class="btn btn--block btn--accent mt-4" href="/book-consultation" data-track="book"><?= icon('calendar', 18) ?> Book an assessment</a>
          <a class="btn btn--block btn--ghost mt-3" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
          <p class="fine mt-4" style="opacity:.7">This tool is patient education and not a diagnosis. Suitability for any treatment is determined only after clinical assessment.</p>
        </div>
        <noscript><p class="hla__noscript mt-4">This tool needs JavaScript. You can <a href="/book-consultation">book an assessment</a>, or read <a href="/hair-fall-treatment-in-gurgaon">hair fall treatment</a> and <a href="/womens-hair-loss-treatment-in-gurgaon">women's hair loss treatment</a> instead.</p></noscript>
      </div>
    </form>
  </div>
</section>

<section class="section section--white" id="why">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Why this exists</p>
        <h2 class="h2 mt-2">Most Hair Loss Mistakes Happen Before the Diagnosis</h2>
        <p class="body-l mt-3 measure">People buy treatments before anyone establishes what is wrong. A course of injections for hair loss driven by iron deficiency. A transplant offered for an autoimmune condition. Months of shampoo while genuine pattern loss progresses quietly underneath.</p>
        <p class="body-l mt-3 measure">None of those are exotic cases. They are the ordinary result of an industry that sells procedures and a patient who reasonably wants the problem fixed rather than investigated.</p>
        <p class="body-l mt-3 measure">This tool exists to slow that down by one step. It cannot diagnose you, and it does not try to. What it can do is tell you when your answers point at something that needs investigating before anyone sells you anything, and give you the right questions to arrive with.</p>
        <p class="body-l mt-3 measure">If it tells you not to book surgery yet, that is not the tool being cautious for its own sake. Those routes exist because operating in those situations wastes donor hair that cannot be replaced.</p>
      </div>
      <div>
        <div class="card card--pad-lg">
          <p class="h4">Bring to your appointment</p>
          <?= ticks([
              'Every medicine and supplement you take',
              'Any recent blood test results',
              'Photographs of your hair before the loss',
              'When it started, and what else happened then',
          ], false) ?>
        </div>
        <div class="card card--pad-lg mt-4">
          <p class="h4">Read next</p>
          <p class="body-s mt-2"><a href="/hair-fall-treatment-in-gurgaon">Hair fall treatment</a> — how a diagnosis is reached.</p>
          <p class="body-s mt-3"><a href="/womens-hair-loss-treatment-in-gurgaon">Women's hair loss treatment</a> — the female differential.</p>
          <p class="body-s mt-3"><a href="/hair-transplant-graft-calculator">Graft calculator</a> — if surgery is already on the table.</p>
          <p class="body-s mt-3"><a href="/how-to-choose-hair-transplant-clinic">How to choose a clinic</a> — before you commit anywhere.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Why several of this tool\'s answers tell people not to book a procedure: the presentations that most need a doctor rather than a purchase are exactly the ones that look most alarming to the patient — patches appearing over weeks, sudden heavy shedding, a sore or scarring scalp. Those are the people most likely to be sold something quickly, and the ones for whom a wrong first step is most costly. A triage tool that only ever routed towards treatment would be a lead form with a quiz attached.'
) ?>

<section class="section section--canvas" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">About This Assessment</h2>
        <p class="body-s mt-3">General patient education. Your diagnosis comes from examination and, where needed, investigation.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'Getting Assessed in Gurgaon',
    'Assessment, investigation and treatment all happen at our Sector 39 clinic in Gurugram, with the same doctor throughout. Patients travel to us from across Gurugram and neighbouring parts of South Delhi.'
) ?>

<?= cta_band(
    'Turn the Guess Into a Diagnosis',
    'Bring your answers, your medication list and your timeline. You will get an examination, the investigations your case actually calls for, and a plan matched to the cause rather than to whatever we happen to offer.',
    'hair-loss-assessment',
    ['Hair loss — not yet diagnosed', 'Patchy hair loss', 'Shedding after pregnancy or illness', 'Receding hairline or crown', 'Not sure — please advise']
) ?>

<script>
(function () {
  'use strict';
  var form = document.getElementById('hlaForm');
  if (!form) { return; }

  var flag  = document.getElementById('hlaFlag');
  var title = document.getElementById('hlaTitle');
  var body  = document.getElementById('hlaBody');
  var steps = document.getElementById('hlaSteps');
  var links = document.getElementById('hlaLinks');

  function pick(name) {
    var el = form.querySelector('input[name="' + name + '"]:checked');
    return el ? el.value : null;
  }

  /* Routes are ordered by clinical priority in evaluate(): anything that should
     stop someone booking a procedure is checked before the pattern-loss route. */
  var ROUTES = {
    scalp: {
      tone: 'urgent', flag: 'See someone promptly',
      title: 'A sore or scarring scalp needs assessing first',
      body: 'Redness, pain, burning, or skin that looks smooth and shiny where hair has gone can indicate a scalp condition that damages follicles permanently if it is left. This is the one route here where waiting genuinely costs you something.',
      steps: [
        'Arrange an examination sooner rather than later.',
        'Do not start any procedure or injectable course until the scalp is diagnosed.',
        'Note when the symptoms started and whether anything makes them worse.'
      ],
      links: [['Book an assessment', '/book-consultation'], ['Scalp conditions and flaking', '/dandruff-treatment-in-gurgaon']]
    },
    patches: {
      tone: 'urgent', flag: 'Get diagnosed first',
      title: 'Patchy loss is a different problem from pattern baldness',
      body: 'Smooth, well-defined patches of complete hair loss point to something other than ordinary pattern loss. This matters commercially as well as clinically: it is the presentation where people are most often sold a transplant that should not be performed.',
      steps: [
        'Get a clinical diagnosis before considering any procedure.',
        'Decline any offer of surgery until the cause is established.',
        'Photograph the patches now, and note the order they appeared in.'
      ],
      links: [['Alopecia areata treatment', '/alopecia-areata-treatment-in-gurgaon'], ['Book an assessment', '/book-consultation']]
    },
    partum: {
      tone: 'ok', flag: 'Likely to recover',
      title: 'Shedding after pregnancy usually settles on its own',
      body: 'Post-partum shedding typically begins some months after delivery and recovers over the following months. The useful work is confirming that is what is happening and checking for anything else contributing, rather than starting aggressive treatment for something that is resolving.',
      steps: [
        'Get it confirmed, and ask about iron and thyroid testing.',
        'Avoid committing to a course of procedures for now.',
        'Review again if it has not improved over several months.'
      ],
      links: [["Women's hair loss treatment", '/womens-hair-loss-treatment-in-gurgaon'], ['Book an assessment', '/book-consultation']]
    },
    effluvium: {
      tone: 'ok', flag: 'Investigate the trigger',
      title: 'This pattern often follows a trigger a few months earlier',
      body: 'Heavy shedding that began some months after illness, surgery, rapid weight loss, severe stress or a new medicine frequently reflects a temporary disturbance of the hair cycle. It commonly recovers once the underlying cause is addressed.',
      steps: [
        'Get assessed, including testing for anything reversible.',
        'Bring the full list of medicines and supplements you take.',
        'Do not commit to a procedure course before the cause is known.'
      ],
      links: [['Hair fall treatment', '/hair-fall-treatment-in-gurgaon'], ['Book an assessment', '/book-consultation']]
    },
    traction: {
      tone: 'ok', flag: 'Act early',
      title: 'Loss along the hairline may be tension-related',
      body: 'Sustained pulling from tight braids, extensions, weaves or tightly pulled styles can damage follicles at the hairline and temples. Caught early it often improves once the tension stops. Left long enough it becomes permanent, and grafting is then the only option.',
      steps: [
        'Remove the tension now, whatever else you decide.',
        'Get it assessed to see whether the follicles are recoverable.',
        'Where loss is established, ask about grafting the affected area.'
      ],
      links: [['Hair transplant for women', '/hair-transplant-for-women-in-gurgaon'], ["Women's hair loss treatment", '/womens-hair-loss-treatment-in-gurgaon']]
    },
    femaleDiffuse: {
      tone: 'ok', flag: 'Get investigated',
      title: 'This needs blood tests before any treatment',
      body: 'Diffuse thinning and a widening parting in women have a wide range of causes, several of them reversible — iron, thyroid and hormonal among them. Treating the hair while an underlying cause runs untreated is treating a symptom.',
      steps: [
        'Get examined and ask what investigations your history calls for.',
        'Do not take supplements before testing, as it complicates results.',
        'Note that most women in this position are not surgical candidates.'
      ],
      links: [["Women's hair loss treatment", '/womens-hair-loss-treatment-in-gurgaon'], ['Book an assessment', '/book-consultation']]
    },
    flaky: {
      tone: 'ok', flag: 'Two things to check',
      title: 'Treat the scalp, and check the hair loss separately',
      body: 'An itchy, flaking scalp can increase shedding while it is inflamed, and that shedding usually settles once the scalp does. What it does not do is cause pattern baldness, so if you are also losing hair in a pattern, that is a second thing needing its own answer.',
      steps: [
        'Get the scalp condition diagnosed rather than guessing at a shampoo.',
        'Ask specifically whether there is pattern loss as well.',
        'Recheck the shedding once the scalp has settled.'
      ],
      links: [['Dandruff treatment', '/dandruff-treatment-in-gurgaon'], ['Hair fall treatment', '/hair-fall-treatment-in-gurgaon']]
    },
    pattern: {
      tone: 'ok', flag: 'Act sooner rather than later',
      title: 'This pattern is consistent with genetic hair loss',
      body: 'A receding hairline or thinning crown developing gradually, particularly with a family history, is the typical picture of pattern hair loss. It should still be confirmed by examination, because other things can look similar. It is progressive, so the hair you still have is easier to keep than lost hair is to recover.',
      steps: [
        'Get the diagnosis confirmed before starting anything.',
        'Ask about medical treatment to protect what you still have.',
        'Consider surgery only once the loss is stable and assessed.'
      ],
      links: [['Hair fall treatment', '/hair-fall-treatment-in-gurgaon'], ['Hair transplant in Gurgaon', '/hair-transplant-in-gurgaon'], ['Graft calculator', '/hair-transplant-graft-calculator']]
    },
    early: {
      tone: 'ok', flag: 'Too early for surgery',
      title: 'Recent, rapid loss should be stabilised before any surgery',
      body: 'Hair loss that has appeared over a short period and is still moving needs a diagnosis and medical treatment first. Operating inside a process that is still running leaves transplanted hair marooned as the loss continues around it.',
      steps: [
        'Get assessed and investigated for a reversible cause.',
        'Expect to be advised to stabilise the loss before considering surgery.',
        'Be cautious of any clinic offering you a procedure right now.'
      ],
      links: [['Hair fall treatment', '/hair-fall-treatment-in-gurgaon'], ['How to choose a clinic', '/how-to-choose-hair-transplant-clinic']]
    }
  };

  function evaluate() {
    var sex = pick('sex'), pattern = pick('pattern'), dur = pick('dur'),
        trigger = pick('trigger'), scalp = pick('scalp');

    /* Priority order matters. Anything that should stop a procedure comes first. */
    if (scalp === 'sore')      { return ROUTES.scalp; }
    if (pattern === 'patches') { return ROUTES.patches; }
    if (trigger === 'partum')  { return ROUTES.partum; }
    if (pattern === 'edges')   { return ROUTES.traction; }

    if (pattern === 'diffuse' && trigger !== 'none') { return ROUTES.effluvium; }
    if (dur === 'weeks' && trigger !== 'none')       { return ROUTES.effluvium; }

    if (sex === 'f' && (pattern === 'parting' || pattern === 'diffuse')) { return ROUTES.femaleDiffuse; }

    if (dur === 'weeks') { return ROUTES.early; }
    if (scalp === 'flaky') { return ROUTES.flaky; }

    return ROUTES.pattern;
  }

  function render(route) {
    flag.textContent = route.flag;
    flag.setAttribute('data-tone', route.tone);
    title.textContent = route.title;
    body.textContent = route.body;

    steps.textContent = '';
    route.steps.forEach(function (text) {
      var li = document.createElement('li');
      li.textContent = text;
      steps.appendChild(li);
    });

    links.textContent = '';
    route.links.forEach(function (pair) {
      var a = document.createElement('a');
      a.textContent = pair[0] + ' →';
      a.setAttribute('href', pair[1]);
      links.appendChild(a);
    });
  }

  form.addEventListener('change', function () { render(evaluate()); });
  form.addEventListener('submit', function (ev) { ev.preventDefault(); render(evaluate()); });
  render(evaluate());
}());
</script>

<?php require __DIR__ . '/includes/footer.php'; ?>
