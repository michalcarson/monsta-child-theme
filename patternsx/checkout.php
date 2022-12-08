<?php
/**
 * Title: Checkout Page
 * Slug: monsta-checkout-pattern
 * Description: Checkout page template with accordions for each step
 * Keywords: monsta, shopping, cart, checkout
 * Categories: monsta
 * Viewport Width: 800
 */
?>
<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"66.66%"} -->
    <div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:monsta/accordion -->
        <div class="wp-block-monsta-accordion accordion accordion-flush"><!-- wp:monsta/accordionitem -->
            <div class="wp-block-monsta-accordionitem accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Header 1
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                    <div class="accordion-body"><!-- wp:monsta/cartshipping /--></div>
                </div>
            </div>
            <!-- /wp:monsta/accordionitem -->

            <!-- wp:monsta/accordionitem -->
            <div class="wp-block-monsta-accordionitem accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Header 2
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                    <div class="accordion-body"><!-- wp:monsta/cartpayment /--></div>
                </div>
            </div>
            <!-- /wp:monsta/accordionitem -->

            <!-- wp:monsta/accordionitem -->
            <div class="wp-block-monsta-accordionitem accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Header 3
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                    <div class="accordion-body"><!-- wp:monsta/cartreview /--></div>
                </div>
            </div>
            <!-- /wp:monsta/accordionitem --></div>
        <!-- /wp:monsta/accordion --></div>
    <!-- /wp:column -->

    <!-- wp:column {"width":"33.33%"} -->
    <div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:monsta/cartsummary /--></div>
    <!-- /wp:column --></div>
<!-- /wp:columns -->
