<?php
/**
 * /blog/thyroid-and-hair-loss
 *
 * Patient education on thyroid disorders and hair: how an underactive and an
 * overactive thyroid affect hair, the diffuse shedding pattern, the outer-
 * eyebrow sign (what is true and what is overstated), the tests (TSH first,
 * free T4 where indicated, TPO antibodies), the part medicines and the illness
 * itself play, a month-by-month guide to recovery once levels are treated, and
 * the association between thyroid autoimmunity and alopecia areata. Thyroid
 * disease itself is managed by the patient's physician or endocrinologist; the
 * article does not say the clinic treats it.
 *
 * Sources checked (14 Oct 2026):
 * - British Thyroid Foundation, "Hair loss and thyroid disorders": diffuse
 *   loss, unusual in mild or short-lived disease, regrowth over several months
 *   and possibly incomplete, antithyroid drugs rarely implicated, radioiodine
 *   not a cause, alopecia areata more common in autoimmune thyroid disease.
 * - British Thyroid Foundation, "Thyroid function tests"; NICE NG145, Thyroid
 *   disease: assessment and management (TSH first, FT4 if TSH raised, FT4 and
 *   FT3 if low, TPO antibodies if TSH raised, no repeat within 6 weeks).
 * - "Impact of Thyroid Dysfunction on Hair Disorders", review (PMC10492440):
 *   coarse, dry, brittle hair in hypothyroidism; fine hair in thyrotoxicosis.
 * - DermNet, hypothyroidism. CMAJ and case literature on the sign of Hertoghe
 *   (outer-eyebrow loss) and its other causes.
 * - Lee S et al. "Screening of thyroid function and autoantibodies in patients
 *   with alopecia areata: a systematic review and meta-analysis." J Am Acad
 *   Dermatol 2019 (doi 10.1016/j.jaad.2018.10.066), 50 studies; and Lee S et
 *   al., "Comorbidities in alopecia areata", JAAD 2019 (PubMed 30031145).
 * - Levothyroxine product information (transient partial hair loss in the
 *   first months, mainly in children). Biotin assay interference literature.
 *
 * Names no product, brand or dose. Not yet reviewed by the clinic's doctor
 * ('reviewed' => false in BLOG_POSTS, so the byline makes no review claim).
 */

declare(strict_types=1);

$postSlug = 'thyroid-and-hair-loss';
$postDescription = 'How an underactive or overactive thyroid affects hair, the eyebrow sign, TSH and free T4 tests, the alopecia areata link, and the regrowth timeline in months.';
$postFaqHeading = 'Thyroid and hair loss FAQs';

/** Drives both the FAQPage schema and the visible accordion, from this one array. */
$postFaqs = [
    ['q' => 'Will my hair grow back after thyroid treatment?',
     'a' => 'Usually, once thyroid levels have been stable in the normal range for a while, but it takes several months, and the British Thyroid Foundation notes that regrowth may be incomplete. If shedding continues after about six months of stable, normal results, another cause such as low iron or pattern hair loss should be looked for.'],
    ['q' => 'Can levothyroxine cause hair loss?',
     'a' => 'Product information for levothyroxine notes that partial hair loss can occur in the first few months of treatment, mainly in children, and that it is usually temporary. More often, hair loss blamed on the tablet is the delayed effect of the thyroid problem itself. Do not stop or change the dose without speaking to the doctor who prescribed it.'],
    ['q' => 'Does thyroid hair loss cause bald patches?',
     'a' => 'Thyroid-related hair loss is typically diffuse, thinning the whole scalp rather than leaving patches. Round, smooth bald patches suggest alopecia areata, which is more common in people with autoimmune thyroid disease but is a separate condition with its own treatment.'],
    ['q' => 'Is losing the outer third of the eyebrows a sure sign of hypothyroidism?',
     'a' => 'No. It is a classic textbook sign, but studies find it in only a minority of people with an underactive thyroid, and the outer eyebrows also thin with age, years of threading or plucking, eczema and some hair conditions. A TSH blood test answers the question; the eyebrows do not.'],
    ['q' => 'My TSH is normal but my hair is still falling. Could it still be my thyroid?',
     'a' => 'A normal TSH makes a thyroid cause unlikely, unless a pituitary problem is suspected, in which case free T4 is measured as well. Hair fall with a normal thyroid result usually has another explanation, such as iron deficiency, a reactive shed or pattern hair loss, and a scalp examination is the next step.'],
    ['q' => 'Can a mildly raised TSH cause hair loss?',
     'a' => 'The British Thyroid Foundation describes hair loss from mild or short-lived thyroid problems as unusual; it is more typical of severe and prolonged under- or overactivity. Whether a mildly raised TSH needs treatment is decided by your doctor from repeat tests and symptoms, not from the hair alone.'],
    ['q' => 'Do hair or thyroid supplements help?',
     'a' => 'Not for the thyroid. Biotin can distort thyroid blood tests, and the British Thyroid Foundation advises caution with hair supplements that contain iodine or that can reduce the absorption of levothyroxine. Iron and calcium tablets can also reduce absorption if taken at the same time, so ask your doctor how to space them.'],
];
require __DIR__ . '/../includes/blog-header.php';
?>

<p>Both an underactive and an overactive thyroid can cause hair loss, usually as diffuse thinning across the whole scalp rather than bald patches, and usually when the thyroid problem is significant or long-standing. A TSH blood test is the standard first check. Once thyroid levels are brought back to normal, hair generally regrows, but it takes several months and recovery is not always complete.</p>

<p>Thyroid problems are common, particularly in women, and they are also blamed for a good deal of hair fall they did not cause. This article covers what thyroid-related hair loss looks like, which part of the eyebrow story is true, which tests are used, the part medicines play, what recovery looks like month by month, and the link between thyroid autoimmunity and alopecia areata.</p>

<h2 id="how-thyroid-affects-hair">How thyroid problems affect hair</h2>

<p>Thyroid hormones help regulate the hair growth cycle. When there is too little or too much, more follicles than usual move into their resting phase and shed, and the hair that grows can change in quality. According to the <a href="https://www.btf-thyroid.org/hair-loss-and-thyroid-disorders" rel="noopener nofollow" target="_blank">British Thyroid Foundation's guidance on hair loss</a>, it is severe and prolonged thyroid disease that causes hair loss, and it is unusual for mild or short-lived problems to do so.</p>

<h3>Underactive and overactive thyroid compared</h3>

<div class="table-scroll">
  <table class="data">
    <caption class="sr-only">How an underactive and an overactive thyroid usually affect hair, with other common symptoms</caption>
    <thead>
      <tr><th scope="col">Feature</th><th scope="col">Underactive (hypothyroidism)</th><th scope="col">Overactive (hyperthyroidism)</th></tr>
    </thead>
    <tbody>
      <tr><th scope="row">Hair texture</th><td>Dry, coarse, brittle and slow-growing</td><td>Fine and thin</td></tr>
      <tr><th scope="row">Pattern of loss</th><td>Diffuse, across the whole scalp</td><td>Diffuse, across the whole scalp</td></tr>
      <tr><th scope="row" style="white-space:normal">Other common symptoms</th><td>Tiredness, weight gain, feeling cold, constipation, dry skin, heavier or irregular periods</td><td>Weight loss, a racing heart, feeling hot, tremor, anxiety, irregular periods</td></tr>
      <tr><th scope="row" style="white-space:normal">Usual cause</th><td>Autoimmune thyroiditis (Hashimoto's)</td><td>Graves' disease, an autoimmune condition</td></tr>
    </tbody>
  </table>
</div>

<p>A review of thyroid dysfunction and hair disorders in the medical literature describes the same contrast: slow-growing, coarse, dry, brittle hair in an underactive thyroid, and fine hair in an overactive one.</p>

<h3>The shedding pattern</h3>

<p>Thyroid-related shedding comes from all over the scalp. It is noticed in the shower, the brush and the pillow, and as a ponytail that feels thinner, rather than as a bald patch or a receding hairline. Because of the delay built into the hair cycle, it tends to become obvious several months after the thyroid problem began, and occasionally before other symptoms are noticed. Patches point towards alopecia areata, and thinning concentrated at the crown, temples or centre part points towards pattern loss, either of which can coexist with a thyroid disorder.</p>

<h3>The eyebrow question: myth and reality</h3>

<p>Thinning of the outer third of the eyebrows is a classic textbook sign of an underactive thyroid, sometimes called the sign of Hertoghe. It is real, and DermNet lists it among the features of hypothyroidism. What is overstated is its value. Studies of people with hypothyroidism find it in only a minority, so normal eyebrows do not rule a thyroid problem out. And the outer eyebrows also thin with age, after years of threading or plucking, with eczema and rubbing, in alopecia areata, and in frontal fibrosing alopecia, a scarring condition that matters not to miss. Thin outer eyebrows are a reason to ask about the thyroid, not an answer.</p>

<h2 id="the-tests">The tests: TSH first, free T4 where indicated</h2>

<p>Thyroid function is checked with a blood test, not by looking at the hair. The approach in the UK's <a href="https://www.nice.org.uk/guidance/ng145" rel="noopener nofollow" target="_blank">NICE guideline on thyroid disease</a> is a sensible model:</p>

<ul>
  <li><strong>TSH alone as the first test</strong> in adults when a pituitary problem is not suspected. If TSH is normal, the thyroid is very likely working normally.</li>
  <li><strong>Free T4 added when TSH is raised</strong>, to confirm an underactive thyroid and judge its degree.</li>
  <li><strong>Free T4 and free T3 when TSH is low</strong>, to confirm an overactive thyroid.</li>
  <li><strong>TSH and free T4 together from the start</strong> when a pituitary cause is suspected, because TSH alone can mislead in that situation.</li>
  <li><strong>Thyroid peroxidase (TPO) antibodies</strong> may be checked when TSH is raised, to show whether an autoimmune cause is likely.</li>
</ul>

<p>Two practical points. Biotin, found in many hair supplements, can distort thyroid results, sometimes producing a pattern that looks like an overactive thyroid when the gland is normal; <a href="/blog/vitamin-deficiency-and-hair-loss">vitamin deficiency and hair loss</a> explains why supplements should wait until after testing. And if you already take thyroid medicine, ask how to time your dose on the day of the test. Thyroid tests are one part of the short core set described in <a href="/blog/blood-tests-for-hair-fall">which blood tests matter for hair fall</a>, alongside ferritin, because low iron and thyroid problems are both common in women and can coexist.</p>

<h2 id="medicines-and-the-illness">Medicines, the illness itself, and what gets blamed</h2>

<p>Hair loss from a thyroid disorder tends to appear months after the disorder began, which is often around the time treatment starts. The British Thyroid Foundation notes that thyroid medicine is therefore sometimes wrongly blamed for shedding that the illness caused, and that stopping treatment can make the hair loss worse.</p>

<ul>
  <li><strong>Levothyroxine.</strong> Product information notes that partial hair loss can occur in the first few months, mainly in children, and is usually temporary. A dose that is too high or too low over time can also affect the hair, which is one reason doses are adjusted to blood results.</li>
  <li><strong>Antithyroid medicines.</strong> Carbimazole and propylthiouracil can, in rare cases, cause diffuse hair loss, though the Foundation considers the earlier overactivity the more likely cause in most people.</li>
  <li><strong>Radioactive iodine</strong> does not cause scalp hair loss, according to the Foundation.</li>
  <li><strong>Medicines for other conditions,</strong> such as lithium and amiodarone, can affect how the thyroid works, which is worth mentioning if you take them.</li>
</ul>

<p>Never stop or change a thyroid medicine because of hair fall without speaking to the doctor who prescribed it. Shedding that seems linked to a medicine is a reason for a conversation and a blood test, not for stopping treatment.</p>

<?= blog_cta(
    'Thyroid treated, hair still falling?',
    'A consultation looks at your scalp alongside your thyroid results and history, to see whether the shedding is still the thyroid settling or something else, such as low iron or pattern thinning.'
) ?>

<h2 id="what-to-expect-after-treatment">What to expect once levels are treated</h2>

<p>The Foundation describes regrowth as usual once the thyroid disorder is successfully treated, but says it takes several months and may be incomplete. As a rough guide, which varies from person to person:</p>

<ol>
  <li><strong>The first two to three months of normal levels.</strong> Shedding can continue, because hairs pushed into the resting phase earlier still have to fall. This is expected and does not mean the treatment has failed.</li>
  <li><strong>Around three to six months.</strong> Shedding usually eases, and short new hairs may be visible along the hairline and part.</li>
  <li><strong>Six to twelve months.</strong> Density improves gradually. Scalp hair grows roughly a centimetre a month, so the change is easier to see in photographs taken at the start than in the mirror.</li>
</ol>

<p>Recovery depends on levels staying stable, which is why doses are checked with repeat blood tests, usually some weeks after a change rather than days. After severe, long-standing hypothyroidism, some follicles may not fully recover. If shedding continues after about six months of stable, normal results, look for something else: iron deficiency, a long-running shed, or female or male pattern hair loss, which is common and can simply coexist. <a href="/blog/telogen-effluvium-vs-pattern-hair-loss">Telogen effluvium versus pattern hair loss</a> explains how a scalp examination separates them.</p>

<h2 id="thyroid-autoimmunity-and-alopecia-areata">Thyroid autoimmunity and alopecia areata</h2>

<p>The most common causes of both an underactive and an overactive thyroid are autoimmune, and alopecia areata is autoimmune too. The two travel together more often than chance would explain. The British Thyroid Foundation notes this, and a 2019 systematic review and meta-analysis of 50 studies in the Journal of the American Academy of Dermatology found that people with alopecia areata had higher odds of thyroid autoantibodies and autoimmune thyroid disease than people without it.</p>

<p>Alopecia areata looks different from thyroid shedding. It usually causes smooth, round patches on the scalp, and sometimes in the eyebrows or beard, although a diffuse form exists. Treating the thyroid does not treat alopecia areata; each needs its own management. In practice, a doctor assessing alopecia areata will often ask about thyroid symptoms and may check thyroid function, and someone with autoimmune thyroid disease who develops patches should have them examined. <a href="/alopecia-areata-treatment-in-gurgaon">Alopecia areata treatment</a> describes how patchy hair loss is assessed and managed.</p>

<h2 id="when-to-see-a-doctor">When to see a doctor</h2>

<ul>
  <li>Diffuse shedding together with tiredness, weight change, feeling unusually cold or hot, a racing heart, or changes in your periods.</li>
  <li>A swelling in the front of the neck, or changes in the eyes such as bulging, grittiness or double vision. See a doctor promptly for these.</li>
  <li>Shedding that continues six months or more after your thyroid results have become stable and normal.</li>
  <li>Round bald patches, broken hairs, or patches in the eyebrows or beard.</li>
  <li>New thinning within a year of having a baby, when a temporary thyroid inflammation is a recognised cause; see <a href="/blog/hair-fall-after-pregnancy">hair fall after pregnancy</a>.</li>
</ul>

<p>Thyroid disease itself is managed by your physician or an endocrinologist. The scalp is worth examining separately when the hair does not follow the thyroid back to normal.</p>

<h2 id="getting-it-assessed">Getting it assessed</h2>

<p>Consultations at our clinics in Sector 39, Gurugram and Rohini, Delhi are with registered medical practitioners. They bring your thyroid results and history together with a scalp examination and trichoscopy, and add other blood tests only where indicated. The <a href="/hair-fall-treatment-in-gurgaon">hair fall treatment page for Gurugram</a> and the <a href="/hair-fall-treatment-in-rohini">hair fall treatment page for Rohini, Delhi</a> explain the process. Bring your recent thyroid reports and a list of every medicine and supplement you take. To organise your symptoms first, try the <a href="/hair-loss-assessment">hair loss self-assessment</a>; it is a starting point, not a diagnosis.</p>

<?php require __DIR__ . '/../includes/blog-footer.php'; ?>
