/*
 * This script is loaded for the block editor. Since this is a dynamic script, it only has an `edit` property.
 */
(function (blocks, element) {
    let el = element.createElement;

    blocks.registerBlockType('monsta/cartsummary', {
        edit: function ({attributes}) {
            return el('div', {className: "monsta-cartsummary"}, 'Totals items, taxes and shipping cost for checkout.');
        }
    });
})(window.wp.blocks, window.wp.element);
