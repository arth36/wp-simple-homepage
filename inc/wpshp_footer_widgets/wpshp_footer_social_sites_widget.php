<?php 

class Wpshp_Footer_Social_Sites_Widget extends WP_Widget {

    // setup the widget name, description, etc..

    public function __construct(){

        $widget_options = array(
            'classname' => 'wpshp-footer-social-sites-widget',
            'description' => __('Custom widget to display social sites', 'wpshp'),
        );
        parent::__construct(
            'wpshp_footer_social_sites_widget',
            __('Stay In Touch', 'wpshp'),
            $widget_options
        );

    }

    /** WP_Widget::form */
    function form($instance) {

	    	    
	    ?>
	    
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
	    
        <h3>STAY IN TOUCH</h3>
        <div>
        
        <a href="<?php echo get_option('wpshp_fb_url'); ?>">
            <div style="margin-bottom: 10px;">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wpshp_footer_social_sites/wpshp_facebook.png ?>" style='float: left;margin-right: 10px;'/>
                <p style="color:#888;">Facebook</p>    
            </div>
        </a>
        <a href="<?php echo get_option('wpshp_twitter_url'); ?>">
            <div style="margin-bottom: 10px;">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wpshp_footer_social_sites/wpshp_twitter.png ?>" style='float: left;margin-right: 10px;'>
                <p style="color:#888;">Twitter</p> 
            </div>
        </a>
        <a href="<?php echo get_option('wpshp_linkedin_url'); ?>">
            <div style="margin-bottom: 10px;">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wpshp_footer_social_sites/wpshp_linkedin.png ?>" style='float: left;margin-right: 10px;'>
                <p style="color:#888;">Linked In</p>
            </div>
        </a>
        <a href="<?php echo get_option('wpshp_rss_url'); ?>">
            <div style="margin-bottom: 10px; ">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wpshp_footer_social_sites/wpshp_rss.png?>" style='float: left;margin-right: 10px;'>
                <p style="color:#888;">RSS</p>
            </div>
        </a>
        </div>

    	<?php echo $after_widget; ?>
	<?php
    }

}

// registering the custom widget for footer social sites
add_action('widgets_init', function(){
    register_widget('Wpshp_Footer_Social_Sites_Widget');
});  