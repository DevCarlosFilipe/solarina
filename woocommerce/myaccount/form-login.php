<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.9.0
 */
defined('ABSPATH') || exit;
$show_registration = 'yes' === get_option('woocommerce_enable_myaccount_registration');
$registration_generate_username = 'yes' === get_option('woocommerce_registration_generate_username');
$registration_generate_password = 'yes' === get_option('woocommerce_registration_generate_password');
?>
<section class="login-register-grid">
    <div class="container">
        <div class="auth-page-header">
            <h1 class="section-title"><?php esc_html_e('Minha Conta', 'solarina'); ?></h1>
            <p class="section-subtitle"><?php esc_html_e('Entre ou crie sua conta para acessar o painel, pedidos e histórico.', 'solarina'); ?></p>
        </div>

        <div class="auth-grid">
            <article class="auth-card auth-login">
                <h2><?php esc_html_e('Entrar', 'solarina'); ?></h2>
                <?php do_action('woocommerce_login_form_start'); ?>
                <form class="woocommerce-form woocommerce-form-login login" method="post">
                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="username"><?php esc_html_e('E-mail ou usuário', 'woocommerce'); ?> <span class="required">*</span></label>
                        <input type="text" class="woocommerce-Input input-text" name="username" id="username" autocomplete="username" value="<?php echo esc_attr(wp_unslash($_POST['username'] ?? '')); ?>" />
                    </p>

                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide password-wrapper">
                        <label for="password"><?php esc_html_e('Senha', 'woocommerce'); ?> <span class="required">*</span></label>
                        <input class="input-text" type="password" name="password" id="password" autocomplete="current-password" />
                        <button type="button" class="password-toggle" data-show="<?php esc_attr_e('Mostrar senha', 'solarina'); ?>" data-hide="<?php esc_attr_e('Ocultar senha', 'solarina'); ?>" aria-label="<?php esc_attr_e('Mostrar senha', 'solarina'); ?>">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </p>

                    <?php do_action('woocommerce_login_form'); ?>

                    <p class="form-row form-row-wide">
                        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                            <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" />
                            <span><?php esc_html_e('Lembrar-me', 'woocommerce'); ?></span>
                        </label>
                    </p>

                    <p class="form-row">
                        <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
                        <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e('Login', 'woocommerce'); ?>">
                            <?php esc_html_e('Entrar', 'woocommerce'); ?>
                        </button>
                    </p>

                    <p class="woocommerce-LostPassword lost_password">
                        <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Esqueci minha senha?', 'woocommerce'); ?></a>
                    </p>
                </form>
                <?php do_action('woocommerce_login_form_end'); ?>
            </article>

            <?php if ($show_registration) : ?>
                <article class="auth-card auth-register">
                    <h2><?php esc_html_e('Criar conta', 'solarina'); ?></h2>
                    <?php do_action('woocommerce_register_form_start'); ?>
                    <form method="post" class="woocommerce-form woocommerce-form-register register">
                        <?php if (! $registration_generate_username) : ?>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="reg_username"><?php esc_html_e('Nome de usuário', 'woocommerce'); ?> <span class="required">*</span></label>
                                <input type="text" class="woocommerce-Input input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo esc_attr(wp_unslash($_POST['username'] ?? '')); ?>" />
                            </p>
                        <?php endif; ?>

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="reg_email"><?php esc_html_e('E-mail', 'woocommerce'); ?> <span class="required">*</span></label>
                            <input type="email" class="woocommerce-Input input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo esc_attr(wp_unslash($_POST['email'] ?? '')); ?>" />
                        </p>

                        <?php if (! $registration_generate_password) : ?>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide password-wrapper">
                                <label for="reg_password"><?php esc_html_e('Senha', 'woocommerce'); ?> <span class="required">*</span></label>
                                <input type="password" class="woocommerce-Input input-text" name="password" id="reg_password" autocomplete="new-password" />
                                <button type="button" class="password-toggle" data-show="<?php esc_attr_e('Mostrar senha', 'solarina'); ?>" data-hide="<?php esc_attr_e('Ocultar senha', 'solarina'); ?>" aria-label="<?php esc_attr_e('Mostrar senha', 'solarina'); ?>">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </p>
                        <?php else : ?>
                            <p class="woocommerce-form-row form-row">
                                <?php esc_html_e('Uma senha será enviada para seu e-mail.', 'woocommerce'); ?>
                            </p>
                        <?php endif; ?>

                        <?php do_action('woocommerce_register_form'); ?>

                        <p class="form-row">
                            <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
                            <button type="submit" class="woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>">
                                <?php esc_html_e('Criar conta', 'woocommerce'); ?>
                            </button>
                        </p>
                    </form>
                    <?php do_action('woocommerce_register_form_end'); ?>
                </article>
            <?php endif; ?>
        </div>
    </div>
</section>