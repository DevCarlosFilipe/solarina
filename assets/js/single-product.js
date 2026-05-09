// THUMB ATIVA
const thumbContainers = document.querySelectorAll('.thumb-container');
if (thumbContainers.length) {
    thumbContainers.forEach((thumb) => {
        thumb.addEventListener('click', () => {
            thumbContainers.forEach((t) => t.classList.remove('active'));
            thumb.classList.add('active');
        });
    });
}

// ZOOM
const zoomContainers = document.querySelectorAll('.zoom-container');
if (zoomContainers.length) {
    zoomContainers.forEach((container) => {
        const img = container.querySelector('img');
        if (!img) {
            return;
        }

        container.addEventListener('mousemove', (e) => {
            const rect = container.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width * 100;
            const y = (e.clientY - rect.top) / rect.height * 100;

            img.style.transformOrigin = `${x}% ${y}%`;
            img.style.transform = 'scale(2)';
        });

        container.addEventListener('mouseleave', () => {
            img.style.transform = 'scale(1)';
            img.style.transformOrigin = 'center';
        });
    });
}

const galleryModal = document.getElementById('galleryModal');

galleryModal.addEventListener('shown.bs.modal', function () {
    const carouselElement = document.querySelector('#modalCarousel');

    // Reinicializa o carousel
    bootstrap.Carousel.getOrCreateInstance(carouselElement, {
        touch: true,
        ride: false,
        interval: false,
    });
});

galleryModal.addEventListener('show.bs.modal', function (event) {

    // Elemento clicado
    const trigger = event.relatedTarget;

    // Índice da imagem
    const index = parseInt(trigger.dataset.index);

    // Carousel do modal
    const modalCarouselEl = document.getElementById('modalCarousel');

    // Instância bootstrap
    const modalCarousel = bootstrap.Carousel.getOrCreateInstance(
        modalCarouselEl,
        {
            touch: true,
            interval: false
        }
    );

    // Vai pro slide correto
    modalCarousel.to(index);

});