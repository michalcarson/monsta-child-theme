/*
 * This script is loaded for the block editor. Since this is a dynamic script, it only has an `edit` property.
 */
(function (blocks, element) {
    let el = element.createElement;

    blocks.registerBlockType('monsta/searchmap', {
        edit: function ({attributes}) {
            return el('div', {className: "monsta-searchmap"}, 'Map for narrowing search or displaying location of result items.');
        }
    });
})(window.wp.blocks, window.wp.element);
