"""
Builds one social share card (Open Graph / Twitter image) per page.

Run from the repo root:   python _design/_build/og-cards.py

It starts the PHP dev server, reads every page in the sitemap (plus the few
unlisted ones below), and for each page writes

  assets/img/og/<slug>.jpg      1200 x 630 JPEG card
  includes/og-cards.php         URL -> card image + alt text, read by header.php

Re-run it after adding a page or changing a page title; a page with no card
falls back to the default card for its location.

Rules the cards follow (Oct 2026):
  - Location separation: a Rohini page's card names only Rohini, a Gurgaon
    page's card only Sector 39, Gurugram. Neutral pages show both.
  - Every picture is one of the site's existing AI images, and every card
    carries a visible "AI-generated illustration" mark (NMC cl. 7.2).
  - No people, no promotional wording: the headline is the page's own title.

Needs Pillow and the Windows Georgia / Segoe UI fonts.
"""

import html
import os
import re
import socket
import subprocess
import sys
import time
import urllib.error
import urllib.request

from PIL import Image, ImageDraw, ImageFont

ROOT = os.path.abspath(os.path.join(os.path.dirname(__file__), '..', '..'))
OUT_DIR = os.path.join(ROOT, 'assets', 'img', 'og')
MANIFEST = os.path.join(ROOT, 'includes', 'og-cards.php')
SVC = os.path.join(ROOT, 'assets', 'img', 'services', 'svc-{}-768.webp')

# Pages left out of the sitemap (noindex) that still get shared.
EXTRA = ['/dr-rahul', '/fut-hair-transplant-in-gurgaon', '/book-consultation']
# Utility pages that keep the default card.
SKIP = {'/thank-you'}

FONTS = os.path.join(os.environ.get('WINDIR', r'C:\Windows'), 'Fonts')
SERIF_BOLD = os.path.join(FONTS, 'georgiab.ttf')
SERIF = os.path.join(FONTS, 'georgia.ttf')
SANS = os.path.join(FONTS, 'segoeui.ttf')
SANS_SEMI = os.path.join(FONTS, 'seguisb.ttf')

# Palette: assets/css/home.css
IVORY = (246, 241, 232)      # --hp-ivory-100
GREEN = (15, 59, 47)         # --hp-green-800
TEAL = (35, 120, 107)        # --hp-teal-600
BODY = (68, 81, 75)          # --hp-body

W, H = 1200, 630
S = 2                        # drawn at 2x, then downsampled

PLACES = {
    'gurgaon': 'Sector 39, Gurugram',
    'rohini': 'Rohini, Delhi',
    'both': 'Sector 39, Gurugram · Rohini, Delhi',
}
ALT_PLACES = {
    'gurgaon': 'Sector 39, Gurugram',
    'rohini': 'Rohini, Delhi',
    'both': 'Gurugram and Delhi',
}

# What each AI image shows, for the alt text.
SUBJECTS = {
    'beard': 'a beard comb and brush',
    'consultation': 'a consultation desk with a dermatoscope',
    'crown': 'a model head with crown thinning',
    'eyebrow': 'an eyebrow',
    'follicle': 'hair follicles in the skin',
    'followup': 'a follow-up calendar',
    'hair-fall': 'a comb on a folded towel',
    'hair-transplant': 'follicular units',
    'hairline': 'a model head with a receding hairline',
    'laser': 'a laser handpiece and towel',
    'procedure': 'surgical instruments on a drape',
    'prp': 'a PRP sample tube',
    'skin': 'a cross-section of skin',
    'unshaven': 'a short-haired mannequin head',
    'women': 'a model head with a centre parting',
}

# First match wins: (substring of the URL, image).
IMAGE_RULES = [
    ('beard', 'beard'), ('eyebrow', 'eyebrow'), ('crown', 'crown'),
    ('hairline', 'hairline'), ('unshaven', 'unshaven'),
    ('scalp-micropigmentation', 'unshaven'),
    ('pcos', 'laser'), ('laser', 'laser'),
    ('women', 'women'), ('female', 'women'), ('pregnancy', 'women'),
    ('acne', 'skin'), ('melasma', 'skin'), ('skin', 'skin'), ('face-prp', 'skin'),
    ('microneedling', 'follicle'), ('led-therapy', 'follicle'),
    ('prp', 'prp'), ('gfc', 'prp'), ('mesotherapy', 'prp'), ('exosomes', 'prp'),
    ('aftercare', 'followup'), ('recovery', 'followup'), ('first-14-days', 'followup'),
    ('growth-timeline', 'followup'), ('shedding', 'followup'), ('exercise', 'followup'),
    ('what-to-do-after', 'followup'),
    ('repair', 'procedure'), ('second-hair-transplant', 'procedure'),
    ('side-effects', 'procedure'), ('diabetes', 'procedure'), ('fut-', 'procedure'),
    ('legally', 'procedure'),
    ('cost', 'consultation'), ('emi', 'consultation'), ('quotes', 'consultation'),
    ('consultation', 'consultation'), ('contact', 'consultation'),
    ('how-to-choose', 'consultation'), ('before-and-after', 'consultation'),
    ('/dr-', 'consultation'), ('delhi-clinic', 'consultation'), ('faqs', 'consultation'),
    ('who-should-not', 'consultation'), ('right-age', 'consultation'),
    ('norwood', 'crown'), ('assessment', 'crown'),
    ('hair-fall', 'hair-fall'), ('alopecia', 'hair-fall'), ('dandruff', 'hair-fall'),
    ('thyroid', 'hair-fall'), ('vitamin', 'hair-fall'), ('blood-tests', 'hair-fall'),
    ('telogen', 'hair-fall'), ('grey', 'hair-fall'), ('rosemary', 'hair-fall'),
    ('hard-water', 'hair-fall'), ('minoxidil', 'hair-fall'),
    ('graft', 'hair-transplant'), ('donor', 'hair-transplant'),
    ('fue', 'follicle'), ('dhi', 'follicle'),
    ('hair-transplant', 'hair-transplant'),
]

# First match wins: (substring of the URL, eyebrow).
EYEBROW_RULES = [
    ('/delhi-clinic', 'Hair · Skin · Laser'),
    ('/dr-', 'Doctor profile'),
    ('/about-us', 'About the clinic'),
    ('/contact', 'Contact'),
    ('/book-consultation', 'Appointments'),
    ('/faqs', 'Patient questions'),
    ('/hair-loss-assessment', 'Self-check tool'),
    ('/hair-transplant-graft-calculator', 'Graft calculator'),
    ('/how-to-choose', 'Patient guide'),
    ('/hair-transplant-aftercare', 'Patient guide'),
    ('/medical-disclaimer', 'Policy'), ('/privacy-policy', 'Policy'), ('/terms', 'Policy'),
    ('cost', 'Cost guide'), ('emi', 'Cost guide'),
    ('beard', 'Beard transplant'), ('eyebrow', 'Eyebrow transplant'),
    ('scalp-micropigmentation', 'Scalp micropigmentation'),
    ('laser', 'Laser hair removal'),
    ('skin', 'Skin treatment'), ('face-prp', 'Skin treatment'),
    ('prp', 'Non-surgical hair care'), ('gfc', 'Non-surgical hair care'),
    ('mesotherapy', 'Non-surgical hair care'), ('microneedling', 'Non-surgical hair care'),
    ('led-therapy', 'Non-surgical hair care'),
    ('hair-fall', 'Hair loss treatment'), ('alopecia', 'Hair loss treatment'),
    ('dandruff', 'Hair loss treatment'), ('womens-hair-loss', 'Hair loss treatment'),
    ('transplant', 'Hair transplant'),
]

# Headlines that cannot be read off the title.
HEADLINES = {
    '/about-us': 'A Doctor-Led Hair Restoration Clinic',
    '/contact': 'Contact and Clinic Locations',
    '/faqs': 'Hair Transplant FAQs',
    '/book-consultation': 'Book a Consultation',
    '/blog/': 'Hair Loss & Hair Transplant Blog',
}

# Default cards: the homepage, and one per clinic for pages without a card.
DEFAULTS = {
    'both': {'file': 'home', 'location': 'both'},
    'gurgaon': {'file': 'default-gurgaon', 'location': 'gurgaon'},
    'rohini': {'file': 'default-rohini', 'location': 'rohini'},
}
DEFAULT_CARD = {
    'eyebrow': 'Hair · Skin · Laser',
    'headline': 'DenceSpot Clinic',
    'byline': 'Hair transplant & hair loss care, doctor-led',
    'image': 'follicle',
}


# ---------------------------------------------------------------- crawl

def free_port():
    with socket.socket() as s:
        s.bind(('127.0.0.1', 0))
        return s.getsockname()[1]


def fetch(base, path):
    try:
        with urllib.request.urlopen(base + path, timeout=60) as r:
            return r.status, r.read().decode('utf-8')
    except urllib.error.HTTPError as e:
        return e.code, ''


def crawl(base):
    _, sitemap = fetch(base, '/sitemap.xml')
    paths = [re.sub(r'^https?://[^/]+', '', u) or '/' for u in re.findall(r'<loc>([^<]+)</loc>', sitemap)]
    paths = [p for p in paths if not re.search(r'\.(jpe?g|png|webp)$', p)]
    paths += [p for p in EXTRA if p not in paths]

    pages = []
    for path in paths:
        status, body = fetch(base, path)
        if status != 200 or path in SKIP:
            continue
        head = body.split('</head>')[0]
        title = re.search(r'<title>(.*?)</title>', head, re.S)
        canonical = re.search(r'<link rel="canonical" href="([^"]+)"', head)
        section = re.search(r'<meta property="article:section" content="([^"]*)"', head)
        pages.append({
            'url': re.sub(r'^https?://[^/]+', '', html.unescape(canonical.group(1))) or '/',
            'title': html.unescape(title.group(1).strip()) if title else '',
            'section': html.unescape(section.group(1)) if section else None,
        })
    return pages


# ---------------------------------------------------------------- copy

def location(url):
    """Mirrors hp_page_location() in includes/home-components.php."""
    url = url.rstrip('/')
    if url == '/delhi-clinic' or url.endswith('-in-rohini'):
        return 'rohini'
    if not url.startswith('/blog/') and url.endswith('-gurgaon'):
        return 'gurgaon'
    return 'both'


def first_match(url, rules, default):
    for needle, value in rules:
        if needle in url:
            return value
    return default


def headline(page):
    if page['url'] in HEADLINES:
        return HEADLINES[page['url']]
    t = page['title']
    stripped = re.sub(r'\s*\|\s*DenceSpot( Clinic)?\s*$', '', t)
    if stripped == t and ' | ' in t:
        stripped = t.split(' | ')[0]
    t = re.sub(r'\s*\(20\d\d\)', '', stripped)
    # Treatment pages: the keyword phrase before the colon is the headline.
    if not page['url'].startswith('/blog/') and ':' in t:
        t = t.split(':')[0]
    t = re.sub(r'\bRohini(?!,)(?: Delhi)?\b', 'Rohini, Delhi', t)
    return t.strip()


def card_for(page):
    url = page['url']
    loc = location(url)
    if url == '/':
        card = dict(DEFAULT_CARD)
    else:
        eyebrow = first_match(url, EYEBROW_RULES, 'DenceSpot Clinic')
        if url.startswith('/blog/') and url != '/blog/':
            eyebrow = 'Blog · ' + page['section'] if page['section'] else 'Blog'
        elif url == '/blog/':
            eyebrow = 'Blog'
        card = {
            'eyebrow': eyebrow,
            'headline': headline(page),
            'byline': 'DenceSpot Clinic',
            'image': first_match(url, IMAGE_RULES, 'follicle'),
        }
    card['location'] = loc
    card['file'] = 'home' if url == '/' else ('blog' if url == '/blog/' else url.strip('/').replace('/', '-'))
    return card


def alt_text(card):
    place = ALT_PLACES[card['location']]
    if card['headline'] == 'DenceSpot Clinic':
        clinics = 'clinics' if card['location'] == 'both' else 'clinic'
        lead = f'DenceSpot Clinic, hair, skin and laser {clinics} in {place}'
    else:
        lead = f"{card['headline']}. DenceSpot Clinic, {place}"
    return f"{lead}. AI-generated illustration of {SUBJECTS[card['image']]}."


# ---------------------------------------------------------------- drawing

def font(path, size):
    return ImageFont.truetype(path, size * S)


def wrap(draw, text, fnt, width):
    lines, line = [], ''
    for word in text.split():
        trial = f'{line} {word}'.strip()
        if draw.textlength(trial, font=fnt) <= width or not line:
            line = trial
        else:
            lines.append(line)
            line = word
    lines.append(line)
    return lines


def tracked(draw, xy, text, fnt, fill, tracking):
    x, y = xy
    for ch in text:
        draw.text((x, y), ch, font=fnt, fill=fill)
        x += draw.textlength(ch, font=fnt) + tracking


def picture(name):
    """The AI image, cover-fitted to the right-hand panel and feathered into the ivory."""
    panel_x, panel_w = 560, 640
    src = Image.open(SVC.format(name)).convert('RGB')
    scale = panel_w * S / src.width
    src = src.resize((panel_w * S, round(src.height * scale)), Image.LANCZOS)
    top = (src.height - H * S) // 2
    src = src.crop((0, top, panel_w * S, top + H * S))

    mask = Image.new('L', src.size, 255)
    feather = 200 * S
    md = ImageDraw.Draw(mask)
    for x in range(feather):
        t = x / feather
        md.line([(x, 0), (x, src.height)], fill=round(255 * t * t * (3 - 2 * t)))
    return src, mask, panel_x


def render(card, path):
    im = Image.new('RGB', (W * S, H * S), IVORY)
    pic, mask, panel_x = picture(card['image'])
    im.paste(pic, (panel_x * S, 0), mask)
    d = ImageDraw.Draw(im)

    left, text_w = 64 * S, 480 * S

    # AI mark, bottom right of the picture.
    pill_font = font(SANS_SEMI, 17)
    label = 'AI-generated illustration'
    lw = d.textlength(label, font=pill_font)
    pw, ph = lw + 40 * S, 38 * S
    px, py = W * S - 32 * S - pw, H * S - 30 * S - ph
    d.rounded_rectangle([px, py, px + pw, py + ph], radius=ph / 2, fill=(255, 255, 255))
    d.text((px + pw / 2, py + ph / 2), label, font=pill_font, fill=(22, 32, 28), anchor='mm')

    # Headline: largest size that fits in three lines (four at the floor).
    for size in range(62, 37, -2):
        hfont = font(SERIF_BOLD, size)
        lines = wrap(d, card['headline'], hfont, text_w)
        if len(lines) <= 3:
            break
    line_h = round(size * 1.16) * S

    eb_font = font(SANS_SEMI, 19)
    eb_h = 19 * S
    gap = 26 * S
    block_h = eb_h + gap + line_h * len(lines)
    # Eyebrow + headline sit centred in the space above the byline.
    top = max(56 * S, (440 * S - block_h) // 2 + 20 * S)

    tracked(d, (left, top), card['eyebrow'].upper(), eb_font, TEAL, 3.2 * S)
    y = top + eb_h + gap
    for line in lines:
        d.text((left, y), line, font=hfont, fill=GREEN)
        y += line_h

    # Rule, byline and the clinic(s) this page belongs to.
    d.rectangle([left, 468 * S, left + 56 * S, 471 * S], fill=TEAL)
    d.text((left, 492 * S), card['byline'], font=font(SERIF, 28), fill=GREEN)
    d.text((left, 540 * S), PLACES[card['location']], font=font(SANS, 21), fill=BODY)

    im = im.resize((W, H), Image.LANCZOS)
    im.save(path, 'JPEG', quality=86, optimize=True, progressive=True)


# ---------------------------------------------------------------- manifest

def php_str(s):
    return "'" + s.replace('\\', '\\\\').replace("'", "\\'") + "'"


def write_manifest(cards, defaults):
    width = max(len(php_str(u)) for u in cards)
    rows = '\n'.join(
        f"    {php_str(u).ljust(width)} => [{php_str(c['src'])}, {php_str(c['alt'])}],"
        for u, c in cards.items()
    )
    drows = '\n'.join(
        f"    {php_str(k).ljust(9)} => [{php_str(c['src'])}, {php_str(c['alt'])}],"
        for k, c in defaults.items()
    )
    body = f"""<?php
/**
 * Social share cards (og:image / twitter:image), one per page.
 *
 * GENERATED by _design/_build/og-cards.py, do not edit by hand. Re-run it
 * after adding a page or changing a page title:
 *
 *   python _design/_build/og-cards.py
 *
 * Each card is a 1200 x 630 JPEG showing the page's headline, the clinic it
 * belongs to (a Rohini card never names Gurugram, a Gurgaon card never names
 * Rohini) and one of the site's AI images with its "AI-generated
 * illustration" mark.
 */

declare(strict_types=1);

/** Page URL => [image path, alt text]. */
const OG_CARDS = [
{rows}
];

/** Fallback card by page location (see hp_page_location()). */
const OG_DEFAULT_CARDS = [
{drows}
];

/**
 * The share card for a page: its own card, else the default card for the
 * clinic it belongs to.
 *
 * @param 'gurgaon'|'rohini'|'both' $location
 * @return array{{image: string, alt: string}}
 */
function og_card(string $url, string $location = 'both'): array
{{
    [$image, $alt] = OG_CARDS[$url] ?? OG_DEFAULT_CARDS[$location] ?? OG_DEFAULT_CARDS['both'];

    return ['image' => $image, 'alt' => $alt];
}}
"""
    with open(MANIFEST, 'w', encoding='utf-8', newline='\n') as f:
        f.write(body)


# ---------------------------------------------------------------- main

def main():
    os.makedirs(OUT_DIR, exist_ok=True)
    port = free_port()
    base = f'http://127.0.0.1:{port}'
    server = subprocess.Popen(['php', '-S', f'127.0.0.1:{port}', 'router.php'], cwd=ROOT,
                              stdout=subprocess.DEVNULL, stderr=subprocess.DEVNULL)
    try:
        for _ in range(50):
            try:
                socket.create_connection(('127.0.0.1', port), timeout=1).close()
                break
            except OSError:
                time.sleep(0.1)
        pages = crawl(base)
    finally:
        server.terminate()

    cards, written = {}, set()
    for page in pages:
        card = card_for(page)
        if card['file'] in written:
            continue
        render(card, os.path.join(OUT_DIR, card['file'] + '.jpg'))
        written.add(card['file'])
        cards[page['url']] = {'src': f"/assets/img/og/{card['file']}.jpg", 'alt': alt_text(card)}

    defaults = {}
    for loc, spec in DEFAULTS.items():
        card = dict(DEFAULT_CARD, location=spec['location'], file=spec['file'])
        if spec['file'] not in written:
            render(card, os.path.join(OUT_DIR, spec['file'] + '.jpg'))
        defaults[loc] = {'src': f"/assets/img/og/{spec['file']}.jpg", 'alt': alt_text(card)}

    write_manifest(cards, defaults)
    print(f'{len(cards)} page cards + {len(defaults)} defaults -> assets/img/og/, includes/og-cards.php')


if __name__ == '__main__':
    sys.exit(main())
