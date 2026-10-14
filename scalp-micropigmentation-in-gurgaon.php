<?php
/**
 * /scalp-micropigmentation-in-gurgaon
 *
 * Non-surgical spoke. SMP is referenced as an option from three pages already
 * (crown, repair, and the crown alternatives block), so it needs a real page
 * rather than a stub.
 *
 * Editorial position: SMP is a cosmetic tattoo, and the page says so in the
 * first paragraph. It adds no hair. What it does is reduce the contrast between
 * scalp and hair, which is genuinely useful and — crucially — costs no donor
 * supply, which is why it belongs in plans where grafts are the scarce resource.
 *
 * The honest risks that marketing pages omit and this one includes: pigment
 * fades and shifts colour over time, it needs touch-ups, it is difficult to
 * remove, and the result depends heavily on the operator. Also that it commits
 * you to keeping the surrounding hair short if it is being used as a shaved-look
 * treatment.
 *
 * NOTE FOR THE CLINIC: this page describes SMP generically and does not assert
 * that any particular operator or device is used here. If the clinic does not
 * currently offer SMP in-house, this page should either be marked as a referral
 * or the service confirmed before launch. Flagged in BUILD-PROGRESS.
 *
 * 14 Oct 2026: landing-page layout (lp_split / lp_steps / lp_cta) with the same
 * cautious wording — the page still does not say SMP is performed here. Every
 * image is an AI illustration with its visible label. Per the client, this
 * Gurugram page never mentions the Rohini clinic.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

// "SMP vs transplant vs hair system" reference table:
// [what differs, SMP, transplant, hair system]. General guide; it does not say
// which of these the clinic itself provides.
$smpRows = [
    ['What it is', 'Dots of pigment tattooed into the scalp', 'Your own follicles moved from the back and sides', 'A non-surgical hairpiece fixed over the thinning area'],
    ['Adds hair?', 'No; it changes how the scalp looks', 'Yes, living hair that grows', 'Real or synthetic hair on a base; nothing grows'],
    ['Uses donor hair?', 'No', 'Yes, from a finite supply', 'No'],
    ['The look it gives', 'Short stubble, or less visible scalp under thinning hair', 'Hair that can be grown, cut and styled', 'Whatever length and density the unit has'],
    ['Upkeep', 'Touch-ups as the pigment fades', 'Medical treatment often continues for the native hair', 'Regular cleaning, re-fixing and replacement of the unit'],
    ['If you change your mind', 'Removal is slow, difficult and sometimes incomplete', 'Grafted hair stays where it was placed', 'It can be taken off'],
    ['What is involved', 'Several tattooing sessions, no surgery', 'Day-case surgery under local anaesthetic', 'Fitting and maintenance, no surgery'],
    ['Often combined with', 'A transplant, to blend edges or add apparent density', 'Pigment, to stretch a limited donor', 'Usually worn on its own'],
];

$faqs = [
    ['q' => 'What is scalp micropigmentation?',
     'a' => 'A cosmetic tattooing technique in which tiny dots of pigment are deposited in the scalp to mimic the appearance of short hair follicles or to reduce the contrast between scalp and hair. It adds no actual hair. It changes how the scalp looks, which for many people is the thing that was actually bothering them.'],
    ['q' => 'What is it used for?',
     'a' => 'Three main things. Creating the look of a closely shaved head where there is significant baldness. Adding the appearance of density to thinning hair by darkening the scalp showing through it. And camouflaging scarring, including donor scars from previous transplant surgery.'],
    ['q' => 'Does it grow hair?',
     'a' => 'No, and this is the single most important thing to understand. It is pigment in skin. It does not stimulate follicles, it does not treat hair loss, and it does not stop hair loss progressing underneath it. Hair loss continues, which is why the design has to account for what your hair will look like in a few years.'],
    ['q' => 'How is it different from a hair transplant?',
     'a' => 'A transplant moves living follicles that grow, and spends a finite donor supply doing it. Micropigmentation deposits pigment and spends no donor hair at all. That difference is the reason the two are often used together rather than as competitors — pigment where density only needs to look better, grafts where hair genuinely needs to be there.'],
    ['q' => 'Can it be combined with a transplant?',
     'a' => 'Frequently, and it is one of the more useful combinations available. Pigment can make a grafted area read as denser than the graft count alone would allow, blend the perimeter of a transplanted region, and disguise donor scarring. It is planned as part of the whole rather than added as an afterthought.'],
    ['q' => 'Does it look real?',
     'a' => 'It depends almost entirely on the skill of the person doing it. Dot size, depth, spacing, pigment colour and the design of the hairline all have to be right, and errors in any of them are visible. Work that is too dark, too uniform, too large in dot size or placed at too low a hairline is recognisable, and it is difficult to undo.'],
    ['q' => 'How permanent is it?',
     'a' => 'Pigment usually lasts for years, but its appearance is not permanent. It fades and can shift in tone, so touch-up sessions are part of the commitment rather than a sign something went wrong. Describing it as a one-off treatment that never needs attention again understates the maintenance.'],
    ['q' => 'Can it be removed if I do not like it?',
     'a' => 'With difficulty. Removal is possible with laser treatment over multiple sessions, but it is slow, incomplete in some cases, and not something to rely on as a safety net. Treat the decision as close to permanent, and be certain about the hairline design before you start.'],
    ['q' => 'Do I have to keep my hair short?',
     'a' => 'If it is being used to create a shaved-head look, yes. The illusion works because the pigment dots match the appearance of stubble, and growing the surrounding hair longer breaks that match. Where it is being used to add apparent density under existing hair, that constraint does not apply in the same way.'],
    ['q' => 'How many sessions does it take?',
     'a' => 'It is normally built across several sessions spaced some days or weeks apart, layering the density gradually rather than achieving it in one sitting. That is deliberate — going too dark too early is far harder to correct than adding more later.'],
    ['q' => 'Does it hurt?',
     'a' => 'It is usually described as uncomfortable, and sensitivity varies across the scalp and between people. Sessions are long, which is often the harder part.'],
    ['q' => 'Is it safe?',
     'a' => 'It is a tattooing procedure, so the relevant considerations are hygiene, single-use needles, pigment quality and operator competence. Reactions to pigment are uncommon but possible. It is not appropriate over active scalp infection or inflammation, and conditions affecting healing or scarring, including a tendency to keloid, need discussing beforehand.'],
    ['q' => 'Will it work on scars?',
     'a' => 'Often, and it is one of its more common uses. Reducing the contrast between a pale scar and the surrounding scalp can make a linear donor scar or dot scarring less noticeable. Pigment can behave differently in scar tissue than in normal skin, so it is approached carefully and usually tested.'],
    ['q' => 'How much does scalp micropigmentation cost in Gurgaon?',
     'a' => 'It depends on the area being treated and the number of sessions required, so it is quoted after assessment. Whether it is the right option for you at all is the more important question, and that is settled first.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Treatments', 'url' => '/hair-fall-treatment-in-gurgaon'],
    ['name' => 'Scalp micropigmentation in Gurgaon'],
];

$page = [
    'title'       => 'Scalp Micropigmentation in Gurgaon: SMP vs Transplant',
    'description' => 'Scalp micropigmentation (SMP) in Gurgaon: a cosmetic tattoo that uses no donor hair, how it compares with a transplant or hair system, fading and touch-ups.',
    'url'         => '/scalp-micropigmentation-in-gurgaon',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-consultation-768.webp',
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_therapy('/scalp-micropigmentation-in-gurgaon', [
            'name'          => 'Scalp Micropigmentation',
            'alternateName' => ['SMP', 'Scalp pigmentation', 'Hair tattoo'],
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'Fine deposits of pigment are placed into the scalp to replicate the appearance of short hair follicles or to reduce the contrast between scalp and surrounding hair. Treatment is built across several sessions spaced days to weeks apart, layering density gradually. It is used to create the appearance of a closely shaved head, to add apparent density to thinning hair, and to camouflage linear or dot scarring from previous surgery.',
            'preparation'   => 'Assessment of the scalp and pattern of hair loss, discussion of hairline design and how it will age, review of skin conditions affecting healing or scarring including any tendency to keloid, exclusion of active scalp infection or inflammation, and agreement on tone and density before the first session.',
            'followup'      => 'Review between sessions as density is layered, and periodic touch-up sessions as pigment fades over time.',
            'expectedPrognosis' => 'Scalp micropigmentation adds no hair and does not treat or halt hair loss, which continues beneath the pigment. The pigment usually lasts for years but is not permanent in appearance: it fades and may shift in tone over years, and touch-up sessions are required. Removal is difficult, slow and may be incomplete. Results depend substantially on operator technique and cannot be promised.',
        ]),
        schema_faq('/scalp-micropigmentation-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Scalp micropigmentation in Gurgaon</span>
        <h1 class="h1 mt-3">Scalp Micropigmentation Adds No Hair, and That Is the Point</h1>
        <p class="lead mt-3 measure">It is a cosmetic tattoo. Tiny dots of pigment reduce the contrast between your scalp and your hair, so thinning can read as denser and scars can become less noticeable. It spends no donor supply, which is exactly why it belongs in plans where grafts are the scarce resource.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-track="book"><?= icon('calendar', 18) ?> Book an Assessment</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Costs no donor hair at all',
            'Density built gradually across sessions',
            'Hairline design agreed before the first session',
            'Consultations at our Sector 39, Gurugram clinic',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-consultation-768.webp" srcset="/assets/img/services/svc-consultation-512.webp 512w, /assets/img/services/svc-consultation-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a dermatoscope and a notepad with a pencil on a wooden desk beside a potted fern" width="768" height="960" loading="eager" fetchpriority="high">
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
      <div class="card"><?= icon('shield', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">No donor hair spent</p><p class="body-s mt-2">Your finite graft supply stays intact.</p></div>
      <div class="card"><?= icon('pencil', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Design agreed first</p><p class="body-s mt-2">Hairline position settled before any pigment.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Built up gradually</p><p class="body-s mt-2">Too dark too early is the hard mistake to fix.</p></div>
      <div class="card"><?= icon('clock', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Maintenance explained</p><p class="body-s mt-2">Fading and touch-ups stated upfront.</p></div>
      <div class="card"><?= icon('info', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Told what it commits you to</p><p class="body-s mt-2">Including keeping hair short, where that applies.</p></div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-unshaven',
    'alt'     => 'a white mannequin head seen from the front, with short dark hair and a dotted line pencilled along the hairline',
    'eyebrow' => 'The basics, plainly',
    'title'   => 'What It Is and What It Does',
    'id'      => 'what-is',
    'html'    => '<p>Scalp micropigmentation deposits tiny points of pigment into the scalp. Each dot is sized and placed to read, at normal viewing distance, like the cross-section of a short hair emerging from the skin.</p>'
               . '<p>The effect is entirely about contrast. Thinning hair looks thin largely because pale scalp shows through dark hair; darken the scalp and the same amount of hair looks considerably denser, without a single hair having been added.</p>'
               . '<p>It is not a treatment for hair loss. Nothing about it slows, stops or reverses the process underneath, which carries on exactly as it would have done. The same principle has three distinct uses:</p>',
    'points'  => [
        'The appearance of a closely shaved head across an area of real baldness',
        'Apparent density under hair that is thinning but present',
        'Scar camouflage, by reducing the contrast between pale scar tissue and the scalp around it',
    ],
]) ?>

<?= lp_split([
    'img'     => 'intro-donor',
    'alt'     => 'a mannequin head seen from behind, with the donor area at the back and sides marked',
    'eyebrow' => 'The advantage that matters',
    'title'   => 'It Costs You No Donor Hair',
    'id'      => 'no-donor',
    'tone'    => 'canvas',
    'reverse' => true,
    'html'    => '<p>Every graft placed by a transplant comes out of a permanent, finite supply at the back and sides of your head. Pigment draws on none of it.</p>'
               . '<p>For someone with limited donor supply and a large area to improve — a wide crown especially — that is not a minor point. It is often the difference between a workable plan and an unaffordable one, and it is why pigment appears so often alongside surgery rather than instead of it.</p>',
    'points'  => [
        'Your finite graft supply stays intact',
        'Often planned alongside surgery, not instead of it',
    ],
]) ?>

<section class="section section--white" id="uses">
  <div class="wrap">
    <p class="eyebrow">Applications</p>
    <h2 class="h2 mt-2">The Three Things It Is Genuinely Good At</h2>
    <div class="grid grid--3 mt-5">
      <div class="card"><p class="h4">The shaved-head look</p><p class="body-s mt-2">Across established baldness, pigment can replicate the appearance of closely cropped hair. It is the most visible change and the one with the biggest commitment attached: the surrounding hair has to stay short for the illusion to hold.</p></div>
      <div class="card"><p class="h4">Density under thinning hair</p><p class="body-s mt-2">Where hair is thinning but present, darkening the scalp beneath removes the contrast that makes it look sparse. Subtle, low-commitment, and frequently the most useful application for people not ready for surgery.</p></div>
      <div class="card"><p class="h4">Scar camouflage</p><p class="body-s mt-2">Linear donor scars from strip surgery and dot scarring from over-aggressive extraction both stand out because they are paler than the scalp around them. Reducing that contrast can make them less noticeable.</p></div>
    </div>
    <div class="card card--pad-lg mt-6">
      <p class="eyebrow">Where it fits with surgery</p>
      <h3 class="h3 mt-2">Usually alongside, not instead</h3>
      <p class="body mt-3 measure">The combination that works well: grafts placed where hair genuinely needs to exist and be styled, pigment used where the area only needs to look denser or where a boundary needs blending. That divides the work according to what each tool is actually good at, and it stretches a limited donor supply considerably further.</p>
      <p class="body mt-3 measure">It is a standard part of the conversation on <a href="/crown-hair-transplant-in-gurgaon">crown restoration</a>, where grafts are consumed fastest, and on <a href="/hair-transplant-repair-in-gurgaon">repair cases</a>, where the donor is often already depleted.</p>
    </div>

    <div class="measure mt-6">
      <h3 class="h3" id="smp-vs-transplant">SMP vs Hair Transplant vs Hair System</h3>
      <p class="body mt-3">Three ways of dealing with visible scalp, and they are not interchangeable. Pigment changes the contrast, a transplant moves real hair, and a hair system covers the area with hair that is not growing from your scalp.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data data--wide">
          <caption class="sr-only">Scalp micropigmentation, hair transplant and a hair system compared: what each is, whether it adds hair, donor use, the look, upkeep, reversibility, what is involved and common combinations — a general guide</caption>
          <thead><tr><th scope="col">What differs</th><th scope="col">SMP</th><th scope="col">Hair transplant</th><th scope="col">Hair system</th></tr></thead>
          <tbody>
            <?php foreach ($smpRows as $r): ?>
            <tr><th scope="row" style="white-space:normal;width:19%"><?= e($r[0]) ?></th><td><?= e($r[1]) ?></td><td><?= e($r[2]) ?></td><td><?= e($r[3]) ?></td></tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">Whether a transplant is realistic depends on your donor area: <a href="/hair-transplant-in-gurgaon">hair transplant in Gurgaon</a> explains how that is assessed, and the <a href="/hair-transplant-graft-calculator">hair transplant graft calculator</a> gives a rough range of the grafts your pattern typically needs, which shows how much donor a transplant would spend.</p>
  </div>
</section>

<section class="section section--canvas" id="honest">
  <div class="wrap">
    <p class="eyebrow">Before you commit</p>
    <h2 class="h2 mt-2">Limitations and Commitments to Know First</h2>
    <p class="body-l mt-3 measure">None of these are reasons not to have it. They are reasons to go in with your eyes open, because the decision is close to irreversible.</p>
    <div class="grid grid--2 mt-5">
      <div class="card card--pad-lg">
        <p class="h4">It fades, and it needs topping up</p>
        <p class="body-s mt-2">Pigment softens over years and can shift in tone. Touch-up sessions are part of owning it, not evidence that something went wrong. Budget for them.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Removal is difficult</p>
        <p class="body-s mt-2">Laser removal over multiple sessions is possible, slow, and sometimes incomplete. Do not treat it as a reversible experiment. Be certain about the hairline before the first session.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">The hairline ages with you</p>
        <p class="body-s mt-2">A pigmented hairline placed too low or too aggressively has exactly the same problem as a surgical one placed badly, except it also does not grow. Design for the face you will have later.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">It commits you to short hair</p>
        <p class="body-s mt-2">Where it is creating a shaved look, growing the surrounding hair out breaks the match between pigment dots and stubble. That is a lasting style commitment worth thinking about honestly.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Operator skill decides everything</p>
        <p class="body-s mt-2">Dot size, depth, spacing and pigment tone all have to be right. Poor work is visible, and it is far harder to fix than to avoid. Look at healed results, not fresh ones.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Hair loss continues underneath</p>
        <p class="body-s mt-2">Pigment does not treat anything. If your loss is still progressing, the area needing coverage will keep growing, and the plan has to anticipate that.</p>
      </div>
    </div>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'The process',
    'title'   => 'How Treatment Is Built',
    'id'      => 'journey',
    'tone'    => 'white',
    'steps'   => [
        ['img' => 'stage-crown',   'alt' => 'a mannequin head seen from above with green felt hair and a bald patch at the crown', 'title' => 'Assessment',       'text' => 'Pattern of loss, skin and scalp condition, healing and scarring history, and an honest discussion of whether pigment, grafts or both suit your case.'],
        ['img' => 'step-plan',     'alt' => 'a tablet showing a head diagram with a planned line',                                'title' => 'Design and tone',  'text' => 'Hairline position, density and pigment tone agreed before anything begins — because this is the part that is hard to undo.'],
        ['img' => 'hero',          'alt' => 'a sculpted cross-section of skin with several hair follicles and their roots',       'title' => 'Layered sessions', 'text' => 'Density built gradually across several sessions spaced days to weeks apart. Deliberately conservative early, because adding is easy and removing is not.'],
        ['img' => 'step-followup', 'alt' => 'a desk calendar with review dates circled',                                         'title' => 'Maintenance',      'text' => 'Review as it settles, then periodic touch-ups over the years as the pigment fades. Planned from the start rather than raised later.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-skin',
    'alt'     => 'a sculpted cross-section of skin layers with a single hair follicle, set against a pale circle',
    'eyebrow' => 'Safety and suitability',
    'title'   => 'What Is Checked Beforehand',
    'id'      => 'safety',
    'tone'    => 'canvas',
    'html'    => '<p>This is a tattooing procedure, so the safety considerations are those of tattooing: sterile technique, single-use needles, pigment quality and the competence of the person holding the device.</p>'
               . '<p>Clinically, it is not appropriate over active scalp infection or inflammation, and any skin condition affecting the scalp needs assessing first. Reactions to tattoo pigment are uncommon but recognised.</p>'
               . '<p>Aftercare matters more than people expect: the scalp is kept dry and untouched for a defined period, sun exposure is avoided, sweating, swimming and steam are paused, and nothing is picked or scratched as it settles. Ignoring this affects how the pigment settles and how long it lasts. Tell us about:</p>',
    'points'  => [
        'Any keloid or abnormal scarring history',
        'Skin conditions affecting the scalp',
        'Previous reactions to tattoo pigment',
        'Medication or conditions affecting healing or bleeding',
    ],
]) ?>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">Scalp Micropigmentation Cost in Gurgaon</h2>
        <p class="body mt-3 measure">Cost follows the area being covered and the number of sessions the plan requires, so it is quoted after assessment. Touch-ups over the following years are a real part of the total and are discussed at the start rather than presented later.</p>
        <div class="grid grid--2 mt-5">
          <div class="card"><p class="h4">Area covered</p><p class="body-s mt-2">A scar, a crown, or a full shaved-look treatment</p></div>
          <div class="card"><p class="h4">Sessions required</p><p class="body-s mt-2">Density is layered, so several are normal</p></div>
          <div class="card"><p class="h4">Complexity</p><p class="body-s mt-2">Scar tissue behaves differently and needs care</p></div>
          <div class="card"><p class="h4">Maintenance</p><p class="body-s mt-2">Periodic touch-ups as pigment fades</p></div>
        </div>
        <p class="body-s mt-4 measure">Compare on healed results rather than price. Photographs taken immediately after a session look darker and sharper than the same work does months later, and the difference between competent and poor pigmentation is not visible on day one.</p>
        <p class="body mt-3 measure">See <a href="/cost-and-emi-options">cost and payment options</a>.</p>
        <div class="card card--pad-lg mt-5">
          <h3 class="h4">Questions worth asking anyone offering SMP</h3>
          <p class="body-s mt-2">They apply wherever you go.</p>
          <div class="mt-3"><?= ticks([
              'Who will do the pigmentation, and what training do they have?',
              'Are single-use needles used for every session?',
              'How many sessions are planned, and how far apart?',
              'Which pigment tone is chosen, and how might it change over the years?',
              'Where will the hairline sit, and how will it look as I get older?',
              'How often will touch-ups be needed, and are they in the estimate?',
          ], false) ?></div>
        </div>
      </div>
      <div class="cta-band" style="display:block">
        <h3 class="h3">Find Out If It Suits Your Case</h3>
        <p class="body mt-3">Send photos of the area concerned in daylight — including any scarring — and tell us how you currently wear your hair and how you would like to.</p>
        <a class="btn btn--block btn--accent mt-5" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Send photos on WhatsApp</a>
        <a class="btn btn--block btn--ghost mt-3" href="/book-consultation" data-book data-track="book">Book an assessment</a>
        <p class="body-s mt-4">Your details are used only to arrange your consultation.</p>
      </div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Consultations are carried out by registered medical practitioners at the clinic. Where pigment is being considered, it is discussed alongside the surgical options, so that donor supply can be planned as a whole.'
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Scalp Micropigmentation FAQs</h2>
        <p class="body-s mt-3">Answers are general patient education. Whether pigment, grafts or a combination suits your case is decided at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'Scalp Pigmentation Planning at Our Gurgaon Clinic',
    'Assessment and planning happen at our Sector 39 clinic in Gurugram, alongside the surgical options, so the two can be considered together. Consultations are carried out by registered medical practitioners.'
) ?>

<?= lp_cta([
    'eyebrow'   => 'Sector 39, Gurugram',
    'title'     => 'Find Out Whether Pigment, Grafts or Both Make Sense',
    'text'      => 'Come in and have the area assessed against your donor supply. You will get an honest view of what pigment can do, what it commits you to, and whether a combined plan would stretch your options further.',
    'treatment' => 'Not sure — please advise',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
