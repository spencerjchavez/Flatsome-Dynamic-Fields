<?php

$repeater_type = 'row';
$repeater_col_spacing = 'normal';
$repeater_columns = '4';
$default_text_align = 'left';

$options = array(
'pages_options' => array(
    'type' => 'group',
    'heading' => __( 'Options' ),
    'options' => array(
      'gallery_field' => array(
        'type' => 'textfield',
        'heading' => __( 'Gallery Field' ),
      ),
     'style' => array(
            'type' => 'select',
            'heading' => __( 'Style' ),
            'default' => 'overlay',
            'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/box-layouts.php' )
     ),
    'lightbox' => array(
          'type' => 'radio-buttons',
          'heading' => __('Open in Lightbox'),
          'default' => 'true',
          'options' => array(
              'false'  => array( 'title' => 'Off'),
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

  ),
),
'layout_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/repeater-options.php' ),
'layout_options_slider' => require( get_template_directory() . '/inc/builder/shortcodes/commons/repeater-slider.php' ),
);

$box_styles = require( get_template_directory() . '/inc/builder/shortcodes/commons/box-styles.php' );
$options = array_merge($options, $box_styles);

add_ux_builder_shortcode( 'ux_dynamic_gallery', array(
  'name' => __( 'Dynamic Gallery','ux-builder'),
  'category' => __( 'Content' ),
  'thumbnail' => flatsome_ux_builder_thumbnail( 'ux_gallery' ),
  'scripts' => array(
    'flatsome-masonry-js' => get_template_directory() . '/assets/libs/packery.pkgd.min.js',
  ),
  'options' => $options
));
