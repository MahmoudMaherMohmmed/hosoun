$(document).ready(function () {
    // owl Carousels
    $('.featured-carousel').owlCarousel({
        loop: true,
        rtl: true,
        margin: 16,
        responsiveClass: true,
        nav: true,
        dots: false,
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
        rtl: true,
        margin: 16,
        responsiveClass: true,
        nav: true,
        dots: false,
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
        rtl: true,
        margin: 16,
        responsiveClass: true,
        nav: true,
        dots: false,
        navText: [
            `<svg xmlns="http://www.w3.org/2000/svg" width="6" height="12" viewBox="0 0 6 12">
                <path id="start" d="M16,12l-6,6V6Z" transform="translate(-10 -6)" fill="#0e3c54" />
            </svg>`
            ,
            `<svg xmlns="http://www.w3.org/2000/svg" width="6" height="12" viewBox="0 0 6 12">
                <path id="end" d="M10,12l6,6V6Z" transform="translate(-10 -6)" fill="#0e3c54" />
            </svg>`
        ],
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            1200: {
                items: 3,
            }
        }
    })
    $('.testimonials-carousel').owlCarousel({
        loop: true,
        rtl: true,
        margin: 16,
        responsiveClass: true,
        nav: true,
        dots: false,
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
        rtl: true,
        responsiveClass: true,
        nav: true,
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