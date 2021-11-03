$(document).ready(function() {
    $('.navbar-toggler').click(function(e) {
        e.preventDefault()
        $('.mobile-nav-list').fadeIn();
    });
    $('.close-mobile-nav-list').click(function(e) {
        e.preventDefault()
        $('.mobile-nav-list').fadeOut();
    });
    $('[data-bs-toggle="popover"]').click(function (e) {
        e.preventDefault();
    })
});
// Popovers enable
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})
