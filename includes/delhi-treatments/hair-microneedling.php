<?php
/**
 * Copy for /hair-microneedling-in-delhi and its area pages (schema:
 * includes/delhi-treatment-pillar.php). Facts as on /hair-microneedling-in-rohini
 * and /blog/does-microneedling-work-for-hair-loss, written fresh. Position
 * kept: an add-on to a diagnosed treatment, never a treatment on its own;
 * small, short studies, mostly of needling with a topical medicine; home
 * rollers versus clinic needling. No prices, no devices or brands.
 */

declare(strict_types=1);

return [
    'title'          => [
        'Hair Microneedling in Delhi: Sessions & Cost | DenceSpot',
        'Hair Microneedling in Delhi: Sessions & Cost',
        'Hair Microneedling in Delhi | DenceSpot Rohini',
    ],
    'description'    => 'Hair microneedling in Delhi at DenceSpot’s Rohini clinic: an add-on, not a treatment alone; needling with PRP, home rollers, aftercare, risks and cost.',
    'keywords'       => ['hair microneedling in delhi', 'scalp microneedling delhi', 'microneedling for hair loss delhi', 'microneedling with prp for hair', 'hair microneedling cost in delhi', 'hair microneedling in rohini'],
    'form_treatment' => 'Hair PRP / GFC',
    'form'           => ['Hair microneedling', 'Hair PRP treatment', 'Hair fall treatment', 'Hair transplant (FUE / DHI)', 'Not sure — please advise'],

    'hero' => [
        'lead'  => 'Very fine needles across the thinning scalp, added to a treatment you are already on and sometimes followed by PRP. At our Rohini clinic needling is never offered by itself: the cause of your hair loss is diagnosed first, and the add-on stops if nothing changes.',
        'feats' => [['plus', 'An add-on, not a cure'], ['search', 'Diagnosis first'], ['shield', 'Sterile, doctor-set depth'], ['camera', 'Judged on photographs']],
    ],

    'about' => [
        'heading' => 'How Scalp Microneedling Works',
        'paras'   => [
            'Many tiny, controlled punctures are made across the thinning area. The skin answers with a wound-healing response, and the idea is that nearby follicles gain from it, though needling by itself is the least tested part. The punctures also open short-lived channels, so a topical medicine or PRP put on the surface afterwards can reach a little deeper.',
            'Nothing is injected; it is a mechanical treatment. Most studies tested needling together with a medicine such as minoxidil, and they were small and short. That is why, at DenceSpot’s Rohini clinic, needling is added to a diagnosed plan and never used in place of one.',
        ],
        'cta'     => ['#suitability', 'Check Whether Needling Suits You'],
        'glance'  => [
            ['plus', 'mint', 'Its role', 'An add-on to a diagnosed treatment'],
            ['calendar', 'violet', 'The course', 'Sessions some weeks apart, over months'],
            ['shield', 'sky', 'Comfort', 'Numbing preparation generally applied first'],
            ['clock', 'amber', 'Afterwards', 'Red and tender for a day or so'],
        ],
    ],

    'middle' => [
        'heading' => 'What a Needling Course Involves',
        'sub'     => 'General patient education, not your plan.',
        'cols'    => ['Part', 'Usually'],
        'rows'    => [
            ['First visit', 'Assessment; nothing needled'],
            ['Before needling', 'Scalp cleaned and numbed'],
            ['During', 'Pinpoint bleeding, then redness'],
            ['Applied after', 'A topical medicine, or PRP'],
            ['Spacing', 'Some weeks, so the scalp recovers'],
            ['Main treatment', 'Carries on between sessions'],
            ['Review', 'Over months, on photographs'],
        ],
        'note'    => 'If the photographs show no change, the needling stops and your main treatment carries on without it.',
    ],
    'results' => false,

    'why' => [
        'intro'  => 'Needling is simple to do and easy to overdo. At the Rohini clinic the depth, the setting and what goes on the scalp afterwards are decided by a doctor, after your scalp has been examined.',
        'icons'  => [
            ['search', 'Infection and Inflammation Ruled Out'],
            ['settings', 'Depth Chosen for Your Scalp'],
            ['shield', 'Sterile Preparation'],
            ['doc', 'Written Aftercare Sheet'],
            ['camera', 'Baseline Photographs'],
            ['pin', 'Rohini Clinic, North-West Delhi'],
        ],
        'media'  => 'map',
    ],

    'suit' => [
        'heading' => 'Who Microneedling May Suit, and Who Should Avoid It',
        'intro'   => 'Needling needs a treatment to support and a calm, healthy scalp to work on. The examination checks both before any needle is used.',
        'yes'     => ['heading' => 'May Be Discussed For', 'items' => [
            'Pattern thinning that has been diagnosed',
            'People already using a topical medicine such as minoxidil',
            'A plan that already includes PRP',
            'Anyone content with a modest, uncertain gain',
            'People who roll at home and want the routine checked',
        ]],
        'wait'    => ['heading' => 'Not Advised', 'items' => [
            'An infected, inflamed or flaking scalp',
            'Alopecia areata or another autoimmune scalp condition',
            'A tendency to keloids or raised scars',
            'Medicines affecting bleeding or healing, until reviewed',
            'Hair loss whose cause is still unknown',
        ]],
        'note'    => ['heading' => 'Other Causes Come First', 'paras' => [
            'Needling does nothing for low iron, thyroid disease, hormonal conditions or autoimmune hair loss; each of those needs its own treatment. See <a href="/blog/blood-tests-for-hair-fall">which blood tests matter for hair fall</a>.',
            'If you are not on any treatment yet, the first step is a <a href="/hair-fall-treatment-in-rohini">hair fall assessment at the Rohini clinic</a>.',
        ]],
    ],

    'options' => [
        'eyebrow'         => 'Clinic or home',
        'heading'         => 'Needling in the Clinic or Rolling at Home',
        'intro'           => 'Scalp rollers are cheap and easy to buy, and home use is where most needling goes wrong. The two differ in more than price.',
        'cards'           => [
            ['shield', 'mint', 'Needling at the Clinic', 'The depth is set for your scalp after an examination, skin and equipment are prepared under sterile conditions, and what you apply afterwards is written down.', [
                'Infection and inflammation ruled out first',
                'PRP straight after, if planned',
                'Progress compared with photographs',
            ]],
            ['alert', 'amber', 'A Roller at Home', 'Harm usually comes from needles that are too long, a roller that is not kept clean, rolling over sore skin or an irritating product on freshly needled skin.', [
                'Longer needles add risk, not benefit',
                'Keeping it clean matters',
                'Mention it at your assessment',
            ]],
        ],
        'choose'          => ['heading' => 'What the Doctor Sets for Your Scalp', 'items' => [
            'Whether needling adds anything to your plan',
            'The needle depth, and the reason for it',
            'Whether PRP is applied straight afterwards',
            'What may go on the scalp in the days after',
            'The number of sessions and when to review',
        ]],
        'related_heading' => 'Related Pages',
        'related'         => [
            '/hair-microneedling-in-rohini'               => 'Microneedling in Rohini',
            '/hair-prp-treatment-in-delhi'                => 'Hair PRP in Delhi',
            '/hair-mesotherapy-in-rohini'                 => 'Hair mesotherapy',
            '/blog/does-microneedling-work-for-hair-loss' => 'Does microneedling work?',
        ],
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'How a Microneedling Course Runs',
        'intro'     => 'Five stages at the Rohini clinic. The needling itself is the smallest part; the diagnosis and the review decide whether it is worth continuing.',
        'items'     => [
            ['search', 'Assessment', 'History, a magnified scalp examination, any blood tests your history suggests, and a look at your current treatment and home routine.'],
            ['doc', 'Plan', 'Baseline photographs, whether needling adds anything, whether PRP goes alongside, and the cost of the course in writing.'],
            ['shield', 'Preparation', 'On the day, the scalp is cleaned and a numbing preparation applied before any needle touches it.'],
            ['settings', 'Needling', 'Very fine needles at the chosen depth across the thinning area, then a topical medicine or PRP if planned.'],
            ['camera', 'Review', 'Over months, photographs are set against the baseline; if nothing has changed, the add-on stops.'],
        ],
        'note_html' => 'Read <a href="/blog/does-microneedling-work-for-hair-loss">what the microneedling studies actually tested</a> and <a href="/blog/minoxidil-and-finasteride-in-india">minoxidil and finasteride in India</a>.',
    ],

    'aftercare' => [
        'eyebrow'      => 'After a session',
        'heading'      => 'Caring for a Needled Scalp',
        'intro'        => 'Until the tiny punctures close, the scalp is more exposed than usual to sweat, water, sunlight and harsh products. General points only; your written aftercare sheet takes priority.',
        'timeline'     => [
            'The first day or so: redness, tenderness and a little tightness, more visible on short hair',
            'For a short while: no gym, heavy sweating, pools, saunas or steam rooms',
            'Until your sheet allows: no sun on the scalp and no product it does not list',
            'Call the clinic promptly: spreading redness, rising pain, a hot scalp or a fever',
        ],
        'tips_heading' => 'A Needled Scalp in Delhi',
        'tips'         => [
            ['clock', 'mint', 'Summer sun', 'Book a day when you can stay cool and indoors after the session.'],
            ['shield', 'violet', 'Helmets', 'A helmet traps sweat on a tender scalp; use a clean liner, and say if you ride daily.'],
            ['alert', 'sky', 'Smog and dust', 'Keep the scalp clean, avoid touching it and wash only as your sheet says.'],
            ['calendar', 'amber', 'Monsoon damp', 'Humid weeks make it harder to keep a scalp dry; take extra care until it settles.'],
        ],
    ],

    'cost' => [
        'heading'  => 'Hair Microneedling Cost in Delhi',
        'intro'    => 'Needling is charged per session, with no published price. The Rohini clinic writes up the cost of your course after the assessment, next to the treatment the needling supports.',
        'factors'  => [
            ['calendar', 'mint', 'How many sessions', 'Your diagnosis sets it; your response may change it.'],
            ['heart', 'violet', 'With or without PRP', 'A combined session is costed as one.'],
            ['chart', 'sky', 'Area needled', 'How much of the scalp the needling covers.'],
            ['doc', 'amber', 'Main treatment', 'Medication appears as its own line.'],
        ],
        'meta'     => 'Because needling is an extra, you should be able to drop it after the review; a prepaid package sold before an examination makes that hard.',
        'links'    => [
            '/prp-hair-treatment-cost-in-rohini' => 'If PRP is part of the plan',
            '/cost-and-emi-options'              => 'EMI and payment',
        ],
        'estimate' => ['heading' => 'Your Written Quote Sets Out', 'items' => [
            'Whether needling is included, and why',
            'The number of sessions and their spacing',
            'PRP, if planned, costed with the session',
            'Medication as a separate line',
            'When the review falls, and what happens if nothing changes',
        ], 'note' => 'Instalments through third-party lenders may be available; ask at the consultation, and compare the total payable with paying outright.'],
    ],

    'faqs' => [
        ['q' => 'Who is hair microneedling suitable for?',
         'a' => 'People with diagnosed thinning, usually pattern hair loss, who are already on a treatment it can support, such as a topical medicine or PRP. They should also accept that the effect is modest and uncertain. It is not done over an infected or inflamed scalp, or in alopecia areata or other autoimmune scalp conditions. It also waits with a tendency to keloids, or until medicines affecting bleeding or healing have been reviewed.'],
        ['q' => 'How many microneedling sessions will I need?',
         'a' => 'It runs as a course over several months, with sessions some weeks apart so the scalp can recover between them. The number depends on your diagnosis and the treatment needling supports, is written into your plan and is reviewed against baseline photographs.'],
        ['q' => 'Does microneedling regrow hair on its own?',
         'a' => 'That has not been shown. Most studies, small and short, tested needling together with a topical medicine such as minoxidil rather than by itself. The realistic hope is a small boost to a treatment you already use, and for some people even that does not happen. See <a href="/blog/does-microneedling-work-for-hair-loss">does microneedling work for hair loss</a>.'],
        ['q' => 'How much does hair microneedling cost in Delhi?',
         'a' => 'It is charged per session, and no fixed figure is published. After the assessment at the Rohini clinic you receive a written quote, with any PRP costed together with the needling and medication listed separately. <a href="/cost-and-emi-options">Cost and EMI options</a> covers payment.'],
        ['q' => 'Does it hurt, and what are the side effects?',
         'a' => 'A numbing preparation is generally applied first, and most people find needling uncomfortable rather than painful. Pinpoint bleeding during the session is expected, followed by redness, tenderness and mild tightness for a day or so. Any break in the skin carries a small risk of infection, and some products sting or irritate on newly needled skin.'],
        ['q' => 'When would I see a difference?',
         'a' => 'Slowly. Where there is a response, less shedding is the earliest sign, and density is judged over months against your baseline photographs. If the review shows no change, the needling stops.'],
        ['q' => 'Can microneedling be combined with PRP?',
         'a' => 'Yes, the two are often used together: PRP is applied to the scalp straight after needling so it can pass through the channels just made. Whether that combination suits you is decided at your assessment; see <a href="/hair-prp-treatment-in-delhi">hair PRP treatment in Delhi</a>.'],
        ['q' => 'Is microneedling the same as mesotherapy?',
         'a' => 'No. Mesotherapy injects a prepared solution into the scalp. Needling is mechanical: nothing is injected, and anything used goes on the surface afterwards. See <a href="/hair-mesotherapy-in-rohini">hair mesotherapy in Rohini</a>.'],
        ['q' => 'Is a scalp roller safe to use at home?',
         'a' => 'It can cause harm when the needles are too long, the roller is not cleaned, it is used over sore or flaking skin, or an irritating product follows. If you already roll at home, bring the details to your assessment and ask about needle length, frequency, cleaning and what to apply.'],
        ['q' => 'Can I go to work after a session?',
         'a' => 'Yes, nothing in the session stops you, but the scalp stays red and tender for a day or so, which shows more on short hair. Leave the gym, pools, saunas and steam rooms for a short while, and keep sun off the scalp.'],
        ['q' => 'What if needling does not suit me?',
         'a' => 'Your main treatment simply goes ahead without it. Needling is an extra, so leaving it out does not change the core of the plan, and the doctor explains the reason at the assessment.'],
        ['q' => 'What should I bring to my assessment?',
         'a' => 'A list of every medicine you take, particularly any that affect bleeding or healing. Also bring details of any roller or scalp product you use at home, and recent blood reports if you have them. Nothing is needled on the first visit, and no prescribed medicine should be stopped without the doctor’s advice.'],
        ['q' => 'Is the result permanent?',
         'a' => 'No. Needling does not alter the process behind pattern hair loss, so any benefit lasts only while the treatment it supports continues. When that treatment stops, thinning generally carries on.'],
        ['q' => 'Where in Delhi is hair microneedling done?',
         'a' => 'Only at the Rohini clinic in North-West Delhi, DenceSpot’s single clinic in the city, which handles the assessment, each session and every review. People from other parts of Delhi come to Rohini for these; you will find the areas we serve at the bottom of this page.'],
        ['q' => 'Can the clinic look at photos before I book?',
         'a' => 'Yes. Daylight photos of the thinning areas are enough for a first answer on WhatsApp. Whether needling would add anything to your treatment needs an in-person look at the scalp.'],
    ],
    'faq_about' => 'scalp, treatment or budget',

    'consult' => [
        'heading' => 'Book a Hair Microneedling Consultation in Delhi',
        'intro'   => 'Visit the Rohini clinic for a scalp examination and a clear plan for your hair loss. The doctor tells you whether needling would add anything to it and looks over any roller routine you follow at home; you decide afterwards.',
    ],

    'schema_type' => 'therapy',
    'schema'      => [
        'name'              => 'Hair Microneedling',
        'description'       => 'Controlled micro-punctures of the scalp with very fine needles, used as an add-on to diagnosed hair loss treatment at the Rohini clinic in Delhi, sometimes with PRP applied afterwards.',
        'alternateName'     => ['Hair Microneedling in Delhi', 'Scalp microneedling', 'Microneedling for hair loss'],
        'bodyLocation'      => 'Scalp',
        'howPerformed'      => 'After cleaning and a numbing preparation, very fine needles make controlled micro-injuries across the treatment area at a depth chosen for the patient; a topical treatment or platelet-rich plasma may be applied immediately afterwards. Sessions are spaced some weeks apart alongside established treatment.',
        'preparation'       => 'History and scalp examination to establish the cause of hair loss, investigation of reversible causes where indicated, exclusion of scalp infection, inflammation and autoimmune scalp disease, review of keloid tendency and of medicines affecting bleeding or healing, and baseline photographs.',
        'followup'          => 'Written aftercare, then review against baseline photographs over several months while the underlying treatment continues; stopped where there is no meaningful change.',
        'expectedPrognosis' => 'An adjunct, not a standalone treatment. Studies are mostly small and short and more supportive of needling combined with a topical medicine than of needling alone. Any benefit develops over months, depends on the underlying treatment continuing and does not halt pattern hair loss; some patients do not respond.',
    ],

    'area' => [
        'lead'            => 'Needling there is added only to a treatment that suits your diagnosis, never offered by itself, and the course is quoted in writing before the first session.',
        'feats'           => [['plus', 'An add-on only'], ['search', 'Scalp checked first'], ['doc', 'Written quote first']],
        'heading'         => 'Hair Microneedling for People Living in {area}',
        'visits_line'     => 'The assessment, each needling session and every review happen at the Rohini clinic, with your main treatment continuing at home in between.',
        'day_heading'     => 'On a Needling Day',
        'day'             => 'The scalp is cleaned and numbed before needling, and it stays red and tender for a day or so afterwards, which shows more on short hair. On the way back to {area}, keep sun off the scalp and use a clean helmet liner if you ride.',
        'visits_intro'    => 'An assessment first, then needling sessions some weeks apart over several months, with your progress reviewed against baseline photographs at the Rohini clinic.',
        'visit_icons'     => [['search', 'Assessment First'], ['plus', 'Added to Your Treatment'], ['calendar', 'Sessions Weeks Apart'], ['camera', 'Reviewed on Photographs']],
        'options_heading' => 'Clinic Needling, Home Rollers and PRP',
        'options_html'    => 'At the clinic the needle depth is set for your scalp after an examination, under sterile conditions, and PRP can be applied straight after. Most harm from needling comes from rollers used at home. <a href="{hub}#options">Clinic and home compared</a>.',
        'cost_heading'    => 'How Microneedling Is Costed',
        'cost_intro'      => 'It is charged per session, with any PRP costed together with the needling. After the assessment you get the course in writing, with medication on a line of its own.',
        'faqs'            => [
            ['q' => 'Can I have microneedling in {area}?',
             'a' => 'Not in {area} itself. DenceSpot has one Delhi clinic, in Rohini, North-West Delhi, and patients from {area} have their assessment, needling sessions and reviews there. Tap Directions for the exact spot on Google Maps.'],
            ['q' => 'Which way to the Rohini clinic from {area}?',
             'a' => '{route} For timings from your own street, try Google Maps or the DMRC journey planner, or message the clinic on WhatsApp.'],
            ['q' => 'How many trips from {area} does a course involve?',
             'a' => 'An assessment, then needling sessions some weeks apart over several months, and reviews against your baseline photographs. The number is set by your diagnosis and written into your plan, so you can arrange the journeys from {area} well ahead.'],
            ['q' => 'Is the cost different for patients from {area}?',
             'a' => 'No. The quote depends on the sessions, the area treated and whether PRP is included, not on where you live. You receive it in writing after the assessment; see <a href="/cost-and-emi-options">cost and EMI options</a>.'],
            ['q' => 'Will needling help if I am not on any treatment yet?',
             'a' => 'Unlikely. Needling is an add-on, and added to nothing it is unlikely to change the outcome. The first step is a diagnosis and a treatment that suits it; see <a href="/hair-fall-treatment-in-rohini">hair fall treatment in Rohini</a>.'],
            ['q' => 'I already use a roller at home. Should I mention it?',
             'a' => 'Yes. Bring the details to the assessment: needle length, how often you roll, how you clean the roller and what you apply afterwards. You will be told what, if anything, suits your scalp.'],
            ['q' => 'Will people at work in {area} notice the needling?',
             'a' => 'Possibly, for a day or so: the scalp is red and tender, which shows more on short hair. Work itself is usually fine, but the gym, pools, saunas and sun on the scalp wait for a short while.'],
        ],
        'consult_intro'   => 'Pick a day to visit the Rohini clinic. The doctor examines your scalp, confirms the cause of your hair loss and tells you honestly whether needling would add anything to your treatment. You are free to decide later.',
        'descriptions'    => [
            'Hair microneedling for {area} patients at DenceSpot’s Rohini clinic, Delhi: an add-on, with PRP, home rollers, the route, cost and FAQs.',
            'Hair microneedling for {area} at DenceSpot’s Rohini clinic, Delhi: with PRP, the route, cost and FAQs.',
            'Hair microneedling for {area} at DenceSpot’s Rohini clinic: cost and FAQs.',
        ],
    ],
];
