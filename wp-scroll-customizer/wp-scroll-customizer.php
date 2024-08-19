<?php
/**
 * Plugin Name: WP Scroll Customizer
 * Plugin URI: https://kevin-benabdelhak.fr/plugins/wp-scroll-customizer/
 * Description: Personnalisez la barre de défilement de votre site WordPress avec des couleurs, des dégradés et des styles personnalisés pour une meilleure intégration au design de votre site.
 * Version: 1.0
 * Author: Kevin Benabdelhak
 * Author URI: https://kevin-benabdelhak.fr/
 */


if (!defined('ABSPATH')) {
    exit;
}

require_once plugin_dir_path(__FILE__) . 'includes/enqueue-scripts.php';
require_once plugin_dir_path(__FILE__) . 'includes/settings-init.php';
require_once plugin_dir_path(__FILE__) . 'includes/render-fields.php';
require_once plugin_dir_path(__FILE__) . 'includes/options-page.php';
require_once plugin_dir_path(__FILE__) . 'includes/get-styles.php';
require_once plugin_dir_path(__FILE__) . 'includes/frontend-styles.php';