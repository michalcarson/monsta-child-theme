<?php
/**
 * Checkout page with each step in an accordion div
 */
return [
    'title' => 'Checkout Page',
    'description' => 'Checkout page template with accordions for each step',
    'keywords' => ['monsta', 'shopping', 'cart', 'checkout'],
    'categories' => ['monsta'],
    'viewportWidth' => 800,
    'content' => '
<!-- wp:columns -->
<div class="wp-block-columns">

    <!-- wp:column {"width":"66.66%"} -->
    <div class="wp-block-column" style="flex-basis:66.66%">

        <!-- wp:advgb/accordions {"headerBgColor":"var(\u002d\u002dast-global-color-4)","headerTextColor":"var(\u002d\u002dast-global-color-0)","headerIcon":"arrowDown","headerIconColor":"var(\u002d\u002dast-global-color-0)","changed":true,"rootBlockId":"0ce75cca-8497-4000-9722-8c1eedcb3338"} -->
        <div class="wp-block-advgb-accordions advgb-accordion-wrapper">
            <!-- wp:advgb/accordion-item {"header":"Shipping","headerBgColor":"var(\u002d\u002dast-global-color-4)","headerTextColor":"var(\u002d\u002dast-global-color-0)","headerIcon":"arrowDown","headerIconColor":"var(\u002d\u002dast-global-color-0)","changed":true,"rootBlockId":"0ce75cca-8497-4000-9722-8c1eedcb3338","advgbBlockControls":[]} -->
            <div class="wp-block-advgb-accordion-item advgb-accordion-item" style="margin-bottom:15px">
                <div class="advgb-accordion-header"
                     style="background-color:var(--ast-global-color-4);color:var(--ast-global-color-0);border-style:solid;border-width:1px;border-radius:2px">
                    <span class="advgb-accordion-header-icon">
                        <svg fill="var(--ast-global-color-0)" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path opacity="0.87" fill="none" d="M24,24H0L0,0l24,0V24z"></path>
                            <path d="M16.59,8.59L12,13.17L7.41,8.59L6,10l6,6l6-6L16.59,8.59z"></path>
                        </svg>
                    </span>
                    <h4 class="advgb-accordion-header-title" style="color:inherit">
                        Shipping
                    </h4>
                </div>
                <div class="advgb-accordion-body"
                     style="border-style:solid !important;border-width:1px !important;border-top:none !important;border-radius:2px !important">
                    <!-- wp:monsta/cartshipping /-->
                </div>
            </div>
            <!-- /wp:advgb/accordion-item -->

            <!-- wp:advgb/accordion-item {"header":"Payment","headerBgColor":"var(\u002d\u002dast-global-color-4)","headerTextColor":"var(\u002d\u002dast-global-color-0)","headerIcon":"arrowDown","headerIconColor":"var(\u002d\u002dast-global-color-0)","changed":true,"rootBlockId":"0ce75cca-8497-4000-9722-8c1eedcb3338","advgbBlockControls":[]} -->
            <div class="wp-block-advgb-accordion-item advgb-accordion-item" style="margin-bottom:15px">
                <div class="advgb-accordion-header"
                     style="background-color:var(--ast-global-color-4);color:var(--ast-global-color-0);border-style:solid;border-width:1px;border-radius:2px">
                    <span class="advgb-accordion-header-icon">
                        <svg fill="var(--ast-global-color-0)" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path opacity="0.87" fill="none" d="M24,24H0L0,0l24,0V24z"></path>
                            <path d="M16.59,8.59L12,13.17L7.41,8.59L6,10l6,6l6-6L16.59,8.59z"></path>
                        </svg>
                    </span>
                    <h4 class="advgb-accordion-header-title" style="color:inherit">
                        Payment
                    </h4>
                </div>
                <div class="advgb-accordion-body"
                     style="border-style:solid !important;border-width:1px !important;border-top:none !important;border-radius:2px !important">
                    <!-- wp:monsta/cartpayment /-->
                </div>
            </div>
            <!-- /wp:advgb/accordion-item -->

            <!-- wp:advgb/accordion-item {"header":"Review","headerBgColor":"var(\u002d\u002dast-global-color-4)","headerTextColor":"var(\u002d\u002dast-global-color-0)","headerIcon":"arrowDown","headerIconColor":"var(\u002d\u002dast-global-color-0)","changed":true,"rootBlockId":"0ce75cca-8497-4000-9722-8c1eedcb3338","advgbBlockControls":[]} -->
            <div class="wp-block-advgb-accordion-item advgb-accordion-item" style="margin-bottom:15px">
                <div class="advgb-accordion-header"
                     style="background-color:var(--ast-global-color-4);color:var(--ast-global-color-0);border-style:solid;border-width:1px;border-radius:2px">
                    <span class="advgb-accordion-header-icon">
                        <svg fill="var(--ast-global-color-0)" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path opacity="0.87" fill="none" d="M24,24H0L0,0l24,0V24z"></path>
                            <path d="M16.59,8.59L12,13.17L7.41,8.59L6,10l6,6l6-6L16.59,8.59z"></path>
                        </svg>
                    </span>
                    <h4 class="advgb-accordion-header-title" style="color:inherit">
                        Review
                    </h4>
                </div>
                <div class="advgb-accordion-body"
                     style="border-style:solid !important;border-width:1px !important;border-top:none !important;border-radius:2px !important">
                    <!-- wp:monsta/cartreview /-->
                </div>
            </div>
            <!-- /wp:advgb/accordion-item -->
        </div>
        <!-- /wp:advgb/accordions -->

    </div>
    <!-- /wp:column -->

    <!-- wp:column {"width":"33.33%"} -->
    <div class="wp-block-column" style="flex-basis:33.33%">
        <!-- wp:monsta/cartsummary /-->
    </div>
    <!-- /wp:column -->

</div>
<!-- /wp:columns -->'
    ];
