/*
 * This script is loaded for the block editor. Since this is a dynamic script, it only has an `edit` property.
 */
(function (blocks, element) {
    let el = element.createElement;

    blocks.registerBlockType('monsta/searchterms', {
        edit: function ({attributes}) {
            return el('div', {className: "monsta-searchterms"}, 'Text box for search words.');
        }
    });
})(window.wp.blocks, window.wp.element);
