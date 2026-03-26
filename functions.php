<?php

// Setup básico do tema
function solarina_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ]);
}

add_action('after_setup_theme', 'solarina_setup');


// Enfileirar estilos e scripts
function solarina_enqueue_assets() {

    // Bootstrap CSS
    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css',
        [],
        '5.3.2'
    );

    // Bootstrap Icons (melhor que FontAwesome pra esse caso)
    wp_enqueue_style(
        'bootstrap-icons',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css',
        [],
        '1.11.3'
    );

    // Google Fonts (já pensando no design Solarina)
    wp_enqueue_style(
        'solarina-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Poppins:wght@300;400&display=swap',
        [],
        null
    );

    // CSS principal do tema
    wp_enqueue_style(
        'solarina-style',
        get_stylesheet_uri(),
        ['bootstrap-css'],
        '1.0'
    );

    // Bootstrap JS (bundle já inclui Popper)
    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js',
        [],
        '5.3.2',
        true
    );

}

add_action('wp_enqueue_scripts', 'solarina_enqueue_assets');