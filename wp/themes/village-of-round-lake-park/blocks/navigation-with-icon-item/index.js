( function ( blocks, blockEditor, components, element, i18n ) {
    const { registerBlockType } = blocks;
    const { useBlockProps, InspectorControls } = blockEditor;
    const { PanelBody, TextControl, TextareaControl, SelectControl } = components;
    const { createElement: el } = element;
    const { __ } = i18n;

    registerBlockType( 'custom/navigation-with-icon-item', {
        edit: ( props ) => {
            const { attributes, setAttributes } = props;
            const blockProps = useBlockProps();

            const iconOptions = [
                { label: 'Links', value: 'dashicons-admin-links' },
                { label: 'Info', value: 'dashicons-info' },
                { label: 'Star', value: 'dashicons-star-filled' },
                { label: 'Warning', value: 'dashicons-warning' },
                { label: 'Calendar', value: 'dashicons-calendar-alt' },
            ];

            return el('li', blockProps,
                el(InspectorControls, null,
                    el(PanelBody, { title: __( 'Settings' ) },
                        el(SelectControl, {
                            label: 'Icon',
                            value: attributes.icon,
                            options: iconOptions,
                            onChange: (icon) => setAttributes({ icon })
                        }),
                        el(TextControl, {
                            label: 'Title',
                            value: attributes.title,
                            onChange: (title) => setAttributes({ title })
                        }),
                        el(TextareaControl, {
                            label: 'Description',
                            value: attributes.description,
                            onChange: (description) => setAttributes({ description })
                        }),
                        el(TextControl, {
                            label: 'Link',
                            value: attributes.link,
                            onChange: (link) => setAttributes({ link })
                        })
                    )
                ),
                el('div', { className: 'navigation-with-icon-item-editor' },
                    el('span', { className: `dashicons ${attributes.icon}` }),
                    el(TextControl, {
                        value: attributes.title,
                        onChange: (title) => setAttributes({ title }),
                        placeholder: 'Item Title'
                    })
                )
            );
        },
        save: ( props ) => {
            const { attributes } = props;

            return el('li', { className: 'navigation-with-icon-item' },
                el('a', { href: attributes.link },
                    el('div', { className: 'flex items-center gap-2 font-bold text-primary' },
                        el('span', { className: `dashicons ${attributes.icon}` }),
                        el('span', { className: '' }, attributes.title)
                    ),
                    el('p', { className: 'font-light text-sm' }, attributes.description)
                )
            );
        }
    });
} )(
    window.wp.blocks,
    window.wp.blockEditor,
    window.wp.components,
    window.wp.element,
    window.wp.i18n
);