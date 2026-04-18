<?php

if (!class_exists('WooCommerce')) return;

// Remove estilos padrão
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

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

// Cart AJAX (CORRIGIDO)
add_filter('woocommerce_add_to_cart_fragments', function($fragments) {

    ob_start();
    ?>
    <span class="cart-count">
        <?php echo WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?>
    </span>
    <?php

    $fragments['.cart-count'] = ob_get_clean();

    return $fragments;
});

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