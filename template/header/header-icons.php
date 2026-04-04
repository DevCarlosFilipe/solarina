<div class="font-icon-menu d-flex gap-3 align-items-center">

    <button class="desktop-search-btn text-white" id="desktopSearchToggle">
        <i class="fa-solid fa-magnifying-glass"></i>
    </button>

    <?php if (is_user_logged_in()) : ?>

        <a href="<?php echo wc_get_cart_url(); ?>" class="cart-icon position-relative">
            <i class="fa-solid fa-cart-shopping text-white"></i>

            <span class="cart-count">
                <?php echo WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?>
            </span>
        </a>

    <?php else : ?>

        <a href="<?php echo wc_get_page_permalink('myaccount'); ?>" class="btn-login text-white">
            Entrar
        </a>

        <a href="<?php echo wc_get_page_permalink('myaccount'); ?>" class="btn-register text-white">
            Cadastrar
        </a>

    <?php endif; ?>

</div>