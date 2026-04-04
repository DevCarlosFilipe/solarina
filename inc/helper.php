<?php

function solarina_get_product_categories() {
    return get_terms([
        'taxonomy' => 'product_cat',
        'hide_empty' => true,
    ]);
}