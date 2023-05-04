$(document).ready(function () {
    // owl Carousels
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

    $('.books-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        rtl: true,
        margin: 18,
        responsiveClass: true,
        nav: true,
        navText: [
            `<svg xmlns="http://www.w3.org/2000/svg" width="6" height="12" viewBox="0 0 6 12">
                <path id="start" d="M16,12l-6,6V6Z" transform="translate(-10 -6)" fill="#fff" />
            </svg>`
            ,
            `<svg xmlns="http://www.w3.org/2000/svg" width="6" height="12" viewBox="0 0 6 12">
                <path id="end" d="M10,12l6,6V6Z" transform="translate(-10 -6)" fill="#fff" />
            </svg>`
        ],
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            992: {
                items: 3,
            },
            1200: {
                items: 4,
            }
        }
    })
    $('.instructors-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        rtl: true,
        margin: 18,
        responsiveClass: true,
        nav: true,
        navText: [
            `<svg xmlns="http://www.w3.org/2000/svg" width="6" height="12" viewBox="0 0 6 12">
                <path id="start" d="M16,12l-6,6V6Z" transform="translate(-10 -6)" fill="#E49A00" />
            </svg>`
            ,
            `<svg xmlns="http://www.w3.org/2000/svg" width="6" height="12" viewBox="0 0 6 12">
                <path id="end" d="M10,12l6,6V6Z" transform="translate(-10 -6)" fill="#E49A00" />
            </svg>`
        ],
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            992: {
                items: 3,
            },
            1200: {
                items: 4,
            }
        }
    })

});