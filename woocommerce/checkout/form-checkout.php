<?php
defined('ABSPATH') || exit;

global $checkout;

if (!$checkout) {
    $checkout = WC()->checkout();
}

do_action('woocommerce_before_checkout_form', $checkout);

if (
    !$checkout->is_registration_enabled() &&
    $checkout->is_registration_required() &&
    !is_user_logged_in()
) {

    echo esc_html(
        apply_filters(
            'woocommerce_checkout_must_be_logged_in_message',
            __('Você precisa estar logado para finalizar a compra.', 'woocommerce')
        )
    );

    return;
}
?>

<div class="container">

    <!-- HEADER -->
    <div class="checkout-header">

        <h1 class="checkout-main-title">
            Finalizar compra
        </h1>

        <p class="checkout-subtitle">
            Preencha seus dados para concluir seu pedido.
        </p>

    </div>

    <div class="row g-4">

        <!-- ESQUERDA -->
        <div class="col-lg-8">

            <form name="checkout"
                method="post"
                class="checkout woocommerce-checkout premium-checkout"
                action="<?php echo esc_url(wc_get_checkout_url()); ?>"
                enctype="multipart/form-data">

                <!-- CLIENTE -->
                <div class="checkout-card mb-4">

                    <div class="checkout-card-header">
                        <h2>Informações pessoais</h2>
                    </div>

                    <div class="checkout-card-body">
                        <?php do_action('woocommerce_checkout_billing'); ?>
                    </div>

                </div>

                <!-- ENTREGA -->
                <div class="checkout-card">

                    <div class="checkout-card-header">
                        <h2>Entrega</h2>
                    </div>

                    <div class="checkout-card-body">
                        <?php do_action('woocommerce_checkout_shipping'); ?>
                    </div>

                </div>
            </form>
        </div>

        <!-- DIREITA -->
        <div class="col-lg-4">

            <div class="checkout-sidebar">

                <!-- RESUMO -->
                <div class="checkout-card sticky-checkout">

                    <div class="checkout-card-header">
                        <h2>Resumo do pedido</h2>
                    </div>

                    <div class="checkout-card-body">

                        <?php do_action('woocommerce_checkout_order_review'); ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>