<?php
/**
 * Define the internationalization functionality.
 * 
 * @link              https://qubethemes.com/
 * @since             1.0.0
 * @package           Website-Verify
 * @subpackage        Website-Verify/includes
 */


class Website_verify_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'website_verify',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
