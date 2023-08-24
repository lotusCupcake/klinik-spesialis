<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header no-print">
            <h1><?php echo lang('invoice'); ?></h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header no-print">
                    <div style="font-size: 30px;">
                        <a href="finance/previousInvoice?id=<?php echo $payment->id ?>" class="mr-4 previousone1"><i class="fa fa-arrow-left"></i></a>
                        <a href="finance/nextInvoice?id=<?php echo $payment->id ?>"><i class="fa fa-arrow-right nextone1"></i></a>
                    </div>
                    <h4></h4>
                    <div class="card-header-form">
                        <button class="btn btn-icon icon-left btn-success invoice_button ml-2" onclick="javascript:window.print();"><i class="fas fa-print"></i><?php echo lang('print'); ?> <?php echo lang('invoice'); ?></button>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?>
                            <a class="btn btn-icon icon-left btn-light editbutton ml-2" href='finance/pharmacy/editPayment?id=<?php echo $payment->id; ?>'><i class="fa fa-edit"></i> <?php echo lang('edit'); ?> <?php echo lang('invoice'); ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="card-body print">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 style="color: #2f80bf;"><?php echo $settings->title; ?></h2>
                            <h5><?php echo $settings->address; ?></h5>
                            <h5><?php echo $settings->phone; ?></h5>
                        </div>
                        <div class="col-md-6">
                            <img align="right" src="<?php echo $settings->logo; ?>" height="150">
                        </div>
                    </div>
                    <hr class="mt-5">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-center" style="font-weight: bold; margin-top: 20px; margin-bottom: 20px; text-transform: uppercase;">
                                <?php echo lang('invoice') ?> <?php echo lang('payments') ?>
                            </h4>
                        </div>
                    </div>
                    <hr>
                    <?php $patient_info = $this->db->get_where('patient', array('id' => $payment->patient))->row(); ?>
                    <div class="row mb-3 mt-5" style="font-size:17px">
                        <div class="col-md-2"><?php echo lang('patient'); ?> <?php echo lang('name'); ?></div>
                        <div class="col-md-4"> : <strong><?php
                                                            if (!empty($patient_info)) {
                                                                echo $patient_info->name . ' <br>';
                                                            }
                                                            ?></strong></div>
                        <div class="col-md-2"><?php echo lang('invoice'); ?></div>
                        <div class="col-md-4"> : <strong>
                                <?php
                                if (!empty($payment->id)) {
                                    echo $payment->id;
                                }
                                ?></strong></div>
                    </div>
                    <div class="row mb-3" style="font-size:17px">
                        <div class=" col-md-2"><?php echo lang('patient_id'); ?></div>
                        <div class="col-md-4"> : <strong><?php
                                                            if (!empty($patient_info)) {
                                                                echo $patient_info->id . ' <br>';
                                                            }
                                                            ?></strong></div>
                        <div class="col-md-2"><?php echo lang('date'); ?></div>
                        <div class="col-md-4"> : <strong>
                                <?php
                                if (!empty($payment->date)) {
                                    echo date('d-m-Y', $payment->date) . ' <br>';
                                }
                                ?></strong></div>
                    </div>
                    <div class="row mb-3" style="font-size:17px">
                        <div class=" col-md-2"><?php echo lang('address'); ?></div>
                        <div class="col-md-4"> : <strong> <?php
                                                            if (!empty($patient_info)) {
                                                                echo $patient_info->address . ' <br>';
                                                            }
                                                            ?></strong></div>
                    </div>
                    <div class="row" style="font-size:17px">
                        <div class=" col-md-2"><?php echo lang('phone'); ?></div>
                        <div class="col-md-4"> : <strong> <?php
                                                            if (!empty($patient_info)) {
                                                                echo $patient_info->phone . ' <br>';
                                                            }
                                                            ?></strong></div>
                    </div>
                    <hr class="mt-5 mb-5">
                    <div class="row" style="font-size:17px">
                        <div class="col-md-3"><?php echo lang('name'); ?></div>
                        <div class="col-md-2"><?php echo lang('company'); ?></div>
                        <div class="col-md-2"><?php echo lang('unit_price'); ?></div>
                        <div class="col-md-2"><?php echo lang('quantity'); ?></div>
                        <div class="col-md-3"><?php echo lang('total_per_item'); ?></div>
                    </div>
                    <?php
                    if (!empty($payment->category_name)) {
                        $category_name = $payment->category_name;
                        $category_name1 = explode(',', $category_name);
                        if (empty($payment->x_ray)) {
                            $i = 0;
                        }
                        foreach ($category_name1 as $category_name2) {
                            $category_name3 = explode('*', $category_name2);
                            if ($category_name3[1] > 0) {
                    ?>
                                <hr>
                                <div class="row" style="font-size:17px; font-weight:bold">
                                    <div class="col-md-3"><?php
                                                            $current_medicine = $this->db->get_where('medicine', array('id' => $category_name3[0]))->row();
                                                            echo $current_medicine->name;
                                                            ?></div>
                                    <div class="col-md-2"><?php echo $current_medicine->company; ?></div>
                                    <div class="col-md-2"><?php echo $settings->currency; ?> <?php echo $category_name3[1]; ?></div>
                                    <div class="col-md-2"><?php echo $category_name3[2]; ?></div>
                                    <div class="col-md-3"><?php echo $settings->currency; ?> <?php echo $category_name3[1] * $category_name3[2]; ?></div>
                                </div>
                    <?php
                            }
                        }
                    }
                    ?>
                    <hr class="mt-5 mb-5">
                    <div align="right" style="font-size:17px">
                        <p><strong><?php echo lang('sub_total'); ?> <?php echo lang('amount'); ?></strong> <?php echo $settings->currency; ?> <?php echo $payment->amount; ?></p>
                        <p><strong><?php echo lang('discount'); ?></strong> <?php
                                                                            if ($discount_type == 'percentage') {
                                                                                echo '(%) : ';
                                                                            } else {
                                                                                echo ': ' . $settings->currency;
                                                                            }
                                                                            ?> <?php
                                                                                $discount = explode('*', $payment->discount);
                                                                                if (!empty($discount[1])) {
                                                                                    echo $discount[0] . ' %  =  ' . $settings->currency . ' ' . $discount[1];
                                                                                } else {
                                                                                    echo (($discount[0]) ? $discount[0] : 0);
                                                                                }
                                                                                ?></p>
                        <p><strong><?php echo lang('grand_total'); ?></strong> : <?php echo $settings->currency; ?> <?php echo $payment->gross_total; ?></p>
                    </div>
                </div>
            </div>
    </section>
</div>

<script src="common/js/codearistos.min.js"></script>

<style>
    @media print {
        .print {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 99;
        }
    }
</style>

<script type="text/javascript">
    window.print();
</script>