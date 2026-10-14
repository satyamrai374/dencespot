<?php
/**
 * /faqs — page #14.
 *
 * Deliberately does NOT repeat the treatment-page FAQs. Those pages already
 * carry FAQPage markup for their own questions; duplicating them here would
 * put the same question-answer pairs on two URLs and set the two pages
 * competing. This page answers the clinic-level questions instead — booking,
 * payment, safety, privacy, choosing a clinic — and routes treatment
 * questions to the page that owns them.
 *
 * 14 Oct 2026 — landing-page layout: AI-illustrated hero, the treatment links
 * as an lp_split and an lp_cta close (each image with its visible AI label).
 * The page presents both clinics.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$groups = [
    'Booking and your first visit' => [
        ['q' => 'How do I book a consultation?',
         'a' => 'Use the <a href="/book-consultation">booking page</a>, message the clinic on WhatsApp, or call during opening hours. You give us a name and a phone number, and the clinic calls you back to agree a time.'],
        ['q' => 'What happens at the first consultation?',
         'a' => 'A medical history and medication review, examination of the scalp and donor area under magnification, staging of your pattern, photographs for your record, and a written plan covering technique, approximate graft number, timeline and cost factors. It is an examination, not a sales meeting.'],
        ['q' => 'What should I bring?',
         'a' => 'Your medical history and a list of any current medicines, including supplements and anything affecting clotting. If you have had a previous procedure elsewhere, bring whatever records or photographs you have. Old photographs of your own hair from a few years ago are genuinely useful.'],
        ['q' => 'Will I be pressured to book on the day?',
         'a' => 'No. You leave with a written plan and a figure, and you decide in your own time. If the honest recommendation is to wait, treat medically first, or do nothing yet, that is what you will be told.'],
        ['q' => 'Can I get an opinion without travelling to the clinic?',
         'a' => 'Send clear photographs on WhatsApp and the clinic will tell you whether a consultation is likely to be worth the journey. What cannot be done remotely is the part that matters — examining the scalp under magnification for miniaturisation, and measuring donor density. No responsible graft number is quoted from a photograph.'],
    ],
    'Cost and payment' => [
        ['q' => 'Why is there no price list on the site?',
         'a' => 'Because a headline figure is almost never what anyone pays. Cost is graft count multiplied by a per-graft rate, and graft count comes from the mapped plan. We publish the factors and the arithmetic instead — see <a href="/hair-transplant-cost-in-gurgaon">how treatment is priced</a>.'],
        ['q' => 'What is included in the estimate?',
         'a' => 'The procedure, local anaesthesia, prescribed post-procedure medication, written aftercare instructions and your scheduled follow-up reviews. Anything not included is named in the estimate rather than discovered afterwards.'],
        ['q' => 'Can I pay in instalments?',
         'a' => 'Instalment options are available through third-party finance providers. Terms, eligibility and any interest are set by the provider, not the clinic, and are explained before you commit. See <a href="/cost-and-emi-options">cost, EMI and payment options</a>.'],
        ['q' => 'Does insurance cover hair restoration?',
         'a' => 'Not usually. Treatment for pattern hair loss is classed as cosmetic by Indian health insurers and is generally paid for privately. Reconstruction after burns, trauma or surgery is occasionally assessed differently — check directly with your insurer.'],
    ],
    'Safety, risk and results' => [
        ['q' => 'Who actually performs the procedure?',
         'a' => 'Consultations and procedures are carried out by registered medical practitioners at the clinic; their names, qualifications and registration details are listed on our <a href="/medical-disclaimer#doctors">doctors and registration</a> page. Whichever clinic you are considering, it is worth asking who performs the extraction, site creation and placement, and what their qualification is.'],
        ['q' => 'Can you promise a particular result?',
         'a' => 'No, and no clinic honestly can. Outcomes vary between patients, not every graft survives, and hair that was not transplanted can continue to thin. We give realistic expectations before you book and document progress photographically so the result can be judged against a baseline rather than a memory.'],
        ['q' => 'What are the risks?',
         'a' => 'For surgery: swelling, tenderness, temporary numbness, folliculitis, donor-area marks, shock loss and uneven density. For injections: tenderness, redness, pinpoint marks and bruising. Full detail is on the risks and side effects page, and everything relevant to your case is discussed again on consent.'],
        ['q' => 'Why are there no before-and-after photos on this website?',
         'a' => 'Because the National Medical Commission’s advertising guidelines do not allow doctors or clinics to use before-and-after photographs or patient cases to promote treatment, even with the patient’s consent. Outcomes differ from person to person. At your consultation the doctor explains what is realistic in your case, and your progress is measured against your own baseline photographs.'],
        ['q' => 'Why are there no patient reviews or testimonials on this website?',
         'a' => 'The same guidelines do not allow doctors or clinics to request or share patient reviews, ratings or testimonials to promote their services, so we do not publish them. The consultation is a better basis for your decision: you can ask about your own case and take the written plan away to think about.'],
    ],
    'Privacy and records' => [
        ['q' => 'What happens to my photographs?',
         'a' => 'Clinical photographs are kept on your medical record and used to assess your progress. They are not used in advertising or marketing, and they are not published or shared without your specific written consent, which can be withdrawn.'],
        ['q' => 'What do you do with the details I submit?',
         'a' => 'They are used only to contact you about your enquiry and arrange your consultation. They are not sold or passed to third parties for marketing.'],
        ['q' => 'Will the clinic discuss my treatment with anyone else?',
         'a' => 'No. Your treatment is confidential. If you would like a family member involved in discussions, tell the clinic and that is easily arranged.'],
    ],
    'Choosing a clinic' => [
        ['q' => 'What should I ask before choosing anywhere?',
         'a' => 'Who physically performs the extraction and placement, and whether they are a doctor. How the graft number was arrived at. What the price includes. How many patients the clinic runs in a day. And what happens at the twelve-month review if density is uneven. The answers separate clinics far more reliably than the price does.'],
        ['q' => 'Is a cheaper clinic a false economy?',
         'a' => 'Not automatically — but the cheapest quote is often the one with the highest graft count, which is not the same as better value. A repair procedure costs considerably more than getting it right the first time, and some outcomes cannot be repaired at all.'],
        ['q' => 'Should I travel abroad for treatment?',
         'a' => 'It can look cheaper on the headline figure before travel and accommodation. The part people underestimate is follow-up: hair restoration is judged over twelve months, with reviews along the way, and a complication three weeks later is much harder to manage from another country.'],
    ],
];

/** Flatten for schema — the markup must match the visible text exactly. */
$allFaqs = [];
foreach ($groups as $items) {
    foreach ($items as $item) {
        $allFaqs[] = $item;
    }
}

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'FAQs'],
];

$page = [
    'title'       => 'Hair Transplant FAQs, Gurgaon | DenceSpot Clinic',
    'description' => 'Answers on booking, cost, safety, privacy and choosing a hair restoration clinic in Gurugram — and where to find the detail for each individual treatment.',
    'url'         => '/faqs',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-consultation-768.webp',
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_faq('/faqs', $allFaqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">FAQs</span>
        <h1 class="h1 mt-3">Hair Transplant FAQs — DenceSpot Clinic, Gurgaon</h1>
        <p class="lead mt-3 measure">Questions about the clinic itself — booking, cost, safety, privacy and how to compare clinics. Questions about a specific treatment are answered on that treatment's own page, where they belong.</p>
        <?= medical_review_line() ?>
        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Ask something else</a>
        </div>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-consultation-768.webp" srcset="/assets/img/services/svc-consultation-512.webp 512w, /assets/img/services/svc-consultation-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a dermatoscope and a notepad with a pencil on a wooden desk beside a fern" width="768" height="960" loading="eager" fetchpriority="high">
          <?= hp_ai_chip('AI-generated illustration') ?>
        </div>
        <div class="hero__badge-card">
          <p class="eyebrow">Two clinics</p>
          <p class="h4 mt-1">Sector 39, Gurugram · Rohini, Delhi</p>
          <p class="meta"><?= e(HOURS_DISPLAY) ?><span style="display:block"><?= e(HOURS_NOTE) ?></span></p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="questions">
  <div class="wrap">
    <?php $firstGroup = true; ?>
    <?php foreach ($groups as $heading => $items): ?>
      <div class="split split--sidebar<?= $firstGroup ? '' : ' mt-6' ?>"<?= $firstGroup ? '' : ' style="padding-top:44px;border-top:1px solid var(--line)"' ?>>
        <div>
          <p class="eyebrow"><?= count($items) ?> questions</p>
          <h2 class="h2 mt-2" style="font-size:clamp(23px,2.6vw,30px)"><?= e($heading) ?></h2>
        </div>
        <?= faq_list($items, 0) ?>
      </div>
      <?php $firstGroup = false; ?>
    <?php endforeach; ?>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-hair-transplant',
    'alt'     => 'a sculpted model of a follicular unit with three hairs, on a cream background',
    'id'      => 'looking-for-detail-on-a-specific-treatment',
    'eyebrow' => 'Treatment questions',
    'title'   => 'Looking for Detail on a Specific Treatment?',
    'tone'    => 'canvas',
    'html'    => '<p>Each treatment page carries its own set of questions — recovery, shedding, graft counts, session numbers, what results to expect and when.</p>'
               . '<ul class="rohini-group__list">'
               . '<li><a href="/hair-transplant-in-gurgaon#faqs"><span>Hair transplant<span class="meta" style="display:block;font-weight:400;margin-top:2px">13 questions on candidacy, recovery, grafts and permanence.</span></span></a></li>'
               . '<li><a href="/beard-transplant-gurgaon#faqs"><span>Beard transplant<span class="meta" style="display:block;font-weight:400;margin-top:2px">17 questions including shaving, scars and donor supply.</span></span></a></li>'
               . '<li><a href="/hair-prp-treatment-in-gurgaon#faqs"><span>Hair PRP<span class="meta" style="display:block;font-weight:400;margin-top:2px">15 questions on sessions, evidence, safety and GFC.</span></span></a></li>'
               . '<li><a href="/hair-fall-treatment-in-gurgaon#faqs"><span>Hair fall<span class="meta" style="display:block;font-weight:400;margin-top:2px">12 questions on causes, testing and what is reversible.</span></span></a></li>'
               . '</ul>'
               . '<p>Something not covered here? <a href="' . e(WHATSAPP_URL) . '" rel="noopener" data-track="whatsapp">Ask the clinic on WhatsApp</a>.</p>',
]) ?>

<?= lp_cta([
    'eyebrow' => 'Gurugram and Delhi',
    'title'   => 'Still Have a Question?',
    'text'    => 'Message the clinic on WhatsApp — you will usually get a faster answer than a call-back, and you can send photographs at the same time.',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
