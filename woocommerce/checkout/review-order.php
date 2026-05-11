<?php
defined('ABSPATH') || exit;
?>

<div class="premium-review-order">

    <!-- PRODUTOS -->
    <div class="checkout-products">

        <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) :

            $_product = apply_filters(
                'woocommerce_cart_item_product',
                $cart_item['data'],
                $cart_item,
                $cart_item_key
            );

            if ($_product && $_product->exists()) :

                $thumbnail = $_product->get_image('thumbnail');
        ?>

                <div class="checkout-product-item">

                    <!-- IMG -->
                    <div class="checkout-product-thumb">

                        <?php echo $thumbnail; ?>

                    </div>

                    <!-- INFO -->
                    <div class="checkout-product-content">

                        <div class="checkout-product-name">

                            <?php echo $_product->get_name(); ?>

                        </div>

                        <div class="checkout-product-qty">

                            Quantidade:
                            <?php echo $cart_item['quantity']; ?>

                        </div>

                    </div>

                    <!-- PREÇO -->
                    <div class="checkout-product-price">

                        <?php
                        echo WC()->cart->get_product_price($_product);
                        ?>

                    </div>

                </div>

        <?php endif;
        endforeach; ?>

    </div>

    <!-- CUPOM -->
    <?php if (wc_coupons_enabled()) : ?>
        <?php wc_get_template('checkout/form-coupon.php'); ?>
    <?php endif; ?>


    <!-- TOTAIS -->
    <div class="checkout-totals">

        <!-- SUBTOTAL -->
        <div class="checkout-total-line">

            <span>Subtotal</span>

            <strong>
                <?php wc_cart_totals_subtotal_html(); ?>
            </strong>

        </div>

        <?php
        $discount_total = WC()->cart->get_discount_total();

        if ($discount_total > 0) :
        ?>

            <div class="checkout-total-line discount-line">

                <span>
                    Descontos
                </span>

                <strong>

                    - <?php echo wc_price($discount_total); ?>

                </strong>

            </div>

        <?php endif; ?>

        <!-- FRETE -->
        <div class="checkout-total-line">

            <span>Entrega</span>

            <strong>
                <?php wc_cart_totals_shipping_html(); ?>
            </strong>

        </div>

        <!-- TOTAL -->
        <div class="checkout-total-line final-total">

            <span>Total</span>

            <strong>
                <?php wc_cart_totals_order_total_html(); ?>
            </strong>

        </div>

    </div>

</div>