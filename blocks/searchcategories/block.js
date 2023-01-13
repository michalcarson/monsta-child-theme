/*
 * This script is loaded for the block editor. Since this is a dynamic script, it only has an `edit` property.
 */
(function (blocks, element) {
    let el = element.createElement;

    blocks.registerBlockType('monsta/searchcategories', {
        edit: function ({attributes}) {
            return el('div', {className: "monsta-searchcategories"}, 'List of categories to select which will filter search results.');
        }
    });
})(window.wp.blocks, window.wp.element);
