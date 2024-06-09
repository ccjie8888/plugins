<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// 这里可以添加一些辅助函数
// 添加自定义重写规则
function add_custom_rewrite_rules() {
    add_rewrite_rule(
        '^product/([^/]+)/?',
        'index.php?post_type=product&name=$matches[1]',
        'top'
    );
}
add_action('init', 'add_custom_rewrite_rules');

// 确保重写规则生效
function flush_rewrite_rules_on_activation() {
    add_custom_rewrite_rules();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'flush_rewrite_rules_on_activation');
register_deactivation_hook(__FILE__, 'flush_rewrite_rules');