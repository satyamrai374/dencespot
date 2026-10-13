<?php
/**
 * Reusable markup blocks.
 *
 * Anything that appears on more than one page lives here, so a change lands
 * everywhere at once. Each function returns a string; templates echo it.
 */

declare(strict_types=1);

/**
 * Classification of every image in assets/img/gallery/. Required here because
 * the homepage results marquee draws from it — it must never scan the folder.
 */
require_once __DIR__ . '/gallery-manifest.php';

/** Pillar → cluster → supporting-page map, rendered by footer.php. */
require_once __DIR__ . '/clusters.php';

/** Dated prices other Gurgaon clinics advertise — market context only. */
require_once __DIR__ . '/market-prices.php';

/* -------------------------------------------------------------------------
 * Icons
 *
 * One consistent stroke style, 24×24 grid. Never emoji — they do not scale,
 * recolour or read correctly to a screen reader.
 * ---------------------------------------------------------------------- */

function icon(string $name, int $size = 24, string $color = 'currentColor', float $width = 1.7): string
{
    static $paths = [
        'logo'     => '<path d="M6 21c0-6 3-9 6-9s6 3 6 9"/><path d="M8 12c-1.5-3-1-7 1-9"/><path d="M16 12c1.5-3 1-7-1-9"/>',
        'phone'    => '<path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a1 1 0 0 1-1 1A16 16 0 0 1 4 5a1 1 0 0 1 1-1z"/>',
        'whatsapp' => '<path d="M21 11.5a8.5 8.5 0 0 1-12.6 7.4L3 20.5l1.7-5.2A8.5 8.5 0 1 1 21 11.5z"/>',
        'menu'     => '<path d="M4 7h16M4 12h16M4 17h16"/>',
        'close'    => '<path d="M6 6l12 12M18 6L6 18"/>',
        'check'    => '<path d="M4 12.5l5 5L20 6.5"/>',
        'calendar' => '<rect x="3.5" y="5" width="17" height="15" rx="3"/><path d="M8 3v4M16 3v4M3.5 10h17"/>',
        'shield'   => '<path d="M12 3l7 3v5.5c0 4.2-2.9 7.6-7 9-4.1-1.4-7-4.8-7-9V6z"/><path d="M9.5 12l1.8 1.8L15 10"/>',
        'info'     => '<circle cx="12" cy="12" r="9"/><path d="M12 8h.01M12 11v5"/>',
        'hairline' => '<path d="M4 16c3-6 13-6 16 0"/><path d="M7 16v3M12 14.5v4.5M17 16v3"/>',
        'beard'    => '<path d="M4 18c0-5 3.6-8 8-8s8 3 8 8"/><path d="M7 10.5C6 8 6.4 5 8 3.5M17 10.5c1-2.5.6-5.5-1-7"/>',
        'list'     => '<path d="M4 6h16M4 12h10M4 18h6"/>',
        'settings' => '<circle cx="12" cy="12" r="3"/><path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.6 5.6l2.1 2.1M16.3 16.3l2.1 2.1M18.4 5.6l-2.1 2.1M7.7 16.3l-2.1 2.1"/>',
        'heart'    => '<path d="M12 20s-7-4.3-7-9.5A4 4 0 0 1 12 8a4 4 0 0 1 7 2.5C19 15.7 12 20 12 20z"/>',
        'chat'     => '<path d="M4 5h16v13H8l-4 3z"/><path d="M9 11h6"/>',
        'doc'      => '<path d="M6 3h9l4 4v14H6z"/><path d="M9 12h7M9 16h5"/>',
        'user'     => '<circle cx="12" cy="8" r="4"/><path d="M4 21c0-4.4 3.6-7 8-7s8 2.6 8 7"/>',
        'pencil'   => '<path d="M4 20l4-1 9-9-3-3-9 9z"/><path d="M14 5l3 3"/>',
        'chart'    => '<path d="M3 17l6-6 4 4 8-8"/><path d="M21 7v5h-5"/>',
        'pin'      => '<path d="M12 21s-7-5.5-7-10a7 7 0 1 1 14 0c0 4.5-7 10-7 10z"/><circle cx="12" cy="11" r="2.5"/>',
        'clock'    => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
        'mail'     => '<rect x="3" y="5" width="18" height="14" rx="2.5"/><path d="M3.5 7l8.5 6 8.5-6"/>',
        'arrow'    => '<path d="M5 12h14M13 6l6 6-6 6"/>',
        'rupee'    => '<path d="M7 5h9M7 9h9M14 5c0 4-3 4.5-7 4.5L14 19"/>',
        'scale'    => '<path d="M12 4v16M6 8h12"/><path d="M6 8l-2.5 6a2.5 2.5 0 0 0 5 0z"/><path d="M18 8l-2.5 6a2.5 2.5 0 0 0 5 0z"/>',
        'star'     => '<path d="M12 4l2.4 5 5.6.7-4 3.9 1 5.4-5-2.7-5 2.7 1-5.4-4-3.9 5.6-.7z"/>',
        'search'   => '<circle cx="11" cy="11" r="6.5"/><path d="M16 16l4 4"/>',
    ];

    $body = $paths[$name] ?? $paths['info'];

    return sprintf(
        '<svg width="%d" height="%d" viewBox="0 0 24 24" fill="none" stroke="%s" stroke-width="%s" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">%s</svg>',
        $size, $size, $body === '' ? 'currentColor' : $color, $width, $body
    );
}

/* -------------------------------------------------------------------------
 * Doctor credit line
 *
 * Used by every hero badge. Exists so a credential is never retyped into a
 * template — when config changes, every page changes with it. Retyping is
 * exactly how the two design exports ended up claiming different
 * qualifications for the same doctor.
 * ---------------------------------------------------------------------- */

function doctor_credit(string $key = 'dr-nyra'): string
{
    $doc = DOCTORS[$key] ?? null;
    if ($doc === null) {
        return '';
    }
    return e(implode(' · ', array_filter([(string) ($doc['quals'] ?? ''), (string) ($doc['role'] ?? '')])));
}

function doctor_name(string $key = 'dr-nyra'): string
{
    return e(DOCTORS[$key]['name'] ?? '');
}

/** "Dr. Nyra, MBBS, MD (Dermatology)" */
function doctor_full(string $key = 'dr-nyra'): string
{
    $doc = DOCTORS[$key] ?? null;
    return $doc === null ? '' : e($doc['name']) . ', ' . e($doc['quals']);
}

/* -------------------------------------------------------------------------
 * Image placeholder
 *
 * Stands in until real clinic photography arrives. Deliberately obvious —
 * a grey box is honest; a stock photo of a stranger is not.
 * ---------------------------------------------------------------------- */

function slot(string $description, string $ratio = 'ratio-4-3', string $extra = ''): string
{
    return sprintf(
        '<div class="media %s %s"><div class="slot"><span>%s</span></div></div>',
        e($ratio), e($extra), e($description)
    );
}

/* -------------------------------------------------------------------------
 * Ticked benefit list
 * ---------------------------------------------------------------------- */

function ticks(array $items, bool $twoCol = true): string
{
    $out = '<ul class="ticks' . ($twoCol ? ' ticks--2col' : '') . '">';
    foreach ($items as $item) {
        $out .= '<li class="tick">' . icon('check', 18, 'currentColor', 2.2) . '<span>' . e($item) . '</span></li>';
    }
    return $out . '</ul>';
}

/* -------------------------------------------------------------------------
 * Trust stat strip
 *
 * Competitor clinics in this market all run one of these, and they run it on
 * invented numbers — patient counts nobody audits, success rates nobody
 * measures. The format is worth having; the contents are not. So this renders
 * only figures that are already evidenced elsewhere on the site, and drops
 * any tile whose value is null rather than filling it with something
 * plausible. See the STAT_* constants in config.php.
 * ---------------------------------------------------------------------- */

/**
 * A row of figures.
 *
 * Each $stats entry is ['value' => …, 'label' => …, 'note' => …]. A tile whose
 * value is null is removed before rendering, so a figure the clinic has not
 * supplied leaves no gap and no placeholder; if nothing survives, the whole
 * section disappears instead of rendering an empty strip.
 *
 * 'note' says where the figure comes from and is required, not decorative. A
 * number with no provenance under it is exactly what the rest of this site
 * tells patients not to trust, and the rule has to apply to us too.
 */
function stat_strip(array $stats, ?string $footnote = null): string
{
    $stats = array_values(array_filter(
        $stats,
        static fn (array $s): bool => ($s['value'] ?? null) !== null && $s['value'] !== ''
    ));

    if ($stats === []) {
        return '';
    }

    ob_start(); ?>
<div class="stat-strip">
  <?php foreach ($stats as $s): ?>
    <div class="stat">
      <p class="stat__value"><?= e((string) $s['value']) ?></p>
      <p class="stat__label"><?= e($s['label']) ?></p>
      <p class="stat__note"><?= e($s['note']) ?></p>
    </div>
  <?php endforeach; ?>
</div>
<?php if ($footnote !== null): ?>
<p class="fine mt-3" style="max-width:70ch"><?= e($footnote) ?></p>
<?php endif; ?>
<?php
    return (string) ob_get_clean();
}

/**
 * The strip as it appears on the treatment pages.
 *
 * The four constant tiles are all statements the site already makes in prose
 * and can stand behind: the qualification is in config, the three German years
 * are in doctor_block(), the three techniques each have their own page, and
 * the twelve-month review schedule is described on every treatment page and in
 * the aftercare guide.
 *
 * The two clinic-supplied tiles — cases treated and years in practice — sit
 * first when they exist, because they are the figures a patient actually
 * scans for, and vanish entirely until STAT_CASES_TREATED and
 * STAT_YEARS_ACTIVE are filled in.
 *
 * Deliberately absent: any graft survival or success percentage. The clinic
 * does not track one, and a survival rate published without a measurement
 * protocol behind it is a number invented at a keyboard.
 */
function clinic_stat_strip(): string
{
    return stat_strip([
        /*
         * Oct 2026: only institutional facts remain. Gone are the patient-count
         * and years-in-practice tiles (fed by STAT_CASES_TREATED /
         * STAT_YEARS_ACTIVE) and "3 yrs — Clinical training in Germany": the
         * NMC Guidelines of 06.10.2026 bar advertising the number of patients
         * treated and personal achievements (cl. 8.1(iii)). "1 — Doctor plans
         * and performs" went too: it cannot be evidenced with two doctors at
         * two clinics. Do not reinstate any of them.
         */
        [
            'value' => '3',
            'label' => 'Techniques performed here',
            'note'  => 'FUE, DHI and FUT — chosen, not defaulted',
        ],
        [
            'value' => '12 mo',
            'label' => 'Follow-up reviews scheduled',
            'note'  => 'Photographed at set intervals through the first year',
        ],
    ], 'These describe the clinic, not your outcome. Suitability is decided case by case after examination, and no density or timeline can be promised.');
}

/* -------------------------------------------------------------------------
 * FUE / DHI / FUT comparison
 *
 * Every cell condenses a claim already made on the technique's own page. No
 * row asserts anything those pages do not, and nothing here ranks one
 * technique above another — the note underneath exists to stop the table
 * being read that way, which is the failure mode of every comparison table in
 * this sector.
 *
 * Sources, cell by cell:
 *   FUE  — fue-hair-transplant-in-gurgaon.php: FAQ "Does FUE leave scars?",
 *          the lead paragraph, and the Week 1 recovery card.
 *   DHI  — dhi-hair-transplant-in-gurgaon.php: FAQ on FUE-vs-DHI placement,
 *          the "No linear scar" card, the implanter comparison table, and the
 *          recovery note stating DHI does not shorten recovery.
 *   FUT  — fut-hair-transplant-in-gurgaon.php: FAQ "Does FUT leave a visible
 *          scar?", FAQ "How long does FUT recovery take?", and the Days 1–14
 *          donor-line card.
 *   "Typically suited to" — the $rates table on
 *          hair-transplant-cost-in-gurgaon.php, verbatim.
 * ---------------------------------------------------------------------- */

function technique_comparison_table(): string
{
    $rows = [
        [
            'technique' => 'FUE',
            'url'       => '/fue-hair-transplant-in-gurgaon',
            'extraction'=> 'Follicular units removed one at a time with a fine punch, typically well under a millimetre. No strip of skin is taken.',
            'scarring'  => 'Many tiny round scars rather than one line — pale dots spread across the donor area. Difficult to see at short hair lengths when spread properly.',
            'recovery'  => 'Small crusts around each graft and pinpoint scabbing across the donor in week one. Most people return to desk work within a few days.',
            'best_for'  => 'Larger areas — crown, mid-scalp, broad coverage. Also the technique for anyone who shaves or wears the sides very short.',
        ],
        [
            'technique' => 'DHI',
            'url'       => '/dhi-hair-transplant-in-gurgaon',
            'extraction'=> 'Essentially identical to FUE. DHI describes the placement stage, not the extraction: each graft is loaded into a fine implanter that makes the site and sets the graft in one action.',
            'scarring'  => 'The same as FUE — dot healing across the donor, not a line. The donor is treated identically.',
            'recovery'  => 'The same as FUE, because the donor and the biology are the same. DHI does not shorten recovery or speed up growth, whatever the advertising says.',
            'best_for'  => 'Hairline and detail zones needing precise angle control. Slower per graft, so large multi-zone sessions are usually better served by FUE placement.',
        ],
        [
            'technique' => 'FUT',
            'url'       => '/fut-hair-transplant-in-gurgaon',
            'extraction'=> 'A strip of donor scalp is removed and dissected under microscopes into individual grafts. The donor edge is then closed.',
            'scarring'  => 'One permanent linear scar at the back of the scalp. Trichophytic closure usually keeps it a fine line that hair grows through, but it cannot be removed and it shows on a shaved head.',
            'recovery'  => 'Sutures or staples out at around ten to fourteen days. Desk work within a few days, but gym, heavy lifting and stretching the neck back are restricted considerably longer than after FUE.',
            'best_for'  => 'High graft numbers in a single session, where suitable — and only for patients who keep the hair at the back long enough to cover a line.',
        ],
    ];

    ob_start(); ?>
<div class="card mt-6" style="padding:0;overflow:hidden">
  <div class="table-scroll">
    <table class="data data--wide">
      <caption class="sr-only">FUE, DHI and FUT hair transplant techniques at DenceSpot Clinic, Gurgaon, compared by extraction method, scarring, recovery and the cases each typically suits</caption>
      <thead>
        <tr>
          <th scope="col">Technique</th>
          <th scope="col">Extraction method</th>
          <th scope="col">Scarring</th>
          <th scope="col">Recovery</th>
          <th scope="col">Typically suited to</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($rows as $r): ?>
        <tr>
          <th scope="row" style="color:var(--ink);font-size:15px;font-weight:700;text-transform:none;letter-spacing:0">
            <a href="<?= e($r['url']) ?>"><?= e($r['technique']) ?></a>
          </th>
          <td><?= e($r['extraction']) ?></td>
          <td><?= e($r['scarring']) ?></td>
          <td><?= e($r['recovery']) ?></td>
          <td><?= e($r['best_for']) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php
    return (string) ob_get_clean();
}

/* -------------------------------------------------------------------------
 * Live Google reviews
 * ---------------------------------------------------------------------- */

/**
 * ⚠ WITHDRAWN — Oct 2026. Returns nothing; callers need no change.
 *
 * This embedded the live Google reviews (Elfsight) under "What Patients Say
 * on Google" and told readers the clinic asks every patient for a review. The
 * NMC Guidelines on Ethical Advertising and Public Communication (06.10.2026)
 * bar a doctor or clinic from requesting or sharing patient reviews or
 * testimonials for promotion (Explanation V, cl. 6.1, 8.1(xi)). Do not
 * reinstate it.
 */
function google_reviews_block(string $heading = ''): string
{
    return '';
}

/* -------------------------------------------------------------------------
 * Cost band
 * ---------------------------------------------------------------------- */

/**
 * One indicative line for the cost section, or nothing.
 *
 * Returns '' unless BOTH ends of the band are set in config, so a half-filled
 * constant cannot produce a "from ₹X" — the pricing tactic this site's cost
 * page explicitly warns patients about. Whatever calls this must keep its own
 * "quoted in writing after assessment" sentence immediately afterwards; the
 * band is a orientation figure, not a quote, and the two belong together.
 */
function cost_band_line(): string
{
    if (COST_BAND_LOW === null || COST_BAND_HIGH === null) {
        return '';
    }

    return sprintf(
        '<p class="body mt-3 measure"><b>Indicative range.</b> Most hair transplants at DenceSpot fall between ₹%s and ₹%s all in, depending on graft count and technique. Where your own plan sits inside that band is decided by the assessment, not by the band.</p>',
        e(number_format(COST_BAND_LOW)),
        e(number_format(COST_BAND_HIGH))
    );
}

/* -------------------------------------------------------------------------
 * Market price context
 * ---------------------------------------------------------------------- */

/**
 * What OTHER Gurgaon clinics advertise, as dated market context.
 *
 * Cost is the commonest modifier on every money query in this market, and the
 * clinics outranking this site print numbers. DenceSpot's own rates are still
 * unconfirmed (see COST_BAND_* in config.php), and inventing one is not an
 * option. What can be published honestly is what the market advertises —
 * clearly dated, never attributed to this clinic, and never marked up as an
 * Offer: schema.php's rule is that no price appears in structured data unless
 * it is this clinic's price, visible on the page.
 *
 * $rows: [['item' => 'PRP (per session)', 'range' => '₹4,500 – ₹12,000', 'note' => '4–6 sessions usually advised'], …]
 * $asOf: month the ranges were observed, e.g. 'September 2026'. Required:
 *        a price with no date on it goes stale silently.
 */
function market_price_table(string $caption, array $rows, string $asOf, string $scope = 'Gurgaon clinic websites'): string
{
    if ($rows === []) {
        return '';
    }

    ob_start(); ?>
<div class="card mt-5" style="padding:0;overflow:hidden">
  <div class="table-scroll">
    <table class="data data--wide">
      <caption class="sr-only"><?= e($caption) ?></caption>
      <thead>
        <tr><th scope="col">Item</th><th scope="col">Advertised range</th><th scope="col">Worth knowing</th></tr>
      </thead>
      <tbody>
        <?php foreach ($rows as $r): ?>
        <tr>
          <th scope="row" style="color:var(--ink);font-size:15px;font-weight:700;text-transform:none;letter-spacing:0"><?= e($r['item']) ?></th>
          <td style="font-weight:600;color:var(--ink);white-space:nowrap"><?= e($r['range']) ?></td>
          <td><?= e($r['note'] ?? '') ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<p class="fine mt-3" style="max-width:78ch"><b>Market context, not our price list.</b> Ranges as advertised on <?= e($scope) ?> we reviewed in <?= e($asOf) ?>. They are not DenceSpot’s prices — ours are quoted in writing after assessment — and advertised figures often exclude consultation, blood tests, medication or maintenance. Ask any clinic what its figure includes.</p>
<?php
    return (string) ob_get_clean();
}

/* -------------------------------------------------------------------------
 * Latest blog posts
 * ---------------------------------------------------------------------- */

/**
 * A freshness strip reading the BLOG_POSTS registry directly, so it re-sorts
 * itself the moment a post is added and never needs editing here. blog_posts()
 * already returns newest first.
 *
 * $hub narrows it to one topic — a hair transplant page should surface hair
 * transplant reading, not PRP. Falls back to every post when the requested hub
 * is empty, and renders nothing at all when the blog is.
 */
function latest_posts_strip(?string $hub = null, int $limit = 3, string $heading = 'Latest From the Blog'): string
{
    require_once __DIR__ . '/blog.php';

    $posts = blog_posts($hub);
    if ($posts === [] && $hub !== null) {
        $posts = blog_posts();
    }
    if ($posts === []) {
        return '';
    }

    $posts = array_slice($posts, 0, max(1, $limit));

    ob_start(); ?>
<section class="section section--white" id="latest-reading">
  <div class="wrap">
    <div class="split split--top" style="align-items:end">
      <div>
        <p class="eyebrow">Further reading</p>
        <h2 class="h2 mt-2"><?= e($heading) ?></h2>
        <p class="body mt-3 measure">Patient education, written and medically reviewed by <?= e(REVIEWED_BY) ?> before publication.</p>
      </div>
      <div class="btn-row">
        <a class="btn btn--outline" href="/blog/">All articles</a>
      </div>
    </div>

    <div class="grid grid--3 mt-6">
      <?php foreach ($posts as $post): ?>
        <?= blog_card($post) ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/* -------------------------------------------------------------------------
 * FAQ accordion
 *
 * Pass the SAME array to schema_faq() so the markup and the visible text can
 * never drift apart. Answers may contain inline <a> and <strong>.
 * ---------------------------------------------------------------------- */

function faq_list(array $faqs, int $openFirst = 1): string
{
    $out = '<div class="faq">';
    foreach ($faqs as $i => $faq) {
        $open = $i < $openFirst ? ' open' : '';
        $out .= '<details' . $open . '>'
              . '<summary>' . e($faq['q']) . '</summary>'
              . '<p>' . $faq['a'] . '</p>'
              . '</details>';
    }
    return $out . '</div>';
}

/* -------------------------------------------------------------------------
 * NAP block
 * ---------------------------------------------------------------------- */

function nap_block(): string
{
    ob_start(); ?>
<dl class="dl">
  <div>
    <dt>Address</dt>
    <dd><?= e(NAP_STREET) ?>,<br><?= e(NAP_LOCALITY) ?>, <?= e(NAP_REGION) ?> <?= e(NAP_POSTCODE) ?></dd>
  </div>
  <div>
    <dt>Phone</dt>
    <dd><a href="tel:<?= e(PHONE_E164) ?>" data-track="call"><?= e(PHONE_DISPLAY) ?></a></dd>
  </div>
  <div>
    <dt>WhatsApp</dt>
    <dd><a href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp">Message <?= e(PHONE_DISPLAY) ?></a></dd>
  </div>
  <div>
    <dt>Email</dt>
    <dd><a href="mailto:<?= e(EMAIL) ?>"><?= e(EMAIL) ?></a></dd>
  </div>
  <div>
    <dt>Hours</dt>
    <dd><?= e(HOURS_DISPLAY) ?><span style="display:block;font-weight:500;color:var(--ink-muted)"><?= e(HOURS_NOTE) ?></span></dd>
  </div>
</dl>
<?php
    return (string) ob_get_clean();
}

/* -------------------------------------------------------------------------
 * Enquiry form
 *
 * Posts to /enquire.php, which validates and redirects to /thank-you so a
 * conversion event can actually fire. $source records which page produced
 * the lead.
 * ---------------------------------------------------------------------- */

function enquiry_form(string $source, array $treatments = [], bool $onInk = true, string $preferredClinic = 'Either clinic'): string
{
    if ($treatments === []) {
        $treatments = [
            'Hair transplant', 'Beard transplant', 'Hair PRP / GFC',
            'Hair fall treatment', 'Not sure — please advise',
        ];
    }

    ob_start(); ?>
<form class="form<?= $onInk ? ' form--onink' : '' ?>" action="/enquire.php" method="post" novalidate>
  <input type="hidden" name="source" value="<?= e($source) ?>">
  <p class="sr-only"><label>Leave this field empty <input type="text" name="website" tabindex="-1" autocomplete="off"></label></p>
  <div class="stack-sm">
    <div class="field">
      <label for="f-name-<?= e($source) ?>">Full name</label>
      <input class="input" id="f-name-<?= e($source) ?>" name="name" type="text" autocomplete="name" required>
    </div>
    <div class="field">
      <label for="f-phone-<?= e($source) ?>">Phone</label>
      <input class="input" id="f-phone-<?= e($source) ?>" name="phone" type="tel" inputmode="tel" autocomplete="tel" required>
    </div>
    <div class="field">
      <label for="f-treatment-<?= e($source) ?>">What are you enquiring about?</label>
      <select class="select" id="f-treatment-<?= e($source) ?>" name="treatment">
        <?php foreach ($treatments as $t): ?>
          <option><?= e($t) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="field">
      <label for="f-clinic-<?= e($source) ?>">Preferred clinic</label>
      <select class="select" id="f-clinic-<?= e($source) ?>" name="clinic">
        <?php foreach (['Gurugram (Sector 39)', 'Delhi (Rohini)', 'Either clinic'] as $clinicOption): ?>
          <option<?= $clinicOption === $preferredClinic ? ' selected' : '' ?>><?= e($clinicOption) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="field">
      <label for="f-message-<?= e($source) ?>">Anything you want the doctor to know</label>
      <textarea class="textarea" id="f-message-<?= e($source) ?>" name="message" rows="2"></textarea>
    </div>
    <div class="field" style="display:flex;align-items:flex-start;gap:8px;margin-top:4px;">
      <?php /* Never pre-ticked: consent has to be the visitor's own act. enquire.php refuses a submission without it. */ ?>
      <input type="checkbox" id="f-consent-<?= e($source) ?>" name="dpdp_consent" value="1" required style="margin-top:3px;accent-color:var(--accent);cursor:pointer;">
      <label for="f-consent-<?= e($source) ?>" style="font-size:12px;line-height:1.45;color:<?= $onInk ? 'rgba(255,255,255,0.75)' : 'var(--ink-muted)' ?>;cursor:pointer;">
        I agree that <?= e(SITE_NAME) ?> may use these details to contact me about this enquiry, as described in the <a href="/privacy-policy" style="color:<?= $onInk ? '#fff' : 'var(--ink)' ?>;text-decoration:underline;">Privacy Policy</a>.
      </label>
    </div>
    <button class="btn btn--block" type="submit" style="background:#fff;color:var(--ink)">Book My Consultation</button>
    <?php /* Short notice beside the consent box — what is collected, who receives it, how long it is kept — so consent is informed without opening the policy. Keep in step with /privacy-policy and enquire.php. */ ?>
    <p class="fine">We use your name, phone number, chosen treatment, preferred clinic and message only to contact you about this enquiry, and record the date, time, page and your IP address with it. It reaches the clinic by email (Google) and WhatsApp (Meta), whose services may process it outside India, and is kept for 12 months. You can withdraw consent at any time.</p>
  </div>
</form>
<?php
    return (string) ob_get_clean();
}

/* -------------------------------------------------------------------------
 * Closing CTA band
 * ---------------------------------------------------------------------- */

function cta_band(string $heading, string $body, string $source, array $treatments = [], string $preferredClinic = 'Either clinic'): string
{
    $clinicAttr = $preferredClinic !== 'Either clinic' ? ' data-clinic="' . e($preferredClinic) . '"' : '';
    // On a Rohini page the WhatsApp button goes to the Rohini number.
    $waUrl = $preferredClinic === 'Delhi (Rohini)' ? LOC_DELHI_WHATSAPP_URL : WHATSAPP_URL;
    ob_start(); ?>
<section class="section section--canvas" id="book">
  <div class="wrap">
    <div class="cta-band">
      <div>
        <p class="eyebrow">Next step</p>
        <h2 class="h2 mt-2"><?= e($heading) ?></h2>
        <p class="body-l mt-3" style="max-width:56ch"><?= e($body) ?></p>
        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--accent" href="/book-consultation" data-book<?= $clinicAttr ?> data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--ghost" href="<?= e($waUrl) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp Us</a>
        </div>
        <p class="fine mt-4" style="max-width:56ch">Suitability is determined after clinical assessment. This page is patient education and does not constitute medical advice.</p>
      </div>
      <div class="card card--ink card--pad-lg">
        <p class="h4" style="color:#fff">Quick enquiry</p>
        <div class="mt-3"><?= enquiry_form($source, $treatments, true, $preferredClinic) ?></div>
      </div>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/* -------------------------------------------------------------------------
 * Doctors — directory-style block
 * ---------------------------------------------------------------------- */

/**
 * A missing fact the clinic has not supplied yet, marked so it cannot be
 * missed on review. Fill the matching value in config.php to replace it.
 */
function missing_fact(string $what): string
{
    return '<span style="display:inline-block;padding:0 6px;border:1px dashed #C98A12;border-radius:4px;background:#FFF6E0;color:#7A4E00;font-weight:600">['
         . e($what) . ']</span>';
}

/** "Reg. No. …, Council · status", with placeholders for anything unknown. */
function doctor_registration(array $doc): string
{
    $part = static fn (string $key, string $what): string
        => !empty($doc[$key]) ? e((string) $doc[$key]) : missing_fact($what);

    return 'Reg. No. ' . $part('reg_number', 'registration number') . ', '
         . $part('reg_council', 'State Medical Council') . ' · '
         . $part('reg_status', 'registration status');
}

/**
 * "Doctors at DenceSpot Clinic" — Oct 2026.
 *
 * This used to be a portrait-led profile of Dr. Nyra: her photograph, a
 * "3 years, Germany" training card and a "Meet Your Doctor" button. The NMC
 * Guidelines on Ethical Advertising and Public Communication (06.10.2026) bar
 * promotional portrayal of an individual doctor and use of a doctor's
 * photograph as publicity (cl. 8.3(ii), 9.2), and personal achievements may
 * not be advertised (cl. 8.1(iii)). What a clinic page may — and must — show
 * are the directory particulars (cl. 9.1, Explanation IV): name, recognised
 * qualification, specialty and registration. That is all this renders, for
 * every doctor listed_doctors() returns, plus the page's own factual sentence
 * and the dated review byline.
 *
 * $portraitAlt is accepted so existing calls keep working; it is unused.
 */
/**
 * $reviewed: false on pages the clinic's doctor has not yet reviewed (the
 * October 2026 Rohini, laser and skin pages). The "Medically reviewed by"
 * sentence is then left out — claiming a review that has not happened would
 * itself be misleading. Set it to true once the doctor has signed the page off.
 */
function doctor_block(string $whyItMatters, string $portraitAlt = '', bool $reviewed = true): string
{
    ob_start(); ?>
<section class="section section--canvas" id="doctor">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Who you will see</p>
      <h2 class="h2 mt-2">Doctors at <?= e(SITE_NAME) ?></h2>
      <?php if (trim($whyItMatters) !== ''): ?>
        <p class="body mt-3"><?= e($whyItMatters) ?></p>
      <?php endif; ?>
    </div>

    <div class="grid grid--2 mt-5" style="max-width:860px">
      <?php foreach (listed_doctors() as $doc): ?>
        <div class="card card--pad-lg">
          <p class="h4"><?= e($doc['name']) ?></p>
          <p class="body-s mt-1"><?= e($doc['quals']) ?><?php if (!empty($doc['specialty']) && stripos((string) $doc['quals'], (string) $doc['specialty']) === false): ?> · <?= e($doc['specialty']) ?><?php endif; ?></p>
          <p class="meta mt-2"><?= doctor_registration($doc) ?></p>
          <?php if (!empty($doc['clinics'])): ?>
            <p class="meta">Consults at: <?= e($doc['clinics']) ?></p>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>

    <p class="meta mt-4">Registration can be verified on the National Medical Commission’s <a href="https://www.nmc.org.in/information-desk/indian-medical-register/" rel="noopener" target="_blank">Indian Medical Register</a>.<?php if ($reviewed): ?> Medically reviewed by <?= e(REVIEWED_BY) ?> · last reviewed <?= e(REVIEWED_DATE) ?>.<?php endif; ?></p>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/**
 * Mid-article call to action for blog posts.
 *
 * blog-footer.php already closes every post with a related-treatment card and a
 * cta_band(). This is the one that sits inside the prose, at the point where a
 * reader has just learned the thing that makes them want an answer about
 * themselves — which converts far better than a CTA they have to scroll to.
 *
 * Uses only existing classes: no new styling, and it inherits .prose spacing.
 *
 * $heading  — speaks to what the reader has just read, not to the clinic.
 * $body     — one sentence. Say what a consultation actually tells them.
 */
function blog_cta(string $heading, string $body): string
{
    ob_start(); ?>
<div class="card card--pad-lg mt-6" style="background:var(--card)">
  <p class="eyebrow" style="color:var(--ink-muted)">Your own case</p>
  <h2 class="h3 mt-2"><?= e($heading) ?></h2>
  <p class="body-s mt-2"><?= e($body) ?></p>
  <div class="btn-row mt-4">
    <a class="btn btn--ink" href="/book-consultation" data-book data-track="book"><?= icon('calendar', 18) ?> Book a consultation</a>
    <a class="btn btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask on WhatsApp</a>
  </div>
</div>
<?php
    return (string) ob_get_clean();
}

/**
 * Page-level medical review byline.
 *
 * doctor_block() already carries this line, but four public pages — /faqs,
 * /hair-transplant-cost-in-gurgaon, /cost-and-emi-options and /about-us — do
 * not call doctor_block(), so they fell back to the sitewide footer disclaimer
 * with no date and no link. llms.txt meanwhile tells answer engines that every
 * treatment page carries the attribution, so the claim ran ahead of the markup.
 *
 * Uses the existing .meta type style. On YMYL medical content a dated,
 * attributed byline is what "Who created this?" is actually asking for.
 */
function medical_review_line(): string
{
    $doc = DOCTORS['dr-nyra'] ?? null;
    if ($doc === null) {
        return '';
    }

    return sprintf(
        '<p class="meta mt-3">Written and medically reviewed by <a href="%s">%s, %s</a> · last reviewed %s</p>',
        e($doc['url']),
        e($doc['name']),
        e($doc['quals']),
        e(REVIEWED_DATE)
    );
}

/* -------------------------------------------------------------------------
 * Local / visit-us block
 * ---------------------------------------------------------------------- */

/**
 * Address, hours, contact and the two clinic maps.
 *
 * Oct 2026: the shopfront photograph that sat beside the map is gone. Its
 * window signage reads "No Pain | No Scar | No Stitch", "Permanent Hair Loss
 * Solution" and "World Class Equipments" — claims the NMC Guidelines of
 * 06.10.2026 prohibit (cl. 8.1(iii), (vi), (ix)) — so showing it republished
 * them. Bring a photograph back only once the signage has been changed.
 */
function local_block(string $heading, string $intro): string
{
    /*
     * October 2026 redesign: both clinics as cards (hp_clinic_cards(), shared
     * with the homepage). The Google Maps iframe that used to sit here loaded a
     * third-party embed on some thirty pages; the cards link to each clinic's
     * Maps listing instead, and /contact and /delhi-clinic keep their maps.
     */
    ob_start(); ?>
<section class="section section--canvas" id="local">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Our two clinics</p>
      <h2 class="h2 mt-2"><?= e($heading) ?></h2>
      <p class="body mt-3"><?= e($intro) ?></p>
    </div>
    <div class="mt-5"><?= hp_clinic_cards() ?></div>
    <?= clinic_twin_note() ?>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/**
 * On a treatment page that exists for both clinics, one line pointing to the
 * same treatment at the other clinic (from ROHINI_SERVICES). Reads the
 * current page from $page['url'], which every template sets before
 * including header.php.
 */
function clinic_twin_note(): string
{
    $here = rtrim((string) ($GLOBALS['page']['url'] ?? ''), '/');
    foreach (ROHINI_SERVICES as $svc) {
        if ($svc['gurgaon'] === $here) {
            return '<p class="body-s mt-4">' . e($svc['label']) . ' is also carried out at our Rohini, Delhi clinic: '
                 . '<a href="' . e($svc['url']) . '">' . e($svc['label']) . ' in Rohini</a>.</p>';
        }
        if ($svc['url'] === $here) {
            return '<p class="body-s mt-4">' . e($svc['label']) . ' is also carried out at our Sector 39, Gurugram clinic: '
                 . '<a href="' . e($svc['gurgaon']) . '">' . e($svc['label']) . ' in Gurugram</a>.</p>';
        }
    }
    return '';
}

/**
 * "Treatments at our Rohini clinic" — a card grid of every Rohini service
 * page except the current one. Used on the Rohini pages and the Delhi clinic
 * page so they link to one another.
 */
function rohini_services_block(string $current = '', string $heading = 'Other Treatments at Our Rohini Clinic'): string
{
    $current = rtrim($current, '/');
    $items = array_values(array_filter(ROHINI_SERVICES, static fn (array $s): bool => $s['url'] !== $current));
    if ($items === []) {
        return '';
    }

    ob_start(); ?>
<section class="section section--white" id="rohini-treatments">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow">Rohini, Delhi</p>
      <h2 class="h2 mt-2"><?= e($heading) ?></h2>
      <p class="body mt-3">Every treatment below is carried out at the Rohini clinic as well as in Sector 39, Gurugram. Each starts with an examination and a written plan.</p>
    </div>
    <div class="grid grid--3 mt-5">
      <?php foreach ($items as $svc): ?>
        <a class="card rohini-svc" href="<?= e($svc['url']) ?>">
          <p class="h4"><?= e($svc['label']) ?> in Rohini</p>
          <p class="body-s mt-1"><?= e($svc['note']) ?></p>
          <p class="meta mt-2 rohini-svc__more">View treatment <?= icon('arrow', 15) ?></p>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/**
 * ⚠ WITHDRAWN — Oct 2026. Returns nothing; callers need no change.
 *
 * This showed named patients ("Uttam", "Shukri"), a "Before & After Hair
 * Transplant Cases" gallery and a marquee of result photographs. The NMC
 * Guidelines of 06.10.2026 prohibit displaying before-and-after photographs,
 * advertising surgical results and publishing cases for promotion (cl. 8.1(v)),
 * and patient consent does not make them permissible (cl. 6.2). Do not
 * reinstate it.
 */
function before_after_slider_section(): string
{
    return '';
}

/* -------------------------------------------------------------------------
 * Awards & Accreditations block (NABH Certifications)
 * ---------------------------------------------------------------------- */

function awards_certificates_section(): string
{
    /**
     * ⚠ WITHHELD — 1 Sep 2026. Returns nothing until the accreditation is
     * evidenced. Called from index.php and the seven treatment pages; they need
     * no change, because this guard turns the section off everywhere at once.
     *
     * WHY IT WAS SWITCHED OFF. The three certificate images could not be
     * reconciled with a genuine NABH award:
     *
     *   • all three carry the SAME certificate number, 646744646-2026-001,
     *     though they claim three distinct credentials;
     *   • all three carry the same validity window, opening on the very day the
     *     files were added to the repository;
     *   • the signature in the "authorized signatures of CEO and Chairman"
     *     position reads as the name of the person who built this site, and the
     *     opposing signature renders as "Gor NABH" — a garbled "For NABH";
     *   • "Excellence in Clinical Services" reads as an award, but the copy
     *     below called the clinic "officially accredited by NABH for clinical
     *     excellence", which is a different and larger claim.
     *
     * On a YMYL medical site an unevidenced accreditation is the expensive kind
     * of mistake: it is a misrepresentation under Google's policies, and under
     * the NMC code of ethics and the Consumer Protection Act it is a misleading
     * advertisement. It also misleads someone choosing a surgeon.
     *
     * TO SWITCH IT BACK ON, all three must be true:
     *   1. genuine certificate scans replace the three files in assets/img/;
     *   2. each carries its OWN certificate number and real issue date;
     *   3. the accreditation is verifiable in NABH's public directory at
     *      https://nabh.co/ — and any item that is an award is described as an
     *      award, not as accreditation.
     * Then delete this guard. Add the hasCredential node to schema_clinic() at
     * the same time, and not before: schema must never assert what the page
     * cannot evidence.
     */
    // Oct 2026: the certificate markup that followed this return was deleted
    // (it could never render, and the NMC Guidelines of 06.10.2026 bar award
    // claims in any case). Rebuild it from git history only once the three
    // conditions above are met.
    return '';
}


