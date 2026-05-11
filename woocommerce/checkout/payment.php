<?php
defined('ABSPATH') || exit;
$order_button_text = apply_filters(
    'woocommerce_order_button_text',
    __('Finalizar compra', 'woocommerce')
);
if (!wp_doing_ajax()) {
    do_action('woocommerce_review_order_before_payment');
}
?>

<div id="payment" class="woocommerce-checkout-payment premium-payment-wrapper">

    <?php if (WC()->cart && WC()->cart->needs_payment()) : ?>

        <?php
        $available_gateways =
            WC()->payment_gateways()
            ->get_available_payment_gateways();
        ?>

        <?php if (!empty($available_gateways)) : ?>

            <div class="payment-methods-wrapper">

                <?php foreach ($available_gateways as $gateway) : ?>

                    <label
                        class="payment-method-item <?php echo $gateway->chosen ? 'active' : ''; ?>">

                        <!-- RADIO -->
                        <input
                            type="radio"
                            class="payment-method-radio input-radio"
                            name="payment_method"
                            value="<?php echo esc_attr($gateway->id); ?>"
                            <?php checked($gateway->chosen, true); ?> />

                        <!-- CONTENT -->
                        <div class="payment-method-content">

                            <!-- INFO -->
                            <div class="payment-method-info">

                                <span class="payment-method-title">

                                    <?php
                                    echo esc_html(
                                        $gateway->get_title()
                                    );
                                    ?>

                                </span>

                            </div>

                            <!-- ICON -->
                            <?php if ($gateway->get_icon()) : ?>

                                <div class="payment-method-icon">

                                    <?php
                                    echo $gateway->get_icon();
                                    ?>

                                </div>

                            <?php endif; ?>

                        </div>

                    </label>

                    <!-- DESCRIPTION -->
                    <div
                        class="payment-method-description"
                        style="<?php echo $gateway->chosen ? '' : 'display:none;'; ?>">

                        <?php
                        if ($gateway->has_fields() || $gateway->get_description()) {

                            $gateway->payment_fields();
                        }
                        ?>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php else : ?>

            <div class="woocommerce-notice woocommerce-notice--info woocommerce-info">

                <?php
                echo wp_kses_post(
                    apply_filters(
                        'woocommerce_no_available_payment_methods_message',
                        WC()->customer->get_billing_country()
                            ? esc_html__(
                                'Nenhum método de pagamento disponível.',
                                'woocommerce'
                            )
                            : esc_html__(
                                'Informe seu endereço para ver as formas de pagamento.',
                                'woocommerce'
                            )
                    )
                );
                ?>

            </div>

        <?php endif; ?>

    <?php endif; ?>

    <!-- TERMOS -->
    <div class="payment-terms-wrapper">

        <?php wc_get_template('checkout/terms.php'); ?>

    </div>

    <!-- BOTÃO -->
    <div class="payment-submit-wrapper">

        <?php do_action('woocommerce_review_order_before_submit'); ?>

        <?php
        echo apply_filters(
            'woocommerce_order_button_html',
            '<button type="submit"
                class="button alt premium-place-order-button"
                name="woocommerce_checkout_place_order"
                id="place_order"
                value="' . esc_attr(
                $order_button_text
            ) . '"
                data-value="' . esc_attr(
                $order_button_text
            ) . '">

                Finalizar compra

            </button>'
        );
        ?>

        <?php do_action('woocommerce_review_order_after_submit'); ?>

    </div>

    <?php wp_nonce_field(
        'woocommerce-process_checkout',
        'woocommerce-process-checkout-nonce'
    ); ?>

</div>

<?php
if (!wp_doing_ajax()) {
    do_action('woocommerce_review_order_after_payment');
}
?>