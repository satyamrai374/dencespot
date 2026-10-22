<?php
/**
 * /new-designe — full-page build of the supplied homepage comp.
 *
 * Dark-green and gold identity, Playfair display type, nine sections from the
 * sticky masthead down to the patterned footer.
 *
 * ── WHY THIS PAGE IS SELF-CONTAINED ──────────────────────────────────────
 * It does not include includes/header.php or includes/footer.php. The comp is
 * a different design system from the live site — different palette, different
 * type ramp, different chrome — so reusing that shell would mean fighting
 * site.css on every rule. Everything visual lives in the <style> block below,
 * scoped under .nd-*, so nothing here can leak into or be broken by site.css.
 *
 * What it does reuse is the data. includes/config.php remains the single
 * source of truth for the name, address, phone, email, hours and map, and
 * includes/blog.php still drives the article strip. No NAP is retyped here.
 *
 * ── WHAT WAS CORRECTED FROM THE COMP, AND WHY ────────────────────────────
 * The comp was mocked up with placeholder business details and several claims
 * this site is under standing instruction not to publish. Layout, spacing,
 * colour and type are replicated; the following content was corrected.
 *
 *  1. Brand "DensPot Clinic"            → SITE_NAME ("DenceSpot Clinic").
 *  2. Phone "+91 98765 43210"           → PHONE_DISPLAY.
 *  3. "SCO 123, Sector 14, Gurgaon,
 *     Haryana – 122001"                 → the canonical NAP (Sector 39,
 *                                         Jharsa, 122003). Publishing a
 *                                         fourth address variant is the exact
 *                                         failure LOCAL-SEO-STRATEGY §3
 *                                         documents.
 *  4. "info@denspotclinic.com"          → EMAIL. That domain is not ours.
 *  5. "Mon – Sat: 10:00 AM – 7:00 PM"   → HOURS_DISPLAY, which closes at
 *                                         20:00 and matches
 *                                         openingHoursSpecification.
 *  6. "© 2024"                          → date('Y').
 *  7. "5000+ Happy Patients",
 *     "10+ Years of Experience",
 *     "95% Patient Satisfaction"        → withheld. config.php names these
 *                                         three verbatim as claims not to be
 *                                         reinstated without evidence, and
 *                                         STAT_CASES_TREATED /
 *                                         STAT_YEARS_ACTIVE are still null.
 *                                         The strip renders four evidenced
 *                                         figures instead and upgrades itself
 *                                         the moment those constants are set.
 *  8. "Trusted by Thousands"            → same reason; replaced with the
 *                                         clinic's actual checkable claim.
 *  9. Testimonials from "Rohit Mehta"
 *     and "Priya Sharma", 5 stars       → withheld. /patient-reviews exists
 *                                         specifically to say this site will
 *                                         not publish written testimonials or
 *                                         a star rating it cannot evidence.
 *                                         $ndTestimonials below is the one
 *                                         place to paste genuine ones; while
 *                                         it is empty the slot keeps its
 *                                         geometry and points at Google.
 * 10. Two-panel before/after cards      → one composite per card. The
 *                                         consented files are single images
 *                                         with both panels and the labels
 *                                         burnt in, and gallery-manifest.php
 *                                         forbids splitting them.
 * 11. "Hair Transplant Result
 *     (6 Months)" captions              → withheld. The manifest records that
 *                                         per-case technique and review
 *                                         interval were never supplied.
 * 12. "Laser Hair Removal" in the nav,
 *     service grid and filter tabs      → no such page or service exists
 *                                         here. Mapped to the real
 *                                         light-based treatment,
 *                                         /hair-led-therapy-in-gurgaon.
 * 13. "Watch Our Video"                 → there is no video. Repointed at the
 *                                         results page, same button geometry.
 * 14. Facebook / Instagram / YouTube /
 *     LinkedIn icons                    → no verified profile URLs exist
 *                                         (CLINIC_SAME_AS carries only the
 *                                         GBP listing). Four real channels
 *                                         render in the same four circles
 *                                         rather than four dead links.
 * 15. Marketing copy — "permanent",
 *     "life-changing", "safest"         → reworded. NMC advertising code; the
 *                                         rest of the site is written to it.
 * 16. Before/after filter tabs          → rendered as links, not filters. No
 *                                         consented file carries a category,
 *                                         so a working filter would leave
 *                                         three tabs empty and a faked one
 *                                         would sort patient photographs into
 *                                         treatments nobody confirmed.
 *
 * ── INDEXING ─────────────────────────────────────────────────────────────
 * noindex, and excluded in sitemap.php. This is a second homepage: left
 * indexable it would compete with / for the brand query, which is the
 * cannibalisation SEO-STRATEGY §5 calls the old site's central failure. It
 * also emits no JSON-LD, so there is no second LocalBusiness node
 * contradicting the one on /.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/blog.php';
require_once __DIR__ . '/includes/gallery-manifest.php';

/* -------------------------------------------------------------------------
 * Icons
 *
 * Local rather than components.php's icon(): that set is drawn at 1.7 stroke
 * for the live site's design system, and this comp is a finer 1.5 line.
 * Keeping them here also means the page has no dependency on a shared glyph
 * set that could be restyled underneath it.
 * ---------------------------------------------------------------------- */

function nd_icon(string $name, int $size = 24, float $stroke = 1.5): string
{
    $paths = [
        'leaf'       => '<path d="M12.5 21c0-7 2.2-11.2 5.8-13.4-.3 6.4-2.3 9.8-5.8 11.4"/><path d="M12.5 21C12.5 12 9.3 6.6 4 4.6c.2 7.3 3 11.8 8.5 14.4z"/>',
        'phone'      => '<path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a1 1 0 0 1-1 1A16 16 0 0 1 4 5a1 1 0 0 1 1-1z"/>',
        'arrow'      => '<path d="M5 12h13M12.5 6l6 6-6 6"/>',
        'arrow-left' => '<path d="M19 12H6M11.5 6l-6 6 6 6"/>',
        'chevron'    => '<path d="M6 9.5l6 6 6-6"/>',
        'menu'       => '<path d="M4 7h16M4 12h16M4 17h16"/>',
        'close'      => '<path d="M6 6l12 12M18 6L6 18"/>',
        'shield'     => '<path d="M12 3l7 3v5.5c0 4.2-2.9 7.6-7 9-4.1-1.4-7-4.8-7-9V6z"/><path d="M9.5 12l1.8 1.8L15 10"/>',
        'team'       => '<circle cx="9" cy="8" r="3.2"/><path d="M3 20c0-3.3 2.7-5.5 6-5.5s6 2.2 6 5.5"/><path d="M16 5.5a3.2 3.2 0 0 1 0 6M17.5 14.8c2.1.7 3.5 2.5 3.5 5.2"/>',
        'plan'       => '<rect x="4" y="3.5" width="16" height="17" rx="3"/><path d="M8 9h8M8 13h6M8 17h4"/>',
        'hairline'   => '<path d="M4 16.5c3-6.5 13-6.5 16 0"/><path d="M7 16.5v3.5M12 14.8v5.2M17 16.5v3.5"/>',
        'beard'      => '<path d="M4 18c0-5 3.6-8 8-8s8 3 8 8"/><path d="M7 10.5C6 8 6.4 5 8 3.5M17 10.5c1-2.5.6-5.5-1-7"/>',
        'droplet'    => '<path d="M12 3.5c3.2 3.6 5.5 6.4 5.5 9.3a5.5 5.5 0 0 1-11 0c0-2.9 2.3-5.7 5.5-9.3z"/>',
        'laser'      => '<rect x="6" y="3.5" width="12" height="7" rx="2.5"/><path d="M12 10.5v3M9 14.5l3 5 3-5"/><path d="M4.5 6.5h-2M21.5 6.5h-2"/>',
        'face'       => '<circle cx="12" cy="12" r="8.5"/><path d="M9.3 10.5h.01M14.7 10.5h.01M9 15c1.8 1.5 4.2 1.5 6 0"/>',
        'microscope' => '<path d="M10.5 3.5h3v7h-3z"/><path d="M7.5 13a5 5 0 0 0 9 3.2"/><path d="M5 20.5h14M9.5 20.5v-3"/>',
        'clock'      => '<circle cx="12" cy="12" r="8.5"/><path d="M12 7.2V12l3.2 2"/>',
        'pin'        => '<path d="M12 21s-7-5.5-7-10a7 7 0 1 1 14 0c0 4.5-7 10-7 10z"/><circle cx="12" cy="11" r="2.5"/>',
        'mail'       => '<rect x="3" y="5" width="18" height="14" rx="2.5"/><path d="M3.5 7l8.5 6 8.5-6"/>',
        'whatsapp'   => '<path d="M21 11.5a8.5 8.5 0 0 1-12.6 7.4L3 20.5l1.7-5.2A8.5 8.5 0 1 1 21 11.5z"/><path d="M9 9.2c.4 2.6 2.2 4.4 4.8 4.8"/>',
        'star'       => '<path d="M12 4l2.4 5 5.6.7-4 3.9 1 5.4-5-2.7-5 2.7 1-5.4-4-3.9 5.6-.7z"/>',
        'google'     => '<circle cx="12" cy="12" r="8.5"/><path d="M16.2 12H12v.3"/><path d="M16.2 12a4.2 4.2 0 1 1-1.3-3"/>',
        'gallery'    => '<rect x="3.5" y="5" width="17" height="14" rx="2.5"/><circle cx="9" cy="10" r="1.6"/><path d="M4.2 17.2l4.3-4.3 3.5 3.5 3-3 4.8 4.8"/>',
        'award'      => '<circle cx="12" cy="9" r="5.5"/><path d="M8.5 13.8L7 21l5-2.4L17 21l-1.5-7.2"/>',
        'doctor'     => '<circle cx="12" cy="7.5" r="3.5"/><path d="M5 21c0-4 3.1-6.5 7-6.5s7 2.5 7 6.5"/><path d="M12 15.5v2.5M10.8 16.8h2.4"/>',
        'lock'       => '<rect x="4.5" y="10" width="15" height="10.5" rx="2.5"/><path d="M8 10V7.5a4 4 0 0 1 8 0V10"/>',
        'calendar'   => '<rect x="3.5" y="5" width="17" height="15.5" rx="3"/><path d="M8 3v4M16 3v4M3.5 10h17"/>',
        'quote'      => '<path d="M9.5 6C6.5 7.5 5 10 5 13h3.5V18H4v-5c0-3.5 1.8-6 5.5-7.5z"/><path d="M19.5 6C16.5 7.5 15 10 15 13h3.5V18H14v-5c0-3.5 1.8-6 5.5-7.5z"/>',
    ];

    return sprintf(
        '<svg class="nd-i" width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="%2$s" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">%3$s</svg>',
        $size,
        $stroke,
        $paths[$name] ?? $paths['star']
    );
}

/**
 * Service and article cards call for photography this site does not own.
 * Rather than borrow a consented patient composite — which behind a service
 * card would read as a result claim for that service — the slot renders a
 * branded panel carrying the treatment's own glyph. Give any card an 'image'
 * and the photograph takes over with no other change.
 */
function nd_media(?string $src, string $alt, string $icon, int $w = 800, int $h = 550): string
{
    if ($src !== null && $src !== '') {
        return sprintf(
            '<img src="%s" alt="%s" width="%d" height="%d" loading="lazy" decoding="async">',
            e($src),
            e($alt),
            $w,
            $h
        );
    }

    return '<span class="nd-tile" aria-hidden="true">' . nd_icon($icon, 40, 1.2) . '</span>';
}

/* -------------------------------------------------------------------------
 * Navigation
 *
 * The comp's eight items, each repointed at a page that exists. "Laser Hair
 * Removal" became the real light-based treatment, and "Other Treatments"
 * became a genuine dropdown over six pages that had nowhere to be linked from.
 * ---------------------------------------------------------------------- */

$ndNav = [
    ['label' => 'Home',                'url' => '/', 'active' => true],
    ['label' => 'About Us',            'url' => '/about-us'],
    ['label' => 'Hair Transplant',     'url' => '/hair-transplant-in-gurgaon'],
    ['label' => 'PRP Treatment',       'url' => '/hair-prp-treatment-in-gurgaon'],
    ['label' => 'Laser & LED Therapy', 'url' => '/hair-led-therapy-in-gurgaon'],
    ['label' => 'Other Treatments',    'url' => '#', 'children' => [
        ['label' => 'Beard Transplant',        'url' => '/beard-transplant-gurgaon'],
        ['label' => 'GFC Treatment',           'url' => '/gfc-treatment-in-gurgaon'],
        ['label' => 'Hair Mesotherapy',        'url' => '/hair-mesotherapy-in-gurgaon'],
        ['label' => 'Scalp Micropigmentation', 'url' => '/scalp-micropigmentation-in-gurgaon'],
        ['label' => 'Face PRP',                'url' => '/face-prp-treatment-in-gurgaon'],
        ['label' => 'Women’s Hair Loss',       'url' => '/womens-hair-loss-treatment-in-gurgaon'],
    ]],
    ['label' => 'Gallery',             'url' => '/gallery'],
    ['label' => 'Blog',                'url' => '/blog/'],
];

/* The comp's four under-hero assurances. */
$ndHeroFeatures = [
    ['icon' => 'shield',   'line1' => 'Safe & Proven',   'line2' => 'Techniques'],
    ['icon' => 'doctor',   'line1' => 'Doctor-Led',      'line2' => 'Every Case'],
    ['icon' => 'plan',     'line1' => 'Personalised',    'line2' => 'Treatment Plans'],
    ['icon' => 'hairline', 'line1' => 'Natural Looking', 'line2' => 'Results'],
];

/* -------------------------------------------------------------------------
 * Services. 'image' is null on every card; see nd_media() for why.
 * ---------------------------------------------------------------------- */

$ndServices = [
    [
        'title' => 'Hair Transplant',
        'desc'  => 'FUE, DHI and FUT, planned around your own donor supply.',
        'url'   => '/hair-transplant-in-gurgaon',
        'icon'  => 'hairline',
        'image' => null,
    ],
    [
        'title' => 'Hair PRP Treatment',
        'desc'  => 'Platelet-rich plasma to support thinning hair. Non-surgical.',
        'url'   => '/hair-prp-treatment-in-gurgaon',
        'icon'  => 'droplet',
        'image' => null,
    ],
    [
        'title' => 'Laser & LED Therapy',
        'desc'  => 'Low-level light therapy. Painless, and no downtime.',
        'url'   => '/hair-led-therapy-in-gurgaon',
        'icon'  => 'laser',
        'image' => null,
    ],
    [
        'title' => 'Hair Fall Treatment',
        'desc'  => 'The cause found and treated first, not just the shedding.',
        'url'   => '/hair-fall-treatment-in-gurgaon',
        'icon'  => 'microscope',
        'image' => null,
    ],
    [
        'title' => 'Beard Transplant',
        'desc'  => 'Gaps, thin sideburns and patchy growth, at the right angle.',
        'url'   => '/beard-transplant-gurgaon',
        'icon'  => 'beard',
        'image' => null,
    ],
    [
        'title' => 'Face PRP & Skin',
        'desc'  => 'Skin and scalp treatment led by a dermatologist.',
        'url'   => '/face-prp-treatment-in-gurgaon',
        'icon'  => 'face',
        'image' => null,
    ],
];

/* Links, not filters — see note 16 in the header block. */
$ndCaseTabs = [
    ['label' => 'Hair Transplant',  'url' => '/hair-transplant-results-gurgaon', 'active' => true],
    ['label' => 'PRP Treatment',    'url' => '/hair-prp-treatment-in-gurgaon'],
    ['label' => 'Beard Transplant', 'url' => '/beard-transplant-gurgaon'],
    ['label' => 'Patient Stories',  'url' => '/patient-stories/'],
];

$ndCases = array_slice(gallery_images(CAT_RESULT), 0, 6);

$ndWhy = [
    ['icon' => 'team',     'title' => 'Expert & Experienced Team',   'sub' => DOCTORS['dr-nyra']['name'] . ', ' . DOCTORS['dr-nyra']['quals']],
    ['icon' => 'laser',    'title' => 'Three Techniques',            'sub' => 'FUE, DHI and FUT — chosen, not defaulted'],
    ['icon' => 'plan',     'title' => 'Personalised Treatment Plans','sub' => 'Written after examination, never before'],
    ['icon' => 'lock',     'title' => 'Safe & Hygienic Environment', 'sub' => 'One clinic, one team, start to finish'],
    ['icon' => 'hairline', 'title' => 'Natural Looking Results',     'sub' => 'Hairlines designed to age with you'],
    ['icon' => 'doctor',   'title' => 'One Doctor, Start to Finish', 'sub' => 'Who plans your case also performs it'],
];

/* -------------------------------------------------------------------------
 * Figures.
 *
 * Same rule as clinic_stat_strip(): a config figure renders once it has been
 * supplied and evidenced, and an evidenced fallback holds the slot until then.
 * Always exactly four, so the comp's four-up strip never breaks.
 * ---------------------------------------------------------------------- */

$ndStats = [];

if (STAT_CASES_TREATED !== null) {
    $ndStats[] = ['icon' => 'team', 'value' => number_format(STAT_CASES_TREATED) . '+', 'label' => 'Patient cases treated'];
}
if (STAT_YEARS_ACTIVE !== null) {
    $ndStats[] = ['icon' => 'award', 'value' => STAT_YEARS_ACTIVE . '+', 'label' => 'Years in practice'];
}
foreach ([
    ['icon' => 'microscope', 'value' => '3 yrs', 'label' => 'Clinical training in Germany'],
    ['icon' => 'doctor',     'value' => '1',     'label' => 'Doctor plans and performs'],
    ['icon' => 'laser',      'value' => '3',     'label' => 'Techniques performed here'],
    ['icon' => 'calendar',   'value' => '12 mo', 'label' => 'Follow-up reviews scheduled'],
] as $ndFallback) {
    if (count($ndStats) >= 4) {
        break;
    }
    $ndStats[] = $ndFallback;
}
$ndStats = array_slice($ndStats, 0, 4);

/* -------------------------------------------------------------------------
 * Testimonials.
 *
 * ⚠ THE ONLY PLACE TO ADD THESE. Paste genuine, attributable reviews as
 * ['quote' => '…', 'name' => '…', 'place' => '…', 'stars' => 5]. Do not
 * paraphrase, do not compose, and do not carry over the comp's "Rohit Mehta"
 * and "Priya Sharma" — those are lorem ipsum with names attached. While this
 * array is empty the section keeps its shape and points at the public Google
 * listing, which is the position /patient-reviews takes and for the same
 * reason: a rating marked up or shown must be one we can evidence.
 * ---------------------------------------------------------------------- */

$ndTestimonials = [];

/* Latest three articles, newest first, straight from the blog registry. */
$ndPosts = array_slice(blog_posts(), 0, 3);

$ndTreatments = [
    'Hair transplant',
    'Beard transplant',
    'Hair PRP / GFC therapy',
    'Laser / LED therapy',
    'Hair fall treatment',
    'Women’s hair loss',
    'Skin & face treatment',
    'Not sure — please advise',
];

$ndSocials = [
    ['icon' => 'google',   'url' => MAPS_URL,     'label' => 'DenceSpot Clinic on Google Maps', 'track' => null],
    ['icon' => 'whatsapp', 'url' => WHATSAPP_URL, 'label' => 'Message the clinic on WhatsApp',  'track' => 'whatsapp'],
    ['icon' => 'phone',    'url' => 'tel:' . PHONE_E164, 'label' => 'Call ' . PHONE_DISPLAY,    'track' => 'call'],
    ['icon' => 'mail',     'url' => 'mailto:' . EMAIL,   'label' => 'Email ' . EMAIL,           'track' => null],
];
?>
<!DOCTYPE html>
<html lang="en-IN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Advanced Hair Transplant Solutions in Gurgaon | <?= e(SITE_NAME) ?></title>
<meta name="description" content="Hair transplant, PRP, laser therapy and skin treatment at <?= e(SITE_NAME) ?>, <?= e(NAP_LOCALITY) ?>. Assessed, planned and performed by <?= e(DOCTORS['dr-nyra']['name']) ?>.">

<?php /* Second homepage: never let it compete with / for the brand query. */ ?>
<meta name="robots" content="noindex, follow">
<link rel="canonical" href="<?= e(abs_url('/')) ?>">

<meta name="theme-color" content="#0B3B2C">
<link rel="icon" href="/assets/img/favicon.svg" type="image/svg+xml">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&amp;family=Inter:wght@400;500;600;700;800&amp;family=Dancing+Script:wght@500;600;700&amp;display=swap">
<link rel="preload" as="image" href="/assets/img/dr-nayra.webp" fetchpriority="high">

<style>
/* ==========================================================================
   /new-designe — scoped stylesheet.

   Every selector is namespaced .nd-*, and site.css is deliberately not loaded,
   so this page and the live design system cannot collide in either direction.
   ========================================================================== */

.nd {
  /* Palette sampled from the comp. */
  --nd-green:     #0B3B2C;
  --nd-green-d:   #082C21;
  --nd-green-l:   #12523D;
  --nd-gold:      #BE9556;
  --nd-gold-l:    #D8B57E;
  --nd-tan:       #E3C79F;
  --nd-tan-d:     #D3B183;
  --nd-sand:      #EFE0C7;
  --nd-cream:     #F4ECDF;
  --nd-cream-2:   #FBF7F1;
  --nd-mist:      #F7F5F1;
  --nd-ink:       #1B1E17;
  --nd-body:      #5C6057;
  --nd-muted:     #8B9086;
  --nd-line:      #E7E2D7;

  --nd-wrap: 1400px;
  --nd-gut:  clamp(16px, 2.6vw, 38px);

  --nd-serif:  'Playfair Display', 'Iowan Old Style', Georgia, 'Times New Roman', serif;
  --nd-sans:   'Inter', ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
  --nd-script: 'Dancing Script', 'Segoe Script', 'Brush Script MT', cursive;

  --nd-ease:   cubic-bezier(.22, 1, .36, 1);
}

/* --- Reset -------------------------------------------------------------- */

.nd *, .nd *::before, .nd *::after { box-sizing: border-box; }

html { -webkit-text-size-adjust: 100%; scroll-behavior: smooth; }
@media (prefers-reduced-motion: reduce) {
  html { scroll-behavior: auto; }
  .nd *, .nd *::before, .nd *::after { animation-duration: .001ms !important; transition-duration: .001ms !important; }
}

body.nd {
  margin: 0;
  background: #fff;
  color: var(--nd-body);
  font-family: var(--nd-sans);
  font-size: 15px;
  line-height: 1.65;
  overflow-x: hidden;
  -webkit-font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

/* :where() keeps every reset rule at zero specificity, so a single-class
   component rule such as .nd-btn--green always wins over it. Without this,
   `.nd a` (0,1,1) out-ranked `.nd-btn--green` (0,1,0) and every link-button
   inherited the grey body colour. */
:where(.nd) :where(h1, h2, h3, h4, p, ul, ol, figure, blockquote) { margin: 0; padding: 0; }
:where(.nd) :where(ul) { list-style: none; }
:where(.nd) :where(img, svg, iframe) { max-width: 100%; }
:where(.nd) :where(img) { display: block; height: auto; }
:where(.nd) :where(a) { color: inherit; text-decoration: none; }
:where(.nd) :where(button, input, select, textarea) { font: inherit; color: inherit; }
.nd .nd-i { flex: 0 0 auto; }

.nd :focus-visible { outline: 2px solid var(--nd-gold); outline-offset: 3px; border-radius: 4px; }

.nd-skip {
  position: absolute; left: -9999px; top: 0; z-index: 999;
  background: var(--nd-green); color: #fff; padding: 12px 20px; border-radius: 0 0 10px 0;
}
.nd-skip:focus { left: 0; }

.nd-sr {
  position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px;
  overflow: hidden; clip: rect(0 0 0 0); white-space: nowrap; border: 0;
}

/* --- Layout ------------------------------------------------------------- */

.nd-wrap { width: 100%; max-width: var(--nd-wrap); margin-inline: auto; padding-inline: var(--nd-gut); }

.nd-sec          { padding-block: clamp(48px, 5.6vw, 84px); }
.nd-sec--white   { background: #fff; }
.nd-sec--cream   { background: var(--nd-cream); }
.nd-sec--cream2  { background: var(--nd-cream-2); }
.nd-sec--mist    { background: var(--nd-mist); }

/* --- Type --------------------------------------------------------------- */

.nd-eyebrow {
  display: block;
  font-size: 11.5px; font-weight: 600; letter-spacing: .24em;
  text-transform: uppercase; color: var(--nd-gold);
}
.nd-eyebrow--light { color: var(--nd-tan); }

.nd-h1 {
  font-family: var(--nd-serif); font-weight: 500;
  font-size: clamp(34px, 4.6vw, 58px); line-height: 1.1;
  letter-spacing: -.015em; color: #fff; text-wrap: balance;
}
.nd-h1 em { font-style: normal; color: var(--nd-gold-l); }

.nd-h2 {
  font-family: var(--nd-serif); font-weight: 500;
  font-size: clamp(27px, 3.2vw, 42px); line-height: 1.16;
  letter-spacing: -.012em; color: var(--nd-ink); text-wrap: balance;
}
.nd-h2--light { color: #fff; }

.nd-h3 { font-family: var(--nd-serif); font-weight: 600; font-size: 19px; line-height: 1.3; color: var(--nd-ink); }

.nd-lead { font-size: 15px; line-height: 1.75; color: var(--nd-body); text-wrap: pretty; }
.nd-lead--light { color: rgba(255,255,255,.76); }
.nd-sub  { font-size: 14px; line-height: 1.7; color: var(--nd-muted); text-wrap: pretty; }

.nd-script { font-family: var(--nd-script); font-weight: 600; color: var(--nd-tan); line-height: 1.16; }

.nd-headc { max-width: 820px; margin-inline: auto; text-align: center; }
.nd-headc .nd-h2 { margin-top: 12px; }
.nd-headc .nd-sub { margin-top: 12px; max-width: 620px; margin-inline: auto; }

/* --- Buttons ------------------------------------------------------------ */

.nd-btn {
  display: inline-flex; align-items: center; justify-content: center; gap: 9px;
  min-height: 46px; padding: 0 22px; border: 1px solid transparent; border-radius: 999px;
  font-size: 13.5px; font-weight: 600; letter-spacing: .01em; line-height: 1.2;
  cursor: pointer; text-align: center; white-space: nowrap;
  transition: background .2s var(--nd-ease), border-color .2s, color .2s, transform .2s var(--nd-ease), box-shadow .2s;
}
.nd-btn:hover  { transform: translateY(-1px); }
.nd-btn:active { transform: translateY(0) scale(.99); }

.nd-btn--green { background: var(--nd-green); color: #fff; }
.nd-btn--green:hover { background: var(--nd-green-l); color: #fff; }

.nd-btn--tan { background: var(--nd-tan); color: #1F3126; }
.nd-btn--tan:hover { background: var(--nd-tan-d); color: #1F3126; }

.nd-btn--ghost { background: transparent; color: #fff; border-color: rgba(255,255,255,.36); }
.nd-btn--ghost:hover { background: rgba(255,255,255,.1); border-color: rgba(255,255,255,.66); color: #fff; }

.nd-btn--lg { min-height: 52px; padding: 0 26px; font-size: 14.5px; }
.nd-btn--block { width: 100%; }

.nd-btn__play {
  width: 26px; height: 26px; border-radius: 50%; background: #fff; color: var(--nd-green);
  display: grid; place-items: center; margin-left: -8px;
}

.nd-more {
  display: inline-flex; align-items: center; gap: 7px; margin-top: 16px;
  font-size: 12px; font-weight: 600; color: var(--nd-ink);
}
.nd-more .nd-i { transition: transform .2s var(--nd-ease); }

.nd-link {
  display: inline-flex; align-items: center; gap: 8px;
  font-size: 13px; font-weight: 600; color: var(--nd-green);
}
.nd-link:hover { text-decoration: underline; text-underline-offset: 4px; }

/* --- Masthead ----------------------------------------------------------- */

.nd-head { position: sticky; top: 0; z-index: 60; background: #fff; border-bottom: 1px solid var(--nd-line); }
.nd-head__bar { display: flex; align-items: center; gap: clamp(12px, 1.6vw, 26px); min-height: 76px; }

.nd-brand { display: flex; align-items: center; gap: 10px; flex: 0 0 auto; }
.nd-brand__mark {
  width: 38px; height: 38px; flex: 0 0 auto; border-radius: 50%;
  display: grid; place-items: center; color: var(--nd-green);
  background: var(--nd-cream-2); border: 1px solid var(--nd-line);
}
.nd-brand__name {
  display: block; font-family: var(--nd-serif); font-size: clamp(17px, 1.6vw, 20px);
  font-weight: 600; color: var(--nd-green); letter-spacing: -.01em; line-height: 1.1;
}
.nd-brand__sub { display: flex; align-items: center; gap: 7px; margin-top: 4px; }
.nd-brand__rule { width: 16px; height: 1px; background: var(--nd-line); flex: 0 0 auto; }
.nd-brand__tag {
  font-size: 8.5px; font-weight: 600; letter-spacing: .2em; text-transform: uppercase;
  color: var(--nd-muted); white-space: nowrap;
}

.nd-nav { display: none; align-items: center; gap: clamp(10px, 1.3vw, 24px); margin-inline: auto; }
.nd-nav > * { position: relative; }
.nd-nav a, .nd-drop__t {
  display: inline-flex; align-items: center; gap: 5px;
  padding: 9px 0; font-size: 13px; font-weight: 500; color: #3F443B;
  white-space: nowrap; background: none; border: 0; cursor: pointer; font-family: inherit;
}
.nd-nav a:hover, .nd-drop__t:hover { color: var(--nd-green); }
.nd-nav a[aria-current="page"] { color: var(--nd-green); font-weight: 600; }
.nd-nav a[aria-current="page"]::after {
  content: ""; position: absolute; left: 0; right: 0; bottom: 0;
  height: 2px; border-radius: 2px; background: var(--nd-green);
}

.nd-drop__m {
  position: absolute; top: calc(100% + 10px); left: 50%; z-index: 5;
  min-width: 232px; padding: 8px; background: #fff;
  border: 1px solid var(--nd-line); border-radius: 14px;
  box-shadow: 0 22px 48px -22px rgba(11,59,44,.34);
  opacity: 0; visibility: hidden; transform: translateX(-50%) translateY(-6px);
  transition: opacity .18s, transform .18s var(--nd-ease), visibility .18s;
}
.nd-drop:hover .nd-drop__m, .nd-drop:focus-within .nd-drop__m {
  opacity: 1; visibility: visible; transform: translateX(-50%) translateY(0);
}
.nd-drop__m a { display: block; width: 100%; padding: 9px 12px; border-radius: 9px; font-size: 13px; }
.nd-drop__m a:hover { background: var(--nd-cream-2); color: var(--nd-green); }

.nd-head__end { display: flex; align-items: center; gap: clamp(10px, 1.2vw, 18px); margin-left: auto; flex: 0 0 auto; }
.nd-tel { display: none; align-items: center; gap: 8px; font-size: 13px; font-weight: 600; color: var(--nd-ink); }
.nd-tel .nd-i { color: var(--nd-green); }
.nd-tel:hover { color: var(--nd-green); }

@media (max-width: 559px) { .nd-head__end > .nd-btn { display: none; } }

.nd-burger {
  display: inline-grid; place-items: center; width: 44px; height: 44px;
  border: 1px solid var(--nd-line); border-radius: 12px; background: #fff;
  color: var(--nd-green); cursor: pointer;
}

.nd-mnav { display: none; background: #fff; border-top: 1px solid var(--nd-line); }
.nd-mnav[data-open="true"] { display: block; }
.nd-mnav ul { padding-block: 6px 20px; }
.nd-mnav li > a { display: block; padding: 12px 0; font-size: 15px; border-bottom: 1px solid var(--nd-line); }
.nd-mnav li > a:hover { color: var(--nd-green); }
.nd-mnav__h { padding: 14px 0 6px; font-size: 11px; font-weight: 700; letter-spacing: .18em; text-transform: uppercase; color: var(--nd-muted); }
.nd-mnav__sub > a { padding-left: 16px !important; font-size: 14px !important; color: var(--nd-body); }
.nd-mnav__cta { display: grid; gap: 10px; padding-top: 18px; }

@media (min-width: 900px)  { .nd-tel { display: inline-flex; } }
@media (min-width: 1240px) and (max-width: 1399px) { .nd-tel { display: none; } .nd-nav { gap: 14px; } }
@media (min-width: 1240px) { .nd-nav { display: flex; } .nd-burger { display: none; } .nd-mnav { display: none !important; } }

/* --- Hero --------------------------------------------------------------- */

.nd-hero { position: relative; isolation: isolate; background: var(--nd-green); overflow: hidden; }
.nd-hero::before {
  content: ""; position: absolute; inset: 0; z-index: 0; pointer-events: none;
  background: radial-gradient(70% 90% at 12% 18%, rgba(255,255,255,.07) 0, transparent 62%);
}

.nd-hero__media { position: absolute; inset: 0 0 0 auto; width: 54%; z-index: 0; }
.nd-hero__media img { width: 100%; height: 100%; object-fit: cover; object-position: 50% 20%; }
.nd-hero__media::after {
  content: ""; position: absolute; inset: 0;
  background:
    linear-gradient(90deg, var(--nd-green) 0%, rgba(11,59,44,.94) 16%, rgba(11,59,44,.42) 44%, rgba(11,59,44,0) 74%),
    linear-gradient(0deg, rgba(11,59,44,.5) 0%, rgba(11,59,44,0) 34%);
}

.nd-hero__inner {
  position: relative; z-index: 1;
  display: grid; gap: 26px; align-content: center;
  padding-block: clamp(44px, 5vw, 74px) clamp(30px, 3.4vw, 46px);
  min-height: min(80vh, 640px);
}
.nd-hero__copy { max-width: 620px; }
.nd-hero__copy .nd-h1 { margin-top: 16px; }
.nd-hero__copy .nd-lead { margin-top: 18px; max-width: 50ch; }

.nd-hero__btns { display: flex; flex-wrap: wrap; gap: 12px; margin-top: clamp(24px, 2.6vw, 34px); }

.nd-hero__feats {
  display: grid; grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 22px 14px; margin-top: clamp(30px, 3.6vw, 48px); max-width: 580px;
}
.nd-feat { text-align: center; }
.nd-feat__i {
  display: grid; place-items: center; width: 38px; height: 38px;
  margin: 0 auto 10px; color: var(--nd-tan);
}
.nd-feat__t { font-size: 11px; font-weight: 600; line-height: 1.42; color: rgba(255,255,255,.92); letter-spacing: .012em; }

.nd-hero__side { display: none; position: relative; min-height: 340px; }
.nd-hero__script {
  position: absolute; top: 4%; right: 4%; width: min(200px, 40%); text-align: center;
  font-size: clamp(26px, 3vw, 44px);
  text-shadow: 0 2px 18px rgba(8,44,33,.75), 0 1px 3px rgba(8,44,33,.6);
}
.nd-hero__swoosh { display: block; width: 104px; margin: 4px 0 0 auto; color: var(--nd-tan); opacity: .8; }

.nd-badge {
  position: relative; z-index: 2; justify-self: start;
  display: flex; align-items: center; gap: 12px; max-width: 320px;
  padding: 13px 18px; border-radius: 14px;
  background: rgba(8,44,33,.9); border: 1px solid rgba(255,255,255,.15);
  -webkit-backdrop-filter: blur(8px); backdrop-filter: blur(8px);
}
.nd-badge__i {
  width: 34px; height: 34px; flex: 0 0 auto; border-radius: 50%;
  background: var(--nd-tan); color: var(--nd-green); display: grid; place-items: center;
}
.nd-badge__t { font-size: 12.5px; font-weight: 600; line-height: 1.42; color: #fff; }

@media (max-width: 979px) {
  .nd-hero__media { width: 100%; }
  .nd-hero__media img { object-position: 72% 18%; }
  .nd-hero__media::after {
    background: linear-gradient(180deg, rgba(11,59,44,.9) 0%, rgba(11,59,44,.8) 48%, rgba(11,59,44,.95) 100%);
  }
}
@media (min-width: 980px) {
  .nd-hero__inner { grid-template-columns: minmax(0, 1.02fr) minmax(0, .98fr); align-items: center; column-gap: 40px; }
  .nd-hero__copy  { grid-column: 1; grid-row: 1; }
  .nd-hero__side  { display: block; grid-column: 2; grid-row: 1; }
  .nd-badge       { position: absolute; right: var(--nd-gut); bottom: clamp(22px, 2.6vw, 34px); justify-self: end; }
}
@media (min-width: 560px) and (max-width: 979px) {
  .nd-hero__feats { grid-template-columns: repeat(4, minmax(0, 1fr)); }
}
@media (min-width: 1180px) {
  .nd-hero__feats { grid-template-columns: repeat(4, minmax(0, 1fr)); }
}

/* --- Service cards ------------------------------------------------------ */

.nd-grid6 {
  display: grid; gap: clamp(14px, 1.4vw, 20px);
  grid-template-columns: repeat(2, minmax(0, 1fr));
  margin-top: clamp(30px, 3.4vw, 46px);
}
@media (min-width: 620px)  { .nd-grid6 { grid-template-columns: repeat(3, minmax(0, 1fr)); } }
@media (min-width: 1200px) { .nd-grid6 { grid-template-columns: repeat(6, minmax(0, 1fr)); } }

.nd-card {
  display: flex; flex-direction: column; overflow: hidden;
  background: #fff; border: 1px solid var(--nd-line); border-radius: 14px;
  transition: transform .24s var(--nd-ease), box-shadow .24s, border-color .24s;
}
.nd-card:hover { transform: translateY(-4px); border-color: var(--nd-tan); box-shadow: 0 20px 42px -24px rgba(11,59,44,.4); }
.nd-card:hover .nd-more { color: var(--nd-green); }
.nd-card:hover .nd-more .nd-i { transform: translateX(3px); }

.nd-card__media { position: relative; aspect-ratio: 16 / 11; overflow: hidden; background: var(--nd-green); }
.nd-card__media img { width: 100%; height: 100%; object-fit: cover; }

.nd-tile {
  position: absolute; inset: 0; display: grid; place-items: center; color: var(--nd-tan);
  background: radial-gradient(122% 100% at 28% 0%, #17573F 0%, #0B3B2C 64%);
}
.nd-tile::after {
  content: ""; position: absolute; inset: 0;
  background-image: repeating-linear-gradient(135deg, rgba(255,255,255,.05) 0 1px, transparent 1px 9px);
}
.nd-tile .nd-i { position: relative; z-index: 1; }

.nd-card__pip {
  position: absolute; left: 14px; bottom: -17px; z-index: 2;
  width: 34px; height: 34px; border-radius: 50%;
  background: var(--nd-green); color: var(--nd-tan);
  border: 2px solid #fff; display: grid; place-items: center;
  box-shadow: 0 8px 18px -8px rgba(11,59,44,.55);
}

.nd-card__body { display: flex; flex-direction: column; flex: 1 1 auto; padding: 27px 16px 18px; }
.nd-card__t { font-family: var(--nd-serif); font-size: 16.5px; font-weight: 600; line-height: 1.3; color: var(--nd-ink); }
.nd-card__d { flex: 1 1 auto; margin-top: 7px; font-size: 12.5px; line-height: 1.62; color: var(--nd-muted); }

/* --- Before & after ----------------------------------------------------- */

.nd-ba__head { display: grid; gap: 22px; align-items: end; }
@media (min-width: 920px) { .nd-ba__head { grid-template-columns: minmax(0, 1fr) auto; } }
.nd-ba__head .nd-h2 { margin-top: 12px; }
.nd-ba__head .nd-sub { margin-top: 10px; }

.nd-tabs { display: flex; flex-wrap: wrap; gap: 9px; }
.nd-tab {
  display: inline-flex; align-items: center; min-height: 38px; padding: 0 18px;
  border-radius: 999px; font-size: 12.5px; font-weight: 600;
  background: #fff; border: 1px solid var(--nd-line); color: var(--nd-body);
  transition: background .2s, border-color .2s, color .2s;
}
.nd-tab:hover   { border-color: var(--nd-green); color: var(--nd-green); }
.nd-tab--on     { background: var(--nd-green); border-color: var(--nd-green); color: #fff; }
.nd-tab--on:hover { background: var(--nd-green-l); color: #fff; }

.nd-carousel { position: relative; margin-top: clamp(26px, 3vw, 40px); }

.nd-rail {
  display: flex; gap: clamp(14px, 1.6vw, 22px);
  overflow-x: auto; scroll-snap-type: x mandatory; scroll-behavior: smooth;
  padding-bottom: 4px; scrollbar-width: none; -ms-overflow-style: none;
}
.nd-rail::-webkit-scrollbar { display: none; }
.nd-rail > * { flex: 0 0 100%; scroll-snap-align: start; }
@media (min-width: 620px) { .nd-rail > * { flex: 0 0 calc((100% - clamp(14px, 1.6vw, 22px)) / 2); } }
@media (min-width: 960px) { .nd-rail > * { flex: 0 0 calc((100% - 2 * clamp(14px, 1.6vw, 22px)) / 3); } }

.nd-case { background: #fff; border: 1px solid var(--nd-line); border-radius: 12px; padding: 8px; height: 100%; }
.nd-case__fig { position: relative; aspect-ratio: 1 / 1; overflow: hidden; border-radius: 8px; background: var(--nd-cream); }
.nd-case__fig img { width: 100%; height: 100%; object-fit: cover; }
.nd-case__chip {
  position: absolute; left: 50%; bottom: 10px; transform: translateX(-50%);
  padding: 5px 12px; border-radius: 6px; background: rgba(8,44,33,.88); color: #fff;
  font-size: 10px; font-weight: 600; letter-spacing: .09em; text-transform: uppercase; white-space: nowrap;
}
.nd-case__cap { margin-top: 12px; padding: 0 6px 6px; text-align: center; font-size: 11.5px; line-height: 1.5; color: var(--nd-muted); }

.nd-arrow {
  position: absolute; top: 50%; transform: translateY(-50%); z-index: 3;
  width: 38px; height: 38px; border-radius: 50%; cursor: pointer;
  display: grid; place-items: center;
  background: #fff; border: 1px solid var(--nd-line); color: var(--nd-green);
  box-shadow: 0 10px 24px -12px rgba(11,59,44,.5);
  transition: background .2s, color .2s, border-color .2s;
}
.nd-arrow:hover { background: var(--nd-green); border-color: var(--nd-green); color: #fff; }
.nd-arrow--prev { left: -12px; }
.nd-arrow--next { right: -12px; }
@media (min-width: 1500px) { .nd-arrow--prev { left: -22px; } .nd-arrow--next { right: -22px; } }

.nd-empty {
  background: #fff; border: 1px dashed var(--nd-line); border-radius: 14px;
  padding: clamp(24px, 3vw, 36px);
}

/* --- Why choose --------------------------------------------------------- */

.nd-why { position: relative; background: var(--nd-green); overflow: hidden; }
.nd-why::before {
  content: ""; position: absolute; inset: 0; pointer-events: none;
  background: radial-gradient(64% 80% at 8% 10%, rgba(255,255,255,.06) 0, transparent 60%);
}
.nd-why__grid {
  position: relative; display: grid; gap: clamp(30px, 3.2vw, 46px);
  padding-block: clamp(48px, 5.4vw, 78px);
}
@media (min-width: 1120px) { .nd-why__grid { grid-template-columns: .95fr 1.35fr .82fr; align-items: center; } }

.nd-why__copy .nd-h2 { margin-top: 14px; }
.nd-why__copy .nd-lead { margin-top: 16px; max-width: 42ch; }
.nd-why__copy .nd-btn { margin-top: clamp(22px, 2.4vw, 30px); }

.nd-why__feats { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: clamp(24px, 2.6vw, 36px) clamp(12px, 1.6vw, 22px); }
@media (min-width: 720px) { .nd-why__feats { grid-template-columns: repeat(3, minmax(0, 1fr)); } }

.nd-wf { text-align: center; }
.nd-wf__i {
  width: 46px; height: 46px; margin: 0 auto; border-radius: 50%;
  border: 1px solid rgba(255,255,255,.22); display: grid; place-items: center; color: var(--nd-tan);
}
.nd-wf__t, .nd-wf__s { display: block; }
.nd-wf__t { margin-top: 12px; font-size: 12.5px; font-weight: 700; line-height: 1.4; color: #fff; }
.nd-wf__s { margin-top: 5px; font-size: 11px; line-height: 1.5; color: rgba(255,255,255,.56); }

.nd-quote {
  position: relative; text-align: center; background: var(--nd-sand);
  padding: clamp(28px, 3vw, 44px) clamp(22px, 2.4vw, 34px);
  border-radius: clamp(24px, 5vw, 130px) 24px 24px clamp(24px, 5vw, 130px);
}
.nd-quote__mark { color: var(--nd-gold); opacity: .5; }
.nd-quote__t {
  margin-top: 12px; font-family: var(--nd-serif); font-weight: 500;
  font-size: clamp(22px, 2.1vw, 31px); line-height: 1.26; color: #23301E; text-wrap: balance;
}
.nd-quote__a { margin-top: 14px; font-size: 12px; font-weight: 600; letter-spacing: .05em; color: #6E6647; }

/* --- Figures ------------------------------------------------------------ */

.nd-stats { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); }
.nd-stat {
  display: flex; align-items: center; justify-content: center; gap: 14px;
  padding: clamp(22px, 2.4vw, 32px) 12px; text-align: left;
}
.nd-stat__i { color: var(--nd-green); opacity: .85; }
.nd-stat__v { font-size: clamp(20px, 2.2vw, 27px); font-weight: 800; letter-spacing: -.02em; line-height: 1.12; color: var(--nd-ink); }
.nd-stat__l { margin-top: 3px; font-size: 11.5px; line-height: 1.45; color: var(--nd-muted); }

.nd-stat:nth-child(-n+2) { border-bottom: 1px solid var(--nd-line); }
.nd-stat:nth-child(odd)  { border-right: 1px solid var(--nd-line); }
@media (min-width: 880px) {
  .nd-stats { grid-template-columns: repeat(4, minmax(0, 1fr)); }
  .nd-stat { border-bottom: 0 !important; border-right: 1px solid var(--nd-line); }
  .nd-stat:last-child { border-right: 0; }
}

/* --- Testimonials ------------------------------------------------------- */

.nd-tst { display: grid; gap: clamp(26px, 3vw, 44px); }
@media (min-width: 1000px) { .nd-tst { grid-template-columns: .8fr 1.62fr; align-items: center; } }
.nd-tst__copy .nd-h2 { margin-top: 12px; }
.nd-tst__copy .nd-sub { margin-top: 10px; }

.nd-tst__cards { display: grid; gap: 16px; }
@media (min-width: 700px) { .nd-tst__cards--two { grid-template-columns: repeat(2, minmax(0, 1fr)); } }

.nd-tcard { display: flex; gap: 14px; background: #fff; border: 1px solid var(--nd-line); border-radius: 14px; padding: 20px; }
.nd-tcard__av { width: 46px; height: 46px; flex: 0 0 auto; border-radius: 50%; object-fit: cover; background: var(--nd-cream); }
.nd-tcard__q { font-size: 12.5px; line-height: 1.65; color: var(--nd-body); }
.nd-stars { display: inline-flex; gap: 2px; margin-top: 10px; color: var(--nd-gold); }
.nd-stars .nd-i { fill: currentColor; }
.nd-tcard__n { margin-top: 9px; font-size: 12px; font-weight: 700; color: var(--nd-ink); }
.nd-tcard__p { font-size: 11px; color: var(--nd-muted); }

.nd-tst__nav { display: flex; gap: 10px; justify-content: flex-end; margin-top: 18px; }
.nd-tst__nav .nd-arrow { position: static; transform: none; }

/* --- Articles ----------------------------------------------------------- */

.nd-blog__head { display: grid; gap: 18px; align-items: end; }
@media (min-width: 860px) { .nd-blog__head { grid-template-columns: minmax(0, 1fr) auto; } }
.nd-blog__head .nd-h2 { margin-top: 12px; }
.nd-blog__head .nd-sub { margin-top: 10px; }

.nd-blog { display: grid; gap: clamp(16px, 1.8vw, 24px); margin-top: clamp(28px, 3.2vw, 42px); }
@media (min-width: 760px)  { .nd-blog { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
@media (min-width: 1140px) { .nd-blog { grid-template-columns: repeat(3, minmax(0, 1fr)); } }

.nd-post {
  display: flex; overflow: hidden; background: #fff;
  border: 1px solid var(--nd-line); border-radius: 14px;
  transition: transform .24s var(--nd-ease), box-shadow .24s, border-color .24s;
}
.nd-post:hover { transform: translateY(-4px); border-color: var(--nd-tan); box-shadow: 0 20px 42px -24px rgba(11,59,44,.4); }
.nd-post:hover .nd-more { color: var(--nd-green); }
.nd-post:hover .nd-more .nd-i { transform: translateX(3px); }

.nd-post__media { position: relative; flex: 0 0 38%; min-height: 152px; overflow: hidden; background: var(--nd-green); }
.nd-post__media img { width: 100%; height: 100%; object-fit: cover; }
.nd-post__body { display: flex; flex-direction: column; flex: 1 1 auto; padding: 16px 18px; min-width: 0; }
.nd-chip {
  align-self: flex-start; padding: 4px 10px; border-radius: 6px;
  background: var(--nd-cream); color: #9A7A42;
  font-size: 10.5px; font-weight: 600; white-space: nowrap;
}
.nd-post__t {
  margin-top: 10px; font-family: var(--nd-serif); font-size: 15px; font-weight: 600;
  line-height: 1.36; color: var(--nd-ink); flex: 1 1 auto;
}
.nd-post .nd-more { margin-top: 12px; }

@media (max-width: 419px) {
  .nd-post { flex-direction: column; }
  .nd-post__media { flex: 0 0 auto; aspect-ratio: 16 / 9; min-height: 0; }
}

/* --- Contact ------------------------------------------------------------ */

.nd-contact { display: grid; gap: clamp(28px, 3.2vw, 44px); align-items: start; }
@media (min-width: 720px)  { .nd-contact { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
@media (min-width: 720px) and (max-width: 1119px) { .nd-contact__copy { grid-column: 1 / -1; } }
@media (min-width: 1120px) { .nd-contact { grid-template-columns: 1.06fr .76fr .96fr; } }

.nd-contact__copy .nd-h2 { margin-top: 12px; }
.nd-contact__copy .nd-sub { margin-top: 10px; }

.nd-form { display: grid; gap: 12px; margin-top: clamp(20px, 2.2vw, 28px); }
.nd-form__row { display: grid; gap: 12px; grid-template-columns: repeat(2, minmax(0, 1fr)); }
@media (max-width: 479px) { .nd-form__row { grid-template-columns: 1fr; } }

.nd-input, .nd-select, .nd-textarea {
  width: 100%; min-height: 46px; padding: 0 14px;
  background: #fff; border: 1px solid var(--nd-line); border-radius: 9px;
  font-size: 13.5px; color: var(--nd-ink);
  transition: border-color .18s, box-shadow .18s;
}
.nd-textarea { min-height: 96px; padding: 13px 14px; line-height: 1.6; resize: vertical; }
.nd-input::placeholder, .nd-textarea::placeholder { color: #A7ABA0; }
.nd-input:focus, .nd-select:focus, .nd-textarea:focus {
  outline: none; border-color: var(--nd-green); box-shadow: 0 0 0 3px rgba(11,59,44,.1);
}
.nd-select {
  appearance: none; -webkit-appearance: none;
  background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%238B9086' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9.5l6 6 6-6'/%3E%3C/svg%3E");
  background-repeat: no-repeat; background-position: right 14px center; padding-right: 38px;
}
.nd-form__note { font-size: 11.5px; line-height: 1.55; color: var(--nd-muted); }
.nd-form__err {
  padding: 11px 14px; border-radius: 9px; font-size: 12.5px;
  background: #FDF2F2; border: 1px solid #F3D3D3; color: #8C2F2F;
}

.nd-nap { display: grid; gap: 15px; margin-top: clamp(20px, 2.2vw, 26px); }
.nd-nap__row { display: flex; gap: 12px; align-items: flex-start; }
.nd-nap__i {
  width: 32px; height: 32px; flex: 0 0 auto; border-radius: 50%;
  background: var(--nd-cream); color: var(--nd-green); display: grid; place-items: center;
}
.nd-nap__t { font-size: 13px; line-height: 1.6; color: var(--nd-body); }
.nd-nap__t a:hover { color: var(--nd-green); text-decoration: underline; text-underline-offset: 3px; }

.nd-socials { display: flex; flex-wrap: wrap; gap: 10px; margin-top: clamp(20px, 2.2vw, 26px); }
.nd-social {
  width: 38px; height: 38px; border-radius: 50%; display: grid; place-items: center;
  background: #fff; border: 1px solid var(--nd-line); color: var(--nd-green);
  transition: background .2s, color .2s, border-color .2s;
}
.nd-social:hover { background: var(--nd-green); border-color: var(--nd-green); color: #fff; }

.nd-map {
  position: relative; overflow: hidden; border-radius: 14px;
  border: 1px solid var(--nd-line); background: var(--nd-cream);
  width: 100%; aspect-ratio: 4 / 3.4; min-height: 320px;
}
.nd-map iframe { position: absolute; inset: 0; width: 100%; height: 100%; border: 0; }
.nd-map__card {
  position: absolute; left: 14px; top: 14px; z-index: 2; pointer-events: none;
  display: flex; align-items: center; gap: 10px; max-width: calc(100% - 28px);
  padding: 10px 14px; border-radius: 10px; background: #fff;
  box-shadow: 0 12px 28px -14px rgba(11,59,44,.5);
}
.nd-map__card .nd-i { color: #C0392B; }
.nd-map__n { font-size: 12.5px; font-weight: 700; color: var(--nd-ink); line-height: 1.35; }
.nd-map__s { font-size: 11px; color: var(--nd-muted); line-height: 1.4; }
.nd-map__cta { position: absolute; left: 50%; bottom: 16px; z-index: 2; transform: translateX(-50%); }

/* --- Footer ------------------------------------------------------------- */

.nd-foot { position: relative; background: var(--nd-green); color: rgba(255,255,255,.7); overflow: hidden; }
.nd-foot::before {
  content: ""; position: absolute; inset: 0; pointer-events: none;
  background-image: repeating-linear-gradient(135deg, rgba(255,255,255,.03) 0 1px, transparent 1px 15px);
}
.nd-foot__grid {
  position: relative; display: grid; gap: 28px; align-items: center;
  padding-block: clamp(34px, 4vw, 56px);
}
@media (min-width: 940px) { .nd-foot__grid { grid-template-columns: auto 1fr auto; gap: clamp(28px, 3.4vw, 56px); } }

.nd-foot .nd-brand__mark { background: rgba(255,255,255,.08); border-color: rgba(255,255,255,.16); color: var(--nd-tan); }
.nd-foot .nd-brand__name { color: #fff; }
.nd-foot .nd-brand__rule { background: rgba(255,255,255,.24); }
.nd-foot .nd-brand__tag  { color: rgba(255,255,255,.56); }

.nd-foot__h { font-size: 12.5px; font-weight: 700; color: #fff; letter-spacing: .04em; }
.nd-foot__links { display: flex; flex-wrap: wrap; gap: 10px 22px; margin-top: 12px; }
.nd-foot__links a { font-size: 13px; color: rgba(255,255,255,.78); }
.nd-foot__links a:hover { color: var(--nd-tan); }

.nd-foot__script { font-size: clamp(22px, 2.2vw, 31px); text-align: center; }
@media (min-width: 940px) { .nd-foot__script { padding-left: clamp(28px, 3vw, 46px); border-left: 1px solid rgba(255,255,255,.16); } }

.nd-foot__bar {
  position: relative; display: flex; flex-wrap: wrap; gap: 8px 22px;
  justify-content: space-between; align-items: center;
  padding-block: 16px; border-top: 1px solid rgba(255,255,255,.13);
  font-size: 12px; color: rgba(255,255,255,.55);
}
.nd-foot__bar nav { display: flex; flex-wrap: wrap; gap: 8px 18px; }
.nd-foot__bar a:hover { color: var(--nd-tan); }
</style>
</head>

<body class="nd">

<a class="nd-skip" href="#nd-main">Skip to content</a>

<!-- ==================== MASTHEAD ==================== -->
<header class="nd-head">
  <div class="nd-wrap">
    <div class="nd-head__bar">

      <a class="nd-brand" href="/">
        <span class="nd-brand__mark"><?= nd_icon('leaf', 21, 1.4) ?></span>
        <span>
          <span class="nd-brand__name"><?= e(SITE_NAME) ?></span>
          <span class="nd-brand__sub">
            <span class="nd-brand__rule" aria-hidden="true"></span>
            <span class="nd-brand__tag">Hair &middot; Skin &middot; Aesthetics</span>
          </span>
        </span>
      </a>

      <nav class="nd-nav" aria-label="Primary">
        <?php foreach ($ndNav as $item): ?>
          <?php if (isset($item['children'])): ?>
            <div class="nd-drop">
              <button class="nd-drop__t" type="button" aria-expanded="false">
                <?= e($item['label']) ?><?= nd_icon('chevron', 13, 2) ?>
              </button>
              <div class="nd-drop__m">
                <?php foreach ($item['children'] as $child): ?>
                  <a href="<?= e($child['url']) ?>"><?= e($child['label']) ?></a>
                <?php endforeach; ?>
              </div>
            </div>
          <?php else: ?>
            <a href="<?= e($item['url']) ?>"<?= !empty($item['active']) ? ' aria-current="page"' : '' ?>><?= e($item['label']) ?></a>
          <?php endif; ?>
        <?php endforeach; ?>
      </nav>

      <div class="nd-head__end">
        <a class="nd-tel" href="tel:<?= e(PHONE_E164) ?>" data-track="call">
          <?= nd_icon('phone', 16) ?><?= e(PHONE_DISPLAY) ?>
        </a>
        <a class="nd-btn nd-btn--green" href="/book-consultation">
          Book Appointment <?= nd_icon('arrow', 15, 2) ?>
        </a>
        <button class="nd-burger" type="button" id="nd-burger" aria-expanded="false" aria-controls="nd-mnav" aria-label="Open menu">
          <?= nd_icon('menu', 20, 1.8) ?>
        </button>
      </div>

    </div>
  </div>

  <div class="nd-mnav" id="nd-mnav" data-open="false">
    <div class="nd-wrap">
      <ul>
        <?php foreach ($ndNav as $item): ?>
          <?php if (isset($item['children'])): ?>
            <li class="nd-mnav__h"><?= e($item['label']) ?></li>
            <?php foreach ($item['children'] as $child): ?>
              <li class="nd-mnav__sub"><a href="<?= e($child['url']) ?>"><?= e($child['label']) ?></a></li>
            <?php endforeach; ?>
          <?php else: ?>
            <li><a href="<?= e($item['url']) ?>"<?= !empty($item['active']) ? ' aria-current="page"' : '' ?>><?= e($item['label']) ?></a></li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
      <div class="nd-mnav__cta">
        <a class="nd-btn nd-btn--green nd-btn--block" href="/book-consultation">Book Appointment <?= nd_icon('arrow', 15, 2) ?></a>
        <a class="nd-btn nd-btn--tan nd-btn--block" href="tel:<?= e(PHONE_E164) ?>" data-track="call"><?= nd_icon('phone', 16) ?> <?= e(PHONE_DISPLAY) ?></a>
      </div>
    </div>
  </div>
</header>

<main id="nd-main">

<!-- ==================== HERO ==================== -->
<section class="nd-hero">
  <div class="nd-hero__media">
    <img src="/assets/img/dr-nayra.webp"
         alt="<?= e(DOCTORS['dr-nyra']['name']) ?>, <?= e(DOCTORS['dr-nyra']['quals']) ?>, hair restoration doctor at <?= e(SITE_NAME) ?>, Sector 39 Gurugram"
         width="640" height="640" fetchpriority="high" decoding="async">
  </div>

  <div class="nd-wrap">
    <div class="nd-hero__inner">

      <div class="nd-hero__copy">
        <span class="nd-eyebrow nd-eyebrow--light">Natural Hair. Real Confidence.</span>

        <h1 class="nd-h1">Advanced<br><em>Hair Transplant</em><br>Solutions in Gurgaon</h1>

        <p class="nd-lead nd-lead--light">At <?= e(SITE_NAME) ?> your scalp, donor area and hair-loss pattern are examined by a doctor before anything is recommended &mdash; and the doctor who plans your case is the doctor who performs it.</p>

        <div class="nd-hero__btns">
          <a class="nd-btn nd-btn--lg nd-btn--tan" href="/book-consultation">
            Book a Consultation <?= nd_icon('arrow', 16, 2) ?>
          </a>
          <a class="nd-btn nd-btn--lg nd-btn--ghost" href="/hair-transplant-results-gurgaon">
            <span class="nd-btn__play"><?= nd_icon('gallery', 14, 1.7) ?></span>
            See Patient Results
          </a>
        </div>

        <ul class="nd-hero__feats">
          <?php foreach ($ndHeroFeatures as $feat): ?>
            <li class="nd-feat">
              <span class="nd-feat__i"><?= nd_icon($feat['icon'], 27, 1.3) ?></span>
              <span class="nd-feat__t"><?= e($feat['line1']) ?><br><?= e($feat['line2']) ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="nd-hero__side" aria-hidden="true">
        <p class="nd-hero__script nd-script">More<br>Hair<br>More<br>You
          <svg class="nd-hero__swoosh" viewBox="0 0 120 26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
            <path d="M3 4c26 22 82 24 114 4"/>
          </svg>
        </p>
      </div>

      <p class="nd-badge">
        <span class="nd-badge__i"><?= nd_icon('pin', 18, 1.6) ?></span>
        <span class="nd-badge__t"><?= e(NAP_LOCALITY) ?>&rsquo;s doctor-led<br>hair &amp; aesthetic clinic</span>
      </p>

    </div>
  </div>
</section>

<!-- ==================== SERVICES ==================== -->
<section class="nd-sec nd-sec--white" id="services">
  <div class="nd-wrap">

    <div class="nd-headc">
      <span class="nd-eyebrow">Our Services</span>
      <h2 class="nd-h2">Complete Hair &amp; Aesthetic Solutions</h2>
      <p class="nd-sub">From hair restoration to skin and light-based treatment, planned case by case and carried out at one clinic.</p>
    </div>

    <div class="nd-grid6">
      <?php foreach ($ndServices as $svc): ?>
        <a class="nd-card" href="<?= e($svc['url']) ?>">
          <span class="nd-card__media">
            <?= nd_media($svc['image'], $svc['title'] . ' at ' . SITE_NAME, $svc['icon']) ?>
            <span class="nd-card__pip"><?= nd_icon($svc['icon'], 17, 1.6) ?></span>
          </span>
          <span class="nd-card__body">
            <span class="nd-card__t"><?= e($svc['title']) ?></span>
            <span class="nd-card__d"><?= e($svc['desc']) ?></span>
            <span class="nd-more">Learn More <?= nd_icon('arrow', 14, 2) ?></span>
          </span>
        </a>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ==================== BEFORE & AFTER ==================== -->
<?php if ($ndCases !== []): ?>
<section class="nd-sec nd-sec--cream" id="results">
  <div class="nd-wrap">

    <div class="nd-ba__head">
      <div>
        <span class="nd-eyebrow">Real People. Real Results.</span>
        <h2 class="nd-h2">Before &amp; After Transformations</h2>
        <p class="nd-sub">Consented photographs from the clinic&rsquo;s own patient records. Every case is different, and results vary between patients.</p>
      </div>
      <nav class="nd-tabs" aria-label="Results by treatment">
        <?php foreach ($ndCaseTabs as $tab): ?>
          <a class="nd-tab<?= !empty($tab['active']) ? ' nd-tab--on' : '' ?>" href="<?= e($tab['url']) ?>"><?= e($tab['label']) ?></a>
        <?php endforeach; ?>
      </nav>
    </div>

    <div class="nd-carousel">
      <button class="nd-arrow nd-arrow--prev" type="button" data-rail="prev" aria-controls="nd-rail" aria-label="Previous results"><?= nd_icon('arrow-left', 16, 2) ?></button>

      <ul class="nd-rail" id="nd-rail" tabindex="0" aria-label="Patient before and after results">
        <?php foreach ($ndCases as $case): ?>
          <li>
            <figure class="nd-case">
              <span class="nd-case__fig">
                <img src="<?= e($case['url']) ?>" alt="<?= e($case['alt']) ?>" width="<?= (int) $case['w'] ?>" height="<?= (int) $case['h'] ?>" loading="lazy" decoding="async">
                <span class="nd-case__chip">Before &amp; After</span>
              </span>
              <figcaption class="nd-case__cap">Patient result at <?= e(SITE_NAME) ?>, <?= e(NAP_LOCALITY) ?>. Results vary between patients.</figcaption>
            </figure>
          </li>
        <?php endforeach; ?>
      </ul>

      <button class="nd-arrow nd-arrow--next" type="button" data-rail="next" aria-controls="nd-rail" aria-label="Next results"><?= nd_icon('arrow', 16, 2) ?></button>
    </div>

  </div>
</section>
<?php endif; ?>

<!-- ==================== WHY CHOOSE ==================== -->
<section class="nd-why" id="why">
  <div class="nd-wrap">
    <div class="nd-why__grid">

      <div class="nd-why__copy">
        <span class="nd-eyebrow nd-eyebrow--light">Why Choose <?= e(SITE_NAME) ?>?</span>
        <h2 class="nd-h2 nd-h2--light">Your Confidence Is Our Priority</h2>
        <p class="nd-lead nd-lead--light">Some patients need surgery. Many need medical treatment first, or instead. The assessment decides that &mdash; not a package, and not the person selling it.</p>
        <a class="nd-btn nd-btn--tan" href="/book-consultation">Book Your Appointment <?= nd_icon('arrow', 15, 2) ?></a>
      </div>

      <ul class="nd-why__feats">
        <?php foreach ($ndWhy as $why): ?>
          <li class="nd-wf">
            <span class="nd-wf__i"><?= nd_icon($why['icon'], 22, 1.4) ?></span>
            <span class="nd-wf__t"><?= e($why['title']) ?></span>
            <span class="nd-wf__s"><?= e($why['sub']) ?></span>
          </li>
        <?php endforeach; ?>
      </ul>

      <figure class="nd-quote">
        <span class="nd-quote__mark"><?= nd_icon('quote', 34, 1.2) ?></span>
        <blockquote class="nd-quote__t">Confidence<br>Looks Good<br>On You</blockquote>
        <figcaption class="nd-quote__a">&mdash; <?= e(SITE_NAME) ?></figcaption>
      </figure>

    </div>
  </div>
</section>

<!-- ==================== FIGURES ==================== -->
<section class="nd-sec nd-sec--white" style="padding-block:0">
  <div class="nd-wrap">
    <ul class="nd-stats">
      <?php foreach ($ndStats as $stat): ?>
        <li class="nd-stat">
          <span class="nd-stat__i"><?= nd_icon($stat['icon'], 27, 1.4) ?></span>
          <span>
            <span class="nd-stat__v" style="display:block"><?= e($stat['value']) ?></span>
            <span class="nd-stat__l" style="display:block"><?= e($stat['label']) ?></span>
          </span>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- ==================== TESTIMONIALS ==================== -->
<section class="nd-sec nd-sec--cream2" id="reviews">
  <div class="nd-wrap">
    <div class="nd-tst">

      <div class="nd-tst__copy">
        <span class="nd-eyebrow">Patient Testimonials</span>
        <h2 class="nd-h2">What Our Patients Say</h2>
        <p class="nd-sub">Real stories. Real transformations.</p>
      </div>

      <div>
        <?php if ($ndTestimonials !== []): ?>
          <ul class="nd-tst__cards nd-tst__cards--two" id="nd-tst-rail">
            <?php foreach ($ndTestimonials as $t): ?>
              <li class="nd-tcard">
                <?php if (!empty($t['avatar'])): ?>
                  <img class="nd-tcard__av" src="<?= e($t['avatar']) ?>" alt="" width="46" height="46" loading="lazy">
                <?php else: ?>
                  <span class="nd-tcard__av" aria-hidden="true"></span>
                <?php endif; ?>
                <span>
                  <span class="nd-tcard__q" style="display:block">&ldquo;<?= e($t['quote']) ?>&rdquo;</span>
                  <?php if (!empty($t['stars'])): ?>
                    <span class="nd-stars" role="img" aria-label="<?= (int) $t['stars'] ?> out of 5 stars">
                      <?= str_repeat(nd_icon('star', 13, 1), (int) $t['stars']) ?>
                    </span>
                  <?php endif; ?>
                  <span class="nd-tcard__n" style="display:block">&mdash; <?= e($t['name']) ?></span>
                  <?php if (!empty($t['place'])): ?>
                    <span class="nd-tcard__p" style="display:block"><?= e($t['place']) ?></span>
                  <?php endif; ?>
                </span>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <?php /* See the $ndTestimonials note above: the comp's two quotes were invented. */ ?>
          <div class="nd-empty">
            <h3 class="nd-h3">Our reviews live on Google, not on this page</h3>
            <p class="nd-lead" style="margin-top:12px;max-width:62ch">We do not write testimonials, and we do not publish a star rating we cannot evidence. Every patient is asked once at the ten-day follow-up, nobody is pre-screened, and nothing is offered in exchange &mdash; so the reviews sit on the public listing where they are outside our control.</p>
            <div style="display:flex;flex-wrap:wrap;gap:12px;margin-top:22px">
              <a class="nd-btn nd-btn--green" href="<?= e(MAPS_URL) ?>" rel="noopener"><?= nd_icon('star', 15, 1.8) ?> Read reviews on Google</a>
              <a class="nd-btn" style="background:#fff;border-color:var(--nd-line);color:var(--nd-ink)" href="/patient-reviews">How we collect reviews</a>
            </div>
          </div>
        <?php endif; ?>

        <?php if (count($ndTestimonials) > 2): ?>
          <div class="nd-tst__nav">
            <button class="nd-arrow" type="button" data-tst="prev" aria-controls="nd-tst-rail" aria-label="Previous reviews"><?= nd_icon('arrow-left', 16, 2) ?></button>
            <button class="nd-arrow" type="button" data-tst="next" aria-controls="nd-tst-rail" aria-label="Next reviews"><?= nd_icon('arrow', 16, 2) ?></button>
          </div>
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>

<!-- ==================== ARTICLES ==================== -->
<?php if ($ndPosts !== []): ?>
<section class="nd-sec nd-sec--white" id="blog">
  <div class="nd-wrap">

    <div class="nd-blog__head">
      <div>
        <span class="nd-eyebrow">Our Blogs</span>
        <h2 class="nd-h2">Latest Insights on Hair, Skin &amp; Aesthetics</h2>
        <p class="nd-sub">Patient education, written and medically reviewed by <?= e(REVIEWED_BY) ?> before publication.</p>
      </div>
      <a class="nd-link" href="/blog/">View All Blogs <?= nd_icon('arrow', 15, 2) ?></a>
    </div>

    <div class="nd-blog">
      <?php foreach ($ndPosts as $post): ?>
        <?php $hub = BLOG_HUBS[$post['hub']] ?? null; ?>
        <a class="nd-post" href="<?= e(blog_url($post['slug'])) ?>">
          <span class="nd-post__media">
            <?= nd_media($post['image'] ?? null, $post['image_alt'] ?? '', 'plan', 600, 600) ?>
          </span>
          <span class="nd-post__body">
            <span class="nd-chip"><time datetime="<?= e($post['published']) ?>"><?= e(blog_date($post['published'])) ?></time></span>
            <span class="nd-post__t"><?= e($post['seo_title'] ?? $post['title']) ?></span>
            <span class="nd-more">Read More <?= nd_icon('arrow', 14, 2) ?></span>
          </span>
        </a>
      <?php endforeach; ?>
    </div>

  </div>
</section>
<?php endif; ?>

<!-- ==================== CONTACT ==================== -->
<section class="nd-sec nd-sec--mist" id="contact">
  <div class="nd-wrap">
    <div class="nd-contact">

      <div class="nd-contact__copy">
        <span class="nd-eyebrow">Get In Touch</span>
        <h2 class="nd-h2">Book Your Consultation</h2>
        <p class="nd-sub">Take the first step towards a more confident you.</p>

        <?php /* Posts to the same handler as every other lead path on the site,
                 so this page's enquiries land in the same log, inbox and
                 WhatsApp notification, and convert on /thank-you. */ ?>
        <form class="nd-form" action="/enquire.php" method="post">
          <input type="hidden" name="source" value="new-designe">
          <p class="nd-sr"><label>Leave this field empty <input type="text" name="website" tabindex="-1" autocomplete="off"></label></p>

          <?php if (isset($_GET['error'])): ?>
            <p class="nd-form__err" role="alert">Please check your name and phone number and try again.</p>
          <?php endif; ?>

          <div class="nd-form__row">
            <div>
              <label class="nd-sr" for="nd-name">Full name</label>
              <input class="nd-input" id="nd-name" name="name" type="text" placeholder="Full Name*" autocomplete="name" maxlength="120" required>
            </div>
            <div>
              <label class="nd-sr" for="nd-phone">Phone number</label>
              <input class="nd-input" id="nd-phone" name="phone" type="tel" inputmode="tel" placeholder="Phone Number*" autocomplete="tel" required>
            </div>
          </div>

          <div class="nd-form__row">
            <div>
              <label class="nd-sr" for="nd-treatment">Select treatment</label>
              <select class="nd-select" id="nd-treatment" name="treatment" required>
                <option value="" disabled selected>Select Treatment*</option>
                <?php foreach ($ndTreatments as $t): ?>
                  <option><?= e($t) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div>
              <label class="nd-sr" for="nd-date">Preferred date</label>
              <input class="nd-input" id="nd-date" name="preferred_date" type="date" placeholder="Preferred Date" min="<?= e(date('Y-m-d')) ?>">
            </div>
          </div>

          <div>
            <label class="nd-sr" for="nd-message">Your message</label>
            <textarea class="nd-textarea" id="nd-message" name="message" rows="3" maxlength="2000" placeholder="Your Message"></textarea>
          </div>

          <button class="nd-btn nd-btn--green nd-btn--lg nd-btn--block" type="submit">
            Book Appointment <?= nd_icon('arrow', 16, 2) ?>
          </button>

          <p class="nd-form__note">Your details are used only to arrange your consultation. A preferred date is a request, not a confirmed appointment &mdash; the clinic will call you back to fix the time.</p>
        </form>
      </div>

      <div>
        <h2 class="nd-h3" style="font-size:22px">Our Clinic Location</h2>

        <ul class="nd-nap">
          <li class="nd-nap__row">
            <span class="nd-nap__i"><?= nd_icon('pin', 16, 1.6) ?></span>
            <span class="nd-nap__t"><?= e(NAP_STREET) ?>,<br><?= e(NAP_LOCALITY) ?>, <?= e(NAP_REGION) ?> &ndash; <?= e(NAP_POSTCODE) ?><br><span style="color:var(--nd-muted)"><?= e(ucfirst(NAP_LANDMARK)) ?></span></span>
          </li>
          <li class="nd-nap__row">
            <span class="nd-nap__i"><?= nd_icon('phone', 16, 1.6) ?></span>
            <span class="nd-nap__t"><a href="tel:<?= e(PHONE_E164) ?>" data-track="call"><?= e(PHONE_DISPLAY) ?></a></span>
          </li>
          <li class="nd-nap__row">
            <span class="nd-nap__i"><?= nd_icon('mail', 16, 1.6) ?></span>
            <span class="nd-nap__t"><a href="mailto:<?= e(EMAIL) ?>"><?= e(EMAIL) ?></a></span>
          </li>
          <li class="nd-nap__row">
            <span class="nd-nap__i"><?= nd_icon('clock', 16, 1.6) ?></span>
            <span class="nd-nap__t"><?= e(HOURS_DISPLAY) ?><br><span style="color:var(--nd-muted)"><?= e(HOURS_NOTE) ?></span></span>
          </li>
        </ul>

        <?php /* Real channels only. The comp drew Facebook, Instagram, YouTube
                 and LinkedIn, but no verified profile URL for this clinic
                 exists in config — CLINIC_SAME_AS carries the GBP listing and
                 nothing else. Four dead links would be worse than four live
                 ones. Add the profiles to config and swap them in here. */ ?>
        <ul class="nd-socials">
          <?php foreach ($ndSocials as $social): ?>
            <li>
              <a class="nd-social" href="<?= e($social['url']) ?>" aria-label="<?= e($social['label']) ?>"<?= $social['track'] !== null ? ' data-track="' . e($social['track']) . '"' : '' ?><?= str_starts_with($social['url'], 'http') ? ' rel="noopener"' : '' ?>>
                <?= nd_icon($social['icon'], 17, 1.6) ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="nd-map">
        <iframe title="Google Map showing <?= e(SITE_NAME) ?> at <?= e(nap_address_line()) ?>"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3508.3229126883884!2d77.0438613!3d28.439680699999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5e4f6f45491%3A0x9dc43165216a74e6!2sDencespot%20Clinic!5e0!3m2!1sen!2sus!4v1787587082143!5m2!1sen!2sus"
                loading="lazy" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

        <p class="nd-map__card">
          <?= nd_icon('pin', 20, 1.8) ?>
          <span>
            <span class="nd-map__n" style="display:block"><?= e(SITE_NAME) ?></span>
            <span class="nd-map__s" style="display:block">Sector 39, <?= e(NAP_LOCALITY) ?></span>
          </span>
        </p>

        <a class="nd-btn nd-btn--green nd-map__cta" href="<?= e(MAPS_URL) ?>" rel="noopener">
          View on Google Maps <?= nd_icon('arrow', 15, 2) ?>
        </a>
      </div>

    </div>
  </div>
</section>

</main>

<!-- ==================== FOOTER ==================== -->
<footer class="nd-foot">
  <div class="nd-wrap">

    <div class="nd-foot__grid">
      <a class="nd-brand" href="/">
        <span class="nd-brand__mark"><?= nd_icon('leaf', 21, 1.4) ?></span>
        <span>
          <span class="nd-brand__name"><?= e(SITE_NAME) ?></span>
          <span class="nd-brand__sub">
            <span class="nd-brand__rule" aria-hidden="true"></span>
            <span class="nd-brand__tag">Hair &middot; Skin &middot; Aesthetics</span>
          </span>
        </span>
      </a>

      <nav aria-label="Footer">
        <p class="nd-foot__h">Quick Links</p>
        <div class="nd-foot__links">
          <a href="/">Home</a>
          <a href="/about-us">About Us</a>
          <a href="/hair-transplant-in-gurgaon">Treatments</a>
          <a href="/gallery">Gallery</a>
          <a href="/blog/">Blog</a>
          <a href="/contact">Contact Us</a>
        </div>
      </nav>

      <p class="nd-foot__script nd-script">A Healthier You<br>Starts Here</p>
    </div>

    <div class="nd-foot__bar">
      <p>&copy; <?= e(date('Y')) ?> <?= e(SITE_NAME) ?>. All rights reserved.</p>
      <nav aria-label="Legal">
        <a href="/privacy-policy">Privacy Policy</a>
        <a href="/terms">Terms &amp; Conditions</a>
        <a href="/medical-disclaimer">Medical Disclaimer</a>
      </nav>
    </div>

  </div>
</footer>

<script>
(function () {
  'use strict';

  /* Mobile navigation. */
  var burger = document.getElementById('nd-burger');
  var panel  = document.getElementById('nd-mnav');

  if (burger && panel) {
    burger.addEventListener('click', function () {
      var open = panel.getAttribute('data-open') === 'true';
      panel.setAttribute('data-open', open ? 'false' : 'true');
      burger.setAttribute('aria-expanded', open ? 'false' : 'true');
      burger.setAttribute('aria-label', open ? 'Open menu' : 'Close menu');
    });
  }

  /* Dropdown: hover and focus are handled in CSS, so this only keeps the
     button's aria-expanded honest for assistive tech and adds keyboard open. */
  document.querySelectorAll('.nd-drop').forEach(function (drop) {
    var toggle = drop.querySelector('.nd-drop__t');
    if (!toggle) { return; }

    var sync = function (state) { toggle.setAttribute('aria-expanded', state ? 'true' : 'false'); };

    drop.addEventListener('mouseenter', function () { sync(true); });
    drop.addEventListener('mouseleave', function () { sync(false); });
    drop.addEventListener('focusin',    function () { sync(true); });
    drop.addEventListener('focusout',   function () {
      if (!drop.contains(document.activeElement)) { sync(false); }
    });
    toggle.addEventListener('click', function () {
      var first = drop.querySelector('.nd-drop__m a');
      if (first) { first.focus(); }
    });
  });

  /* Horizontal rails. One page of cards per click, whatever the breakpoint. */
  function wireRail(railId, buttonAttr) {
    var rail = document.getElementById(railId);
    if (!rail) { return; }

    document.querySelectorAll('[' + buttonAttr + ']').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var card = rail.firstElementChild;
        var step = card ? card.getBoundingClientRect().width + 22 : rail.clientWidth;
        rail.scrollBy({
          left: btn.getAttribute(buttonAttr) === 'next' ? step : -step,
          behavior: 'smooth'
        });
      });
    });
  }

  wireRail('nd-rail', 'data-rail');
  wireRail('nd-tst-rail', 'data-tst');

  /* Conversion events, matching the tracking the rest of the site uses. */
  document.addEventListener('click', function (event) {
    var el = event.target.closest('[data-track]');
    if (!el || typeof window.gtag !== 'function') { return; }
    window.gtag('event', 'lead_' + el.getAttribute('data-track'), {
      page_path: window.location.pathname
    });
  });
}());
</script>

</body>
</html>
