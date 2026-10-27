<?php
/**
 * /blog/hair-transplant-cost-delhi-quotes
 *
 * The arithmetic of comparing hair transplant quotes. Deliberately quotes no
 * rupee figures (ours or anyone else's): every example uses letters, so the
 * method holds whatever the prices are. The clinical reasons quotes differ
 * (staffing, session length, graft counting) live in
 * /blog/why-hair-transplant-quotes-vary; this post links to it rather than
 * repeating it. Links go to Rohini pages and general pages only (client rule,
 * 14 Oct 2026).
 *
 * Not yet reviewed by the clinic's doctor: the shared post template prints a
 * review byline for every post, so this article must be reviewed before it is
 * published.
 */

declare(strict_types=1);

$postSlug = 'hair-transplant-cost-delhi-quotes';
$postDescription = 'Comparing hair transplant quotes in Delhi: converting per-graft rates, packages, per-hair figures and instalments to one total, and what an estimate lists.';

/**
 * Drives both the FAQPage schema (emitted by blog-header.php) and the visible
 * accordion at the foot of this article, from this one array.
 */
$postFaqs = [
    ['q' => 'Can a clinic quote a hair transplant from photos sent on WhatsApp?',
     'a' => 'Photos are a reasonable way to start a conversation, and they can show roughly which areas are involved. They cannot show donor density or miniaturisation, so any figure based on them is a broad range rather than a quote. The number worth comparing is the one written after an examination.'],
    ['q' => 'Is GST included in a hair transplant quote?',
     'a' => 'Not always. Cosmetic procedures can attract GST, and a figure may be stated before or after it. Ask whether the quote includes tax and what the total payable is, and get the answer written on the estimate. Two quotes are only comparable once both are on the same basis.'],
    ['q' => 'Why did my estimate change after the examination?',
     'a' => 'Because the inputs became known. Donor density, the area to be treated, the density aimed for and whether the plan is staged all move the graft count, and the graft count moves the total. A change after an examination is expected; a change with no clinical reason given is worth questioning.'],
    ['q' => 'Is a package with a high graft ceiling better value?',
     'a' => 'Only if your plan genuinely needs close to that ceiling. A package price divided by the grafts you actually need is your real rate, and it can be far higher than the advertised figure. The ceiling should never be the reason more grafts are taken: the donor area does not replace what is removed.'],
    ['q' => 'Do I have to pay a deposit to keep a quoted rate?',
     'a' => 'A deposit belongs after you have a written estimate and have decided, not before. Ask how long the estimate stays valid, and what the cancellation and refund terms are. A rate that only holds if you pay today is a sales device, not a costing.'],
    ['q' => 'Are follow-up visits part of the quoted price?',
     'a' => 'Ask, because quotes differ. A transplant is usually followed for about a year, and the estimate should say how many reviews are included, over what period, and whether the first wash and dressings are part of it.'],
];
$postFaqId = 'delhi-quote-faqs';
$postFaqHeading = 'Comparing quotes: more questions';
require __DIR__ . '/../includes/blog-header.php';
?>

<p>Ask three clinics in Delhi what a hair transplant costs and you may get three answers in three different units: a rate per graft, a package covering "up to" a number of grafts, and a monthly instalment. Side by side they look like prices. They are not comparable yet, because each one rests on a different assumption that the headline does not show.</p>

<p>This article does the arithmetic. It quotes no rupee figures, ours or anyone else's; every example uses letters, so the method works whatever the numbers are. Why the underlying cost differs between clinics in the first place, from who operates to how long the session runs, is covered separately in <a href="/blog/why-hair-transplant-quotes-vary">why hair transplant quotes vary</a>.</p>

<h2 id="five-shapes-of-quote">The five shapes a quote arrives in</h2>

<div class="table-scroll">
  <table class="data">
    <caption class="sr-only">Common formats of hair transplant quotes and what each one leaves out</caption>
    <thead>
      <tr><th scope="col">Format</th><th scope="col">What the headline shows</th><th scope="col">What it leaves out</th></tr>
    </thead>
    <tbody>
      <tr><th scope="row">Per-graft rate</th><td>A rate for each graft</td><td>The graft count, and anything charged on top</td></tr>
      <tr><th scope="row">Slab rate</th><td>Different rates for different bands of grafts</td><td>The average rate across your actual count</td></tr>
      <tr><th scope="row">Package or session price</th><td>One figure covering "up to" a number of grafts</td><td>The real rate for the grafts you need</td></tr>
      <tr><th scope="row">Per-hair figure</th><td>A count of hairs, which is larger than the graft count</td><td>The number of grafts it represents</td></tr>
      <tr><th scope="row">Monthly instalment</th><td>An amount per month</td><td>The total repayable, and the lender's fees</td></tr>
    </tbody>
  </table>
</div>

<h2 id="the-sum-underneath">The one sum underneath every quote</h2>

<p>Whatever its shape, every quote reduces to the same sum:</p>

<blockquote>Total payable = grafts × rate + items charged separately + tax</blockquote>

<p>The rate is only one term in it, and often not the largest source of difference. Two rules follow. Compare totals, not rates. And compare totals for the same plan: the same areas, a similar density, the same number of sessions. If the plans differ, the comparison is about the plans, and the first question is why one clinic thinks your head needs more grafts than another.</p>

<h2 id="worked-examples">Five worked examples, without prices</h2>

<h3>A lower rate on a higher count</h3>

<p>Quote A is 2,000 grafts at a rate R. Quote B is 2,600 grafts at a rate 20% lower, 0.8R. Quote A comes to 2,000R. Quote B comes to 2,080R. The cheaper-looking rate produces the larger bill, and the more important question is why one plan uses 600 more grafts from a donor area that does not replace them. <a href="/blog/donor-area-limits-hair-transplant">Why your donor area is a one-time budget</a> explains what is at stake.</p>

<h3>A package "up to" a number of grafts</h3>

<p>A package priced at P covers up to 3,000 grafts. Divided by 3,000, it looks like a low rate. But if your examination shows that you need 1,800, you are paying P for 1,800 grafts, so your real rate is P ÷ 1,800. Because 3,000 ÷ 1,800 is about 1.67, that is roughly two-thirds more per graft than the advertised figure. A package is only good arithmetic when the plan genuinely needs close to its ceiling, and a ceiling should never be the reason more grafts are taken.</p>

<h3>A per-hair figure</h3>

<p>A graft is a follicular unit: a natural group of one to four hairs, commonly about two on average, though this varies from person to person and between the hairline and the rest of the scalp. So a plan described as 4,000 hairs is in the region of 2,000 grafts, and a per-hair rate H works out at very roughly 2H per graft. Ask for the graft count. If a clinic quotes only hairs, ask how many grafts that represents and how they were counted.</p>

<h3>A slab rate</h3>

<p>Some quotes charge one rate up to a threshold and another above it. With rate R1 for the first 1,000 grafts and R2 beyond that, 2,200 grafts cost 1,000 × R1 + 1,200 × R2. The figure to compare is that total, or the average it implies: the total divided by 2,200. Quoting only one of the two rates makes the whole job look different from what it is.</p>

<h3>An estimate given as a range</h3>

<p>Most careful estimates are ranges, because the final count depends on what the donor area yields on the day. A plan of 1,800 to 2,200 grafts at rate R spans 400R between its two ends. Ask which end you will be billed at, whether you pay for grafts actually placed or for the estimate, and how and when you will be told the final count. All three answers belong in writing before the day.</p>

<p>If you want a starting point for your own count before any of this, the <a href="/hair-transplant-graft-calculator">graft calculator</a> gives a range by pattern of loss, and <a href="/blog/how-many-grafts-do-you-need">how a graft number is reached</a> explains why only an examination can narrow it.</p>

<h2 id="what-an-estimate-lists">What an itemised estimate should list</h2>

<p>Two totals can differ simply because one includes what the other bills later. An itemised estimate removes that guesswork. These are the lines worth checking on each quote you hold:</p>

<div class="table-scroll">
  <table class="data">
    <caption class="sr-only">Lines a written hair transplant estimate should state, and why each matters when comparing</caption>
    <thead>
      <tr><th scope="col">Line</th><th scope="col">What it should state</th><th scope="col">Why it matters when comparing</th></tr>
    </thead>
    <tbody>
      <tr><th scope="row">The procedure</th><td>Technique (FUE, DHI or both), areas treated, the graft range and the billing basis</td><td>Without these, two totals may describe different operations</td></tr>
      <tr><th scope="row">Assessment and blood tests</th><td>Whether they are charged, and whether by the clinic or a laboratory</td><td>A cost on one quote may be missing from the other</td></tr>
      <tr><th scope="row">Anaesthesia and theatre</th><td>Included, or listed separately</td><td>These scale with time rather than graft count</td></tr>
      <tr><th scope="row">Medicines</th><td>Whether the first course after surgery is included</td><td>Easy to overlook when comparing</td></tr>
      <tr><th scope="row">Dressings and the first wash</th><td>Included or not</td><td>Part of aftercare that is easy to leave off</td></tr>
      <tr><th scope="row">Follow-up reviews</th><td>How many, and over how many months</td><td>A transplant is followed for about a year</td></tr>
      <tr><th scope="row">Supporting treatment</th><td>PRP or medicines, listed as optional and priced separately</td><td>A clinical decision, not part of the surgery</td></tr>
      <tr><th scope="row">Tax</th><td>Whether figures include it, and the total payable</td><td>Can make two similar quotes look different</td></tr>
      <tr><th scope="row">Deposit and refunds</th><td>The deposit, cancellation terms and refund position</td><td>Matters only if plans change, which they sometimes do</td></tr>
      <tr><th scope="row">Validity</th><td>How long the estimate stands</td><td>Time to compare without pressure</td></tr>
    </tbody>
  </table>
</div>

<p>Supporting treatment deserves a word of its own. Whether <a href="/hair-prp-treatment-in-rohini">PRP</a> or ongoing medical treatment belongs in your plan is a clinical question about the hair that is not being transplanted. It should never be bundled in to make a total look fuller, and it should be possible to decline it. At our Rohini clinic the estimate is given itemised and in writing after the assessment; <a href="/hair-transplant-cost-in-rohini">hair transplant cost in Rohini</a> sets out what decides it.</p>

<h2 id="instalments">Instalments: turn the monthly figure back into a total</h2>

<p>A monthly figure is the easiest number to make look small, because it depends on how many months you pay for. Convert it back:</p>

<blockquote>Total repayable = instalment × number of months + processing fee + any other charges</blockquote>

<p>Then set that against the total for paying outright. If the two differ, the difference is the cost of the finance, wherever it has been placed, including in a plan described as no-cost. Ask who the lender is, because the agreement is with them rather than the clinic, and note that cancelling a procedure does not automatically cancel a loan. Instalment options through third-party lenders may be available; ask at the consultation, and see <a href="/cost-and-emi-options">cost, EMI and payment options</a> for the questions to settle before signing anything.</p>

<h2 id="what-arithmetic-cannot-settle">What the arithmetic cannot settle</h2>

<p>A normalised total tells you what you are paying. It does not tell you what you are getting. Four questions sit outside the sum:</p>

<ul>
  <li><strong>Who performs each step.</strong> The rule on qualifications, and how to check a registration, is in <a href="/blog/who-can-legally-perform-a-hair-transplant-in-india">who can legally perform a hair transplant in India</a>.</li>
  <li><strong>Whether the graft count itself is right.</strong> A lower total built on too few grafts for the area, or a higher one built on too many for the donor, are both poor value.</li>
  <li><strong>Whether a staged plan has a reason.</strong> Reserving grafts for future loss is often sound; splitting a job to make each invoice smaller is not.</li>
  <li><strong>Whether you can attend the follow-up.</strong> Reviews run through the year, through summer heat and the smog season, and <a href="/blog/hair-transplant-recovery-in-delhi">recovering from a transplant in Delhi</a> covers why the journey matters.</li>
</ul>

<?= blog_cta(
    'Two quotes in front of you and no common unit',
    'Bring them to a consultation. An examination establishes what your donor area can support and what the plan actually needs, which is the only basis on which two totals can be judged against each other.'
) ?>
<h2 id="worksheet">A worksheet for two Delhi quotes</h2>

<ol>
  <li>Write each quote as a graft count (not hairs) and a total, both before and after tax.</li>
  <li>Check that the plans match: areas, technique, sessions and graft range. If they do not, stop and ask each clinic why.</li>
  <li>Convert packages, slab rates and per-hair figures using the sums above.</li>
  <li>Add any item that one quote lists separately and the other includes.</li>
  <li>Turn any instalment offer into a total repayable.</li>
  <li>Only then compare the totals, and take the questions the arithmetic cannot answer to the consultation.</li>
</ol>

<p>At that point the remaining difference is usually about who operates and how much of their time you get, which is a decision about what you are buying rather than something to haggle over. The <a href="/blog/questions-to-ask-hair-transplant-consultation">questions worth asking at a consultation</a> help with that part. Consultations and procedures for <a href="/hair-transplant-in-rohini">hair transplant in Rohini</a>, by <a href="/fue-hair-transplant-in-rohini">FUE</a> or <a href="/dhi-hair-transplant-in-rohini">DHI</a>, take place at our clinic in North-West Delhi.</p>

<?php require __DIR__ . '/../includes/blog-footer.php'; ?>
