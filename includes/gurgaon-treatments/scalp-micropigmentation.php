<?php
/**
 * Copy for the Gurugram scalp micropigmentation area pages,
 * /scalp-micropigmentation-in-<area> (schema: includes/gurgaon-treatment-area-page.php).
 * Facts as on /scalp-micropigmentation-in-gurgaon, written fresh. Position
 * kept: a cosmetic tattoo that adds no hair and does not treat hair loss;
 * spends no donor hair; fades and needs touch-ups; hard to remove. That page
 * notes that in-house SMP is still to be confirmed, so these pages place only
 * the assessment and planning at the clinic and name no operator or device.
 * No prices; the Gurugram clinic only.
 */

declare(strict_types=1);

return [
    'form_treatment' => 'Hair transplant',
    'form'           => ['Scalp micropigmentation — density', 'Shaved-look pigmentation', 'Scar camouflage', 'Alongside a transplant', 'Not sure — please advise'],
    'faq_about'      => 'scalp, hairline or budget',
    'results'        => false,

    'middle' => [
        'heading' => 'Scalp Pigment: Straight Answers',
        'sub'     => 'Before any design is drawn.',
        'cols'    => ['Question', 'Answer'],
        'rows'    => [
            ['Does it add hair?', 'No; it is pigment only'],
            ['Does it stop hair loss?', 'No; loss carries on beneath'],
            ['Does it use donor hair?', 'None at all'],
            ['Does it last for good?', 'Fades over years; touch-ups needed'],
            ['Can it be removed?', 'Only with difficulty, by laser'],
            ['Shaved-head look?', 'Hair must be kept short'],
        ],
        'note'    => 'Pigment is hard to take back out, so the hairline, density and tone are agreed in full before the first session.',
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'How Scalp Pigmentation Is Planned and Built',
        'intro'     => 'Five stages, with most of the care going into the parts that are hardest to undo: the design and the first layers of pigment.',
        'items'     => [
            ['search', 'Assessment', 'Your pattern of loss, scalp condition, scarring history and donor supply, and whether pigment, grafts or both suit you.'],
            ['pencil', 'Design', 'Hairline position, density and tone agreed with an eye on how your face and hair loss will change with age.'],
            ['shield', 'Safety Check', 'Keloid tendency, skin conditions, past reactions to tattoo pigment and medicines affecting healing are reviewed; an infected or inflamed scalp waits.'],
            ['settings', 'Layered Sessions', 'Density is built up over several sessions with gaps of days to weeks, kept light at first because more can be added later.'],
            ['calendar', 'Touch-ups', 'A review as the pigment settles, then occasional top-up sessions over the years as it fades.'],
        ],
        'note_html' => 'Where grafts are limited, read <a href="/blog/donor-area-limits-hair-transplant">why donor hair is finite</a>; after earlier surgery, see <a href="/blog/hair-transplant-repair-options">hair transplant repair options</a>.',
    ],

    'cost' => [
        'factors' => [
            ['chart', 'mint', 'Size of the area', 'Camouflaging one scar is a smaller job than a whole shaved-look design.'],
            ['calendar', 'violet', 'Number of sessions', 'Density is layered gradually, so several visits are normal.'],
            ['clock', 'sky', 'Touch-ups', 'Pigment fades, so top-ups over the years belong in the total.'],
        ],
        'links' => [
            '/hair-transplant-cost-in-gurgaon' => 'Hair transplant cost in Gurgaon',
            '/cost-and-emi-options'            => 'Cost and EMI options',
        ],
    ],

    'related' => [
        '/scalp-micropigmentation-in-gurgaon' => 'Scalp micropigmentation in Gurgaon',
        '/crown-hair-transplant-in-gurgaon'   => 'Crown hair transplant',
        '/hair-transplant-repair-in-gurgaon'  => 'Hair transplant repair',
        '/hair-transplant-in-gurgaon'         => 'Hair transplant',
    ],

    'area' => [
        'lead'            => 'Pigment is planned there alongside the surgical options, so you can weigh dots of colour, grafts or a mix of both against your donor supply before committing to either.',
        'feats'           => [['shield', 'Spends no donor hair'], ['pencil', 'Design agreed first'], ['info', 'Fading explained upfront']],
        'heading'         => 'Scalp Micropigmentation: Planning It From {area}',
        'visits_line'     => 'The assessment and design planning take place at our Sector 39 clinic in Gurugram, where pigment and surgical options are considered side by side.',
        'day_heading'     => 'Before You Commit',
        'day'             => 'Think about how you will want to wear your hair in years to come. If the goal is a shaved-head look, the hair around the pigment has to stay short for good; if it is density under existing hair, that rule is looser. Because pigment fades and is slow to remove, the design deserves more time than any single session.',
        'visits_intro'    => 'Your first visit covers the assessment and a frank look at pigment against grafts. If you go ahead, density is built across several sittings, days or weeks apart, with touch-ups in later years as the pigment softens.',
        'visit_icons'     => [['search', 'Assessment and Donor Check'], ['pencil', 'Hairline and Tone Agreed'], ['calendar', 'Sessions Days to Weeks Apart'], ['info', 'Touch-ups as Pigment Fades']],
        'options_heading' => 'Pigment, Grafts or Both',
        'options_html'    => 'Each does a different job. Grafts are living hair that grows and can be styled, but every one is drawn from a donor supply that does not regenerate. Pigment grows nothing, yet uses none of that supply, so it can make a thinning zone or a scar less noticeable while grafts are kept for where real hair matters most. More on the <a href="{parent}">scalp micropigmentation in Gurgaon</a> page.',
        'cost_heading'    => 'What Goes Into an SMP Quote',
        'cost_intro'      => 'The quote follows the area to be covered and how many sessions it needs, and is given after the assessment. Touch-ups in later years are part of the real cost and are discussed at the start. When comparing, look at healed work rather than fresh photos, which tend to look darker and crisper.',
        'faqs'            => [
            ['q' => 'Is scalp micropigmentation available in {area}?',
             'a' => 'DenceSpot has no clinic in {area}. Patients from {area} are assessed at our clinic on Sector 39 Road in Jharsa, Gurugram, opposite Medanta – The Medicity, where pigment is planned alongside the surgical options.'],
            ['q' => 'What is the way to Sector 39 from {area}?',
             'a' => '{route} The map on this page gives directions from wherever you are starting.'],
            ['q' => 'Will SMP make my hair grow back?',
             'a' => 'No. It is a cosmetic tattoo: tiny dots of pigment that make the scalp show through less or mimic very short hair. It does not treat hair loss, which carries on beneath it, so the design has to allow for how your loss may progress.'],
            ['q' => 'Does the cost depend on living in {area}?',
             'a' => 'No. It depends on the area to be covered, the number of sessions and the touch-ups you will need later, and it is quoted after the assessment. See <a href="/cost-and-emi-options">cost and EMI options</a>.'],
            ['q' => 'How do I look after the scalp in Gurugram heat?',
             'a' => 'For the period you are given, keep the treated area dry and leave it alone, keep sun off it, and pause swimming, steam and anything that makes you sweat heavily; no picking or scratching as it settles. In the hot months, choose a time when you will not be out in the afternoon sun straight afterwards.'],
            ['q' => 'Can it hide a scar from an earlier transplant?',
             'a' => 'Often. A scar stands out because it is paler than the scalp around it; pigment narrows that difference, so a linear strip scar or dot scarring from earlier extraction becomes harder to pick out. Pigment can take differently in scar tissue, so it is approached with care and usually tested first. See <a href="/hair-transplant-repair-in-gurgaon">hair transplant repair</a>.'],
            ['q' => 'Can I send photos from {area} before the assessment?',
             'a' => 'Yes. Daylight photographs of the area, including any scarring, with a note of how you wear your hair now and how you would like to, help the clinic say whether pigment is worth discussing in person.'],
        ],
        'consult_intro'   => 'Book a visit to Sector 39. The doctor looks at your pattern of loss, any scarring and how much donor hair you have, then talks through pigment, grafts or a mix of the two, including the upkeep each involves. You decide afterwards, in your own time.',
        'descriptions'    => [
            'Scalp micropigmentation for patients from {area} at DenceSpot’s Sector 39 clinic, Gurugram: what it can and cannot do, fading, cost and FAQs.',
            'Scalp micropigmentation for {area} at DenceSpot, Sector 39, Gurugram: fading, cost and FAQs.',
            'SMP for {area} at DenceSpot, Gurugram: what it does, cost and FAQs.',
        ],
    ],
];
