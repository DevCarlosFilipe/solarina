<?php
$custom_logo_id = get_theme_mod('custom_logo');
$white_logo_value = get_theme_mod('solarina_white_logo');
$white_logo_id = is_numeric($white_logo_value) ? absint($white_logo_value) : 0;
$white_logo_url = $white_logo_id ? '' : esc_url($white_logo_value);
$has_alt_logo = ($white_logo_id || $white_logo_url) && $custom_logo_id;
?>

<div class="logo<?php echo $has_alt_logo ? ' has-alt-logo' : ''; ?>">
    <a href="<?php echo esc_url(home_url('/')); ?>">
        <?php
        if ($custom_logo_id && ($white_logo_id || $white_logo_url)) {
            if ($white_logo_id) {
                echo wp_get_attachment_image($white_logo_id, 'full', false, ['class' => 'custom-logo custom-logo--white']);
            } elseif ($white_logo_url) {
                echo '<img src="' . esc_url($white_logo_url) . '" class="custom-logo custom-logo--white" alt="' . esc_attr(get_bloginfo('name')) . '">';
            }

            echo wp_get_attachment_image($custom_logo_id, 'full', false, ['class' => 'custom-logo custom-logo--default']);
        } elseif ($custom_logo_id) {
            echo wp_get_attachment_image($custom_logo_id, 'full', false, ['class' => 'custom-logo custom-logo--default']);
        } elseif ($white_logo_id) {
            echo wp_get_attachment_image($white_logo_id, 'full', false, ['class' => 'custom-logo custom-logo--default']);
        } elseif ($white_logo_url) {
            echo '<img src="' . esc_url($white_logo_url) . '" class="custom-logo custom-logo--default" alt="' . esc_attr(get_bloginfo('name')) . '">';
        } else {
            bloginfo('name');
        }
        ?>
    </a>
</div>