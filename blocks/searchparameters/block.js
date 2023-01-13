/*
 * This script is loaded for the block editor. Since this is a dynamic script, it only has an `edit` property.
 */
(function (blocks, element) {
    let el = element.createElement;

    blocks.registerBlockType('monsta/searchparameters', {
        edit: function ({attributes}) {
            return el('div', {className: "monsta-searchparameters"}, 'All parameters used to run the current search. This block is for testing and not intended for production.');
        }
    });
})(window.wp.blocks, window.wp.element);
