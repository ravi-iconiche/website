$(document).ready(function(){
    $(window).bind('scroll', function() {
        var navHeight = $("#top-header").height();
        ($(window).scrollTop() > navHeight) ? $('.site-header').addClass('goToTop') : $('.site-header').removeClass('goToTop');
    });
});
