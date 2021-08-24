<?php

/**
 *
 * @link              https://qubethemes.com/
 * @since             1.0.0
 * @package           Website-Verify
 *
 * @wordpress-plugin
 * Plugin Name:       Website Verify
 * Plugin URI:        https://wordpress.org/plugins/website-verify
 * Description:       Add verification code to verify your website using Google & Other Search Engines
 * Version:           1.0.0
 * Author:            qubethemes
 * Author URI:        https://qubethemes.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       website-verify
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Current plugin version.
 */
define('WEBSITE_VERIFY_VERSION', '1.0.0');
define('WEBSITE_VERIFY_FILE', __FILE__);
define('WEBSITE_VERIFY_URL', plugin_dir_url(WEBSITE_VERIFY_FILE));
define('WEBSITE_VERIFY_DIR_PATH', plugin_dir_path(WEBSITE_VERIFY_FILE));

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-website-verify-activator.php
 */
function activate_website_verify()
{
    require_once WEBSITE_VERIFY_DIR_PATH . 'includes/class-website-verify-activator.php';
    Website_Verify_Activator::activate();
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-website-verify-deactivator.php
 */
function deactivate_website_verify()
{
    require_once WEBSITE_VERIFY_DIR_PATH . 'includes/class-website-verify-deactivator.php';
    Website_Verify_Deactivator::deactivate();
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require WEBSITE_VERIFY_DIR_PATH . 'includes/class-website-verify.php';


register_activation_hook(__FILE__, 'activate_website_verify');
register_deactivation_hook(__FILE__, 'deactivate_website_verify');


/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function website_verify()
{

    return Website_Verify::get_instance();


}

website_verify();