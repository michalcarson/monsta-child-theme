<?php

class MonstaCartWidget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'monsta_cart',
            'Monsta Cart',
            'Display cart contents and begin checkout process.'
        );
    }

    public function widget($args, $instance)
    {
        $id = 'cart' . rand(1, 10000);

        $config = require(get_theme_file_path('/include/config.php'));
        $json = json_encode(
            array_merge(
                [
                    'widget' => 'cartsummary',
                    'target' => $id,
                    'checkout' => '/checkout',
                ],
                $config
            )
        );

        echo <<<HERE
            <div id="{$id}"></div>
            <script>
            setTimeout(() => {
                if (typeof widgets === 'function') {
                    widgets({$json})
                } else {
                    console.log('typeof widgets = ' + typeof widgets);
                }
            }, 1000);
            </script>
HERE;
    }
}
