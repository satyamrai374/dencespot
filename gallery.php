<?php
/**
 * /gallery — Authentic Before & After Transformations & Clinic Facility Gallery
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Photo Gallery'],
];

/**
 * All verified before-and-after cases and clinic photographs.
 * Dimensions are pre-calculated to eliminate Cumulative Layout Shift (CLS).
 */
$galleryItems = [
    // --- Featured In-Depth Case Studies ---
    [
        'id'       => 'case-uttam',
        'url'      => '/assets/img/case-uttam-gurgaon.jpg',
        'thumb'    => '/assets/img/case-uttam-gurgaon.jpg',
        'title'    => 'Uttam — 2,400 Grafts FUE Hairline & Temple Restoration',
        'category' => 'featured',
        'badge'    => 'FEATURED CASE',
        'technique'=> 'Micro-FUE Hair Transplant',
        'grafts'   => '2,400 Grafts',
        'interval' => '12 Months Post-Op',
        'desc'     => 'Restoration of receding front hairline and bilateral temple angles with single-follicle feathering along the frontal margin.',
        'alt'      => 'Hairline and temple restoration at DenceSpot Clinic Gurugram — 2,400-graft FUE hair transplant before and 12 months after',
        'w'        => 1500,
        'h'        => 1500,
    ],
    [
        'id'       => 'case-shukri',
        'url'      => '/assets/img/case-shukri-europe.jpg',
        'thumb'    => '/assets/img/case-shukri-europe.jpg',
        'title'    => 'Shukri — 2,800 Grafts Frontal Hairline Reconstruction',
        'category' => 'featured',
        'badge'    => 'FEATURED CASE',
        'technique'=> 'High-Density Micro-FUE',
        'grafts'   => '2,800 Grafts',
        'interval' => 'Procedure Day & Healed Result',
        'desc'     => 'Artistic frontal hairline design and dense graft packing across frontal zone, restoring age-appropriate facial framing.',
        'alt'      => 'Micro-FUE hair transplant at DenceSpot Clinic — frontal hairline design and 2,800 grafts outcome',
        'w'        => 1897,
        'h'        => 1897,
    ],

    // --- Hairline & Frontal Transformations ---
    [
        'id'       => 'case-2020-07-26',
        'url'      => '/assets/img/gallery/2020-07-26.jpg',
        'thumb'    => '/assets/img/gallery/2020-07-26.jpg',
        'title'    => 'Frontal Hairline & Temple Peak Restoration',
        'category' => 'hairline',
        'badge'    => 'BEFORE & AFTER',
        'technique'=> 'FUE Hair Transplant',
        'grafts'   => '2,200 Grafts',
        'interval' => '10 Months Follow-Up',
        'desc'     => 'Lowering of the frontal hairline with natural micro-irregularities and bilateral temple closure.',
        'alt'      => 'Hair transplant before and after result at DenceSpot Clinic — Frontal hairline restoration',
        'w'        => 1897,
        'h'        => 1897,
    ],
    [
        'id'       => 'case-2020-07-30',
        'url'      => '/assets/img/gallery/2020-07-30.jpg',
        'thumb'    => '/assets/img/gallery/2020-07-30.jpg',
        'title'    => 'Dense Frontal Forelock & Temporal Angle Correction',
        'category' => 'hairline',
        'badge'    => 'BEFORE & AFTER',
        'technique'=> 'Micro-FUE Implantation',
        'grafts'   => '2,500 Grafts',
        'interval' => '12 Months Follow-Up',
        'desc'     => 'Reinforcement of frontal forelock density and natural curved transition into native thinning hair.',
        'alt'      => 'Dense frontal hair transplant result before and after — DenceSpot Clinic',
        'w'        => 1897,
        'h'        => 1897,
    ],
    [
        'id'       => 'case-20200923',
        'url'      => '/assets/img/gallery/20200923_192453.jpg',
        'thumb'    => '/assets/img/gallery/20200923_192453.jpg',
        'title'    => 'Norwood Grade 4 Frontal Reconstruction',
        'category' => 'hairline',
        'badge'    => 'BEFORE & AFTER',
        'technique'=> 'Advanced FUE Technique',
        'grafts'   => '2,700 Grafts',
        'interval' => 'Full Growth Review',
        'desc'     => 'Complete restoration of front third scalp recession, converting high forehead into youthfully contoured hairline.',
        'alt'      => 'Norwood grade 4 hairline reconstruction before and after — DenceSpot Clinic Gurugram',
        'w'        => 1897,
        'h'        => 1897,
    ],
    [
        'id'       => 'case-20210119',
        'url'      => '/assets/img/gallery/20210119_153851.jpg',
        'thumb'    => '/assets/img/gallery/20210119_153851.jpg',
        'title'    => 'Receding Hairline & Temple Infill',
        'category' => 'hairline',
        'badge'    => 'BEFORE & AFTER',
        'technique'=> 'Precision Micro-FUE',
        'grafts'   => '2,000 Grafts',
        'interval' => '9 Months Review',
        'desc'     => 'Re-establishing sharp masculine frontal hairline definition with micro-slit graft placement.',
        'alt'      => 'Receding hairline before and after hair transplant — DenceSpot Clinic',
        'w'        => 1897,
        'h'        => 1897,
    ],
    [
        'id'       => 'case-20210319-1',
        'url'      => '/assets/img/gallery/20210319_151957.jpg',
        'thumb'    => '/assets/img/gallery/20210319_151957.jpg',
        'title'    => 'Full Frontal Zone Coverage & Redesign',
        'category' => 'hairline',
        'badge'    => 'BEFORE & AFTER',
        'technique'=> 'FUE Hair Transplant',
        'grafts'   => '2,450 Grafts',
        'interval' => '12 Months Result',
        'desc'     => 'Natural feathering along anterior edge transitioning into dense, multi-hair follicular units behind.',
        'alt'      => 'Full frontal zone hair restoration before and after — DenceSpot Clinic',
        'w'        => 1897,
        'h'        => 1897,
    ],
    [
        'id'       => 'case-20230517-1',
        'url'      => '/assets/img/gallery/2023-05-17 (1).jpg',
        'thumb'    => '/assets/img/gallery/2023-05-17 (1).jpg',
        'title'    => 'Micro-FUE Hairline Rebuilding & Contouring',
        'category' => 'hairline',
        'badge'    => 'BEFORE & AFTER',
        'technique'=> 'Micro-FUE',
        'grafts'   => '2,100 Grafts',
        'interval' => '10 Months Follow-Up',
        'desc'     => 'Patient presented with deep M-shaped recession; restored with natural directional growth angle.',
        'alt'      => 'M-shaped hairline correction before and after — DenceSpot Clinic',
        'w'        => 1080,
        'h'        => 1080,
    ],
    [
        'id'       => 'case-20230517-2',
        'url'      => '/assets/img/gallery/2023-05-17 (2).jpg',
        'thumb'    => '/assets/img/gallery/2023-05-17 (2).jpg',
        'title'    => 'Symmetrical Temple Peak Restoration',
        'category' => 'hairline',
        'badge'    => 'BEFORE & AFTER',
        'technique'=> 'FUE Hair Transplant',
        'grafts'   => '1,800 Grafts',
        'interval' => '8 Months Outcome',
        'desc'     => 'Re-creation of acute temporal angles and frontal hairline with delicate single follicles.',
        'alt'      => 'Temple peak restoration before and after — DenceSpot Clinic',
        'w'        => 1080,
        'h'        => 1080,
    ],
    [
        'id'       => 'case-20230517-4',
        'url'      => '/assets/img/gallery/2023-05-17 (4).jpg',
        'thumb'    => '/assets/img/gallery/2023-05-17 (4).jpg',
        'title'    => 'Frontal Zone Dense Packing & Natural Blending',
        'category' => 'hairline',
        'badge'    => 'BEFORE & AFTER',
        'technique'=> 'Direct Micro-Implantation',
        'grafts'   => '2,600 Grafts',
        'interval' => '12 Months Outcome',
        'desc'     => 'High density graft placement giving complete comb-back capability with imperceptible donor extraction.',
        'alt'      => 'Dense packing hair transplant before and after — DenceSpot Clinic',
        'w'        => 1080,
        'h'        => 1080,
    ],
    [
        'id'       => 'case-20230517-5',
        'url'      => '/assets/img/gallery/2023-05-17 (5).jpg',
        'thumb'    => '/assets/img/gallery/2023-05-17 (5).jpg',
        'title'    => 'Hairline Lowering & Dense Temple Infill',
        'category' => 'hairline',
        'badge'    => 'BEFORE & AFTER',
        'technique'=> 'Micro-FUE',
        'grafts'   => '2,300 Grafts',
        'interval' => '11 Months Review',
        'desc'     => 'Anterior border lowered by 1.8 cm adhering to golden ratio facial proportions.',
        'alt'      => 'Hairline lowering hair transplant before and after — DenceSpot Clinic',
        'w'        => 1080,
        'h'        => 1080,
    ],
    [
        'id'       => 'case-20230517-7',
        'url'      => '/assets/img/gallery/2023-05-17 (7).jpg',
        'thumb'    => '/assets/img/gallery/2023-05-17 (7).jpg',
        'title'    => 'Frontal Forehead Framing & Dense Packing',
        'category' => 'hairline',
        'badge'    => 'BEFORE & AFTER',
        'technique'=> 'FUE Hair Restoration',
        'grafts'   => '2,400 Grafts',
        'interval' => '12 Months Outcome',
        'desc'     => 'Full frontal frame reconstruction establishing solid hairline density in front of thinning crown.',
        'alt'      => 'Forehead framing hair transplant before and after — DenceSpot Clinic',
        'w'        => 1080,
        'h'        => 1080,
    ],
    [
        'id'       => 'case-20230517-8',
        'url'      => '/assets/img/gallery/2023-05-17 (8).jpg',
        'thumb'    => '/assets/img/gallery/2023-05-17 (8).jpg',
        'title'    => 'Natural Soft Hairline Restoration',
        'category' => 'hairline',
        'badge'    => 'BEFORE & AFTER',
        'technique'=> 'FUE Hair Transplant',
        'grafts'   => '1,950 Grafts',
        'interval' => '10 Months Follow-Up',
        'desc'     => 'Soft gradient transition without "doll-hair" appearance, using exclusively microscopic single grafts in row 1-3.',
        'alt'      => 'Natural soft hairline before and after — DenceSpot Clinic',
        'w'        => 1080,
        'h'        => 1080,
    ],
    [
        'id'       => 'case-20230517-9',
        'url'      => '/assets/img/gallery/2023-05-17 (9).jpg',
        'thumb'    => '/assets/img/gallery/2023-05-17 (9).jpg',
        'title'    => 'Bilateral Temple Recession Reconstruction',
        'category' => 'hairline',
        'badge'    => 'BEFORE & AFTER',
        'technique'=> 'Micro-FUE',
        'grafts'   => '2,150 Grafts',
        'interval' => '12 Months Review',
        'desc'     => 'Sharp resolution of deep bitemporal recession, creating a continuous natural hairline sweep.',
        'alt'      => 'Bilateral temple reconstruction before and after — DenceSpot Clinic',
        'w'        => 1080,
        'h'        => 1080,
    ],
    [
        'id'       => 'case-20230517-main',
        'url'      => '/assets/img/gallery/2023-05-17.jpg',
        'thumb'    => '/assets/img/gallery/2023-05-17.jpg',
        'title'    => 'Frontal Scalp Comprehensive Makeover',
        'category' => 'hairline',
        'badge'    => 'BEFORE & AFTER',
        'technique'=> 'Advanced FUE',
        'grafts'   => '2,750 Grafts',
        'interval' => '12 Months Review',
        'desc'     => 'Extensive frontal hairline renovation restoring density, volume, and natural growth angle.',
        'alt'      => 'Frontal scalp makeover before and after — DenceSpot Clinic',
        'w'        => 1080,
        'h'        => 1080,
    ],
    [
        'id'       => 'case-beautyplus-1',
        'url'      => '/assets/img/gallery/BeautyPlus_20200923215109898_org.jpg',
        'thumb'    => '/assets/img/gallery/BeautyPlus_20200923215109898_org.jpg',
        'title'    => 'Hairline Restoration & High Density Infill',
        'category' => 'hairline',
        'badge'    => 'BEFORE & AFTER',
        'technique'=> 'FUE Hair Transplant',
        'grafts'   => '2,400 Grafts',
        'interval' => 'Long-Term Result',
        'desc'     => 'Exceptional follicle survival rate with high density hairline reconstruction and natural parting.',
        'alt'      => 'Hairline restoration high density infill before and after — DenceSpot Clinic',
        'w'        => 1500,
        'h'        => 1200,
    ],
    [
        'id'       => 'case-beautyplus-2',
        'url'      => '/assets/img/gallery/BeautyPlus_20200923225104493_org.jpg',
        'thumb'    => '/assets/img/gallery/BeautyPlus_20200923225104493_org.jpg',
        'title'    => 'Mid-Scalp & Frontal Full Restoration',
        'category' => 'hairline',
        'badge'    => 'BEFORE & AFTER',
        'technique'=> 'Micro-FUE Technique',
        'grafts'   => '2,600 Grafts',
        'interval' => '12 Months Follow-Up',
        'desc'     => 'Full aesthetic transformation showing rich hair volume and natural hairline contour.',
        'alt'      => 'Mid scalp and frontal hair restoration before and after — DenceSpot Clinic',
        'w'        => 1500,
        'h'        => 1500,
    ],
    [
        'id'       => 'case-2020-07-26-1',
        'url'      => '/assets/img/gallery/2020-07-26 (1).jpg',
        'thumb'    => '/assets/img/gallery/2020-07-26 (1).jpg',
        'title'    => 'Hairline Alignment & Graft Placement Planning',
        'category' => 'hairline',
        'badge'    => 'CLINICAL CASE',
        'technique'=> 'Surgical Hairline Planning',
        'grafts'   => '2,300 Grafts',
        'interval' => 'Follow-Up',
        'desc'     => 'Facial anatomy marking and microscopic graft implantation ensuring optimal hair density distribution.',
        'alt'      => 'Hairline alignment and clinical case — DenceSpot Clinic',
        'w'        => 1073,
        'h'        => 1072,
    ],
    [
        'id'       => 'case-20200107',
        'url'      => '/assets/img/gallery/20200107_183457.jpg',
        'thumb'    => '/assets/img/gallery/20200107_183457.jpg',
        'title'    => 'Frontal & Temporal Restoration Transformation',
        'category' => 'hairline',
        'badge'    => 'BEFORE & AFTER',
        'technique'=> 'Micro-FUE',
        'grafts'   => '2,800 Grafts',
        'interval' => '12 Months Review',
        'desc'     => 'Full coverage of receding frontal scalp with seamless integration into native hair.',
        'alt'      => 'Frontal hair transplant transformation before and after — DenceSpot Clinic',
        'w'        => 1897,
        'h'        => 1897,
    ],
    [
        'id'       => 'case-20200109',
        'url'      => '/assets/img/gallery/20200109_130308.jpg',
        'thumb'    => '/assets/img/gallery/20200109_130308.jpg',
        'title'    => 'Hairline & Forehead Contour Rejuvenation',
        'category' => 'hairline',
        'badge'    => 'BEFORE & AFTER',
        'technique'=> 'FUE Hair Transplant',
        'grafts'   => '2,400 Grafts',
        'interval' => '12 Months Follow-Up',
        'desc'     => 'Rebuilding recessed hairline frame delivering youthful appearance and permanent natural hair.',
        'alt'      => 'Hairline contour rejuvenation before and after — DenceSpot Clinic',
        'w'        => 1500,
        'h'        => 1500,
    ],
    [
        'id'       => 'case-20230517-6',
        'url'      => '/assets/img/gallery/2023-05-17 (6).jpg',
        'thumb'    => '/assets/img/gallery/2023-05-17 (6).jpg',
        'title'    => 'Post-Operative Healed Hairline Transformation',
        'category' => 'hairline',
        'badge'    => 'CLINICAL CASE',
        'technique'=> 'Micro-FUE Graft Placement',
        'grafts'   => '2,200 Grafts',
        'interval' => 'Post-Procedure Follow-Up',
        'desc'     => 'Clean microscopic donor extraction and precision implantation showing healing and dense hair growth.',
        'alt'      => 'Clinical hair transplant case study — DenceSpot Clinic',
        'w'        => 1080,
        'h'        => 1080,
    ],
    [
        'id'       => 'case-img-20220506',
        'url'      => '/assets/img/gallery/IMG-20220506-WA0001.jpg',
        'thumb'    => '/assets/img/gallery/IMG-20220506-WA0001.jpg',
        'title'    => 'Clinical Transformation & Hair Thickness',
        'category' => 'hairline',
        'badge'    => 'BEFORE & AFTER',
        'technique'=> 'FUE Hair Transplant',
        'grafts'   => '2,350 Grafts',
        'interval' => '10 Months Outcome',
        'desc'     => 'Significant density gain and complete restoration of confidence with permanent follicular grafts.',
        'alt'      => 'Clinical hair transformation before and after — DenceSpot Clinic',
        'w'        => 1280,
        'h'        => 1280,
    ],

    // --- Crown & Full Scalp Transformations ---
    [
        'id'       => 'case-20210104',
        'url'      => '/assets/img/gallery/20210104_132737.jpg',
        'thumb'    => '/assets/img/gallery/20210104_132737.jpg',
        'title'    => 'Crown Vertex Density & Natural Swirl Restoration',
        'category' => 'crown',
        'badge'    => 'BEFORE & AFTER',
        'technique'=> 'Crown FUE Restoration',
        'grafts'   => '2,500 Grafts',
        'interval' => '14 Months Review',
        'desc'     => 'Restoring the natural spiral whorl pattern of the vertex with multi-angled graft placement.',
        'alt'      => 'Crown vertex hair transplant before and after — DenceSpot Clinic',
        'w'        => 1897,
        'h'        => 1897,
    ],
    [
        'id'       => 'case-20210319-2',
        'url'      => '/assets/img/gallery/20210319_152128.jpg',
        'thumb'    => '/assets/img/gallery/20210319_152128.jpg',
        'title'    => 'Crown & Mid-Scalp Dense Coverage',
        'category' => 'crown',
        'badge'    => 'BEFORE & AFTER',
        'technique'=> 'Advanced FUE',
        'grafts'   => '2,800 Grafts',
        'interval' => '12 Months Review',
        'desc'     => 'Significant scalp coverage across crown thinning area, preserving donor reserve for future maintenance.',
        'alt'      => 'Crown and mid scalp dense coverage before and after — DenceSpot Clinic',
        'w'        => 1897,
        'h'        => 1897,
    ],
    [
        'id'       => 'case-20230510',
        'url'      => '/assets/img/gallery/2023-05-10.jpg',
        'thumb'    => '/assets/img/gallery/2023-05-10.jpg',
        'title'    => 'Advanced Norwood Scalp Transformation',
        'category' => 'crown',
        'badge'    => 'BEFORE & AFTER',
        'technique'=> 'Mega-Session FUE',
        'grafts'   => '3,200 Grafts',
        'interval' => '14 Months Outcome',
        'desc'     => 'Combined frontal hairline reconstruction and crown coverage for extensive male pattern baldness.',
        'alt'      => 'Advanced Norwood scalp hair transplant before and after — DenceSpot Clinic',
        'w'        => 1080,
        'h'        => 1080,
    ],
    [
        'id'       => 'case-20230517-3',
        'url'      => '/assets/img/gallery/2023-05-17 (3).jpg',
        'thumb'    => '/assets/img/gallery/2023-05-17 (3).jpg',
        'title'    => 'Crown Swirl & Mid-Scalp Transition',
        'category' => 'crown',
        'badge'    => 'BEFORE & AFTER',
        'technique'=> 'FUE Vertex Implantation',
        'grafts'   => '2,100 Grafts',
        'interval' => '12 Months Follow-Up',
        'desc'     => 'Re-creating the natural clockwise swirl pattern to eliminate visible crown thinning.',
        'alt'      => 'Crown swirl hair transplant before and after — DenceSpot Clinic',
        'w'        => 1080,
        'h'        => 1080,
    ],

    // --- PRP & Clinical Procedures ---
    [
        'id'       => 'case-prp-face',
        'url'      => '/assets/img/gallery/IMG_20210227_171718_321.jpg',
        'thumb'    => '/assets/img/gallery/IMG_20210227_171718_321.jpg',
        'title'    => 'Aesthetic Clinical Platelet-Rich Plasma (PRP) Result',
        'category' => 'prp',
        'badge'    => 'PRP OUTCOME',
        'technique'=> 'Autologous PRP Therapy',
        'grafts'   => '4 Sessions Protocol',
        'interval' => '1 Month Post-Session',
        'desc'     => 'High-concentration platelet-rich plasma application showing collagen regeneration, tone, and skin radiance.',
        'alt'      => 'Platelet-rich plasma PRP treatment before and after — DenceSpot Clinic',
        'w'        => 1897,
        'h'        => 1897,
    ],
    [
        'id'       => 'case-graft-wa',
        'url'      => '/assets/img/gallery/IMG-20220115-WA0004.jpg',
        'thumb'    => '/assets/img/gallery/IMG-20220115-WA0004.jpg',
        'title'    => 'Microscopic Recipient Graft Implantation',
        'category' => 'prp',
        'badge'    => 'CLINICAL SUITE',
        'technique'=> 'Precision Slit Implantation',
        'grafts'   => 'Procedure Close-Up',
        'interval' => 'Surgery Day',
        'desc'     => 'Close-up clinical view of sapphire micro-incisions and atraumatic follicle handling under high magnification.',
        'alt'      => 'Clinical hair transplant graft placement procedure — DenceSpot Clinic',
        'w'        => 867,
        'h'        => 1156,
    ],
    [
        'id'       => 'case-2025-03-16',
        'url'      => '/assets/img/gallery/2025-03-16.jpg',
        'thumb'    => '/assets/img/gallery/2025-03-16.jpg',
        'title'    => 'Operating Suite Graft Micro-Dissection',
        'category' => 'prp',
        'badge'    => 'CLINICAL SUITE',
        'technique'=> 'Stereo-Microscopic Dissection',
        'grafts'   => 'Graft Sorting',
        'interval' => 'Intra-Operative',
        'desc'     => 'Doctor and surgical technicians sorting single and multi-hair follicular units in chilled saline solution.',
        'alt'      => 'Intra operative follicle dissection — DenceSpot Clinic Gurugram',
        'w'        => 1600,
        'h'        => 881,
    ],

    // --- Clinic Premises & Surgical Facilities ---
    [
        'id'       => 'clinic-facade',
        'url'      => '/assets/img/clinic-front.webp',
        'thumb'    => '/assets/img/clinic-front.webp',
        'title'    => 'DenceSpot Clinic — Gurugram Facility Frontage',
        'category' => 'clinic',
        'badge'    => 'CLINIC PREMISES',
        'technique'=> 'Doctor-Led Facility',
        'grafts'   => 'Sector 39 Gurugram',
        'interval' => 'Two Center Presence',
        'desc'     => 'Conveniently located on Sector 39 Road (opposite Bakhtawar Chowk / Medanta vicinity), Gurugram.',
        'alt'      => 'DenceSpot Clinic frontage, Sector 39 Road Gurugram',
        'w'        => 1200,
        'h'        => 800,
    ],
    [
        'id'       => 'clinic-equipment',
        'url'      => '/assets/img/clinic-equipment.jpg',
        'thumb'    => '/assets/img/clinic-equipment.jpg',
        'title'    => 'Sterile Surgical OT & Advanced Diagnostics',
        'category' => 'clinic',
        'badge'    => 'SURGICAL SUITE',
        'technique'=> 'Hospital-Grade Sterilization',
        'grafts'   => 'HEPA Air Filtration',
        'interval' => 'Daily Autoclave Protocol',
        'desc'     => 'Dedicated minor operation theatre equipped with high-magnification optical loupes and computerized micro-motors.',
        'alt'      => 'Sterile surgical equipment and operation theatre at DenceSpot Clinic',
        'w'        => 1200,
        'h'        => 800,
    ],
    [
        'id'       => 'clinic-board',
        'url'      => '/assets/img/clinic-front-board.jpg',
        'thumb'    => '/assets/img/clinic-front-board.jpg',
        'title'    => 'Patient Reception & Consultation Wing',
        'category' => 'clinic',
        'badge'    => 'CLINIC PREMISES',
        'technique'=> 'Private Consultation Rooms',
        'grafts'   => 'Digital Trichoscopy',
        'interval' => 'Monday - Sunday',
        'desc'     => 'Private consultation lounges where doctors perform detailed scalp mapping and Norwood classification analysis.',
        'alt'      => 'Patient reception area at DenceSpot Clinic Gurugram',
        'w'        => 1200,
        'h'        => 800,
    ],
    [
        'id'       => 'clinic-unnamed',
        'url'      => '/assets/img/gallery/unnamed.jpg',
        'thumb'    => '/assets/img/gallery/unnamed.jpg',
        'title'    => 'DenceSpot Sector 39 Center Exterior & Signage',
        'category' => 'clinic',
        'badge'    => 'CLINIC PREMISES',
        'technique'=> 'Ground-Floor Access',
        'grafts'   => 'Dedicated Parking',
        'interval' => '10:00 AM – 7:30 PM',
        'desc'     => 'Exterior street view of DenceSpot Hair & Aesthetic Clinic on Sector 39 Road, Jharsa, Gurugram.',
        'alt'      => 'DenceSpot Clinic exterior signage Sector 39 Gurugram',
        'w'        => 1897,
        'h'        => 1423,
    ],
];

// Generate ImageGallery Schema
$imageSchemas = [];
foreach ($galleryItems as $item) {
    $imageSchemas[] = [
        '@type'       => 'ImageObject',
        'contentUrl'  => abs_url($item['url']),
        'name'        => $item['title'],
        'description' => $item['desc'],
        'width'       => $item['w'],
        'height'      => $item['h'],
    ];
}

$page = [
    'title'       => 'Before and After Hair Transplant Gallery | DenceSpot Clinic Gurgaon & Delhi',
    'description' => 'Explore authentic before and after hair transplant results, patient transformations, and clinical facilities at DenceSpot Clinic. Doctor-led, 100% unedited photos.',
    'url'         => '/gallery',
    'crumbs'      => $crumbs,
    'nav_active'  => '/gallery',
    'schema'      => [
        schema_clinic(),
        schema_physician(),
        schema_breadcrumbs($crumbs),
        [
            '@type'       => 'CollectionPage',
            '@id'         => abs_url('/gallery') . '#page',
            'name'        => 'Before & After Hair Transplant & Photo Gallery',
            'description' => 'Verified before-and-after photographs of patients treated at DenceSpot Clinic in Gurugram and Delhi.',
            'about'       => ['@id' => SITE_ORIGIN . '/#clinic'],
            'mainEntity'  => [
                '@type'           => 'ImageGallery',
                'name'            => 'DenceSpot Hair Restoration Patient Cases',
                'associatedMedia' => array_slice($imageSchemas, 0, 15),
            ],
        ],
    ],
];

require __DIR__ . '/includes/header.php';
?>

<style>
/* Gallery Custom Styling matching DenceSpot Luxury Medical Theme */
.ds-gallery-hero {
  padding: 3.5rem 0 2.5rem;
  background: radial-gradient(circle at top right, rgba(3, 40, 117, 0.06), transparent 70%),
              radial-gradient(circle at bottom left, rgba(212, 175, 55, 0.04), transparent 60%);
  border-bottom: 1px solid var(--hp-line, #E5E9E7);
  text-align: center;
}
.ds-gallery-hero .lead {
  max-width: 760px;
  margin: 1.25rem auto 0;
  font-size: 1.125rem;
  line-height: 1.65;
  color: #38423E;
}
.ds-trust-strip {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 12px 24px;
  margin-top: 2rem;
  font-size: 0.875rem;
  font-weight: 500;
  color: var(--hp-green-800, #032875);
}
.ds-trust-strip span {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: #FFFFFF;
  padding: 6px 14px;
  border-radius: 999px;
  border: 1px solid var(--hp-line, #DCE3E0);
  box-shadow: 0 2px 6px rgba(0,0,0,0.02);
}
.ds-filter-nav {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 10px;
  margin-top: 2.25rem;
}
.ds-filter-btn {
  appearance: none;
  border: 1px solid var(--hp-line, #D0D8D4);
  background: #FFFFFF;
  color: #2D3732;
  font-family: inherit;
  font-size: 0.9rem;
  font-weight: 600;
  padding: 10px 20px;
  border-radius: 30px;
  cursor: pointer;
  transition: all 0.22s ease-in-out;
  display: inline-flex;
  align-items: center;
  gap: 8px;
}
.ds-filter-btn:hover {
  background: #F3F7F5;
  border-color: var(--hp-green-800, #032875);
  color: var(--hp-green-800, #032875);
}
.ds-filter-btn.active {
  background: var(--hp-green-800, #032875);
  border-color: var(--hp-green-800, #032875);
  color: #FFFFFF;
  box-shadow: 0 4px 12px rgba(3, 40, 117, 0.2);
}
.ds-filter-btn .ds-badge-count {
  display: inline-block;
  background: rgba(0,0,0,0.07);
  color: inherit;
  padding: 2px 8px;
  border-radius: 12px;
  font-size: 0.75rem;
}
.ds-filter-btn.active .ds-badge-count {
  background: rgba(255,255,255,0.25);
  color: #FFFFFF;
}

/* Gallery Grid */
.ds-gallery-section {
  padding: 3.5rem 0 5rem;
  background: #FBFCFE;
}
.ds-gallery-grid {
  display: grid;
  grid-template-columns: repeat(1, 1fr);
  gap: 28px;
}
@media (min-width: 640px) {
  .ds-gallery-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}
@media (min-width: 1024px) {
  .ds-gallery-grid {
    grid-template-columns: repeat(3, 1fr);
  }
}

.ds-card {
  background: #FFFFFF;
  border-radius: 16px;
  border: 1px solid var(--hp-line, #E3E6EE);
  overflow: hidden;
  box-shadow: 0 4px 16px rgba(3, 40, 117, 0.04);
  transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.3s cubic-bezier(0.16, 1, 0.3, 1);
  display: flex;
  flex-direction: column;
}
.ds-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 30px rgba(3, 40, 117, 0.1);
  border-color: #B2CCC3;
}
.ds-card__media {
  position: relative;
  width: 100%;
  aspect-ratio: 1 / 1;
  background: #0B1B40;
  overflow: hidden;
  cursor: pointer;
}
.ds-card__media.is-wide {
  aspect-ratio: 16 / 11;
}
.ds-card__media img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
}
.ds-card:hover .ds-card__media img {
  transform: scale(1.05);
}
.ds-card__badge {
  position: absolute;
  top: 14px;
  left: 14px;
  background: rgba(3, 40, 117, 0.88);
  color: #FFFFFF;
  font-size: 0.72rem;
  font-weight: 700;
  letter-spacing: 0.5px;
  padding: 5px 12px;
  border-radius: 20px;
  backdrop-filter: blur(6px);
  z-index: 2;
  box-shadow: 0 2px 8px rgba(0,0,0,0.25);
}
.ds-card__zoom-hint {
  position: absolute;
  bottom: 12px;
  right: 12px;
  background: rgba(0, 0, 0, 0.65);
  color: #FFFFFF;
  font-size: 0.75rem;
  padding: 4px 10px;
  border-radius: 6px;
  opacity: 0;
  transition: opacity 0.25s ease;
  pointer-events: none;
  z-index: 2;
}
.ds-card:hover .ds-card__zoom-hint {
  opacity: 1;
}

.ds-card__body {
  padding: 1.25rem 1.4rem;
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.ds-card__title {
  font-family: var(--hp-font-serif, 'Playfair Display', serif);
  font-size: 1.15rem;
  font-weight: 600;
  line-height: 1.4;
  color: #12224A;
  margin: 0 0 8px;
}
.ds-card__meta {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-bottom: 12px;
}
.ds-meta-pill {
  font-size: 0.75rem;
  font-weight: 600;
  color: var(--hp-green-800, #032875);
  background: #EAF3F0;
  padding: 3px 9px;
  border-radius: 6px;
}
.ds-card__desc {
  font-size: 0.875rem;
  line-height: 1.5;
  color: #646E85;
  margin: 0 0 16px;
  flex-grow: 1;
}
.ds-card__footer {
  padding-top: 12px;
  border-top: 1px solid var(--hp-line, #E3E6EE);
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.ds-card__btn {
  font-size: 0.825rem;
  font-weight: 600;
  color: var(--hp-green-800, #032875);
  background: transparent;
  border: none;
  cursor: pointer;
  padding: 6px 0;
  display: inline-flex;
  align-items: center;
  gap: 6px;
}
.ds-card__btn:hover {
  text-decoration: underline;
}

/* Lightbox Modal */
.ds-lightbox {
  position: fixed;
  inset: 0;
  background: rgba(2, 18, 52, 0.88);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  z-index: 999999;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.28s ease, visibility 0.28s ease;
}
.ds-lightbox.is-open {
  opacity: 1;
  visibility: visible;
}
.ds-lightbox__dialog {
  position: relative;
  max-width: 960px;
  width: 100%;
  max-height: 94vh;
  background: #FFFFFF;
  border-radius: 18px;
  overflow: hidden;
  box-shadow: 0 25px 60px rgba(0,0,0,0.5);
  display: flex;
  flex-direction: column;
  transform: scale(0.96);
  transition: transform 0.28s cubic-bezier(0.16, 1, 0.3, 1);
}
.ds-lightbox.is-open .ds-lightbox__dialog {
  transform: scale(1);
}
.ds-lightbox__close {
  position: absolute;
  top: 14px;
  right: 14px;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: rgba(0,0,0,0.7);
  color: #FFFFFF;
  border: none;
  font-size: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  z-index: 10;
  transition: background 0.2s ease, transform 0.2s ease;
}
.ds-lightbox__close:hover {
  background: #000000;
  transform: scale(1.08);
}
.ds-lightbox__img-wrap {
  width: 100%;
  height: 60vh;
  max-height: 560px;
  background: #0F1714;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  overflow: hidden;
}
.ds-lightbox__img {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
  transition: opacity 0.2s ease;
}
.ds-lightbox__nav-btn {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 46px;
  height: 46px;
  border-radius: 50%;
  background: rgba(255,255,255,0.85);
  color: #0B1B40;
  border: 1px solid rgba(0,0,0,0.1);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 22px;
  cursor: pointer;
  z-index: 5;
  transition: all 0.2s ease;
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}
.ds-lightbox__nav-btn:hover {
  background: #FFFFFF;
  transform: translateY(-50%) scale(1.1);
}
.ds-lightbox__prev { left: 16px; }
.ds-lightbox__next { right: 16px; }

.ds-lightbox__info {
  padding: 1.25rem 1.75rem;
  background: #FFFFFF;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  border-top: 1px solid var(--hp-line, #E3E6EE);
}
.ds-lightbox__meta-box {
  flex: 1;
  min-width: 260px;
}
.ds-lightbox__counter {
  font-size: 0.75rem;
  font-weight: 700;
  text-transform: uppercase;
  color: #7A8983;
  margin-bottom: 4px;
}
.ds-lightbox__title {
  font-family: var(--hp-font-serif, 'Playfair Display', serif);
  font-size: 1.25rem;
  font-weight: 600;
  color: #0B1B40;
  margin: 0 0 6px;
}
.ds-lightbox__desc {
  font-size: 0.875rem;
  color: #646E85;
  margin: 0;
  line-height: 1.45;
}
.ds-lightbox__actions {
  display: flex;
  gap: 10px;
}

/* Compliance Disclosure */
.ds-disclaimer-box {
  background: #F5F6F9;
  border-radius: 12px;
  border: 1px solid #DCE5E1;
  padding: 1.5rem 1.75rem;
  margin-top: 3.5rem;
  font-size: 0.85rem;
  color: #646E85;
  line-height: 1.6;
}
.ds-disclaimer-box h4 {
  font-size: 0.95rem;
  font-weight: 700;
  color: #12224A;
  margin: 0 0 8px;
}
</style>

<!-- Hero Section -->
<section class="ds-gallery-hero">
  <div class="wrap">
    <span class="pill pill--dot">Verified Clinical Portfolio</span>
    <h1 class="h1 mt-3">Before &amp; After Results &amp; Photo Gallery</h1>
    <p class="lead">
      Real patient transformations and inside looks at DenceSpot Clinic's Sector 39 Gurugram and Rohini Delhi surgical suites. Every photograph represents consented, genuine, unretouched clinical documentation overseen by our registered medical practitioners.
    </p>

    <!-- Trust Badges -->
    <div class="ds-trust-strip">
      <span><?= icon('check', 16) ?> 100% Unedited Clinical Photos</span>
      <span><?= icon('check', 16) ?> Doctor-Assessed &amp; Planned</span>
      <span><?= icon('check', 16) ?> Natural Feathered Hairline</span>
      <span><?= icon('check', 16) ?> Written Patient Consent</span>
      <span><?= icon('check', 16) ?> Sterilized Modern OT</span>
    </div>

    <!-- Filter Buttons -->
    <div class="ds-filter-nav" id="gallery-filters" role="tablist" aria-label="Gallery category filters">
      <button type="button" class="ds-filter-btn active" data-filter="all">
        All Photos <span class="ds-badge-count"><?= count($galleryItems) ?></span>
      </button>
      <button type="button" class="ds-filter-btn" data-filter="hairline">
        Hairline &amp; Frontal <span class="ds-badge-count"><?= count(array_filter($galleryItems, fn($i) => $i['category'] === 'hairline')) ?></span>
      </button>
      <button type="button" class="ds-filter-btn" data-filter="crown">
        Crown &amp; Full Scalp <span class="ds-badge-count"><?= count(array_filter($galleryItems, fn($i) => $i['category'] === 'crown')) ?></span>
      </button>
      <button type="button" class="ds-filter-btn" data-filter="featured">
        Featured Case Studies <span class="ds-badge-count"><?= count(array_filter($galleryItems, fn($i) => $i['category'] === 'featured')) ?></span>
      </button>
      <button type="button" class="ds-filter-btn" data-filter="prp">
        PRP &amp; Clinical <span class="ds-badge-count"><?= count(array_filter($galleryItems, fn($i) => $i['category'] === 'prp')) ?></span>
      </button>
      <button type="button" class="ds-filter-btn" data-filter="clinic">
        Clinic &amp; Facilities <span class="ds-badge-count"><?= count(array_filter($galleryItems, fn($i) => $i['category'] === 'clinic')) ?></span>
      </button>
    </div>
  </div>
</section>

<!-- Gallery Grid Section -->
<section class="ds-gallery-section">
  <div class="wrap">
    <div class="ds-gallery-grid" id="gallery-grid">
      <?php foreach ($galleryItems as $idx => $item): ?>
        <article class="ds-card gallery-item" data-category="<?= e($item['category']) ?>" data-index="<?= $idx ?>">
          <div class="ds-card__media <?= $item['category'] === 'clinic' ? 'is-wide' : '' ?>" onclick="dsOpenLightbox(<?= $idx ?>)">
            <span class="ds-card__badge"><?= e($item['badge']) ?></span>
            <img src="<?= e($item['thumb']) ?>"
                 alt="<?= e($item['alt']) ?>"
                 width="<?= (int) $item['w'] ?>"
                 height="<?= (int) $item['h'] ?>"
                 loading="lazy"
                 decoding="async">
            <span class="ds-card__zoom-hint">🔍 Click to Enlarge</span>
          </div>
          <div class="ds-card__body">
            <div>
              <div class="ds-card__meta">
                <?php if (!empty($item['technique'])): ?>
                  <span class="ds-meta-pill"><?= e($item['technique']) ?></span>
                <?php endif; ?>
                <?php if (!empty($item['grafts'])): ?>
                  <span class="ds-meta-pill"><?= e($item['grafts']) ?></span>
                <?php endif; ?>
                <?php if (!empty($item['interval'])): ?>
                  <span class="ds-meta-pill" style="background:#F2EBE1; color:#7D5C1E;"><?= e($item['interval']) ?></span>
                <?php endif; ?>
              </div>
              <h2 class="ds-card__title"><?= e($item['title']) ?></h2>
              <p class="ds-card__desc"><?= e($item['desc']) ?></p>
            </div>
            <div class="ds-card__footer">
              <button type="button" class="ds-card__btn" onclick="dsOpenLightbox(<?= $idx ?>)">
                🔍 View High-Resolution Photo &rarr;
              </button>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

    <!-- Medical & Transparency Disclosure -->
    <div class="ds-disclaimer-box">
      <h4>Clinical Photography Disclosure &amp; Patient Standards</h4>
      <p>
        <strong>Individual Results Notice:</strong> Hair restoration outcomes depend on individual physiological factors, donor density, follicle characteristics, laxity, post-operative compliance, and patient age. Photographs depict individual outcomes achieved under doctor-led treatment protocols and do not constitute an explicit or implied warranty of identical results for every individual. All patient photography displayed on this website is published under signed written consent in accordance with medical ethics and Indian clinical communication standards.
      </p>
    </div>

    <!-- Action Strip -->
    <div class="btn-row mt-6" style="justify-content:center; gap: 14px;">
      <a class="btn btn--lg btn--accent" href="<?= e(WHATSAPP_URL) ?>" rel="noopener" data-track="whatsapp">
        <?= icon('whatsapp', 19) ?> Ask About Similar Cases on WhatsApp
      </a>
      <a class="btn btn--lg btn--ink" href="/book-consultation" data-book data-track="book">
        <?= icon('calendar', 18) ?> Book Doctor Scalp Consultation
      </a>
      <a class="btn btn--lg btn--outline" href="tel:<?= e(PHONE_E164) ?>" data-track="call">
        <?= icon('phone', 18) ?> Call Gurugram Clinic
      </a>
    </div>
  </div>
</section>

<!-- Lightbox Modal -->
<div class="ds-lightbox" id="ds-lightbox" role="dialog" aria-modal="true" aria-label="Photo view" onclick="dsOnBackdropClick(event)">
  <div class="ds-lightbox__dialog">
    <button type="button" class="ds-lightbox__close" onclick="dsCloseLightbox()" aria-label="Close photo view">&times;</button>
    <div class="ds-lightbox__img-wrap">
      <button type="button" class="ds-lightbox__nav-btn ds-lightbox__prev" onclick="dsPrevPhoto()" aria-label="Previous photo">&#10094;</button>
      <img src="" alt="" id="ds-lightbox-img" class="ds-lightbox__img">
      <button type="button" class="ds-lightbox__nav-btn ds-lightbox__next" onclick="dsNextPhoto()" aria-label="Next photo">&#10095;</button>
    </div>
    <div class="ds-lightbox__info">
      <div class="ds-lightbox__meta-box">
        <div class="ds-lightbox__counter" id="ds-lightbox-counter">Photo 1 of <?= count($galleryItems) ?></div>
        <h3 class="ds-lightbox__title" id="ds-lightbox-title"></h3>
        <p class="ds-lightbox__desc" id="ds-lightbox-desc"></p>
      </div>
      <div class="ds-lightbox__actions">
        <a class="btn btn--sm btn--accent" id="ds-lightbox-wa" href="<?= e(WHATSAPP_URL) ?>" target="_blank" rel="noopener">
          <?= icon('whatsapp', 16) ?> WhatsApp About This
        </a>
        <a class="btn btn--sm btn--ink" href="/book-consultation" data-book>
          <?= icon('calendar', 16) ?> Book Consultation
        </a>
      </div>
    </div>
  </div>
</div>

<script>
(function() {
  var galleryData = <?= json_encode($galleryItems, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;
  var currentIndex = 0;
  var visibleIndices = [];

  function updateVisibleIndices(filter) {
    visibleIndices = [];
    galleryData.forEach(function(item, idx) {
      if (filter === 'all' || item.category === filter) {
        visibleIndices.push(idx);
      }
    });
  }
  updateVisibleIndices('all');

  // Filtering
  var filterBtns = document.querySelectorAll('.ds-filter-btn');
  var cards = document.querySelectorAll('.gallery-item');

  filterBtns.forEach(function(btn) {
    btn.addEventListener('click', function() {
      var filter = btn.getAttribute('data-filter');
      filterBtns.forEach(function(b) { b.classList.remove('active'); });
      btn.classList.add('active');

      updateVisibleIndices(filter);

      cards.forEach(function(card) {
        var cat = card.getAttribute('data-category');
        if (filter === 'all' || cat === filter) {
          card.style.display = 'flex';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });

  // Lightbox
  var modal = document.getElementById('ds-lightbox');
  var imgEl = document.getElementById('ds-lightbox-img');
  var titleEl = document.getElementById('ds-lightbox-title');
  var descEl = document.getElementById('ds-lightbox-desc');
  var counterEl = document.getElementById('ds-lightbox-counter');
  var waEl = document.getElementById('ds-lightbox-wa');

  function renderPhoto(index) {
    currentIndex = index;
    var item = galleryData[index];
    if (!item) return;

    imgEl.src = item.url;
    imgEl.alt = item.alt;
    titleEl.textContent = item.title;
    descEl.textContent = item.desc + (item.grafts ? ' (' + item.grafts + ' · ' + (item.technique || '') + ')' : '');

    var currentPos = visibleIndices.indexOf(index);
    var posText = (currentPos !== -1 ? (currentPos + 1) : (index + 1)) + ' of ' + (visibleIndices.length || galleryData.length);
    counterEl.textContent = 'Photo ' + posText + ' · ' + item.badge;

    var customWaText = encodeURIComponent('Hello DenceSpot Clinic, I am viewing this case on your website gallery: "' + item.title + '". I would like to schedule a consultation with the doctor to assess a similar result.');
    waEl.href = 'https://api.whatsapp.com/send/?phone=' + encodeURIComponent('<?= e(PHONE_E164) ?>') + '&text=' + customWaText;
  }

  window.dsOpenLightbox = function(index) {
    renderPhoto(index);
    modal.classList.add('is-open');
    document.body.style.overflow = 'hidden';
  };

  window.dsCloseLightbox = function() {
    modal.classList.remove('is-open');
    document.body.style.overflow = '';
  };

  window.dsOnBackdropClick = function(e) {
    if (e.target === modal) {
      dsCloseLightbox();
    }
  };

  window.dsPrevPhoto = function() {
    if (visibleIndices.length === 0) return;
    var pos = visibleIndices.indexOf(currentIndex);
    var prevPos = (pos - 1 + visibleIndices.length) % visibleIndices.length;
    renderPhoto(visibleIndices[prevPos]);
  };

  window.dsNextPhoto = function() {
    if (visibleIndices.length === 0) return;
    var pos = visibleIndices.indexOf(currentIndex);
    var nextPos = (pos + 1) % visibleIndices.length;
    renderPhoto(visibleIndices[nextPos]);
  };

  // Keyboard navigation
  document.addEventListener('keydown', function(e) {
    if (!modal.classList.contains('is-open')) return;
    if (e.key === 'Escape') {
      dsCloseLightbox();
    } else if (e.key === 'ArrowLeft') {
      dsPrevPhoto();
    } else if (e.key === 'ArrowRight') {
      dsNextPhoto();
    }
  });
})();
</script>

<?php require __DIR__ . '/includes/footer.php'; ?>
