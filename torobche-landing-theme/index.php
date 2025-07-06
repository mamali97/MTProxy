<?php
/**
 * The main template file for Torobche Landing Page (Lums Inspired Redesign)
 *
 * @package Torobche_Landing
 */

get_header(); ?>

	<main id="primary" class="site-main">
		<?php
		// Load Lums-inspired Hero section
		get_template_part('template-parts/hero-lums');

		// Other content sections inspired by Lums will be added here.
		// For example:
		// get_template_part('template-parts/features-lums');
		// get_template_part('template-parts/how-it-works-lums');
		// ... and so on
		?>
	</main><!-- #primary -->

<?php
get_footer();
?>
