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
    return e($doc['quals']) . ' · ' . e($doc['role']);
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
    $asOf = STAT_FIGURES_AS_OF !== null
        ? 'Clinic records, ' . STAT_FIGURES_AS_OF
        : 'Clinic records';

    return stat_strip([
        [
            'value' => STAT_CASES_TREATED !== null ? number_format(STAT_CASES_TREATED) : null,
            'label' => 'Patient cases treated',
            'note'  => $asOf,
        ],
        [
            'value' => STAT_YEARS_ACTIVE !== null ? STAT_YEARS_ACTIVE . ' yrs' : null,
            'label' => 'Dr. Nyra in practice',
            'note'  => 'Germany and Gurugram combined',
        ],
        [
            'value' => '3 yrs',
            'label' => 'Clinical training in Germany',
            'note'  => 'Bio Hair Clinic and St. Georg Klinikum Eisenach',
        ],
        [
            'value' => '1',
            'label' => 'Doctor plans and performs',
            'note'  => 'The same doctor from assessment to review',
        ],
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
    ], 'Figures describe the clinic and the doctor, not your outcome. No density, timeline or success rate is guaranteed — suitability and results are decided case by case after examination.');
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
    <table class="data">
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
 * The Elfsight widget reading the live Google Business Profile.
 *
 * Live rather than typed in, for two reasons. A rating pasted into a template
 * is wrong the day after it is pasted, and — the part that matters more — a
 * rating this site cannot evidence is exactly what /patient-reviews refuses to
 * publish. Reading it from the listing means the number on the page is the
 * number on Google, and neither the clinic nor this template can move it.
 *
 * ⚠ The rating is therefore NOT marked up. AggregateRating stays gated behind
 * $rating on /patient-reviews, because Google requires a marked-up rating to
 * be visible in the page it ships with, and this one arrives from a third-party
 * script after the HTML does. See the header of includes/schema.php.
 *
 * The link below the widget is always rendered, never conditional. A widget
 * that fails to load — blocked script, ad blocker, CDN outage — would
 * otherwise leave a heading with nothing under it, which is the exact defect
 * this section was added to clear elsewhere on the page.
 */
function google_reviews_block(string $heading = 'What Patients Say on Google'): string
{
    ob_start(); ?>
<section class="section section--canvas" id="reviews">
  <div class="wrap">
    <div class="measure" style="text-align:center;margin-inline:auto">
      <span class="pill pill--dot">Patient reviews</span>
      <h2 class="h2 mt-2"><?= e($heading) ?></h2>
      <p class="body mt-3">Reviews load directly from our Google Business Profile, unedited and in the reviewer's own words. We ask every patient once at the ten-day follow-up, we do not screen who gets asked, and we do not offer anything in exchange.</p>
    </div>

    <div class="mt-6">
      <script src="https://elfsightcdn.com/platform.js" async></script>
      <div class="elfsight-app-<?= e(ELFSIGHT_REVIEWS_APP) ?>" data-elfsight-app-lazy></div>
    </div>

    <div class="btn-row mt-5" style="justify-content:center">
      <a class="btn btn--ink" href="<?= e(MAPS_URL) ?>" rel="noopener"><?= icon('star', 18) ?> Read every review on Google</a>
      <a class="btn btn--outline" href="/patient-reviews">How we collect reviews</a>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
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

function enquiry_form(string $source, array $treatments = [], bool $onInk = true): string
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
      <label for="f-message-<?= e($source) ?>">Anything you want the doctor to know</label>
      <textarea class="textarea" id="f-message-<?= e($source) ?>" name="message" rows="2"></textarea>
    </div>
    <button class="btn btn--block" type="submit" style="background:#fff;color:var(--ink)">Book My Consultation</button>
    <p class="fine">Your details are used only to arrange your consultation.</p>
  </div>
</form>
<?php
    return (string) ob_get_clean();
}

/* -------------------------------------------------------------------------
 * Closing CTA band
 * ---------------------------------------------------------------------- */

function cta_band(string $heading, string $body, string $source, array $treatments = []): string
{
    ob_start(); ?>
<section class="section section--canvas" id="book">
  <div class="wrap">
    <div class="cta-band">
      <div>
        <p class="eyebrow" style="color:var(--accent)">Next step</p>
        <h2 class="h2 mt-2"><?= e($heading) ?></h2>
        <p class="body-l mt-3" style="color:rgba(255,255,255,.72);max-width:56ch"><?= e($body) ?></p>
        <div class="btn-row mt-5">
          <a class="btn btn--lg btn--accent" href="/book-consultation"><?= icon('calendar', 18) ?> Book a Consultation</a>
          <a class="btn btn--lg btn--ghost" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 19) ?> WhatsApp Us</a>
        </div>
        <p class="fine mt-4" style="max-width:56ch">Suitability is determined after clinical assessment. This page is patient education and does not constitute medical advice.</p>
      </div>
      <div class="card card--ink card--pad-lg">
        <p class="h4" style="color:#fff">Quick enquiry</p>
        <div class="mt-3"><?= enquiry_form($source, $treatments) ?></div>
      </div>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/* -------------------------------------------------------------------------
 * Doctor E-E-A-T block
 * ---------------------------------------------------------------------- */

function doctor_block(string $whyItMatters, string $portraitAlt = 'Dr. Nyra — professional portrait'): string
{
    $doc = DOCTORS['dr-nyra'];

    ob_start(); ?>
<section class="section section--canvas" id="doctor">
  <div class="wrap">
    <div class="split split--wide-right">
      <div class="media ratio-4-5 media--shadow"><img src="/assets/img/dr-nayra.webp" alt="<?= e($portraitAlt) ?>" width="800" height="1000" loading="lazy" decoding="async"></div>
      <div>
        <p class="eyebrow">Who performs and reviews this treatment</p>
        <h2 class="h2 mt-2"><?= doctor_full() ?></h2>
        <p class="body-l mt-1" style="font-weight:600"><?= e($doc['role']) ?></p>
        <p class="body mt-3 measure">Qualified MBBS from <?= e($doc['alumni']) ?>, and holds an MD in Dermatology. Three years of clinical work in Germany followed — two at Bio Hair Clinic and one at St. Georg Klinikum Eisenach — before establishing DenceSpot in Gurugram.</p>
        <p class="body mt-3 measure"><?= e($whyItMatters) ?></p>

        <div class="grid grid--2 mt-4" style="max-width:640px">
          <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Qualification</p><p class="h4 mt-1"><?= e($doc['quals']) ?></p></div>
          <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Training</p><p class="h4 mt-1">3 years, Germany</p></div>
          <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Specialization</p><p class="h4 mt-1">Dermatology</p></div>
          <?php if (!empty($doc['reg_number'])): ?>
          <div class="card"><p class="eyebrow" style="color:var(--ink-muted)">Registration</p><p class="h4 mt-1"><?= e($doc['reg_number']) ?></p></div>
          <?php endif; ?>
        </div>

        <div class="btn-row mt-4" style="align-items:center">
          <a class="btn btn--ink" href="<?= e($doc['url']) ?>">Meet Your Doctor</a>
          <p class="meta" style="max-width:30ch">Medically reviewed by <?= e(REVIEWED_BY) ?> · last reviewed <?= e(REVIEWED_DATE) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/* -------------------------------------------------------------------------
 * Local / visit-us block
 * ---------------------------------------------------------------------- */

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
    <a class="btn btn--ink" href="/book-consultation"><?= icon('calendar', 18) ?> Book a consultation</a>
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

function local_block(string $heading, string $intro): string
{
    ob_start(); ?>
<section class="section section--white" id="local">
  <div class="wrap">
    <div class="split split--top" style="align-items:start">
      <div>
        <p class="eyebrow">Visit the clinic</p>
        <h2 class="h2 mt-2"><?= e($heading) ?></h2>
        <p class="body mt-3 measure"><?= e($intro) ?></p>
        <?= nap_block() ?>
        <div class="btn-row mt-4">
          <a class="btn btn--outline" href="<?= e(MAPS_URL) ?>" rel="noopener"><?= icon('pin', 17) ?> Directions on Google Maps</a>
          <a class="btn btn--outline" href="/contact">Full clinic details</a>
        </div>
      </div>
      <div>
        <div class="media ratio-16-10">
          <iframe title="Google Map showing DenceSpot Clinic at 1123, Sector 39 Road, Jharsa, Sector 39, Gurugram, Haryana 122003" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3508.3229126883884!2d77.0438613!3d28.439680699999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5e4f6f45491%3A0x9dc43165216a74e6!2sDencespot%20Clinic!5e0!3m2!1sen!2sus!4v1787587082143!5m2!1sen!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
        </div>
        <div class="grid grid--2 mt-3">
          <div class="media ratio-4-3 media--sm media--shadow"><img src="/assets/img/clinic-front-board.jpg" alt="DenceSpot Clinic shopfront on Sector 39 Road, Jharsa, Gurugram, showing the hair transplant and PRP treatment signage" width="800" height="600" loading="lazy"></div>
          <div class="card">
            <p class="eyebrow" style="color:var(--ink-muted)">Getting here</p>
            <ul class="stack-sm mt-2">
              <?php foreach (DIRECTIONS as $line): ?>
                <?php if ($line !== null): ?>
              <li class="meta"><?= e($line) ?></li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/* -------------------------------------------------------------------------
 * Before & After Interactive Slider block
 * ---------------------------------------------------------------------- */

function before_after_slider_section(): string
{
    $results = [
        [
            'id' => 'uttam-gurgaon',
            'title' => 'Uttam — Hairline & Temple Restoration',
            'category' => 'FUE Hair Transplant (Gurugram)',
            'img' => '/assets/img/case-uttam-gurgaon.jpg',
            'badge' => 'BEFORE & AFTER RESULT',
            'type' => 'image',
            'desc' => 'Receding hairline & frontal scalp completely restored with age-appropriate hairline design and dense graft placement.',
            'meta' => 'Procedure: FUE · Location: Gurgaon · Reviewed at 12 Months'
        ],
        [
            // NOT a result, and must never be badged as one. The photograph is
            // the operating day: hairline design on the left, grafts minutes
            // after placement on the right. Nothing has grown yet. Calling it a
            // before-and-after would fail the "stated interval" test this site
            // tells patients to apply to every clinic, including this one.
            'id' => 'shukri-europe',
            'title' => 'Shukri — Frontal Zone, Procedure Day',
            'category' => 'Advanced Micro-FUE (International)',
            'img' => '/assets/img/case-shukri-europe.jpg',
            'badge' => 'ON THE DAY OF SURGERY',
            'type' => 'image',
            'desc' => 'Hairline design and 2,800 grafts photographed immediately after placement. Growth is judged at ten to twelve months, so this shows the work, not the outcome.',
            'meta' => 'Procedure: Micro-FUE · 2,800 grafts · Photographed on the day of surgery'
        ],
    ];

    /**
     * The video lightbox at the foot of this function is markup for a feature
     * nothing currently uses: no entry in $results carries type => 'video',
     * because no consented patient video exists yet.
     *
     * It shipped unconditionally, and although display:none hid it from
     * sighted users, the <h3> inside it stayed in the DOM — so every text
     * extractor that reads this page, Google's included and the AI answer
     * engines especially, saw a "Patient Video Testimonial" heading with
     * nothing whatsoever beneath it. An empty section reads as an unfinished
     * clinic, which costs more trust than never having claimed the section.
     *
     * So the modal now renders only when something can open it. Add a video
     * case to $results and it returns by itself — same gate as $rates, $rating
     * and the STAT_* constants.
     */
    $hasVideo = array_filter($results, static fn (array $r): bool => ($r['type'] ?? '') === 'video') !== [];

    ob_start(); ?>
<section class="section section--white" id="results-gallery">
  <div class="wrap">
    <div class="measure" style="text-align: center; margin-inline: auto;">
      <span class="pill pill--dot">Patient results</span>
      <h2 class="h2 mt-2">Before &amp; After Hair Transplant Cases in Gurgaon</h2>
      <p class="body mt-3">Consented photographs, with the hair never digitally altered, from patients treated personally by <strong>Dr. Nyra</strong> at DenceSpot Clinic, Sector 39 Gurugram. Results vary between patients, and hair restoration is judged at ten to twelve months.</p>
    </div>

    <!-- Results Cards Grid (Matching Awards Section Style) -->
    <div class="grid grid--2 mt-6" style="gap:24px">
      <?php foreach ($results as $r): ?>
        <div class="card card--pad-lg cert-card" style="display:flex; flex-direction:column; justify-content:space-between;">
          <div>
            <div class="media ratio-16-10 media--shadow" style="border:1px solid var(--line); position:relative; overflow:hidden; border-radius:var(--r-md); background:#1e183a; cursor:pointer;" onclick="<?= $r['type'] === 'video' ? "openVideoModal('" . e($r['video_url']) . "', '" . e($r['title']) . "')" : "openCertModal('" . e($r['img']) . "', '" . e($r['title']) . "')" ?>">
              <img src="<?= e($r['img']) ?>" alt="<?= e($r['title']) ?>" width="800" height="500" loading="lazy" style="width:100%; height:100%; object-fit:cover; transition:transform 0.3s ease;">
              
              <?php if ($r['type'] === 'video'): ?>
                <div style="position:absolute; inset:0; background:rgba(26,17,71,0.4); display:flex; align-items:center; justify-content:center;">
                  <div style="width:64px; height:64px; border-radius:50%; background:var(--accent); color:#fff; display:flex; align-items:center; justify-content:center; box-shadow:0 8px 24px rgba(16,185,129,0.5); transition:transform 0.2s ease;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                  </div>
                </div>
              <?php endif; ?>
            </div>

            <div style="margin-top:16px;">
              <span class="pill pill--dot" style="font-size:10px"><?= e($r['badge']) ?></span>
              <h3 class="h3 mt-2"><?= e($r['title']) ?></h3>
              <p class="body-s mt-2"><?= e($r['desc']) ?></p>
            </div>
          </div>

          <div style="margin-top:16px; padding-top:14px; border-top:1px solid var(--line); display:flex; align-items:center; justify-space-between; flex-wrap:wrap; gap:10px;">
            <span class="meta"><?= e($r['meta']) ?></span>
            <button type="button" class="btn btn--sm btn--outline" onclick="<?= $r['type'] === 'video' ? "openVideoModal('" . e($r['video_url']) . "', '" . e($r['title']) . "')" : "openCertModal('" . e($r['img']) . "', '" . e($r['title']) . "')" ?>" style="margin-left:auto;">
              <?= $r['type'] === 'video' ? '▶ Watch Video' : '🔍 Enlarge View' ?>
            </button>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="btn-row mt-6" style="justify-content:center">
      <a class="btn btn--ink" href="/hair-transplant-results-gurgaon">View Full Results Gallery</a>
      <a class="btn btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp"><?= icon('whatsapp', 18) ?> Ask Cases Like Yours</a>
    </div>
  </div>

  <!-- Smooth Infinite Sliding Marquee Track for Patient Cases -->
  <div class="marquee mt-6">
    <div class="marquee-track">
      <?php
      /**
       * Consented patient composites only, from includes/gallery-manifest.php.
       *
       * This used to glob() the gallery folder, so the marquee scrolled the
       * NABH certificate images and twelve creatives belonging to another
       * clinic across the homepage, every one of them captioned "DenceSpot
       * Patient Result Transformation". Never restore the glob.
       */
      $galleryImages = array_column(gallery_images(CAT_RESULT), 'url');

      if ($galleryImages === []) {
          $galleryImages = ['/assets/img/case-uttam-gurgaon.jpg'];
      }
      // Duplicate array to build 2 identical sets for 100% infinite endless loop without gaps
      $marqueeLoop = array_merge($galleryImages, $galleryImages);
      $marqueeIdx = 0;
      ?>
      <?php foreach ($marqueeLoop as $imgUrl): ?>
        <?php $marqueeIdx++; $caseNo = (($marqueeIdx - 1) % max(1, count($galleryImages))) + 1; ?>
        <img src="<?= e($imgUrl) ?>" alt="Before and after a hair transplant at DenceSpot Clinic, Sector 39 Gurugram — case <?= $caseNo ?>" loading="lazy" onclick="openCertModal('<?= e($imgUrl) ?>', 'Hair transplant case <?= $caseNo ?> — DenceSpot Clinic, Gurugram')" style="cursor:pointer;">
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php if ($hasVideo): ?>
<!-- Video Player Lightbox Modal — rendered only when a case can open it. -->
<div id="video-modal" style="display:none; position:fixed; inset:0; z-index:9999; background:rgba(0,0,0,0.88); backdrop-filter:blur(8px); align-items:center; justify-content:center; padding:20px;" onclick="closeVideoModal(event)">
  <div style="position:relative; max-width:900px; width:100%; background:#100d28; border-radius:16px; overflow:hidden; box-shadow:0 25px 50px -12px rgba(0,0,0,0.7); border:1px solid rgba(255,255,255,0.15);">
    <div style="display:flex; align-items:center; justify-content:space-between; padding:16px 24px; border-bottom:1px solid rgba(255,255,255,0.1); color:#fff;">
      <h3 id="video-modal-title" class="h4" style="margin:0; color:#fff;">Patient Video Testimonial</h3>
      <button type="button" onclick="closeVideoModalForce()" style="background:none; border:none; font-size:24px; cursor:pointer; color:#fff;">&times;</button>
    </div>
    <div style="position:relative; padding-bottom:56.25%; height:0; background:#000;">
      <iframe id="video-modal-iframe" src="" style="position:absolute; top:0; left:0; width:100%; height:100%; border:0;" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </div>
</div>
<?php endif; ?>
<?php
    return (string) ob_get_clean();
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
     *   2. each carries its OWN certificate number and real issue date, and the
     *      $certs array below is corrected to match;
     *   3. the accreditation is verifiable in NABH's public directory at
     *      https://nabh.co/ — and any item that is an award is described as an
     *      award, not as accreditation.
     * Then delete this guard. Add the hasCredential node to schema_clinic() at
     * the same time, and not before: schema must never assert what the page
     * cannot evidence.
     */
    return '';

    $certs = [
        [
            'id' => 'cert-1',
            'title' => 'Excellence in Clinical Services',
            'category' => 'Dermatology & Cosmetology',
            'issuer' => 'National Accreditation Board for Hospitals & Healthcare Providers (NABH)',
            'img' => '/assets/img/cert-nabh-excellence.jpg',
            'cert_no' => '646744646-2026-001',
            'validity' => '01 Sep 2026 – 31 Aug 2029',
            'badge' => 'NABH Clinical Excellence',
            'alt' => 'NABH Certificate - Excellence in Clinical Services Dermatology & Cosmetology - DenceSpot Clinic'
        ],
        [
            'id' => 'cert-2',
            'title' => 'NABH Accreditation — Dermatology Clinic',
            'category' => 'Dermatology Clinic Standards (Edition 1, 2021)',
            'issuer' => 'National Accreditation Board for Hospitals & Healthcare Providers (NABH)',
            'img' => '/assets/img/cert-nabh-dermatology.jpg',
            'cert_no' => '646744646-2026-001',
            'validity' => '01 Sep 2026 – 31 Aug 2029',
            'badge' => 'NABH Accredited',
            'alt' => 'NABH Accreditation Certificate - Dermatology Clinic - DenceSpot Clinic'
        ],
        [
            'id' => 'cert-3',
            'title' => 'NABH Accreditation — Allopathic Clinic',
            'category' => 'Allopathic Clinic Standards (Edition 1, 2021)',
            'issuer' => 'National Accreditation Board for Hospitals & Healthcare Providers (NABH)',
            'img' => '/assets/img/cert-nabh-allopathic.jpg',
            'cert_no' => '646744646-2026-001',
            'validity' => '01 Sep 2026 – 31 Aug 2029',
            'badge' => 'NABH Accredited',
            'alt' => 'NABH Accreditation Certificate - Allopathic Clinic - DenceSpot Clinic'
        ],
    ];

    ob_start(); ?>
<section class="section section--white" id="awards">
  <div class="wrap">
    <div class="measure" style="text-align: center; margin-inline: auto;">
      <span class="pill pill--dot">Official Accreditations</span>
      <h2 class="h2 mt-2">Awards &amp; NABH Certifications</h2>
      <p class="body mt-3">DenceSpot Clinic is officially accredited by the <strong>National Accreditation Board for Hospitals &amp; Healthcare Providers (NABH)</strong> for clinical excellence, patient safety, and high-standard care in Dermatology, Cosmetology &amp; Allopathic Medicine.</p>
    </div>

    <!-- Official Certificates Cards Grid -->
    <div class="grid grid--3 mt-6">
      <?php foreach ($certs as $c): ?>
        <div class="card card--pad-lg text-center cert-card" style="text-align:center">
          <div class="media ratio-4-5 media--shadow cert-img-wrap" style="border:1px solid var(--line); overflow:hidden; border-radius:var(--r-md); background:#fafafa; cursor:pointer;" onclick="openCertModal('<?= e($c['img']) ?>', '<?= e($c['title']) ?>')">
            <img src="<?= e($c['img']) ?>" alt="<?= e($c['alt']) ?>" width="800" height="1100" loading="lazy" style="width:100%; height:auto; object-fit:contain; transition:transform 0.3s ease;">
          </div>
          <span class="pill pill--dot mt-3" style="font-size:10px"><?= e($c['badge']) ?></span>
          <h3 class="h4 mt-2"><?= e($c['title']) ?></h3>
          <p class="meta mt-1"><?= e($c['category']) ?></p>
          <p class="fine mt-2" style="color:var(--ink-muted)">Cert No: <strong><?= e($c['cert_no']) ?></strong><br>Valid: <?= e($c['validity']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Smooth Infinite Marquee Carousel -->
  <div class="marquee mt-6">
    <div class="marquee-track">
      <?php
      $certSet = array_merge($certs, $certs, $certs);
      $certDouble = array_merge($certSet, $certSet);
      ?>
      <?php foreach ($certDouble as $c): ?>
        <img src="<?= e($c['img']) ?>" alt="<?= e($c['alt']) ?>" loading="lazy" onclick="openCertModal('<?= e($c['img']) ?>', '<?= e($c['title']) ?>')" style="cursor:pointer;">
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php
    return (string) ob_get_clean();
}


