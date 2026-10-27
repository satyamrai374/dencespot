<?php
/**
 * /dr-akash — Dr. Akash's profile (client, 27 Oct 2026: aimed at "hair
 * transplant surgeon in Gurgaon"; he consults at both clinics and the page
 * lists both, Gurugram first). Layout and schema: includes/doctor-profile.php.
 *
 * On record (client, 25 and 27 Oct 2026): trained at UMCH Hamburg, a one-year
 * hair restoration fellowship at D. Y. Patil, 10 years of experience, sees
 * patients at both clinics. His recognised degree is not
 * (DOCTORS['dr-akash']['quals'] is null), so under IMC Regulations 2002
 * r.1.4.2 and r.7.20 the title, H1 and schema say "Hair Transplant Doctor",
 * and "hair transplant surgeon in Gurgaon" appears only as the patient's
 * search. doctor_ht_role() switches them to "Surgeon" once quals is set.
 *
 * Indexable since 27 Oct 2026 (client chose to index with "doctor" wording
 * rather than wait for the degree).
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';
require_once __DIR__ . '/includes/doctor-profile.php';

$key = 'dr-akash';
$doc = DOCTORS[$key];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair Transplant in Gurgaon', 'url' => '/hair-transplant-in-gurgaon'],
    ['name' => $doc['name']],
];

$faqs = [
    ['q' => 'Who is Dr. Akash at DenceSpot Gurgaon?',
     'a' => 'Dr. Akash is a hair transplant doctor at DenceSpot Clinic, seeing patients at its Sector 39 clinic in Gurugram and its Rohini clinic in Delhi. He trained at UMCH in Hamburg, completed a one-year fellowship in hair restoration at D. Y. Patil, and has 10 years of experience.'],
    ['q' => 'What is a fellowship in hair restoration?',
     'a' => 'A fellowship is a period of focused training in one field, taken after basic medical training. Dr. Akash’s lasted a year, at D. Y. Patil, in hair restoration. You can ask him about it, and about his experience with the technique planned for you, at your consultation.'],
    ['q' => 'What should I look for in a hair transplant surgeon in Gurgaon?',
     'a' => 'A medical registration you can verify, a clear answer on who performs each step, a graft number worked out from an examination rather than a photo, and an itemised written estimate. Read <a href="/blog/why-hair-transplant-quotes-vary">why hair transplant quotes vary</a> before comparing prices.'],
    ['q' => 'Which hair transplant techniques can I discuss with Dr. Akash?',
     'a' => 'FUE and DHI, the techniques used at the Sector 39 clinic. Harvesting is the same; DHI places each graft with an implanter pen, which helps along the hairline, while FUE suits larger areas. See <a href="/fue-hair-transplant-in-gurgaon">FUE hair transplant in Gurgaon</a> and <a href="/dhi-hair-transplant-in-gurgaon">DHI hair transplant in Gurgaon</a>.'],
    ['q' => 'Is a hair transplant the only option?',
     'a' => 'No. Early thinning and shedding often respond to medical treatment or <a href="/hair-prp-treatment-in-gurgaon">PRP</a>, and some hair loss has a cause, such as low iron or a thyroid problem, that needs treating first. A transplant is considered once the pattern has settled and the donor area can cover the plan.'],
    ['q' => 'How much does a hair transplant cost in Gurgaon?',
     'a' => 'It depends on the number of grafts, the technique and the complexity of your case, so it is quoted after the examination. The estimate is itemised and in writing before you book. The <a href="/hair-transplant-cost-in-gurgaon">Gurgaon cost guide</a> sets out the factors and general graft bands.'],
    ['q' => 'How do I book a consultation with Dr. Akash?',
     'a' => 'Call or WhatsApp the Gurugram clinic on ' . PHONE_DISPLAY . ' or the Rohini clinic on ' . LOC_DELHI_PHONE_DISPLAY . ' and ask for Dr. Akash, or send the form on this page with your preferred clinic. The Gurugram clinic is on Sector 39 Road, ' . NAP_LANDMARK . '; both are open seven days a week.'],
];

$title       = fit_title(
    $doc['name'] . ' | ' . doctor_headline($key) . ' | DenceSpot',
    $doc['name'] . ' | ' . doctor_headline($key)
);
$description = 'Dr. Akash is a ' . strtolower(doctor_ht_role($doc)) . ' at DenceSpot Clinic, Sector 39 Gurgaon: trained at UMCH Hamburg, hair restoration fellowship, 10 years’ experience.';

$page = [
    'title'       => $title,
    'description' => $description,
    'url'         => $doc['url'],
    'location'    => $doc['city'],
    'body_class'  => 'tx-rich',
    'og_type'     => 'profile',
    'nav_active'  => '/about-us',
    'crumbs'      => $crumbs,
    'schema'      => doctor_profile_schema(
        $key,
        $title,
        'Dr. Akash is a ' . strtolower(doctor_ht_role($doc)) . ' at DenceSpot Clinic, Sector 39, Gurugram, trained at UMCH Hamburg, with a one-year hair restoration fellowship at D. Y. Patil and 10 years of experience.',
        $crumbs,
        $faqs
    ),
];

$profile = [
    'lead'  => 'Dr. Akash is a ' . strtolower(doctor_ht_role($doc)) . ' at DenceSpot Clinic in Sector 39, Gurgaon, and also sees patients at the clinic’s Rohini branch in Delhi. He trained at UMCH in Hamburg, completed a one-year fellowship in hair restoration at D. Y. Patil, and has 10 years of experience.',
    'chips' => [
        ['clock',    $doc['experience'] . ' of experience'],
        ['hairline', 'Hair restoration fellowship'],
        ['chart',    'Trained at UMCH, Hamburg'],
        ['pin',      'Gurugram & Rohini clinics'],
    ],

    'about_h2' => 'About Dr. Akash, ' . doctor_ht_role($doc) . ' in Gurgaon',
    'about'    => [
        'Dr. Akash trained at ' . e($doc['alumni']) . ' in Germany, and later completed a one-year fellowship in hair restoration at D. Y. Patil. He has 10 years of experience.',
        'He sees patients for hair transplant and hair loss at both DenceSpot clinics: the <a href="/contact">Gurugram clinic</a> on Sector 39 Road in Jharsa, ' . e(NAP_LANDMARK) . ', and the <a href="/delhi-clinic">Rohini clinic</a> in Delhi.',
        'His consultations follow the clinic’s order of work: the cause of the hair loss first, then the donor area, then the plan. A transplant is offered when the pattern has settled and the back of the head can supply enough grafts; otherwise medical treatment or PRP comes first.',
        'Before anything is booked, you receive the technique, an approximate graft range and an itemised estimate in writing. Ask either clinic which days Dr. Akash consults there.',
    ],
    'particulars' => [
        'Qualification' => $doc['quals'],
        'Trained at'    => $doc['alumni'],
        'Fellowship'    => $doc['fellowship'],
        'Experience'    => $doc['experience'],
        'Consults at'   => 'Sector 39, Gurugram & Rohini, Delhi',
        'Appointments'  => PHONE_DISPLAY . ' · ' . LOC_DELHI_PHONE_DISPLAY,
    ],

    'treat_h2'    => 'Hair Treatments with Dr. Akash in Gurgaon',
    'treat_intro' => 'The treatments Dr. Akash sees patients for at the Sector 39 clinic. Each starts with an examination; surgery is one option among several, not the default.',
    'treatments'  => [
        ['/hair-transplant-in-gurgaon',       'Hair Transplant',       'FUE and DHI under local anaesthetic as a day case, planned around your donor area.', 'hairline'],
        ['/fue-hair-transplant-in-gurgaon',   'FUE Hair Transplant',   'Grafts taken one at a time with a fine punch; efficient across the crown and mid-scalp.', 'list'],
        ['/dhi-hair-transplant-in-gurgaon',   'DHI Hair Transplant',   'Each graft set with an implanter pen in one movement, often chosen for the hairline.', 'pencil'],
        ['/hairline-transplant-in-gurgaon',   'Hairline Transplant',   'Receding temples and a high frontal line, with a hairline designed to suit you as you age.', 'user'],
        ['/crown-hair-transplant-in-gurgaon', 'Crown Hair Transplant', 'Thinning at the vertex, planned with future loss and donor supply in mind.', 'search'],
        ['/hair-prp-treatment-in-gurgaon',    'Hair PRP Treatment',    'For early thinning where follicles are still alive, usually as part of a wider plan.', 'heart'],
    ],
    'more' => [
        '/beard-transplant-gurgaon'            => 'Beard transplant',
        '/unshaven-hair-transplant-in-gurgaon' => 'Unshaven hair transplant',
        '/hair-transplant-repair-in-gurgaon'   => 'Hair transplant repair',
        '/hair-fall-treatment-in-gurgaon'      => 'Hair fall treatment',
        '/hair-transplant-cost-in-gurgaon'     => 'Hair transplant cost in Gurgaon',
        '/hair-transplant-results-gurgaon'     => 'Before and after results',
        '/hair-transplant-in-delhi'            => 'Hair transplant in Delhi',
    ],

    'approach_h2'    => 'How Dr. Akash Approaches Hair Restoration',
    'approach_intro' => 'The order of work at both DenceSpot clinics, and what it means for your plan.',
    'approach'       => [
        ['search',   'Cause before treatment',       'Shedding, thinning and patchy loss have different causes. The cause is found before a treatment is chosen.'],
        ['scale',    'Donor area mapped',            'Density at the back and sides is measured, so the plan never asks more of it than it can give.'],
        ['hairline', 'A hairline for the long term', 'The hairline is drawn on your face to suit how you are likely to look in ten or twenty years, and agreed with you.'],
        ['settings', 'Technique chosen by zone',     'FUE, DHI or a mix, depending on the area, your hair type and how short you keep it.'],
        ['rupee',    'One written estimate',         'The full cost, itemised, before you choose a date — not a per-graft rate that grows later.'],
        ['camera',   'Reviews with photographs',     'Baseline and follow-up photographs through the first year, so progress is measured.'],
    ],

    'steps_h2' => 'Your Visit with Dr. Akash, Step by Step',
    'steps'    => [
        ['phone',    'Book a Slot',         'Call or WhatsApp the Sector 39 clinic and ask for Dr. Akash.'],
        ['search',   'Scalp Assessment',    'Thinning zones and donor density checked under magnification and photographed.'],
        ['pencil',   'Design & Plan',       'Graft zones mapped and, for a transplant, the hairline drawn and agreed.'],
        ['doc',      'Written Estimate',    'Technique, graft range and an itemised cost to take home and decide on.'],
        ['calendar', 'Procedure & Reviews', 'A day case under local anaesthetic, then reviews through the first year.'],
    ],

    'check_h2'    => 'How to Choose a Hair Transplant Surgeon in Gurgaon',
    'check_intro' => 'Gurgaon has no shortage of hair transplant clinics, and prices and claims vary widely. Before you choose a surgeon, here or anywhere else, check the points that decide how the procedure actually goes.',
    'check_note'  => 'You can check a registration number on the NMC’s <a href="https://www.nmc.org.in/information-desk/indian-medical-register/" rel="noopener" target="_blank">Indian Medical Register</a>. See also <a href="/blog/who-can-legally-perform-a-hair-transplant-in-india">who can legally perform a hair transplant in India</a>.',
    'checks'      => [
        'Is the surgeon on the medical register, with a number you can verify?',
        'Who performs the extraction, site-making and graft placement?',
        'Was your graft count worked out from an examination of your scalp?',
        'Does the plan leave donor hair for future thinning?',
        'Is the full cost in writing, with nothing added on the day?',
        'Whom do you call if something worries you after surgery?',
    ],

    'faq_h2' => 'Dr. Akash: Frequently Asked Questions',
    'faqs'   => $faqs,

    'consult_h2'   => 'Book a Consultation with Dr. Akash in Gurgaon or Rohini',
    'consult_body' => 'See Dr. Akash at either DenceSpot clinic for a scalp and donor assessment, a hairline drawn on your own face if a transplant suits you, and an itemised written estimate. Nothing is booked unless you choose to.',
    'form_source'  => 'dr-akash',
    'form_options' => [
        'Hair transplant (FUE / DHI)',
        'Hairline or crown transplant',
        'Beard or eyebrow transplant',
        'Hair fall treatment',
        'Hair PRP / GFC',
        'Not sure — please advise',
    ],
];

require __DIR__ . '/includes/header.php';

echo doctor_profile_page($key, $profile);

require __DIR__ . '/includes/footer.php';
