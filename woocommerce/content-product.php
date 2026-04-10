<?php
defined('ABSPATH') || exit;
global $product;
?>
<li <?php wc_product_class('product-card-item', $product); ?>>
    <div class="product-card text-center h-100">
        <a href="<?php the_permalink(); ?>" class="product-image d-block">
            <?php
            $thumbnail_id = $product->get_image_id();
            if ($thumbnail_id) :
                $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'full');
                $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                ?>
                <img src="<?php echo esc_url($thumbnail_url); ?>" class="product-card-img" loading="lazy" alt="<?php echo esc_attr($thumbnail_alt ?: $product->get_name()); ?>" />
            <?php else :
                echo wc_placeholder_img();
            endif;
            ?>
        </a>

        <h5 class="mt-3"><?php the_title(); ?></h5>

        <p class="product-price">
            <?php echo $product->get_price_html(); ?>
        </p>

        <div class="product-card-actions">
            <?php woocommerce_template_loop_add_to_cart(); ?>
        </div>
    </div>
</li>
