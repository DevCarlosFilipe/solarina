<?php
defined('ABSPATH') || exit;
$myaccount_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : wp_login_url();
?>
<section class="login-register-grid">
    <div class="container">
        <div class="auth-page-header">
            <h1 class="section-title"><?php esc_html_e('Recuperar senha', 'solarina'); ?></h1>
            <p class="section-subtitle"><?php esc_html_e('Digite seu e-mail para receber o link de redefinição de senha.', 'solarina'); ?></p>
        </div>

        <div class="auth-grid">
            <article class="auth-card auth-register auth-reset-password">
                <h2><?php esc_html_e('Recuperar senha', 'solarina'); ?></h2>
                <form method="post" class="woocommerce-form woocommerce-form-lost-password lost_reset_password">
                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="user_login"><?php esc_html_e('E-mail', 'woocommerce'); ?> <span class="required">*</span></label>
                        <input class="woocommerce-Input input-text" type="email" name="user_login" id="user_login" autocomplete="email" value="<?php echo esc_attr(wp_unslash($_POST['user_login'] ?? '')); ?>" />
                    </p>

                    <?php do_action('woocommerce_lostpassword_form'); ?>

                    <p class="form-row">
                        <?php wp_nonce_field('lost_password', 'woocommerce-lost-password-nonce'); ?>
                        <button type="submit" class="woocommerce-button button" name="wc_reset_password" value="<?php esc_attr_e('Reset password', 'woocommerce'); ?>">
                            <?php esc_html_e('Enviar link', 'woocommerce'); ?>
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
