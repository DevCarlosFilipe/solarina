<div class="font-icon-menu d-flex gap-3 align-items-center">

    <button class="desktop-search-btn" id="desktopSearchToggle">
        <i class="fa-solid fa-magnifying-glass"></i>
    </button>

    <?php if (is_user_logged_in()) : ?>
        <a href="<?php echo wc_get_cart_url(); ?>" class="cart-icon position-relative">
            <i class="fa-solid fa-cart-shopping"></i>

            <span class="cart-count">
                <?php echo WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?>
            </span>
        </a>

        <div class="mobile-avatar">
            <a href="<?php echo wc_get_page_permalink('myaccount'); ?>">
                <?php echo get_avatar(get_current_user_id(), 32); ?>
            </a>
        </div>
    <?php else : ?>

        <a href="<?php echo wc_get_page_permalink('myaccount'); ?>" class="btn-account">
            Minha Conta
        </a>

    <?php endif; ?>

</div>