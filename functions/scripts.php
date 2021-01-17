<?php
/**
 * This file loads the CSS and Javascript used for the theme.
 * @package Bulletin WordPress Theme
 * @since 1.0
 * @author WPExplorer : http://www.wpexplorer.com
 * @copyright Copyright (c) 2012, WPExplorer
 * @link http://www.wpexplorer.com
 */
 
 
add_action( 'wp_enqueue_scripts','wpex_load_scripts' );
function wpex_load_scripts() {

	/*******
	*** CSS
	*******************/
	
	// Main CSS
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	
	// Shortcodes
	wp_dequeue_style( 'symple_shortcode_styles' );
	
	// Source Sans Pro - Google Font
	wp_enqueue_style( 'source-sans-pro', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic&subset=latin,latin-ext' );
	
	// Remove default contact 7 styling
	if( function_exists( 'wpcf7_enqueue_styles' ) ) {
		wp_dequeue_style( 'contact-form-7' );
	}



	/*******
	*** jQuery
	*******************/
	
	// Main Scripts
	wp_enqueue_script( 'wpex-plugins', WPEX_JS_DIR .'/plugins.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'wpex-global', WPEX_JS_DIR .'/global.js', array( 'jquery', 'wpex-plugins' ), '2.0', true );
		
	// Homepage script
	if( is_front_page() ) {
			
		wp_enqueue_script( 'wpex-slider-home', WPEX_JS_DIR .'/slider-home.js', array( 'jquery', 'wpex-plugins' ), '1.0', true);
		
		
		//localize homepage slider
		$flex_params = array(
			'slideshow' 		=> of_get_option( 'slides_slideshow', '0' ),
			'randomize' 		=> of_get_option( 'slides_randomize', '0' ),
			'animation' 		=> of_get_option( 'slides_animation', 'slide' ),
			'direction' 		=> of_get_option( 'slides_direction', 'horizontal' ),
			'slideshowSpeed' 	=> of_get_option( 'slideshow_speed', '7000' ),
		);
		wp_localize_script( 'wpex-slider-home', 'flexLocalize', $flex_params );
			
	}
	
	// IE only
	//global $is_IE;
	//if ( $is_IE ) wp_enqueue_script( 'bulletin-ie', WPEX_JS_DIR .'/ie.js', array( 'jquery' ), 1.0, true);

	// Comment replies
	if(is_single() || is_page()) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Register
	wp_enqueue_script( 'wpex-ajax-load', WPEX_JS_DIR .'/ajax-load.js', array( 'jquery' ), 1.0, true);
	
	//localize ajax
	$ajax_params = array(
		'ajaxurl'	=> admin_url( 'admin-ajax.php' ),
	);
	wp_localize_script( 'wpex-ajax-load', 'wpexvars', $ajax_params );

	// Retina
	if ( of_get_option( 'enable_retina', '0' ) == '1' ) {
		wp_enqueue_script( 'retina', WPEX_JS_DIR .'/retina.js', array( 'jquery' ), '', true);
	}

} //end wpex_load_scripts()