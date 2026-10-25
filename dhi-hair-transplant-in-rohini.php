<?php
/**
 * /dhi-hair-transplant-in-rohini — DHI technique spoke for the Rohini clinic.
 *
 * October 2026 (agency confirmed 13 Oct 2026 that DHI is carried out at
 * Rohini). Facts follow /dhi-hair-transplant-in-gurgaon; the text is new.
 *
 * Cannibalisation split: /fue-hair-transplant-in-rohini owns extraction,
 * dot scars and donor limits; this page owns placement — implanter pens, when
 * DHI is and is not worth the premium, unshaven options and hairline work.
 * No rupee figures here.
 *
 * Per the client (14 Oct 2026) the page never mentions the Gurugram clinic
 * and never links to a Gurugram URL. Landing-page layout: lp_split /
 * lp_steps / lp_cta (includes/home-components.php).
 *
 * Not yet reviewed by the clinic's doctor: doctor_block(..., false), no review
 * byline, not in MEDICAL_PAGES, and no named performer in the schema.
 *
 * SEO round 2 (14 Oct 2026, COMPETITOR-SEO §4 #6, §5): the "worth it / not"
 * cards became a "who it suits / when it is not worth it" table (same facts),
 * plus a cost-factors section linking /hair-transplant-cost-in-rohini (no
 * prices) and 14 FAQs.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/** Where DHI's premium buys something and where it does not — the facts of the former cards, with reasons. */
$fitRows = [
    ['situation' => 'The first rows of a hairline',            'fit' => 'Usually worth it', 'why' => 'Hairs emerge at shallow angles there, and setting angle and depth graft by graft shows most.'],
    ['situation' => 'Temples',                                 'fit' => 'Usually worth it', 'why' => 'Very fine hair at acute angles, where small graft numbers need high precision.'],
    ['situation' => 'Adding density between existing hair',    'fit' => 'Usually worth it', 'why' => 'Pre-made sites risk damaging hair that still grows.'],
    ['situation' => 'Frontal work with minimal trimming',      'fit' => 'Often worth it',   'why' => 'Realistic for smaller graft numbers, because working between existing hair is slower.'],
    ['situation' => 'Small, defined sessions',                 'fit' => 'Usually worth it', 'why' => 'The slower placement matters less when the graft count is modest.'],
    ['situation' => 'Softening an earlier hairline',           'fit' => 'Often worth it',   'why' => 'Working between earlier grafts; whether any need removing is assessed separately.'],
    ['situation' => 'A large crown',                           'fit' => 'Usually not',      'why' => 'It needs coverage more than angle control, which FUE placement gives in less time and for less money.'],
    ['situation' => 'Very large sessions across several zones', 'fit' => 'Usually not',     'why' => 'Loading each implanter one graft at a time makes these slow and dearer per graft.'],
    ['situation' => 'Hoping for faster healing',               'fit' => 'No',               'why' => 'Recovery is the same as FUE: the donor, the biology and the growth timeline do not change.'],
    ['situation' => 'Hoping for higher graft survival',        'fit' => 'No',               'why' => 'Not reliably shown against well-executed FUE.'],
];

$faqs = [
    ['q' => 'Is DHI carried out at the Rohini clinic?',
     'a' => 'Yes. DHI hair transplants are carried out at the Rohini clinic by registered medical practitioners. Whether DHI, FUE or a mix of the two suits you is decided at the consultation.'],
    ['q' => 'Is DHI better than FUE?',
     'a' => 'Not universally. DHI gives finer control of angle and depth, which matters in hairlines, temples and between existing hair. Over a large crown, FUE placement generally gives the same coverage in less time and for less money.'],
    ['q' => 'How much does DHI cost in Rohini?',
     'a' => 'There is no fixed price. It follows the graft count, which zones are placed by DHI, the shaving approach and the number of sessions, and it is quoted itemised and in writing after the assessment. <a href="/hair-transplant-cost-in-rohini">Hair transplant cost in Rohini</a> works through the arithmetic.'],
    ['q' => 'Can DHI be done without shaving?',
     'a' => 'Often in part. The thinning area can sometimes be left unshaven, but the donor area still needs trimming for extraction, and unshaven work is slower, so it suits smaller graft numbers. What is realistic for you is agreed at the consultation.'],
    ['q' => 'Does DHI heal faster or give better graft survival?',
     'a' => 'It does not heal faster: the donor, the biology and the growth timeline are the same as FUE. Shorter time out of the body is a reasonable argument for survival, but the evidence does not show DHI reliably ahead of well-executed FUE, and no clinic can verify a survival figure for your scalp beforehand.'],
    ['q' => 'Why does DHI usually cost more?',
     'a' => 'Chair time and consumables: each graft is loaded and placed individually, and implanter tips are single-use. The premium buys precision, which is worth paying for at a hairline and often not across a crown. Your estimate is itemised in writing after the assessment.'],
    ['q' => 'Is EMI available for DHI?',
     'a' => 'Instalment options through third-party lenders may be available — ask at the consultation. The lender sets the interest, tenure and eligibility, so ask for the total payable in writing before signing. <a href="/cost-and-emi-options">Cost, EMI and payment options</a> explains how it works.'],
    ['q' => 'How long does a DHI session take?',
     'a' => 'Longer than FUE placement for the same number of grafts, because each implanter is loaded one graft at a time, and larger sessions run through most of the day with breaks. Your own timings are given beforehand. DHI is a day case under local anaesthetic, and you go home the same day.'],
    ['q' => 'Should I eat, or stop any medicines, before DHI?',
     'a' => 'Eat a proper meal before you arrive, as the session is long and done under local anaesthetic. Bring a list of every medicine and supplement you take; blood thinners and alcohol are reviewed at the consultation, and you are told what to pause and when. Do not stop a prescribed medicine on your own.'],
    ['q' => 'When can I go back to work after DHI?',
     'a' => 'Most people return to desk work within a few days, the same as after FUE: DHI does not shorten recovery. Crusts settle over the first week or two, and strenuous work or a helmet waits until a review clears it.'],
    ['q' => 'When can I wear a helmet, exercise or go out in the sun?',
     'a' => 'Helmets and tight caps wait until a review clears them, and then only loose-fitting ones, so arrange a car or cab home rather than a two-wheeler. Full gym training usually resumes at around three to four weeks and swimming at around four. Keep the recipient area out of direct sun for the first few weeks.'],
    ['q' => 'When will I see the result of DHI?',
     'a' => 'On the same timeline as FUE. Transplanted hairs commonly shed within the first month, new growth starts at around three to four months, and the result is judged at about ten to twelve months against standardised photographs. Results vary between patients.'],
    ['q' => 'What if DHI is not right for me?',
     'a' => 'You are told why, and what fits instead: often FUE placement for a large crown, or DHI only at the front with FUE behind. If a transplant is not suitable yet, <a href="/hair-fall-treatment-in-rohini">hair fall treatment</a> or <a href="/hair-prp-treatment-in-rohini">PRP</a> may come first.'],
    ['q' => 'How do I book a DHI consultation in Rohini?',
     'a' => 'Call or WhatsApp the Rohini clinic on ' . LOC_DELHI_PHONE_DISPLAY . ', or use the form on this page and choose Delhi (Rohini). Sending photographs of your hairline, crown and donor area beforehand helps the appointment start from the right questions. The clinic is open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . ').'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'DHI Hair Transplant in Rohini'],
];

$page = [
    'title'         => 'DHI Hair Transplant in Rohini, Delhi: Process & Cost',
    'description'   => 'DHI hair transplant in Rohini, Delhi: how implanter pens place each graft, who DHI suits and when it is not worth the extra cost, unshaven options and cost.',
    'url'           => '/dhi-hair-transplant-in-rohini',
    'crumbs'        => $crumbs,
    'preload_image' => '/assets/img/services/svc-hair-transplant-768.webp',
    'schema'        => [
        schema_delhi_clinic(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/dhi-hair-transplant-in-rohini', [
            'name'          => 'DHI Hair Transplant',
            'alternateName' => ['Direct hair implantation', 'Implanter pen hair transplant', 'DHI hair transplant in Rohini, Delhi'],
            'procedureType' => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'Follicular units are extracted from the donor scalp as in FUE, then each graft is loaded into a hollow implanter and placed in a single action that makes the site and sets depth, angle and direction together. A day case under local anaesthetic at the Rohini, Delhi clinic.',
            'preparation'   => 'Examination of the hair-loss pattern and donor density, review of medicines including blood-thinning agents, and a hairline design and shaving plan agreed with the patient before the procedure.',
            'followup'      => 'A wash and review in the first week, then photographic reviews at the Rohini clinic through the shedding and regrowth phases.',
            'expectedPrognosis' => 'Transplanted hairs commonly shed within the first weeks; new growth usually begins at around three to four months and the result is judged at about ten to twelve months. Outcomes vary between patients and cannot be promised.',
            'location'      => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
            'performer'     => null,
        ]),
        schema_faq('/dhi-hair-transplant-in-rohini', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Rohini, Delhi</span>
        <h1 class="h1 mt-3">DHI Hair Transplant in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">DHI — direct hair implantation — uses the same extraction as FUE, then sets each graft with a hollow implanter pen that makes the opening and places the hair in one movement. It is carried out at our Rohini clinic by registered medical practitioners. Its value is precision along the hairline and temples; across a large crown it usually adds cost without adding coverage.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/delhi-clinic#book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Hair transplant" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp the Rohini Clinic</a>
        </div>

        <?= ticks([
            'Carried out at the Rohini clinic',
            'Each graft set at a controlled angle and depth',
            'Suited to hairlines and temples',
            'Same recovery as FUE',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-hair-transplant-768.webp" srcset="/assets/img/services/svc-hair-transplant-512.webp 512w, /assets/img/services/svc-hair-transplant-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a model of a single follicular unit with three dark hair shafts, on a cream background" width="768" height="960" loading="eager" fetchpriority="high">
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
    'img'     => 'svc-follicle',
    'alt'     => 'a sculpted cross-section of the scalp showing hair follicles set at an angle beneath the skin',
    'eyebrow' => 'The instrument',
    'title'   => 'What an Implanter Pen Does',
    'tone'    => 'canvas',
    'html'    => '<p>An implanter is a pen-shaped instrument with a hollow needle tip. Each graft is loaded into one on its own, and the doctor makes the opening and delivers the graft in the same movement, setting depth, angle and direction for that graft. DHI is a way of placing grafts, not a separate operation; the control it gives is what you pay for.</p>'
               . '<p>Needle sizes are matched to the graft, finer for single-hair units in the front rows and slightly larger behind, and grafts spend little time out of the body. Extraction, and the dot scars it leaves, are the same as in <a href="/fue-hair-transplant-in-rohini">FUE hair transplant in Rohini</a>; candidacy and aftercare are on <a href="/hair-transplant-in-rohini">hair transplant in Rohini</a>.</p>'
               . '<p><b>Grafts are placed in one of three ways, and none is wrong.</b> The instrument matters less than the hands holding it, so ask which method is planned for each zone, and who will be holding it.</p>',
    'points'  => [
        'Sharp implanters make the opening and place the graft in one movement: DHI in the classic sense',
        'Blunt implanters push grafts into openings made first with a blade or needle: a hybrid sometimes sold as DHI',
        'Forceps set grafts into pre-made sites: conventional FUE, efficient over large areas',
    ],
]) ?>

<section class="section section--white" id="hairline">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Hairlines and detail zones</p>
      <h2 class="h2 mt-2">Hairline Work: Where DHI Earns Its Place</h2>
      <p class="body mt-3">In the first rows of a hairline, hairs emerge at very shallow angles and in no neat order. A ruled edge, or hairs all pointing the same way, reads as artificial. Setting angle and depth graft by graft is the real advantage of an implanter, and it shows most here.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="card"><?= icon('hairline', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Designed before you lie down</h3><p class="body-s mt-2">The line is drawn while you sit upright, checked in a mirror and agreed. Precision cannot rescue a badly designed line — see <a href="/blog/natural-hairline-design-explained">what makes a hairline look natural</a>.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Temples</h3><p class="body-s mt-2">Very fine hair at acute angles, where a wrong direction is noticed at once. Small graft numbers, high precision.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Between existing hair</h3><p class="body-s mt-2">Adding grafts among hair that still grows, where pre-made sites risk damaging it. Women with frontal or parting loss often fit here, once medical causes have been investigated.</p></div>
      <div class="card"><?= icon('pencil', 22, 'var(--accent-deep)') ?><h3 class="h4 mt-3">Correcting a hairline done elsewhere</h3><p class="body-s mt-2">Softening a line placed too straight or too low, working between earlier grafts. Sometimes grafts need removing too, assessed separately — see <a href="/hair-transplant-repair-in-rohini">hair transplant repair in Rohini</a>.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="worth-it">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Value, honestly</p>
      <h2 class="h2 mt-2">Who DHI Suits — and When It Is Not Worth It</h2>
      <p class="body mt-3">DHI is slower than placing grafts into pre-made sites, because each implanter is loaded one graft at a time, and it usually costs more per graft for the extra chair time and single-use tips. Whether that premium buys anything depends on the zone; <a href="/blog/fue-vs-dhi-hair-transplant">FUE vs DHI</a> compares the two in more depth.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data data--fit">
          <caption class="sr-only">Situations in which DHI hair transplant is usually worth its extra cost and situations in which it is not, with the reason for each — a general guide</caption>
          <thead>
            <tr><th scope="col">Your situation</th><th scope="col">DHI, and why</th></tr>
          </thead>
          <tbody>
            <?php foreach ($fitRows as $r): ?>
            <tr>
              <th scope="row" style="white-space:normal;width:38%"><?= e($r['situation']) ?></th>
              <td><b style="color:var(--ink)"><?= e($r['fit']) ?>.</b> <?= e($r['why']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="note mt-4">
      <p class="body-s"><b>Often the answer is both.</b> For many people with moderate loss, DHI at the front and FUE behind puts the precision where it shows and places the rest more quickly — see <a href="/fue-hair-transplant-in-rohini">FUE hair transplant in Rohini</a> for the extraction and placement used behind the hairline.</p>
    </div>
  </div>
</section>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Cost guidance</p>
      <h2 class="h2 mt-2">DHI Cost in Rohini: What Decides It</h2>
      <p class="body mt-3">There is no fixed price for DHI. The estimate follows the factors below and is given to you itemised and in writing after your assessment, with the reasoning for any DHI zones written into it.</p>
    </div>
    <div class="grid grid--4 mt-5">
      <div class="card"><p class="h4">Graft count</p><p class="meta mt-1">Mapped from your scalp, zone by zone</p></div>
      <div class="card"><p class="h4">Technique mix</p><p class="meta mt-1">DHI for the whole plan, or the front rows only</p></div>
      <div class="card"><p class="h4">Shaving approach</p><p class="meta mt-1">Unshaven work takes longer</p></div>
      <div class="card"><p class="h4">Sessions</p><p class="meta mt-1">One sitting or staged across two</p></div>
    </div>
    <p class="body-s mt-4 measure">DHI zones usually cost more per graft than FUE placement, so the same graft count can be priced quite differently depending on the mix; <a href="/blog/why-hair-transplant-quotes-vary">why hair transplant quotes vary</a> explains what else moves the number. The <a href="/hair-transplant-graft-calculator">graft calculator</a> gives a starting range. Instalment options through third-party lenders may be available — ask at the consultation, and read <a href="/cost-and-emi-options">how medical EMI works</a> first.</p>
    <p class="mt-4"><a class="hp-link" href="/hair-transplant-cost-in-rohini">Hair transplant cost in Rohini, worked through <?= hp_icon('arrow', 15, 2) ?></a></p>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-unshaven',
    'alt'     => 'a mannequin head seen from the front, with short hair and a hairline pencilled on',
    'eyebrow' => 'Shaving',
    'title'   => 'Unshaven and Partially Shaved Options',
    'reverse' => true,
    'tone'    => 'canvas',
    'html'    => '<p>Because an implanter can place grafts between existing hairs, DHI makes it easier to work without shaving the thinning area, which is why it is often advertised as “no-shave”. The practical limits are worth knowing first.</p>'
               . '<p>Large sessions are usually easier and more accurate with trimming. More on <a href="/unshaven-hair-transplant-in-rohini">unshaven hair transplant in Rohini</a>.</p>',
    'points'  => [
        'The donor still needs trimming, so the punch can follow each follicle, whatever the placement method',
        'Working between long hairs is slower, so unshaven work is realistic only for smaller graft numbers',
        'How much is trimmed, and where, is decided at the consultation and confirmed before the day',
    ],
]) ?>

<?= lp_steps([
    'eyebrow' => 'On the day',
    'title'   => 'A DHI Day at the Rohini Clinic',
    'intro'   => 'DHI sessions run long by nature, and your own timings are given beforehand. Recovery is the same as FUE: DHI does not shorten it, and results vary between patients.',
    'tone'    => 'white',
    'steps'   => [
        ['img' => 'step-plan',      'alt' => 'a tablet showing a head diagram with a planned hairline', 'title' => 'Marking',                  'text' => 'Consent, photographs, and the hairline marked and checked with you sitting upright.'],
        ['img' => 'step-procedure', 'alt' => 'sterile hair-restoration instruments laid out on a tray',  'title' => 'Extraction and placement', 'text' => 'The donor is trimmed and numbed (the injections are the uncomfortable part), follicular units are removed one at a time as in FUE, then sorted by hair count, loaded into implanters and placed one by one, usually after a break to eat.'],
        ['img' => 'step-followup',  'alt' => 'a desk calendar with review dates circled',               'title' => 'Home and recovery',        'text' => 'Dressing, medication where prescribed, washing explained and your first review at Rohini booked. Crusts last a week or two, shedding comes within the first month, new growth from about three to four months, and the result is judged at ten to twelve.'],
    ],
]) ?>

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
        <h2 class="h2 mt-2">DHI in Rohini: Questions Answered</h2>
        <p class="body-s mt-3">General patient education. Anything specific to your hairline or medical history is answered at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'Visit Our Rohini Clinic',
    'DHI consultations, procedures and reviews take place at the Rohini clinic in North-West Delhi.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= lp_cta([
    'eyebrow'   => 'Rohini, Delhi',
    'title'     => 'Ask Whether DHI Is Worth It for Your Hairline',
    'text'      => 'Bring your questions and a list of your medicines. The doctor examines your donor area, draws a hairline on your face and tells you plainly whether DHI, FUE or a mix suits your zones, and what each would mean for the cost.',
    'treatment' => 'Hair transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
