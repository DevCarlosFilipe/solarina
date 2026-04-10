<?php
defined('ABSPATH') || exit;
get_header();

global $product;
?>

<?php while (have_posts()) : the_post(); ?>

    <?php wc_print_notices(); ?>

    <section class="single-product-section">
        <div class="container py-5">
            <?php do_action('woocommerce_before_single_product'); ?>

            <div id="product-<?php the_ID(); ?>" <?php wc_product_class('single-product-grid', $product); ?>>
                <div class="single-product-gallery">
                    <?php do_action('woocommerce_before_single_product_summary'); ?>
                </div>

                <div class="single-product-summary">
                    <?php do_action('woocommerce_single_product_summary'); ?>
                </div>
            </div>

            <?php do_action('woocommerce_after_single_product_summary'); ?>
        </div>
    </section>

<?php endwhile; ?>

<?php get_footer(); ?>