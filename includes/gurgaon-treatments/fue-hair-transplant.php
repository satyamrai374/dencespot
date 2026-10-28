<?php
/**
 * Copy for the Gurugram FUE area pages, /fue-hair-transplant-in-<area>
 * (schema: includes/gurgaon-treatment-area-page.php). Facts as on
 * /fue-hair-transplant-in-gurgaon and /hair-transplant-cost-in-gurgaon, written
 * fresh. This copy owns extraction: the punch, the donor supply, grafts versus
 * hairs and session size. No prices, no graft ceiling; the Gurugram clinic only.
 */

declare(strict_types=1);

return [
    'form_treatment' => 'Hair transplant',
    'form'           => ['FUE hair transplant', 'DHI hair transplant', 'Crown hair transplant', 'Repair of an earlier procedure', 'Not sure — please advise'],
    'faq_about'      => 'donor supply, scalp or budget',
    'middle'         => 'case',
    'results'        => true,

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'What Happens During an FUE Transplant',
        'intro'     => 'Five stages, all at the Gurugram clinic, with your donor area measured before a single graft is counted.',
        'items'     => [
            ['search', 'Donor Measurement', 'Density, hair thickness and how loose the scalp is at the back and sides, checked under magnification.'],
            ['doc', 'Graft Map', 'A count built zone by zone, with part of the donor held back, then priced in writing.'],
            ['list', 'Punch Extraction', 'Follicular units freed one by one with a fine punch, spread out so that no patch of the donor thins.'],
            ['settings', 'Sorting and Sites', 'Grafts grouped by how many hairs each carries; openings made in the direction the existing hair grows.'],
            ['camera', 'Reviews', 'The wash routine taught in week one, then photographs as the hair sheds, returns and thickens.'],
        ],
        'note_html' => 'Why the back of the head sets the ceiling: <a href="/blog/donor-area-limits-hair-transplant">donor area limits</a>. For the count itself, see <a href="/blog/how-many-grafts-do-you-need">how many grafts you need</a>.',
    ],

    'cost' => [
        'factors' => [
            ['chart', 'mint', 'Grafts, not hairs', 'One graft holds one to four hairs, so check which unit a quote is counting.'],
            ['calendar', 'violet', 'One sitting or two', 'Staging spares a donor that cannot give everything in a single day.'],
            ['user', 'sky', 'Your hair', 'Thickness, curl and colour against your skin change how far each graft goes.'],
        ],
        'links' => [
            '/hair-transplant-cost-in-gurgaon'       => 'Gurgaon cost guide',
            '/blog/why-hair-transplant-quotes-vary' => 'Why quotes vary',
            '/cost-and-emi-options'                 => 'EMI and payment',
        ],
    ],

    'related' => [
        '/fue-hair-transplant-in-gurgaon'   => 'FUE hair transplant in Gurgaon',
        '/hair-transplant-in-gurgaon'       => 'Hair transplant overview',
        '/crown-hair-transplant-in-gurgaon' => 'Crown hair transplant',
        '/blog/fue-vs-fut-hair-transplant'  => 'FUE vs FUT',
    ],

    'area' => [
        'lead'            => 'An FUE plan there is sized to what your donor area can safely spare, and the graft count — given in grafts, not hairs — comes in writing with the cost.',
        'feats'           => [['search', 'Donor mapped before any count'], ['list', 'Grafts taken one at a time'], ['clock', 'Home the same day']],
        'heading'         => 'FUE for {area}: What Your Donor Area Allows',
        'visits_line'     => 'Measuring your donor area, the FUE procedure and the reviews over the next year all happen at the Gurugram clinic.',
        'day_heading'     => 'Before and On the Day',
        'day'             => 'Beforehand you are told which medicines, blood thinners included, to pause, and to stay off alcohol. On the day, eat well before leaving {area}; at the clinic the back and sides are trimmed short and numbed before extraction begins. You leave that evening with the donor area dressed, so arrange a lift home.',
        'visits_intro'    => 'A donor assessment, one extraction day (or two when the work is staged), a short visit in week one and photographed reviews spread over roughly a year — all in Sector 39, Gurugram.',
        'visit_icons'     => [['search', 'Donor Supply Checked First'], ['calendar', 'Two Days Only if Staged'], ['clock', 'Day Case, Home by Evening'], ['camera', 'Twelve Months of Reviews']],
        'options_heading' => 'How FUE Grafts Are Taken and Placed',
        'options_html'    => 'With a punch narrower than a millimetre, each follicular unit is lifted out on its own, leaving a pale dot that surrounding hair usually hides rather than a single long scar. The grafts are then set into openings made beforehand across the thinning area, which is why FUE handles the crown and larger sessions well. More on the <a href="{parent}">FUE hair transplant in Gurgaon</a> page.',
        'cost_heading'    => 'What Moves an FUE Estimate',
        'cost_intro'      => 'A quote can only be compared once you know two things: whether it counts grafts or hairs, and how the number was reached. Yours is counted from the mapped donor and the zones to cover, then given itemised and in writing after the assessment.',
        'faqs'            => [
            ['q' => 'Is FUE carried out anywhere closer to {area}?',
             'a' => 'No. Patients from {area} come to our clinic in Sector 39, Gurugram, across from Medanta – The Medicity, for everything: measuring the donor, the extraction day and each follow-up.'],
            ['q' => 'How do I get to Sector 39 from {area}?',
             'a' => '{route} After the procedure, travel back by car or cab instead of on a two-wheeler. The Directions button gives the route from your door.'],
            ['q' => 'Will people notice the back of my head?',
             'a' => 'Pinpoint scabs cover the trimmed donor area for roughly the first week. Each extraction point then heals as a small pale dot, which usually fades by three to four months and sits hidden in hair of most lengths. A head clipped right down to the skin can show them, so mention how you wear your hair.'],
            ['q' => 'Does coming from {area} change the FUE estimate?',
             'a' => 'No; distance plays no part. The figure is driven by how many grafts you need, whether the plan runs over one day or two and what the price covers, and you receive it line by line once your donor has been assessed. The <a href="/hair-transplant-cost-in-gurgaon">Gurgaon cost guide</a> walks through the arithmetic.'],
            ['q' => 'How many grafts can FUE move in one day?',
             'a' => 'It varies from person to person. Donor density, the looseness of the scalp and your stamina over a long day all set the limit, and when a single sitting would ask too much of the back of the head, the plan is split across two. The <a href="/hair-transplant-graft-calculator">graft calculator</a> offers a starting range only.'],
            ['q' => 'Can I ride my two-wheeler around {area} soon after FUE?',
             'a' => 'Not straight away. Riding means a helmet, whose rim sits on the healing donor area and drags over the new grafts, so use a cab or a lift until a review clears it. Desk work itself usually resumes within a few days.'],
            ['q' => 'Can the clinic see photos before I travel from {area}?',
             'a' => 'Yes. Daylight shots of the front, the top and the back of your head give a first impression on WhatsApp and help decide whether a visit is worthwhile. Your donor can only be measured, and a graft count given, in person.'],
        ],
        'consult_intro'   => 'Choose a day to come to the Gurugram clinic for a donor assessment. The doctor checks the density of your donor hair and how much of it could be used, tells you plainly whether FUE fits your pattern of loss, and gives you a mapped graft count in writing if it does; you are not asked to commit there and then.',
        'descriptions'    => [
            'FUE hair transplant for patients from {area} at DenceSpot’s Sector 39 clinic, Gurugram: donor area, grafts vs hairs, recovery, cost and FAQs.',
            'FUE hair transplant for {area} at DenceSpot’s Sector 39 clinic, Gurugram: donor area, recovery, cost and FAQs.',
            'FUE for {area} at DenceSpot, Sector 39, Gurugram: donor area, grafts, cost and FAQs.',
        ],
    ],
];
