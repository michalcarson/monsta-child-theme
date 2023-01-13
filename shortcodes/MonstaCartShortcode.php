<?php

class MonstaCartShortcode
{
    public function display($atts)
    {
        ob_start();
        $id = 'cart' . rand(1, 10000);

        $config = require(get_theme_file_path('/include/config.php'));
        $json = json_encode(
            array_merge(
                [
                    'widget' => 'cartsummary',
                    'target' => '#' . $id,
                    'checkout' => '/checkout',
                ],
                $config
            )
        );

        echo <<<HERE
            <div id="{$id}"></div>
            <script>
            // MonstaCartShortcode
            setTimeout(() => {
                if (typeof widgets === 'function') {
                    widgets({$json})
                } else {
                    console.log('typeof widgets = ' + typeof widgets);
                }
            }, 1000);
            </script>
HERE;

        return ob_get_clean();
    }
}
