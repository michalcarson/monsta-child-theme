/*
 * This script is loaded for the block editor.
 */
(function (blocks, element, blockEditor, components) {
    const el = element.createElement;
    const InnerBlocks = blockEditor.InnerBlocks;
    const useBlockProps = blockEditor.useBlockProps;

    const renderHeader = function (attributes) {
        const button = el(
            'button', {
                className: "accordion-button" + (attributes.open ? '' : ' collapsed'),
                type: "button",
                "data-bs-toggle": "collapse",
                "data-bs-target": "#" + attributes.id,
                "aria-expanded": (attributes.open ? 'true' : 'false'),
                "aria-controls": attributes.id
            },
            attributes.title
        );
        return el('h2', {className: "accordion-header", id: "heading" + attributes.id}, button);
    }

    const renderBody = function (attributes, parentId, saving) {
        let innerContent = 'this completely failed';
        const innerDivProps = {className: "accordion-body"};

        if (saving) {
            innerContent = el(InnerBlocks.Content);
        } else {
            innerContent = el(InnerBlocks, {
                // renderAppender: InnerBlocks.ButtonBlockAppender,
                placeholder: "this is the other placeholder"
            });
        }

        const innerDiv = el('div', innerDivProps, innerContent);
        return el('div', {
            id: attributes.id,
            className: "accordion-collapse collapse" + (attributes.open ? ' show' : ''),
            "aria-labelledby": "heading" + attributes.id,
            "data-bs-parent": "#" + parentId
        }, innerDiv);
    }

    blocks.registerBlockType('monsta/accordionitem', {
        parent: ['monsta/accordion'],
        usesContext: ['monsta/accordionParentId'],
        edit: function ({attributes, context, setAttributes, isSelected, clientId}) {

            const toggleOpen = function () {
                setAttributes({open: !attributes.open});
            }
            const updateHeading = function (val) {
                setAttributes({title: val});
            }
            const updateId = function (val) {
                setAttributes({id: val});
            }

            const parentId = context['monsta/accordionParentId'];
            setAttributes({parentId: parentId});

            const blockProps = useBlockProps(
                {
                    className: "accordion-item",
                    key: attributes.id,
                    open: attributes.open,
                });

            return el('div', blockProps, [
                renderHeader(attributes),
                renderBody(attributes, parentId, false),
                isSelected
                    ? el('button',
                        {
                            onClick: toggleOpen,
                            className: "toggleOpen btn btn-primary"
                        },
                        (attributes.open ? 'Click to start closed' : 'Click to start open'))
                    : null,
                isSelected
                    ? el(components.TextControl,
                        {
                            onChange: updateHeading,
                            className: "IdTextInput form-control",
                            label: 'Accordion Item Heading',
                            value: attributes.title
                        })
                    : null,
                isSelected
                    ? el(components.TextControl,
                        {
                            onChange: updateId,
                            className: "IdTextInput form-control",
                            label: 'Accordion Item Id',
                            value: attributes.id
                        })
                    : null
            ]);
        },

        save: function ({attributes}) {
            const parentId = (attributes.parentId && attributes.parentId.replace)
                ? attributes.parentId.replace('#', '')
                : attributes.parentId;
            const blockProps = useBlockProps.save(
                {
                    className: "accordion-item",
                    key: attributes.id,
                    open: attributes.open,
                });

            return el('div', blockProps, [
                renderHeader(attributes),
                renderBody(attributes, parentId, true)
            ]);
        }
    });
})(window.wp.blocks, window.wp.element, window.wp.blockEditor, window.wp.components);
