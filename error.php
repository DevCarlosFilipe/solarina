<?php get_header(); ?>

<section class="system-error d-flex align-items-center text-center" style="height: 80vh;">
    <div class="container">

        <?php if (current_user_can('administrator')) : ?>

            <h1>Erro no sistema ⚠️</h1>

            <p>Algo deu errado no código.</p>

            <pre style="text-align:left; background:#000; color:#0f0; padding:20px;">
                <?php echo esc_html(get_transient('solarina_last_error')); ?>
            </pre>

            <p>Entre em contato com o desenvolvedor.</p>

        <?php else : ?>

            <h1>Ops! 😢</h1>

            <p>Estamos passando por uma instabilidade no sistema.</p>
            <p>Por favor, tente novamente mais tarde.</p>

            <a href="<?php echo home_url(); ?>" class="btn btn-dark mt-3">
                Voltar ao início
            </a>

        <?php endif; ?>

    </div>
</section>

<?php get_footer(); ?>