<?php
function wpshp_theme_option(){
    
    // adding custom menu

    add_menu_page(
        'theme-options', // page title
        __('Theme Options', 'wpshp'), // Menu title
        'manage_options', // capability
        'wpshp-theme-options', // menu slug
        'wpshp_custom_options', // callback function
        'dashicons-sticky' // icon
    );
}
add_action('admin_menu','wpshp_theme_option');

// callback function for adding custom menu
function wpshp_custom_options(){
    // we have to link our custom settings
?>
    <div>
        <h1>Theme Options Panel</h1>
        <span>
            <?php
                settings_errors();
            ?>
        </span>
        <form action="options.php" method="post">
            <?php
            settings_fields("wpshp-section");
                do_settings_sections("wpshp-theme-options");
                submit_button();
            ?>
        </form>
    </div>
    <?php
}
    ?>