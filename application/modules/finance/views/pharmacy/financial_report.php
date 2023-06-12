<!-- Main Content -->
<div class="main-content no-print">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('pharmacy'); ?> <?php echo lang('report'); ?></h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <form role="form" class="f_report" action="finance/pharmacy/financialReport" method="post" enctype="multipart/form-data">
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
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <?php
                    if (!empty($payments)) {
                        $paid_number = 0;
                        foreach ($payments as $payment) {
                            $paid_number = $paid_number + 1;
                        }
                    }
                    ?>
                    <h2 class="section-title"><?php echo lang('sales'); ?> <?php echo lang('report'); ?></h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="space15"></div>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th><?php echo lang('item_name'); ?> </th>
                                            <th><?php echo lang('quantity'); ?> </th>
                                            <th><?php echo lang('total'); ?> <?php echo lang('purchase'); ?> <?php echo lang('cost'); ?> </th>
                                            <th class="hidden-phone"><?php echo lang('total'); ?> <?php echo lang('sale'); ?> <?php echo lang('cost'); ?> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($payments)) {
                                            foreach ($medicines as $medicine_name) {
                                                foreach ($payments as $payment) {
                                                    $categories_in_payment = explode(',', $payment->category_name);
                                                    foreach ($categories_in_payment as $category_in_payment) {
                                                        $category_id = explode('*', $category_in_payment);
                                                        if ($category_id[0] == $medicine_name->id) {
                                                            $category_id_for_report[] = $category_id[0];
                                                        }
                                                    }
                                                }
                                            }
                                            $category_id_for_reports = array_unique($category_id_for_report);
                                        }
                                        ?>
                                        <?php
                                        if (!empty($payments)) {
                                            foreach ($medicines as $category) { ?>
                                                <tr class="">
                                                    <td>
                                                        <?php if (in_array($category->id, $category_id_for_reports)) {
                                                        ?>
                                                            <?php echo $category->name ?>
                                                        <?php
                                                            foreach ($payments as $payment) {
                                                                $category_names_and_amounts = $payment->category_name;
                                                                $category_names_and_amounts = explode(',', $category_names_and_amounts);
                                                                foreach ($category_names_and_amounts as $category_name_and_amount) {
                                                                    $category_name = explode('*', $category_name_and_amount);
                                                                    if (($category->id == $category_name[0])) {
                                                                        $amount_per_category[] = $category_name[1] * $category_name[2];
                                                                        $cost_per_category[] = $category_name[2] * $category_name[3];
                                                                        $quantity[] = $category_name[2];
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if (!empty($quantity)) {
                                                            echo array_sum($quantity);
                                                            $quantity[] = array_sum($quantity);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        $quantity = NULL;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $settings->currency; ?>
                                                        <?php
                                                        if (!empty($cost_per_category)) {
                                                            echo array_sum($cost_per_category);
                                                            $total_cost_by_category[] = array_sum($cost_per_category);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        $cost_per_category = NULL;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $settings->currency; ?>
                                                        <?php
                                                        if (!empty($amount_per_category)) {
                                                            echo array_sum($amount_per_category);
                                                            $total_payment_by_category[] = array_sum($amount_per_category);
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
                                                if (!empty($total_cost_by_category)) {
                                                    echo array_sum($total_cost_by_category);
                                                } else {
                                                    echo '0';
                                                }
                                                ?>
                                            </td>
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
                                            <th><?php echo lang('gross'); ?> <?php echo lang('sales'); ?></th>
                                            <td></td>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <h2 class="section-title"><?php echo lang('expense'); ?> <?php echo lang('report'); ?></h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="space15"></div>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th><?php echo lang('category'); ?> </th>
                                            <th class="hidden-phone"><?php echo lang('amount'); ?> </th>
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
                </div>
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
                                                <h4><?php echo lang('gross'); ?> <?php echo lang('p_price'); ?></h4>
                                            </div>
                                            <div class="card-body">
                                                <?php echo $settings->currency; ?>
                                                <?php
                                                if (!empty($payments)) {
                                                    if (($paid_number > 0)) {
                                                        if (!empty($total_cost_by_category)) {
                                                            $total_cost = array_sum($total_cost_by_category);
                                                            echo number_format($total_cost, 2, '.', ',');
                                                        } else {
                                                            $total_cost = 0;
                                                            echo number_format($total_cost, 2, '.', ',');
                                                        }
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
                                                <h4><?php echo lang('gross'); ?> <?php echo lang('s_price'); ?></h4>
                                            </div>
                                            <div class="card-body">
                                                <?php echo $settings->currency; ?>
                                                <?php
                                                if (!empty($payments)) {
                                                    if (($paid_number > 0)) {
                                                        if (!empty($gross)) {
                                                            echo number_format($gross, 2, '.', ',');
                                                        } else {
                                                            $gross = 0;
                                                            echo number_format($gross, 2, '.', ',');
                                                        }
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
                                            <i class="fas fa-wallet"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4><?php echo lang('gross_expense'); ?></h4>
                                            </div>
                                            <div class="card-body">
                                                <?php echo $settings->currency; ?>
                                                <?php
                                                if (!empty($total_expense_by_category)) {
                                                    $total_expense = array_sum($total_expense_by_category);
                                                    echo number_format($total_expense, 2, '.', ',');
                                                } else {
                                                    $total_expense = 0;
                                                    echo number_format($total_expense, 2, '.', ',');
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
                                            <i class="fas fa-trash"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4><?php echo lang('profit'); ?></h4>
                                            </div>
                                            <div class="card-body">
                                                <?php echo $settings->currency; ?>
                                                <?php
                                                $gross = array_sum($total_payment_by_category) - array_sum($discount) + array_sum($vat);
                                                $profit = $gross - $total_cost - $total_expense;
                                                echo number_format($profit, 2, '.', ',');
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
    </section>
</div>