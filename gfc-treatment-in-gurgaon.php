<?php
/**
 * /gfc-treatment-in-gurgaon
 *
 * Non-surgical therapy spoke. GFC — growth factor concentrate — is prepared
 * from the patient's own blood like PRP, but processed further so that growth
 * factors are released from the platelets and the platelets themselves are
 * removed.
 *
 * Editorial position, and the reason this page is written carefully: GFC is
 * marketed aggressively in this market as a straight upgrade on PRP, often with
 * multiples quoted for growth factor concentration. The published evidence base
 * is considerably thinner than PRP's and does not support presenting it as
 * proven-superior. So the page describes what it is, is explicit that the
 * evidence is less mature, and refuses to make the comparative claim.
 *
 * Cannibalisation split: /hair-prp-treatment-in-gurgaon owns PRP for hair.
 * /prp-vs-gfc-treatment will own the head-to-head. This page owns GFC itself.
 *
 * No concentration multiples, no response rates, no session-count promises.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'What is GFC treatment?',
     'a' => 'GFC stands for growth factor concentrate. A sample of your own blood is drawn and processed so that the growth factors held inside the platelets are released, and the platelets and other cells are then removed. What is injected into the scalp is the concentrate of those released growth factors rather than the platelets themselves.'],
    ['q' => 'How is GFC different from PRP?',
     'a' => 'PRP injects concentrated platelets, which release their growth factors gradually after injection. GFC releases those growth factors during preparation and injects the concentrate directly, with the cells removed. That is a genuine processing difference. Whether it produces a better clinical result is a separate question, and the published evidence for GFC is considerably less mature than for PRP.'],
    ['q' => 'Is GFC better than PRP?',
     'a' => 'We will not tell you it is, because the evidence does not currently support that claim. It is widely marketed as an upgrade, often with impressive-sounding concentration figures. A higher growth factor concentration in a tube is not the same thing as a better outcome on a scalp, and the studies needed to demonstrate the second are not yet there in the way they are for PRP.'],
    ['q' => 'Then why offer it at all?',
     'a' => 'Because it is a reasonable option within the same family of treatments, it uses your own blood, and some patients prefer it. What we will not do is present it as a proven improvement in order to justify a higher price. Which of the two suits you is discussed at assessment on the basis of your diagnosis, not the newer label.'],
    ['q' => 'What does GFC treat?',
     'a' => 'It is used to support thinning hair, most often in early to moderate pattern hair loss, and sometimes alongside medical treatment or after a transplant. Like PRP, it supports existing follicles. It does not regrow hair in an area where the follicles are gone, and it is not a substitute for surgery in established baldness.'],
    ['q' => 'How is the treatment done?',
     'a' => 'Blood is drawn, processed, and the concentrate is injected into the scalp at follicular depth across the thinning areas. It is done in the clinic and takes under an hour in total. Most people return to normal activity the same day.'],
    ['q' => 'Does it hurt?',
     'a' => 'The scalp injections are uncomfortable rather than painful for most people, and the discomfort is brief. Some tenderness for a day or so afterwards is normal.'],
    ['q' => 'How many sessions will I need?',
     'a' => 'It is given as a planned course rather than a single treatment, with sessions spaced some weeks apart and the response assessed with photographs. How many depends on your diagnosis and how you respond. Any clinic quoting a fixed number before examining you is quoting a package, not a plan.'],
    ['q' => 'When would I see a change?',
     'a' => 'Reduced shedding is usually the first thing people notice, and it is the earliest measurable sign. Changes in density and texture, where they occur, are assessed over several months with photographs rather than from week to week in the mirror. Some people do not respond.'],
    ['q' => 'Is it permanent?',
     'a' => 'No. GFC does not alter the underlying process behind pattern hair loss. Whatever benefit is gained needs maintenance, and it is generally used alongside medical treatment rather than instead of it.'],
    ['q' => 'Who is not suitable for GFC?',
     'a' => 'It is not appropriate where there is active scalp infection or inflammation, in certain blood and clotting disorders, in some cancers, and where medication affecting platelets or clotting has not been reviewed. Pregnancy and breastfeeding are assessed individually. Your history is reviewed properly before treatment.'],
    ['q' => 'Can GFC be combined with other treatments?',
     'a' => 'Frequently. It is commonly run alongside medical treatment for pattern hair loss, and it is sometimes used after a transplant to support the surrounding native hair. Combining treatments is normal and is planned as a whole rather than sold piece by piece.'],
    ['q' => 'Will GFC help if my hair loss is caused by something else?',
     'a' => 'Not if the cause is untreated. Iron deficiency, thyroid disease, hormonal causes and several other conditions cause hair loss and respond to treating the condition. Injecting a scalp while the real cause runs untreated wastes your money. That is why the assessment comes first.'],
    ['q' => 'How much does GFC treatment cost in Gurgaon?',
     'a' => 'It is priced per session and depends on the course planned for you, so it is quoted after assessment. If your diagnosis points somewhere else, the recommendation will be that instead. See our <a href="/cost-and-emi-options">cost and payment options</a>.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Treatments', 'url' => '/hair-fall-treatment-in-gurgaon'],
    ['name' => 'GFC treatment in Gurgaon'],
];

$page = [
    'title'       => 'GFC Treatment in Gurgaon | DenceSpot Clinic',
    'description' => 'GFC growth factor concentrate treatment for hair in Gurgaon, explained honestly. What it is, how it differs from PRP, and why we will not oversell the comparison.',
    'url'         => '/gfc-treatment-in-gurgaon',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_therapy('/gfc-treatment-in-gurgaon', [
            'name'          => 'GFC Treatment for Hair',
            'alternateName' => ['Growth factor concentrate therapy', 'GFC hair treatment'],
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'A sample of the patient\'s own blood is drawn and processed so that growth factors held within the platelets are released, with platelets and other cellular components then removed. The resulting growth factor concentrate is injected into the scalp at follicular depth across the thinning areas, as a planned course of sessions spaced some weeks apart.',
            'preparation'   => 'Clinical assessment and scalp examination, review of medical history and medication including anticoagulants and agents affecting platelet function, and investigation of reversible causes of hair loss such as iron deficiency and thyroid disease before treatment begins.',
            'followup'      => 'Baseline and interval photography, review of response over several months, and maintenance sessions where appropriate alongside ongoing medical therapy.',
            'expectedPrognosis' => 'Reduced shedding is commonly the earliest observed change. Density and texture changes, where they occur, are assessed over several months with photography. The published evidence base for growth factor concentrate is less mature than for platelet-rich plasma, and it is not established as superior. GFC does not halt the underlying process of pattern hair loss and results require maintenance. A proportion of patients do not respond.',
        ]),
        schema_faq('/gfc-treatment-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">GFC treatment in Gurgaon</span>
        <h1 class="h1 mt-3">GFC Treatment for Hair, Described Without the Marketing</h1>
        <p class="lead mt-3 measure">Growth factor concentrate is made from your own blood, processed a step further than PRP. That processing difference is real. Whether it produces a better result is a different question, and the honest answer is that the evidence is not there yet. Here is what it is, and what we will not claim for it.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-track="book"><?= icon('calendar', 18) ?> Book an Assessment</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Prepared from your own blood',
            'Given as a planned course, not a package',
            'Response tracked with photographs',
            NAP_LOCALITY . ' · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow"><img src="/assets/img/clinic-equipment.jpg" alt="Centrifuge and preparation equipment used for blood-derived scalp treatments at DenceSpot Clinic, Gurugram" width="800" height="1000" loading="eager"></div>
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
      <div class="card"><?= icon('doc', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Diagnosis first</p><p class="body-s mt-2">Treatable causes are looked for before injecting.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Doctor-performed</p><p class="body-s mt-2">Assessed and treated by a dermatologist.</p></div>
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Photographed, not guessed</p><p class="body-s mt-2">Response measured against a baseline.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">No superiority claims</p><p class="body-s mt-2">We do not sell GFC as a proven upgrade.</p></div>
      <div class="card"><?= icon('info', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Told if it will not help</p><p class="body-s mt-2">It supports hair; it does not replace it.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="what-is">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">The basics, plainly</p>
        <h2 class="h2 mt-2">What GFC Actually Is</h2>
        <p class="body-l mt-3 measure">Platelets in your blood carry growth factors — signalling proteins involved in tissue repair and, of interest here, in the hair follicle cycle. Every treatment in this family is built on the same idea: concentrate those and deliver them to the scalp.</p>
        <p class="body-l mt-3 measure">PRP concentrates the platelets themselves and injects them, and they release their growth factors gradually once in the tissue. GFC takes a further processing step: the growth factors are released from the platelets during preparation, and the platelets and other cells are then removed. What is injected is the concentrate of those released growth factors.</p>
        <p class="body-l mt-3 measure">That is a real and describable difference in preparation. It is worth being precise about what it does and does not establish. It means the injected material is different. It does not, on its own, mean the clinical result is better.</p>
        <p class="body-l mt-3 measure">Like PRP, GFC is autologous — it comes from you, which is why the risk profile is favourable and why allergic reaction to the material itself is not a concern.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow">What it does not do</p>
        <h3 class="h3 mt-2">The limits, stated plainly</h3>
        <p class="body mt-3">It does not regrow hair where the follicles are gone. Nothing injected into a bald scalp creates new follicles.</p>
        <p class="body mt-3">It does not stop pattern hair loss. The underlying process continues, which is why medical treatment usually runs alongside.</p>
        <p class="body mt-3">It does not replace a transplant for established baldness, and it is not a permanent result. Benefit requires maintenance.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="evidence">
  <div class="wrap">
    <p class="eyebrow">The honest comparison</p>
    <h2 class="h2 mt-2">Why We Will Not Tell You GFC Beats PRP</h2>
    <p class="body-l mt-3 measure">GFC is frequently sold as the newer, better version of PRP, usually with a striking figure attached about how many times more concentrated the growth factors are. That figure may well be accurate. It is also not the claim that matters.</p>
    <div class="grid grid--2 mt-5">
      <div class="card card--pad-lg">
        <p class="h4">What can be said</p>
        <?= ticks([
            'The preparation is genuinely different',
            'It is autologous, like PRP',
            'It is used for the same indications',
            'The safety profile is comparable',
        ], false) ?>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">What cannot be said yet</p>
        <?= ticks([
            'That it outperforms PRP clinically',
            'That it works where PRP has failed',
            'That fewer sessions are needed',
            'That the result lasts longer',
        ], false) ?>
      </div>
    </div>
    <div class="card card--pad-lg mt-6">
      <p class="eyebrow">The distinction worth holding onto</p>
      <h3 class="h3 mt-2">Concentration in a tube is not outcome on a scalp</h3>
      <p class="body mt-3 measure">A treatment can contain more of an active ingredient and not produce a proportionally better result, or any better result at all. Demonstrating clinical superiority requires comparative studies, and the published evidence base for growth factor concentrate is considerably less mature than the one behind PRP, which itself is not a cure for pattern hair loss.</p>
      <p class="body mt-3 measure">So we describe GFC accurately, offer it where it fits, and decline to price it as a proven upgrade. If a clinic tells you it definitively outperforms PRP, ask what they are basing that on.</p>
      <p class="body mt-3 measure">For the other side of this comparison, see <a href="/hair-prp-treatment-in-gurgaon">hair PRP treatment</a>.</p>
    </div>
  </div>
</section>

<section class="section section--canvas" id="candidacy">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Suitability</p>
        <h2 class="h2 mt-2">Who GFC Is For</h2>
        <p class="body-l mt-3 measure">It is a supportive treatment for hair that is still there. That single sentence decides most of the candidacy question.</p>
        <p class="body-l mt-3 measure">It is most reasonable in early to moderate thinning, where follicles are miniaturising but present, and where the aim is to support them alongside medical treatment. It is also used after a transplant to support the surrounding native hair, which the surgery does not address.</p>
        <p class="body-l mt-3 measure">It is not the right treatment for an area that is genuinely bald, for hair loss with an untreated underlying cause, or as a way of avoiding a conversation about surgery when surgery is what the pattern actually calls for.</p>
      </div>
      <div>
        <div class="card card--pad-lg">
          <p class="h4">Reasonable to consider</p>
          <?= ticks([
              'Early to moderate thinning with follicles present',
              'Alongside medical treatment for pattern loss',
              'Supporting native hair after a transplant',
              'Where you prefer an autologous option',
          ], false) ?>
        </div>
        <div class="card card--pad-lg mt-4">
          <p class="h4">Not appropriate</p>
          <?= ticks([
              'Established baldness with follicles gone',
              'Active scalp infection or inflammation',
              'Certain blood, clotting and platelet disorders',
              'Untreated thyroid, iron or hormonal causes',
          ], false) ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--ink" id="journey">
  <div class="wrap">
    <p class="eyebrow" style="color:var(--accent)">The process</p>
    <h2 class="h2 mt-2" style="color:#fff">How a Course of GFC Runs</h2>
    <div class="grid grid--4 mt-6">
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 01</p><p class="h4 mt-2" style="color:#fff">Assessment</p><p class="body-s mt-2">History, scalp examination, and investigation of reversible causes. If something treatable is found, that is treated first.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 02</p><p class="h4 mt-2" style="color:#fff">Baseline photographs</p><p class="body-s mt-2">Standardised images before anything starts, because memory is unreliable and progress in hair is slow.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 03</p><p class="h4 mt-2" style="color:#fff">Treatment sessions</p><p class="body-s mt-2">Blood drawn, processed, and the concentrate injected across the thinning areas. Under an hour, spaced weeks apart.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 04</p><p class="h4 mt-2" style="color:#fff">Review</p><p class="body-s mt-2">Response compared against the baseline images. If there is no response, you are told, and the plan changes.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="aftercare">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">On the day and after</p>
        <h2 class="h2 mt-2">What a Session Involves</h2>
        <p class="body-l mt-3 measure">Blood is drawn as it would be for any blood test. It is processed in the clinic, which takes a short time, and the concentrate is then injected into the scalp across the areas being treated.</p>
        <p class="body-l mt-3 measure">The injections are uncomfortable rather than painful for most people. Some tenderness, and occasionally mild swelling, is normal for a day or so. Most people go back to normal activity the same day.</p>
        <p class="body-l mt-3 measure">You will be given specific aftercare instructions. In general, the scalp is left alone for the rest of the day, heavy exercise and heat exposure are avoided briefly, and anything that irritates the scalp is postponed.</p>
        <p class="body mt-3 measure">Progress is judged against your baseline photographs at review, not week to week in a mirror. Hair changes slowly, and daily observation mostly measures lighting.</p>
      </div>
      <div>
        <div class="card card--pad-lg">
          <p class="h4">Usually fine the same day</p>
          <?= ticks([
              'Returning to work',
              'Normal daily activity',
              'Eating and drinking as usual',
          ], false) ?>
        </div>
        <div class="card card--pad-lg mt-4">
          <p class="h4">Briefly avoid</p>
          <?= ticks([
              'Heavy exercise and heavy sweating',
              'Saunas, steam and swimming pools',
              'Harsh chemical treatments on the scalp',
              'Anything your instructions specifically list',
          ], false) ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Why this page argues against its own product: growth factor concentrate is a reasonable treatment sitting inside a category that is routinely oversold. The pattern is familiar — a newer preparation, a bigger number on the concentration, and a price premium justified by a comparison nobody has demonstrated. Offering it honestly means describing what it is, being explicit that the evidence is less mature than PRP\'s, and making sure the underlying diagnosis has actually been established before anyone injects anything.'
) ?>

<section class="section section--canvas" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">GFC Treatment Cost in Gurgaon</h2>
        <p class="body mt-3 measure">GFC is priced per session, and what matters is the course planned for you rather than a single-session figure. That comes out of your assessment, so it is quoted afterwards and given to you in writing.</p>
        <div class="grid grid--2 mt-5">
          <div class="card"><p class="h4">Sessions in the course</p><p class="body-s mt-2">Planned from your diagnosis and response</p></div>
          <div class="card"><p class="h4">Area being treated</p><p class="body-s mt-2">A defined patch differs from the whole top of the scalp</p></div>
          <div class="card"><p class="h4">Treatment running alongside</p><p class="body-s mt-2">Medical therapy is usually part of the plan</p></div>
          <div class="card"><p class="h4">Review and photography</p><p class="body-s mt-2">Included, because response has to be measured</p></div>
        </div>
        <p class="body-s mt-4 measure">Be cautious with packages of a fixed number of sessions sold before an examination. A course should be planned from your diagnosis and adjusted by your response, and it should be possible to stop it if you are not responding.</p>
        <p class="body mt-3 measure">See <a href="/cost-and-emi-options">cost and EMI options</a>, and <a href="/hair-prp-treatment-in-gurgaon">hair PRP treatment</a> for the alternative in the same family.</p>
      </div>
      <div class="card card--ink card--pad-lg">
        <h3 class="h3">Start With a Diagnosis</h3>
        <p class="body mt-3">Send photos of the parting, the crown and the hairline in daylight, and tell us when the thinning started and what you have already tried.</p>
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
        <h2 class="h2 mt-2">GFC Treatment FAQs</h2>
        <p class="body-s mt-3">Answers are general patient education. Whether GFC suits your particular diagnosis is answered at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'GFC Treatment at Our Gurgaon Clinic',
    'Assessment, treatment sessions and every review happen at our Sector 39 clinic in Gurugram, with the same doctor throughout. Patients travel to us from across Gurugram and neighbouring parts of South Delhi.'
) ?>

<?= cta_band(
    'Find Out Whether GFC Is the Right Treatment for You',
    'Come in for a proper assessment first. You will get an examination, investigation of anything treatable behind your hair loss, and a straight answer on whether a growth factor course is worth your money in your case.',
    'gfc-treatment',
    ['GFC treatment', 'GFC or PRP — please advise', 'After a hair transplant', 'Not sure — please advise']
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
