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
                $(document.body).trigger('update_checkout');
            },

            error: function (error) {
                console.log(error);
                $('#coupon-message').html(`
                    <div class="coupon-alert error">
                        Erro ao aplicar cupom.
                    </div>
                `);

                button.removeClass('loading');
                $('.premium-review-order').removeClass('loading');
            }
        });

    });

    // remover cupom
    $(document).on('click', '.remove-coupon', function () {

        const button = $(this);
        const couponCode =
            button.data('coupon');

        // skeleton loading
        $('.premium-review-order').addClass('loading');

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
                $(document.body).trigger('update_checkout');
            }
        });

    });

    $(document.body).on('updated_checkout', function (event, data) {

        // fragments
        if (data &&
            data.fragments &&
            data.fragments['.premium-review-order']
        ) {

            $('#custom-review-order').replaceWith(
                data.fragments['.premium-review-order']
            );

        }

        // remove skeleton
        $('.premium-review-order').removeClass('loading');

        // remove loading botão
        $('.woocommerce-form-coupon button').removeClass('loading');

    });

});