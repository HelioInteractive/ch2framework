//Fire stuff off
///headroom
// grab an element




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



