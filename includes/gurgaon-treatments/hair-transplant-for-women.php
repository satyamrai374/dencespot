<?php
/**
 * Copy for the Gurugram hair transplant for women area pages,
 * /hair-transplant-for-women-in-<area> (schema: includes/gurgaon-treatment-area-page.php).
 * Facts as on /hair-transplant-for-women-in-gurgaon (diagnosis before surgery,
 * diffuse versus localised loss, a stable donor, traction, a high hairline,
 * scars, post-partum shedding, a trimmed or unshaven donor), written fresh.
 * No drug names, prices or results row: the consented scalp photographs are
 * not of women's cases. The Gurugram clinic only.
 */

declare(strict_types=1);

return [
    'form_treatment' => 'Hair transplant',
    'form'           => ['Hair transplant — women', 'Traction loss at the hairline', 'High hairline', 'Women’s hair loss treatment', 'Not sure — please advise'],
    'faq_about'      => 'hair, health history or budget',
    'results'        => false,

    'middle' => [
        'heading' => 'Worth Bringing to Your First Visit',
        'sub'     => 'It helps the doctor find the cause sooner.',
        'cols'    => ['Bring', 'Why it helps'],
        'rows'    => [
            ['Every medicine and supplement', 'Some can trigger shedding'],
            ['Recent blood reports', 'May spare repeat tests'],
            ['Older photos of your hair', 'Show how the loss has changed'],
            ['Dates of key events', 'Births, illness, weight change'],
            ['How you usually style it', 'Pulling styles cause traction loss'],
        ],
        'note'    => 'The first visit is about diagnosis. Surgery is only discussed if the findings point towards it.',
    ],

    'steps' => [
        'eyebrow'   => 'The process',
        'heading'   => 'How a Woman’s Case Is Worked Through',
        'intro'     => 'Diagnosis takes up the first three stages at the Gurugram clinic. Many women leave those with a medical plan and never need the last two.',
        'items'     => [
            ['chat', 'Your Story', 'When the thinning began and what happened around it: a pregnancy, an illness, weight change, a new medicine or a stressful spell.'],
            ['search', 'Scalp and Donor Exam', 'The pattern viewed under magnification and the hair over the back and sides checked for density, to tell diffuse thinning from loss in one zone.'],
            ['doc', 'Tests if Needed', 'Bloodwork such as iron and thyroid where your history points to it, with the results explained before any plan is made.'],
            ['hairline', 'Design for a Woman', 'If surgery fits, the area agreed and a softer, rounder hairline drawn, with the donor trimmed in a hidden band or left unshaven.'],
            ['camera', 'Procedure and Reviews', 'A day case under local anaesthetic, then photographed reviews, with medical treatment carrying on where loss continues.'],
        ],
        'note_html' => 'Background reading: <a href="/blog/female-pattern-hair-loss-in-women">female pattern hair loss</a>, <a href="/blog/telogen-effluvium-vs-pattern-hair-loss">shedding versus pattern loss</a> and <a href="/blog/blood-tests-for-hair-fall">blood tests for hair fall</a>.',
    ],

    'cost' => [
        'factors' => [
            ['search', 'mint', 'Diagnosis first', 'If a treatable cause turns up, treatment may replace surgery at far lower cost.'],
            ['settings', 'violet', 'Unshaven or trimmed', 'Unshaven work takes longer and is priced to match.'],
            ['chart', 'sky', 'Area and skin', 'A hairline, a single patch or scarred skin each need different work.'],
        ],
        'links' => [
            '/hair-transplant-cost-in-gurgaon' => 'Gurgaon cost guide',
            '/cost-and-emi-options'            => 'Payment and EMI options',
        ],
    ],

    'related' => [
        '/hair-transplant-for-women-in-gurgaon'  => 'Hair transplant for women in Gurgaon',
        '/womens-hair-loss-treatment-in-gurgaon' => 'Women’s hair loss treatment',
        '/unshaven-hair-transplant-in-gurgaon'   => 'Unshaven hair transplant',
        '/blog/hair-fall-after-pregnancy'        => 'Hair fall after pregnancy',
    ],

    'area' => [
        'lead'            => 'There the first visit is spent working out why your hair is thinning and measuring your donor hair; surgery comes up only when the thinning is limited to one patch or zone with stable hair behind it.',
        'feats'           => [['search', 'Cause found before surgery'], ['chart', 'Donor density measured'], ['settings', 'Unshaven options discussed']],
        'heading'         => 'Hair Transplant for Women: Patients From {area}',
        'visits_line'     => 'The first assessment, any tests, the procedure if it is advised and every review are held at our clinic in Sector 39.',
        'day_heading'     => 'At the First Appointment',
        'day'             => 'Nothing is shaved or operated on at the first visit, so come from {area} with your hair worn the way you normally wear it. The doctor examines your parting, front hairline and donor area under magnification, asks about your health, cycle and any pregnancies, and arranges tests if they are needed.',
        'visits_intro'    => 'A first visit for history and examination, any tests it leads to and a talk through the results, then — only if a transplant is advised — the procedure day and photographed reviews afterwards, each one in Sector 39, Gurugram.',
        'visit_icons'     => [['chat', 'History Taken First'], ['doc', 'Tests Where Needed'], ['hairline', 'Hairline Drawn for a Woman'], ['camera', 'Reviews if Operated']],
        'options_heading' => 'Surgery or Medical Care: Which Fits Your Loss',
        'options_html'    => 'A transplant moves hair; it cannot make more, so it suits a defined area with stable hair behind it, such as old traction loss, a hairline that has always sat high or a settled scar. Thinning that covers the whole top of the head, or reaches the back and sides, is usually a matter for medical treatment. More on the <a href="{parent}">hair transplant for women in Gurgaon</a> page.',
        'cost_heading'    => 'Cost: Diagnosis First, Then a Written Quote',
        'cost_intro'      => 'There is no published fee. If the assessment turns up a cause that treatment can reach, that is what you will be advised, and it costs far less than surgery. Where grafting is advised, the quote follows the graft number, shaven or unshaven donor work and the skin being treated, and it comes in writing.',
        'faqs'            => [
            ['q' => 'Where will I be seen if I live in {area}?',
             'a' => 'In Sector 39, Gurugram: the clinic stands on Sector 39 Road in Jharsa, opposite Medanta – The Medicity. With no DenceSpot clinic in {area}, your history, examination, any procedure and every review are handled there.'],
            ['q' => 'How do I travel to Sector 39 from {area}?',
             'a' => '{route} The Directions button gives turn-by-turn help on Google Maps. After a procedure, go home by car or cab, since a helmet would press on the grafts.'],
            ['q' => 'Will I be told if surgery is not right for me?',
             'a' => 'Yes, plainly. Diffuse thinning that reaches the back and sides, shedding after childbirth that has not had time to settle, untreated low iron or thyroid trouble, and hairstyles that still pull are all reasons to wait or choose medical care. Several become suitable once the cause is treated; see <a href="/womens-hair-loss-treatment-in-gurgaon">women’s hair loss treatment</a>.'],
            ['q' => 'Does living in {area} affect the cost?',
             'a' => 'No. The figure depends on whether surgery is advised at all and, if it is, on how many grafts are needed, whether the donor is trimmed or left unshaven, and the condition of the skin being grafted. The <a href="/hair-transplant-cost-in-gurgaon">Gurgaon cost guide</a> sets out the factors.'],
            ['q' => 'Can I keep my hair long for work in {area}?',
             'a' => 'In most cases, yes. The donor area is often trimmed only in a hidden band at the back, covered by the longer hair above it; an entirely unshaven session suits smaller areas and runs longer. Ties, clips and tight buns wait until a review. See <a href="/unshaven-hair-transplant-in-gurgaon">unshaven hair transplant</a>.'],
            ['q' => 'My hair thinned after my baby. Is a transplant the answer?',
             'a' => 'Rarely. That kind of shedding is a temporary upset of the hair cycle and usually recovers by itself over several months; operating during it would spend donor hair that may never be needed. The doctor may check iron and thyroid and look again once time has passed.'],
            ['q' => 'Can I send photos from {area} first?',
             'a' => 'Yes. Three daylight pictures help most — the parting seen from above, your hairline from the front and your donor area from behind — along with a line on when the thinning started and anything that happened around then. The reply suggests a next step; the surgical decision waits for the examination.'],
        ],
        'consult_intro'   => 'Choose a day for a first appointment in Sector 39. You leave with either a likely cause or a list of tests to confirm one, and a straight answer on whether grafting would help; any booking is your decision, made later if you wish.',
        'descriptions'    => [
            'Hair transplant for women from {area}, assessed at DenceSpot’s Sector 39 clinic in Gurugram: diagnosis first, unshaven options, cost and FAQs.',
            'Hair transplant for women from {area} at DenceSpot, Sector 39, Gurugram: diagnosis first, cost and FAQs.',
            'Women’s hair transplant for {area} at DenceSpot Gurugram: diagnosis first, cost, FAQs.',
        ],
    ],
];
