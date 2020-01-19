<?php
/**
 * Plugin Name: Ghostwriter
 * Plugin URI: https://sortabrilliant.com/ghostwriter/
 * Description: Static headings are boring, let’s get them moving.
 * Author: sorta brilliant
 * Author URI: https://sortabrilliant.com
 * Version: 1.0.1
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package Ghostwriter
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SBBGW_VERSION', '1.0.1' );
define( 'SBBGW_PLUGIN_DIR', dirname( __FILE__ ) );
define( 'SBBGW_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Block Initializer.
 */
require_once SBBGW_PLUGIN_DIR . '/src/init.php';
