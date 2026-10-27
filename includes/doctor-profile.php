<?php
/**
 * Doctor profile pages: /dr-nyra, /dr-rahul, /dr-akash (rebuilt 27 Oct 2026).
 *
 * Client request: one proper structure on every doctor page, each aimed at
 * "hair transplant surgeon in <city>" (DOCTORS[...]['city']): Dr. Nyra and
 * Dr. Rahul at Rohini, Dr. Akash at Gurugram. Every doctor consults at both
 * clinics, and the profile lists both (client, 27 Oct 2026) — the aimed-at
 * city first, in the title, H1 and header phone. Photos are the doctors' own
 * portraits supplied on 25 Oct 2026 (assets/img/home/doctor-*).
 *
 * "Surgeon" needs a recognised degree on record (IMC Regulations 2002 r.7.20;
 * client choice, 27 Oct 2026). Until DOCTORS[...]['quals'] is filled in, the
 * title, H1 and schema say "Hair Transplant Doctor", and the exact search
 * phrase appears only where it describes what a patient is looking for.
 *
 * One H1, then H2s in this order: hero with the portrait → on-this-page bar →
 * about + particulars → treatments → how the doctor works → the visit, step by
 * step → what to check before choosing → FAQs → consultation. No before/after
 * photos: which doctor treated each consented patient is not recorded. Each
 * page file supplies its own copy in $profile; nothing here is doctor-specific.
 */

declare(strict_types=1);

// The page builds its schema before header.php loads the components.
require_once __DIR__ . '/components.php';

/** "Hair Transplant Surgeon" with a degree on record, else "Hair Transplant Doctor". */
function doctor_ht_role(array $doc): string
{
    return !empty($doc['quals']) ? 'Hair Transplant Surgeon' : 'Hair Transplant Doctor';
}

/** The clinic a profile belongs to. 'kw' is the place name searchers use. */
function doctor_clinic(string $city): array
{
    if ($city === 'rohini') {
        return [
            'short'    => 'Rohini',
            'kw'       => 'Rohini, Delhi',
            'town'     => 'Rohini',
            'page'     => '/delhi-clinic',
            'area'     => 'Rohini, Delhi',
            'address'  => LOC_DELHI_ADDRESS,
            'landmark' => LOC_DELHI_LANDMARK,
            'tel'      => LOC_DELHI_PHONE_E164,
            'phone'    => LOC_DELHI_PHONE_DISPLAY,
            'whatsapp' => LOC_DELHI_WHATSAPP_URL,
            'maps'     => LOC_DELHI_MAPS_URL,
            'form'     => 'Delhi (Rohini)',
            'schema'   => SITE_ORIGIN . '/delhi-clinic#clinic',
        ];
    }
    return [
        'short'    => 'Gurgaon',
        'kw'       => 'Gurgaon',
        'town'     => 'Gurugram',
        'page'     => '/contact',
        'area'     => 'Sector 39, Gurugram',
        'address'  => NAP_STREET . ', ' . NAP_LOCALITY . ', ' . NAP_REGION . ' ' . NAP_POSTCODE,
        'landmark' => NAP_LANDMARK,
        'tel'      => PHONE_E164,
        'phone'    => PHONE_DISPLAY,
        'whatsapp' => WHATSAPP_URL,
        'maps'     => MAPS_URL,
        'form'     => 'Gurugram (Sector 39)',
        'schema'   => SITE_ORIGIN . '/#clinic',
    ];
}

/** Every clinic the doctor consults at (DOCTORS[...]['clinics']), the profile's own city first. */
function doctor_clinics(array $doc): array
{
    $cities = [$doc['city'], $doc['city'] === 'rohini' ? 'gurgaon' : 'rohini'];
    $named  = ['rohini' => 'Rohini', 'gurgaon' => 'Gurugram'];
    return array_values(array_map('doctor_clinic', array_filter(
        $cities,
        static fn (string $c): bool => stripos((string) $doc['clinics'], $named[$c]) !== false
    )));
}

/** "Dr. Nyra, Hair Transplant Surgeon in Rohini, Delhi" — the page's keyword line. */
function doctor_headline(string $key): string
{
    $doc = DOCTORS[$key];
    return doctor_ht_role($doc) . ' in ' . doctor_clinic($doc['city'])['kw'];
}

/**
 * The page's JSON-LD graph: the doctor's clinic(s), the Physician node, the
 * ProfilePage, breadcrumbs and the FAQs (the same array the page renders).
 */
function doctor_profile_schema(string $key, string $title, string $description, array $crumbs, array $faqs): array
{
    $doc = DOCTORS[$key];
    $url = abs_url($doc['url']);

    $graph = [];
    $works = [];
    // Every clinic named in DOCTORS[...]['clinics'] — schema only; the page
    // copy names the profile's own clinic.
    if (stripos((string) $doc['clinics'], 'Gurugram') !== false) {
        $graph[] = schema_clinic();
        $works[] = ['@id' => SITE_ORIGIN . '/#clinic'];
    }
    if (stripos((string) $doc['clinics'], 'Rohini') !== false) {
        $graph[] = schema_delhi_clinic();
        $works[] = ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'];
    }

    $physician = schema_physician($key);
    // schema_physician() gives every doctor "Dermatology"; only a doctor with
    // that degree on record keeps it.
    if (empty($doc['quals'])) {
        unset($physician['medicalSpecialty']);
    }
    $physician['jobTitle']    = $doc['role'] ?? doctor_ht_role($doc);
    $physician['description'] = $description;
    $physician['knowsAbout']  = ['Hair transplant', 'FUE hair transplant', 'DHI hair transplant', 'Hair loss'];
    $physician['areaServed']  = array_map(
        static fn (array $c): array => ['@type' => 'Place', 'name' => $c['kw']],
        doctor_clinics($doc) ?: [doctor_clinic($doc['city'])]
    );
    if ($works !== []) {
        $physician['worksFor'] = count($works) === 1 ? $works[0] : $works;
    }

    $graph[] = $physician;
    $graph[] = [
        '@type'      => 'ProfilePage',
        '@id'        => $url . '#page',
        'url'        => $url,
        'name'       => $title,
        'mainEntity' => ['@id' => $url . '#physician'],
    ];
    $graph[] = schema_breadcrumbs($crumbs);
    $graph[] = schema_faq($doc['url'], $faqs);

    return $graph;
}

/**
 * The page body. $p (from the page file):
 *   lead            hero paragraph (HTML)
 *   chips           [[icon, text], …] facts under the lead
 *   about_h2        heading; about: paragraphs (HTML)
 *   particulars     ['Label' => 'value', …], nulls dropped
 *   treat_h2, treat_intro, treatments [[url, title, text, icon], …], more [url => anchor]
 *   approach_h2, approach_intro, approach [[icon, title, text], …]
 *   steps_h2, steps [[icon, title, text], …]
 *   check_h2, check_intro, checks [text, …], check_note (HTML)
 *   faq_h2, faqs    [['q' => …, 'a' => …], …]
 *   consult_h2, consult_body, form_source, form_options [text, …]
 */
function doctor_profile_page(string $key, array $p): string
{
    $doc     = DOCTORS[$key];
    $clinic  = doctor_clinic($doc['city']);
    $clinics = doctor_clinics($doc) ?: [$clinic];
    $name    = $doc['name'];
    $tones  = ['mint', 'violet', 'sky', 'amber', 'rose'];
    $particulars = array_filter($p['particulars'], static fn ($v): bool => $v !== null && $v !== '');
    $reg    = doctor_registration($doc);

    ob_start(); ?>
<section class="hero hero--rich doc-hero">
  <div class="wrap">
    <div class="split" style="align-items:center">
      <div>
        <span class="pill pill--dot"><?= e(SITE_NAME) ?> · <?= e(implode(' & ', array_column($clinics, 'town'))) ?></span>
        <h1 class="h1 mt-3"><?= e($name) ?> <span class="h1__sub"><?= e(doctor_headline($key)) ?></span></h1>
        <p class="lead mt-3 measure"><?= $p['lead'] ?></p>

        <ul class="chip-row" aria-label="<?= e($name) ?> at a glance">
          <?php foreach ($p['chips'] as [$ic, $text]): ?>
          <li class="chip"><?= icon($ic, 16, 'currentColor', 2) ?><?= e($text) ?></li>
          <?php endforeach; ?>
        </ul>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="#consultation" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--outline" href="tel:<?= e($clinic['tel']) ?>" data-track="call"><?= icon('phone', 18) ?> Call <?= e($clinic['phone']) ?></a>
        </div>
      </div>

      <div class="hero__figure hero-photo doc-hero__photo">
        <div class="media ratio-1-1 media--shadow">
          <?= hp_img($doc['photo'], $name . ', ' . doctor_headline($key) . ', at ' . SITE_NAME, '(min-width: 1080px) 460px, (min-width: 700px) 50vw, calc(100vw - 32px)', ['loading' => 'eager', 'fetchpriority' => 'high']) ?>
        </div>
        <div class="hero__badge-card">
          <p class="eyebrow">Consults at</p>
          <?php foreach ($clinics as $c): ?>
          <p class="h4 mt-1"><?= e($c['area']) ?></p>
          <?php endforeach; ?>
          <p class="meta mt-1"><?= e(HOURS_DISPLAY) ?><span style="display:block"><?= e(HOURS_NOTE) ?></span></p>
        </div>
      </div>
    </div>
  </div>
</section>

<nav class="toc" aria-label="On this page">
  <div class="wrap">
    <span class="toc__label">On this page</span>
    <div class="toc__list">
      <a href="#about">About</a>
      <a href="#treatments">Treatments</a>
      <a href="#approach">Approach</a>
      <a href="#visit">Your visit</a>
      <a href="#choosing">Before you choose</a>
      <a href="#faqs">FAQs</a>
      <a href="#consultation">Book</a>
    </div>
  </div>
</nav>

<!-- About and particulars -->
<section class="section ht-sec section--white" id="about">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">About the doctor</p>
        <h2 class="h2 mt-2"><?= e($p['about_h2']) ?></h2>
        <div class="stack mt-3 measure">
          <?php foreach ($p['about'] as $para): ?>
          <p class="body"><?= $para ?></p>
          <?php endforeach; ?>
        </div>
      </div>
      <div>
        <h3 class="h4"><?= e($name) ?> at a Glance</h3>
        <div class="grid grid--2 mt-3 cred-grid">
          <?php $i = 0; foreach ($particulars as $label => $value): ?>
          <div class="cred cred--<?= e($tones[$i++ % 4]) ?>"><p class="cred__label"><?= e($label) ?></p><p class="cred__value"><?= e($value) ?></p></div>
          <?php endforeach; ?>
          <?php if ($reg !== ''): ?>
          <div class="cred cred--<?= e($tones[$i % 4]) ?>"><p class="cred__label">Registration</p><p class="cred__value"><?= $reg ?></p></div>
          <?php endif; ?>
        </div>
        <?php if ($reg !== ''): ?>
        <p class="meta mt-3">Registration can be verified on the National Medical Commission’s <a href="https://www.nmc.org.in/information-desk/indian-medical-register/" rel="noopener" target="_blank">Indian Medical Register</a>.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<!-- Treatments -->
<section class="section ht-sec section--canvas" id="treatments">
  <div class="wrap">
    <div style="max-width:68ch">
      <p class="eyebrow">Treatments</p>
      <h2 class="h2 mt-2"><?= e($p['treat_h2']) ?></h2>
      <p class="body mt-3"><?= $p['treat_intro'] ?></p>
    </div>
    <div class="grid grid--3 mt-6">
      <?php foreach ($p['treatments'] as $i => [$url, $title, $text, $ic]): ?>
      <div class="tile tone--<?= e($tones[$i % 5]) ?>">
        <span class="icon-dot"><?= icon($ic, 24) ?></span>
        <h3 class="h4"><?= e($title) ?></h3>
        <p class="body-s mt-2"><?= e($text) ?></p>
        <a class="tile__link" href="<?= e($url) ?>"><?= e($title) ?> in <?= e($clinic['short']) ?> <?= icon('arrow', 14) ?></a>
      </div>
      <?php endforeach; ?>
    </div>
    <?php if (!empty($p['more'])): ?>
    <ul class="ht-patterns mt-5">
      <?php foreach ($p['more'] as $url => $anchor): ?>
      <li><a href="<?= e($url) ?>"><?= e($anchor) ?> <?= icon('arrow', 14) ?></a></li>
      <?php endforeach; ?>
    </ul>
    <?php endif; ?>
  </div>
</section>

<!-- How the doctor works -->
<section class="section ht-sec section--white" id="approach">
  <div class="wrap">
    <div style="max-width:68ch">
      <p class="eyebrow">Approach</p>
      <h2 class="h2 mt-2"><?= e($p['approach_h2']) ?></h2>
      <p class="body mt-3"><?= $p['approach_intro'] ?></p>
    </div>
    <div class="grid grid--3 mt-6">
      <?php foreach ($p['approach'] as $i => [$ic, $title, $text]): ?>
      <div class="card card--pad-lg tech-card tone--<?= e($tones[$i % 5]) ?>">
        <span class="icon-dot"><?= icon($ic, 24) ?></span>
        <h3 class="h4"><?= e($title) ?></h3>
        <p class="body-s mt-2"><?= e($text) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- The visit, step by step -->
<section class="section ht-sec section--canvas ht-process" id="visit">
  <div class="wrap">
    <p class="eyebrow">Your visit</p>
    <h2 class="h2 mt-2"><?= e($p['steps_h2']) ?></h2>
    <ol class="ht-steps">
      <?php foreach ($p['steps'] as $i => [$ic, $title, $text]): ?>
      <li class="ht-step">
        <span class="ht-step__img ht-step__img--icon"><?= icon($ic, 40, 'currentColor', 1.6) ?></span>
        <span class="ht-step__num"><?= sprintf('%02d', $i + 1) ?></span>
        <h3 class="ht-step__title"><?= e($title) ?></h3>
        <p class="ht-step__text"><?= e($text) ?></p>
      </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>

<!-- What to check before choosing -->
<section class="section ht-sec section--white" id="choosing">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Before you choose</p>
        <h2 class="h2 mt-2"><?= e($p['check_h2']) ?></h2>
        <p class="body mt-3 measure"><?= $p['check_intro'] ?></p>
        <p class="body-s mt-4 measure"><?= $p['check_note'] ?></p>
      </div>
      <div class="tint-card tone--sky">
        <h3 class="h4">Questions Worth Asking</h3>
        <div class="mt-3"><?= ticks($p['checks'], false) ?></div>
      </div>
    </div>
  </div>
</section>

<!-- FAQs -->
<section class="section ht-sec section--canvas" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2"><?= e($p['faq_h2']) ?></h2>
        <p class="body-s mt-3">General patient information. Anything about your own scalp, health or budget is answered at the consultation.</p>
        <div class="btn-row mt-4">
          <a class="btn btn--accent" href="<?= e($clinic['whatsapp']) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
        </div>
      </div>
      <?= faq_list($p['faqs'], 1, 5) ?>
    </div>
  </div>
</section>

<!-- Consultation -->
<section class="section ht-sec consult" id="consultation">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Book a consultation</p>
        <h2 class="h2 mt-2"><?= e($p['consult_h2']) ?></h2>
        <p class="body-l mt-3 measure"><?= e($p['consult_body']) ?></p>

        <?php /* One row per clinic the doctor consults at, own city first. */ ?>
        <dl class="dl mt-4">
          <?php foreach ($clinics as $c): ?>
          <div>
            <dt><?= e($c['area']) ?></dt>
            <dd><?= e($c['address']) ?><span class="meta" style="display:block;font-weight:500"><?= e($c['landmark']) ?></span>
              <span style="display:block;margin-top:6px"><a href="tel:<?= e($c['tel']) ?>" data-track="call"><?= e($c['phone']) ?></a> · <a href="<?= e($c['maps']) ?>" target="_blank" rel="noopener">Directions<span class="sr-only"> to the <?= e($c['town']) ?> clinic (opens in a new tab)</span></a> · <a href="<?= e($c['page']) ?>">Clinic details<span class="sr-only">: <?= e($c['town']) ?></span></a></span></dd>
          </div>
          <?php endforeach; ?>
          <div><dt>Hours</dt><dd><?= e(HOURS_DISPLAY) ?><span class="meta" style="display:block;font-weight:500"><?= e(HOURS_NOTE) ?></span></dd></div>
        </dl>

        <div class="btn-row mt-5">
          <a class="btn btn--accent" href="<?= e($clinic['whatsapp']) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> WhatsApp</a>
          <a class="btn btn--outline" href="tel:<?= e($clinic['tel']) ?>" data-track="call"><?= icon('phone', 17) ?> Call <?= e($clinic['town']) ?></a>
        </div>
      </div>

      <div class="consult__form">
        <h3 class="h3">Request an Appointment with <?= e($name) ?></h3>
        <p class="body-s mt-1">The clinic replies during opening hours (<?= e(HOURS_DISPLAY) ?>).</p>
        <div class="mt-4">
          <?= enquiry_form($p['form_source'], $p['form_options'], false, count($clinics) > 1 ? $clinic['form'] : null) ?>
        </div>
        <p class="fine mt-4">Suitability is decided after clinical assessment. This page is patient information and is not medical advice.</p>
      </div>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}
