<?php

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'solarina_register_plugins');

function solarina_register_plugins()
{

    $plugins = [
        [
            'name' => 'WooCommerce',
            'slug' => 'woocommerce',
            'required' => true,
        ],
        [
            'name' => 'Smash Balloon Instagram Feed',
            'slug' => 'instagram-feed',
            'required' => false,
        ],
    ];

    tgmpa($plugins);
}
