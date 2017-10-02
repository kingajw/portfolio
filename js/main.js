$(document).ready(function () {
    $('.next-section').click(function() {
        $('html,body').animate({
            scrollTop: $("#about-1").offset().top
        },700);
    });
});

$( document ).ready(function() {
    $(".main").onepage_scroll();
});
