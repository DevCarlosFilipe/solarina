<?php
defined('ABSPATH') || exit;
get_header();
?>

<section class="cart-page-section">
    <div class="container py-5">
        <div class="cart-page-header text-center mb-4">
            <h1 class="section-title"><?php esc_html_e('Carrinho', 'solarina'); ?></h1>
        </div>

        <?php wc_print_notices(); ?>

        <?php do_action('woocommerce_before_cart'); ?>

        <form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
            <?php do_action('woocommerce_before_cart_table'); ?>

            <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">
                <thead>
                    <tr>
                        <th class="product-remove">&nbsp;</th>
                        <th class="product-thumbnail"><?php esc_html_e('Produto', 'solarina'); ?></th>
                        <th class="product-name">&nbsp;</th>
                        <th class="product-price"><?php esc_html_e('Preço', 'solarina'); ?></th>
                        <th class="product-quantity"><?php esc_html_e('Quantidade', 'solarina'); ?></th>
                        <th class="product-subtotal"><?php esc_html_e('Total', 'solarina'); ?></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) :
                        $_product   = $cart_item['data'];
                        $product_id = $cart_item['product_id'];

                        if (! $_product || ! $_product->exists() || $cart_item['quantity'] <= 0) {
                            continue;
                        }

                        $product_permalink = $_product->is_visible() ? $_product->get_permalink($cart_item) : '';
                    ?>

                        <tr class="woocommerce-cart-form__cart-item">
                            <td class="product-remove">
                                <?php
                                echo apply_filters(
                                    'woocommerce_cart_item_remove_link',
                                    sprintf(
                                        '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">%s</a>',
                                        esc_url(wc_get_cart_remove_url($cart_item_key)),
                                        esc_html__('Remover produto', 'solarina'),
                                        esc_attr($product_id),
                                        esc_attr($_product->get_sku()),
                                        '&times;'
                                    ),
                                    $cart_item_key
                                );
                                ?>
                            </td>

                            <td class="product-thumbnail">
                                <?php
                                $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

                                if (! $product_permalink) {
                                    echo $thumbnail;
                                } else {
                                    printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail);
                                }
                                ?>
                            </td>

                            <td class="product-name" data-title="<?php esc_attr_e('Produto', 'solarina'); ?>">
                                <?php
                                if (! $product_permalink) {
                                    echo wp_kses_post($_product->get_name());
                                } else {
                                    echo wp_kses_post(sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()));
                                }

                                do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

                                echo wc_get_formatted_cart_item_data($cart_item);
                                ?>
                            </td>

                            <td class="product-price" data-title="<?php esc_attr_e('Preço', 'solarina'); ?>">
                                <?php echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); ?>
                            </td>

                            <td class="product-quantity" data-title="<?php esc_attr_e('Quantidade', 'solarina'); ?>">
                                <?php
                                if ($_product->is_sold_individually()) {
                                    echo esc_html('1');
                                } else {
                                    echo woocommerce_quantity_input(
                                        array(
                                            'input_name'   => "cart[{$cart_item_key}][qty]",
                                            'input_value'  => $cart_item['quantity'],
                                            'max_value'    => $_product->get_max_purchase_quantity(),
                                            'min_value'    => '0',
                                            'product_name' => $_product->get_name(),
                                        ),
                                        $_product,
                                        false
                                    );
                                }
                                ?>
                            </td>

                            <td class="product-subtotal" data-title="<?php esc_attr_e('Total', 'solarina'); ?>">
                                <?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <tr>
                        <td colspan="6" class="actions">
                            <?php if (wc_coupons_enabled()) : ?>
                                <div class="coupon">
                                    <label for="coupon_code"><?php esc_html_e('Cupom', 'solarina'); ?>:</label>
                                    <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e('Código do cupom', 'solarina'); ?>" />
                                    <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e('Aplicar cupom', 'solarina'); ?>"><?php esc_html_e('Aplicar', 'solarina'); ?></button>
                                    <?php do_action('woocommerce_cart_coupon'); ?>
                                </div>
                            <?php endif; ?>

                            <button type="submit" class="woocommerce-button button" name="update_cart" value="<?php esc_attr_e('Atualizar carrinho', 'solarina'); ?>"><?php esc_html_e('Atualizar carrinho', 'solarina'); ?></button>

                            <?php do_action('woocommerce_cart_actions'); ?>
                            <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
                        </td>
                    </tr>
                </tbody>
            </table>

            <?php do_action('woocommerce_after_cart_table'); ?>
        </form>

        <div class="cart-collaterals">
            <?php do_action('woocommerce_cart_collaterals'); ?>
        </div>

        <?php do_action('woocommerce_after_cart'); ?>
    </div>
</section>

<?php get_footer(); ?>
