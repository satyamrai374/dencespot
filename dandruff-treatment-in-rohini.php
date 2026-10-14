<?php
/**
 * /dandruff-treatment-in-rohini — dandruff and scalp-condition assessment and
 * treatment at the Rohini (Delhi) clinic.
 *
 * October 2026 (batch 2). The agency confirmed (13 Oct 2026) that every
 * service is carried out at the Rohini clinic. Medical facts follow the
 * existing dandruff page and the blog post on water, pollution and hair fall;
 * the copy is new and takes its own angle: telling the look-alike conditions
 * apart, how the scalp is assessed, shampoos by active ingredient, control
 * rather than cure, and where flaking meets hair fall.
 *
 * Client rule (14 Oct 2026): a Rohini page does not mention the other clinic
 * or link to any URL containing its city name. Landing-page layout:
 * lp_split / lp_steps / lp_cta (includes/home-components.php).
 *
 * Not yet reviewed by the clinic's doctor: no medical_review_line(), no
 * "reviewed by" badge, doctor_block(..., false), not in MEDICAL_PAGES.
 * No brands, no doses, no prices, no Rohini doctor named.
 *
 * SEO round 3 (14 Oct 2026): title per the competitor research; the
 * condition cards became a "looks like → how it differs" table (same facts
 * and links); a Delhi seasons row; a cost-factors section with "questions
 * worth asking any clinic"; links to the self-assessment and the hair fall
 * blog posts; 15 FAQs. PRP is not discussed here, so the PRP cost page is
 * not linked.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'Is dandruff treatment done at the Rohini clinic?',
     'a' => 'Yes. The scalp examination, any test that is needed, the treatment plan and your review visits all take place at our Rohini clinic in North-West Delhi.'],
    ['q' => 'Which parts of Delhi is the Rohini clinic convenient for?',
     'a' => 'The clinic is in North-West Delhi, near the Outer Ring Road, so it is close to Rohini, Pitampura, Shalimar Bagh, Prashant Vihar and neighbouring parts of North and North-West Delhi. The directions link on the clinic card opens its location in Google Maps.'],
    ['q' => 'Is dandruff caused by poor hygiene, and can it spread?',
     'a' => 'Neither. The yeast involved lives on everyone’s skin; what differs is how a scalp reacts to it, so dandruff cannot be caught. A fungal scalp infection is different and can spread between children, one reason a scaly scalp with bald patches should be examined.'],
    ['q' => 'Is it dandruff or just a dry scalp?',
     'a' => 'Dandruff tends to give larger, greasier, yellowish flakes on a scalp that may be red and itchy. A dry scalp gives small, dry, white flakes, usually with dry skin elsewhere, and is worse in cold weather. They need almost opposite care, and heavy oil on dandruff often makes it worse, so the difference is worth checking.'],
    ['q' => 'Can I keep oiling my hair?',
     'a' => 'On the lengths, if you like how it feels. Heavy oil left on an itchy, flaking scalp tends to make seborrhoeic dermatitis worse rather than better, so if your scalp is flaky, keep oil off it, or wash it out properly, until the condition is under control.'],
    ['q' => 'Should I wash my hair less often?',
     'a' => 'Usually the opposite. Regular washing removes the oil that seborrhoeic dermatitis feeds on. What does not help is very hot water, hard scrubbing with the nails and scratching, all common habits that keep an inflamed scalp irritated.'],
    ['q' => 'How soon should a medicated shampoo help?',
     'a' => 'Most people notice less flaking and itch within a few weeks, if the shampoo suits the condition and is left on for the time stated on the pack. If correct use has changed nothing, check the diagnosis rather than buying another bottle.'],
    ['q' => 'Will it come back after treatment?',
     'a' => 'Often, yes. Seborrhoeic dermatitis is controlled rather than cured: it settles with treatment and tends to flare again with seasonal change, stress or a sweaty scalp. The plan therefore includes a maintenance routine, usually the shampoo used less often rather than stopped, and what to do when a flare starts.'],
    ['q' => 'Is dandruff making my hair fall out?',
     'a' => 'Not permanently. An inflamed, itchy scalp can shed more while it is inflamed, and scratching snaps hairs, but that usually settles with the scalp. If shedding carries on once the scalp is calm, it is assessed separately; see <a href="/hair-fall-treatment-in-rohini">hair fall treatment in Rohini</a>.'],
    ['q' => 'What should I bring to the appointment?',
     'a' => 'The shampoos, scalp products and any prescribed lotion you have used, or photos of their labels; the name of any hair dye or chemical treatment used recently; and a note of when the problem started and when it is worse. Skip oiling the night before so the scalp can be seen as it usually is.'],
    ['q' => 'When should a child’s scaly scalp be examined?',
     'a' => 'Promptly if there are bare patches or broken hairs, or if the scaling keeps spreading. A fungal scalp infection is seen more often in children, can spread between them and needs antifungal medicine from a doctor; an anti-dandruff shampoo alone will not clear it.'],
    ['q' => 'Do Delhi’s weather and water make it worse?',
     'a' => 'They can. Summer sweat under a helmet or cap and monsoon humidity are common triggers for flares; winter brings dry scalp, which looks similar but needs different care; and hard-water residue can leave a scalp itchy and dull. None of these is a reason to skip an examination if a shampoo used properly has not helped.'],
    ['q' => 'Can I have a hair transplant if I have dandruff?',
     'a' => 'Yes, once the scalp is settled. Surgery is not done on an inflamed scalp, so the scalp condition is treated first and the procedure is planned afterwards. It is a short delay, not a reason to rule surgery out. See <a href="/hair-transplant-in-rohini">hair transplant at the Rohini clinic</a>.'],
    ['q' => 'How much does dandruff treatment cost in Rohini?',
     'a' => 'For most people it is a consultation, a medicated shampoo, sometimes a prescribed preparation for a few weeks, and a review. Prices are not published; your plan and its cost are explained after the examination. See <a href="/cost-and-emi-options">cost and payment options</a>.'],
    ['q' => 'Can I send photos on WhatsApp first?',
     'a' => 'Yes. Clear daylight photographs of the scalp with the hair parted, and of your shampoo labels, help the Rohini clinic answer a first question; if hair fall is the worry, the <a href="/hair-loss-assessment">six-question hair loss self-assessment</a> can suggest a next step. Neither replaces an examination. The clinic is open ' . HOURS_DISPLAY . ' (' . HOURS_NOTE . ').'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Rohini Clinic', 'url' => '/delhi-clinic'],
    ['name' => 'Dandruff treatment in Rohini'],
];

$page = [
    'title'         => 'Dandruff Treatment in Rohini, Delhi: Flaky, Itchy Scalp',
    'description'   => 'Dandruff treatment in Rohini, North-West Delhi: the scalp is examined to tell dandruff from psoriasis, fungus or a dye reaction, then a plan for flares.',
    'url'           => '/dandruff-treatment-in-rohini',
    'crumbs'        => $crumbs,
    'preload_image' => '/assets/img/services/svc-hair-fall-768.webp',
    'schema'        => [
        schema_delhi_clinic(),
        schema_therapy('/dandruff-treatment-in-rohini', [
            'name'              => 'Dandruff and Seborrhoeic Dermatitis Treatment',
            'alternateName'     => ['Scalp flaking treatment', 'Seborrhoeic dermatitis treatment', 'Dandruff treatment in Rohini, Delhi'],
            'procedureType'     => 'https://schema.org/NoninvasiveProcedure',
            'relevantSpecialty' => 'https://schema.org/Dermatology',
            'bodyLocation'      => 'Scalp',
            'howPerformed'      => 'History and direct examination of the scalp, under magnification where useful, to distinguish simple dandruff and seborrhoeic dermatitis from dry scalp, scalp psoriasis, fungal infection of the scalp (tinea capitis), contact dermatitis and inflammatory scarring conditions, with a scraping or hair sample for fungus only where infection is suspected. Treatment follows the diagnosis: medicated shampoos chosen by active ingredient class and left on the scalp for the stated contact time, a prescribed anti-inflammatory preparation for a defined period where inflammation is marked, and specific antifungal treatment where infection is confirmed.',
            'preparation'       => 'The patient brings the shampoos and hair products already tried, details of recent hair dye or chemical treatments, and an account of how long the problem has lasted, whether it varies with the season and whether hair fall is also present.',
            'followup'          => 'A review at the Rohini clinic to check the response, adjust or rotate the shampoo, and agree a maintenance routine for flares.',
            'expectedPrognosis' => 'Seborrhoeic dermatitis is a recurring condition that is controlled rather than cured; flares with seasonal change and stress are common. Dandruff does not cause pattern or permanent hair loss, although shedding can increase while the scalp is inflamed and usually settles with it. Hair loss that continues after the scalp has settled needs separate assessment. Outcomes vary between patients.',
            'location'          => ['@id' => SITE_ORIGIN . '/delhi-clinic#clinic'],
        ]),
        schema_breadcrumbs($crumbs),
        schema_faq('/dandruff-treatment-in-rohini', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Rohini, Delhi</span>
        <h1 class="h1 mt-3">Dandruff Treatment in Rohini, Delhi</h1>
        <p class="lead mt-3 measure">White flakes on your shoulders and an itch that keeps coming back are not always plain dandruff. Psoriasis, a fungal infection or a reaction to hair dye can look much the same and need different treatment. At our Rohini clinic in North-West Delhi, a doctor examines the scalp and names the condition before suggesting any shampoo.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-clinic="Delhi (Rohini)" data-treatment="Hair fall treatment" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp the Rohini Clinic</a>
        </div>

        <?= ticks([
            'Scalp examined before anything is prescribed',
            'Shampoos chosen by active ingredient, not brand',
            'Hair fall checked separately if you have it',
            'Assessment and reviews in Rohini',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-hair-fall-768.webp" srcset="/assets/img/services/svc-hair-fall-512.webp 512w, /assets/img/services/svc-hair-fall-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a wooden wide-toothed comb lying on a stack of folded cream linen towels beside a window" width="768" height="960" loading="eager" fetchpriority="high">
          <?= /* top of the image: at the bottom it sits under the badge card on phones */ str_replace('class="hp-ai-chip"', 'class="hp-ai-chip" style="top:12px;bottom:auto"', hp_ai_chip('AI-generated illustration')) ?>
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
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Diagnosis first</p><p class="meta mt-1">Look-alike conditions told apart.</p></div>
      <div class="card"><?= icon('list', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Two questions</p><p class="meta mt-1">Flaking and hair fall answered separately.</p></div>
      <div class="card"><?= icon('clock', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Used properly</p><p class="meta mt-1">Contact time explained, not skipped.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Registered doctors</p><p class="meta mt-1">Seen by registered medical practitioners.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="conditions">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">What the flakes might be</p>
      <h2 class="h2 mt-2">Dandruff and the Conditions That Look Like It</h2>
      <p class="body mt-3">A flaking, itchy scalp is a symptom. These are the usual causes; each one is handled differently, and the examination is what tells them apart.</p>
    </div>
    <div class="card mt-6" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data" style="min-width:760px">
          <caption class="sr-only">Dandruff and the scalp conditions that look like it: what each looks like, and how it is told apart at the examination</caption>
          <thead>
            <tr><th scope="col">Condition</th><th scope="col">What it looks like</th><th scope="col">How it differs, and what is checked</th></tr>
          </thead>
          <tbody>
            <tr><th scope="row">Simple dandruff</th><td>Fine, loose flakes with mild itch and little redness.</td><td>The mildest form of seborrhoeic dermatitis. The scalp shows little inflammation, and a medicated shampoo used properly usually controls it.</td></tr>
            <tr><th scope="row">Seborrhoeic dermatitis</th><td>Greasy, yellowish scale on a red, itchy scalp, sometimes also in the eyebrows, beside the nose or behind the ears.</td><td>A skin yeast, scalp oil and individual sensitivity combine to cause it, so the face and ears are checked too. Ongoing facial skin concerns are covered under <a href="/skin-treatment-in-rohini">skin treatment in Rohini</a>.</td></tr>
            <tr><th scope="row">Scalp psoriasis</th><td>Thicker, sharply outlined silvery plaques that can spread past the hairline.</td><td>The elbows, knees and nails are checked for psoriasis elsewhere. Thick scale may need lifting before other treatment can reach the skin.</td></tr>
            <tr><th scope="row">Fungal infection (tinea capitis)</th><td>Scaling with patches of hair loss or broken hairs, seen more often in children.</td><td>A scraping or a few hairs may be checked for fungus. It needs antifungal medicine from a doctor; an anti-dandruff shampoo alone will not clear it.</td></tr>
            <tr><th scope="row">Contact dermatitis</th><td>Itching, redness and flaking after a hair dye, product or chemical treatment.</td><td>Recent dyes and products are reviewed. It settles once the cause is found and stopped.</td></tr>
            <tr><th scope="row">Dry scalp</th><td>Small, dry, white flakes, usually with dry skin elsewhere and worse in cold weather.</td><td>Little grease or redness. It needs almost the opposite care to seborrhoeic dermatitis, which is why the two are told apart before any shampoo is chosen.</td></tr>
            <tr><th scope="row">Scarring inflammatory conditions</th><td>Less common, but important: redness, soreness or scaling in an area where hair is also being lost.</td><td>Examined under magnification for missing follicle openings rather than treated with another shampoo, because some of these conditions destroy follicles for good.</td></tr>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">Deciding whether to start with a salon, a trichologist or a doctor? <a href="/blog/who-should-assess-hair-fall">Dermatologist, trichologist or salon</a> explains who can diagnose a scalp condition and prescribe for it.</p>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'At the Rohini clinic',
    'title'   => 'How Your Scalp Is Assessed',
    'intro'   => 'A scalp cannot be diagnosed from a description, so the first visit is spent looking at it. Note the name of any hair dye or chemical treatment used recently, and when the problem started and when it is worse.',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-followup',     'alt' => 'a desk calendar with dates circled, beside a small plant', 'title' => 'Your history',             'text' => 'How long it has gone on, whether season or stress changes it, the products and dyes you use, what you have tried, and whether you are losing hair. Bring the shampoos, scalp products and any prescribed lotion you have used, or photos of the labels.'],
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                     'title' => 'A close look',             'text' => 'The scalp is examined with the hair parted in several places, under magnification where useful, for scale, redness, plaques, broken hairs and bare patches. The face, elbows or nails may be checked too. Skip oiling the night before, so the scalp can be seen as it usually is.'],
        ['img' => 'step-procedure',    'alt' => 'sterile instruments laid out on a tray',                   'title' => 'A test, only if needed',   'text' => 'Most people need none. If a fungal infection is suspected, a scraping or a few hairs may be sent to check for fungus before treatment starts.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned line',      'title' => 'A written plan',           'text' => 'Which shampoo, how often and for how long it stays on, anything prescribed, and a date to come back to the Rohini clinic for review.'],
    ],
]) ?>

<section class="section section--white" id="treatment">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Treatment</p>
      <h2 class="h2 mt-2">Medicated Shampoos, Chosen by What Is in Them</h2>
      <p class="body mt-3">The active ingredient matters more than the brand. These are the main groups, and the doctor picks or rotates them to suit your scalp.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--pad-lg"><h3 class="h4">Antifungal shampoos</h3><p class="body-s mt-2">Act on the yeast behind seborrhoeic dermatitis. Often the first choice, used more often at the start and less once things settle.</p></div>
      <div class="card card--pad-lg"><h3 class="h4">Zinc- or selenium-based</h3><p class="body-s mt-2">Reduce yeast and flaking. Useful for rotation, since some scalps respond better to a change than to more of the same.</p></div>
      <div class="card card--pad-lg"><h3 class="h4">Tar-based</h3><p class="body-s mt-2">Slow down scaling and calm inflammation in stubborn cases and psoriasis. They smell strongly and can tint light or coloured hair.</p></div>
      <div class="card card--pad-lg"><h3 class="h4">Scale-lifting shampoos</h3><p class="body-s mt-2">Ingredients such as salicylic acid loosen thick scale so other treatments can reach the skin beneath.</p></div>
      <div class="card card--pad-lg"><h3 class="h4">Prescribed anti-inflammatory</h3><p class="body-s mt-2">A lotion for a set period when redness and itch are marked, used alongside the shampoo, not instead of it.</p></div>
      <div class="card card--pad-lg"><h3 class="h4">Antifungal medicine</h3><p class="body-s mt-2">For a confirmed scalp infection, prescribed and monitored by the doctor. Shampoo alone does not clear it.</p></div>
    </div>
    <div class="card card--pad-lg mt-5">
      <h3 class="h3">Using a medicated shampoo properly</h3>
      <p class="body-s mt-2">Most shampoos that “don’t work” were rinsed off too soon. The ingredient needs time on the skin.</p>
      <div class="mt-3"><?= ticks([
          'Apply to the scalp, not the lengths',
          'Work it in with the fingertips, not the nails',
          'Leave it on for the time stated on the pack',
          'Rinse well; use conditioner on the lengths if you need it',
      ]) ?></div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-skin',
    'alt'     => 'a sculpted cross-section of skin layers with a single hair follicle',
    'eyebrow' => 'Realistic expectations',
    'title'   => 'Control, Not a Cure',
    'tone'    => 'canvas',
    'html'    => '<p>Seborrhoeic dermatitis usually settles with treatment and then returns from time to time; a good plan expects that. Seasonal change, stress, humid months and a sweaty scalp under a helmet or cap are common triggers, and a flare is not a failure of treatment.</p>'
               . '<p><b>Hard water and build-up.</b> Mineral and product residue can leave a scalp itchy or dull and is easily mistaken for dandruff. An occasional clarifying wash can help, but not on a scalp that is red or sore until it has been examined.</p>',
    'points'  => [
        'Once the scalp is calm, the shampoo is used less often rather than stopped',
        'Stopping the moment it clears is the usual reason it comes back fast',
        'Regular washing helps, because it removes the oil the condition feeds on',
        'Very hot water, hard scrubbing and scratching do not',
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-follicle',
    'alt'     => 'a sculpted cross-section of scalp showing hair follicles beneath the surface',
    'eyebrow' => 'Flaking and hair fall',
    'title'   => 'Is Dandruff Making Your Hair Fall?',
    'tone'    => 'white',
    'reverse' => true,
    'html'    => '<p>Not in the way most people fear. Dandruff does not cause baldness and does not destroy follicles. <a href="/blog/can-dandruff-cause-hair-fall">An inflamed, itchy scalp can shed more while it is inflamed</a>, and scratching snaps hairs; once the scalp settles, that extra shedding usually settles too.</p>'
               . '<p>Heavy oiling often makes this worse: oil left on a flaking scalp tends to feed seborrhoeic dermatitis, so the itch, scratching and shedding carry on. Keep oil to the lengths until the scalp is under control.</p>'
               . '<p>Sometimes pattern hair loss is progressing quietly behind the flaking. If shedding continues once the scalp is calm, it is assessed in its own right through <a href="/hair-fall-treatment-in-rohini">hair fall treatment at the Rohini clinic</a>; our guide to <a href="/blog/telogen-effluvium-vs-pattern-hair-loss">telogen effluvium and pattern hair loss</a> explains the difference, and the <a href="/hair-loss-assessment">six-question hair loss self-assessment</a> can suggest a next step.</p>'
               . '<p><b>Get the scalp examined if:</b></p>',
    'points'  => [
        'A medicated shampoo used properly has not helped',
        'The scalp is very red, sore, weeping or bleeding',
        'There are thick, sharply outlined plaques',
        'There are bare patches or broken hairs, especially in a child',
        'The itch began after a new dye or product',
        'Your parting is widening or your hair is thinning',
    ],
]) ?>

<?= lp_highlights([
    'eyebrow' => 'Living in Delhi',
    'title'   => 'Scalp Flares Through Delhi’s Seasons',
    'intro'   => 'Seborrhoeic dermatitis often follows the calendar. Knowing your own pattern lets you step the routine up as a flare starts rather than weeks later. General points; your plan comes from the examination.',
    'tone'    => 'canvas',
    'items'   => [
        ['icon' => 'clock',    'title' => 'Summer heat and helmets', 'text' => 'Sweat and oil build up under a helmet or cap. Wash after a sweaty day and keep the lining clean; regular washing helps rather than harms.'],
        ['icon' => 'calendar', 'title' => 'Monsoon humidity',        'text' => 'Damp months are a common time for flares and for fungal scalp infections. Dry the scalp properly rather than tying hair up wet.'],
        ['icon' => 'info',     'title' => 'Winter cold',             'text' => 'Dry scalp is worse in cold weather and is easily taken for dandruff. Small, dry, white flakes with dry skin elsewhere need gentler care, not a stronger shampoo.'],
        ['icon' => 'shield',   'title' => 'Smog and dust',           'text' => 'Dust and smog settle on an oily scalp and add to the itch and irritation. Washing them out regularly is part of the routine; the hairs seen on wash days had already been shed.'],
    ],
]) ?>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">Dandruff Treatment Cost in Rohini: What Decides It</h2>
        <p class="body mt-3 measure">For most people the cost is modest and predictable: a consultation, a medicated shampoo, sometimes a prescribed preparation for a few weeks, and a review. It rises when a fungal infection needs a test and antifungal medicine, when psoriasis needs longer treatment, or when hair fall turns out to be a separate problem needing its own assessment.</p>
        <p class="body mt-3 measure">Prices are not published; the plan and its cost are explained after the examination. See <a href="/cost-and-emi-options">cost and payment options</a>. If hair fall is part of the picture, <a href="/hair-fall-treatment-in-rohini">hair fall treatment in Rohini</a> explains what that assessment involves.</p>
      </div>
      <div class="grid grid--2">
        <div class="card"><p class="h4">Consultation</p><p class="meta mt-1">Where the condition is named.</p></div>
        <div class="card"><p class="h4">Medicated shampoo</p><p class="meta mt-1">Chosen by active ingredient; used less once settled.</p></div>
        <div class="card"><p class="h4">Prescribed lotion</p><p class="meta mt-1">Only when inflammation is marked, for a set period.</p></div>
        <div class="card"><p class="h4">Fungal test</p><p class="meta mt-1">Only if an infection is suspected.</p></div>
      </div>
    </div>
    <div class="card card--pad-lg mt-6">
      <h3 class="h4">Questions worth asking any clinic about a flaky scalp</h3>
      <p class="body-s mt-2">They apply wherever you are seen, including here.</p>
      <div class="mt-3"><?= ticks([
          'Which condition is this: dandruff, psoriasis, a fungal infection or a reaction?',
          'Which active ingredient am I using, and how long should it stay on?',
          'How long should a prescribed lotion be used, and when does it stop?',
          'What should I do when a flare starts?',
          'Is my hair fall part of this, or a separate problem?',
          'Is anything being sold that the diagnosis does not need?',
      ]) ?></div>
    </div>
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
        <h2 class="h2 mt-2">Dandruff Treatment in Rohini: FAQs</h2>
        <p class="body-s mt-3">General information only. What your scalp has, and whether any hair loss is a separate problem, is decided at the examination.</p>
        <a class="btn btn--accent mt-4" href="<?= e(LOC_DELHI_WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask the Rohini Clinic</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= latest_posts_strip('hair-fall', 3, 'Further Reading') ?>

<?= local_block(
    'Visit Our Rohini Clinic',
    'Scalp examinations, treatment and review visits take place at our clinic in Rohini, North-West Delhi, near the Outer Ring Road.'
) ?>

<?= rohini_services_block($page['url']) ?>

<?= lp_cta([
    'eyebrow'   => 'Rohini, Delhi',
    'title'     => 'Get Your Scalp Examined in Rohini',
    'text'      => 'Bring the shampoos you have tried. You will leave with a diagnosis, a routine that allows for flares, and a separate answer on any hair loss.',
    'treatment' => 'Hair fall treatment',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
