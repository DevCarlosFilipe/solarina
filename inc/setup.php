<?php

function solarina_setup() {

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    if (class_exists('WooCommerce')) {
        add_theme_support('woocommerce');

        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
    }
}

add_action('after_setup_theme', 'solarina_setup');