<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Custom_Product_URL_Title_Settings
{
    public static function init()
    {
        // 添加设置页面
        add_action('admin_menu', array(__CLASS__, 'add_settings_page'));
        // 注册设置
        add_action('admin_init', array(__CLASS__, 'register_settings'));
    }

    public static function add_settings_page()
    {
        add_options_page(
            __('Custom Product URL and Title Settings', 'custom-product-url-title'),
            __('Product URL and Title', 'custom-product-url-title'),
            'manage_options',
            'custom-product-url-title',
            array(__CLASS__, 'render_settings_page')
        );
    }

    public static function register_settings()
    {
        register_setting('cput_options', 'cput_options');
        add_settings_section(
            'cput_section',
            'Settings',
            null,
            'cput'
        );

        add_settings_field(
            'title_structure',
            'Title Structure',
            array(__CLASS__, 'title_structure_render'),
            'cput',
            'cput_section'
        );

        add_settings_field(
            'url_structure',
            'URL Structure',
            array(__CLASS__, 'url_structure_render'),
            'cput',
            'cput_section'
        );
    }

    public static function title_structure_render()
    {
        $options = get_option('cput_options');
        ?>
        <input type='text' name='cput_options[title_structure]' value='<?php echo isset($options['title_structure']) ? esc_attr($options['title_structure']) : ''; ?>'>
        <?php
    }

    public static function url_structure_render()
    {
        $options = get_option('cput_options');
        ?>
        <input type='text' name='cput_options[url_structure]' value='<?php echo isset($options['url_structure']) ? esc_attr($options['url_structure']) : ''; ?>'>
        <?php
    }

    public static function render_settings_page()
    {
        ?>
        <div class="wrap">
            <h1><?php _e('Custom Product URL and Title Settings', 'custom-product-url-title'); ?></h1>
            <form action="options.php" method="post">
                <?php
                settings_fields('cput_options');
                do_settings_sections('cput');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }
}