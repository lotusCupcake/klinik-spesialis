<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('history'); ?> <?php echo lang('patient'); ?></h1>
        </div>
        <?php
        $message = $this->session->flashdata('feedback');
        if (!empty($message)) {
        ?><div class="alert alert-primary alert-has-icon alert-dismissible show fade">
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
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="user-item">
                                <img alt="image" src="<?= ((!empty($patient->img_url)) ? $patient->img_url : base_url() . '/template/assets/img/avatar/avatar-1.png') ?>" width="50%">
                                <div class="user-details">
                                    <div class="user-name"><?php echo $patient->name; ?></div>
                                    <div class="text-job text-muted"><?php echo $patient->email; ?></div>
                                    <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                        <div class="user-cta">
                                            <button class="btn btn-primary btn_width editPatient" data-id="<?php echo $patient->id; ?>"><?php echo lang('edit'); ?></button>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <label for=""><?php echo lang('patient_id'); ?></label>
                                <input type="text" class="form-control" value="<?php echo $patient->id; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for=""><?php echo lang('gender'); ?></label>
                                <input type="text" class="form-control" value="<?php echo $patient->sex; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for=""><?php echo lang('gender'); ?></label>
                                <input type="text" class="form-control" value="<?php echo $patient->sex; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for=""><?php echo lang('birth_date'); ?></label>
                                <input type="text" class="form-control" value="<?php echo $patient->birthdate; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for=""><?php echo lang('phone'); ?></label>
                                <input type="text" class="form-control" value="<?php echo $patient->phone; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for=""><?php echo lang('email'); ?></label>
                                <input type="text" class="form-control" value="<?php echo $patient->email; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for=""><?php echo lang('address'); ?></label>
                                <input type="text" class="form-control" value="<?php echo $patient->address; ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="appointments-tab" data-toggle="tab" href="#appointments" role="tab" aria-controls="appointments" aria-selected="true"><?php echo lang('appointments'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false"><?php echo lang('case_history'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false"><?php echo lang('prescription'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="lab-tab" data-toggle="tab" href="#lab" role="tab" aria-controls="lab" aria-selected="false"><?php echo lang('lab'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><?php echo lang('documents'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="timeline-tab" data-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="false"><?php echo lang('timeline'); ?></a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="appointments" role="tabpanel" aria-labelledby="appointments-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#addAppointmentModal"><i class="fas fa-plus"></i><?= (!$this->ion_auth->in_group('Patient') ? lang('add_new') : lang('request_a_appointment')); ?></button>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <div class="space15"></div>
                                                <table class="table table-striped table-bordered" id="editable-sample">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo lang('date'); ?></th>
                                                            <th><?php echo lang('time_slot'); ?></th>
                                                            <th><?php echo lang('doctor'); ?></th>
                                                            <th><?php echo lang('status'); ?></th>
                                                            <?php if (!$this->ion_auth->in_group('Patient')) { ?>
                                                                <th class="no-print"><?php echo lang('options'); ?></th>
                                                            <?php } ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($appointments as $appointment) { ?>
                                                            <tr class="">

                                                                <td><?php echo date('d-m-Y', $appointment->date); ?></td>
                                                                <td><?php echo $appointment->time_slot; ?></td>
                                                                <td>
                                                                    <?php
                                                                    $doctor_details = $this->doctor_model->getDoctorById($appointment->doctor);
                                                                    if (!empty($doctor_details)) {
                                                                        $appointment_doctor = $doctor_details->name;
                                                                    } else {
                                                                        $appointment_doctor = '';
                                                                    }
                                                                    echo $appointment_doctor;
                                                                    ?>
                                                                </td>
                                                                <td><?php
                                                                    if ($appointment->status == 'Pending Confirmation') {
                                                                        $appointment_status = lang('pending_confirmation');
                                                                    } elseif ($appointment->status == 'Confirmed') {
                                                                        $appointment_status = lang('confirmed');
                                                                    } elseif ($appointment->status == 'Treated') {
                                                                        $appointment_status = lang('treated');
                                                                    } elseif ($appointment->status == 'Cancelled') {
                                                                        $appointment_status = lang('cancelled');
                                                                    } elseif ($appointment->status == 'Requested') {
                                                                        $appointment_status = lang('requested');
                                                                    }
                                                                    echo $appointment_status;
                                                                    ?></td>
                                                                <?php if (!$this->ion_auth->in_group('Patient')) { ?>
                                                                    <td class="no-print">
                                                                        <button type="button" class="btn btn-info btn-xs btn_width editAppointmentButton" title="<?php echo lang('edit'); ?>" data-toggle="modal" data-id="<?php echo $appointment->id; ?>"><i class="fa fa-edit"></i> </button>
                                                                        <a title="<?php echo lang('delete'); ?>" href="appointment/delete?id=<?php echo $appointment->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><button class="btn btn-icon icon-left btn-danger btn_width delete_button"><i class="fa fa-trash"></i></button></a>
                                                                    </td>
                                                                <?php } ?>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <button class="btn btn-icon icon-left btn-primary btn_width" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i><?= lang('add_new'); ?></button>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <div class="space15"></div>
                                                <table class="table table-striped table-bordered" id="editable-sample">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo lang('date'); ?></th>
                                                            <th><?php echo lang('title'); ?></th>
                                                            <th><?php echo lang('description'); ?></th>
                                                            <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                                                <th class="no-print" width="15%"><?php echo lang('options'); ?></th>
                                                            <?php } ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($medical_histories as $medical_history) { ?>
                                                            <tr class="">

                                                                <td><?php echo date('d-m-Y', $medical_history->date); ?></td>
                                                                <td><?php echo $medical_history->title; ?></td>
                                                                <td><?php echo $medical_history->description; ?></td>
                                                                <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                                                    <td class="no-print">
                                                                        <button type="button" class="btn btn-info btn-xs btn_width editbutton" title="<?php echo lang('edit'); ?>" data-toggle="modal" data-id="<?php echo $medical_history->id; ?>"><i class="fa fa-edit"></i> </button>
                                                                        <a title="<?php echo lang('delete'); ?>" href="patient/deleteCaseHistory?id=<?php echo $medical_history->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><button class="btn btn-icon icon-left btn-danger btn_width delete_button"><i class="fa fa-trash"></i></button></a>
                                                                    </td>
                                                                <?php } ?>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="prescription/addPrescriptionView"><button class="btn btn-icon icon-left btn-primary btn_width btn-xs"><i class="fas fa-plus"></i><?= lang('add_new'); ?></button></a>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <div class="space15"></div>
                                                <table class="table table-striped table-bordered" id="editable-sample">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo lang('date'); ?></th>
                                                            <th><?php echo lang('doctor'); ?></th>
                                                            <th><?php echo lang('medicine'); ?></th>
                                                            <th class="no-print"><?php echo lang('options'); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($prescriptions as $prescription) { ?>
                                                            <tr class="">
                                                                <td><?php echo date('m/d/Y', $prescription->date); ?></td>
                                                                <td>
                                                                    <?php
                                                                    $doctor_details = $this->doctor_model->getDoctorById($prescription->doctor);
                                                                    if (!empty($doctor_details)) {
                                                                        $prescription_doctor = $doctor_details->name;
                                                                    } else {
                                                                        $prescription_doctor = '';
                                                                    }
                                                                    echo $prescription_doctor;
                                                                    ?>

                                                                </td>
                                                                <td>

                                                                    <?php
                                                                    if (!empty($prescription->medicine)) {
                                                                        $medicine = explode('###', $prescription->medicine);

                                                                        foreach ($medicine as $key => $value) {
                                                                            $medicine_id = explode('***', $value);
                                                                            $medicine_details = $this->medicine_model->getMedicineById($medicine_id[0]);
                                                                            if (!empty($medicine_details)) {
                                                                                $medicine_name_with_dosage = $medicine_details->name . ' -' . $medicine_id[1];
                                                                                $medicine_name_with_dosage = $medicine_name_with_dosage . ' | ' . $medicine_id[3] . '<br>';
                                                                                rtrim($medicine_name_with_dosage, ',');
                                                                                echo '<p>' . $medicine_name_with_dosage . '</p>';
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td class="no-print">
                                                                    <a href="prescription/viewPrescription?id=<?php echo $prescription->id; ?>"><button class="btn btn-icon icon-left btn-info btn_width"><i class="fas fa-eye"></i><?= lang('view'); ?></button></a>
                                                                    <?php
                                                                    if ($this->ion_auth->in_group('Doctor')) {
                                                                        $current_user = $this->ion_auth->get_user_id();
                                                                        $doctor_table_id = $this->doctor_model->getDoctorByIonUserId($current_user)->id;
                                                                        if ($prescription->doctor == $doctor_table_id) {
                                                                    ?>
                                                                            <a href="prescription/editPrescription?id=<?php echo $prescription->id; ?>"><button class="btn btn-icon icon-left btn-light btn_width"><i class="fas fa-edit"></i><?= lang('edit'); ?></button></a>
                                                                            <a title="<?php echo lang('delete'); ?>" href="prescription/delete?id=<?php echo $prescription->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><button class="btn btn-icon icon-left btn-danger btn_width delete_button"><i class="fa fa-trash"></i> <?php echo lang('delete'); ?></button></a>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                    <a href="prescription/viewPrescriptionPrint?id=<?php echo $prescription->id; ?>" target="_blank"><button class="btn btn-icon icon-left btn-success invoicebutton"><i class="fas fa-print"></i><?= lang('print'); ?></button></a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="lab" role="tabpanel" aria-labelledby="lab-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <div class="space15"></div>
                                                <table class="table table-striped table-bordered" id="editable-sample">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo lang('id'); ?></th>
                                                            <th><?php echo lang('date'); ?></th>
                                                            <th><?php echo lang('doctor'); ?></th>
                                                            <th class="no-print"><?php echo lang('options'); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($labs as $lab) { ?>
                                                            <tr class="">
                                                                <td><?php echo $lab->id; ?></td>
                                                                <td><?php echo date('m/d/Y', $lab->date); ?></td>
                                                                <td>
                                                                    <?php
                                                                    $doctor_details = $this->doctor_model->getDoctorById($lab->doctor);
                                                                    if (!empty($doctor_details)) {
                                                                        $lab_doctor = $doctor_details->name;
                                                                    } else {
                                                                        $lab_doctor = '';
                                                                    }
                                                                    echo $lab_doctor;
                                                                    ?>
                                                                </td>
                                                                <td class="no-print">
                                                                    <a href="lab/invoice?id=<?php echo $lab->id; ?>"><button class="btn btn-icon icon-left btn-info btn_width"><i class="fas fa-eye"></i><?= lang('report'); ?></button></a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="">
                                                <?php foreach ($patient_materials as $patient_material) { ?>
                                                    <div class="col-md-2">
                                                        <article class="article">
                                                            <div class="article-header">
                                                                <a href="<?php echo $patient_material->url; ?>" target="_blank">
                                                                    <?php
                                                                    $extension_url = explode(".", $patient_material->url);

                                                                    $length = count($extension_url);
                                                                    $extension = $extension_url[$length - 1];

                                                                    if (strtolower($extension) == 'pdf') {
                                                                    ?>
                                                                        <div class="article-image" data-background="uploads/image/pdf.png">
                                                                        <?php
                                                                    } elseif (strtolower($extension) == 'docx') {
                                                                        ?>
                                                                            <div class="article-image" data-background="uploads/image/docx.png">
                                                                            <?php
                                                                        } elseif (strtolower($extension) == 'doc') {
                                                                            ?>
                                                                                <div class="article-image" data-background="uploads/image/doc.png">
                                                                                <?php
                                                                            } elseif (strtolower($extension) == 'odt') {
                                                                                ?>
                                                                                    <div class="article-image" data-background="uploads/image/odt.png">
                                                                                    <?php } else {
                                                                                    ?>
                                                                                        <div class="article-image" data-background="<?php echo $patient_material->url; ?>">
                                                                                        <?php }
                                                                                        ?>
                                                                                        </div>
                                                                </a>
                                                            </div>
                                                            <div class="article-details">
                                                                <p> <?php
                                                                    if (!empty($patient_material->title)) {
                                                                        echo $patient_material->title;
                                                                    }
                                                                    ?></p>
                                                                <div class="article-cta">
                                                                    <a href="<?php echo $patient_material->url; ?>" download class="btn btn-success"><i class="fas fa-file"></i></a>
                                                                    <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                                                        <a href="patient/deletePatientMaterial?id=<?php echo $patient_material->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="activities">
                                                <?php
                                                if (!empty($timeline)) {
                                                    krsort($timeline);
                                                    foreach ($timeline as $key => $value) {
                                                        echo $value;
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" role="dialog" id="infoModal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('edit_patient'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="patient/addNew" id="editPatientForm" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                                <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='' placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('change'); ?> <?php echo lang('password'); ?></label>
                                <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                                <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                                <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='' placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang('sex'); ?></label>
                                <select class="form-control select2" name="sex">
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
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang('birth_date'); ?></label>
                                <input type="date" class="form-control" name="birthdate" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang('blood_group'); ?></label>
                                <select class="form-control select2" name="bloodgroup">
                                    <?php foreach ($groups as $group) { ?>
                                        <option value="<?php echo $group->group; ?>" <?php
                                                                                        if (!empty($patient->bloodgroup)) {
                                                                                            if ($group->group == $patient->bloodgroup) {
                                                                                                echo 'selected';
                                                                                            }
                                                                                        }
                                                                                        ?>> <?php echo $group->group; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="doctorchoose"><?php echo lang('doctor'); ?></label>
                                <select class="form-control" id="doctorchoose" name="doctor" value=''></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image Upload</label>
                                <div class="">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="<?= base_url() . '/template/assets/img/news/img01.jpg' ?>" id="img" alt="" />
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        <div>
                                            <span class="btn btn-white btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" name="img_url" />
                                            </span>
                                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="sms" value="sms">
                                <label class="form-check-label">
                                    <?php echo lang('send_sms') ?>
                                </label>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" value=''>
                    <input type="hidden" name="p_id" value='<?php
                                                            if (!empty($patient->patient_id)) {
                                                                echo $patient->patient_id;
                                                            }
                                                            ?>'>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class=" modal fade" role="dialog" id="addAppointmentModal">
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
                                <select name="patient" id="pos_select" class="form-control pos_select select2">
                                    <option value="">Select .....</option>
                                    <option value="<?php echo $patient->id; ?>"><?php echo $patient->name; ?> </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="doctor"><?php echo lang('doctor'); ?></label>
                                <select name="doctor" id="adoctors" class="form-control select2">
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
                                <select name="time_slot" id="aslots" class="form-control select2">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status"><?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label>
                                <select name="status" class="form-control m-bot15 select2" value=''>
                                    <option value="Pending Confirmation"><?php echo lang('pending_confirmation'); ?></option>
                                    <option value="Confirmed"><?php echo lang('confirmed'); ?></option>
                                    <option value="Treated"><?php echo lang('treated'); ?></option>
                                    <option value="Cancelled"><?php echo lang('cancelled'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang('remarks'); ?></label>
                                <input type="text" class="form-control" name="remarks" value="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="sms" value="sms">
                                <label class="form-check-label">
                                    <?php echo lang('send_sms') ?>
                                </label>
                            </div>
                        </div>
                        <input type="hidden" name="redirect" value='patient/medicalHistory?id=<?php echo $patient->id; ?>'>

                        <input type="hidden" name="request" value='<?php
                                                                    if ($this->ion_auth->in_group(array('Patient'))) {
                                                                        echo 'Yes';
                                                                    }
                                                                    ?>'>
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

<div class="modal fade" role="dialog" id="editAppointmentModal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('edit_appointment'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="appointment/addNew" id="editAppointmentForm" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><?php echo lang('patient'); ?></label>
                                <select name="patient" id="pos_select" class="form-control js-example-basic-single patient pos_select select2">
                                    <option value="">Select .....</option>
                                    <option value="<?php echo $patient->id; ?>"><?php echo $patient->name; ?> </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="doctor"><?php echo lang('doctor'); ?></label>
                                <select name="doctor" id="adoctors1" class="form-control select2">
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
                                <select name="time_slot" id="aslots1" class="form-control select2">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status"><?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label>
                                <select name="status" class="form-control m-bot15 select2" value=''>
                                    <?php if (!$this->ion_auth->in_group('Patient')) { ?>
                                        <option value="Pending Confirmation" <?php ?>> <?php echo lang('pending_confirmation'); ?> </option>
                                        <option value="Confirmed" <?php
                                                                    ?>> <?php echo lang('confirmed'); ?> </option>
                                        <option value="Treated" <?php
                                                                ?>> <?php echo lang('treated'); ?> </option>
                                        <option value="Cancelled" <?php ?>> <?php echo lang('cancelled'); ?> </option>
                                    <?php } else { ?>
                                        <option value="Requested" <?php ?>> <?php echo lang('requested'); ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang('remarks'); ?></label>
                                <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="sms" value="sms">
                                <label class="form-check-label">
                                    <?php echo lang('send_sms') ?>
                                </label>
                            </div>
                        </div>
                        <input type="hidden" name="redirect" value='patient/medicalHistory?id=<?php echo $patient->id; ?>'>>
                        <input type="hidden" name="id" id="appointment_id" value=''>
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

<div class="modal fade" role="dialog" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('add_case'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="patient/addMedicalHistory" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                            <input type="date" class="form-control" name="date" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"><?php echo lang('title'); ?></label>
                            <input type="text" class="form-control" name="title" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=""><?php echo lang('case'); ?></label>
                        <textarea class="form-control ckeditor" name="description" value="" rows="70" cols="70"></textarea>
                    </div>
                    <input type="hidden" name="patient_id" value='<?php echo $patient->id; ?>'>
                    <input type="hidden" name="id" value=''>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="myModal2">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('add_case'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="patient/addMedicalHistory" id="medical_historyEditForm" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                            <input type="date" class="form-control" name="date" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"><?php echo lang('title'); ?></label>
                            <input type="text" class="form-control" name="title" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=""><?php echo lang('case'); ?></label>
                        <textarea class="form-control ckeditor" name="description" id="editor" value="" rows="70" cols="70"></textarea>
                    </div>
                    <input type="hidden" name="patient_id" value='<?php echo $patient->id; ?>'>
                    <input type="hidden" name="id" value=''>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="common/js/codearistos.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".editPatient").click(function() {
            //    e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#editPatientForm').trigger("reset");
            $("#img").attr("src", "template/assets/img/news/img01.jpg");
            $.ajax({
                url: 'patient/editPatientByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function(response) {
                // Populate the form fields with the data returned from server

                $('#editPatientForm').find('[name="id"]').val(response.patient.id).end()
                $('#editPatientForm').find('[name="name"]').val(response.patient.name).end()
                $('#editPatientForm').find('[name="password"]').val(response.patient.password).end()
                $('#editPatientForm').find('[name="email"]').val(response.patient.email).end()
                $('#editPatientForm').find('[name="address"]').val(response.patient.address).end()
                $('#editPatientForm').find('[name="phone"]').val(response.patient.phone).end()
                $('#editPatientForm').find('[name="sex"]').val(response.patient.sex).change()
                reformat(response.patient.birthdate)
                $('#editPatientForm').find('[name="bloodgroup"]').val(response.patient.bloodgroup).change()
                $('#editPatientForm').find('[name="p_id"]').val(response.patient.patient_id).end()

                if (typeof response.patient.img_url !== 'undefined' && response.patient.img_url != '' && response.patient.img_url != null) {
                    $("#img").attr("src", response.patient.img_url);
                }
                $('.js-example-basic-single.doctor').val(response.patient.doctor).trigger('change');
                $('#infoModal').modal('show');
            });
        });
    });

    function reformat(date) {
        var tanggal = date;
        var parts = tanggal.split('-');
        var newDate = new Date(parts[2], parts[1] - 1, parts[0]);
        var tahun = newDate.getFullYear();
        var bulan = ("0" + (newDate.getMonth() + 1)).slice(-2);
        var hari = ("0" + newDate.getDate()).slice(-2);
        var tanggalBaru = tahun + "-" + bulan + "-" + hari;
        console.log(tanggalBaru);
        $('#editPatientForm').find('[name="birthdate"]').empty()
        $('#editPatientForm').find('[name="birthdate"]').val(tanggalBaru)
    }
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
                var date = new Date(response.medical_history.date * 1000);
                var de = date.getFullYear() + '-' + ("0" + (date.getMonth() + 1)).slice(-2) + '-' + date.getDate();

                $('#medical_historyEditForm').find('[name="id"]').val(response.medical_history.id).end()
                $('#medical_historyEditForm').find('[name="date"]').val(de).end()
                $('#medical_historyEditForm').find('[name="title"]').val(response.medical_history.title).end()
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
        $(".editAppointmentButton").click(function(e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            var id = $(this).attr('data-id');

            $('#editAppointmentForm').trigger("reset");
            $('#editAppointmentModal').modal('show');
            $.ajax({
                url: 'appointment/editAppointmentByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function(response) {
                var de = response.appointment.date * 1000;
                var d = new Date(de);
                var da = d.getFullYear() + '-' + ("0" + (d.getMonth() + 1)).slice(-2) + '-' + d.getDate();
                console.log(da);
                // Populate the form fields with the data returned from server
                $('#editAppointmentForm').find('[name="id"]').val(response.appointment.id).end()
                $('#editAppointmentForm').find('[name="patient"]').val(response.appointment.patient).end()
                //  $('#editAppointmentForm').find('[name="doctor"]').val(response.appointment.doctor).end()
                $('#editAppointmentForm').find('[name="date"]').val(da).end()
                $('#editAppointmentForm').find('[name="status"]').val(response.appointment.status).end()
                $('#editAppointmentForm').find('[name="remarks"]').val(response.appointment.remarks).end()
                var option1 = new Option(response.doctor.name + '-' + response.doctor.id, response.doctor.id, true, true);
                $('#editAppointmentForm').find('[name="doctor"]').append(option1).trigger('change');
                // $('.js-example-basic-single.doctor').val(response.appointment.doctor).trigger('change');
                $('.js-example-basic-single.patient').val(response.appointment.patient).trigger('change');




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
        $('#editable-sample').DataTable({
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
                "lengthMenu": "_MENU_ records per page",
            }


        });
    });
</script>

<script>
    $(document).ready(function() {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>