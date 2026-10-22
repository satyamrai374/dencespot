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
     'a' => 'It has a real evidence base, better than several treatments marketed alongside it, and a modest effect. The realistic description is support for existing hair — reduced shedding and some improvement in the quality of hair that is thinning — rather than regrowth of a bald area. Anyone showing you dramatic transformations from light alone is overselling it.'],
    ['q' => 'How long before I see anything?',
     'a' => 'Months, not weeks. This is slow even by the standards of hair treatment, and the most common way people waste money on it is buying a device, using it for six or eight weeks, seeing nothing, and stopping. That timeline was never going to show a result.'],
    ['q' => 'How often do I need to use it?',
     'a' => 'Regularly and consistently over a long period. The precise schedule depends on the device, and this is the part that decides whether it works for you. Sporadic use is functionally the same as not using it, which is why adherence is discussed honestly before anyone spends money on a device.'],
    ['q' => 'Will it regrow hair on a bald scalp?',
     'a' => 'No. Where follicles are gone, nothing applied to the surface brings them back. It is a treatment for hair that is thinning and still present, not for established baldness. If your loss is advanced, the honest conversation is about <a href="/hair-transplant-in-gurgaon">surgery</a> rather than light.'],
    ['q' => 'Is it a substitute for medical treatment?',
     'a' => 'It is generally used alongside rather than instead. Where pattern hair loss is the diagnosis, established medical treatment is the backbone of the plan. Light therapy is a reasonable addition, and it is sometimes chosen by people who cannot or prefer not to take medication — a decision made with the trade-off understood.'],
    ['q' => 'Should I buy a home device?',
     'a' => 'Possibly, and not before a diagnosis. Devices vary enormously in specification and price, and buying one to treat hair loss whose cause has not been established is the most expensive form of guessing. Get assessed, then ask what makes sense.'],
    ['q' => 'Is it safe?',
     'a' => 'It is generally well tolerated. It is non-invasive, does not break the skin, and does not typically cause the irritation topical treatments sometimes do. Eye protection considerations apply with some devices, and instructions should be followed rather than improvised.'],
    ['q' => 'Are there side effects?',
     'a' => 'Uncommon and usually minor — scalp warmth, occasional mild irritation, and headaches reported by some users of head-worn devices. It is one of the better-tolerated options, which is part of its appeal.'],
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
    'title'       => 'Hair LED Therapy in Gurgaon | DenceSpot Clinic',
    'description' => 'Low-level light therapy for hair in Gurgaon. A real but modest treatment that needs months of consistent use, explained before you buy an expensive device.',
    'url'         => '/hair-led-therapy-in-gurgaon',
    'crumbs'      => $crumbs,
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
            'expectedPrognosis' => 'The effect is modest and develops slowly over months rather than weeks, and consistent long-term use is required for any benefit. It supports hair that is thinning and still present and does not regrow hair where follicles are lost. Benefit is maintained rather than permanent, and is generally lost after stopping. A proportion of patients do not respond.',
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
        <h1 class="h1 mt-3">LED Therapy for Hair: Real, Modest, and Very Slow</h1>
        <p class="lead mt-3 measure">Low-level light therapy has a genuine evidence base and a genuinely small effect. It supports thinning hair over many months of consistent use. Most people who buy a device abandon it after eight weeks because nothing visible happened — which is exactly when nothing visible was ever going to have happened.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-track="book"><?= icon('calendar', 18) ?> Book an Assessment</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Diagnosis established before any device is bought',
            'Realistic timeline stated at the start',
            'Supports thinning hair, not bald scalp',
            NAP_LOCALITY . ' · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow"><img src="/assets/img/clinic-equipment.jpg" alt="Scalp assessment and treatment equipment at DenceSpot Clinic, Gurugram" width="800" height="1000" loading="eager"></div>
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
      <div class="card"><?= icon('doc', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Diagnosis first</p><p class="body-s mt-2">Before you spend anything on a device.</p></div>
      <div class="card"><?= icon('clock', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Honest timeline</p><p class="body-s mt-2">Months. Told upfront, not discovered later.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Modest claims</p><p class="body-s mt-2">Support for thinning hair, not transformation.</p></div>
      <div class="card"><?= icon('heart', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Well tolerated</p><p class="body-s mt-2">Non-invasive, and usually easy to live with.</p></div>
      <div class="card"><?= icon('info', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Told when it is pointless</p><p class="body-s mt-2">Established baldness needs a different answer.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="what-is">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">The basics, plainly</p>
        <h2 class="h2 mt-2">What Light Therapy Is</h2>
        <p class="body-l mt-3 measure">Light of particular wavelengths is delivered to the scalp, either in clinic with a panel or at home through a cap, helmet or comb. The intention is to support follicles that are still present and still working, rather than to do anything to skin where the follicles have gone.</p>
        <p class="body-l mt-3 measure">It goes by several names — low-level light therapy, low-level laser therapy, red light therapy — and devices differ substantially in specification, coverage and price. Those differences matter, which is one reason a general claim about "LED therapy" is less useful than it sounds.</p>
        <p class="body-l mt-3 measure">What can be said fairly is that this category has a more developed evidence base than several treatments sold alongside it, and that the effect it demonstrates is modest. Both halves of that sentence are true, and marketing tends to keep the first and drop the second.</p>
        <p class="body-l mt-3 measure">It is non-invasive, does not break the skin, and is generally well tolerated. For people who cannot or would rather not use medication, that tolerability is a real part of its appeal.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow">The realistic outcome</p>
        <h3 class="h3 mt-2">What "it works" means here</h3>
        <p class="body mt-3">Reduced shedding, and some improvement in the quality and calibre of hair that is thinning but still growing.</p>
        <p class="body mt-3">Not regrowth of a bald crown. Not a visible transformation. Not a replacement for surgery where the loss is established.</p>
        <p class="body mt-3">Set against that description, it is a reasonable thing to add to a plan. Set against the photographs used to sell devices, it will disappoint.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="adherence">
  <div class="wrap">
    <p class="eyebrow">The thing that decides whether it works</p>
    <h2 class="h2 mt-2">Adherence Is the Entire Treatment</h2>
    <p class="body-l mt-3 measure">With most treatments, missing some doses reduces the benefit. With this one, the pattern of use largely is the benefit, and the way people fail with it is remarkably consistent.</p>
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

<section class="section section--canvas" id="candidacy">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Suitability</p>
        <h2 class="h2 mt-2">Who It Suits</h2>
        <p class="body-l mt-3 measure">It suits people with thinning hair rather than established baldness, who have a diagnosis, and who are realistic about a slow and modest effect over a long period.</p>
        <p class="body-l mt-3 measure">It is a particularly reasonable option for people who cannot take, or prefer not to take, medication for pattern hair loss. That is a legitimate choice, and having something tolerable to offer in that situation matters.</p>
        <p class="body-l mt-3 measure">It is not the treatment for an area that is genuinely bald, for undiagnosed hair loss, or for autoimmune conditions such as <a href="/alopecia-areata-treatment-in-gurgaon">alopecia areata</a>. Photosensitivity, photosensitising medication and any history of skin cancer on the scalp all need reviewing before starting.</p>
      </div>
      <div>
        <div class="card card--pad-lg">
          <p class="h4">Reasonable to consider</p>
          <?= ticks([
              'Thinning hair with follicles still present',
              'Alongside established medical treatment',
              'Where medication is unsuitable or unwanted',
              'Supporting native hair after a transplant',
          ], false) ?>
        </div>
        <div class="card card--pad-lg mt-4">
          <p class="h4">Not appropriate</p>
          <?= ticks([
              'Established baldness with follicles gone',
              'Active scalp infection or inflammation',
              'Autoimmune scalp conditions',
              'Undiagnosed hair loss, as a first move',
          ], false) ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--ink" id="journey">
  <div class="wrap">
    <p class="eyebrow" style="color:var(--accent)">The process</p>
    <h2 class="h2 mt-2" style="color:#fff">How It Is Approached Here</h2>
    <div class="grid grid--4 mt-6">
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 01</p><p class="h4 mt-2" style="color:#fff">Assessment</p><p class="body-s mt-2">Diagnosis, stage of loss, and investigation of reversible causes — before any conversation about devices or sessions.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 02</p><p class="h4 mt-2" style="color:#fff">The honest conversation</p><p class="body-s mt-2">Whether light therapy suits your stage of loss, what it realistically does, and whether the adherence it requires fits your life.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 03</p><p class="h4 mt-2" style="color:#fff">Baseline photographs</p><p class="body-s mt-2">Taken before starting. With a slow, subtle treatment this is the only way to know later whether it did anything.</p></div>
      <div class="card card--ink"><p class="eyebrow" style="color:var(--accent)">Step 04</p><p class="h4 mt-2" style="color:#fff">Long review</p><p class="body-s mt-2">Reviewed over months against the baseline, with adherence discussed frankly, because that is usually the variable that explains the result.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="devices">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Buying a device</p>
        <h2 class="h2 mt-2">Before You Spend Money on Hardware</h2>
        <p class="body-l mt-3 measure">Home devices are widely sold at wildly varying prices, and people frequently buy one before anyone has established why their hair is falling. If the cause is iron deficiency or a thyroid problem, a light cap will do nothing about it, and months will pass.</p>
        <p class="body-l mt-3 measure">Devices also differ in coverage, specification and how practical they are to use daily. A device that is uncomfortable, awkward or inconvenient is a device that will not be used, and given how much adherence matters here, practicality is a clinical consideration rather than a comfort one.</p>
        <p class="body-l mt-3 measure">The sensible order is: get assessed, establish the diagnosis, decide whether light therapy has a role in your plan at all, and then ask what to buy. That sequence costs a consultation and can save a great deal more.</p>
      </div>
      <div>
        <div class="card card--pad-lg">
          <p class="h4">Ask before buying</p>
          <?= ticks([
              'Is light therapy right for my stage of loss?',
              'What am I realistically expecting, and by when?',
              'How often would I need to use it?',
              'What else should be in the plan alongside it?',
          ], false) ?>
        </div>
        <div class="card card--pad-lg mt-4">
          <p class="h4">Also worth reading</p>
          <p class="body-s mt-2"><a href="/hair-fall-treatment-in-gurgaon">Hair fall treatment</a> — how the diagnosis is made.</p>
          <p class="body-s mt-3"><a href="/hair-prp-treatment-in-gurgaon">Hair PRP treatment</a> — another supportive option.</p>
          <p class="body-s mt-3"><a href="/hair-transplant-in-gurgaon">Hair transplant</a> — where the loss is established.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Why the conversation here is mostly about adherence rather than about light: this treatment has a modest, real effect that only appears after many months of consistent use, and almost every disappointed patient stopped before the point at which a response could have been measured. Establishing the diagnosis first, being honest that the effect is small, and asking bluntly whether someone will actually keep it up is more useful than any claim about wavelengths. For a patient who will not sustain it, the right advice is to spend the money elsewhere.'
) ?>

<section class="section section--canvas" id="cost">
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
      <div class="card card--ink card--pad-lg">
        <h3 class="h3">Ask Before You Buy</h3>
        <p class="body mt-3">Send photos of the parting, crown and hairline in daylight, and tell us what you are considering buying. You may be told it is not right for your stage of loss, which is worth knowing first.</p>
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
        <h2 class="h2 mt-2">Hair LED Therapy FAQs</h2>
        <p class="body-s mt-3">Answers are general patient education. Whether light therapy belongs in your plan is decided at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'Hair Loss Assessment at Our Gurgaon Clinic',
    'Assessment, planning and every review happen at our Sector 39 clinic in Gurugram, with the same doctor throughout. Patients travel to us from across Gurugram and neighbouring parts of South Delhi.'
) ?>

<?= cta_band(
    'Find Out If It Is Worth It Before You Buy a Device',
    'Come in and have your stage of hair loss assessed. You will get a diagnosis, an honest view of what light therapy would and would not do for you, and a plan that puts your money where it will actually count.',
    'hair-led-therapy',
    ['LED or light therapy for hair', 'Considering buying a home device', 'Medication not suitable for me', 'Not sure — please advise']
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
