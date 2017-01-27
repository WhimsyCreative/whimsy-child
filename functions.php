<?php

add_action( 'wp_enqueue_scripts', 'whimsy_child_scripts_styles', 95 );

/*
 * Additional style and script file inclusion.
 */
function whimsy_child_scripts_styles() {

    /**
     * Include new Google fonts
     */
    require_once get_stylesheet_directory() . '/child/inc/fonts.php';
    wp_enqueue_style( 'whimsy-child-fonts', whimsy_child_fonts_url(), array(), null );
    
    /**
     * Include custom.css file last for persistent style overrides.
     */
    wp_enqueue_style( 'whimsy-child-custom-styles', get_stylesheet_directory_uri() . 'custom.css', '1.0.0', true, 400 );

}