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
            <div class="social_common_main social_fb_main">
                <!--<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wpshp_footer_social_sites/wpshp_facebook.png ?>" style='float: left;margin-right: 10px;'/>-->
                <!--<style>
                        .slide{
                                background-image: url(<?php echo the_post_thumbnail_url(); ?>);
                        }
                        </style>-->
                <div class="social_fb social_common"></div>
                <p>Facebook</p>    
            </div>
        </a>
        <a href="<?php echo get_option('wpshp_twitter_url'); ?>">
            <div class="social_common_main social_twitter_main">
                <!--<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wpshp_footer_social_sites/wpshp_twitter.png ?>" style='float: left;margin-right: 10px;'>-->
                <div class="social_twitter social_common"></div>
                <p>Twitter</p> 
            </div>
        </a>
        <a href="<?php echo get_option('wpshp_linkedin_url'); ?>">
            <div class="social_common_main social_linkedin_main">
                <!--<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wpshp_footer_social_sites/wpshp_linkedin.png ?>" style='float: left;margin-right: 10px;'>-->
                <div class="social_linkedin social_common"></div>
                <p>Linked In</p>
            </div>
        </a>
        <a href="<?php echo get_option('wpshp_rss_url'); ?>">
            <div class="social_common_main social_rss_main">
                <!--<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wpshp_footer_social_sites/wpshp_rss.png?>" style='float: left;margin-right: 10px;'>-->
                <div class="social_rss social_common"></div>
                <p>RSS</p>
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