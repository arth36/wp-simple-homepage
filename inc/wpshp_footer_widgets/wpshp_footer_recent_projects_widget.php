<?php 

class Wpshp_Recent_Projects_Widget extends WP_Widget {

    // setup the widget name, description, etc..

    public function __construct(){

        $widget_options = array(
            'classname' => 'wpshp-footer-recent-projects-widget',
            'description' => __('Custom widget to display recent Project which has been done by us.', 'wpshp'),
        );
        parent::__construct(
            'wpshp_footer_recent_projects_widget',
            __('Recent Projects', 'wpshp'),
            $widget_options
        );

    }

    /** WP_Widget::form */
    function form($instance) {

	    $number	= esc_attr($instance['number']);
	    
	    ?>
	    
	    <p>Custom widget to display recent Project which has been done by us</p>
	    
	    <?php
}

    
    /** WP_Widget::update */
    function update($new_instance, $old_instance) {
	    $instance = $old_instance;
	    $instance['number'] = strip_tags($new_instance['number']);
	    
	    return $instance;
    }

    //front-end display of widget

    /** WP_Widget::widget */
    function widget($args, $instance) {
	    extract( $args );
	    
	    ?>
		<?php echo $before_widget; ?>
	    
        <h3>RECENT PROJECTS</h3>
        
        <div class="recent-projects">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wpshp_footer_recent_projects/wpshp_recent_projects_first.jpg?>">
        </div>
        <div class="recent-projects">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wpshp_footer_recent_projects/wpshp_recent_projects_second.jpg?>">
        </div>
        <div class="recent-projects">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wpshp_footer_recent_projects/wpshp_recent_projects_third.jpg?>">
        </div>
		
    	<?php echo $after_widget; ?>
	<?php
    }

}

// registering the custom widget for footer recent projects
add_action('widgets_init', function(){
    register_widget('Wpshp_Recent_Projects_Widget');
});