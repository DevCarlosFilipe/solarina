<?php
defined('ABSPATH') || exit;
get_header();
?>
<section class="page-section">
    <div class="container py-5">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
             
                <div class="page-entry-content">
                    <?php the_content(); ?>
                </div>

                <?php if (comments_open() || get_comments_number()) : ?>
                    <?php comments_template(); ?>
                <?php endif; ?>
            </article>
        <?php endwhile; endif; ?>
    </div>
</section>
<?php get_footer(); ?>
