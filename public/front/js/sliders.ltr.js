$(document).ready(function () {
    // owl Carousels
    $('.course-carousel').owlCarousel({
        loop: true,
        margin: 16,
        responsiveClass: true,
        autoplay: true,
        nav: true,
        navText: [
            `<i class="isax isax-arrow-right-25" style="color: #E49A00"></i>`,
            `<i class="isax isax-arrow-left-35" style="color: #E49A00"></i>`
        ],
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            578: {
                items: 2,
            },
            992: {
                items: 3,
            }
        }
    })
    $('.blog-carousel').owlCarousel({
        loop: true,
        margin: 16,
        responsiveClass: true,
        autoplay: true,
        nav: true,
        dots: false,
        navText: [
            `<i class="isax isax-arrow-right-25" style="color: #0E3C54"></i>`,
            `<i class="isax isax-arrow-left-35" style="color: #0E3C54"></i>`
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
        margin: 18,
        responsiveClass: true,
        autoplay: true,
        nav: true,
        navText: [
            `<i class="isax isax-arrow-right-25" style="color: #FFFFFF"></i>`,
            `<i class="isax isax-arrow-left-35" style="color: #FFFFFF"></i>`
        ],
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            370: {
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
        margin: 18,
        responsiveClass: true,
        autoplay: true,
        nav: true,
        navText: [
            `<i class="isax isax-arrow-right-25" style="color: #E49A00"></i>`,
            `<i class="isax isax-arrow-left-35" style="color: #E49A00"></i>`
        ],
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            370: {
                items: 2,
            },
            768: {
                items: 3,
            },
            1200: {
                items: 4,
            }
        }
    })

});