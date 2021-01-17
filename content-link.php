<?php
/**
 * This file is used for your link entries and post media
 * @package Bulletin WordPress Theme
 * @since 1.0
 * @author WPExplorer : http://www.wpexplorer.com
 * @copyright Copyright (c) 2012, WPExplorer
 * @link http://www.wpexplorer.com
 */
 
 
/******************************************************
 * Single Posts
 * @since 1.0
*****************************************************/
if ( is_singular() && is_main_query() ) {
	

	if( of_get_option('blog_single_thumbnail', '1') == '1' && has_post_thumbnail() ) { ?>
		<div id="post-thumbnail">
			<a href="<?php echo get_post_meta( get_the_ID(), 'wpex_post_url', true); ?>" title="<?php wpex_esc_title(); ?>" target="_blank"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ),  wpex_img( 'post_width' ), wpex_img( 'post_height' ), wpex_img( 'post_crop' ) ); ?>" alt="<?php wpex_esc_title(); ?>" /></a>
		</div><!-- /post-thumbnail -->
	<?php }


/******************************************************
 * Entries
 * @since 1.0
*****************************************************/
} else {
	wp_enqueue_script('wpex-overlay'); ?>

	<article <?php post_class('post-entry grid-3 clearfix'); ?>>
		<?php if( has_post_thumbnail() ) {  ?>
			<div class="post-entry-thumbnail">
				<a href="<?php echo get_post_meta( get_the_ID(), 'wpex_post_url', true); ?>" title="<?php wpex_esc_title(); ?>" target="_blank">
					<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ),  wpex_img( 'entry_width' ), wpex_img( 'entry_height' ), wpex_img( 'entry_crop' ) ); ?>" alt="<?php wpex_esc_title(); ?>" />
					 <span class="overlay <?php echo get_post_format(); ?>"></span>
				</a>
			</div><!-- /post-entry-thumbnail -->
		<?php } ?>
		<div class="post-entry-details">
			<h3><a href="<?php echo get_post_meta( get_the_ID(), 'wpex_post_url', true); ?>" title="<?php wpex_esc_title(); ?>" target="_blank"><?php the_title(); ?></a></h3>
			<div class="post-entry-excerpt">
				<?php the_excerpt(); ?>
			</div><!-- /post-entry-excerpt -->
		</div><!-- /post-entry-details -->
	</article><!-- /post-entry -->

<?php } ?>