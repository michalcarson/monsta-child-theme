/*
 * This script is loaded for the block editor. Since this is a dynamic script, it only has an `edit` property.
 */
(function (blocks, element) {
    let el = element.createElement;

    blocks.registerBlockType('monsta/cartshipping', {
        edit: function ({attributes}) {
            return el('div', {className: "monsta-cartshipping"}, 'Shipping address and carrier selection step of checkout.');
        }
    });
})(window.wp.blocks, window.wp.element);
