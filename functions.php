<?php
/**
 * Torobche functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Torobche
 */

if ( ! function_exists( 'torobche_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function torobche_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Torobche, use a find and replace
		 * to change 'torobche' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'torobche', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'torobche' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'torobche_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'torobche_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function torobche_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'torobche_content_width', 640 );
}
add_action( 'after_setup_theme', 'torobche_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function torobche_scripts() {
	wp_enqueue_style( 'torobche-style', get_template_directory_uri() . '/style.min.css', array(), '1.0.1' );
	wp_enqueue_style( 'vazir-font', 'https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css' );
	wp_enqueue_script( 'torobche-main-js', get_template_directory_uri() . '/js/main.min.js', array(), '1.0.1', true );
	wp_enqueue_script( 'tailwindcss', 'https://cdn.tailwindcss.com' );
	wp_style_add_data( 'torobche-style', 'rtl', 'replace' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'init', 'torobche_create_products' );
function torobche_create_products() {
    if ( ! function_exists( 'wc_create_product' ) ) {
        return;
    }

    $products = [
        'girls-tshirt' => ['name' => 'تی‌شرت دخترانه', 'price' => 870000],
        'boys-tshirt' => ['name' => 'تی‌شرت پسرانه', 'price' => 870000],
        'sweatshirt' => ['name' => 'سویشرت بچگانه', 'price' => 970000]
    ];

    foreach ($products as $sku => $data) {
        if ( ! get_page_by_title( $data['name'], OBJECT, 'product' ) ) {
            $product = new WC_Product_Simple();
            $product->set_name( sanitize_text_field($data['name']) );
            $product->set_sku( sanitize_text_field($sku) );
            $product->set_regular_price( floatval($data['price']) );
            $product->set_short_description( sanitize_text_field('یک محصول با کیفیت برای کودکان شما.') );
            $product->save();
        }
    }
}

add_action('template_redirect', 'torobche_handle_checkout_form');
function torobche_handle_checkout_form() {
    if (is_page_template('page-checkout.php') && isset($_POST['checkout_nonce'])) {
        if (!wp_verify_nonce($_POST['checkout_nonce'], 'torobche_checkout_nonce')) {
            wp_die('Security check failed.');
        }

        // Add to cart logic is now handled by javascript
    }
}

add_action( 'wp_enqueue_scripts', 'torobche_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

class Torobche_Nav_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth=0, $args=null, $id=0) {
        $output .= "<li><a href='" . $item->url . "' class='text-gray-700 hover:text-purple-600 transition-colors cursor-pointer whitespace-nowrap px-4 py-2'>" . $item->title;
    }
    function end_el(&$output, $item, $depth=0, $args=null) {
        $output .= "</a></li>";
    }
}
