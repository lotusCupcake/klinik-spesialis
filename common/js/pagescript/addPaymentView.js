$(document).ready(function() {
    $("#my_multi_select4").select2({
        multiple: true,
        allowClear: true,
        ajax: {
            url: 'medicine/getMedicineForPharmacyMedicine',
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