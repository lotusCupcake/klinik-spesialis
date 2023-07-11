<!--main content start-->
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1><?php echo $this->doctor_model->getDoctorById($doctor)->name; ?></h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <form role="form" class="f_report" action="finance/docComDetails" method="post" enctype="multipart/form-data">
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
                            <input type="hidden" class="form-control dpd2" name="doctor" value="<?php
                                                                                                if (!empty($doctor)) {
                                                                                                    echo $doctor;
                                                                                                }
                                                                                                ?>">
                            <div class="form-group col-md-2" style="margin-top:32px">
                                <button type="submit" name="submit" class="btn btn-icon icon-left btn-primary range_submit"><?php echo lang('submit'); ?></button>
                            </div>
                            <div class="form-group col-md-6" style="margin-top:32px">
                                <button class="btn btn-icon icon-left btn-primary float-right" onclick="javascript:window.print();"><i class="fas fa-print"></i> <?php echo lang('print') ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <h2 class="section-title"><?php echo lang('payments'); ?></h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="space15"></div>
                                <table class="table table-striped table-bordered" id="editable-sample">
                                    <thead>
                                        <tr>
                                            <th><?php echo lang('invoice_id'); ?></th>
                                            <th><?php echo lang('patient'); ?></th>
                                            <th><?php echo lang('date'); ?></th>
                                            <th><?php echo lang('total'); ?></th>
                                            <th><?php echo lang('doctors_commission'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($payments as $payment) { ?>
                                            <?php $patient_info = $this->db->get_where('patient', array('id' => $payment->patient))->row(); ?>
                                            <tr class="">
                                                <td>
                                                    <?php
                                                    echo $payment->id;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if (!empty($patient_info)) {
                                                        echo $patient_info->name . '</br>' . $patient_info->address . '</br>' . $patient_info->phone;
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo date('d/m/y', $payment->date); ?></td>
                                                <td><?php echo $settings->currency; ?> <?php echo $payment->gross_total; ?></td>
                                                <td><?php echo $settings->currency; ?> <?php
                                                                                        if (!empty($payment->doctor)) {
                                                                                            $doc_com[] = $payment->doctor_amount;
                                                                                            echo $payment->doctor_amount;
                                                                                        }
                                                                                        ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h2 class="section-title"><?php echo lang('report'); ?></h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-statistic-1">
                                        <div class="card-icon bg-success">
                                            <i class="fas fa-money-bills"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4><?php echo lang('total_doctors_commission'); ?></h4>
                                            </div>
                                            <div class="card-body">
                                                <?php echo $settings->currency; ?>
                                                <?php
                                                if (!empty($doc_com)) {
                                                    $total_doc_com = array_sum($doc_com);
                                                } else {
                                                    $total_doc_com = 0;
                                                }
                                                echo $total_doc_com;
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
    </div>
</div>
<!--main content end-->
<!--footer start-->