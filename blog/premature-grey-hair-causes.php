<?php
/**
 * /blog/premature-grey-hair-causes
 *
 * Patient education on grey hair in the twenties: what counts as premature,
 * genetics, vitamin B12 deficiency, thyroid disease, smoking, oxidative and
 * psychological stress, sudden white patches from vitiligo and alopecia
 * areata, which tests are reasonable, what can and cannot reverse greying
 * (deficiency-related greying may partly improve; genetic greying generally
 * does not), and hair dye allergy (PPD) with patch testing. Makes no product
 * claims and names no product or brand; gives no doses.
 *
 * Sources checked (Oct 2026): IADVL patient pages (premature greying of hair;
 * hair dye allergy); Kumar, Shamim and Nagaraju, "Premature Graying of Hair:
 * Review with Updates", Int J Trichology 2018 (PMC6290285); Zayed et al.,
 * Indian Dermatol Online J 2013 (smoking, PMID 23741662); DermNet (alopecia
 * areata, vitiligo, poliosis, allergy to paraphenylenediamine); NHS (hair dye
 * reactions); Zhang et al., Nature 2020 (stress and pigment stem cells in
 * mice); Rosenberg et al., eLife 2021 (greying and reversal in 14 people);
 * case reports of repigmentation after treating B12 deficiency.
 *
 * Not yet reviewed by the clinic's doctor ('reviewed' => false in BLOG_POSTS),
 * so the byline reads "Written by the DenceSpot Clinic team".
 */

declare(strict_types=1);

$postSlug = 'premature-grey-hair-causes';
$postDescription = 'Grey hair in your 20s is usually genetic, but B12, thyroid, smoking and vitiligo can play a part. Which tests help, what can reverse it and how to dye safely.';
$postFaqHeading = 'Premature grey hair FAQs';
$postFaqId = 'premature-grey-hair-faqs';

/** Drives both the FAQPage schema and the visible accordion, from this one array. */
$postFaqs = [
    ['q' => 'At what age is grey hair considered premature in India?',
     'a' => 'The Indian Association of Dermatologists, Venereologists and Leprologists (IADVL) describes greying as premature when it starts before about 25 in people of Asian origin. A few grey hairs in your twenties are common and, with a family history, usually mean nothing more than inherited timing.'],
    ['q' => 'Does plucking a grey hair make more grow back?',
     'a' => 'No. Each follicle works independently, so pulling out one grey hair does not cause grey hairs around it. Repeated plucking can damage the follicle over time, though, so the IADVL advises leaving grey hairs alone or trimming them instead.'],
    ['q' => 'Can stress turn hair grey?',
     'a' => 'It may play a part. In mice, acute stress depleted the stem cells that supply hair pigment. A small 2021 study in people found some individual hairs greyed during stressful periods and a few regained colour when the stress eased, mainly hairs that seemed close to greying anyway. Stress is unlikely to explain early greying on its own.'],
    ['q' => 'Can vitamin B12 tablets reverse grey hair?',
     'a' => 'Only if greying is related to a B12 deficiency, and even then any improvement is partial and slow. Case reports describe hair regaining colour after a deficiency was treated. If tests show you are not deficient, extra B12 will not change grey hair. Take supplements as prescribed by a doctor after testing.'],
    ['q' => 'Is premature grey hair a sign of illness?',
     'a' => 'Usually not. Most early greying is genetic. It is worth checking for vitamin B12 deficiency and thyroid disease if there is no family history, if greying is rapid, or if you have other symptoms such as tiredness, pins and needles or weight change. Sudden white patches need examining for vitiligo or alopecia areata.'],
    ['q' => 'Does hair dye make grey hair worse?',
     'a' => 'No. The IADVL notes that dye does not change pigment production in the follicle, so it does not cause more grey hair. Dyes can irritate the scalp or cause an allergy, which is why a patch test before use matters.'],
    ['q' => 'Is henna safer than hair dye for grey hair?',
     'a' => 'Pure henna stains hair red-brown and is less often a cause of allergy than permanent dye, but it can still cause reactions. Products sold as black henna or kala mehndi may contain PPD, the dye chemical most often behind hair dye allergy. Read the ingredients and patch-test any product first.'],
    ['q' => 'Can grey hair turn dark again on its own?',
     'a' => 'Occasionally individual hairs do, particularly after a deficiency or thyroid problem is treated, and in a small study some hairs regained colour after stress eased. Genetic greying generally does not reverse, and no treatment has been shown to restore pigment to hair that has greyed with age.'],
];
require __DIR__ . '/../includes/blog-header.php';
?>

<p>Grey hair in your twenties is most often genetic: if a parent or grandparent went grey early, you are more likely to as well, and there is no illness behind it. Less often, early greying is linked to something that can be checked, such as low vitamin B12 or a thyroid disorder, and smoking is associated with it too. Greying related to a corrected deficiency may partly improve, genetic greying generally does not reverse, and sudden white patches of hair need a doctor's examination.</p>

<p>What follows covers how hair loses its colour, the causes worth knowing about, which tests are reasonable and which are not, what can and cannot change, and how to colour grey hair without risking a dye allergy.</p>

<h2 id="what-counts-as-premature">What counts as premature greying</h2>

<p>The <a href="https://public.iadvl.org/premature-greying-of-hair" rel="noopener nofollow" target="_blank">Indian Association of Dermatologists, Venereologists and Leprologists (IADVL)</a> describes greying as premature when it begins before about 20 in white populations, before 25 in people of Asian origin and before 30 in Black populations. By the same account, greying typically begins in the late thirties in people of Asian origin. A handful of grey hairs at 23 is therefore early, and still very common.</p>

<h3>How hair loses its colour</h3>

<p>Pigment cells called melanocytes sit in the bulb of each hair follicle and add melanin to the hair as it grows. A reserve of pigment stem cells restocks them with each new hair cycle. Greying happens when that supply runs down: a grey hair has less pigment, and a white hair has almost none. Each follicle works independently, which is why grey hairs appear one at a time and scattered, rather than all at once. The colour is set at the root as the hair grows, so a hair that has already grown does not usually change colour along its length.</p>

<h2 id="why-hair-greys-early">Why hair greys early</h2>

<h3>Genetics</h3>

<p>Family history is the strongest predictor, according to the IADVL. If greying runs in the family and began at a similar age, the explanation is usually inherited timing, and the tests below are less likely to find anything.</p>

<h3>Vitamin B12 deficiency</h3>

<p>Early greying has been linked to low vitamin B12, particularly in pernicious anaemia, an autoimmune condition that stops B12 being absorbed. Low B12 is more likely on a vegetarian diet, which is common in India, and with long-term use of some medicines, including metformin and acid-suppressing tablets. A deficiency matters well beyond hair: it can cause tiredness, anaemia, a sore tongue and pins and needles. Low ferritin, vitamin D, copper and calcium have also been reported in small studies of people with premature greying, though an association is not the same as a cause.</p>

<h3>Thyroid disease</h3>

<p>Both an underactive and an overactive thyroid have been linked to greying, alongside changes in energy, weight, periods and tolerance of heat or cold. Thyroid disease is also more common in people with vitiligo and alopecia areata, two conditions covered below.</p>

<h3>Smoking</h3>

<p>Smoking is consistently associated with early greying. In <a href="https://pubmed.ncbi.nlm.nih.gov/23741662/" rel="noopener nofollow" target="_blank">a 2013 study of 207 people in the Indian Dermatology Online Journal</a>, smokers were about two and a half times as likely to have started greying before 30. The study was cross-sectional, so it shows an association rather than proof that smoking causes greying, but the link fits with what is known about smoking and oxidative stress.</p>

<h3>Oxidative and psychological stress</h3>

<p>Making melanin produces reactive molecules, and pigment cells depend on the body's antioxidant defences to cope with them. When those defences are overwhelmed, by ultraviolet light, pollution or smoking for example, the cells can be damaged. <a href="https://pmc.ncbi.nlm.nih.gov/articles/PMC6290285/" rel="noopener nofollow" target="_blank">A 2018 review in the International Journal of Trichology</a> describes this as the most studied mechanism of premature greying. It is a mechanism, not a diagnosis: there is no routine test for it, and antioxidant supplements have not been shown to reverse greying.</p>

<p>Psychological stress may play a part too. In mice, acute stress rapidly used up the stem cells that supply hair pigment. In people, a small 2021 study tracked colour along individual hairs and found some greyed during stressful periods, while a few regained colour when the stress eased, mostly hairs that seemed close to greying anyway.</p>

<h2 id="sudden-white-patches">Sudden white patches: vitiligo and alopecia areata</h2>

<p>Gradual, scattered greying is one thing. A defined patch or lock of white hair, or hair that seems to turn white over weeks, is different and needs examining.</p>

<h3>Vitiligo</h3>

<p>Vitiligo is an autoimmune condition in which pigment cells are lost from patches of skin. <a href="https://dermnetnz.org/topics/vitiligo" rel="noopener nofollow" target="_blank">DermNet's vitiligo page</a> notes that hair within the patches, on the scalp, eyebrows, eyelashes or body, loses its colour in somewhere between one in ten and more than half of people with the condition, depending on the study. A single white lock can be the first sign, so check the skin underneath and elsewhere for pale patches. DermNet also notes that white hair in a patch may predict a poorer response to treatment, because the pigment reserve in the follicles has been lost, which is a reason to have it assessed early.</p>

<h3>Alopecia areata</h3>

<p>Alopecia areata is an autoimmune form of patchy hair loss, and it tends to affect pigmented hairs. <a href="https://dermnetnz.org/topics/alopecia-areata" rel="noopener nofollow" target="_blank">DermNet describes</a> how the loss of dark hairs can unmask grey hairs that were already there, so the hair appears to turn white quickly. When hair regrows in a patch, it may at first be white or fine. Smooth bald patches, sometimes with short broken hairs at their edges, point this way. <a href="/alopecia-areata-treatment-in-gurgaon">Alopecia areata treatment in Gurugram</a> and <a href="/alopecia-areata-treatment-in-rohini">alopecia areata treatment in Rohini</a> explain how it is assessed and managed.</p>

<h2 id="which-tests-are-reasonable">Which tests are reasonable</h2>

<p>The 2018 review suggests checking vitamin B12, folic acid and thyroid levels, mainly in people without a family history of early greying. A short, targeted set is more useful than a large panel:</p>

<div class="table-scroll">
  <table class="data data--wide">
    <caption class="sr-only">Blood tests that are reasonable for premature grey hair, why each is done and when it is most useful</caption>
    <thead>
      <tr><th scope="col">Test</th><th scope="col">Why it is checked</th><th scope="col">Most useful when</th></tr>
    </thead>
    <tbody>
      <tr><th scope="row" style="white-space:normal;width:24%">Vitamin B12, with folate</th><td>A deficiency is linked to greying and matters for nerves and blood</td><td>Vegetarian diet, metformin or acid-suppressing medicines, tiredness, pins and needles</td></tr>
      <tr><th scope="row" style="white-space:normal;width:24%">Full blood count</th><td>Shows anaemia, which can accompany B12, folate or iron deficiency</td><td>Tiredness, breathlessness or pale skin</td></tr>
      <tr><th scope="row" style="white-space:normal;width:24%">Thyroid function (TSH)</th><td>Screens for an underactive or overactive thyroid</td><td>Weight change, heat or cold intolerance, irregular periods, or vitiligo or alopecia areata</td></tr>
      <tr><th scope="row" style="white-space:normal;width:24%">Ferritin and vitamin D</th><td>Low levels have been reported in premature greying; both matter for general health</td><td>Restricted diet, heavy periods or hair fall as well as greying</td></tr>
    </tbody>
  </table>
</div>

<p>Two practical points. Biotin, common in hair supplements, can distort some laboratory tests, including thyroid tests, so mention it before blood is taken; <a href="/blog/blood-tests-for-hair-fall">blood tests for hair fall</a> explains why. And hair mineral analysis or large wellness panels are not a reliable way to find a cause of greying; they tend to produce borderline numbers that invite supplements nobody needs. The examination matters as much as the blood: a doctor looks at the scalp and skin for signs of vitiligo or alopecia areata.</p>

<h2 id="what-can-and-cannot-reverse-it">What can and cannot reverse it</h2>

<ul>
  <li><strong>Greying linked to a deficiency or thyroid disorder</strong> may partly improve once it is treated. The IADVL says such greying might improve with the right treatment, and case reports describe hair regaining colour after B12 deficiency was corrected. Change, if it comes, is slow and incomplete, because only new growth can carry pigment.</li>
  <li><strong>Genetic or age-related greying</strong> generally does not reverse. The IADVL notes that no medical treatment has been shown to restore pigment once hair has turned grey.</li>
  <li><strong>Stress-related change</strong> is less clear. A few hairs may regain colour when stress eases, but this has been seen only in small studies.</li>
  <li><strong>Stopping smoking</strong> is worth doing for many reasons. Whether it slows greying has not been tested well.</li>
  <li><strong>Supplements without a deficiency,</strong> oils and serums sold to reverse grey hair do not have good evidence behind them. The same caution applies as for <a href="/blog/rosemary-onion-juice-and-hair-oils-for-hair-fall">rosemary, onion juice and hair oils for hair fall</a>.</li>
  <li><strong>Plucking</strong> does not make more grey hairs grow, but repeated plucking can damage the follicle.</li>
</ul>

<?= blog_cta(
    'Greying early, or a white patch that is new?',
    'An assessment looks at your family history, diet, medicines and symptoms, examines the scalp and skin, and arranges blood tests only where they are likely to find something.'
) ?>

<h2 id="hair-dye-allergy">Colouring grey hair: PPD allergy and patch tests</h2>

<p>Dye does not cause more grey hair; the IADVL notes that it does not change pigment production in the follicle. The risk with dye is allergy. The <a href="https://www.nhs.uk/conditions/hair-dye-reactions/" rel="noopener nofollow" target="_blank">NHS page on hair dye reactions</a> explains that many permanent and some semi-permanent dyes contain paraphenylenediamine (PPD), and DermNet notes that darker shades tend to contain more of it. Black henna pastes can contain high levels, and having had a black henna tattoo may raise the risk of reacting to hair dye later. Pure henna stains hair red-brown, so a henna product that colours hair black usually has another dye added.</p>

<p>A reaction usually shows as itching, redness, swelling or oozing at the scalp, hairline, ears, eyelids or neck, starting within hours to about three days. The <a href="https://public.iadvl.org/hair-dye-allergy" rel="noopener nofollow" target="_blank">IADVL's guidance on hair dye allergy</a> makes an important point: an allergy can appear after years of using the same product without any problem.</p>

<ol>
  <li><strong>Patch-test before every colouring,</strong> following the product instructions. The usual method is a small amount behind the ear or inside the elbow, left for 48 hours before full use.</li>
  <li><strong>Do not dye if the test reacts,</strong> or if the scalp is already inflamed, broken or sore.</li>
  <li><strong>If a reaction starts,</strong> rinse the hair and scalp thoroughly with water and a mild shampoo, and do not apply the product again.</li>
  <li><strong>Get urgent help</strong> for swelling of the lips, tongue or throat, difficulty breathing, or feeling faint.</li>
</ol>

<p>A clear self-test lowers the risk without removing it. If you have reacted before, see a doctor rather than simply switching brands: some dyes marketed for sensitive skin contain a related chemical that many people with PPD allergy also react to, and formal patch testing can identify what to avoid. A dye reaction can also be mistaken for a flaking scalp condition; <a href="/blog/can-dandruff-cause-hair-fall">dandruff and the conditions that look like it</a> covers how they differ.</p>

<h2 id="when-to-see-a-doctor">When to see a doctor</h2>

<ul>
  <li>Greying started before 20, or is spreading quickly, with no family history.</li>
  <li>You have tiredness, pins and needles, a sore tongue, weight change or intolerance of heat or cold.</li>
  <li>You follow a vegetarian or vegan diet, or take metformin or acid-suppressing medicines long term, and have never had B12 checked.</li>
  <li>A white patch or lock of hair has appeared, or pale patches of skin.</li>
  <li>Hair is turning white with bald patches, or greying comes with hair fall.</li>
  <li>A hair dye caused itching, swelling or oozing, even if it settled.</li>
</ul>

<h2 id="getting-it-assessed">Getting it assessed</h2>

<p>For most people, an assessment confirms that early greying is inherited and that nothing needs treating, which is useful to know before spending on supplements. For some, it finds a deficiency or a thyroid problem worth correcting for its own sake, or a patch that turns out to be vitiligo or alopecia areata. Consultations are with registered medical practitioners at our clinics in Sector 39, Gurugram and Rohini, Delhi. If greying is coming with thinning or shedding, <a href="/hair-fall-treatment-in-gurgaon">hair fall treatment in Gurugram</a> and <a href="/hair-fall-treatment-in-rohini">hair fall treatment in Rohini</a> describe how the scalp, history and blood tests are brought together.</p>

<?php require __DIR__ . '/../includes/blog-footer.php'; ?>
