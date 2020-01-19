const path = require( 'path' );
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );

module.exports = {
	...defaultConfig,

	entry: {
		...defaultConfig.entry,
		'sbb-ghostwriter-theme': path.resolve( process.cwd(), 'src/sbb-ghostwriter-theme.js' ),
	},
};
