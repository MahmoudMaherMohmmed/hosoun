$(document).ready(function () {
    // owl Carousels
    $('.featured-carousel').owlCarousel({
        loop: true,
        margin: 16,
        responsiveClass: true,
        nav: false,
        responsive: {
            0: {
                items: 1,
            },
            500: {
                items: 2,
            },
            768: {
                items: 3,
            },
            992: {
                items: 4,
            }
        }
    });
    $('.course-carousel').owlCarousel({
        loop: true,
        margin: 16,
        responsiveClass: true,
        nav: false,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1200: {
                items: 3,
            }
        }
    })
    $('.blog-carousel').owlCarousel({
        loop: true,
        margin: 16,
        responsiveClass: true,
        nav: false,
        responsive: {
            0: {
                items: 1,
            },
            992: {
                items: 2,
            }
        }
    })
    $('.testimonials-carousel').owlCarousel({
        loop: true,
        margin: 16,
        responsiveClass: true,
        nav: false,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1200: {
                items: 3,
            }
        }
    })
    $('.trusted-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        responsiveClass: true,
        nav: false,
        dots: false,
        responsive: {
            0: {
                margin: 50,
                items: 2,
            },
            500: {
                margin: 70,
                items: 3,
            },
            992: {
                margin: 100,
                items: 4,
            },
            1200: {
                margin: 100,
                items: 5,
            }
        }
    })
});