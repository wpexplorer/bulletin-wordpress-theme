<?php
/**
 * Sidebar.php is used to show your sidebar widgets on pages/posts
 * @package Bulletin WordPress Theme
 * @since 1.0
 * @author WPExplorer : http://www.wpexplorer.com
 * @copyright Copyright (c) 2012, WPExplorer
 * @link http://www.wpexplorer.com
 */
?>

<?php wpex_hook_sidebar_before(); ?>
<aside id="sidebar">
	<?php wpex_hook_sidebar_top(); ?>
     <div id="logo">
        <?php
		// Show custom image logo if defined in the admin
		if( of_get_option('custom_logo','') !== '' ) { ?>
			<a href="<?php echo home_url(); ?>/" title="<?php get_bloginfo( 'name' ); ?>" rel="home"><img src="<?php echo of_get_option('custom_logo'); ?>" alt="<?php get_bloginfo( 'name' ) ?>" /></a>
		<?php }
		// No custom img logo - show text
			else { ?>
			 <h2><a href="<?php echo home_url(); ?>/" title="<?php get_bloginfo( 'name' ); ?>" rel="home"><?php echo get_bloginfo( 'name' ); ?></a></h2>
		<?php } ?>
	</div><!-- /logo -->
    
    <a href="#" title="<?php _e('Toggle', 'wpex'); ?>" id="toggle-sidebar"></a>
    <div id="dynamic-sidebar">
        <?php
        // Custom menu
		wp_nav_menu( array(
                'theme_location' => 'primary',
                'sort_column' => 'menu_order',
                'fallback_cb' => false,
				'menu_class' => 'sidebar-box primary-menu clearfix'
		));
		
		// Sidebar widgets
		dynamic_sidebar('sidebar'); ?>
        <a href="#" title="<?php _e('Toggle', 'wpex'); ?>" id="toggle-sidebar-bottom"></a>
    </div><!-- /dynamic-sidebar -->
    <?php wpex_hook_sidebar_bottom(); ?>
</aside><!-- /sidebar -->
<?php wpex_hook_sidebar_after(); ?>