<?php
/**
 *
 * @package wpshp
 */

get_header(); 
?>

<div>
    <div class="banner-outer">
        <div class="banner-slider container">

        <?php
            $args = array(
                'post_type'   => 'banner-content',
                'post_status' => 'publish' 
            );
            $posts = new WP_Query( $args );
            if( $posts->have_posts() ) :

        ?>
            <div class="slideDiv"> 
            <?php
                $i=0;

                // displaying the content of custom post type in slider

                while( $posts->have_posts() ) :
                    $i=$i+1;
                    $posts->the_post();
            ?>
                    <div class="slide">
                        <!-- displaying the image of post -->
                        <img src="<?php echo the_post_thumbnail_url(); ?>" />
                        
                        <div class="banner-content">
                            <!-- displaying the title of post -->
                            <h2><?php echo the_title(); ?></h2>
                            <!-- displaying the excerpt of post -->
                            <p><?php echo the_excerpt(); ?></p>
                        </div>
                    </div>
            <?php endwhile;
                wp_reset_postdata();
            ?>
            </div>  <!-- /slideDiv -->
            <?php
            else : 
                esc_html_e( 'No testimonials in the diving taxonomy!', 'text-domain' );
            endif;
            ?>
            <div class="nav-controls">
            <nav class="controls">
                <?php 
                $j=0;
                while($j<$i){
                    $j=$j+1;
                ?>
                    <button id="button<?php echo $j; ?>" class="button" type="button" ></button>
                <?php } ?>
            </nav>
        </div>  <!-- /container --> 
    </div>
  <!-- Initialize Swiper -->

  <!-- Script to handle such events for slider -->
  <script> 
  (function() {
    
  function controls() {
    $(this).addClass('selected').siblings('button').removeClass('selected');
    $('.slideDiv').animate({
      top: -$('.container').height() * $(this).index()
    }, 450);
  }
  
  /***Event Listeners***/
  const runCode = () => {
    const button = document.querySelectorAll('.button');
    if ( button ) {
      for ( var i = 0; i < button.length; i++ ) {
        button[i].addEventListener('click', controls, false);
      }
    }
  }
  
  runCode();
  
})();
  </script>
 
</div>

<!-- main div for childpages -->
<div class="childpages-outer">
    <!-- container for childpages -->
    <div class="container">
        <!-- div for tab links -->
        <div class="tab-outer">
            <?php   
                $args= array(
                    'child_of' => $post->ID, 
                    'parent' => $post->ID,
                    'hierarchical' => 0,
                    'title_li' => '',
                );
                $pages = get_pages($args);
                $i=0;
            ?>
            <!-- childpages of homepage -->
            <ul class="tab-links">

            <?php // displaying child pages of home page ?>
            <?php foreach( $pages as $page ) {
                $i=$i+1;
            ?>
                <li rel="tab<?php echo $i; ?>" class="tab<?php echo $i; ?>">
                    <a href="<?php echo  get_permalink($page->ID); ?>" title="<?php echo $page->ID;?>"  class="child-hover-anchor">
                        <span class="title1"><?php echo $page->post_title; ?></span>
                    </a>
                </li>
            <?php } ?>
            </ul>
            <!-- grandchildpages of home page -->
            <div class="feature-tab-outer-main">
            <?php
                $args= array(
                    'child_of' => $post->ID, 
                    'parent' => $post->ID,
                    'hierarchical' => 0,
                    'title_li' => ''
                );
                $pages = get_pages($args);
            ?>
            <?php
            $j=0;
            foreach( $pages as $page ) {
                $j=$j+1;
            ?>
            <!-- grandchildpages of home page -->
                <?php
                    $args1= array(
                        'child_of' => $page->ID, 
                        'parent' => $page->ID,
                        'hierarchical' => 0,
                        'title_li' => '',
                        'number' => 3, // getting the 3 pages to display at the time of hover
                    );
                    $childpages = get_pages($args1);
                ?>
                <h3 id="d_active<?php echo $j; ?>" class="tab_drawer_heading" rel="tab<?php echo $j; ?>"><?php echo $page->post_title; ?></h3>
                <div class="feature-tab-outer" id="tab<?php echo $j; ?>">

                <?php // displaying child pages of page at the time of hover ?>
                    <?php foreach( $childpages as $childpage ) { ?>
                    <div class="inner-feature-tab">
                        <div class="inner-tab-content">
                            <!-- displaying the image of post -->
                            <img src="<?php echo get_the_post_thumbnail_url( $childpage->ID ,'full'); ?>" alt="header"/>
                            <!-- displaying the title of post -->
                            <h4><?php echo get_the_title($childpage->ID); ?></h4>
                            <!-- displaying the excerpt of post -->
                            <p><?php echo get_the_excerpt($childpage->ID); ?></p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?> 