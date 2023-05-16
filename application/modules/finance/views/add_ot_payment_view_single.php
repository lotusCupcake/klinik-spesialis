<!-- Main Content -->
<div class="main-content no-print">
    <section class="section">
        <div class="section-header">
            <h1><?php
                if (!empty($ot_payment->id)) {
                    echo lang('edit_ot_payment');
                } else
                    echo 'Tambah atau Pembayaran';
                ?></h1>
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
            <div class="card">
                <div class="card-body">
                    <form role="form" action="finance/addOtPayment" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('patient'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?php echo $patient->name; ?>" disabled>
                                    <input type="hidden" name="patient" class="form-control" value="<?php echo $patient->id; ?>">
                                </div>
                            </div>
                            <div class="col-md-6 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('consultant_surgeon'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="doctor_c_s">
                                        <option value="None">Select</option>
                                        <?php foreach ($doctors as $doctor) { ?>
                                            <option value="<?php echo $doctor->id; ?>" <?php
                                                                                        if (!empty($ot_payment->doctor_c_s)) {
                                                                                            if ($ot_payment->doctor_c_s == $doctor->id) {
                                                                                                echo 'selected';
                                                                                            }
                                                                                        }
                                                                                        ?>><?php echo $doctor->name; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('assistant_surgeon'); ?> (1) </label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="doctor_a_s_1">
                                        <option value="None">Select</option>
                                        <?php foreach ($doctors as $doctor) { ?>
                                            <option value="<?php echo $doctor->id; ?>" <?php
                                                                                        if (!empty($ot_payment->doctor_a_s_1)) {
                                                                                            if ($ot_payment->doctor_a_s_1 == $doctor->id) {
                                                                                                echo 'selected';
                                                                                            }
                                                                                        }
                                                                                        ?>><?php echo $doctor->name; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('assistant_surgeon'); ?> (1) </label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="doctor_a_s_2">
                                        <option value="None">Select</option>
                                        <?php foreach ($doctors as $doctor) { ?>
                                            <option value="None">Select</option>
                                            <?php foreach ($doctors as $doctor) { ?>
                                                <option value="<?php echo $doctor->id; ?>" <?php
                                                                                            if (!empty($ot_payment->doctor_a_s_2)) {
                                                                                                if ($ot_payment->doctor_a_s_2 == $doctor->id) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                            }
                                                                                            ?>><?php echo $doctor->name; ?> </option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('anaestheasist'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="doctor_anaes">
                                        <option value="None">Select</option>
                                        <?php foreach ($doctors as $doctor) { ?>
                                            <option value="None">Select</option>
                                            <?php foreach ($doctors as $doctor) { ?>
                                                <option value="<?php echo $doctor->id; ?>" <?php
                                                                                            if (!empty($ot_payment->doctor_anaes)) {
                                                                                                if ($ot_payment->doctor_anaes == $doctor->id) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                            }
                                                                                            ?>><?php echo $doctor->name; ?> </option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('nature_of_operation'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="n_o_o" class="form-control" value="<?php
                                                                                                if (!empty($ot_payment->n_o_o)) {
                                                                                                    echo $ot_payment->n_o_o;
                                                                                                }
                                                                                                ?>" class="form-control pay_in">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><strong><?php echo lang('payment_categories'); ?></strong></label>
                                </div>
                                <div class="col-md-8">
                                    <label class="col-form-label"><strong><?php echo lang('amount'); ?></strong></label>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('consultant_surgeon'); ?> <?php echo lang('fee'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="c_s_f" value="<?php
                                                                                                if (!empty($ot_payment->c_s_f)) {
                                                                                                    echo $ot_payment->c_s_f;
                                                                                                }
                                                                                                ?>" placeholder="<?php echo $settings->currency; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('assistant_surgeon'); ?> <?php echo lang('fee'); ?> (1)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="a_s_f_1" id="exampleInputEmail1" value="<?php
                                                                                                                            if (!empty($ot_payment->a_s_f_1)) {
                                                                                                                                echo $ot_payment->a_s_f_1;
                                                                                                                            }
                                                                                                                            ?>" placeholder="<?php echo $settings->currency; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('assistant_surgeon'); ?> <?php echo lang('fee'); ?> (2)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="a_s_f_2" id="exampleInputEmail1" value="<?php
                                                                                                                            if (!empty($ot_payment->a_s_f_2)) {
                                                                                                                                echo $ot_payment->a_s_f_2;
                                                                                                                            }
                                                                                                                            ?>" placeholder="<?php echo $settings->currency; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('anaestheasist'); ?> <?php echo lang('fee'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="anaes_f" id="exampleInputEmail1" value="<?php
                                                                                                                            if (!empty($ot_payment->anaes_f)) {
                                                                                                                                echo $ot_payment->anaes_f;
                                                                                                                            }
                                                                                                                            ?>" placeholder="<?php echo $settings->currency; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label">OT Charge</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="ot_charge" id="exampleInputEmail1" value="<?php
                                                                                                                            if (!empty($ot_payment->ot_charge)) {
                                                                                                                                echo $ot_payment->ot_charge;
                                                                                                                            }
                                                                                                                            ?>" placeholder="<?php echo $settings->currency; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('cabin_rent'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="cab_rent" id="exampleInputEmail1" value="<?php
                                                                                                                            if (!empty($ot_payment->cab_rent)) {
                                                                                                                                echo $ot_payment->cab_rent;
                                                                                                                            }
                                                                                                                            ?>" placeholder="<?php echo $settings->currency; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label">Seat Rent</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="c_s_f" value="<?php
                                                                                                if (!empty($ot_payment->c_s_f)) {
                                                                                                    echo $ot_payment->c_s_f;
                                                                                                }
                                                                                                ?>" placeholder="<?php echo $settings->currency; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('consultant_surgeon'); ?> <?php echo lang('fee'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="seat_rent" id="exampleInputEmail1" value="<?php
                                                                                                                            if (!empty($ot_payment->seat_rent)) {
                                                                                                                                echo $ot_payment->seat_rent;
                                                                                                                            }
                                                                                                                            ?>" placeholder="<?php echo $settings->currency; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('others'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="others" id="exampleInputEmail1" value="<?php
                                                                                                                            if (!empty($ot_payment->others)) {
                                                                                                                                echo $ot_payment->others;
                                                                                                                            }
                                                                                                                            ?>" placeholder="<?php echo $settings->currency; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label">Discount <?php
                                                                            if ($discount_type == 'percentage') {
                                                                                echo ' (%)';
                                                                            }
                                                                            ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="discount" id="exampleInputEmail1" value='<?php
                                                                                                                            if (!empty($ot_payment->discount)) {
                                                                                                                                $discount = explode('*', $ot_payment->discount);
                                                                                                                                echo $discount[0];
                                                                                                                            }
                                                                                                                            ?>' placeholder="Discount">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('amount_received') ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="amount_received" id="exampleInputEmail1" value="<?php
                                                                                                                                    if (!empty($ot_payment->amount_received)) {
                                                                                                                                        echo $ot_payment->amount_received;
                                                                                                                                    }
                                                                                                                                    ?>" placeholder="<?php echo $settings->currency; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                </div>
                                <div class="col-md-8">
                                    <button type="submit" name="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value='<?php
                                                                if (!empty($ot_payment->id)) {
                                                                    echo $ot_payment->id;
                                                                }
                                                                ?>'>
                </div>
                </form>
            </div>
        </div>
    </section>
</div>