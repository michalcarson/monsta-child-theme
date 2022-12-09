/*
 * This script is loaded for the block editor.
 */
(function (blocks, element, blockEditor, components) {
    let el = element.createElement;

    blocks.registerBlockType('monsta/accordion', {
        edit: function ({attributes, setAttributes, isSelected}) {
            const toggleFlush = function () {
                setAttributes({flush: !attributes.flush});
            }
            const updateId = function (val) {
                setAttributes({id: val});
            }

            const flushClass = attributes.flush ? ' accordion-flush' : '';
            const blockProps = blockEditor.useBlockProps({className: "accordion" + flushClass, id: attributes.id});
            return el(
                'div',
                blockProps,
                [
                    el(blockEditor.InnerBlocks, {
                        allowedBlocks: ["monsta/accordionitem"],
                        template: [
                            ["monsta/accordionitem", {title: "Header 1", id: attributes.id + "One", open: true}],
                            ["monsta/accordionitem", {title: "Header 2", id: attributes.id + "Two", open: false}],
                            ["monsta/accordionitem", {title: "Header 3", id: attributes.id + "Three", open: false}]
                        ]
                    }),
                    isSelected
                        ? el('button',
                            {
                                onClick: toggleFlush,
                                className: "toggleFlush btn btn-primary"
                            },
                            (attributes.flush ? 'Not Flush' : 'Flush'))
                        : null,
                    isSelected
                        ? el(components.TextControl,
                            {
                                onChange: updateId,
                                className: "IdTextInput form-control",
                                label: 'Accordion Id',
                                value: attributes.id
                            })
                        : null
                ]
            );
        },

        save: function ({attributes}) {
            const flushClass = attributes.flush ? ' accordion-flush' : '';
            const blockProps = blockEditor.useBlockProps.save(
                {
                    className: "accordion" + flushClass,
                    id: attributes.id,
                    flush: attributes.flush
                });
            return el(
                'div',
                blockProps,
                el(blockEditor.InnerBlocks.Content)
            );
        }
    });
})(window.wp.blocks, window.wp.element, window.wp.blockEditor, window.wp.components);
