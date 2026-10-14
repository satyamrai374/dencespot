<?php
/**
 * /hair-led-therapy-in-gurgaon
 *
 * Non-surgical therapy spoke. Low-level light therapy for hair — LED caps,
 * combs, in-clinic panels.
 *
 * Editorial position: this is the treatment with the widest gap between how it
 * is sold and what it delivers. It has a legitimate evidence base, better than
 * mesotherapy's, and its realistic effect is modest and slow. It is also the
 * treatment most often bought as an expensive device on the strength of a
 * marketing claim, then abandoned after two months because nothing visible
 * happened — which is exactly the wrong way round, since adherence over many
 * months is the entire mechanism of benefit.
 *
 * So the page emphasises: modest effect, long horizon, adherence is the whole
 * game, it supports existing hair rather than regrowing bald scalp, and buying
 * a device before a diagnosis is the common mistake.
 *
 * Deliberately no wavelength figures, no device brands, no percentage
 * improvements, no session-count promises — none of it is evidenced for this
 * clinic and the numbers vary wildly between devices.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'What is LED therapy for hair?',
     'a' => 'Low-level light therapy, sometimes called red light therapy or laser therapy for hair. Light of particular wavelengths is delivered to the scalp, usually through a cap, helmet, comb or an in-clinic panel, with the intention of supporting follicles that are still present and functioning.'],
    ['q' => 'Does it actually work?',
     'a' => 'Some controlled trials report a small improvement with regular use, but many were small or short, devices differ widely, and not everyone responds. The realistic description is possible support for existing hair — reduced shedding and some improvement in the quality of hair that is thinning — rather than regrowth of a bald area. It does not cure or reverse hair loss. Anyone showing you dramatic transformations from light alone is overselling it.'],
    ['q' => 'How long before I see anything?',
     'a' => 'Months, not weeks. This is slow even by the standards of hair treatment, and the most common way people waste money on it is buying a device, using it for six or eight weeks, seeing nothing, and stopping. That timeline was never going to show a result.'],
    ['q' => 'How often do I need to use it?',
     'a' => 'Regularly and consistently over a long period. The precise schedule depends on the device, and this is the part that decides whether it works for you. Sporadic use is functionally the same as not using it, which is why adherence is discussed honestly before anyone spends money on a device.'],
    ['q' => 'Will it regrow hair on a bald scalp?',
     'a' => 'No. Where follicles are gone, nothing applied to the surface brings them back. It is a treatment for hair that is thinning and still present, not for established baldness. If your loss is extensive, the honest conversation is about <a href="/hair-transplant-in-gurgaon">surgery</a> rather than light.'],
    ['q' => 'Is it a substitute for medical treatment?',
     'a' => 'It is generally used alongside rather than instead. Where pattern hair loss is the diagnosis, established medical treatment is the backbone of the plan. Light therapy may be discussed as an addition, and it is sometimes chosen by people who cannot or prefer not to take medication — a decision made with the trade-off understood.'],
    ['q' => 'Should I buy a home device?',
     'a' => 'Possibly, and not before a diagnosis. Devices vary enormously in specification and price, and buying one to treat hair loss whose cause has not been established is the most expensive form of guessing. Get assessed, then ask what makes sense.'],
    ['q' => 'Is it safe?',
     'a' => 'It is generally well tolerated. It is non-invasive, does not break the skin, and does not typically cause the irritation topical treatments sometimes do. Eye protection considerations apply with some devices, and instructions should be followed rather than improvised.'],
    ['q' => 'Are there side effects?',
     'a' => 'Uncommon and usually minor — scalp warmth, occasional mild irritation, and headaches reported by some users of head-worn devices.'],
    ['q' => 'Who should not use it?',
     'a' => 'It is not appropriate over active scalp infection or inflammation, and it is not a treatment for autoimmune conditions such as alopecia areata. Photosensitivity and any medication that causes it need reviewing beforehand, as does a history of skin cancer on the scalp.'],
    ['q' => 'Can it be used after a hair transplant?',
     'a' => 'It is sometimes used to support the surrounding native hair after surgery, which the transplant does not address. Timing after a procedure needs to be right, and that is decided at your follow-up rather than assumed.'],
    ['q' => 'Will it help if my hair loss has another cause?',
     'a' => 'No. Iron deficiency, thyroid disease and hormonal conditions cause hair loss and respond to treating the condition. Light therapy does not correct any of them, which is why the assessment comes first.'],
    ['q' => 'Do I keep using it forever?',
     'a' => 'Benefit is maintained rather than banked. Pattern hair loss continues underneath, so stopping generally means losing whatever was gained over the following period. That ongoing commitment is worth factoring into the decision before buying a device.'],
    ['q' => 'How much does it cost?',
     'a' => 'It depends on whether you are treated in clinic or using a home device, and devices vary widely in price. What matters more is whether it is the right treatment for your diagnosis, which is settled at assessment first.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Treatments', 'url' => '/hair-fall-treatment-in-gurgaon'],
    ['name' => 'Hair LED therapy in Gurgaon'],
];

$page = [
    'title'       => 'Hair LED Therapy in Gurgaon: Does It Work? Sessions & Cost',
    'description' => 'Hair LED (low-level light) therapy in Gurgaon: what it can and cannot do, the small effect over months, clinic sessions or a home device, and cost factors.',
    'url'         => '/hair-led-therapy-in-gurgaon',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-followup-768.webp',
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_therapy('/hair-led-therapy-in-gurgaon', [
            'name'          => 'LED Therapy for Hair',
            'alternateName' => ['Low-level light therapy', 'Red light therapy for hair', 'Low-level laser therapy for hair loss'],
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'Light of specific wavelengths is delivered to the scalp, either in clinic using a panel or at home using a cap, helmet or comb device, on a regular schedule sustained over an extended period. It is used to support follicles that remain present and functioning, generally alongside established medical treatment for the underlying diagnosis.',
            'preparation'   => 'Clinical assessment and scalp examination to establish the diagnosis and stage of hair loss, investigation of reversible causes, exclusion of active scalp infection or inflammation and of autoimmune scalp disease, and review of photosensitivity, photosensitising medication and any history of skin cancer of the scalp.',
            'followup'      => 'Baseline and interval photography, review of adherence and response over months, and continuation of underlying medical treatment alongside.',
            'expectedPrognosis' => 'Evidence is limited: trials are mostly small or short and devices vary. Any effect is modest and develops slowly over months rather than weeks, and consistent long-term use is required for any benefit. It supports hair that is thinning and still present and does not regrow hair where follicles are lost. Benefit is maintained rather than permanent, and is generally lost after stopping. A proportion of patients do not respond.',
        ]),
        schema_faq('/hair-led-therapy-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Hair LED therapy in Gurgaon</span>
        <h1 class="h1 mt-3">LED Therapy for Hair: Limited Evidence, a Small Effect, a Long Wait</h1>
        <p class="lead mt-3 measure">Low-level light therapy has some supportive trial evidence, much of it small or short, and the effect reported is small. Any benefit to thinning hair needs many months of consistent use, and some people see none. People who buy a device often abandon it after eight weeks because nothing visible happened — which is exactly when nothing visible was ever going to have happened.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-treatment="Hair fall treatment" data-track="book"><?= icon('calendar', 18) ?> Book an Assessment</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Diagnosis established before any device is bought',
            'Realistic timeline stated at the start',
            'Supports thinning hair, not bald scalp',
            'At our clinic in Sector 39, Gurugram',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-followup-768.webp" srcset="/assets/img/services/svc-followup-512.webp 512w, /assets/img/services/svc-followup-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a desk calendar with several days circled in green, beside a small potted succulent and a pen on a wooden desk" width="768" height="960" loading="eager" fetchpriority="high">
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
      <div class="card"><?= icon('doc', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Diagnosis first</p><p class="meta mt-1">Before you spend anything on a device.</p></div>
      <div class="card"><?= icon('clock', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Honest timeline</p><p class="meta mt-1">Months. Told upfront, not discovered later.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Modest claims</p><p class="meta mt-1">Support for thinning hair, not transformation.</p></div>
      <div class="card"><?= icon('heart', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Well tolerated</p><p class="meta mt-1">Non-invasive, and usually easy to live with.</p></div>
      <div class="card"><?= icon('info', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Told when it is pointless</p><p class="meta mt-1">Established baldness needs a different answer.</p></div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-skin',
    'alt'     => 'a sculpted block of skin cut away to show its layers, one hair growing from its follicle and a coiled gland beside it',
    'eyebrow' => 'The basics, plainly',
    'title'   => 'What Light Therapy Is',
    'id'      => 'what-is',
    'html'    => '<p>Light of particular wavelengths is delivered to the scalp, either in clinic with a panel or at home through a cap, helmet or comb. The intention is to support follicles that are still present and still working, rather than to do anything to skin where the follicles have gone.</p>'
               . '<p>It goes by several names — low-level light therapy, low-level laser therapy, red light therapy — and devices differ substantially in specification, coverage and price, which is one reason a general claim about "LED therapy" is less useful than it sounds.</p>'
               . '<p>What can be said fairly is that it has some controlled-trial evidence, that many of those trials were small or short, and that the effect they report is modest. Marketing tends to keep the first part and drop the rest.</p>'
               . '<p><b>What "it works" means here:</b> at most, reduced shedding and some improvement in the quality and calibre of hair that is thinning but still growing — and some people see no change. Not regrowth of a bald crown, not a visible transformation, not a cure, and not a replacement for surgery where the loss is established.</p>',
    'points'  => [
        'Non-invasive; it does not break the skin',
        'Generally well tolerated',
        'In clinic or at home, on a regular schedule over many months',
    ],
]) ?>

<?php
$ledFacts = [
    ['Can it regrow hair on a bald area?', 'No. Where follicles have gone, light cannot bring them back. Established baldness is a conversation about surgery instead.'],
    ['Can it thicken hair that is thinning?', 'Possibly, and modestly. Some controlled trials report a small improvement with regular use over months; some people see no change at all.'],
    ['Will it stop pattern hair loss?', 'No. The underlying process continues, and any benefit is generally lost after stopping.'],
    ['How soon would a change show?', 'Over months rather than weeks, judged against baseline photographs rather than the mirror.'],
    ['Does it replace medication?', 'It is generally used alongside it. Some people who cannot take, or prefer not to take, medication choose it, with a smaller and less certain effect understood.'],
    ['Can it be used after a transplant?', 'Sometimes, to support the surrounding native hair. The timing after surgery is decided at your follow-up.'],
    ['Will it correct low iron, thyroid or hormonal causes?', 'No. Those respond to treating the cause, which is why the assessment comes first.'],
    ['Does it treat alopecia areata or an inflamed scalp?', 'No. Patchy loss and scalp conditions need diagnosing and treating in their own right.'],
    ['Is it safe?', 'Generally well tolerated and non-invasive. Photosensitivity, photosensitising medicines and any history of skin cancer on the scalp are reviewed first, and some devices need eye protection.'],
    ['In the clinic or at home?', 'Both exist. Clinic sessions mean regular visits; a home device means keeping to its schedule yourself. The useful choice is the one you will keep up.'],
];
?>
<section class="section section--canvas" id="can-cannot">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">At a glance</p>
      <h2 class="h2 mt-2">Does LED Therapy Work for Hair? What It Can and Cannot Do</h2>
      <p class="body mt-3">Light therapy sits at the supportive end of hair care: a possible small help for hair that is still there, used alongside treatment for the cause. These are the questions people most often ask before buying a device or booking sessions.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data data--fit">
          <caption class="sr-only">What LED (low-level light) therapy can and cannot do for hair, and where it sits alongside other care. A general guide, not a diagnosis.</caption>
          <thead><tr><th scope="col">Question</th><th scope="col">Short answer</th></tr></thead>
          <tbody>
            <?php foreach ($ledFacts as $r): ?>
            <tr><th scope="row" style="white-space:normal;width:38%"><?= e($r[0]) ?></th><td><?= e($r[1]) ?></td></tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">The order that makes sense is diagnosis first, then treatment for the cause, then anything supportive. <a href="/hair-fall-treatment-in-gurgaon">Hair fall treatment</a> explains how the cause is found, and the <a href="/hair-loss-assessment">six-question hair loss self-assessment</a> suggests a next step before you book. It is not a diagnosis.</p>
  </div>
</section>

<section class="section section--white" id="adherence">
  <div class="wrap">
    <p class="eyebrow">The thing that decides whether it works</p>
    <h2 class="h2 mt-2">Adherence Is the Entire Treatment</h2>
    <p class="body-l mt-3 measure">With most treatments, missing some doses reduces the benefit. With this one, any benefit depends almost entirely on consistent use, and the way people fall off it is remarkably consistent.</p>
    <div class="grid grid--3 mt-5">
      <div class="card"><p class="h4">Month one to two</p><p class="body-s mt-2">Used diligently. Nothing visible happens, because nothing visible happens this early in any hair treatment. Enthusiasm is still high.</p></div>
      <div class="card"><p class="h4">Month two to three</p><p class="body-s mt-2">Use becomes intermittent. The device is still on the shelf. The mirror still looks the same, and the schedule starts slipping.</p></div>
      <div class="card"><p class="h4">Month four onwards</p><p class="body-s mt-2">Abandoned, at roughly the point where a response would first have become measurable. The money is spent and the trial was never actually run.</p></div>
    </div>
    <div class="card card--pad-lg mt-6">
      <p class="eyebrow">Which leads to a blunt question</p>
      <h3 class="h3 mt-2">Will you genuinely use it?</h3>
      <p class="body mt-3 measure">It is worth answering honestly before spending money, because a device used sporadically for three months delivers nothing at all — you will have bought the object and not the treatment.</p>
      <p class="body mt-3 measure">If the honest answer is that you will not keep it up, that is useful information and not a moral failing. It means your money is better spent on something with a lower adherence burden, and that conversation is more valuable than a sale.</p>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-women',
    'alt'     => 'a white mannequin head seen from above, with green felt hair and a widening central parting',
    'eyebrow' => 'Suitability',
    'title'   => 'Who It Suits',
    'id'      => 'candidacy',
    'tone'    => 'canvas',
    'reverse' => true,
    'html'    => '<p>It suits people with thinning hair rather than established baldness, who have a diagnosis, and who are realistic about a slow and modest effect over a long period. It is sometimes considered by people who cannot take, or prefer not to take, medication for pattern hair loss — a legitimate choice, made with the smaller and less certain effect understood.</p>'
               . '<p>It is not the treatment for an area that is genuinely bald, for undiagnosed hair loss, or for autoimmune conditions such as <a href="/alopecia-areata-treatment-in-gurgaon">alopecia areata</a>. Photosensitivity, photosensitising medication and any history of skin cancer on the scalp all need reviewing before starting.</p>'
               . '<p><b>Not appropriate:</b> established baldness with follicles gone; active scalp infection or inflammation; autoimmune scalp conditions; undiagnosed hair loss, as a first move.</p>'
               . '<p><b>Reasonable to consider:</b></p>',
    'points'  => [
        'Thinning hair with follicles still present',
        'Alongside established medical treatment',
        'Where medication is unsuitable or unwanted',
        'Supporting native hair after a transplant',
    ],
]) ?>

<?= lp_steps([
    'eyebrow' => 'The process',
    'title'   => 'How It Is Approached Here',
    'id'      => 'journey',
    'intro'   => 'A realistic timeline is stated at the start, before any device is bought.',
    'tone'    => 'white',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk', 'title' => 'Assessment', 'text' => 'Diagnosis, stage of loss, and investigation of reversible causes — before any conversation about devices or sessions.'],
        ['img' => 'step-plan', 'alt' => 'a tablet on a desk showing a head diagram', 'title' => 'The honest conversation', 'text' => 'Whether light therapy suits your stage of loss, what it realistically does, and whether the adherence it requires fits your life.'],
        ['img' => 'stage-temples', 'alt' => 'a mannequin head seen from above, with green felt hair receding at both temples', 'title' => 'Baseline photographs', 'text' => 'Taken before starting. With a slow, subtle treatment this is the only way to know later whether it did anything.'],
        ['img' => 'hero', 'alt' => 'a sculpted cross-section of skin with several hair follicles and their roots', 'title' => 'Long review', 'text' => 'Reviewed over months against the baseline, with adherence discussed frankly, because that is usually the variable that explains the result.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-laser',
    'alt'     => 'a white handheld device on a white tray beside a folded sage-green towel',
    'eyebrow' => 'Buying a device',
    'title'   => 'Before You Spend Money on Hardware',
    'id'      => 'devices',
    'tone'    => 'canvas',
    'html'    => '<p>Home devices are widely sold at wildly varying prices, and people frequently buy one before anyone has established why their hair is falling. If the cause is iron deficiency or a thyroid problem, a light cap will do nothing about it, and months will pass.</p>'
               . '<p>Devices also differ in coverage, specification and how practical they are to use daily. A device that is uncomfortable or inconvenient will not be used, and given how much adherence matters here, practicality is a clinical consideration rather than a comfort one.</p>'
               . '<p>The sensible order: get assessed, establish the diagnosis, decide whether light therapy has a role in your plan at all, and then ask what to buy. Also worth reading: <a href="/hair-fall-treatment-in-gurgaon">hair fall treatment</a> for how the diagnosis is made, <a href="/hair-prp-treatment-in-gurgaon">hair PRP treatment</a> as another supportive option, and <a href="/hair-transplant-in-gurgaon">hair transplant</a> where the loss is established.</p>'
               . '<p><b>Ask before buying:</b></p>',
    'points'  => [
        'Is light therapy right for my stage of loss?',
        'What am I realistically expecting, and by when?',
        'How often would I need to use it?',
        'What else should be in the plan alongside it?',
    ],
]) ?>

<?= doctor_block(
    'Consultations and procedures are carried out by registered medical practitioners at the clinic.'
) ?>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">What It Costs</h2>
        <p class="body mt-3 measure">Cost depends on whether treatment is delivered in clinic or through a home device, and home devices vary enormously in price. The more useful question is whether it belongs in your plan at all, which is settled at assessment.</p>
        <div class="grid grid--2 mt-5">
          <div class="card"><p class="h4">In-clinic or at home</p><p class="body-s mt-2">Two quite different cost structures</p></div>
          <div class="card"><p class="h4">Device specification</p><p class="body-s mt-2">Coverage and build vary widely across the market</p></div>
          <div class="card"><p class="h4">Duration of use</p><p class="body-s mt-2">This is a long-term commitment, not a course</p></div>
          <div class="card"><p class="h4">Treatment alongside</p><p class="body-s mt-2">Usually part of a broader plan, costed separately</p></div>
        </div>
        <p class="body-s mt-4 measure">The most expensive version of this treatment is an unused device bought before a diagnosis. The consultation that prevents that is the cheapest part of the whole process.</p>
        <p class="body mt-3 measure">See <a href="/cost-and-emi-options">cost and payment options</a>.</p>
      </div>
      <div class="cta-band" style="display:block">
        <h3 class="h3">Ask Before You Buy</h3>
        <p class="body mt-3">Send photos of the parting, crown and hairline in daylight, and tell us what you are considering buying. You may be told it is not right for your stage of loss, which is worth knowing first.</p>
        <a class="btn btn--block btn--accent mt-5" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Send photos on WhatsApp</a>
        <a class="btn btn--block btn--ghost mt-3" href="/book-consultation" data-book data-treatment="Hair fall treatment" data-track="book">Book an assessment</a>
        <p class="body-s mt-4">Your details are used only to arrange your consultation.</p>
      </div>
    </div>
  </div>
</section>

<?= local_block(
    'Hair Loss Assessment at Our Gurgaon Clinic',
    'Assessment, planning and reviews take place at our Sector 39 clinic in Gurugram. Consultations and procedures are carried out by registered medical practitioners at the clinic.'
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Hair LED Therapy FAQs</h2>
        <p class="body-s mt-3">Answers are general patient education. Whether light therapy belongs in your plan is decided at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= lp_cta([
    'eyebrow'   => 'Sector 39, Gurugram',
    'title'     => 'Find Out If It Is Worth It Before You Buy a Device',
    'text'      => 'Come in and have your stage of hair loss assessed. You will get a diagnosis, an honest view of what light therapy would and would not do for you, and a plan that puts your money where it will actually count.',
    'treatment' => 'Hair fall treatment',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
