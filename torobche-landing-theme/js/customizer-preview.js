/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title-text' ).text( to ); // Make sure your theme uses .site-title a or a span inside
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description-text' ).text( to ); // Make sure your theme uses .site-description
		} );
	} );

	// Hero Title
	wp.customize( 'hero_title', function( value ) {
		value.bind( function( to ) {
			$( '.hero-title' ).text( to );
		} );
	} );

	// Hero Tagline
	wp.customize( 'hero_tagline', function( value ) {
		value.bind( function( to ) {
			$( '.hero-tagline' ).text( to );
		} );
	} );

	// Hero Description
	wp.customize( 'hero_description', function( value ) {
		value.bind( function( to ) {
			// If content might have HTML, use .html() instead of .text()
			// Ensure proper sanitization (wp_kses_post on PHP side is good)
			$( '.hero-description' ).html( to );
		} );
	} );

	// Hero CTA Text
	wp.customize( 'hero_cta_text', function( value ) {
		value.bind( function( to ) {
			$( '.hero-cta' ).text( to );
		} );
	} );

	// Note: Hero CTA Link and Hero Background Image typically use 'refresh' transport
	// as live previewing URL changes or background images can be more complex
	// and might not offer significant UX benefit over a quick refresh.
	// If you wanted to preview background image with postMessage, you'd do something like:
	// wp.customize( 'hero_background_image', function( value ) {
	// 	value.bind( function( to ) {
	// 		$( '.hero-section' ).css( 'background-image', 'url(' + to + ')' );
	//          // May need to add/remove a class for overlay too if image is set/unset
	// 	} );
	// } );

	// Order Form Title
	wp.customize( 'order_form_title', function( value ) {
		value.bind( function( to ) {
			$( '#order-form .section-title' ).text( to );
		} );
	} );

	// Order Form Note
	wp.customize( 'order_form_note', function( value ) {
		value.bind( function( to ) {
			$( '.form-note' ).text( to );
		} );
	} );

	// Testimonials Section Title
	wp.customize( 'testimonials_title', function( value ) {
		value.bind( function( to ) {
			$( '#testimonials .section-title' ).text( to );
		} );
	} );

	// Note: For repeating fields like testimonials, postMessage can be complex
	// as it requires handling adding/removing/updating multiple elements.
	// 'refresh' transport is simpler for these. If you need postMessage for them,
	// you'd typically need to re-render the entire list or handle each item individually.
	// For example, for testimonial_text_1:
	// wp.customize( 'testimonial_text_1', function( value ) {
	// 	value.bind( function( to ) {
	// 		$( '.testimonials-grid .testimonial-item:nth-child(1) .testimonial-text' ).html( to );
	// 	} );
	// } );
	// wp.customize( 'testimonial_author_1', function( value ) {
	// 	value.bind( function( to ) {
	// 		$( '.testimonials-grid .testimonial-item:nth-child(1) .testimonial-author' ).text( '- ' + to );
	// 	} );
	// } );
	// ... and so on for other testimonials, which can become verbose.

	// Footer Phone Number
	wp.customize( 'footer_phone_number', function( value ) {
		value.bind( function( to ) {
			var link = $( '#footer-phone-link' );
			link.attr( 'href', 'tel:' + to ).text( to );
		} );
	} );

	// Footer Email Address
	wp.customize( 'footer_email_address', function( value ) {
		value.bind( function( to ) {
			var link = $( '#footer-email-link' );
			link.attr( 'href', 'mailto:' + to ).text( to );
		} );
	} );

	// Footer Copyright Text
	wp.customize( 'footer_copyright_text', function( value ) {
		value.bind( function( to ) {
			// Assuming the copyright is the first <p> in .site-info-bar
			$( '.site-info-bar p:first-child' ).html( to );
		} );
	} );

	// Note: Social media links (Instagram, Telegram URLs) use 'refresh' transport,
	// so they don't need postMessage handlers here.

} )( jQuery );
