/*
 * This script is loaded for the block editor.
 */
(function (blocks, element, blockEditor) {
    let el = element.createElement;

    blocks.registerBlockType('monsta/accordion', {
        edit: function ({attributes}) {
            const flushClass = attributes.flush ? ' accordion-flush' : '';
            const blockProps = blockEditor.useBlockProps({className: "accordion" + flushClass, id: attributes.id});
            return el(
                'div',
                blockProps,
                el(blockEditor.InnerBlocks, {
                    allowedBlocks: ["monsta/accordionitem"],
                    template: [
                        ["monsta/accordionitem", {title: "Header 1"}],
                        ["monsta/accordionitem", {title: "Header 2"}],
                        ["monsta/accordionitem", {title: "Header 3"}]
                    ],
                    renderAppender: blockEditor.InnerBlocks.ButtonBlockAppender
                })
            );
        },
        save: function ({attributes}) {
            const flushClass = attributes.flush ? ' accordion-flush' : '';
            const blockProps = blockEditor.useBlockProps.save({className: "accordion" + flushClass, id: attributes.id});
            return el(
                'div',
                blockProps,
                el(blockEditor.InnerBlocks.Content)
            );
        }
    });
})(window.wp.blocks, window.wp.element, window.wp.blockEditor);
