<!-- Main Content -->
<div class="main-content no-print">
    <section class="section">
        <div class="section-header">
            <h1> <?php echo lang('payment_history'); ?></h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-8">
                    <form role="form" class="f_report" action="finance/patientPaymentHistory" method="post" enctype="multipart/form-data">
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
                    <h2 class="section-title"><?php echo lang('all_bills'); ?> & <?php echo lang('deposits'); ?></h2>
                    <div class="card">
                        <div class="card-header">
                            <a href="finance/addPaymentByPatientView?id=<?php echo $patient->id; ?>&type=gen"><button class="btn btn-icon icon-left btn-primary mr-2"><i class="fas fa-plus"></i> <?php echo lang('add_payment'); ?></button></a>
                            <button class="btn btn-icon icon-left btn-primary mr-2" data-toggle="modal" data-target="#myModal5"><i class="fas fa-file"></i> <?php echo lang('invoice'); ?></button>
                            <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i> <?php echo lang('deposit'); ?></button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="space15"></div>
                                <table class="table table-striped table-bordered" id="editable-sample">
                                    <thead>
                                        <tr>
                                            <th scope=" col"><?php echo lang('date'); ?></th>
                                            <th scope="col"><?php echo lang('invoice'); ?></th>
                                            <th scope="col"><?php echo lang('bill_amount'); ?></th>
                                            <th><?php echo lang('deposit'); ?></th>
                                            <th><?php echo lang('deposit_type'); ?></th>
                                            <th class="no-print" width="35%" scope="col"><?php echo lang('options'); ?></th>
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
                                        $total_pur = array();
                                        $total_p = array();
                                        ?>
                                        <?php
                                        foreach ($dattt as $key => $value) {
                                            foreach ($payments as $payment) {
                                                if ($payment->date == $value) {
                                        ?>
                                                    <tr class="">
                                                        <td><?php echo date('d-m-y', $payment->date); ?></td>
                                                        <td> <?php echo $payment->id; ?></td>
                                                        <td><?php echo $settings->currency; ?> <?php echo $payment->gross_total; ?></td>
                                                        <td><?php
                                                            if (!empty($payment->amount_received)) {
                                                                echo $settings->currency;
                                                            }
                                                            ?> <?php echo $payment->amount_received; ?>
                                                        </td>
                                                        <td> <?php echo $payment->deposit_type; ?></td>
                                                        <td class="no-print">
                                                            <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?>
                                                                <a href="finance/editPayment?id=<?php echo $payment->id; ?>"><button class="btn btn-icon icon-left btn-info"><i class="fas fa-edit"></i></button></a>
                                                            <?php } ?>
                                                            <a href="finance/invoice?id=<?php echo $payment->id; ?>"><button class="btn btn-icon icon-left btn-light invoicebutton"><i class="fas fa-invoice"></i></button></a>
                                                            <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?>
                                                                <a href="finance/delete?id=<?php echo $payment->id; ?>"><button class="btn btn-icon icon-left btn-danger delete_button" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i></button></a>
                                                            <?php } ?>
                                                            </button>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                            <?php
                                            foreach ($deposits as $deposit) {
                                                if ($deposit->date == $value) {
                                                    if (!empty($deposit->deposited_amount) && empty($deposit->amount_received_id)) {
                                            ?>
                                                        <tr class="">
                                                            <td><?php echo date('d-m-y', $deposit->date); ?></td>
                                                            <td><?php echo $deposit->payment_id; ?></td>
                                                            <td></td>
                                                            <td><?php echo $settings->currency; ?> <?php echo $deposit->deposited_amount; ?></td>
                                                            <td> <?php echo $deposit->deposit_type; ?></td>
                                                            <td class="no-print">
                                                                <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?>
                                                                    <button class="btn btn-icon icon-left btn-light editbutton" data-toggle="modal" data-target="#modal" data-id="<?php echo $deposit->id; ?>"><i class="fas fa-edit"></i></button>
                                                                <?php } ?>
                                                                <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?>
                                                                    <a class="btn-xs btn-info delete_button" title="<?php echo lang('delete'); ?>" style="width: 25%;" href="finance/deleteDeposit?id=<?php echo $deposit->id; ?>&patient=<?php echo $patient->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
                                                                    <a href="finance/deleteDeposit?id=<?php echo $deposit->id; ?>&patient=<?php echo $patient->id; ?>"><button class="btn btn-icon icon-left btn-danger delete_button" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i></button></a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
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
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="<?php echo ($patient->img_url == null) ? 'template/assets/img/avatar/avatar-1.png' : $patient->img_url; ?>" class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label"><?php echo lang('email'); ?></div>
                                    <div class="profile-widget-item-value"><?php echo $patient->email; ?></div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label"><?php echo lang('phone'); ?></div>
                                    <div class="profile-widget-item-value"><?php echo $patient->phone; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description pb-0">
                            <div class="profile-widget-name"><?php echo $patient->name; ?></div>
                            <p><?php echo $patient->address; ?></p>
                        </div>
                        <div class="card-footer text-center pt-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-statistic-1">
                                        <div class="card-icon bg-primary">
                                            <i class="fas fa-money-bills"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4><?php echo lang('total_bill_amount'); ?></h4>
                                            </div>
                                            <div class="card-body">
                                                <?php echo $settings->currency; ?>
                                                <?php echo $total_payable_bill = $total_bill; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-statistic-1">
                                        <div class="card-icon bg-success">
                                            <i class="fas fa-wallet"></i>
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
                                    <div class="card card-statistic-1">
                                        <div class="card-icon bg-danger">
                                            <i class="fas fa-trash"></i>
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
    </section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="myModal5">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header no-print">
                <h5 class="modal-title"><strong><?php echo lang('invoice'); ?></strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img src="<?php echo $this->settings_model->getSettings()->logo; ?>" alt="" width="200" height="180" class="img-print">
                        <h3 class="mt-3">
                            <?php echo $settings->title ?>
                        </h3>
                        <h4>
                            <?php echo $settings->address ?>
                        </h4>
                        <h4>
                            Tel: <?php echo $settings->phone ?>
                        </h4>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-4">
                        <h5><?php echo lang('payment_to'); ?>:</h5>
                        <p>
                            <?php echo $settings->title; ?> <br>
                            <?php echo $settings->address; ?><br>
                            Tel: <?php echo $settings->phone; ?>
                        </p>
                    </div>
                    <?php if (!empty($payment->patient)) { ?>
                        <div class="col-md-4">
                            <h5><?php echo lang('bill_to'); ?>:</h5>
                            <p>
                                <?php
                                if (!empty($patient->name)) {
                                    echo $patient->name . ' <br>';
                                }
                                if (!empty($patient->address)) {
                                    echo $patient->address . ' <br>';
                                }
                                if (!empty($patient->phone)) {
                                    echo $patient->phone . ' <br>';
                                }
                                ?>
                            </p>
                        </div>
                    <?php } ?>
                    <div class="col-md-4">
                        <h5><?php echo lang('invoice_info'); ?></h5>
                        <p>Date : <?php echo date('m/d/Y'); ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <div class="space15"></div>
                            <table class="table table-striped table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th class=""><?php echo lang('date'); ?></th>
                                        <th class=""><?php echo lang('invoice'); ?></th>
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
                                    $total_pur = array();
                                    $total_p = array();
                                    ?>
                                    <?php
                                    foreach ($dattt as $key => $value) {
                                        foreach ($payments as $payment) {
                                            if ($payment->date == $value) {
                                    ?>
                                                <tr class="">
                                                    <td><?php echo date('d/m/y', $payment->date); ?></td>
                                                    <td> <?php echo $payment->id; ?></td>
                                                    <td><?php echo $settings->currency; ?> <?php echo $payment->gross_total; ?></td>
                                                    <td><?php
                                                        if (!empty($payment->amount_received)) {
                                                            echo $settings->currency;
                                                        }
                                                        ?> <?php echo $payment->amount_received; ?>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                        <?php
                                        foreach ($deposits as $deposit) {
                                            if ($deposit->date == $value) {
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <p><strong><?php echo lang('grand_total'); ?> : </strong><?php echo $settings->currency; ?> <?php echo $total_payable_bill = $total_bill; ?></p>
                        <p><strong><?php echo lang('amount_received'); ?> : </strong><?php echo $settings->currency; ?> <?php echo array_sum($total_deposit); ?></p>
                        <p><strong><?php echo lang('amount_to_be_paid'); ?> : </strong><?php echo $settings->currency; ?> <?php echo $total_payable_bill - array_sum($total_deposit); ?></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br no-print">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success invoice_button" onclick="javascript:window.print();"><?php echo lang('print'); ?></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('add_deposit'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="payu/check" id="deposit-form" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label><?php echo lang('invoice'); ?></label>
                        <select class="form-control select2" name="payment_id" required="">
                            <option value="">Select .....</option>
                            <?php foreach ($payments as $payment) { ?>
                                <option value="<?php echo $payment->id; ?>" <?php
                                                                            if (!empty($deposit->payment_id)) {
                                                                                if ($deposit->payment_id == $payment->id) {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                            ?>><?php echo $payment->id; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('deposit_amount'); ?></label>
                        <input type="text" class="form-control" name="deposited_amount" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label><?php echo lang('invoice'); ?></label>
                        <select class="form-control select2" name="deposit_type" required="">
                            <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) { ?>
                                <option value="Cash"> <?php echo lang('cash'); ?> </option>
                                <option value="Card"> <?php echo lang('card'); ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <?php
                    $payment_gateway = $settings->payment_gateway;
                    ?>
                    <div class="card-payment">
                        <hr>
                        <div class="col-md-12">
                            <label for="exampleInputEmail1"> <?php echo lang('accepted'); ?> <?php echo lang('cards'); ?></label>
                            <div class="payment pad_bot">
                                <img src="uploads/card.png" width="100%">
                            </div>
                        </div>
                        <?php
                        if ($payment_gateway == 'PayPal') {
                        ?>
                            <div class="form-group">
                                <label><?php echo lang('card'); ?> <?php echo lang('type'); ?></label>
                                <select class="form-control select2" name="card_type" required="">
                                    <option value="Mastercard"> <?php echo lang('mastercard'); ?> </option>
                                    <option value="Visa"> <?php echo lang('visa'); ?> </option>
                                    <option value="American Express"> <?php echo lang('american_express'); ?> </option>
                                </select>
                            </div>
                        <?php } ?>
                        <?php if ($payment_gateway == '2Checkout' || $payment_gateway == 'PayPal') {
                        ?>
                            <div class="form-group">
                                <label><?php echo lang('cardholder'); ?> <?php echo lang('name'); ?></label>
                                <input type="text" id="cardholder" class="form-control pay_in" name="cardholder" value='' placeholder="">
                            </div>
                        <?php } ?>
                        <?php if ($payment_gateway != 'Pay U Money' && $payment_gateway != 'Paystack' && $payment_gateway != 'SSLCOMMERZ' && $payment_gateway != 'Paytm') { ?>
                            <div class="form-group">
                                <label><?php echo lang('card'); ?> <?php echo lang('number'); ?></label>
                                <input type="text" id="card" class="form-control pay_in" name="card_number" value='' placeholder="">
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label><?php echo lang('expire'); ?> <?php echo lang('date'); ?></label>
                                        <input type="text" id="expire" class="form-control pay_in" data-date="" data-date-format="MM YY" placeholder="Expiry (MM/YY)" name="expire_date" maxlength="7" value='' placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo lang('cvv'); ?></label>
                                        <input type="cvv" id="card" class="form-control pay_in" maxlength="3" name="cvv" value='' placeholder="">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <input type="hidden" name="id" value=''>
                    <input type="hidden" name="patient" value='<?php echo $patient->id; ?>'>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <div class="cashsubmit payment right-six">
                        <button type="submit" name="submit2" id="submit1" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                    </div>
                    <div class="cardsubmit payment right-six" hidden>
                        <?php $twocheckout = $this->db->get_where('paymentGateway', array('name =' => '2Checkout'))->row(); ?>
                        <button type="submit" name="pay_now" id="submit-btn" class="btn btn-primary" <?php if ($settings->payment_gateway == 'Stripe') {
                                                                                                        ?>onClick="stripePay(event);" <?php }
                                                                                                                                        ?><?php if ($settings->payment_gateway == '2Checkout' && $twocheckout->status == 'live') {
                                                                                                                                            ?>onClick="twoCheckoutPay(event);" <?php }
                                                                                                                                                                                ?>><?php echo lang('submit'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="myModal2">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('edit_deposit'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="finance/deposit" id="editDepositform" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label><?php echo lang('invoice'); ?></label>
                        <select class="form-control select2" name="payment_id" required="">
                            <option value="">Select .....</option>
                            <?php foreach ($payments as $payment) { ?>
                                <option value="<?php echo $payment->id; ?>" <?php
                                                                            if (!empty($deposit->payment_id)) {
                                                                                if ($deposit->payment_id == $payment->id) {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                            ?>><?php echo $payment->id; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('deposit_amount'); ?></label>
                        <input type="text" class="form-control" name="deposited_amount" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label><?php echo lang('invoice'); ?></label>
                        <select class="form-control select2" name="deposit_type" required="">
                            <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) { ?>
                                <option value="Cash"> <?php echo lang('cash'); ?> </option>
                                <option value="Card"> <?php echo lang('card'); ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <?php
                    $payment_gateway = $settings->payment_gateway;
                    ?>
                    <div class="card-payment">
                        <hr>
                        <div class="col-md-12">
                            <label for="exampleInputEmail1"> <?php echo lang('accepted'); ?> <?php echo lang('cards'); ?></label>
                            <div class="payment pad_bot">
                                <img src="uploads/card.png" width="100%">
                            </div>
                        </div>
                        <?php
                        if ($payment_gateway == 'PayPal') {
                        ?>
                            <div class="form-group">
                                <label><?php echo lang('card'); ?> <?php echo lang('type'); ?></label>
                                <select class="form-control select2" name="card_type" required="">
                                    <option value="Mastercard"> <?php echo lang('mastercard'); ?> </option>
                                    <option value="Visa"> <?php echo lang('visa'); ?> </option>
                                    <option value="American Express"> <?php echo lang('american_express'); ?> </option>
                                </select>
                            </div>
                        <?php } ?>
                        <?php if ($payment_gateway == '2Checkout' || $payment_gateway == 'PayPal') {
                        ?>
                            <div class="form-group">
                                <label><?php echo lang('cardholder'); ?> <?php echo lang('name'); ?></label>
                                <input type="text" id="cardholder" class="form-control pay_in" name="cardholder" value='' placeholder="">
                            </div>
                        <?php } ?>
                        <?php if ($payment_gateway != 'Pay U Money' && $payment_gateway != 'Paystack' && $payment_gateway != 'SSLCOMMERZ' && $payment_gateway != 'Paytm') { ?>
                            <div class="form-group">
                                <label><?php echo lang('card'); ?> <?php echo lang('number'); ?></label>
                                <input type="text" id="card" class="form-control pay_in" name="card_number" value='<?php
                                                                                                                    if (!empty($payment->p_email)) {
                                                                                                                        echo $payment->p_email;
                                                                                                                    }
                                                                                                                    ?>' placeholder="">
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label><?php echo lang('expire'); ?> <?php echo lang('date'); ?></label>
                                        <input type="text" id="expire" class="form-control pay_in" data-date="" data-date-format="MM YY" placeholder="Expiry (MM/YY)" name="expire_date" maxlength="7" value='<?php
                                                                                                                                                                                                                if (!empty($payment->p_phone)) {
                                                                                                                                                                                                                    echo $payment->p_phone;
                                                                                                                                                                                                                }
                                                                                                                                                                                                                ?>' placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo lang('cvv'); ?></label>
                                        <input type="cvv" id="card" class="form-control pay_in" maxlength="3" name="cvv" value='<?php
                                                                                                                                if (!empty($payment->p_age)) {
                                                                                                                                    echo $payment->p_age;
                                                                                                                                }
                                                                                                                                ?>' placeholder="">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <input type="hidden" name="id" value=''>
                    <input type="hidden" name="patient" value='<?php echo $patient->id; ?>'>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <div class="cashsubmit payment right-six">
                        <button type="submit" name="submit2" id="submit1" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                    </div>
                    <div class="cardsubmit payment right-six" hidden>
                        <button type="submit" name="pay_now" id="submit-btn1" class="btn btn-primary" <?php if ($settings->payment_gateway == 'Stripe') {
                                                                                                        ?>onClick="stripePay1(event);" <?php }
                                                                                                                                        ?>><?php echo lang('submit'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="myModal3">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('choose_payment_type'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row text-center">
                    <div class="col-md-6">
                        <a href="finance/addPaymentByPatientView?id=<?php echo $patient->id; ?>&type=gen"><button type="button" class="btn btn-primary"><?php echo lang('add_general_payment'); ?></button></a>
                    </div>
                    <div class="col-md-6">
                        <a href="finance/addPaymentByPatientView?id=<?php echo $patient->id; ?>&type=ot"><button type="button" class="btn btn-success"><?php echo lang('add_ot_payment'); ?></button></a>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="common/js/codearistos.min.js"></script>
<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="common/js/ajaxrequest-codearistos.min.js"></script>

<style>
    @media print {

        .modal-content {
            position: absolute;
            top: 0;
        }

        .modal {
            overflow: hidden;
        }

        .modal-dialog {
            max-width: 100%;
            width: 100%;
        }
    }
</style>

<script type="text/javascript">
    $(document).ready(function() {
        $(".editbutton").click(function(e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#editDepositform').trigger("reset");
            $.ajax({
                url: 'finance/editDepositbyJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function(response) {
                // Populate the form fields with the data returned from server
                if (response.deposit.deposit_type != 'Card') {
                    $('#editDepositform').find('[name="id"]').val(response.deposit.id).end()
                    $('#editDepositform').find('[name="patient"]').val(response.deposit.patient).end()
                    $('#editDepositform').find('[name="payment_id"]').val(response.deposit.payment_id).end()
                    $('#editDepositform').find('[name="date"]').val(response.deposit.date).end()
                    $('#editDepositform').find('[name="deposited_amount"]').val(response.deposit.deposited_amount).end()

                    $('#myModal2').modal('show');

                } else {
                    alert('Payement Processed By Card can not be edited. Thanks.')
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(document.body).on('change', '#selecttype', function() {

            var v = $("#selecttype option:selected").val()
            if (v == 'payu') {
                $("#deposit-form").attr("action", 'payu/check');
            } else {
                $("#deposit-form").attr("action", 'finance/deposit');
            }
        });

    });


    $(document).ready(function() {
        var v = $("#selecttype option:selected").val()
        if (v == 'payu') {
            $("#deposit-form").attr("action", 'payu/check');
        } else {
            $("#deposit-form").attr("action", 'finance/deposit');
        }
    });
</script>


<script>
    $(document).ready(function() {
        $('.card-payment').hide();
        $(document.body).on('change', '#selecttype', function() {

            var v = $("select.selecttype option:selected").val()
            if (v == 'Card') {
                $('.card-payment').show();
                $('.cardsubmit').removeAttr('hidden');
                $('.cashsubmit').attr('hidden');
            } else {
                $('.card-payment').hide();
                $('.cashsubmit').removeAttr('hidden');
                $('.cardsubmit').attr('hidden');
            }
        });

    });
</script>



<script>
    $(document).ready(function() {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script>
    function cardValidation() {
        var valid = true;
        var cardNumber = $('#card').val();
        var expire = $('#expire').val();
        var cvc = $('#cvv').val();

        $("#error-message").html("").hide();

        if (cardNumber.trim() == "") {
            valid = false;
        }

        if (expire.trim() == "") {
            valid = false;
        }
        if (cvc.trim() == "") {
            valid = false;
        }

        if (valid == false) {
            $("#error-message").html("All Fields are required").show();
        }

        return valid;
    }
    //set your publishable key
    Stripe.setPublishableKey("<?php echo $gateway->publish; ?>");

    //callback to handle the response from stripe
    function stripeResponseHandler(status, response) {
        if (response.error) {
            //enable the submit button
            $("#submit-btn").show();
            $("#loader").css("display", "none");
            //display the errors on the form
            $("#error-message").html(response.error.message).show();
        } else {
            var token = response['id'];
            $('#token').val(token);
            $("#deposit-form").append("<input type='hidden' name='token' value='" + token + "' />");
            console.log(token);
            $("#deposit-form").submit();
        }
    }

    function stripePay(e) {
        e.preventDefault();
        var valid = cardValidation();
        if (valid == true) {
            $("#submit-btn").attr("disabled", true);
            $("#loader").css("display", "inline-block");
            var expire = $('#expire').val()
            var arr = expire.split('/');
            Stripe.createToken({
                number: $('#card').val(),
                cvc: $('#cvv').val(),
                exp_month: arr[0],
                exp_year: arr[1]
            }, stripeResponseHandler);
            return false;
        }
    }
</script>
<script>
    function cardValidation1() {
        var valid = true;
        var cardNumber = $('#card1').val();
        var expire = $('#expire1').val();
        var cvc = $('#cvv1').val();
        $("#error-message").html("").hide();
        if (cardNumber.trim() == "") {
            valid = false;
        }
        if (expire.trim() == "") {
            valid = false;
        }
        if (cvc.trim() == "") {
            valid = false;
        }
        if (valid == false) {
            $("#error-message").html("All Fields are required").show();
        }
        return valid;
    }
    Stripe.setPublishableKey("<?php echo $gateway->publish; ?>");

    function stripeResponseHandler(status, response) {
        if (response.error) {
            $("#submit-btn1").show();
            $("#loader").css("display", "none");
            $("#error-message").html(response.error.message).show();
        } else {
            var token = response['id'];
            $('#token').val(token);
            $("#editDepositform").append("<input type='hidden' name='token' value='" + token + "' />");
            console.log(token);
            $("#editDepositform").submit();
        }
    }

    function stripePay1(e) {
        e.preventDefault();
        var valid = cardValidation1();
        if (valid == true) {
            $("#submit-btn").attr("disabled", true);
            $("#loader").css("display", "inline-block");
            var expire = $('#expire1').val()
            var arr = expire.split('/');
            Stripe.createToken({
                number: $('#card1').val(),
                cvc: $('#cvv1').val(),
                exp_month: arr[0],
                exp_year: arr[1]
            }, stripeResponseHandler);
            return false;
        }
    }
</script>
<script>
    $('#download').click(function() {
        var pdf = new jsPDF('p', 'pt', 'letter');
        pdf.addHTML($('#invoice'), function() {
            pdf.save('invoice.pdf');
        });
    });
</script>

<script src="common/js/moment.min.js"></script>

<script type="text/javascript" src="https://www.2checkout.com/checkout/api/2co.min.js"></script>
<?php if ($settings->payment_gateway == '2Checkout') { ?>
    <script>
        var successCallback = function(data) {
            var myForm = document.getElementById('editPaymentForm');
            $("#editPaymentForm").append("<input type='hidden' name='token' value='" + data.response.token.token + "' />");
            myForm.submit();
        };
        var errorCallback = function(data) {
            if (data.errorCode === 200) {
                tokenRequest();
            } else {
                alert(data.errorMsg);
            }
        };
        var tokenRequest = function() {
            <?php $twocheckout = $this->db->get_where('paymentGateway', array('name =' => '2Checkout'))->row(); ?>
            var expire = $("#expire").val();
            var expiresep = expire.split("/");
            var dateformat = moment(expiresep[1], "YY");
            var year = dateformat.format("YYYY");
            var args = {
                sellerId: "<?php echo $twocheckout->merchantcode; ?>",
                publishableKey: "<?php echo $twocheckout->publishablekey; ?>",
                ccNo: $("#card").val(),
                cvv: $("#cvv").val(),
                expMonth: expiresep[0],
                expYear: year
            };
            console.log($("#card").val() + '-' + $("#cvv").val() + expiresep[0] + year + "<?php echo $twocheckout->merchantcode; ?>");

            TCO.requestToken(successCallback, errorCallback, args);
        };

        function twoCheckoutPay(e) {
            e.preventDefault();
            TCO.loadPubKey('sandbox', function() {
                publishableKey = "<?php echo $twocheckout->publishablekey; ?>"
                tokenRequest();
            });
            return false;
        }
    </script>
<?php } ?>