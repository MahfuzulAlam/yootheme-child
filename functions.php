<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'yootheme'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}

add_filter('directorist_custom_field_meta_key_field_args', function ($args) {
    $args['type'] = 'text';
    return $args;
});

add_shortcode( 'single_listing_download', 'single_listing_download_function' );
function single_listing_download_function() {
    if(is_user_logged_in()){
        $downloadable_file_link = get_post_meta(get_the_ID(), '_download-url', true);
        if(!empty($downloadable_file_link))
            return '<div class="pl-contact">To download this music for FREE to use in your vidoes:<div class="pl-cta"><a href="'.esc_url($downloadable_file_link).'" target="_blank" download>Download File</a></div></div>';
    }else{
        $login_page_link = home_url( '/registration/' );
        return '<div class="pl-contact">To download this music for FREE to use in your vidoes:<div class="pl-cta"><a href="'.esc_url($login_page_link).'">Register for a FREE Account Here</a></div></div>';
    }
    return '';
}