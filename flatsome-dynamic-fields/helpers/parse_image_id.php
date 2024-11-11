<?php

/* Takes an ACF Image Array or ID and returns just the ID, or empty string if null */
function parse_image_id(Int|String|Array|NULL $image) {
    $image_id = '';
    if($image != null && $image != '') {
        if(is_int($image)) {
            $image_id = $image;
        } else if (is_array($image)) {
            // parse image id
            $image_id = is_int($image['id']) ? $image['id'] : '';
        } else if (is_string($image)) {
            $image_id = $image;
        }
    }
    return $image_id;
}