<?php
/**
 * The header for our theme (Lums Inspired Redesign)
 *
 * This is the template that displays all of the <head> section and everything up until <main>
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

<?php
$show_preloader = get_theme_mod('show_preloader', true); // Default to true
if ($show_preloader) :
?>
<div id="preloader">
    <div class="preloader-spinner">
        <?php
        // Optional: If you add a Customizer setting for preloader_logo
        // $preloader_logo_url = get_theme_mod('preloader_logo', '');
        // if (!empty($preloader_logo_url)) :
        ?>
            <!-- <img src="<?php //echo esc_url($preloader_logo_url); ?>" alt="<?php //esc_attr_e('Loading...', 'torobche-landing'); ?>"> -->
        <?php // else : ?>
            <div class="spinner-css"></div> <?php // Fallback to CSS spinner ?>
        <?php // endif; ?>
    </div>
</div>
<?php endif; ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'torobche-landing' ); ?></a>

	<header id="masthead" class="site-header site-header-lums"> <?php // Added new class for Lums styling ?>
		<div class="container header-lums-container">
			<div class="site-branding-lums">
				<?php
				if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
					the_custom_logo();
				} else {
					echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" class="text-logo">';
					bloginfo( 'name' );
					echo '</a>';
				}
				?>
			</div>

			<nav id="site-navigation-lums" class="main-navigation-lums">
				<button class="menu-toggle-lums" aria-controls="primary-menu-lums" aria-expanded="false">
					<span class="hamburger-icon-lums"></span>
					<span class="screen-reader-text"><?php esc_html_e( 'فهرست اصلی', 'torobche-landing' ); ?></span>
				</button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary_lums', // New theme location for Lums header
						'menu_id'        => 'primary-menu-lums',
						'menu_class'     => 'nav-menu-lums',
						'container'      => false, // No container div around the ul
                        'fallback_cb'    => false, // Do not show a fallback menu
					)
				);
				?>
			</nav><!-- #site-navigation-lums -->

			<div class="header-cta-lums">
				<?php
				// CTA Button - To be made customizable via Customizer
				$header_cta_text = get_theme_mod('header_lums_cta_text', __('سفارش دهید', 'torobche-landing'));
				$header_cta_link = get_theme_mod('header_lums_cta_link', '#order-form');
				?>
				<a href="<?php echo esc_url($header_cta_link); ?>" class="btn btn-primary-lums header-button-lums">
					<?php echo esc_html($header_cta_text); ?>
				</a>
			</div>
		</div><!-- .container -->
	</header><!-- #masthead -->

	<?php // Note: The <div id="content" class="site-content"> that was previously here
		  // is often part of the main content area, not strictly header.
		  // It might be better placed within or around the <main> tag in index.php if needed.
		  // For a Lums-like design, page sections will likely be direct children of <main>.
	?>
