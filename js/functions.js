/**
 * Theme functions file.
 *
 * Contains handlers for the navigation and other elements.
*/

( function( $ ) {
	
	$(".arrow-wrap").click(function() {
        $('html, body').animate({
            scrollTop: $("#arrow-anchor").offset().top
        }, 500);
        return false;
    });

    /* Search */
    $(".nav__item--search").click(function(){
        $(".overlay--search").fadeIn("fast");

    });
    $(".overlay__close").click(function() {
        $(".overlay--search").fadeOut("fast");
    });

    $(".menu-toggle").click(function() {
        $(".toolbar, .logo").toggle().css("z-index","1");
        $(".main-menu-container").toggleClass("padding--fix");
    });

    $(document).keyup(function(e) {
        if (e.keyCode == 27)
            $('.overlay--search').fadeOut("fast");
    });

} )( jQuery );
