<?php
/**
 * Topic clusters — pillar, cluster and supporting pages.
 *
 * WHY THIS EXISTS. The competitors that hold the Gurgaon hair-transplant SERP
 * (Eugenix, DHI India, QHT) win partly on architecture: one pillar per money
 * query, every technique/cost/concern page linked up to it, and the pillar
 * linking down to every one of them. This site had the pages but not the
 * wiring — the beard hub never linked its own cost or eyebrow pages, the PRP
 * hub sent "cost" clicks to the hair-transplant cost page, and the hair-fall
 * hub never linked alopecia, dandruff or women's hair loss at all.
 *
 * This file is the single map. footer.php calls cluster_section() for the page
 * being rendered, so every pillar lists its whole cluster and every cluster
 * page links up to its pillar and across to its siblings, with no per-page
 * edits. Adding a page to a cluster is one line here.
 *
 * Rules:
 *   • Anchors are descriptive and keyword-bearing, but never identical to the
 *     target's <title> and never repeated across clusters.
 *   • Only indexable pages. FUT is deliberately absent: that page is noindex
 *     pending confirmation that the clinic performs strip surgery.
 *   • 'posts' names supporting articles by slug; blog_posts() already drops any
 *     registry entry whose file does not exist, and so does this renderer.
 */

declare(strict_types=1);

require_once __DIR__ . '/blog.php';

const CLUSTERS = [
    'hair-transplant' => [
        'label'  => 'Hair Transplant',
        'pillar' => ['url' => '/hair-transplant-in-gurgaon', 'anchor' => 'Hair transplant in Gurgaon — the complete guide'],
        'groups' => [
            'Techniques' => [
                ['url' => '/fue-hair-transplant-in-gurgaon',       'anchor' => 'FUE hair transplant',          'blurb' => 'Follicles extracted one by one, no linear scar — and why donor supply decides the plan.', 'posts' => ['fue-vs-dhi-hair-transplant', 'fue-vs-fut-hair-transplant', 'donor-area-limits-hair-transplant', 'how-many-grafts-do-you-need']],
                ['url' => '/dhi-hair-transplant-in-gurgaon',       'anchor' => 'DHI hair transplant',          'blurb' => 'Implanter-pen placement for hairlines and detail zones, and when DHI is not worth the premium.', 'posts' => ['fue-vs-dhi-hair-transplant', 'natural-hairline-design-explained', 'how-many-grafts-do-you-need', 'why-hair-transplant-quotes-vary']],
                ['url' => '/unshaven-hair-transplant-in-gurgaon',  'anchor' => 'No-shave (unshaven) transplant','blurb' => 'What working without shaving really allows, and the graft limits it brings.', 'posts' => ['fue-vs-dhi-hair-transplant', 'first-14-days-after-a-hair-transplant', 'hair-transplant-recovery-in-gurgaon']],
            ],
            'By area and patient' => [
                ['url' => '/hairline-transplant-in-gurgaon',       'anchor' => 'Hairline restoration',         'blurb' => 'Receding temples and frontal lines, designed to still look right at fifty.', 'posts' => ['natural-hairline-design-explained', 'norwood-scale-explained', 'how-many-grafts-do-you-need']],
                ['url' => '/crown-hair-transplant-in-gurgaon',     'anchor' => 'Crown and vertex transplant',  'blurb' => 'Why the crown consumes grafts fastest and how to plan it against donor supply.', 'posts' => ['donor-area-limits-hair-transplant', 'norwood-scale-explained', 'is-a-hair-transplant-permanent']],
                ['url' => '/hair-transplant-for-women-in-gurgaon', 'anchor' => 'Hair transplant for women',    'blurb' => 'Who is a surgical candidate, and why the medical workup comes first.', 'posts' => ['female-pattern-hair-loss-in-women', 'who-should-not-have-a-hair-transplant', 'blood-tests-for-hair-fall']],
                ['url' => '/hair-transplant-repair-in-gurgaon',    'anchor' => 'Failed transplant repair',     'blurb' => 'Correcting pluggy grafts, low hairlines and over-harvested donor areas.', 'posts' => ['hair-transplant-repair-options', 'hair-transplant-promises-and-success-rates', 'how-to-read-before-and-after-photos']],
            ],
            'Cost and planning' => [
                ['url' => '/hair-transplant-cost-in-gurgaon',      'anchor' => 'Hair transplant cost in Gurgaon', 'blurb' => 'Graft count × rate, Norwood graft bands, and what an honest estimate includes.', 'posts' => ['why-hair-transplant-quotes-vary', 'how-many-grafts-do-you-need', 'questions-to-ask-hair-transplant-consultation']],
                ['url' => '/cost-and-emi-options',                 'anchor' => 'EMI and payment options',      'blurb' => 'Instalments, deposits and how finance terms are set.', 'posts' => ['why-hair-transplant-quotes-vary', 'questions-to-ask-hair-transplant-consultation']],
                ['url' => '/hair-transplant-graft-calculator',     'anchor' => 'Graft calculator',             'blurb' => 'A deliberately wide graft range by stage and zone — and what it cannot know.', 'posts' => ['how-many-grafts-do-you-need', 'norwood-scale-explained', 'donor-area-limits-hair-transplant']],
                ['url' => '/hair-loss-assessment',                 'anchor' => 'Hair loss self-assessment',    'blurb' => 'Two minutes to see whether surgery, medical treatment or waiting fits your pattern.', 'posts' => ['norwood-scale-explained', 'telogen-effluvium-vs-pattern-hair-loss', 'who-should-not-have-a-hair-transplant']],
            ],
            'Choosing and recovery' => [
                ['url' => '/how-to-choose-hair-transplant-clinic', 'anchor' => 'How to choose a clinic',       'blurb' => 'Who operates, how grafts are counted, and the answers that should worry you.', 'posts' => ['questions-to-ask-hair-transplant-consultation', 'who-can-legally-perform-a-hair-transplant-in-india', 'why-hair-transplant-quotes-vary']],
                ['url' => '/hair-transplant-aftercare',            'anchor' => 'Recovery and aftercare guide', 'blurb' => 'Washing, sleeping, shedding and the month-by-month growth timeline.', 'posts' => ['first-14-days-after-a-hair-transplant', 'hair-transplant-growth-timeline-month-by-month', 'shedding-and-shock-loss-after-hair-transplant', 'hair-transplant-recovery-in-gurgaon']],
            ],
        ],
    ],

    'prp' => [
        'label'  => 'PRP & Non-Surgical Hair Treatment',
        'pillar' => ['url' => '/hair-prp-treatment-in-gurgaon', 'anchor' => 'Hair PRP treatment in Gurgaon — the complete guide'],
        'groups' => [
            'Injectable and in-clinic therapies' => [
                ['url' => '/prp-hair-treatment-cost-in-gurgaon',   'anchor' => 'PRP hair treatment cost',      'blurb' => 'Per-session vs course pricing, and what a PRP package should include.', 'posts' => ['what-to-ask-before-prp-in-gurgaon', 'does-prp-work-for-hair-loss', 'prp-or-hair-transplant']],
                ['url' => '/gfc-treatment-in-gurgaon',             'anchor' => 'GFC hair treatment',           'blurb' => 'Growth factor concentrate: how it differs from PRP and what the evidence shows.', 'posts' => ['prp-vs-gfc-vs-exosomes', 'does-prp-work-for-hair-loss', 'what-to-ask-before-prp-in-gurgaon']],
                ['url' => '/hair-mesotherapy-in-gurgaon',          'anchor' => 'Hair mesotherapy',             'blurb' => 'What is actually in the syringe, and where mesotherapy fits.', 'posts' => ['prp-vs-gfc-vs-exosomes', 'what-to-ask-before-prp-in-gurgaon']],
                ['url' => '/hair-microneedling-in-gurgaon',        'anchor' => 'Scalp microneedling',          'blurb' => 'Microneedling alone and alongside topical treatment.', 'posts' => ['does-prp-work-for-hair-loss', 'minoxidil-and-finasteride-in-india']],
                ['url' => '/hair-led-therapy-in-gurgaon',          'anchor' => 'LED and low-level laser therapy', 'blurb' => 'Light therapy for thinning hair: realistic expectations.', 'posts' => ['does-prp-work-for-hair-loss', 'minoxidil-and-finasteride-in-india']],
                ['url' => '/face-prp-treatment-in-gurgaon',        'anchor' => 'Face and skin PRP',            'blurb' => 'PRP for skin texture and under-eye concerns — a different indication from hair.', 'posts' => ['what-to-ask-before-prp-in-gurgaon']],
            ],
        ],
    ],

    'beard' => [
        'label'  => 'Beard & Facial Hair Transplant',
        'pillar' => ['url' => '/beard-transplant-gurgaon', 'anchor' => 'Beard transplant in Gurgaon — the complete guide'],
        'groups' => [
            'Facial hair restoration' => [
                ['url' => '/beard-transplant-cost-gurgaon',        'anchor' => 'Beard transplant cost',        'blurb' => 'Graft counts by zone — cheeks, moustache, goatee, sideburns — and what moves the price.', 'posts' => ['beard-transplant-what-to-expect', 'patchy-beard-wait-or-transplant', 'donor-area-limits-hair-transplant']],
                ['url' => '/eyebrow-transplant-in-gurgaon',        'anchor' => 'Eyebrow transplant',           'blurb' => 'Single-hair grafts at the flattest angle on the face, and the trimming that follows.', 'posts' => ['beard-transplant-what-to-expect', 'donor-area-limits-hair-transplant', 'natural-hairline-design-explained']],
            ],
        ],
    ],

    'hair-fall' => [
        'label'  => 'Hair Fall & Scalp Treatment',
        'pillar' => ['url' => '/hair-fall-treatment-in-gurgaon', 'anchor' => 'Hair fall treatment in Gurgaon — the complete guide'],
        'groups' => [
            'Conditions and treatments' => [
                ['url' => '/womens-hair-loss-treatment-in-gurgaon', 'anchor' => "Women's hair loss treatment", 'blurb' => 'Thyroid, iron, PCOS and post-partum causes checked before anything long-term.', 'posts' => ['female-pattern-hair-loss-in-women', 'blood-tests-for-hair-fall', 'telogen-effluvium-vs-pattern-hair-loss']],
                ['url' => '/alopecia-areata-treatment-in-gurgaon', 'anchor' => 'Alopecia areata (patchy hair loss)', 'blurb' => 'Round patches on the scalp or beard, treated medically — not surgically while active.', 'posts' => ['blood-tests-for-hair-fall', 'telogen-effluvium-vs-pattern-hair-loss']],
                ['url' => '/dandruff-treatment-in-gurgaon',        'anchor' => 'Dandruff and scalp conditions', 'blurb' => 'Seborrhoeic dermatitis, flaking and itch — and their effect on shedding.', 'posts' => ['hard-water-pollution-and-hair-fall-in-gurgaon', 'blood-tests-for-hair-fall']],
                ['url' => '/scalp-micropigmentation-in-gurgaon',   'anchor' => 'Scalp micropigmentation (SMP)', 'blurb' => 'A cosmetic tattoo that mimics follicles — for density illusion and scar camouflage.', 'posts' => ['hair-transplant-repair-options', 'donor-area-limits-hair-transplant']],
            ],
        ],
    ],
];

/**
 * Every cluster the page belongs to, as [key, role, entry]. Role is 'pillar'
 * or 'spoke'.
 *
 * @return array{0:string,1:string,2:array}|null
 */
function cluster_for(string $pageUrl): ?array
{
    $here = rtrim($pageUrl, '/');
    foreach (CLUSTERS as $key => $cluster) {
        if (rtrim($cluster['pillar']['url'], '/') === $here) {
            return [$key, 'pillar', $cluster['pillar']];
        }
        foreach ($cluster['groups'] as $items) {
            foreach ($items as $item) {
                if (rtrim($item['url'], '/') === $here) {
                    return [$key, 'spoke', $item];
                }
            }
        }
    }
    return null;
}

/** Published posts for the given slugs, in the order given. */
function cluster_posts(array $slugs): array
{
    $out = [];
    foreach ($slugs as $slug) {
        $post = blog_post($slug);
        if ($post !== null && is_file(dirname(__DIR__) . '/blog/' . $slug . '.php')) {
            $out[] = $post;
        }
    }
    return $out;
}

/**
 * Absolute URLs of the rest of this page's cluster, for MedicalWebPage
 * relatedLink. Pillars get every spoke; spokes get the pillar and siblings.
 */
function cluster_related_urls(string $pageUrl): array
{
    $found = cluster_for($pageUrl);
    if ($found === null) {
        return [];
    }
    $cluster = CLUSTERS[$found[0]];
    $urls = [abs_url($cluster['pillar']['url'])];
    foreach ($cluster['groups'] as $items) {
        foreach ($items as $item) {
            $urls[] = abs_url($item['url']);
        }
    }
    $self = abs_url($pageUrl);
    return array_values(array_filter(array_unique($urls), static fn (string $u): bool => rtrim($u, '/') !== rtrim($self, '/')));
}

/**
 * The cluster navigation block. Returns '' for pages outside every cluster.
 */
function cluster_section(string $pageUrl): string
{
    $found = cluster_for($pageUrl);
    if ($found === null) {
        return '';
    }
    [$key, $role, $entry] = $found;
    $cluster = CLUSTERS[$key];
    $here    = rtrim($pageUrl, '/');

    if ($role === 'pillar') {
        $posts = blog_posts($key);
    } else {
        $posts = cluster_posts($entry['posts'] ?? []);
    }

    ob_start(); ?>
<section class="section section--white" id="guide">
  <div class="wrap">
    <div class="measure">
      <p class="eyebrow"><?= $role === 'pillar' ? 'The complete guide' : 'Part of our ' . e(strtolower($cluster['label'])) . ' guide' ?></p>
      <h2 class="h2 mt-2"><?= $role === 'pillar'
          ? 'Everything in Our ' . e($cluster['label']) . ' Guide'
          : 'More From the ' . e($cluster['label']) . ' Guide' ?></h2>
      <p class="body mt-3"><?= $role === 'pillar'
          ? 'Each page below answers one question in depth — a technique, an area, a cost, a recovery stage' . (page_review_signed_off() ? ' — and every one is written and medically reviewed by ' . e(REVIEWED_BY) . '.' : '.')
          : 'This page covers one part of the decision. The overview, the related options and the supporting reading are below.' ?></p>
    </div>

    <?php if ($role === 'spoke'): ?>
    <a class="card card--pad-lg mt-5" href="<?= e($cluster['pillar']['url']) ?>" style="display:flex;gap:16px;align-items:center;text-decoration:none;color:inherit">
      <?= icon('arrow', 22, 'var(--accent-deep)') ?>
      <span><span class="eyebrow" style="display:block;color:var(--ink-muted)">Start with the overview</span><span class="h3" style="display:block;margin-top:6px"><?= e($cluster['pillar']['anchor']) ?></span></span>
    </a>
    <?php endif; ?>

    <?php foreach ($cluster['groups'] as $groupLabel => $items): ?>
      <?php $items = array_values(array_filter($items, static fn (array $i): bool => rtrim($i['url'], '/') !== $here)); ?>
      <?php if ($items === []) { continue; } ?>
    <h3 class="h4 mt-6"><?= e($groupLabel) ?></h3>
    <div class="grid grid--3 mt-3">
      <?php foreach ($items as $item): ?>
      <a class="card" href="<?= e($item['url']) ?>" style="text-decoration:none;color:inherit">
        <span class="h4" style="display:block"><?= e($item['anchor']) ?></span>
        <span class="meta" style="display:block;margin-top:8px"><?= e($item['blurb']) ?></span>
      </a>
      <?php endforeach; ?>
    </div>
    <?php endforeach; ?>

    <?php if ($posts !== []): ?>
    <h3 class="h4 mt-6"><?= $role === 'pillar' ? 'Supporting articles' : 'Further reading' ?></h3>
    <ul class="grid grid--2 mt-3" style="list-style:none;padding:0">
      <?php foreach ($posts as $post): ?>
      <li class="card card--tint" style="padding:16px 20px"><a href="<?= e(blog_url($post['slug'])) ?>" style="font-weight:600"><?= e($post['title']) ?></a></li>
      <?php endforeach; ?>
    </ul>
    <?php endif; ?>

    <?php if ($role === 'pillar'): ?>
    <h3 class="h4 mt-6">Related treatment guides</h3>
    <div class="btn-row mt-3">
      <?php foreach (CLUSTERS as $otherKey => $other): ?>
        <?php if ($otherKey === $key) { continue; } ?>
      <a class="btn btn--outline btn--sm" href="<?= e($other['pillar']['url']) ?>"><?= e($other['label']) ?> in Gurgaon</a>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>
<?php
    return (string) ob_get_clean();
}
