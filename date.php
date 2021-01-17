<?php
/**
 * Date.php is used for date based archives
 * @package Bulletin WordPress Theme
 * @since 1.0
 * @author WPExplorer : http://www.wpexplorer.com
 * @copyright Copyright (c) 2012, WPExplorer
 * @link http://www.wpexplorer.com
 */

get_header(); // Loads the header.php template
get_sidebar(); // Loads the sidebar.php file ?>

<div id="post" class="post clearfix"> 

    <header id="page-heading">
		<?php /* If this is a daily archive */ if ( is_day() ) { ?>
		<h1><?php _e('Archive For','wpex'); ?> <?php the_time( 'F jS, Y' ); ?></h1>
		<?php /* If this is a monthly archive */ } elseif ( is_month() ) { ?>
		<h1><?php _e('Archive For','wpex'); ?> <?php the_time( 'F, Y' ); ?></h1>
		<?php /* If this is a yearly archive */ } elseif ( is_year() ) { ?>
		<h1><?php _e('Archive For','wpex'); ?> <?php the_time( 'Y' ); ?></h1>
		<?php } ?>
    </header>
    <!-- /page-heading -->
  
	<?php if (have_posts()) : ?>
    <div id="post-entries" class="clearfix">
    	<?php
		// Loop through posts
		while (have_posts()) : the_post();
        	get_template_part( 'content', get_post_format() );  
		endwhile; ?>
	</div><!-- /post-entries -->
   <?php endif;
	if( of_get_option('ajax_loading', '1') == 1 ) {
		wp_enqueue_script('wpex-ajax-load');
		echo aq_load_more();
	} else {
		wpex_pagination();
	} ?>
</div><!-- /post -->

<?php get_footer(); // Loads the footer.php file