
<!--sidebar end-->
<!--main content start-->
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>
                <?php echo lang('activities_by'); ?> <strong style="color: #009988; text-transform: capitalize;" ><?php echo $user->name; ?></strong>
                    ( <?php
                    if (!empty($date_from)) {
                        echo lang('from') . ' ' . date('m/d/Y', $date_from) . ' ';
                    }

                    if (!empty($date_to)) {
                        echo lang('to') . ' ' . date('m/d/Y', $date_to);
                    }

                    if (!empty($day)) {
                        echo $day;
                    }
                    ?> )
            </h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-7 no-print">
                <?php if ($this->ion_auth->in_group(array('Accountant', 'Receptionist'))) { ?>
                    <form role="form" class="f_report" action="finance/userActivityReportDateWise" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label><?php echo lang('date_from'); ?></label>
                                <input type="date" class="form-control dpd1" name="date_from" value="<?php
                                                                                                        if (!empty($from)) {
                                                                                                            echo $from;
                                                                                                        }
                                                                                                        ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label><?php echo lang('date_to'); ?></label>
                                <input type="date" class="form-control dpd2" name="date_to" value="<?php
                                                                                                    if (!empty($to)) {
                                                                                                        echo $to;
                                                                                                    }
                                                                                                    ?>">
                            </div>
                            <div class="form-group col-md-3" style="margin-top:32px">
                                <button type="submit" name="submit" class="btn btn-icon icon-left btn-primary range_submit"><?php echo lang('submit'); ?></button>
                            </div>
                        </div>
                    </form>
                <?php } ?>
                <?php if ($this->ion_auth->in_group(array('admin')) || $this->ion_auth->get_user_id() == '341') { ?>
                    <form role="form" class="f_report" action="finance/allUserActivityReportDateWise" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label><?php echo lang('date_from'); ?></label>
                                <input type="date" class="form-control dpd1" name="date_from" value="<?php
                                                                                                        if (!empty($from)) {
                                                                                                            echo $from;
                                                                                                        }
                                                                                                        ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label><?php echo lang('date_to'); ?></label>
                                <input type="date" class="form-control dpd2" name="date_to" value="<?php
                                                                                                    if (!empty($to)) {
                                                                                                        echo $to;
                                                                                                    }
                                                                                                    ?>">
                            </div>
                            <div class="form-group col-md-3" style="margin-top:32px">
                                <button type="submit" name="submit" class="btn btn-icon icon-left btn-primary range_submit"><?php echo lang('submit'); ?></button>
                            </div>
                        </div>
                    </form>
                <?php } ?>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header no-print">
                        <?php if ($this->ion_auth->in_group(array('admin')) || $this->ion_auth->get_user_id() == '341') { ?>
                            <div class="card-header-form">
                                <a href="finance/allUserActivityReport?user=<?php echo $user->ion_user_id; ?>" class="btn btn-icon icon-left <?php
                                        if (!empty($day)) {
                                            if ($day == 'Today') {
                                                echo 'btn-primary';
                                            }
                                        }
                                        ?>">
                                    <i class="fa fa-search"></i> <?php echo lang('today'); ?>
                                </a>
                                <a href="finance/allUserActivityReport?user=<?php echo $user->ion_user_id; ?>&yesterday='all'" class="btn btn-icon icon-left <?php
                                        if (!empty($day)) {
                                            if ($day == 'Yesterday') {
                                                echo 'btn-primary';
                                            }
                                        }
                                        ?> ml-2">
                                    <i class="fa fa-search"></i> <?php echo lang('yesterday'); ?>
                                </a>
                                <a href="finance/allUserActivityReport?user=<?php echo $user->ion_user_id; ?>&all='all'" class="btn btn-icon icon-left <?php
                                        if (!empty($day)) {
                                            if ($day == 'All') {
                                                echo 'btn-primary';
                                            }
                                        }
                                        ?> ml-2">
                                    <i class="fa fa-search"></i> <?php echo lang('all'); ?>
                                </a>
                                
                            </div>
                            <h4></h4>
                            <div class="card-header-form">
                                <button class="btn btn-icon icon-left btn-primary" onclick="javascript:window.print();"><i class="fas fa-print"></i> <?php echo lang('print') ?></button>
                            </div>

                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('Accountant', 'Receptionist'))) { ?>
                            <div class="card-header-form">
                                <a href="finance/UserActivityReport?user=<?php echo $user->ion_user_id; ?>" class="btn btn-icon icon-left <?php
                                        if (!empty($day)) {
                                            if ($day == 'Today') {
                                                echo 'btn-primary';
                                            }
                                        }
                                        ?>">
                                    <i class="fa fa-search"></i> <?php echo lang('today'); ?>
                                </a>
                                <a href="finance/UserActivityReport?user=<?php echo $user->ion_user_id; ?>&yesterday='all'" class="btn btn-icon icon-left <?php
                                        if (!empty($day)) {
                                            if ($day == 'Yesterday') {
                                                echo 'btn-primary';
                                            }
                                        }
                                        ?> ml-2">
                                    <i class="fa fa-search"></i> <?php echo lang('yesterday'); ?>
                                </a>
                                <a href="finance/UserActivityReport?user=<?php echo $user->ion_user_id; ?>&all='all'" class="btn btn-icon icon-left <?php
                                        if (!empty($day)) {
                                            if ($day == 'All') {
                                                echo 'btn-primary';
                                            }
                                        }
                                        ?> ml-2">
                                    <i class="fa fa-search"></i> <?php echo lang('all'); ?>
                                </a>
                                
                            </div>
                            <h4></h4>
                            <div class="card-header-form">
                                <button class="btn btn-icon icon-left btn-primary" onclick="javascript:window.print();"><i class="fas fa-print"></i> <?php echo lang('print') ?></button>
                            </div>

                        <?php } ?>
                        </div>
                        
                    </div>
                </div>
            </div>
            <style>
                .img_url{
                    height:20px;
                    width:20px;
                    background-size: contain; 
                    max-height:20px;
                    border-radius: 100px;
                }
                .option_th{
                    width:33%;
                }
                .clearfix{
                    margin-bottom: 0px;
                }

                
            </style>
            <div class="row">
                <div class="col">
                    <div class="section-title">
                        <h5>
                            <?php echo lang('all_bills'); ?>
                        </h5>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="space15"></div>
                                <table class="table table-striped table-bordered" id="editable-samples">
                                    <thead>
                                        <tr>
                                            <th class=""><?php echo lang('date'); ?></th>
                                            <th class=""><?php echo lang('invoice'); ?> #</th>
                                            <th class=""><?php echo lang('bill_amount'); ?></th>
                                            <th class=""><?php echo lang('deposit'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $dates = array();
                                        $datess = array();
                                        foreach ($payments as $payment) {
                                            $dates[] = $payment->date;
                                        }
                                        foreach ($deposits as $deposit) {
                                            $datess[] = $deposit->date;
                                        }
                                        $dat = array_merge($dates, $datess);
                                        $dattt = array_unique($dat);
                                        asort($dattt);

                                        $total_payment = array();

                                        $total_deposit = array();
                                        ?>

                                        <?php
                                        foreach ($dattt as $key => $value) {
                                            foreach ($payments as $payment) {
                                                if ($payment->date == $value) {
                                                    $total_payment[] = $payment->gross_total;
                                                    ?>
                                                    <tr class="">
                                                        <td><?php echo date('d/m/y', $payment->date); ?></td>
                                                        <td> <?php echo $payment->id; ?></td>
                                                        <td><?php echo $settings->currency; ?> <?php echo $payment->gross_total; ?></td>
                                                        <td><?php
                                                            if (!empty($payment->amount_received)) {
                                                                echo $settings->currency;
                                                            }
                                                            ?> <?php echo $payment->amount_received; ?></td>

                                                    </tr>

                                                    <?php
                                                }
                                            }
                                            ?>

                                            <?php
                                            foreach ($deposits as $deposit) {
                                                if ($deposit->date == $value) {
                                                    $total_deposit[] = $deposit->deposited_amount;
                                                    if (!empty($deposit->deposited_amount) && empty($deposit->amount_received_id)) {
                                                        ?>

                                                        <tr class="">
                                                            <td><?php echo date('d-m-y', $deposit->date); ?></td>
                                                            <td><?php echo $deposit->payment_id; ?></td>
                                                            <td></td>
                                                            <td><?php echo $settings->currency; ?> <?php echo $deposit->deposited_amount; ?></td>

                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        <?php } ?>

                                        <?php
                                        if (!empty($total_payment)) {
                                            $total_p = array_sum($total_payment);
                                        } else {
                                            $total_p = 0;
                                        }

                                        if (!empty($total_deposit)) {
                                            $total_d = array_sum($total_deposit);
                                        } else {
                                            $total_d = 0;
                                        }
                                        ?>

                                        <tr class="total">
                                            <td></td>
                                            <td> <strong> <?php echo lang('total'); ?> </strong></td>
                                            <td> <strong> <?php echo $settings->currency; ?> <?php echo $total_p; ?> </strong></td>
                                            <td> <strong> <?php echo $settings->currency; ?> <?php echo $total_d; ?> </strong></td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php
                    $total_bill = array();
                    foreach ($payments as $payment) {
                        $total_bill[] = $payment->gross_total;
                    }
                    if (!empty($total_bill)) {
                        $total_bill = array_sum($total_bill);
                    } else {
                        $total_bill = 0;
                    }
                    ?>

                    <?php
                    $total_bill_ot = array();
                    if (!empty($total_bill_ot)) {
                        $total_bill_ot = array_sum($total_bill_ot);
                    } else {
                        $total_bill_ot = 0;
                    }
                    ?>
                    <h2></h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-statistic-1">
                                        <div class="card-icon bg-info">
                                            <i class="fas fa-money-bills"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4><?php echo lang('total_bill_amount'); ?></h4>
                                            </div>
                                            <div class="card-body">
                                                <?php echo $settings->currency; ?>
                                                <?php echo $total_payable_bill = $total_bill + $total_bill_ot; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-statistic-1">
                                        <div class="card-icon bg-info">
                                            <i class="fas fa-money-bills"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4><?php echo lang('total_deposit_amount'); ?></h4>
                                            </div>
                                            <div class="card-body">
                                                <?php echo $settings->currency; ?>
                                                <?php
                                                $total_deposit = array();
                                                foreach ($deposits as $deposit) {
                                                    $total_deposit[] = $deposit->deposited_amount;
                                                }
                                                echo array_sum($total_deposit);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-statistic-1" style="border: 2px solid red; color: red;">
                                        <div class="card-icon bg-info">
                                            <i class="fas fa-money-bills"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4><?php echo lang('due_amount'); ?></h4>
                                            </div>
                                            <div class="card-body">
                                                <?php echo $settings->currency; ?>
                                                <?php
                                                echo $total_payable_bill - array_sum($total_deposit);
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



<script>
    $(document).ready(function () {
        $('#editable-samplee').DataTable();
    });
</script>



