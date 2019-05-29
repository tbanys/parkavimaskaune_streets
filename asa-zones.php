<?php 
/**
 * @package asaZones
 */

/*
Plugin Name: Asa zones Plugin
Plugin URI: tbanys.com
Description: Parkavimo zonos pagal adresus Kauno mieste
Version: 1.0.0
Author: Tautvydas Banys
License: GPLv2 or later
Text Domain: asa-zones
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

// Require once the Composer Autoload
if( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
  require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activate_asa_zones() {
	Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_asa_zones' );

/**
 * The code that runs during plugin deactivation
 */
function deactivate_asa_zones() {
	Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_asa_zones' );

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists('Inc\\Init') ) {
  Inc\Init::register_services();
}