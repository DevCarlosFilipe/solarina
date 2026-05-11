document.addEventListener('DOMContentLoaded', function () {
    const header = document.getElementById('main-header');
    const desktopToggle = document.getElementById('desktopSearchToggle');
    const desktopHeader = document.querySelector('.site-header');
    const searchToggle = document.getElementById('searchToggle');
    const searchClose = document.getElementById('searchClose');
    const mobileHeader = document.querySelector('.mobile-header');

    if (header) {
        const updateHeaderScrolled = function () {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        };

        updateHeaderScrolled();
        window.addEventListener('scroll', updateHeaderScrolled);
    }

    if (desktopToggle && desktopHeader) {
        desktopToggle.addEventListener('click', () => {
            const isActive = desktopHeader.classList.contains('search-active');

            if (isActive) {
                desktopHeader.classList.remove('search-active');
            } else {
                desktopHeader.classList.add('search-active');
                const desktopSearchInput = document.querySelector('.desktop-search input');
                if (desktopSearchInput) {
                    desktopSearchInput.focus();
                }
            }
        });

        document.addEventListener('click', (e) => {
            if (!e.target.closest('.desktop-search') &&
                !e.target.closest('#desktopSearchToggle')) {
                desktopHeader.classList.remove('search-active');
            }
        });
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            if (desktopHeader) {
                desktopHeader.classList.remove('search-active');
            }
            if (mobileHeader) {
                mobileHeader.classList.remove('search-active');
            }
        }
    });

    if (searchToggle && mobileHeader) {
        searchToggle.addEventListener('click', () => {
            mobileHeader.classList.add('search-active');
            const mobileSearchInput = document.querySelector('.mobile-search-bar input');
            if (mobileSearchInput) {
                mobileSearchInput.focus();
            }
        });
    }

    if (searchClose && mobileHeader) {
        searchClose.addEventListener('click', () => {
            mobileHeader.classList.remove('search-active');
        });
    }
});

