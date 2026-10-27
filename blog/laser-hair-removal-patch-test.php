<?php
/**
 * /blog/laser-hair-removal-patch-test
 *
 * Patient education on why a patch test comes before laser hair removal on
 * Indian skin: skin types, wavelengths in general terms, what the test checks
 * and what it cannot tell you. Names no device or brand, and does not describe
 * the clinic's own laser (not on record — COMPETITOR-SEO.md §4 item 9); laser
 * families are mentioned only as general categories of wavelength. Facts are
 * kept consistent with /laser-hair-removal-in-rohini. Links go to Rohini pages
 * and general pages only (client rule, 14 Oct 2026).
 *
 * Hub: 'prp' ("PRP & non-surgical") is the nearest existing hub; BLOG_HUBS has
 * no skin or laser hub yet.
 *
 * Not yet reviewed by the clinic's doctor: the shared post template prints a
 * review byline for every post, so this article must be reviewed before it is
 * published.
 */

declare(strict_types=1);

$postSlug = 'laser-hair-removal-patch-test';
$postDescription = 'Why laser hair removal on Indian skin starts with a patch test: skin types, wavelengths, what the spot shows, what it cannot predict and how to prepare.';

/**
 * Drives both the FAQPage schema (emitted by blog-header.php) and the visible
 * accordion at the foot of this article, from this one array.
 */
$postFaqs = [
    ['q' => 'Is a patch test always needed before laser hair removal?',
     'a' => 'It is usual, and on darker or recently tanned skin it is especially worthwhile, because that is where the risk of burns and pigment change is higher. The decision is made at the consultation after your skin type, hair and medicines have been looked at. A patch test is also sensible again if your skin, medicines or the treatment settings change significantly during a course.'],
    ['q' => 'How long after the patch test can the first session be done?',
     'a' => 'The test spot is usually looked at again a few days later. On darker skin some clinicians prefer to wait longer, because pigment changes can take time to appear. Your first full session is booked once the spot has been checked and the settings agreed.'],
    ['q' => 'Does a patch test hurt?',
     'a' => 'Most people describe each pulse as a quick, hot sting, similar to a rubber band flicked against the skin, and cooling takes the edge off. Because only a small area is treated, the test is over quickly. Thin-skinned areas such as the upper lip tend to sting more than the legs or back.'],
    ['q' => 'My patch test was fine. Can I still get a reaction later in the course?',
     'a' => 'Yes. A clear patch test lowers the risk for those settings on that skin at that time; it does not remove it. A tan, a new medicine, a change of settings or a different area can all change how the skin reacts. Tell the clinic about any of these before each session, and report blistering, crusting or new dark or light patches.'],
    ['q' => 'Can laser hair removal be done on dark skin?',
     'a' => 'Often, yes, with care. Darker skin holds more melanin, which competes with the hair for laser energy, so the wavelength, pulse duration and energy have to suit the skin type and cooling matters. This is exactly what the patch test is for. Some people are better served by other methods, and the assessment should say so.'],
    ['q' => 'I have a tan from the summer. Can I still have the patch test?',
     'a' => 'It is usually better to wait until the tan fades. Tanned skin absorbs more laser energy and burns and changes colour more easily, and a test done on tanned skin may not reflect how your skin will behave later. Tell the clinic about recent sun exposure, including a self-tan.'],
    ['q' => 'Does laser work on grey or white hair?',
     'a' => 'Poorly, or not at all. Laser hair removal depends on pigment in the hair, so white, grey, and many red or blonde hairs do not absorb enough energy to respond. The patch test and the examination will show whether the hair you want treated is likely to respond.'],
];
$postFaqId = 'laser-patch-test-faqs';
$postFaqHeading = 'Patch tests and laser: more questions';
require __DIR__ . '/../includes/blog-header.php';
?>

<p>Before a course of laser hair removal, a small spot of skin is usually treated on its own and checked again a few days later. It can feel like a formality. On Indian skin it is the most useful few minutes of the whole course, because it shows how your own skin and hair respond to the light before a large area is treated with it.</p>

<p>This article explains why the test matters more on darker skin, what it is actually checking, what it cannot tell you, and how to prepare. It is general patient education. It does not describe any particular clinic's equipment, and the settings for your skin are decided by the person who examines it.</p>

<h2 id="why-indian-skin-needs-care">Why Indian skin needs a careful start</h2>

<p>Laser hair removal works by sending light into the skin that is absorbed by melanin, the pigment in the hair and its root. The absorbed light turns to heat, and the heat damages the follicle's ability to grow a new hair. Dark, coarse hair on light skin is the easiest case, because almost all the energy goes where it is meant to.</p>

<p>Skin contains melanin too, and darker skin contains more of it. That melanin competes with the hair for the same energy. If too much is absorbed in the skin rather than the follicle, the result can be a burn, a blister or a change in skin colour: patches darker than before, called <a href="https://dermnetnz.org/topics/postinflammatory-hyperpigmentation" rel="noopener nofollow" target="_blank">post-inflammatory hyperpigmentation</a>, or less often lighter ones. These changes usually fade over months, but not always completely. Most Indian skin falls in the middle-to-darker range, so this balance is the central question rather than an edge case.</p>

<h2 id="skin-types">Skin types, briefly</h2>

<p>Clinicians often describe skin using the Fitzpatrick scale, which groups skin by how it reacts to sun (<a href="https://dermnetnz.org/topics/skin-phototype" rel="noopener nofollow" target="_blank">DermNet: skin phototype</a>). It is a rough guide, assessed by asking and looking rather than measured by a machine, but it shapes how cautiously laser settings are chosen.</p>

<div class="table-scroll">
  <table class="data">
    <caption class="sr-only">Fitzpatrick skin types and what each generally means for laser hair removal</caption>
    <thead>
      <tr><th scope="col">Type</th><th scope="col">How the skin reacts to sun</th><th scope="col">What it generally means for laser</th></tr>
    </thead>
    <tbody>
      <tr><th scope="row">I – II</th><td>Burns easily, tans little</td><td>Less competing pigment; uncommon in India</td></tr>
      <tr><th scope="row">III</th><td>Sometimes burns, tans gradually</td><td>Usually straightforward with standard caution</td></tr>
      <tr><th scope="row">IV</th><td>Rarely burns, tans easily</td><td>More caution with settings and with tans</td></tr>
      <tr><th scope="row">V</th><td>Very rarely burns, tans very easily</td><td>Settings chosen to protect the skin; patch test especially important</td></tr>
      <tr><th scope="row">VI</th><td>Does not burn, deeply pigmented</td><td>Possible with suitable settings, but the margin for error is smallest</td></tr>
    </tbody>
  </table>
</div>

<p>Most Indian skin falls between types III and V, with some type VI. Skin type also varies across one body: the underarms and bikini line are often darker than the forearm, which is one reason a single test spot does not settle every area.</p>

<h2 id="wavelengths">Wavelengths in plain terms</h2>

<p>A laser emits light of a single wavelength, measured in nanometres (nm), and the wavelength decides how deeply the light reaches and how strongly melanin absorbs it. The general rule is that longer wavelengths penetrate deeper and are absorbed less by melanin in the upper layer of skin.</p>

<ul>
  <li><strong>Around 755 nm</strong> (alexandrite lasers): strongly absorbed by melanin, efficient on lighter skin, and generally used with more caution on darker skin.</li>
  <li><strong>Around 800–810 nm</strong> (diode lasers): a middle wavelength used across a wide range of skin types.</li>
  <li><strong>1064 nm</strong> (Nd:YAG lasers): least absorbed by melanin in the skin, often considered for the darkest skin types, though less efficient on fine or lighter hair.</li>
  <li><strong>Intense pulsed light (IPL)</strong> is not a laser. It uses a broad band of wavelengths, filtered, and is generally used with more caution on darker skin.</li>
</ul>

<p>Wavelength is only part of the picture. The energy delivered, the length of each pulse (longer pulses are generally gentler on darker skin) and how well the skin is cooled matter as much. That is why two people treated with the same type of laser can need quite different settings, and why it is reasonable to ask any clinic which type of laser it uses and why it suits your skin.</p>

<h2 id="what-happens-at-a-patch-test">What happens at a patch test</h2>

<p>The test usually follows a consultation covering your medical history, medicines and how you remove hair at the moment. The area to be tested is shaved beforehand. A small patch, usually within or next to the area you want treated, receives a few pulses, sometimes at more than one setting, with cooling. Then the skin is checked straight away and again after a few days.</p>

<p>Straight after the pulses, a small amount of redness and slight swelling around each follicle is expected. It looks a little like goosebumps and usually settles within hours to a day or two. Its appearance is a sign the energy is reaching the hair.</p>

<h2 id="what-the-test-checks">What the patch test checks</h2>

<div class="table-scroll">
  <table class="data">
    <caption class="sr-only">What a laser hair removal patch test checks and what each finding changes</caption>
    <thead>
      <tr><th scope="col">Check</th><th scope="col">What is looked for</th><th scope="col">What it changes</th></tr>
    </thead>
    <tbody>
      <tr><th scope="row">Immediate skin response</th><td>Excess redness, whitening or blistering on the spot</td><td>Whether the energy is too high for the skin</td></tr>
      <tr><th scope="row">Hair response</th><td>Redness and slight swelling around each follicle</td><td>Whether the energy is reaching the hair</td></tr>
      <tr><th scope="row">Delayed reaction</th><td>Crusting, blisters, or darker or lighter patches days later</td><td>Settings, cooling, or whether laser suits the area at all</td></tr>
      <tr><th scope="row">Comfort</th><td>How you tolerated the pulses</td><td>Cooling and pace for the full session</td></tr>
      <tr><th scope="row">The skin type estimate</th><td>Whether the skin behaved as its type suggested</td><td>How cautiously the course begins</td></tr>
    </tbody>
  </table>
</div>

<h2 id="what-it-cannot-tell-you">What a patch test cannot tell you</h2>

<ul>
  <li><strong>How many sessions you will need,</strong> or how much hair will be reduced. That depends on the hair, the area and hormones, and shows over the course.</li>
  <li><strong>How every area will react.</strong> Facial skin, underarms and the bikini line can behave differently from the test spot.</li>
  <li><strong>How your skin will react after a change.</strong> A summer tan, a new medicine or new settings later in the course change the picture.</li>
  <li><strong>Whether rare effects will occur.</strong> Occasionally, skin near a treated area starts growing thicker hair instead; a test spot cannot predict it.</li>
</ul>

<p><a href="/blog/is-laser-hair-removal-permanent">Laser reduces hair rather than removing every hair for good</a>, and results vary between people. A clear patch test is a good start, not a promise.</p>

<?= blog_cta(
    'Wondering whether laser suits your skin and hair?',
    'An assessment looks at your skin type, hair colour, medicines and the areas you want treated, and a patch test shows how your skin responds before a course is planned.'
) ?>
<h2 id="before-your-patch-test">Before your patch test: a checklist</h2>

<ol>
  <li>Shave the area a day or so beforehand, or as the clinic asks.</li>
  <li>Stop waxing, threading, plucking and epilating well before the test, and for the whole course. These remove the root the laser needs.</li>
  <li>Avoid sunbathing and self-tan. In a Delhi summer that means covering exposed skin, such as forearms on a two-wheeler commute.</li>
  <li>Bring a list of your medicines and supplements, including acne treatment, antibiotics and retinoid creams, as some make skin more sensitive to light.</li>
  <li>Mention cold sores, keloid scars, a recent chemical peel, pregnancy, and any hormonal condition such as PCOS.</li>
  <li>Arrive with the area free of cream, deodorant and make-up.</li>
</ol>

<h2 id="hair-colour-and-hormones">Hair colour and hormones</h2>

<p>Because laser relies on pigment, white and grey hair do not respond, and red or blonde hair responds poorly. That is a limit of the method, and the examination should say so plainly.</p>

<p>New or increasing hair on the chin, upper lip, chest or abdomen in women can point to a hormonal cause such as PCOS. That deserves a medical assessment in its own right, because laser treats the hair, not the cause, and <a href="/blog/laser-hair-removal-for-pcos-facial-hair">hormonally driven hair often needs more sessions</a> and later top-ups. <a href="/womens-hair-loss-treatment-in-rohini">Women's hair loss</a> and hormonal hair growth can share a cause, which is one reason they are assessed by a doctor.</p>

<h2 id="reactions-to-report">Reactions to report after a test or a session</h2>

<p>Mild redness and small bumps around the follicles that fade within a day or two are expected. Call the clinic if the skin blisters or crusts, if redness spreads or worsens, or if darker or lighter patches appear in the days or weeks afterwards. Do not pick at a crust or apply something of your own choosing to it.</p>

<h2 id="laser-in-rohini">Laser hair removal at our Rohini clinic</h2>

<p>At our Rohini clinic in North-West Delhi, laser hair removal is carried out on site, and your skin and hair are examined by a registered medical practitioner before any session, with a patch test usually done first. <a href="/laser-hair-removal-in-rohini">Laser hair removal in Rohini</a> covers how a course runs, area by area, and <a href="/skin-treatment-in-rohini">skin treatment in Rohini</a> covers pigmentation and other skin concerns. If you are unsure whether to see a doctor about hair at all, <a href="/blog/who-should-assess-hair-fall">who should assess hair fall</a> explains the difference between the options. Hours and directions are on the <a href="/delhi-clinic">Rohini clinic page</a>.</p>

<?php require __DIR__ . '/../includes/blog-footer.php'; ?>
