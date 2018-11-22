( function ( $ ) {
    "use strict";

    $( document ).ready( function() {
        $( '.is-style-ghostwriter' ).each( function( index, element ) {
            var typedElement = $( element ).clone().attr( 'id', `heading-${index}` ).html( '<span></span>' );
            $( element ).after( typedElement );
            $( element ).hide();
            
            var typedDefaults = {
                strings: [ element.innerText ]
            };

            new Typed(
                `#heading-${index} span`,
                $.extend( {}, typedDefaults, _SBB_GHOSTWRITER.typedjs_options )
            );
        } );
    } );

} )( jQuery );