<?php global $product; ?>

<div class="product-card text-center">

    <a href="<?php the_permalink(); ?>" class="product-image d-block">
        <?php echo woocommerce_get_product_thumbnail(); ?>
    </a>

    <h5 class="mt-3"><?php the_title(); ?></h5>

    <p class="product-price">
        <?php echo $product->get_price_html(); ?>
    </p>

    <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" 
       class="btn btn-primary btn-sm">
        Comprar
    </a>

</div>