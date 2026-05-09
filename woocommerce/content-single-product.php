<?php
defined('ABSPATH') || exit;

global $product;

/**
 * Hook padrão do WooCommerce (não remova)
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form();
    return;
}
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class('container single-product-grid', $product); ?>>

    <div class="row">

        <!-- GALERIA -->
        <div class="col-md-6">
            <?php get_template_part('woocommerce/single-product/gallery'); ?>
        </div>

        <!-- RESUMO -->
        <div class="col-md-6">
            <?php get_template_part('woocommerce/single-product/summary'); ?>
        </div>

    </div>

    <!-- TABS (descrição, reviews...) -->
    <div class="mt-5">
        <?php get_template_part('woocommerce/single-product/tabs'); ?>
    </div>

    <!-- PRODUTOS RELACIONADOS -->
    <div class="mt-5">
        <?php get_template_part('woocommerce/single-product/related'); ?>
    </div>

</div>

<?php do_action('woocommerce_after_single_product'); ?>