<?php
/*
Plugin Name:  Flight Status 
Plugin URI:   https://wordpress.org
Description:  Plugin to get Flight Status
Version:      1.0
Author:       EDIFYNOW
License:      GPL2
Text Domain:  EDF_TEXT_DOMAIN
*/

if ( !defined('ABSPATH' ) ) {
	die();
}
if ( !defined('EDF_TEXT_DOMAIN') ) {
	define('EDF_TEXT_DOMAIN', 'EDF_TEXT_DOMAIN');
}

if ( !defined('EDF_PLUGIN_URL') ) {
	define('EDF_TEXT_DOMAIN', plugin_dir_url( __FILE__ ) );
}

if ( !defined('EDF_PLUGIN_PATH') ) {
	define('EDF_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}

final class Edf_Flight_Status{
	private static $instance = NULL;

	private  function __construct() {
		$this->initialize_hooks();
	}

	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance= new self();
		}
		return self::$instance;
	}

	private static function initialize_hooks() {
		if ( is_admin() ) {
			require_once 'admin/admin.php';
		}
		require_once 'public/public.php';

	}


}

Edf_Flight_Status::get_instance();