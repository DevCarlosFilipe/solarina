<?php

add_action(
    'wp_ajax_validate_coupon',
    'custom_validate_coupon'
);

add_action(
    'wp_ajax_nopriv_validate_coupon',
    'custom_validate_coupon'
);

function custom_validate_coupon()
{
    // segurança
    check_ajax_referer(
        'custom_coupon_nonce',
        'security'
    );

    // cupom
    $coupon_code = isset($_POST['coupon_code'])
        ? wc_format_coupon_code(
            wp_unslash($_POST['coupon_code'])
        ) : '';

    // vazio
    if (empty($coupon_code)) {

        wp_send_json([
            'success' => false,
            'message' => 'Digite um cupom.'
        ]);
    }

    // aplica desconto
    $applied = WC()->cart->apply_coupon(
        $coupon_code
    );

    // erro
    if (is_wp_error($applied)) {

        wp_send_json([
            'success' => false,
            'message' => $applied->get_error_message()
        ]);
    }

    // cupom inválido
    if (!$applied) {

        wp_send_json([
            'success' => false,
            'message' => 'Cupom inválido.'
        ]);
    }

    // recalcula
    WC()->cart->calculate_totals();

    // sucesso
    wp_send_json([
        'success' => true,
        'message' => 'Cupom aplicado com sucesso.'
    ]);
}

add_action(
    'wp_enqueue_scripts',
    function () {

        wp_localize_script(
            'solarina-checkout-script',
            'custom_coupon',
            [
                'ajax_url' => admin_url(
                    'admin-ajax.php'
                ),

                'nonce' => wp_create_nonce(
                    'custom_coupon_nonce'
                )
            ]
        );
    }
);


// Removendo cupom de desconto

add_action(
    'wp_ajax_remove_coupon_custom',
    'custom_remove_coupon'
);

add_action(
    'wp_ajax_nopriv_remove_coupon_custom',
    'custom_remove_coupon'
);

function custom_remove_coupon()
{
    check_ajax_referer(
        'custom_coupon_nonce',
        'security'
    );

    $coupon_code = isset($_POST['coupon_code'])
        ? wc_format_coupon_code(
            wp_unslash($_POST['coupon_code'])
        )
        : '';

    if (empty($coupon_code)) {

        wp_send_json([
            'success' => false,
            'message' => 'Cupom inválido.'
        ]);
    }

    WC()->cart->remove_coupon(
        $coupon_code
    );

    WC()->cart->calculate_totals();

    wp_send_json([
        'success' => true,
        'message' => 'Cupom removido.'
    ]);
}

add_filter(
    'woocommerce_update_order_review_fragments',
    function ($fragments) {

        ob_start();

        wc_get_template(
            'checkout/review-order.php'
        );

        $fragments['.premium-review-order'] =
            ob_get_clean();

        return $fragments;
    }
);

add_action(
    'wp_ajax_save_checkout_billing',
    'custom_save_checkout_billing'
);

add_action(
    'wp_ajax_nopriv_save_checkout_billing',
    'custom_save_checkout_billing'
);

function custom_save_checkout_billing()
{
    check_ajax_referer(
        'custom_coupon_nonce',
        'security'
    );

    parse_str(
        $_POST['form_data'],
        $data
    );

    foreach ($data as $key => $value) {

        if (
            strpos($key, 'billing_') === 0
        ) {

            WC()->session->set(
                $key,
                sanitize_text_field($value)
            );

            // usuário logado
            if (is_user_logged_in()) {

                update_user_meta(
                    get_current_user_id(),
                    $key,
                    sanitize_text_field($value)
                );
            }
        }
    }

    wp_send_json([
        'success' => true
    ]);
}

// Validando pagamento do pedido via AJAX
add_action(
    'wp_ajax_check_order_payment_status',
    'check_order_payment_status'
);

add_action(
    'wp_ajax_nopriv_check_order_payment_status',
    'check_order_payment_status'
);

function check_order_payment_status()
{
    // pedido
    $order_id =
        absint($_POST['order_id']);

    // order
    $order =
        wc_get_order($order_id);

    // inválido
    if (!$order) {

        wp_send_json([
            'paid' => false
        ]);

    }

    // status
    $paid =
        $order->has_status([
            'processing',
            'completed'
        ]);

    // retorno
    wp_send_json([

        'paid' => $paid,

        'redirect' =>
            $order->get_checkout_order_received_url()

    ]);
}