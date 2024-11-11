<?php

function create_single_template_for_cpt( $post_type, $args ) {
    if ( $args->_builtin === false ) {
        // ensure cpt has an acf field group
        $field_groups = acf_get_field_groups( array(
            'post_type' => $post_type,
        ));
        if (empty($field_groups)) return;

        // Path to the child theme
        $child_theme_path = get_stylesheet_directory();

        $template_file = $child_theme_path . '/single-' . $post_type . '.php';

        // Check if the template file already exists
        if (file_exists( $template_file ) ) return;

        // Create the template file with basic content
        $template_content = ''; // eventually will be all of the content needed for a signle-*.php file. For now we manually populate this file. 
        file_put_contents( $template_file, $template_content );
    }

}

add_action( 'registered_post_type', 'create_single_template_for_cpt', 10, 2);


//add_action('template_redirect', 'register_template_for_single');

// TODO: listen to changes in ACF custom post types. E.g. when a post type changes name, update the single-*.php filename. On delete, delete the associated single.php file. 