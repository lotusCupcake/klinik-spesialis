<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('appointment'); ?></h1>
        </div>
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
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i> <?php echo lang('add_appointment'); ?></button>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item active">
                            <a class="nav-link active" data-toggle="tab" href="#all"><?php echo lang('all'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#pending"><?php echo lang('pending_confirmation'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#confirmed"><?php echo lang('confirmed'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#treated"><?php echo lang('treated'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#cancelled"><?php echo lang('cancelled'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#requested"><?php echo lang('requested'); ?></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="pending" class="tab-pane">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <div class="space15"></div>
                                    <table class="table table-striped table-bordered" width="100%" id="ap-sample1">
                                        <thead>
                                            <tr>
                                                <th scope="col"> <?php echo lang('id'); ?></th>
                                                <th scope="col"> <?php echo lang('patient'); ?></th>
                                                <th scope="col"> <?php echo lang('doctor'); ?></th>
                                                <th scope="col"> <?php echo lang('date-time'); ?></th>
                                                <th scope="col"> <?php echo lang('remarks'); ?></th>
                                                <th scope="col"> <?php echo lang('status'); ?></th>
                                                <th scope="col"> <?php echo lang('options'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <style>
                                                .img_url {
                                                    height: 20px;
                                                    width: 20px;
                                                    background-size: contain;
                                                    max-height: 20px;
                                                    border-radius: 100px;
                                                }
                                            </style>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="confirmed" class="tab-pane">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <div class="space15"></div>
                                    <table class="table table-striped table-bordered" width="100%" id="ap-sample2">
                                        <thead>
                                            <tr>
                                                <th scope="col"> <?php echo lang('id'); ?></th>
                                                <th scope="col"> <?php echo lang('patient'); ?></th>
                                                <th scope="col"> <?php echo lang('doctor'); ?></th>
                                                <th scope="col"> <?php echo lang('date-time'); ?></th>
                                                <th scope="col"> <?php echo lang('remarks'); ?></th>
                                                <th scope="col"> <?php echo lang('status'); ?></th>
                                                <th scope="col"> <?php echo lang('options'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <style>
                                                .img_url {
                                                    height: 20px;
                                                    width: 20px;
                                                    background-size: contain;
                                                    max-height: 20px;
                                                    border-radius: 100px;
                                                }
                                            </style>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="treated" class="tab-pane">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <div class="space15"></div>
                                    <table class="table table-striped table-bordered" width="100%" id="ap-sample3">
                                        <thead>
                                            <tr>
                                                <th scope="col"> <?php echo lang('id'); ?></th>
                                                <th scope="col"> <?php echo lang('patient'); ?></th>
                                                <th scope="col"> <?php echo lang('doctor'); ?></th>
                                                <th scope="col"> <?php echo lang('date-time'); ?></th>
                                                <th scope="col"> <?php echo lang('remarks'); ?></th>
                                                <th scope="col"> <?php echo lang('status'); ?></th>
                                                <th scope="col"> <?php echo lang('options'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <style>
                                                .img_url {
                                                    height: 20px;
                                                    width: 20px;
                                                    background-size: contain;
                                                    max-height: 20px;
                                                    border-radius: 100px;
                                                }
                                            </style>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="cancelled" class="tab-pane">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <div class="space15"></div>
                                    <table class="table table-striped table-bordered" width="100%" id="ap-sample4">
                                        <thead>
                                            <tr>
                                                <th scope="col"> <?php echo lang('id'); ?></th>
                                                <th scope="col"> <?php echo lang('patient'); ?></th>
                                                <th scope="col"> <?php echo lang('doctor'); ?></th>
                                                <th scope="col"> <?php echo lang('date-time'); ?></th>
                                                <th scope="col"> <?php echo lang('remarks'); ?></th>
                                                <th scope="col"> <?php echo lang('status'); ?></th>
                                                <th scope="col"> <?php echo lang('options'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <style>
                                                .img_url {
                                                    height: 20px;
                                                    width: 20px;
                                                    background-size: contain;
                                                    max-height: 20px;
                                                    border-radius: 100px;
                                                }
                                            </style>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="all" class="tab-pane active">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <div class="space15"></div>
                                    <table class="table table-striped table-bordered" width="100%" id="ap-sample5">
                                        <thead>
                                            <tr>
                                                <th scope="col"> <?php echo lang('id'); ?></th>
                                                <th scope="col"> <?php echo lang('patient'); ?></th>
                                                <th scope="col"> <?php echo lang('doctor'); ?></th>
                                                <th scope="col"> <?php echo lang('date-time'); ?></th>
                                                <th scope="col"> <?php echo lang('remarks'); ?></th>
                                                <th scope="col"> <?php echo lang('status'); ?></th>
                                                <th scope="col"> <?php echo lang('options'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <style>
                                                .img_url {
                                                    height: 20px;
                                                    width: 20px;
                                                    background-size: contain;
                                                    max-height: 20px;
                                                    border-radius: 100px;
                                                }
                                            </style>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="requested" class="tab-pane">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <div class="space15"></div>
                                    <table class="table table-striped table-bordered" width="100%" id="ap-sample6">
                                        <thead>
                                            <tr>
                                                <th scope="col"> <?php echo lang('id'); ?></th>
                                                <th scope="col"> <?php echo lang('patient'); ?></th>
                                                <th scope="col"> <?php echo lang('doctor'); ?></th>
                                                <th scope="col"> <?php echo lang('date-time'); ?></th>
                                                <th scope="col"> <?php echo lang('remarks'); ?></th>
                                                <th scope="col"> <?php echo lang('status'); ?></th>
                                                <th scope="col"> <?php echo lang('options'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <style>
                                                .img_url {
                                                    height: 20px;
                                                    width: 20px;
                                                    background-size: contain;
                                                    max-height: 20px;
                                                    border-radius: 100px;
                                                }
                                            </style>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
<!--sidebar end-->
<!--main content start-->

<!--main content end-->
<!--footer start-->

<!-- Add Appointment Modal-->
<div class="modal fade" role="dialog" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('add_appointment'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="appointment/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><?php echo lang('patient'); ?></label>
                                <select name="patient" id="pos_select" class="form-control pos_select">

                                </select>
                            </div>

                        </div>
                        <div class="pos_client col-md-6 clearfix">
                            <div class="form-group payment pad_bot pull-right">
                                <label for="exampleInputEmail1"><?php echo lang('patient'); ?> <?php echo lang('name'); ?></label>
                                <input type="text" class="form-control pay_in" name="p_name" id="exampleInputEmail1" value='' placeholder="">
                            </div>
                            <div class="form-group payment pad_bot pull-right">
                                <label for="exampleInputEmail1"><?php echo lang('patient'); ?> <?php echo lang('email'); ?></label>
                                <input type="text" class="form-control pay_in" name="p_email" id="exampleInputEmail1" value='' placeholder="">
                            </div>
                            <div class="form-group payment pad_bot pull-right">
                                <label for="exampleInputEmail1"><?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>
                                <input type="text" class="form-control pay_in" name="p_phone" id="exampleInputEmail1" value='' placeholder="">
                            </div>
                            <div class="form-group payment pad_bot pull-right">
                                <label for="exampleInputEmail1"><?php echo lang('patient'); ?> <?php echo lang('age'); ?></label>
                                <input type="text" class="form-control pay_in" name="p_age" id="exampleInputEmail1" value='' placeholder="">
                            </div>
                            <div class="form-group payment pad_bot">
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="doctor"><?php echo lang('doctor'); ?></label>
                                <select name="doctor" id="adoctors" class="form-control">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date"><?php echo lang('date'); ?></label>
                                <input type="date" class="form-control" name="date" id="date" value='' placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="time_slot"><?php echo lang('available_slots'); ?></label>
                                <select name="time_slot" id="aslots" class="form-control">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status"><?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label>
                                <select name="status" class="form-control m-bot15" value=''>
                                    <option value="Pending Confirmation" <?php
                                                                            ?>> <?php echo lang('pending_confirmation'); ?> </option>
                                    <option value="Confirmed" <?php
                                                                ?>> <?php echo lang('confirmed'); ?> </option>
                                    <option value="Treated" <?php
                                                            ?>> <?php echo lang('treated'); ?> </option>
                                    <option value="Cancelled" <?php
                                                                ?>> <?php echo lang('cancelled'); ?> </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang('remarks'); ?></label>
                                <input type="text" class="form-control" name="remarks" value="" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="cmodal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div id='medical_history'>
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add Appointment Modal-->


<!-- Edit Event Modal-->

<div class="modal fade" role="dialog" id="myModal2">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('edit_appointment'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editAppointmentForm" action="appointment/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><?php echo lang('patient'); ?></label>
                                <select name="patient" id="pos_select" class="form-control pos_select">

                                </select>
                            </div>

                        </div>
                        <div class="pos_client col-md-6 clearfix">
                            <div class="form-group payment pad_bot pull-right">
                                <label for="exampleInputEmail1"><?php echo lang('patient'); ?> <?php echo lang('name'); ?></label>
                                <input type="text" class="form-control pay_in" name="p_name" id="exampleInputEmail1" value='' placeholder="">
                            </div>
                            <div class="form-group payment pad_bot pull-right">
                                <label for="exampleInputEmail1"><?php echo lang('patient'); ?> <?php echo lang('email'); ?></label>
                                <input type="text" class="form-control pay_in" name="p_email" id="exampleInputEmail1" value='' placeholder="">
                            </div>
                            <div class="form-group payment pad_bot pull-right">
                                <label for="exampleInputEmail1"><?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>
                                <input type="text" class="form-control pay_in" name="p_phone" id="exampleInputEmail1" value='' placeholder="">
                            </div>
                            <div class="form-group payment pad_bot pull-right">
                                <label for="exampleInputEmail1"><?php echo lang('patient'); ?> <?php echo lang('age'); ?></label>
                                <input type="text" class="form-control pay_in" name="p_age" id="exampleInputEmail1" value='' placeholder="">
                            </div>
                            <div class="form-group payment pad_bot">
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="doctor"><?php echo lang('doctor'); ?></label>
                                <select name="doctor" id="adoctors1" class="form-control">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date"><?php echo lang('date'); ?></label>
                                <input type="date" class="form-control" name="date" id="date1" value='' placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="time_slot"><?php echo lang('available_slots'); ?></label>
                                <select name="time_slot" id="aslots1" class="form-control">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status"><?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label>
                                <select name="status" class="form-control m-bot15" value=''>
                                    <option value="Pending Confirmation" <?php
                                                                            ?>> <?php echo lang('pending_confirmation'); ?> </option>
                                    <option value="Confirmed" <?php
                                                                ?>> <?php echo lang('confirmed'); ?> </option>
                                    <option value="Treated" <?php
                                                            ?>> <?php echo lang('treated'); ?> </option>
                                    <option value="Cancelled" <?php
                                                                ?>> <?php echo lang('cancelled'); ?> </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang('remarks'); ?></label>
                                <input type="text" class="form-control" name="remarks" value="" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" id="appointment_id" value=''>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Event Modal-->

<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".table").on("click", ".editbutton", function() {
            // e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            var id = $(this).attr('data-id');

            $('#editAppointmentForm').trigger("reset");
            $('#myModal2').modal('show');
            $.ajax({
                url: 'appointment/editAppointmentByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function(response) {
                var de = response.appointment.date * 1000;
                var d = new Date(de);
                var da = d.getFullYear() + '-' + ("0"+ (d.getMonth() + 1)).slice(-2) + '-' + d.getDate();
                // Populate the form fields with the data returned from server
                $('#editAppointmentForm').find('[name="id"]').val(response.appointment.id).end()
                $('#editAppointmentForm').find('[name="patient"]').val(response.appointment.patient).end()
                $('#editAppointmentForm').find('[name="doctor"]').val(response.appointment.doctor).end()
                $('#editAppointmentForm').find('[name="date"]').val(da).end()
                $('#editAppointmentForm').find('[name="status"]').val(response.appointment.status).end()
                $('#editAppointmentForm').find('[name="remarks"]').val(response.appointment.remarks).end()

                //$('.js-example-basic-single.doctor').val(response.appointment.doctor).trigger('change');
                // $('.js-example-basic-single.patient').val(response.appointment.patient).trigger('change');
                var option = new Option(response.patient.name + '-' + response.patient.id, response.patient.id, true, true);
                $('#editAppointmentForm').find('[name="patient"]').append(option).trigger('change');
                var option1 = new Option(response.doctor.name + '-' + response.doctor.id, response.doctor.id, true, true);
                $('#editAppointmentForm').find('[name="doctor"]').append(option1).trigger('change');



                var date = $('#date1').val();
                var doctorr = $('#adoctors1').val();
                var appointment_id = $('#appointment_id').val();
                // $('#default').trigger("reset");
                $.ajax({
                    url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + date + '&doctor=' + doctorr + '&appointment_id=' + appointment_id,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                }).success(function(response) {
                    $('#aslots1').find('option').remove();
                    var slots = response.aslots;
                    $.each(slots, function(key, value) {
                        $('#aslots1').append($('<option>').text(value).val(value)).end();
                    });

                    $("#aslots1").val(response.current_value)
                        .find("option[value=" + response.current_value + "]").attr('selected', true);
                    //  $('#aslots1 option[value=' + response.current_value + ']').attr("selected", "selected");
                    //   $("#default-step-1 .button-next").trigger("click");
                    if ($('#aslots1').has('option').length == 0) { //if it is blank. 
                        $('#aslots1').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                    }
                    // Populate the form fields with the data returned from server
                    //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
                });
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".table").on("click", ".history", function() {

            //e.preventDefault(e);
            // Get the record's ID via attribute   
            var iid = $(this).attr('data-id');
            //var id = $(this).attr('data-id');
            console.log(iid);
            $('#editAppointmentForm').trigger("reset");
            $.ajax({
                url: 'patient/getMedicalHistoryByjason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function(response) {
                $('#medical_history').html("");
                $('#medical_history').append(response.view);

            });
            $('#cmodal').modal('show');
        });
    });
</script>



<script>
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
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $("#adoctors").change(function() {
            // Get the record's ID via attribute  
            var iid = $('#date').val();
            var doctorr = $('#adoctors').val();
            $('#aslots').find('option').remove();
            // $('#default').trigger("reset");
            $.ajax({
                url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function(response) {
                var slots = response.aslots;
                $.each(slots, function(key, value) {
                    $('#aslots').append($('<option>').text(value).val(value)).end();
                });
                //   $("#default-step-1 .button-next").trigger("click");
                if ($('#aslots').has('option').length == 0) { //if it is blank. 
                    $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                }
                // Populate the form fields with the data returned from server
                //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
            });
        });

    });

    $(document).ready(function() {
        var iid = $('#date').val();
        var doctorr = $('#adoctors').val();
        $('#aslots').find('option').remove();
        // $('#default').trigger("reset");
        $.ajax({
            url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).success(function(response) {
            var slots = response.aslots;
            $.each(slots, function(key, value) {
                $('#aslots').append($('<option>').text(value).val(value)).end();
            });
            //   $("#default-step-1 .button-next").trigger("click");
            if ($('#aslots').has('option').length == 0) { //if it is blank. 
                $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
            }
            // Populate the form fields with the data returned from server
            //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
        });

    });




    $(document).ready(function() {
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
        var iid = $('#date').val();
        var doctorr = $('#adoctors').val();
        $('#aslots').find('option').remove();
        // $('#default').trigger("reset");
        $.ajax({
            url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).success(function(response) {
            var slots = response.aslots;
            $.each(slots, function(key, value) {
                $('#aslots').append($('<option>').text(value).val(value)).end();
            });
            //   $("#default-step-1 .button-next").trigger("click");
            if ($('#aslots').has('option').length == 0) { //if it is blank. 
                $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
            }


            // Populate the form fields with the data returned from server
            //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
        });

    }
</script>



<script type="text/javascript">
    $(document).ready(function() {
        $("#adoctors1").change(function() {
            // Get the record's ID via attribute 
            var id = $('#appointment_id').val();
            var date = $('#date1').val();
            var doctorr = $('#adoctors1').val();
            $('#aslots1').find('option').remove();
            // $('#default').trigger("reset");
            $.ajax({
                url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + date + '&doctor=' + doctorr + '&appointment_id=' + id,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function(response) {
                var slots = response.aslots;
                $.each(slots, function(key, value) {
                    $('#aslots1').append($('<option>').text(value).val(value)).end();
                });
                //   $("#default-step-1 .button-next").trigger("click");
                if ($('#aslots1').has('option').length == 0) { //if it is blank. 
                    $('#aslots1').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                }
                // Populate the form fields with the data returned from server
                //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
            });
        });
    });

    $(document).ready(function() {
        var id = $('#appointment_id').val();
        var date = $('#date1').val();
        var doctorr = $('#adoctors1').val();
        $('#aslots1').find('option').remove();
        // $('#default').trigger("reset");
        $.ajax({
            url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + date + '&doctor=' + doctorr + '&appointment_id=' + id,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).success(function(response) {
            var slots = response.aslots;
            $.each(slots, function(key, value) {
                $('#aslots1').append($('<option>').text(value).val(value)).end();
            });
            //   $("#default-step-1 .button-next").trigger("click");
            if ($('#aslots1').has('option').length == 0) { //if it is blank. 
                $('#aslots1').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
            }
            // Populate the form fields with the data returned from server
            //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
        });

    });




    $(document).ready(function() {
        $('#date1').datepicker({
                format: "dd-mm-yyyy",
                autoclose: true,
            })
            //Listen for the change even on the input
            .change(dateChanged1)
            .on('changeDate', dateChanged1);
    });

    function dateChanged1() {
        // Get the record's ID via attribute  
        var id = $('#appointment_id').val();
        var iid = $('#date1').val();
        var doctorr = $('#adoctors1').val();
        $('#aslots1').find('option').remove();
        // $('#default').trigger("reset");
        $.ajax({
            url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + iid + '&doctor=' + doctorr + '&appointment_id=' + id,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).success(function(response) {
            var slots = response.aslots;
            $.each(slots, function(key, value) {
                $('#aslots1').append($('<option>').text(value).val(value)).end();
            });
            //   $("#default-step-1 .button-next").trigger("click");
            if ($('#aslots1').has('option').length == 0) { //if it is blank. 
                $('#aslots1').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
            }


            // Populate the form fields with the data returned from server
            //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
        });

    }
</script>

<script>
    $(document).ready(function() {
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            $.fn.dataTable
                .tables({
                    visible: true,
                    api: true
                })
                .columns.adjust()
                .responsive.recalc();
        });
    });
</script>


<script>
    $(document).ready(function() {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>