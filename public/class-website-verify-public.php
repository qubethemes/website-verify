<?php
/**
 * Fired when the plugin is installed.
 * This class defines all code necessary to run during the plugin's activation.
 * @link              https://qubethemes.com/
 * @since             1.0.0
 * @package           Website-Verify
 * @subpackage        Website-Verify/includes
 */


class Website_Verify_Public {

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
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_action( 'wp_head', array( $this, 'website_verify_head' ) );
        add_action( 'wp_footer', array( $this, 'website_verify_footer' ), 999);

        
	}
}