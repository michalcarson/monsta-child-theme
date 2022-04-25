<?php
/**
 * Astra Monsta Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/
 *
 * @author Michal Carson
 * @package Astra-monsta-child
 * @since 1.0.0
 */

/**
 * Enqueue styles
 */
function child_enqueue_styles()
{
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
}

add_action('wp_enqueue_scripts', 'child_enqueue_styles');
