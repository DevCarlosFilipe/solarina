<!-- MENU -->
<nav>

    <?php
    $categories = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => true,
    ]);

    $current_category_id = (function_exists('is_product_category') && is_product_category()) ? get_queried_object_id() : 0;
    $is_shop = (function_exists('is_shop') && is_shop());

    if (!empty($categories) && !is_wp_error($categories)) :
    ?>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link<?php echo $is_shop ? ' active' : ''; ?>" href="<?php echo get_permalink(wc_get_page_id('shop')); ?>">
                    Todos 
                </a>
            </li>

            <?php foreach ($categories as $category) :
                $is_current = $current_category_id === $category->term_id;
            ?>
                <li class="nav-item">
                    <a class="nav-link<?php echo $is_current ? ' active' : ''; ?>" href="<?php echo get_term_link($category); ?>">
                        <?php echo esc_html($category->name); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

    <?php endif; ?>
</nav>