( function ( $ ) {
    "use strict";

    $( document ).ready( function() {
        $( '.is-style-ghostwriter' ).each( function( index, element ) {
            var typedElement = $( element ).clone().attr( 'id', `heading-${index}` ).html( '<span></span>' );
            $( element ).after( typedElement );
            $( element ).hide();

            new Typed( `#heading-${index} span`, {
                strings: [ element.innerText ],
                typeSpeed: 75,
                loop: true,
            } );
        } );
    } );

} )( jQuery );