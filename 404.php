<?php
/**
 * 404.php is used when your server reaches a 404 error page
 * @package Bulletin WordPress Theme
 * @since 1.0
 * @author WPExplorer : http://www.wpexplorer.com
 * @copyright Copyright (c) 2012, WPExplorer
 * @link http://www.wpexplorer.com
 */

get_header(); // Loads the header.php template
get_sidebar(); //get template sidebar ?>

<div id="post">

    <div id="page-heading">
        <h1><?php _e('404: Page Not Found','wpex'); ?></h1>
    </div><!-- /page-heading -->
    
    <div id="error-page">			
        <p id="error-page-text" class="symple-box gray">
        <?php _e('Unfortunately, the page you tried accessing could not be retrieved. Please visit the','wpex'); ?> <a href="<?php echo home_url() ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php _e('homepage','wpex'); ?> &rarr;</a>
        </p>
    </div><!-- /error-page -->

</div><!-- /post -->

<?php get_footer(); //get template footer