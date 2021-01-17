<?php
/**
 * This file is used for your video entries and post media
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
	
	if( get_post_meta($post->ID, 'wpex_post_video', true) !== '') {
		echo '<div id="post-video" class="responsive-video-wrap clr">'. wp_oembed_get( get_post_meta( get_the_ID(), 'wpex_post_video', true ) ) .'</div>';
	}

/******************************************************
 * Entries
 * @since 1.0
*****************************************************/
} else {
	wp_enqueue_script('wpex-overlay'); ?>

	<article <?php post_class('post-entry grid-3 clearfix'); ?>>
		<?php if( has_post_thumbnail() ) {  ?>
			<div class="post-entry-thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>">
					<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ),  wpex_img( 'entry_width' ), wpex_img( 'entry_height' ), wpex_img( 'entry_crop' ) ); ?>" alt="<?php wpex_esc_title(); ?>" />
					 <span class="overlay <?php echo get_post_format(); ?>"></span>
				</a>
			</div><!-- /post-entry-thumbnail -->
		<?php } ?>
		<div class="post-entry-details">
			<h3><a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>"><?php the_title(); ?></a></h3>
			<div class="post-entry-excerpt">
				<?php the_excerpt(); ?>
			</div><!-- /post-entry-excerpt -->
		</div><!-- /post-entry-details -->
	</article><!-- /post-entry -->

<?php } ?>