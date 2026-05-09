<?php
defined('ABSPATH') || exit;

global $product;

$related_products = wc_get_related_products(
    $product->get_id(),
    8
);

if (!$related_products) {
    return;
}
?>

<section class="custom-related-products">

    <!-- TÍTULO -->
    <div class="related-header">

        <h2>
            Produtos relacionados
        </h2>

    </div>

    <!-- GRID -->
    <div class="related-grid">

        <?php foreach ($related_products as $related_id) :

            $related_product = wc_get_product($related_id);

            if (!$related_product) {
                continue;
            }

            $image = wp_get_attachment_image_url(
                $related_product->get_image_id(),
                'medium'
            );

            $regular = (float) $related_product->get_regular_price();
            $sale    = (float) $related_product->get_sale_price();

            $discount = 0;

            if ($related_product->is_on_sale() && $regular > 0) {
                $discount = round((($regular - $sale) / $regular) * 100);
            }

        ?>

            <a href="<?php echo esc_url(get_permalink($related_id)); ?>"
               class="related-card">

                <!-- IMAGEM -->
                <div class="related-thumb">

                    <?php if ($discount > 0) : ?>

                        <div class="related-discount">
                            -<?php echo esc_html($discount); ?>%
                        </div>

                    <?php endif; ?>

                    <img src="<?php echo esc_url($image); ?>">

                </div>

                <!-- CONTEÚDO -->
                <div class="related-content">

                    <!-- TÍTULO -->
                    <h3 class="related-title">
                        <?php echo esc_html($related_product->get_name()); ?>
                    </h3>

                    <!-- PREÇO -->
                    <div class="related-price">

                        <?php if ($related_product->is_on_sale()) : ?>

                            <div class="related-old-price">
                                <?php echo wc_price($regular); ?>
                            </div>

                            <div class="related-sale-price">
                                <?php echo wc_price($sale); ?>
                            </div>

                        <?php else : ?>

                            <div class="related-sale-price">
                                <?php echo wc_price($related_product->get_price()); ?>
                            </div>

                        <?php endif; ?>

                    </div>

                    <!-- PARCELAMENTO -->
                    <div class="related-installments">

                        <?php
                        $price = (float) $related_product->get_price();
                        $installment = $price / 12;
                        ?>

                        em até 12x de
                        <strong>
                            <?php echo wc_price($installment); ?>
                        </strong>

                    </div>

                </div>

            </a>

        <?php endforeach; ?>

    </div>

</section>