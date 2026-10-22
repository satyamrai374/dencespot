<?php
/**
 * /beard-transplant-gurgaon — page #20.
 *
 * URL deliberately matches the live one rather than the /-in-gurgaon pattern
 * used elsewhere: keeping it avoids a 301 and its recovery window on a page
 * that already ranks. Content ported from the design build.
 *
 * Cannibalisation split: this page owns "beard transplant in Gurgaon";
 * /beard-transplant-cost-gurgaon owns the pricing query. No price table here.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$faqs = [
    ['q' => 'What is a beard transplant?',
     'a' => 'A procedure that moves your own follicles from the back and sides of the scalp into the beard area — cheeks, jawline, chin, moustache or sideburns — placed at the flat angle and the direction facial hair grows in each zone. It redistributes hair you already have rather than creating new hair.'],
    ['q' => 'Where does the donor hair come from?',
     'a' => 'Almost always the back and sides of your own scalp, because that hair is generally resistant to the hormonal process behind pattern hair loss. In selected cases hair from under the chin or the neck can be used. Donor hair from another person is not used.'],
    ['q' => 'Am I a suitable candidate?',
     'a' => 'Typically someone whose facial hair pattern has settled, who has enough scalp donor supply to spare, whose beard-area skin is healthy, and who has realistic expectations about density. Active alopecia areata, an unsettled skin condition, an immature scar or a limited donor area mean treatment or time comes first. Candidacy is decided after examination.'],
    ['q' => 'How many grafts does a beard transplant need?',
     'a' => 'It depends entirely on the zones being treated, how much native growth is already there and the density being aimed for. Filling a couple of patches is a very different number from building a full beard, and both are mapped zone by zone at the assessment against what the donor area can safely give. Any figure offered before an examination is a guess, not a plan.'],
    ['q' => 'Is a beard transplant painful?',
     'a' => 'The local anaesthetic injections are the uncomfortable part; the procedure itself is not typically painful. Mild soreness, tightness and facial swelling for a few days afterwards is normal and managed with prescribed medication. Pain tolerance varies between patients.'],
    ['q' => 'How long does the procedure take?',
     'a' => 'It scales with graft numbers. A limited patch correction takes a few hours; a larger beard reconstruction runs through most of the day with breaks. It is a day-case procedure — you go home the same day.'],
    ['q' => 'How long is the recovery, and how visible is it?',
     'a' => 'Most people return to desk work within a few days, but unlike a scalp procedure this one is on your face and cannot be covered by a cap. Small crusts sit around each graft for roughly the first week and settle over the weeks after. Plan the timing around anything client-facing.'],
    ['q' => 'When can I shave or trim my beard again?',
     'a' => 'Trimming is usually cleared before shaving with a razor is, and both are cleared by your doctor at a review rather than on a fixed schedule — it depends on how the grafts have healed. Shaving too early can disturb grafts that are not yet secure.'],
    ['q' => 'When will I see results?',
     'a' => 'Transplanted hairs commonly shed within the first weeks while the follicles remain in place. New growth usually begins around three to four months, with a fuller picture at roughly ten to twelve months. Growth is uneven early on and texture improves as the hairs mature.'],
    ['q' => 'Is a beard transplant permanent?',
     'a' => 'Transplanted follicles keep the characteristics of the donor area and generally persist, and because they came from the scalp they keep growing and need trimming. Native beard hair around them can still change with age. No clinic can guarantee a specific density or a permanent outcome.'],
    ['q' => 'Will it look natural?',
     'a' => 'That is decided by three things: the angle each graft is set at, single-hair grafts along every visible border, and a density target that matches a real beard rather than a scalp. Get those right and the result reads as your own beard. Get the angle wrong and it bristles — which is why the design is agreed before surgery rather than improvised during it.'],
    ['q' => 'How much does a beard transplant cost in Gurgaon?',
     'a' => 'Cost depends on the zones treated, graft numbers, technique, complexity and any supporting treatment, so we quote after the assessment rather than publishing a headline price. You receive an itemised written estimate before booking a date. Our <a href="/hair-transplant-cost-in-gurgaon">guide to how treatment is priced</a> explains what moves the number.'],
    ['q' => 'Can a beard transplant cover acne scars or a surgical scar?',
     'a' => 'Grafting into stable scar tissue is possible and is done for surgical, accidental, burn and cleft-lip scars. Scar tissue has a poorer blood supply than normal skin, so graft survival can be lower and a second session is more often needed. The scar must be mature, and expectations are set explicitly before booking.'],
    ['q' => 'Does it work for alopecia areata patches in the beard?',
     'a' => 'Not while the condition is active — patches can regrow on their own with medical treatment, and grafts placed into an active patch can be lost. Alopecia areata is treated and observed first, and surgery is only considered where the condition has been stable for a sustained period. See <a href="/hair-fall-treatment-in-gurgaon">alopecia areata treatment</a>.'],
    ['q' => 'Can beard hair be used for a scalp transplant instead?',
     'a' => 'In selected cases, yes — beard hair is coarser than scalp hair and is generally used as a supplementary donor source for density in the crown or in repair work, not for a hairline. It is assessed individually, and it means accepting extraction marks in the beard area.'],
    ['q' => 'Can I have a beard transplant and a hair transplant together?',
     'a' => 'Sometimes, but both draw on the same donor area, so it is a question of arithmetic rather than scheduling. Where donor supply is limited, the two are prioritised over time — and if covering your scalp later matters more to you, that is said before the beard is planned, not afterwards. See <a href="/hair-transplant-in-gurgaon">hair transplant in Gurgaon</a>.'],
    ['q' => 'What happens during the consultation?',
     'a' => 'History and medication review, examination of the beard area and the scalp donor area, mapping of existing growth zone by zone, the design drawn on your face for you to approve, photographs for your record, and a written plan covering technique, approximate graft number, timeline and cost factors.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Treatments', 'url' => '/hair-transplant-in-gurgaon'],
    ['name' => 'Beard transplant in Gurgaon'],
];

$page = [
    'title'       => 'Beard Transplant in Gurgaon | DenceSpot Clinic',
    'description' => 'Beard transplant in Gurgaon by Dr. Nyra. Scalp grafts placed at the natural facial angle to fill patchy zones, thin sideburns and scarred areas.',
    'url'         => '/beard-transplant-gurgaon',
    'crumbs'      => $crumbs,
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        schema_procedure('/beard-transplant-gurgaon', [
            'name'          => 'Beard Transplant',
            'alternateName' => ['Beard hair transplant', 'Facial hair transplant', 'Moustache transplant'],
            'procedureType' => 'https://schema.org/SurgicalProcedure',
            'bodyLocation'  => 'Face (cheeks, jawline, chin, moustache, sideburns)',
            'howPerformed'  => 'Follicular units are extracted from the occipital scalp donor area by FUE and placed into the beard area at the acute angle and direction of facial hair, using single-hair grafts along visible borders. Performed as a day case under local anaesthetic.',
            'preparation'   => 'Clinical assessment of facial hair pattern and scalp donor supply, review of medical history and medication, beard design drawn on the patient\'s face and agreed before surgery.',
            'followup'      => 'Written aftercare instructions covering washing, trimming and shaving, with photographic progress reviews through the first twelve months.',
            'expectedPrognosis' => 'Transplanted hairs commonly shed within the first weeks; new growth typically begins around three to four months with a fuller result at approximately ten to twelve months. Outcomes vary between patients and are not guaranteed.',
        ]),
        schema_faq('/beard-transplant-gurgaon', $faqs),
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="wrap">
    <div class="split">
      <div>
        <span class="pill pill--dot">Beard transplant in Gurgaon</span>
        <h1 class="h1 mt-3">Beard Transplant in Gurgaon for a Fuller, Natural Beard Line</h1>
        <p class="lead mt-3 measure">A beard transplant moves your own scalp follicles into patchy cheeks, a thin jawline, a gappy moustache or a scarred area. What separates a beard that reads as yours from one that reads as work done is the angle: facial hair lies far flatter against the skin than scalp hair, and every graft has to be set to match it. The doctor who designs your beard on your own face is the doctor who places the grafts.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Beard mapped on your face before anything is quoted',
            'Single-hair grafts along every visible border',
            'FUE and DHI performed at the clinic',
            NAP_LOCALITY . ' · ' . HOURS_DISPLAY,
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow"><img src="/assets/img/clinic-facade.jpg" alt="DenceSpot Clinic shopfront on Sector 39 Road, Jharsa, Gurugram, showing the hair transplant and PRP treatment signage" width="800" height="1000" loading="eager"></div>
        <div class="hero__badge-card">
          <p class="eyebrow">Performed &amp; reviewed by</p>
          <p class="h4 mt-1"><?= doctor_name() ?></p>
          <p class="meta"><?= doctor_credit() ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="trust">
  <div class="wrap">
    <div class="grid grid--5">
      <div class="card"><?= icon('shield', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Doctor-led consultation</p><p class="meta mt-1">Assessed and designed by the treating doctor.</p></div>
      <div class="card"><?= icon('beard', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Angle-matched placement</p><p class="meta mt-1">Each graft set to the flat lie of facial hair.</p></div>
      <div class="card"><?= icon('list', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Density that suits a beard</p><p class="meta mt-1">Beards are not scalps — over-packing shows.</p></div>
      <div class="card"><?= icon('heart', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Donor spent carefully</p><p class="meta mt-1">Beard grafts come out of a lifetime supply.</p></div>
      <div class="card"><?= icon('chat', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Written plan &amp; follow-ups</p><p class="meta mt-1">Estimate in writing, reviews already scheduled.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="what-is">
  <div class="wrap">
    <div class="split split--wide-left">
      <div>
        <p class="eyebrow">The basics, plainly</p>
        <h2 class="h2 mt-2">What Is a Beard Transplant?</h2>
        <div class="stack mt-4 measure">
          <p class="body-l">A beard transplant takes follicles from the back and sides of your scalp and places them into the beard area — cheeks, jawline, chin, moustache, sideburns, or a scar that will not grow hair. It is the same extraction technique used for a scalp <a href="/hair-transplant-in-gurgaon">hair transplant in Gurgaon</a>. What changes completely is the design.</p>
          <p class="body-l">Scalp hair stands up from the skin. Facial hair lies almost flat against it, and the direction shifts across the face — sweeping down the cheek, fanning outward along the jaw, pointing inward under the chin, downward across the upper lip. Recipient sites have to be made to match that lie zone by zone. Grafts placed at a scalp angle stick out, and no amount of trimming hides it.</p>
          <p class="body-l">Density is the second difference. A natural beard is far less dense than a scalp, and the borders — the cheek line, the moustache edge, the sideburn — are made of single hairs, not clusters. Over-packing a beard produces the tufted, doll-like look people recognise instantly, and it spends donor hair that cannot be replaced — the same finite supply a future <a href="/hair-transplant-in-gurgaon">scalp hair transplant</a> would need.</p>
          <p class="body-l">Once healed, the transplanted hairs behave like the scalp hair they came from. They keep growing, so they need trimming. They can be shaved, shaped and grown out normally.</p>
        </div>
      </div>
      <div class="stack">
        <div class="media ratio-4-3 media--shadow"><img src="/assets/img/case-uttam-gurgaon.jpg" alt="Before and after a hair transplant at DenceSpot Clinic, Sector 39 Gurugram — hairline and temple restoration, 2,400 grafts by FUE" width="800" height="600" loading="lazy"></div>
        <div class="card">
          <p class="eyebrow" style="color:var(--ink-muted)">In one line</p>
          <p class="body mt-2">Scalp hair, relocated to your face and set to grow the way a beard grows. The extraction is routine; the angle and the density are where the result is won or lost.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="areas">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Zone by zone</p>
      <h2 class="h2 mt-2">Areas a Beard Transplant Can Treat</h2>
      <p class="body mt-3">Most cases are not “a beard” — they are one or two specific zones that never filled in. Each has its own angle, its own density target and its own difficulty.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--tint card--pad-lg"><span class="pill">Most requested</span><h3 class="h3 mt-3">Patchy cheeks</h3><p class="body-s mt-2">Bare or thin patches high on the cheek, often with a strong moustache and chin below them. Filling the gap so it blends into existing growth is the commonest reason men come in.</p></div>
      <div class="card card--tint card--pad-lg"><span class="pill">Definition</span><h3 class="h3 mt-3">Cheek line &amp; jawline</h3><p class="body-s mt-2">Building a clean upper border across the cheek and carrying density down the jaw. The cheek line is the most visible edge on a beard, so it is drawn on your face and agreed before a graft is placed.</p></div>
      <div class="card card--tint card--pad-lg"><span class="pill">Connection</span><h3 class="h3 mt-3">Moustache &amp; goatee</h3><p class="body-s mt-2">Thin upper-lip growth, a gap between moustache and chin, or a goatee that will not close. Upper-lip hair points sharply downward and the skin is mobile, so it is placed with particular care.</p></div>
      <div class="card card--tint card--pad-lg"><span class="pill">Framing</span><h3 class="h3 mt-3">Sideburns</h3><p class="body-s mt-2">Rebuilding or extending sideburns, including cases where a previous scalp procedure left the temple and sideburn out of proportion with each other.</p></div>
      <div class="card card--tint card--pad-lg"><span class="pill">Camouflage</span><h3 class="h3 mt-3">Scars in the beard area</h3><p class="body-s mt-2">Grafting into a stable scar — surgical, accidental, burn or cleft-lip repair — so growing hair breaks up the line. Scar tissue has a poorer blood supply, so expectations and graft survival are discussed openly first.</p></div>
      <div class="card card--tint card--pad-lg"><span class="pill">Selected cases</span><h3 class="h3 mt-3">Full beard reconstruction</h3><p class="body-s mt-2">Building a beard where there is very little native growth. It is the largest ask on the donor area, is often staged across sessions, and is only planned where scalp donor supply genuinely allows it.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="candidacy">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">Suitability</p>
        <h2 class="h2 mt-2">Who May Consider a Beard Transplant?</h2>
        <p class="body mt-3">Beard growth is largely genetic and settles with age, which is why this is usually a straightforward decision once two things check out: your facial growth has stopped changing, and your scalp donor area can afford the grafts. What that costs, and how the graft count is arrived at, is set out on our <a href="/hair-transplant-cost-in-gurgaon">cost page</a>.</p>
        <p class="body mt-3">Suitability is decided after examination, not from a photograph.</p>
        <a class="btn btn--ink mt-4" href="/book-consultation">Book an assessment</a>
      </div>
      <div class="grid grid--2">
        <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Patchy or uneven growth</h3><p class="body-s mt-2">Beard hair that comes in thick in some zones and barely at all in others, leaving a beard that never looks even however long it is grown.</p></div>
        <div class="card"><?= icon('beard', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Naturally sparse density</h3><p class="body-s mt-2">Growth that is present everywhere but too thin to hold a shape — a beard that reads as stubble no matter how long it is left.</p></div>
        <div class="card"><?= icon('pencil', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Scars and gaps</h3><p class="body-s mt-2">A stable scar or a permanently bare area within the beard that you would rather cover with growing hair than with a shorter cut.</p></div>
        <div class="card"><?= icon('list', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Shaping and definition</h3><p class="body-s mt-2">A beard that grows well but sits badly — a cheek line too low, a weak jaw border, sideburns out of proportion after a previous procedure.</p></div>
        <div class="card"><?= icon('heart', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Gender-affirming facial hair</h3><p class="body-s mt-2">Facial hair as part of masculinising treatment, planned alongside your existing medical care and usually after hormone therapy has had time to show what grows on its own.</p></div>
        <div class="card card--dashed"><?= icon('info', 22, 'var(--ink-muted)') ?><h3 class="h3 mt-3">When we say wait</h3><p class="body-s mt-2">Facial hair still filling in with age, active alopecia areata or an unsettled skin condition in the beard area, a scar that has not matured, keloid-prone skin, or a donor area that cannot spare the grafts. In those cases <a href="/hair-fall-treatment-in-gurgaon">medical treatment</a> or time comes first.</p></div>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="techniques">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Techniques</p>
      <h2 class="h2 mt-2">Beard Transplant Techniques</h2>
      <p class="body mt-3">Both techniques take grafts the same way. They differ in how each graft is put into the face — which, on a beard, is the part that matters. The choice is made zone by zone, and a single case often uses both.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="card card--tint" style="padding:0;overflow:hidden">
        <div class="media ratio-16-10 media--shadow"><img src="/assets/img/clinic-equipment.jpg" alt="Motorised follicular-unit extraction handpiece and trolley unit at DenceSpot Clinic, Gurugram" width="800" height="500" loading="lazy"></div>
        <div style="padding:28px">
          <h3 class="h3" style="font-size:22px">FUE Beard Transplant</h3>
          <p class="body-s mt-3">Individual follicular units are removed one at a time from the back and sides of the scalp with a small punch, leaving dot-sized marks that settle into the surrounding hair. Recipient sites are then made across the beard at the correct angle and direction for each zone, and the grafts are placed into them.</p>
          <p class="body-s mt-3">Making the sites first lets the doctor set the entire pattern — angle, direction, spacing — and review it as a whole before placement begins. It is efficient across larger areas such as cheeks and jawline.</p>
        </div>
      </div>
      <div class="card card--tint" style="padding:0;overflow:hidden">
        <div class="media ratio-16-10 media--shadow"><img src="/assets/img/case-shukri-europe.jpg" alt="Micro-FUE hair transplant at DenceSpot Clinic, Gurugram — hairline design and 2,800 grafts photographed on the day of surgery" width="800" height="500" loading="lazy"></div>
        <div style="padding:28px">
          <h3 class="h3" style="font-size:22px">DHI Beard Transplant</h3>
          <p class="body-s mt-3">Extraction is the same. Placement is not: each graft is loaded into a fine implanter and set into untouched skin in one action, so the depth, angle and direction are fixed at the moment of placement rather than by a pre-made site.</p>
          <p class="body-s mt-3">That control is worth most along the visible edges — the cheek line, the moustache border, the sideburn — where hairs sit almost flat and a degree or two of error is noticeable at conversational distance.</p>
        </div>
      </div>
    </div>
    <div class="grid grid--2 mt-4">
      <div class="note"><p class="h4">Neither one is universally better</p><p class="body-s mt-2">Any clinic that sells one technique as the answer for every beard is selling equipment, not a plan. The reasoning behind your recommendation is explained at the consultation and written into the estimate.</p></div>
      <div class="note"><p class="h4">A note on “DHT”</p><p class="body-s mt-2">Some clinic pages advertise a “DHT beard transplant”. DHT is dihydrotestosterone, a hormone involved in hair loss — not a surgical technique. The technique meant is DHI, direct hair implantation.</p></div>
    </div>
  </div>
</section>

<section class="section section--ink" id="journey">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Step by step</p>
      <h2 class="h2 mt-2">Your Beard Transplant Journey</h2>
      <p class="body-l mt-3">From the first appointment to the review at a year. Every stage happens at the Sector 39 clinic with the same doctor.</p>
    </div>
    <div class="journey mt-6">
      <div class="card card--ink"><span class="journey__num">01</span><p class="h4 mt-1" style="color:#fff">Consultation</p><p class="meta mt-2">What you want from your beard, and what is realistic.</p></div>
      <div class="card card--ink"><span class="journey__num">02</span><p class="h4 mt-1" style="color:#fff">Facial hair assessment</p><p class="meta mt-2">Existing growth mapped zone by zone; skin checked.</p></div>
      <div class="card card--ink"><span class="journey__num">03</span><p class="h4 mt-1" style="color:#fff">Donor evaluation</p><p class="meta mt-2">What the scalp can safely give, now and later.</p></div>
      <div class="card card--ink"><span class="journey__num">04</span><p class="h4 mt-1" style="color:#fff">Beard design</p><p class="meta mt-2">Borders drawn on your face; you approve them in a mirror.</p></div>
      <div class="card card--ink"><span class="journey__num">05</span><p class="h4 mt-1" style="color:#fff">Procedure</p><p class="meta mt-2">Day case under local anaesthetic; home the same day.</p></div>
      <div class="card card--ink"><span class="journey__num">06</span><p class="h4 mt-1" style="color:#fff">Recovery &amp; aftercare</p><p class="meta mt-2">Written instructions on washing, trimming and shaving.</p></div>
      <div class="card card--ink"><span class="journey__num">07</span><p class="h4 mt-1" style="color:#fff">Progress reviews</p><p class="meta mt-2">Photographed at set intervals through the first year.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="procedure">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">On the day</p>
      <h2 class="h2 mt-2">How Does a Beard Transplant Work?</h2>
    </div>
    <div class="split split--wide-left mt-6" style="align-items:start">
      <div class="stack-sm">
        <div class="step"><span class="step-num">1</span><div><h3 class="h3">Design and marking</h3><p class="body-s mt-2">The agreed borders are redrawn on your face and checked with you sitting upright in natural light — a beard drawn on a reclined patient sits wrong when they stand up. Photographs are taken for your record.</p></div></div>
        <div class="step"><span class="step-num">2</span><div><h3 class="h3">Preparation</h3><p class="body-s mt-2">The donor strip of scalp is trimmed short and both donor and beard areas are anaesthetised locally. The injections are the uncomfortable part; after that the areas are numb.</p></div></div>
        <div class="step"><span class="step-num">3</span><div><h3 class="h3">Extraction</h3><p class="body-s mt-2">Follicular units are removed individually from the donor area. For a beard, single-hair units are separated out under magnification and reserved for the borders, where clusters would be visible.</p></div></div>
        <div class="step"><span class="step-num">4</span><div><h3 class="h3">Site creation</h3><p class="body-s mt-2">In an FUE case, recipient sites are made at the angle and direction of each zone — sweeping down the cheek, out along the jaw, in under the chin, down across the upper lip. In a DHI case this happens at the moment of placement instead.</p></div></div>
        <div class="step"><span class="step-num">5</span><div><h3 class="h3">Implantation</h3><p class="body-s mt-2">Grafts are placed one by one, singles at the edges and larger units kept to the interior where density is wanted. The pattern is deliberately irregular; a ruled edge is what makes a transplanted beard obvious.</p></div></div>
        <div class="step"><span class="step-num">6</span><div><h3 class="h3">Discharge and aftercare</h3><p class="body-s mt-2">You go home the same day with written instructions, medication where prescribed, and your first review already booked. Someone should drive you.</p></div></div>
      </div>
      <div class="stack">
        <div class="media ratio-4-3 media--shadow"><img src="/assets/img/clinic-facade.jpg" alt="DenceSpot Clinic shopfront on Sector 39 Road, Jharsa, Gurugram, showing the hair transplant and PRP treatment signage" width="800" height="600" loading="lazy"></div>
        <div class="card">
          <p class="eyebrow" style="color:var(--ink-muted)">Plan the week around it</p>
          <p class="body-s mt-2">A beard transplant is not concealable the way a scalp procedure is under a cap. Small crusts sit on the face for roughly the first week. Most patients book time when they are not client-facing.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= doctor_block(
    'Why a doctor should assess a beard, not a counsellor: patchy facial hair can be alopecia areata rather than genetics, and grafting into an active patch wastes grafts. Skin conditions in the beard area need treating first. And the donor arithmetic — beard grafts versus a scalp you may want covered at forty-five — is a medical judgement, not a sales one.'
) ?>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">Beard Transplant Cost in Gurgaon</h2>
        <p class="body mt-3 measure">Cost follows the plan, and the plan follows the assessment. A patchy-cheek correction and a full beard reconstruction are different procedures with very different graft counts, so we publish the factors that move the number and give you an itemised estimate in writing afterwards.</p>
        <div class="grid grid--2 mt-5">
          <div class="card"><p class="h4">Zones being treated</p><p class="meta mt-1">Cheeks, jaw, moustache, chin, sideburns</p></div>
          <div class="card"><p class="h4">Number of grafts</p><p class="meta mt-1">Counted from the mapped design, not estimated</p></div>
          <div class="card"><p class="h4">Existing growth</p><p class="meta mt-1">How much native hair the plan can build on</p></div>
          <div class="card"><p class="h4">Technique</p><p class="meta mt-1">FUE, DHI, or both across different zones</p></div>
          <div class="card"><p class="h4">Complexity</p><p class="meta mt-1">Scar tissue, repair work, staged sessions</p></div>
          <div class="card"><p class="h4">Supporting treatment</p><p class="meta mt-1">Any medical therapy planned alongside</p></div>
        </div>
        <p class="meta mt-4 measure">A word of caution about “per graft, starting from” pricing: a low rate applied to an inflated graft count costs more than an honest quote. Ask how the graft number was arrived at, and what is included — anaesthesia, medication, follow-up reviews.</p>
        <a class="btn btn--ink mt-4" href="/hair-transplant-cost-in-gurgaon"><?= icon('rupee', 18) ?> How our pricing works</a>
      </div>
      <div class="cta-band" style="display:block">
        <h3 class="h3" style="color:#fff">Get a Personalized Treatment Estimate</h3>
        <p class="body-s mt-2" style="color:rgba(255,255,255,.7)">Send clear photos of your cheeks, jawline and chin in daylight on WhatsApp, or request a call back. You will get an assessment appointment — not a sales pitch.</p>
        <div class="stack-sm mt-4">
          <a class="btn btn--block btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Send photos on WhatsApp</a>
          <a class="btn btn--block btn--ghost" href="/book-consultation">Request an estimate by form</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="recovery">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Recovery &amp; results</p>
      <h2 class="h2 mt-2">What Generally Happens After a Beard Transplant</h2>
      <p class="body mt-3">A general guide to the phases most patients describe. Your own timeline, and when you may trim or shave, is set by your doctor at your reviews.</p>
    </div>
    <div class="grid grid--5 mt-6">
      <div class="card"><span class="pill">Phase 1</span><h3 class="h4 mt-3">First week</h3><p class="body-s mt-2">Tiny crusts around each graft, redness and some facial swelling. No touching, picking or shaving. Washing begins only when and how you are instructed.</p></div>
      <div class="card"><span class="pill">Phase 2</span><h3 class="h4 mt-3">Crusts clear, hairs shed</h3><p class="body-s mt-2">Crusting settles over the following weeks and the transplanted hairs commonly fall out while the follicles stay in place. Expected, not a failure.</p></div>
      <div class="card"><span class="pill">Phase 3</span><h3 class="h4 mt-3">New growth</h3><p class="body-s mt-2">Fine new hairs typically appear from around three to four months, unevenly and often finer than the surrounding beard at first.</p></div>
      <div class="card"><span class="pill">Phase 4</span><h3 class="h4 mt-3">Density and texture build</h3><p class="body-s mt-2">Coverage fills in through the middle months and the hairs coarsen toward beard character. Progress is documented photographically at each review.</p></div>
      <div class="card"><span class="pill pill--ink">Phase 5</span><h3 class="h4 mt-3">Longer-term result</h3><p class="body-s mt-2">A fuller picture around ten to twelve months. Where a case was staged, or density in one zone needs topping up, a small second session is planned from here.</p></div>
    </div>
    <div class="grid grid--2 mt-4">
      <div class="note"><p class="h4">When can I shave?</p><p class="body-s mt-2">Trimming with scissors or a guarded trimmer is usually permitted before a razor is, and both are cleared by your doctor at a review rather than by a date on a website. Shaving too early disturbs grafts that are not yet secure.</p></div>
      <div class="note"><p class="h4">Individual outcomes vary</p><p class="body-s mt-2">Your doctor will give personalized guidance based on your treatment. The timelines here are general patient education, not a promise of results, and no density or growth rate is guaranteed.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="risks">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">Honest risks</p>
        <h2 class="h2 mt-2">Risks and Limitations You Should Hear First</h2>
        <p class="body mt-3">A beard transplant is minor surgery on the most visible part of your body. These are discussed at the consultation and again on consent; they are listed here so you can think about them before you come in.</p>
      </div>
      <div class="grid grid--2">
        <div class="card card--tint"><h3 class="h4">Folliculitis and ingrown hairs</h3><p class="body-s mt-2">Small inflamed spots around new hairs are more common in the beard than the scalp. Usually short-lived and treatable, occasionally needing medication.</p></div>
        <div class="card card--tint"><h3 class="h4">Swelling, redness, bruising</h3><p class="body-s mt-2">Facial swelling in the first days is normal and settles. It is on your face, which is why the week is planned around it.</p></div>
        <div class="card card--tint"><h3 class="h4">Numbness or tingling</h3><p class="body-s mt-2">Temporary altered sensation in the donor or beard area is common and usually resolves over weeks to months.</p></div>
        <div class="card card--tint"><h3 class="h4">Donor-area marks</h3><p class="body-s mt-2">FUE leaves small dot scars across the donor scalp. Usually hidden by surrounding hair but visible at very short clipper lengths.</p></div>
        <div class="card card--tint"><h3 class="h4">Uneven density or shock loss</h3><p class="body-s mt-2">Not every graft survives, and existing beard hair around the grafted zone can temporarily shed. Some cases need a planned top-up session.</p></div>
        <div class="card card--tint"><h3 class="h4">Texture and colour difference</h3><p class="body-s mt-2">Scalp hair is often finer and sometimes a different shade from native beard hair. It blends for most patients but the difference can remain noticeable in some.</p></div>
        <div class="card card--tint"><h3 class="h4">Poor angling is not fixable quickly</h3><p class="body-s mt-2">A beard placed at the wrong angle bristles instead of lying flat, and correcting it means further surgery. This is the argument for taking design time seriously.</p></div>
        <div class="card card--tint"><h3 class="h4">Keloid and skin-condition risk</h3><p class="body-s mt-2">Keloid-prone skin, active acne, an unsettled skin condition or active alopecia areata in the beard area may mean deferring or declining surgery.</p></div>
      </div>
    </div>
    <div class="note mt-5" style="display:flex;gap:16px;align-items:flex-start">
      <?= icon('info', 20, 'var(--accent-deep)', 1.8) ?>
      <p class="body-s">Tell your doctor about diabetes, thyroid disease, bleeding disorders, isotretinoin use, blood thinners and any history of keloid scarring at the consultation. Some of these change the plan; some change the timing; none of them are reasons to leave anything out.</p>
    </div>
  </div>
</section>

<section class="section section--canvas" id="faqs">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">FAQs</p>
        <h2 class="h2 mt-2">Beard Transplant FAQs</h2>
        <p class="body-s mt-3">Answers are general patient education. Anything specific to your beard, your donor area or your medical history is answered at the assessment.</p>
        <a class="btn btn--accent mt-4" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
      </div>
      <?= faq_list($faqs) ?>
    </div>
  </div>
</section>

<?= before_after_slider_section() ?>

<?= awards_certificates_section() ?>

<?= local_block(
    'Beard Transplant Clinic Serving Gurgaon',
    'Consultations and procedures both take place at our Sector 39 clinic in Gurugram, which keeps the whole journey — assessment, design, procedure day and every follow-up — with the same doctor and the same team. Patients travel to us from across Gurugram and neighbouring parts of South Delhi.'
) ?>

<?= cta_band(
    'Take the First Step Toward the Beard You Want',
    'Bring your questions and your concerns. You will get a clinical assessment, a beard design drawn on your own face, an honest view of whether a transplant is appropriate for you, and a written plan if it is — with no pressure to book a date on the day.',
    'beard-transplant-hub',
    ['Beard transplant — patchy cheeks', 'Beard transplant — full reconstruction', 'Moustache or goatee', 'Sideburns', 'Scar camouflage in the beard area', 'Not sure — please advise']
) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
