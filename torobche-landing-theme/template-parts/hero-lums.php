<?php
/**
 * Template part for displaying the Lums-inspired Hero section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Torobche_Landing
 */

// Get values from Customizer
$hero_bg_image_url = get_theme_mod( 'hero_background_image', '' ); // Re-using existing setting for overall bg
$hero_title = get_theme_mod( 'hero_title', __( 'جادوی رنگ‌ها بر تن فرزند شما!', 'torobche-landing' ) );
// For tagline/description, let's use 'hero_description' as it's more flexible with wp_kses_post
$hero_description = get_theme_mod( 'hero_description', __( 'با لباس‌های جادویی تربچه، هر روز یک نقاشی جدید! خلاقیت بی‌پایان با رنگ‌های شاد و قابل شستشو، مخصوص هنرمندان کوچک ۲ تا ۶ ساله.', 'torobche-landing' ) );

// Main CTA (Order Button) - Re-use existing or add new specific ones
$hero_cta_text = get_theme_mod( 'hero_cta_text', __( 'لباس منو همین الان می‌خوام!', 'torobche-landing' ) );
$hero_cta_link = get_theme_mod( 'hero_cta_link', '#order-form' ); // Link to order section

// Secondary CTA (View Designs Button) - Needs new Customizer settings
$hero_secondary_cta_text = get_theme_mod( 'hero_secondary_cta_text', __( 'طرح‌ها رو ببینم!', 'torobche-landing' ) );
$hero_secondary_cta_link = get_theme_mod( 'hero_secondary_cta_link', '#gallery' ); // Link to gallery section (to be created)

$hero_product_image_url = get_theme_mod('hero_product_image', ''); // Re-using existing

$hero_section_classes = 'hero-section-lums'; // Base class for new hero
$hero_section_style_attr = '';

if (!empty($hero_bg_image_url)) {
    $hero_section_classes .= ' has-bg-image';
    $hero_section_style_attr = 'style="background-image: url(' . esc_url($hero_bg_image_url) . ');"';
}

?>
<section id="hero-lums" class="<?php echo esc_attr($hero_section_classes); ?>" <?php echo $hero_section_style_attr; ?>>
    <div class="container hero-lums-container">
        <div class="hero-lums-text-content">
            <h1 class="hero-title-lums animated-element fade-in-up delay-1"><?php echo esc_html( $hero_title ); ?></h1>
            <div class="hero-description-lums animated-element fade-in-up delay-2">
                <?php echo wp_kses_post( $hero_description ); ?>
            </div>
            <div class="hero-cta-buttons-lums animated-element fade-in-up delay-3">
                <a href="<?php echo esc_url($hero_cta_link); ?>" class="btn btn-primary-lums-hero">
                    <?php echo esc_html($hero_cta_text); ?>
                </a>
                <?php if (!empty($hero_secondary_cta_text) && !empty($hero_secondary_cta_link)) : ?>
                <a href="<?php echo esc_url($hero_secondary_cta_link); ?>" class="btn btn-secondary-lums-hero">
                    <?php echo esc_html($hero_secondary_cta_text); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="hero-lums-image-content animated-element fade-in-up delay-4">
            <?php if ( !empty($hero_product_image_url) ) : ?>
                <img src="<?php echo esc_url($hero_product_image_url); ?>" alt="<?php echo esc_attr($hero_title); // Use hero title as alt for product image if no specific alt is set ?>" class="hero-product-image-lums">
            <?php else : ?>
                <div class="hero-product-image-placeholder-lums">
                    <p><?php _e( 'تصویر محصول', 'torobche-landing' ); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
