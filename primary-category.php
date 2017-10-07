<?php

if (! defined('ABSPATH')) {
    exit;
}

/*
* Plugin Name: Choose Primary Category
* Plugin URI: https://github.com/rafh/primary-category
* Description: This plugin allows the user to choose a primary category when multiple categories have been selected for a post.
* Version: 1.0.0
* Author: Rafael Heard
* Author URI: http://www.rafaelheard.com
*/


define('PLUGIN_DIR', plugin_dir_path(__FILE__));

include PLUGIN_DIR . 'includes/primary-meta-box.php';

new meta_box_init();
