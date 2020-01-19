/* global jQuery Typed _SBB_GHOSTWRITER */
( function( $ ) {
	'use strict';

	$( document ).ready( function() {
		$( '.is-style-ghostwriter' ).each( function( index, element ) {
			const typedElement = $( element ).clone().attr( 'id', `heading-${ index }` ).html( '<span></span>' );
			$( element ).after( typedElement );
			$( element ).hide();

			const typedDefaults = {
				strings: [ element.innerText ],
			};

			new Typed(
				`#heading-${ index } span`,
				$.extend( {}, typedDefaults, _SBB_GHOSTWRITER.typedjs_options )
			);
		} );
	} );
}( jQuery ) );
