<?php
/**
 * wp-simple-homepage functions and definitions
 *
 * @package wpshp
 */

/**************************************************
    * includes
***************************************************/

include get_template_directory() . '/inc/wpshp_footer_widgets/wpshp_footer_news_widget.php'; // this controls footer news widget

include get_template_directory() . '/inc/wpshp_footer_widgets/wpshp_footer_recent_projects_widget.php'; // this controls footer recent projects widget

include get_template_directory() . '/inc/wpshp_footer_widgets/wpshp_footer_social_sites_widget.php'; // this controls footer social sites widget

include get_template_directory() . '/inc/wpshp_footer_widgets/wpshp_footer_security_and_privacy_widget.php'; // this controls footer custom menu widget for security and privacy

include get_template_directory() . '/inc/wpshp_theme_setting_options.php'; // this controls theme setting option menu

include get_template_directory() . '/inc/wpshp_custom_option.php'; // this controls custom theme option

include get_template_directory() . '/inc/wpshp_register_menu.php'; // this registers the custom menu

include get_template_directory() . '/inc/custom-header.php'; // this controls custom header

/**************************************************
    * enqueue styles and scripts
***************************************************/

function wpshp_scripts() {
	    
    wp_enqueue_style( 'wpshp-basic-style', get_stylesheet_uri() ); // this is our style.css which has our design of theme
    wp_enqueue_style( 'wpshp-responsive-style', get_template_directory_uri().'/css/theme-responsive.css' ); // this css file is responsible for responsive website
	wp_enqueue_script( 'footer-image-theme-option', get_template_directory_uri() . '/js/footer_image_theme_option.js', array('jquery') ); // to upload image for footer logo
    wp_enqueue_script( 'anchor_hover', get_template_directory_uri() . '/js/child_page_anchor_hover_for_frontpage.js', array('jquery') ); // this jquery file is responsible for displaying childpages of particular page in home page
    wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery') ); // this file is responsible for show toggle when particular condition occurs
        
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' ); 
	}
}
add_action( 'wp_enqueue_scripts', 'wpshp_scripts' ); 

/**************************************************
    * add theme support
***************************************************/
    
function wpshp_theme_setup() { 
    add_theme_support( 'post-thumbnails'); 
    add_post_type_support( 'page', 'excerpt' );
} 
add_action( 'after_setup_theme', 'wpshp_theme_setup' ); 

/**************************************************
    * add custom post type
***************************************************/

function wpshp_custom_post_type(){
    $labels = array(
        'name'                  =>      'Banner Contents',
        'singular_name'         =>      'Banner Content',
        'add_new'               =>      'Add New Content',
        'all_item'              =>      'All Contents',
        'add_new_item'          =>      'Add New Content',
        'edit_item'             =>      'Edit Content',
        'new_item'              =>      'New Content',
        'view_item'             =>      'View Content',
        'search_item'           =>      'Search Content',
        'not_found'             =>      'No items found',
        'not_found_in_trash'    =>      'No items found in trash',
        'parent_item_colon'     =>      'Parent Item'
    );
    $args = array(
        'labels'               =>       $labels,
        'public'                =>      true,
        'has_archive'           =>      true,
        'publicly_queryable'    =>      true,
        'query_var'             =>      true,
        'rewrite'               =>      true,
        'capability_type'       =>      'post',
        'hierarchical'          =>      false,
        'supports'              =>      array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revisions',
            
        ),
        'taxonomies'            =>      array(
            'category',
            'post_tag',
        ),
        'menu_position'         =>      5,
        'exclude_from_search'   =>      false, 
    );

    /**************************************************
        * registering custom post type
    ***************************************************/
    register_post_type('banner-content',$args); 
}
add_action('init','wpshp_custom_post_type');