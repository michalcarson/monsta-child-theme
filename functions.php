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

//if (!function_exists('wp_get_svg')) {
//    require(get_theme_file_path('/svg-functions.php'));
//}

/**
 * Enqueue styles
 */

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'astra-monsta-child-bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'
    );

    wp_enqueue_script(
        'astra-monsta-child-bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js',
        false,
        null,
        true
    );

    wp_enqueue_style(
        'astra-monsta-child-theme-css',
        get_stylesheet_directory_uri() . '/style.css',
        ['astra-theme-css'],
        wp_get_theme()->get('Version'),
        'all'
    );

    $baseUrl = monsta_get_baseurl();

    wp_enqueue_style(
        'monsta-inventory-css',
        $baseUrl . '/dist/inventory.css',
        false,
        wp_get_theme()->get('Version'),
        'all'
    );

    wp_enqueue_script(
        'monsta-inventory-script',
        $baseUrl . '/dist/inventory.bundle.js',
        false,
        wp_get_theme()->get('Version'),
        true
    );

    wp_enqueue_style(
        'monsta-widgets-css',
        $baseUrl . '/dist/widgets.css',
        false,
        wp_get_theme()->get('Version'),
        'all'
    );

    wp_enqueue_script(
        'monsta-widgets-script',
        $baseUrl . '/dist/widgets.bundle.js',
        false,
        wp_get_theme()->get('Version'),
        true
    );

//    wp_enqueue_style(
//        'monsta-checkout-css',
//        $baseUrl  . '/dist/checkout.css',
//        false,
//        wp_get_theme()->get('Version'),
//        'all'
//    );
//
//    wp_enqueue_script(
//        'monsta-checkout-script',
//        $baseUrl  . '/dist/checkout.bundle.js',
//        false,
//        wp_get_theme()->get('Version'),
//        true
//    );

    // The wp_localize_script below is intended to pass translations to the javascript
    // but we can also use it to pass configuration information. That information will
    // be available under a global javascript variable "monsta" with the structure
    // as created below. We can, for instance, access monsta.business.name or
    // monsta.api.url from our client-side javascript in the "view.js" files.
    $config = require(get_theme_file_path('/include/config.php'));
    wp_localize_script('monsta-widgets-script', 'monsta', ['config' => $config]);
});

add_action('widgets_init', function () {
    register_widget(new MonstaCartStatusWidget());
//    register_widget(new MonstaCartWidget());
});

add_filter('body_class', function ($classes) {
    if ( ! in_array('shopping', $classes)) {
        $classes[] = 'shopping';
    }
    return $classes;
});

add_filter('pre_option_firebase_credentials', function () {
    // plugin integrate-firebase would store the Firebase credentials in the database
    // but we keep them in the .env file where they can be managed separately and securely
    if (is_admin()) {
        // don't show the credentials in the admin interface
        return [
            'api_key' => '********',
            'auth_domain' => '********',
            'database_url' => '********',
            'project_id' => '********',
        ];
    }

    // short circuit the database option lookup by returning the credentials here
    return [
        'api_key' => getenv('FIREBASE_API_KEY'),
        'auth_domain' => getenv('FIREBASE_AUTH_DOMAIN'),
        'database_url' => getenv('FIREBASE_DB_URL') || '',
        'project_id' => getenv('FIREBASE_PROJECT'),
    ];
});

add_action('init', function () {
//    add_shortcode('monsta_cart', ['MonstaCartShortcode', 'display']);

    register_block_pattern_category('monsta', ['label' => 'MonstaCommerce']);
});

add_action('after_setup_theme', function () {
    $agp = new Astra_Global_Palette();
    $agp->support_editor_color_palette();

    /* astra removes this support */
    add_theme_support('block-templates');
    add_editor_style([
        'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'
    ]);
});

require_once(get_theme_file_path('/blocks/register-blocks.php'));

function monsta_get_baseurl()
{
    return WP_DEBUG ? 'http://localhost:8007' : 'https://ecomwidgets.com';
}
