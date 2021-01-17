<?php
/**
 * Archive.php renders your categories, tags and archive pages
 * @package Bulletin WordPress Theme
 * @since 1.0
 * @author WPExplorer : http://www.wpexplorer.com
 * @copyright Copyright (c) 2012, WPExplorer
 * @link http://www.wpexplorer.com
 */

get_header(); // Loads the header.php template
get_sidebar(); // Loads the sidebar.php file ?>

<div id="post" class="post clearfix"> 

    <header id="page-heading"><h1><?php echo single_term_title(); ?></h1></header><!-- /page-heading -->
  
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
		echo aq_load_more();
	} else {
		wpex_pagination();
	} ?>
</div><!-- /post -->

<?php get_footer(); // Loads the footer.php file