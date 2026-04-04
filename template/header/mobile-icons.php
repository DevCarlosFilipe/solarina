<div class="mobile-actions">

<button class="mobile-search-btn" id="searchToggle">
    <i class="fa-solid fa-magnifying-glass"></i>
</button>


<?php if (is_user_logged_in()) : ?>

    <!-- Carrinho -->
    <div class="mobile-cart">
        <a href="<?php echo wc_get_cart_url(); ?>" class="cart-link">
            <i class="fa-solid fa-cart-shopping"></i>
            <span class="cart-count">
                <?php echo WC()->cart->get_cart_contents_count(); ?>
            </span>
        </a>
    </div>

    <!-- Avatar -->
    <div class="mobile-avatar">
        <?php echo get_avatar(get_current_user_id(), 32); ?>
    </div>

<?php else : ?>

    <!-- Login -->
    <a href="<?php echo wc_get_page_permalink('myaccount'); ?>" class="btn-login">
        Entrar
    </a>

    <!-- Cadastro -->
    <a href="<?php echo wc_get_page_permalink('myaccount'); ?>" class="btn-register">
        Cadastrar
    </a>

<?php endif; ?>

</div>