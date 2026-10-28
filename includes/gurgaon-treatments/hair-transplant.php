<?php
/**
 * Copy for the Gurugram hair transplant area pages, /hair-transplant-in-<area>
 * (schema: includes/gurgaon-treatment-area-page.php). Facts as on
 * /hair-transplant-in-gurgaon and /hair-transplant-cost-in-gurgaon, written
 * fresh. The general overview: FUE and DHI, the donor area and planning; the
 * technique pages own the detail. No prices; the Gurugram clinic only.
 */

declare(strict_types=1);

return [
    'form_treatment' => 'Hair transplant',
    'form'           => ['Hair transplant (FUE / DHI)', 'Hairline transplant', 'Crown hair transplant', 'Hair transplant repair', 'Not sure — please advise'],
    'faq_about'      => 'scalp, donor area or budget',
    'middle'         => 'case',
    'results'        => true,

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'From the First Visit to the Year Review',
        'intro'     => 'Five stages at the Gurugram clinic, each agreed with you before the next one starts.',
        'items'     => [
            ['search', 'Examination', 'Your history and medicines reviewed, and both the thinning areas and the hair at the back of the head examined under magnification.'],
            ['pencil', 'Plan and Hairline', 'The zones to treat marked out, any front line drawn on you, and FUE, DHI or both chosen for each part.'],
            ['list', 'Harvesting', 'Once the area is numb, each follicular unit is lifted out separately and held in solution until placed.'],
            ['settings', 'Placement', 'Every graft angled to match the hair around it, set into prepared openings or with an implanter.'],
            ['camera', 'Follow-Up', 'Written aftercare to take home, then reviews with photographs across the first twelve months.'],
        ],
        'note_html' => 'What the first fortnight looks like is in <a href="/blog/first-14-days-after-a-hair-transplant">the first 14 days after a hair transplant</a>; local heat, dust and helmets are covered in <a href="/blog/hair-transplant-recovery-in-gurgaon">hair transplant recovery in Gurgaon</a>.',
    ],

    'cost' => [
        'factors' => [
            ['chart', 'mint', 'Graft count', 'Set by the zones you want treated and by what your donor area can spare.'],
            ['settings', 'violet', 'FUE, DHI or a mix', 'Implanter placement is slower per graft, so the share placed by DHI moves the total.'],
            ['scale', 'sky', 'Complexity', 'Earlier surgery, scarring, an unshaven session or tightly curled hair all add time.'],
        ],
        'links' => [
            '/hair-transplant-cost-in-gurgaon'   => 'Gurgaon cost guide',
            '/hair-transplant-graft-calculator' => 'Graft calculator',
            '/cost-and-emi-options'             => 'EMI and payment',
        ],
    ],

    'related' => [
        '/hair-transplant-in-gurgaon'             => 'Hair transplant in Gurgaon',
        '/fue-hair-transplant-in-gurgaon'         => 'FUE hair transplant',
        '/dhi-hair-transplant-in-gurgaon'         => 'DHI hair transplant',
        '/hair-transplant-results-gurgaon'        => 'Before and after results',
        '/blog/donor-area-limits-hair-transplant' => 'Donor area limits',
    ],

    'area' => [
        'lead'            => 'Your plan there starts with how much hair the back and sides of your head can spare, and it reaches you in writing, with the cost, before any date is fixed.',
        'feats'           => [['search', 'Donor area examined first'], ['settings', 'FUE and DHI at the clinic'], ['doc', 'Written estimate first']],
        'heading'         => 'Planning a Hair Transplant From {area}',
        'visits_line'     => 'The examination, the procedure day and every review afterwards take place at our clinic in Sector 39.',
        'day_heading'     => 'On the Procedure Day',
        'day'             => 'Eat a proper breakfast before setting out from {area}, and wear a shirt that buttons rather than one pulled over the head. How long you stay depends on the graft count: a few hours for a small session, most of the day for a large one, with pauses to eat and rest. As a day case, you return that evening by car or cab; riding a two-wheeler means a helmet, and that waits until a review clears it.',
        'visits_intro'    => 'One examination, the procedure day, a visit in the first week to check the grafts and learn the wash, then photographed reviews through the first year — all in Sector 39, Gurugram.',
        'visit_icons'     => [['search', 'Examination Before Any Quote'], ['calendar', 'A Single Day Case'], ['user', 'Desk Jobs Resume in Days'], ['camera', 'Reviews Over 12 Months']],
        'options_heading' => 'FUE, DHI or Both at the Gurugram Clinic',
        'options_html'    => 'Both techniques remove grafts from the donor area identically. With FUE, small openings are prepared across the thinning area before any graft goes in, an efficient way to cover the crown and mid-scalp. With DHI, a pen-shaped implanter opens the skin and seats each graft in one motion, giving close control of angle along the hairline and temples. Many plans combine the two. The full overview is on the <a href="{parent}">hair transplant in Gurgaon</a> page.',
        'cost_heading'    => 'What Decides the Cost of Your Transplant',
        'cost_intro'      => 'There is no fixed fee. Your estimate is built from your own plan — how many grafts, which technique for each zone and what the price includes — and handed to you itemised, in writing, after the examination. Anything outside it, such as blood tests or PRP, is named as a separate line.',
        'faqs'            => [
            ['q' => 'Where do patients from {area} have the transplant?',
             'a' => 'At DenceSpot’s Gurugram clinic, Sector 39 Road, Jharsa, across from Medanta – The Medicity. There is no separate clinic for {area}: the examination, the procedure day and each follow-up all take place in Sector 39.'],
            ['q' => 'Getting to the clinic from {area}: what should I know?',
             'a' => '{route} On the procedure day, plan to be driven home rather than ride. The Directions button below opens the clinic on Google Maps.'],
            ['q' => 'How many trips from {area} should I plan for?',
             'a' => 'Usually an examination, then the procedure day, a short visit in week one when the washing routine is shown, and reviews with photographs over the following year. Larger plans are sometimes split across two procedure days. Every date is written into your plan from the start, which makes it easier to book leave or arrange cover at work.'],
            ['q' => 'Will I pay more because I am travelling from {area}?',
             'a' => 'No. The estimate follows the plan — the graft count, the technique for each zone and anything added such as PRP — not your address. The <a href="/hair-transplant-cost-in-gurgaon">Gurgaon cost guide</a> explains each factor.'],
            ['q' => 'How much hair can my donor area give?',
             'a' => 'Only what the back and sides can spare without looking thin, and follicles taken from there do not grow back. That limit is measured at the examination, and part of the supply is often kept for loss that may come later. Read more on <a href="/blog/donor-area-limits-hair-transplant">donor area limits</a>.'],
            ['q' => 'When will I see a difference?',
             'a' => 'Give it a year. In the first weeks most of the transplanted hairs drop out while the roots stay under the skin, and fine regrowth starts to appear from roughly month three or four, thickening after that. The crown is often slower than the front. Your review photographs, more than the mirror, show the change, and results vary between patients.'],
            ['q' => 'Is it worth sending photos from {area} first?',
             'a' => 'Yes. Take daylight photos of the hairline, the crown and the donor area and share them on WhatsApp; that is usually enough for the clinic to say whether a visit makes sense. No graft number is offered until your scalp has been seen in person.'],
        ],
        'consult_intro'   => 'Pick any day for an examination in Sector 39; the clinic is open seven days a week. The doctor assesses the thinning and the donor hair, draws a proposed hairline if the front is involved, and explains whether a transplant makes sense now. A procedure date is booked only if you request it.',
        'descriptions'    => [
            'Planning a hair transplant from {area}? DenceSpot’s Sector 39 clinic, Gurugram: FUE and DHI, donor area, results, cost and FAQs.',
            'Hair transplant for {area} at DenceSpot’s Sector 39 clinic, Gurugram: FUE and DHI, donor area, cost and FAQs.',
            'Hair transplant for {area} at DenceSpot, Sector 39, Gurugram: FUE, DHI, cost and FAQs.',
        ],
    ],
];
