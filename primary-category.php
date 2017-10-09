<?php

/**
*
* @link              rafaelheard.com
* @since             1.0.0
* @package           Primary_Category
*
* Plugin Name:  Choose Primary Category
* Plugin URI:   https://github.com/rafh/primary-category
* Description:  This plugin allows the user to choose a primary category when multiple categories have been selected for a post.
* Version:      1.0.0
* Author:       Rafael Heard
* Author URI:   http://www.rafaelheard.com
*/

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}



define('PLUGIN_DIR', plugin_dir_path(__FILE__));

include PLUGIN_DIR . 'includes/primary-meta-box.php';

$meta_box = new meta_box_init();
