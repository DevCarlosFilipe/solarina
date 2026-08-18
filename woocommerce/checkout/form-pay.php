<?php
defined('ABSPATH') || exit;

$order_id = absint(get_query_var('order-pay'));
$order = wc_get_order($order_id);

if (!$order) {
    return;
}

$gateway_id = $order->get_payment_method();

$available_gateways = WC()->payment_gateways()->get_available_payment_gateways();

$gateway = $available_gateways[$gateway_id] ?? null;

if (!$gateway) {
    return;
}
?>
<input
    type="hidden"
    name="order_id"
    value="<?php echo esc_attr($order_id); ?>">
    
<div class="premium-order-pay-wrapper">

    <div class="premium-order-pay-header">

        <h1 class="premium-order-pay-title">
            Finalizar pagamento
        </h1>

        <p class="premium-order-pay-subtitle">
            Seu pedido foi criado. Conclua o pagamento para continuar.
        </p>

    </div>

    <!-- TOTAL -->
    <div class="premium-order-pay-card">

        <div class="premium-order-pay-total">

            <span>Total</span>

            <strong>

                <?php
                echo wp_kses_post(
                    $order->get_formatted_order_total()
                );
                ?>

            </strong>

        </div>

    </div>

    <!-- PAGAMENTO -->
    <div class="premium-order-pay-card">

        <div class="premium-order-pay-card-header">

            <h2>

                <?php
                echo esc_html(
                    $gateway->get_title()
                );
                ?>

            </h2>

        </div>

        <div class="premium-order-pay-gateway">

            <?php
            do_action(
                'woocommerce_thankyou_' .
                    $order->get_payment_method(),
                $order->get_id()
            );
            ?>

        </div>

    </div>

    <!-- RESUMO -->
    <div class="premium-order-pay-card">

        <div class="premium-order-pay-card-header">

            <h2>
                Resumo do pedido
            </h2>

        </div>

        <div class="premium-order-pay-products">

            <?php
            foreach (
                $order->get_items()
                as $item_id => $item
            ) :

                $product = $item->get_product();

                if (!$product) {
                    continue;
                }

                $thumbnail = $product->get_image('thumbnail');
            ?>

                <div class="premium-order-pay-product">

                    <div class="premium-order-pay-thumb">

                        <?php echo $thumbnail; ?>

                    </div>

                    <div class="premium-order-pay-content">

                        <strong>

                            <?php
                            echo esc_html(
                                $item->get_name()
                            );
                            ?>

                        </strong>

                        <span>

                            Quantidade:
                            <?php
                            echo $item->get_quantity();
                            ?>

                        </span>

                    </div>

                    <div class="premium-order-pay-price">

                        <?php
                        echo wp_kses_post(
                            $order->get_formatted_line_subtotal($item)
                        );
                        ?>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</div>