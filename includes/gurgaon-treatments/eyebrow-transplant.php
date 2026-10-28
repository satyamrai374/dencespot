<?php
/**
 * Copy for the Gurugram eyebrow transplant area pages,
 * /eyebrow-transplant-in-<area> (schema: includes/gurgaon-treatment-area-page.php).
 * Facts as on /eyebrow-transplant-in-gurgaon (single-hair grafts at a shallow,
 * changing angle, the shape agreed first, lifelong trimming, alopecia areata
 * and thyroid causes first, the 8–12 month settling), written fresh.
 * Microblading is described for comparison only. No density figures, success
 * rates or prices, and no results row: no consented brow photographs are on
 * record. The Gurugram clinic only.
 */

declare(strict_types=1);

return [
    'form_treatment' => 'Eyebrow transplant',
    'form'           => ['Eyebrow transplant', 'Eyebrow transplant — after over-plucking', 'Eyebrow transplant — scar or burn', 'Alopecia areata treatment', 'Not sure — please advise'],
    'faq_about'      => 'brow shape, skin or budget',
    'results'        => false,

    'middle' => [
        'heading' => 'Living With Transplanted Brows',
        'sub'     => 'What to expect long after the procedure.',
        'cols'    => ['Question', 'Typically'],
        'rows'    => [
            ['Do the hairs keep growing?', 'Yes, like scalp hair'],
            ['How often to trim?', 'Every one to two weeks'],
            ['For how long?', 'For as long as they grow'],
            ['When does the shape settle?', 'About 8–12 months'],
            ['A second sitting?', 'Sometimes, to refine'],
        ],
        'note'    => 'If a regular trim does not suit you, say so at the consultation; it is a sound reason to choose something else.',
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'Five Stages of an Eyebrow Transplant at Sector 39',
        'intro'     => 'At the Gurugram clinic the cause of the thinning is settled first and the shape second; the graft count and the estimate follow from the shape.',
        'items'     => [
            ['search', 'Why the Brow Is Thin', 'Plucking, a scar, thyroid change or alopecia areata told apart, because the cause decides whether to operate at all.'],
            ['pencil', 'Shape on Your Face', 'Where each brow starts, how high it arches, how full the body is and where the tail ends, pencilled on and settled with you.'],
            ['list', 'Single Hairs Prepared', 'Follicles removed from the rear of the scalp while it is numb, then separated under magnification so no graft carries more than one hair.'],
            ['settings', 'Hair-by-Hair Placement', 'Grafts set close to flat, rising near the nose, running outward through the body and turning down at the tail.'],
            ['camera', 'Follow-Up Visits', 'Check-ups through the shedding and regrowth months, compared on photographs, and guidance once the new hairs need their first trim.'],
        ],
        'note_html' => 'Thinning at the outer ends of the brows can be linked to the thyroid: see <a href="/blog/thyroid-and-hair-loss">thyroid and hair loss</a>. General healing advice is in the <a href="/hair-transplant-aftercare">aftercare guide</a>.',
    ],

    'cost' => [
        'factors' => [
            ['pencil', 'mint', 'Size of the design', 'The brow you approve sets how many single-hair grafts are needed.'],
            ['scale', 'violet', 'One brow or both', 'Correcting one gappy brow is a smaller job than rebuilding a pair.'],
            ['calendar', 'sky', 'Skin and staging', 'Scar or burn tissue takes longer, and a planned second sitting is part of the estimate.'],
        ],
        'links' => [
            '/hair-transplant-cost-in-gurgaon' => 'How pricing works in Gurgaon',
            '/cost-and-emi-options'            => 'Payment and EMI',
        ],
    ],

    'related' => [
        '/eyebrow-transplant-in-gurgaon'        => 'Eyebrow transplant in Gurgaon',
        '/alopecia-areata-treatment-in-gurgaon' => 'Alopecia areata treatment',
        '/beard-transplant-gurgaon'             => 'Beard transplant',
        '/hair-transplant-aftercare'            => 'Recovery and aftercare',
    ],

    'area' => [
        'lead'            => 'Before any graft is discussed there, the doctor works out why your brows thinned and sketches a shape on your face, and you hear what lifelong trimming involves.',
        'feats'           => [['search', 'Cause settled first'], ['pencil', 'Shape sketched on you'], ['clock', 'Trimming explained upfront']],
        'heading'         => 'Eyebrow Transplant: A Guide for {area} Patients',
        'visits_line'     => 'Everything from the first look at your brows to the last regrowth check happens in Sector 39, Gurugram.',
        'day_heading'     => 'The Week After the Procedure',
        'day'             => 'Brows sit in the middle of your face, so the small crusts and puffiness around the eyes are noticeable for several days. If you can, keep that week in {area} free of meetings and family functions, stay out of sweaty outdoor heat, and leave threading and brow make-up until a review allows them.',
        'visits_intro'    => 'Plan for a design appointment, a procedure that takes a few hours, and several short check-ups spread across the months of regrowth. You go home the same day after the procedure, and none of the appointments is anywhere but our Gurugram clinic.',
        'visit_icons'     => [['pencil', 'Shape Agreed First'], ['clock', 'A Few Hours on the Day'], ['calendar', 'Check-Ups Over Months'], ['info', 'Trimming Advice Given']],
        'options_heading' => 'Eyebrow Grafts or Microblading: The Difference',
        'options_html'    => 'A transplant relocates living follicles, each graft a single hair, so real hairs grow and need trimming for life, and the shape settles over months. Microblading tints the skin with hair-like strokes of pigment; nothing grows, and the strokes fade over time and need repeating. Which fits depends on why your brows are thin. The <a href="{parent}">eyebrow transplant in Gurgaon</a> page goes further.',
        'cost_heading'    => 'What Sets the Price of an Eyebrow Transplant',
        'cost_intro'      => 'Brows are not priced from a list. Once a shape is agreed, the single-hair grafts needed to fill it are counted, and that count, plus any scarred skin and whether a later refining sitting is planned, drives the itemised estimate. Because each brow graft is one hair, setting its per-graft cost beside a scalp quote compares unlike things.',
        'faqs'            => [
            ['q' => 'Do I come to Sector 39 from {area} for everything?',
             'a' => 'Yes. DenceSpot has no clinic in {area}; the assessment, design, procedure and follow-ups all take place at our clinic in Jharsa, on Sector 39 Road, opposite Medanta – The Medicity.'],
            ['q' => 'Which way should I come from {area}?',
             'a' => '{route} The Directions link pins it on Google Maps; if you lose your way, message the clinic on WhatsApp.'],
            ['q' => 'How often will the new brow hairs need trimming?',
             'a' => 'About every one to two weeks, indefinitely. Scalp hair has a long growth phase and keeps that habit after the move, so it does not stop at brow length the way your own brow hair does.'],
            ['q' => 'Is the price different for someone from {area}?',
             'a' => 'No. What you pay depends on how many single hairs your approved shape needs, whether both brows are treated and whether scarred skin is involved. See <a href="/hair-transplant-cost-in-gurgaon">how pricing works</a>.'],
            ['q' => 'Can I fill in my brows with make-up while they heal?',
             'a' => 'Leave them bare at first: pencil, powder and gels wait until a review confirms the skin has healed, so the grafts are not rubbed in the early weeks. If you have a wedding or a work event coming up, pick your date with that gap in mind.'],
            ['q' => 'What if I have alopecia areata?',
             'a' => 'Then surgery waits. The condition attacks hair follicles and does not spare transplanted ones, so it is treated first and needs a long quiet spell before grafting is considered. See <a href="/alopecia-areata-treatment-in-gurgaon">alopecia areata treatment</a>.'],
            ['q' => 'Can I send brow photos before travelling from {area}?',
             'a' => 'Yes. Pull your hair off your forehead, face a window and take one picture straight on, then one from each side, with no brow make-up on. WhatsApp them to the clinic for a first view; settling the shape and the graft count needs an examination in person.'],
        ],
        'consult_intro'   => 'Pick a day to come to Sector 39. You leave knowing whether surgery suits the cause of your sparse brows, having seen a proposed outline on your own face, and with the trimming routine explained; any decision can wait until you have thought it over.',
        'descriptions'    => [
            'Eyebrow transplant for {area}: why brows thin, shape design, lifelong trimming, recovery, cost and FAQs at DenceSpot, Sector 39, Gurugram.',
            'Eyebrow transplant for {area} at DenceSpot in Sector 39, Gurugram: shape design, trimming, cost and FAQs.',
            'Eyebrow transplant for {area}, DenceSpot Gurugram: shape, trimming, cost, FAQs.',
        ],
    ],
];
