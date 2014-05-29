// Check for IE7. If true, fix the Z-index problem with the dropdown menu
$(document).ready(function () {
    if (navigator.appVersion.indexOf("MSIE 7.") != -1) {
        $(function () {
            var zIndexNumber = 1000;
            $('div').each(function () {
                $(this).css('zIndex', zIndexNumber);
                zIndexNumber -= 10;
            });
        });
    }
});