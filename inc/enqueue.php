<?php

function solarina_get_asset_version($file)
{
    $path = get_template_directory() . $file;
    return file_exists($path) ? filemtime($path) : false;
}

function solarina_enqueue_assets()
{
    // Bootstrap CSS
    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css',
        [],
        '5.3.2'
    );

    // Font Awesome Free
    wp_enqueue_style(
        'font-awesome-free',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
        [],
        '6.4.0'
    );

    // Google Fonts (combined request)
    wp_enqueue_style(
        'solarina-google-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Poppins:wght@300;400&family=Dancing+Script:wght@400;500&family=Courgette&display=swap',
        [],
        null
    );

    // CSS principal
    wp_enqueue_style(
        'solarina-style',
        get_stylesheet_uri(),
        ['bootstrap-css'],
        solarina_get_asset_version('/style.css')
    );

    wp_enqueue_style(
        'solarina-header',
        get_template_directory_uri() . '/assets/css/header.css',
        ['solarina-style'],
        solarina_get_asset_version('/assets/css/header.css')
    );

    if (is_front_page()) {
        wp_enqueue_style(
            'solarina-hero',
            get_template_directory_uri() . '/assets/css/hero.css',
            ['solarina-style'],
            solarina_get_asset_version('/assets/css/hero.css')
        );

        wp_enqueue_style(
            'solarina-products',
            get_template_directory_uri() . '/assets/css/products.css',
            ['solarina-style'],
            solarina_get_asset_version('/assets/css/products.css')
        );

        wp_enqueue_style(
            'categories-css',
            get_template_directory_uri() . '/assets/css/categories.css',
            ['solarina-style'],
            solarina_get_asset_version('/assets/css/categories.css')
        );

        wp_enqueue_style(
            'solarina-info-section',
            get_template_directory_uri() . '/assets/css/info-section.css',
            ['solarina-style'],
            solarina_get_asset_version('/assets/css/info-section.css')
        );

        wp_enqueue_script(
            'bootstrap-js',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js',
            [],
            '5.3.2',
            true
        );

        wp_enqueue_script(
            'solarina-carousel',
            get_template_directory_uri() . '/assets/js/carousel.js',
            [],
            solarina_get_asset_version('/assets/js/carousel.js'),
            true
        );
    }

    $load_products_css = false;
    if (function_exists('is_woocommerce') && is_woocommerce()) {
        $load_products_css = true;
    } elseif (function_exists('is_product') && is_product()) {
        $load_products_css = true;
    }

    if ($load_products_css) {
        wp_enqueue_style(
            'solarina-products',
            get_template_directory_uri() . '/assets/css/products.css',
            ['solarina-style'],
            solarina_get_asset_version('/assets/css/products.css')
        );
    }

    if (is_404()) {
        wp_enqueue_style(
            'solarina-error',
            get_template_directory_uri() . '/assets/css/error.css',
            ['solarina-style'],
            solarina_get_asset_version('/assets/css/error.css')
        );
    }

    wp_enqueue_script(
        'solarina-header',
        get_template_directory_uri() . '/assets/js/header.js',
        [],
        solarina_get_asset_version('/assets/js/header.js'),
        true
    );
}

add_action('wp_enqueue_scripts', 'solarina_enqueue_assets');

function solarina_resource_hints($urls, $relation_type)
{
    if ('preconnect' === $relation_type) {
        $urls[] = 'https://fonts.googleapis.com';
        $urls[] = 'https://fonts.gstatic.com';
        $urls[] = 'https://cdnjs.cloudflare.com';
        $urls[] = 'https://cdn.jsdelivr.net';
    }

    return $urls;
}
add_filter('wp_resource_hints', 'solarina_resource_hints', 10, 2);