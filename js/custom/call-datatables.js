    // Call Datatables
$(document).ready(function () {
    $('#sort-table').dataTable({

        "bPaginate": false,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": false,
            "bAutoWidth": false,
            "aaSorting": [
            [2, "asc"]
        ]

    });
	
    });