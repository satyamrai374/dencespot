<?php
/**
 * Copy for the Gurugram unshaven area pages, /unshaven-hair-transplant-in-<area>
 * (schema: includes/gurgaon-treatment-area-page.php). Facts as on
 * /unshaven-hair-transplant-in-gurgaon and /hair-transplant-cost-in-gurgaon,
 * written fresh. This copy owns the shaving question: no trim, partial shave or
 * trimmed, why fewer grafts fit in an unshaven day, and the graft count coming
 * first. No graft ceiling (none is published), no prices; the Gurugram clinic only.
 */

declare(strict_types=1);

return [
    'form_treatment' => 'Hair transplant',
    'form'           => ['Unshaven hair transplant', 'Partial-shave approach', 'DHI hair transplant', 'Hair transplant for women', 'Not sure — please advise'],
    'faq_about'      => 'hair, graft count or budget',
    'results'        => true,

    'middle' => [
        'heading' => 'Which Set-Up Tends to Suit Which Case',
        'sub'     => 'A general guide; your graft count decides.',
        'cols'    => ['Case', 'Usually'],
        'rows'    => [
            ['A small hairline session', 'Can stay unshaven'],
            ['Touch-up after earlier surgery', 'Can stay unshaven'],
            ['Women, where surgery suits', 'Often unshaven'],
            ['Discretion wanted, more grafts', 'Partial shave'],
            ['Extensive loss', 'Trimmed, or staged'],
            ['Very fine or very dense hair', 'Trimming advised'],
        ],
        'note'    => 'The graft count your loss needs is worked out first; only then is the shaving question settled.',
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'How an Unshaven Transplant Is Carried Out',
        'intro'     => 'Five stages at the Gurugram clinic. The trimming question is answered at the second stage, never on the day.',
        'items'     => [
            ['chart', 'Graft Count', 'Your pattern staged and donor measured, so the number of grafts you need is known before anything else.'],
            ['scale', 'Set-Up Chosen', 'No trim, a hidden window at the back, or a trim — with the reason written into your plan.'],
            ['list', 'Harvesting Among Long Hair', 'Each follicle located by following its shaft through the long hair, then lifted with a fine punch.'],
            ['settings', 'Placing Between Hairs', 'Grafts freed from their long hair, then slotted in between existing strands without disturbing them.'],
            ['camera', 'Washing and Reviews', 'Washing around long hair shown at the clinic, then photographed reviews as the new hair grows.'],
        ],
        'note_html' => 'Recovery basics are in the <a href="/hair-transplant-aftercare">aftercare guide</a>; if your plan is large, <a href="/blog/how-many-grafts-do-you-need">how many grafts you need</a> explains why a trim may be advised.',
    ],

    'cost' => [
        'factors' => [
            ['clock', 'mint', 'Extra time', 'The same graft count takes longer among long hair.'],
            ['scale', 'violet', 'Unshaven or partial', 'A hidden donor window is quicker, and priced to match.'],
            ['user', 'sky', 'Hair type', 'Very fine or very dense hair slows extraction further.'],
        ],
        'links' => [
            '/hair-transplant-cost-in-gurgaon' => 'Gurgaon cost guide',
            '/cost-and-emi-options'           => 'EMI and payment',
        ],
    ],

    'related' => [
        '/unshaven-hair-transplant-in-gurgaon'  => 'Unshaven hair transplant in Gurgaon',
        '/dhi-hair-transplant-in-gurgaon'       => 'DHI hair transplant',
        '/hair-transplant-for-women-in-gurgaon' => 'Hair transplant for women',
        '/hair-transplant-aftercare'            => 'Aftercare guide',
    ],

    'area' => [
        'lead'            => 'Keeping your hair at its usual length is realistic for smaller plans, so the graft count comes first; you then hear, in writing and with the cost, whether no trim, a partial shave or a full trim fits.',
        'feats'           => [['user', 'Hair left at its length'], ['scale', 'Partial shave if needed'], ['chart', 'Graft limit explained first']],
        'heading'         => 'No-Shave Hair Transplant for People From {area}',
        'visits_line'     => 'The assessment that settles the shaving question, the procedure itself and the reviews afterwards are all at the Gurugram clinic.',
        'day_heading'     => 'The Procedure Day',
        'day'             => 'Because every graft is worked around long hair, the session is booked as a longer day with breaks for food, so eat a good meal before you leave {area}. You go home that evening with the grafted area already under your own hair, though a small crust sits at each graft for several days. Travel back in a car, not on a two-wheeler.',
        'visits_intro'    => 'An assessment to fix the set-up, one procedure day or two for a staged plan, the first wash shown at the clinic and reviews with photographs through the year — all in Sector 39, Gurugram.',
        'visit_icons'     => [['chart', 'Graft Count Before Set-Up'], ['clock', 'A Longer Day, Planned For'], ['user', 'Hair Covers the Grafts'], ['camera', 'Reviews With Photographs']],
        'options_heading' => 'No Trim, a Hidden Window or a Full Trim',
        'options_html'    => 'Leaving everything long is the most discreet while you heal but the slowest way to work, so it suits the fewest grafts. A partial shave trims a window low at the back that the hair above falls over, giving better access and room for more grafts while the thinning area stays long. Larger plans are usually better trimmed. More on the <a href="{parent}">unshaven hair transplant in Gurgaon</a> page.',
        'cost_heading'    => 'Why Unshaven Work Costs More',
        'cost_intro'      => 'Most of what a transplant costs is procedure time, and threading a punch between long hairs stretches that time for any given graft count, so unshaven sessions are usually priced above trimmed ones. A partial shave sits between the two. Your figure comes itemised, in writing, after the assessment.',
        'faqs'            => [
            ['q' => 'Where is the unshaven procedure done for patients from {area}?',
             'a' => 'At our clinic in Sector 39, Gurugram, on Sector 39 Road in Jharsa opposite Medanta – The Medicity. You are assessed, treated and reviewed there.'],
            ['q' => 'How do patients from {area} usually travel to the clinic?',
             'a' => '{route} The Directions button opens the route from your door on Google Maps; for the trip home after the procedure, use a car or cab.'],
            ['q' => 'I have meetings in {area} the week after. Will it show?',
             'a' => 'Probably less than you fear. With nothing shaved, your hair falls over the treated area from the first day, and in a partial shave the trimmed window sits under the hair above it. Up close, small crusts at the grafts remain for several days and the tiny marks where grafts were taken need a while to fade, so face-to-face work may feel easier after a few extra days off.'],
            ['q' => 'Does an unshaven plan cost more for someone from {area}?',
             'a' => 'Where you live plays no part; any extra cost comes from the extra time. The estimate follows the graft count, whether the set-up is fully unshaven or partial, your hair type and any staging. See the <a href="/hair-transplant-cost-in-gurgaon">Gurgaon cost guide</a>.'],
            ['q' => 'Will the graft count be cut to keep my hair long?',
             'a' => 'No. The number your loss needs is worked out first. If an unshaven day cannot deliver it, you are offered a partial shave, two sessions or a trimmed procedure instead, each with its cost.'],
            ['q' => 'How should I look after long hair over new grafts?',
             'a' => 'Your aftercare sheet sets the routine: the gentle wash taught at the clinic, no brushing or combing across the grafts, no styling products and no tight ponytail or clip until you are cleared. Gurugram summers add sweat, which is better left to dry than wiped away. More in the <a href="/hair-transplant-aftercare">aftercare guide</a>.'],
            ['q' => 'Can I send photos from {area} before deciding?',
             'a' => 'Yes. Photographs of where the hair is thinning and of your donor hair behind, shared on WhatsApp along with how much visible downtime you can take, help the first conversation. The no-shave question itself waits until your graft count has been worked out in person.'],
        ],
        'consult_intro'   => 'Pick a day to visit the Gurugram clinic. The doctor examines your scalp and donor area, works out how many grafts the plan needs and then explains which set-up can deliver them, including when a trim would serve you better; you leave with that in writing, not with a booking.',
        'descriptions'    => [
            'Unshaven hair transplant for patients from {area} at DenceSpot’s Sector 39 clinic, Gurugram: no trim or partial shave, graft limits, cost and FAQs.',
            'No-shave hair transplant for {area} at DenceSpot’s Sector 39 clinic, Gurugram: partial shave, cost and FAQs.',
            'Unshaven transplant for {area} at DenceSpot, Sector 39, Gurugram: cost and FAQs.',
        ],
    ],
];
