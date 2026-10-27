<?php
/**
 * /dr-nyra — Dr. Nyra's profile, the page for "hair transplant surgeon in
 * Rohini" (client, 27 Oct 2026). She consults at both clinics and the page
 * lists both, Rohini first (DOCTORS['dr-nyra']['city']). Layout and schema:
 * includes/doctor-profile.php.
 *
 * Everything below is on record in DOCTORS or from the clinic (Aug and 25 Oct
 * 2026): MBBS (Dr. D. Y. Patil Medical College), MD (Dermatology), three years
 * in Germany, 8 years in all, and that she plans and performs her own cases.
 * Still withheld for want of evidence: a fellowship, ISHRS membership, case
 * counts and success rates (see DOCTORS in config.php).
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';
require_once __DIR__ . '/includes/doctor-profile.php';

$key = 'dr-nyra';
$doc = DOCTORS[$key];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair Transplant in Delhi', 'url' => '/hair-transplant-in-delhi'],
    ['name' => $doc['name']],
];

$faqs = [
    ['q' => 'Is Dr. Nyra a hair transplant surgeon in Rohini?',
     'a' => 'Yes. Dr. Nyra holds an MBBS and an MD in Dermatology and sees hair transplant patients at DenceSpot’s Rohini clinic in Delhi. When she examines you, she also plans your transplant and performs it.'],
    ['q' => 'What are Dr. Nyra’s qualifications and experience?',
     'a' => 'An MBBS from Dr. D. Y. Patil Medical College and an MD in Dermatology, followed by three years of clinical work in Germany — two at Bio Hair Clinic and one at St. Georg Klinikum Eisenach. She has 8 years of experience in all.'],
    ['q' => 'Does Dr. Nyra perform the hair transplant herself?',
     'a' => 'Yes. Graft extraction, site creation and placement are done by the doctor, not handed to a technician. You can ask for the operating doctor’s name to be written on your consent form.'],
    ['q' => 'Which hair transplant techniques does Dr. Nyra use?',
     'a' => 'FUE and DHI. Both take follicles one at a time from the back and sides of the scalp; they differ in how the grafts are placed, and many plans combine them — DHI along the hairline, FUE behind it. See <a href="/fue-hair-transplant-in-rohini">FUE hair transplant in Rohini</a> and <a href="/dhi-hair-transplant-in-rohini">DHI hair transplant in Rohini</a>.'],
    ['q' => 'Can Dr. Nyra treat hair fall without surgery?',
     'a' => 'Often, yes. As a dermatologist she looks for the cause first — thyroid, iron, hormones, stress or a scalp condition — and many patients are treated with medicines, <a href="/hair-prp-treatment-in-rohini">PRP</a> or other non-surgical care before, or instead of, a transplant.'],
    ['q' => 'How much does a hair transplant with Dr. Nyra cost?',
     'a' => 'It depends on the number of grafts, the technique and how complex your case is, so it is quoted after the examination rather than as a headline price. You get an itemised written estimate before any date is booked. The <a href="/hair-transplant-cost-in-rohini">hair transplant cost guide for Rohini</a> explains each factor.'],
    ['q' => 'Where does Dr. Nyra see patients?',
     'a' => 'At both DenceSpot clinics: <a href="/delhi-clinic">Rohini, Delhi</a> and <a href="/contact">Sector 39, Gurugram</a>. Both are open seven days a week, so you can choose whichever is easier to reach and ask which days she is consulting there.'],
    ['q' => 'How do I book a consultation with Dr. Nyra in Rohini?',
     'a' => 'Call or WhatsApp the Rohini clinic on ' . LOC_DELHI_PHONE_DISPLAY . ' (or the Gurugram clinic on ' . PHONE_DISPLAY . '), or use the form on this page and pick your clinic. Bring a list of your current medicines and any earlier reports.'],
    ['q' => 'How can I check a hair transplant surgeon’s registration in Delhi?',
     'a' => 'Ask the clinic for the doctor’s registration number and the medical council that issued it, then search for it on the National Medical Commission’s Indian Medical Register. A clinic should be able to give you the number straight away.'],
];

$title       = fit_title(
    $doc['name'] . ' | ' . doctor_headline($key),
    $doc['name'] . ': Hair Transplant Surgeon in Rohini'
);
$description = 'Dr. Nyra, MBBS, MD (Dermatology), is a hair transplant surgeon in Rohini, Delhi at DenceSpot Clinic: FUE and DHI, 8 years of experience.';

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
        'Dr. Nyra, MBBS, MD (Dermatology), is a hair transplant surgeon at DenceSpot Clinic in Rohini, Delhi, who plans and performs FUE and DHI hair transplants.',
        $crumbs,
        $faqs
    ),
];

$profile = [
    'lead'  => 'Dr. Nyra is a hair transplant surgeon in Rohini, Delhi, and the owner and chief consultant of DenceSpot Clinic, seeing patients at both its clinics: Rohini and Sector 39, Gurugram. She holds an MBBS and an MD in Dermatology, spent three years in clinical work in Germany, and when she examines you, she plans your transplant and performs it herself.',
    'chips' => [
        ['doc',      $doc['quals']],
        ['clock',    $doc['experience'] . ' of experience'],
        ['chart',    '3 years in Germany'],
        ['hairline', 'FUE & DHI hair transplant'],
        ['pin',      'Rohini & Gurugram clinics'],
    ],

    'about_h2' => 'About Dr. Nyra, Hair Transplant Surgeon in Rohini',
    'about'    => [
        'Dr. Nyra qualified MBBS at ' . e($doc['alumni']) . ' and went on to an MD in Dermatology. She then spent three years in clinical work in Germany: two at Bio Hair Clinic, where hair restoration surgery was her daily work, and one at St. Georg Klinikum Eisenach.',
        'Back in India she founded DenceSpot Clinic around one rule patients notice: the doctor who examines you plans your transplant and performs it. You are not assessed by one person, quoted by another and operated on by someone you meet on the day.',
        'As a dermatologist she looks at the whole scalp, not only the thinning patch. Hair loss with a treatable cause is treated first, and some patients need no procedure at all. When a transplant is the right step, the plan is built around how much donor hair you have and how your hair loss may change over the years.',
        'Dr. Nyra sees patients for hair transplant, hair fall and scalp conditions at both DenceSpot clinics: the <a href="/delhi-clinic">Rohini clinic</a> in Delhi and the <a href="/contact">Sector 39 clinic</a> in Gurugram. Both are open seven days a week; call either one to check her consultation days.',
    ],
    'particulars' => [
        'Qualification'   => $doc['quals'],
        'Medical school'  => $doc['alumni'],
        'Experience'      => $doc['experience'],
        'Training abroad' => '3 years of clinical work, Germany',
        'Role'            => 'Owner & Chief Consultant',
        'Consults at'     => 'Rohini, Delhi & Sector 39, Gurugram',
    ],

    'treat_h2'    => 'Treatments You Can Consult Dr. Nyra About in Rohini',
    'treat_intro' => 'Every treatment starts with an examination and a written plan. With her training in dermatology, the cause of your hair loss is diagnosed before anything is recommended.',
    'treatments'  => [
        ['/hair-transplant-in-rohini',    'Hair Transplant',     'FUE and DHI, planned around your donor area and done as a day case under local anaesthetic.', 'hairline'],
        ['/fue-hair-transplant-in-rohini', 'FUE Hair Transplant', 'Follicles taken one at a time from the back and sides, then placed into sites made beforehand.', 'list'],
        ['/dhi-hair-transplant-in-rohini', 'DHI Hair Transplant', 'Each graft set with an implanter pen, for close control of angle and depth along the hairline.', 'pencil'],
        ['/hairline-transplant-in-rohini', 'Hairline Transplant', 'Receding temples and a high frontal line, with the new hairline drawn and agreed first.', 'user'],
        ['/beard-transplant-in-rohini',    'Beard Transplant',    'Patchy cheeks, jawline, moustache or scars, filled with hair from your own scalp.', 'beard'],
        ['/hair-fall-treatment-in-rohini', 'Hair Fall Treatment', 'Thyroid, iron, hormones, stress or a scalp condition checked first, then treated medically.', 'search'],
    ],
    'more' => [
        '/crown-hair-transplant-in-rohini'     => 'Crown hair transplant',
        '/hair-transplant-for-women-in-rohini' => 'Hair transplant for women',
        '/hair-transplant-repair-in-rohini'    => 'Hair transplant repair',
        '/hair-prp-treatment-in-rohini'        => 'Hair PRP treatment',
        '/hair-transplant-cost-in-rohini'      => 'Hair transplant cost in Rohini',
        '/hair-transplant-in-gurgaon'          => 'Hair transplant in Gurgaon',
    ],

    'approach_h2'    => 'How Dr. Nyra Plans a Hair Transplant',
    'approach_intro' => 'What her way of working means for your case, from the first examination to the twelve-month review.',
    'approach'       => [
        ['search', 'Diagnosis before treatment',  'Hair loss with a reversible cause — thyroid, iron, a scalp condition, a recent illness — is found and treated first.'],
        ['scale',  'Donor hair treated as finite', 'Grafts taken today are not there in fifteen years. If taking them now would cost you later, you are told before you book.'],
        ['doc',    'A written plan, no pressure', 'You leave with the plan and estimate in writing. Nobody asks you to commit on the day, and nothing is added to the price later.'],
        ['user',   'The doctor does the surgery', 'Extraction, site creation and placement are done by Dr. Nyra. Ask any clinic who performs each step — answers vary.'],
        ['camera', 'Progress tracked in photos',  'Baseline and review photographs at a fixed angle and light, so growth is judged on evidence, not memory.'],
        ['info',   'Clear about limits',           'No density or timeline is promised, and you get a straight answer when the right advice is to wait or treat medically.'],
    ],

    'steps_h2' => 'Your Visit with Dr. Nyra, Step by Step',
    'steps'    => [
        ['chat',     'Consultation',         'Your history, medicines and goals, and what you have already tried.'],
        ['search',   'Scalp & Donor Check', 'The thinning area and donor zone examined under magnification and photographed.'],
        ['pencil',   'Plan & Hairline',     'Graft zones mapped and, for a transplant, the hairline drawn on your face and agreed.'],
        ['doc',      'Written Estimate',    'Technique, approximate grafts and an itemised cost in writing, with no date booked on the spot.'],
        ['calendar', 'Treatment & Reviews', 'A day-case procedure, written aftercare and photographed reviews through the first year.'],
    ],

    'check_h2'    => 'Choosing a Hair Transplant Surgeon in Rohini',
    'check_intro' => 'A hair transplant is surgery, and the doctor doing it should be a registered medical practitioner trained in the procedure. Whoever you see in Rohini or elsewhere in Delhi, these questions are worth asking before you book.',
    'check_note'  => 'A registration number can be checked on the National Medical Commission’s <a href="https://www.nmc.org.in/information-desk/indian-medical-register/" rel="noopener" target="_blank">Indian Medical Register</a>. More in <a href="/blog/who-can-legally-perform-a-hair-transplant-in-india">who can legally perform a hair transplant in India</a>.',
    'checks'      => [
        'Which doctor will examine me, and which doctor will operate?',
        'What is their registration number, and which council issued it?',
        'Which steps does the doctor perform, and which do technicians?',
        'How many grafts can my donor area safely give, now and later?',
        'Is the estimate itemised and in writing before I book a date?',
        'How are reviews and photographs handled over the first year?',
    ],

    'faq_h2' => 'Dr. Nyra: Frequently Asked Questions',
    'faqs'   => $faqs,

    'consult_h2'   => 'Book a Consultation with Dr. Nyra in Rohini or Gurugram',
    'consult_body' => 'Meet Dr. Nyra at either DenceSpot clinic for a scalp and donor examination, a straight answer on whether a transplant suits you, and an itemised written estimate. Nothing is booked on the day unless you choose to.',
    'form_source'  => 'dr-nyra',
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
