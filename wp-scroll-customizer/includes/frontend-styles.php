<?php

if (!defined('ABSPATH')) {
    exit;
}


function wp_scroll_customizer_frontend_styles() {
    echo '<style>' . wp_scroll_customizer_get_styles() . '</style>';
}
add_action('wp_head', 'wp_scroll_customizer_frontend_styles');