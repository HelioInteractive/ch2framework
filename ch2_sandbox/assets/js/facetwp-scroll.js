(function($) {
    $(".facetwp-pager").click(function (event) {
        if ($(event.target).hasClass("facetwp-page")) {
            $('html, body').animate({
            	scrollTop: $('.facetwp-template').offset().top-140
        	}, 500);
        }
    });
})(jQuery);