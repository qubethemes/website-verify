<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link              https://qubethemes.com/
 * @since             1.0.0
 * @package           Website-Verify
 * @subpackage        Website-Verify/includes
 */

class Website_Verify_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * The options of this plugin.
     *
     * @since    1.0.0
     * @access   public
     * @var      string $options The current version of this plugin.
     */
    public $options;

    /**
     * settings
     *
     * @since    1.0.0
     * @access   public
     * @var Website_Verify_Admin_Settings
     */
    public $settings;

    /**
     *
     * Construct the plugin object
     *
     * @param string $plugin_name The name of this plugin.
     * @param string $version The version of this plugin.
     * @param string $options The options of this plugin.
     * @param string $website_verify_options The version of this plugin.
     * @since    1.0.0
     */

    public function __construct($plugin_name, $version)
    {

        add_action('admin_init', array($this, 'load_dependencies'));

        add_action('admin_init', array($this, 'website_verify_admin_init'));

        add_action('admin_menu', array($this, 'website_verify_add_menu'));


        add_action('admin_enqueue_scripts', array($this, 'enqueue_styles'));

        add_filter('plugin_action_links_' . plugin_basename(WEBSITE_VERIFY_FILE), array($this, 'website_verify_settings_link'));

        $this->version = $version;

        $this->plugin_name = $plugin_name;

        $this->plugin_options = website_verify_options();


    }

    /**
     * Load dependencies
     */
    public function load_dependencies()
    {

        include_once WEBSITE_VERIFY_DIR_PATH . 'admin/class-admin-setings-abstract.php';
        include_once WEBSITE_VERIFY_DIR_PATH . 'admin/class-admin-settings.php';

        if (is_admin()) {
            $this->settings = new Website_Verify_Admin_Settings();

        }

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

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

        wp_enqueue_style($this->plugin_name, WEBSITE_VERIFY_URL . 'admin/css/website-verify-style.css', array(), $this->version, 'all');
    }

    /**
     * Create admin menu
     * Add a page to manage this plugins settings
     *
     * @since    1.0.0
     */
    public function website_verify_add_menu()
    {
        $menu_icon_svg = base64_encode(' <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
   <g id="XMLID_1_">
	   <path id="XMLID_5_" fill="#000" d="M501.7,225.7L467,183.1c-5.5-7.1-8.7-15-10.2-24.4l-6.3-54.4c-2.4-22.1-20.5-40.2-42.5-42.5
		   l-54.4-6.3c-9.5-0.8-18.1-4.7-25.2-10.2l-42.5-34.7c-17.3-14.2-42.5-14.2-59.9,0l-42.5,34.7c-7.1,5.5-15,8.7-24.4,10.2l-54.4,6.3
		   c-22.1,2.4-40.2,20.5-42.5,42.5l-6.3,54.4c-0.8,9.5-4.7,18.1-10.2,25.2l-34.7,42.5c-14.2,17.3-14.2,42.5,0,59.9l34.7,42.5
		   c5.5,7.1,8.7,15,10.2,24.4l6.3,54.4c2.4,22.1,20.5,40.2,42.5,42.5l54.4,6.3c9.5,0.8,18.1,4.7,25.2,10.2l42.5,34.7
		   c17.3,14.2,42.5,14.2,59.9,0l42.5-34.7c7.1-5.5,15-8.7,24.4-10.2l54.4-6.3c22.1-2.4,40.2-20.5,42.5-42.5l6.3-54.4
		   c0.8-9.5,4.7-18.1,10.2-25.2l34.7-42.5C515.1,268.2,515.1,243,501.7,225.7z M207.9,384L96,272.1l48-48l63.8,63.8L367.8,128l48,49.6
		   L207.9,384z"/>
   </g>
   </svg>');
        add_menu_page(__('Website Verify', 'website-verify'), 'Website Verify', 'manage_options', 'website-verify', array($this, 'website_verify_pages'), 'data:image/svg+xml;base64,' . $menu_icon_svg);
    }

    /**
     * hook into WP's admin_init action hook.
     *
     * @since    1.0.0
     */
    public function website_verify_admin_init($options)
    {
        register_setting(
            'website-verify',
            'website_verify_options',
            array($this, 'website_verify_settings_sanitize')
        );

    }

    public function website_verify_settings_sanitize($input)
    {

        $sanitary_values = array();

        if (isset($input['google_verify'])) {
            $sanitary_values['google_verify'] = sanitize_text_field($input['google_verify']);
        }

        if (isset($input['bing_verify'])) {
            $sanitary_values['bing_verify'] = sanitize_text_field($input['bing_verify']);
        }

        if (isset($input['baidu_verify'])) {
            $sanitary_values['baidu_verify'] = sanitize_text_field($input['baidu_verify']);
        }

        if (isset($input['yandex_verify'])) {
            $sanitary_values['yandex_verify'] = sanitize_text_field($input['yandex_verify']);
        }

        if (isset($input['norton_verify'])) {
            $sanitary_values['norton_verify'] = sanitize_text_field($input['norton_verify']);
        }

        if (isset($input['pinterest_verify'])) {
            $sanitary_values['pinterest_verify'] = sanitize_text_field($input['pinterest_verify']);
        }

        if (isset($input['analytics_scripts_field'])) {
            $sanitary_values['analytics_scripts_field'] = wp_kses($input['analytics_scripts_field'], array(
                'script' => array()
            ));
        }

        return $sanitary_values;
    }

    /**
     * Create Setting options
     *
     * @since    1.0.0
     */

    public function website_verify_pages()
    {
        if (!current_user_can('manage_options')) {
            wp_die(esc_attr__('You do not have sufficient permissions to access this page.', 'website-verify'));
        }

        // Render the settings template

        include_once WEBSITE_VERIFY_DIR_PATH . 'admin/partials/website-verify-admin-display.php';
    }


    /**
     * Create settings link in plugin activation page
     *
     * @since    1.0.0
     */

    public function website_verify_settings_link($links)
    {

        $settings_link = '<a href="admin.php?page=website-verify">' . __('Settings', 'website-verify') . '</a>';
        array_unshift($links, $settings_link);
        return $links;
    }
}
