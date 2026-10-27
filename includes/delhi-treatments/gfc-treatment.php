<?php
/**
 * Copy for /gfc-treatment-in-delhi and its area pages (schema:
 * includes/delhi-treatment-pillar.php). Facts as on /gfc-treatment-in-rohini,
 * /hair-prp-treatment-in-rohini and /blog/prp-vs-gfc-vs-exosomes, written
 * fresh. No prices, no kit names, no concentration multiples.
 */

declare(strict_types=1);

return [
    'title'          => [
        'GFC Treatment in Delhi: GFC vs PRP & Cost | DenceSpot',
        'GFC Treatment in Delhi: GFC vs PRP & Cost',
        'GFC Treatment in Delhi | DenceSpot Rohini',
    ],
    'description'    => 'GFC hair treatment in Delhi at DenceSpot’s Rohini clinic: how it is made, how it compares with PRP, its evidence, sessions, side effects and cost.',
    'keywords'       => ['gfc treatment in delhi', 'gfc hair treatment delhi', 'growth factor concentrate for hair delhi', 'gfc vs prp for hair', 'gfc hair treatment cost in delhi', 'gfc treatment in rohini'],
    'form_treatment' => 'Hair PRP / GFC',
    'form'           => ['GFC treatment', 'Hair PRP treatment', 'Hair fall treatment', 'Hair transplant (FUE / DHI)', 'Not sure — please advise'],

    'hero' => [
        'lead'  => 'A concentrate of growth factors made in the clinic from a small sample of your own blood and injected where the scalp is thinning. At our Rohini clinic it is offered only once the cause of your hair loss is known, and a course ends if the photographs show no change.',
        'feats' => [['heart', 'Made from your own blood'], ['search', 'Cause found first'], ['scale', 'Evidence stated plainly'], ['camera', 'Reviewed on photographs']],
    ],

    'about' => [
        'heading' => 'What GFC Is and How It Is Made',
        'paras'   => [
            'GFC begins the way PRP does: blood is drawn from your arm and spun so the plasma and platelets separate. The platelets are then activated in the tube, so the growth factors they carry are set free there rather than later in your scalp, and the cells are filtered away. What goes into the syringe is a largely cell-free concentrate.',
            'That extra step changes what is injected. It has not been shown to change what happens to your hair: the research on GFC is smaller and newer than the research on PRP, and neither is a cure. In Delhi, DenceSpot prepares GFC and gives every session at the Rohini clinic, with registered medical practitioners doing the injections.',
        ],
        'cta'     => ['#suitability', 'See Who GFC May Suit'],
        'glance'  => [
            ['clock', 'mint', 'Each session', 'Usually under an hour, blood draw included'],
            ['calendar', 'violet', 'The course', 'Sessions spaced some weeks apart'],
            ['user', 'sky', 'Back to work', 'Usually the same day'],
            ['chart', 'amber', 'Review', 'Photographs compared at 3–6 months'],
        ],
    ],

    'middle' => [
        'heading' => 'From Blood Sample to Concentrate',
        'sub'     => 'What happens in the clinic on a session day.',
        'cols'    => ['Step', 'What happens'],
        'rows'    => [
            ['Blood draw', 'From the arm, like a routine test'],
            ['Spinning', 'Plasma and platelets separate'],
            ['Activation', 'Growth factors released in the tube'],
            ['Filtering', 'Cells removed from the plasma'],
            ['Injection', 'Concentrate placed at follicle depth'],
            ['Time taken', 'Usually under an hour in all'],
        ],
        'note'    => 'A figure for how much growth factor a tube holds describes the tube, not what your scalp will do.',
    ],
    'results' => false,

    'why' => [
        'intro'  => 'GFC is easy to sell as a stronger form of PRP. At the Rohini clinic it is offered on what the evidence actually shows, and measured like any other treatment.',
        'icons'  => [
            ['search', 'Scalp Examined Before Any Blood Draw'],
            ['scale', 'Evidence Explained, Not Oversold'],
            ['heart', 'Prepared in the Clinic'],
            ['camera', 'Same Angles at Every Review'],
            ['doc', 'Whole Course Quoted in Writing'],
            ['pin', 'Rohini Clinic, North-West Delhi'],
        ],
        'media'  => 'map',
    ],

    'suit' => [
        'heading' => 'Is GFC Right for Your Thinning?',
        'intro'   => 'A concentrate has nothing to act on where the follicles have gone. A look at your scalp under magnification shows whether yours are still there, and that happens before any blood is taken.',
        'yes'     => ['heading' => 'Where It May Be Considered', 'items' => [
            'Pattern thinning at an early to moderate stage, with follicles present',
            'Thinning you are already treating with medicine',
            'The existing hair around an earlier transplant, timed with care',
            'Anyone who would like a preparation made from their own blood',
            'People willing to stop if the review shows no change',
        ]],
        'wait'    => ['heading' => 'Postponed, or Not Offered', 'items' => [
            'A smooth, bald scalp, where surgery is the real question',
            'Infection or inflammation on the scalp',
            'A bleeding, clotting or platelet disorder, or unreviewed blood thinners',
            'Some cancers, active chemotherapy or poorly controlled illness',
            'Pregnancy, breastfeeding or significant anaemia',
        ]],
        'note'    => ['heading' => 'Find the Cause First', 'paras' => [
            'Shedding from low iron, a thyroid problem or a hormonal condition needs that condition treated, and recent diffuse shedding may settle without any injection. See <a href="/blog/telogen-effluvium-vs-pattern-hair-loss">telogen effluvium compared with pattern hair loss</a>.',
            'If the reason for your thinning is still unclear, begin with <a href="/hair-fall-treatment-in-rohini">hair fall treatment at the Rohini clinic</a>, where the tests your history calls for are arranged.',
        ]],
    ],

    'options' => [
        'eyebrow'         => 'The evidence',
        'heading'         => 'GFC Evidence: What Is and Is Not Known',
        'intro'           => 'GFC is often marketed as an upgrade on PRP. The research so far shows that it is different, not that it does more.',
        'cards'           => [
            ['check', 'mint', 'What the Research Supports', 'GFC is a distinct preparation of your own blood, used for the same kinds of thinning as PRP. There are not many studies yet; most are recent, and many come from one centre.', [
                'Prepared differently from PRP',
                'Made from your own blood',
                'Side effects much like PRP',
            ]],
            ['alert', 'amber', 'What Has Not Been Shown', 'Few studies compare GFC directly with well-prepared PRP in the same patients, so the claims usually made for it remain open.', [
                'That it does more than PRP',
                'That it helps where PRP did not',
                'That it needs fewer sessions or lasts longer',
            ]],
        ],
        'choose'          => ['heading' => 'Questions to Ask About Any GFC Course', 'items' => [
            'How is the concentrate made, and is it the same at every session?',
            'Will a doctor give the injections?',
            'When is the review, and against which photographs?',
            'What happens if the review shows no change?',
            'What will maintenance cost after the first course?',
        ]],
        'related_heading' => 'Related Pages',
        'related'         => [
            '/gfc-treatment-in-rohini'       => 'GFC in Rohini',
            '/hair-prp-treatment-in-delhi'   => 'Hair PRP in Delhi',
            '/hair-fall-treatment-in-rohini' => 'Hair fall treatment',
            '/blog/prp-vs-gfc-vs-exosomes'   => 'PRP, GFC and exosomes',
        ],
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'How a GFC Course Runs at the Rohini Clinic',
        'intro'     => 'The first visit is for diagnosis only. Injections begin once the cause is known and a written plan has been agreed.',
        'items'     => [
            ['search', 'Examination', 'Your history and medicines, the scalp under magnification, and blood tests if iron, thyroid or another cause is suspected.'],
            ['doc', 'Written Plan', 'Baseline photographs at fixed angles, then the sessions, the review date and the full cost set down in writing.'],
            ['heart', 'Preparation', 'On the day, a small blood sample is spun and processed in the clinic until only the growth factor concentrate remains.'],
            ['settings', 'Injections', 'The scalp is cleaned and cooled or numbed, and the concentrate is placed at follicle depth across the thinning areas.'],
            ['camera', 'Review', 'At around three to six months your photographs are set against the baseline; no change means the course ends.'],
        ],
        'note_html' => 'The research is compared in <a href="/blog/prp-vs-gfc-vs-exosomes">PRP, GFC and exosomes</a>; aftercare follows much the same lines as <a href="/blog/what-to-do-after-prp-hair-treatment">aftercare after a PRP session</a>.',
    ],

    'aftercare' => [
        'eyebrow'      => 'After a session',
        'heading'      => 'After a GFC Session: The First Few Days',
        'intro'        => 'There is no recovery period to plan around, only a few things to hold off on briefly. Where your written aftercare sheet differs from this general guide, follow the sheet.',
        'timeline'     => [
            'Straight after: a tender, slightly red scalp with pinpoint marks at the injection sites',
            'Next morning: occasionally some mild swelling of the forehead, gone within a day or so',
            'For a short while: no heavy workouts, sauna, steam room, pool, hair colour or chemical treatment',
            'Weeks later: less shedding, if it comes, is usually the first sign of a response',
        ],
        'tips_heading' => 'GFC Around Delhi Weather and Travel',
        'tips'         => [
            ['clock', 'mint', 'Hot afternoons', 'Heavy sweating is off the list briefly, so follow a summer session with a cool evening indoors.'],
            ['shield', 'violet', 'Riding home', 'A helmet can press on the tender spots for a day; a clean liner helps.'],
            ['alert', 'sky', 'Winter smog', 'Smog and dust do not alter the treatment; keep the scalp clean and leave the injection sites alone.'],
            ['calendar', 'amber', 'Weddings and trips', 'Fix the session dates around family events so the gaps between them stay even.'],
        ],
    ],

    'cost' => [
        'heading'  => 'GFC Treatment Cost in Delhi',
        'intro'    => 'No per-session figure is published, because one session tells you little about a course. After your assessment at the Rohini clinic you get a written quote with the sessions, the review point and any maintenance shown separately.',
        'factors'  => [
            ['settings', 'mint', 'The preparation', 'GFC often costs more than PRP, without evidence that it does more.'],
            ['calendar', 'violet', 'Sessions planned', 'Set from your diagnosis and revisited at review.'],
            ['chart', 'sky', 'Size of the area', 'A patch at the crown needs less than thinning across the top.'],
            ['doc', 'amber', 'Maintenance and medicine', 'Listed as their own lines from the outset.'],
        ],
        'meta'     => 'A large prepaid package sold before anyone has examined your scalp leaves no room to stop after the review. Look for a quote you can walk away from.',
        'links'    => [
            '/prp-hair-treatment-cost-in-rohini' => 'How PRP and GFC are priced',
            '/cost-and-emi-options'              => 'EMI and payment',
        ],
        'estimate' => ['heading' => 'Your Written GFC Quote Lists', 'items' => [
            'The number of sessions and their spacing',
            'What happens at each session',
            'Blood tests, if any, as separate lines',
            'Maintenance, should you respond',
            'The review date, and what follows if nothing changes',
        ], 'note' => 'Third-party lenders may offer instalments; the lender sets the terms, so ask at the consultation and compare the total with paying outright.'],
    ],

    'faqs' => [
        ['q' => 'Who is GFC hair treatment suitable for?',
         'a' => 'Mainly people whose pattern thinning is at an early to moderate stage with follicles still present, including those already on medicine, and sometimes the existing hair around an earlier transplant. It is not offered for a smooth, bald scalp, and it waits while there is a scalp infection, a bleeding or platelet disorder, unreviewed blood thinners, significant anaemia, pregnancy or breastfeeding. The decision is made at an examination.'],
        ['q' => 'How many GFC sessions will I need?',
         'a' => 'GFC is given as a course of sessions spaced some weeks apart. The number depends on your diagnosis, is set out in your written plan before you start and is looked at again at the review. GFC has not been shown to need fewer sessions than PRP, and if the photographs show no change the course ends rather than being extended.'],
        ['q' => 'Does GFC for hair loss work?',
         'a' => 'Some people see less shedding and, over months, a change in density where follicles remain; others see nothing, and nobody can tell beforehand which group you will be in. Fewer and more recent studies stand behind GFC than behind PRP, and none shows it doing more. Read <a href="/blog/prp-vs-gfc-vs-exosomes">PRP, GFC and exosomes compared</a>.'],
        ['q' => 'How much does GFC treatment cost in Delhi?',
         'a' => 'There is no set price. A GFC course is costed on the number of sessions, the size of the area and any maintenance, and it is often priced above PRP. After your assessment at the Rohini clinic you are given the full course cost in writing; <a href="/prp-hair-treatment-cost-in-rohini">how PRP and GFC courses are priced</a> explains each factor.'],
        ['q' => 'Does GFC hurt, and what are the side effects?',
         'a' => 'Taking the blood is like any blood test. The injections sting for a moment, more at the hairline, and cooling or a numbing cream takes the edge off. Afterwards expect tenderness, redness and pinpoint marks for a day or so, now and then some mild forehead swelling the next morning, and perhaps a bruise on the arm. An infection where the needle went in is uncommon, but it can happen.'],
        ['q' => 'When will I know whether GFC is working?',
         'a' => 'Not after one session. The first sign, when there is one, is usually less hair left on the comb or pillow. Density is checked at around three to six months, with your photographs laid beside the baseline set, and if that comparison shows nothing, the course stops there.'],
        ['q' => 'Is GFC better than PRP?',
         'a' => 'Not on present evidence. A tube of GFC may contain more free growth factor, but no one has shown that this turns into more hair on the scalp, and few studies test the two in the same patients. GFC is often the dearer of the two. <a href="/hair-prp-treatment-in-delhi">Hair PRP treatment in Delhi</a> covers PRP in full.'],
        ['q' => 'How long does a session take?',
         'a' => 'Usually less than an hour from start to finish, including the blood draw and the time it takes to prepare the concentrate. Most people go back to work or carry on with their day afterwards.'],
        ['q' => 'Should I eat before a GFC session?',
         'a' => 'Yes. Blood is taken, so eat and drink normally beforehand. Bring a list of your medicines and supplements, and tell the clinic well before the day if you take aspirin, anti-inflammatory painkillers or a blood thinner. Never stop a prescribed medicine on your own.'],
        ['q' => 'Which side effects need a call to the clinic?',
         'a' => 'Redness, heat or swelling that is spreading, a fever after a session, or pain that is getting worse instead of easing. They are uncommon; if one appears, phone or WhatsApp the Rohini clinic promptly.'],
        ['q' => 'Can GFC be used after a hair transplant?',
         'a' => 'It is sometimes used for the existing hair around the transplanted area, not for the grafts. A healing recipient area should not be injected too soon, so the doctor decides when it can start. Surgery itself is covered under <a href="/hair-transplant-in-delhi">hair transplant in Delhi</a>.'],
        ['q' => 'Does the benefit last once I stop?',
         'a' => 'No. GFC does not change what drives pattern hair loss, so any gain depends on maintenance sessions, usually with medicine alongside. When sessions end, thinning tends to pick up again from wherever it had reached.'],
        ['q' => 'Can I mix GFC with PRP or other injections in one course?',
         'a' => 'It is wiser not to. With several preparations in one course, nobody can tell which, if any, made the difference. One preparation, judged on standardised photographs, gives you a clear answer.'],
        ['q' => 'Which parts of Delhi do GFC patients come from?',
         'a' => 'Every part of a GFC course happens at DenceSpot’s only Delhi clinic, in Rohini, North-West Delhi: the assessment, the blood draw and preparation, the injections and the reviews. People from across the city make the trip for each visit, and each area we serve is linked near the bottom of this page.'],
        ['q' => 'Can I send photographs on WhatsApp first?',
         'a' => 'Yes. Daylight photos of the thinning areas let the clinic answer an initial question, though whether GFC suits you can only be decided once your scalp has been examined in person.'],
    ],
    'faq_about' => 'scalp, medicines or budget',

    'consult' => [
        'heading' => 'Book a GFC Consultation in Delhi',
        'intro'   => 'Come to the Rohini clinic for a magnified scalp examination, any tests your history points to and a plain view on whether GFC is worth trying or something else should come first. You leave free to decide later.',
    ],

    'schema_type' => 'therapy',
    'schema'      => [
        'name'              => 'GFC Treatment for Hair',
        'description'       => 'A growth factor concentrate made in the clinic from a small sample of the patient’s blood and injected where the scalp is thinning, over a planned course at the Rohini clinic in Delhi.',
        'alternateName'     => ['GFC Treatment in Delhi', 'GFC Hair Treatment in Delhi', 'Growth factor concentrate therapy for hair'],
        'bodyLocation'      => 'Scalp',
        'howPerformed'      => 'Blood is drawn and centrifuged; the platelets are activated so that their growth factors are released during preparation, and the cells are separated out. The concentrate is injected at follicular depth across the thinning areas, in sessions spaced some weeks apart.',
        'preparation'       => 'History and magnified scalp examination, review of anticoagulants and medicines affecting platelet function, blood tests where indicated for reversible causes, and baseline photographs.',
        'followup'          => 'Photographs compared with the baseline at about three to six months; the course ends if there is no meaningful change, or moves to maintenance alongside medical treatment if there is.',
        'expectedPrognosis' => 'Reduced shedding tends to be the earliest change. The evidence base for growth factor concentrate is smaller and newer than for PRP and does not show superiority. GFC leaves the underlying process of pattern hair loss unchanged, any gain requires continued maintenance, and a proportion of patients show no response.',
    ],

    'area' => [
        'lead'            => 'GFC there begins with an examination to confirm there are living follicles to treat, and the whole course is quoted in writing before any blood is drawn.',
        'feats'           => [['search', 'Follicles checked first'], ['heart', 'Made from your own blood'], ['doc', 'Written quote first']],
        'heading'         => 'GFC Treatment for Patients From {area}',
        'visits_line'     => 'Each GFC session, from the blood draw to the injections, and every review happen at the Rohini clinic.',
        'day_heading'     => 'Planning a Session Day',
        'day'             => 'Have a normal meal before leaving {area}, since blood is taken. Allow up to an hour at the clinic for the draw, the preparation and the injections. Most people return to work afterwards, though the scalp may stay tender for a day or so and a helmet can feel sore on the way back.',
        'visits_intro'    => 'An assessment first, then sessions spaced some weeks apart, with a photographic review at around three to six months, all at the Rohini clinic.',
        'visit_icons'     => [['search', 'Assessment Before Injections'], ['heart', 'Prepared on the Day'], ['user', 'Usually Back to Work Same Day'], ['camera', 'Review at 3–6 Months']],
        'options_heading' => 'How GFC Differs From PRP',
        'options_html'    => 'Both start with your own blood. With PRP the platelets go into the scalp and release their growth factors there; with GFC that release happens in the tube and the cells are removed. GFC is often the dearer option, with no evidence that it does more. <a href="{hub}#options">What the evidence shows</a>.',
        'cost_heading'    => 'What Decides the Cost of GFC',
        'cost_intro'      => 'No session price is published. Your quote follows the number of sessions, the area treated and any maintenance, is often higher than for PRP, and comes in writing after the assessment.',
        'faqs'            => [
            ['q' => 'Does DenceSpot have a clinic in {area}?',
             'a' => 'No. DenceSpot’s only Delhi clinic is in Rohini, North-West Delhi, and patients from {area} come there for the assessment, every session and each review. Use the Directions button to find it on Google Maps.'],
            ['q' => 'What is the route to Rohini from {area}?',
             'a' => '{route} For door-to-door timings, check Google Maps or the DMRC journey planner, or ask the clinic on WhatsApp.'],
            ['q' => 'How often will I travel from {area} for GFC?',
             'a' => 'Once for the assessment, then for each session of a course spaced some weeks apart, and again for the review at around three to six months. Maintenance visits follow only if you respond. The dates are in your written plan, so the trips from {area} can be arranged early.'],
            ['q' => 'Is GFC priced differently for patients from {area}?',
             'a' => 'No. The quote depends on your plan, the sessions, the area treated and any maintenance, not on your address. It is given in writing after the assessment; <a href="/prp-hair-treatment-cost-in-rohini">how PRP and GFC courses are priced</a> sets out the factors.'],
            ['q' => 'Is GFC worth choosing over PRP?',
             'a' => 'Not on present evidence. It is processed one step further than PRP and often costs more, but it has not been shown to give more hair. See <a href="/hair-prp-treatment-in-delhi">hair PRP treatment in Delhi</a> for the more studied option.'],
            ['q' => 'Can I ride back to {area} on a two-wheeler after a session?',
             'a' => 'Usually, yes. The scalp may be tender for a day or so and a helmet can press on the injection sites, so use a clean liner. Heavy exercise, saunas, steam rooms and pools wait for a short while.'],
            ['q' => 'Can I send photos before making the trip to Rohini?',
             'a' => 'Yes. Clear daylight photos of the thinning areas, sent on WhatsApp, let the clinic tell you whether an assessment is worth booking. Whether GFC suits you is decided only once your scalp has been examined.'],
        ],
        'consult_intro'   => 'Choose a day to come to the Rohini clinic. Your scalp is examined under magnification, the cause of the thinning is looked for, and you are told plainly whether GFC is worth starting; you leave free to decide later.',
        'descriptions'    => [
            'GFC treatment for patients from {area} at DenceSpot’s Rohini clinic, Delhi: GFC vs PRP, evidence, sessions, the metro route, cost and FAQs.',
            'GFC for {area} at DenceSpot’s Rohini clinic, Delhi: GFC vs PRP, sessions, the route, cost and FAQs.',
            'GFC for {area} at DenceSpot’s Rohini clinic: GFC vs PRP, cost and FAQs.',
        ],
    ],
];
