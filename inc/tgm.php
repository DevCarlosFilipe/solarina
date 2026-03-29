<?php

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'solarina_register_plugins');

function solarina_register_plugins() {

    $plugins = [
        [
            'name' => 'WooCommerce',
            'slug' => 'woocommerce',
            'required' => true,
        ],
    ];

    tgmpa($plugins);
}