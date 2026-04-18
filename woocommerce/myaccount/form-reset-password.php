<?php
/**
 * Reset Password Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-reset-password.php.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.2.0
 */
defined('ABSPATH') || exit;
$key = isset($_GET['key']) ? sanitize_text_field(wp_unslash($_GET['key'])) : '';
$login = isset($_GET['login']) ? sanitize_text_field(wp_unslash($_GET['login'])) : '';
$myaccount_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : wp_login_url();
?>
<section class="login-register-grid">
    <div class="container">
        <div class="auth-page-header">
            <h1 class="section-title"><?php esc_html_e('Redefinir senha', 'solarina'); ?></h1>
            <p class="section-subtitle"><?php esc_html_e('Escolha uma nova senha segura para sua conta.', 'solarina'); ?></p>
        </div>

        <div class="auth-grid">
            <article class="auth-card auth-register auth-reset-password">
                <h2><?php esc_html_e('Nova senha', 'solarina'); ?></h2>
                <form method="post" class="woocommerce-form woocommerce-form-reset-password reset_password">
                    <input type="hidden" name="reset_key" value="<?php echo esc_attr($key); ?>" />
                    <input type="hidden" name="reset_login" value="<?php echo esc_attr($login); ?>" />

                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="password_1"><?php esc_html_e('Nova senha', 'woocommerce'); ?> <span class="required">*</span></label>
                        <input class="woocommerce-Input input-text" type="password" name="password_1" id="password_1" autocomplete="new-password" />
                    </p>

                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="password_2"><?php esc_html_e('Repetir nova senha', 'woocommerce'); ?> <span class="required">*</span></label>
                        <input class="woocommerce-Input input-text" type="password" name="password_2" id="password_2" autocomplete="new-password" />
                    </p>

                    <?php do_action('woocommerce_resetpassword_form'); ?>

                    <p class="form-row">
                        <?php wp_nonce_field('reset_password', 'woocommerce-reset-password-nonce'); ?>
                        <button type="submit" class="woocommerce-button button" name="wc_reset_password" value="<?php esc_attr_e('Salvar', 'woocommerce'); ?>">
                            <?php esc_html_e('Redefinir senha', 'woocommerce'); ?>
                        </button>
                    </p>

                    <p class="woocommerce-LostPassword lost_password">
                        <a href="<?php echo esc_url($myaccount_url); ?>">
                            <?php esc_html_e('Voltar para login', 'solarina'); ?>
                        </a>
                    </p>
                </form>
            </article>
        </div>
    </div>
</section>
