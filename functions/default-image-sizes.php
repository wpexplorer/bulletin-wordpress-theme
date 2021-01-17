<?php

/**
 * Creates a function for your featured image sizes which can be altered via your child theme
 * @package Bulletin WordPress Theme
 * @since 1.0
 * @author WPExplorer : http://www.wpexplorer.com
 * @copyright Copyright (c) 2012, WPExplorer
 * @link http://www.wpexplorer.com
 */
 
if ( ! function_exists( 'wpex_img_heights' ) ) :
	function wpex_img($args){
		
		//slides
		if( $args == 'slide_width' ) return '728';
		if( $args == 'slide_height' ) return '9999';
		if( $args == 'slide_crop' ) return false;
		
		//blog entries
		if( $args == 'entry_width' ) return '400';
		if( $args == 'entry_height' ) return '320';
		if( $args == 'entry_crop' ) return true;
		
		//blog posts
		if( $args == 'post_width' ) return '980';
		if( $args == 'post_height' ) return '9999';
		if( $args == 'post_crop' ) return false;
		
	}
endif;