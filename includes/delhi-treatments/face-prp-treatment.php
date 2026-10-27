<?php
/**
 * Copy for /face-prp-treatment-in-delhi and its area pages (schema:
 * includes/delhi-treatment-pillar.php). Facts as on /face-prp-treatment-in-rohini,
 * written fresh, with its evidence limits. Skin family: links go to skin pages
 * only. No session counts, prices, devices, brands, before/after photos or
 * doctor named.
 */

declare(strict_types=1);

return [
    'title'          => [
        'Face PRP Treatment in Delhi: Downtime & Cost | DenceSpot',
        'Face PRP Treatment in Delhi: Downtime & Cost',
        'Face PRP Treatment in Delhi | DenceSpot Rohini',
    ],
    'description'    => 'Face PRP treatment in Delhi at DenceSpot’s Rohini clinic: what it may and may not do, the limited evidence, sessions, downtime, cost and FAQs.',
    'keywords'       => ['face prp treatment in delhi', 'prp facial in delhi', 'prp for face in delhi', 'face prp cost in delhi', 'prp skin treatment delhi', 'face prp treatment in rohini'],
    'form_treatment' => 'Skin care',
    'form'           => ['Face PRP treatment', 'Skin texture or fine lines', 'Acne, marks or pigmentation', 'Other skin concern', 'Not sure — please advise'],

    'hero' => [
        'lead'  => 'Platelet-rich plasma from your own blood, used to try to improve skin texture, fine lines and dullness — offered at our Rohini clinic only after a doctor has checked it fits your concern, with the limits of the evidence explained first.',
        'feats' => [['search', 'Suitability checked first'], ['scale', 'Modest, gradual change'], ['camera', 'Baseline photographs'], ['doc', 'Course quoted in writing']],
    ],

    'about' => [
        'heading' => 'How Face PRP Works',
        'paras'   => [
            'A small amount of your blood is spun so that the plasma rich in platelets separates; platelets hold growth factors that take part in repairing tissue. That plasma is then injected into the skin of the face, or applied straight after microneedling so it passes through the tiny channels the needling makes, over a course of sessions spaced some weeks apart.',
            'The evidence behind it is limited: most studies are small, prepare the plasma in different ways and judge results mainly from photographs or patients’ own ratings. Where it helps, the change in texture and skin quality is modest and slow, and some people notice little. In Delhi, face PRP is assessed, given and reviewed at DenceSpot’s Rohini clinic by registered medical practitioners.',
        ],
        'cta'     => ['#suitability', 'Check Whether It Fits Your Concern'],
        'glance'  => [
            ['heart', 'mint', 'Source', 'Plasma prepared from your own blood'],
            ['calendar', 'violet', 'Course', 'Sessions spaced some weeks apart'],
            ['clock', 'sky', 'Downtime', 'A day or two of redness and slight swelling'],
            ['camera', 'amber', 'Judged on', 'Photographs in the same light and angle'],
        ],
    ],

    'middle' => [
        'heading' => 'Face PRP by Skin Concern',
        'sub'     => 'A general guide; your assessment decides.',
        'cols'    => ['Concern', 'Can face PRP help?'],
        'rows'    => [
            ['Uneven texture, fine lines', 'May be considered'],
            ['Dull, tired-looking skin', 'May be considered'],
            ['Lost volume or hollows', 'No; it adds no volume'],
            ['Sagging skin, deep folds', 'No; it does not lift'],
            ['Active acne', 'No; treated another way'],
            ['Pigmentation or melasma', 'Not on its own'],
        ],
        'note'    => 'Where PRP may help, any change is modest, builds over weeks to months and fades without maintenance.',
    ],
    'results' => false,

    'why' => [
        'intro'  => 'What a face PRP course at the Rohini clinic involves, up to the point where it is continued or stopped.',
        'icons'  => [
            ['search', 'Concern Assessed Before Any Session'],
            ['scale', 'Evidence Limits Explained'],
            ['heart', 'Medicines Reviewed First'],
            ['camera', 'Same Light, Same Angle Photographs'],
            ['doc', 'Course Quoted in Writing'],
            ['pin', 'Rohini Clinic, North-West Delhi'],
        ],
        'media'  => 'map',
    ],

    'suit' => [
        'heading' => 'Who Face PRP May Suit, and Who Should Wait',
        'intro'   => 'Face PRP answers a narrow set of skin concerns. The assessment checks whether yours is one of them, and whether anything in your health means it should not go ahead.',
        'yes'     => ['heading' => 'May Be Reasonable For', 'items' => [
            'Uneven skin texture or fine lines',
            'Skin that looks dull or tired',
            'Someone who prefers a treatment made from their own blood',
            'Anyone content with a slow, modest change',
            'People willing to judge it on photographs',
        ]],
        'wait'    => ['heading' => 'Not Advised, or Needs Care', 'items' => [
            'Infection or inflammation where it would be given',
            'Certain blood, platelet or clotting disorders',
            'Some cancers',
            'Blood thinners the doctor has not yet reviewed',
            'Pregnancy or breastfeeding, assessed case by case',
        ]],
        'note'    => ['heading' => 'When Something Else Would Serve You Better', 'paras' => [
            'PRP does not lift sagging skin, add volume or soften deep folds, and it is not a treatment for active acne or for pigmentation on its own. If that is what bothers you most, the assessment will say so plainly; <a href="/skin-treatment-in-rohini">skin treatment</a> covers how acne, marks, pigmentation and melasma are handled.',
            'Whatever you decide about PRP, sunscreen every day and a short, steady routine remain the foundation for skin over the long run; PRP is at most an addition to them.',
        ]],
    ],

    'options' => [
        'eyebrow'         => 'Treatment options',
        'heading'         => 'Injected PRP and PRP With Microneedling',
        'intro'           => 'The plasma is prepared the same way for both. What differs is how it reaches the skin, and which one suits you is settled at the assessment.',
        'cards'           => [
            ['heart', 'mint', 'Injected Face PRP', 'Once the skin is numbed, the plasma goes in by injection over the chosen areas. Tiny bruises at the injection points are common and fade.', [
                'Plasma placed directly into the skin',
                'Numbing preparation first',
                'Redness and swelling for a day or two',
            ]],
            ['settings', 'violet', 'PRP With Microneedling', 'The skin is microneedled first and the plasma applied straight afterwards, so it enters through the tiny channels the needling leaves. Whether that combination suits your skin is a decision for the assessment.', [
                'Plasma applied, not injected',
                'Given in the same session as the needling',
                'Suitability decided at the assessment',
            ]],
        ],
        'choose'          => ['heading' => 'What the Plan Takes Into Account', 'items' => [
            'What you want changed, and whether PRP can change it',
            'Your medicines, including anything affecting clotting',
            'Any infection or inflammation in the area',
            'Weddings or events to plan the sessions around',
            'Baseline photographs to judge it against',
        ]],
        'related_heading' => 'Other Skin Treatments at the Rohini Clinic',
        'related'         => [
            '/face-prp-treatment-in-rohini'        => 'Face PRP in Rohini',
            '/skin-treatment-in-rohini'            => 'Acne and pigmentation care',
            '/laser-hair-removal-in-rohini'        => 'Laser hair removal',
            '/blog/melasma-causes-and-treatment'   => 'Why melasma returns',
        ],
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'From Assessment to Review: A Face PRP Course',
        'intro'     => 'Five stages, all at the Rohini clinic. A course carries on only while the photographs show a change worth keeping.',
        'items'     => [
            ['search', 'Assessment', 'Your skin examined, your medicines reviewed and a plain answer on whether PRP fits your concern.'],
            ['camera', 'Baseline Photographs', 'Taken in a fixed position and light, so later change is measured against a record.'],
            ['heart', 'Blood Draw', 'A small sample from the arm, spun so the platelet-rich layer can be drawn off.'],
            ['settings', 'Treatment', 'A numbing preparation, then the plasma injected or applied after microneedling.'],
            ['chart', 'Review', 'New photographs in the same conditions; maintenance only if there is a change to keep.'],
        ],
        'note_html' => 'No before-and-after photographs are shown, because light, makeup, angle and expression alter how skin looks. If acne, marks or melasma are the bigger concern, <a href="/skin-treatment-in-rohini">skin treatment</a> usually comes first.',
    ],

    'aftercare' => [
        'eyebrow'      => 'The days after',
        'heading'      => 'After a Face PRP Session: The First Few Days',
        'intro'        => 'The day or two after a session is the least flattering part, so book sessions a few days before any important event. These are general points; follow your own aftercare advice wherever it differs.',
        'timeline'     => [
            'The first day or two: redness, mild swelling, tenderness and pinpoint bruises, which settle',
            'For a short time: no direct sun or sunbeds, saunas, steam or heavy exercise',
            'Until advised: hold off skincare acids and retinoids, and makeup on the day',
            'Weeks to months: any change in texture appears gradually; early plumpness is swelling',
        ],
        'tips_heading' => 'Planning Around the Delhi Calendar',
        'tips'         => [
            ['clock', 'mint', 'Summer sun', 'Direct sun is avoided briefly after a session; sunscreen stays in your routine every day.'],
            ['alert', 'violet', 'Smog and dust', 'Once your aftercare allows, cleanse gently in the evening and leave scrubs alone.'],
            ['shield', 'sky', 'Helmets and masks', 'Avoid pressing on tender skin, and keep helmet padding clean.'],
            ['calendar', 'amber', 'Weddings and festivals', 'Count back from the date so your last session falls a few days before it.'],
        ],
    ],

    'cost' => [
        'heading'  => 'Face PRP Treatment Cost in Delhi',
        'intro'    => 'Each session carries a price, so the cost of a course depends on how many sessions your plan holds. Prices are not listed online: the course is worked out at your assessment at the Rohini clinic and set down in writing before you commit.',
        'factors'  => [
            ['calendar', 'mint', 'Sessions in the course', 'Decided by your skin and your goal.'],
            ['list', 'violet', 'Areas treated', 'Agreed at the assessment and listed in your plan.'],
            ['chart', 'sky', 'Maintenance', 'Raised only when the photographs show a change.'],
            ['doc', 'amber', 'Other skin care', 'Any creams or other care listed on their own.'],
        ],
        'meta'     => 'Be wary of paying for a package before anyone has assessed your skin; a sensible course can be stopped if the review shows nothing worth continuing.',
        'links'    => [
            '/face-prp-treatment-in-rohini' => 'Face PRP in Rohini',
            '/cost-and-emi-options'         => 'EMI and payment',
        ],
        'estimate' => ['heading' => 'What the Written Quote Covers', 'items' => [
            'The number of sessions and their spacing',
            'The areas of the face to be treated',
            'Injected PRP or PRP with microneedling',
            'Maintenance, only if you respond',
            'How the course stops if nothing changes',
        ], 'note' => 'Third-party lenders may offer instalment options; ask about them at the consultation.'],
    ],

    'faqs' => [
        ['q' => 'What does face PRP treatment do?',
         'a' => 'Platelets taken from your own blood are concentrated and placed in the skin of the face; they carry growth factors that play a part in tissue repair. The aim is a modest improvement in texture, fine lines and dullness over weeks to months. It does not lift, add volume or treat active acne.'],
        ['q' => 'Does face PRP actually work?',
         'a' => 'The evidence is limited. Most studies are small, prepare and deliver the plasma in different ways, and judge results mostly from photographs or patients’ own ratings, so the size of any benefit is uncertain. Some people see a modest change in skin quality and some see little, which is why your course is judged against baseline photographs.'],
        ['q' => 'How many face PRP sessions will I need?',
         'a' => 'It works as a course rather than a one-off, with gaps of some weeks between sessions. The count is worked out at your assessment from your skin and your goal, not fixed in a package before anyone has seen you, and the course can stop if the review shows no change.'],
        ['q' => 'How much does face PRP cost in Delhi?',
         'a' => 'It is priced per session, so the cost of a course follows the number of sessions and the areas in your plan. At the Rohini clinic the course is quoted in writing after your assessment, before you agree to anything. Ask at the consultation whether paying in instalments through a third-party lender is an option; see <a href="/cost-and-emi-options">cost and EMI options</a>.'],
        ['q' => 'Does face PRP hurt?',
         'a' => 'A numbing preparation goes on first, and most people then feel the injections as discomfort rather than real pain, though this varies. The blood sample is taken from the arm like an ordinary blood test.'],
        ['q' => 'What is the downtime after face PRP?',
         'a' => 'Expect a day or two of redness and slight swelling, and perhaps tiny bruises at the injection points; these fade. You can work the same day, but leave a few days between a session and any important event. For a short spell, keep away from strong sun, sunbeds, saunas, steam rooms, hard workouts, and acid or retinoid skincare.'],
        ['q' => 'When will I see results, and how long do they last?',
         'a' => 'Not straight after a session: any plumpness in the first days is swelling, not a result. Where PRP helps, texture and skin quality change gradually over weeks to months. Because skin goes on ageing, a gain does not hold by itself; top-up sessions come up only when the photographs show something worth keeping.'],
        ['q' => 'Face PRP or fillers: which do I need?',
         'a' => 'They answer different problems. Fillers add volume to hollows; PRP adds none and is aimed at skin quality instead. Which suits you depends on what you want changed, and that is the first question at the assessment.'],
        ['q' => 'Can face PRP help acne or pigmentation?',
         'a' => 'Not as a main treatment. It is not used for active acne, and it does not clear pigmentation or melasma on its own. Those are usually treated first with prescription creams and daily sunscreen, and acne scars are assessed separately once the acne has settled. See <a href="/skin-treatment-in-rohini">skin treatment</a>.'],
        ['q' => 'Who should not have face PRP?',
         'a' => 'It is not advised with infection or inflammation in the area to be treated, certain blood, platelet or clotting disorders, or some cancers, and it waits until the doctor has reviewed any blood thinners. Pregnancy and breastfeeding are considered case by case. If PRP is not suitable, you will be told what might help instead.'],
        ['q' => 'Can face PRP be combined with microneedling?',
         'a' => 'Often, yes. Instead of being injected, the plasma can be applied to the skin straight after microneedling, entering through the tiny channels it creates. Whether that combination fits your skin is decided at the assessment.'],
        ['q' => 'Which side effects need a call to the clinic?',
         'a' => 'Redness that spreads, pain that increases, warmth or a fever after a session. Any injection carries a small risk of infection, so if one of these appears, contact the Rohini clinic by phone or WhatsApp that same day instead of holding on until the review. Bruising can be more marked if you take medicines that affect clotting.'],
        ['q' => 'What should I tell the doctor before a session?',
         'a' => 'Give a full list of medicines and supplements, flagging blood thinners and anything else that changes how your blood clots, and mention the skincare you use. Any change to a prescribed medicine is for the doctor to decide, so do not alter one yourself ahead of a session.'],
        ['q' => 'Do I have to come to Rohini for face PRP?',
         'a' => 'Yes. Face PRP in Delhi is offered at DenceSpot’s Rohini clinic in North-West Delhi, our only clinic in the city. Patients from other areas travel there for the assessment, each session and the reviews; you will find the areas we serve below, just above the footer.'],
        ['q' => 'Can I share photos on WhatsApp first?',
         'a' => 'Yes. Send a few photos taken in daylight, with no filter or makeup, and say what you would like changed; the clinic can tell you whether an assessment is worthwhile. Only an in-person examination can confirm whether PRP suits your skin.'],
    ],
    'faq_about' => 'skin, medicines or budget',

    'consult' => [
        'heading' => 'Book a Face PRP Consultation in Delhi',
        'intro'   => 'Tell the doctor at the Rohini clinic what bothers you about your skin. You get a straight view on whether PRP can address it, what else might, and what a course would involve, before anything is booked.',
    ],

    'schema_type' => 'therapy',
    'schema'      => [
        'name'              => 'Face PRP Treatment',
        'description'       => 'A course of facial treatments in which plasma rich in platelets, prepared from the patient’s blood, is injected into the skin or applied after microneedling to target texture, fine lines and dullness, at the Rohini clinic in Delhi.',
        'alternateName'     => ['Face PRP Treatment in Delhi', 'Facial platelet-rich plasma therapy', 'PRP for facial skin'],
        'bodyLocation'      => 'Face',
        'howPerformed'      => 'Blood drawn from the arm is centrifuged and the platelet-rich layer of plasma collected. After a numbing preparation it is injected into the skin of the areas being treated, or applied immediately after microneedling, in sessions spaced some weeks apart.',
        'preparation'       => 'Assessment of the skin and the patient’s goal; review of history and all medicines, including blood thinners and drugs affecting clotting; exclusion of infection or inflammation in the area; baseline photographs in a fixed position and light.',
        'followup'          => 'At review, photographs are retaken under the baseline conditions. The course goes on, with maintenance, only if the change is worth keeping, and ends if not.',
        'expectedPrognosis' => 'Evidence is limited, coming mostly from small studies with differing preparation methods and photographic or self-rated outcomes. Any improvement in texture or skin quality is modest, develops over weeks to months and fades without maintenance; some patients notice little change. It does not lift sagging skin, restore volume or treat active acne. Redness, swelling and bruising are common; infection is uncommon.',
    ],

    'area' => [
        'lead'            => 'Face PRP there begins with an assessment of your skin and of what you want changed, with the limits of the evidence explained and any course quoted in writing first.',
        'feats'           => [['search', 'Suitability checked first'], ['camera', 'Judged on photographs'], ['doc', 'Course quoted in writing']],
        'heading'         => 'Face PRP Treatment for Patients in {area}',
        'visits_line'     => 'The assessment, the baseline photographs, each session and every review happen at the Rohini clinic.',
        'day_heading'     => 'On a Treatment Day',
        'day'             => 'Time goes on numbing the skin, taking blood, preparing the plasma and the treatment itself, so ask when booking how long to set aside. Redness and mild swelling usually last a day or two, so leave a few days between a session and any event in {area} you are dressing up for.',
        'visits_intro'    => 'An assessment with baseline photographs, then a course of sessions spaced some weeks apart, and reviews on photographs taken in the same light — all at the Rohini clinic.',
        'visit_icons'     => [['search', 'Assessment First'], ['camera', 'Baseline Photographs'], ['calendar', 'Sessions Some Weeks Apart'], ['chart', 'Review Before Continuing']],
        'options_heading' => 'Face PRP at the Rohini Clinic',
        'options_html'    => 'The plasma is either injected into the skin after a numbing preparation or applied straight after microneedling. It may modestly help texture, fine lines and dullness; it does not lift, add volume or treat active acne. <a href="{hub}#options">The two ways it is given</a>.',
        'cost_heading'    => 'How a Face PRP Course Is Priced',
        'cost_intro'      => 'Sessions are priced individually, so the course cost follows the number of sessions and the areas in your plan. It is worked out at the assessment and given to you in writing before you agree to anything.',
        'faqs'            => [
            ['q' => 'Will I be treated in {area} or in Rohini?',
             'a' => 'In Rohini. DenceSpot does not have a clinic in {area}, so you will come to our Rohini clinic in North-West Delhi for the assessment, each session and the reviews; the Directions button shows it on the map.'],
            ['q' => 'What is the easiest way to reach the clinic from {area}?',
             'a' => '{route} Check Google Maps or the DMRC journey planner for your exact starting point, or ask the clinic on WhatsApp.'],
            ['q' => 'How many trips from {area} does a course take?',
             'a' => 'One for the assessment and baseline photographs, then one for each session, with sessions spaced some weeks apart, and reviews along the way. The number of sessions is set at the assessment, so you can plan the journeys from {area} beforehand.'],
            ['q' => 'Does coming from {area} change the price?',
             'a' => 'No. Face PRP is priced per session and the quote follows your plan, not your address. It is given in writing after the assessment; see <a href="/cost-and-emi-options">cost and EMI options</a>.'],
            ['q' => 'Can I travel home straight after a session?',
             'a' => 'Yes. Nothing about a session stops you travelling or working, though redness, mild swelling and small bruises are usual for a day or two. Keep out of direct sun on the way, and avoid saunas and heavy exercise for a short time.'],
            ['q' => 'Is face PRP right for my skin concern?',
             'a' => 'Only for some concerns. It may modestly help texture, fine lines and dullness, but not sagging, lost volume, active acne or pigmentation on its own; those are covered under <a href="/skin-treatment-in-rohini">skin treatment</a> at the same clinic.'],
            ['q' => 'Can I send photos from {area} before booking?',
             'a' => 'Yes. Share unedited daylight photos of the areas you want to change with the Rohini clinic on WhatsApp. They help with a first reply, but suitability is decided face to face.'],
        ],
        'consult_intro'   => 'Pick a date for a face PRP assessment at the Rohini clinic. The doctor looks at your skin, explains what PRP may and may not change, and tells you whether another approach would serve you better before any course is planned.',
        'descriptions'    => [
            'Face PRP for {area} patients at DenceSpot’s Rohini clinic in Delhi: what it may do, its limits, sessions, downtime, the route and cost.',
            'Face PRP for {area} at DenceSpot’s Rohini clinic, Delhi: sessions, downtime, the route, cost and FAQs.',
            'Face PRP for {area} at DenceSpot’s Rohini clinic: sessions, cost and FAQs.',
        ],
    ],
];
