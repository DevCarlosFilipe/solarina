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

// billing salvo
$has_saved_billing =
    !empty($checkout->get_value(
        'billing_first_name'
    ));
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

            <form
                name="checkout"
                method="post"
                class="checkout woocommerce-checkout premium-checkout"
                action="<?php echo esc_url(wc_get_checkout_url()); ?>"
                enctype="multipart/form-data">

                <!-- CLIENTE -->
                <div class="checkout-card mb-4 billing-card">

                    <!-- HEADER -->
                    <div class="checkout-card-header billing-card-header">

                        <h2>
                            Informações pessoais
                        </h2>

                    </div>

                    <!-- RESUMO -->
                    <div
                        class="billing-summary"
                        style="<?php echo $has_saved_billing ? '' : 'display:none;'; ?>">

                        <div class="billing-summary-content">

                            <?php if ($has_saved_billing) : ?>

                                <strong>
                                    <?php
                                    echo esc_html(
                                        $checkout->get_value(
                                            'billing_first_name'
                                        )
                                    );

                                    echo ' ';

                                    echo esc_html(
                                        $checkout->get_value(
                                            'billing_last_name'
                                        )
                                    );
                                    ?>
                                </strong>

                                <span>
                                    <?php
                                    echo esc_html(
                                        $checkout->get_value(
                                            'billing_address_1'
                                        )
                                    );
                                    ?>
                                </span>

                                <span>
                                    <?php
                                    echo esc_html(
                                        $checkout->get_value(
                                            'billing_city'
                                        )
                                    );

                                    echo ' - ';

                                    echo esc_html(
                                        $checkout->get_value(
                                            'billing_state'
                                        )
                                    );
                                    ?>
                                </span>

                                <span>
                                    CEP:
                                    <?php
                                    echo esc_html(
                                        $checkout->get_value(
                                            'billing_postcode'
                                        )
                                    );
                                    ?>
                                </span>

                                <span>
                                    <?php
                                    echo esc_html(
                                        $checkout->get_value(
                                            'billing_phone'
                                        )
                                    );
                                    ?>
                                </span>

                            <?php endif; ?>

                        </div>

                        <!-- EDITAR -->
                        <button
                            type="button"
                            class="edit-billing-button">

                            Editar

                        </button>

                    </div>

                    <!-- BODY -->
                    <div
                        class="checkout-card-body billing-card-body"
                        style="<?php echo $has_saved_billing ? 'display:none;' : ''; ?>">

                        <?php
                        do_action(
                            'woocommerce_checkout_billing'
                        );
                        ?>

                        <!-- ACTIONS -->
                        <div class="billing-actions">

                            <button
                                type="button"
                                class="save-billing-button">

                                Continuar

                            </button>

                        </div>

                    </div>

                </div>

                <!-- ENTREGA -->
                <div class="checkout-card">

                    <div class="checkout-card-header">

                        <h2>
                            Entrega
                        </h2>

                    </div>

                    <div class="checkout-card-body">

                        <?php
                        do_action(
                            'woocommerce_checkout_shipping'
                        );
                        ?>

                    </div>

                </div>

                <!-- PAGAMENTO -->
                <div class="checkout-card payment-card mt-4">

                    <!-- HEADER -->
                    <div class="checkout-card-header">
                        <h2>Pagamento</h2>
                    </div>

                    <!-- BODY -->
                    <div class="checkout-card-body payment-card-body">

                        <?php
                        woocommerce_checkout_payment();
                        ?>

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

                        <h2>
                            Resumo do pedido
                        </h2>

                    </div>

                    <div class="checkout-card-body">

                        <?php
                        do_action(
                            'woocommerce_checkout_order_review'
                        );
                        ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php
do_action(
    'woocommerce_after_checkout_form',
    $checkout
);
?>