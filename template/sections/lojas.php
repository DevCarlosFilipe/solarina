<?php
/**
 * Seção: Lojas - Todos os produtos mais recentes
 */
?>

<section class="lojas py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="session-title">Lojas</h2>
            <p>Confira todos os produtos mais recentes</p>
        </div>

        <?php if (class_exists('WooCommerce')) : ?>

            <?php
            $args = [
                'post_type'      => 'product',
                'posts_per_page' => -1,
                'orderby'        => 'date',
                'order'          => 'DESC',
                'post_status'    => 'publish',
            ];

            $products = new WP_Query($args);
            ?>

            <?php if ($products->have_posts()) : ?>
                <div class="row g-4">
                    <?php while ($products->have_posts()) : $products->the_post(); global $product; ?>
                        <div class="col-6 col-md-6 col-lg-4 col-xl-3">
                            <div class="product-card text-center h-100">

                                <a href="<?php the_permalink(); ?>">
                                    <?php echo woocommerce_get_product_thumbnail(); ?>
                                </a>

                                <h5 class="mt-3"><?php the_title(); ?></h5>

                                <p class="product-price">
                                    <?php echo $product->get_price_html(); ?>
                                </p>

                                <a href="<?php echo esc_url($product->add_to_cart_url()); ?>"
                                   class="btn-solarina btn-sm">
                                    Comprar
                                </a>

                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <p class="text-center">Nenhum produto disponível no momento.</p>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>

        <?php endif; ?>

    </div>
</section>
