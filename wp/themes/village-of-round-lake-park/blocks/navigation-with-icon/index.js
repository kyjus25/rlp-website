( function ( blocks, blockEditor, element ) {
    const { registerBlockType } = blocks;
    const { useBlockProps, InnerBlocks } = blockEditor;
    const { createElement: el } = element;

    registerBlockType( 'custom/navigation-with-icon', {
        edit: ( props ) => {
            const blockProps = useBlockProps();

            return el('ul', blockProps, 
                el(InnerBlocks, { 
                    allowedBlocks: ['custom/navigation-with-icon-item'],
                    template: [ [ 'custom/navigation-with-icon-item' ] ],
                })
            );
        },
        save: ( props ) => {
            const blockProps = useBlockProps.save({ className: 'flex flex-col gap-2' });
            return el('ul', blockProps, el(InnerBlocks.Content, null));
        }
    });
} )(
    window.wp.blocks,
    window.wp.blockEditor,
    window.wp.element
);