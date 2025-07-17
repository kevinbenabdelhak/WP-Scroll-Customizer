<?php

if (!defined('ABSPATH')) {
    exit;
}

function wp_scroll_customizer_scrollbar_color_or_gradient_render() {
    $options = get_option('wp_scroll_settings');
    ?>
    <select name="wp_scroll_settings[scrollbar_color_or_gradient]" id="scrollbar_color_or_gradient">
        <option value="color" <?php selected($options['scrollbar_color_or_gradient'], 'color'); ?>><?php _e('Couleur', 'wp_scroll_customizer'); ?></option>
        <option value="gradient" <?php selected($options['scrollbar_color_or_gradient'], 'gradient'); ?>><?php _e('Dégradé', 'wp_scroll_customizer'); ?></option>
    </select>
    <?php
}

function wp_scroll_customizer_scrollbar_color_render() {
    $options = get_option('wp_scroll_settings');
    ?>
    <input type='text' name='wp_scroll_settings[scrollbar_color]' value='<?php echo esc_attr($options['scrollbar_color'] ?? '#000000'); ?>' class="my-color-picker" />
    <?php
}

function wp_scroll_customizer_scrollbar_gradient_color_start_render() {
    $options = get_option('wp_scroll_settings');
    ?>
    <input type='text' name='wp_scroll_settings[scrollbar_gradient_color_start]' value='<?php echo esc_attr($options['scrollbar_gradient_color_start'] ?? '#ff0000'); ?>' class="my-color-picker" />
    <label> Début </label>
    <?php
}

// AJOUT couleur mid
function wp_scroll_customizer_scrollbar_gradient_color_mid_render() {
    $options = get_option('wp_scroll_settings');
    ?>
    <input type='text' name='wp_scroll_settings[scrollbar_gradient_color_mid]' value='<?php echo esc_attr($options['scrollbar_gradient_color_mid'] ?? ''); ?>' class="my-color-picker" />
    <label> Intermédiaire (optionnel) </label>
    <?php
}

function wp_scroll_customizer_scrollbar_gradient_color_end_render() {
    $options = get_option('wp_scroll_settings');
    ?>
    <input type='text' name='wp_scroll_settings[scrollbar_gradient_color_end]' value='<?php echo esc_attr($options['scrollbar_gradient_color_end'] ?? '#0000ff'); ?>' class="my-color-picker" />
    <label> Fin </label>
    <?php
}

// AJOUT orientation gradient
function wp_scroll_customizer_scrollbar_gradient_orientation_render() {
    $options = get_option('wp_scroll_settings');
    $value = $options['scrollbar_gradient_orientation'] ?? 'to bottom';
    ?>
    <select name="wp_scroll_settings[scrollbar_gradient_orientation]" id="scrollbar_gradient_orientation">
        <option value="to bottom" <?php selected($value, 'to bottom'); ?>>Vertical</option>
        <option value="to right" <?php selected($value, 'to right'); ?>>Horizontal</option>
        <option value="135deg" <?php selected($value, '135deg'); ?>>Diagonal principale (135°)</option>
        <option value="45deg" <?php selected($value, '45deg'); ?>>Diagonal inverse (45°)</option>
    </select>
    <?php
}

// Ajout bouton reverse (checkbox)
function wp_scroll_customizer_scrollbar_gradient_reversed_render() {
    $options = get_option('wp_scroll_settings');
    ?>
    <input type='checkbox' name='wp_scroll_settings[scrollbar_gradient_reversed]' id='scrollbar_gradient_reversed' value='1' <?php checked(!empty($options['scrollbar_gradient_reversed'])); ?> />
    <label for="scrollbar_gradient_reversed">Inverser</label>
    <?php
}

function wp_scroll_customizer_scrollbar_width_render() {
    $options = get_option('wp_scroll_settings');
    ?>
    <input type='range' name='wp_scroll_settings[scrollbar_width]' value='<?php echo esc_attr($options['scrollbar_width'] ?? '8'); ?>' min='1' max='30' class="scrollbar-width-range" />
    <span class="scrollbar-width-value"><?php echo esc_attr($options['scrollbar_width'] ?? '8'); ?></span> px
    <?php
}

function wp_scroll_customizer_scrollbar_border_radius_render() {
    $options = get_option('wp_scroll_settings');
    ?>
    <input type='range' name='wp_scroll_settings[scrollbar_border_radius]' value='<?php echo esc_attr($options['scrollbar_border_radius'] ?? '0'); ?>' min='0' max='30' class="scrollbar-border-radius-range" />
    <span class="scrollbar-border-radius-value"><?php echo esc_attr($options['scrollbar_border_radius'] ?? '0'); ?></span> px
    <?php
}

function wp_scroll_customizer_background_color_or_gradient_render() {
    $options = get_option('wp_scroll_settings');
    ?>
    <select name="wp_scroll_settings[background_color_or_gradient]" id="background_color_or_gradient">
        <option value="color" <?php selected($options['background_color_or_gradient'], 'color'); ?>><?php _e('Couleur', 'wp_scroll_customizer'); ?></option>
        <option value="gradient" <?php selected($options['background_color_or_gradient'], 'gradient'); ?>><?php _e('Dégradé', 'wp_scroll_customizer'); ?></option>
    </select>
    <?php
}

function wp_scroll_customizer_background_color_render() {
    $options = get_option('wp_scroll_settings');
    ?>
    <input type='text' name='wp_scroll_settings[background_color]' value='<?php echo esc_attr($options['background_color'] ?? '#ffffff'); ?>' class="my-color-picker" />
    <?php
}

function wp_scroll_customizer_background_gradient_color_start_render() {
    $options = get_option('wp_scroll_settings');
    ?>
    <input type='text' name='wp_scroll_settings[background_gradient_color_start]' value='<?php echo esc_attr($options['background_gradient_color_start'] ?? '#ff0000'); ?>' class="my-color-picker" />
    <label> Début </label>
    <?php
}

function wp_scroll_customizer_background_gradient_color_mid_render() {
    $options = get_option('wp_scroll_settings');
    ?>
    <input type='text' name='wp_scroll_settings[background_gradient_color_mid]' value='<?php echo esc_attr($options['background_gradient_color_mid'] ?? ''); ?>' class="my-color-picker" />
    <label> Intermédiaire (optionnel) </label>
    <?php
}

function wp_scroll_customizer_background_gradient_color_end_render() {
    $options = get_option('wp_scroll_settings');
    ?>
    <input type='text' name='wp_scroll_settings[background_gradient_color_end]' value='<?php echo esc_attr($options['background_gradient_color_end'] ?? '#0000ff'); ?>' class="my-color-picker" />
    <label> Fin </label>
    <?php
}

function wp_scroll_customizer_background_gradient_orientation_render() {
    $options = get_option('wp_scroll_settings');
    $value = $options['background_gradient_orientation'] ?? 'to bottom';
    ?>
    <select name="wp_scroll_settings[background_gradient_orientation]" id="background_gradient_orientation">
        <option value="to bottom" <?php selected($value, 'to bottom'); ?>>Vertical</option>
        <option value="to right" <?php selected($value, 'to right'); ?>>Horizontal</option>
        <option value="135deg" <?php selected($value, '135deg'); ?>>Diagonal principale (135°)</option>
        <option value="45deg" <?php selected($value, '45deg'); ?>>Diagonal inverse (45°)</option>
    </select>
    <?php
}

function wp_scroll_customizer_background_gradient_reversed_render() {
    $options = get_option('wp_scroll_settings');
    ?>
    <input type='checkbox' name='wp_scroll_settings[background_gradient_reversed]' id='background_gradient_reversed' value='1' <?php checked(!empty($options['background_gradient_reversed'])); ?> />
    <label for="background_gradient_reversed">Inverser</label>
    <?php
}