jQuery(document).ready(function () {
    jQuery('.js .block').each(function (i) {
        jQuery(this).animate({'opacity': '0'}, 0);
    });

    //jQuery('.js .block, .js .block *').css('opacity', '0');
    jQuery(window).bind('scroll load', (function () {
        jQuery('.js .block').each(function (i) {
            var top_of_object = jQuery(this).position().top;
            var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();
            if ((bottom_of_window - 50) > top_of_object) {
                jQuery(this).animate({'opacity': '1'}, 1000);
            }
        });
    }));

    //smooth scroll
    jQuery('a[href*="#"]')
    // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function (event) {
            // On-page links
            console.log('scroll');
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = jQuery(this.hash);
                target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    jQuery('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function () {
                        // Callback after animation
                        // Must change focus!
                        var jQuerytarget = jQuery(target);
                        jQuerytarget.focus();
                        if (jQuerytarget.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            jQuerytarget.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                            jQuerytarget.focus(); // Set focus again
                        }
                        ;
                    });
                }
            }
        });
});


// Select all links with hashes
console.log('ch2-fancy.js is go');