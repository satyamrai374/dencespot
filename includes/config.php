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
 * ⚠ AWAITING SIGN-OFF. The site says Mon–Sat 10:00–20:00; the Google listing
 * says Mon–Sun 09:00–21:00. "Open at time of search" is a top-5 local pack
 * factor, so a mismatch costs real visibility. Publishing the conservative
 * version until the clinic confirms.
 */
const HOURS_DAYS    = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
const HOURS_OPEN    = '10:00';
const HOURS_CLOSE   = '20:00';
const HOURS_DISPLAY = 'Mon–Sat · 10:00 – 20:00';
/**
 * ⚠ Must not contradict openingHoursSpecification, which lists Monday-Saturday
 * only. This previously read 'Sunday · by appointment only', which asserted
 * Sunday availability the markup denied. Reinstate the Sunday wording only when
 * Sunday is also added to HOURS_DAYS.
 */
const HOURS_NOTE    = 'Sunday · closed';

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

/**
 * Social profiles shown as footer links. A null entry renders nothing, so an
 * unconfirmed profile never becomes a dead icon.
 *
 * Instagram and the Facebook vanity page are the two profiles inventoried in
 * MAPS-ANALYSIS-dencespot.com.md §8. ⚠ Facebook has duplicate pages awaiting
 * consolidation (§9 C1): when one is retired, point this at the survivor.
 * These are footer links only — CLINIC_SAME_AS (schema) stays as it is.
 */
const SOCIAL_LINKS = [
    'Instagram' => 'https://www.instagram.com/dencespot/',
    'Facebook'  => 'https://www.facebook.com/DenceSpot/',
    'YouTube'   => null,   // ⚠ add the channel URL if the clinic has one
];

/* -------------------------------------------------------------------------
 * Clinic Locations (Gurugram & Delhi)
 * ---------------------------------------------------------------------- */

const LOC_GURGAON_NAME      = 'DenceSpot Clinic — Gurugram';
const LOC_GURGAON_STREET    = NAP_STREET;
const LOC_GURGAON_LOCALITY  = NAP_LOCALITY;
const LOC_GURGAON_REGION    = NAP_REGION;
const LOC_GURGAON_POSTCODE  = NAP_POSTCODE;
const LOC_GURGAON_LANDMARK  = NAP_LANDMARK;
const LOC_GURGAON_MAP_EMBED = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3508.3229126883884!2d77.0438613!3d28.439680699999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5e4f6f45491%3A0x9dc43165216a74e6!2sDencespot%20Clinic!5e0!3m2!1sen!2sus!4v1787587082143!5m2!1sen!2sus';
const LOC_GURGAON_MAPS_URL  = MAPS_URL;

const LOC_DELHI_NAME          = 'DenceSpot Clinic — Delhi (Rohini)';
const LOC_DELHI_ADDRESS       = 'Dencespot Clinic, Delhi (Rohini)';
const LOC_DELHI_LANDMARK      = 'North-West Delhi (Near Outer Ring Road / Rohini)';
const LOC_DELHI_PHONE_E164    = '+919540699152';
const LOC_DELHI_PHONE_DISPLAY = '+91 95406 99152';
const LOC_DELHI_WHATSAPP_URL  = 'https://api.whatsapp.com/send/?phone=%2B919540699152&text=Hi%2C%20please%20share%20me%20more%20information%20about%20your%20services';
const LOC_DELHI_MAP_EMBED     = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3499.2821792980394!2d77.10703699999999!3d28.7111119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d0181b16393d1%3A0x3f3d24fc9fc00d93!2sDencespot%20Clinic!5e0!3m2!1sen!2sin!4v1791815111651!5m2!1sen!2sin';
const LOC_DELHI_MAPS_URL      = 'https://maps.google.com/?cid=4556839352136011155';

/**
 * Treatments carried out at the Rohini (Delhi) clinic, each with its own page
 * (confirmed by the agency, 13 Oct 2026: all services are performed in
 * Rohini; extended to every treatment page on 14 Oct 2026 — FUT and scalp
 * micropigmentation excepted, as neither is confirmed at either clinic). 'gurgaon' is the matching Gurugram page, so the two can link to
 * each other; 'img' names assets/img/services/svc-<img>-{512,768}.webp, an
 * AI-generated illustration.
 */
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
    ['url' => '/hair-transplant-in-rohini',            'label' => 'Hair Transplant',            'group' => 'transplant',   'gurgaon' => '/hair-transplant-in-gurgaon',            'img' => 'hair-transplant', 'note' => 'FUE and DHI, planned around your donor area.'],
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
 * Entity image (schema MedicalClinic.image) and default social preview.
 *
 * ⚠ CHANGED Oct 2026. These pointed at clinic-front.webp / og-default.jpg — an
 * AI-generated render of a glass building signed "DENCESPOT CLINIC" that is not
 * the clinic's premises. Presenting it as the clinic, on every page's share
 * card and in schema, is what NMC cl. 7.2(a)-(b) and ASCI's synthetic-content
 * guidelines prohibit (non-existent facilities shown as real), so:
 *  - CLINIC_IMAGE is null and schema_clinic() omits `image` until a real,
 *    compliant photograph exists (the real shopfront photos show signage with
 *    "No Pain | No Scar" and "Permanent" claims, so they are not usable either);
 *  - OG_IMAGE is the homepage share card: an AI-generated illustration of hair
 *    follicles that carries its own "AI-generated illustration" mark.
 * JPEG rather than WebP because WhatsApp and several link unfurlers still
 * handle WebP previews inconsistently.
 */
const CLINIC_IMAGE = null;   // ⚠ e.g. '/assets/img/clinic-reception.jpg' — a real photograph
const OG_IMAGE     = '/assets/img/home/og-home.jpg';

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
    // Instagram: the clinic's own, unambiguous profile (also in SOCIAL_LINKS).
    // Facebook stays out until its duplicate pages are consolidated.
    'https://www.instagram.com/dencespot/',
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
// Gurugram clinic only. The Rohini clinic declares its own areaServed in
// schema_delhi_clinic(); naming Delhi here put "Delhi" into the JSON-LD of
// every Gurugram page (location rule, 14 Oct 2026).
const AREA_SERVED = ['Gurugram', 'National Capital Region'];

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
 *
 * REGISTRATION DISCLOSURE (Oct 2026). The NMC Guidelines on Ethical
 * Advertising and Public Communication (Public Notice R-13014/01/2024-Ethics,
 * 06.10.2026), Explanation IV, require a clinic's website to show each
 * doctor's name, qualifications, registration status and State/National
 * Medical Register number; IMC Regulations 2002 r.1.4.1 and the Telemedicine
 * Practice Guidelines 2020 require the number on the website too. The
 * homepage directory prints a visible placeholder until reg_number,
 * reg_council and reg_status are filled in — verify each on the council's
 * register before publishing.
 */
const DOCTORS = [
    'dr-nyra' => [
        'name'        => 'Dr. Nyra',
        'quals'       => 'MBBS, MD (Dermatology)',
        'role'        => 'Owner & Chief Consultant, DenceSpot Clinic',
        'alumni'      => 'Dr. D. Y. Patil Medical College',
        'url'         => '/dr-nyra',
        'image'       => '/assets/img/dr-nayra.webp',
        'specialty'   => 'Dermatology',
        'reg_number'  => null,   // ⚠ add medical registration number
        'reg_council' => null,   // ⚠ e.g. 'Haryana Medical Council' — the council that issued reg_number
        'reg_status'  => null,   // ⚠ e.g. 'Registered, active' — as shown on the council register
        'clinics'     => 'Gurugram',
        'same_as'     => [],     // ⚠ add Practo / LinkedIn profile URLs
    ],
    'dr-rahul' => [
        'name'        => 'Dr. Rahul',
        /*
         * ⚠ WITHHELD — Oct 2026. This read 'Hair Restoration Surgeon &
         * Aesthetic Specialist', which is a job description, not a recognised
         * medical qualification. IMC Regulations 2002 r.1.4.2 allow only
         * recognised degrees as a suffix and r.7.20 bars claiming to be a
         * specialist without a qualification in that branch. Enter his
         * recognised degree(s) exactly as registered, e.g. 'MBBS, MS (General
         * Surgery)'. 'role' and 'specialty' below need the same check before
         * /dr-rahul is next published.
         */
        'quals'       => null,
        'role'        => null,   // ⚠ his role at the clinic, once his qualification is confirmed
        'alumni'      => null,
        'url'         => '/dr-rahul',
        'image'       => '/assets/img/dr-rahul.webp',
        'specialty'   => null,   // ⚠ only a branch he holds a recognised qualification in (IMC r.7.20)
        'reg_number'  => null,   // ⚠ add medical registration number
        'reg_council' => null,   // ⚠ issuing council
        'reg_status'  => null,   // ⚠ as shown on the council register
        'clinics'     => null,   // ⚠ which clinic(s) he consults at
        'same_as'     => [],
    ],
];

const REVIEWED_BY   = 'Dr. Nyra';
const REVIEWED_DATE = 'August 2026';
/** Same date, ISO 8601, for schema lastReviewed. Keep the two in step. */
const REVIEWED_DATE_ISO = '2026-08-31';

/**
 * ⚠ Medical review sign-off, per page (October 2026).
 *
 * The August 2026 review covered text that the October 2026 redesign and SEO
 * rounds have since rewritten and extended. A page that is not listed here
 * therefore shows no "Medically reviewed by" badge or byline, and its
 * MedicalWebPage carries no reviewedBy / lastReviewed. Claiming a review the
 * current text has not had would itself be misleading (same rule as
 * HOME_MEDICALLY_REVIEWED in index.php and the unreviewed Rohini pages).
 *
 * When Dr. Nyra has read and approved a page, add its URL (e.g.
 * '/hair-transplant-in-gurgaon') and move REVIEWED_DATE / REVIEWED_DATE_ISO to
 * the sign-off date.
 */
const REVIEW_SIGNED_OFF = [];

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
 * STAT_FIGURES_AS_OF — when the two above were counted. A figure with no date
 *                      on it goes stale silently.
 * ---------------------------------------------------------------------- */

const STAT_CASES_TREATED = null;   // ⚠ integer, e.g. 1200
const STAT_YEARS_ACTIVE  = null;   // ⚠ integer, e.g. 9
const STAT_FIGURES_AS_OF = null;   // ⚠ e.g. 'September 2026'

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

/* -------------------------------------------------------------------------
 * Navigation
 * ---------------------------------------------------------------------- */

const NAV_PRIMARY = [
    ['label' => 'About',           'url' => '/about-us'],
    /* Oct 2026: "Gallery", "Results" and "Patient reviews" are gone from both
       menus — those pages were before/after and review collections, which the
       NMC Guidelines of 06.10.2026 prohibit (cl. 8.1(v), Explanation V). Their
       URLs now 301 to compliant pages (.htaccess §1c, router.php). */
    /*
     * Sep 2026: the technique and cost pages were two clicks deep and linked
     * only from their pillars. The ranking competitors carry their FUE, DHI
     * and cost pages in sitewide navigation; so does this dropdown now.
     */
    ['label' => 'Treatments', 'url' => '#', 'children' => [
        ['label' => 'Hair Transplant',      'url' => '/hair-transplant-in-gurgaon'],
        ['label' => 'FUE Hair Transplant',  'url' => '/fue-hair-transplant-in-gurgaon'],
        ['label' => 'DHI Hair Transplant',  'url' => '/dhi-hair-transplant-in-gurgaon'],
        ['label' => 'Hair Transplant Cost', 'url' => '/hair-transplant-cost-in-gurgaon'],
        ['label' => 'Beard Transplant',     'url' => '/beard-transplant-gurgaon'],
        ['label' => 'Hair PRP & GFC',       'url' => '/hair-prp-treatment-in-gurgaon'],
        ['label' => 'Hair Fall',            'url' => '/hair-fall-treatment-in-gurgaon'],
    ]],
    ['label' => 'FAQs',            'url' => '/faqs'],
    ['label' => 'Blog',            'url' => '/blog/'],
];

const NAV_FOOTER = [
    'Clinic' => [
        ['label' => 'Home',            'url' => '/'],
        ['label' => 'About the clinic','url' => '/about-us'],
        ['label' => 'Our doctors',     'url' => '/medical-disclaimer#doctors'],
        ['label' => 'Delhi Clinic',    'url' => '/delhi-clinic'],
        ['label' => 'Contact',         'url' => '/contact'],
    ],
    'Treatments' => [
        ['label' => 'Hair transplant in Gurgaon', 'url' => '/hair-transplant-in-gurgaon'],
        ['label' => 'FUE hair transplant',        'url' => '/fue-hair-transplant-in-gurgaon'],
        ['label' => 'DHI hair transplant',        'url' => '/dhi-hair-transplant-in-gurgaon'],
        ['label' => 'Beard transplant',           'url' => '/beard-transplant-gurgaon'],
        ['label' => 'Hair PRP treatment',         'url' => '/hair-prp-treatment-in-gurgaon'],
        ['label' => 'Hair fall treatment',        'url' => '/hair-fall-treatment-in-gurgaon'],
    ],
    'Resources' => [
        ['label' => 'Hair transplant cost', 'url' => '/hair-transplant-cost-in-gurgaon'],
        ['label' => 'PRP treatment cost',   'url' => '/prp-hair-treatment-cost-in-gurgaon'],
        ['label' => 'Beard transplant cost','url' => '/beard-transplant-cost-gurgaon'],
        ['label' => 'Graft calculator',     'url' => '/hair-transplant-graft-calculator'],
        ['label' => 'Cost, EMI & payment',  'url' => '/cost-and-emi-options'],
        ['label' => 'FAQs',                 'url' => '/faqs'],
        ['label' => 'Recovery & aftercare', 'url' => '/hair-transplant-aftercare'],
        ['label' => 'Blog',                 'url' => '/blog/'],
    ],
];

/* -------------------------------------------------------------------------
 * Compliance & Grievance Redressal (DPDP Act 2023 & NMC Guidelines)
 * ---------------------------------------------------------------------- */

const DPDP_OFFICER_TITLE   = 'Grievance Officer (privacy and personal data)';
/**
 * ⚠ REQUIRED — a real person's name. The SPDI Rules 2011 r.5(9), in force
 * now, require the Grievance Officer's NAME and contact details on the
 * website; a job title alone does not satisfy it. The DPDP Rules 2025 r.9
 * (from May 2027) require the same contact to be published prominently. While
 * null, the privacy policy shows a visible placeholder.
 */
const DPDP_OFFICER_NAME    = null;
const DPDP_OFFICER_EMAIL   = EMAIL;
const DPDP_OFFICER_PHONE   = PHONE_DISPLAY;
const DPDP_OFFICER_ADDRESS = NAP_STREET . ', ' . NAP_LOCALITY . ', ' . NAP_REGION . ' ' . NAP_POSTCODE;

/**
 * ⚠ REQUIRED — who legally runs the clinic(s): the exact registered name of
 * the proprietorship, partnership, LLP or company, and whether the Rohini
 * clinic is the same entity. The privacy policy and terms name it as the
 * party responsible for personal data and for the website. While null, both
 * pages show a visible placeholder.
 */
const LEGAL_ENTITY_NAME = null;   // ⚠ e.g. 'DenceSpot Clinic, a proprietorship of Dr. …'

/** Date shown as "Last updated" on the three legal pages. */
const LEGAL_UPDATED = '12 October 2026';

/**
 * When the DPDP Act's main duties (notice, consent, rights, Board complaints)
 * commence: eighteen months after the DPDP Rules, G.S.R. 846(E), gazetted
 * 13.11.2025. ⚠ MeitY proposed (Jan 2026) cutting this to twelve months,
 * which would make it about 13 November 2026 — not notified as of Oct 2026.
 * Re-check the eGazette before publishing and whenever the policy is reviewed.
 */
const DPDP_MAIN_DATE = '13 May 2027';

/* -------------------------------------------------------------------------
 * Shared copy — NMC & DPDP Compliant
 * ---------------------------------------------------------------------- */

/**
 * Footer disclaimer, sitewide. It deliberately does not claim that the site
 * follows the NMC Guidelines of 06.10.2026: only the homepage and the legal
 * pages have been reviewed against them so far, and a compliance claim the
 * other pages do not yet meet would itself be misleading. The instruments are
 * cited on /medical-disclaimer instead.
 */
const MEDICAL_DISCLAIMER = 'Information on this website is general patient education. It is not medical advice and does not create a doctor-patient relationship. Suitability, graft numbers and treatment plans are decided only after an in-person examination by a registered medical practitioner. Outcomes differ from person to person, and no particular outcome, density or timeline can be promised.';

/**
 * AI-generated imagery notice, sitewide; expanded on /medical-disclaimer.
 *
 * This supplements — it does not replace — the per-image mark. The NMC
 * Guidelines of 06.10.2026 (cl. 7.2) require every AI-generated image used in
 * promotional content to carry its own source mark stating it is AI, so each
 * one on the homepage is labelled where it appears.
 *
 * The wording is deliberately not absolute. It shows in the sitewide footer,
 * and pages not yet reviewed may still carry unlabelled AI images (the
 * CLINIC_IMAGE render of a building, possibly the doctor portraits), so it
 * must not claim that every AI image is labelled until every page has been
 * through the same review as the homepage.
 */
const AI_IMAGE_NOTICE = 'Some images on this website are AI-generated illustrations. They are used for illustration only and are not photographs of actual patients or treatment outcomes.';

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

/**
 * Doctors who may be named in the public directory (homepage band and
 * /medical-disclaimer#doctors): only those whose recognised qualification is
 * on record. NMC Explanation IV requires a named doctor's qualifications and
 * registration to be disclosed with the name, and IMC r.1.4.2 allows only
 * recognised degrees — so a doctor with 'quals' => null is left out rather
 * than listed with a job title in place of a degree. ⚠ Dr. Rahul reappears as
 * soon as his recognised degree is entered in DOCTORS.
 */
function listed_doctors(): array
{
    return array_filter(DOCTORS, static fn (array $d): bool => !empty($d['quals']));
}

/**
 * "Reg. No. …, Council · status" — only once a registration number has been
 * entered in DOCTORS. Client decision (14 Oct 2026): no registration
 * placeholders anywhere on the site, so an empty number prints nothing.
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
