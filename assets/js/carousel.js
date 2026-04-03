document.addEventListener("DOMContentLoaded", function () {

    const carousel = document.querySelector(".featured-carousel");

    if (!carousel) return;

    const items = carousel.querySelectorAll(".carousel-item");
    const totalItems = items.length;

    // Não rotacionar se tiver 3 ou menos produtos
    if (totalItems <= 3) return;

    // Intervalo de rotação (em ms)
    const ROTATION_INTERVAL = 5000; // 5 segundos
    const TRANSITION_DURATION = 600; // duração da transição CSS

    let isAnimating = false;

    function rotateCarousel() {
        if (isAnimating) return;

        isAnimating = true;

        // Pega o primeiro item
        const firstItem = carousel.querySelector(".carousel-item");

        if (!firstItem) return;

        // Adiciona classe de saída (fade + blur)
        firstItem.classList.add("exiting");

        // Aguarda a transição acabar
        setTimeout(() => {
            // Remove o elemento do DOM
            firstItem.remove();

            // Clona e adiciona ao final
            const clonedItem = firstItem.cloneNode(true);
            clonedItem.classList.remove("exiting");
            carousel.appendChild(clonedItem);

            isAnimating = false;
        }, TRANSITION_DURATION);
    }

    // Inicia rotação automática
    setInterval(rotateCarousel, ROTATION_INTERVAL);

    // Pausa em hover
    carousel.addEventListener("mouseenter", function () {
        // Aqui você pode pausar o setInterval se necessário
        // Por enquanto, mantém rodando
    });

});