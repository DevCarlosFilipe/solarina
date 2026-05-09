<?php
defined('ABSPATH') || exit;

global $product;

$sales_count = $product->get_total_sales();
$average      = $product->get_average_rating();
$review_count = $product->get_review_count();
?>

<div class="custom-summary-wrapper">

    <!-- BADGES -->
    <div class="product-badges d-flex gap-2 mb-3">

        <?php if ($product->is_on_sale()) : ?>
            <span class="badge bg-danger px-3 py-2">
                Oferta
            </span>
        <?php endif; ?>

        <?php if ($product->is_featured()) : ?>
            <span class="badge bg-warning text-dark px-3 py-2">
                Destaque
            </span>
        <?php endif; ?>

    </div>

    <!-- TÍTULO -->
    <h1 class="product-title mb-3">
        <?php the_title(); ?>
    </h1>

    <!-- INFO SUPERIOR -->
    <div class="product-top-info d-flex flex-wrap align-items-center gap-3 mb-4">

        <!-- AVALIAÇÃO -->
        <div class="product-rating">
            <?php woocommerce_template_single_rating(); ?>
        </div>

        <!-- VENDAS -->
        <div class="product-sales text-muted small">
            <?php echo esc_html($sales_count); ?> vendidos
        </div>

        <!-- REVIEWS -->
        <div class="product-reviews text-muted small">
            <?php echo esc_html($review_count); ?> avaliações
        </div>

    </div>

    <!-- PREÇO -->
    <div class="product-price-wrapper mb-4">

        <?php if ($product->is_on_sale()) : ?>

            <div class="old-price text-muted mb-1">
                <del>
                    <?php echo wc_price($product->get_regular_price()); ?>
                </del>
            </div>

        <?php endif; ?>

        <div class="product-price">
            <?php
            $price = $product->is_on_sale()
                ? $product->get_sale_price()
                : $product->get_regular_price();

            echo wc_price($price);
            ?>
        </div>

        <?php if ($product->is_on_sale()) : ?>

            <?php
            $regular = (float) $product->get_regular_price();
            $sale    = (float) $product->get_sale_price();

            if ($regular > 0) {
                $discount = round((($regular - $sale) / $regular) * 100);
            ?>
                <div class="discount-badge mt-2">
                    <?php echo esc_html($discount); ?>% OFF
                </div>
            <?php } ?>

        <?php endif; ?>

    </div>

    <?php /*
    <!-- PARCELAMENTO -->
    <div class="installments-box mb-4">

        <?php
        $price = (float) $product->get_price();
        $installments = 12;

        if ($price > 0) :
            $installment_value = $price / $installments;
        ?>

            <span>
                em até <strong><?php echo $installments; ?>x</strong> de
                <strong><?php echo wc_price($installment_value); ?></strong>
                sem juros
            </span>

        <?php endif; ?>

    </div>
    */ ?>
    <!-- DESCRIÇÃO CURTA -->
    <div class="product-short-description mb-4">
        <?php woocommerce_template_single_excerpt(); ?>
    </div>

    <!-- FRETE -->
    <div class="shipping-box mb-4">

        <div class="shipping-title mb-2">
            Entrega
        </div>

        <div class="shipping-content text-muted">
            Envio rápido e seguro para todo Brasil.
        </div>

    </div>

    <div class="purchase-box">

    <!-- ESTOQUE -->
    <div class="stock-box mb-4">

        <?php if ($product->is_in_stock()) : ?>

            <div class="in-stock">
                ✔ Em estoque
            </div>

        <?php else : ?>

            <div class="out-stock">
                ✖ Fora de estoque
            </div>

        <?php endif; ?>

    </div>

    <!-- QUANTIDADE -->
    <div class="quantity-wrapper mb-4">

        <label class="quantity-label mb-2">
            Quantidade:
        </label>

        <?php woocommerce_quantity_input(); ?>

    </div>

    <!-- BOTÕES -->
    <div class="purchase-buttons">

        <!-- ADD CARRINHO -->
        <button type="submit"
                name="add-to-cart"
                value="<?php echo esc_attr($product->get_id()); ?>"
                class="single_add_to_cart_button custom-cart-btn">

            Adicionar ao carrinho

        </button>

        <!-- COMPRAR AGORA -->
        <button class="buy-now-btn">

            Comprar agora

        </button>

    </div>

</div>

    <!-- META -->
    <div class="product-meta-wrapper mt-4">
        <?php woocommerce_template_single_meta(); ?>
    </div>

</div>