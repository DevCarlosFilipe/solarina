<?php

if (!class_exists('WooCommerce')) return;

// Remove estilos padrão
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

// Use o template do tema em woocommerce/single-product.php para single product
function solarina_single_product_template($template)
{
    if (is_singular('product')) {
        $custom_template = locate_template('woocommerce/single-product.php');
        if ($custom_template) {
            return $custom_template;
        }
    }
    return $template;
}
add_filter('single_template', 'solarina_single_product_template');

// Wrapper
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

// Grid
function solarina_loop_columns() {
    return 3;
}
add_filter('loop_shop_columns', 'solarina_loop_columns');

// Admin notice
function solarina_admin_notice_missing_woocommerce() {
    if (!class_exists('WooCommerce')) {
        echo '<div class="notice notice-warning is-dismissible">';
        echo '<p><strong>Solarina:</strong> Instale o WooCommerce.</p>';
        echo '</div>';
    }
}
add_action('admin_notices', 'solarina_admin_notice_missing_woocommerce');

add_filter('woocommerce_add_to_cart_fragments', function($fragments) {

    ob_start();
    ?>
    <span class="cart-count">
        <?php 
        $count = WC()->cart->get_cart_contents_count();
        if ($count > 0) {
            echo $count > 9 ? '+9' : $count;
        }
        ?>
    </span>
    <?php

    $fragments['.cart-count'] = ob_get_clean();

    return $fragments;

});


add_action('pre_get_posts', function ($query) {

    if (!is_admin() && $query->is_main_query() && $query->is_search()) {
        $query->set('post_type', 'product');
    }

});

remove_action(
    'woocommerce_before_single_product_summary',
    'woocommerce_show_product_images',
    20
);

add_action('template_redirect', function () {

    if (isset($_POST['buy_now'])) {

        $product_id = absint($_POST['buy_now']);

        $quantity = isset($_POST['quantity'])
            ? wc_stock_amount($_POST['quantity'])
            : 1;

        // Limpa carrinho
        WC()->cart->empty_cart();

        // Adiciona produto
        WC()->cart->add_to_cart(
            $product_id,
            $quantity
        );

        // Vai checkout
        wp_safe_redirect(
            wc_get_checkout_url()
        );

        exit;
    }

});