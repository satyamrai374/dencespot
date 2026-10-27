<?php
/**
 * /beard-transplant-cost-in-rohini — beard transplant cost guide for the
 * Rohini (Delhi) clinic.
 *
 * Built 14 Oct 2026 (SEO round 2, COMPETITOR-SEO.md §6.2). Owns the beard
 * cost question for Rohini; /beard-transplant-in-rohini owns the procedure.
 *
 * No prices and no market table: the clinic has not supplied a fee schedule
 * and no Delhi market survey has been done. The zone graft ranges are the
 * general patient-education bands used across the site (not market prices);
 * the "what moves it" wording is new.
 *
 * Rohini page: never mentions the Gurugram clinic and never links a URL
 * containing "gurgaon" (client rule, 14 Oct 2026). Not reviewed by the
 * clinic's doctor: doctor_block(..., false), no review byline, not in
 * MEDICAL_PAGES. Landing-page layout from includes/home-components.php.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/** General graft ranges by beard zone — patient education, not a quote. */
$zones = [
    ['zone' => 'Patchy cheeks (filling in)', 'range' => '500 – 1,000',        'note' => 'Lower where hair surrounds the patches; higher where the cheek is mostly bare.'],
    ['zone' => 'Cheek line and jawline',     'range' => '800 – 1,500',        'note' => 'Sharpening an edge with growth behind it takes fewer than building one from little.'],
    ['zone' => 'Moustache',                  'range' => '300 – 700',          'note' => 'A small area, but slow work: lip hair points steeply down on skin that moves.'],
    ['zone' => 'Goatee and chin',            'range' => '500 – 1,000',        'note' => 'Often planned with the moustache, to close the gap between the two.'],
    ['zone' => 'Sideburns',                  'range' => '200 – 400 per side', 'note' => 'Usually for symmetry, or to link the scalp hair with the beard.'],
    ['zone' => 'Full beard',                 'range' => '1,500 – 3,000+',     'note' => 'The heaviest demand on the donor area, and often split across sessions.'],
];

$faqs = [
    ['q' => 'How much does a beard transplant cost in Rohini, Delhi?',
     'a' => 'There is no single price. The figure follows the graft count, and the graft count follows which zones are treated and how much hair already grows there. It is quoted after an examination at the Rohini clinic, as an itemised written estimate, before any date is booked.'],
    ['q' => 'How many grafts does a beard transplant need?',
     'a' => 'It depends on the zones. As general ranges, a moustache often needs around 300–700 grafts, a goatee and chin 500–1,000, a cheek line or jawline 800–1,500 and a full beard 1,500–3,000 or more. Existing growth lowers each figure, and your own count comes from a design drawn on your face.'],
    ['q' => 'Which beard zone costs the most?',
     'a' => 'Usually a full beard, then a jawline or cheek line built from little growth, simply because they need the most grafts. Graft count is the main driver, followed by how slow the placement is in each zone.'],
    ['q' => 'Is a moustache transplant cheaper than a full beard?',
     'a' => 'Usually, because it needs far fewer grafts. Per graft, though, the moustache is some of the slowest work on the face: the hairs lie steeply downward on skin that moves as you speak, and borders take single-hair grafts. Compare the graft count and the time involved, not just the zone name.'],
    ['q' => 'Is a beard transplant cheaper than a scalp transplant?',
     'a' => 'Often the total is lower, because many beard plans need fewer grafts than a large scalp case. Not always: a full beard with sideburns can approach a substantial scalp session, and beard placement is slower per graft. <a href="/hair-transplant-cost-in-rohini">Hair transplant cost in Rohini</a> sets out the scalp arithmetic.'],
    ['q' => 'Why is beard work slower than scalp work?',
     'a' => 'Facial hair lies much flatter to the skin than scalp hair, and its direction changes from cheek to jaw to lip. Each site is made to match its zone, and visible borders take single-hair grafts only. That care takes time, and time is much of what the fee pays for.'],
    ['q' => 'Does the hair I already have lower the cost?',
     'a' => 'Yes. Thickening a beard that grows patchily needs far fewer grafts than building one where almost nothing grows. Smooth, round bare patches can be <a href="/alopecia-areata-treatment-in-rohini">alopecia areata</a>, which is treated medically first. If your beard is still filling in, <a href="/blog/patchy-beard-wait-or-transplant">whether to wait or transplant</a> is worth reading.'],
    ['q' => 'Do scars cost more to treat?',
     'a' => 'They can. Mature surgical, injury, burn or cleft-lip scars can take grafts, but placement is slower and less predictable because of the weaker blood supply, and a second session is more often needed. The estimate says so if it applies.'],
    ['q' => 'Will I need a second session, and when is it costed?',
     'a' => 'Often not, for a moustache, goatee or a few patches. A second session is more likely for a full beard built from little growth, for scar tissue, or to top up a zone once the first result matures at around a year. Where it looks likely, you are told before the first session.'],
    ['q' => 'What does the written estimate include?',
     'a' => 'The zones treated and the grafts allocated to each, the technique, local anaesthesia, procedure-day and take-home medication, dressings and the follow-up reviews. Anything excluded, such as blood tests, is named on the estimate, and a likely second stage is stated with it.'],
    ['q' => 'Can I compare beard quotes on the price per graft?',
     'a' => 'Only if the graft numbers were reached the same way, which they often are not. A low per-graft rate on a higher count can cost more in total, and extra grafts are paid for twice — in money and in donor hair that does not grow back. Ask how the number was reached before comparing rates.'],
    ['q' => 'Is EMI available for a beard transplant?',
     'a' => 'Instalment options through third-party lenders may be available — ask at the consultation. The lender sets the interest, tenure and eligibility, not the clinic. <a href="/cost-and-emi-options">Cost, EMI and payment options</a> explains what to check, including the total payable.'],
    ['q' => 'Can I send photographs on WhatsApp first?',
     'a' => 'Yes. Clear daylight photographs of your cheeks, jawline and chin, front and side, help the clinic tell you whether an examination is worthwhile. The graft count and estimate follow the examination, because the donor area has to be measured in person.'],
    ['q' => 'Does a beard transplant affect a future scalp transplant?',
     'a' => 'It can. Beard grafts come from the same donor area at the back and sides of the scalp, and extracted hair does not grow back. Any scalp thinning, or a family history of it, is weighed before the beard is planned; see <a href="/blog/donor-area-limits-hair-transplant">why donor hair is a one-time budget</a>.'],
    ['q' => 'Is the procedure done at the Rohini clinic, and when is it open?',
     'a' => 'Yes. The examination, beard design, written estimate, procedure and follow-up visits all take place at the Rohini clinic in North-West Delhi, open ' . e(HOURS_DISPLAY) . ' (' . e(HOURS_NOTE) . '). See <a href="/delhi-clinic">directions to the Rohini clinic</a>.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Beard Transplant Cost in Rohini'],
];

$page = [
    'title'         => 'Beard Transplant Cost in Rohini, Delhi (2026) | DenceSpot',
    'description'   => 'Beard transplant cost in Rohini, Delhi: grafts by zone from cheeks and jawline to moustache and sideburns, what changes it, and what an estimate covers.',
    'url'           => '/beard-transplant-cost-in-rohini',
    'crumbs'        => $crumbs,
    'preload_image' => '/assets/img/services/svc-beard-768.webp',
    'schema'        => [
        schema_delhi_clinic(),
        schema_breadcrumbs($crumbs),
        schema_faq('/beard-transplant-cost-in-rohini', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Cost guide · Rohini, Delhi</span>
        <h1 class="h1 mt-3">Beard Transplant Cost in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">A beard transplant has no single price. The figure follows the graft count, and the graft count follows which zones are treated and how much hair already grows there. This guide covers grafts by zone, what changes the cost and what an estimate should include, for treatment assessed and carried out at our Rohini clinic in North-West Delhi.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/delhi-clinic#book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Beard transplant" data-track="book"><?= icon('calendar', 18) ?> Get a Written Estimate</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Send Photos on WhatsApp</a>
        </div>

        <?= ticks([
            'Graft count from a design drawn on your face',
            'Itemised written estimate after the examination',
            'A likely second stage stated at the start',
            'Examination, procedure and reviews in Rohini',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-beard-768.webp" srcset="/assets/img/services/svc-beard-512.webp 512w, /assets/img/services/svc-beard-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a wooden comb and a wooden beard brush lying on a folded green cloth" width="768" height="960" loading="eager" fetchpriority="high">
          <?= hp_ai_chip('AI-generated illustration') ?>
        </div>
        <div class="hero__badge-card">
          <p class="eyebrow">Rohini Clinic</p>
          <p class="h4 mt-1"><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></p>
          <p class="meta"><?= e(HOURS_DISPLAY) ?><span style="display:block"><?= e(HOURS_NOTE) ?></span></p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= lead_strip() ?>

<?= lp_split([
    'img'     => 'intro-donor',
    'alt'     => 'a mannequin head seen from behind, with the donor area marked',
    'eyebrow' => 'The starting point',
    'title'   => 'Why a Beard Transplant Has No Single Price',
    'id'      => 'no-single-price',
    'html'    => '<p>Filling two bare patches on cheeks that already grow reasonably well, and building a full beard where little grows, are very different jobs: the second can need several times the grafts of the first. One price for both would describe neither.</p>'
               . '<p>The grafts come from the back and sides of your scalp, the same finite donor area a scalp transplant would draw on. So the count is limited twice: by the beard design you agree, and by what your donor area can spare while keeping a reserve. What the procedure involves is explained on <a href="/beard-transplant-in-rohini">beard transplant in Rohini</a>.</p>',
    'points'  => [
        'Zones treated and existing growth set the graft count',
        'Graft count and placement time set most of the figure',
        'Donor hair spent on the beard is not available for the scalp later',
    ],
    'link'    => ['url' => '/blog/donor-area-limits-hair-transplant', 'label' => 'Why donor hair is a one-time budget'],
]) ?>

<section class="section section--canvas" id="zones">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Zone by zone</p>
      <h2 class="h2 mt-2">Grafts by Beard Zone</h2>
      <p class="body mt-3">Graft count is the main driver of cost, and it follows the zones and the hair already growing in them. These are general patient-education ranges, not a quote: your own count comes from a design mapped on your face.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data">
          <caption class="sr-only">General beard transplant graft ranges by zone — patient education, not a quote</caption>
          <thead>
            <tr><th scope="col">Zone</th><th scope="col">General graft range</th><th scope="col">What moves it</th></tr>
          </thead>
          <tbody>
            <?php foreach ($zones as $z): ?>
            <tr>
              <th scope="row" style="color:var(--ink);font-size:15px;font-weight:700;text-transform:none;letter-spacing:0;white-space:normal;min-width:150px"><?= e($z['zone']) ?></th>
              <td style="font-weight:600;color:var(--ink);white-space:nowrap"><?= e($z['range']) ?></td>
              <td><?= e($z['note']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-3 measure"><b>General ranges, not a quote.</b> Zones share borders, so a combined plan usually needs fewer grafts than the ranges added together, and existing growth lowers every figure.</p>

    <div class="grid grid--2 mt-5">
      <div class="card card--pad-lg">
        <h3 class="h4">Turning a zone plan into a figure</h3>
        <p class="body-s mt-2">Each zone’s grafts are multiplied by the rate for the technique used there, the zones are added together, and the items the estimate lists outside the rate are added on top. A moustache-and-goatee plan of 900 grafts is 900 × the rate; adding both cheeks means costing the larger combined count, not a second package.</p>
      </div>
      <div class="card card--pad-lg">
        <h3 class="h4">A graft count is not a result</h3>
        <p class="body-s mt-2">The number shows the size of the job, not how the beard will look. Angle, single-hair borders and the density aimed for decide that, and no density can be promised. <a href="/blog/beard-transplant-what-to-expect">What to expect from a beard transplant</a> covers how transplanted hair behaves on the face.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="cost-factors">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Cost factors</p>
      <h2 class="h2 mt-2">What Changes the Cost of a Beard Transplant</h2>
      <p class="body mt-3">Roughly in order of how much each one moves the figure.</p>
    </div>
    <div class="grid grid--3 mt-5">
      <div class="card"><?= icon('beard', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Zones treated</h3><p class="body-s mt-2">Cheeks, jawline, moustache, chin and sideburns each have their own graft needs. One zone and all five are different jobs.</p></div>
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Existing growth</h3><p class="body-s mt-2">Thickening a patchy beard takes far fewer grafts than building density where almost nothing grows. Often the largest gap between two quotes.</p></div>
      <div class="card"><?= icon('chart', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Density aimed for</h3><p class="body-s mt-2">A light filling-in and a denser, sharper beard are different counts for the same area. The target is agreed as part of the design.</p></div>
      <div class="card"><?= icon('clock', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Placement time</h3><p class="body-s mt-2">Facial hair lies flat and changes direction across the face, and borders take single-hair grafts. Slower work per graft than the scalp.</p></div>
      <div class="card"><?= icon('pencil', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Scars and complexity</h3><p class="body-s mt-2">Scar tissue from injury, acne, cleft repair or earlier work makes placement slower and less predictable, and staging likelier.</p></div>
      <div class="card"><?= icon('calendar', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Staging and support</h3><p class="body-s mt-2">A planned second session, or medical treatment alongside, is costed and stated on the first estimate.</p></div>
    </div>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'At the Rohini clinic',
    'title'   => 'How Your Beard Estimate Is Reached',
    'id'      => 'estimate-steps',
    'intro'   => 'The number follows the design, and the design follows an examination of your face and your donor area by a registered medical practitioner.',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                    'title' => 'Examination',             'text' => 'Existing growth checked zone by zone, the skin looked at, and the donor area at the back and sides measured for what it can spare.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned outline',  'title' => 'Design and graft count',  'text' => 'Borders drawn on your face while you sit upright, checked in a mirror and agreed, then grafts allocated to each zone.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with review dates circled',               'title' => 'A written estimate',      'text' => 'Itemised by zone, with exclusions and any likely second stage named. You take it away to consider.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-procedure',
    'alt'     => 'tweezers, punch tips and a slim steel handle on a green surgical cloth',
    'eyebrow' => 'Before any deposit',
    'title'   => 'What a Beard Transplant Estimate Should Include',
    'id'      => 'estimate',
    'reverse' => true,
    'html'    => '<p>An estimate you can check lists the work zone by zone rather than giving one round figure. Ask for it in writing before any deposit, whichever clinic you are considering.</p>'
               . '<p><b>Paying in instalments.</b> Instalment options through third-party lenders may be available — ask at the consultation. The lender sets the terms, so ask for the total payable as well as the monthly figure; see <a href="/cost-and-emi-options">cost, EMI and payment options</a>.</p>',
    'points'  => [
        'The zones treated and the grafts allocated to each',
        'The technique used in each zone',
        'Local anaesthesia, procedure-day and take-home medication, and dressings',
        'Follow-up reviews as the grafts heal, shed and regrow',
        'Any likely second stage, with its timing',
        'Exclusions named, such as blood tests or supporting treatment',
        'The total payable, including tax',
    ],
]) ?>

<section class="section section--ink" id="compare">
  <div class="wrap">
    <p class="eyebrow">Questions worth asking any clinic</p>
    <h2 class="h2 mt-2">Comparing Beard Transplant Quotes</h2>
    <p class="body-l mt-3" style="max-width:60ch">A beard quote can only be compared with another once you know how each number was reached. These six questions bring that out, at any clinic in Delhi, including this one.</p>
    <div class="grid grid--3 mt-6">
      <div class="card card--ink"><p class="eyebrow">01</p><h3 class="h4 mt-2">Grafts by zone, or one round number?</h3><p class="body-s mt-2">A count split by zone can be checked. A single figure attached to “full beard” cannot.</p></div>
      <div class="card card--ink"><p class="eyebrow">02</p><h3 class="h4 mt-2">Was the donor area measured?</h3><p class="body-s mt-2">The grafts come from a finite supply. A quote made without measuring it is missing the key fact.</p></div>
      <div class="card card--ink"><p class="eyebrow">03</p><h3 class="h4 mt-2">Who makes the sites and places the grafts?</h3><p class="body-s mt-2">Ask by name and qualification. It is a fair question, and the answer should be immediate.</p></div>
      <div class="card card--ink"><p class="eyebrow">04</p><h3 class="h4 mt-2">What is left out?</h3><p class="body-s mt-2">Anaesthesia, medication, dressings, blood tests and reviews can each sit inside or outside a figure.</p></div>
      <div class="card card--ink"><p class="eyebrow">05</p><h3 class="h4 mt-2">Is a second session likely?</h3><p class="body-s mt-2">If so, it belongs on the first estimate. A quote that becomes two after surgery was never the lower one.</p></div>
      <div class="card card--ink"><p class="eyebrow">06</p><h3 class="h4 mt-2">Was the design drawn on my face?</h3><p class="body-s mt-2">A count taken from a photograph, rather than a design agreed in a mirror, describes a package rather than a plan.</p></div>
    </div>
    <p class="body mt-5" style="max-width:62ch">Why quotes for the same procedure can differ so widely is covered in <a href="/blog/why-hair-transplant-quotes-vary">why hair transplant quotes vary</a>, and recovery on the face in the <a href="/blog/beard-transplant-recovery-timeline">beard transplant recovery timeline</a>.</p>
  </div>
</section>

<?= doctor_block(
    'Examinations, estimates and beard transplants at the Rohini clinic are carried out by registered medical practitioners. Every doctor at DenceSpot is listed below with their qualifications.',
    '',
    false
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Beard Transplant Cost in Rohini: Questions Answered</h2>
        <p class="body-s mt-3">General guidance. Your own graft count and figure come from your examination and are given to you in writing.</p>
        <a class="btn btn--accent mt-4" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask the Rohini Clinic</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= latest_posts_strip('beard', 3, 'Further Reading') ?>

<?= local_block(
    'Visit Our Rohini Clinic',
    'Beard examinations, written estimates, procedures and follow-up visits all take place at the Rohini clinic in North-West Delhi, near the Outer Ring Road.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= lp_cta([
    'eyebrow'   => 'Rohini, Delhi',
    'title'     => 'Have Your Beard Zones Mapped and Costed',
    'text'      => 'Book an examination at the Rohini clinic, or send daylight photographs of your cheeks, jawline and chin on WhatsApp first. You will see a design drawn on your own face, hear honestly whether a transplant suits you, and leave with an itemised estimate if it does.',
    'treatment' => 'Beard transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
