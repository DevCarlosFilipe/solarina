<?php
defined('ABSPATH') || exit;

global $checkout;

if (!$checkout) {
    $checkout = WC()->checkout();
}

$fields = $checkout->get_checkout_fields('shipping');
?>

<div class="premium-shipping-wrapper">

    <?php if (WC()->cart->needs_shipping_address()) : ?>

        <!-- CHECKBOX -->
        <div class="shipping-toggle-wrapper mb-4">

            <label class="shipping-toggle">

                <input
                    id="ship-to-different-address-checkbox"
                    type="checkbox"
                    name="ship_to_different_address"
                    value="1"
                    <?php checked(
                        apply_filters(
                            'woocommerce_ship_to_different_address_checked',
                            'shipping' === get_option(
                                'woocommerce_ship_to_destination'
                            ) ? 1 : 0
                        ),
                        1
                    ); ?> />

                <span>
                    Entregar em um endereço diferente
                </span>

            </label>

        </div>

        <!-- CAMPOS -->
        <div
            class="shipping-fields-wrapper"
            style="<?php echo WC()->checkout()->get_value('ship_to_different_address') ? '' : 'display:none;'; ?>">

            <!-- NOME / SOBRENOME -->
            <div class="row g-3 mb-3">

                <div class="col-md-6">

                    <?php
                    woocommerce_form_field(
                        'shipping_first_name',
                        $fields['shipping_first_name'],
                        $checkout->get_value('shipping_first_name')
                    );
                    ?>

                </div>

                <div class="col-md-6">

                    <?php
                    woocommerce_form_field(
                        'shipping_last_name',
                        $fields['shipping_last_name'],
                        $checkout->get_value('shipping_last_name')
                    );
                    ?>

                </div>

            </div>

            <!-- PAÍS -->
            <div class="mb-3">

                <?php
                woocommerce_form_field(
                    'shipping_country',
                    $fields['shipping_country'],
                    $checkout->get_value('shipping_country')
                );
                ?>

            </div>

            <!-- ENDEREÇO -->
            <div class="mb-2">

                <?php
                woocommerce_form_field(
                    'shipping_address_1',
                    $fields['shipping_address_1'],
                    $checkout->get_value('shipping_address_1')
                );
                ?>

            </div>

            <!-- COMPLEMENTO -->
            <div class="mb-3">

                <?php
                woocommerce_form_field(
                    'shipping_address_2',
                    $fields['shipping_address_2'],
                    $checkout->get_value('shipping_address_2')
                );
                ?>

            </div>

            <!-- CIDADE / ESTADO -->
            <div class="row g-3 mb-3">

                <div class="col-md-6">

                    <?php
                    woocommerce_form_field(
                        'shipping_city',
                        $fields['shipping_city'],
                        $checkout->get_value('shipping_city')
                    );
                    ?>

                </div>

                <div class="col-md-6">

                    <?php
                    woocommerce_form_field(
                        'shipping_state',
                        $fields['shipping_state'],
                        $checkout->get_value('shipping_state')
                    );
                    ?>

                </div>

            </div>

            <!-- CEP -->
            <div class="mb-0">

                <?php
                woocommerce_form_field(
                    'shipping_postcode',
                    $fields['shipping_postcode'],
                    $checkout->get_value('shipping_postcode')
                );
                ?>

            </div>

        </div>

    <?php endif; ?>

    <!-- MÉTODOS DE ENTREGA -->
    <?php if (WC()->cart->needs_shipping()) : ?>

        <div class="shipping-methods-wrapper mt-4">

            <h3 class="shipping-methods-title">
                Opções de entrega
            </h3>

            <?php
            $packages = WC()->shipping()->get_packages();

            foreach ($packages as $i => $package) :

                $chosen_method =
                    WC()->session->get(
                        'chosen_shipping_methods'
                    )[$i] ?? '';

                $rates = $package['rates'];

                // menor preço
                $lowest_rate = null;

                foreach ($rates as $rate_id => $rate) {

                    if (
                        is_null($lowest_rate) ||
                        $rate->cost < $lowest_rate->cost
                    ) {

                        $lowest_rate = $rate;
                    }
                }

                foreach ($rates as $rate_id => $rate) :

                    $checked =
                        $lowest_rate &&
                        $lowest_rate->id === $rate->id;
            ?>

                    <label class="shipping-method-item">

                        <input
                            type="radio"
                            name="shipping_method[<?php echo esc_attr($i); ?>]"
                            value="<?php echo esc_attr($rate->id); ?>"
                            <?php checked($checked); ?>>

                        <div class="shipping-method-content">

                            <span class="shipping-method-label">

                                <?php
                                echo esc_html(
                                    $rate->get_label()
                                );
                                ?>

                            </span>

                            <strong class="shipping-method-price">

                                <?php
                                echo wc_price(
                                    $rate->cost
                                );
                                ?>

                            </strong>

                        </div>

                    </label>

            <?php
                endforeach;

            endforeach;
            ?>

        </div>

    <?php endif; ?>

    <!-- OBSERVAÇÕES -->
    <div class="shipping-notes-wrapper mt-4">

        <?php foreach ($checkout->get_checkout_fields('order') as $key => $field) : ?>

            <?php
            woocommerce_form_field(
                $key,
                $field,
                $checkout->get_value($key)
            );
            ?>

        <?php endforeach; ?>

    </div>

</div>