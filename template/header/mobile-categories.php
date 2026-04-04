<!-- CATEGORIAS -->
<div class="mobile-categories">

    <a href="<?php echo wc_get_page_permalink('shop'); ?>" class="category-item active">
        Todos
    </a>

    <?php
    $categories = get_terms([
        'taxonomy' => 'product_cat',
        'hide_empty' => true,
    ]);

    foreach ($categories as $category) {
        echo '<a class="category-item" href="' . get_term_link($category) . '">' . $category->name . '</a>';
    }
    ?>

</div>