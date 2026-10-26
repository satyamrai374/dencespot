<?php
/**
 * Blog index.
 *
 * The registry below is the single source of truth for every post: the
 * listing page, related-post blocks, schema and the sitemap all read from it.
 * Adding a post means one entry here plus one file in /blog/.
 *
 * `hub` maps each post to the money page it must link into — strategy §6:
 * "Every surviving post gets a contextual link into its money hub. Most of
 * those 370 posts almost certainly link nowhere useful."
 */

declare(strict_types=1);

const BLOG_HUBS = [
    'hair-transplant' => ['label' => 'Hair transplant', 'url' => '/hair-transplant-in-gurgaon'],
    'prp'             => ['label' => 'PRP & non-surgical', 'url' => '/hair-prp-treatment-in-gurgaon'],
    'beard'           => ['label' => 'Beard transplant', 'url' => '/beard-transplant-gurgaon'],
    'hair-fall'       => ['label' => 'Hair fall', 'url' => '/hair-fall-treatment-in-gurgaon'],
    'skin'            => ['label' => 'Laser & skin', 'url' => '/skin-treatment-in-gurgaon'],
];

/**
 * Newest first. `updated` is optional and only set when a post has been
 * meaningfully revised — never bumped just to look fresh.
 */
const BLOG_POSTS = [
    /**
     * Topical-authority cluster, 14 Oct 2026. Patient questions the old blog
     * ranked for, rebuilt as reviewed-style articles. Not yet reviewed by the
     * clinic's doctor ('reviewed' => false), so no review byline is shown.
     */
    [
        'slug'     => 'right-age-for-a-hair-transplant',
        'reviewed' => false,
        'title'    => 'Is There a Right Age for a Hair Transplant?',
        'seo_title'=> 'Right Age for a Hair Transplant: What Decides It',
        'excerpt'  => 'Why surgery in your early twenties carries particular risks, what a stable pattern of loss means, and why age matters less than donor supply and future loss.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'hair-transplant-with-diabetes-or-high-blood-pressure',
        'reviewed' => false,
        'title'    => 'Hair Transplant With Diabetes or High Blood Pressure: What Changes',
        'seo_title'=> 'Hair Transplant With Diabetes or High BP',
        'excerpt'  => 'Whether a hair transplant is possible with diabetes, high blood pressure or a heart condition, what is checked first, and which medicines need planning.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'exercise-smoking-and-alcohol-after-a-hair-transplant',
        'reviewed' => false,
        'title'    => 'Gym, Smoking and Alcohol After a Hair Transplant: When and Why',
        'seo_title'=> 'Gym, Smoking & Alcohol After a Hair Transplant',
        'excerpt'  => 'When light walking, the gym, swimming, helmets, smoking and alcohol fit back into the recovery weeks, and the reasons behind each wait.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'second-hair-transplant',
        'reviewed' => false,
        'title'    => 'A Second Hair Transplant: When It Makes Sense and What Limits It',
        'seo_title'=> 'Second Hair Transplant: When and What Limits It',
        'excerpt'  => 'Why some people need a second session, how long to wait, how much donor supply is left, and when a second procedure is the wrong answer.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'how-many-prp-sessions-are-needed-for-hair',
        'related'  => ['label' => 'PRP hair treatment cost in Gurgaon', 'url' => '/prp-hair-treatment-cost-in-gurgaon'],
        'reviewed' => false,
        'title'    => 'How Many PRP Sessions Does Hair Need, and How Far Apart?',
        'seo_title'=> 'How Many PRP Sessions for Hair? Spacing & Upkeep',
        'excerpt'  => 'The usual starting course, the gap between sessions, when to judge whether PRP is working, and what maintenance means in practice.',
        'hub'      => 'prp',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 7,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'does-prp-have-side-effects',
        'reviewed' => false,
        'title'    => 'PRP for Hair: Side Effects, Pain and Who Should Avoid It',
        'seo_title'=> 'PRP Hair Treatment Side Effects and Pain',
        'excerpt'  => 'What is normal after PRP, what is not, how the discomfort is managed, and the conditions and medicines that make PRP unsuitable.',
        'hub'      => 'prp',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 7,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'what-to-do-after-prp-hair-treatment',
        'reviewed' => false,
        'title'    => 'After PRP Hair Treatment: Washing, Exercise and the First 72 Hours',
        'seo_title'=> 'After PRP Hair Treatment: Wash, Gym, Aftercare',
        'excerpt'  => 'When to wash your hair, when to exercise, what to avoid on the scalp, and which reactions to report after a PRP session.',
        'hub'      => 'prp',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 6,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'does-microneedling-work-for-hair-loss',
        'related'  => ['label' => 'Hair microneedling in Gurgaon', 'url' => '/hair-microneedling-in-gurgaon'],
        'reviewed' => false,
        'title'    => 'Does Microneedling Work for Hair Loss?',
        'seo_title'=> 'Does Microneedling Work for Hair Loss?',
        'excerpt'  => 'What the evidence for scalp microneedling shows, why it is usually paired with another treatment, and the risks of rolling at home.',
        'hub'      => 'prp',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 7,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'vitamin-deficiency-and-hair-loss',
        'reviewed' => false,
        'title'    => 'Iron, Vitamin D, B12 and Zinc: Which Deficiencies Cause Hair Loss?',
        'seo_title'=> 'Vitamin Deficiency and Hair Loss: What to Test',
        'excerpt'  => 'Which deficiencies are linked to hair fall, which tests show them, why supplements without a test can backfire, and how long regrowth takes.',
        'hub'      => 'hair-fall',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'thyroid-and-hair-loss',
        'reviewed' => false,
        'title'    => 'Thyroid Problems and Hair Loss: Signs, Tests and Regrowth',
        'seo_title'=> 'Thyroid and Hair Loss: Signs, Tests, Regrowth',
        'excerpt'  => 'How an underactive or overactive thyroid affects hair, the tests that show it, and what to expect once thyroid levels are treated.',
        'hub'      => 'hair-fall',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 7,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'hair-fall-after-pregnancy',
        'related'  => ['label' => 'Women\'s hair loss treatment in Gurgaon', 'url' => '/womens-hair-loss-treatment-in-gurgaon'],
        'reviewed' => false,
        'title'    => 'Hair Fall After Pregnancy: Why It Happens and When It Stops',
        'seo_title'=> 'Hair Fall After Pregnancy: When It Stops',
        'excerpt'  => 'Why shedding often starts a few months after childbirth, how long it usually lasts, treatment questions while breastfeeding, and when to get it checked.',
        'hub'      => 'hair-fall',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 7,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'can-dandruff-cause-hair-fall',
        'about'    => ['@type' => 'MedicalCondition', 'name' => 'Dandruff'],
        'related'  => ['label' => 'Dandruff treatment in Gurgaon', 'url' => '/dandruff-treatment-in-gurgaon'],
        'reviewed' => false,
        'title'    => 'Can Dandruff Cause Hair Fall?',
        'seo_title'=> 'Can Dandruff Cause Hair Fall? What Links Them',
        'excerpt'  => 'How flaking, itch and scratching relate to shedding, when the two are separate problems, and how dandruff is treated so it stays controlled.',
        'hub'      => 'hair-fall',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 7,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'rosemary-onion-juice-and-hair-oils-for-hair-fall',
        'reviewed' => false,
        'title'    => 'Rosemary, Onion Juice and Hair Oils: What Helps Hair Fall?',
        'seo_title'=> 'Rosemary, Onion Juice & Oils for Hair Fall',
        'excerpt'  => 'What the studies on rosemary oil, onion juice and oiling actually show, where home remedies can irritate the scalp, and when to stop and get assessed.',
        'hub'      => 'hair-fall',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'premature-grey-hair-causes',
        'about'    => ['@type' => 'MedicalCondition', 'name' => 'Premature greying of hair'],
        'reviewed' => false,
        'title'    => 'Grey Hair in Your 20s: Causes, Tests and What Can Be Done',
        'seo_title'=> 'Premature Grey Hair: Causes and What to Check',
        'excerpt'  => 'Genes, B12, thyroid, smoking and vitiligo: what drives early greying, which tests are worth doing, and what can and cannot reverse it.',
        'hub'      => 'hair-fall',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 7,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'does-minoxidil-work-for-beard',
        'about'    => ['@type' => 'MedicalCondition', 'name' => 'Sparse beard growth'],
        'reviewed' => false,
        'title'    => 'Does Minoxidil Work for Beard Growth?',
        'seo_title'=> 'Minoxidil for Beard Growth: Does It Work?',
        'excerpt'  => 'What the limited evidence on minoxidil for the beard shows, how it is used, side effects on facial skin, and what happens when it is stopped.',
        'hub'      => 'beard',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 7,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'when-does-a-beard-fully-grow',
        'about'    => ['@type' => 'MedicalCondition', 'name' => 'Sparse beard growth'],
        'reviewed' => false,
        'title'    => 'When Does a Beard Fully Grow In? Age, Genes and Hormones',
        'seo_title'=> 'When Does a Beard Fully Grow? Age and Genes',
        'excerpt'  => 'Why many men\'s beards keep filling in until their late twenties, the role of genes and hormones, and when a patchy beard is worth assessing.',
        'hub'      => 'beard',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 7,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'alopecia-barbae-patchy-beard-hair-loss',
        'about'    => ['@type' => 'MedicalCondition', 'name' => 'Alopecia barbae'],
        'related'  => ['label' => 'Alopecia areata treatment in Gurgaon', 'url' => '/alopecia-areata-treatment-in-gurgaon'],
        'reviewed' => false,
        'title'    => 'Alopecia Barbae: Round Bald Patches in the Beard',
        'seo_title'=> 'Alopecia Barbae: Bald Patches in the Beard',
        'excerpt'  => 'Why smooth round patches appear in the beard, how alopecia barbae differs from a naturally patchy beard, and why a transplant waits while it is active.',
        'hub'      => 'beard',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 7,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'is-laser-hair-removal-permanent',
        'about'    => ['@type' => 'MedicalProcedure', 'name' => 'Laser hair removal'],
        'related'  => ['label' => 'Laser hair removal in Gurgaon', 'url' => '/laser-hair-removal-in-gurgaon'],
        'reviewed' => false,
        'title'    => 'Is Laser Hair Removal Permanent?',
        'seo_title'=> 'Is Laser Hair Removal Permanent? What to Expect',
        'excerpt'  => 'Permanent reduction versus permanent removal, why several sessions are needed, which hair responds poorly, and why some areas need upkeep.',
        'hub'      => 'skin',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 7,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'laser-hair-removal-for-pcos-facial-hair',
        'about'    => ['@type' => 'MedicalCondition', 'name' => 'Hirsutism'],
        'related'  => ['label' => 'Laser hair removal in Gurgaon', 'url' => '/laser-hair-removal-in-gurgaon'],
        'reviewed' => false,
        'title'    => 'Laser Hair Removal for PCOS Facial Hair: What to Expect',
        'seo_title'=> 'Laser Hair Removal for PCOS Facial Hair',
        'excerpt'  => 'Why hormonally driven facial hair often needs more sessions and later upkeep, how laser fits alongside medical treatment, and what to tell the clinic.',
        'hub'      => 'skin',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 7,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'melasma-causes-and-treatment',
        'about'    => ['@type' => 'MedicalCondition', 'name' => 'Melasma'],
        'related'  => ['label' => 'Skin treatment in Gurgaon', 'url' => '/skin-treatment-in-gurgaon'],
        'reviewed' => false,
        'title'    => 'Melasma: Causes, Triggers and Treatment Options',
        'seo_title'=> 'Melasma: Causes, Triggers and Treatment',
        'excerpt'  => 'Why melasma appears on the cheeks and forehead, the role of sun, heat and hormones, the treatments that may be discussed, and why it can return.',
        'hub'      => 'skin',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 7,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'acne-scars-treatment-options',
        'about'    => ['@type' => 'MedicalCondition', 'name' => 'Acne scars'],
        'related'  => ['label' => 'Skin treatment in Gurgaon', 'url' => '/skin-treatment-in-gurgaon'],
        'reviewed' => false,
        'title'    => 'Acne Scars: Types and the Treatments That May Help',
        'seo_title'=> 'Acne Scars: Types and Treatment Options',
        'excerpt'  => 'Marks versus true scars, the main scar types, why active acne is treated first, and how scar treatments are chosen for Indian skin.',
        'hub'      => 'skin',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 7,
        'image_alt'=> null,
    ],
    /**
     * Delhi cluster, 14 Oct 2026 (COMPETITOR-SEO.md §6 item 4). Not yet
     * reviewed by the clinic's doctor: blog-header.php prints "Written and
     * medically reviewed by" on every post, so these four must be reviewed
     * before they go live. Their body copy links Rohini pages only.
     */
    [
        'slug'     => 'hair-transplant-recovery-in-delhi',
        // Delhi post: related page in Rohini; not yet reviewed by the clinic's doctor.
        'related'  => ['label' => 'Hair transplant in Rohini', 'url' => '/hair-transplant-delhi/rohini'],
        'reviewed' => false,
        'title'    => 'Recovering From a Hair Transplant in Delhi: Heat, Smog, Helmets and the Commute',
        'seo_title'=> 'Hair Transplant Recovery in Delhi: Heat and Smog',
        'excerpt'  => 'Aftercare sheets are written for a scalp, not a city. How summer heat, the smog season, road dust, crowded Metro coaches and the helmet law shape the first month.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 9,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'hair-transplant-cost-delhi-quotes',
        // Delhi post: related page in Rohini; not yet reviewed by the clinic's doctor.
        'related'  => ['label' => 'Hair transplant cost in Rohini', 'url' => '/hair-transplant-cost-in-rohini'],
        'reviewed' => false,
        'title'    => 'Why Hair Transplant Quotes in Delhi Differ, and How to Compare Them',
        'seo_title'=> 'Hair Transplant Quotes in Delhi: How to Compare',
        'excerpt'  => 'Per-graft rates, packages, slab rates, per-hair figures and monthly instalments can all describe one operation. The arithmetic that turns each into a comparable total.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'who-should-assess-hair-fall',
        // Delhi post: related page in Rohini; not yet reviewed by the clinic's doctor.
        'related'  => ['label' => 'Hair fall treatment in Rohini', 'url' => '/hair-fall-treatment-in-rohini'],
        'reviewed' => false,
        'title'    => 'Dermatologist, Trichologist or Salon: Who Should Assess Hair Fall?',
        'seo_title'=> 'Dermatologist or Trichologist for Hair Fall?',
        'excerpt'  => 'Only a registered doctor can diagnose a cause and prescribe for it. What a dermatologist, a trichologist and a salon each do, when to see a doctor, and what an assessment involves.',
        'hub'      => 'hair-fall',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'laser-hair-removal-patch-test',
        'about'    => ['@type' => 'MedicalProcedure', 'name' => 'Laser hair removal'],
        // Delhi post: related page in Rohini; not yet reviewed by the clinic's doctor.
        'related'  => ['label' => 'Laser hair removal in Rohini', 'url' => '/laser-hair-removal-in-rohini'],
        'reviewed' => false,
        'title'    => 'Laser Hair Removal on Indian Skin: What the Patch Test Checks',
        'seo_title'=> 'Laser Hair Removal Patch Test on Indian Skin',
        'excerpt'  => 'Darker skin competes with hair for laser energy, so a test spot comes first. Skin types, wavelengths in plain terms, what the patch test shows and what it cannot predict.',
        // No skin/laser hub exists yet; 'prp' ("PRP & non-surgical") is the nearest.
        'hub'      => 'skin',
        'published'=> '2026-10-14',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],

    [
        'slug'     => 'norwood-scale-explained',
        'title'    => 'The Norwood Scale Explained: Which Stage Are You, and What It Means',
        // Shorter form for the <title> tag only; the H1 keeps the full headline.
        'seo_title'=> 'The Norwood Scale Explained: All 7 Stages',
        'excerpt'  => 'The seven stages of male pattern hair loss, what each one actually looks like, and why the stage matters far less than whether your loss has stabilised.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-08-21',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> 'Diagram of the seven Norwood stages of male pattern hair loss',
    ],

    /**
     * Published 1 Sep 2026 as one batch. ⚠ If these are deployed all at once
     * they carry a scaled-content signal; stagger the deploy, or set each
     * 'published' to the date the post actually goes live. Do not backdate.
     */
    [
        'slug'     => 'how-many-grafts-do-you-need',
        'title'    => 'How Many Grafts Do You Actually Need, and Who Decides the Number',
        'seo_title'=> 'How Many Grafts Do You Need for a Hair Transplant',
        'excerpt'  => 'A graft number quoted before anyone examines your scalp is an estimate, not a plan. Here is what a real assessment measures and why identical Norwood stages differ.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'fue-vs-dhi-hair-transplant',
        'title'    => 'FUE vs DHI: What Actually Differs, and Whether the Difference Matters for You',
        'seo_title'=> 'FUE vs DHI Hair Transplant: The Real Differences',
        'excerpt'  => 'Extraction is the same in both. What changes is how grafts are placed, and how much that difference is worth. A plain comparison of implanter pens against pre-made channels.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'fue-vs-fut-hair-transplant',
        'title'    => 'FUE vs FUT: Scarring, Donor Yield and Why the Strip Method Still Exists',
        'seo_title'=> 'FUE vs FUT Hair Transplant: How to Choose',
        'excerpt'  => 'One leaves a linear scar, the other leaves hundreds of small ones. A straight comparison of donor yield, healing, hair length and who each method genuinely suits.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'why-hair-transplant-quotes-vary',
        'title'    => 'Why Two Hair Transplant Quotes in Gurgaon Can Differ So Much',
        'seo_title'=> 'Why Hair Transplant Quotes Vary So Much in India',
        'excerpt'  => 'Two clinics in Gurgaon can quote very differently for the same head. Here is what legitimately changes the number, and why a per-graft rate is a misleading unit.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'questions-to-ask-hair-transplant-consultation',
        'title'    => 'Twelve Questions to Ask at a Hair Transplant Consultation in Gurgaon',
        'seo_title'=> 'Questions to Ask at a Hair Transplant Consultation',
        'excerpt'  => 'The consultation is your only chance to test a clinic before you pay. Twelve questions worth asking, what a good answer sounds like, and which replies should worry you.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'who-can-legally-perform-a-hair-transplant-in-india',
        'title'    => 'Who Is Legally Allowed to Perform a Hair Transplant in India',
        'seo_title'=> 'Who Can Legally Do a Hair Transplant in India',
        'excerpt'  => 'India\'s medical regulator names exactly which qualifications may perform a hair transplant. Here is the rule, how to check any doctor\'s registration, and what the register cannot tell you.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'hair-transplant-growth-timeline-month-by-month',
        'title'    => 'The Hair Transplant Growth Timeline, Month by Month',
        'seo_title'=> 'Hair Transplant Growth Timeline Month by Month',
        'excerpt'  => 'Nothing happens for three months, and that is expected. A month-by-month account of shedding, first regrowth, thickening and when a result can honestly be judged.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'donor-area-limits-hair-transplant',
        'title'    => 'Your Donor Area Is a One-Time Budget: What It Can and Cannot Cover',
        'seo_title'=> 'Donor Area Limits in a Hair Transplant',
        'excerpt'  => 'Donor hair is spent once and does not grow back where it came from. How supply is measured, why coverage and density compete, and what extensive loss can realistically get.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 9,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'is-a-hair-transplant-permanent',
        'title'    => 'Is a Hair Transplant Permanent, or Will You Be Thin Again in Ten Years?',
        'seo_title'=> 'Is a Hair Transplant Permanent? An Honest Answer',
        'excerpt'  => 'The grafts usually stay. The hair around them is still on its own trajectory. Why a transplant does not stop hair loss, and what that means five and ten years later.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 7,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'shedding-and-shock-loss-after-hair-transplant',
        'title'    => 'Shedding and Shock Loss After a Hair Transplant: What Is Normal and What Is Not',
        'seo_title'=> 'Shedding and Shock Loss After a Hair Transplant',
        'excerpt'  => 'Transplanted hairs fall out around week three and native hairs can thin too. What is expected, what is not, and the specific signs that genuinely warrant a phone call.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 7,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'who-should-not-have-a-hair-transplant',
        'title'    => 'When a Hair Transplant Is the Wrong Answer, and Why a Clinic Should Say So',
        'seo_title'=> 'Who Should Not Have a Hair Transplant',
        'excerpt'  => 'Some people should be told no, or not yet. Unstable donor zones, diffuse thinning, untreated medical causes and the cases where surgery makes things worse.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'natural-hairline-design-explained',
        'title'    => 'What Makes a Hairline Look Natural, and Why Placement Matters More Than Graft Count',
        'seo_title'=> 'What Makes a Transplanted Hairline Look Natural',
        'excerpt'  => 'Patients compare graft counts; surgeons argue about placement. Why hairline position, angle and irregularity decide whether a result reads as natural at 30 and at 50.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'hair-transplant-side-effects-and-risks',
        'title'    => 'Hair Transplant Side Effects and Risks: The Expected, the Uncommon and the Permanent',
        'seo_title'=> 'Hair Transplant Side Effects and Risks Explained',
        'excerpt'  => 'Swelling and numbness are expected. Infection is uncommon. Overharvested donor and a badly placed hairline are permanent. An honest separation of the three, before you consent.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 9,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'hair-transplant-repair-options',
        'title'    => 'Unhappy With a Previous Hair Transplant: What Repair Can and Cannot Fix',
        'seo_title'=> 'Hair Transplant Repair: What Can Be Fixed',
        'excerpt'  => 'Most disappointment is judged too early, and some of it is genuinely fixable. What corrective surgery can address, what it cannot, and why the second operation is harder.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 9,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'how-to-read-before-and-after-photos',
        'title'    => 'How to Read a Hair Transplant Before-and-After Photo',
        'seo_title'=> 'Reading Hair Transplant Before-and-After Photos',
        'excerpt'  => 'The same head can look transformed or unchanged depending on the lamp. How lighting, angle, hair length and timing are used, and what an honest gallery discloses.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 7,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'hair-transplant-promises-and-success-rates',
        'title'    => 'Hair Transplant Promises and Success Rates: What Those Claims Actually Mean',
        'seo_title'=> 'Hair Transplant Success Rate Claims, Examined',
        'excerpt'  => 'No clinic can verify a survival percentage for your head before operating. What those figures would have to measure, what Indian advertising rules forbid, and what to ask instead.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'first-14-days-after-a-hair-transplant',
        'title'    => 'The First 14 Days After a Hair Transplant, Day by Day',
        'seo_title'=> 'The First 14 Days After a Hair Transplant',
        'excerpt'  => 'The fortnight nobody warns you about: swelling, crusting, the first wash, and hairs that come away with the scabs. What each day usually looks like and when to call.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'hair-transplant-recovery-in-gurgaon',
        'title'    => 'Recovering From a Hair Transplant in Gurgaon: Heat, Dust, Helmets and the Commute',
        'seo_title'=> 'Hair Transplant Recovery in Gurgaon: Heat and Dust',
        'excerpt'  => 'Standard aftercare assumes mild weather and a car. Helmets, May heat, construction dust and monsoon humidity change the timeline, and can change the month you book.',
        'hub'      => 'hair-transplant',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'prp-or-hair-transplant',
        'title'    => 'PRP or a Hair Transplant: Which One Do You Actually Need?',
        'seo_title'=> 'PRP or Hair Transplant: Which Do You Need?',
        'excerpt'  => 'PRP cannot regrow hair from bald skin and surgery does not stop shedding. How to tell which problem you have, and why the honest answer is sometimes neither yet.',
        'hub'      => 'prp',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'prp-vs-gfc-vs-exosomes',
        'title'    => 'PRP vs GFC vs Exosomes: Comparing the Injectable Hair Treatments Honestly',
        'seo_title'=> 'PRP vs GFC vs Exosomes for Hair Loss',
        'excerpt'  => 'Three injectables, three very different levels of evidence. What each preparation actually is, where the published data is thin, and why price says nothing about effect.',
        'hub'      => 'prp',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'does-prp-work-for-hair-loss',
        'title'    => 'Does PRP Actually Work for Hair Loss, and What Happens If You Stop?',
        'seo_title'=> 'Does PRP Work for Hair Loss? What Evidence Shows',
        'excerpt'  => 'PRP is maintenance, not a cure, and the effect fades when you stop. What the published reviews report, who tends to respond, and how to judge whether yours is working.',
        'hub'      => 'prp',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'what-to-ask-before-prp-in-gurgaon',
        'title'    => 'Before You Pay for a Course of PRP in Gurgaon, Ask These Questions',
        'seo_title'=> 'What to Ask Before Paying for PRP in Gurgaon',
        'excerpt'  => 'PRP on two Gurgaon price lists is rarely the same product. Preparation methods vary enormously and nothing standardises them. The questions that make a package comparable.',
        'hub'      => 'prp',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'female-pattern-hair-loss-in-women',
        'title'    => 'Female Pattern Hair Loss: Why the Workup Comes Before Any Talk of Surgery',
        'seo_title'=> 'Female Pattern Hair Loss: Diagnosis and Options',
        'excerpt'  => 'Widening part, intact hairline, and a dozen possible causes behind it. Why women need blood work and a diagnosis before anyone discusses grafts, and who is not a candidate.',
        'hub'      => 'hair-fall',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 9,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'telogen-effluvium-vs-pattern-hair-loss',
        'title'    => 'Is Your Hair Fall Temporary or Permanent? Telogen Effluvium vs Pattern Loss',
        'seo_title'=> 'Telogen Effluvium vs Pattern Hair Loss',
        'excerpt'  => 'Shedding from everywhere usually stops on its own. Thinning in a pattern does not. How the two differ, how they are told apart, and when waiting costs you follicles.',
        'hub'      => 'hair-fall',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'minoxidil-and-finasteride-in-india',
        'title'    => 'Minoxidil and Finasteride in India: Prescription Rules, Side Effects and Subscription Boxes',
        'seo_title'=> 'Minoxidil and Finasteride in India: What to Know',
        'excerpt'  => 'Both are prescription medicines here, whatever a subscription box implies. What they do, the side effects worth discussing, and why a questionnaire is not a diagnosis.',
        'hub'      => 'hair-fall',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'beard-transplant-what-to-expect',
        'about'    => ['@type' => 'MedicalProcedure', 'name' => 'Beard transplant'],
        'title'    => 'Beard Transplant: What Scalp Hair Does and Does Not Do on Your Face',
        'seo_title'=> 'Beard Transplant: What to Realistically Expect',
        'excerpt'  => 'Scalp hair on a face behaves like scalp hair: it keeps growing and needs shaving. What transfers well, what looks wrong if angles are careless, and what it costs your scalp.',
        'hub'      => 'beard',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'patchy-beard-wait-or-transplant',
        'about'    => ['@type' => 'MedicalCondition', 'name' => 'Sparse beard growth'],
        'title'    => 'Patchy Beard at 22: Should You Wait, Treat It, or Transplant?',
        'seo_title'=> 'Patchy Beard: Wait, Treat, or Transplant?',
        'excerpt'  => 'Beard density keeps developing into your mid-twenties, and grafting an unfinished beard can look strange later. How to tell whether your gaps are actually stable.',
        'hub'      => 'beard',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'beard-transplant-recovery-timeline',
        'about'    => ['@type' => 'MedicalProcedure', 'name' => 'Beard transplant'],
        'title'    => 'Beard Transplant Recovery: Crusting, Shedding and the First Shave',
        'seo_title'=> 'Beard Transplant Recovery and the First Shave',
        'excerpt'  => 'Facial skin heals differently from scalp. Crusting, swelling, the shedding phase, and the question everyone asks first: when can I shave this properly again?',
        'hub'      => 'beard',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 7,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'blood-tests-for-hair-fall',
        'title'    => 'Which Blood Tests Actually Matter for Hair Fall, and What Supplements Cannot Do',
        'seo_title'=> 'Blood Tests for Hair Fall: What to Test and Why',
        'excerpt'  => 'Ferritin, B12, thyroid and vitamin D are worth checking. Biotin usually is not, and it can skew your other results. What testing answers, and what it cannot fix.',
        'hub'      => 'hair-fall',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
    [
        'slug'     => 'hard-water-pollution-and-hair-fall-in-gurgaon',
        'title'    => 'Hard Water, Pollution and Monsoon Shedding: What Really Drives Hair Fall in Gurgaon',
        'seo_title'=> 'Hard Water and Hair Fall in Gurgaon: The Facts',
        'excerpt'  => 'Borewell water damages hair shafts; it does not cause pattern baldness. What hard water, pollution and monsoon shedding really do, and when to stop blaming the tap.',
        'hub'      => 'hair-fall',
        'published'=> '2026-09-01',
        'updated'  => null,
        'minutes'  => 8,
        'image_alt'=> null,
    ],
];

/** All posts, newest first. */
function blog_posts(?string $hub = null, ?string $excludeSlug = null): array
{
    $posts = array_filter(BLOG_POSTS, static function (array $p) use ($hub, $excludeSlug): bool {
        if ($excludeSlug !== null && $p['slug'] === $excludeSlug) {
            return false;
        }
        // A registry entry without its file is an unpublished post. Ten entries
        // once sat here with no file, and every listing, related-post strip and
        // hub "further reading" block linked straight into a 404.
        if (!is_file(dirname(__DIR__) . '/blog/' . $p['slug'] . '.php')) {
            return false;
        }
        return $hub === null || $p['hub'] === $hub;
    });

    usort($posts, static fn (array $a, array $b): int => strcmp($b['published'], $a['published']));

    return array_values($posts);
}

/** One post by slug, or null. */
function blog_post(string $slug): ?array
{
    foreach (BLOG_POSTS as $post) {
        if ($post['slug'] === $slug) {
            return $post;
        }
    }
    return null;
}

function blog_url(string $slug): string
{
    return '/blog/' . $slug;
}

/** "21 August 2026" */
function blog_date(string $iso): string
{
    $d = date_create($iso);
    return $d ? $d->format('j F Y') : $iso;
}

/** Listing card. */
/**
 * The AI illustration for a post: [HOME_IMAGES key, what it shows]. Used under
 * the post title (blog-header.php) and on its card, so every card and article
 * opens with a labelled AI image and cards in one strip are not all the same
 * picture. All are AI-generated with no people (NMC Guidelines cl. 7.2).
 *
 * @return array{0:string,1:string}
 */
function blog_post_art(array $post): array
{
    $postArt = [
          'norwood-scale-explained'                         => ['stage-extensive',  'mannequin heads seen from above, showing an extensive pattern of hair loss'],
          'donor-area-limits-hair-transplant'               => ['intro-donor',      'a mannequin head seen from behind, with the donor area at the back and sides marked'],
          'natural-hairline-design-explained'               => ['intro-recipient',  'a mannequin head seen from the front, with a pencilled hairline'],
          'female-pattern-hair-loss-in-women'               => ['stage-female',     'a mannequin head seen from above, with a widening central parting'],
          'how-many-grafts-do-you-need'                     => ['step-plan',        'a tablet showing a head diagram with a planned hairline'],
          'first-14-days-after-a-hair-transplant'           => ['step-followup',    'a desk calendar with dates circled'],
          'hair-transplant-growth-timeline-month-by-month'  => ['svc-followup',     'a desk calendar with dates circled'],
          'questions-to-ask-hair-transplant-consultation'   => ['step-consultation','a dermatoscope and notepad on a desk'],
          'who-can-legally-perform-a-hair-transplant-in-india' => ['svc-consultation', 'a dermatoscope and notepad on a desk'],
          'fue-vs-dhi-hair-transplant'                      => ['step-procedure',   'sterile hair-restoration instruments laid out on a tray'],
          'fue-vs-fut-hair-transplant'                      => ['svc-procedure',    'sterile hair-restoration instruments laid out on a tray'],
          'blood-tests-for-hair-fall'                       => ['svc-consultation', 'a dermatoscope and notepad on a desk'],
          'minoxidil-and-finasteride-in-india'              => ['svc-follicle',     'a sculpted cross-section of scalp skin with hair follicles'],
          'does-prp-work-for-hair-loss'                     => ['svc-prp',          'a vial of golden plasma and a syringe on a tray'],
          'why-hair-transplant-quotes-vary'                 => ['svc-hair-transplant', 'a sculpted model of a follicular unit with three hairs'],
          'is-a-hair-transplant-permanent'                  => ['stage-crown',      'a mannequin head seen from above, with thinning at the crown'],
          'hair-transplant-promises-and-success-rates'      => ['svc-unshaven',     'a mannequin head seen from the front, with a pencilled hairline'],
          'hair-transplant-side-effects-and-risks'          => ['svc-skin',         'a sculpted cross-section of skin with a hair follicle'],
          'hair-transplant-recovery-in-gurgaon'             => ['ambient',          'sunlight and leaf shadows on an ivory wall with a potted plant'],
          'hair-transplant-repair-options'                  => ['svc-crown',        'a mannequin head seen from above, with a bald patch at the crown'],
          'how-to-read-before-and-after-photos'             => ['svc-hairline',     'a mannequin head seen from above, with receding temples'],
          'hair-transplant-recovery-in-delhi'               => ['svc-hair-fall',    'a wooden comb resting on folded towels'],
          'hair-transplant-cost-delhi-quotes'               => ['svc-follicle',     'a sculpted cross-section of scalp skin with hair follicles'],
          'who-should-assess-hair-fall'                     => ['step-consultation','a dermatoscope and notepad on a desk'],
          'laser-hair-removal-patch-test'                   => ['svc-laser',        'a white handheld device beside a folded towel'],
          // Topical-authority posts, 14 Oct 2026.
          'right-age-for-a-hair-transplant'                   => ['stage-temples', 'a mannequin head seen from above, with receding temples'],
          'hair-transplant-with-diabetes-or-high-blood-pressure'=> ['svc-consultation', 'a dermatoscope and notepad on a desk'],
          'exercise-smoking-and-alcohol-after-a-hair-transplant'=> ['step-followup', 'a desk calendar with dates circled'],
          'second-hair-transplant'                            => ['intro-donor', 'a mannequin head seen from behind, with the donor area at the back and sides marked'],
          'how-many-prp-sessions-are-needed-for-hair'         => ['step-followup', 'a desk calendar with dates circled'],
          'does-prp-have-side-effects'                        => ['svc-prp', 'a capped tube of golden-yellow plasma beside a syringe on a white tray'],
          'what-to-do-after-prp-hair-treatment'               => ['svc-procedure', 'sterile instruments laid out on a tray'],
          'does-microneedling-work-for-hair-loss'             => ['svc-follicle', 'a sculpted cross-section of scalp skin with hair follicles'],
          'vitamin-deficiency-and-hair-loss'                  => ['step-consultation', 'a dermatoscope and notepad on a desk'],
          'thyroid-and-hair-loss'                             => ['hero', 'a sculpted cross-section of scalp skin with hair follicles and their roots'],
          'hair-fall-after-pregnancy'                         => ['svc-women', 'a mannequin head seen from above, with a widening parting'],
          'can-dandruff-cause-hair-fall'                      => ['svc-skin', 'a sculpted cross-section of skin with a single hair follicle'],
          'rosemary-onion-juice-and-hair-oils-for-hair-fall'  => ['svc-hair-fall', 'a wooden comb resting on folded towels'],
          'premature-grey-hair-causes'                        => ['ambient', 'sunlight and leaf shadows on an ivory wall with a potted plant'],
          'does-minoxidil-work-for-beard'                     => ['svc-beard', 'a wooden comb and a wooden beard brush on a folded green cloth'],
          'when-does-a-beard-fully-grow'                      => ['svc-follicle', 'a sculpted cross-section of scalp skin with hair follicles'],
          'alopecia-barbae-patchy-beard-hair-loss'            => ['svc-consultation', 'a dermatoscope and notepad on a desk'],
          'is-laser-hair-removal-permanent'                   => ['svc-laser', 'a white handheld device on a white tray beside a folded sage-green towel'],
          'laser-hair-removal-for-pcos-facial-hair'           => ['step-consultation', 'a dermatoscope and notepad on a desk'],
          'melasma-causes-and-treatment'                      => ['svc-skin', 'a sculpted cross-section of skin with a single hair follicle'],
          'acne-scars-treatment-options'                      => ['hero', 'a sculpted cross-section of skin with hair follicles and their roots'],
      ];
    $hubArtDefault = [
        'skin'            => ['svc-skin',      'a sculpted cross-section of skin with a hair follicle'],
          'hair-transplant' => ['stage-temples', 'a mannequin head seen from above, with receding temples'],
          'prp'             => ['hero',          'a sculpted cross-section of scalp skin with hair follicles and roots'],
          'beard'           => ['svc-beard',     'a wooden comb and a beard brush on a green cloth'],
          'hair-fall'       => ['svc-hair-fall', 'a wooden comb resting on folded towels'],
      ];
    return $postArt[$post['slug']] ?? $hubArtDefault[$post['hub']] ?? $hubArtDefault['prp'];
}

/**
 * Illustrations a card can use instead of its own when the page has already
 * shown that one (blog_card(..., $avoidRepeats)). Each alt describes the image.
 */
const BLOG_ART_SPARE = [
    'svc-follicle'    => 'a sculpted cross-section of scalp skin with hair follicles',
    'stage-temples'   => 'a mannequin head seen from above, with receding temples',
    'stage-crown'     => 'a mannequin head seen from above, with thinning at the crown',
    'intro-recipient' => 'a mannequin head seen from the front, with a pencilled hairline',
    'stage-extensive' => 'a mannequin head seen from above, showing an extensive pattern of hair loss',
    'svc-skin'        => 'a sculpted cross-section of skin with a single hair follicle',
];

/** The post's illustration, or the first spare the page has not shown yet. */
function blog_card_art(array $post, bool $avoidRepeats): array
{
    [$key, $alt] = blog_post_art($post);
    if (!$avoidRepeats) {
        return [$key, $alt];
    }
    $used = hp_img_used();
    // The hero image is hand-written on most pages, so it is read from the
    // page's preload hint rather than from hp_img().
    if (preg_match('#/([a-z-]+)-\d+\.webp$#', (string) ($GLOBALS['page']['preload_image'] ?? ''), $m)) {
        $used[$m[1]] = true;
    }
    if (!isset($used[$key])) {
        return [$key, $alt];
    }
    foreach (BLOG_ART_SPARE as $spare => $spareAlt) {
        if (!isset($used[$spare])) {
            return [$spare, $spareAlt];
        }
    }
    return [$key, $alt];
}

function blog_card(array $post, bool $withImage = true, bool $avoidRepeats = false): string
{
    $hub = BLOG_HUBS[$post['hub']] ?? null;

    ob_start(); ?>
<article class="card blog-card">
  <?php if ($withImage): ?>
  <a class="blog-card__media" href="<?= e(blog_url($post['slug'])) ?>" aria-label="<?= e($post['title']) ?>">
    <?php
      // Each post's own AI illustration (blog_post_art()), with its visible
      // AI label (NMC cl. 7.2). A post may still set 'image'/'image_alt' to use
      // a real photograph instead.
      if (!empty($post['image'])) {
          $cardMedia = '<img src="' . e($post['image']) . '" alt="' . e($post['image_alt'] ?? '') . '" width="800" height="500" loading="lazy">';
      } else {
          [$artKey, $artAlt] = blog_card_art($post, $avoidRepeats);
          $cardMedia = hp_img($artKey, 'AI-generated illustration: ' . $artAlt, '(min-width: 1080px) 380px, (min-width: 700px) 45vw, 100vw')
                     . hp_ai_chip('AI-generated');
      }
    ?>
    <div class="media ratio-16-10 media--shadow"><?= $cardMedia ?></div>
  </a>
  <?php endif; ?>
  <div class="blog-card__body">
    <?php if ($hub !== null): ?>
      <span class="pill" style="align-self:flex-start"><?= e($hub['label']) ?></span>
    <?php endif; ?>
    <h3 class="h3 mt-2" style="font-size:20px">
      <a href="<?= e(blog_url($post['slug'])) ?>" style="color:var(--ink);text-decoration:none"><?= e($post['title']) ?></a>
    </h3>
    <p class="body-s mt-2" style="flex:1 1 auto"><?= e($post['excerpt']) ?></p>
    <p class="meta mt-3">
      <time datetime="<?= e($post['published']) ?>"><?= e(blog_date($post['published'])) ?></time>
      · <?= (int) $post['minutes'] ?> min read
      <?php if ($post['reviewed'] ?? true): ?>· Reviewed by <?= e(REVIEWED_BY) ?><?php endif; ?>
    </p>
  </div>
</article>
<?php
    return (string) ob_get_clean();
}
