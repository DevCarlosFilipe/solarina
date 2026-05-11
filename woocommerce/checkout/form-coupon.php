<?php
defined('ABSPATH') || exit;

if (!wc_coupons_enabled()) {
    return;
}
?>

<div class="checkout-coupon-box">

    <div class="coupon-title">
        Cupom de desconto
    </div>

    <!-- NOTIFICAÇÕES -->
    <div id="coupon-message">

        <?php wc_print_notices(); ?>

    </div>

    <!-- FORM -->
    <form class="woocommerce-form-coupon" method="post">

        <div class="custom-coupon-form">

            <input type="text"
                name="coupon_code"
                class="coupon-input input-text"
                placeholder="Digite seu cupom"
                id="coupon_code"
                value="">

            <button type="submit"
                class="coupon-button button"
                name="apply_coupon"
                value="<?php esc_attr_e('Aplicar', 'woocommerce'); ?>">

                Aplicar

            </button>

        </div>

    </form>

    <?php foreach (WC()->cart->get_applied_coupons() as $coupon_code) : ?>

        <div class="active-coupon">

            <span>
                <?php echo esc_html($coupon_code); ?>
            </span>

            <button
                type="button"
                class="remove-coupon"
                data-coupon="<?php echo esc_attr($coupon_code); ?>">

                Remover

            </button>

        </div>

    <?php endforeach; ?>

</div>