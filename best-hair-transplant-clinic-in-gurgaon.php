<?php
/**
 * /best-hair-transplant-clinic-in-gurgaon
 *
 * High-intent commercial query. The obvious page to write here is one that
 * asserts we are the best, and that is exactly what this page does not do —
 * partly because it would be an unevidenced superiority claim of the kind
 * config.php explicitly forbids ("5,000+ procedures", "98% success rate"), and
 * partly because a page claiming to be the best is indistinguishable from every
 * competitor page claiming the same thing.
 *
 * Instead: define what "best" can actually mean, give the criteria a patient can
 * verify themselves, and then state plainly what this clinic is and is not,
 * including what it does not offer. The honest self-description is the
 * differentiator.
 *
 * Cannibalisation split: /how-to-choose-hair-transplant-clinic owns the
 * portable decision PROCESS — the questions, the consultation checklist, the
 * red flags. This page owns the "best in Gurgaon" query and the criteria, and
 * links across rather than repeating the checklist.
 *
 * No competitor is named, characterised or implied.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'Which is the best hair transplant clinic in Gurgaon?',
     'a' => 'There is no single answer, and any clinic that gives you one about itself is advertising. What exists is a set of things you can actually verify — who performs the surgery, what qualification they hold, whether your donor area is measured before a graft number is quoted, and whether you are given an itemised written estimate. Those are checkable. "Best" is not.'],
    ['q' => 'So how am I supposed to decide?',
     'a' => 'By treating the consultation as the assessment of the clinic, not just of your hair. Ask who will hold the punch and who will place the grafts. Ask how the graft number was reached. Ask what happens if the result is poor. The quality of those answers separates clinics far more reliably than a website does.'],
    ['q' => 'Do awards and certificates mean anything?',
     'a' => 'Some do and many do not. A medical qualification and a council registration are meaningful and verifiable. Industry awards vary enormously in how they are given, and some are paid placements. Ask what an award was for and who issued it, and treat any credential you cannot independently check as decoration.'],
    ['q' => 'What about before-and-after photographs?',
     'a' => 'Useful, with caution. Look for consistent lighting, angle and hair length between the two images, and results photographed at around twelve months rather than shortly after surgery. Ask whether the case shown was performed by the person who will perform yours. Our guide on <a href="/blog/how-to-read-before-and-after-photos">reading before-and-after photographs</a> goes through this properly.'],
    ['q' => 'Should I choose based on price?',
     'a' => 'Price is a poor primary criterion in either direction. A low per-graft rate applied to an inflated graft count costs more than an honest quote and spends donor hair you cannot replace, and a high price guarantees nothing. What matters is how the number was reached and what it includes.'],
    ['q' => 'Does a doctor need to perform the whole procedure?',
     'a' => 'Practice varies, and what matters is that you are told clearly and honestly who does what. Ask specifically who makes the recipient sites, who performs extraction and who places the grafts, and ask by name and qualification. A clinic that answers this immediately and specifically is telling you something useful.'],
    ['q' => 'How many reviews should a good clinic have?',
     'a' => 'Volume matters less than pattern. Read the detailed reviews rather than the count, look for how the clinic responded to criticism, and be sceptical of large numbers of very short five-star entries posted close together. See our <a href="/patient-reviews">patient reviews</a>.'],
    ['q' => 'Is a bigger clinic better?',
     'a' => 'Not inherently. Size brings capacity and sometimes brings a production line where you meet a salesperson, are assessed by one person and operated on by another. A smaller clinic offers continuity and has less capacity. Neither is automatically better; what matters is knowing which you are choosing.'],
    ['q' => 'What should make me walk away?',
     'a' => 'A graft number quoted from a photograph without examination. Pressure to book on the day, or a price that expires. A guaranteed result or a success percentage. Reluctance to say who performs the surgery. And an offer of surgery when you have an active scalp condition or unstable hair loss.'],
    ['q' => 'Should I get a second opinion?',
     'a' => 'For an irreversible procedure that spends a finite resource, yes, and no reasonable clinic should object. If two clinics propose very different graft numbers for the same head, that difference is worth understanding before you commit to either.'],
    ['q' => 'What does DenceSpot not offer?',
     'a' => 'We are a single-doctor clinic, so capacity is limited and dates are not always immediate. We do not publish headline prices, guarantee outcomes, or quote graft numbers from photographs. We turn down cases where hair loss is unstable or a scalp condition is active. If you want an immediate date and a fixed package price, we are not the right fit.'],
    ['q' => 'Do you treat patients from Delhi and elsewhere in NCR?',
     'a' => 'Yes. Patients travel to our Sector 39 clinic from across Gurugram, South Delhi and the wider NCR. Everything — consultation, surgery and follow-up — happens at the same clinic with the same doctor.'],
    ['q' => 'How do I check a doctor is genuinely qualified?',
     'a' => 'Ask for their qualification and their medical council registration, and verify it independently. This is an ordinary request and any legitimate practitioner will answer it without hesitation. Be wary of vague descriptions like "expert" or "specialist" used in place of an actual qualification.'],
    ['q' => 'What is the single most useful question to ask?',
     'a' => 'How was my graft number arrived at? A clinic that measured your donor density and mapped the area can explain it in detail. One that estimated from a photograph cannot, and everything else in the quote rests on that number.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair transplant', 'url' => '/hair-transplant-in-gurgaon'],
    ['name' => 'Best hair transplant clinic in Gurgaon'],
];

$page = [
    'title'       => 'Best Hair Transplant Clinic in Gurgaon | DenceSpot',
    'description' => 'How to judge a hair transplant clinic in Gurgaon on things you can actually verify, and an honest account of what our clinic does and does not offer.',
    'url'         => '/best-hair-transplant-clinic-in-gurgaon',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_faq('/best-hair-transplant-clinic-in-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Choosing a clinic in Gurgaon</span>
        <h1 class="h1 mt-3">Every Clinic Says It Is the Best. Here Is What You Can Actually Check.</h1>
        <p class="lead mt-3 measure">We are not going to tell you we are the best hair transplant clinic in Gurgaon, because that claim is unverifiable and every competitor makes it. What we can do is set out the things you can check for yourself, and then describe honestly what this clinic is and is not.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Ask Us Anything</a>
        </div>

        <?= ticks([
            'Criteria you can verify independently',
            'What we offer, and what we do not',
            'No superiority claims, no guaranteed outcomes',
            NAP_LOCALITY . ' · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow"><img src="/assets/img/clinic-front.webp" alt="DenceSpot Clinic, Sector 39, Gurugram" width="800" height="1000" loading="eager"></div>
        <div class="hero__badge-card">
          <p class="eyebrow">Every procedure performed by</p>
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
      <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">One doctor throughout</p><p class="body-s mt-2">The person who assesses you performs your surgery.</p></div>
      <div class="card"><?= icon('search', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Donor measured first</p><p class="body-s mt-2">No graft number is quoted from a photograph.</p></div>
      <div class="card"><?= icon('doc', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">Itemised written estimate</p><p class="body-s mt-2">Taken away with you, with no expiry.</p></div>
      <div class="card"><?= icon('shield', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">No guarantees offered</p><p class="body-s mt-2">Because no honest clinic can give one.</p></div>
      <div class="card"><?= icon('info', 22, 'var(--accent-deep)') ?><p class="h4 mt-3">We decline cases</p><p class="body-s mt-2">Unstable loss and active conditions are treated first.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="what-best-means">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">The problem with the question</p>
        <h2 class="h2 mt-2">"Best" Is Not a Property a Clinic Can Have</h2>
        <p class="body-l mt-3 measure">Search for the best hair transplant clinic in Gurgaon and you will find a long list of clinics each stating that it is. The pages look similar because they are making the same claim, supported by the same unverifiable furniture: procedure counts nobody audits, success percentages with no definition attached, and awards whose origin is not stated.</p>
        <p class="body-l mt-3 measure">None of that is checkable, which is what makes it useless to you. A number you cannot verify is not evidence, and a superlative that every competitor also uses carries no information at all.</p>
        <p class="body-l mt-3 measure">What is checkable is narrower and considerably more useful: who will perform your surgery and what they are qualified as, whether anyone measured your donor area before quoting a graft number, whether you were given something in writing, and whether you were told plainly what could go wrong.</p>
        <p class="body-l mt-3 measure">Those are the criteria below. They are not flattering to us in every respect, which is rather the point.</p>
      </div>
      <div class="card card--pad-lg">
        <p class="eyebrow">Claims we deliberately do not make</p>
        <h3 class="h3 mt-2">And why</h3>
        <p class="body mt-3"><strong>A procedure count.</strong> We have no way to evidence one to you, so publishing it would be asking for trust rather than earning it.</p>
        <p class="body mt-3"><strong>A success rate.</strong> Success in hair restoration has no standard definition, which makes any percentage meaningless.</p>
        <p class="body mt-3"><strong>A guaranteed result.</strong> Biology does not permit it. Anyone offering one is selling reassurance, not an outcome.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="criteria">
  <div class="wrap">
    <p class="eyebrow">The criteria</p>
    <h2 class="h2 mt-2">Six Things You Can Verify Yourself</h2>
    <p class="body-l mt-3 measure">Apply these to us and to everyone else you visit. They are deliberately concrete.</p>
    <div class="grid grid--3 mt-5">
      <div class="card"><p class="eyebrow">01</p><p class="h4 mt-2">Who performs the surgery</p><p class="body-s mt-2">Ask by name and qualification who makes the recipient sites, who extracts and who places grafts. Ask for the medical council registration and check it independently. Vague terms like "expert" are not qualifications.</p></div>
      <div class="card"><p class="eyebrow">02</p><p class="h4 mt-2">Whether your donor was measured</p><p class="body-s mt-2">The graft number should come from a measured donor density and a mapped recipient area. A number produced from a photograph has no basis, and every rupee in the quote rests on it.</p></div>
      <div class="card"><p class="eyebrow">03</p><p class="h4 mt-2">What you get in writing</p><p class="body-s mt-2">An itemised estimate stating the graft number, the technique, what is included and what is not. You should be able to take it away and think about it without a discount expiring.</p></div>
      <div class="card"><p class="eyebrow">04</p><p class="h4 mt-2">Whether you were told the risks</p><p class="body-s mt-2">Shedding, an uneven early phase, the twelve-month timeline, the possibility of a second session, and what happens if growth is poor. A consultation that covered only benefits was a sales meeting.</p></div>
      <div class="card"><p class="eyebrow">05</p><p class="h4 mt-2">Whether they will say no</p><p class="body-s mt-2">Ask directly what would make them decline to operate. A clinic that has no answer either does not turn anyone down or has not thought about it. Unstable loss and active scalp conditions should both feature.</p></div>
      <div class="card"><p class="eyebrow">06</p><p class="h4 mt-2">What follow-up looks like</p><p class="body-s mt-2">Who you see afterwards, when, and whether reviews are included. Hair takes a year to declare itself, and a clinic whose interest ends on the day of surgery is a clinic you will be alone with at month six.</p></div>
    </div>
    <p class="body mt-6 measure">The full question list, and what to do at each stage from first enquiry to signing, is on our guide to <a href="/how-to-choose-hair-transplant-clinic">how to choose a hair transplant clinic</a>.</p>
  </div>
</section>

<section class="section section--canvas" id="honest">
  <div class="wrap">
    <p class="eyebrow">Straight answers</p>
    <h2 class="h2 mt-2">What This Clinic Is, and What It Is Not</h2>
    <p class="body-l mt-3 measure">Applying our own criteria to ourselves, including the parts that lose us enquiries.</p>
    <div class="grid grid--2 mt-5">
      <div class="card card--pad-lg">
        <p class="h4">What we are</p>
        <?= ticks([
            'A single-doctor clinic in Sector 39, Gurugram',
            'Led by a dermatologist who assesses and operates',
            'Continuity — the same person from first visit to final review',
            'Donor measured and mapped before any number is quoted',
            'Itemised written estimates with no expiry',
            'Willing to recommend medical treatment over surgery',
        ], false) ?>
      </div>
      <div class="card card--pad-lg">
        <p class="h4">What we are not</p>
        <?= ticks([
            'A high-volume centre with immediate availability',
            'A clinic that publishes headline or package prices',
            'Willing to quote a graft number from a photograph',
            'Able to guarantee density, coverage or an outcome',
            'Willing to operate on unstable loss or active disease',
            'The cheapest quote you will receive',
        ], false) ?>
      </div>
    </div>
    <div class="card card--pad-lg mt-6">
      <p class="eyebrow">Who we are genuinely not right for</p>
      <h3 class="h3 mt-2">Said plainly, because it saves everyone a wasted visit</h3>
      <p class="body mt-3 measure">If you want a date this week, a fixed package price quoted over the phone, or a guaranteed graft count agreed before an examination, we will not be able to help and you will find clinics that will. If you have active alopecia areata or hair loss that is still moving rapidly, we will recommend treating that first, which is not the answer most people arrive hoping for.</p>
      <p class="body mt-3 measure">If what you want is one doctor who examines you properly, tells you what your donor can actually support, and puts it in writing without pressure, that is what this clinic is built to do.</p>
    </div>
  </div>
</section>

<section class="section section--ink" id="red-flags">
  <div class="wrap">
    <p class="eyebrow" style="color:var(--accent)">Warning signs</p>
    <h2 class="h2 mt-2" style="color:#fff">What Should Make You Leave</h2>
    <p class="body-l mt-3" style="color:rgba(255,255,255,.72);max-width:60ch">These apply anywhere, including here. If you encounter them with us, say so.</p>
    <div class="grid grid--3 mt-6">
      <div class="card card--ink"><p class="h4" style="color:#fff">A quote without an examination</p><p class="body-s mt-2">A graft number produced from a photograph is a sales figure. Donor density cannot be assessed from an image.</p></div>
      <div class="card card--ink"><p class="h4" style="color:#fff">A price that expires today</p><p class="body-s mt-2">Time-limited discounts on irreversible surgery exist to prevent you thinking about it. That is the whole function.</p></div>
      <div class="card card--ink"><p class="h4" style="color:#fff">A guaranteed result</p><p class="body-s mt-2">No clinic can guarantee density or coverage. An offer of one tells you what kind of business you are in.</p></div>
      <div class="card card--ink"><p class="h4" style="color:#fff">Evasion about who operates</p><p class="body-s mt-2">If you cannot get a clear, immediate answer about who performs which part, that is the answer.</p></div>
      <div class="card card--ink"><p class="h4" style="color:#fff">Surgery offered for active disease</p><p class="body-s mt-2">Being offered a transplant with active alopecia areata or an inflamed scalp is a serious warning sign.</p></div>
      <div class="card card--ink"><p class="h4" style="color:#fff">Only benefits discussed</p><p class="body-s mt-2">No mention of shedding, the twelve-month wait, or the possibility of a second session means the risks conversation did not happen.</p></div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Why this page argues that the question is unanswerable: patients arrive having read a dozen sites that all claim to be the best, and the effect is that the claim stops carrying meaning and the decision gets made on price or on proximity instead. The things that actually determine whether someone is happy in ten years — who held the instruments, whether the donor was read correctly, whether the hairline suited the face they will have at fifty — are all checkable at a consultation. Directing people to check them, here and elsewhere, is more useful than adding another superlative.'
) ?>

<section class="section section--white" id="second-opinion">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Before you commit</p>
        <h2 class="h2 mt-2">Get a Second Opinion, Including on Us</h2>
        <p class="body-l mt-3 measure">A hair transplant is irreversible and it spends a resource you cannot replace. For a decision with those properties, seeing more than one clinic is ordinary prudence rather than distrust, and no reasonable practitioner will be offended by it.</p>
        <p class="body-l mt-3 measure">The comparison that tells you the most is the graft number. If two clinics examine the same head and propose substantially different counts, one of them has read your donor differently, and understanding why is worth more than either quote. Ask each of them to explain the basis for their number.</p>
        <p class="body-l mt-3 measure">The second most informative comparison is the hairline. Ask each clinic to draw the line they propose. A clinic willing to place it markedly lower than the others is not being more generous with you; it is making a decision you will live with permanently.</p>
        <p class="body mt-3 measure">If you have already been quoted elsewhere, bring the quote and the proposed graft number with you. We will tell you what we would do differently and why, including when the honest answer is that their plan is reasonable.</p>
      </div>
      <div>
        <div class="card card--pad-lg">
          <p class="h4">Bring to a second opinion</p>
          <?= ticks([
              'The written quote and graft number',
              'The proposed technique and any staging',
              'Photographs of the hairline drawn on you',
              'Your medication list and any test results',
          ], false) ?>
        </div>
        <div class="card card--pad-lg mt-4">
          <p class="h4">Also worth reading</p>
          <p class="body-s mt-2"><a href="/how-to-choose-hair-transplant-clinic">How to choose a clinic</a> — the full decision process.</p>
          <p class="body-s mt-3"><a href="/hair-transplant-cost-in-gurgaon">Hair transplant cost</a> — how pricing actually works.</p>
          <p class="body-s mt-3"><a href="/hair-transplant-risks-and-side-effects">Risks and side effects</a> — what should be discussed with you.</p>
          <p class="body-s mt-3"><a href="/dr-nyra">About Dr. Nyra</a> — qualifications, in full.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Choosing a Clinic — FAQs</h2>
        <p class="body-s mt-3">General guidance for assessing any clinic, including this one. Bring these questions to your consultation.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= awards_certificates_section() ?>

<?= local_block(
    'Where We Are, and Who You Will See',
    'One clinic in Sector 39, Gurugram. Consultation, surgery and every follow-up happen in the same place with the same doctor. Patients travel to us from across Gurugram, South Delhi and the wider NCR.'
) ?>

<?= cta_band(
    'Come and Apply These Criteria to Us',
    'Bring the questions on this page. Ask who operates, how the graft number was reached, and what would make us decline. You will leave with an itemised written estimate and no pressure to book a date on the day.',
    'best-clinic',
    ['First consultation', 'Second opinion on a quote', 'Comparing clinics', 'Not sure — please advise']
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
