<?php
/**
 * Copy for the Gurugram beard transplant area pages,
 * /beard-transplant-in-<area> (schema: includes/gurgaon-treatment-area-page.php).
 * Facts as on /beard-transplant-gurgaon and /beard-transplant-cost-gurgaon
 * (zones, the flat facial angle, single hairs on the borders, FUE and DHI at
 * the clinic, the shared scalp donor, alopecia areata first, a visible week,
 * shaving cleared at review), written fresh. Those pages give no graft
 * ranges, so none are given here; no prices, and no results row: no consented
 * beard photographs are on record. The Gurugram clinic only.
 */

declare(strict_types=1);

return [
    'form_treatment' => 'Beard transplant',
    'form'           => ['Beard — patchy cheeks', 'Beard — cheek line or jawline', 'Moustache or goatee', 'Sideburns', 'Scar in the beard area', 'Not sure — please advise'],
    'faq_about'      => 'face, skin, donor area or budget',
    'results'        => false,

    'middle' => [
        'heading' => 'Beard Zones and What Each One Needs',
        'sub'     => 'General patient education; your design is drawn on your face.',
        'cols'    => ['Zone', 'What matters most'],
        'rows'    => [
            ['Patchy cheeks', 'Blending into existing growth'],
            ['Cheek line', 'The most visible edge; agreed on your face'],
            ['Jawline', 'Direction turns outward along the jaw'],
            ['Moustache', 'Hair points down; the lip moves'],
            ['Chin and goatee', 'Closing the gap to the moustache'],
            ['Sideburns', 'Proportion with the temples'],
        ],
        'note'    => 'Grafts are counted zone by zone from your agreed design and what your scalp donor area can spare; no number is given before that.',
    ],

    'steps' => [
        'eyebrow'   => 'Procedure',
        'heading'   => 'Beard Transplant at Sector 39, Stage by Stage',
        'intro'     => 'Five stages at the Gurugram clinic, with your design agreed before a graft count or a date is set.',
        'items'     => [
            ['search', 'Face and Donor Exam', 'Existing beard growth checked zone by zone, the skin looked at for anything to treat first, and scalp donor density measured.'],
            ['pencil', 'Your Beard Drawn On', 'The cheek line, jaw border and moustache edge marked on your face and adjusted with you at the mirror before anything else is decided.'],
            ['list', 'Single Hairs Set Aside', 'With the scalp numbed, follicles removed from the rear and sides of the head, and the one-hair grafts sorted out for the borders.'],
            ['beard', 'Zone-by-Zone Placement', 'Each graft laid almost flat in the direction of its zone, by FUE sites or a DHI implanter as the plan says.'],
            ['camera', 'Reviews and Shaving Advice', 'Photographed check-ups through the year, with trimming and then razor shaving cleared at a review.'],
        ],
        'note_html' => 'Week-by-week healing is covered in the <a href="/blog/beard-transplant-recovery-timeline">beard transplant recovery timeline</a>. Unsure whether your facial hair has finished coming in? Read <a href="/blog/patchy-beard-wait-or-transplant">patchy beard: wait or transplant?</a>',
    ],

    'cost' => [
        'factors' => [
            ['beard', 'mint', 'Zones in the design', 'Cheeks are usually the largest area; a moustache or chin patch is smaller.'],
            ['chart', 'violet', 'Your own growth', 'The more beard you already have in a zone, the fewer grafts it takes.'],
            ['scale', 'sky', 'Scars and staging', 'Scar tissue is slower work, and a likely second sitting is priced at the start.'],
        ],
        'links' => [
            '/beard-transplant-cost-gurgaon' => 'Beard transplant cost in Gurgaon',
            '/cost-and-emi-options'          => 'Payment and EMI',
        ],
    ],

    'related' => [
        '/beard-transplant-gurgaon'             => 'Beard transplant in Gurgaon',
        '/hair-transplant-in-gurgaon'           => 'Hair transplant (same donor area)',
        '/eyebrow-transplant-in-gurgaon'        => 'Eyebrow transplant',
        '/alopecia-areata-treatment-in-gurgaon' => 'Alopecia areata treatment',
    ],

    'area' => [
        'lead'            => 'There your existing growth is mapped zone by zone and the beard you want is drawn on your face, so the graft count and the written estimate come from a design you have already approved.',
        'feats'           => [['pencil', 'Design drawn on your face'], ['beard', 'Grafts angled to each zone'], ['doc', 'Itemised written estimate']],
        'heading'         => 'Beard Transplant Planning for {area} Patients',
        'visits_line'     => 'Consultations, the design session, the procedure and all reviews happen in Sector 39, at our Gurugram clinic.',
        'day_heading'     => 'On the Procedure Day',
        'day'             => 'How long you are in the chair depends on the graft count: filling a patch or two is a matter of hours, a full beard much of the day with breaks. Bring the list of medicines you take, mentioning any blood thinners or isotretinoin, and arrange for someone to drive you back to {area}, since a helmet strap would rest on the new grafts.',
        'visits_intro'    => 'Start with an examination and design session, then a single day for the procedure, then check-ups as the new hairs shed and come back, each one photographed. Every appointment is at the clinic in Sector 39, Gurugram.',
        'visit_icons'     => [['pencil', 'Design Before Dates'], ['clock', 'Home the Same Day'], ['beard', 'Trimming Cleared at Review'], ['camera', 'Progress Photographed']],
        'options_heading' => 'FUE and DHI for a Beard at the Gurugram Clinic',
        'options_html'    => 'The two methods differ only in how a graft goes in. With FUE, the doctor first makes every site across a zone, so the whole pattern can be checked before placement, which helps on broad cheeks. With DHI, each graft is set by an implanter in one movement, fixing its angle on the spot, which helps at edges where hairs lie nearly flat. A plan may use one, the other or both; the <a href="{parent}">beard transplant in Gurgaon</a> page compares them.',
        'cost_heading'    => 'How Your Beard Estimate Is Built',
        'cost_intro'      => 'No starting price is published, because two patchy cheeks and a full beard are very different jobs. The design sets the zones, the zones and your own growth set the graft count, and the itemised estimate — technique, anaesthesia, medication, dressings and reviews — is handed to you in writing ahead of any booking.',
        'faqs'            => [
            ['q' => 'Where is the procedure done for patients from {area}?',
             'a' => 'In Jharsa, Gurugram, where our clinic sits on Sector 39 Road facing Medanta – The Medicity. DenceSpot does not operate a clinic in {area}, which means your design session, procedure and check-ups are all held in Sector 39.'],
            ['q' => 'How do I get there from {area}?',
             'a' => '{route} The Directions button gives the exact location on Google Maps. On the day itself, have someone drive you home.'],
            ['q' => 'Will I be able to work in {area} the following week?',
             'a' => 'Desk work is usually possible within a few days, but the crusts and swelling are on show for about a week, and a beard cannot be hidden under a cap. If your job is client-facing, or a wedding is coming up, choose the date with that in mind.'],
            ['q' => 'Is the estimate different for someone from {area}?',
             'a' => 'No. It depends on the zones in your design, the hair already growing there, the technique and any scar work. The <a href="/beard-transplant-cost-gurgaon">beard transplant cost page</a> explains each factor.'],
            ['q' => 'What if my bare patches are round and smooth?',
             'a' => 'Then they may be alopecia areata rather than a genetic gap, and an active patch can shed the grafts set into it. The condition is treated and watched first, and a transplant is considered only after a long settled period. See <a href="/alopecia-areata-treatment-in-gurgaon">alopecia areata treatment</a>.'],
            ['q' => 'When can I trim or shave again?',
             'a' => 'Not until a review says so. Grafts that are not yet secure can be pulled loose by a blade, so a trimmer is usually allowed first and a razor some time later, depending on how your face has healed.'],
            ['q' => 'Can I send beard photos from {area} first?',
             'a' => 'Yes. Stand by a window, face the camera, then turn to each side, so the cheeks, jaw, moustache and chin all show, and send the shots on WhatsApp. The clinic can say whether a consultation is worthwhile; nothing is designed or counted until you are examined.'],
        ],
        'consult_intro'   => 'Book a consultation in Sector 39. The doctor examines your beard and donor area, draws the proposed beard on your face for you to judge in the mirror, and explains what the grafts would take from your scalp supply; you take the written plan away with no date fixed.',
        'descriptions'    => [
            'Beard transplant for {area}: design, FUE or DHI, recovery and cost at DenceSpot’s clinic in Sector 39, Gurugram, with answers to common questions.',
            'Beard transplant for {area}: design, recovery and cost at DenceSpot’s clinic in Sector 39, Gurugram, plus FAQs.',
            'Beard transplant for {area} at DenceSpot, Gurugram: design, cost, FAQs.',
        ],
    ],
];
