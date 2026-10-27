<?php
/**
 * DenceSpot Clinic — site configuration.
 *
 * Single source of truth for NAP, contact details and navigation.
 * Change a value here and it updates on every page. Nothing below should
 * ever be retyped into a template.
 */

declare(strict_types=1);

/* -------------------------------------------------------------------------
 * Site
 * ---------------------------------------------------------------------- */

const SITE_NAME   = 'DenceSpot Clinic';
const SITE_TAGLINE= 'Hair Restoration Clinic in Gurgaon';
const SITE_ORIGIN = 'https://dencespot.com';

/**
 * Set to false the moment the site goes live. While true, pages emit
 * <meta name="robots" content="noindex"> so a staging deploy can never be
 * indexed by accident.
 */
const SITE_STAGING = false;

/* -------------------------------------------------------------------------
 * NAP — Name, Address, Phone
 *
 * ⚠ AWAITING SIGN-OFF. Four conflicting versions of this business are live
 * (see SEO-STRATEGY-dencespot.md §7.1). The values below follow the
 * strategy's recommended canonical, which reconciles the website with the
 * Google Business Profile listing. Confirm with the clinic, then deploy this
 * exact string byte-identically to GBP, Practo, Justdial, Bing Places,
 * Apple Maps and Facebook.
 *
 * Previously on the site: 'C Block, Sector 39' / 'Gurugram' / 122003
 * ---------------------------------------------------------------------- */

const NAP_STREET   = '1123, Sector 39 Road, Jharsa, C Block, Sector 39';
const NAP_LOCALITY = 'Gurugram';
const NAP_REGION   = 'Haryana';
const NAP_POSTCODE = '122003';
const NAP_COUNTRY  = 'IN';

/** Landmark used in directions copy, not part of the canonical NAP string. */
const NAP_LANDMARK = 'opposite Medanta – The Medicity';

/**
 * Client, 26 Oct 2026: both clinics work 7 days a week. The times stay
 * 10:00–20:00 until confirmed: the Google listing has said Mon–Sun
 * 09:00–21:00, and "open at time of search" is a top-5 local pack factor, so
 * the site and both Google Business Profiles must show the same hours.
 * schema_clinic() and schema_delhi_clinic() both read these.
 */
const HOURS_DAYS    = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
const HOURS_OPEN    = '10:00';
const HOURS_CLOSE   = '20:00';
const HOURS_DISPLAY = 'Mon–Sun · 10:00 – 20:00';
/**
 * Printed after HOURS_DISPLAY in brackets, after " · ", or on its own line,
 * so it has to read in all three. Must not contradict HOURS_DAYS.
 */
const HOURS_NOTE    = '7 days a week, Sunday included';

/**
 * Clinic pin, taken from the Google Business Profile place embed rendered on
 * this site (FTID 0x390ce5e4f6f45491:0x9dc43165216a74e6, CID below). An embed
 * centre is the place pin to within a few metres — not a survey, but far
 * better than omitting geo entirely.
 *
 * Cross-checked before publishing: 360 m from Medanta — The Medicity, which
 * matches NAP_LANDMARK, and 712 m from the Sector 39 centroid, which puts it
 * inside Sector 39. This refutes the magicpin listing's Sector 67A by ~9 km.
 * Worth reconfirming from the GBP dashboard next time someone has it open.
 */
const GEO_LAT = 28.4396807;
const GEO_LNG = 77.0438613;

/* -------------------------------------------------------------------------
 * Contact
 * ---------------------------------------------------------------------- */

const PHONE_E164    = '+918178330800';
const PHONE_DISPLAY = '+91 81783 30800';
/** E.164, byte-identical to every tel: href on the site. */
const PHONE_SCHEMA  = PHONE_E164;
const EMAIL         = 'dencespot@gmail.com';
const WHATSAPP_URL  = 'https://api.whatsapp.com/send/?phone=%2B918178330800&text=Hi%2C%20please%20share%20me%20more%20information%20about%20your%20services';
/**
 * Canonical listing, addressed by CID. The previous value was a text search,
 * which re-runs a query on every click and can resolve to one of the duplicate
 * directory records or to a competitor. A CID always lands on this listing.
 */
const GBP_CID  = '11368265669812057318';
const MAPS_URL = 'https://maps.google.com/?cid=' . GBP_CID;
const MAP_EMBED = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3508.3229126883884!2d77.0438613!3d28.439680699999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5e4f6f45491%3A0x9dc43165216a74e6!2sDencespot%20Clinic!5e0!3m2!1sen!2sus!4v1787587082143!5m2!1sen!2sus';

/* -------------------------------------------------------------------------
 * Location 2: Delhi (Rohini)
 *
 * Dedicated clinic location page (/delhi-clinic) for patients in North-West
 * Delhi, Rohini, Pitampura, Shalimar Bagh, Paschim Vihar and Delhi NCR.
 * ---------------------------------------------------------------------- */

const LOC_DELHI_NAME          = 'DenceSpot Clinic — Delhi (Rohini)';
const LOC_DELHI_ADDRESS       = 'Dencespot Clinic, Delhi (Rohini)';
const LOC_DELHI_LANDMARK      = 'North-West Delhi (Near Outer Ring Road / Rohini)';
const LOC_DELHI_PHONE_E164    = '+919540699152';
const LOC_DELHI_PHONE_DISPLAY = '+91 95406 99152';
const LOC_DELHI_WHATSAPP_URL  = 'https://api.whatsapp.com/send/?phone=%2B919540699152&text=Hi%2C%20please%20share%20me%20more%20information%20about%20your%20services';
const LOC_DELHI_MAP_EMBED     = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3499.2821792980394!2d77.10703699999999!3d28.7111119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d0181b16393d1%3A0x3f3d24fc9fc00d93!2sDencespot%20Clinic!5e0!3m2!1sen!2sin!4v1791815111651!5m2!1sen!2sin';
const LOC_DELHI_MAPS_URL      = 'https://maps.google.com/?cid=4556839352136011155';

/** Treatment groups, in display order, for the Rohini lists and hub. */
const ROHINI_GROUPS = [
    'transplant'   => 'Hair transplant',
    'non-surgical' => 'PRP and non-surgical hair treatment',
    'hair-fall'    => 'Hair fall and scalp',
    'face'         => 'Beard and eyebrow',
    'skin'         => 'Skin and laser',
];

const ROHINI_SERVICES = [
    // Hair transplant
    // The Delhi parent page (25 Oct 2026); 'anchor' overrides "<label> in Rohini".
    ['url' => '/hair-transplant-in-delhi',                'label' => 'Hair Transplant',            'group' => 'transplant',   'gurgaon' => '/hair-transplant-in-gurgaon',            'img' => 'hair-transplant', 'note' => 'FUE and DHI, planned around your donor area.', 'anchor' => 'Hair Transplant in Delhi'],
    ['url' => '/fue-hair-transplant-in-rohini',        'label' => 'FUE Hair Transplant',        'group' => 'transplant',   'gurgaon' => '/fue-hair-transplant-in-gurgaon',        'img' => 'hair-transplant', 'note' => 'Follicles extracted one by one from the donor area.'],
    ['url' => '/dhi-hair-transplant-in-rohini',        'label' => 'DHI Hair Transplant',        'group' => 'transplant',   'gurgaon' => '/dhi-hair-transplant-in-gurgaon',        'img' => 'hair-transplant', 'note' => 'Grafts placed with an implanter pen.'],
    ['url' => '/unshaven-hair-transplant-in-rohini',   'label' => 'Unshaven Hair Transplant',   'group' => 'transplant',   'gurgaon' => '/unshaven-hair-transplant-in-gurgaon',   'img' => 'unshaven',        'note' => 'Smaller sessions without shaving the whole head.'],
    ['url' => '/hairline-transplant-in-rohini',        'label' => 'Hairline Transplant',        'group' => 'transplant',   'gurgaon' => '/hairline-transplant-in-gurgaon',        'img' => 'hairline',        'note' => 'Receding temples and the frontal hairline.'],
    ['url' => '/crown-hair-transplant-in-rohini',      'label' => 'Crown Hair Transplant',      'group' => 'transplant',   'gurgaon' => '/crown-hair-transplant-in-gurgaon',      'img' => 'crown',           'note' => 'Thinning at the vertex, planned against donor supply.'],
    ['url' => '/hair-transplant-for-women-in-rohini',  'label' => 'Hair Transplant for Women',  'group' => 'transplant',   'gurgaon' => '/hair-transplant-for-women-in-gurgaon',  'img' => 'women',           'note' => 'Considered only after a medical workup.'],
    ['url' => '/hair-transplant-repair-in-rohini',     'label' => 'Hair Transplant Repair',     'group' => 'transplant',   'gurgaon' => '/hair-transplant-repair-in-gurgaon',     'img' => 'procedure',       'note' => 'Correcting an earlier procedure.'],
    // PRP and non-surgical
    ['url' => '/hair-prp-treatment-in-rohini',         'label' => 'Hair PRP & GFC',             'group' => 'non-surgical', 'gurgaon' => '/hair-prp-treatment-in-gurgaon',         'img' => 'prp',             'note' => 'For thinning where follicles are still present.'],
    ['url' => '/gfc-treatment-in-rohini',              'label' => 'GFC Treatment',              'group' => 'non-surgical', 'gurgaon' => '/gfc-treatment-in-gurgaon',              'img' => 'follicle',        'note' => 'Growth factor concentrate from your own blood.'],
    ['url' => '/hair-mesotherapy-in-rohini',           'label' => 'Hair Mesotherapy',           'group' => 'non-surgical', 'gurgaon' => '/hair-mesotherapy-in-gurgaon',           'img' => 'procedure',       'note' => 'Scalp injections, with their limited evidence explained.'],
    ['url' => '/hair-microneedling-in-rohini',         'label' => 'Hair Microneedling',         'group' => 'non-surgical', 'gurgaon' => '/hair-microneedling-in-gurgaon',         'img' => 'skin',            'note' => 'An add-on to treatment, not a treatment on its own.'],
    ['url' => '/hair-led-therapy-in-rohini',           'label' => 'Hair LED Therapy',           'group' => 'non-surgical', 'gurgaon' => '/hair-led-therapy-in-gurgaon',           'img' => 'followup',        'note' => 'Low-level light, with a small effect over months.'],
    // Hair fall and scalp
    ['url' => '/hair-fall-treatment-in-rohini',        'label' => 'Hair Fall Treatment',        'group' => 'hair-fall',    'gurgaon' => '/hair-fall-treatment-in-gurgaon',        'img' => 'hair-fall',       'note' => 'The cause is investigated before treatment.'],
    ['url' => '/womens-hair-loss-treatment-in-rohini', 'label' => "Women's Hair Loss Treatment", 'group' => 'hair-fall',   'gurgaon' => '/womens-hair-loss-treatment-in-gurgaon', 'img' => 'women',           'note' => 'Hormonal, thyroid and nutritional causes checked first.'],
    ['url' => '/alopecia-areata-treatment-in-rohini',  'label' => 'Alopecia Areata Treatment',  'group' => 'hair-fall',    'gurgaon' => '/alopecia-areata-treatment-in-gurgaon',  'img' => 'consultation',    'note' => 'Patchy hair loss, assessed and managed medically.'],
    ['url' => '/dandruff-treatment-in-rohini',         'label' => 'Dandruff Treatment',         'group' => 'hair-fall',    'gurgaon' => '/dandruff-treatment-in-gurgaon',         'img' => 'hair-fall',       'note' => 'Scalp flaking and itch, diagnosed before treating.'],
    // Beard and eyebrow
    ['url' => '/beard-transplant-in-rohini',           'label' => 'Beard Transplant',           'group' => 'face',         'gurgaon' => '/beard-transplant-gurgaon',              'img' => 'beard',           'note' => 'Patchy cheeks, jawline, moustache and scars.'],
    ['url' => '/eyebrow-transplant-in-rohini',         'label' => 'Eyebrow Transplant',         'group' => 'face',         'gurgaon' => '/eyebrow-transplant-in-gurgaon',         'img' => 'eyebrow',         'note' => 'Thin, over-plucked or scarred brows.'],
    // Skin and laser
    ['url' => '/laser-hair-removal-in-rohini',         'label' => 'Laser Hair Removal',         'group' => 'skin',         'gurgaon' => '/laser-hair-removal-in-gurgaon',         'img' => 'laser',           'note' => 'A course of sessions to reduce unwanted hair.'],
    ['url' => '/skin-treatment-in-rohini',             'label' => 'Skin Treatment',             'group' => 'skin',         'gurgaon' => '/skin-treatment-in-gurgaon',             'img' => 'skin',            'note' => 'Acne, pigmentation and other skin concerns.'],
    ['url' => '/face-prp-treatment-in-rohini',         'label' => 'Face PRP',                   'group' => 'skin',         'gurgaon' => '/face-prp-treatment-in-gurgaon',         'img' => 'prp',             'note' => 'PRP for the face, with its evidence limits stated.'],
];

/* -------------------------------------------------------------------------
 * WhatsApp Lead API (OpenWA Gateway)
 * ---------------------------------------------------------------------- */

const OPENWA_API_URL    = 'http://localhost:2785';
const OPENWA_API_KEY    = 'owa_k1_a09d98413834898f25da914fdf015b1888fa48288238633d8f2e65331f6e0a9c';
const OPENWA_SESSION_ID = '0f212d15-4f85-444b-b475-b38667680d04';
const OPENWA_NOTIFY_NUM = PHONE_E164;


/**
 * Clinic photography used as an entity image and as the default social
 * preview. og-default.jpg is a 1200x630 centre-crop of the same photograph —
 * Open Graph's expected ratio, and JPEG rather than WebP because WhatsApp and
 * several link unfurlers still handle WebP previews inconsistently.
 */
const CLINIC_IMAGE = '/assets/img/clinic-front.webp';
const OG_IMAGE     = '/assets/img/og-default.jpg';

/**
 * The clinic logo (Oct 2026 artwork). LOGO_WEB is the header/footer lockup at
 * 2x its largest display size; LOGO_SCHEMA is the PNG Google reads from the
 * MedicalClinic node. Favicons are cut from the DS mark alone, since the
 * wordmark is unreadable at tab size.
 */
const LOGO_WEB    = '/assets/img/logo/dencespot-logo.webp';
const LOGO_WEB_W  = 197;
const LOGO_WEB_H  = 152;
const LOGO_SCHEMA = '/assets/img/logo/dencespot-logo-400.png';
const LOGO_ALT    = 'DenceSpot Hair & Skin Care Clinic';

/**
 * Listings that are unambiguously this clinic, for schema sameAs. This is how
 * Google and the AI answer engines reconcile the conflicting directory records
 * documented in LOCAL-SEO-STRATEGY-dencespot.md §3.
 *
 * ⚠ Practo and Justdial are deliberately withheld until their records are
 * corrected — Practo lists Sector 38 and Justdial lists the business as
 * "D S Dencespot". Claiming a listing that contradicts the canonical NAP
 * corroborates the contradiction. Uncomment each one as it is fixed.
 */
const CLINIC_SAME_AS = [
    MAPS_URL,
    // 'https://www.practo.com/gurgaon/clinic/…',   ← after the Sector 38 fix
    // 'https://www.justdial.com/Gurgaon/…',        ← after the name fix
    // 'https://www.facebook.com/…',
];

/**
 * Directions. Each entry renders only when it is non-null, so an unanswered
 * one disappears from the page instead of publishing "to confirm" to patients.
 * Fill these in as the clinic supplies them — same pattern as GEO_LAT above.
 */
const DIRECTIONS = [
    'road'    => 'Sector 39 Road in Jharsa, ' . NAP_LANDMARK . '. The clinic is on the main road, so any driver or ride-hail app can be given the Medanta gate as the landmark.',
    'metro'   => null,   // ⚠ nearest station + walking time
    'parking' => null,   // ⚠ parking guidance
];

/** Areas the clinic draws patients from — used in schema areaServed. */
const AREA_SERVED = ['Gurugram', 'New Delhi', 'Delhi NCR'];

/* -------------------------------------------------------------------------
 * People
 * ---------------------------------------------------------------------- */

/**
 * CREDENTIAL — resolved with the clinic (Aug 2026): Dr. Nyra holds MBBS and
 * MD (Dermatology), and she both consults on and performs every case. That is
 * what is published sitewide.
 *
 * Still unevidenced and therefore still withheld: the fellowship, the ISHRS
 * membership, the "5,000+ procedures" figure and the "98% success rate" claim
 * that appear on the old live site. Do not reinstate any of them without
 * documentation — on a YMYL medical page those are the expensive kind of
 * mistake. "Board-certified" is dropped deliberately: India has no equivalent
 * board, so the verifiable substitute is the council registration number below.
 *
 * ⚠ STILL REQUIRED: reg_number, the MD institution and year, and same_as URLs.
 */
const DOCTORS = [
    'dr-nyra' => [
        'name'        => 'Dr. Nyra',
        'quals'       => 'MBBS, MD (Dermatology)',
        'role'        => 'Owner & Chief Consultant, DenceSpot Clinic',
        'alumni'      => 'Dr. D. Y. Patil Medical College',
        'abroad'      => '3 years of clinical work in Germany',
        'experience'  => '8 years',   // total, client 25 Oct 2026
        'url'         => '/dr-nyra',
        // The portraits supplied on 25 Oct 2026, sitewide since 27 Oct
        // (client: "use every dr new photo"). 'photo' is the hp_img() slug.
        'image'       => '/assets/img/home/doctor-nyra-720.webp',
        'photo'       => 'doctor-nyra',
        'specialty'   => 'Dermatology & Hair Restoration',
        'reg_number'  => null,   // ⚠ add medical registration number
        'reg_council' => null,   // ⚠ e.g. 'Haryana Medical Council'
        'reg_status'  => null,   // ⚠ e.g. 'Registered, active'
        // All three doctors consult at both clinics (client, 27 Oct 2026), and
        // each profile lists both.
        'clinics'     => 'Gurugram and Rohini, Delhi',
        // The city the profile page is aimed at (client, 27 Oct 2026): its
        // keyword, header phone and first-listed clinic. A city page's doctor
        // tile links only to that city's profiles (location rule).
        'city'        => 'rohini',
        'same_as'     => [],     // ⚠ add Practo / LinkedIn profile URLs
    ],
    // Client, 25 Oct 2026: Senior Resident at ESIC Hospital, 8+ years of
    // experience (shown as facts on the homepage tile). The degree is still
    // not on record, so quals stays null and the entry stays out of
    // listed_doctors().
    'dr-rahul' => [
        'name'        => 'Dr. Rahul',
        'quals'       => null,
        'role'        => null,
        'alumni'      => null,
        'position'    => 'Senior Resident, ESIC Hospital',
        'experience'  => '8+ years',
        'url'         => '/dr-rahul',
        'image'       => '/assets/img/home/doctor-rahul-720.webp',
        'photo'       => 'doctor-rahul',
        'specialty'   => null,
        'reg_number'  => null,
        'reg_council' => null,
        'reg_status'  => null,
        'clinics'     => 'Gurugram and Rohini, Delhi',
        'city'        => 'rohini',
        'same_as'     => [],
    ],
    // Third doctor, photographed for the homepage. Client, 25 Oct 2026: trained
    // at UMCH Hamburg, 1-year fellowship in hair restoration at D. Y. Patil,
    // 10 years of experience (homepage tile and /dr-akash). The degree is not
    // on record, so neither shows a qualification line and, with no quals, the
    // entry is skipped by every directory and schema list.
    'dr-akash' => [
        'name'        => 'Dr. Akash',
        'quals'       => null,   // ⚠ recognised medical qualification
        'role'        => null,
        'alumni'      => 'Universitätsmedizin Neumarkt a. M. Campus Hamburg (UMCH)',
        'fellowship'  => '1-year fellowship in hair restoration, D. Y. Patil',
        'experience'  => '10 years',
        'url'         => '/dr-akash',
        'image'       => '/assets/img/home/doctor-3-720.webp',
        'photo'       => 'doctor-3',
        'specialty'   => null,
        'reg_number'  => null,
        'reg_council' => null,
        'reg_status'  => null,
        'clinics'     => 'Gurugram and Rohini, Delhi',
        'city'        => 'gurgaon',
        'same_as'     => [],
    ],
];

/**
 * Doctors who may be named in the public directory: only those whose recognised qualification is on record.
 */
function listed_doctors(): array
{
    return array_filter(DOCTORS, static fn (array $d): bool => !empty($d['quals']));
}

/**
 * "Reg. No. …, Council · status" — only once a registration number has been entered.
 */
function doctor_registration(array $doc): string
{
    if (empty($doc['reg_number'])) {
        return '';
    }
    return 'Reg. No. ' . e((string) $doc['reg_number'])
         . (!empty($doc['reg_council']) ? ', ' . e((string) $doc['reg_council']) : '')
         . (!empty($doc['reg_status']) ? ' · ' . e((string) $doc['reg_status']) : '');
}

/** True when at least one of $docs has a registration number entered. */
function doctors_have_registration(array $docs): bool
{
    foreach ($docs as $doc) {
        if (!empty($doc['reg_number'])) {
            return true;
        }
    }
    return false;
}

const REVIEWED_BY   = 'Dr. Nyra';
const REVIEWED_DATE = 'August 2026';
/** Same date, ISO 8601, for schema lastReviewed. Keep the two in step. */
const REVIEWED_DATE_ISO = '2026-08-31';

/* -------------------------------------------------------------------------
 * Clinic figures
 *
 * The numbers a trust strip is built from. Each one is null until the clinic
 * supplies it with a record behind it, and a null figure renders no tile at
 * all — the same gate as $rates on /hair-transplant-cost-in-gurgaon and
 * $rating on /patient-reviews. Publish a number or publish nothing; never
 * publish a placeholder where a number belongs.
 *
 * ⚠ Do NOT reinstate the old live site's "5,000+ procedures" or "98% success
 * rate" from memory. Both were withheld for want of evidence (see DOCTORS
 * above). A procedure count and a success rate are the two claims on a clinic
 * page a regulator, a competitor or a patient is most likely to ask for proof
 * of, and the NMC code treats an unsubstantiated one as a misleading
 * advertisement.
 *
 * STAT_CASES_TREATED — total patient cases at DenceSpot, counted from the
 *                      clinic's own records.
 * STAT_YEARS_ACTIVE  — years Dr. Nyra has practised, Germany and Gurugram
 *                      combined. The three German years are already published
 *                      in doctor_block(); this is the total.
 * STAT_SURGERIES     — total surgical procedures at DenceSpot.
 * STAT_CLINIC_YEARS  — years the clinic has practised (shown with a "+").
 *                      Not a doctor's own years: those stay in DOCTORS.
 * STAT_FIGURES_AS_OF — when the figures were counted. A figure with no date
 *                      on it goes stale silently.
 *
 * Client, 26 Oct 2026: 11+ years, 9,520 surgeries, 8,569 patients ("happy
 * clients"), shown on /lp/. Keep the clinic's records behind them.
 * ---------------------------------------------------------------------- */

const STAT_CASES_TREATED = 8569;
const STAT_SURGERIES     = 9520;
const STAT_CLINIC_YEARS  = 11;
const STAT_YEARS_ACTIVE  = null;   // ⚠ integer, e.g. 9
const STAT_FIGURES_AS_OF = 'October 2026';

/**
 * Indicative all-in cost band for a hair transplant, in whole rupees, as the
 * clinic would actually quote it. Both ends must be set or neither renders:
 * a one-sided "from ₹X" is the "starting from" tactic this site tells patients
 * to distrust, and publishing it here would contradict the page it sits on.
 *
 * ⚠ NOT YET SUPPLIED. /hair-transplant-cost-in-gurgaon publishes no rupee
 * figure of its own — $rates there is null in every slot — so there is no
 * internal source to derive this from. It must come from the clinic.
 */
const COST_BAND_LOW  = null;   // ⚠ integer rupees, e.g. 55000
const COST_BAND_HIGH = null;   // ⚠ integer rupees, e.g. 180000

/**
 * Elfsight Google Reviews widget. Reads the live Google Business Profile, so
 * the rating and count on the page are whatever the listing says today rather
 * than a number typed in once and left to rot.
 *
 * Defined here because index.php had the id inline and the treatment pages
 * now need it too — one id, one place, per the note at the top of this file.
 */
const ELFSIGHT_REVIEWS_APP = 'd4976df7-93b9-45ec-899d-7d3934036fc5';

const REVIEW_SIGNED_OFF = [];

/* -------------------------------------------------------------------------
 * Navigation
 * ---------------------------------------------------------------------- */

const NAV_PRIMARY = [
    ['label' => 'About',           'url' => '/about-us'],
    ['label' => 'Treatments', 'url' => '#', 'children' => [
        ['label' => 'Hair Transplant', 'url' => '/hair-transplant-in-gurgaon'],
        ['label' => 'Beard Transplant','url' => '/beard-transplant-gurgaon'],
        ['label' => 'Hair PRP',        'url' => '/hair-prp-treatment-in-gurgaon'],
        ['label' => 'Hair Fall',       'url' => '/hair-fall-treatment-in-gurgaon'],
        ['label' => 'Results',         'url' => '/hair-transplant-results-gurgaon'],
    ]],
    ['label' => 'Rohini Clinic', 'url' => '/delhi-clinic', 'children' => [
        ['label' => 'Rohini Clinic (Delhi)',   'url' => '/delhi-clinic'],
        ['label' => 'Hair Transplant',         'url' => '/hair-transplant-in-delhi'],
        ['label' => 'Beard Transplant',        'url' => '/beard-transplant-in-rohini'],
        ['label' => 'Eyebrow Transplant',      'url' => '/eyebrow-transplant-in-rohini'],
        ['label' => 'Hair PRP & GFC',          'url' => '/hair-prp-treatment-in-rohini'],
        ['label' => 'Hair Fall Treatment',     'url' => '/hair-fall-treatment-in-rohini'],
        ['label' => "Women's Hair Loss",       'url' => '/womens-hair-loss-treatment-in-rohini'],
        ['label' => 'Laser Hair Removal',      'url' => '/laser-hair-removal-in-rohini'],
        ['label' => 'Skin Treatment',          'url' => '/skin-treatment-in-rohini'],
        ['label' => 'All Rohini Treatments',   'url' => '/delhi-clinic#treatments'],
    ]],
    ['label' => 'Gallery',         'url' => '/gallery'],
    ['label' => 'FAQs',            'url' => '/faqs'],
    ['label' => 'Blog',            'url' => '/blog/'],
    ['label' => 'Contact',         'url' => '/contact'],
];

const NAV_FOOTER = [
    'Clinic' => [
        ['label' => 'Home',            'url' => '/'],
        ['label' => 'About the clinic','url' => '/about-us'],
        ['label' => 'Dr. Nyra',        'url' => '/dr-nyra'],
        ['label' => 'Photo Gallery',   'url' => '/gallery'],
        ['label' => 'Results',         'url' => '/hair-transplant-results-gurgaon'],
        ['label' => 'Patient reviews', 'url' => '/patient-reviews'],
        ['label' => 'Gurugram Clinic', 'url' => '/contact'],
        ['label' => 'Delhi (Rohini) Clinic', 'url' => '/delhi-clinic'],
    ],
    'Gurugram Treatments' => [
        ['label' => 'Hair transplant in Gurgaon', 'url' => '/hair-transplant-in-gurgaon'],
        ['label' => 'FUE hair transplant',        'url' => '/fue-hair-transplant-in-gurgaon'],
        ['label' => 'DHI hair transplant',        'url' => '/dhi-hair-transplant-in-gurgaon'],
        ['label' => 'Beard transplant',           'url' => '/beard-transplant-gurgaon'],
        ['label' => 'Hair PRP treatment',         'url' => '/hair-prp-treatment-in-gurgaon'],
        ['label' => 'Hair fall treatment',        'url' => '/hair-fall-treatment-in-gurgaon'],
    ],
    'Rohini Treatments' => [
        ['label' => 'Hair transplant in Delhi',  'url' => '/hair-transplant-in-delhi'],
        ['label' => 'FUE hair transplant Rohini', 'url' => '/fue-hair-transplant-in-rohini'],
        ['label' => 'DHI hair transplant Rohini', 'url' => '/dhi-hair-transplant-in-rohini'],
        ['label' => 'Hair PRP in Rohini',         'url' => '/hair-prp-treatment-in-rohini'],
        ['label' => 'Skin treatment in Rohini',   'url' => '/skin-treatment-in-rohini'],
        ['label' => 'All Rohini Treatments',      'url' => '/delhi-clinic#treatments'],
    ],
    'Resources' => [
        ['label' => 'Hair transplant cost', 'url' => '/hair-transplant-cost-in-gurgaon'],
        ['label' => 'Cost, EMI & payment',  'url' => '/cost-and-emi-options'],
        ['label' => 'FAQs',                 'url' => '/faqs'],
        ['label' => 'Recovery & aftercare', 'url' => '/hair-transplant-aftercare'],
        ['label' => 'Blog',                 'url' => '/blog/'],
    ],
];

/* -------------------------------------------------------------------------
 * Shared copy
 * ---------------------------------------------------------------------- */

const MEDICAL_DISCLAIMER = 'The information on this page is general patient education and is not a substitute for a consultation. Results vary between patients; individual treatment plans differ, and suitability for any procedure is determined only after clinical assessment by a qualified doctor. No outcome, density or timeline can be promised.';

/**
 * Date shown as "Last updated" on the privacy policy, and stored with every
 * enquiry as the policy version the visitor saw (enquire.php). Lost in the
 * 22 Oct 2026 restore while enquire.php still needed it; move it whenever the
 * privacy policy changes.
 */
const LEGAL_UPDATED = '26 October 2026';

/* -------------------------------------------------------------------------
 * mbstring fallback
 *
 * The enquiry handler measures user input with mb_strlen()/mb_substr(). On a
 * host without the mbstring extension those calls are a fatal error, which
 * means every submitted lead dies with a 500 and is never stored. That is the
 * single most expensive failure this site can have, so it is polyfilled here
 * rather than left to hosting configuration.
 * ---------------------------------------------------------------------- */

if (!function_exists('mb_strlen')) {
    function mb_strlen(string $string, ?string $encoding = null): int
    {
        // Count UTF-8 characters, not bytes.
        return strlen(preg_replace('/[-¿]/', '', $string) ?? $string);
    }
}

if (!function_exists('mb_substr')) {
    function mb_substr(string $string, int $start, ?int $length = null, ?string $encoding = null): string
    {
        preg_match_all('/./us', $string, $m);
        $chars = $m[0] ?? [];
        $slice = $length === null
            ? array_slice($chars, $start)
            : array_slice($chars, $start, $length);
        return implode('', $slice);
    }
}

/* -------------------------------------------------------------------------
 * Helpers
 * ---------------------------------------------------------------------- */

/** Escape for HTML output. Every dynamic value in a template goes through this. */
function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Full canonical address on one line. */
function nap_address_line(): string
{
    return NAP_STREET . ', ' . NAP_LOCALITY . ', ' . NAP_REGION . ' ' . NAP_POSTCODE;
}

/** Absolute URL for a site-relative path. */
function abs_url(string $path): string
{
    return SITE_ORIGIN . '/' . ltrim($path, '/');
}

/** True when $url is the page currently being rendered. */
function is_current(string $url): bool
{
    $here = rtrim(strtok($_SERVER['REQUEST_URI'] ?? '/', '?'), '/');
    $there = rtrim($url, '/');
    return ($here === '' ? '/' : $here) === ($there === '' ? '/' : $there);
}

/*
 * Page titles have to fit Google's desktop result: at most 60 characters and
 * 561px wide in Arial 20px — the two "over" checks Screaming Frog runs on
 * every title. Templates that build titles from data (blog posts, Delhi area
 * pages) try the longer forms first and keep the first one that fits.
 */
const TITLE_MAX_CHARS = 60;
const TITLE_MAX_PX    = 561;

/** Arial advance widths at 20px, in whole pixels, grouped by width. */
const TITLE_CHAR_PX = [
     4 => '\'ijl’‘',
     5 => '|',
     6 => ' !,./:;I[\\]ft',
     7 => '"()-`r{}“”·',
     8 => '*',
     9 => '^',
    10 => 'Jcksvxyz',
    11 => '#$0123456789?L_abdeghnopqu–é',
    12 => '+<=>FTZ~',
    13 => '&ABEKPSVXY',
    14 => 'CDHNRUw',
    16 => 'GOQ',
    17 => 'Mm',
    18 => '%',
    19 => 'W',
    20 => '@—',
];

/** Width of $title in Google's title font. A character not in the table counts as 11px. */
function title_px(string $title): int
{
    static $px = null;
    if ($px === null) {
        $px = [];
        foreach (TITLE_CHAR_PX as $width => $chars) {
            foreach (preg_split('//u', $chars, -1, PREG_SPLIT_NO_EMPTY) as $ch) {
                $px[$ch] = $width;
            }
        }
    }
    $total = 0;
    foreach (preg_split('//u', $title, -1, PREG_SPLIT_NO_EMPTY) as $ch) {
        $total += $px[$ch] ?? 11;
    }
    return $total;
}

function title_fits(string $title): bool
{
    return mb_strlen($title) <= TITLE_MAX_CHARS && title_px($title) <= TITLE_MAX_PX;
}

/** The first of $candidates that fits; the last one when none does. */
function fit_title(string ...$candidates): string
{
    foreach ($candidates as $title) {
        if (title_fits($title)) {
            return $title;
        }
    }
    return $candidates[count($candidates) - 1];
}
