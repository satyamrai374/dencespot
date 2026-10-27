<?php
/**
 * Copy for /skin-treatment-in-delhi and its area pages (schema:
 * includes/delhi-treatment-pillar.php). Facts as on /skin-treatment-in-rohini,
 * written fresh: only the concerns that page lists, procedures deferred to the
 * consultation. Skin family: links go to skin pages only. No prices, devices,
 * brands or doctor named; "dermatologist" not claimed.
 */

declare(strict_types=1);

return [
    'title'          => [
        'Skin Treatment in Delhi: Acne & Pigmentation | DenceSpot',
        'Skin Treatment in Delhi: Acne & Pigmentation',
        'Skin Treatment in Delhi | DenceSpot Rohini',
    ],
    'description'    => 'Skin treatment in Delhi at DenceSpot’s Rohini clinic for acne, acne marks, pigmentation and melasma: diagnosis first, reviews, limits, cost and FAQs.',
    'keywords'       => ['skin treatment in delhi', 'acne treatment in delhi', 'pigmentation treatment in delhi', 'melasma treatment in delhi', 'skin treatment cost in delhi', 'skin treatment in rohini'],
    'form_treatment' => 'Skin care',
    'form'           => ['Acne', 'Acne marks or scars', 'Pigmentation or melasma', 'Dry or sensitive skin', 'Ingrown hairs or razor bumps', 'Not sure — please advise'],

    'hero' => [
        'lead'  => 'Acne, acne marks, pigmentation, melasma and dry or sensitive skin assessed by a doctor at our Rohini clinic — a diagnosis before any prescription, and review visits planned from the first appointment.',
        'feats' => [['search', 'Diagnosis before prescription'], ['user', 'Registered doctors'], ['scale', 'Limits explained'], ['calendar', 'Review visits planned']],
    ],

    'about' => [
        'heading' => 'How Skin Treatment Is Planned',
        'paras'   => [
            'Most skin problems are treated over weeks and months rather than in a single visit. The consultation works out what is driving yours — the kind of acne, the cause behind a dark patch, or what is irritating dry or sensitive skin — and the plan is built on that: prescription creams or tablets where needed, sun protection, a simpler routine and, only where suitable, an in-clinic procedure alongside medical care.',
            'Treatment has limits worth knowing at the start: melasma tends to return, acne scars soften rather than vanish, and two people with the same diagnosis can respond differently. All of it — consultations, treatment and reviews — happens at DenceSpot’s Rohini clinic in Delhi, where patients are seen by registered medical practitioners.',
        ],
        'cta'     => ['#suitability', 'See the Concerns We Treat'],
        'glance'  => [
            ['search', 'mint', 'First visit', 'Your concern discussed and the skin examined'],
            ['doc', 'violet', 'Tests', 'Only when they would change the plan'],
            ['calendar', 'sky', 'Early check', 'A few weeks in, to see how skin tolerates treatment'],
            ['chart', 'amber', 'Acne review', 'At about two to three months'],
        ],
    ],

    'middle' => [
        'heading' => 'When Progress Is Usually Judged',
        'sub'     => 'General timings for patient education; your plan may differ.',
        'cols'    => ['Concern', 'Usually judged'],
        'rows'    => [
            ['Active acne', 'At about 2–3 months'],
            ['Flat marks after acne', 'Fade over months'],
            ['Pitted or raised scars', 'Once acne has settled'],
            ['Pigmentation', 'Over weeks to months'],
            ['Melasma', 'Over months, then maintenance'],
            ['Dry or sensitive skin', 'Often settles over weeks'],
        ],
        'note'    => 'Progress is compared with photographs from your first visit, taken with your consent.',
    ],
    'results' => false,

    'why' => [
        'intro'  => 'How skin care is handled at the Rohini clinic, from the first look at your skin to the review visits that follow.',
        'icons'  => [
            ['search', 'Skin Examined Before a Prescription'],
            ['list', 'Your Products Reviewed'],
            ['doc', 'Tests Only When Useful'],
            ['camera', 'Progress Judged on Photographs'],
            ['calendar', 'Review Visits at the Same Clinic'],
            ['pin', 'Rohini Clinic, North-West Delhi'],
        ],
        'media'  => 'map',
    ],

    'suit' => [
        'heading' => 'Skin Concerns Seen at the Rohini Clinic',
        'intro'   => 'These are the concerns the consultation covers. What suits your skin is settled once it has been examined, and a few things change the plan, so mention them at the start.',
        'yes'     => ['heading' => 'Concerns We Commonly See', 'items' => [
            'Active acne on the face, chest or back',
            'Marks and scars left by acne',
            'Pigmentation, including patches after acne or eczema',
            'Melasma on the cheeks, forehead, nose or upper lip',
            'Dry or sensitive skin, ingrown hairs and razor bumps',
        ]],
        'wait'    => ['heading' => 'Tell the Doctor at the Start', 'items' => [
            'Pregnancy, plans for pregnancy, or breastfeeding',
            'Any steroid cream, or a “fairness” cream from a chemist',
            'Irregular periods alongside acne',
            'Medicines and supplements you take',
            'A past reaction to a cream or procedure',
        ]],
        'note'    => ['heading' => 'Before Your First Consultation', 'paras' => [
            'Arrive with bare skin if you can, and bring every product you use — or photos of the labels — with earlier prescriptions and test reports. Using a strong steroid cream? Mention it at the visit instead of dropping it overnight; some conditions flare when a steroid is cut off suddenly, and the doctor can plan how you come off it.',
            'If a procedure such as <a href="/face-prp-treatment-in-rohini">face PRP</a> interests you, it is discussed once the diagnosis is clear. Where ingrown hairs or razor bumps follow shaving or waxing, changing how hair is removed is part of the plan; <a href="/laser-hair-removal-in-rohini">laser hair removal</a> is covered on its own page.',
        ]],
    ],

    'options' => [
        'eyebrow'         => 'Treatment options',
        'heading'         => 'Medical Treatment and In-Clinic Procedures',
        'intro'           => 'Medical treatment comes first for almost every concern. Procedures come into the conversation only once the diagnosis is made, and they sit beside medical treatment, never in place of it.',
        'cards'           => [
            ['doc', 'mint', 'Medical Treatment', 'Prescription creams, tablets where acne is moderate, severe or scarring, daily sunscreen and a pared-down routine, adjusted at each review. It forms the base of nearly every plan, from acne to melasma to sensitive skin.', [
                'Creams chosen for the diagnosis',
                'Tablets monitored where used',
                'Sunscreen in every plan',
            ]],
            ['settings', 'violet', 'In-Clinic Procedures', 'Considered where suitable — for example for pitted acne scars once the acne has settled — and only next to medical treatment. The consultation is where you hear which procedures the Rohini clinic provides and whether any of them is right for your skin.', [
                'Only after a diagnosis',
                'Planned cautiously on brown skin',
                'Quoted in writing before booking',
            ]],
        ],
        'choose'          => ['heading' => 'What Shapes Your Treatment Plan', 'items' => [
            'The diagnosis, and what else it could be',
            'How long the concern has lasted and what has been tried',
            'Pregnancy, breastfeeding or plans for either',
            'Medicines and supplements you already take',
            'How your skin coped with earlier treatment',
        ]],
        'related_heading' => 'Related Skin Care at the Rohini Clinic',
        'related'         => [
            '/skin-treatment-in-rohini'            => 'Skin treatment in Rohini',
            '/face-prp-treatment-in-rohini'        => 'Face PRP treatment',
            '/laser-hair-removal-in-rohini'        => 'Laser hair removal',
            '/blog/acne-scars-treatment-options'   => 'Acne marks and scars',
        ],
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'How a Skin Treatment Plan Runs',
        'intro'     => 'Five stages at the Rohini clinic, from describing the problem to a maintenance routine.',
        'items'     => [
            ['chat', 'Your Concern', 'What bothers you, how long it has been there, what you have tried and what changed it.'],
            ['search', 'Skin Examination', 'The affected skin looked at closely, including the chest and back where acne is the concern.'],
            ['doc', 'Tests If Useful', 'Blood tests only when they would change the plan, such as acne with irregular periods.'],
            ['list', 'Written Plan', 'What to apply and in which order, the side effects to expect and a date for review.'],
            ['calendar', 'Reviews', 'An early tolerance check, then progress judged against your first-visit photographs.'],
        ],
        'note_html' => 'More in <a href="/blog/acne-scars-treatment-options">acne marks vs true scars</a> and <a href="/blog/melasma-causes-and-treatment">why melasma often returns</a>.',
    ],

    'aftercare' => [
        'eyebrow'      => 'After the first visit',
        'heading'      => 'Looking After Your Skin Between Reviews',
        'intro'        => 'Skin treatment is slow, and the weeks between visits matter. These are general points; the written plan you are given comes first, and marked redness, swelling, blistering or a spreading rash should be reported straight away.',
        'timeline'     => [
            'The first weeks: some dryness or stinging from a new cream is common; tell the clinic rather than giving up',
            'A few weeks in: an early check on how your skin is tolerating treatment',
            'Two to three months: acne treatment judged; pigmentation is judged later',
            'After the first course: a lighter maintenance routine, especially for acne and melasma',
        ],
        'tips_heading' => 'Skin Care Around Delhi’s Seasons',
        'tips'         => [
            ['shield', 'mint', 'Summer sun', 'Strong sun darkens melasma and acne marks; use sunscreen daily, reapply it outdoors, and add shade and a hat.'],
            ['calendar', 'violet', 'Monsoon humidity', 'Damp heat brings sweat rash and fungal infection in skin folds; keep them dry and get any new rash looked at.'],
            ['pin', 'sky', 'Helmets and commutes', 'Heat trapped beneath a helmet, mask or snug collar can set off acne along the forehead, jawline and chin; wash after a hot ride.'],
            ['info', 'amber', 'Winter and smog', 'Dry air and hot showers irritate skin; cleanse gently at night, use a plain moisturiser and skip scrubs.'],
        ],
    ],

    'cost' => [
        'heading'  => 'Skin Treatment Cost in Delhi',
        'intro'    => 'No fixed price is published, because the cost follows your diagnosis and what your plan includes. Your costs are set out once the consultation at the Rohini clinic is done, and a procedure, if one is planned, gets a written quote ahead of booking.',
        'factors'  => [
            ['search', 'mint', 'The diagnosis', 'The concern itself, and how long it is likely to need treating.'],
            ['doc', 'violet', 'Medicines and products', 'Prescription creams, tablets and sunscreen, listed in your plan.'],
            ['calendar', 'sky', 'Review visits', 'Long-running concerns need more follow-up.'],
            ['settings', 'amber', 'Any procedure', 'Priced in writing ahead of booking.'],
        ],
        'meta'     => 'Ask what the whole plan costs, including reviews and products, and what happens once the first course ends.',
        'links'    => [
            '/skin-treatment-in-rohini' => 'Skin treatment in Rohini',
            '/cost-and-emi-options'     => 'Cost and EMI options',
        ],
        'estimate' => ['heading' => 'What Your Treatment Plan Covers', 'items' => [
            'Your diagnosis',
            'Each product, and the order to use it in',
            'Side effects to expect, and which to report',
            'When progress will be judged',
            'Any procedure, quoted in writing first',
        ], 'note' => 'You can ask at the consultation about instalments through third-party lenders, which may be available.'],
    ],

    'faqs' => [
        ['q' => 'Which skin problems are treated at the Rohini clinic?',
         'a' => 'Acne, the marks and scars it leaves, pigmentation, melasma, dry or sensitive skin, ingrown hairs and razor bumps, and skin problems linked to hair. Each starts with a consultation and examination, and the plan follows the diagnosis. Face PRP is offered too; see <a href="/face-prp-treatment-in-rohini">face PRP treatment</a>.'],
        ['q' => 'How is acne treated?',
         'a' => 'The plan depends on what kind of spots you have, where they appear and whether they leave scars. Creams on prescription are the usual start for milder acne, and tablets join them when acne is moderate or severe, or when it scars. If acne comes with irregular periods, blood tests may look for a hormonal cause. Allow about two to three months before treatment is judged.'],
        ['q' => 'Can pigmentation be treated?',
         'a' => 'It is treated by dealing with its cause as well as the colour. Dark patches can follow acne or eczema, sun damage, friction, or a reaction to a cream or medicine, and now and then they point to an internal cause. Daily sunscreen and, where suitable, pigment-reducing creams are the mainstay, and fading is judged over weeks to months.'],
        ['q' => 'Will melasma go away completely?',
         'a' => 'Rarely for good. Melasma can be lightened and kept under control, but sun, heat and hormones keep acting on the skin after the patches fade, so it tends to come back. Daily sunscreen and a maintenance plan carry on after the first course. <a href="/blog/melasma-causes-and-treatment">Melasma causes and treatment</a> explains why.'],
        ['q' => 'Can acne scars be removed?',
         'a' => 'They can soften and become less obvious, though they seldom vanish. Flat red or brown marks are not true scars and usually fade over months once acne is controlled and the skin is kept out of the sun. Pitted or raised scars are assessed after the acne has settled, and a procedure is considered only where suitable. See <a href="/blog/acne-scars-treatment-options">acne scar treatment options</a>.'],
        ['q' => 'How much does skin treatment cost in Delhi?',
         'a' => 'There is no set price, because the cost follows your diagnosis and what the plan includes: medicines, products, review visits and, sometimes, a procedure. You hear the cost after the consultation at the Rohini clinic, and if a procedure is part of the plan, its price is put in writing before anything is booked. See <a href="/cost-and-emi-options">cost and EMI options</a>.'],
        ['q' => 'How soon will I see a difference?',
         'a' => 'Skin changes slowly. Acne treatment is usually judged at about two to three months, and pigmentation later, over months. Some creams cause dryness or a brief flare early on, which does not mean they are failing; tell the clinic so the way you use them can be adjusted.'],
        ['q' => 'Are chemist-bought “fairness” or pimple creams a problem?',
         'a' => 'Some can be. Creams sold without a prescription, including certain “fairness” creams, can contain strong steroids that damage the skin over time. Bring them, or photos of the labels, to your consultation, and if you use one, tell the doctor rather than stopping it suddenly, since some conditions flare when a steroid is withdrawn abruptly.'],
        ['q' => 'Do I need blood tests?',
         'a' => 'Most people do not. Tests are advised only when they would change the plan — for example acne alongside irregular periods, before certain oral medicines, or darkening of the skin that suggests an internal cause.'],
        ['q' => 'Is skin treatment possible during pregnancy or breastfeeding?',
         'a' => 'Some treatment, yes, but several options are avoided, including certain acne tablets, some creams and some pigmentation treatments. Tell the doctor at your first visit if you are pregnant, breastfeeding or planning a pregnancy, so the plan is built around it.'],
        ['q' => 'What should I bring to my first consultation?',
         'a' => 'Every product you put on your skin, including soap and sunscreen, or clear photos of the labels; creams picked up at a chemist or ordered online; earlier prescriptions and test reports; and a list of medicines and supplements. Photos of a flare help if the problem comes and goes, and bare skin lets the doctor see the pattern.'],
        ['q' => 'When should I call the clinic about a side effect?',
         'a' => 'Call the Rohini clinic, rather than waiting for your next review, if a cream or procedure leaves you with marked redness, swelling, blisters, a rash that spreads, or new patches darker or lighter than your skin. Some dryness or stinging in the early weeks is expected, and a change in how the cream is applied often helps.'],
        ['q' => 'Will I need a procedure?',
         'a' => 'Most concerns are treated medically. A procedure is raised only after the diagnosis and alongside medical treatment, never instead of it. You will hear at the consultation which procedures are available at the Rohini clinic and whether one makes sense for you; on brown skin they are planned cautiously because of the risk of temporary darkening or lightening.'],
        ['q' => 'Where in Delhi is skin treatment offered?',
         'a' => 'At DenceSpot’s only Delhi clinic, in Rohini, North-West Delhi. People from every part of the city come there for consultations, treatment and reviews. Areas we serve appear at the end of this page.'],
        ['q' => 'Can I WhatsApp photos of my skin first?',
         'a' => 'Yes. Photos of the problem area taken in daylight, with bare skin, let the clinic point you to the right kind of appointment. Working out the diagnosis and writing any prescription still need you to be examined.'],
    ],
    'faq_about' => 'skin, health or budget',

    'consult' => [
        'heading' => 'Book a Skin Treatment Consultation in Delhi',
        'intro'   => 'Bring your products to the Rohini clinic and leave with a diagnosis, a written plan and a date for your first review, along with a plain account of what treatment can and cannot change.',
    ],

    'schema_type' => 'therapy',
    'schema'      => [
        'name'              => 'Skin Treatment',
        'description'       => 'Doctor-led consultation and treatment for acne, acne marks and scars, pigmentation, melasma, dry or sensitive skin and ingrown hairs, with review visits, at the Rohini clinic in Delhi.',
        'alternateName'     => ['Skin Treatment in Delhi', 'Acne and pigmentation treatment', 'Melasma treatment'],
        'bodyLocation'      => 'Skin',
        'howPerformed'      => 'The concern is discussed and the affected skin examined, with blood tests only where they would alter treatment. The written plan may combine prescription topical or oral medicine, daily sunscreen and a pared-down routine, and, where suitable after diagnosis, an in-clinic procedure given alongside medical treatment.',
        'preparation'       => 'Skin left bare where possible. The patient brings their skincare products or label photographs, any over-the-counter creams, past prescriptions and reports, and a medicine and supplement list, and mentions pregnancy, pregnancy plans or breastfeeding.',
        'followup'          => 'An early check on tolerance a few weeks in, progress judged against first-visit photographs, and a maintenance routine for long-running concerns such as acne and melasma, all at the Rohini clinic.',
        'expectedPrognosis' => 'Change is gradual: acne response is usually assessed at roughly two to three months, pigmentation over a longer period. Melasma tends to recur and needs ongoing sun protection; acne scars improve rather than disappear. Creams commonly cause early dryness or irritation, some treatments are avoided in pregnancy, and results vary between patients.',
    ],

    'area' => [
        'lead'            => 'Skin treatment there starts with a consultation and an examination, so the plan rests on a diagnosis, and your review visits are booked at the same clinic.',
        'feats'           => [['search', 'Diagnosis before prescription'], ['calendar', 'Reviews at the same clinic'], ['doc', 'A written plan']],
        'heading'         => 'Skin Care for {area}, at the Rohini Clinic',
        'visits_line'     => 'Consultations, treatment and every review visit take place at the Rohini clinic.',
        'day_heading'     => 'On Your Consultation Day',
        'day'             => 'Travel from {area} with bare skin if you can, since makeup hides the pattern of acne and pigmentation, and bring your products, earlier prescriptions and a list of medicines. Most people need no tests, and a consultation does not stop you getting on with your day.',
        'visits_intro'    => 'A first consultation, an early check a few weeks in, and reviews to judge progress — at about two to three months for acne and later for pigmentation — all at the Rohini clinic.',
        'visit_icons'     => [['search', 'Consultation First'], ['shield', 'Early Tolerance Check'], ['camera', 'Progress on Photographs'], ['calendar', 'Maintenance Reviews']],
        'options_heading' => 'Skin Treatment at the Rohini Clinic',
        'options_html'    => 'Prescription creams, tablets where acne calls for them, daily sunscreen and a simpler routine form the base of most plans; a procedure is considered only after the diagnosis and alongside medical treatment. <a href="{hub}#options">Medical treatment and procedures explained</a>.',
        'cost_heading'    => 'How Skin Treatment Is Priced',
        'cost_intro'      => 'The cost follows your diagnosis and what the plan includes — medicines, products and review visits — and is explained after the consultation. A procedure, if planned, is priced in writing ahead of booking.',
        'faqs'            => [
            ['q' => 'Do I need to travel to Rohini from {area} for skin treatment?',
             'a' => 'Yes. DenceSpot has no clinic in {area}; the consultation, any treatment and the reviews all happen at our Rohini clinic in North-West Delhi, which the Directions button opens on Google Maps.'],
            ['q' => 'Which way is quickest from {area} to the Rohini clinic?',
             'a' => '{route} Google Maps or the DMRC journey planner can work out the trip from your address, and the clinic answers route questions on WhatsApp.'],
            ['q' => 'How often will I need to come from {area}?',
             'a' => 'Most plans start with a consultation and at least one review. An early check a few weeks in looks at how your skin is coping, acne is judged at about two to three months and pigmentation later, and long-running concerns such as melasma add maintenance reviews.'],
            ['q' => 'Will treatment cost more because I live in {area}?',
             'a' => 'No. The cost depends on your diagnosis and plan, not your address, and it is explained after the consultation. See <a href="/cost-and-emi-options">cost and EMI options</a>.'],
            ['q' => 'Which concerns can I come in for?',
             'a' => 'Acne, acne marks and scars, pigmentation, melasma, dry or sensitive skin, ingrown hairs and razor bumps, and skin problems linked to hair. <a href="/skin-treatment-in-rohini">Skin treatment in Rohini</a> covers each in more depth.'],
            ['q' => 'What if a cream irritates my skin between visits?',
             'a' => 'Mild dryness or stinging early on is common, and how the cream is used can usually be adjusted, so tell the clinic rather than abandoning it. Marked redness, swelling, blistering or a spreading rash should be reported straight away.'],
            ['q' => 'Can I send skin photos from {area} before booking?',
             'a' => 'Yes. WhatsApp the Rohini clinic a few makeup-free photos taken in daylight, and it can suggest which appointment fits. Diagnosing and prescribing still happen in person.'],
        ],
        'consult_intro'   => 'Book a skin consultation at the Rohini clinic on a day that works for you. The doctor examines your skin, explains the diagnosis and the plan, and says plainly what treatment is likely to change and what it will not.',
        'descriptions'    => [
            'Skin treatment near {area}: acne, pigmentation and melasma care at DenceSpot’s Rohini clinic in Delhi, with the route, cost and FAQs.',
            'Skin treatment for {area} at DenceSpot’s Rohini clinic, Delhi: acne, pigmentation, the route, cost and FAQs.',
            'Skin treatment for {area} at DenceSpot’s Rohini clinic: acne, pigmentation, cost and FAQs.',
        ],
    ],
];
