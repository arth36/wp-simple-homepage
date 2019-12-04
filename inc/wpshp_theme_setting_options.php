<?php

//theme options settings
function wpshp_theme_options_setting(){

    // this code basically provides an area where you can register your fields
    add_settings_section(
        "wpshp-section", // id of settings section
        __("All page", 'wpshp'), // title
        null, // callback function
        "wpshp-theme-options" // Page
    );
    
    // adding the setting field for Adding image for header logo
    add_settings_field(
        "wpshp_edit_header_logo",
        __("Add Image for Header Logo", 'wpshp'),
        "wpshp_display_header_image",
        "wpshp-theme-options",
        "wpshp-section"
    );
    
    // adding the setting field for Adding image for footer logo
    add_settings_field(
        "wpshp_edit_footer_logo",
        __("Add Image for Footer Logo", 'wpshp'),
        "wpshp_display_footer_image",
        "wpshp-theme-options",
        "wpshp-section"
    );

    // adding the setting field for Adding footer copyright content
    add_settings_field(
        "wpshp_footer_copyright", 
        __("Edit Footer Copyright", 'wpshp'),
        "wpshp_display_edit_footer_content",
        "wpshp-theme-options",
        "wpshp-section"
    );

    // adding the settings field for Adding Facebook url
    add_settings_field(
        "wpshp_fb_url",
        __("Facebook Url", 'wpshp'),
        "wpshp_display_fb_url",
        "wpshp-theme-options",
        "wpshp-section"
    );

    // adding the settings field for Adding Twitter url
    add_settings_field(
        "wpshp_twitter_url",
        __("Twitter Url", 'wpshp'),
        "wpshp_display_twitter_url",
        "wpshp-theme-options",
        "wpshp-section"
    );

    // adding the settings field for Adding LinkedIn url
    add_settings_field(
        "wpshp_linkedin_url",
        __("LinkedIn Url", 'wpshp'),
        "wpshp_display_linkedin_url",
        "wpshp-theme-options",
        "wpshp-section"
    );

    // adding the settings field for Adding RSS url
    add_settings_field(
        "wpshp_rss_url",
        __("RSS Url", 'wpshp'),
        "wpshp_display_rss_url",
        "wpshp-theme-options",
        "wpshp-section"
    );

    // we need to add this setting to area

    // registering header logo setting field
    register_setting("wpshp-section", "wpshp_edit_header_logo");

    // registering footer logo setting field
    register_setting("wpshp-section", "wpshp_edit_footer_logo");

    // registering footer copyright setting field
    register_setting("wpshp-section", "wpshp_footer_copyright");

    // registering facebook url setting field
    register_setting("wpshp-section", "wpshp_fb_url");

    // registering twitter url setting field
    register_setting("wpshp-section", "wpshp_twitter_url");

    // registering linkedin url field
    register_setting("wpshp-section", "wpshp_linkedin_url");

    // registering rss url setting field
    register_setting("wpshp-section", "wpshp_rss_url");

}

add_action("admin_init","wpshp_theme_options_setting");


function wpshp_display_header_image(){
    ?>
    <?php
// This will enqueue the Media Uploader script
wp_enqueue_media();
?>
    <div>
        <img class="wpshp_edit_header_logo" src="<?php echo get_option('wpshp_edit_header_logo'); ?>" height="100" width="100"/>
        <input type="text" name="wpshp_edit_header_logo" id="wpshp_edit_header_logo" class="regular-text" value="<?php echo get_option('wpshp_edit_header_logo'); ?>">  
        <input type="button" name="upload-header-btn" id="upload-header-btn" class="button-secondary" value="Upload Header Image">
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('#upload-header-btn').click(function(e) {
                e.preventDefault();
                var image_header = wp.media({ 
                    title: 'Upload Header Image',
                    // mutiple: true if you want to upload multiple files at once
                    multiple: false
                }).open().on('select', function(e){
                    // This will return the selected image from the Media Uploader, the result is an object
                    var uploaded_header_image = image_header.state().get('selection').first();
                    // We convert uploaded_image to a JSON object to make accessing it easier
                    // Output to the console uploaded_image
                    console.log(uploaded_header_image);
                    var wpshp_edit_header_logo = uploaded_header_image.toJSON().url;
                    // Let's assign the url value to the input field
                    $('#wpshp_edit_header_logo').val(wpshp_edit_header_logo);
                }); 
            });
        }); 
</script>
    <?php
}

function wpshp_display_footer_image(){
    ?>
    <?php
// This will enqueue the Media Uploader script
wp_enqueue_media();
?>
    <div>
        <img class="wpshp_edit_footer_logo" src="<?php echo get_option('wpshp_edit_footer_logo'); ?>" height="100" width="100"/>
        <input type="text" name="wpshp_edit_footer_logo" id="wpshp_edit_footer_logo" class="regular-text" value="<?php echo get_option('wpshp_edit_footer_logo'); ?>">  
        <input type="button" name="upload-footer-btn" id="upload-footer-btn" class="button-secondary" value="Upload Footer Image">
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('#upload-footer-btn').click(function(e) {
                e.preventDefault();
                var image_footer = wp.media({ 
                    title: 'Upload Footer Image',
                    // mutiple: true if you want to upload multiple files at once
                    multiple: false
                }).open().on('select', function(e){
                    // This will return the selected image from the Media Uploader, the result is an object
                    var uploaded_footer_image = image_footer.state().get('selection').first();
                    // We convert uploaded_image to a JSON object to make accessing it easier
                    // Output to the console uploaded_image
                    console.log(uploaded_footer_image);
                    var wpshp_edit_footer_logo = uploaded_footer_image.toJSON().url;
                    // Let's assign the url value to the input field
                    $('#wpshp_edit_footer_logo').val(wpshp_edit_footer_logo);
                });  
            });
        }); 
</script>
    <?php
}

// randering each setting field to frontend

function wpshp_display_edit_footer_content(){
    ?>
    
        <textarea rows = "5" cols = "60" name="wpshp_footer_copyright" id="wpshp_footer_copyright"> <?php echo get_option('wpshp_footer_copyright'); ?></textarea> 
        
    <?php
}

function wpshp_display_fb_url(){
    ?>
    
        <input type="url" name="wpshp_fb_url" id="wpshp_fb_url" value="<?php echo get_option('wpshp_fb_url'); ?>"/>
    
    <?php
}


function wpshp_display_twitter_url(){
    ?>
    
        <input type="url" name="wpshp_twitter_url" id="wpshp_twitter_url" value="<?php echo get_option('wpshp_twitter_url'); ?>"/>
     
    <?php
}

function wpshp_display_linkedin_url(){
    ?>
    
        <input type="url" name="wpshp_linkedin_url" id="wpshp_linkedin_url" value="<?php echo get_option('wpshp_linkedin_url'); ?>"/>
    
    <?php
}

function wpshp_display_rss_url() {
    ?>
    
        <input type="url" name="wpshp_rss_url" id="wpshp_rss_url" value="<?php echo get_option('wpshp_rss_url'); ?>"/>
 
    <?php
}