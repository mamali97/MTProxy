<?php
/**
 * Torobche Theme Customizer
 *
 * @package Torobche
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function torobche_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'torobche_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'torobche_customize_partial_blogdescription',
			)
		);
	}

    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title' => __('Hero Section', 'torobche'),
        'priority' => 30,
    ));

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("hero_slide_{$i}_image", array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "hero_slide_{$i}_image", array(
            'label' => __("Slide {$i} Image", 'torobche'),
            'section' => 'hero_section',
        )));
        $wp_customize->add_setting("hero_slide_{$i}_title", array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("hero_slide_{$i}_title", array(
            'label' => __("Slide {$i} Title", 'torobche'),
            'section' => 'hero_section',
            'type' => 'text',
        ));
        $wp_customize->add_setting("hero_slide_{$i}_subtitle", array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("hero_slide_{$i}_subtitle", array(
            'label' => __("Slide {$i} Subtitle", 'torobche'),
            'section' => 'hero_section',
            'type' => 'text',
        ));
    }
}
add_action( 'customize_register', 'torobche_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function torobche_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function torobche_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function torobche_customize_preview_js() {
	wp_enqueue_script( 'torobche-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'torobche_customize_preview_js' );
