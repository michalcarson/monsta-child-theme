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
        echo <<<HERE
            <div id="{$id}"></div>
            <script>
                if (typeof widgets === 'function') {
                    widgets({
                        widget: 'cartstatus',
                        affiliateId: 52,
                        target: '{$id}',
                    });
                }
            </script>
HERE;
    }
}
