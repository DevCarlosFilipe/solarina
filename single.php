<?php
defined('ABSPATH') || exit;
get_header();
?>
<section class="post-single-section">
    <div class="container py-5">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('post-single'); ?>>
                <header class="post-single-header">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-single-thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="post-single-intro">
                        <p class="post-single-meta">
                            <?php echo get_the_date(); ?> &bull; <?php esc_html_e('Por', 'solarina'); ?> <?php the_author(); ?>
                        </p>
                        <h1 class="post-single-title"><?php the_title(); ?></h1>

                        <?php if (has_excerpt()) : ?>
                            <p class="post-single-excerpt"><?php the_excerpt(); ?></p>
                        <?php endif; ?>
                    </div>
                </header>

                <div class="post-single-content">
                    <?php the_content(); ?>
                </div>

                <footer class="post-single-footer">
                    <?php
                    wp_link_pages(
                        array(
                            'before' => '<nav class="page-links"><span>' . esc_html__('Páginas:', 'solarina') . '</span>',
                            'after' => '</nav>',
                        )
                    );
                    ?>
                    <?php edit_post_link(esc_html__('Editar postagem', 'solarina'), '<p class="post-edit-link">', '</p>'); ?>
                </footer>

                <?php if (comments_open() || get_comments_number()) : ?>
                    <?php comments_template(); ?>
                <?php endif; ?>
            </article>
        <?php endwhile; else : ?>
            <div class="container py-5 text-center">
                <h2><?php esc_html_e('Nenhum conteúdo encontrado.', 'solarina'); ?></h2>
                <p><?php esc_html_e('Volte mais tarde ou verifique se o post foi publicado corretamente.', 'solarina'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>
