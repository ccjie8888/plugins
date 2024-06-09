<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Custom_Product_URL_Title
{
    public static function init()
    {
        // 添加钩子和过滤器
        add_action('wp_enqueue_scripts', array(__CLASS__, 'enqueue_scripts'));
        add_action('wp_ajax_nopriv_cput_get_variant_data', array(__CLASS__, 'get_variant_data'));
        add_action('wp_ajax_cput_get_variant_data', array(__CLASS__, 'get_variant_data'));
    }

    public static function enqueue_scripts()
    {
        wp_enqueue_script('cput-public-script', CPUT_PLUGIN_URL . 'public/js/cput-public.js', array('jquery'), null, true);
        wp_localize_script('cput-public-script', 'cput_ajax', array('ajax_url' => admin_url('admin-ajax.php')));
    }

    public static function get_variant_data()
    {
        $variation_id = intval($_POST['variation_id']);
        $product = wc_get_product($variation_id);

        if ($product) {
            $data = array(
                'title' => $product->get_name(),
                'url' => get_permalink($product->get_id())
            );
            wp_send_json_success($data);
        } else {
            wp_send_json_error();
        }
    }
}