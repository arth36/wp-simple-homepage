<?php

function wpshp_register_my_menus() {

    // registering the custom menu
    register_nav_menus(
        array(
            'security_privacy_menu' => __( 'Security and Privacy', 'wpshp' ),
        )
    );
}
add_action( 'init', 'wpshp_register_my_menus' );