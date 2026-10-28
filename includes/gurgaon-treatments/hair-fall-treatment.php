<?php
/**
 * Copy for the Gurugram hair fall area pages, /hair-fall-treatment-in-<area>
 * (schema: includes/gurgaon-treatment-area-page.php). Facts as on
 * /hair-fall-treatment-in-gurgaon and /blog/hard-water-pollution-and-hair-fall-in-gurgaon,
 * written fresh. Diagnosis first; no prices, doses or medicine names; the
 * Gurugram clinic only.
 */

declare(strict_types=1);

return [
    'form_treatment' => 'Hair fall treatment',
    'form'           => ['Hair fall, cause not known', 'Women’s hair loss', 'Patchy hair loss', 'Dandruff or scalp condition', 'Hair PRP / GFC', 'Not sure — please advise'],
    'faq_about'      => 'hair, tests or medicines',
    'results'        => false,

    'middle' => [
        'heading' => 'What Your Hair Fall May Be Telling You',
        'sub'     => 'Patient education only; causes often overlap, and the examination decides.',
        'cols'    => ['Sign', 'Often linked to'],
        'rows'    => [
            ['Heavy all-over shed after an illness', 'Telogen effluvium'],
            ['Temples, then crown, thinning in men', 'Male pattern loss'],
            ['A parting that keeps widening', 'Female pattern thinning'],
            ['Heavy periods or a strict diet', 'Low iron stores'],
            ['A smooth, round bare patch', 'Alopecia areata'],
            ['An itchy, flaking or sore scalp', 'A scalp condition'],
            ['Short snapped hairs, rough texture', 'Breakage, not shedding'],
        ],
        'note'    => 'Medicines can be behind shedding too, which is why the full list of what you take is asked for at the first visit.',
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'From First Visit to a Hair Fall Plan',
        'intro'     => 'Five stages at our clinic in Sector 39. Nothing long-term begins until the results are in.',
        'items'     => [
            ['chat', 'Your Timeline', 'The date the shedding began, anything that happened in the months before it, relatives with thinning, and all you take.'],
            ['search', 'Magnified Scalp Check', 'The pattern staged and shrinking hairs looked for under magnification, along with the state of the skin.'],
            ['doc', 'Bloods if Indicated', 'Thyroid, ferritin, vitamin D or a blood count, ordered only where your history points to them.'],
            ['camera', 'Baseline Photographs', 'Taken at a fixed angle and light, so every later visit compares like with like.'],
            ['list', 'Diagnosis and Plan', 'What is causing the fall, what will be done about it, and what it costs, on paper before anything starts.'],
        ],
        'note_html' => 'Background reading: <a href="/blog/blood-tests-for-hair-fall">which blood tests matter for hair fall</a> and <a href="/blog/telogen-effluvium-vs-pattern-hair-loss">a sudden shed versus pattern thinning</a>.',
    ],

    'cost' => [
        'factors' => [
            ['search', 'mint', 'What the cause turns out to be', 'A deficiency or a passing shed is usually a shorter plan than pattern loss.'],
            ['doc', 'violet', 'Which tests you need', 'Chosen from your history, so not everyone pays for the same panel.'],
            ['heart', 'sky', 'Whether sessions are added', 'PRP or GFC is suggested only where follicles are thinning but still present.'],
        ],
        'links' => [
            '/cost-and-emi-options'               => 'Payment and EMI options',
            '/prp-hair-treatment-cost-in-gurgaon' => 'What PRP costs in Gurgaon',
        ],
    ],

    'related' => [
        '/hair-fall-treatment-in-gurgaon'        => 'Hair fall treatment in Gurgaon',
        '/womens-hair-loss-treatment-in-gurgaon' => 'Hair loss in women',
        '/dandruff-treatment-in-gurgaon'         => 'Dandruff and itchy scalp',
        '/hair-prp-treatment-in-gurgaon'         => 'Hair PRP in Gurgaon',
        '/hair-loss-assessment'                  => 'Six-question hair loss check',
    ],

    'area' => [
        'lead'            => 'The first visit is spent finding out why your hair is falling, since a thyroid problem, low iron, a recent illness and inherited thinning each call for a different answer.',
        'feats'           => [['search', 'Diagnosis before prescription'], ['doc', 'Blood tests when indicated'], ['camera', 'Baseline photos taken']],
        'heading'         => 'Hair Fall Checks for People From {area}',
        'visits_line'     => 'Every hair fall appointment, from the first examination to the later photo reviews, is held at our clinic in Sector 39, Gurugram.',
        'day_heading'     => 'What to Bring on Day One',
        'day'             => 'Bring a written list of every medicine and supplement you take, any blood reports from the past few months, and one or two older photographs that show how your hair used to look. The first appointment is talk and examination only, so the drive back to {area} or on to the office is not affected.',
        'visits_intro'    => 'Typically an assessment, a return visit to go through any blood results, and photo reviews from about six months, every one of them in Sector 39. Between visits, most treatment is carried out at home.',
        'visit_icons'     => [['search', 'Examination Before Any Plan'], ['doc', 'Blood Results Explained'], ['camera', 'Photo Review From Six Months'], ['list', 'Plan and Cost in Writing']],
        'options_heading' => 'The Hair Fall Treatment Ladder in Sector 39',
        'options_html'    => 'Treatment climbs from the least invasive step upwards: first whatever is correctable, for example an iron or vitamin D shortfall, a thyroid disorder or an inflamed scalp; then prescribed daily treatment if pattern loss is confirmed; then PRP or GFC for thinning follicles that are still alive; and surgery only where follicles are already gone and the pattern has stabilised. Each step is laid out on the <a href="{parent}">hair fall treatment in Gurgaon</a> page.',
        'cost_heading'    => 'What Shapes the Cost of Hair Fall Treatment',
        'cost_intro'      => 'There is no single fee to quote, because hair fall from a deficiency and hair fall from pattern loss end in very different plans. Once you have been examined, the consultation, any tests and the treatment are set out in writing so you can decide.',
        'faqs'            => [
            ['q' => 'Where are patients from {area} seen?',
             'a' => '{area} has no DenceSpot clinic of its own. The history, examination, any blood tests and every review take place at our Gurugram clinic on Sector 39 Road, Jharsa, opposite Medanta – The Medicity.'],
            ['q' => 'What is the way to the clinic from {area}?',
             'a' => '{route} Tap Directions for the live route from your door, or message the clinic on WhatsApp if you need help finding it.'],
            ['q' => 'How much hair fall is too much?',
             'a' => 'Losing 50 to 100 hairs on an ordinary day is common, and more on a wash day is expected. Direction matters more than the count: shedding above your normal for longer than six to eight weeks, scalp showing where it did not, or bare patches appearing. Any of those makes the trip from {area} worthwhile.'],
            ['q' => 'Is Gurugram’s water or smog behind my hair fall?',
             'a' => 'Rarely at the root. Hard borewell water can leave hair dry and brittle so that it snaps, which looks like hair fall but is breakage along the shaft; it does not widen a parting or move a hairline back. Smog can irritate the scalp, but the evidence that it causes hair loss is weak. See <a href="/blog/hard-water-pollution-and-hair-fall-in-gurgaon">hard water, pollution and hair fall in Gurgaon</a>.'],
            ['q' => 'Which blood tests might be ordered?',
             'a' => 'Only those your history and examination call for. The usual ones are thyroid function, iron studies including ferritin, vitamin D and a full blood count, with hormone tests in some cases. The aim is to find anything reversible before long-term treatment is considered.'],
            ['q' => 'How many trips from {area} should I expect?',
             'a' => 'Commonly the assessment, a return visit once any blood results are in, and photo reviews from around six months onward. Treatment between those visits is mostly done at home, and the dates go into your plan so the drive from {area} can be fitted around work.'],
            ['q' => 'Do patients from {area} pay a different fee?',
             'a' => 'No. The plan sets the cost, not your address: a correctable cause usually means a shorter plan, while pattern loss needs treatment that carries on. See <a href="/cost-and-emi-options">cost and EMI options</a>.'],
        ],
        'consult_intro'   => 'Choose a day that suits you to see the doctor in Sector 39. You get a history, a magnified look at the scalp, the tests your history justifies and nothing more, and a plain explanation of the cause; nothing is started on the day unless you want it.',
        'descriptions'    => [
            'Hair fall treatment for {area} at DenceSpot’s clinic in Sector 39, Gurugram: causes, blood tests, getting there, visits, cost and FAQs.',
            'Hair fall treatment for {area} at DenceSpot, Sector 39, Gurugram: causes, tests, cost and FAQs.',
            'Hair fall treatment for {area} at DenceSpot Gurugram: causes, tests and FAQs.',
        ],
    ],
];
