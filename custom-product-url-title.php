<?php
/*
Plugin Name: Custom Product URL and Title
Description: Customizes the product URL and title based on selected variants.
Version: 1.2.1
Author: jie
*/

// 防止直接访问文件
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// 定义插件路径
define('CPUT_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('CPUT_PLUGIN_URL', plugin_dir_url(__FILE__));

// 包含必要的文件
require_once CPUT_PLUGIN_DIR . 'includes/class-custom-product-url-title-settings.php';
require_once CPUT_PLUGIN_DIR . 'includes/class-custom-product-url-title.php';
require_once CPUT_PLUGIN_DIR . 'public/class-custom-product-url-title-public.php';

// 初始化设置
add_action('plugins_loaded', 'cput_initialize_plugin');

function cput_initialize_plugin() {
    Custom_Product_URL_Title_Settings::init();
    Custom_Product_URL_Title::init();
    Custom_Product_URL_Title_Public::enqueue_public_scripts();
}