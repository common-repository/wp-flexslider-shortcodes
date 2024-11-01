<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://media-store.net
 * @since      2.1.2
 *
 * @package    wp_flexslider_shortcodes
 * @subpackage wp_flexslider_shortcodes/admin/partials
 */
?>

    <!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php

    if (!current_user_can('manage_options')) {
        wp_die(__('Du besitzt nicht die n�tigen Rechte um diese Seite zu �ffnen.'));
    }
    ?>
    <div class="wrap plugin-container">
        <div class="av-highlight">
            <h2>WP Flexslider Shortcodes - Hilfe</h2>
            <h4 class="bg-warning">Wichtige Hinweise zur Benutzung und Umgang mit dem Plugin "WP Flexslider
                Shortcodes"</h4>
        </div>
        <!--highlight-->
        <div class="row">
            <ol class="inline">
                <li><a href="#allgemein">Allgemein</a></li>
                <li><a href="#shortcode">Der Shortcode</a></li>
                <li><a href="#parameter">Zus&auml;tzliche Parameter</a></li>
            </ol>
        </div>
        <div class="row">
            <h3 id="allgemein">Allgemein</h3>

            <p>Das Plugin <strong>Wp Flexslider Shortcodes</strong> erm&ouml;glicht das nutzen des allgemein sehr beliebten
                und erfolgreichen OpenSource Sliders <a href="http://flexslider.woothemes.com/">"FlexSlider2" von
                    Woothemes</a> in der Wordpress-Umgebung.<br/>
                Dabei wird die Hauseigene Gallery von Wordpress zur Auswahl der Bilder verwendet.</p>
            <figure class="col2">
                <img src="<?= plugins_url('/wp_flexslider_shortcodes/admin/images/wp-gallery.PNG'); ?>"/>
            </figure>
            <figure class="col2">
                <img src="<?= plugins_url('/wp_flexslider_shortcodes/admin/images/wp-gallary-shortcode.PNG'); ?>"/>
            </figure>
            <p>Dabei werden die einzelnen ID's der Bilder herausgefiltert und durch eine Wordpress-Funktion der Link zum
                jeweiligen Bild gebildet.</p>
            <h3 id="shortcode">Der Shortcode</h3>

            <p>Der Shortcode f&uuml;r die Einbindung des Sliders...</p>
            <pre><code>[av_slide] Die ausgew&auml;hlte Gallerie ... [/av_slide]</code></pre>
            <p>Ohne Angabe jeglicher Parameter wird der FlexSlider Basic ausgew&auml;hlt</p>
            <figure class="col2">
                <img src="<?= plugins_url('wp_flexslider_shortcodes/admin/images/slider-basic.PNG'); ?>"/>
            </figure>
            <div class="clearfix"></div>
            <h3 id="parameter">Zus&auml;tzliche Parameter</h3>

            <p>Um die Optik und die Funktionen des Sliders beeinflussen zu k&ouml;nnen, d&uuml;rfen weitere Parameter angegeben
                werden.</p>

            <p>In der aktuellen Version 2.1.2 sind nur 2 Parameter integriert.</p>
            <ol><h3>Parameter:</h3>
                <li><p>MODE - Auswahl des Sliders</p>
                    <pre><code>[av_slide mode="thumbnails"]</code></pre>
                    <ol><h4>Folgende Modes stehen zur Verf&uuml;gung</h4>
                        <li>[av_slide mode="basic"] -
                            <strong>Standard-Auswahl auch ohne &uuml;bergabe der Parameter</strong></li>
                        <li>[av_slide mode="basic_custom_nav"] -
                            <strong>Basic Slider mit der Navigation unterhalb des Hauptbildes</strong></li>
                        <li>[av_slide mode="basic_caption"] -
                            <strong>Basic Slider mit einer Bildbeschreibung</strong></li>
                        <li>[av_slide mode="thumbnails"] -
                            <strong>Ein Slider mit Thumbnails unter dem Hauptbild</strong></li>
                        <li>[av_slide mode="thumbnails_carousel"] -
                            <strong>Ein Slider mit Thumbnails unter dem Hauptbild,<br />
                                    dabei k&ouml;nnen die Thumbnails
                                    in einem Carousel nach Links und Rechts gescrollt werden.</strong></li>
                    </ol>
                    <p><strong>Mehr Informationen und Demos der einzelnen Modes k&ouml;nnen auf der
                        <a href="http://media-store.net/wp-flexslider-shortcodes/" target="_blank">Plugin-Webseite</a>
                        angeschaut werden.</strong></p>
                </li>
                <li><p>CLASS - Erm&ouml;glicht das hinzuf&uuml;gen weiterer Klassen f&uuml;r CSS-Formatierungen des DIV-Elements</p>
          	<pre><code>[av_slide class="my_class"]
                    Ausgabe = &lt;div class="flexslider my_class"&gt;...&lt;/div&gt;
                </code></pre>
                </li>
                <li><p>KOMBINIERT - Sollen beide Parameter gleichzeitig &uuml;bergeben werden.</p>
                    <pre><code>[av_slide mode="thumb-slider" class="my_class"</code></pre>
                </li>
            </ol>
            <p class="bg-warning">Fallen dir noch sinnvolle Parameter ein, die im n&auml;chsten Update integriert werden
                sollen?<br/>
                Dein Feedback: <br/>
                Dann bitte kurze Mail an <a href="mailto:info@pcservice-voll.de">info@pcservice-voll.de</a><br/>
                Oder besuche unsere <a target="_blank"
                                       href="https://www.facebook.com/pages/Media-Storenet/477739438915987">Facebook-Seite</a>
                und diskutiere es aus.</p>
        </div>
    </div><!--wrap-->