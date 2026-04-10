<?php
defined('ABSPATH') || exit;
$current_user = wp_get_current_user();
?>
<div class="account-dashboard">
    <div class="dashboard-header">
        <h2><?php esc_html_e('Bem-vindo de volta,', 'solarina'); ?> <span><?php echo esc_html($current_user->display_name ?: $current_user->user_login); ?></span></h2>
        <p><?php esc_html_e('Use os atalhos abaixo para gerenciar seus pedidos, detalhes de conta e endereços.', 'solarina'); ?></p>
    </div>

    <div class="dashboard-cards">
        <a href="<?php echo esc_url(wc_get_endpoint_url('orders')); ?>" class="dashboard-card">
            <h3><?php esc_html_e('Pedidos', 'solarina'); ?></h3>
            <p><?php esc_html_e('Acompanhe suas compras e veja o status em tempo real.', 'solarina'); ?></p>
        </a>

        <a href="<?php echo esc_url(wc_get_endpoint_url('downloads')); ?>" class="dashboard-card">
            <h3><?php esc_html_e('Downloads', 'solarina'); ?></h3>
            <p><?php esc_html_e('Acesse seus produtos digitais disponíveis para download.', 'solarina'); ?></p>
        </a>

        <a href="<?php echo esc_url(wc_get_endpoint_url('edit-address')); ?>" class="dashboard-card">
            <h3><?php esc_html_e('Endereços', 'solarina'); ?></h3>
            <p><?php esc_html_e('Atualize seus endereços de entrega e cobrança.', 'solarina'); ?></p>
        </a>

        <a href="<?php echo esc_url(wc_get_endpoint_url('edit-account')); ?>" class="dashboard-card">
            <h3><?php esc_html_e('Dados da conta', 'solarina'); ?></h3>
            <p><?php esc_html_e('Altere seu e-mail, senha e informações pessoais.', 'solarina'); ?></p>
        </a>
    </div>

    <?php do_action('woocommerce_account_dashboard'); ?>
</div>
