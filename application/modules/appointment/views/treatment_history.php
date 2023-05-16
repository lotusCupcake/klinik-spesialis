<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('treatment_history'); ?></h1>
        </div>
        <div class="section-body">
            <form role="form" class="f_report" action="appointment/treatmentReport" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label><?php echo lang('date_from'); ?></label>
                        <input type="date" class="form-control dpd1" name="date_from" value="<?php
                                                                                                if (!empty($from)) {
                                                                                                    echo $from;
                                                                                                }
                                                                                                ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label><?php echo lang('date_to'); ?></label>
                        <input type="date" class="form-control dpd2" name="date_to" value="<?php
                                                                                            if (!empty($to)) {
                                                                                                echo $to;
                                                                                            }
                                                                                            ?>">
                    </div>
                    <div class="form-group col-md-2" style="margin-top:32px">
                        <button type="submit" name="submit" class="btn btn-icon icon-left btn-primary range_submit"><?php echo lang('submit'); ?></button>
                    </div>
                </div>
            </form>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="space15"></div>
                        <table class="table table-striped table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo lang('doctor_id'); ?></th>
                                    <th scope="col"><?php echo lang('doctor'); ?></th>
                                    <th scope="col"><?php echo lang('number_of_patient_treated'); ?></th>
                                    <th scope="col"><?php echo lang('actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($doctors as $doctor) { ?>
                                    <tr>
                                        <td><?php echo $doctor->id; ?></td>
                                        <td><?php echo $doctor->name; ?></td>
                                        <td><?php
                                            foreach ($appointments as $appointment) {
                                                if ($appointment->doctor == $doctor->id) {
                                                    $appointment_number[] = 1;
                                                }
                                            }
                                            if (!empty($appointment_number)) {
                                                $appointment_total = array_sum($appointment_number);
                                                echo $appointment_total;
                                            } else {
                                                $appointment_total = 0;
                                                echo $appointment_total;
                                            }
                                            ?>
                                        </td>
                                        <td align="center"><a href="appointment/getAppointmentByDoctorId?id=<?php echo $doctor->id; ?>"><button class="btn btn-icon icon-left btn-success btn_width add_payment_button"><?php echo lang('details'); ?></button></a></td>
                                    </tr>
                                    <?php $appointment_number = NULL; ?>
                                    <?php $appointment_total = NULL; ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>