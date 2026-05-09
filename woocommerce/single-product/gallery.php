<?php
defined('ABSPATH') || exit;

global $product;

$images = [];

$main = $product->get_image_id();
if ($main) {
    $images[] = wp_get_attachment_url($main);
}

foreach ($product->get_gallery_image_ids() as $id) {
    $images[] = wp_get_attachment_url($id);
}
?>

<div class="custom-gallery">

    <!-- CAROUSEL -->
    <div id="productCarousel" class="carousel slide">
        <div class="carousel-inner">

            <?php foreach ($images as $index => $img): ?>
                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                    <div class="zoom-container open-gallery"
                        data-index="<?php echo $index; ?>"
                        data-bs-toggle="modal"
                        data-bs-target="#galleryModal">
                        
                        <img src="<?php echo esc_url($img); ?>" class="main-image">
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>

    <!-- THUMBS -->
    <div class="grid-thumbs">
        <?php foreach ($images as $index => $img): ?>
            <div class="col-thumb">
                <div class="thumb-container <?php echo $index === 0 ? 'active' : ''; ?>"
                    data-bs-target="#productCarousel"
                    data-bs-slide-to="<?php echo $index; ?>">
                    <img src="<?php echo esc_url($img); ?>">
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<!-- MODAL -->
<div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModal" aria-hidden="true">
    <div class="modal-dialog">
        <div id="modalCarousel" class="modal-content carousel slide">
            <div class="position-absolute top-0 end-0 p-3" style="z-index: 1055;">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="carousel-indicators">
                <?php foreach ($images as $index => $img): ?>
                    <button
                        type="button"
                        data-bs-target="#modalCarousel"
                        data-bs-slide-to="<?php echo $index; ?>"
                        class="<?php echo $index === 0 ? 'active' : ''; ?>"
                        aria-current="<?php echo $index === 0 ? 'true' : 'false'; ?>"
                        aria-label="Slide <?php echo $index + 1; ?>"></button>
                <?php endforeach; ?>
            </div>
            <div class="carousel-inner">
                <?php foreach ($images as $index => $img): ?>
                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                        <img src="<?php echo esc_url($img); ?>" class="main-image">
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#modalCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#modalCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>