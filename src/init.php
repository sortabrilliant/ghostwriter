<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue Gutenberg block assets for backend editor.
 *
 * @since 1.0.0
 */
function sbb_ghostwriter_editor_assets() {
	wp_enqueue_script(
		'sbb_ghostwriter-block-js',
		plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ),
		array( 'wp-i18n', 'wp-element', 'wp-editor', 'wp-edit-post' ),
		filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ),
		true // load in the footer
	);

	wp_enqueue_style(
		'sbb_ghostwriter-block-editor-css',
		plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ),
		array( 'wp-edit-blocks' ),
		filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' )
	);
}
add_action( 'enqueue_block_editor_assets', 'sbb_ghostwriter_editor_assets' );

function sbb_ghostwriter_scripts() {
	wp_enqueue_script(
		'sbb-typedjs',
		'//cdn.jsdelivr.net/npm/typed.js@2.0.9',
		array(),
		'2.0.9',
		true
	);
	wp_enqueue_script(
		'sbb-ghostwriter-theme-js',
		plugins_url( '/src/sbb-ghostwriter-theme.js', dirname( __FILE__ ) ),
		array( 'jquery', 'sbb-typedjs' ),
		filemtime( plugin_dir_path( __DIR__ ) . 'src/sbb-ghostwriter-theme.js' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'sbb_ghostwriter_scripts' );
