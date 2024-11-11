<?php
/*
Plugin Name: Dynamic Fields For Flatsome
Description: Adds dynamic content functionality for custom post types in Flatsome's UX Builder.
Version: 1.0
Author: Your Name
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once(dirname(__FILE__) . '/shortcodes/shortcodes.php');
require_once(dirname(__FILE__) . '/singles.php');
require_once(dirname(__FILE__) . '/header-filter.php');
require_once(dirname(__FILE__) . '/ux-builder-elements/ux-builder-elements.php');