# WP Flexslider Shortcodes

## Version
*Version: 2.1.1

## Beschreibung

Das Plugin Wp Flexslider Shortcodes ermöglicht das nutzen des allgemein sehr beliebten und erfolgreichen OpenSource Sliders 
*FlexSlider2 von Woothemes* in Wordpress Posts, Pages und Sidebars.
Dabei wird die Hauseigene Gallery von WordPress zur Auswahl der Bilder verwendet.

Dabei werden die einzelnen ID's der Bilder herausgefiltert und durch eine WordPress-Funktion der Link zum jeweiligen Bild gebildet.
Es ist auch möglich die ID's der Bilder direkt mit Komma-Trennung manuell anzugeben.

## Installation

1. Upload `wp_flexslider_shortcodes.zip` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress


## Benutzung

    [gallary_ids="1,5,125,1176" usw.]

### Der Shortcode

Der Shortcode für die Einbindung des Sliders

    [av_slide] Die ausgewählte Gallerie ... [/av_slide]
     Ohne Angabe jeglicher Parameter wird der FlexSlider Basic ausgewählt

### Slider-basic

*Zusätzliche Parameter*

Um die Optik und die Funktionen des Sliders beeinflussen zu können, dürfen weitere Parameter ausgewählt werden.

In der aktuellen Version sind nur 2 Parameter integriert.

### Parameter:

####MODE - Auswahl des Sliders 

    [av_slide mode="thumb-slider"]
    
Folgende Modes stehen zur Verfügung

    [av_slide mode="Basic"]
    * Standard-Auswahl auch ohne übergabe der Parameter *

    [av_slide mode="thumb-slider"]
    * Ein Slider mit Thumbnails unter dem Hauptbild *

####CLASS - Ermöglicht das hinzufügen weiterer Klassen für CSS-Formatierungen des DIV-Elements

    [av_slide class="my_class"]
    
**Ausgabe = \<div class="flexslider my_class">...\</div>**
          
#### KOMBINIERT - Wenn beide Parameter gleichzeitig übergeben werden sollen.

    [av_slide mode="thumb-slider" class="my_class"]