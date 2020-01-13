
const { __ } = wp.i18n;
const { registerBlockStyle } = wp.blocks;

registerBlockStyle('core/heading', {
    name: 'ghostwriter',
    label: __('Ghostwriter'),
    isDefault: false,
});

// Default heading style for resetting block.
registerBlockStyle('core/heading', {
    name: 'default',
    label: __('Default'),
    isDefault: true,
});
