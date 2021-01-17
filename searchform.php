<?php
/**
 * Default searchform
 * @package Bulletin WordPress Theme
 * @since 1.0
 * @author WPExplorer : http://www.wpexplorer.com
 * @copyright Copyright (c) 2012, WPExplorer
 * @link http://www.wpexplorer.com
 */
?>
<form method="get" id="searchbar" action="<?php echo home_url( '/' ); ?>"><input type="search" name="s" value="<?php _e('Type and hit enter to search', 'wpex'); ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"></form>