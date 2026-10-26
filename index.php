<?php
/**
 * / — homepage.
 *
 * The site had no homepage at all, which meant the root URL 404'd: every
 * brand search, every GBP click, every backlink to the domain landed on an
 * error. Nothing else in the SEO plan matters while that is true.
 *
 * It targets no treatment keyword (client, 14 and 25 Oct 2026): the title
 * and H1 are brand-led and cover every service — hair, beard, skin and laser —
 * at both clinics. Keyword targeting belongs to the city treatment pages. Its
 * job is to route the visitor to the right treatment page, at the clinic
 * nearer to them, fast; and to show that a doctor examines you first.
 *
 * Order (25 Oct 2026 redesign): team photo → what we stand on → "what brought
 * you here" → treatments → why DenceSpot → the doctor → reviews → FAQs →
 * guides → booking.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/* Homepage-level questions only. Treatment specifics live on their own pages,
   so the same question-and-answer pair never appears on two URLs. */
$faqs = [
    ['q' => 'What treatments does DenceSpot offer?',
     'a' => 'Hair transplant (FUE and DHI), hair PRP and GFC, hair-fall and scalp treatment, women\'s hair loss treatment, beard and eyebrow transplant, laser hair removal, and skin treatment for concerns such as acne, acne marks, pigmentation and melasma. Each treatment has its own page for the Gurugram and the Rohini clinic.'],
    ['q' => 'Which treatment do I actually need?',
     'a' => 'That is decided by examination, not by what you ask for. With hair loss, many patients who arrive asking about a transplant are treated medically instead, or first, because surgery on an unstable pattern leaves gaps as the surrounding hair keeps receding. With skin, the diagnosis decides whether you need medication, a procedure, or simply a better routine.'],
    ['q' => 'Who will I see at DenceSpot Clinic?',
     'a' => 'A doctor examines you at your first visit. At the Gurugram clinic, Dr. Nyra (MBBS, MD Dermatology) assesses hair-restoration cases, designs the hairline, plans the graft numbers and performs the procedure herself, supported by the clinic\'s trained team. The doctors section on this page lists who you may meet.'],
    ['q' => 'Where are the clinics and what are the timings?',
     'a' => 'DenceSpot has two clinics. The Gurugram clinic is at ' . nap_address_line() . ', ' . NAP_LANDMARK . '. The Rohini clinic is in North-West Delhi, near the Outer Ring Road. Both are open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . ').'],
    ['q' => 'How much does treatment cost?',
     'a' => 'Cost follows the plan, and the plan follows the assessment, so no single figure fits every case. For a hair transplant it depends on graft count, hair-loss stage, donor density and technique; for PRP, laser or skin treatment, on the number of sessions your case needs. You receive an itemised written estimate before you commit to anything.'],
    ['q' => 'Do I have to travel to the clinic for a first opinion?',
     'a' => 'Not to begin with. Send clear photographs on WhatsApp — the front, crown and back of the head for hair, or the affected area for skin — and the clinic will tell you whether a consultation is likely to be worth the journey. What cannot be done remotely is the examination that decides your plan.'],
];

/* The eight treatments the homepage shows as cards, each with both clinics.
   Illustrations are AI-generated and carry a visible mark (NMC cl. 7.2). */
$featured = [
    ['title' => 'Hair Transplant',    'cat' => 'Surgical',     'icon' => 'hairline', 'tone' => 'mint',
     'img' => 'card-hair-transplant', 'alt' => 'AI-generated image: a doctor in a surgical cap and mask placing hair grafts along a patient\'s hairline with an implanter pen',
     'note' => 'FUE and DHI, planned around your donor area and the hair loss still to come.',
     'g' => '/hair-transplant-in-gurgaon', 'r' => '/hair-transplant-delhi/'],
    ['title' => 'Beard Transplant',   'cat' => 'Surgical',     'icon' => 'beard',    'tone' => 'violet',
     'img' => 'card-beard-transplant', 'alt' => 'AI-generated image: a doctor placing grafts along a patient\'s beard line with an implanter pen while steadying his jaw',
     'note' => 'Patchy cheeks, jawline, moustache and scars, filled with scalp grafts.',
     'g' => '/beard-transplant-gurgaon', 'r' => '/beard-transplant-in-rohini'],
    ['title' => 'Eyebrow Transplant', 'cat' => 'Surgical',     'icon' => 'pencil',   'tone' => 'rose',
     'img' => 'card-eyebrow-transplant', 'alt' => 'AI-generated image: a doctor placing single-hair grafts along a patient\'s eyebrow with an implanter pen',
     'note' => 'Thin, over-plucked or scarred brows, rebuilt with single-hair grafts.',
     'g' => '/eyebrow-transplant-in-gurgaon', 'r' => '/eyebrow-transplant-in-rohini'],
    ['title' => 'Hair PRP & GFC',     'cat' => 'Non-surgical', 'icon' => 'heart',    'tone' => 'amber',
     'img' => 'card-hair-prp', 'alt' => 'AI-generated image: a doctor giving PRP injections into a patient\'s thinning crown, with a tube of plasma on a tray beside them',
     'note' => 'A planned course for early thinning, while the follicles are still there.',
     'g' => '/hair-prp-treatment-in-gurgaon', 'r' => '/hair-prp-treatment-in-rohini'],
    ['title' => 'Hair Fall Treatment', 'cat' => 'Medical',     'icon' => 'chart',    'tone' => 'sky',
     'img' => 'card-hair-fall', 'alt' => 'AI-generated image: a doctor examining a patient\'s scalp and hair roots with a dermatoscope',
     'note' => 'The cause comes first: thyroid, iron, stress or pattern hair loss.',
     'g' => '/hair-fall-treatment-in-gurgaon', 'r' => '/hair-fall-treatment-in-rohini'],
    ['title' => "Women's Hair Loss",  'cat' => 'Medical',      'icon' => 'user',     'tone' => 'rose',
     'img' => 'card-womens-hair-loss', 'alt' => 'AI-generated image: a female doctor examining a woman\'s widened hair parting with a dermatoscope',
     'note' => 'Diffuse thinning and a wider parting, checked for hormonal and nutritional causes.',
     'g' => '/womens-hair-loss-treatment-in-gurgaon', 'r' => '/womens-hair-loss-treatment-in-rohini'],
    ['title' => 'Laser Hair Removal', 'cat' => 'Skin & laser', 'icon' => 'star',     'tone' => 'violet',
     'img' => 'card-laser-hair-removal', 'alt' => 'AI-generated image: a clinician in safety glasses treating a patient\'s forearm with a handheld laser, the patient wearing protective goggles',
     'note' => 'A course of sessions for face and body, after a patch test.',
     'g' => '/laser-hair-removal-in-gurgaon', 'r' => '/laser-hair-removal-in-rohini'],
    ['title' => 'Skin Treatment',     'cat' => 'Skin & laser', 'icon' => 'shield',   'tone' => 'mint',
     'img' => 'card-skin-treatment', 'alt' => 'AI-generated image: a dermatologist examining acne marks on a woman\'s cheek through an illuminated magnifying lamp',
     'note' => 'Acne, pigmentation and melasma, starting with a diagnosis.',
     'g' => '/skin-treatment-in-gurgaon', 'r' => '/skin-treatment-in-rohini'],
];

/* Hair, beard and skin concerns together: the homepage serves the whole
   clinic, not one treatment. Shown as two grouped lists (client, 25 Oct
   2026); 'group' is a key of $concernGroups. */
$concernGroups = [
    'hair' => ['title' => 'Hair & scalp',        'icon' => 'hairline', 'tone' => 'mint'],
    'skin' => ['title' => 'Beard, skin & laser', 'icon' => 'star',     'tone' => 'violet'],
];
$concerns = [
    ['group' => 'hair', 'icon' => 'hairline', 'tone' => 'mint',   'title' => 'Receding hairline or thin crown', 'url' => '/hair-transplant-in-gurgaon',      'text' => 'Temples going back or the crown showing through. Planned around your donor area and the loss still to come.'],
    ['group' => 'hair', 'icon' => 'chart',    'tone' => 'sky',    'title' => 'Sudden hair fall',      'url' => '/hair-fall-treatment-in-gurgaon',  'text' => 'Increased shedding needs a cause found first — thyroid, iron, stress or pattern loss.'],
    ['group' => 'hair', 'icon' => 'heart',    'tone' => 'amber',  'title' => 'Early thinning',        'url' => '/hair-prp-treatment-in-gurgaon',   'text' => 'Density dropping but no bald area yet. Often PRP and medical treatment rather than surgery.'],
    ['group' => 'hair', 'icon' => 'user',     'tone' => 'rose',   'title' => 'Hair loss in women',    'url' => '/womens-hair-loss-treatment-in-gurgaon', 'text' => 'Diffuse thinning and parting-line loss, worked up for hormonal and nutritional causes first.'],
    ['group' => 'skin', 'icon' => 'beard',    'tone' => 'violet', 'title' => 'Patchy beard or brows', 'url' => '/beard-transplant-gurgaon',        'text' => 'Gaps in the beard, thin sideburns or sparse eyebrows, filled with grafts at the right angle.'],
    ['group' => 'skin', 'icon' => 'search',   'tone' => 'mint',   'title' => 'Acne and acne marks',   'url' => '/skin-treatment-in-gurgaon',       'text' => 'Breakouts and the marks they leave, diagnosed before any product or procedure is suggested.'],
    ['group' => 'skin', 'icon' => 'settings', 'tone' => 'amber',  'title' => 'Pigmentation and melasma', 'url' => '/skin-treatment-in-gurgaon',    'text' => 'Dark patches and uneven tone, with the cause and the triggers checked first.'],
    ['group' => 'skin', 'icon' => 'star',     'tone' => 'violet', 'title' => 'Unwanted facial or body hair', 'url' => '/laser-hair-removal-in-gurgaon', 'text' => 'Laser hair removal after a patch test, with hormonal causes looked at where they fit.'],
];

$page = [
    'title'       => 'DenceSpot Hair & Skin Care Clinic | Gurugram & Rohini, Delhi',
    'description' => 'Doctor-led hair and skin care in Sector 39, Gurugram and Rohini, Delhi: hair transplant, PRP, hair fall, beard, skin and laser treatment. Book a visit.',
    'url'         => '/',
    'body_class'  => 'page-home',
    // No preload: the hero photo is responsive (srcset), and a single-URL
    // preload would fetch a size the browser then discards. The <img> is in
    // the first screen of HTML with fetchpriority="high", which is enough.
    'preload_image' => '',
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

<?php /* A white band, full width, about half the screen tall (client,
           25 Oct 2026). The photo has a white left side, so it is pinned to
           the right and its white blends into the band; the copy sits on that
           white side. Phones have no room beside the doctors, so there the
           photo comes first and the copy follows it. */ ?>
<section class="hero-x">
  <div class="hero-x__media">
    <img src="/assets/img/home/hero-doctors-1280.webp"
         srcset="/assets/img/home/hero-doctors-640.webp 640w, /assets/img/home/hero-doctors-960.webp 960w, /assets/img/home/hero-doctors-1280.webp 1280w, /assets/img/home/hero-doctors-1536.webp 1536w"
         sizes="(min-width: 1024px) and (min-aspect-ratio: 1/1) and (max-height: 911px) 765px, (min-width: 1024px) and (min-aspect-ratio: 1/1) and (min-height: 1286px) 1080px, (min-width: 1024px) and (min-aspect-ratio: 1/1) 84vh, (min-width: 560px) and (max-width: 1023px) and (orientation: landscape) 72vh, (min-width: 560px) 100vw, 115vw"
         alt="AI-generated image of three doctors in white coats and scrubs beside the DenceSpot Hair &amp; Skin Care Clinic logo"
         width="1536" height="1024" loading="eager" fetchpriority="high" decoding="async">
  </div>
  <?php /* NMC cl. 7.2: AI imagery carries a visible mark — under the photo
           on phones and tablets, in the copy beside it on desktop. */ ?>
  <p class="hero-x__note hero-x__note--photo">AI-generated image</p>

  <div class="wrap hero-x__body">
    <div class="hero-x__text">
      <span class="pill pill--dot">Hair &middot; Skin &middot; Laser</span>
      <h1 class="hero-x__title">DenceSpot Hair &amp; Skin Care Clinic <span class="hero-x__sub">Now in Gurugram &amp; Delhi</span></h1>
      <p class="hero-x__lead">Hair transplant, PRP and hair-fall treatment, beard and eyebrow transplant, and skin and laser care. Every plan starts with a doctor examining you.</p>

      <div class="btn-row hero-x__ctas">
        <a class="btn btn--lg btn--ink" href="/book-consultation"><?= icon('calendar', 18) ?> Book Appointment</a>
        <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp Us</a>
      </div>

      <p class="hero-x__clinics">
        <span class="hero-x__clinics-label">Our clinics</span>
        <a href="/contact"><?= icon('pin', 15) ?> Sector 39, Gurugram</a>
        <a href="/delhi-clinic"><?= icon('pin', 15) ?> Rohini, Delhi</a>
      </p>
      <p class="hero-x__note hero-x__note--copy">Image: AI-generated</p>
    </div>
  </div>
</section>

<!-- ============ WHAT WE STAND ON ============ -->
<section class="home-facts" aria-label="At a glance">
  <div class="wrap">
    <ul class="home-facts__list">
      <li><span class="icon-dot tone--mint"><?= hp_icon('user-md', 22) ?></span><span><b>Examined by a doctor</b>Your hair, scalp or skin, before any plan</span></li>
      <li><span class="icon-dot tone--violet"><?= hp_icon('pin', 22) ?></span><span><b>Two clinics</b>Sector 39, Gurugram · Rohini, Delhi</span></li>
      <li><span class="icon-dot tone--amber"><?= hp_icon('doc', 22) ?></span><span><b>Written estimate</b>Itemised before any date is booked</span></li>
      <li><span class="icon-dot tone--sky"><?= hp_icon('clock', 22) ?></span><span><b>Opening hours</b><?= e(HOURS_DISPLAY) ?></span></li>
    </ul>
  </div>
</section>

<!-- ============ START FROM THE CONCERN ============ -->
<section class="section section--white">
  <div class="wrap concerns">
    <div class="home-head concerns__head">
      <p class="eyebrow">What brought you here</p>
      <h2 class="h2 mt-2">Start From the Concern, Not the Procedure</h2>
      <p class="body mt-3">Different concerns need different answers. Pick what matches yours and the page will tell you honestly what the options are — including when the option is to wait.</p>
    </div>

    <?php /* After the lists on phones, beside the heading on desktop. */ ?>
    <aside class="concerns__help" aria-label="Not sure which concern fits">
      <p><b>Not sure which one fits?</b>Send clear photos on WhatsApp and the clinic will tell you which of these applies, and whether a visit is worth it.</p>
      <a class="btn btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 17) ?> Send photos on WhatsApp</a>
    </aside>

    <div class="concerns__groups">
      <?php foreach ($concernGroups as $key => $grp): ?>
        <?php $items = array_filter($concerns, static fn (array $c): bool => $c['group'] === $key); ?>
      <div class="concern-group">
        <div class="concern-group__head tone--<?= e($grp['tone']) ?>">
          <span class="icon-dot"><?= icon($grp['icon'], 19, 'currentColor', 1.9) ?></span>
          <h3 class="concern-group__title"><?= e($grp['title']) ?></h3>
          <span class="concern-group__count"><?= count($items) ?> concerns</span>
        </div>
        <div class="concern-group__list">
          <?php foreach ($items as $c): ?>
          <a class="concern tone--<?= e($c['tone']) ?>" href="<?= e($c['url']) ?>">
            <span class="icon-dot"><?= icon($c['icon'], 21, 'currentColor', 1.9) ?></span>
            <div>
              <h4 class="concern__title"><?= e($c['title']) ?></h4>
              <p class="concern__text"><?= e($c['text']) ?></p>
            </div>
            <span class="concern__go" aria-hidden="true"><?= icon('arrow', 15) ?></span>
          </a>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ TREATMENTS ============ -->
<section class="section section--canvas" id="treatments">
  <div class="wrap">
    <div class="home-head home-head--center">
      <p class="eyebrow">Treatments</p>
      <h2 class="h2 mt-2">Hair, Skin and Laser Treatments at Two Clinics</h2>
      <p class="body mt-3">Every treatment starts with an examination. Choose the clinic nearer to you — Sector 39 in Gurugram, or Rohini in North-West Delhi.</p>
    </div>

    <div class="svc-grid mt-6">
      <?php foreach ($featured as $s): ?>
      <article class="svc-card tone--<?= e($s['tone']) ?>">
        <a class="svc-card__media" href="<?= e($s['g']) ?>" tabindex="-1" aria-hidden="true">
          <?= hp_img($s['img'], $s['alt'], '(min-width: 1080px) 290px, (min-width: 700px) 46vw, 120px') ?>
          <?= hp_ai_chip('AI-generated') ?>
        </a>
        <div class="svc-card__body">
          <span class="icon-dot svc-card__icon"><?= icon($s['icon'], 21, 'currentColor', 1.9) ?></span>
          <p class="svc-card__cat"><?= e($s['cat']) ?></p>
          <h3 class="h4 svc-card__title"><a href="<?= e($s['g']) ?>"><?= e($s['title']) ?></a></h3>
          <p class="meta mt-1"><?= e($s['note']) ?></p>
          <p class="svc-card__clinics">
            <a href="<?= e($s['g']) ?>">Gurugram <?= icon('arrow', 14) ?></a>
            <a href="<?= e($s['r']) ?>">Rohini <?= icon('arrow', 14) ?></a>
          </p>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ THE DIFFERENTIATOR ============ -->
<section class="section section--ink">
  <div class="wrap">
    <div class="home-head">
      <p class="eyebrow">Why patients choose DenceSpot</p>
      <h2 class="h2 mt-2">Doctor-Led Care, From the First Visit</h2>
      <p class="body mt-3">At many hair and skin clinics the first conversation is with a counsellor and the treatment is carried out by technicians. At DenceSpot a doctor examines you first and explains the options — including when the answer is to wait — before anything is planned.</p>
    </div>

    <div class="grid grid--4 mt-6">
      <?php foreach ([
          ['user',  'Examined by a doctor',      'Your hair, scalp or skin is examined before any treatment is suggested.'],
          ['scale', 'Honest options',            'Medical treatment, a procedure or waiting — whichever suits your case, explained plainly.'],
          ['doc',   'Written estimate',          'Itemised after the assessment, with what it excludes named rather than discovered later.'],
          ['pin',   'Two clinics, one approach', 'The same assessment-first process in Sector 39, Gurugram and in Rohini, Delhi.'],
      ] as [$ic, $t, $d]): ?>
      <div class="card card--ink home-why">
        <span class="home-why__icon"><?= icon($ic, 22, 'currentColor', 1.9) ?></span>
        <h3 class="h4 mt-3"><?= e($t) ?></h3>
        <p class="meta mt-1"><?= e($d) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ DOCTORS ============ -->
<?= doctors_grid_section(
    'Our doctors',
    'Meet the Doctors at DenceSpot',
    'Every treatment starts with an examination by a doctor, who explains what is happening, what can help and what cannot, before anything is planned.'
) ?>

<?php
/**
 * Live Google reviews. The widget id is ELFSIGHT_REVIEWS_APP in config, so
 * the homepage and the treatment pages cannot drift onto two listings.
 */
?>
<?= google_reviews_block() ?>

<!-- ============ FAQ ============ -->
<section class="section section--canvas" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Questions Patients Ask First</h2>
        <p class="body mt-3 measure">Questions about a specific treatment — hair transplant, PRP, laser or skin — are answered on that treatment's own page, where they belong.</p>
        <div class="btn-row mt-5">
          <a class="btn btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 17) ?> Ask on WhatsApp</a>
          <a class="btn btn--outline" href="/faqs">All FAQs</a>
        </div>
      </div>
      <div><?= faq_list($faqs) ?></div>
    </div>
  </div>
</section>

<?= latest_posts_strip(null, 3, 'Guides Before You Decide') ?>

<?= cta_band(
    'Book a Consultation',
    'Leave a name and a phone number and the clinic will call you back. A doctor will examine you and tell you honestly what is likely to help and what is not — there is no charge to enquire and no pressure to book a treatment.',
    'homepage',
    ['Hair transplant', 'Hair fall / PRP', 'Beard or eyebrow transplant', 'Skin treatment', 'Laser hair removal', 'Not sure — please advise']
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
