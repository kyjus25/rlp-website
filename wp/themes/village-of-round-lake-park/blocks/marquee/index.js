( function ( blocks, blockEditor, components, element ) {
    const { registerBlockType } = blocks;
    const { RichText, useBlockProps } = blockEditor;
    const { TextControl } = components;
    const { createElement: el, Fragment } = element;

    registerBlockType( 'custom/marquee', {
        edit: function ( props ) {
            const { attributes, setAttributes } = props;
            const blockProps = useBlockProps();

            return el(
                Fragment,
                null,
                el('div', blockProps,
                    el(TextControl, {
                        // label: 'Heading',
                        value: attributes.heading,
                        onChange: (heading) => setAttributes({ heading }),
                        placeholder: 'Enter heading...',
                    }),
                    el(RichText, {
                        tagName: 'p',
                        value: attributes.description,
                        onChange: (description) => setAttributes({ description }),
                        placeholder: 'Enter description...',
                    })
                )
            );
        },
        save: function ( props ) {
            const { heading, description } = props.attributes;
            return el(
                'div',
                { className: 'marquee' },
                el('h1', { className: 'font-bold text-3xl mb-4 uppercase' }, heading),
                el('p', {
                    dangerouslySetInnerHTML: { __html: description },
                    className: 'text-light'
                })
            );
        },
    } );
} )(
    window.wp.blocks,
    window.wp.blockEditor,
    window.wp.components,
    window.wp.element
);