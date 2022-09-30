$("#testimonials-carousel-1").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    items: 1,
});
function showTabpanel(e, index) {
    $(".tab-pane-speaker").removeClass(['show','active']);
    $(".tab-pane-discussion").removeClass(['show','active']);
    $('.owl-carousel').owlCarousel('destroy');
    
    $("#nav-speaker-" + index).addClass(['show','active']);
    $("#nav-discussion-" + index).addClass(['show','active']);
    $("#testimonials-carousel-" + index).owlCarousel({
        autoplay: true,
        dots: true,
        loop: true,
        items: 1,
    });
}