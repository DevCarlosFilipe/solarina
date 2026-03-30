<?php

function solarina_enqueue_assets()
{

    // Bootstrap CSS
    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css',
        [],
        '5.3.2'
    );

    // Bootstrap Icons
    wp_enqueue_style(
        'bootstrap-icons',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css',
        [],
        '1.11.3'
    );

    // Google Fonts
    wp_enqueue_style(
        'solarina-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Poppins:wght@300;400&display=swap',
        [],
        null
    );

    // CSS principal
    wp_enqueue_style(
        'solarina-style',
        get_stylesheet_uri(),
        ['bootstrap-css'],
        '1.0'
    );

    // CSS do HERO
    wp_enqueue_style(
        'solarina-hero',
        get_template_directory_uri() . '/assets/css/hero.css',
        ['solarina-style'],
        '1.0'
    );

    // CSS dos produtos
    wp_enqueue_style(
        'solarina-products',
        get_template_directory_uri() . '/assets/css/products.css',
        ['solarina-style'],
        '1.0'
    );

    // CSS da página de erro
    wp_enqueue_style(
        'solarina-error',
        get_template_directory_uri() . '/assets/css/error.css',
        ['solarina-style'],
        '1.0'
    );

    // Bootstrap JS
    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js',
        [],
        '5.3.2',
        true
    );
}

add_action('wp_enqueue_scripts', 'solarina_enqueue_assets');

wp_enqueue_script(
    'solarina-carousel',
    get_template_directory_uri() . '/assets/js/carousel.js',
    [],
    '1.0',
    true
);

wp_enqueue_script(
    'solarina-header',
    get_template_directory_uri() . '/assets/js/header.js',
    [],
    '1.0',
    true
);

wp_enqueue_style(
    'categories-css', 
    get_template_directory_uri() . '/assets/css/categories.css'
);

function carregar_fontes() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500&display=swap', false);
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Courgette&display=swap', false);
}
add_action('wp_enqueue_scripts', 'carregar_fontes');

wp_enqueue_style(
    'solarina-info-section',
    get_template_directory_uri() . '/assets/css/info-section.css'
);