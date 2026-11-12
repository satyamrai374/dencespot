<?php
/**
 * Shared settings for the /lp/ pages: the landing page (lp/index.php) and its
 * own thank-you page (lp/thank-you/index.php). Change a number or a tag ID
 * here and both pages follow.
 */

declare(strict_types=1);

require_once dirname(__DIR__) . '/includes/config.php';

/**
 * Ad-platform tags for the /lp/ pages only. Leave a value '' and its tag is
 * not printed. The site itself loads none of these.
 */
const LP_GTM_ID   = '';   // e.g. 'GTM-XXXXXXX'
const LP_GA4_ID   = '';   // e.g. 'G-XXXXXXXXXX'
const LP_PIXEL_ID = '';   // Meta Pixel id, digits only

const LP_URL    = '/lp/';
const LP_SOURCE = 'lp-hair-transplant';

/**
 * Where an LP enquiry lands (client, 6 Nov 2026: the LP's own thank-you page,
 * not the website's /thank-you). lp.js sends the form to /enquire.php in the
 * background and then opens this page. The page view is the LP's conversion.
 */
const LP_THANK_YOU_URL = '/lp/thank-you/';

/**
 * One number on the /lp/ pages, for calls and WhatsApp: +91 81783 30800, the
 * Gurugram clinic number (client, 3 Nov 2026; it was the Rohini number from
 * 26 Oct). These pages only: the rest of the site is unchanged. The clinic
 * entities in the JSON-LD keep their own numbers, which must match each
 * clinic's Google Business Profile.
 */
const LP_PHONE_E164        = PHONE_E164;
const LP_PHONE_DISPLAY     = PHONE_DISPLAY;
const LP_WHATSAPP_MESSAGE  = 'Hello, I would like to explore hair transplant treatment. Please share the details and available options.';
const LP_WHATSAPP_URL      = 'https://api.whatsapp.com/send/?phone=%2B918178330800&text=Hello%2C%20I%20would%20like%20to%20explore%20hair%20transplant%20treatment.%20Please%20share%20the%20details%20and%20available%20options.';

/** A file in /lp/ with a version query, so a changed file is never served stale. */
function lp_asset(string $file): string
{
    return LP_URL . $file . '?v=' . (int) @filemtime(__DIR__ . '/' . $file);
}

/** The ad-platform tags for <head> (GTM, GA4, Meta Pixel), each only when its ID is set. */
function lp_head_tags(): string
{
    $out = '';
    if (LP_GTM_ID !== '') {
        $out .= "  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','" . e(LP_GTM_ID) . "');</script>\n";
    }
    if (LP_GA4_ID !== '') {
        $out .= '  <script async src="https://www.googletagmanager.com/gtag/js?id=' . e(LP_GA4_ID) . "\"></script>\n"
              . "  <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','" . e(LP_GA4_ID) . "');</script>\n";
    }
    if (LP_PIXEL_ID !== '') {
        $out .= "  <script>!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');fbq('init','" . e(LP_PIXEL_ID) . "');fbq('track','PageView');</script>\n";
    }
    return $out;
}

/** The GTM <noscript> fallback for the top of <body>. */
function lp_body_tags(): string
{
    return LP_GTM_ID === '' ? '' : '  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=' . e(LP_GTM_ID) . "\" height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>\n";
}

/** Font Awesome, loaded without blocking the first paint, as on the reference page. */
function lp_icon_css(): string
{
    $out = '';
    foreach (['fontawesome', 'solid', 'brands'] as $sheet) {
        $out .= '  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/' . $sheet . ".min.css\" media=\"print\" onload=\"this.media='all'\">\n";
    }
    $out .= "  <noscript>\n";
    foreach (['fontawesome', 'solid', 'brands'] as $sheet) {
        $out .= '    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/' . $sheet . ".min.css\">\n";
    }
    return $out . "  </noscript>\n";
}
