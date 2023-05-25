<!-- Main Content -->
<div class="main-content no-print">
    <section class="section">
        <div class="section-header">
            <h1><?php
                if (!empty($patient->id))
                    echo lang('edit_patient');
                else
                    echo lang('add_new_patient');
                ?></h1>
        </div>
        <?php $this->session->flashdata('feedback'); ?>
        <div class="alert alert-danger alert-has-icon alert-dismissible show fade">
            <div class="alert-icon"><i class="fas fa-exclamation-triangle"></i></div>
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <div class="alert-title">Failed!</div>
                <?= validation_errors(); ?>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form role="form" action="patient/addNew" method="post" enctype="multipart/form-data">
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('doctor'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="doctor">
                                        <?php foreach ($doctors as $doctor) { ?>
                                            <option value="<?php echo $doctor->id; ?>" <?php
                                                                                        if (!empty($patient->doctor)) {
                                                                                            if ($patient->doctor == $doctor->id) {
                                                                                                echo 'selected';
                                                                                            }
                                                                                        }
                                                                                        ?>><?php echo $doctor->name; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('name'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="<?php
                                                                                                                        if (!empty($setval)) {
                                                                                                                            echo set_value('name');
                                                                                                                        }
                                                                                                                        if (!empty($patient->name)) {
                                                                                                                            echo $patient->name;
                                                                                                                        }
                                                                                                                        ?>" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('email'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                                                                                                                        if (!empty($patient->email)) {
                                                                                                                            echo $patient->email;
                                                                                                                        }
                                                                                                                        ?>' placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('password'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('address'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='<?php
                                                                                                                            if (!empty($setval)) {
                                                                                                                                echo set_value('address');
                                                                                                                            }
                                                                                                                            if (!empty($patient->address)) {
                                                                                                                                echo $patient->address;
                                                                                                                            }
                                                                                                                            ?>' placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('phone'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='<?php
                                                                                                                        if (!empty($setval)) {
                                                                                                                            echo set_value('phone');
                                                                                                                        }
                                                                                                                        if (!empty($patient->phone)) {
                                                                                                                            echo $patient->phone;
                                                                                                                        }
                                                                                                                        ?>' placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('sex'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="sex">
                                        <option value="Male" <?php
                                                                if (!empty($setval)) {
                                                                    if (set_value('sex') == 'Male') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                if (!empty($patient->sex)) {
                                                                    if ($patient->sex == 'Male') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?>> Male </option>
                                        <option value="Female" <?php
                                                                if (!empty($setval)) {
                                                                    if (set_value('sex') == 'Female') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                if (!empty($patient->sex)) {
                                                                    if ($patient->sex == 'Female') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?>> Female </option>
                                        <option value="Others" <?php
                                                                if (!empty($setval)) {
                                                                    if (set_value('sex') == 'Others') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                if (!empty($patient->sex)) {
                                                                    if ($patient->sex == 'Others') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?>> <?php echo lang('others'); ?> </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('birth_date'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="date" class="form-control dpd2" name="date_to" value="<?php
                                                                                                        if (!empty($setval)) {
                                                                                                            $time = date(set_value('birthdate'));
                                                                                                            $date = date('Y-m-d', strtotime($time));
                                                                                                            echo $date;
                                                                                                        }
                                                                                                        if (!empty($patient->birthdate)) {
                                                                                                            $time = date($patient->birthdate);
                                                                                                            $date = date('Y-m-d', strtotime($time));
                                                                                                            echo $date;
                                                                                                        }
                                                                                                        ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('blodd_group'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="bloodgroup">
                                        <<?php foreach ($groups as $group) { ?> <option value="<?php echo $group->group; ?>" <?php
                                                                                                                                if (!empty($setval)) {
                                                                                                                                    if ($group->group == set_value('bloodgroup')) {
                                                                                                                                        echo 'selected';
                                                                                                                                    }
                                                                                                                                }
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
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('image') ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="file" class="form-control" name="img_url">
                                </div>
                            </div>
                        </div>
                        <?php if (empty($id)) { ?>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="sms" value="sms">
                                            <label class="form-check-label">
                                                <?php echo lang('send_sms') ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <input type="hidden" name="id" value='<?php
                                                                if (!empty($ot_payment->id)) {
                                                                    echo $ot_payment->id;
                                                                }
                                                                ?>'>
                        <input type="hidden" name="p_id" value='<?php
                                                                if (!empty($patient->patient_id)) {
                                                                    echo $patient->patient_id;
                                                                }
                                                                ?>'>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                </div>
                                <div class="col-md-8">
                                    <button type="submit" name="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>
</div>