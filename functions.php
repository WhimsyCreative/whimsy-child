<?php

/**
 * Include Whimsy Framework Library files.
 */
require_once get_stylesheet_directory() . '/library/admin/customize/styles/styles.php';
new WhimsyStyles();

require_once get_stylesheet_directory() . '/library/admin/customize/bg/bg.php';
new WhimsyBackgrounds();

/*
 * Additional style and script file inclusion.
 */

function whimsy_child_scripts_styles() {

    /**
     * Include new Google fonts
     */
    require_once get_stylesheet_directory() . '/library/inc/fonts.php';
    wp_enqueue_style( 'whimsy-fonts', whimsy_child_fonts_url(), array(), null );
    wp_enqueue_style( 'whimsy-style', get_stylesheet_directory_uri() . 'custom.css', '1.0.0', true, 400 );

}
add_action( 'wp_enqueue_scripts', 'whimsy_child_scripts_styles', 15 );