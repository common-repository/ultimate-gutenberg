<?php

/**
 * The file defines global constants for the plugin
 *
 * @link       https://idea-hack.com/ultimate-gutenberg
 * @since      1.0.0
 *
 * @package    Ultimate_Gutenberg_Constants
 * @subpackage Ultimate_Gutenberg/includes
 */

/**
 * The core plugin class.
 *
 * This is used for defining constants which are used throughout plugin.
 *
 * @since      1.0.0
 * @package    Ultimate_Gutenberg
 * @subpackage Ultimate_Gutenberg/includes
 * @author     KAZUKI KIKUCHI <https://twitter.com/k_kikuchi_tw>
 */
class Ultimate_Gutenberg_Constants {

	const PLUGIN_VERSION = '2.5.1';
	//This was not available when using both premium and free.
	const PLUGIN_NAME = 'ultimate-gutenberg';

	/**
	 * Get Plugin version
	 *
	 * @return string
	 */
	public static function plugin_version() {
		return self::PLUGIN_VERSION;
	}

	/**
	 * Get Plugin name
	 *
	 * @return string
	 */
	public static function plugin_name() {
		return self::PLUGIN_NAME;
	}

	/**
	 * Get Plugin URL
	 *
	 * @return string
	 */
	public static function plugin_path() {
		//This was not available when using both premium and free.
		//return WP_PLUGIN_DIR . '/' . self::plugin_name() . '/';
		//This is available when using both premium and free.
		//â†’ output path to plugin name folder.
		$plugin_path =  plugin_dir_path( __FILE__ );
		$plugin_path =  str_replace('includes','',$plugin_path);
		return $plugin_path;
	}

	/**
	 * Get Plugin URL
	 *
	 * @return string
	 */
	public static function plugin_url() {
		return plugin_dir_url( dirname( __FILE__ ) );
	}

	/**
	 * Get Plugin TEXT DOMAIN
	 *
	 * @return string
	 */
	public static function text_domain() {
		return 'ultimate-gutenberg';
	}
}
