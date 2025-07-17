<?php

if (!defined('ABSPATH')) {
    exit;
}

function wp_scroll_customizer_get_styles() {
    $options = get_option('wp_scroll_settings');
    if ($options) {
        $scrollbarBackground = '';
        $scrollbarColor = '';
      
      
        if (isset($options['background_color_or_gradient']) && $options['background_color_or_gradient'] === 'gradient') {
            $dir = esc_attr($options['background_gradient_orientation'] ?? 'to bottom');
            $reversed = !empty($options['background_gradient_reversed']);
            $start = esc_attr($options['background_gradient_color_start'] ?? '#ff0000');
            $mid   = $options['background_gradient_color_mid'] ?? '';
            $end   = esc_attr($options['background_gradient_color_end'] ?? '#0000ff');
            $stopsArr = $reversed
                ? array_filter([$end, $mid ?: null, $start])
                : array_filter([$start, $mid ?: null, $end]);
            $scrollbarBackground = "linear-gradient($dir, " . implode(',', $stopsArr) . ")";
        } else {
            $scrollbarBackground = esc_attr($options['background_color'] ?? '#ffffff');
        }
        if (isset($options['scrollbar_color_or_gradient']) && $options['scrollbar_color_or_gradient'] === 'gradient') {
            $dir = esc_attr($options['scrollbar_gradient_orientation'] ?? 'to bottom');
            $reversed = !empty($options['scrollbar_gradient_reversed']);
            $start = esc_attr($options['scrollbar_gradient_color_start'] ?? '#ff0000');
            $mid   = $options['scrollbar_gradient_color_mid'] ?? '';
            $end   = esc_attr($options['scrollbar_gradient_color_end'] ?? '#0000ff');
            $stopsArr = $reversed
                ? array_filter([$end, $mid ?: null, $start])
                : array_filter([$start, $mid ?: null, $end]);
            $scrollbarColor = "linear-gradient($dir, " . implode(',', $stopsArr) . ")";
        } else {
            $scrollbarColor = esc_attr($options['scrollbar_color'] ?? '#000000');
        }
        $border_radius = esc_attr($options['scrollbar_border_radius'] ?? '0');
        $width = esc_attr($options['scrollbar_width'] ?? '8');

        return "
            body::-webkit-scrollbar {
                width: {$width}px !important;
            }
            body::-webkit-scrollbar-thumb {
                background: {$scrollbarColor} !important;
                border-radius: {$border_radius}px !important;
                border: 2px solid {$scrollbarBackground} !important;
                background-clip: padding-box !important;
            }
            body::-webkit-scrollbar-track {
                background: {$scrollbarBackground} !important;
            }
        ";
    }
    return '';
}