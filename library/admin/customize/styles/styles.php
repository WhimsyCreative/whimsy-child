<?php
/**
 * @package   WhimsyFramework
 * @version   1.0.0
 * @author    Natasha K. Cross <natasha@thefanciful.com>
 * @copyright 2016, Natasha K. Cross
 * @link      http://thefanciful.com/whimsy
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( !class_exists( 'WhimsyStyles' ) ) {

	class WhimsyStyles {

		/**
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		function __construct() {
        
			global $WhimsyStyles;

			/* Set up an empty class for the global $whimsy object. */
			$WhimsyStyles = new stdClass;

			/* Define Whimsy+Skins constants. */
			add_action( 'after_setup_theme', array( $this, 'constants' ), 1 );

			/* Load the settings and controls for the Customizer. */
        
            add_action( 'customize_register', array( $this, 'customize' ), 40 );
            
			/* Enqueue necessary scripts and CSS files for the skins . */
            
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ), 80 );
            
			/* Enqueue necessary scripts and CSS files for the skins . */
            
            add_action( 'admin_enqueue_scripts', array( $this, 'admin' ), 15 );
        }
   
		/**
		 * Defines the constant paths for use within the core framework, parent theme, and child theme.  
		 * Constants prefixed with 'HYBRID_' are for use only within the core framework and don't 
		 * reference other areas of the parent or child theme.
		 *
		 * @since  0.7.0
		 * @access public
		 * @return void
		 */
		function constants() {

			/* Sets the framework version number. */
			define( 'WHIMSY_STYLES_VERSION', '1.0.0' );
            
        }
        
        function customize ( $wp_customize ) {
            
            $wp_customize->add_setting( 'whimsy_styles_customize_options', array(
                'default' => 'none',
                'transport' => 'refresh'
            ) );
            $wp_customize->add_control( new Whimsy_Layout_Control( $wp_customize, 'whimsy_styles_customize_options', array(
                'label' => __( 'Style', 'whimsy-styles' ),
                'section' => 'whimsy_framework_section_display',
                'layouts' => array(
                    'one' => array(
                        'label' => __( 'Nora', 'whimsy-styles' )
                    ),
                    'two' => array(
                        'label' => __( 'Azurea', 'whimsy-styles' )
                    ),
                    'three' => array(
                        'label' => __( 'Karolina', 'whimsy-styles' )
                    ),
                    'four' => array(
                        'label' => __( 'Marliacea', 'whimsy-styles' )
                    ),
                    'none' => array(
                        'label' => __( 'No Style', 'whimsy-styles' )
                    )
                ),
                'priority' => 3
            ) ) );
                        
        }

        /**
         * Custom functions that act independently of the theme templates.
         */
        
        function includes() {

//            require_once get_template_directory() . '/library/inc/extras.php';

        }
        
        /**
         * Additional style and script file inclusion.
         */

        function enqueue() {
            
            $whimsy_styles_customize_options = get_theme_mod( 'whimsy_styles_customize_options' );

            if ( $whimsy_styles_customize_options == 'one' ) {
                wp_enqueue_style( 'whimsy-style-one', get_stylesheet_directory_uri() . '/library/admin/customize/styles/css/one.css' );
            }
            if ( $whimsy_styles_customize_options  == 'two' ) {
                wp_enqueue_style( 'whimsy-style-two', get_stylesheet_directory_uri() . '/library/admin/customize/styles/css/two.css' );
            }
            if ( $whimsy_styles_customize_options  == 'three' ) {
                wp_enqueue_style( 'whimsy-style-three', get_stylesheet_directory_uri() . '/library/admin/customize/styles/css/three.css' );
            }
            if ( $whimsy_styles_customize_options  == 'four' ) {
                wp_enqueue_style( 'whimsy-style-four', get_stylesheet_directory_uri() . '/library/admin/customize/styles/css/four.css' );
            }
            
        }
        
        /**
         * Include additional styles when in admin.
         */

        function admin() {

             /* Enqueue the appropriate CSS based on which skin is selected via Theme Customizer */

            wp_enqueue_style( 'whimsy-styles-admin', get_stylesheet_directory_uri() . '/library/admin/customize/styles/css/admin.css' );
            
        }
    }
}