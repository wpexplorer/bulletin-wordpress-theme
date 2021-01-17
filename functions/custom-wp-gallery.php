<?php
/*
Plugin Name: Symple WP Gallery
Plugin URI: http://sympleplugins.com/symple-gallery
Description: Replaces the default WP gallery shortcode with a custom output
Author: Symple Workz
Author URI: http://sympleworkz.com
Version: 1.0
License: GNU General Public License version 3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/


// Replace default WP shortcode
if( !function_exists('symple_post_gallery') ) :
	add_filter( 'post_gallery', 'symple_post_gallery', 10, 2 );
	function symple_post_gallery( $output, $attr) {
		
		// load scripts
		global $post, $wp_locale;
	
		static $instance = 0;
		$instance++;
	
		// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
		if ( isset( $attr['orderby'] ) ) {
			$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
			if ( !$attr['orderby'] )
				unset( $attr['orderby'] );
		}
	
		extract(shortcode_atts(array(
			'order'      => 'ASC',
			'orderby'    => 'menu_order ID',
			'id'         => $post->ID,
			'itemtag'    => 'div',
			'icontag'    => 'div',
			'captiontag' => 'div',
			'columns'    => 3,
			'include'    => '',
			'exclude'    => ''
		), $attr));
	
		$id = intval($id);
		if ( 'RAND' == $order )
			$orderby = 'none';
	
		if ( !empty($include) ) {
			$include = preg_replace( '/[^0-9,]+/', '', $include );
			$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	
			$attachments = array();
			foreach ( $_attachments as $key => $val ) {
				$attachments[$val->ID] = $_attachments[$key];
			}
		} elseif ( !empty($exclude) ) {
			$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
			$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		} else {
			$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		}
	
		if ( empty($attachments) )
			return '';
	
		if ( is_feed() ) {
			$output = "\n";
			foreach ( $attachments as $symple_id => $attachment )
				$output .= wp_get_attachment_link($symple_id, $size, true) . "\n";
			return $output;
		}
	
		$itemtag = tag_escape($itemtag);
		$captiontag = tag_escape($captiontag);
		$columns = intval($columns);
		$float = is_rtl() ? 'right' : 'left';
	
		$selector = "gallery-{$instance}";
	
		$output = apply_filters('gallery_style', "<div id='$selector' class='gallery galleryid-{$id} symple-gallery gallery-{$columns}-column'>");
			
		$gallery_id = $id;
		$count=0;
		$i = 0;
		foreach ( $attachments as $id => $attachment ) {
		$count++;
		
		$remove_margin = '';
		if($count == $columns ){
			$remove_margin = 'remove-margin';
			$count=0;
		}
			
			$full_img =  wp_get_attachment_url( $id );
			
			if($columns > 1) {
				$img_url = aq_resize( wp_get_attachment_url( $id ),  370, 370, true );
			} else {
				$img_url = $full_img;
			}
	
			$output .= "<{$itemtag} class='gallery-item column-{$columns} {$remove_margin}'>";
			$output .= "
				<{$icontag} class='gallery-icon'>
				   <a href='{$full_img}' class='fancybox' title='{$attachment->post_excerpt}' rel='{$gallery_id}'><img src='{$img_url}' alt='{$attachment->post_excerpt}' /></a>
				</{$icontag}>";
			if ( $captiontag && trim($attachment->post_excerpt) ) {
				$output .= "
					<{$captiontag} class='gallery-caption'>
					" . wptexturize($attachment->post_excerpt) . "
					</{$captiontag}>";
			}
			$output .= "</{$itemtag}>";
			if ( $columns > 0 && ++$i % $columns == 0 )
				$output .= '<br style="clear: both" />';
		}
	
		$output .= "
				<div class='clear'></div>
			</div>\n";
	
		return $output;
	}
endif;