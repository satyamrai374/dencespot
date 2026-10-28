<?php
/**
 * Copy for the Gurugram hair LED therapy area pages,
 * /hair-led-therapy-in-<area> (schema: includes/gurgaon-treatment-area-page.php).
 * Facts as on /hair-led-therapy-in-gurgaon, written fresh. Position kept: a
 * real but modest effect, months of consistent use, thinning hair only (not
 * bald scalp), diagnosis before any device. No prices, no wavelengths, no
 * devices or brands, no session schedule; the Gurugram clinic only.
 */

declare(strict_types=1);

return [
    'form_treatment' => 'Hair fall treatment',
    'form'           => ['LED or light therapy for hair', 'Considering buying a home device', 'Medication not suitable for me', 'Hair fall treatment', 'Not sure — please advise'],
    'faq_about'      => 'stage of hair loss, medicines or budget',
    'results'        => false,

    'middle' => [
        'heading' => 'What Light Therapy Can Realistically Do',
        'sub'     => 'Set against common hopes, in brief.',
        'cols'    => ['Hope', 'Realistic answer'],
        'rows'    => [
            ['Less shedding', 'Possible, after months'],
            ['Better calibre in thinning hair', 'Some improvement possible'],
            ['Regrowth on a bald crown', 'No'],
            ['Results with occasional use', 'Unlikely'],
            ['Benefit kept after stopping', 'Generally lost'],
            ['Replacing surgery for established loss', 'No'],
        ],
        'note'    => 'If these answers fit what you want, light therapy may be worth adding; if you are hoping for the change shown in device adverts, it is likely to fall short.',
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'Planning Light Therapy at the Gurugram Clinic',
        'intro'     => 'Most of the work is deciding whether light deserves months of your time before any money goes on sessions or a device.',
        'items'     => [
            ['search', 'Diagnosis', 'What is driving your hair loss, and how far it has gone, is established first, and reversible causes such as low iron or thyroid trouble are looked for.'],
            ['shield', 'Suitability', 'Photosensitivity, any medicine that makes skin react to light, and any past scalp skin cancer are checked before you start.'],
            ['chat', 'The Adherence Question', 'What light can do at your stage, whether clinic or home use suits you, and whether you will realistically keep it up.'],
            ['camera', 'Baseline Photographs', 'Taken before you begin, since a slow, subtle effect is otherwise impossible to judge.'],
            ['chart', 'Review Over Months', 'Photographs are compared over a long stretch, with how regularly you used the light talked through openly.'],
        ],
        'note_html' => 'Stages of loss are described in <a href="/blog/norwood-scale-explained">the Norwood scale explained</a>; where follicles have gone, <a href="/hair-transplant-in-gurgaon">hair transplant in Gurgaon</a> is the realistic conversation.',
    ],

    'cost' => [
        'factors' => [
            ['settings', 'mint', 'Where the light is used', 'Visits to the clinic and a home device carry quite different costs.'],
            ['clock', 'violet', 'Months of use', 'Benefit lasts only while use continues, so count the cost over a year.'],
            ['chart', 'sky', 'Device specification', 'Coverage and build vary widely, and so does price.'],
        ],
        'links' => [
            '/cost-and-emi-options' => 'Payment and EMI',
            '/hair-loss-assessment' => 'Hair loss assessment',
        ],
    ],

    'related' => [
        '/hair-led-therapy-in-gurgaon'    => 'Hair LED therapy in Gurgaon',
        '/hair-fall-treatment-in-gurgaon' => 'Hair fall treatment',
        '/hair-prp-treatment-in-gurgaon'  => 'Hair PRP treatment',
        '/hair-transplant-in-gurgaon'     => 'Hair transplant',
    ],

    'area' => [
        'lead'            => 'The first question there is not which device to buy but whether light suits your stage of hair loss at all, and whether you can keep it up for many months.',
        'feats'           => [['clock', 'Months of regular use'], ['scale', 'Modest effect, said plainly'], ['search', 'Stage of loss checked']],
        'heading'         => 'Thinking of Hair LED Therapy? Notes for {area}',
        'visits_line'     => 'Assessment, planning and every progress review happen at the Sector 39 clinic; whether the light itself is used there or at home is settled in your plan.',
        'day_heading'     => 'Clinic Visits or a Device at Home',
        'day'             => 'Count the trips honestly. Light therapy depends on steady use over many months, and a routine that needs regular drives from {area} through Gurugram traffic is the kind that quietly lapses. If that sounds likely, the plan can centre on home use with reviews in Sector 39. Nothing breaks the skin, so you can go straight back to work.',
        'visits_intro'    => 'After the assessment, your plan sets out where you will use the light, how often, and when progress will be reviewed against baseline photographs at the Sector 39 clinic.',
        'visit_icons'     => [['search', 'Stage of Loss Assessed'], ['settings', 'Device Advice Before You Buy'], ['user', 'No Downtime After Use'], ['camera', 'Reviewed Against Photographs']],
        'options_heading' => 'What LED Therapy Is, and What It Is Not',
        'options_html'    => 'Low-level light, delivered through a clinic panel or a home cap, helmet or comb, is meant to support follicles that are still alive. Its evidence is real and stronger than for some treatments sold beside it, but the effect is modest and slow, and it does nothing where follicles have gone. Read more on the <a href="{parent}">hair LED therapy in Gurgaon</a> page.',
        'cost_heading'    => 'Weighing the Cost of Light Therapy',
        'cost_intro'      => 'No price is published, because clinic sessions and home devices are costed so differently. Treat it as an ongoing commitment rather than a fixed course, and get your diagnosis before buying anything: a device that ends up in a drawer is money spent with nothing to show for it.',
        'faqs'            => [
            ['q' => 'Can I get LED hair therapy in {area}?',
             'a' => 'Not from DenceSpot in {area} itself, as there is no clinic there. Patients from {area} are assessed and reviewed at our Sector 39 clinic in Gurugram, opposite Medanta – The Medicity.'],
            ['q' => 'How do I reach Sector 39 from {area}?',
             'a' => '{route} If regular trips look hard to sustain, raise home use at your assessment.'],
            ['q' => 'Should I buy an LED cap before coming in from {area}?',
             'a' => 'Hold off until after the assessment. If your thinning is driven by low iron or a thyroid problem, a cap does nothing for it, and if follicles are already gone, no device can help. Specification and price also vary a great deal, so it pays to know what you need first.'],
            ['q' => 'Is the price different for patients from {area}?',
             'a' => 'No. What you pay depends on whether you use the light in clinic or at home and for how long, never on your address. See <a href="/cost-and-emi-options">cost and EMI options</a>.'],
            ['q' => 'How long before I know whether it is helping?',
             'a' => 'Months. Little or nothing visible happens in the first couple of months of any hair treatment, and many people give up around then, shortly before a response could first be measured. Your review compares photographs over a long enough period to give a fair answer.'],
            ['q' => 'Are there side effects or reasons not to use it?',
             'a' => 'It is generally well tolerated; a warm feeling, slight irritation or, with devices worn on the head, headaches are uncommon. It is not used on an infected or inflamed scalp or for alopecia areata, and light sensitivity, related medicines and earlier skin cancer of the scalp are checked first. Some devices need eye protection.'],
            ['q' => 'Do Gurugram summers or helmets get in the way of using a device?',
             'a' => 'They test the routine more than the treatment. Long hot days, helmet rides and busy festival weeks make a daily habit easy to drop, so tie use to the same time each day and follow the device instructions on preparing the scalp.'],
        ],
        'consult_intro'   => 'Book an assessment in Sector 39 before any device or session. The doctor identifies the cause and stage of your thinning, explains whether light has a role at that stage and helps you weigh it against other options; the decision stays yours.',
        'descriptions'    => [
            'Hair LED therapy for patients from {area} at DenceSpot’s Sector 39 clinic, Gurugram: realistic effect, clinic or home use, cost and FAQs.',
            'Hair LED therapy for {area} at DenceSpot, Sector 39, Gurugram: clinic or home use, cost and FAQs.',
            'Hair LED therapy for {area} at DenceSpot, Gurugram: cost and FAQs.',
        ],
    ],
];
