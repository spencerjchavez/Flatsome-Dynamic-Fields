<?php

// Allows posts to use Flatsome page templates to style headers
function add_header_classes( $classes ) {

    if(is_page()) return $classes;
    // Header classes for posts
    $page_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
    // Get default page template.
    if ( get_theme_mod( 'pages_template', 'default' ) !== 'blank' && $page_template == 'default' || empty( $page_template ) ) {
        $page_template = get_theme_mod( 'pages_template', 'default' );
    }

    // Set header classes.
    if ( ! empty( $page_template ) ) {
        if ( strpos( $page_template, 'transparent' ) !== false ) {
            $classes[] = 'transparent has-transparent';
        }

        if ( strpos( $page_template, 'header-on-scroll' ) !== false ) {
            $classes[] = 'show-on-scroll';
        }
    }

return $classes;
}
add_filter( 'flatsome_header_class', 'add_header_classes', 10 );