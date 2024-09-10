<?php

/**
 * Plugin Name: Ratelink Pro
 * Description: This plugin is used to display hotels search results with proper hotel details and checkout process.
 * Author: Usama Khan
 * Author URI: https://github.com/usamakhan143
 * Version: 1.0.1
 * Requires PHP: 7.4
 * Text Domain: ratelink-plugin-translate
 */

// Register activation hook
register_activation_hook(__FILE__, 'custom_plugin_activation');

function custom_plugin_activation()
{
    // Check if WooCommerce is active
    if (!is_plugin_active('woocommerce/woocommerce.php')) {
        // WooCommerce is not active
        deactivate_plugins(plugin_basename(__FILE__)); // Deactivate your plugin
        wp_die('This plugin requires WooCommerce to be installed and activated.');
    }
}

if (!defined('ABSPATH')) {
    exit;
}


if (!class_exists('RatelinkPro')) {


    class RatelinkPro
    {

        function __construct()
        {
            define('RATELINK_PLUGIN_URL', plugin_dir_url(__FILE__));
            define('RATELINK_PLUGIN_PATH', plugin_dir_path(__FILE__));
            require_once(RATELINK_PLUGIN_PATH . '/vendor/autoload.php');
        }

        function initialize()
        {
            include_once(RATELINK_PLUGIN_PATH . 'includes/utilities.php');
            include_once(RATELINK_PLUGIN_PATH . 'includes/ratelink-pro.php');
            include_once(RATELINK_PLUGIN_PATH . 'includes/options-page.php');
        }
    }
}


$RatelinkPro = new RatelinkPro();
$RatelinkPro->initialize();


add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'ap_add_plugin_page_settings_link');
function ap_add_plugin_page_settings_link($links)
{
    $links[] = '<a href="' .
        admin_url('tools.php?page=crb_carbon_fields_container_ratelink_pro.php') .
        '">' . __('Settings') . '</a>';
    return $links;
}
