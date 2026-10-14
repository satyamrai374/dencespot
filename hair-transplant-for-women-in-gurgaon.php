<?php
/**
 * /hair-transplant-for-women-in-gurgaon
 *
 * Surgical spoke off /hair-transplant-in-gurgaon, for women specifically.
 *
 * Editorial position, and the reason this page reads differently from the male
 * spokes: most women who search this term are not surgical candidates. Female
 * pattern loss is usually diffuse, the donor area is frequently affected too,
 * and reversible causes — iron, thyroid, post-partum, PCOS, medication — are
 * common and treatable. Publishing a page that funnels every visitor towards
 * surgery would be both clinically wrong and, on a YMYL page, indefensible.
 *
 * So this page qualifies hard, sends the majority to the medical route at
 * /womens-hair-loss-treatment-in-gurgaon, and reserves surgery for the specific
 * indications where it genuinely works.
 *
 * Cannibalisation split: the medical page owns "women's hair loss treatment"
 * and the workup. This page owns "hair transplant for women" — candidacy,
 * donor stability, unshaven options, and traction/scarring indications.
 *
 * Landing-page layout (14 Oct 2026): lp_split / lp_steps / lp_cta from
 * includes/home-components.php, AI illustrations only, each with its label.
 * A Gurugram page: no mention of, or link to, the Rohini clinic.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

// "Pattern of loss → is a transplant considered?" reference table:
// [pattern, usual answer, what is checked first]. A general guide only.
$patternRows = [
    ['Widening parting, with the back thinning too', 'Usually not', 'Checked first: donor density at the back and sides, and iron, thyroid and hormonal causes.'],
    ['A defined female pattern with a dense, stable donor', 'Sometimes', 'Checked first: donor density, measured directly. Medical treatment usually starts or continues alongside.'],
    ['A high or receding frontal hairline, the rest stable', 'Often considered', 'Checked first: that the front is not actively thinning, and what the donor can supply.'],
    ['Traction loss at the hairline or temples', 'Often considered', 'Checked first: that tight styling has stopped and the hair has not returned after a long gap.'],
    ['A scar from surgery, injury or a burn', 'Often considered, sometimes staged', 'Checked first: how mature the scar is and its blood supply, which affect graft survival.'],
    ['Shedding in the months after childbirth', 'Rarely', 'Time comes first, since it usually recovers; anything else contributing is looked for if it does not.'],
    ['Sudden or heavy shedding all over', 'Not yet', 'A diagnosis comes first: blood tests, recent illness or stress, new medicines.'],
    ['Thinning with PCOS or a thyroid problem', 'Not until treated', 'The condition is brought under control first, then the hair is reassessed.'],
    ['Alopecia areata, or a scarring alopecia', 'Not while active', 'Diagnosis and treatment come first, then a sustained quiet period.'],
];

$faqs = [
    ['q' => 'Can women have a hair transplant?',
     'a' => 'Yes, but selectively. The technique is identical to the male procedure; what differs is who it suits. Female hair loss is more often diffuse and more often has a reversible cause, so a proper workup comes before any surgical discussion. Many women do better on medical treatment.'],
    ['q' => 'Why are fewer women suitable for hair transplants?',
     'a' => 'Because a transplant only moves hair — it does not create it. It relies on a donor area at the back and sides that is genuinely stable. In female pattern loss the thinning is often diffuse and involves the donor zone as well, which means the hair being moved is itself vulnerable. Moving unstable hair produces a result that thins along with everything else.'],
    ['q' => 'What is diffuse thinning and why does it rule out surgery?',
     'a' => 'Diffuse thinning is loss spread across the whole scalp rather than confined to a defined bald area. It is the common female pattern, and it means there is no reliably permanent zone to take from. Where the donor is affected, grafting redistributes the problem instead of solving it.'],
    ['q' => 'Which women are good candidates?',
     'a' => 'Broadly: women with a stable donor area and a defined problem. That includes a receding or high frontal hairline, traction alopecia from years of tight styling where the follicles are gone, scarring from surgery or injury, and hair loss confined to a specific area rather than spread across the scalp.'],
    ['q' => 'Do I have to shave my head for a hair transplant?',
     'a' => 'Not necessarily. Unshaven and partially shaved approaches exist and are frequently what women want, and the donor can often be trimmed in a hidden band covered by the hair above it. These approaches are slower and better suited to smaller sessions. See <a href="/unshaven-hair-transplant-in-gurgaon">unshaven hair transplant</a>.'],
    ['q' => 'What tests will I need before you consider surgery?',
     'a' => 'A proper workup, because reversible causes are common and treating them is more effective than operating around them. That typically means investigating iron stores, thyroid function and other relevant bloodwork, taking a full medical, medication and hormonal history, and examining the scalp and donor density directly. What is ordered depends on your assessment.'],
    ['q' => 'Can a hair transplant fix post-partum hair loss?',
     'a' => 'It is very rarely the right treatment. Post-partum shedding is a temporary disturbance of the hair cycle and it typically recovers on its own over months. Operating on hair that was going to come back anyway spends donor supply for nothing. The correct approach is time, investigation of anything else contributing, and reassessment.'],
    ['q' => 'What about hair loss from PCOS or thyroid problems?',
     'a' => 'Those are treated medically first, always. Hormonal and thyroid causes can drive ongoing loss, and surgery performed while the underlying condition is uncontrolled sits inside a process that is still running. Get the condition managed, then reassess the hair.'],
    ['q' => 'Can traction alopecia be treated with a transplant?',
     'a' => 'Often yes, and it is one of the clearer female indications. Years of tight braids, extensions or tightly pulled styles can permanently destroy follicles along the hairline and temples. Where the hair has not returned after the tension has been removed for a long period, grafting is reasonable — provided the pulling has genuinely stopped, because it will damage transplanted hair too.'],
    ['q' => 'Can my hairline be lowered?',
     'a' => 'A naturally high hairline can sometimes be brought forward with grafts, and it is a common request. It is still governed by donor supply and by whether the frontal area is stable rather than actively thinning. It is assessed like any other case.'],
    ['q' => 'Will a transplant help hair loss from a scar?',
     'a' => 'Frequently, yes. Scars from surgery, injury or burns can be grafted into, though survival in scar tissue is lower than in healthy skin because the blood supply is poorer. It is often approached conservatively and sometimes staged across two sessions.'],
    ['q' => 'Is the procedure different for women?',
     'a' => 'The surgery itself is the same. What differs is the planning — the emphasis on donor stability, the frequent preference for unshaven or minimally trimmed approaches, and hairline design for a female frontal shape, which is generally rounder and lower than a male one and has its own temporal contour.'],
    ['q' => 'What results can I expect?',
     'a' => 'Where the indication is right, the same timeline as any transplant: shedding in the first weeks, growth from around three to four months, and a fuller picture at roughly ten to twelve months. Where the loss is diffuse and ongoing, surgery does not stop it, which is why medical treatment usually continues alongside.'],
    ['q' => 'How much does a hair transplant for women cost in Gurgaon?',
     'a' => 'It follows the graft number and the approach, and unshaven work takes longer than a shaven session. It is quoted after assessment. If your workup shows a treatable medical cause, the recommendation may well be treatment rather than surgery. See our <a href="/hair-transplant-cost-in-gurgaon">cost guide</a>.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair transplant', 'url' => '/hair-transplant-in-gurgaon'],
    ['name' => 'Hair transplant for women in Gurgaon'],
];

$page = [
    'title'       => 'Hair Transplant for Women in Gurgaon: Who It Suits',
    'description' => 'Hair transplant for women in Gurgaon: which patterns of loss suit surgery, what is tested first (iron, thyroid, hormones), donor checks and unshaven options.',
    'url'         => '/hair-transplant-for-women-in-gurgaon',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-women-768.webp',
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/hair-transplant-for-women-in-gurgaon', [
            'name'          => 'Hair Transplant for Women',
            'alternateName' => ['Female hair transplant', 'Hair restoration surgery in women'],
            'procedureType' => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'  => 'Scalp',
            'howPerformed'  => 'Following investigation and exclusion of reversible causes of hair loss, and confirmation that the occipital donor area is stable, follicular units are extracted from the donor area and placed into recipient sites across the affected region at the angle and direction of surrounding hair. Unshaven or partially trimmed approaches are commonly used. Performed as a day case under local anaesthetic.',
            'preparation'   => 'Full medical, medication and hormonal history; scalp and donor examination with density measurement; investigation of reversible causes including iron status and thyroid function where indicated; and assessment of whether the pattern of loss is diffuse or localised before surgery is considered.',
            'followup'      => 'Wash instruction and review in the first week, then scheduled photographic reviews as the transplanted hair sheds and regrows, with continued medical treatment of any underlying cause.',
            'expectedPrognosis' => 'Where surgery is appropriate, transplanted hairs commonly shed within the first weeks, with new growth typically beginning around three to four months and a fuller result at approximately ten to twelve months. Surgery does not halt ongoing diffuse hair loss and medical treatment usually continues alongside. Outcomes vary between patients and cannot be promised.',
        ]),
        schema_faq('/hair-transplant-for-women-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Hair transplant for women in Gurgaon</span>
        <h1 class="h1 mt-3">Hair Transplant for Women, Assessed Before It Is Offered</h1>
        <p class="lead mt-3 measure">Women can have hair transplants, and many women who want one should not have one. Female hair loss is more often diffuse, more often has a cause that can be treated, and more often involves the donor area itself. This page explains which cases surgery genuinely suits, and what we look for before saying yes.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-treatment="Hair transplant" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Reversible causes investigated first',
            'Donor stability checked, not assumed',
            'Unshaven approaches where they suit the case',
            NAP_LOCALITY . ' · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-women-768.webp" srcset="/assets/img/services/svc-women-512.webp 512w, /assets/img/services/svc-women-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a mannequin head seen from above, with long hair and a widening parting" width="768" height="960" loading="eager" fetchpriority="high">
          <?= hp_ai_chip('AI-generated illustration') ?>
        </div>
        <?= hero_review_badge() ?>
      </div>
    </div>
  </div>
</section>

<?= lead_strip() ?>

<section class="trust">
  <div class="wrap">
    <div class="grid grid--5">
      <div class="card"><?= icon('doc', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Workup before surgery</p><p class="body-s mt-2">Iron, thyroid and hormonal causes are looked for.</p></div>
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Donor examined</p><p class="body-s mt-2">Diffuse thinning in the donor changes the answer.</p></div>
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Seen by a doctor</p><p class="body-s mt-2">Assessed by a registered medical practitioner.</p></div>
      <div class="card"><?= icon('scale', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Unshaven where possible</p><p class="body-s mt-2">Discussed openly, with its limits explained.</p></div>
      <div class="card"><?= icon('info', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Told when not to operate</p><p class="body-s mt-2">Most women are better served medically.</p></div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'intro-donor',
    'alt'     => 'a mannequin head seen from behind, with the donor area at the back and sides marked',
    'eyebrow' => 'The honest starting point',
    'title'   => 'Why Female Hair Loss Is a Different Problem',
    'id'      => 'why-different',
    'html'    => '<p>A hair transplant does not create hair. It moves hair from one part of your scalp to another, and the whole operation rests on one assumption: that the hair at the back and sides is permanent. In typical male pattern loss that usually holds, which is why surgery is more often an option for men.</p>'
               . '<p>In women it frequently does not. Female pattern loss tends to be diffuse — a general thinning across the top and often the whole scalp — and when the donor region is thinning too, grafts taken from it carry that vulnerability with them and thin in their new position.</p>'
               . '<p>Reversible causes are also far more common: iron deficiency, thyroid disease, post-partum shedding, PCOS, certain medications and periods of significant physical or emotional stress. Operating on hair loss that had a treatable cause is the expensive mistake in this field, and it is not reversible — the donor hair is spent.</p>',
    'points'  => [
        'For many women who ask about surgery, the right answer is a diagnosis and medical treatment',
        'That is not a soft refusal: treatment that works keeps your donor supply intact for later',
        'The assessment comes first, and it is not a formality',
    ],
    'link'    => ['url' => '/womens-hair-loss-treatment-in-gurgaon', 'label' => 'Not yet investigated? Start with women’s hair loss treatment'],
]) ?>

<section class="section section--canvas" id="candidacy">
  <div class="wrap">
    <p class="eyebrow">Suitability</p>
    <h2 class="h2 mt-2">When Surgery Genuinely Suits a Woman</h2>
    <p class="body-l mt-3 measure">There is a real set of female indications where transplantation works well. They share one feature: a defined problem area with a stable donor behind it.</p>
    <div class="grid grid--3 mt-5">
      <div class="card"><p class="h4">Traction alopecia</p><p class="body-s mt-2">Permanent follicle loss along the hairline and temples from years of tight braids, extensions or pulled-back styles. A clear indication, provided the tension has genuinely stopped — transplanted hair is damaged by pulling too.</p></div>
      <div class="card"><p class="h4">A high or receding frontal hairline</p><p class="body-s mt-2">Where the front has receded or has always sat high, and the rest of the scalp is stable. Hairline lowering by grafting is a common and well-suited female case.</p></div>
      <div class="card"><p class="h4">Scars</p><p class="body-s mt-2">From surgery, injury or burns, including cosmetic surgery scars at the hairline. Graft survival in scar tissue is lower, so it is often staged and discussed frankly.</p></div>
      <div class="card"><p class="h4">Localised loss with a stable donor</p><p class="body-s mt-2">A defined area rather than diffuse thinning, with clear density at the back and sides. This is the key distinction the examination establishes.</p></div>
      <div class="card"><p class="h4">Established pattern loss, donor spared</p><p class="body-s mt-2">Some women do have a defined pattern with an unaffected donor. Where the examination shows that, surgery is a reasonable option.</p></div>
      <div class="card"><p class="h4">Eyebrows</p><p class="body-s mt-2">Sparse brows after years of plucking are a separate and frequently suitable procedure. See <a href="/eyebrow-transplant-in-gurgaon">eyebrow transplant</a>.</p></div>
    </div>

    <div class="card card--pad-lg mt-6">
      <p class="eyebrow">When we will say no, or not yet</p>
      <h3 class="h3 mt-2">The situations where surgery is the wrong answer</h3>
      <div class="grid grid--2 mt-4">
        <div>
          <?= ticks([
              'Diffuse thinning that includes the donor area',
              'Post-partum shedding that has not been given time',
              'Untreated thyroid disease or iron deficiency',
              'Uncontrolled PCOS or another hormonal cause',
          ], false) ?>
        </div>
        <div>
          <?= ticks([
              'Active alopecia areata or scarring alopecia',
              'Rapid loss that has not yet been diagnosed',
              'Traction that has not actually stopped',
              'Loss that started recently and is still moving',
          ], false) ?>
        </div>
      </div>
      <p class="body-s mt-4 measure">None of these are permanent refusals. Several of them become suitable once the underlying problem is treated and the picture settles. What they have in common is that operating now would spend donor hair inside a process that is still running.</p>
    </div>

    <div class="measure mt-6">
      <h3 class="h3" id="pattern-of-loss">Is a Hair Transplant an Option for Your Type of Hair Loss?</h3>
      <p class="body mt-3">Whether surgery is even on the table depends on the pattern of loss and on what investigation finds. Use this as a rough map; the examination, and any tests it leads to, decide what applies to you.</p>
    </div>
    <div class="card mt-5" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data data--fit">
          <caption class="sr-only">Patterns of hair loss in women, whether a hair transplant is usually considered for each, and what is checked first — a general guide, not a diagnosis</caption>
          <thead><tr><th scope="col">Pattern of loss</th><th scope="col">Transplant, and what comes first</th></tr></thead>
          <tbody>
            <?php foreach ($patternRows as $r): ?>
            <tr><th scope="row" style="white-space:normal;width:38%"><?= e($r[0]) ?></th><td><b style="color:var(--ink)"><?= e($r[1]) ?>.</b> <?= e($r[2]) ?></td></tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="body-s mt-4 measure">How the usual causes are tested for is set out in <a href="/blog/blood-tests-for-hair-fall">blood tests for hair fall</a>. Patchy loss has its own page, <a href="/alopecia-areata-treatment-in-gurgaon">alopecia areata treatment in Gurgaon</a>, and <a href="/blog/female-pattern-hair-loss-in-women">female pattern hair loss explained</a> covers the most common pattern.</p>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'The assessment',
    'title'   => 'What Happens Before Surgery Is Even Discussed',
    'id'      => 'workup',
    'intro'   => 'The first appointment is for diagnosis, not booking. Bring a list of every medicine and supplement, any recent blood test results, photographs showing how your hair looked before, and dates: when it started and what else was happening.',
    'tone'    => 'white',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                               'title' => 'A full history',       'text' => 'When the loss started and how quickly; whether it followed pregnancy, illness, weight change, a new medication or stress; your menstrual, hormonal and family history; and what you have already tried.'],
        ['img' => 'stage-female',      'alt' => 'a mannequin head seen from above, showing a widening parting',      'title' => 'Examination',          'text' => 'The pattern of loss, whether thinning is diffuse or localised, the scalp itself, and direct measurement of donor density at the back and sides — the measurement that decides whether surgery is even mechanically possible.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram beside a sheet of paper',           'title' => 'Tests, then a plan',   'text' => 'Iron studies, thyroid function or hormonal tests where indicated. You leave with a working diagnosis or the tests to reach one, an honest answer on surgery, and a plan, medical or surgical, with a written estimate if surgery is appropriate.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'svc-procedure',
    'alt'     => 'sterile hair-restoration instruments laid out on a green tray',
    'eyebrow' => 'The procedure',
    'title'   => 'How the Surgery Works for Women',
    'id'      => 'procedure',
    'reverse' => true,
    'tone'    => 'canvas',
    'html'    => '<p>Mechanically it is the same operation performed on men: follicular units are extracted from the donor area, sorted under magnification and placed at the angle and direction of the surrounding hair, as a day case under local anaesthetic. Three things are usually handled differently.</p>'
               . '<p><b>Shaving.</b> Many women will not accept a shaved head, and they do not have to: the donor can often be trimmed in a concealed band, with the hair above left long to cover it, and <a href="/unshaven-hair-transplant-in-gurgaon">unshaven approaches</a> are available for smaller sessions. They are slower and suit some plans better than others.</p>'
               . '<p><b>Hairline design.</b> A female frontal hairline is generally lower, rounder and without the pronounced temporal recession of a mature male one; designing it to a male template is a recognisable error. See <a href="/hairline-transplant-in-gurgaon">how a hairline is designed and agreed</a>.</p>'
               . '<p><b>Afterwards.</b> Because female loss is more often ongoing, medical treatment usually continues alongside the surgery to protect the native hair the grafts do not replace. Once done, the timeline is the same as any transplant, and no faster because it is wanted sooner:</p>',
    'points'  => [
        'Shedding within the first weeks',
        'Growth from around three to four months',
        'A fuller picture at roughly ten to twelve months',
    ],
    'link'    => ['url' => '/hair-transplant-aftercare', 'label' => 'Recovery and aftercare: the full timeline'],
]) ?>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">Hair Transplant Cost for Women in Gurgaon</h2>
        <p class="body mt-3 measure">Cost follows the graft number and the approach. Unshaven and partially shaved work takes considerably longer than a standard shaven session, and that is reflected in the estimate. We quote after assessment and give it to you in writing.</p>
        <div class="grid grid--2 mt-5">
          <div class="card"><p class="h4">Number of grafts</p><p class="body-s mt-2">From the mapped plan, not from a photograph</p></div>
          <div class="card"><p class="h4">Shaven or unshaven</p><p class="body-s mt-2">Unshaven work is slower and priced accordingly</p></div>
          <div class="card"><p class="h4">Area treated</p><p class="body-s mt-2">Hairline, a defined patch, or a scarred area</p></div>
          <div class="card"><p class="h4">Condition of the skin</p><p class="body-s mt-2">Scarred skin is slower and less predictable</p></div>
          <div class="card"><p class="h4">Donor density</p><p class="body-s mt-2">What can safely be taken from a stable donor</p></div>
          <div class="card"><p class="h4">Ongoing medical treatment</p><p class="body-s mt-2">Usually continues alongside, and has its own cost</p></div>
        </div>
        <p class="body-s mt-4 measure">If your assessment finds a treatable medical cause, the recommendation will be treatment. That is a much smaller cost than surgery, and it is the right one.</p>
        <p class="body mt-3 measure">See the <a href="/hair-transplant-cost-in-gurgaon">full cost breakdown</a> and <a href="/cost-and-emi-options">payment and EMI options</a>. The <a href="/hair-transplant-graft-calculator">hair transplant graft calculator</a> is built on the male Norwood scale, so it says little about diffuse female thinning; the <a href="/hair-loss-assessment">hair loss self-assessment</a> is a more useful starting point.</p>
        <div class="card card--pad-lg mt-5">
          <h3 class="h4">Questions worth asking any clinic</h3>
          <p class="body-s mt-2">They apply wherever you go, including here.</p>
          <div class="mt-3"><?= ticks([
              'What is causing my hair loss, and which tests show it?',
              'Has my donor density been measured, and is the back thinning too?',
              'Can it be done unshaven, or with a hidden trimmed band?',
              'Will medical treatment continue alongside, and at what cost?',
              'Who performs each step of the procedure?',
          ], false) ?></div>
        </div>
      </div>
      <div class="cta-band" style="display:block">
        <h3 class="h3">Start With an Assessment, Not a Quote</h3>
        <p class="body mt-3">Send photos of the parting, the hairline and the back of the head on WhatsApp, along with anything you know about when the loss started. You will get an appointment for a proper assessment.</p>
        <a class="btn btn--block btn--accent mt-5" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Send photos on WhatsApp</a>
        <a class="btn btn--block btn--ghost mt-3" href="/book-consultation" data-book data-treatment="Hair transplant" data-track="book">Book a consultation</a>
        <p class="body-s mt-4">Your details are used only to arrange your consultation.</p>
      </div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Consultations and procedures are carried out by registered medical practitioners at the clinic.'
) ?>

<section class="section section--white" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Hair Transplant for Women FAQs</h2>
        <p class="body-s mt-3">Answers are general patient education. Whether surgery suits your particular pattern of loss is answered only after examination and, where needed, investigation.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= awards_certificates_section() ?>

<?= local_block(
    'Female Hair Restoration at Our Gurgaon Clinic',
    'Our Gurugram clinic is in Sector 39, ' . NAP_LANDMARK . ', where consultations and procedures are carried out by registered medical practitioners.'
) ?>

<?= lp_cta([
    'eyebrow'   => 'Sector 39, Gurugram',
    'title'     => 'Find Out What Is Actually Causing Your Hair Loss',
    'text'      => 'Come in for a proper assessment before deciding on surgery. You will get an examination, investigation of anything treatable, an honest answer on whether grafting suits your pattern of loss, and a written plan either way.',
    'treatment' => 'Hair transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
