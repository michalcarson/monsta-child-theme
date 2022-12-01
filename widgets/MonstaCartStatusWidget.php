<?php

class MonstaCartStatusWidget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'monsta_cart_status',
            'Monsta Cart Status',
            'Display cart icon with counter of number of items in the cart.'
        );
    }

    public function widget($args, $instance)
    {
        $id = 'cartstatus' . rand(1, 10000);
        $checkout = get_theme_file_uri('checkout.php');

        $config = require(get_theme_file_path('/include/config.php'));
        $json = json_encode(
            array_merge(
                [
                    'widget' => 'cartstatus',
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
                    widgets({$json});
                } else {
                    console.log('typeof widgets = ' + typeof widgets);
                }
            }, 1000);
            </script>
HERE;
    }
}
