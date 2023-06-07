$(document).ready(function() {
    $("#my_select1_disabled").select2({
        multiple: true,
        allowClear: true,
        ajax: {
            url: 'medicine/getMedicineListForSelect2',
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