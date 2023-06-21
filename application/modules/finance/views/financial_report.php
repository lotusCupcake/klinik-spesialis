<!--main content start-->
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1><?php echo lang('financial_report'); ?> </h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <form role="form" class="f_report" action="finance/financialReport" method="post" enctype="multipart/form-data">
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
                            <div class="form-group col-md-6" style="margin-top:32px">
                                <button class="btn btn-icon icon-left btn-primary float-right" onclick="javascript:window.print();"><i class="fas fa-print"></i> <?php echo lang('print') ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            if (!empty($payments)) {
                $paid_number = 0;
                foreach ($payments as $payment) {
                    $paid_number = $paid_number + 1;
                }
            }
            ?>
            <div class="row">
                <div class="col-md-8">
                    <h2 class="section-title"><?php echo lang('income'); ?> </h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="space15"></div>
                                <table class="table table-striped table-bordered" id="editable-sample">
                                    <thead>
                                        <tr>
                                            <th> <?php echo lang('category'); ?></th>
                                            <th> <?php echo lang('quantity'); ?></th>
                                            <th class="hidden-phone"> <?php echo lang('amount'); ?></th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $category_id_for_report = array();
                                        foreach ($payment_categories as $cat_name) {
                                            foreach ($payments as $payment) {
                                                $categories_in_payment = explode(',', $payment->category_name);
                                                foreach ($categories_in_payment as $key => $category_in_payment) {
                                                    $category_id = explode('*', $category_in_payment);
                                                    if ($category_id[0] == $cat_name->id) {
                                                        $category_id_for_report[] = $category_id[0];
                                                    }
                                                }
                                            }
                                        }
                                        $category_id_for_reports = array_unique($category_id_for_report);
                                        ?>

                                        <?php
                                        foreach ($payment_categories as $category) {
                                            //  $category_quantity =(array) null;
                                            $category_quantity = array();
                                            if (in_array($category->id, $category_id_for_reports)) {
                                        ?>
                                                <tr class="">
                                                    <td><?php echo $category->category ?></td>
                                                    <td>


                                                        <?php
                                                        foreach ($payments as $paymentt) {
                                                            $category_names_and_amountss = $paymentt->category_name;
                                                            $category_names_and_amountss = explode(',', $category_names_and_amountss);
                                                            foreach ($category_names_and_amountss as $category_name_and_amountt) {
                                                                $category_namee = explode('*', $category_name_and_amountt);
                                                                if (($category->id == $category_namee[0])) {
                                                                    $category_quantity[] = $category_namee[3];
                                                                }
                                                            }
                                                        }
                                                        if (!empty($category_quantity)) {
                                                            echo array_sum($category_quantity);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>




                                                    </td>
                                                    <td><?php echo $settings->currency; ?> <?php
                                                                                            foreach ($payments as $payment) {
                                                                                                $category_names_and_amounts = $payment->category_name;
                                                                                                $category_names_and_amounts = explode(',', $category_names_and_amounts);
                                                                                                foreach ($category_names_and_amounts as $category_name_and_amount) {
                                                                                                    $category_name = explode('*', $category_name_and_amount);
                                                                                                    if (($category->id == $category_name[0])) {
                                                                                                        $amount_per_category[] = $category_name[1] * $category_name[3];
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                            if (!empty($amount_per_category)) {
                                                                                                echo array_sum($amount_per_category); //*array_sum($category_quantity);
                                                                                                $total_payment_by_category[] = array_sum($amount_per_category); //*array_sum($category_quantity);
                                                                                            } else {
                                                                                                echo '0';
                                                                                            }

                                                                                            $amount_per_category = NULL;
                                                                                            ?>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>

                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <th><?php echo lang('sub_total'); ?></th>
                                            <td></td>
                                            <td>
                                                <?php echo $settings->currency; ?>
                                                <?php
                                                if (!empty($total_payment_by_category)) {
                                                    echo array_sum($total_payment_by_category);
                                                } else {
                                                    echo '0';
                                                }
                                                ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th><?php echo lang('total'); ?> <?php echo lang('discount'); ?></th>
                                            <td></td>
                                            <td>
                                                <?php echo $settings->currency; ?>
                                                <?php
                                                if (!empty($payments)) {
                                                    foreach ($payments as $payment) {
                                                        $discount[] = $payment->flat_discount;
                                                    }
                                                    if ($paid_number > 0) {
                                                        echo array_sum($discount);
                                                    } else {
                                                        echo '0';
                                                    }
                                                } else {
                                                    echo '0';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><?php echo lang('gross_income'); ?></th>
                                            <td></td>
                                            <td>
                                                <?php echo $settings->currency; ?>
                                                <?php
                                                if (!empty($payments)) {
                                                    if ($paid_number > 0) {
                                                        $gross = array_sum($total_payment_by_category) - array_sum($discount) + array_sum($vat);
                                                        echo $gross;
                                                    } else {
                                                        echo '0';
                                                    }
                                                } else {
                                                    echo '0';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><?php echo lang('total'); ?> <?php echo lang('hospital_amount'); ?></th>
                                            <td></td>
                                            <td>
                                                <?php echo $settings->currency; ?>
                                                <?php
                                                if (!empty($payments)) {
                                                    foreach ($payments as $payment) {
                                                        $hospital_amount[] = $payment->hospital_amount;
                                                    }
                                                    if ($paid_number > 0) {
                                                        $hospital_amount = array_sum($hospital_amount);
                                                        echo $hospital_amount;
                                                    } else {
                                                        echo '0';
                                                    }
                                                } else {
                                                    echo '0';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><?php echo lang('total'); ?> <?php echo lang('doctors_amount'); ?></th>
                                            <td></td>
                                            <td>
                                                <?php echo $settings->currency; ?>
                                                <?php
                                                if (!empty($payments)) {
                                                    foreach ($payments as $payment) {
                                                        $doctor_amount[] = $payment->doctor_amount;
                                                    }
                                                    if ($paid_number > 0) {
                                                        $gross_doctor_amount = array_sum($doctor_amount);
                                                        echo $gross_doctor_amount;
                                                    } else {
                                                        echo '0';
                                                    }
                                                } else {
                                                    echo '0';
                                                }
                                                ?>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <h2 class="section-title"><?php echo lang('expense'); ?> </h2>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th> <?php echo lang('category'); ?></th>
                                        <th class="hidden-phone"> <?php echo lang('amount'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($expense_categories as $category) { ?>
                                        <tr class="">
                                            <td><?php echo $category->category ?></td>
                                            <td>
                                                <?php echo $settings->currency; ?>
                                                <?php
                                                foreach ($expenses as $expense) {
                                                    $category_name = $expense->category;


                                                    if (($category->category == $category_name)) {
                                                        $amount_per_category[] = $expense->amount;
                                                    }
                                                }
                                                if (!empty($amount_per_category)) {
                                                    $total_expense_by_category[] = array_sum($amount_per_category);
                                                    echo array_sum($amount_per_category);
                                                } else {
                                                    echo '0';
                                                }

                                                $amount_per_category = NULL;
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <style>
                    .billl {
                        background: #39B24F !important;
                    }

                    .due {
                        background: #39B1D1 !important;
                    }
                </style>
                <div class="col-md-4">
                    <h2 class="section-title"><?php echo lang('report'); ?></h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-statistic-1">
                                        <div class="card-icon bg-warning">
                                            <i class="fas fa-money-bills"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4><?php echo lang('gross_bill'); ?></h4>
                                            </div>
                                            <div class="card-body">
                                                <?php echo $settings->currency; ?>
                                                <?php
                                                if (empty($gross)) {
                                                    $gross = 0;
                                                }
                                                echo $gross_bill = $gross;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-statistic-1">
                                        <div class="card-icon bg-success">
                                            <i class="fas fa-money-bills"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4><?php echo lang('gross_hospital_amount'); ?></h4>
                                            </div>
                                            <div class="card-body">
                                                <?php echo $settings->currency; ?>
                                                <?php
                                                if (!empty($payments)) {
                                                    if ($paid_number > 0) {
                                                        $gross = $hospital_amount;
                                                        echo $gross;
                                                    }
                                                } elseif (!empty($payments)) {
                                                    if (($paid_number > 0)) {
                                                        $gross = $hospital_amount;
                                                        echo $gross;
                                                    }
                                                } else {
                                                    echo '0';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-statistic-1">
                                        <div class="card-icon bg-success">
                                            <i class="fas fa-money-bills"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4><?php echo lang('gross_doctors_commission'); ?></h4>
                                            </div>
                                            <div class="card-body">
                                                <?php echo $settings->currency; ?>
                                                <?php
                                                if (empty($gross_doctor_amount)) {
                                                    $gross_doctor_amount = 0;
                                                }
                                                if (empty($gross_doctor_amount_ot)) {
                                                    $gross_doctor_amount_ot = 0;
                                                }
                                                echo $doctor_gross = $gross_doctor_amount + $gross_doctor_amount_ot;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-statistic-1">
                                        <div class="card-icon bg-success">
                                            <i class="fas fa-money-bills"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4><?php echo lang('gross_deposit'); ?></h4>
                                            </div>
                                            <div class="card-body">
                                                <?php echo $settings->currency; ?>
                                                <?php
                                                $deposited_amount = array();
                                                if (!empty($deposits)) {
                                                    foreach ($deposits as $deposit) {
                                                        if (!empty($deposit->payment_id)) {
                                                            $deposited_amount[] = $deposit->deposited_amount;
                                                        }
                                                    }
                                                    if ($paid_number > 0) {
                                                        $deposited_amount = array_sum($deposited_amount);
                                                        echo $deposited_amount;
                                                    } else {
                                                        echo '0';
                                                    }
                                                } else {
                                                    echo '0';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-statistic-1">
                                        <div class="card-icon bg-danger">
                                            <i class="fas fa-money-bills"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4><?php echo lang('gross_due'); ?></h4>
                                            </div>
                                            <div class="card-body">
                                                <?php echo $settings->currency; ?>
                                                <?php
                                                $deposited_amount = array();
                                                if (!empty($deposits)) {
                                                    foreach ($deposits as $deposit) {
                                                        $deposited_amount[] = $deposit->deposited_amount;
                                                    }
                                                    if ($paid_number > 0) {
                                                        $deposited_amount = array_sum($deposited_amount);
                                                        echo $gross_bill - $deposited_amount;
                                                    } else {
                                                        echo '0';
                                                    }
                                                } else {
                                                    echo '0';
                                                }
                                                ?>
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
                                                <h4><?php echo lang('gross_expense'); ?></h4>
                                            </div>
                                            <div class="card-body">
                                                <?php echo $settings->currency; ?>
                                                <?php
                                                if (!empty($total_expense_by_category)) {
                                                    echo array_sum($total_expense_by_category);
                                                } else {
                                                    echo '0';
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
    </div>
</div>
<!-- 
<?php echo $settings->currency; ?>
                <?php
                if (empty($total_payment_by_category)) {
                    if (empty($total_expense_by_category)) {
                        echo '0';
                    } else {
                        $profit = 0 - array_sum($total_expense_by_category);
                        echo $profit;
                    }
                }
                if (empty($total_expense_by_category)) {
                    if (empty($total_payment_by_category)) {
                        echo '0';
                    } else {
                        $profit = $gross - 0;
                        echo $profit;
                    }
                } else {
                    if (!empty($gross)) {
                        $profit = $gross - array_sum($total_expense_by_category);
                        echo $profit;
                    }
                }
                ?> -->
<!--main content end-->
<!--footer start-->