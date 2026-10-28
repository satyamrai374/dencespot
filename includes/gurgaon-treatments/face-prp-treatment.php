<?php
/**
 * Copy for the Gurugram face PRP area pages, /face-prp-treatment-in-<area>
 * (schema: includes/gurgaon-treatment-area-page.php). Facts as on
 * /face-prp-treatment-in-gurgaon, written fresh, with its limits: a modest,
 * gradual treatment for skin quality on limited evidence (as
 * /skin-treatment-in-gurgaon puts it); no lift, no volume, not for active
 * acne. No session counts, prices, devices, before/after photos or doctor
 * named. Skin family: links go to skin pages and blog posts. The Gurugram
 * clinic only.
 */

declare(strict_types=1);

return [
    'form_treatment' => 'Skin care',
    'form'           => ['Face PRP', 'Face PRP with microneedling', 'Texture, fine lines or dull skin', 'Acne, marks or pigmentation', 'Not sure — please advise'],
    'faq_about'      => 'skin, medicines or plans',
    'results'        => false,

    'middle' => [
        'heading' => 'Fitting a Session Into Your Week',
        'sub'     => 'General guidance; your own aftercare advice comes first.',
        'cols'    => ['When', 'What to allow for'],
        'rows'    => [
            ['Rest of the day', 'No makeup, as advised'],
            ['Next day or two', 'Redness, mild swelling'],
            ['Injection points', 'Pinpoint bruises that fade'],
            ['For a short time', 'No sun, steam or hard workouts'],
            ['Acids and retinoids', 'Paused, then restarted'],
            ['Any visible change', 'Gradual, over weeks to months'],
        ],
        'note'    => 'If a wedding or family function is on the calendar, keep several clear days between it and a session, not just one evening.',
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'How Face PRP Is Given at the Gurugram Clinic',
        'intro'     => 'Five stages in Sector 39. Each review decides whether another session is worth having.',
        'items'     => [
            ['chat', 'What Bothers You', 'You explain what you want to change and your skin is examined; if PRP cannot address it, you are told so.'],
            ['heart', 'Health Check', 'Medicines (especially any affecting clotting), blood or platelet conditions and any infection or inflammation where PRP would go are checked first.'],
            ['camera', 'Baseline Photos', 'Your face photographed under set lighting and from set angles, kept as the yardstick for later reviews.'],
            ['settings', 'Session', 'A small blood sample is spun to concentrate the platelets; after numbing, the plasma goes into the skin by injection or onto freshly needled skin.'],
            ['chart', 'Review', 'Fresh photographs set beside the baseline. If nothing has changed you can stop there; maintenance is raised only when there is a result to keep.'],
        ],
        'note_html' => 'If acne, marks or melasma bother you most, PRP is the wrong starting point, since it does not treat active acne or lift pigmentation by itself; <a href="/skin-treatment-in-gurgaon">skin treatment in Gurgaon</a> explains what is used instead.',
    ],

    'cost' => [
        'factors' => [
            ['calendar', 'mint', 'How many sessions', 'Set at assessment, with photographs deciding whether the course carries on.'],
            ['list', 'violet', 'Area of the face', 'The whole face, or only the regions that concern you.'],
            ['settings', 'sky', 'With microneedling or not', 'When the two are combined, the cost reflects both.'],
        ],
        'links' => [
            '/face-prp-treatment-in-gurgaon#cost' => 'Face PRP cost in Gurgaon',
            '/cost-and-emi-options'               => 'Cost and payment options',
        ],
    ],

    'related' => [
        '/face-prp-treatment-in-gurgaon'     => 'Face PRP treatment in Gurgaon',
        '/skin-treatment-in-gurgaon'         => 'Acne, melasma and pigmentation care',
        '/blog/acne-scars-treatment-options' => 'Flat marks versus scars',
        '/blog/melasma-causes-and-treatment' => 'Melasma and sun protection',
    ],

    'area' => [
        'lead'            => 'The first visit settles whether PRP suits what bothers you. Its realistic territory is skin texture, fine lines and dullness; lifting, volume and active acne are outside it.',
        'feats'           => [['scale', 'Modest claims, plainly made'], ['camera', 'Standardised photographs'], ['heart', 'Made from your own blood']],
        'heading'         => 'Face PRP for {area}: What It Can and Cannot Do',
        'visits_line'     => 'Everything in a face PRP course, from the assessment to the final review photograph, happens at our clinic in Sector 39, Gurugram.',
        'day_heading'     => 'Around Each Session',
        'day'             => 'Your face is likely to look red and slightly puffy on the way back to {area}, sometimes with tiny bruises where the needle went in; this usually settles within a day or two. Leave makeup off for the rest of the day as advised, and keep out of strong sun, steam rooms and the gym for a short while.',
        'visits_intro'    => 'The first visit covers the assessment and baseline photographs. Sessions then follow some weeks apart, their number set for your skin, and photographs at review decide whether the course carries on. All of it happens in Sector 39, Gurugram.',
        'visit_icons'     => [['search', 'Assessment and Baseline Photos'], ['calendar', 'A Planned Course of Sessions'], ['clock', 'A Day or Two of Redness'], ['chart', 'Reviewed Against the Baseline']],
        'options_heading' => 'How the Plasma Reaches Your Skin',
        'options_html'    => 'After a numbing preparation, PRP goes in one of two ways: injected into the parts of the face being treated, or spread over freshly microneedled skin, where the fine punctures let it in. Which suits you is settled at assessment. The evidence for face PRP is limited, and any change is gradual and modest, which is why it is judged on standardised photographs. Read more on the <a href="{parent}">face PRP treatment in Gurgaon</a> page.',
        'cost_heading'    => 'Paying for Face PRP',
        'cost_intro'      => 'Face PRP is charged by the session. The number of sessions is planned at your assessment and the quote is put in writing, rather than a package being sold before anyone has looked at your skin.',
        'faqs'            => [
            ['q' => 'Is face PRP available in {area}?',
             'a' => 'Not in {area} itself, as DenceSpot has no clinic there. Your assessment, sessions and reviews all take place at our Gurugram clinic on Sector 39 Road, Jharsa, opposite Medanta – The Medicity.'],
            ['q' => 'How do I get to Sector 39 from {area}?',
             'a' => '{route} If you would like help with the last stretch, message the clinic on WhatsApp.'],
            ['q' => 'How many visits should I plan for from {area}?',
             'a' => 'The first trip covers the assessment and baseline photographs; after that you come in for each session, spaced some weeks apart, with a review partway. Because the number of sessions is planned for your skin at the assessment, you know roughly how many journeys are involved before you commit.'],
            ['q' => 'Do patients from {area} pay a different rate?',
             'a' => 'No. The quote depends on the number of sessions, the areas of the face and whether microneedling is added, not on where you live. See <a href="/face-prp-treatment-in-gurgaon#cost">face PRP cost in Gurgaon</a>.'],
            ['q' => 'How well does face PRP work?',
             'a' => 'Modestly, and not for everyone: the evidence behind it is limited. Where it helps, texture, fine lines and dullness change slowly over weeks to months. Sagging, hollows, deep folds and active acne are beyond it. Because mirror checks are swayed by lighting, progress is judged on standardised photographs.'],
            ['q' => 'Could a health condition rule face PRP out?',
             'a' => 'Yes. A blood, platelet or clotting disorder, some cancers, or infection or inflammation where the plasma would go can each mean PRP is not given. If you take anything that affects clotting, bring its name to the assessment so it can be reviewed first. Pregnancy and breastfeeding are weighed individually.'],
            ['q' => 'What can photos sent from {area} tell the clinic?',
             'a' => 'Enough to flag an obvious mismatch. A few unfiltered daylight photos, with a line on what bothers you, let the clinic tell you early if PRP is clearly the wrong tool; a final answer on suitability needs your skin examined in person.'],
        ],
        'consult_intro'   => 'The first step is a face PRP assessment in Sector 39; come with a clear idea of what you would like changed. If PRP is a reasonable fit, you leave with a planned course and a written quote; if it is not, you are told what is more likely to help.',
        'descriptions'    => [
            'Face PRP treatment for {area} at DenceSpot’s Sector 39 clinic, Gurugram: what it may help, what it will not, downtime, cost and FAQs.',
            'Face PRP for {area} at DenceSpot, Sector 39, Gurugram: limits, downtime, cost and FAQs.',
            'Face PRP for {area} at DenceSpot, Gurugram: limits, cost and FAQs.',
        ],
    ],
];
