// nested dropdown
document.addEventListener("DOMContentLoaded", function () {
    // make it as accordion for smaller screens
    if (window.innerWidth < 992) {

        // close all inner dropdowns when parent is closed
        document.querySelectorAll('.navbar .dropdown').forEach(function (everydropdown) {
            everydropdown.addEventListener('hidden.bs.dropdown', function () {
                // after dropdown is hidden, then find all submenus
                this.querySelectorAll('.submenu').forEach(function (everysubmenu) {
                    // hide every submenu as well
                    everysubmenu.style.display = 'none';
                });
            })
        });

        document.querySelectorAll('.dropdown-menu a').forEach(function (element) {
            element.addEventListener('click', function (e) {
                let nextEl = this.nextElementSibling;
                if (nextEl && nextEl.classList.contains('submenu')) {
                    // prevent opening link if link needs to open dropdown
                    e.preventDefault();
                    if (nextEl.style.display == 'block') {
                        nextEl.style.display = 'none';
                    } else {
                        nextEl.style.display = 'block';
                    }

                }
            });
        })
    }
    // end if innerWidth
});
// DOMContentLoaded  end



$(document).ready(function () {
    $('select').select2({
        minimumResultsForSearch: 8,
    });

    $('input[type="tel"]').intlTelInput({
        initialCountry: 'sa',
        separateDialCode: true
    });

    $(".rating-readonly").starRating({
        readOnly: true,
        strokeColor: '#FFC107',
        starShape: 'rounded',
        emptyColor: 'transparent',
        ratedColors: ['transparent', '#FFC107'],
        useGradient: false,
        initialRating: 4.5
    });
});

function previewFile(el) {
    const file = $(el).get(0).files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function () {
            $("#previewImg").attr("src", reader.result);
            $(el).siblings(".file-upload").text(file.name);
        }
        reader.readAsDataURL(file);
    }
}


function previewPic(el) {
    console.log(el)
    const file = $(el).get(0).files[0]
    if (file) {
        console.log($(el).siblings('img'))
        $(el).siblings('img').attr('src', URL.createObjectURL(file))
    }
}