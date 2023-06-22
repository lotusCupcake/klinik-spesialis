<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
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
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="todays-tab" data-toggle="tab" role="tab" aria-controls="" aria-selected="false" href="#todays"><?php echo lang('todays'); ?> <?php echo lang('appointments'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="patient-tab" data-toggle="tab" role="tab" aria-controls="" aria-selected="false" href="#patient"><?php echo lang('patient'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="prescription-tab" data-toggle="tab" role="tab" aria-controls="" aria-selected="false" href="#prescription"><?php echo lang('prescription'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="schedule-tab" data-toggle="tab" role="tab" aria-controls="" aria-selected="false" href="#schedule"><?php echo lang('schedule'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="holiday-tab" data-toggle="tab" role="tab" aria-controls="" aria-selected="false" href="#holiday"><?php echo lang('holidays'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="myCalendar-tab" data-toggle="tab" role="tab" aria-controls="" aria-selected="true" href="#myCalendar"><?php echo lang('calendar'); ?></a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade" id="todays" role="tabpanel" aria-labelledby="todays-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#addAppointmentModal"><i class="fas fa-plus"></i><?php echo lang('add_new'); ?></button>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered" id="editable-sample">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo lang('date'); ?></th>
                                                            <th><?php echo lang('patient_id'); ?></th>
                                                            <th><?php echo lang('patient'); ?></th>
                                                            <th><?php echo lang('status'); ?></th>
                                                            <th class="no-print"><?php echo lang('options'); ?></th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                        foreach ($todays_appointments as $todays_appointment) {
                                                            $patient_details = $this->patient_model->getPatientById($todays_appointment->patient);
                                                            if (!empty($patient_details)) {
                                                        ?>
                                                                <tr>
                                                                    <td><?php echo date('d-m-Y', $todays_appointment->date); ?></td>
                                                                    <td><?php echo $todays_appointment->patient; ?></td>
                                                                    <td><?php echo $patient_details->name; ?></td>
                                                                    <td><?php echo $todays_appointment->status; ?></td>
                                                                    <td class="no-print">
                                                                        <button type="button" class="btn btn-warning editAppointmentButton" title="<?php echo lang('edit'); ?>" data-toggle="modal" data-id="<?php echo $todays_appointment->id; ?>"><i class="fa fa-edit"></i> </button>
                                                                        <a class="btn btn-danger delete_button" title="<?php echo lang('delete'); ?>" href="appointment/delete?id=<?php echo $todays_appointment->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> </a>
                                                                        <a class="btn btn-info" title="<?php echo lang('history'); ?>" href="patient/medicalHistory?id=<?php echo $todays_appointment->patient; ?>"><i class="fa fa-stethoscope"></i> <?php echo lang('patient'); ?> <?php echo lang('history'); ?></a>
                                                                        <?php if ($todays_appointment->status == 'Confirmed') { ?>
                                                                            <a class="btn btn-success detailsbutton" title=" <?php echo lang('start_live'); ?>" href="meeting/instantLive?id=<?php echo $todays_appointment->id; ?> " target="_blank" onclick="return confirm('Are you sure you want to start a live meeting with this patient? SMS and Email notification will be sent to the Patient.');"><i class="fa fa-headphones"></i> <?php echo lang('live'); ?> </a>
                                                                        <?php } ?>
                                                                    </td>
                                                                </tr>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="patient" role="tabpanel" aria-labelledby="patient-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <?php if (!empty($appointment_patients)) { ?>
                                                    <table class="table table-striped table-bordered" id="editable-sample">
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo lang('patient_id'); ?></th>
                                                                <th><?php echo lang('patient'); ?> <?php echo lang('name'); ?></th>
                                                                <th class="no-print"><?php echo lang('options'); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($appointment_patients as $appointment_patient) {
                                                                $appointed_patient = $this->patient_model->getPatientById($appointment_patient);
                                                            ?>
                                                                <tr class="">

                                                                    <td><?php echo $appointed_patient->id; ?></td>
                                                                    <td><?php echo $appointed_patient->name; ?></td>
                                                                    <td class="no-print">
                                                                        <a class="btn btn-success" title="<?php echo lang('history'); ?>" style="color: #fff;" href="patient/medicalHistory?id=<?php echo $appointed_patient->id; ?>"><i class="fa fa-stethoscope"></i> <?php echo lang('history'); ?></a>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="prescription" role="tabpanel" aria-labelledby="prescription-tab">
                                    <div class="card">
                                        <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                                            <div class="card-header">
                                                <a class="btn btn-icon icon-left btn-primary" href="prescription/addPrescriptionView"><i class="fas fa-plus"></i><?php echo lang('add_new'); ?></a>
                                            </div>
                                        <?php } ?>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered" id="editable-sample">
                                                    <thead>
                                                        <tr>

                                                            <th><?php echo lang('date'); ?></th>
                                                            <th><?php echo lang('patient'); ?></th>
                                                            <th><?php echo lang('medicine'); ?></th>
                                                            <th class="no-print"><?php echo lang('options'); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($prescriptions as $prescription) { ?>
                                                            <tr class="">
                                                                <td><?php echo date('m/d/Y', $prescription->date); ?></td>
                                                                <td><?php echo $this->patient_model->getPatientById($prescription->patient)->name; ?></td>
                                                                <td>

                                                                    <?php
                                                                    if (!empty($prescription->medicine)) {
                                                                        $medicine = explode('###', $prescription->medicine);
                                                                        foreach ($medicine as $key => $value) {
                                                                            $medicine_id = explode('***', $value);
                                                                            $medicine_name_with_dosage = $this->medicine_model->getMedicineById($medicine_id[0])->name . ' -' . $medicine_id[1];
                                                                            $medicine_name_with_dosage = $medicine_name_with_dosage . ' | ' . $medicine_id[3] . ' Days<br>';
                                                                            rtrim($medicine_name_with_dosage, ',');
                                                                            echo '<p>' . $medicine_name_with_dosage . '</p>';
                                                                        }
                                                                    }
                                                                    ?>


                                                                </td>
                                                                <td class="no-print">
                                                                    <a class="btn btn-info btn-xs btn_width" href="prescription/viewPrescription?id=<?php echo $prescription->id; ?>"><i class="fa fa-eye"></i> <?php echo lang('view'); ?></a>
                                                                    <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                                                                        <a class="btn btn-warning btn-xs btn_width" href="prescription/editPrescription?id=<?php echo $prescription->id; ?>" "><i class=" fa fa-edit"></i> <?php echo lang('edit'); ?></a>
                                                                        <a class="btn btn-danger btn-xs btn_width delete_button" href="prescription/delete?id=<?php echo $prescription->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> <?php echo lang('delete'); ?></a>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="schedule" role="tabpanel" aria-labelledby="schedule-tab">
                                    <div class="card">
                                        <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                                            <div class="card-header">
                                                <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#addScheduleModal"><i class="fas fa-plus"></i><?php echo lang('add_new'); ?></button>
                                            </div>
                                        <?php } ?>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered" id="editable-sample">
                                                    <thead>
                                                        <tr>
                                                            <th> # </th>
                                                            <th> <?php echo lang('weekday'); ?></th>
                                                            <th> <?php echo lang('start_time'); ?></th>
                                                            <th> <?php echo lang('end_time'); ?></th>
                                                            <th> <?php echo lang('duration'); ?></th>
                                                            <th> <?php echo lang('options'); ?></th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 0;
                                                        foreach ($schedules as $schedule) {
                                                            $i = $i + 1;
                                                        ?>
                                                            <tr class="">
                                                                <td style="background:#345678; color: #fff;"> <?php echo $i; ?></td>
                                                                <td> <?php echo $schedule->weekday; ?></td>
                                                                <td><?php echo $schedule->s_time; ?></td>
                                                                <td><?php echo $schedule->e_time; ?></td>
                                                                <td><?php echo $schedule->duration * 5 . ' ' . lang('minitues'); ?></td>
                                                                <td>
                                                                    <!--
                                                        <button type="button" class="btn btn-info btn-xs btn_width editbutton" data-toggle="modal" data-id="<?php echo $schedule->id; ?>"><i class="fa fa-edit"></i> <?php echo lang('edit'); ?></button>   
                                                        -->
                                                                    <a class="btn btn-danger delete_button" href="schedule/deleteSchedule?id=<?php echo $schedule->id; ?>&doctor=<?php echo $schedule->doctor; ?>&weekday=<?php echo $schedule->weekday; ?>&all=all" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"> </i> <?php echo lang('delete'); ?></a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="holiday" role="tabpanel" aria-labelledby="holiday-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#holidayModal"><i class="fas fa-plus"></i><?php echo lang('add_new'); ?></button>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered" id="editable-sample">
                                                    <thead>
                                                        <tr>
                                                            <th> # </th>
                                                            <th> <?php echo lang('date'); ?></th>
                                                            <th> <?php echo lang('options'); ?></th>

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
                                                        <?php
                                                        $i = 0;
                                                        foreach ($holidays as $holiday) {
                                                            $i = $i + 1;
                                                        ?>
                                                            <tr class="">
                                                                <td> <?php echo $i; ?></td>
                                                                <td> <?php echo date('d-m-Y', $holiday->date); ?></td>
                                                                <td>
                                                                    <button type="button" class="btn btn-warning editHoliday" data-toggle="modal" data-id="<?php echo $holiday->id; ?>"><i class="fa fa-edit"></i> <?php echo lang('edit'); ?></button>
                                                                    <a class="btn btn-danger delete_button" href="schedule/deleteHoliday?id=<?php echo $holiday->id; ?>&doctor=<?php echo $doctor->id; ?>&redirect=doctor/details" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"> </i> <?php echo lang('delete'); ?></a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show active" id="myCalendar" role="tabpanel" aria-labelledby="myCalendar-tab">
                                    <div class="col-md-12">
                                        <aside class="calendar_ui col-md-12 calendar_ui">
                                            <section class="">
                                                <div class="">
                                                    <div id="calendar" class="has-toolbar calendar_view"></div>
                                                </div>
                                            </section>
                                        </aside>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3><?php echo lang('profile'); ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="user-item">
                                <img alt="image" src="<?= ((!empty($doctor->img_url)) ? $doctor->img_url : base_url() . '/template/assets/img/avatar/avatar-1.png') ?>" width="50%">
                                <div class="user-details">
                                    <div class="user-name"><?php echo $doctor->name; ?></div>
                                    <div class="text-job text-muted"><?php echo $doctor->email; ?></div>
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <label for=""><?php echo lang('doctor_id'); ?></label>
                                <input type="text" class="form-control" value="<?php echo $doctor->id; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for=""><?php echo lang('profile'); ?></label>
                                <input type="text" class="form-control" value="<?php echo $doctor->profile; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for=""><?php echo lang('address'); ?></label>
                                <input type="text" class="form-control" value="<?php echo $doctor->address; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for=""><?php echo lang('phone'); ?></label>
                                <input type="text" class="form-control" value="<?php echo $doctor->phone; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for=""><?php echo lang('email'); ?></label>
                                <input type="text" class="form-control" value="<?php echo $doctor->email; ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--sidebar end-->
<!--main content start-->
<!--main content end-->
<!--footer start-->




<!-- Add Patient Material Modal-->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> <?php echo lang('add'); ?> <?php echo lang('files'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" action="patient/addPatientMaterial" class="clearfix row" method="post" enctype="multipart/form-data">

                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> <?php echo lang('title'); ?></label>
                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> <?php echo lang('file'); ?></label>
                        <input type="file" name="img_url">
                    </div>

                    <input type="hidden" name="patient" value='<?php echo $patient->id; ?>'>

                    <div class="form-group col-md-6">
                        <button type="submit" name="submit" class="btn btn-info"> <?php echo lang('submit'); ?></button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Patient Modal-->


<!-- Add Medical History Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> <?php echo lang('add_medical_history'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" action="patient/addMedicalHistory" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                        <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="date" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3"><?php echo lang('description'); ?></label>
                        <div class="col-md-9">
                            <textarea class="ckeditor form-control" name="description" value="" rows="10"></textarea>
                        </div>
                    </div>

                    <input type="hidden" name="patient_id" value='<?php echo $patient->id; ?>'>
                    <input type="hidden" name="id" value=''>
                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info submit_button">Submit</button>
                    </section>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Medical History Modal-->

<!-- Edit Medical History Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> <?php echo lang('edit_medical_history'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="medical_historyEditForm" action="patient/addMedicalHistory" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                        <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="date" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label col-md-3"><?php echo lang('description'); ?></label>
                        <div class="col-md-9">
                            <textarea class="ckeditor form-control editor" id="editor" name="description" value="" rows="10"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="patient_id" value='<?php echo $patient->id; ?>'>
                    <input type="hidden" name="id" value=''>
                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info submit_button">Submit</button>
                    </section>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="cmodal">
    <div class="modal-dialog modal-dialog-center modal-xl" role="document" style="width: 80%;">
        <div class="modal-content">
            <!--
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('patient') . " " . lang('history'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            -->
            <div id='medical_history'>
                <div class="col-md-12">

                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php
$current_user = $this->ion_auth->get_user_id();
if ($this->ion_auth->in_group('Doctor')) {
    $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
}
?>



<!-- Add Appointment Modal-->
<div class="modal fade" id="addAppointmentModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class=" modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('add_appointment'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" action="appointment/addNew" class="clearfix row" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> <?php echo lang('patient'); ?></label>
                                <select class="form-control pos_select" id="pos_select" name="patient" value=''>
        
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
    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?></label>
                                <select class="form-control" id="adoctors" name="doctor" value=''>
                                    <option value="">Select .....</option>
                                    <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->name; ?> </option>
                                </select>
                                
                            </div>
                        </div>
    
    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> <?php echo lang('date'); ?></label>
                                <input type="date" class="form-control" id="date" name="date" id="exampleInputEmail1" value='' placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 panel">
                            <label class=""><?php echo lang('available_slots'); ?></label>
                            <select class="form-control" name="time_slot" id="aslots" value=''>
    
                            </select>
                        </div>
    
    
                        <div class="col-md-6 panel">
                            <label for="exampleInputEmail1"> <?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label>
                            <select class="form-control" name="status" value=''>
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


                    <div class="row mt-4">
                        <div class="col">
                            <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                            <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                    </div>

                    <br>     
                    <div class="row">
                        <div class="col-md-6 panel">
                            <input type="checkbox" name="sms" value="sms"> <?php echo lang('send_sms') ?><br>
                        </div>
                    </div>                                  

                    <input type="hidden" name="redirect" value='doctor/details'>

                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                    </div>

                </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Appointment Modal-->







<!-- Edit Event Modal-->
<div class="modal fade" id="editAppointmentModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class=" modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('edit_appointment'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" action="appointment/addNew" id="editAppointmentForm" class="clearfix row" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> <?php echo lang('patient'); ?></label>
                                <select class="form-control pos_select" id="pos_select" name="patient" value=''>
        
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
    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?></label>
                                <select class="form-control" id="adoctors" name="doctor" value=''>
                                    <option value="">Select .....</option>
                                    <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->name; ?> </option>
                                </select>
                                
                            </div>
                        </div>
    
    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> <?php echo lang('date'); ?></label>
                                <input type="date" class="form-control" id="date" name="date" id="exampleInputEmail1" value='' placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 panel">
                            <label class=""><?php echo lang('available_slots'); ?></label>
                            <select class="form-control" name="time_slot" id="aslots" value=''>
    
                            </select>
                        </div>
    
    
                        <div class="col-md-6 panel">
                            <label for="exampleInputEmail1"> <?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label>
                            <select class="form-control" name="status" value=''>
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


                    <div class="row mt-4">
                        <div class="col">
                            <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                            <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                    </div>

                    <br>     
                    <div class="row">
                        <div class="col-md-6 panel">
                            <input type="checkbox" name="sms" value="sms"> <?php echo lang('send_sms') ?><br>
                        </div>
                    </div>                                  

                    <input type="hidden" name="redirect" value='doctor/details'>
                    <input type="hidden" name="id" id="appointment_id" value=''>

                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                    </div>

                </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit Event Modal-->


<!-- Add Holiday Modal-->
<div class="modal fade" id="holidayModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('add'); ?> <?php echo lang('holiday'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" action="schedule/addHoliday" class="clearfix row" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group col">
                        <label for="exampleInputEmail1"> <?php echo lang('date'); ?></label>
                        <div class="input-group bootstrap-timepicker">
                            <input type="date" class="form-control default-date-picker" name="date" id="validationCustom01" value='' required="required">
                        </div>
    
                    </div>
                    <input type="hidden" name="doctor" value='<?php echo $doctor->id; ?>'>
                    <input type="hidden" name="redirect" value='doctor/details'>
                    <input type="hidden" name="id" value=''>
                    
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Holiday Modal-->




<!-- Edit Holiday Modal-->
<div class="modal fade" id="editHolidayModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('edit'); ?> <?php echo lang('holiday'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" action="schedule/addHoliday" id="editHolidayForm" class="clearfix row" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group col">
                        <label for="exampleInputEmail1"> <?php echo lang('date'); ?></label>
                        <div class="input-group bootstrap-timepicker">
                            <input type="date" class="form-control default-date-picker" name="date" id="validationCustom01" value='' required="required">
                        </div>
    
                    </div>
                    <input type="hidden" name="doctor" value='<?php echo $doctor->id; ?>'>
                    <input type="hidden" name="redirect" value='doctor/details'>
                    <input type="hidden" name="id" value=''>
                    
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit Holiday Modal-->



<!-- Add Time Slot Modal-->
<div class="modal fade" id="addScheduleModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('add'); ?> <?php echo lang('schedule'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" action="schedule/addSchedule" class="clearfix row" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="col">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> <?php echo lang('weekday'); ?></label>
                                    <select class="form-control" id="weekday" name="weekday" value=''>
                                        <option value="Friday"><?php echo lang('friday') ?></option>
                                        <option value="Saturday"><?php echo lang('saturday') ?></option>
                                        <option value="Sunday"><?php echo lang('sunday') ?></option>
                                        <option value="Monday"><?php echo lang('monday') ?></option>
                                        <option value="Tuesday"><?php echo lang('tuesday') ?></option>
                                        <option value="Wednesday"><?php echo lang('wednesday') ?></option>
                                        <option value="Thursday"><?php echo lang('thursday') ?></option>
                                    </select>
                                </div>
                            </div>
                             
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo lang('start_time') ?></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control timepicker" name="s_time">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo lang('end_time') ?></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control timepicker" name="e_time">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="form-group col-md-5">
                        <label for="exampleInputEmail1"><?php echo lang('appointment') ?> <?php echo lang('duration') ?> </label>
                        <select class="form-control" name="duration" value=''>
    
                            <option value="3" <?php
                                                if (!empty($settings->duration)) {
                                                    if ($settings->duration == '3') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>> 15 Minitues </option>
    
                            <option value="4" <?php
                                                if (!empty($settings->duration)) {
                                                    if ($settings->duration == '4') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>> 20 Minitues </option>
    
                            <option value="6" <?php
                                                if (!empty($settings->duration)) {
                                                    if ($settings->duration == '6') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>> 30 Minitues </option>
    
                            <option value="9" <?php
                                                if (!empty($settings->duration)) {
                                                    if ($settings->duration == '9') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>> 45 Minitues </option>
    
                            <option value="12" <?php
                                                if (!empty($settings->duration)) {
                                                    if ($settings->duration == '12') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>> 60 Minitues </option>
    
                        </select>
                    </div>
    
                    <input type="hidden" name="doctor" value='<?php echo $doctor_id; ?>'>
                    <input type="hidden" name="redirect" value='doctor/details'>
                    <input type="hidden" name="id" value=''>
    
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Time Slot Modal-->





<!-- Edit Time Slot Modal-->
<div class="modal fade" id="editScheduleModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('edit'); ?> <?php echo lang('schedule'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" action="schedule/addSchedule" id="editTimeSlotForm" class="clearfix row" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="col">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> <?php echo lang('weekday'); ?></label>
                                    <select class="form-control" id="weekday" name="weekday" value=''>
                                        <option value="Friday"><?php echo lang('friday') ?></option>
                                        <option value="Saturday"><?php echo lang('saturday') ?></option>
                                        <option value="Sunday"><?php echo lang('sunday') ?></option>
                                        <option value="Monday"><?php echo lang('monday') ?></option>
                                        <option value="Tuesday"><?php echo lang('tuesday') ?></option>
                                        <option value="Wednesday"><?php echo lang('wednesday') ?></option>
                                        <option value="Thursday"><?php echo lang('thursday') ?></option>
                                    </select>
                                </div>
                            </div>
                             
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo lang('start_time') ?></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control timepicker" name="s_time">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo lang('end_time') ?></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control timepicker" name="e_time">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="form-group col-md-5">
                        <label for="exampleInputEmail1"><?php echo lang('appointment') ?> <?php echo lang('duration') ?> </label>
                        <select class="form-control" name="duration" value=''>
    
                            <option value="3" <?php
                                                if (!empty($settings->duration)) {
                                                    if ($settings->duration == '3') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>> 15 Minitues </option>
    
                            <option value="4" <?php
                                                if (!empty($settings->duration)) {
                                                    if ($settings->duration == '4') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>> 20 Minitues </option>
    
                            <option value="6" <?php
                                                if (!empty($settings->duration)) {
                                                    if ($settings->duration == '6') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>> 30 Minitues </option>
    
                            <option value="9" <?php
                                                if (!empty($settings->duration)) {
                                                    if ($settings->duration == '9') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>> 45 Minitues </option>
    
                            <option value="12" <?php
                                                if (!empty($settings->duration)) {
                                                    if ($settings->duration == '12') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>> 60 Minitues </option>
    
                        </select>
                    </div>
    
                    <input type="hidden" name="doctor" value="<?php echo $doctorr; ?>">
                    <input type="hidden" name="redirect" value='doctor/details'>
                    <input type="hidden" name="id" value=''>
    
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit Time Slot Modal-->






<style>
    thead {
        background: #f1f1f1;
        border-bottom: 1px solid #ddd;
    }

    .btn_width {
        margin-bottom: 20px;
    }

    .tab-content {
        padding: 20px 0px;
    }
</style>


<script src="common/js/codearistos.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $(".editScheduleButton").click(function(e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#editTimeSlotForm').trigger("reset");
            $('#editScheduleModal').modal('show');
            $.ajax({
                url: 'schedule/editScheduleByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function(response) {
                // Populate the form fields with the data returned from server
                $('#editTimeSlotForm').find('[name="id"]').val(response.schedule.id).end()
                $('#editTimeSlotForm').find('[name="s_time"]').val(response.schedule.s_time).end()
                $('#editTimeSlotForm').find('[name="e_time"]').val(response.schedule.e_time).end()
                $('#editTimeSlotForm').find('[name="weekday"]').val(response.schedule.weekday).end()
            });
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $(".editbutton").click(function(e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#myModal2').modal('show');
            $.ajax({
                url: 'patient/editMedicalHistoryByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function(response) {
                // Populate the form fields with the data returned from server
                $('#medical_historyEditForm').find('[name="id"]').val(response.medical_history.id).end()
                $('#medical_historyEditForm').find('[name="date"]').val(response.medical_history.date).end()
                CKEDITOR.instances['editor'].setData(response.medical_history.description)
            });
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $(".editPrescription").click(function(e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#myModal5').modal('show');
            $.ajax({
                url: 'prescription/editPrescriptionByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function(response) {
                // Populate the form fields with the data returned from server
                $('#prescriptionEditForm').find('[name="id"]').val(response.prescription.id).end()
                $('#prescriptionEditForm').find('[name="patient"]').val(response.prescription.patient).end()
                $('#prescriptionEditForm').find('[name="doctor"]').val(response.prescription.doctor).end()

                CKEDITOR.instances['editor1'].setData(response.prescription.symptom)
                CKEDITOR.instances['editor2'].setData(response.prescription.medicine)
                CKEDITOR.instances['editor3'].setData(response.prescription.note)
            });
        });
    });
</script>





<script type="text/javascript">
    $(document).ready(function() {
        $(".editHoliday").click(function(e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#editHolidayForm').trigger("reset");
            $('#editHolidayModal').modal('show');
            $.ajax({
                url: 'schedule/editHolidayByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function(response) {
                // Populate the form fields with the data returned from server
                var date = new Date(response.holiday.date * 1000);
                $('#editHolidayForm').find('[name="id"]').val(response.holiday.id).end()
                $('#editHolidayForm').find('[name="date"]').val(date.getFullYear() + '-' + ("0"+(date.getMonth() + 1)) + '-' + date.getDate()).end()
            });
        });
    });
</script>





<script type="text/javascript">
    $(document).ready(function() {
        $(".editAppointmentButton").click(function(e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            var id = $(this).attr('data-id');

            $('#editAppointmentForm').trigger("reset");
            $('#patientregistration').css('display', 'none');
            // $('.pos_client').hide();
            $('#editAppointmentModal').modal('show');
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
                // $('#editAppointmentForm').find('[name="patient"]').val(response.appointment.patient).end()
                $('#editAppointmentForm').find('[name="doctor"]').val(response.appointment.doctor).end()
                $('#editAppointmentForm').find('[name="date"]').val(da).end()
                $('#editAppointmentForm').find('[name="status"]').val(response.appointment.status).end()
                $('#editAppointmentForm').find('[name="remarks"]').val(response.appointment.remarks).end()
                var option = new Option(response.patient.name + '-' + response.patient.id, response.patient.id, true, true);
                $('#editAppointmentForm').find('[name="patient"]').append(option).trigger('change');
                $('.js-example-basic-single.doctor').val(response.appointment.doctor).trigger('change');
                //  $('.js-example-basic-single.patient').val(response.appointment.patient).trigger('change');




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
        var table = $('#editable-sample').DataTable({
            responsive: true,
            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",

            buttons: [{
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [0, 1],
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1],
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: [0, 1],
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1],
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1],
                    }
                },
            ],
            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: -1,
            "order": [
                [0, "desc"]
            ],
            "language": {
                "lengthMenu": "_MENU_",
                search: "_INPUT_",
                searchPlaceholder: "Search..."
            },
        });

        table.buttons().container()
            .appendTo('.custom_buttons');
    });
</script>



<script>
    $(document).ready(function() {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>