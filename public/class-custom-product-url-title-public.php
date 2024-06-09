<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Custom_Product_URL_Title_Public
{
    public static function enqueue_public_scripts()
    {
        add_action('wp_enqueue_scripts', array(__CLASS__, 'enqueue_scripts'));
    }

    public static function enqueue_scripts()
    {
        wp_enqueue_script('jquery');
        wp_enqueue_script('cput-public-script', CPUT_PLUGIN_URL . 'public/js/cput-public.js', array('jquery'), null, true);
        wp_localize_script('cput-public-script', 'cput_ajax', array('ajax_url' => admin_url('admin-ajax.php')));
    }
}