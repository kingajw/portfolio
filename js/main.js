$(document).ready(function () {
    $('.next-section').click(function() {
        $('html,body').animate({
            scrollTop: $("#about1").offset().top
        },700);
    });
});
