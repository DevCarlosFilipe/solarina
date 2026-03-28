<?php

// Setup básico do tema
function solarina_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    // WooCommerce
    add_theme_support('woocommerce');

    // Galeria de produtos do WooCommerce
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}

add_action('after_setup_theme', 'solarina_setup');

wp_enqueue_style(
    'solarina-error',
    get_template_directory_uri() . '/assets/css/error.css',
    ['solarina-style'],
    '1.0'
);

function solarina_capture_errors() {

    if (!is_admin()) {

        $error = error_get_last();

        if ($error !== NULL) {

            set_transient('solarina_last_error', print_r($error, true), 60);

            wp_redirect(home_url('/erro'));
            exit;
        }
    }
}

add_action('shutdown', 'solarina_capture_errors');

function solarina_error_page() {
    return get_template_directory() . '/error.php';
}

function solarina_rewrite_error() {
    add_rewrite_rule('^erro/?$', 'index.php?solarina_error=1', 'top');
}
add_action('init', 'solarina_rewrite_error');

function solarina_query_vars($vars) {
    $vars[] = 'solarina_error';
    return $vars;
}
add_filter('query_vars', 'solarina_query_vars');

function solarina_template_redirect() {
    if (get_query_var('solarina_error')) {
        include solarina_error_page();
        exit;
    }
}
add_action('template_redirect', 'solarina_template_redirect');

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

wp_enqueue_style(
    'solarina-products',
    get_template_directory_uri() . '/assets/css/products.css',
    ['solarina-style'],
    '1.0'
);

// class tgm plugin activation (recomendo usar pra garantir que o cliente instale o WooCommerce)
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

    $config = [
        'id' => 'solarina',
        'menu' => 'solarina-install-plugins',
        'has_notices' => true,
    ];

    tgmpa($plugins, $config);
}

// WooCommerce
function solarina_admin_notice_missing_woocommerce() {

    if (!class_exists('WooCommerce')) {

        echo '<div class="notice notice-warning is-dismissible">';
        echo '<p><strong>Solarina:</strong> Para funcionamento completo do tema, instale e ative o plugin WooCommerce.</p>';
        echo '</div>';

    }

}

add_action('admin_notices', 'solarina_admin_notice_missing_woocommerce');

add_filter('woocommerce_enqueue_styles', '__return_empty_array');

function solarina_wrapper_start() {
    echo '<div class="container py-5">';
}

function solarina_wrapper_end() {
    echo '</div>';
}

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'solarina_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'solarina_wrapper_end', 10);

function solarina_loop_columns() {
    return 3; // 3 produtos por linha
}
add_filter('loop_shop_columns', 'solarina_loop_columns');

add_filter('woocommerce_add_to_cart_fragments', function($fragments) {

    ob_start();
    ?>
    <span class="cart-count">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </span>
    <?php
    $fragments['.cart-count'] = ob_get_clean();

    return $fragments;
});

// Remove breadcrumb
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

// Remove sidebar
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);