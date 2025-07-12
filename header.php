<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="keywords" content="clothing, kids, coloring, art, torobche">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class("min-h-screen relative overflow-hidden font-['Vazir', 'Arial', sans-serif]"); ?> itemscope itemtype="http://schema.org/Organization">
    <meta itemprop="name" content="<?php bloginfo('name'); ?>">
    <meta itemprop="url" content="<?php echo home_url(); ?>">
    <meta itemprop="logo" content="<?php echo esc_url(wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full')); ?>">
    <div class="fixed inset-0 -z-10">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-pink-50 to-purple-50"></div>
        <div class="absolute top-32 left-16 w-24 h-24 opacity-40">
            <svg viewBox="0 0 100 100" class="w-full h-full">
                <circle cx="50" cy="35" r="8" fill="none" stroke="#333" stroke-width="2"></circle>
                <circle cx="50" cy="35" r="8" fill="transparent" style="transition: fill 0.3s ease-in-out;"></circle>
                <circle cx="40" cy="25" r="6" fill="none" stroke="#333" stroke-width="2"></circle>
                <circle cx="40" cy="25" r="6" fill="transparent" style="transition: fill 0.3s ease-in-out;"></circle>
                <circle cx="60" cy="25" r="6" fill="none" stroke="#333" stroke-width="2"></circle>
                <circle cx="60" cy="25" r="6" fill="transparent" style="transition: fill 0.3s ease-in-out;"></circle>
                <circle cx="35" cy="40" r="6" fill="none" stroke="#333" stroke-width="2"></circle>
                <circle cx="35" cy="40" r="6" fill="transparent" style="transition: fill 0.3s ease-in-out;"></circle>
                <circle cx="65" cy="40" r="6" fill="none" stroke="#333" stroke-width="2"></circle>
                <circle cx="65" cy="40" r="6" fill="transparent" style="transition: fill 0.3s ease-in-out;"></circle>
                <line x1="50" y1="43" x2="50" y2="75" stroke="#333" stroke-width="3"></line>
                <line x1="50" y1="43" x2="50" y2="75" stroke="#333" stroke-width="3" style="transition: stroke 0.3s ease-in-out;"></line>
            </svg>
        </div>
    </div>
    <div class="fixed inset-0 backdrop-blur-sm bg-white/10 -z-5"></div>
    <header class="relative z-50 bg-white/20 backdrop-blur-md border-b border-white/20">
        <div class="w-full px-6">
            <div class="flex items-center justify-between h-20">
                <div class="flex items-center">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center text-3xl font-bold cursor-pointer hover:scale-105 transition-transform">
                        <span class="text-pink-500">T</span>
                        <span class="text-purple-500">♥</span>
                        <span class="text-blue-500">R</span>
                        <span class="text-green-500">♥</span>
                        <span class="text-yellow-500">B</span>
                        <span class="text-pink-500">C</span>
                        <span class="text-purple-500">H</span>
                        <span class="text-blue-500">E</span>
                    </a>
                </div>
                <nav class="hidden md:flex items-center space-x-12">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'flex items-center space-x-12',
                        'container'      => false,
                        'items_wrap'     => '%3$s',
                        'walker'         => new Torobche_Nav_Walker(),
                    ) );
                    ?>
                </nav>
                <div class="md:hidden">
                    <button id="menu-toggle" class="text-gray-700 hover:text-purple-600 focus:outline-none">
                        <i class="ri-menu-line text-2xl"></i>
                    </button>
                </div>
                <div class="flex items-center space-x-6">
                    <a href="https://t.me/torobche_art" class="w-10 h-10 flex items-center justify-center text-blue-500 hover:text-blue-600 cursor-pointer">
                        <i class="ri-telegram-line text-2xl"></i>
                    </a>
                    <a href="https://instagram.com/torobche_art" class="w-10 h-10 flex items-center justify-center text-pink-500 hover:text-pink-600 cursor-pointer">
                        <i class="ri-instagram-line text-2xl"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <div id="mobile-menu" class="hidden md:hidden bg-white/80 backdrop-blur-md p-6">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'menu_class'     => 'flex flex-col space-y-4',
            'container'      => false,
            'items_wrap'     => '%3$s',
        ) );
        ?>
    </div>
    <div id="content" class="site-content">
