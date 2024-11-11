<?php

if ( function_exists( 'add_ux_builder_shortcode' ) ) {
    add_ux_builder_shortcode( 'ux_dynamic_section', array(
        'type'      => 'container',
        'name'      => __( 'Dynamic Section', 'ux-builder' ),
        'category'  => __( 'Layout' ),
        'template'  => flatsome_ux_builder_template( 'section.html' ),
        'thumbnail' => '',
        'wrap'      => false,
        'info'      => '{{ label }}',
        'priority'  => -1,
        'styles'    => array(
            'flatsome-banner-effect' => get_template_directory_uri() . '/assets/css/effects.css',
        ),

        'options' => array(
            'label'      => array(
                'type'        => 'textfield',
                'heading'     => 'Admin label',
                'placeholder' => 'Enter admin label...',
            ),

            'background_options' => require( __DIR__ . '/commons/background.php' ),
            'layout_options'     => array(
                'type'    => 'group',
                'heading' => __( 'Layout' ),
                'options' => array(
                    'dark'            => array(
                        'type'    => 'radio-buttons',
                        'heading' => 'Color',
                        'default' => 'false',
                        'options' => array(
                            'true'  => array( 'title' => 'Light' ),
                            'false' => array( 'title' => 'Dark' ),
                        ),
                    ),
                    'sticky'          => array(
                        'type'    => 'radio-buttons',
                        'heading' => 'Sticky',
                        'default' => '',
                        'options' => array(
                            'true' => array( 'title' => 'On' ),
                            ''     => array( 'title' => 'Off' ),
                        ),
                    ),
                    'mask'            => array(
                        'type'    => 'select',
                        'heading' => 'Mask',
                        'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/masks.php' ),
                    ),
                    'padding'         => array(
                        'type'       => 'scrubfield',
                        'heading'    => 'Padding',
                        'responsive' => true,
                        'default'    => '30px',
                        'min'        => 0,
                        'max'        => 500,
                    ),
                    'height'          => array(
                        'type'       => 'scrubfield',
                        'heading'    => 'Min Height',
                        'responsive' => true,
                        'min'        => 0,
                        'max'        => 1000,
                    ),
                    'margin'          => array(
                        'type'    => 'scrubfield',
                        'heading' => 'Margin',
                        'min'     => -500,
                        'max'     => 500,
                    ),
                    'scroll_for_more' => array(
                        'type'    => 'radio-buttons',
                        'heading' => 'Scroll For More',
                        'default' => '',
                        'options' => array(
                            ''     => array( 'title' => 'Off' ),
                            'true' => array( 'title' => 'On' ),
                        ),
                    ),
                    'loading'         => array(
                        'type'    => 'radio-buttons',
                        'heading' => 'Loading Spinner',
                        'default' => '',
                        'options' => array(
                            ''     => array( 'title' => 'Off' ),
                            'true' => array( 'title' => 'On' ),
                        ),
                    ),
                ),
            ),
            'shape_divider_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/shape-divider.php' ),
            'border_options'     => require(get_template_directory() . '/inc/builder/shortcodes/commons/border.php' ),
            'video_options'      => require(get_template_directory() . '/inc/builder/shortcodes/commons/video.php' ),
            'advanced_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/advanced.php'),
        ),
    ) );
}