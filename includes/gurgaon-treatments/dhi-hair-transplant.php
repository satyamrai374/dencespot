<?php
/**
 * Copy for the Gurugram DHI area pages, /dhi-hair-transplant-in-<area>
 * (schema: includes/gurgaon-treatment-area-page.php). Facts as on
 * /dhi-hair-transplant-in-gurgaon and /hair-transplant-cost-in-gurgaon, written
 * fresh. This copy owns placement: the implanter pen, where it is and is not
 * worth its extra cost, and the "DHT" mix-up. No prices, no survival claims;
 * the Gurugram clinic only.
 */

declare(strict_types=1);

return [
    'form_treatment' => 'Hair transplant',
    'form'           => ['DHI hair transplant', 'FUE hair transplant', 'Hairline transplant', 'Correcting an earlier hairline', 'Not sure — please advise'],
    'faq_about'      => 'hairline, health or budget',
    'results'        => true,

    'middle' => [
        'heading' => 'DHI Compared With FUE, Stage by Stage',
        'sub'     => 'Patient education; your own mix is set at the assessment.',
        'cols'    => ['Stage', 'With DHI'],
        'rows'    => [
            ['Taking the grafts', 'Same as FUE'],
            ['Making the openings', 'Done by the pen'],
            ['Angle and depth', 'Set graft by graft'],
            ['Grafts in a day', 'Fewer than FUE'],
            ['Cost per graft', 'Usually higher'],
            ['Healing and growth', 'Same as FUE'],
        ],
        'note'    => 'A plan can use DHI for the front rows and FUE behind them; your estimate shows which zone gets which.',
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'What Happens During a DHI Transplant',
        'intro'     => 'Five stages at the Gurugram clinic. Until the grafts are loaded, the day runs exactly as an FUE would.',
        'items'     => [
            ['search', 'Assessment', 'Scalp and donor examined, and a plain view given on whether DHI, FUE or a mix suits your zones.'],
            ['pencil', 'Hairline Drawn', 'Marked while you sit upright, looked at in a mirror and agreed before you sign consent.'],
            ['list', 'Extraction', 'The back trimmed and numbed, then each follicular unit taken out on its own with a fine punch.'],
            ['settings', 'Loading and Implanting', 'Each graft loaded into its own implanter and set in one movement at a controlled angle and depth.'],
            ['camera', 'Reviews', 'Your grafts checked and the wash shown in week one, then photographs at set points up to a year.'],
        ],
        'note_html' => 'For a side-by-side look at both methods, read <a href="/blog/fue-vs-dhi-hair-transplant">FUE vs DHI</a>; for why two quotes for the same graft count can differ, see <a href="/blog/why-hair-transplant-quotes-vary">why hair transplant quotes vary</a>.',
    ],

    'cost' => [
        'factors' => [
            ['scale', 'mint', 'Share placed by DHI', 'The front rows only, or every zone.'],
            ['clock', 'violet', 'Chair time', 'Loading each graft by hand lengthens the day.'],
            ['settings', 'sky', 'Single-use tips', 'Implanter tips are not reused, which adds to the cost.'],
        ],
        'links' => [
            '/hair-transplant-cost-in-gurgaon' => 'Gurgaon cost guide',
            '/cost-and-emi-options'           => 'EMI and payment',
        ],
    ],

    'related' => [
        '/dhi-hair-transplant-in-gurgaon'  => 'DHI hair transplant in Gurgaon',
        '/fue-hair-transplant-in-gurgaon'  => 'FUE hair transplant',
        '/hairline-transplant-in-gurgaon'  => 'Hairline transplant',
        '/blog/fue-vs-dhi-hair-transplant' => 'FUE vs DHI',
    ],

    'area' => [
        'lead'            => 'Before DHI is offered there, the doctor checks whether your grafts are going where an implanter makes a visible difference — usually the hairline and temples — and puts the answer in writing, with the cost.',
        'feats'           => [['pencil', 'Implanter for the front rows'], ['scale', 'Told when FUE will do'], ['doc', 'Zone-by-zone estimate']],
        'heading'         => 'DHI Hair Transplant: A Guide for {area}',
        'visits_line'     => 'Your hairline is drawn, the grafts placed and every review held at the Gurugram clinic.',
        'day_heading'     => 'What the DHI Day Is Like',
        'day'             => 'Confirm the trimming plan beforehand so nothing surprises you, and eat properly before leaving {area}: loading grafts one at a time makes for a long day. The line is checked with you again before the first graft goes in, and you go home that evening by car or cab.',
        'visits_intro'    => 'Three kinds of visit: a consultation where the line is drawn, the DHI day itself, then a short check in week one followed by photographed reviews while the front fills in — all at our clinic in Sector 39.',
        'visit_icons'     => [['pencil', 'Line Drawn With You'], ['clock', 'One Long Procedure Day'], ['user', 'Desk Work After a Few Days'], ['camera', 'Hairline Photographed at Reviews']],
        'options_heading' => 'Where DHI Helps and Where FUE Does the Job',
        'options_html'    => 'The implanter pen makes the opening and seats the graft in one movement, so depth and angle are set for every hair. That pays off in the front rows, at the temples and between hair you still have; across a wide crown, FUE placement gives similar coverage faster and for less. More on the <a href="{parent}">DHI hair transplant in Gurgaon</a> page.',
        'cost_heading'    => 'Why DHI Usually Costs More Per Graft',
        'cost_intro'      => 'Loading every graft into an implanter takes time, and each implanter tip is single-use, so the per-graft rate for DHI sits above FUE’s. The difference to your total depends on whether the pen is used for the front rows alone or for every zone; the written, itemised estimate after your assessment makes that split visible.',
        'faqs'            => [
            ['q' => 'Is there a local DenceSpot branch for {area}?',
             'a' => 'No. Every step for patients from {area} — drawing the line, placing the grafts, the reviews afterwards — is handled at DenceSpot’s Gurugram clinic in Jharsa, on Sector 39 Road facing Medanta – The Medicity.'],
            ['q' => 'How do I travel to the clinic from {area}?',
             'a' => '{route} Tap Directions below for navigation from your door. After the DHI session, let someone else do the driving.'],
            ['q' => 'Is DHI worth paying more for?',
             'a' => 'At the hairline and temples it often is, because the angle of each hair shows there. Over a large crown it usually is not, and you will be told so. A mix — DHI at the front, FUE behind — is frequently the sensible plan and costs less than DHI throughout.'],
            ['q' => 'Does DHI mean I can keep my hair long?',
             'a' => 'It makes leaving the front untrimmed easier, but the donor area at the back is still trimmed for extraction, and working among long hair slows things down, so it suits smaller sessions. See <a href="/unshaven-hair-transplant-in-gurgaon">unshaven hair transplant</a>.'],
            ['q' => 'I commute from {area} every day. Does DHI heal faster than FUE?',
             'a' => 'No. Only the placement differs; extraction, healing and regrowth follow the FUE pattern. Expect crusts at the front for up to a fortnight, shedding of the new hairs within about a month and fresh growth from about month three or four. Most people are at a desk again within a few days with either method, travelling by car or cab until a review clears a helmet.'],
            ['q' => 'Is the DHI estimate different for someone from {area}?',
             'a' => 'No. What moves it is the graft count, how much of the work uses the pen, the trimming approach and whether the plan runs over more than one session. The <a href="/hair-transplant-cost-in-gurgaon">Gurgaon cost guide</a> explains how the per-graft rate is set.'],
            ['q' => 'What is a “DHT hair transplant”?',
             'a' => 'A mix-up seen in some adverts. DHT stands for dihydrotestosterone, a hormone linked to pattern hair loss; it is not a way of doing surgery. The procedure such pages mean is DHI, direct hair implantation.'],
        ],
        'consult_intro'   => 'The Gurugram clinic is open every day of the week, so book whichever day suits. Your hairline is drawn and adjusted with you in a mirror and your donor area examined; you then hear which zones, if any, justify the pen and what the difference costs, in writing. No date is booked unless you want one.',
        'descriptions'    => [
            'DHI hair transplant for patients from {area} at DenceSpot’s Sector 39 clinic, Gurugram: implanter placement, DHI vs FUE, cost and FAQs.',
            'DHI hair transplant for {area} at DenceSpot’s Sector 39 clinic, Gurugram: DHI vs FUE, cost and FAQs.',
            'DHI for {area} at DenceSpot, Sector 39, Gurugram: placement, cost and FAQs.',
        ],
    ],
];
