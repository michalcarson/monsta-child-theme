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

        echo <<<HERE
            <div id="{$id}"></div>
            <script>
            setTimeout(() => {
                if (typeof checkout === 'function') {
                    checkout({
                        target: '{$id}'
                    });
                } else {
                    console.log('typeof checkout = ' + typeof widgets);
                }
            }, 1000);
            </script>
HERE;
    }
}
