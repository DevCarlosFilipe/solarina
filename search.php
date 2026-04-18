<?php get_header(); ?>

<section class="search-results">
    <div class="container">

        <h1 class="section-title">
            Resultados para: "<?php echo get_search_query(); ?>"
        </h1>

        <div class="products-grid">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <div class="product-card">
                        <a href="<?php the_permalink(); ?>">

                            <?php if (has_post_thumbnail()) : ?>
                                <div class="product-image">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                            <?php endif; ?>

                            <h2><?php the_title(); ?></h2>

                        </a>
                    </div>

                <?php endwhile;
            else : ?>

                <p>Nenhum resultado encontrado.</p>

            <?php endif; ?>

        </div>

    </div>
</section>

<?php get_footer(); ?>