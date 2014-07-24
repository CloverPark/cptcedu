
    // Make the select options work as links

        // bind change event to select
		$(function () {
        $('select.styled-select').bind('change', function () {
            var url = $(this).val(); // get selected value
            if (url) { // require a URL
                window.location = url; // redirect
            }
            return false;
        });
 
    });