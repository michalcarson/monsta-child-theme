/*
 * This script is loaded for the block editor.
 */
(function (blocks, element, blockEditor) {
    const el = element.createElement;
    const InnerBlocks = blockEditor.InnerBlocks;
    const useBlockProps = blockEditor.useBlockProps;

    const render = function (attributes, parentId, blockProps, saving) {
        const button = el(
            'button', {
                className: "accordion-button",
                type: "button",
                "data-bs-toggle": "collapse",
                "data-bs-target": "#collapseOne",
                "aria-expanded": "true",
                "aria-controls": "collapseOne"
            },
            attributes.title
        );
        const header = el('h2', {className: "accordion-header", id: "headingOne"}, button);

        let innerContent = 'this completely failed';
        const innerDivProps = {className: "accordion-body"};

        if (saving) {
            innerContent = el(InnerBlocks.Content);
        } else {
            innerContent = el(InnerBlocks);
            innerDivProps.renderAppender = InnerBlocks.ButtonBlockAppender;
            innerDivProps.placeholder = "this is a placeholder";
        }

        const innerDiv = el('div', innerDivProps, innerContent);
        const body = el('div', {
            id: "collapseOne",
            className: "accordion-collapse collapse" + (attributes.open ? ' show' : ''),
            "aria-labelledby": "headingOne",
            "data-bs-parent": parentId
        }, innerDiv);

        return el('div', blockProps, [header, body]);
    }

    blocks.registerBlockType('monsta/accordionitem', {
        edit: function ({attributes, context}) {
            const parentId = context['monsta/accordion/parentId'];
            const blockProps = useBlockProps({className: "accordion-item"});
            return render(attributes, parentId, blockProps, false);
        },
        save: function ({attributes}) {
            const parentId = attributes.parentId;
            const blockProps = useBlockProps.save({className: "accordion-item"});
            return render(attributes, parentId, blockProps, true);
        }
    });
})(window.wp.blocks, window.wp.element, window.wp.blockEditor);
