document.addEventListener("DOMContentLoaded", () => {
    main();
});

const main = () => {
    addEventListeners();
    addSwiperEvents();
};

const addEventListeners = () => {
    const $navSidebar = document.querySelector('.nav-sidebar');
    const $navButtonToggleSidebar = document.querySelector('.nav-button-toggle-sidebar');
    const $navBackgroundOverlay = document.querySelector('.nav-sidebar__background-overlay');

    const toggleSidebar = () => {
        const $buttonLines = document.querySelectorAll('.nav-button-toggle-sidebar__line');

        $navButtonToggleSidebar.classList.toggle('nav-button-toggle-sidebar--open');
        $navSidebar.classList.toggle('nav-sidebar--open');
        $navBackgroundOverlay.classList.toggle('nav-sidebar__background-overlay--open');

        $buttonLines.forEach($buttonLine => {
            $buttonLine.classList.toggle('nav-button-toggle-sidebar__line--open');
        });
    }

    $navButtonToggleSidebar.addEventListener('click', toggleSidebar);
    $navBackgroundOverlay.addEventListener('dblclick', toggleSidebar);
}

const addSwiperEvents = () => {
    new Swiper(".home-header", {
        direction: "horizontal",
        loop: true,

        navigation: {
            nextEl: ".home-header .swiper-button-next",
            prevEl: ".home-header .swiper-button-prev",
        },
    });

    new Swiper("section.featured-products", {
        direction: "horizontal",
        slidesPerView: 1,
        // Responsive breakpoints
        breakpoints: {
            // when window width is >= 320px
            600: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            // when window width is >= 480px
            992: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            // when window width is >= 640px
            1400: {
                slidesPerView: 4,
                // spaceBetween: 40,
            },
        },

        navigation: {
            nextEl: "section.featured-products .swiper-button-next",
            prevEl: "section.featured-products .swiper-button-prev",
        },

        pagination: {
            el: "section.featured-products .swiper-pagination"
        }
    });
}