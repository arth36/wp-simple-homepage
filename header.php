 <?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package wpshp
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?> 
<?php wp_enqueue_media(); ?>
</head>


<body <?php body_class(); ?>>

<!-- header -->
<div class="header">
    <!-- header-inner-->
	<div class="header-inner">
        <!-- custom logo -->
        <div class="logo">
            <?php if ( get_option('wpshp_edit_header_logo') ) : ?>
                <img src="<?php echo get_option('wpshp_edit_header_logo'); ?>"/>
            <?php else : ?>
                <h1 class="site-title"> 
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" width="100" height="50" />
                    </a>
                </h1>
            <?php endif;?>
        <!-- end custom logo -->	
        </div>    
        <!-- header_right -->
        <div class="header_right"> 
            <!-- toggle -->       		              
            <div class="toggle">
                <a class="toggleMenu" href="#">
                    <?php esc_html_e('Menu','wpshp'); ?>                
                </a>
            <!-- end toggle -->
            </div>
            <!-- sitenav -->
            <div class="sitenav">                  
                    <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>  
            <!-- end sitenav -->
            </div>
            <div class="clear"></div>   
        <!-- end header_right -->               
        </div>
        <div class="clear"></div>  
        <div class="clear"></div>
    <!--  end header-inner -->
    </div>
<!-- end header -->
</div>