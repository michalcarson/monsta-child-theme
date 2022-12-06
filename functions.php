<?php
/**
 * Astra Monsta Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference
 *
 * @author Michal Carson
 * @package Astra-monsta-child
 * @since 1.0.0
 */
require_once(get_theme_file_path('/shortcodes/MonstaCartShortcode.php'));
require_once(get_theme_file_path('/widgets/MonstaCartWidget.php'));
require_once(get_theme_file_path('/widgets/MonstaCartStatusWidget.php'));

/**
 * Enqueue styles
 */

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'astra-monsta-child-theme-css',
        get_stylesheet_directory_uri() . '/style.css',
        ['astra-theme-css'],
        wp_get_theme()->get('Version'),
        'all'
    );

    wp_enqueue_style(
        'monsta-inventory-css',
        'https://ecomwidgets.com/dist/inventory.css',
        false,
        wp_get_theme()->get('Version'),
        'all'
    );

    wp_enqueue_script(
        'monsta-inventory-script',
        'https://ecomwidgets.com/dist/inventory.bundle.js',
        false,
        wp_get_theme()->get('Version'),
        true
    );

    wp_enqueue_style(
        'monsta-widgets-css',
        'https://ecomwidgets.com/dist/widgets.css',
        false,
        wp_get_theme()->get('Version'),
        'all'
    );

    wp_enqueue_script(
        'monsta-widgets-script',
        'https://ecomwidgets.com/dist/widgets.bundle.js',
        false,
        wp_get_theme()->get('Version'),
        true
    );

    wp_enqueue_style(
        'monsta-checkout-css',
        'https://ecomwidgets.com/dist/checkout.css',
        false,
        wp_get_theme()->get('Version'),
        'all'
    );

    wp_enqueue_script(
        'monsta-checkout-script',
        'https://ecomwidgets.com/dist/checkout.bundle.js',
        false,
        wp_get_theme()->get('Version'),
        true
    );

    // The wp_localize_script below is intended to pass translations to the javascript
    // but we can also use it to pass configuration information. That information will
    // be available under a global javascript variable "monsta" with the structure
    // as created below. We can, for instance, access monsta.business.name or
    // monsta.api.url from our client-side javascript in the "view.js" files.
    $config = require(get_theme_file_path('/include/config.php'));
    wp_localize_script('monsta-widgets-script', 'monsta', ['config' => $config]);
});

//add_action('widgets_init', function () {
//    register_widget(new MonstaCartStatusWidget());
//    register_widget(new MonstaCartWidget());
//});

add_filter('body_class', function ($classes) {
    if ( ! in_array('shopping', $classes)) {
        $classes[] = 'shopping';
    }
    return $classes;
});

add_action( 'init', function () {
    add_shortcode( 'monsta_cart', ['MonstaCartShortcode', 'display'] );
});

add_action( 'after_setup_theme', function () {
    $agp = new Astra_Global_Palette();
    $agp->support_editor_color_palette();
} );

require_once(get_theme_file_path('/blocks/register-blocks.php'));
