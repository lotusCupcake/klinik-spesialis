<!--sidebar end-->
<!--main content start-->
<div class="main-content no-print">
    <section class="section">
        <div class="section-header">
            <h1>
            <?php
                if (!empty($appointment->id))
                    echo lang('edit_appointment');
                else
                    echo lang('add_appointment');
            ?>
            </h1>
        </div>
        <style>
                .panel{
                    background: transparent;
                }

                .payment_label {
                    margin-left: -2%;
                }

            </style>
        <?php
        $message = $this->session->flashdata('feedback');
        if (!empty($message)) {
        ?>
            <div class="alert alert-primary alert-has-icon alert-dismissible show fade">
                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <div class="alert-title">Info!</div>
                    <?= $message ?>
                </div>
            </div>
        <?php } ?>

        <div class="section-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form role="form" action="appointment/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for=""><?php echo lang('patient'); ?></label>
                                    <select name="patient" id="pos_select" class="form-control pos_select">
                                    <?php if (!empty($patients)) { ?>
                                        <option value="<?php echo $patients->id; ?>" selected="selected"><?php echo $patients->name; ?> - <?php echo $patients->id; ?></option>  
                                    <?php } ?>
                                    </select>
                                </div>
                                <div class="pos_client col-md-6 clearfix">
                                    <div class="form-group payment pad_bot pull-right">
                                        <label for="exampleInputEmail1"><?php echo lang('patient'); ?> <?php echo lang('name'); ?></label>
                                        <input type="text" class="form-control pay_in" name="p_name" id="exampleInputEmail1" value='<?php
                                        if (!empty($payment->p_name)) {
                                            echo $payment->p_name;
                                        }
                                        ?>' placeholder="">
                                    </div>
                                    <div class="form-group payment pad_bot pull-right">
                                        <label for="exampleInputEmail1"><?php echo lang('patient'); ?> <?php echo lang('email'); ?></label>
                                        <input type="text" class="form-control pay_in" name="p_email" id="exampleInputEmail1" value='<?php
                                        if (!empty($payment->p_email)) {
                                            echo $payment->p_email;
                                        }
                                        ?>' placeholder="">
                                    </div>
                                    <div class="form-group payment pad_bot pull-right">
                                        <label for="exampleInputEmail1"><?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>
                                        <input type="text" class="form-control pay_in" name="p_phone" id="exampleInputEmail1" value='<?php
                                        if (!empty($payment->p_phone)) {
                                            echo $payment->p_phone;
                                        }
                                        ?>' placeholder="">
                                    </div>
                                    <div class="form-group payment pad_bot pull-right">
                                        <label for="exampleInputEmail1"><?php echo lang('patient'); ?> <?php echo lang('age'); ?></label>
                                        <input type="text" class="form-control pay_in" name="p_age" id="exampleInputEmail1" value='<?php
                                        if (!empty($payment->p_age)) {
                                            echo $payment->p_age;
                                        }
                                        ?>' placeholder="">
                                    </div>
                                    <div class="form-group payment pad_bot pull-right">
                                        <label for="exampleInputEmail1"><?php echo lang('patient'); ?> <?php echo lang('gender'); ?></label>
                                        <select name="p_gender" class="form-control">
                                            <option value="Male" <?php
                                                                    if (!empty($patient->sex)) {
                                                                        if ($patient->sex == 'Male') {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    ?>> Male </option>
                                            <option value="Female" <?php
                                                                    if (!empty($patient->sex)) {
                                                                        if ($patient->sex == 'Female') {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    ?>> Female </option>
                                            <option value="Others" <?php
                                                                    if (!empty($patient->sex)) {
                                                                        if ($patient->sex == 'Others') {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    ?>> Others </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="doctor"><?php echo lang('doctor'); ?></label>
                                    <select name="doctor" id="adoctors" class="form-control">
                                    <?php if (!empty($doctors)) { ?>
                                        <option value="<?php echo $doctors->id; ?>" selected="selected"><?php echo $doctors->name; ?> - <?php echo $doctors->id; ?></option>  
                                    <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="date"><?php echo lang('date'); ?></label>
                                    <input type="date" class="form-control" name="date" id="date" value='<?php
                                    if (!empty($appointment->date)) {
                                        echo date('d-m-Y', $appointment->date);
                                    }
                                    ?>' placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="time_slot"><?php echo lang('available_slots'); ?></label>
                                    <select name="time_slot" id="aslots" class="form-control">

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><?php echo lang('remarks'); ?></label>
                                    <input type="text" class="form-control" name="remarks" value="<?php
                                    if (!empty($appointment->remarks)) {
                                        echo $appointment->remarks;
                                    }
                                    ?>" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="status"><?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label>
                                    <select name="status" class="form-control m-bot15" value=''>
                                        <option value="Pending Confirmation" <?php
                                        if (!empty($appointment->status)) {
                                            if ($appointment->status == 'Pending Confirmation') {
                                                echo 'selected';
                                            }
                                        }
                                        ?> > <?php echo lang('pending_confirmation'); ?> </option> 
                                        <option value="Confirmed" <?php
                                        if (!empty($appointment->status)) {
                                            if ($appointment->status == 'Confirmed') {
                                                echo 'selected';
                                            }
                                        }
                                        ?> > <?php echo lang('confirmed'); ?> </option>
                                        <option value="Treated" <?php
                                        if (!empty($appointment->status)) {
                                            if ($appointment->status == 'Treated') {
                                                echo 'selected';
                                            }
                                        }
                                        ?> > <?php echo lang('treated'); ?> </option>
                                        <option value="cancelled" <?php
                                        if (!empty($appointment->status)) {
                                            if ($appointment->status == 'Treated') {
                                                echo 'selected';
                                            }
                                        }
                                        ?> > <?php echo lang('cancelled'); ?> </option>
                                    </select>
                                </div>
                                
                                <input type="hidden" name="id" id="appointment_id" value='<?php
                                if (!empty($appointment->id)) {
                                    echo $appointment->id;
                                }
                                ?>'>
                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary submit_button float-right mb-4"><?php echo lang('submit'); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!--main content end-->
<!--footer start-->


<script src="common/js/codearistos.min.js"></script>

<script>
    $(document).ready(function () {
        $('.pos_client').hide();
        $(document.body).on('change', '#pos_select', function () {

            var v = $("select.pos_select option:selected").val()
            if (v == 'add_new') {
                $('.pos_client').show();
            } else {
                $('.pos_client').hide();
            }
        });

    });


</script>


<?php if (!empty($appointment->id)) { ?>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#adoctors").change(function () {
                // Get the record's ID via attribute  
                var id = $('#appointment_id').val();
                var date = $('#date').val();
                var doctorr = $('#adoctors').val();
                $('#aslots').find('option').remove();
                // $('#default').trigger("reset");
                $.ajax({
                    url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + date + '&doctor=' + doctorr + '&appointment_id=' + id,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                }).success(function (response) {
                    var slots = response.aslots;
                    $.each(slots, function (key, value) {
                        $('#aslots').append($('<option>').text(value).val(value)).end();
                    });
                    //   $("#default-step-1 .button-next").trigger("click");
                    if ($('#aslots').has('option').length == 0) {                    //if it is blank. 
                        $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                    }
                    // Populate the form fields with the data returned from server
                    //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
                });
            });

        });

        $(document).ready(function () {
            var id = $('#appointment_id').val();
            var date = $('#date').val();
            var doctorr = $('#adoctors').val();
            $('#aslots').find('option').remove();
            // $('#default').trigger("reset");
            $.ajax({
                url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + date + '&doctor=' + doctorr + '&appointment_id=' + id,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                var slots = response.aslots;
                $.each(slots, function (key, value) {
                    $('#aslots').append($('<option>').text(value).val(value)).end();
                });

                $("#aslots").val(response.current_value)
                        .find("option[value=" + response.current_value + "]").attr('selected', true);

                //   $("#default-step-1 .button-next").trigger("click");
                if ($('#aslots').has('option').length == 0) {                    //if it is blank. 
                    $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                }
                // Populate the form fields with the data returned from server
                //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
            });

        });




        $(document).ready(function () {
            $('#date').datepicker({
                format: "dd-mm-yyyy",
                autoclose: true,
            })
                    //Listen for the change even on the input
                    .change(dateChanged)
                    .on('changeDate', dateChanged);
        });

        function dateChanged() {
            // Get the record's ID via attribute  
            var id = $('#appointment_id').val();
            var date = $('#date').val();
            var doctorr = $('#adoctors').val();
            $('#aslots').find('option').remove();
            // $('#default').trigger("reset");
            $.ajax({
                url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + date + '&doctor=' + doctorr + '&appointment_id=' + id,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                var slots = response.aslots;
                $.each(slots, function (key, value) {
                    $('#aslots').append($('<option>').text(value).val(value)).end();
                });
                //   $("#default-step-1 .button-next").trigger("click");
                if ($('#aslots').has('option').length == 0) {                    //if it is blank. 
                    $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                }


                // Populate the form fields with the data returned from server
                //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
            });

        }




    </script>

<?php } else { ?> 

    <script type="text/javascript">
        $(document).ready(function () {
            $("#adoctors").change(function () {
                // Get the record's ID via attribute  
                var id = $('#appointment_id').val();
                var date = $('#date').val();
                var doctorr = $('#adoctors').val();
                $('#aslots').find('option').remove();
                // $('#default').trigger("reset");
                $.ajax({
                    url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + date + '&doctor=' + doctorr,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                }).success(function (response) {
                    var slots = response.aslots;
                    $.each(slots, function (key, value) {
                        $('#aslots').append($('<option>').text(value).val(value)).end();
                    });
                    //   $("#default-step-1 .button-next").trigger("click");
                    if ($('#aslots').has('option').length == 0) {                    //if it is blank. 
                        $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                    }
                    // Populate the form fields with the data returned from server
                    //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
                });
            });

        });

        $(document).ready(function () {
            var id = $('#appointment_id').val();
            var date = $('#date').val();
            var doctorr = $('#adoctors').val();
            $('#aslots').find('option').remove();
            // $('#default').trigger("reset");
            $.ajax({
                url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + date + '&doctor=' + doctorr,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                var slots = response.aslots;
                $.each(slots, function (key, value) {
                    $('#aslots').append($('<option>').text(value).val(value)).end();
                });

                $("#aslots").val(response.current_value)
                        .find("option[value=" + response.current_value + "]").attr('selected', true);

                //   $("#default-step-1 .button-next").trigger("click");
                if ($('#aslots').has('option').length == 0) {                    //if it is blank. 
                    $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                }
                // Populate the form fields with the data returned from server
                //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
            });

        });




        $(document).ready(function () {
            $('#date').datepicker({
                format: "dd-mm-yyyy",
                autoclose: true,
            })
                    //Listen for the change even on the input
                    .change(dateChanged)
                    .on('changeDate', dateChanged);
        });

        function dateChanged() {
            // Get the record's ID via attribute  
            var id = $('#appointment_id').val();
            var date = $('#date').val();
            var doctorr = $('#adoctors').val();
            $('#aslots').find('option').remove();
            // $('#default').trigger("reset");
            $.ajax({
                url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + date + '&doctor=' + doctorr,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                var slots = response.aslots;
                $.each(slots, function (key, value) {
                    $('#aslots').append($('<option>').text(value).val(value)).end();
                });
                //   $("#default-step-1 .button-next").trigger("click");
                if ($('#aslots').has('option').length == 0) {                    //if it is blank. 
                    $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                }


                // Populate the form fields with the data returned from server
                //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
            });

        }

    </script>

<?php } ?>

<script>
    $(document).ready(function () {
        $("#pos_select").select2({
            placeholder: '<?php echo lang('select_patient'); ?>',
            allowClear: true,
            ajax: {
                url: 'patient/getPatientinfoWithAddNewOption',
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

        $("#adoctors").select2({
            placeholder: '<?php echo lang('select_doctor'); ?>',
            allowClear: true,
            ajax: {
                url: 'doctor/getDoctorInfo',
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
</script>






