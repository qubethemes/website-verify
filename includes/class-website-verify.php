<?php
/**
 * The file defines the core plugin class
 *
 * @link              https://qubethemes.com/
 * @since             1.0.0
 * @package           Website-Verify
 * @subpackage        Website-Verify/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 */
class Website_Verify
{

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      Website_Verify_Loader $loader Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string $plugin_name The string used to uniquely identify this plugin.
     */
    protected $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string $version The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    1.0.0
     */

    private static $instance = null;

    /**
     * @var Website_Verify_Admin
     */
    public $admin = null;


    public static function get_instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self;
        } else if (self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function __construct()
    {
        if (defined('WEBSITE_VERIFY_VERSION')) {
            $this->version = WEBSITE_VERIFY_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'website_verify';

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->run();


    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Website_Verify_Loader. Orchestrates the hooks of the plugin.
     * - Website_Verify_i18n. Defines internationalization functionality.
     * - Website_Verify_Admin. Defines all hooks for the admin area.
     * - Website_Verify_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function load_dependencies()
    {

        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once WEBSITE_VERIFY_DIR_PATH . 'includes/functions.php';


        require_once WEBSITE_VERIFY_DIR_PATH . 'includes/class-website-verify-loader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once WEBSITE_VERIFY_DIR_PATH . 'includes/class-website-verify-i18n.php';

        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        if (is_admin()) {
            require_once WEBSITE_VERIFY_DIR_PATH . 'admin/class-website-verify-admin.php';
        }

        require_once WEBSITE_VERIFY_DIR_PATH . 'includes/class-website-verify-frontend.php';

        $this->loader = new Website_Verify_Loader();

    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the Website_Verify_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function set_locale()
    {

        $plugin_i18n = new Website_Verify_i18n();

        $this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');

    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_admin_hooks()
    {

        if (is_admin()) {

            $this->admin = new Website_Verify_Admin($this->get_plugin_name(), $this->get_version());

            $this->loader->add_action('admin_enqueue_scripts', $this->admin, 'enqueue_styles');
        }

    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.0.0
     */
    public function run()
    {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @return    string    The name of the plugin.
     * @since     1.0.0
     */
    public function get_plugin_name()
    {
        return $this->plugin_name;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @return    Website_Verify_Loader    Orchestrates the hooks of the plugin.
     * @since     1.0.0
     */
    public function get_loader()
    {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @return    string    The version number of the plugin.
     * @since     1.0.0
     */
    public function get_version()
    {
        return $this->version;
    }

}
