$(document).ready(function () {
    $('.next-section').click(function() {
        $('html,body').animate({
            scrollTop: $("#about1").offset().top
        },700);
    });
});

$( document ).ready(function() {
    $(".main").onepage_scroll();
});
