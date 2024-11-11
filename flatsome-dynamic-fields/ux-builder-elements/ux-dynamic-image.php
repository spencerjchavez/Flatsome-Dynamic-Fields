<?php

$position_options = require( get_template_directory() . '/inc/builder/shortcodes/commons/position.php' );
$position_options['options']['position_x']['on_change'] = array(
  'recompile' => false,
  'class' => 'x{{ value }} md-x{{ value }} lg-x{{ value }}'
);
$position_options['options']['position_y']['on_change'] = array(
  'recompile' => false,
  'class' => 'y{{ value }} md-y{{ value }} lg-y{{ value }}'
);

add_ux_builder_shortcode( 'ux_dynamic_image', array(
    'name' => __( 'Dynamic Image', 'ux-builder'),
    'category' => __( 'Content' ),
    'toolbar_thumbnail' => 'id',
    'thumbnail' =>  flatsome_ux_builder_thumbnail( 'ux_image' ),
    'wrap' => false,

    'presets' => array(
        array(
            'name' => __( 'Blank' ),
            'content' => '[ux_image][/ux_image]',
        ),
    ),

    'options' => array(

        'field' => array(
            'type'    => 'textfield',
            'heading' => __( 'ACF Image Field', 'flatsome-dynamic-fields' ),
            'default' => '',
        ),
        'image_size' => array(
            'type' => 'select',
            'heading' => 'Image Size',
            'param_name' => 'image_size',
            'default' => 'large',
            'options' => flatsome_ux_builder_image_sizes(),
        ),
        'width' => array(
          'type' => 'slider',
          'heading' => 'Width',
          'responsive' => true,
          'default' => '100',
          'unit' => '%',
          'max' => '100',
          'min' => '0',
          'on_change' => array(
            'style' => 'width: {{ value }}%'
          ),
        ),
        'height' => array(
              'type' => 'scrubfield',
              'heading' => __('Height'),
              'default' => '',
              'placeholder' => __('Auto'),
              'min' => 0,
              'max' => 1000,
              'step' => 1,
              'helpers' => require( get_template_directory() . '/inc/builder/shortcodes/helpers/image-heights.php' ),
               'on_change' => array(
                    'selector' => '.image-cover',
                    'style' => 'padding-top: {{ value }}'
                )
        ),
        'margin' => array(
          'type' => 'margins',
          'heading' => __( 'Margin' ),
          'value' => '',
          'full_width' => true,
          'min' => -100,
          'max' => 100,
          'step' => 1,
        ),
        'lightbox' => array(
            'type' => 'radio-buttons',
            'heading' => __('Lightbox'),
            'default' => '',
            'options' => array(
                ''  => array( 'title' => 'Off'),
                'true'  => array( 'title' => 'On'),
            ),
        ),

        'lightbox_image_size' => array(
	        'type'       => 'select',
	        'heading'    => __( 'Lightbox Image Size' ),
	        'conditions' => 'lightbox == "true"',
	        'default'    => 'large',
	        'options'    => flatsome_ux_builder_image_sizes(),
        ),

        'caption' => array(
            'type' => 'radio-buttons',
            'heading' => __('Caption'),
            'default' => '',
            'options' => array(
                ''  => array( 'title' => 'Off'),
                'true'  => array( 'title' => 'On'),
            ),
        ),

		'lightbox_caption'    => array(
			'type'       => 'radio-buttons',
			'heading'    => __( 'Caption on Lightbox' ),
			'conditions' => 'lightbox == "true"',
			'default'    => '',
			'options'    => array(
				''     => array( 'title' => 'Off' ),
				'true' => array( 'title' => 'On' ),
			),
		),

		'image_title' => array(
			'type'    => 'radio-buttons',
			'heading' => __( 'Title' ),
			'default' => '',
			'options' => array(
				''      => array( 'title' => 'Off' ),
				'true'  => array( 'title' => 'On' ),
			),
		),

        'image_overlay' => array(
            'type' => 'colorpicker',
            'heading' => __( 'Image Overlay' ),
            'default' => '',
            'alpha' => true,
            'format' => 'rgb',
            'position' => 'bottom right',
            'on_change' => array(
              'selector' => '.overlay',
              'style' => 'background-color: {{ value }}',
            ),
         ),

        'image_hover' => array(
            'type' => 'select',
            'heading' => 'Image Hover',
            'default' => '',
            'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/image-hover.php' ),
            'on_change' => array(
                'selector' => '.img-inner',
                'class' => 'image-{{ value }}'
            )
        ),

        'image_hover_alt' => array(
            'type' => 'select',
            'heading' => 'Image Hover Alt',
            'default' => '',
            'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/image-hover.php' ),
            'on_change' => array(
                'selector' => '.img-inner',
                'class' => 'image-{{ value }}'
            )
        ),

        'depth' => array(
            'type' => 'slider',
            'heading' => 'Depth',
            'default' => '0',
            'max' => '5',
            'min' => '0',
            'on_change' => array(
                'selector' => '.img-inner',
                'class' => 'box-shadow-{{ value }}'
            )
        ),

        'depth_hover' => array(
            'type' => 'slider',
            'heading' => 'Depth :hover',
            'default' => '0',
            'max' => '5',
            'min' => '0',
            'on_change' => array(
                'selector' => '.img-inner',
                'class' => 'box-shadow-{{ value }}-hover'
            )
        ),
        'parallax' => array(
            'type' => 'slider',
            'heading' => 'Parallax',
            'default' => '0',
            'max' => '10',
            'min' => '-10',
        ),
        'animate' => array(
            'type' => 'select',
            'heading' => 'Animate',
            'default' => 'none',
            'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/animate.php' ),
        ),
        'link_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/links.php' ),
        'position_options' => $position_options,
        'advanced_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/advanced.php'),
    ),
) );
