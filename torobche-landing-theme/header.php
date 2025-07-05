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
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo_image_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
					if ( $logo_image_url ) {
						echo '<img src="' . esc_url( $logo_image_url ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" id="site-logo">';
					} else {
						// Fallback if no logo is set - you can put a placeholder or leave it empty
						echo '<img src="#" alt="لوگوی تربچه" id="site-logo" style="border:1px dashed #ccc; padding:10px; background-color:#f0f0f0; color:#777; text-align:center; min-height:50px; display:inline-block;">';
						// echo '<span class="site-title-text-fallback">' . esc_html( get_bloginfo( 'name' ) ) . '</span>';
					}
					?>
					-->
					<img src="#" alt="لوگوی تربچه" id="site-logo" style="height: 60px; width: auto; border:1px dashed #ccc; padding:5px; background-color:#f0f0f0;">
					<span class="screen-reader-text"><?php bloginfo('name'); ?></span>
				</a>
			</div>
			<div class="site-title-area">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-title-link">
					<span class="site-title-text">تربچه</span>
				</a>
				<p class="site-description-text">فروش لوازم کودکان، اسباب بازی و سرگرمی</p> <!-- Optional: Add a tagline here -->
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
