<?php
/**
 * /hair-led-therapy-in-rohini — low-level light therapy for hair at the
 * Rohini (Delhi) clinic.
 *
 * October 2026 (batch 2). The agency confirmed on 13 Oct 2026 that every
 * service is carried out at the Rohini clinic. Medical facts follow the site's
 * existing LED therapy page: limited evidence, a small effect at most, months
 * of consistent use, not for established baldness, in-clinic sessions versus
 * home devices, and surgery as the honest conversation where follicles are
 * gone. The copy is written fresh.
 *
 * Landing-page layout: lp_split / lp_steps / lp_cta (includes/home-components.php).
 *
 * Client rule (14 Oct 2026): a Rohini page names no other clinic location and
 * links no page for it.
 *
 * Not yet reviewed by the clinic's doctor: no medical_review_line(), no
 * "reviewed by" badge, doctor_block(..., false), and not in MEDICAL_PAGES.
 * No prices, no wavelengths, no device or brand names, no session schedules
 * presented as this clinic's, no Rohini doctor named.
 *
 * SEO round 3 (14 Oct 2026): title per the competitor research; the
 * clinic-or-home cards became an in-clinic vs home device table (same facts);
 * a Delhi seasons row; a cost section "LED Therapy Cost Factors in Rohini"
 * linking the Rohini PRP cost page; 15 FAQs. Section tones re-alternated.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'Is LED therapy for hair available at the Rohini clinic?',
     'a' => 'Yes. The assessment, any in-clinic light sessions and the progress reviews take place at our Rohini clinic in North-West Delhi, carried out by registered medical practitioners. If a home device suits you better, your reviews still happen at Rohini.'],
    ['q' => 'Which parts of Delhi is the Rohini clinic convenient for?',
     'a' => 'The clinic is in North-West Delhi, near the Outer Ring Road, so it is closest for North and North-West Delhi, including Rohini, Pitampura, Shalimar Bagh and Prashant Vihar. The Directions link in the clinic card below opens it in Google Maps.'],
    ['q' => 'Does LED therapy for hair actually work?',
     'a' => 'Some controlled trials report a small improvement in thinning hair with regular use over months, but many were small or short, the devices tested differ widely, and not everyone responds. At most it may mean less shedding and slightly stronger strands in hair that is still growing. It does not cure or reverse hair loss.'],
    ['q' => 'How long before I notice any change?',
     'a' => 'Months rather than weeks, and some people never notice one. The most common way to waste money on light therapy is to stop after six or eight weeks because the mirror looks the same. Nothing visible was expected that early.'],
    ['q' => 'How often do I need to use it?',
     'a' => 'Regularly and consistently over many months. The exact schedule depends on the device or the session plan, and keeping to it is what decides whether light therapy gets a fair test: using it now and then is, in effect, not using it. Whether you can keep it up is discussed before any money is spent.'],
    ['q' => 'Should I have sessions in the clinic or buy a home device?',
     'a' => 'Both need regular use over many months. Sessions under a panel at the clinic suit people who live or work nearby; a home device suits people who will actually use it, and devices vary enormously in specification and price. Decide after a diagnosis, not before; the table on this page sets out the differences.'],
    ['q' => 'What should I bring, and will I need time off afterwards?',
     'a' => 'Bring a list of every medicine you take, including any that make the skin sensitive to light, any recent blood reports, and details of any light device you already own. The first appointment is an assessment. Light therapy does not break the skin, so there is no wound to recover from and no need for time off.'],
    ['q' => 'Will light therapy regrow hair on a bald patch?',
     'a' => 'No. It can only support follicles that are still there. Where they have gone, nothing shone on the surface brings them back, and the realistic conversation is about a <a href="/hair-transplant-in-rohini">hair transplant at the Rohini clinic</a>.'],
    ['q' => 'Can I use it instead of medication?',
     'a' => 'It is usually added to medical treatment rather than used in its place. Some people who cannot take, or would rather avoid, medication choose it anyway. That is a reasonable choice when the smaller and less certain effect is understood beforehand.'],
    ['q' => 'Is it safe, and what are the side effects?',
     'a' => 'It does not break the skin and is generally well tolerated. Side effects are uncommon and usually minor: warmth, mild irritation, and headaches reported by some users of head-worn devices. Some devices need eye protection, so follow the instructions rather than improvising.'],
    ['q' => 'Who should not use it, and what if it does not suit me?',
     'a' => 'It is not appropriate over an infected or inflamed scalp, and it is not a treatment for alopecia areata or other autoimmune scalp conditions. Sensitivity to light, any medicine that causes it and any history of skin cancer on the scalp are checked first. If light therapy does not suit you, you are told why and what may help instead; see <a href="/hair-fall-treatment-in-rohini">hair fall treatment in Rohini</a>.'],
    ['q' => 'Can it be used after a hair transplant?',
     'a' => 'It is sometimes used to support the native hair around a transplant, which surgery itself does not address. The timing after a procedure is decided at your follow-up rather than assumed.'],
    ['q' => 'Do I have to keep using it?',
     'a' => 'Yes, if it is helping. Pattern hair loss carries on underneath, so any benefit is generally lost over the following months once use stops. Weigh that ongoing commitment before buying a device.'],
    ['q' => 'Is EMI available for light therapy?',
     'a' => 'Instalment options through third-party lenders may be available; ask at the consultation. Clinic sessions and a home device are priced quite differently, and the commitment is long-term, so ask what it adds up to over a year. See <a href="/cost-and-emi-options">cost and EMI options</a>.'],
    ['q' => 'Can I send photos on WhatsApp before booking?',
     'a' => 'Yes. Clear daylight photographs of the thinning areas help the Rohini clinic answer a first question, but whether light therapy suits your stage of hair loss is decided only after your scalp has been examined in person. The clinic is open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . ').'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Hair LED therapy in Rohini'],
];

$page = [
    'title'       => 'Hair LED Therapy in Rohini, Delhi: Clinic or Home Device',
    'description' => 'Hair LED (low-level light) therapy at our Rohini clinic, North-West Delhi: limited evidence, months of use, clinic sessions vs a home device, and cost factors.',
    'url'         => '/hair-led-therapy-in-rohini',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_delhi_clinic(),
        schema_therapy('/hair-led-therapy-in-rohini', [
            'name'          => 'Hair LED Therapy',
            'alternateName' => ['Low-level light therapy for hair', 'Red light therapy for hair', 'Hair LED therapy in Rohini, Delhi'],
            'procedureType' => 'https://schema.org/NoninvasiveProcedure',
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'Light of particular wavelengths is delivered to the scalp, either in clinic under a light panel or at home through a cap, helmet or comb, on a regular schedule kept up over many months. It is used to support follicles that are thinning but still present, generally alongside established medical treatment.',
            'preparation'   => 'Clinical history and scalp examination to establish the cause and stage of hair loss, investigation of reversible causes where indicated, exclusion of scalp infection, inflammation and autoimmune scalp disease, review of photosensitivity, photosensitising medicines and any history of skin cancer on the scalp, and baseline photography.',
            'followup'      => 'Review of adherence and response against baseline photographs over months, with the underlying medical treatment continued alongside.',
            'expectedPrognosis' => 'Evidence is limited: controlled trials are mostly small or short and devices vary widely. Any effect is small, develops over months of consistent use and is limited to hair that is thinning but still present; it does not regrow hair where follicles have been lost. Benefit is maintained rather than permanent and is generally lost after stopping. A proportion of patients do not respond.',
            'location'      => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
        ]),
        schema_breadcrumbs($crumbs),
        schema_faq('/hair-led-therapy-in-rohini', $faqs),
    ],
    'preload_image' => '/assets/img/services/svc-followup-768.webp',
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Rohini Clinic · North-West Delhi</span>
        <h1 class="h1 mt-3">Hair LED Therapy in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">LED therapy, also called low-level light therapy, shines light on the scalp to support follicles that are thinning but still present. Trials report a small effect at most, many of them small or short, and only after months of consistent use; some people see no change. At our Rohini clinic in North-West Delhi, the cause of your hair loss is diagnosed before light therapy is even discussed.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Hair fall treatment" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp the Rohini Clinic</a>
        </div>

        <?= ticks([
            'Diagnosis before any session or device',
            'For thinning hair, not a bald scalp',
            'A realistic timeline set out at the start',
            'Reviews at the Rohini clinic',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-followup-768.webp" srcset="/assets/img/services/svc-followup-512.webp 512w, /assets/img/services/svc-followup-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a desk calendar with several days circled in green, beside a small potted succulent and a pen on a wooden desk" width="768" height="960" loading="eager" fetchpriority="high">
          <?= hp_ai_chip('AI-generated illustration') ?>
        </div>
        <div class="hero__badge-card">
          <p class="eyebrow">Rohini Clinic</p>
          <p class="h4 mt-1">North-West Delhi</p>
          <p class="meta"><a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a></p>
          <p class="meta"><?= e(HOURS_DISPLAY) ?><br><?= e(HOURS_NOTE) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= lead_strip() ?>

<section class="trust">
  <div class="wrap">
    <div class="grid grid--4">
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Diagnosis first</p><p class="meta mt-1">Before money goes on sessions or a device.</p></div>
      <div class="card"><?= icon('clock', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Months, not weeks</p><p class="meta mt-1">The timeline is explained at the start.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">A small effect</p><p class="meta mt-1">Said plainly, before you decide.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Registered doctors</p><p class="meta mt-1">Assessment by registered medical practitioners.</p></div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-hair-fall',
    'alt'     => 'a wooden comb with a few shed hairs resting on folded linen towels by a window',
    'eyebrow' => 'How it works',
    'title'   => 'What Low-Level Light Therapy Is',
    'tone'    => 'white',
    'html'    => '<p>Light of particular wavelengths is directed at the scalp, under a panel in the clinic or at home through a cap, helmet or comb. You may see it called LED therapy, red light therapy or low-level laser therapy; the aim is to support follicles that are still working.</p>'
               . '<p>It does not break the skin and is generally easy to tolerate. Devices differ widely in specification, coverage and price, so a general claim about &ldquo;LED therapy&rdquo; says less than it seems to.</p>',
    'points'  => [
        'At most: less shedding and slightly stronger strands in hair that is still growing',
        'It does not regrow a bald crown or cure pattern hair loss',
        'It does not stand in for surgery where the loss is established',
    ],
]) ?>

<section class="section section--canvas" id="evidence">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">The evidence</p>
      <h2 class="h2 mt-2">Limited Evidence, and a Small Effect</h2>
      <p class="body mt-3">There is real trial evidence here, which is more than some scalp treatments can say. It is also thinner than device advertising suggests.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--pad-lg">
        <h3 class="h4">Some controlled trials</h3>
        <p class="body-s mt-2">Several report a small improvement in thinning hair with regular use over months.</p>
      </div>
      <div class="card card--pad-lg">
        <h3 class="h4">Small and short</h3>
        <p class="body-s mt-2">Many of those trials were small or brief, and the devices tested varied widely, so results do not transfer neatly from one device to another.</p>
      </div>
      <div class="card card--pad-lg">
        <h3 class="h4">Not everyone responds</h3>
        <p class="body-s mt-2">Some people see no change at all, even with faithful use. Nobody can tell beforehand who will.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="timeline">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">The long wait</p>
      <h2 class="h2 mt-2">Months of Consistent Use Decide It</h2>
      <p class="body mt-3">The schedule depends on the device or the session plan. Using it now and then is, in effect, not using it.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card"><span class="pill">First two months</span><h3 class="h4 mt-3">Nothing to see</h3><p class="body-s mt-2">Expected. No hair treatment shows visible change this early.</p></div>
      <div class="card"><span class="pill">Months two to three</span><h3 class="h4 mt-3">Use starts to slip</h3><p class="body-s mt-2">The mirror looks the same, so sessions get missed. This is where most attempts fail.</p></div>
      <div class="card"><span class="pill pill--ink">Month four onwards</span><h3 class="h4 mt-3">A fair test begins</h3><p class="body-s mt-2">Around when any response could first be measured against your baseline photographs.</p></div>
    </div>
    <div class="note mt-4">
      <p class="h4">A question worth answering honestly</p>
      <p class="body-s mt-2">Will you keep it up for many months? If the answer is probably not, that is useful to know. It points to a treatment with a lighter routine, and saying so at the assessment is better than buying something that will sit unused. Any benefit also lasts only while you keep going, and generally fades after stopping.</p>
    </div>
  </div>
</section>

<section class="section section--canvas" id="suitability">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Suitability</p>
      <h2 class="h2 mt-2">Who It May Suit, and When It Will Not Help</h2>
      <p class="body mt-3">Light therapy works only on follicles that are still alive. The examination decides whether yours are.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="card card--pad-lg">
        <h3 class="h3">May be considered for</h3>
        <div class="mt-3"><?= ticks([
            'Thinning hair with follicles still present',
            'An addition to medical treatment',
            'People who cannot take, or would rather avoid, medication',
            'Native hair around an earlier transplant',
        ], false) ?></div>
      </div>
      <div class="card card--pad-lg">
        <h3 class="h3">Not appropriate for</h3>
        <div class="mt-3"><?= ticks([
            'Established baldness, where follicles have gone',
            'An infected or inflamed scalp',
            'Alopecia areata and other autoimmune scalp conditions',
            'Hair loss whose cause is not yet known',
        ], false) ?></div>
      </div>
    </div>
    <div class="note mt-4">
      <p class="h4">Checked before starting</p>
      <p class="body-s mt-2">Sensitivity to light, any medicine that causes it, and any history of skin cancer on the scalp. Shedding from low iron, thyroid disease or a hormonal problem needs that condition treated; light does not correct it. Our article on <a href="/blog/telogen-effluvium-vs-pattern-hair-loss">telogen effluvium versus pattern hair loss</a> explains why the diagnosis matters, and a <a href="/hair-fall-treatment-in-rohini">hair fall assessment in Rohini</a> is where it is made.</p>
    </div>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'At the Rohini clinic',
    'title'   => 'How Light Therapy Is Approached',
    'intro'   => 'The diagnosis comes before any talk of sessions or devices, and the review runs over months, not weeks.',
    'tone'    => 'white',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a wooden desk beside a potted fern',                      'title' => 'Assessment',                 'text' => 'The cause and stage of your hair loss, reversible causes looked for, and the scalp examined under magnification.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram, with a sheet of paper and a pencil on a wooden desk', 'title' => 'An honest plan',             'text' => 'Whether light therapy suits your stage of loss, what it can realistically do, clinic or home use, and baseline photographs before starting.'],
        ['img' => 'hero',              'alt' => 'a sculpted cross-section of skin with several hair follicles and their roots',         'title' => 'Months of use, then review', 'text' => 'Regular use alongside your main treatment, reviewed over months against the baseline, with adherence discussed frankly.'],
    ],
]) ?>

<section class="section section--canvas" id="clinic-or-home">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Clinic or home</p>
      <h2 class="h2 mt-2">LED Hair Therapy: In-Clinic Sessions vs a Home Device</h2>
      <p class="body mt-3">Both need the same thing from you: regular use over many months. The difference is where it happens, how practical it is to keep up, and what it costs.</p>
    </div>
    <div class="card mt-6" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data" style="min-width:640px">
          <caption class="sr-only">LED hair therapy in clinic compared with a home device: how it is given, what it needs from you, practicality, safety, reviews and cost</caption>
          <thead>
            <tr><th scope="col">&nbsp;</th><th scope="col">Sessions at the Rohini clinic</th><th scope="col">A device at home</th></tr>
          </thead>
          <tbody>
            <tr><th scope="row">How it is given</th><td>Light under a panel at the clinic</td><td>A cap, helmet or comb used at home</td></tr>
            <tr><th scope="row">What it needs from you</th><td>Regular visits, kept up for many months</td><td>Regular use, kept up for many months; using it now and then is, in effect, not using it</td></tr>
            <tr><th scope="row">Practicality</th><td>Realistic mainly if you live or work nearby in North or North-West Delhi</td><td>A device that is awkward to use will not be used, so ease of use matters</td></tr>
            <tr><th scope="row">Choosing</th><td>No device to choose or buy</td><td>Devices vary enormously in specification, coverage and price; this page names none. Buy one only after a diagnosis</td></tr>
            <tr><th scope="row">Safety</th><td>Does not break the skin; side effects uncommon and usually minor, such as warmth or mild irritation</td><td>The same, with headaches reported by some users of head-worn devices; some devices need eye protection, so follow the instructions exactly</td></tr>
            <tr><th scope="row">Reviews</th><td>Progress judged against baseline photographs at the Rohini clinic</td><td>Reviews still take place at the Rohini clinic, against the same baseline photographs</td></tr>
            <tr><th scope="row">Cost</th><td>Sessions over a long period rather than a fixed course</td><td>A device you buy, priced quite differently from sessions; the commitment is still long-term</td></tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="grid grid--2 mt-4">
      <div class="card card--pad-lg">
        <h3 class="h4">Ask before you buy</h3>
        <div class="mt-3"><?= ticks([
            'Does light therapy suit my stage of hair loss?',
            'What should I expect, and by when?',
            'How often would I need to use it?',
            'What else belongs in the plan alongside it?',
        ], false) ?></div>
      </div>
      <div class="card card--pad-lg">
        <h3 class="h4">Side effects and eyes</h3>
        <p class="body-s mt-2">Uncommon and usually minor: scalp warmth, mild irritation, and headaches in some users of head-worn devices. Some devices need eye protection, so follow the instructions exactly rather than adapting them. <a href="/delhi-clinic">Directions to the Rohini clinic</a> are on the clinic page.</p>
      </div>
    </div>
  </div>
</section>

<?= lp_highlights([
    'eyebrow' => 'Living in Delhi',
    'title'   => 'Keeping Up Light Therapy Through the Delhi Year',
    'intro'   => 'Months of regular use decide whether light therapy gets a fair test, and Delhi’s seasons are where routines slip. General points; your own plan comes from the examination.',
    'tone'    => 'white',
    'items'   => [
        ['icon' => 'clock',    'title' => 'Summer heat and sweat',  'text' => 'Sweat and oil build up on the scalp in the hot months and can aggravate dandruff. Follow the session or device instructions on how the scalp should be before use.'],
        ['icon' => 'calendar', 'title' => 'Monsoon and festivals',  'text' => 'Rain, travel and the festival and wedding season are when sessions get missed. Plan around them so the months of regular use hold.'],
        ['icon' => 'shield',   'title' => 'Winter smog and dust',   'text' => 'Smog and dust make the scalp dirtier and more irritable, but the evidence linking air pollution to hair loss in people is limited. Real thinning still needs its cause found.'],
        ['icon' => 'cap',      'title' => 'Helmets and head-worn devices', 'text' => 'A helmet over a sweaty scalp can aggravate dandruff and folliculitis, so a clean liner and a dry scalp help. Keep a cap or helmet device clean as its instructions say.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-crown',
    'alt'     => 'a mannequin head seen from above with green felt hair and a bald patch at the crown',
    'eyebrow' => 'When light is not the answer',
    'title'   => 'When Surgery Is the Honest Conversation',
    'tone'    => 'canvas',
    'reverse' => true,
    'html'    => '<p>If the scalp is smooth and the follicles have gone, no light, lotion or injection brings them back. Where the loss is extensive, the useful discussion is a <a href="/hair-transplant-in-rohini">hair transplant in Rohini</a>, if your donor area allows it.</p>'
               . '<p>Where follicles remain, other supportive options include <a href="/hair-prp-treatment-in-rohini">PRP and GFC at the Rohini clinic</a> and <a href="/hair-microneedling-in-rohini">hair microneedling in Rohini</a>, each with its own limits.</p>',
    'points'  => [
        'Established baldness: surgery is the realistic discussion',
        'Earlier thinning: supportive treatments may be considered',
        'After a transplant: light is sometimes used for the native hair, timed at your follow-up',
    ],
    'link'    => ['url' => '/blog/norwood-scale-explained', 'label' => 'How the Norwood scale describes stages of hair loss'],
]) ?>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">LED Therapy Cost Factors in Rohini</h2>
        <p class="body mt-3 measure">No price is published. Clinic sessions and a home device are priced quite differently, and the commitment is long-term rather than a fixed course. Your plan, including any treatment alongside light therapy, is quoted in writing after the assessment.</p>
        <p class="body mt-3 measure">Before paying for months of sessions or a device, make sure the diagnosis is clear, because light works only on follicles that are still present. If PRP or GFC is suggested alongside it or instead, <a href="/prp-hair-treatment-cost-in-rohini">PRP hair treatment cost in Rohini</a> explains how those courses are priced.</p>
        <p class="body mt-3 measure">Instalment options through third-party lenders may be available; ask at the consultation, and see <a href="/cost-and-emi-options">cost and EMI options</a>.</p>
      </div>
      <div class="grid grid--2">
        <div class="card"><p class="h4">Clinic or home</p><p class="meta mt-1">Sessions and a device are priced differently.</p></div>
        <div class="card"><p class="h4">How long you keep it up</p><p class="meta mt-1">Benefit lasts only while use continues.</p></div>
        <div class="card"><p class="h4">Treatment alongside</p><p class="meta mt-1">Medication is costed separately.</p></div>
        <div class="card"><p class="h4">Reviews</p><p class="meta mt-1">Judged against your baseline photographs.</p></div>
      </div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Treatment at the Rohini clinic is carried out by registered medical practitioners. Every doctor at DenceSpot is listed below with qualifications and registration details.',
    '',
    false
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Hair LED Therapy in Rohini: Questions</h2>
        <p class="body-s mt-3">General patient education. Whether light therapy belongs in your plan is decided at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask the Rohini Clinic</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= latest_posts_strip('hair-fall', 3, 'Further Reading') ?>

<?= local_block(
    'Visit Our Rohini Clinic',
    'Hair loss assessments, light therapy sessions and reviews take place at our Rohini clinic in North-West Delhi, near the Outer Ring Road. The clinic card below has the phone number, hours and a map link.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= lp_cta([
    'eyebrow'   => 'Rohini, Delhi',
    'title'     => 'Ask Before You Buy a Device',
    'text'      => 'Book an assessment at the Rohini clinic. You will get a diagnosis, an honest view of what light therapy could and could not do at your stage of hair loss, and a plan that puts your money where it is most likely to count.',
    'treatment' => 'Hair fall treatment',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
