$(document).ready(function() {
    var table = $('#ap-sample5').DataTable({
        responsive: true,
        //   dom: 'lfrBtip',

        "processing": true,
        "serverSide": true,
        "searchable": true,
        "ajax": {
            url: "appointment/getAppoinmentList",
            type: 'POST',
        },
        scroller: {
            loadingIndicator: true
        },
        dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5],
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                }
            },
        ],
        aLengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        iDisplayLength: 100,
        "order": [
            [0, "desc"]
        ],
        "language": {
            "lengthMenu": "_MENU_",
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            "url": "common/assets/DataTables/languages/" + bahasa + ".json"
        },
    });
    table.buttons().container().appendTo('.custom_buttons');
});

$(document).ready(function() {
    var table = $('#ap-sample6').DataTable({
        responsive: true,
        //   dom: 'lfrBtip',

        "processing": true,
        "serverSide": true,
        "searchable": true,
        "ajax": {
            url: "appointment/getRequestedAppointmentList",
            type: 'POST',
        },
        scroller: {
            loadingIndicator: true
        },
        dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",

        buttons: [{
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
        ],
        aLengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        iDisplayLength: 100,
        "order": [
            [0, "desc"]
        ],
        "language": {
            "lengthMenu": "_MENU_",
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
        },
    });
    table.buttons().container().appendTo('.custom_buttons');
});

$(document).ready(function() {
    var table = $('#ap-sample1').DataTable({
        responsive: true,
        //   dom: 'lfrBtip',

        "processing": true,
        "serverSide": true,
        "searchable": true,
        "ajax": {
            url: "appointment/getPendingAppoinmentList",
            type: 'POST',
        },
        scroller: {
            loadingIndicator: true
        },
        dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",

        buttons: [{
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
        ],
        aLengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        iDisplayLength: 100,
        "order": [
            [0, "desc"]
        ],
        "language": {
            "lengthMenu": "_MENU_",
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
        },
    });
    table.buttons().container().appendTo('.custom_buttons');
});

$(document).ready(function() {
    var table = $('#ap-sample2').DataTable({
        responsive: true,
        //   dom: 'lfrBtip',

        "processing": true,
        "serverSide": true,
        "searchable": true,
        "ajax": {
            url: "appointment/getConfirmedAppoinmentList",
            type: 'POST',
        },
        scroller: {
            loadingIndicator: true
        },
        dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",

        buttons: [{
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
        ],
        aLengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        iDisplayLength: 100,
        "order": [
            [0, "desc"]
        ],
        "language": {
            "lengthMenu": "_MENU_",
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
        },
    });
    table.buttons().container().appendTo('.custom_buttons');
});

$(document).ready(function() {
    var table = $('#ap-sample3').DataTable({
        responsive: true,
        //   dom: 'lfrBtip',

        "processing": true,
        "serverSide": true,
        "searchable": true,
        "ajax": {
            url: "appointment/getTreatedAppoinmentList",
            type: 'POST',
        },
        scroller: {
            loadingIndicator: true
        },
        dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",

        buttons: [{
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
        ],
        aLengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        iDisplayLength: 100,
        "order": [
            [0, "desc"]
        ],
        "language": {
            "lengthMenu": "_MENU_",
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
        },
    });
    table.buttons().container().appendTo('.custom_buttons');
});

$(document).ready(function() {
    var table = $('#ap-sample4').DataTable({
        responsive: true,
        //   dom: 'lfrBtip',

        "processing": true,
        "serverSide": true,
        "searchable": true,
        "ajax": {
            url: "appointment/getCancelledAppoinmentList",
            type: 'POST',
        },
        scroller: {
            loadingIndicator: true
        },
        dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",

        buttons: [{
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [0, 0, 1, 2, 3, 4, 5, 5],
                }
            },
        ],
        aLengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        iDisplayLength: 100,
        "order": [
            [0, "desc"]
        ],
        "language": {
            "lengthMenu": "_MENU_",
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
        },
    });
    table.buttons().container().appendTo('.custom_buttons');
});