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

$(document).ready(function() {
    $('.pos_doctor').hide();
    $(document.body).on('change', '#add_doctor', function() {
        var v = $("select.add_doctor option:selected").val()
        if (v == 'add_new') {
            $('.pos_doctor').show();
        } else {
            $('.pos_doctor').hide();
        }
    });
});

$(document).ready(function() {
    $('.pos_client').hide();
    $(document.body).on('change', '#pos_select', function() {
        var v = $("select.pos_select option:selected").val()
        if (v == 'add_new') {
            $('.pos_client').show();
        } else {
            $('.pos_client').hide();
        }
    });
});

$(document).ready(function() {
    $("#pos_select").select2({
        placeholder: 'Cari Nama / ID Pasien',
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
        placeholder: 'Cari Nama / ID Dokter',
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

$(document).ready(function() {
    $('.cards').hide();
    $(document.body).on('change', '#selecttype', function() {
        var v = $("select.selecttype option:selected").val()
        if (v == 'Card') {
            $('.cardsubmit').removeAttr('hidden');
            $('.cashsubmit').prop('hidden', true);
            $("#amount_received").prop('required', true);
            $('.cards').show();
        } else {
            $('.cards').hide();
            $('.cashsubmit').removeAttr('hidden');
            $('.cardsubmit').prop('hidden', true);
            $("#amount_received").prop('required', false);
        }
    });

});