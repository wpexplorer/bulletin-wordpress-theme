<?php
/**
 * Default file for single regular posts.
 * @package Bulletin WordPress Theme
 * @since 1.0
 * @author WPExplorer : http://www.wpexplorer.com
 * @copyright Copyright (c) 2012, WPExplorer
 * @link http://www.wpexplorer.com
 */
 
get_header(); // Loads the header.php template
get_sidebar(); // Get template sidebar

// Loop
if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div id="post" class="post-single clearfix">     
        
        <header id="page-heading">
            <h1><?php the_title(); ?></h1>
            <div class="post-pagination top clearfix">
                <div class="post-prev"><?php next_post_link('%link', '&larr; '. __('prev','wpex'), false); ?></div> 
                <div class="post-next"><?php previous_post_link('%link', __('next','wpex'). ' &rarr;', false); ?></div>
            </div><!-- /post-pagination -->
        </header><!-- /page-heading -->

		<?php if( !post_password_required() ) { ?>
        	<?php get_template_part( 'content', get_post_format() ); ?>
        <?php } ?>

        <article class="entry clearfix">
			<?php the_content(); // This is your main post content output ?>
		</article><!-- /entry -->
        
        <?php if( !post_password_required() ) { ?>
        
            <ul class="meta clearfix">
                <li class="date"><span><?php _e('Posted On', 'wpex'); ?></span>: <?php echo get_the_date(); ?></li> 
                <li class="author"><span><?php _e('By', 'wpex'); ?></span>: <?php the_author_posts_link(); ?></li>
                <?php if( get_the_category() ) { ?><li class="category"><span><?php _e('Under', 'wpex'); ?></span>: <?php the_category(' &middot; '); ?></li><?php } ?>
            </ul><!-- /meta -->
               
            <?php wp_link_pages(); // Paginate pages when <!- next --> is used ?>
                
            <?php comments_template(); ?>
            
            <div class="post-pagination bottom clearfix">
                    <div class="post-prev"><?php next_post_link('%link', '&larr; '. __('prev','wpex'), false); ?></div> 
                    <div class="post-next"><?php previous_post_link('%link', __('next','wpex'). ' &rarr;', false); ?></div>
            </div><!-- /post-pagination -->
        
        <?php } ?>
                
    </div><!-- /post -->

<?php
endwhile; endif; // End main loop
get_footer(); // Get template footer