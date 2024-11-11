<?php

$bg = require(get_template_directory() . '/inc/builder/shortcodes/commons/background.php');
// change fields for dynamic section
$bg['options']['bg']['type'] = 'textfield';
$bg['options']['bg']['heading'] = __('ACF Image Field');
return $bg;