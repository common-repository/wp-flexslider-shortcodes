<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://media-store.net
 * @since      2.1.2
 *
 * @package    wp_flexslider_shortcodes
 * @subpackage wp_flexslider_shortcodes/public/partials
 */
?>

<?php

/******************************/
/****Bilden des HTML-Markup****/
/******************************/
if (!function_exists('av_html_code')) {
    function av_html_code($mode, $content, $class)
    {
        $plugin = new wp_flexslider();
        $plugin = $plugin->get_wp_flexslider();

        $mode = $mode;
        $content = $content;
        $class = $class;

        /*Regex zum Filtern der Bider-ID's aus der WP-Gallery*/
        $regex = '/[ids\=\"]{1}[0-9,]+/';
        preg_match($regex, $content, $ids);
        $id = explode(',', $ids[0]);

        /*Bilden des Markups*/
        switch ($mode) :
            case 'basic' : // Standard Basic Slider
                $html = '<div class="flexslider ' . $class . '">';
                $html .= '<p class="flexslider_copyright">Slider Copyright&copy;WooThemes"Flexslider2"</p>';
                $html .= '<ul class="slides">';
                foreach ($id as $at_id) {
                    $at_id = preg_replace('/[^0-9]/', '', $at_id);
                    $bild_url = wp_get_attachment_url(intval($at_id));
                    // Bilder Meta auslesen
                    $attach = get_post_meta($at_id);
                    // Image Alt-Text als String
                    if (empty($attach["_wp_attachment_image_alt"])):
                        $alt = '';
                    else:
                        $alt = $attach["_wp_attachment_image_alt"][0];
                    endif;
                    $html .= '<li><a href="' . $bild_url . '"><img src="' . $bild_url . '" alt="' . $alt . '" />';
                    $html .= '</a></li>';
                }

                $html .= '</ul></div>';
                break;

            case 'basic_custom_nav' : // Basic Slider mit Custom Nav Direction

                $html = '<div class="flexslider flexslider_custom_nav ' . $class . '">';
                $html .= '<p class="flexslider_copyright">Slider Copyright&copy;WooThemes"Flexslider2"</p>';
                $html .= '<ul class="slides">';
                foreach ($id as $at_id) {
                    $at_id = preg_replace('/[^0-9]/', '', $at_id);
                    $bild_url = wp_get_attachment_url(intval($at_id));
                    // Bilder Meta auslesen
                    $attach = get_post_meta($at_id);
                    // Image Alt-Text als String
                    if (empty($attach["_wp_attachment_image_alt"])):
                        $alt = '';
                    else:
                        $alt = $attach["_wp_attachment_image_alt"][0];
                    endif;
                    $html .= '<li><a href="' . $bild_url . '"><img src="' . $bild_url . '" alt="' . $alt . '" />';
                    $html .= '</a></li>';
                }

                $html .= '</ul></div>';
                $html .= '<div class="custom-navigation">
							<a href="#" class="flex-prev">Prev</a>
  							<div class="custom-controls-container"></div>
  							<a href="#" class="flex-next">Next</a>
						</div>';
                break;

            case 'basic_caption' : // Basic Slider with Caption
                $html = '<div class="flexslider ' . $class . '">';
                $html .= '<p class="flexslider_copyright">Slider Copyright&copy;WooThemes"Flexslider2"</p>';
                $html .= '<ul class="slides">';
                foreach ($id as $at_id) {
                    $at_id = preg_replace('/[^0-9]/', '', $at_id);
                    $bild_url = wp_get_attachment_url(intval($at_id));
                    // Image Post Data auslesen
                    $bild = get_post($at_id);
                    $caption = $bild->post_excerpt; // Caption

                    // Bilder Meta auslesen
                    $attach = get_post_meta($at_id);
                    // Image Alt-Text als String
                    if (empty($attach["_wp_attachment_image_alt"])):
                        $alt = '';
                    else:
                        $alt = $attach["_wp_attachment_image_alt"][0];
                    endif;

                    if (empty($caption)):
                        $caption = __('F&uuml;ge Bildunterschrift zum Bild hinzu.', $plugin);
                    else:
                        $caption = $caption;
                    endif;


                    $html .= '<li><a href="' . $bild_url . '"><img src="' . $bild_url . '" alt="' . $alt . '" /></a>';
                    $html .= '<p class="flex-caption">' . $caption . '</p>';
                    $html .= '</li>';
                }

                $html .= '</ul></div>';
                break;

            case 'thumbnails' : // Slider mit Thumbnails und Navigation

                $html = '<div class="flexslider flexslider_thumbnails ' . $class . '">';
                $html .= '<p class="flexslider_copyright">Slider Copyright&copy;WooThemes"Flexslider2"</p>';
                $html .= '<ul class="slides">';
                foreach ($id as $at_id) {
                    $at_id = preg_replace('/[^0-9]/', '', $at_id);
                    $bild_url = wp_get_attachment_url(intval($at_id));
                    // Image Post Data auslesen
                    $bild = get_post($at_id);
                    $caption = $bild->post_excerpt; // Caption

                    // Bilder Meta auslesen
                    $attach = get_post_meta($at_id);
                    // Image Alt-Text als String
                    if (empty($attach["_wp_attachment_image_alt"])):
                        $alt = '';
                    else:
                        $alt = $attach["_wp_attachment_image_alt"][0];
                    endif;

                    $html .= '<li data-thumb="' . $bild_url . '"><a href="' . $bild_url . '">
								<img src="' . $bild_url . '" alt="' . $alt . '"/>';
                    $html .= '</a></li>';
                }

                $html .= '</ul></div>';
                break;

            case 'thumbnails_carousel' : // Slider mit Thumbnails und Navigation

                $html = '<div id="slider2" class="flexslider flexslider_carousel ' . $class . '">';
                $html .= '<p class="flexslider_copyright">Slider Copyright&copy;WooThemes"Flexslider2"</p>';
                $html .= '<ul class="slides">';
                // Erste Schleife f�r das Gro�e Bild
                foreach ($id as $at_id) {
                    $at_id = preg_replace('/[^0-9]/', '', $at_id);
                    // Bild-Url
                    $bild_url = wp_get_attachment_url(intval($at_id));
                    // Image Post Data auslesen
                    $bild = get_post($at_id);
                    $caption = $bild->post_excerpt; // Caption

                    // Bilder Meta auslesen
                    $attach = get_post_meta($at_id);
                    // Image Alt-Text als String
                    if (empty($attach["_wp_attachment_image_alt"])):
                        $alt = '';
                    else:
                        $alt = $attach["_wp_attachment_image_alt"][0];
                    endif;

                    $html .= '<li><a href="' . $bild_url . '">
								<img src="' . $bild_url . '" alt="' . $alt . '"/>';
                    $html .= '</a></li>';
                }

                $html .= '</ul></div>';

                $html .= '<div id="carousel2" class="flexslider"><ul class="slides">';

                // Zweite Schleife f�r das Carousel
                foreach ($id as $at_id) {
                    $at_id = preg_replace('/[^0-9]/', '', $at_id);
                    // Bild-Url
                    $bild_url = wp_get_attachment_url(intval($at_id));

                    // Bilder Meta auslesen
                    $attach = get_post_meta($at_id);
                    // Image Alt-Text als String
                    if (empty($attach["_wp_attachment_image_alt"])):
                        $alt = '';
                    else:
                        $alt = $attach["_wp_attachment_image_alt"][0];
                    endif;

                    $html .= '<li><img src="' . $bild_url . '" alt="' . $alt . '"/></li>';

                }

                $html .= '</ul></div>';

                break;

            default:
                $html = '<div class="flexslider ' . $class . '">';
                $html .= '<p class="flexslider_copyright">Slider Copyright&copy;WooThemes"Flexslider2"</p>';
                $html .= '<ul class="slides">';
                foreach ($id as $at_id) {
                    $at_id = preg_replace('/[^0-9]/', '', $at_id);
                    $bild_url = wp_get_attachment_url(intval($at_id));
                    $html .= '<li><a href="' . $bild_url . '"><img src="' . $bild_url . '" />';
                    $html .= '</a></li>';
                }

                $html .= '</ul></div>';


        endswitch;

        return $html;

    }
}

?>

<?php

/***********************************/
/*Bilden des Script-Codes im Footer*/
/***********************************/
if(!function_exists('av_script_code')) {
    function av_script_code($mode)
    {

        $mode = $mode;
        switch ($mode):
            case 'basic': // Bei Standard Basic Slider

                $script = "<script type='text/javascript'>
				// Can also be used with $(document).ready()
				jQuery(document).ready(function ($) {
					$('.flexslider').flexslider({
						animation: 'slide'
					});
				});
			</script>";

                break;
            case
            'basic_custom_nav': // Bei Standard Basic Slider

                $script = "<script type='text/javascript'>
				// Can also be used with $(document).ready()
				jQuery(document).ready(function ($) {
					$('.flexslider').flexslider({
						animation: 'slide',
						controlsContainer: $('.custom-controls-container'),
						customDirectionNav: $('.custom-navigation a')
					});
				});
			</script>";


                break;
            case 'basic_caption': // Bei Standard Basic Slider

                $script = "<script type='text/javascript'>
				// Can also be used with $(document).ready()
				jQuery(document).ready(function ($) {
					$('.flexslider').flexslider({
						animation: 'slide'
					});
				});
			</script>";

                break;

            case 'thumbnails' : //Bei Slider mit Thumbnails

                $script = "<script type='text/javascript'>
				jQuery(document).ready(function ($) {
					$('.flexslider').flexslider({
						animation: 'slide',
						controlNav: 'thumbnails'
					});

					if ($('.flexslider_thumbnails ol').length) {
						var liAnzahl = ($('.slides li').size());
						var liWidth = 100 / (liAnzahl - 2) + '%';

							$('.flex-control-thumbs li').css('width',liWidth);
							$(console.log(liWidth));
					}
				});
			</script>";

                break;

            case 'thumbnails_carousel' : //Bei Slider mit Thumbnails und Carousel

                $script = "<script type='text/javascript'>
				jQuery(document).ready(function ($) {
					$('#carousel2').flexslider({
						animation: 'slide',
						controlNav: false,
						animationLoop: false,
						slideshow: false,
						itemWidth: 210,
						itemMargin: 5,
						asNavFor: '#slider2'
					});

					$('#slider2').flexslider({
						animation: 'slide',
						controlNav: false,
						animationLoop: false,
						slideshow: false,
						sync: '#carousel2'
					});

				});
			</script>";

                break;

            default:

                $script = "<script type='text/javascript'>
				// Can also be used with $(document).ready()
				jQuery(document).ready(function ($) {
					$('.flexslider').flexslider({
						animation: 'slide'
					});
				});
			</script>";

                break;
        endswitch;

        return $script;

    }
}
?>