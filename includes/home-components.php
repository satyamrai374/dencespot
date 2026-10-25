<?php
/**
 * Site chrome and building blocks — the October 2026 redesign.
 *
 * Started on the homepage and now sitewide: includes/header.php and
 * includes/footer.php render hp_header(), hp_footer(), the booking dialog and
 * the mobile bar from this file, and every page loads assets/css/home.css and
 * assets/js/home.js (inner pages add assets/css/site.css on top). Everything
 * reads config.php: NAP, phones, hours and doctor credentials are never
 * retyped.
 *
 * Three rules apply to every block below — they come from the NMC Guidelines
 * on Ethical Advertising and Public Communication (Public Notice
 * R-13014/01/2024-Ethics, 06.10.2026) read with the IMC Regulations 2002 —
 * and are the reason several sections of the design reference were adapted
 * rather than copied:
 *
 *  1. No superlatives, guarantees or outcome claims (cl. 8.1(iii), (vi),
 *     (ix)): no "best", "top", "expert", "advanced", "natural results",
 *     "permanent", "free", patient counts or ratings. No before/after images,
 *     testimonials or review prompts (cl. 8.1(v), Explanation V).
 *  2. Images in assets/img/home/ are AI-generated and each carries its own
 *     visible "AI-generated" mark (cl. 7.2). None shows a person, a doctor, a
 *     procedure on a patient, a treatment outcome or the clinic's premises.
 *  3. No promotional portrayal of a doctor (cl. 9.2, IMC 6.1.1): doctors
 *     appear only in the factual directory, with registration details
 *     (Explanation IV) and no photograph.
 */

declare(strict_types=1);

/* -------------------------------------------------------------------------
 * Navigation
 * ---------------------------------------------------------------------- */

/**
 * The design reference's "Results" item is "FAQs" here: the results page is
 * a before-and-after gallery that has not yet been through the NMC review
 * this homepage has, and the homepage should not route visitors into it.
 */
/* "Home" gave its slot to the Rohini menu (Oct 2026): the logo already links
   home, and eight top-level items do not fit at 1024px. */
const HOME_NAV = [
    ['label' => 'About',           'url' => '/about-us'],
    ['label' => 'Hair Transplant', 'url' => '/hair-transplant-in-gurgaon'],
    ['label' => 'Other Treatments', 'children' => [
        ['label' => 'Beard Transplant',     'url' => '/beard-transplant-gurgaon'],
        ['label' => 'Eyebrow Transplant',   'url' => '/eyebrow-transplant-in-gurgaon'],
        ['label' => 'Hair PRP & GFC',       'url' => '/hair-prp-treatment-in-gurgaon'],
        ['label' => 'Hair Fall Treatment',  'url' => '/hair-fall-treatment-in-gurgaon'],
        ['label' => "Women's Hair Loss",    'url' => '/womens-hair-loss-treatment-in-gurgaon'],
        ['label' => 'Laser Hair Removal',   'url' => '/laser-hair-removal-in-gurgaon'],
        ['label' => 'Skin Treatment',       'url' => '/skin-treatment-in-gurgaon'],
        ['label' => 'FUE Hair Transplant',  'url' => '/fue-hair-transplant-in-gurgaon'],
        ['label' => 'DHI Hair Transplant',  'url' => '/dhi-hair-transplant-in-gurgaon'],
        ['label' => 'Hair Transplant Cost', 'url' => '/hair-transplant-cost-in-gurgaon'],
    ]],
    ['label' => 'Rohini Clinic', 'children' => [
        ['label' => 'Rohini Clinic (Delhi)',   'url' => '/delhi-clinic'],
        ['label' => 'Hair Transplant',         'url' => '/hair-transplant-in-rohini'],
        ['label' => 'Beard Transplant',        'url' => '/beard-transplant-in-rohini'],
        ['label' => 'Eyebrow Transplant',      'url' => '/eyebrow-transplant-in-rohini'],
        ['label' => 'Hair PRP & GFC',          'url' => '/hair-prp-treatment-in-rohini'],
        ['label' => 'Hair Fall Treatment',     'url' => '/hair-fall-treatment-in-rohini'],
        ['label' => "Women's Hair Loss",       'url' => '/womens-hair-loss-treatment-in-rohini'],
        ['label' => 'Laser Hair Removal',      'url' => '/laser-hair-removal-in-rohini'],
        ['label' => 'Skin Treatment',          'url' => '/skin-treatment-in-rohini'],
        ['label' => 'All Rohini treatments',   'url' => '/delhi-clinic#treatments'],
    ]],
    // Patient guides and the two tools (14 Oct 2026). General pages, so the
    // same menu serves both clinics; it replaces the top-level FAQs link.
    ['label' => 'Guides', 'children' => [
        ['label' => 'FAQs',                      'url' => '/faqs'],
        ['label' => 'Graft Calculator',          'url' => '/hair-transplant-graft-calculator'],
        ['label' => 'Hair Loss Self-Check',      'url' => '/hair-loss-assessment'],
        ['label' => 'Cost & EMI Options',        'url' => '/cost-and-emi-options'],
        ['label' => 'How to Choose a Clinic',    'url' => '/how-to-choose-hair-transplant-clinic'],
        ['label' => 'Hair Transplant Aftercare', 'url' => '/hair-transplant-aftercare'],
    ]],
    ['label' => 'Blog',    'url' => '/blog/'],
    ['label' => 'Contact', 'url' => '/contact'],
];

/* Pages common to both clinics (homepage, about, contact, FAQs, blog, tools)
   use this instead (14 Oct 2026): one menu per clinic, so neither clinic is
   the default. Location pages keep HOME_NAV, adjusted by hp_nav_items(). */
const HOME_NAV_COMMON = [
    ['label' => 'About',      'url' => '/about-us'],
    ['label' => 'Treatments', 'url' => '/#treatments'],
    ['label' => 'Gurugram Clinic', 'children' => [
        ['label' => 'Gurugram Clinic (Sector 39)', 'url' => '/contact'],
        ['label' => 'Hair Transplant',      'url' => '/hair-transplant-in-gurgaon'],
        ['label' => 'Beard Transplant',     'url' => '/beard-transplant-gurgaon'],
        ['label' => 'Eyebrow Transplant',   'url' => '/eyebrow-transplant-in-gurgaon'],
        ['label' => 'Hair PRP & GFC',       'url' => '/hair-prp-treatment-in-gurgaon'],
        ['label' => 'Hair Fall Treatment',  'url' => '/hair-fall-treatment-in-gurgaon'],
        ['label' => "Women's Hair Loss",    'url' => '/womens-hair-loss-treatment-in-gurgaon'],
        ['label' => 'Laser Hair Removal',   'url' => '/laser-hair-removal-in-gurgaon'],
        ['label' => 'Skin Treatment',       'url' => '/skin-treatment-in-gurgaon'],
    ]],
    ['label' => 'Rohini Clinic', 'children' => [
        ['label' => 'Rohini Clinic (Delhi)',   'url' => '/delhi-clinic'],
        ['label' => 'Hair Transplant',         'url' => '/hair-transplant-in-rohini'],
        ['label' => 'Beard Transplant',        'url' => '/beard-transplant-in-rohini'],
        ['label' => 'Eyebrow Transplant',      'url' => '/eyebrow-transplant-in-rohini'],
        ['label' => 'Hair PRP & GFC',          'url' => '/hair-prp-treatment-in-rohini'],
        ['label' => 'Hair Fall Treatment',     'url' => '/hair-fall-treatment-in-rohini'],
        ['label' => "Women's Hair Loss",       'url' => '/womens-hair-loss-treatment-in-rohini'],
        ['label' => 'Laser Hair Removal',      'url' => '/laser-hair-removal-in-rohini'],
        ['label' => 'Skin Treatment',          'url' => '/skin-treatment-in-rohini'],
    ]],
    // Patient guides and the two tools (14 Oct 2026). General pages, so the
    // same menu serves both clinics; it replaces the top-level FAQs link.
    ['label' => 'Guides', 'children' => [
        ['label' => 'FAQs',                      'url' => '/faqs'],
        ['label' => 'Graft Calculator',          'url' => '/hair-transplant-graft-calculator'],
        ['label' => 'Hair Loss Self-Check',      'url' => '/hair-loss-assessment'],
        ['label' => 'Cost & EMI Options',        'url' => '/cost-and-emi-options'],
        ['label' => 'How to Choose a Clinic',    'url' => '/how-to-choose-hair-transplant-clinic'],
        ['label' => 'Hair Transplant Aftercare', 'url' => '/hair-transplant-aftercare'],
    ]],
    ['label' => 'Blog',    'url' => '/blog/'],
    ['label' => 'Contact', 'url' => '/contact'],
];

const HOME_FOOTER_LINKS = [
    // Named for its clinic so common pages list the two clinics side by side.
    'Gurugram, Sector 39' => [
        ['label' => 'Hair Transplant',     'url' => '/hair-transplant-in-gurgaon'],
        ['label' => 'FUE Hair Transplant', 'url' => '/fue-hair-transplant-in-gurgaon'],
        ['label' => 'DHI Hair Transplant', 'url' => '/dhi-hair-transplant-in-gurgaon'],
        ['label' => 'Beard Transplant',    'url' => '/beard-transplant-gurgaon'],
        ['label' => 'Eyebrow Transplant',  'url' => '/eyebrow-transplant-in-gurgaon'],
        ['label' => 'Hair PRP & GFC',      'url' => '/hair-prp-treatment-in-gurgaon'],
        ['label' => 'Hair Fall Treatment', 'url' => '/hair-fall-treatment-in-gurgaon'],
        ['label' => "Women's Hair Loss",   'url' => '/womens-hair-loss-treatment-in-gurgaon'],
        ['label' => 'Laser Hair Removal',  'url' => '/laser-hair-removal-in-gurgaon'],
        ['label' => 'Skin Treatment',      'url' => '/skin-treatment-in-gurgaon'],
    ],
    'Rohini, Delhi' => [
        ['label' => 'Rohini Clinic',       'url' => '/delhi-clinic'],
        ['label' => 'Hair Transplant',     'url' => '/hair-transplant-in-rohini'],
        ['label' => 'Beard Transplant',    'url' => '/beard-transplant-in-rohini'],
        ['label' => 'Eyebrow Transplant',  'url' => '/eyebrow-transplant-in-rohini'],
        ['label' => 'Hair PRP & GFC',      'url' => '/hair-prp-treatment-in-rohini'],
        ['label' => 'Hair Fall Treatment', 'url' => '/hair-fall-treatment-in-rohini'],
        ['label' => 'Laser Hair Removal',  'url' => '/laser-hair-removal-in-rohini'],
        ['label' => 'Skin Treatment',      'url' => '/skin-treatment-in-rohini'],
        ['label' => 'All treatments in Rohini', 'url' => '/delhi-clinic#treatments'],
    ],
    'Clinic' => [
        ['label' => 'About Us',             'url' => '/about-us'],
        ['label' => 'Our Doctors',          'url' => '/medical-disclaimer#doctors'],
        ['label' => 'Delhi (Rohini) Clinic', 'url' => '/delhi-clinic'],
        ['label' => 'Hair Transplant Cost', 'url' => '/hair-transplant-cost-in-gurgaon'],
        ['label' => 'FAQs',                 'url' => '/faqs'],
        ['label' => 'Graft Calculator',     'url' => '/hair-transplant-graft-calculator'],
        ['label' => 'Hair Loss Self-Check', 'url' => '/hair-loss-assessment'],
        ['label' => 'Blog',                 'url' => '/blog/'],
        ['label' => 'Contact',              'url' => '/contact'],
    ],
];

const HOME_LEGAL_LINKS = [
    ['label' => 'Privacy Policy',     'url' => '/privacy-policy'],
    ['label' => 'Terms & Conditions', 'url' => '/terms'],
    ['label' => 'Disclaimer',         'url' => '/medical-disclaimer'],
    ['label' => 'Sitemap',            'url' => '/sitemap.xml'],
];

/** Options in the booking dialog. */
const HOME_TREATMENT_OPTIONS = [
    'Hair transplant',
    'Beard transplant',
    'Eyebrow transplant',
    'Hair PRP / GFC',
    'Hair fall treatment',
    'Laser hair removal',
    'Skin care',
    'Not sure — please advise',
];

/* -------------------------------------------------------------------------
 * Images
 *
 * Every file in assets/img/home/ exists at the widths listed, as WebP. The
 * largest pair doubles as the width/height attributes, which is what lets the
 * browser reserve the box before the file arrives (no layout shift).
 * ---------------------------------------------------------------------- */

const HOME_IMAGES = [
    'hero'               => [[800, 537], [1200, 805], [1600, 1073], [2000, 1342]],
    'tx-hair-transplant' => [[160, 160], [240, 240]],
    'tx-beard'           => [[160, 160], [240, 240]],
    'tx-eyebrow'         => [[160, 160], [240, 240]],
    'tx-prp'             => [[160, 160], [240, 240]],
    'tx-hair-fall'       => [[160, 160], [240, 240]],
    'tx-laser'           => [[160, 160], [240, 240]],
    'tx-skin'            => [[160, 160], [240, 240]],
    'intro-donor'        => [[360, 537], [560, 835], [840, 1252]],
    'intro-recipient'    => [[360, 537], [560, 835], [840, 1252]],
    'stage-temples'      => [[480, 322], [720, 483]],
    'stage-crown'        => [[480, 322], [720, 483]],
    'stage-extensive'    => [[480, 322], [720, 483]],
    'stage-female'       => [[480, 322], [720, 483]],
    'step-consultation'  => [[400, 268], [640, 429]],
    'step-plan'          => [[400, 268], [640, 429]],
    'step-procedure'     => [[400, 268], [640, 429]],
    'step-followup'      => [[400, 268], [640, 429]],
    'ambient'            => [[600, 448], [900, 672], [1200, 896]],
    // Homepage treatment cards (4:3), AI-generated, one photographic style
    // (hair and beard from the client, the rest generated to match; 25 Oct 2026).
    'card-hair-transplant'    => [[512, 384], [768, 576]],
    'card-beard-transplant'   => [[512, 384], [768, 576]],
    'card-eyebrow-transplant' => [[512, 384], [768, 576]],
    'card-hair-prp'           => [[512, 384], [768, 576]],
    'card-hair-fall'          => [[512, 384], [768, 576]],
    'card-womens-hair-loss'   => [[512, 384], [768, 576]],
    'card-laser-hair-removal' => [[512, 384], [768, 576]],
    'card-skin-treatment'     => [[512, 384], [768, 576]],
    // Homepage doctor portraits (1:1), from the clinic's photos (25 Oct 2026).
    'doctor-nyra'             => [[480, 480], [720, 720]],
    'doctor-rahul'            => [[480, 480], [720, 720]],
    'doctor-3'                => [[480, 480], [720, 720]],
    // Treatment illustrations (4:5) in assets/img/services/ — AI-generated,
    // no people; used by the service-page heroes and lp_* sections.
    'svc-hair-transplant'    => [[512, 640], [768, 960]],
    'svc-beard'              => [[512, 640], [768, 960]],
    'svc-eyebrow'            => [[512, 640], [768, 960]],
    'svc-prp'                => [[512, 640], [768, 960]],
    'svc-hair-fall'          => [[512, 640], [768, 960]],
    'svc-laser'              => [[512, 640], [768, 960]],
    'svc-skin'               => [[512, 640], [768, 960]],
    'svc-hairline'           => [[512, 640], [768, 960]],
    'svc-crown'              => [[512, 640], [768, 960]],
    'svc-women'              => [[512, 640], [768, 960]],
    'svc-unshaven'           => [[512, 640], [768, 960]],
    'svc-consultation'       => [[512, 640], [768, 960]],
    'svc-procedure'          => [[512, 640], [768, 960]],
    'svc-follicle'           => [[512, 640], [768, 960]],
    'svc-followup'           => [[512, 640], [768, 960]],
];

function hp_img_url(string $slug, int $width): string
{
    $dir = str_starts_with($slug, 'svc-') ? '/assets/img/services/' : '/assets/img/home/';
    return $dir . $slug . '-' . $width . '.webp';
}

function hp_srcset(string $slug): string
{
    return implode(', ', array_map(
        static fn (array $s): string => hp_img_url($slug, $s[0]) . ' ' . $s[0] . 'w',
        HOME_IMAGES[$slug]
    ));
}

/**
 * Image slugs this page has already shown (hp_img() records each one), so a
 * later block — the further-reading cards — can avoid repeating one. Pass a
 * slug to record it; the return value is every slug recorded so far.
 */
function hp_img_used(?string $slug = null): array
{
    static $used = [];
    if ($slug !== null) {
        $used[$slug] = true;
    }
    return $used;
}

/**
 * A responsive <img>. $attrs: class, loading ('lazy' default), fetchpriority.
 */
function hp_img(string $slug, string $alt, string $sizes, array $attrs = []): string
{
    $set = HOME_IMAGES[$slug] ?? null;
    if ($set === null) {
        return '';
    }
    hp_img_used($slug);
    [$w, $h] = $set[count($set) - 1];
    $loading = $attrs['loading'] ?? 'lazy';

    $html = '<img src="' . e(hp_img_url($slug, $w)) . '"'
          . ' srcset="' . e(hp_srcset($slug)) . '"'
          . ' sizes="' . e($sizes) . '"'
          . ' width="' . $w . '" height="' . $h . '"'
          . ' alt="' . e($alt) . '"'
          . ' loading="' . e($loading) . '" decoding="' . ($loading === 'eager' ? 'sync' : 'async') . '"';
    if (!empty($attrs['fetchpriority'])) {
        $html .= ' fetchpriority="' . e($attrs['fetchpriority']) . '"';
    }
    if (!empty($attrs['class'])) {
        $html .= ' class="' . e($attrs['class']) . '"';
    }
    return $html . '>';
}

/* -------------------------------------------------------------------------
 * Icons — one stroke style on a 24×24 grid, aria-hidden.
 * ---------------------------------------------------------------------- */

function hp_icon(string $name, int $size = 22, float $stroke = 1.7): string
{
    static $paths = [
        'arrow'      => '<path d="M5 12h14M13 6l6 6-6 6"/>',
        'arrow-left' => '<path d="M19 12H5M11 6l-6 6 6 6"/>',
        'chevron'    => '<path d="M6 9l6 6 6-6"/>',
        'menu'       => '<path d="M4 7h16M4 12h16M4 17h16"/>',
        'close'      => '<path d="M6 6l12 12M18 6L6 18"/>',
        'check'      => '<path d="M5.5 12.5l4 4 9-9"/>',
        'calendar'   => '<rect x="3.5" y="5" width="17" height="15" rx="3"/><path d="M8 3v4M16 3v4M3.5 10h17"/>',
        'cal-check'  => '<rect x="3.5" y="5" width="17" height="15" rx="3"/><path d="M8 3v4M16 3v4M3.5 10h17"/><path d="M9 15l2 2 4-4"/>',
        'phone'      => '<path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a1 1 0 0 1-1 1A16 16 0 0 1 4 5a1 1 0 0 1 1-1z"/>',
        'whatsapp'   => '<path d="M21 11.5a8.5 8.5 0 0 1-12.6 7.4L3 20.5l1.7-5.2A8.5 8.5 0 1 1 21 11.5z"/><path d="M9 8.6c.2-.4.6-.5.9-.4l.8 1.7c.1.3 0 .6-.2.8l-.5.5a6 6 0 0 0 2.9 2.9l.5-.5c.2-.2.5-.3.8-.2l1.7.8c.2.3.1.7-.4.9-1 .6-2.3.7-4-.3a8.7 8.7 0 0 1-2.9-2.9c-1-1.7-.9-3-.3-4z"/>',
        'stethoscope'=> '<path d="M5 3.5v4.5a4.5 4.5 0 0 0 9 0V3.5"/><path d="M9.5 12.5v2.5a5 5 0 0 0 10 0v-2"/><circle cx="19.5" cy="11" r="2"/>',
        'follicle'   => '<path d="M12 3.5c-.7 3.3-.7 6.4 0 9.5"/><path d="M8.6 5c.3 2.9.9 5.4 2.1 7.6"/><path d="M15.4 5c-.3 2.9-.9 5.4-2.1 7.6"/><ellipse cx="12" cy="16.5" rx="4" ry="3.5"/><path d="M12 20v1.5"/>',
        'doc'        => '<path d="M6 3h9l4 4v14H6z"/><path d="M14.5 3v4.5H19"/><path d="M9 12h7M9 16h5"/>',
        'clipboard'  => '<rect x="5" y="4.5" width="14" height="16.5" rx="2"/><path d="M9 4.5V3h6v1.5"/><path d="M8.5 10h7M8.5 14h7M8.5 18h4"/>',
        'user-md'    => '<circle cx="12" cy="7.5" r="3.5"/><path d="M5 21c0-4 3.1-6.5 7-6.5s7 2.5 7 6.5"/><path d="M12 16v4M10 18h4"/>',
        'layers'     => '<path d="M12 3.5l8.5 4.5L12 12.5 3.5 8z"/><path d="M3.5 12.5L12 17l8.5-4.5"/><path d="M3.5 16.5L12 21l8.5-4.5"/>',
        'eye'        => '<path d="M2.5 12S6 5.5 12 5.5 21.5 12 21.5 12 18 18.5 12 18.5 2.5 12 2.5 12z"/><circle cx="12" cy="12" r="3"/>',
        'people'     => '<circle cx="9" cy="8" r="3"/><path d="M3.5 19.5c0-3.3 2.5-5.5 5.5-5.5s5.5 2.2 5.5 5.5"/><circle cx="17" cy="9" r="2.5"/><path d="M16 14.2c3 0 5 1.9 5 4.8"/>',
        'cap'        => '<path d="M2.5 9L12 4.5 21.5 9 12 13.5z"/><path d="M6.5 11v4.5c0 1.5 2.5 3 5.5 3s5.5-1.5 5.5-3V11"/><path d="M21.5 9v5"/>',
        'pin'        => '<path d="M12 21s-7-5.5-7-10a7 7 0 1 1 14 0c0 4.5-7 10-7 10z"/><circle cx="12" cy="11" r="2.5"/>',
        'clock'      => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
        'mail'       => '<rect x="3" y="5" width="18" height="14" rx="2.5"/><path d="M3.5 7l8.5 6 8.5-6"/>',
        'shield'     => '<path d="M12 3l7 3v5.5c0 4.2-2.9 7.6-7 9-4.1-1.4-7-4.8-7-9V6z"/><path d="M9.5 12l1.8 1.8L15 10"/>',
        'info'       => '<circle cx="12" cy="12" r="9"/><path d="M12 8h.01M12 11v5"/>',
        'instagram'  => '<rect x="3.5" y="3.5" width="17" height="17" rx="5"/><circle cx="12" cy="12" r="4"/><path d="M17.2 6.8h.01"/>',
        'facebook'   => '<path d="M14 21v-7.5h2.6l.4-3H14V8.6c0-.9.3-1.5 1.6-1.5H17V4.4c-.3 0-1.2-.1-2.3-.1-2.3 0-3.7 1.4-3.7 3.9v2.3H8.5v3H11V21"/>',
        'youtube'    => '<rect x="2.5" y="5.5" width="19" height="13" rx="4"/><path d="M10 9.5v5l4.5-2.5z"/>',
        'logo'       => '<path d="M6 21c0-6 3-9 6-9s6 3 6 9"/><path d="M8 12c-1.5-3-1-7 1-9"/><path d="M16 12c1.5-3 1-7-1-9"/>',
    ];

    return sprintf(
        '<svg class="hp-i" width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="%2$s" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">%3$s</svg>',
        $size,
        $stroke,
        $paths[$name] ?? $paths['info']
    );
}

/* -------------------------------------------------------------------------
 * Small shared pieces
 * ---------------------------------------------------------------------- */

function hp_logo(bool $onDark = false): string
{
    // The artwork sits on white; .hp-logo--dark gives it a white plate.
    return '<span class="hp-logo' . ($onDark ? ' hp-logo--dark' : '') . '">'
         . site_logo($onDark ? 'lazy' : 'eager')
         . '</span>';
}

/**
 * "Book a consultation" link. With JavaScript it opens the booking dialog
 * (preselecting $treatment); without, it is an ordinary link to the booking
 * page, so the call to action never depends on a script loading.
 */
function hp_book_link(string $label, string $class = 'hp-btn hp-btn--primary', string $treatment = '', string $icon = 'arrow'): string
{
    $inner = $icon === 'calendar'
        ? e($label) . ' ' . hp_icon('calendar', 17)
        : e($label) . ($icon !== '' ? ' ' . hp_icon($icon, 17, 2) : '');

    return '<a class="' . e($class) . '" href="/book-consultation" data-book'
         . ($treatment !== '' ? ' data-treatment="' . e($treatment) . '"' : '')
         . ' data-track="book">' . $inner . '</a>';
}

function hp_phone_link(string $class = 'hp-btn hp-btn--outline'): string
{
    // The Rohini number on Rohini pages (location rule, 14 Oct 2026).
    $rohini = function_exists('hp_page_location') && hp_page_location() === 'rohini';
    $tel    = $rohini ? LOC_DELHI_PHONE_E164 : PHONE_E164;
    $show   = $rohini ? LOC_DELHI_PHONE_DISPLAY : PHONE_DISPLAY;
    return '<a class="' . e($class) . '" href="tel:' . e($tel) . '" data-track="call">'
         . hp_icon('phone', 17) . ' <span>' . e($show) . '</span></a>';
}

/** Eyebrow + h2 (+ optional intro). $id names the h2 for aria-labelledby. */
function hp_section_head(string $id, string $eyebrow, string $title, string $intro = '', bool $center = true): string
{
    return '<div class="hp-head' . ($center ? ' hp-head--center' : '') . '">'
         . '<p class="hp-eyebrow">' . e($eyebrow) . '</p>'
         . '<h2 class="hp-h2" id="' . e($id) . '">' . e($title) . '</h2>'
         . ($intro !== '' ? '<p class="hp-sub">' . e($intro) . '</p>' : '')
         . '</div>';
}

/**
 * The per-image AI source mark required by NMC cl. 7.2. Visible text, laid
 * over the image it describes; the image's alt text repeats it for screen
 * readers, so the chip itself is hidden from them to avoid saying it twice.
 */
function hp_ai_chip(string $text = 'AI-generated illustration'): string
{
    return '<span class="hp-ai-chip" aria-hidden="true">' . e($text) . '</span>';
}

/**
 * A clearly marked placeholder for a fact the clinic has not yet supplied.
 * Deliberately conspicuous: it must be filled in from config.php before this
 * page is published, never quietly left on a live page.
 */
function hp_placeholder(string $what): string
{
    return '<span class="hp-ph">[' . e($what) . ']</span>';
}

/**
 * Doctor directory — the disclosure NMC Explanation IV requires of a clinic's
 * website (name, qualifications, registration status, SMR/NMR number) and the
 * form cl. 9.1 treats as patient information rather than advertising. No
 * photographs (cl. 9.2) and nothing beyond the directory fields.
 *
 * 14 Oct 2026 (client request): every doctor in DOCTORS is listed here,
 * Dr. Rahul included, and no placeholders are printed — a qualification or
 * registration line appears only once it has been entered in config.php.
 */
function hp_doctor_directory(): string
{
    ob_start(); ?>
<div class="hp-docs">
  <h3 class="hp-docs__title">Doctors at <?= e(SITE_NAME) ?></h3>
  <ul class="hp-docs__list">
    <?php $hpDocs = array_filter(DOCTORS, static fn (array $d): bool => !empty($d['name'])); ?>
    <?php foreach ($hpDocs as $doc): ?>
      <li class="hp-doc">
        <span class="hp-doc__icon"><?= hp_icon('user-md', 22, 1.6) ?></span>
        <div>
          <p class="hp-doc__name"><?= e($doc['name']) ?></p>
          <?php if (!empty($doc['quals'])): ?>
            <p class="hp-doc__line">
              <?= e($doc['quals']) ?>
              <?php if (!empty($doc['specialty']) && stripos($doc['quals'], $doc['specialty']) === false): ?> · <?= e($doc['specialty']) ?><?php endif; ?>
            </p>
          <?php endif; ?>
          <?php if (($reg = doctor_registration($doc)) !== ''): ?>
            <p class="hp-doc__line"><?= $reg ?></p>
          <?php endif; ?>
          <?php if (!empty($doc['clinics'])): ?>
            <p class="hp-doc__line hp-doc__line--muted">Consults at: <?= e($doc['clinics']) ?></p>
          <?php endif; ?>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
  <?php if (doctors_have_registration($hpDocs)): ?>
  <p class="hp-docs__verify">Registration can be verified on the National Medical Commission’s <a href="https://www.nmc.org.in/information-desk/indian-medical-register/" rel="noopener" target="_blank">Indian Medical Register<span class="hp-sr"> (opens in a new tab)</span></a> or the <a href="https://nmr-nmc.abdm.gov.in/" rel="noopener" target="_blank">National Medical Register<span class="hp-sr"> (opens in a new tab)</span></a>.</p>
  <?php endif; ?>
</div>
<?php
    return (string) ob_get_clean();
}

/* -------------------------------------------------------------------------
 * Clinic locations
 * ---------------------------------------------------------------------- */

/**
 * The two clinics, side by side. Used on the homepage and, through
 * local_block(), on every treatment page. The Delhi street address is not in
 * config yet (LOC_DELHI_ADDRESS holds only "Delhi (Rohini)"), so it prints a
 * marked placeholder rather than a guessed address.
 */
function hp_clinic_cards(?string $only = null): string
{
    $delhiStreet = LOC_DELHI_ADDRESS !== 'Dencespot Clinic, Delhi (Rohini)' ? LOC_DELHI_ADDRESS : null;
    // Don't offer "clinic details" for the page the visitor is already on.
    $here = rtrim((string) parse_url((string) ($_SERVER['REQUEST_URI'] ?? ''), PHP_URL_PATH), '/');
    $clinics = [
        [
            'num' => 'Clinic 1', 'city' => 'Gurugram', 'area' => 'Sector 39',
            'address' => e(NAP_STREET . ', ' . NAP_LOCALITY . ', ' . NAP_REGION . ' ' . NAP_POSTCODE),
            'landmark' => NAP_LANDMARK,
            'tel' => PHONE_E164, 'phone' => PHONE_DISPLAY,
            'maps' => LOC_GURGAON_MAPS_URL, 'page' => '/contact',
        ],
        [
            'num' => 'Clinic 2', 'city' => 'Delhi', 'area' => 'Rohini',
            'address' => $delhiStreet !== null ? e($delhiStreet) : 'Rohini, Delhi ' . hp_placeholder('full street address to be added'),
            'landmark' => LOC_DELHI_LANDMARK,
            'tel' => LOC_DELHI_PHONE_E164, 'phone' => LOC_DELHI_PHONE_DISPLAY,
            'maps' => LOC_DELHI_MAPS_URL, 'page' => '/delhi-clinic',
        ],
    ];

    if ($only === 'gurgaon') {
        $clinics = [$clinics[0]];
    } elseif ($only === 'rohini') {
        $clinics = [$clinics[1]];
    }
    if ($only !== null) {
        // A single card is not "Clinic 1/2" of anything.
        $clinics[0]['num'] = 'Our clinic';
    }

    ob_start(); ?>
<ul class="hp-clinics__grid<?= count($clinics) === 1 ? ' hp-clinics__grid--one' : '' ?>" role="list">
  <?php foreach ($clinics as $c): ?>
    <li class="hp-clinic">
      <p class="hp-clinic__num"><?= e($c['num']) ?></p>
      <h3 class="hp-clinic__city"><?= e($c['city']) ?> <span><?= e($c['area']) ?></span></h3>
      <ul class="hp-clinic__facts" role="list">
        <li><?= hp_icon('pin', 18) ?><span><?= $c['address'] ?><small><?= e($c['landmark']) ?></small></span></li>
        <li><?= hp_icon('clock', 18) ?><span><?= e(HOURS_DISPLAY) ?><small><?= e(HOURS_NOTE) ?></small></span></li>
        <li><?= hp_icon('phone', 18) ?><span><a href="tel:<?= e($c['tel']) ?>" data-track="call"><?= e($c['phone']) ?></a></span></li>
      </ul>
      <div class="hp-clinic__actions">
        <a class="hp-btn hp-btn--outline hp-btn--sm" href="<?= e($c['maps']) ?>" rel="noopener" target="_blank"><?= hp_icon('pin', 16) ?> Directions<span class="hp-sr"> to the <?= e($c['city']) ?> clinic (opens in a new tab)</span></a>
        <?php if ($c['page'] !== $here): ?>
          <a class="hp-link" href="<?= e($c['page']) ?>"><?= e($c['city']) ?> clinic details <?= hp_icon('arrow', 15, 2) ?></a>
        <?php endif; ?>
      </div>
    </li>
  <?php endforeach; ?>
</ul>
<?php
    return (string) ob_get_clean();
}

/* -------------------------------------------------------------------------
 * Masthead
 * ---------------------------------------------------------------------- */

function hp_header(string $current = '/'): string
{
    ob_start(); ?>
<?php $hpLoc = hp_page_location(); ?>
<div class="hp-topbar">
  <div class="hp-wrap hp-topbar__inner">
    <?php if ($hpLoc === 'rohini'): ?>
      <p class="hp-topbar__clinics"><?= hp_icon('pin', 14, 2) ?><span><?= e(SITE_NAME) ?>, <a href="/delhi-clinic">Rohini, Delhi</a></span></p>
      <p class="hp-topbar__meta">
        <span><?= hp_icon('clock', 14, 2) ?><?= e(HOURS_DISPLAY) ?></span>
        <a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a>
      </p>
    <?php elseif ($hpLoc === 'gurgaon'): ?>
      <p class="hp-topbar__clinics"><?= hp_icon('pin', 14, 2) ?><span><?= e(SITE_NAME) ?>, <a href="/contact">Sector 39, Gurugram</a></span></p>
      <p class="hp-topbar__meta">
        <span><?= hp_icon('clock', 14, 2) ?><?= e(HOURS_DISPLAY) ?></span>
        <a href="tel:<?= e(PHONE_E164) ?>" data-track="call"><?= e(PHONE_DISPLAY) ?></a>
      </p>
    <?php else: ?>
      <p class="hp-topbar__clinics"><?= hp_icon('pin', 14, 2) ?><span>Two clinics: <a href="/contact">Gurugram (Sector 39)</a> &amp; <a href="/delhi-clinic">Delhi (Rohini)</a></span></p>
      <p class="hp-topbar__meta">
        <span><?= hp_icon('clock', 14, 2) ?><?= e(HOURS_DISPLAY) ?></span>
        <a href="tel:<?= e(PHONE_E164) ?>" data-track="call">Gurugram <?= e(PHONE_DISPLAY) ?></a>
        <a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call">Delhi <?= e(LOC_DELHI_PHONE_DISPLAY) ?></a>
      </p>
    <?php endif; ?>
  </div>
</div>
<header class="hp-header" data-hp-header>
  <div class="hp-wrap hp-header__bar">
    <a class="hp-header__brand" href="/" aria-label="<?= e(SITE_NAME) ?> — home"><?= hp_logo() ?></a>

    <nav class="hp-nav" aria-label="Primary">
      <ul class="hp-nav__list" role="list">
        <?php foreach (hp_nav_items() as $i => $item): ?>
          <?php if (isset($item['children'])): ?>
          <li class="hp-nav__item hp-nav__item--menu" data-hp-menu>
            <button class="hp-nav__link hp-nav__toggle" type="button" aria-expanded="false" aria-controls="hp-menu-<?= $i ?>"><?= e($item['label']) ?> <?= hp_icon('chevron', 14, 2) ?></button>
            <ul class="hp-nav__menu" id="hp-menu-<?= $i ?>">
              <?php foreach ($item['children'] as $child): ?>
                <li><a href="<?= e($child['url']) ?>"><?= e($child['label']) ?></a></li>
              <?php endforeach; ?>
            </ul>
          </li>
          <?php else: ?>
          <li class="hp-nav__item"><a class="hp-nav__link" href="<?= e($item['url']) ?>"<?= $item['url'] === $current ? ' aria-current="page"' : '' ?>><?= e($item['label']) ?></a></li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </nav>

    <div class="hp-header__actions">
      <?php $hpCallTel = hp_is_rohini_page() ? LOC_DELHI_PHONE_E164 : PHONE_E164; $hpCallShow = hp_is_rohini_page() ? LOC_DELHI_PHONE_DISPLAY : PHONE_DISPLAY; ?>
      <a class="hp-icon-btn hp-header__call" href="tel:<?= e($hpCallTel) ?>" data-track="call" aria-label="Call the clinic on <?= e($hpCallShow) ?>"><?= hp_icon('phone', 18) ?></a>
      <?= hp_book_link('Book Consultation', 'hp-btn hp-btn--primary hp-btn--sm hp-header__book', '', 'calendar') ?>
      <button class="hp-icon-btn hp-burger" type="button" aria-expanded="false" aria-controls="hp-mnav" aria-label="Open menu" data-hp-burger><span class="hp-i--menu"><?= hp_icon('menu', 20) ?></span><span class="hp-i--close"><?= hp_icon('close', 20) ?></span></button>
    </div>
  </div>

  <div class="hp-mnav" id="hp-mnav" hidden>
    <nav class="hp-wrap" aria-label="Mobile">
      <ul class="hp-mnav__list">
        <?php foreach (hp_nav_items() as $item): ?>
          <?php if (isset($item['children'])): ?>
            <li class="hp-mnav__group"><span class="hp-mnav__heading"><?= e($item['label']) ?></span>
              <ul>
                <?php foreach ($item['children'] as $child): ?>
                  <li><a href="<?= e($child['url']) ?>"><?= e($child['label']) ?></a></li>
                <?php endforeach; ?>
              </ul>
            </li>
          <?php else: ?>
            <li><a href="<?= e($item['url']) ?>"<?= $item['url'] === $current ? ' aria-current="page"' : '' ?>><?= e($item['label']) ?></a></li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
      <div class="hp-mnav__cta">
        <?= hp_book_link('Book a Consultation', 'hp-btn hp-btn--primary hp-btn--block') ?>
        <?= hp_phone_link('hp-btn hp-btn--outline hp-btn--block') ?>
      </div>
    </nav>
  </div>
</header>
<?php
    return (string) ob_get_clean();
}

/* -------------------------------------------------------------------------
 * Footer
 * ---------------------------------------------------------------------- */

function hp_footer(): string
{
    $social = array_filter(SOCIAL_LINKS, static fn (?string $url): bool => $url !== null && $url !== '');
    $loc    = hp_page_location();

    // Link columns for this page's location (a Rohini page lists Rohini
    // treatments only; a Gurugram page leaves the Rohini column out).
    $columns = HOME_FOOTER_LINKS;
    if ($loc === 'rohini') {
        $columns = ['Treatments in Rohini' => $columns['Rohini, Delhi'], 'Clinic' => $columns['Clinic']];
        $columns['Clinic'] = array_values(array_filter($columns['Clinic'], static fn (array $l): bool => !str_contains($l['url'], 'gurgaon')));
    } elseif ($loc === 'gurgaon') {
        unset($columns['Rohini, Delhi']);
        $columns['Clinic'] = array_values(array_filter($columns['Clinic'], static fn (array $l): bool => $l['url'] !== '/delhi-clinic'));
    }
    $about = match ($loc) {
        'rohini'  => 'Hair, skin and laser clinic in Rohini, North-West Delhi. Hair transplant, beard and eyebrow transplant, PRP, hair-fall treatment, laser hair removal and skin care, planned case by case after a consultation.',
        'gurgaon' => 'Hair, skin and laser clinic in Sector 39, Gurugram. Hair transplant, beard and eyebrow transplant, PRP, hair-fall treatment, laser hair removal and skin care, planned case by case after a consultation.',
        default   => 'Hair, skin and laser clinic in Gurugram and Delhi. Hair transplant, beard and eyebrow transplant, PRP, hair-fall treatment, laser hair removal and skin care, planned case by case after a consultation.',
    };

    ob_start(); ?>
<footer class="hp-footer">
  <div class="hp-wrap">
    <div class="hp-footer__grid<?= count($columns) === 2 ? ' hp-footer__grid--4' : '' ?>">
      <div class="hp-footer__brand">
        <a href="/" aria-label="<?= e(SITE_NAME) ?> — home"><?= hp_logo(true) ?></a>
        <p class="hp-footer__about"><?= e($about) ?></p>
        <?php if ($social !== []): ?>
        <ul class="hp-social" aria-label="<?= e(SITE_NAME) ?> on social media">
          <?php foreach ($social as $network => $url): ?>
            <li><a href="<?= e($url) ?>" rel="noopener" target="_blank" aria-label="<?= e($network) ?> (opens in a new tab)"><?= hp_icon(strtolower($network), 18) ?></a></li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>
      </div>

      <?php foreach ($columns as $heading => $links): ?>
      <nav class="hp-footer__col" aria-label="<?= e($heading) ?>">
        <h2 class="hp-footer__h"><?= e($heading) ?></h2>
        <ul>
          <?php foreach ($links as $link): ?>
            <li><a href="<?= e($link['url']) ?>"><?= e($link['label']) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </nav>
      <?php endforeach; ?>

      <div class="hp-footer__col">
        <h2 class="hp-footer__h">Visit or Call</h2>
        <address class="hp-footer__addr">
          <?php if ($loc !== 'rohini'): ?>
          <p><strong>Gurugram</strong><?= e(NAP_STREET) ?>, <?= e(NAP_LOCALITY) ?>, <?= e(NAP_REGION) ?> <?= e(NAP_POSTCODE) ?> <span class="hp-footer__muted">(<?= e(NAP_LANDMARK) ?>)</span><br>
            <a href="tel:<?= e(PHONE_E164) ?>" data-track="call"><?= e(PHONE_DISPLAY) ?></a> · <a href="<?= e(LOC_GURGAON_MAPS_URL) ?>" rel="noopener" target="_blank">Map<span class="hp-sr"> (opens in a new tab)</span></a></p>
          <?php endif; ?>
          <?php if ($loc !== 'gurgaon'): ?>
          <p><strong>Delhi (Rohini)</strong><?= e(LOC_DELHI_LANDMARK) ?><br>
            <a href="tel:<?= e(LOC_DELHI_PHONE_E164) ?>" data-track="call"><?= e(LOC_DELHI_PHONE_DISPLAY) ?></a> · <a href="<?= e(LOC_DELHI_MAPS_URL) ?>" rel="noopener" target="_blank">Map<span class="hp-sr"> (opens in a new tab)</span></a></p>
          <?php endif; ?>
          <?php $footWa = $loc === 'rohini' ? LOC_DELHI_WHATSAPP_URL : WHATSAPP_URL; $footWaNum = $loc === 'rohini' ? LOC_DELHI_PHONE_DISPLAY : PHONE_DISPLAY; ?>
          <p><a href="mailto:<?= e(EMAIL) ?>"><?= e(EMAIL) ?></a><br>
            <a href="<?= e($footWa) ?>" rel="noopener" data-track="whatsapp">WhatsApp <?= e($footWaNum) ?></a></p>
          <p><?= e(HOURS_DISPLAY) ?> <span class="hp-footer__muted">· <?= e(HOURS_NOTE) ?></span></p>
        </address>
      </div>
    </div>

    <div class="hp-footer__legal">
      <p><strong>Medical disclaimer.</strong> <?= e(MEDICAL_DISCLAIMER) ?></p>
      <p><strong>About our images.</strong> <?= e(AI_IMAGE_NOTICE) ?> Each one is marked “AI-generated” where it appears. <a href="/medical-disclaimer#images">Image policy</a> · <a href="/medical-disclaimer#doctors">Our doctors</a></p>
    </div>

    <div class="hp-footer__bottom">
      <p>&copy; <?= date('Y') ?> <?= e(SITE_NAME) ?>. All rights reserved.</p>
      <ul class="hp-footer__legal-links">
        <?php foreach (HOME_LEGAL_LINKS as $link): ?>
          <li><a href="<?= e($link['url']) ?>"><?= e($link['label']) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</footer>
<?php
    return (string) ob_get_clean();
}

/* -------------------------------------------------------------------------
 * Booking dialog and the mobile quick-contact bar
 * ---------------------------------------------------------------------- */

/**
 * Posts to /enquire.php exactly like every other form on the site. The
 * consent box is deliberately NOT pre-ticked: under the DPDP Act consent has
 * to be a clear affirmative act, and enquire.php refuses a submission
 * without it.
 */
function hp_booking_dialog(string $source = 'homepage'): string
{
    $today = (new DateTimeImmutable('now', new DateTimeZone('Asia/Kolkata')))->format('Y-m-d');

    ob_start(); ?>
<dialog class="hp-dialog" id="hp-book" aria-labelledby="hp-book-title" aria-describedby="hp-book-desc">
  <form method="dialog" class="hp-dialog__x"><button type="submit" class="hp-icon-btn" aria-label="Close"><?= hp_icon('close', 20) ?></button></form>
  <div class="hp-dialog__body">
    <p class="hp-eyebrow">Book a consultation</p>
    <h2 class="hp-h3 hp-dialog__title" id="hp-book-title">Request a call back</h2>
    <p class="hp-dialog__desc" id="hp-book-desc">Leave your details and the clinic will call you to confirm a consultation time.</p>

    <form class="hp-form" action="/enquire.php" method="post">
      <input type="hidden" name="source" value="<?= e($source) ?>">
      <p class="hp-sr" aria-hidden="true"><label>Leave this field empty <input type="text" name="website" tabindex="-1" autocomplete="off"></label></p>

      <div class="hp-form__row">
        <div class="hp-field">
          <label for="hp-f-name">Full name</label>
          <input id="hp-f-name" name="name" type="text" autocomplete="name" maxlength="120" required>
        </div>
        <div class="hp-field">
          <label for="hp-f-phone">Phone</label>
          <input id="hp-f-phone" name="phone" type="tel" inputmode="tel" autocomplete="tel" pattern="[\s\(\)+\-]*(?:[0-9][\s\(\)+\-]*){10,15}" title="A phone number with 10 to 15 digits" required>
        </div>
      </div>

      <div class="hp-form__row">
        <div class="hp-field">
          <label for="hp-f-treatment">Treatment of interest</label>
          <select id="hp-f-treatment" name="treatment">
            <?php foreach (HOME_TREATMENT_OPTIONS as $option): ?>
              <option<?= $option === 'Not sure — please advise' ? ' selected' : '' ?>><?= e($option) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <?php $fixedClinic = hp_page_clinic(); ?>
        <?php if ($fixedClinic !== null): ?>
        <input type="hidden" name="clinic" value="<?= e($fixedClinic) ?>">
        <?php else: ?>
        <div class="hp-field">
          <label for="hp-f-clinic">Preferred clinic</label>
          <select id="hp-f-clinic" name="clinic">
            <option>Gurugram (Sector 39)</option>
            <option>Delhi (Rohini)</option>
            <option selected>Either clinic</option>
          </select>
        </div>
        <?php endif; ?>
      </div>

      <div class="hp-field">
        <label for="hp-f-date">Preferred date <span class="hp-field__opt">(optional)</span></label>
        <input id="hp-f-date" name="preferred_date" type="date" min="<?= e($today) ?>">
      </div>

      <div class="hp-field">
        <label for="hp-f-message">Anything you would like the doctor to know <span class="hp-field__opt">(optional)</span></label>
        <textarea id="hp-f-message" name="message" rows="2" maxlength="2000"></textarea>
      </div>

      <div class="hp-consent">
        <input id="hp-f-consent" name="dpdp_consent" type="checkbox" value="1" required>
        <label for="hp-f-consent">I agree that <?= e(SITE_NAME) ?> may use these details to contact me about this enquiry, as described in the <a href="/privacy-policy" target="_blank" rel="noopener">Privacy Policy</a>.</label>
      </div>

      <p class="hp-form__notice">We use your name, phone number, chosen treatment, preferred clinic and date, and message only to contact you about this enquiry, and record the date, time, page and your IP address with it. It reaches the clinic by email (Google) and WhatsApp (Meta), whose services may process it outside India, and is kept for 12 months. You can withdraw consent at any time.</p>

      <button class="hp-btn hp-btn--primary hp-btn--block" type="submit">Request a Call Back <?= hp_icon('arrow', 17, 2) ?></button>
      <p class="hp-form__fine">For adults 18+. Not for emergencies — call 112. A request is not a confirmed appointment.</p>
    </form>
  </div>
</dialog>
<?php
    return (string) ob_get_clean();
}

/**
 * Which clinic a page belongs to (client rule, 14 Oct 2026: a Rohini page
 * never mentions the Gurugram clinic and a Gurugram page never mentions
 * Rohini). 'rohini' — the Rohini clinic page and every Rohini treatment page;
 * 'gurgaon' — every treatment page whose URL ends in "gurgaon" (blog posts
 * excepted); 'both' — the homepage, contact, about, blog, tools and legal
 * pages, which present both clinics.
 */
function hp_page_location(): string
{
    $here = rtrim((string) ($GLOBALS['page']['url'] ?? ''), '/');
    // Any Rohini URL (service, cost guide…), registered or not.
    if ($here === '/delhi-clinic' || str_ends_with($here, '-in-rohini')) {
        return 'rohini';
    }
    foreach (ROHINI_SERVICES as $svc) {
        if ($svc['url'] === $here) {
            return 'rohini';
        }
    }
    if (!str_starts_with($here, '/blog/') && preg_match('#-gurgaon$#', $here)) {
        return 'gurgaon';
    }
    return 'both';
}

/** True on the Rohini clinic page and every Rohini treatment page. */
function hp_is_rohini_page(): bool
{
    return hp_page_location() === 'rohini';
}

/** The enquiry-form clinic value fixed by the page's location, or null. */
function hp_page_clinic(): ?string
{
    return match (hp_page_location()) {
        'rohini'  => 'Delhi (Rohini)',
        'gurgaon' => 'Gurugram (Sector 39)',
        default   => null,
    };
}

/** HOME_NAV adjusted for the page's location. */
function hp_nav_items(): array
{
    $loc = hp_page_location();
    if ($loc === 'both') {
        return HOME_NAV_COMMON;
    }
    $twin = [];
    foreach (ROHINI_SERVICES as $svc) {
        $twin[$svc['gurgaon']] = $svc['url'];
    }
    $twin['/hair-transplant-cost-in-gurgaon'] = '/hair-transplant-cost-in-rohini';
    $out = [];
    foreach (HOME_NAV as $item) {
        if ($item['label'] === 'Rohini Clinic') {
            if ($loc === 'rohini') {
                $out[] = $item;
            }
            continue;
        }
        if ($loc === 'rohini') {
            if (isset($item['url'])) {
                $item['url'] = $twin[$item['url']] ?? $item['url'];
            }
            if (isset($item['children'])) {
                $kids = [];
                foreach ($item['children'] as $child) {
                    if (isset($twin[$child['url']])) {
                        $kids[] = ['label' => $child['label'], 'url' => $twin[$child['url']]];
                    } elseif (!str_contains($child['url'], 'gurgaon')) {
                        // General pages (Guides) serve both clinics.
                        $kids[] = $child;
                    }
                }
                $item['children'] = $kids;
            }
        }
        $out[] = $item;
    }
    return $out;
}

/** On Rohini pages the quick-contact bar calls and messages the Rohini clinic. */
function hp_mobile_bar(): string
{
    $rohini = hp_is_rohini_page();
    $tel    = $rohini ? LOC_DELHI_PHONE_E164 : PHONE_E164;
    $wa     = $rohini ? LOC_DELHI_WHATSAPP_URL : WHATSAPP_URL;
    $clinic = $rohini ? ' data-clinic="Delhi (Rohini)"' : '';

    return '<div class="hp-mbar" role="region" aria-label="Quick contact">'
         . '<a href="tel:' . e($tel) . '" data-track="call">' . hp_icon('phone', 18) . '<span>Call</span></a>'
         . '<a href="' . e($wa) . '" rel="noopener" data-track="whatsapp">' . hp_icon('whatsapp', 18) . '<span>WhatsApp</span></a>'
         . '<a class="hp-mbar__book" href="/book-consultation" data-book' . $clinic . ' data-track="book">' . hp_icon('calendar', 18) . '<span>Book</span></a>'
         . '</div>';
}

/* -------------------------------------------------------------------------
 * Landing-page sections (14 Oct 2026)
 *
 * Reusable visual sections for the treatment and clinic pages, so they read
 * like the homepage instead of long runs of text. Every image is one of the
 * AI-generated illustrations in HOME_IMAGES (assets/img/home and
 * assets/img/services): no people, no doctors, no premises, no outcomes. Each
 * carries its own visible "AI-generated" mark (NMC Guidelines 06.10.2026,
 * cl. 7.2), and its alt text says the same for screen readers.
 * ---------------------------------------------------------------------- */

/** <img> + visible AI chip for an lp_* section. $alt describes what is shown. */
function lp_figure(string $img, string $alt, string $sizes, string $class = ''): string
{
    $ratio = str_starts_with($img, 'svc-') ? 'lp-fig--portrait' : (str_starts_with($img, 'intro-') ? 'lp-fig--tall' : 'lp-fig--wide');
    return '<figure class="lp-fig ' . $ratio . ($class !== '' ? ' ' . e($class) : '') . '">'
         . hp_img($img, 'AI-generated illustration: ' . $alt, $sizes)
         . hp_ai_chip('AI-generated illustration')
         . '</figure>';
}

/**
 * Image beside text. $o keys: img, alt, eyebrow, title, id (optional h2 id),
 * html (trusted HTML — escape it yourself), points (list of plain strings),
 * link (['url' => …, 'label' => …]), reverse (image on the right), tone
 * ('white' | 'canvas').
 */
function lp_split(array $o): string
{
    $tone = ($o['tone'] ?? 'white') === 'canvas' ? 'section--canvas' : 'section--white';
    ob_start(); ?>
<section class="section <?= $tone ?> lp-split<?= !empty($o['reverse']) ? ' lp-split--reverse' : '' ?>">
  <div class="wrap lp-split__grid">
    <?= lp_figure($o['img'], $o['alt'], '(min-width: 1080px) 480px, (min-width: 700px) 60vw, 100vw', 'lp-split__media') ?>
    <div class="lp-split__body">
      <?php if (!empty($o['eyebrow'])): ?><p class="eyebrow"><?= e($o['eyebrow']) ?></p><?php endif; ?>
      <h2 class="h2 mt-2"<?= !empty($o['id']) ? ' id="' . e($o['id']) . '"' : '' ?>><?= e($o['title']) ?></h2>
      <?php if (!empty($o['html'])): ?><div class="lp-split__text mt-3"><?= $o['html'] ?></div><?php endif; ?>
      <?php if (!empty($o['points'])): ?>
        <ul class="ticks mt-4">
          <?php foreach ($o['points'] as $pt): ?>
            <li class="tick"><?= icon('check', 18, 'currentColor', 2.2) ?><span><?= e($pt) ?></span></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
      <?php if (!empty($o['link'])): ?>
        <p class="mt-4"><a class="hp-link" href="<?= e($o['link']['url']) ?>"><?= e($o['link']['label']) ?> <?= hp_icon('arrow', 15, 2) ?></a></p>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/**
 * Illustrated steps, like the homepage process. $o keys: eyebrow, title, id,
 * intro, tone, steps — 2 to 4 of ['img', 'alt', 'title', 'text']. With no
 * steps given, the four generic visit steps are used.
 */
function lp_steps(array $o): string
{
    $steps = $o['steps'] ?? [
        ['img' => 'step-consultation', 'alt' => 'a dermatoscope and notepad on a desk',               'title' => 'Consultation and examination', 'text' => 'Your history is taken and your scalp or skin is examined before anything is suggested.'],
        ['img' => 'step-plan',         'alt' => 'a tablet showing a head diagram with a planned line', 'title' => 'A written plan',               'text' => 'If treatment is suitable, the plan and an itemised estimate are given to you in writing.'],
        ['img' => 'step-procedure',    'alt' => 'sterile instruments laid out on a tray',              'title' => 'Treatment',                    'text' => 'Carried out at the clinic by registered medical practitioners, on a date you choose.'],
        ['img' => 'step-followup',     'alt' => 'a desk calendar with review dates circled',           'title' => 'Follow-up',                    'text' => 'Written aftercare and scheduled reviews, with progress judged against your baseline.'],
    ];
    $tone = ($o['tone'] ?? 'canvas') === 'white' ? 'section--white' : 'section--canvas';
    ob_start(); ?>
<section class="section <?= $tone ?> lp-steps">
  <div class="wrap">
    <div class="hp-head hp-head--center">
      <?php if (!empty($o['eyebrow'])): ?><p class="eyebrow"><?= e($o['eyebrow']) ?></p><?php endif; ?>
      <h2 class="h2 mt-2"<?= !empty($o['id']) ? ' id="' . e($o['id']) . '"' : '' ?>><?= e($o['title'] ?? 'What Happens, Step by Step') ?></h2>
      <?php if (!empty($o['intro'])): ?><p class="body mt-3"><?= e($o['intro']) ?></p><?php endif; ?>
    </div>
    <ol class="lp-steps__list lp-steps__list--<?= count($steps) ?>" role="list">
      <?php foreach ($steps as $i => $s): ?>
        <li class="lp-step">
          <?= lp_figure($s['img'], $s['alt'], '(min-width: 1080px) ' . (count($steps) >= 4 ? '280px' : '380px') . ', (min-width: 640px) 45vw, 100vw') ?>
          <p class="lp-step__num">Step <?= sprintf('%02d', $i + 1) ?></p>
          <h3 class="h4"><?= e($s['title']) ?></h3>
          <p class="body-s mt-1"><?= e($s['text']) ?></p>
        </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/**
 * Icon highlight cards (the homepage "How we work" row). $o keys: eyebrow,
 * title, intro, tone, items — 3 or 4 of ['icon' (hp_icon name), 'title', 'text'].
 * Icons: stethoscope, follicle, doc, clipboard, user-md, layers, eye, people,
 * cap, pin, clock, calendar, cal-check, shield, info, check.
 */
function lp_highlights(array $o): string
{
    $tone = ($o['tone'] ?? 'white') === 'canvas' ? 'section--canvas' : 'section--white';
    ob_start(); ?>
<section class="section <?= $tone ?> lp-highlights">
  <div class="wrap">
    <div class="hp-head hp-head--center">
      <?php if (!empty($o['eyebrow'])): ?><p class="eyebrow"><?= e($o['eyebrow']) ?></p><?php endif; ?>
      <h2 class="h2 mt-2"><?= e($o['title']) ?></h2>
      <?php if (!empty($o['intro'])): ?><p class="body mt-3"><?= e($o['intro']) ?></p><?php endif; ?>
    </div>
    <ul class="lp-highlights__list lp-highlights__list--<?= count($o['items']) ?>" role="list">
      <?php foreach ($o['items'] as $it): ?>
        <li class="lp-highlight">
          <span class="lp-highlight__icon"><?= hp_icon($it['icon'], 28, 1.5) ?></span>
          <h3 class="h4 mt-3"><?= e($it['title']) ?></h3>
          <p class="body-s mt-1"><?= e($it['text']) ?></p>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}

/**
 * Closing call to action with an image (the homepage's last section). $o
 * keys: eyebrow, title, text, treatment (booking option), img (default
 * 'ambient'), alt. Phone and booking follow the page's clinic.
 */
function lp_cta(array $o): string
{
    $loc    = hp_page_location();
    $tel    = $loc === 'rohini' ? LOC_DELHI_PHONE_E164 : PHONE_E164;
    $phone  = $loc === 'rohini' ? LOC_DELHI_PHONE_DISPLAY : PHONE_DISPLAY;
    $clinic = hp_page_clinic();
    $img    = $o['img'] ?? 'ambient';
    $alt    = $o['alt'] ?? 'sunlight and leaf shadows on an ivory wall with a potted plant';
    ob_start(); ?>
<section class="lp-cta">
  <div class="lp-cta__content">
    <p class="eyebrow"><?= e($o['eyebrow'] ?? 'Appointments') ?></p>
    <h2 class="h2 mt-2"><?= e($o['title']) ?></h2>
    <p class="body-l mt-3"><?= e($o['text']) ?></p>
    <div class="btn-row mt-5">
      <a class="btn btn--lg btn--ink" href="<?= e(book_url()) ?>" data-book<?= !empty($o['treatment']) ? ' data-treatment="' . e($o['treatment']) . '"' : '' ?><?= $clinic !== null ? ' data-clinic="' . e($clinic) . '"' : '' ?> data-track="book"><?= icon('calendar', 18) ?> Book a Consultation</a>
      <a class="btn btn--lg btn--outline" href="tel:<?= e($tel) ?>" data-track="call"><?= icon('phone', 17) ?> <?= e($phone) ?></a>
    </div>
  </div>
  <?= lp_figure($img, $alt, '(min-width: 1080px) 50vw, 100vw', 'lp-cta__media') ?>
</section>
<?php
    return (string) ob_get_clean();
}
