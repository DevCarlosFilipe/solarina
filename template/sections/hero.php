<section class="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <!-- Indicators (bolinhas) -->
        <div class="carousel-indicators">
            <?php for ($i = 0; $i < 3; $i++) : ?>
                <button type="button"
                        data-bs-target="#heroCarousel"
                        data-bs-slide-to="<?php echo $i; ?>"
                        class="<?php echo $i === 0 ? 'active' : ''; ?>">
                </button>
            <?php endfor; ?>
        </div>

        <!-- Slides -->
        <div class="carousel-inner">

            <?php for ($i = 1; $i <= 3; $i++) : 
                $image = get_theme_mod("hero_{$i}_image");
                $title = get_theme_mod("hero_{$i}_title", "Título do Slide");
                $text  = get_theme_mod("hero_{$i}_text", "Descrição do slide");
                $link  = get_theme_mod("hero_{$i}_link", "#");
            ?>

            <div class="carousel-item <?php echo $i === 1 ? 'active' : ''; ?>" 
                 style="height: 80vh; background: url('<?php echo $image; ?>') center/cover no-repeat;">

                <div class="overlay d-flex align-items-center">
                    <div class="container">
                        <div class="col-md-6 text-white">

                            <h1><?php echo esc_html($title); ?></h1>
                            <p><?php echo esc_html($text); ?></p>

                            <a href="<?php echo esc_url($link); ?>" class="btn btn-light">
                                Ver coleção
                            </a>

                        </div>
                    </div>
                </div>

            </div>

            <?php endfor; ?>

        </div>

    </div>
</section>