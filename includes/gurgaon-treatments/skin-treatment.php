<?php
/**
 * Copy for the Gurugram skin treatment area pages, /skin-treatment-in-<area>
 * (schema: includes/gurgaon-treatment-area-page.php). Facts as on
 * /skin-treatment-in-gurgaon, written fresh: only the concerns and kinds of
 * treatment that page lists, with in-clinic procedures left unnamed (the list
 * is not on record). Skin family: links go to skin pages and blog posts. No
 * prices, products, brands or doctor named; the Gurugram clinic only.
 */

declare(strict_types=1);

return [
    'form_treatment' => 'Skin care',
    'form'           => ['Acne or breakouts', 'Acne marks or pitted scars', 'Melasma or dark patches', 'Dull or uneven skin', 'Dry, sensitive or red skin', 'Ingrown hairs or razor bumps', 'Not sure — please advise'],
    'faq_about'      => 'skin, health or budget',
    'results'        => false,

    'middle' => [
        'heading' => 'What to Bring to Your First Visit',
        'sub'     => 'Each one helps the doctor pin down the cause.',
        'cols'    => ['Bring or mention', 'Why it matters'],
        'rows'    => [
            ['Every product you use', 'One may be the culprit'],
            ['Creams from a chemist', 'Some contain strong steroids'],
            ['Past prescriptions, reports', 'Shows what has been tried'],
            ['Medicines and supplements', 'Some affect the skin'],
            ['Pregnancy or breastfeeding', 'Rules some options out'],
            ['A bare face, if possible', 'The pattern is a clue'],
        ],
        'note'    => 'If you use a steroid cream, mention it rather than dropping it overnight: a sudden stop can cause a flare, and the doctor plans how to taper it.',
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'From First Look to Maintenance: A Skin Plan',
        'intro'     => 'A skin plan runs in five stages at the Gurugram clinic. Skin changes slowly, so the visits after the first matter as much as the first.',
        'items'     => [
            ['chat', 'Your Story', 'When the problem began, what sets it off, and the washes, creams and medicines already tried on it.'],
            ['search', 'Close Examination', 'The skin checked in good light, at times magnified, to tell one kind of acne, mark or patch from another.'],
            ['doc', 'Plan on Paper', 'Prescriptions, products to drop, side effects likely in the first weeks and a return date, all written down.'],
            ['shield', 'Early Check', 'A short visit a few weeks in, so anything your skin is not tolerating can be adjusted.'],
            ['calendar', 'Maintenance', 'Once the first course ends, a lighter routine and occasional reviews for concerns that persist, like acne and melasma.'],
        ],
        'note_html' => 'Reading up before you come? See <a href="/blog/acne-scars-treatment-options">how flat marks differ from pitted scars</a> and <a href="/blog/melasma-causes-and-treatment">what drives melasma</a>.',
    ],

    'cost' => [
        'factors' => [
            ['search', 'mint', 'Your concern', 'Some, such as melasma, need maintenance after the first course.'],
            ['doc', 'violet', 'What you use at home', 'Prescribed creams or tablets and a daily sunscreen.'],
            ['settings', 'sky', 'Any in-clinic procedure', 'Only if suitable, with its own written quote first.'],
        ],
        'links' => [
            '/skin-treatment-in-gurgaon#options' => 'What a skin plan can include',
            '/cost-and-emi-options'              => 'Payment and EMI',
        ],
    ],

    'related' => [
        '/skin-treatment-in-gurgaon'     => 'Skin treatment in Gurgaon',
        '/face-prp-treatment-in-gurgaon' => 'Face PRP and its limits',
        '/laser-hair-removal-in-gurgaon' => 'Laser hair removal',
    ],

    'area' => [
        'lead'            => 'There, the skin is examined and the cause worked out before anything is prescribed, and you leave with a written plan that includes your review dates.',
        'feats'           => [['search', 'Examined before prescribing'], ['doc', 'Written plan to take home'], ['calendar', 'Reviews booked from the start']],
        'heading'         => 'Acne, Melasma and Skin Care for {area}',
        'visits_line'     => 'The consultation, every review visit and any in-clinic treatment take place at our clinic in Sector 39, Gurugram.',
        'day_heading'     => 'Before Your Consultation',
        'day'             => 'Come from {area} without makeup if you can, so the spots or patches show clearly. If your commute is a long daily drive, say so: car windows let through some of the sunlight that darkens melasma. A consultation leaves the rest of your day free.',
        'visits_intro'    => 'Plan on a consultation first and a short follow-up a few weeks into treatment. Acne treatment gets a proper review at around two to three months, pigmentation later, and concerns that persist move on to occasional maintenance visits — every one of them in Sector 39, Gurugram.',
        'visit_icons'     => [['search', 'Diagnosis at the First Visit'], ['shield', 'Follow-Up a Few Weeks In'], ['chart', 'Acne Reviewed at 2–3 Months'], ['calendar', 'Occasional Maintenance Visits']],
        'options_heading' => 'What a Skin Plan May Include',
        'options_html'    => 'For most concerns the work is done by prescription creams or gels, tablets when acne is moderate, severe or leaving scars, sunscreen every morning and fewer products overall. Where a procedure in the clinic could help, it is raised once the diagnosis is clear and added to medical treatment, never swapped for it. The <a href="{parent}">skin treatment in Gurgaon</a> page goes through each concern in turn.',
        'cost_heading'    => 'How a Skin Plan Is Costed',
        'cost_intro'      => 'No flat fee is published: a plan built on prescriptions and reviews is priced differently from one that adds an in-clinic procedure. You hear what your plan is likely to cost after the examination, and a procedure comes with a written quote before any date is fixed.',
        'faqs'            => [
            ['q' => 'Do I see the doctor in {area}?',
             'a' => 'No. Patients from {area} see the doctor at our Gurugram clinic on Sector 39 Road, Jharsa, opposite Medanta – The Medicity, since there is no DenceSpot clinic in {area} itself; review visits are held there as well.'],
            ['q' => 'Which way do I come from {area}?',
             'a' => '{route} For directions from your own address, the Directions button opens the clinic in Google Maps.'],
            ['q' => 'How often will I travel in from {area}?',
             'a' => 'Expect a consultation, then a short follow-up a few weeks into treatment. Acne treatment gets a proper review at around two to three months, while pigmentation is judged later; melasma and acne that persist then need only occasional visits. Your review dates go into the written plan.'],
            ['q' => 'Is there a different fee for people coming from {area}?',
             'a' => 'No. What you pay is set by your diagnosis and the contents of your plan, not by where you live. If you would like to spread the cost, ask at the consultation whether instalments through a third-party lender are available, and see <a href="/cost-and-emi-options">cost and EMI options</a>.'],
            ['q' => 'Does the Gurugram sun affect skin treatment?',
             'a' => 'Yes, quite a lot. Strong sun darkens melasma and the marks acne leaves, and many acne and pigmentation treatments make skin burn more easily. So sunscreen is part of nearly every plan: on each morning, even when the sky is hazy with smog, and topped up after long spells outdoors or heavy sweating.'],
            ['q' => 'What should I do about a reaction at home in {area}?',
             'a' => 'For blistering, swelling, a spreading rash, or skin turning clearly darker or lighter, call or WhatsApp the clinic the same day, without waiting for the next review date. Some dryness, peeling or stinging is common while skin gets used to a new cream, and the doctor may suggest spacing out the applications.'],
            ['q' => 'Will WhatsApp photos from {area} do instead of a visit?',
             'a' => 'They help, but cannot replace one. Unfiltered daylight photos with no makeup help the clinic work out which appointment to offer you, but nothing can be diagnosed or prescribed until your skin has been examined in person.'],
        ],
        'consult_intro'   => 'Pick a day for a skin consultation at the Gurugram clinic. After examining your skin, the doctor tells you in plain words what is going on and gives you a written plan with a realistic timeline, including what treatment is unlikely to change. No procedure is booked unless you decide on one.',
        'descriptions'    => [
            'Skin treatment for {area}: acne, melasma and pigmentation assessed at DenceSpot’s Sector 39 clinic, Gurugram, with visits, cost and FAQs.',
            'Skin treatment for {area} at DenceSpot, Sector 39, Gurugram: acne, melasma, visits, cost and FAQs.',
            'Skin treatment for {area} at DenceSpot, Gurugram: acne, melasma, cost and FAQs.',
        ],
    ],
];
