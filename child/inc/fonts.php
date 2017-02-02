<?php

/*
 * Load additional Google Fonts
 * A great tutorial can be found here:
 * https://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 */

function whimsy_child_fonts_url() {
    
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Raleway, translate this to 'off'. Do not translate
    * into your own language.
    */
    $raleway = _x( 'on', 'Raleway font: on or off', 'whimsy-child' );
 
    /* Translators: If there are characters in your language that are not
    * supported by Satisfy, translate this to 'off'. Do not translate
    * into your own language.
    */
    $satisfy = _x( 'on', 'Satisfy font: on or off', 'whimsy-child' );
 
    if ( 'off' !== $raleway || 'off' !== $satisfy ) {
        $font_families = array();
 
        if ( 'off' !== $raleway ) {
            $font_families[] = 'Raleway:400,600';
        }
 
        if ( 'off' !== $satisfy ) {
            $font_families[] = 'Satisfy';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }
 
    return $fonts_url;
    
}