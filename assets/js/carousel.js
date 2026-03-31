document.addEventListener("DOMContentLoaded", function () {

    const carousel = document.querySelector(".featured-carousel");

    if (!carousel) return;

    let index = 0;
    const items = carousel.children;
    const total = items.length;

    if (total <= 3) return;

    function slide() {

        index++;

        if (index > total - 3) {
            index = 0;
        }

        const itemWidth = items[0].offsetWidth + 16;

        carousel.style.transform = `translateX(-${index * itemWidth}px)`;
    }

    setInterval(slide, 15000);

});