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

		<?php
		// We will build the content of the landing page here directly
		// or by including template parts.

		// For now, a simple placeholder:
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				the_title('<h1>', '</h1>');
				the_content();
			endwhile;

		else :

			echo '<p>No content found.</p>';

		endif;
		?>

		<!-- Hero Section -->
		<section id="hero" class="hero-section">
			<div class="container hero-content">
				<div class="hero-text">
					<h1 class="hero-title">لباس جادویی</h1>
					<p class="hero-tagline">خلاقیت بی‌پایان، هر روز یک ماجراجویی رنگی!</p>
					<p class="hero-description">
						یک ست بلوز و شلوار خاص با طرح‌های جذاب بچه‌گانه که کودکان با ماژیک قابل شستشوی همراه آن، می‌توانند بارها و بارها آن را رنگ‌آمیزی کنند. مناسب برای سنین ۲ تا ۶ سال، بدون محدودیت جنسیتی.
					</p>
					<a href="#order-form" class="btn btn-primary hero-cta">سفارش لباس جادویی خودم</a>
				</div>
				<div class="hero-image-placeholder">
					<!-- Placeholder for an image of a child painting or a colorful outfit -->
					<!-- Using a simple background color and text for now -->
					<p>تصویر محصول</p>
				</div>
			</div>
		</section>

		<!-- Product Details & Price Section -->
		<section id="product-details" class="product-details-section">
			<div class="container">
				<h2 class="section-title">سایز و قیمت را انتخاب کنید</h2>
				<div class="product-options">
					<div class="size-selector">
						<label for="age-select">انتخاب سن (سایز):</label>
						<select name="age_select" id="age-select">
							<option value="2" data-price="870000">۲ سال</option>
							<option value="3" data-price="970000">۳ سال</option>
							<option value="4" data-price="1070000">۴ سال</option>
							<option value="5" data-price="1170000">۵ سال</option>
							<option value="6" data-price="1270000">۶ سال</option>
						</select>
					</div>
					<div class="price-display">
						<p id="price-label" style="display: none;">قیمت: <span id="product-price"></span> تومان</p>
					</div>
				</div>
				<div class="product-features">
					<h3>ویژگی‌های لباس جادویی:</h3>
					<ul>
						<li>🎨 قابلیت رنگ‌آمیزی و شستشوی مکرر</li>
						<li>👕 شامل بلوز و شلوار با طرح‌های جذاب</li>
						<li>🖍️ همراه با مجموعه ماژیک‌های قابل شستشو</li>
						<li>🧒 مناسب برای سنین ۲ تا ۶ سال</li>
						<li>⚤ بدون محدودیت جنسیتی، مناسب برای دختران و پسران</li>
						<li>🌿 پارچه با کیفیت و ضد حساسیت (پیش‌فرض، قابل تغییر)</li>
						<li>🧼 دستورالعمل شستشوی آسان</li>
					</ul>
				</div>
			</div>
		</section>

		<!-- Order Form Section -->
		<section id="order-form" class="order-form-section">
			<div class="container">
				<h2 class="section-title">فرم سفارش لباس جادویی</h2>
				<form action="#" method="POST" class="torobche-order-form">
					<div class="form-row">
						<div class="form-group">
							<label for="full_name">نام و نام خانوادگی <span class="required">*</span></label>
							<input type="text" id="full_name" name="full_name" required>
						</div>
						<div class="form-group">
							<label for="phone_number">شماره تماس <span class="required">*</span></label>
							<input type="tel" id="phone_number" name="phone_number" required>
						</div>
					</div>

					<div class="form-group">
						<label for="address">آدرس دقیق برای ارسال <span class="required">*</span></label>
						<textarea id="address" name="address" rows="3" required></textarea>
					</div>

					<div class="form-row">
						<div class="form-group">
							<label for="postal_code">کد پستی <span class="required">*</span></label>
							<input type="text" id="postal_code" name="postal_code" pattern="[0-9]{10}" title="کد پستی ۱۰ رقمی" required>
						</div>
						<div class="form-group">
							<label for="email">ایمیل (اختیاری)</label>
							<input type="email" id="email" name="email">
						</div>
					</div>

					<input type="hidden" id="selected_age_field" name="selected_age" value="2">
					<input type="hidden" id="final_price_field" name="final_price" value="870000">

					<div class="form-group form-submit-group">
						<button type="submit" class="btn btn-primary btn-submit-order">سفارش لباس جادویی خودم</button>
					</div>
					<p class="form-note">پس از ثبت سفارش، برای هماهنگی و پرداخت با شما تماس گرفته خواهد شد.</p>
				</form>
			</div>
		</section>

		<!-- Testimonials Section -->
		<section id="testimonials" class="testimonials-section">
			<div class="container">
				<h2 class="section-title">نظر مشتریان خوشحال ما</h2>
				<div class="testimonials-grid">
					<div class="testimonial-item">
						<p class="testimonial-text">"وای خدا این لباسا چقدر خوبن! دخترم عاشق رنگ کردنش شده، هر روز یه طرح جدید می‌کشه. کیفیت پارچه‌ش هم عالیه، بعد از شستشو مثل روز اول می‌مونه."</p>
						<p class="testimonial-author">- مامان آوا کوچولو (جایگزین شود)</p>
					</div>
					<div class="testimonial-item">
						<p class="testimonial-text">"پسرم همش سرش تو تبلت بود، از وقتی این لباس جادویی رو براش گرفتم کلی خلاقیتش بیشتر شده و باهاش سرگرم می‌شه. ماژیک‌هاش هم خیلی خوب و روان رنگ می‌کنن."</p>
						<p class="testimonial-author">- بابا آراد (جایگزین شود)</p>
					</div>
					<div class="testimonial-item">
						<p class="testimonial-text">"بهترین هدیه‌ای بود که می‌تونستم برای تولد خواهرزاده‌ام بگیرم. هم سرگرم‌کننده است هم آموزشی. خیلی ایده جالبیه، به همه مامانا پیشنهاد می‌کنم."</p>
						<p class="testimonial-author">- خاله سارا (جایگزین شود)</p>
					</div>
				</div>
				<p class="testimonials-note">شما هم می‌توانید پس از خرید، نظر خود را برای ما ارسال کنید!</p>
			</div>
		</section>


	</main><!-- #main -->

<?php
get_footer();
?>
