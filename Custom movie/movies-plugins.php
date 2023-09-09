<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://restropress.com/
 * @since             1.0.0
 * @package           WPRM_Import_Export
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Movies
 * Plugin URI:        wprm_import_export
 * Description:       Adds a custom Movies post type with specified fields.
 * Version:           1.0.0
 * Author:            Bikash
 * Author URI:        https://restropress.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wprm_import_export
 * Domain Path:       /languages
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'WPRM_IMP_EXP_FILE' ) ) {
	define( 'WPRM_IMP_EXP_FILE', __FILE__ );
}

if ( ! defined( 'WPRM_IMP_EXP_DIR' ) ) {
	define( 'WPRM_IMP_EXP_DIR', plugin_dir_path( WPRM_IMP_EXP_FILE ) );
}

if ( ! defined( 'WPRM_IMP_EXP_URL' ) ) {
	define( 'WPRM_IMP_EXP_URL', plugin_dir_url( WPRM_IMP_EXP_FILE ) );
}

require WPRM_IMP_EXP_DIR . 'Includes/class-movies.php';