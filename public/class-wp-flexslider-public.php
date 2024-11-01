<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://media-store.net
 * @since      2.1.1
 *
 * @package    wp_flexslider_shortcodes
 * @subpackage wp_flexslider_shortcodes/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    wp_flexslider_shortcodes
 * @subpackage wp_flexslider_shortcodes/public
 * @author     Artur Voll <kontakt@media-store.net>
 */
class wp_flexslider_Public
{

    /**
     * The ID of this plugin.
     *
     * @since    2.1.1
     * @access   private
     * @var      string $wp_flexslider The ID of this plugin.
     */
    private $wp_flexslider;

    /**
     * The version of this plugin.
     *
     * @since    2.1.1
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    2.1.1
     *
     * @param      string $wp_flexslider The name of the plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($wp_flexslider, $version)
    {

        $this->wp_flexslider = $wp_flexslider;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    2.1.1
     */
    public function enqueue_styles()
    {

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

        wp_enqueue_style('flexslider', plugin_dir_url(__FILE__) . 'css/flexslider.css', array(), $this->version, 'all');
        wp_enqueue_style($this->wp_flexslider, plugin_dir_url(__FILE__) . 'css/wp-flexslider-public.css', array(), $this->version, 'all');

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    2.1.1
     */

    public function enqueue_scripts()
    {

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

        wp_enqueue_script('flexslider', plugin_dir_url(__FILE__) . 'js/flexslider-min.js', array('jquery'), $this->version, false);
        wp_enqueue_script($this->wp_flexslider, plugin_dir_url(__FILE__) . 'js/wp-flexslider-public.js', array('jquery'), $this->version, false);

    }

    /**
     * Shortcode f�r Slider registrieren
     *
     * @since    2.1.1
     */

    public function register_shortcodes()
    {

        function av_slide_shortcode($atts, $content = null)
        {
            /*Standard-Mode festlegen, Ausgabe in $mode*/
            extract(shortcode_atts(array(
                'mode' => 'basic',
                'class' => 'class'
            ),
                $atts
            ));
            require plugin_dir_path(dirname(__FILE__)) . 'public/partials/wp-flexslider-public-display.php';
            // $mode festlegen
            if (empty($atts['mode'])):$mode = 'basic';
            else: $mode = esc_html($atts['mode']);
            endif;
            // $class festlegen
            if (empty($atts['class'])):$class = '';
            else: $class = esc_html($atts['class']);
            endif;

            /*Html-Markup abrufen*/
            $html = av_html_code($mode, $content, $class);
            /*Script-Code abrufen*/

            $script = av_script_code($mode);
            //add_action('wp_footer', $script, 10, 1);

            $html = $html.$script;
            return $html;

        }

        add_shortcode('av_slide', 'av_slide_shortcode');

    }

}
