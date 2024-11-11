<?php


function dynamic_render_template() {
    ob_start();
    echo '<content></content>';
    return ob_get_clean();
}

if ( function_exists( 'add_ux_builder_shortcode' ) ) {
    add_ux_builder_shortcode('ux_dynamic_render', array(
        'type'  => 'container',
        'name'        => __( 'Conditional Render', 'flatsome-dynamic-fields' ),
        'category'    => __( 'Layout', 'flatsome-dynamic-fields' ),
        'options'     => array(
            'render_if_present' => array(
                'type'    => 'radio-buttons',
                'heading' => 'Render Content',
                'default' => 'render-if-true',
                'options' => array(
                    'true'  => array( 'title' => 'If Field Is Present' ),
                    'false' => array( 'title' => 'If Field Is Empty' ),
                ),
            ),
            'field' => array(
                'type'    => 'textfield',
                'heading' => __( 'Field Name', 'flatsome-dynamic-fields' ),
                'default' => '',
            ),
        ),
        'template'    => dynamic_render_template(),
    ));
}
