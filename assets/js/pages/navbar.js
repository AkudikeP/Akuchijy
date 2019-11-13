$(() => {
    bottom_nav = $('.footer');
    $(window).on('resize', () => {
        absoluteFooter(bottom_nav);
    });
    absoluteFooter(bottom_nav);
})

function absoluteFooter(bottom_nav) {
    // if($(window).height() < $('body').height() + 50) {
    //     console.log('called1');
    //     bottom_nav.removeClass('absolute-bottom-c');
    // }
    bottom_nav.addClass('absolute-bottom-c');
    if ($(window).height() < $('body').height() + 177) {
        bottom_nav.removeClass('absolute-bottom-c');
    }
}