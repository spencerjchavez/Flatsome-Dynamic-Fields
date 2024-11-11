<?php

function ux_builder_elements() {
    if(function_exists('remove_ux_builder_shortcode')) {
        //remove_ux_builder_shortcode('section');
        require_once(dirname(__FILE__) . '/ux-dynamic-section.php');
        require_once(dirname(__FILE__) . '/ux-dynamic-image.php');
        require_once(dirname(__FILE__) . '/ux-dynamic-render.php');
        require_once(dirname(__FILE__) . '/ux-dynamic-gallery.php');
    }
}

add_action( 'ux_builder_setup', 'ux_builder_elements', 20 );

