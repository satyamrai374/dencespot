<?php
/**
 * Copy for /hair-transplant-for-women-in-delhi and its area pages (schema:
 * includes/delhi-treatment-pillar.php). Facts as on
 * /hair-transplant-for-women-in-rohini (medical workup first, diffuse vs
 * localised loss, traction, a high hairline and scars, trimmed or unshaven
 * donor), written fresh. No drug names or doses, no prices. No results row:
 * the clinic's consented scalp photographs are not of women's cases.
 */

declare(strict_types=1);

return [
    'title'          => [
        'Hair Transplant for Women in Delhi: Tests & Cost | DenceSpot',
        'Hair Transplant for Women in Delhi: Tests & Cost',
        'Hair Transplant for Women in Delhi | DenceSpot',
    ],
    'description'    => 'Hair transplant for women in Delhi at DenceSpot’s Rohini clinic: medical workup first, who surgery may suit, unshaven options, recovery, cost and FAQs.',
    'keywords'       => ['hair transplant for women in delhi', 'female hair transplant delhi', 'hair transplant for women cost in delhi', 'hairline transplant for women delhi', 'hair transplant for women in rohini'],
    'form_treatment' => 'Hair transplant',
    'form'           => ['Hair transplant for women', 'Women’s hair loss treatment', 'Hairline transplant', 'Hair fall treatment', 'Not sure — please advise'],

    'hero' => [
        'lead'  => 'Hair transplant for women at our Rohini clinic, considered only once a doctor has looked for a treatable cause and checked that your donor hair is stable — with trimmed or unshaven options discussed and the estimate in writing.',
        'feats' => [['search', 'Cause looked for first'], ['chart', 'Donor density measured'], ['settings', 'Trimmed or unshaven donor'], ['doc', 'Written estimate first']],
    ],

    'about' => [
        'heading' => 'How a Hair Transplant for Women Works',
        'paras'   => [
            'The operation is the same one men have: follicles are moved from the back and sides of the head to where hair has been lost, under local anaesthetic as a day case. What differs is the decision to operate. In many women thinning is spread across the whole scalp, the back and sides included, and hair moved from a thinning donor area goes on thinning in its new place.',
            'So the first appointment is a medical one. Iron, thyroid, hormonal and post-pregnancy causes are looked for, and surgery is discussed only for a defined area of loss with stable hair behind it. In Delhi, these assessments and any procedure take place at DenceSpot’s Rohini clinic, with registered medical practitioners carrying out the work.',
        ],
        'cta'     => ['#suitability', 'See When Surgery Can Suit'],
        'glance'  => [
            ['search', 'mint', 'First visit', 'History, scalp examination and tests'],
            ['chart', 'violet', 'Donor area', 'Measured before surgery is discussed'],
            ['settings', 'sky', 'Donor hair', 'Usually trimmed in a hidden band'],
            ['clock', 'amber', 'New growth', 'Starts at 3–4 months; assessed at 10–12'],
        ],
    ],

    'middle' => [
        'heading' => 'Pattern of Loss and the Usual First Step',
        'sub'     => 'General patient education, not a diagnosis.',
        'cols'    => ['Pattern', 'Usually first'],
        'rows'    => [
            ['Diffuse thinning, donor included', 'Medical treatment'],
            ['Shedding after childbirth', 'Time, tests and a review'],
            ['Low iron or thyroid change', 'Treat the cause'],
            ['Old traction loss at the hairline', 'Surgery may be discussed'],
            ['A hairline that has always sat high', 'Surgery may be discussed'],
            ['A settled scar', 'Cautious grafting'],
        ],
        'note'    => 'Several of these change once a cause is treated, so the pattern is looked at again afterwards.',
    ],
    'results' => false,

    'why' => [
        'heading' => 'Why Choose DenceSpot for a Hair Transplant for Women in Delhi?',
        'intro'   => 'How a woman’s case is handled at the Rohini clinic: diagnosis first, then a plain answer on whether surgery has a place.',
        'icons'   => [
            ['user', 'Doctor-Led Workup'],
            ['search', 'Causes Checked Before Surgery'],
            ['chart', 'Donor Density Measured'],
            ['hairline', 'Hairline Drawn for a Woman'],
            ['settings', 'Trimmed or Unshaven Donor'],
            ['pin', 'Rohini Clinic, North-West Delhi'],
        ],
        'media'   => 'equipment',
        'checks'  => ['Medical workup before surgery', 'Donor trimmed in a hidden band', 'Reviews through the first year'],
    ],

    'suit' => [
        'heading' => 'Who a Hair Transplant for Women May Suit',
        'intro'   => 'Surgery handles one kind of loss well: a defined area with dense, stable hair behind it. Confirming that, and ruling out a treatable cause, is what the examination is for.',
        'yes'     => ['heading' => 'May Be Considered For', 'items' => [
            'Old traction loss at the hairline or temples, with the pulling stopped',
            'A hairline that has always sat high, with a stable front',
            'A settled scar from surgery, an injury or a burn',
            'Loss confined to one zone, with a dense donor area',
            'Expecting medical treatment to continue alongside',
        ]],
        'wait'    => ['heading' => 'Not Advised, or Not Yet', 'items' => [
            'Diffuse thinning that reaches the back and sides',
            'Shedding after childbirth that is still recovering',
            'Low iron, a thyroid problem or PCOS not yet treated',
            'Active alopecia areata or a scarring alopecia',
            'Hairstyles that still pull on the hairline',
        ]],
        'note'    => ['heading' => 'Diagnosis Before Any Plan', 'paras' => [
            'Most diffuse thinning in women is treated medically: <a href="/womens-hair-loss-treatment-in-rohini">women’s hair loss treatment</a> covers that route, and <a href="/alopecia-areata-treatment-in-rohini">alopecia areata treatment</a> the patchy kind.',
            'Iron studies and thyroid function are the usual tests, with hormonal tests where your history points to them. See <a href="/blog/blood-tests-for-hair-fall">blood tests for hair fall</a> and <a href="/blog/hair-fall-after-pregnancy">hair fall after pregnancy</a>.',
        ]],
    ],

    'options' => [
        'eyebrow'         => 'Treatment options',
        'heading'         => 'Surgery or Medical Treatment for Women',
        'intro'           => 'For many women the answer is medical treatment alone; for some, a transplant is added once the cause is under control. The two are not rivals, and where loss is ongoing they run together.',
        'cards'           => [
            ['hairline', 'mint', 'Hair Transplant', 'Follicles from the back and sides placed into a defined area, such as a high or traction-thinned hairline or a settled scar. A woman’s hairline is drawn rounder and lower than a man’s, without deep corners at the temples.', [
                'Needs a stable, dense donor area',
                'Donor usually trimmed in a hidden band',
                'Does not stop diffuse thinning',
            ]],
            ['heart', 'violet', 'Medical Treatment', 'The main route for female pattern hair loss, and usually continued after any surgery. It can slow the loss and, for some women, improve density, judged against photographs over months.', [
                'Prescribed after history and tests',
                'Some medicines unsuitable in pregnancy',
                'The gain fades if it is stopped',
            ]],
        ],
        'choose'          => ['heading' => 'How the Doctor Decides', 'items' => [
            'Whether the loss is diffuse or confined to one zone',
            'Density at the back and sides, measured directly',
            'Blood test results and any treatable cause',
            'Pregnancy, breastfeeding or plans to conceive',
            'How you wear your hair, and whether to stay unshaven',
        ]],
        'related_heading' => 'Related Treatments at the Rohini Clinic',
        'related'         => [
            '/hair-transplant-for-women-in-rohini'  => 'Women’s transplant in Rohini',
            '/womens-hair-loss-treatment-in-rohini' => 'Women’s hair loss treatment',
            '/unshaven-hair-transplant-in-rohini'   => 'Unshaven hair transplant',
            '/hairline-transplant-in-rohini'        => 'Hairline transplant',
        ],
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'How the Process Works for Women',
        'intro'     => 'Five stages at the Rohini clinic. The first two are about diagnosis, and many women stop there with a medical plan instead.',
        'items'     => [
            ['search', 'History & Examination', 'When the loss began, what came before it, your medicines, cycle and pregnancy plans, then the scalp examined under magnification.'],
            ['doc', 'Tests & Donor Check', 'Blood tests where your history calls for them, and density at the back and sides measured directly.'],
            ['pencil', 'Plan & Design', 'If surgery suits, the area agreed, a hairline drawn for a woman and the estimate set out in writing.'],
            ['settings', 'Procedure Day', 'Under local anaesthetic as a day case, with the donor usually trimmed in a narrow band or left unshaven.'],
            ['camera', 'Reviews', 'Photographed reviews through the first year, with medical treatment continuing where loss is ongoing.'],
        ],
        'note_html' => 'More in <a href="/blog/who-should-not-have-a-hair-transplant">who should not have a hair transplant</a> and <a href="/blog/telogen-effluvium-vs-pattern-hair-loss">telogen effluvium vs pattern hair loss</a>.',
    ],

    'aftercare' => [
        'eyebrow'      => 'Recovery',
        'heading'      => 'Recovery After a Hair Transplant for Women in Delhi',
        'intro'        => 'Longer hair hides the grafts well but holds heat and sweat against the scalp. These are general timings; your written aftercare sheet comes first.',
        'timeline'     => [
            'First week: small crusts and tenderness; wash exactly as you were shown at the clinic',
            'First weeks: many of the transplanted hairs drop out, which is expected; the roots stay in the skin',
            'Months three to nine: fine new hairs appear and thicken gradually',
            'Months ten to twelve: the result is assessed against your review photographs',
        ],
        'tips_heading' => 'A Delhi Recovery, Practically',
        'tips'         => [
            ['clock', 'mint', 'Summer heat', 'Hair worn loose traps warmth against healing skin; avoid the midday heat and leave sweat to dry by itself.'],
            ['alert', 'violet', 'Smog season', 'When the AQI is bad, cut outdoor time, and pick a mask that hooks over the ears, not one tied behind the head.'],
            ['hairline', 'sky', 'Tying hair back', 'Leave hair loose, without tight ties, buns or clips over the grafts, until your review says otherwise.'],
            ['shield', 'amber', 'Two-wheelers', 'Even as a pillion rider you need a helmet, so use cabs or get a lift until a review clears one.'],
        ],
    ],

    'cost' => [
        'heading'  => 'Hair Transplant Cost for Women in Delhi',
        'intro'    => 'No figure is published, and for some women the workup ends with medical treatment instead of surgery, at a much smaller cost. Where a transplant is advised, the estimate follows the graft count, the donor method and the area treated, and it is given in writing after your assessment at the Rohini clinic.',
        'factors'  => [
            ['chart', 'mint', 'Grafts needed', 'Counted from the defined area to be treated.'],
            ['settings', 'violet', 'Trimmed or unshaven', 'Unshaven sessions take longer to carry out.'],
            ['scale', 'sky', 'Skin being treated', 'Scar tissue is slower to work in than healthy skin.'],
            ['heart', 'amber', 'Medical treatment', 'Usually continues after surgery, as a separate cost.'],
        ],
        'meta'     => 'Before comparing two figures, check whether each quote counts grafts or individual hairs, and what it includes.',
        'links'    => [
            '/hair-transplant-cost-in-rohini'         => 'Rohini cost guide',
            '/blog/hair-transplant-cost-delhi-quotes' => 'Comparing Delhi quotes',
            '/cost-and-emi-options'                   => 'EMI and payment',
        ],
        'estimate' => ['heading' => 'What a Written Estimate Includes', 'items' => [
            'Grafts for the agreed area',
            'Trimmed or unshaven donor work',
            'Local anaesthesia and medication',
            'Follow-up reviews through the year',
            'Tests and medical treatment as separate lines',
        ], 'note' => 'Instalment options through third-party lenders may be available; ask at the consultation.'],
    ],

    'faqs' => [
        ['q' => 'Who is a hair transplant for women suitable for?',
         'a' => 'Women with a defined area of loss and dense, stable hair at the back and sides: long-standing traction loss at the hairline, a forehead that has always been high, or a settled scar. It is usually not advised for thinning spread across the whole scalp, and it waits while a treatable cause such as low iron, a thyroid problem or post-pregnancy shedding is dealt with. Suitability follows an examination and any tests it leads to.'],
        ['q' => 'How many grafts will I need?',
         'a' => 'Surgery for women is usually aimed at a defined area, such as a hairline or a scar, so the count is worked out from that area once it has been measured alongside your donor density. There is no standard number. The <a href="/hair-transplant-graft-calculator">graft calculator</a> can give a ballpark, nothing more.'],
        ['q' => 'How long is recovery?',
         'a' => 'Small crusts and tenderness settle over the first week or so, and most women return to desk work within a few days, with longer hair covering the grafts. Anything that pulls or presses on the grafts, from a tight ponytail or clip to a cap or helmet, waits until a review clears it. The <a href="/hair-transplant-aftercare">aftercare guide</a> goes through the stages.'],
        ['q' => 'How much does a hair transplant for women cost in Delhi?',
         'a' => 'There is no set fee. If the workup finds a treatable cause, medical treatment may be advised instead, at a much smaller cost. Where surgery suits, the estimate follows the grafts needed, trimmed or unshaven donor work, the skin being treated and any treatment alongside, and it is given in writing after your assessment at the Rohini clinic. The <a href="/hair-transplant-cost-in-rohini">Rohini cost guide</a> explains the factors.'],
        ['q' => 'Does the procedure hurt?',
         'a' => 'Most of the discomfort comes at the start, with the numbing injections. After that the scalp is numb, though pressure may still be felt and people differ in how much they notice; if something hurts, say so and more local anaesthetic can be given. Afterwards the scalp may be tender for a few days, and the medicines prescribed for you help with that.'],
        ['q' => 'When will I see the result?',
         'a' => 'Expect the transplanted hairs to shed within the first few weeks. Fine new hair starts from about three to four months and thickens over the following months, with the result assessed at around ten to twelve. A transplant has no effect on thinning elsewhere, so medical treatment usually carries on; results vary.'],
        ['q' => 'Why are many women told a transplant will not help?',
         'a' => 'Usually because the thinning is diffuse. Grafts are borrowed from the back and sides, and if that hair is already getting finer, it carries on doing so wherever it is placed. Many women also turn out to have a correctable cause, and treating it often does more than an operation would.'],
        ['q' => 'Which tests might I need first?',
         'a' => 'Whatever your history and examination call for: most often iron studies and a thyroid check, with hormone tests added when a hormonal cause such as PCOS looks possible. You go through the results with the doctor before any plan is drawn up; <a href="/blog/blood-tests-for-hair-fall">blood tests for hair fall</a> describes the common ones.'],
        ['q' => 'My hair fell out after my baby was born. Should I consider a transplant?',
         'a' => 'Usually not. Hair that falls in the months after a birth mostly grows back over the months that follow, and grafting during that phase uses donor hair on a problem likely to resolve. Iron and thyroid are checked, and the hair is reviewed once it has had time to recover; see <a href="/blog/hair-fall-after-pregnancy">hair fall after pregnancy</a>.'],
        ['q' => 'Can traction alopecia be treated with grafts?',
         'a' => 'Sometimes. Tight braids, buns or extensions worn for years can kill follicles along the hairline and temples. If no hair has come back long after those styles were given up, grafting can be considered, but only once the pulling has stopped for good, since new hair would be damaged in the same way.'],
        ['q' => 'Can a high hairline be brought forward?',
         'a' => 'It can be, when the hairline has sat high all your life, the hair behind it is stable and enough donor hair is available. Grafts set ahead of the existing line shorten the forehead, and the new line is shaped for a woman, rounder and without deep corners at the temples. See <a href="/hairline-transplant-in-rohini">hairline transplant</a>.'],
        ['q' => 'Will my head have to be shaved?',
         'a' => 'Rarely. In most cases only a narrow strip at the back is trimmed, and the hair above it drops down to hide it. A fully unshaven approach is possible for smaller sessions but is slower. See <a href="/unshaven-hair-transplant-in-rohini">unshaven hair transplant</a>.'],
        ['q' => 'Can I take hair loss medicine while pregnant or breastfeeding?',
         'a' => 'Not always: several medicines prescribed for female pattern hair loss should be avoided while pregnant, breastfeeding or trying to conceive. Tell the doctor about any such plans at the start, and the treatment is chosen around them; <a href="/blog/female-pattern-hair-loss-in-women">female pattern hair loss</a> sets out the options in general terms.'],
        ['q' => 'I live elsewhere in Delhi. Where would I be seen?',
         'a' => 'At our one Delhi clinic, in Rohini, North-West Delhi. Women come from all over the city, and every visit, from the workup to the reviews, is held there. The neighbourhoods we serve are linked near the bottom of this page.'],
        ['q' => 'Can I share photos on WhatsApp before booking?',
         'a' => 'Yes. A top-down picture of your parting, plus your hairline and the back of your head, lets the clinic give you a first view. The decision on surgery is made only after you have been examined and any tests are back.'],
    ],
    'faq_about' => 'hair, health or budget',

    'consult' => [
        'heading' => 'Book a Hair Transplant Consultation for Women in Delhi',
        'intro'   => 'Bring your medicines list and any blood reports to the Rohini clinic. The doctor takes a history, examines your scalp and donor area, arranges the tests your case needs and tells you plainly whether surgery has a place in your plan or medical treatment should come first. No procedure is booked that day unless you decide to.',
    ],

    'schema_type' => 'procedure',
    'schema'      => [
        'name'              => 'Hair Transplant for Women',
        'description'       => 'A hair transplant for women moves follicles from a stable donor area at the back and sides of the scalp into a defined area of loss. It is considered only after a medical workup and carried out in a single day under local anaesthetic at the Rohini clinic in Delhi.',
        'alternateName'     => ['Hair Transplant for Women in Delhi', 'Female Hair Transplant in Delhi', 'Women’s hair transplant'],
        'procedureType'     => 'https://schema.org/SurgicalProcedure',
        'bodyLocation'      => 'Scalp',
        'howPerformed'      => 'Only once treatable causes have been looked for and the donor area judged stable, follicular units are removed from the back and sides of the scalp, usually through a narrow trimmed band or without shaving, and placed into a defined area such as a hairline thinned by long-standing traction, a high hairline or a settled scar. Carried out in a single day under local anaesthetic at the Rohini clinic in Delhi.',
        'preparation'       => 'A history covering health, medicines, periods and pregnancy plans; a scalp examination to distinguish thinning spread across the scalp from loss in one zone; direct donor density measurement; and blood tests, commonly iron and thyroid, where the history calls for them.',
        'followup'          => 'Written aftercare and photographed reviews at the Rohini clinic over the first year, alongside continued medical treatment where hair loss is ongoing.',
        'expectedPrognosis' => 'When surgery is appropriate, the grafted hairs usually shed in the first weeks, regrow from about three to four months and are assessed at ten to twelve months. Thinning elsewhere on the scalp is not halted by surgery and usually needs continued medical treatment. Results differ from one woman to another and cannot be promised.',
    ],

    'area' => [
        'lead'            => 'A hair transplant for a woman there starts with a medical workup and a measurement of your donor hair, and surgery is discussed only if both point that way.',
        'feats'           => [['search', 'Cause looked for first'], ['chart', 'Donor hair measured'], ['doc', 'Written estimate first']],
        'heading'         => 'Hair Transplant for Women From {area}',
        'visits_line'     => 'The workup, any procedure and the reviews that follow take place at the Rohini clinic.',
        'day_heading'     => 'On Your First Visit',
        'day'             => 'Before you leave {area}, pack a list of what you take, medicines and supplements alike, your recent blood test reports and some old photos that show how your hair used to look. The first visit is a history and an examination, not surgery, and any tests your case needs are arranged from there.',
        'visits_intro'    => 'A first visit for the history and examination, the tests it leads to and a plan once the results are back; then, only if surgery suits, the procedure day and photographed reviews — all at the Rohini clinic.',
        'visit_icons'     => [['search', 'Workup Comes First'], ['doc', 'Results Gone Through With You'], ['calendar', 'Procedure Only if Advised'], ['camera', 'Photographed Reviews']],
        'options_heading' => 'Surgery and Medical Treatment at the Rohini Clinic',
        'options_html'    => 'A transplant can help a defined area with a stable donor, such as old traction loss, a high hairline or a settled scar; diffuse thinning is usually treated medically, and many women need only that route. <a href="{hub}#options">How the two compare</a>.',
        'cost_heading'    => 'How a Women’s Hair Transplant Is Priced',
        'cost_intro'      => 'There is no set fee. If the workup finds a treatable cause, the advice may be medical treatment instead. Where surgery suits, the estimate follows the grafts needed, the donor method and the skin treated, and it is given in writing after your assessment.',
        'faqs'            => [
            ['q' => 'Is there a DenceSpot clinic in {area}?',
             'a' => 'No. Women from {area} are seen at DenceSpot’s Rohini clinic in North-West Delhi, the only one we have in the city, for the workup, any procedure and every review; the Directions button shows it on Google Maps.'],
            ['q' => 'How do I get to the Rohini clinic from {area}?',
             'a' => '{route} On a procedure day, arrange a lift or a cab home rather than riding pillion.'],
            ['q' => 'How many visits to Rohini should I expect?',
             'a' => 'At least one for the history and examination, with tests arranged from there and the results gone through before any plan. If surgery is advised, there is the procedure day and reviews through the first year. The visits are listed in your plan, so travel from {area} can be arranged around them.'],
            ['q' => 'Does living in {area} change the cost?',
             'a' => 'No. The estimate depends on your plan, not your address, and you receive it in writing after the assessment; the <a href="/hair-transplant-cost-in-rohini">Rohini cost guide</a> sets out the factors.'],
            ['q' => 'Will a transplant help my thinning?',
             'a' => 'Only if the loss is confined to one area and your donor hair is stable. Thinning spread across the scalp is usually treated medically; <a href="/womens-hair-loss-treatment-in-rohini">women’s hair loss treatment</a> at the same clinic covers that route.'],
            ['q' => 'How soon can I return to work in {area}?',
             'a' => 'Most women are back at desk work within a few days, with longer hair covering the grafts. Tight hair ties, clips and helmets stay off until a review.'],
            ['q' => 'Can I send photos before travelling to Rohini?',
             'a' => 'Yes. WhatsApp the clinic pictures of your parting from above, your hairline and the back of your head. Surgery is only decided on after you have been examined in person.'],
        ],
        'consult_intro'   => 'Pick a day for a first appointment at the Rohini clinic. The doctor looks for the cause of your thinning, measures your donor hair and tells you whether a transplant has a place in your plan; nothing is booked unless you decide to.',
        'descriptions'    => [
            'Hair transplant for women from {area} at DenceSpot’s Rohini clinic, Delhi: workup first, who it may suit, the route, cost and FAQs.',
            'Hair transplant for women from {area} at DenceSpot’s Rohini clinic: workup first, who it suits, cost and FAQs.',
            'Women’s hair transplant for {area} at DenceSpot’s Rohini clinic: suitability, cost and FAQs.',
        ],
    ],
];
