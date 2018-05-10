$(window).on("load", function() {
    "use strict";


    // Client Carousel 

    $('.client-carousel').owlCarousel({
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    loop:true,
    margin:0,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});

if ($(window).width() > 991) {
    var map_height = $(".contact-us").innerHeight();
    $("#map").css({
        "height": map_height
    });
    var test_height = $(".testimonials").innerHeight();
    $(".partners-sec").css({
        "height":test_height
    });
    var gap = $(".container").offset().left;
        $(".testimonials,.contact-us").css({
            "padding-left": gap
    });

};

var blg_img_height = $(".blog-img").innerHeight();
var links_height = blg_img_height/3;
$(".blog-img ul li").css({
    "height": links_height
});


$(".search-btn a").on("click", function(){
    $(".search-btn form").slideToggle();
    return false;
});

$(".responsive-menu-btn").on("click", function(){
    $(".responsive-menu").addClass("active");
});
$(".close-btn i").on("click", function(){
    $(".responsive-menu").removeClass("active");
});






});


