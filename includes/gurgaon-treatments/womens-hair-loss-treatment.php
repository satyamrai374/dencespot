<?php
/**
 * Copy for the Gurugram women's hair loss area pages,
 * /womens-hair-loss-treatment-in-<area> (schema:
 * includes/gurgaon-treatment-area-page.php). Facts as on
 * /womens-hair-loss-treatment-in-gurgaon, written fresh. Diagnosis first;
 * no medicine names, doses or prices; pregnancy plans before any medicine;
 * the Gurugram clinic only.
 */

declare(strict_types=1);

return [
    'form_treatment' => 'Hair fall treatment',
    'form'           => ['Hair loss, cause not yet known', 'Shedding after pregnancy', 'Widening parting or thinning', 'Thinning with PCOS or thyroid', 'Traction from tight styles', 'Not sure — please advise'],
    'faq_about'      => 'periods, pregnancy or medicines',
    'results'        => false,

    'middle' => [
        'heading' => 'Clues in Your Timeline',
        'sub'     => 'What came before the loss often hints at its cause; tests confirm it.',
        'cols'    => ['What came first', 'What it may point to'],
        'rows'    => [
            ['A baby a few months earlier', 'Post-partum shedding'],
            ['Illness, surgery or a crash diet', 'Telogen effluvium'],
            ['Heavy periods or a restricted diet', 'Low iron stores'],
            ['Irregular periods, acne', 'A hormonal cause such as PCOS'],
            ['Tiredness or weight change', 'A thyroid problem'],
            ['Years of tight buns or braids', 'Traction alopecia'],
            ['A parting widening over years', 'Female pattern thinning'],
        ],
        'note'    => 'Two or three of these can run together, so a likely cause is confirmed on examination and blood tests rather than assumed.',
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'How a Woman’s Hair Loss Is Diagnosed and Followed',
        'intro'     => 'The order matters: the cause comes first, the treatment second, and the reviews show whether it is working.',
        'items'     => [
            ['chat', 'The Timeline', 'When the loss began and any event a few months before it: a birth, an illness, surgery, weight change, stress or a new medicine.'],
            ['search', 'Scalp and Parting', 'Whether thinning is spread out or in one place, how wide the parting has become, and density at the back and sides.'],
            ['doc', 'Tests Where Pointed To', 'Iron and thyroid most often; hormone tests when periods, acne or other signs suggest them.'],
            ['list', 'A Plan for the Cause', 'Treatment aimed at what was found, with photographs taken so its effect can be judged later.'],
            ['camera', 'Reviews Over Months', 'Progress set against the baseline images, repeat bloods where relevant, and the plan adjusted on that evidence.'],
        ],
        'note_html' => 'Further reading: <a href="/blog/hair-fall-after-pregnancy">hair fall after pregnancy</a> and <a href="/blog/thyroid-and-hair-loss">how thyroid problems affect hair</a>.',
    ],

    'cost' => [
        'factors' => [
            ['search', 'mint', 'What is found', 'Correcting low iron is a smaller plan than long-term care for pattern thinning.'],
            ['doc', 'violet', 'Which tests are needed', 'Iron, thyroid and hormone tests are ordered only where your history points.'],
            ['heart', 'sky', 'Supportive sessions', 'Added only if they bring something to the plan, and quoted as a course.'],
        ],
        'links' => [
            '/cost-and-emi-options'               => 'Cost and payment options',
            '/prp-hair-treatment-cost-in-gurgaon' => 'PRP pricing in Gurgaon',
        ],
    ],

    'related' => [
        '/womens-hair-loss-treatment-in-gurgaon' => 'Women’s hair loss treatment in Gurgaon',
        '/hair-fall-treatment-in-gurgaon'        => 'Hair fall treatment',
        '/hair-transplant-for-women-in-gurgaon'  => 'When surgery suits women',
        '/blog/female-pattern-hair-loss-in-women' => 'Female pattern hair loss',
        '/blog/vitamin-deficiency-and-hair-loss' => 'Deficiencies and hair loss',
    ],

    'area' => [
        'lead'            => 'There, the appointment is spent working out why the hair is going, because low iron, a thyroid change, a recent baby, PCOS, tight styling and female pattern thinning can look alike in the mirror yet need quite different care.',
        'feats'           => [['clock', 'Timeline heard in full'], ['doc', 'Bloods where indicated'], ['heart', 'Pregnancy plans considered']],
        'heading'         => 'Thinning Hair in Women From {area}: First Steps',
        'visits_line'     => 'History, examination, the review of any blood results and each follow-up all happen at the Sector 39 clinic in Gurugram.',
        'day_heading'     => 'Getting Ready for the First Appointment',
        'day'             => 'Write down roughly when the loss began and anything that happened a few months earlier, such as a delivery, an illness, a new medicine or a big change in diet. Add every medicine and supplement, contraception included, any recent blood reports and older photos of your parting. Nothing is done to the scalp that day beyond looking, so you can return to {area} or the office straight after.',
        'visits_intro'    => 'An assessment to start, a second appointment when the blood results arrive, and reviews of your parting against baseline photographs in the months after. Every visit is in Sector 39.',
        'visit_icons'     => [['chat', 'Timeline and History'], ['doc', 'Results Talked Through'], ['camera', 'Baseline Photos of the Parting'], ['heart', 'Choices That Suit Pregnancy Plans']],
        'options_heading' => 'Treating Hair Loss in Women at the Gurugram Clinic',
        'options_html'    => 'There is no single protocol. Low iron is corrected and then rechecked; a thyroid disorder or PCOS is looked after as a health condition in itself, not only as a hair problem; shedding after a delivery or an illness is often given time with a review date; tension is taken off the hairline; and confirmed female pattern thinning is treated with topical or prescribed medicine chosen around pregnancy plans. PRP may support that treatment but does not replace it. Read more on the <a href="{parent}">women’s hair loss treatment in Gurgaon</a> page.',
        'cost_heading'    => 'Women’s Hair Loss Treatment: What Sets the Price',
        'cost_intro'      => 'Prices depend on what is found. When the cause is a deficiency or a shed that will pass, the plan is often modest; female pattern thinning means treatment that goes on for longer, so the total is higher. The figures are written down for you once you have been seen.',
        'faqs'            => [
            ['q' => 'Where are women from {area} seen?',
             'a' => 'At our Jharsa clinic, the only DenceSpot clinic in Gurugram, on Sector 39 Road opposite Medanta – The Medicity. Women from {area} have the assessment, the blood-result review and every follow-up there.'],
            ['q' => 'How do I find the clinic, coming from {area}?',
             'a' => '{route} For directions from your own street, use the Directions button; if you lose your way near Medanta, message the clinic on WhatsApp.'],
            ['q' => 'I had a baby a few months ago and my hair is coming out. Is it worth the trip from {area}?',
             'a' => 'Often it sorts itself out: post-partum shedding usually starts some months after delivery and is temporary. Come in if it is not easing, if the parting looks wider than before the pregnancy, or if you are also exhausted, so that low iron or a thyroid change is not missed.'],
            ['q' => 'Does it matter if I am planning a pregnancy?',
             'a' => 'Yes, so tell the doctor even if it is only a possibility. Some medicines used for pattern thinning are not appropriate during pregnancy or while trying to conceive, which is one reason this site does not name them. The plan is then built around it.'],
            ['q' => 'I tie my hair back tightly for work every day. Can that cause hair loss?',
             'a' => 'It can. Steady pulling from tight buns, braids or extensions can thin the hairline and temples, and caught early it often improves once the tension stops. Left for years, those follicles can be lost for good, so looser styles and a change in where the hair is tied are worth trying, and the doctor can look at your hairline.'],
            ['q' => 'How many visits from {area} will it take?',
             'a' => 'Expect an initial appointment, another once the bloods have been reported, and then reviews spaced over several months while the plan takes effect. Most treatment between visits happens at home, and the review dates are agreed at the start so you can plan around them.'],
            ['q' => 'Is treatment priced differently for women from {area}?',
             'a' => 'No. Cost depends on what is found and the plan that follows, not on where you live. See <a href="/cost-and-emi-options">cost and payment options</a>.'],
        ],
        'consult_intro'   => 'Pick a day that suits you for an appointment in Sector 39. The doctor hears the whole timeline, examines your parting and scalp, orders only the tests your history points to and explains what is likely behind the loss before any treatment is discussed.',
        'descriptions'    => [
            'Women’s hair loss treatment for patients from {area} at DenceSpot, Sector 39, Gurugram: iron, thyroid, PCOS and post-partum causes, cost and FAQs.',
            'Women’s hair loss treatment for {area} at DenceSpot, Sector 39, Gurugram: iron, thyroid, PCOS, cost and FAQs.',
            'Women’s hair loss care for {area} at DenceSpot Gurugram: iron, thyroid and PCOS checked.',
        ],
    ],
];
