<?php
/**
 * Index.php is the default template. This file is used when a more specific template can not be found to display your posts.
 * It is unlikely this template file will ever be used, but it's here to back you up just incase.
 *
 *
 * @package Bulletin WordPress Theme
 * @since 1.0
 * @author WPExplorer : http://www.wpexplorer.com
 * @copyright Copyright (c) 2012, WPExplorer
 * @link http://www.wpexplorer.com
 */

get_header(); // Loads the header.php template
get_sidebar(); //get template sidebar ?>

<div id="post" class="clearfix">
	<?php if (have_posts()) : ?>
	<div id="post-entries" class="clearfix">
		<?php
		// Loop through posts
		while ( have_posts() ) : the_post();
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

<?php get_footer(); //get template footer