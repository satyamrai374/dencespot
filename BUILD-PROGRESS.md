# DenceSpot — PHP build progress

Working tracker for the loop. Source of truth for scope: `SEO-STRATEGY-dencespot.md`.
**47 numbered pages → 51 URLs.**

## Architecture

```
includes/config.php      NAP, hours, doctors, navigation, shared copy — single source of truth
includes/schema.php      JSON-LD builders (MedicalClinic, Physician, MedicalProcedure, FAQPage, …)
includes/components.php  icon(), slot(), ticks(), faq_list(), nap_block(), enquiry_form(),
                         cta_band(), doctor_block(), local_block()
includes/header.php      <head> (title/meta/canonical/OG/JSON-LD) + masthead + breadcrumbs + <main>
includes/footer.php      footer + sticky mobile CTA + nav JS + conversion events
assets/css/site.css      design tokens + components, mobile-first
enquire.php              form handler → validates → logs → mails → 303 to /thank-you
```

Every page sets `$page[...]` then `require includes/header.php` … `require includes/footer.php`.

## Launch blockers from strategy §8.1 — status

| Blocker | Status |
|---|---|
| No `<title>` | ✅ fixed — required per page |
| No meta description | ✅ fixed |
| No canonical | ✅ fixed |
| No JSON-LD | ✅ fixed — `schema.php`, `MedicalClinic` not `LocalBusiness` |
| `min-width:1280px`, not responsive | ✅ fixed — mobile-first CSS |
| No Open Graph / Twitter | ✅ fixed |
| Design-canvas chrome (`<x-dc>`) | ✅ gone in PHP build |
| `image-slot` placeholders, no alt | ⏳ slots marked; awaiting real photography |
| Conversion tracking | ✅ `data-track` on every lead path + `/thank-you` redirect |

## Awaiting clinic sign-off — blocks launch

1. **NAP** — `config.php` uses the strategy's recommended canonical (§7.1). Four versions live. Confirm, then push byte-identically to GBP, Practo, Justdial, Bing Places, Apple Maps, Facebook.
2. **Hours** — site says Mon–Sat 10–20; Google says Mon–Sun 09–21. Conservative version published.
3. **Geo coordinates** — `GEO_LAT`/`GEO_LNG` are null; schema omits geo rather than guess.
4. **Dr. Nyra credentials** — live site claims MD (Dermatology) + fellowship + ISHRS + 5,000 procedures; build states MBBS + 3 years Germany. Only evidenced claims published.
5. **Per-graft rates** — `hair-transplant-cost-in-gurgaon.php` `$rates` holds `[CONFIRM]` placeholders.
6. ~~**`SITE_STAGING`**~~ — resolved 2026-08-25: set to `false`, pages now emit `index, follow`. The 404, thank-you and FUT pages keep their per-page `noindex`.

## Page status

Legend: ✅ built · 🔨 in progress · ⬜ not started · ⏭ keep live, schema only

### Tier 0 — conversion infrastructure
| # | URL | Status |
|---|---|---|
| 1 | `/` | ✅ |
| 2 | `/book-consultation` | ✅ |
| 3 | `/hair-transplant-cost-in-gurgaon` | ✅ |
| 4 | `/hair-transplant-results-gurgaon` | ✅ |
| 5 | `/patient-reviews` | ✅ |
| 6 | `/patient-stories/*` ×5 | ⬜ |
| 7 | `/hair-loss-assessment` | ⬜ |
| 8 | `/hair-transplant-graft-calculator` | ⬜ |
| 9 | `/cost-and-emi-options` | ⬜ |
| 10 | `/about-us` | ✅ |
| 11 | `/dr-nyra` | ✅ |
| 12 | `/dr-rahul` | ⬜ |
| 13 | `/contact` | ✅ |
| 14 | `/faqs` | ✅ |
| 15 | `/thank-you` | ✅ |

### Tier 1 — hair transplant cluster
| # | URL | Status |
|---|---|---|
| 16 | `/hair-transplant-in-gurgaon` | ✅ |
| 17 | `/fue-hair-transplant-in-gurgaon` | ⬜ |
| 18 | `/dhi-hair-transplant-in-gurgaon` | ⬜ |
| 19 | `/fut-hair-transplant-in-gurgaon` | ⬜ |
| 20 | `/beard-transplant-gurgaon` | ✅ |
| 21 | `/beard-transplant-cost-gurgaon` | ⬜ |
| 22 | `/eyebrow-transplant-in-gurgaon` | ⬜ |
| 23 | `/hairline-transplant-in-gurgaon` | ⬜ |
| 24 | `/crown-hair-transplant-in-gurgaon` | ⬜ |
| 25 | `/hair-transplant-for-women-in-gurgaon` | ⬜ |
| 26 | `/hair-transplant-repair-in-gurgaon` | ⬜ |
| 27 | `/unshaven-hair-transplant-in-gurgaon` | ⬜ |
| 28 | `/hair-transplant-aftercare` | ⬜ |

### Tier 1 — PRP & non-surgical cluster
| # | URL | Status |
|---|---|---|
| 29 | `/hair-prp-treatment-in-gurgaon` | ✅ |
| 30 | `/prp-hair-treatment-cost-in-gurgaon` | ⬜ |
| 31 | `/gfc-treatment-in-gurgaon` | ⬜ |
| 32 | `/hair-mesotherapy-in-gurgaon` | ⬜ |
| 33 | `/face-prp-treatment-in-gurgaon` | ⬜ |
| 34 | `/hair-fall-treatment-in-gurgaon` | ✅ |
| 35 | `/womens-hair-loss-treatment-in-gurgaon` | ⬜ |
| 36 | `/alopecia-areata-treatment-in-gurgaon` | ⬜ |
| 37 | `/scalp-micropigmentation-in-gurgaon` | ⬜ |
| 38 | `/dandruff-treatment-in-gurgaon` | ⬜ |
| 39 | `/hair-microneedling-in-gurgaon` | ⬜ |
| 40 | `/hair-led-therapy-in-gurgaon` | ⬜ |

### Tier 2 — decision & comparison
| # | URL | Status |
|---|---|---|
| 41 | `/fue-vs-dhi-hair-transplant` | ⬜ |
| 42 | `/fue-vs-fut-hair-transplant` | ⬜ |
| 43 | `/prp-vs-hair-transplant` | ⬜ |
| 44 | `/prp-vs-gfc-treatment` | ⬜ |
| 45 | `/best-hair-transplant-clinic-in-gurgaon` | ⬜ |
| 46 | `/how-to-choose-hair-transplant-clinic` | ⬜ |
| 47 | `/hair-transplant-risks-and-side-effects` | ⬜ |

### Beyond the 47 — requested separately
| Item | Status |
|---|---|
| `/blog/` index + post template | ✅ (1 post live) |
| Legal: `/privacy-policy`, `/terms`, `/medical-disclaimer` | ⬜ |
| `sitemap.xml`, `robots.txt`, `.htaccess` (clean URLs + 301s) | ⬜ |
| 404 page | ⬜ |

## Decisions taken

- **Beard URL** → `/beard-transplant-gurgaon`, matching the strategy and the live URL. Avoids a 301 and its recovery window. The earlier `beard-transplant-in-gurgaon.html` design export becomes the source for this page's content.
- **Design exports stay put.** The root `.html` files are the design-canvas source. The `.php` files are the production site. Move the exports into `_design/` once the PHP build replaces them everywhere.
- **Cost pages publish the arithmetic, not a fake headline price.** Real rates go in as soon as the clinic supplies them; `[CONFIRM]` placeholders until then.
- **Zero locality pages**, per the §5.3 gate. Nothing in this build is geo-variant.

## Loop log

- **Iter 1** — scaffolding (config/schema/components/header/footer/CSS/enquire) + pages 15, 2, 3, 16, 20. All lint clean, all render 200 with zero PHP notices. JSON-LD parses; FAQ schema count matches visible `<details>` exactly on both hubs.
- **Iter 2** — pages 29 (PRP hub), 34 (hair-fall hub, the 301 target), 13 (contact), 11 (dr-nyra), 10 (about-us). 10 of 47 built. All lint clean, all render 200, zero PHP notices.
  - Resolved a conflict between the two design exports: the PRP page credited "MBBS, MD (Dermatology)" while the hair transplant page credited MBBS only. `doctor_block()` now renders from config, so credentials cannot diverge per page again.
  - Per user instruction, nothing is published to claude.ai — everything stays in this repo.
- **Iter 3** — blog system (`includes/blog.php` registry, `blog-header.php` / `blog-footer.php` layout, `/blog/` index with topic filter) + first post `norwood-scale-explained` (1,464 words, Article + reviewedBy schema) + page 14 `/faqs` (20 clinic-level Q&As; deliberately no overlap with treatment-page FAQs). 12 of 47 built.
  - Artifact watch ended — the claude.ai canvas was deleted. No action taken; all work stays local.

- **Iter 4** — pages 4 (results gallery), 5 (patient reviews), favicon asset. 17 pages render clean.
  - **Credential drift fixed.** `config.php` resolved Dr. Nyra to *MBBS, MD (Dermatology)*. Five hero badges had the qualification hardcoded and instantly contradicted it. Added `doctor_credit()`, `doctor_name()`, `doctor_full()` in `components.php`; verified across all 14 pages — MD present, zero stale strings. **No page restates a credential now; config is the only source.**
  - **No fabricated proof.** `patient-reviews.php` emits no `AggregateRating` and `hair-transplant-results-gurgaon.php` emits no `ImageObject` while their arrays are empty. Both activate automatically once real reviews / consented photos are added. Do not hand-write either.

---

## ⏹ Handover — this loop stopped by user decision (Aug 2026)

A second agent was found building the same plan in this repo concurrently (it added `.htaccess`, `robots.txt`, `sitemap.php`, `LOCAL-SEO-STRATEGY-dencespot.md`, `_design/technique-pages/`, and overwrote `index.php`). To avoid clobbering, this loop stood down. **That session owns the remaining build.**

### Broken internal links to resolve (24)

These are linked from pages already built and currently 404. Building each clears its link:

`/fue-hair-transplant-in-gurgaon` · `/dhi-hair-transplant-in-gurgaon` · `/fut-hair-transplant-in-gurgaon` ·
`/hairline-transplant-in-gurgaon` · `/crown-hair-transplant-in-gurgaon` · `/hair-transplant-repair-in-gurgaon` ·
`/hair-transplant-for-women-in-gurgaon` · `/eyebrow-transplant-in-gurgaon` · `/hair-transplant-aftercare` ·
`/beard-transplant-cost-gurgaon` · `/prp-hair-treatment-cost-in-gurgaon` · `/gfc-treatment-in-gurgaon` ·
`/womens-hair-loss-treatment-in-gurgaon` · `/alopecia-areata-treatment-in-gurgaon` ·
`/scalp-micropigmentation-in-gurgaon` · `/cost-and-emi-options` ·
`/fue-vs-dhi-hair-transplant` · `/fue-vs-fut-hair-transplant` · `/prp-vs-gfc-treatment` ·
`/hair-transplant-risks-and-side-effects` · `/privacy-policy` · `/terms` · `/medical-disclaimer` · `/dr-rahul`

(`/sitemap.xml` is not broken — `.htaccess` rewrites it to `sitemap.php`.)

### Conventions any new page must follow

1. `require includes/header.php` … `require includes/footer.php`. Never re-declare `<head>`.
2. Never retype a credential, address, phone or hours — use `config.php` / `doctor_credit()`.
3. Pass the **same** `$faqs` array to `faq_list()` and `schema_faq()`. Schema count must equal visible `<details>` count.
4. No `AggregateRating`, `Review`, `ImageObject` or price markup for anything not visibly on the page.
5. Placeholders stay visibly marked (`[CONFIRM]`, `card--dashed`, "to be confirmed"). Never invent a price, statistic, review or result.
6. Zero locality pages — strategy §5.3 gate.

### Verify before publishing any page

```
php -l <file>                       # must be silent
php -S 127.0.0.1:8899 -t .          # then curl the page
# check: HTTP 200, no "Fatal error"/"Warning:", exactly one <h1>,
# JSON-LD parses, FAQ schema count == visible <details> count
```

---

## ▶ Resumed — SEO Phase 1 (Aug 2026)

Driven by `COMPETITOR-STRATEGY-hair-transplant-gurgaon.md`, written after analysing the
six competitor pages ranking for *hair transplant in Gurgaon*.

### ⛔ Launch blocker found on the live site

The deployed build still has `SITE_STAGING = true`. Every page on dencespot.com is
serving `<meta name="robots" content="noindex, nofollow">`:

```
$ curl -sL https://dencespot.com/hair-transplant-in-gurgaon | grep '<meta name="robots"'
<meta name="robots" content="noindex, nofollow">
```

`includes/config.php` in this working tree already has it set to `false` — **the fix
exists and has never been deployed.** `nofollow` additionally means no internal link
equity moves anywhere and any earned backlinks are discarded. Nothing else in the
roadmap produces a single visit until this ships.

### Built this iteration (2 pages)

| Page | Words | FAQs | Why first |
|---|---|---|---|
| `/hair-transplant-aftercare` | 3,313 | 14 | Linked from `NAV_FOOTER` → was 404 on all 29 pages. Recovery/washing/shedding queries are uncontested across all six competitors. |
| `/cost-and-emi-options` | 2,081 | 9 | Linked from `NAV_FOOTER` → was 404 on all 29 pages. Counter-positions the "50% off / pay ₹1000" promotions competitors lead with. |

Both verified per the convention above: `php -l` silent · HTTP 200 · zero PHP
notices · exactly one `<h1>` · JSON-LD parses · **FAQ schema count == visible
`<details>` count** (14/14 and 9/9) · `MedicalClinic · Physician · BreadcrumbList ·
FAQPage` emitted. Both picked up by `sitemap.php` automatically (it globs root `*.php`).

No fabricated proof: the clinic's first-wash protocol, accepted payment methods,
deposit policy, finance providers and cancellation terms are all `[CONFIRM]`
placeholders in `card--dashed` blocks. **`/cost-and-emi-options` must not be published
until the finance terms are signed off** — a wrong finance term is a
consumer-protection problem, not an SEO one.

### Broken internal links: 17 → 15

Both site-wide ones are cleared. Nothing now links into a dead end from `includes/`.
Remaining 15, all contextual, and each one is also a page on the strategy roadmap:

`/womens-hair-loss-treatment-in-gurgaon` (5 sources) · `/crown-hair-transplant-in-gurgaon` ·
`/hairline-transplant-in-gurgaon` · `/hair-transplant-repair-in-gurgaon` ·
`/hair-transplant-risks-and-side-effects` · `/gfc-treatment-in-gurgaon` ·
`/prp-hair-treatment-cost-in-gurgaon` · `/hair-transplant-for-women-in-gurgaon` ·
`/eyebrow-transplant-in-gurgaon` · `/fue-vs-dhi-hair-transplant` ·
`/fue-vs-fut-hair-transplant` · `/prp-vs-gfc-treatment` · `/beard-transplant-cost-gurgaon` ·
`/alopecia-areata-treatment-in-gurgaon` · `/scalp-micropigmentation-in-gurgaon`

> **Do not verify broken links with a local crawl.** PHP's built-in server falls back to
> `index.php` for any unmatched path and returns **200**, so every missing page looks
> healthy. Check hrefs against files on disk instead, or crawl the real Apache host.

### Next — Phase 2 (the competitive gap)

None of the six competitors have genuine comparison content, and three of these are
already linked from `/hair-transplant-in-gurgaon`:

1. `/fue-vs-dhi-hair-transplant` · `/fue-vs-fut-hair-transplant` · `/prp-vs-gfc-treatment`
2. `/hair-transplant-risks-and-side-effects` — competitors avoid it as "negative"; publishing
   it honestly against rivals claiming "100% survival rate" is the sharpest differentiator
   available, and balanced sources are preferentially cited in AI Overviews.
3. Real per-graft rates into `hair-transplant-cost-in-gurgaon.php` — only one of the six
   publishes a cost table at all.

---

## ▶ Resumed — URL-plan build out (Sep 2026)

Built the 21 root pages and one directory section from the supplied URL list. Every page
follows the conventions above: `$page` array, `schema_*` nodes, `faq_list($faqs)` fed the
same array as `schema_faq()`, `doctor_block()`, `local_block()`, `cta_band()`.

### Built this iteration (22 pages)

**Surgical spokes (7)** — `eyebrow-transplant-in-gurgaon` · `hairline-transplant-in-gurgaon` ·
`crown-hair-transplant-in-gurgaon` · `hair-transplant-for-women-in-gurgaon` ·
`hair-transplant-repair-in-gurgaon` · `unshaven-hair-transplant-in-gurgaon` ·
`beard-transplant-cost-gurgaon`

**Non-surgical (10)** — `gfc-treatment-in-gurgaon` · `hair-mesotherapy-in-gurgaon` ·
`face-prp-treatment-in-gurgaon` · `womens-hair-loss-treatment-in-gurgaon` ·
`alopecia-areata-treatment-in-gurgaon` · `scalp-micropigmentation-in-gurgaon` ·
`dandruff-treatment-in-gurgaon` · `hair-microneedling-in-gurgaon` ·
`hair-led-therapy-in-gurgaon` · `prp-hair-treatment-cost-in-gurgaon`

**Decision guides (2)** — `best-hair-transplant-clinic-in-gurgaon` (deliberately does *not*
claim to be the best; publishes verifiable criteria and an honest "what we are not" list) ·
`how-to-choose-hair-transplant-clinic`

**Tools + section (3)** — `hair-transplant-graft-calculator` · `hair-loss-assessment` ·
`patient-stories/index.php`

Both tools are vanilla JS, no dependencies, nothing transmitted, and both are written to
reinforce the site's existing position rather than undercut it: the calculator returns a
deliberately wide range and leads its output panel with what it cannot know (donor density),
and the assessment routes several answer combinations to "do not book a procedure yet".

### Broken internal links: 15 → 0 (root), 10 remaining (all blog)

Every one of the 15 contextual links listed in the previous section now resolves. The 10 that
remain are pre-existing and all point at **unwritten blog posts**, none of which were in the
supplied URL plan:

`/blog/blood-tests-for-hair-fall` (4 sources) · `/blog/telogen-effluvium-vs-pattern-hair-loss` (4) ·
`/blog/female-pattern-hair-loss-in-women` (4) · `/blog/minoxidil-and-finasteride-in-india` (4) ·
`/blog/hair-transplant-repair-options` (4) · `/blog/what-to-ask-before-prp-in-gurgaon` (3) ·
`/blog/beard-transplant-what-to-expect` · `/blog/hard-water-pollution-and-hair-fall-in-gurgaon` ·
`/blog/patchy-beard-wait-or-transplant` · `/blog/beard-transplant-recovery-timeline`

### Five comparison URLs resolved by 301, not by a second page

`fue-vs-dhi-hair-transplant`, `fue-vs-fut-hair-transplant`, `prp-vs-hair-transplant`,
`prp-vs-gfc-treatment` and `hair-transplant-risks-and-side-effects` were all in the URL plan
and all already had near-identical articles under `/blog/`. Publishing root copies would put
two of our own pages against each other for one query — strategy §5's central failure.

They now 301 to the existing articles. Rules live in `.htaccess` §1b, mirrored in `router.php`
§1c so local and production behave identically. Neither URL set is in the sitemap twice.

> ⚠ **Open decision.** The "Next — Phase 2" section above wants
> `/hair-transplant-risks-and-side-effects` as a *root* page, on the grounds that competitors
> avoid the topic and publishing it honestly is the sharpest differentiator available. That
> conflicts with the 301 now in place. To flip it: delete that line from `.htaccess` §1b and
> `router.php` §1c, build the root page, **and** 301 `/blog/hair-transplant-side-effects-and-risks`
> to it. Never run both. Same procedure applies to the other four.

### Awaiting clinic confirmation — do not launch these two without it

- **`/dr-rahul` was NOT built.** `config.php` names Dr. Nyra as the sole doctor and carries an
  explicit instruction not to publish unevidenced credentials. Building a second doctor's
  profile would mean inventing a person and their qualifications on a YMYL medical page.
  Confirm who Dr. Rahul is, their qualification and council registration, then add them to
  `DOCTORS` in `config.php` before the page is written.
- **`scalp-micropigmentation-in-gurgaon.php` describes SMP generically** and does not assert
  that it is performed in-house. Confirm whether the clinic offers it, refers for it, or
  neither — and mark the page accordingly before launch.

### Also touched

- `includes/schema.php` — **caught on review, before commit.** All 22 new pages render the
  dated "medically reviewed by … last reviewed August 2026" byline via `doctor_block()`, but
  none were added to `MEDICAL_PAGES`, so none emitted a `MedicalWebPage` node. That left 22
  pages asserting a review date in visible text with no structured data behind it — the wrong
  half to omit on a YMYL medical site. All 22 added. Byline and schema now agree on every
  page, new and existing. **Any new page calling `doctor_block()` must be added to that list
  in the same commit.**
- `sitemap.php` — the two globs only saw the site root and `/blog`, so a directory section
  was invisible to it. Added a small directory-index pass; `/patient-stories/` is now listed.
  Add future directory sections to that array.
- `patient-stories/index.php` duplicates the consented-case array from
  `before_after_slider_section()` in `includes/components.php`. Deliberate for now. Lift it
  into a shared include when a third case is added, and keep the `result` flag — it is what
  stops the procedure-day photograph being badged as an outcome.

### Verified

`php -l` clean on all 22. Rendered through `php -S` with `router.php`: HTTP 200 on every new
page, exactly one `<h1>`, JSON-LD parses, no PHP notices, meta descriptions inside 165 chars,
canonical matching `$page['url']`. All five 301s return 301 and their targets return 200.
Both inline scripts pass `node --check`. Full-site sweep: 68 URLs, zero regressions.
