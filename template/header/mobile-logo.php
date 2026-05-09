<?php
$custom_logo_id = get_theme_mod('custom_logo');
?>

<div class="logo">
    <a href="<?php echo esc_url(home_url('/')); ?>">
        <?php
        if ($custom_logo_id) {
            echo wp_get_attachment_image($custom_logo_id, 'full', false, ['class' => 'custom-logo custom-logo--default']);
        } else {
            bloginfo('name');
        }
        ?>
    </a>
</div>
