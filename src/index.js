
import { __ } from '@wordpress/i18n';
import { registerBlockStyle } from '@wordpress/blocks';

registerBlockStyle( 'core/heading', {
	name: 'ghostwriter',
	label: __( 'Ghostwriter', 'ghstwrtr' ),
	isDefault: false,
} );

// Default heading style for resetting block.
registerBlockStyle( 'core/heading', {
	name: 'default',
	label: __( 'Default', 'ghstwrtr' ),
	isDefault: true,
} );
