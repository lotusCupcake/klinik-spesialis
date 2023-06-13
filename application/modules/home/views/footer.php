<footer class="main-footer no-print">
    <div class="footer-left">
        Copyright &copy; 2023 <a href="https://umsu.ac.id/">UMSU</a> Version 1.0.2
    </div>
</footer>
</div>
</div>


<!-- JS NEW -->
<!-- General JS Scripts -->
<script src="common/js/jquery.js"></script>
<script src="common/js/jquery-1.8.3.min.js"></script>
<!-- <script src="common/js/bootstrap.min.js"></script> -->
<!-- <script src="http://code.jquery.com/jquery-1.9.0.js"></script> -->
<!-- <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script> -->
<!-- <script src="template/node_modules/jquery/dist/jquery.min.js"></script> -->
<script src="template/node_modules/moment/min/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
<script src="template/assets/js/stisla.js"></script>
<!-- JS Libraies -->
<script type="text/javascript" src="common/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="common/assets/ckeditor/ckeditor.js"></script>
<script src="template/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="common/assets/DataTables/datatables.min.js"></script>
<script src="template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="common/assets/DataTables/DataTables-1.10.16/custom/js/datatable-responsive-cdn-version-2-2-5.js"></script>
<script src="template/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
<script src="template/node_modules/select2/dist/js/select2.full.min.js"></script>
<script src="template/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="template/node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="template/node_modules/selectric/public/jquery.selectric.min.js"></script>
<script src="template/node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="template/node_modules/cleave.js/dist/cleave.min.js"></script>
<script src="template/node_modules/cleave.js/dist/addons/cleave-phone.us.js"></script>
<script src="template/node_modules/summernote/dist/summernote-bs4.js"></script>
<script src="template/node_modules/izitoast/dist/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="common/assets/fullcalendar/fullcalendar.js"></script>
<script src="template/assets/js/page/modules-datatables.js"></script>
<script src="template/assets/js/scripts.js"></script>

<script>
    CKEDITOR.replace("description", {
        height: 400
    });
</script>

<script>
    $(document).ready(function() {
        $("#patientchoose").select2({
            placeholder: '<?php echo lang('select_patient'); ?>',
            allowClear: true,
            ajax: {
                url: 'patient/getPatientinfo',
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
        $("#patientchoose1").select2({
            placeholder: '<?php echo lang('select_patient'); ?>',
            allowClear: true,
            ajax: {
                url: 'patient/getPatientinfo',
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
</script>

<script>
    $(document).ready(function() {
        $("#doctorchoose").select2({
            placeholder: '<?php echo lang('select_doctor'); ?>',
            allowClear: true,
            ajax: {
                url: 'doctor/getDoctorInfo',
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
        $("#doctorchoose1").select2({
            placeholder: '<?php echo lang('select_doctor'); ?>',
            allowClear: true,
            ajax: {
                url: 'doctor/getDoctorInfo',
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
</script>

<?php
$language = $this->db->get('settings')->row()->language;

if ($language == 'english') {
    $lang = 'en';
    $langdate = 'en-CA';
} elseif ($language == 'spanish') {
    $lang = 'es';
    $langdate = 'es';
} elseif ($language == 'french') {
    $lang = 'fr';
    $langdate = 'fr';
} elseif ($language == 'portuguese') {
    $lang = 'pt';
    $langdate = 'pt';
} elseif ($language == 'arabic') {
    $lang = 'ar';
    $langdate = 'ar';
} elseif ($language == 'italian') {
    $lang = 'it';
    $langdate = 'it';
} elseif ($language == 'zh_cn') {
    $lang = 'zh-cn';
    $langdate = 'zh-CN';
} elseif ($language == 'japanese') {
    $lang = 'ja';
    $langdate = 'ja';
} elseif ($language == 'russian') {
    $lang = 'ru';
    $langdate = 'ru';
} elseif ($language == 'turkish') {
    $lang = 'tr';
    $langdate = 'tr';
} elseif ($language == 'indonesian') {
    $lang = 'id';
    $langdate = 'id';
}
?>

<script src='common/assets/fullcalendar/locale/<?php echo $lang; ?>.js'></script>

<script type="text/javascript" src="common/assets/bootstrap-datepicker/locales/bootstrap-datepicker.<?php echo $langdate; ?>.min.js"></script>


<script src="common/assets/DataTables/DataTables-1.10.16/custom/js/datatable-responsive-cdn-version-2-2-5.js"></script>


<script>
    $('.multi-select').multiSelect({
        selectableHeader: "<input type='text' class='search-input' autocomplete='off' placeholder=' search...'>",
        selectionHeader: "<input type='text' class='search-input' autocomplete='off' placeholder=''>",
        afterInit: function(ms) {
            var that = this,
                $selectableSearch = that.$selectableUl.prev(),
                $selectionSearch = that.$selectionUl.prev(),
                selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

            that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                .on('keydown', function(e) {
                    if (e.which === 40) {
                        that.$selectableUl.focus();
                        return false;
                    }
                });

            that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                .on('keydown', function(e) {
                    if (e.which == 40) {
                        that.$selectionUl.focus();
                        return false;
                    }
                });
        },
        afterSelect: function() {
            this.qs1.cache();
            this.qs2.cache();
        },
        afterDeselect: function() {
            this.qs1.cache();
            this.qs2.cache();
        }
    });
</script>

<script>
    $('#my_multi_select3').multiSelect()
</script>

<script>
    $('.default-date-picker').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight: true,
        startDate: '01-01-1900',
        clearBtn: true,
        language: '<?php echo $langdate; ?>'
    });


    $('#date').on('changeDate', function() {
        $('#date').datepicker('hide', {
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
            startDate: '01-01-1900',
            language: '<?php echo $langdate; ?>'
        });
    });

    $('#date1').on('changeDate', function() {
        $('#date1').datepicker('hide', {
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
            startDate: '01-01-1900',
            language: '<?php echo $langdate; ?>'
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            lang: 'en',
            events: 'appointment/getAppointmentByJason',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay',
            },
            timeFormat: 'h(:mm) A',
            eventRender: function(event, element) {
                $(element).css({
                    'text-align': 'left',
                    'color': '#FFFFFF',
                });
                element.find('.fc-time').html(element.find('.fc-time').text());
                element.find('.fc-title').html(element.find('.fc-title').text());

            },
            eventClick: function(event) {
                $('#medical_history').html("");
                if (event.id) {
                    $.ajax({
                        url: 'patient/getMedicalHistoryByJason?id=' + event.id + '&from_where=calendar',
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                    }).success(function(response) {
                        $('#medical_history').html("");
                        $('#medical_history').append(response.view);
                    });
                }

                $('#cmodal').modal('show');
            },

            /*   eventMouseover: function (calEvent, domEvent) {
             var layer = "<div id='events-layer' class='fc-transparent' style='position:absolute; width:100%; height:100%; top:-1px; text-align:right; z-index:100'>Description</div>";
             $(this).append(layer);
             },
             
             eventMouseout: function (calEvent, domEvent) {
             $(this).append(layer);
             },
             
             */

            slotDuration: '00:5:00',
            businessHours: false,
            slotEventOverlap: false,
            editable: false,
            selectable: false,
            lazyFetching: true,
            minTime: "6:00:00",
            maxTime: "24:00:00",
            defaultView: 'month',
            allDayDefault: false,
            displayEventEnd: true,
            timezone: false,

        });
    });
</script>









<script>
    $(document).ready(function() {
        $('.timepicker-default').timepicker({
            defaultTime: 'value'
        });

    });
</script>

<script type="text/javascript" src="common/assets/select2/js/select2.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $(".js-example-basic-single").select2();

        $(".js-example-basic-multiple").select2();
    });
</script>




<script type="text/javascript">
    $(document).ready(function() {
        var windowH = $(window).height();
        var wrapperH = $('#container').height();
        if (windowH > wrapperH) {
            $('#sidebar').css('height', (windowH) + 'px');
        } else {
            $('#sidebar').css('height', (wrapperH) + 'px');
        }
        var windowSize = window.innerWidth;
        if (windowSize < 768) {
            $('#sidebar').removeAttr('style');
        }
    });

    function onElementHeightChange(elm, callback) {
        var lastHeight = elm.clientHeight,
            newHeight;
        (function run() {
            newHeight = elm.clientHeight;
            if (lastHeight != newHeight)
                callback();
            lastHeight = newHeight;
            if (elm.onElementHeightChangeTimer)
                clearTimeout(elm.onElementHeightChangeTimer);
            elm.onElementHeightChangeTimer = setTimeout(run, 200);
        })();
    }




    onElementHeightChange(document.body, function() {
        var windowH = $(window).height();
        var wrapperH = $('#container').height();
        if (windowH > wrapperH) {
            $('#sidebar').css('height', (windowH) + 'px');
        } else {
            $('#sidebar').css('height', (wrapperH) + 'px');
        }

        var windowSize = $(window).width();
        if (windowSize < 768) {
            $('#sidebar').removeAttr('style');
        }
    });







    $(window).resize(function() {

        if (width == GetWidth()) {
            return;
        }

        width = GetWidth();

        if (width < 600) {
            $('#sidebar').hide();
        } else {
            $('#sidebar').show();
        }

    });
</script>
<script>
    $(document).ready(function() {
        //   $('#')
    });
</script>



<script>
    CKEDITOR.replace("description", {
        height: 400
    });
</script>

<script>
    var bahasa = <?php echo $this->language; ?>;
</script>

<?php if ($this->uri->segment(1) == 'appointment') : ?>
    <script src="common/js/pagescript/appointment.js"></script>
<?php endif ?>

<?php if ($this->uri->segment(1) == 'patient') : ?>
    <script src="common/js/pagescript/medicalHistory.js"></script>
<?php endif ?>

<?php if ($this->uri->segment(1) == 'prescription') : ?>
    <script src="common/js/pagescript/add_new_prescription_view.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.medicinee').change(function() {
                var count = 0;
                var selected = $('#my_select1_disabled').find('option:selected');
                var unselected = $('#my_select1_disabled').find('option:not(:selected)');
                selected.attr('data-selected', '1');
                $.each(unselected, function(index, value1) {
                    if ($(this).attr('data-selected') == '1') {
                        var value = $(this).val();
                        var res = value.split("*");
                        var id = res[0];
                        $('#med_selected_section-' + id).remove();
                    }
                });

                $.each($('select.medicinee option:selected'), function() {
                    var value = $(this).val();
                    var res = value.split("*");
                    var id = res[0];
                    var med_id = res[0];
                    var med_name = res[1];
                    if ($('#med_id-' + id).length) {} else {
                        var html = ''
                        html += '<div id="med_selected_section-' + med_id + '" class="med_selected form-row">'
                        html += '<div class="form-group medicine_sect col-md-2">'
                        html += '<label><?php echo lang("medicine"); ?></label>'
                        html += '<input type="text" class="form-control medi_div" name="med_id[]" value="' + med_name + '" placeholder="" required>'
                        html += '<input type="hidden" id="med_id-' + id + '" class="medi_div" name="medicine[]" value="' + med_id + '" placeholder="" required>'
                        html += '</div>'
                        html += '<div class="form-group medicine_sect col-md-2">'
                        html += '<label><?php echo lang("dosage"); ?></label>'
                        html += '<input type="text" class="form-control state medi_div" name="dosage[]" value="" placeholder="100 mg" required>'
                        html += '</div>'
                        html += '<div class="form-group medicine_sect col-md-2">'
                        html += '<label><?php echo lang("frequency"); ?></label>'
                        html += '<input type="text" class="form-control potency medi_div sale" id="salee' + count + '" name="frequency[]" value="" placeholder="1 + 0 + 1" required>'
                        html += '</div>'
                        html += '<div class="form-group medicine_sect col-md-2">'
                        html += '<label><?php echo lang("days"); ?></label>'
                        html += '<input type="text" class="form-control potency medi_div quantity" id="quantity' + count + '" name="days[]" value="" placeholder="7 days" required>'
                        html += '</div>'
                        html += '<div class="form-group medicine_sect col-md-2">'
                        html += '<label><?php echo lang("instruction"); ?></label>'
                        html += '<input type="text" class="form-control potency medi_div quantity" id="quantity' + count + '" name="instruction[]" value="" placeholder="After Food" required>'
                        html += '</div>'
                        html += '</div>'
                        $(".medicine").append(html);
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var selected = $('#my_select1_disabled').find('option:selected');
            var unselected = $('#my_select1_disabled').find('option:not(:selected)');
            selected.attr('data-selected', '1');
            $.each(unselected, function(index, value1) {
                if ($(this).attr('data-selected') == '1') {
                    var value = $(this).val();
                    var res = value.split("*");
                    var id = res[0];
                    $('#med_selected_section-' + id).remove();
                }
            });
            var count = 0;
            $.each($('select.medicinee option:selected'), function() {
                var value = $(this).val();
                var res = value.split("*");
                var id = res[0];
                var med_id = res[0];
                var med_name = res[1];
                var dosage = $(this).data('dosage');
                var frequency = $(this).data('frequency');
                var days = $(this).data('days');
                var instruction = $(this).data('instruction');
                if ($('#med_id-' + id).length) {

                } else {
                    var html = ''
                    html += '<div id="med_selected_section-' + med_id + '" class="med_selected form-row">'
                    html += '<div class="form-group medicine_sect col-md-2">'
                    html += '<label><?php echo lang("medicine"); ?></label>'
                    html += '<input type="text" class="form-control medi_div" name="med_id[]" value="' + med_name + '" placeholder="" required>'
                    html += '<input type="hidden" id="med_id-' + id + '" class="medi_div" name="medicine[]" value="' + med_id + '" placeholder="" required>'
                    html += '</div>'
                    html += '<div class="form-group medicine_sect col-md-2">'
                    html += '<label><?php echo lang("dosage"); ?></label>'
                    html += '<input type="text" class="form-control state medi_div" name="dosage[]" value="' + dosage + '" placeholder="100 mg" required>'
                    html += '</div>'
                    html += '<div class="form-group medicine_sect col-md-2">'
                    html += '<label><?php echo lang("frequency"); ?></label>'
                    html += '<input type="text" class="form-control potency medi_div sale" id="salee' + count + '" name="frequency[]" value="' + frequency + '" placeholder="1 + 0 + 1" required>'
                    html += '</div>'
                    html += '<div class="form-group medicine_sect col-md-2">'
                    html += '<label><?php echo lang("days"); ?></label>'
                    html += '<input type="text" class="form-control potency medi_div quantity" id="quantity' + count + '" name="days[]" value="' + days + '" placeholder="7 days" required>'
                    html += '</div>'
                    html += '<div class="form-group medicine_sect col-md-2">'
                    html += '<label><?php echo lang("instruction"); ?></label>'
                    html += '<input type="text" class="form-control potency medi_div quantity" id="quantity' + count + '" name="instruction[]" value="' + instruction + '" placeholder="After Food" required>'
                    html += '</div>'
                    html += '</div>'
                    $(".medicine").append(html);
                }
            });
        });
    </script>
<?php endif ?>

<?php if ($this->uri->segment(1) == 'lab') : ?>
    <script src="common/js/pagescript/lab.js"></script>
<?php endif ?>

<?php if ($this->uri->segment(1) == 'sms') : ?>
    <script src="common/js/pagescript/sendView.js"></script>
<?php endif ?>

<?php if ($this->uri->segment(1) == 'finance') : ?>
    <script src="common/js/pagescript/addPaymentView.js"></script>
    <script>
        $(document).ready(function() {
            var tot = 0;
            var selected = $('#my_multi_select4').find('option:selected');
            var unselected = $('#my_multi_select4').find('option:not(:selected)');
            selected.attr('data-selected', '1');
            $.each(unselected, function(index, value1) {
                if ($(this).attr('data-selected') == '1') {
                    var value = $(this).val();
                    var res = value.split("*");
                    var id = res[0];
                    $('#id-div' + id).remove();
                    $('#idinput-' + id).remove();
                    $('#mediidinput-' + id).remove();
                }
            });

            $.each($('select.multi-select1 option:selected'), function() {
                var value = $(this).val();
                var res = value.split("*");
                var unit_price = res[1];
                var id = res[0];
                var qtity = $(this).data('qtity');
                if ($('#idinput-' + id).length) {

                } else {
                    if ($('#id-div' + id).length) {

                    } else {

                        let html = ''
                        html += '<div class="card remove1" id="id-div' + id + '">'
                        html += '<div class="card-body">'
                        html += '<div class="row name" style="padding-right:30px">'
                        html += '<div class="col-md-12 row mb-4">'
                        html += '<div class="col-md-4 text-right">'
                        html += '<label class="col-form-label">Name</label>'
                        html += '</div>'
                        html += '<div class="col-md-8">'
                        html += '<input type="text" class="form-control pos_element" value="' + res[2] + '" readonly>'
                        html += '</div>'
                        html += '</div>'
                        html += '</div>'
                        html += '<div class="row company" style="padding-right:30px">'
                        html += '<div class="col-md-12 row mb-4">'
                        html += '<div class="col-md-4 text-right">'
                        html += '<label class="col-form-label">Company</label>'
                        html += '</div>'
                        html += '<div class="col-md-8">'
                        html += '<input type="text" class="form-control pos_element" value="' + res[3] + '" readonly>'
                        html += '</div>'
                        html += '</div>'
                        html += '</div>'
                        html += '<div class="row price" style="padding-right:30px">'
                        html += '<div class="col-md-12 row mb-4">'
                        html += '<div class="col-md-4 text-right">'
                        html += '<label class="col-form-label">Price</label>'
                        html += '</div>'
                        html += '<div class="col-md-8">'
                        html += '<input type="text" class="form-control pos_element" value="' + res[1] + '" readonly>'
                        html += '</div>'
                        html += '</div>'
                        html += '</div>'
                        html += '<div class="row current_stock" style="padding-right:30px">'
                        html += '<div class="col-md-12 row mb-4">'
                        html += '<div class="col-md-4 text-right">'
                        html += '<label class="col-form-label">Current Stock</label>'
                        html += '</div>'
                        html += '<div class="col-md-8">'
                        html += '<input type="text" class="form-control pos_element" value="' + res[4] + '" readonly>'
                        html += '</div>'
                        html += '</div>'
                        html += '</div>'
                        html += '<div class="row quantity" style="padding-right:30px">'
                        html += '<div class="col-md-12 row mb-4">'
                        html += '<div class="col-md-4 text-right">'
                        html += '<label class="col-form-label">Quantity</label>'
                        html += '</div>'
                        html += '<div class="col-md-8" id="quantity' + id + '">'
                        html += '</div>'
                        html += '</div>'
                        html += '</div>'
                        html += '</div>'
                        html += '</div>'
                        $("#editPaymentForm .qfloww").append(html)
                    }
                    var input2 = $('<input>').attr({
                        type: 'text',
                        class: "form-control remove",
                        id: 'idinput-' + id,
                        name: 'quantity[]',
                        value: '1',
                    }).appendTo('#editPaymentForm .qfloww #quantity' + id);

                    $('<input>').attr({
                        type: 'hidden',
                        class: "remove",
                        id: 'mediidinput-' + id,
                        name: 'medicine_id[]',
                        value: id,
                    }).appendTo('#editPaymentForm .qfloww #quantity' + id);
                }
                $(document).ready(function() {
                    $('#idinput-' + id).keyup(function() {
                        var qty = 0;
                        var total = 0;
                        $.each($('select.multi-select1 option:selected'), function() {
                            var value = $(this).val();
                            var res = value.split("*");
                            var id1 = res[0];
                            qty = $('#idinput-' + id1).val();
                            var ekokk = res[1];
                            total = total + qty * ekokk;
                        });
                        tot = total;
                        var discount = $('#dis_id').val();
                        var gross = tot - discount;
                        $('#editPaymentForm').find('[name="subtotal"]').val(tot).end()
                        $('#editPaymentForm').find('[name="grsss"]').val(gross)
                    });
                });
                var curr_val = res[1] * $('#idinput-' + id).val();
                tot = tot + curr_val;
            });
            var discount = $('#dis_id').val();
            var gross = tot - discount;
            $('#editPaymentForm').find('[name="subtotal"]').val(tot).end()
            $('#editPaymentForm').find('[name="grsss"]').val(gross)
        });
        $(document).ready(function() {
            $('#dis_id').keyup(function() {
                var val_dis = 0;
                var amount = 0;
                var ggggg = 0;
                amount = $('#subtotal').val();
                val_dis = this.value;
                ggggg = amount - val_dis;
                $('#editPaymentForm').find('[name="grsss"]').val(ggggg)
            });
        });
    </script>



    <script>
        $(document).ready(function() {
            $('.multi-select1').change(function() {
                var tot = 0;
                var selected = $('#my_multi_select4').find('option:selected');
                var unselected = $('#my_multi_select4').find('option:not(:selected)');
                selected.attr('data-selected', '1');
                $.each(unselected, function(index, value1) {
                    if ($(this).attr('data-selected') == '1') {
                        var value = $(this).val();
                        var res = value.split("*");
                        var id = res[0];
                        $('#id-div' + id).remove();
                        $('#idinput-' + id).remove();
                        $('#mediidinput-' + id).remove();

                    }
                });
                $.each($('select.multi-select1 option:selected'), function() {
                    var value = $(this).val();
                    var res = value.split("*");
                    var unit_price = res[1];
                    var id = res[0];
                    if ($('#idinput-' + id).length) {

                    } else {
                        if ($('#id-div' + id).length) {

                        } else {
                            let html = ''
                            html += '<div class="card remove1" id="id-div' + id + '">'
                            html += '<div class="card-body">'
                            html += '<div class="row name" style="padding-right:30px">'
                            html += '<div class="col-md-12 row mb-4">'
                            html += '<div class="col-md-4 text-right">'
                            html += '<label class="col-form-label">Name</label>'
                            html += '</div>'
                            html += '<div class="col-md-8">'
                            html += '<input type="text" class="form-control pos_element" value="' + res[2] + '" readonly>'
                            html += '</div>'
                            html += '</div>'
                            html += '</div>'
                            html += '<div class="row company" style="padding-right:30px">'
                            html += '<div class="col-md-12 row mb-4">'
                            html += '<div class="col-md-4 text-right">'
                            html += '<label class="col-form-label">Company</label>'
                            html += '</div>'
                            html += '<div class="col-md-8">'
                            html += '<input type="text" class="form-control pos_element" value="' + res[3] + '" readonly>'
                            html += '</div>'
                            html += '</div>'
                            html += '</div>'
                            html += '<div class="row price" style="padding-right:30px">'
                            html += '<div class="col-md-12 row mb-4">'
                            html += '<div class="col-md-4 text-right">'
                            html += '<label class="col-form-label">Price</label>'
                            html += '</div>'
                            html += '<div class="col-md-8">'
                            html += '<input type="text" class="form-control pos_element" value="' + res[1] + '" readonly>'
                            html += '</div>'
                            html += '</div>'
                            html += '</div>'
                            html += '<div class="row current_stock" style="padding-right:30px">'
                            html += '<div class="col-md-12 row mb-4">'
                            html += '<div class="col-md-4 text-right">'
                            html += '<label class="col-form-label">Current Stock</label>'
                            html += '</div>'
                            html += '<div class="col-md-8">'
                            html += '<input type="text" class="form-control pos_element" value="' + res[4] + '" readonly>'
                            html += '</div>'
                            html += '</div>'
                            html += '</div>'
                            html += '<div class="row quantity" style="padding-right:30px">'
                            html += '<div class="col-md-12 row mb-4">'
                            html += '<div class="col-md-4 text-right">'
                            html += '<label class="col-form-label">Quantity</label>'
                            html += '</div>'
                            html += '<div class="col-md-8" id="quantity' + id + '">'
                            html += '</div>'
                            html += '</div>'
                            html += '</div>'
                            html += '</div>'
                            html += '</div>'
                            $("#editPaymentForm .qfloww").append(html)
                        }
                        var input2 = $('<input>').attr({
                            type: 'text',
                            class: "form-control remove",
                            id: 'idinput-' + id,
                            name: 'quantity[]',
                            value: '1',
                        }).appendTo('#editPaymentForm .qfloww #quantity' + id);

                        $('<input>').attr({
                            type: 'hidden',
                            class: "remove",
                            id: 'mediidinput-' + id,
                            name: 'medicine_id[]',
                            value: id,
                        }).appendTo('#editPaymentForm .qfloww #quantity' + id);
                    }

                    $(document).ready(function() {
                        $('#idinput-' + id).keyup(function() {
                            var qty = 0;
                            var total = 0;
                            $.each($('select.multi-select1 option:selected'), function() {
                                var value = $(this).val();
                                var res = value.split("*");
                                var id1 = res[0];
                                qty = $('#idinput-' + id1).val();
                                var ekokk = res[1];
                                total = total + qty * ekokk;
                            });

                            tot = total;

                            var discount = $('#dis_id').val();
                            var gross = tot - discount;
                            $('#editPaymentForm').find('[name="subtotal"]').val(tot).end()
                            $('#editPaymentForm').find('[name="grsss"]').val(gross)
                        });
                    });
                    var curr_val = res[1] * $('#idinput-' + id).val();
                    tot = tot + curr_val;
                });
                var discount = $('#dis_id').val();
                var gross = tot - discount;
                $('#editPaymentForm').find('[name="subtotal"]').val(tot).end()
                $('#editPaymentForm').find('[name="grsss"]').val(gross)
            });
        });
        $(document).ready(function() {
            $('#dis_id').keyup(function() {
                var val_dis = 0;
                var amount = 0;
                var ggggg = 0;
                amount = $('#subtotal').val();
                val_dis = this.value;
                <?php if ($discount_type == 'percentage') { ?>
                    ggggg = amount - amount * val_dis / 100;
                <?php } ?>
                <?php if ($discount_type == 'flat') { ?>
                    ggggg = amount - val_dis;
                <?php } ?>
                $('#editPaymentForm').find('[name="grsss"]').val(ggggg)
            });
        });
    </script>
<?php endif ?>

<?php if ($this->uri->segment(1) == 'email') : ?>
    <script src="common/js/pagescript/autoEmailTemplate.js"></script>
    <script src="common/js/pagescript/sendViewEmail.js"></script>
<?php endif ?>
</body>

</html>