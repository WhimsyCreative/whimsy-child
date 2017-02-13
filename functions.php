<?php

add_action( 'wp_enqueue_scripts', 'whimsy_child_scripts_styles', 2 );
add_action( 'setup_theme', 'whimsy_child_unhook_whimsy_framework_functions', 2 );

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
    wp_enqueue_style( 'whimsy-child-style', get_stylesheet_directory_uri() . '/custom.css', '1.0.0', true, 400 );

}


/*
 * Change the load order for the menu to place it after site title
 */
function whimsy_child_unhook_whimsy_framework_functions() {
    remove_action( 'whimsy_nav_inside_before', 'whimsy_responsive_nav', 40 );
}
