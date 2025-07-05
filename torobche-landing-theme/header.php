<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Torobche_Landing
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> dir="rtl">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'torobche-landing' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container header-inner-container">
			<div class="logo-area">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<!--
					IMPORTANT USER ACTION: Replace # with the actual URL to your logo image.
					For example: <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="لوگوی تربچه" id="site-logo">
					Or, if you upload it via WordPress Customizer (more advanced):
					<?php
					if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
						the_custom_logo();
					} else {
						// Fallback if no logo is set - display a placeholder or site title as text.
						// You can customize this placeholder.
						echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">';
						echo '<img src="' . get_template_directory_uri() . '/images/logo-placeholder.png" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" id="site-logo-placeholder" style="height: 60px; width: auto; border:1px dashed #ccc; padding:5px; background-color:#f0f0f0;">';
						echo '</a>';
					}
					?>
					<?php // The <a> tag wrapping the_custom_logo() was indeed redundant as the_custom_logo() generates its own <a> tag. Removed the outer <a>. ?>
			</div>
			<div class="site-title-area">
				<?php
				// Check if the "Display Site Title and Tagline" checkbox is checked in the Customizer
				if ( display_header_text() === true ) :
				?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-title-link">
						<span class="site-title-text"><?php bloginfo( 'name' ); ?></span>
					</a>
					<p class="site-description-text"><?php bloginfo( 'description' ); ?></p>
				<?php endif; ?>
			</div>
			<?php
			// If you want to add a navigation menu later, you can use wp_nav_menu() here.
			// For a single landing page, it might not be necessary.
			/*
			<nav id="site-navigation" class="main-navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1', // As registered in functions.php
						'menu_id'        => 'primary-menu',
						'fallback_cb'    => false, // Don't show a fallback menu if not set
						'depth'          => 1,     // Only top-level items for a simple landing page
					)
				);
				?>
			</nav>
			*/
			?>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
