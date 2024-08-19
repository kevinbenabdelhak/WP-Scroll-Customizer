<?php 

if (!defined('ABSPATH')) {
    exit;
}


function wp_scroll_customizer_menu() {
    add_options_page('WP Scroll Customizer', 'WP Scroll Customizer', 'manage_options', 'wp-scroll-customizer', 'wp_scroll_customizer_options_page');
}
add_action('admin_menu', 'wp_scroll_customizer_menu');

function wp_scroll_customizer_enqueue() {
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
    wp_enqueue_script('jquery');
    wp_enqueue_style('wp-scroll-customizer-css', plugin_dir_url(__FILE__) . '../admin/customizer-styles.css');
    wp_enqueue_script('wp-scroll-customizer-js', plugin_dir_url(__FILE__) . '../admin/customizer-scripts.js', ['jquery', 'wp-color-picker'], false, true);
}
add_action('admin_enqueue_scripts', 'wp_scroll_customizer_enqueue');