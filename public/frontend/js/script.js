function appendCarouselItem(carouselItems, carouselInfoItems, kiotModal, kiot) {
    carouselInfoItems.html("");
    for (let index = 0; index < carouselItems.length; index++) {
        const element = carouselItems[index];
        let imgSrc = $(element).find("img").attr("src");
        carouselInfoItems.append(`<div class="carousel-item ${
            index == 0 ? "active" : ""
        }">
			<img src="${imgSrc}" />
		</div>`);
    }
    $(`#${kiotModal} .image1`).attr("src", $(`.${kiot} .image1`).attr("src"));
    $(`#${kiotModal} .image2`).attr("src", $(`.${kiot} .image2`).attr("src"));
    $(`#${kiotModal} video`).attr("src", $(`.${kiot} video`).attr("src"));
    $(`#${kiotModal}`).modal("show");
}

/**
 * Open modal
 *
 */
$(".js-open-kiot-forward-left").click(function (e) {
    e.preventDefault();
    var carouselItems = $("#carousel-kiot-forward-left").find(".carousel-item");
    var carouselInfoItems = $("#carousel-kiot-forward-left-modal").find(
        ".carousel-inner"
    );
    appendCarouselItem(
        carouselItems,
        carouselInfoItems,
        "kiot-forward-left-modal",
        "kiot-forward-left"
    );
});

$(".js-open-kiot-left").click(function (e) {
    e.preventDefault();
    var carouselItems = $("#carousel-kiot-left").find(".carousel-item");
    var carouselInfoItems = $("#carousel-kiot-left-modal").find(
        ".carousel-inner"
    );
    appendCarouselItem(
        carouselItems,
        carouselInfoItems,
        "kiot-left-modal",
        "kiot-left"
    );
});

$(".js-open-kiot-center").click(function (e) {
    e.preventDefault();
    var carouselItems = $("#carousel-kiot-center").find(".carousel-item");
    var carouselInfoItems = $("#carousel-kiot-center-modal").find(
        ".carousel-inner"
    );
    appendCarouselItem(
        carouselItems,
        carouselInfoItems,
        "kiot-center-modal",
        "kiot-center"
    );
});

$(".js-open-kiot-right").click(function (e) {
    e.preventDefault();
    var carouselItems = $("#carousel-kiot-right").find(".carousel-item");
    var carouselInfoItems = $("#carousel-kiot-right-modal").find(
        ".carousel-inner"
    );
    appendCarouselItem(
        carouselItems,
        carouselInfoItems,
        "kiot-right-modal",
        "kiot-right"
    );
});

$(".js-open-kiot-forward-right").click(function (e) {
    e.preventDefault();
    var carouselItems = $("#carousel-kiot-forward-right").find(
        ".carousel-item"
    );
    var carouselInfoItems = $("#carousel-kiot-forward-right-modal").find(
        ".carousel-inner"
    );
    appendCarouselItem(
        carouselItems,
        carouselInfoItems,
        "kiot-forward-right-modal",
        "kiot-forward-right"
    );
});

$(".link-forward-left-modal").click(function (e) {
    e.preventDefault();
    $(this).parents(".modal").modal("hide");
    $(".js-open-kiot-forward-left").click();
});

$(".link-left-modal").click(function (e) {
    e.preventDefault();
    $(this).parents(".modal").modal("hide");
    $(".js-open-kiot-left").click();
});

$(".link-center-modal").click(function (e) {
    e.preventDefault();
    $(this).parents(".modal").modal("hide");
    $(".js-open-kiot-center").click();
});

$(".link-right-modal").click(function (e) {
    e.preventDefault();
    $(this).parents(".modal").modal("hide");
    $(".js-open-kiot-right").click();
});

$(".link-forward-right-modal").click(function (e) {
    e.preventDefault();
    $(this).parents(".modal").modal("hide");
    $(".js-open-kiot-forward-right").click();
});

/**
 * When modal hidden
 *
 */
$("#kiot-left-modal").on("hidden.bs.modal", function (event) {
    video = $("#kiot-left-modal").find("video")[0]
    video.pause();
    video.currentTime = 0;
});

$("#kiot-center-modal").on("hidden.bs.modal", function (event) {
    video = $("#kiot-center-modal").find("video")[0]
    video.pause();
    video.currentTime = 0;
});

$("#kiot-right-modal").on("hidden.bs.modal", function (event) {
    video = $("#kiot-right-modal").find("video")[0]
    video.pause();
    video.currentTime = 0;
});

$("#kiot-forward-left-modal").on("hidden.bs.modal", function (event) {
    video = $("#kiot-forward-left-modal").find("video")[0]
    video.pause();
    video.currentTime = 0;
});

$("#kiot-forward-right-modal").on("hidden.bs.modal", function (event) {
    video = $("#kiot-forward-right-modal").find("video")[0]
    video.pause();
    video.currentTime = 0;
});

/**
 * Modal details slide
 *
 */
$(".info-kiot-left").click(function (e) {
    e.preventDefault();
    $("#info-kiot-left-modal").modal("show");
});

$(".info-kiot-center").click(function (e) {
    e.preventDefault();
    $("#info-kiot-center-modal").modal("show");
});

$(".info-kiot-right").click(function (e) {
    e.preventDefault();
    $("#info-kiot-right-modal").modal("show");
});

$(".info-kiot-forward-left").click(function (e) {
    e.preventDefault();
    $("#info-kiot-forward-left-modal").modal("show");
});

$(".info-kiot-forward-right").click(function (e) {
    e.preventDefault();
    $("#info-kiot-forward-right-modal").modal("show");
});

/**
 * Next page
 *
 */
$(".next").click(function (e) {
    e.preventDefault();
    $(".top-bar").removeClass("previous");
    $(".top-bar").addClass("next");
    var index = $(this).attr("href");
    setTimeout(function () {
        location.href =
            window.location.protocol +
            "//" +
            window.location.hostname +
            ":" +
            window.location.port +
            `/${index}`;
    }, 2000);
});

/**
 * Previous page
 *
 */
$(".prev").click(function (e) {
    e.preventDefault();
    $(".top-bar").removeClass("next");
    $(".top-bar").addClass("previous");
    var index = $(this).attr("href");
    setTimeout(function () {
        location.href =
            window.location.protocol +
            "//" +
            window.location.hostname +
            ":" +
            window.location.port +
            `/${index}`;
    }, 2000);
});

/**
 * Show list kiot
 *
 */
$(".icon-info").click(function (e) {
    e.preventDefault();
    $(this).toggleClass("active");
    $(".list").toggleClass("active");
});
