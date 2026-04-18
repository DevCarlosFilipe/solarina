<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */
defined('ABSPATH') || exit;
?>
<nav class="account-navigation">
    <ul class="woocommerce-MyAccount-navigation">
        <?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
            <li class="<?php echo wc_get_account_menu_item_classes($endpoint); ?>">
                <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>">
                    <?php echo esc_html($label); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
