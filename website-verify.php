<?php

/**
 *
 * @link              https://qubethemes.com/
 * @since             1.0.0
 * @package           Website-Verify
 *
 * @wordpress-plugin
 * Plugin Name:       Website Verify
 * Plugin URI:        https://qubethemes.com/
 * Description:       Add verification code to verify your website using Google.
 * Version:           1.0.0
 * Author:            qubethemes
 * Author URI:        https://profiles.wordpress.org/qubethemes
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       website-verify
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}

/**
 * Current plugin version.
 */
define( 'Website_Verify_VERSION', '1.0.0' );
define( 'Website_Verify_URL', plugin_dir_url( __FILE__ ) );
define( 'Website_Verify_DIR_PATH', plugin_dir_path( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-website-verify-activator.php
 */
function activate_website_verify() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-website-verify-activator.php';
	Website_Verify_Activator::activate();
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-website-verify-deactivator.php
 */
function deactivate_website_verify() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-website-verify-deactivator.php';
	Website_Verify_Deactivator::deactivate();
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-website-verify.php';


register_activation_hook( __FILE__, 'activate_website_verify' );
register_deactivation_hook( __FILE__, 'deactivate_website_verify' );


/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function website_verify() {

return Website_Verify::get_instance();


}
website_verify();