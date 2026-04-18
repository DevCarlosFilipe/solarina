<?php
/**
 * The template for displaying product archives, including the main shop page which is a post type archive.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */
defined('ABSPATH') || exit;
get_header();
?>

<?php
$hero_style = '';
if (function_exists('is_product_category') && is_product_category()) {
    $current_category = get_queried_object();
    if ($current_category && ! is_wp_error($current_category)) {
        $thumbnail_id = get_term_meta($current_category->term_id, 'thumbnail_id', true);
        $hero_image = wp_get_attachment_url($thumbnail_id);
        if ($hero_image) {
            $hero_style = 'style="background-image: url(' . esc_url($hero_image) . ');"';
        }
    }
}
?>
<section class="shop-hero" <?php echo $hero_style; ?> >
    <div class="container py-5 text-center">
        <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
            <h1 class="section-title"><?php woocommerce_page_title(); ?></h1>
        <?php endif; ?>

        <div class="shop-description">
            <?php do_action('woocommerce_archive_description'); ?>
        </div>
    </div>
</section>

<section class="products-section">
    <div class="container py-5">
        <?php if (woocommerce_product_loop()) : ?>
            <div class="shop-toolbar">
                <?php do_action('woocommerce_before_shop_loop'); ?>
            </div>

            <?php woocommerce_product_loop_start(); ?>

            <?php if (wc_get_loop_prop('total')) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php wc_get_template_part('content', 'product'); ?>
                <?php endwhile; ?>
            <?php endif; ?>

            <?php woocommerce_product_loop_end(); ?>

            <?php do_action('woocommerce_after_shop_loop'); ?>
        <?php else : ?>
            <?php do_action('woocommerce_no_products_found'); ?>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>