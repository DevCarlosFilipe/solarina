<?php
defined('ABSPATH') || exit;

global $wp;

$order_id = absint($wp->query_vars['order-received']);

$order = wc_get_order($order_id);

if (!$order) {
    return;
}
?>

<div class="premium-thankyou-wrapper">

    <!-- HEADER -->
    <div class="premium-thankyou-header">

        <div class="premium-thankyou-icon">
            ✓
        </div>

        <h1 class="premium-thankyou-title">
            Pedido realizado com sucesso
        </h1>

        <p class="premium-thankyou-subtitle">

            Obrigado pela sua compra.
            Seu pedido foi recebido e já está sendo processado.

        </p>

    </div>

    <!-- INFO -->
    <div class="premium-thankyou-card">

        <div class="premium-thankyou-grid">

            <!-- PEDIDO -->
            <div class="premium-thankyou-item">

                <span class="label">
                    Pedido
                </span>

                <strong>
                    #<?php echo $order->get_order_number(); ?>
                </strong>

            </div>

            <!-- DATA -->
            <div class="premium-thankyou-item">

                <span class="label">
                    Data
                </span>

                <strong>
                    <?php
                    echo wc_format_datetime(
                        $order->get_date_created()
                    );
                    ?>
                </strong>

            </div>

            <!-- EMAIL -->
            <div class="premium-thankyou-item">

                <span class="label">
                    E-mail
                </span>

                <strong>
                    <?php
                    echo esc_html(
                        $order->get_billing_email()
                    );
                    ?>
                </strong>

            </div>

            <!-- TOTAL -->
            <div class="premium-thankyou-item">

                <span class="label">
                    Total
                </span>

                <strong>
                    <?php
                    echo wp_kses_post(
                        $order->get_formatted_order_total()
                    );
                    ?>
                </strong>

            </div>

            <!-- PAGAMENTO -->
            <div class="premium-thankyou-item full">

                <span class="label">
                    Método de pagamento
                </span>

                <strong>
                    <?php
                    echo esc_html(
                        $order->get_payment_method_title()
                    );
                    ?>
                </strong>

            </div>

        </div>

    </div>

    <!-- RESUMO -->
    <div class="premium-thankyou-card">

        <h2 class="premium-thankyou-section-title">
            Resumo do pedido
        </h2>

        <div class="premium-thankyou-products">

            <?php
            foreach (
                $order->get_items()
                as $item_id => $item
            ) :

                $product =
                    $item->get_product();

                if (!$product) {
                    continue;
                }

                $thumbnail =
                    $product->get_image(
                        'thumbnail'
                    );
            ?>

                <div class="premium-thankyou-product">

                    <!-- IMG -->
                    <div class="premium-thankyou-product-thumb">

                        <?php echo $thumbnail; ?>

                    </div>

                    <!-- INFO -->
                    <div class="premium-thankyou-product-content">

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

                    <!-- TOTAL -->
                    <div class="premium-thankyou-product-price">

                        <?php
                        echo wp_kses_post(
                            $order->get_formatted_line_subtotal(
                                $item
                            )
                        );
                        ?>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

    <!-- AÇÕES -->
    <div class="premium-thankyou-actions">

        <a
            href="<?php echo esc_url(home_url('/')); ?>"
            class="premium-thankyou-button">

            Voltar para loja

        </a>

    </div>

</div>

<?php do_action('woocommerce_thankyou', $order->get_id()); ?>