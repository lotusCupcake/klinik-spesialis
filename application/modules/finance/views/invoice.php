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
                        <a class="btn btn-icon icon-left btn-primary ml-2" href='finance/payment'><i class="fa fa-arrow-left"></i> <?php echo lang('back_to_payment_modules'); ?></a>
                        <button class="btn btn-icon icon-left btn-success invoice_button ml-2" onclick="javascript:window.print();"><i class="fas fa-print"></i><?php echo lang('print'); ?> <?php echo lang('invoice'); ?></button>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?>
                            <a class="btn btn-icon icon-left btn-light editbutton ml-2" href='finance/editPayment?id=<?php echo $payment->id; ?>'><i class="fa fa-edit"></i> <?php echo lang('edit'); ?> <?php echo lang('invoice'); ?></a>
                            <a class="btn btn-icon icon-left btn-info ml-2" href='finance/sendInvoice?id=<?php echo $payment->id; ?>'><i class="fa fa-paper-plane"></i> <?php echo lang('send_invoice'); ?> </a>
                        <?php } ?>
                        <a class="btn btn-icon icon-left btn-primary ml-2" href='finance/addPaymentView'><i class="fa fa-plus"></i> <?php echo lang('add_another_payment'); ?> </a>
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
                        <div class="col-md-2"><?php echo lang('doctor'); ?></div>
                        <div class="col-md-4"> : <strong>
                                <?php
                                if (!empty($payment->doctor)) {
                                    $doc_details = $this->doctor_model->getDoctorById($payment->doctor);
                                    if (!empty($doc_details)) {
                                        echo $doc_details->name . ' <br>';
                                    } else {
                                        echo $payment->doctor_name . ' <br>';
                                    }
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
                        <div class="col-md-1">No.</div>
                        <div class="col-md-4"><?php echo lang('description'); ?></div>
                        <div class="col-md-3"><?php echo lang('unit_price'); ?></div>
                        <div class="col-md-1"><?php echo lang('qty'); ?></div>
                        <div class="col-md-3"><?php echo lang('amount'); ?></div>
                    </div>
                    <?php
                    if (!empty($payment->category_name)) {
                        $category_name = $payment->category_name;
                        $category_name1 = explode(',', $category_name);
                        $i = 0;
                        foreach ($category_name1 as $category_name2) {
                            $i = $i + 1;
                            $category_name3 = explode('*', $category_name2);
                            if ($category_name3[3] > 0) {
                    ?>
                                <hr>
                                <div class="row" style="font-size:17px; font-weight:bold">
                                    <div class="col-md-1"><?php echo $i; ?></div>
                                    <div class="col-md-4"><?php echo $this->finance_model->getPaymentcategoryById($category_name3[0])->category; ?></div>
                                    <div class="col-md-3"><?php echo $settings->currency; ?> <?php echo $category_name3[1]; ?></div>
                                    <div class="col-md-1"><?php echo $category_name3[3]; ?></div>
                                    <div class="col-md-3"><?php echo $settings->currency; ?> <?php echo $category_name3[1] * $category_name3[3]; ?></div>
                                </div>
                    <?php
                            }
                        }
                    }
                    ?>
                    <hr class="mt-5 mb-5">
                    <div align="right" style="font-size:17px">
                        <p><strong><?php echo lang('sub_total'); ?></strong> : <?php echo $settings->currency; ?> <?php echo $payment->amount; ?></p>
                        <?php
                        $dis = 0;
                        ?>
                        <?php if (!empty($payment->discount)) { ?>
                            <?php
                            $dis = $payment->discount;
                            ?>
                        <?php } ?>
                        <?php
                        $dis_spec = 0;
                        ?>
                        <?php if (!empty($payment->spec_discount)) { ?>
                            <?php
                            $dis_spec = $payment->spec_discount;
                            ?>
                        <?php } ?>
                        <p><strong><?php echo lang('discount'); ?></strong> : <?php echo $settings->currency . " " . $dis; ?></p>
                        <p><strong><?php echo lang('discount'); ?> Spesial</strong> : <?php echo $settings->currency . " " . $dis_spec; ?></p>
                        <p><strong><?php echo lang('grand_total'); ?></strong> : <?php echo $settings->currency; ?> <?php echo $g = $payment->gross_total; ?></p>
                        <p><strong><?php echo lang('amount_received'); ?></strong> : <?php echo $settings->currency; ?> <?php echo $r = $this->finance_model->getDepositAmountByPaymentId($payment->id); ?></p>
                    </div>
                    <hr class="mt-5 mb-5">
                    <p style="font-size:17px"><?php echo lang('user'); ?> : <?php echo $this->ion_auth->user($payment->user)->row()->username; ?></p>
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

<?php if ($redirectlink == 'print') { ?>
    <script type="text/javascript">
        window.print();
    </script>
<?php } ?>