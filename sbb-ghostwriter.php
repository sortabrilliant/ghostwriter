<?php
/**
 * Plugin Name: Ghostwriter
 * Plugin URI: https://sortabrilliant.com/ghostwriter/
 * Description: Static headings are boring, let’s get them moving.
 * Author: sorta brilliant
 * Author URI: https://sortabrilliant.com
 * Version: 1.0.2
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package Ghostwriter
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SBBGW_VERSION', '1.0.2' );
define( 'SBBGW_PLUGIN_DIR', dirname( __FILE__ ) );
define( 'SBBGW_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Enqueue block assets for the editor.
 *
 * @since 1.0.0
 */
function sbb_ghostwriter_editor_assets() {
	$asset_filepath = SBBGW_PLUGIN_DIR . '/build/index.asset.php';
	$asset_file     = file_exists( $asset_filepath ) ? include $asset_filepath : array(
		'dependencies' => array(),
		'version'      => SBBGW_VERSION,
	);

	wp_enqueue_script(
		'sbb_ghostwriter-block-js',
		SBBGW_PLUGIN_URL . 'build/index.js',
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);
}

add_action( 'enqueue_block_editor_assets', 'sbb_ghostwriter_editor_assets' );

/**
 * Enqueue block assets for the theme.
 *
 * @since 1.0.0
 */
function sbb_ghostwriter_scripts() {
	$asset_filepath = SBBGW_PLUGIN_DIR . '/build/sbb-ghostwriter-theme.asset.php';
	$asset_file     = file_exists( $asset_filepath ) ? include $asset_filepath : array(
		'dependencies' => array(),
		'version'      => SBBGW_VERSION,
	);

	wp_register_script(
		'sbb-ghostwriter-theme-js',
		SBBGW_PLUGIN_URL . 'build/sbb-ghostwriter-theme.js',
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);

	wp_localize_script(
		'sbb-ghostwriter-theme-js',
		'_SBB_GHOSTWRITER',
		array(
			'typedjs_options' => apply_filters(
				'sbb_ghostwriter_typedjs_options',
				array(
					'typeSpeed' => 75,
					'loop'      => true,
				)
			),
		)
	);
	wp_enqueue_script( 'sbb-ghostwriter-theme-js' );
}

add_action( 'wp_enqueue_scripts', 'sbb_ghostwriter_scripts' );
