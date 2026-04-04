<!-- MENU -->
<nav>

    <?php
    $categories = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => true,
    ]);

    if (!empty($categories) && !is_wp_error($categories)) :
    ?>
        <ul class="nav">
            <?php foreach ($categories as $category) : ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo get_term_link($category); ?>">
                        <?php echo esc_html($category->name); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

    <?php endif; ?>
</nav>