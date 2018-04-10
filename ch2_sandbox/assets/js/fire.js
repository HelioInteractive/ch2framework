//Fire stuff off
///headroom
// grab an element

(function() {
    var header = document.querySelector("header");

    if(window.location.hash) {
        header.classList.add("headroom--unpinned");
    }

    var headroom = new Headroom(header, {
        tolerance: {
            down : 10,
            up : 20
        },
        offset : 205
    });
    headroom.init();

}());

//add margin to match the header
jQuery(window).on('scroll resize load', function() {
   // jQuery('html body.logged-in #masthead').css('padding-top',32);
    var height = jQuery('header').height();
//jQuery('html').css('margin-top', height, 'important');
    //jQuery('html').attr('style', 'margin-top: '+height+ 'px !important');
   // jQuery('#masthead').css('margin-top',height * -1);
    jQuery('.site-content').css('margin-top',height);

});




jQuery(document).ready(function () {
    jQuery('.slider-wrapper').each(function () {
        jQuery(this).slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
        })
    })
});



