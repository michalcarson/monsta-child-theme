/*
 * This script is loaded for the block editor. Since this is a dynamic script, it only has an `edit` property.
 */
(function (blocks, element) {
    let el = element.createElement;

    blocks.registerBlockType('monsta/cartpayment', {
        edit: function ({attributes}) {
            return el('div', {className: "monsta-cartpayment"}, 'Billing address and payment type step in checkout process.');
        }
    });
})(window.wp.blocks, window.wp.element);
