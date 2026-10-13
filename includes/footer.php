<?php
/**
 * Site footer, booking dialog, mobile quick-contact bar and scripts.
 * Closes <main> opened in header.php.
 *
 * October 2026 redesign: the same footer, dialog and bar as the homepage
 * (includes/home-components.php), driven by assets/js/home.js, which also
 * sends the data-track conversion events. The before-and-after slider,
 * certificate lightbox and video-testimonial scripts that used to live here
 * served sections withdrawn under the NMC Guidelines of 06.10.2026 and have
 * been removed with them.
 */

declare(strict_types=1);
?>
<?php
/**
 * Topic-cluster navigation. Renders only on pages listed in CLUSTERS
 * (includes/clusters.php): a pillar lists its whole cluster, a cluster page
 * links up to its pillar and across to its siblings.
 */
?>
<?= cluster_section((string) ($page['url'] ?? '')) ?>
</main>

<?= hp_footer() ?>
<?= hp_booking_dialog('dialog:' . (string) ($page['url'] ?? '')) ?>
<?= hp_mobile_bar() ?>

<script src="<?= e($hpAsset('/assets/js/home.js')) ?>" defer></script>
</body>
</html>
