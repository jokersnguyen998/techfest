if (window.matchMedia("(orientation: portrait)").matches) {
    $(".top-bar").css("display", "none");
    alert("Bạn nên xoay ngang thiết bị để có trãi nghiệm tốt nhất")
}
window.addEventListener("orientationchange", function () {
    if (window.matchMedia("(orientation: portrait)").matches) {
        $(".top-bar").css("display", "block");
    }

    if (window.matchMedia("(orientation: landscape)").matches) {
        $(".top-bar").css("display", "none");
        alert("Bạn nên xoay ngang thiết bị để có trãi nghiệm tốt nhất")
    }
}, false);

/**
 * Calling modal
 */
$(document).on("click", ".btn-modal", function (e) {
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: $(this).attr("href"),
        async: false,
        cache: false,
        beforeSend: function () {
            let height = $("#modal").find(".modal-content").height();
            $(this).find(".modal-content").height(height);
            $("#modal .kiot").html("");
            $("#modal .kiot").html(
                `<div class="d-flex align-items-center justify-content-center" style="width: 100%; height: ${height}px">
                    <div class="spinner-border text-white" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>`
            );
        },
        success: function (data) {
            setTimeout(function () {
                $("#modal").html(data);
                $("#modal").modal("show");
            }, 500);
        },
    });
});

$(document).on("click", ".btn-detail", function (e) {
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: $(this).attr("href"),
        async: false,
        cache: false,
        success: function (data) {
            $("#modal-detail").html(data).modal("show");
        },
    });
});

$("#modal-detail").on("show.bs.modal", function (e) {
    let height = $("#modal").find(".modal-content").height();
    $(this).find(".modal-content").height(height);
    $("#modal").find(".control-slide-modal").css("display", "none");
});

$("#modal-detail").on("hide.bs.modal", function (e) {
    $("#modal").find(".control-slide-modal").css("display", "flex");
});

$(".sidebar-control a").click(function (e) {
    e.preventDefault();
    let target = $(this).attr("data-target")
    $(".sidebar-stall").addClass("show").find(`#${target}`).addClass("active")
})

$(".sidebar-close").click(function () {
    $(".sidebar-stall").removeClass("show").find(".pane").removeClass("active")
});

$('input[type=search]').on('input', function () {
    clearTimeout(this.delay);
    this.delay = setTimeout(function () {
        $.ajax({
            method: "GET",
            url: "/trien-lam/search",
            data: {
                text: this.value
            },
            success: function (data) {
                $("#search").html(data);
            }
        })
    }.bind(this), 500);
});

$('input[type=search]').on('search', function () {
    if (this.value) {
        $.ajax({
            method: "GET",
            url: "/trien-lam/search",
            data: {
                text: this.value
            },
            success: function (data) {
                $("#search").html(data);
            }
        })
    }
});

function rotateScreen() {

    document.querySelector('#lock-landscape-btn').addEventListener('click', function () {

        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {

            if (document.querySelector(".main-app").requestFullscreen) {
                document.querySelector(".main-app").requestFullscreen();
            } else if (document.querySelector(".main-app").webkitRequestFullScreen) {
                document.querySelector(".main-app").webkitRequestFullScreen();
            }

            screen.orientation.lock("landscape-primary")
                .then(function () {
                    console.log('landscape-primary');
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

    });

    document.querySelector("#unlock-orientation").addEventListener('click', function () {
        screen.orientation.unlock();
    });
}

function showModal(e) {
    e.preventDefault();
    $('#speakers').on('show.bs.modal', function (event) {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            navText: [
                "<i class='fa fa-arrow-left text-muted'></i>",
                "<i class='fa fa-arrow-right text-muted'></i>"
            ],
            autoplay: true,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    })
    $("#speakers").modal("show");
}
