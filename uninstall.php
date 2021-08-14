<?php
/**
 * Fired when the plugin is uninstalled and deletes database options.
 * @link              https://qubethemes.com/
 * @since             1.0.0
 * @package           Website-Verify
 */

// If uninstall not called from WordPress, then exit.
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
