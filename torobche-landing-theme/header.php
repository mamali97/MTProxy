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
		<div class="site-branding container">
			<?php
			// We'll add the "Torobche" brand name here in the next step.
			// For now, it's a placeholder.
			?>
			<div class="site-title-container">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-logo-link">
					<span class="site-title-text">تربچه</span>
					<?php
					// You can add a logo image here if you have one later:
					// $custom_logo_id = get_theme_mod( 'custom_logo' );
					// $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					// if ( has_custom_logo() ) {
					// echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
					// } else {
					// echo '<span class="site-title-text">تربچه</span>';
					// }
					?>
				</a>
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
