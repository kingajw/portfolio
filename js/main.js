$(document).ready(function () {
    $(".main").onepage_scroll();

    $("#scroll-down").on('click', function () {
        var position = $("#about-me").offset().top;
        $("html,body").animate({
            scrollTop: position}, 700);
    });
});

