<?php
/**
 * Image.php is used to showcase your image media files.
 * @package Bulletin WordPress Theme
 * @since 1.0
 * @author WPExplorer : http://www.wpexplorer.com
 * @copyright Copyright (c) 2012, WPExplorer
 * @link http://www.wpexplorer.com
 */

get_header(); // Loads the header.php template
get_sidebar(); // Loads the sidebar.php file ?>

<div id="post">

    <div id="page-heading">
        <h1><?php the_title(); ?></h1>	
    </div><!-- /page-heading -->
    <div id="img-wpexch-page">
		<a href="<?php echo wp_get_attachment_url( get_the_ID() ); ?>" class="fancybox">
			<?php echo preg_replace('#(width|height)="\d+"#','', wp_get_attachment_image( get_the_ID(), 'large' ) );?>
		</a>
    </div><!-- /img-wpexch-page -->

</div><!-- /post -->

<?php get_footer(); // Loads the footer.php file