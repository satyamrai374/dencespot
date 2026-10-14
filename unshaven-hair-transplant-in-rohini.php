<?php
/**
 * /unshaven-hair-transplant-in-rohini — no-shave / partial-shave spoke for the
 * Rohini clinic.
 *
 * October 2026 (batch 2). The agency confirmed on 13 Oct 2026 that every
 * DenceSpot service is carried out at the Rohini clinic. Medical facts follow
 * the existing unshaven page; the wording is new. Client rule (14 Oct 2026):
 * Rohini pages do not mention or link the other location.
 *
 * Cannibalisation split: /hair-transplant-in-rohini owns the broad query and
 * /fue-hair-transplant-in-rohini owns extraction. This page owns the shaving
 * question: what changes when hair is left long, the three set-ups (fully
 * unshaven, partial shave, shaven), why the graft ceiling is lower, who it
 * suits and when shaving is still advised. No graft figure is given for an
 * unshaven day, because the clinic has not published one.
 *
 * Not yet reviewed by the clinic's doctor: doctor_block(..., false), no review
 * byline, not in MEDICAL_PAGES, and no named performer in the schema.
 *
 * SEO round 3 (14 Oct 2026, COMPETITOR-SEO §4 #6, §5): title "<Service> in
 * Rohini, Delhi: <modifier>", the three set-up cards became a comparison table
 * (same facts), a "Recovering in Delhi" note, the cost H2 links
 * /hair-transplant-cost-in-rohini, and 15 FAQs. No prices or graft ceilings.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/**
 * The three set-ups side by side. Each cell restates a fact already on this
 * page (or the Rohini cost page); it compares, it does not rank.
 */
$setupCols = ['Fully unshaven', 'Partial shave', 'Shaven'];
$setupRows = [
    ['aspect' => 'What is trimmed',
     'cells'  => ['Nothing, anywhere.', 'A window low at the back, covered by the longer hair above. The thinning area stays long.', 'The donor area, and often the thinning area, is trimmed short.']],
    ['aspect' => 'While it heals',
     'cells'  => ['The most discreet: your own hair covers the work, though each graft carries a small crust for several days.', 'Most of the discretion. Worn normally, the trimmed window cannot be seen.', 'The trimmed areas show until the hair grows back.']],
    ['aspect' => 'Pace and graft ceiling',
     'cells'  => ['The slowest set-up, with the lowest ceiling on grafts per day.', 'Better working conditions, with room for more grafts.', 'The quickest set-up, and the one that allows the largest session.']],
    ['aspect' => 'Usually suits',
     'cells'  => ['Small sessions and touch-ups.', 'Many people who first ask for no shaving at all.', 'Extensive loss that needs a large session.']],
    ['aspect' => 'Effect on cost',
     'cells'  => ['Usually more than a shaven session with the same graft count, because the work is slower.', 'Quicker than fully unshaven work for the same count.', 'The quickest way to move a given number of grafts.']],
];

$faqs = [
    ['q' => 'Is an unshaven transplant carried out at the Rohini clinic itself?',
     'a' => 'Yes. Unshaven and partial-shave procedures are carried out at the Rohini clinic in North-West Delhi by registered medical practitioners. The assessment, the procedure day and the follow-up reviews all take place there.'],
    ['q' => 'How many grafts can be done without shaving?',
     'a' => 'Fewer than in a shaven session on the same day, though there is no single figure. Working between long hairs slows extraction and a procedure day has a fixed length, so the practical ceiling is lower. If your mapped plan needs more than one unshaven day can sensibly take, you are offered a partial shave, two stages or a shaven session instead.'],
    ['q' => 'Will people at work be able to tell?',
     'a' => 'Far less easily than after a full shave, because your own hair covers the area. It is discreet rather than invisible: each graft carries a small crust for several days, and the extraction points at the back take a little while to fade.'],
    ['q' => 'Do grafts taken this way grow differently?',
     'a' => 'No. They follow the same course as any transplant: shedding in the first weeks, new hair starting at roughly three to four months, and a result judged at about ten to twelve months. Only the working conditions on the day change, not the biology.'],
    ['q' => 'Why does unshaven work usually cost more?',
     'a' => 'Because moving the same number of grafts takes noticeably longer, and the length of the procedure is what most of the fee pays for. If an unshaven quote matches a shaven one for an equal graft count, ask what accounts for that. Your estimate is itemised and given in writing after the assessment; <a href="/hair-transplant-cost-in-rohini">hair transplant cost in Rohini</a> shows how a graft count becomes a figure.'],
    ['q' => 'Is EMI available for an unshaven transplant?',
     'a' => 'Instalment options through third-party lenders may be available — ask at the consultation. The lender sets the interest, tenure and eligibility, so compare the total payable with the figure on your estimate before signing. <a href="/cost-and-emi-options">Cost, EMI and payment options</a> explains how medical EMI works.'],
    ['q' => 'Can an unshaven transplant be done with DHI?',
     'a' => 'Often, yes. Implanter placement suits setting grafts between existing hairs, so it is commonly considered for unshaven work. The choice is made for your case at the assessment, and many plans combine methods. See <a href="/dhi-hair-transplant-in-rohini">DHI hair transplant in Rohini</a>.'],
    ['q' => 'How long does an unshaven procedure day take?',
     'a' => 'Longer than a shaven session with the same graft count, because every graft takes more time to line up and remove. The day is scheduled with breaks for food and rest, under local anaesthetic, and you go home the same day. Arrange a lift or a cab rather than riding a two-wheeler.'],
    ['q' => 'Should I eat, or stop any medicines, beforehand?',
     'a' => 'Eat a proper meal before you arrive. Bring a list of every medicine and supplement you take, and do not stop a prescribed medicine on your own: blood thinners and alcohol are reviewed at the consultation, and you are told what to pause and when. Stopping smoking well before the procedure helps healing.'],
    ['q' => 'When can I go back to work, wear a helmet or go to the gym?',
     'a' => 'Most people return to desk work within a few days, and long hair makes that easier. Helmets, tight caps and ponytails wait until a review clears them. Full gym training usually resumes at around three to four weeks and swimming at around four, and the grafted area is kept out of direct sun for the first few weeks.'],
    ['q' => 'When can I comb, style or use gel normally again?',
     'a' => 'Keep combs and brushes away from the grafts and hold off on gels and sprays until a review clears you. It is decided by how the grafts have settled rather than by a fixed date, and your written aftercare covers washing around long hair in the meantime.'],
    ['q' => 'Which side effects should I report straight away?',
     'a' => 'Swelling, crusting, numbness and temporary shedding are expected. Call the clinic rather than waiting if you have a fever, spreading redness or warmth, pus or discharge, pain that gets worse after the first few days, or bleeding that does not stop with ten minutes of gentle pressure.'],
    ['q' => 'Is no-shave a common choice for women?',
     'a' => 'It often is. Many women will not accept trimming, and the number of grafts they need is often small enough for unshaven work to be practical. The first question, though, is whether surgery suits the pattern of loss at all; many women do better with medical treatment.'],
    ['q' => 'Can I send photographs on WhatsApp before booking?',
     'a' => 'Yes. Photographs of your hairline, crown and the back of your head, sent on WhatsApp to ' . LOC_DELHI_PHONE_DISPLAY . ', help the appointment start from the right questions. Whether your plan can stay unshaven is decided only once your graft number has been worked out at the examination. The clinic is open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . ').'],
    ['q' => 'Which parts of Delhi is the Rohini clinic convenient for?',
     'a' => 'It is in North-West Delhi near the Outer Ring Road, convenient for North and North-West Delhi, such as Rohini, Pitampura, Shalimar Bagh and Prashant Vihar. The clinic page has the opening hours and a map link.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Unshaven Hair Transplant in Rohini'],
];

$page = [
    'title'         => 'Unshaven Hair Transplant in Rohini, Delhi: No-Shave Options',
    'description'   => 'Unshaven hair transplant in Rohini, Delhi: no-shave and partial-shave set-ups compared, why sessions hold fewer grafts, who it suits, recovery and cost.',
    'url'           => '/unshaven-hair-transplant-in-rohini',
    'crumbs'        => $crumbs,
    'preload_image' => '/assets/img/services/svc-unshaven-768.webp',
    'schema'        => [
        schema_delhi_clinic(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/unshaven-hair-transplant-in-rohini', [
            'name'          => 'Unshaven Hair Transplant',
            'alternateName' => ['No-shave hair transplant', 'Partial-shave hair transplant', 'Unshaven hair transplant in Rohini, Delhi'],
            'procedureType' => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'Follicular units are extracted from an untrimmed or partly trimmed donor area, with the punch aligned between existing long hairs, then separated from the long hair and placed into sites made among the existing hair of the thinning area. Extraction is slower than in a shaven procedure, so the practical graft count per session is lower. A day case under local anaesthetic at the Rohini, Delhi clinic.',
            'preparation'   => 'Examination of the hair-loss pattern and donor density, review of medicines, and a decision with the patient on whether the graft number needed can be done fully unshaven, with a partial shave, in stages, or shaven.',
            'followup'      => 'Washing taught and a review in the first week, then photographic reviews at the Rohini clinic as the transplanted hair sheds and regrows.',
            'expectedPrognosis' => 'The growth timeline is the same as for a shaven procedure: transplanted hairs commonly shed within the first weeks, new growth usually begins at around three to four months and the result is judged at about ten to twelve months. Outcomes vary between patients and cannot be promised.',
            'location'      => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
        ]),
        schema_faq('/unshaven-hair-transplant-in-rohini', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Rohini · North-West Delhi</span>
        <h1 class="h1 mt-3">Unshaven Hair Transplant in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">An unshaven transplant leaves your hair at its usual length, so it hides the work while it heals. It is carried out at our Rohini clinic by registered medical practitioners. It is also slower than a shaven session and suits smaller cases, so whether your plan can be done this way is settled at the assessment, before any date is booked.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Hair transplant" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp the Rohini Clinic</a>
        </div>

        <?= ticks([
            'No-shave and partial-shave options',
            'Graft limit explained at the assessment',
            'Carried out at the Rohini clinic',
            'Home the same day',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-unshaven-768.webp" srcset="/assets/img/services/svc-unshaven-512.webp 512w, /assets/img/services/svc-unshaven-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a white mannequin head seen from the front, with short dark hair and a dotted line pencilled along the hairline, on a cream background" width="768" height="960" loading="eager" fetchpriority="high">
          <?= hp_ai_chip('AI-generated illustration') ?>
        </div>
        <div class="hero__badge-card">
          <p class="eyebrow">Rohini clinic</p>
          <p class="h4 mt-1"><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></p>
          <p class="meta"><?= e(HOURS_DISPLAY) ?><span style="display:block"><?= e(HOURS_NOTE) ?></span></p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= lead_strip() ?>

<?= lp_split([
    'img'     => 'svc-hair-transplant',
    'alt'     => 'a sculpted model of a follicular unit with three hairs, on a cream background',
    'eyebrow' => 'The approach',
    'title'   => 'What Changes When the Hair Is Not Shaved',
    'html'    => '<p>Trimming is normally what lets the doctor see each follicle and judge its angle under the skin. Leave the hair long and the same steps still happen, but every one of them is harder to see and reach.</p>'
               . '<p>It is not a different operation. Names such as no-shave FUE or U-FUE describe the same follicular unit extraction done in harder conditions — see <a href="/fue-hair-transplant-in-rohini">FUE hair transplant in Rohini</a>. Implanter placement suits working between existing hairs: see <a href="/dhi-hair-transplant-in-rohini">DHI hair transplant in Rohini</a>.</p>',
    'points'  => [
        'Donor area: the punch is aligned from the visible shaft',
        'Each graft: separated from its long hair before placing',
        'Thinning area: grafts set between existing hairs',
    ],
]) ?>

<section class="section section--canvas" id="options">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Your choices</p>
      <h2 class="h2 mt-2">Fully Unshaven, Partial Shave or Shaven</h2>
      <p class="body mt-3">Most people who ask about no-shave work end up choosing between three set-ups. Which one fits is decided by the number of grafts your plan needs, not by preference alone.</p>
    </div>
    <div class="card mt-6" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data" style="min-width:720px">
          <caption class="sr-only">Fully unshaven, partial-shave and shaven hair transplant set-ups compared: what is trimmed, how it looks while healing, pace, who each usually suits and the effect on cost</caption>
          <thead>
            <tr><th scope="col">What differs</th><?php foreach ($setupCols as $c): ?><th scope="col"><?= e($c) ?></th><?php endforeach; ?></tr>
          </thead>
          <tbody>
            <?php foreach ($setupRows as $r): ?>
            <tr>
              <th scope="row" style="white-space:normal;width:19%"><?= e($r['aspect']) ?></th>
              <?php foreach ($r['cells'] as $cell): ?><td><?= e($cell) ?></td><?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-5 measure">The partial shave is often the practical answer: for many people who arrive asking for no shaving at all, it ends up being the better fit. Whichever set-up you choose, the growth timeline is the same.</p>
  </div>
</section>

<section class="section section--white" id="graft-limits">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">The ceiling</p>
      <h2 class="h2 mt-2">Why an Unshaven Session Holds Fewer Grafts</h2>
      <p class="body mt-3">There is no fixed number to quote, because it depends on your hair and your plan. The reason the ceiling is lower, though, is simple arithmetic.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--tint"><?= icon('clock', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Slower extraction</h3><p class="body-s mt-2">Each follicle takes longer to line up and remove when long hair surrounds it.</p></div>
      <div class="card card--tint"><?= icon('calendar', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">A day of fixed length</h3><p class="body-s mt-2">At a slower rate, fewer grafts fit into one procedure day, however it is scheduled.</p></div>
      <div class="card card--tint"><?= icon('scale', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">If you need more</h3><p class="body-s mt-2">The plan becomes a partial shave, two stages or a shaven session, and you are told which before you book.</p></div>
    </div>
    <p class="body-s mt-5 measure">Your graft number comes from mapping the thinning area against your donor density. The <a href="/hair-transplant-graft-calculator">hair transplant graft calculator</a> gives a rough starting range, and <a href="/blog/how-many-grafts-do-you-need">how many grafts you actually need</a> explains the working.</p>
  </div>
</section>

<?= lp_split([
    'img'     => 'intro-donor',
    'alt'     => 'a mannequin head seen from behind, with the donor area at the back and sides marked',
    'eyebrow' => 'Suitability',
    'title'   => 'Who It Suits, and When Shaving Is Still Advised',
    'reverse' => true,
    'tone'    => 'canvas',
    'html'    => '<p>Unshaven work fits a modest graft number, enough surrounding hair to hide the work and a real need to avoid visible downtime. It also suits touch-ups and softening an earlier hairline.</p>'
               . '<p>Shaving is still advised when extensive loss needs a large session, when the donor must be harvested thinly over a wide area, when your hair is extremely fine or thick and closely packed, or when donor supply is already marginal.</p>'
               . '<p>For women, the first question is whether surgery suits the pattern of loss at all. Many do better with <a href="/hair-fall-treatment-in-rohini">hair fall treatment in Rohini</a> or <a href="/hair-prp-treatment-in-rohini">PRP treatment in Rohini</a>.</p>',
    'points'  => [
        'Smaller sessions and touch-ups',
        'Women for whom surgery is otherwise suitable',
        'Not for a large session or a marginal donor',
    ],
]) ?>

<?= lp_steps([
    'eyebrow' => 'At the Rohini clinic',
    'title'   => 'How an Unshaven Case Runs at Rohini',
    'intro'   => 'Consultations, procedures and reviews take place at the Rohini clinic and are carried out by registered medical practitioners.',
    'tone'    => 'white',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a wooden desk', 'title' => 'Assessment and a straight answer', 'text' => 'Your loss is staged, the donor area measured and the graft number worked out. Then fully unshaven, partial shave or shaven, with the reason in your written plan.'],
        ['img' => 'hero', 'alt' => 'a sculpted cross-section of scalp skin with hair follicles and their roots', 'title' => 'A longer day, planned as one', 'text' => 'Scheduled with breaks, under local anaesthetic, and home the same day. The first wash is shown at the clinic.'],
        ['img' => 'step-followup', 'alt' => 'a desk calendar with review dates circled', 'title' => 'Reviews at Rohini', 'text' => 'A check in the first week, then photographic reviews as the hair sheds and regrows, up to about twelve months.'],
    ],
]) ?>

<section class="section section--canvas" id="recovery">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Recovery</p>
      <h2 class="h2 mt-2">Aftercare When the Hair Is Left Long</h2>
      <p class="body mt-3">The healing itself is no different from any other transplant. Caring for it is more fiddly, since every instruction has to work around hair you have kept long.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="card card--pad-lg">
        <h3 class="h3">Still happens, even unshaven</h3>
        <div class="mt-3"><?= ticks([
            'A small crust at every graft for several days',
            'Tiny extraction points in the donor that fade',
            'Shedding of the transplanted hairs within weeks',
            'New growth from about three to four months',
        ], false) ?></div>
      </div>
      <div class="card card--pad-lg">
        <h3 class="h3">Extra care with long hair</h3>
        <div class="mt-3"><?= ticks([
            'Wash exactly as shown at the clinic',
            'Keep combs and brushes away from the grafts',
            'Hold off on gels and sprays until a review clears you',
            'No tight ponytails, caps or helmets until cleared',
        ], false) ?></div>
      </div>
    </div>
    <div class="grid grid--3 mt-5">
      <div class="note"><p class="h4">Before the day</p><div class="mt-2"><?= ticks([
          'Bring a list of every medicine and supplement you take.',
          'Ask how long your hair should be on the day.',
          'Arrange a lift home rather than riding a two-wheeler.',
      ], false) ?></div></div>
      <div class="note"><p class="h4">Riding to your reviews</p><p class="body-s mt-2">A helmet presses directly on the grafts, so plan other transport until a review clears you; the clinic page has <a href="/delhi-clinic">directions to the Rohini clinic</a>. For a day-by-day picture, see <a href="/blog/first-14-days-after-a-hair-transplant">what the first fortnight after a hair transplant involves</a>.</p></div>
      <div class="note"><p class="h4">Risks, honestly</p><p class="body-s mt-2">Swelling, crusting, numbness and temporary shedding are expected; infection and poor growth are uncommon; an over-harvested donor is lasting. Results vary between patients.</p></div>
    </div>
    <div class="card card--tint card--pad-lg mt-5" id="recovering-in-delhi">
      <h3 class="h3">Recovering in Delhi</h3>
      <p class="body-s mt-2 measure">Long hair hides the grafts from the street, but it also holds heat, sweat and dust against them. These are general practicalities; your written aftercare always comes first.</p>
      <div class="mt-3"><?= ticks([
          'Summer heat: spend the hottest hours in a cool room, and let sweat dry rather than towelling the grafts',
          'The smog season: keep outdoor time short on poor-air days; a mask with ear loops keeps straps off the donor area',
          'Dust: keep to the washing routine shown at the clinic rather than covering the grafts with a tight cap',
          'Riding pillion counts as riding, because a helmet is needed either way, so plan cabs until a review clears one',
      ], false) ?></div>
      <p class="body-s mt-3">Season by season, <a href="/blog/hair-transplant-recovery-in-delhi">hair transplant recovery in Delhi</a> covers heat, smog, the Metro and helmets in more detail.</p>
    </div>
  </div>
</section>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Cost guidance</p>
      <h2 class="h2 mt-2">Unshaven Hair Transplant Cost in Rohini: What Decides It</h2>
      <p class="body mt-3">There is no fixed price. Expect it to cost more than a shaven session with the same graft count: the work is slower, and procedure time is what drives the fee.</p>
    </div>
    <div class="grid grid--4 mt-5">
      <div class="card"><p class="h4">Graft count</p><p class="meta mt-1">From the mapped plan, zone by zone</p></div>
      <div class="card"><p class="h4">Set-up</p><p class="meta mt-1">Fully unshaven, or a quicker partial shave</p></div>
      <div class="card"><p class="h4">Hair type</p><p class="meta mt-1">Very fine or very dense hair slows the work</p></div>
      <div class="card"><p class="h4">Staging</p><p class="meta mt-1">One day, or the plan split across two</p></div>
    </div>
    <p class="body-s mt-4 measure">The estimate is itemised and in writing after your assessment. Comparing quotes? <a href="/blog/why-hair-transplant-quotes-vary">Why hair transplant quotes vary</a> explains what to ask. Instalment options through third-party lenders may be available — ask at the consultation, and read <a href="/cost-and-emi-options">payment and EMI options</a> first. No clinic can promise a particular density.</p>
    <p class="mt-4"><a class="hp-link" href="/hair-transplant-cost-in-rohini">Hair transplant cost in Rohini, worked through <?= hp_icon('arrow', 15, 2) ?></a></p>
  </div>
</section>

<?= doctor_block(
    'Treatment at the Rohini clinic is carried out by registered medical practitioners. Every doctor at DenceSpot is listed below with their qualifications.',
    '',
    false
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Unshaven Transplants in Rohini: Questions Answered</h2>
        <p class="body-s mt-3">General patient education. Whether your own plan can stay unshaven depends on your graft number, which is set at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= latest_posts_strip('hair-transplant', 3, 'Further Reading') ?>

<?= local_block(
    'Visit Our Rohini Clinic',
    'Unshaven and partial-shave assessments, procedures and follow-up reviews all take place at the Rohini clinic in North-West Delhi, six days a week.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= lp_cta([
    'eyebrow'   => 'Rohini, Delhi',
    'title'     => 'Find Out Whether Your Case Can Be Done Unshaven',
    'text'      => 'Bring your questions and a list of your medicines. Your graft number is worked out first, then you get a straight answer on fully unshaven, partial shave or shaven, and a written plan either way — with no pressure to book a date on the day.',
    'treatment' => 'Hair transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
