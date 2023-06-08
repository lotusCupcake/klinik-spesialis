$(document).ready(function() {
    $("#pos_select").select2({
        allowClear: true,
        ajax: {
            url: 'patient/getPatientinfoWithAddNewOption',
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

    $("#add_doctor").select2({
        allowClear: true,
        ajax: {
            url: 'doctor/getDoctorWithAddNewOption',
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