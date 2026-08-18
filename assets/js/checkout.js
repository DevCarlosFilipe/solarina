jQuery(function ($) {

    // submit cupom
    $(document).on('submit', '.woocommerce-form-coupon', function (event) {

        event.preventDefault();

        // limpa mensagens
        $('#coupon-message').html('');

        // form
        const form = $(this);

        // botão
        const button = form.find(
            'button[name="apply_coupon"]'
        );

        // cupom
        const couponCode = form.find(
            'input[name="coupon_code"]'
        ).val().trim();

        // vazio
        if (!couponCode) {

            $('#coupon-message').html(`
                <div class="coupon-alert error">
                    Digite um cupom.
                </div>
            `);

            return;
        }

        // loading botão
        button.addClass('loading');

        // skeleton loading
        $('.premium-review-order')
            .addClass('loading');

        // ajax
        $.ajax({

            type: 'POST',

            url: custom_coupon.ajax_url,

            data: {
                action: 'validate_coupon',
                security: custom_coupon.nonce,
                coupon_code: couponCode
            },

            success: function (response) {

                // mensagem
                $('#coupon-message').html(`
                    <div class="coupon-alert ${response.success ? 'success' : 'error'}">
                        ${response.message}
                    </div>
                `);

                // atualiza checkout
                $(document.body)
                    .trigger('update_checkout');

            },

            error: function (error) {

                console.log(error);

                $('#coupon-message').html(`
                    <div class="coupon-alert error">
                        Erro ao aplicar cupom.
                    </div>
                `);

                button.removeClass('loading');

                $('.premium-review-order')
                    .removeClass('loading');

            }

        });

    });

    // remover cupom
    $(document).on('click', '.remove-coupon', function () {

        const couponCode =
            $(this).data('coupon');

        // skeleton loading
        $('.premium-review-order')
            .addClass('loading');

        $.ajax({

            type: 'POST',

            url: custom_coupon.ajax_url,

            data: {
                action: 'remove_coupon_custom',
                security: custom_coupon.nonce,
                coupon_code: couponCode
            },

            success: function (response) {

                $('#coupon-message').html(`
                    <div class="coupon-alert success">
                        ${response.message}
                    </div>
                `);

                // atualiza checkout
                $(document.body)
                    .trigger('update_checkout');

            }

        });

    });

    // checkout atualizado
    $(document.body).on('updated_checkout', function (event, data) {

        // fragments
        if (
            data &&
            data.fragments &&
            data.fragments['.premium-review-order']
        ) {

            $('.premium-review-order').replaceWith(
                data.fragments['.premium-review-order']
            );

        }

        // remove skeleton
        $('.premium-review-order')
            .removeClass('loading');

        // remove loading botão
        $('.woocommerce-form-coupon button')
            .removeClass('loading');

    });

    // auto preencher cep
    $(document).on('blur', '#billing_postcode', function () {

        // cep
        let cep = $(this)
            .val()
            .replace(/\D/g, '');

        // inválido
        if (cep.length !== 8) {
            return;
        }

        // loading
        $('#billing_address_1')
            .val('Carregando...');

        // request
        $.getJSON(
            `https://viacep.com.br/ws/${cep}/json/`,
            function (data) {

                // erro
                if (data.erro) {
                    return;
                }

                // endereço
                $('#billing_address_1')
                    .val(data.logradouro);

                // cidade
                $('#billing_city')
                    .val(data.localidade);

                // estado
                $('#billing_state')
                    .val(data.uf)
                    .trigger('change');

            }
        );

    });

    // salvar billing
    $(document).on('click', '.save-billing-button', function () {

        const button = $(this);

        // form billing
        const formData =
            $('.premium-checkout')
                .serialize();

        // loading
        button.addClass('loading');

        // ajax
        $.ajax({

            type: 'POST',

            url: custom_coupon.ajax_url,

            data: {
                action: 'save_checkout_billing',
                security: custom_coupon.nonce,
                form_data: formData
            },

            success: function () {

                const firstName =
                    $('#billing_first_name').val();

                const lastName =
                    $('#billing_last_name').val();

                const address =
                    $('#billing_address_1').val();

                const city =
                    $('#billing_city').val();

                const state =
                    $('#billing_state option:selected').text();

                const postcode =
                    $('#billing_postcode').val();

                const phone =
                    $('#billing_phone').val();

                // limpa resumo
                $('.billing-summary-content')
                    .empty();

                // resumo
                $('.billing-summary-content').html(`
                    <strong>
                        ${firstName} ${lastName}
                    </strong>

                    <span>
                        ${address}
                    </span>

                    <span>
                        ${city} - ${state}
                    </span>

                    <span>
                        CEP: ${postcode}
                    </span>

                    <span>
                        ${phone}
                    </span>
                `);

                // salva estado
                localStorage.setItem(
                    'billing_saved',
                    'true'
                );

                // esconde form
                $('.billing-card-body')
                    .hide();

                // mostra resumo
                $('.billing-summary')
                    .show();

                // atualiza checkout
                $(document.body)
                    .trigger('update_checkout');

            },

            complete: function () {

                button.removeClass('loading');

            }

        });

    });

    // editar billing
    $(document).on('click', '.edit-billing-button', function () {

        // remove estado salvo
        localStorage.removeItem(
            'billing_saved'
        );

        // esconde resumo
        $('.billing-summary')
            .hide();

        // mostra formulário
        $('.billing-card-body')
            .show();

    });

    // restore billing state
    if (
        localStorage.getItem(
            'billing_saved'
        ) === 'true'
    ) {

        $('.billing-card-body')
            .hide();

        $('.billing-summary')
            .show();

    }

    // toggle shipping
    $(document).on(
        'change',
        '#ship-to-different-address-checkbox',
        function () {

            // marcado
            if ($(this).is(':checked')) {

                $('.shipping-fields-wrapper')
                    .slideDown(220);

            }

            // desmarcado
            else {

                $('.shipping-fields-wrapper')
                    .slideUp(220);

            }

            // atualiza checkout
            $(document.body)
                .trigger('update_checkout');

        }
    );
    // mudar método entrega
    $(document).on(
        'change',
        'input[name^="shipping_method"]',
        function () {

            $('.premium-review-order')
                .addClass('loading');

            $(document.body)
                .trigger('update_checkout');

        }
    );
});

// PIX WATCHER
if ($('body').hasClass('woocommerce-order-pay')) {

    // order id
    const orderId =
        $('input[name="order_id"]').val();

    // existe
    if (orderId) {

        // interval
        setInterval(function () {

            $.ajax({

                type: 'POST',

                url: custom_coupon.ajax_url,

                data: {

                    action:
                        'check_order_payment_status',

                    order_id:
                        orderId

                },

                success: function (response) {

                    // pago
                    if (
                        response.paid &&
                        response.redirect
                    ) {

                        window.location.href =
                            response.redirect;

                    }

                }

            });

        }, 3000);

    }

}