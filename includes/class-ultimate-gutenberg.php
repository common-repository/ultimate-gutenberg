<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://idea-hack.com/ultimate-gutenberg
 * @since      1.0.0
 *
 * @package    Ultimate_Gutenberg
 * @subpackage Ultimate_Gutenberg/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Ultimate_Gutenberg
 * @subpackage Ultimate_Gutenberg/includes
 * @author     KAZUKI KIKUCHI <https://twitter.com/k_kikuchi_tw>
 */
class Ultimate_Gutenberg {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Ultimate_Gutenberg_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Ultimate_Gutenberg_Loader. Orchestrates the hooks of the plugin.
	 * - Ultimate_Gutenberg_i18n. Defines internationalization functionality.
	 * - Ultimate_Gutenberg_Admin. Defines all hooks for the admin area.
	 * - Ultimate_Gutenberg_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once ULTIMATE_GUTENBERG_PATH . 'includes/class-ultimate-gutenberg-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once ULTIMATE_GUTENBERG_PATH . 'includes/class-ultimate-gutenberg-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area
		 */
		require_once ULTIMATE_GUTENBERG_PATH . 'admin/class-ultimate-gutenberg-admin.php';

		/*Gutenberg Block server side render*/
		require_once  ULTIMATE_GUTENBERG_PATH . 'includes/block-src/tweet/normal/block.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once ULTIMATE_GUTENBERG_PATH . 'public/class-ultimate-gutenberg-public.php';


		$this->loader = new Ultimate_Gutenberg_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Ultimate_Gutenberg_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Ultimate_Gutenberg_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {
		$plugin_admin = new Ultimate_Gutenberg_Admin();
		//Register Scripts
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'enqueue_block_editor_assets', $plugin_admin, 'enqueue_styles_gutenberg_editor_assets' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'enqueue_block_editor_assets', $plugin_admin, 'enqueue_scripts_gutenberg_editor_assets' );
		//For Freemius Customize
		//$this->loader->add_action( 'admin_init', $plugin_admin, 'ug_set_redirect_for_freemius' );
		//Add custom block category
		$this->loader->add_action( 'admin_init', $plugin_admin, 'ug_insert_block_categories' );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Ultimate_Gutenberg_Public();
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'enqueue_block_assets', $plugin_public, 'enqueue_styles_gutenberg_block_assets' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_action( 'init', $plugin_public, 'gutenberg_server_side_render' );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Ultimate_Gutenberg_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}
}
