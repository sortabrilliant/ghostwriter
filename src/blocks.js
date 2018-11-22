import './editor.scss';

const { __ } = wp.i18n;
const { registerBlockStyle } = wp.blocks;

registerBlockStyle('core/heading', {
    name: 'ghostwriter',
    label: __('Ghostwriter'),
    isDefault: false,
});