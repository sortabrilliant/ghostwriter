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
 * @package SB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Block Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';
