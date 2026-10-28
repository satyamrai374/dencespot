<?php
/**
 * Copy for the Gurugram alopecia areata area pages,
 * /alopecia-areata-treatment-in-<area> (schema:
 * includes/gurgaon-treatment-area-page.php). Facts as on
 * /alopecia-areata-treatment-in-gurgaon, written fresh. As there: no medicine
 * names or doses; PRP is not an established treatment and is not linked; no
 * hair transplant while the condition is active. No prices; the Gurugram
 * clinic only.
 */

declare(strict_types=1);

return [
    'form_treatment' => 'Hair fall treatment',
    'form'           => ['Alopecia areata, scalp', 'Patches in the beard or eyebrows', 'Patchy hair loss, not yet diagnosed', 'Second opinion', 'Not sure — please advise'],
    'faq_about'      => 'patches, other conditions or treatment',
    'results'        => false,

    'middle' => [
        'heading' => 'Alopecia Areata: Extent and Outlook',
        'sub'     => 'Patient education only; nobody can predict your own course.',
        'cols'    => ['Term or stage', 'What it means'],
        'rows'    => [
            ['Patchy alopecia areata', 'Separate round or oval bare patches'],
            ['Alopecia totalis', 'All scalp hair lost'],
            ['Alopecia universalis', 'Body hair, brows and lashes too'],
            ['Limited patches', 'Often regrow, sometimes untreated'],
            ['Extensive or long-standing', 'A less predictable outlook'],
            ['After regrowth', 'A new episode can follow'],
        ],
        'note'    => 'Totalis and universalis are wider forms of the same condition rather than separate diseases.',
    ],

    'steps' => [
        'eyebrow'   => 'How it works',
        'heading'   => 'From Diagnosis to Follow-Up for Alopecia Areata',
        'intro'     => 'Five stages in Sector 39; nothing is prescribed until the diagnosis is clear.',
        'items'     => [
            ['chat', 'History', 'How fast the patches came, whether it has happened before and how that ended, and any autoimmune illness among relatives.'],
            ['search', 'Examination', 'Scalp, eyebrows, beard and nails, partly to rule out fungal infection, traction, hair-pulling and scarring.'],
            ['doc', 'Screening if Indicated', 'Thyroid function or other bloods when your history suggests a linked condition.'],
            ['list', 'Choosing an Approach', 'Observation, local treatment for limited patches, or closely supervised care when loss is extensive, decided with you.'],
            ['camera', 'Photo Reviews', 'Baseline pictures repeated at every review, which shows regrowth, spread or a new episode clearly.'],
        ],
        'note_html' => 'Related reading: <a href="/blog/alopecia-barbae-patchy-beard-hair-loss">bare patches in the beard</a> and <a href="/blog/who-should-not-have-a-hair-transplant">when a transplant is the wrong step</a>.',
    ],

    'cost' => [
        'factors' => [
            ['search', 'mint', 'Number and size of patches', 'A small patch needs far less than loss across the scalp.'],
            ['calendar', 'violet', 'Visits for injections', 'Patches injected at intervals mean a visit each time.'],
            ['doc', 'sky', 'Screening and monitoring', 'Thyroid tests if indicated, and blood checks if supervised treatment is used.'],
        ],
        'links' => [
            '/cost-and-emi-options' => 'Cost and payment options',
            '/contact'              => 'Ask the clinic about costs',
        ],
    ],

    'related' => [
        '/alopecia-areata-treatment-in-gurgaon'         => 'Alopecia areata treatment in Gurgaon',
        '/hair-fall-treatment-in-gurgaon'               => 'Shedding all over the scalp',
        '/dandruff-treatment-in-gurgaon'                => 'Flaking and scalp infections',
        '/blog/alopecia-barbae-patchy-beard-hair-loss'  => 'Patchy beard hair loss',
        '/blog/who-should-not-have-a-hair-transplant'   => 'Who should not have surgery',
    ],

    'area' => [
        'lead'            => 'Patchy hair loss is first confirmed as alopecia areata, an autoimmune condition, rather than a fungal infection, hair-pulling or a scarring condition. Treatment then depends on how widespread it is, and no transplant is offered while the condition is active.',
        'feats'           => [['search', 'Mimics excluded first'], ['camera', 'Every patch on record'], ['shield', 'No surgery while active']],
        'heading'         => 'Patchy Hair Loss? Help for People From {area}',
        'visits_line'     => 'Diagnosis, any treatment of the patches and every photo review happen at DenceSpot’s Gurugram clinic, Sector 39.',
        'day_heading'     => 'Bring These to the First Visit',
        'day'             => 'Note when each patch appeared and in what order, and bring any photos from early on, details of earlier episodes and how they ended, any family history of thyroid or other autoimmune conditions, and your list of medicines. The first appointment is mainly talking and looking, so it fits into a working day and you can return to {area} afterwards.',
        'visits_intro'    => 'A first assessment, then scheduled photo reviews over the following months, plus visits at intervals if patches are injected, all in Sector 39, Gurugram.',
        'visit_icons'     => [['search', 'Clinical Diagnosis'], ['camera', 'Patches Photographed Each Visit'], ['calendar', 'Scheduled Reviews'], ['beard', 'Beard and Brows Examined Too']],
        'options_heading' => 'How Alopecia Areata Is Managed at the Gurugram Clinic',
        'options_html'    => 'The approach follows the extent. Limited patches may simply be watched, with photographs and a set review date, or treated with a preparation put on the patch or a series of injections into it. Extensive or long-standing loss may need treatment under close medical supervision, or onward referral. A thyroid or other autoimmune condition found on screening is treated alongside, and camouflage or a hairpiece can make the office day easier while treatment takes its course. PRP has no established role in this condition, and a transplant is not done while it is active. More on the <a href="{parent}">alopecia areata treatment in Gurgaon</a> page.',
        'cost_heading'    => 'What Alopecia Areata Care Costs, and Why It Varies',
        'cost_intro'      => 'Extent drives the cost. One or two small patches often need only the consultation, review visits and treatment aimed at the patch, while widespread disease brings more visits and closer supervision. You receive a written plan, with the cost, after the examination.',
        'faqs'            => [
            ['q' => 'Where do patients from {area} go for an assessment?',
             'a' => 'DenceSpot has one clinic in Gurugram: Sector 39 Road, Jharsa, opposite Medanta – The Medicity. Patients from {area} have their examination, any treatment and every review there.'],
            ['q' => 'Which way should I come from {area}?',
             'a' => '{route} Turn-by-turn guidance is a tap away on the Directions button, and the front desk can help over WhatsApp.'],
            ['q' => 'I have found a single bald patch. Should I come in from {area}?',
             'a' => 'It is reasonable to have it looked at. An examination separates alopecia areata from look-alikes such as a fungal infection, hair-pulling or scarring hair loss, each of which needs its own treatment. If it is alopecia areata and the patch is small, watching it with photographs may be all that is needed for now.'],
            ['q' => 'Will the hair grow back?',
             'a' => 'Often, but nobody can promise it. Limited patches have a reasonable chance of filling in, at times with no treatment at all. When loss is extensive, has lasted a long time, or involves the brows, lashes or body hair, the outlook is harder to call, and patches can return after regrowth.'],
            ['q' => 'Can I get a hair transplant for the patches?',
             'a' => 'Not while the condition is active, whether on the scalp, beard or eyebrows. The immune process can attack moved follicles just as it attacked the originals, and donor hair spent that way cannot be replaced. Only once the condition has been treated and stayed stable for a sustained period is surgery even discussed, and then with caution.'],
            ['q' => 'Is it contagious, or caused by something I did?',
             'a' => 'Neither. It cannot be caught from anyone, and it is not brought on by shampoo, oil, food or washing. It is an autoimmune condition with an inherited tendency, it is more common where there is a personal or family history of other autoimmune conditions, and usually no single trigger is found.'],
            ['q' => 'Will coming from {area} affect what I pay?',
             'a' => 'No. What you pay follows the extent of the condition and the approach you choose, and you get it in writing before anything begins. Ways to pay are listed under <a href="/cost-and-emi-options">payment and EMI options</a>.'],
        ],
        'consult_intro'   => 'Book a time at the Sector 39 clinic. The doctor examines the patches along with your beard, brows and nails, explains whether watching or treating makes more sense for you, and is clear about why surgery is off the table while the condition is active.',
        'descriptions'    => [
            'Alopecia areata treatment for {area} at DenceSpot’s Sector 39 clinic, Gurugram: patchy hair loss diagnosed, options, visits, cost and FAQs.',
            'Alopecia areata care for {area} at DenceSpot, Sector 39, Gurugram: diagnosis, options, cost and FAQs.',
            'Alopecia areata care for {area} at DenceSpot Gurugram: diagnosis and FAQs.',
        ],
    ],
];
