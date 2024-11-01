<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://idea-hack.com/ultimate-gutenberg
 * @since      1.0.0
 *
 * @package    Ultimate_Gutenberg
 * @subpackage Ultimate_Gutenberg/admin
 */
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ultimate_Gutenberg
 * @subpackage Ultimate_Gutenberg/admin
 * @author     KAZUKI KIKUCHI <https://twitter.com/k_kikuchi_tw>
 */
class Ultimate_Gutenberg_Admin
{
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private  $plugin_name ;
    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private  $version ;
    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct()
    {
        $this->plugin_name = ULTIMATE_GUTENBERG_NAME;
        $this->version = ULTIMATE_GUTENBERG_VERSION;
        $this->plugin_path = ULTIMATE_GUTENBERG_PATH;
        $this->plugin_url = ULTIMATE_GUTENBERG_URL;
    }
    
    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {
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
            'fontAwesome5.9',
            plugin_dir_url( __FILE__ ) . '../library/fontawesome/css/all.min.css',
            array( $this->plugin_name ),
            $this->version,
            'all'
        );
        wp_enqueue_style(
            $this->plugin_name,
            plugin_dir_url( __FILE__ ) . 'css/ultimate-gutenberg-admin.css',
            array(),
            $this->version,
            'all'
        );
    }
    
    public function enqueue_styles_gutenberg_editor_assets()
    {
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
        // Styles.
        wp_enqueue_style(
            'ultimate_gutenberg-block-editor',
            // Handle.
            ULTIMATE_GUTENBERG_URL . 'dist/blocks.editor.build.css',
            // Block editor CSS.
            array( 'wp-edit-blocks' ),
            // Dependency to include the CSS after it.
            filemtime( ULTIMATE_GUTENBERG_PATH . '/dist/blocks.editor.build.css' )
        );
    }
    
    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {
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
        wp_enqueue_script(
            $this->plugin_name,
            plugin_dir_url( __FILE__ ) . 'js/ultimate-gutenberg-admin.js',
            array( 'jquery' ),
            $this->version,
            true
        );
        wp_add_inline_script( $this->plugin_name, $this->ug_domain_url() );
    }
    
    public function enqueue_scripts_gutenberg_editor_assets()
    {
        // ... premium only logic ...
        wp_enqueue_script(
            'ultimate_gutenberg-block',
            // Handle.
            ULTIMATE_GUTENBERG_URL . 'dist/blocks.build.js',
            // Block.build.js: We register the block here.
            array(
                'wp-blocks',
                'wp-i18n',
                'wp-element',
                'wp-components',
                'wp-editor'
            ),
            // Dependencies, defined above.
            filemtime( ULTIMATE_GUTENBERG_PATH . '/dist/blocks.build.js' )
        );
    }
    
    private function ug_domain_url()
    {
        ?>
		<script type="text/javascript">
		var ug_folder_url = '<?php 
        echo  plugin_dir_url( __FILE__ ) ;
        ?>';
		var ug_permalink = '<?php 
        the_permalink();
        ?>';
		</script>
		<?php 
    }
    
    //Freemius
    /*public function ug_set_redirect_for_freemius() {
    		$http = is_ssl() ? 'https' . '://' : 'http' . '://';
    		$url = $http . $_SERVER["HTTP_HOST"] .$_SERVER["REQUEST_URI"];
    		$redirect_url_case_1 = site_url('/wp-admin/admin.php?page=ultimate-gutenberg-info.php-pricing');
    		$redirect_url_case_2 = site_url('/wp-admin/admin.php?billing_cycle=annual&page=ultimate-gutenberg-info.php-pricing');
    		if($url == $redirect_url_case_1 || $url == $redirect_url_case_2) {
    			wp_redirect( 'https://idea-hack.com/', 301 ); exit;
    		}
    	}*/
    /**
     *
     *Add custom block category
     *
     */
    public function ug_insert_block_categories()
    {
        // Add custom block category
        add_filter(
            'block_categories',
            function ( $categories, $post ) {
            return array_merge( array( array(
                'slug'  => 'ug-block',
                'title' => __( 'Ultiamte Gutenberg - Custom Block Templates', 'ultimate-gutenberg' ),
            ) ), $categories );
        },
            10,
            2
        );
    }
    
    /**
     *
     *Add Ultimate Gutenberg Dashboard
     *
     */
    public function ug_add_dashboard_widgets()
    {
        wp_add_dashboard_widget( 'ug_dashboard_site_news', 'Developer News', array( $this, 'ug_dashboard_site_news' ) );
        wp_add_dashboard_widget( 'ug_dashboard_developer_news', 'Developer Blog', array( $this, 'ug_dashboard_developer_news' ) );
    }
    
    public function ug_dashboard_site_news()
    {
        echo  '<div class="rss-widget">' ;
        wp_widget_rss_output( array(
            'url'          => 'https://idea-hack.com/en/feed',
            'title'        => 'Developer News',
            'items'        => 3,
            'show_summary' => 1,
            'show_author'  => 0,
            'show_date'    => 1,
        ) );
        echo  '</div>' ;
    }
    
    public function ug_dashboard_developer_news()
    {
        echo  '<div class="rss-widget">' ;
        wp_widget_rss_output( array(
            'url'          => 'https://idea-hack.com/en/feed',
            'title'        => 'Developer Blog',
            'items'        => 3,
            'show_summary' => 1,
            'show_author'  => 0,
            'show_date'    => 1,
        ) );
        echo  '</div>' ;
    }
    
    public function ug_set_script_translations()
    {
        wp_set_script_translations( 'ug-wp-18n-script', 'ultimate-gutenberg', plugin_dir_path( __FILE__ ) . 'languages' );
    }

}
/**
 * Theme Information
 */
require ULTIMATE_GUTENBERG_PATH . '/admin/plugin-info.php';