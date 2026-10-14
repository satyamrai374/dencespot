<?php
/**
 * /eyebrow-transplant-in-gurgaon
 *
 * Surgical spoke off /hair-transplant-in-gurgaon. Distinct enough from the
 * scalp pages to stand alone: the extraction is the same, everything after it
 * is different — single-hair grafts, a near-flat implant angle, direction that
 * changes three times across one brow, and hair that keeps growing at scalp
 * rate and therefore needs trimming for life.
 *
 * Cannibalisation split: the hub owns "hair transplant in Gurgaon", the
 * technique pages own FUE/DHI. This page owns "eyebrow transplant" and the
 * questions specific to brows — trimming, direction, and the fact that active
 * alopecia areata rules the procedure out until it is quiet.
 *
 * Deliberately not published here: any density figure per brow, any success
 * percentage, any before/after count. None of it is evidenced for this clinic.
 *
 * 14 Oct 2026: landing-page layout (lp_split / lp_steps / lp_cta); every image
 * is an AI illustration with its visible label. Per the client, this Gurugram
 * page never mentions the Rohini clinic.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

// "Transplant vs microblading vs growth treatment" reference table:
// [what differs, transplant, microblading, growth treatment]. General guide only.
$browRows = [
    ['What it is', 'Scalp hair follicles moved into the brow, one at a time', 'Fine strokes of pigment placed in the skin', 'Finding and treating the cause, so your own brow hair can regrow'],
    ['Adds real hair?', 'Yes, living hair that grows', 'No, pigment only', 'Only your own, if the follicles still work'],
    ['Usually suits', 'Follicles lost for good: years of plucking, scars, brows that were always sparse', 'Wanting shape or colour without surgery', 'Recent over-plucking, thyroid-related thinning, regrowth after chemotherapy'],
    ['When you see a change', 'Shedding first; growth from three to four months, settling over eight to twelve', 'Straight away, softening as it heals', 'Over months, once the cause is treated'],
    ['Upkeep', 'Trimming every one to two weeks, for life', 'Fades; touch-ups are needed', 'Depends on the cause'],
    ['Uses donor hair?', 'Yes, from the back of the scalp', 'No', 'No'],
    ['What is involved', 'Day-case surgery under local anaesthetic', 'Cosmetic tattooing, no surgery', 'Assessment, any tests needed, then treatment of the cause'],
];

$faqs = [
    ['q' => 'What is an eyebrow transplant?',
     'a' => 'Hair follicles are taken from the back of the scalp, separated into single-hair grafts under magnification, and placed into the brow one at a time at the angle and direction that brow hair naturally grows. It is a day-case procedure under local anaesthetic.'],
    ['q' => 'Where does the hair come from?',
     'a' => 'Almost always the back of the scalp, in the same donor zone used for a scalp transplant. Scalp hair is the closest reliable match available in quantity. Because it keeps the growth characteristics of the donor site, it grows longer than native brow hair and needs regular trimming.'],
    ['q' => 'Will I have to trim my eyebrows afterwards?',
     'a' => 'Yes, and this is the single most important thing to understand before booking. Native brow hair has a short growth cycle and stops at brow length on its own. Transplanted scalp hair does not — it keeps growing. Most people trim every one to two weeks, permanently. If that is not acceptable to you, this is not the right procedure.'],
    ['q' => 'How many grafts does an eyebrow transplant need?',
     'a' => 'It depends entirely on how much brow is missing and what shape is being restored, and it is decided from the drawn design rather than from a standard number. Partial gaps need far fewer than a brow being rebuilt from almost nothing. The count comes from the plan agreed with you, not from a price list.'],
    ['q' => 'Does an eyebrow transplant look natural?',
     'a' => 'It can, and the variables are angle, direction and restraint. Brow hairs lie almost flat against the skin rather than standing up like scalp hair, and they change direction across the brow — upward at the inner end, flattening through the body, angling down towards the tail. Getting those right matters more than the graft count. Packing a brow too densely is what makes work look transplanted. Results vary between patients, and no particular appearance can be promised.'],
    ['q' => 'Is an eyebrow transplant permanent?',
     'a' => 'The transplanted follicles generally persist, in the same way donor hair does on the scalp. Not every graft survives, and a second smaller session is sometimes planned to refine shape or add density once the first has matured.'],
    ['q' => 'Am I a candidate if I have alopecia areata?',
     'a' => 'Not while the condition is active. Alopecia areata can affect transplanted hair exactly as it affected the original, and operating during an active phase risks losing the grafts. It needs to be assessed, treated and stable for a sustained period before surgery is even discussed. This is one of the more common reasons we advise against proceeding.'],
    ['q' => 'Can eyebrows be restored after over-plucking?',
     'a' => 'Often, yes. Years of plucking or threading can permanently damage follicles, and where the hair has not returned on its own after a long period it is unlikely to. That is a common and generally straightforward indication, assuming the skin is healthy and there is no active inflammatory condition.'],
    ['q' => 'What about scars or burns in the brow?',
     'a' => 'Grafting into scar tissue is possible but less predictable, because scarred skin has a poorer blood supply than normal skin and graft survival is lower. It is usually approached conservatively, sometimes across two sessions, and the likely outcome is discussed frankly before you decide.'],
    ['q' => 'How long does the procedure take?',
     'a' => 'Typically a few hours for both brows, depending on the number of grafts. It is a day case — you arrive, it is done under local anaesthetic, and you go home the same day.'],
    ['q' => 'Is it painful?',
     'a' => 'The anaesthetic injections around the brow are usually the most uncomfortable part and are brief. Once the area is numb, pressure and some discomfort can still be felt, and pain tolerance varies. Swelling around the eyes for a few days afterwards is common and settles.'],
    ['q' => 'When will the new eyebrows grow?',
     'a' => 'The transplanted hairs usually shed within the first few weeks while the follicles stay in place. Regrowth generally begins around three to four months, with the shape settling over roughly eight to twelve months. Early growth is patchy and uneven, which is normal and not a sign of failure.'],
    ['q' => 'Can I wear makeup on my eyebrows afterwards?',
     'a' => 'Not immediately. The recipient area needs to be left alone while it heals, and you will be given a specific timeline at your review. Returning to pencil or powder too early risks the grafts and the healing skin.'],
    ['q' => 'How is this different from microblading?',
     'a' => 'Microblading is semi-permanent pigment deposited in the skin — no hair, and it fades and needs redoing. A transplant places living follicles that grow. Microblading is quicker and reversible by fading; a transplant is surgery with a long timeline and a permanent trimming commitment. They solve the same visible problem in very different ways.'],
    ['q' => 'How much does an eyebrow transplant cost in Gurgaon?',
     'a' => 'It follows the graft number in your agreed design, so it is quoted after assessment rather than published as a headline figure. Our <a href="/hair-transplant-cost-in-gurgaon">cost guide</a> explains what moves the number. You get an itemised written estimate before any date is booked.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair transplant', 'url' => '/hair-transplant-in-gurgaon'],
    ['name' => 'Eyebrow transplant in Gurgaon'],
];

$page = [
    'title'       => 'Eyebrow Transplant in Gurgaon: Cost & Recovery | DenceSpot',
    'description' => 'Eyebrow transplant in Gurgaon: single-hair grafts at brow angle, how it compares with microblading, recovery, lifelong trimming and what moves the cost.',
    'url'         => '/eyebrow-transplant-in-gurgaon',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-eyebrow-768.webp',
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/eyebrow-transplant-in-gurgaon', [
            'name'          => 'Eyebrow Transplant',
            'alternateName' => ['Eyebrow hair restoration', 'Eyebrow hair transplant'],
            'procedureType' => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'  => 'Eyebrow',
            'howPerformed'  => 'Follicular units are extracted from the occipital donor area of the scalp and separated under magnification into single-hair grafts. Each graft is placed into the brow individually at an acute angle close to the skin surface, following the changing direction of natural brow hair across the head, body and tail of the brow. Performed as a day case under local anaesthetic.',
            'preparation'   => 'Clinical assessment of the brow and the cause of hair loss, exclusion of active inflammatory or autoimmune skin disease, review of medication, and a brow shape drawn and agreed with the patient before the procedure date.',
            'followup'      => 'Wash and handling instruction in the first week, then scheduled review as the transplanted hair sheds and regrows, with advice on trimming once growth is established.',
            'expectedPrognosis' => 'Transplanted hairs commonly shed within the first weeks; regrowth typically begins around three to four months with the shape settling at approximately eight to twelve months. Transplanted hair retains scalp growth characteristics and requires regular trimming indefinitely. Outcomes vary between patients and cannot be promised.',
        ]),
        schema_faq('/eyebrow-transplant-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Eyebrow transplant in Gurgaon</span>
        <h1 class="h1 mt-3">Eyebrow Transplant in Gurgaon, Designed Hair by Hair</h1>
        <p class="lead mt-3 measure">An eyebrow transplant moves single hairs from the back of your scalp into the brow, one graft at a time, at the angle brow hair actually lies. The extraction is ordinary. Everything after it is not — direction changes three times across one brow, and the hair you gain will need trimming for the rest of your life.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-treatment="Eyebrow transplant" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Single-hair grafts, placed individually',
            'Shape drawn and agreed before surgery',
            'Day-case procedure under local anaesthetic',
            'At our clinic in Sector 39, Gurugram',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-eyebrow-768.webp" srcset="/assets/img/services/svc-eyebrow-512.webp 512w, /assets/img/services/svc-eyebrow-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: an eyebrow drawn in fine individual hairs on a pale, rounded cream surface" width="768" height="960" loading="eager" fetchpriority="high">
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
      <div class="card"><?= icon('pencil', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Shape drawn first</p><p class="body-s mt-2">Agreed with you before a single graft is taken.</p></div>
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Single-hair grafts</p><p class="body-s mt-2">Split under magnification, never placed in clumps.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Restraint over density</p><p class="body-s mt-2">Over-packing is what makes a brow look done.</p></div>
      <div class="card"><?= icon('clock', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Home the same day</p><p class="body-s mt-2">Local anaesthetic, no overnight stay.</p></div>
      <div class="card"><?= icon('info', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Told if it is wrong for you</p><p class="body-s mt-2">Active alopecia areata is a reason to wait.</p></div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'intro-donor',
    'alt'     => 'a mannequin head seen from behind, with the donor area at the back and sides marked',
    'eyebrow' => 'The basics, plainly',
    'title'   => 'What Is an Eyebrow Transplant?',
    'id'      => 'what-is',
    'html'    => '<p>Follicular units are extracted from the donor area at the back of the scalp, exactly as for a scalp procedure, then separated under magnification into individual hairs. A brow is built from single hairs: a two- or three-hair graft produces a tuft, and a tuft reads as surgery from across a room.</p>'
               . '<p>Each hair goes into its own tiny site, made at an acute angle close to flat against the skin, because that is how brow hair grows. Placing brow grafts at a scalp angle is one of the most common reasons a technically successful transplant still looks wrong.</p>'
               . '<p>Direction matters as much as angle, and it is not constant: at the inner end hairs sweep upward, through the body they flatten and run outward, and towards the tail they angle downward. A brow is a sequence of design decisions, made site by site along its length.</p>',
    'points'  => [
        'Single-hair grafts only, placed one at a time',
        'Local anaesthetic, as a day case: you are awake, and go home afterwards',
        'A few hours, depending on the number of grafts',
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-hair-fall',
    'alt'     => 'a wooden comb resting on folded linen towels by a window',
    'eyebrow' => 'Before you read further',
    'title'   => 'The Trimming Commitment',
    'id'      => 'trimming',
    'tone'    => 'canvas',
    'reverse' => true,
    'html'    => '<p>Native brow hair has a short growth cycle: it reaches brow length and stops on its own. Transplanted hair comes from your scalp and keeps scalp behaviour, so it does not stop.</p>'
               . '<p>This is permanent, it is not a complication, and it is not something we can design around. If lifelong trimming is not something you want, say so at consultation and we will tell you honestly that this is not your procedure.</p>',
    'points'  => [
        'Most people trim every one to two weeks',
        'That does not end',
        'Explained upfront, before anything is booked',
    ],
]) ?>

<section class="section section--white" id="candidacy">
  <div class="wrap">
    <p class="eyebrow">Suitability</p>
    <h2 class="h2 mt-2">Who an Eyebrow Transplant Suits</h2>
    <p class="body-l mt-3 measure">Brows go missing for very different reasons, and the reason decides whether surgery is sensible or premature. The assessment exists to establish which.</p>
    <div class="grid grid--3 mt-5">
      <div class="card"><p class="h4">Long-term over-plucking</p><p class="body-s mt-2">Years of plucking or threading can permanently damage follicles. Where hair has not returned after a long period on its own, it generally will not. This is a common and straightforward indication.</p></div>
      <div class="card"><p class="h4">Naturally sparse brows</p><p class="body-s mt-2">Some people simply have little brow hair and always have. There is nothing to treat medically, and grafting adds what was never there.</p></div>
      <div class="card"><p class="h4">Trauma or surgical scars</p><p class="body-s mt-2">Possible, but graft survival in scar tissue is lower because the blood supply is poorer. Usually approached conservatively and sometimes staged.</p></div>
      <div class="card"><p class="h4">Burns</p><p class="body-s mt-2">Assessed case by case. Depth and maturity of the burn scar decide feasibility, and the honest answer is sometimes no.</p></div>
      <div class="card"><p class="h4">After chemotherapy</p><p class="body-s mt-2">Brow hair very often returns on its own. Surgery is not considered until well after treatment ends and regrowth has been given proper time.</p></div>
      <div class="card"><p class="h4">Thyroid-related loss</p><p class="body-s mt-2">Thyroid disease classically thins the outer third of the brow. The thyroid is investigated and treated first, because the hair frequently recovers once the underlying problem does.</p></div>
    </div>

    <div class="card card--pad-lg mt-6">
      <p class="eyebrow">When we will tell you to wait</p>
      <h3 class="h3 mt-2">Active alopecia areata is a stop, not a caution</h3>
      <p class="body mt-3 measure">Alopecia areata is an autoimmune condition that attacks hair follicles, and it does not distinguish between the hair that was there and the hair you paid to move. Operating during an active phase risks losing the grafts and spending donor supply for nothing. It needs assessment, treatment and a sustained quiet period before surgery is even a conversation. If that is your diagnosis, the right first step is <a href="/alopecia-areata-treatment-in-gurgaon">treating the alopecia areata</a>, not booking a transplant.</p>
      <p class="body mt-3 measure">The same principle applies to any active inflammatory skin disease in the brow area. Settle the condition, then consider surgery.</p>
    </div>

    <div class="measure mt-6">
      <h3 class="h3" id="transplant-vs-microblading">Eyebrow Transplant vs Microblading vs Growth Treatment</h3>
      <p class="body mt-3">Three different answers to sparse brows: moving hair in, drawing hair on, or treating whatever stopped your own hair growing. They suit different causes and ask different things of you afterwards.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data data--wide">
          <caption class="sr-only">Eyebrow transplant, microblading and treating the cause of brow loss compared: what each is, whether it adds hair, who it usually suits, timeline, upkeep, donor hair and what is involved — a general guide</caption>
          <thead><tr><th scope="col">What differs</th><th scope="col">Eyebrow transplant</th><th scope="col">Microblading</th><th scope="col">Growth treatment</th></tr></thead>
          <tbody>
            <?php foreach ($browRows as $r): ?>
            <tr><th scope="row" style="white-space:normal;width:19%"><?= e($r[0]) ?></th><td><?= e($r[1]) ?></td><td><?= e($r[2]) ?></td><td><?= e($r[3]) ?></td></tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">The cause comes first: if it can still be treated, a transplant is premature, and if lifelong trimming sounds unworkable, it is the wrong choice whatever the cause.</p>
  </div>
</section>

<?= lp_split([
    'img'     => 'intro-recipient',
    'alt'     => 'a mannequin head seen from the front, with short hair and a planned hairline drawn in pencil',
    'eyebrow' => 'Design',
    'title'   => 'The Shape Is Agreed Before Anything Is Taken',
    'id'      => 'design',
    'tone'    => 'canvas',
    'html'    => '<p>A brow is a facial feature, not a patch of coverage. Shape, arch position, thickness and where the tail ends all change how a face reads, so they are decided with you, drawn on and looked at in a mirror before consent — not improvised on the day.</p>'
               . '<p>Faces are not symmetrical and brows rarely start that way; chasing exactly mirror-image brows usually looks manufactured, so the aim is a matched pair that belongs to your face. Restraint is a design decision too: a natural brow is denser through the body, thins towards the tail and has a soft, slightly irregular edge. Filling that edge in solidly, or asking for a solid block of hair, is exactly what makes work identifiable.</p>',
    'points'  => [
        'Where the brow begins at the inner end',
        'Arch height and where it peaks',
        'Thickness through the body, and where and how the tail tapers out',
        'Direction of hair in each zone',
        'How the two brows relate to each other',
    ],
]) ?>

<?= lp_steps([
    'eyebrow' => 'The process',
    'title'   => 'From Consultation to Settled Brows',
    'id'      => 'journey',
    'tone'    => 'white',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                    'title' => 'Assessment',        'text' => 'Why the brow hair is missing, what the skin is like, what your donor area can spare, and whether anything needs treating first.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned line',    'title' => 'Design',            'text' => 'Shape drawn on, reviewed in a mirror, adjusted and agreed. The graft number follows from the agreed design.'],
        ['img' => 'step-procedure',    'alt' => 'sterile hair-restoration instruments laid out on a tray', 'title' => 'Procedure day',     'text' => 'Extraction, separation into single hairs under magnification, then placement. A few hours, local anaesthetic, home the same day.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with review dates circled',              'title' => 'Growth and review', 'text' => 'Shedding, then regrowth from around three to four months, reviewed with photographs until the shape settles.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-follicle',
    'alt'     => 'a sculpted cross-section of scalp skin showing hair follicles beneath the surface',
    'eyebrow' => 'Recovery',
    'title'   => 'What the First Weeks Look Like',
    'id'      => 'recovery',
    'tone'    => 'canvas',
    'reverse' => true,
    'html'    => '<p>Tiny crusts form around each graft and are visible for several days, and swelling around the eyes is common in the first few days before it settles on its own. Most people are comfortable being seen in public within about a week, though the brows will not look like the finished result for months.</p>'
               . '<p>The transplanted hairs usually shed within the first few weeks, which alarms people who were not warned: the follicle stays in place and regrows. Regrowth typically begins around three to four months, unevenly at first, and the shape settles over roughly eight to twelve months — judging it before then is judging it too early.</p>'
               . '<p>General principles are in our <a href="/hair-transplant-aftercare">recovery and aftercare guide</a>; your own instructions are given to you in writing.</p>',
    'points'  => [
        'Do not rub, scratch or pick the area, and sleep as instructed to limit swelling',
        'No brow makeup until you are told it is safe',
        'No threading, plucking or waxing of the area',
        'No swimming, saunas or heavy sweating, and nothing that puts pressure on the brow',
    ],
]) ?>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">Eyebrow Transplant Cost in Gurgaon</h2>
        <p class="body mt-3 measure">There is no fixed price. The graft number comes out of the design you agree, and the design comes out of the assessment, so a figure quoted before either of those has happened is a guess. We publish the factors and give you an itemised estimate in writing.</p>
        <div class="grid grid--2 mt-5">
          <div class="card"><p class="h4">Number of grafts</p><p class="body-s mt-2">Taken from the agreed design, not a standard package</p></div>
          <div class="card"><p class="h4">One brow or both</p><p class="body-s mt-2">Partial correction differs substantially from a full rebuild</p></div>
          <div class="card"><p class="h4">Condition of the skin</p><p class="body-s mt-2">Scarred or burned skin is slower and less predictable work</p></div>
          <div class="card"><p class="h4">Whether a second session is planned</p><p class="body-s mt-2">Some cases are deliberately staged, and this is stated in the estimate</p></div>
        </div>
        <p class="body-s mt-4 measure">Because brow grafts are single hairs, the count is not comparable with a scalp quote where grafts carry two to four hairs each. Comparing the two on price per graft is comparing different things.</p>
        <p class="body mt-3 measure">For how pricing works across our procedures generally, see the <a href="/hair-transplant-cost-in-gurgaon">hair transplant cost guide</a> and <a href="/cost-and-emi-options">payment and EMI options</a>. The <a href="/hair-transplant-graft-calculator">hair transplant graft calculator</a> is built for scalp pattern loss rather than brows, but if you are weighing scalp work as well, it gives a rough range for that.</p>
        <div class="card card--pad-lg mt-5">
          <h3 class="h4">Questions worth asking any clinic about eyebrows</h3>
          <p class="body-s mt-2">They apply wherever you go, including here.</p>
          <div class="mt-3"><?= ticks([
              'Why is my brow hair missing, and does anything need treating first?',
              'Will the shape be drawn on and agreed before the day?',
              'Will only single-hair grafts be used?',
              'How many grafts does the design need, and is a second session likely?',
              'Who performs the extraction and the placement?',
          ], false) ?></div>
        </div>
      </div>
      <div class="cta-band" style="display:block">
        <h3 class="h3">Get a Personalised Treatment Estimate</h3>
        <p class="body mt-3">Send a clear, well-lit photo of each brow from the front and slightly to the side on WhatsApp, or request a call back. You will get an assessment appointment, not a sales pitch.</p>
        <a class="btn btn--block btn--accent mt-5" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Send photos on WhatsApp</a>
        <a class="btn btn--block btn--ghost mt-3" href="/book-consultation" data-book data-track="book">Request an estimate by form</a>
        <p class="body-s mt-4">Your details are used only to arrange your consultation.</p>
      </div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Consultations and procedures are carried out by registered medical practitioners at the clinic. The brow shape is drawn and agreed with you before any graft is taken.'
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Eyebrow Transplant FAQs</h2>
        <p class="body-s mt-3">Answers are general patient education. Anything specific to your brows or your medical history is answered at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= awards_certificates_section() ?>

<?= local_block(
    'Eyebrow Transplants at Our Gurgaon Clinic',
    'Our Gurugram clinic is in Sector 39, ' . NAP_LANDMARK . '. Consultations and procedures are carried out by registered medical practitioners at the clinic, where the brow design, the procedure and follow-up reviews are arranged.'
) ?>

<?= lp_cta([
    'eyebrow'   => 'Sector 39, Gurugram',
    'title'     => 'Have Your Brow Shape Drawn Before You Decide',
    'text'      => 'Come in and see the shape on your own face before committing to anything. You will get an honest view of whether grafting is right for the reason your brows are sparse, a clear explanation of the lifelong trimming, and a written plan if it is appropriate.',
    'treatment' => 'Eyebrow transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
