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
];

/**
 * Newest first. `updated` is optional and only set when a post has been
 * meaningfully revised — never bumped just to look fresh.
 */
const BLOG_POSTS = [
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
        'seo_title'=> 'Donor Area Limits: What a Hair Transplant Can Cover',
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
        'seo_title'=> 'Hair Transplant Repair: What Can and Cannot Be Fixed',
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
        'seo_title'=> 'How to Read Hair Transplant Before and After Photos',
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
function blog_card(array $post): string
{
    $hub = BLOG_HUBS[$post['hub']] ?? null;

    ob_start(); ?>
<article class="card" style="padding:0;overflow:hidden;display:flex;flex-direction:column">
  <a href="<?= e(blog_url($post['slug'])) ?>" aria-label="<?= e($post['title']) ?>">
    <?php
      /**
       * The card used to hard-code a patient's before/after photograph for every
       * post while taking its alt from the post record — so a photograph of a
       * named patient was announced to screen readers as "Diagram of the seven
       * Norwood stages". A post may now set an 'image' key with its own
       * 'image_alt'; none currently does.
       *
       * Oct 2026: the default used to be the clinic shopfront photograph, whose
       * window signage reads "No Pain | No Scar | No Stitch" and "Permanent Hair
       * Loss Solution" — claims the NMC Guidelines of 06.10.2026 prohibit. Each
       * hub now defaults to one of the homepage's AI-generated illustrations,
       * which must carry a visible "AI-generated" mark (cl. 7.2) — hence the chip.
       */
      $hubArt = [
          'hair-transplant' => ['/assets/img/home/stage-temples-720.webp',  'AI-generated diagram of a receding hairline seen from above'],
          'prp'             => ['/assets/img/home/hero-800.webp',           'AI-generated illustration of hair follicles in the scalp'],
          'beard'           => ['/assets/img/home/step-procedure-640.webp', 'AI-generated image of sterile hair-restoration instruments'],
          'hair-fall'       => ['/assets/img/home/stage-female-720.webp',   'AI-generated diagram of diffuse thinning along a parting'],
      ];
      $cardImage = $post['image'] ?? null;
      $cardAlt   = $cardImage !== null ? $post['image_alt'] : null;
      $isAi      = $cardImage === null;
      if ($isAi) {
          [$cardImage, $cardAlt] = $hubArt[$post['hub']] ?? $hubArt['prp'];
      }
    ?>
    <div class="media ratio-16-10 media--shadow" style="position:relative"><img src="<?= e($cardImage) ?>" alt="<?= e($cardAlt) ?>" width="800" height="500" loading="lazy" style="width:100%;height:100%;object-fit:cover"><?php if ($isAi): ?><span aria-hidden="true" style="position:absolute;right:10px;top:10px;padding:2px 9px;border-radius:999px;background:rgba(255,255,255,.9);color:#3F4B46;font-size:11px;font-weight:600">AI-generated</span><?php endif; ?></div>
  </a>
  <div style="padding:24px;display:flex;flex-direction:column;flex:1 1 auto">
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
      · Reviewed by <?= e(REVIEWED_BY) ?>
    </p>
  </div>
</article>
<?php
    return (string) ob_get_clean();
}
