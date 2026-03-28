<?php get_header(); ?>

<section class="error-404 d-flex align-items-center text-center" style="height: 80vh;">
    <div class="container">

        <h1 class="display-1">404</h1>

        <h2>Página não encontrada</h2>

        <p>Ops... parece que você se perdeu no caminho.</p>

        <a href="<?php echo home_url(); ?>" class="btn btn-dark mt-3">
            Voltar para o início
        </a>

    </div>
</section>

<?php get_footer(); ?>