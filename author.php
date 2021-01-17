<?php
/**
 * Author.php loads the author pages with a listing of their posts
 * @package Bulletin WordPress Theme
 * @since 1.0
 * @author WPExplorer : http://www.wpexplorer.com
 * @copyright Copyright (c) 2012, WPExplorer
 * @link http://www.wpexplorer.com
 */

get_header(); // Loads the header.php template
get_sidebar(); // Loads the sidebar.php file

if(have_posts()) : ?>

<div id="post" class="post clearfix">  

    <header id="page-heading">
        <?php
        if(isset($_GET['author_name'])) :
        $curauth = get_userdatabylogin($author_name);
        else :
        $curauth = get_userdata(intval($author));
        endif;
        ?>
        <h1><?php _e('Posts by','wpex'); ?>: <?php echo $curauth->display_name; ?></h1>
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
	} ?>
    
</div><!--/post -->

<?php
endif; // end loop
get_footer(); // Loads the footer.php file