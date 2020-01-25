<?php
/**
 * Plugin Name: Ghostwriter
 * Plugin URI: https://sortabrilliant.com/ghostwriter/
 * Description: Static headings are boring, let’s get them moving.
 * Author: sorta brilliant
 * Author URI: https://sortabrilliant.com
 * Version: 1.0.3
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package Ghostwriter
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'GHSTWRTR_VERSION', '1.0.3' );
define( 'GHSTWRTR_PLUGIN_DIR', dirname( __FILE__ ) );
define( 'GHSTWRTR_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Enqueue block assets for the editor.
 *
 * @since 1.0.0
 */
function ghstwrtr_editor_assets() {
	$asset_filepath = GHSTWRTR_PLUGIN_DIR . '/build/index.asset.php';
	$asset_file     = file_exists( $asset_filepath ) ? include $asset_filepath : array(
		'dependencies' => array(),
		'version'      => GHSTWRTR_VERSION,
	);

	wp_enqueue_script(
		'ghstwrtr-block-js',
		GHSTWRTR_PLUGIN_URL . 'build/index.js',
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);
}

add_action( 'enqueue_block_editor_assets', 'ghstwrtr_editor_assets' );

/**
 * Enqueue block assets for the theme.
 *
 * @since 1.0.0
 */
function ghstwrtr_scripts() {
	$asset_filepath = GHSTWRTR_PLUGIN_DIR . '/build/ghstwrtr-theme.asset.php';
	$asset_file     = file_exists( $asset_filepath ) ? include $asset_filepath : array(
		'dependencies' => array(),
		'version'      => GHSTWRTR_VERSION,
	);

	wp_register_script(
		'ghstwrtr-theme-js',
		GHSTWRTR_PLUGIN_URL . 'build/ghstwrtr-theme.js',
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);

	wp_localize_script(
		'ghstwrtr-theme-js',
		'_SBB_GHOSTWRITER',
		array(
			'typedjs_options' => apply_filters(
				'ghstwrtr_typedjs_options',
				array(
					'typeSpeed' => 75,
					'loop'      => true,
				)
			),
		)
	);
	wp_enqueue_script( 'ghstwrtr-theme-js' );
}

add_action( 'wp_enqueue_scripts', 'ghstwrtr_scripts' );
