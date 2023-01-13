/*
 * This script is loaded for the block editor. Since this is a dynamic script, it only has an `edit` property.
 */
(function (blocks, element) {
    let el = element.createElement;

    blocks.registerBlockType('monsta/breadcrumbs', {
        edit: function ({attributes}) {
            return el('div', {className: "monsta-breadcrumbs"}, 'Path to the current screen or category.');
        }
    });
})(window.wp.blocks, window.wp.element);
