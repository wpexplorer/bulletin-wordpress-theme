<?php
/**
* Featured Image Caption Function
* @since 1.0
*/
if ( !function_exists( 'wpex_post_feat_img_caption' ) ) :
	function wpex_post_feat_img_caption() {
	  global $post;
	  $thumbnail_image = get_posts( array( 'p' => get_post_thumbnail_id( get_the_ID() ), 'post_type' => 'attchment' ) );
	   if ( $thumbnail_image[0]->post_content !== '' ) {
    		echo '<p class="single-portfolio-image-description clearfix">'.$thumbnail_image[0]->post_content.'</p>';
  		}
	}
endif;
?>