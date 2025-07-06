/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description. (from core)
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			// Check if .site-title-text exists, otherwise use .text-logo if that's the fallback
			if ( $( '.site-title-text' ).length ) {
				$( '.site-title-text' ).text( to );
			} else if ( $( '.text-logo' ).length ) {
				$( '.text-logo' ).text( to );
			}
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description-text' ).text( to );
		} );
	} );

    // Header Lums CTA Text
    wp.customize( 'header_lums_cta_text', function( value ) {
        value.bind( function( to ) {
            $( '.header-button-lums' ).text( to );
        } );
    } );

	// Hero Title
	wp.customize( 'hero_title', function( value ) {
		value.bind( function( to ) {
			$( '.hero-title-lums' ).text( to ); // Updated selector
		} );
	} );

	// Hero Tagline - Removed as new design uses hero_description for main text
	// wp.customize( 'hero_tagline', function( value ) { ... } );

	// Hero Description
	wp.customize( 'hero_description', function( value ) {
		value.bind( function( to ) {
			$( '.hero-description-lums' ).html( to ); // Updated selector
		} );
	} );

	// Hero CTA Text (Main)
	wp.customize( 'hero_cta_text', function( value ) {
		value.bind( function( to ) {
			$( '.btn-primary-lums-hero' ).text( to ); // Updated selector
		} );
	} );

    // Hero Secondary CTA Text
    wp.customize( 'hero_secondary_cta_text', function( value ) {
        value.bind( function( to ) {
            var button = $( '.btn-secondary-lums-hero' );
            if ( to ) {
                button.text( to ).show(); // Show and update text
            } else {
                button.text( to ).hide(); // Hide if empty, text(to) will clear it
            }
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
