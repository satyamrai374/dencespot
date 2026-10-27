<?php
/**
 * /blog/hair-fall-after-pregnancy
 *
 * Patient education on postpartum hair shedding (postpartum telogen effluvium):
 * why it happens, the usual onset a few months after delivery and how long it
 * lasts, the causes to look for when it is not just postpartum shedding (iron
 * deficiency, postpartum thyroiditis, PCOS, pattern hair loss), what is
 * generally considered compatible with breastfeeding (always framed as "check
 * with your doctor", no drug named or advised), and practical hair care.
 *
 * Sources checked (14 Oct 2026):
 * - American Academy of Dermatology, "Hair loss in new moms": noticeable a few
 *   months after delivery, peaks about four months, most regain normal growth
 *   by the child's first birthday, see a dermatologist if not after a year;
 *   hair care tips (volumising shampoo, light conditioner on the ends, cut).
 * - DermNet, telogen effluvium: 2–4 month delay; postpartum shedding can
 *   resolve or transition into female pattern hair loss.
 * - American Thyroid Association, "Postpartum thyroiditis": about 5–10% of
 *   women; overactive phase 1–4 months, underactive 4–8 months after delivery;
 *   most recover within 12–18 months; about 20% stay underactive.
 * - Retrospective review of postpartum telogen effluvium, 2016 (PMC4908443):
 *   incidence not precisely known.
 * - US NIH LactMed database (named only as a resource; no drug advice given).
 *
 * Not yet reviewed by the clinic's doctor ('reviewed' => false in BLOG_POSTS,
 * so the byline makes no review claim).
 */

declare(strict_types=1);

$postSlug = 'hair-fall-after-pregnancy';
$postDescription = 'Why hair falls months after childbirth, when shedding stops, signs of an iron, thyroid or PCOS cause, care while breastfeeding and when to see a doctor.';
$postFaqHeading = 'Hair fall after pregnancy FAQs';

/** Drives both the FAQPage schema and the visible accordion, from this one array. */
$postFaqs = [
    ['q' => 'Is it normal to lose hair in clumps after delivery?',
     'a' => 'It is common to see much more hair than usual in the shower, on the brush and on the pillow a few months after delivery. The hair comes from all over the scalp, and the shedding is temporary. Distinct bald patches are not part of ordinary postpartum shedding and should be examined.'],
    ['q' => 'When does postpartum hair fall stop?',
     'a' => 'According to the American Academy of Dermatology, shedding usually peaks about four months after delivery, and most women regain their normal hair growth by the child\'s first birthday, many of them sooner. If your hair has not regained its usual fullness after a year, it is worth having it assessed.'],
    ['q' => 'Can I use hair loss treatments while breastfeeding?',
     'a' => 'Check with your doctor before starting anything, including treatments applied to the scalp, supplements and herbal or ayurvedic products. Some hair loss medicines are unsuitable while breastfeeding, and for others there is limited information. Most postpartum shedding needs no treatment at all, because it settles on its own.'],
    ['q' => 'Should I keep taking the supplements I took in pregnancy?',
     'a' => 'Ask the doctor who is looking after you. Supplements prescribed in pregnancy, such as iron, are often continued after delivery, particularly while breastfeeding or if iron was low, but that depends on your blood results. Avoid adding high-dose hair supplements as well without advice.'],
    ['q' => 'Does cutting my hair short stop the shedding?',
     'a' => 'No. A haircut changes how the hair looks, not how many follicles shed. Some women find a shorter style looks fuller and is easier to manage while the shedding settles, and the American Academy of Dermatology suggests it as one option.'],
    ['q' => 'Can postpartum hair fall turn into permanent thinning?',
     'a' => 'Postpartum shedding itself is temporary. It can, however, reveal female pattern hair loss that was already developing, so the hair does not return to where it was. If the part still looks wider a year after delivery, have the scalp examined; see <a href="/blog/female-pattern-hair-loss-in-women">female pattern hair loss in women</a>.'],
    ['q' => 'Does it happen after every pregnancy?',
     'a' => 'It can happen after any pregnancy, and many women notice it after more than one. How noticeable it is can differ from one pregnancy to the next. If it seems much heavier or longer than last time, that is a reason to check iron and thyroid levels.'],
];
require __DIR__ . '/../includes/blog-header.php';
?>

<p>Hair fall after pregnancy usually starts a few months after delivery, peaks at around four months and then settles on its own, with most women back to their usual fullness by their baby's first birthday. It is a temporary shed called postpartum telogen effluvium, not a sign of going bald, and most of the time it needs no treatment. Shedding that lasts beyond a year, or comes with tiredness, patches or a widening part, is worth checking for low iron, a thyroid problem or pattern hair loss.</p>

<p>It helps to know that the hair falling now was set in motion months ago. That explains the timing, why nothing applied to the scalp makes much difference, and why the useful question is not how to stop the shedding but whether anything else is going on alongside it.</p>

<h2 id="why-hair-falls-after-pregnancy">Why hair falls after pregnancy</h2>

<p>Every scalp hair cycles through a long growth phase, a short transition and a resting phase, after which it falls and is replaced. During pregnancy, high hormone levels keep more hairs than usual in the growth phase, so fewer fall. Many women notice their hair feels thicker in the later months.</p>

<p>After delivery, hormone levels fall quickly, and the hairs that were held in the growth phase move into the resting phase together. A few months later they shed, all at once. The <a href="https://www.aad.org/public/diseases/hair-loss/insider/new-moms" rel="noopener nofollow" target="_blank">American Academy of Dermatology's advice for new mothers</a> links the shedding to falling oestrogen and describes it as excessive shedding rather than true hair loss: the follicles are still there, and new hairs are already growing beneath the ones that fall.</p>

<p>Other things around delivery can add to it. Blood loss, a caesarean or other surgery, a fever or infection, and a sharp cut in food to lose pregnancy weight are all recognised triggers of the same kind of shed. How many women experience noticeable postpartum shedding is not precisely known, but it is common.</p>

<h2 id="when-it-starts-and-stops">When it starts, and when it stops</h2>

<p>The timeline below is typical. It varies from woman to woman and from one pregnancy to the next.</p>

<div class="table-scroll">
  <table class="data data--fit">
    <caption class="sr-only">Typical timeline of hair shedding after childbirth</caption>
    <thead>
      <tr><th scope="col">When</th><th scope="col">What is typical</th></tr>
    </thead>
    <tbody>
      <tr><th scope="row" style="white-space:normal">Later pregnancy</th><td>Hair often feels thicker, because fewer hairs are shedding</td></tr>
      <tr><th scope="row" style="white-space:normal">First two months after delivery</th><td>Little change for most women</td></tr>
      <tr><th scope="row" style="white-space:normal">Two to four months</th><td>Shedding starts, noticed in the shower, on the brush and on the pillow</td></tr>
      <tr><th scope="row" style="white-space:normal">Around four months</th><td>Shedding usually peaks</td></tr>
      <tr><th scope="row" style="white-space:normal">Six to twelve months</th><td>Shedding eases, and short new hairs often show along the hairline</td></tr>
      <tr><th scope="row" style="white-space:normal">By the first birthday</th><td>Most women have regained their usual fullness, many sooner</td></tr>
      <tr><th scope="row" style="white-space:normal">Beyond twelve months</th><td>Continued thinning is worth having assessed</td></tr>
    </tbody>
  </table>
</div>

<p>Two features mark ordinary postpartum shedding. It is diffuse, coming from the whole scalp rather than one area, and it is self-limiting, easing over months without treatment. The same pattern follows other shocks to the system, such as a high fever or surgery, and <a href="/blog/telogen-effluvium-vs-pattern-hair-loss">telogen effluvium versus pattern hair loss</a> explains the wider picture.</p>

<h2 id="when-it-is-not-just-postpartum">When it is not just postpartum shedding</h2>

<p>The months after delivery are also when several other causes of hair loss tend to appear, and their symptoms are easily put down to a new baby. These are the four worth knowing.</p>

<h3>Iron deficiency</h3>

<p>Pregnancy draws heavily on iron stores, and blood loss at delivery adds to that. Low iron can deepen and prolong shedding, and it also causes tiredness, breathlessness and pale skin, which are easy to blame on broken sleep. A ferritin test with a full blood count shows it. <a href="/blog/vitamin-deficiency-and-hair-loss">Vitamin deficiency and hair loss</a> covers which deficiencies matter for hair and how long recovery takes once one is corrected.</p>

<h3>Postpartum thyroiditis</h3>

<p>Inflammation of the thyroid after delivery affects about 5 to 10 per cent of women, according to the <a href="https://www.thyroid.org/postpartum-thyroiditis/" rel="noopener nofollow" target="_blank">American Thyroid Association</a>. It can cause an overactive phase, usually one to four months after delivery, with anxiety, poor sleep, a racing heart and weight loss, followed by an underactive phase, usually four to eight months after delivery, with tiredness, weight gain, low mood and feeling cold. Some women have only one phase. Most return to normal thyroid function within 12 to 18 months, but some remain underactive and need ongoing treatment.</p>

<p>The underactive phase falls right in the window when postpartum shedding should be easing, so hair fall that worsens or drags on around six months, together with those symptoms, is a reason for a thyroid blood test. <a href="/blog/thyroid-and-hair-loss">Thyroid problems and hair loss</a> explains the tests and the recovery timeline.</p>

<h3>Polycystic ovary syndrome</h3>

<p>PCOS can cause thinning over the top of the scalp, usually with acne, increased facial or body hair and irregular periods. After delivery the period clue is harder to read, because periods are often absent or irregular while breastfeeding anyway. If the other features are present, or were before pregnancy, mention them.</p>

<h3>Pattern hair loss revealed by the shed</h3>

<p>Postpartum shedding does not cause female pattern hair loss, but DermNet notes that it can transition into it, and a heavy shed often makes pattern thinning that was already developing visible for the first time. The sign is a centre part that stays wider than before, or a ponytail that stays thinner, well after the shedding has eased. <a href="/blog/female-pattern-hair-loss-in-women">Female pattern hair loss in women</a> explains how it is assessed.</p>

<?= blog_cta(
    'Shedding that has gone on longer than you expected?',
    'A consultation puts the timing of your delivery together with a scalp examination and blood tests where indicated, to see whether this is postpartum shedding settling or something that needs treatment.'
) ?>

<h2 id="treatment-while-breastfeeding">Treatment while breastfeeding: check with your doctor</h2>

<p>For most women, postpartum shedding needs no treatment, because it settles on its own. Where something does need treating, breastfeeding changes the options, and the decision belongs to a doctor who knows you are feeding.</p>

<p>What is generally considered compatible with breastfeeding, though still worth confirming with your doctor:</p>

<ul>
  <li>Gentle hair care with ordinary shampoos and conditioners.</li>
  <li>A balanced diet with enough protein and iron-containing foods.</li>
  <li>Correcting a deficiency that blood tests have shown, under medical supervision.</li>
  <li>Treating a thyroid problem, which is managed by the doctor caring for you, taking breastfeeding into account.</li>
</ul>

<p>What needs your doctor's advice first: any medicine for hair loss, whether taken by mouth or applied to the scalp, because some are unsuitable while breastfeeding and for others the information is limited; supplements beyond those already prescribed, including hair, skin and nail products; herbal and ayurvedic preparations; and scalp procedures. Tell every doctor you see that you are breastfeeding. Doctors can also check a reference such as the US National Institutes of Health's LactMed database, which summarises what is known about medicines in breast milk.</p>

<h2 id="practical-care">Practical hair care while it settles</h2>

<ul>
  <li><strong>Keep washing normally.</strong> Hairs that come out in the shower were already loose. Washing less often only means more come out at once.</li>
  <li><strong>Choose lighter products.</strong> The American Academy of Dermatology suggests a volumising shampoo and a conditioner made for fine hair, applied mainly to the ends, and avoiding heavy conditioners that weigh hair down.</li>
  <li><strong>Avoid tight styles.</strong> Tight buns, plaits and ponytails pull on the hairline and can cause traction hair loss of their own. Loose styles and soft ties are kinder while the hair feels thin.</li>
  <li><strong>Handle wet hair gently.</strong> Use a wide-toothed comb, let hair dry partly before brushing, and keep heat styling down.</li>
  <li><strong>Consider a shorter cut</strong> if the length is making the shedding distressing to see. It does not change the shedding, but some women find it easier to manage.</li>
  <li><strong>Eat regularly.</strong> Rapid weight loss after delivery can add a second shed, so steady changes are easier on the hair.</li>
  <li><strong>Take a photograph each month</strong> in the same light, so recovery can be seen rather than guessed.</li>
</ul>

<p>Be wary of products sold as a fix for postpartum hair fall. The shedding usually settles on its own, which is how many products earn a reputation they do not deserve.</p>

<h2 id="when-to-see-a-doctor">When to see a doctor</h2>

<ul>
  <li>Your hair has not regained its usual fullness a year after delivery, or the shedding is getting worse after six months rather than easing.</li>
  <li>You notice bald patches, broken hairs, or redness, scaling or soreness on the scalp.</li>
  <li>Your part looks wider, or your ponytail thinner, after the shedding has eased.</li>
  <li>The hair fall comes with tiredness, breathlessness, a racing heart, feeling unusually hot or cold, or weight change.</li>
  <li>You have acne, increased facial hair or irregular periods that are not explained by breastfeeding.</li>
</ul>

<p>Low mood or anxiety that does not lift after delivery deserves a conversation with your doctor in its own right, whatever is happening with your hair.</p>

<h2 id="getting-it-assessed">Getting it assessed</h2>

<p>An assessment starts with the timing of your delivery and how the shedding has behaved since, then a scalp examination with trichoscopy, and blood tests such as ferritin and thyroid function where indicated. Consultations at our clinics in Sector 39, Gurugram and Rohini, Delhi are with registered medical practitioners, and it helps to bring your delivery date and any blood reports from pregnancy. The <a href="/womens-hair-loss-treatment-in-gurgaon">women's hair loss treatment page for Gurugram</a> and the <a href="/womens-hair-loss-treatment-in-rohini">women's hair loss treatment page for Rohini, Delhi</a> explain how the assessment works. To organise your symptoms first, the <a href="/hair-loss-assessment">hair loss self-assessment</a> is a reasonable start, though it is not a diagnosis.</p>

<?php require __DIR__ . '/../includes/blog-footer.php'; ?>
