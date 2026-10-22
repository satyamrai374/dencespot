<?php
/**
 * / — homepage.
 *
 * The site had no homepage at all, which meant the root URL 404'd: every
 * brand search, every GBP click, every backlink to the domain landed on an
 * error. Nothing else in the SEO plan matters while that is true.
 *
 * Its job here is not to explain hair transplantation — the treatment pages
 * own that. It is to route the visitor to the right treatment page fast, and
 * to make the one differentiator that competitors in Gurgaon cannot copy:
 * the doctor who assesses you is the doctor who operates on you.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/* Homepage-level questions only. Treatment specifics live on their own pages,
   so the same question-and-answer pair never appears on two URLs. */
$faqs = [
    ['q' => 'Which hair loss treatment do I actually need?',
     'a' => 'That is decided by examination, not by what you ask for. Many patients who arrive asking about a transplant are treated medically instead, or first, because surgery on an unstable pattern leaves gaps as the surrounding hair keeps receding. The assessment stages your hair loss, measures donor density and checks scalp health before anything is recommended.'],
    ['q' => 'Who performs the procedure at DenceSpot Clinic?',
     'a' => 'Dr. Nyra assesses your scalp and donor area, designs the hairline, plans the graft numbers and performs the procedure herself, supported by the clinic\'s trained team. Your follow-up reviews are with her as well. This is worth asking every clinic you shortlist, because in many the doctor consults while technicians operate.'],
    ['q' => 'Where is the clinic and what are the timings?',
     'a' => 'DenceSpot Clinic is at ' . nap_address_line() . ', ' . NAP_LANDMARK . '. Opening hours are ' . HOURS_DISPLAY . ', and Sunday is by appointment only. Consultations and procedures both happen at this one address — there is no separate surgical centre you get sent to.'],
    ['q' => 'How much does treatment cost?',
     'a' => 'Cost follows the plan, and the plan follows the assessment, so no single figure fits every case. What drives it is graft count, hair-loss stage, donor density, technique and whether supporting medical therapy is part of the plan. The cost pages set out the arithmetic, and you receive an itemised written estimate before you commit to anything.'],
    ['q' => 'Do I have to travel to the clinic for a first opinion?',
     'a' => 'Not to begin with. Send clear photographs of the front, crown and donor area on WhatsApp and the clinic will tell you whether a consultation is likely to be worth the journey. What cannot be done remotely is the part that decides your plan — examining the scalp under magnification and measuring donor density.'],
];

$page = [
    'title'       => 'Hair Transplant Clinic in Gurgaon | DenceSpot Clinic',
    'description' => 'Doctor-led hair transplant, PRP and hair-fall treatment in Sector 39, Gurugram. Dr. Nyra assesses, plans and performs every case herself. Book a consultation.',
    'url'         => '/',
    'preload_image' => '/assets/img/dr-nayra.webp',
    'crumbs'      => [],
    'schema'      => [
        schema_website(),
        schema_clinic(),
        schema_physician(),
        schema_faq('/', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Hair restoration clinic in <?= e(NAP_LOCALITY) ?></span>
        <h1 class="h1 mt-3">Hair Transplant Clinic in Gurgaon, Led by a Doctor Who Operates</h1>
        <p class="lead mt-3 measure">At DenceSpot your scalp, donor area and hair-loss pattern are examined by a doctor before anything is recommended — and the doctor who plans your case is the doctor who performs it. Some patients need surgery. Many need medical treatment first, or instead. The assessment decides, not a package.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Assessed, planned and performed by Dr. Nyra',
            'Donor supply measured before any plan',
            'Written estimate, nothing added later',
            NAP_LOCALITY . ' · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow"><img src="/assets/img/dr-nayra.webp" alt="Dr. Nyra, MBBS, MD (Dermatology), hair restoration doctor at DenceSpot Clinic, Sector 39 Gurugram" width="800" height="1000" loading="eager" fetchpriority="high" decoding="async"></div>
        <div class="hero__badge-card">
          <p class="eyebrow">Your consulting doctor</p>
          <p class="h4 mt-1"><?= e(DOCTORS['dr-nyra']['name']) ?></p>
          <p class="meta"><?= e(DOCTORS['dr-nyra']['quals']) ?> · <?= e(DOCTORS['dr-nyra']['role']) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============ START FROM THE CONCERN ============ -->
<section class="section section--white">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">What brought you here</p>
      <h2 class="h2 mt-2">Start From the Concern, Not the Procedure</h2>
      <p class="body mt-3">Different patterns need different answers. Pick what matches your case and the page will tell you honestly what the options are — including when the option is to wait.</p>
    </div>

    <div class="grid grid--4 mt-6">
      <a class="card" href="/hair-transplant-in-gurgaon" style="text-decoration:none;color:inherit">
        <?= icon('hairline', 22, 'var(--accent-deep)') ?>
        <h3 class="h4 mt-2">Receding hairline</h3>
        <p class="meta mt-1">Temples going back, hairline losing its shape. Usually FUE or DHI, designed to age well.</p>
      </a>
      <a class="card" href="/hair-transplant-in-gurgaon" style="text-decoration:none;color:inherit">
        <?= icon('search', 22, 'var(--accent-deep)') ?>
        <h3 class="h4 mt-2">Crown thinning</h3>
        <p class="meta mt-1">The area that consumes grafts fastest. Graft planning plus medical therapy to hold what is there.</p>
      </a>
      <a class="card" href="/hair-fall-treatment-in-gurgaon" style="text-decoration:none;color:inherit">
        <?= icon('chart', 22, 'var(--accent-deep)') ?>
        <h3 class="h4 mt-2">Sudden hair fall</h3>
        <p class="meta mt-1">Increased shedding needs a cause found first — thyroid, iron, stress or pattern loss.</p>
      </a>
      <a class="card" href="/hair-prp-treatment-in-gurgaon" style="text-decoration:none;color:inherit">
        <?= icon('settings', 22, 'var(--accent-deep)') ?>
        <h3 class="h4 mt-2">Early thinning</h3>
        <p class="meta mt-1">Density dropping but no bald area yet. Often PRP and medical treatment rather than surgery.</p>
      </a>
      <a class="card" href="/beard-transplant-gurgaon" style="text-decoration:none;color:inherit">
        <?= icon('beard', 22, 'var(--accent-deep)') ?>
        <h3 class="h4 mt-2">Patchy beard</h3>
        <p class="meta mt-1">Gaps, thin sideburns or scarred areas filled with scalp grafts at the correct facial angle.</p>
      </a>
      <a class="card" href="/hair-fall-treatment-in-gurgaon" style="text-decoration:none;color:inherit">
        <?= icon('user', 22, 'var(--accent-deep)') ?>
        <h3 class="h4 mt-2">Hair loss in women</h3>
        <p class="meta mt-1">Diffuse thinning and parting-line loss, worked up for hormonal and nutritional causes first.</p>
      </a>
      <a class="card" href="/hair-transplant-in-gurgaon" style="text-decoration:none;color:inherit">
        <?= icon('shield', 22, 'var(--accent-deep)') ?>
        <h3 class="h4 mt-2">A previous transplant</h3>
        <p class="meta mt-1">Unnatural hairlines, pluggy grafts or a depleted donor area, assessed for what can be corrected.</p>
      </a>
      <a class="card" href="/hair-transplant-cost-in-gurgaon" style="text-decoration:none;color:inherit">
        <?= icon('rupee', 22, 'var(--accent-deep)') ?>
        <h3 class="h4 mt-2">Comparing quotes</h3>
        <p class="meta mt-1">How graft counts and per-graft rates actually combine, and what a fair quote looks like.</p>
      </a>
    </div>
  </div>
</section>

<!-- ============ TREATMENTS ============ -->
<section class="section section--canvas">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Treatments</p>
      <h2 class="h2 mt-2">Surgical and Non-Surgical, Under One Clinical Plan</h2>
      <p class="body mt-3">Every treatment below is planned and carried out at the same address in <?= e(NAP_LOCALITY) ?>, by the same doctor.</p>
    </div>

    <div class="grid grid--3 mt-6">
      <a class="card card--pad-lg" href="/hair-transplant-in-gurgaon" style="text-decoration:none;color:inherit">
        <p class="eyebrow">Surgical</p>
        <h3 class="h3 mt-2">Hair Transplant</h3>
        <p class="body-s mt-2">FUE, DHI and FUT. Technique chosen to fit your scalp and donor area, not the other way round.</p>
        <p class="meta mt-3"><?= icon('arrow', 15, 'var(--accent-deep)') ?> Graft counts, cost and recovery</p>
      </a>
      <a class="card card--pad-lg" href="/beard-transplant-gurgaon" style="text-decoration:none;color:inherit">
        <p class="eyebrow">Surgical</p>
        <h3 class="h3 mt-2">Beard Transplant</h3>
        <p class="body-s mt-2">Scalp grafts placed along your natural growth direction to fill patchy or scarred beard zones.</p>
        <p class="meta mt-3"><?= icon('arrow', 15, 'var(--accent-deep)') ?> Density, donor supply and cost</p>
      </a>
      <a class="card card--pad-lg" href="/hair-prp-treatment-in-gurgaon" style="text-decoration:none;color:inherit">
        <p class="eyebrow">Non-surgical</p>
        <h3 class="h3 mt-2">Hair PRP &amp; GFC</h3>
        <p class="body-s mt-2">Platelet-rich plasma across a planned course, for early thinning or alongside a transplant.</p>
        <p class="meta mt-3"><?= icon('arrow', 15, 'var(--accent-deep)') ?> Sessions, evidence and cost</p>
      </a>
      <a class="card card--pad-lg" href="/hair-fall-treatment-in-gurgaon" style="text-decoration:none;color:inherit">
        <p class="eyebrow">Medical</p>
        <h3 class="h3 mt-2">Hair Fall Treatment</h3>
        <p class="body-s mt-2">Prescription and topical therapy with monitoring, used to slow loss and protect existing hair.</p>
        <p class="meta mt-3"><?= icon('arrow', 15, 'var(--accent-deep)') ?> Causes, testing and what reverses</p>
      </a>
      <a class="card card--pad-lg" href="/fue-hair-transplant-in-gurgaon" style="text-decoration:none;color:inherit">
        <p class="eyebrow">Technique</p>
        <h3 class="h3 mt-2">FUE &amp; DHI</h3>
        <p class="body-s mt-2">How each technique differs in placement, scarring, session length and what it suits.</p>
        <p class="meta mt-3"><?= icon('arrow', 15, 'var(--accent-deep)') ?> Compare the techniques</p>
      </a>
      <a class="card card--pad-lg" href="/hair-transplant-cost-in-gurgaon" style="text-decoration:none;color:inherit">
        <p class="eyebrow">Cost</p>
        <h3 class="h3 mt-2">What It Costs</h3>
        <p class="body-s mt-2">How graft count and per-graft rate combine, what an estimate includes, and what to ask.</p>
        <p class="meta mt-3"><?= icon('arrow', 15, 'var(--accent-deep)') ?> Cost breakdown</p>
      </a>
    </div>
  </div>
</section>

<!-- ============ BEFORE & AFTER SLIDER ============ -->
<?= before_after_slider_section() ?>

<!-- ============ THE DIFFERENTIATOR ============ -->
<section class="section section--ink">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Why patients choose DenceSpot</p>
      <h2 class="h2 mt-2">The Doctor You Meet Is the Doctor Who Operates</h2>
      <p class="body mt-3">In a large share of hair transplant clinics the consultation is taken by a counsellor and the surgery is carried out by technicians. Ask any clinic you shortlist who physically performs the extraction and the placement. The answer varies far more than most patients expect.</p>
    </div>

    <div class="grid grid--4 mt-6">
      <div class="card card--ink">
        <?= icon('user', 22, 'var(--accent)') ?>
        <h3 class="h4 mt-2">One doctor, start to finish</h3>
        <p class="meta mt-1">Assessment, hairline design, graft planning, the procedure itself and every follow-up review.</p>
      </div>
      <div class="card card--ink">
        <?= icon('scale', 22, 'var(--accent)') ?>
        <h3 class="h4 mt-2">Donor supply respected</h3>
        <p class="meta mt-1">A transplant is a one-time use of a finite donor area. It is measured before it is spent.</p>
      </div>
      <div class="card card--ink">
        <?= icon('doc', 22, 'var(--accent)') ?>
        <h3 class="h4 mt-2">Written estimate</h3>
        <p class="meta mt-1">Itemised after the assessment, with what it excludes named rather than discovered later.</p>
      </div>
      <div class="card card--ink">
        <?= icon('pin', 22, 'var(--accent)') ?>
        <h3 class="h4 mt-2">One clinic, one address</h3>
        <p class="meta mt-1">Consultations and procedures both happen in <?= e(NAP_LOCALITY) ?>. Nobody is sent elsewhere to be operated on.</p>
      </div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Dr. Nyra trained at ' . DOCTORS['dr-nyra']['alumni'] . ' and worked for three years in Germany — two at Bio Hair Clinic and one at St. Georg Klinikum Eisenach — before establishing DenceSpot in ' . NAP_LOCALITY . '. She consults on, plans and performs every hair-restoration case at the clinic personally, and all medical content on this website is written or reviewed by her.',
    'Dr. Nyra, hair restoration doctor at DenceSpot Clinic Gurgaon'
) ?>

<!-- ============ PROCESS ============ -->
<section class="section section--white">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">How it works</p>
      <h2 class="h2 mt-2">What Happens, In Order</h2>
      <p class="body mt-3">No step is skipped and no date is booked before there is a plan you have seen in writing.</p>
    </div>

    <div class="grid grid--4 mt-6">
      <div class="step">
        <span class="step-num">01</span>
        <div>
          <h3 class="h4 mt-2">Get in touch</h3>
          <p class="meta mt-1">Send photographs on WhatsApp or leave a name and number. The clinic calls you back to agree a time.</p>
        </div>
      </div>
      <div class="step">
        <span class="step-num">02</span>
        <div>
          <h3 class="h4 mt-2">Doctor-led assessment</h3>
          <p class="meta mt-1">Scalp examined under magnification, donor density measured, pattern staged, photographs taken for your record.</p>
        </div>
      </div>
      <div class="step">
        <span class="step-num">03</span>
        <div>
          <h3 class="h4 mt-2">A plan and a figure</h3>
          <p class="meta mt-1">Technique, approximate graft number, timeline and an itemised estimate. You decide in your own time.</p>
        </div>
      </div>
      <div class="step">
        <span class="step-num">04</span>
        <div>
          <h3 class="h4 mt-2">Treatment and follow-up</h3>
          <p class="meta mt-1">The procedure or the medical course, then scheduled reviews with progress photographed against your baseline.</p>
        </div>
      </div>
    </div>

    <div class="btn-row mt-6">
      <a class="btn btn--ink" href="/book-consultation"><?= icon('calendar', 17) ?> Start at step 01</a>
      <a class="btn btn--outline" href="/faqs"><?= icon('info', 17) ?> Read the FAQs</a>
    </div>
  </div>
</section>

<!-- ============ FAQ ============ -->
<section class="section section--canvas" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Hair Transplant Questions Patients Ask First</h2>
        <p class="body mt-3 measure">Questions about a specific treatment are answered on that treatment's own page, where they belong.</p>
        <div class="btn-row mt-5">
          <a class="btn btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 17) ?> Ask on WhatsApp</a>
          <a class="btn btn--outline" href="/faqs">All FAQs</a>
        </div>
      </div>
      <div><?= faq_list($faqs) ?></div>
    </div>
  </div>
</section>

<?= local_block(
    'Visit the Clinic in ' . NAP_LOCALITY,
    'One clinic, one team, one address. Consultations and procedures both happen here, and patients travel to us from across ' . NAP_LOCALITY . ' and South Delhi.'
) ?>

<!-- ============ CERTIFICATES & AWARDS ============ -->
<?= awards_certificates_section() ?>


<?php
/**
 * Live Google reviews.
 *
 * The widget id was inline here and is now ELFSIGHT_REVIEWS_APP in config, so
 * the homepage and the treatment pages cannot drift onto two different
 * listings. The wrapper markup was carrying Tailwind utility classes
 * (pt-[20px] bg-white w-full) that this stylesheet has never defined, so the
 * section had no styling at all and the widget sat flush against the block
 * above it.
 */
?>
<?= google_reviews_block() ?>

<?= cta_band(
    'Book Your Hair Assessment',
    'Leave a name and a phone number and the clinic will call you back. You will be told honestly whether you need surgery now, later, or not at all — there is no charge to enquire and no pressure to book a date.',
    'homepage'
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
