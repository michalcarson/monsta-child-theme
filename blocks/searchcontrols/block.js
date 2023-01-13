/*
 * This script is loaded for the block editor. Since this is a dynamic script, it only has an `edit` property.
 */
(function (blocks, element) {
    let el = element.createElement;

    blocks.registerBlockType('monsta/searchcontrols', {
        edit: function ({attributes}) {
            return el('div', {className: "monsta-searchcontrols"}, 'Buttons to show or hide the map, category list, favorites, etc.');
        }
    });
})(window.wp.blocks, window.wp.element);
