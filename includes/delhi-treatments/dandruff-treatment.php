<?php
/**
 * Copy for /dandruff-treatment-in-delhi and its area pages (schema:
 * includes/delhi-treatment-pillar.php). Facts as on /dandruff-treatment-in-rohini,
 * written fresh. Hair family: links go to hair pages only. No prices, brands,
 * doses or doctor named.
 */

declare(strict_types=1);

return [
    'title'          => [
        'Dandruff Treatment in Delhi: Diagnosis & Cost | DenceSpot',
        'Dandruff Treatment in Delhi: Diagnosis & Cost',
        'Dandruff Treatment in Delhi | DenceSpot Rohini',
    ],
    'description'    => 'Dandruff treatment in Delhi at DenceSpot’s Rohini clinic: telling dandruff from its look-alikes, medicated shampoos, flare plans, cost and FAQs.',
    'keywords'       => ['dandruff treatment in delhi', 'dandruff treatment delhi', 'seborrhoeic dermatitis treatment in delhi', 'itchy scalp treatment in delhi', 'dandruff treatment cost in delhi', 'dandruff treatment in rohini'],
    'form_treatment' => 'Hair fall treatment',
    'form'           => ['Dandruff or flaky scalp', 'Itchy or red scalp', 'Flaking with hair fall', 'Hair fall treatment', 'Not sure — please advise'],

    'hero' => [
        'lead'  => 'A flaking, itchy scalp examined at our Rohini clinic before any shampoo is chosen, so dandruff is told apart from psoriasis, a fungal infection or a dye reaction — and you leave with a routine that plans for flares.',
        'feats' => [['search', 'Scalp examined first'], ['list', 'Look-alikes ruled out'], ['clock', 'Shampoo use explained'], ['calendar', 'A plan for flares']],
    ],

    'about' => [
        'heading' => 'What Dandruff Is, and What It Is Not',
        'paras'   => [
            'Dandruff sits at the mild end of seborrhoeic dermatitis. A yeast found on everyone’s skin, the oil your scalp makes and the way your skin reacts to the two together produce the flakes and the itch. It has nothing to do with poor hygiene, and nobody catches it from someone else.',
            'Psoriasis, a fungal infection, a reaction to hair dye and plain dry scalp can all shed flakes too, and each is handled differently, so the first step is an examination rather than a stronger bottle. In Delhi, DenceSpot’s scalp examinations, treatment plans and reviews take place at the Rohini clinic, with registered medical practitioners.',
        ],
        'cta'     => ['#suitability', 'See When a Scalp Needs Checking'],
        'glance'  => [
            ['search', 'mint', 'First visit', 'The scalp examined with the hair parted'],
            ['clock', 'violet', 'Contact time', 'The shampoo left on as long as the pack says'],
            ['calendar', 'sky', 'First change', 'Often within a few weeks of proper use'],
            ['chart', 'amber', 'Outlook', 'Controlled rather than cured; flares planned for'],
        ],
    ],

    'middle' => [
        'heading' => 'Flakes and What They Can Point To',
        'sub'     => 'A rough guide for patient education; only an examination decides.',
        'cols'    => ['What you notice', 'Often points to'],
        'rows'    => [
            ['Fine, loose flakes, mild itch', 'Simple dandruff'],
            ['Greasy yellow scale, red scalp', 'Seborrhoeic dermatitis'],
            ['Thick silvery plaques, sharp edges', 'Scalp psoriasis'],
            ['Scaling with bare patches', 'Fungal infection'],
            ['Itch after a new dye or product', 'Contact dermatitis'],
            ['Small dry flakes, worse in winter', 'Dry scalp'],
        ],
        'note'    => 'Redness or soreness where hair is also being lost is looked at under magnification, because a few rarer conditions can scar the follicles.',
    ],
    'results' => false,

    'why' => [
        'intro'  => 'What happens to a flaky, itchy scalp at the Rohini clinic, step by step, up to the plan for the next flare.',
        'icons'  => [
            ['search', 'Scalp Examined Before Any Shampoo'],
            ['list', 'Look-Alike Conditions Ruled Out'],
            ['shield', 'Fungal Test Only When Needed'],
            ['doc', 'Written Routine With Contact Times'],
            ['calendar', 'A Plan for Flares'],
            ['pin', 'Rohini Clinic, North-West Delhi'],
        ],
        'media'  => 'map',
    ],

    'suit' => [
        'heading' => 'When a Flaky Scalp Is Worth an Examination',
        'intro'   => 'Mild flaking that a medicated shampoo keeps in check may never need a clinic. The signs below suggest the scalp should be looked at properly, and some of them should not wait.',
        'yes'     => ['heading' => 'Worth Booking an Assessment', 'items' => [
            'A medicated shampoo, used properly for a few weeks, has changed nothing',
            'The flakes return soon after every bottle runs out',
            'Flaking has reached the eyebrows, the sides of the nose or behind the ears',
            'You are planning a hair transplant and the scalp is flaky',
            'Shedding seems heavier since the itching began',
        ]],
        'wait'    => ['heading' => 'See a Doctor Sooner', 'items' => [
            'A scalp that is raw, weeping, bleeding or very red and sore',
            'There are thick, silvery plaques with sharp edges',
            'A child has bare patches, broken hairs or spreading scale',
            'The itch started after a new dye or hair product',
            'Your parting is widening or the hair is thinning',
        ]],
        'note'    => ['heading' => 'Flaking and Hair Fall Are Two Questions', 'paras' => [
            'An inflamed scalp can shed more while it stays inflamed, and scratching snaps hairs, but dandruff does not cause baldness. If shedding carries on once the scalp has calmed, it is assessed on its own through <a href="/hair-fall-treatment-in-rohini">hair fall treatment</a>.',
            'Not sure which one you are dealing with? <a href="/blog/can-dandruff-cause-hair-fall">Can dandruff cause hair fall</a> explains the link, and the short <a href="/hair-loss-assessment">hair loss self-assessment</a> may help you decide what to do next.',
        ]],
    ],

    'options' => [
        'eyebrow'         => 'Treatment options',
        'heading'         => 'Medicated Shampoos and Prescribed Treatment',
        'intro'           => 'What goes on the scalp follows the diagnosis, and the active ingredient matters more than the name on the bottle.',
        'cards'           => [
            ['plus', 'mint', 'Medicated Shampoos', 'Grouped by what is in them: antifungal shampoos that act on the yeast, zinc- or selenium-based ones that cut yeast and flaking, tar-based ones for stubborn scaling and psoriasis, and scale-lifting ones, such as salicylic acid, that loosen thick scale so other treatment can reach the skin.', [
                'Chosen by ingredient, not brand',
                'Left on for the stated contact time',
                'Used less often once the scalp settles',
            ]],
            ['doc', 'violet', 'Prescribed Treatment', 'Added only when the examination calls for it: an anti-inflammatory lotion used for a fixed stretch of weeks if the scalp is very red and itchy, or antifungal medicine once a scalp infection has been confirmed. The doctor prescribes both and checks on them at review.', [
                'A lotion alongside the shampoo, not instead',
                'Antifungal medicine only for infection',
                'Used for a defined period',
            ]],
        ],
        'choose'          => ['heading' => 'How the Doctor Builds Your Routine', 'items' => [
            'Which condition the examination shows',
            'How thick the scale is and how red the scalp',
            'Whether a scraping for fungus is needed',
            'The dyes, oils and products you already use',
            'When in the year your scalp tends to flare',
        ]],
        'related_heading' => 'Related Care at the Rohini Clinic',
        'related'         => [
            '/dandruff-treatment-in-rohini'       => 'Dandruff treatment in Rohini',
            '/hair-fall-treatment-in-rohini'      => 'Hair fall treatment',
            '/blog/can-dandruff-cause-hair-fall'  => 'Can dandruff cause hair fall?',
            '/blog/who-should-assess-hair-fall'   => 'Doctor, trichologist or salon?',
        ],
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'From First Examination to a Flare Plan',
        'intro'     => 'Five stages at the Rohini clinic. Most people need no test at all.',
        'items'     => [
            ['chat', 'Your History', 'How long it has lasted, what makes it worse, the dyes and products you use and whether hair is falling.'],
            ['search', 'Scalp Examination', 'The hair parted in several places and the scalp looked at closely, magnified where useful.'],
            ['shield', 'Test If Needed', 'A scraping or a few hairs checked for fungus, only when an infection is suspected.'],
            ['doc', 'Written Routine', 'Which shampoo, how often, how long it stays on and anything prescribed, with a review date.'],
            ['calendar', 'Review & Flares', 'The response checked, the routine stepped down and a plan agreed for the next flare.'],
        ],
        'note_html' => 'Keep oil off your scalp the evening before the visit. More in <a href="/blog/rosemary-onion-juice-and-hair-oils-for-hair-fall">what oiling does to hair and dandruff</a> and <a href="/blog/telogen-effluvium-vs-pattern-hair-loss">telogen effluvium vs pattern hair loss</a>.',
    ],

    'aftercare' => [
        'eyebrow'      => 'Between visits',
        'heading'      => 'Keeping a Flaky Scalp Under Control in Delhi',
        'intro'        => 'Seborrhoeic dermatitis is controlled rather than cured, so the routine after the first few weeks matters as much as the start. These are general points; your written routine comes first.',
        'timeline'     => [
            'The first weeks: the medicated shampoo used as often as your plan says, left on for its full contact time',
            'Once the scalp is calm: the same shampoo used less often rather than dropped',
            'At the first sign of a flare: the routine stepped back up straight away, not weeks later',
            'If shedding continues after the scalp settles: a separate hair fall assessment',
        ],
        'tips_heading' => 'Your Scalp Through the Delhi Year',
        'tips'         => [
            ['clock', 'mint', 'Summer and helmets', 'Sweat and oil collect under a helmet or cap; wash after a hot day and keep the lining clean.'],
            ['calendar', 'violet', 'Monsoon damp', 'A common time for flares and fungal infection; dry the scalp before tying hair up.'],
            ['info', 'sky', 'Winter dryness', 'Small, dry white flakes in the cold are often dry scalp, which needs gentler care.'],
            ['alert', 'amber', 'Smog, dust and hard water', 'Dust and mineral residue add to itch and dullness; a clarifying wash can help, though not on a red or sore scalp.'],
        ],
    ],

    'cost' => [
        'heading'  => 'Dandruff Treatment Cost in Delhi',
        'intro'    => 'Most plans are short and simple: an examination, a shampoo chosen by its ingredient, now and then a prescribed lotion for a few weeks, and a follow-up visit. Prices are not listed here; what your plan will cost is explained once your scalp has been examined at the Rohini clinic.',
        'factors'  => [
            ['search', 'mint', 'The diagnosis', 'Simple dandruff needs less than psoriasis or an infection.'],
            ['shield', 'violet', 'A fungal test', 'Only when an infection is suspected.'],
            ['doc', 'sky', 'Prescribed medicine', 'A lotion for a set period, or antifungal medicine for a confirmed infection.'],
            ['calendar', 'amber', 'Reviews and hair fall', 'Follow-up visits, and a separate hair fall assessment if you need one.'],
        ],
        'meta'     => 'Wherever you are seen, ask which condition you have, which ingredient you are using and for how long, and whether anything offered is something the diagnosis does not need.',
        'links'    => [
            '/dandruff-treatment-in-rohini' => 'Dandruff care in Rohini',
            '/cost-and-emi-options'         => 'Cost and payment options',
        ],
        'estimate' => ['heading' => 'What Your Routine Sets Out', 'items' => [
            'The condition the examination found',
            'The shampoo, how often and its contact time',
            'Any prescribed lotion or medicine, and for how long',
            'A test, only if an infection is suspected',
            'When to come back for a review',
        ], 'note' => 'Should hair fall prove to be a separate issue, that assessment is priced and explained separately.'],
    ],

    'faqs' => [
        ['q' => 'What causes dandruff?',
         'a' => 'Three things combine: a yeast that lives on everyone’s skin, the oil your scalp produces, and how sensitive your skin is to them. Dandruff is the mild end of seborrhoeic dermatitis, and it often flares with seasonal change, humid weather, a sweaty scalp or stress. Poor hygiene is not the cause.'],
        ['q' => 'Can dandruff be cured permanently?',
         'a' => 'It is usually controlled rather than cured. Seborrhoeic dermatitis settles with treatment and tends to come back from time to time, so a sound plan includes a lighter maintenance routine and clear steps for the next flare. Dropping the shampoo the moment the scalp clears is a common reason the flakes return quickly.'],
        ['q' => 'Does dandruff cause hair fall?',
         'a' => 'It does not cause baldness or destroy follicles. While the scalp is inflamed it can shed more than usual, and scratching breaks hairs, but that generally eases as the scalp calms. Shedding that continues after that needs its own assessment; see <a href="/hair-fall-treatment-in-rohini">hair fall treatment</a> and <a href="/blog/can-dandruff-cause-hair-fall">can dandruff cause hair fall</a>.'],
        ['q' => 'How can I tell dandruff from a dry scalp?',
         'a' => 'Look at the flakes and the season. Seborrhoeic dermatitis usually sheds bigger, oily, yellow-tinged scale from a scalp that can look red and itch; a dry scalp sheds fine, powdery white flakes, tends to come with dry skin on the body and gets worse as Delhi turns cold. One calls for an anti-yeast approach and the other for gentler care, so the difference is checked before a shampoo is chosen.'],
        ['q' => 'Which shampoo is used for dandruff?',
         'a' => 'What counts is the active ingredient, not the label. Antifungal shampoos are often the first choice; zinc- or selenium-based ones are useful in rotation; tar-based ones suit stubborn scaling and psoriasis; and scale-lifting ones loosen thick scale. The doctor chooses one for your scalp and explains how long it has to stay on before you rinse.'],
        ['q' => 'How much does dandruff treatment cost in Delhi?',
         'a' => 'Prices are not published, because the plan follows the diagnosis. Simple dandruff usually needs only an examination, a shampoo and a follow-up visit; a fungal test and antifungal medicine, longer treatment for psoriasis or a separate hair fall assessment add to that. Your cost is explained after the examination at the Rohini clinic; see <a href="/cost-and-emi-options">cost and payment options</a>.'],
        ['q' => 'Should I oil my scalp if I have dandruff?',
         'a' => 'Keep oil to the lengths of your hair for now. Oil left on a flaking, itchy scalp tends to feed seborrhoeic dermatitis rather than soothe it, so the itch and the scratching carry on. Once the scalp is under control, ask the doctor what suits you; <a href="/blog/rosemary-onion-juice-and-hair-oils-for-hair-fall">what oiling does to hair and dandruff</a> explains more.'],
        ['q' => 'How often should I wash my hair if I have dandruff?',
         'a' => 'Regularly, not less. Washing clears away the oil the condition feeds on, and the medicated shampoo is used as often as your plan says. What keeps a scalp irritated is very hot water, scrubbing with the nails and scratching, so use lukewarm water and your fingertips.'],
        ['q' => 'How long does a medicated shampoo take to work?',
         'a' => 'Less flaking and itch usually show within a few weeks, provided the shampoo suits the condition and stays on the scalp for the time printed on the pack. Many shampoos that seem to fail were simply rinsed off too soon. If proper use has made no difference, the diagnosis is worth checking before you buy something stronger.'],
        ['q' => 'Is dandruff contagious?',
         'a' => 'No. The yeast involved is on everyone’s skin; what differs is how your scalp reacts to it. A fungal scalp infection (tinea capitis) is a separate condition that can pass between children, which is why scaling with bare patches is examined rather than treated with shampoo alone.'],
        ['q' => 'When should a child’s flaky scalp see a doctor?',
         'a' => 'Soon, if there are bald patches, broken hairs or scaling that keeps spreading. Fungal scalp infection is more common in children and needs antifungal medicine prescribed by a doctor; shampoo by itself does not get rid of it.'],
        ['q' => 'Does dandruff delay a hair transplant?',
         'a' => 'It can, but only until the scalp has settled. Surgery is not carried out on an inflamed scalp, so the flaking is treated first and the transplant planned afterwards; it postpones the procedure rather than ruling it out. See <a href="/hair-transplant-in-delhi">hair transplant in Delhi</a>.'],
        ['q' => 'What should I bring to my appointment?',
         'a' => 'The bottles, or clear photos of the labels, of every shampoo, scalp product and prescribed lotion you have tried, and the name of any colour or chemical treatment from recent months. Jot down when the flaking began and when it is worse, and skip oiling the evening before so the doctor sees the scalp in its everyday state.'],
        ['q' => 'Which DenceSpot clinic treats dandruff in Delhi?',
         'a' => 'Patients come from across the city to DenceSpot’s one Delhi clinic, in Rohini, North-West Delhi. The examination, any test and every review happen there; the list of areas we serve is at the bottom of this page.'],
        ['q' => 'Can I send scalp photos on WhatsApp first?',
         'a' => 'Yes. Take a few daylight photos of the scalp, parting the hair in two or three places, and add pictures of your shampoo labels; the Rohini clinic can then reply to a first question. If hair fall worries you, the <a href="/hair-loss-assessment">hair loss self-assessment</a> can point to a next step; neither replaces an examination.'],
    ],
    'faq_about' => 'scalp, hair or budget',

    'consult' => [
        'heading' => 'Book a Dandruff Treatment Consultation in Delhi',
        'intro'   => 'Bring the shampoos you have tried to the Rohini clinic. The doctor tells you what is behind the flakes, writes down a routine that expects the odd flare, and deals with any hair fall as a question of its own.',
    ],

    'schema_type' => 'therapy',
    'schema'      => [
        'name'              => 'Dandruff Treatment',
        'description'       => 'Examination of a flaking, itchy scalp to tell dandruff and seborrhoeic dermatitis from conditions that resemble them, followed by a medicated-shampoo routine and prescribed treatment where needed, at the Rohini clinic in Delhi.',
        'alternateName'     => ['Dandruff Treatment in Delhi', 'Seborrhoeic dermatitis treatment', 'Flaky scalp treatment'],
        'bodyLocation'      => 'Scalp',
        'howPerformed'      => 'A history and an examination of the scalp with the hair parted, magnified where useful, to tell dandruff and seborrhoeic dermatitis apart from dry scalp, psoriasis, fungal infection, contact dermatitis and scarring conditions, with fungal testing of a scraping or hairs only when infection is suspected. Treatment is a medicated shampoo selected by active ingredient and used for its full contact time, plus, where indicated, a time-limited prescribed anti-inflammatory lotion or antifungal medicine.',
        'preparation'       => 'No oiling the night before. The patient brings the shampoos, lotions and hair products already used, details of recent dyes or chemical treatments, and notes on when the flaking started, what worsens it and whether hair fall is present.',
        'followup'          => 'Follow-up at the Rohini clinic once the routine has had time to act: the response is checked, the shampoo is stepped down or rotated, and steps for the next flare are agreed. Persistent hair fall is assessed separately.',
        'expectedPrognosis' => 'Seborrhoeic dermatitis is controlled rather than cured and commonly flares with seasonal change, humidity, sweat and stress. Dandruff does not cause permanent hair loss, though shedding may rise while the scalp is inflamed. A fungal infection needs antifungal medicine. Responses differ between patients.',
    ],

    'area' => [
        'lead'            => 'Dandruff care there begins with a close look at your scalp, so dandruff is told apart from its look-alikes before any shampoo is chosen.',
        'feats'           => [['search', 'Scalp examined first'], ['list', 'Shampoo chosen by ingredient'], ['calendar', 'A plan for flares']],
        'heading'         => 'Dandruff and Scalp Care for {area} Residents',
        'visits_line'     => 'Your examination, any test and the review visits all happen at the Rohini clinic.',
        'day_heading'     => 'On the Day of Your Visit',
        'day'             => 'Go without scalp oil the evening before, and carry the shampoos and lotions you have used, or pictures of their labels, so the doctor sees both the scalp and what it has been exposed to. Most people need no test, and nothing about the examination keeps you from the rest of your day back in {area}.',
        'visits_intro'    => 'For most people, a first examination and a review once the routine has had time to work, with further visits only if an infection, psoriasis or hair fall needs following up — all at the Rohini clinic.',
        'visit_icons'     => [['search', 'Examination First'], ['doc', 'Written Routine'], ['shield', 'Tests Only If Needed'], ['calendar', 'Review Visit']],
        'options_heading' => 'Scalp Treatment at the Rohini Clinic',
        'options_html'    => 'Most plans rest on a medicated shampoo chosen by its active ingredient and left on for its full contact time; a prescribed lotion or antifungal medicine is added only when the examination shows a need. <a href="{hub}#options">How shampoos and prescriptions are chosen</a>.',
        'cost_heading'    => 'What Dandruff Treatment Costs Depend On',
        'cost_intro'      => 'There is no price list. Most plans involve an examination, a shampoo and a review; a fungal test, prescribed medicine or a separate hair fall assessment adds to that, and your cost is explained after the examination.',
        'faqs'            => [
            ['q' => 'Where will I be seen if I live in {area}?',
             'a' => 'At DenceSpot’s Rohini clinic in North-West Delhi, the one clinic we have in the city. There is no DenceSpot clinic in {area}; the Directions button opens the Rohini clinic on Google Maps.'],
            ['q' => 'What is the route from {area} to the clinic?',
             'a' => '{route} For the trip from your own street, check Google Maps or the DMRC journey planner, or message the clinic on WhatsApp.'],
            ['q' => 'How many visits will dandruff treatment need from {area}?',
             'a' => 'For most people, two to begin with: the examination, where the routine is set, and a review once it has had time to work. More visits are added only if a fungal infection, psoriasis or hair fall needs following up, so most patients from {area} make just a few trips.'],
            ['q' => 'Is the cost different for patients from {area}?',
             'a' => 'No. What you pay follows the diagnosis and the plan — the examination, the shampoo and any prescribed medicine or test — not where you live. It is explained after the examination; see <a href="/cost-and-emi-options">cost and payment options</a>.'],
            ['q' => 'Can I keep oiling my hair?',
             'a' => 'On the lengths, if you like. Oil left on a flaking, itchy scalp tends to feed seborrhoeic dermatitis, so keep it off the scalp until the condition is controlled, and skip it entirely the night before your visit.'],
            ['q' => 'Is this dandruff or a hair fall problem?',
             'a' => 'Possibly both, and they are answered separately. An inflamed scalp can shed more until it settles; if shedding continues after that, it is assessed through <a href="/hair-fall-treatment-in-rohini">hair fall treatment</a> at the same clinic.'],
            ['q' => 'Can I send scalp photos from {area} first?',
             'a' => 'Yes. Daylight photos of the scalp with the hair parted, plus your shampoo labels, can go to the Rohini clinic on WhatsApp. They help with a first question; the diagnosis needs an examination in person.'],
        ],
        'consult_intro'   => 'Book a scalp examination at the Rohini clinic on a day that suits you. The doctor works out what is behind the flaking, explains the routine and its cost, and tells you separately whether any hair fall needs its own assessment.',
        'descriptions'    => [
            'Patients from {area} are seen for dandruff at DenceSpot’s Rohini clinic in Delhi: scalp checks, shampoos, the route, cost and FAQs.',
            'Dandruff treatment for {area} at DenceSpot’s Rohini clinic, Delhi: scalp checks, the route, cost and FAQs.',
            'Dandruff treatment for {area} at DenceSpot’s Rohini clinic: cost and FAQs.',
        ],
    ],
];
