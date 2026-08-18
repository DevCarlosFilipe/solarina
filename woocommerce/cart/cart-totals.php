<?php
defined('ABSPATH') || exit;
?>

<div class="cart-collaterals premium-cart-collaterals">

    <div class="cart_totals premium-cart-summary">

        <!-- TITLE -->
        <h2 class="premium-cart-summary-title">
            Total no carrinho
        </h2>

        <!-- SUBTOTAL -->
        <div class="premium-cart-row">

            <span>
                Subtotal
            </span>

            <strong>

                <?php
                wc_cart_totals_subtotal_html();
                ?>

            </strong>

        </div>

        <!-- CUPONS -->
        <?php
        foreach (
            WC()->cart->get_coupons()
            as $code => $coupon
        ) :
        ?>

            <div class="premium-cart-row premium-cart-discount">

                <span>

                    Cupom:
                    <?php
                    echo esc_html(
                        strtoupper($code)
                    );
                    ?>

                </span>

                <strong>

                    <?php
                    wc_cart_totals_coupon_html(
                        $coupon
                    );
                    ?>

                </strong>

            </div>

        <?php endforeach; ?>

        <!-- FRETE -->
        <?php
        if (
            WC()->cart->needs_shipping() &&
            WC()->cart->show_shipping()
        ) :
        ?>

            <div class="premium-cart-row">

                <span>
                    Entrega
                </span>

                <strong>

                    <?php
                    wc_cart_totals_shipping_html();
                    ?>

                </strong>

            </div>

        <?php endif; ?>

        <!-- TOTAL -->
        <div class="premium-cart-total">

            <span>
                Total estimado
            </span>

            <strong>

                <?php
                wc_cart_totals_order_total_html();
                ?>

            </strong>

        </div>

        <!-- CHECKOUT -->
        <div class="premium-cart-checkout">

            <a
                href="<?php echo esc_url(wc_get_checkout_url()); ?>"
                class="premium-cart-checkout-button">

                Continuar para finalização

            </a>

        </div>

    </div>

</div>