<?php
/*
 * This is the rendering function for the block. It does not run in the block editor.
 * It only runs when the block appears on a page. The main purpose is to return HTML
 * for the block but we can also perform whatever WordPress functions are necessary.
 */
function monsta_render_searchparameters($attributes)
{
    if (WP_DEBUG) {
        wp_enqueue_style(
            'monsta-searchparameters-css',
            get_stylesheet_directory_uri() . '/blocks/searchparameters/view.css',
            ['monsta-widgets-css'],
            false,
            'all'
        );

        wp_enqueue_script(
            'monsta-searchparameters-script',
            get_stylesheet_directory_uri() . '/blocks/searchparameters/view.js',
            ['monsta-widgets-script'],
            false,
            true
        );

        $wrapper_attributes = get_block_wrapper_attributes();
        return sprintf('<div id="monsta_searchparameters" %1$s></div>', $wrapper_attributes);
    }

    return '<!-- the search parameters block is disabled -->';
}
