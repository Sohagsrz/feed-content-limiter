<?php
/**
 * Plugin Name: Feed Content Limiter
 * Plugin URI:  http://sohagsrz.me/?ref=feed-content-limiter
 * Description: Limits the content in the RSS feed after a set number of words and adds a "read more" link.
 * Version:     1.0
 * Author:      Sohag Srz
 * Author URI:  http://github.com/sohagsrz
 * License:     GPL2
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Include the required files
require_once plugin_dir_path(__FILE__) . 'includes/class-fcl-admin.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-fcl-public.php';

// Instantiate the classes
if (is_admin()) {
    new FCL_Admin();
} else {
    new FCL_Public();
}
