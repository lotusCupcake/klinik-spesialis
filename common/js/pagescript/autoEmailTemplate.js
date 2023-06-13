$(document).ready(function() {
    var table = $('#editable-sample1').DataTable({
        responsive: true,
        "processing": true,
        "serverSide": true,
        "searchable": true,
        "ajax": {
            url: "email/getAutoEmailTemplateList",
            type: 'POST',
            'data': {
                'type': 'sms'
            }
        },
        scroller: {
            loadingIndicator: true
        },
        dom: "<'row'<'col-sm-3'><'col-sm-5 text-center'B><'col-sm-4'>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'>>",
        buttons: [{
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [0, 1, 2],
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [0, 1, 2],
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: [0, 1, 2],
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [0, 1, 2],
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [0, 1, 2],
                }
            },
        ],
        aLengthMenu: [
            [1, 2, 50, 100, -1],
            [1, 2, 50, 100, "All"]
        ],
        iDisplayLength: 100,
        "order": [
            [0, "desc"]
        ],
        "language": {
            "lengthMenu": "_MENU_",
            search: "_INPUT_",
            searchPlaceholder: "Search..."
        },
    });
    table.buttons().container()
        .appendTo('.custom_buttons');
});


$(document).ready(function() {
    $(".table").on("click", ".editbutton1", function() {
        var iid = $(this).attr('data-id');
        $('#divbuttontag').html("");
        $.ajax({
            url: 'email/editAutoEmailTemplate?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).success(function(response) {
            console.log(response);
            $('#emailtemp').find('[name="id"]').val(response.autotemplatename.id).end();
            $('#emailtemp').find('[name="category"]').val(response.autotemplatename.name).end();
            CKEDITOR.instances['editor1'].setData(response.autotemplatename.message);
            var option = '';
            $.each(response.autotag, function(index, value) {
                option += '<label class="selectgroup-item">';
                option += '<input type="radio" name="myBtn" value="' + value.name + '" class="selectgroup-input" onClick="addtext(this);">';
                option += '<span class="selectgroup-button">' + value.name + '</span>';
                option += '</label>';
            });
            $('#divbuttontag').html(option);
            $('#status').html(response.status_options);
            $('#myModal1').modal('show');
        });
    });
})

function addtext(ele) {
    var fired_button = ele.value;
    var value = CKEDITOR.instances.editor1.getData()
    value += fired_button;
    CKEDITOR.instances['editor1'].setData(value)
}

function addtext1(ele) {
    var fired_button = ele.value;
    document.myform1.message.value += fired_button;
}

$(document).ready(function() {
    CKEDITOR.config.autoParagraph = false;
});