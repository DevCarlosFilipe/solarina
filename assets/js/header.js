document.addEventListener("DOMContentLoaded", function () {

    const header = document.getElementById("main-header");

    if (!header) return;

    const updateHeaderScrolled = function () {
        if (window.scrollY > 50) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    };

    updateHeaderScrolled();
    window.addEventListener("scroll", updateHeaderScrolled);

});

const desktopToggle = document.getElementById('desktopSearchToggle');
const desktopClose = document.getElementById('desktopSearchClose');
const desktopHeader = document.querySelector('.site-header');

desktopToggle.addEventListener('click', () => {
    const isActive = desktopHeader.classList.contains('search-active');

    if (isActive) {
        desktopHeader.classList.remove('search-active');
    } else {
        desktopHeader.classList.add('search-active');
        document.querySelector('.desktop-search input').focus();
    }
});

document.addEventListener('click', (e) => {
    if (!e.target.closest('.desktop-search') &&
        !e.target.closest('#desktopSearchToggle')) {
        desktopHeader.classList.remove('search-active');
    }
});
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        header.classList.remove('search-active');
    }
});

const searchToggle = document.getElementById('searchToggle');
const searchClose = document.getElementById('searchClose');
const mobileHeader = document.querySelector('.mobile-header');

searchToggle.addEventListener('click', () => {
    mobileHeader.classList.add('search-active');
    document.querySelector('.mobile-search-bar input').focus();
});

searchClose.addEventListener('click', () => {
    mobileHeader.classList.remove('search-active');
});

