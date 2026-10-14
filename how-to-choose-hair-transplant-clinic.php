<?php
/**
 * /how-to-choose-hair-transplant-clinic
 *
 * Oct 2026: /best-hair-transplant-clinic-in-gurgaon was withdrawn (a "best"
 * claim is barred by the NMC Guidelines of 06.10.2026, cl. 8.1(ix)) and now
 * 301s here. This page stays neutral consumer guidance: it must never suggest
 * that DenceSpot is the best, or a better, choice.
 *
 * It owns the portable PROCESS: a stage-by-stage decision guide from first
 * enquiry through consultation to signing, with the actual questions to ask
 * at each point. It is deliberately non-geographic and reads as a tool rather
 * than a pitch, which is also what makes it linkable.
 *
 * It is written to be useful to someone who then chooses a different clinic.
 * That is intentional: a checklist that only validates the clinic hosting it is
 * not a checklist.
 *
 * 14 Oct 2026 — landing-page layout: AI-illustrated hero, two lp_split
 * sections, an lp_steps overview of the four stages and an lp_cta close (each
 * image with its visible AI label). The page presents both clinics.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'What is the single most important question to ask?',
     'a' => 'How was my graft number arrived at? Everything else in the quote depends on that number. A clinic that measured your donor density and mapped the recipient area can explain it in detail. A clinic that estimated from a photograph cannot, and the figure is therefore a sales number rather than a plan.'],
    ['q' => 'How many clinics should I see?',
     'a' => 'At least two, and there is no prize for efficiency here. The procedure is irreversible and spends a resource you cannot replace. Where two clinics propose very different graft numbers for the same head, understanding that difference is worth more than either individual quote.'],
    ['q' => 'How do I check a doctor is properly qualified?',
     'a' => 'Ask for the qualification and the medical council registration number, and verify it independently. This is a routine request. Be cautious of praise words used where a qualification should be: a flattering title or adjective is not a credential.'],
    ['q' => 'Should the doctor perform the whole procedure themselves?',
     'a' => 'Practice varies legitimately, and what matters is that you are told clearly. Ask specifically who makes the recipient sites, who performs extraction and who places the grafts, by name and role. A clinic that answers immediately and specifically is giving you real information.'],
    ['q' => 'What should a written quote contain?',
     'a' => 'The graft number and the areas it covers, the technique, what is included — anaesthesia, medication, dressings, follow-up reviews — and explicitly what is not. It should also state whether a second session is anticipated. You should be able to take it away and think.'],
    ['q' => 'Is a cheaper quote a bad sign?',
     'a' => 'Not by itself, but ask how it is achieved. If it is a low per-graft rate multiplied by a graft count nobody justified, it is not cheaper. If it excludes follow-up, medication or a second session that turns out to be necessary, it is not cheaper either. Compare what is being delivered, not the rate.'],
    ['q' => 'How should I judge before-and-after photographs?',
     'a' => 'Look for consistent lighting, angle, hair length and styling between the two images, and for results photographed at around twelve months. Ask whether the case shown was performed by the person who will perform yours. Our guide on <a href="/blog/how-to-read-before-and-after-photos">reading before-and-after photographs</a> covers this in detail.'],
    ['q' => 'What questions should I ask about risks?',
     'a' => 'What happens if growth is poor. What the shedding phase involves and when it happens. When the result can actually be judged. Whether a second session is likely. What the donor area will look like afterwards. If a consultation covered none of these, it was a sales meeting.'],
    ['q' => 'What are the clearest warning signs?',
     'a' => 'A graft number quoted without examination. A discount that expires. A promised result or a success percentage. Evasiveness about who performs the surgery. Surgery offered despite an active scalp condition or unstable hair loss. Any one of these is reason to slow down.'],
    ['q' => 'Should I worry if a clinic tells me not to have surgery?',
     'a' => 'That is usually a good sign rather than a bad one. Unstable hair loss, active scalp disease and very early loss in a young patient are all real reasons to wait, and saying so costs the clinic the sale. A clinic that has no circumstances in which it declines is worth asking about.'],
    ['q' => 'Does the clinic need to be close to me?',
     'a' => 'It helps more than people expect. Follow-up matters, hair takes about a year to declare itself, and a clinic within reach is one you will actually return to. Travelling far for surgery means the aftercare and reviews are harder to attend.'],
    ['q' => 'How much should reviews influence me?',
     'a' => 'Read the detailed ones rather than counting stars. Look at how the clinic responded to criticism, and be sceptical of clusters of very short five-star entries posted close together. Reviews are one input, and a weaker one than the consultation itself.'],
    ['q' => 'What if I have already paid a deposit and have doubts?',
     'a' => 'Raise them before the date rather than after. Ask the questions you skipped, ask for the written plan again, and get a second opinion if you are still uneasy. Losing a deposit is a smaller loss than an irreversible procedure you were not confident about.'],
    ['q' => 'What should I do immediately after the consultation?',
     'a' => 'Leave without booking, and read the written estimate somewhere else. Anything that seemed persuasive in the room but does not survive a day of thought was persuasion rather than information. A clinic worth choosing will still be there tomorrow.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair transplant', 'url' => '/hair-transplant-in-gurgaon'],
    ['name' => 'How to choose a hair transplant clinic'],
];

$page = [
    'title'       => 'How to Choose a Hair Transplant Clinic | DenceSpot',
    'description' => 'A stage-by-stage guide to choosing a hair transplant clinic: what to check before enquiring, what to ask at consultation, and how to read the quote you are given.',
    'url'         => '/how-to-choose-hair-transplant-clinic',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-hair-transplant-768.webp',
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_faq('/how-to-choose-hair-transplant-clinic', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">A decision guide</span>
        <h1 class="h1 mt-3">How to Choose a Hair Transplant Clinic</h1>
        <p class="lead mt-3 measure">A stage-by-stage guide to a decision you cannot undo. What to establish before you enquire, exactly what to ask in the consultation room, how to read the quote afterwards, and when to walk away. Written to be useful even if you choose someone else.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Ask a Question</a>
        </div>

        <?= ticks([
            'The questions, stage by stage',
            'How to compare two different graft numbers',
            'The warning signs worth leaving over',
            'Applies to any clinic, including this one',
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

<?= lp_split([
    'img'     => 'intro-donor',
    'alt'     => 'a mannequin head seen from behind, with the donor area at the back and sides marked',
    'id'      => 'why',
    'eyebrow' => 'Why this decision is different',
    'title'   => 'Three Things That Make It Unusually High-Stakes',
    'html'    => '<p><strong>It is irreversible.</strong> Grafts are living hair placed in permanent positions: a hairline set too low cannot be raised, and angle cannot be corrected after the site is made. Correction is possible in a limited sense, and it is slow, partial and expensive.</p>'
               . '<p><strong>It spends a finite resource.</strong> Your donor area has to last a lifetime, and grafts taken out cannot be put back. A clinic that inflates the graft number to raise the bill is not merely overcharging you — it is spending something you cannot buy more of.</p>'
               . '<p><strong>The verdict takes a year.</strong> You will not know whether the decision was good for roughly twelve months, and by then every option has narrowed. So the checking has to happen before, not after — a fortnight on the choice rather than an afternoon.</p>'
               . '<p><strong>If you read nothing else, take these five questions.</strong> They will separate clinics more reliably than any amount of website reading.</p>',
    'points'  => [
        'See at least two clinics',
        'Ask who will actually perform the surgery',
        'Ask how the graft number was calculated',
        'Get it in writing and leave without booking',
        'Ask what would make them refuse to operate',
    ],
]) ?>

<?= lp_steps([
    'eyebrow' => 'At a glance',
    'title'   => 'The Decision in Four Stages',
    'intro'   => 'The questions for each stage are set out in full below. Apply them to every clinic you see, including this one.',
    'steps'   => [
        ['img' => 'step-followup',     'alt' => 'a desk calendar with dates circled',                       'title' => 'Before you enquire',          'text' => 'Know what bothers you, whether it is still moving and whether a treatable cause has been ruled out. Bring your medical history and a realistic budget.'],
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                     'title' => 'In the consultation room',    'text' => 'Ask who does what, how the graft number was reached, where the hairline goes and what would make them refuse to operate.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned hairline',  'title' => 'Reading the quote',           'text' => 'Leave without booking and read the estimate the next day: what is excluded, the ongoing costs and the graft number everything rests on.'],
        ['img' => 'step-procedure',    'alt' => 'sterile hair-restoration instruments laid out on a tray',  'title' => 'Comparing two clinics',       'text' => 'Compare the two graft numbers, the two hairlines, the donor reserve each leaves and who each says will perform the surgery — not the price.'],
    ],
]) ?>

<section class="section section--white" id="stage-1">
  <div class="wrap">
    <p class="eyebrow">Stage one</p>
    <h2 class="h2 mt-2">Before You Enquire Anywhere</h2>
    <p class="body-l mt-3 measure">A small amount of preparation changes what you get out of every consultation that follows.</p>
    <div class="grid grid--3 mt-5">
      <div class="card"><p class="h4">Know what is bothering you</p><p class="body-s mt-2">The hairline, the crown, or general thinning? They are different problems with different priorities and costs. Arriving with a clear answer stops the agenda being set for you.</p></div>
      <div class="card"><p class="h4">Establish whether it is still moving</p><p class="body-s mt-2">Hair loss that is actively progressing changes the advice completely. Compare photographs from a few years ago. If it is moving quickly, expect to be told to stabilise it first.</p></div>
      <div class="card"><p class="h4">Rule out a treatable cause</p><p class="body-s mt-2">Especially important for women. Iron, thyroid and hormonal causes are common and treatable, and they need investigating before surgery is even a sensible conversation.</p></div>
      <div class="card"><p class="h4">Gather your medical history</p><p class="body-s mt-2">Every medicine and supplement, any conditions, any previous scalp problems. Bring the list rather than trying to recall it in the room.</p></div>
      <div class="card"><p class="h4">Set a realistic budget</p><p class="body-s mt-2">Including the possibility of a second session and ongoing medical treatment. A plan you cannot complete is worse than a smaller plan you can.</p></div>
      <div class="card"><p class="h4">Decide what you will not accept</p><p class="body-s mt-2">Being pressured, an unexplained graft number, or a promised outcome. Deciding your limits beforehand is far easier than deciding them under persuasion.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="stage-2">
  <div class="wrap">
    <p class="eyebrow">Stage two</p>
    <h2 class="h2 mt-2">In the Consultation Room</h2>
    <p class="body-l mt-3 measure">Treat the consultation as your assessment of them, running alongside their assessment of you. These are the questions, grouped by what they actually reveal.</p>

    <div class="grid grid--2 mt-5">
      <div class="card card--pad-lg">
        <p class="eyebrow">About the people</p>
        <p class="h4 mt-2">Who does what</p>
        <?= ticks([
            'Who will make the recipient sites?',
            'Who performs the extraction?',
            'Who places the grafts?',
            'What is your qualification and registration number?',
            'Will I see the same person at follow-up?',
        ], false) ?>
        <p class="body-s mt-4">What you are listening for is specificity and speed. Hesitation or generality here is itself the answer.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow">About the plan</p>
        <p class="h4 mt-2">How the number was reached</p>
        <?= ticks([
            'How did you calculate my graft number?',
            'Was my donor density measured, and what was it?',
            'How much can my donor safely give in total?',
            'What are you leaving in reserve for future loss?',
            'Is a second session likely, and when?',
        ], false) ?>
        <p class="body-s mt-4">A clinic that examined you properly will enjoy these questions. One that did not will get vague.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow">About the design</p>
        <p class="h4 mt-2">The part you cannot undo</p>
        <?= ticks([
            'Will you draw the hairline on me before I consent?',
            'Why have you placed it there?',
            'How will it look as I lose more hair?',
            'How is the transition zone being built?',
        ], false) ?>
        <p class="body-s mt-4">If one clinic offers a markedly lower hairline than the others, that is not generosity. See <a href="/hairline-transplant-in-gurgaon">hairline design</a>.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow">About what goes wrong</p>
        <p class="h4 mt-2">The conversation that reveals most</p>
        <?= ticks([
            'What happens if growth is poor?',
            'When exactly can I judge the result?',
            'What will the donor area look like?',
            'What would make you refuse to operate on me?',
        ], false) ?>
        <p class="body-s mt-4">The last one is the most informative question in this entire guide. A clinic with no answer declines nobody.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--ink" id="stage-3">
  <div class="wrap">
    <p class="eyebrow">Stage three</p>
    <h2 class="h2 mt-2">Reading the Quote, Away From the Clinic</h2>
    <p class="body-l mt-3 measure">Leave without booking. Read the estimate the next day somewhere neutral. Anything persuasive in the room that does not survive that is persuasion, not information.</p>
    <div class="grid grid--3 mt-6">
      <div class="card card--ink"><p class="h4">Check what is excluded</p><p class="body-s mt-2">Quotes diverge far more in exclusions than in headline rate. Anaesthesia, medication, dressings, follow-up reviews and any second session all belong in the comparison.</p></div>
      <div class="card card--ink"><p class="h4">Compare plans, not rates</p><p class="body-s mt-2">Per-graft rates are only comparable when the graft numbers were derived the same way. If the counts differ substantially, compare how each was justified instead.</p></div>
      <div class="card card--ink"><p class="h4">Watch for expiry</p><p class="body-s mt-2">A discount that lapses if you do not book today exists to stop you doing exactly what you are doing now. Treat it as information about the clinic.</p></div>
      <div class="card card--ink"><p class="h4">Look for the risks in writing</p><p class="body-s mt-2">Shedding, the twelve-month timeline, the possibility of a further session. If none of it appears in your paperwork, note what that says about the consultation.</p></div>
      <div class="card card--ink"><p class="h4">Add the ongoing costs</p><p class="body-s mt-2">Medical treatment usually continues after surgery to protect native hair. It is a real recurring cost and it belongs in your budget.</p></div>
      <div class="card card--ink"><p class="h4">Check the graft number twice</p><p class="body-s mt-2">It is the number every rupee rests on. If you cannot explain to a friend how it was reached, you do not yet have enough to decide.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="red-flags">
  <div class="wrap">
    <p class="eyebrow">Warning signs</p>
    <h2 class="h2 mt-2">When to Walk Away</h2>
    <p class="body-l mt-3 measure">Any single one of these is reason to slow down. Two together is reason to leave.</p>
    <div class="grid grid--2 mt-5">
      <div class="card card--pad-lg">
        <p class="h4">A graft number without an examination</p>
        <p class="body-s mt-2">Donor density cannot be assessed from a photograph. A number produced that way has no clinical basis, and it is the foundation of everything else you are being told.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">A promised result</p>
        <p class="body-s mt-2">No clinic can promise density, coverage or how long a result will last. Biology does not allow it. A promise of that kind is a statement about the business, not the surgery.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Pressure to decide today</p>
        <p class="body-s mt-2">Expiring discounts and same-day booking incentives on irreversible surgery exist for one reason. A clinic confident in its work does not need you to decide before you have thought.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Evasion about who operates</p>
        <p class="body-s mt-2">You are entitled to know who will hold the instruments and what they are qualified as. Difficulty getting a direct answer is itself a direct answer.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Surgery offered despite active disease</p>
        <p class="body-s mt-2">Being offered a transplant with active <a href="/alopecia-areata-treatment-in-gurgaon">alopecia areata</a>, an inflamed scalp or rapidly progressing loss is a serious warning about clinical judgement.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Only good news</p>
        <p class="body-s mt-2">A consultation that never mentioned shedding, the year-long timeline, the donor area or the chance of a second session was a sales meeting with medical decor.</p>
      </div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'intro-recipient',
    'alt'     => 'a mannequin head seen from the front, with short hair and a planned hairline drawn in pencil',
    'id'      => 'second-opinion',
    'eyebrow' => 'Stage four',
    'title'   => 'Comparing Two Clinics Properly',
    'reverse' => true,
    'html'    => '<p>Once you have two written plans, the comparison that matters is not price. It is the two graft numbers and the two hairlines.</p>'
               . '<p>If the graft counts differ substantially for the same head, one clinic has read your donor differently or is planning to take more from it — ask each to explain their number against the other. If the hairlines differ, ask why the lower one is lower: it is easy to sell and permanent to live with, and a conservative line is usually planned around your face at fifty rather than your photographs at thirty.</p>'
               . '<p>Then look at what each has left in reserve. A plan that spends nearly all your donor supply on the front leaves nothing for the crown when the loss arrives there.</p>'
               . '<p><strong>Side by side, compare:</strong></p>',
    'points'  => [
        'The graft number and its stated basis',
        'The hairline position each proposed',
        'What each leaves in donor reserve',
        'What each excludes from the price',
        'Whether each mentioned a second session',
        'Who each says will perform the surgery',
    ],
]) ?>

<?= doctor_block(
    'Consultations and procedures are carried out by registered medical practitioners at the clinic. Apply every question in this guide to us as well.'
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Choosing a Clinic — FAQs</h2>
        <p class="body-s mt-3">General guidance for assessing any clinic. Take these questions with you rather than trying to remember them.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
        <div class="card card--pad-lg mt-5">
          <p class="h4">Related reading</p>
          <p class="body-s mt-2"><a href="/blog/who-can-legally-perform-a-hair-transplant-in-india">Who can legally perform a hair transplant in India</a> — what the qualification should be.</p>
          <p class="body-s mt-3"><a href="/hair-transplant-cost-in-gurgaon">Hair transplant cost</a> — how pricing works.</p>
          <p class="body-s mt-3"><a href="/blog/why-hair-transplant-quotes-vary">Why quotes vary</a> — the mechanics behind the differences.</p>
          <p class="body-s mt-3"><a href="/blog/questions-to-ask-hair-transplant-consultation">Consultation questions</a> — a longer list to take with you.</p>
        </div>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'If You Would Like to Apply This to Us',
    'Consultations are available at both of our clinics, Sector 39, Gurugram and Rohini, Delhi, with registered medical practitioners. Bring the questions on this page.'
) ?>

<?= lp_cta([
    'eyebrow'   => 'Gurugram and Delhi',
    'title'     => 'Bring This List to Your Consultation',
    'text'      => 'Ask us who operates, how the graft number was reached, and what would make us decline. You will get an examination, a hairline drawn on you before consent, and an itemised written estimate to take away and think about.',
    'treatment' => 'Hair transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
