$(document).ready(function () {
	// disable skrollr animations on small screens or on touch devices
    var sizeTest = $('.header-links').css('display');
    if (Modernizr.touch || sizeTest == "none") {
    } else {
        skrollr.init({
            forceHeight: false
        });
    }
});

