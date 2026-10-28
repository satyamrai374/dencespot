<?php
/**
 * Copy for the Gurugram hair PRP area pages, /hair-prp-treatment-in-<area>
 * (schema: includes/gurgaon-treatment-area-page.php). Facts as on
 * /hair-prp-treatment-in-gurgaon and /prp-hair-treatment-cost-in-gurgaon,
 * written fresh. No prices; the Gurugram clinic only.
 */

declare(strict_types=1);

return [
    'form_treatment' => 'Hair PRP / GFC',
    'form'           => ['Hair PRP treatment', 'GFC treatment', 'Hair fall treatment', 'Hair transplant (FUE / DHI)', 'Not sure — please advise'],
    'faq_about'      => 'scalp, health or budget',
    'results'        => false,

    'middle' => [
        'heading' => 'How a PRP Course Runs',
        'sub'     => 'General timings for patient education, not your plan.',
        'cols'    => ['Stage', 'Typically'],
        'rows'    => [
            ['First visit', 'Assessment only'],
            ['Initial course', '3 or 4 sessions'],
            ['Gap between sessions', 'About 4 weeks'],
            ['Each session', '30 to 60 minutes'],
            ['First change', 'Less shedding, 6–10 weeks'],
            ['Review', 'Photographs at 3–6 months'],
        ],
        'note'    => 'If the review shows no change, the course stops rather than more sessions being added.',
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'What a Hair PRP Course Involves',
        'intro'     => 'Five stages at the Gurugram clinic, from the assessment to the review that decides whether to carry on.',
        'items'     => [
            ['search', 'Scalp Assessment', 'Your history, medicines and scalp under magnification, to find what is behind the thinning.'],
            ['doc', 'Written Plan', 'Any blood tests needed, baseline photographs and a quote for the whole course.'],
            ['heart', 'Blood Sample', 'A small amount of blood drawn on the day and spun in the clinic.'],
            ['settings', 'Injections', 'The plasma placed across the thinning areas after the scalp is cleaned and cooled or numbed.'],
            ['camera', 'Photo Review', 'Progress compared with the baseline photographs before anything more is booked.'],
        ],
        'note_html' => 'Read <a href="/blog/how-many-prp-sessions-are-needed-for-hair">how many PRP sessions are needed</a> and <a href="/blog/does-prp-have-side-effects">what side effects to expect</a>.',
    ],

    'cost' => [
        'factors' => [
            ['heart', 'mint', 'PRP or GFC', 'GFC is often priced higher, without evidence that it does more.'],
            ['calendar', 'violet', 'Number of sessions', 'Set from the diagnosis and revisited at review.'],
            ['chart', 'sky', 'Area to treat', 'A small crown patch needs less than wide thinning.'],
        ],
        'links' => [
            '/prp-hair-treatment-cost-in-gurgaon' => 'PRP cost guide for Gurgaon',
            '/cost-and-emi-options'               => 'EMI and payment',
        ],
    ],

    'related' => [
        '/hair-prp-treatment-in-gurgaon'    => 'Hair PRP treatment in Gurgaon',
        '/gfc-treatment-in-gurgaon'         => 'GFC treatment',
        '/hair-fall-treatment-in-gurgaon'   => 'Hair fall treatment',
        '/blog/does-prp-work-for-hair-loss' => 'Does PRP work?',
    ],

    'area' => [
        'lead'            => 'A PRP course there begins with finding the cause of your thinning, and the whole course is quoted in writing before the first session.',
        'feats'           => [['search', 'Cause found first'], ['calendar', 'Sessions about 4 weeks apart'], ['camera', 'Progress on photographs']],
        'heading'         => 'Hair PRP Treatment for Patients From {area}',
        'visits_line'     => 'The assessment, each PRP session and every review are at the Gurugram clinic in Sector 39.',
        'day_heading'     => 'On a Session Day',
        'day'             => 'Have your usual meal before leaving {area}, as blood is drawn. Allow about an hour at the clinic; most people head back to work the same day, though the scalp may feel tender until the next morning.',
        'visits_intro'    => 'An assessment first, then three or four sessions about four weeks apart and a photographed review at three to six months — all in Sector 39, Gurugram.',
        'visit_icons'     => [['search', 'Assessment Before Any Injection'], ['calendar', 'Sessions Four Weeks Apart'], ['user', 'Same-Day Return to Work'], ['camera', 'Review Against Photographs']],
        'options_heading' => 'PRP or GFC at the Gurugram Clinic',
        'options_html'    => 'Both start from your own blood: PRP injects the platelet-rich plasma, GFC the growth factors released from it with the cells removed. GFC has a smaller, newer evidence base and is not shown to work better. More on the <a href="{parent}">hair PRP treatment in Gurgaon</a> page.',
        'cost_heading'    => 'What a PRP Course Costs',
        'cost_intro'      => 'No per-session price is published, because a session is not a standard unit. The quote covers the whole course — PRP or GFC, the number of sessions and what each includes — and is given in writing after your assessment.',
        'faqs'            => [
            ['q' => 'Is the PRP treatment done in {area}?',
             'a' => 'No. DenceSpot does not have a clinic in {area}. Every assessment, session and review takes place at the Gurugram clinic on Sector 39 Road, Jharsa, opposite Medanta – The Medicity.'],
            ['q' => 'How do I reach the clinic from {area}?',
             'a' => '{route} The Directions button below opens the exact location on Google Maps, and the clinic can help on WhatsApp.'],
            ['q' => 'How many visits will a PRP course take?',
             'a' => 'An assessment, then usually three or four sessions about four weeks apart, then a review at three to six months. If you respond, maintenance sessions every three to six months may follow. The dates go into your written plan, so the trips from {area} can be planned around work.'],
            ['q' => 'Is PRP priced differently for patients from {area}?',
             'a' => 'No. The quote depends only on the plan — PRP or GFC, the number of sessions and what each includes. See the <a href="/prp-hair-treatment-cost-in-gurgaon">PRP cost guide for Gurgaon</a> for what moves the figure.'],
            ['q' => 'Will PRP work for my hair loss?',
             'a' => 'That cannot be known beforehand, and some people do not respond. It acts only where follicles are still alive, and thinning from low iron, a thyroid problem or a recent illness usually needs that cause treated first. See <a href="/hair-fall-treatment-in-gurgaon">hair fall treatment</a>.'],
            ['q' => 'What does a PRP session feel like?',
             'a' => 'The blood draw is like a routine blood test. The scalp injections sting briefly, which cooling or a numbing cream eases, and the scalp may feel tender for a day or so.'],
            ['q' => 'Can I send photos from {area} before booking?',
             'a' => 'Yes. Clear daylight photographs of the thinning areas, sent on WhatsApp, help the clinic say whether an assessment is worth the trip. Whether PRP suits you is decided only after your scalp is examined.'],
        ],
        'consult_intro'   => 'Book an assessment at the Gurugram clinic on a day that suits you. The doctor looks at your scalp and the cause of your thinning, and tells you plainly whether a PRP course is worth starting; nothing is booked on the day unless you choose to.',
        'descriptions'    => [
            'Hair PRP treatment for patients from {area} at DenceSpot’s Sector 39 clinic, Gurugram: PRP or GFC, sessions, getting there, cost and FAQs.',
            'Hair PRP for {area} at DenceSpot’s Sector 39 clinic, Gurugram: PRP or GFC, sessions, cost and FAQs.',
            'Hair PRP for {area} at DenceSpot, Sector 39, Gurugram: sessions, cost and FAQs.',
        ],
    ],
];
