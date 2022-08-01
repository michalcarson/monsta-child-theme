<?php

class MonstaCartShortcode
{
    public function display($atts)
    {
        ob_start();
        $id = 'cart' . rand(1, 10000);

        echo <<<HERE
            <div id="{$id}"></div>
            <script>
            const getBusinessId = () => {return 11007419;} // todo: RCI Express id is hardcoded
            setTimeout(() => {
                if (typeof checkout === 'function') {
                    checkout({
                        target: '{$id}'
                    });
                } else {
                    console.log('typeof checkout = ' + typeof checkout);
                }
            }, 2000);
            </script>
HERE;

        return ob_get_clean();
    }
}
