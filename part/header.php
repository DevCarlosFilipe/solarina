<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="py-3 border-bottom bg-white">
    <div class="container d-flex justify-content-between align-items-center">

        <!-- LOGO -->
        <div class="logo">
            <a href="<?php echo home_url(); ?>" class="text-decoration-none text-dark fw-bold">
                Solarina
            </a>
        </div>

        <!-- MENU -->
        <nav>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Coleção</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Contato</a>
                </li>
            </ul>
        </nav>

        <!-- ÍCONES -->
        <div class="d-flex gap-3">
            <i class="bi bi-search"></i>
            <i class="bi bi-bag"></i>
        </div>

    </div>
</header>