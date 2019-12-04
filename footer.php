<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Wpshp
 */
?>
<!-- main-container -->
<div>
    <!-- footer-top-main -->
    <div class="footer-top-main">
        <!-- container -->
        <div class="container">
            <!-- footer-top -->
            <div class="footer-top">
                <!-- rendering footer widget for news category -->
                <div class="footer-top-column footer-news">
                    <?php echo the_widget( 'Wpshp_Footer_News_widget' ); ?> 
                </div>
                <!-- rendering footer widget for recent projects -->
                <div class="footer-top-column footer-projects">
                    <?php echo the_widget( 'Wpshp_Recent_Projects_Widget' ); ?>
                </div>
                <!-- rendering footer widget for social sites -->
                <div class="footer-top-column footer-social">
                    <?php echo the_widget( 'Wpshp_Footer_Social_Sites_Widget' ); ?>
                </div>
                <!-- rendering footer widget for social and privacy menus -->
                <div class="footer-top-column footer-security">
                    <?php echo the_widget( 'Wpshp_Footer_Social_And_Privacy_Widget' ); ?>
                </div>
            <!-- end footer-top -->
            </div>
        <!-- end container -->
        </div>
    <!-- end footer-top-main -->
    </div>
    
    <!-- copyright-wrapper -->
    <div class="copyright-wrapper">
        <!-- container -->
        <div class="container"> 
            
            <div class="footer-main">
                <div class="footer-left-outer">
                    <div class="footer_left">        		              
                        <div class="toggle">
                            <a class="toggleMenu" href="#">
                                <?php esc_html_e('Menu','wpshp'); ?>                
                            </a>
                        </div><!-- toggle -->
                        <div class="sitenav">
                            <div class="footersitenav">                  
                                <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>  
                            </div>
                        </div><!--.sitenav -->
                        <div class="clear"></div>                  
                </div><!--footer-left-->
                <div class="clear"></div>  
                <div class="clear"></div>
                <div class="copyright">
                    <p>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <?php esc_attr(bloginfo( 'name' )); ?> 
                            <?php esc_html_e('&#169;','wpshp'); ?> 
                            <?php echo esc_attr(date_i18n( __( 'Y', 'wpshp' ) )); ?> 
                            <?php echo get_option("wpshp_footer_copyright") ?>
                        </a>
                    </p>               
                </div><!-- copyright -->  
            </div>
            <div class="logoright">
            <?php if ( get_option('wpshp_edit_footer_logo') ) : ?>
                <img src="<?php echo get_option('wpshp_edit_footer_logo'); ?>"/>
            <?php else : ?> 
                <h1 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>">
                        <img src="<?php echo get_template_directory_uri().'/images/footer-logo.png' ?>" />
                    </a>
                </h1>
            <?php endif;?>    		
            </div><!-- .logo -->    
        </div>
        <!-- end container -->                      
        </div>
    <!-- end copyright-wrapper -->
    </div>
<!-- end main-container -->
</div> 
        
<?php wp_footer(); ?>
 
</body>
</html> 