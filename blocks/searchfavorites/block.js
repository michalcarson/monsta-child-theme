/*
 * This script is loaded for the block editor. Since this is a dynamic script, it only has an `edit` property.
 */
(function (blocks, element) {
    let el = element.createElement;

    blocks.registerBlockType('monsta/searchfavorites', {
        edit: function ({attributes}) {
            return el('div', {className: "monsta-searchfavorites"}, 'Items selected by the user as their favorites.');
        }
    });
})(window.wp.blocks, window.wp.element);
