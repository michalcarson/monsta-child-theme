/*
 * This script is loaded for the block editor. Since this is a dynamic script, it only has an `edit` property.
 */
(function (blocks, element) {
    let el = element.createElement;

    blocks.registerBlockType('monsta/cartreview', {
        edit: function ({attributes}) {
            return el('div', {className: "monsta-cartreview"}, 'Final review step of checkout before processing a payment.');
        }
    });
})(window.wp.blocks, window.wp.element);
