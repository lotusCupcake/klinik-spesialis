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
</body>

</html>