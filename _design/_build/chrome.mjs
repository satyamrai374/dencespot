// Shared page chrome for DenceSpot service pages.
// The header, footer, doctor block, reviews, contact and booking sections are
// identical across the service set by design; everything clinical comes from
// the per-page spec so no two pages read alike.

const PHONE = '+918178330800';
const WA = 'https://api.whatsapp.com/send/?phone=%2B918178330800&text=Hi%2C%20please%20share%20me%20more%20information%20about%20your%20services';
const MAPS = 'https://www.google.com/maps?q=Dencespot+Clinic+Sector+39+Gurgaon';

export const ICONS = {
  shield: '<path d="M12 3l7 3v5.5c0 4.2-2.9 7.6-7 9-4.1-1.4-7-4.8-7-9V6z" /><path d="M9.5 12l1.8 1.8L15 10" />',
  clock: '<circle cx="12" cy="12" r="8.5" /><path d="M12 7.5V12l3 2" />',
  bars: '<path d="M4 19h16" /><path d="M7 19V9M12 19V5M17 19v-7" />',
  check: '<rect x="4" y="4" width="16" height="16" rx="3" /><path d="M8.5 12l2.3 2.3L16 9" />',
  question: '<circle cx="12" cy="12" r="9" /><path d="M9 9.5a3 3 0 1 1 4.2 2.8c-.8.4-1.2 1-1.2 1.9" /><path d="M12 17.2h.01" />',
  hair: '<path d="M4 16c3-6 13-6 16 0" /><path d="M7 16v3M12 14.5v4.5M17 16v3" />',
  head: '<path d="M5 20c1-5 3.5-7.5 7-7.5s6 2.5 7 7.5" /><path d="M8 9.5c-1-2.5-.5-5.5 1-7M16 9.5c1-2.5.5-5.5-1-7" />',
  layers: '<path d="M12 3v18M5 8l7-5 7 5" /><path d="M5 16l7 5 7-5" />',
  doc: '<rect x="5" y="3" width="14" height="18" rx="3" /><path d="M9 8h6M9 12h6M9 16h3" />',
  pin: '<path d="M12 21s-7-4.4-7-10a7 7 0 0 1 14 0c0 5.6-7 10-7 10z" /><circle cx="12" cy="11" r="2.5" />',
  list: '<path d="M4 6h16M4 12h10M4 18h6" />',
  sun: '<circle cx="12" cy="12" r="3" /><path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.6 5.6l2.1 2.1M16.3 16.3l2.1 2.1M18.4 5.6l-2.1 2.1M7.7 16.3l-2.1 2.1" />',
  camera: '<rect x="3" y="5" width="18" height="14" rx="3" /><circle cx="12" cy="12" r="3.2" />',
  chart: '<path d="M7 20V10M12 20V4M17 20v-6" /><path d="M4 20h16" />',
  ruler: '<path d="M4 14.5L14.5 4l5.5 5.5L9.5 20z" /><path d="M8 8.5l2 2M11 5.5l2 2M11.5 14l2 2" />',
  scissors: '<circle cx="6.5" cy="6.5" r="2.5" /><circle cx="6.5" cy="17.5" r="2.5" /><path d="M8.6 8.3L20 18M8.6 15.7L20 6" />',
  pen: '<path d="M15.5 4.5l4 4L8 20H4v-4z" /><path d="M13.5 6.5l4 4" />',
  scope: '<circle cx="11" cy="11" r="6.5" /><path d="M16 16l4.5 4.5" /><path d="M11 8.5v5M8.5 11h5" />'
};

const icon = (name, stroke = '#0B7A5E', size = 24) =>
  `<svg width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="${stroke}" stroke-width="1.7" stroke-linecap="round">${ICONS[name]}</svg>`;

const tick = `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2.2" stroke-linecap="round" style="flex:0 0 auto;margin-top:2px"><path d="M4 12.5l5 5L20 6.5" /></svg>`;

const NAV = [
  { key: 'doctor', href: 'index.html#doctor', label: 'About Doctor' },
  { key: 'ht', href: 'hair-transplant-in-gurgaon.html', label: 'Hair Transplant' },
  { key: 'fue', href: 'fue-hair-transplant-in-gurgaon.html', label: 'FUE' },
  { key: 'dhi', href: 'dhi-hair-transplant-in-gurgaon.html', label: 'DHI' },
  { key: 'fut', href: 'fut-hair-transplant-in-gurgaon.html', label: 'FUT' },
  { key: 'results', href: '#results', label: 'Results' },
  { key: 'reviews', href: '#reviews', label: 'Reviews' },
  { key: 'faqs', href: '#faqs', label: 'FAQs' },
  { key: 'contact', href: '#local', label: 'Contact' }
];

function schema(s) {
  const g = {
    '@context': 'https://schema.org',
    '@graph': [
      {
        '@type': 'MedicalClinic',
        '@id': 'https://dencespot.com/#clinic',
        name: 'DenceSpot Clinic',
        description: 'Doctor-led hair restoration clinic in Gurugram offering hair transplant, hair PRP and medical hair-loss treatment.',
        url: 'https://dencespot.com/',
        telephone: '+91-81783-30800',
        email: 'dencespot@gmail.com',
        address: {
          '@type': 'PostalAddress',
          streetAddress: 'C Block, Sector 39',
          addressLocality: 'Gurugram',
          addressRegion: 'Haryana',
          postalCode: '122003',
          addressCountry: 'IN'
        },
        geo: { '@type': 'GeoCoordinates', latitude: 28.4396807, longitude: 77.0438613 },
        hasMap: MAPS,
        areaServed: [{ '@type': 'City', name: 'Gurugram' }, { '@type': 'City', name: 'New Delhi' }],
        medicalSpecialty: 'Dermatology',
        openingHoursSpecification: [{
          '@type': 'OpeningHoursSpecification',
          dayOfWeek: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
          opens: '10:00',
          closes: '20:00'
        }],
        availableService: { '@id': `https://dencespot.com/${s.slug}/#procedure` }
      },
      {
        '@type': 'Physician',
        '@id': 'https://dencespot.com/#dr-nyra',
        name: 'Dr. Nyra',
        honorificSuffix: 'MBBS',
        jobTitle: 'Owner and Chief Consultant',
        worksFor: { '@id': 'https://dencespot.com/#clinic' },
        medicalSpecialty: 'Dermatology'
      },
      {
        '@type': 'MedicalWebPage',
        '@id': `https://dencespot.com/${s.slug}/`,
        url: `https://dencespot.com/${s.slug}/`,
        name: s.metaTitle,
        inLanguage: 'en-IN',
        lastReviewed: '2026-08-21',
        reviewedBy: { '@id': 'https://dencespot.com/#dr-nyra' },
        about: { '@id': `https://dencespot.com/${s.slug}/#procedure` },
        isPartOf: { '@id': 'https://dencespot.com/#clinic' },
        specialty: 'Dermatology'
      },
      {
        '@type': 'MedicalProcedure',
        '@id': `https://dencespot.com/${s.slug}/#procedure`,
        name: s.procedureName,
        alternateName: s.procedureAlt,
        procedureType: 'https://schema.org/SurgicalProcedure',
        bodyLocation: 'Scalp',
        howPerformed: s.howPerformed,
        preparation: s.preparation,
        followup: s.followup,
        performer: { '@id': 'https://dencespot.com/#dr-nyra' }
      },
      {
        '@type': 'FAQPage',
        '@id': `https://dencespot.com/${s.slug}/#faq`,
        isPartOf: { '@id': `https://dencespot.com/${s.slug}/` },
        mainEntity: s.faqs.map(f => ({
          '@type': 'Question',
          name: plain(f.q),
          acceptedAnswer: { '@type': 'Answer', text: plain(f.a) }
        }))
      },
      {
        '@type': 'BreadcrumbList',
        '@id': `https://dencespot.com/${s.slug}/#breadcrumb`,
        itemListElement: [
          { '@type': 'ListItem', position: 1, name: 'Home', item: 'https://dencespot.com/' },
          { '@type': 'ListItem', position: 2, name: 'Hair transplant', item: 'https://dencespot.com/hair-transplant-in-gurgaon/' },
          { '@type': 'ListItem', position: 3, name: s.crumb }
        ]
      }
    ]
  };
  return JSON.stringify(g, null, 2);
}

// schema strings must match the visible text, so decode the entities the markup uses
const ENT = { '&mdash;': '—', '&ndash;': '–', '&rsquo;': '’', '&lsquo;': '‘', '&ldquo;': '“', '&rdquo;': '”', '&middot;': '·', '&amp;': '&', '&nbsp;': ' ', '&times;': '×', '&frac12;': '½' };
export const plain = h => h.replace(/<[^>]+>/g, '').replace(/&[a-z0-9]+;/gi, m => (ENT[m] !== undefined ? ENT[m] : m)).replace(/\s+/g, ' ').trim();

const head = s => `<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="./support.js"></script>
</head>
<body>
<x-dc>
<helmet>
<link rel="stylesheet" href="_ds/ethical-healthcare-community-design-syst-6ce9bd81-787b-44c9-bdfb-94df1770d8a1/colors_and_type.css">
<script src="_ds/ethical-healthcare-community-design-syst-6ce9bd81-787b-44c9-bdfb-94df1770d8a1/_ds_bundle.js"></script>
<script src="./image-slot.js"></script>
<style>
  html, body { background: #F5F4F7; scroll-behavior: smooth; }
  a { color: #0B7A5E; }
  a:hover { color: #086349; }
  h1, h2, h3, h4, p, ul, ol, dl, dd, dt, figure, table { margin: 0; padding: 0; }
  ul { list-style: none; }
  summary { list-style: none; cursor: pointer; }
  details summary::-webkit-details-marker { display: none; }
  table { border-collapse: collapse; width: 100%; }
</style>
<script type="application/ld+json">
${schema(s)}
</script>
</helmet>

<div style="background:#F5F4F7;color:#1a1147;font-family:var(--font-sans);min-width:1280px">
`;

const header = s => `
  <header style="position:sticky;top:0;z-index:50;background:rgba(245,244,247,.82);backdrop-filter:blur(18px);border-bottom:1px solid #E7E4ED">
    <div style="max-width:1280px;margin:0 auto;padding:0 40px;height:78px;display:flex;align-items:center;gap:20px">
      <a href="index.html" style="display:flex;align-items:center;gap:10px;text-decoration:none;color:#1a1147;flex:0 0 auto">
        <span style="width:34px;height:34px;border-radius:11px;background:#1a1147;display:flex;align-items:center;justify-content:center;flex:0 0 auto">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="1.7" stroke-linecap="round"><path d="M6 21c0-6 3-9 6-9s6 3 6 9" /><path d="M8 12c-1.5-3-1-7 1-9" /><path d="M16 12c1.5-3 1-7-1-9" /></svg>
        </span>
        <span style="display:flex;flex-direction:column;line-height:1.05">
          <span style="font-weight:800;letter-spacing:-.01em;font-size:17px">DenceSpot</span>
          <span style="font-size:10px;letter-spacing:.16em;text-transform:uppercase;color:#6B6485;font-weight:600;white-space:nowrap">Hair Restoration Clinic</span>
        </span>
      </a>
      <nav style="display:flex;gap:14px;align-items:center;margin-left:8px;flex:1 1 auto">
${NAV.map(n => n.key === s.navKey
    ? `        <a href="#top" style="font-size:14px;font-weight:600;color:#1a1147;text-decoration:none;white-space:nowrap;border-bottom:2px solid #10B981;padding-bottom:2px">${n.label}</a>`
    : `        <a href="${n.href}" style="font-size:14px;font-weight:500;color:#3E3560;text-decoration:none;white-space:nowrap">${n.label}</a>`).join('\n')}
      </nav>
      <div style="display:flex;align-items:center;gap:10px;flex:0 0 auto">
        <a href="tel:${PHONE}" aria-label="Call the clinic" title="Call the clinic" style="display:inline-flex;align-items:center;justify-content:center;width:44px;height:42px;border-radius:14px;border:1px solid #E7E4ED;background:#fff;color:#1a1147;text-decoration:none;flex:0 0 auto">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a1 1 0 0 1-1 1A16 16 0 0 1 4 5a1 1 0 0 1 1-1z" /></svg>
        </a>
        <a href="${WA}" style="display:inline-flex;align-items:center;gap:7px;height:42px;padding:0 16px;border-radius:14px;background:#10B981;color:#fff;font-size:14px;font-weight:600;text-decoration:none;box-shadow:0 10px 24px -12px rgba(16,185,129,.7)">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M21 11.5a8.5 8.5 0 0 1-12.6 7.4L3 20.5l1.7-5.2A8.5 8.5 0 1 1 21 11.5z" /></svg>
          WhatsApp
        </a>
        <a href="contact.html" style="display:inline-flex;align-items:center;height:42px;padding:0 14px;border-radius:14px;background:#1a1147;color:#fff;font-size:14px;font-weight:600;text-decoration:none;white-space:nowrap">Book Consultation</a>
      </div>
    </div>
  </header>

  <div id="top" style="background:#fff;border-bottom:1px solid #E7E4ED">
    <nav aria-label="Breadcrumb" style="max-width:1280px;margin:0 auto;padding:14px 40px;display:flex;align-items:center;gap:10px;font-size:13px;color:#6B6485">
      <a href="index.html" style="color:#6B6485">Home</a>
      <span>&rsaquo;</span>
      <a href="hair-transplant-in-gurgaon.html" style="color:#6B6485">Hair transplant</a>
      <span>&rsaquo;</span>
      <span style="color:#1a1147;font-weight:600">${s.crumb}</span>
    </nav>
  </div>
`;

const hero = s => `
  <section style="padding:64px 0 80px;background:linear-gradient(180deg,#FFFFFF 0%,#F5F4F7 100%)">
    <div style="max-width:1280px;margin:0 auto;padding:0 40px;display:grid;grid-template-columns:1.05fr .95fr;gap:64px;align-items:center">
      <div>
        <span style="display:inline-flex;align-items:center;gap:9px;padding:7px 14px;border-radius:999px;background:#E7F7F1;color:#0B7A5E;font-size:12px;font-weight:700;letter-spacing:.12em;text-transform:uppercase">
          <span style="width:6px;height:6px;border-radius:50%;background:#10B981"></span>
          ${s.badge}
        </span>
        <h1 style="margin-top:24px;font-size:56px;font-weight:800;letter-spacing:-.03em;line-height:1.04;text-wrap:balance;color:#1a1147">${s.h1}</h1>
        <p style="margin-top:22px;font-size:19px;line-height:1.6;color:#3E3560;max-width:580px;text-wrap:pretty">${s.lede}</p>
        <div style="margin-top:32px;display:flex;flex-wrap:wrap;gap:12px">
          <a href="contact.html" style="display:inline-flex;align-items:center;gap:9px;height:56px;padding:0 26px;border-radius:16px;background:#1a1147;color:#fff;font-size:16px;font-weight:600;text-decoration:none">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><rect x="3.5" y="5" width="17" height="15" rx="3" /><path d="M8 3v4M16 3v4M3.5 10h17" /></svg>
            Book a Consultation
          </a>
          <a href="${WA}" style="display:inline-flex;align-items:center;gap:9px;height:56px;padding:0 26px;border-radius:16px;background:#10B981;color:#fff;font-size:16px;font-weight:600;text-decoration:none;box-shadow:0 18px 44px -18px rgba(16,185,129,.75)">
            <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M21 11.5a8.5 8.5 0 0 1-12.6 7.4L3 20.5l1.7-5.2A8.5 8.5 0 1 1 21 11.5z" /></svg>
            Talk on WhatsApp
          </a>
        </div>
        <ul style="margin-top:36px;display:grid;grid-template-columns:1fr 1fr;gap:14px 28px;max-width:580px">
${s.heroBullets.map(b => `          <li style="display:flex;gap:10px;align-items:flex-start;font-size:15px;font-weight:500;color:#3E3560">${tick}${b}</li>`).join('\n')}
        </ul>
      </div>

      <div style="position:relative">
        <div style="position:relative;border-radius:28px;overflow:hidden;box-shadow:0 24px 60px -16px rgba(26,17,71,.16);background:#fff;aspect-ratio:4/5">
          <image-slot id="${s.key}-hero" shape="rect" fit="cover" placeholder="${s.heroImg}"></image-slot>
        </div>
        <div style="position:absolute;left:-28px;bottom:34px;background:#fff;border:1px solid #E7E4ED;border-radius:20px;padding:18px 20px;box-shadow:0 12px 32px -8px rgba(26,17,71,.12);width:258px">
          <p style="font-size:11px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:#0B7A5E">Performed &amp; reviewed by</p>
          <p style="margin-top:8px;font-size:17px;font-weight:700;color:#1a1147">Dr. Nyra</p>
          <p style="margin-top:2px;font-size:13px;color:#6B6485;line-height:1.45">MBBS &middot; Owner &amp; Chief Consultant, DenceSpot Clinic</p>
        </div>
      </div>
    </div>
  </section>

  <section style="padding:0 0 24px;background:#F5F4F7">
    <div style="max-width:1280px;margin:0 auto;padding:0 40px;display:grid;grid-template-columns:repeat(5,1fr);gap:16px">
${s.trust.map(t => `      <div style="background:#fff;border:1px solid #E7E4ED;border-radius:16px;padding:22px 20px;box-shadow:0 4px 16px -4px rgba(26,17,71,.06)">
        ${icon(t.icon, '#0B7A5E', 22)}
        <p style="margin-top:14px;font-size:15px;font-weight:700;color:#1a1147">${t.title}</p>
        <p style="margin-top:6px;font-size:13px;line-height:1.5;color:#6B6485">${t.text}</p>
      </div>`).join('\n')}
    </div>
  </section>
`;

const whatIs = s => `
  <section id="what-is" style="padding:96px 0;background:#F5F4F7">
    <div style="max-width:1280px;margin:0 auto;padding:0 40px;display:grid;grid-template-columns:1.1fr .9fr;gap:64px;align-items:center">
      <div>
        <p style="font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:#0B7A5E">The basics, plainly</p>
        <h2 style="margin-top:14px;font-size:40px;font-weight:800;letter-spacing:-.025em;line-height:1.1;color:#1a1147;text-wrap:balance">${s.whatIs.h2}</h2>
        <div style="margin-top:20px;display:grid;gap:16px;max-width:620px">
${s.whatIs.paras.map(p => `          <p style="font-size:17px;line-height:1.7;color:#3E3560">${p}</p>`).join('\n')}
        </div>
        <div style="margin-top:26px;display:flex;flex-wrap:wrap;gap:10px">
${s.whatIs.links.map(l => `          <a href="${l.href}" style="display:inline-flex;align-items:center;height:48px;padding:0 20px;border-radius:14px;border:1px solid #E7E4ED;background:#fff;color:#1a1147;font-size:14px;font-weight:600;text-decoration:none">${l.label}</a>`).join('\n')}
        </div>
      </div>
      <div style="display:grid;gap:16px">
        <div style="border-radius:24px;overflow:hidden;box-shadow:0 12px 32px -8px rgba(26,17,71,.1);aspect-ratio:4/3">
          <image-slot id="${s.key}-whatis" shape="rect" placeholder="${s.whatIs.img}"></image-slot>
        </div>
        <div style="border:1px solid #E7E4ED;border-radius:20px;padding:24px;background:#fff">
          <p style="font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#6B6485">In one line</p>
          <p style="margin-top:10px;font-size:16px;line-height:1.65;color:#3E3560">${s.whatIs.aside}</p>
        </div>
      </div>
    </div>
  </section>
`;

const candidacy = s => `
  <section id="candidacy" style="padding:96px 0;background:#fff">
    <div style="max-width:1280px;margin:0 auto;padding:0 40px">
      <div style="max-width:700px">
        <p style="font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:#0B7A5E">Suitability</p>
        <h2 style="margin-top:14px;font-size:40px;font-weight:800;letter-spacing:-.025em;line-height:1.1;color:#1a1147;text-wrap:balance">${s.candidacy.h2}</h2>
        <p style="margin-top:18px;font-size:16px;line-height:1.7;color:#3E3560">${s.candidacy.lede}</p>
      </div>
      <div style="margin-top:44px;display:grid;grid-template-columns:repeat(3,1fr);gap:20px">
${s.candidacy.cards.map(c => `        <div style="background:#fff;border:1px solid #E7E4ED;border-radius:20px;padding:28px;box-shadow:0 4px 16px -4px rgba(26,17,71,.06)">
          ${icon(c.icon)}
          <h3 style="margin-top:20px;font-size:19px;font-weight:700;color:#1a1147">${c.title}</h3>
          <p style="margin-top:8px;font-size:15px;line-height:1.65;color:#3E3560">${c.text}</p>
        </div>`).join('\n')}
      </div>
    </div>
  </section>
`;

const why = s => `
  <section id="why" style="padding:96px 0;background:#fff">
    <div style="max-width:1280px;margin:0 auto;padding:0 40px">
      <div style="max-width:680px">
        <p style="font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:#0B7A5E">Why here</p>
        <h2 style="margin-top:14px;font-size:40px;font-weight:800;letter-spacing:-.025em;line-height:1.1;color:#1a1147;text-wrap:balance">${s.why.h2}</h2>
      </div>
      <div style="margin-top:44px;display:grid;grid-template-columns:repeat(3,1fr);gap:20px">
${s.why.cards.map(c => `        <div style="background:#F5F4F7;border:1px solid #E7E4ED;border-radius:20px;padding:28px">
          ${icon(c.icon)}
          <h3 style="margin-top:20px;font-size:19px;font-weight:700;color:#1a1147">${c.title}</h3>
          <p style="margin-top:8px;font-size:15px;line-height:1.65;color:#3E3560">${c.text}</p>
        </div>`).join('\n')}
      </div>
    </div>
  </section>
`;

const journey = s => `
  <section id="journey" style="padding:96px 0;background:#1a1147">
    <div style="max-width:1280px;margin:0 auto;padding:0 40px">
      <div style="max-width:680px">
        <p style="font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:#10B981">Start to finish</p>
        <h2 style="margin-top:14px;font-size:40px;font-weight:800;letter-spacing:-.025em;line-height:1.1;color:#fff;text-wrap:balance">${s.journey.h2}</h2>
        <p style="margin-top:18px;font-size:16px;line-height:1.7;color:rgba(255,255,255,.7)">${s.journey.lede}</p>
      </div>
      <div style="margin-top:48px;display:grid;grid-template-columns:repeat(${s.journey.steps.length},1fr);gap:16px">
${s.journey.steps.map((st, i) => `        <div style="background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.14);border-radius:20px;padding:24px">
          <span style="display:inline-flex;align-items:center;justify-content:center;width:30px;height:30px;border-radius:10px;background:#10B981;color:#fff;font-size:14px;font-weight:700">${i + 1}</span>
          <h3 style="margin-top:8px;font-size:16px;font-weight:700;color:#fff">${st.title}</h3>
          <p style="margin-top:8px;font-size:13px;line-height:1.6;color:rgba(255,255,255,.66)">${st.text}</p>
        </div>`).join('\n')}
      </div>
    </div>
  </section>
`;

const procedure = s => `
  <section id="procedure" style="padding:96px 0;background:#F5F4F7">
    <div style="max-width:1280px;margin:0 auto;padding:0 40px">
      <div style="max-width:680px">
        <p style="font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:#0B7A5E">On the day</p>
        <h2 style="margin-top:14px;font-size:40px;font-weight:800;letter-spacing:-.025em;line-height:1.1;color:#1a1147;text-wrap:balance">${s.procedure.h2}</h2>
        <p style="margin-top:18px;font-size:16px;line-height:1.7;color:#3E3560">${s.procedure.lede}</p>
      </div>
      <div style="margin-top:44px;display:grid;grid-template-columns:1.15fr .85fr;gap:48px;align-items:start">
        <div style="display:grid;gap:14px">
${s.procedure.steps.map((st, i) => `          <div style="display:flex;gap:20px;background:#fff;border:1px solid #E7E4ED;border-radius:20px;padding:24px 26px">
            <span style="flex:0 0 auto;display:inline-flex;align-items:center;justify-content:center;width:36px;height:36px;border-radius:12px;background:#E7F7F1;color:#0B7A5E;font-size:15px;font-weight:800">${i + 1}</span>
            <div>
              <h3 style="font-size:19px;font-weight:700;color:#1a1147">${st.title}</h3>
              <p style="margin-top:6px;font-size:15px;line-height:1.65;color:#3E3560">${st.text}</p>
            </div>
          </div>`).join('\n')}
        </div>
        <div style="display:grid;gap:16px;position:sticky;top:110px">
          <div style="border-radius:24px;overflow:hidden;box-shadow:0 12px 32px -8px rgba(26,17,71,.1);aspect-ratio:4/3">
            <image-slot id="${s.key}-procedure" shape="rect" placeholder="${s.procedure.img}"></image-slot>
          </div>
          <div style="background:#fff;border:1px solid #E7E4ED;border-radius:20px;padding:26px">
            <p style="font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#6B6485">${s.procedure.asideTitle}</p>
            <ul style="margin-top:14px;display:grid;gap:12px">
${s.procedure.aside.map(a => `              <li style="display:flex;gap:10px;font-size:14px;line-height:1.6;color:#3E3560"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2.4" stroke-linecap="round" style="flex:0 0 auto;margin-top:3px"><path d="M4 12.5l5 5L20 6.5" /></svg>${a}</li>`).join('\n')}
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
`;

const recovery = s => `
  <section id="recovery" style="padding:96px 0;background:#fff">
    <div style="max-width:1280px;margin:0 auto;padding:0 40px">
      <div style="max-width:700px">
        <p style="font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:#0B7A5E">Recovery &amp; results</p>
        <h2 style="margin-top:14px;font-size:40px;font-weight:800;letter-spacing:-.025em;line-height:1.1;color:#1a1147;text-wrap:balance">${s.recovery.h2}</h2>
        <p style="margin-top:18px;font-size:16px;line-height:1.65;color:#3E3560">${s.recovery.lede}</p>
      </div>
      <div style="margin-top:44px;display:grid;grid-template-columns:repeat(5,1fr);gap:16px">
${s.recovery.phases.map((p, i) => {
  const last = i === s.recovery.phases.length - 1;
  return `        <div style="background:#F5F4F7;border:1px solid #E7E4ED;border-radius:20px;padding:26px">
          <span style="display:inline-flex;padding:5px 11px;border-radius:999px;background:${last ? '#1a1147;color:#fff' : '#E7F7F1;color:#0B7A5E'};font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase">${p.label}</span>
          <h3 style="margin-top:14px;font-size:17px;font-weight:700;color:#1a1147">${p.title}</h3>
          <p style="margin-top:8px;font-size:14px;line-height:1.6;color:#3E3560">${p.text}</p>
        </div>`;
}).join('\n')}
      </div>
      <div style="margin-top:24px;border:1px solid #E7E4ED;border-left:3px solid #10B981;border-radius:16px;background:#F5F4F7;padding:22px 26px;display:flex;gap:16px;align-items:flex-start">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0B7A5E" stroke-width="1.8" stroke-linecap="round" style="flex:0 0 auto;margin-top:2px"><circle cx="12" cy="12" r="9" /><path d="M12 8h.01M12 11v5" /></svg>
        <p style="font-size:15px;line-height:1.65;color:#3E3560;max-width:900px">${s.recovery.note}</p>
      </div>
    </div>
  </section>
`;

const results = s => `
  <section id="results" style="padding:96px 0;background:#F5F4F7">
    <div style="max-width:1280px;margin:0 auto;padding:0 40px">
      <div style="display:flex;align-items:flex-end;justify-content:space-between;gap:40px;flex-wrap:wrap">
        <div style="max-width:640px">
          <p style="font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:#0B7A5E">Before &amp; after</p>
          <h2 style="margin-top:14px;font-size:40px;font-weight:800;letter-spacing:-.025em;line-height:1.1;color:#1a1147;text-wrap:balance">${s.results.h2}</h2>
        </div>
        <a href="index.html#results" style="display:inline-flex;align-items:center;height:50px;padding:0 22px;border-radius:16px;background:#fff;border:1px solid #1a1147;color:#1a1147;font-size:15px;font-weight:600;text-decoration:none">View more results</a>
      </div>

      <div style="margin-top:40px;display:grid;grid-template-columns:1.25fr 1fr;gap:24px;align-items:stretch">
        <div style="background:#fff;border:1px solid #E7E4ED;border-radius:24px;padding:24px;box-shadow:0 12px 32px -8px rgba(26,17,71,.1)">
          <div style="position:relative;border-radius:16px;overflow:hidden;aspect-ratio:16/10;background:#EDEBF2">
            <image-slot id="${s.key}-ba-before" shape="rect" placeholder="BEFORE — consented patient photo, same angle &amp; lighting"></image-slot>
            <div style="position:absolute;inset:0;clip-path:{{ splitClip }}">
              <image-slot id="${s.key}-ba-after" shape="rect" placeholder="AFTER — same patient at review"></image-slot>
            </div>
            <div style="position:absolute;top:0;bottom:0;left:{{ splitPct }};width:2px;background:#fff;box-shadow:0 0 0 1px rgba(26,17,71,.18);pointer-events:none"></div>
            <span style="position:absolute;left:14px;top:14px;padding:5px 10px;border-radius:999px;background:rgba(26,17,71,.82);color:#fff;font-size:11px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;pointer-events:none">Before</span>
            <span style="position:absolute;right:14px;top:14px;padding:5px 10px;border-radius:999px;background:rgba(16,185,129,.92);color:#fff;font-size:11px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;pointer-events:none">After</span>
          </div>
          <input type="range" min="0" max="100" value="{{ split }}" onInput="{{ onSplit }}" aria-label="Reveal after photo" style="width:100%;margin-top:16px;accent-color:#10B981" />
          <div style="margin-top:14px;display:flex;justify-content:space-between;align-items:flex-end;gap:20px">
            <div>
              <h3 style="font-size:20px;font-weight:700;color:#1a1147">${s.results.mainTitle}</h3>
              <sc-if value="{{ showGraftDetail }}" hint-placeholder-val="{{ true }}">
                <p style="margin-top:4px;font-size:14px;color:#3E3560">${s.results.mainMeta}</p>
              </sc-if>
            </div>
            <p style="font-size:12px;color:#6B6485;max-width:230px;text-align:right;line-height:1.45">Drag to compare. Results vary between patients.</p>
          </div>
        </div>

        <div style="display:grid;grid-template-rows:1fr 1fr;gap:24px">
${s.results.cards.map((c, i) => `          <article style="background:#fff;border:1px solid #E7E4ED;border-radius:20px;padding:18px;display:grid;grid-template-columns:1fr 1fr;gap:14px;align-items:center;box-shadow:0 4px 16px -4px rgba(26,17,71,.06)">
            <div style="border-radius:14px;overflow:hidden;aspect-ratio:1/1">
              <image-slot id="${s.key}-res-${i}" shape="rect" placeholder="${c.img}"></image-slot>
            </div>
            <div>
              <span style="display:inline-block;padding:4px 10px;border-radius:999px;background:#E7F7F1;color:#0B7A5E;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase">Verified by clinic</span>
              <h3 style="margin-top:10px;font-size:17px;font-weight:700;color:#1a1147">${c.title}</h3>
              <sc-if value="{{ showGraftDetail }}" hint-placeholder-val="{{ true }}">
                <p style="margin-top:6px;font-size:13px;line-height:1.5;color:#6B6485">${c.meta}</p>
              </sc-if>
            </div>
          </article>`).join('\n')}
        </div>
      </div>
      <p style="margin-top:24px;font-size:12px;line-height:1.6;color:#6B6485;max-width:900px">Photographs are of DenceSpot patients, published with written consent and unedited apart from cropping. Individual results vary with hair-loss stage, donor supply, healing and aftercare; nothing shown here is a guarantee of outcome.</p>
    </div>
  </section>
`;

const doctor = s => `
  <section id="doctor" style="padding:96px 0;background:#fff">
    <div style="max-width:1280px;margin:0 auto;padding:0 40px">
      <div style="display:grid;grid-template-columns:.8fr 1.2fr;gap:56px;align-items:center">
        <div style="border-radius:28px;overflow:hidden;box-shadow:0 24px 60px -16px rgba(26,17,71,.16);aspect-ratio:4/5">
          <image-slot id="${s.key}-doctor" shape="rect" placeholder="Dr. Nyra — professional portrait"></image-slot>
        </div>
        <div>
          <p style="font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:#0B7A5E">Who performs and reviews this procedure</p>
          <h2 style="margin-top:14px;font-size:38px;font-weight:800;letter-spacing:-.03em;line-height:1.06;color:#1a1147;text-wrap:balance">Dr. Nyra, MBBS</h2>
          <p style="margin-top:10px;font-size:17px;font-weight:600;color:#3E3560">Owner &amp; Chief Consultant, DenceSpot Clinic</p>
          <p style="margin-top:18px;font-size:16px;line-height:1.7;color:#3E3560;max-width:640px">MBBS from Dr. D. Y. Patil Medical College, followed by three years of clinical work in Germany &mdash; two at Bio Hair Clinic and one at St. Georg Klinikum Eisenach &mdash; before establishing DenceSpot in Gurugram. She assesses and plans every hair-restoration case at the clinic personally.</p>
          <p style="margin-top:16px;font-size:16px;line-height:1.7;color:#3E3560;max-width:640px">${s.doctorPara}</p>

          <div style="margin-top:26px;display:grid;grid-template-columns:repeat(2,1fr);gap:12px;max-width:640px">
            <div style="border:1px solid #E7E4ED;border-radius:16px;padding:18px;background:#F5F4F7">
              <p style="font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#6B6485">Qualification</p>
              <p style="margin-top:7px;font-size:15px;font-weight:700;color:#1a1147">MBBS</p>
            </div>
            <div style="border:1px solid #E7E4ED;border-radius:16px;padding:18px;background:#F5F4F7">
              <p style="font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#6B6485">Training</p>
              <p style="margin-top:7px;font-size:15px;font-weight:700;color:#1a1147">3 years, Germany</p>
            </div>
            <div style="border:1px dashed #C9C3D8;border-radius:16px;padding:18px;background:#F5F4F7">
              <p style="font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#6B6485">Registration no.</p>
              <p style="margin-top:7px;font-size:15px;font-weight:700;color:#C0BACF">To be confirmed</p>
            </div>
            <div style="border:1px dashed #C9C3D8;border-radius:16px;padding:18px;background:#F5F4F7">
              <p style="font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#6B6485">Memberships</p>
              <p style="margin-top:7px;font-size:15px;font-weight:700;color:#C0BACF">Genuine bodies only</p>
            </div>
          </div>

          <div style="margin-top:26px;display:flex;flex-wrap:wrap;gap:12px;align-items:center">
            <a href="index.html#doctor" style="display:inline-flex;align-items:center;height:52px;padding:0 24px;border-radius:16px;background:#1a1147;color:#fff;font-size:15px;font-weight:600;text-decoration:none">Meet Your Doctor</a>
            <p style="font-size:13px;color:#6B6485;max-width:260px;line-height:1.45">Medically reviewed by Dr. Nyra &middot; last reviewed August 2026</p>
          </div>
        </div>
      </div>
    </div>
  </section>
`;

const reviews = () => `
  <section id="reviews" style="padding:96px 0;background:#F5F4F7">
    <div style="max-width:1280px;margin:0 auto;padding:0 40px">
      <div style="display:flex;align-items:flex-end;justify-content:space-between;gap:40px;flex-wrap:wrap">
        <div style="max-width:640px">
          <p style="font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:#0B7A5E">Patient reviews</p>
          <h2 style="margin-top:14px;font-size:40px;font-weight:800;letter-spacing:-.025em;line-height:1.1;color:#1a1147;text-wrap:balance">What Patients Say About DenceSpot</h2>
          <p style="margin-top:18px;font-size:16px;line-height:1.7;color:#3E3560">Pulled live from our Google Business Profile and shown unedited, including the ones that are not five stars. These cover every treatment at the clinic, not this procedure alone.</p>
        </div>
        <sc-if value="{{ showStats }}" hint-placeholder-val="{{ true }}">
          <div style="display:flex;align-items:center;gap:14px;border:1px solid #E7E4ED;border-radius:16px;padding:14px 18px;background:#fff">
            <span style="font-size:26px;font-weight:800;color:#1a1147">4.8</span>
            <span>
              <span style="display:block;color:#fbbf24;font-size:13px;letter-spacing:1px">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
              <a href="${MAPS}" style="display:block;font-size:13px;font-weight:600">Read reviews on Google</a>
            </span>
          </div>
        </sc-if>
      </div>

      <div style="margin-top:40px">
        <script src="https://elfsightcdn.com/platform.js" async></script>
        <div class="elfsight-app-d4976df7-93b9-45ec-899d-7d3934036fc5" data-elfsight-app-lazy></div>
      </div>

      <p style="margin-top:24px;font-size:12px;line-height:1.6;color:#6B6485;max-width:900px">Reviews are loaded directly from Google and are not filtered, reordered or edited by the clinic. A review describes one person&rsquo;s experience and is not a clinical outcome; treatment results vary between patients and suitability is decided only after examination.</p>
    </div>
  </section>
`;

const cost = s => `
  <section id="cost" style="padding:96px 0;background:#fff">
    <div style="max-width:1280px;margin:0 auto;padding:0 40px;display:grid;grid-template-columns:1fr .9fr;gap:64px;align-items:start">
      <div>
        <p style="font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:#0B7A5E">Cost guidance</p>
        <h2 style="margin-top:14px;font-size:40px;font-weight:800;letter-spacing:-.025em;line-height:1.1;color:#1a1147;text-wrap:balance">${s.cost.h2}</h2>
        <p style="margin-top:18px;font-size:16px;line-height:1.7;color:#3E3560;max-width:560px">${s.cost.intro}</p>
        <div style="margin-top:28px;display:grid;grid-template-columns:1fr 1fr;gap:12px">
${s.cost.factors.map(f => `          <div style="border:1px solid #E7E4ED;border-radius:14px;padding:16px 18px"><p style="font-size:15px;font-weight:700;color:#1a1147">${f.title}</p><p style="margin-top:4px;font-size:13px;color:#6B6485">${f.text}</p></div>`).join('\n')}
        </div>
        <p style="margin-top:20px;font-size:13px;line-height:1.6;color:#6B6485;max-width:560px">${s.cost.caution}</p>
        <p style="margin-top:14px;font-size:14px;line-height:1.6;color:#3E3560;max-width:560px">Working through the numbers first? See our full <a href="hair-transplant-cost-in-gurgaon.html">breakdown of hair transplant cost in Gurgaon</a>, including what changes the per-graft rate.</p>
      </div>
      <div style="background:#1a1147;border-radius:28px;padding:40px;color:#fff;position:sticky;top:110px">
        <h3 style="font-size:24px;font-weight:700;letter-spacing:-.02em;line-height:1.2">Get a Personalized Treatment Estimate</h3>
        <p style="margin-top:12px;font-size:15px;line-height:1.6;color:rgba(255,255,255,.7)">Send photos of the front, crown and donor area on WhatsApp, or request a call back. You will get an assessment appointment &mdash; not a sales pitch.</p>
        <div style="margin-top:26px;display:grid;gap:10px">
          <a href="${WA}" style="display:inline-flex;align-items:center;justify-content:center;gap:9px;height:54px;border-radius:16px;background:#10B981;color:#fff;font-size:16px;font-weight:600;text-decoration:none">Send photos on WhatsApp</a>
          <a href="contact.html" style="display:inline-flex;align-items:center;justify-content:center;height:54px;border-radius:16px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.22);color:#fff;font-size:16px;font-weight:600;text-decoration:none">Request an estimate by form</a>
        </div>
        <p style="margin-top:20px;font-size:12px;line-height:1.6;color:rgba(255,255,255,.55)">Your details are used only to arrange your consultation.</p>
      </div>
    </div>
  </section>
`;

const faqs = s => `
  <section id="faqs" style="padding:96px 0;background:#F5F4F7">
    <div style="max-width:1280px;margin:0 auto;padding:0 40px;display:grid;grid-template-columns:.7fr 1.3fr;gap:64px;align-items:start">
      <div style="position:sticky;top:110px">
        <p style="font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:#0B7A5E">FAQs</p>
        <h2 style="margin-top:14px;font-size:38px;font-weight:800;letter-spacing:-.025em;line-height:1.1;color:#1a1147;text-wrap:balance">Frequently Asked Questions</h2>
        <p style="margin-top:18px;font-size:15px;line-height:1.65;color:#3E3560">Answers are general patient education. Anything specific to your case is answered at the assessment.</p>
        <a href="${WA}" style="margin-top:22px;display:inline-flex;align-items:center;gap:9px;height:50px;padding:0 22px;border-radius:16px;background:#10B981;color:#fff;font-size:15px;font-weight:600;text-decoration:none">Ask on WhatsApp</a>
      </div>
      <div style="display:grid;gap:10px">
${s.faqs.map((f, i) => `        <details style="background:#fff;border:1px solid #E7E4ED;border-radius:16px;padding:20px 24px"${i === 0 ? ' open="open"' : ''}>
          <summary style="display:flex;justify-content:space-between;gap:20px;font-size:17px;font-weight:700;color:#1a1147">${f.q}<span style="color:#10B981">+</span></summary>
          <p style="margin-top:12px;font-size:15px;line-height:1.7;color:#3E3560">${f.a}</p>
        </details>`).join('\n')}
      </div>
    </div>
  </section>
`;

const local = s => `
  <section id="local" style="padding:96px 0;background:#fff">
    <div style="max-width:1280px;margin:0 auto;padding:0 40px">
      <div style="display:grid;grid-template-columns:1fr 1.15fr;gap:56px;align-items:start">
        <div>
          <p style="font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:#0B7A5E">Visit the clinic</p>
          <h2 style="margin-top:14px;font-size:38px;font-weight:800;letter-spacing:-.025em;line-height:1.1;color:#1a1147;text-wrap:balance">${s.localH2}</h2>
          <p style="margin-top:18px;font-size:16px;line-height:1.7;color:#3E3560">${s.localIntro}</p>
          <dl style="margin-top:28px;display:grid;gap:2px">
            <div style="display:grid;grid-template-columns:120px 1fr;gap:16px;padding:16px 0;border-top:1px solid #E7E4ED">
              <dt style="font-size:12px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:#6B6485">Address</dt>
              <dd style="font-size:15px;line-height:1.55;color:#1a1147;font-weight:600">C Block, Sector 39, Gurugram, Haryana 122003</dd>
            </div>
            <div style="display:grid;grid-template-columns:120px 1fr;gap:16px;padding:16px 0;border-top:1px solid #E7E4ED">
              <dt style="font-size:12px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:#6B6485">Phone</dt>
              <dd style="font-size:15px;font-weight:600"><a href="tel:${PHONE}" style="color:#1a1147">+91 81783 30800</a></dd>
            </div>
            <div style="display:grid;grid-template-columns:120px 1fr;gap:16px;padding:16px 0;border-top:1px solid #E7E4ED">
              <dt style="font-size:12px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:#6B6485">WhatsApp</dt>
              <dd style="font-size:15px;font-weight:600"><a href="${WA}">Message +91 81783 30800</a></dd>
            </div>
            <div style="display:grid;grid-template-columns:120px 1fr;gap:16px;padding:16px 0;border-top:1px solid #E7E4ED;border-bottom:1px solid #E7E4ED">
              <dt style="font-size:12px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:#6B6485">Hours</dt>
              <dd style="font-size:15px;line-height:1.6;color:#1a1147;font-weight:600">Mon&ndash;Sat &middot; 10:00 &ndash; 20:00<span style="display:block;font-weight:500;color:#6B6485">Sunday &middot; by appointment only</span></dd>
            </div>
          </dl>
          <p style="margin-top:22px;font-size:14px;line-height:1.65;color:#6B6485">Patients also come from Sushant Lok, Golf Course Road, the DLF phases, Cyber City and nearby South Delhi. Areas are named here for context only &mdash; there is one page per procedure, not one page per locality.</p>
          <div style="margin-top:22px;display:flex;flex-wrap:wrap;gap:10px">
            <a href="${MAPS}" style="display:inline-flex;align-items:center;height:48px;padding:0 20px;border-radius:14px;background:#fff;border:1px solid #E7E4ED;color:#1a1147;font-size:14px;font-weight:600;text-decoration:none">Directions on Google Maps</a>
            <a href="index.html#local" style="display:inline-flex;align-items:center;height:48px;padding:0 20px;border-radius:14px;background:#fff;border:1px solid #E7E4ED;color:#1a1147;font-size:14px;font-weight:600;text-decoration:none">Full clinic details</a>
          </div>
        </div>
        <div>
          <div style="border-radius:24px;overflow:hidden;border:1px solid #E7E4ED;aspect-ratio:16/10">
            <image-slot id="${s.key}-map" shape="rect" placeholder="Google Maps embed / static map of the clinic location"></image-slot>
          </div>
          <div style="margin-top:16px;display:grid;grid-template-columns:1fr 1fr;gap:16px">
            <div style="border-radius:20px;overflow:hidden;aspect-ratio:4/3">
              <image-slot id="${s.key}-exterior" shape="rect" placeholder="Clinic exterior with signage"></image-slot>
            </div>
            <div style="border:1px solid #E7E4ED;border-radius:20px;padding:22px;background:#fff">
              <p style="font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#6B6485">Getting here</p>
              <ul style="margin-top:12px;display:grid;gap:8px">
                <li style="font-size:13px;line-height:1.5;color:#3E3560">Nearest metro and walking time &mdash; to confirm</li>
                <li style="font-size:13px;line-height:1.5;color:#3E3560">Landmark beside the clinic &mdash; to confirm</li>
                <li style="font-size:13px;line-height:1.5;color:#3E3560">Parking guidance &mdash; to confirm</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
`;

const book = s => `
  <section id="book" style="padding:96px 0;background:#F5F4F7">
    <div style="max-width:1280px;margin:0 auto;padding:0 40px">
      <div style="background:#1a1147;border-radius:32px;padding:56px;color:#fff;display:grid;grid-template-columns:1.1fr .9fr;gap:56px;align-items:center;box-shadow:0 24px 60px -16px rgba(26,17,71,.24)">
        <div>
          <p style="font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:#10B981">Next step</p>
          <h2 style="margin-top:14px;font-size:40px;font-weight:800;letter-spacing:-.03em;line-height:1.06;text-wrap:balance">${s.bookH2}</h2>
          <p style="margin-top:18px;font-size:17px;line-height:1.7;color:rgba(255,255,255,.72);max-width:560px">${s.bookLede}</p>
          <div style="margin-top:30px;display:flex;flex-wrap:wrap;gap:12px">
            <a href="contact.html" style="display:inline-flex;align-items:center;gap:9px;height:56px;padding:0 26px;border-radius:16px;background:#10B981;color:#fff;font-size:16px;font-weight:600;text-decoration:none;box-shadow:0 18px 44px -18px rgba(16,185,129,.75)">Book a Consultation</a>
            <a href="${WA}" style="display:inline-flex;align-items:center;gap:9px;height:56px;padding:0 26px;border-radius:16px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.24);color:#fff;font-size:16px;font-weight:600;text-decoration:none">
              <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M21 11.5a8.5 8.5 0 0 1-12.6 7.4L3 20.5l1.7-5.2A8.5 8.5 0 1 1 21 11.5z" /></svg>
              WhatsApp Us
            </a>
          </div>
          <p style="margin-top:22px;font-size:12px;line-height:1.6;color:rgba(255,255,255,.5);max-width:560px">Suitability is determined after clinical assessment. This page is patient education and does not constitute medical advice.</p>
        </div>
        <div style="background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.14);border-radius:24px;padding:32px">
          <p style="font-size:15px;font-weight:700;color:#fff">Quick enquiry</p>
          <form style="margin-top:16px;display:grid;gap:12px">
            <input type="text" placeholder="Full name" style="height:50px;padding:0 14px;border:1px solid rgba(255,255,255,.2);border-radius:14px;background:rgba(255,255,255,.08);color:#fff;font:inherit;font-size:15px" />
            <input type="tel" placeholder="Phone" style="height:50px;padding:0 14px;border:1px solid rgba(255,255,255,.2);border-radius:14px;background:rgba(255,255,255,.08);color:#fff;font:inherit;font-size:15px" />
            <select style="height:50px;padding:0 12px;border:1px solid rgba(255,255,255,.2);border-radius:14px;background:rgba(255,255,255,.08);color:#fff;font:inherit;font-size:15px">
${s.bookOptions.map(o => `              <option>${o}</option>`).join('\n')}
            </select>
            <textarea rows="2" placeholder="Anything you want the doctor to know" style="padding:12px 14px;border:1px solid rgba(255,255,255,.2);border-radius:14px;background:rgba(255,255,255,.08);color:#fff;font:inherit;font-size:15px;resize:vertical"></textarea>
            <button type="button" style="height:54px;border:none;border-radius:14px;background:#fff;color:#1a1147;font:inherit;font-size:16px;font-weight:600;cursor:pointer">Book My Consultation</button>
          </form>
        </div>
      </div>
    </div>
  </section>
`;

const footer = s => `
  <footer style="background:#1a1147;color:rgba(255,255,255,.72);padding:72px 0 0">
    <div style="max-width:1280px;margin:0 auto;padding:0 40px">
      <div style="display:grid;grid-template-columns:1.4fr 1fr 1fr 1fr 1.1fr;gap:40px">
        <div>
          <div style="display:flex;align-items:center;gap:10px">
            <span style="width:34px;height:34px;border-radius:11px;background:rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center">
              <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="1.7" stroke-linecap="round"><path d="M6 21c0-6 3-9 6-9s6 3 6 9" /><path d="M8 12c-1.5-3-1-7 1-9" /><path d="M16 12c1.5-3 1-7-1-9" /></svg>
            </span>
            <span style="font-size:17px;font-weight:800;color:#fff;letter-spacing:-.01em">DenceSpot</span>
          </div>
          <p style="margin-top:16px;font-size:14px;line-height:1.65;max-width:280px">Doctor-led hair restoration in Gurugram. Hair transplant, PRP and medical hair-loss treatment, planned case by case.</p>
          <sc-if value="{{ showStats }}" hint-placeholder-val="{{ true }}">
            <p style="margin-top:16px;font-size:13px;color:rgba(255,255,255,.55)">4.8 &#9733; average Google rating</p>
          </sc-if>
        </div>
        <div>
          <p style="font-size:11px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:#fff">Clinic</p>
          <ul style="margin-top:16px;display:grid;gap:10px">
            <li><a href="index.html" style="font-size:14px;color:rgba(255,255,255,.72)">Home</a></li>
            <li><a href="index.html#doctor" style="font-size:14px;color:rgba(255,255,255,.72)">Dr. Nyra</a></li>
            <li><a href="index.html#treatments" style="font-size:14px;color:rgba(255,255,255,.72)">Treatments</a></li>
            <li><a href="#results" style="font-size:14px;color:rgba(255,255,255,.72)">Results</a></li>
            <li><a href="#reviews" style="font-size:14px;color:rgba(255,255,255,.72)">Reviews</a></li>
            <li><a href="contact.html" style="font-size:14px;color:rgba(255,255,255,.72)">Contact</a></li>
          </ul>
        </div>
        <div>
          <p style="font-size:11px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:#fff">Techniques</p>
          <ul style="margin-top:16px;display:grid;gap:10px">
            <li><a href="hair-transplant-in-gurgaon.html" style="font-size:14px;color:rgba(255,255,255,.72)">Hair transplant in Gurgaon</a></li>
${['fue', 'dhi', 'fut'].map(k => {
  const label = { fue: 'FUE hair transplant', dhi: 'DHI hair transplant', fut: 'FUT hair transplant' }[k];
  const href = `${k}-hair-transplant-in-gurgaon.html`;
  return `            <li><a href="${s.key === k ? '#top' : href}" style="font-size:14px;color:rgba(255,255,255,.72)">${label}</a></li>`;
}).join('\n')}
            <li><a href="beard-transplant-in-gurgaon.html" style="font-size:14px;color:rgba(255,255,255,.72)">Beard transplant</a></li>
            <li><a href="hair-prp-treatment-in-gurgaon.html" style="font-size:14px;color:rgba(255,255,255,.72)">Hair PRP</a></li>
          </ul>
        </div>
        <div>
          <p style="font-size:11px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:#fff">Resources</p>
          <ul style="margin-top:16px;display:grid;gap:10px">
            <li><a href="#faqs" style="font-size:14px;color:rgba(255,255,255,.72)">FAQs</a></li>
            <li><a href="#procedure" style="font-size:14px;color:rgba(255,255,255,.72)">How the procedure works</a></li>
            <li><a href="#recovery" style="font-size:14px;color:rgba(255,255,255,.72)">Recovery &amp; aftercare</a></li>
            <li><a href="#cost" style="font-size:14px;color:rgba(255,255,255,.72)">Cost guidance</a></li>
            <li><a href="index.html#concerns" style="font-size:14px;color:rgba(255,255,255,.72)">Hair loss guide</a></li>
          </ul>
        </div>
        <div>
          <p style="font-size:11px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:#fff">Contact</p>
          <ul style="margin-top:16px;display:grid;gap:10px">
            <li style="font-size:14px;line-height:1.55">C Block, Sector 39,<br />Gurugram, Haryana 122003</li>
            <li><a href="tel:${PHONE}" style="font-size:14px;color:rgba(255,255,255,.72)">+91 81783 30800</a></li>
            <li><a href="${WA}" style="font-size:14px;color:rgba(255,255,255,.72)">WhatsApp</a></li>
            <li><a href="mailto:dencespot@gmail.com" style="font-size:14px;color:rgba(255,255,255,.72)">dencespot@gmail.com</a></li>
            <li style="font-size:14px;line-height:1.55">Mon&ndash;Sat 10:00&ndash;20:00<br />Sunday by appointment</li>
          </ul>
        </div>
      </div>

      <p style="margin-top:48px;padding:20px 22px;border-radius:16px;background:rgba(255,255,255,.06);font-size:12px;line-height:1.7;color:rgba(255,255,255,.62)"><span style="font-weight:700;color:#fff">Medical disclaimer.</span> The information on this page is general patient education and is not a substitute for a consultation. Results vary between patients; individual treatment plans differ, and suitability for any procedure is determined only after clinical assessment by a qualified doctor. No outcome, density or timeline is guaranteed.</p>

      <div style="margin-top:32px;padding:22px 0 28px;border-top:1px solid rgba(255,255,255,.12);display:flex;justify-content:space-between;gap:24px;flex-wrap:wrap;font-size:13px">
        <p style="color:rgba(255,255,255,.5)">&copy; 2026 DenceSpot Clinic. All rights reserved.</p>
        <div style="display:flex;gap:22px">
          <a href="index.html#local" style="color:rgba(255,255,255,.6)">Privacy policy</a>
          <a href="index.html#local" style="color:rgba(255,255,255,.6)">Terms</a>
          <a href="index.html#local" style="color:rgba(255,255,255,.6)">Medical disclaimer</a>
          <a href="index.html" style="color:rgba(255,255,255,.6)">Sitemap</a>
        </div>
      </div>
    </div>
  </footer>
`;

const notes = s => `
  <sc-if value="{{ showNotes }}" hint-placeholder-val="{{ true }}">
    <div style="background:#EDEBF2;border-top:1px solid #E7E4ED;padding:56px 40px 72px">
      <div style="max-width:1280px;margin:0 auto">
        <p style="font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:#0B7A5E">Working note &middot; not public-facing</p>
        <h2 style="margin-top:12px;font-size:28px;font-weight:800;letter-spacing:-.02em;color:#1a1147">Page SEO spec</h2>
        <p style="margin-top:10px;font-size:14px;line-height:1.65;color:#3E3560;max-width:860px">Turn the &ldquo;Show working notes&rdquo; tweak off to see the production page.</p>
${s.noteBanner || ''}
        <div style="margin-top:28px;display:grid;grid-template-columns:1fr 1fr;gap:20px">
          <div style="background:#fff;border:1px solid #E7E4ED;border-radius:20px;padding:26px">
            <p style="font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#0B7A5E">Content &amp; E-E-A-T</p>
            <dl style="margin-top:16px;display:grid;gap:14px">
              <div><dt style="font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#6B6485">URL</dt><dd style="margin-top:5px;font-family:ui-monospace,SFMono-Regular,Menlo,monospace;font-size:13px;color:#1a1147">/${s.slug}/</dd></div>
              <div><dt style="font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#6B6485">Title tag</dt><dd style="margin-top:5px;font-size:14px;color:#3E3560">${s.metaTitle}</dd></div>
              <div><dt style="font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#6B6485">Meta description</dt><dd style="margin-top:5px;font-size:14px;line-height:1.6;color:#3E3560">${s.metaDesc}</dd></div>
              <div><dt style="font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#6B6485">H1 (one only)</dt><dd style="margin-top:5px;font-size:14px;color:#3E3560">${s.h1}</dd></div>
              <div><dt style="font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#6B6485">Primary &amp; secondary terms</dt><dd style="margin-top:5px;font-size:14px;line-height:1.6;color:#3E3560">${s.notes.keywords}</dd></div>
              <div><dt style="font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#6B6485">What makes this page not a template clone</dt><dd style="margin-top:5px;font-size:14px;line-height:1.6;color:#3E3560">${s.notes.distinct}</dd></div>
            </dl>
          </div>
          <div style="display:grid;gap:20px;align-content:start">
            <div style="background:#fff;border:1px solid #E7E4ED;border-radius:20px;padding:26px">
              <p style="font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#0B7A5E">Local &amp; Google</p>
              <ul style="margin-top:14px;display:grid;gap:9px;font-size:13px;line-height:1.6;color:#3E3560">
                <li>&middot; <span style="font-weight:600">Schema shipped live in the head:</span> MedicalClinic, Physician, MedicalWebPage (<code style="font-family:ui-monospace,Menlo,monospace">lastReviewed</code> + <code style="font-family:ui-monospace,Menlo,monospace">reviewedBy</code>), MedicalProcedure, FAQPage and BreadcrumbList, cross-linked by <code style="font-family:ui-monospace,Menlo,monospace">@id</code>. FAQ nodes are generated from the visible accordion so the two cannot drift.</li>
                <li>&middot; <span style="font-weight:600">No aggregateRating</span> even with live reviews on the page &mdash; the widget injects them client-side, self-serving reviews are not eligible for review rich results, and a hard-coded figure would go stale.</li>
                <li>&middot; <span style="font-weight:600">NAP</span> visible in the contact block and footer and identical in schema; <code style="font-family:ui-monospace,Menlo,monospace">tel:</code> links in header, contact and footer; geo 28.4396807, 77.0438613.</li>
                <li>&middot; <span style="font-weight:600">Swap the placeholder domain</span> &mdash; every <code style="font-family:ui-monospace,Menlo,monospace">@id</code> uses <code style="font-family:ui-monospace,Menlo,monospace">dencespot.com</code>. Set the real host and self-canonical before publishing.</li>
                <li>&middot; <span style="font-weight:600">CWV:</span> one third-party script (Elfsight reviews), <code style="font-family:ui-monospace,Menlo,monospace">async</code> and lazy, below the fold. Reserve height for it. LCP is the hero image &mdash; 1200&times;1500 WebP, eager; lazy-load the rest.</li>
              </ul>
            </div>
            <div style="background:#fff;border:1px solid #E7E4ED;border-radius:20px;padding:26px">
              <p style="font-size:14px;font-weight:700;color:#1a1147">Internal links, in and out</p>
              <p style="margin-top:8px;font-size:13px;line-height:1.6;color:#3E3560">${s.notes.links}</p>
            </div>
            <div style="background:#fff;border:1px dashed #C9C3D8;border-radius:20px;padding:26px">
              <p style="font-size:14px;font-weight:700;color:#1a1147">Still needed from the clinic</p>
              <p style="margin-top:8px;font-size:13px;line-height:1.6;color:#3E3560">${s.notes.needed}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </sc-if>
`;

const tail = `
</div>
</x-dc>
<script type="text/x-dc" data-dc-script data-props="{&quot;showStats&quot;:{&quot;editor&quot;:&quot;boolean&quot;,&quot;default&quot;:true,&quot;tsType&quot;:&quot;boolean&quot;,&quot;section&quot;:&quot;Content controls&quot;},&quot;showProvenanceTags&quot;:{&quot;editor&quot;:&quot;boolean&quot;,&quot;default&quot;:true,&quot;tsType&quot;:&quot;boolean&quot;,&quot;section&quot;:&quot;Content controls&quot;},&quot;showGraftCounts&quot;:{&quot;editor&quot;:&quot;boolean&quot;,&quot;default&quot;:true,&quot;tsType&quot;:&quot;boolean&quot;,&quot;section&quot;:&quot;Content controls&quot;}}">
class Component extends DCLogic {
  state = { split: 52 };
  renderVals() {
    const p = this.props || {};
    const split = this.state.split;
    return {
      split: split,
      splitPct: split + '%',
      splitClip: 'inset(0 ' + (100 - split) + '% 0 0)',
      onSplit: (e) => this.setState({ split: Number(e.target.value) }),
      showStats: p.showStats ?? true,
      showNotes: p.showProvenanceTags ?? true,
      showGraftDetail: p.showGraftCounts ?? true
    };
  }
}
</script>
</body>
</html>
`;

export function renderPage(s) {
  return head(s) + header(s) + hero(s) + whatIs(s) + candidacy(s) + s.feature +
    why(s) + journey(s) + procedure(s) + recovery(s) + results(s) + doctor(s) +
    reviews() + cost(s) + faqs(s) + local(s) + book(s) + footer(s) + notes(s) + tail;
}
