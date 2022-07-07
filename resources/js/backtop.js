$(document).ready(() => {
    $(window).scroll(() => {
        if ($(this).scrollTop()) {
            $('#backtop').show();
        } else {
            $('#backtop').hide();
        }
    })
    $('#backtop').click(() => {
        $('html, body').animate({ scrollTop: 0 }, 100)
    })
})