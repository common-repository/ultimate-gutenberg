<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://idea-hack.com/ultimate-gutenberg
 * @since      1.0.0
 *
 * @package    Ultimate_Gutenberg
 * @subpackage Ultimate_Gutenberg/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ultimate_Gutenberg
 * @subpackage Ultimate_Gutenberg/public
 * @author     KAZUKI KIKUCHI <https://twitter.com/k_kikuchi_tw>
 */
class Ultimate_Gutenberg_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct() {

		//$this->plugin_name = ULTIMATE_GUTENBERG_NAME;
		$this->version     = ULTIMATE_GUTENBERG_VERSION;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ultimate_Gutenberg_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ultimate_Gutenberg_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
	 	wp_enqueue_style( 'fontAwesome5.9', plugin_dir_url( __FILE__ ) . '../library/fontawesome/css/all.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'ultimate-gutenberg-custom', plugin_dir_url( __FILE__ ) . 'css/ultimate-gutenberg-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'ug_columns_responsive', plugin_dir_url( __FILE__ ) . 'css/block/ug_columns_responsive.css', array(), $this->version, 'all' );
		$ug_embed_responsive_style = "embed,iframe,object {max-width: 100%;} figure.wp-block-embed {min-width: 0px !important;}";
		wp_add_inline_style($this->plugin_name,$ug_embed_responsive_style);
		wp_enqueue_style( 'ug_embed_responsive', plugin_dir_url( __FILE__ ) . 'css/block/ug_embed_responsive.css', array(), $this->version, 'all' );
	}

	public function enqueue_styles_gutenberg_block_assets() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ultimate_Gutenberg_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ultimate_Gutenberg_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		 wp_enqueue_style(
			 'ultimate_gutenberg-style', // Handle.
			 ULTIMATE_GUTENBERG_URL . 'dist/blocks.style.build.css', // Block style CSS.
			 array(), // Dependency to include the CSS after it.
			 filemtime( ULTIMATE_GUTENBERG_PATH . '/dist/blocks.style.build.css' ) // Version: filemtime â€” Gets file modification time.(Better for Browser cache reset)
		 );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'jquery', $this->version, false );
		if ( wp_script_is( 'clipboard', 'registered' ) ) {
			wp_enqueue_script( 'clipboard', $this->version, true );
		} else {
			wp_enqueue_script( 'clipborad', plugin_dir_url( __FILE__ ) . '/library/clipboard.js/dist/clipboard.min.js', array( 'jquery' ), $this->version, true );
		}
		wp_enqueue_script( 'ultimate_gutenberg-js', plugin_dir_url( __FILE__ ) . 'js/ultimate-gutenberg-public.js', array( 'jquery','clipboard' ), $this->version, true );
		wp_add_inline_script( $this->plugin_name, $this->ug_domain_url() );
	}

	/*Gutenberg Serverside render function*/
	public function gutenberg_server_side_render() {
		if ( function_exists( 'register_block_type' ) ) {
			register_block_type( 'ug/tweet-block', array(
				'render_callback' => 'render_tweet_block',
			) );
		}
	}

	private function ug_domain_url() {
		?>
		<script type="text/javascript">
		var ug_permalink = '<?php the_permalink(); ?>';
		</script>
		<?php
	}
}
