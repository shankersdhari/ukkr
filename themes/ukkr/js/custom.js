/**
 * js file
 */
$(document).ready(function () {
    $('.home-slider').owlCarousel({
        loop:true,
        nav:true,
        dots:false,
        items:1,
        autoHeight: false,
        navText:["<i class='icon-left-arrow'></i>","<i class='icon-right-arrow'></i>"],
    });
    $('.notification-slider').owlCarousel({
        loop:true,
        nav:true,
        dots:false,
        items:1,
        autoHeight: true,
        autoplay:true,
        autoplayHoverPause:true,
        navText:["<i class='icon-left-arrow'></i>","<i class='icon-right-arrow'></i>"]
    });
    $('.news-slider').owlCarousel({
        dots:false,
        autoHeight: true,
        navText:["<i class='icon-left-arrow'></i>","<i class='icon-right-arrow'></i>"],
        loop:true,
        margin:40,
        nav:true,
        slideBy:2,
        responsive:{
            0:{
                slideBy:1,
                items:1
            },
            992:{
                items:2,
                slideBy:2
            }
        }
    });
    $(".search-box .search-toggle").click(function(){
       $(this).prev(".search").toggle();
       $(".search .close-btn").click(function(){
           $(this).parent(".search").hide();
           $(this).next().val("");
       })
    });
});






















