<?php
/**
 * Custom page entry pagination function
 * @package Bulletin WordPress Theme
 * @since 1.0
 * @author WPExplorer : http://www.wpexplorer.com
 * @copyright Copyright (c) 2012, WPExplorer
 * @link http://www.wpexplorer.com
 */
  
function wpex_pagejump($pages = '', $range = 4) {
     $showitems = ($range * 2)+1; 
     global $paged;
     if(empty($paged)) $paged = 1;
	 
     if($pages == '') {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages) {
             $pages = 1;
         }
     }  
 
     if(1 != $pages) {
		echo '<div class="post-navigation clearfix"><div class="alignleft">';
		previous_posts_link('&larr; Older Posts');
		echo '</div><div class="alignright">';
		next_posts_link('Newer Posts &rarr;');
		echo '</div></div>';
     }
}