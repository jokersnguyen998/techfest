(function ($) {
    "use strict";

    // Preloader (if the #preloader div exists)
    $(window).on("load", function () {
        if ($("#preloader").length) {
            $("#preloader")
                .delay(100)
                .fadeOut("slow", function () {
                    $(this).remove();
                });
        }
    });

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $(".back-to-top").fadeIn("slow");
        } else {
            $(".back-to-top").fadeOut("slow");
        }
    });
    $(".back-to-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
        return false;
    });

    // Initiate the wowjs animation library
    new WOW().init();

    // Header scroll class
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $("#header").addClass("header-scrolled");
        } else {
            $("#header").removeClass("header-scrolled");
        }
    });

    if ($(window).scrollTop() > 100) {
        $("#header").addClass("header-scrolled");
    }

    // Smooth scroll for the navigation and links with .scrollto classes
    $(".main-nav a, .dropdown-menu a, .mobile-nav a, .sidebar a, .scrollto").on(
        "click",
        function () {
            if (
                location.pathname.replace(/^\//, "") ==
                this.pathname.replace(/^\//, "") &&
                location.hostname == this.hostname
            ) {
                var target = $(this.hash);
                if (target.length) {
                    var top_space = 0;

                    if ($("#header").length) {
                        top_space = $("#header").outerHeight();

                        if (!$("#header").hasClass("header-scrolled")) {
                            top_space = top_space - 40;
                        }
                    }

                    $("html, body").animate(
                        {
                            scrollTop: target.offset().top - top_space,
                        },
                        1500,
                        "easeInOutExpo"
                    );

                    if ($(this).parents(".main-nav, .mobile-nav").length) {
                        $(".main-nav .active, .mobile-nav .active").removeClass(
                            "active"
                        );
                        $(this).closest("li").addClass("active");
                    }

                    if ($("body").hasClass("mobile-nav-active")) {
                        $("body").removeClass("mobile-nav-active");
                        $(".mobile-nav-toggle i").toggleClass(
                            "fa-times fa-bars"
                        );
                        $(".mobile-nav-overly").fadeOut();
                    }
                    return false;
                }
            }
        }
    );

    // Navigation active state on scroll
    var nav_sections = $("section");
    var main_nav = $(".main-nav, .mobile-nav");
    var main_nav_height = $("#header").outerHeight();

    $(window).on("scroll", function () {
        var cur_pos = $(this).scrollTop();

        nav_sections.each(function () {
            var top = $(this).offset().top - main_nav_height,
                bottom = top + $(this).outerHeight();

            if (cur_pos >= top - 300 && cur_pos <= bottom) {
                main_nav.find("li").removeClass("active");
                main_nav
                    .find('a[href="#' + $(this).attr("id") + '"]')
                    .parent("li")
                    .addClass("active");
            }
        });
    });

    // jQuery counterUp (used in Whu Us section)
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 1000,
    });

    // Porfolio isotope and filter
    $(window).on("load", function () {
        var portfolioIsotope = $(".portfolio-container").isotope({
            itemSelector: ".portfolio-item",
        });
        $("#portfolio-flters li").on("click", function () {
            $("#portfolio-flters li").removeClass("filter-active");
            $(this).addClass("filter-active");

            portfolioIsotope.isotope({ filter: $(this).data("filter") });
        });
    });

    // Testimonials carousel (uses the Owl Carousel library)
    $(".testimonials-carousel").owlCarousel({
        autoplay: true,
        dots: true,
        loop: true,
        items: 1,
    });

    // Clients carousel (uses the Owl Carousel library)
    $(".clients-carousel").owlCarousel({
        autoplay: true,
        dots: true,
        loop: true,
        responsive: { 0: { items: 2 }, 768: { items: 4 }, 900: { items: 6 } },
    });
    // Speakers carousel (uses the Owl Carousel library)
    $(".speakers-carousel").owlCarousel({
        autoplay: true,
        dots: false,
        loop: true,
        responsive: { 0: { items: 1 }, 768: { items: 2 }, 900: { items: 3 } },
    });


    // Prevent Right Click
    // var message = "NoRightClicking";
    // function defeatIE() {
    //     if (document.all) {
    //         message;
    //         return false;
    //     }
    // }
    // function defeatNS(e) {
    //     if (document.layers || (document.getElementById && !document.all)) {
    //         if (e.which == 2 || e.which == 3) {
    //             message;
    //             return false;
    //         }
    //     }
    // }
    // if (document.layers) {
    //     document.captureEvents(Event.MOUSEDOWN);
    //     document.onmousedown = defeatNS;
    // } else {
    //     document.onmouseup = defeatNS;
    //     document.oncontextmenu = defeatIE;
    // }
    // document.oncontextmenu = new Function("return false");
})(jQuery);

// jQuery(document).ready(function () {
//     jQuery("body").bind("cut copy paste", function (e) {
//         e.preventDefault();
//     });
//     jQuery("body").on("contextmenu", function (e) {
//         return false;
//     });
// });
// jQuery(document).keydown(function (event) {
//     if (event.keyCode == 123) {
//         return false;
//     }
//     if (event.ctrlKey && event.shiftKey && event.keyCode == 67) {
//         return false;
//     }
//     if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
//         return false;
//     }
// });
// document.onkeydown = function (e) {
//     if (
//         e.ctrlKey &&
//         (e.keyCode === 67 ||
//             e.keyCode === 86 ||
//             e.keyCode === 85 ||
//             e.keyCode === 117)
//     ) {
//         return false;
//     } else {
//         return true;
//     }
// };
// jQuery(document).keypress("u", function (e) {
//     if (e.ctrlKey) {
//         return false;
//     } else {
//         return true;
//     }
// });
// document.body.addEventListener("keydown", (event) => {
//     if (event.ctrlKey && "spa".indexOf(event.key) !== -1) {
//         event.preventDefault();
//     }
// });
