<?php
/**
 * Shared sections of the Delhi laser hair removal pages: the
 * /laser-hair-removal-in-delhi pillar and its area pages,
 * /laser-hair-removal-in-<area> (laid out by includes/delhi-laser-area-page.php).
 *
 * Built 27 Oct 2026 at the client's request ("same like hair transplant delhi
 * type"), on the hair transplant pillar and area pages: the same areas
 * (DELHI_SERVICE_AREAS), the same design, the same Rohini rules (the Rohini
 * clinic only, never the Gurugram clinic, no AI images) and the same linking —
 * the pillar's "Serving Patients Across Delhi" block is the only place the
 * area pages are linked from, and they link up to the pillar.
 *
 * Facts are the ones on /laser-hair-removal-in-rohini: laser is carried out at
 * the Rohini clinic (agency, 13 Oct 2026); the device, wavelength, who runs
 * each session and prices are not on record, so none is stated. Session gaps
 * and counts are general ranges, never this clinic's protocol. No consented
 * laser before-and-after photographs are on record, so these pages have no
 * results row and never borrow the scalp cases; the area card takes the photo
 * pair's place.
 */

declare(strict_types=1);

require_once __DIR__ . '/delhi-localities.php';

/**
 * Area => usual gap between sessions, general range of sessions, note. The
 * patient-education ranges of /laser-hair-removal-in-rohini (face every four
 * to six weeks, body six to eight or more, usually six or more visits). Not a
 * schedule.
 */
const DELHI_LASER_AREAS = [
    ['Upper lip and chin', '4–6 weeks',         'Often more than six, with later top-ups', 'Often hormone-related, so more sessions are common. Threading stops well before the course begins.'],
    ['Jawline and neck',   '4–6 weeks',         'Often more than six if growth is hormonal', 'Chosen by women with hormonal hair and by men with ingrown hairs after shaving.'],
    ['Underarms',          '6–8 weeks',         'Usually six or more',                     'Dense, dark hair that tends to respond well. No deodorant on the day.'],
    ['Arms',               '6–8 weeks or more', 'Six or more; finer hair may need more',   'Forearm hair is often finer, and less predictable, than coarse hair elsewhere.'],
    ['Legs',               '6–8 weeks or more', 'Usually six or more',                     'A large area, so each session runs longer; lower legs tan easily.'],
    ['Back and shoulders', '6–8 weeks or more', 'Usually six or more',                     'Broad areas of coarse hair, mostly in men; sessions take longer.'],
    ['Chest and abdomen',  '6–8 weeks or more', 'Six or more; more if growth is hormonal', 'In women, new hair here is worth raising, as it can point to a hormonal cause.'],
    ['Bikini line',        '6–8 weeks or more', 'Usually six or more',                     'Skin here is often darker and more tender, so settings are kept cautious.'],
];

/** The treatment options of the laser consultation form. */
const DELHI_LASER_FORM = [
    'Laser hair removal — face',
    'Laser hair removal — underarms',
    'Laser hair removal — arms or legs',
    'Laser hair removal — back or chest',
    'Laser hair removal — bikini line',
    'Laser hair removal — several areas',
    'Not sure — please advise',
];

/** The areas and their usual gaps, in the slot the scalp photo pair has on the hair pages. */
function delhi_laser_areas_card(): string
{
    ob_start(); ?>
<div class="card band-card">
  <div class="band-card__head">
    <h3 class="h4">Usual Gap Between Sessions</h3>
    <p>General patient-education ranges, not a schedule.</p>
  </div>
  <div class="table-scroll">
    <table class="data data--fit">
      <caption class="sr-only">Usual gap between laser hair removal sessions by area — general ranges for patient education</caption>
      <thead>
        <tr><th scope="col">Area</th><th scope="col">Gap</th></tr>
      </thead>
      <tbody>
        <?php foreach (DELHI_LASER_AREAS as [$area, $gap]): ?>
        <tr>
          <th scope="row" style="color:var(--ink);font-size:14px;font-weight:700;text-transform:none;letter-spacing:0"><?= e($area) ?></th>
          <td style="font-weight:700;color:var(--tone-mint);white-space:nowrap"><?= e($gap) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <p class="meta" style="padding:12px 22px 18px">Most areas take six or more sessions. Your own gaps are set at the assessment.</p>
</div>
<?php
    return (string) ob_get_clean();
}

/** The five stages of a laser course, with icons in the circles. */
function delhi_laser_steps(): string
{
    ob_start(); ?>
<section class="section ht-sec section--canvas ht-process" id="process">
  <div class="wrap">
    <p class="eyebrow">Procedure</p>
    <h2 class="h2 mt-2">How a Laser Hair Removal Course Runs</h2>
    <p class="body mt-2">Five stages at the Rohini clinic, from the first visit to the occasional top-up.</p>

    <ol class="ht-steps">
      <?php foreach ([
          ['search',   'Consultation &amp; Skin Assessment', 'Skin type, hair colour and thickness, medicines and any hormonal history looked at by a doctor.'],
          ['shield',   'Patch Test',                         'A small spot treated at the planned settings and checked again a few days later.'],
          ['doc',      'Written Course Plan',                'The areas, a range of sessions, the gap between visits and what affects the cost.'],
          ['settings', 'Laser Sessions',                     'Eye protection for everyone in the room, then overlapping pulses with cooling.'],
          ['calendar', 'Aftercare &amp; Top-ups',            'Shaving only between visits, sun care, and an occasional maintenance session later.'],
      ] as $i => [$ic, $title, $text]): ?>
      <li class="ht-step">
        <span class="ht-step__img ht-step__img--icon"><?= icon($ic, 40, 'currentColor', 1.6) ?></span>
        <span class="ht-step__num"><?= sprintf('%02d', $i + 1) ?></span>
        <h3 class="ht-step__title"><?= $title ?></h3>
        <p class="ht-step__text"><?= e($text) ?></p>
      </li>
      <?php endforeach; ?>
    </ol>

    <p class="ht-steps__note">More in <a href="/blog/laser-hair-removal-patch-test">what the patch test checks on Indian skin</a> and <a href="/blog/is-laser-hair-removal-permanent">why laser reduces hair rather than removing it for good</a>.</p>
    <div class="ht-center mt-5">
      <a class="btn btn--ink" href="#consultation"><?= icon('calendar', 17) ?> Book a Consultation</a>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/** Skin type and related treatments for an area page; the depth is on the pillar. */
function delhi_laser_skin_brief(): string
{
    ob_start(); ?>
<section class="section ht-sec section--white" id="skin-types">
  <div class="wrap">
    <div style="max-width:68ch">
      <p class="eyebrow">Skin type</p>
      <h2 class="h2 mt-2">Laser on Indian Skin at the Rohini Clinic</h2>
      <p class="body mt-3">Laser works because dark pigment in the hair absorbs its light, and the skin around each hair carries pigment too. On darker skin the settings are chosen more cautiously and a patch test usually comes first; grey, white, red and blonde hair has too little pigment to respond. <a href="<?= e(DELHI_LASER_HUB) ?>#skin-types">How the settings are chosen</a>.</p>
    </div>
    <ul class="ht-patterns mt-4">
      <?php foreach ([
          '/laser-hair-removal-in-rohini'               => 'Laser hair removal at the Rohini clinic',
          '/blog/laser-hair-removal-for-pcos-facial-hair' => 'Laser for PCOS facial hair',
          '/blog/laser-hair-removal-patch-test'         => 'The patch test',
          '/skin-treatment-in-rohini'                   => 'Skin treatment',
      ] as $href => $anchor): ?>
      <li><a href="<?= e($href) ?>"><?= e($anchor) ?> <?= icon('arrow', 14) ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/** Cost in brief for an area page, with the factors and where to read more. */
function delhi_laser_cost_brief(): string
{
    ob_start(); ?>
<section class="section ht-sec section--white" id="cost">
  <div class="wrap">
    <div class="split split--top">
      <div>
        <p class="eyebrow">Cost</p>
        <h2 class="h2 mt-2">How a Laser Course Is Priced</h2>
        <p class="body mt-3 measure">There is no fixed headline price. The cost follows the areas you want treated, how large they are and the number of sessions your skin and hair are likely to need. It is explained after your assessment, with the factors set out in your plan, before you commit to a course.</p>
        <ul class="ht-patterns mt-4">
          <li><a href="<?= e(DELHI_LASER_HUB) ?>#cost">Laser cost in Delhi <?= icon('arrow', 14) ?></a></li>
          <li><a href="/cost-and-emi-options">EMI and payment <?= icon('arrow', 14) ?></a></li>
        </ul>
      </div>
      <div class="factor-list">
        <div class="factor tone--mint"><span class="icon-dot"><?= icon('list', 20) ?></span><div><b>Areas and their size</b><span>An upper lip takes minutes; both legs or a back take far longer.</span></div></div>
        <div class="factor tone--violet"><span class="icon-dot"><?= icon('calendar', 20) ?></span><div><b>Number of sessions</b><span>Finer, lighter or hormone-driven hair usually needs more.</span></div></div>
        <div class="factor tone--sky"><span class="icon-dot"><?= icon('clock', 20) ?></span><div><b>Top-ups later</b><span>Some hair usually returns, and maintenance is priced separately.</span></div></div>
      </div>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}
