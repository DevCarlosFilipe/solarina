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


    // HERO CSS
    wp_enqueue_style(
        'solarina-hero',
        get_template_directory_uri() . '/assets/css/hero.css',
        ['solarina-style'],
        '1.0'
    );

}

add_action('wp_enqueue_scripts', 'solarina_enqueue_assets');

// HEADER FLUTUANTE COM EFEITO DE SCROLL
function solarina_header_scroll_script() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const header = document.getElementById('main-header');

        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    });
    </script>
    <?php
}
add_action('wp_footer', 'solarina_header_scroll_script');
function solarina_customize_register($wp_customize) {

    $wp_customize->add_section('hero_section', [
        'title' => 'Hero Slider',
        'priority' => 30,
    ]);

    for ($i = 1; $i <= 3; $i++) {

        // Imagem
        $wp_customize->add_setting("hero_{$i}_image");
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                "hero_{$i}_image",
                [
                    'label' => "Imagem Slide {$i}",
                    'section' => 'hero_section'
                ]
            )
        );

        // Título
        $wp_customize->add_setting("hero_{$i}_title");
        $wp_customize->add_control("hero_{$i}_title", [
            'label' => "Título Slide {$i}",
            'section' => 'hero_section',
            'type' => 'text'
        ]);

        // Texto
        $wp_customize->add_setting("hero_{$i}_text");
        $wp_customize->add_control("hero_{$i}_text", [
            'label' => "Texto Slide {$i}",
            'section' => 'hero_section',
            'type' => 'textarea'
        ]);

        // Link
        $wp_customize->add_setting("hero_{$i}_link");
        $wp_customize->add_control("hero_{$i}_link", [
            'label' => "Link Slide {$i}",
            'section' => 'hero_section',
            'type' => 'url'
        ]);
    }
}

add_action('customize_register', 'solarina_customize_register');