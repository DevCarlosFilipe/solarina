<?php get_header(); ?>

<main>

    <?php get_template_part('template/sections/hero'); ?>
    <?php get_template_part('template/sections/featured', 'products'); ?>
    <?php get_template_part('template/sections/info', 'section'); ?>
    <?php get_template_part('template/sections/categories'); ?>
    <?php get_template_part('template/sections/follow'); ?>

</main>

<?php get_footer(); ?>