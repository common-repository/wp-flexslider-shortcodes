<?php
/** Step 2 (from text above). */
add_action( 'admin_menu', 'av_plugin_menu' );

/** Step 1. */
function av_plugin_menu() {
	add_plugins_page( 'WP Flexslider Shortcodes', 'WP Flexslider Shortcodes', 'manage_options', 'wp_flexslider_shortcodes', 'av_plugin_options' );
}

/** Step 3. */
function av_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'Du besitzt nicht die nötigen Rechte um diese Seite zu öffnen.' ) );
	}
?>
		<div class="wrap plugin-container">
    <div class="av-highlight">
    <h2>WP Flexslider Shortcodes - Hilfe</h2>
    <h4 class="bg-warning">Wichtige Hinweise zur Benutzung und Umgang mit dem Plugin "WP Flexslider Shortcodes"</h4>
    </div><!--highlight-->
    <div class="raw">
    	<ol>
      	<li><a href="#allgemein">Allgemein</a></li>
        <li><a href="#shortcode">Der Shortcode</a></li>
        <li><a href="#parameter">Zusätzliche Parameter</a></li>
      </ol>
    </div>
    <div class="raw">
			<h3 id="allgemein">Allgemein</h3>
      	<p>Das Plugin <strong>Wp Flexslider Shortcodes</strong> ermöglicht das nutzen des allgemein sehr beliebten und erfolgreichen OpenSource Sliders <a href="http://flexslider.woothemes.com/">"FlexSlider2" von Woothemes</a> in der Wordpress-Umgebung.<br />
        Dabei wird die Hauseigene Gallery von Wordpress zur Auswahl der Bilder verwendet.</p>
        <figure class="col2">
        	<img src="<?=plugins_url('wp_flexslider_shortcodes/image/wp-gallery.PNG');?>" />
        </figure>
        <figure class="col2">
        	<img src="<?=plugins_url('wp_flexslider_shortcodes/image/wp-gallary-shortcode.PNG');?>" />
        </figure>
        <p>Dabei werden die einzelnen ID's der Bilder herausgefiltert und durch eine Wordpress-Funktion der Link zum jeweiligen Bild gebildet.<br />
        Es ist auch möglich die ID's der Bilder direkt mit Komma-Trennung manuell anzugeben.</p>
        <pre><code>Bilder 1,5,125,1176 usw.</code></pre>
      <h3 id="shortcode">Der Shortcode</h3>
      	<p>Der Shortcode für die Einbindung des Sliders...</p>
        <pre><code>[av_slide] Die ausgewählte Gallerie ... [/av_slide]</code></pre>
        <p>Ohne Angabe jeglicher Parameter wird der FlexSlider Basic ausgewählt</p>
        <figure class="col2">
        	<img src="<?=plugins_url('wp_flexslider_shortcodes/image/slider-basic.PNG'); ?>" />
        </figure>
      <h3 id="parameter">Zusätzliche Parameter</h3>
      	<p>Um die Optik und die Funktionen des Sliders beeinflussen zu können, dürfen weitere Parameter ausgewählt werden.</p>
        <p>In der aktuellen Version 1.1 sind nur 2 Parameter integriert.</p>
        <ol><h3>Parameter:</h3>
        	<li><p>MODE - Auswahl des Sliders</p>
          	<pre><code>[av_slide mode="thumb-slider"]</code></pre>
          	<ol><h4>Folgende Modes stehen zur Verfügung</h4>
            	<li>[av_slide mode="Basic"] - 
              <strong>Standard-Auswahl auch ohne übergabe der Parameter</strong></li>
              <li>[av_slide mode="thumb-slider"] - 
              <strong>Ein Slider mit Thumbnails unter dem Hauptbild</strong></li>
              <li>[av_slide mode="video"] - 
              <strong>Ein Slider für Videos</strong></li>
            </ol>
          </li>
          <li><p>CLASS - Ermöglicht das hinzufügen weiterer Klassen für CSS-Formatierungen des DIV-Elements</p>
          	<pre><code>[av_slide class="my_class"]
          	Ausgabe = &lt;div class="flexslider my_class"&gt;...&lt;/div&gt;
          </code></pre>
          </li>
          <li><p>KOMBINIERT - Sollen beide Parameter gleichzeitig übergeben werden.</p>
          <pre><code>[av_slide mode="thumb-slider" class="my_class"</code></pre>
          </li>
        </ol>
      <p class="bg-warning">Fallen dir noch sinnvolle Parameter ein, die im nächsten Update integriert werden sollen?<br />
      Dein Feedback: <br />
      Dann bitte kurze Mail an <a href="mailto:info@pcservice-voll.de">info@pcservice-voll.de</a><br />
      Oder besuche unsere <a target="_blank" href="https://www.facebook.com/pages/Media-Storenet/477739438915987">Facebook-Seite</a> und diskutiere es aus.</p> 
      </div>
		</div><!--wrap-->
<?php
}
?>