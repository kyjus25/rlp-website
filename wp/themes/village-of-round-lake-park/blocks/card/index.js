( function ( blocks, blockEditor, components, element ) {
    const { registerBlockType } = blocks;
    const { useBlockProps, InnerBlocks } = blockEditor;
    const { TextControl, SelectControl } = components;
    const { createElement: el, Fragment } = element;

    registerBlockType( 'custom/card', {
        edit: ( props ) => {
            const { attributes, setAttributes } = props;
            const blockProps = useBlockProps();

            const iconOptions = [
                { label: 'Info', value: 'dashicons-info' },
                { label: 'Star', value: 'dashicons-star-filled' },
                { label: 'Warning', value: 'dashicons-warning' },
                { label: 'Calendar', value: 'dashicons-calendar-alt' },
            ];

            return el(Fragment, null,
                el('div', blockProps,
                    el('div', { className: 'card-header' },
                        el('span', { className: `dashicons ${attributes.icon}` }),
                        el(TextControl, {
                            label: 'Title',
                            value: attributes.title,
                            onChange: (title) => setAttributes({ title })
                        }),
                        el(SelectControl, {
                            label: 'Icon',
                            value: attributes.icon,
                            options: iconOptions,
                            onChange: (icon) => setAttributes({ icon })
                        })
                    ),
                    el('div', { className: 'card-body' },
                        el(InnerBlocks)
                    )
                )
            );
        },
        save: ( props ) => {
            const { attributes } = props;

            return el('div', { className: 'card bg-white p-8' },
                el('div', { className: 'flex items-center gap-4 font-bold uppercase text-black mb-4' },
                    el('span', { className: `dashicons ${attributes.icon} text-primary` }),
                    el('h2', null, attributes.title)
                ),
                el('div', { className: 'card-body' },
                    el(InnerBlocks.Content)
                )
            );
        }
    });
} )(
    window.wp.blocks,
    window.wp.blockEditor,
    window.wp.components,
    window.wp.element
);