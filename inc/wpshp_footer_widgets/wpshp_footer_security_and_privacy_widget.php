<?php 

class Wpshp_Footer_Social_And_Privacy_Widget extends WP_Widget {

    // setup the widget name, description, etc..

    public function __construct(){

        $widget_options = array(
            'classname' => 'wpshp-footer-social-and-privacy-widget',
            'description' => __('Custom widget to display custom menus of security and privacy', 'wpshp'),
        );
        parent::__construct(
            'wpshp_footer_social_and_privacy_widget',
            __('Security & Privacy', 'wpshp'),
            $widget_options
        );

    }

    /** WP_Widget::form */
    function form($instance) {

	    $title 		= esc_attr($instance['title']);
	    $number	= esc_attr($instance['number']);
	    $exclude	= esc_attr($instance['exclude']);
	    
	    ?>
	    
	    <p>
	        <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of categories to display'); ?></label>
	        <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
	    </p>
	    
	    <?php
}

    
    /** WP_Widget::update */
    function update($new_instance, $old_instance) {
	    $instance = $old_instance;
	    $instance['title'] = strip_tags($new_instance['title']);
	    $instance['number'] = strip_tags($new_instance['number']);
	    
	    return $instance;
    }

    //front-end display of widget

    /** WP_Widget::widget */
    function widget($args, $instance) {
	    extract( $args );


	    ?>
		<?php echo $before_widget; ?>
	    
        <h3>SECURITY & PRIVACY</h3>
        

        <div class="footersitenav">                  
            <?php wp_nav_menu( array('theme_location' => 'security_privacy_menu') ); ?>  
        </div>
         
    		
    	<?php echo $after_widget; ?>
	<?php
    }

}

// registering the custom widget for footer social and privacy menus
add_action('widgets_init', function(){
    register_widget('Wpshp_Footer_Social_And_Privacy_Widget');
}); 