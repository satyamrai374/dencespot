<?php
/**
 * Copy for /hair-fall-treatment-in-delhi and its area pages (schema:
 * includes/delhi-treatment-pillar.php). Facts as on /hair-fall-treatment-in-rohini,
 * written fresh. Diagnosis first; no prices, no doses, no brand names.
 */

declare(strict_types=1);

return [
    'title'          => [
        'Hair Fall Treatment in Delhi: Causes & Tests | DenceSpot',
        'Hair Fall Treatment in Delhi: Causes & Tests',
        'Hair Fall Treatment in Delhi | DenceSpot Rohini',
    ],
    'description'    => 'Hair fall treatment in Delhi at DenceSpot’s Rohini clinic: shedding vs pattern loss, the blood tests that may be needed, treatment paths, cost and FAQs.',
    'keywords'       => ['hair fall treatment in delhi', 'hair loss treatment delhi', 'hair fall doctor in delhi', 'telogen effluvium treatment delhi', 'blood test for hair fall delhi', 'hair fall treatment in rohini'],
    'form_treatment' => 'Hair fall treatment',
    'form'           => ['Hair fall treatment', "Women's hair loss treatment",'Patchy hair loss (alopecia areata)', 'Dandruff or itchy scalp', 'Not sure — please advise'],

    'hero' => [
        'lead'  => 'More hair in the comb can come from a recent fever, low iron, a thyroid problem, an irritated scalp or inherited thinning, and each needs something different. At our Rohini clinic the reason is pinned down by examination, with tests where your history calls for them, before any treatment is suggested.',
        'feats' => [['search', 'Diagnosis before treatment'], ['doc', 'Tests only when indicated'], ['camera', 'Baseline photographs'], ['calendar', 'Reviews over months']],
    ],

    'about' => [
        'heading' => 'What Hair Fall Treatment Involves',
        'paras'   => [
            'Treatment for hair fall is not one product or one procedure. It is a diagnosis, followed by whatever that diagnosis calls for: putting right a deficiency, settling an inflamed scalp, giving a temporary shed time with a review date, or prescribed medicine once inherited thinning is confirmed.',
            'The two commonest patterns behave very differently. Telogen effluvium is a sudden, all-over shed that follows a trigger by two or three months and usually eases by itself; pattern hair loss is slow, inherited and progressive, and needs ongoing treatment to hold ground. DenceSpot’s Delhi assessments and follow-ups take place at the Rohini clinic, where the doctors are registered medical practitioners.',
        ],
        'cta'     => ['#suitability', 'See When to Get Checked'],
        'glance'  => [
            ['search', 'mint', 'First visit', 'History, scalp examination and a pull test'],
            ['doc', 'violet', 'Blood tests', 'Chosen from your history, not a fixed panel'],
            ['chart', 'sky', 'First sign of change', 'Less shedding, often by 2–3 months'],
            ['camera', 'amber', 'Fair comparison', 'Photographs at about 6 months'],
        ],
    ],

    'middle' => [
        'heading' => 'Common Causes, and What Is Checked',
        'sub'     => 'General patient education; two causes often overlap.',
        'cols'    => ['Likely cause', 'Usually checked'],
        'rows'    => [
            ['Telogen effluvium', 'The months before it began'],
            ['Low iron', 'Ferritin and a blood count'],
            ['Thyroid problem', 'Thyroid function'],
            ['Low vitamin D or B12', 'Blood levels, if indicated'],
            ['Pattern hair loss', 'Family history, trichoscopy'],
            ['Scalp condition', 'Scaling and redness, magnified'],
            ['Medicine or supplement', 'Everything you take'],
        ],
        'note'    => 'Biotin can upset some lab results, thyroid tests among them, so mention it before any blood is drawn.',
    ],
    'results' => false,

    'why' => [
        'intro'  => 'What a hair fall assessment at the Rohini clinic includes, and how progress is tracked once a plan is under way.',
        'icons'  => [
            ['user', 'Seen by a Registered Doctor'],
            ['search', 'Trichoscopy and a Pull Test'],
            ['doc', 'Tests Matched to Your History'],
            ['list', 'A Written, Cause-Led Plan'],
            ['camera', 'Progress Judged on Photographs'],
            ['pin', 'Rohini Clinic, North-West Delhi'],
        ],
        'media'  => 'map',
    ],

    'suit' => [
        'heading' => 'When Hair Fall Is Worth Getting Checked',
        'intro'   => 'Some daily shedding is part of the normal hair cycle, commonly somewhere around 50 to 100 hairs, with more on the days you wash. The first list is worth an examination; the second is often temporary, though it still deserves a look if it lasts beyond six to eight weeks.',
        'yes'     => ['heading' => 'Worth an Examination', 'items' => [
            'Extra shedding that has gone on for more than six to eight weeks',
            'A parting that keeps widening, or a hairline moving back',
            'Smooth, round bare patches on the scalp, beard or eyebrows',
            'An itchy, scaly, red or sore scalp',
            'Hair fall alongside tiredness, weight change or irregular periods',
        ]],
        'wait'    => ['heading' => 'Often Temporary, but Watch It', 'items' => [
            'A rough week or two of shedding that returns to your usual level',
            'Extra hairs on wash day after several days without washing',
            'Short snapped pieces from heat, tight bands or hard water: breakage, not shedding',
            'A shed that began after a fever or illness and is already easing',
            'A brief rise in shedding soon after starting minoxidil',
        ]],
        'note'    => ['heading' => 'Shedding or Thinning?', 'paras' => [
            'Two different things get called hair fall: hairs coming out in larger numbers, and hairs that grow back finer with each cycle. A diffuse shed two or three months after an illness, an operation, childbirth or a crash diet is usually telogen effluvium. See <a href="/blog/telogen-effluvium-vs-pattern-hair-loss">telogen effluvium vs pattern hair loss</a>.',
            'Unsure which applies to you? The <a href="/hair-loss-assessment">hair loss self-assessment</a> suggests a next step in six questions, though it cannot replace a scalp examination.',
        ]],
    ],

    'options' => [
        'eyebrow'         => 'Treatment paths',
        'heading'         => 'Two Kinds of Hair Fall, Two Treatment Paths',
        'intro'           => 'Most hair fall belongs to one of two groups, and the treatment depends on which. Some people have both at once, which is why the examination comes before any prescription.',
        'cards'           => [
            ['heart', 'mint', 'Reversible Causes', 'Telogen effluvium, low iron, thyroid disease, a vitamin deficiency, a scalp condition or traction from tight styles. Once the cause is corrected or has passed, hair commonly regrows over the following months.', [
                'Treatment has an end point',
                'Correcting the cause comes first',
                'Regrowth is judged in months',
            ]],
            ['chart', 'violet', 'Pattern Hair Loss', 'Inherited thinning at the temples and crown in men, or along the parting in women, that progresses over years. Prescribed medicine can slow it and thicken hairs that are shrinking, but only for as long as it is used.', [
                'Managed long term, not a cure',
                'Minoxidil is usually the first step',
                'The benefit fades if treatment stops',
            ]],
        ],
        'choose'          => ['heading' => 'How the Doctor Decides the Plan', 'items' => [
            'Whether hair is shedding, thinning or lost in patches',
            'What trichoscopy and the pull test show',
            'Blood results, where tests were needed',
            'Pregnancy plans and the medicines you already take',
            'The least invasive option that fits the diagnosis',
        ]],
        'related_heading' => 'Related Care at the Rohini Clinic',
        'related'         => [
            '/hair-fall-treatment-in-rohini'          => 'Hair fall treatment in Rohini',
            '/womens-hair-loss-treatment-in-rohini'   => 'Women’s hair loss',
            '/dandruff-treatment-in-rohini'           => 'Dandruff and scalp care',
            '/alopecia-areata-treatment-in-rohini'    => 'Patchy hair loss',
            '/hair-prp-treatment-in-delhi'            => 'Hair PRP in Delhi',
        ],
    ],

    'steps' => [
        'eyebrow'   => 'From first visit to review',
        'heading'   => 'How Hair Fall Is Diagnosed and Treated',
        'intro'     => 'Five stages at the Rohini clinic; nothing long-term is started before the diagnosis in stage three.',
        'items'     => [
            ['chat', 'History', 'When the fall began, illness, diet, stress, periods or pregnancy where relevant, family history and every tablet or supplement you take.'],
            ['search', 'Scalp Examination', 'Trichoscopy under magnification and a gentle pull test, looking at hair thickness, the follicle openings and the skin.'],
            ['doc', 'Tests & Diagnosis', 'Blood tests only where the history points to them, then the diagnosis, the plan and its cost written down for you.'],
            ['heart', 'Treatment', 'The cause corrected first; prescribed medicine for pattern loss; in-clinic options only if they add something.'],
            ['camera', 'Review', 'Photographs compared with the baseline at about six months, and a fuller review of the plan at twelve.'],
        ],
        'note_html' => 'More in <a href="/blog/blood-tests-for-hair-fall">blood tests for hair fall</a> and <a href="/blog/who-should-assess-hair-fall">who should assess hair fall</a>.',
    ],

    'aftercare' => [
        'eyebrow'      => 'Following your plan',
        'heading'      => 'Following a Hair Fall Plan in Delhi',
        'intro'        => 'Hair answers slowly, so the months between visits matter more than the visits themselves. General guidance only; your written plan comes first.',
        'timeline'     => [
            'The first two months: blood results acted on and any scalp problem treated; minoxidil, if prescribed, can briefly raise shedding',
            'Two to three months: less shedding is usually the first sign that the plan is working',
            'Around six months: photographs set beside the baseline for the first fair comparison',
            'Twelve months: a full review to continue, adjust or change the plan',
        ],
        'tips_heading' => 'Hair Fall and Delhi Life',
        'tips'         => [
            ['clock', 'mint', 'Summer sweat', 'Washing a sweaty scalp regularly helps; the hairs seen on wash day had already let go.'],
            ['alert', 'violet', 'Hard water', 'It leaves hair dry and prone to snapping, which is breakage rather than true hair fall.'],
            ['shield', 'sky', 'Winter smog', 'Dust and smog irritate the scalp, but evidence that they cause hair loss in people is limited.'],
            ['calendar', 'amber', 'Festivals and travel', 'Pack enough of anything prescribed for a trip, and book reviews around weddings and festivals.'],
        ],
    ],

    'cost' => [
        'heading'  => 'Hair Fall Treatment Cost in Delhi',
        'intro'    => 'There is no set price for hair fall treatment, because the diagnosis decides what you need. A deficiency or a passing trigger mostly means the consultation, the tests your history calls for and short-term treatment; pattern loss costs more over time because treatment continues. Your plan is costed in writing after the assessment at the Rohini clinic.',
        'factors'  => [
            ['search', 'mint', 'The diagnosis', 'A reversible cause usually costs less than ongoing care for pattern loss.'],
            ['doc', 'violet', 'Blood tests', 'Only the ones your history calls for, listed separately.'],
            ['clock', 'sky', 'How long treatment runs', 'Short for a passing trigger; ongoing for pattern loss.'],
            ['heart', 'amber', 'In-clinic courses', 'PRP or GFC only if they add something, priced as a course.'],
        ],
        'meta'     => 'When comparing clinics, ask what the diagnosis is, which tests are being ordered and why, and what a year of the plan will cost rather than a month.',
        'links'    => [
            '/cost-and-emi-options'              => 'Cost and EMI options',
            '/prp-hair-treatment-cost-in-rohini' => 'PRP cost guide (Rohini)',
        ],
        'estimate' => ['heading' => 'What Your Written Plan Sets Out', 'items' => [
            'The diagnosis, in plain words',
            'Any blood tests, and why each is needed',
            'Prescribed treatment and how long it runs',
            'Review dates and what will be compared',
            'In-clinic sessions, only if recommended',
        ], 'note' => 'For in-clinic courses, instalment options through third-party lenders may be available; ask at the consultation.'],
    ],

    'faqs' => [
        ['q' => 'What is the treatment for hair fall?',
         'a' => 'It depends on the cause, so the first step is finding it. Reversible causes such as low iron, a thyroid problem, a scalp condition or a recent trigger are corrected, or given time with a review date. Inherited pattern loss is treated with prescribed medicine, and in-clinic options or surgery are considered only in selected cases.'],
        ['q' => 'How much hair fall is normal in a day?',
         'a' => 'Roughly 50 to 100 hairs a day is typical, with more on wash days or after a few days without washing. What deserves a look is shedding above your usual level for more than six to eight weeks, a widening parting, bare round patches, or a scalp that itches and flakes.'],
        ['q' => 'Which blood tests are done for hair fall?',
         'a' => 'Only those your history and examination suggest. The usual ones are a blood count, ferritin for iron stores, thyroid function, vitamin D and B12, with hormone tests for some women. If you take biotin, say so before blood is drawn, because it can distort some results. See <a href="/blog/blood-tests-for-hair-fall">blood tests for hair fall</a>.'],
        ['q' => 'What is telogen effluvium?',
         'a' => 'A temporary, all-over shed that usually begins two to three months after a trigger such as a high fever, an operation, childbirth, a crash diet or a stressful period. It generally settles once the trigger has passed, so the work is ruling out other causes and checking progress. See <a href="/blog/telogen-effluvium-vs-pattern-hair-loss">telogen effluvium vs pattern hair loss</a>.'],
        ['q' => 'Will my hair grow back?',
         'a' => 'Often, when the cause is reversible: hair lost to low iron, a thyroid problem or a passing trigger commonly regrows over months once that is dealt with. Pattern hair loss is different. Medicine can slow it and thicken hairs that are shrinking, but it is not a cure, and follicles that have already gone do not return without surgery.'],
        ['q' => 'How much does hair fall treatment cost in Delhi?',
         'a' => 'There is no fixed price, because the diagnosis decides the plan. A reversible cause mostly means the consultation, the tests you need and short-term treatment; pattern loss costs more over time. At the Rohini clinic your plan is costed in writing after the assessment. See <a href="/cost-and-emi-options">cost and EMI options</a>.'],
        ['q' => 'How long before I see a difference?',
         'a' => 'Expect months rather than weeks. Less shedding usually comes first, often within two to three months; a fair comparison of thickness against your baseline photographs is possible at about six months, with a fuller review at twelve.'],
        ['q' => 'Is hair fall caused by stress?',
         'a' => 'A stressful spell is one recognised trigger of telogen effluvium, which shows up as shedding two or three months later and usually settles. Stress is rarely the whole story, though, so low iron, thyroid problems and pattern loss are still checked rather than assumed away.'],
        ['q' => 'Will I need to take medicine for life?',
         'a' => 'Only for pattern hair loss, where treatment holds ground for as long as it is used. A reversible cause such as low iron or telogen effluvium has an end point. The assessment tells you which situation you are in; do not start or stop a prescribed hair-loss medicine without speaking to the doctor. See <a href="/blog/minoxidil-and-finasteride-in-india">minoxidil and finasteride in India</a>.'],
        ['q' => 'Do oils, shampoos or supplements stop hair fall?',
         'a' => 'Oils and shampoos act on the hair shaft and the skin surface rather than the follicle, though a medicated shampoo helps a scalp condition such as dandruff. A supplement makes sense for a deficiency a blood test has shown; without one it seldom helps, and too much vitamin A or selenium can itself cause hair loss. See <a href="/blog/rosemary-onion-juice-and-hair-oils-for-hair-fall">rosemary, onion juice and hair oils</a>.'],
        ['q' => 'Can dandruff cause hair fall?',
         'a' => 'An inflamed, flaking scalp from seborrhoeic dermatitis or a fungal infection can push shedding up until the skin settles. Treating the scalp usually helps; if thinning carries on afterwards, another cause is looked for. See <a href="/blog/can-dandruff-cause-hair-fall">can dandruff cause hair fall</a>.'],
        ['q' => 'Does Delhi’s water or pollution cause hair fall?',
         'a' => 'Hard water mostly makes hair dry and brittle, so it snaps; that can look like hair fall but is not shedding from the root. Smog and dust can irritate the scalp and worsen dandruff, but the evidence that air pollution causes hair loss in people is limited. A widening parting or bare patches still need their cause found.'],
        ['q' => 'Is hair fall treated differently in women?',
         'a' => 'More is usually checked, because low iron, thyroid disease, PCOS and shedding after childbirth are common in women and often overlap. Some hair-loss medicines are unsuitable during pregnancy or when trying to conceive, so mention any plans. See <a href="/womens-hair-loss-treatment-in-rohini">women’s hair loss treatment</a>.'],
        ['q' => 'Will I need PRP or a hair transplant?',
         'a' => 'Usually not at first. PRP may be discussed for thinning where follicles are still present, alongside medicine, and a transplant only where hair has already been lost and the pattern has settled. See <a href="/hair-prp-treatment-in-delhi">hair PRP treatment in Delhi</a> and <a href="/hair-transplant-in-delhi">hair transplant in Delhi</a>.'],
        ['q' => 'Which parts of Delhi do you see patients from?',
         'a' => 'Patients come from across the city to DenceSpot’s one Delhi clinic, in Rohini, North-West Delhi. The history, examination, any tests and every review take place there; the areas we serve are listed at the foot of this page.'],
    ],
    'faq_about' => 'scalp, health or medicines',

    'consult' => [
        'heading' => 'Book a Hair Fall Assessment in Delhi',
        'intro'   => 'See a doctor at the Rohini clinic for a history, a scalp examination and only the tests your case needs, and leave with a written plan aimed at the cause, even when that plan is simply to wait and review. You decide afterwards whether to go ahead.',
    ],

    'schema_type' => 'therapy',
    'schema'      => [
        'name'              => 'Hair Fall Treatment',
        'description'       => 'Assessment of hair fall to establish its cause, followed by treatment directed at that cause, at DenceSpot’s Rohini clinic in Delhi.',
        'alternateName'     => ['Hair Fall Treatment in Delhi', 'Hair Loss Treatment in Delhi', 'Telogen effluvium management'],
        'bodyLocation'      => 'Scalp',
        'howPerformed'      => 'Clinical history, trichoscopy and a hair pull test, with blood investigations selected from the history, commonly a blood count, ferritin, thyroid function, vitamin D and B12, and hormonal tests in some women. Management follows the diagnosis: correction of deficiencies and thyroid disease, treatment of scalp conditions, observation with review for telogen effluvium, prescribed medical therapy for pattern hair loss, and in selected cases in-clinic therapy or hair restoration surgery.',
        'preparation'       => 'A timeline of the hair fall and the months before it, medical and family history, a list of all medicines and supplements with biotin noted before blood tests, and baseline photographs.',
        'followup'          => 'Comparison with baseline photographs at about six months and a fuller review at twelve months; reversible causes are rechecked once corrected.',
        'expectedPrognosis' => 'Varies with the cause. Shedding from a deficiency, thyroid disease or telogen effluvium commonly recovers once the cause is corrected or has passed. Pattern hair loss is progressive and managed over the long term; medical treatment helps only while it continues, and not everyone responds.',
    ],

    'area' => [
        'lead'            => 'Hair fall treatment there begins with finding the cause, through a history, a scalp examination and tests only where needed, and the plan and its cost are given to you in writing.',
        'feats'           => [['search', 'Cause found first'], ['doc', 'Tests only if indicated'], ['camera', 'Progress on photographs']],
        'heading'         => 'Hair Fall Treatment for Patients From {area}',
        'visits_line'     => 'The assessment, any treatment and every review for hair fall take place at the Rohini clinic.',
        'day_heading'     => 'On Your First Visit',
        'day'             => 'When you set out from {area}, bring a list of every medicine and supplement, any blood reports from the last few months and a few older photographs of your hair. The first visit is a history and a scalp examination, so you can go straight back to work or home afterwards. If you take biotin, mention it before any blood is drawn.',
        'visits_intro'    => 'A first assessment, a follow-up to go over any blood results, then reviews at about six and twelve months — all at the Rohini clinic.',
        'visit_icons'     => [['search', 'Assessment First'], ['doc', 'Results Explained'], ['camera', 'Six-Month Photo Review'], ['calendar', 'Twelve-Month Review']],
        'options_heading' => 'How Hair Fall Is Treated at the Rohini Clinic',
        'options_html'    => 'Reversible causes such as low iron, a thyroid problem or a recent illness are corrected or given time to settle; inherited pattern loss is managed with prescribed medicine for as long as it is used. <a href="{hub}#options">Both treatment paths explained</a>.',
        'cost_heading'    => 'What Decides the Cost of Hair Fall Treatment',
        'cost_intro'      => 'There is no fixed price. A reversible cause usually means the consultation, the tests you need and short-term treatment, while pattern loss costs more over time; your plan is costed in writing after the assessment.',
        'faqs'            => [
            ['q' => 'Is there a DenceSpot clinic in {area}?',
             'a' => 'Not in {area}. The only DenceSpot clinic in Delhi is in Rohini, North-West Delhi; patients from {area} have their assessment and reviews there, and the Directions button shows exactly where it is.'],
            ['q' => 'How do I get to the Rohini clinic from {area}?',
             'a' => '{route} For door-to-door timings, check Google Maps or the DMRC journey planner, or ask the clinic on WhatsApp.'],
            ['q' => 'How many visits will hair fall treatment need?',
             'a' => 'Usually a first assessment, a follow-up once any blood results are back, and reviews at about six and twelve months. Most hair fall treatment, such as correcting a deficiency or prescribed medicine, is followed at home between visits, so trips from {area} to Rohini are spread out.'],
            ['q' => 'Does living in {area} change the cost?',
             'a' => 'No. The cost follows your diagnosis and plan, not your address, and it is set out in writing after the assessment. See <a href="/cost-and-emi-options">cost and EMI options</a>.'],
            ['q' => 'Is my hair fall worth the trip from {area}?',
             'a' => 'If extra shedding has gone on for more than six to eight weeks, your parting is widening, round patches have appeared or the scalp is itchy and scaly, an examination is worthwhile. A heavier week that settles by itself usually is not. Photos sent on WhatsApp can help you decide.'],
            ['q' => 'Will I need blood tests?',
             'a' => 'Only if your history and examination point to them. Common ones are a blood count, ferritin, thyroid function, vitamin D and B12, with hormone tests for some women. See <a href="/blog/blood-tests-for-hair-fall">blood tests for hair fall</a>.'],
            ['q' => 'Can I ask a question on WhatsApp first?',
             'a' => 'Yes. Send daylight photographs of your parting, hairline or any patches to the clinic on WhatsApp, with a short note on when the hair fall began. The clinic can tell you whether an assessment makes sense, though a diagnosis needs an examination in person.'],
        ],
        'consult_intro'   => 'Book a hair fall assessment at the Rohini clinic on a day that suits you. A doctor takes your history, examines your scalp, orders only the tests your case needs and explains the cause and the plan in writing.',
        'descriptions'    => [
            'Hair fall treatment for patients from {area} at DenceSpot’s Rohini clinic, Delhi: causes, blood tests, the route, visits, cost and FAQs.',
            'Hair fall treatment for {area} at DenceSpot’s Rohini clinic, Delhi: causes, tests, the route, cost and FAQs.',
            'Hair fall treatment for {area} at DenceSpot’s Rohini clinic: causes, tests, cost and FAQs.',
        ],
    ],
];
