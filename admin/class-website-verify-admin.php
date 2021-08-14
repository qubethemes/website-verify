<?php
/**
 * The admin-specific functionality of the plugin.
 * 
 * @link              https://qubethemes.com/
 * @since             1.0.0
 * @package           Website-Verify
 * @subpackage        Website-Verify/includes
 */

class Website_Verify_Admin {

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
	 * The options of this plugin.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string    $version    The current version of this plugin.
	 */
	public $options;
    public $website_verify_options;

	/**
	 * 
     * Construct the plugin object
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
     * @param      string    $options    The options of this plugin.
     * @param      string    $website_verify_options The version of this plugin.
	 */

    public function __construct($plugin_name, $version ) {

        add_action( 'admin_init', array( $this, 'website_verify_admin_init' ) );

        add_action( 'admin_menu', array( $this, 'website_verify_add_menu' ) );

        add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ) );

        //add_action( 'wp_head', array( $this, 'website_verify_head' ) );

        //add_action( 'wp_footer', array( $this, 'website_verify_footer' ), 999);

        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );

        add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'website_verify_settings_link');

        $this->version = $version;
        $this->plugin_name = $plugin_name;
        $this->plugin_options = get_option( 'website_verify_options' );

    }
    
    /**
	 * hook into WP's admin_init action hook.
	 *
	 * @since    1.0.0
	 */
    public function website_verify_admin_init( $options ) {

        $this->init_settings();
    }

    public function init_settings() {
        register_setting(
            'website_verify',
            'website_verify_options',
            array( $this, 'website_verify_sanitize' )
        );

    }
    
    /**
	 * Hook into wp after setup.
	 *
	 * @since    1.0.0
	 */
    public function after_setup_theme() {

    }

    /**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Website_verify_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WEBSITE_VERIFY_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name,  plugin_dir_url( __FILE__ ) . 'admin/css/website-verify-style.css', array(), $this->version, 'all' );

	}
    public function enqueue_scripts() {
    }

    /**
	 * Create admin menu
     * Add a page to manage this plugins settings
	 *
	 * @since    1.0.0
	 */
	public function website_verify_add_menu(){
		add_menu_page( __( 'Website Verify', 'website_verify' ), 'Website Verify', 'manage_options', 'website-verify-settings', array($this, 'website_verify_pages'), esc_url(  plugin_dir_url( __FILE__ ) . 'admin/images/icon.svg' ) );
	}
    
    /**
	 * Create Setting options
	 *
	 * @since    1.0.0
	 */

     public function website_verify_pages(){
        if( !current_user_can( 'manage_options' ) ) {
            wp_die( esc_attr__( 'You do not have sufficient permissions to access this page.' ) );
        }

        // Render the settings template
        //include( sprintf( "%s/templates/settings.php", dirname( __FILE__ ) ) );
		include Website_Verify_DIR_PATH . 'admin/partials/settings.php' ;
		
     }
    /**
	 * Create settings link in plugin activation page
	 *
	 * @since    1.0.0
	 */

     public function website_verify_settings_link( $links ) {

        $settings_link = '<a href="admin.php?page=website-verify">' . __( 'Settings', 'website_verify' ) . '</a>';
        array_unshift( $links, $settings_link );
        return $links;
    }
	/**
	 * Sanitize inputs
	 *
	 * @since    1.0.0
	 */
    
	public function website_verify_settings_sanitize( $input ) {
		$sanitary_values = array();
		if ( isset( $input['google_verify'] ) ) {
			$sanitary_values['google_verify'] = sanitize_text_field( $input['google_verify'] );
		}
		return $sanitary_values;
	}




}

