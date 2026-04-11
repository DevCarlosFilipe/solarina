<!-- CATEGORIAS -->
<div class="mobile-categories">

    <?php
    $categories = get_terms([
        'taxonomy' => 'product_cat',
        'hide_empty' => true,
    ]);
    
    $current_category_id = (function_exists('is_product_category') && is_product_category()) ? get_queried_object_id() : 0;
    $is_shop = (function_exists('is_shop') && is_shop());

    ?>
    <a href="<?php echo wc_get_page_permalink('shop'); ?>" class="category-item<?php echo $is_shop ? ' active' : ''; ?>" href="<?php echo get_permalink(wc_get_page_id('shop')); ?>">
        Todos
    </a>

    <?php 

    foreach ($categories as $category) {

        $is_category = $current_category_id === $category->term_id;

        $actived = "";
        if ($is_category) {
            $actived = " active";
        }
        echo '<a class="category-item' . $actived . '" href="' . get_term_link($category) . '">' . $category->name . '</a>';
    }
    ?>

</div>