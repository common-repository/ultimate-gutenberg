<?php

/**
 *
 * @link              https://idea-hack.com/ultimate-gutenberg
 * @since             1.0.0
 * @package           Ultimate_Gutenberg
 *
 * @wordpress-plugin
 * Plugin Name:       Ultimate Gutenberg - Custom Block Templates
 * Plugin URI:        https://idea-hack.com/ultimate-gutenberg
 * Description:       Improve defalut Gutenberg Blocks and add tons of beatiful custom blocks.
 * Version:           2.5.1
 * Author:            KAZUKI KIKUCHI
 * Author URI:        https://idea-hack.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ultimate-gutenberg
 * Domain Path:       /languages
 *
 *
 */
// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
    die;
}
/*------------------------------------
Freemius
-------------------------------------*/

if ( !function_exists( 'ug_fs' ) ) {
    // Create a helper function for easy SDK access.
    function ug_fs()
    {
        global  $ug_fs ;
        
        if ( !isset( $ug_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $ug_fs = fs_dynamic_init( array(
                'id'              => '2623',
                'slug'            => 'ultimate-gutenberg',
                'type'            => 'plugin',
                'public_key'      => 'pk_88a5ba7beccf2ccc0797320639562',
                'is_premium'      => false,
                'premium_suffix'  => 'premium',
                'has_addons'      => false,
                'has_paid_plans'  => true,
                'trial'           => array(
                'days'               => 7,
                'is_require_payment' => true,
            ),
                'has_affiliation' => 'customers',
                'menu'            => array(
                'slug'       => 'ultimate-gutenberg-info.php',
                'first-path' => 'admin.php?page=ultimate-gutenberg-info.php',
                'support'    => false,
            ),
                'is_live'         => true,
            ) );
        }
        
        return $ug_fs;
    }
    
    // Init Freemius.
    ug_fs();
    // Signal that SDK was initiated.
    do_action( 'ug_fs_loaded' );
}

require_once 'includes/class-ultimate-gutenberg-constants.php';
//echo Ultimate_Gutenberg_Constants::plugin_url();
/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ULTIMATE_GUTENBERG_VERSION', Ultimate_Gutenberg_Constants::plugin_version() );
/**
 * Plugin Name
 */
define( 'ULTIMATE_GUTENBERG_NAME', Ultimate_Gutenberg_Constants::plugin_name() );
/**
 * Plugin Path
 */
define( 'ULTIMATE_GUTENBERG_PATH', Ultimate_Gutenberg_Constants::plugin_path() );
/**
 * Plugin URL
 */
define( 'ULTIMATE_GUTENBERG_URL', Ultimate_Gutenberg_Constants::plugin_url() );
/**
 * Plugin TextDomain
 */
define( 'ULTIMATE_GUTENBERG_TEXT_DOMAIN', Ultimate_Gutenberg_Constants::text_domain() );
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ultimate-gutenberg-activator.php
 */
function activate_ultimate_gutenberg()
{
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-ultimate-gutenberg-activator.php';
    Ultimate_Gutenberg_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ultimate-gutenberg-deactivator.php
 */
function deactivate_ultimate_gutenberg()
{
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-ultimate-gutenberg-deactivator.php';
    Ultimate_Gutenberg_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ultimate_gutenberg' );
register_deactivation_hook( __FILE__, 'deactivate_ultimate_gutenberg' );
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ultimate-gutenberg.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ultimate_gutenberg()
{
    $plugin = new Ultimate_Gutenberg();
    $plugin->run();
}

run_ultimate_gutenberg();