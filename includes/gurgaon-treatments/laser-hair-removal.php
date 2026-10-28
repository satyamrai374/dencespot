<?php
/**
 * Copy for the Gurugram laser hair removal area pages,
 * /laser-hair-removal-in-<area> (schema: includes/gurgaon-treatment-area-page.php).
 * Facts as on /laser-hair-removal-in-gurgaon, written fresh: a course that
 * reduces hair, session spacing as general ranges (never this clinic's
 * protocol), skin-type caution as that page gives it. The device, wavelength,
 * who runs each session and prices are not on record, so none is stated. Skin
 * family: links go to skin pages and blog posts. The Gurugram clinic only.
 */

declare(strict_types=1);

return [
    'form_treatment' => 'Laser hair removal',
    'form'           => ['Face (upper lip, chin or jaw)', 'Underarms', 'Arms or legs', 'Back or chest', 'Bikini line', 'More than one area', 'Not sure — please advise'],
    'faq_about'      => 'skin, hair or budget',
    'results'        => false,

    'middle' => [
        'heading' => 'Hair Removal Between Sessions',
        'sub'     => 'General guidance for the months of a course.',
        'cols'    => ['Method', 'During the course'],
        'rows'    => [
            ['Shaving or trimming', 'Carry on'],
            ['Waxing or epilating', 'Stop for the course'],
            ['Threading or plucking', 'Stop for the course'],
            ['Bleaching', 'Stop beforehand'],
            ['Hair removal creams', 'Ask the clinic first'],
            ['Eyebrow threading', 'Can continue'],
        ],
        'note'    => 'Laser needs the hair’s root in place, so anything that pulls hairs out is paused on the areas being treated. Eyebrows are not lasered, which is why threading them can carry on.',
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'Your Laser Course, Step by Step',
        'intro'     => 'There are five stages, each at the Gurugram clinic, and nothing is treated until your skin and hair have been examined.',
        'items'     => [
            ['user', 'Skin and Hair Check', 'The doctor examines the skin and hair you want treated and asks about medicines, past laser and hormone-related hair growth.'],
            ['shield', 'Trial Spot', 'A few pulses at your planned settings on a small spot, then a wait of a few days to see how the skin reacts.'],
            ['doc', 'Course Plan', 'How many sessions each area is likely to need, how far apart, and how to prepare, written down for you.'],
            ['settings', 'Treatment', 'Eyes shielded, then the laser passed over the shaved area; most people feel a brief sting and heat that cooling eases.'],
            ['calendar', 'Top-Ups', 'After the course, a session now and then for any regrowth, which is likelier where hormones drive the hair.'],
        ],
        'note_html' => 'Worth reading first: <a href="/blog/laser-hair-removal-patch-test">why a test spot comes first</a> and <a href="/blog/is-laser-hair-removal-permanent">why some hair comes back</a>.',
    ],

    'cost' => [
        'factors' => [
            ['list', 'mint', 'Areas chosen', 'One small facial area, or several large body areas in a session.'],
            ['calendar', 'violet', 'Length of the course', 'Often six or more; facial and hormone-related hair tends to need extra sessions.'],
            ['clock', 'sky', 'Top-ups later', 'Ask how maintenance sessions are charged if some hair returns.'],
        ],
        'links' => [
            '/laser-hair-removal-in-gurgaon#expectations' => 'What affects laser cost',
            '/cost-and-emi-options'                       => 'Paying in instalments',
        ],
    ],

    'related' => [
        '/laser-hair-removal-in-gurgaon'                => 'Laser hair removal in Gurgaon',
        '/skin-treatment-in-gurgaon'                    => 'Pigmentation and acne care',
        '/blog/laser-hair-removal-for-pcos-facial-hair' => 'PCOS and facial hair',
    ],

    'area' => [
        'lead'            => 'Your skin tone and hair colour are checked first to see whether laser suits them, and a small test spot is usually treated before a full session. A course aims to reduce hair, not to clear every hair for good.',
        'feats'           => [['user', 'Doctor examines skin and hair'], ['shield', 'Test spot usually first'], ['calendar', 'Sessions weeks apart']],
        'heading'         => 'Laser Hair Removal for People From {area}',
        'visits_line'     => 'A laser course means several trips, and all of them — the first assessment, the test spot and every session — are to our clinic in Sector 39, Gurugram.',
        'day_heading'     => 'Before and After Each Session',
        'day'             => 'Shave the treatment area shortly before the visit, usually the day before, and for underarms leave off deodorant that day. Treated skin is usually pink and bumpy for a day or two, so plan a quiet evening after the drive back to {area}: no workout, steam or long spell in the Gurugram heat, and sunscreen or cover on anything the sun reaches.',
        'visits_intro'    => 'After the assessment and test spot, the general pattern is a session every four to six weeks for facial areas and every six to eight weeks or more for the body, often six or more in all; your own spacing is set at the assessment. A course from {area} therefore spans several months, with every visit in Sector 39, Gurugram.',
        'visit_icons'     => [['search', 'Assessment and Test Spot'], ['calendar', 'Face: Every 4–6 Weeks'], ['clock', 'Body: Every 6–8+ Weeks'], ['shield', 'Sun Care Between Sessions']],
        'options_heading' => 'Laser, Skin Tone and Hair Colour',
        'options_html'    => 'A hair’s dark pigment soaks up the laser light, which becomes heat at the root and weakens its ability to regrow. Dark, coarse hair is therefore the most dependable target, while grey, white, red and blonde hairs carry too little pigment to respond well; electrolysis, which works without pigment, is an alternative for them. Many people with darker skin can be treated, with a wavelength chosen for their skin, cautious settings, a test spot first and strict sun protection. More on the <a href="{parent}">laser hair removal in Gurgaon</a> page.',
        'cost_heading'    => 'What Decides the Cost of a Laser Course',
        'cost_intro'      => 'The cost depends on which areas you want treated and how many sessions your hair is likely to take, and both only become clear once the doctor has seen your skin and hair. Ask at the consultation whether spreading the cost through a third-party lender’s instalment plan is an option.',
        'faqs'            => [
            ['q' => 'Can I have laser in {area}, or only in Sector 39?',
             'a' => 'Only in Sector 39, as {area} has no DenceSpot clinic. The assessment, the test spot and every session are at our Gurugram clinic on Sector 39 Road, Jharsa, opposite Medanta – The Medicity.'],
            ['q' => 'What is the route from {area} to the clinic?',
             'a' => '{route} The Directions button gives the route from wherever you set off.'],
            ['q' => 'How many sessions, and so trips from {area}, should I expect?',
             'a' => 'Expect to come once for the assessment and test spot, and then for each session: often six or more, roughly every four to six weeks for facial areas and six to eight weeks or more for the body. Small shifts in the dates do little harm, but long breaks hold the course back, so choose days you can keep. An occasional maintenance session may come later.'],
            ['q' => 'Will I pay more because I travel from {area}?',
             'a' => 'No. The price follows the areas treated and the sessions they need, not your address. See <a href="/cost-and-emi-options">cost and EMI options</a> for how paying in instalments generally works.'],
            ['q' => 'Will laser work on my skin and hair?',
             'a' => 'That depends on the contrast between them. Dark, coarse hair is what laser picks up most easily; hair that is grey, white, red or blonde lacks the pigment it needs and seldom responds. On darker skin, burns and colour change are more likely, so the doctor proceeds more carefully, starting with a test spot. Facial hair linked to PCOS can be reduced, but the hormonal cause needs its own care; see <a href="/blog/laser-hair-removal-for-pcos-facial-hair">laser and PCOS facial hair</a>.'],
            ['q' => 'Does a tan or a wedding change the timing?',
             'a' => 'Both can. Tanned skin soaks up more of the laser’s energy, so it burns or changes colour more easily, and a fresh tan may mean postponing a session; keeping treated skin covered or under sunscreen helps avoid that. With a wedding or function coming up, leave a few clear days after a session for redness and bumps to calm down.'],
            ['q' => 'Is it worth sending photos before travelling from {area}?',
             'a' => 'Yes. A daylight photo of your face, arms or legs shows how dark and dense the hair is, which helps the clinic suggest an appointment. Please describe intimate areas in words rather than photographing them. Whether laser suits your skin is still decided at the clinic.'],
        ],
        'consult_intro'   => 'Choose a day for a laser assessment in Sector 39. You will hear plainly whether your hair colour and skin tone suit laser, roughly how many sessions each area may take and how to prepare for the first one. Booking the course itself can wait until you have thought it over.',
        'descriptions'    => [
            'Laser hair removal for {area} at DenceSpot’s Sector 39 clinic, Gurugram: the test spot, sessions per area, Indian skin types, cost and FAQs.',
            'Laser hair removal for {area} at DenceSpot, Sector 39, Gurugram: test spot, sessions, cost and FAQs.',
            'Laser hair removal for {area} at DenceSpot, Gurugram: sessions, cost and FAQs.',
        ],
    ],
];
