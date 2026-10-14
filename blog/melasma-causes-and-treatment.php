<?php
/**
 * /blog/melasma-causes-and-treatment
 *
 * Patient education on melasma: who gets it (common in brown Indian skin),
 * triggers (UV, visible light, heat, hormones, genetics), sunscreen (broad
 * spectrum; tinted / iron-oxide sunscreen against visible light), the
 * treatments a dermatologist may discuss in general terms (prescription
 * topicals, tranexamic acid tablets, peels, caution with lasers on darker
 * skin), unsupervised steroid creams in India, and why it recurs. Treatments
 * are described generally and NOT as services of the clinic: /skin-treatment-in-
 * gurgaon lists sunscreen, prescription creams in courses and maintenance for
 * melasma, and its list of in-clinic procedures is still a placeholder. No
 * doses, devices or brands.
 *
 * Sources checked (14 Oct 2026):
 * - DermNet, Melasma: commoner in women aged 20-40 and Fitzpatrick III-IV;
 *   family history; UV and visible light; hormones; epidermal/dermal/mixed;
 *   SPF 50+ broad-spectrum sunscreen containing iron oxides; triple
 *   combination; tranexamic acid; peels and lasers with caution, risk of
 *   worsening and PIH; high relapse risk; pigment can return with summer sun.
 * - AAD, Melasma causes / treatment: sun, pregnancy, the pill, anti-seizure
 *   medicines, thyroid disease, genetics (48% in one study); broad-spectrum
 *   SPF 30+, iron oxide, tinted sunscreen; hydroquinone, triple combination,
 *   azelaic acid and others; tranexamic acid tablets after checking for past
 *   blood clots; lasers may help when added to creams in a few studies;
 *   results usually take 3 to 12 months.
 * - British Association of Dermatologists, Melasma leaflet (2024): high-energy
 *   visible light may contribute, no evidence screens affect skin; iron oxide
 *   sunscreens give some visible-light protection; hydroquinone for limited
 *   periods; laser can worsen pigmentation or leave lighter patches; melasma
 *   often returns after treatment stops.
 * - AAD annual meeting coverage (H. Lim): iron oxides reflect visible light;
 *   tinted SPF 30+ sunscreen suggested for melasma; universal shades may not
 *   suit very deep skin tones.
 * - Heat as a trigger: dermatologist commentary only; stated as weaker evidence.
 * - Indian data: multicentric study of 331 patients in 10 centres (female to
 *   male about 4:1; sunscreen use inadequate, steroid use common); Achar and
 *   Rathi (312 patients, family history in a third).
 * - Facial steroid misuse in India: Saraswat et al., IJDVL 2011 (12 centres;
 *   fairness/general-purpose use commonest; mostly advised by non-physicians);
 *   Sharma et al., J Dermatol Case Rep 2017 (20.5% used them for melasma or
 *   pigmentation; topical steroid-dependent face).
 *
 * Not yet reviewed by the clinic's doctor ('reviewed' => false in BLOG_POSTS,
 * so the byline reads "Written by the DenceSpot Clinic team").
 */

declare(strict_types=1);

$postSlug = 'melasma-causes-and-treatment';
$postDescription = 'Why melasma appears, the role of sun, visible light, heat and hormones, which sunscreen helps, the treatments a doctor may discuss, and why it tends to return.';

/** Drives both the FAQPage schema and the visible accordion, from this one array. */
$postFaqs = [
    ['q' => 'Can melasma go away completely?',
     'a' => 'Sometimes it fades on its own, for example after a pregnancy or after stopping the contraceptive pill. In most people, though, it can be lightened and kept under control rather than removed for good. The tendency remains, so sun, heat and hormonal change can bring it back, and a maintenance plan with daily sunscreen is usually needed.'],
    ['q' => 'Does melasma go away after pregnancy?',
     'a' => 'It often fades over the months after delivery, though not always completely, and it can return in later pregnancies. Several pigment treatments are unsuitable in pregnancy and while breastfeeding, so sun protection is the main measure until then. Tell the doctor if you are pregnant, breastfeeding or planning a pregnancy.'],
    ['q' => 'Is tinted sunscreen better for melasma?',
     'a' => 'It can help. Tinted sunscreens contain iron oxides, which reflect part of the visible light that can darken melasma in brown skin, while standard sunscreen filters mainly cover ultraviolet light. Look for broad spectrum, SPF 30 or higher and a shade that matches your skin, and reapply it through the day.'],
    ['q' => 'Can laser remove melasma?',
     'a' => 'Laser is not a first-line treatment for melasma, and it can make pigmentation worse, especially in darker skin. Results are variable and relapse is common. Where lasers are used, it is usually alongside creams and sun protection, cautiously, after a full assessment.'],
    ['q' => 'Should I use a fairness or pigmentation cream from the chemist?',
     'a' => 'Be careful. Some creams sold for pigmentation or fairness contain strong steroids, which can thin the skin, cause acne-like spots and redness, and worsen pigmentation over time. Have the patches diagnosed and use prescribed treatment instead. If you already use such a cream, bring it to your consultation rather than stopping it abruptly.'],
    ['q' => 'Can the contraceptive pill cause melasma?',
     'a' => 'It can trigger or worsen melasma in some women, as can other hormonal contraception and hormone replacement. Do not stop a contraceptive without discussing alternatives with the doctor who prescribed it, so that the skin and contraception can be weighed up together.'],
    ['q' => 'How long does melasma treatment take?',
     'a' => 'Months. The American Academy of Dermatology says results usually take three to twelve months to show, and long-standing melasma can take longer. Treatment is reviewed along the way, then moves to a maintenance routine once the patches have faded.'],
    ['q' => 'Is melasma the same as acne marks or sun spots?',
     'a' => 'No. Marks after acne are flat patches of pigment where spots used to be, and sun spots are usually small, well-defined patches. Melasma forms larger, symmetrical patches on both sides of the face. They can look alike and can occur together, which is why the diagnosis matters.'],
];
$postFaqId = 'melasma-faqs';
$postFaqHeading = 'Melasma: more questions';
require __DIR__ . '/../includes/blog-header.php';
?>

<p>Melasma is a common pattern of brown or grey-brown patches on the cheeks, forehead, nose, upper lip or chin. It is driven by sunlight, visible light and hormones on a background of genetic tendency, and heat often makes it worse. It can usually be lightened and controlled with daily sun protection and prescription treatment, but it tends to come back, so most people need a long-term plan rather than a single course.</p>

<p>This article covers who gets melasma, what triggers it, how sunscreen fits in, the treatments a dermatologist may discuss, the problem with unsupervised steroid creams, and why melasma recurs. It is general patient education, not a list of treatments offered at any particular clinic.</p>

<h2 id="what-melasma-is">What melasma is, and who gets it</h2>

<p>Melasma is an excess of pigment laid down by overactive pigment cells (melanocytes). It usually appears as symmetrical patches, much the same on both sides of the face, most often across the cheeks, the forehead, the bridge of the nose and the upper lip. Less often it affects the jawline, or the forearms and other sun-exposed skin.</p>

<p>It is far more common in women and usually starts between the ages of 20 and 40, though men get it too. <a href="https://dermnetnz.org/topics/melasma" rel="noopener nofollow" target="_blank">DermNet's reference page on melasma</a> describes it as most common in people with brown skin that tans easily, Fitzpatrick types III and IV, which covers a large share of Indian skin. In one multicentre study across ten centres in four regions of India, women outnumbered men by about four to one. Family history matters too: in different studies, between about a third and more than half of patients report a relative with melasma.</p>

<p>Dermatologists sometimes describe melasma by how deep the pigment sits. Pigment near the surface tends to respond more readily to treatment, deeper pigment responds slowly, and most people have a mix of both. Several other conditions also darken the face, including marks left after acne or a rash, pigmentation from cosmetics or creams, and some less common conditions, so it is worth having the diagnosis confirmed before starting treatment.</p>

<h2 id="causes-and-triggers">What causes melasma and what makes it worse</h2>

<p>There is no single cause. Melasma appears when an underlying tendency meets one or more triggers:</p>

<ul>
  <li><strong>Ultraviolet (UV) light</strong> from the sun or sunbeds is the main trigger. It stimulates pigment cells directly, which is why melasma darkens in summer and after holidays.</li>
  <li><strong>Visible light.</strong> Ordinary daylight, not only UV, can deepen pigment in brown skin. The British Association of Dermatologists notes that high-energy visible (blue) light may contribute, though it finds no evidence that light from phone and computer screens affects the skin.</li>
  <li><strong>Hormones.</strong> Pregnancy (melasma is sometimes called the mask of pregnancy), the contraceptive pill and other hormonal contraception, and hormone replacement can all trigger or worsen it. A thyroid disorder is also linked in some people.</li>
  <li><strong>Heat.</strong> Many dermatologists find that heat, from cooking over a stove, a hot commute or a sauna, makes melasma worse. The evidence for heat is weaker than for sunlight, but it fits what many people notice in a north Indian summer.</li>
  <li><strong>Medicines and products.</strong> Some medicines make skin more sensitive to light, some anti-seizure medicines are linked to melasma, and perfumed or irritating cosmetics can contribute.</li>
  <li><strong>Genetics,</strong> which shape how readily your pigment cells respond to everything above.</li>
</ul>

<h2 id="sunscreen">Sunscreen: the part of treatment that does most of the work</h2>

<p>Without sun protection, melasma treatment tends not to hold. The <a href="https://www.aad.org/public/diseases/a-z/melasma-treatment" rel="noopener nofollow" target="_blank">American Academy of Dermatology (AAD)</a> advises a broad-spectrum sunscreen of SPF 30 or higher, applied every day and reapplied through the day, along with shade and a wide-brimmed hat. DermNet goes further and recommends a very high protection (SPF 50+) broad-spectrum sunscreen containing iron oxides.</p>

<p>The iron oxides matter because of visible light. Most standard sunscreen filters are designed for UV and give limited protection against visible light. Iron oxides, the pigments that give tinted sunscreens their colour, reflect part of it. That is why a tinted sunscreen is often suggested for melasma, and why the British Association of Dermatologists notes that iron oxide sunscreens offer some protection against visible light.</p>

<div class="table-scroll">
  <table class="data">
    <caption class="sr-only">What common sunscreen labels mean and why each matters for melasma</caption>
    <thead>
      <tr><th scope="col">On the label</th><th scope="col">What it means</th><th scope="col">Why it matters for melasma</th></tr>
    </thead>
    <tbody>
      <tr><th scope="row">Broad spectrum</th><td>Protects against both UVB and UVA</td><td>UVA reaches deeper into the skin and passes through window glass</td></tr>
      <tr><th scope="row">SPF 30 or higher</th><td>A measure of protection against UVB, the rays that burn</td><td>The minimum the AAD advises; DermNet suggests SPF 50+</td></tr>
      <tr><th scope="row">PA+++ or PA++++</th><td>A UVA protection grade shown on many sunscreens sold in India</td><td>More plus signs mean more UVA protection</td></tr>
      <tr><th scope="row">Tinted, or containing iron oxides</th><td>Coloured pigments that reflect part of visible light</td><td>Adds protection against the visible light that can darken melasma</td></tr>
    </tbody>
  </table>
</div>

<p>How you use it matters as much as which one you buy:</p>

<ul>
  <li>Use enough to cover the whole face evenly, every morning, including cloudy and smoggy days.</li>
  <li>Reapply after about two hours outdoors, after sweating, and after washing your face.</li>
  <li>Window glass lets UVA through, so a long daily drive or a desk by a window still counts.</li>
  <li>Choose a tint that matches your skin. A single universal shade can look grey or chalky on deeper Indian skin tones, and a sunscreen you will not wear does not help.</li>
  <li>Add shade, a hat or an umbrella in strong sun. No sunscreen blocks everything.</li>
</ul>

<h2 id="treatment-options">Treatments that may be discussed</h2>

<p>Treatment is chosen once the diagnosis is confirmed, and it usually combines sun protection with a prescription cream. What follows is a general overview of what dermatologists may discuss; doses and the length of each course are always as prescribed by a doctor.</p>

<h3>Prescription creams</h3>

<p>Pigment-reducing creams are the usual first step. Hydroquinone is the most familiar; the British Association of Dermatologists notes that it is prescribed for limited periods, because longer use can over-lighten the skin or, occasionally, darken it. It is sometimes combined with a retinoid and a mild steroid in a triple-combination cream, used for a defined course under supervision. Other agents, such as azelaic acid, kojic acid, vitamin C, cysteamine, thiamidol and tranexamic acid applied to the skin, may be used alone, in rotation or for maintenance.</p>

<h3>Tablets</h3>

<p>For stubborn melasma, some dermatologists prescribe tranexamic acid tablets. The AAD notes that your health history, including any past blood clots, is reviewed first. This is a prescription decision, not something to buy and try.</p>

<h3>Chemical peels</h3>

<p>Superficial peels are sometimes added once the skin is used to a cream. On brown skin they are used cautiously, because the irritation from a peel can itself cause darker patches.</p>

<h3>Lasers and light treatments</h3>

<p>Lasers and light treatments are sometimes used alongside creams, and the AAD notes a few studies finding they can improve results when added to medication and sun protection. Results are variable, though. The BAD warns that laser can worsen pigmentation or leave lighter patches, and DermNet notes a high risk of relapse after laser, light treatments and microneedling. On darker skin they are approached with particular caution, usually only once creams and sun protection are in place; <a href="/blog/laser-hair-removal-patch-test">why darker skin and laser need a careful start</a> explains the underlying problem.</p>

<h3>Camouflage</h3>

<p>Colour-matched cosmetic camouflage does not treat melasma, but it can cover the patches while treatment takes effect, and many people find that helpful. Be wary of dramatic before-and-after photographs of pigmentation, which lighting and camera settings change easily; <a href="/blog/how-to-read-before-and-after-photos">how to read before-and-after photos</a> explains the techniques, using hair as the example.</p>

<h2 id="steroid-creams">Steroid creams: a common problem in India</h2>

<p>In India, many people with melasma first try a cream from a chemist. Some of the cheapest and most widely sold "pigmentation" and "fairness" creams contain a strong steroid, often in a triple combination, and are bought without a prescription. A multicentre study of dermatology outpatients in India found steroid creams being used on the face, most often as fairness or general-purpose creams and mostly on the advice of people who were not doctors. A later study from Jammu found that a fifth of facial steroid users were applying them for melasma or pigmentation.</p>

<p>Steroids lighten the skin at first, which is why these creams seem to work. Used on the face for weeks or months without supervision, they can cause:</p>

<ul>
  <li>acne-like spots, redness and a burning sensation;</li>
  <li>thinning of the skin, with small visible blood vessels;</li>
  <li>increased facial hair;</li>
  <li>pigmentation that gets worse, not better;</li>
  <li>a flare of redness and burning when the cream is stopped, sometimes called topical steroid-dependent face.</li>
</ul>

<p>A short course of a prescribed combination cream, under supervision, is different from months of unsupervised use. If you have been using a steroid cream on your face for a while, do not simply stop it the night before a consultation. Bring it with you: coming off suddenly can cause a flare, and the doctor can plan how to reduce it.</p>

<?= blog_cta(
    'Not sure whether your patches are melasma?',
    'A consultation looks at the pattern of the patches, your sun exposure, hormonal factors and every product you use, so treatment starts from a diagnosis rather than a guess.'
) ?>

<h2 id="why-it-recurs">Why melasma comes back</h2>

<p>Treatment lightens the pigment, but it does not remove the tendency. The pigment cells stay quick to respond, so the same triggers bring melasma back: a summer of strong sun, a beach holiday, a hot kitchen, a pregnancy or a change in hormonal contraception. DermNet notes that even people who respond well can see pigment return with summer sun, and the BAD notes that melasma often returns after treatment stops.</p>

<p>That is why most plans have two phases. The first lightens the patches, and the AAD says results usually take between three and twelve months to appear. The second, maintenance, keeps them light: daily sunscreen, a gentler cream used regularly or in courses, and attention to triggers. Stopping everything as soon as the skin looks better is a common reason for relapse. Over-treating causes problems too, because harsh products, scrubs and aggressive procedures irritate the skin, and irritation in brown skin can darken it.</p>

<h2 id="when-to-see-a-doctor">When to see a doctor</h2>

<ul>
  <li>You are not sure the patches are melasma, or they are on one side only or irregular in shape.</li>
  <li>A patch is changing in size, colour or shape, is raised, bleeds or itches; it needs examining in its own right.</li>
  <li>The darkening started after a new medicine or cream.</li>
  <li>You have been using a steroid or fairness cream on your face.</li>
  <li>You are pregnant, breastfeeding or planning a pregnancy, as several pigment treatments are unsuitable at those times.</li>
  <li>There is also velvety darkening of the neck or skin folds, which can point to an internal cause worth checking.</li>
</ul>

<h2 id="getting-it-assessed">Getting it assessed</h2>

<p>At our clinics in Sector 39, Gurugram and Rohini, Delhi, a skin consultation with a registered medical practitioner starts with a diagnosis: the pattern of the patches, sun exposure, hormonal factors and every product you use. For melasma, the plan then centres on daily sun protection, prescription creams in courses and maintenance. <a href="/skin-treatment-in-gurgaon">Skin treatment in Gurgaon</a> and <a href="/skin-treatment-in-rohini">skin treatment in Rohini</a> explain how a consultation runs. Marks left by acne are often confused with melasma, and <a href="/blog/acne-scars-treatment-options">acne marks and scars</a> explains the difference.</p>

<?php require __DIR__ . '/../includes/blog-footer.php'; ?>
