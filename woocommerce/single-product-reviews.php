<?php
defined('ABSPATH') || exit;

global $product;

if (!comments_open()) {
    return;
}
?>

<div id="reviews" class="custom-reviews-wrapper">

    <!-- HEADER -->
    <div class="reviews-header mb-5">

        <h2 class="reviews-title">
            Avaliações dos clientes
        </h2>

        <div class="reviews-summary">

            <div class="reviews-average">

                <?php echo esc_html($product->get_average_rating()); ?>

            </div>

            <div class="reviews-stars">

                <?php echo wc_get_rating_html($product->get_average_rating()); ?>

            </div>

            <div class="reviews-count">

                <?php
                echo esc_html($product->get_review_count());
                ?> avaliações

            </div>

        </div>

    </div>

    <!-- LISTA -->
    <?php if (have_comments()) : ?>

        <div class="reviews-list">

            <?php
            wp_list_comments(
                apply_filters(
                    'woocommerce_product_review_list_args',
                    [
                        'callback' => 'woocommerce_comments'
                    ]
                )
            );
            ?>

        </div>

    <?php else : ?>

        <div class="no-reviews">
            Ainda não existem avaliações.
        </div>

    <?php endif; ?>

    <!-- FORM -->
    <?php if (get_option('woocommerce_enable_review_rating') === 'yes') : ?>

        <div class="review-form-wrapper mt-5">

            <?php
            $commenter = wp_get_current_commenter();

            $comment_form = [
                'title_reply' => 'Deixe sua avaliação',

                'title_reply_before' =>
                    '<h3 class="review-form-title">',

                'title_reply_after' =>
                    '</h3>',

                'comment_notes_before' => '',

                'comment_notes_after' => '',

                'label_submit' => 'Enviar avaliação',

                'logged_in_as' => '',

                'comment_field' => '
                    <div class="form-group mb-4">

                        <label class="mb-2">
                            Sua avaliação
                        </label>

                        <textarea
                            id="comment"
                            name="comment"
                            class="form-control"
                            rows="5"
                            required></textarea>

                    </div>
                ',
            ];

            comment_form(
                apply_filters(
                    'woocommerce_product_review_comment_form_args',
                    $comment_form
                )
            );
            ?>

        </div>

    <?php endif; ?>

</div>