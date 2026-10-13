<?php
/**
 * Advertised market prices in Gurgaon — what OTHER clinics publish.
 *
 * Rendered only through market_price_table() in components.php, which labels
 * every table "market context, not our price list" and dates it. Never mark
 * any of this up as an Offer or PriceSpecification: none of it is DenceSpot's
 * price. DenceSpot's own figures belong in COST_BAND_* and $rates, and stay
 * null until the clinic confirms them.
 *
 * Sources (clinic and directory pages fetched 13 September 2026; see the
 * competitor research notes for URLs): Cult Aesthetics (FUE ₹35–45, DHI ₹40–90
 * per graft), QHT Gurgaon (FUT ₹50, FUE ₹70, branded ₹100 per graft; totals
 * ₹40,000–₹5,00,000), Medlinks (₹70 / ₹120 / ₹200 per graft), Practo cost page
 * (₹45,000–₹1,65,000), Satya (₹45,000–₹1,50,000), AK Clinics (₹50,000–
 * ₹1,50,000), SB Aesthetics (₹90,000–₹1,60,000).
 *
 * ⚠ Re-check every six months and move MARKET_PRICES_AS_OF with it. A stale
 * market figure is worse than none.
 */

declare(strict_types=1);

const MARKET_PRICES_AS_OF = 'September 2026';

const MARKET_PRICES = [
    'hair-transplant' => [
        ['item' => 'FUE, per graft',                    'range' => '₹35 – ₹100',            'note' => 'The unit most Gurgaon clinics advertise in. Proprietary-branded variants are priced above this.'],
        ['item' => 'DHI or implanter placement, per graft', 'range' => '₹40 – ₹200',        'note' => 'Usually above FUE because placement is slower. Brand names differ; ask what is actually done differently.'],
        ['item' => 'FUT (strip), per graft',            'range' => '₹50 – ₹70',             'note' => 'Offered by fewer clinics. Leaves a linear donor scar.'],
        ['item' => 'Advertised totals, typical cases',  'range' => '₹45,000 – ₹1,65,000',   'note' => 'The overall ranges printed in clinic and directory listings — often without the graft count stated beside them.'],
        ['item' => 'Large or staged cases',             'range' => '₹1,50,000 – ₹5,00,000', 'note' => 'Roughly 3,000–5,000+ grafts, often across two sessions.'],
    ],
];

/**
 * DHI and non-surgical rows. Additional sources (13 Sep 2026): Cult Aesthetics
 * DHI ₹40–90/graft and ₹80,000–₹2,25,000 for 2,000–2,500 grafts; Medlinks
 * implanter tiers ₹120–₹200; AK Clinics PRP ₹9,999/session and GFC ₹14,500;
 * Uncover PRP ₹4,000–₹10,000, GFC ₹8,000–₹15,000; Pristyn PRP ₹7,000–₹15,000
 * and courses ₹20,500–₹60,000, basic blood tests ₹100–₹400; Skinfinity
 * consultation ₹1,000–₹1,500, PRP ₹4,500–₹9,000, GFC ₹10,000–₹15,000,
 * mesotherapy ₹3,500–₹6,000; Citrine GFC ₹6,000–₹25,000.
 */
const MARKET_PRICES_EXTRA = [
    'dhi' => [
        ['item' => 'DHI, per graft',                     'range' => '₹40 – ₹200',            'note' => 'Implanter-pen placement. "Premium", "sapphire" or trademarked variants sit at the top of the range.'],
        ['item' => 'FUE, per graft (for comparison)',    'range' => '₹35 – ₹100',            'note' => 'At the same clinic, DHI is almost always quoted above FUE.'],
        ['item' => 'Published DHI totals, 2,000–2,500 grafts', 'range' => '₹80,000 – ₹2,25,000', 'note' => 'From the few Gurgaon clinics that print a DHI total at all; most quote only after assessment.'],
    ],
    'prp' => [
        ['item' => 'Consultation',                       'range' => '₹1,000 – ₹1,500',       'note' => 'Sometimes discounted or credited against treatment.'],
        ['item' => 'PRP, per session',                   'range' => '₹4,000 – ₹15,000',      'note' => 'Most advertised prices sit between ₹5,000 and ₹12,000.'],
        ['item' => 'PRP, advertised courses',            'range' => '₹20,000 – ₹60,000',     'note' => 'Usually 3–6 sessions paid upfront. Ask whether you can stop if it is not working.'],
        ['item' => 'GFC, per session',                   'range' => '₹6,000 – ₹25,000',      'note' => 'Most advertised prices sit between ₹8,000 and ₹15,000.'],
        ['item' => 'Mesotherapy, per session',           'range' => '₹3,000 – ₹6,000',       'note' => 'Formulations differ between clinics; ask what is injected.'],
        ['item' => 'Basic blood tests, per test',        'range' => '₹100 – ₹400',           'note' => 'As one provider advertises them. Specialised tests, such as vitamin D, usually cost more.'],
    ],
];

/**
 * Integer bands for worked arithmetic. Keep each in step with its row above.
 */
const MARKET_FUE_RATE_LOW  = 35;
const MARKET_FUE_RATE_HIGH = 100;
const MARKET_DHI_RATE_LOW  = 40;
const MARKET_DHI_RATE_HIGH = 200;
/** The "most advertised prices" band, not the outer range. */
const MARKET_PRP_SESSION_LOW  = 5000;
const MARKET_PRP_SESSION_HIGH = 12000;
const MARKET_GFC_SESSION_LOW  = 8000;
const MARKET_GFC_SESSION_HIGH = 15000;

/** One row set by key, from either table. */
function market_rows(string $key): array
{
    return MARKET_PRICES[$key] ?? MARKET_PRICES_EXTRA[$key] ?? [];
}

/** "₹70,000" from an integer. */
function rupees(int $amount): string
{
    // Indian digit grouping: 1,50,000 rather than 150,000.
    $s = (string) $amount;
    if (strlen($s) <= 3) {
        return '₹' . $s;
    }
    $last3 = substr($s, -3);
    $rest  = substr($s, 0, -3);
    $rest  = preg_replace('/\B(?=(\d{2})+(?!\d))/', ',', $rest);
    return '₹' . $rest . ',' . $last3;
}
