<?php
/**
 * /beard-transplant-gurgaon — page #20, pillar of the beard cluster.
 *
 * URL deliberately matches the live one rather than the /-in-gurgaon pattern
 * used elsewhere: keeping it avoids a 301 and its recovery window on a page
 * that already ranks. Content ported from the design build.
 *
 * Cannibalisation split: this page owns "beard transplant in Gurgaon" and the
 * "Gurugram" spelling of it; /beard-transplant-cost-gurgaon owns the pricing
 * query. No price table here — the graft table below is general patient
 * education by zone, not a quote, and carries no rupee figure. Market price
 * context lives on the cost page only.
 *
 * Sept 2026 additions, each answering a gap competitors cover and this page
 * did not: graft ranges by zone, a moustache section (Eugenix ranks a separate
 * moustache page), the right age, alternatives, donor options (incl. body
 * hair), and repair of work done elsewhere. Already the longest beard page in
 * the SERP, so new copy is kept tight — add modules, never padding.
 *
 * Oct 2026 (NMC Guidelines of 06.10.2026): no before/after, case or
 * procedure-day photographs (cl. 8.1(v)), no shopfront photograph (its signage
 * carries prohibited claims), no doctor promotion or "same doctor operates"
 * claims (cl. 8.3(ii)). Do not reinstate them.
 *
 * 14 Oct 2026: landing-page layout (lp_split / lp_steps / lp_cta in
 * includes/home-components.php; every image an AI illustration with its
 * visible label). Per the client, this Gurugram page never mentions the
 * Rohini clinic.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

/**
 * General graft ranges by zone — patient education, not a quote. Mirrored in
 * beard-transplant-cost-gurgaon.php; keep the two arrays in step.
 */
$graftZones = [
    ['zone' => 'Moustache',                       'range' => '300 – 700',          'note' => 'Single hairs along the lip border; a small area with demanding angles.'],
    ['zone' => 'Goatee / chin',                   'range' => '500 – 1,000',        'note' => 'Often planned with the moustache, to close the gap between the two.'],
    ['zone' => 'Patchy cheeks (fill)',            'range' => '500 – 1,000',        'note' => 'Lower where native hair surrounds the patches; higher where it does not.'],
    ['zone' => 'Sideburns',                       'range' => '200 – 400 per side', 'note' => 'Usually for symmetry, or to connect scalp and beard.'],
    ['zone' => 'Cheek line / jawline definition', 'range' => '800 – 1,500',        'note' => 'Sharpening an edge with growth behind it sits lower; building one sits higher.'],
    ['zone' => 'Full beard',                      'range' => '1,500 – 3,000+',     'note' => 'The largest ask on the donor area, and often staged across sessions.'],
];

$faqs = [
    ['q' => 'What is a beard transplant?',
     'a' => 'A procedure that moves your own follicles from the back and sides of the scalp into the beard area — cheeks, jawline, chin, moustache or sideburns — placed at the flat angle and the direction facial hair grows in each zone. It redistributes hair you already have rather than creating new hair.'],
    ['q' => 'Where does the donor hair come from?',
     'a' => 'Almost always the back and sides of your own scalp, because that hair is generally resistant to the hormonal process behind pattern hair loss. In selected cases hair from under the chin or the neck can be used. Donor hair from another person is not used.'],
    ['q' => 'Can body hair be used for a beard transplant?',
     'a' => 'In selected cases. Chest or other body hair is sometimes considered when scalp donor supply is limited, but the yield is lower and less predictable, and the hairs often grow finer, curlier or shorter than beard hair. It is a supplementary source rather than the main one, and its suitability is decided on examination.'],
    ['q' => 'Am I a suitable candidate?',
     'a' => 'Typically someone whose facial hair pattern has settled, who has enough scalp donor supply to spare, whose beard-area skin is healthy, and who has realistic expectations about density. Active alopecia areata, an unsettled skin condition, an immature scar or a limited donor area mean treatment or time comes first. Candidacy is decided after examination.'],
    ['q' => 'What is the right age for a beard transplant?',
     'a' => 'There is no single right birthday. Facial hair commonly keeps filling in into the mid-twenties, so it is sensible to wait until growth has visibly stopped changing. Photographs of the same zones taken a year apart are a better guide than age alone. See <a href="/blog/patchy-beard-wait-or-transplant">whether a patchy beard is worth waiting on</a>.'],
    ['q' => 'How many grafts does a beard transplant need?',
     'a' => 'It depends on the zones, existing growth and the density aimed for. As general ranges, a moustache is often 300–700 grafts, a goatee 500–1,000, sideburns 200–400 per side, and a full beard 1,500–3,000 or more, often staged. These are patient-education ranges, not a quote; your own count is mapped zone by zone at assessment.'],
    ['q' => 'How many grafts do I need for a moustache?',
     'a' => 'As a general range, often around 300 to 700 grafts, depending on whether the aim is to thicken existing growth, close the gap to the goatee, or build a moustache where very little grows. The lip border is made of single hairs, so it is detailed work. Your own figure is counted from a design drawn on your face.'],
    ['q' => 'Is a beard transplant painful?',
     'a' => 'The local anaesthetic injections are usually the most uncomfortable part. Once the area is numb, pressure and some discomfort can still be felt, and pain tolerance varies between patients. Mild soreness, tightness and facial swelling for a few days afterwards is common and managed with prescribed medication.'],
    ['q' => 'How long does the procedure take?',
     'a' => 'It scales with graft numbers. A limited patch correction takes a few hours; a larger beard reconstruction runs through most of the day with breaks. It is a day-case procedure — you go home the same day.'],
    ['q' => 'How long is the recovery, and how visible is it?',
     'a' => 'Most people return to desk work within a few days, but unlike a scalp procedure this one is on your face and cannot be covered by a cap. Small crusts sit around each graft for roughly the first week and settle over the weeks after. Plan the timing around anything client-facing.'],
    ['q' => 'When can I shave or trim my beard again?',
     'a' => 'Trimming is usually cleared before shaving with a razor is, and both are cleared by your doctor at a review rather than on a fixed schedule — it depends on how the grafts have healed. Shaving too early can disturb grafts that are not yet secure.'],
    ['q' => 'When will I see results?',
     'a' => 'Transplanted hairs commonly shed within the first weeks while the follicles remain in place. New growth usually begins around three to four months, with a fuller picture at roughly ten to twelve months. Growth is uneven early on and texture improves as the hairs mature.'],
    ['q' => 'Will I need a second session?',
     'a' => 'Not always. One session is often enough for a patch, a moustache or a goatee. A second is more likely when a full beard is built from very little growth, when scar tissue is involved, or when one zone needs topping up after the first result matures at around a year. Where it is likely, you are told before the first.'],
    ['q' => 'Is a beard transplant permanent?',
     'a' => 'Transplanted follicles keep the characteristics of the donor area and generally persist, and because they came from the scalp they keep growing and need trimming. Native beard hair around them can still change with age. No clinic can promise a specific density or a permanent outcome.'],
    ['q' => 'Will it look natural?',
     'a' => 'How it looks depends mainly on three things: the angle each graft is set at, single-hair grafts along every visible border, and a density target that matches a real beard rather than a scalp. Get the angle wrong and it bristles — which is why the design is agreed before surgery rather than improvised during it. Results vary between patients, and no particular appearance can be promised.'],
    ['q' => 'How much does a beard transplant cost in Gurgaon?',
     'a' => 'Cost depends on the zones treated, graft numbers, technique, complexity and any supporting treatment, so we quote after the assessment rather than publishing a headline price. You receive an itemised written estimate before booking a date. Our <a href="/beard-transplant-cost-gurgaon">beard transplant cost guide</a> explains graft counts by zone, what Gurgaon clinics advertise, and what moves the number.'],
    ['q' => 'Can a beard transplant cover acne scars or a surgical scar?',
     'a' => 'Grafting into stable scar tissue is possible and is done for surgical, accidental, burn and cleft-lip scars. Scar tissue has a poorer blood supply than normal skin, so graft survival can be lower and a second session is more often needed. The scar must be mature, and expectations are set explicitly before booking.'],
    ['q' => 'Does it work for alopecia areata patches in the beard?',
     'a' => 'Not while the condition is active — patches can regrow on their own with medical treatment, and grafts placed into an active patch can be lost. Alopecia areata is treated and observed first, and surgery is only considered where the condition has been stable for a sustained period. See <a href="/alopecia-areata-treatment-in-gurgaon">alopecia areata treatment</a>.'],
    ['q' => 'Is minoxidil an alternative to a beard transplant?',
     'a' => 'For some men it is worth trying first. Topical minoxidil is used off-label on the beard; the evidence is modest, gains are often limited, and results usually need continued use to hold. It cannot create follicles where none exist, such as in a scar. Start it with medical advice, because skin irritation is possible.'],
    ['q' => 'Can beard hair be used for a scalp transplant instead?',
     'a' => 'In selected cases, yes — beard hair is coarser than scalp hair and is generally used as a supplementary donor source for density in the crown or in repair work, not for a hairline. It is assessed individually, and it means accepting extraction marks in the beard area.'],
    ['q' => 'Can I have a beard transplant and a hair transplant together?',
     'a' => 'Sometimes, but both draw on the same donor area, so it is a question of arithmetic rather than scheduling. Where donor supply is limited, the two are prioritised over time — and if covering your scalp later matters more to you, that is said before the beard is planned, not afterwards. See <a href="/hair-transplant-in-gurgaon">hair transplant in Gurgaon</a>.'],
    ['q' => 'Can PRP be combined with a beard transplant?',
     'a' => 'It can be discussed as an adjunct at the consultation, but it is not a routine part of every plan. Evidence for PRP alongside hair transplantation is mixed and comes mostly from scalp studies, so it should not be presented as improving graft survival or speeding growth. If suggested, it appears as a separate line on your written estimate.'],
    ['q' => 'Can a failed beard transplant be corrected?',
     'a' => 'Often it can be improved, though rarely erased. Wrongly angled or tufted grafts can sometimes be extracted and re-placed, and single-hair grafts can soften a hard edge. Pitting is harder to correct, and donor hair already taken cannot be put back. Repair waits until earlier work has matured, generally around a year. See <a href="/hair-transplant-repair-in-gurgaon">hair transplant repair</a>.'],
    ['q' => 'What happens during the consultation?',
     'a' => 'History and medication review, examination of the beard area and the scalp donor area, mapping of existing growth zone by zone, the design drawn on your face for you to approve, photographs for your record, and a written plan covering technique, approximate graft number, timeline and cost factors.'],
];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Beard transplant in Gurgaon'],
];

$page = [
    'title'       => 'Beard Transplant in Gurgaon: Grafts & Cost | DenceSpot',
    'description' => 'Beard transplant in Gurgaon (Gurugram): graft ranges by zone, moustache work, donor options, the right age, alternatives, risks and repair work.',
    'url'         => '/beard-transplant-gurgaon',
    'crumbs'      => $crumbs,
    'preload_image' => '/assets/img/services/svc-beard-768.webp',
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
            'expectedPrognosis' => 'Transplanted hairs commonly shed within the first weeks; new growth typically begins around three to four months with a fuller result at approximately ten to twelve months. Outcomes vary between patients and cannot be promised.',
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
        <span class="pill pill--dot">Beard transplant · Gurgaon &amp; Gurugram</span>
        <h1 class="h1 mt-3">Beard Transplant in Gurgaon for Patchy, Thin or Scarred Beard Areas</h1>
        <p class="lead mt-3 measure">A beard transplant moves your own scalp follicles into patchy cheeks, a thin jawline, a gappy moustache or a scarred area. Much of how the result looks comes down to the angle: facial hair lies far flatter against the skin than scalp hair, and every graft has to be set to match it. At our Sector 39 clinic in Gurugram, consultations and procedures are carried out by registered medical practitioners, and the beard design is drawn on your own face and agreed before surgery.</p>

        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-treatment="Beard transplant" data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> Talk on WhatsApp</a>
        </div>

        <?= ticks([
            'Beard mapped on your face before anything is quoted',
            'Single-hair grafts along every visible border',
            'FUE and DHI performed at the clinic',
            'At our clinic in Sector 39, Gurugram',
        ]) ?>
      </div>

      <div class="hero__figure">
        <div class="media ratio-4-5 media--shadow">
          <img src="/assets/img/services/svc-beard-768.webp" srcset="/assets/img/services/svc-beard-512.webp 512w, /assets/img/services/svc-beard-768.webp 768w" sizes="(min-width: 1080px) 520px, 100vw" alt="AI-generated illustration: a wooden comb and a wooden beard brush lying on a folded green cloth" width="768" height="960" loading="eager" fetchpriority="high">
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
      <div class="card"><?= icon('shield', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Doctor-led consultation</p><p class="meta mt-1">Assessment and beard design by a doctor.</p></div>
      <div class="card"><?= icon('beard', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Angle-matched placement</p><p class="meta mt-1">Each graft set to the flat lie of facial hair.</p></div>
      <div class="card"><?= icon('list', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Density that suits a beard</p><p class="meta mt-1">Beards are not scalps — over-packing shows.</p></div>
      <div class="card"><?= icon('heart', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Donor spent carefully</p><p class="meta mt-1">Beard grafts come out of a lifetime supply.</p></div>
      <div class="card"><?= icon('chat', 22, 'var(--accent-deep)') ?><p class="h4 mt-2">Written plan &amp; follow-ups</p><p class="meta mt-1">Estimate in writing, reviews already scheduled.</p></div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-follicle',
    'alt'     => 'a sculpted cross-section of scalp skin showing hair follicles beneath the surface',
    'eyebrow' => 'The basics, plainly',
    'title'   => 'What Is a Beard Transplant?',
    'id'      => 'what-is',
    'html'    => '<p>A beard transplant takes follicles from the back and sides of your scalp and places them into the beard area — cheeks, jawline, chin, moustache, sideburns, or a scar that will not grow hair. The extraction is the one used for a scalp <a href="/hair-transplant-in-gurgaon">hair transplant in Gurgaon</a>; what changes completely is the design.</p>'
               . '<p>Facial hair lies almost flat against the skin, and its direction shifts across the face — down the cheek, out along the jaw, in under the chin, down across the upper lip. Every recipient site is made to match that lie; grafts set at a scalp angle stick out, and no amount of trimming hides it.</p>'
               . '<p>A natural beard is also far less dense than a scalp, and its borders are single hairs. Over-packing gives the tufted, doll-like look people recognise instantly, and spends donor hair a future <a href="/hair-transplant-in-gurgaon">scalp hair transplant</a> would need. How closely the result reads as a beard is covered in <a href="/blog/beard-transplant-what-to-expect">what to realistically expect from a beard transplant</a>.</p>',
    'points'  => [
        'Scalp hair, relocated and set to grow the way a beard grows',
        'Once healed, it keeps growing and needs trimming like the rest of your beard',
        'It can be shaved, shaped and grown out normally',
        'The extraction is routine; angle and density decide the result',
    ],
]) ?>

<section class="section section--canvas" id="areas">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Zone by zone</p>
      <h2 class="h2 mt-2">Areas a Beard Transplant Can Treat</h2>
      <p class="body mt-3">Most cases are not “a beard” — they are one or two specific zones that never filled in. Each has its own angle, its own density target and its own difficulty.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--tint card--pad-lg"><span class="pill">Common</span><h3 class="h3 mt-3">Patchy cheeks</h3><p class="body-s mt-2">Bare or thin patches high on the cheek, often with a strong moustache and chin below them. Filling the gap so it blends into existing growth is one of the commonest reasons for a beard transplant.</p></div>
      <div class="card card--tint card--pad-lg"><span class="pill">Definition</span><h3 class="h3 mt-3">Cheek line &amp; jawline</h3><p class="body-s mt-2">Building a clean upper border across the cheek and carrying density down the jaw. The cheek line is the most visible edge on a beard, so it is drawn on your face and agreed before a graft is placed.</p></div>
      <div class="card card--tint card--pad-lg"><span class="pill">Connection</span><h3 class="h3 mt-3">Moustache &amp; goatee</h3><p class="body-s mt-2">Thin upper-lip growth, a gap between moustache and chin, or a goatee that will not close. Upper-lip hair points sharply downward and the skin is mobile, so it is placed with particular care — see <a href="#moustache">moustache transplant</a>.</p></div>
      <div class="card card--tint card--pad-lg"><span class="pill">Framing</span><h3 class="h3 mt-3">Sideburns</h3><p class="body-s mt-2">Rebuilding or extending sideburns, including cases where a previous scalp procedure left the temple and sideburn out of proportion with each other.</p></div>
      <div class="card card--tint card--pad-lg"><span class="pill">Camouflage</span><h3 class="h3 mt-3">Scars in the beard area</h3><p class="body-s mt-2">Grafting into a stable scar — surgical, accidental, burn or cleft-lip repair — so growing hair breaks up the line. Scar tissue has a poorer blood supply, so expectations and graft survival are discussed openly first.</p></div>
      <div class="card card--tint card--pad-lg"><span class="pill">Selected cases</span><h3 class="h3 mt-3">Full beard reconstruction</h3><p class="body-s mt-2">Building a beard where there is very little native growth. It is the largest ask on the donor area, is often staged across sessions, and is only planned where scalp donor supply genuinely allows it.</p></div>
    </div>
  </div>
</section>

<section class="section section--white" id="grafts">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Graft ranges by zone</p>
      <h2 class="h2 mt-2">How Many Grafts Does a Beard Transplant Need?</h2>
      <p class="body mt-3">It depends on the zone, the native growth already there and the density wanted. These are general patient-education ranges, not a quote: your own count comes from a design mapped on your face and checked against what your donor area can spare.</p>
    </div>
    <div class="card mt-6" style="padding:0;overflow:hidden">
      <div class="table-scroll">
        <table class="data" style="min-width:720px">
          <caption class="sr-only">General beard transplant graft ranges by zone — patient education, not a quote</caption>
          <thead>
            <tr><th scope="col">Zone</th><th scope="col">General graft range</th><th scope="col">What moves it</th></tr>
          </thead>
          <tbody>
            <?php foreach ($graftZones as $z): ?>
            <tr>
              <th scope="row" style="color:var(--ink);font-size:15px;font-weight:700;text-transform:none;letter-spacing:0"><?= e($z['zone']) ?></th>
              <td style="font-weight:600;color:var(--ink);white-space:nowrap"><?= e($z['range']) ?></td>
              <td><?= e($z['note']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="grid grid--2 mt-4">
      <div class="note"><p class="h4">Ranges do not simply add up</p><p class="body-s mt-2">Zones share borders, so combined plans usually need fewer grafts than the ranges added together. Existing growth lowers every figure.</p></div>
      <div class="note"><p class="h4">Grafts drive the cost</p><p class="body-s mt-2">Beard work uses more single-hair grafts than scalp work. How counts become a quote is set out in <a href="/beard-transplant-cost-gurgaon">beard transplant cost in Gurgaon</a>.</p></div>
    </div>
  </div>
</section>

<section class="section section--canvas" id="moustache">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Upper lip</p>
      <h2 class="h2 mt-2">Moustache Transplant</h2>
      <div class="stack mt-4">
        <p class="body-l">A moustache is a small area and one of the most demanding. Upper-lip hair points steeply downward and slightly outward from the centre, on thin skin that moves every time you talk or eat. Each site is set almost flat and turned to match; a graft at a scalp angle sticks out and shows in every conversation.</p>
        <p class="body-l">The lip border, and the edges beside the natural gap under the nose, are built from single-hair grafts. As a general range a moustache is often 300–700 grafts, depending on whether the aim is to thicken what grows, close the gap to the goatee, or build one where little grows.</p>
        <p class="body">It is visible during recovery: the upper lip commonly swells for a few days and small crusts sit there for roughly a week, so plan around anything client-facing.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white" id="candidacy">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">Suitability</p>
        <h2 class="h2 mt-2">Who May Consider a Beard Transplant?</h2>
        <p class="body mt-3">Beard growth is largely genetic and settles with age, which is why this is usually a straightforward decision once two things check out: your facial growth has stopped changing, and your scalp donor area can afford the grafts. What that costs, and how the graft count is arrived at, is set out on our <a href="/beard-transplant-cost-gurgaon">beard transplant cost page</a>.</p>
        <p class="body mt-3">Suitability is decided after examination, not from a photograph.</p>
        <a class="btn btn--ink mt-4" href="/book-consultation" data-book data-track="book">Book an assessment</a>
      </div>
      <div class="grid grid--2">
        <div class="card"><?= icon('user', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Patchy or uneven growth</h3><p class="body-s mt-2">Beard hair that comes in thick in some zones and barely at all in others, leaving a beard that never looks even however long it is grown.</p></div>
        <div class="card"><?= icon('beard', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Naturally sparse density</h3><p class="body-s mt-2">Growth that is present everywhere but too thin to hold a shape — a beard that reads as stubble no matter how long it is left.</p></div>
        <div class="card"><?= icon('pencil', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Scars and gaps</h3><p class="body-s mt-2">A stable scar or a permanently bare area within the beard that you would rather cover with growing hair than with a shorter cut.</p></div>
        <div class="card"><?= icon('list', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Shaping and definition</h3><p class="body-s mt-2">A beard that grows well but sits badly — a cheek line too low, a weak jaw border, sideburns out of proportion after a previous procedure.</p></div>
        <div class="card"><?= icon('heart', 22, 'var(--accent-deep)') ?><h3 class="h3 mt-3">Gender-affirming facial hair</h3><p class="body-s mt-2">Facial hair as part of masculinising treatment, planned alongside your existing medical care and usually after hormone therapy has had time to show what grows on its own.</p></div>
        <div class="card card--dashed"><?= icon('info', 22, 'var(--ink-muted)') ?><h3 class="h3 mt-3">When we say wait</h3><p class="body-s mt-2">Facial hair <a href="#age">still filling in with age</a>, active alopecia areata or an unsettled skin condition in the beard area, a scar that has not matured, keloid-prone skin, or a donor area that cannot spare the grafts. In those cases <a href="/hair-fall-treatment-in-gurgaon">medical treatment</a> or time comes first.</p></div>
      </div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'svc-hair-transplant',
    'alt'     => 'a sculpted model of a follicular unit with three hairs, on a cream background',
    'eyebrow' => 'Timing',
    'title'   => 'What Is the Right Age for a Beard Transplant?',
    'id'      => 'age',
    'tone'    => 'canvas',
    'reverse' => true,
    'html'    => '<p>Facial hair keeps maturing well past the teenage years, for many men filling in, darkening and coarsening into the mid-twenties. A patchy beard at twenty-one is not necessarily the beard you will have at twenty-six.</p>'
               . '<p>That is the reason to wait. Grafts placed before growth settles can end up out of step with native hair that arrives later, and donor grafts spent on a beard at twenty-one cannot be recovered if scalp hair loss appears at thirty.</p>',
    'points'  => [
        'No birthday settles it — the practical test is stability',
        'Photograph the same zones, in the same light, a year apart',
        'Wait until those photographs show no real change',
    ],
    'link'    => ['url' => '/blog/patchy-beard-wait-or-transplant', 'label' => 'Whether a patchy beard is worth waiting on'],
]) ?>

<section class="section section--white" id="alternatives">
  <div class="wrap">
    <div class="split split--sidebar">
      <div>
        <p class="eyebrow">Before surgery</p>
        <h2 class="h2 mt-2">Alternatives to a Beard Transplant</h2>
        <p class="body mt-3">Not every patchy beard needs surgery. Some of these are worth trying first; one explains why surgery would be wasted. None can create follicles where there are none — that is the line between a treatment worth trying and a transplant.</p>
      </div>
      <div class="grid grid--2">
        <div class="card"><h3 class="h3">Waiting</h3><p class="body-s mt-2">In the early twenties a beard may not have finished. Photograph the same zones every few months; growth that is still changing is a reason to wait.</p></div>
        <div class="card"><h3 class="h3">Grooming and shaping</h3><p class="body-s mt-2">A shorter length, a lower cheek line or close stubble often hides patchiness. Beard pencils and fibres give temporary cover only.</p></div>
        <div class="card"><h3 class="h3">Topical minoxidil</h3><p class="body-s mt-2">Used off-label on the beard. The evidence is modest, gains are often limited, and results usually need continued use to hold. It can irritate the skin, so start it with medical advice.</p></div>
        <div class="card"><h3 class="h3">Microneedling</h3><p class="body-s mt-2">Sometimes paired with minoxidil. Evidence for the beard specifically is limited, and home devices used without good hygiene can irritate or infect facial skin.</p></div>
        <div class="card"><h3 class="h3">Treating alopecia areata</h3><p class="body-s mt-2">Smooth, round patches where hair used to grow may be alopecia areata, which is treated medically and can regrow. No surgery while it is active — see <a href="/alopecia-areata-treatment-in-gurgaon">alopecia areata treatment in Gurgaon</a>.</p></div>
        <div class="card card--dashed"><h3 class="h3">When only a transplant will do</h3><p class="body-s mt-2">In a mature scar, a burn, a cleft-lip repair, or a zone still bare well past the mid-twenties, there are no follicles for a cream or device to act on. Only moving follicles can add hair there.</p></div>
      </div>
    </div>
  </div>
</section>

<?= lp_split([
    'img'     => 'intro-donor',
    'alt'     => 'a mannequin head seen from behind, with the donor area at the back and sides marked',
    'eyebrow' => 'Techniques',
    'title'   => 'Beard Transplant Techniques',
    'id'      => 'techniques',
    'tone'    => 'canvas',
    'html'    => '<p>Both techniques take grafts the same way: follicular units removed one at a time from the back and sides of the scalp with a small punch, leaving dot-sized marks that settle into the surrounding hair. They differ in how each graft goes into the face — on a beard, the part that matters — so the choice is made zone by zone, and one case often uses both.</p>'
               . '<p><b>FUE beard transplant:</b> recipient sites are made first across the beard, at the angle and direction of each zone, and the grafts placed into them. The doctor can set and review the whole pattern before placement begins, which is efficient across cheeks and jawline.</p>'
               . '<p><b>DHI beard transplant:</b> each graft is loaded into a fine implanter and set into untouched skin in one action, so depth, angle and direction are fixed at placement. That control is worth most along the cheek line, moustache border and sideburn, where a degree or two of error shows at conversational distance.</p>',
    'points'  => [
        'Neither one is universally better; each suits different zones',
        'The reasoning is explained at consultation and written into the estimate',
        'A “DHT beard transplant” is a misnomer: DHT (dihydrotestosterone) is a hormone; the technique meant is DHI, direct hair implantation',
    ],
]) ?>

<section class="section section--white" id="donor">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Where the grafts come from</p>
      <h2 class="h2 mt-2">Donor Options: Scalp, Beard and Body Hair</h2>
      <p class="body mt-3">The source shapes texture, supply and what is left for later, and it is decided by examining both the beard and the donor area.</p>
    </div>
    <div class="grid grid--3 mt-6">
      <div class="card card--tint card--pad-lg"><span class="pill">Default</span><h3 class="h3 mt-3">Scalp, back and sides</h3><p class="body-s mt-2">The usual source: generally resistant to pattern hair loss, the largest supply, and FUE marks that settle into surrounding hair. Finer and straighter than beard hair, but it blends for most people once trimmed.</p></div>
      <div class="card card--tint card--pad-lg"><span class="pill">Selected cases</span><h3 class="h3 mt-3">Under the chin and neck</h3><p class="body-s mt-2">Closest to beard hair in texture and colour, but a small supply, and extraction leaves marks in skin you may shave. Suits small refinements, such as a moustache edge, more than volume.</p></div>
      <div class="card card--tint card--pad-lg"><span class="pill">Selected cases</span><h3 class="h3 mt-3">Body and chest hair</h3><p class="body-s mt-2">Considered mainly when scalp supply is limited. The yield is lower and less predictable, the hairs often grow finer, curlier or shorter, and extraction is harder. A supplementary source, assessed individually.</p></div>
    </div>
    <div class="note mt-4"><p class="h4">One donor budget, two possible uses</p><p class="body-s mt-2">Scalp grafts used for a beard are not available for a future scalp transplant, and extracted hair does not grow back. Any sign or family history of pattern hair loss is weighed before the beard is designed — see <a href="/blog/donor-area-limits-hair-transplant">why donor supply is a one-time budget</a>.</p></div>
  </div>
</section>

<?= lp_steps([
    'eyebrow' => 'Step by step',
    'title'   => 'Your Beard Transplant Journey',
    'id'      => 'journey',
    'intro'   => 'From the first appointment to the review at a year. Consultations and procedures are carried out by registered medical practitioners at the clinic.',
    'tone'    => 'canvas',
    'steps'   => [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',                    'title' => 'Consultation and assessment', 'text' => 'What you want from your beard and what is realistic; existing growth mapped zone by zone, the skin checked, and what the scalp can safely give, now and later.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned line',    'title' => 'Beard design',                'text' => 'Borders drawn on your face and approved by you in a mirror, then a written plan covering technique, approximate graft number, timeline and cost factors.'],
        ['img' => 'step-procedure',    'alt' => 'sterile hair-restoration instruments laid out on a tray', 'title' => 'Procedure',                   'text' => 'A day case under local anaesthetic. You go home the same day.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with review dates circled',              'title' => 'Recovery and reviews',        'text' => 'Written instructions on washing, trimming and shaving, then progress photographed at set intervals through the first year.'],
    ],
]) ?>

<?= lp_split([
    'img'     => 'intro-recipient',
    'alt'     => 'a mannequin head seen from the front, with short hair and a planned hairline drawn in pencil',
    'eyebrow' => 'On the day',
    'title'   => 'How Does a Beard Transplant Work?',
    'id'      => 'procedure',
    'reverse' => true,
    'html'    => '<p>The agreed borders are redrawn on your face and checked with you sitting upright in natural light — a beard drawn on a reclined patient sits wrong when they stand up — and photographed for your record. The donor strip is trimmed short and both areas are numbed; the injections are usually the most uncomfortable part, and pressure can still be felt afterwards.</p>'
               . '<p>Follicular units are removed individually, and single-hair units are separated under magnification and kept for the borders, where clusters would show. In an FUE case the sites are then made at each zone’s angle; in DHI that happens at placement. Singles go at the edges and larger units in the interior, in a deliberately irregular pattern — a ruled edge is what makes a transplanted beard obvious.</p>',
    'points'  => [
        'Home the same day with written instructions, and medication where prescribed',
        'Your first review is already booked; someone should drive you',
        'Not concealable under a cap: small crusts sit on the face for about the first week, so most patients book time when they are not client-facing',
    ],
]) ?>

<?= doctor_block(
    'Consultations and procedures are carried out by registered medical practitioners at the clinic. Patchy facial hair can be alopecia areata rather than genetics, and the donor arithmetic is a medical judgement, so the beard and the donor area are both examined before anything is planned.'
) ?>

<section class="section section--white" id="cost">
  <div class="wrap">
    <div class="split">
      <div>
        <p class="eyebrow">Cost guidance</p>
        <h2 class="h2 mt-2">Beard Transplant Cost in Gurgaon</h2>
        <p class="body mt-3 measure">Cost follows the plan, and the plan follows the assessment. A patchy-cheek correction and a full beard reconstruction are different procedures with very different graft counts, so we publish the factors that move the number and give you an itemised estimate in writing afterwards. The cost guide also shows what other Gurgaon clinics advertise, marked as market context rather than our price.</p>
        <div class="grid grid--2 mt-5">
          <div class="card"><p class="h4">Zones being treated</p><p class="meta mt-1">Cheeks, jaw, moustache, chin, sideburns</p></div>
          <div class="card"><p class="h4">Number of grafts</p><p class="meta mt-1">Counted from the mapped design, not estimated</p></div>
          <div class="card"><p class="h4">Existing growth</p><p class="meta mt-1">How much native hair the plan can build on</p></div>
          <div class="card"><p class="h4">Technique</p><p class="meta mt-1">FUE, DHI, or both across different zones</p></div>
          <div class="card"><p class="h4">Complexity</p><p class="meta mt-1">Scar tissue, repair work, staged sessions</p></div>
          <div class="card"><p class="h4">Supporting treatment</p><p class="meta mt-1">Any medical therapy planned alongside</p></div>
        </div>
        <p class="meta mt-4 measure">A word of caution about “per graft, starting from” pricing: a per-graft rate means little without the graft count it is multiplied by. Ask any clinic how the graft number was arrived at, and what is included — anaesthesia, medication, follow-up reviews.</p>
        <a class="btn btn--ink mt-4" href="/beard-transplant-cost-gurgaon"><?= icon('rupee', 18) ?> Beard transplant cost breakdown</a>
      </div>
      <div class="cta-band" style="display:block">
        <h3 class="h3">Get a Personalised Treatment Estimate</h3>
        <p class="body-s mt-2">Send clear photos of your cheeks, jawline and chin in daylight on WhatsApp, or request a call back. You will get an assessment appointment — not a sales pitch.</p>
        <div class="stack-sm mt-4">
          <a class="btn btn--block btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Send photos on WhatsApp</a>
          <a class="btn btn--block btn--ghost" href="/book-consultation" data-book data-track="book">Request an estimate by form</a>
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
      <p class="body mt-3">A general guide to the phases most patients describe; the <a href="/blog/beard-transplant-recovery-timeline">beard transplant recovery timeline</a> goes through them week by week. Your own timeline, and when you may trim or shave, is set by your doctor at your reviews.</p>
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
      <div class="note"><p class="h4">Individual outcomes vary</p><p class="body-s mt-2">Your doctor will give personalised guidance based on your treatment. The timelines here are general patient education, not a promise of results, and no density or growth rate can be promised.</p></div>
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

<section class="section section--ink" id="repair">
  <div class="wrap">
    <div style="max-width:62ch">
      <p class="eyebrow">Repair and revision</p>
      <h2 class="h2 mt-2">Correcting a Previous Beard Transplant</h2>
      <p class="body-l mt-3">Poor beard results tend to come from a few problems. Some can be improved a great deal, some only softened, and an honest plan says which before anything is booked. It also waits until the earlier work has matured, generally around a year.</p>
    </div>
    <div class="grid grid--2 mt-6">
      <div class="card card--ink"><p class="h4">Wrong angles</p><p class="body-s mt-2">Grafts set at a scalp angle bristle. Where donor supply allows, some can be extracted and re-placed at the correct lie; otherwise correctly angled hair around them makes them stand out less.</p></div>
      <div class="card card--ink"><p class="h4">Over-dense tufts and pluggy edges</p><p class="body-s mt-2">Multi-hair grafts on a border, or grafts packed too tightly, read as tufts. Selected grafts can be removed and the edge rebuilt in single hairs.</p></div>
      <div class="card card--ink"><p class="h4">Pitting and bumps</p><p class="body-s mt-2">Small depressions or raised bumps around grafts may be improved but are not always fully correctable, and the skin is assessed before any further grafting.</p></div>
      <div class="card card--ink"><p class="h4">What repair cannot do</p><p class="body-s mt-2">It cannot put back donor hair already taken, promise an invisible correction, or promise that one session will be enough. Correction usually improves a result rather than reversing it.</p></div>
    </div>
    <p class="body mt-5 measure">Bring the operative record if you have it. The same principles apply as on the scalp; see <a href="/hair-transplant-repair-in-gurgaon" style="color:var(--accent-on-dark)">hair transplant repair in Gurgaon</a>.</p>
  </div>
</section>

<section class="section section--white" id="faqs">
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
    'Beard Transplant Clinic in Gurugram (Gurgaon)',
    'Our Gurugram clinic is in Sector 39, ' . NAP_LANDMARK . '. Consultations and procedures are carried out by registered medical practitioners at the clinic, and assessment, beard design, the procedure and follow-up reviews are arranged there.'
) ?>

<?= lp_cta([
    'eyebrow'   => 'Sector 39, Gurugram',
    'title'     => 'Talk to a Doctor About Your Beard',
    'text'      => 'Bring your questions and your concerns. You will get a clinical assessment, a beard design drawn on your own face, an honest view of whether a transplant is appropriate for you, and a written plan if it is — with no pressure to book a date on the day.',
    'treatment' => 'Beard transplant',
]) ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
