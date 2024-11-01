<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://media-store.net
 * @since      2.1.1
 *
 * @package    wp_flexslider_shortcodes
 * @subpackage wp_flexslider_shortcodes/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    wp_flexslider_shortcodes
 * @subpackage wp_flexslider_shortcodes/admin
 * @author     Artur Voll <kontakt@media-store.net>
 */
class wp_flexslider_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    2.1.1
	 * @access   private
	 * @var      string    $wp_flexslider    The ID of this plugin.
	 */
	private $wp_flexslider;

	/**
	 * The version of this plugin.
	 *
	 * @since    2.1.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    2.1.1
	 * @param      string    $wp_flexslider       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $wp_flexslider, $version ) {

		$this->wp_flexslider = $wp_flexslider;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    2.1.1
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in wp_flexslider_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The wp_flexslider_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->wp_flexslider, plugin_dir_url( __FILE__ ) . 'css/wp-flexslider-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    2.1.1
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in wp_flexslider_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The wp_flexslider_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->wp_flexslider, plugin_dir_url( __FILE__ ) . 'js/wp-flexslider-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add Plugin-Page to Admin Dashboard
	 *
	 * @since	2.1.1
	 */

	public function av_plugin_menu() {

		add_plugins_page(
			'WP Flexslider Hilfe',
			__( 'WP Flexslider Hilfe', $this->wp_flexslider ),
			'manage_options',
			$this->wp_flexslider,
			array( $this, 'av_render_plugin_options' )
		);

	}

	public function av_render_plugin_options() {

		require plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/wp-flexslider-admin-display.php';

	}


}
