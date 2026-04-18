<?php

/**
 * Seção: Instagram / Follow
 */
$show_instagram = false;

// Exibe a seção se o shortcode existir ou se o plugin estiver ativo.
if (shortcode_exists('instagram-feed') || class_exists('SB_Instagram_Feed')) {
    $show_instagram = true;
}

$instagram = get_theme_mod('solarina_instagram');
$link = $instagram ? 'https://instagram.com/' . ltrim($instagram, '@') : '#';
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

        </div>
    </section>
<?php endif; ?>