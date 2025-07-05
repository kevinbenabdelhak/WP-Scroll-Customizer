<?php

if (!defined('ABSPATH')) {
    exit;
}


function wp_scroll_customizer_settings_init() {
    register_setting('wpScrollCustomizer', 'wp_scroll_settings');

    // Section pour la barre de défilement
    add_settings_section(
        'wp_scroll_customizer_section_bar',
        __('Personnalisez votre barre de défilement', 'wp_scroll_customizer'),
        null,
        'wpScrollCustomizer_bar'
    );

    add_settings_field(
        'scrollbar_color_or_gradient',
        __('Type de couleur de la barre de défilement', 'wp_scroll_customizer'),
        'wp_scroll_customizer_scrollbar_color_or_gradient_render',
        'wpScrollCustomizer_bar',
        'wp_scroll_customizer_section_bar'
    );

    add_settings_field(
        'scrollbar_color',
        __('Couleur de la barre de défilement', 'wp_scroll_customizer'),
        'wp_scroll_customizer_scrollbar_color_render',
        'wpScrollCustomizer_bar',
        'wp_scroll_customizer_section_bar'
    );

    add_settings_field(
        'scrollbar_gradient_color_start',
        __('Couleur de début du dégradé de la barre de défilement', 'wp_scroll_customizer'),
        'wp_scroll_customizer_scrollbar_gradient_color_start_render',
        'wpScrollCustomizer_bar',
        'wp_scroll_customizer_section_bar'
    );

    add_settings_field(
        'scrollbar_gradient_color_end',
        __('Couleur de fin du dégradé de la barre de défilement', 'wp_scroll_customizer'),
        'wp_scroll_customizer_scrollbar_gradient_color_end_render',
        'wpScrollCustomizer_bar',
        'wp_scroll_customizer_section_bar'
    );

    add_settings_field(
        'scrollbar_width',
        __('Largeur (px)', 'wp_scroll_customizer'),
        'wp_scroll_customizer_scrollbar_width_render',
        'wpScrollCustomizer_bar',
        'wp_scroll_customizer_section_bar'
    );

    add_settings_field(
        'scrollbar_border_radius',
        __('Rayon des bordures (px)', 'wp_scroll_customizer'),
        'wp_scroll_customizer_scrollbar_border_radius_render',
        'wpScrollCustomizer_bar',
        'wp_scroll_customizer_section_bar'
    );

    // Section pour le fond
    add_settings_section(
        'wp_scroll_customizer_section_background',
        __('Personnalisez le fond', 'wp_scroll_customizer'),
        null,
        'wpScrollCustomizer_background'
    );

    add_settings_field(
        'background_color_or_gradient',
        __('Type de couleur de fond', 'wp_scroll_customizer'),
        'wp_scroll_customizer_background_color_or_gradient_render',
        'wpScrollCustomizer_background',
        'wp_scroll_customizer_section_background'
    );

    add_settings_field(
        'background_color',
        __('Couleur de fond', 'wp_scroll_customizer'),
        'wp_scroll_customizer_background_color_render',
        'wpScrollCustomizer_background',
        'wp_scroll_customizer_section_background'
    );

    add_settings_field(
        'background_gradient_color_start',
        __('Couleur de début du dégradé de fond', 'wp_scroll_customizer'),
        'wp_scroll_customizer_background_gradient_color_start_render',
        'wpScrollCustomizer_background',
        'wp_scroll_customizer_section_background'
    );

    add_settings_field(
        'background_gradient_color_end',
        __('Couleur de fin du dégradé de fond', 'wp_scroll_customizer'),
        'wp_scroll_customizer_background_gradient_color_end_render',
        'wpScrollCustomizer_background',
        'wp_scroll_customizer_section_background'
    );
}
add_action('admin_init', 'wp_scroll_customizer_settings_init');