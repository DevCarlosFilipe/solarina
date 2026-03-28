<header class="py-3 border-bottom bg-transparent position-fixed w-100 top-0" id="main-header" style="z-index: 1030; transition: all 0.3s ease;">
    <div class="container d-flex justify-content-between align-items-center">

        <!-- LOGO -->
        <div class="logo">
            <a href="<?php echo home_url(); ?>" class="text-decoration-none text-white fw-bold">
                Solarina
            </a>
        </div>

        <!-- MENU -->
        <nav>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Coleção</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Contato</a>
                </li>
            </ul>
        </nav>

        <!-- ÍCONES -->
        <div class="d-flex gap-3">
            <?php if (class_exists('WooCommerce')) : ?>

                <a href="<?php echo esc_url(wc_get_cart_url()); ?>">
                    <i class="bi bi-cart3"></i>

                    <span class="cart-count">
                        <?php echo WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?>
                    </span>
                </a>

            <?php endif; ?>
            <i class="bi bi-search text-white"></i>
        </div>

    </div>
</header>