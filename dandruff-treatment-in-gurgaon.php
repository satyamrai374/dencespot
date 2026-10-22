<?php
/**
 * /dandruff-treatment-in-gurgaon
 *
 * Scalp-condition page. Commercially this is a low-value keyword and
 * clinically it is a useful one, because a large share of people who search it
 * are actually worried about hair fall and have connected the two.
 *
 * Editorial position, and the thing this page exists to say: dandruff does not
 * cause pattern baldness. It can increase shedding while the scalp is inflamed,
 * and that shedding usually recovers once the inflammation settles. Conflating
 * the two is how people end up buying hair-loss packages for a scalp problem,
 * or treating a scalp problem while genuine pattern loss progresses unaddressed.
 *
 * Also does real diagnostic work: dandruff, seborrhoeic dermatitis, dry scalp,
 * scalp psoriasis, tinea capitis and contact dermatitis all present similarly to
 * a patient and are treated differently.
 *
 * Treatment described by ingredient class rather than by brand or dose,
 * consistent with the rest of the site.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'What causes dandruff?',
     'a' => 'It is generally related to seborrhoeic dermatitis — an inflammatory response involving Malassezia, a yeast that lives on everyone\'s skin, together with scalp oil and individual susceptibility. It is not caused by poor hygiene, and washing more aggressively often makes it worse rather than better.'],
    ['q' => 'Does dandruff cause hair loss?',
     'a' => 'Not permanent hair loss, and this is the misunderstanding worth correcting. It does not cause pattern baldness. What it can do is increase shedding while the scalp is inflamed and itchy, partly through the inflammation itself and partly through scratching. That shedding usually recovers once the scalp settles.'],
    ['q' => 'So why is my hair thinning as well?',
     'a' => 'Often because two separate things are happening at once. Dandruff is visible and itchy, so it gets the attention, while genuine pattern hair loss progresses quietly underneath. Treating the scalp will not address the pattern loss, and treating pattern loss will not stop the flaking. Both need identifying, which is what the examination is for.'],
    ['q' => 'What is the difference between dandruff and dry scalp?',
     'a' => 'They look similar and are treated almost oppositely. Dandruff usually produces larger, oilier, yellowish flakes on a scalp that may be red and itchy. A genuinely dry scalp produces smaller, drier, whiter flakes and is usually part of generally dry skin. Treating dandruff as dryness with heavy oils frequently makes it worse.'],
    ['q' => 'Could it be something other than dandruff?',
     'a' => 'Several conditions present in a similar way and need distinguishing: scalp psoriasis, fungal infection of the scalp, contact dermatitis from a hair product, and in some cases inflammatory conditions that can scar. They are managed differently, which is the reason for examining a scalp rather than recommending a shampoo from a description.'],
    ['q' => 'What treatments actually work?',
     'a' => 'Medicated shampoos are the mainstay, and the active ingredient matters more than the brand. Antifungal preparations, zinc-based and selenium-based preparations, tar preparations and keratolytics that lift scale are the usual categories, sometimes rotated. Where there is significant inflammation, a prescribed anti-inflammatory preparation may be added for a period. What suits your scalp is decided on examination.'],
    ['q' => 'How should I use a medicated shampoo?',
     'a' => 'Most people use them wrongly. The active ingredient needs contact time on the scalp rather than on the hair, so it is worked into the scalp and left for the period stated on the product before rinsing. Applying it like ordinary shampoo and rinsing straight away is the most common reason a perfectly good product appears not to work.'],
    ['q' => 'Will it come back?',
     'a' => 'Usually, yes. Seborrhoeic dermatitis is a recurring condition that is controlled rather than cured. Most people find it settles with treatment and then needs occasional maintenance, often flaring in particular seasons or during periods of stress. Expecting control rather than a permanent cure is the realistic frame.'],
    ['q' => 'Does stress make it worse?',
     'a' => 'Many people notice flares during stressful periods, and seasonal change is a common trigger too. That does not make it a psychological condition, and it does not mean it will resolve by relaxing. It is a reason to have a maintenance plan for the periods when it tends to return.'],
    ['q' => 'Is it contagious?',
     'a' => 'No. The yeast involved lives on everyone\'s skin. What differs is the individual response to it, which is why one person in a household has it and another does not.'],
    ['q' => 'Should I wash my hair less often?',
     'a' => 'Usually the opposite. Regular washing helps by reducing the oil that the process feeds on. What does not help is aggressive scrubbing, very hot water, or heavy oil applications left on an inflamed scalp, all of which are common self-treatments that make things worse.'],
    ['q' => 'Do home remedies help?',
     'a' => 'Some are harmless, some are actively unhelpful, and heavy oiling of an already oily inflamed scalp falls into the second category more often than people expect. If something has genuinely helped you, say so at consultation and it can be worked around. What is not sensible is months of home treatment while a scalp condition persists or hair loss progresses.'],
    ['q' => 'Can I have a hair transplant if I have dandruff?',
     'a' => 'The scalp condition is treated and controlled before any surgery. Operating on an inflamed scalp is not sensible, and healing is better on a settled one. It is a delay rather than an exclusion.'],
    ['q' => 'When should I see a doctor about it?',
     'a' => 'If it is not responding to a properly used medicated shampoo, if the scalp is very red, sore or bleeding, if there are well-defined thick plaques, if there are patches of actual hair loss, or if you are also losing hair. Any of those warrants an examination rather than another shampoo.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Treatments', 'url' => '/hair-fall-treatment-in-gurgaon'],
    ['name' => 'Dandruff treatment in Gurgaon'],
];

$page = [
    'title'       => 'Dandruff Treatment in Gurgaon | DenceSpot Clinic',
    'description' => 'Dandruff and seborrhoeic dermatitis treatment in Gurgaon by a dermatologist, including whether your flaking and your hair fall are actually the same problem.',
    'url'         => '/dandruff-treatment-in-gurgaon',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_therapy('/dandruff-treatment-in-gurgaon', [
            'name'          => 'Dandruff and Seborrhoeic Dermatitis Treatment',
            'alternateName' => ['Seborrhoeic dermatitis treatment', 'Scalp flaking treatment', 'Anti-dandruff treatment'],
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'Diagnosis is made on history and direct scalp examination, distinguishing dandruff and seborrhoeic dermatitis from scalp psoriasis, fungal infection, contact dermatitis and inflammatory scarring conditions. Treatment is directed by the diagnosis and typically uses medicated shampoos selected by active ingredient class, applied to the scalp with adequate contact time, with a prescribed anti-inflammatory preparation added for a period where inflammation is significant. A maintenance plan is agreed because the condition tends to recur.',
            'preparation'   => 'History including duration, pattern, seasonal variation, hair products used and previous treatments; direct examination of the scalp and of other skin sites where relevant; and assessment of whether coexisting hair loss is present and of a separate cause.',
            'followup'      => 'Review of response to treatment, adjustment of preparation or regimen where required, and agreement of a maintenance approach for recurrence.',
            'expectedPrognosis' => 'Seborrhoeic dermatitis is a recurring condition that is controlled rather than cured, and flares are common with seasonal change and stress. Dandruff does not cause permanent or pattern hair loss, although increased shedding can occur while the scalp is inflamed and typically recovers once inflammation settles. Where hair loss persists after the scalp is controlled, a separate cause should be investigated.',
        ]),
        schema_faq('/dandruff-treatment-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Dandruff treatment in Gurgaon</span>
        <h1 class="h1 mt-3">Dandruff Treatment, and Whether It Is Really Why Your Hair Is Falling</h1>
        <p class="lead mt-3 measure">Most people who search this are worried about two things at once: the flaking, and the hair in the sink. They are usually connected less than you would expect. Dandruff does not cause baldness, and treating a scalp while pattern loss progresses underneath is a common and costly mistake.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-track="book"><?= icon('calendar', 18) ?> Book an Assessment</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Scalp examined, not diagnosed from a description',
            'Hair loss assessed separately if present',
            'Treatment by active ingredient, not by brand',
            NAP_LOCALITY . ' · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow"><img src="/assets/img/clinic-equipment.jpg" alt="Scalp examination setup used for diagnosing scalp conditions at DenceSpot Clinic, Gurugram" width="800" height="1000" loading="eager"></div>
        <div class="hero__badge-card">
          <p class="eyebrow">Assessed &amp; treated by</p>
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
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Properly distinguished</p><p class="body-s mt-2">Psoriasis and fungal infection look similar.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Seen by a dermatologist</p><p class="body-s mt-2">A scalp condition assessed by a skin doctor.</p></div>
      <div class="card"><?= icon('list', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Two problems, two answers</p><p class="body-s mt-2">Flaking and hair loss assessed separately.</p></div>
      <div class="card"><?= icon('settings', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Used correctly</p><p class="body-s mt-2">Contact time explained, because it is the usual failure.</p></div>
      <div class="card"><?= icon('clock', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Maintenance planned</p><p class="body-s mt-2">It recurs, so the plan expects that.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="hair-loss">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">The question behind the question</p>
        <h2 class="h2 mt-2">Is My Dandruff Causing My Hair Loss?</h2>
        <p class="body-l mt-3 measure">Almost certainly not in the way you fear. Dandruff does not cause pattern baldness, and it does not destroy follicles. The link people notice is real but much smaller than it feels.</p>
        <p class="body-l mt-3 measure">What can happen is this: an inflamed, itchy scalp is scratched, and inflammation itself can push more hairs into the shedding phase. So you shed more while the scalp is bad. Settle the scalp and that shedding usually settles with it, and the hair recovers.</p>
        <p class="body-l mt-3 measure">The trap is what happens when the shedding does not settle. Very often two separate things are running at the same time — a flaking, itchy scalp, which is visible and annoying and gets all the attention, and genuine pattern hair loss, which is silent and progressive and gets none. Treating the first does nothing for the second, and months go by.</p>
        <p class="body-l mt-3 measure">That is why an appointment about dandruff here includes looking at whether you are also losing hair, and if so, why. They are two questions, and they get two answers.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow">Worth checking</p>
        <h3 class="h3 mt-2">Signs there is more than dandruff</h3>
        <?= ticks([
            'A parting that has widened over time',
            'A hairline that has moved back',
            'Visible thinning at the crown',
            'Shedding that continues after the scalp settles',
            'Patches of complete hair loss',
        ], false) ?>
        <p class="body-s mt-4">Any of these warrants assessing the hair loss in its own right. Start at <a href="/hair-fall-treatment-in-gurgaon">hair fall treatment</a>, or <a href="/womens-hair-loss-treatment-in-gurgaon">women's hair loss treatment</a>.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="what-is">
  <div class="wrap">
    <p class="eyebrow">The condition</p>
    <h2 class="h2 mt-2">What Dandruff Actually Is</h2>
    <p class="body-l mt-3 measure">Dandruff sits at the mild end of seborrhoeic dermatitis, an inflammatory condition of skin in oil-rich areas. Three things come together: Malassezia, a yeast that lives on everyone's skin, the oil the scalp produces, and an individual susceptibility to reacting to that combination.</p>
    <div class="grid grid--3 mt-5">
      <div class="card"><p class="h4">It is not a hygiene problem</p><p class="body-s mt-2">The yeast involved is on everyone. What differs is the individual response. Washing harder does not fix it and frequently irritates the scalp further.</p></div>
      <div class="card"><p class="h4">It is not contagious</p><p class="body-s mt-2">You cannot catch it or pass it on. That is why it can affect one person in a household and nobody else.</p></div>
      <div class="card"><p class="h4">It recurs</p><p class="body-s mt-2">It is controlled rather than cured. Flares with seasonal change and during stressful periods are typical, which is why a maintenance plan matters more than a one-off treatment.</p></div>
    </div>

    <div class="card card--pad-lg mt-6">
      <p class="eyebrow">A distinction that changes the treatment</p>
      <h3 class="h3 mt-2">Dandruff or a dry scalp?</h3>
      <div class="grid grid--2 mt-4">
        <div>
          <p class="h4">More like dandruff</p>
          <?= ticks([
              'Larger, oilier, yellowish flakes',
              'Scalp may be red and itchy',
              'Often worse when the scalp is oilier',
              'Sometimes affects eyebrows and nose creases',
          ], false) ?>
        </div>
        <div>
          <p class="h4">More like dry scalp</p>
          <?= ticks([
              'Smaller, drier, whiter flakes',
              'Skin elsewhere is generally dry too',
              'Often worse in cold or dry weather',
              'Less redness of the scalp itself',
          ], false) ?>
        </div>
      </div>
      <p class="body-s mt-4 measure">This matters because the treatments pull in opposite directions. Treating oily seborrhoeic dermatitis as dryness, typically with heavy oil applications, is one of the most common self-treatments and one of the most reliable ways to make it worse.</p>
    </div>
  </div>
</section>

<section class="section section--canvas" id="differential">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">What else it could be</p>
        <h2 class="h2 mt-2">Conditions That Look Like Dandruff</h2>
        <p class="body-l mt-3 measure">A flaking, itchy scalp is a symptom, not a diagnosis. Several conditions produce it and are managed quite differently, which is the reason a scalp is examined rather than a shampoo recommended over a chat.</p>
        <p class="body-l mt-3 measure"><strong>Scalp psoriasis</strong> tends to produce thicker, well-defined, silvery plaques that can extend past the hairline. It is a different condition with different treatment.</p>
        <p class="body-l mt-3 measure"><strong>Fungal infection of the scalp</strong> can cause scaling with patches of hair loss, and is more common in children. It needs specific treatment and does not respond to an ordinary anti-dandruff shampoo.</p>
        <p class="body-l mt-3 measure"><strong>Contact dermatitis</strong> from a hair product, dye or treatment can produce itching and flaking that resolves once the culprit is identified and stopped.</p>
        <p class="body-l mt-3 measure"><strong>Inflammatory scarring conditions</strong> of the scalp are less common but important, because they can permanently destroy follicles. Redness, soreness, or scaling combined with genuine loss of hair in an area needs proper assessment rather than another shampoo.</p>
      </div>
      <div>
        <div class="card card--pad-lg">
          <p class="h4">See someone if</p>
          <?= ticks([
              'A properly used medicated shampoo is not working',
              'The scalp is very red, sore or bleeding',
              'There are thick, well-defined plaques',
              'There are patches of actual hair loss',
              'You are also losing hair generally',
          ], false) ?>
        </div>
        <div class="card card--pad-lg mt-4">
          <p class="h4">Bring with you</p>
          <?= ticks([
              'Every shampoo and product you have tried',
              'Any hair dye or treatment used recently',
              'How long it has been going on',
              'Whether it varies by season',
          ], false) ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="treatment">
  <div class="wrap">
    <p class="eyebrow">Treatment</p>
    <h2 class="h2 mt-2">What Actually Controls It</h2>
    <p class="body-l mt-3 measure">Medicated shampoos are the mainstay, and the useful thing to know is that the active ingredient matters far more than the brand on the bottle.</p>
    <div class="grid grid--2 mt-5">
      <div class="card card--pad-lg">
        <p class="h4">Antifungal preparations</p>
        <p class="body-s mt-2">Target the yeast involved in the process. A common first-line category, used at a frequency that suits your scalp and then reduced for maintenance.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Zinc and selenium preparations</p>
        <p class="body-s mt-2">Widely available categories that reduce yeast and scaling. Often rotated with others, because scalps sometimes respond better to a change than to more of the same.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Tar preparations</p>
        <p class="body-s mt-2">Reduce scaling and inflammation. Useful in more stubborn cases, with the practical drawbacks of smell and potential effect on light or coloured hair.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Keratolytics</p>
        <p class="body-s mt-2">Lift and loosen thick scale so that other treatments can actually reach the scalp underneath. Particularly relevant where build-up is heavy.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">Anti-inflammatory treatment</p>
        <p class="body-s mt-2">Where inflammation is significant, a prescribed preparation may be used for a defined period to settle things, alongside rather than instead of the shampoo regimen.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">A maintenance plan</p>
        <p class="body-s mt-2">Because it recurs, the plan includes what to do when it comes back and how to reduce frequency once it is controlled. Stopping abruptly the moment it clears is the usual reason it returns quickly.</p>
      </div>
    </div>

    <div class="card card--pad-lg mt-6">
      <p class="eyebrow">The most common reason treatment fails</p>
      <h3 class="h3 mt-2">Contact time</h3>
      <p class="body mt-3 measure">A medicated shampoo works on the scalp, not the hair, and the active ingredient needs time in contact with the skin. Most people apply it, lather, and rinse immediately, exactly as they would an ordinary shampoo. That gives the ingredient a few seconds to work.</p>
      <p class="body mt-3 measure">Worked into the scalp with the fingertips and left for the period the product specifies before rinsing, the same bottle often performs completely differently. A large share of "nothing works for me" is this and nothing else.</p>
    </div>
  </div>
</section>

<?= doctor_block(
    'Why a dandruff appointment here includes looking at your hair: the flaking is what brings people in, and it is usually the less important of the two problems they arrive with. Scalp inflammation can increase shedding temporarily, but it does not cause pattern baldness, and the pattern loss that is often running alongside it is silent, progressive and treatable early. Settling the scalp and never asking the second question is how someone spends a year on shampoos while the thing that actually needed treating gets worse.'
) ?>

<section class="section section--canvas" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">What Treatment Costs</h2>
        <p class="body mt-3 measure">This is one of the least expensive things treated here. For most people it is a consultation and a shampoo regimen, occasionally with a prescribed preparation for a period.</p>
        <div class="grid grid--2 mt-5">
          <div class="card"><p class="h4">Consultation and examination</p><p class="body-s mt-2">Where the diagnosis is established</p></div>
          <div class="card"><p class="h4">Medicated preparations</p><p class="body-s mt-2">Mostly widely available, chosen by active ingredient</p></div>
          <div class="card"><p class="h4">Prescribed treatment</p><p class="body-s mt-2">Only where inflammation warrants it</p></div>
          <div class="card"><p class="h4">Review</p><p class="body-s mt-2">To check response and set the maintenance plan</p></div>
        </div>
        <p class="body-s mt-4 measure">If a clinic responds to a flaking scalp by quoting for a course of scalp procedures, be sceptical. Dandruff is a condition to be diagnosed and controlled, not a sales opportunity.</p>
        <p class="body mt-3 measure">See <a href="/cost-and-emi-options">cost and payment options</a>.</p>
      </div>
      <div class="card card--ink card--pad-lg">
        <h3 class="h3">Get the Scalp Looked At</h3>
        <p class="body mt-3">Send photos of the scalp with the hair parted in a few places, in daylight, and tell us what you have already tried and for how long.</p>
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
        <h2 class="h2 mt-2">Dandruff and Scalp FAQs</h2>
        <p class="body-s mt-3">Answers are general patient education. What your scalp actually has, and whether your hair loss is separate, is established at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= local_block(
    'Scalp Condition Care at Our Gurgaon Clinic',
    'Diagnosis, treatment and review happen at our Sector 39 clinic in Gurugram, with the same doctor throughout. Patients travel to us from across Gurugram and neighbouring parts of South Delhi.'
) ?>

<?= cta_band(
    'Find Out Whether It Is One Problem or Two',
    'Come in and have the scalp examined properly. You will get a diagnosis rather than a shampoo recommendation, a treatment plan that expects recurrence, and a separate answer on your hair loss if there is one.',
    'dandruff-treatment',
    ['Dandruff or flaking scalp', 'Itchy or sore scalp', 'Flaking plus hair fall', 'Not sure — please advise']
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
