<?php
defined('ABSPATH') || exit;

global $checkout;

if (!$checkout) {
    $checkout = WC()->checkout();
}

$fields = $checkout->get_checkout_fields('billing');
?>

<div class="premium-billing-wrapper">

    <!-- NOME / SOBRENOME -->
    <div class="row g-3 mb-3">

        <div class="col-md-6">

            <?php
            woocommerce_form_field(
                'billing_first_name',
                $fields['billing_first_name'],
                $checkout->get_value('billing_first_name')
            );
            ?>

        </div>

        <div class="col-md-6">

            <?php
            woocommerce_form_field(
                'billing_last_name',
                $fields['billing_last_name'],
                $checkout->get_value('billing_last_name')
            );
            ?>

        </div>

    </div>

    <!-- PAÍS -->
    <div class="mb-3">

        <?php
        woocommerce_form_field(
            'billing_country',
            $fields['billing_country'],
            $checkout->get_value('billing_country')
        );
        ?>

    </div>

    <!-- ENDEREÇO -->
    <div class="mb-2">

        <?php
        woocommerce_form_field(
            'billing_address_1',
            $fields['billing_address_1'],
            $checkout->get_value('billing_address_1')
        );
        ?>

    </div>

    <!-- COMPLEMENTO -->
    <div class="mb-3">

        <?php
        woocommerce_form_field(
            'billing_address_2',
            $fields['billing_address_2'],
            $checkout->get_value('billing_address_2')
        );
        ?>

    </div>

    <!-- CIDADE / ESTADO -->
    <div class="row g-3 mb-3">

        <div class="col-md-6">

            <?php
            woocommerce_form_field(
                'billing_city',
                $fields['billing_city'],
                $checkout->get_value('billing_city')
            );
            ?>

        </div>

        <div class="col-md-6">

            <?php
            woocommerce_form_field(
                'billing_state',
                $fields['billing_state'],
                $checkout->get_value('billing_state')
            );
            ?>

        </div>

    </div>

    <!-- CEP / TELEFONE -->
    <div class="row g-3 mb-3">

        <div class="col-md-6">

            <?php
            woocommerce_form_field(
                'billing_postcode',
                $fields['billing_postcode'],
                $checkout->get_value('billing_postcode')
            );
            ?>

        </div>

        <div class="col-md-6">

            <?php
            woocommerce_form_field(
                'billing_phone',
                $fields['billing_phone'],
                $checkout->get_value('billing_phone')
            );
            ?>

        </div>

    </div>

    <!-- EMAIL -->
    <div class="mb-0">

        <?php
        woocommerce_form_field(
            'billing_email',
            $fields['billing_email'],
            $checkout->get_value('billing_email')
        );
        ?>

    </div>

</div>