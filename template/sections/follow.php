<?php

/**
 * Seção: Instagram / Follow
 */
$show_instagram = false;

// Verifica se plugin existe
if (class_exists('SB_Instagram_Feed')) {

    // Verifica se tem configurações salvas
    $settings = get_option('sb_instagram_settings');

    if (!empty($settings) && !empty($settings['access_token'])) {
        $show_instagram = true;
    }
    $instagram = get_theme_mod('solarina_instagram');
    $link = $instagram ? 'https://instagram.com/' . ltrim($instagram, '@') : '#';
}
?>

<?php if ($show_instagram) : ?>
    <section class="instagram-section">
        <div class="container text-center">

            <div class="text-center mb-5">
                <h2 class="session-title">Siga no Instagram</h2>
                <p class="instagram-subtitle">
                    Siga <?php echo $instagram ? '@' . ltrim($instagram, '@') : 'nosso perfil'; ?> para novidades e bastidores
                </p>
            </div>

            <?php echo do_shortcode('[instagram-feed num=8 cols=4 showheader=false showfollow=false]'); ?>

            <?php
            $instagram = get_theme_mod('solarina_instagram');
            $link = $instagram ? 'https://instagram.com/' . ltrim($instagram, '@') : '#';
            ?>

            <a href="<?php echo esc_url($link); ?>" target="_blank" class="btn btn-md btn-primary mt-4">
                Seguir
            </a>

        </div>
    </section>
<?php endif; ?>