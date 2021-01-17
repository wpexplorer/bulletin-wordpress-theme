<?php
/**
 * Page.php is used to render your regular pages.
 * @package Bulletin WordPress Theme
 * @since 1.0
 * @author WPExplorer : http://www.wpexplorer.com
 * @copyright Copyright (c) 2012, WPExplorer
 * @link http://www.wpexplorer.com
 */

get_header(); // Loads the header.php template
get_sidebar(); // Loads the sidebar.php file

if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="post" class="clearfix">
	<?php
	// Show featured image
    if( has_post_thumbnail() ) {
		echo '<div id="page-featured-img"><img src="'. wp_get_attachment_url( get_post_thumbnail_id() ) .'" alt="'. get_the_title() .'" /></div>';
	} ?>
    <header id="page-heading"><h1><?php the_title(); ?></h1></header>
    <article class="entry clearfix">	
        <?php the_content(); ?>
    </article><!-- /entry -->
</div><!-- /post -->
 
<?php
endwhile; endif; // End loop
get_footer(); // Loads the footer.php file