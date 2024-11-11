<?php
    
    //$post_type = get_post_type();
    /* 
    This will eventually dynamically grab the single template page content from the site settings (not sure how we're implementing those settings yet)
    and output the contents. For now, it is hardcoded as the /car-template page.

    $post_template_page_path = get_post_meta(get_the_ID(), 'post_template_page_path');
    if( !$post_template_page_path ) return ;
    $post_template_page = get_page_by_path($post_template_page_path);
    if( !$post_template_page ) return ;
    */
    // set flatsome template as this post's template file to render the header
    $car_template_page = get_page_by_path('/car-template');
    $flatsome_template_file = get_post_meta($car_template_page->ID, '_wp_page_template', true);
    update_post_meta(get_the_ID(), '_wp_page_template', $flatsome_template_file);
    get_header();
    do_action( 'flatsome_before_page' );

    // delete template file from post after header is rendered
    delete_post_meta( get_the_ID(), '_wp_page_template'); 
        
    // Query the page with the Car Template
    if ( $car_template_page ) {
        echo apply_filters( 'the_content', $car_template_page->post_content );
    }
    do_action( 'flatsome_after_page' );
    get_footer();
