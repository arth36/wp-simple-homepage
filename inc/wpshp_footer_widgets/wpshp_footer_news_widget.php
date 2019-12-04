<?php 

class Wpshp_Footer_News_widget extends WP_Widget {

    // setup the widget name, description, etc..

    public function __construct(){

        $widget_options = array(
            'classname' => 'wpshp-footer-news-widget',
            'description' => __('Custom widget to display Latest Posts of news category.','wpshp'),
        );
        parent::__construct(
            'wpshp_footer_news_widget',
            __('Latest News', 'wpshp'),
            $widget_options
        );

    }

    /** WP_Widget::form */
    function form($instance) {

	    $number	= esc_attr($instance['number']);
	    
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
	    $instance['number'] = strip_tags($new_instance['number']);
	    
	    return $instance;
    }

    //front-end display of widget

    /** WP_Widget::widget */
    function widget($args, $instance) {
	    extract( $args );
	    
	    $number 	= $instance['number']; // the number of categories to show
	    
			
	    $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'category_name' => 'news',
            'posts_per_page' => 3,
		);
	
	    // retrieves an array of categories or taxonomy terms
	    $arr_posts = new WP_Query($args);

        

	    ?>
		<?php echo $before_widget; ?>
	    
        <h3>LATEST NEWS</h3>
        
        <?php
        if ( $arr_posts -> have_posts() ):
            while( $arr_posts -> have_posts() ):
                $arr_posts -> the_post();
            
        ?>
        <ul>
            <li>
                <a href="<?php echo get_permalink( $id ) ?>"> 
                    <?php echo the_title(); ?>
                </a>
            </li>
        </a>
        </ul>
		
        <?php 
            endwhile;
        endif; 
        ?>
		
    	<?php echo $after_widget; ?>
	<?php
    }

}

// registering the custom widget for footer latest news
add_action('widgets_init', function(){
    register_widget('Wpshp_Footer_News_widget');
});