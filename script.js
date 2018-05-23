var verticalCenterGoogle = () => {
    let fullHeight = $(window).height(),
        navbarHeight = $('#navbar').height(),
        mainWrapperHeight = $('.main-wrapper').height(),
        googleSectionCenter = (fullHeight - mainWrapperHeight)/2;

    $('.main-wrapper').css("margin-top", googleSectionCenter - navbarHeight);
}
$(function() {
    verticalCenterGoogle();
});