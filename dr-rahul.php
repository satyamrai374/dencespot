<?php
/**
 * /dr-rahul — Dr. Rahul's profile (client, 27 Oct 2026: aimed at "hair
 * transplant surgeon in Rohini"; he consults at both clinics and the page
 * lists both, Rohini first). Layout and schema: includes/doctor-profile.php.
 *
 * On record (client, 25 and 27 Oct 2026): Senior Resident at ESIC Hospital,
 * 11 years of experience, sees patients at both clinics. His recognised degree is
 * not (DOCTORS['dr-rahul']['quals'] is null; the client declined to add an
 * education line), so under IMC Regulations 2002 r.1.4.2 and r.7.20 the page
 * does not call him a surgeon or a specialist: the title, H1 and schema say
 * "Hair Transplant Doctor", and "hair transplant surgeon in Rohini" appears
 * only as the patient's search ("Questions to Ask…"). doctor_ht_role()
 * switches every one of those to "Surgeon" once quals is filled in.
 *
 * Indexable since 27 Oct 2026 (client chose to index with "doctor" wording
 * rather than wait for the degree).
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/schema.php';
require_once __DIR__ . '/includes/doctor-profile.php';

$key = 'dr-rahul';
$doc = DOCTORS[$key];

$crumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Hair Transplant in Delhi', 'url' => '/hair-transplant-in-delhi'],
    ['name' => $doc['name']],
];

$faqs = [
    ['q' => 'Who is Dr. Rahul at DenceSpot Rohini?',
     'a' => 'Dr. Rahul is a hair transplant doctor at DenceSpot Clinic, seeing patients at its Rohini clinic in Delhi and its Sector 39 clinic in Gurugram. He has more than 11 years of clinical experience and works as a Senior Resident at ESIC Hospital.'],
    ['q' => 'What does Dr. Rahul see patients for?',
     'a' => 'Hair loss and hair transplant: a receding hairline, thinning at the crown, diffuse thinning and patchy loss, and questions about FUE, DHI, PRP and medical treatment. Each visit starts with an examination, and the plan follows from what is found.'],
    ['q' => 'What should I ask a hair transplant surgeon in Rohini before booking?',
     'a' => 'Ask for the doctor’s registration number, who will perform each step of the surgery, how the graft number was worked out, and what the written estimate includes. A clinic that answers these plainly is easier to judge than one that leads with a price.'],
    ['q' => 'Which hair transplant techniques are available at the Rohini clinic?',
     'a' => 'FUE and DHI. Both move follicles one at a time from the back and sides of the scalp; DHI places each graft with an implanter pen. The choice depends on the area to be covered, your donor density and how short you keep your hair. See <a href="/hair-transplant-in-rohini">hair transplant in Rohini</a>.'],
    ['q' => 'Do I need a transplant, or will medicines work?',
     'a' => 'That is what the examination decides. Early thinning, shedding after an illness or stress, and hair loss linked to thyroid or iron levels often respond to medical treatment or <a href="/hair-prp-treatment-in-rohini">PRP</a>. A transplant is considered when the pattern has settled and the donor area can cover it.'],
    ['q' => 'How is the cost of treatment decided?',
     'a' => 'From the examination: the number of grafts, the technique and any supporting treatment. You receive an itemised estimate in writing before you book. The <a href="/hair-transplant-cost-in-rohini">Rohini hair transplant cost guide</a> explains what moves the figure.'],
    ['q' => 'How do I book an appointment with Dr. Rahul?',
     'a' => 'Call or WhatsApp the Rohini clinic on ' . LOC_DELHI_PHONE_DISPLAY . ' or the Gurugram clinic on ' . PHONE_DISPLAY . ' and ask for Dr. Rahul, or send the form on this page with your preferred clinic. Bring your current medicines, any blood reports and details of earlier hair treatment.'],
];

$title       = fit_title(
    $doc['name'] . ' | ' . doctor_headline($key),
    $doc['name'] . ': ' . doctor_ht_role($doc) . ' in Rohini'
);
$description = 'Dr. Rahul is a ' . strtolower(doctor_ht_role($doc)) . ' at DenceSpot Clinic in Rohini, Delhi: Senior Resident at ESIC Hospital, with 11 years of experience.';

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
        'Dr. Rahul is a ' . strtolower(doctor_ht_role($doc)) . ' at DenceSpot Clinic in Rohini, Delhi, with more than 11 years of clinical experience, and a Senior Resident at ESIC Hospital.',
        $crumbs,
        $faqs
    ),
];

$profile = [
    'lead'  => 'Dr. Rahul is a ' . strtolower(doctor_ht_role($doc)) . ' at DenceSpot Clinic in Rohini, Delhi, with more than 11 years of clinical experience and a post as Senior Resident at ESIC Hospital. He sees patients with hair loss at both DenceSpot clinics, Rohini and Sector 39 in Gurugram, from the first scalp examination to a written treatment plan.',
    'chips' => [
        ['clock',    $doc['experience'] . ' of experience'],
        ['user',     $doc['position']],
        ['hairline', 'Hair transplant & hair loss'],
        ['pin',      'Rohini & Gurugram clinics'],
    ],

    'about_h2' => 'About Dr. Rahul, ' . doctor_ht_role($doc) . ' in Rohini',
    'about'    => [
        'Dr. Rahul has more than 11 years of clinical experience and works as a Senior Resident at ESIC Hospital. At DenceSpot he sees patients at both clinics: the <a href="/delhi-clinic">Rohini clinic</a> in Delhi and the <a href="/contact">Sector 39 clinic</a> in Gurugram.',
        'A consultation with him follows the clinic’s order of work: why your hair is thinning comes before how many grafts you might need. Your history, medicines and family pattern are reviewed, the scalp and donor area are examined under magnification, and treatable causes such as thyroid problems, low iron, stress or a scalp condition are looked at before surgery is discussed.',
        'If a transplant is the right step, you receive a written plan covering the technique, the areas to be treated, an approximate graft range and an itemised estimate. Nothing is booked on the day, and you are free to take the plan home and think it over.',
        'Ask either clinic which days Dr. Rahul consults there. You can also ask about his registration, training and experience with the procedure planned for you; any clinic should answer those questions plainly.',
    ],
    'particulars' => [
        'Qualification'     => $doc['quals'],
        'Current post'      => $doc['position'],
        'Experience'        => $doc['experience'],
        'Sees patients for' => 'Hair transplant and hair loss',
        'Consults at'       => 'Rohini, Delhi & Sector 39, Gurugram',
        'Appointments'      => LOC_DELHI_PHONE_DISPLAY . ' · ' . PHONE_DISPLAY,
    ],

    'treat_h2'    => 'Hair Treatments with Dr. Rahul at the Rohini Clinic',
    'treat_intro' => 'Dr. Rahul sees patients across the clinic’s hair treatments. Each starts with an examination, and surgery is offered only when the examination supports it.',
    'treatments'  => [
        ['/hair-transplant-in-rohini',         'Hair Transplant',          'FUE and DHI as a day case under local anaesthetic, sized to what your donor area can give.', 'hairline'],
        ['/unshaven-hair-transplant-in-rohini', 'Unshaven Hair Transplant', 'Smaller sessions without shaving the whole head, for those who need to stay discreet.', 'user'],
        ['/crown-hair-transplant-in-rohini',    'Crown Hair Transplant',    'Thinning at the vertex, planned against donor supply because the crown can keep widening.', 'search'],
        ['/hair-transplant-repair-in-rohini',   'Hair Transplant Repair',   'Correcting an earlier procedure: an unnatural hairline, low density or a thinned donor area.', 'settings'],
        ['/eyebrow-transplant-in-rohini',       'Eyebrow Transplant',       'Thin, over-plucked or scarred brows rebuilt with single hairs placed at a flat angle.', 'pencil'],
        ['/hair-prp-treatment-in-rohini',       'Hair PRP Treatment',       'For thinning where follicles are still present, often alongside medical treatment.', 'heart'],
    ],
    'more' => [
        '/fue-hair-transplant-in-rohini'        => 'FUE hair transplant',
        '/dhi-hair-transplant-in-rohini'        => 'DHI hair transplant',
        '/hairline-transplant-in-rohini'        => 'Hairline transplant',
        '/hair-fall-treatment-in-rohini'        => 'Hair fall treatment',
        '/womens-hair-loss-treatment-in-rohini' => 'Women’s hair loss',
        '/hair-transplant-cost-in-rohini'       => 'Hair transplant cost in Rohini',
        '/hair-transplant-in-gurgaon'           => 'Hair transplant in Gurgaon',
    ],

    'approach_h2'    => 'What to Expect When You See Dr. Rahul',
    'approach_intro' => 'How a hair consultation is handled at both DenceSpot clinics, whichever treatment you end up needing.',
    'approach'       => [
        ['chat',   'Your history heard in full',    'When the shedding began, what you have tried, family pattern and current medicines: the details that change a plan.'],
        ['search', 'Magnified scalp examination',   'The thinning zones and the donor area at the back and sides are checked for density and miniaturised hairs.'],
        ['heart',  'Medical causes ruled out',      'Where thyroid, iron, hormones or stress may be involved, tests or medical treatment come before surgery.'],
        ['scale',  'A plan sized to your donor area', 'Graft numbers are set by what the back of the head can safely give, now and for any later session.'],
        ['rupee',  'An itemised written estimate',  'What is included and what is not, in writing, before any date is booked.'],
        ['shield', 'Aftercare you can follow',      'Written instructions on washing, sleep, sun and exercise, and a number to call if something looks wrong.'],
    ],

    'steps_h2' => 'Seeing Dr. Rahul in Rohini, Step by Step',
    'steps'    => [
        ['phone',    'Book Your Visit', 'Call or WhatsApp the Rohini clinic and ask for a consultation with Dr. Rahul.'],
        ['chat',     'Talk It Through', 'Your hair-loss history, your health and what you hope to change.'],
        ['search',   'Examination',     'Scalp and donor area examined under magnification, with photographs for your record.'],
        ['doc',      'Your Plan',       'Medical treatment, PRP, a transplant or a mix, with the estimate in writing.'],
        ['calendar', 'Follow-up',       'Reviews that compare your progress against the first photographs.'],
    ],

    'check_h2'    => 'Questions to Ask a Hair Transplant Surgeon in Rohini',
    'check_intro' => 'Rohini and the neighbouring parts of North-West Delhi have many hair transplant clinics, and their adverts can be hard to tell apart. Whichever clinic you are weighing up, ours included, the answers to these questions tell you more than any advert.',
    'check_note'  => 'Before comparing prices, read <a href="/blog/hair-transplant-cost-delhi-quotes">how hair transplant quotes in Delhi compare</a> and <a href="/blog/who-can-legally-perform-a-hair-transplant-in-india">who can legally perform a hair transplant in India</a>.',
    'checks'      => [
        'Is the doctor registered, and can I see the registration number?',
        'Will the doctor I meet today be the one who treats me?',
        'Who makes the incisions and places the grafts?',
        'Was my graft number worked out from an examination or a photo?',
        'What does the estimate include, and what would cost extra?',
        'Whom do I call if I have a problem after the procedure?',
    ],

    'faq_h2' => 'Dr. Rahul: Frequently Asked Questions',
    'faqs'   => $faqs,

    'consult_h2'   => 'Book an Appointment with Dr. Rahul in Rohini or Gurugram',
    'consult_body' => 'See Dr. Rahul at either DenceSpot clinic for a hair and scalp examination and a written plan with an itemised estimate. You are not asked to book a procedure on the day.',
    'form_source'  => 'dr-rahul',
    'form_options' => [
        'Hair transplant (FUE / DHI)',
        'Hair fall or thinning',
        'Hair PRP / GFC',
        'Beard or eyebrow transplant',
        'Hair transplant repair',
        'Not sure — please advise',
    ],
];

require __DIR__ . '/includes/header.php';

echo doctor_profile_page($key, $profile);

require __DIR__ . '/includes/footer.php';
