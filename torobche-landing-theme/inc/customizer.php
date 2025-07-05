<?php
/**
 * Torobche Landing Theme Customizer
 *
 * @package Torobche_Landing
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function torobche_landing_customize_register( $wp_customize ) {
	// Site Identity Panel (Existing - We might add to it or ensure it works as expected)
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title-text', // Or your specific selector for site title
				'render_callback' => 'torobche_landing_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description-text', // Or your specific selector for site description
				'render_callback' => 'torobche_landing_customize_partial_blogdescription',
			)
		);
	}

	// Add more sections, settings, and controls here in subsequent steps.
	// For example:
	// $wp_customize->add_section( 'torobche_hero_section', array(
	// 'title'      => __( 'Hero Section Settings', 'torobche-landing' ),
	// 'priority'   => 30,
	// ) );

	// Ensure "Display Site Title and Tagline" checkbox is available if not already by default with custom logo support
    // This is usually handled by core WordPress when 'custom-logo' is supported.
    // We are primarily ensuring that our theme correctly uses `display_header_text()`.
    // No specific new controls needed here for this step if relying on core title/tagline display options.

    // ============== Hero Section Settings ==============
	$wp_customize->add_section( 'torobche_hero_section', array(
		'title'      => __( 'تنظیمات بخش اصلی (Hero)', 'torobche-landing' ),
		'priority'   => 30, // Adjust priority as needed
	) );

	// Hero Background Image
	$wp_customize->add_setting( 'hero_background_image', array(
		'default'           => '', // No default image
		'sanitize_callback' => 'esc_url_raw', // Sanitize URL
		'transport'         => 'refresh', // or 'postMessage' with JS handler
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_background_image_control', array(
		'label'       => __( 'تصویر پس زمینه Hero', 'torobche-landing' ),
		'section'     => 'torobche_hero_section',
		'settings'    => 'hero_background_image',
		'description' => __( 'یک تصویر برای پس زمینه اصلی بخش Hero آپلود کنید.', 'torobche-landing' ),
	) ) );

	// Hero Title
	$wp_customize->add_setting( 'hero_title', array(
		'default'           => __( 'لباس جادویی', 'torobche-landing' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'hero_title_control', array(
		'label'    => __( 'عنوان اصلی Hero', 'torobche-landing' ),
		'section'  => 'torobche_hero_section',
		'settings' => 'hero_title',
		'type'     => 'text',
	) );
	$wp_customize->selective_refresh->add_partial( 'hero_title_partial', array(
        'selector' => '.hero-title',
        'settings' => 'hero_title',
        'render_callback' => function() { return get_theme_mod('hero_title'); },
    ) );

	// Hero Tagline
	$wp_customize->add_setting( 'hero_tagline', array(
		'default'           => __( 'خلاقیت بی‌پایان، هر روز یک ماجراجویی رنگی!', 'torobche-landing' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'hero_tagline_control', array(
		'label'    => __( 'شعار Hero', 'torobche-landing' ),
		'section'  => 'torobche_hero_section',
		'settings' => 'hero_tagline',
		'type'     => 'text',
	) );
    $wp_customize->selective_refresh->add_partial( 'hero_tagline_partial', array(
        'selector' => '.hero-tagline',
        'settings' => 'hero_tagline',
        'render_callback' => function() { return get_theme_mod('hero_tagline'); },
    ) );

	// Hero Description
	$wp_customize->add_setting( 'hero_description', array(
		'default'           => __( 'یک ست بلوز و شلوار خاص با طرح‌های جذاب بچه‌گانه که کودکان با ماژیک قابل شستشوی همراه آن، می‌توانند بارها و بارها آن را رنگ‌آمیزی کنند. مناسب برای سنین ۲ تا ۶ سال، بدون محدودیت جنسیتی.', 'torobche-landing' ),
		'sanitize_callback' => 'wp_kses_post', // Allows basic HTML
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'hero_description_control', array(
		'label'    => __( 'توضیحات Hero', 'torobche-landing' ),
		'section'  => 'torobche_hero_section',
		'settings' => 'hero_description',
		'type'     => 'textarea',
	) );
    $wp_customize->selective_refresh->add_partial( 'hero_description_partial', array(
        'selector' => '.hero-description',
        'settings' => 'hero_description',
        'render_callback' => function() { return wp_kses_post(get_theme_mod('hero_description')); },
    ) );

	// Hero CTA Button Text
	$wp_customize->add_setting( 'hero_cta_text', array(
		'default'           => __( 'سفارش لباس جادویی خودم', 'torobche-landing' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'hero_cta_text_control', array(
		'label'    => __( 'متن دکمه فراخوان Hero', 'torobche-landing' ),
		'section'  => 'torobche_hero_section',
		'settings' => 'hero_cta_text',
		'type'     => 'text',
	) );
    $wp_customize->selective_refresh->add_partial( 'hero_cta_text_partial', array(
        'selector' => '.hero-cta',
        'settings' => 'hero_cta_text',
        'render_callback' => function() { return get_theme_mod('hero_cta_text'); },
    ) );

	// Hero CTA Button Link
	$wp_customize->add_setting( 'hero_cta_link', array(
		'default'           => '#order-form',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh', // Links usually need refresh
	) );
	$wp_customize->add_control( 'hero_cta_link_control', array(
		'label'    => __( 'لینک دکمه فراخوان Hero', 'torobche-landing' ),
		'section'  => 'torobche_hero_section',
		'settings' => 'hero_cta_link',
		'type'     => 'url',
	) );

	// ============== Product Details Section Settings ==============
	$wp_customize->add_section( 'torobche_product_details_section', array(
		'title'      => __( 'تنظیمات جزئیات محصول', 'torobche-landing' ),
		'priority'   => 31,
	) );

	// Section Title
	$wp_customize->add_setting( 'product_details_title', array(
		'default'           => __( 'سایز و قیمت را انتخاب کنید', 'torobche-landing' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'product_details_title_control', array(
		'label'    => __( 'عنوان بخش جزئیات محصول', 'torobche-landing' ),
		'section'  => 'torobche_product_details_section',
		'settings' => 'product_details_title',
		'type'     => 'text',
	) );
	$wp_customize->selective_refresh->add_partial( 'product_details_title_partial', array(
        'selector' => '#product-details .section-title', // More specific selector
        'settings' => 'product_details_title',
        'render_callback' => function() { return get_theme_mod('product_details_title'); },
    ) );

	// Product Features (Using individual text fields for simplicity)
	$feature_items_count = 5; // Define how many feature items you want
	for ( $i = 1; $i <= $feature_items_count; $i++ ) {
		$wp_customize->add_setting( "product_feature_{$i}", array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh', // Refresh might be easier for a list
		) );
		$wp_customize->add_control( "product_feature_{$i}_control", array(
			'label'    => sprintf( __( 'ویژگی محصول %d', 'torobche-landing' ), $i ),
			'section'  => 'torobche_product_details_section',
			'settings' => "product_feature_{$i}",
			'type'     => 'text',
			'description' => __( 'اگر خالی بگذارید، این ویژگی نمایش داده نخواهد شد.', 'torobche-landing'),
		) );
	}
    // Default values for features (can be set in default param of add_setting or handled in template)
    // For example, the first few can have defaults:
    // get_theme_mod('product_feature_1', __('قابلیت رنگ‌آمیزی و شستشوی مکرر', 'torobche-landing'))
    // Set defaults for first 5 features if they are empty
    $default_features_arr = array(
        __('🎨 قابلیت رنگ‌آمیزی و شستشوی مکرر', 'torobche-landing'),
        __('👕 شامل بلوز و شلوار با طرح‌های جذاب', 'torobche-landing'),
        __('🖍️ همراه با مجموعه ماژیک‌های قابل شستشو', 'torobche-landing'),
        __('🧒 مناسب برای سنین ۲ تا ۶ سال', 'torobche-landing'),
        __('⚤ بدون محدودیت جنسیتی، مناسب برای دختران و پسران', 'torobche-landing')
    );
    for ( $i = 1; $i <= $feature_items_count; $i++ ) {
        if ( empty( get_theme_mod( "product_feature_{$i}" ) ) && isset($default_features_arr[$i-1]) ) {
            // This won't set it in the Customizer UI directly but ensures `get_theme_mod` has a fallback
            // To set in UI, you'd use the 'default' in `add_setting`.
            // This is more of a template-level default handling.
        }
         // To set in UI, the 'default' parameter in add_setting should be used.
        // Example for setting default in add_setting (would require modifying the loop above):
        // $wp_customize->add_setting( "product_feature_{$i}", array(
		// 	'default'           => isset($default_features_arr[$i-1]) ? $default_features_arr[$i-1] : '',
		// 	'sanitize_callback' => 'sanitize_text_field',
		// ) );
    }


	// Pricing
	$wp_customize->add_setting( 'product_base_price_2_years', array(
		'default'           => '870000',
		'sanitize_callback' => 'absint', // Sanitize as absolute integer
		'transport'         => 'refresh', // Price changes should trigger JS update, refresh is safest
	) );
	$wp_customize->add_control( 'product_base_price_2_years_control', array(
		'label'    => __( 'قیمت پایه برای ۲ سال (تومان)', 'torobche-landing' ),
		'section'  => 'torobche_product_details_section',
		'settings' => 'product_base_price_2_years',
		'type'     => 'number',
		'input_attrs' => array(
            'min' => 0,
        ),
	) );

	$wp_customize->add_setting( 'product_price_increase_per_year', array(
		'default'           => '100000',
		'sanitize_callback' => 'absint',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'product_price_increase_per_year_control', array(
		'label'    => __( 'میزان افزایش قیمت برای هر سال بالاتر (تومان)', 'torobche-landing' ),
		'section'  => 'torobche_product_details_section',
		'settings' => 'product_price_increase_per_year',
		'type'     => 'number',
		'input_attrs' => array(
            'min' => 0,
        ),
	) );

	// ============== Order Form Section Settings ==============
	$wp_customize->add_section( 'torobche_order_form_section', array(
		'title'      => __( 'تنظیمات فرم سفارش', 'torobche-landing' ),
		'priority'   => 32,
	) );

	// Form Section Title
	$wp_customize->add_setting( 'order_form_title', array(
		'default'           => __( 'فرم سفارش لباس جادویی', 'torobche-landing' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'order_form_title_control', array(
		'label'    => __( 'عنوان بخش فرم سفارش', 'torobche-landing' ),
		'section'  => 'torobche_order_form_section',
		'settings' => 'order_form_title',
		'type'     => 'text',
	) );
	$wp_customize->selective_refresh->add_partial( 'order_form_title_partial', array(
        'selector' => '#order-form .section-title',
        'settings' => 'order_form_title',
        'render_callback' => function() { return get_theme_mod('order_form_title'); },
    ) );

	// Form Note
	$wp_customize->add_setting( 'order_form_note', array(
		'default'           => __( 'پس از ثبت سفارش، برای هماهنگی و پرداخت با شما تماس گرفته خواهد شد.', 'torobche-landing' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'order_form_note_control', array(
		'label'    => __( 'یادداشت زیر فرم سفارش', 'torobche-landing' ),
		'section'  => 'torobche_order_form_section',
		'settings' => 'order_form_note',
		'type'     => 'textarea',
	) );
    $wp_customize->selective_refresh->add_partial( 'order_form_note_partial', array(
        'selector' => '.form-note',
        'settings' => 'order_form_note',
        'render_callback' => function() { return get_theme_mod('order_form_note'); },
    ) );

	// ============== Testimonials Section Settings ==============
	$wp_customize->add_section( 'torobche_testimonials_section', array(
		'title'      => __( 'تنظیمات نظرات مشتریان', 'torobche-landing' ),
		'priority'   => 33,
	) );

	// Testimonials Section Title
	$wp_customize->add_setting( 'testimonials_title', array(
		'default'           => __( 'نظر مشتریان خوشحال ما', 'torobche-landing' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'testimonials_title_control', array(
		'label'    => __( 'عنوان بخش نظرات', 'torobche-landing' ),
		'section'  => 'torobche_testimonials_section',
		'settings' => 'testimonials_title',
		'type'     => 'text',
	) );
	$wp_customize->selective_refresh->add_partial( 'testimonials_title_partial', array(
        'selector' => '#testimonials .section-title',
        'settings' => 'testimonials_title',
        'render_callback' => function() { return get_theme_mod('testimonials_title'); },
    ) );

	// Testimonials Repeater (Simplified: 3 sets of fields)
	$testimonials_count = 3;
	for ( $i = 1; $i <= $testimonials_count; $i++ ) {
		// Testimonial Text
		$wp_customize->add_setting( "testimonial_text_{$i}", array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
			'transport'         => 'refresh', // Refresh for multi-field changes
		) );
		$wp_customize->add_control( "testimonial_text_{$i}_control", array(
			'label'    => sprintf( __( 'متن نظر مشتری %d', 'torobche-landing' ), $i ),
			'section'  => 'torobche_testimonials_section',
			'settings' => "testimonial_text_{$i}",
			'type'     => 'textarea',
		) );

		// Testimonial Author
		$wp_customize->add_setting( "testimonial_author_{$i}", array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		) );
		$wp_customize->add_control( "testimonial_author_{$i}_control", array(
			'label'    => sprintf( __( 'نام نویسنده نظر %d', 'torobche-landing' ), $i ),
			'section'  => 'torobche_testimonials_section',
			'settings' => "testimonial_author_{$i}",
			'type'     => 'text',
		) );

        // Testimonial Image (Optional)
        // $wp_customize->add_setting( "testimonial_image_{$i}", array(
        //     'default'           => '',
        //     'sanitize_callback' => 'esc_url_raw',
        //     'transport'         => 'refresh',
        // ) );
        // $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "testimonial_image_{$i}_control", array(
        //     'label'    => sprintf( __( 'تصویر نویسنده نظر %d (اختیاری)', 'torobche-landing' ), $i ),
        //     'section'  => 'torobche_testimonials_section',
        //     'settings' => "testimonial_image_{$i}",
        // ) ) );

        if ($i < $testimonials_count) {
            $wp_customize->add_control(new WP_Customize_Control($wp_customize, "testimonial_divider_{$i}", array(
                'type' => 'hidden', // Using hidden as a simple separator, or use a custom control for a line
                'section' => 'torobche_testimonials_section',
                'settings' => array(), // Dummy setting
                'label' => ' ', // Empty label
                'description' => '<hr style="margin:15px 0;">', // HTML for a horizontal line
            )));
        }
	}
    // Note for user about adding more testimonials
    $wp_customize->add_setting( 'testimonials_note_dummy', array( 'default' => '', 'sanitize_callback' => '__return_false' ) );
    $wp_customize->add_control( 'testimonials_note_control', array(
        'section'  => 'torobche_testimonials_section',
        'settings' => 'testimonials_note_dummy',
        'type'     => 'hidden', // Not a real setting, just for description
        'description' => __( 'برای افزودن نظرات بیشتر یا مدیریت پیشرفته‌تر نظرات، نیاز به تغییرات در کد قالب یا استفاده از افزونه‌های تخصصی می‌باشد.', 'torobche-landing' ),
    ));

	// ============== Footer Section Settings ==============
	$wp_customize->add_section( 'torobche_footer_section', array(
		'title'      => __( 'تنظیمات فوتر', 'torobche-landing' ),
		'priority'   => 34,
	) );

	// Footer Phone Number
	$wp_customize->add_setting( 'footer_phone_number', array(
		'default'           => '09123105342',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'footer_phone_number_control', array(
		'label'    => __( 'شماره تماس در فوتر', 'torobche-landing' ),
		'section'  => 'torobche_footer_section',
		'settings' => 'footer_phone_number',
		'type'     => 'text',
	) );
    $wp_customize->selective_refresh->add_partial( 'footer_phone_partial', array(
        'selector' => '#footer-phone-link', // We'll need to add an ID to the <a> tag
        'settings' => 'footer_phone_number',
        'render_callback' => function() {
            $phone = get_theme_mod('footer_phone_number', '09123105342');
            return '<a id="footer-phone-link" href="tel:' . esc_attr($phone) . '">' . esc_html($phone) . '</a>';
        },
    ));


	// Footer Email Address
	$wp_customize->add_setting( 'footer_email_address', array(
		'default'           => 'info@torobche.com',
		'sanitize_callback' => 'sanitize_email',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'footer_email_address_control', array(
		'label'    => __( 'آدرس ایمیل در فوتر', 'torobche-landing' ),
		'section'  => 'torobche_footer_section',
		'settings' => 'footer_email_address',
		'type'     => 'email',
	) );
    $wp_customize->selective_refresh->add_partial( 'footer_email_partial', array(
        'selector' => '#footer-email-link', // We'll need to add an ID to the <a> tag
        'settings' => 'footer_email_address',
        'render_callback' => function() {
            $email = get_theme_mod('footer_email_address', 'info@torobche.com');
            return '<a id="footer-email-link" href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>';
        },
    ));

	// Footer Instagram URL
	$wp_customize->add_setting( 'footer_instagram_url', array(
		'default'           => 'https://instagram.com/torobche_art',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'footer_instagram_url_control', array(
		'label'    => __( 'لینک اینستاگرام در فوتر', 'torobche-landing' ),
		'section'  => 'torobche_footer_section',
		'settings' => 'footer_instagram_url',
		'type'     => 'url',
	) );

	// Footer Telegram URL
	$wp_customize->add_setting( 'footer_telegram_url', array(
		'default'           => 'https://t.me/torobche_art',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'footer_telegram_url_control', array(
		'label'    => __( 'لینک تلگرام در فوتر', 'torobche-landing' ),
		'section'  => 'torobche_footer_section',
		'settings' => 'footer_telegram_url',
		'type'     => 'url',
	) );

	// Footer Copyright Text
	$wp_customize->add_setting( 'footer_copyright_text', array(
		'default'           => sprintf(__('© %s تمامی حقوق مادی و معنوی این وب‌سایت متعلق به فروشگاه تربچه می‌باشد.', 'torobche-landing'), date('Y')),
		'sanitize_callback' => 'wp_kses_post', // Allow basic HTML like &copy;
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'footer_copyright_text_control', array(
		'label'    => __( 'متن کپی رایت فوتر', 'torobche-landing' ),
		'section'  => 'torobche_footer_section',
		'settings' => 'footer_copyright_text',
		'type'     => 'textarea',
	) );
    $wp_customize->selective_refresh->add_partial( 'footer_copyright_partial', array(
        'selector' => '.site-info-bar p:first-child', // Target the first p in site-info-bar
        'settings' => 'footer_copyright_text',
        'render_callback' => function() { return wp_kses_post(get_theme_mod('footer_copyright_text')); },
    ) );
}
add_action( 'customize_register', 'torobche_landing_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function torobche_landing_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function torobche_landing_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function torobche_landing_customize_preview_js() {
	wp_enqueue_script( 'torobche-landing-customizer-preview', get_template_directory_uri() . '/js/customizer-preview.js', array( 'customize-preview', 'jquery' ), '1.0', true );
}
add_action( 'customize_preview_init', 'torobche_landing_customize_preview_js' );

/**
 * JS for Customizer controls.
 * To be completed later if needed for complex controls.
 */
function torobche_landing_customizer_control_js() {
	// wp_enqueue_script( 'torobche-landing-customizer-control', get_template_directory_uri() . '/js/customizer-control.js', array( 'customize-controls', 'jquery' ), '1.0', true );
}
// add_action( 'customize_controls_enqueue_scripts', 'torobche_landing_customizer_control_js' );

?>
