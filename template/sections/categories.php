<section class="categorias">
  <div class="categorias-grid">

    <?php
    $args = array(
        'taxonomy'   => 'product_cat',
        'hide_empty' => true,
    );

    $categorias = get_terms($args);

    foreach ($categorias as $categoria) {

        $thumbnail_id = get_term_meta($categoria->term_id, 'thumbnail_id', true);
        $imagem = wp_get_attachment_url($thumbnail_id);
        $link = get_term_link($categoria);
    ?>

      <a href="<?php echo esc_url($link); ?>" class="categoria-card">
        <img src="<?php echo esc_url($imagem); ?>" alt="<?php echo esc_attr($categoria->name); ?>">
        <span><?php echo esc_html($categoria->name); ?></span>
      </a>

    <?php } ?>

  </div>
</section>