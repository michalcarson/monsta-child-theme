<?php
/** Throw this in your theme and include it in your functions.php file
 * @see: https://gist.github.com/kingkool68/6d72977fe8c82eeb9a85295ac3623cde
 */

/**
 * Helper function for fetching SVG icons
 *
 * @param  string $icon  Name of the SVG file in the icons directory
 * @return string        Inline SVG markup
 */
function wp_svg_icon( $icon = '' ) {
    if ( ! $icon ) {
        return;
    }
    $path = get_template_directory() . '/assets/icons/' . $icon . '.svg';
    $args = [
        'css_class' => 'icon icon-' . $icon,
    ];
    return wp_get_svg( $path, $args );
}

/**
 * Helper function for fetching SVG logos
 *
 * @param  string $logo  Name of the SVG file in the logos directory
 * @return string        Inline SVG markup
 */
function wp_svg_logo( $logo = '' ) {
    if ( ! $logo ) {
        return;
    }
    $path = get_template_directory() . '/assets/img/logos/' . $logo . '.svg';
    $args = [
        'css_class' => 'logo logo-' . sanitize_title( $logo ),
    ];
    return wp_get_svg( $path, $args );
}

/**
 * Generic helper to modify the markup for a given path to an SVG
 *
 * @param  string $path  Absolute path to the SVG file
 * @param  array  $args  Args to modify attributes of the SVG
 * @return string        Inline SVG markup
 */
function wp_get_svg( $path = '', $args = array() ) {
    if ( ! $path ) {
        return;
    }
    $defaults = [
        'role' => 'image',
        'css_class' => '',
    ];
    $args = wp_parse_args( $args, $defaults );
    $role_attr = $args['role'];
    $css_class = $args['css_class'];
    if ( is_array( $css_class ) ) {
        $css_class = implode( ' ', $css_class );
    }
    if ( file_exists( $path ) ) {
        $svg = file_get_contents( $path );
        $svg = preg_replace( '/(width|height)="[\d\.]+"/i', '', $svg );
        $svg = str_replace( '<svg ', '<svg class="' . esc_attr( $css_class ) . '" role="' . esc_attr( $role_attr ) . '" ', $svg );
        return $svg;
    }
}
