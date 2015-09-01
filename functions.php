<?php

/*
 * Load Google Fonts
 */

function whimsy_fonts_url() {
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by raleway, translate this to 'off'. Do not translate
    * into your own language.
    */
    $raleway = _x( 'on', 'Raleway font: on or off', 'whimsy-framework' );
 
    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $satisfy = _x( 'on', 'Open Sans font: on or off', 'whimsy-framework' );
 
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

function whimsy_more_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Business Widgets', 'whimsy-framework' ),
		'id'            => 'business',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget brick %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Home Sidebar', 'whimsy-framework' ),
		'id'            => 'home-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'whimsy_more_widgets_init' );

function whimsy_waterlily_customize_register ( $wp_customize ) {

    /* Add Skin Settings */

    $wp_customize->add_setting(
        'whimsy_waterlily_skin',
        array(
            'default' => 'one',
        )
    );
     
    $wp_customize->add_control(
        'whimsy_waterlily_skin',
        array(
            'type' => 'select',
            'label' => 'Skin',
            'section' => 'whimsy_framework_section_display',
            'choices' => array(
                'one' => 'Nora',
                'two' => 'Azurea',
                'three' => 'Karolina',
                'four' => 'Marliacea',
            ),
        )
    );
    /* Add Layout Settings */

    $wp_customize->add_setting(
        'whimsy_waterlily_layout',
        array(
            'default' => 'one',
        )
    );
}
add_action( 'customize_register', 'whimsy_waterlily_customize_register' );

/**
 * Additional style and script file inclusion.
 */

function whimsy_scripts_styles() {
    wp_enqueue_style( 'whimsy-fonts', whimsy_fonts_url(), array(), null );
    wp_enqueue_style( 'whimsy-style', get_stylesheet_directory_uri() . 'custom.css', '1.0', true, 40 );

}
add_action( 'wp_enqueue_scripts', 'whimsy_scripts_styles', 15 );

