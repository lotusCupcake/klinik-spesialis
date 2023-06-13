$(document).ready(function() {
    $("#selUser5").select2({
        placeholder: 'Pilih Template',
        allowClear: true,
        ajax: {
            url: 'email/getManualEmailTemplateinfo',
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    searchTerm: params.term // search term                   
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });
});

$(document).ready(function() {
    $('#selUser5').on('change', function() {
        var iid = $(this).val();
        var type = 'email';
        $.ajax({
            url: 'email/getManualEmailTemplateMessageboxText?id=' + iid + '&type=' + type,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).success(function(response) {
            CKEDITOR.instances['editor1'].setData(response.user.message)
        })
    });
});


function addtext(ele) {
    var fired_button = ele.value;
    var value = CKEDITOR.instances.editor1.getData()
    value += fired_button;
    CKEDITOR.instances['editor1'].setData(value)
}

function addtext1(ele) {
    var fired_button = ele.value;
    var value = CKEDITOR.instances.editor2.getData()
    value += fired_button;
    CKEDITOR.instances['editor2'].setData(value)
}