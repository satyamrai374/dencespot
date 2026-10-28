<?php
/**
 * Copy for the Gurugram crown hair transplant area pages,
 * /crown-hair-transplant-in-<area> (schema: includes/gurgaon-treatment-area-page.php).
 * Facts as on /crown-hair-transplant-in-gurgaon (the whorl, a circle that
 * keeps widening, the donor weighed against the front, staging, medicine first
 * for an opening crown, pigment as a donor-free option), written fresh. No
 * prices, no graft-per-area figures, no coverage or survival rates; the
 * results row is the clinic's consented scalp photographs. The Gurugram clinic only.
 */

declare(strict_types=1);

return [
    'form_treatment' => 'Hair transplant',
    'form'           => ['Crown hair transplant', 'Crown and hairline together', 'Thinning crown — not bald yet', 'Scalp micropigmentation', 'Not sure — please advise'],
    'faq_about'      => 'crown, hairline plans or budget',
    'results'        => true,

    'middle' => [
        'heading' => 'What a Crown Plan Has to Weigh',
        'sub'     => 'The doctor works these out at your assessment.',
        'cols'    => ['Question', 'Why it matters'],
        'rows'    => [
            ['How wide is the crown?', 'Graft needs climb as it widens'],
            ['Is it still opening?', 'Today’s edge may not stay put'],
            ['What may the front need?', 'Both draw on one donor area'],
            ['Thinning or bald?', 'Medicine may help thinning first'],
            ['One sitting or two?', 'Stated before you start'],
        ],
        'note'    => 'A crown that looks covered from everyday angles is a realistic aim; the density you had at twenty, under bright overhead light, usually is not.',
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'How a Crown Case Moves From Measurement to Review',
        'intro'     => 'The stages at the Gurugram clinic, beginning with the crown measured from above and ending with photographs taken through the first year.',
        'items'     => [
            ['camera', 'Top-Down Photos', 'The crown photographed from directly above and its thin or bare area marked out, so the plan starts from a measurement.'],
            ['scale', 'Donor Check', 'How much hair the back and sides can give, measured, with a share held back for the hairline in case it is needed later.'],
            ['doc', 'Agreed Order', 'Crown first, front first or a wait, and whether a second sitting is likely, written into your plan.'],
            ['settings', 'Spiral Placement', 'Under local anaesthetic, sites cut to follow the whorl outward, their direction turning as they circle it.'],
            ['calendar', 'A Year of Reviews', 'Photographs compared as the crown sheds and regrows, with medical treatment for the hair around it if prescribed.'],
        ],
        'note_html' => 'Why a crown can use more grafts than expected is covered in <a href="/blog/how-many-grafts-do-you-need">how many grafts you need</a>; <a href="/blog/hair-transplant-growth-timeline-month-by-month">the month-by-month timeline</a> shows when growth usually appears.',
    ],

    'cost' => [
        'factors' => [
            ['chart', 'mint', 'Width of the crown', 'Marked out at the assessment; a wider circle takes many more grafts.'],
            ['scale', 'violet', 'Reserve for the front', 'What your donor area can give now without leaving the hairline short.'],
            ['calendar', 'sky', 'Sittings', 'One session or two; a probable second one is flagged at the planning stage.'],
        ],
        'links' => [
            '/hair-transplant-cost-in-gurgaon'  => 'Gurgaon cost guide',
            '/hair-transplant-graft-calculator' => 'Graft calculator',
            '/cost-and-emi-options'             => 'Payment and EMI options',
        ],
    ],

    'related' => [
        '/crown-hair-transplant-in-gurgaon'   => 'Crown hair transplant in Gurgaon',
        '/hairline-transplant-in-gurgaon'     => 'Hairline transplant',
        '/hair-fall-treatment-in-gurgaon'     => 'Medical treatment for thinning',
        '/scalp-micropigmentation-in-gurgaon' => 'Scalp micropigmentation',
    ],

    'area' => [
        'lead'            => 'There the crown is photographed from above and measured, your donor area is weighed against what the front may need later, and any second sitting is put in writing before you agree to anything.',
        'feats'           => [['camera', 'Crown photographed from above'], ['scale', 'Hairline reserve weighed'], ['calendar', 'Any second sitting stated early']],
        'heading'         => 'Crown Hair Transplant for {area} Patients',
        'visits_line'     => 'The measurement, the procedure and each crown review take place at our clinic in Sector 39.',
        'day_heading'     => 'Planning the Procedure Day',
        'day'             => 'A crown session is long, often filling most of the day with breaks, so have a proper breakfast in {area} before you set off and bring your medicine list. Plan to go home by car or cab: a helmet would sit right on the new grafts, so the two-wheeler stays parked until a review clears it.',
        'visits_intro'    => 'Visits are spread across a year: measurement and planning, the procedure, a first-week check and growth reviews, plus a second sitting if a wide crown calls for one. All of them are in Sector 39, Gurugram.',
        'visit_icons'     => [['camera', 'Crown Photographed From Above'], ['calendar', 'A Single Procedure Day'], ['search', 'First-Week Check'], ['chart', 'Growth Reviews Over a Year']],
        'options_heading' => 'Grafts, Medicine or Pigment for the Crown',
        'options_html'    => 'Grafts bring hair back to bare patches of the crown, each set to follow the whorl. Medical treatment works on the hair that is still there and often comes first when the crown is thinning rather than bald. Scalp micropigmentation adds the look of density without using donor hair. Many plans combine them; the <a href="{parent}">crown hair transplant in Gurgaon</a> page goes through each.',
        'cost_heading'    => 'What Decides the Cost of a Crown Transplant',
        'cost_intro'      => 'No price is published for the crown. The quote rests on the graft number, and that number comes from three things: how big the crown measures, how full you want it to look and how many grafts your donor can release. It is given in writing after the assessment, and any likely second sitting is set out in the same plan.',
        'faqs'            => [
            ['q' => 'Where would my crown transplant take place?',
             'a' => 'At our clinic on Sector 39 Road in Jharsa, Gurugram, opposite Medanta – The Medicity. There is no DenceSpot clinic in {area}, so the measurement, the surgery and the reviews are all done there.'],
            ['q' => 'What is the way to the clinic from {area}?',
             'a' => '{route} Tap Directions for the exact pin on Google Maps, and line up a lift or a cab for the ride home after surgery.'],
            ['q' => 'How often will I travel from {area} for a crown transplant?',
             'a' => 'Expect one visit to be measured and planned, one long procedure day, a short check within the first week, then a handful of photographed reviews across roughly twelve months. If your crown is wide enough to need a second sitting, that comes after the first has grown in. Each date is listed in the plan you take home.'],
            ['q' => 'Is the quote different because I live in {area}?',
             'a' => 'No. Two people from the same street can have very different crowns, so the figure is worked out from your own crown’s size, the look you are after and your donor supply. The <a href="/hair-transplant-cost-in-gurgaon">Gurgaon cost guide</a> explains what moves it.'],
            ['q' => 'Should the crown come before the hairline?',
             'a' => 'Usually the hairline goes first if both are thinning and donor hair is limited, because the front frames your face and returns more visible change for each graft. The order flips when loss is confined to the crown, the front is holding steady and there are grafts to spare.'],
            ['q' => 'Will colleagues in {area} notice the crown healing?',
             'a' => 'Less than with a hairline, since the crown sits out of sight for anyone facing you, and most people are back at a desk after a few days. What needs planning is the commute: no helmet or snug cap until a review clears it, and the crown kept out of strong sun, so a car or cab is simplest for the first weeks.'],
            ['q' => 'Can I WhatsApp crown photos before coming from {area}?',
             'a' => 'Yes, and it can save a wasted journey. Photograph the crown straight down in daylight (a family member can help), then your hairline and the donor area behind. The reply tells you whether an assessment is worth booking; the graft number and any staging wait for the examination.'],
        ],
        'consult_intro'   => 'Choose a day to visit Sector 39. The doctor measures your crown, checks how much your donor area could give, and tells you with reasons in writing where the crown fits: first, after the hairline, or later once it has stopped spreading. Nothing is booked unless you ask for it.',
        'descriptions'    => [
            'Crown hair transplant for {area} patients at DenceSpot’s Sector 39 clinic, Gurugram: crown or front first, staging, cost and FAQs.',
            'Crown hair transplant for {area} at DenceSpot, Sector 39, Gurugram: staging, cost and FAQs.',
            'Crown hair transplant for {area} at DenceSpot Gurugram: staging, cost, FAQs.',
        ],
    ],
];
