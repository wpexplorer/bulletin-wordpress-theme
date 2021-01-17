<?php
/**
 * Header.php is generally used on all the pages of your site and is called somewhere near the top
 * of your template files. It's a very important file that should never be deleted.
 * @package Bulletin WordPress Theme
 * @since 1.0
 * @author WPExplorer : http://www.wpexplorer.com
 * @copyright Copyright (c) 2012, WPExplorer
 * @link http://www.wpexplorer.com
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<!-- WordPress Themes by WPExplorer.com -->
	<?php wpex_hook_head_top(); ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script><![endif]-->
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <!--[if IE 8]><link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie8.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie7.css" media="screen" /><![endif]-->
    <?php wpex_hook_head_bottom(); ?>
    <?php wp_head(); // Very important WordPress core hook. If you delete this bad things WILL happen. ?>
    
</head><!-- /end head -->


<!-- Begin Body
================================================== -->
<body <?php body_class(); ?>>

<?php if ( of_get_option( 'notification', '0' ) ) { ?>
    <div id="callout">
        <div id="callout-inner">
            <?php echo do_shortcode( of_get_option( 'notification' ) ); ?>
        </div><!-- /callout-exit -->
        <a href="#" id="callout-exit"><?php _e( 'Close Notification','wpex' ); ?></a>
    </div><!-- /callout -->
    <a href="#" id="callout-open"><?php _e( 'Open Notification','wpex' ); ?></a>
<?php } ?>

<div id="wrap" class="clearfix">
	<?php wpex_hook_content_before(); ?>
    <div id="main-content" class="clearfix">
    <?php wpex_hook_content_top(); ?>