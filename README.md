## Typed.js Options
See the available options in the [typed.js docs](https://github.com/mattboldt/typed.js/#customization).

Default options:
```
{
    strings: [ targetHeading.innerText ],
    typeSpeed: 75,
    loop: true
}
```

You can customize these options with the `sbb_ghostwriter_typedjs_options` filter. Example:

```
add_filter( 'sbb_ghostwriter_typedjs_options', function( $options ) {
    $options[ 'typeSpeed' ] = 25;
    return $options;
} );
```

## Where can I learn more?
Learn more at [sorta brilliant](https://sortabrilliant.com/ghostwriter/).