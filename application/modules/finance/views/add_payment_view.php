<!-- Main Content -->
<div class="main-content no-print">
    <section class="section">
        <div class="section-header">
            <h1>
                <?php
                if (!empty($payment->id)) {
                    if ($this->ion_auth->in_group(array('Doctor'))) {
                        echo lang('edit') . ' ' . lang('job');
                    } else {
                        echo lang('edit_payment');
                    }
                } else {
                    if ($this->ion_auth->in_group(array('Doctor'))) {
                        echo lang('add') . ' ' . lang('job') .  ' ' . lang('new');
                    } else {
                        echo lang('add_new_payment');
                    }
                }
                ?>
            </h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form role="form" id="editPaymentForm" action="finance/addPayment" method="post" enctype="multipart/form-data">
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
                                            <label class="col-form-label"><?php echo lang('refd_by_doctor'); ?></label>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-control select2  add_doctor" id="add_doctor" name="doctor" value=''>
                                                <?php if (!empty($payment)) { ?>
                                                    <option value="<?php echo $doctors->id; ?>" selected="selected"><?php echo $doctors->name; ?> - <?php echo $doctors->id; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="pos_doctor">
                                    <div class="row" style="padding-right:30px">
                                        <div class="col-md-12 row mb-4">
                                            <div class="col-md-3 text-right">
                                                <label class="col-form-label"><?php echo lang('name'); ?></label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control pay_in" name="d_name" value='<?php
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
                                                <input type="text" class="form-control pay_in" name="d_email" value='<?php
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
                                                <input type="text" class="form-control pay_in" name="d_phone" value='<?php
                                                                                                                        if (!empty($payment->p_phone)) {
                                                                                                                            echo $payment->p_phone;
                                                                                                                        }
                                                                                                                        ?>' placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-right:30px">
                                    <div class="col-md-12 row mb-4">
                                        <div class="col-md-3 text-right">
                                            <label class="col-form-label"><?php echo lang('select'); ?> <?= ($this->ion_auth->in_group(array('Doctor'))) ? lang('job') : lang('payments'); ?></label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="category_name[]" class="multi-select select2" multiple="" id="my_multi_select3">
                                                <?php foreach ($categories as $category) { ?>
                                                    <option class="ooppttiioonn" data-id="<?php echo $category->c_price; ?>" data-idd="<?php echo $category->id; ?>" data-cat_name="<?php echo $category->category; ?>" value="<?php echo $category->category; ?>" <?php
                                                                                                                                                                                                                                                                    if (!empty($payment->category_name)) {
                                                                                                                                                                                                                                                                        $category_name = $payment->category_name;
                                                                                                                                                                                                                                                                        $category_name1 = explode(',', $category_name);
                                                                                                                                                                                                                                                                        foreach ($category_name1 as $category_name2) {
                                                                                                                                                                                                                                                                            $category_name3 = explode('*', $category_name2);
                                                                                                                                                                                                                                                                            if ($category_name3[0] == $category->id) {
                                                                                                                                                                                                                                                                                echo 'data-qtity=' . $category_name3[3];
                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                    ?> <?php
                                                                                                                                                                                                                                                                        if (!empty($payment->category_name)) {
                                                                                                                                                                                                                                                                            $category_name = $payment->category_name;
                                                                                                                                                                                                                                                                            $category_name1 = explode(',', $category_name);
                                                                                                                                                                                                                                                                            foreach ($category_name1 as $category_name2) {
                                                                                                                                                                                                                                                                                $category_name3 = explode('*', $category_name2);
                                                                                                                                                                                                                                                                                if ($category_name3[0] == $category->id) {
                                                                                                                                                                                                                                                                                    echo 'selected';
                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                        ?>><?php echo $category->category; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 qfloww">
                            </div>
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
                                <?php if (!$this->ion_auth->in_group(array('Doctor'))) { ?>
                                    <div class="row" style="padding-right:30px">
                                        <div class="col-md-12 row mb-4">
                                            <div class="col-md-4 text-right">
                                                <label class="col-form-label"><?php echo lang('discount'); ?> <?php
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
                                                                                                                                    ?>' placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-right:30px">
                                        <div class="col-md-12 row mb-4">
                                            <div class="col-md-4 text-right">
                                                <label class="col-form-label"><?php echo lang('discount'); ?> Spesial</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control pay_in" name="spec_discount" id="dis_spec_id" value='<?php
                                                                                                                                            if (!empty($payment->spec_discount)) {
                                                                                                                                                $spec_discount = explode('*', $payment->spec_discount);
                                                                                                                                                echo $spec_discount[0];
                                                                                                                                            }
                                                                                                                                            ?>' placeholder="">
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
                                    <div class="row" style="padding-right:30px">
                                        <div class="col-md-12 row mb-4">
                                            <div class="col-md-4 text-right">
                                                <label class="col-form-label"><?php
                                                                                if (empty($payment)) {
                                                                                    echo lang('deposited_amount');
                                                                                } else {
                                                                                    echo lang('deposit') . ' 1 <br>';
                                                                                    echo date('d/m/Y', $payment->date);
                                                                                };
                                                                                ?></label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control pay_in" name="amount_received" id="amount_received" value='<?php
                                                                                                                                                    if (!empty($payment->amount_received)) {

                                                                                                                                                        echo $payment->amount_received;
                                                                                                                                                    }
                                                                                                                                                    ?>' placeholder=" " <?php
                                                                                                                                                                        if (!empty($payment->deposit_type)) {
                                                                                                                                                                            if ($payment->deposit_type == 'Card') {
                                                                                                                                                                                echo 'readonly';
                                                                                                                                                                            }
                                                                                                                                                                        }
                                                                                                                                                                        ?> required>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if (empty($payment->id) && !$this->ion_auth->in_group(array('Doctor'))) { ?>
                                    <div class="row" style="padding-right:30px">
                                        <div class="col-md-12 row mb-4">
                                            <div class="col-md-4 text-right">
                                                <label class="col-form-label"><?php echo lang('deposit_type'); ?></label>
                                            </div>
                                            <div class="col-md-8">
                                                <select class="form-control select2 selecttype" id="selecttype" name="deposit_type">
                                                    <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) { ?>
                                                        <option value="Cash"> <?php echo lang('cash'); ?> </option>
                                                        <option value="Card"> <?php echo lang('card'); ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $payment_gateway = $settings->payment_gateway;
                                    ?>
                                    <div class="cards">
                                        <div class="row" style="padding-right:30px">
                                            <div class="col-md-12 row mb-4">
                                                <div class="col-md-4 text-right">
                                                    <label class="col-form-label"><?php echo lang('accepted'); ?> <?php echo lang('cards'); ?></label>
                                                </div>
                                                <div class="col-md-8">
                                                    <img src="uploads/card.png" width="100%">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if ($payment_gateway == 'PayPal') {
                                        ?>
                                            <div class="row" style="padding-right:30px">
                                                <div class="col-md-12 row mb-4">
                                                    <div class="col-md-4 text-right">
                                                        <label class="col-form-label"><?php echo lang('card'); ?> <?php echo lang('type'); ?></label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2" name="card_type">
                                                            <option value="Mastercard"> <?php echo lang('mastercard'); ?> </option>
                                                            <option value="Visa"> <?php echo lang('visa'); ?> </option>
                                                            <option value="American Express"> <?php echo lang('american_express'); ?> </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($payment_gateway == '2Checkout' || $payment_gateway == 'PayPal') {
                                        ?>
                                            <div class="row" style="padding-right:30px">
                                                <div class="col-md-12 row mb-4">
                                                    <div class="col-md-4 text-right">
                                                        <label class="col-form-label"><?php echo lang('name'); ?> <?php echo lang('cardholder'); ?></label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" id="cardholder" class="form-control pay_in" name="cardholder" value='' placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($payment_gateway != 'Pay U Money' && $payment_gateway != 'Paystack' && $payment_gateway != 'SSLCOMMERZ' && $payment_gateway != 'Paytm') { ?>
                                            <div class="row" style="padding-right:30px">
                                                <div class="col-md-12 row mb-4">
                                                    <div class="col-md-4 text-right">
                                                        <label class="col-form-label"><?php echo lang('number'); ?> <?php echo lang('card'); ?></label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" id="card" class="form-control pay_in" name="card_number" value='' placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-right:30px">
                                                <div class="col-md-12 row mb-4">
                                                    <div class="col-md-4 text-right">
                                                        <label class="col-form-label"><?php echo lang('expire'); ?> <?php echo lang('date'); ?></label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control pay_in" id="expire" data-date="" data-date-format="MM YY" placeholder="Expiry (MM/YY)" name="expire_date" maxlength="7" aria-describedby="basic-addon1" value='' placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-right:30px">
                                                <div class="col-md-12 row mb-4">
                                                    <div class="col-md-4 text-right">
                                                        <label class="col-form-label"><?php echo lang('cvv'); ?></label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control pay_in" id="cvv" maxlength="3" name="cvv" value='' placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                <?php } ?>
                                <?php
                                if (!empty($payment) && !$this->ion_auth->in_group(array('Doctor'))) {
                                    $deposits = $this->finance_model->getDepositByPaymentId($payment->id);
                                    $i = 1;
                                    foreach ($deposits as $deposit) {

                                        if (empty($deposit->amount_received_id)) {
                                            $i = $i + 1;
                                ?>
                                            <div class="row" style="padding-right:30px">
                                                <div class="col-md-12 row mb-4">
                                                    <div class="col-md-4 text-right">
                                                        <label class="col-form-label"><?php echo lang('deposit'); ?> <?php
                                                                                                                        echo $i . '<br>';
                                                                                                                        echo date('d/m/Y', $deposit->date);
                                                                                                                        ?></label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control pay_in" name="deposit_edit_amount[]" id="amount_received" value='<?php echo $deposit->deposited_amount; ?>' <?php
                                                                                                                                                                                                            if ($deposit->deposit_type == 'Card') {
                                                                                                                                                                                                                echo 'readonly';
                                                                                                                                                                                                            }
                                                                                                                                                                                                            ?>>
                                                        <input type="hidden" class="form-control pay_in" name="deposit_edit_id[]" id="amount_received" value='<?php echo $deposit->id; ?>' placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                <?php
                                        }
                                    }
                                } ?>
                                <input type="hidden" name="id" value='<?php
                                                                        if (!empty($payment->id)) {
                                                                            echo $payment->id;
                                                                        }
                                                                        ?>'>
                                <div class="row" style="padding-right:30px">
                                    <div class="col-md-12 row mb-4">
                                        <div class="col-md-4 text-right">
                                        </div>
                                        <?php $twocheckout = $this->db->get_where('paymentGateway', array('name =' => '2Checkout'))->row(); ?>
                                        <div class="col-md-8 cashsubmit">
                                            <button type="submit" name="submit2" id="submit1" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                                        </div>
                                        <?php $twocheckout = $this->db->get_where('paymentGateway', array('name =' => '2Checkout'))->row(); ?>
                                        <div class="col-md-8 cardsubmit" hidden>
                                            <button type="submit" name="pay_now" id="submit-btn" class="btn btn-primary" <?php if ($settings->payment_gateway == 'Stripe') {
                                                                                                                            ?>onClick="stripePay(event);" <?php }
                                                                                                                                                            ?> <?php if ($settings->payment_gateway == '2Checkout' && $twocheckout->status == 'live') {
                                                                                                                                                                ?>onClick="twoCheckoutPay(event);" <?php }
                                                                                                                                                                                                    ?>><?php echo lang('submit'); ?></button>
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

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="common/js/ajaxrequest-codearistos.min.js"></script>

<script>
    $(document).ready(function() {
        $('.card').hide();
        $(document.body).on('change', '#selecttype', function() {
            var v = $("select.selecttype option:selected").val()
            if (v == 'Card') {
                $('.cardsubmit').removeClass('hidden');
                $('.cashsubmit').addClass('hidden');
                $("#amount_received").prop('required', true);
                $('.card').show();
            } else {
                $('.card').hide();
                $('.cashsubmit').removeClass('hidden');
                $('.cardsubmit').addClass('hidden');
                $("#amount_received").prop('required', false);
            }
        });

    });
</script>
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
    Stripe.setPublishableKey("<?php echo $gateway->publish; ?>");

    function stripeResponseHandler(status, response) {
        if (response.error) {
            $("#submit-btn").show();
            $("#loader").css("display", "none");
            $("#error-message").html(response.error.message).show();
        } else {
            var token = response['id'];
            $('#token').val(token);
            $("#editPaymentForm").append("<input type='hidden' name='token' value='" + token + "' />");
            $("#editPaymentForm").submit();
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

            //submit from callback
            return false;
        }
    }
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