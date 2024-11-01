<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://idea-hack.com/ultimate-gutenberg
 * @since      1.0.0
 *
 * @package    Ultimate_Gutenberg
 * @subpackage Ultimate_Gutenberg/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ultimate_Gutenberg
 * @subpackage Ultimate_Gutenberg/includes
 * @author     KAZUKI KIKUCHI <https://twitter.com/k_kikuchi_tw>
 */
class Ultimate_Gutenberg_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ultimate-gutenberg',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
