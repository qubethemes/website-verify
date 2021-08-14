<?php

/**
 *
 * @link              https://qubethemes.com/
 * @since             1.0.0
 * @package           Website-Verify
 *
 * @wordpress-plugin
 * Plugin Name:       Website-Verify
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
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'Website_Verify_VERSION', '1.0.0' );
define( 'Website_Verify_URL', plugin_dir_url( __FILE__ ) );
define( 'Website_Verify_DIR_PATH', plugin_dir_path( __FILE__ ) );
