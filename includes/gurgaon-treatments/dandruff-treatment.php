<?php
/**
 * Copy for the Gurugram dandruff area pages, /dandruff-treatment-in-<area>
 * (schema: includes/gurgaon-treatment-area-page.php). Facts as on
 * /dandruff-treatment-in-gurgaon and /blog/hard-water-pollution-and-hair-fall-in-gurgaon,
 * written fresh. Treatment by ingredient class, never by brand; no prices;
 * the Gurugram clinic only.
 */

declare(strict_types=1);

return [
    'form_treatment' => 'Hair fall treatment',
    'form'           => ['Dandruff or flaking scalp', 'Itchy or sore scalp', 'Flaking plus hair fall', 'Hair fall treatment', 'Not sure — please advise'],
    'faq_about'      => 'scalp, products or hair fall',
    'results'        => false,

    'middle' => [
        'heading' => 'Dandruff or Dry Scalp?',
        'sub'     => 'Patterns worth noticing, for patient education; the examination decides.',
        'cols'    => ['Leans towards dandruff', 'Leans towards dry scalp'],
        'rows'    => [
            ['Large, greasy flakes with a yellow tint', 'Tiny, dry, white flakes'],
            ['Red, itchy skin under the flakes', 'Scalp skin barely red'],
            ['Flares when the scalp gets greasy', 'Flares in the cold, dry months'],
            ['May show on brows and beside the nose', 'Body skin tends to be dry as well'],
            ['Heavy oiling tends to aggravate it', 'Needs a different routine'],
        ],
        'note'    => 'Gurugram’s hard water can leave a coated, itchy feel that is easily mistaken for flaking, another reason the scalp is examined first.',
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'How a Flaky Scalp Is Assessed and Controlled',
        'intro'     => 'Five stages in Sector 39, ending with a plan for the next flare rather than a one-off fix.',
        'items'     => [
            ['chat', 'History', 'How long it has gone on, whether it changes with the season, the products and dyes used, and whether hair is falling too.'],
            ['search', 'Close Examination', 'The hair parted in several places to see the scale, redness and edges that separate one condition from another.'],
            ['shield', 'Ruling Out Mimics', 'Psoriasis, fungal infection, a reaction to a product and scarring conditions considered before dandruff is confirmed.'],
            ['settings', 'Routine and Contact Time', 'Which shampoo, how often and how long it stays on the scalp, plus any prescribed preparation.'],
            ['calendar', 'Review and Maintenance', 'A check on progress, a lighter routine once things settle, and clear steps for when it returns.'],
        ],
        'note_html' => 'Worth reading: <a href="/blog/can-dandruff-cause-hair-fall">whether dandruff causes hair fall</a> and <a href="/blog/hard-water-pollution-and-hair-fall-in-gurgaon">what hard water does to hair in Gurgaon</a>.',
    ],

    'cost' => [
        'factors' => [
            ['search', 'mint', 'What the scalp has', 'Mild flaking is usually a shorter plan than a condition that needs prescribed treatment.'],
            ['doc', 'violet', 'Prescribed preparations', 'Added only when inflammation warrants it, and for a defined period.'],
            ['list', 'sky', 'A separate hair question', 'If hair loss is present as well, it is assessed and priced in its own right.'],
        ],
        'links' => [
            '/cost-and-emi-options' => 'Cost and payment options',
        ],
    ],

    'related' => [
        '/dandruff-treatment-in-gurgaon'                    => 'Dandruff treatment in Gurgaon',
        '/hair-fall-treatment-in-gurgaon'                   => 'When hair fall is a separate issue',
        '/womens-hair-loss-treatment-in-gurgaon'            => 'Thinning hair in women',
        '/blog/can-dandruff-cause-hair-fall'                => 'Does dandruff cause hair fall?',
        '/blog/hard-water-pollution-and-hair-fall-in-gurgaon' => 'Hard water and your scalp',
    ],

    'area' => [
        'lead'            => 'There, the scalp is examined with the hair parted before any shampoo is chosen, to tell dandruff from dry scalp, psoriasis, a fungal infection or a product reaction, and to check whether any hair fall is a separate problem.',
        'feats'           => [['search', 'Scalp checked, not guessed'], ['list', 'Flakes and hair fall separated'], ['clock', 'Contact time explained']],
        'heading'         => 'Flaking and Itching: Scalp Care for {area}',
        'visits_line'     => 'The scalp examination and the review visit both take place in Sector 39, Gurugram.',
        'day_heading'     => 'Before You Set Out',
        'day'             => 'Before leaving {area}, jot down how long the flaking has gone on, whether it changes with the season, every shampoo or scalp product you have tried and any recent dye or chemical treatment. The appointment is a conversation and a close look at the scalp, so the rest of your day is not disrupted.',
        'visits_intro'    => 'An examination to set your routine and a review to check how the scalp has responded and plan for flares; anything more depends on what the examination finds.',
        'visit_icons'     => [['search', 'Scalp Examined With Hair Parted'], ['settings', 'Shampoo Use Explained'], ['calendar', 'Review and Flare Plan'], ['list', 'Hair Fall Looked at Separately']],
        'options_heading' => 'What Controls Dandruff at the Gurugram Clinic',
        'options_html'    => 'Medicated shampoos chosen by active ingredient do most of the work: antifungal, zinc or selenium, tar, or scale-lifting preparations, sometimes rotated. They are massaged into the scalp and left on for the time the product states before rinsing, which is where most routines go wrong. A prescribed anti-inflammatory preparation may be added for a set period if the scalp is very inflamed, and because flares are common with seasonal change and stressful spells at work, a maintenance plan comes with it. More on the <a href="{parent}">dandruff treatment in Gurgaon</a> page.',
        'cost_heading'    => 'What Goes Into the Cost of Dandruff Care',
        'cost_intro'      => 'This is usually one of the smaller plans the clinic draws up. Most people need the examination, a medicated shampoo routine and a review, with a prescribed preparation only if inflammation calls for it. Any hair loss that needs its own assessment is quoted on its own.',
        'faqs'            => [
            ['q' => 'Where are people from {area} examined?',
             'a' => 'Patients from {area} come to the Sector 39 clinic, DenceSpot’s only one in Gurugram, which stands on Sector 39 Road in Jharsa facing Medanta – The Medicity. The examination and the review both happen there.'],
            ['q' => 'How do I get to Sector 39 from {area}?',
             'a' => '{route} Use the Directions button for your own route, or ask the clinic on WhatsApp.'],
            ['q' => 'Is Gurugram’s hard water causing my flakes?',
             'a' => 'Not directly. Dandruff mostly comes from the scalp reacting to Malassezia, a yeast present on all human skin, together with the oil the scalp produces. Mineral and product residue from hard water can make a scalp feel itchy or look flaky, though, and the two are easily confused. See <a href="/blog/hard-water-pollution-and-hair-fall-in-gurgaon">hard water and hair in Gurgaon</a>.'],
            ['q' => 'Does dandruff make hair fall out?',
             'a' => 'It does not cause pattern baldness. An inflamed, itchy scalp can shed more for a while, partly through scratching, and that usually settles along with the scalp. If shedding continues afterwards, or your parting is widening, that is a separate question and is assessed as one; see <a href="/hair-fall-treatment-in-gurgaon">hair fall treatment</a>.'],
            ['q' => 'Why does my anti-dandruff shampoo seem not to work?',
             'a' => 'Often it is the way it is used rather than the product. The active ingredient needs time on the scalp, so it should be worked in with the fingertips and left for the period on the label before rinsing. If proper use still changes nothing, the diagnosis is worth checking, as it may not be dandruff at all.'],
            ['q' => 'Do I need to come back from {area} after the first visit?',
             'a' => 'Usually once, for a review when the routine has been followed for a while, to check the response and agree how to step it down and what to do at the next flare. More visits are needed only if the scalp turns out to need closer follow-up.'],
            ['q' => 'Will treatment cost more because I live in {area}?',
             'a' => 'No. The figure depends on what your scalp needs rather than where you live, and the doctor goes through it with you once the scalp has been seen. Payment methods are on the <a href="/cost-and-emi-options">cost and EMI page</a>.'],
        ],
        'consult_intro'   => 'Choose a day for a scalp examination in Sector 39. You leave knowing what the flaking actually is, how to use the shampoo so it can work, what to do when it comes back, and whether your hair needs looking at separately.',
        'descriptions'    => [
            'Dandruff treatment for {area} at DenceSpot’s Sector 39 clinic, Gurugram: scalp examination, look-alikes, shampoo use, visits, cost and FAQs.',
            'Dandruff treatment for {area} at DenceSpot, Sector 39, Gurugram: scalp checks, cost and FAQs.',
            'Dandruff treatment for {area} at DenceSpot Gurugram: scalp checks and FAQs.',
        ],
    ],
];
