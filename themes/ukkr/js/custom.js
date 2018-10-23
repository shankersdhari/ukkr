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

    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-no-margins mfp-with-zoom',
        closeOnContentClick: true,
        closeBtnInside: false,
        fixedContentPos: true,
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            verticalFit: true
        },
        zoom: {
            enabled: true,
            duration: 300 // don't foget to change the duration also in CSS
        }
    });
});






















