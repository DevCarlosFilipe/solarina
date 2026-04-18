<?php
/**
 * My Account Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */
defined('ABSPATH') || exit;
?>

<section class="account-section">
    <div class="container">
        <h1 class="section-title">Minha Conta</h1>

        <div class="account-grid">
            <div class="account-sidebar">
                <?php do_action('woocommerce_account_navigation'); ?>
            </div>

            <div class="account-main">
                <?php
                /**
                 * My Account content.
                 *
                 * @since 2.6.0
                 */
                do_action('woocommerce_account_content');
                ?>
            </div>
        </div>
    </div>
</section>