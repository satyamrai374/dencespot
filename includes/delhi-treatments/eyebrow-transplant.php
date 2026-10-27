<?php
/**
 * Copy for /eyebrow-transplant-in-delhi and its area pages (schema:
 * includes/delhi-treatment-pillar.php). Facts as on /eyebrow-transplant-in-rohini
 * (single-hair grafts, a shallow angle that changes along the brow, the
 * shape agreed first, lifelong trimming, medical causes first), written
 * fresh. Microblading is described for comparison only; the clinic is not
 * said to offer it. No density figures, success rates or prices, and no
 * results row: no consented brow photographs are on record.
 */

declare(strict_types=1);

return [
    'title'          => [
        'Eyebrow Transplant in Delhi: Design & Cost | DenceSpot',
        'Eyebrow Transplant in Delhi: Design & Cost',
        'Eyebrow Transplant in Delhi | DenceSpot Rohini',
    ],
    'description'    => 'Eyebrow transplant in Delhi at DenceSpot’s Rohini clinic: single-hair grafts for over-plucked, sparse or scarred brows, design, recovery, cost and FAQs.',
    'keywords'       => ['eyebrow transplant in delhi', 'eyebrow hair transplant delhi', 'eyebrow transplant cost in delhi', 'eyebrow restoration delhi', 'eyebrow transplant in rohini'],
    'form_treatment' => 'Eyebrow transplant',
    'form'           => ['Eyebrow transplant', 'Beard transplant', 'Alopecia areata treatment', 'Hair transplant (FUE / DHI)', 'Not sure — please advise'],

    'hero' => [
        'lead'  => 'Eyebrow transplant at our Rohini clinic for brows thinned by plucking, sparse from the start or broken by a scar — with the reason for the loss checked first, the shape drawn on your face and the lifelong trimming explained before you decide.',
        'feats' => [['search', 'Cause checked first'], ['pencil', 'Brow drawn on your face'], ['user', 'One hair per graft'], ['doc', 'Written estimate first']],
    ],

    'about' => [
        'heading' => 'What an Eyebrow Transplant Involves',
        'paras'   => [
            'The hair used is taken from the back of the scalp, which has enough to spare, and split under magnification so that each graft holds a single hair. Those grafts are set into the brow one at a time, almost flat to the skin, angled upward near the nose, outward through the middle and downward at the tail.',
            'Because the hairs come from the scalp, they keep growing past brow length and need trimming every week or two for as long as they grow. In Delhi, registered medical practitioners at DenceSpot’s Rohini clinic design each brow and carry out the procedure.',
        ],
        'cta'     => ['#suitability', 'Check Who It May Suit'],
        'glance'  => [
            ['shield', 'mint', 'Local anaesthetic', 'A day case of a few hours'],
            ['clock', 'violet', 'Visible healing', 'Crusts and swelling for about a week'],
            ['chart', 'sky', 'New hairs', 'From about 3–4 months; settled by 8–12'],
            ['pencil', 'amber', 'Upkeep', 'Trimming every week or two, for life'],
        ],
    ],

    'middle' => [
        'heading' => 'How a Brow Is Built',
        'sub'     => 'General patient education, not a design.',
        'cols'    => ['Part of the brow', 'How grafts are set'],
        'rows'    => [
            ['Head, near the nose', 'Hairs angled upward'],
            ['Body', 'Fuller, running outward'],
            ['Tail', 'Thinner, turning down'],
            ['Every graft', 'One hair, at a shallow angle'],
            ['The edges', 'Softly irregular, not solid'],
        ],
        'note'    => 'Your own shape is drawn on your face and agreed in a mirror before any graft is taken.',
    ],
    'results' => false,

    'why' => [
        'heading' => 'Why Choose DenceSpot for an Eyebrow Transplant in Delhi?',
        'intro'   => 'What happens with a brow case at the Rohini clinic, from finding the reason for the loss to agreeing the shape.',
        'icons'   => [
            ['user', 'Doctor-Led Assessment'],
            ['search', 'Medical Causes Checked First'],
            ['pencil', 'Shape Drawn and Agreed'],
            ['settings', 'Single-Hair Grafts'],
            ['camera', 'Photographed Reviews'],
            ['pin', 'Rohini Clinic, North-West Delhi'],
        ],
        'media'   => 'map',
    ],

    'suit' => [
        'heading' => 'Who an Eyebrow Transplant May Suit',
        'intro'   => 'What caused the gap in a brow decides more than the size of the gap, so the cause is settled before a shape is drawn.',
        'yes'     => ['heading' => 'May Be Considered For', 'items' => [
            'Brows thinned by years of plucking or threading',
            'Brows that have always been sparse',
            'A settled scar from an injury or surgery',
            'Some burn scars, judged case by case',
            'Anyone willing to trim the new hairs for life',
        ]],
        'wait'    => ['heading' => 'Treat First, Wait or Reconsider', 'items' => [
            'Active alopecia areata',
            'Outer-brow thinning from an untreated thyroid problem',
            'Recent chemotherapy, while the brows may regrow',
            'Inflamed or unsettled skin around the brows',
            'Not wanting lifelong trimming',
        ]],
        'note'    => ['heading' => 'Causes Come First', 'paras' => [
            'In alopecia areata the immune system attacks hair follicles, and grafted ones are not protected, so the condition is treated and must settle for a long period before a transplant is discussed; see <a href="/alopecia-areata-treatment-in-rohini">alopecia areata treatment</a>.',
            'Sparse outer ends of the brows can point to a thyroid problem, and brow hair often recovers once the thyroid is treated. See <a href="/blog/thyroid-and-hair-loss">thyroid and hair loss</a>.',
        ]],
    ],

    'options' => [
        'eyebrow'         => 'Before you decide',
        'heading'         => 'Brow Grafts Compared With Microblading',
        'intro'           => 'Both answer sparse brows, in very different ways. Microblading is described here for comparison only; the right choice turns on the cause of your sparse brows and on whether you are happy to trim for life.',
        'cards'           => [
            ['settings', 'mint', 'Eyebrow Transplant', 'Living follicles moved from the scalp, one hair per graft, that grow real hairs, each angled to match its section of the brow. It is minor surgery with a long timeline.', [
                'Hairs that grow and need trimming',
                'Uses some scalp donor hair',
                'Shape settles over 8–12 months',
            ]],
            ['pencil', 'violet', 'Microblading', 'Pigment placed in the skin as fine strokes that imitate hairs. Nothing grows, there is no surgery, and the look is there from the start.', [
                'Pigment only, no hair',
                'Fades and has to be repeated',
                'Uses no donor hair',
            ]],
        ],
        'choose'          => ['heading' => 'How the Doctor Plans Your Brows', 'items' => [
            'Why the brow hair is missing, and whether it may return',
            'The state of the skin, including any scar',
            'How much the scalp donor area can spare',
            'A shape that fits your face, checked together in a mirror',
            'Whether a later refining session is likely',
        ]],
        'related_heading' => 'Related Treatments at the Rohini Clinic',
        'related'         => [
            '/eyebrow-transplant-in-rohini'        => 'Eyebrow transplant in Rohini',
            '/beard-transplant-in-delhi'           => 'Beard transplant in Delhi',
            '/alopecia-areata-treatment-in-rohini' => 'Alopecia areata treatment',
            '/hair-transplant-aftercare'           => 'Aftercare guide',
        ],
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'How an Eyebrow Transplant Is Done',
        'intro'     => 'Five stages at the Rohini clinic, with the estimate given in writing before any date is booked.',
        'items'     => [
            ['search', 'Assessment', 'The cause of the sparse brow, the health of the skin and how many hairs the donor area can give; anything needing medical treatment is caught here.'],
            ['pencil', 'Brow Design', 'A proposed shape pencilled on, checked with you in a mirror and changed until you are happy; the graft count comes from it.'],
            ['list', 'Single-Hair Grafts', 'Under local anaesthetic, hair taken from the back of the scalp and split into one-hair grafts under magnification.'],
            ['settings', 'Placement', 'Each hair set almost flat to the skin, in the direction of its part of the brow.'],
            ['camera', 'Reviews & Trimming', 'Photographed check-ups while the hairs shed and regrow, and advice on trimming as soon as they start growing.'],
        ],
        'note_html' => 'General recovery principles are in the <a href="/hair-transplant-aftercare">aftercare guide</a>, and seasonal points in <a href="/blog/hair-transplant-recovery-in-delhi">hair transplant recovery in Delhi</a>.',
    ],

    'aftercare' => [
        'eyebrow'      => 'Recovery',
        'heading'      => 'Recovering From an Eyebrow Transplant in Delhi',
        'intro'        => 'Fresh brow grafts are on show in the centre of your face, so many people keep the first week clear. Timings below are general, and your written aftercare takes priority.',
        'timeline'     => [
            'First days: a tiny crust on each graft and some swelling around the eyes; no rubbing or picking',
            'Around a week: most people are back at work and out in public',
            'Within a few weeks: the placed hairs drop out as expected, leaving their roots in the skin',
            'Three to four months on: new hairs appear, patchy at first, settling over eight to twelve months',
        ],
        'tips_heading' => 'Brow Care Around Delhi Life',
        'tips'         => [
            ['clock', 'mint', 'Summer sweat', 'Sweat from the forehead runs into healing brows; stay cool and let it dry without wiping across them.'],
            ['shield', 'violet', 'Two-wheeler helmets', 'The rim of a helmet rests just above the brows; use cabs until a review clears one.'],
            ['alert', 'sky', 'Smog and dust', 'Wash only as instructed, and wear a mask that hooks over the ears so nothing ties across the back of the head.'],
            ['calendar', 'amber', 'Weddings and festivals', 'Brow make-up and threading wait until you are cleared, so book well before a family event.'],
        ],
    ],

    'cost' => [
        'heading'  => 'Eyebrow Transplant Cost in Delhi',
        'intro'    => 'Prices are not published, because a partial fill and a full rebuild are very different jobs. The estimate follows the number of grafts in the brow shape you agree, and it is given itemised and in writing at the Rohini clinic before any date is booked.',
        'factors'  => [
            ['chart', 'mint', 'Grafts in the design', 'Counted from the shape drawn and agreed.'],
            ['pencil', 'violet', 'Partial or full', 'Filling gaps needs fewer grafts than rebuilding a brow.'],
            ['scale', 'sky', 'Scarred skin', 'Scar or burn tissue is slower, more careful work.'],
            ['calendar', 'amber', 'A second session', 'Stated with the first estimate if one is planned.'],
        ],
        'meta'     => 'Each brow graft holds a single hair, so setting a per-graft rate beside a scalp quote is not a fair comparison.',
        'links'    => [
            '/hair-transplant-cost-in-rohini'         => 'Graft-based pricing',
            '/blog/hair-transplant-cost-delhi-quotes' => 'Comparing Delhi quotes',
            '/cost-and-emi-options'                   => 'EMI and payment',
        ],
        'estimate' => ['heading' => 'What Your Written Estimate Lists', 'items' => [
            'The grafts in your agreed design',
            'One brow or both',
            'Local anaesthesia and medication',
            'Follow-up reviews',
            'Anything excluded, as a separate line',
        ], 'note' => 'Instalment options through third-party lenders may be available; ask at the consultation.'],
    ],

    'faqs' => [
        ['q' => 'Who is an eyebrow transplant suitable for?',
         'a' => 'Usually someone whose brows have been thinned by years of plucking or threading, have always been sparse, or are broken by a settled scar, whose skin is healthy and who accepts trimming for life. It waits while alopecia areata is active, while a thyroid problem is being treated, or after chemotherapy while the brows may regrow. An examination decides suitability.'],
        ['q' => 'How many grafts does an eyebrow transplant need?',
         'a' => 'There is no set number. Once the brow shape is drawn and agreed, the grafts are counted to fill it; topping up a brow that is partly there needs far fewer than building one where almost no hair grows. Every graft carries one hair.'],
        ['q' => 'How long does recovery take?',
         'a' => 'Expect small crusts on the grafts and some puffiness around the eyes for the first several days. By around a week most people are happy to be out in public, though brow make-up, threading nearby, swimming and hard workouts wait until a review clears them.'],
        ['q' => 'How much does an eyebrow transplant cost in Delhi?',
         'a' => 'No set price applies. The cost is set by how many grafts your agreed brow shape needs, whether one brow or both are treated and any scar work, and you receive it itemised and in writing after your assessment at the Rohini clinic, before any date is booked. <a href="/hair-transplant-cost-in-rohini">Hair transplant cost in Rohini</a> explains graft-based pricing.'],
        ['q' => 'Does an eyebrow transplant hurt?',
         'a' => 'Most people find the numbing injections around the brow the worst of it, and they last only a short time. Once the brow is numb you may notice pressure, and more anaesthetic can be added if you feel anything sharp. Swelling around the eyes is common for the first few days.'],
        ['q' => 'When will the new brows grow?',
         'a' => 'In stages. The hairs placed on the day normally drop out within the first few weeks, which is expected. From about three to four months new hairs start to come through, patchily, and the brow takes roughly eight to twelve months to settle into its shape. Results vary.'],
        ['q' => 'How often will I need to trim the new hairs?',
         'a' => 'Expect to trim every week or two for as long as the hairs grow. They came from the scalp and carry on growing like scalp hair, well past the length at which your own brow hair stops.'],
        ['q' => 'How is the brow shape decided?',
         'a' => 'With you, before anything is taken. The shape is drawn on, checked in a mirror and adjusted: where each brow begins, the height of the arch, how full the middle is and how the end thins out.'],
        ['q' => 'Why not make both brows identical?',
         'a' => 'Because the two halves of a face are never exact copies, and brows forced into mirror images tend to look drawn on. A balanced pair that fits your features is the goal; no particular look can be promised.'],
        ['q' => 'Will I need a second session?',
         'a' => 'Many people need just one. A second, smaller sitting is sometimes used to adjust the outline or thicken a sparse section after the first has grown in, and it is likelier when the brow was built on scar tissue. If one is expected, you are told at the planning stage.'],
        ['q' => 'Can I have an eyebrow transplant with alopecia areata?',
         'a' => 'Only once it has been quiet for a long time. Alopecia areata is the immune system targeting hair follicles, and moved follicles are no safer from it than the originals, so active disease is treated first and grafting waits.'],
        ['q' => 'My outer brows have thinned. Could it be my thyroid?',
         'a' => 'It can be. Loss from the outer end of the brow is one recognised sign of thyroid trouble, though it has other causes too. The thyroid is checked and treated first, since brow hair often returns once it is.'],
        ['q' => 'How does a transplant differ from microblading?',
         'a' => 'Microblading is cosmetic tattooing: fine strokes of pigment that look like hairs but never grow, and that fade and need redoing. A transplant relocates living follicles, so real hair grows, but it takes months to show and has to be trimmed for life. The cause of your sparse brows usually points to one or the other.'],
        ['q' => 'Do patients come from across Delhi?',
         'a' => 'Yes, from anywhere in the city, with every appointment at our single clinic in Rohini, North-West Delhi: the assessment, the brow design, the procedure and the reviews. A list of the areas we serve sits at the foot of the page.'],
        ['q' => 'Can I WhatsApp photos of my brows first?',
         'a' => 'Yes. Clear daylight photographs of both brows, from the front and each side, let the clinic give you a first response, but the shape, the number of grafts and the price are only worked out when you are seen in person.'],
    ],
    'faq_about' => 'brows, skin, health or budget',

    'consult' => [
        'heading' => 'Book an Eyebrow Transplant Consultation in Delhi',
        'intro'   => 'At the Rohini clinic you learn what is behind your thin brows, look at a suggested shape pencilled on in a mirror and talk through the lifelong trimming before making any decision. You do not have to book anything on the day.',
    ],

    'schema_type' => 'procedure',
    'schema'      => [
        'name'              => 'Eyebrow Transplant',
        'description'       => 'An eyebrow transplant moves single hairs from the back of the scalp into sparse, over-plucked or scarred brows, following a shape agreed with the patient beforehand, as a day case at DenceSpot’s Rohini clinic in Delhi.',
        'alternateName'     => ['Eyebrow Transplant in Delhi', 'Eyebrow hair transplant', 'Eyebrow hair restoration'],
        'procedureType'     => 'https://schema.org/SurgicalProcedure',
        'bodyLocation'      => 'Eyebrow',
        'howPerformed'      => 'Hairs are harvested from the back of the scalp and separated under magnification into single-hair grafts, then placed almost flat to the skin: upward near the nose, outward through the body and downward at the tail. It takes a few hours, under local anaesthetic, at the Rohini clinic in Delhi, and the patient goes home the same day.',
        'preparation'       => 'Assessment of why the brow hair is missing, with active alopecia areata, thyroid disease and inflamed skin ruled out or treated first; a check of current medicines; and a brow outline pencilled on, viewed in a mirror and agreed before the procedure.',
        'followup'          => 'Written aftercare for the first week, then photographed reviews at the Rohini clinic during shedding and regrowth, with guidance on trimming once growth starts.',
        'expectedPrognosis' => 'The placed hairs normally fall out in the first few weeks, new growth usually appears from three to four months, and the brow takes about eight to twelve months to reach its settled shape. Because the hairs behave like scalp hair, they need trimming for life. Results differ between people and no particular look can be promised.',
    ],

    'area' => [
        'lead'            => 'An eyebrow transplant there starts with the reason for your sparse brows and a shape drawn on your face, and the estimate is in writing before any date is booked.',
        'feats'           => [['search', 'Cause checked first'], ['pencil', 'Shape agreed in a mirror'], ['doc', 'Written estimate first']],
        'heading'         => 'Eyebrow Transplant for {area} Residents',
        'visits_line'     => 'The assessment, the brow design, the procedure and the reviews take place at the Rohini clinic.',
        'day_heading'     => 'On the Procedure Day',
        'day'             => 'Have a normal meal before setting out from {area} and carry a list of the medicines you take. The procedure takes a few hours and you go home the same day; the brows will look crusted and may be swollen for about a week, so plan the journey back by cab rather than on a two-wheeler.',
        'visits_intro'    => 'An assessment with the brow design, the procedure day, then photographed reviews through shedding and regrowth — all at the Rohini clinic.',
        'visit_icons'     => [['search', 'Assessment First'], ['pencil', 'Shape Drawn and Agreed'], ['calendar', 'Home the Same Day'], ['camera', 'Reviews Through Regrowth']],
        'options_heading' => 'Eyebrow Transplant at the Rohini Clinic',
        'options_html'    => 'Single hairs from the back of the scalp are set into the brow one at a time, almost flat to the skin and in the direction of each part of the brow. Because they behave like scalp hair, they will need regular trimming from then on. <a href="{hub}#options">How it compares with microblading</a>.',
        'cost_heading'    => 'How an Eyebrow Transplant Is Priced',
        'cost_intro'      => 'No fixed price applies: the estimate depends on the number of grafts in the brow shape you agree, one brow or both and any scar work, and you have it in writing before any date is booked.',
        'faqs'            => [
            ['q' => 'Is there a DenceSpot clinic in {area}?',
             'a' => 'No. Patients from {area} are seen at DenceSpot’s Delhi clinic in Rohini, North-West Delhi, for every step from the first assessment to the last review. The Directions button opens the location on Google Maps.'],
            ['q' => 'How do I get to the Rohini clinic from {area}?',
             'a' => '{route} After the procedure, a cab or a lift home spares you a helmet close to fresh grafts.'],
            ['q' => 'How many trips to Rohini will I need?',
             'a' => 'Usually an assessment with the brow design, the procedure day and several reviews over the following months as the hairs shed and regrow. Your plan gives the dates, which makes the trips from {area} easier to arrange.'],
            ['q' => 'Does living in {area} change the cost?',
             'a' => 'No. The figure comes from the grafts in your agreed design and is the same wherever you live; you get it in writing after the assessment. <a href="/hair-transplant-cost-in-rohini">Hair transplant cost in Rohini</a> explains graft-based pricing.'],
            ['q' => 'How soon can I be back at work in {area}?',
             'a' => 'Many people take about a week, because the brows carry small crusts and the eyes can be swollen at first. Brow make-up and threading wait until a review clears them.'],
            ['q' => 'Will I have to trim the new hairs?',
             'a' => 'Yes, usually every week or two, for life, because hair from the scalp keeps growing past brow length. If regular trimming does not fit your life, it is better to know that before choosing surgery.'],
            ['q' => 'Can I send photos before travelling to Rohini?',
             'a' => 'Yes. Send clear daylight photographs of both brows to the clinic on WhatsApp. The shape and estimate are worked out only when you are seen in person.'],
        ],
        'consult_intro'   => 'Choose a convenient day for an assessment at the Rohini clinic. You find out why your brows are sparse, see a suggested shape on your face and hear what the trimming involves; you are not asked to commit on the day.',
        'descriptions'    => [
            'Eyebrow transplant for patients from {area} at DenceSpot’s clinic in Rohini, Delhi: brow design, recovery, trimming, the route, cost and FAQs.',
            'Eyebrow transplant for {area} at DenceSpot’s Rohini clinic, Delhi: brow design, recovery, cost and FAQs.',
            'Eyebrow transplant for {area} at DenceSpot’s Rohini clinic: design, cost and FAQs.',
        ],
    ],
];
