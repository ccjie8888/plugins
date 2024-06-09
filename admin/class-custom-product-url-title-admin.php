<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Custom_Product_URL_Title_Admin {

    public static function init() {
        add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_admin_scripts' ) );
    }

    public static function enqueue_admin_scripts() {
        wp_enqueue_style( 'custom-product-url-title-admin-styles', CPUT_PLUGIN_URL . 'admin/css/admin-styles.css' );
        wp_enqueue_script( 'custom-product-url-title-admin-scripts', CPUT_PLUGIN_URL . 'admin/js/admin-scripts.js', array( 'jquery' ), null, true );
    }
}