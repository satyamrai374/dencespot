<?php
/**
 * Copy for /womens-hair-loss-treatment-in-delhi and its area pages (schema:
 * includes/delhi-treatment-pillar.php). Facts as on
 * /womens-hair-loss-treatment-in-rohini, written fresh. Diagnosis first;
 * pregnancy cautions as on that page; no prices, no doses, no brand names.
 */

declare(strict_types=1);

return [
    'title'          => [
        "Women's Hair Loss Treatment in Delhi: Thyroid & PCOS | DenceSpot",
        "Women's Hair Loss Treatment in Delhi: Iron, Thyroid & PCOS",
        "Women's Hair Loss Treatment in Delhi | DenceSpot",
    ],
    'description'    => 'Women’s hair loss treatment in Delhi at DenceSpot’s Rohini clinic: pattern thinning, iron, thyroid, PCOS and postpartum shedding, tests, cost and FAQs.',
    'keywords'       => ["women's hair loss treatment in delhi", 'female hair loss treatment delhi', 'female pattern hair loss treatment delhi', 'pcos hair loss treatment delhi', 'hair fall after pregnancy delhi', "women's hair loss treatment in rohini"],
    'form_treatment' => 'Hair fall treatment',
    'form'           => ["Women's hair loss treatment", 'Hair fall after pregnancy', 'Thinning with PCOS or thyroid', 'Hair PRP treatment', 'Not sure — please advise'],

    'hero' => [
        'lead'  => 'Hair loss in women is rarely down to one thing. Female pattern thinning, low iron, thyroid disease, PCOS and shedding after childbirth can sit side by side, so at our Rohini clinic each is checked, with your pregnancy plans in mind, before a treatment is chosen.',
        'feats' => [['search', 'Several causes checked'], ['doc', 'Tests chosen for you'], ['heart', 'Pregnancy plans first'], ['calendar', 'Reviewed over months']],
    ],

    'about' => [
        'heading' => "How Women's Hair Loss Is Treated",
        'paras'   => [
            'Treatment starts by sorting out which kind of hair loss you have. Diffuse shedding usually has a trigger or a deficiency behind it; a parting that widens slowly while the front hairline holds is typical of female pattern hair loss; loss at the temples often follows years of tight styles. Each is handled differently, and many women have more than one.',
            'Reversible causes such as low iron, thyroid disease, PCOS or a recent delivery are corrected or given time first. Pattern thinning is then managed with prescribed treatment chosen around pregnancy and breastfeeding. In Delhi, the assessment and every review take place at DenceSpot’s Rohini clinic.',
        ],
        'cta'     => ['#suitability', 'See Which Signs to Act On'],
        'glance'  => [
            ['search', 'mint', 'First visit', 'History, parting and scalp examined'],
            ['doc', 'violet', 'Blood tests', 'Iron, thyroid and hormones where indicated'],
            ['heart', 'sky', 'Pregnancy', 'Plans discussed before any medicine'],
            ['clock', 'amber', 'Timescale', 'Judged over 6 to 12 months'],
        ],
    ],

    'middle' => [
        'heading' => 'What Is Checked, and Why',
        'sub'     => 'Common causes in women; two or three often run together.',
        'cols'    => ['Possible cause', 'Usually checked'],
        'rows'    => [
            ['Female pattern thinning', 'Parting from above, trichoscopy'],
            ['Low iron', 'Ferritin and a blood count'],
            ['Thyroid disease', 'Thyroid function tests'],
            ['PCOS or raised androgens', 'Periods, acne, hormone tests'],
            ['After childbirth', 'Delivery date, ferritin'],
            ['Tight hairstyles', 'Styling history, the hairline'],
            ['Medicines or supplements', 'All you take, the pill included'],
        ],
        'note'    => 'Tests are chosen from your history rather than a fixed panel; mention biotin before any blood is drawn.',
    ],
    'results' => false,

    'why' => [
        'intro'  => 'What the assessment of hair loss in women covers at the Rohini clinic, and how the plan is fitted around the rest of your life.',
        'icons'  => [
            ['user', 'Registered Medical Practitioners'],
            ['chat', 'Periods and Pregnancy Asked About'],
            ['doc', 'Tests Chosen From Your History'],
            ['heart', 'Pregnancy-Aware Plans'],
            ['camera', 'Parting Photographed at Reviews'],
            ['pin', 'Rohini Clinic, North-West Delhi'],
        ],
        'media'  => 'map',
    ],

    'suit' => [
        'heading' => 'Signs Worth Having Examined',
        'intro'   => 'Shedding rises for a while after childbirth or illness, and some loss on wash days is normal. The first list is worth an assessment; the second often settles, though it still deserves a look if it carries on.',
        'yes'     => ['heading' => 'Worth an Assessment', 'items' => [
            'A centre parting clearly wider than it was a year ago',
            'A thinner ponytail, or more scalp showing on top',
            'Shedding that continues well past six to nine months after a delivery',
            'Thinning with irregular periods, acne or extra facial hair',
            'Loss at the temples, hairline or eyebrows, or any round bare patch',
        ]],
        'wait'    => ['heading' => 'Often Settles, With a Review Date', 'items' => [
            'Heavy shedding that begins a few months after childbirth',
            'A shed two to three months after an operation or a crash diet',
            'Hair snapping from heat styling, tight bands or hard water',
            'Hair that feels thinner only at the ends, from breakage',
            'Some extra hair on wash days, within your usual range',
        ]],
        'note'    => ['heading' => 'Before Any Treatment Starts', 'paras' => [
            'Pregnancy, breastfeeding or plans to conceive, even a year or two away, change which treatments are suitable, so mention them at the first visit. See <a href="/blog/hair-fall-after-pregnancy">hair fall after pregnancy</a>.',
            'Low iron and thyroid disease are found on blood tests rather than guessed. See <a href="/blog/thyroid-and-hair-loss">thyroid and hair loss</a> and <a href="/blog/blood-tests-for-hair-fall">blood tests for hair fall</a>.',
        ]],
    ],

    'options' => [
        'eyebrow'         => 'Treatment options',
        'heading'         => 'Correcting the Cause, Then Treating Pattern Thinning',
        'intro'           => 'Most plans for women have two parts: put right whatever is reversible, then treat any pattern thinning that remains. Which medicine, and whether it suits you, is a prescription decision made at the consultation.',
        'cards'           => [
            ['heart', 'mint', 'Correcting the Cause', 'Iron replaced and rechecked, thyroid disease treated, PCOS managed as a condition in its own right, sometimes with a gynaecologist or endocrinologist, and tension taken off the hairline. Shedding after childbirth is mostly given time.', [
                'Sometimes the whole treatment',
                'Guided by blood results',
                'Hair follows over months',
            ]],
            ['chart', 'violet', 'Treating Pattern Thinning', 'Minoxidil on the scalp is the usual first treatment. Some women are offered tablets, such as low-dose oral minoxidil or an anti-androgen, off-label and with monitoring. Finasteride is not a standard treatment for women.', [
                'Not a cure: helps while it is used',
                'Chosen around pregnancy plans',
                'A brief extra shed can occur at the start',
            ]],
        ],
        'choose'          => ['heading' => 'What Shapes Your Plan', 'items' => [
            'Shedding, thinning or both, confirmed on examination',
            'Blood results for iron, thyroid and, where indicated, hormones',
            'Pregnancy, breastfeeding or plans to conceive',
            'Your periods, skin and any PCOS symptoms',
            'A routine you can realistically keep up for months',
        ]],
        'related_heading' => 'Related Care at the Rohini Clinic',
        'related'         => [
            '/womens-hair-loss-treatment-in-rohini' => 'Women’s hair loss in Rohini',
            '/hair-fall-treatment-in-rohini'        => 'Hair fall treatment',
            '/hair-transplant-for-women-in-rohini'  => 'Hair transplant for women',
            '/hair-prp-treatment-in-delhi'          => 'Hair PRP in Delhi',
            '/blog/hair-fall-after-pregnancy'       => 'Hair fall after pregnancy',
        ],
    ],

    'steps' => [
        'eyebrow'   => 'From first visit to review',
        'heading'   => "How Women's Hair Loss Is Assessed and Treated",
        'intro'     => 'Five stages at the Rohini clinic; treatment is decided only once the cause, or causes, are clear.',
        'items'     => [
            ['chat', 'History', 'When it began, periods, pregnancies and breastfeeding, contraception, diet, styling, family history and every medicine or supplement.'],
            ['search', 'Examination', 'The parting viewed from above, the hairline and brows, and trichoscopy to record hair thickness as a baseline.'],
            ['doc', 'Tests & Plan', 'Blood tests where indicated, then the diagnosis, the treatment and its cost given to you in writing.'],
            ['heart', 'Treatment', 'Reversible causes corrected first; prescribed treatment for pattern thinning, chosen around pregnancy plans.'],
            ['camera', 'Review', 'Your parting photographed and compared with the baseline at about six months, then again at twelve.'],
        ],
        'note_html' => 'More in <a href="/blog/female-pattern-hair-loss-in-women">female pattern hair loss in women</a> and <a href="/blog/minoxidil-and-finasteride-in-india">minoxidil and finasteride</a>.',
    ],

    'aftercare' => [
        'eyebrow'      => 'Following your plan',
        'heading'      => 'Keeping Your Plan Going Between Reviews',
        'intro'        => 'Hair in women usually changes slowly, and the longer timelines are normal rather than a sign that nothing is happening. General guidance only; your written plan comes first.',
        'timeline'     => [
            'The first weeks: blood results discussed, and iron, thyroid or hormonal treatment begun where needed',
            'Two to three months: shedding usually eases first; minoxidil can cause a short-lived shed at the start',
            'About six months: your parting compared with the baseline photographs',
            'Twelve months: a full review, where holding steady counts as progress for pattern thinning',
        ],
        'tips_heading' => 'Hair Care Through Delhi’s Year',
        'tips'         => [
            ['clock', 'mint', 'Summer styling', 'A tight bun worn daily in the heat strains the temples; keep it loose and vary where it sits.'],
            ['alert', 'violet', 'Hard water', 'Dry, rough hair snaps more easily; snapped pieces are breakage, not shedding.'],
            ['shield', 'sky', 'Monsoon damp', 'Hair tied up wet tangles and breaks, and humid months can aggravate dandruff.'],
            ['calendar', 'amber', 'Weddings and travel', 'Book reviews around the wedding season and pack enough of anything prescribed.'],
        ],
    ],

    'cost' => [
        'heading'  => "Women's Hair Loss Treatment Cost in Delhi",
        'intro'    => 'The diagnosis decides the cost, so there is no set price. A reversible cause mostly means the consultation, the tests you need and treatment for that condition; female pattern thinning costs more over time because treatment carries on. Your plan is costed in writing after the assessment at the Rohini clinic.',
        'factors'  => [
            ['search', 'mint', 'The cause', 'Low iron or a passing shed usually costs less than ongoing care for pattern thinning.'],
            ['doc', 'violet', 'Blood tests', 'Iron, thyroid and hormone tests only if indicated, listed separately.'],
            ['clock', 'sky', 'Length of treatment', 'Months for a reversible cause; ongoing for pattern thinning.'],
            ['heart', 'amber', 'In-clinic sessions', 'PRP only if it adds something, quoted as a course.'],
        ],
        'meta'     => 'Ask any clinic whether a suggested medicine suits pregnancy or breastfeeding, and what the plan costs over a year rather than a month.',
        'links'    => [
            '/cost-and-emi-options'              => 'Cost and EMI options',
            '/prp-hair-treatment-cost-in-rohini' => 'PRP cost guide (Rohini)',
        ],
        'estimate' => ['heading' => 'What Your Written Plan Covers', 'items' => [
            'The diagnosis, or diagnoses',
            'Tests ordered, and the reason for each',
            'Prescribed treatment and how long it runs',
            'Any pregnancy or breastfeeding cautions',
            'Review dates, and in-clinic sessions if any',
        ], 'note' => 'Where a plan includes in-clinic sessions, instalment options through third-party lenders may be available; ask at the consultation.'],
    ],

    'faqs' => [
        ['q' => 'What is the treatment for hair loss in women?',
         'a' => 'It follows the cause. Low iron, thyroid disease and hormonal conditions such as PCOS are treated first; shedding after childbirth is usually given time; female pattern thinning is managed with prescribed treatment, most often minoxidil on the scalp. PRP or a transplant is considered for only a few women, and only after medical treatment.'],
        ['q' => 'What causes hair loss in women?',
         'a' => 'The common causes are female pattern hair loss, telogen effluvium after an illness, operation or crash diet, shedding after childbirth, low iron, thyroid disease, PCOS and tight hairstyles. Medicines, and too much vitamin A or selenium, can play a part too. Two or three often overlap, which is why the history and tests matter.'],
        ['q' => 'Which blood tests are needed for hair loss in women?',
         'a' => 'Only those your history suggests. Most often a blood count, ferritin and thyroid function, sometimes vitamin D and B12, and hormone tests where irregular periods, acne or extra facial hair point to raised androgens. Tell the doctor about biotin first, because it can skew some results. See <a href="/blog/blood-tests-for-hair-fall">blood tests for hair fall</a>.'],
        ['q' => 'Can PCOS cause hair loss?',
         'a' => 'It can. When PCOS raises androgen levels, hair on top may thin, typically alongside irregular periods, acne or extra facial hair. Plenty of women with pattern thinning turn out to have normal hormone results, so tests are used to confirm it. Treatment then covers PCOS itself, not just the hair.'],
        ['q' => 'Does thyroid disease cause hair loss?',
         'a' => 'Both an underactive and an overactive thyroid can cause diffuse thinning, usually with changes in energy, weight or periods. A blood test finds it, and hair frequently improves over months once the thyroid is treated. See <a href="/blog/thyroid-and-hair-loss">thyroid and hair loss</a>.'],
        ['q' => 'How much does women’s hair loss treatment cost in Delhi?',
         'a' => 'There is no set price: the cost follows the diagnosis. A reversible cause mostly means the consultation, the tests you need and treatment for that condition, while pattern thinning costs more over time. At the Rohini clinic your plan is costed in writing after the assessment. See <a href="/cost-and-emi-options">cost and EMI options</a>.'],
        ['q' => 'Will my hair grow back after pregnancy?',
         'a' => 'For most women, yes. Postpartum shedding is a form of telogen effluvium: it tends to begin a few months after the birth and tapers off over the months after that. Shedding that continues well past six to nine months, or a parting that does not fill back in, deserves an examination, since low iron or pattern thinning can be hiding behind it. See <a href="/blog/hair-fall-after-pregnancy">hair fall after pregnancy</a>.'],
        ['q' => 'Can female pattern hair loss be reversed?',
         'a' => 'Not fully. It is progressive, so treatment aims to slow it and thicken hairs that are shrinking, and it helps only while it continues. It rarely leads to complete baldness and is more common around and after menopause. For many women, thinning that stops getting worse is the main result. See <a href="/blog/female-pattern-hair-loss-in-women">female pattern hair loss</a>.'],
        ['q' => 'Can I have treatment while pregnant or breastfeeding?',
         'a' => 'Partly. Treating low iron or a thyroid problem can often go ahead, coordinated with your obstetrician. Pattern-loss medicines are another matter: minoxidil is generally avoided while pregnant or breastfeeding, and anti-androgens and finasteride must not be used by anyone who could become pregnant. Mention plans to conceive at the first visit, even distant ones.'],
        ['q' => 'How long does treatment take to work?',
         'a' => 'Months rather than weeks. Shedding usually eases first, often two to three months after a cause is corrected or a medicine is started; thickness is compared with your baseline photographs from about six months and reviewed fully at twelve. Minoxidil can cause a short-lived increase in shedding when it is started.'],
        ['q' => 'Do hair supplements help women’s hair loss?',
         'a' => 'Only when a blood test has shown a deficiency, such as low iron or vitamin D. Without one they seldom help, too much vitamin A or selenium can cause hair loss, and biotin can upset some blood results. See <a href="/blog/vitamin-deficiency-and-hair-loss">vitamin deficiency and hair loss</a>.'],
        ['q' => 'Would PRP or a hair transplant help me?',
         'a' => 'Neither is a first step. PRP may be offered for pattern thinning where follicles remain, alongside medicine rather than instead of it. A transplant suits few women, because female thinning is often spread across the scalp, the donor area included; it is more often considered for permanent traction loss or a stable, defined area. See <a href="/hair-transplant-for-women-in-rohini">hair transplant for women</a> and <a href="/hair-prp-treatment-in-delhi">hair PRP in Delhi</a>.'],
        ['q' => 'Does Delhi’s hard water cause hair loss in women?',
         'a' => 'Hard water leaves hair dry and rough so that it snaps, which can look like hair fall but is breakage. A snapped piece is short with no root; a shed hair is full length with a tiny bulb at one end. Smog and dust can irritate the scalp, but evidence that they cause hair loss is limited.'],
        ['q' => 'Which parts of Delhi do you see patients from?',
         'a' => 'Women come from across Delhi to DenceSpot’s one clinic in the city, in Rohini, North-West Delhi. The assessment, the review of blood results and every follow-up happen there; the areas we serve are listed at the foot of this page.'],
        ['q' => 'Can I send photos on WhatsApp first?',
         'a' => 'Yes. A daylight photograph of your parting taken from above, and one of your hairline, help the clinic answer a first question. Whether treatment is needed, and which, is decided after an examination in person.'],
    ],
    'faq_about' => 'hair, health or pregnancy plans',

    'consult' => [
        'heading' => "Book a Women's Hair Loss Consultation in Delhi",
        'intro'   => 'Meet a doctor at the Rohini clinic for a history that covers periods, pregnancy and medicines, an examination of your parting and scalp, and only the tests your case calls for. You leave with a written plan and decide afterwards whether to start it.',
    ],

    'schema_type' => 'therapy',
    'schema'      => [
        'name'              => "Women's Hair Loss Treatment",
        'description'       => 'Diagnosis-led treatment of hair loss in women, covering female pattern hair loss, iron deficiency, thyroid and hormonal causes and postpartum shedding, at the Rohini clinic in Delhi.',
        'alternateName'     => ["Women's Hair Loss Treatment in Delhi", 'Female Hair Loss Treatment in Delhi', 'Female pattern hair loss treatment'],
        'bodyLocation'      => 'Scalp',
        'howPerformed'      => 'History of onset with menstrual and obstetric history, contraception, diet, styling, medicines and family history; examination of the parting, hairline and eyebrows with trichoscopy; blood tests chosen from the history, typically a blood count, ferritin and thyroid function, with vitamin and hormonal tests where indicated. Reversible causes are corrected first, and female pattern hair loss is treated with prescribed medical therapy selected with regard to pregnancy and breastfeeding.',
        'preparation'       => 'A timeline of the hair loss and the months before it, current or planned pregnancy, a list of all medicines and supplements including hormonal contraception and biotin, recent blood reports and baseline photographs of the parting.',
        'followup'          => 'Blood results reviewed, then the parting compared with baseline photographs at about six months and reviewed fully at twelve months.',
        'expectedPrognosis' => 'Depends on the cause. Shedding from iron deficiency, thyroid disease or childbirth commonly recovers once corrected or once the trigger has passed. Female pattern hair loss is progressive; treatment slows it only while it continues, and not every woman responds.',
    ],

    'area' => [
        'lead'            => 'Hair loss in women is assessed there with iron, thyroid and hormonal causes checked first and pregnancy plans discussed before any medicine; the plan and its cost come in writing.',
        'feats'           => [['search', 'Causes checked first'], ['heart', 'Pregnancy plans discussed'], ['doc', 'Written plan and cost']],
        'heading'         => "Women's Hair Loss Treatment for {area} Residents",
        'visits_line'     => 'The assessment, the review of your blood results and every follow-up visit take place at the Rohini clinic.',
        'day_heading'     => 'Before Your First Visit',
        'day'             => 'Before leaving {area}, gather a list of your medicines and supplements, including the pill or any hormone therapy, recent blood reports and a few older photographs of your hair. The visit is a conversation and an examination, so you can go back to work or home straight afterwards.',
        'visits_intro'    => 'A first assessment, a follow-up for any blood results, and reviews of your parting at about six and twelve months — all at the Rohini clinic.',
        'visit_icons'     => [['chat', 'History and Examination'], ['doc', 'Blood Results Reviewed'], ['camera', 'Parting Photographed'], ['calendar', 'Reviews at 6 and 12 Months']],
        'options_heading' => 'How Hair Loss in Women Is Treated in Rohini',
        'options_html'    => 'Low iron, thyroid disease and hormonal causes are corrected first, and shedding after childbirth is usually given time; female pattern thinning is managed with prescribed treatment chosen around pregnancy plans. <a href="{hub}#options">Both parts of a plan explained</a>.',
        'cost_heading'    => "What Decides the Cost of Women's Hair Loss Care",
        'cost_intro'      => 'There is no set price. A reversible cause mostly means the consultation, the tests you need and treatment for that condition, while pattern thinning costs more over time; the plan is costed in writing after your assessment.',
        'faqs'            => [
            ['q' => 'Is there a DenceSpot clinic in {area}?',
             'a' => 'No. Women from {area} are seen at DenceSpot’s only Delhi clinic, in Rohini, North-West Delhi, for the assessment, results and reviews. The Directions button shows where it is on Google Maps.'],
            ['q' => 'What is the route to the Rohini clinic from {area}?',
             'a' => '{route} Google Maps or the DMRC journey planner gives door-to-door timings, and the clinic can help on WhatsApp.'],
            ['q' => 'How many trips from {area} will I need?',
             'a' => 'Usually a first assessment, a follow-up once blood results are in, and reviews at about six and twelve months. Most treatment between those visits is taken or applied at home, so the journeys are spread out.'],
            ['q' => 'Does living in {area} affect the cost?',
             'a' => 'No. The cost depends on the diagnosis and the plan, not where you live, and it is given in writing after the assessment. See <a href="/cost-and-emi-options">cost and EMI options</a>.'],
            ['q' => 'My hair has been falling out since my baby was born. Should I come in?',
             'a' => 'Shedding a few months after delivery is common and usually eases with time. It is worth an examination if it continues well beyond six to nine months, if your parting stays wider, or if you feel unusually tired, since low iron or a thyroid problem can follow pregnancy.'],
            ['q' => 'Can I come from {area} if I am pregnant or breastfeeding?',
             'a' => 'Yes. The history and examination are the same, and the doctor chooses any treatment around pregnancy or breastfeeding, when several hair-loss medicines are avoided. Mention it when you book.'],
            ['q' => 'Can I send photos before travelling to Rohini?',
             'a' => 'Yes. Send the clinic a daylight photo of your parting from above and one of your hairline on WhatsApp, with a line on when the change began. A diagnosis still needs an examination in person.'],
        ],
        'consult_intro'   => 'Book an assessment at the Rohini clinic on a day that suits you. A doctor takes a history that covers periods, pregnancy and medicines, examines your parting and scalp, and explains the likely cause and the plan in writing before anything is started.',
        'descriptions'    => [
            'Women’s hair loss treatment for {area} at DenceSpot’s Rohini clinic, Delhi: thyroid, iron, PCOS and postpartum causes, the route, cost and FAQs.',
            'Women’s hair loss treatment for {area} at DenceSpot’s Rohini clinic, Delhi: causes, tests, the route, cost and FAQs.',
            'Women’s hair loss treatment for {area} at DenceSpot’s Rohini clinic: causes, tests and FAQs.',
        ],
    ],
];
