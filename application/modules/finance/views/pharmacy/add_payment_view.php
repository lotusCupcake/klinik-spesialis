<!-- Main Content -->
<div class="main-content no-print">
    <section class="section">
        <div class="section-header">
            <h1><?php
                if (!empty($payment->id))
                    echo lang('pharmacy') . ' ' . lang('edit_payment');
                else
                    echo lang('pharmacy') . ' ' . lang('poss');
                ?></h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form role="form" id="editPaymentPharmForm" action="finance/pharmacy/addPayment" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row" style="padding-right:30px">
                                    <div class="col-md-12 row mb-4">
                                        <div class="col-md-3 text-right">
                                            <label class="col-form-label"><?php echo lang('patient'); ?></label>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-control select2  pos_select" id="pos_select" name="patient" value=''>
                                                <?php if (!empty($payment)) { ?>
                                                    <option value="<?php echo $patients->id; ?>" selected="selected"><?php echo $patients->name; ?> - <?php echo $patients->id; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="pos_client">
                                    <div class="row" style="padding-right:30px">
                                        <div class="col-md-12 row mb-4">
                                            <div class="col-md-3 text-right">
                                                <label class="col-form-label"><?php echo lang('name'); ?></label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control pay_in" name="p_name" value='<?php
                                                                                                                    if (!empty($payment->p_name)) {
                                                                                                                        echo $payment->p_name;
                                                                                                                    }
                                                                                                                    ?>' placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-right:30px">
                                        <div class="col-md-12 row mb-4">
                                            <div class="col-md-3 text-right">
                                                <label class="col-form-label"><?php echo lang('email'); ?></label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control pay_in" name="p_email" value='<?php
                                                                                                                        if (!empty($payment->p_email)) {
                                                                                                                            echo $payment->p_email;
                                                                                                                        }
                                                                                                                        ?>' placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-right:30px">
                                        <div class="col-md-12 row mb-4">
                                            <div class="col-md-3 text-right">
                                                <label class="col-form-label"><?php echo lang('phone'); ?></label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control pay_in" name="p_phone" value='<?php
                                                                                                                        if (!empty($payment->p_phone)) {
                                                                                                                            echo $payment->p_phone;
                                                                                                                        }
                                                                                                                        ?>' placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-right:30px">
                                        <div class="col-md-12 row mb-4">
                                            <div class="col-md-3 text-right">
                                                <label class="col-form-label"><?php echo lang('address'); ?></label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control pay_in" name="p_address" value='<?php
                                                                                                                        if (!empty($payment->p_address)) {
                                                                                                                            echo $payment->p_address;
                                                                                                                        }
                                                                                                                        ?>' placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-right:30px">
                                        <div class="col-md-12 row mb-4">
                                            <div class="col-md-3 text-right">
                                                <label class="col-form-label"><?php echo lang('age'); ?></label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control pay_in" name="p_age" value='<?php
                                                                                                                    if (!empty($payment->p_age)) {
                                                                                                                        echo $payment->p_age;
                                                                                                                    }
                                                                                                                    ?>' placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-right:30px">
                                        <div class="col-md-12 row mb-4">
                                            <div class="col-md-3 text-right">
                                                <label class="col-form-label"><?php echo lang('gender'); ?></label>
                                            </div>
                                            <div class="col-md-9">
                                                <select class="form-control select2" name="p_gender" value=''>
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
                                </div>
                                <div class="row" style="padding-right:30px">
                                    <div class="col-md-12 row mb-4">
                                        <div class="col-md-3 text-right">
                                            <label class="col-form-label"><?php echo lang('select_item'); ?> <?php echo lang('medicine'); ?></label>
                                        </div>
                                        <div class="col-md-9">
                                            <?php if (empty($payment->id)) { ?>
                                                <select name="category_name[]" class="form-control select2 multi-select1" id="my_multi_select4" multiple="multiple">
                                                </select>
                                            <?php } else { ?>
                                                <select name="category_name[]" class="form-control select2 multi-select1" id="my_multi_select4" multiple="multiple">
                                                    <?php
                                                    if (!empty($payment)) {
                                                        $category_name = $payment->category_name;
                                                        $category_name1 = explode(',', $category_name);
                                                        foreach ($category_name1 as $category_name2) {
                                                            $category_name3 = explode('*', $category_name2);
                                                            $medicine = $this->medicine_model->getMedicineById($category_name3[0]);
                                                    ?>
                                                            <option value="<?php echo $medicine->id . '*' . (float) $medicine->s_price . '*' . $medicine->name . '*' . $medicine->company . '*' . $medicine->box; ?>" data-qtity="<?php echo $category_name3[2]; ?>" selected>
                                                                <?php echo $medicine->name; ?>
                                                            </option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 qfloww"></div>
                            <div class="col-md-4">
                                <div class="row" style="padding-right:30px">
                                    <div class="col-md-12 row mb-4">
                                        <div class="col-md-4 text-right">
                                            <label class="col-form-label"><?php echo lang('sub_total'); ?></label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control pay_in" name="subtotal" id="subtotal" value='<?php
                                                                                                                                if (!empty($payment->amount)) {

                                                                                                                                    echo $payment->amount;
                                                                                                                                }
                                                                                                                                ?>' placeholder=" " readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-right:30px">
                                    <div class="col-md-12 row mb-4">
                                        <div class="col-md-4 text-right">
                                            <label class="col-form-label"><?php echo lang('discount'); ?><?php
                                                                                                            if ($discount_type == 'percentage') {
                                                                                                                echo ' (%)';
                                                                                                            }
                                                                                                            ?></label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control pay_in" name="discount" id="dis_id" value='<?php
                                                                                                                                if (!empty($payment->discount)) {
                                                                                                                                    $discount = explode('*', $payment->discount);
                                                                                                                                    echo $discount[0];
                                                                                                                                }
                                                                                                                                ?>' placeholder="Discount">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-right:30px">
                                    <div class="col-md-12 row mb-4">
                                        <div class="col-md-4 text-right">
                                            <label class="col-form-label"><?php echo lang('gross_total'); ?></label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control pay_in" name="grsss" id="gross" value='<?php
                                                                                                                            if (!empty($payment->gross_total)) {

                                                                                                                                echo $payment->gross_total;
                                                                                                                            }
                                                                                                                            ?>' placeholder=" " readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-right:30px">
                                    <div class="col-md-12 row mb-4">
                                        <div class="col-md-4 text-right">
                                            <label class="col-form-label"><?php echo lang('note'); ?></label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control pay_in" name="remarks" id="" value='<?php
                                                                                                                        if (!empty($payment->remarks)) {
                                                                                                                            echo $payment->remarks;
                                                                                                                        }
                                                                                                                        ?>' placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value='<?php
                                                                        if (!empty($payment->id)) {
                                                                            echo $payment->id;
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
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>
</div>