<?php
/**
 * Copy for the Gurugram GFC area pages, /gfc-treatment-in-<area>
 * (schema: includes/gurgaon-treatment-area-page.php). Facts as on
 * /gfc-treatment-in-gurgaon and /prp-hair-treatment-cost-in-gurgaon, written
 * fresh. Position kept: a processing variant of PRP, never sold as an upgrade.
 * No prices, no concentration figures, no kit names; the Gurugram clinic only.
 */

declare(strict_types=1);

return [
    'form_treatment' => 'Hair PRP / GFC',
    'form'           => ['GFC treatment', 'GFC or PRP — please advise', 'Hair PRP treatment', 'After a hair transplant', 'Not sure — please advise'],
    'faq_about'      => 'diagnosis, medicines or budget',
    'results'        => false,

    'middle' => [
        'heading' => 'GFC: What Can and Cannot Be Claimed',
        'sub'     => 'Where the evidence stands, in brief.',
        'cols'    => ['Statement', 'Fair to say?'],
        'rows'    => [
            ['Processed one step beyond PRP', 'Yes'],
            ['Taken from your own blood', 'Yes'],
            ['Offered for the same kinds of thinning', 'Yes'],
            ['Grows more hair than PRP', 'Not shown'],
            ['Effective after PRP gave no change', 'Not shown'],
            ['A shorter course than PRP', 'Not shown'],
            ['A longer-lasting benefit', 'Not shown'],
        ],
        'note'    => 'A bigger growth factor number on a brochure measures the preparation; it is not evidence of a better result for your hair.',
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'GFC at the Gurugram Clinic, Step by Step',
        'intro'     => 'Five stages. No blood is drawn and nothing is injected until the reason for your thinning is clear.',
        'items'     => [
            ['search', 'Diagnosis', 'What you have noticed, what you take, and an examination of the scalp, with blood tests where iron, thyroid or hormones may be involved.'],
            ['camera', 'Baseline Photographs', 'Standard views of the scalp before the first session, so any later change is measured rather than guessed.'],
            ['heart', 'Processing', 'A blood sample is worked up in the clinic until the growth factors are released and the cells are taken out.'],
            ['settings', 'Injections', 'The concentrate goes in at follicle depth across the thinning zones; the whole visit takes under an hour.'],
            ['chart', 'Review', 'Photographs are set against the baseline over several months. Where nothing has changed, the course is not simply extended; the plan is rethought.'],
        ],
        'note_html' => 'How GFC sits beside PRP and newer injectables is covered in <a href="/blog/prp-vs-gfc-vs-exosomes">PRP, GFC and exosomes compared</a>; the tests that rule out other causes are in <a href="/blog/blood-tests-for-hair-fall">blood tests for hair fall</a>.',
    ],

    'cost' => [
        'factors' => [
            ['calendar', 'mint', 'Length of the course', 'Planned from your diagnosis, then adjusted by how you respond.'],
            ['chart', 'violet', 'Spread of the thinning', 'One defined zone is a smaller job than the whole top of the scalp.'],
            ['doc', 'sky', 'Treatment alongside', 'Medical treatment usually runs with GFC and is listed on its own line.'],
        ],
        'links' => [
            '/prp-hair-treatment-cost-in-gurgaon' => 'PRP and GFC pricing in Gurgaon',
            '/cost-and-emi-options'               => 'Payment and EMI options',
        ],
    ],

    'related' => [
        '/gfc-treatment-in-gurgaon'       => 'GFC treatment in Gurgaon',
        '/hair-prp-treatment-in-gurgaon'  => 'Hair PRP treatment',
        '/hair-fall-treatment-in-gurgaon' => 'Hair fall treatment',
        '/blog/prp-vs-gfc-vs-exosomes'    => 'PRP, GFC or exosomes?',
    ],

    'area' => [
        'lead'            => 'GFC is offered there as one option within the PRP family rather than as an upgrade on it, and only once an examination shows follicles that are still worth supporting.',
        'feats'           => [['scale', 'No upgrade claims'], ['heart', 'From your own blood'], ['chart', 'Measured on photographs']],
        'heading'         => 'GFC for Hair: A Guide for Patients From {area}',
        'visits_line'     => 'Every step of a GFC course, from the blood sample and its processing to the injections and each photographed review, takes place at our Sector 39 clinic.',
        'day_heading'     => 'Planning the Trip for a Session',
        'day'             => 'A blood sample is part of every visit, so set out from {area} after a normal meal rather than on an empty stomach. The visit runs to under an hour and most people carry on with work afterwards; the scalp may stay sore to the touch until the next day, and the gym, steam room and pool wait for a short while.',
        'visits_intro'    => 'Expect a first visit for diagnosis alone. If GFC suits you, sessions follow some weeks apart, and progress is judged against photographs over several months. Every visit is to the same clinic in Sector 39, Gurugram.',
        'visit_icons'     => [['search', 'Diagnosis Before Any Blood Draw'], ['calendar', 'Sessions Some Weeks Apart'], ['user', 'Under an Hour, Then Back to Work'], ['camera', 'Progress Judged on Photographs']],
        'options_heading' => 'GFC and PRP: Same Source, Different Preparation',
        'options_html'    => 'The difference is one processing step. For GFC, the platelets in your blood sample are made to give up their growth factors while still in the clinic, and the cells are then taken out; PRP leaves that release to happen inside the scalp after injection. So the injected material is not the same, but the research so far has not shown that this leads to more hair. The evidence is set out on the <a href="{parent}">GFC treatment in Gurgaon</a> page.',
        'cost_heading'    => 'Paying for GFC: How the Quote Is Built',
        'cost_intro'      => 'GFC is charged per session, but the number that matters is the whole course, which depends on your diagnosis. It is worked out after the examination and given to you in writing. Wherever GFC is quoted above PRP, ask what the difference pays for, since a better result has not been shown.',
        'faqs'            => [
            ['q' => 'Is GFC given anywhere in {area}?',
             'a' => 'No. There is no DenceSpot clinic in {area}, so patients from there come to Sector 39, Gurugram for the whole course, from the first examination through each blood sample, its processing and the injections to every review, all at the one site opposite Medanta – The Medicity.'],
            ['q' => 'What is the simplest way to the clinic from {area}?',
             'a' => '{route} On a first visit, leave some margin for Gurugram traffic so the session is not rushed.'],
            ['q' => 'How many trips from {area} does a GFC course involve?',
             'a' => 'One for the diagnosis, then one for each session, spaced some weeks apart, and later visits for photographed reviews over several months. The number of sessions comes from your diagnosis and is adjusted by your response, so you can plan the early dates and let the review settle the rest.'],
            ['q' => 'Will I pay more for GFC because I live in {area}?',
             'a' => 'No. Your address has no bearing on the quote, which follows the course planned for you. GFC is often priced above PRP; <a href="/prp-hair-treatment-cost-in-gurgaon">PRP and GFC pricing in Gurgaon</a> explains why a premium for an unproven advantage deserves questions.'],
            ['q' => 'Is GFC simply a stronger PRP?',
             'a' => 'It is often sold as one, usually with an impressive growth factor figure attached. A richer preparation has not been shown to produce more hair: the GFC research is newer and much thinner than PRP’s, with few direct comparisons. Choosing GFC is reasonable; paying a premium for an upgrade nobody has demonstrated is a different matter.'],
            ['q' => 'Who is GFC not suitable for?',
             'a' => 'It is postponed or not offered with an infected or inflamed scalp, certain blood and clotting disorders, some cancers, or medicines affecting platelets or clotting that have not been reviewed; pregnancy and breastfeeding are considered individually. It cannot help where the scalp is already bald, and it waits while a cause such as low iron or a thyroid problem is treated.'],
            ['q' => 'Can I plan GFC sessions from {area} around summer and festivals?',
             'a' => 'Yes. Heavy exercise, steam and pools are skipped for a short while after each session, so in the hot months a quiet evening at home suits more than an outdoor plan. If you ride a two-wheeler, the helmet may rub on the sore injection sites until the next day. Around Diwali and the wedding season, fix dates early so the planned spacing between sessions holds.'],
        ],
        'consult_intro'   => 'Pick a day to come to Sector 39. The doctor checks your scalp, searches for anything treatable behind the thinning and tells you frankly whether GFC, PRP or neither makes sense for you. You are free to go away and think it over.',
        'descriptions'    => [
            'GFC hair treatment for patients from {area} at DenceSpot’s Sector 39 clinic, Gurugram: how it differs from PRP, sessions, cost and FAQs.',
            'GFC for {area} at DenceSpot, Sector 39, Gurugram: GFC vs PRP, sessions, cost and FAQs.',
            'GFC for {area} at DenceSpot, Gurugram: GFC vs PRP, cost and FAQs.',
        ],
    ],
];
