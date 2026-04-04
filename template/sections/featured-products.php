<?php
/**
 * Seção: Produtos em Destaque (simples)
 */
?>

<section class="featured-products py-5">
    <div class="container">

        <!-- Título -->
        <div class="text-center mb-5">
            <h2 class="session-title">Destaques da Coleção</h2>
            <p>Peças selecionadas para você</p>
        </div>

        <?php if (class_exists('WooCommerce')) : ?>

            <div class="row g-4">

                <?php
                $args = [
                    'post_type'      => 'product',
                    'posts_per_page' => 3,
                    'orderby'        => 'rand', // 🔥 aleatório
                    'tax_query'      => [
                        [
                            'taxonomy' => 'product_visibility',
                            'field'    => 'name',
                            'terms'    => 'featured',
                        ],
                    ],
                ];

                $loop = new WP_Query($args);

                if ($loop->have_posts()) :
                    while ($loop->have_posts()) : $loop->the_post();
                        global $product;
                ?>

                    <div class="col-md-4 col-sm-6">

                        <div class="product-card text-center h-100">

                            <!-- Imagem -->
                            <a href="<?php the_permalink(); ?>">
                                <?php echo woocommerce_get_product_thumbnail(); ?>
                            </a>

                            <!-- Título -->
                            <h5 class="mt-3"><?php the_title(); ?></h5>

                            <!-- Preço -->
                            <p class="product-price">
                                <?php echo $product->get_price_html(); ?>
                            </p>

                            <!-- Botão -->
                            <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" 
                               class="btn-solarina btn-sm">
                                Comprar
                            </a>

                        </div>

                    </div>

                <?php
                    endwhile;
                else :
                    echo '<p class="text-center">Nenhum produto em destaque.</p>';
                endif;

                wp_reset_postdata();
                ?>

            </div>

        <?php endif; ?>

    </div>
</section>