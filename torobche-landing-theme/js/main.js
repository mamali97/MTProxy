/**
 * Main JavaScript file for Torobche Landing Page (Lums Inspired Redesign)
 *
 * This file will contain scripts for animations, sticky header, mobile menu,
 * sliders, and other interactive elements inspired by the Lums template.
 */

document.addEventListener('DOMContentLoaded', function() {

    // Placeholder for now
    console.log('Torobche Landing Page - Lums Inspired JS Loaded');

    // Example: Basic smooth scroll for on-page links (will be refined)
    // const smoothScrollLinks = document.querySelectorAll('a[href^="#"]');
    // for (let link of smoothScrollLinks) {
    //     link.addEventListener('click', function(e) {
    //         e.preventDefault();
    //         const targetId = this.getAttribute('href');
    //         const targetElement = document.querySelector(targetId);
    //         if (targetElement) {
    //             targetElement.scrollIntoView({
    //                 behavior: 'smooth'
    //             });
    //         }
    //     });
    // }

    // More scripts for Lums-like features will be added here.

    // Preloader fade out
    const preloader = document.getElementById('preloader');
    if (preloader) {
        window.addEventListener('load', function() {
            preloader.classList.add('preloader-hidden');
        });
    }

    // Sticky Header & Mobile Menu for Lums Inspired Header
    const siteHeaderLums = document.querySelector('.site-header-lums');
    const menuToggleLums = document.querySelector('.menu-toggle-lums');
    const primaryMenuLums = document.getElementById('primary-menu-lums'); // Assumes ul has this ID from wp_nav_menu

    if (siteHeaderLums) {
        const headerScrollObserver = new IntersectionObserver(
            ([e]) => e.target.classList.toggle('header-scrolled', e.intersectionRatio < 1),
            { threshold: [1] } // When 100% of the header is visible/not visible
        );
        // To make it sticky from a certain scroll point instead of initial transparency:
        // Create a dummy element at the top of the page or use a more complex scroll listener.
        // For simplicity, this example makes it change style as soon as it's not fully at the top.
        // A common way is to check window.scrollY:
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) { // Adjust 50 to your desired scroll offset
                siteHeaderLums.classList.add('header-scrolled');
            } else {
                siteHeaderLums.classList.remove('header-scrolled');
            }
        });
    }

    if (menuToggleLums && primaryMenuLums) {
        menuToggleLums.addEventListener('click', function() {
            const expanded = this.getAttribute('aria-expanded') === 'true' || false;
            this.setAttribute('aria-expanded', !expanded);
            primaryMenuLums.classList.toggle('toggled-lums');
            // Optional: Toggle body class to prevent scrolling when mobile menu is open
            // document.body.classList.toggle('mobile-menu-open-lums');
        });
    }

    // Close mobile menu when a link is clicked (for single-page navigation)
    if (primaryMenuLums) {
        const menuLinks = primaryMenuLums.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (primaryMenuLums.classList.contains('toggled-lums')) {
                    menuToggleLums.setAttribute('aria-expanded', 'false');
                    primaryMenuLums.classList.remove('toggled-lums');
                    // document.body.classList.remove('mobile-menu-open-lums');
                }
            });
        });
    }


});
