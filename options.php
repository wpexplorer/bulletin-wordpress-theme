<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {
    $optionsframework_settings = get_option( 'optionsframework' );
    $optionsframework_settings["id"] = 'options_wpex_themes';
    update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'wpex'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	$options = array();
	
	//GENERAL	
	$options[] = array(
		"name" 	=> __('General', 'wpex'),
		"type" 	=> 'heading',
	);
		
	$options[] = array(
		"name" 	=> __('Custom Logo', 'wpex'),
		"desc" 	=> __('Upload your custom logo.', 'wpex'),
		"std" 	=> '',
		"id" 	=> 'custom_logo',
		"type" 	=> 'upload',
	);
	
	$options[] = array(
		"name" 	=> __('Notification Bar', 'att'),
		"desc" 	=> __('Enter your text for the notification bar.', 'att'),
		"std" 	=> 'This is your notification bar...you can <a href="#">add a link here &rarr;</a> if you want.',
		"id" 	=> 'notification',
		"type" 	=> 'textarea',
	);
	
	$options[] = array(
		"name" 	=> __('Custom Excerpt Lenght', 'wpex'),
		"desc" 	=> __('Enter your desired custom excerpt length.', 'wpex'),
		"id" 	=> 'excerpt_length',
		"std" 	=> '17',
		"type" 	=> 'text'
	);
		
	$options[] = array(
		"name" 	=> __('AJAX Loading Instead of Pagination?', 'wpex'),
		"desc" 	=> __('Check box to enable the load more button rather then generic 1,2,3 pagination.', 'wpex'),
		"id" 	=> 'ajax_loading',
		"std" 	=> '1',
		"type" 	=> 'checkbox',
	);
		
	$options[] = array(
		"name" 	=> __('Custom WP Gallery?', 'wpex'),
		"desc" 	=> __('This theme outputs a custom gallery style for the WordPress shortcode, if you don\'t like it or are using a plugin for this you can unselect the custom functionality here.', 'wpex'),
		"id" 	=> 'custom_wp_gallery',
		"std" 	=> '1',
		"type" 	=> 'checkbox'
	);
		
	$options[] = array(
		"name" 	=> __('Enable Retina Support', 'wpex'),
		"desc"	=> __('Check this box to enable retina support for featured images. If enabled for every cropped featured image the theme will create a second one that is retina optimized. So keep disabled to save server space.', 'wpex'),
		"id"	=> 'enable_retina',
		"std"	=> '0',
		"type"	=> 'checkbox'
	);
	
	$options[] = array(
		"name" 	=> __('Featured Images For Single Posts', 'wpex'),
		"desc"	=> __('Check this box to enable the display of featured images in single posts.', 'wpex'),
		"id"	=> 'single_thumb',
		"std"	=> '1',
		"type"	=> 'checkbox'
	);
		
	
	//HOMEPAGE	
	$options[] = array(
		"name" 	=> __('Home', 'wpex'),
		"type" 	=> 'heading',
	);	
		
	$options[] = array(
		"name" 	=> __('Homepage Content', 'att'),
		"desc" 	=> __('Use this field to add content to your homepage area right below the main slider (or instead of the slider if you aren\'t using it) and right above the latest posts.', 'att'),
		"std" 	=> '',
		"id" 	=> 'homepage_content',
		"type" 	=> 'editor',
	);
			
		
	//Slider
	$options[] = array(
		"name" 	=> __('Slides', 'att'),
		"type" 	=> 'heading',
	);
			
		if ( class_exists( 'Symple_Slides_Post_Type' ) ) {
				
			$options[] = array(
				"name" 		=> __('Toggle: Slideshow', 'att'),
				"desc" 		=> __('Check this box to enable automatic slideshow for your slides.', 'att'),
				"id" 		=> "slides_slideshow",
				"std" 		=> "true",
				"type" 		=> "select",
				"options" 	=> array(
					'true' 		=> 'true',
					'false' 	=> 'false'
			) );
				
			$options[] = array(
				"name" 		=> __('Toggle: Randomize', 'att'),
				"desc" 		=> __('Check this box to enable the randomize feature for your slides.', 'att'),
				"id" 		=> "slides_randomize",
				"std" 		=> "false",
				"type" 		=> "select",
				"options" 	=> array(
					'true' 		=> 'true',
					'false' 	=> 'false'
			) );
				
			$options[] = array(
				"name" 		=> __('Animation', 'att'),
				"desc" 		=> __('Select your animation of choice.', 'att'),
				"id" 		=> "slides_animation",
				"std" 		=> "slide",
				"type" 		=> "select",
				"options" 	=> array(
					'fade' 		=> 'fade',
					'slide' 	=> 'slide'
			) );
				
			$options[] = array(
				"name" 		=> __('Direction', 'att'),
				"desc" 		=> __('Select the direction for your slides. Slide animation only & if using the <strong>vertical direction</strong> all slides must have the same height.', 'att'),
				"id" 		=> "slides_direction",
				"std" 		=> "horizontal",
				"type" 		=> "select",
				"options" 	=> array(
					'horizontal' 	=> 'horizontal',
					'vertical' 		=> 'vertical'
			) );
				
			$options[] = array(
				"name" 	=> __('SlideShow Speed', 'att'),
				"desc" 	=> __('Enter your preferred slideshow speed in milliseconds.', 'att'),
				"id" 	=> "slideshow_speed",
				"std" 	=> "7000",
				"type" 	=> "text",
			);
				
			$options[] = array(
				"name" 	=> __('Animation Speed', 'att'),
				"desc" 	=> __('Enter your preferred animation speed in milliseconds.', 'att'),
				"id" 	=> "animation_speed",
				"std" 	=> "600",
				"type" 	=> "text",
			);
		}
			
		$options[] = array(
			"name" 	=> __('Slider Alternative', 'att'),
			"desc" 	=> __('If you prefer to use another slider you can enter the <strong>shortcode</strong> here.', 'att'),
			"id" 	=> "slides_alt",
			"std" 	=> "",
			"type" 	=> "textarea",
		);

	return $options;
}
?>