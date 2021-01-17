<?php
/**
 * Footer.php outputs the code for footer hooks and closing body/html tags
 * @package Bulletin WordPress Theme
 * @since 1.0
 * @author WPExplorer : http://www.wpexplorer.com
 * @copyright Copyright (c) 2012, WPExplorer (TM)
 * @link http://www.wpexplorer.com
 */
?>

		<div class="clear"></div><!-- /clear any floats -->
		<?php wpex_hook_content_bottom(); ?>
	</div><!-- /main-content -->
	<?php wpex_hook_content_after(); ?>
</div><!-- /wrap -->

<?php wpex_hook_footer_before(); ?>
<div id="footer-wrap">
    <footer id="footer">
    <?php wpex_hook_footer_top(); ?>
        <div id="footer-widgets" class="clearfix">
            <div class="footer-box one">
                <?php dynamic_sidebar('footer-one'); ?>
            </div><!-- /footer-box -->
            <div class="footer-box two">
                <?php dynamic_sidebar('footer-two'); ?>
            </div><!-- /footer-box -->
            <div class="footer-box three">
                <?php dynamic_sidebar('footer-three'); ?>
            </div><!-- /footer-box -->
        </div><!-- /footer-widgets -->
        <?php wpex_hook_footer_bottom(); ?>
    </footer><!-- /footer -->
</div><!-- /footer-wrap -->
<?php wpex_hook_footer_after(); ?>

<?php wp_footer(); // Footer hook, do not delete, ever ?>
</body>
</html>