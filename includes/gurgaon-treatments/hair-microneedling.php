<?php
/**
 * Copy for the Gurugram hair microneedling area pages,
 * /hair-microneedling-in-<area> (schema: includes/gurgaon-treatment-area-page.php).
 * Facts as on /hair-microneedling-in-gurgaon and
 * /blog/does-microneedling-work-for-hair-loss, written fresh. Position kept: an
 * adjunct to diagnosed treatment, never a standalone cure; the evidence is
 * mostly for needling with a topical; home rollers carry most of the harm.
 * No prices, no devices or brands; the Gurugram clinic only.
 */

declare(strict_types=1);

return [
    'form_treatment' => 'Hair PRP / GFC',
    'form'           => ['Hair microneedling', 'Microneedling with PRP', 'Already using a dermaroller at home', 'Hair fall treatment', 'Not sure — please advise'],
    'faq_about'      => 'scalp, current treatment or budget',
    'results'        => false,

    'middle' => [
        'heading' => 'Where Needling Fits, and Where It Does Not',
        'sub'     => 'Its role in a hair loss plan, at a glance.',
        'cols'    => ['Situation', 'Our approach'],
        'rows'    => [
            ['Needling by itself', 'Not offered as a treatment'],
            ['Alongside a topical treatment', 'Where the more useful studies are'],
            ['With PRP straight after', 'Often paired; decided at assessment'],
            ['Hair loss not yet diagnosed', 'Diagnosis comes first'],
            ['Red, sore or infected scalp', 'Postponed; never needled over'],
            ['Keloid or raised scars', 'Needs particular caution'],
        ],
        'note'    => 'Needling is meant to help a working plan do a little more; with no plan beneath it, it has little to add.',
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'A Microneedling Course in Sector 39, Gurugram',
        'intro'     => 'Five stages. The diagnosis and the review matter more than the needling, because they decide whether the add-on earns its place.',
        'items'     => [
            ['search', 'Assessment', 'The cause of your hair loss, the state of your scalp, the treatment you already use and any home rolling routine are all looked at.'],
            ['camera', 'Baseline Photographs', 'Photographs from fixed angles are taken at the start, because a slow add-on cannot be judged without a reference.'],
            ['shield', 'Sterile Preparation', 'Before any needle is used, the skin is cleaned under sterile conditions and generally numbed.'],
            ['settings', 'Needling', 'Fine needles create many controlled micro-injuries over the thinning zone; PRP or a topical follows only if your plan says so.'],
            ['chart', 'Review', 'Over months, the scalp is compared with the baseline. No change means the needling stops while your main treatment continues.'],
        ],
        'note_html' => 'For the research behind it, read <a href="/blog/does-microneedling-work-for-hair-loss">does microneedling work for hair loss?</a>; if PRP may be paired with it, see <a href="/prp-hair-treatment-cost-in-gurgaon">how PRP is priced in Gurgaon</a>.',
    ],

    'cost' => [
        'factors' => [
            ['calendar', 'mint', 'Course length', 'Depends on what is causing the thinning and what needling is backing up.'],
            ['heart', 'violet', 'PRP alongside', 'Often combined with needling, and the quote reflects it.'],
            ['doc', 'sky', 'Underlying treatment', 'The therapy needling supports is costed separately.'],
        ],
        'links' => [
            '/prp-hair-treatment-cost-in-gurgaon' => 'PRP pricing in Gurgaon',
            '/cost-and-emi-options'               => 'Cost and EMI options',
        ],
    ],

    'related' => [
        '/hair-microneedling-in-gurgaon'              => 'Hair microneedling in Gurgaon',
        '/hair-prp-treatment-in-gurgaon'              => 'Hair PRP treatment',
        '/hair-mesotherapy-in-gurgaon'                => 'Hair mesotherapy',
        '/blog/does-microneedling-work-for-hair-loss' => 'What the studies show',
    ],

    'area' => [
        'lead'            => 'Scalp needling there is treated as a helper to your main treatment, not a remedy in itself: the cause of your thinning is found first, and needling is planned only if there is something for it to support.',
        'feats'           => [['plus', 'Add-on to a plan'], ['shield', 'Sterile, in clinic'], ['info', 'Home rolling reviewed']],
        'heading'         => 'Hair Microneedling Advice for People From {area}',
        'visits_line'     => 'Every needling session, like the assessment and reviews, is done at the Sector 39 clinic under sterile conditions, while the treatment it backs up continues at home between visits.',
        'day_heading'     => 'After a Needling Session',
        'day'             => 'Expect redness and a slightly tight, tender scalp for about a day, which is easier to see on short hair, so a session late in the week may suit an office job. Skip the gym, pools and steam for a short while, and keep the midday sun off your scalp on the journey home to {area}.',
        'visits_intro'    => 'The first visit settles whether needling adds anything at all. If it does, sessions are spaced some weeks apart so the scalp recovers in between, and progress is checked against photographs over months, all at the Sector 39 clinic.',
        'visit_icons'     => [['search', 'Diagnosis Before Any Needle'], ['shield', 'Sterile Clinic Setting'], ['calendar', 'Weeks Between Sessions to Recover'], ['camera', 'Stopped if Photos Show No Change']],
        'options_heading' => 'Needling, Mesotherapy and PRP: The Difference',
        'options_html'    => 'Microneedling is mechanical: fine needles create tiny controlled injuries that set off a healing response and leave brief openings through which a topical treatment, or PRP put on straight afterwards, can reach further into the skin. Nothing is injected, which separates it from <a href="/hair-mesotherapy-in-gurgaon">mesotherapy</a>. Details are on the <a href="{parent}">hair microneedling in Gurgaon</a> page.',
        'cost_heading'    => 'Costing Microneedling Within Your Plan',
        'cost_intro'      => 'Needling is billed by the session, and there is no published figure. You get a written quote after the assessment, with any PRP included and the treatment needling supports shown separately; as an add-on, it should be easy to drop at review.',
        'faqs'            => [
            ['q' => 'Where would a patient from {area} have microneedling?',
             'a' => 'At our Sector 39 clinic in Gurugram, opposite Medanta – The Medicity; there is no DenceSpot clinic in {area}. The assessment, the sessions and the reviews all take place there.'],
            ['q' => 'Getting from {area} to Sector 39: what is the simplest way?',
             'a' => '{route} If the last stretch is unfamiliar, message the clinic on WhatsApp for help.'],
            ['q' => 'I already use a dermaroller at home in {area}. Should I mention it?',
             'a' => 'Yes. Tell the doctor the needle length, your rolling frequency, your cleaning routine and anything you apply afterwards. Long needles, poor hygiene, rolling over an irritated scalp and the wrong product afterwards cause most of the trouble, and each can be corrected for your scalp.'],
            ['q' => 'Does living in {area} affect what I pay?',
             'a' => 'No. The quote is built from your plan: the number of sessions, the area needled and whether PRP is included. See <a href="/cost-and-emi-options">cost and EMI options</a>.'],
            ['q' => 'Will microneedling regrow hair without other treatment?',
             'a' => 'That has not been shown. The more useful evidence looks at needling combined with a topical treatment, not needling alone, so it is offered only to help a treatment you already use. Some people see no benefit even then.'],
            ['q' => 'Is it painful, and how will my scalp look afterwards?',
             'a' => 'A numbing preparation is generally applied, and it usually feels uncomfortable rather than painful. A few pinpoints of blood during needling are normal; afterwards the scalp is red and tender for about a day. Infection is uncommon, but report spreading redness, rising pain, heat or a fever promptly.'],
            ['q' => 'Can I plan sessions around Gurugram summers and the festive season?',
             'a' => 'Yes. Sweat, sun and pool water reach freshly needled skin more easily, so a hot afternoon is a poor time for a session if you must be outdoors straight after. Book cooler days where you can, and set the dates around Diwali or family weddings so the course keeps its rhythm.'],
        ],
        'consult_intro'   => 'Choose a day to visit Sector 39. The doctor confirms what is behind your thinning, reviews what you already use, home roller included, and says plainly whether needling would add enough to justify the time and cost.',
        'descriptions'    => [
            'Hair microneedling for patients from {area} at DenceSpot’s Sector 39 clinic, Gurugram: its role, pairing with PRP, home rollers, cost and FAQs.',
            'Hair microneedling for {area} at DenceSpot, Sector 39, Gurugram: with PRP, home rollers, cost and FAQs.',
            'Hair microneedling for {area} at DenceSpot, Gurugram: cost and FAQs.',
        ],
    ],
];
