/*
 * This script is loaded for the block editor. Since this is a dynamic script, it only has an `edit` property.
 */
(function (blocks, element) {
    let el = element.createElement;

    blocks.registerBlockType('monsta/cartlist', {
        edit: function ({attributes}) {
            return el('div', {className: "monsta-cartlist"}, 'List of items in cart with their image and details.');
        }
    });
})(window.wp.blocks, window.wp.element);
