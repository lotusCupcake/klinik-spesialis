$(document).ready(function () {
    $("#selUser5").select2({
        placeholder: 'Pilih Template',
        allowClear: true,
        ajax: {
            url: 'sms/getManualSMSTemplateinfo',
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    searchTerm: params.term // search term                   
                };

            },
            processResults: function (response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });
});

$(document).ready(function () {
    $('#selUser5').on('change', function () {
        var iid = $(this).val();
        var type = 'sms';

        $.ajax({
            url: 'sms/getManualSMSTemplateMessageboxText?id=' + iid + '&type=' + type,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).success(function (response) {
               $('#myform').find('[name="message"]').val(response.user.message).end();

        //    CKEDITOR.instances['editor1'].setData(response.user.message)
            //  $('#myform').find('[name="message"]').val(response.user.message).end();
        })
    });
});