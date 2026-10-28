<?php
/**
 * Copy for the Gurugram hair transplant repair area pages,
 * /hair-transplant-repair-in-<area> (schema: includes/gurgaon-treatment-area-page.php).
 * Facts as on /hair-transplant-repair-in-gurgaon (the remaining donor sets the
 * ceiling, waiting about a year, excision and redistribution, softening with
 * single hairs, donor scars, over-harvesting, staging, no blame), written
 * fresh. No other clinic named, no prices, no results row: the consented scalp
 * photographs are not repair cases. "Front edge", never the banned word.
 * The Gurugram clinic only.
 */

declare(strict_types=1);

return [
    'form_treatment' => 'Hair transplant',
    'form'           => ['Repair — hairline position or edge', 'Repair — tufted or misangled grafts', 'Repair — thin growth after a transplant', 'Repair — donor scar or thinning', 'Not sure — please advise'],
    'faq_about'      => 'previous surgery, donor supply or budget',
    'results'        => false,

    'middle' => [
        'heading' => 'What the Donor Check Tells You',
        'sub'     => 'General signs, read at your examination.',
        'cols'    => ['The exam finds', 'Usually means'],
        'rows'    => [
            ['A modest graft count last time', 'More room to work'],
            ['Donor density still measures well', 'Grafts can be added'],
            ['Extraction spread evenly', 'A better sign'],
            ['Extraction clustered in one patch', 'A lower ceiling'],
            ['Several earlier procedures', 'A lower ceiling'],
            ['A design fault, not a volume one', 'A good sign'],
        ],
        'note'    => 'Donor hair already taken cannot be replaced, which is why this check comes before any talk of correction.',
    ],

    'steps' => [
        'eyebrow'   => 'How repair works',
        'heading'   => 'Repair in Stages: From Records to Review',
        'intro'     => 'At the Gurugram clinic the donor check comes before any discussion of technique, and each stage is reviewed before the next is agreed.',
        'items'     => [
            ['doc', 'Paperwork Review', 'Whatever survives from the first operation, such as its written record, graft total and technique, read alongside older photos of your hair.'],
            ['search', 'Donor Measured', 'Density left at the back and sides measured, and the pattern of earlier extraction looked at closely.'],
            ['scale', 'A Stated Ceiling', 'What correction can realistically change and what it cannot, written down with the likely number of stages.'],
            ['settings', 'Correction Stage', 'Excision, redistribution, softening with single hairs or density work, done in a single day with the scalp numbed.'],
            ['camera', 'Review Before More', 'The stage allowed to regrow and compared on photographs before any further stage is confirmed.'],
        ],
        'note_html' => 'Read <a href="/blog/hair-transplant-repair-options">hair transplant repair options</a> and <a href="/blog/donor-area-limits-hair-transplant">why donor hair runs out</a>.',
    ],

    'cost' => [
        'factors' => [
            ['search', 'mint', 'Scope of the fix', 'A hairline that only needs softening is a smaller job than a thin area needing new grafts.'],
            ['settings', 'violet', 'Excision time', 'Grafts removed and re-placed one by one add time to each stage.'],
            ['calendar', 'sky', 'Number of stages', 'Repairs are staged more often than first transplants, and the estimate sets out the stages.'],
        ],
        'links' => [
            '/hair-transplant-cost-in-gurgaon' => 'How pricing works',
            '/cost-and-emi-options'            => 'Payment and EMI',
        ],
    ],

    'related' => [
        '/hair-transplant-repair-in-gurgaon'                   => 'Hair transplant repair in Gurgaon',
        '/scalp-micropigmentation-in-gurgaon'                  => 'Scalp micropigmentation',
        '/hairline-transplant-in-gurgaon'                      => 'Hairline design',
        '/blog/hair-transplant-growth-timeline-month-by-month' => 'Is it too early to judge?',
    ],

    'area' => [
        'lead'            => 'The first thing measured there is not the fault but the donor hair you still have, because that sets how far any correction can go; you hear the limit, in writing, before agreeing to a stage.',
        'feats'           => [['search', 'Donor measured first'], ['scale', 'Ceiling stated in writing'], ['clock', 'Judged after about a year']],
        'heading'         => 'Hair Transplant Repair for {area} Patients',
        'visits_line'     => 'From the first assessment through every corrective stage and review, you are seen in Sector 39, at the Gurugram clinic.',
        'day_heading'     => 'What to Bring to the Assessment',
        'day'             => 'Repair assessments run longer than first consultations, so leave {area} with time in hand. Paperwork from the first operation helps more than anything else — the note, the graft figure and the method — and so do photos of your hair from before it. If none survives, come anyway; the examination still tells most of the story.',
        'visits_intro'    => 'Start with the assessment. Corrective stages follow as same-day procedures, spaced months apart so each can regrow and be photographed before the next is confirmed. All of it happens in Sector 39, Gurugram.',
        'visit_icons'     => [['doc', 'Earlier Paperwork Read'], ['search', 'Donor Measured First'], ['calendar', 'Stages Months Apart'], ['camera', 'Photos Before Each Stage']],
        'options_heading' => 'Ways a Transplant Can Be Corrected',
        'options_html'    => 'Grafts sitting wrongly can be taken out one by one and sometimes re-placed; a hard line can be broken up with single hairs; density can be added if the donor allows; and scalp micropigmentation can soften contrast without using donor hair. Most plans mix several. More on the <a href="{parent}">hair transplant repair in Gurgaon</a> page.',
        'cost_heading'    => 'Why Repair Quotes Vary So Much',
        'cost_intro'      => 'A repair cannot be priced from a photo. Four things set it: the faults to be put right, the amount of graft removal, the grafts your donor area has left to offer and the number of stages. Work in previously operated skin is slower, and removing grafts adds time, which is why repair often costs more than a first transplant would have. The figure comes in writing after the examination.',
        'faqs'            => [
            ['q' => 'Which clinic would see me from {area}?',
             'a' => 'Our Gurugram clinic, which faces Medanta – The Medicity on Sector 39 Road in Jharsa. DenceSpot has no clinic in {area}, so you would come to Sector 39 for the first examination, for each corrective stage and for the check-ups between them.'],
            ['q' => 'Is the clinic easy to find coming from {area}?',
             'a' => '{route} Directions on this page opens the exact spot on Google Maps; after a stage, travel home by car or cab.'],
            ['q' => 'My first transplant was elsewhere. Will the doctor comment on it?',
             'a' => 'Only on what can be seen and measured. The consultation is about your scalp and your options from here, not about who did the first operation, and your paperwork serves only to plan the correction.'],
            ['q' => 'Does coming from {area} change the price?',
             'a' => 'No. Your address plays no part; the quote follows the faults being corrected, the excision involved, how much hair your donor has left and the number of stages. See the <a href="/hair-transplant-cost-in-gurgaon">Gurgaon cost guide</a>.'],
            ['q' => 'Is it worth the trip from {area} if my transplant is under a year old?',
             'a' => 'Often, for the assessment, though surgery usually waits until about a year after the first operation, because thin or patchy growth can keep improving until then. Faults that time will not change, such as a hairline set in the wrong place or grafts pointing the wrong way, can be judged sooner.'],
            ['q' => 'How many visits from {area} will a repair need?',
             'a' => 'An assessment, then one day case per stage with a review in between once the hair has grown. Two or more stages are common, so the whole correction can run across many months. Every date appears in your written plan, making it easier to fit the journeys from {area} around work.'],
            ['q' => 'What photos should I send before travelling from {area}?',
             'a' => 'A handful of shots cover most of it: your hairline face-on, each side of it, the crown from above and the back of the head with the hair held up to show the donor. Send them on WhatsApp with a photo of any operative note. A realistic limit is given only after the donor is measured in person.'],
        ],
        'consult_intro'   => 'Bring what you have from the first operation to the Gurugram clinic. You leave knowing how much donor hair is left, which faults can be improved and which cannot, and roughly how many stages a correction would take. Whether to go ahead is yours to decide later.',
        'descriptions'    => [
            'Hair transplant repair for people from {area} at DenceSpot’s Gurugram clinic in Sector 39: donor check, staging, what can change, cost and FAQs.',
            'Hair transplant repair for {area} at DenceSpot, Sector 39, Gurugram: donor check, staging, cost and FAQs.',
            'Hair transplant repair for {area} at DenceSpot Gurugram: limits, cost, FAQs.',
        ],
    ],
];
