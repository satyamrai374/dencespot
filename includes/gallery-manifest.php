<?php
/**
 * Explicit media manifest — the single source of truth for what every image in
 * assets/img/gallery/ actually is.
 *
 * ⚠ WHY THIS FILE EXISTS. Both /gallery and /hair-transplant-results-gurgaon
 * previously built their image lists by scanning the directory and guessing the
 * category from the filename, defaulting anything unrecognised to "patient
 * before/after result". Audited on 1 Sep 2026, that default had swept up:
 *
 *   • 3 NABH certificate images, and
 *   • 12 marketing creatives belonging to GROWIG HAIR SOLUTION, an unrelated
 *     hair-patch brand in Dwarka,
 *
 * and published all 15 as consented DenceSpot patient results, each with an
 * ImageObject node in JSON-LD. On a YMYL medical page that is a
 * misrepresentation in structured data and a medical-advertising problem, not a
 * cosmetic bug.
 *
 * TWO RULES, NOT NEGOTIABLE:
 *   1. Never rebuild this list from a directory listing. A filename is not a
 *      consent record. A new file dropped into the folder must stay invisible
 *      until someone adds it here deliberately.
 *   2. Only CAT_RESULT earns ImageObject schema. Everything else is either
 *      chrome or withheld.
 *
 * Consent: the clinic confirmed on 1 Sep 2026 that written consent is on file
 * for the patient photographs in this folder.
 *
 * ⚠ Consent is not the only test. Several files the clinic consented to are
 * still withheld below because they are not what they would have been labelled
 * as — a facial PRP case, an intra-operative close-up, two duplicates of the
 * named cases, and single post-op frames with no before. Consent settles
 * whether an image MAY be published; it does not settle what it SHOWS.
 *
 * ⚠ Several published composites carry the patient full name and surgery date
 * burnt into the image, beside an unobscured face. That is the clinic to weigh,
 * not the template: raise it before the next deploy.
 */

declare(strict_types=1);

/** Consented patient before/after composite. Earns ImageObject. */
const CAT_RESULT = 'results';

/** Clinic premises, signage, equipment. Never a patient claim. */
const CAT_CLINIC = 'clinic';

/**
 * Present in the folder but NOT published anywhere. Kept listed so the reason
 * survives, and so nobody "helpfully" re-adds the file later.
 */
const CAT_WITHHELD = 'withheld';

/**
 * Every image in assets/img/gallery/, classified.
 *
 * The CAT_RESULT entries are DenceSpot's own branded before/after
 * composites: a single square image containing both panels, with the clinic
 * watermark, phone number and domain burnt in. They are rendered as ONE image,
 * never split and never rendered into a two-slot before/after card — halving
 * them would cut through the baked-in "BEFORE"/"AFTER" labels.
 *
 * Per-case technique, graft count and review interval are deliberately absent.
 * The clinic has not supplied them, and the templates omit an unknown field
 * rather than printing a placeholder into a patient-facing caption.
 */
const GALLERY_MANIFEST = [
    // ---- Consented patient before/after composites (20) ------------------
    '2020-07-26.jpg'                        => CAT_RESULT,
    '2020-07-30.jpg'                        => CAT_RESULT,
    '20200923_192453.jpg'                   => CAT_RESULT,
    '20210104_132737.jpg'                   => CAT_RESULT,
    '20210119_153851.jpg'                   => CAT_RESULT,
    '20210319_151957.jpg'                   => CAT_RESULT,
    '20210319_152128.jpg'                   => CAT_RESULT,
    '2023-05-10.jpg'                        => CAT_RESULT,
    '2023-05-17 (1).jpg'                    => CAT_RESULT,
    '2023-05-17 (2).jpg'                    => CAT_RESULT,
    '2023-05-17 (3).jpg'                    => CAT_RESULT,
    '2023-05-17 (4).jpg'                    => CAT_RESULT,
    '2023-05-17 (5).jpg'                    => CAT_RESULT,
    '2023-05-17 (7).jpg'                    => CAT_RESULT,
    '2023-05-17 (8).jpg'                    => CAT_RESULT,
    '2023-05-17 (9).jpg'                    => CAT_RESULT,
    '2023-05-17.jpg'                        => CAT_RESULT,
    'BeautyPlus_20200923215109898_org.jpg'  => CAT_RESULT,
    'BeautyPlus_20200923225104493_org.jpg'  => CAT_RESULT,

    // ---- Clinic premises (2) ---------------------------------------------
    // unnamed.jpg is the Sector 39 shopfront: DenceSpot signage, treatment
    // hoardings and the clinic phone numbers. Verified by opening the file.
    'unnamed.jpg'                           => CAT_CLINIC,


    // ---- Withheld: mislabelled or duplicate (2) --------------------------
    // Both were caught by an adversarial re-read of the published set, using
    // the same test that withheld the seven above.
    '2023-05-17 (6).jpg'                    => CAT_WITHHELD, // The panel the clinic labelled BEFORE is a bandaged, immediately post-operative scalp. Its "before" is an after.
    'unnamed (1).jpg'                       => CAT_WITHHELD, // The equipment trolley, not clinic premises — the same photograph as /assets/img/clinic-equipment.jpg, and the CAT_CLINIC alt describes premises.

    // ---- Withheld: not a hair transplant before/after (7) ----------------
    // Each of these was published as a consented hair-transplant result by the
    // filename heuristic. Opening the files showed otherwise:
    'IMG_20210227_171718_321.jpg'           => CAT_WITHHELD, // Facial PRP on a female patient — burnt-in text reads "Before / After face PRP … after 1 month". Not a hair transplant.
    '2025-03-16.jpg'                        => CAT_WITHHELD, // Intra-operative close-up of graft placement. A single frame, no before, no outcome.
    'IMG-20220115-WA0004.jpg'               => CAT_WITHHELD, // Single immediately-post-operative frame. Grafts just placed; nothing has grown.
    'IMG-20220506-WA0001.jpg'               => CAT_WITHHELD, // Single watermarked marketing portrait, not a before/after pair.
    '2020-07-26 (1).jpg'                    => CAT_WITHHELD, // Procedure-day composite: the panel shown as the outcome is immediate post-op.
    '20200107_183457.jpg'                   => CAT_WITHHELD, // Same photograph as /assets/img/case-shukri-europe.jpg, resized. Publishing both counts one patient twice.
    '20200109_130308.jpg'                   => CAT_WITHHELD, // Same photograph as /assets/img/case-uttam-gurgaon.jpg, resized. Same duplication.

    // ---- Withheld: clinic photos that contradict the site (2) ------------
    // ⚠ unnamed (1).webp is a DenceSpot signboard reading "HAIR TRANSPLANT
    // SURGEON / Aesthetic Clinic / Dr. Rahul", plus a second phone number
    // (+91 81301 18869) that appears nowhere in config.php. Every page of this
    // site states that Dr. Nyra assesses, plans and performs every case
    // personally. Withheld until the clinic reconciles the two — this is a
    // question about the site's central claim, not about the photograph.
    'unnamed (1).webp'                      => CAT_WITHHELD,
    'unnamed (2).jpg'                       => CAT_WITHHELD, // Near-duplicate of unnamed.jpg: same shopfront, near-identical angle.

    // ---- Withheld (3) ----------------------------------------------------
    // Portrait photographs of an individual at a desk. Not a clinic interior,
    // not a patient result, and no consent recorded. Also stored with a 90°
    // EXIF rotation, so they render sideways. Withheld until identified.
    'DSC_1752.JPG.jpeg'                     => CAT_WITHHELD,
    'DSC_1754.JPG.jpeg'                     => CAT_WITHHELD,
    'DSC_1754.JPG (1).jpeg'                 => CAT_WITHHELD,

    // ---- Withheld: unverified accreditation (3) --------------------------
    // NABH certificate images. All three carry the SAME certificate number
    // (646744646-2026-001) and the same validity window opening on the day
    // they were added; the "CEO and Chairman" signature reads as the name of
    // the person who built the site. Withheld pending genuine documentation.
    // See the note above awards_certificates_section() in components.php.
    'EXCELLENCE IN CLINICAL SERVICES – DERMATOLOGY & COSMETOLOGY (1).jpg' => CAT_WITHHELD,
    'Excellence in Clinical Services – Dermatology & Cosmetology.jpg'     => CAT_WITHHELD,
    'National Accreditation Board for Hospitals & Healthcare Providers (NABH).jpg' => CAT_WITHHELD,

    // ---- Withheld: another company's assets (12) -------------------------
    // Every one of these is a GROWIG HAIR SOLUTION marketing creative — a
    // non-surgical hair-patch brand in Dwarka. Wrong brand, wrong treatment,
    // and not DenceSpot's to publish. They appear to have been copied in from
    // an unrelated project. Withheld permanently; safe to delete outright.
    '08888338-7244-4f0c-ab24-ebb9c1e614c4.png'      => CAT_WITHHELD,
    '1cd4a93c-4968-4f5f-adc0-f9986dd6caaa.png'      => CAT_WITHHELD,
    '1d791e85-2050-4f1d-9fd3-289eb3780950.png'      => CAT_WITHHELD,
    '1d791e85-2050-4f1d-9fd3-289eb3780950 (1).png'  => CAT_WITHHELD,
    '4593d2bd-ac35-4ab1-bbf2-248a40a7b9f3.png'      => CAT_WITHHELD,
    '8d8aed91-62a4-4f2b-84c7-37845e9bfe02.png'      => CAT_WITHHELD,
    '8f20ee63-7d36-47e8-aedc-a3a54bbe58fe.png'      => CAT_WITHHELD,
    'b3b12e85-8d92-4b16-b1a9-50242d3e0d7a.png'      => CAT_WITHHELD,
    'b3b12e85-8d92-4b16-b1a9-50242d3e0d7a (1).png'  => CAT_WITHHELD,
    'ec85e241-b45a-484c-880c-508e27bbb239.png'      => CAT_WITHHELD,
    'f14e49a5-4469-44dd-a6f5-9216b1bfcbf2.png'      => CAT_WITHHELD,
    'img.png'                                       => CAT_WITHHELD,
];

/**
 * Images in one category, as web paths, in manifest order.
 *
 * A file listed here but missing from disk is skipped silently; a file on disk
 * but absent from the manifest is never returned. Both directions fail closed.
 *
 * 'alt' and real pixel dimensions are produced here so that every consumer —
 * /gallery, /hair-transplant-results-gurgaon and the homepage marquee — emits
 * the identical description and correct width/height for a given file. They
 * previously each wrote their own, which is how the same photograph ended up
 * described three different ways.
 *
 * @return list<array{file:string,url:string,alt:string,w:int,h:int}>
 */
function gallery_images(string $category): array
{
    $dir = dirname(__DIR__) . '/assets/img/gallery/';
    $out = [];
    $n   = 0;

    foreach (GALLERY_MANIFEST as $file => $cat) {
        if ($cat !== $category || !is_file($dir . $file)) {
            continue;
        }

        $n++;
        // Real dimensions, so width/height never contradict the file and the
        // browser can reserve the right box (no layout shift on load).
        $size = @getimagesize($dir . $file);

        $out[] = [
            'file' => $file,
            'url'  => '/assets/img/gallery/' . rawurlencode($file),
            'alt'  => $category === CAT_RESULT
                ? 'Before and after a hair transplant by Dr. Nyra at DenceSpot Clinic, Sector 39 Gurugram — case ' . $n
                : 'DenceSpot Clinic premises on Sector 39 Road, Jharsa, Gurugram — hair transplant and PRP treatment clinic',
            'w'    => $size ? (int) $size[0] : 1200,
            'h'    => $size ? (int) $size[1] : 1200,
        ];
    }

    return $out;
}

/**
 * Named cases shown on /hair-transplant-results-gurgaon.
 *
 * These two live outside the gallery folder because the clinic supplied their
 * metadata. Both are single composites, same as the gallery set.
 *
 * 'kind' distinguishes what the photograph actually shows, because the two are
 * not the same claim:
 *   'result'    — a grown-out result at a stated interval.
 *   'procedure' — the operating day. Hairline design and immediately
 *                 post-operative graft placement. NOT a result: the grafts
 *                 have not grown, and captioning it as an outcome would fail
 *                 the clinic's own "stated interval" test further down the page.
 */
const NAMED_CASES = [
    [
        'id'        => 'uttam-hairline',
        'kind'      => 'result',
        'procedure' => 'hair-transplant',
        'title'     => 'Uttam — Hairline & Temple Restoration',
        'technique' => 'FUE Hair Transplant',
        'grafts'    => '2,400 grafts',
        'interval'  => '12 months',
        'image'     => '/assets/img/case-uttam-gurgaon.jpg',
        'alt'       => 'Hairline and temple restoration, 2,400 FUE grafts, DenceSpot Gurugram: before and 12 months after',
    ],
    [
        'id'        => 'shukri-frontal',
        'kind'      => 'procedure',
        'procedure' => 'hair-transplant',
        'title'     => 'Shukri — Frontal Zone, Procedure Day',
        'technique' => 'Micro-FUE',
        'grafts'    => '2,800 grafts',
        'interval'  => null,
        'image'     => '/assets/img/case-shukri-europe.jpg',
        'alt'       => 'Micro-FUE at DenceSpot Clinic Gurugram: frontal hairline with 2,800 grafts on the day of surgery',
    ],
];
