<?php
/**
 * /blog/can-dandruff-cause-hair-fall
 *
 * Patient education on whether dandruff causes hair fall. Position, kept
 * consistent with /dandruff-treatment-in-gurgaon and its Rohini twin: dandruff
 * does not cause pattern or scarring hair loss; it can raise shedding
 * indirectly, through scalp inflammation and scratching, and that shedding
 * usually settles once the scalp is controlled. Also covers how dandruff is
 * told apart from scalp psoriasis, tinea capitis and contact dermatitis, the
 * medicated shampoo ingredient classes (named as ingredients only, never
 * brands, no doses), how to use them, and when to see a doctor.
 *
 * Sources checked (Oct 2026): DermNet (seborrhoeic dermatitis, scalp
 * psoriasis, tinea capitis), NHS (dandruff), American Academy of Dermatology
 * (how to treat dandruff; seborrhoeic dermatitis self-care), and published
 * reports of telogen effluvium after scalp dermatitis and of reduced shedding
 * with medicated shampoos (small studies, described with caution).
 *
 * Not yet reviewed by the clinic's doctor ('reviewed' => false in BLOG_POSTS),
 * so the byline reads "Written by the DenceSpot Clinic team".
 */

declare(strict_types=1);

$postSlug = 'can-dandruff-cause-hair-fall';
$postDescription = 'Dandruff does not cause baldness, but scalp inflammation and scratching can raise shedding. How to tell it from psoriasis or fungus, and use medicated shampoo.';
$postFaqHeading = 'Dandruff and hair fall FAQs';
$postFaqId = 'dandruff-hair-fall-faqs';

/** Drives both the FAQPage schema and the visible accordion, from this one array. */
$postFaqs = [
    ['q' => 'Can dandruff cause permanent hair loss?',
     'a' => 'Ordinary dandruff does not. It does not scar the scalp, destroy follicles or cause pattern baldness. Some conditions that look like dandruff are different: a severe, inflamed fungal infection of the scalp can leave permanent bald patches, which is why scaly patches with hair loss should be examined rather than treated with shampoo alone.'],
    ['q' => 'Will my hair grow back once the dandruff is treated?',
     'a' => 'If the extra hair fall came from inflammation or scratching, the follicles are still there, and shedding usually eases once the scalp settles. Hair grows in cycles, so expect several months before the difference shows. If thinning continues after the scalp has been clear for a few months, a separate cause such as pattern hair loss or a deficiency is likely.'],
    ['q' => 'How do I tell dandruff from a dry scalp?',
     'a' => 'Dandruff tends to give larger, greasier, yellowish flakes on a scalp that may be red and itchy, and it is often worse when the scalp is oily. A dry scalp gives small, dry, white flakes, usually with dry skin elsewhere, and is worse in cold, dry weather. The two need almost opposite care, so heavy oiling for dandruff often makes it worse.'],
    ['q' => 'Can I use an anti-dandruff shampoo every day?',
     'a' => 'Many people do not need to. A medicated shampoo a couple of times a week, with an ordinary mild shampoo on other days, is a common pattern, and the label or your doctor will say what suits that product. Some active ingredients dry the hair, so apply them to the scalp and use conditioner on the lengths.'],
    ['q' => 'Does oiling help dandruff?',
     'a' => 'Usually not. Malassezia, the yeast involved in dandruff, feeds on fats, and heavy oil left on a flaking, itchy scalp tends to make seborrhoeic dermatitis worse. Oil on the lengths is a different matter. See <a href="/blog/rosemary-onion-juice-and-hair-oils-for-hair-fall">what hair oils and home remedies can and cannot do</a>.'],
    ['q' => 'Is dandruff contagious?',
     'a' => 'No. The yeast involved lives on everyone\'s skin, and what differs is how each person\'s skin reacts to it. That is why one person in a household has dandruff and another does not. A fungal infection of the scalp (tinea capitis) is different, and can spread between children and within families.'],
    ['q' => 'Why does my dandruff keep coming back?',
     'a' => 'Seborrhoeic dermatitis is a recurring condition that is controlled rather than ended for good. Seasonal change, sweat, stress and stopping treatment abruptly are common reasons for a flare. A maintenance routine, using the medicated shampoo less often once the scalp is clear, keeps most people comfortable.'],
    ['q' => 'Can I have PRP or a hair transplant if I have dandruff?',
     'a' => 'The scalp condition is treated and brought under control first, because procedures are not carried out on an inflamed scalp and healing is better on a settled one. It is a delay rather than a reason to rule a procedure out.'],
];
require __DIR__ . '/../includes/blog-header.php';
?>

<p>Dandruff does not cause pattern baldness, and it does not destroy hair follicles. The link people notice is real but mostly indirect: an inflamed, itchy scalp tends to shed more while the inflammation lasts, and scratching snaps and loosens hairs. Once the scalp is under control, that extra shedding usually settles, so hair loss that carries on after the flakes have gone generally has a different cause.</p>

<p>Two qualifications matter. The evidence that dandruff increases shedding at all is limited, and comes mainly from small studies and clinical experience. And several other scalp conditions look like dandruff and do cause hair loss, occasionally lasting. Telling them apart is the useful part of the question.</p>

<h2 id="what-dandruff-is">What dandruff and seborrhoeic dermatitis are</h2>

<p>Dandruff sits at the mild end of seborrhoeic dermatitis, a common inflammatory condition of oil-rich skin. <a href="https://dermnetnz.org/topics/seborrhoeic-dermatitis" rel="noopener nofollow" target="_blank">DermNet's page on seborrhoeic dermatitis</a> describes dandruff as its uninflamed form on the scalp: loose flakes with little redness. Further along the same spectrum, the scalp turns red and itchy, the scale becomes greasy and yellowish, and the eyebrows, the creases beside the nose and the skin behind the ears can be affected too.</p>

<p>Three things come together. Malassezia, a yeast that lives on everyone's skin, feeds on scalp oil. Substances it releases can inflame the skin in people who are susceptible, and the scalp responds by shedding skin cells faster, which shows as flakes. That is why dandruff is not a hygiene problem, why it is not contagious, why it often flares with seasonal change, sweat under a helmet or a stressful spell, and why it tends to return. The <a href="https://www.nhs.uk/conditions/dandruff/" rel="noopener nofollow" target="_blank">NHS page on dandruff</a> makes the same points: it is common, it is not harmful and you cannot catch it.</p>

<h2 id="how-dandruff-and-hair-fall-are-linked">How dandruff and hair fall are linked</h2>

<p>There are two routes by which a flaking scalp can mean more hair in the drain. Neither involves the yeast attacking the follicle.</p>

<h3>Inflammation</h3>

<p>Hair follicles sit in the skin that is inflamed. Marked inflammation around them can push more hairs than usual into the resting phase, and those hairs shed a couple of months later. It is the same process as telogen effluvium after a fever, on a smaller and more local scale. Reports have described a temporary shed following allergic contact dermatitis of the scalp, and small studies of medicated shampoos have reported less shedding once dandruff was treated. The evidence is limited, but the pattern is consistent: the shedding follows the inflammation and eases when it settles.</p>

<h3>Scratching</h3>

<p>An itchy scalp gets scratched, often at night and without noticing. Scratching snaps hairs along the shaft and pulls out hairs that were already loose. Short, broken hairs of uneven length close to the scalp are a clue that friction, rather than the follicle, is the problem.</p>

<h3>What dandruff does not do</h3>

<p>Ordinary dandruff does not produce a receding hairline, a thinning crown or a widening parting, and it does not scar the scalp. When someone with dandruff has one of those patterns, the likeliest explanation is that two separate things are happening: a visible scalp condition that gets all the attention, and pattern hair loss progressing quietly underneath. <a href="/blog/telogen-effluvium-vs-pattern-hair-loss">How shedding and pattern thinning are told apart</a> explains that distinction. Treating the scalp will not slow pattern loss, and treating pattern loss will not stop the flakes.</p>

<p>Water and air often take the blame as well. Hard borewell water and pollution can leave a scalp feeling coated and itchy, but they do not cause seborrhoeic dermatitis; <a href="/blog/hard-water-pollution-and-hair-fall-in-gurgaon">what hard water and pollution really do to hair</a> separates the two.</p>

<h2 id="conditions-that-look-like-dandruff">Dandruff, psoriasis, fungal infection or a reaction?</h2>

<p>A flaking, itchy scalp is a symptom with several possible causes, managed in different ways, and some of them cause hair loss in their own right. The table is a general guide; the diagnosis is made by looking at the scalp.</p>

<div class="table-scroll">
  <table class="data data--wide">
    <caption class="sr-only">Dandruff and the scalp conditions that look like it: usual signs and how each relates to hair loss. A general guide, not a diagnosis.</caption>
    <thead>
      <tr><th scope="col">Condition</th><th scope="col">Usual signs</th><th scope="col">Link with hair loss</th></tr>
    </thead>
    <tbody>
      <tr><th scope="row" style="white-space:normal;width:24%">Dandruff and seborrhoeic dermatitis</th><td>Loose white or greasy yellowish flakes, itch, redness in more inflamed cases; eyebrows, nose creases or ears may be involved</td><td>Can increase shedding while inflamed; not scarring; usually recovers once controlled</td></tr>
      <tr><th scope="row" style="white-space:normal;width:24%">Scalp psoriasis</th><td>Thick, sharply outlined red plaques with silvery-white scale, often at the back of the head and past the hairline; sometimes elbows, knees or nails</td><td>Temporary local hair loss in severe cases; scarring is rare</td></tr>
      <tr><th scope="row" style="white-space:normal;width:24%">Fungal infection (tinea capitis)</th><td>Scaly patches with broken hairs or black dots; sometimes a tender, boggy swelling and swollen neck glands; mostly in children</td><td>Causes patchy hair loss; a severe inflamed infection can leave permanent bald areas</td></tr>
      <tr><th scope="row" style="white-space:normal;width:24%">Contact dermatitis</th><td>Itch, redness, stinging or oozing after a hair dye, a new product or a home remedy; often at the hairline, ears, eyelids and neck</td><td>A strong reaction can be followed by a temporary shed</td></tr>
      <tr><th scope="row" style="white-space:normal;width:24%">Dry scalp</th><td>Small, dry, white flakes, little redness, dry skin elsewhere; worse in cold, dry weather</td><td>No direct link</td></tr>
    </tbody>
  </table>
</div>

<h3>Scalp psoriasis</h3>

<p>Psoriasis plaques are thicker and more clearly outlined than seborrhoeic dermatitis, with silvery rather than greasy scale, and they commonly extend onto the forehead, behind the ears or down the neck. The two conditions can overlap. <a href="https://dermnetnz.org/topics/scalp-psoriasis" rel="noopener nofollow" target="_blank">DermNet's scalp psoriasis page</a> notes that antifungal shampoos work well for dandruff but have a more variable effect on psoriasis, which is one reason "dandruff" that never responds deserves a second look.</p>

<h3>Fungal infection of the scalp</h3>

<p>Tinea capitis, or scalp ringworm, is most common in children, although adults can get it. It typically causes scaly patches where hairs have broken off. DermNet is clear that it needs antifungal medicine taken by mouth, prescribed by a doctor, because shampoos cannot reach the fungus inside the hair root; a medicated shampoo only helps limit spread. Dandruff is less common before puberty, so a child with a scaly scalp and patchy hair loss should be seen by a doctor rather than given an anti-dandruff shampoo.</p>

<h3>Contact dermatitis</h3>

<p>An itchy, red or stinging scalp that starts after a new product, a hair dye or a home remedy may be a reaction to it, either irritation or a true allergy. The hair dye chemical paraphenylenediamine (PPD) is a well-known cause; <a href="/blog/premature-grey-hair-causes">colouring grey hair and the PPD patch test</a> covers dye allergy in detail. Stopping the product is the main treatment.</p>

<h2 id="medicated-shampoos">Medicated shampoo ingredients, by type</h2>

<p>Medicated shampoos are the mainstay of treatment, and the active ingredient matters more than the brand. The <a href="https://www.aad.org/public/everyday-care/hair-scalp-care/scalp/treat-dandruff" rel="noopener nofollow" target="_blank">American Academy of Dermatology's dandruff guidance</a> and DermNet list broadly the same groups:</p>

<ul>
  <li><strong>Ketoconazole:</strong> an antifungal that reduces Malassezia, and a common first choice for seborrhoeic dermatitis.</li>
  <li><strong>Selenium sulfide:</strong> reduces the yeast and slows the turnover of scalp skin. DermNet suggests selenium or zinc preparations when an azole antifungal such as ketoconazole stops helping, because some strains of the yeast resist azoles.</li>
  <li><strong>Zinc pyrithione:</strong> antifungal and antibacterial, found in many everyday anti-dandruff shampoos and often used for milder dandruff and maintenance.</li>
  <li><strong>Coal tar:</strong> slows skin cell turnover and reduces scale and itch, so it is useful for stubborn scaling and for psoriasis. The AAD notes that tar can discolour light-coloured, bleached or tinted hair and can make the scalp more sensitive to sun. It also smells strongly.</li>
  <li><strong>Salicylic acid:</strong> a keratolytic, meaning it lifts and loosens thick scale so that other treatments can reach the skin. It can dry the scalp.</li>
</ul>

<p>Where inflammation is marked, a doctor may add a prescribed anti-inflammatory scalp lotion for a short period, alongside the shampoo rather than in place of it. Prescribed preparations should be used only as prescribed by a doctor, not borrowed from someone else's prescription.</p>

<h2 id="how-to-use-medicated-shampoo">How to use a medicated shampoo so it works</h2>

<p>The commonest reason a suitable shampoo seems not to work is the way it is used. A medicated shampoo treats the skin of the scalp, not the hair, and it needs time in contact with that skin.</p>

<ol>
  <li><strong>Part the hair as you apply it,</strong> so the shampoo reaches the scalp rather than sitting on the lengths.</li>
  <li><strong>Massage it in with the fingertips,</strong> not the nails.</li>
  <li><strong>Leave it on for the time stated on the label</strong> before rinsing. The AAD notes that some need five to ten minutes.</li>
  <li><strong>Rinse thoroughly,</strong> and use an ordinary conditioner on the lengths if they feel dry.</li>
  <li><strong>Use it for long enough to judge.</strong> DermNet describes twice-weekly use for at least a month, and the NHS suggests trying a shampoo for up to four weeks before deciding it has not helped.</li>
  <li><strong>Switch ingredients if it stops helping.</strong> Alternating shampoos with different active ingredients is a common approach.</li>
  <li><strong>Keep a maintenance routine once it clears,</strong> using the medicated shampoo less often. Stopping abruptly is the usual reason it returns quickly.</li>
</ol>

<p>Regular washing helps, because it removes the oil the yeast feeds on; the hairs seen on wash days were already loose. What does not help is very hot water, hard scrubbing, or a heavy coat of oil left on a flaking scalp. Oiling is a long-standing part of hair care in many Indian homes, and on the lengths it is reasonable. On an inflamed scalp it tends to feed the problem.</p>

<?= blog_cta(
    'Flakes, hair fall, or both?',
    'An examination tells dandruff apart from psoriasis, a fungal infection or a reaction to a product, and checks separately whether the hair loss has a cause of its own.'
) ?>

<h2 id="when-to-see-a-doctor">When to see a doctor</h2>

<p>Most dandruff can be managed at home. The NHS advises seeing a doctor if symptoms continue after at least four weeks of anti-dandruff shampoo, if the dandruff is severe or the scalp very itchy, if the scalp is red or swollen, or if itchy, flaky patches appear on the face or body. See a doctor promptly as well if:</p>

<ul>
  <li>there are patches of hair loss, broken hairs or black dots on the scalp;</li>
  <li>a child has a scaly scalp, especially with hair loss;</li>
  <li>there is a tender, boggy swelling, pus or swollen glands in the neck;</li>
  <li>you have thick, sharply outlined plaques, or psoriasis elsewhere on the body;</li>
  <li>the scalp is sore, bleeding or weeping;</li>
  <li>itch, redness or swelling began after a hair dye or a home remedy;</li>
  <li>the hair is still thinning, or the parting or hairline is changing, after the scalp has settled.</li>
</ul>

<p>Swelling of the face, lips or throat, or difficulty breathing after a hair product, needs emergency care.</p>

<h2 id="getting-it-assessed">Getting it assessed</h2>

<p>An assessment separates the two questions that are usually tangled together: what the scalp condition is, and whether there is hair loss with a cause of its own. The scalp is examined with the hair parted in several places, and the hair is checked for broken hairs, bare patches and miniaturisation. If both problems are present, both are treated, because neither treatment fixes the other.</p>

<p>Consultations are with registered medical practitioners at our clinics in Sector 39, Gurugram and Rohini, Delhi. <a href="/dandruff-treatment-in-gurgaon">Dandruff treatment in Gurugram</a> and <a href="/dandruff-treatment-in-rohini">dandruff treatment in Rohini</a> set out how a flaking scalp is diagnosed and controlled. If shedding is the bigger worry, the <a href="/hair-loss-assessment">hair loss self-assessment</a> helps you organise what you have noticed before an appointment.</p>

<?php require __DIR__ . '/../includes/blog-footer.php'; ?>
