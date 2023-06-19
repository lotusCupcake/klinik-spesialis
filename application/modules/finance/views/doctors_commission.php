
<!--sidebar end-->
<!--main content start-->
<style>
    @media print {
        .f_report, .card-header, .print1 {
            display: none;
        }
    }
</style>
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1><?php echo lang('doctors_commission'); ?></h1>
        </div>
        <div class="section-body">
            <form role="form" action="finance/doctorsCommission" class="f_report" method="post" enctype="multipart/form-data">
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
                <div class="card-header no-print">
                <button class="btn btn-icon icon-left btn-primary" onclick="javascript:window.print();"><i class="fas fa-print"></i> <?php echo lang('print'); ?></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="space15">
                        <?php
                        if (!empty($from) && !empty($to)) {
                            echo "From $from To $to";
                        }
                        ?>
                        </div>
                        <table class="table table-striped table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th><?php echo lang('doctor_id'); ?></th>
                                    <th><?php echo lang('doctor'); ?></th>
                                    <th><?php echo lang('commission'); ?></th>
                                    <th><?php echo lang('total'); ?></th>
                                    <th class="print1"><?php echo lang('options'); ?></th>
                                </tr>
                            </thead>
                            <tbody>

                            <style>

                                .img_url{
                                    height:20px;
                                    width:20px;
                                    background-size: contain; 
                                    max-height:20px;
                                    border-radius: 100px;
                                }
                                .option_th{
                                    width:18%;
                                }

                            </style>

                            <?php foreach ($doctors as $doctor) { ?>

                                <tr class="">
                                    <td><?php echo $doctor->id; ?></td>
                                    <td><?php echo $doctor->name; ?></td>
                                    <td><?php echo $settings->currency; ?>
                                        <?php
                                        foreach ($payments as $payment) {
                                            if ($payment->doctor == $doctor->id) {    
                                                    $doctor_amount[] = $payment->doctor_amount;            
                                            }
                                        }
                                        if (!empty($doctor_amount)) {
                                            $doctor_total = array_sum($doctor_amount);
                                            echo $doctor_total;
                                        } else {
                                            $doctor_total = 0;
                                            echo $doctor_total;
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $settings->currency; ?>
                                        <?php

                                        $doctor_gross = $doctor_total;
                                        if (!empty($doctor_gross)) {
                                            echo $doctor_gross;
                                        } else {
                                            echo'0';
                                        }
                                        ?>
                                    </td>
                                    <td class="print1"> <a class="btn btn-info btn-xs invoicebutton" href="finance/docComDetails?id=<?php echo $doctor->id; ?>"><i class="fa fa-file-text"></i> <?php echo lang('details'); ?> </a></td>
                                </tr>
                                <?php $doctor_amount = NULL; ?>
                                <?php $doctor_gross = NULL; ?>
                            <?php } ?>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--main content end-->
<!--footer start-->
