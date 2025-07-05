<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Torobche_Landing
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container footer-container">
			<div class="footer-widgets-area">
				<div class="footer-widget">
					<h4 class="widget-title"><?php _e('تماس با تربچه', 'torobche-landing'); ?></h4>
					<?php
						$footer_phone = get_theme_mod('footer_phone_number', '09123105342');
						$footer_email = get_theme_mod('footer_email_address', 'info@torobche.com');
					?>
					<p><i class="footer-icon">📞</i> <?php _e('شماره تماس:', 'torobche-landing'); ?> <a id="footer-phone-link" href="tel:<?php echo esc_attr($footer_phone); ?>"><?php echo esc_html($footer_phone); ?></a></p>
					<p><i class="footer-icon">📧</i> <?php _e('ایمیل:', 'torobche-landing'); ?> <a id="footer-email-link" href="mailto:<?php echo esc_attr($footer_email); ?>"><?php echo esc_html($footer_email); ?></a></p>
				</div>
				<div class="footer-widget">
					<h4 class="widget-title"><?php _e('ما را دنبال کنید', 'torobche-landing'); ?></h4>
					<ul class="social-media-links">
						<?php
						$instagram_url = get_theme_mod('footer_instagram_url', 'https://instagram.com/torobche_art');
						$telegram_url = get_theme_mod('footer_telegram_url', 'https://t.me/torobche_art');
						if (!empty($instagram_url)) : ?>
						<li><a href="<?php echo esc_url($instagram_url); ?>" target="_blank" rel="noopener noreferrer" class="social-link instagram">
							<span class="social-icon"><!-- SVG or Font Icon for Instagram --></span> <?php _e('اینستاگرام @torobche_art', 'torobche-landing'); // Consider making @username dynamic too ?>
						</a></li>
						<?php endif; ?>
						<?php if (!empty($telegram_url)) : ?>
						<li><a href="<?php echo esc_url($telegram_url); ?>" target="_blank" rel="noopener noreferrer" class="social-link telegram">
							<span class="social-icon"><!-- SVG or Font Icon for Telegram --></span> <?php _e('تلگرام @torobche_art', 'torobche-landing'); // Consider making @username dynamic too ?>
						</a></li>
						<?php endif; ?>
					</ul>
				</div>
				<div class="footer-widget">
					<h4 class="widget-title"><?php _e('دسترسی سریع', 'torobche-landing'); ?></h4>
					<ul class="footer-nav-links">
						<li><a href="#hero"><?php _e('بالای صفحه', 'torobche-landing'); ?></a></li>
						<li><a href="#product-details"><?php _e('جزئیات محصول', 'torobche-landing'); ?></a></li>
						<li><a href="#order-form"><?php _e('فرم سفارش', 'torobche-landing'); ?></a></li>
						<li><a href="#testimonials"><?php _e('نظرات مشتریان', 'torobche-landing'); ?></a></li>
					</ul>
				</div>
			</div>

			<div class="site-info-bar">
				<p><?php
					$current_year = date('Y');
					$default_copyright = sprintf(__('© %s تمامی حقوق مادی و معنوی این وب‌سایت متعلق به فروشگاه تربچه می‌باشد.', 'torobche-landing'), $current_year);
					echo wp_kses_post(get_theme_mod('footer_copyright_text', $default_copyright ));
				?></p>
				<p class="theme-credit"><?php _e('طراحی و توسعه توسط شما با کمک Jules', 'torobche-landing'); ?></p>
			</div>
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
