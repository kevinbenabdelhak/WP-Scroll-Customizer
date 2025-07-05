<?php

if (!defined('ABSPATH')) {
    exit;
}


function wp_scroll_customizer_options_page() {
    ?>
    <div class="wrap">
        <h2><?php esc_html_e('WP Scroll Customizer', 'wp_scroll_customizer'); ?></h2>
        <h2 class="nav-tab-wrapper">
            <a href="#" class="nav-tab" id="nav-bar-tab">Barre</a>
            <a href="#" class="nav-tab" id="nav-background-tab">Fond</a>
        </h2>
        <form action='options.php' method='post'>
            <?php settings_fields('wpScrollCustomizer'); ?>
            <div id="bar-tab">
                <?php do_settings_sections('wpScrollCustomizer_bar'); ?>
            </div>
            <div id="background-tab" style="display:none;">
                <?php do_settings_sections('wpScrollCustomizer_background'); ?>
            </div>
            <?php submit_button(); ?>
        </form>
        <div style="height: 2000px;"></div>
        <style id="scroll-body-style">
            <?php echo wp_scroll_customizer_get_styles(); ?>
        </style>
    </div>
    <?php
}