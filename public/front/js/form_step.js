let current = 0;
let tabs = $(".tab");
let tabs_pill = $(".tab-pills");

loadFormData(current);

function loadFormData(n) {
    $(tabs_pill[n]).addClass("active");
    $(tabs[n]).removeClass("d-none");
    $("#form_step").text(`0${n + 1}`)
    $("#back_button").css("display", n == 0 ? "none" : "flex");
    n == tabs.length - 1
        ? $("#next_button").text("ارسال").removeAttr("onclick")
        : $("#next_button")
            .attr("type", "button")
            .text("التالي")
            .attr("onclick", "formNext()");
}

function formNext() {
    $(tabs[current]).addClass("d-none");
    $(tabs_pill[current]).removeClass("active");

    current++;
    loadFormData(current);
}

function formBack() {
    $(tabs[current]).addClass("d-none");
    $(tabs_pill[current]).removeClass("active");

    current--;
    loadFormData(current);
}
