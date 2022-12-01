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
                ['target' => $id],
                $config
            )
        );

        echo <<<HERE
            <div id="{$id}"></div>
            <script>
            const getBusinessId = () => {return {$config['businessId']};}
            setTimeout(() => {
                if (typeof checkout === 'function') {
                    checkout({$json});
                } else {
                    console.log('typeof checkout = ' + typeof checkout);
                }
            }, 2000);
            </script>
HERE;

        return ob_get_clean();
    }
}
