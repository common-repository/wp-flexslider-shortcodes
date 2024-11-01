<?php

//require ('plugin_options.php');
?>
<?php
/*******************************/
/*Registrierung der Files in WP*/
/*******************************/
	function av_bind_files()
	{	
		/*Pfadangaben zu Flex Slider 2 Dateien wie CSS und JS*/
		$av_slide_css_dir = plugins_url( 'woothemes-FlexSlider-8b3766e/flexslider.css', __FILE__ );
		$av_plugin_css_dir = plugins_url( 'plugin-style.css', __FILE__ );
		$av_jquery_js_dir = plugins_url( 'woothemes-FlexSlider-8b3766e/jquery-1.11.1.min.js', __FILE__ );
		$av_slide_js_dir = plugins_url( 'woothemes-FlexSlider-8b3766e/jquery.flexslider-min.js', __FILE__ );
		$av_fitvid_js_dir = plugins_url( 'woothemes-FlexSlider-8b3766e/jquery.fitvid.js', __FILE__ );
		$av_froogaloop_js_dir = plugins_url( 'woothemes-FlexSlider-8b3766e/froogaloop.js', __FILE__ );
		/*Pfadangaben zu eigenen Dateien*/
	

			wp_enqueue_script('jquery');
	
			wp_register_script('slide_js', $av_slide_js_dir ); //Flexslider
			wp_enqueue_script('slide_js', array('jquery'));
			
				wp_register_script('fitvid_js', $av_fitvid_js_dir ); //Fitvid
				wp_enqueue_script('fitvid_js', array('jquery', 'slide_js'));
				
				wp_register_script('froogaloop_js', $av_froogaloop_js_dir ); //Fitvid
				wp_enqueue_script('froogaloop_js', array('jquery', 'slide_js'));
				
		
			wp_register_style('slide_css', $av_slide_css_dir );
			wp_enqueue_style('slide_css');
			
			wp_register_style('plugin_css', $av_plugin_css_dir );
			wp_enqueue_style('plugin_css');

			}
		add_action('wp_enqueue_scripts', 'av_bind_files');
		
/*******************************/
/****Shortcode registrieren*****/
/*******************************/
function av_slide_shortcode($atts, $content = null )
{
	/*Standart-Mode festlegen, Ausgabe in $mode*/
	extract(shortcode_atts(array(
		'mode' => 'basic',
		'class' => ''), $atts));
	$GLOBALS['mode'] = $mode;
	/*Html-Markup abrufen*/
	av_html_code($mode, $content, $class);
	/*Script-Code abrufen*/
	add_action('wp_footer', 'av_script_code', 10, 1);
	return $GLOBALS['anzeige'];
}
add_shortcode('av_slide', 'av_slide_shortcode');

/******************************/
/****Bilden des HTML-Markup****/
/******************************/
function av_html_code($att1, $att2, $att3)
{
	$mode = $att1;
	$content = $att2;
	$class = $att3;
	/*Regex zum Filtern der Bider-ID's aus der WP-Gallery*/
	$regex = '/[ids\=\"]{1}[0-9,]+/';
	preg_match($regex , $content, $ids);
	$id = explode(',' , $ids[0]);
	
	/*Bilden des Markups*/
	if ($mode == 'basic'): // Standard Basic Slider
			$anzeige = '<div class="copyright"><p><em>Copyright: &copy; "FlexSlider 2" 2012 WooThemes</em></p></div>'; 
			$anzeige .= '<div class="flexslider '.$class.'">';
			$anzeige .= '<ul class="slides">';
			foreach ($id as $at_id){
				$at_id = preg_replace('/[^0-9]/','',$at_id);
				$anzeige .= '<li><a href="'.wp_get_attachment_url(intval($at_id)).'">
								<img src="'.wp_get_attachment_url(intval($at_id)).'" />';
				$anzeige .= '</a></li>';
			}
	
			$anzeige .= '</ul></div>';
			
	elseif ($mode == 'thumb-slider'): // Slider mit Thumbnails und Navigation
			$anzeige = '<div class="flexslider">';
			$anzeige .= '<ul class="slides">';
			foreach ($id as $at_id){
				$at_id = preg_replace('/[^0-9]/','',$at_id);
				$anzeige .= '<li data-thumb="'.wp_get_attachment_url(intval($at_id)).'"><a href="'.wp_get_attachment_url(intval($at_id)).'">
								<img src="'.wp_get_attachment_url(intval($at_id)).'" />';
				$anzeige .= '</a></li>';
			}
	
			$anzeige .= '</ul></div>';
			$anzeige .= '<div class="copyright"><p><em>Copyright: &copy; "FlexSlider 2" 2012 WooThemes</em></p></div>';
	
	elseif ($mode = 'video'): // Video-Slider
			$anzeige = '<div class="flexslider">';
			$anzeige .= '<ul class="slides">';
			$num = 0;
			foreach ($id as $at_id){
				$num = $num+1;
				$at_id = preg_replace('/[^0-9]/','',$at_id);
				$anzeige .= '<li><iframe id="player_'.$num.'" src="'.wp_get_attachment_url(intval($at_id)).'" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" width="640" height="480"></iframe>';
				$anzeige .= '</li>';
			}
	
			$anzeige .= '</ul></div>';
			$anzeige .= '<div class="copyright"><p><em>Copyright: &copy; "FlexSlider 2" 2012 WooThemes</em></p></div>';
	
	endif;
	$GLOBALS['anzeige'] = $anzeige;
}

/***********************************/
/*Bilden des Script-Codes im Footer*/
/***********************************/
function av_script_code()
{ 
$mode = $GLOBALS['mode'];
if( $mode == 'basic' ): // Bei Standard Slider ?>
<script type="text/javascript">
// Can also be used with $(document).ready()
jQuery(document).ready(function() {
  jQuery('.flexslider').flexslider({
    animation: "slide"
  });
});
</script>
<?php
elseif( $mode == 'thumb-slider' ): //Bei Slider mit Thumbnails?>
<script type="text/javascript">
// Can also be used with $(document).ready()
jQuery(document).ready(function() {
  jQuery('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>
<?php
elseif( $mode == 'video' ): // Bei Videos ?>
<script type="text/javascript">
 // Can also be used with $(document).ready()
  jQuery(window).load(function(){
  // Wistia handler.
  wistiaEmbed = document.getElementById( 'player_1' ).wistiaApi;
 
  // Call fitVid before FlexSlider initializes, so the proper initial height can be retrieved.
  jQuery( '.flexslider' )
    .fitVids()
    .flexslider({
      animation: 'slide',
      useCSS: false,
      animationLoop: false,
      smoothHeight: true,
      start: function( slider ) {
        jQuery('body').removeClass( 'loading' );
      },
      before: function ( slider ) {
        wistiaEmbed.pause();
      }
  });
 
  wistiaEmbed.bind( 'play', function() {
    jQuery( '.flexslider' ).flexslider( 'pause' );
  });
 
  wistiaEmbed.bind( 'end', function() {
    jQuery( '.flexslider' ).flexslider( 'play' );
  });
});
</script>
<?php
endif;
}
?>