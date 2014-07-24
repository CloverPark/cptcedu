  // Open all PDFs in new tabs
$(function () {
        $('a[href$=".pdf"]').each(function () {
            $(this).prop('target', '_blank');
        });
    });

    $(function () {
        $('a[href*=".com"]').each(function () {
            $(this).prop('target', '_blank');
        });
    });

    $(function () {
        $('a[href*=".org"]').each(function () {
            $(this).prop('target', '_blank');
        });

    });