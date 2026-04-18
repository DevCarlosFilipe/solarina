<header class="py-3 border-bottom bg-transparent position-fixed w-100 top-0" id="main-header" style="z-index: 1030; transition: all 0.3s ease;">
    <div class="main-menu container d-flex justify-content-between align-items-center site-header">

        <?php get_template_part('template/header/logo'); ?>

        <?php get_template_part('template/header/desktop-search'); ?>

        <?php get_template_part('template/header/menu-categories'); ?>

        <?php get_template_part('template/header/header-icons'); ?>

    </div>

    <?php get_template_part('template/header/mobile-header'); ?>

</header>

<?php if ( ! is_front_page() && ! is_home() && !( function_exists( 'is_shop' ) && is_shop() ) && !( function_exists( 'is_product_category' ) && is_product_category() ) ) : ?>
    <div class="page-top-backdrop"></div>
<?php endif; ?>