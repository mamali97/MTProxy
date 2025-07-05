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
					<h4 class="widget-title">تماس با تربچه</h4>
					<p><i class="footer-icon">📞</i> شماره تماس: <a href="tel:09123105342">09123105342</a></p>
					<p><i class="footer-icon">📧</i> ایمیل: <a href="mailto:info@torobche.com">info@torobche.com</a> (مثال)</p>
				</div>
				<div class="footer-widget">
					<h4 class="widget-title">ما را دنبال کنید</h4>
					<ul class="social-media-links">
						<li><a href="https://instagram.com/torobche_art" target="_blank" rel="noopener noreferrer" class="social-link instagram">
							<span class="social-icon"><!-- SVG or Font Icon for Instagram --></span> اینستاگرام @torobche_art
						</a></li>
						<li><a href="https://t.me/torobche_art" target="_blank" rel="noopener noreferrer" class="social-link telegram">
							<span class="social-icon"><!-- SVG or Font Icon for Telegram --></span> تلگرام @torobche_art
						</a></li>
					</ul>
				</div>
				<div class="footer-widget">
					<h4 class="widget-title">دسترسی سریع</h4>
					<ul class="footer-nav-links">
						<li><a href="#hero">بالای صفحه</a></li>
						<li><a href="#product-details">جزئیات محصول</a></li>
						<li><a href="#order-form">فرم سفارش</a></li>
						<li><a href="#testimonials">نظرات مشتریان</a></li>
					</ul>
				</div>
			</div>

			<div class="site-info-bar">
				<p>&copy; <?php echo date('Y'); ?> تمامی حقوق مادی و معنوی این وب‌سایت متعلق به فروشگاه تربچه می‌باشد.</p>
				<p class="theme-credit">طراحی و توسعه توسط شما با کمک Jules</p>
			</div>
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
