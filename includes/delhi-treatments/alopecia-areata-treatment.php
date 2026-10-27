<?php
/**
 * Copy for /alopecia-areata-treatment-in-delhi and its area pages (schema:
 * includes/delhi-treatment-pillar.php). Facts as on
 * /alopecia-areata-treatment-in-rohini, written fresh. As there: no medicine
 * names, regimens or doses; PRP is not an established treatment and is not
 * linked; no hair transplant while the condition is active. No prices.
 */

declare(strict_types=1);

return [
    'title'          => [
        'Alopecia Areata Treatment in Delhi: Signs & Care | DenceSpot',
        'Alopecia Areata Treatment in Delhi: Patchy Hair Loss',
        'Alopecia Areata Treatment in Delhi | DenceSpot',
    ],
    'description'    => 'Alopecia areata treatment in Delhi at DenceSpot’s Rohini clinic: patchy hair loss diagnosed, options by extent, relapses, why no transplant, and FAQs.',
    'keywords'       => ['alopecia areata treatment in delhi', 'patchy hair loss treatment delhi', 'bald patch treatment delhi', 'alopecia areata doctor delhi', 'beard alopecia treatment delhi', 'alopecia areata treatment in rohini'],
    'form_treatment' => 'Hair fall treatment',
    'form'           => ['Alopecia areata treatment', 'Patchy beard or eyebrow loss', 'Hair fall treatment', 'Dandruff or scaly scalp', 'Not sure — please advise'],

    'hero' => [
        'lead'  => 'Round, smooth bald patches that appear within weeks are usually alopecia areata, an autoimmune condition in which the follicles are switched off but not destroyed. At our Rohini clinic a doctor confirms the diagnosis, rules out lookalikes and plans treatment around the number, size and age of the patches.',
        'feats' => [['search', 'Lookalikes ruled out'], ['list', 'Plan matched to extent'], ['camera', 'Patches photographed'], ['alert', 'No transplant while active']],
    ],

    'about' => [
        'heading' => 'What Alopecia Areata Is, and How It Is Treated',
        'paras'   => [
            'In alopecia areata the immune system targets hair follicles and pushes them into a resting state. Because the follicles survive, hair can regrow, sometimes without any treatment, and the condition can also return later. It runs in families, is more common in people with thyroid disease or other autoimmune conditions, and is neither contagious nor caused by anything you did.',
            'Treatment depends on how many patches there are, how large they are and how long they have been present, as well as your age and health. Limited patches may be watched, or treated with applications or injections into the patch; extensive loss can need treatment under close medical supervision. In Delhi, DenceSpot diagnoses and follows patients at its Rohini clinic.',
        ],
        'cta'     => ['#suitability', 'Check the Signs'],
        'glance'  => [
            ['search', 'mint', 'Diagnosis', 'Usually made on examination'],
            ['doc', 'violet', 'Blood tests', 'Thyroid or other screening if indicated'],
            ['chart', 'sky', 'Regrowth', 'Judged over months; often white at first'],
            ['alert', 'amber', 'Transplant', 'Not while the condition is active'],
        ],
    ],

    'middle' => [
        'heading' => 'Patchy Hair Loss: How Lookalikes Differ',
        'sub'     => 'General patient education; the examination decides.',
        'cols'    => ['Condition', 'Typical sign'],
        'rows'    => [
            ['Alopecia areata', 'Smooth patch, normal-looking skin'],
            ['Scalp ringworm', 'Scaly patch with broken stubble'],
            ['Hair pulled out by habit', 'Hairs snapped at uneven lengths'],
            ['Traction from styles', 'Thinning at hairline and temples'],
            ['Scarring hair loss', 'Shiny skin, follicle openings gone'],
            ['Telogen effluvium', 'Shedding all over, not patches'],
        ],
        'note'    => 'Each of these is treated differently, which is why patchy loss is examined under magnification before anything is prescribed.',
    ],
    'results' => false,

    'why' => [
        'intro'  => 'How patchy hair loss is diagnosed and followed at the Rohini clinic, with each patch measured against photographs rather than memory.',
        'icons'  => [
            ['user', 'Assessed by a Registered Doctor'],
            ['search', 'Lookalikes Ruled Out'],
            ['beard', 'Beard, Brows and Nails Checked'],
            ['camera', 'Each Patch Photographed'],
            ['chat', 'Referral Discussed Openly'],
            ['pin', 'Rohini Clinic, North-West Delhi'],
        ],
        'media'  => 'map',
    ],

    'suit' => [
        'heading' => 'Is It Alopecia Areata? Signs to Look For',
        'intro'   => 'The pattern is often distinctive, but several other conditions cause patchy loss and need different treatment. The first list suggests alopecia areata; the second points elsewhere. Either way, an examination settles it.',
        'yes'     => ['heading' => 'Suggests Alopecia Areata', 'items' => [
            'Round or oval bald patches on smooth, normal-looking skin',
            'Patches that appear over days or weeks, usually without soreness',
            'A gap in the beard, an eyebrow or the eyelashes',
            'Short hairs narrowing towards the scalp at the edge of a patch',
            'Small pits or ridges on the nails',
        ]],
        'wait'    => ['heading' => 'Points to Something Else', 'items' => [
            'Scaling, broken stubble or itch in the patch, as with ringworm',
            'Hairs snapped off at different lengths within the patch',
            'Gradual thinning along the hairline from tight styles',
            'Shiny, red or tender skin where the hair has gone',
            'Thinning all over rather than in defined patches',
        ]],
        'note'    => ['heading' => 'Not Your Fault, Not Contagious', 'paras' => [
            'Alopecia areata cannot be caught or passed on, and it is not caused by shampoo, oil, diet or washing. Stress is often reported around the time patches appear, but the link is not proven. If the hair loss is affecting your mood or sleep, say so at the appointment.',
            'A bare patch in the beard can be the first sign: see <a href="/blog/alopecia-barbae-patchy-beard-hair-loss">alopecia areata of the beard</a>. A scaly, flaking patch is more often a scalp infection; see <a href="/dandruff-treatment-in-rohini">scalp conditions at the Rohini clinic</a>.',
        ]],
    ],

    'options' => [
        'eyebrow'         => 'Treatment options',
        'heading'         => 'Limited Patches and Extensive Loss: The Options',
        'intro'           => 'The doctor weighs the number and size of patches, how long they have been there, your age and your health. Medicine names and doses are not listed here: they are prescription decisions, and some need close supervision.',
        'cards'           => [
            ['search', 'mint', 'Limited Patches', 'One or a few small patches often regrow without treatment, though it can take months. You can choose to watch them with photographs and a review date, or have treatment applied to the skin or injected into the patches at intervals.', [
                'Watching is a reasonable choice',
                'Side effects explained beforehand',
                'An injection can leave a temporary dip',
            ]],
            ['shield', 'violet', 'Extensive or Long-Standing Loss', 'Widespread patches, loss that has lasted a long time, or loss of eyebrows, lashes or body hair is harder to predict. Tablets or other treatment under close medical supervision may be considered, with monitoring that can include blood tests.', [
                'Close supervision and monitoring',
                'Referral discussed if better placed',
                'A less predictable course',
            ]],
        ],
        'choose'          => ['heading' => 'What the Doctor Weighs', 'items' => [
            'How many patches, how large and how long present',
            'Whether brows, lashes, beard or nails are involved',
            'Your age, general health and other medicines',
            'Any thyroid or other autoimmune condition',
            'How much the patches are affecting you day to day',
        ]],
        'related_heading' => 'Related Care at the Rohini Clinic',
        'related'         => [
            '/alopecia-areata-treatment-in-rohini'        => 'Alopecia areata in Rohini',
            '/hair-fall-treatment-in-rohini'              => 'Diffuse hair fall',
            '/dandruff-treatment-in-rohini'               => 'Scaly scalp conditions',
            '/blog/alopecia-barbae-patchy-beard-hair-loss' => 'Patchy beard loss',
            '/blog/who-should-not-have-a-hair-transplant'  => 'Who should not have a transplant',
        ],
    ],

    'steps' => [
        'eyebrow'   => 'From first visit to review',
        'heading'   => 'How Alopecia Areata Is Diagnosed and Managed',
        'intro'     => 'Five stages at the Rohini clinic. Bring any photographs from when the patches first appeared.',
        'items'     => [
            ['chat', 'History', 'When each patch appeared, earlier episodes, thyroid or autoimmune conditions in you or your family, and your medicines.'],
            ['search', 'Examination', 'Scalp, beard, brows, lashes and nails, with trichoscopy to confirm the pattern and rule out lookalikes.'],
            ['doc', 'Screening & Plan', 'Thyroid or other tests only where indicated, a biopsy rarely, then the options and their side effects in writing.'],
            ['heart', 'Treatment or Watching', 'A review date with photographs, treatment on or into the patches, or supervised treatment for extensive loss.'],
            ['camera', 'Review', 'Each patch compared with its first photograph at every visit, so regrowth and any new patches are measured.'],
        ],
        'note_html' => 'More in <a href="/blog/blood-tests-for-hair-fall">blood tests for hair loss</a> and <a href="/blog/who-should-assess-hair-fall">who should assess hair loss</a>.',
    ],

    'aftercare' => [
        'eyebrow'      => 'Over the months',
        'heading'      => 'Regrowth, Relapses and Living With Patches',
        'intro'        => 'Alopecia areata moves at its own pace, and nobody can predict exactly how one case will behave. General guidance only; your plan and review dates come first.',
        'timeline'     => [
            'The first weeks: patches photographed, and the chosen approach started or a review date set',
            'The following months: first regrowth is often fine and white, and usually darkens later',
            'At each review: patches set beside the first photographs, and the plan adjusted',
            'Later on: fresh patches can follow regrowth, because the condition can relapse; this does not mean treatment failed',
        ],
        'tips_heading' => 'Patches and Delhi Life',
        'tips'         => [
            ['clock', 'mint', 'Summer sun', 'Scalp skin with no hair over it sunburns easily, so cover up or use sunscreen in the midday glare.'],
            ['shield', 'violet', 'Caps and helmets', 'A cap or helmet over a patch is fine; wash the lining often and air a sweaty scalp afterwards.'],
            ['alert', 'sky', 'Monsoon damp', 'Humid months favour fungal infections, so a flaky patch with stubble needs checking, not assuming.'],
            ['heart', 'amber', 'Camouflage', 'Fibres, brow pencil, a scarf or a wig change how a patch looks, not its course, and many find them useful.'],
        ],
    ],

    'cost' => [
        'heading'  => 'Alopecia Areata Treatment Cost in Delhi',
        'intro'    => 'Cost follows extent, so no single price is published. With one or two small patches you are mainly paying for the consultation and reviews, and for injection visits if you opt for them. Widespread loss that needs supervised treatment brings monitoring and more visits, so it costs more. The plan is costed in writing at the Rohini clinic.',
        'factors'  => [
            ['search', 'mint', 'How much hair is affected', 'A few small patches need far less than widespread loss.'],
            ['calendar', 'violet', 'Treatment visits', 'Injections into patches are repeated at intervals, each one a visit.'],
            ['doc', 'sky', 'Monitoring', 'Treatment under close supervision can involve regular blood tests.'],
            ['clock', 'amber', 'How long it runs', 'Plans for extensive or long-standing loss usually run longer.'],
        ],
        'meta'     => 'If any clinic suggests PRP or a transplant for active patches, ask what it would do about the immune process behind them.',
        'links'    => [
            '/cost-and-emi-options'                => 'Cost and EMI options',
            '/alopecia-areata-treatment-in-rohini' => 'Alopecia areata in Rohini',
        ],
        'estimate' => ['heading' => 'What Your Written Plan Includes', 'items' => [
            'The diagnosis, with lookalikes ruled out',
            'Watching, treatment into patches, or supervised care',
            'Side effects and any monitoring needed',
            'Review dates and how change is measured',
            'When referral would be discussed',
        ], 'note' => 'Where a plan runs over several months, instalment options through third-party lenders may be available; ask at the consultation.'],
    ],

    'faqs' => [
        ['q' => 'What is the treatment for alopecia areata?',
         'a' => 'It depends on the extent. One or a few small patches may be watched with a review date. They can also be treated with applications or injections into the patches. Widespread or long-standing loss can need treatment under close medical supervision, with monitoring. The choice also takes in your age and health, and side effects are explained beforehand.'],
        ['q' => 'Will my hair grow back?',
         'a' => 'In many people it does. Small, few patches have the likeliest outlook and often fill in by themselves over months. The picture is less certain when loss is widespread, has gone on for a long time, or includes the eyebrows, lashes or body hair. Regrowth can also be followed by new patches later, so reviews continue.'],
        ['q' => 'What causes alopecia areata?',
         'a' => 'The immune system attacks hair follicles and pushes them into a resting phase. There is an inherited tendency, and it is more common alongside thyroid disease and other autoimmune conditions. Usually no single trigger is found, and it is not caused by hair products, diet or washing habits.'],
        ['q' => 'Is alopecia areata caused by stress?',
         'a' => 'The link is unproven. Plenty of people remember a difficult spell before the first patch, yet the cause is autoimmune and calming down will not switch it off. If the hair loss is affecting your mood, sleep or confidence, tell the doctor, who can suggest where to find support.'],
        ['q' => 'Is alopecia areata contagious?',
         'a' => 'No. It cannot spread from person to person, through shared combs or any other way. A scaly patch with broken hairs, however, may be scalp ringworm, a fungal infection that needs different treatment, so patchy loss is worth having examined.'],
        ['q' => 'How much does alopecia areata treatment cost in Delhi?',
         'a' => 'There is no single price: the extent decides it. A few small patches mostly mean the consultation and reviews, while widespread loss needing supervised treatment and monitoring costs more. At the Rohini clinic the plan is costed in writing; see <a href="/cost-and-emi-options">cost and EMI options</a>.'],
        ['q' => 'Can alopecia areata come back?',
         'a' => 'Yes. Relapse after regrowth is recognised, sometimes in the same place and sometimes elsewhere. New patches are a feature of the condition rather than proof that treatment failed, and they are assessed in the same way as the first.'],
        ['q' => 'Can it affect the beard, eyebrows or eyelashes?',
         'a' => 'Yes, and a patch in one of those places can be the first sign or the only one. They are examined along with the scalp and nails. See <a href="/blog/alopecia-barbae-patchy-beard-hair-loss">alopecia areata of the beard</a>.'],
        ['q' => 'Can I have a hair transplant for alopecia areata?',
         'a' => 'Not while the condition is active. Transplanted follicles can be attacked in the same way, donor hair cannot be replaced, and patches may regrow or return by themselves. Surgery may be reconsidered cautiously only after a long stable period. See <a href="/blog/who-should-not-have-a-hair-transplant">who should not have a hair transplant</a>.'],
        ['q' => 'Does PRP help alopecia areata?',
         'a' => 'PRP is not an established treatment for alopecia areata and does not act on the immune process behind it. It is used mainly as a supporting treatment for pattern thinning, so it is not part of a plan for alopecia areata at the Rohini clinic.'],
        ['q' => 'Do I need blood tests?',
         'a' => 'Sometimes. Because alopecia areata is linked with thyroid disease and other autoimmune conditions, a thyroid test or other screening may be suggested if your history points that way. Supervised treatment for extensive loss can also need blood tests for monitoring.'],
        ['q' => 'How long before I know whether treatment is working?',
         'a' => 'Months. The first regrowth in a patch is often fine and white, and darkens later. Each patch is photographed at the start and compared at every review, so change, or a new patch, is recorded rather than guessed.'],
        ['q' => 'Is it reasonable to wait and watch?',
         'a' => 'Often, for limited patches. Small patches commonly recover without help, so a plan can be photographs now and a review in a few months, with treatment kept in reserve. You can still opt for treatment, and loss that spreads changes the plan.'],
        ['q' => 'Do home remedies like onion juice work?',
         'a' => 'One small study looked at onion juice in patchy alopecia areata, but the evidence is thin, and raw remedies can irritate the scalp. Relying on them can also delay the examination that rules out lookalikes. See <a href="/blog/rosemary-onion-juice-and-hair-oils-for-hair-fall">rosemary, onion juice and hair oils</a>.'],
        ['q' => 'Which parts of Delhi do you see patients from?',
         'a' => 'Patients travel from across Delhi to DenceSpot’s one clinic in the city, in Rohini, North-West Delhi, where diagnosis, treatment and reviews all take place. The areas we serve are listed at the foot of this page.'],
    ],
    'faq_about' => 'patches, health or treatment',

    'consult' => [
        'heading' => 'Book an Alopecia Areata Consultation in Delhi',
        'intro'   => 'Have your patches examined at the Rohini clinic. A doctor confirms the diagnosis and checks the beard, brows and nails. Screening is suggested only if your history calls for it. Then every option is explained, including watching and the position on surgery.',
    ],

    'schema_type' => 'therapy',
    'schema'      => [
        'name'              => 'Alopecia Areata Treatment',
        'description'       => 'Diagnosis and management of alopecia areata, an autoimmune cause of patchy hair loss, matched to the extent of the condition, at the Rohini clinic in Delhi.',
        'alternateName'     => ['Alopecia Areata Treatment in Delhi', 'Patchy Hair Loss Treatment in Delhi', 'Autoimmune hair loss treatment'],
        'bodyLocation'      => 'Scalp, beard, eyebrows, eyelashes and body hair',
        'howPerformed'      => 'Clinical diagnosis from the history and examination of the scalp, beard, eyebrows, eyelashes and nails, with trichoscopy to exclude fungal infection, hair-pulling, traction and scarring alopecia; screening such as thyroid function where indicated, and biopsy only when the diagnosis is uncertain. Management is chosen by extent and duration: observation with photographic review, or topical and intralesional treatment, for limited patches, and closely supervised therapy with monitoring for extensive disease, with referral where appropriate. No hair restoration surgery while the condition is active.',
        'preparation'       => 'History of onset and earlier episodes, personal and family history of autoimmune disease, current medicines, photographs from early in the episode and baseline photographs of each patch.',
        'followup'          => 'Each patch compared with baseline photographs at review, monitoring of any treatment that requires it, and reassessment over months.',
        'expectedPrognosis' => 'Variable. Limited patches often regrow, sometimes without treatment; widespread or long-standing loss and involvement of eyebrows, eyelashes or body hair follow a less predictable course, and relapse after regrowth is recognised.',
    ],

    'area' => [
        'lead'            => 'There, a doctor confirms whether the patches are alopecia areata and rules out lookalikes. Treatment is planned around how much hair is affected, with every option and its cost set out in writing.',
        'feats'           => [['search', 'Diagnosis confirmed first'], ['camera', 'Patches photographed'], ['alert', 'No transplant while active']],
        'heading'         => 'Alopecia Areata Treatment for Patients in {area}',
        'visits_line'     => 'Diagnosis, treatment of the patches and every review take place at the Rohini clinic.',
        'day_heading'     => 'For Your First Visit',
        'day'             => 'When you travel from {area}, bring any photos from when the patches first appeared, the dates of earlier episodes, your medicines and any recent blood reports. The first visit is a history and an examination of the scalp, beard, brows and nails, so you can go back to work or home afterwards.',
        'visits_intro'    => 'A first assessment, then reviews with photographs over the following months, and treatment visits at intervals if you choose injections into the patches — all at the Rohini clinic.',
        'visit_icons'     => [['search', 'Diagnosis on Examination'], ['camera', 'Each Patch Photographed'], ['calendar', 'Reviews Over Months'], ['chat', 'Options Explained First']],
        'options_heading' => 'How Alopecia Areata Is Treated in Rohini',
        'options_html'    => 'Limited patches may be watched with a review date, or treated with applications or injections into the patches; widespread or long-standing loss can need treatment under close medical supervision. A transplant is not used while the condition is active. <a href="{hub}#options">The options compared</a>.',
        'cost_heading'    => 'How the Cost of Alopecia Areata Care Is Set',
        'cost_intro'      => 'There is no single price. A few small patches mostly mean the consultation and reviews, while widespread loss needing supervised treatment and monitoring costs more; the plan is costed in writing after the assessment.',
        'faqs'            => [
            ['q' => 'Is there a DenceSpot clinic in {area}?',
             'a' => 'No. Patients from {area} with patchy hair loss are seen at DenceSpot’s only Delhi clinic, in Rohini, North-West Delhi. The Directions button opens it on Google Maps.'],
            ['q' => 'How do I reach the Rohini clinic from {area}?',
             'a' => '{route} Google Maps or the DMRC journey planner will give the quickest route from your door, and the clinic can also help on WhatsApp.'],
            ['q' => 'How often will I need to come from {area}?',
             'a' => 'It depends on the plan. Watching limited patches means reviews every few months; treatment into the patches means visits at intervals; supervised treatment adds monitoring. Your written plan sets out the visits so you can plan the journeys.'],
            ['q' => 'Does the cost change because I live in {area}?',
             'a' => 'No. It depends on the extent of your hair loss and the plan, not where you live, and it is given in writing after the assessment. See <a href="/cost-and-emi-options">cost and EMI options</a>.'],
            ['q' => 'Is a single small patch worth the journey from {area}?',
             'a' => 'An examination confirms whether it really is alopecia areata rather than ringworm, hair-pulling or a scarring condition, which are treated differently. If it is, watching with a review date may be all that is needed. Photos sent on WhatsApp can help you decide when to come.'],
            ['q' => 'Will I be offered a hair transplant?',
             'a' => 'Not while the condition is active: grafts can be attacked like the original hair, and donor hair cannot be replaced. Surgery may be reconsidered only after a long stable period. PRP is not an established treatment for alopecia areata either.'],
            ['q' => 'Can I send photos before travelling to Rohini?',
             'a' => 'Yes. Daylight photos of each patch, and of your beard or brows if they are affected, sent on WhatsApp help the clinic answer a first question. The diagnosis itself needs an examination in person.'],
        ],
        'consult_intro'   => 'Book an assessment at the Rohini clinic on a day that suits you. A doctor examines the patches, beard, brows and nails, explains whether waiting or treatment makes more sense for you and puts the plan and its cost in writing.',
        'descriptions'    => [
            'Alopecia areata treatment for {area} at DenceSpot’s Rohini clinic, Delhi: patchy hair loss diagnosed, options by extent, the route, cost and FAQs.',
            'Alopecia areata treatment for {area} at DenceSpot’s Rohini clinic, Delhi: diagnosis, options, the route, cost and FAQs.',
            'Alopecia areata treatment for {area} at DenceSpot’s Rohini clinic: options, cost and FAQs.',
        ],
    ],
];
