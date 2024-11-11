<?php

require(dirname(__FILE__) . '/../helpers/parse_image_id.php');

// Dynamic Field Shortcode
// Usage: [ux_dynamic_field field=? ]
function ux_dynamic_field_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'field' => 'title', // default field
    ), $atts );
    extract($atts);
    switch ( $field ) {
        case 'title':
            return get_the_title();
        default:
            //custom field, casted to string
            return strval(get_field( $field));
    }
}

// Post Meta Shortcode
// Usage: [post_meta key=?]
function display_post_meta_shortcode($atts) {
    // Extract shortcode attributes
    $atts = shortcode_atts(array(
        'key' => '',
    ), $atts, 'post_meta');

    // Get the post meta value
    $meta_value = get_post_meta(get_the_iD(), $atts['key'], true);

    // Return the meta value (or an empty string if not found)
    return !empty($meta_value) ? $meta_value : '';
}

// Dynamic Image Shortcode
// Usage: [ux_dynamic_image field=? ]
function ux_dynamic_image_shortcode( $atts ) {
    $filtered_atts = shortcode_atts( array(
        'field' => 'featured_image',   // Field to use: 'featured_image' or custom field name
    ), $atts );
    extract($filtered_atts);

    $image_id = '';
    if($field === 'featured_image') {
        $image_id = get_post_thumbnail_id();
    } else{
        $image_id = parse_image_id(get_field($field));
    }
    // update atts
    $atts['id'] = $image_id;
    return ux_image($atts);
}

// Dynamic Section Shortcode 
function ux_dynamic_section_shortcode($atts, $content) {
    $filtered_atts = shortcode_atts( array(
		'bg'               => '',
    ), $atts);
    extract($filtered_atts);
    
    if($bg === 'featured_image') {
        $image_id = get_post_thumbnail_id();
    } else {
        $image_id = parse_image_id($bg);
    }
    // set $atts bg image id
    $atts['bg'] = $image_id;
    return ux_section($atts, $content);
}

function ux_dynamic_render_shortcode($atts, $content) {
    $atts = shortcode_atts( array(
        'render_if_present' => 'true',
        'field' => '',
    ), $atts );
    extract($atts);

    $hidden = false;
    if(($render_if_present == 'true' && get_field($field) == null)
     || ($render_if_present == 'false' && get_field($field) != null)) {
        $hidden = true;
    }

    ob_start();
    
    echo '<div class=" dynamic-render ' . ($hidden ? 'hidden' : '') . '">' . $content . '</div>';

    return do_shortcode( ob_get_clean() ); 
}

function ux_dynamic_gallery_shortcode($atts) {
    $filtered_atts = shortcode_atts( array(
		'gallery_field'               => '',
    ), $atts);
    $images = get_field($filtered_atts['gallery_field']);
    $ids = [];
    // map fields to ids
    if ($images) {
        foreach($images as $image) {
            $image_id = parse_image_id($image);
            $ids[] = $image_id;
        }
    }

    unset($atts['gallery_field']);
    $atts['ids'] = implode(',',$ids);
    return ux_gallery($atts);
}

function register_shortcodes() {
    add_shortcode( 'acf_field', 'ux_dynamic_field_shortcode' );
    add_shortcode('post_meta', 'post_meta_shortcode' );
    add_shortcode( 'ux_dynamic_image', 'ux_dynamic_image_shortcode' );
    add_shortcode( 'ux_dynamic_section', 'ux_dynamic_section_shortcode' );
    add_shortcode( 'ux_dynamic_render', 'ux_dynamic_render_shortcode');
    add_shortcode( 'ux_dynamic_gallery', 'ux_dynamic_gallery_shortcode');
}

add_action('init', 'register_shortcodes');