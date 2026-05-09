<?php
defined('ABSPATH') || exit;

$product_tabs = apply_filters('woocommerce_product_tabs', []);

if (empty($product_tabs)) {
    return;
}
?>

<section class="custom-product-tabs">

    <div class="custom-tabs-header">

        <ul class="nav custom-tabs-nav" id="productTabs" role="tablist">

            <?php
            $first = true;

            foreach ($product_tabs as $key => $product_tab) :
            ?>

                <li class="nav-item" role="presentation">

                    <button
                        class="nav-link <?php echo $first ? 'active' : ''; ?>"
                        id="<?php echo esc_attr($key); ?>-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#<?php echo esc_attr($key); ?>"
                        type="button"
                        role="tab">

                        <?php echo wp_kses_post($product_tab['title']); ?>

                    </button>

                </li>

            <?php
                $first = false;
            endforeach;
            ?>

        </ul>

    </div>

    <!-- CONTEÚDO -->
    <div class="tab-content custom-tabs-content" id="productTabsContent">

        <?php
        $first = true;

        foreach ($product_tabs as $key => $product_tab) :
        ?>

            <div
                class="tab-pane fade <?php echo $first ? 'show active' : ''; ?>"
                id="<?php echo esc_attr($key); ?>"
                role="tabpanel"
                aria-labelledby="<?php echo esc_attr($key); ?>-tab">

                <div class="custom-tab-box">

                    <?php
                    if (isset($product_tab['callback'])) {
                        call_user_func(
                            $product_tab['callback'],
                            $key,
                            $product_tab
                        );
                    }
                    ?>

                </div>

            </div>

        <?php
            $first = false;
        endforeach;
        ?>

    </div>

</section>