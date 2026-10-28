<?php
/**
 * Copy for the Gurugram hair mesotherapy area pages,
 * /hair-mesotherapy-in-<area> (schema: includes/gurgaon-treatment-area-page.php).
 * Facts as on /hair-mesotherapy-in-gurgaon, written fresh. Position kept: a
 * delivery route, not a medicine; no standard formulation; limited evidence;
 * at most an add-on after diagnosis, never the main treatment. No prices, no
 * product or brand names; the Gurugram clinic only.
 */

declare(strict_types=1);

return [
    'form_treatment' => 'Hair PRP / GFC',
    'form'           => ['Hair mesotherapy', 'Hair loss — not yet diagnosed', 'Comparing treatment options', 'Hair PRP treatment', 'Not sure — please advise'],
    'faq_about'      => 'allergies, medicines or budget',
    'results'        => false,

    'middle' => [
        'heading' => 'Mesotherapy Comes Last, Not First',
        'sub'     => 'The usual order of a hair loss plan.',
        'cols'    => ['Order', 'Purpose'],
        'rows'    => [
            ['1. Diagnosis', 'Find out why the hair is thinning'],
            ['2. Reversible causes', 'Treat low iron, thyroid or hormones'],
            ['3. Proven treatment', 'Start medical treatment with evidence'],
            ['4. Optional extra', 'Mesotherapy, if you still want it'],
            ['5. Review', 'Compare photographs; stop if no change'],
        ],
        'note'    => 'Beginning at step four, with no diagnosis or proven treatment underneath, is the pattern this order is meant to prevent.',
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'From First Visit to Review: Mesotherapy in Gurugram',
        'intro'     => 'If, after the diagnosis, you still want to add mesotherapy, it is run as a measured course beside your main treatment rather than on its own.',
        'items'     => [
            ['search', 'Diagnosis', 'Why the hair is thinning is worked out first, with blood tests if iron deficiency, thyroid disease or a hormonal cause is suspected.'],
            ['list', 'Named Solution', 'You are told what the solution contains before agreeing, and it is checked against any allergy you have had.'],
            ['camera', 'Baseline Photographs', 'Standard views of the thinning area, taken before the first session as the reference for every review.'],
            ['settings', 'Short Sessions', 'The solution goes in through very fine needles as many small, shallow injections across the thinning area.'],
            ['chart', 'Review', 'Photographs are compared with the baseline over months; a course that shows no change is stopped there, and your main treatment carries on.'],
        ],
        'note_html' => 'Before any extra is considered, read <a href="/blog/blood-tests-for-hair-fall">the blood tests worth having for hair fall</a> and <a href="/blog/telogen-effluvium-vs-pattern-hair-loss">how short-term shedding differs from pattern loss</a>.',
    ],

    'cost' => [
        'factors' => [
            ['list', 'mint', 'The solution used', 'Named in your plan and priced openly with it.'],
            ['calendar', 'violet', 'How many sessions', 'Follows your diagnosis and can be cut short at review.'],
            ['doc', 'sky', 'Main treatment', 'Medical treatment is costed on a separate line.'],
        ],
        'links' => [
            '/cost-and-emi-options' => 'Cost and EMI options',
            '/hair-loss-assessment' => 'Hair loss assessment',
        ],
    ],

    'related' => [
        '/hair-mesotherapy-in-gurgaon'    => 'Hair mesotherapy in Gurgaon',
        '/hair-fall-treatment-in-gurgaon' => 'Hair fall treatment',
        '/hair-prp-treatment-in-gurgaon'  => 'Hair PRP treatment',
        '/hair-microneedling-in-gurgaon'  => 'Hair microneedling',
    ],

    'area' => [
        'lead'            => 'Before anyone mentions mesotherapy there, the cause of your hair loss is worked out; if it is added at all, it sits on top of a treatment with stronger evidence, and you learn exactly what is in the syringe first.',
        'feats'           => [['list', 'Contents disclosed'], ['scale', 'Limited evidence, stated'], ['info', 'Stoppable at review']],
        'heading'         => 'Hair Mesotherapy Enquiries From {area}',
        'visits_line'     => 'Assessment, any sessions you choose and each review are held at our Sector 39 clinic in Gurugram, and the advice you leave with may be a better-supported treatment instead.',
        'day_heading'     => 'What a Session Day Looks Like',
        'day'             => 'Sessions are brief, and most people return to work or home in {area} the same day. Redness, small bumps at the injection points and some tenderness are usual for a few days, and an occasional bruise settles on its own.',
        'visits_intro'    => 'Plan on one visit to find the cause of your hair loss. Only if mesotherapy is then added do the short sessions begin, some weeks apart, with each review comparing photographs against your baseline, in the same Sector 39 clinic.',
        'visit_icons'     => [['search', 'Cause Found Before Any Injection'], ['list', 'Solution Named Beforehand'], ['calendar', 'Short Sessions, Weeks Apart'], ['camera', 'Course Ends if Nothing Changes']],
        'options_heading' => 'What Mesotherapy Is, in One Paragraph',
        'options_html'    => 'Mesotherapy describes a route rather than a remedy: rows of tiny, shallow injections across the thinning scalp. What fills the syringe differs between clinics, typically some combination of vitamins, minerals and amino acids among other agents, with no formula that every clinic follows. Studies of it are few and less convincing than those behind medical treatment or PRP. More on the <a href="{parent}">hair mesotherapy in Gurgaon</a> page.',
        'cost_heading'    => 'Paying for Mesotherapy, If You Add It',
        'cost_intro'      => 'Each session carries a charge, but no set price is published. The written course quote follows the assessment, set out next to your main treatment. Because no one can say beforehand whether you will respond, a course you can halt at review makes more sense than a large bundle paid for upfront.',
        'faqs'            => [
            ['q' => 'Do I need to come to Sector 39 from {area} for mesotherapy?',
             'a' => 'Yes. DenceSpot has no clinic in {area}, so everything from the first assessment onwards happens in Sector 39, Gurugram, on Sector 39 Road in Jharsa.'],
            ['q' => 'Which route should I take from {area}?',
             'a' => '{route} Google Maps, opened from this page, shows the live traffic from your own street.'],
            ['q' => 'Can I see what will be injected before I decide?',
             'a' => 'Yes. You are told the name and contents of the solution before you agree, and your allergy history is checked against it. Ask for this wherever you are treated: since mixtures vary, a claim about mesotherapy in general says little about the one in your syringe.'],
            ['q' => 'Is mesotherapy cheaper or dearer for patients from {area}?',
             'a' => 'Neither. The quote is the same wherever you live; it reflects the solution used, the number of sessions and what else is in your plan. See <a href="/cost-and-emi-options">cost and EMI options</a> for ways to pay.'],
            ['q' => 'Will mesotherapy work for my hair loss?',
             'a' => 'There is no way to know before trying. Only limited evidence supports it, and a result for one mixture cannot be carried over to another. Some people see no change at all, which is why the course is reviewed against photographs and stopped if nothing is happening.'],
            ['q' => 'What side effects should I watch for back home in {area}?',
             'a' => 'Tenderness, redness, small bumps and the odd bruise are expected and fade within days. Get in touch quickly if redness or swelling keeps spreading, you develop a fever or a rash, or the soreness builds instead of easing.'],
            ['q' => 'Could Gurugram’s smog or hard water be behind my hair fall?',
             'a' => 'Both can irritate the scalp and roughen the hair, but the evidence that either causes true hair loss is weak, and putting thinning down to them can hold up the search for the actual cause. Read <a href="/blog/hard-water-pollution-and-hair-fall-in-gurgaon">hard water, pollution and hair fall in Gurgaon</a>.'],
        ],
        'consult_intro'   => 'Come to the Sector 39 clinic whenever it suits you. The doctor works out the reason for your hair loss and sets out which treatments have the strongest support for it. Mesotherapy is only raised as an add-on, with its contents named, if you still want it.',
        'descriptions'    => [
            'Hair mesotherapy for patients from {area} at DenceSpot’s Sector 39 clinic, Gurugram: what is injected, the evidence, sessions, cost and FAQs.',
            'Hair mesotherapy for {area} at DenceSpot, Sector 39, Gurugram: what is injected, evidence, cost and FAQs.',
            'Hair mesotherapy for {area} at DenceSpot, Gurugram: evidence, cost and FAQs.',
        ],
    ],
];
