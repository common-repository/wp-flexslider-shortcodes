<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://media-store.net
 * @since      2.1.1
 *
 * @package    wp_flexslider_shortcodes
 * @subpackage wp_flexslider_shortcodes/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      2.1.1
 * @package    wp_flexslider_shortcodes
 * @subpackage wp_flexslider_shortcodes/includes
 * @author     Artur Voll <kontakt@media-store.net>
 */
class wp_flexslider {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    2.1.1
	 * @access   protected
	 * @var      wp_flexslider_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    2.1.1
	 * @access   protected
	 * @var      string    $wp_flexslider    The string used to uniquely identify this plugin.
	 */
	protected $wp_flexslider;

	/**
	 * The current version of the plugin.
	 *
	 * @since    2.1.1
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    2.1.1
	 */
	public function __construct() {

		$this->wp_flexslider = 'wp_flexslider_shortcodes';
		$this->version = '2.1.1';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - wp_flexslider_Loader. Orchestrates the hooks of the plugin.
	 * - wp_flexslider_i18n. Defines internationalization functionality.
	 * - wp_flexslider_Admin. Defines all hooks for the admin area.
	 * - wp_flexslider_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    2.1.1
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-flexslider-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-flexslider-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wp-flexslider-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wp-flexslider-public.php';

		$this->loader = new wp_flexslider_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the wp_flexslider_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    2.1.1
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new wp_flexslider_i18n();
		$plugin_i18n->set_domain( $this->get_wp_flexslider() );

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    2.1.1
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new wp_flexslider_Admin( $this->get_wp_flexslider(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'av_plugin_menu' );


	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    2.1.1
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new wp_flexslider_Public( $this->get_wp_flexslider(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_action('init', $plugin_public, 'register_shortcodes');
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    2.1.1
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     2.1.1
	 * @return    string    The name of the plugin.
	 */
	public function get_wp_flexslider() {
		return $this->wp_flexslider;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     2.1.1
	 * @return    wp_flexslider_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     2.1.1
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
