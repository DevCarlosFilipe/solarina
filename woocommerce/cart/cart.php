<?php
defined('ABSPATH') || exit;

do_action('woocommerce_before_cart');
?>

<div class="premium-cart-wrapper">

    <!-- LEFT -->
    <div class="premium-cart-left">

        <form
            class="woocommerce-cart-form"
            action="<?php echo esc_url(wc_get_cart_url()); ?>"
            method="post">

            <table
                class="shop_table shop_table_responsive cart woocommerce-cart-form__contents premium-cart-table"
                cellspacing="0">

                <thead>

                    <tr>

                        <th class="product-name" colspan="2">
                            Produto
                        </th>

                        <th class="product-subtotal">
                            Total
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php
                    foreach (
                        WC()->cart->get_cart()
                        as $cart_item_key => $cart_item
                    ) :

                        $_product =
                            apply_filters(
                                'woocommerce_cart_item_product',
                                $cart_item['data'],
                                $cart_item,
                                $cart_item_key
                            );

                        if (
                            !$_product ||
                            !$_product->exists() ||
                            $cart_item['quantity'] <= 0
                        ) {
                            continue;
                        }

                        $product_permalink =
                            $_product->is_visible()
                            ? $_product->get_permalink(
                                $cart_item
                            )
                            : '';
                    ?>

                        <tr class="premium-cart-item">

                            <!-- PRODUCT -->
                            <td class="premium-cart-product-cell">

                                <!-- THUMB -->
                                <div class="premium-cart-thumb">

                                    <?php
                                    $thumbnail =
                                        $_product->get_image();

                                    if (
                                        !$product_permalink
                                    ) {

                                        echo $thumbnail;
                                    } else {

                                        printf(
                                            '<a href="%s">%s</a>',
                                            esc_url(
                                                $product_permalink
                                            ),
                                            $thumbnail
                                        );
                                    }
                                    ?>

                                </div>

                                <!-- CONTENT -->
                                <div class="premium-cart-content">

                                    <!-- NAME -->
                                    <div class="premium-cart-name">

                                        <?php
                                        if (
                                            !$product_permalink
                                        ) {

                                            echo wp_kses_post(
                                                $_product->get_name()
                                            );
                                        } else {

                                            printf(
                                                '<a href="%s">%s</a>',
                                                esc_url(
                                                    $product_permalink
                                                ),
                                                wp_kses_post(
                                                    $_product->get_name()
                                                )
                                            );
                                        }
                                        ?>

                                    </div>

                                    <!-- PRICE -->
                                    <div class="premium-cart-price">

                                        <?php
                                        echo WC()->cart->get_product_price(
                                            $_product
                                        );
                                        ?>

                                    </div>

                                    <!-- ACTIONS -->
                                    <div class="premium-cart-actions-inline">

                                        <!-- QTY -->
                                        <div class="premium-cart-qty">

                                            <button
                                                type="button"
                                                class="premium-qty-minus">

                                                -

                                            </button>

                                            <?php
                                            woocommerce_quantity_input(
                                                [
                                                    'input_name' =>
                                                    "cart[{$cart_item_key}][qty]",

                                                    'input_value' =>
                                                    $cart_item['quantity'],

                                                    'max_value' =>
                                                    $_product->get_max_purchase_quantity(),

                                                    'min_value' => 0,

                                                    'input_class' => [
                                                        'premium-qty-input'
                                                    ]
                                                ],
                                                $_product,
                                                false
                                            );
                                            ?>

                                            <button
                                                type="button"
                                                class="premium-qty-plus">

                                                +

                                            </button>

                                        </div>

                                        <!-- REMOVE -->
                                        <div class="premium-cart-remove">

                                            <?php
                                            echo sprintf(
                                                '<a href="%s" class="remove">&times;</a>',
                                                esc_url(
                                                    wc_get_cart_remove_url(
                                                        $cart_item_key
                                                    )
                                                )
                                            );
                                            ?>

                                        </div>

                                    </div>

                                </div>

                            </td>

                            <!-- SUBTOTAL -->
                            <td class="premium-cart-subtotal">

                                <?php
                                echo WC()->cart->get_product_subtotal(
                                    $_product,
                                    $cart_item['quantity']
                                );
                                ?>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    <!-- ACTIONS -->
                    <tr>

                        <td colspan="2" class="premium-cart-footer">

                            <?php if (wc_coupons_enabled()) : ?>

                                <div class="coupon premium-cart-coupon">

                                    <input
                                        type="text"
                                        name="coupon_code"
                                        class="input-text"
                                        placeholder="Adicionar cupons">

                                    <button
                                        type="submit"
                                        class="button"
                                        name="apply_coupon">

                                        Aplicar

                                    </button>

                                </div>

                            <?php endif; ?>

                            <button
                                type="submit"
                                class="button"
                                name="update_cart">

                                Atualizar carrinho

                            </button>

                            <?php
                            wp_nonce_field(
                                'woocommerce-cart',
                                'woocommerce-cart-nonce'
                            );
                            ?>

                        </td>

                    </tr>

                </tbody>

            </table>

        </form>

    </div>

    <!-- RIGHT -->
    <div class="premium-cart-right">

        <?php
        do_action(
            'woocommerce_cart_collaterals'
        );
        ?>

    </div>

</div>

<?php do_action('woocommerce_after_cart'); ?>