<?php
/**
 * /alopecia-areata-treatment-in-gurgaon
 *
 * Medical condition page — and the most genuinely clinical page on this site.
 * Alopecia areata is an autoimmune disease, not a cosmetic complaint, and the
 * commercial context here is that hair clinics routinely sell transplants and
 * PRP courses to patients who have it. That is actively harmful: grafts placed
 * into an active autoimmune process can be attacked exactly as the native hair
 * was, and the donor supply is spent for nothing.
 *
 * So this page does three things in order: name the condition properly, make
 * unmistakably clear that surgery is contraindicated while it is active, and
 * describe treatment by category without naming drugs or doses. Several of the
 * relevant agents (topical and intralesional corticosteroids, immunotherapy,
 * systemic and targeted therapies) require specialist supervision and are not
 * safe to imply availability of without evidence.
 *
 * Also handled carefully: prognosis. Spontaneous regrowth is common in limited
 * patchy disease and much less so in extensive disease, and the page must not
 * flatten that into either false hope or fatalism.
 *
 * Linked FROM: /eyebrow-transplant-in-gurgaon (which names it as a stop).
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'What is alopecia areata?',
     'a' => 'An autoimmune condition in which the immune system attacks hair follicles, causing hair to fall out in patches. It most often affects the scalp but can affect the beard, eyebrows, eyelashes and body hair. It is not contagious, it is not caused by poor hair care, and it is not a fungal or bacterial infection.'],
    ['q' => 'What causes it?',
     'a' => 'It is an autoimmune process, meaning the immune system mistakenly targets the follicle. There is a genetic component and it occurs more often in people with a personal or family history of other autoimmune conditions. A specific trigger frequently cannot be identified, and it is important to say that it is not caused by anything you did.'],
    ['q' => 'How is it different from ordinary hair loss?',
     'a' => 'Pattern hair loss thins gradually in a predictable distribution. Alopecia areata typically produces well-defined, smooth, round or oval patches of complete hair loss that appear over a short period, often with no symptoms. The pattern is usually distinctive enough to recognise on examination.'],
    ['q' => 'Will my hair grow back?',
     'a' => 'Often, and the honest answer depends on how much is affected. Limited patchy disease has a reasonable chance of regrowing, sometimes without treatment. More extensive disease, disease that has been present a long time, or involvement of the eyebrows, lashes and body hair carries a less predictable outlook. It can also recur after regrowing. Your particular picture is discussed at assessment.'],
    ['q' => 'Can I have a hair transplant for alopecia areata?',
     'a' => 'Not while the condition is active, and this matters enormously. The immune process does not distinguish between hair that was already there and hair that was surgically moved. Grafts placed into active disease can be attacked in the same way, meaning donor hair is spent for no lasting result. Donor hair is finite and cannot be replaced. If you are offered a transplant for active alopecia areata, ask what happens to grafts placed into an active autoimmune process.'],
    ['q' => 'Could I ever have surgery in the future?',
     'a' => 'It is not an absolute lifetime exclusion, but it requires the condition to have been assessed, treated and genuinely stable for a sustained period, and the decision is made cautiously and individually. It is not a promise, and it should never be the reason you delay treating the condition now.'],
    ['q' => 'What treatments are available?',
     'a' => 'It depends on how extensive the disease is, how long it has been present, and your age and medical history. Options range from topical and locally injected treatments for limited patches through to treatments used under close medical supervision for extensive disease. What is appropriate for you is decided after examination, and some presentations are better managed with onward referral.'],
    ['q' => 'Why does this page not name specific medicines?',
     'a' => 'Because treatment here is individual, several of the relevant treatments require close medical supervision and monitoring, and publishing them invites self-medication for an autoimmune condition. What is right for you depends on the extent of disease and your medical history, and that is a consultation, not a webpage.'],
    ['q' => 'Is it ever right to just wait?',
     'a' => 'Sometimes, yes. Limited patchy disease can regrow on its own, and observation with review is a legitimate approach in some cases rather than a failure to treat. Whether that suits you depends on how extensive it is, how long it has been there and how it is affecting you.'],
    ['q' => 'Will PRP help?',
     'a' => 'PRP is not an established treatment for alopecia areata, and it should not be presented as one. It is a supportive treatment used mainly in pattern hair loss, and a PRP course does not address the autoimmune process behind this condition.'],
    ['q' => 'Is alopecia areata linked to stress?',
     'a' => 'Patients frequently report stress around the onset, and the relationship is not fully established. What is clear is that it is an autoimmune condition rather than something caused by being insufficiently calm, and framing it as a stress problem tends to add guilt without adding treatment.'],
    ['q' => 'Should I have any tests?',
     'a' => 'Sometimes. Because it is associated with other autoimmune conditions, screening — thyroid function in particular — may be appropriate depending on your history and examination. What is worth checking in your case is decided at the consultation.'],
    ['q' => 'What is alopecia totalis and universalis?',
     'a' => 'Terms for more extensive forms: totalis describes complete loss of scalp hair, and universalis describes loss of hair across the body. They sit at the more severe end of the same condition and carry a less predictable outlook, and they are managed accordingly.'],
    ['q' => 'Can eyebrows and beard be affected?',
     'a' => 'Yes, and it is common. Loss of eyebrow, eyelash or beard hair in well-defined patches is a recognised presentation. It is also the reason we will not perform an <a href="/eyebrow-transplant-in-gurgaon">eyebrow transplant</a> while the condition is active.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Treatments', 'url' => '/hair-fall-treatment-in-gurgaon'],
    ['name' => 'Alopecia areata treatment in Gurgaon'],
];

$page = [
    'title'       => 'Alopecia Areata Treatment in Gurgaon: Patchy Hair Loss',
    'description' => 'Alopecia areata treatment in Gurgaon: how patchy hair loss differs from pattern loss and telogen effluvium, what is checked, why surgery waits and care options.',
    'url'         => '/alopecia-areata-treatment-in-gurgaon',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-consultation-768.webp',
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_therapy('/alopecia-areata-treatment-in-gurgaon', [
            'name'          => 'Alopecia Areata Treatment',
            'alternateName' => ['Patchy hair loss treatment', 'Autoimmune hair loss treatment'],
            'bodyLocation'  => 'Scalp, eyebrows, beard and body hair',
            'howPerformed'  => 'Diagnosis is made on history and clinical examination of the affected areas. Screening for associated autoimmune conditions, including thyroid function, is undertaken where the history or examination indicates it. Management is directed by the extent and duration of disease and the age of the patient, and ranges from observation with review in limited patchy disease through topical and locally administered treatment to therapies requiring close medical supervision in extensive disease. Hair restoration surgery is not undertaken while the condition is active.',
            'preparation'   => 'Full history including onset, distribution and previous episodes, personal and family history of autoimmune disease, review of medication, examination of the scalp, eyebrows, beard and nails, and baseline photography of affected areas.',
            'followup'      => 'Interval photography against the baseline, monitoring of response and of any treatment requiring surveillance, and reassessment of the management plan over months.',
            'expectedPrognosis' => 'The course is variable and unpredictable. Limited patchy disease has a reasonable likelihood of regrowth and may resolve without treatment, while extensive or long-standing disease, and involvement of eyebrows, eyelashes and body hair, carries a less predictable outlook. Relapse after regrowth is recognised. Hair restoration surgery is contraindicated during active disease because transplanted follicles may be affected by the same autoimmune process.',
        ]),
        schema_faq('/alopecia-areata-treatment-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Alopecia areata treatment in Gurgaon</span>
        <h1 class="h1 mt-3">Alopecia Areata Is a Condition, Not a Cosmetic Problem</h1>
        <p class="lead mt-3 measure">It is an autoimmune disease in which the immune system attacks your hair follicles. It is not caused by anything you did, it is not a hair-care failure, and it is not treated with the procedures sold for ordinary hair loss. It needs diagnosing and managing properly.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-treatment="Hair fall treatment" data-track="book"><?= icon('calendar', 18) ?> Book an Assessment</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Diagnosed and managed by registered medical practitioners',
            'Screening for associated conditions where indicated',
            'No surgery offered while the disease is active',
            'At our clinic in Sector 39, Gurugram',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-consultation-768.webp" srcset="/assets/img/services/svc-consultation-512.webp 512w, /assets/img/services/svc-consultation-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a dermatoscope and notepad on a wooden desk" width="768" height="960" loading="eager" fetchpriority="high">
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
      <div class="card"><?= icon('shield', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">No surgery while active</p><p class="meta mt-1">Grafts can be attacked by the same process.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Diagnosed properly</p><p class="meta mt-1">Examined in person, not judged from a photograph.</p></div>
      <div class="card"><?= icon('doc', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Screened where indicated</p><p class="meta mt-1">Associated autoimmune conditions checked.</p></div>
      <div class="card"><?= icon('clock', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Observation is valid</p><p class="meta mt-1">Limited disease sometimes regrows on its own.</p></div>
      <div class="card"><?= icon('info', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Referred when needed</p><p class="meta mt-1">Extensive disease may need onward referral.</p></div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-follicle',
    'alt'     => 'a sculpted cross-section of the scalp showing hair follicles',
    'eyebrow' => 'The condition',
    'title'   => 'What Alopecia Areata Is',
    'id'      => 'what-is',
    'html'    => '<p>The immune system, which normally attacks infection, mistakenly targets hair follicles. The follicle is not destroyed in the way it is in scarring conditions — it is switched off — which is why regrowth remains possible and why the condition can come and go.</p>'
               . '<p>It typically presents as smooth, well-defined round or oval patches of complete hair loss appearing over a short period, usually without pain or itch. The scalp is most often affected, but the beard, eyebrows, eyelashes and body hair can all be involved, and nail changes sometimes accompany it, which is part of why the nails are examined.</p>'
               . '<p>There is a genetic component, and it occurs more often in people with a personal or family history of other autoimmune conditions; in most cases no specific trigger can be identified. It is not contagious, and it is not something you caused through diet, hair products, washing, or insufficient calm.</p>'
               . '<p><b>The names for extent</b> — points along a spectrum of the same condition. Greater extent generally carries a less predictable outlook.</p>',
    'points'  => [
        'Alopecia areata — the condition generally, most often as discrete patches',
        'Alopecia totalis — complete loss of scalp hair',
        'Alopecia universalis — loss of hair across the body, including eyebrows and lashes',
    ],
]) ?>

<?= lp_split([
    'img'     => 'intro-donor',
    'alt'     => 'a mannequin head seen from behind, with the donor area at the back and sides marked',
    'eyebrow' => 'The most important thing on this page',
    'title'   => 'Why a Hair Transplant Is the Wrong Answer Here',
    'id'      => 'no-surgery',
    'reverse' => true,
    'tone'    => 'canvas',
    'html'    => '<p>Hair restoration surgery is sometimes offered to people with alopecia areata. It is worth understanding exactly why that is a serious problem rather than a difference of clinical opinion.</p>'
               . '<p><b>We will decline to operate, and explain why.</b> If you come to us for a transplant and the examination shows active alopecia areata, we will tell you and we will not proceed — for the scalp, the beard and the eyebrows equally. The right first step is treating the condition.</p>'
               . '<p>It is not a lifetime exclusion. Where the condition has been assessed, treated and genuinely stable for a sustained period, surgery can be reconsidered cautiously and individually. It is not a promise, and not a reason to delay treating the disease now. If you have been offered surgery for active disease, ask directly what happens to grafts placed into an autoimmune process.</p>'
               . '<p><b>Why surgery waits:</b></p>',
    'points'  => [
        'The immune process does not care where hair came from: a relocated follicle can be targeted exactly like the hair that was lost',
        'Donor hair is finite: grafts spent inside an active autoimmune process cannot be put back, and the supply that might have been useful later is gone',
        'The disease is unpredictable: operating in an active phase intervenes in something that may improve on its own, or flare again regardless',
    ],
]) ?>

<?= lp_steps([
    'eyebrow' => 'Diagnosis',
    'title'   => 'How It Is Established',
    'id'      => 'diagnosis',
    'intro'   => 'Usually clinically, on history and examination — the point of being examined by a dermatologist rather than assessed from a photograph. Bring the dates the patches appeared and in what order, earlier photographs, any previous episodes, family history of autoimmune conditions, and your medication and supplement list.',
    'tone'    => 'white',
    'steps'   => [
        ['img' => 'step-plan',      'alt' => 'a tablet showing a head diagram beside a notepad',                'title' => 'History',                      'text' => 'When it began, how it has progressed, any previous episodes and how they resolved, and any personal or family history of autoimmune conditions.'],
        ['img' => 'stage-crown',    'alt' => 'a mannequin head seen from above with a round bare area on the crown', 'title' => 'Examination',                  'text' => 'Smooth, sharply defined patches without inflammation or scarring. The eyebrows, beard and nails are examined too, and look-alikes — fungal infection, traction, hair-pulling and the scarring alopecias — are ruled out.'],
        ['img' => 'step-procedure', 'alt' => 'sterile instruments laid out on a tray',                          'title' => 'Screening, where indicated',   'text' => 'Bloods — thyroid function in particular — may be appropriate given the link with other autoimmune conditions. What is worth checking depends on your history.'],
        ['img' => 'step-followup',  'alt' => 'a desk calendar with review dates circled',                       'title' => 'A plan matched to the extent', 'text' => 'Management follows the extent and duration of disease, with baseline photographs and scheduled reviews over months.'],
    ],
]) ?>

<?php
$aaCompare = [
    ['How it looks', 'Smooth, sharply defined round or oval patches of complete hair loss', 'Gradual thinning in a typical pattern: temples and crown in men, a widening parting in women', 'Shedding spread across the whole scalp, without bald patches'],
    ['How quickly', 'Patches appear over a short period, often without itch or pain', 'Slowly, over years', 'Usually begins some months after a trigger, and can be sudden and heavy'],
    ['Cause', 'Autoimmune: the immune system switches the follicle off', 'Inherited, with follicles gradually shrinking under hormonal influence', 'A trigger such as childbirth, illness, surgery, a crash diet or severe stress pushes many hairs into shedding at once'],
    ['Other areas', 'Beard, eyebrows, eyelashes and body hair can be affected; nails sometimes change', 'The scalp only; the back and sides are usually kept', 'The scalp, all over'],
    ['What is checked', 'The patches, eyebrows, beard and nails; look-alikes such as fungal infection, traction and hair-pulling ruled out; thyroid function where indicated', 'The pattern and density, family history, and iron or thyroid where the history suggests something else is adding to it', 'The months before the shedding began, recent medicines, and often iron stores and thyroid function'],
    ['Usual course', 'Unpredictable: limited patches often regrow, sometimes untreated, and it can recur', 'Progressive; managed rather than cured', 'Usually settles once the trigger has passed or been treated'],
    ['Hair transplant?', 'Not while the condition is active', 'Can be an option where loss is established and the donor area is stable', 'No; the shedding is expected to recover'],
];
?>
<section class="section section--canvas" id="compare">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Telling them apart</p>
      <h2 class="h2 mt-2">Alopecia Areata vs Pattern Hair Loss vs Telogen Effluvium</h2>
      <p class="body mt-3">All three can mean more hair on the pillow, and they are treated very differently. The shape of the loss and how quickly it arrived usually point the way; the examination confirms it.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data data--wide">
          <caption class="sr-only">Alopecia areata, pattern hair loss and telogen effluvium compared: how each looks, how quickly it develops, the cause, other areas affected, what is checked, the usual course and whether a transplant has a place. A general guide, not a diagnosis.</caption>
          <thead><tr><th scope="col">&nbsp;</th><th scope="col">Alopecia areata</th><th scope="col">Pattern hair loss</th><th scope="col">Telogen effluvium</th></tr></thead>
          <tbody>
            <?php foreach ($aaCompare as $r): ?>
            <tr><th scope="row" style="white-space:normal;width:16%"><?= e($r[0]) ?></th><td><?= e($r[1]) ?></td><td><?= e($r[2]) ?></td><td><?= e($r[3]) ?></td></tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">Diffuse shedding and pattern thinning are covered under <a href="/hair-fall-treatment-in-gurgaon">hair fall treatment in Gurgaon</a> and <a href="/womens-hair-loss-treatment-in-gurgaon">women’s hair loss treatment</a>, and our guide to <a href="/blog/telogen-effluvium-vs-pattern-hair-loss">telogen effluvium and pattern hair loss</a> explains those two in more depth. A flaking scalp with patches of broken hair is a different problem again, covered under <a href="/dandruff-treatment-in-gurgaon">dandruff and scalp conditions</a>.</p>
  </div>
</section>

<section class="section section--white" id="treatment">
  <div class="wrap">
    <p class="eyebrow">Management</p>
    <h2 class="h2 mt-2">How It Is Treated</h2>
    <p class="body-l mt-3 measure">Treatment is decided by how extensive the disease is, how long it has been present, and your age and medical history. There is no single protocol, and this page describes categories rather than naming medicines, because these are individual prescribing decisions that some of the time require close medical supervision.</p>
    <div class="grid grid--2 mt-5">
      <div class="card card--pad-lg">
        <p class="h4">Observation with review</p>
        <p class="body-s mt-2">A legitimate option in limited patchy disease, which has a reasonable chance of regrowing on its own. It means active monitoring with photographs and scheduled review, not being sent away. Whether it suits you depends on extent, duration and how it is affecting you.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Topical and locally administered treatment</p>
        <p class="body-s mt-2">Treatments applied to or injected directly into affected patches are commonly used for limited disease. Suitability, frequency and duration are individual decisions made at consultation.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Treatment for extensive disease</p>
        <p class="body-s mt-2">More extensive presentations may require treatments given under close medical supervision with monitoring. Where that is what your case calls for, it is discussed openly, including onward referral where that is the right route.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Managing associated conditions</p>
        <p class="body-s mt-2">Where screening identifies an associated autoimmune condition such as thyroid disease, that is managed in its own right. It is part of treating the person rather than the patch.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Cosmetic and practical support</p>
        <p class="body-s mt-2">Camouflage, hairpieces and other practical measures are legitimate and often underdiscussed. They do not treat the disease, and for many people they matter a great deal while treatment takes its course.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">What is not treatment</p>
        <p class="body-s mt-2">PRP is not an established treatment for alopecia areata. Neither is a hair transplant during active disease. Both are sometimes offered to people with this diagnosis, and neither addresses the condition.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--ink" id="prognosis">
  <div class="wrap">
    <p class="eyebrow">Outlook</p>
    <h2 class="h2 mt-2">What Happens Next Is Genuinely Variable</h2>
    <p class="body-l mt-3" style="max-width:62ch">This is the part where honesty matters most, because both false reassurance and fatalism are easy and both are unhelpful.</p>
    <div class="grid grid--3 mt-6">
      <div class="card card--ink"><p class="h4">Limited patchy disease</p><p class="body-s mt-2">Has a reasonable likelihood of regrowth, and may resolve without treatment. This is the most common presentation and the most favourable one.</p></div>
      <div class="card card--ink"><p class="h4">Extensive or long-standing disease</p><p class="body-s mt-2">Less predictable. Involvement of eyebrows, lashes and body hair, or disease present for a long period, generally carries a more uncertain outlook.</p></div>
      <div class="card card--ink"><p class="h4">Relapse is recognised</p><p class="body-s mt-2">Hair that regrows can be lost again in a future episode. That possibility is part of an honest conversation rather than a surprise later.</p></div>
    </div>
    <p class="body mt-6" style="max-width:62ch">Nobody can tell you with certainty how your own case will behave. What can be done is establishing the diagnosis correctly, matching treatment to the extent of disease, monitoring it with photographs, and not spending your money or your donor hair on procedures that do not address an autoimmune condition.</p>
  </div>
</section>

<section class="section section--white" id="questions">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Before any treatment</p>
      <h2 class="h2 mt-2">Questions Worth Asking Any Clinic About Patchy Hair Loss</h2>
      <p class="body mt-3">Useful wherever you are seen, including here. The answers show whether the condition is being treated, or only the patch.</p>
    </div>
    <div class="card card--pad-lg mt-5">
      <?= ticks([
          'Has a doctor examined the patches in person, along with my eyebrows, beard and nails?',
          'Have fungal infection, traction and hair-pulling been ruled out?',
          'Would a blood test, such as thyroid function, help in my case?',
          'Is watching with scheduled reviews reasonable for how much hair I have lost?',
          'How will a response be measured, and when is the first review?',
          'If surgery or a PRP course is suggested, how does it deal with an autoimmune process?',
      ]) ?>
    </div>
    <div class="note mt-4">
      <p class="body-s"><b>Not sure the patches are alopecia areata?</b> The <a href="/hair-loss-assessment">six-question hair loss self-assessment</a> suggests a next step before you book. It is not a diagnosis, and patchy loss still needs an examination.</p>
    </div>
  </div>
</section>

<?= doctor_block(
    'Consultations and procedures are carried out by registered medical practitioners at the clinic.'
) ?>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">What Management Costs</h2>
        <p class="body mt-3 measure">Cost depends on the extent of disease and what treatment your case calls for. For limited patchy disease it is frequently far less than patients expect, because the appropriate management is consultation, monitoring and targeted treatment rather than a course of procedures.</p>
        <div class="grid grid--2 mt-5">
          <div class="card"><p class="h4">Consultation and diagnosis</p><p class="body-s mt-2">Where the condition is actually identified</p></div>
          <div class="card"><p class="h4">Screening investigations</p><p class="body-s mt-2">Where history and examination indicate them</p></div>
          <div class="card"><p class="h4">Treatment for your extent of disease</p><p class="body-s mt-2">Varies widely, and is discussed openly</p></div>
          <div class="card"><p class="h4">Review appointments</p><p class="body-s mt-2">Monitoring with photography over months</p></div>
        </div>
        <p class="body-s mt-4 measure">If you have been quoted for a hair transplant or a package of PRP sessions for alopecia areata, that is the clearest possible sign to seek a second opinion before paying anything.</p>
        <p class="body mt-3 measure">See <a href="/cost-and-emi-options">cost and payment options</a>.</p>
      </div>
      <div class="cta-band" style="display:block">
        <h3 class="h3">Get It Diagnosed Properly</h3>
        <p class="body mt-3">Send photos of the affected areas in daylight, including eyebrows or beard if involved, with a note of when the patches appeared and in what order.</p>
        <a class="btn btn--block btn--accent mt-5" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Send photos on WhatsApp</a>
        <a class="btn btn--block btn--ghost mt-3" href="/book-consultation" data-book data-treatment="Hair fall treatment" data-track="book">Book an assessment</a>
        <p class="body-s mt-4">Your details are used only to arrange your consultation.</p>
      </div>
    </div>
  </div>
</section>

<?= local_block(
    'Alopecia Areata Care at Our Gurgaon Clinic',
    'Diagnosis, treatment and reviews take place at our Sector 39 clinic in Gurugram. Consultations and procedures are carried out by registered medical practitioners at the clinic.'
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Alopecia Areata FAQs</h2>
        <p class="body-s mt-3">Answers are general patient education about a medical condition. Your own diagnosis, extent of disease and treatment are established at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= lp_cta([
    'eyebrow'   => 'Sector 39, Gurugram',
    'title'     => 'Get the Diagnosis Right Before Any Procedure Is Considered',
    'text'      => 'Come in and have the patches examined properly. You will get a clinical diagnosis, screening where your history calls for it, a management plan matched to how extensive the disease is, and a straight answer about surgery.',
    'treatment' => 'Hair fall treatment',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
