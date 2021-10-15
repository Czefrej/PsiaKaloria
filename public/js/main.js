$(document).ready(function() {
    $('.navbar-toggler').click(function(e) {
        e.preventDefault()
        $('.mobile-nav-list').fadeIn();
    });
    $('.close-mobile-nav-list').click(function(e) {
        e.preventDefault()
        $('.mobile-nav-list').fadeOut();
    });
});