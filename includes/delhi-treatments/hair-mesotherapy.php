<?php
/**
 * Copy for /hair-mesotherapy-in-delhi and its area pages (schema:
 * includes/delhi-treatment-pillar.php). Facts as on /hair-mesotherapy-in-rohini,
 * written fresh. Editorial position kept: a delivery route, not a medicine;
 * no standard formulation; effectiveness in hair loss not established; never
 * the main treatment, at most an optional addition after diagnosis. No prices,
 * no product or brand names.
 */

declare(strict_types=1);

return [
    'title'          => [
        'Hair Mesotherapy in Delhi: Evidence & Cost | DenceSpot',
        'Hair Mesotherapy in Delhi: Evidence & Cost',
        'Hair Mesotherapy in Delhi | DenceSpot Rohini',
    ],
    'description'    => 'Hair mesotherapy in Delhi at DenceSpot’s Rohini clinic: what is injected, its limited evidence, how it compares with PRP, sessions, side effects and cost.',
    'keywords'       => ['hair mesotherapy in delhi', 'mesotherapy for hair loss delhi', 'scalp mesotherapy delhi', 'hair mesotherapy cost in delhi', 'mesotherapy vs prp for hair', 'hair mesotherapy in rohini'],
    'form_treatment' => 'Hair PRP / GFC',
    'form'           => ['Hair mesotherapy', 'Hair PRP treatment', 'Hair fall treatment', 'Hair transplant (FUE / DHI)', 'Not sure — please advise'],

    'hero' => [
        'lead'  => 'Fine, shallow injections of a prepared mixture across the thinning scalp. Its effect on hair loss has not been established. At our Rohini clinic it is only discussed as an extra beside a better-evidenced treatment, once the cause of your hair loss is known.',
        'feats' => [['list', 'Mixture named in writing'], ['scale', 'Evidence stated plainly'], ['search', 'Diagnosis comes first'], ['camera', 'Stops if nothing changes']],
    ],

    'about' => [
        'heading' => 'What Hair Mesotherapy Involves',
        'paras'   => [
            'The name describes a technique rather than a medicine. Very fine needles place small amounts of a solution just under the surface of the scalp, in a pattern across the thinning area. The solution is usually a blend of vitamins, minerals, amino acids and other agents. There is no standard recipe, so two clinics offering mesotherapy may be injecting quite different things.',
            'Research on it is limited and weaker than for medication or PRP, and a finding for one mixture tells you little about another. At DenceSpot’s Rohini clinic the preparation is named in your plan, and mesotherapy is never the main treatment for pattern hair loss.',
        ],
        'cta'     => ['#suitability', 'See When It Is Not Advised'],
        'glance'  => [
            ['list', 'mint', 'What is injected', 'A prepared mixture, named in your plan'],
            ['calendar', 'violet', 'The course', 'Sessions spaced some weeks apart'],
            ['user', 'sky', 'After a visit', 'Most people carry on with their day'],
            ['scale', 'amber', 'Evidence', 'Limited; effect not established'],
        ],
    ],

    'middle' => [
        'heading' => 'Where Mesotherapy Sits Among Hair Treatments',
        'sub'     => 'Depth of evidence in pattern hair loss, in brief.',
        'cols'    => ['Option', 'Evidence'],
        'rows'    => [
            ['Minoxidil; finasteride in men', 'The strongest; neither is a cure'],
            ['PRP', 'More developed; trials small and short'],
            ['GFC', 'Smaller and newer than for PRP'],
            ['Mesotherapy', 'Limited; effect not established'],
        ],
        'note'    => 'This is why mesotherapy is, at most, an optional addition to medicine or PRP and never a replacement for either.',
    ],
    'results' => false,

    'why' => [
        'intro'  => 'Mesotherapy is easy to sell and hard to measure. At the Rohini clinic it is handled the other way round: diagnosis first, contents disclosed, and a review that can end the course.',
        'icons'  => [
            ['list', 'Preparation Named in Your Plan'],
            ['search', 'Reversible Causes Checked First'],
            ['scale', 'Limited Evidence Said Plainly'],
            ['camera', 'Judged Against Baseline Photographs'],
            ['shield', 'Allergy History Reviewed'],
            ['pin', 'Rohini Clinic, North-West Delhi'],
        ],
        'media'  => 'map',
    ],

    'suit' => [
        'heading' => 'When Mesotherapy Is Considered, and When It Is Not',
        'intro'   => 'Many mesotherapy assessments end with a different recommendation. The sensible order is a diagnosis, then any reversible cause, then a treatment with evidence behind it, and only after that any optional extras.',
        'yes'     => ['heading' => 'May Be Discussed as an Extra For', 'items' => [
            'Diagnosed pattern thinning already on medicine or PRP',
            'Thinning where follicles are still present',
            'People who still want it once the uncertainty is explained',
            'Those who want the contents named before agreeing',
            'Anyone prepared to stop if the review shows no change',
        ]],
        'wait'    => ['heading' => 'Postponed, Ruled Out or Not Suggested', 'items' => [
            'Hair loss that has not yet been diagnosed',
            'Untreated iron, thyroid or hormonal causes',
            'Infection or inflammation on the scalp',
            'An allergy to a component, some clotting disorders or unreviewed blood thinners',
            'A smooth scalp where the follicles have gone',
        ]],
        'note'    => ['heading' => 'Ask What Is in the Syringe', 'paras' => [
            'Wherever you are treated, ask for the preparation by name before you agree; your allergy history can only be checked against a named mixture. Pregnancy and breastfeeding are assessed case by case.',
            'If the cause of your hair loss is not yet known, start with <a href="/hair-fall-treatment-in-rohini">hair fall treatment at the Rohini clinic</a> and <a href="/blog/blood-tests-for-hair-fall">the blood tests that matter for hair fall</a>.',
        ]],
    ],

    'options' => [
        'eyebrow'         => 'Where it sits',
        'heading'         => 'Mesotherapy and the Treatments That Come First',
        'intro'           => 'Mesotherapy is often offered as an alternative to PRP or medicine. On the evidence, it belongs after them, not instead of them.',
        'cards'           => [
            ['list', 'sky', 'Hair Mesotherapy', 'A mixture prepared outside the body, varying from clinic to clinic, placed in the upper layers of the scalp. Its effect on hair loss has not been established.', [
                'Contents named in your plan',
                'Short visits some weeks apart',
                'At most an optional addition',
            ]],
            ['heart', 'mint', 'Medication and PRP', 'Minoxidil, and finasteride in men, have the deepest evidence, though neither cures pattern hair loss. PRP, made from your own blood, is considerably better studied than mesotherapy.', [
                'Medication: the backbone of the plan',
                'PRP: a supporting course',
                'Both need continuing treatment',
            ]],
        ],
        'choose'          => ['heading' => 'Questions to Ask About Mesotherapy', 'items' => [
            'What is the preparation called, and what does it contain?',
            'Has the cause of my hair loss been found?',
            'Have my iron and thyroid been checked?',
            'Will a doctor give the injections?',
            'What happens to the plan if nothing changes?',
        ]],
        'related_heading' => 'Related Pages',
        'related'         => [
            '/hair-mesotherapy-in-rohini'    => 'Mesotherapy in Rohini',
            '/hair-prp-treatment-in-delhi'   => 'Hair PRP in Delhi',
            '/gfc-treatment-in-rohini'       => 'GFC treatment',
            '/hair-fall-treatment-in-rohini' => 'Hair fall treatment',
        ],
    ],

    'steps' => [
        'eyebrow'   => 'If you go ahead',
        'heading'   => 'How a Mesotherapy Course Is Run',
        'intro'     => 'If you still want to add it after the assessment, it is planned, recorded and reviewed like any other treatment, with your main treatment carrying on.',
        'items'     => [
            ['search', 'Assessment', 'Your allergies and every medicine you take are recorded, and the scalp is examined under magnification; nothing is injected that day.'],
            ['chat', 'Frank Discussion', 'What the preparation contains, what the evidence does and does not show, and whether something better established should come first.'],
            ['doc', 'Written Plan', 'Baseline photographs, the named preparation, the number of sessions, the review point and the cost.'],
            ['settings', 'Sessions', 'Short visits some weeks apart, with very fine needles placing the mixture across the thinning area.'],
            ['camera', 'Review', 'Photographs compared with the baseline; if nothing has changed, the course ends.'],
        ],
        'note_html' => 'Medication stays at the centre of most plans: see <a href="/blog/minoxidil-and-finasteride-in-india">minoxidil and finasteride in India</a>, and <a href="/blog/does-prp-work-for-hair-loss">what the research says about PRP</a>.',
    ],

    'aftercare' => [
        'eyebrow'      => 'After a session',
        'heading'      => 'After Hair Mesotherapy: What Is Usual',
        'intro'        => 'The needle marks are small, yet tenderness can linger for a few days. This is a general picture; your aftercare sheet takes priority over it.',
        'timeline'     => [
            'Straight after: redness across the treated area and small bumps where the needle went in',
            'Over the next few days: tenderness and occasional bruising that settle on their own',
            'Less common: a reaction to a component of the mixture, or infection at a site',
            'Report promptly: spreading redness or heat, a fever, a rash or pain that increases',
        ],
        'tips_heading' => 'Mesotherapy and the Delhi Year',
        'tips'         => [
            ['clock', 'mint', 'Summer sweat', 'Sweat on a sore scalp is uncomfortable, so plan a cool rest of the day.'],
            ['shield', 'violet', 'Helmets', 'A helmet presses on tender spots for a few days; keep its liner clean.'],
            ['alert', 'sky', 'Smog and dust', 'They do not change the treatment; keep the scalp clean and wash as your sheet says.'],
            ['calendar', 'amber', 'Festival season', 'Space the sessions around weddings and travel so the intervals stay even.'],
        ],
    ],

    'cost' => [
        'heading'  => 'Hair Mesotherapy Cost in Delhi',
        'intro'    => 'Mesotherapy is charged per session, but no session price is published. After your assessment at the Rohini clinic you get a written quote for the course, shown next to the treatment it would be added to.',
        'factors'  => [
            ['calendar', 'mint', 'Number of sessions', 'Follows your diagnosis; looked at again at review.'],
            ['chart', 'violet', 'Area covered', 'Fewer injections for a small zone than for wide thinning.'],
            ['list', 'sky', 'The preparation', 'Named in your plan, never left vague.'],
            ['doc', 'amber', 'Treatment it joins', 'Medicine or PRP is costed on its own line.'],
        ],
        'meta'     => 'Nobody can predict whether mesotherapy will help you, so paying upfront for a package before an examination makes little sense. Keep the freedom to stop.',
        'links'    => [
            '/cost-and-emi-options'              => 'EMI and payment',
            '/prp-hair-treatment-cost-in-rohini' => 'How PRP courses are priced',
        ],
        'estimate' => ['heading' => 'What Your Written Quote Covers', 'items' => [
            'The preparation, by name',
            'The number of sessions and their spacing',
            'The cost per session and for the course',
            'Medication or PRP as separate lines',
            'The review point, and what follows if nothing changes',
        ], 'note' => 'Instalments through third-party lenders may be available; ask at the consultation, and keep in mind that a course with an uncertain response should be easy to stop.'],
    ],

    'faqs' => [
        ['q' => 'Who is hair mesotherapy suitable for?',
         'a' => 'Only people whose hair loss has been diagnosed, who are already on or starting a better-evidenced treatment, and who still want to add it once the uncertainty has been explained. It is postponed or ruled out with infection or inflammation on the scalp, an allergy to a component, some clotting disorders or unreviewed blood thinners. Pregnancy and breastfeeding are assessed case by case.'],
        ['q' => 'How many mesotherapy sessions will I need?',
         'a' => 'It is given as a course, with sessions spaced some weeks apart. The number follows your diagnosis and how you respond, is written into your plan and is checked against baseline photographs. A fixed package sold before anyone has examined you is a sales arrangement, not a plan.'],
        ['q' => 'Does hair mesotherapy work?',
         'a' => 'Its effect on hair loss has not been established. The studies are limited and weaker than those for medication or PRP, and because mixtures differ, a result for one cannot be assumed for another. Some people notice nothing at all, which is why a review can end the course.'],
        ['q' => 'How much does hair mesotherapy cost in Delhi?',
         'a' => 'It is charged per session, but no fixed figure is published because the course depends on your plan. At the Rohini clinic the sessions, the named preparation and any treatment alongside are quoted in writing after the assessment. See <a href="/cost-and-emi-options">cost and EMI options</a>.'],
        ['q' => 'Does mesotherapy hurt, and what are the side effects?',
         'a' => 'The needles are very fine and the injections shallow, so most people describe it as uncomfortable rather than painful. Tenderness, redness, small bumps and occasional bruising are usual and settle within days. A reaction to a component of the mixture is less common, and infection is uncommon but possible.'],
        ['q' => 'When would I notice a difference?',
         'a' => 'If there is a response, less shedding usually comes first. Any change in density is judged over months against your baseline photographs rather than in the mirror week by week, and if the review shows nothing, the course stops.'],
        ['q' => 'What exactly is injected?',
         'a' => 'That varies from clinic to clinic. Most preparations combine vitamins, minerals, amino acids and other agents, and there is no agreed standard. At the Rohini clinic the preparation is named in your plan, and it is worth asking for that wherever you are treated.'],
        ['q' => 'How does mesotherapy compare with PRP?',
         'a' => 'PRP is made from your own blood and has a considerably more developed evidence base; mesotherapy injects a mixture prepared outside the body whose effect has not been established. That gap is worth weighing. See <a href="/hair-prp-treatment-in-delhi">hair PRP treatment in Delhi</a>.'],
        ['q' => 'Can mesotherapy replace minoxidil or finasteride?',
         'a' => 'No. Where pattern hair loss is the diagnosis, medication with established evidence stays at the centre of the plan, and mesotherapy can only be discussed as an extra. Finasteride is for men, and the side effects of both are explained before you start. Read <a href="/blog/minoxidil-and-finasteride-in-india">minoxidil and finasteride in India</a>.'],
        ['q' => 'What should I bring to the first appointment?',
         'a' => 'A list of every medicine and supplement you take, any allergies you know of and any recent blood reports. The first visit is an assessment only. If you go ahead later, sessions are short and most people carry on with their day.'],
        ['q' => 'Which side effects should I report straight away?',
         'a' => 'Redness, heat or swelling that spreads, a fever after a session, a rash or any allergic-type reaction, and pain that grows rather than eases. Contact the Rohini clinic promptly by phone or WhatsApp.'],
        ['q' => 'Will any benefit last?',
         'a' => 'Not by itself. Mesotherapy does not change the process behind pattern hair loss, so any benefit needs maintenance while your main treatment continues. Once sessions end, thinning generally continues as it was.'],
        ['q' => 'Why might the clinic advise against it?',
         'a' => 'Because many people asking about mesotherapy need something else first: a diagnosis, treatment for low iron or a thyroid problem, or medication or PRP that suits them. Mesotherapy is not suggested as a substitute for any of these. See <a href="/hair-fall-treatment-in-rohini">hair fall treatment in Rohini</a>.'],
        ['q' => 'Where in Delhi is hair mesotherapy done?',
         'a' => 'At DenceSpot’s one Delhi clinic, in Rohini, North-West Delhi. The assessment, any sessions and the reviews all happen there, so patients from other parts of Delhi travel to Rohini. The list of areas we serve sits at the end of this page.'],
        ['q' => 'Can I send photos on WhatsApp first?',
         'a' => 'Yes. Clear photos of the thinning areas taken in daylight help the clinic answer a first question. The right treatment for your hair loss, which may well not be mesotherapy, can only be chosen once the doctor has seen your scalp.'],
    ],
    'faq_about' => 'scalp, allergies or budget',

    'consult' => [
        'heading' => 'Book a Hair Mesotherapy Consultation in Delhi',
        'intro'   => 'Come to the Rohini clinic for a scalp examination and a frank talk about what your hair loss needs first. If mesotherapy has any place, you will know what it contains and how it will be judged; nothing is booked unless you choose.',
    ],

    'schema_type' => 'therapy',
    'schema'      => [
        'name'              => 'Hair Mesotherapy',
        'description'       => 'Small volumes of a prepared solution injected into the superficial scalp across thinning areas, discussed only as an optional addition to better-evidenced treatment at the Rohini clinic in Delhi.',
        'alternateName'     => ['Hair Mesotherapy in Delhi', 'Scalp mesotherapy', 'Mesotherapy for hair loss'],
        'bodyLocation'      => 'Scalp',
        'howPerformed'      => 'Very fine needles deliver small amounts of a named, non-standardised preparation into the superficial layers of the scalp across the thinning area, in sessions spaced some weeks apart.',
        'preparation'       => 'History and magnified scalp examination, review of allergies and medicines including anticoagulants, and investigation of reversible causes such as iron deficiency and thyroid disease before a course is considered.',
        'followup'          => 'Interval photographs compared with the baseline while established treatment continues; the course stops where there is no change.',
        'expectedPrognosis' => 'Effectiveness in hair loss has not been established; evidence is limited and formulations vary, so response cannot be predicted. It is not a primary treatment for pattern hair loss, does not halt the underlying process, and any benefit needs maintenance.',
    ],

    'area' => [
        'lead'            => 'Mesotherapy is discussed there only after your hair loss has been diagnosed, as an optional extra beside a better-evidenced treatment, with the preparation named in writing.',
        'feats'           => [['search', 'Diagnosis first'], ['list', 'Preparation named'], ['scale', 'Evidence stated plainly']],
        'heading'         => 'Hair Mesotherapy for {area}: What to Know First',
        'visits_line'     => 'The assessment, any sessions and each review take place at the Rohini clinic, and many assessments end with a different recommendation.',
        'day_heading'     => 'If You Go Ahead',
        'day'             => 'Sessions are short visits, and most people carry on with their day afterwards. The scalp can stay tender and red for a few days, so a helmet on the ride back to {area} may feel sore; keep its liner clean.',
        'visits_intro'    => 'An assessment first; then, only if you choose to add mesotherapy, short sessions spaced some weeks apart and a review against baseline photographs at the Rohini clinic.',
        'visit_icons'     => [['search', 'Assessment First'], ['list', 'Preparation Named'], ['calendar', 'Sessions Weeks Apart'], ['camera', 'Review on Photographs']],
        'options_heading' => 'Mesotherapy Beside PRP and Medication',
        'options_html'    => 'Mesotherapy injects a mixture prepared outside the body, with no standard formula and an effect that has not been established. Medication and PRP have deeper evidence, so mesotherapy is at most an addition to them. <a href="{hub}#options">Where it sits in a plan</a>.',
        'cost_heading'    => 'How Mesotherapy Is Charged',
        'cost_intro'      => 'It is charged per session, with no published price. The course is quoted in writing after the assessment, together with the treatment it would be added to.',
        'faqs'            => [
            ['q' => 'Is hair mesotherapy offered in {area} itself?',
             'a' => 'No. Patients from {area} are seen at DenceSpot’s one Delhi clinic, in Rohini, North-West Delhi, for the assessment, any sessions and the reviews. The Directions button shows it on Google Maps.'],
            ['q' => 'How do I reach the Rohini clinic from {area}?',
             'a' => '{route} For the journey from your own street, Google Maps or the DMRC journey planner is the quickest check, and the clinic can also guide you on WhatsApp.'],
            ['q' => 'Is it worth travelling from {area} just for mesotherapy?',
             'a' => 'Travel for the assessment rather than for mesotherapy itself. Its effect has not been established, and many assessments end with a recommendation for medication, PRP or treatment of a reversible cause instead. That answer is worth the trip; a package bought beforehand is not.'],
            ['q' => 'How many visits from {area} would a course need?',
             'a' => 'An assessment first. If you then add mesotherapy, the sessions are spaced some weeks apart and the response is reviewed against baseline photographs. The number is set in your plan, so the trips from {area} can be arranged around it.'],
            ['q' => 'Does the cost change if I live in {area}?',
             'a' => 'No. It is charged per session, and the quote follows your plan, not your address. You receive it in writing after the assessment; see <a href="/cost-and-emi-options">cost and EMI options</a>.'],
            ['q' => 'What will be injected?',
             'a' => 'A named preparation, usually a blend of vitamins, minerals, amino acids and other agents. Formulas differ between clinics, so ask for the name wherever you are treated; at the Rohini clinic it is written into your plan.'],
            ['q' => 'Could I WhatsApp photos before the trip from {area}?',
             'a' => 'Yes. Daylight photographs of the thinning areas, sent on WhatsApp, help the clinic say whether an assessment makes sense. Which treatment you need is settled only when the doctor has examined your scalp.'],
        ],
        'consult_intro'   => 'Come to the Rohini clinic on whichever day suits you. The doctor looks for the cause of your hair loss. You are then told plainly whether mesotherapy has any place in your plan, or whether something better supported should come first.',
        'descriptions'    => [
            'Hair mesotherapy for people in {area}, at DenceSpot’s Rohini clinic, Delhi: what is injected, its evidence, sessions, the route, cost and FAQs.',
            'Hair mesotherapy for {area} at DenceSpot’s Rohini clinic, Delhi: evidence, sessions, the route, cost and FAQs.',
            'Hair mesotherapy for {area} at DenceSpot’s Rohini clinic: evidence, cost and FAQs.',
        ],
    ],
];
