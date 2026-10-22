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
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

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
     'a' => 'It is long-lasting but not permanent in appearance. Pigment fades over years and can shift in tone, so touch-up sessions are part of the commitment rather than a sign something went wrong. Anyone selling it as a one-off permanent solution is understating the maintenance.'],
    ['q' => 'Can it be removed if I do not like it?',
     'a' => 'With difficulty. Removal is possible with laser treatment over multiple sessions, but it is slow, incomplete in some cases, and not something to rely on as a safety net. Treat the decision as close to permanent, and be certain about the hairline design before you start.'],
    ['q' => 'Do I have to keep my hair short?',
     'a' => 'If it is being used to create a shaved-head look, yes. The illusion works because the pigment dots match the appearance of stubble, and growing the surrounding hair longer breaks that match. Where it is being used to add apparent density under existing hair, that constraint does not apply in the same way.'],
    ['q' => 'How many sessions does it take?',
     'a' => 'It is normally built across several sessions spaced some days or weeks apart, layering the density gradually rather than achieving it in one sitting. That is deliberate — going too dark too early is far harder to correct than adding more later.'],
    ['q' => 'Does it hurt?',
     'a' => 'Most people describe it as uncomfortable rather than painful, and it varies across the scalp. Sessions are long, which is often the harder part.'],
    ['q' => 'Is it safe?',
     'a' => 'It is a tattooing procedure, so the relevant considerations are hygiene, single-use needles, pigment quality and operator competence. Reactions to pigment are uncommon but possible. It is not appropriate over active scalp infection or inflammation, and conditions affecting healing or scarring, including a tendency to keloid, need discussing beforehand.'],
    ['q' => 'Will it work on scars?',
     'a' => 'Often, and it is one of its better uses. Reducing the contrast between a pale scar and the surrounding scalp makes a linear donor scar or dot scarring much less noticeable. Pigment can behave differently in scar tissue than in normal skin, so it is approached carefully and usually tested.'],
    ['q' => 'How much does scalp micropigmentation cost in Gurgaon?',
     'a' => 'It depends on the area being treated and the number of sessions required, so it is quoted after assessment. Whether it is the right option for you at all is the more important question, and that is settled first.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Treatments', 'url' => '/hair-fall-treatment-in-gurgaon'],
    ['name' => 'Scalp micropigmentation in Gurgaon'],
];

$page = [
    'title'       => 'Scalp Micropigmentation in Gurgaon | DenceSpot',
    'description' => 'Scalp micropigmentation in Gurgaon explained honestly. A cosmetic tattoo that adds apparent density and hides scarring without spending any donor hair.',
    'url'         => '/scalp-micropigmentation-in-gurgaon',
    'crumbs'      => $crumbs,
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
            'expectedPrognosis' => 'Scalp micropigmentation adds no hair and does not treat or halt hair loss, which continues beneath the pigment. The appearance is long-lasting but not permanent: pigment fades and may shift in tone over years, and touch-up sessions are required. Removal is difficult, slow and may be incomplete. Results depend substantially on operator technique and are not guaranteed.',
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
        <p class="lead mt-3 measure">It is a cosmetic tattoo. Tiny dots of pigment reduce the contrast between your scalp and your hair, so thinning reads as denser and scars stop catching the eye. It spends no donor supply, which is exactly why it belongs in plans where grafts are the scarce resource.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-track="book"><?= icon('calendar', 18) ?> Book an Assessment</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Costs no donor hair at all',
            'Density built gradually across sessions',
            'Hairline design agreed before the first session',
            NAP_LOCALITY . ' · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow"><img src="/assets/img/clinic-equipment.jpg" alt="Precision pigment application equipment used for scalp treatments at DenceSpot Clinic, Gurugram" width="800" height="1000" loading="eager"></div>
        <div class="hero__badge-card">
          <p class="eyebrow">Assessed &amp; planned by</p>
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
      <div class="card"><?= icon('shield', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">No donor hair spent</p><p class="body-s mt-2">Your finite graft supply stays intact.</p></div>
      <div class="card"><?= icon('pencil', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Design agreed first</p><p class="body-s mt-2">Hairline position settled before any pigment.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Built up gradually</p><p class="body-s mt-2">Too dark too early is the hard mistake to fix.</p></div>
      <div class="card"><?= icon('clock', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Maintenance explained</p><p class="body-s mt-2">Fading and touch-ups stated upfront.</p></div>
      <div class="card"><?= icon('info', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Told what it commits you to</p><p class="body-s mt-2">Including keeping hair short, where that applies.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="what-is">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">The basics, plainly</p>
        <h2 class="h2 mt-2">What It Is and What It Does</h2>
        <p class="body-l mt-3 measure">Scalp micropigmentation deposits tiny points of pigment into the scalp. Each dot is sized and placed to read, at normal viewing distance, like the cross-section of a short hair emerging from the skin.</p>
        <p class="body-l mt-3 measure">The effect is entirely about contrast. Thinning hair looks thin largely because pale scalp shows through dark hair, and the eye reads that contrast as sparseness. Darken the scalp and the same amount of hair looks considerably denser, without a single hair having been added.</p>
        <p class="body-l mt-3 measure">That principle produces three distinct uses: creating the appearance of a closely shaved head across an area of real baldness, adding apparent density under hair that is thinning but present, and camouflaging scars by reducing the contrast between pale scar tissue and surrounding scalp.</p>
        <p class="body-l mt-3 measure">It is worth restating what it is not. It is not a treatment for hair loss. Nothing about it slows, stops or reverses the process underneath, which carries on exactly as it would have done.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow">The advantage that matters</p>
        <h3 class="h3 mt-2">It costs you no donor hair</h3>
        <p class="body mt-3">Every graft placed by a transplant comes out of a permanent, finite supply at the back and sides of your head.</p>
        <p class="body mt-3">Pigment draws on none of it. For someone with limited donor supply and a large area to improve — a wide crown especially — that is not a minor point. It is often the difference between a workable plan and an unaffordable one.</p>
        <p class="body mt-3">This is why it appears so often alongside surgery rather than instead of it.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="uses">
  <div class="wrap">
    <p class="eyebrow">Applications</p>
    <h2 class="h2 mt-2">The Three Things It Is Genuinely Good At</h2>
    <div class="grid grid--3 mt-5">
      <div class="card"><p class="h4">The shaved-head look</p><p class="body-s mt-2">Across established baldness, pigment can replicate the appearance of closely cropped hair. It is the most transformative use and the one with the biggest commitment attached: the surrounding hair has to stay short for the illusion to hold.</p></div>
      <div class="card"><p class="h4">Density under thinning hair</p><p class="body-s mt-2">Where hair is thinning but present, darkening the scalp beneath removes the contrast that makes it look sparse. Subtle, low-commitment, and frequently the most useful application for people not ready for surgery.</p></div>
      <div class="card"><p class="h4">Scar camouflage</p><p class="body-s mt-2">Linear donor scars from strip surgery and dot scarring from over-aggressive extraction both stand out because they are paler than the scalp around them. Reducing that contrast makes them substantially less noticeable.</p></div>
    </div>
    <div class="card card--pad-lg mt-6">
      <p class="eyebrow">Where it fits with surgery</p>
      <h3 class="h3 mt-2">Usually alongside, not instead</h3>
      <p class="body mt-3 measure">The combination that works well: grafts placed where hair genuinely needs to exist and be styled, pigment used where the area only needs to look denser or where a boundary needs blending. That divides the work according to what each tool is actually good at, and it stretches a limited donor supply considerably further.</p>
      <p class="body mt-3 measure">It is a standard part of the conversation on <a href="/crown-hair-transplant-in-gurgaon">crown restoration</a>, where grafts are consumed fastest, and on <a href="/hair-transplant-repair-in-gurgaon">repair cases</a>, where the donor is often already depleted.</p>
    </div>
  </div>
</section>

<section class="section section--canvas" id="honest">
  <div class="wrap">
    <p class="eyebrow">Before you commit</p>
    <h2 class="h2 mt-2">The Parts Marketing Pages Leave Out</h2>
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

<section class="section section--ink" id="journey">
  <div class="wrap">
    <p class="eyebrow" style="color:var(--accent)">The process</p>
    <h2 class="h2 mt-2" style="color:#fff">How Treatment Is Built</h2>
    <div class="grid grid--4 mt-6">
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 01</p><p class="h4 mt-2" style="color:#fff">Assessment</p><p class="body-s mt-2">Pattern of loss, skin and scalp condition, healing and scarring history, and an honest discussion of whether pigment, grafts or both suit your case.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 02</p><p class="h4 mt-2" style="color:#fff">Design and tone</p><p class="body-s mt-2">Hairline position, density and pigment tone agreed before anything begins — because this is the part that is hard to undo.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 03</p><p class="h4 mt-2" style="color:#fff">Layered sessions</p><p class="body-s mt-2">Density built gradually across several sessions spaced days to weeks apart. Deliberately conservative early, because adding is easy and removing is not.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 04</p><p class="h4 mt-2" style="color:#fff">Maintenance</p><p class="body-s mt-2">Review as it settles, then periodic touch-ups over the years as the pigment fades. Planned from the start rather than raised later.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="safety">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Safety and suitability</p>
        <h2 class="h2 mt-2">What Is Checked Beforehand</h2>
        <p class="body-l mt-3 measure">This is a tattooing procedure, so the safety considerations are those of tattooing: sterile technique, single-use needles, pigment quality and the competence of the person holding the device.</p>
        <p class="body-l mt-3 measure">Clinically, it is not appropriate over active scalp infection or inflammation, and any skin condition affecting the scalp needs assessing first. A history of keloid or abnormal scarring is important to disclose, as are conditions and medications that affect healing.</p>
        <p class="body-l mt-3 measure">Reactions to tattoo pigment are uncommon but recognised, and your history of any previous reaction is relevant.</p>
        <p class="body mt-3 measure">Aftercare matters more than people expect. The scalp is kept dry and untouched for a defined period, sun exposure is avoided, and sweating, swimming and steam are paused. Ignoring this affects how the pigment settles and how long it lasts.</p>
      </div>
      <div>
        <div class="card card--pad-lg">
          <p class="h4">Tell us about</p>
          <?= ticks([
              'Any keloid or abnormal scarring history',
              'Skin conditions affecting the scalp',
              'Previous reactions to tattoo pigment',
              'Medication affecting healing or bleeding',
          ], false) ?>
        </div>
        <div class="card card--pad-lg mt-4">
          <p class="h4">Aftercare basics</p>
          <?= ticks([
              'Keep the scalp dry as instructed',
              'No sun exposure on the treated area',
              'No swimming, saunas or heavy sweating',
              'Do not pick or scratch as it settles',
          ], false) ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Why pigment gets discussed in surgical consultations here: donor hair is the scarce resource in every hair restoration plan, and the crown in particular can consume an enormous number of grafts for a result that pigment could partly deliver at no donor cost. Treating micropigmentation as a serious option rather than a lesser alternative usually produces a better plan — grafts spent where hair has to be real and stylable, pigment used where the area only needs to stop reading as bald.'
) ?>

<section class="section section--canvas" id="cost">
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
      </div>
      <div class="card card--ink card--pad-lg">
        <h3 class="h3">Find Out If It Suits Your Case</h3>
        <p class="body mt-3">Send photos of the area concerned in daylight — including any scarring — and tell us how you currently wear your hair and how you would like to.</p>
        <a class="btn btn--block btn--accent mt-5" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Send photos on WhatsApp</a>
        <a class="btn btn--block btn--ghost mt-3" href="/book-consultation" data-track="book">Book an assessment</a>
        <p class="body-s mt-4">Your details are used only to arrange your consultation.</p>
      </div>
    </div>
  </div>
</section>

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
    'Assessment and planning happen at our Sector 39 clinic in Gurugram, alongside the surgical options, so the two can be considered together. Patients travel to us from across Gurugram and neighbouring parts of South Delhi.'
) ?>

<?= cta_band(
    'Find Out Whether Pigment, Grafts or Both Make Sense',
    'Come in and have the area assessed against your donor supply. You will get an honest view of what pigment can do, what it commits you to, and whether a combined plan would stretch your options further.',
    'scalp-micropigmentation',
    ['Scalp micropigmentation — density', 'Shaved-look pigmentation', 'Scar camouflage', 'Alongside a transplant', 'Not sure — please advise']
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
