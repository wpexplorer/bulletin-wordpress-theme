<?php
/**
 * Featured Posts Widget
 * @package Bulletin WordPress Theme
 * @since 1.0
 * @author WPExplorer : http://www.wpexplorer.com
 * @copyright Copyright (c) 2012, WPExplorer
 * @link http://www.wpexplorer.com
 * @author WPExplorer : http://www.wpexplorer.com
 */
 
class wpex_recent_posts_thumb extends WP_Widget {
    /** constructor */
    function wpex_recent_posts_thumb() {
        parent::WP_Widget(false, $name = __('Featured Posts','wpex') );
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
		$category = apply_filters('widget_title', $instance['category']);
        $number = apply_filters('widget_title', $instance['number']);
        $offset = apply_filters('widget_title', $instance['offset']); ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
							<ul class="wpex-widget-recent-posts">
							<?php
								global $post;
								$tmp_post = $post;
								$args = array(
									'numberposts' => $number,
									'offset'=> $offset,
									'category' => $category,
                  'supress_filters' => false,
								);
								$myposts = get_posts( $args );
								foreach( $myposts as $post ) : setup_postdata($post);
								if( has_post_thumbnail() ) {  ?>
									<li class="clearfix">
										<a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>" class="title">
                                        	<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), 50, 50, true ); ?>" alt="<?php wpex_esc_title(); ?>" />
                                        </a>
                                        <a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>">
											<?php
                                            $title = get_the_title();
											if ( strlen($title) > 5 )
											$title = wp_trim_words($title, 5);
											echo $title; ?>
                                        </a>
                                        <div class="date"><?php echo get_the_date(); ?></div>
                                    </li>
                               <?php
                               } endforeach;
							   $title = NULL;
							   $post = $tmp_post; ?>
							</ul>
              <?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
	$instance = $old_instance;
	$instance['title'] = strip_tags($new_instance['title']);
	$instance['category'] = strip_tags($new_instance['category']);
	$instance['number'] = strip_tags($new_instance['number']);
	$instance['offset'] = strip_tags($new_instance['offset']);
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {	
	    $instance = wp_parse_args( (array) $instance, array(
			'title' => __('Recent Posts','wpex'),
			'category' => '',
			'number' => '5',
			'offset'=> '0'
		));					
        $title = esc_attr($instance['title']);
		$category = esc_attr($instance['category']);
        $number = esc_attr($instance['number']);
        $offset = esc_attr($instance['offset']); ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'wpex'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title','wpex'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Select a Category:', 'wpex'); ?></label>
            <br />
            <select class='wpex-select' name="<?php echo $this->get_field_name('category'); ?>" id="<?php echo $this->get_field_id('category'); ?>">
            <option value="all-cats" <?php if($category == 'all-cats') { ?>selected="selected"<?php } ?>><?php _e('All', 'wpex'); ?></option>
            <?php
            //get terms
            $cat_terms = get_terms('category', array( 'hide_empty' => '1' ) );
            foreach ( $cat_terms as $cat_term) { ?>
                <option value="<?php echo $cat_term->term_id; ?>" id="<?php echo $cat_term->term_id; ?>" <?php if($category == $cat_term->term_id) { ?>selected="selected"<?php } ?>><?php echo $cat_term->name; ?></option>
            <?php } ?>
            </select>
        </p>
        
		<p>
          <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number to Show:', 'wpex'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Offset (the number of posts to skip):', 'wpex'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('offset'); ?>" name="<?php echo $this->get_field_name('offset'); ?>" type="text" value="<?php echo $offset; ?>" />
        </p>
        <?php
    }


} // class wpex_recent_posts_thumb
// register Recent Posts widget
add_action('widgets_init', create_function('', 'return register_widget("wpex_recent_posts_thumb");'));	
?>