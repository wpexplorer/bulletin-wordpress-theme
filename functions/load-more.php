<?php
/**
 * Aqua Functions
 * 
 * @author: Syamil MJ
 * @authoruri: http://aquagraphite.com
 *
 * ** CONTENT **
 * * ajax scrolling
 * * 
 *
 */

/* loads content via ajax on homepage */
add_action('wp_ajax_aq_ajax_scroll', 'aq_ajax_scroll');
add_action('wp_ajax_nopriv_aq_ajax_scroll', 'aq_ajax_scroll');

function aq_ajax_scroll() {
	
	$page = $_POST['pagenum'];
	$archive_type = $_POST['archive_type'];
	$archive_id = $_POST['archive_id'];
	$archive_month = $_POST['archive_month'];
	$archive_year = $_POST['archive_year'];
	$post_format = $_POST['post_format'];
	$author = $_POST['author'];
	$s = $_POST['s'];
	
	$args = array(
		'paged' 		=> $page,
		'post_status'	=> 'publish'
	);
	
	if(!empty($archive_type)) {
		switch($archive_type) {
			case 'category':
				$args['cat'] = $archive_id;
				break;
			case 'post_tag':
				$args['tag_id'] = $archive_id;
				break;
			case 'date':
				$args['monthnum'] = $archive_month;
				$args['year'] = $archive_year;
				break;
		}
	}
	
	if(!empty($post_format)) {
		$args['tax_query'] = array(
			array(
				'taxonomy'	=> 'post_format',
				'field'		=> 'slug',
				'terms'		=> "post-format-$post_format"
			)
		);
	}
	
	if(!empty($author)) {
		$args['author'] = $author;
	}
	
	if(!empty($s)) {
		$args['s'] = $s;
	}
	
	query_posts($args);
	
	//let's capture the output
	ob_start();
	if (have_posts()) { 
		while (have_posts()) {
			the_post();
			get_template_part( 'content', get_post_format() );
		}
	}
	$output = ob_get_clean();
	
	echo $output;
	
	wp_die();
}


function aq_load_more($page = 2, $archive = null) {
	global $wp_query;
	
	$output = '';
	
	//build up the query data
	$archive_type = '';
	$archive_id = '';
	$archive_month = '';
	$archive_year = '';
	$post_format = isset($wp_query->post_format) ? $wp_query->post_format : '';
	$author = isset($wp_query->author) ? $wp_query->author : '';
	
	if (is_category()) {
		$archive_type = 'category';
		$archive_id = get_query_var('cat');
	} elseif (is_tag()) {
		$archive_type = 'post_tag';
		$archive_id = get_query_var('tag');
	} elseif( is_date() ) {
		$archive_type = 'date';
		$archive_month = get_query_var('monthnum');
		$archive_year = get_query_var('year');
	}
	
	$maxpage = $wp_query->max_num_pages;

	
	//display load more if next page exists
	if( $maxpage >= 2) {
		$output .= '<div id="load-more">';
			$output .= '<input id="ajax-scroll-nonce" type="hidden" value="'. wp_create_nonce  ('ajax-scroll') .'" />';
			$output .= '<a href="#" data-pagenum="'. $page .'" data-maxpage="'. $maxpage .'" data-archive_type="'. $archive_type .'" data-archive_id="'. $archive_id .'" data-post_format="'. $post_format .'" data-author="'. $author .'" data-archive_month="'. $archive_month .'" data-archive_year="'. $archive_year .'" data-s="'.get_query_var('s').'" alt="'. __('Load More', 'wpex').'"></a>';
			$output .= '<div id="load-more-txt">'. __('load more posts', 'framework') .'</div>';
		$output .= '</div>';
	}
	
	return $output;
}