const path = require( 'path' );
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );

module.exports = {
	...defaultConfig,

	entry: {
		...defaultConfig.entry,
		'ghstwrtr-theme': path.resolve( process.cwd(), 'src/ghstwrtr-theme.js' ),
	},
};
