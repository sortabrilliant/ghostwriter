/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { registerBlockStyle } from '@wordpress/blocks';

import { Fragment } from '@wordpress/element';
import { createHigherOrderComponent } from '@wordpress/compose';
import { addFilter } from '@wordpress/hooks';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, RangeControl } from '@wordpress/components';

function addAttribute( settings ) {
	if ( 'core/heading' === settings.name ) {
		settings.attributes = {
			...settings.attributes,

			ghstwrtrSpeed: {
				type: 'number',
				default: 75,
			},
		};
	}

	return settings;
}

const withInspectorControls = createHigherOrderComponent(
	( BlockEdit ) => ( props ) => {
		const { name: blockName, attributes, setAttributes } = props;

		if ( 'core/heading' !== blockName ) {
			return ( <BlockEdit { ...props } /> );
		}

		return (
			<Fragment>
				<BlockEdit { ...props } />
				<InspectorControls>
					<PanelBody title={ __( 'Ghostwriter', 'ghstwrtr' ) }>
						<RangeControl
							label={ __( 'Type speed', 'ghstwrtr' ) }
							help={ __( 'delay in milliseconds', 'ghstwrtr' ) }
							value={ attributes.ghstwrtrSpeed }
							min={ 1 }
							max={ 1000 }
							onChange={ ( ghstwrtrSpeed ) => setAttributes( { ghstwrtrSpeed } ) }
						/>
					</PanelBody>
				</InspectorControls>
			</Fragment>
		);
	},
	'withInspectorControls'
);

function addDataAttributes( ) {
	// props.dataTypedSpeed = props.attributes.ghstwrtrSpeed;
	console.log( [ 'addDataAttributes', ...arguments ] );
	// return props;
}

addFilter(
	'blocks.registerBlockType',
	'sortabrilliant/ghstwrtr/add-attribute',
	addAttribute
);

addFilter(
	'editor.BlockEdit',
	'sortabrilliant/ghstwrtr/inspector-controls',
	withInspectorControls
);

addFilter(
	'blocks.getSaveElement',
	'sortabrilliant/ghstwrtr/add-data-attributes',
	addDataAttributes
);

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
