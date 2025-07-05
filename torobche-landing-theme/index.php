<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Torobche_Landing
 */

get_header(); ?>

	<main id="primary" class="site-main">

		<!-- Hero Section -->
		<?php
			$hero_bg_image_url = get_theme_mod( 'hero_background_image', '' );
			$hero_section_classes = 'hero-section fade-in-on-scroll'; // Base classes
			if (!empty($hero_bg_image_url)) {
				$hero_section_classes .= ' has-bg-image'; // Add class if background image exists
			}
			$hero_section_style = !empty($hero_bg_image_url) ? 'style="background-image: url(' . esc_url($hero_bg_image_url) . ');"' : '';
		?>
		<section id="hero" class="<?php echo esc_attr($hero_section_classes); ?>" <?php echo $hero_section_style; ?>>
			<div class="container hero-content">
				<div class="hero-text">
					<h1 class="hero-title"><?php echo esc_html( get_theme_mod( 'hero_title', __( 'لباس جادویی', 'torobche-landing' ) ) ); ?></h1>
					<p class="hero-tagline"><?php echo esc_html( get_theme_mod( 'hero_tagline', __( 'خلاقیت بی‌پایان، هر روز یک ماجراجویی رنگی!', 'torobche-landing' ) ) ); ?></p>
					<div class="hero-description">
						<?php echo wp_kses_post( get_theme_mod( 'hero_description', __( 'یک ست بلوز و شلوار خاص با طرح‌های جذاب بچه‌گانه که کودکان با ماژیک قابل شستشوی همراه آن، می‌توانند بارها و بارها آن را رنگ‌آمیزی کنند. مناسب برای سنین ۲ تا ۶ سال، بدون محدودیت جنسیتی.', 'torobche-landing' ) ) ); ?>
					</div>
					<a href="<?php echo esc_url( get_theme_mod( 'hero_cta_link', '#order-form' ) ); ?>" class="btn btn-primary hero-cta">
						<?php echo esc_html( get_theme_mod( 'hero_cta_text', __( 'سفارش لباس جادویی خودم', 'torobche-landing' ) ) ); ?>
					</a>
				</div>
				<div class="hero-image-area">
					<?php
					$hero_product_image_url = get_theme_mod('hero_product_image', '');
					if ( !empty($hero_product_image_url) ) :
					?>
						<img src="<?php echo esc_url($hero_product_image_url); ?>" alt="<?php esc_attr_e('تصویر محصول تربچه', 'torobche-landing'); ?>" class="hero-product-showcase-image">
					<?php else : ?>
						<div class="hero-image-placeholder">
							<p><?php _e( 'تصویر محصول در اینجا آپلود شود', 'torobche-landing' ); ?></p>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<!-- Product Details & Price Section -->
		<section id="product-details" class="product-details-section fade-in-on-scroll">
			<div class="container">
				<h2 class="section-title"><?php echo esc_html(get_theme_mod('product_details_title', __('سایز و قیمت را انتخاب کنید', 'torobche-landing'))); ?></h2>
				<div class="product-options">
					<div class="size-selector">
						<label for="age-select"><?php _e('انتخاب سن (سایز):', 'torobche-landing'); ?></label>
						<select name="age_select" id="age-select"
								data-base-price="<?php echo esc_attr(get_theme_mod('product_base_price_2_years', '870000')); ?>"
								data-price-increase="<?php echo esc_attr(get_theme_mod('product_price_increase_per_year', '100000')); ?>">
							<?php
								$base_age = 2;
								// Options for ages 2 to 6
								for ($age_option = 2; $age_option <= 6; $age_option++) {
									// Price calculation will be handled by JavaScript using base price and increase
									echo '<option value="' . esc_attr($age_option) . '">' . sprintf(__('%d سال', 'torobche-landing'), $age_option) . '</option>';
								}
							?>
						</select>
					</div>
					<div class="price-display">
						<?php // Removed style="display: none;" as it's now controlled by CSS class and opacity/visibility ?>
						<p id="price-label"><?php _e('قیمت:', 'torobche-landing'); ?> <span id="product-price"></span> <?php _e('تومان', 'torobche-landing'); ?></p>
					</div>
				</div>
				<div class="product-features">
					<h3><?php _e('ویژگی‌های لباس جادویی:', 'torobche-landing'); ?></h3>
					<ul>
						<?php
						$default_features = array(
							__('🎨 قابلیت رنگ‌آمیزی و شستشوی مکرر', 'torobche-landing'),
							__('👕 شامل بلوز و شلوار با طرح‌های جذاب', 'torobche-landing'),
							__('🖍️ همراه با مجموعه ماژیک‌های قابل شستشو', 'torobche-landing'),
							__('🧒 مناسب برای سنین ۲ تا ۶ سال', 'torobche-landing'),
							__('⚤ بدون محدودیت جنسیتی، مناسب برای دختران و پسران', 'torobche-landing')
						);
						for ( $i = 1; $i <= 5; $i++ ) :
							$feature_text = get_theme_mod( "product_feature_{$i}", ($i <= count($default_features) ? $default_features[$i-1] : '') );
							if ( !empty($feature_text) ) :
						?>
							<li class="staggered-fade-item"><?php echo esc_html( $feature_text ); ?></li>
						<?php
							endif;
						endfor;
						?>
					</ul>
				</div>
			</div>
		</section>

		<!-- Order Form Section -->
		<section id="order-form" class="order-form-section fade-in-on-scroll">
			<div class="container">
				<h2 class="section-title"><?php echo esc_html(get_theme_mod('order_form_title', __('فرم سفارش لباس جادویی', 'torobche-landing'))); ?></h2>
				<?php
				// Reminder: The form itself (action, fields, submission handling)
				// should ideally be managed by a dedicated form plugin like Contact Form 7 or WPForms.
				// The shortcode from the plugin would replace the <form>...</form> block below.
				// For now, we're keeping the HTML structure and making surrounding text customizable.
				?>
				<form action="#" method="POST" class="torobche-order-form">
					<div class="form-row">
						<div class="form-group">
							<label for="full_name"><?php _e('نام و نام خانوادگی', 'torobche-landing'); ?> <span class="required">*</span></label>
							<input type="text" id="full_name" name="full_name" required>
						</div>
						<div class="form-group">
							<label for="phone_number"><?php _e('شماره تماس', 'torobche-landing'); ?> <span class="required">*</span></label>
							<input type="tel" id="phone_number" name="phone_number" required>
						</div>
					</div>

					<div class="form-group">
						<label for="address"><?php _e('آدرس دقیق برای ارسال', 'torobche-landing'); ?> <span class="required">*</span></label>
						<textarea id="address" name="address" rows="3" required></textarea>
					</div>

					<div class="form-row">
						<div class="form-group">
							<label for="postal_code"><?php _e('کد پستی', 'torobche-landing'); ?> <span class="required">*</span></label>
							<input type="text" id="postal_code" name="postal_code" pattern="[0-9]{10}" title="<?php esc_attr_e('کد پستی ۱۰ رقمی', 'torobche-landing'); ?>" required>
						</div>
						<div class="form-group">
							<label for="email"><?php _e('ایمیل (اختیاری)', 'torobche-landing'); ?></label>
							<input type="email" id="email" name="email">
						</div>
					</div>

					<input type="hidden" id="selected_age_field" name="selected_age" value="">
					<input type="hidden" id="final_price_field" name="final_price" value="">

					<div class="form-group form-submit-group">
						<button type="submit" class="btn btn-primary btn-submit-order"><?php _e('سفارش لباس جادویی خودم', 'torobche-landing'); ?></button>
					</div>
					<p class="form-note"><?php echo esc_html(get_theme_mod('order_form_note', __('پس از ثبت سفارش، برای هماهنگی و پرداخت با شما تماس گرفته خواهد شد.', 'torobche-landing'))); ?></p>
				</form>
			</div>
		</section>

		<!-- Testimonials Section -->
		<section id="testimonials" class="testimonials-section fade-in-on-scroll">
			<div class="container">
				<h2 class="section-title"><?php echo esc_html(get_theme_mod('testimonials_title', __('نظر مشتریان خوشحال ما', 'torobche-landing'))); ?></h2>
				<div class="testimonials-grid">
					<?php
					$testimonials_count = 3;
					$has_testimonials = false;
					for ( $i = 1; $i <= $testimonials_count; $i++ ) :
						$text = get_theme_mod( "testimonial_text_{$i}" );
						$author = get_theme_mod( "testimonial_author_{$i}" );
						// $image = get_theme_mod( "testimonial_image_{$i}" ); // If using images

						if ( !empty($text) && !empty($author) ) :
							$has_testimonials = true;
					?>
						<div class="testimonial-item">
							<?php // if ( !empty($image) ) : ?>
								<!-- <img src="<?php // echo esc_url($image); ?>" alt="<?php // echo esc_attr($author); ?>" class="testimonial-image"> -->
							<?php // endif; ?>
							<p class="testimonial-text"><?php echo wp_kses_post( $text ); ?></p>
							<p class="testimonial-author">- <?php echo esc_html( $author ); ?></p>
						</div>
					<?php
						endif;
					endfor;

					if (!$has_testimonials) :
						// Default/placeholder testimonials if none are set in Customizer
						$default_testimonials = array(
							array(
								'text' => __('وای خدا این لباسا چقدر خوبن! دخترم عاشق رنگ کردنش شده، هر روز یه طرح جدید می‌کشه. کیفیت پارچه‌ش هم عالیه، بعد از شستشو مثل روز اول می‌مونه.', 'torobche-landing'),
								'author' => __('مامان آوا کوچولو', 'torobche-landing')
							),
							array(
								'text' => __('پسرم همش سرش تو تبلت بود، از وقتی این لباس جادویی رو براش گرفتم کلی خلاقیتش بیشتر شده و باهاش سرگرم می‌شه. ماژیک‌هاش هم خیلی خوب و روان رنگ می‌کنن.', 'torobche-landing'),
								'author' => __('بابا آراد', 'torobche-landing')
							),
							array(
								'text' => __('بهترین هدیه‌ای بود که می‌تونستم برای تولد خواهرزاده‌ام بگیرم. هم سرگرم‌کننده است هم آموزشی. خیلی ایده جالبیه، به همه مامانا پیشنهاد می‌کنم.', 'torobche-landing'),
								'author' => __('خاله سارا', 'torobche-landing')
							)
						);
						foreach ($default_testimonials as $testimonial) :
					?>
						<div class="testimonial-item">
							<p class="testimonial-text"><?php echo wp_kses_post( $testimonial['text'] ); ?></p>
							<p class="testimonial-author">- <?php echo esc_html( $testimonial['author'] ); ?></p>
						</div>
					<?php
						endforeach;
					endif;
					?>
				</div>
				<p class="testimonials-note"><?php _e('شما هم می‌توانید پس از خرید، نظر خود را برای ما ارسال کنید!', 'torobche-landing'); // This text can also be made customizable if needed ?></p>
			</div>
		</section>


	</main><!-- #main -->

<?php
get_footer();
?>
