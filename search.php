<?php
/**
 * Search.php is used for your search result pages.
 * @package Bulletin WordPress Theme
 * @since 1.0
 * @author WPExplorer : http://www.wpexplorer.com
 * @copyright Copyright (c) 2012, WPExplorer
 * @link http://www.wpexplorer.com
 */

get_header(); // Loads the header.php template
get_sidebar(); // Loads the sidebar.php file ?>

<div id="post" class="clearfix">

	<?php if (have_posts()) : ?>

        <header id="page-heading">
        	<h1 id="archive-title"><?php _e('Search Results For','wpex'); ?> &#8220;<?php the_search_query(); ?>&#8221;</h1>
    	</header><!-- /page-heading -->
        
        <div id="post-entries" class="clearfix">
                <?php
                // Loop through posts
                while (have_posts()) : the_post();
                    get_template_part( 'content', get_post_format() );  
                endwhile; ?>
		</div><!-- /post-entries -->
        
        <?php
		if( of_get_option('ajax_loading', '1') == 1 ) {
			echo aq_load_more();
		} else {
			wpex_pagination();
		}
		
		else : ?>
    
        <header id="page-heading">
            <h1 id="archive-title"><?php _e('Search Results For','wpex'); ?>: <?php the_search_query(); ?></h1>
        </header><!-- /page-heading -->
        <div class="entry">
		<?php _e('No results found for that query.', 'wpex'); ?>
        </div><!-- /entry -->
        
	<?php endif; ?>

</div><!-- /post  -->

<?php get_footer(); // Loads the footer.php file