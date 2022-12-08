<?php
/**
 * Register blocks for the Monsta Child theme
 */

add_action('init', function () {
    /*
     * Javascript blocks are rendered only on the UI
     */
    $javascript_blocks = [
        'accordion',
        'accordionitem',
    ];

    foreach ($javascript_blocks as $javascript_block) {
        register_block_type(
            __DIR__ . '/' . $javascript_block
        );
    }

    /* Dynamic blocks are rendered server-side using a PHP file.
     *
     * register_block_type will cause WordPress to read the block configuration from
     * it's `block.json` file. This file gives WordPress the information it needs to
     * render the block in the block editor.
     *
     * Additionally, we will "require" a `view.php` file for each block. This file
     * must contain the rendering function named "monsta_render_[block name]". That
     * function can enqueue scripts and stylesheets as well as return the block
     * content.
     *
     * So for the shopping cart status block, we will look for a `block.json` and a
     * `view.php` in a directory named "cartstatus" and we will expect the PHP file
     * to contain a function named "monsta_render_cartstatus".
     *
     */
    $dynamic_blocks = [
        'cartlist',
        'cartpayment',
        'cartreview',
        'cartshipping',
        'cartstatus',
        'cartsummary',
    ];

    foreach ($dynamic_blocks as $dynamic_block) {
        require_once(get_theme_file_path('/blocks/' . $dynamic_block . '/view.php'));

        register_block_type(
            __DIR__ . '/' . $dynamic_block,
            [
                'render_callback' => 'monsta_render_' . str_replace('-', '_', $dynamic_block)
            ]
        );
    }
});

add_filter('block_categories_all', function ($block_categories, $editor_context) {
    /*
     * Set up our own category for blocks within the Block Editor. Then all of
     * our blocks can appear within a "MonstaCommerce" grouping and we don't
     * need to have "Monsta" as a prefix on all of them.
     */
    if ( ! empty($editor_context->post)) {
        $block_categories[] = [
            'slug' => 'monsta',
            'title' => 'MonstaCommerce',
            'icon' => null,
        ];
    }
    return $block_categories;
}, 10, 2);
